@extends('layouts.master')
@section('title','Search')
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

