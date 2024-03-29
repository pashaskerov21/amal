<div class="breadcrumb mb-0" style="background-image: url('{{asset('front-assets/images/breadcrumb-bg.png')}}');">
    <div class="content">
        <div class="breadcrumb-title">{{$blog_translate->title}}</div>
        <ul>
            <li>
                <a href="{{route('home')}}">{{ __('main.home') }}</a>
            </li>
            <li>
                <a href="{{route('projects_'.Session('lang'))}}">{{ __('main.mediada_biz') }}</a>
            </li>
            <li>{{$blog_translate->title}}</li>
        </ul>
    </div>
</div>
