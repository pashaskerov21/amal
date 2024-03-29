<!-- ========== Left Sidebar Start ========== -->
<div class="leftside-menu">

    
    <!-- Sidebar Hover Menu Toggle Button -->
    <div class="button-sm-hover" data-bs-toggle="tooltip" data-bs-placement="right" title="Show Full Sidebar">
        <i class="ri-checkbox-blank-circle-line align-middle"></i>
    </div>

    <!-- Full Sidebar Menu Close Button -->
    <div class="button-close-fullsidebar">
        <i class="ri-close-fill align-middle"></i>
    </div>

    <!-- Sidebar -left -->
    <div class="h-100" id="leftside-menu-container" data-simplebar>
        <!-- Leftbar User -->
        <div class="leftbar-user">
            <a href="{{ route('admin.users.update', Auth::user()->id) }}">
                <img src="{{ asset('admin-assets/images/users/avatar-1.jpg') }}" alt="user-image" height="42"
                    class="rounded-circle shadow-sm">
                <span class="leftbar-user-name mt-2">{{ Auth::user()->name }}</span>
            </a>
        </div>

        <!--- Sidemenu -->
        <ul class="side-nav">
            <li class="side-nav-title d-none d-xl-block"><h4>{{__('main.admin_panel')}}</h4></li>

            <li class="side-nav-title">{{__('main.navigation')}}</li>

            <li class="side-nav-item">
                <a href="{{ route('admin.dashboard') }}" class="side-nav-link">
                    <i class="uil-home-alt"></i>
                    <span> {{__('main.dashboard')}} </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('admin.banner.index') }}" class="side-nav-link">
                    <i class="ri-image-line"></i>
                    <span> {{__('main.banner')}} </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebar-about" class="side-nav-link">
                    <i class="ri-image-line"></i>
                    <span> {{__('main.about')}} </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse show" id="sidebar-about">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('admin.about.index') }}">{{__('main.main_content')}}</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.about_report.index') }}">{{__('main.report')}}</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.about_text.index') }}">{{__('main.texts')}}</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.team.index') }}">{{__('main.our_team')}}</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('admin.projects.index') }}" class="side-nav-link">
                    <i class="ri-todo-line"></i>
                    <span> {{__('main.projects')}} </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('admin.services.index') }}" class="side-nav-link">
                    <i class="ri-customer-service-2-fill"></i>
                    <span> {{__('main.services')}} </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebar-report" class="side-nav-link">
                    <i class="fa-solid fa-list-check"></i>
                    <span> {{__('main.report')}} </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse show" id="sidebar-report">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('admin.report.year.index') }}">{{__('main.years')}}</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.report.annual_report.index') }}">{{__('main.annual_report')}}</a>
                        </li>
                        <li>
                            <a href="{{ route('admin.report.monthly_report.index') }}">{{__('main.monthly_report')}}</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('admin.blogs.index') }}" class="side-nav-link">
                    <i class="ri-image-line"></i>
                    <span> {{__('main.blogs')}} </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('admin.gallery.index') }}" class="side-nav-link">
                    <i class="ri-image-line"></i>
                    <span> {{__('main.gallery')}} </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('admin.partners.index') }}" class="side-nav-link">
                    <i class="fa-solid fa-users"></i>
                    <span> {{__('main.partners')}} </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('admin.menu.index') }}" class="side-nav-link">
                    <i class="fa-solid fa-bars"></i>
                    <span> {{__('main.menu')}} </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('admin.settings.index') }}" class="side-nav-link">
                    <i class="ri-settings-2-line"></i>
                    <span> {{__('main.settings')}}  </span>
                </a>
            </li>
            
            <li class="side-nav-item">
                <a href="{{ route('admin.users.index') }}" class="side-nav-link">
                    <i class="ri-user-line"></i>
                    <span> {{__('main.users')}}  </span>
                </a>
            </li>
        </ul>
        <!--- End Sidemenu -->

    </div>
</div>
<!-- ========== Left Sidebar End ========== -->
