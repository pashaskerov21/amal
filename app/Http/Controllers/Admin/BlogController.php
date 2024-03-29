<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\StoreRequest;
use App\Http\Requests\Blog\UpdateRequest;
use App\Models\Blog;
use App\Models\BlogTranslate;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('destroy', 0)->orderBy('order')->get();
        $path = '/admin/blogs';
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.blogs.index', compact('lang', 'blogs'));
    }
    public function create()
    {
        $path = '/admin/blogs/create';
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.blogs.add', compact('lang'));
    }
    public function store(StoreRequest $request)
    {
        for($i = 0; $i < count($request->title); $i++){
            $titleExist = BlogTranslate::where([
                'title' => $request['title'][$i],
                'destroy' => 0,
            ])->first();   
            if($titleExist){
                return redirect()->back()->with('title_exist_error', 'true');
            }
        }

        $blog_img = null;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $blog_img = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/blogs', $blog_img);
        }
        $maxOrder = Blog::max('order');
        $newOrder = ($maxOrder === null) ? 1 : $maxOrder + 1;
        $blog_id = Blog::create([
            'image' => $blog_img,
            'order' => $newOrder,
        ])->id;
        for($i = 0; $i < count($request->lang); $i++){
            BlogTranslate::create([
                'blog_id' => $blog_id,
                'title' => $request['title'][$i],
                'slug' => Str::slug($request['title'][$i]),
                'date' => $request['date'][$i],
                'text' => $request['text'][$i],
                'meta_description' => $request['meta_description'][$i],
                'lang' => $request['lang'][$i],
            ]);
        };
        return redirect()->route('admin.blogs.index')->with('store_message', 'true');
    }
    public function edit(string $id)
    {
        $blog = Blog::findOrFail($id);
        $path = '/admin/blogs/edit/'.$id;
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.blogs.edit',compact('lang','blog'));
    }
    public function update(UpdateRequest $request, string $id){
        for($i = 0; $i < count($request->title); $i++){
            $titleExist = BlogTranslate::where([
                'title' => $request['title'][$i],
                'destroy' => 0,
            ])->first();   
            if($titleExist && $titleExist->id != $id){
                return redirect()->back()->with('title_exist_error', 'true');
            }
        }

        $blog = Blog::findOrFail($id);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $blog_img = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/blogs', $blog_img);

            $blog->image = $blog_img;
        }
        $blog->save();
        for($i = 0; $i < count($request->lang); $i++){
            BlogTranslate::where(['blog_id' => $id, 'lang' => $request['lang'][$i]])->update([
                'title' => $request['title'][$i],
                'slug' => Str::slug($request['title'][$i]),
                'date' => $request['date'][$i],
                'text' => $request['text'][$i],
                'meta_description' => $request['meta_description'][$i],
            ]);
        }
        return redirect()->route('admin.blogs.index')->with('update_message', 'true');
    }
    public function sort(Request $request)
    {
        $order_data = $request['data'];
        try {
            DB::beginTransaction();

            foreach ($order_data as $data) {
                Blog::where('id', $data['id'])->update(['order' => $data['order']]);
            }

            DB::commit();

            return response()->json('sort_success', 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json($e->getMessage(), 500);
        }
    }
    public function destroy(string $id)
    {
        Blog::where('id', $id)->update([
            'destroy' => 1
        ]);
        BlogTranslate::where('blog_id', $id)->update([
            'destroy' => 1
        ]);
        return redirect()->route('admin.blogs.index')->with('delete_message','true');
    }
}
