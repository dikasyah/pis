<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Digital Plantation - PIS</title>
	<link rel = "icon"  href="<?=base_url()?>/assets/images/logo-ggf.png" type = "image/png">
	<script>
		var site_url ='<?=site_url()?>';
		var base_url ='<?=base_url()?>';
        var page ='<?=$page?>';
        var loc ='<?=$loc?>';
        var subpage ='<?=$subpage?>';
        var currLoc ='<?=$currLoc?>';
	</script>
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}
	

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
		
	}

	
	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	
	#container {
		margin: 5px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}

	</style>
	<?php
		echo $style;
		echo $script;
	?>

</head>
<body>
	<div id="wrapper">
		<?php echo $navbar; ?>
		<div id="content" class="gis-content gis-content-fullsize">
			<?php echo $header; ?>
			<!--Main content-->
			<div class="row">
				<div class="col-lg-8 gis-card-padding-leftside">
					<select class="form-control" id="myCurrPictselector" >
						<?php foreach ($allPicts as $pict): ?>
			  	          	<option value="<?php echo $pict->date.'&'.$pict->location.'&'.$pict->jenis.'&'.$pict->kategori.'&'.$pict->photo_id ?>"><?php echo $pict->date?></option>
               			<?php endforeach; ?>
                    </select>
				</div>
				<div class="col-lg-4 gis-card-padding-rightside">
					
					<a id="pdfDownloadButton" href="<?php echo isset($picts[0]->pdf) ? base_url()."/assets/upload/gis_pdf/".$picts[0]->pdf : "javascript:openPictPop('unModal')"; ?>" <?php echo isset($picts[0]->pdf) ? "download" : "";?> class="btn btn-primary full-width">Download pdf</a>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8">
					<div class="row gis-card-padding-leftside">
						<div class="card full-wdith">
							<div class="card-header  py-0 pict-header">
								<span class="submenu-main-title-gis">Lagoon Water Level</span>
								<span id="pictDate" class="submenu-main-title-gis"><?php echo isset($picts[0]->date) ? $picts[0]->date : '-'; ?></span>
								<span class="header-blank-space">Lagoon Water Level</span>
							</div>
							<div class="card-body p-0">
								<div class="pict-overlay-type2" id="pictOverlayGis">
									
								</div>
								<img id="mainContentImage" src="<?php echo base_url()?>/assets/upload/gis_pict/<?php echo isset($picts[0]->image) ? $picts[0]->image : 'x3789default.jpg'; ?>" style="width:100%; height:655px;">
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="row  gis-card-padding-rightside">
						<div class="card full-wdith">
							<div class="card-header py-0">
								<span class="submenu-title-gis">Distribution</span>
							</div>
							<div class="card-body">
								<canvas id="distribution" style="height:200px"></canvas>
							</div>
						</div>
					</div>
					<div class="row  gis-card-padding-rightside">
						<div class="card full-wdith">
							<div class="card-header py-0">
								<span class="submenu-title-gis">Legenda</span>
							</div>
							<div class="card-body  p-2" >
										<table class=" mb-0" style="border: none;height:367px;width:100%">
											<!--legend body-->
                                            <tbody id="legendOutput">
												<tr>
													<td style="padding:0;padding-top:0; padding-bottom:0;" width="40px"><div style="width:100%;height:100%;background-color: #1C8D00;"></div></td>
													<td style="font-size:12px; padding:3px; padding-left:20px; font-weight:500; text-align:left">Over</td>
													<td style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;" id="val1">XXX</td>
													<td style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;">Ha</td>
												</tr>
												<tr>
													<td style="padding:0;padding-top:0; padding-bottom:0;"><div style="width:100%;height:100%;background-color: #01D56B;"></div></td>
													<td style="font-size:12px; padding:3px; padding-left:20px; font-weight:500; text-align:left">Mid Over</td>
													<td style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;" id="val2">XXX</td>
													<td style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;">Ha</td>
												</tr>
												<tr>
													<td style="padding:0;padding-top:0; padding-bottom:0;"><div style="width:100%;height:100%;background-color: #FFFF01;"></div></td>
													<td style="font-size:12px; padding:3px; padding-left:20px; font-weight:500; text-align:left">Standar</td>
													<td style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;" id="val3">XXX</td>
													<td style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;">Ha</td>
												</tr>
												<tr>
													<td style="padding:0;padding-top:0; padding-bottom:0;"><div style="width:100%;height:100%;background-color: #FFBC01;"></div></td>
													<td style="font-size:12px; padding:3px; padding-left:20px; font-weight:500; text-align:left">Mid Under</td>
													<td style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;" id="val4">XXX</td>
													<td style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;">Ha</td>
												</tr>
												<tr>
													<td style="padding:0;padding-top:0; padding-bottom:0;"><div style="width:100%;height:100%;background-color: #FF0000;"></div></td>
													<td style="font-size:12px; padding:3px; padding-left:20px; font-weight:500; text-align:left">Under</td>
													<td style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;" id="val5">XXX</td>
													<td style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;">Ha</td>
												</tr>
											</tbody>
											<!--legend body end-->
											<!-- legend footer-->
											<tfoot>
												<tr>
													<td style=" font-size:14px; font-weight:bold; text-align:center; padding:5px">Total</td>
													<td ></td>
													<td style=" font-size:12px; font-weight:bold; text-align:center; padding:5px" id="valTot">XXX</td>
													<td style=" font-size:12px; font-weight:bold; text-align:center; padding:5px">Ha</td>
												</tr>
											</tfoot>
											<!-- legend footer end-->
										</table>	
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row my-2 px-2 ">
				<div class="col-lg-12">
					<div class="card full-wdith">
						<div class="card-header py-0">
							<span class="submenu-title-gis">Executive Summary</span>
						</div>
						<div class="card-body pt-1 pb-3 px-3">
							<div class="desc-container">
							<span  id="executiveDescription" class="breakable-line"><?php echo isset($picts[0]->description) && preg_replace('/\s+/', '', $picts[0]->description) !='' ? $picts[0]->description : 'Currently no Summary at this location'; ?></span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--Main content End-->
		</div>
	</div>
	<!-- pop up  -->
	<div class="pop" id="pictModal">
        <div class="modal-header">
			<p class="pop-header-filler">&times;</p>
			<div class="pop-header-text-container">
				<div class="title-pop" id="pictPopTitle">Lagoon Water Level</div>
				<div class="title-pop" id="pictPopDate"><?php echo isset($picts[0]->date) ? $picts[0]->date : '-'; ?></div>
			</div>
			<button  class="close-button" onclick="popClose('pictModal')">&times;</button>
			
        </div>
        <div class="modal-body">
			<img id="popPict" src="<?php echo base_url()?>/assets/upload/gis_pict/<?php echo isset($picts[0]->image) ? $picts[0]->image : 'x3789default.jpg'; ?>" style="height:100%; width:100%" >
        </div>
	</div>
	<div class="pop-alert-upload" id="unModal">
        <div class="modal-header">
            <div class="title">Alert</div>
            <button  class="close-button" onclick="popClose('unModal')">&times;</button>
        </div>
        <div class="modal-body">
            <p>Currently pdf file doesn't exist on this location</p>
        </div>
	</div>
	<!--overlay for pop-->
	<div class="" id="overlay"></div>
	<!--overlay for pop end-->
	<!-- pop up end -->
	<?php echo $modal; ?>
