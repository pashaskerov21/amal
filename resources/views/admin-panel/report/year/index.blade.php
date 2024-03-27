@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('main.report') }} | {{ __('main.years') }}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-5">
                            <a href="{{ route('admin.report.year.create') }}" class="btn btn-danger"><i
                                    class="mdi mdi-plus-circle me-2"></i> {{ __('main.add') }}</a>
                        </div>
                    </div>
                </div> 
            </div> 
        </div> 
        <div class="col-12">
            <table class="table table-striped table-centered mb-0">
                <thead>
                    <tr>
                        <th style="width: 100px">#</th>
                        <th>{{ __('main.value') }}</th>
                        <th style="width: 150px">{{ __('main.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($years as $year)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $year->value }}</td>
                            <td class="table-action d-flex" style="height: 70px">
                                <a class="btn btn-danger" href="{{ route('admin.report.year.delete', $year->id) }}"
                                    onclick="return confirmDeleteReportYear(event, this.href)">
                                    <i class="mdi mdi-delete"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
