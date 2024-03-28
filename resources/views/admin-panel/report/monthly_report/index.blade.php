@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('main.report') }} | {{ __('main.monthly_report') }}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-5">
                            <a href="{{ route('admin.report.monthly_report.create') }}" class="btn btn-danger mb-2">
                                <i class="mdi mdi-plus-circle me-2"></i> {{ __('main.add') }}</a>
                        </div>
                    </div>

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
        <div class="col-12">
            <table class="table table-striped table-centered mb-0">
                <thead>
                    <tr>
                        <th style="width: 100px">#</th>
                        <th>{{ __('main.service') }}</th>
                        <th>{{ __('main.month') }}</th>
                        <th>{{ __('main.year') }}</th>
                        <th>{{ __('main.value') }}</th>
                        <th>{{ __('main.amount') }}</th>
                        <th style="width: 150px">{{ __('main.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($monthly_reports as $report)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $report->getService->where('lang', Session('lang'))->first()->title }}</td>
                            <td>{{ $report->getMonth->where('lang', Session('lang'))->first()->title }}</td>
                            <td>{{ $report->year }}</td>
                            <td>{{ $report->main_value }}</td>
                            <td>{{ $report->total_amount }}</td>
                            <td>
                                <div class="table-action">
                                    <a href="{{ route('admin.report.monthly_report.edit', $report->id) }}" class="btn btn-success me-1">
                                        <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a class="btn btn-danger" href="{{ route('admin.report.monthly_report.delete', $report->id) }}"
                                        onclick="return confirmDelete(event, this.href)">
                                        <i class="mdi mdi-delete"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
