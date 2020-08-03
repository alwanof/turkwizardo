@extends('layouts.mobile')
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

@section('content')

    <div data-card-height="240" class="card card-style mb-4 preload-img" data-src="{{ asset('pwa/img/promo.jpg') }}"
        style="height: 240px; background-image: url(&quot;{{ asset('pwa/img/promo.jpg') }}&quot;);">
        <div class="card-center text-center p-2">
            <h1 class="color-white font-28">{{ $page->title }}</h1>


        </div>
        <div class="card-overlay bg-black opacity-80"></div>
    </div>
    <div class="card card-overflow card-style">
        <div class="content">

            {!! $page->content !!}
        </div>
    </div>

@stop

@section('css')


@stop

@section('js')

@stop
