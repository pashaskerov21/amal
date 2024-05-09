@extends('site.layout')
@section('content')
    @push('meta')
        <title>{{ $meta_title }} | {{ $settings->getTranslate->where('lang', Session('lang'))->first()->title }}</title>
        <meta property="og:title"
            content="{{ $meta_title }} | {{ $settings->getTranslate->where('lang', Session('lang'))->first()->title }}">
        <meta property="og:site_name"
            content="{{ $meta_title }} | {{ $settings->getTranslate->where('lang', Session('lang'))->first()->title }}">
        <meta name="twitter:title"
            content="{{ $meta_title }} | {{ $settings->getTranslate->where('lang', Session('lang'))->first()->title }}">
    @endpush

    @include('site.components.page_heading')
    @if ($services->count() > 0)
        @include('site.sections.services.service_home')
    @endif
    @include('site.sections.about.about_main')
    @if ($team_members->count() > 0)
        @include('site.sections.team')
    @endif
    @if ($volunteers->count() > 0)
        @include('site.sections.volunteers')
    @endif
    @include('site.sections.about.about_report')
    @if ($partners->count() > 0)
        @include('site.sections.partners')
    @endif
@endsection
