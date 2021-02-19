<?php
  //Element constant 2019
  $real = array(
    'ZN01' => NULL,
    'ZN02' => NULL,
    'ZN03' => NULL,
    'ZN04' => NULL,
    'ZN05' => NULL,
    'ZN06' => NULL,
    'ZN07' => NULL,
    'ZN08' => NULL,
    'ZN09' => NULL,
    'ZN10' => NULL,
    'ZN11' => NULL,
    'ZN12' => NULL,
    'ZN13' => NULL,
    'ZN14' => NULL,
    'ZN15' => NULL
  );
  $forecast = array(
    'ZN01' => NULL,
    'ZN02' => NULL,
    'ZN03' => NULL,
    'ZN04' => NULL,
    'ZN05' => NULL,
    'ZN06' => NULL,
    'ZN07' => NULL,
    'ZN08' => NULL,
    'ZN09' => NULL,
    'ZN10' => NULL,
    'ZN11' => NULL,
    'ZN12' => NULL,
    'ZN13' => NULL,
    'ZN14' => NULL,
    'ZN15' => NULL
  );
  //Real
  foreach ($real_forecast as $ec) {
    $real[$ec->code] += $ec->real_;
  }
  //Real
  foreach ($real_forecast as $ec) {
    $forecast[$ec->code] += $ec->forecast;
  }
  //HPP
  $hpp_rf_T0 = 0;
  foreach ($hpp_real_forecast_T0 as $ec) {
    $hpp_rf_T0 += $ec->real_ + $ec->forecast;
  }
  $hpp_rf_T1 = 0;
  foreach ($hpp_real_forecast_T1 as $ec) {
    $hpp_rf_T1 += $ec->real_ + $ec->forecast;
  }
?>
<!-- PAGE CONTENT -->
<div class="page-content">

  <!-- PAGE CONTENT WRAPPER -->
  <div class="page-content-wrap">

    <div class="row" style="margin-top:10px;">
      <div class="col-md-6">
        <div class="row" align="center">
          <div class="panel panel-default">
            <div class="panel-heading" style="background-color:#228B22;">
              <div class="panel-title-box" style="margin-top:10px;">
                <h2 style="color:white;" id="header_wilayah"><b><?php echo $wilayah['nama']; ?></b></h2>
              </div>
              <ul class="panel-controls" style="margin-top:10px;">
                <select class="form-control select" name="select_tahun_peta" id="select_tahun_peta" onchange="sort_tahun_peta()">
                  <option value="T">All</option>
                  <option value="T0"><?php echo date('Y', strtotime($YEAR_BASE['nilai'])); ?></option>
                  <option value="T1"><?php echo date('Y', strtotime($YEAR_BASE['nilai'])) + 1; ?></option>
                </select>
              </ul>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12" style="padding:0px;">
                  <div id="peta_all" style="width:100%;height:400px;"></div>
                  <div id="peta_t0" style="width:100%;height:400px;display:none;"></div>
                  <div id="peta_t1" style="width:100%;height:400px;display:none;"></div>
<script>
<?php
  $longlat = explode(", ", $coordinate_center['longlat']);
?>
  function initMap() {
    var map_all = new google.maps.Map(document.getElementById('peta_all'), {
      center:new google.maps.LatLng(<?php echo $longlat[0]; ?>, <?php echo $longlat[1]; ?>),
      zoom:12.5,
      mapTypeId: google.maps.MapTypeId.SATELLITE
    });
    var map_t0 = new google.maps.Map(document.getElementById('peta_t0'), {
      center:new google.maps.LatLng(<?php echo $longlat[0]; ?>, <?php echo $longlat[1]; ?>),
      zoom:12.5,
      mapTypeId: google.maps.MapTypeId.SATELLITE
    });
    var map_t1 = new google.maps.Map(document.getElementById('peta_t1'), {
      center:new google.maps.LatLng(<?php echo $longlat[0]; ?>, <?php echo $longlat[1]; ?>),
      zoom:12.5,
      mapTypeId: google.maps.MapTypeId.SATELLITE
    });

<?php
  //Tahun ALL
  foreach ($coordinate_all as $co) {
    switch ($co->category_rp_per_ha) {
      case 'Excellent':
        $warna_isi = "#00FF00";
        $aktif = 1;
        break;
      case 'Good':
        $warna_isi = "#FFFF00";
        $aktif = 1;
        break;
      case 'Poor':
        $warna_isi = "#FF0000";
        $aktif = 1;
        break;

      default:
        $warna_isi = "#0000FF";
        $aktif = 0;
        break;
    }

    switch (substr($co->kebun, 3, 1)) {
      case '1':
        $warna_border = "#FF4500";
        break;
      case '2':
        $warna_border = "#00FFFF";
        break;
      case '3':
        $warna_border = "#FF00FF";
        break;

      default:
        $warna_border = "#000000";
        break;
    }

    $longlat = explode(", ", $co->longlat);
    $long = sizeof($longlat) - 1;
?>
    var longlat<?php echo $co->lokasi; ?> = [
<?php
    for ($i = 0; $i < $long; $i++) {
      if($i % 2 == 0){
?>
      {lng: <?php echo $longlat[$i]; ?>,
<?php
      }
      else{
?>
      lat: <?php echo $longlat[$i]; ?>},
<?php
      }
    }
?>
    ];

    // Construct the polygon.
    var lok<?php echo $co->lokasi; ?> = new google.maps.Polygon({
      paths: longlat<?php echo $co->lokasi; ?>,
      strokeColor: '<?php echo $warna_border; ?>',
      strokeOpacity: 0.8,
      strokeWeight: 1,
      fillColor: '<?php echo $warna_isi; ?>',
      fillOpacity: 0.3
    });
    lok<?php echo $co->lokasi; ?>.setMap(map_all);
    google.maps.event.addListener(lok<?php echo $co->lokasi; ?>, "click", function(event) {
      var info<?php echo $co->lokasi; ?> = "<h2 style='color:black;'><?php echo $co->lokasi; ?></h2>" +
      "<div class='row'>" +
        "<table width='100%'>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>PG</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->pg; ?></b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Wilayah</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->wilayah; ?></b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Kebun</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->kebun; ?></b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Lokasi</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->lokasi; ?></b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Luas</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->luas; ?> Ha</b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Status</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->status; ?></b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Yield</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php if($co->yield == NULL) echo '-'; else echo round($co->yield); ?> Ton/Ha</b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Umur</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php if($co->umur == NULL) echo '-'; else echo round($co->umur); ?> Bulan</b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Category</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:<?php echo $warna_isi; ?>;padding-top:1px;padding-bottom:1px;'><b><?php if($co->category_rp_per_ha == NULL) echo '-'; else echo $co->category_rp_per_ha; ?></b></td>" +
          "</tr>" +
<?php
  if($co->foto != NULL){
?>
          "<tr>" +
            "<td colspan='3' style='color:black;padding-top:5px;padding-bottom:1px;' align='center'>" +
              "<img onclick='show_modal_show_foto(\"<?php echo $co->foto; ?>\")' src='<?php echo $co->foto; ?>' height='auto' width='150'>" +
            "</td>" +
          "</tr>" +
<?php
  }
?>
        "</table>" +
      "</div>";
<?php
  if($aktif == 1){
?>
      info<?php echo $co->lokasi; ?> += "<br>" +
      "<div class='row'>" +
        "<button type='button' class='btn btn-info btn-sm' onclick='detail_lokasi(\"<?php echo $co->lokasi; ?>\");'>Detail Lokasi</button>" +
      "</div>";
<?php
  }
?>
      iw<?php echo $co->lokasi; ?> = new google.maps.InfoWindow();
      iw<?php echo $co->lokasi; ?>.setContent(info<?php echo $co->lokasi; ?>);
      iw<?php echo $co->lokasi; ?>.setPosition(event.latLng);
      iw<?php echo $co->lokasi; ?>.open(map_all);
    });
    google.maps.event.addListener(map_all, 'click', function() {
      iw<?php echo $co->lokasi; ?>.close();
    });
<?php
  }
  //Tahun T0
  foreach ($coordinate_t0 as $co) {
    switch ($co->category_rp_per_ha) {
      case 'Excellent':
        $warna_isi = "#00FF00";
        $aktif = 1;
        break;
      case 'Good':
        $warna_isi = "#FFFF00";
        $aktif = 1;
        break;
      case 'Poor':
        $warna_isi = "#FF0000";
        $aktif = 1;
        break;

      default:
        $warna_isi = "#0000FF";
        $aktif = 0;
        break;
    }

    switch (substr($co->kebun, 3, 1)) {
      case '1':
        $warna_border = "#FF4500";
        break;
      case '2':
        $warna_border = "#00FFFF";
        break;
      case '3':
        $warna_border = "#FF00FF";
        break;

      default:
        $warna_border = "#000000";
        break;
    }

    $longlat = explode(", ", $co->longlat);
    $long = sizeof($longlat) - 1;
?>
    var longlat<?php echo $co->lokasi; ?> = [
<?php
    for ($i = 0; $i < $long; $i++) {
      if($i % 2 == 0){
?>
      {lng: <?php echo $longlat[$i]; ?>,
<?php
      }
      else{
?>
      lat: <?php echo $longlat[$i]; ?>},
<?php
      }
    }
?>
    ];

    // Construct the polygon.
    var lok<?php echo $co->lokasi; ?> = new google.maps.Polygon({
      paths: longlat<?php echo $co->lokasi; ?>,
      strokeColor: '<?php echo $warna_border; ?>',
      strokeOpacity: 0.8,
      strokeWeight: 1,
      fillColor: '<?php echo $warna_isi; ?>',
      fillOpacity: 0.3
    });
    lok<?php echo $co->lokasi; ?>.setMap(map_t0);
    google.maps.event.addListener(lok<?php echo $co->lokasi; ?>, "click", function(event) {
      var info<?php echo $co->lokasi; ?> = "<h2 style='color:black;'><?php echo $co->lokasi; ?></h2>" +
      "<div class='row'>" +
        "<table width='100%'>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>PG</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->pg; ?></b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Wilayah</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->wilayah; ?></b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Kebun</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->kebun; ?></b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Lokasi</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->lokasi; ?></b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Luas</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->luas; ?> Ha</b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Status</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->status; ?></b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Yield</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php if($co->yield == NULL) echo '-'; else echo round($co->yield); ?> Ton/Ha</b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Umur</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php if($co->umur == NULL) echo '-'; else echo round($co->umur); ?> Bulan</b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Category</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:<?php echo $warna_isi; ?>;padding-top:1px;padding-bottom:1px;'><b><?php if($co->category_rp_per_ha == NULL) echo '-'; else echo $co->category_rp_per_ha; ?></b></td>" +
          "</tr>" +
<?php
  if($co->foto != NULL){
?>
          "<tr>" +
            "<td colspan='3' style='color:black;padding-top:5px;padding-bottom:1px;' align='center'>" +
              "<img onclick='show_modal_show_foto(\"<?php echo $co->foto; ?>\")' src='<?php echo $co->foto; ?>' height='auto' width='150'>" +
            "</td>" +
          "</tr>" +
<?php
  }
?>
        "</table>" +
      "</div>";
<?php
  if($aktif == 1){
?>
      info<?php echo $co->lokasi; ?> += "<br>" +
      "<div class='row'>" +
        "<button type='button' class='btn btn-info btn-sm' onclick='detail_lokasi(\"<?php echo $co->lokasi; ?>\");'>Detail Lokasi</button>" +
      "</div>";
<?php
  }
?>
      iw<?php echo $co->lokasi; ?> = new google.maps.InfoWindow();
      iw<?php echo $co->lokasi; ?>.setContent(info<?php echo $co->lokasi; ?>);
      iw<?php echo $co->lokasi; ?>.setPosition(event.latLng);
      iw<?php echo $co->lokasi; ?>.open(map_t0);
    });
    google.maps.event.addListener(map_t0, 'click', function() {
      iw<?php echo $co->lokasi; ?>.close();
    });
<?php
  }
  //Tahun T1
  foreach ($coordinate_t1 as $co) {
    switch ($co->category_rp_per_ha) {
      case 'Excellent':
        $warna_isi = "#00FF00";
        $aktif = 1;
        break;
      case 'Good':
        $warna_isi = "#FFFF00";
        $aktif = 1;
        break;
      case 'Poor':
        $warna_isi = "#FF0000";
        $aktif = 1;
        break;

      default:
        $warna_isi = "#0000FF";
        $aktif = 0;
        break;
    }

    switch (substr($co->kebun, 3, 1)) {
      case '1':
        $warna_border = "#FF4500";
        break;
      case '2':
        $warna_border = "#00FFFF";
        break;
      case '3':
        $warna_border = "#FF00FF";
        break;

      default:
        $warna_border = "#000000";
        break;
    }

    $longlat = explode(", ", $co->longlat);
    $long = sizeof($longlat) - 1;
?>
    var longlat<?php echo $co->lokasi; ?> = [
<?php
    for ($i = 0; $i < $long; $i++) {
      if($i % 2 == 0){
?>
      {lng: <?php echo $longlat[$i]; ?>,
<?php
      }
      else{
?>
      lat: <?php echo $longlat[$i]; ?>},
<?php
      }
    }
?>
    ];

    // Construct the polygon.
    var lok<?php echo $co->lokasi; ?> = new google.maps.Polygon({
      paths: longlat<?php echo $co->lokasi; ?>,
      strokeColor: '<?php echo $warna_border; ?>',
      strokeOpacity: 0.8,
      strokeWeight: 1,
      fillColor: '<?php echo $warna_isi; ?>',
      fillOpacity: 0.3
    });
    lok<?php echo $co->lokasi; ?>.setMap(map_t1);
    google.maps.event.addListener(lok<?php echo $co->lokasi; ?>, "click", function(event) {
      var info<?php echo $co->lokasi; ?> = "<h2 style='color:black;'><?php echo $co->lokasi; ?></h2>" +
      "<div class='row'>" +
        "<table width='100%'>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>PG</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->pg; ?></b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Wilayah</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->wilayah; ?></b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Kebun</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->kebun; ?></b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Lokasi</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->lokasi; ?></b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Luas</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->luas; ?> Ha</b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Status</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->status; ?></b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Yield</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php if($co->yield == NULL) echo '-'; else echo round($co->yield); ?> Ton/Ha</b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Umur</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php if($co->umur == NULL) echo '-'; else echo round($co->umur); ?> Bulan</b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Category</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:<?php echo $warna_isi; ?>;padding-top:1px;padding-bottom:1px;'><b><?php if($co->category_rp_per_ha == NULL) echo '-'; else echo $co->category_rp_per_ha; ?></b></td>" +
          "</tr>" +
<?php
  if($co->foto != NULL){
?>
          "<tr>" +
            "<td colspan='3' style='color:black;padding-top:5px;padding-bottom:1px;' align='center'>" +
              "<img onclick='show_modal_show_foto(\"<?php echo $co->foto; ?>\")' src='<?php echo $co->foto; ?>' height='auto' width='150'>" +
            "</td>" +
          "</tr>" +
<?php
  }
?>
        "</table>" +
      "</div>";
<?php
  if($aktif == 1){
?>
      info<?php echo $co->lokasi; ?> += "<br>" +
      "<div class='row'>" +
        "<button type='button' class='btn btn-info btn-sm' onclick='detail_lokasi(\"<?php echo $co->lokasi; ?>\");'>Detail Lokasi</button>" +
      "</div>";
<?php
  }
?>
      iw<?php echo $co->lokasi; ?> = new google.maps.InfoWindow();
      iw<?php echo $co->lokasi; ?>.setContent(info<?php echo $co->lokasi; ?>);
      iw<?php echo $co->lokasi; ?>.setPosition(event.latLng);
      iw<?php echo $co->lokasi; ?>.open(map_t1);
    });
    google.maps.event.addListener(map_t1, 'click', function() {
      iw<?php echo $co->lokasi; ?>.close();
    });
<?php
  }
?>
    if(navigator.geolocation){
      navigator.geolocation.getCurrentPosition(function(p){
        var cp_all = new google.maps.Marker({
          position:{
            lat: p.coords.latitude,
            lng: p.coords.longitude
          },
          map: map_all,
          icon: '/PIS/assets/images/marker.png'
        });
        var cp_t1 = new google.maps.Marker({
          position:{
            lat: p.coords.latitude,
            lng: p.coords.longitude
          },
          map: map_t0,
          icon: '/PIS/assets/images/marker.png'
        });
        var cp_t1 = new google.maps.Marker({
          position:{
            lat: p.coords.latitude,
            lng: p.coords.longitude
          },
          map: map_t1,
          icon: '/PIS/assets/images/marker.png'
        });
      });
    }
  }

  window.initialize = initMap;
