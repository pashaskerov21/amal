<section class="team-area">
    <div class="container">
        <div class="team-area-header mb-5">
            <div class="section-header mb-60">
                <h5>
                    <i class="fa-solid fa-angles-left"></i>
                    {{ $headings->where('key', 'volunteer')->first()->getTranslate->where('lang', Session('lang'))->first()->title }}
                    <i class="fa-solid fa-angles-right"></i>
                </h5>
                <h2>
                    {{ $headings->where('key', 'volunteer')->first()->getTranslate->where('lang', Session('lang'))->first()->subtitle }}
                </h2>
            </div>
            <div class="arry-btn">
                <button class="arry-prev">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        class="bi bi-chevron-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0" />
                    </svg>
                </button>
                <button class="arry-next active">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        class="bi bi-chevron-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="team-slider swiper g-4">
            <div class="swiper-wrapper">
                @foreach ($volunteers as $volunteer)
                    <div class="swiper-slide">
                        <div class="team__item image">
                            <img src="{{ asset('storage/uploads/volunteers/' . $volunteer->image) }}" alt="image">
                            <div class="team__content">

                                <div class="content">
                                    <h4>{{ $volunteer->getTranslate->where('lang', Session('lang'))->first()->title }}
                                    </h4>
                                    <span>{{ $volunteer->getTranslate->where('lang', Session('lang'))->first()->subtitle }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
