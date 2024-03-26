<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Team\StoreRequest;
use App\Http\Requests\Team\UpdateRequest;
use App\Models\Team;
use App\Models\TeamTranslate;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    public function index()
    {
        $team_members = Team::where('destroy', 0)->orderBy('order')->get();
        $path = '/admin/team';
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.team.index', compact('lang', 'team_members'));
    }
    public function create()
    {
        $path = '/admin/team/create';
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.team.add', compact('lang'));
    }
    public function store(StoreRequest $request)
    {
        $member_img = null;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $member_img = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/team', $member_img);
        }

        $maxOrder = Team::max('order');
        $newOrder = ($maxOrder === null) ? 1 : $maxOrder + 1;
        $text_id = Team::create([
            'image' => $member_img,
            'order' => $newOrder,
        ])->id;
        for($i = 0; $i < count($request->lang); $i++){
            TeamTranslate::create([
                'member_id' => $text_id,
                'title' => $request['title'][$i],
                'subtitle' => $request['subtitle'][$i],
                'lang' => $request['lang'][$i],
            ]);
        };
        return redirect()->route('admin.team.index')->with('store_message', 'true');
    }
    public function edit(string $id)
    {
        $team_member = Team::findOrFail($id);
        $path = '/admin/team/edit/'.$id;
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.team.edit',compact('lang','team_member'));
    }
    public function update(UpdateRequest $request, string $id)
    {
        $team_member = Team::findOrFail($id);
        if ($request->hasFile('image')) {
            $file = $request->image;
            $member_img = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/team', $member_img);

            $team_member->image = $member_img;
        }
        $team_member->save();

        for($i = 0; $i < count($request->lang); $i++){
            TeamTranslate::where(['member_id' => $id, 'lang' => $request['lang'][$i]])->update([
                'title' => $request['title'][$i],
                'subtitle' => $request['subtitle'][$i],
            ]);
        }
        return redirect()->route('admin.team.index')->with('update_message', 'true');
    }
    public function sort(Request $request)
    {
        $order_data = $request['data'];
        try {
            DB::beginTransaction();

            foreach ($order_data as $data) {
                Team::where('id', $data['id'])->update(['order' => $data['order']]);
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
        Team::where('id', $id)->update([
            'destroy' => 1
        ]);
        return redirect()->route('admin.team.index')->with('delete_message','true');
    }
}
