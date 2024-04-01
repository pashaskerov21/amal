@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('main.about') }} | {{ __('main.our_team') }} | {{ __('main.edit') }}</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.team.update', $team_member->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                            @foreach ($team_member->getTranslate as $index => $translate)
                                <li class="nav-item">
                                    <a href="#tab_{{ $translate->lang }}" data-bs-toggle="tab" class="nav-link rounded-0 @if ($index == 0) active @endif">
                                        <span>{{ $translate->lang }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content">
                            @foreach ($team_member->getTranslate as $index => $translate)
                                <input type="hidden" name="lang[]" value="{{ $translate->lang }}">
                                <div class="tab-pane show @if ($index == 0) active @endif"
                                    id="tab_{{ $translate->lang }}">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('main.title') }} {{ $translate->lang }}</label>
                                        <input type="text" class="form-control" name="title[]" value="{{ $translate->title }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('main.subtitle') }} {{ $translate->lang }}</label>
                                        <input type="text" class="form-control" name="subtitle[]" value="{{ $translate->subtitle }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('main.image') }}</label>
                            <input type="file" class="form-control" name="image">
                            <small class="d-block py-2">PNG - JPG - JPEG - SVG - WEBP / MAXSIZE: 1MB</small>
                        </div>
                        @if ($team_member->image)
                            <div class='row border my-3 py-2 w-100 mx-auto'>
                                <div class="col-6 d-flex justify-content-start align-items-center">
                                    <img src="{{ asset('storage/uploads/team/' . $team_member->image) }}" width="100" height="100" alt='' style="object-fit: contain" />
                                </div>
                                <div class="col-6 d-flex justify-content-end align-items-center">
                                    <a href="{{ asset('storage/uploads/team/' . $team_member->image) }}" data-fancybox="" class="btn btn-primary">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">{{ __('main.save') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
