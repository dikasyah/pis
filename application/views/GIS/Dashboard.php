<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Digital Plantation - PIS</title>
    <link rel = "icon"  href="<?=base_url()?>/assets/images/logo-ggf.png" type = "image/png">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url('/assets/plugins/fontawesome-free/css/all.min.css');?>">
    <!-- Theme style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/dist/css/adminlte.css');?>">
    <!-- summernote -->
    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url('/assets/plugins/summernote/summernote-bs4.min.css');?>">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/templateGIS.css');?>">
    <script>
        var site_url = '<?=site_url()?>';
        var base_url = '<?=base_url()?>';
        var akses = '<?=$akses?>';
    </script>

</head>

<body class="">
    <!-- Navbar -->
    <nav class=" navbar navbar-expand navbar-white navbar-dark bg-dark">
        <ul class="navbar-nav">
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Dashboard</a>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Notifications Dropdown Menu -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-cloud-upload-alt"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge" id="TodayUploadCount"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header"> <span id="TodayUploadCount1"></span>
                        Notifications</span>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item" data-toggle="modal" data-target="#detailLokasiPop">
                        <i class="fas fa-upload mr-2"></i> <span id="TodayUploadCount2"></span> today Upload
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-user"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-house-user mr-2"></i> Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-sign-out-alt mr-2"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper2">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <h1 class="m-0">Today Uploaded</h1>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div>
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
                                                <i class="fa fa-arrow-left gallery-arrow-icon" aria-hidden="true"></i>
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
                                                <i class="fa fa-arrow-right gallery-arrow-icon" aria-hidden="true"></i>
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

        <div>
            <div class="card shadow" style="background-color:#2ad100">
                <div class="card-body">
                    <div class="row">
                        <div class="wrapper">
                            <h1 class="cat" style="text-align: center">Category</h1>
                        </div>
                        <div class="col-lg-3" style="text-align: center">
                            <div class="shield shadow mb-3" style="text-align: center">
                                <a
                                    href="<?php echo site_url(isset($currLoc) ? 'GIS_Dashboard/NDVI?page=NDVI&loc=PG&currLoc='.$currLoc : 'GIS_Dashboard/NDVI?page=NDVI&loc=PG') ?>"><img
                                        src="<?php echo base_url()?>/assets/images/gis_logo/PG.png"
                                        style="width:50%; height:50%; margin-top:20px">
                                    <p class="menu">Plantation<br> Group</p>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3" style="text-align: center">
                            <div class="shield shadow mb-3" style="text-align: center">
                                <a
                                    href="<?php echo site_url(isset($currLoc) ? 'GIS_Dashboard/NDVI?page=NDVI&loc=Wilayah&currLoc='.$currLoc : 'GIS_Dashboard/NDVI?page=NDVI&loc=Wilayah') ?>"><img
                                        src="<?php echo base_url()?>/assets/images/gis_logo/Wilayah.png"
                                        style="width:50%; height:50%; margin-top:20px"><br>
                                    <p class="menu">Wilayah</p>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3" style="text-align: center">
                            <div class="shield shadow mb-3" style="text-align: center">
                                <a
                                    href="<?php echo site_url(isset($currLoc) ? 'GIS_Dashboard/NDVI?page=NDVI&loc=Lokasi&currLoc='.$currLoc : 'GIS_Dashboard/NDVI?page=NDVI&loc=Lokasi') ?>"><img
                                        src="<?php echo base_url()?>/assets/images/gis_logo/lokasi.png"
                                        style="width:50%; height:50%; margin-top:20px"> <br>
                                    <p class="menu">Lokasi</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div
    
    
    <!-- /.content-wrapper -->
    <footer class="main-footer2">
        <strong>Copyright &copy; 2020 <a href="#">Gis Dashboard</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 2.0.0
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->


    <div class="modal fade" id="detailLokasiPop">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail lokasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive" style="height:450px!important;">
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
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    
     <div class="modal fade" id="pictModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="title-pop" id="pictPopLocation">-</div>
                    <div class="title-pop" id="pictPopJenis">-</div>
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
        <!-- /.modal-dialog -->
    </div>
    <!-- ./wrapper -->

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
    <script src="<?php echo base_url('/assets/dist/js/adminlte.js');?>"></script>
    <script src="<?php echo base_url('/assets/js/plugins/compressor.min.js');?>"></script>
    <script src="<?php echo base_url('/assets/js/templateUI_GIS.js');?>"></script>
</body>

</html>

<script>
    var site_url = '<?=site_url()?>';
    var base_url = '<?=base_url()?>';
    var akses = '<?=$akses?>';
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
            $("#pictModal").modal();
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

    var galery = '<?=$galery?>'
    var mygalery = JSON.parse(galery.replace(/(\r\n|\n|\r)/gm, " "));
    document.querySelector("#TodayUploadCount").innerHTML = mygalery.length;
    document.querySelector("#TodayUploadCount1").innerHTML = mygalery.length;
    document.querySelector("#TodayUploadCount2").innerHTML = mygalery.length;
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