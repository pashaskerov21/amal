@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('main.menu') }} | {{ __('main.edit') }}</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.menu.update', $menu->id) }}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <ul class="nav nav-pills bg-nav-pills nav-justified mb-3">
                            @foreach ($menu->getTranslate as $index => $translate)
                                <li class="nav-item">
                                    <a href="#tab_{{ $translate->lang }}" data-bs-toggle="tab" class="nav-link rounded-0 @if ($index == 0) active @endif">
                                        <span>{{ $translate->lang }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="tab-content">
                            @foreach ($menu->getTranslate as $index => $translate)
                                <input type="hidden" name="lang[]" value="{{ $translate->lang }}">
                                <div class="tab-pane show @if ($index == 0) active @endif"
                                    id="tab_{{ $translate->lang }}">
                                    <div class="mb-3">
                                        <label class="form-label">{{ __('main.title') }} {{ $translate->lang }}</label>
                                        <input type="text" class="form-control" name="title[]" value="{{ $translate->title }}" required>
                                    </div>
                                </div>
                            @endforeach
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
