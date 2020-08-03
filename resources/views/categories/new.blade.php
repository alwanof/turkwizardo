@extends('layouts.dash')

@section('header')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">New Category</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('categories','en')}}">Categories</a></li>
                        <li class="breadcrumb-item active">New Category</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@stop

@section('content')
    <form method="POST" action="{{route('categories.store')}}">
        @csrf
        <input type="hidden" name="update" value="0">
        <input type="hidden" name="hash" value="{{$hash}}">
        <div class="row">
            <div class="col-lg-8">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <div class="border border-primary my-2 p-2">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
									<span class="input-group-text">
										<i class="flag-icon flag-icon-us"></i>
									</span>
                                    </div>
                                    <input type="text" class="form-control" value="{{old('enname')}}" name="enname" placeholder="English Category Name.." required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
									<span class="input-group-text">
										<i class="flag-icon flag-icon-sa"></i>
									</span>
                                    </div>
                                    <input type="text" class="form-control" value="{{old('arname')}}" name="arname" placeholder="Arabic Category Name.." required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
									<span class="input-group-text" >
										<i class="flag-icon flag-icon-tr"></i>
									</span>
                                    </div>
                                    <input type="text" class="form-control" value="{{old('trname')}}" name="trname" placeholder="Turkish Category Name.." required>
                                </div>
                            </div>
                        </div>
                        <div class="border border-primary my-2 p-2">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
									<span class="input-group-text">
										<i class="flag-icon flag-icon-us"></i>
									</span>
                                    </div>
                                    <textarea type="text" class="form-control"  name="endesc" placeholder="English Category Description.." required>
                                    {{old('endesc')}}
								</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
									<span class="input-group-text" >
										<i class="flag-icon flag-icon-sa"></i>
									</span>
                                    </div>
                                    <textarea type="text" class="form-control"  name="ardesc" placeholder="Arabic Category Description.." required>
                                    {{old('ardesc')}}
								</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
									<span class="input-group-text" >
										<i class="flag-icon flag-icon-tr"></i>
									</span>
                                    </div>
                                    <textarea type="text" class="form-control"  name="trdesc" placeholder="Turkish Category Description.." required>
                                    {{old('trdesc')}}
								</textarea>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card card-success card-outline">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="cropU">
                                    <div id="placeholder">
                                        <img src="{{asset('storage/uploads/categories/cover/0.png')}}" class="img-thumbnail" />
                                        <div class="spinner-border text-primary loading" style="display:none" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                    <label class="btn btn-default mt-2">
                                        Browse <input type="file" class="custom-file-input upload_image" name="upload_image" id="upload_image" accept="image/*" hidden>
                                    </label>

                                </div>

                            </div>
                        </div>

                        <hr>
                        <button type="submit" class="btn btn-lg btn-block btn-primary ">PUBLISH</button>
                    </div>
                </div>
            </div>

        </div>
    </form>

    <!-- The Modal -->
    <div id="uploadimageModal" class="modal" role="dialog">
        <div class="modal-dialog" style="max-width: : 400px !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Upload & Crop Image</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">

                    <div class="text-center" style="">
                        <div id="image_demo" style="width:320px; margin: 24px auto !important;"></div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success crop_image" data-dismiss="modal">Crop & Upload Image</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="uploadimageModal1" class="modal" role="dialog">
        <div class="modal-dialog" style="max-width: : 400px !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Upload & Crop Image</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">

                    <div class="text-center" style="">
                        <div id="image_demo1" style="width:320px; margin: 24px auto !important;"></div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success crop_image1" data-dismiss="modal">Crop & Upload Image</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('css')


    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.css">

@stop

@section('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.js"></script>

    <script>
        $(function(){

            var placeID=null;
            var fileID=0;
            $image_crop = $('#image_demo').croppie({
                enableExif: true,
                viewport: {
                    width:250,
                    height:250,
                    type:'square' //square
                },
                boundary:{
                    width:260,
                    height:260
                },

            });

            $('.crop_image').click(function(event){
                $(placeID+' .img-thumbnail').hide();
                $(placeID+' .loading').show();
                $image_crop.croppie('result', {
                    type: 'canvas',
                    size:{
                        width:250,
                        height:250
                    },
                    format:'png',
                    quality:0.7
                }).then(function(response){
                    //var rand=Math.floor(Math.random()*1000000);
                    $.ajax({
                        url:"{{url('/')}}"+"/uploadCat.php?title="+"{{$hash}}",
                        type: "POST",
                        data:{"image": response},
                        success:function(data)
                        {
                            $('#uploadimageModal').modal('hide');
                            $(placeID).html(data);

                        }
                    });
                })
            });

            function canvasArea(areaID,placeHolder){
                placeID=placeHolder;
                var reader = new FileReader();
                reader.onload = function (event) {
                    $image_crop.croppie('bind', {
                        url: event.target.result
                    }).then(function(){
                        console.log('jQuery bind complete');
                    });
                }

                reader.readAsDataURL(areaID.files[0]);
                $('#uploadimageModal').modal('show');

            }

            $('#upload_image').on('change', function(){
                canvasArea(this,'#placeholder');
            });


        });
    </script>
@stop
