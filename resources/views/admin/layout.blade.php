<!DOCTYPE html>
<html lang="en">
<?= view('/admin/common/header');?>
	<body class="no-skin">
		<?= view('/admin/common/navbarHeader'); ?>
		</div>
		<div class="main-container" id="main-container">
			<div id="sidebar" class="sidebar responsive">
				<?= view('/admin/common/navigator');?>
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>
			<div class="main-content">
				<div class="breadcrumbs" id="breadcrumbs">
					<ul class="breadcrumb">
						<li>
							<i class="ace-icon fa fa-home home-icon"></i>
							<a href="#">Home</a>
						</li>

						<li>
							<a href="#">Other Pages</a>
						</li>
						<li class="active">Blank Page</li>
					</ul>
				</div>
				<div class="page-content">
					<div class="row">
						<div class="col-xs-12">
								@yield('content')
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.page-content -->
			</div><!-- /.main-content -->
			<?= view('/admin/common/footer')?>
			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->
	</body>
	<script src='/ACEAdmin/assets/js/jquery.min.js'></script>
	<script src="/ACEAdmin/assets/js/bootstrap.min.js"></script>
	<script src="/ACEAdmin/assets/js/ace-elements.min.js"></script>
	<script src="/ACEAdmin/assets/js/ace.min.js"></script>
	<script type="text/javascript">
		if('ontouchstart' in document.documentElement) document.write("<script src='/ACEAdmin/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
	</script>
	<script type="text/javascript">
		// try{
		// 	ace.settings.check('main-container' , 'fixed');
		// 	ace.settings.check('sidebar' , 'fixed');
		// 	ace.settings.check('sidebar' , 'collapsed');
		// 	ace.settings.check('breadcrumbs' , 'fixed');
		// }catch(e){
		// 	console.log(e);
		// }
	</script>
	@yield('footer')
</html>
