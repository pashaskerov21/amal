<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VolunteerRequest;
use App\Models\Volunteer;
use App\Models\VolunteerTranslate;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VolunteerController extends Controller
{
    public function index()
    {
        $volunteers = Volunteer::where('destroy', 0)->orderBy('order')->get();
        $path = '/admin/volunteers';
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.volunteers.index', compact('lang', 'volunteers'));
    }
    public function create()
    {
        $path = '/admin/volunteers/create';
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.volunteers.add', compact('lang'));
    }
    public function store(VolunteerRequest $request)
    {
        $member_img = null;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $member_img = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/volunteers', $member_img);
        }

        $maxOrder = Volunteer::max('order');
        $newOrder = ($maxOrder === null) ? 1 : $maxOrder + 1;
        $volunteer_id = Volunteer::create([
            'image' => $member_img,
            'order' => $newOrder,
        ])->id;
        for($i = 0; $i < count($request->lang); $i++){
            VolunteerTranslate::create([
                'volunteer_id' => $volunteer_id,
                'title' => $request['title'][$i],
                'subtitle' => $request['subtitle'][$i],
                'lang' => $request['lang'][$i],
            ]);
        };
        return redirect()->route('admin.volunteers.index')->with('store_message', 'true');
    }
    public function edit(string $id)
    {
        $volunteer = Volunteer::findOrFail($id);
        $path = '/admin/volunteers/edit/'.$id;
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.volunteers.edit',compact('lang','volunteer'));
    }
    public function update(VolunteerRequest $request, string $id)
    {
        $volunteer = Volunteer::findOrFail($id);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $member_img = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/volunteers', $member_img);

            $volunteer->image = $member_img;
        }
        $volunteer->save();

        for($i = 0; $i < count($request->lang); $i++){
            VolunteerTranslate::where(['volunteer_id' => $id, 'lang' => $request['lang'][$i]])->update([
                'title' => $request['title'][$i],
                'subtitle' => $request['subtitle'][$i],
            ]);
        }
        return redirect()->route('admin.volunteers.index')->with('update_message', 'true');
    }
    public function sort(Request $request)
    {
        $order_data = $request['data'];
        try {
            DB::beginTransaction();

            foreach ($order_data as $data) {
                Volunteer::where('id', $data['id'])->update(['order' => $data['order']]);
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
        Volunteer::where('id', $id)->update([
            'destroy' => 1
        ]);
        return redirect()->route('admin.volunteers.index')->with('delete_message','true');
    }
}
