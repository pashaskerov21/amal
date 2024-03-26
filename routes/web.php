<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AboutReportController;
use App\Http\Controllers\Admin\AboutTextController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Middleware\IsLoginMiddleware;
use App\Http\Middleware\LocaleMiddleware;
use App\Http\Middleware\NotLoginMiddleware;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;


Route::middleware([LocaleMiddleware::class])->group(function () {
    $locale = Request::segment(1);

    if (in_array($locale, ['en', 'ru'])) {
        $locale = Request::segment(1);
    } else {
        $locale = '';
    }
    Route::group(['prefix' => $locale, 'where' => ['locale' => '[a-zA-Z]{2}']], function () {
        Route::group(['prefix' => '/admin', 'as' => 'admin.'], function () {
            Route::middleware([IsLoginMiddleware::class])->group(function () {
                Route::get('/login', [AuthController::class, 'index'])->name('login');
                Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
            });
            Route::middleware([NotLoginMiddleware::class])->group(function () {
                Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

                Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
                Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

                Route::group(['prefix' => '/users', 'as' => 'users.'], function () {
                    Route::get('/', [UserController::class, 'index'])->name('index');
                    Route::get('/create', [UserController::class, 'create'])->name('create');
                    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
                    Route::get('/destroy/{id}', [UserController::class, 'destroy'])->name('destroy');
                    Route::post('/store', [UserController::class, 'store'])->name('store');
                    Route::post('/update/{id}', [UserController::class, 'update'])->name('update');
                });

                Route::group(['prefix' => 'settings', 'as' => 'settings.'], function () {
                    Route::get('/', [SettingController::class, 'index'])->name('index');
                    Route::post('/update', [SettingController::class, 'update'])->name('update');
                });

                Route::group(['prefix' => 'menu', 'as' => 'menu.'], function () {
                    Route::get('/', [MenuController::class, 'index'])->name('index');
                    Route::get('/create', [MenuController::class, 'create'])->name('create');
                    Route::get('/edit/{id}', [MenuController::class, 'edit'])->name('edit');
                    Route::get('/delete/{id}', [MenuController::class, 'destroy'])->name('delete');
                    Route::post('/store', [MenuController::class, 'store'])->name('store');
                    Route::post('/update/{id}', [MenuController::class, 'update'])->name('update');
                    Route::post('/sort', [MenuController::class, 'sort'])->name('sort');
                });

                Route::group(['prefix' => 'banner', 'as' => 'banner.'], function () {
                    Route::get('/', [BannerController::class, 'index'])->name('index');
                    Route::get('/create', [BannerController::class, 'create'])->name('create');
                    Route::get('/edit/{id}', [BannerController::class, 'edit'])->name('edit');
                    Route::get('/delete/{id}', [BannerController::class, 'destroy'])->name('delete');
                    Route::post('/store', [BannerController::class, 'store'])->name('store');
                    Route::post('/update/{id}', [BannerController::class, 'update'])->name('update');
                    Route::post('/sort', [BannerController::class, 'sort'])->name('sort');
                });

                Route::group(['prefix' => 'services', 'as' => 'services.'], function () {
                    Route::get('/', [ServiceController::class, 'index'])->name('index');
                    Route::get('/create', [ServiceController::class, 'create'])->name('create');
                    Route::get('/edit/{id}', [ServiceController::class, 'edit'])->name('edit');
                    Route::get('/delete/{id}', [ServiceController::class, 'destroy'])->name('delete');
                    Route::post('/store', [ServiceController::class, 'store'])->name('store');
                    Route::post('/update/{id}', [ServiceController::class, 'update'])->name('update');
                    Route::post('/sort', [ServiceController::class, 'sort'])->name('sort');
                });

                Route::group(['prefix' => 'about', 'as' => 'about.'], function () {
                    Route::get('/', [AboutController::class, 'index'])->name('index');
                    Route::post('/update', [AboutController::class, 'update'])->name('update');
                });

                Route::group(['prefix' => 'about_report', 'as' => 'about_report.'], function () {
                    Route::get('/', [AboutReportController::class, 'index'])->name('index');
                    Route::get('/create', [AboutReportController::class, 'create'])->name('create');
                    Route::get('/edit/{id}', [AboutReportController::class, 'edit'])->name('edit');
                    Route::get('/delete/{id}', [AboutReportController::class, 'destroy'])->name('delete');
                    Route::post('/store', [AboutReportController::class, 'store'])->name('store');
                    Route::post('/update/{id}', [AboutReportController::class, 'update'])->name('update');
                    Route::post('/sort', [AboutReportController::class, 'sort'])->name('sort');
                });

                Route::group(['prefix' => 'about_text', 'as' => 'about_text.'], function () {
                    Route::get('/', [AboutTextController::class, 'index'])->name('index');
                    Route::get('/create', [AboutTextController::class, 'create'])->name('create');
                    Route::get('/edit/{id}', [AboutTextController::class, 'edit'])->name('edit');
                    Route::get('/delete/{id}', [AboutTextController::class, 'destroy'])->name('delete');
                    Route::post('/store', [AboutTextController::class, 'store'])->name('store');
                    Route::post('/update/{id}', [AboutTextController::class, 'update'])->name('update');
                    Route::post('/sort', [AboutTextController::class, 'sort'])->name('sort');
                });

                Route::group(['prefix' => 'team', 'as' => 'team.'], function () {
                    Route::get('/', [TeamController::class, 'index'])->name('index');
                    Route::get('/create', [TeamController::class, 'create'])->name('create');
                    Route::get('/edit/{id}', [TeamController::class, 'edit'])->name('edit');
                    Route::get('/delete/{id}', [TeamController::class, 'destroy'])->name('delete');
                    Route::post('/store', [TeamController::class, 'store'])->name('store');
                    Route::post('/update/{id}', [TeamController::class, 'update'])->name('update');
                    Route::post('/sort', [TeamController::class, 'sort'])->name('sort');
                });
            });
        });

        Route::get('/', [SiteController::class, 'home'])->name('home');

        Route::get('/iane-et', [SiteController::class, 'donate'])->name('donate_az');
        Route::get('/donate', [SiteController::class, 'donate'])->name('donate_en');
        Route::get('/pozertvuite', [SiteController::class, 'donate'])->name('donate_ru');

        Route::get('/konullu-ol', [SiteController::class, 'volunteer'])->name('volunteer_az');
        Route::get('/volunteer', [SiteController::class, 'volunteer'])->name('volunteer_en');
        Route::get('/volonter', [SiteController::class, 'volunteer'])->name('volunteer_ru');

        Route::get('/haqqimizda', [SiteController::class, 'about'])->name('about_az');
        Route::get('/about-us', [SiteController::class, 'about'])->name('about_en');
        Route::get('/o-nas', [SiteController::class, 'about'])->name('about_ru');

        Route::get('/layihelerimiz', [SiteController::class, 'projects'])->name('projects_az');
        Route::get('/our-projects', [SiteController::class, 'projects'])->name('projects_en');
        Route::get('/nasi-proekty', [SiteController::class, 'projects'])->name('projects_ru');

        Route::get('/xidmetlerimiz', [SiteController::class, 'services'])->name('services_az');
        Route::get('/our-services', [SiteController::class, 'services'])->name('services_en');
        Route::get('/nasi-servisy', [SiteController::class, 'services'])->name('services_ru');

        Route::get('/qalereya', [SiteController::class, 'gallery'])->name('gallery_az');
        Route::get('/gallery', [SiteController::class, 'gallery'])->name('gallery_en');
        Route::get('/galereia', [SiteController::class, 'gallery'])->name('gallery_ru');

        Route::get('/hesabat', [SiteController::class, 'report'])->name('report_az');
        Route::get('/report', [SiteController::class, 'report'])->name('report_en');
        Route::get('/otcet', [SiteController::class, 'report'])->name('report_ru');

        Route::get('/nece-isleyirik', [SiteController::class, 'how_we_work'])->name('how_we_work_az');
        Route::get('/how-we-work', [SiteController::class, 'how_we_work'])->name('how_we_work_en');
        Route::get('/kak-my-rabotaem', [SiteController::class, 'how_we_work'])->name('how_we_work_ru');

        Route::get('/mediada-biz', [SiteController::class, 'we_in_media'])->name('we_in_media_az');
        Route::get('/we-in-the-media', [SiteController::class, 'we_in_media'])->name('we_in_media_en');
        Route::get('/my-v-smi', [SiteController::class, 'we_in_media'])->name('we_in_media_ru');

        Route::get('/elaqe', [SiteController::class, 'contact'])->name('contact_az');
        Route::get('/contact', [SiteController::class, 'contact'])->name('contact_en');
        Route::get('/kontakt', [SiteController::class, 'contact'])->name('contact_ru');
    });
});
