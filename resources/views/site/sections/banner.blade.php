<section class="hero-section" id="hero-section">
    <div class="swiper hero-section-slider">
        <div class="swiper-wrapper">
            @foreach ($banners as $banner)
                <div class="swiper-slide"
                    style="background-image: url('{{ asset('storage/uploads/banner/' . $banner->image) }}');">
                    <div class="slider-item">
                        <h1>
                            {{ $banner->getTranslate->where('lang', Session('lang'))->first()->title }}
                        </h1>
                        <p>
                            {{ $banner->getTranslate->where('lang', Session('lang'))->first()->text }}
                        </p>
                        <a href="{{ route('donate_' . Session('lang')) }}">{{ __('main.iane_et') }}</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>
    <ul class="banner-two__social">
        <li>
            <a href="{{ $settings->facebook }}" target='_blank'><i class="fa-brands fa-facebook-f"></i></a>
        </li>
        <li>
            <a href="{{ $settings->twitter }}" target='_blank' class="active"><i class="fa-brands fa-twitter"></i></a>
        </li>
        <li>
            <a href="{{ $settings->linkedin }}" target='_blank'><i class="fa-brands fa-linkedin-in"></i></a>
        </li>
    </ul>
    <div class="banner-two__arry-btn">
        <button class="arry-prev active mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0" />
            </svg></button>
        <button class="arry-next"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
            </svg>
        </button>
    </div>
</section>
