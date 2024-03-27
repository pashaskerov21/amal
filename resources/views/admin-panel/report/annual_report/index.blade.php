@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('main.report') }} | {{ __('main.annual_report') }}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-centered mb-0">
                <thead>
                    <tr>
                        <th style="width: 100px">#</th>
                        <th>{{ __('main.service') }}</th>
                        <th>{{ __('main.year') }}</th>
                        <th>{{ __('main.value') }}</th>
                        <th>{{ __('main.amount') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($annual_reports as $report)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $report->getService->where('lang', Session('lang'))->first()->title }}</td>
                            <td>{{ $report->year }}</td>
                            <td>{{ $report->main_value }}</td>
                            <td>{{ $report->total_amount }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
