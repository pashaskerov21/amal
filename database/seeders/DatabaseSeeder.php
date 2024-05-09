<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\AboutTranslate;
use App\Models\Heading;
use App\Models\HeadingTranslate;
use App\Models\Menu;
use App\Models\MenuTranslate;
use App\Models\ReportMonth;
use App\Models\ReportMonthTranslate;
use App\Models\Setting;
use App\Models\SettingTranslate;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'info@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
            'user_type' => 'admin',
            'remember_token' => Str::random(10),
            'destroy' => 0,
        ]);

        Setting::create(['id' => 1]);
        SettingTranslate::create(['setting_id' => 1, 'lang' => 'az']);
        SettingTranslate::create(['setting_id' => 1, 'lang' => 'en']);
        SettingTranslate::create(['setting_id' => 1, 'lang' => 'ru']);

        About::create(['id' => 1]);
        AboutTranslate::create(['about_id' => 1, 'lang' => 'az']);
        AboutTranslate::create(['about_id' => 1, 'lang' => 'en']);
        AboutTranslate::create(['about_id' => 1, 'lang' => 'ru']);

        Menu::create(["id" => 1, "order" => 1,]);
        Menu::create(["id" => 2, "order" => 2,]);
        Menu::create(["id" => 3, "order" => 3,]);
        Menu::create(["id" => 4, "order" => 4,]);
        Menu::create(["id" => 5, "order" => 5,]);
        Menu::create(["id" => 6, "order" => 6,]);
        Menu::create(["id" => 7, "order" => 7,]);
        Menu::create(["id" => 8, "order" => 8,]);

        MenuTranslate::create(["menu_id" => 1, "lang" => "az", "title" => "Haqqımızda", "slug" => "haqqimizda"]);
        MenuTranslate::create(["menu_id" => 1, "lang" => "en", "title" => "About us", "slug" => "about-us"]);
        MenuTranslate::create(["menu_id" => 1, "lang" => "ru", "title" => "О нас", "slug" => "o-nas"]);

        MenuTranslate::create(["menu_id" => 2, "lang" => "az", "title" => "Layihələrimiz", "slug" => "layihelerimiz"]);
        MenuTranslate::create(["menu_id" => 2, "lang" => "en", "title" => "Our projects", "slug" => "our-projects"]);
        MenuTranslate::create(["menu_id" => 2, "lang" => "ru", "title" => "Наши проекты", "slug" => "nasi-proekty"]);

        MenuTranslate::create(["menu_id" => 3, "lang" => "az", "title" => "Xidmətlərimiz", "slug" => "xidmetlerimiz"]);
        MenuTranslate::create(["menu_id" => 3, "lang" => "en", "title" => "Our services", "slug" => "our-services"]);
        MenuTranslate::create(["menu_id" => 3, "lang" => "ru", "title" => "Наши сервисы", "slug" => "nasi-servisy"]);

        MenuTranslate::create(["menu_id" => 4, "lang" => "az", "title" => "Qalereya", "slug" => "qalereya"]);
        MenuTranslate::create(["menu_id" => 4, "lang" => "en", "title" => "Gallery", "slug" => "gallery"]);
        MenuTranslate::create(["menu_id" => 4, "lang" => "ru", "title" => "Галерея", "slug" => "galereia"]);

        MenuTranslate::create(["menu_id" => 5, "lang" => "az", "title" => "Hesabat", "slug" => "hesabat"]);
        MenuTranslate::create(["menu_id" => 5, "lang" => "en", "title" => "Report", "slug" => "report"]);
        MenuTranslate::create(["menu_id" => 5, "lang" => "ru", "title" => "Отчет", "slug" => "otcet"]);

        MenuTranslate::create(["menu_id" => 6, "lang" => "az", "title" => "Necə işləyirik", "slug" => "nece-isleyirik"]);
        MenuTranslate::create(["menu_id" => 6, "lang" => "en", "title" => "How we work", "slug" => "how-we-work"]);
        MenuTranslate::create(["menu_id" => 6, "lang" => "ru", "title" => "Как мы работаем", "slug" => "kak-my-rabotaem"]);

        MenuTranslate::create(["menu_id" => 7, "lang" => "az", "title" => "Mediada biz", "slug" => "mediada-biz"]);
        MenuTranslate::create(["menu_id" => 7, "lang" => "en", "title" => "We in the media", "slug" => "we-in-the-media"]);
        MenuTranslate::create(["menu_id" => 7, "lang" => "ru", "title" => "Мы в СМИ", "slug" => "my-v-smi"]);

        MenuTranslate::create(["menu_id" => 8, "lang" => "az", "title" => "Əlaqə", "slug" => "elaqe"]);
        MenuTranslate::create(["menu_id" => 8, "lang" => "en", "title" => "Contact", "slug" => "contact"]);
        MenuTranslate::create(["menu_id" => 8, "lang" => "ru", "title" => "Контакт", "slug" => "kontakt"]);

        ReportMonth::create(['id' => 1]);
        ReportMonth::create(['id' => 2]);
        ReportMonth::create(['id' => 3]);
        ReportMonth::create(['id' => 4]);
        ReportMonth::create(['id' => 5]);
        ReportMonth::create(['id' => 6]);
        ReportMonth::create(['id' => 7]);
        ReportMonth::create(['id' => 8]);
        ReportMonth::create(['id' => 9]);
        ReportMonth::create(['id' => 10]);
        ReportMonth::create(['id' => 11]);
        ReportMonth::create(['id' => 12]);
        ReportMonthTranslate::create(["month_id" => 1, "lang" => 'az', "title" => "Yanvar"]);
        ReportMonthTranslate::create(["month_id" => 1, "lang" => 'en', "title" => "January"]);
        ReportMonthTranslate::create(["month_id" => 1, "lang" => 'ru', "title" => "январь"]);
        ReportMonthTranslate::create(["month_id" => 2, "lang" => 'az', "title" => "Fevral"]);
        ReportMonthTranslate::create(["month_id" => 2, "lang" => 'en', "title" => "February"]);
        ReportMonthTranslate::create(["month_id" => 2, "lang" => 'ru', "title" => "февраль"]);
        ReportMonthTranslate::create(["month_id" => 3, "lang" => 'az', "title" => "Mart"]);
        ReportMonthTranslate::create(["month_id" => 3, "lang" => 'en', "title" => "March"]);
        ReportMonthTranslate::create(["month_id" => 3, "lang" => 'ru', "title" => "март"]);
        ReportMonthTranslate::create(["month_id" => 4, "lang" => 'az', "title" => "Aprel"]);
        ReportMonthTranslate::create(["month_id" => 4, "lang" => 'en', "title" => "April"]);
        ReportMonthTranslate::create(["month_id" => 4, "lang" => 'ru', "title" => "апрель"]);
        ReportMonthTranslate::create(["month_id" => 5, "lang" => 'az', "title" => "May"]);
        ReportMonthTranslate::create(["month_id" => 5, "lang" => 'en', "title" => "May"]);
        ReportMonthTranslate::create(["month_id" => 5, "lang" => 'ru', "title" => "май"]);
        ReportMonthTranslate::create(["month_id" => 6, "lang" => 'az', "title" => "İyun"]);
        ReportMonthTranslate::create(["month_id" => 6, "lang" => 'en', "title" => "June"]);
        ReportMonthTranslate::create(["month_id" => 6, "lang" => 'ru', "title" => "июнь"]);
        ReportMonthTranslate::create(["month_id" => 7, "lang" => 'az', "title" => "İyul"]);
        ReportMonthTranslate::create(["month_id" => 7, "lang" => 'en', "title" => "July"]);
        ReportMonthTranslate::create(["month_id" => 7, "lang" => 'ru', "title" => "июль"]);
        ReportMonthTranslate::create(["month_id" => 8, "lang" => 'az', "title" => "Avqust"]);
        ReportMonthTranslate::create(["month_id" => 8, "lang" => 'en', "title" => "August"]);
        ReportMonthTranslate::create(["month_id" => 8, "lang" => 'ru', "title" => "август"]);
        ReportMonthTranslate::create(["month_id" => 9, "lang" => 'az', "title" => "Sentyabr"]);
        ReportMonthTranslate::create(["month_id" => 9, "lang" => 'en', "title" => "September"]);
        ReportMonthTranslate::create(["month_id" => 9, "lang" => 'ru', "title" => "сентябрь"]);
        ReportMonthTranslate::create(["month_id" => 10, "lang" => 'az', "title" => "Oktyabr"]);
        ReportMonthTranslate::create(["month_id" => 10, "lang" => 'en', "title" => "October"]);
        ReportMonthTranslate::create(["month_id" => 10, "lang" => 'ru', "title" => "октябрь"]);
        ReportMonthTranslate::create(["month_id" => 11, "lang" => 'az', "title" => "Noyabr"]);
        ReportMonthTranslate::create(["month_id" => 11, "lang" => 'en', "title" => "November"]);
        ReportMonthTranslate::create(["month_id" => 11, "lang" => 'ru', "title" => "ноябрь"]);
        ReportMonthTranslate::create(["month_id" => 12, "lang" => 'az', "title" => "Dekabr"]);
        ReportMonthTranslate::create(["month_id" => 12, "lang" => 'en', "title" => "December"]);
        ReportMonthTranslate::create(["month_id" => 12, "lang" => 'ru', "title" => "декабрь"]);


        Heading::create(["id" => 1, "key" => "about"]);
        Heading::create(["id" => 2, "key" => "project"]);
        Heading::create(["id" => 3, "key" => "service"]);
        Heading::create(["id" => 4, "key" => "media"]);
        Heading::create(["id" => 5, "key" => "partner"]);
        Heading::create(["id" => 6, "key" => "volunteer"]);
        Heading::create(["id" => 7, "key" => "team"]);

        HeadingTranslate::create(["heading_id" => 1, "lang" => 'az']);
        HeadingTranslate::create(["heading_id" => 1, "lang" => 'en']);
        HeadingTranslate::create(["heading_id" => 1, "lang" => 'ru']);
        HeadingTranslate::create(["heading_id" => 2, "lang" => 'az']);
        HeadingTranslate::create(["heading_id" => 2, "lang" => 'en']);
        HeadingTranslate::create(["heading_id" => 2, "lang" => 'ru']);
        HeadingTranslate::create(["heading_id" => 3, "lang" => 'az']);
        HeadingTranslate::create(["heading_id" => 3, "lang" => 'en']);
        HeadingTranslate::create(["heading_id" => 3, "lang" => 'ru']);
        HeadingTranslate::create(["heading_id" => 4, "lang" => 'az']);
        HeadingTranslate::create(["heading_id" => 4, "lang" => 'en']);
        HeadingTranslate::create(["heading_id" => 4, "lang" => 'ru']);
        HeadingTranslate::create(["heading_id" => 5, "lang" => 'az']);
        HeadingTranslate::create(["heading_id" => 5, "lang" => 'en']);
        HeadingTranslate::create(["heading_id" => 5, "lang" => 'ru']);
        HeadingTranslate::create(["heading_id" => 6, "lang" => 'az']);
        HeadingTranslate::create(["heading_id" => 6, "lang" => 'en']);
        HeadingTranslate::create(["heading_id" => 6, "lang" => 'ru']);
        HeadingTranslate::create(["heading_id" => 7, "lang" => 'az']);
        HeadingTranslate::create(["heading_id" => 7, "lang" => 'en']);
        HeadingTranslate::create(["heading_id" => 7, "lang" => 'ru']);
    }
}