</script>
                </div>
              </div>
            </div>
          </div>
        </div>

      <div id="show_profile">
      </div>

        <div class="row">
          <div class="panel panel-default tabs">
            <ul class="nav nav-tabs" role="tablist">
              <li class="active"><a href="#tab-total_cost" role="tab" data-toggle="tab">Total</a></li>
              <li><a href="#tab-standart_total_cost" role="tab" data-toggle="tab">Standart</a></li>
            </ul>
            <div class="panel-body tab-content">

              <div class="tab-pane active" id="tab-total_cost">
                <div class="col-md-5">
                  <div class="chart-holder">
                    <canvas id="diagram_total_cost" height="280px"></canvas>
<?php
  // if($tahun != 'T0'){
    $group_cost['Varian_Cost'] = $total_real_group - ($group_cost['Labour'] + $group_cost['Charge'] + $group_cost['Material'] + $group_cost['Bibit']);
  // }
  // else{
  //   $group_cost['Varian_Cost'] = 0;
  // }
  $group_cost_total = $group_cost['Labour'] + $group_cost['Charge'] + $group_cost['Material'] + $group_cost['Bibit'] + $group_cost['Varian_Cost'];
  if($group_cost_total != NULL){
    $group_cost_labour = round($group_cost['Labour'] / $group_cost_total * 100, 2);
    $group_cost_charge = round($group_cost['Charge'] / $group_cost_total * 100, 2);
    $group_cost_material = round($group_cost['Material'] / $group_cost_total * 100, 2);
    $group_cost_bibit = round($group_cost['Bibit'] / $group_cost_total * 100, 2);
    $group_cost_varian_cost = round($group_cost['Varian_Cost'] / $group_cost_total * 100, 2);
  }
  else{
    $group_cost_labour = round(0 * 100, 2);
    $group_cost_charge = round(0 * 100, 2);
    $group_cost_material = round(0 * 100, 2);
    $group_cost_bibit = round(0 * 100, 2);
    $group_cost_varian_cost = round(0 * 100, 2);
  }
  $gct = $group_cost_labour.', '.$group_cost_charge.', '.$group_cost_material.', '.$group_cost_bibit.', '.$group_cost_varian_cost;
?>
<script>
  var config_total_cost = {
    type: 'doughnut',
    data: {
      datasets: [{
        data: [
          <?php echo $gct; ?>
        ],
        backgroundColor: [
          '#1E90FF',
          '#D2691E',
          '#696969',
          '#FF8C00',
          '#FF0000',
        ],
        label: 'Cost and Production'
      }],
      labels: [
        'Labour',
        'Charge',
        'Material',
        'Bibit',
        'Varian Cost',
      ]
    },
    options: {
      responsive: true,
      legend: {
        position: 'bottom',
        labels: {
          usePointStyle: true,
        }
      },
      tooltips: {
        mode: 'index',
        intersect: false,
        callbacks: {
          label: function(tooltipItem, data) {
            var label = data.labels[tooltipItem.index];
            var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            return label + ' : ' + val + '%';
          }
        }
      },
      title: {
        display: true,
        text: 'Total Cost',
        fontSize: 16,
        fontFamily: 'arial',
      },
      animation: {
        animateScale: true,
        animateRotate: true
      }
    }
  };
</script>
                  </div>
                </div>

                <div class="col-md-7">
                  <div class="row">
                    <div class="col-md-7" style="padding-top:2px;padding-bottom:2px;padding-right:2px;padding-left:0px;">
                      <table class="table table-actions">
                        <tbody>
                          <tr style="background-color: #00FFFF;">
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align="center" colspan="2">
                              <b>Total Cost (Rp/Ha)</b>
                            </td>
                          </tr>
                          <tr style="background-color: #F5F5F5;">
                            <td style="color:black;padding-top:0px;padding-bottom:0px;">Labour</td>
                            <td align="right" style="color:black;padding-top:0px;padding-bottom:0px;">
<?php
  $biaya_total = 0;
  if($group_cost['luas'] != NULL){
    echo angka_ribuan($group_cost['Labour'] / $group_cost['luas']);
    $biaya_total += $group_cost['Labour'] / $group_cost['luas'];
  }
  else{
    echo "-";
    $biaya_total += 0;
  }
?>
                            </td>
                          </tr>
                          <tr>
                            <td style="color:black;padding-top:0px;padding-bottom:0px;">Charge</td>
                            <td align="right" style="color:black;padding-top:0px;padding-bottom:0px;">
<?php
  if($group_cost['luas'] != NULL){
    echo angka_ribuan($group_cost['Charge'] / $group_cost['luas']);
    $biaya_total += $group_cost['Charge'] / $group_cost['luas'];
  }
  else{
    echo "-";
    $biaya_total += 0;
  }
?>
                            </td>
                          </tr>
                          <tr style="background-color: #F5F5F5;">
                            <td style="color:black;padding-top:0px;padding-bottom:0px;">Material</td>
                            <td align="right" style="color:black;padding-top:0px;padding-bottom:0px;">
<?php
  if($group_cost['luas'] != NULL){
    echo angka_ribuan($group_cost['Material'] / $group_cost['luas']);
    $biaya_total += $group_cost['Material'] / $group_cost['luas'];
  }
  else{
    echo "-";
    $biaya_total += 0;
  }
?>
                          </td>
                        </tr>
                        <tr>
                          <td style="color:black;padding-top:0px;padding-bottom:0px;">Bibit</td>
                          <td align="right" style="color:black;padding-top:0px;padding-bottom:0px;">
<?php
  if($group_cost['luas'] != NULL){
    echo angka_ribuan($group_cost['Bibit'] / $group_cost['luas']);
    $biaya_total += $group_cost['Bibit'] / $group_cost['luas'];
  }
  else{
    echo "-";
    $biaya_total += 0;
  }
?>
                              </td>
                          </tr>
                          <tr style="background-color: #F5F5F5;">
                            <td style="color:black;padding-top:0px;padding-bottom:0px;">Varian Cost</td>
                            <td align="right" style="color:black;padding-top:0px;padding-bottom:0px;">
  <?php
    if($group_cost['luas'] != NULL){
      echo angka_ribuan($group_cost['Varian_Cost'] / $group_cost['luas']);
      $biaya_total += $group_cost['Varian_Cost'] / $group_cost['luas'];
    }
    else{
      echo "-";
      $biaya_total += 0;
    }
  ?>
                              </td>
                            </tr>
                        </tbody>
                        <tfoot>
                          <tr style="background-color: #DCDCDC;">
                            <td style="color:black;padding-top:0px;padding-bottom:0px;"><b>Total</b></td>
                            <td align="right" style="color:black;padding-top:0px;padding-bottom:0px;"><b><?php echo angka_ribuan($biaya_total); ?></b></td>
                          </tr>
                        </tfoot>
                      </table>
                    </div>

                    <div class="col-md-5" style="padding-top:2px;padding-bottom:2px;padding-right:0px;padding-left:2px;">
                      <table class="table table-actions">
                        <tbody>
                          <tr style="background-color: #DC143C;">
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align="center" colspan="2">
                              <b>Total Cost (Rp/Kg)</b>
                            </td>
                          </tr>
                          <tr style="background-color: #F5F5F5;">
                            <td style="color:black;padding-top:0px;padding-bottom:0px;">Labour</td>
                            <td align="right" style="color:black;padding-top:0px;padding-bottom:0px;">
<?php
  $biaya_total = 0;
  if($group_cost['tonase'] != NULL){
    echo angka_ribuan($group_cost['Labour'] / $group_cost['tonase'] / 1000);
    $biaya_total += $group_cost['Labour'] / $group_cost['tonase'] / 1000;
  }
  else{
    echo "-";
    $biaya_total += 0;
  }
?>
                            </td>
                          </tr>
                          <tr>
                            <td style="color:black;padding-top:0px;padding-bottom:0px;">Charge</td>
                            <td align="right" style="color:black;padding-top:0px;padding-bottom:0px;">
<?php
  if($group_cost['tonase'] != NULL){
    echo angka_ribuan($group_cost['Charge'] / $group_cost['tonase'] / 1000);
    $biaya_total += $group_cost['Charge'] / $group_cost['tonase'] / 1000;
  }
  else{
    echo "-";
    $biaya_total += 0;
  }
?>
                            </td>
                          </tr>
                          <tr style="background-color: #F5F5F5;">
                            <td style="color:black;padding-top:0px;padding-bottom:0px;">Material</td>
                            <td align="right" style="color:black;padding-top:0px;padding-bottom:0px;">
<?php
    if($group_cost['tonase'] != NULL){
      echo angka_ribuan($group_cost['Material'] / $group_cost['tonase'] / 1000);
      $biaya_total += $group_cost['Material'] / $group_cost['tonase'] / 1000;
    }
    else{
      echo "-";
      $biaya_total += 0;
    }
?>
                          </td>
                        </tr>
                        <tr>
                          <td style="color:black;padding-top:0px;padding-bottom:0px;">Bibit</td>
                          <td align="right" style="color:black;padding-top:0px;padding-bottom:0px;">
<?php
  if($group_cost['tonase'] != NULL){
    echo angka_ribuan($group_cost['Bibit'] / $group_cost['tonase'] / 1000);
    $biaya_total += $group_cost['Bibit'] / $group_cost['tonase'] / 1000;
  }
  else{
    echo "-";
    $biaya_total += 0;
  }
?>
                              </td>
                          </tr>
                          <tr style="background-color: #F5F5F5;">
                            <td style="color:black;padding-top:0px;padding-bottom:0px;">Varian Cost</td>
                            <td align="right" style="color:black;padding-top:0px;padding-bottom:0px;">
  <?php
    if($group_cost['tonase'] != NULL){
      echo angka_ribuan($group_cost['Varian_Cost'] / $group_cost['tonase'] / 1000);
      $biaya_total += $group_cost['Varian_Cost'] / $group_cost['tonase'] / 1000;
    }
    else{
      echo "-";
      $biaya_total += 0;
    }
  ?>
                              </td>
                            </tr>
                        </tbody>
                        <tfoot>
                          <tr style="background-color: #DCDCDC;">
                            <td style="color:black;padding-top:0px;padding-bottom:0px;"><b>Total</b></td>
                            <td align="right" style="color:black;padding-top:0px;padding-bottom:0px;"><b><?php echo angka_ribuan($biaya_total); ?></b></td>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>

                </div>
              </div>

              <div class="tab-pane" id="tab-standart_total_cost">
                <div class="col-md-5">
                  <div class="chart-holder">
                    <canvas id="diagram_std_total_cost" height="280px"></canvas>
<?php
  $std_group_cost_total = $std_group_cost['total']['rp_per_ha'];
  if($group_cost_total != NULL){
    $std_group_cost_labour = round($std_group_cost['labour']['rp_per_ha'] / $std_group_cost['total']['rp_per_ha'] * 100);
    $std_group_cost_charge = round($std_group_cost['charge']['rp_per_ha'] / $std_group_cost['total']['rp_per_ha'] * 100);
    $std_group_cost_material = round($std_group_cost['material']['rp_per_ha'] / $std_group_cost['total']['rp_per_ha'] * 100);
    $std_group_cost_bibit = round($std_group_cost['bibit']['rp_per_ha'] / $std_group_cost['total']['rp_per_ha'] * 100);
    $std_group_cost_alokasi = round($std_group_cost['alokasi']['rp_per_ha'] / $std_group_cost['total']['rp_per_ha'] * 100);
  }
  else{
    $std_group_cost_labour = 0;
    $std_group_cost_charge = 0;
    $std_group_cost_material = 0;
    $std_group_cost_bibit = 0;
    $std_group_cost_alokasi = 0;
  }
  $gct = $std_group_cost_labour.', '.$std_group_cost_charge.', '.$std_group_cost_material.', '.$std_group_cost_bibit.', '.$std_group_cost_alokasi;
