<div class="project-categories">
    <div class="container">
        <ul class="project-categories-types">
            <li data-status="2" class="active">{{ __('main.all') }}</li>
            <li data-status="1">{{ __('main.completed') }}</li>
            <li data-status="0">{{ __('main.active') }}</li>
        </ul>
        <div class="categories">
            @foreach ($projects as $project)
                <div class="single-project w-100 project_row" data-status="{{$project->status}}">
                    <a href="{{$lang[Session('lang')]}}/{{ $project->getTranslate->where('lang', Session('lang'))->first()->slug }}">
                        <div class="single-project-img" style="background-image: url('{{ asset('storage/uploads/projects/' . $project->card_image) }}');">
                            <div class="project-detail">
                                <div class="text">{{ __('main.etrafli_bax') }}</div>
                                <div class="icon"><img src="{{ asset('front-assets/images/arrow-1.svg') }}" alt="arrow"></div>
                            </div>
                        </div>
                    </a>
                    <div class="single-project-text w-100" style="background-image: url({{ asset('front-assets/images/heart-bg.png') }});">
                        <div class="head">
                            <div class="title">{{ $project->getTranslate->where('lang', Session('lang'))->first()->title }}</div>
                            @if ($project->status == 1)
                                <button class="completed">{{ __('main.completed') }}</button>
                            @else
                                <a href="{{ route('donate_' . Session('lang')) }}" class="active">{{ __('main.iane_et') }}</a>
                            @endif
                            
                        </div>
                        <div class="text">
                            {{ $project->getTranslate->where('lang', Session('lang'))->first()->card_text }}
                        </div>
                        <div class="total-among-info">
                            <div class="project_progress_bar">
                                <div class="progress_1"></div>
                                <div class="progress_2" style="width: {{ $project->percent }}%"></div>
                                @if ($project->percent == 100)
                                    <div class="progress_result" style="right: 0;">{{ $project->percent }}%</div>
                                @else
                                    <div class="progress_result" style="left: {{ $project->percent }}%;">
                                        {{ $project->percent }}%</div>
                                @endif
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="among">
                                    {{ __('main.collected') }}:<strong>{{ $project->current_amount }}₼</strong>
                                </div>
                                <div class="among">
                                    {{ __('main.goal') }}:<strong>{{ $project->final_amount }}₼</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
