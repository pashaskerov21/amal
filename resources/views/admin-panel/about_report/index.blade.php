@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('main.about') }} | {{ __('main.report') }}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-5">
                            <a href="{{ route('admin.about_report.create') }}" class="btn btn-danger">
                                <i class="mdi mdi-plus-circle me-2"></i> {{ __('main.add') }}
                            </a>
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
                        <th>{{ __('main.title') }}</th>
                        <th>{{ __('main.value') }}</th>
                        <th style="width: 150px">{{ __('main.actions') }}</th>
                        <th style="width: 100px"></th>
                    </tr>
                </thead>
                <tbody data-route="{{ route('admin.about_report.sort') }}">
                    @foreach ($about_reports as $report)
                        <tr data-id="{{ $report->id }}" data-order="{{ $report->order }}">
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $report->getTranslate->where('lang', Session('lang'))->first()->title }}</td>
                            <td>{{ $report->value }}</td>
                            <td class="table-action d-flex" style="height: 70px">
                                <a href="{{ route('admin.about_report.edit', $report->id) }}" class="btn btn-success me-1">
                                    <i class="mdi mdi-square-edit-outline"></i></a>
                                <a class="btn btn-danger" href="{{ route('admin.about_report.delete', $report->id) }}"
                                    onclick="return confirmDelete(event, this.href)">
                                    <i class="mdi mdi-delete"></i>
                                </a>
                            </td>
                            <td>
                                <button class="btn btn-primary"><i class="ri-drag-move-2-line"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
