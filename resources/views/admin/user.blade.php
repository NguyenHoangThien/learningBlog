@extends('admin.layout')


@section('content')
	<div class="col-xs-12">
		<h3 class="header smaller lighter blue">News Types management</h3>
		<div class="table-header">
			News Types table
			<button class="btn btn-success btn-sm pull-right" style="padding-bottom: 8px;"  onclick="showForm()">
				<i class="ace-icon fa fa-plus"></i>
					Add new
			</button>
		</div>
	    <div class="ibox-content">
	        <div class="project-list">
	            <table id="po" class="table table-hover datatable table-bordered">
	            	<thead>
						<tr>
		                    <th style="width:25%;text-align:center;">Name</th>
	                        <th style="text-align:center;">Description</th>
		                    <th style="width:6%"></th>
		                </tr>
		            </thead>
	                <tbody>
	                	<cfloop query="rc.qarticleTypes">
	                        <tr>
	                            <td id="Name#rc.qarticleTypes.Id#" >#rc.qarticleTypes.atName#</td>
	                            <td id="Des#rc.qarticleTypes.Id#">#rc.qarticleTypes.atDescription#</td>
	                            <td style="text-align:center;">
	                                <span class="ace-icon fa fa-pencil green" title="edit"
	                                onclick="showedit(#rc.qarticleTypes.Id#);"
	                                ></span>
	                            </td>
	                        </tr>   
	                    </cfloop>
	                </tbody>
	                <input type="hidden" id="txtIsAddMore" value="#URL.isAddMore#">
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
	    
	</script>

@stop