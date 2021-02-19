<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Digital Plantation - PIS</title>
	<link rel = "icon"  href="/labita/assets/images/logo-ggf.png" type = "image/png"> 
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
					
					<a id="pdfDownloadButton"  href="<?php echo isset($picts[0]->pdf) ? base_url()."/assets/upload/gis_pdf/".$picts[0]->pdf : "javascript:openPictPop('unModal')"; ?>" <?php echo isset($picts[0]->pdf) ? "download" : "";?> class="btn btn-primary full-width">Download pdf</a>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8">
					<div class="row gis-card-padding-leftside" >
						<div class="card full-wdith">
							<div class="card-header  py-0 pict-header">
								<span id="Title" class="submenu-main-title-gis">Plant Disease</span>
								<span id="pictDate" class="submenu-main-title-gis"><?php echo isset($picts[0]->date) ? $picts[0]->date : '-'; ?></span>
								<span id="spaceFiller"class="header-blank-space">Plant Disease</span>
							</div>
							<div class="card-body p-0">
								<div class="pict-overlay-type1" id="pictOverlayGis">
									
								</div>
								<img id="mainContentImage" src="<?php echo base_url()?>/assets/upload/gis_pict/<?php echo isset($picts[0]->image) ? $picts[0]->image : 'x3789default.jpg'; ?>" style="width:100%; height:400px;">
							</div>
						</div>
					</div>
					<div class="row  gis-card-padding-leftside">
						<div class="card full-wdith">
							<div class="card-header py-0">
								<span class="submenu-title-gis">Trend History</span>
							</div>
							<div class="card-body">
								<canvas id="trendHistory" style="height:180px"></canvas>
							</div>
						</div>
					</div>
					<div class="row  gis-card-padding-leftside">
						<div class="card full-wdith">
							<div class="card-header py-0">
								<span class="submenu-title-gis">Trend History</span>
							</div>
							<div class="card-body">
								<canvas id="trendHistory" style="height:180px"></canvas>
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
													<td style="background-color: #1C8D00; padding:3px;" width="40px"></td>
													<td style="font-size:12px; padding:3px; padding-left:20px; font-weight:500; text-align:left">Dense Vegetation</td>
													<td style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;" id="val1">XXX</td>
													<td style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;">Ha</td>
												</tr>
												<tr>
													<td style="background-color: #01D56B; padding:3px;"></td>
													<td style="font-size:12px; padding:3px; padding-left:20px; font-weight:500; text-align:left">Dense Vegetation</td>
													<td style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;" id="val2">XXX</td>
													<td style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;">Ha</td>
												</tr>
												<tr>
													<td style="background-color: #3CFF00; padding:3px;"></td>
													<td style="font-size:12px; padding:3px; padding-left:20px; font-weight:500; text-align:left">Dense Vegetation</td>
													<td style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;" id="val3">XXX</td>
													<td style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;">Ha</td>
												</tr>
												<tr>
													<td style="background-color: #9BFC90; padding:3px;"></td>
													<td style="font-size:12px; padding:3px; padding-left:20px; font-weight:500; text-align:left">Dense Vegetation</td>
													<td style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;" id="val4">XXX</td>
													<td style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;">Ha</td>
												</tr>
												<tr>
													<td style="background-color: #F1FC90; padding:3px;"></td>
													<td style="font-size:12px; padding:3px; padding-left:20px; font-weight:500; text-align:left">Moderate Vegetation</td>
													<td style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;" id="val5">XXX</td>
													<td style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;">Ha</td>
												</tr>
												<tr>
													<td style="background-color: #FFD441; padding:3px;"></td>
													<td style="font-size:12px; padding:3px; padding-left:20px; font-weight:500; text-align:left">Moderate Vegetation</td>
													<td style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;" id="val6">XXX</td>
													<td style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;">Ha</td>
												</tr>
												<tr>
													<td style="background-color: #FAAF00; padding:3px;"></td>
													<td style="font-size:12px; padding:3px; padding-left:20px; font-weight:500; text-align:left">Sparse Vegetation</td>
													<td style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;" id="val7">XXX</td>
													<td style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;">Ha</td>
												</tr>
												<tr>
													<td style="background-color: #FF6C17; padding:3px;"></td>
													<td style="font-size:12px; padding:3px; padding-left:20px; font-weight:500; text-align:left">Sparse Vegetation</td>
													<td style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;" id="val8">XXX</td>
													<td style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;">Ha</td>
												</tr>
												<tr>
													<td style="background-color: #FF1212; padding:3px;"></td>
													<td style="font-size:12px; padding:3px; padding-left:20px; font-weight:500; text-align:left">Open Soil</td>
													<td style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;" id="val9">XXX</td>
													<td style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;">Ha</td>
												</tr>
												<tr>
													<td style="background-color: #9E3A00; padding:3px;"></td>
													<td style="font-size:12px; padding:3px; padding-left:20px; font-weight:500; text-align:left">Open Soil</td>
													<td style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;" id="val10">XXX</td>
													<td style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;">Ha</td>
												</tr>
												<tr>
													<td style="background-color: #940000; padding:3px;"></td>
													<td style="font-size:12px; padding:3px; padding-left:20px; font-weight:500; text-align:left">Open Soil</td>
													<td style="font-size:12px; padding:3px; font-weight:500; color:#000; text-align:center;" id="val11">XXX</td>
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
				<div class="title-pop" id="pictPopTitle">Plant Disease</div>
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
    $("#NDVI2").removeClass('inactive');
	$("#NDVI2").addClass('active');
	$("#mainNDVI").parent().addClass('show-sub');
	$('.select2').select2();
	if (currLoc != "") {
		$("#lokasiGis").val(currLoc);
		$("#lokasiGis").select2().trigger("change");
	}
    $('>span>span>span', '.select2').css({"color": "white", "font-size": "18px", "font-weight":"500"})
