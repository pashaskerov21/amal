<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="{{ asset('front-assets/assets/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front-assets/sass/style.css') }}" />
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


    <style>
        .about-text * {
            background-color: transparent !important;
            color: #212529 !important;
        }
        .txt * {
            background-color: transparent !important;
            color: #212529 !important;
        }
    </style>
    <style>
        .gallery_section {
            width: 100%;
            padding: 40px 0;
        }
        .gallery_grid{
            width: 100%
        }
    
        .gallery_item {
            display: block;
            width: 100%;
            max-width: 100%;
            margin-bottom: 20px;
            border-radius: 10px;
            position: relative;
        }
    
        .gallery_item .zoom {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-color: #7BC18F;
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            opacity: 0;
            transition: 0.3s ease;
        }
    
        .gallery_item:hover .zoom {
            opacity: 1;
        }
    
        @media (min-width: 768px) {
            .gallery_item {
                width: 48%;
            }
        }
    
        @media (min-width: 1200px) {
            .gallery_item {
                width: 31%;
            }
        }
    
        .gallery_item img {
            width: 100%;
            max-width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 10px;
        }
    </style>
    <style>
        .project_progress_bar{
            width: 100%;
            position: relative;
            height: 30px;
            margin: 15px 0;
        }
        .project_progress_bar .progress_1{
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            width: 100%;
            height: 10px;
            background-color: #D9D9D9;
            z-index: 1;
        }
        .project_progress_bar .progress_2{
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            height: 10px;
            background-color: #0E3654;
            z-index: 2;
        }
        .progress_result{
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 3;
            width: 56px;
            height: 30px;
            background-color: #7BC18F;
            color: #fff;
            font-family: Poppins, sans-serif;
            font-weight: 700;
            letter-spacing: 1px;
            font-size: 16px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
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
