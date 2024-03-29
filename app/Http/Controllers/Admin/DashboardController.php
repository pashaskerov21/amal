<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AnnualReport;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\DonateMessage;
use App\Models\Menu;
use App\Models\MonthlyReport;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Service;
use App\Models\Subscriber;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $lang = ['az' => '/admin/dashboard','en' => '/en/admin/dashboard', 'ru' => '/ru/admin/dashboard'];
        $banners = Banner::where('destroy', 0)->orderBy('order')->get();
        $projects = Project::where('destroy', 0)->orderBy('order')->get();
        $services = Service::where('destroy', 0)->orderBy('order')->get();
        $annual_reports = AnnualReport::where('destroy', 0)->orderByDesc('year')->get();
        $monthly_reports = MonthlyReport::where('destroy', 0)->orderByDesc('year')->orderByDesc('month')->get();
        $blogs = Blog::where('destroy', 0)->orderBy('order')->get();
        $partners = Partner::where('destroy', 0)->orderBy('order')->get();
        $donate_messages = DonateMessage::all();
        $volunteers = Volunteer::all();
        $subscribers = Subscriber::all();
        $menues = Menu::where('destroy', 0)->orderBy('order')->get();

        return view('admin-panel.dashboard.index',compact('lang','banners','projects','services','annual_reports','monthly_reports','blogs','partners','donate_messages','volunteers','subscribers','menues'));
    }
}