?>
<script>
  var config_std_total_cost = {
    type: 'doughnut',
    data: {
      datasets: [{
        data: [
          <?php echo $gct; ?>
        ],
        backgroundColor: [
          '#1E90FF',
          '#D2691E',
          '#696969',
          '#FF8C00',
          '#FF0000',
        ],
        label: 'Cost and Production'
      }],
      labels: [
        'Labour',
        'Charge',
        'Material',
        'Bibit',
        'Varian Cost',
      ]
    },
    options: {
      responsive: true,
      tooltips: {
        mode: 'index',
        intersect: false,
        callbacks: {
          label: function(tooltipItem, data) {
            var label = data.labels[tooltipItem.index];
            var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            return label + ' : ' + val + '%';
          }
        }
      },
      legend: {
        position: 'bottom',
        labels: {
          usePointStyle: true,
        }
      },
      title: {
        display: true,
        text: 'Total Cost',
        fontSize: 16,
        fontFamily: 'arial',
      },
      animation: {
        animateScale: true,
        animateRotate: true
      }
    }
  };
</script>
                  </div>
                </div>

                <div class="col-md-7">
                  <div class="row">
                    <div class="col-md-7" style="padding-top:2px;padding-bottom:2px;padding-right:2px;padding-left:0px;">
                      <table class="table table-actions">
                        <tbody>
                          <tr style="background-color: #00FFFF;">
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align="center" colspan="2">
                              <b>Budget Total Cost (Rp/Ha)</b>
                            </td>
                          </tr>
                          <tr style="background-color: #F5F5F5;">
                            <td style="color:black;padding-top:0px;padding-bottom:0px;">Labour</td>
                            <td align="right" style="color:black;padding-top:0px;padding-bottom:0px;"><?php echo angka_ribuan($std_group_cost['labour']['rp_per_ha']); ?></td>
                          </tr>
                          <tr>
                            <td style="color:black;padding-top:0px;padding-bottom:0px;">Charge</td>
                            <td align="right" style="color:black;padding-top:0px;padding-bottom:0px;"><?php echo angka_ribuan($std_group_cost['charge']['rp_per_ha']); ?></td>
                          </tr>
                          <tr style="background-color: #F5F5F5;">
                            <td style="color:black;padding-top:0px;padding-bottom:0px;">Material</td>
                            <td align="right" style="color:black;padding-top:0px;padding-bottom:0px;"><?php echo angka_ribuan($std_group_cost['material']['rp_per_ha']); ?></td>
                          </tr>
                          <tr>
                            <td style="color:black;padding-top:0px;padding-bottom:0px;">Bibit</td>
                            <td align="right" style="color:black;padding-top:0px;padding-bottom:0px;"><?php echo angka_ribuan($std_group_cost['bibit']['rp_per_ha']); ?></td>
                          </tr>
                          <tr style="background-color: #F5F5F5;">
                            <td style="color:black;padding-top:0px;padding-bottom:0px;">Varian Cost</td>
                            <td align="right" style="color:black;padding-top:0px;padding-bottom:0px;"><?php echo angka_ribuan($std_group_cost['alokasi']['rp_per_ha']); ?></td>
                          </tr>
                        </tbody>
                        <tfoot>
                          <tr style="background-color: #DCDCDC;">
                            <td style="color:black;padding-top:0px;padding-bottom:0px;"><b>Total</b></td>
                            <td align="right" style="color:black;padding-top:0px;padding-bottom:0px;"><b><?php echo angka_ribuan($std_group_cost['total']['rp_per_ha']); ?></b></td>
                          </tr>
                        </tfoot>
                      </table>
                    </div>

                    <div class="col-md-5" style="padding-top:2px;padding-bottom:2px;padding-right:0px;padding-left:2px;">
                      <table class="table table-actions">
                        <tbody>
                          <tr style="background-color: #DC143C;">
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align="center" colspan="2">
                              <b>Budget Total Cost (Rp/Kg)</b>
                            </td>
                          </tr>
                          <tr style="background-color: #F5F5F5;">
                            <td style="color:black;padding-top:0px;padding-bottom:0px;">Labour</td>
                            <td align="right" style="color:black;padding-top:0px;padding-bottom:0px;"><?php echo angka_ribuan($std_group_cost['labour']['rp_per_kg']); ?></td>
                          </tr>
                          <tr>
                            <td style="color:black;padding-top:0px;padding-bottom:0px;">Charge</td>
                            <td align="right" style="color:black;padding-top:0px;padding-bottom:0px;"><?php echo angka_ribuan($std_group_cost['charge']['rp_per_kg']); ?></td>
                          </tr>
                          <tr style="background-color: #F5F5F5;">
                            <td style="color:black;padding-top:0px;padding-bottom:0px;">Material</td>
                            <td align="right" style="color:black;padding-top:0px;padding-bottom:0px;"><?php echo angka_ribuan($std_group_cost['material']['rp_per_kg']); ?></td>
                          </tr>
                          <tr>
                            <td style="color:black;padding-top:0px;padding-bottom:0px;">Bibit</td>
                            <td align="right" style="color:black;padding-top:0px;padding-bottom:0px;"><?php echo angka_ribuan($std_group_cost['bibit']['rp_per_kg']); ?></td>
                          </tr>
                          <tr style="background-color: #F5F5F5;">
                            <td style="color:black;padding-top:0px;padding-bottom:0px;">Varian Cost</td>
                            <td align="right" style="color:black;padding-top:0px;padding-bottom:0px;"><?php echo angka_ribuan($std_group_cost['alokasi']['rp_per_kg']); ?></td>
                          </tr>
                        </tbody>
                        <tfoot>
                          <tr style="background-color: #DCDCDC;">
                            <td style="color:black;padding-top:0px;padding-bottom:0px;"><b>Total</b></td>
                            <td align="right" style="color:black;padding-top:0px;padding-bottom:0px;"><b><?php echo angka_ribuan($std_group_cost['total']['rp_per_kg']); ?></b></td>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>

                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="div-leptop" id='show_infomasi'>
          <div class="col-md-2">
            <div id='profile' class="panel panel-default" style="height: 350px;">
              <div class="panel-heading" style="background-color:#FF4500;">
                <div class="panel-title-box">
                  <h3 style="color:white;">Profile <?php echo $wilayah['nama']; ?></h3>
                </div>
              </div>
              <div class="panel-body padding" align="center">
                <b>
                  KEPALA WILAYAH<br /><?php echo $wilayah['kepala_wilayah']; ?><br /><br />
                  KASIE KEBUN 1<br /><?php echo $wilayah['kasie_kebun1']; ?><br /><br />
                  KASIE KEBUN 2<br /><?php echo $wilayah['kasie_kebun2']; ?><br /><br />
                  KASIE KEBUN 3<br /><?php echo $wilayah['kasie_kebun3']; ?><br /><br />
                </b>
<?php
  if($_SESSION['crud'] != '3'){
?>
                <div class='col-md-6' style="padding-left:0px;padding-right:0px;padding-top:0px;padding-bottom:0px;">
                  <button class="btn btn-default btn-block" onclick="main_menu();"><i class="fa fa-home"></i> Home</button>
                </div>
                <div class='col-md-6' style="padding-left:0px;padding-right:0px;padding-top:0px;padding-bottom:0px;">
                  <button class="btn btn-default btn-block" onclick="profile();"><i class="fa fa-user"></i> Profile</button>
                </div>
                <div class='col-md-6' style="padding-left:0px;padding-right:0px;padding-top:0px;padding-bottom:0px;">
                  <button class="btn btn-default btn-block" onclick="perlocation();"><i class="fa fa-list"></i> PerLocation</button>
                </div>
                <div class='col-md-6' style="padding-left:0px;padding-right:0px;padding-top:0px;padding-bottom:0px;">
                  <select class="form-control select" name="select_pg" id="select_pg" onchange="javascript:pindah_pg();">
<?php
    foreach($pg_all as $pga){
      if($pga->code == $wilayah['plantation_group']){
?>
                    <option value="<?php echo $pga->code; ?>" style="color:black;" selected><?php echo $pga->nama; ?></option>
<?php
      }
      else{
?>
                    <option value="<?php echo $pga->code; ?>" style="color:black;"><?php echo $pga->nama; ?></option>
<?php
      }
    }
?>
                  </select>
                </div>
<?php
  }
  if($_SESSION['crud'] == '3'){
?>
                <div class='col-md-6' style="padding-left:0px;padding-right:0px;padding-top:0px;padding-bottom:0px;">
                  <button class="btn btn-default btn-block" onclick="main_menu();"><i class="fa fa-home"></i> Home</button>
                </div>
                <div class='col-md-6' style="padding-left:0px;padding-right:0px;padding-top:0px;padding-bottom:0px;">
                  <button class="btn btn-default btn-block" onclick="profile();"><i class="fa fa-user"></i> Profile</button>
                </div>
                <button class="btn btn-default btn-block" onclick="perlocation();"><i class="fa fa-list"></i> PerLocation</button>
<?php
  }
?>
                <div class='col-md-6' style="padding-left:0px;padding-right:0px;padding-top:0px;padding-bottom:0px;">
                  <select class="form-control select" name="select_wilayah" id="select_wilayah" onchange="javascript:pindah_wilayah();">
<?php
  if($_SESSION['crud'] != '3'){
?>
                    <option value="0" style="color:black;">Semua Wilayah</option>
<?php
  }
  foreach($wilayah_all as $w){
    if($w->code == $wilayah['code']){
?>
                    <option value="<?php echo $w->code; ?>" style="color:black;" selected><?php echo $w->nama; ?></option>
<?php
    }
    else{
?>
                    <option value="<?php echo $w->code; ?>" style="color:black;"><?php echo $w->nama; ?></option>
<?php
    }
  }
?>
                  </select>
                </div>
                <div class='col-md-6' style="padding-left:0px;padding-right:0px;padding-top:0px;padding-bottom:0px;">
                  <select class="form-control select" name="select_lokasi" id="select_lokasi" onchange="javascript:pindah_lokasi();" data-live-search="true">
                  <option value="0" style="color:black;">Semua Lokasi</option>
<?php
  $cek = '';
  foreach($lokasi_all as $l){
    if($l->category == 'Excellent'){
      $bgcolor_lokasi = '#00FF00';
      // $cek = '(E)';
    }
    else if($l->category == 'Good'){
      $bgcolor_lokasi = '#FFFF00';
      // $cek = '(G)';
    }
    else{
      $bgcolor_lokasi = '#FF0000';
      // $cek = '(P)';
    }
?>
                  <option value="<?php echo $l->lokasi_aktif; ?>" style="color:black;background-color:<?php echo $bgcolor_lokasi; ?>;"><?php echo $l->lokasi_aktif; ?>&emsp;&emsp;&emsp;<?php echo $cek; ?></option>
<?php
  }
?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4" align="center">
            <div class="panel panel-default">
              <div class="panel-heading" style="background-color:#FF4500;">
                <div class="panel-title-box">
                  <h3 style="color:white;">Produksi
<?php
  if($tahun == 'T0'){
    echo substr($YEAR_BASE['nilai'], 0, 4);
  }
  else{
    echo substr($YEAR_BASE['nilai'], 0, 4) + 1;
  }
?>
                  </h3>
                </div>
              </div>
              <div class="panel-body padding">
                <div class="row">
                  <div class="col-md-6">
                    <div class="widget widget-info">
                        <div class="widget-title">Luas Panen</div>
                        <br />
                        <br />
                        <div class="widget-tiny-int"><b>
<?php
    echo round($luas_tonase['NSFC']['luas'], 2);
    $luas_fc = $luas_tonase['NSFC']['luas'];
?>
                         Ha (FC)</b></div>
                         <div class="widget-tiny-int"><b>
 <?php
     echo round($luas_tonase['NSSC']['luas'], 2);
     $luas_sc = $luas_tonase['NSSC']['luas'];
 ?>
                          Ha (SC)</b></div>
                          <div class="widget-tiny-int"><b>
  <?php
      echo round($luas_tonase['NSFC']['luas'] + $luas_tonase['NSSC']['luas'], 2);
      $luas_total = $luas_tonase['NSFC']['luas'] + $luas_tonase['NSSC']['luas'];
  ?>
                           Ha (NS)</b></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="widget widget-info">
                        <div class="widget-title">Produksi Tonase</div>
                        <br />
                        <br />
                        <div class="widget-tiny-int"><b>
<?php
    echo angka_ribuan($luas_tonase['NSFC']['tonase']);
    $tonase_fc = $luas_tonase['NSFC']['tonase'];
?>
                         Ton (FC)</b></div>
                         <div class="widget-tiny-int"><b>
 <?php
     echo angka_ribuan($luas_tonase['NSSC']['tonase']);
     $tonase_sc = $luas_tonase['NSSC']['tonase'];
 ?>
                          Ton (SC)</b></div>
                          <div class="widget-tiny-int"><b>
  <?php
      echo angka_ribuan($luas_tonase['NSFC']['tonase'] + $luas_tonase['NSSC']['tonase']);
      $tonase_total = $luas_tonase['NSFC']['tonase'] + $luas_tonase['NSSC']['tonase'];
  ?>
                           Ton (NS)</b></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="widget widget-info">
                        <div class="widget-title">Yield</div>
                        <br />
                        <br />
                        <div class="widget-tiny-int"><b><?php if($tonase_fc != 0) echo round($tonase_fc / $luas_fc, 2); else echo 0; ?> Ton/Ha (FC)</b></div>
                        <div class="widget-tiny-int"><b><?php if($tonase_sc != 0) echo round($tonase_sc / $luas_sc, 2); else echo 0; ?> Ton/Ha (RC)</b></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="widget widget-info">
                        <div class="widget-title">Avg. Populasi Panen</div>
                        <br />
                        <br />
                        <div class="widget-int"><?php echo angka_ribuan($populasi_tanam['populasi_tanam']); ?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="panel panel-default tabs">
            <ul class="nav nav-tabs" role="tablist">
<?php
  if(isset($tab3)){
    $active_tab1 = '';
    $active_tab3 = 'active';
  }
  else{
    $active_tab1 = 'active';
    $active_tab3 = '';
  }
