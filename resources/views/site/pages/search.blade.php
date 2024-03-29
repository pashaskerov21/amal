@extends('site.layout')
@section('content')
    @push('meta')
        <title>{{ __('main.search') }} | {{ $settings->getTranslate->where('lang', Session('lang'))->first()->title }}</title>
    @endpush

    @include('site.components.page_heading_search')
    @if ($services->count() > 0)
        @include('site.sections.services.service_main')
    @endif
    @if ($projects->count() > 0)
        @include('site.sections.projects.project_main')        
    @endif
    @if ($blogs->count() > 0)
        @include('site.sections.media.media_main')
    @endif
    @if($services->count() == 0 && $projects->count() == 0 && $blogs->count() == 0)
        <section class="py-5">
            <div class="container">
                <h2 class="text-center">Axtarışa uyğun nəticə yoxdur</h2>
            </div>
        </section>
    @endif
@endsection
