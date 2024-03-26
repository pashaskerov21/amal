<section class="about">
    <div class="container">
        <div class="general-title">
            <div class="title">{{ __('main.about') }}</div>
            {{-- <div class="subtitle">Lorem ipsum dolor sit amet consectetur.</div> --}}
        </div>
        @foreach ($about_texts as $about_text)
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <div class="about-img">
                        <img src="{{ asset('storage/uploads/about_text/' . $about_text->image) }}" alt="about-1">
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="about-text">
                        {!!$about_text->getTranslate->where('lang', Session('lang'))->first()->text!!}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
