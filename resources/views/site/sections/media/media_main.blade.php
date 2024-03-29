<section class="media py-5">
    <div class="container">
        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="media-item">
                        <a href="{{$lang[Session('lang')]}}/{{$blog->getTranslate->where('lang', Session('lang'))->first()->slug}}" class="item-img d-block">
                            <img src="{{ asset('storage/uploads/blogs/' . $blog->image) }}" alt="blog">
                        </a>
                        <div class="content">
                            <div class="date-time">
                                <img src="{{ asset('front-assets/images/calendar.svg') }}" alt="date">
                                <span>{{$blog->getTranslate->where('lang', Session('lang'))->first()->date}}</span>
                            </div>
                            <div class="blog-name">{{$blog->getTranslate->where('lang', Session('lang'))->first()->title}}</div>
                            <a href="{{$lang[Session('lang')]}}/{{$blog->getTranslate->where('lang', Session('lang'))->first()->slug}}" class="blog-detail">
                                {{ __('main.etrafli_oxu') }}
                                <img src="{{ asset('front-assets/images/arrow-blue.svg') }}" alt="arrow">
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
