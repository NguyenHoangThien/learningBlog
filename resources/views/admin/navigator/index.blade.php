@extends('admin.layout')

@section('content')
</div>
	<div class="col-xs-12">
		<h3 class="header smaller lighter blue">Navigator management</h3>
		<div class="table-header">
			Navigator table
			<button class="btn btn-success btn-sm pull-right" style="padding-bottom: 8px;" onclick="addNew()">
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
		                    <th style="text-align:center;">Name</th>
		                    <th style="width:5%; text-align:center;">SortCode</th>
		                    <th style="width:3%; text-align:center;">Active</th>
		                    <th style="width:15%"></th>
		                </tr>
		            </thead>
	                <tbody>
	                	@foreach ($qNavigator as $navigator) 
	                        <tr>
	                            <td style="text-align:center;"> {{$navigator->navID}} </td>
	                            <td>{{$navigator->navName}}</td>
	                            <td style="text-align:center;">{{$navigator->navSortCode}}</td>
	                            <td style="text-align:center;">
	                            	<input type='checkbox' class="ace " id="cActive{{ $navigator->navID }}" disabled="disable"
	                            		<?= $navigator->navActive ? "checked" : "" ?> 
	                            	>
	                            	<label class="lbl" for="ace-settings-navbar"> 
	                            </td>
	                            <td style="text-align:center;">
	                            	<a href="/admin/navigator/create?navID={{$navigator->navID}}">
	                                	<i class="btn btn-mini btn-success ace-icon fa fa-pencil green" title="edit"onclick="viewArticle();"></i>
	                                </a>
	                                <a onclick="deleteNavigator({{$navigator->navID}})">
	                                	<i class="btn btn-mini btn-danger ace-icon fa fa-trash " title="edit" onclick="viewArticle();"></i>
	                                </a>
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

	<script type="text/javascript">
	
		function addNew(){
			location.href = "/admin/navigator/create";
		}
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		function deleteNavigator(navID) {
			if(confirm("Are you sure you want to delete this navigator ?"))
			{
				$.ajax({
					url: "/admin/navigator/destroy",
					method: "POST",
					data : {
						navID : navID
					},
					success : function(data){
						location.reload();
					},
					error : function(e) {
						alert(JSON.stringify(e));
					}
				});
			}
		}
	</script>
@stop