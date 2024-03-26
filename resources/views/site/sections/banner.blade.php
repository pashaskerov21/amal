<section class="hero-section" id="hero-section">
    <div class="swiper hero-section-slider">
        <div class="swiper-wrapper">
            @foreach ($banners as $banner)
                <div class="swiper-slide" style="background-image: url('{{ asset('storage/uploads/banner/' . $banner->image) }}');">
                    <div class="slider-item">
                        <h1>
                            {{$banner->getTranslate->where('lang', Session('lang'))->first()->title}}
                        </h1>
                        <p>
                            {{$banner->getTranslate->where('lang', Session('lang'))->first()->text}}
                        </p>
                        <a href="{{route('donate_'.Session('lang'))}}">{{ __('main.iane_et') }}</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>
