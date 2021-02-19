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

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/plugins/select2/css/select2.min.css');?>">
    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url('/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css');?>">
    <!-- Theme style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/dist/css/adminlte.min.css');?>">
    <!-- summernote -->
    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url('/assets/plugins/summernote/summernote-bs4.min.css');?>">
    <script src="<?php echo base_url('/assets/plugins/jquery/jquery.min.js');?>"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/templateGIS.css');?>">
    <link rel="stylesheet" type="text/css"
        href="<?php echo base_url('/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css');?>">

    <script>
        var site_url = '<?=site_url()?>';
        var base_url = '<?=base_url()?>';
    </script>

    <style>
        .select2-container .select2-selection--single {
            height: 34px !important;
        }

        .select2-container--default .select2-selection--single {
            border: 1px solid #ccc !important;
            border-radius: 0px !important;
        }

        #navbar {
            overflow: scroll;
        }

        #navbar::-webkit-scrollbar {
            display: none;
        }
    </style>

</head>

<body class="sidebar-mini layout-fixed sidebar-collapse">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item">
                    <div class="container">
                        <select class="form-control select2" name="lokasiGis" id="lokasiGis">
                            <option value="W01">Wilayah 1</option>
                            <option value="W02">Wilayah 2</option>
                            <option value="W03">Wilayah 3</option>
                            <option value="W04">Wilayah 4</option>
                            <option value="W05">Wilayah 5</option>
                            <option value="W06">Wilayah 6</option>
                            <option value="W07">Wilayah 7</option>
                            <option value="W08">Wilayah 8</option>
                            <option value="W09">Wilayah 9</option>
                            <option value="W11">Wilayah 11</option>
                            <option value="W12">Wilayah 12</option>
                            <option value="W13">Wilayah 13</option>
                            <option value="W14">Wilayah 14</option>
                        </select>
                    </div>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('GIS_Dashboard')?>">
                        <i class="fas fa-arrow-alt-circle-left"></i>
                    </a>
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
                            <i class="fas fa-envelope mr-2"></i> Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-logout mr-2"></i> Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <script>
            $(function () {
                //Initialize Select2 Elements
                $('.select2').select2()
            })
        </script>