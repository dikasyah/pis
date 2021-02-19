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
			<div class="row px-4 pt-2" >
                <div class="card full-wdith" >
					<div class="card-header  py-0 pict-header">
						<span class="submenu-main-title-gis">DSM</span>
						<span id="pictDate" class="submenu-main-title-gis"><?php echo isset($picts[0]->date) ? $picts[0]->date : '-'; ?></span>
						<span class="header-blank-space">DSM</span>
				    </div>
					<div class="card-body p-0">
						<div class="pict-overlay-type2" id="pictOverlayGis">
									
						</div>
						<img id="mainContentImage" src="<?php echo base_url()?>/assets/upload/gis_pict/<?php echo isset($picts[0]->image) ? $picts[0]->image : 'x3789default.jpg'; ?>" style="width:100%; height:655px;">
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
				<div class="title-pop" id="pictPopTitle">DSM</div>
				<div class="title-pop" id="pictPopDate"><?php echo isset($picts[0]->date) ? $picts[0]->date : '-'; ?></div>
			</div>
			<button  class="close-button" onclick="popClose('pictModal')">&times;</button>
			
        </div>
        <div class="modal-body">
			<img id="popPict"  src="<?php echo base_url()?>/assets/upload/gis_pict/<?php echo isset($picts[0]->image) ? $picts[0]->image : 'x3789default.jpg'; ?>" style="height:100%; width:100%" >
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
    $("#mainDSM").parent().addClass('show-sub');
    $("#mainDSM").removeClass('inactive');
	$("#mainDSM").addClass('active');
	$('.select2').select2();
	if (currLoc != "") {
		$("#lokasiGis").val(currLoc);
		$("#lokasiGis").select2().trigger("change");
	}
    $('>span>span>span', '.select2').css({"color": "white", "font-size": "18px", "font-weight":"500"})
</script>
<script src="<?php echo base_url('/assets/js/templateUI_GIS.js');?>"></script>
</body>
</html>
