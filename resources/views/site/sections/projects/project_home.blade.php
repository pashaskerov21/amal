<div class="info-section">
    <div class="container">
        <div class="info-slider swiper">
            <div class="swiper-wrapper">
                @foreach ($projects as $project)
                    <div class="swiper-slide">
                        <div class="swiper-item ">
                            <a href="{{$projects_lang[Session('lang')]}}/{{$project->getTranslate->where('lang', Session('lang'))->first()->slug}}" class="item-img d-block">
                                <img src="{{ asset('storage/uploads/projects/' . $project->card_image) }}" alt="img">
                            </a>
                            <div class="content">
                                <a href="{{$projects_lang[Session('lang')]}}/{{$project->getTranslate->where('lang', Session('lang'))->first()->slug}}" class="info-name">
                                    {{ $project->getTranslate->where('lang', Session('lang'))->first()->title }}
                                </a>
                                <div class="project_progress_bar">
                                    <div class="progress_1"></div>
                                    <div class="progress_2" style="width: {{$project->percent}}%"></div>
                                    @if ($project->percent == 100)
                                        <div class="progress_result" style="right: 0;">{{$project->percent}}%</div>
                                    @else 
                                        <div class="progress_result" style="left: {{$project->percent}}%;">{{$project->percent}}%</div>
                                    @endif
                                </div>
                                <div class="amount">
                                    <div class="d-flex">
                                        <span> {{ __('main.collected') }}: <strong>{{$project->current_amount}}₼</strong></span>
                                        <span> {{ __('main.goal') }}: <strong>{{$project->final_amount}}₼</strong></span>
                                    </div>
                                </div>
                                <a href="{{ route('donate_' . Session('lang')) }}"
                                    class="detail">{{ __('main.iane_et') }}
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
