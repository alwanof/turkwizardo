@extends('layouts.master')
@section('seo')
    <title>{{__('seo.title')}} | {{$keywords}}</title>
    <meta name="title" content="{{__('seo.title')}} | {{$keywords}}">
    <meta name="description" content="{{__('seo.description')}}">
    <meta name="keywords" content="{{__('seo.keywords')}}">

    <meta name="og:title" property="og:title" content="{{__('seo.title')}} | {{$keywords}}">
    <meta property=”og:url” content=”{{Request::url()}}” />
    <meta property=”og:description” content=”{{__('seo.description')}}” />
    <meta property=”og:image” content=”{{asset('img/profile.jpg')}}”/>
    <meta property=”og:type” content=”website” />
    <meta property="og:site_name" content="{{__('seo.title')}} | {{$keywords}}" />
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description" content="{{__('seo.description')}}">
    <meta name="twitter:title" content="{{__('seo.title')}} | {{$keywords}}">
    <meta name="twitter:image:src" content="{{asset('img/profile.jpg')}}">
    <meta itemprop="name" content="{{__('seo.title')}} | {{$keywords}}">
    <meta itemprop="description" content="{{__('seo.description')}}">

@endsection
@section('cover')
    <section class="row cover align-items-center">

        <div class="col-12   text-center">
            <img src="{{ asset('img/logo.png') }}" alt="turkwizard.com" height="100px"><br>


        </div>

    </section>
@stop
@section('body')
    <section class="row py-4 mb-5 bg-white">
        <div class="col">
            <searchresult-component :keywords="{{json_encode($keywords)}}" :data="{{json_encode($feeds)}}" :lang="{{ json_encode(app()->getLocale()) }}"  />



        </div>
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

