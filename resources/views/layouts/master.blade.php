<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', session('lang')) }}">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
  @if (session('lang')=='ar')
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
  @endif





  <style>
      body{
          background-image: url("{{asset('img/pattern1.png')}}");
      }
    main{
      margin: 24px;
    }
    .footer {
      background-color: #f5f5f5;
    }
  </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" />
    <!-- Flag-icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.3.0/css/flag-icon.css" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

  <title>{{ config('app.name', 'Laravel') }} @yield('title')</title>
  @yield('css')
</head>
<body  style="overflow-x: hidden;">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <a class="navbar-brand" href="{{url('/')}}">
        <img src="{{ asset('img/logoD.png') }}" width="48px" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav {{(session('lang')=='ar')?'ml':'mr'}}-auto">
            <li class="nav-item {{ (strpos(Route::currentRouteName(), 'start') == 0) ? 'active' : '' }}">
                <a class="nav-link" href="{{route('start')}}">{{__('fronthome.menu.home')}} </a>
            </li>
            @include('includes.nav')

            <li class="nav-item">
                <a href="#" class="btn btn-sm btn-outline-warning navbar-btn m-2 " >{{__('fronthome.menu.add_your_factory')}}</a>
            </li>
            <li class="nav-item">
                <a href="https://www.facebook.com/turkwizard" class="nav-link" >
                    <i class="fab fa-facebook-f"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="https://twitter.com/WizardTurk" class="nav-link" >
                    <i class="fab fa-twitter"></i>

                </a>
            </li>
            <li class="nav-item">
                <a href="https://www.instagram.com/turkwizard.com.tr/" class="nav-link" >
                    <i class="fab fa-instagram"></i>

                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link" >
                    <i class="fab fa-youtube"></i>

                </a>
            </li>

        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li class="nav-item"><a href="{{route('lang','tr')}}" class="nav-link">TR</a></li>
            <li class="nav-item"><a href="{{route('lang','ar')}}" class="nav-link"> ع</a></li>
            <li class="nav-item"><a href="{{route('lang','en')}}" class="nav-link">En</a></li>

        </ul>
    </div>
</nav>
    @yield('cover')
<main class="container" id="app"  style="margin-top: -64px;">
  <div class="row" >
    <div class="col-lg-9">

      @yield('body')
    </div>
    <aside class="col-lg-3 bg-light py-4">
       @include('sidebars.default')
    </aside>
  </div>
</main>
<footer class="footer mt-auto py-3">
  <div class="container">
    <span class="text-muted">© {{date('Y')}} Turkwizard All Rights Reserved.</span>
  </div>
</footer>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" ></script>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@yield('js')
</body>
</html>
