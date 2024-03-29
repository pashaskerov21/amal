<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="{{ asset('front-assets/assets/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front-assets/sass/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('front-assets/sass/update.css') }}" />
    <link rel="stylesheet" href="{{ asset('front-assets/assets/swiper/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front-assets/assets/animate_css/animate.min.css') }}">
    <link rel="stylesheet" href="https://cdn.givecloud.co/npm/odometer@0.4.8/themes/odometer-theme-default.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('front-assets/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('front-assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('front-assets/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('front-assets/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('front-assets/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    @stack('meta')
    <meta name="description" content="{{ $settings->getTranslate->where('lang', Session('lang'))->first()->description }}">
    <link rel="author" href="{{$settings->author_url}}">
    <meta name="author" content="{{ $settings->getTranslate->where('lang', Session('lang'))->first()->author }}">
    <meta name="keywords" content="{{ $settings->getTranslate->where('lang', Session('lang'))->first()->keywords }}">
    <meta property="og:description" content="{{ $settings->getTranslate->where('lang', Session('lang'))->first()->description }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('front-assets/images/amal-logo-dark.svg') }}">
    <meta name="twitter:description" content="{{ $settings->getTranslate->where('lang', Session('lang'))->first()->description }}">
    <meta name="twitter:image" content="{{ asset('front-assets/images/amal-logo-dark.svg') }}">
    


    @if (Session('lang') === 'az')
        <meta property="og:locale" content="az_AZ">
        <meta property="og:locale:alternate" content="en_GB">
        <meta property="og:locale:alternate" content="ru_RU">
    @elseif(Session('lang') === 'en')
        <meta property="og:locale" content="en_GB">
        <meta property="og:locale:alternate" content="az_AZ">
        <meta property="og:locale:alternate" content="ru_RU">
    @elseif(Session('lang') === 'ru')
        <meta property="og:locale" content="ru_RU">
        <meta property="og:locale:alternate" content="az_AZ">
        <meta property="og:locale:alternate" content="en_GB">
    @else
        <meta property="og:locale" content="az_AZ">
        <meta property="og:locale:alternate" content="en_GB">
        <meta property="og:locale:alternate" content="ru_RU">
    @endif
</head>

<body>

    @include('site.partials.header')
    @yield('content')
    <div class="apply" style="background-color: #F4F5FA;">
        <div class="container">
            <div class="row align-items-center py-3">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="title">{{ __('main.subscribe_text') }}</div>
                </div>
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="apply-form">
                        <form action="">
                            <div class="form-group">
                                <input type="text" placeholder="{{ __('main.enter_email_address') }}">
                                <button>{{ __('main.subscribe') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('site.partials.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @stack('report_js')
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    @stack('gallery_grid')
    <script src="{{ asset('front-assets/assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front-assets/assets/swiper/swiper-bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/odometer@0.4.8/odometer.js"></script>
    <script src="{{ asset('front-assets/js/slider.js') }}"></script>
    <script src="{{ asset('front-assets/js/counter.js') }}"></script>
    <script src="{{ asset('front-assets/js/script.js') }}"></script>
</body>

</html>
