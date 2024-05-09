<?php

namespace App\Providers;

use App\Models\Heading;
use App\Models\Menu;
use App\Models\Partner;
use App\Models\Setting;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {

            if (Session::has('lang')) {
                $lang = Session::get('lang');
                app()->setLocale($lang);
            }
            $settings = Setting::findOrFail(1);
            $menues = Menu::where('destroy', 0)->orderBy('order')->get();
            $menuCount = $menues->count();
            $menuCountGroup1 = (int) ceil($menuCount / 2);
            $menues_1 = $menues->take($menuCountGroup1);
            $menues_2 = $menues->slice($menuCountGroup1);
            $partners = Partner::where('destroy', 0)->orderBy('order')->get();
            $headings = Heading::all();

            $view->with([
                'settings' => $settings,
                'menues' => $menues,
                'menues_1' => $menues_1,
                'menues_2' => $menues_2,
                'partners' => $partners,
                'headings' => $headings,
            ]);
        });
    }
}
