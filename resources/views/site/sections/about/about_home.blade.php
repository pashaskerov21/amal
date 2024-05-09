<section class="home-about-section"
    style="background-image: url('{{ asset('front-assets/images/OBJECTS.png') }}'),  url('{{ asset('front-asset/images/heart-bg.png') }}');">
    <div class="container">
        <div class="row justify-content-center" style="gap: 50px;">
            <div class="col-lg-5">
                <div class="about-images animate__animated animate__fadeInLeft animate__delay-2">
                    <div class="big-img"
                        style="background-image: url('{{ asset('storage/uploads/about/' . $about->image_2) }}');">
                        @if ($about->image_1)
                            <img class="small-img" src="{{ asset('storage/uploads/about/' . $about->image_1) }}"
                                alt="about image">
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-6 animate__animated animate__fadeInRight animate__delay-2">
                <div class="about-title">
                    <div class="title">
                        <i class="fa-solid fa-angles-left"></i>
                        {{ $headings->where('key', 'about')->first()->getTranslate->where('lang', Session('lang'))->first()->title }}
                        <i class="fa-solid fa-angles-right"></i>
                    </div>
                    <div class="subtitle">
                        {{ $headings->where('key', 'about')->first()->getTranslate->where('lang', Session('lang'))->first()->subtitle }}
                    </div>
                </div>
                <div class="about-text">
                    {!! $about->getTranslate->where('lang', Session('lang'))->first()->home_text !!}
                </div>
                <a href="{{ route('about_' . Session('lang')) }}" class="about-btn">
                    {{ __('main.etrafli_bax') }}
                    <img src="{{ asset('front-assets/images/arrow-svg.svg') }}" alt="arrow">
                </a>
            </div>
        </div>
    </div>
</section>
