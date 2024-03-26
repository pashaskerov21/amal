@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">{{__('main.users')}} | {{__('main.add')}}</h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.users.store')}}" method="POST" class="needs-validation" novalidate>
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label">{{__('main.username')}}</label>
                            <input type="text" class="form-control" name="name" value="" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{__('main.email')}}</label>
                            <input type="email" class="form-control" name="email" value="" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">{{__('main.password')}}</label>
                            <input type="password" class="form-control" name="password" value="" required>
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
