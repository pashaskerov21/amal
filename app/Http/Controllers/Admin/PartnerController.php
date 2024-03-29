<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Partner\StoreRequest;
use App\Http\Requests\Partner\UpdateRequest;
use App\Models\Partner;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::where('destroy', 0)->orderBy('order')->get();
        $path = '/admin/partners';
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.partners.index', compact('lang', 'partners'));
    }
    public function create()
    {
        $path = '/admin/partners/create';
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.partners.add', compact('lang'));
    }
    public function store(StoreRequest $request)
    {
        $partner_img = null;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $partner_img = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/partners', $partner_img);
        }

        $maxOrder = Partner::max('order');
        $newOrder = ($maxOrder === null) ? 1 : $maxOrder + 1;
        Partner::create([
            'url' => $request['url'],
            'image' => $partner_img,
            'order' => $newOrder,
        ]);
        return redirect()->route('admin.partners.index')->with('store_message', 'true');
    }
    public function edit(string $id)
    {
        $partner = Partner::findOrFail($id);
        $path = '/admin/gallery/edit/' . $id;
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.partners.edit', compact('lang', 'partner'));
    }
    public function update(UpdateRequest $request, string $id)
    {
        $partner = Partner::findOrFail($id);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $partner_img = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/partners', $partner_img);

            $partner->image = $partner_img;
        }
        $partner->url = $request['url'];
        $partner->save();
        return redirect()->route('admin.partners.index')->with('update_message', 'true');
    }
    public function sort(Request $request)
    {
        $order_data = $request['data'];
        try {
            DB::beginTransaction();

            foreach ($order_data as $data) {
                Partner::where('id', $data['id'])->update(['order' => $data['order']]);
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
        Partner::where('id', $id)->update([
            'destroy' => 1
        ]);
        return redirect()->route('admin.partners.index')->with('delete_message','true');
    }
}
