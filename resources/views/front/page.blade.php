@extends('layouts.master')
@section('title',$page->title)
@section('cover')
    <section class="row cover align-items-center">

        <div class="col-12 text-center">
            <h1 style="text-align: center !important;">{{$page->title}}</h1>
        </div>

    </section>
@stop
@section('body')
    <section class="row mb-3 bg-light">
        {!! $page->content !!}

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

