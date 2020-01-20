@extends('layouts.master')
@section('title',$feed->name)
@section('cover')
    <section class="row cover align-items-center">

        <div class="col-12 text-center">
           <h1 style="text-align: center !important;">{{$feed->name}}</h1>
            <p class="lead px-5">
                {!! substr($feed->description,0,200)  !!} ...
            </p>

        </div>

    </section>
@stop
@section('body')
        <section class="row mb-5">
            <div class="col">
                        <div class="row">
                            <div class="col-lg-4 text-center">
                                <img src="{{$feed->cover}}" class="img-thumbnail" alt="">
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
                        <span class="badge badge-warning">{{$tag}}</span>
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
                <img src="{{$feed->pics[$i]}}" class="img-thumbnail" alt="">
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

