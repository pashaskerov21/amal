@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('main.volunteer_applications') }}</h4>
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
                        <th>{{ __('main.date') }}</th>
                        <th style="width: 150px">{{ __('main.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($volunteer_applications as $volunteer_application)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $volunteer_application->fullname }}</td>
                            <td>{{ $volunteer_application->phone }}</td>
                            <td>{{ $volunteer_application->email }}</td>
                            <td>{{ $volunteer_application->created_at }}</td>
                            <td>
                                <div class="table-action">
                                    <a href="{{ route('admin.volunteer_applications.view', $volunteer_application->id) }}"
                                        class="btn btn-success me-1">
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
