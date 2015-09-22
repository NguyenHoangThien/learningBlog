@extends('admin.layout')

@section('content')
	<div class="col-xs-12">
		<h3 class="header smaller lighter blue">Roles management</h3>
		<div class="table-header">
			Roles table
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
		                    <th style="width:25%;text-align:center;">Name</th>
	                        <th style="text-align:center;">Description</th>
		                    <th style="width:12%"></th>
		                </tr>
		            </thead>
	                <tbody>
	                	@foreach ($qRoles as $role) 
	                        <tr>
	                            <td> {{  $role['rID']}} </td>
	                            <td id="rName{{ $role['rID'] }}"> {{  $role['rName']}} </td>
	                            <td id="rDes{{ $role['rID'] }}"> {{  $role['rDescription']}} </td>
	                            <td style="text-align:center;">
	                                <i class="btn btn-mini btn-success ace-icon fa fa-pencil green" title="edit"
	                                onclick="editRole({{ $role['rID'] }});"
	                                ></i>
	                                <i class="btn btn-mini btn-danger ace-icon fa fa-trash red" title="edit"
	                                onclick="deleteRole({{ $role['rID'] }});"
	                                ></i>
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
						<b id="titleForm"> </b>
					</h4>
				</div>
				<form class="form-horizontal" enctype="multipart/form-data" role="form" id="form" method="POST" action="/admin/roleStore">
					<div class="modal-body">
						<div class="row">
							<input type="hidden" name="rID" id="rID" value="0">
							<input type="hidden" name="_token" value="<?=csrf_token()?>" />
						    <div class="form-group">
							    <label class="control-label col-md-2">Name:</label>
							    <div class="col-md-9">
							    	<input type="text" class="form-control" name="rName" id="rName">
						    	</div>
						    	<div class="col-md-1"></div>
						    </div>
						    
						    <div class="form-group">
							    <label class="control-label col-md-2">Description:</label>
							    <div class="col-md-9">
							     	<textarea class="editor" id="rDes" name="rDes" style="width: 100%;height: 70px;"></textarea>
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
        $.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }
		});

    });

	
 	function editRole(rID){
 		$("#rID").val(rID);
 		$("#rName").val($("#rName" + rID).text());
 		$("#rDes").val($("#rDes" + rID).text());
		$("#titleForm").text("Edit Role");
		$("#category-form").modal('show');
 	}
	function addForm() {
		document.getElementById("form").reset();
		$("#rID").val(0);
		$("#aIfile").attr("src", "");
		$("#category-form").modal('show');
		$("#titleForm").text("Add new role");

	}
	
    function deleteRole(id) {
    	if(confirm("Are you sure you want to delete it ?")){
    		$.ajax({
               	type: "POST",
               	url: "/admin/deleteRole",
               	async: false,
               	data: {
               		rID : id,
            	},success: function( data ) {
	            	location.reload();
	            }
	        });
    	}
    }
	</script>

@stop