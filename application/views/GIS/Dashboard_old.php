<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Digital Plantation - PIS</title>
    <link rel="icon" href="<?=base_url()?>/assets/images/logo-ggf.png" type="image/png">
    <script>
        var site_url = '<?=site_url()?>';
        var base_url = '<?=base_url()?>';
        var akses = '<?=$akses?>';
    </script>
    <style type="text/css">
        ::selection {
            background-color: #E13300;
            color: white;
        }

        ::-moz-selection {
            background-color: #E13300;
            color: white;
        }

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

        .shield {
            position: relative;
            width: 280px;
            height: 300px;
            background-color: green;
            border-radius: 0 0 140px 140px;
            display: inline-block;
        }

        .shield:before,
        .shield:after {
            position: absolute;
            margin-top: 50px;
            content: "";
            left: 70px;
            top: 0;
            width: 70px;
            height: 90px;
            border-radius: 100px 100px 0 0;
            -webkit-transform: rotate(-60deg);
            -moz-transform: rotate(-60deg);
            -ms-transform: rotate(-60deg);
            -o-transform: rotate(-60deg);
            transform: rotate(-60deg);
            -webkit-transform-origin: 0 100%;
            -moz-transform-origin: 0 100%;
            -ms-transform-origin: 0 100%;
            -o-transform-origin: 0 100%;
            transform-origin: 0 100%;
        }

        .shield:after {
            left: 0;
            -webkit-transform: rotate(60deg);
            -moz-transform: rotate(60deg);
            -ms-transform: rotate(60deg);
            -o-transform: rotate(60deg);
            transform: rotate(60deg);
            -webkit-transform-origin: 100% 100%;
            -moz-transform-origin: 100% 100%;
            -ms-transform-origin: 100% 100%;
            -o-transform-origin: 100% 100%;
            transform-origin: 100% 100%;
        }

        @font-face {
            font-family: "ubuntu";
            font-style: italic;
            font-weight: 300;
            src: local("Lato Light Italic"), local("Lato-LightItalic"),
                url(https://fonts.gstatic.com/s/ubuntucondensed/v8/u-4k0rCzjgs5J7oXnJcM_0kACGMtT-Dfqw.woff2) format("woff2");
        }

        .wrapper {
            text-align: center;
        }

        .cat {
            color: #fff;
            font-size: 35px;
            font-family: "ubuntu";
            text-transform: capitalize;
            font-weight: 700;
            font-family: "Josefin Sans", sans-serif;
            background: linear-gradient(to right, #006e02 10%, #fff 50%, #b7f705 60%);
            background-size: auto auto;
            background-clip: border-box;
            background-size: 200% auto;
            color: #fff;
            background-clip: text;
            text-fill-color: transparent;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: textclip 1.5s linear infinite;
            display: inline-block;
        }

        .menu {
            color: #fff;
            font-size: 30px;
            font-family: "ubuntu";
            text-transform: capitalize;
            font-weight: 700;
            font-family: "Josefin Sans", sans-serif;
            background: linear-gradient(to right, #f7c305 10%, #fff 50%, #b7f705 60%);
            background-size: auto auto;
            background-clip: border-box;
            background-size: 200% auto;
            color: #fff;
            background-clip: text;
            text-fill-color: transparent;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: textclip 1.5s linear infinite;
            display: inline-block;
        }

        @keyframes textclip {
            to {
                background-position: 200% center;
            }
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
                <div class="col-lg-3 px-1" style="margin-bottom:10px;">
                    <button class="btn btn-primary" style="width:100%; font-weight:bold"
                        onclick="history_gallery();">Upload Drone Utilization</button>
                </div>
                <div class="detail-lokasi-button-container px-1">
                    <button class="btn btn-primary detail-lokasi-button"
                        onclick="openLowerPop('detailLokasiPop');">Detail Lokasi Upload</button>
                </div>
                <div class="upload-counter-container">
                    <span style="font-size:18px; font-weight:bold;">Today Upload : </span>
                    <div class="upload-counter-output-container">
                        <span id="TodayUploadCount">12</span>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 px-1" style="margin-bottom:10px;">
                    <div class="card shadow">
                        <div class="card-body p-0">
                            <div id="galleryContainer" class=""
                                style="height:270px; width:100%;display:flex; align-items:center; justify-content:center; ">
                                <div class="pict-overlay-type5 display-none" id="pictOverlayGis">

                                </div>
                                <img id="dashboardNoImage" src="<?php echo base_url()?>/assets/images/default.jpg"
                                    style="width:33%; min-width:200px; height:90%; ">
                                <table style="height:100%; width:100%; " class="display-none" id="galleryTable">
                                    <tbody>
                                        <tr>
                                            <td style="width:33.33%;  text-align:center;">
                                                <div class="dashboard-arrow-container ">
                                                    <a class="gallery-arrow" id="galleryArrowLeft">
                                                        <i class="fa fa-arrow-left gallery-arrow-icon"
                                                            aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                                <div class="pict-overlay-type4">

                                                </div>
                                                <img id="galleryLeftImg" class="gallery-image"
                                                    src="<?php echo base_url()?>/assets/images/default.jpg"
                                                    style="margin-bottom:-25px;width:90%; height:240px; z-index:1; position:relative;">
                                                <img id="galleryLeftPlaceholder" class="not-visible"
                                                    src="<?php echo base_url()?>/assets/images/default.jpg"
                                                    style="z-index:0; position:relative; margin-top:-218px;width:90%; height:240px;">
                                            </td>
                                            <td style="width:33.33%;  text-align:center;">
                                                <div class="pict-overlay-type5" id="pictOverlayGis2">

                                                </div>
                                                <img id="galleryMainImg" class="gallery-image"
                                                    src="<?php echo base_url()?>/assets/images/default.jpg"
                                                    style="width:90%; height:240px; z-index:2; position:relative;">
                                            </td>
                                            <td style="width:33.33%;  text-align:center;">
                                                <div class="dashboard-arrow-container ">
                                                    <a class="gallery-arrow" id="galleryArrowRight">
                                                        <i class="fa fa-arrow-right gallery-arrow-icon"
                                                            aria-hidden="true"></i>
                                                    </a>
                                                </div>
                                                <div class="pict-overlay-type4" style="right:0">

                                                </div>
                                                <img id="galleryRightImg" class="gallery-image"
                                                    src="<?php echo base_url()?>/assets/images/default.jpg"
                                                    style="margin-bottom:-25px;width:90%; height:240px; z-index:1; position:relative;">
                                                <img id="galleryRightPlaceholder" class="not-visible"
                                                    src="<?php echo base_url()?>/assets/images/default.jpg"
                                                    style="z-index:0; position:relative; margin-top:-218px;width:90%; height:240px;">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row ">
                <div class="col-lg-12">
                    <div class="card shadow" style="background-color:#2ad100">
                        <div class="card-body">
                            <div class="row ml-4">
                                <div class="wrapper">
                                    <h1 class="cat" style="text-align: center">Category</h1>
                                </div>
                                <div class="col-lg-3" style="text-align: center">
                                    <div class="shield shadow mb-3" style="text-align: center">
                                        <a
                                            href="<?php echo site_url(isset($currLoc) ? 'GIS_Dashboard/NDVI?page=NDVI&loc=PG&currLoc='.$currLoc : 'GIS_Dashboard/NDVI?page=NDVI&loc=PG') ?>"><img
                                                src="<?php echo base_url()?>/assets/images/gis_logo/PG.png"
                                                style="width:50%; height:50%; margin-top:20px">
                                        <p class="menu">Plantation<br> Group</p></a>
                                    </div>
                                </div>

                                <div class="col-lg-3" style="text-align: center">
                                    <div class="shield shadow" style="text-align: center">
                                        <a
                                            href="<?php echo site_url(isset($currLoc) ? 'GIS_Dashboard/NDVI?page=NDVI&loc=Wilayah&currLoc='.$currLoc : 'GIS_Dashboard/NDVI?page=NDVI&loc=Wilayah') ?>"><img
                                                src="<?php echo base_url()?>/assets/images/gis_logo/Wilayah.png"
                                                style="width:50%; height:50%; margin-top:20px"><br>
                                        <p class="menu">Wilayah</p></a>
                                    </div>
                                </div>

                                <div class="col-lg-3" style="text-align: center">
                                    <div class="shield shadow" style="text-align: center">
                                        <a
                                            href="<?php echo site_url(isset($currLoc) ? 'GIS_Dashboard/NDVI?page=NDVI&loc=Lokasi&currLoc='.$currLoc : 'GIS_Dashboard/NDVI?page=NDVI&loc=Lokasi') ?>"><img
                                                src="<?php echo base_url()?>/assets/images/gis_logo/lokasi.png"
                                                style="width:50%; height:50%; margin-top:20px"> <br>
                                        <p class="menu">Lokasi</p></a>
                                    </div>
                                </div>
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
                    <button class="close-button" onclick="popClose('pictModal')">&times;</button>

                </div>
                <div class="modal-body">
                    <img id="popPict" src="<?php echo base_url()?>/assets/upload/gis_pict/x3789default.jpg"
                        style="height:100%; width:100%">
                </div>
            </div>
            <div class="pop-alert-upload" id="dsbModal">
                <div class="modal-header">
                    <div class="title">Alert</div>
                    <button class="close-button" onclick="popClose('dsbModal')">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Anda belum memiliki akses untuk masuk</p>
                </div>
            </div>

            <!-- detail lokasi pop -->
            <div class="pop-lower" id="detailLokasiPop">
                <div class="modal-header">
                    <p class="pop-header-filler">&times;</p>
                    <div class="pop-header-text-container">
                        <div class="title-pop">Detail Lokasi</div>
                    </div>
                    <button class="close-button" onclick="lowerPopClose('detailLokasiPop')">&times;</button>

                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0 Dashboard-table " id="myTableGIS"
                            style="min-width: 1300px;">
                            <thead>
                                <tr class="center-text">
                                    <td style="width:2%">PG</td>
                                    <td style="width:8%">Wilayah</td>
                                    <td style="width:8%">Lokasi</td>
                                    <td style="width:8%">Kebun</td>
                                    <td style="width:16%">Jenis</td>
                                    <td style="width:7%">Umur</td>
                                    <td style="width:9%">Kawil</td>
                                    <td style="width:9%">Kasbun</td>
                                    <td style="width:6%">Foto</td>
                                    <td style="width:10%">PDF</td>
                                    <td style="width:11%">Last Update</td>
                                </tr>
                            </thead>
                            <tbody id="tableOutput" style="max-height: 530px !important;">

                            </tbody>
                        </table>
                    </div>
                    <div style="margin-top:5px; width:100%; display:flex; justify-content:center">
                        <button class="btn btn-primary" id="showMoreButton" onclick="showMore();">Show More</button>
                    </div>

                </div>
            </div>
            <div class="pop-alert-upload" id="dsbModal">
                <div class="modal-header">
                    <div class="title">Alert</div>
                    <button class="close-button" onclick="lowerPopClose('dsbModal')">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Anda belum memiliki akses untuk masuk</p>
                </div>
            </div>
            <!-- detail lokasi pop end -->
            <!-- pop up end-->
            <!--overlay for pop-->
            <div class="" id="overlay"></div>
            <div class="" id="overlayLower"></div>
            <!--overlay for pop end-->
        </div>
        <script src="<?php echo base_url('/assets/js/plugins/compressor.min.js');?>"></script>
        <script src="<?php echo base_url('/assets/js/templateUI_GIS.js');?>"></script>
        <script>
            $("#pictOverlayDashboardGis1").on("click", function () {
                if (akses == 1) {
                    window.location.href =
                        site_url + "/GIS_Dashboard/NDVI?page=NDVI&loc=PG";
                } else {
                    openPictPop("dsbModal");
                }

            });
            $("#pictOverlayDashboardGis2").on("click", function () {
                if (akses == 1) {
                    window.location.href =
                        site_url + "/GIS_Dashboard/NDVI?page=NDVI&loc=Wilayah";
                } else {
                    openPictPop("dsbModal");
                }

            });

            function history_gallery() {
                window.location.href = "#";
            }

            $("#pictOverlayDashboardGis3").on("click", function () {
                if (akses == 1) {
                    window.location.href =
                        site_url + "/GIS_Dashboard/NDVI?page=NDVI&loc=Lokasi";
                } else {
                    openPictPop("dsbModal");
                }
            });
            // detail lokasi table initial output
            var detailLokasi = '<?=$detailLokasi?>'
            var mydetailLokasi = JSON.parse(detailLokasi.replace(/(\r\n|\n|\r)/gm, " "));
            var myTableCount = 10;
            checkTableCount();
            getTableOutput(myTableCount);



            function getTableOutput(myLength) {
                var output = "";
                var pages = "";
                for (let i = 0; i < myLength; i++) {
                    pages = getPageFromJenis(mydetailLokasi[i].jenis);
                    output += `<tr class="center-text" style=" font-size:12px; font-weight:bold;">
                <td style="width:2%; padding-left:4px; padding-right:4px;">${mydetailLokasi[i].plantation_group}</td>
                <td>${mydetailLokasi[i].code}</td>
                <td><a href="${site_url}/GIS_Dashboard/${mydetailLokasi[i].kategori}?page=${pages}&loc=Lokasi&currLoc=${mydetailLokasi[i].lokasi}&date=${mydetailLokasi[i].date.replace(" ", "_")}">${mydetailLokasi[i].lokasi}</a></td>	
                <td>${mydetailLokasi[i].kebun}</td>	
                <td>${mydetailLokasi[i].kategori} - ${mydetailLokasi[i].jenis}</td>
                <td>${mydetailLokasi[i].umur_hari}</td>
                <td>${mydetailLokasi[i].kepala_wilayah}</td>
                <td>${mydetailLokasi[i].kasbun}</td>
                <td style="padding:0px !important">
                    <div class="pict-overlay-type7 table-image-overlay" id="tiOverlay_${i}">
                                                        
                    </div>
                    <img id="detailLokasiImg_${i}" src="" style="height:50px; width:100%">
                </td>
                <td><a href="${base_url}/assets/upload/gis_pdf/${mydetailLokasi[i].pdf}"  download class="full-width" >${mydetailLokasi[i].pdf.substring(0, 16)}...</a></td>
                <td>${mydetailLokasi[i].date}</td>
            </tr>`;
                    const toDataURL = url => fetch(url)
                        .then(response => response.blob())
                        .then(blob => new Promise((resolve, reject) => {
                            const reader = new FileReader()
                            reader.onloadend = () => resolve(reader.result)
                            reader.onerror = reject
                            reader.readAsDataURL(blob)
                        }))
                    toDataURL(base_url + 'assets/upload/gis_pict/' + mydetailLokasi[i].image)
                        .then(dataUrl => {
                            var file = dataURLtoFile(dataUrl, mydetailLokasi[i].image);
                            //console.log('original file size : '+file.size)
                            new Compressor(file, {
                                quality: 0.1,
                                success(result) {
                                    //console.log('compressed file size : '+result.size)
                                    var reader = new FileReader()
                                    reader.readAsDataURL(result);
                                    reader.onloadend = function () {
                                        var base64data = reader.result;
                                        document.getElementById("detailLokasiImg_" + i).src =
                                            base64data;
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

                $(".table-image-overlay").on("click", function () {
                    let overlayID = this.id.split("_");
                    let overlayIDX = parseInt(overlayID[1]);
                    document.querySelector("#pictPopLocation").innerHTML = mydetailLokasi[overlayIDX].lokasi;
                    document.querySelector("#pictPopJenis").innerHTML = mydetailLokasi[overlayIDX].kategori +
                        " - " + mydetailLokasi[overlayIDX].jenis;
                    $("#popPict").attr("src", base_url + "/assets/upload/gis_pict/" + mydetailLokasi[overlayIDX]
                        .image);
                    openPictPop("pictModal");
                });
            }

            function showMore() {
                myTableCount += 10;
                checkTableCount();
                getTableOutput(myTableCount);
            }

            function checkTableCount() {
                if (myTableCount >= mydetailLokasi.length) {
                    myTableCount = mydetailLokasi.length;
                    $("#showMoreButton").addClass("display-none")
                }
            }



            // detail lokasi table initial output end

            //galery
            var galery = '<?=$galery?>'
            var mygalery = JSON.parse(galery.replace(/(\r\n|\n|\r)/gm, " "));
            document.querySelector("#TodayUploadCount").innerHTML = mygalery.length;
            var left = mygalery.length - 1;
            var main = 0;
            var right = 1
            if (mygalery.length == 1) {
                $("#dashboardNoImage").attr("src", base_url + "/assets/upload/gis_pict/" + mygalery[0].image);
                $("#popPict").attr("src", base_url + "/assets/upload/gis_pict/" + mygalery[0].image);
                $("#pictPopLocation").html(mygalery[0].location);
                $("#pictPopJenis").html(mygalery[0].kategori + " - " + mygalery[0].jenis);
                $("#pictOverlayGis").removeClass("display-none");


            } else if (mygalery.length > 1) {
                $("#dashboardNoImage").addClass("display-none");
                $("#galleryTable").removeClass("display-none");
                changeGalleryImage(0, left, main, right)

            }
            $("#galleryArrowRight").on("click", function () {
                if (!$(this).hasClass("changing")) {
                    phd = left;
                    left += 1;
                    main += 1;
                    right += 1

                    changeGalleryImage(phd, left, main, right, 'right')
                    $(this).addClass("changing");
                }

            });
            $("#galleryArrowLeft").on("click", function () {
                if (!$(this).hasClass("changing")) {
                    let max = mygalery.length - 1;
                    phd = right;
                    left -= 1;
                    main -= 1;
                    right -= 1
                    if (left < 0) {
                        left = max;
                    }
                    if (main < 0) {
                        main = max;
                    }
                    if (right < 0) {
                        right = max;
                    }
                    $(this).addClass("changing");
                    changeGalleryImage(phd, left, main, right, 'left');
                }


            });

            function changeGalleryImage(phd, leftIdx, mainIdx, rightIdx, dir) {
                let max = mygalery.length - 1;

                phd = phd % (max + 1);
                leftIdx = leftIdx % (max + 1);
                mainIdx = mainIdx % (max + 1);
                rightIdx = rightIdx % (max + 1);

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
                $("#pictPopJenis").html(mygalery[mainIdx].kategori + " - " + mygalery[mainIdx].jenis);

                setTimeout(function () {
                    leftImg.attr("src", base_url + "/assets/upload/gis_pict/" + mygalery[leftIdx].image);
                    mainImg.attr("src", base_url + "/assets/upload/gis_pict/" + mygalery[mainIdx].image);
                    rightImg.attr("src", base_url + "/assets/upload/gis_pict/" + mygalery[rightIdx].image);
                    if (dir == 'left') {
                        leftImg.addClass("left-arrow-click");
                        mainImg.addClass("left-arrow-click");
                        rightImg.addClass("left-arrow-click");
                        $("#galleryRightPlaceholder").removeClass("not-visible");
                    } else if (dir == 'right') {
                        leftImg.addClass("right-arrow-click");
                        mainImg.addClass("right-arrow-click");
                        rightImg.addClass("right-arrow-click");
                        $("#galleryLeftPlaceholder").removeClass("not-visible");
                    }
                    setTimeout(function () {
                        $("#galleryArrowRight, #galleryArrowLeft").removeClass("changing");
                        $("#galleryLeftPlaceholder").addClass("not-visible");
                        $("#galleryRightPlaceholder").addClass("not-visible");
                    }, 720);
                }, 0);

            }
            //galery end
        </script>
</body>

</html>