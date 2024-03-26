<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\AboutTranslate;
use App\Models\Menu;
use App\Models\MenuTranslate;
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
    }
}