?>
              <li class="<?php echo $active_tab1; ?>"><a href="#tab-first" role="tab" data-toggle="tab">Summary 1</a></li>
              <li><a href="#tab-second" role="tab" data-toggle="tab">Summary 2</a></li>
              <li class="<?php echo $active_tab3; ?>"><a href="#tab-third" role="tab" data-toggle="tab">Raport</a></li>
            </ul>
            <div class="panel-body tab-content">
              <div class="tab-pane <?php echo $active_tab1; ?>" id="tab-first">

                <div class="row">
                  <div class="col-md-4">
                    <div class="panel panel-default">
                      <div class="panel-heading" style="background-color:#0000FF;">
                        <div class="panel-title-box">
                          <h3 style="color:white;">Performance</h3>
                          <span style="color:white;"><b><?php echo $wilayah['code']; ?></b></span>
                        </div>
                        <ul class="panel-controls" style="margin-top: 2px;width:50%;">
                          <select class="form-control select" name="select_satuan" id="select_satuan" onchange="sort_performance()">
                            <option value="1">Rp/Ha</option>
                            <option value="2">Rp/Kg</option>
                          </select>
                        </ul>
                      </div>
                      <div class="panel-body padding">
                        <div class="chart-holder">
<?php
  //All
  $total_performance = $performance['Total'];
  $excellent_rp_per_ha = round(($performance['Excellent_rp_per_ha'] / $total_performance) * 100, 2);
  $good_rp_per_ha = round(($performance['Good_rp_per_ha'] / $total_performance) * 100, 2);
  $poor_rp_per_ha = round(($performance['Poor_rp_per_ha'] / $total_performance) * 100, 2);
  $performance_rp_per_ha = $excellent_rp_per_ha.', '.$good_rp_per_ha.', '.$poor_rp_per_ha;

  $excellent_rp_per_kg = round(($performance['Excellent_rp_per_kg'] / $total_performance) * 100, 2);
  $good_rp_per_kg = round(($performance['Good_rp_per_kg'] / $total_performance) * 100, 2);
  $poor_rp_per_kg = round(($performance['Poor_rp_per_kg'] / $total_performance) * 100, 2);
  $performance_rp_per_kg = $excellent_rp_per_kg.', '.$good_rp_per_kg.', '.$poor_rp_per_kg;

  //T0
  $total_performance_t0 = $performance_t0['Total'];
  if($total_performance_t0 != 0){
    $excellent_rp_per_ha_t0 = round(($performance_t0['Excellent_rp_per_ha'] / $total_performance_t0) * 100, 2);
    $good_rp_per_ha_t0 = round(($performance_t0['Good_rp_per_ha'] / $total_performance_t0) * 100, 2);
    $poor_rp_per_ha_t0 = round(($performance_t0['Poor_rp_per_ha'] / $total_performance_t0) * 100, 2);
    $performance_rp_per_ha_t0 = $excellent_rp_per_ha_t0.', '.$good_rp_per_ha_t0.', '.$poor_rp_per_ha_t0;

    $excellent_rp_per_kg_t0 = round(($performance_t0['Excellent_rp_per_kg'] / $total_performance_t0) * 100, 2);
    $good_rp_per_kg_t0 = round(($performance_t0['Good_rp_per_kg'] / $total_performance_t0) * 100, 2);
    $poor_rp_per_kg_t0 = round(($performance_t0['Poor_rp_per_kg'] / $total_performance_t0) * 100, 2);
    $performance_rp_per_kg_t0 = $excellent_rp_per_kg_t0.', '.$good_rp_per_kg_t0.', '.$poor_rp_per_kg_t0;
  }
  else{
    $excellent_rp_per_ha_t0 = round(0, 2);
    $good_rp_per_ha_t0 = round(0, 2);
    $poor_rp_per_ha_t0 = round(0, 2);
    $performance_rp_per_ha_t0 = $excellent_rp_per_ha_t0.', '.$good_rp_per_ha_t0.', '.$poor_rp_per_ha_t0;

    $excellent_rp_per_kg_t0 = round(0, 2);
    $good_rp_per_kg_t0 = round(0, 2);
    $poor_rp_per_kg_t0 = round(0, 2);
    $performance_rp_per_kg_t0 = $excellent_rp_per_kg_t0.', '.$good_rp_per_kg_t0.', '.$poor_rp_per_kg_t0;
  }

  //T1
  $total_performance_t1 = $performance_t1['Total'];
  $excellent_rp_per_ha_t1 = round(($performance_t1['Excellent_rp_per_ha'] / $total_performance_t1) * 100, 2);
  $good_rp_per_ha_t1 = round(($performance_t1['Good_rp_per_ha'] / $total_performance_t1) * 100, 2);
  $poor_rp_per_ha_t1 = round(($performance_t1['Poor_rp_per_ha'] / $total_performance_t1) * 100, 2);
  $performance_rp_per_ha_t1 = $excellent_rp_per_ha_t1.', '.$good_rp_per_ha_t1.', '.$poor_rp_per_ha_t1;

  $excellent_rp_per_kg_t1 = round(($performance_t1['Excellent_rp_per_kg'] / $total_performance_t1) * 100, 2);
  $good_rp_per_kg_t1 = round(($performance_t1['Good_rp_per_kg'] / $total_performance_t1) * 100, 2);
  $poor_rp_per_kg_t1 = round(($performance_t1['Poor_rp_per_kg'] / $total_performance_t1) * 100, 2);
  $performance_rp_per_kg_t1 = $excellent_rp_per_kg_t1.', '.$good_rp_per_kg_t1.', '.$poor_rp_per_kg_t1;
?>
                          <div style="display:none;" id="pie_total_ha">
                            <canvas id="diagram_performance_ha" height="280px"></canvas>
<script>
  var config_performance_ha = {
    type: 'pie',
    data: {
      datasets: [{
        data: [
          <?php echo $performance_rp_per_ha; ?>
        ],
        backgroundColor: [
          '#00FF00',
          '#FFA500',
          '#FF0000',
        ],
        label: 'Cost and Production'
      }],
      labels: [
        'Excellent',
        'Good',
        'Poor',
      ]
    },
    options: {
      responsive: true,
      tooltips: {
        mode: 'index',
        intersect: false,
        callbacks: {
          label: function(tooltipItem, data) {
            var label = data.labels[tooltipItem.index];
            var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            return label + ' : ' + val + '%';
          }
        }
      },
      legend: {
        position: 'bottom',
        labels: {
          usePointStyle: true,
        }
      },
      title: {
        display: false,
        text: 'Total Cost'
      },
      animation: {
        animateScale: true,
        animateRotate: true
      }
    }
  };
</script>
                          </div>
                          <div style="display:none;" id="pie_total_kg">
                            <canvas id="diagram_performance_kg" height="280px"></canvas>
<script>
  var config_performance_kg = {
    type: 'pie',
    data: {
      datasets: [{
        data: [
          <?php echo $performance_rp_per_kg; ?>
        ],
        backgroundColor: [
          '#00FF00',
          '#FFA500',
          '#FF0000',
        ],
        label: 'Cost and Production'
      }],
      labels: [
        'Excellent',
        'Good',
        'Poor',
      ]
    },
    options: {
      responsive: true,
      tooltips: {
        mode: 'index',
        intersect: false,
        callbacks: {
          label: function(tooltipItem, data) {
            var label = data.labels[tooltipItem.index];
            var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            return label + ' : ' + val + '%';
          }
        }
      },
      legend: {
        position: 'bottom',
        labels: {
          usePointStyle: true,
        }
      },
      title: {
        display: false,
        text: 'Total Cost'
      },
      animation: {
        animateScale: true,
        animateRotate: true
      }
    }
  };
</script>
                          </div>
                          <div style="display:none;" id="pie_total_ha_t0">
                            <canvas id="diagram_performance_ha_t0" height="280px"></canvas>
<script>
  var config_performance_ha_t0 = {
    type: 'pie',
    data: {
      datasets: [{
        data: [
          <?php echo $performance_rp_per_ha_t0; ?>
        ],
        backgroundColor: [
          '#00FF00',
          '#FFA500',
          '#FF0000',
        ],
        label: 'Cost and Production'
      }],
      labels: [
        'Excellent',
        'Good',
        'Poor',
      ]
    },
    options: {
      responsive: true,
      tooltips: {
        mode: 'index',
        intersect: false,
        callbacks: {
          label: function(tooltipItem, data) {
            var label = data.labels[tooltipItem.index];
            var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            return label + ' : ' + val + '%';
          }
        }
      },
      legend: {
        position: 'bottom',
        labels: {
          usePointStyle: true,
        }
      },
      title: {
        display: false,
        text: 'Total Cost'
      },
      animation: {
        animateScale: true,
        animateRotate: true
      }
    }
  };
</script>
                          </div>
                          <div style="display:none;" id="pie_total_kg_t0">
                            <canvas id="diagram_performance_kg_t0" height="280px"></canvas>
<script>
  var config_performance_kg_t0 = {
    type: 'pie',
    data: {
      datasets: [{
        data: [
          <?php echo $performance_rp_per_kg_t0; ?>
        ],
        backgroundColor: [
          '#00FF00',
          '#FFA500',
          '#FF0000',
        ],
        label: 'Cost and Production'
      }],
      labels: [
        'Excellent',
        'Good',
        'Poor',
      ]
    },
    options: {
      responsive: true,
      tooltips: {
        mode: 'index',
        intersect: false,
        callbacks: {
          label: function(tooltipItem, data) {
            var label = data.labels[tooltipItem.index];
            var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            return label + ' : ' + val + '%';
          }
        }
      },
      legend: {
        position: 'bottom',
        labels: {
          usePointStyle: true,
        }
      },
      title: {
        display: false,
        text: 'Total Cost'
      },
      animation: {
        animateScale: true,
        animateRotate: true
      }
    }
  };
</script>
                          </div>
                          <div style="display:none;" id="pie_total_ha_t1">
                            <canvas id="diagram_performance_ha_t1" height="280px"></canvas>
<script>
  var config_performance_ha_t1 = {
    type: 'pie',
    data: {
      datasets: [{
        data: [
          <?php echo $performance_rp_per_ha_t1; ?>
        ],
        backgroundColor: [
          '#00FF00',
          '#FFA500',
          '#FF0000',
        ],
        label: 'Cost and Production'
      }],
      labels: [
        'Excellent',
        'Good',
        'Poor',
      ]
    },
    options: {
      responsive: true,
      tooltips: {
        mode: 'index',
        intersect: false,
        callbacks: {
          label: function(tooltipItem, data) {
            var label = data.labels[tooltipItem.index];
            var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            return label + ' : ' + val + '%';
          }
        }
      },
      legend: {
        position: 'bottom',
        labels: {
          usePointStyle: true,
        }
      },
      title: {
        display: false,
        text: 'Total Cost'
      },
      animation: {
        animateScale: true,
        animateRotate: true
      }
    }
  };
</script>
                          </div>
                          <div style="display:none;" id="pie_total_kg_t1">
                            <canvas id="diagram_performance_kg_t1" height="280px"></canvas>
<script>
  var config_performance_kg_t1 = {
    type: 'pie',
    data: {
      datasets: [{
        data: [
          <?php echo $performance_rp_per_kg_t1; ?>
        ],
        backgroundColor: [
          '#00FF00',
          '#FFA500',
          '#FF0000',
        ],
        label: 'Cost and Production'
      }],
      labels: [
        'Excellent',
        'Good',
        'Poor',
      ]
    },
    options: {
      responsive: true,
      tooltips: {
        mode: 'index',
        intersect: false,
        callbacks: {
          label: function(tooltipItem, data) {
            var label = data.labels[tooltipItem.index];
            var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            return label + ' : ' + val + '%';
          }
        }
      },
      legend: {
        position: 'bottom',
        labels: {
          usePointStyle: true,
        }
      },
      title: {
        display: false,
        text: 'Total Cost'
      },
      animation: {
        animateScale: true,
        animateRotate: true
      }
    }
  };
</script>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                      <div class="panel panel-default">
                        <div class="panel-heading" style="background-color:#0000FF;">
                          <div class="panel-title-box">
                            <h3 style="color:white;">Proporsi Luas Panen</h3>
                          </div>
                        </div>
                        <div class="panel-body padding">
                          <div class="chart-holder">
                            <canvas id="diagram_proporsi_luas" height="280px"></canvas>
<?php
  $luas_nsfc = round(($luas_fc / $luas_total) * 100);
  $luas_nssc = round(($luas_sc / $luas_total) * 100);
  $proporsi_luas_panen = $luas_nsfc.', '.$luas_nssc;
?>
<script>
  var config_proporsi_luas = {
    type: 'pie',
    data: {
      datasets: [{
        data: [
          <?php echo $proporsi_luas_panen; ?>
        ],
        backgroundColor: [
          '#0000CD',
          '#8B4513',
        ],
        label: 'Cost and Production'
      }],
      labels: [
        'NSFC',
        'NSSC',
      ]
    },
    options: {
      responsive: true,
      tooltips: {
        mode: 'index',
        intersect: false,
        callbacks: {
          label: function(tooltipItem, data) {
            var label = data.labels[tooltipItem.index];
            var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            return label + ' : ' + val + '%';
          }
        }
      },
      legend: {
        position: 'bottom',
        labels: {
          usePointStyle: true,
        }
      },
      title: {
        display: false,
        text: 'Total Cost'
      },
      animation: {
        animateScale: true,
        animateRotate: true
      }
    }
  };
</script>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="panel panel-default">
                        <div class="panel-heading" style="background-color:#0000FF;">
                          <div class="panel-title-box">
                            <h3 style="color:white;">Kondisi Drainase</h3>
                          </div>
                        </div>
                        <div class="panel-body padding">
                          <div class="chart-holder">
                            <canvas id="diagram_kondisi_drainase" height="280px"></canvas>
<?php
  $kondisi_berat = round($kondisi_drainase['berat']['jumlah'] * 100);
  $kondisi_sedang = round($kondisi_drainase['sedang']['jumlah'] * 100);
  $kondisi_ringan = round($kondisi_drainase['ringan']['jumlah'] * 100);
  $kondisi_drainase = $kondisi_berat.', '.$kondisi_sedang.', '.$kondisi_ringan;
