<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\SettingTranslate;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $settings = Setting::findOrFail(1);
        $lang = ['az' => '/admin/settings','en' => '/en/admin/settings', 'ru' => '/ru/admin/settings'];
        return view('admin-panel.settings.index', compact('lang','settings'));
    }
    public function update(Request $request){
        Setting::where('id', 1)->update([
            "email" => $request["email"],
            "phone" => $request["phone"],
            "facebook" => $request["facebook"],
            "linkedin" => $request["linkedin"],
            "twitter" => $request["twitter"],
            "instagram" => $request["instagram"],
            "youtube" => $request["youtube"],
            "whatsapp" => $request["whatsapp"],
            "telegram" => $request["telegram"],
            "author_url" => $request["author_url"],
            "address_url" => $request["address_url"],
        ]);
        for ($i = 0; $i < count($request["lang"]); $i++) {
            SettingTranslate::where("setting_id", 1)->where("lang", $request['lang'][$i])->update([
                "title" => $request["title"][$i],
                "description" => $request["description"][$i],
                "author" => $request["author"][$i],
                "keywords" => $request["keywords"][$i],
                "copyright" => $request["copyright"][$i],
                "address_text" => $request["address_text"][$i],
            ]);
        };
        return redirect()->route('admin.settings.index')->with('update_message', 'true');
    }
}
