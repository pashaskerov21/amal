@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('main.report') }} | {{ __('main.monthly_report') }} | {{ __('main.edit') }}</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.report.monthly_report.update', $monthly_report->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <input type="hidden" name="service_id" value="{{ $monthly_report->service_id }}">
                        <input type="hidden" name="month" value="{{ $monthly_report->month }}">
                        <input type="hidden" name="year" value="{{ $monthly_report->year }}">
                        <div class="mb-3">
                            <label class="form-label">{{ __('main.service') }}</label>
                            <input type="text" class="form-control" readonly value="{{ $monthly_report->getService->where('lang', Session('lang'))->first()->title }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('main.month') }}</label>
                            <input type="text" class="form-control" readonly value="{{ $monthly_report->getMonth->where('lang', Session('lang'))->first()->title }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('main.year') }}</label>
                            <input type="text" class="form-control" readonly value="{{ $monthly_report->year }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('main.value') }}</label>
                            <input type="number" class="form-control" name="main_value" value="{{ $monthly_report->main_value }}" required step="any">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('main.amount') }}</label>
                            <input type="number" class="form-control" name="total_amount" value="{{ $monthly_report->total_amount }}" required step="any">
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
