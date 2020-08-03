@extends('layouts.mobile')
@section('seo')
    <title>{{ __('seo.title') }} | {{ $category->name }}</title>
    <meta name="title" content="{{ __('seo.title') }} | {{ $category->name }}">
    <meta name="description" content="{{ substr($category->description, 0, 150) }}">
    <meta name="keywords" content="{{ __('seo.keywords') }}">

    <meta name="og:title" property="og:title" content="{{ __('seo.title') }} | {{ $category->name }}">
    <meta property=”og:url” content=”{{ Request::url() }}” />
    <meta property=”og:description” content=”{{ substr($category->description, 0, 150) }}” />
    <meta property=”og:image” content=”{{ $category->cover }}” />
    <meta property=”og:type” content=”website” />
    <meta property="og:site_name" content="{{ __('seo.title') }} | {{ $category->name }}" />
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description" content="{{ substr($category->description, 0, 150) }}">
    <meta name="twitter:title" content="{{ __('seo.title') }} | {{ $category->name }}">
    <meta name="twitter:image:src" content="{{ $category->cover }}">
    <meta itemprop="name" content="{{ __('seo.title') }} | {{ $category->name }}">
    <meta itemprop="description" content="{{ substr($category->description, 0, 150) }}">

@endsection

@section('content')

    <div data-card-height="240" class="card card-style mb-4 preload-img" data-src="{{ asset('pwa/img/promo.jpg') }}"
        style="height: 240px; background-image: url(&quot;{{ asset('pwa/img/promo.jpg') }}&quot;);">
        <div class="card-center text-center p-2">
            <h1 class="color-white font-28">{{ $category->name }}</h1>
            <p>{{ substr($category->description, 0, 150) }}</p>


        </div>
        <div class="card-overlay bg-black opacity-80"></div>
    </div>
    <div class="card card-overflow card-style">
        <div class="content">
            <div class="divider"></div>
            <!-- search results -->
            <div class="card mt-0 card-style shadow-l">
                <div class="content">
                    @foreach ($feeds as $key => $feed)
                        <div class="p-1 border-bottom">

                            <h2 class="font-24">
                                <img src="{{ $feed->cover }}" alt="{{ $feed->name }}" title="{{ $feed->name }}"
                                    class="img-thumbnail rounded-circle" width="42">
                                <a href="factory/{{ $feed->slug }}">{{ $feed->name }}</a>
                                <span class="float-right font-14"><a href="#"
                                        class="color-highlight">{{ $feed->city }}</a></span>
                            </h2>
                            <p class="m-1 font-14" title="{{ $feed->tags }}">
                                @php
                                $tags=explode(',',$feed->tags);
                                @endphp
                                @foreach ($tags as $tag)
                                    <a href="#">
                                        <span class="badge badge-secondary">{{ $tag }}</span>
                                    </a>

                                @endforeach
                            </p>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')


@stop

@section('js')

@stop