</script>
<script>
Chart.defaults.global.defaultFontStyle = 'Bold';
const trendHistory = document.getElementById("trendHistory").getContext('2d');
var xAxes = ['F-7','F-6','F-5','F-4','F-3','F-2','F-1','F0','F1','F2','F3','F4','F5'];

var data1 = [21, 21, 11, 3, 3, 13, 3, 5, 11, 13, 11, 12, 10]
var	data2 = [23, 9, 3, 17, 13, 14, 13, 15, 15, 13, 13, 18, 16]
var	data3 = [14, 33, 17, 15 ,  14, 23, 14, 10, 14, 14, 16, 10, 14]
var data4 = [16, 21, 31, 13, 3, 23, 23, 15, 1, 13, 11, 12, 10]
var	data5 = [42, 32, 3, 7, 13, 4, 3, 5, 15, 3, 13, 18, 16]
var	data6 = [12, 13, 37, 15 ,  14, 3, 14, 10, 14, 14, 6, 10, 14]
var data7 = [7, 8, 11,23, 3, 13, 3, 5, 11, 13, 11, 12, 10]
var	data8 = [13, 13, 3, 27, 23, 4, 13, 15, 15, 13, 13, 18, 16]
var	data9 = [11, 4, 7, 15 , 14, 3, 4, 10, 14, 14, 16, 10, 14]
var data10 = [27, 21, 21, 23, 3, 13, 3, 5, 11, 13, 11, 12, 10]
var	data11 = [15, 22, 13, 17, 13, 14, 13, 15, 15, 13, 13, 18, 16]

