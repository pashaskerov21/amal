<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Service\StoreRequest;
use App\Http\Requests\Service\UpdateRequest;
use App\Models\Service;
use App\Models\ServiceTranslate;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::where('destroy', 0)->orderBy('order')->get();
        $path = '/admin/services';
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.services.index', compact('lang', 'services'));
    }
    public function create()
    {
        $path = '/admin/services/create';
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.services.add', compact('lang'));
    }
    public function store(StoreRequest $request)
    {
        $service_img = null;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $service_img = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/services', $service_img);
        }

        $maxOrder = Service::max('order');
        $newOrder = ($maxOrder === null) ? 1 : $maxOrder + 1;
        $service_id = Service::create([
            'image' => $service_img,
            'order' => $newOrder,
        ])->id;
        for($i = 0; $i < count($request->lang); $i++){
            ServiceTranslate::create([
                'service_id' => $service_id,
                'title' => $request['title'][$i],
                'text' => $request['text'][$i],
                'lang' => $request['lang'][$i],
            ]);
        };
        return redirect()->route('admin.services.index')->with('store_message', 'true');
    }
    public function edit(string $id)
    {
        $service = Service::findOrFail($id);
        $path = '/admin/services/edit/'.$id;
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.services.edit',compact('lang','service'));
    }
    public function update(UpdateRequest $request, string $id)
    {
        $service = Service::findOrFail($id);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $service_img = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/services', $service_img);

            $service->image = $service_img;
        }
        $service->save();

        for($i = 0; $i < count($request->lang); $i++){
            ServiceTranslate::where(['service_id' => $id, 'lang' => $request['lang'][$i]])->update([
                'title' => $request['title'][$i],
                'text' => $request['text'][$i],
            ]);
        }
        return redirect()->route('admin.services.index')->with('update_message', 'true');
    }
    public function sort(Request $request)
    {
        $order_data = $request['data'];
        try {
            DB::beginTransaction();

            foreach ($order_data as $data) {
                Service::where('id', $data['id'])->update(['order' => $data['order']]);
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
        Service::where('id', $id)->update([
            'destroy' => 1
        ]);
        return redirect()->route('admin.services.index')->with('delete_message','true');
    }
}
