<section class="partners">
    <div class="container">
        <div class="swiper partner-slider">
            <div class="swiper-wrapper">
                @foreach ($partners as $partner)
                    <div class="swiper-slide">
                        <div class="partner-single">
                            <a href="{{$partner->url}}" target="_blank">
                                <img src="{{ asset('storage/uploads/partners/' . $partner->image) }}" alt="" class="partner-img">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
