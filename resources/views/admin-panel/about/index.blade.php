@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('main.about') }} | {{ __('main.main_content') }} | {{ __('main.edit') }}</h4>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.about.update') }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                                    @foreach ($about->getTranslate as $index => $translate)
                                        <li class="nav-item">
                                            <a href="#tab_{{$translate->lang}}" data-bs-toggle="tab" class="nav-link rounded-0 @if ($index == 0) active @endif">
                                                <span>{{$translate->lang}}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="tab-content">
                                    @foreach ($about->getTranslate as $index => $translate)
                                    <input type="hidden" name="lang[]" value="{{$translate->lang}}">
                                    <div class="tab-pane show @if ($index == 0) active @endif" id="tab_{{$translate->lang}}">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('main.home_title') }} {{$translate->lang}}</label>
                                            <input type="text" class="form-control" name="home_title[]" value="{{$translate->home_title}}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('main.home_text') }} {{$translate->lang}}</label>
                                            <div class="quill-editor" style="height: 300px;">{!! $translate->home_text !!}</div>
                                            <textarea name="home_text[]" hidden></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('main.how_we_work_text') }} {{$translate->lang}}</label>
                                            <div class="quill-editor" style="height: 300px;">{!! $translate->how_we_work_text !!}</div>
                                            <textarea name="how_we_work_text[]" hidden></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('main.about') }} {{ __('main.report_title') }} {{$translate->lang}}</label>
                                            <input type="text" class="form-control" name="report_title[]" value="{{$translate->report_title}}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('main.about') }} {{ __('main.report_text') }} {{$translate->lang}}</label>
                                            <textarea class="form-control" name="report_text[]">{{$translate->report_text}}</textarea>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('main.image') }} 1</label>
                                    <input type="file" class="form-control" name="image_1">
                                    <small class="d-block py-2">PNG - JPG - JPEG - SVG - WEBP / MAXSIZE: 1MB</small>
                                </div>
                                @if ($about->image_1)
                                    <div class='row border my-3 py-2 w-100 mx-auto'>
                                        <div class="col-6 d-flex justify-content-start align-items-center">
                                            <img src="{{ asset('storage/uploads/about/' . $about->image_1) }}" width="100" height="100" alt='' style="object-fit: contain" />
                                        </div>
                                        <div class="col-6 d-flex justify-content-end align-items-center">
                                            <a href="{{ asset('storage/uploads/about/' . $about->image_1) }}" data-fancybox="" class="btn btn-primary">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                                <div class="mb-3">
                                    <label class="form-label">{{ __('main.image') }} 2</label>
                                    <input type="file" class="form-control" name="image_2">
                                    <small class="d-block py-2">PNG - JPG - JPEG - SVG - WEBP / MAXSIZE: 1MB</small>
                                </div>
                                @if ($about->image_2)
                                    <div class='row border my-3 py-2 w-100 mx-auto'>
                                        <div class="col-6 d-flex justify-content-start align-items-center">
                                            <img src="{{ asset('storage/uploads/about/' . $about->image_2) }}" width="100" height="100" alt='' style="object-fit: contain" />
                                        </div>
                                        <div class="col-6 d-flex justify-content-end align-items-center">
                                            <a href="{{ asset('storage/uploads/about/' . $about->image_2) }}" data-fancybox="" class="btn btn-primary">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                                <div class="mb-3">
                                    <label class="form-label">{{ __('main.video') }} url</label>
                                    <input type="url" class="form-control" name="video_url" value="{{$about->video_url}}">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">{{__('main.save')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
