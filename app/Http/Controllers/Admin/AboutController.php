<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\About\UpdateRequest;
use App\Models\About;
use App\Models\AboutTranslate;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::findOrFail(1);
        $path = '/admin/about';
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.about.index', compact('lang', 'about'));
    }
    public function update(UpdateRequest $request)
    {
        $about = About::findOrFail(1);
        $image_1 = $about->image_1;
        $image_2 = $about->image_2;
        if ($request->hasFile('image_1')) {
            $file_1 = $request->image_1;
            $image_1 = time() . $file_1->getClientOriginalName();
            $file_1->storeAs('public/uploads/about', $image_1);
        }
        if ($request->hasFile('image_2')) {
            $file_2 = $request->image_2;
            $image_2 = time() . $file_2->getClientOriginalName();
            $file_2->storeAs('public/uploads/about', $image_2);
        }
        $about->update([
            'image_1' => $image_1,
            'image_2' => $image_2,
            'video_url' => $request['video_url'],
        ]);
        

        for($i = 0; $i < count($request->lang); $i++){
            AboutTranslate::where(['about_id' => 1, 'lang' => $request['lang'][$i]])->update([
                'home_title' => $request['home_title'][$i],
                'home_text' => $request['home_text'][$i],
                'report_title' => $request['report_title'][$i],
                'report_text' => $request['report_text'][$i],
                'how_we_work_text' => $request['how_we_work_text'][$i],
            ]);
        }
        return redirect()->route('admin.about.index')->with('update_message', 'true');
    }
}
