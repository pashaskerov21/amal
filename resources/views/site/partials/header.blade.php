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
                    <form action="">
                        <div class="form-group">
                            <input type="text" placeholder="Axtar">
                            <button type="submit">
                                <img src="{{ asset('front-assets/images/search.svg') }}" alt="search">
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 col-6 d-flex justify-content-end">
                    <div class="header-button-group">
                        <a href="{{route('donate_'.Session('lang'))}}">{{ __('main.iane_et') }}</a>
                        <a href="{{route('volunteer_'.Session('lang'))}}">{{ __('main.konullu_ol') }}</a>
                    </div>
                    @include('site.components.language')
                    <div class="menu-icon">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom">
            <div class="d-md-flex d-lg-none align-items-center gap-3 mb-3">
                <form action="">
                    <div class="form-group">
                        <input type="text" placeholder="Axtar">
                        <button type="submit"><img src="{{ asset('front-assets/images/search.svg') }}"
                                alt="search"></button>
                    </div>
                </form>
                <div class="mobile-menu-close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-x" viewBox="0 0 16 16">
                        <path
                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                    </svg>
                </div>
            </div>

            <nav>
                <ul class="nav-list">
                    @foreach ($menues as $menu)
                        <li class="nav-item">
                            @if (Session('lang') === 'az')
                                <a href="{{ $menu->getTranslate->where('lang', Session('lang'))->first()->slug }}"
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
                <a href="{{route('donate_'.Session('lang'))}}">{{ __('main.iane_et') }}</a>
                <a href="{{route('volunteer_'.Session('lang'))}}">{{ __('main.konullu_ol') }}</a>
            </div>
            @include('site.components.language')
        </div>
    </div>
</header>
