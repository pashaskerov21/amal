<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Banner\StoreRequest;
use App\Http\Requests\Banner\UpdateRequest;
use App\Models\Banner;
use App\Models\BannerTranslate;
use App\Models\Menu;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::where('destroy', 0)->orderBy('order')->get();
        $menues = Menu::where('destroy', 0)->orderBy('order')->get();
        $path = '/admin/banner';
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.banner.index', compact('lang', 'banners','menues'));
    }
    public function create()
    {
        $menues = Menu::where('destroy', 0)->orderBy('order')->get();
        $path = '/admin/banner/create';
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.banner.add', compact('lang','menues'));
    }
    public function store(StoreRequest $request)
    {
        $banner_img = null;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $banner_img = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/banner', $banner_img);
        }

        $maxOrder = Banner::max('order');
        $newOrder = ($maxOrder === null) ? 1 : $maxOrder + 1;
        $banner_id = Banner::create([
            'page' => $request['page'],
            'image' => $banner_img,
            'order' => $newOrder,
        ])->id;
        for($i = 0; $i < count($request->lang); $i++){
            BannerTranslate::create([
                'banner_id' => $banner_id,
                'title' => $request['title'][$i],
                'text' => $request['text'][$i],
                'lang' => $request['lang'][$i],
            ]);
        };
        return redirect()->route('admin.banner.index')->with('store_message', 'true');
    }
    public function edit(string $id)
    {
        $menues = Menu::where('destroy', 0)->orderBy('order')->get();
        $banner = Banner::findOrFail($id);
        $path = '/admin/banner/edit/'.$id;
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.banner.edit',compact('lang','banner','menues'));
    }
    public function update(UpdateRequest $request, string $id)
    {
        $banner = Banner::findOrFail($id);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $banner_img = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/banner', $banner_img);

            $banner->image = $banner_img;
        }
        $banner->page = $request['page'];
        $banner->save();

        for($i = 0; $i < count($request->lang); $i++){
            BannerTranslate::where(['banner_id' => $id, 'lang' => $request['lang'][$i]])->update([
                'title' => $request['title'][$i],
                'text' => $request['text'][$i],
            ]);
        }
        return redirect()->route('admin.banner.index')->with('update_message', 'true');
    }
    public function sort(Request $request)
    {
        $order_data = $request['data'];
        try {
            DB::beginTransaction();

            foreach ($order_data as $data) {
                Banner::where('id', $data['id'])->update(['order' => $data['order']]);
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
        Banner::where('id', $id)->update([
            'destroy' => 1
        ]);
        return redirect()->route('admin.banner.index')->with('delete_message','true');
    }
}
