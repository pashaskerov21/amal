@extends('site.layout')
@section('content')
    @push('meta')
        <title>{{ $settings->getTranslate->where('lang', Session('lang'))->first()->title }}</title>
        <meta property="og:title" content="{{ $settings->getTranslate->where('lang', Session('lang'))->first()->title }}">
        <meta property="og:site_name" content="{{ $settings->getTranslate->where('lang', Session('lang'))->first()->title }}">
        <meta name="twitter:title" content="{{ $settings->getTranslate->where('lang', Session('lang'))->first()->title }}">
    @endpush

    @include('site.sections.banner')
    @include('site.sections.services.service_home')
    @include('site.sections.about.about_home')
    @include('site.sections.about.about_report')


@endsection
