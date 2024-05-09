@extends('admin-panel.layouts.layout_main')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">{{__('main.dashboard')}}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-6">
            <a href="{{route('admin.banner.index')}}" class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h3>{{__('main.banner')}}</h3>
                    <h3>{{$banners->count()}}</h3>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6">
            <a href="{{route('admin.about.index')}}" class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h3>{{__('main.about')}}</h3>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6">
            <a href="{{route('admin.projects.index')}}" class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h3>{{__('main.projects')}}</h3>
                    <h3>{{$projects->count()}}</h3>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6">
            <a href="{{route('admin.services.index')}}" class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h3>{{__('main.services')}}</h3>
                    <h3>{{$services->count()}}</h3>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6">
            <a href="{{route('admin.report.annual_report.index')}}" class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h3>{{__('main.annual_report')}}</h3>
                    <h3>{{$annual_reports->count()}}</h3>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6">
            <a href="{{route('admin.report.monthly_report.index')}}" class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h3>{{__('main.monthly_report')}}</h3>
                    <h3>{{$monthly_reports->count()}}</h3>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6">
            <a href="{{route('admin.blogs.index')}}" class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h3>{{__('main.blogs')}}</h3>
                    <h3>{{$blogs->count()}}</h3>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6">
            <a href="{{route('admin.partners.index')}}" class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h3>{{__('main.partners')}}</h3>
                    <h3>{{$partners->count()}}</h3>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6">
            <a href="{{route('admin.donate_messages.index')}}" class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h3>{{__('main.donate_messages')}}</h3>
                    <h3>{{$donate_messages->count()}}</h3>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6">
            <a href="{{route('admin.volunteer_applications.index')}}" class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h3>{{__('main.volunteer_applications')}}</h3>
                    <h3>{{$volunteer_applications->count()}}</h3>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6">
            <a href="{{route('admin.subscribers.index')}}" class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h3>{{__('main.subscribers')}}</h3>
                    <h3>{{$subscribers->count()}}</h3>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6">
            <a href="{{route('admin.menu.index')}}" class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h3>{{__('main.menu')}}</h3>
                    <h3>{{$menues->count()}}</h3>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6">
            <a href="{{route('admin.settings.index')}}" class="card">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <h3>{{__('main.settings')}}</h3>
                </div>
            </a>
        </div>
    </div>
@endsection