?>
<script>
  var config_kondisi_drainase = {
    type: 'doughnut',
    data: {
      datasets: [{
        data: [
          <?php echo $kondisi_drainase; ?>
        ],
        backgroundColor: [
          '#4169E1',
          '#FF8C00',
          '#228B22',
        ],
        label: 'Cost and Production'
      }],
      labels: [
        'Berat',
        'Sedang',
        'Ringan',
      ]
    },
    options: {
      responsive: true,
      tooltips: {
        mode: 'index',
        intersect: false,
        callbacks: {
          label: function(tooltipItem, data) {
            var label = data.labels[tooltipItem.index];
            var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            return label + ' : ' + val + '%';
          }
        }
      },
      legend: {
        position: 'bottom',
        labels: {
          usePointStyle: true,
        }
      },
      title: {
        display: false,
        text: 'Total Cost'
      },
      animation: {
        animateScale: true,
        animateRotate: true
      }
    }
  };
</script>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="panel panel-default">
                        <div class="panel-heading" style="background-color:#DC143C;">
                          <div class="panel-title-box">
                            <h3 style="color:white;">Budget HPP</h3>
                          </div>
                        </div>
                        <div class="panel-body padding">
                          <div class="chart-holder">
                            <div class="row">
                              <div class="col-md-12">
                                <b><?php echo date('Y', strtotime($YEAR_BASE['nilai'])); ?></b>
                              </div>
                              <div class="col-md-12" align="right">
                                <?php echo angka_ribuan($std_prediksi_biaya['T0']['rp_per_ha'])." Rp/Ha"; ?><br />
                                <?php echo angka_ribuan($std_prediksi_biaya['T0']['rp_per_kg'])." Rp/Kg"; ?>
                              </div>
                            </div>
                            <hr />
                            <div class="row">
                              <div class="col-md-12">
                                <b><?php echo date('Y', strtotime($YEAR_BASE['nilai'])) + 1; ?></b>
                              </div>
                              <div class="col-md-12" align="right">
                                <?php echo angka_ribuan($std_prediksi_biaya['T1']['rp_per_ha'])." Rp/Ha"; ?><br />
                                <?php echo angka_ribuan($std_prediksi_biaya['T1']['rp_per_kg'])." Rp/Kg"; ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="panel panel-default">
                        <div class="panel-heading" style="background-color:#DC143C;">
                          <div class="panel-title-box">
                            <h3 style="color:white;">Rolling Forecast HPP</h3>
                          </div>
                        </div>
                        <div class="panel-body padding">
                          <div class="chart-holder">
                            <div class="row">
                              <div class="col-md-12">
                                <b><?php echo date('Y', strtotime($YEAR_BASE['nilai'])); ?></b>
                              </div>
                              <div class="col-md-12" align="right">
                                <?php echo angka_ribuan(($hpp_rf_T0) / $luas_tonase['T0']['luas'])." Rp/Ha"; ?><br />
                                <?php echo angka_ribuan(($hpp_rf_T0) / $luas_tonase['T0']['tonase'] / 1000)." Rp/Kg"; ?>
                              </div>
                            </div>
                            <hr />
                            <div class="row">
                              <div class="col-md-12">
                                <b><?php echo date('Y', strtotime($YEAR_BASE['nilai'])) + 1; ?></b>
                              </div>
                              <div class="col-md-12" align="right">
                                <?php echo angka_ribuan(($hpp_rf_T1) / $luas_tonase['T1']['luas'])." Rp/Ha"; ?><br />
                                <?php echo angka_ribuan(($hpp_rf_T1) / $luas_tonase['T1']['tonase'] / 1000)." Rp/Kg"; ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="tab-pane" id="tab-second">
                <div class="row">
                  <div class="col-md-12">
                    <div class="panel panel-default">
                      <div class="panel-heading" style="background-color:#008000;">
                        <div class="panel-title-box">
                          <h3 style="color:white;">Real Cost per Umur (Rp/Ha)</h3>
                        </div>
                        <ul class="panel-controls" style="margin-top: 2px;">
                          <select class="form-control select" name="select_cost" id="select_cost" onchange="sort_cost()">
                            <option value="NSFC">NSFC</option>
                            <option value="NSSC">NSSC</option>
                          </select>
                        </ul>
                      </div>
                      <div class="panel-body padding">
                        <div class="chart-holder">
                          <div id="combined_cost_nsfc">
                            <canvas id="diagram_biaya_umur_nsfc" style="position: relative; width:100vw"></canvas>
<?php
  $bu_real_nsfc = '';
  $bu_std_nsfc = '';
  foreach ($biaya_umur['NSFC'] as $bu) {
    if($bu->umur == '1'){
      $bu_real_nsfc = (round($bu->biaya_realisasi));
    }
    else{
      $bu_real_nsfc .= ', '.(round($bu->biaya_realisasi));
    }
  }

  foreach($std_biaya_umur['NSFC'] as $sbu) {
    if($sbu->umur == '1'){
      $bu_std_nsfc .= round($sbu->biaya);
    }
    else if($sbu->umur == '>20'){
      $bu_std_nsfc .= ', '.(round($sbu->biaya));
    }
    else{
      $bu_std_nsfc .= ', '.(round($sbu->biaya));
    }
  }
?>
<script>
	var config_biaya_umur_nsfc = {
    type: 'bar',
    data: {
  		labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '>20'],
  		datasets: [{
  			type: 'line',
  			label: 'Std Biaya',
  			borderColor: '#FF0000',
        backgroundColor : '#FF0000',
  			borderWidth: 2,
				pointRadius: 3,
  			fill: false,
  			data: [
          <?php echo $bu_std_nsfc; ?>
  			]
  		}, {
  			type: 'line',
  			label: 'Biaya',
  			borderColor: '#228B22',
        backgroundColor : '#228B22',
  			borderWidth: 0,
				pointRadius: 0,
  			fill: true,
  			data: [
          <?php echo $bu_real_nsfc; ?>
  			]
  		}]
    },
    options: {
      responsive: true,
      title: {
        display: false,
        text: 'Biaya per Umur'
      },
      tooltips: {
        mode: 'index',
        intersect: false,
        callbacks: {
          label: function(tooltipItem, data) {
            var label = data.datasets[tooltipItem.datasetIndex].label;
            var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            return label + ' : ' + val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
          }
        }
      },
			elements: {
				line: {
					tension: 0.000001
				}
			},
			scales: {
				yAxes: [{
					gridLines: {
      			display: false,
      			drawBorder: true,
      			drawOnChartArea: false,
      		},
					ticks: {
						min: 0,
						max: 150000000,
		        stepSize: 50000000,
            callback: function(label, index, labels) {
              return label / 1000000 + ' M';
            }
					},
          scaleLabel: {
              display: true,
              labelString: '1 M = 1000.000'
          }
				}],
				xAxes: [{
					gridLines: {
      			display: false,
      			drawBorder: true,
      			drawOnChartArea: false,
      		}
				}]
			}
    }
	};
</script>
                          </div>
                          <div id="combined_cost_nssc">
                            <canvas id="diagram_biaya_umur_nssc" style="position: relative; width:100vw"></canvas>
<?php
  $bu_real_nssc = '';
  $bu_std_nssc = '';
  foreach ($biaya_umur['NSSC'] as $bu) {
    if($bu->umur == '1'){
      $bu_real_nssc = (round($bu->biaya_realisasi));
    }
    else{
      $bu_real_nssc .= ', '.(round($bu->biaya_realisasi));
    }
  }

  foreach($std_biaya_umur['NSSC'] as $sbu) {
    if($sbu->umur == '1'){
      $bu_std_nssc .= round($sbu->biaya);
    }
    else if($sbu->umur == '>20'){
      $bu_std_nssc .= ', '.(round($sbu->biaya));
    }
    else{
      $bu_std_nssc .= ', '.(round($sbu->biaya));
    }
  }
?>
<script>
	var config_biaya_umur_nssc = {
    type: 'bar',
    data: {
  		labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '>20'],
  		datasets: [{
  			type: 'line',
  			label: 'Std Biaya',
  			borderColor: '#FF0000',
        backgroundColor : '#FF0000',
  			borderWidth: 2,
				pointRadius: 3,
  			fill: false,
  			data: [
          <?php echo $bu_std_nssc; ?>
  			]
  		}, {
  			type: 'line',
  			label: 'Biaya',
  			borderColor: '#228B22',
        backgroundColor : '#228B22',
  			borderWidth: 0,
				pointRadius: 0,
  			fill: true,
  			data: [
          <?php echo $bu_real_nssc; ?>
  			]
  		}]
    },
    options: {
      responsive: true,
      title: {
        display: false,
        text: 'Biaya per Umur'
      },
      tooltips: {
        mode: 'index',
        intersect: false,
        callbacks: {
          label: function(tooltipItem, data) {
            var label = data.datasets[tooltipItem.datasetIndex].label;
            var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            return label + ' : ' + val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
          }
        }
      },
			elements: {
				line: {
					tension: 0.000001
				}
			},
			scales: {
				yAxes: [{
					gridLines: {
      			display: false,
      			drawBorder: true,
      			drawOnChartArea: false,
      		},
					ticks: {
						min: 0,
						max: 40000000,
		        stepSize: 10000000,
            callback: function(label, index, labels) {
              return label / 1000000 + ' M';
            }
					},
          scaleLabel: {
              display: true,
              labelString: '1 M = 1000.000'
          }
				}],
				xAxes: [{
					gridLines: {
      			display: false,
      			drawBorder: true,
      			drawOnChartArea: false,
      		}
				}]
			}
    }
	};
</script>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="panel panel-default">
                      <div class="panel-heading" style="background-color:#8A2BE2;">
                        <div class="panel-title-box">
                          <h3 style="color:white;">Average Unsur per Umur (Kg/Ton)</h3>
                        </div>
                        <ul class="panel-controls" style="margin-top: 2px;">
                          <select class="form-control select" name="select_unsur" id="select_unsur" onchange="sort_unsur()">
                            <option value="NSFC">NSFC</option>
                            <option value="NSSC">NSSC</option>
                          </select>
                        </ul>
                      </div>
                      <div class="panel-body padding">
                        <div class="chart-holder">
                          <div id="combined_unsur_nsfc">
                            <canvas id="diagram_unsur_umur_nsfc" style="position: relative; width:100vw"></canvas>
<?php
  $n_unsur_nsfc = (round($unsur_umur['NSFC']['N']['5']['jumlah'], 2));
  $n_unsur_nsfc .= ', '.(round($unsur_umur['NSFC']['N']['8']['jumlah'], 2));
  $n_unsur_nsfc .= ', '.(round($unsur_umur['NSFC']['N']['12']['jumlah'], 2));
  $n_unsur_nsfc .= ', '.(round($unsur_umur['NSFC']['N']['19']['jumlah'], 2));
  $n_unsur_nsfc .= ', '.(round($unsur_umur['NSFC']['N']['>20']['jumlah'], 2));
  $p_unsur_nsfc = (round($unsur_umur['NSFC']['P']['5']['jumlah'], 2));
  $p_unsur_nsfc .= ', '.(round($unsur_umur['NSFC']['P']['8']['jumlah'], 2));
  $p_unsur_nsfc .= ', '.(round($unsur_umur['NSFC']['P']['12']['jumlah'], 2));
  $p_unsur_nsfc .= ', '.(round($unsur_umur['NSFC']['P']['19']['jumlah'], 2));
  $p_unsur_nsfc .= ', '.(round($unsur_umur['NSFC']['P']['>20']['jumlah'], 2));
  $k_unsur_nsfc = (round($unsur_umur['NSFC']['K']['5']['jumlah'], 2));
  $k_unsur_nsfc .= ', '.(round($unsur_umur['NSFC']['K']['8']['jumlah'], 2));
  $k_unsur_nsfc .= ', '.(round($unsur_umur['NSFC']['K']['12']['jumlah'], 2));
  $k_unsur_nsfc .= ', '.(round($unsur_umur['NSFC']['K']['19']['jumlah'], 2));
  $k_unsur_nsfc .= ', '.(round($unsur_umur['NSFC']['K']['>20']['jumlah'], 2));
  $mg_unsur_nsfc = (round($unsur_umur['NSFC']['MG']['5']['jumlah'], 2));
  $mg_unsur_nsfc .= ', '.(round($unsur_umur['NSFC']['MG']['8']['jumlah'], 2));
  $mg_unsur_nsfc .= ', '.(round($unsur_umur['NSFC']['MG']['12']['jumlah'], 2));
  $mg_unsur_nsfc .= ', '.(round($unsur_umur['NSFC']['MG']['19']['jumlah'], 2));
  $mg_unsur_nsfc .= ', '.(round($unsur_umur['NSFC']['MG']['>20']['jumlah'], 2));
  $n_std_nsfc = '';
  $p_std_nsfc = '';
  $k_std_nsfc = '';
  $mg_std_nsfc = '';
  foreach($std_unsur_umur['NSFC'] as $suu) {
    if($suu->umur == '5'){
      $n_std_nsfc .= round($suu->N, 2);
      $p_std_nsfc .= round($suu->P, 2);
      $k_std_nsfc .= round($suu->K, 2);
      $mg_std_nsfc .= round($suu->MG, 2);
    }
    else{
      $n_std_nsfc .= ', '.(round($suu->N, 2));
      $p_std_nsfc .= ', '.(round($suu->P, 2));
      $k_std_nsfc .= ', '.(round($suu->K, 2));
      $mg_std_nsfc .= ', '.(round($suu->MG, 2));
    }
  }
