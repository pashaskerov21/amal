@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('main.report') }} | {{ __('main.year') }} | {{ __('main.add') }}</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.report.year.store') }}" method="POST"  class="needs-validation" novalidate> 
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="mb-3">
                            <label class="form-label">{{ __('main.value') }}</label>
                            <input type="number" class="form-control" name="value" required>
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
