<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequest;
use App\Models\Menu;
use App\Models\MenuTranslate;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    public function index()
    {
        $menues = Menu::where('destroy', 0)->orderBy('order')->get();
        $path = '/admin/menu';
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.menu.index', compact('lang', 'menues'));
    }
    public function create()
    {
        $path = '/admin/menu/create';
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.menu.add', compact('lang'));
    }
    public function store(MenuRequest $request)
    {
        $maxOrder = Menu::max('order');
        $newOrder = ($maxOrder === null) ? 1 : $maxOrder + 1;
        $menu_id = Menu::create([
            'order' => $newOrder,
        ])->id;
        for($i = 0; $i < count($request->lang); $i++){
            MenuTranslate::create([
                'menu_id' => $menu_id,
                'title' => $request['title'][$i],
                'slug' => Str::slug($request['title'][$i]),
                'lang' => $request['lang'][$i],
            ]);
        };
        return redirect()->route('admin.menu.index')->with('store_message', 'true');
    }
    public function edit(string $id)
    {
        $menu = Menu::findOrFail($id);
        $path = '/admin/menu/edit/'.$id;
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.menu.edit',compact('lang', 'menu'));
    }
    public function update(MenuRequest $request, string $id)
    {
        for($i = 0; $i < count($request->lang); $i++){
            MenuTranslate::where(['menu_id' => $id, 'lang' => $request['lang'][$i]])->update([
                'title' => $request['title'][$i],
            ]);
        }
        return redirect()->route('admin.menu.index')->with('update_message', 'true');
    }
    public function sort(Request $request)
    {
        $order_data = $request['data'];
        try {
            DB::beginTransaction();

            foreach ($order_data as $data) {
                Menu::where('id', $data['id'])->update(['order' => $data['order']]);
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
        Menu::where('id', $id)->update([
            'destroy' => 1
        ]);
        return redirect()->route('admin.menu.index')->with('delete_message','true');
    }
}
