<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutReport;
use App\Models\AboutText;
use App\Models\Banner;
use App\Models\MenuTranslate;
use App\Models\Service;
use App\Models\Team;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home(){
        $lang = ['az' => '/','en' => '/en', 'ru' => '/ru'];
        $banners = Banner::where('page', 0)->where('destroy',0)->orderBy('order')->get();
        $services = Service::where('destroy',0)->orderBy('order')->take(3)->get();
        $about = About::findOrFail(1);
        $about_reports = AboutReport::where('destroy', 0)->orderBy('order')->get();
        return view('site.pages.home', compact('lang','banners','services','about','about_reports'));
    }
    public function donate(){
        $lang = ['az' => '/iane-et','en' => '/en/donate', 'ru' => '/ru/pozertvuite'];
        $meta_title = __('main.iane_et');
        return view('site.pages.donate', compact('lang', 'meta_title'));
    }
    public function volunteer(){
        $lang = ['az' => '/konullu-ol','en' => '/en/volunteer', 'ru' => '/ru/volonter'];
        $meta_title = __('main.konullu_ol');
        return view('site.pages.volunteer', compact('lang','meta_title'));
    }
    public function about(){
        $lang = ['az' => '/haqqimizda','en' => '/en/about-us', 'ru' => '/ru/o-nas'];
        $meta_title = MenuTranslate::where('menu_id',1)->where('lang', Session('lang'))->first()->title;
        $services = Service::where('destroy',0)->orderBy('order')->take(3)->get();
        $about = About::findOrFail(1);
        $about_reports = AboutReport::where('destroy', 0)->orderBy('order')->get();
        $about_texts = AboutText::where('destroy', 0)->orderBy('order')->get();
        $team_members = Team::where('destroy', 0)->orderBy('order')->get();
        return view('site.pages.about', compact('lang','meta_title','services','about','about_reports','about_texts','team_members'));
    }
    public function projects(){
        $lang = ['az' => '/layihelerimiz','en' => '/en/our-projects', 'ru' => '/ru/nasi-proekty'];
        $meta_title = MenuTranslate::where('menu_id',2)->where('lang', Session('lang'))->first()->title;
        return view('site.pages.projects', compact('lang','meta_title'));
    }
    public function services(){
        $lang = ['az' => '/xidmetlerimiz','en' => '/en/our-services', 'ru' => '/ru/nasi-servisy'];
        $meta_title = MenuTranslate::where('menu_id',3)->where('lang', Session('lang'))->first()->title;
        $services = Service::where('destroy',0)->orderBy('order')->get();
        return view('site.pages.services', compact('lang','meta_title','services'));
    }
    public function gallery(){
        $lang = ['az' => '/qalereya','en' => '/en/gallery', 'ru' => '/ru/galereia'];
        $meta_title = MenuTranslate::where('menu_id',4)->where('lang', Session('lang'))->first()->title;
        return view('site.pages.gallery', compact('lang','meta_title'));
    }
    public function report(){
        $lang = ['az' => '/hesabat','en' => '/en/report', 'ru' => '/ru/otcet'];
        $meta_title = MenuTranslate::where('menu_id',5)->where('lang', Session('lang'))->first()->title;
        return view('site.pages.report', compact('lang','meta_title'));
    }
    public function how_we_work(){
        $lang = ['az' => '/nece-isleyirik','en' => '/en/how-we-work', 'ru' => '/ru/kak-my-rabotaem'];
        $meta_title = MenuTranslate::where('menu_id',6)->where('lang', Session('lang'))->first()->title;
        return view('site.pages.how_we_work', compact('lang','meta_title'));
    }
    public function we_in_media(){
        $lang = ['az' => '/mediada-biz','en' => '/en/we-in-the-media', 'ru' => '/ru/my-v-smi'];
        $meta_title = MenuTranslate::where('menu_id',7)->where('lang', Session('lang'))->first()->title;
        return view('site.pages.we_in_media', compact('lang','meta_title'));
    }
    public function contact(){
        $lang = ['az' => '/elaqe','en' => '/en/contact', 'ru' => '/ru/kontakt'];
        $meta_title = MenuTranslate::where('menu_id',8)->where('lang', Session('lang'))->first()->title;
        return view('site.pages.contact', compact('lang','meta_title'));
    }
}
