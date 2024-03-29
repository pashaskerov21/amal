@extends('site.layout')
@section('content')
    @push('meta')
        <title>{{$blog_translate->title}} | {{ __('main.mediada_biz') }} | {{ $settings->getTranslate->where('lang', Session('lang'))->first()->title }}</title>
        <meta property="og:title" content="{{$blog_translate->title}} | {{ __('main.mediada_biz') }} | {{ $settings->getTranslate->where('lang', Session('lang'))->first()->title }}">
        <meta property="og:site_name" content="{{$blog_translate->title}} | {{ __('main.mediada_biz') }} | {{ $settings->getTranslate->where('lang', Session('lang'))->first()->title }}">
        <meta name="twitter:title" content="{{$blog_translate->title}} | {{ __('main.mediada_biz') }} | {{ $settings->getTranslate->where('lang', Session('lang'))->first()->title }}">
        <meta name="description" content="{{$blog_translate->meta_description}}">
        <meta property="og:description" content="{{$blog_translate->meta_description}}">
    @endpush

    @include('site.components.page_heading_blog')
@endsection
