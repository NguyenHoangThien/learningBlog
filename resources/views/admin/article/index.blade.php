@extends('admin.layout')
@section('hearderLink')
	<link rel="stylesheet" href="/assets/css/adminUserPage.css" />

	<link rel="stylesheet" href="/ACEAdmin/assets/css/chosen.css" /> <!-- for multi choose tag --> 
	<!-- ace styles -->
	<link rel="stylesheet" href="/ACEAdmin/assets/css/ace.min.css" />
@stop
@section('content')
</div>
	<div class="col-xs-12">
		<h3 class="header smaller lighter blue">Articles management</h3>
		<div class="table-header">
			Articles table
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
		                    <th style="text-align:center;">Title</th>
		                    <th style="width:15%"></th>
		                </tr>
		            </thead>
	                <tbody>
	                	@foreach ($qArticles as $article) 
	                        <tr>
	                            <td style="text-align:center;"> {{$article->aID}} </td>
	                            <td>{{$article->aTitle}}</td>

	                            <td style="text-align:center;">
	                            	<a href="/show-post/{{$article->aID}}" target="_blank">
	                            		<i class="btn btn-mini btn-primary ace-icon fa fa-eye blue" title="edit"></i>
	                            	</a>
	                            	<a href="/admin/article/create?aID={{$article->aID}}">
	                                	<i class="btn btn-mini btn-success ace-icon fa fa-pencil green" title="edit"onclick="viewArticle();"></i>
	                                </a>
	                                <a onclick="deleteArticle({{$article->aID}})">
	                                	<i class="btn btn-mini btn-danger ace-icon fa fa-trash " title="edit"onclick="viewArticle();"></i>
	                                </a>
	                            </td>
	                        </tr>   
	                    @endforeach
	                </tbody>
	                <input type="hidden" id="txtIsAddMore" value="#URL.isAddMore#">
	            </table>
	        </div>
	    </div>
	</div>
@stop

@section('footer') 

	<script type="text/javascript">
	
		function addNew(){
			location.href = "/admin/article/create";
		}
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		function deleteArticle(articleID) {
			if(confirm("Are you sure you want to delete this article ?"))
			{
				$.ajax({
					url: "/admin/article/destroy",
					method: "POST",
					data : {
						aID : articleID
					},
					success : function(data){
						location.reload();
					},
					error : function(e) {
						alert( JSON.stringify(e));
					}
				});
			}
		}
	</script>
@stop