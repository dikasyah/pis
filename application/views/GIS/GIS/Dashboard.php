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
        var akses ='<?=$akses?>';
        var galery ='<?=$galery?>'

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
		<!--Main content-->
		<div class="container-dashboard-gis">
        <div class="row">
                <div class="col-lg-3 px-1"  style="margin-bottom:10px;">
                    <button class="btn btn-primary" style="width:100%; font-weight:bold" onclick="history_gallery();">Upload Drone Utilization</button>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 px-1"  style="margin-bottom:30px;">
                    <div class="card">
                        <div class="card-body p-0 " style="background-color:#F6F6F6;">
                            <div style="height:270px; width:100%;display:flex;flex-direction:column; align-items:center; justify-content:center;">
                                <p class="gis-logo-text">Digital Plantation</p>
                                <img class="icon-dashboard" src="/labita/assets/images/logo-gis.png" >


                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 px-1"  style="margin-bottom:30px;">
                    <div class="card">
                        <div class="card-body p-0">
                            <div id="galleryContainer" class="" style="height:270px; width:100%;display:flex; align-items:center; justify-content:center; ">
                                <div class="pict-overlay-type5 display-none" id="pictOverlayGis">
                                                    
                                </div>
                                <img id="dashboardNoImage"  src="<?php echo base_url()?>/assets/images/default.jpg" style="width:33%; min-width:200px; height:90%; ">
                                <table style="height:100%; width:100%; " class="display-none" id="galleryTable">
                                    <tbody>
                                        <tr>
                                            <td style="width:33.33%;  text-align:center;">
                                                <div class="dashboard-arrow-container " >
                                                    <a class="gallery-arrow"  id="galleryArrowLeft">
                                                        <i class="fa fa-arrow-left gallery-arrow-icon"  aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                                <div class="pict-overlay-type4" >

						                        </div>
                                                <img id="galleryLeftImg" class="gallery-image" src="<?php echo base_url()?>/assets/images/default.jpg" style="margin-bottom:-25px;width:90%; height:240px; z-index:1; position:relative;">
                                                <img id="galleryLeftPlaceholder" class="not-visible" src="<?php echo base_url()?>/assets/images/default.jpg" style="z-index:0; position:relative; margin-top:-218px;width:90%; height:240px;">
                                            </td>
                                            <td style="width:33.33%;  text-align:center;">
                                                <div class="pict-overlay-type5" id="pictOverlayGis2">
                                                    
                                                </div>
                                                <img id="galleryMainImg" class="gallery-image" src="<?php echo base_url()?>/assets/images/default.jpg" style="width:90%; height:240px; z-index:2; position:relative;">
                                            </td>
                                            <td style="width:33.33%;  text-align:center;">
                                                <div class="dashboard-arrow-container " >
                                                    <a class="gallery-arrow" id="galleryArrowRight">
                                                        <i class="fa fa-arrow-right gallery-arrow-icon"  aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                                <div class="pict-overlay-type4"  style="right:0">

                                                </div>
                                                <img id="galleryRightImg" class="gallery-image" src="<?php echo base_url()?>/assets/images/default.jpg" style="margin-bottom:-25px;width:90%; height:240px; z-index:1; position:relative;">
                                                <img id="galleryRightPlaceholder" class="not-visible" src="<?php echo base_url()?>/assets/images/default.jpg" style="z-index:0; position:relative; margin-top:-218px;width:90%; height:240px;">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 px-1 mb-2" >
                    <div class="card">
                        <div class="card-header center-text py-0">
                            <a  href='<?php echo site_url('GIS_Dashboard/NDVI?page=HOME&loc=PG') ?>' class="dashboard-card-title">
                                <span >Plantation Group</span>
                            </a>
                        </div>
                        <div class="card-body p-0 " style="height:270px; display:flex; align-items:center; justify-content:center; ">
                            <div class="pict-overlay-type3" id="pictOverlayDashboardGis1">

                            </div>
                            <img src="<?php echo base_url()?>/assets/images/Gis_Dashboard_PG.jpg" style="width:100%; height:100%;">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 px-1 mb-2">
                    <div class="card">
                            <div class="card-header center-text py-0">
                                <a href='<?php echo site_url('GIS_Dashboard/NDVI?page=HOME&loc=Wilayah') ?>' class="dashboard-card-title">
                                    <span >Wilayah</span>
                                </a>
                            </div>
                            <div class="card-body p-0" style="height:270px; display:flex; align-items:center; justify-content:center; ">
                                <div class="pict-overlay-type3" id="pictOverlayDashboardGis2">

                                </div>
                                <img src="<?php echo base_url()?>/assets/images/Gis_Dashboard_Wilayah.jpg" style="width:100%; height:100%;">
                            </div>
                        </div>
                    </div>
                <div class="col-lg-4 px-1 mb-2">
                    <div class="card">
                            <div class="card-header center-text py-0">
                                <a href='<?php echo site_url('GIS_Dashboard/NDVI?page=HOME&loc=Lokasi') ?>' class="dashboard-card-title">
                                    <span>Lokasi</span>
                                </a>
                            </div>
                            <div class="card-body p-0" style="height:270px; display:flex; align-items:center; justify-content:center; ">
                                <div class="pict-overlay-type3" id="pictOverlayDashboardGis3">

                                </div>
                                <img src="<?php echo base_url()?>/assets/images/Gis_Dashboard_Lokasi.jpg" style="width:100%; height:100%;">
                            </div>
                        </div>
                    </div>
            </div>
        </div>
		<!--Main content End-->
        <!-- pop up -->
        <div class="pop" id="pictModal">
            <div class="modal-header">
                <p class="pop-header-filler">&times;</p>
                <div class="pop-header-text-container">
                    <div class="title-pop" id="pictPopLocation">-</div>
                    <div class="title-pop" id="pictPopJenis">-</div>
                </div>
                <button  class="close-button" onclick="popClose('pictModal')">&times;</button>
                
            </div>
            <div class="modal-body">
                <img id="popPict" src="<?php echo base_url()?>/assets/upload/gis_pict/x3789default.jpg" style="height:100%; width:100%" >
            </div>
	    </div>
        <div class="pop-alert-upload" id="dsbModal">
            <div class="modal-header">
                <div class="title">Alert</div>
                <button  class="close-button" onclick="popClose('dsbModal')">&times;</button>
            </div>
            <div class="modal-body">
                <p>Anda belum memiliki akses untuk masuk</p>
            </div>
        </div>
         <!-- pop up end-->
        <!--overlay for pop-->
        <div class="" id="overlay"></div>
        <!--overlay for pop end-->
	</div>

