@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('main.banner') }} | {{ __('main.add') }}</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.banner.store') }}" method="POST" enctype="multipart/form-data"
                class="needs-validation" novalidate>
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                            <li class="nav-item">
                                <a href="#tab_az" data-bs-toggle="tab" class="nav-link rounded-0 active">
                                    <span>az</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#tab_en" data-bs-toggle="tab" class="nav-link rounded-0">
                                    <span>en</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#tab_ru" data-bs-toggle="tab" class="nav-link rounded-0">
                                    <span>ru</span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <input type="hidden" name="lang[]" value="az">
                            <input type="hidden" name="lang[]" value="en">
                            <input type="hidden" name="lang[]" value="ru">
                            <div class="tab-pane show active" id="tab_az">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('main.title') }} az</label>
                                    <input type="text" class="form-control" name="title[]">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('main.text') }} az</label>
                                    <textarea class="form-control" name="text[]"></textarea>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_en">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('main.title') }} en</label>
                                    <input type="text" class="form-control" name="title[]">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('main.text') }} en</label>
                                    <textarea class="form-control" name="text[]"></textarea>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_ru">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('main.title') }} ru</label>
                                    <input type="text" class="form-control" name="title[]">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('main.text') }} ru</label>
                                    <textarea class="form-control" name="text[]"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('main.image') }}</label>
                            <input type="file" class="form-control" name="image" required>
                            <small class="d-block py-2">PNG - JPG - JPEG - SVG - WEBP / MAXSIZE: 1MB</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('main.page') }}</label>
                            <select name="page" class="form-select">
                                <option value="0">{{ __('main.home') }}</option>
                                @foreach ($menues as $menu)
                                    <option value="{{ $menu->id }}">
                                        {{ $menu->getTranslate->where('lang', Session('lang'))->first()->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">{{ __('main.save') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
