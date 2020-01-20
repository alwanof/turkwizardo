@extends('layouts.dash')

@section('header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Category Manager</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <a href="{{route('categories.create')}}" class="btn btn-success btn-sm" role="button">
                            <i class="fas fa-plus"></i>
                            Add New
                        </a>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@stop

@section('content')
    <div class="row">
        <div class="col">

            <category-component :auth="{{ json_encode(Auth::user()) }}" :lang="{{json_encode($lang)}}" :flag="{{json_encode($flag)}}" />


        </div>
        <!-- /.col-md-6 -->
    </div>

@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.css')}}">
@stop

@section('js')
    <script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>
@stop
