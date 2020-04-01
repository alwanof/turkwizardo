@extends('layouts.primary')
@section('seo')
    <title>{{__('seo.title')}} | {{__('demand.title')}}</title>
    <meta name="title" content="{{__('seo.title')}} | {{__('demand.title')}}">
    <meta name="description" content="{{__('seo.description')}}">
    <meta name="keywords" content="{{__('seo.keywords')}}">

    <meta name="og:title" property="og:title" content="{{__('seo.title')}} | {{__('demand.title')}}">
    <meta property=”og:url” content=”{{Request::url()}}” />
    <meta property=”og:description” content=”{{__('seo.description')}}” />
    <meta property=”og:image” content=”{{asset('img/profile.jpg')}}”/>
    <meta property=”og:type” content=”website” />
    <meta property="og:site_name" content="{{__('seo.title')}} | {{__('demand.title')}}" />
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description" content="{{__('seo.description')}}">
    <meta name="twitter:title" content="{{__('seo.title')}} | {{__('demand.title')}}">
    <meta name="twitter:image:src" content="{{asset('img/profile.jpg')}}">
    <meta itemprop="name" content="{{__('seo.title')}} | {{__('demand.title')}}">
    <meta itemprop="description" content="{{__('seo.description')}}">

@endsection
@section('cover')
    <section class="row cover align-items-center">

        <div class="col-12   text-center">
            <img src="{{ asset('img/logo.png') }}" alt="{{__('seo.title')}}" title="{{__('seo.title')}}" alt="turkwizard.com" height="100px"><br>


        </div>

    </section>
@stop
@section('body')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        @include('alert')
                    </div>
                    <h2>
                        {{__('demand.title')}}
                        <button class="btn btn-outline-primary float-left mx-2" data-toggle="modal" data-target="#feed">
                            <i class="fa fa-plus"></i> {{__('demand.add_free_request')}}
                        </button>
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <section class="row py-4 mb-5 bg-white">

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">{{__('demand.categories')}}</div>
                <div class="card">
                    <ul class="list-group p-0">
                        @foreach($categories as $category)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{route('requests.index').'?cat='.$category->id}}">{{$category->name}}</a>
                            <span class="badge badge-primary badge-pill">{{$category->feeds->count()}}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>



        </div>
        <div class="col-lg-8">
            <div class="card border-primary ">
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        @foreach($newdemands as $demand)
                            <li class="list-group-item">
                                <h4>
                                    {{$demand->title}}
                                    <button type="button" class="btn btn-sm btn-warning edit" dataOb="{{$demand}}">Edit</button>

                                </h4>

                                <p>
                                    <span class="excerpt">{{substr($demand->desc,0,255)}}<a href="#"  class="exp">{{__('demand.more')}}</a></span>
                                    <span class="content" style="display: none">{{$demand->desc}}<a href="#" class="exp">{{__('demand.less')}}</a></span>

                                </p>
                                <p>
                                    <span class="badge badge-pill badge-secondary"><i class="fa fa-user"></i> {{$demand->name}}</span>
                                    <span class="badge badge-pill badge-secondary"> <i class="fas fa-at"></i> {{$demand->email}} </span>
                                    @if($demand->showPhone)
                                        <span class="badge badge-pill badge-secondary"> <i class="fas fa-phone-volume"></i> {{$demand->phone}} </span>
                                    @endif
                                    <span class="badge badge-pill badge-secondary"><i class="far fa-clock"></i> {{$demand->created_at->diffForHumans()}}</span>

                                    <span class="badge badge-pill badge-secondary"> <i class="fas fa-map-marker-alt"></i> {{$demand->port}}</span>
                                    <i class="flag-icon flag-icon-{{Config::get("countries.".$demand->country)}}"></i> {{$demand->country}}
                                </p>
                            </li>
                            @endforeach
                    </ul>
                </div>
            </div>

            <ul class="list-group list-group-flush">
                @foreach($demands as $demand)
                <li class="list-group-item">
                    <h4>
                        {{$demand->title}}

                    </h4>

                    <p>
                        <span class="excerpt">{{substr($demand->desc,0,255)}}<a href="#"  class="exp">{{__('demand.more')}}</a></span>
                        <span class="content" style="display: none">{{$demand->desc}}<a href="#" class="exp">{{__('demand.less')}}</a></span>

                    </p>
                    <p>
                        <span class="badge badge-pill badge-secondary"><i class="fa fa-user"></i> {{$demand->name}}</span>
                        <span class="badge badge-pill badge-secondary"> <i class="fas fa-at"></i> {{$demand->email}} </span>
                        @if($demand->showPhone)
                        <span class="badge badge-pill badge-secondary"> <i class="fas fa-phone-volume"></i> {{$demand->phone}} </span>
                        @endif
                        <span class="badge badge-pill badge-secondary"><i class="far fa-clock"></i> {{$demand->created_at->diffForHumans()}}</span>

                        <span class="badge badge-pill badge-secondary"> <i class="fas fa-map-marker-alt"></i> {{$demand->port}}</span>
                        <i class="flag-icon flag-icon-{{Config::get("countries.".$demand->country)}}"></i> {{$demand->country}}
                    </p>
                </li>
                @endforeach
                <div class="my-3">
                    {{ $demands->links() }}
                </div>
            </ul>
        </div>

    </section>

