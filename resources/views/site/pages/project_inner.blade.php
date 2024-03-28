@extends('site.layout')
@section('content')
    @push('meta')
        <title>{{$project_translate->title}} | {{ __('main.projects') }} | {{ $settings->getTranslate->where('lang', Session('lang'))->first()->title }}</title>
        <meta property="og:title" content="{{$project_translate->title}} | {{ __('main.projects') }} | {{ $settings->getTranslate->where('lang', Session('lang'))->first()->title }}">
        <meta property="og:site_name" content="{{$project_translate->title}} | {{ __('main.projects') }} | {{ $settings->getTranslate->where('lang', Session('lang'))->first()->title }}">
        <meta name="twitter:title" content="{{$project_translate->title}} | {{ __('main.projects') }} | {{ $settings->getTranslate->where('lang', Session('lang'))->first()->title }}">
        <meta name="description" content="{{$project_translate->meta_description}}">
        <meta property="og:description" content="{{$project_translate->meta_description}}">
    @endpush

    @include('site.components.page_heading_project')
    @include('site.sections.projects.project_inner')
    @include('site.sections.projects.project_gallery')
@endsection
