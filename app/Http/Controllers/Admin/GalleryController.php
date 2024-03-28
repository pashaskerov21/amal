<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Gallery\StoreRequest;
use App\Http\Requests\Gallery\UpdateRequest;
use App\Models\Gallery;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GalleryController extends Controller
{
    public function index()
    {
        $gallery_items = Gallery::where('destroy', 0)->orderBy('order')->get();
        $path = '/admin/gallery';
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.gallery.index', compact('lang', 'gallery_items'));
    }
    public function create()
    {
        $path = '/admin/gallery/create';
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.gallery.add', compact('lang'));
    }
    public function store(StoreRequest $request)
    {
        if (count($request["files"]) > 0) {
            foreach ($request["files"] as $file) {
                if ($file->isValid()) {
                    $image = time() . $file->getClientOriginalName();
                    $file->storeAs('public/uploads/gallery', $image);

                    $imageMaxOrder = Gallery::max('order');
                    $imageNewOrder = ($imageMaxOrder === null) ? 1 : $imageMaxOrder + 1;
                    Gallery::create([
                        "image" => $image,
                        "order" => $imageNewOrder,
                    ]);
                }
            }
            return redirect()->route('admin.gallery.index')->with('store_message', 'true');
        }
    }
    public function edit(string $id)
    {
        $gallery_item = Gallery::findOrFail($id);
        $path = '/admin/gallery/edit/' . $id;
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.gallery.edit', compact('lang', 'gallery_item'));
    }
    public function update(UpdateRequest $request, string $id)
    {
        $gallery_item = Gallery::findOrFail($id);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $image = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/gallery', $image);

            $gallery_item->image = $image;
            $gallery_item->save();
            return redirect()->route('admin.gallery.index')->with('update_message', 'true');
        }
    }
    public function sort(Request $request)
    {
        $order_data = $request['data'];
        try {
            DB::beginTransaction();

            foreach ($order_data as $data) {
                Gallery::where('id', $data['id'])->update(['order' => $data['order']]);
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
        Gallery::where('id', $id)->update([
            'destroy' => 1
        ]);
        return redirect()->route('admin.gallery.index')->with('delete_message', 'true');
    }
}
