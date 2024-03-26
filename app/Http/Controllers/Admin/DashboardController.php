<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $lang = ['az' => '/admin/dashboard','en' => '/en/admin/dashboard', 'ru' => '/ru/admin/dashboard'];
        return view('admin-panel.dashboard.index',compact(['lang']));
    }
}
