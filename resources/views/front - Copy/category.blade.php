@extends('layouts.master')
@section('seo')
    <title>{{__('seo.title')}} | {{$category->name}}</title>
    <meta name="title" content="{{__('seo.title')}} | {{$category->name}}">
    <meta name="description" content="{{substr($category->description,0,150)}}">
    <meta name="keywords" content="{{__('seo.keywords')}}">

    <meta name="og:title" property="og:title" content="{{__('seo.title')}} | {{$category->name}}">
    <meta property=”og:url” content=”{{Request::url()}}” />
    <meta property=”og:description” content=”{{substr($category->description,0,150)}}” />
    <meta property=”og:image” content=”{{$category->cover}}”/>
    <meta property=”og:type” content=”website” />
    <meta property="og:site_name" content="{{__('seo.title')}} | {{$category->name}}" />
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description" content="{{substr($category->description,0,150)}}">
    <meta name="twitter:title" content="{{__('seo.title')}} | {{$category->name}}">
    <meta name="twitter:image:src" content="{{$category->cover}}">
    <meta itemprop="name" content="{{__('seo.title')}} | {{$category->name}}">
    <meta itemprop="description" content="{{substr($category->description,0,150)}}">

@endsection
@section('cover')
    <section class="row cover align-items-center">

        <div class="col-12 text-center" >
            <div style="background-color:rgba(102, 29, 68, 0.7);color:#fff;display: inline-block">
                <h1 style="text-align: center !important;display: inline-block">{{$category->name}}</h1>
                <br>
                <h2 class="lead px-5" style="display: inline-block;font-size:1.5rem !important">
                    {!! \Illuminate\Support\Str::words($category->description,20) !!}
                </h2>
            </div>


        </div>

    </section>
@stop
@section('body')
    <section class="row mb-3 bg-light">
        <div class=" col-12 text-danger  h5 my-3 p-2 text-center">
            <i class="fa fa-info-circle"></i>
            {{__('category.hint.part1')}}<a href="{{route('results')}}"><i class="fa fa-search"></i> {{__('category.hint.search')}}</a> {{__('category.hint.part2')}}
            <hr>
        </div>


            @foreach($feeds as $key=>$feed)
            <div class="col-lg-6">
            <div class="mb-5">

                <img src="{{$feed->cover}}" alt="{{$feed->name}}" title="{{$feed->name}}" class="img-thumbnail" width="75px" alt="">
                <a href="{{route('feeds.show',$feed->hash)}}"><h5 style="display:inline">{{$feed->name}}.</h5></a>
                <span class="mx-4"><i class="fas fa-map-marker-alt text-primary"></i> <a href="#">{{$feed->city}}</a></span>
                <p class="text-muted" title="{{$feed->tags}}">{{substr($feed->tags,0,50)}}</p>
            </div>
        </div>
                @endforeach


        <div class=" col-12 text-danger  h5 my-3 p-2 text-center">
            <hr>
            <i class="fa fa-info-circle"></i>
            {{__('category.hint.part1')}}<a href="{{route('results')}}"><i class="fa fa-search"></i> {{__('category.hint.search')}}</a> {{__('category.hint.part2')}}

        </div>

    </section>




@stop

@section('css')
    <style>
        .cover{
            background-image:url("{{$category->cover}}") ;
            background-position:center ;
            background-size:cover ;
            background-attachment: fixed;
            height: 350px;
        }
    </style>
@stop

