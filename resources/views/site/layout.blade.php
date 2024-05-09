<!DOCTYPE html>
<html lang="az">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('front-assets/assets/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front-assets/sass/style.css?v=') . env('ASSET_VERSION') }} }}" />
    <link rel="stylesheet" href="{{ asset('front-assets/sass/update.css?v=') . env('ASSET_VERSION') }} }}" />
    <link rel="stylesheet" href="{{ asset('front-assets/assets/swiper/swiper-bundle.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front-assets/assets/animate_css/animate.min.css') }}">
    <link rel="stylesheet" href="https://cdn.givecloud.co/npm/odometer@0.4.8/themes/odometer-theme-default.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('front-assets/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('front-assets/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('front-assets/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('front-assets/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('front-assets/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    @stack('meta')
    <meta name="description"
        content="{{ $settings->getTranslate->where('lang', Session('lang'))->first()->description }}">
    <link rel="author" href="{{ $settings->author_url }}">
    <meta name="author" content="{{ $settings->getTranslate->where('lang', Session('lang'))->first()->author }}">
    <meta name="keywords" content="{{ $settings->getTranslate->where('lang', Session('lang'))->first()->keywords }}">
    <meta property="og:description"
        content="{{ $settings->getTranslate->where('lang', Session('lang'))->first()->description }}">
    <meta property="og:type" content="website">
    <meta property="og:image" content="{{ asset('front-assets/images/amal-logo-dark.svg') }}">
    <meta name="twitter:description"
        content="{{ $settings->getTranslate->where('lang', Session('lang'))->first()->description }}">
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
<style>

</style>

<body>
    <div class="back-to-top">
        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
            class="bi bi-chevron-up" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M7.646 4.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1-.708.708L8 5.707l-5.646 5.647a.5.5 0 0 1-.708-.708z">
            </path>
        </svg>
    </div>
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
                        <form action="{{ route('admin.subscribers.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="email" name="email"
                                    placeholder="{{ __('main.enter_email_address') }}" required>
                                <button>{{ __('main.subscribe') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('site.partials.footer')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @stack('report_js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (Session::has('subscriber_store_success'))
        <script>
            Swal.fire({
                position: "top-end",
                icon: "success",
                text: "{{ __('main.subscriber_store_success') }}",
                showConfirmButton: false,
                timer: 1000
            });
        </script>
    @endif
    @if (Session::has('donate_message_store_success'))
        <script>
            Swal.fire({
                position: "top-end",
                icon: "success",
                text: "{{ __('main.donate_message_store_success') }}",
                showConfirmButton: false,
                timer: 1000
            })
        </script>
    @endif
    @if (Session::has('volunteer_message_store_success'))
        <script>
            Swal.fire({
                position: "top-end",
                icon: "success",
                text: "{{ __('main.volunteer_message_store_success') }}",
                showConfirmButton: false,
                timer: 1000
            })
        </script>
    @endif
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    @stack('gallery_grid')
    <script src="{{ asset('front-assets/assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front-assets/assets/swiper/swiper-bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/odometer@0.4.8/odometer.js"></script>
    <script src="{{ asset('front-assets/js/slider.js?v=') . env('ASSET_VERSION') }} }}"></script>
    <script src="{{ asset('front-assets/js/counter.js?v=') . env('ASSET_VERSION') }} }}"></script>
    <script src="{{ asset('front-assets/js/script.js?v=') . env('ASSET_VERSION') }} }}"></script>
</body>

</html>
