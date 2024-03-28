@extends('site.layout')
@section('content')
    @push('meta')
        <title>{{$meta_title}} | {{ $settings->getTranslate->where('lang', Session('lang'))->first()->title }}</title>
        <meta property="og:title" content="{{$meta_title}} | {{ $settings->getTranslate->where('lang', Session('lang'))->first()->title }}">
        <meta property="og:site_name" content="{{$meta_title}} | {{ $settings->getTranslate->where('lang', Session('lang'))->first()->title }}">
        <meta name="twitter:title" content="{{$meta_title}} | {{ $settings->getTranslate->where('lang', Session('lang'))->first()->title }}">
    @endpush

    @include('site.components.page_heading')
    <section class="work">
        <div class="container">
            <div class="txt">
                {!! $about->getTranslate->where('lang', Session('lang'))->first()->how_we_work_text !!}
            </div>
        </div>
    </section>
@endsection
