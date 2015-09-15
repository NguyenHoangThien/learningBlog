@extends('admin.layout')

@section('content')
	<div class="col-xs-12">
		<h3 class="header smaller lighter blue">Categories management</h3>
		<div class="table-header">
			Categories table
			<button class="btn btn-success btn-sm pull-right" style="padding-bottom: 8px;" onclick="addForm()">
				<i class="ace-icon fa fa-plus"></i>
					Add new
			</button>
		</div>
	    <div class="ibox-content">
	        <div class="project-list">
	            <table id="po" class="table table-hover datatable table-bordered">
	            	<thead>
						<tr>
							<th style="width:5%;text-align:center;">ID</th>
		                    <th style="width:8%;text-align:center;">Icon</th>
		                    <th style="width:25%;text-align:center;">Name</th>
	                        <th style="text-align:center;">Description</th>
	                        <th style="text-align:center;">Caregory Parent</th>
		                    <th style="width:12%"></th>
		                </tr>
		            </thead>
	                <tbody>
	                	@foreach ($qGetCategories as $category) 
	                        <tr>
	                            <td style="text-align:center;"> {{ $category['cID'] }} </td>
	                            @if(is_null($category['cIcon']))
	                            	<td><img src="/assets/img/default.jpg" width="80px" /></td>
	                            @else
	                            	<td><img src="/assets/images/{{$category['cIcon']}}" width="80px"/></td>
	                            @endif
	                            <td> {{ $category['cName'] }} </td>
	                            <td> {{ $category['cDescription'] }} </td>
	                            <td> {{ $category['cParentID'] }} </td>
	                            <td style="text-align:center;">
	                            	@if($category['cID'] != 1)
	                                <i class="btn btn-mini btn-success ace-icon fa fa-pencil green" title="edit"></i>
	                                <i class="btn btn-mini btn-danger ace-icon fa fa-trash red" title="edit"></i>
	                                @endif
	                            </td>
	                        </tr>   
	                    @endforeach
	                </tbody>
	                <input type="hidden" id="txtIsAddMore" value="#URL.isAddMore#">
	            </table>
	        </div>
	    </div>
	</div>

	{{-- form add here start --}}
	<div class="modal fade" id="category-form" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog" style="width:60%">
			<div class="modal-content">
				<div class="modal-header">
					 <button type="button" class="close" data-dismiss="modal" aria-hidden="true"
					 	style="font-size: 19px;"
					 >x</button>
					<h4 class="modal-title" id="myModalLabel">
						<b> Add new Category </b>
					</h4>
				</div>
				<form class="form-horizontal" enctype="multipart/form-data" role="form" id="form" method="POST" action="/admin/categoryStore">
					<div class="modal-body">
						<div class="row">
							<input type="hidden" name="cID" id="cID" value="0">
							<input type="hidden" name="_token" value="<?=csrf_token()?>" />
						    <div class="form-group">
							    <label class="control-label col-md-2">Name:</label>
							    <div class="col-md-9">
							    	<input type="text" class="form-control" name="cName" id="cName">
						    	</div>
						    	<div class="col-md-1"></div>
						    </div>
						    
						    <div class="form-group">
							    <label class="control-label col-md-2">Description:</label>
							    <div class="col-md-9">
							     	<textarea class="editor" id="cDes" name="cDes" style="width: 100%;height: 70px;"></textarea>
							    </div>
							    <div class="col-md-1"></div>
						    </div>

						    <div class="form-group">
								<label class="control-label col-md-2">Parent:</label>
									<div class="col-md-9">
										<select name="categoryParent" id="categoryParent">
											@foreach ($qGetCategories as $category)
												<option value="{{ $category['cID'] }}">
													{{ $category['cName'] }}
												</option>
											@endforeach
										</select>
									</div>
								<div class="col-md-1"></div>
						    </div>

						    <div class="form-group">
							    <label class="control-label col-md-2">Icon:</label>
								    <div class="col-md-9">
								    	<input type="file" class="form-control" id="image" name="image">
								    	<img src="" id="aIfile" style="margin-top:5px; max-height: 120px;"/>
								    </div>
							    <div class="col-md-1"></div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						 <button type="submit" class="btn btn-primary">Submit</button> 
					</div>
				</form>
			</div>
		</div>
	</div>
	{{-- form end --}}
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
	        // CKEDITOR.replace('aDes');
	        // CKEDITOR.replace('eDes');
	        // if($('#txtIsAddMore').val()==1){
	        //     $("#add-MatchType").modal('show');
	        //     $("#isAddMore").prop('checked',true);
	        // }

	    });

		// function showedit(id){
	 //        $("#edit-MatchType").modal('show');
	 //        $("#eName").val($("#Name"+id).text());
	 //        $("#idEdit").val(id); 
	 //        CKEDITOR.instances.eDes.setData($("#Des"+id).text(), function()
	 //        {
	 //            this.checkDirty();  // true
	 //        });
	 //    }
	 //    function showForm(){
	 //    	$("#add-MatchType").modal('show');
	 //    }
	 
		function addForm() {
			$("#category-form").modal('show');
		}
		function readURL(input,imgtag) {
	        if (input.files && input.files[0]) {
	            var reader = new FileReader();
	            reader.onload = function (e) {
	                $('#'+imgtag).attr('src', e.target.result);
	            };
	            reader.readAsDataURL(input.files[0]);
	        }
	    };
	        //get filename of fileupload 3
	    $('#image').change(function() {
	        var filename = $(this).val();
	        var lastIndex = filename.lastIndexOf("\\");
	        if (lastIndex >= 0) {
	            filename = filename.substring(lastIndex + 1);
	        }
	        readURL(this,"aIfile");
	    });
	</script>

@stop