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
    <a href="{{$settings->whatsapp}}" class="wp-apply">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#fff" class="bi bi-whatsapp"
            viewBox="0 0 16 16">
            <path
                d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232">
            </path>
        </svg>
    </a>
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
