@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">{{__('main.users')}} | {{__('main.edit')}}</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.users.update', $user->id)}}" method="POST" class="needs-validation" novalidate>
                @csrf
            
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">{{__('main.username')}}</label>
                            <input type="text" class="form-control" name="name" value="{{$user->name}}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{__('main.email')}}</label>
                            <input type="email" class="form-control" name="email" value="{{$user->email}}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{__('main.current_password')}}</label>
                            <input type="password" class="form-control" name="current_password" value="" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{__('main.new_password')}}</label>
                            <input type="password" class="form-control" name="new_password" value="">
                        </div>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">{{__('main.save')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
