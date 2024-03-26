<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AboutText\StoreRequest;
use App\Http\Requests\AboutText\UpdateRequest;
use App\Models\AboutText;
use App\Models\AboutTextTranslate;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutTextController extends Controller
{
    public function index()
    {
        $about_texts = AboutText::where('destroy', 0)->orderBy('order')->get();
        $path = '/admin/about_text';
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.about_text.index', compact('lang', 'about_texts'));
    }
    public function create()
    {
        $path = '/admin/about_text/create';
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.about_text.add', compact('lang'));
    }
    public function store(StoreRequest $request)
    {
        $text_img = null;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $text_img = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/about_text', $text_img);
        }

        $maxOrder = AboutText::max('order');
        $newOrder = ($maxOrder === null) ? 1 : $maxOrder + 1;
        $text_id = AboutText::create([
            'image' => $text_img,
            'order' => $newOrder,
        ])->id;
        for($i = 0; $i < count($request->lang); $i++){
            AboutTextTranslate::create([
                'text_id' => $text_id,
                'title' => $request['title'][$i],
                'text' => $request['text'][$i],
                'lang' => $request['lang'][$i],
            ]);
        };
        return redirect()->route('admin.about_text.index')->with('store_message', 'true');
    }
    public function edit(string $id)
    {
        $about_text = AboutText::findOrFail($id);
        $path = '/admin/about_text/edit/'.$id;
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.about_text.edit',compact('lang','about_text'));
    }
    public function update(UpdateRequest $request, string $id)
    {
        $about_text = AboutText::findOrFail($id);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $text_img = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/about_text', $text_img);

            $about_text->image = $text_img;
        }
        $about_text->save();

        for($i = 0; $i < count($request->lang); $i++){
            AboutTextTranslate::where(['text_id' => $id, 'lang' => $request['lang'][$i]])->update([
                'title' => $request['title'][$i],
                'text' => $request['text'][$i],
            ]);
        }
        return redirect()->route('admin.about_text.index')->with('update_message', 'true');
    }
    public function sort(Request $request)
    {
        $order_data = $request['data'];
        try {
            DB::beginTransaction();

            foreach ($order_data as $data) {
                AboutText::where('id', $data['id'])->update(['order' => $data['order']]);
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
        AboutText::where('id', $id)->update([
            'destroy' => 1
        ]);
        return redirect()->route('admin.about_text.index')->with('delete_message','true');
    }
}