?>
<script>
var config_unsur_umur_nsfc = {
  type: 'bar',
  data: {
    labels: ['5', '8', '12', '19', '>20'],
    datasets: [{
      type: 'line',
      label: 'Std N',
      borderColor: '#7FFF00',
      backgroundColor : '#7FFF00',
      borderWidth: 3,
      pointRadius: 0,
      fill: false,
      data: [
        <?php echo $n_std_nsfc; ?>
      ]
    }, {
      type: 'line',
      label: 'Std P',
      borderColor: '#00CED1',
      backgroundColor : '#00CED1',
      borderWidth: 3,
      pointRadius: 0,
      fill: false,
      data: [
        <?php echo $p_std_nsfc; ?>
      ]
    }, {
      type: 'line',
      label: 'Std K',
      borderColor: '#FFA500',
      backgroundColor : '#FFA500',
      borderWidth: 3,
      pointRadius: 0,
      fill: false,
      data: [
        <?php echo $k_std_nsfc; ?>
      ]
    }, {
      type: 'line',
      label: 'Std Mg',
      borderColor: '#D2691E',
      backgroundColor : '#D2691E',
      borderWidth: 3,
      pointRadius: 0,
      fill: false,
      data: [
        <?php echo $mg_std_nsfc; ?>
      ]
    }, {
      type: 'bar',
      label: 'Unsur N',
      borderColor: '#228B22',
      backgroundColor : '#228B22',
      data: [
        <?php echo $n_unsur_nsfc; ?>
      ]
    }, {
      type: 'bar',
      label: 'Unsur P',
      borderColor: '#20B2AA',
      backgroundColor : '#20B2AA',
      data: [
        <?php echo $p_unsur_nsfc; ?>
      ]
    }, {
      type: 'bar',
      label: 'Unsur K',
      borderColor: '#C18100',
      backgroundColor : '#C18100',
      data: [
        <?php echo $k_unsur_nsfc; ?>
      ]
    }, {
      type: 'bar',
      label: 'Unsur MG',
      borderColor: '#A95616',
      backgroundColor : '#A95616',
      data: [
        <?php echo $mg_unsur_nsfc; ?>
      ]
    }]
  },
  options: {
    responsive: true,
    title: {
      display: false,
      text: 'Biaya per Umur'
    },
    legend: {
      position: 'top',
      labels: {
        usePointStyle: true,
      }
    },
    tooltips: {
      mode: 'index',
      intersect: false,
      callbacks: {
        label: function(tooltipItem, data) {
          var label = data.datasets[tooltipItem.datasetIndex].label;
          var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
          switch (label) {
            case 'Unsur N':
            case 'Unsur P':
            case 'Unsur K':
            case 'Unsur MG':
              return label + ' : ' + val;
              break;
            default:
              return false;
          }
        }
      }
    },
    elements: {
      line: {
        tension: 0.000001
      }
    },
    scales: {
      yAxes: [{
        gridLines: {
          display: false,
          drawBorder: true,
          drawOnChartArea: false,
        },
        ticks: {
          min: 0,
          max: 15,
          stepSize: 3
        }
      }],
      xAxes: [{
        gridLines: {
          display: false,
          drawBorder: true,
          drawOnChartArea: false,
        }
      }]
    }
  }
};
</script>
                          </div>
                          <div id="combined_unsur_nssc">
                            <canvas id="diagram_unsur_umur_nssc" style="position: relative; width:100vw"></canvas>
<?php
  $n_unsur_nssc = (round($unsur_umur['NSSC']['N']['5']['jumlah'], 2));
  $n_unsur_nssc .= ', '.(round($unsur_umur['NSSC']['N']['8']['jumlah'], 2));
  $n_unsur_nssc .= ', '.(round($unsur_umur['NSSC']['N']['12']['jumlah'], 2));
  $n_unsur_nssc .= ', '.(round($unsur_umur['NSSC']['N']['19']['jumlah'], 2));
  $n_unsur_nssc .= ', '.(round($unsur_umur['NSSC']['N']['>20']['jumlah'], 2));
  $p_unsur_nssc = (round($unsur_umur['NSSC']['P']['5']['jumlah'], 2));
  $p_unsur_nssc .= ', '.(round($unsur_umur['NSSC']['P']['8']['jumlah'], 2));
  $p_unsur_nssc .= ', '.(round($unsur_umur['NSSC']['P']['12']['jumlah'], 2));
  $p_unsur_nssc .= ', '.(round($unsur_umur['NSSC']['P']['19']['jumlah'], 2));
  $p_unsur_nssc .= ', '.(round($unsur_umur['NSSC']['P']['>20']['jumlah'], 2));
  $k_unsur_nssc = (round($unsur_umur['NSSC']['K']['5']['jumlah'], 2));
  $k_unsur_nssc .= ', '.(round($unsur_umur['NSSC']['K']['8']['jumlah'], 2));
  $k_unsur_nssc .= ', '.(round($unsur_umur['NSSC']['K']['12']['jumlah'], 2));
  $k_unsur_nssc .= ', '.(round($unsur_umur['NSSC']['K']['19']['jumlah'], 2));
  $k_unsur_nssc .= ', '.(round($unsur_umur['NSSC']['K']['>20']['jumlah'], 2));
  $mg_unsur_nssc = (round($unsur_umur['NSSC']['MG']['5']['jumlah'], 2));
  $mg_unsur_nssc .= ', '.(round($unsur_umur['NSSC']['MG']['8']['jumlah'], 2));
  $mg_unsur_nssc .= ', '.(round($unsur_umur['NSSC']['MG']['12']['jumlah'], 2));
  $mg_unsur_nssc .= ', '.(round($unsur_umur['NSSC']['MG']['19']['jumlah'], 2));
  $mg_unsur_nssc .= ', '.(round($unsur_umur['NSSC']['MG']['>20']['jumlah'], 2));
  $n_std_nssc = '';
  $p_std_nssc = '';
  $k_std_nssc = '';
  $mg_std_nssc = '';
  foreach($std_unsur_umur['NSSC'] as $suu) {
    if($suu->umur == '5'){
      $n_std_nssc .= round($suu->N, 2);
      $p_std_nssc .= round($suu->P, 2);
      $k_std_nssc .= round($suu->K, 2);
      $mg_std_nssc .= round($suu->MG, 2);
    }
    else{
      $n_std_nssc .= ', '.(round($suu->N, 2));
      $p_std_nssc .= ', '.(round($suu->P, 2));
      $k_std_nssc .= ', '.(round($suu->K, 2));
      $mg_std_nssc .= ', '.(round($suu->MG, 2));
    }
  }
?>
<script>
var config_unsur_umur_nssc = {
  type: 'bar',
  data: {
    labels: ['5', '8', '12', '19', '>20'],
    datasets: [{
      type: 'line',
      label: 'Std N',
      borderColor: '#7FFF00',
      backgroundColor : '#7FFF00',
      borderWidth: 3,
      pointRadius: 0,
      fill: false,
      data: [
        <?php echo $n_std_nssc; ?>
      ]
    }, {
      type: 'line',
      label: 'Std P',
      borderColor: '#00CED1',
      backgroundColor : '#00CED1',
      borderWidth: 3,
      pointRadius: 0,
      fill: false,
      data: [
        <?php echo $p_std_nssc; ?>
      ]
    }, {
      type: 'line',
      label: 'Std K',
      borderColor: '#FFA500',
      backgroundColor : '#FFA500',
      borderWidth: 3,
      pointRadius: 0,
      fill: false,
      data: [
        <?php echo $k_std_nssc; ?>
      ]
    }, {
      type: 'line',
      label: 'Std Mg',
      borderColor: '#D2691E',
      backgroundColor : '#D2691E',
      borderWidth: 3,
      pointRadius: 0,
      fill: false,
      data: [
        <?php echo $mg_std_nssc; ?>
      ]
    }, {
      type: 'bar',
      label: 'Unsur N',
      borderColor: '#228B22',
      backgroundColor : '#228B22',
      data: [
        <?php echo $n_unsur_nssc; ?>
      ]
    }, {
      type: 'bar',
      label: 'Unsur P',
      borderColor: '#20B2AA',
      backgroundColor : '#20B2AA',
      data: [
        <?php echo $p_unsur_nssc; ?>
      ]
    }, {
      type: 'bar',
      label: 'Unsur K',
      borderColor: '#C18100',
      backgroundColor : '#C18100',
      data: [
        <?php echo $k_unsur_nssc; ?>
      ]
    }, {
      type: 'bar',
      label: 'Unsur MG',
      borderColor: '#A95616',
      backgroundColor : '#A95616',
      data: [
        <?php echo $mg_unsur_nssc; ?>
      ]
    }]
  },
  options: {
    responsive: true,
    legend: {
      position: 'top',
      labels: {
        usePointStyle: true,
      }
    },
    tooltips: {
      mode: 'index',
      intersect: false,
      callbacks: {
        label: function(tooltipItem, data) {
          var label = data.datasets[tooltipItem.datasetIndex].label;
          var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
          switch (label) {
            case 'Unsur N':
            case 'Unsur P':
            case 'Unsur K':
            case 'Unsur MG':
              return label + ' : ' + val;
              break;
            default:
              return false;
          }
        }
      }
    },
    title: {
      display: false,
      text: 'Biaya per Umur'
    },
    elements: {
      line: {
        tension: 0.000001
      }
    },
    scales: {
      yAxes: [{
        gridLines: {
          display: false,
          drawBorder: true,
          drawOnChartArea: false,
        },
        ticks: {
          min: 0,
          max: 9,
          stepSize: 1.5
        }
      }],
      xAxes: [{
        gridLines: {
          display: false,
          drawBorder: true,
          drawOnChartArea: false,
        }
      }]
    }
  }
};
</script>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="tab-pane <?php echo $active_tab3; ?>" id="tab-third">
                <div class="row">
                  <div class="col-md-10" style="padding-top:2px;padding-bottom:2px;padding-left:0px;padding-right:2px;">
                    <div class="table-responsive">
                      <table class="table table-actions">
                        <tbody>
                          <tr style="background-color:#008000;">
                            <td style="color:white;padding-top:3px;padding-bottom:3px;" align="center" width="135px"><b>Element Cost</b></td>
                            <td style="color:white;padding-top:3px;padding-bottom:3px;" align="center"><b>BPP (Rp/Ha)</b></td>
                            <td style="color:white;padding-top:3px;padding-bottom:3px;" align="center"><b>Target (Rp/Ha)</b></td>
                            <td style="color:white;padding-top:3px;padding-bottom:3px;" align="center"><b>Real (Rp/Ha)</b></td>
                            <td style="color:white;padding-top:3px;padding-bottom:3px;" align="center"><b>R + F (Rp/Ha)</b></td>
                            <td style="color:white;padding-top:3px;padding-bottom:3px;" align="center"><b>R + F (Rp/Kg)</b></td>
                          </tr>
<?php
  $total_NS = 0;
  $total_NSFC = 0;
  $total_NSSC = 0;
  $total_target_NS = 0;
  $total_target_NSFC = 0;
  $total_target_NSSC = 0;

  $total_real = 0;
  $total_rf_ha = 0;
  $total_rf_kg = 0;
  $total_category = 0;

  foreach($element_cost as $ec){
    if(substr($ec->code, 2) % 2 == 1){
      $color_element_cost = "style='background-color:#F5F5F5;'";
    }
    else{
      $color_element_cost = "";
    }
    if($tahun == 'T1'){
      $bpp_NS = $ec->NS_ha_t1;
      $bpp_NSFC = $ec->NSFC_ha_t1;
      $bpp_NSSC = $ec->NSSC_ha_t1;
    }
    else{
      $bpp_NS = $ec->NS_ha;
      $bpp_NSFC = $ec->NSFC_ha;
      $bpp_NSSC = $ec->NSSC_ha;
    }
    //Total BPP
    $total_NS += $bpp_NS;
    $total_NSFC += $bpp_NSFC;
    $total_NSSC += $bpp_NSSC;
    // if(isset($tahun)){
    //   if($tahun == 'T1'){
        $target_NS = $bpp_NS;
        $target_NSFC = $bpp_NSFC;
        $target_NSSC = $bpp_NSSC;
    //   }
    //   else{
    //     $target_NS = $target['NS'][$ec->code];
    //     $target_NSFC = $target['NSFC'][$ec->code];
    //     $target_NSSC = $target['NSSC'][$ec->code];
    //   }
    // }
    // else{
    //   $target_NS = $target['NS'][$ec->code];
    //   $target_NSFC = $target['NSFC'][$ec->code];
    //   $target_NSSC = $target['NSSC'][$ec->code];
    // }
    // if($ec->code == 'ZN02'){
    //   $total_target_NS += $target['NS'][$ec->code];
    //   $total_target_NSFC += $target['NSFC']['ZN02X'];
    //   $total_target_NSSC += $target['NSSC']['ZN02X'];
    // }
    // else{
      $total_target_NS += $target_NS;
      $total_target_NSFC += $target_NSFC;
      $total_target_NSSC += $target_NSSC;
    // }

    if($luas_tonase['total']['luas'] != 0 && $luas_tonase['total']['tonase'] != 0){
      //Total Real
      $total_real += ($real[$ec->code]) / $luas_tonase['total']['luas'];

      //Total Real + Forecast (Rp/Ha)
      $total_rf_ha += ($real[$ec->code] + $forecast[$ec->code]) / $luas_tonase['total']['luas'];

      //Total Real + Forecast (Rp/Kg)
      $total_rf_kg += ($real[$ec->code] + $forecast[$ec->code]) / $luas_tonase['total']['tonase'] / 1000;
    }
    else{
      //Total Real
      $total_real += 0;

      //Total Real + Forecast (Rp/Ha)
      $total_rf_ha += 0;

      //Total Real + Forecast (Rp/Kg)
      $total_rf_kg += 0;
    }

    switch ($ec->code) {
      case 'ZN01':
      case 'ZN02':
      case 'ZN03':
      case 'ZN04':
      case 'ZN05':
      case 'ZN06':
      case 'ZN07':
      case 'ZN08':
      case 'ZN09':
      case 'ZN11':
      case 'ZN12':
      case 'ZN14':
      case 'ZN15':
        if($luas_tonase['total']['luas'] != 0 && $luas_tonase['total']['luas'] != NULL){
          $total_category += ($real[$ec->code] + $forecast[$ec->code]) / $luas_tonase['total']['luas'];
        }
        else{
          $total_category += 0;
        }
        break;
      case 'ZN10':
      case 'ZN13':
        if(isset($status)){
          switch ($status) {
            case 'NS':
              $total_category += $bpp_NS;
              break;
            case 'NSFC':
              $total_category += $bpp_NSFC;
              break;
            case 'NSSC':
              $total_category += $bpp_NSSC;
              break;
          }
        }
        else{
          $total_category += $bpp_NS;
        }
        break;
    }
?>
                          <tr <?php echo $color_element_cost; ?>>
                            <td style="padding-top:0px;padding-bottom:0px;"><?php echo $ec->nama; ?></td>
<?php
  if(isset($status)){
    switch ($status) {
      case 'NS':
?>
                            <td style="padding-top:0px;padding-bottom:0px;" align="right"><?php if($bpp_NS == 0) echo "-"; else echo angka_ribuan($bpp_NS); ?></td>
                            <td style="padding-top:0px;padding-bottom:0px;" align="right"><?php if($target_NS == 0) echo "-"; else echo angka_ribuan($target_NS); ?></td>
<?php
        break;
      case 'NSFC':
?>
                            <td style="padding-top:0px;padding-bottom:0px;" align="right"><?php if($bpp_NSFC == 0) echo "-"; else echo angka_ribuan($bpp_NSFC); ?></td>
                            <td style="padding-top:0px;padding-bottom:0px;" align="right"><?php if($target_NSFC == 0) echo "-"; else echo angka_ribuan($target_NSFC); ?></td>
<?php
        break;
      case 'NSSC':
?>
                            <td style="padding-top:0px;padding-bottom:0px;" align="right"><?php if($bpp_NSSC == 0) echo "-"; else echo angka_ribuan($bpp_NSSC); ?></td>
                            <td style="padding-top:0px;padding-bottom:0px;" align="right"><?php if($target_NSSC == 0) echo "-"; else echo angka_ribuan($target_NSSC); ?></td>
<?php
        break;
    }
  }
  else{
?>
                            <td style="padding-top:0px;padding-bottom:0px;" align="right"><?php if($bpp_NS == 0) echo "-"; else echo angka_ribuan($bpp_NS); ?></td>
                            <td style="padding-top:0px;padding-bottom:0px;" align="right"><?php if($target_NS == 0) echo "-"; else echo angka_ribuan($target_NS); ?></td>
<?php
  }
?>
                            <td style="padding-top:0px;padding-bottom:0px;" align="right">
<?php
  if($luas_tonase['total']['luas'] == 0)
    echo "-";
  else
    echo angka_ribuan(($real[$ec->code]) / $luas_tonase['total']['luas']);
?>
                            </td>
                            <td style="padding-top:0px;padding-bottom:0px;" align="right">
<?php
  if($luas_tonase['total']['luas'] == 0)
    echo "-";
  else
    echo angka_ribuan(($real[$ec->code] + $forecast[$ec->code]) / $luas_tonase['total']['luas']);
?>
                            </td>
                            <td style="padding-top:0px;padding-bottom:0px;" align="right">
<?php
  if($luas_tonase['total']['tonase'] == 0)
    echo "-";
  else
    echo angka_ribuan(($real[$ec->code] + $forecast[$ec->code]) / $luas_tonase['total']['tonase'] / 1000);
?>
                            </td>
                          </tr>
<?php
  }
