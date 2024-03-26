@extends('admin-panel.layouts.layout_login')

@section('content')
    <div class="card">

        <!-- Logo -->
        <div class="card-header py-2 text-center bg-primary">
            <h1 style="color: #fff">
                Admin Panel
            </h1>
        </div>

        <div class="card-body p-4">
            <div class="text-center w-75 m-auto">
                <h4 class="text-dark-50 text-center pb-0 fw-bold">Sign In</h4>
                <p class="text-muted mb-4">Enter your email address and password to access admin panel.</p>
            </div>
            <form action="{{ route('admin.login.submit') }}" method="post" class="needs-validation" novalidate>
                @csrf
                <div class="mb-3">
                    <label for="emailaddress" class="form-label">Email address</label>
                    <input class="form-control" type="email" id="emailaddress" placeholder="Enter your email" name="email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group input-group-merge">
                        <input type="password" id="password" class="form-control" placeholder="Enter your password" name="password" required>
                        <div class="input-group-text" data-password="false">
                            <span class="password-eye"></span>
                        </div>
                    </div>
                </div>

                <div class="mb-0 text-center">
                    <button class="btn btn-primary" type="submit"> Log In </button>
                </div>

            </form>
        </div> <!-- end card-body -->
    </div>
@endsection
