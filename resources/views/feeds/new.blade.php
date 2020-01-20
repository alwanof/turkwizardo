@extends('layouts.dash')

@section('header')
<!-- Content Header (Page header) -->
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1 class="m-0 text-dark">New feed</h1>
			</div><!-- /.col -->
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('feeds','en')}}">Feeds</a></li>
					<li class="breadcrumb-item active">New Feed</li>
				</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@stop

@section('content')
<form method="POST" action="{{route('feeds.store')}}">
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
                            <input type="text" class="form-control" value="{{old('enname')}}" name="enname" placeholder="English Feed Name.." required>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="flag-icon flag-icon-sa"></i>
									</span>
								</div>
								<input type="text" class="form-control" value="{{old('arname')}}" name="arname" placeholder="Arabic Feed Name.." required>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" >
										<i class="flag-icon flag-icon-tr"></i>
									</span>
								</div>
								<input type="text" class="form-control" value="{{old('trname')}}" name="trname" placeholder="Turkish Feed Name.." required>
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
								<textarea type="text" class="form-control"  name="endesc" placeholder="English Feed Description.." required>
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
								<textarea type="text" class="form-control"  name="ardesc" placeholder="Arabic Feed Description.." required>
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
								<textarea type="text" class="form-control"  name="trdesc" placeholder="Turkish Feed Description.." required>
                                    {{old('trdesc')}}
								</textarea>
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

                            <select name="entags[]" id="entags" class="form-control" multiple required>
                                    @if(old('entags')) @foreach (old('entags') as $item )
                                    <option selected>{{$item}}</option>
                                    @endforeach @endif
                                @foreach ($tagsEn as $tag )
                                    <option >{{$tag->name}}</option>
                                    @endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text">
										<i class="flag-icon flag-icon-sa"></i>
									</span>
								</div>
								<select name="artags[]" id="artags" class="form-control" multiple required>
									@if(old('artags')) @foreach (old('artags') as $item )
                                        <option selected>{{$item}}</option>
                                    @endforeach @endif
                                    @foreach ($tagsAr as $tag )
                                    <option >{{$tag->name}}</option>
                                    @endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" >
										<i class="flag-icon flag-icon-tr"></i>
									</span>
								</div>
								<select name="trtags[]" id="trtags" class="form-control" multiple required>
									@if(old('trtags')) @foreach (old('trtags') as $item )
                                        <option selected>{{$item}}</option>
                                    @endforeach @endif
                                    @foreach ($tagsTr as $tag )
                                        <option >{{$tag->name}}</option>
                                    @endforeach
								</select>
							</div>
						</div>
					</div>

					<div class="border border-primary my-2 p-2">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text" >
										<i class="fas fa-map-marker-alt"></i>
									</span>
								</div>
								<select name="city" id="city" class="form-control" required>
									<option value="0" disabled selected>Feed City..</option>
									@foreach (Config::get('cities.en') as $city)
									<option {{(old("city") == $city ? "selected":"")}}>{{$city}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class='form-group'>
							<div class='input-group'>
								<div class='input-group-prepend'>
									<span class='input-group-text'>
										<i class='fa fa-envelope'></i>
									</span>
								</div>
								<input type='email' class='form-control' value="{{old('email')}}" name="email" placeholder='Feed Email..' required>
							</div>
						</div>
						<div class='form-group'>
							<div class='input-group'>
								<div class='input-group-prepend'>
									<span class='input-group-text'>
										<i class='fa fa-phone'></i>
									</span>
								</div>
								<input type='text' class='form-control' value="{{old('phone')}}" name="phone" placeholder='Feed Phone..' required >
							</div>
						</div>
						<div class='form-group'>
							<div class='input-group'>
								<div class='input-group-prepend'>
									<span class='input-group-text'>
										<i class='fa fa-globe'></i>
									</span>
								</div>
								<input type='url' class='form-control' value="{{old('website')}}" name="website" placeholder='Feed Website' required>
							</div>
						</div>

					</div>
					<div class="row text-center">
						<div class="col-lg-4">
							<div class="cropU">
								<div id="placeholder1">
                                    <img src="{{asset('storage/uploads/feeds/01.png')}}" class="img-thumbnail" />
                                    <div class="spinner-border text-primary loading" style="display:none" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
								</div>
								<label class="btn btn-default mt-2">
									Browse
									<input type="file" class="custom-file-input upload_image" name="upload_image1" id="upload_image1" accept="image/*" hidden>
								</label>

							</div>
						</div>
						<div class="col-lg-4">
							<div class="cropU">
								<div id="placeholder2">
                                    <img src="{{asset('storage/uploads/feeds/02.png')}}" class="img-thumbnail" />
                                    <div class="spinner-border text-primary loading" style="display:none" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
								</div>
								<label class="btn btn-default mt-2">
									Browse
									<input type="file" class="custom-file-input upload_image" name="upload_image2" id="upload_image2" accept="image/*" hidden>
								</label>

							</div>
						</div>
						<div class="col-lg-4">
							<div class="cropU">
								<div id="placeholder3">
                                    <img src="{{asset('storage/uploads/feeds/03.png')}}" class="img-thumbnail" />
                                    <div class="spinner-border text-primary loading" style="display:none" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
								</div>
								<label class="btn btn-default mt-2">
									Browse
									<input type="file" class="custom-file-input upload_image" name="upload_image3" id="upload_image3" accept="image/*" hidden>
								</label>

							</div>
						</div>
					</div>
					<div class="row mt-4 text-center">
						<div class="col-lg-4">
							<div class="cropU">
								<div id="placeholder4">
                                    <img src="{{asset('storage/uploads/feeds/04.png')}}" class="img-thumbnail" />
                                    <div class="spinner-border text-primary loading" style="display:none" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
								</div>
								<label class="btn btn-default mt-2">
									Browse
									<input type="file" class="custom-file-input upload_image" name="upload_image4" id="upload_image4" accept="image/*" hidden>
								</label>

							</div>
						</div>
						<div class="col-lg-4">
							<div class="cropU">
								<div id="placeholder5">
                                    <img src="{{asset('storage/uploads/feeds/05.png')}}" class="img-thumbnail" />
                                    <div class="spinner-border text-primary loading" style="display:none" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
								</div>
								<label class="btn btn-default mt-2">
									Browse
									<input type="file" class="custom-file-input upload_image" name="upload_image5" id="upload_image5" accept="image/*" hidden>
								</label>

							</div>
						</div>
						<div class="col-lg-4">
							<div class="cropU">
								<div id="placeholder6">
                                    <img src="{{asset('storage/uploads/feeds/06.png')}}" class="img-thumbnail" />
                                    <div class="spinner-border text-primary loading" style="display:none" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
								</div>
								<label class="btn btn-default mt-2">
									Browse
									<input type="file" class="custom-file-input upload_image" name="upload_image6" id="upload_image6" accept="image/*" hidden>
								</label>

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
                                    <img src="{{asset('storage/uploads/feeds/0.png')}}" class="img-thumbnail" />
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
					<div class="form-group">
						<div class="input-group">
							<div class="input-group-prepend">
								<span class="input-group-text" >
									<i class="fas fa-folder-plus"></i>
								</span>
							</div>
							<select name="category" id="category_id" class="form-control" required>
								<option value="0" disabled selected>Feed Category..</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{(old("category") == $category->id ? "selected":"")}}>{{$category->name}}</option>
                                @endforeach
							</select>
						</div>
						<hr>
					</div>

					<div class="row">

						<div class="col-lg-6">
							<div class="form-group">
								<label>
									Rate:
									<input type="number"  value="{{(old("rate"))?old("rate"):'0'}}" class="form-control"  name="rate" >
								</label>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label>
									Recommended:
									<input type="checkbox"  name="reco" {{(old('reco')==1)?'checked':''}} data-toggle="toggle"  data-size="small" data-onstyle="success">
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
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.css">

