<section class="partners">
    <div class="container">
        <div class="team-area-header">
            <div class="section-header mb-60">
                <h5>
                    <i class="fa-solid fa-angles-left"></i>
                    {{ $headings->where('key', 'partner')->first()->getTranslate->where('lang', Session('lang'))->first()->title }}
                    <i class="fa-solid fa-angles-right"></i>
                </h5>
                <h2>
                    {{ $headings->where('key', 'partner')->first()->getTranslate->where('lang', Session('lang'))->first()->subtitle }}
                </h2>
            </div>
        </div>
        <div class="swiper partner-slider">
            <div class="swiper-wrapper">
                @foreach ($partners as $partner)
                    <div class="swiper-slide">
                        <div class="partner-single">
                            <a href="{{ $partner->url }}" target="_blank">
                                <img src="{{ asset('storage/uploads/partners/' . $partner->image) }}" alt=""
                                    class="partner-img">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
