@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('main.headings') }}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-centered mb-0">
                <thead>
                    <tr>
                        <th style="width: 100px">#</th>
                        <th>Key</th>
                        <th>{{ __('main.title') }}</th>
                        <th>{{ __('main.subtitle') }}</th>
                        <th style="width: 150px">{{ __('main.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($headings as $heading)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{$heading->key}}</td>
                            <td>
                                {{ $heading->getTranslate->where('lang', Session('lang'))->first()->title }}
                            </td>
                            <td>
                                {{ $heading->getTranslate->where('lang', Session('lang'))->first()->subtitle }}
                            </td>
                            <td>
                                <div class="table-action">
                                    <a href="{{ route('admin.headings.edit', $heading->id) }}" class="btn btn-success me-1">
                                        <i class="mdi mdi-square-edit-outline"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
