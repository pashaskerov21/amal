@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('main.settings') }} | {{ __('main.edit') }}</h4>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                                    @foreach ($settings->getTranslate as $index => $translate)
                                        <li class="nav-item">
                                            <a href="#tab_{{$translate->lang}}" data-bs-toggle="tab" class="nav-link rounded-0 @if ($index == 0) active @endif">
                                                <span>{{$translate->lang}}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="tab-content">
                                    @foreach ($settings->getTranslate as $index => $translate)
                                    <input type="hidden" name="lang[]" value="{{$translate->lang}}">
                                    <div class="tab-pane show @if ($index == 0) active @endif" id="tab_{{$translate->lang}}">
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('main.title') }} {{$translate->lang}}</label>
                                            <input type="text" class="form-control" name="title[]" value="{{$translate->title}}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('main.address') }} {{$translate->lang}}</label>
                                            <input type="text" class="form-control" name="address_text[]" value="{{$translate->address_text}}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('main.author') }} {{$translate->lang}}</label>
                                            <input type="text" class="form-control" name="author[]" value="{{$translate->author}}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('main.copyright') }} {{$translate->lang}}</label>
                                            <input type="text" class="form-control" name="copyright[]" value="{{$translate->copyright}}">
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('main.description') }} {{$translate->lang}}</label>
                                            <textarea class="form-control" name="description[]">{{$translate->description}}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('main.keywords') }} {{$translate->lang}}</label>
                                            <textarea class="form-control" name="keywords[]">{{$translate->keywords}}</textarea>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('main.email') }}</label>
                                    <input type="email" class="form-control" name="email" value="{{$settings->email}}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('main.phone') }}</label>
                                    <input type="text" class="form-control" name="phone" value="{{$settings->phone}}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Facebook</label>
                                    <input type="url" class="form-control" name="facebook" value="{{$settings->facebook}}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Linkedin</label>
                                    <input type="url" class="form-control" name="linkedin" value="{{$settings->linkedin}}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Twitter</label>
                                    <input type="url" class="form-control" name="twitter" value="{{$settings->twitter}}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Instagram</label>
                                    <input type="url" class="form-control" name="instagram" value="{{$settings->instagram}}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Youtube</label>
                                    <input type="url" class="form-control" name="youtube" value="{{$settings->youtube}}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Whatsapp</label>
                                    <input type="text" class="form-control" name="whatsapp" value="{{$settings->whatsapp}}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Telegram</label>
                                    <input type="text" class="form-control" name="telegram" value="{{$settings->telegram}}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('main.address') }} url</label>
                                    <input type="url" class="form-control" name="address_url" value="{{$settings->address_url}}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('main.author') }} url</label>
                                    <input type="url" class="form-control" name="author_url" value="{{$settings->author_url}}">
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
