<div class="breadcrumb" style="background-image: url('{{asset('front-assets/images/breadcrumb-bg.png')}}');">
    <div class="content">
        <div class="breadcrumb-title">{{$meta_title}}</div>
        <ul>
            <li>
                <a href="{{route('home')}}">{{ __('main.home') }}</a>
            </li>
            <li>{{$meta_title}}</li>
        </ul>
    </div>
</div>
