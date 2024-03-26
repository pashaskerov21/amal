<section class="services">
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($services as $service)
                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="service-box animate__animated animate__fadeInUp animate__delay-1s">
                        <div class="service-img">
                            <img src="{{ asset('storage/uploads/services/' . $service->image) }}" alt="service">
                        </div>
                        <div class="service-text">
                            <div class="title">{{$service->getTranslate->where('lang', Session('lang'))->first()->title}}</div>
                            <div class="desc">{{\Illuminate\Support\Str::limit($service->getTranslate->where('lang', Session('lang'))->first()->text, 50) }}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