?>
                        </tbody>
                        <tfoot>
                          <tr style="background-color:#DCDCDC;">
                            <td style="color:black;padding-top:0px;padding-bottom:0px;"><b>Total Direct Cost</b></td>
<?php
  if(isset($status)){
    switch ($status) {
      case 'NS':
?>
                            <td style="color:black;padding-top:0px;padding-bottom:0px;" align="right"><b><?php if($total_NS == 0) echo "-"; else echo angka_ribuan($total_NS); ?></b></td>
                            <td style="color:black;padding-top:0px;padding-bottom:0px;" align="right"><b><?php if($total_target_NS == 0) echo "-"; else echo angka_ribuan($total_target_NS); ?></b></td>
<?php
        break;
      case 'NSFC':
?>
                            <td style="color:black;padding-top:0px;padding-bottom:0px;" align="right"><b><?php if($total_NSFC == 0) echo "-"; else echo angka_ribuan($total_NSFC); ?></b></td>
                            <td style="color:black;padding-top:0px;padding-bottom:0px;" align="right"><b><?php if($total_target_NSFC == 0) echo "-"; else echo angka_ribuan($total_target_NSFC); ?></b></td>
<?php
        break;
      case 'NSSC':
?>
                            <td style="color:black;padding-top:0px;padding-bottom:0px;" align="right"><b><?php if($total_NSSC == 0) echo "-"; else echo angka_ribuan($total_NSSC); ?></b></td>
                            <td style="color:black;padding-top:0px;padding-bottom:0px;" align="right"><b><?php if($total_target_NSSC == 0) echo "-"; else echo angka_ribuan($total_target_NSSC); ?></b></td>
<?php
        break;
    }
  }
  else{
?>
                            <td style="color:black;padding-top:0px;padding-bottom:0px;" align="right"><b><?php if($total_NS == 0) echo "-"; else echo angka_ribuan($total_NS); ?></b></td>
                            <td style="color:black;padding-top:0px;padding-bottom:0px;" align="right"><b><?php if($total_target_NS == 0) echo "-"; else echo angka_ribuan($total_target_NS); ?></b></td>
<?php
  }
?>
                            <td style="color:black;padding-top:0px;padding-bottom:0px;" align="right"><b><?php if($total_real == 0) echo "-"; else echo angka_ribuan($total_real); ?></b></td>
                            <td style="color:black;padding-top:0px;padding-bottom:0px;" align="right"><b><div id='total_cost_ha1'><?php if($total_rf_ha == 0) echo "-"; else echo angka_ribuan($total_rf_ha); ?></div></b></td>
                            <td style="color:black;padding-top:0px;padding-bottom:0px;" align="right"><b><div id='total_cost_kg1'><?php if($total_rf_kg == 0) echo "-"; else echo angka_ribuan($total_rf_kg); ?></div></b></td>
                          </tr>
                          <tr>
                            <td style="padding-top:0px;padding-bottom:0px;" colspan="4" bgcolor="green"></td>
                            <td style="color:black;padding-top:0px;padding-bottom:0px;background-color:#DCDCDC;"><b>Category</b></td>
<?php
  if(isset($status)){
    switch ($status) {
      case 'NS':
        $total_BPP = $total_NS;
        break;
      case 'NSFC':
        $total_BPP = $total_NSFC;
        break;
      case 'NSSC':
        $total_BPP = $total_NSSC;
        break;
    }
  }
  else{
    $total_BPP = $total_NS;
  }
  if($total_rf_ha != 0 && $total_rf_ha != NULL){
    if($total_rf_kg != NULL && $total_rf_kg != 0){
      if((($total_rf_ha / $total_BPP) * 100) < 98){
        echo "<td style='color:black;padding-top:0px;padding-bottom:0px;background-color:#00FF00;' align='center'><b>Excellent</b>";
      }
      else if((($total_rf_ha / $total_BPP) * 100) <= 102){
        echo "<td style='color:black;padding-top:0px;padding-bottom:0px;background-color:#FFFF00;' align='center'><b>Good</b>";
      }
      else{
        echo "<td style='color:black;padding-top:0px;padding-bottom:0px;background-color:#FF0000;' align='center'><b>Poor</b>";
      }
    }
    else{
      echo "<td style='color:black;padding-top:0px;padding-bottom:0px;' align='center'><b>-</b>";
    }
  }
  else{
    echo "<td style='color:black;padding-top:0px;padding-bottom:0px;' align='center'><b>-</b>";
  }
?>
                            </td>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>

                  <div class="col-md-2" style="padding-top:2px;padding-bottom:2px;padding-left:2px;padding-right:0px;">
                    <div class="row">
                      <table class="table table-actions">
                        <tbody>
                          <tr style="background-color:#8B0000;">
                            <td style="color:white;padding-top:3px;padding-bottom:3px;"><b>Change Forecast</b></td>
                          </tr>
                          <tr>
                            <td style="padding-top:3px;padding-bottom:3px;">
                              <select class="form-control select" name="select_charge" id="select_charge" onchange="sort_raport()">
<?php
  if(isset($charge)){
    switch ($charge) {
      case 'Real':
          $charge1 = 'selected';
          $charge2 = '';
        break;
      case 'Actual':
          $charge1 = '';
          $charge2 = 'selected';
        break;
    }
  }
  else{
    $charge1 = '';
    $charge2 = 'selected';
  }
?>
                                <option value="Real" <?php echo $charge1; ?>>Real</option>
                                <option value="Actual" <?php echo $charge2; ?>>Actual</option>
                              </select>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <div class="row">
                      <table class="table table-actions">
                        <tbody>
                          <tr style="background-color:#8B0000;">
                            <td style="color:white;padding-top:3px;padding-bottom:3px;"><b>Tahun</b></td>
                          </tr>
                          <tr>
                            <td style="padding-top:3px;padding-bottom:3px;">
                              <select class="form-control select" name="select_tahun" id="select_tahun" onchange="sort_raport()">
<?php
  if(isset($tahun)){
    switch ($tahun) {
      case 'T0':
          $tahun1 = 'selected';
          $tahun2 = '';
        break;
      case 'T1':
          $tahun1 = '';
          $tahun2 = 'selected';
        break;
    }
  }
  else{
    $tahun1 = 'selected';
    $tahun2 = '';
  }
?>
                                <option value="T0" <?php echo $tahun1; ?>><?php echo date('Y', strtotime($YEAR_BASE['nilai'])); ?></option>
                                <option value="T1" <?php echo $tahun2; ?>><?php echo date('Y', strtotime($YEAR_BASE['nilai'])) + 1; ?></option>
                              </select>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <div class="row">
                      <table class="table table-actions">
                        <tbody>
                          <tr style="background-color:#8B0000;">
                            <td style="color:white;padding-top:3px;padding-bottom:3px;"><b>Month</b></td>
                          </tr>
                          <tr>
                            <td style="padding-top:3px;padding-bottom:3px;">
                              <select class="form-control select" name="select_bulan" id="select_bulan" onchange="sort_raport()">
<?php
  if(isset($bulan)){
    switch ($bulan) {
      case 'Total':
          $bulan1 = 'selected';
          $bulan2 = '';
          $bulan3 = '';
          $bulan4 = '';
          $bulan5 = '';
          $bulan6 = '';
          $bulan7 = '';
          $bulan8 = '';
          $bulan9 = '';
          $bulan10 = '';
          $bulan11 = '';
          $bulan12 = '';
          $bulan13 = '';
        break;
      case 'B1':
          $bulan1 = '';
          $bulan2 = 'selected';
          $bulan3 = '';
          $bulan4 = '';
          $bulan5 = '';
          $bulan6 = '';
          $bulan7 = '';
          $bulan8 = '';
          $bulan9 = '';
          $bulan10 = '';
          $bulan11 = '';
          $bulan12 = '';
          $bulan13 = '';
        break;
      case 'B2':
          $bulan1 = '';
          $bulan2 = '';
          $bulan3 = 'selected';
          $bulan4 = '';
          $bulan5 = '';
          $bulan6 = '';
          $bulan7 = '';
          $bulan8 = '';
          $bulan9 = '';
          $bulan10 = '';
          $bulan11 = '';
          $bulan12 = '';
          $bulan13 = '';
        break;
      case 'B3':
          $bulan1 = '';
          $bulan2 = '';
          $bulan3 = '';
          $bulan4 = 'selected';
          $bulan5 = '';
          $bulan6 = '';
          $bulan7 = '';
          $bulan8 = '';
          $bulan9 = '';
          $bulan10 = '';
          $bulan11 = '';
          $bulan12 = '';
          $bulan13 = '';
        break;
      case 'B4':
          $bulan1 = '';
          $bulan2 = '';
          $bulan3 = '';
          $bulan4 = '';
          $bulan5 = 'selected';
          $bulan6 = '';
          $bulan7 = '';
          $bulan8 = '';
          $bulan9 = '';
          $bulan10 = '';
          $bulan11 = '';
          $bulan12 = '';
          $bulan13 = '';
        break;
      case 'B5':
          $bulan1 = '';
          $bulan2 = '';
          $bulan3 = '';
          $bulan4 = '';
          $bulan5 = '';
          $bulan6 = 'selected';
          $bulan7 = '';
          $bulan8 = '';
          $bulan9 = '';
          $bulan10 = '';
          $bulan11 = '';
          $bulan12 = '';
          $bulan13 = '';
        break;
      case 'B6':
          $bulan1 = '';
          $bulan2 = '';
          $bulan3 = '';
          $bulan4 = '';
          $bulan5 = '';
          $bulan6 = '';
          $bulan7 = 'selected';
          $bulan8 = '';
          $bulan9 = '';
          $bulan10 = '';
          $bulan11 = '';
          $bulan12 = '';
          $bulan13 = '';
        break;
      case 'B7':
          $bulan1 = '';
          $bulan2 = '';
          $bulan3 = '';
          $bulan4 = '';
          $bulan5 = '';
          $bulan6 = '';
          $bulan7 = '';
          $bulan8 = 'selected';
          $bulan9 = '';
          $bulan10 = '';
          $bulan11 = '';
          $bulan12 = '';
          $bulan13 = '';
        break;
      case 'B8':
          $bulan1 = '';
          $bulan2 = '';
          $bulan3 = '';
          $bulan4 = '';
          $bulan5 = '';
          $bulan6 = '';
          $bulan7 = '';
          $bulan8 = '';
          $bulan9 = 'selected';
          $bulan10 = '';
          $bulan11 = '';
          $bulan12 = '';
          $bulan13 = '';
        break;
      case 'B9':
          $bulan1 = '';
          $bulan2 = '';
          $bulan3 = '';
          $bulan4 = '';
          $bulan5 = '';
          $bulan6 = '';
          $bulan7 = '';
          $bulan8 = '';
          $bulan9 = '';
          $bulan10 = 'selected';
          $bulan11 = '';
          $bulan12 = '';
          $bulan13 = '';
        break;
      case 'B10':
          $bulan1 = '';
          $bulan2 = '';
          $bulan3 = '';
          $bulan4 = '';
          $bulan5 = '';
          $bulan6 = '';
          $bulan7 = '';
          $bulan8 = '';
          $bulan9 = '';
          $bulan10 = '';
          $bulan11 = 'selected';
          $bulan12 = '';
          $bulan13 = '';
        break;
      case 'B11':
          $bulan1 = '';
          $bulan2 = '';
          $bulan3 = '';
          $bulan4 = '';
          $bulan5 = '';
          $bulan6 = '';
          $bulan7 = '';
          $bulan8 = '';
          $bulan9 = '';
          $bulan10 = '';
          $bulan11 = '';
          $bulan12 = 'selected';
          $bulan13 = '';
        break;
      case 'B12':
          $bulan1 = '';
          $bulan2 = '';
          $bulan3 = '';
          $bulan4 = '';
          $bulan5 = '';
          $bulan6 = '';
          $bulan7 = '';
          $bulan8 = '';
          $bulan9 = '';
          $bulan10 = '';
          $bulan11 = '';
          $bulan12 = '';
          $bulan13 = 'selected';
        break;
    }
  }
  else{
    $bulan1 = 'selected';
    $bulan2 = '';
    $bulan3 = '';
    $bulan4 = '';
    $bulan5 = '';
    $bulan6 = '';
    $bulan7 = '';
    $bulan8 = '';
    $bulan9 = '';
    $bulan10 = '';
    $bulan11 = '';
    $bulan12 = '';
    $bulan13 = '';
  }
