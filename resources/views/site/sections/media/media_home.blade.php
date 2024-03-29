<div class="blog-section">
    <div class="container">
        <div class="blog-slider swiper">
            <div class="swiper-wrapper">
                @foreach ($blogs as $blog)
                    <div class="swiper-slide">
                        <div class="swiper-item">
                            <a href="{{$blogs_lang[Session('lang')]}}/{{$blog->getTranslate->where('lang', Session('lang'))->first()->slug}}" class="item-img d-block">
                                <img src="{{ asset('storage/uploads/blogs/' . $blog->image) }}" alt="blog">
                            </a>
                            <div class="content">
                                <div class="date-time">
                                    <img src="{{ asset('front-assets/images/calendar.svg') }}" alt="date">
                                    <span>{{$blog->getTranslate->where('lang', Session('lang'))->first()->date}}</span>
                                </div>
                                <div class="blog-name">{{$blog->getTranslate->where('lang', Session('lang'))->first()->title}}</div>
                                <a href="{{$blogs_lang[Session('lang')]}}/{{$blog->getTranslate->where('lang', Session('lang'))->first()->slug}}" class="blog-detail">
                                    {{ __('main.etrafli_oxu') }}
                                    <img src="{{ asset('front-assets/images/arrow-blue.svg') }}" alt="arrow">
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>
