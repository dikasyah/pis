<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="/PIS/assets/images/logo-ggf.png" type="image/ico" />
    <title>PIS - PM Cost WIP</title>

    <!-- Custom fonts for this template-->
    <link href="/PIS/assets/SB_Admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="/PIS/assets/DataTables/datatables.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/PIS/assets/SB_Admin/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/522290ffc9.js" crossorigin="anonymous"></script>

    <style>
      /* Popup */
      #myImg {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
      }

      #myImg:hover {opacity: 0.7;}

      /* The Modal (background) */
      .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 9; /* Sit on top */
        padding-top: 75px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        color: rgb(0,0,0); /* Fallback color font */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
      }

      /* Modal Content (image) */
      .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 3px solid #696969;
        width: 80%;
        max-height: auto;
      }

      /* Add Animation */
      .modal-content, #caption {
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
      }

      @-webkit-keyframes zoom {
        from {-webkit-transform: scale(0)}
        to {-webkit-transform: scale(1)}
      }

      @keyframes zoom {
        from {transform: scale(0.1)}
        to {transform: scale(1)}
      }

      /* The Close Button */
      .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #FFFFFF;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
      }

      .close:hover,
      .close:focus {
        color: #EBE9E9;
        text-decoration: none;
        cursor: pointer;
      }

      /* 100% Image Width on Smaller Screens */
      @media only screen and (max-width: 700px){
        .modal-content {
          width: 100%;
        }
      }

      /*Hover Custom*/
      .container {
        position: relative;
        width: 100%;
        max-width: 300px;
      }

      .image {
        display: block;
        width: 100%;
        height: auto;
      }

      .overlay {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        height: 100%;
        width: 100%;
        opacity: 0;
        transition: .3s ease;
        background-color: black;
      }

      .container:hover .overlay {
        opacity: 0.4;
      }

      .icon {
        color: white;
        font-size: 50px;
        position: absolute;
        top: 40%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
      }

      .fa-times:hover {
        color: #00FF00;
      }

      .fa-search-plus:hover {
        color: #00FF00;
      }


      /*Coustume Table WIP PM*/
      .table_pm {
        border-collapse: collapse;
        width: 100%;
      }

      .table_pm td {
        padding-left: 5px;
        padding-right: 5px;
        color: black;
        font-size: 12px;
      }

      .table_pm tr:nth-child(odd){background-color: #DCDCDC;}
      }
    </style>
  </head>

  <body id="page-top" style="font-family:arial;" class="sidebar-toggled">

  <script src="/PIS/assets/SB_Admin/vendor/jquery/jquery.min.js"></script>
  <script src="/PIS/assets/SB_Admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
function hide_tr(name){
    $('#'+name).hide();
}
</script>
      <!-- Start Fungsi Cepat -->
<?php
  function random_color_part(){
    return str_pad(dechex(mt_rand( 0, 255 )), 2, '0', STR_PAD_LEFT);
  }
  function random_color(){
    return strtoupper('#'.random_color_part().random_color_part().random_color_part());
  }
  function angka_ribuan($angka){
    if($angka == 0){
      $hasil = "-";
    }
    else{
      $hasil = number_format($angka,0,',','.');
    }
    return $hasil;
  }
  function angka_ribuan_2($angka){
    if($angka == 0){
      $hasil = "-";
    }
    else{
      $hasil = number_format($angka,2,',','.');
    }
    return $hasil;
  }

  function format_tgl($tgl){
    if($tgl == NULL){
      return "-";
    }
    else{
      switch (date("n", strtotime($tgl))) {
        case '1':
          return date("j", strtotime($tgl))." Jan ".date("Y", strtotime($tgl));
        break;
        case '2':
          return date("j", strtotime($tgl))." Feb ".date("Y", strtotime($tgl));
        break;
        case '3':
          return date("j", strtotime($tgl))." Mar ".date("Y", strtotime($tgl));
        break;
        case '4':
          return date("j", strtotime($tgl))." Apr ".date("Y", strtotime($tgl));
        break;
        case '5':
          return date("j", strtotime($tgl))." Mei ".date("Y", strtotime($tgl));
        break;
        case '6':
          return date("j", strtotime($tgl))." Jun ".date("Y", strtotime($tgl));
        break;
        case '7':
          return date("j", strtotime($tgl))." Jul ".date("Y", strtotime($tgl));
        break;
        case '8':
          return date("j", strtotime($tgl))." Ags ".date("Y", strtotime($tgl));
        break;
        case '9':
          return date("j", strtotime($tgl))." Sep ".date("Y", strtotime($tgl));
        break;
        case '10':
          return date("j", strtotime($tgl))." Okt ".date("Y", strtotime($tgl));
        break;
        case '11':
          return date("j", strtotime($tgl))." Nov ".date("Y", strtotime($tgl));
        break;
        case '12':
          return date("j", strtotime($tgl))." Des ".date("Y", strtotime($tgl));
        break;
      }
    }
  }

  function format_tgl_min($tgl){
    if($tgl == NULL){
      return "-";
    }
    else{
      switch (date("n", strtotime($tgl))) {
        case '1':
          return date("j", strtotime($tgl))." Jan ".date("y", strtotime($tgl));
        break;
        case '2':
          return date("j", strtotime($tgl))." Feb ".date("y", strtotime($tgl));
        break;
        case '3':
          return date("j", strtotime($tgl))." Mar ".date("y", strtotime($tgl));
        break;
        case '4':
          return date("j", strtotime($tgl))." Apr ".date("y", strtotime($tgl));
        break;
        case '5':
          return date("j", strtotime($tgl))." Mei ".date("y", strtotime($tgl));
        break;
        case '6':
          return date("j", strtotime($tgl))." Jun ".date("y", strtotime($tgl));
        break;
        case '7':
          return date("j", strtotime($tgl))." Jul ".date("y", strtotime($tgl));
        break;
        case '8':
          return date("j", strtotime($tgl))." Ags ".date("y", strtotime($tgl));
        break;
        case '9':
          return date("j", strtotime($tgl))." Sep ".date("y", strtotime($tgl));
        break;
        case '10':
          return date("j", strtotime($tgl))." Okt ".date("y", strtotime($tgl));
        break;
        case '11':
          return date("j", strtotime($tgl))." Nov ".date("y", strtotime($tgl));
        break;
        case '12':
          return date("j", strtotime($tgl))." Des ".date("y", strtotime($tgl));
        break;
      }
    }
  }

  function format_bln($tgl){
    if($tgl == NULL){
      return "-";
    }
    else{
      switch (date("n", strtotime($tgl))) {
        case '1':
          return "Jan ".date("Y", strtotime($tgl));
        break;
        case '2':
          return "Feb ".date("Y", strtotime($tgl));
        break;
        case '3':
          return "Mar ".date("Y", strtotime($tgl));
        break;
        case '4':
          return "Apr ".date("Y", strtotime($tgl));
        break;
        case '5':
          return "Mei ".date("Y", strtotime($tgl));
        break;
        case '6':
          return "Jun ".date("Y", strtotime($tgl));
        break;
        case '7':
          return "Jul ".date("Y", strtotime($tgl));
        break;
        case '8':
          return "Ags ".date("Y", strtotime($tgl));
        break;
        case '9':
          return "Sep ".date("Y", strtotime($tgl));
        break;
        case '10':
          return "Okt ".date("Y", strtotime($tgl));
        break;
        case '11':
          return "Nov ".date("Y", strtotime($tgl));
        break;
        case '12':
          return "Des ".date("Y", strtotime($tgl));
        break;
      }
    }
  }
?>
      <!-- End Fungsi Cepat -->
