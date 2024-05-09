<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Heading;
use App\Models\HeadingTranslate;
use Illuminate\Http\Request;

class HeadingController extends Controller
{
    public function index()
    {
        $headings = Heading::all();
        $path = '/admin/headings';
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.headings.index', compact('lang', 'headings'));
    }
    public function edit(string $id)
    {
        $heading = Heading::findOrFail($id);
        $path = '/admin/headings/edit/'.$id;
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.headings.edit',compact('lang','heading'));
    }
    public function update(Request $request, string $id)
    {
        for($i = 0; $i < count($request->lang); $i++){
            HeadingTranslate::where(['heading_id' => $id, 'lang' => $request['lang'][$i]])->update([
                'title' => $request['title'][$i],
                'subtitle' => $request['subtitle'][$i],
            ]);
        }
        return redirect()->route('admin.headings.index')->with('update_message', 'true');
    }
}
