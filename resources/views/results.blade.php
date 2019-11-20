<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">


  <style>
    main{
      margin: 24px;
    }
    .footer {
      background-color: #f5f5f5;
    }
  </style>



  <title>Hello, world!</title>
</head>
<body >
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <a class="navbar-brand" href="#">
      <img src="{{ asset('img/logoD.png') }}" width="48px" alt="">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse" id="navbarNavDropdown">
     <ul class="navbar-nav">
      <li class="nav-item active">
       <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="#">Features</a>
     </li>
     <li class="nav-item">
       <a class="nav-link" href="#">Pricing</a>
     </li>
     <li class="nav-item dropdown">
       <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Dropdown link
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
      </div>
    </li>
  </ul>
</div>
</nav>
<main class="container mt-5 pt-5">
  <div class="row">
    <div class="col-lg-9">
      <section class="row text-center">
        <div class="col-lg-4">
          <img src="{{ asset('img/search-anim.gif') }}" class="img-fluid" alt="">
        </div>
        <div class="col-lg-8">
          <img src="{{ asset('img/logo.png') }}" alt="turkwizard.com" height="100px"><br>
          <form class="form-inline" method="GET" action="{{ route('results') }}">
            <div class="form-group ">
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fa fa-search"></i>
                  </div>
                </div>
                <input type="text" class="form-control-lg"  placeholder="Search for anything..">
              </div>
            </div>
            <button type="submit" class="btn btn-lg btn-primary" >Search</button>
          </form>
        </div>

      </section>
      <hr>
      <section class="row mb-5">
        <div class="col">
            @for ($i=1 ;$i<10;$i++ )

            <div class="mb-4">
                    <a href="#"><span class="badge badge-primary mx-1">Lorem</span></a>
                    <a href="#"><h5 style="display:inline">Lorem ipsum dolor sit.</h5></a>
                    <span class="mx-4"><i class="fas fa-map-marker-alt text-primary"></i> <a href="#">Istanbul</a></span>
                    <p class="text-muted">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque provident quia necessitatibus iste magnam maxime...</p>
            </div>
            @endfor


        </div>
      </section>

    </div>
    <aside class="col-lg-3 bg-light py-4">
      <div class="mb-5">
        <h4 class="text-warning" >About</h4>
        <p class="mb-0 p-4 ">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
      </div>
      <div class="p-4-mb-5">
        <h4 ><h4 class="text-warning" >Last Items</h4></h4>
        <div class="card h-100 mb-2">
          <img src="https://placeimg.com/400/225/tech" class="card-img-top" alt="...">
          <div class="card-body">
            <a href="#"><h5 class="card-title text-primary">Lorem  </h5></a>

          </div>
          <div class="card-footer text-center">
            <a href="#"><span class="badge badge-primary">Chemicals and Plastic</span></a>
          </div>
        </div>
        <div class="card h-100 mb-2">
          <img src="https://placeimg.com/400/225/tech" class="card-img-top" alt="...">
          <div class="card-body">
            <a href="#"><h5 class="card-title text-primary">Lorem  </h5></a>

          </div>
          <div class="card-footer text-center">
            <a href="#"><span class="badge badge-primary">Chemicals and Plastic</span></a>
          </div>
        </div>
        <div class="card h-100 mb-2">
          <img src="https://placeimg.com/400/225/tech" class="card-img-top" alt="...">
          <div class="card-body">
            <a href="#"><h5 class="card-title text-primary">Lorem  </h5></a>

          </div>
          <div class="card-footer text-center">
            <a href="#"><span class="badge badge-primary">Chemicals and Plastic</span></a>
          </div>
        </div>
        <div class="card h-100 mb-2">
          <img src="https://placeimg.com/400/225/tech" class="card-img-top" alt="...">
          <div class="card-body">
            <a href="#"><h5 class="card-title text-primary">Lorem  </h5></a>

          </div>
          <div class="card-footer text-center">
            <a href="#"><span class="badge badge-primary">Chemicals and Plastic</span></a>
          </div>
        </div>
        <div class="card h-100 mb-2">
          <img src="https://placeimg.com/400/225/tech" class="card-img-top" alt="...">
          <div class="card-body">
            <a href="#"><h5 class="card-title text-primary">Lorem  </h5></a>

          </div>
          <div class="card-footer text-center">
            <a href="#"><span class="badge badge-primary">Chemicals and Plastic</span></a>
          </div>
        </div>
      </div>
    </aside>
  </div>
</main>
<footer class="footer mt-auto py-3">
  <div class="container">
    <span class="text-muted">Place sticky footer content here.</span>
  </div>
</footer>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
