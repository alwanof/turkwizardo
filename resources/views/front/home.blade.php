@extends('layouts.master')
@section('seo')
  <title>{{__('seo.title')}}</title>
  <meta name="title" content="{{__('seo.title')}}">
  <meta name="description" content="{{__('seo.description')}}">
  <meta name="keywords" content="{{__('seo.keywords')}}">

  <meta name="og:title" property="og:title" content="{{__('seo.title')}}">
  <meta property=”og:url” content=”{{Request::url()}}” />
  <meta property=”og:description” content=”{{__('seo.description')}}” />
  <meta property=”og:image” content=”{{asset('img/profile.jpg')}}”/>
  <meta property=”og:type” content=”website” />
  <meta property="og:site_name" content="{{__('seo.title')}}" />
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:description" content="{{__('seo.description')}}">
  <meta name="twitter:title" content="{{__('seo.title')}}">
  <meta name="twitter:image:src" content="{{asset('img/profile.jpg')}}">
  <meta itemprop="name" content="{{__('seo.title')}}">
  <meta itemprop="description" content="{{__('seo.description')}}">

@endsection
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

  @foreach ($sections as $section )
<section class="row mb-5">
    <div class="col">
      <div class="card border-primary">
        <div class="card-header bg-primary text-white">{{ $section->title }}</div>
        <div class="card-body">
            <p class="lead text-center">{{ $section->description }}</p>
          {!! $section->content !!}
        </div>
      </div>
    </div>
  </section>
  @endforeach
  <section class="row mb-5">
      <div class=" col-12 text-center text-primary  h3 p-2">
          <i class="fa fa-star"></i>
          {{__('fronthome.menu.categories')}}
      </div>
      <div class="card-columns">
          @foreach ($categories as $category)


          <div class="card shadow-sm p-0  bg-white">
              <a href="{{route('category.show',$category->hash)}}" title="{{$category->name}}">
                  <img src="{{ $category->cover}}" title="{{$category->name}}" class="card-img-top" alt="...">
              </a>
              <div class="card-body text-center">
                  <a href="{{route('category.show',$category->hash)}}" title="{{$category->name}}"><h5 class="card-title text-primary">{{ $category->name }} </h5></a>

              </div>

          </div>
          @endforeach
      </div>

  </section>
  <section class="row mb-5">
      <div class=" col-12 text-center text-primary  h3 p-2">
          <i class="fa fa-star"></i>
          {{__('fronthome.menu.recommended')}}
      </div>

      <div class="card-columns">
      @foreach ($recos as $reco)

              <div class="card  shadow-sm p-0  bg-white">
                  <a href="{{route('feeds.show',$reco->hash)}}" title="{{$reco->tags}}">
                      <img src="{{ asset('storage/uploads/feeds/cover').'/'.$reco->hash.'.jpg' }}" title="{{$reco->tags}}" class="card-img-top" alt="...">
                  </a>
                  <div class="card-body text-center">
                      <a href="{{route('feeds.show',$reco->hash)}}" title="{{$reco->tags}}"><h5 class="card-title text-primary">{{ $reco->name }} </h5></a>
                      <p class="text-center border-top">
                          <a href="{{route('category.show',$reco->category->hash)}}"><span class="text-warning">{{ $reco->category->name }}</span></a>
                      </p>
                  </div>

              </div>

      @endforeach
          </div>
  </section>
  <!-- Most popular -->
  <section class="row mb-5">
      <div class=" col-12 text-center text-primary  h3 p-2">
          <i class="fa fa-users"></i>
          {{__('fronthome.menu.most_popular')}}
      </div>

      <div class="card-columns">
      @foreach ($pops as $pop)

              <div class="card  shadow-sm p-0  bg-white">
                  <a href="{{route('feeds.show',$pop->hash)}}" title="{{$pop->tags}}">
                      <img src="{{ asset('storage/uploads/feeds/cover').'/'.$pop->hash.'.jpg' }}" class="card-img-top" alt="...">
                  </a>
                  <div class="card-body text-center">
                      <a href="{{route('feeds.show',$pop->hash)}}"><h5 class="card-title text-primary">{{ $pop->name }}</h5></a>
                      <p class="text-center border-top">
                          <a href="{{route('category.show',$pop->category->hash)}}"><span class="text-warning">{{ $pop->category->name }}</span></a>
                      </p>
                  </div>

              </div>

      @endforeach
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
            height: 450px;
        }
    </style>
    @stop

