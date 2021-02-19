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
			<div class="row px-4 pt-2" >
                <div class="card full-wdith" >
					<div class="card-header  py-0 center-text" >
						<span id="Title" class="submenu-main-title-gis" >Sufficiency Of Water</span>
				    </div>
					<div class="card-body p-0">
						<div class="table-responsive">
							<table class="table table-striped mb-0 NDVI-table" id="myTableGIS">
								<thead>
									<tr class="center-text" >
										<td style="width:2%">PG</td>
										<td style="width:9%">Wilayah</td>
										<td style="width:9%">Lokasi</td>
										<td style="width:9%">Kebun</td>	
										<td style="width:10%">Umur</td>
										<td style="width:11%">Kawil</td>
										<td style="width:11%">Kasbun</td>
										<td style="width:10%">Foto</td>
										<td style="width:10%">PDF</td>
										<td style="width:11%">Last Update</td>
									</tr>
								</thead>
								<tbody id="tableOutput">
									
								</tbody>
							</table>
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
				<div class="title-pop" id="pictPopLocation">Lokasi</div>
				<div class="title-pop" id="pictPopJenis">Kategori - Jenis</div>
			</div>
			<button  class="close-button" onclick="popClose('pictModal')">&times;</button>
			
        </div>
        <div class="modal-body">
			<img id="popPict" src="<?php echo base_url()?>/assets/upload/gis_pict/<?php echo isset($picts[0]->image) ? $picts[0]->image : 'x3789default.jpg'; ?>" style="height:100%; width:100%" >
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
    $("#NDVI3").removeClass('inactive');
	$("#NDVI3").addClass('active');
	$("#mainNDVI").parent().addClass('show-sub');
	$('.select2').select2();
	if (currLoc != "") {
		$("#lokasiGis").val(currLoc);
		$("#lokasiGis").select2().trigger("change");
	}
	$('>span>span>span', '.select2').css({"color": "white", "font-size": "18px", "font-weight":"500"})
	
	//table script
	var locationTable ='<?=$locationTable?>';
	locationTable = JSON.parse(locationTable.replace(/(\r\n|\n|\r)/gm," "));
	var idx = 0;
	var myTableVal = new Array();
	var obj = locationTable[0];
	for(let i=0; i<locationTable.length/2;i++){
		// console.log("location : "+locationTable[i].lokasi+" id : "+locationTable[i].photo_id)
		// console.log("object : "+obj.lokasi+" id : "+obj.photo_id)
		if( obj.lokasi != locationTable[i].lokasi){
			myTableVal.push(obj);
		}
		obj = locationTable[i];
		if(i == locationTable.length/2-1){
			myTableVal.push(obj);
		}
	}
	let output = "";
	let kasbun = "";
	for (let i = 0; i < myTableVal.length; i++) {
		if(myTableVal[i].kebun[3] == "1"){
			kasbun = myTableVal[i].kasie_kebun1
		}else if(myTableVal[i].kebun[3] == "2"){
			kasbun = myTableVal[i].kasie_kebun2
		}else if(myTableVal[i].kebun[3] == "3"){
			kasbun = myTableVal[i].kasie_kebun3
		}
		output += `<tr class="center-text" style=" font-size:12px; font-weight:bold;">
			<td style="width:2%; padding-left:4px; padding-right:4px;">${myTableVal[i].plantation_group}</td>
			<td>${myTableVal[i].code}</td>
			<td>${myTableVal[i].lokasi}</td>	
			<td>${myTableVal[i].kebun}</td>	
			<td>${myTableVal[i].umur_hari} Hari</td>
			<td>${myTableVal[i].kepala_wilayah}</td>
			<td>${kasbun}</td>
			<td style="padding:0px !important">
				<div class="pict-overlay-type6 table-image-overlay" id="tiOverlay_${i}">
													
				</div>
				<img src="${base_url}/assets/upload/gis_pict/${myTableVal[i].image}" style="height:100px; width:100%">
			</td>
			<td><a href="${base_url}/assets/upload/gis_pdf/${myTableVal[i].pdf}"  download class="full-width" >${myTableVal[i].pdf.substring(0, 16)}...</a></td>
			<td>${myTableVal[i].date}</td>
		</tr>`;
	}
	document.querySelector("#tableOutput").innerHTML = output;
	$("#myTableGIS thead > tr")
    .clone()
    .appendTo("#myTableGIS tbody")
	.addClass("hidden-to-set-col-widths");
	
	$(".table-image-overlay").on("click",function(){
		let overlayID = this.id.split("_");
		let overlayIDX = parseInt(overlayID[1]);
		document.querySelector("#pictPopLocation").innerHTML = myTableVal[overlayIDX].lokasi;
		document.querySelector("#pictPopJenis").innerHTML = myTableVal[overlayIDX].kategori+" - "+myTableVal[overlayIDX].jenis;
		$("#popPict").attr("src",base_url + "/assets/upload/gis_pict/" +  myTableVal[overlayIDX].image);
		openPictPop("pictModal");
	});
	//table script end
</script>

<script src="<?php echo base_url('/assets/js/templateUI_GIS.js');?>"></script>
</body>
</html>