var mydata = {
	labels: xAxes,
	datasets: [{
				label: 'Open Soil',
				backgroundColor: '#940000',
				data: data11,
				lineTension: 0,
				datalabels: {
					color: "#000",
					formatter: function (value) {
						return value + "%";
					}
					
				}	
			},{
				label: 'Open Soil',
				backgroundColor: '#9E3A00',
				data: data10,
				lineTension: 0,
				datalabels: {
					color: "#000",
					formatter: function (value) {
						return value + "%";
					}
					
				}	
			},{
				label: 'Open Soil',
				backgroundColor: '#FF1212',
				data: data9,
				lineTension: 0,
				datalabels: {
					color: "#000",
					formatter: function (value) {
						return value + "%";
					}
					
				}	
			},{
				label: 'Sparse Vegetation',
				backgroundColor: '#FF6C17',
				data: data8,
				lineTension: 0,
				datalabels: {
					color: "#000",
					formatter: function (value) {
						return value + "%";
					}
					
				}	
			},{
				label: 'Sparse Vegetation',
				backgroundColor: '#FAAF00',
				data: data7,
				lineTension: 0,
				datalabels: {
					color: "#000",
					formatter: function (value) {
						return value + "%";
					}
					
				}	
			},{
				label: 'Moderate Vegetation',
				backgroundColor: '#FFD441',
				data: data6,
				lineTension: 0,
				datalabels: {
					color: "#000",
					formatter: function (value) {
						return value + "%";
					}
					
				}	
			},{
				label: 'Moderate Vegetation',
				backgroundColor: '#F1FC90',
				data: data5,
				lineTension: 0,
				datalabels: {
					color: "#000",
					formatter: function (value) {
						return value + "%";
					}
					
				}	
			},{
				label: 'Dense Vegetation',
				backgroundColor: '#9BFC90',
				data: data4,
				lineTension: 0,
				datalabels: {
					color: "#000",
					formatter: function (value) {
						return value + "%";
					}
					
				}	
			},{
				label: 'Dense Vegetation',
				backgroundColor: '#3CFF00',
				data: data3,
				lineTension: 0,
				datalabels: {
					color: "#000",
					formatter: function (value) {
						return value + "%";
					}
					
				}	
			}, {
				label: 'Dense Vegetation',
				backgroundColor:'#01D56B',
				data: data2,
				lineTension: 0,
				datalabels: {
					color: "#000",
					formatter: function (value) {
						return value + "%";
					}
					
				}	
				
			},{
				label: 'Dense Vegetation',
				backgroundColor: '#1C8D00',
				data: data1,
				lineTension: 0,
				datalabels: {
					color: "#000",
					formatter: function (value) {
						return value + "%";
					}
				
				}			
			},]
}
window.myBar = new Chart(trendHistory, {
	type: 'line',
	data: mydata,
	// plugins: [ChartDataLabels],
	options: {
		title: {
			display: false,
			text: 'Chart.js Bar Chart - Stacked'
		},
		tooltips: {
			mode: 'index',
			intersect: false,
			callbacks: {
				label: function(tooltipItem, data) {
					var label = mydata.datasets[tooltipItem.datasetIndex].label;
					var val = mydata.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
					return label + ' : ' + val + '%';
				}
			}
		},
		responsive: true,
		maintainAspectRatio: false,
		scales: {
			yAxes: [{
				stacked: true,
				display: true,
				gridLines: {
					display: false,
				},
				ticks: {
					display: true,
					max: 100,
					min: 0,
					stepSize: 20,
					callback: function(value) {
						return value + "%";
					}
				},
				scaleLabel: {
                    display: true,
					labelString: "Percentage",
                }
			}],
			xAxes: [{
				stacked: true,
				gridLines: {
					display: false,
				},
				scaleLabel: {
                    display: true,
					labelString: "Umur Forcing",
                }
			}]
		},
		legend: {
			display: false,
			position: 'bottom',
			labels: {
			usePointStyle: false,
			}
		}
	}
});

const distribution = document.getElementById("distribution").getContext('2d');
var mydata2 = {
	labels: ['Dense Vegetation', 'Dense Vegetation', 'Dense Vegetation', 'Dense Vegetation', 'Moderate Vegetation', 'Moderate Vegetation', 'Sparse Vegetation', 'Sparse Vegetation', 'Open Soil', 'Open Soil', 'Open Soil'],
		datasets: [{
		label:'points',
		data: [0, 100, 400, 300, 100, 50, 50, 20, 30, 0, 0],
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
			'#3CFF00',
			'#9BFC90',
			'#F1FC90',
			'#FFD441',
			'#FAAF00',
			'#FF6C17',
			'#FF1212',
			'#9E3A00',
			'#940000'
		]
	}],
}
var total = 0;
var valLegend ='';
for(let i = 0; i<mydata2.datasets[0].data.length;i++){
	 total += mydata2.datasets[0].data[i];
	 valLegend = '#val'+(i+1);
	 document.querySelector(valLegend).innerHTML =  mydata2.datasets[0].data[i].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
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
