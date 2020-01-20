@extends('layouts.master')
@section('title',$category->name)
@section('cover')
    <section class="row cover align-items-center">

        <div class="col-12 text-center">
            <h1 style="text-align: center !important;">{{$category->name}}</h1>
            <p class="lead px-5">
                {!! substr($category->description,0,200)  !!} ...
            </p>

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

                <img src="{{$feed->cover}}" class="img-thumbnail" width="75px" alt="">
                <a href="category/{{$feed->category->hash}}"><span class="badge badge-primary mx-1">{{$feed->category->name}}</span></a>
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

