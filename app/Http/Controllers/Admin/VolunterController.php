<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class VolunterController extends Controller
{
    public function index()
    {
        $volunteers = Volunteer::all();
        $path = '/admin/volunteers';
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.volunteers.index', compact('lang', 'volunteers'));
    }
    public function store(Request $request)
    {
        $image = null;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $image = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/volunteers', $image);
        }
        Volunteer::create([
            'fullname' => $request['fullname'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'birthday' => $request['birthday'],
            'image' => $image,
            'gender' => $request['gender'],
            'note' => $request['note'],
        ]);
        return redirect()->back()->with('volunteer_message_store_success', 'true');        
    }
    public function view(string $id)
    {
        $volunteer = Volunteer::findOrFail($id);
        $path = '/admin/volunteers/edit/'.$id;
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.volunteers.view',compact('lang','volunteer'));
    }
}
