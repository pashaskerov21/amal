<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                <div class="footer-logo"><img src="{{ asset('front-assets/images/amal-logo.png') }}" alt="amal logo"></div>
                <a href="{{route('donate_'.Session('lang'))}}" class="general-btn">{{ __('main.iane_et') }}</a>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                <div class="footer-col">
                    <nav>
                        <ul>
                            @foreach ($menues_1 as $menu)
                                <li>
                                    @if (Session('lang') === 'az')
                                        <a
                                            href="/{{ $menu->getTranslate->where('lang', Session('lang'))->first()->slug }}">
                                            {{ $menu->getTranslate->where('lang', Session('lang'))->first()->title }}
                                        </a>
                                    @else
                                        <a
                                            href="/{{ Session('lang') }}/{{ $menu->getTranslate->where('lang', Session('lang'))->first()->slug }}">
                                            {{ $menu->getTranslate->where('lang', Session('lang'))->first()->title }}
                                        </a>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                <div class="footer-col">
                    <nav>
                        <ul>
                            @foreach ($menues_2 as $menu)
                                <li>
                                    @if (Session('lang') === 'az')
                                        <a
                                            href="/{{ $menu->getTranslate->where('lang', Session('lang'))->first()->slug }}">
                                            {{ $menu->getTranslate->where('lang', Session('lang'))->first()->title }}
                                        </a>
                                    @else
                                        <a
                                            href="/{{ Session('lang') }}/{{ $menu->getTranslate->where('lang', Session('lang'))->first()->slug }}">
                                            {{ $menu->getTranslate->where('lang', Session('lang'))->first()->title }}
                                        </a>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 mb-3">
                <div class="footer-col">
                    <ul class="general-info">
                        <li>
                            <img src="{{ asset('front-assets/images/Location.svg') }}">
                            <span>{{$settings->getTranslate->where('lang', Session('lang'))->first()->address_text}}</span>
                        </li>
                        <li>
                            <img src="{{ asset('front-assets/images/Call.svg') }}" alt="">
                            <span>{{$settings->phone}}</span>
                        </li>
                        <li>
                            <img src="{{ asset('front-assets/images/Message 35.svg') }}" alt="">
                            <span>{{$settings->email}}</span>
                        </li>
                    </ul>
                    <ul class="social-links">
                        <li>
                            <a href="{{$settings->youtube}}" target="_blank">
                                <img src="{{ asset('front-assets/images/yt.svg') }}" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="{{$settings->twitter}}" target="_blank">
                                <img style="border-radius: 50%;" src="{{ asset('front-assets/images/x.png') }}"alt="">
                            </a>
                        </li>
                        <li>
                            <a href="{{$settings->linkedin}}" target="_blank">
                                <img src="{{ asset('front-assets/images/in.svg') }}" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="{{$settings->instagram}}" target="_blank">
                                <img src="{{ asset('front-assets/images/instagram.svg') }}" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright">
            {{$settings->getTranslate->where('lang', Session('lang'))->first()->copyright}}
        </div>
    </div>
</footer>
