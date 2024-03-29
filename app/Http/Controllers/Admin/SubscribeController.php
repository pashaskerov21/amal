<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::all();
        $path = '/admin/subscribers';
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.subscribers.index', compact('lang', 'subscribers'));
    }
    public function store(Request $request)
    {
        if($request['email']){
            Subscriber::create([
                'email' => $request['email']
            ]);
            return redirect()->back()->with('subscriber_store_success', 'true');
        }        
    }
}
