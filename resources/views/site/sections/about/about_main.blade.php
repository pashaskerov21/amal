<section class="about py-5">
    <div class="container">
        <div class="general-title">
            <div class="title">
                {{ $headings->where('key', 'about')->first()->getTranslate->where('lang', Session('lang'))->first()->title }}
            </div>
            <div class="subtitle">
                {{ $headings->where('key', 'about')->first()->getTranslate->where('lang', Session('lang'))->first()->subtitle }}
            </div>
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
                        {!! $about_text->getTranslate->where('lang', Session('lang'))->first()->text !!}
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