<script src="<?php echo base_url('/assets/js/templateUI_GIS.js');?>"></script>
<script>
  $("#pictOverlayDashboardGis1").on("click", function () {
    if (akses == 1) {
        window.location.href =
      site_url + "/GIS_Dashboard/NDVI?page=HOME&loc=PG";
    } else {
      openPictPop("dsbModal");
    }
  
  });
  $("#pictOverlayDashboardGis2").on("click", function () {
    if (akses == 1) {
        window.location.href =
      site_url + "/GIS_Dashboard/NDVI?page=HOME&loc=Wilayah";
    } else {
      openPictPop("dsbModal");
    }
   
  });

  function history_gallery(){
    window.location.href="/PIS/gallery/history_gallery";
  }

  $("#pictOverlayDashboardGis3").on("click", function () {
    if (akses == 1) {
      window.location.href =
        site_url + "/GIS_Dashboard/NDVI?page=HOME&loc=Lokasi";
    } else {
      openPictPop("dsbModal");
    }
  });
    var mygalery = JSON.parse(galery.replace(/(\r\n|\n|\r)/gm," "));
    var left = mygalery.length-1;
    var main = 0;
    var right = 1
     if(mygalery.length == 1){
        $("#dashboardNoImage").attr("src", base_url + "/assets/upload/gis_pict/" + mygalery[0].image);
        $("#popPict").attr("src", base_url + "/assets/upload/gis_pict/" + mygalery[0].image);
        $("#pictPopLocation").html(mygalery[0].location);
        $("#pictPopJenis").html(mygalery[0].kategori+" - "+mygalery[0].jenis);
        $("#pictOverlayGis").removeClass("display-none");
        

    }else if(mygalery.length > 1){
        $("#dashboardNoImage").addClass("display-none");
        $("#galleryTable").removeClass("display-none");
        changeGalleryImage(0,left,main,right)

    }
    $("#galleryArrowRight").on("click", function () {
        if(!$(this).hasClass("changing")){
            phd = left;
            left += 1;
            main += 1;
            right += 1
           
            changeGalleryImage(phd,left,main,right,'right')
            $(this).addClass("changing");
        }
        
    });
    $("#galleryArrowLeft").on("click", function () {
        if(!$(this).hasClass("changing")){
            let max = mygalery.length - 1;
            phd = right;
            left -= 1;
            main -= 1;
            right -= 1
            if(left < 0){
                left = max;
            }
            if(main < 0){
                main = max;
            }
            if(right < 0){
                right = max;
            }
            $(this).addClass("changing");
            changeGalleryImage(phd,left,main,right,'left');
        }
       

    });

    function changeGalleryImage(phd,leftIdx,mainIdx,rightIdx,dir){
        let max = mygalery.length - 1;
       
        phd = phd % (max+1);
        leftIdx = leftIdx % (max+1);
        mainIdx = mainIdx % (max+1);
        rightIdx = rightIdx % (max+1);

        let leftImg = $("#galleryLeftImg");
        let mainImg = $("#galleryMainImg");
        let rightImg = $("#galleryRightImg");
        leftImg.removeClass("left-arrow-click");
        mainImg.removeClass("left-arrow-click");
        rightImg.removeClass("left-arrow-click");
        leftImg.removeClass("right-arrow-click");
        mainImg.removeClass("right-arrow-click");
        rightImg.removeClass("right-arrow-click");
        
        $("#galleryRightPlaceholder").attr("src", base_url + "/assets/upload/gis_pict/" + mygalery[phd].image);
        $("#galleryLeftPlaceholder").attr("src", base_url + "/assets/upload/gis_pict/" + mygalery[phd].image);

        $("#popPict").attr("src", base_url + "/assets/upload/gis_pict/" + mygalery[mainIdx].image);
        $("#pictPopLocation").html(mygalery[mainIdx].location);
        $("#pictPopJenis").html(mygalery[mainIdx].kategori +" - "+ mygalery[mainIdx].jenis );
        
        setTimeout(function(){ 
            leftImg.attr("src", base_url + "/assets/upload/gis_pict/" + mygalery[leftIdx].image);
            mainImg.attr("src", base_url + "/assets/upload/gis_pict/" + mygalery[mainIdx].image);
            rightImg.attr("src", base_url + "/assets/upload/gis_pict/" + mygalery[rightIdx].image);
            if(dir == 'left'){
                leftImg.addClass("left-arrow-click");
                mainImg.addClass("left-arrow-click");
                rightImg.addClass("left-arrow-click");
                $("#galleryRightPlaceholder").removeClass("not-visible");
            }else if(dir == 'right'){
                leftImg.addClass("right-arrow-click");
                mainImg.addClass("right-arrow-click");
                rightImg.addClass("right-arrow-click");
                $("#galleryLeftPlaceholder").removeClass("not-visible");
            }
            setTimeout(function() {
                $("#galleryArrowRight, #galleryArrowLeft").removeClass("changing");
                $("#galleryLeftPlaceholder").addClass("not-visible");
                $("#galleryRightPlaceholder").addClass("not-visible");
            }, 720);
        },0);
        
    }
</script>
</body>
</html>
