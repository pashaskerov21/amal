@extends('site.layout')
@section('content')
    @push('meta')
        <title>{{ $settings->getTranslate->where('lang', Session('lang'))->first()->title }}</title>
        <meta property="og:title" content="{{ $settings->getTranslate->where('lang', Session('lang'))->first()->title }}">
        <meta property="og:site_name" content="{{ $settings->getTranslate->where('lang', Session('lang'))->first()->title }}">
        <meta name="twitter:title" content="{{ $settings->getTranslate->where('lang', Session('lang'))->first()->title }}">
    @endpush

    @if ($banners->count() > 0)
        @include('site.sections.banner')
    @endif
    @if ($services->count() > 0)
        @include('site.sections.services.service_home')
    @endif
    @if ($about->getTranslate->where('lang', Session('lang'))->first->home_text)
        @include('site.sections.about.about_home')
    @endif
    @include('site.sections.about.about_report')
    @if ($projects->count() > 0)
        @include('site.sections.projects.project_home')
    @endif
@endsection
