<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\StoreRequest;
use App\Http\Requests\Project\UpdateRequest;
use App\Models\Project;
use App\Models\ProjectGallery;
use App\Models\ProjectTranslate;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::where('destroy', 0)->orderBy('order')->get();
        $path = '/admin/projects';
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.projects.index', compact('lang', 'projects'));
    }
    public function create()
    {
        $path = '/admin/projects/create';
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.projects.add', compact('lang'));
    }
    public function store(StoreRequest $request){
        for($i = 0; $i < count($request->title); $i++){
            $titleExist = ProjectTranslate::where([
                'title' => $request['title'][$i],
                'destroy' => 0,
            ])->first();   
            if($titleExist){
                return redirect()->back()->with('title_exist_error', 'true');
            }
        }

        $card_image = null;
        $banner_image = null;
        if ($request->hasFile('card_image')) {
            $card_image_file = $request->card_image;
            $card_image = time() . $card_image_file->getClientOriginalName();
            $card_image_file->storeAs('public/uploads/projects', $card_image);
        }
        if ($request->hasFile('banner_image')) {
            $banner_image_file = $request->banner_image;
            $banner_image = time() . $banner_image_file->getClientOriginalName();
            $banner_image_file->storeAs('public/uploads/projects', $banner_image);
        }
        $maxOrder = Project::max('order');
        $newOrder = ($maxOrder === null) ? 1 : $maxOrder + 1;
        $project_status = $request['current_amount'] >= $request['final_amount'] ? 1 : 0;

        $project_percent = 0;
        if($request['final_amount'] != 0){
            $project_percent = $request['current_amount'] / $request['final_amount'] * 100;
        }
        
        $project_id = Project::create([
            'status' => $project_status,
            'current_amount' => $request['current_amount'],
            'final_amount' => $request['final_amount'],
            'percent' => $project_percent > 100 ? 100 : round($project_percent),
            'card_image' => $card_image,
            'banner_image' => $banner_image,
            'order' => $newOrder,
        ])->id;

        if ($request["gallery"] && count($request["gallery"]) > 0) {
            foreach ($request["gallery"] as $gallery_file) {
                if ($gallery_file->isValid()) {
                    $gallery_image = time() . $gallery_file->getClientOriginalName();
                    $gallery_file->storeAs('public/uploads/projects/gallery', $gallery_image);

                    $imageMaxOrder = ProjectGallery::max('order');
                    $imageNewOrder = ($imageMaxOrder === null) ? 1 : $imageMaxOrder + 1;
                    ProjectGallery::create([
                        'project_id' => $project_id,
                        "image" => $gallery_image,
                        "order" => $imageNewOrder,
                    ]);
                }
            }
        }

        for($i = 0; $i < count($request->lang); $i++){
            ProjectTranslate::create([
                'project_id' => $project_id,
                'title' => $request['title'][$i],
                'slug' => Str::slug($request['title'][$i]),
                'date' => $request['date'][$i],
                'location' => $request['location'][$i],
                'category' => $request['category'][$i],
                'card_text' => $request['card_text'][$i],
                'main_text' => $request['main_text'][$i],
                'meta_description' => $request['meta_description'][$i],
                'lang' => $request['lang'][$i],
            ]);
        };
        return redirect()->route('admin.projects.index')->with('store_message', 'true');
    }
    public function edit(string $id)
    {
        $project = Project::findOrFail($id);
        $path = '/admin/projects/edit/'.$id;
        $lang = ['az' => $path, 'en' => '/en' . $path, 'ru' => '/ru' . $path];
        return view('admin-panel.projects.edit',compact('lang','project'));
    }
    public function update(UpdateRequest $request, string $id){
        
        $project = Project::findOrFail($id);
        for($i = 0; $i < count($request->title); $i++){
            $titleExist = ProjectTranslate::where([
                'title' => $request['title'][$i],
                'destroy' => 0,
            ])->first();   
            if($titleExist && $titleExist->id != $id){
                return redirect()->back()->with('title_exist_error', 'true');
            }
        }
        $card_image = $project->card_image;
        $banner_image =  $project->banner_image;
        if ($request->hasFile('card_image')) {
            $card_image_file = $request->card_image;
            $card_image = time() . $card_image_file->getClientOriginalName();
            $card_image_file->storeAs('public/uploads/projects', $card_image);
        }
        if ($request->hasFile('banner_image')) {
            $banner_image_file = $request->banner_image;
            $banner_image = time() . $banner_image_file->getClientOriginalName();
            $banner_image_file->storeAs('public/uploads/projects', $banner_image);
        }
        if ($request["gallery"] && count($request["gallery"]) > 0) {
            foreach ($request["gallery"] as $gallery_file) {
                if ($gallery_file->isValid()) {
                    $gallery_image = time() . $gallery_file->getClientOriginalName();
                    $gallery_file->storeAs('public/uploads/projects/gallery', $gallery_image);

                    $imageMaxOrder = ProjectGallery::max('order');
                    $imageNewOrder = ($imageMaxOrder === null) ? 1 : $imageMaxOrder + 1;
                    ProjectGallery::create([
                        'project_id' => $id,
                        "image" => $gallery_image,
                        "order" => $imageNewOrder,
                    ]);
                }
            }
        }
        $project_status = $request['current_amount'] >= $request['final_amount'] ? 1 : 0;
        $project_percent = 0;
        if($request['final_amount'] != 0){
            $project_percent = $request['current_amount'] / $request['final_amount'] * 100;
        }
        $project->update([
            'status' => $project_status,
            'current_amount' => $request['current_amount'],
            'final_amount' => $request['final_amount'],
            'percent' => $project_percent > 100 ? 100 : round($project_percent),
            'card_image' => $card_image,
            'banner_image' => $banner_image,
        ]);
        
        for($i = 0; $i < count($request->lang); $i++){
            ProjectTranslate::where(['project_id' => $id, 'lang' => $request['lang'][$i]])->update([
                'title' => $request['title'][$i],
                'slug' => Str::slug($request['title'][$i]),
                'date' => $request['date'][$i],
                'location' => $request['location'][$i],
                'category' => $request['category'][$i],
                'card_text' => $request['card_text'][$i],
                'main_text' => $request['main_text'][$i],
                'meta_description' => $request['meta_description'][$i],
            ]);
        }
        return redirect()->route('admin.projects.index')->with('update_message', 'true');
    }
    public function sort(Request $request)
    {
        $order_data = $request['data'];
        try {
            DB::beginTransaction();

            foreach ($order_data as $data) {
                Project::where('id', $data['id'])->update(['order' => $data['order']]);
            }

            DB::commit();

            return response()->json('sort_success', 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json($e->getMessage(), 500);
        }
    }
    public function destroy(string $id)
    {
        Project::where('id', $id)->update([
            'destroy' => 1
        ]);
        ProjectTranslate::where('project_id', $id)->update([
            'destroy' => 1
        ]);
        return redirect()->route('admin.projects.index')->with('delete_message','true');
    }
    public function gallery_destroy(string $id)
    {
        ProjectGallery::where('id', $id)->update([
            'destroy' => 1
        ]);
        return redirect()->back()->with('delete_message','true');
    }
    public function gallery_sort(Request $request)
    {
        $order_data = $request['data'];
        try {
            DB::beginTransaction();

            foreach ($order_data as $data) {
                ProjectGallery::where('id', $data['id'])->update(['order' => $data['order']]);
            }

            DB::commit();

            return response()->json('sort_success', 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json($e->getMessage(), 500);
        }
    }
}
