<header class="general-header">
    <div class="container">
        <div class="header-top">
            <div class="row align-items-center justidy-content-between">
                <div class="col-xl-3 col-lg-2 col-6">
                    <div class="header-logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('front-assets/images/amal-logo-dark.svg') }}" alt="amal-logo">
                        </a>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 d-lg-block d-none">
                    <!--<form action="{{ route('search') }}" method="GET" autocomplete="off">-->
                    <!--    <div class="form-group">-->
                    <!--        <input type="text" placeholder="{{ __('main.search') }}" name="query" required>-->
                    <!--        <button type="submit">-->
                    <!--            <img src="{{ asset('front-assets/images/search.svg') }}" alt="search">-->
                    <!--        </button>-->
                    <!--    </div>-->
                    <!--</form>-->
                    <div class="slogan">Xeyir işlərdə yarışın!</div>
                </div>
                <div class="col-lg-4 col-6 d-flex align-items-center justify-content-end">
                    <div class="header-button-group">
                        <a href="{{ route('donate_' . Session('lang')) }}">{{ __('main.iane_et') }}</a>
                        <a href="{{ route('volunteer_' . Session('lang')) }}">{{ __('main.konullu_ol') }}</a>
                    </div>
                    @include('site.components.language')
                    <div class="menu-icon">
                        <i class="fa-solid fa-bars"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="d-md-flex d-lg-none align-items-center">
                <div class="d-flex mb-2 w-100 align-items-center justify-content-between">
                    <div class="header-logo">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('front-assets/images/amal-logo.png') }}" alt="amal logo">
                        </a>
                    </div>

                    <div class="mobile-menu-close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-x" viewBox="0 0 16 16">
                            <path
                                d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                        </svg>
                    </div>
                </div>
            </div>

            <nav>
                <ul class="nav-list">
                    @foreach ($menues as $menu)
                        <li class="nav-item">
                            @if (Session('lang') === 'az')
                                <a href="/{{ $menu->getTranslate->where('lang', Session('lang'))->first()->slug }}"
                                    class="nav-link">
                                    {{ $menu->getTranslate->where('lang', Session('lang'))->first()->title }}
                                </a>
                            @else
                                <a href="/{{ Session('lang') }}/{{ $menu->getTranslate->where('lang', Session('lang'))->first()->slug }}"
                                    class="nav-link">
                                    {{ $menu->getTranslate->where('lang', Session('lang'))->first()->title }}
                                </a>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </nav>
            <div class="header-button-group mt-3">
                <a href="{{ route('donate_' . Session('lang')) }}">{{ __('main.iane_et') }}</a>
                <a href="{{ route('volunteer_' . Session('lang')) }}">{{ __('main.konullu_ol') }}</a>
            </div>
            <ul class="info pt-40">
                <li>
                    <i class="fa-solid primary-color fa-location-dot"></i>
                    <a href="">
                        {{ $settings->getTranslate->where('lang', Session('lang'))->first()->address_text }}    
                    </a>
                </li>
                <li class="py-2">
                    <i class="fa-solid primary-color fa-phone-volume"></i>
                    <a href="tel:{{ $settings->phone }}">{{ $settings->phone }}</a>
                </li>
                <li>
                    <i class="fa-solid primary-color fa-paper-plane"></i>
                    <a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a>
                </li>
            </ul>
            <ul class="social-links">
                <li>
                    <a href="{{ $settings->facebook }}" target="_blank">
                        <img src="{{ asset('front-assets/images/facebook.svg') }}" alt="">
                    </a>
                </li>
                <li>
                    <a href="{{ $settings->youtube }}" target="_blank">
                        <img src="{{ asset('front-assets/images/yt.svg') }}" alt="">
                    </a>
                </li>
                <li>
                    <a href="{{ $settings->twitter }}" target="_blank">
                        <img style="border-radius: 50%;" src="{{ asset('front-assets/images/x.png') }}"alt="">
                    </a>
                </li>
                <li>
                    <a href="{{ $settings->linkedin }}" target="_blank">
                        <img src="{{ asset('front-assets/images/in.svg') }}" alt="">
                    </a>
                </li>
                <li>
                    <a href="{{ $settings->instagram }}" target="_blank">
                        <img src="{{ asset('front-assets/images/instagram.svg') }}" alt="">
                    </a>
                </li>
            </ul>
            @include('site.components.language')
        </div>

        <div class="overlay"></div>
    </div>
</header>

