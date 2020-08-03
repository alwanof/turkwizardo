@extends('layouts.mobile')
@section('seo')
    <title>{{ __('seo.title') }} | {{ $feed->name }}</title>
    <meta name="title" content="{{ __('seo.title') }} | {{ $feed->name }}">
    <meta name="description" content="{{ substr($feed->description, 0, 150) }}">
    <meta name="keywords" content="{{ \Illuminate\Support\Str::words($feed->tags, 15) }}">

    <meta name="og:title" property="og:title" content="{{ __('seo.title') }} | {{ $feed->name }}">
    <meta property=”og:url” content=”{{ Request::url() }}” />
    <meta property=”og:description” content=”{{ substr($feed->description, 0, 150) }}” />
    <meta property=”og:image” content=”{{ $feed->cover }}” />
    <meta property=”og:type” content=”website” />
    <meta property="og:site_name" content="{{ __('seo.title') }} | {{ $feed->name }}" />
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description" content="{{ substr($feed->description, 0, 150) }}">
    <meta name="twitter:title" content="{{ __('seo.title') }} | {{ $feed->name }}">
    <meta name="twitter:image:src" content="{{ $feed->cover }}">
    <meta itemprop="name" content="{{ __('seo.title') }} | {{ $feed->name }}">
    <meta itemprop="description" content="{{ substr($feed->description, 0, 150) }}">

@endsection

@section('content')

    <div data-card-height="240" class="card card-style mb-4 preload-img" data-src="{{ asset('pwa/img/promo.jpg') }}"
        style="height: 240px; background-image: url(&quot;{{ asset('pwa/img/promo.jpg') }}&quot;);">
        <div class="card-center text-center p-2">
            <img src="{{ $feed->cover }}" alt="{{ $feed->name }}" title="{{ $feed->name }}"
                class="img-thumbnail rounded-circle" width="150">
            <h1 class="color-white font-28">{{ $feed->name }}</h1>


        </div>
        <div class="card-overlay bg-black opacity-80"></div>
    </div>
    <div class="card card-overflow card-style">
        <div class="content">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <h2 class="font-30">{{ __('factory.menu.description') }}</h2>
                    <p class="mt-n1 font-12 color-highlight mb-4"><a href="{{ $feed->website }}"
                            target="_blank">{{ $feed->website }}</a></p>
                </div>
                <div class="flex-shrink-1">
                    <h3 class="font-20">{{ $feed->category->name }}</h3>
                    <span
                        class="bg-violet-dark float-right rounded-xs text-uppercase font-900 font-9 pr-2 pl-2 pb-0 pt-0 line-height-s mt-n1">
                        {{ $feed->city }}
                    </span>
                </div>
            </div>
            <div class="divider"></div>
            <p>
                {!! $feed->description !!}
            </p>

            <div class="d-flex mt-4">
                <div class="flex-grow-1">

                    <p class="mt-n2">
                        <strong class="color-theme">Share with the World</strong>
                    </p>
                </div>
                <div class="flex-shrink-1 mt-1">

                    <a href="#" data-menu="menu-share" class="icon icon-xs rounded-xl shadow-m ml-2 bg-red2-dark"><i
                            class="fa fa-heart"></i></a>
                </div>
            </div>

            <div class="flex-grow-1">
                <h2 class="font-30"> {{ __('factory.menu.products') }}</h2>

            </div>
            <div class="divider mt-4"></div>
            <p>
                @php
                $tags=explode(',',$feed->tags);
                @endphp
                @foreach ($tags as $tag)
                    <a href="{{ url('/results?keywords=' . $tag) }}">
                        <span class="badge badge-warning">{{ $tag }}</span>
                    </a>

                @endforeach
            </p>

            <div class="flex-grow-1">
                <h2 class="font-30"> {{ __('factory.menu.gallery') }}</h2>

            </div>
            <div class="divider mt-4"></div>
            <div class="row text-center row-cols-3 mb-0">
                @for ($i = 1; $i < 7; $i++)
                    @if (isset($feed->pics[$i]))
                        <a class="col mb-4 default-link" data-lightbox="gallery-1" href="{{ $feed->pics[$i] }}"
                            title="Vynil and Typerwritter">
                            <img src="{{ $feed->pics[$i] }}" alt="{{ $feed->name }}" title="{{ $feed->name }}"
                                data-src="{{ $feed->pics[$i] }}" class="img-fluid rounded-xs preload-img">
                        </a>
                    @endif
                @endfor

            </div>
        </div>
    </div>

@stop

@section('css')


@stop

@section('js')

@stop
