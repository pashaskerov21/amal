<section class="blog-detail py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-3">
                <div class="blog-detail-img "> <img src="{{ asset('storage/uploads/blogs/' . $blog->image) }}" class="img-fluid" alt="blog"></div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="blog-detail-info">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="blog-detail-title">{{$blog->getTranslate->where('lang', Session('lang'))->first()->title}}</div>
                        <div class="date-time">
                            <img src="{{asset('front-assets/images/calendar.svg')}}" alt="date">
                            <span>{{$blog->getTranslate->where('lang', Session('lang'))->first()->date}}</span>
                        </div>
                    </div>
                    <div class="blog-detail-desc">
                        {!!$blog->getTranslate->where('lang', Session('lang'))->first()->text!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
