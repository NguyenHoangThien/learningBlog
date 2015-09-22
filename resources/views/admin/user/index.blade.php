@extends('admin.layout')

@section('content')
	<div class="col-xs-12">
		<h3 class="header smaller lighter blue">Users management</h3>
		<div class="table-header">
			Users table
			<button class="btn btn-success btn-sm pull-right" style="padding-bottom: 8px;"
			onclick="addUser();" 
			><i class="ace-icon fa fa-plus"></i>
					Add new
			</button>
		</div>
	    <div class="ibox-content">
	        <div class="project-list">
	            <table id="po" class="table table-hover datatable table-bordered">
	            	<thead>
						<tr>
							<th style="width:5%;text-align:center;">ID</th>
							<th style="width:15%;text-align:center;">Avatar</th>
		                    <th style="width:13%;text-align:center;">Username</th>
		                    <th style="width:13%;text-align:center;">Email</th>
	                        <th style="text-align:center;">Phone</th>
	                        <th style="text-align:center;">RegisteredDate</th>
	                        <th style="text-align:center;">Role</th>
	                        <th style="text-align:center;">Active</th>
		                    <th style="width:12%"></th>
		                </tr>
		            </thead>
	                <tbody>
	                	@foreach ($qUsers as $user) 
	                        <tr>
	                        	<td> {{ $user['uID'] }} 		  </td>
	                            <td> {{ $user['uAvatar'] }} 	  </td>
	                            <td> {{ $user['uUsername'] }} 	  </td>
	                            <td> {{ $user['uEmail'] }} 		  </td>
	                            <td> {{ $user['uPhone'] }} 		  </td>
	                            <td> {{ $user['uRegistedDate'] }} </td>
	                            <td> {{ $user['uRole'] }} 		  </td>
	                            <td> {{ $user['uIsActive'] }} 	  </td>
	                            <td style="text-align:center;">
	                                <i class="btn btn-mini btn-success ace-icon fa fa-pencil green" title="edit" onclick="editUser({{ $user['uID'] }})"
	                                ></i>
	                                <i class="btn btn-mini btn-danger ace-icon fa fa-trash red" title="edit"
	                                ></i>
	                            </td>
	                        </tr>   
	                    @endforeach
	                </tbody>
	            </table>
	        </div>
	    </div>
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
	    });
	    function addUser(){
	    	location.href = "/admin/user/create";
	    }
	    function editUser(uID){
	    	location.href = "/admin/user/create?uID="+uID;
	    }
	</script>

@stop