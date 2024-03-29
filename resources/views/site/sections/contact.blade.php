<div class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-3">
                <div class="contact-info-item">
                    <div class="img">
                        <img src="{{ asset('front-assets/images/map.png') }}" alt="map image">
                    </div>
                    <span class="text">
                        {{$settings->getTranslate->where('lang', Session('lang'))->first()->address_text}}
                    </span>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-3">
                <div class="contact-info-item">
                    <div class="img">
                        <img src="{{ asset('front-assets/images/phone.png') }}" alt="phone image">
                    </div>
                    <span class="text">{{$settings->phone}}</span>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-3">
                <div class="contact-info-item">
                    <div class="img">
                        <img src="{{ asset('front-assets/images/mail.png') }}" alt="mail image">
                    </div>
                    <span class="text">{{$settings->email}}</span>
                </div>
            </div>
        </div>
        @if ($settings->address_url)
            <div class="map">
                <iframe
                    src="{{$settings->address_url}}"
                    width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        @endif
    </div>
</div>
