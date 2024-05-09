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
<a href=" https://wa.me/+99450" class="wp-apply">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#fff" class="bi bi-whatsapp"
        viewBox="0 0 16 16">
        <path
            d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232">
        </path>
    </svg>
</a>
