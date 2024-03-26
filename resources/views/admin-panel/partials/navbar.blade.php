<!-- ========== Topbar Start ========== -->
<div class="navbar-custom">
    <div class="topbar container-fluid">
        <div class="d-flex align-items-center gap-lg-2 gap-1">

            <!-- Topbar Brand Logo -->
            <div class="logo-topbar">
                <!-- Logo light -->
                <a href="{{route('admin.dashboard')}}" class="logo-light">
                    <span class="logo-lg">
                        <img src="{{asset('admin-assets/images/logo.png')}}" alt="logo">
                    </span>
                    <span class="logo-sm">
                        <img src="{{asset('admin-assets/images/logo-sm.png')}}" alt="small logo">
                    </span>
                </a>

                <!-- Logo Dark -->
                <a href="{{route('admin.dashboard')}}" class="logo-dark">
                    <span class="logo-lg">
                        <img src="{{asset('admin-assets/images/logo-dark.png')}}" alt="dark logo">
                    </span>
                    <span class="logo-sm">
                        <img src="{{asset('admin-assets/images/logo-dark-sm.png')}}" alt="small logo">
                    </span>
                </a>
            </div>

            <!-- Sidebar Menu Toggle Button -->
            <button class="button-toggle-menu">
                <i class="mdi mdi-menu"></i>
            </button>

            <!-- Horizontal Menu Toggle Button -->
            <button class="navbar-toggle" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <div class="lines">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
        </div>

        
        <ul class="topbar-menu d-flex align-items-center gap-3">
            <li>
                <div class="d-flex justify-content-center align-items-center gap-1">
                    <a href="{{$lang['az'] ?? '/admin/dashboard'}}" @if(Session('lang') === 'az') class="btn btn-sm btn-success" @else class="btn btn-sm btn-primary" @endif>AZ</a>
                    <a href="{{$lang['en'] ?? '/en/admin/dashboard'}}" @if(Session('lang') === 'en') class="btn btn-sm btn-success" @else class="btn btn-sm btn-primary" @endif>EN</a>
                    <a href="{{$lang['ru'] ?? '/ru/admin/dashobard'}}" @if(Session('lang') === 'ru') class="btn btn-sm btn-success" @else class="btn btn-sm btn-primary" @endif>RU</a>
                </div>
            </li>            
            <li class="d-none d-sm-inline-block">
                <a class="nav-link" data-bs-toggle="offcanvas" href="#theme-settings-offcanvas">
                    <i class="ri-settings-3-line font-22"></i>
                </a>
            </li>

            <li class="d-none d-sm-inline-block">
                <div class="nav-link" id="light-dark-mode" data-bs-toggle="tooltip" data-bs-placement="left"
                    title="Theme Mode">
                    <i class="ri-moon-line font-22"></i>
                </div>
            </li>


            <li class="d-none d-md-inline-block">
                <a class="nav-link" href="#" data-toggle="fullscreen">
                    <i class="ri-fullscreen-line font-22"></i>
                </a>
            </li>

            <li class="dropdown">
                <a class="nav-link dropdown-toggle arrow-none nav-user px-2" data-bs-toggle="dropdown" href="#"
                    role="button" aria-haspopup="false" aria-expanded="false">
                    <span class="account-user-avatar">
                        <img src="{{asset('admin-assets/images/users/avatar-1.jpg')}}" alt="user-image" width="32"
                            class="rounded-circle">
                    </span>
                    <span class="d-lg-flex flex-column gap-1 d-none">
                        <h5 class="my-0">{{Auth::user()->name}}</h5>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated profile-dropdown">

                    <!-- item-->
                    <a href="{{route('admin.users.edit', Auth::user()->id)}}" class="dropdown-item">
                        <i class="mdi mdi-account-circle me-1"></i>
                        <span>{{__('main.my_account')}}</span>
                    </a>

                    <!-- item-->
                    <a href="{{route('admin.logout')}}" class="dropdown-item">
                        <i class="mdi mdi-logout me-1"></i>
                        <span>{{__('main.logout')}}</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- ========== Topbar End ========== -->