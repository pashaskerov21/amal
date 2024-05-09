<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DonateMessage;
use Illuminate\Http\Request;

class DonateMessageController extends Controller
{
    public function index()
    {
        $donate_messages = DonateMessage::all();
        $path = '/admin/donate_messages';
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.donate_messages.index', compact('lang', 'donate_messages'));
    }
    public function store(Request $request)
    {
        DonateMessage::create([
            'service_id' => $request['service_id'] ?? 0,
            'fullname' => $request['fullname'],
            'phone' => $request['phone'],
            'email' => $request['email'] ?? null,
            'amount' => $request['amount'] ?? null,
            'note' => $request['note'] ?? null,
        ]);
        return redirect()->back()->with('donate_message_store_success', 'true');        
    }
    public function view(string $id)
    {
        $message = DonateMessage::findOrFail($id);
        $path = '/admin/donate_messages/edit/'.$id;
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.donate_messages.view',compact('lang','message'));
    }
}