@stop

@section('js')
<script src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.js"></script>

<script>
	$(function(){

		var placeID=null;
        var fileID=0;
		$image_crop = $('#image_demo').croppie({
			enableExif: true,
			viewport: {
				width:300,
				height:300,
            type:'square' //square
        },
        boundary:{
        	width:310,
        	height:310
        },

    });

		$('.crop_image').click(function(event){
            $(placeID+' .img-thumbnail').hide();
            $(placeID+' .loading').show();
			$image_crop.croppie('result', {
				type: 'canvas',
				size:{
					width:500,
					hidden:500
				},
				format:'png',
				quality:0.7
			}).then(function(response){
                    //var rand=Math.floor(Math.random()*1000000);
                    $.ajax({
                    	url:"{{url('/')}}"+"/upload.php?title="+"{{$hash}}",
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
        //gallery
        $image_crop1 = $('#image_demo1').croppie({
			enableExif: true,
			viewport: {
				width:300,
				height:300,
            type:'square' //square
        },
        boundary:{
        	width:310,
        	height:310
        },

    });

		$('.crop_image1').click(function(event){
            $(placeID+' .img-thumbnail').hide();
            $(placeID+' .loading').show();

			$image_crop1.croppie('result', {
				type: 'canvas',
				size:{
					width:800,
					hidden:800
				},
				format:'jpeg',
				quality:0.7
			}).then(function(response){
                    //var rand=Math.floor(Math.random()*1000000);
                    $.ajax({
                    	url:"{{url('/')}}"+"/uploadgallery.php?title="+"{{$hash}}&fileid="+fileID,
                    	type: "POST",
                    	data:{"image": response},
                    	success:function(data)
                    	{
                    		$('#uploadimageModal1').modal('hide');
                            $(placeID).html(data);
                            //$(placeID+' .loading').hide();
                            fileID++;

                    	}
                    });
                })
		});

		function canvasArea1(areaID,placeHolder,ID){
			placeID=placeHolder;
            fileID=ID;
			var reader = new FileReader();
			reader.onload = function (event) {
				$image_crop1.croppie('bind', {
					url: event.target.result
				}).then(function(){
					console.log('jQuery bind complete');
				});
			}

			reader.readAsDataURL(areaID.files[0]);
			    $('#uploadimageModal1').modal('show');

            }

            $('#upload_image1').on('change', function(){
			    canvasArea1(this,'#placeholder1',1);
            });
            $('#upload_image2').on('change', function(){
			    canvasArea1(this,'#placeholder2',2);
            });
            $('#upload_image3').on('change', function(){
			    canvasArea1(this,'#placeholder3',3);
            });
            $('#upload_image4').on('change', function(){
			    canvasArea1(this,'#placeholder4',4);
            });
            $('#upload_image5').on('change', function(){
			    canvasArea1(this,'#placeholder5',5);
            });
            $('#upload_image6').on('change', function(){
			    canvasArea1(this,'#placeholder6',6);
            });

		$("#entags").select2({
			tags: true,
			theme: "bootstrap4",
			placeholder:"Feed tags:(oil,foods,..etc)",
			tokenSeparators: [',']
		});
		$("#artags").select2({
			tags: true,
			theme: "bootstrap4",
			placeholder:"Feed tags:(oil,foods,..etc)",
			tokenSeparators: [',']
		});
		$("#trtags").select2({
			tags: true,
			theme: "bootstrap4",
			placeholder:"Feed tags:(oil,foods,..etc)",
			tokenSeparators: [',']
		});
		$("#city").select2({
			theme: "bootstrap4",

		});
		$("#category").select2({
			theme: "bootstrap4",

		});

	});
</script>
@stop
