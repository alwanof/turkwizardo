@extends('layouts.master')
@section('title','Home')
@section('cover')
    <section class="row cover align-items-center">

        <div class="col-12   text-center">
            <img src="{{ asset('img/logo.png') }}" alt="turkwizard.com" height="100px"><br>
            <form class="form-inline my-3 justify-content-center" method="GET" action="{{ route('results') }}">
                <input type="text" name="keywords" class="form-control-lg"  placeholder="{{__('fronthome.menu.search_hint')}}">

                <button type="submit" class="btn btn-lg btn-primary" >{{__('fronthome.menu.search')}}</button>
            </form>

        </div>

    </section>
@stop
@section('body')
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque, harum recusandae. Accusamus, accusantium alias asperiores, cum ducimus eveniet facilis harum itaque magni mollitia neque perferendis, quod rerum tempore unde voluptatum.</p>
@stop

@section('css')
    <style>
        .cover{
            background-image:url("{{asset('img/cover.jpg')}}") ;
            background-position:center ;
            background-size:cover ;
            background-attachment: fixed;
            height: 450px;
        }
    </style>
@stop

