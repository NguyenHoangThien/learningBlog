@extends('admin.layout')

@section('content')
</div>

	<div class="col-xs-12">
		<h3 class="header smaller lighter blue">Add new Navigator</h3>
		<form class="form-horizontal" role="form" id="navigateForm">
			<input type="hidden" id="navID" value="{{$navigator->navID}}" >
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right" for="navName"> 
					Name
				</label>
				<div class="col-sm-7">
					<input type="text" id="navName" name="navName" placeholder="Navigator Name" value="{{$navigator->navName}}" class="col-xs-10 col-sm-7">
				</div>
				<div class="col-sm-3"></div>
			</div>

			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right" for="navUrl"> 
					Url 
				</label>
				<div class="col-sm-7">
					<input type="text" id="navUrl" name="navUrl" placeholder="Navigator Url" value="{{$navigator->navUrl}}" class="col-xs-10 col-sm-7">
				</div>
				<div class="col-sm-3"></div>
			</div>
			
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right" for="navSortCode"> 
					Sort Code 
				</label>
				<div class="col-sm-7">
					<input type="text" id="navSortCode" name="navSortCode" placeholder="Sort code" value="{{$navigator->navSortCode}}" class="col-xs-2 col-sm-2">
				</div>
				<div class="col-sm-3"></div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label no-padding-right"> 
					Active 
				</label>
				<div class="col-sm-7">
					<input id="active" name="active"
					{{ $navigator->navActive ? "checked" : "" }}
					type="checkbox" class="ace ace-switch ace-switch-5">
				<span class="lbl middle"></span>
				</div>
				<div class="col-sm-3"></div>
			</div>
			@if(!$navigator->navID)
				<div class="form-group">
					<label class="col-sm-2 control-label no-padding-right"> 
						Add More 
					</label>
					<div class="col-sm-7">
						<input name="addmore" id="addmore" checked type="checkbox" class="ace ace-switch ace-switch-5 ">
					<span class="lbl middle"></span>
					</div>
					<div class="col-sm-3"></div>
				</div>
			@endif
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
		</form>
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
		$(document).ready(function(){
			$("#active, #addmore").on("click", function(){
				if($(this).attr('checked'))
				{
					$(this).removeAttr("checked");	
				}
				else
				{
					$(this).attr("checked","checked");
				}
			});
			$("#navigateForm").on("submit", function(e){
				if(!$("#navName").val())
				{
					alert('please input this field');
					$("#navName").focus();
				}
				else
				{
					var active = $("#active").attr("checked") ? 1 : 0;
					$.ajax({
						method: "POST",
						url: "/admin/navigator/store",
						data: {
							navID : $("#navID").val(),
							name : $("#navName").val(),
							url : $("#navUrl").val(),
							sortCode : $("#navSortCode").val(),
							active : active,
							async: false,

						}, success: function(data){
							console.log(data);
							if($("#addmore").attr("checked") && !navID)
							{
								var form = document.getElementById('navigateForm');
								form.reset();
							}
							else
							{
								location.href = "/admin/navigator/";
							}
						}
					});
				}
				e.preventDefault();
				return false;
			})
		})
	</script>
@stop