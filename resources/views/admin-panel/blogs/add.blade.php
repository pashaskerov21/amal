@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('main.blogs') }} | {{ __('main.add') }}</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data"
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
                                    <input type="text" class="form-control" name="title[]" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('main.date') }} az</label>
                                    <input type="text" class="form-control" name="date[]">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('main.meta_description') }} az</label>
                                    <textarea class="form-control" name="meta_description[]"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('main.main_text') }} az</label>
                                    <div class="quill-editor" style="height: 300px;"></div>
                                    <textarea name="text[]" hidden></textarea>
                                </div>
                            </div>
                            <div class="tab-pane show" id="tab_en">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('main.title') }} en</label>
                                    <input type="text" class="form-control" name="title[]" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('main.date') }} en</label>
                                    <input type="text" class="form-control" name="date[]">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('main.meta_description') }} en</label>
                                    <textarea class="form-control" name="meta_description[]"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('main.main_text') }} en</label>
                                    <div class="quill-editor" style="height: 300px;"></div>
                                    <textarea name="text[]" hidden></textarea>
                                </div>
                            </div>
                            <div class="tab-pane show" id="tab_ru">
                                <div class="mb-3">
                                    <label class="form-label">{{ __('main.title') }} ru</label>
                                    <input type="text" class="form-control" name="title[]" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('main.date') }} ru</label>
                                    <input type="text" class="form-control" name="date[]">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('main.meta_description') }} ru</label>
                                    <textarea class="form-control" name="meta_description[]"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">{{ __('main.main_text') }} ru</label>
                                    <div class="quill-editor" style="height: 300px;"></div>
                                    <textarea name="text[]" hidden></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">{{ __('main.image') }}</label>
                            <input type="file" class="form-control" name="image" required>
                            <small class="d-block py-2">PNG - JPG - JPEG - SVG - WEBP</small>
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
