<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\VolunteerApplicationRequest;
use App\Models\VolunteerApplication;
use Illuminate\Http\Request;

class VolunteerApplicationController extends Controller
{
    public function index()
    {
        $volunteer_applications = VolunteerApplication::all();
        $path = '/admin/volunteer_applications';
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.volunteer_applications.index', compact('lang', 'volunteer_applications'));
    }
    public function store(VolunteerApplicationRequest $request)
    {
        $image = null;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $image = time() . $file->getClientOriginalName();
            $file->storeAs('public/uploads/volunteer_applications', $image);
        }
        VolunteerApplication::create([
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
        $volunteer_application = VolunteerApplication::findOrFail($id);
        $path = '/admin/volunteers/edit/'.$id;
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.volunteer_applications.view',compact('lang','volunteer_application'));
    }
}
