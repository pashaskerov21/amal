@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('main.subscribers') }}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-centered mb-0">
                <thead>
                    <tr>
                        <th style="width: 100px">#</th>
                        <th>{{ __('main.email') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subscribers as $subscriber)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{$subscriber->email}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