?>
                                <option value="Total" <?php echo $bulan1; ?>>Total</option>
                                <option value="B1" <?php echo $bulan2; ?>>1</option>
                                <option value="B2" <?php echo $bulan3; ?>>2</option>
                                <option value="B3" <?php echo $bulan4; ?>>3</option>
                                <option value="B4" <?php echo $bulan5; ?>>4</option>
                                <option value="B5" <?php echo $bulan6; ?>>5</option>
                                <option value="B6" <?php echo $bulan7; ?>>6</option>
                                <option value="B7" <?php echo $bulan8; ?>>7</option>
                                <option value="B8" <?php echo $bulan9; ?>>8</option>
                                <option value="B9" <?php echo $bulan10; ?>>9</option>
                                <option value="B10" <?php echo $bulan11; ?>>10</option>
                                <option value="B11" <?php echo $bulan12; ?>>11</option>
                                <option value="B12" <?php echo $bulan13; ?>>12</option>
                              </select>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <div class="row">
                      <table class="table table-actions">
                        <tbody>
                          <tr style="background-color:#8B0000;">
                            <td style="color:white;padding-top:3px;padding-bottom:3px;"><b>Status</b></td>
                          </tr>
                          <tr>
                            <td style="padding-top:3px;padding-bottom:3px;">
                              <select class="form-control select" name="select_status" id="select_status" onchange="sort_raport()">
<?php
  if(isset($status)){
    switch ($status) {
      case 'NS':
          $status1 = 'selected';
          $status2 = '';
          $status3 = '';
        break;
      case 'NSFC':
          $status1 = '';
          $status2 = 'selected';
          $status3 = '';
        break;
      case 'NSSC':
          $status1 = '';
          $status2 = '';
          $status3 = 'selected';
        break;
    }
  }
  else{
    $status1 = 'selected';
    $status2 = '';
    $status3 = '';
  }
?>
                                <option value="NS" <?php echo $status1; ?>>NS</option>
                                <option value="NSFC" <?php echo $status2; ?>>NSFC</option>
                                <option value="NSSC" <?php echo $status3; ?>>NSSC</option>
                              </select>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <div class="row">
                      <table class="table table-actions">
                        <tbody>
                          <tr style="background-color:#8B0000;">
                            <td style="color:white;padding-top:3px;padding-bottom:3px;"><b>Rank</b></td>
                          </tr>
                          <tr>
                            <td style="padding-top:3px;padding-bottom:3px;">
                              <select class="form-control select" name="select_min_max" id="select_min_max" onchange="sort_min_max()">
                                <option value="0">Cheapest</option>
                                <option value="1">Expensive</option>
                              </select>
                            </td>
                          </tr>
<?php
  $min = 0;
  foreach ($rank['min'] as $rmin) {
?>
                          <tr class='Min' >
                            <td id='min<?php echo ++$min; ?>' style="padding-top:3px;padding-bottom:3px;" align="center"><a href='/PIS/dashboard/lokasi?lokasi=<?php echo $rmin->lokasi; ?>'><?php echo $rmin->lokasi; ?><a/></td>
                          </tr>
<?php
  }
  $max = 0;
  foreach ($rank['max'] as $rmax) {
?>
                          <tr class='Max'>
                            <td id='max<?php echo ++$max; ?>' style="padding-top:3px;padding-bottom:3px;" align="center"><a href='/PIS/dashboard/lokasi?lokasi=<?php echo $rmax->lokasi; ?>'><?php echo $rmax->lokasi; ?><a/></td>
                          </tr>
<?php
  }
?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTENT -->

<!-- The Modal -->
<div id="modal_show_foto" class="modal">
  <span class="close" onclick="close_modal_show_foto()">&times;</span>
  <!-- Modal content -->
    <div class="col-md-12" align="center">
      <img id='show_foto' style="max-width:80%;max-height:650px;">
    </div>
</div>

<script>
  $( document ).ready(function() {
    sort_performance();
    sort_tahun_peta();
    $("#bar_comparison_ha").hide();
    $("#bar_comparison_kg").hide();
    $("#combined_cost_nssc").hide();
    $("#combined_unsur_nssc").hide();
    $(".Max").hide();

    //Resolusi Layar
    if(screen.width <= 768){
      $(".div-mobile").show();
      $(".div-leptop").hide();
      $("#profile").height('auto');
      $("#show_profile").html($("#show_infomasi").html());
      $("#diagram_biaya_umur_nsfc").css('height', '40vh');
      $("#diagram_biaya_umur_nssc").css('height', '40vh');
      $("#diagram_unsur_umur_nsfc").css('height', '40vh');
      $("#diagram_unsur_umur_nssc").css('height', '40vh');
      document.getElementById("header_wilayah").innerHTML = "<b><?php echo $wilayah['code']; ?></b>";
<?php
  $min = 0;
  foreach ($rank['min'] as $rmin) {
    if(++$min >= 3){
?>
      $("#min<?php echo ++$min; ?>").show();
<?php
    }
  }
  $max = 0;
  foreach ($rank['max'] as $rmax) {
    if(++$min >= 3){
?>
      $("#max<?php echo ++$max; ?>").show();
<?php
    }
  }
  // foreach ($lokasi_all as $l) {
  //   if($l->category == 'Excellent'){
  //     $bgcolor_lokasi = '#00FF00';
  //   }
  //   else if($l->category == 'Good'){
  //     $bgcolor_lokasi = '#FFFF00';
  //   }
  //   else{
  //     $bgcolor_lokasi = '#FF0000';
  //   }
?>
    // document.getElementById("select_<?php echo $l->lokasi_aktif; ?>").style.color = '<?php echo $bgcolor_lokasi; ?>';
<?php
  // }
?>
    }
    else{
      $(".div-mobile").hide();
      $(".div-leptop").show();
      $("#show_profile").html("");
      $("#diagram_biaya_umur_nsfc").css('height', '45vh');
      $("#diagram_biaya_umur_nssc").css('height', '45vh');
      $("#diagram_unsur_umur_nsfc").css('height', '45vh');
      $("#diagram_unsur_umur_nssc").css('height', '45vh');
    }
  });

  //Tab 1
  function sort_performance(){
    if($("#select_satuan").val() == 1){
      if($("#select_tahun_peta").val() == "T"){
        $("#pie_total_ha").show();
        $("#pie_total_kg").hide();
        $("#pie_total_ha_t0").hide();
        $("#pie_total_kg_t0").hide();
        $("#pie_total_ha_t1").hide();
        $("#pie_total_kg_t1").hide();
      }
      else if($("#select_tahun_peta").val() == "T0"){
        $("#pie_total_ha").hide();
        $("#pie_total_kg").hide();
        $("#pie_total_ha_t0").show();
        $("#pie_total_kg_t0").hide();
        $("#pie_total_ha_t1").hide();
        $("#pie_total_kg_t1").hide();
      }
      else{
        $("#pie_total_ha").hide();
        $("#pie_total_kg").hide();
        $("#pie_total_ha_t0").hide();
        $("#pie_total_kg_t0").hide();
        $("#pie_total_ha_t1").show();
        $("#pie_total_kg_t1").hide();
      }
    }
  else{
      if($("#select_tahun_peta").val() == "T"){
        $("#pie_total_ha").hide();
        $("#pie_total_kg").show();
        $("#pie_total_ha_t0").hide();
        $("#pie_total_kg_t0").hide();
        $("#pie_total_ha_t1").hide();
        $("#pie_total_kg_t1").hide();
      }
      else if($("#select_tahun_peta").val() == "T0"){
        $("#pie_total_ha").hide();
        $("#pie_total_kg").hide();
        $("#pie_total_ha_t0").hide();
        $("#pie_total_kg_t0").show();
        $("#pie_total_ha_t1").hide();
        $("#pie_total_kg_t1").hide();
      }
      else{
        $("#pie_total_ha").hide();
        $("#pie_total_kg").hide();
        $("#pie_total_ha_t0").hide();
        $("#pie_total_kg_t0").hide();
        $("#pie_total_ha_t1").hide();
        $("#pie_total_kg_t1").show();
      }
    }
  }

  //Tab 2
  function sort_cost(){
    if($("#select_cost").val() == "NSFC"){
      $("#combined_cost_nsfc").show();
      $("#combined_cost_nssc").hide();
    }
    else{
      $("#combined_cost_nsfc").hide();
      $("#combined_cost_nssc").show();
    }
  }
  function sort_unsur(){
    if($("#select_unsur").val() == "NSFC"){
      $("#combined_unsur_nsfc").show();
      $("#combined_unsur_nssc").hide();
    }
    else{
      $("#combined_unsur_nsfc").hide();
      $("#combined_unsur_nssc").show();
    }
  }

  //Tab 3
  function sort_raport(){
    var status = $('#select_status').val();
    var bulan = $('#select_bulan').val();
    var tahun = $('#select_tahun').val();
    var charge = $('#select_charge').val();

    location.href = "/PIS/dashboard/wilayah?wilayah=<?php echo $wil; ?>&status=" + status + "&bulan=" + bulan + "&tahun=" + tahun + "&charge=" + charge;
  }
  function sort_min_max(){
    if($("#select_min_max").val() == "0"){
      $(".Min").show();
      $(".Max").hide();
    }
    else{
      $(".Min").hide();
      $(".Max").show();
    }
  }

  function perlocation(){
    window.location.href="/PIS/dashboard/perlocationwilayah?wilayah=<?php echo $wil; ?>";
  }
  function pindah_pg(){
    window.location.href="/PIS/dashboard/plantation_group?pg="+$('#select_pg').val();
  }
  function pindah_wilayah(){
    if($('#select_wilayah').val() == '0'){
      window.location.href="/PIS/dashboard/plantation_group?pg="+$('#select_pg').val();
    }
    else{
      window.location.href="/PIS/dashboard/wilayah?wilayah="+$('#select_wilayah').val();
    }
  }
  function pindah_lokasi(){
    window.location.href="/PIS/dashboard/lokasi?lokasi="+$('#select_lokasi').val();
  }
  function detail_lokasi(lokasi){
    window.location.href="/PIS/dashboard/lokasi?lokasi="+lokasi;
  }
  function back(){
    window.location.href="/PIS/dashboard/dashboard/plantation_group?pg=<?php echo $wilayah['plantation_group']; ?>";
  }
  function main_menu(){
    window.location.href="/PIS/dashboard/main_menu";
  }
  function profile(){
    window.location.href="/PIS/dashboard/profile";
  }
  function sort_tahun_peta(){
    var tahun = $("#select_tahun_peta").val();

    switch (tahun) {
      case "T":
        $("#peta_all").show();
        $("#peta_t0").hide();
        $("#peta_t1").hide();
        break;
      case "T0":
        $("#peta_all").hide();
        $("#peta_t0").show();
        $("#peta_t1").hide();
        break;
      case "T1":
        $("#peta_all").hide();
        $("#peta_t0").hide();
        $("#peta_t1").show();
        break;
    }
    sort_performance();
  }

  function show_modal_show_foto(id){
    modal_show_foto.style.display = "block";
    var img = document.getElementById("show_foto");
    img.src = id;
  }
  function close_modal_show_foto(){
    modal_show_foto.style.display = "none";
  }

  window.onload = function() {
    var ctx_total_cost = document.getElementById('diagram_total_cost').getContext('2d');
    window.myDoughnut = new Chart(ctx_total_cost, config_total_cost);
    var ctx_std_total_cost = document.getElementById('diagram_std_total_cost').getContext('2d');
    window.myDoughnut = new Chart(ctx_std_total_cost, config_std_total_cost);
    //All
		var ctx_performance_ha = document.getElementById('diagram_performance_ha').getContext('2d');
		window.myPie = new Chart(ctx_performance_ha, config_performance_ha);
		var ctx_performance_kg = document.getElementById('diagram_performance_kg').getContext('2d');
		window.myPie = new Chart(ctx_performance_kg, config_performance_kg);
    //T0
		var ctx_performance_ha_t0 = document.getElementById('diagram_performance_ha_t0').getContext('2d');
		window.myPie = new Chart(ctx_performance_ha_t0, config_performance_ha_t0);
		var ctx_performance_kg_t0 = document.getElementById('diagram_performance_kg_t0').getContext('2d');
		window.myPie = new Chart(ctx_performance_kg_t0, config_performance_kg_t0);
    //T1
		var ctx_performance_ha_t1 = document.getElementById('diagram_performance_ha_t1').getContext('2d');
		window.myPie = new Chart(ctx_performance_ha_t1, config_performance_ha_t1);
		var ctx_performance_kg_t1 = document.getElementById('diagram_performance_kg_t1').getContext('2d');
		window.myPie = new Chart(ctx_performance_kg_t1, config_performance_kg_t1);

    var ctx_proporsi_luas = document.getElementById('diagram_proporsi_luas').getContext('2d');
		window.myPie = new Chart(ctx_proporsi_luas, config_proporsi_luas);
		var ctx_kondisi_drainase = document.getElementById('diagram_kondisi_drainase').getContext('2d');
		window.myPie = new Chart(ctx_kondisi_drainase, config_kondisi_drainase);
		var ctx_biaya_umur_nsfc = document.getElementById('diagram_biaya_umur_nsfc').getContext('2d');
		window.myPie = new Chart(ctx_biaya_umur_nsfc, config_biaya_umur_nsfc);
		var ctx_biaya_umur_nssc = document.getElementById('diagram_biaya_umur_nssc').getContext('2d');
		window.myPie = new Chart(ctx_biaya_umur_nssc, config_biaya_umur_nssc);
		var ctx_unsur_umur_nsfc = document.getElementById('diagram_unsur_umur_nsfc').getContext('2d');
		window.myPie = new Chart(ctx_unsur_umur_nsfc, config_unsur_umur_nsfc);
		var ctx_unsur_umur_nssc = document.getElementById('diagram_unsur_umur_nssc').getContext('2d');
		window.myPie = new Chart(ctx_unsur_umur_nssc, config_unsur_umur_nssc);
  };
</script>
