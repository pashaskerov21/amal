<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreRequest;
use App\Http\Requests\Auth\UpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('destroy', 0)->get();
        $lang = ['az' => '/admin/users','en' => '/en/admin/users', 'ru' => '/ru/admin/users'];
        return view('admin-panel.users.index', compact('lang','users'));
    }
    public function create()
    {
        return view('admin-panel.users.add');
    }
    public function store(StoreRequest $request)
    {
        $emailExist = User::where('email', $request['email'])->first();
        if($emailExist){
            return redirect()->route('admin.users.create')->with('email_exist_error', 'true');
        }
        User::create([
            "name" => $request["name"],
            "email" => $request["email"],
            "password" => Hash::make($request["password"]),
        ]);
        return redirect()->route('admin.users.index')->with('store_message', 'Uğurla əlavə edildi');
    }
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $lang = ['az' => '/admin/users/edit/'.$id,'en' => '/en/admin/users/edit/'.$id, 'ru' => '/ru/admin/users/edit/'.$id];
        return view('admin-panel.users.edit', compact('lang','user'));
    }
    public function update(UpdateRequest $request, string $id)
    { 
        $user = User::findOrFail($id);
        $emailExist = User::where('email', $request['email'])->first();
        if($request['email'] !== $user['email'] && $emailExist){
            return redirect()->route('admin.users.edit', ['id' => $id])->with('email_exist_error', 'true');
        }
        if (!Hash::check($request['current_password'], $user['password'])) {
            return redirect()->back()->with('incorrect_current_password', 'true');
        }
        
        $password = $request["new_password"] ? Hash::make($request["new_password"]) : Hash::make($request["current_password"]);
        $user->update([
            "name" => $request["name"],
            "email" => $request["email"],
            "password" => $password,
        ]);
        return redirect()->route('admin.users.index')->with('update_message', 'Dəyişikliklər uğurla yadda saxlanıldı');
    }
    public function destroy(string $id){
        User::where('id', $id)->update([
            'destroy' => 1,
        ]);
        return redirect()->route('admin.users.index')->with('delete_message','Uğurla silindi');
    }
}
