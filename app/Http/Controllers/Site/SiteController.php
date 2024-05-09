<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutReport;
use App\Models\AboutText;
use App\Models\AnnualReport;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\BlogTranslate;
use App\Models\Gallery;
use App\Models\MenuTranslate;
use App\Models\MonthlyReport;
use App\Models\Project;
use App\Models\ProjectTranslate;
use App\Models\Service;
use App\Models\Team;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home()
    {
        $lang = ['az' => '/', 'en' => '/en', 'ru' => '/ru'];
        $banners = Banner::where('page', 0)->where('destroy', 0)->orderBy('order')->get();
        $services = Service::where('destroy', 0)->orderBy('order')->take(3)->get();
        $about = About::findOrFail(1);
        $about_reports = AboutReport::where('destroy', 0)->orderBy('order')->get();
        $projects = Project::where('destroy', 0)->orderBy('order')->get();
        $projects_lang = ['az' => '/layihelerimiz', 'en' => '/en/our-projects', 'ru' => '/ru/nasi-proekty'];
        $blogs = Blog::where('destroy', 0)->orderBy('order')->get();
        $blogs_lang = ['az' => '/mediada-biz', 'en' => '/en/we-in-the-media', 'ru' => '/ru/my-v-smi'];
        $volunteers = Volunteer::where('destroy', 0)->orderBy('order')->get();

        return view('site.pages.home', compact('lang', 'banners', 'services', 'about', 'about_reports', 'projects', 'projects_lang','blogs','blogs_lang','volunteers'));
    }
    public function donate()
    {
        $lang = ['az' => '/iane-et', 'en' => '/en/donate', 'ru' => '/ru/pozertvuite'];
        $meta_title = __('main.iane_et');
        $services = Service::where('destroy', 0)->orderBy('order')->get();
        return view('site.pages.donate', compact('lang', 'meta_title','services'));
    }
    public function volunteer_form()
    {
        $lang = ['az' => '/konullu-ol', 'en' => '/en/volunteer', 'ru' => '/ru/volonter'];
        $meta_title = __('main.konullu_ol');
        return view('site.pages.volunteer_form', compact('lang', 'meta_title'));
    }
    public function about()
    {
        $lang = ['az' => '/haqqimizda', 'en' => '/en/about-us', 'ru' => '/ru/o-nas'];
        $meta_title = MenuTranslate::where('menu_id', 1)->where('lang', Session('lang'))->first()->title;
        $services = Service::where('destroy', 0)->orderBy('order')->take(3)->get();
        $about = About::findOrFail(1);
        $about_reports = AboutReport::where('destroy', 0)->orderBy('order')->get();
        $about_texts = AboutText::where('destroy', 0)->orderBy('order')->get();
        $team_members = Team::where('destroy', 0)->orderBy('order')->get();
        $volunteers = Volunteer::where('destroy', 0)->orderBy('order')->get();

        return view('site.pages.about', compact('lang', 'meta_title', 'services', 'about', 'about_reports', 'about_texts', 'team_members','volunteers'));
    }
    public function projects()
    {
        $lang = ['az' => '/layihelerimiz', 'en' => '/en/our-projects', 'ru' => '/ru/nasi-proekty'];
        $meta_title = MenuTranslate::where('menu_id', 2)->where('lang', Session('lang'))->first()->title;
        $projects = Project::where('destroy', 0)->orderBy('order')->get();
        return view('site.pages.projects', compact('lang', 'meta_title', 'projects'));
    }
    public function project_inner($slug)
    {
        $project_translate = ProjectTranslate::where([
            'slug' => $slug,
            'destroy' => 0,
        ])->first();
        if ($project_translate) {
            $project_translates = ProjectTranslate::where('project_id', $project_translate->project_id)->get();
            $project = Project::where([
                'id' => $project_translate->project_id,
                'destroy' => 0,
            ])->first();
            $lang = [
                'az' => '/layihelerimiz/'.$project_translates->where('lang','az')->first()->slug, 
                'en' => '/en/our-projects/'.$project_translates->where('lang','en')->first()->slug, 
                'ru' => '/ru/nasi-proekty/'.$project_translates->where('lang','ru')->first()->slug
            ];
            $gallery_items = $project->getGallery;
            return view('site.pages.project_inner', compact('lang', 'project', 'project_translate','gallery_items'));
        }
    }
    public function services()
    {
        $lang = ['az' => '/xidmetlerimiz', 'en' => '/en/our-services', 'ru' => '/ru/nasi-servisy'];
        $meta_title = MenuTranslate::where('menu_id', 3)->where('lang', Session('lang'))->first()->title;
        $services = Service::where('destroy', 0)->orderBy('order')->get();
        return view('site.pages.services', compact('lang', 'meta_title', 'services'));
    }
    public function gallery()
    {
        $lang = ['az' => '/qalereya', 'en' => '/en/gallery', 'ru' => '/ru/galereia'];
        $meta_title = MenuTranslate::where('menu_id', 4)->where('lang', Session('lang'))->first()->title;
        $gallery_items = Gallery::where('destroy', 0)->orderBy('order')->get();
        return view('site.pages.gallery', compact('lang', 'meta_title', 'gallery_items'));
    }
    public function report()
    {
        $lang = ['az' => '/hesabat', 'en' => '/en/report', 'ru' => '/ru/otcet'];
        $meta_title = MenuTranslate::where('menu_id', 5)->where('lang', Session('lang'))->first()->title;
        $services = Service::where('destroy', 0)->orderBy('order')->get();
        $annual_reports = AnnualReport::where('destroy', 0)->orderByDesc('year')->get();
        $monthly_reports = MonthlyReport::where('destroy', 0)->orderByDesc('year')->orderByDesc('month')->get();
        return view('site.pages.report', compact('lang', 'meta_title', 'services', 'annual_reports', 'monthly_reports'));
    }
    public function how_we_work()
    {
        $lang = ['az' => '/nece-isleyirik', 'en' => '/en/how-we-work', 'ru' => '/ru/kak-my-rabotaem'];
        $meta_title = MenuTranslate::where('menu_id', 6)->where('lang', Session('lang'))->first()->title;
        $about = About::findOrFail(1);
        return view('site.pages.how_we_work', compact('lang', 'meta_title', 'about'));
    }
    public function we_in_media()
    {
        $lang = ['az' => '/mediada-biz', 'en' => '/en/we-in-the-media', 'ru' => '/ru/my-v-smi'];
        $meta_title = MenuTranslate::where('menu_id', 7)->where('lang', Session('lang'))->first()->title;
        $blogs = Blog::where('destroy', 0)->orderBy('order')->get();
        return view('site.pages.we_in_media', compact('lang', 'meta_title','blogs'));
    }
    public function media_inner($slug)
    {
        $blog_translate = BlogTranslate::where([
            'slug' => $slug,
            'destroy' => 0,
        ])->first();
        if ($blog_translate) {
            $blog_translates = BlogTranslate::where('blog_id', $blog_translate->blog_id)->get();
            $blog = Blog::where([
                'id' => $blog_translate->blog_id,
                'destroy' => 0,
            ])->first();
            $lang = [
                'az' => '/mediada-biz/'.$blog_translates->where('lang','az')->first()->slug, 
                'en' => '/en/we-in-the-media/'.$blog_translates->where('lang','en')->first()->slug, 
                'ru' => '/ru/my-v-smi/'.$blog_translates->where('lang','ru')->first()->slug
            ];
            return view('site.pages.media_inner', compact('lang', 'blog', 'blog_translate'));
        }
    }
    public function contact()
    {
        $lang = ['az' => '/elaqe', 'en' => '/en/contact', 'ru' => '/ru/kontakt'];
        $meta_title = MenuTranslate::where('menu_id', 8)->where('lang', Session('lang'))->first()->title;
        return view('site.pages.contact', compact('lang', 'meta_title'));
    }
}
