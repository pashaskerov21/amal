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
                        <div class="mb-3">
                            <label class="form-label">{{ __('main.service') }}</label>
                            <select name="service_id" class="form-select" required>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}" @selected($monthly_report->service_id === $service->id ? true : false)>
                                        {{ $service->getTranslate->where('lang', Session('lang'))->first()->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('main.month') }}</label>
                            <select name="month" class="form-select" required>
                                @foreach ($months as $month)
                                    <option value="{{ $month->id }}" @selected($monthly_report->month === $month->id ? true : false)>
                                        {{ $month->getTranslate->where('lang', Session('lang'))->first()->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('main.year') }}</label>
                            <select name="year" class="form-select" required>
                                @foreach ($years as $year)
                                    <option value="{{ $year->value }}" @selected($monthly_report->year === $year->value ? true : false)>
                                        {{ $year->value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('main.value') }}</label>
                            <input type="number" class="form-control" name="main_value" value="{{ $monthly_report->main_value }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{ __('main.amount') }}</label>
                            <input type="number" class="form-control" name="total_amount" value="{{ $monthly_report->total_amount }}" required>
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
