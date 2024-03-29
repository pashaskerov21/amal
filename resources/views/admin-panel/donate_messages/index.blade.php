@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('main.donate_messages') }}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-centered mb-0">
                <thead>
                    <tr>
                        <th style="width: 100px">#</th>
                        <th>{{ __('main.ad_soyad') }}</th>
                        <th>{{ __('main.phone') }}</th>
                        <th>{{ __('main.email') }}</th>
                        <th>{{ __('main.service') }}</th>
                        <th>{{ __('main.amount') }}</th>
                        <th>{{ __('main.date') }}</th>
                        <th style="width: 150px">{{ __('main.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($donate_messages as $message)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $message->fullname }}</td>
                            <td>{{ $message->phone }}</td>
                            <td>{{ $message->email }}</td>
                            <td>{{ $message->getService->where('lang', Session('lang'))->first()->title }}</td>
                            <td>{{ $message->amount }}</td>
                            <td>{{ $message->created_at }}</td>
                            <td>
                                <div class="table-action">
                                    <a href="{{ route('admin.donate_messages.view', $message->id) }}" class="btn btn-success me-1">
                                        <i class="fa-solid fa-eye"></i>
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
