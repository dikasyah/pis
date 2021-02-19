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
			<div class="row px-4 pt-2" >
                <div class="card full-wdith" >
					<div class="card-header  py-0 center-text" >
						<span id="Title" class="submenu-main-title-gis" >Soil Texture</span>
				    </div>
					<div class="card-body p-0">
						<div class="table-responsive">
							<table class="table table-striped mb-0 Other-table" id="myTableGIS">
								<thead>
									<tr class="center-text" >
										<td style="width:2%">PG</td>
										<td style="width:8%">Wilayah</td>
										<td style="width:8%">Lokasi</td>
										<td style="width:8%">Kebun</td>
										<td style="width:15%">Jenis</td>	
										<td style="width:10%">Kawil</td>
										<td style="width:10%">Kasbun</td>
										<td style="width:10%">Foto</td>
										<td style="width:11%">PDF</td>
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
<script src="<?php echo base_url('/assets/js/plugins/compressor.min.js');?>"></script>
<script src="<?php echo base_url('/assets/js/templateUI_GIS.js');?>"></script>
<script>
	document.querySelector("#fullTitle").innerHTML ="WEB - Geographic Information System";
    document.querySelector("#otherTitle").innerHTML = "WEB - GIS";
    $("#mainOther").parent().addClass('show-sub');
    $("#mainOther").removeClass('inactive');
    $("#mainOther").addClass('semi-inactive');
    $("#Other1").removeClass('inactive');
	$("#Other1").addClass('active');
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
	var obj = locationTable[0];
	pages = "";
	let output = "";
	for (let i = 0; i < locationTable.length; i++) {
		pages = getPageFromJenis(locationTable[i].jenis);
		output += `<tr class="center-text" style=" font-size:12px; font-weight:bold;">
			<td style="width:2%; padding-left:4px; padding-right:4px;">${locationTable[i].plantation_group}</td>
			<td>${locationTable[i].code}</td>
			<td><a href="${site_url}/GIS_Dashboard/${locationTable[i].kategori}?page=${pages}&loc=Lokasi&currLoc=${locationTable[i].lokasi}&date=${locationTable[i].date.replace(" ", "_")}">${locationTable[i].lokasi}</a></td>	
			<td>${locationTable[i].kebun}</td>	
			<td>${locationTable[i].kategori} - ${locationTable[i].jenis}</td>	
			<td>${locationTable[i].kepala_wilayah}</td>
			<td>${locationTable[i].kasbun}</td>
			<td style="padding:0px !important">
				<div class="pict-overlay-type6 table-image-overlay" id="tiOverlay_${i}">
													
				</div>
				<img id="tblImg_${i}" src="" style="height:100px; width:100%">
			</td>
			<td><a href="${base_url}/assets/upload/gis_pdf/${locationTable[i].pdf}"  download class="full-width" >${locationTable[i].pdf.substring(0, 16)}...</a></td>
			<td>${locationTable[i].date}</td>
		</tr>`;
		const toDataURL = url => fetch(url)
            .then(response => response.blob())
            .then(blob => new Promise((resolve, reject) => {
                const reader = new FileReader()
                reader.onloadend = () => resolve(reader.result)
                reader.onerror = reject
                reader.readAsDataURL(blob)
            }))
            toDataURL(base_url+'assets/upload/gis_pict/'+locationTable[i].image)
            .then(dataUrl => {
                var file = dataURLtoFile(dataUrl,locationTable[i].image);
                //console.log('original file size : '+file.size)
                new Compressor(file,{
                    quality:0.1,
                    success(result){
                        //console.log('compressed file size : '+result.size)
                        var reader = new FileReader()
                        reader.readAsDataURL(result);
                        reader.onloadend = function(){
                            var base64data = reader.result;
                            document.getElementById("tblImg_"+i).src = base64data;
                        }
                    }
                })
            })
	}
	document.querySelector("#tableOutput").innerHTML = output;
	$("#myTableGIS thead > tr")
    .clone()
    .appendTo("#myTableGIS tbody")
	.addClass("hidden-to-set-col-widths");
	
	$(".table-image-overlay").on("click",function(){
		let overlayID = this.id.split("_");
		let overlayIDX = parseInt(overlayID[1]);
		document.querySelector("#pictPopLocation").innerHTML = locationTable[overlayIDX].lokasi;
		document.querySelector("#pictPopJenis").innerHTML = locationTable[overlayIDX].kategori+" - "+locationTable[overlayIDX].jenis;
		$("#popPict").attr("src",base_url + "/assets/upload/gis_pict/" +  locationTable[overlayIDX].image);
		openPictPop("pictModal");
	});
	//table script end
</script>


</body>
</html>
