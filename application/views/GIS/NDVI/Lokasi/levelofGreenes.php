<?php echo $header; ?>
<?php echo $navbar; ?>
<script>
	var site_url = '<?=site_url()?>';
	var base_url = '<?=base_url()?>';
	var page = '<?=$page?>';
	var loc = '<?=$loc?>';
	var subpage = '<?=$subpage?>';
	var currLoc = '<?=$currLoc?>';
	var pageDate = '<?=$pageDate?>';
</script>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row ">
				<div class="col-sm-6">
					<h1 class="m-0 float-sm-left">Level Of Greennes</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
						<li class="breadcrumb-item active">Level Of Greennes</li>
					</ol>
				</div><!-- /.col -->
			</div><!-- /.row -->

			<div class="row">
				<div class="col-7">
					<div class="form-group">
						<select class="custom-select form-control-border border-width-2select2-danger"
							data-dropdown-css-class="select2-danger" id="myCurrPictselector">
						</select>
					</div>
				</div>
				<div class="col-5">
					<a type="button" class="btn btn-block bg-gradient-primary" id="pdfDownloadButton">Download
						PDF</a>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<!-- Default box -->
					<div class="card full-wdith">
						<div class="card-header">
							<span id="Title" class="submenu-main-title-gis">NDVI</span>
						
							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
									<i class="fas fa-minus"></i>
								</button>
							</div>
						</div>
						<div class="card-body">
							<div class="pict-overlay-type1" id="pictOverlayGis">
								<img id="mainContentImage" src="" style="width:100%; height:100%;">
							</div>
						</div>
						<!-- /.card-body -->
						<div class="card-footer">
						<h5 id="pictDate" ></h5>
						</div>
						<!-- /.card-footer-->
					</div>
					<!-- /.card -->
				</div>
			</div>

			<div class="row">
				<div class="col-md-8">
					<div class="card">
						<div class="card-header py-0">
							<span class="submenu-title-gis">Trend History</span>
						</div>
						<div class="card-body">
							<div id="line_ven"></div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card full-wdith">
						<div class="card-header py-0">
							<span class="submenu-title-gis">Legend</span>
						</div>
						<div class="card-body mt-2">
							<table style="width:100%; height:200px; border: 1px solid black;">
								<tr style="width:100%; border: 1px solid black;">
									<td style="background-color: #0ec208; padding:3px;"></td>
									<td style=" border: 1px solid black; text-align:center;">1</td>
									<td style=" border: 1px solid black; text-align:center;" id="satu"></td>
									<td rowspan="2" style="background-color: #0ec208; padding:3px;"></td>
									<td rowspan="2" style="border: 1px solid black;  text-align:center;" id="satu1">
									</td>
								</tr>
								<tr>
									<td style="background-color: #79fa00; padding:3px;"></td>
									<td style=" border: 1px solid black; text-align:center;">2</td>
									<td style=" border: 1px solid black; text-align:center;" id="dua"></td>

								</tr>
								<tr style="width:100%; border: 1px solid black;">
									<td style="background-color: #fae100; padding:3px;"></td>
									<td style="border: 1px solid black; text-align:center;">3</td>
									<td style=" border: 1px solid black; text-align:center;" id="tiga"></td>
									<td rowspan="2" style="background-color: #fabb00; padding:3px;"></td>
									<td rowspan="2" style="border: 1px solid black;  text-align:center;" id="dua1"></td>
								</tr>
								<tr style="width:100%; border: 1px solid black;">
									<td style="background-color: #fabb00; padding:3px;"></td>
									<td style="border: 1px solid black; text-align:center;">4</td>
									<td style="border: 1px solid black; text-align:center" id="empat"></td>
								</tr>
								<tr style="width:100%; border: 1px solid black;">
									<td style="background-color: #fa6400; padding:8px;"></td>
									<td style="border: 1px solid black; text-align:center;">5</td>
									<td style=" border: 1px solid black; text-align:center;" id="lima"></td>
									<td rowspan="2" style="background-color: #fa1100; padding:8px;"></td>
									<td rowspan="2" style="border: 1px solid black;  text-align:center;" id="tiga1">
									</td>
								</tr>
								<tr style="width:100%; border: 1px solid black;">
									<td style="background-color: #fa1100; padding:3px;"></td>
									<td style="border: 1px solid black;  text-align:center;">6</td>
									<td style=" border: 1px solid black;  text-align:center;" id="enam"></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>

			<div class="row ">
				<div class="col-lg-12">
					<div class="card full-wdith">
						<div class="card-header py-0">
							<span class="submenu-title-gis">Executive Summary</span>
						</div>
						<div class="card-body pt-1 pb-3 px-3">
							<div class="desc-container">
								<span id="executiveDescription"
									class="breakable-line"><?php echo isset($picts[0]->description) && preg_replace('/\s+/', '', $picts[0]->description) !='' ? $picts[0]->description : 'Currently no Summary at this location'; ?></span>
							</div>
						</div>
					</div>
				</div>
			</div>


		</div><!-- /.container-fluid -->
	</div>
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
	<strong class="float-left mb-2">Copyright &copy; 2021 <a href="#">Gis Dashboard</a>.</strong>
	<span class="float-left mb-2">All rights reserved.</span>
	<div class="float-right d-none d-sm-inline-block mb-2">
		<b>Version</b> 2.0.0
	</div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>

<div class="modal fade" id="pictModal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
			<div class="title-pop" id="pictPopTitle">NDVI</div>
				<div class="title-pop ml-3" id="pictPopDate"><?php echo isset($picts[0]->date) ? $picts[0]->date : '-'; ?></div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<img id="popPict" src="<?php echo base_url()?>/assets/upload/gis_pict/x3789default.jpg"
					style="height:100%; width:100%">
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
</div>

<!-- jQuery -->
<script src="<?php echo base_url('/assets/plugins/jquery/jquery.min.js');?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('/assets/plugins/jquery-ui/jquery-ui.min.js');?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('/assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<!-- AdminLTE App -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<script src="<?php echo base_url('/assets/dist/js/adminlte.js');?>"></script>
<script src="<?php echo base_url('/assets/js/plugins/compressor.min.js');?>"></script>
<script src="<?php echo base_url('/assets/js/chart_gis/log_control.js');?>"></script>
<script src="<?php echo base_url('/assets/js/templateUI_GIS.js');?>"></script>
<script src="<?php echo base_url('/assets/plugins/select2/js/select2.full.min.js');?>"></script>
</body>
</html>