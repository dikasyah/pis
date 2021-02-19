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
		var chartData = '<?=$chartData?>';
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>

<script>Chart.plugins.unregister(ChartDataLabels);</script>
<script>
    Chart.plugins.register({
        afterDraw: function(chart) {
            if (chart.data.datasets[0].data.every(item => item === 0)) {
                let ctx = chart.chart.ctx;
                let width = chart.chart.width;
                let height = chart.chart.height;
                chart.clear();
                ctx.save();
                ctx.textAlign = 'center';
                ctx.textBaseline = 'middle';
                ctx.font = "20px 'Helvetica'";
                ctx.fillText('No data to display', width / 2, height / 2);
                ctx.restore();
            }
        }
    });
</script>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row ">
				<div class="col-sm-6">
					<h1 class="m-0 float-sm-left">Water Logging</h1>
				</div><!-- /.col -->
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
						<li class="breadcrumb-item active">Water Logging</li>
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
				<div class="col-md-8">
					<!-- Default box -->
					<div class="card full-wdith">
						<div class="card-header">
							<span id="Title" class="submenu-main-title-gis">Water Logging</span>

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
							<h5 id="pictDate"></h5>
						</div>
						<!-- /.card-footer-->
					</div>
					<!-- /.card -->
				</div>

				<div class="col-md-4">

					<div class="card full-wdith">
						<div class="card-header py-0">
							<span class="submenu-title-gis">Distribution</span>
						</div>
						<div class="card-body">
							<canvas id="distribution" style="height:200px"></canvas>
						</div>
					</div>

					<div class="card full-wdith">
						<div class="card-header py-0">
							<span class="submenu-title-gis">Legenda</span>
						</div>
						<div class="card-body  p-2">
							<table class=" mb-0" style="border: none;height:250px;width:100%">
								<!--legend body-->
								<tbody id="legendOutput">
									<tr>
										<td style="padding:0;padding-top:0; padding-bottom:0;" width="40px">
											<div style="width:100%;height:100%;background-color: #FF0000;"></div>
										</td>
										<td
											style="font-size:12px; padding:3px; padding-left:20px; font-weight:500; text-align:left">
											Dry</td>
										<td style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;"
											id="val1">XXX</td>
										<td
											style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;">
											Ha</td>
									</tr>
									<tr>
										<td style="padding:0;padding-top:0; padding-bottom:0;">
											<div style="width:100%;height:100%;background-color: #FFFF01;"></div>
										</td>
										<td
											style="font-size:12px; padding:3px; padding-left:20px; font-weight:500; text-align:left">
											Moist</td>
										<td style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;"
											id="val2">XXX</td>
										<td
											style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;">
											Ha</td>
									</tr>
									<tr>
										<td style="padding:0;padding-top:0; padding-bottom:0;">
											<div style="width:100%;height:100%;background-color: #FFBC01;"></div>
										</td>
										<td
											style="font-size:12px; padding:3px; padding-left:20px; font-weight:500; text-align:left">
											Wet</td>
										<td style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;"
											id="val3">XXX</td>
										<td
											style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;">
											Ha</td>
									</tr>
									<tr>
										<td style="padding:0;padding-top:0; padding-bottom:0;">
											<div style="width:100%;height:100%;background-color: #1C8D00;"></div>
										</td>
										<td
											style="font-size:12px; padding:3px; padding-left:20px; font-weight:500; text-align:left">
											Very Wet</td>
										<td style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;"
											id="val4">XXX</td>
										<td
											style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;">
											Ha</td>
									</tr>
									<tr>
										<td style="padding:0;padding-top:0; padding-bottom:0;">
											<div style="width:100%;height:100%;background-color: #0434F6;"></div>
										</td>
										<td
											style="font-size:12px; padding:3px; padding-left:20px; font-weight:500; text-align:left">
											Flood</td>
										<td style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;"
											id="val5">XXX</td>
										<td
											style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;">
											Ha</td>
									</tr>
								</tbody>
								<!--legend body end-->
								<!-- legend footer-->
								<tfoot>
									<tr>
										<td style=" font-size:14px; font-weight:bold; text-align:center; padding:5px">
											Total</td>
										<td></td>
										<td style=" font-size:12px; font-weight:bold; text-align:center; padding:5px"
											id="valTot">XXX</td>
										<td style=" font-size:12px; font-weight:bold; text-align:center; padding:5px">Ha
										</td>
									</tr>
								</tfoot>
								<!-- legend footer end-->
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
				<div class="title-pop" id="pictPopTitle">Water Logging</div>
				<div class="title-pop ml-3" id="pictPopDate"></div>
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
<script>
	Chart.defaults.global.defaultFontStyle = 'Bold';
	const distribution = document.getElementById("distribution").getContext('2d');
	currData = JSON.parse(chartData)
	waterLoggingData = [parseFloat(currData[0].Dry), parseFloat(currData[0].Moist), parseFloat(currData[0].Wet),
		parseFloat(currData[0].Very_Wet), parseFloat(currData[0].Flood)
	];
	var mydata2 = {
		labels: ['Dry', 'Moist', 'Wet', 'Very Wet', 'Flood'],
		datasets: [{
			label: 'points',
			data: waterLoggingData,
			datalabels: {
				color: "#000",
				formatter: function (value, ctx) {
					let sum = 0;
					let dataArr = ctx.chart.data.datasets[0].data;
					dataArr.map(data => {
						sum += data;
					});
					let percentage = (value * 100 / sum).toFixed(2) + "%";
					return percentage;
				}
			},
			backgroundColor: [
				'#FF0000',
				'#FFFF01',
				'#FFBC01',
				'#1C8D00',
				'#0434F6'
			]
		}],
	}
	var total = 0;
	var valLegend = '';
	for (let i = 0; i < mydata2.datasets[0].data.length; i++) {
		total += mydata2.datasets[0].data[i];
		valLegend = '#val' + (i + 1);
		document.querySelector(valLegend).innerHTML = mydata2.datasets[0].data[i].toString().replace(
			/\B(?=(\d{3})+(?!\d))/g, ".");
	}
	document.querySelector('#valTot').innerHTML = total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");;
	var myChart2 = new Chart(distribution, {
		type: 'pie',
		data: mydata2,
		plugins: [ChartDataLabels],
		options: {
			maintainAspectRatio: false,
			responsive: true,
			tooltips: {
				mode: 'nearest',
				intersect: false,
				callbacks: {
					label: function (tooltipItem, data) {
						var label = mydata2.labels[tooltipItem.index];
						var val = mydata2.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
						return label + ' : ' + (val / total * 100).toFixed(4) + '%';
					}
				}
			},
			legend: {
				display: false,
				position: 'left',
				labels: {
					usePointStyle: true,
				}
			}
		}
	});
</script>

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
<script src="<?php echo base_url('/assets/js/chart_gis/wl_control.js');?>"></script>
<script src="<?php echo base_url('/assets/js/templateUI_GIS.js');?>"></script>
<script src="<?php echo base_url('/assets/plugins/select2/js/select2.full.min.js');?>"></script>
</body>

</html>