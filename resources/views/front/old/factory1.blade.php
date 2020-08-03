@extends('layouts.master')

@section('seo')
    <title>{{__('seo.title')}} | {{$feed->name}}</title>
    <meta name="title" content="{{__('seo.title')}} | {{$feed->name}}">
    <meta name="description" content="{{substr($feed->description,0,150)}}">
    <meta name="keywords" content="{{\Illuminate\Support\Str::words($feed->tags,15)}}">

    <meta name="og:title" property="og:title" content="{{__('seo.title')}} | {{$feed->name}}">
    <meta property=”og:url” content=”{{Request::url()}}” />
    <meta property=”og:description” content=”{{substr($feed->description,0,150)}}” />
    <meta property=”og:image” content=”{{$feed->cover}}”/>
    <meta property=”og:type” content=”website” />
    <meta property="og:site_name" content="{{__('seo.title')}} | {{$feed->name}}" />
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description" content="{{substr($feed->description,0,150)}}">
    <meta name="twitter:title" content="{{__('seo.title')}} | {{$feed->name}}">
    <meta name="twitter:image:src" content="{{$feed->cover}}">
    <meta itemprop="name" content="{{__('seo.title')}} | {{$feed->name}}">
    <meta itemprop="description" content="{{substr($feed->description,0,150)}}">

@endsection
@section('cover')
    <section class="row cover align-items-center">

        <div class="col-12 text-center">
            <div style="background-color:rgba(102, 29, 68, 0.7);color:#fff;display: inline-block">
           <h1 style="text-align: center !important;display: inline-block">{{$feed->name}}</h1>
                <br>
            <h2 class="lead px-5" style="display: inline-block;font-size:1.5rem !important">
                {!! \Illuminate\Support\Str::words($feed->description,20) !!}
            </h2>
            </div>

        </div>

    </section>
@stop
@section('body')
        <section class="row mb-5">
            <div class="col">
                        <div class="row">
                            <div class="col-lg-4 text-center">
                                <img src="{{$feed->cover}}" alt="{{$feed->name}}" title="{{$feed->name}}" class="img-thumbnail" alt="">
                            </div>
                            <div class="col-lg-8">
                                <ul class="list-group">

                                    <li class="list-group-item">
                                        <strong>{{__('factory.menu.category')}}:</strong>
                                        <blockquote>{{$feed->category->name}}</blockquote>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>{{__('factory.menu.city')}}:</strong>
                                        <blockquote>{{$feed->city}}</blockquote>
                                    </li>
                                    <li class="list-group-item">
                                        <strong>{{__('factory.menu.website')}}:</strong>
                                        <blockquote><a href="{{$feed->website}}" target="_blank">{{$feed->website}}</a></blockquote>
                                    </li>

                                </ul>
                            </div>
                        </div>


            </div>
        </section>
        <section class="row mb-3">
            <div class=" col-12 text-primary  h3 p-2">
                <i class="fa fa-info-circle"></i>
                {{__('factory.menu.description')}}
            </div>
            <div class="col-12 mb-3">
                <p class="lead">
                    {!! $feed->description !!}
                </p>
            </div>

        </section>
        <section class="row mb-3">
            <div class=" col-12 text-primary  h3 p-2">
                <i class="fa fa-list-alt"></i>
                {{__('factory.menu.products')}}
            </div>
            <div class="col-12 mb-3">
                <p class="lead">

                    @php
                    $tags=explode(',',$feed->tags);
                    @endphp
                    @foreach($tags as $tag)
                        <a href="{{url('/results?keywords='.$tag)}}">
                            <span class="badge badge-warning">{{$tag}}</span>
                        </a>

                    @endforeach
                </p>
            </div>

        </section>
        <section class="row mb-3">
            <div class=" col-12 text-primary  h3 p-2">
                <i class="fa fa-photo"></i>
                {{__('factory.menu.gallery')}}
            </div>
            @for($i=1;$i<7;$i++)
                @if(isset($feed->pics[$i]))
            <div class="col-lg-4 mb-2">
                <img src="{{$feed->pics[$i]}}" alt="{{$feed->name}}" title="{{$feed->name}}" class="img-thumbnail" alt="">
            </div>
                @endif
            @endfor

        </section>



@stop

@section('css')
    <style>
        .cover{
            background-image:url("{{asset('img/cover.jpg')}}") ;
            background-position:center ;
            background-size:cover ;
            background-attachment: fixed;
            height: 350px;
        }
    </style>
@stop