@stop
@section('side')
    <section class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">{{__('demand.countries')}}</div>
                <div class="card">
                    <ul class="list-group p-0">
                        @foreach($cities as $city)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <i class="flag-icon flag-icon-{{Config::get("countries.".$city->country)}}"></i>
                            <a href="{{route('requests.index').'?coun='.$city->country}}">{{$city->country}}</a>
                            <span class="badge badge-primary badge-pill">{{$city->total}}</span>
                        </li>
                       @endforeach
                    </ul>
                </div>
            </div>


        </div>

    </section>
    <!-- Modal -->
    <div class="modal fade" id="feed" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <form action="{{route('requests.store')}}" method="post" style="width: 100%">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">{{__('demand.title')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">

                    @csrf

                    <div class="form-group">
                        <label for="subject">{{__('demand.subject')}}</label>
                        <input type="text" id="subject" class="form-control" placeholder="{{__('demand.subject_hint')}}" name="title" aria-describedby="Subject" required>
                    </div>

                    <div class="form-group">
                        <label for="desc">{{__('demand.wdyn')}}</label>
                        <textarea name="desc" id="desc" placeholder="{{__('demand.wdyn_hint')}}" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="port">{{__('demand.shipping_port')}}</label>
                        <input type="text" id="port" class="form-control" placeholder="{{__('demand.shipping_port_hint')}}" name="port" aria-describedby="port" required>
                    </div>
                    <div class="form-group">
                        <label for="desc">{{__('demand.country')}}</label>
                        <select name="country" id="country"  class="form-control" required>
                            <option disabled selected>{{__('demand.select_country')}}</option>
                            @foreach(Config::get('countries') as $key=>$item)
                            <option value="{{$key}}">{{$key}}</option>
                           @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subject">{{__('demand.name')}}</label>
                        <input type="text" id="name" class="form-control" placeholder="{{__('demand.name_hint')}}" name="name" aria-describedby="Name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">{{__('demand.email')}}</label>
                        <input type="email" id="email" class="form-control" placeholder="{{__('demand.email_hint')}}" name="email" aria-describedby="Email address" required>
                    </div>
                    <div class="form-group">
                        <label for="email">{{__('demand.phone')}}</label>
                        <input type="text" id="phone" class="form-control" placeholder="{{__('demand.phone_hint')}}" name="phone" aria-describedby="Phone Number" required>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" name="showphone" class="form-check-input" id="showphone">
                        <label class="form-check-label" for="showphone">{{__('demand.dsmpn')}}</label>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" name="agreement" class="form-check-input" id="agreement" required>
                        <label class="form-check-label" for="agreement">{{__('demand.iagree')}} <a href="#" data-toggle="modal" data-target="#exampleModal">{{__('demand.terms_of_service.title')}}</a></label>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('demand.close')}}</button>
                    <button type="submit" class="btn btn-primary">{{__('demand.submit')}}</button>
                </div>


            </div>
            </form>
        </div>
    </div>

    <!-- Modal 2 -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{__('demand.terms_of_service.title')}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ol>
                        <li>{{__('demand.terms_of_service.li1')}}</li>
                        <li>{{__('demand.terms_of_service.li2')}}</li>
                        <li>{{__('demand.terms_of_service.li3')}}</li>
                    </ol>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('demand.close')}}</button>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal 4 Edit -->
    <div class="modal fade" id="editfeed" tabindex="-1" role="dialog" aria-labelledby="editfeedScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <form action="{{route('requests.store')}}" method="post" style="width: 100%">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editfeedScrollableTitle">{{__('demand.title')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        @csrf

                        <div class="form-group">
                            <label for="esubject">{{__('demand.subject')}}</label>
                            <input type="text" id="esubject" class="form-control" placeholder="{{__('demand.subject_hint')}}" name="title" aria-describedby="Subject" required>
                        </div>

                        <div class="form-group">
                            <label for="edesc">{{__('demand.wdyn')}}</label>
                            <textarea name="desc" id="edesc" placeholder="{{__('demand.wdyn_hint')}}" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="eport">{{__('demand.shipping_port')}}</label>
                            <input type="text" id="eport" class="form-control" placeholder="{{__('demand.shipping_port_hint')}}" name="port" aria-describedby="port" required>
                        </div>
                        <div class="form-group">
                            <label for="ecountry">{{__('demand.country')}}</label>
                            <select name="country" id="ecountry"  class="form-control" required>
                                <option disabled selected>{{__('demand.select_country')}}</option>
                                @foreach(Config::get('countries') as $key=>$item)
                                    <option value="{{$key}}">{{$key}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="ename">{{__('demand.name')}}</label>
                            <input type="text" id="ename" class="form-control" placeholder="{{__('demand.name_hint')}}" name="name" aria-describedby="Name" required>
                        </div>
                        <div class="form-group">
                            <label for="eemail">{{__('demand.email')}}</label>
                            <input type="email" id="eemail" class="form-control" placeholder="{{__('demand.email_hint')}}" name="email" aria-describedby="Email address" required>
                        </div>
                        <div class="form-group">
                            <label for="ephone">{{__('demand.phone')}}</label>
                            <input type="text" id="ephone" class="form-control" placeholder="{{__('demand.phone_hint')}}" name="phone" aria-describedby="Phone Number" required>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" name="showphone" class="form-check-input" id="eshowphone">
                            <label class="form-check-label" for="eshowphone">{{__('demand.dsmpn')}}</label>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" name="agreement" class="form-check-input" id="agreement" required>
                            <label class="form-check-label" for="agreement">{{__('demand.iagree')}} <a href="#" data-toggle="modal" data-target="#exampleModal">{{__('demand.terms_of_service.title')}}</a></label>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('demand.close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('demand.submit')}}</button>
                    </div>


                </div>
            </form>
        </div>
    </div>
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

@section('js')
    <script>
        $(document).ready(function () {
            $(".edit").on("click", function () {
                var dataOb=JSON.parse($(this).attr('dataOb'));

                $("#esubject").val(dataOb.title);
                $("#edesc").val(dataOb.desc);
                $("#eport").val(dataOb.port);
                $("#ecountry").val(dataOb.country);
                $("#ename").val(dataOb.name);
                $("#eemail").val(dataOb.email);
                $("#ephone").val(dataOb.phone);
                $("#eshowphone").val(dataOb.showphone);
                $("#editfeed").modal();

            });

            $(".content").hide();
            $(".exp").on("click", function (e) {
                e.preventDefault();

                $(this).parent().toggle();
                $(this).parent().next().toggle();
                $(this).parent().prev().toggle();


            });


        });
    </script>
    @stop