<script>
	document.querySelector("#fullTitle").innerHTML ="WEB - Geographic Information System";
    document.querySelector("#otherTitle").innerHTML = "WEB - GIS";
    $("#mainSen").parent().addClass('show-sub');
    $("#mainSen").removeClass('inactive');
    $("#mainSen").addClass('semi-inactive');
    $("#Sen1").removeClass('inactive');
	$("#Sen1").addClass('active');
	$('.select2').select2();
	if (currLoc != "") {
		$("#lokasiGis").val(currLoc);
		$("#lokasiGis").select2().trigger("change");
	}
    $('>span>span>span', '.select2').css({"color": "white", "font-size": "18px", "font-weight":"500"})
</script>
<script>
Chart.defaults.global.defaultFontStyle = 'Bold';
const distribution = document.getElementById("distribution").getContext('2d');
var mydata2 = {
	labels: ['Over','Mid Over','Standar','Mid Under','Under'],
		datasets: [{
		label:'points',
		data: [50, 100, 850, 0, 0],
		datalabels: {
			color: "#000",
			formatter: function (value,ctx) {
				let sum = 0;
                let dataArr = ctx.chart.data.datasets[0].data;
                dataArr.map(data => {
                    sum += data;
                });
                let percentage = (value*100 / sum).toFixed(2)+"%";
                return percentage;
			}			
		},	
		backgroundColor: [
            '#1C8D00',
			'#01D56B',
			'#FFFF01',
			'#FFBC01',
			'#FF0000'
		]
	}],
}
var total = 0;
var valLegend ='';
for(let i = 0; i<mydata2.datasets[0].data.length;i++){
	 total += mydata2.datasets[0].data[i];
	 valLegend = '#val'+(i+1);
     document.querySelector(valLegend).innerHTML =  mydata2.datasets[0].data[i].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
     console.log('test');
}
document.querySelector('#valTot').innerHTML = total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");;
var myChart2 = new Chart(distribution,{
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
				label: function(tooltipItem, data) {
					var label = mydata2.labels[tooltipItem.index];
					var val = mydata2.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
					return label + ' : ' + (val/total*100).toFixed(4) + '%';
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
<script src="<?php echo base_url('/assets/js/templateUI_GIS.js');?>"></script>
</body>
</html>
