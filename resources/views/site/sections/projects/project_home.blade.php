<div class="info-section">
    <div class="container">
        <div class="team-area-header">
            <div class="section-header mb-60">
                <h5>
                    <i class="fa-solid fa-angles-left"></i>
                    {{ $headings->where('key', 'project')->first()->getTranslate->where('lang', Session('lang'))->first()->title }}
                    <i class="fa-solid fa-angles-right"></i>
                </h5>
                <h2>
                    {{ $headings->where('key', 'project')->first()->getTranslate->where('lang', Session('lang'))->first()->subtitle }}
                </h2>
            </div>
            <div class="arry-btn">
                <button class="arry-prev" tabindex="0" aria-label="Previous slide"
                    aria-controls="swiper-wrapper-428e9ac75b9c44f4"><svg xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="currentColor" class="bi bi-chevron-left"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0">
                        </path>
                    </svg></button>
                <button class="arry-next active" tabindex="0" aria-label="Next slide"
                    aria-controls="swiper-wrapper-428e9ac75b9c44f4"><svg xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="currentColor" class="bi bi-chevron-right"
                        viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708">
                        </path>
                    </svg></button>
            </div>
        </div>
        <div class="info-slider swiper">
            <div class="swiper-wrapper">
                @foreach ($projects as $project)
                    <div class="swiper-slide">
                        <div class="swiper-item ">
                            <a href="{{ $projects_lang[Session('lang')] }}/{{ $project->getTranslate->where('lang', Session('lang'))->first()->slug }}"
                                class="item-img d-block">
                                <img src="{{ asset('storage/uploads/projects/' . $project->card_image) }}"
                                    alt="img">
                            </a>
                            <div class="content">
                                <a href="{{ $projects_lang[Session('lang')] }}/{{ $project->getTranslate->where('lang', Session('lang'))->first()->slug }}"
                                    class="info-name">
                                    {{ $project->getTranslate->where('lang', Session('lang'))->first()->title }}
                                </a>
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
                                <div class="amount">
                                    <div class="d-flex">
                                        <span> {{ __('main.collected') }}:
                                            <strong>{{ $project->current_amount }}₼</strong></span>
                                        <span> {{ __('main.goal') }}:
                                            <strong>{{ $project->final_amount }}₼</strong></span>
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
