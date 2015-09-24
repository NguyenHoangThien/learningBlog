@extends('admin.layout')
@section('hearderLink')
	<link rel="stylesheet" href="/assets/css/adminUserPage.css" />
@stop
@section('content')
	<div class="page-header">
		<h1>
			@if($articleID)
				Add new article
			@else
				Edit article
			@endif
		</h1>
	</div>
	<div class="col-xs-12">
		<form class="form-horizontal" enctype="multipart/form-data" role="form" id="form" method="POST" action="/admin/article/store">
			<div class="col-xs-11">
				<!-- form section start -->
				<input type="hidden" name="_token" value="{{csrf_token()}}" />
				<input type="hidden" name="articleID" value="{{$articleID}}" />
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1">
						Title :
					</label>
					<div class="col-sm-9">
						<input type="text" name="title" placeholder="title" value="{{ $qArticles['aTitle'] }}" class="col-xs-12 col-sm-12" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1">
						Category :
					</label>
					<div class="col-sm-9">
						<select class="col-xs-12 col-sm-12" name="category">
							<option> choose category</option>
							<option value="1"> category 1</option>
							<option value="2"> category 2</option>
							<option value="3"> category 3</option>
							<option value="4"> category 4</option>
							<option value="5"> category 5</option>
							<option value="6"> category 6</option>
							<option value="7"> category 7</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1">
						Description :
					</label>
					<div class="col-sm-9">
						<input type="text" name="description" placeholder="Description" value="{{ $qArticles['aDescription'] }}" class="col-xs-12 col-sm-12" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1">
						Meta :
					</label>
					<div class="col-sm-9">
						<input type="text" name="meta" placeholder="meta tag" value="{{ $qArticles['aDescription'] }}" class="col-xs-12 col-sm-12" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 		
						Content :
					</label>
					<div class="col-sm-9">
						<textarea name="content" id="content" placeholder="content" class="col-xs-12 col-sm-12">
							{!! $qArticles['aContent'] !!}
						</textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 		
						Tag :
					</label>
					<div class="col-sm-9">
						<input type="text" name="tag" placeholder="tag" value="" class="col-xs-12 col-sm-12" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right" for="form-field-1"> 		
						Sort code :
					</label>
					<div class="col-sm-9">
						<input type="text" name="sortCode" placeholder="sort code" value="{{ $qArticles['sortCode'] }}" class="col-xs-3 col-sm-3" />
					</div>
				</div>

				<div class="form-group">
		      		<label class="control-label col-md-2">Active:</label>
		        	<span class="col-sm-9">
						<input id="active" name="active" checked="" type="checkbox" class="ace ace-switch ace-switch-5">
						<span class="lbl middle"></span>
					</span>
		      		<div class="col-md-1"></div>
		    	</div>
				<div class="form-group">
				    <label class="control-label col-md-2">Icon:</label>
					    <div class="col-md-9">
					    	<input type="file" class="form-control" id="image" name="image">
					    	<img src="" id="icon" style="margin-top:5px; max-height: 120px;"/>
					    </div>
				    <div class="col-md-1"></div>
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
	    	var config = {
					extraPlugins: 'codesnippet',
					codeSnippet_theme: 'monokai_sublime',
					height: 356
				};
			CKEDITOR.replace('content', config );

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
	        readURL(this,"icon");
	    });
	</script>

@stop