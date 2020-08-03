@extends('layouts.master')
@section('seo')
    <title>{{ __('seo.title') }} | {{ $page->title }}</title>
    <meta name="title" content="{{ __('seo.title') }} | {{ $page->title }}">
    <meta name="description" content="{{ \Illuminate\Support\Str::words(strip_tags($page->content), 25) }}">
    <meta name="keywords" content="{{ __('seo.keywords') }}">

    <meta name="og:title" property="og:title" content="{{ __('seo.title') }} | {{ $page->title }}">
    <meta property=”og:url” content=”{{ Request::url() }}” />
    <meta property=”og:description” content=”{{ \Illuminate\Support\Str::words(strip_tags($page->content), 25) }}” />
    <meta property=”og:image” content=”{{ asset('img/cover.jpg') }}” />
    <meta property=”og:type” content=”website” />
    <meta property="og:site_name" content="{{ __('seo.title') }} | {{ $page->title }}" />
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description" content="{{ \Illuminate\Support\Str::words(strip_tags($page->content), 25) }}">
    <meta name="twitter:title" content="{{ __('seo.title') }} | {{ $page->title }}">
    <meta name="twitter:image:src" content="{{ asset('img/cover.jpg') }}">
    <meta itemprop="name" content="{{ __('seo.title') }} | {{ $page->title }}">
    <meta itemprop="description" content="{{ \Illuminate\Support\Str::words(strip_tags($page->content), 25) }}">

@endsection
@section('cover')

    <section class="row cover align-items-center">

        <div class="col-12 text-center">
            <h1 style="text-align: center !important;">{{ $page->title }}</h1>
        </div>

    </section>
@stop
@section('body')
    <section class="row  mb-3 bg-light">
        {!! $page->content !!}



    </section>




@stop

@section('css')
    <style>
        .cover {
            background-image:url("{{ asset('img/cover.jpg') }}");
            background-position: center;
            background-size: cover;
            background-attachment: fixed;
            height: 350px;
        }

    </style>
@stop
