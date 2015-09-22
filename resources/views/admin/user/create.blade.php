@extends('admin.layout')
@section('hearderLink')
	<link rel="stylesheet" href="/assets/css/adminUserPage.css" />
@stop
@section('content')
	<div class="page-header">
		<h1>
			@if($userID)
				Add new user
			@else
				Edit user
			@endif
		</h1>
	</div>
	<div class="col-xs-12">
		<form class="form-horizontal" enctype="multipart/form-data" role="form" id="form" method="POST" action="/admin/user/store">
			<!-- avatar section start -->
			<div class="col-xs-2">
				<span class="profile-picture">
					@if($qUsers['uAvatar'] == "")
						<img id="avatar" class="editable img-responsive avatar"
							src="/ACEadmin/assets/avatars/profile-pic.jpg"/>
					@else
						<img id="avatar" class="editable img-responsive avatar"
							src="/assets/images/avatar/{{ $qUsers['uAvatar'] }}"/>
					@endif
				</span>
				<div class="space-4"></div>
				<div class="inline position-relative full-width">
					<div class="fileUpload btn btn-primary width-100">
						<span>Change avatar</span>
						<input type="file" id="image" name="image" class="upload" />
					</div>
				</div>
			</div>
			<!-- avatar section end -->
			<div class="col-xs-10">
				<!-- form section start -->
				<input type="hidden" name="_token" value="{{csrf_token()}}" />
				<input type="hidden" name="userID" value="{{$userID}}" />
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 		Username :
					</label>
					<div class="col-sm-9">
						<input type="text" name="username" id="form-field-1" placeholder="Username" value="{{ $qUsers['uUsername'] }}" class="col-xs-10 col-sm-5" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 		Email : 
					</label>
					<div class="col-sm-9">
						<input type="email" name="email" id="form-field-1" placeholder="Email" class="col-xs-10 col-sm-5" value="{{ $qUsers['uEmail'] }}"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 		Address : 
					</label>
					<div class="col-sm-9">
						<input type="text" name="address" id="form-field-1" placeholder="Address" value="{{ $qUsers['uAddress'] }}" class="col-xs-10 col-sm-5" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 		Password : 
					</label>
					<div class="col-sm-9">
						<input type="password" name="password" id="form-field-1" placeholder="Password" class="col-xs-10 col-sm-5" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 		Retype pass : 
					</label>
					<div class="col-sm-9">
						<input type="password" name="rePassword" id="form-field-1" placeholder="Retype Password" class="col-xs-10 col-sm-5" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 		Birthday : 
					</label>
					<div class="col-sm-9">
						<input type="text" name="birthday" id="form-field-1" placeholder="Birthday" value="{{ $qUsers['uBirthday'] }}" class="col-xs-10 col-sm-5" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 		Phone : 
					</label>
					<div class="col-sm-9">
						<input type="text" name="phone" id="form-field-1" placeholder="Phone number" value="{{ $qUsers['uPhone'] }}" class="col-xs-10 col-sm-5" />
					</div>
				</div>
				<!-- form section end -->	
			</div>
			<div class="col-xs-12">
				<div class="clearfix form-actions">
					<div class="col-md-offset-3 col-md-9">
						<button class="btn btn-info" type="submit">
							<i class="ace-icon fa fa-check bigger-110"></i>
							Submit
						</button>

						&nbsp; &nbsp; &nbsp;
						<button class="btn" type="reset">
							<i class="ace-icon fa fa-undo bigger-110"></i>
							Reset
						</button>
					</div>
				</div>
			</div>
		</form>
	</div>

@stop

@section('footer')
	<script src="/ACEAdmin/assets/js/ace-extra.min.js"></script>  
	<script src="/ACEAdmin/assets/js/jquery.dataTables.min.js"></script>
	<script src="/ACEAdmin/assets/js/jquery.dataTables.bootstrap.js"></script>
	<script src="/ACEAdmin/assets/js/chosen.jquery.min.js"></script>
	<script src="/ckeditor/ckeditor.js"></script>
	<script type="text/javascript">
	    $(document).ready(function(){
	        $('#po').dataTable({
	            'iDisplayLength': 25
	        });
	        $.ajaxSetup({
		        headers: {
		            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		        }
			});
	    });
	    function readURL(input,imgtag) {
	        if (input.files && input.files[0]) {
	            var reader = new FileReader();
	            reader.onload = function (e) {
	                $('#'+imgtag).attr('src', e.target.result);
	            };
	            reader.readAsDataURL(input.files[0]);
	        }
	    };
	    $('#image').change(function() {
	        var filename = $(this).val();
	        var lastIndex = filename.lastIndexOf("\\");
	        if (lastIndex >= 0) {
	            filename = filename.substring(lastIndex + 1);
	        }
	        readURL(this,"avatar");
	    });
	</script>

@stop