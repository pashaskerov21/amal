<div class="services-cat bg-general">
    <div class="container">
        <div class="row">
            @foreach ($services as $service)
                <div class="col-lg-6">
                    <div class="service-box service-box-1">
                        <div class="service-img">
                            <img src="{{ asset('storage/uploads/services/' . $service->image) }}" alt="">
                        </div>
                        <div class="service-text">
                            <div class="service-name">{{$service->getTranslate->where('lang', Session('lang'))->first()->title}}</div>
                            <div class="service-text">{{$service->getTranslate->where('lang', Session('lang'))->first()->text}}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
