<section class="our-team">
    <div class="container">
        <div class="general-title">
            <div class="title">{{ __('main.our_team') }}</div>
            {{-- <div class="subtitle">Lorem ipsum dolor sit amet consectetur.</div> --}}
        </div>
        <div class="team-slider swiper">
            <div class="swiper-wrapper">
                @foreach ($team_members as $member)
                    <div class="swiper-slide mb-3">
                        <div class="single-team-box">
                            <div class="team-box-img">
                                <img src="{{ asset('storage/uploads/team/' . $member->image) }}" alt="team-1">
                            </div>
                            <div class="team-single-name">{{$member->getTranslate->where('lang', Session('lang'))->first()->title}}</div>
                            <div class="team-single-desc">{{$member->getTranslate->where('lang', Session('lang'))->first()->subtitle}}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
