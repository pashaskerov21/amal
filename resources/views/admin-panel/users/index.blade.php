@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">{{__('main.users')}} </h4>
            </div>
        </div>
    </div>
    <div class="row">
        @if (Auth::user()->user_type === 'admin')
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-5">
                                <a href="{{ route('admin.users.create') }}" class="btn btn-danger mb-2">
                                    <i class="mdi mdi-plus-circle me-2"></i> {{__('main.add')}}
                                </a>
                            </div>
                        </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        @endif
        <div class="col-12">
            <table class="table table-striped table-centered mb-0">
                <thead>
                    <tr>
                        <th style="width: 100px">#</th>
                        <th>{{__('main.username')}}</th>
                        <th>{{__('main.email')}}</th>
                        <th style="width: 150px">{{__('main.account_type')}}</th>
                        @if (Auth::user()->user_type === 'admin')
                            <th>{{__('main.actions')}} </th>
                        @endif
                    </tr>
                </thead>
                <tbody id="menu-links-tbody">
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->user_type }}</td>
                            @if (Auth::user()->user_type === 'admin')
                                <td class="table-action d-flex gap-1" style="height: 70px">
                                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-success"> <i class="mdi mdi-pen"></i></a>
                                    @if ($user->user_type !== 'admin')
                                    <a onclick="return confirmDelete(event, this.href)" href="{{ route('admin.users.destroy', $user->id) }}" class="btn btn-danger"> <i class="mdi mdi-delete"></i></a>
                                    @endif
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
