@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">{{ __('main.volunteers') }}</h4>
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
                        <th>{{ __('main.birthday') }}</th>
                        <th>{{ __('main.gender') }}</th>
                        <th>{{ __('main.date') }}</th>
                        <th style="width: 150px">{{ __('main.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($volunteers as $volunteer)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $volunteer->fullname }}</td>
                            <td>{{ $volunteer->phone }}</td>
                            <td>{{ $volunteer->email }}</td>
                            <td>{{ $volunteer->birthday }}</td>
                            <td>
                                @if ($volunteer->gender === 'male')
                                    {{ __('main.male') }}
                                @elseif($volunteer->gender === 'female')
                                    {{ __('main.female') }}
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $volunteer->created_at }}</td>
                            <td>
                                <div class="table-action">
                                    <a href="{{ route('admin.volunteers.view', $volunteer->id) }}"
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
