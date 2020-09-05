@extends('layouts.mobile')
@section('seo')
    <title>{{ __('seo.title') }}</title>
    <meta name="title" content="{{ __('seo.title') }}">
    <meta name="description" content="{{ __('seo.description') }}">
    <meta name="keywords" content="{{ __('seo.keywords') }}">

    <meta name="og:title" property="og:title" content="{{ __('seo.title') }}">
    <meta property=”og:url” content=”{{ Request::url() }}” />
    <meta property=”og:description” content=”{{ __('seo.description') }}” />
    <meta property=”og:image” content=”{{ asset('img/profile.jpg') }}” />
    <meta property=”og:type” content=”website” />
    <meta property="og:site_name" content="{{ __('seo.title') }}" />
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description" content="{{ __('seo.description') }}">
    <meta name="twitter:title" content="{{ __('seo.title') }}">
    <meta name="twitter:image:src" content="{{ asset('img/profile.jpg') }}">
    <meta itemprop="name" content="{{ __('seo.title') }}">
    <meta itemprop="description" content="{{ __('seo.description') }}">


@endsection

@section('content')




    <!-- search -->
    <search :categories="{{ json_encode($categories) }}" :cities="{{ json_encode($cities) }}"
        :lang="{{ json_encode(app()->getLocale()) }}"></search>


    <!-- service here -->
    <div class="row">
        <div class="col-md-4">
            <div class="card card-style">
                <div class="p-3 text-center">
                    <a href="{{ route('requests.index') }}"><img src="{{ asset('pwa/images/careers/3.png') }}"
                            class="img-fluid rounded-m shadow-l mb-4"></a>

                    <h2 class="font-30 mb-n1">{{ __('fronthome.menu.serviceATitle') }} </h2>
                    <p class="color-highlight mb-3 font-12">{{ __('fronthome.menu.free') }}</p>
                    <p class="mb-4">{{ __('fronthome.menu.serviceA') }}</p>
                    <a href="{{ route('requests.index') }}"
                        class="btn btn-full btn-m rounded-sm text-uppercase font-900 shadow-xl bg-violet-dark">{{ __('fronthome.menu.serviceBTN') }}</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-style">
                <div class="p-3 text-center">
                    <a href="#" data-menu="menu-form"><img src="{{ asset('pwa/images/careers/2.png') }}"
                            class="img-fluid rounded-m shadow-l mb-4"></a>

                    <h2 class="font-30 mb-n1">{{ __('fronthome.menu.serviceBTitle') }} </h2>
                    <p class="color-blue2-dark mb-3 font-12">{{ __('fronthome.menu.free') }}</p>
                    <p class="mb-4">{{ __('fronthome.menu.serviceB') }}</p>
                    <a href="#" data-menu="menu-form"
                        class="btn btn-full btn-m rounded-sm text-uppercase font-900 shadow-xl bg-violet-dark">{{ __('fronthome.menu.serviceBTN') }}</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-style">
                <div class="p-3 text-center">
                    <a href="{{ url('/pages/almedoan-129318') }}"><img src="{{ asset('pwa/images/careers/1.png') }}"
                            class="img-fluid rounded-m shadow-l mb-4"></a>

                    <h2 class="font-30 mb-n1">{{ __('fronthome.menu.serviceCTitle') }} </h2>
                    <p class="color-orange-dark mb-3 font-12">{{ __('fronthome.menu.paid') }}</p>
                    <p class="mb-4">{{ __('fronthome.menu.serviceC') }}</p>
                    <a href="{{ url('/pages/almedoan-129318') }}"
                        class="btn btn-full btn-m rounded-sm text-uppercase font-900 shadow-xl bg-violet-dark">{{ __('fronthome.menu.serviceBTN') }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-style" style="height: 350px">
                <div class="p-3 text-center">
                    <img src="{{ asset('pwa/images/promocover.png') }}" class="img-fluid rounded-m shadow-l mb-4">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-style" style="height: 350px">
                <div class="p-3 text-center">
                    <h2 class="font-30 text-center mb-3">{{ $sections[0]->title }}</h2>
                    <div style="padding:50.81% 0 0 0;position:relative;">
                        <iframe src="https://player.vimeo.com/video/390672326?byline=0&portrait=0"
                            style="position:absolute;top:0;left:0;width:100%;height:100%;" frameborder="0"
                            allow="autoplay; fullscreen" allowfullscreen></iframe>
                    </div>
                    <script type="application/javascript" src="https://player.vimeo.com/api/player.js"></script>


                </div>
            </div>
        </div>
    </div>
    <!-- categories here -->

    <div class="card card-style">
        <div class="content mb-0">
            <h1 class="text-center mb-0">{{ __('fronthome.menu.categories') }}</h1>
            <p class="text-center color-highlight font-11 mt-n1">{{ __('fronthome.menu.cat1') }}</p>
            <p class="boxed-text-xl mt-n3">
                {{ __('fronthome.menu.cat2') }}
            </p>
            <div class="divider"></div>
        </div>
        <div class="row mr-2 ml-2 mb-0">
            @foreach ($categories as $category)
                <div class="col-lg-2 col-md-3 col-4 text-center mb-2">
                    <a href="{{ route('category.show', $category->hash) }}" title="{{ $category->name }}">
                        <img src="{{ $category->cover }}" alt="{{ $category->name }}" title="{{ $category->name }}"
                            width="50%" class="img-fluid" alt="...">

                    </a>

                    <p class="mt-3 mb-1">
                        <a href="{{ route('category.show', $category->hash) }}" title="{{ $category->name }}">
                            {{ $category->name }}
                        </a>
                    </p>


                </div>
            @endforeach

        </div>
    </div>



@stop

@section('css')
    <style>
        .efade {
            background-image: linear-gradient(181deg, #000000 0%, rgba(0, 0, 0, 0));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            position: relative;
            display: inline-block;
        }

        .efade>span {
            display: none;
        }

    </style>

@stop

@section('js')

@stop
