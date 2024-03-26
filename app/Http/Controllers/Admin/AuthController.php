<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin-panel.auth.login');
    }
    public function login(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin.login')->with('login_error', 'login_error_message');
        }
    }
    public function logout()
    {
        auth()->logout();
        return view('admin-panel.auth.logout');
    }
}
