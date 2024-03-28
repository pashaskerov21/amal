<div class="project">
    <div class="container">
        <div class="detail-top">
            @if ($project->banner_image)
                <div class="img"><img src="{{ asset('storage/uploads/projects/' . $project->banner_image) }}" alt="project"></div>
            @endif
            <div class="container">
                <ul>
                    <li>
                        <div class="list-img">
                            <img src="{{asset('front-assets/images/calendar1.svg')}}" alt="calendar">
                        </div>
                        <div class="list-text">
                            <div>{{ __('main.date') }}:</div>
                            <span>{{$project_translate->date}}</span>
                        </div>

                    </li>
                    <li>
                        <div class="list-img">
                            <img src="{{asset('front-assets/images/map.svg')}}" alt="location">
                        </div>
                        <div class="list-text">
                            <div>{{ __('main.place') }}:</div>
                            <span>{{$project_translate->location}}</span>
                        </div>

                    </li>
                    <li>
                        <div class="list-img">
                            <img src="{{asset('front-assets/images/folder.svg')}}" alt="category">
                        </div>
                        <div class="list-text">
                            <div>{{ __('main.category') }}:</div>
                            <span>{{$project_translate->category}}</span>
                        </div>

                    </li>
                </ul>
            </div>
        </div>
        <div class="detail-bottom">
            <div class="title1">
                {{$project_translate->title}}
            </div>
            {!!$project_translate->main_text!!}
        </div>

    </div>
</div>
