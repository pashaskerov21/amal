<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Models\Blog;
use App\Models\MenuTranslate;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(SearchRequest $request)
    {
        $query = $request['query'];

        $lang = ['az' => '/search', 'en' => '/en/search', 'ru' => '/ru/search'];
        $projects_lang = ['az' => '/layihelerimiz', 'en' => '/en/our-projects', 'ru' => '/ru/nasi-proekty'];
        $blogs_lang = ['az' => '/mediada-biz', 'en' => '/en/we-in-the-media', 'ru' => '/ru/my-v-smi'];
        $menuTranslate = MenuTranslate::where('title', 'LIKE', '%' . $query . '%')->where('lang',Session('lang'))->first();

        $services = Service::join('service_translates as st', 'st.service_id', '=', 'services.id')
        ->where('st.lang',Session('lang'))
        ->where('st.title', 'LIKE', '%' . $query . '%')
        ->where('services.destroy',0)
        ->select('services.*')
        ->get();

        $projects = Project::join('project_translates as pt', 'pt.project_id', '=', 'projects.id')
        ->where('pt.lang', Session('lang'))
        ->where('pt.title', 'LIKE', '%' . $query . '%')
        ->where('projects.destroy',0)
        ->select('projects.*')
        ->get();

        $blogs = Blog::join('blog_translates as bt', 'bt.blog_id', '=', 'blogs.id')
        ->where('bt.lang', Session('lang'))
        ->where('bt.title', 'LIKE', '%' . $query . '%')
        ->where('blogs.destroy',0)
        ->select('blogs.*')
        ->get();

        
        if($menuTranslate){
            $route = '/';
            if($menuTranslate->lang == 'az'){
                $route = '/'.$menuTranslate->slug;
            }else{
                $route = '/'.$menuTranslate->lang .'/'.$menuTranslate->slug;
            }
            return redirect($route);
        }else{
            return view('site.pages.search', compact('lang', 'query','services','projects','projects_lang','blogs', 'blogs_lang')); 
        }
    }
}
