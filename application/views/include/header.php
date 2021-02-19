<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- META SECTION -->
        <title>PIS</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <link rel="icon" href="/PIS/assets/images/logo-ggf.png" type="image/ico" />
        <!-- END META SECTION -->

        <!-- CSS INCLUDE -->
        <link rel="stylesheet" type="text/css" id="theme" href="/PIS/assets/css/theme-white.css"/>
        <!-- EOF CSS INCLUDE -->

        <style>
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
            height: auto;
          }

          /* Caption of Modal Image */
          #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
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
        </style>

    </head>
    <body style="font-family:arial;">
      <!-- START JQUERY -->
      <script type="text/javascript" src="/PIS/assets/js/plugins/jquery/jquery.min.js"></script>
      <script type="text/javascript" src="/PIS/assets/js/plugins/jquery/jquery-ui.min.js"></script>
      <script type="text/javascript" src="/PIS/assets/js/plugins/bootstrap/bootstrap.min.js"></script>
      <script type='text/javascript' src="/PIS/assets/js/chart/Chart.min.js"></script>
      <script type='text/javascript' src="/PIS/assets/js/chart/utils.js"></script>

      <!-- END JQUERY -->

<script>
function hide_tr(name){
    $('#'+name).hide();
}
</script>
      <!-- Start Fungsi Cepat -->
<?php
  function angka_ribuan($angka){
    $hasil = number_format($angka,0,',','.');
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

  function format_bln($tgl){
    if($tgl == NULL){
      return "-";
    }
    else{
      switch (date("n", strtotime($tgl))) {
        case '1':
          return "Januari ".date("Y", strtotime($tgl));
        break;
        case '2':
          return "Februari ".date("Y", strtotime($tgl));
        break;
        case '3':
          return "Maret ".date("Y", strtotime($tgl));
        break;
        case '4':
          return "April ".date("Y", strtotime($tgl));
        break;
        case '5':
          return "Mei ".date("Y", strtotime($tgl));
        break;
        case '6':
          return "Juni ".date("Y", strtotime($tgl));
        break;
        case '7':
          return "Juli ".date("Y", strtotime($tgl));
        break;
        case '8':
          return "Agustus ".date("Y", strtotime($tgl));
        break;
        case '9':
          return "September ".date("Y", strtotime($tgl));
        break;
        case '10':
          return "Oktober ".date("Y", strtotime($tgl));
        break;
        case '11':
          return "November ".date("Y", strtotime($tgl));
        break;
        case '12':
          return "Desember ".date("Y", strtotime($tgl));
        break;
      }
    }
  }
?>
      <!-- End Fungsi Cepat -->
