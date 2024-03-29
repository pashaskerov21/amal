<section class="bg-video" style="background-image: url('{{ asset('front-assets/images/bg-video.png') }}');">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-5 col-md-6 video-content">
                <div class="after">
                    <div class="after after-1">
                        <div class="after after-2">
                            <a href="{{ $about->video_url }}" class="play" data-fancybox="">
                                <img src="{{ asset('front-assets/images/play.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-md-6 p-0">
                <div class="content ">
                    <div class="video-section-title  animate__animated animate__fadeInUp ">
                        {{ $about->getTranslate->where('lang', Session('lang'))->first()->report_title }}
                    </div>
                    <div class="video-section-desc  animate__animated animate__fadeInRight ">
                        {{ $about->getTranslate->where('lang', Session('lang'))->first()->report_text }}
                    </div>
                    <div class="number-counter-section">
                        <div class="progress_1">
                            @foreach ($about_reports as $report)
                                <div class="column">
                                    <span class="odometer" data-count="{{$report->value}}">{{$report->value}}</span>+
                                    <span class="txt">{{$report->getTranslate->where('lang', Session('lang'))->first()->title}}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>