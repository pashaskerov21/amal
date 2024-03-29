<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AboutReportController;
use App\Http\Controllers\Admin\AboutTextController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DonateMessageController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\Report\AnnualReportController;
use App\Http\Controllers\Admin\Report\MonthlyReportController;
use App\Http\Controllers\Admin\Report\ReportYearController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SubscribeController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VolunterController;
use App\Http\Controllers\Site\SearchController;
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

                Route::group(['prefix' => 'report', 'as' => 'report.'], function () {
                    Route::group(['prefix' => 'year', 'as' => 'year.'], function () {
                        Route::get('/', [ReportYearController::class, 'index'])->name('index');
                        Route::get('/create', [ReportYearController::class, 'create'])->name('create');
                        Route::get('/delete/{id}', [ReportYearController::class, 'destroy'])->name('delete');
                        Route::post('/store', [ReportYearController::class, 'store'])->name('store');
                    });
                    Route::group(['prefix' => 'annual_report', 'as' => 'annual_report.'], function () {
                        Route::get('/', [AnnualReportController::class, 'index'])->name('index');
                    });
                    Route::group(['prefix' => 'monthly_report', 'as' => 'monthly_report.'], function () {
                        Route::get('/', [MonthlyReportController::class, 'index'])->name('index');
                        Route::get('/create', [MonthlyReportController::class, 'create'])->name('create');
                        Route::get('/edit/{id}', [MonthlyReportController::class, 'edit'])->name('edit');
                        Route::get('/delete/{id}', [MonthlyReportController::class, 'destroy'])->name('delete');
                        Route::post('/store', [MonthlyReportController::class, 'store'])->name('store');
                        Route::post('/update/{id}', [MonthlyReportController::class, 'update'])->name('update');
                    });
                });

                Route::group(['prefix' => 'gallery', 'as' => 'gallery.'], function () {
                    Route::get('/', [GalleryController::class, 'index'])->name('index');
                    Route::get('/create', [GalleryController::class, 'create'])->name('create');
                    Route::get('/edit/{id}', [GalleryController::class, 'edit'])->name('edit');
                    Route::get('/delete/{id}', [GalleryController::class, 'destroy'])->name('delete');
                    Route::post('/store', [GalleryController::class, 'store'])->name('store');
                    Route::post('/update/{id}', [GalleryController::class, 'update'])->name('update');
                    Route::post('/sort', [GalleryController::class, 'sort'])->name('sort');
                });

                Route::group(['prefix' => 'projects', 'as' => 'projects.'], function () {
                    Route::get('/', [ProjectController::class, 'index'])->name('index');
                    Route::get('/create', [ProjectController::class, 'create'])->name('create');
                    Route::get('/edit/{id}', [ProjectController::class, 'edit'])->name('edit');
                    Route::get('/delete/{id}', [ProjectController::class, 'destroy'])->name('delete');
                    Route::get('/gallery_delete/{id}', [ProjectController::class, 'gallery_destroy'])->name('gallery_delete');
                    Route::post('/store', [ProjectController::class, 'store'])->name('store');
                    Route::post('/update/{id}', [ProjectController::class, 'update'])->name('update');
                    Route::post('/sort', [ProjectController::class, 'sort'])->name('sort');
                    Route::post('/gallery_sort', [ProjectController::class, 'gallery_sort'])->name('gallery_sort');
                });

                Route::group(['prefix' => 'blogs', 'as' => 'blogs.'], function () {
                    Route::get('/', [BlogController::class, 'index'])->name('index');
                    Route::get('/create', [BlogController::class, 'create'])->name('create');
                    Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('edit');
                    Route::get('/delete/{id}', [BlogController::class, 'destroy'])->name('delete');
                    Route::post('/store', [BlogController::class, 'store'])->name('store');
                    Route::post('/update/{id}', [BlogController::class, 'update'])->name('update');
                    Route::post('/sort', [BlogController::class, 'sort'])->name('sort');
                });

                Route::group(['prefix' => 'partners', 'as' => 'partners.'], function () {
                    Route::get('/', [PartnerController::class, 'index'])->name('index');
                    Route::get('/create', [PartnerController::class, 'create'])->name('create');
                    Route::get('/edit/{id}', [PartnerController::class, 'edit'])->name('edit');
                    Route::get('/delete/{id}', [PartnerController::class, 'destroy'])->name('delete');
                    Route::post('/store', [PartnerController::class, 'store'])->name('store');
                    Route::post('/update/{id}', [PartnerController::class, 'update'])->name('update');
                    Route::post('/sort', [PartnerController::class, 'sort'])->name('sort');
                });
                Route::group(['prefix' => 'subscribers', 'as' => 'subscribers.'], function () {
                    Route::get('/', [SubscribeController::class, 'index'])->name('index');
                    Route::post('/store', [SubscribeController::class, 'store'])->name('store');
                });
                Route::group(['prefix' => 'donate_messages', 'as' => 'donate_messages.'], function () {
                    Route::get('/', [DonateMessageController::class, 'index'])->name('index');
                    Route::get('/view/{id}', [DonateMessageController::class, 'view'])->name('view');
                    Route::post('/store', [DonateMessageController::class, 'store'])->name('store');
                });
                Route::group(['prefix' => 'volunteers', 'as' => 'volunteers.'], function () {
                    Route::get('/', [VolunterController::class, 'index'])->name('index');
                    Route::get('/view/{id}', [VolunterController::class, 'view'])->name('view');
                    Route::post('/store', [VolunterController::class, 'store'])->name('store');
                });
                
            });
        });

        Route::get('/', [SiteController::class, 'home'])->name('home');
        Route::get('/search', [SearchController::class, 'search'])->name('search');

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

        Route::get('/layihelerimiz/{slug}', [SiteController::class, 'project_inner'])->name('project_inner_az');
        Route::get('/our-projects/{slug}', [SiteController::class, 'project_inner'])->name('project_inner_en');
        Route::get('/nasi-proekty/{slug}', [SiteController::class, 'project_inner'])->name('project_inner_ru');

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

        Route::get('/mediada-biz/{slug}', [SiteController::class, 'media_inner'])->name('media_inner_az');
        Route::get('/we-in-the-media/{slug}', [SiteController::class, 'media_inner'])->name('media_inner_en');
        Route::get('/my-v-smi/{slug}', [SiteController::class, 'media_inner'])->name('media_inner_ru');

        Route::get('/elaqe', [SiteController::class, 'contact'])->name('contact_az');
        Route::get('/contact', [SiteController::class, 'contact'])->name('contact_en');
        Route::get('/kontakt', [SiteController::class, 'contact'])->name('contact_ru');
    });
});
