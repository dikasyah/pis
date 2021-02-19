<!-- PAGE CONTENT -->
<div class="page-content">

  <!-- PAGE CONTENT WRAPPER -->
  <div class="page-content-wrap">

    <div class="row">
      <div class="col-md-12" align="center">
        <div class="panel panel-default" style="margin-top:10px;">
          <div class="panel-heading" style="background-color:#228B22;">
            <div class="panel-title-box">
              <h1 style="color:white;" id="header_wip"><b>Working in Process</b></h1>
            </div>
            <ul class="panel-controls" style="margin-top: 15px;">
              <select class="form-control select" name="select_tahun" id="select_tahun" onchange="sort_tahun()">
                <option value="T">All</option>
                <option value="T0"><?php echo date('Y', strtotime($YEAR_BASE['nilai'])); ?></option>
                <option value="T1"><?php echo date('Y', strtotime($YEAR_BASE['nilai'])) + 1; ?></option>
              </select>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="row" align="center">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
              <div class="col-md-7" style="padding:0px;padding-right:1px;">
                <div class="row">
                  <div class="col-md-6 col-xs-6">
                    <a href="<?php echo base_url("dashboard/plantation_group?pg=PG2"); ?>"><h2><b>PG 2</b></h2></a>
                  </div>
                  <div class="col-md-6 col-xs-6">
                    <a href="<?php echo base_url("dashboard/plantation_group?pg=PG1"); ?>"><h2><b>PG 1</b></h2></a>
                  </div>
                </div>
                <div class="row">
                  <div id="peta12_all" style="width:100%;height:400px;"></div>
                  <div id="peta12_t0" style="width:100%;height:400px;display:none;"></div>
                  <div id="peta12_t1" style="width:100%;height:400px;display:none;"></div>
                </div>
              </div>
              <div class="col-md-5" style="padding:0px;padding-left:1px;">
                <div class="row">
                  <div class="col-md-12 col-xs-12">
                    <a href="<?php echo base_url("dashboard/plantation_group?pg=PG3"); ?>"><h2><b>PG 3</b></h2></a>
                  </div>
                </div>
                <div class="row">
                  <div id="peta3_all" style="width:100%;height:400px;"></div>
                  <div id="peta3_t0" style="width:100%;height:400px;display:none;"></div>
                  <div id="peta3_t1" style="width:100%;height:400px;display:none;"></div>
                </div>
              </div>
<script>
  function initMap() {
    var map12_all = new google.maps.Map(document.getElementById('peta12_all'), {
      center:new google.maps.LatLng(-4.757848, 105.192331),
      zoom:11,
      mapTypeId: google.maps.MapTypeId.SATELLITE
    });
    var map12_t0 = new google.maps.Map(document.getElementById('peta12_t0'), {
      center:new google.maps.LatLng(-4.757848, 105.192331),
      zoom:11,
      mapTypeId: google.maps.MapTypeId.SATELLITE
    });
    var map12_t1 = new google.maps.Map(document.getElementById('peta12_t1'), {
      center:new google.maps.LatLng(-4.757848, 105.192331),
      zoom:11,
      mapTypeId: google.maps.MapTypeId.SATELLITE
    });
    var map3_all = new google.maps.Map(document.getElementById('peta3_all'), {
      center:new google.maps.LatLng(-4.632863, 105.352955),
      zoom:11.5,
      mapTypeId: google.maps.MapTypeId.SATELLITE
    });
    var map3_t0 = new google.maps.Map(document.getElementById('peta3_t0'), {
      center:new google.maps.LatLng(-4.632863, 105.352955),
      zoom:11.5,
      mapTypeId: google.maps.MapTypeId.SATELLITE
    });
    var map3_t1 = new google.maps.Map(document.getElementById('peta3_t1'), {
      center:new google.maps.LatLng(-4.632863, 105.352955),
      zoom:11.5,
      mapTypeId: google.maps.MapTypeId.SATELLITE
    });
<?php
  //Tahun ALL
  foreach ($coordinate_12_all as $co) {
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

    switch ($co->pg) {
      case 'PG1':
        $warna_border = "#FF4500";
        break;
      case 'PG2':
        $warna_border = "#00FFFF";
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
      strokeOpacity: 0.6,
      strokeWeight: 0.8,
      fillColor: '<?php echo $warna_isi; ?>',
      fillOpacity: 0.3
    });
    lok<?php echo $co->lokasi; ?>.setMap(map12_all);
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
      iw<?php echo $co->lokasi; ?> = new google.maps.InfoWindow();
      iw<?php echo $co->lokasi; ?>.setContent(info<?php echo $co->lokasi; ?>);
      iw<?php echo $co->lokasi; ?>.setPosition(event.latLng);
      iw<?php echo $co->lokasi; ?>.open(map12_all);
    });
    google.maps.event.addListener(map12_all, 'click', function() {
      iw<?php echo $co->lokasi; ?>.close();
    });
<?php
  }
  //Tahun T0
  foreach ($coordinate_12_t0 as $co) {
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

    switch ($co->pg) {
      case 'PG1':
        $warna_border = "#FF4500";
        break;
      case 'PG2':
        $warna_border = "#00FFFF";
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
      strokeOpacity: 0.6,
      strokeWeight: 0.8,
      fillColor: '<?php echo $warna_isi; ?>',
      fillOpacity: 0.3
    });
    lok<?php echo $co->lokasi; ?>.setMap(map12_t0);
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
      iw<?php echo $co->lokasi; ?> = new google.maps.InfoWindow();
      iw<?php echo $co->lokasi; ?>.setContent(info<?php echo $co->lokasi; ?>);
      iw<?php echo $co->lokasi; ?>.setPosition(event.latLng);
      iw<?php echo $co->lokasi; ?>.open(map12_t0);
    });
    google.maps.event.addListener(map12_t0, 'click', function() {
      iw<?php echo $co->lokasi; ?>.close();
    });
<?php
  }
  //Tahun T0
  foreach ($coordinate_12_t1 as $co) {
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

    switch ($co->pg) {
      case 'PG1':
        $warna_border = "#FF4500";
        break;
      case 'PG2':
        $warna_border = "#00FFFF";
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
      strokeOpacity: 0.6,
      strokeWeight: 0.8,
      fillColor: '<?php echo $warna_isi; ?>',
      fillOpacity: 0.3
    });
    lok<?php echo $co->lokasi; ?>.setMap(map12_t1);
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
      iw<?php echo $co->lokasi; ?> = new google.maps.InfoWindow();
      iw<?php echo $co->lokasi; ?>.setContent(info<?php echo $co->lokasi; ?>);
      iw<?php echo $co->lokasi; ?>.setPosition(event.latLng);
      iw<?php echo $co->lokasi; ?>.open(map12_t1);
    });
    google.maps.event.addListener(map12_t1, 'click', function() {
      iw<?php echo $co->lokasi; ?>.close();
    });
<?php
  }
  //Tahun ALL
  foreach ($coordinate_3_all as $co) {
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

    switch ($co->pg) {
      case 'PG3':
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
      strokeOpacity: 0.6,
      strokeWeight: 0.8,
      fillColor: '<?php echo $warna_isi; ?>',
      fillOpacity: 0.3
    });
    lok<?php echo $co->lokasi; ?>.setMap(map3_all);
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
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->wilayah.$co->kebun; ?></b></td>" +
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
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Umur</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php if($co->umur == NULL) echo '-'; else echo round($co->umur); ?> Bulan</b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Category</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php if($co->category_rp_per_ha == NULL) echo '-'; else echo $co->category_rp_per_ha; ?></b></td>" +
          "</tr>" +
        "</table>" +
      "</div>";
      iw<?php echo $co->lokasi; ?> = new google.maps.InfoWindow();
      iw<?php echo $co->lokasi; ?>.setContent(info<?php echo $co->lokasi; ?>);
      iw<?php echo $co->lokasi; ?>.setPosition(event.latLng);
      iw<?php echo $co->lokasi; ?>.open(map3_all);
    });
    google.maps.event.addListener(map3_all, 'click', function() {
      iw<?php echo $co->lokasi; ?>.close();
    });
<?php
  }
  //Tahun T0
  foreach ($coordinate_3_t0 as $co) {
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

    switch ($co->pg) {
      case 'PG3':
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
      strokeOpacity: 0.6,
      strokeWeight: 0.8,
      fillColor: '<?php echo $warna_isi; ?>',
      fillOpacity: 0.3
    });
    lok<?php echo $co->lokasi; ?>.setMap(map3_t0);
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
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->wilayah.$co->kebun; ?></b></td>" +
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
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Umur</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php if($co->umur == NULL) echo '-'; else echo round($co->umur); ?> Bulan</b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Category</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php if($co->category_rp_per_ha == NULL) echo '-'; else echo $co->category_rp_per_ha; ?></b></td>" +
          "</tr>" +
        "</table>" +
      "</div>";
      iw<?php echo $co->lokasi; ?> = new google.maps.InfoWindow();
      iw<?php echo $co->lokasi; ?>.setContent(info<?php echo $co->lokasi; ?>);
      iw<?php echo $co->lokasi; ?>.setPosition(event.latLng);
      iw<?php echo $co->lokasi; ?>.open(map3_t0);
    });
    google.maps.event.addListener(map3_t0, 'click', function() {
      iw<?php echo $co->lokasi; ?>.close();
    });
<?php
  }
  //Tahun T1
  foreach ($coordinate_3_t1 as $co) {
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

    switch ($co->pg) {
      case 'PG3':
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
      strokeOpacity: 0.6,
      strokeWeight: 0.8,
      fillColor: '<?php echo $warna_isi; ?>',
      fillOpacity: 0.3
    });
    lok<?php echo $co->lokasi; ?>.setMap(map3_t1);
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
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->wilayah.$co->kebun; ?></b></td>" +
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
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Umur</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php if($co->umur == NULL) echo '-'; else echo round($co->umur); ?> Bulan</b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Category</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php if($co->category_rp_per_ha == NULL) echo '-'; else echo $co->category_rp_per_ha; ?></b></td>" +
          "</tr>" +
        "</table>" +
      "</div>";
      iw<?php echo $co->lokasi; ?> = new google.maps.InfoWindow();
      iw<?php echo $co->lokasi; ?>.setContent(info<?php echo $co->lokasi; ?>);
      iw<?php echo $co->lokasi; ?>.setPosition(event.latLng);
      iw<?php echo $co->lokasi; ?>.open(map3_t1);
    });
    google.maps.event.addListener(map3_t1, 'click', function() {
      iw<?php echo $co->lokasi; ?>.close();
    });
<?php
  }
?>
    if(navigator.geolocation){
      navigator.geolocation.getCurrentPosition(function(p){
        var cp12_all = new google.maps.Marker({
          position:{
            lat: p.coords.latitude,
            lng: p.coords.longitude
          },
          map: map12_all,
          icon: '/PIS/assets/images/marker.png'
        });
        var cp12_t1 = new google.maps.Marker({
          position:{
            lat: p.coords.latitude,
            lng: p.coords.longitude
          },
          map: map12_t0,
          icon: '/PIS/assets/images/marker.png'
        });
        var cp12_t1 = new google.maps.Marker({
          position:{
            lat: p.coords.latitude,
            lng: p.coords.longitude
          },
          map: map12_t1,
          icon: '/PIS/assets/images/marker.png'
        });

        var cp3_all = new google.maps.Marker({
          position:{
            lat: p.coords.latitude,
            lng: p.coords.longitude
          },
          map: map3_all,
          icon: '/PIS/assets/images/marker.png'
        });
        var cp3_t1 = new google.maps.Marker({
          position:{
            lat: p.coords.latitude,
            lng: p.coords.longitude
          },
          map: map3_t0,
          icon: '/PIS/assets/images/marker.png'
        });
        var cp3_t1 = new google.maps.Marker({
          position:{
            lat: p.coords.latitude,
            lng: p.coords.longitude
          },
          map: map3_t1,
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

    <div class="row">
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading" style="background-color:#0000FF;">
            <div class="panel-title-box">
              <h3 style="color:white;">Performance Plantation Group</h3>
              <span style="color:white;">Base on Rp/Ha</span>
            </div>
            <ul class="panel-controls" style="margin-top: 2px;">
              <select class="form-control select" name="select_ha" id="select_ha" onchange="sort_ha()">
                <option value="1">Comparison</option>
                <option value="2">Total</option>
              </select>
            </ul>
          </div>
          <div class="panel-body">
            <div class="chart-holder">
<?php
  //All
  $total_ha_pg1 = (round($performance['PG1']['Excellent_rp_per_ha'] / $performance['PG1']['Total'] * 100));
  $total_ha_pg1 .= ', '.(round($performance['PG1']['Good_rp_per_ha'] / $performance['PG1']['Total'] * 100));
  $total_ha_pg1 .= ', '.(round($performance['PG1']['Poor_rp_per_ha'] / $performance['PG1']['Total'] * 100));

  $total_ha_pg2 = (round($performance['PG2']['Excellent_rp_per_ha'] / $performance['PG2']['Total'] * 100));
  $total_ha_pg2 .= ', '.(round($performance['PG2']['Good_rp_per_ha'] / $performance['PG2']['Total'] * 100));
  $total_ha_pg2 .= ', '.(round($performance['PG2']['Poor_rp_per_ha'] / $performance['PG2']['Total'] * 100));

  $total_ha_pg3 = (round($performance['PG3']['Excellent_rp_per_ha'] / $performance['PG3']['Total'] * 100));
  $total_ha_pg3 .= ', '.(round($performance['PG3']['Good_rp_per_ha'] / $performance['PG3']['Total'] * 100));
  $total_ha_pg3 .= ', '.(round($performance['PG3']['Poor_rp_per_ha'] / $performance['PG3']['Total'] * 100));


  $comparison_ha_excellent = (round($performance['PG1']['Excellent_rp_per_ha'] / $performance['PG1']['Total'] * 100));
  $comparison_ha_excellent .= ', '.(round($performance['PG2']['Excellent_rp_per_ha'] / $performance['PG2']['Total'] * 100));
  $comparison_ha_excellent .= ', '.(round($performance['PG3']['Excellent_rp_per_ha'] / $performance['PG3']['Total'] * 100));

  $comparison_ha_good = (round($performance['PG1']['Good_rp_per_ha'] / $performance['PG1']['Total'] * 100));
  $comparison_ha_good .= ', '.(round($performance['PG2']['Good_rp_per_ha'] / $performance['PG2']['Total'] * 100));
  $comparison_ha_good .= ', '.(round($performance['PG3']['Good_rp_per_ha'] / $performance['PG3']['Total'] * 100));

  $comparison_ha_poor = (round($performance['PG1']['Poor_rp_per_ha'] / $performance['PG1']['Total'] * 100));
  $comparison_ha_poor .= ', '.(round($performance['PG2']['Poor_rp_per_ha'] / $performance['PG2']['Total'] * 100));
  $comparison_ha_poor .= ', '.(round($performance['PG3']['Poor_rp_per_ha'] / $performance['PG3']['Total'] * 100));

  //T0
  $total_ha_pg1_t0 = (round($performance_t0['PG1']['Excellent_rp_per_ha'] / $performance_t0['PG1']['Total'] * 100));
  $total_ha_pg1_t0 .= ', '.(round($performance_t0['PG1']['Good_rp_per_ha'] / $performance_t0['PG1']['Total'] * 100));
  $total_ha_pg1_t0 .= ', '.(round($performance_t0['PG1']['Poor_rp_per_ha'] / $performance_t0['PG1']['Total'] * 100));

  $total_ha_pg2_t0 = (round($performance_t0['PG2']['Excellent_rp_per_ha'] / $performance_t0['PG2']['Total'] * 100));
  $total_ha_pg2_t0 .= ', '.(round($performance_t0['PG2']['Good_rp_per_ha'] / $performance_t0['PG2']['Total'] * 100));
  $total_ha_pg2_t0 .= ', '.(round($performance_t0['PG2']['Poor_rp_per_ha'] / $performance_t0['PG2']['Total'] * 100));

  $total_ha_pg3_t0 = (round($performance_t0['PG3']['Excellent_rp_per_ha'] / $performance_t0['PG3']['Total'] * 100));
  $total_ha_pg3_t0 .= ', '.(round($performance_t0['PG3']['Good_rp_per_ha'] / $performance_t0['PG3']['Total'] * 100));
  $total_ha_pg3_t0 .= ', '.(round($performance_t0['PG3']['Poor_rp_per_ha'] / $performance_t0['PG3']['Total'] * 100));


  $comparison_ha_excellent_t0 = (round($performance_t0['PG1']['Excellent_rp_per_ha'] / $performance_t0['PG1']['Total'] * 100));
  $comparison_ha_excellent_t0 .= ', '.(round($performance_t0['PG2']['Excellent_rp_per_ha'] / $performance_t0['PG2']['Total'] * 100));
  $comparison_ha_excellent_t0 .= ', '.(round($performance_t0['PG3']['Excellent_rp_per_ha'] / $performance_t0['PG3']['Total'] * 100));

  $comparison_ha_good_t0 = (round($performance_t0['PG1']['Good_rp_per_ha'] / $performance_t0['PG1']['Total'] * 100));
  $comparison_ha_good_t0 .= ', '.(round($performance_t0['PG2']['Good_rp_per_ha'] / $performance_t0['PG2']['Total'] * 100));
  $comparison_ha_good_t0 .= ', '.(round($performance_t0['PG3']['Good_rp_per_ha'] / $performance_t0['PG3']['Total'] * 100));

  $comparison_ha_poor_t0 = (round($performance_t0['PG1']['Poor_rp_per_ha'] / $performance_t0['PG1']['Total'] * 100));
  $comparison_ha_poor_t0 .= ', '.(round($performance_t0['PG2']['Poor_rp_per_ha'] / $performance_t0['PG2']['Total'] * 100));
  $comparison_ha_poor_t0 .= ', '.(round($performance_t0['PG3']['Poor_rp_per_ha'] / $performance_t0['PG3']['Total'] * 100));

  //T1
  $total_ha_pg1_t1 = (round($performance_t1['PG1']['Excellent_rp_per_ha'] / $performance_t1['PG1']['Total'] * 100));
  $total_ha_pg1_t1 .= ', '.(round($performance_t1['PG1']['Good_rp_per_ha'] / $performance_t1['PG1']['Total'] * 100));
  $total_ha_pg1_t1 .= ', '.(round($performance_t1['PG1']['Poor_rp_per_ha'] / $performance_t1['PG1']['Total'] * 100));

  $total_ha_pg2_t1 = (round($performance_t1['PG2']['Excellent_rp_per_ha'] / $performance_t1['PG2']['Total'] * 100));
  $total_ha_pg2_t1 .= ', '.(round($performance_t1['PG2']['Good_rp_per_ha'] / $performance_t1['PG2']['Total'] * 100));
  $total_ha_pg2_t1 .= ', '.(round($performance_t1['PG2']['Poor_rp_per_ha'] / $performance_t1['PG2']['Total'] * 100));

  $total_ha_pg3_t1 = (round($performance_t1['PG3']['Excellent_rp_per_ha'] / $performance_t1['PG3']['Total'] * 100));
  $total_ha_pg3_t1 .= ', '.(round($performance_t1['PG3']['Good_rp_per_ha'] / $performance_t1['PG3']['Total'] * 100));
  $total_ha_pg3_t1 .= ', '.(round($performance_t1['PG3']['Poor_rp_per_ha'] / $performance_t1['PG3']['Total'] * 100));


  $comparison_ha_excellent_t1 = (round($performance_t1['PG1']['Excellent_rp_per_ha'] / $performance_t1['PG1']['Total'] * 100));
  $comparison_ha_excellent_t1 .= ', '.(round($performance_t1['PG2']['Excellent_rp_per_ha'] / $performance_t1['PG2']['Total'] * 100));
  $comparison_ha_excellent_t1 .= ', '.(round($performance_t1['PG3']['Excellent_rp_per_ha'] / $performance_t1['PG3']['Total'] * 100));

  $comparison_ha_good_t1 = (round($performance_t1['PG1']['Good_rp_per_ha'] / $performance_t1['PG1']['Total'] * 100));
  $comparison_ha_good_t1 .= ', '.(round($performance_t1['PG2']['Good_rp_per_ha'] / $performance_t1['PG2']['Total'] * 100));
  $comparison_ha_good_t1 .= ', '.(round($performance_t1['PG3']['Good_rp_per_ha'] / $performance_t1['PG3']['Total'] * 100));

  $comparison_ha_poor_t1 = (round($performance_t1['PG1']['Poor_rp_per_ha'] / $performance_t1['PG1']['Total'] * 100));
  $comparison_ha_poor_t1 .= ', '.(round($performance_t1['PG2']['Poor_rp_per_ha'] / $performance_t1['PG2']['Total'] * 100));
  $comparison_ha_poor_t1 .= ', '.(round($performance_t1['PG3']['Poor_rp_per_ha'] / $performance_t1['PG3']['Total'] * 100));
?>
              <div style="display:none;" id="bar_compiration_ha">
                <canvas id="diagram_comparison_ha" ></canvas>
<script>
  var config_comparison_ha = {
    type: 'bar',
    data: {
    labels: ['Excellent', 'Good', 'Poor'],
    datasets: [{
      label: 'PG 1',
      backgroundColor: [
				'#00FF00',
				'#FFA500',
				'#FF0000',
			],
      borderColor: [
				'#00FF00',
				'#FFA500',
				'#FF0000',
			],
      borderWidth: 1,
      data: [
        <?php echo $total_ha_pg1; ?>
      ]
      }, {
      label: 'PG 2',
      backgroundColor: [
				'#00FF00',
				'#FFA500',
				'#FF0000',
			],
      borderColor: [
				'#00FF00',
				'#FFA500',
				'#FF0000',
			],
      borderWidth: 1,
      data: [
        <?php echo $total_ha_pg2; ?>
      ]
      }, {
      label: 'PG 3',
      backgroundColor: [
				'#00FF00',
				'#FFA500',
				'#FF0000',
			],
      borderColor: [
				'#00FF00',
				'#FFA500',
				'#FF0000',
			],
      borderWidth: 1,
      data: [
        <?php echo $total_ha_pg3; ?>
      ]
      }]
    },
    options: {
      responsive: true,
      legend: {
        display: false,
        position: 'bottom',
        labels: {
          usePointStyle: true,
        }
      },
      title: {
        display: false,
        text: 'Tonase Sebelum Panen (Ton/Ha)'
      },
      tooltips: {
        mode: 'index',
        intersect: false,
        callbacks: {
          label: function(tooltipItem, data) {
            var label = data.datasets[tooltipItem.datasetIndex].label;
            var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            return label + ' : ' + val + '%';
          }
        }
      },
      scales: {
        yAxes: [{
          gridLines: {
            display: false,
            drawBorder: false,
            drawOnChartArea: false,
          },
          ticks: {
            max: 100,
            min: 0
          }
        }],
        xAxes: [{
          gridLines: {
            display: false,
            drawBorder: true,
            drawOnChartArea: false,
          }
        }]
      },
      animation: {
        onComplete: function () {
          var chartInstance = this.chart;
          var ctx = chartInstance.ctx;
          ctx.textAlign = "center";

          Chart.helpers.each(this.data.datasets.forEach(function (dataset, i) {
            var meta = chartInstance.controller.getDatasetMeta(i);
            Chart.helpers.each(meta.data.forEach(function (bar, index) {
              ctx.fillText(dataset.data[index] + '%', bar._model.x, bar._model.y - 10);
            }),this)
          }),this);
        }
      }
    }
  };
</script>
              </div>
              <div style="display:none;" id="bar_total_ha">
                <canvas id="diagram_total_ha"></canvas>
<script>
  var config_total_ha = {
    type: 'bar',
    data: {
    labels: ['PG1', 'PG2', 'PG3'],
    datasets: [{
      label: 'Excellent',
      backgroundColor: '#00FF00',
      borderColor: '#00FF00',
      borderWidth: 1,
      data: [
        <?php echo $comparison_ha_excellent; ?>
      ]
      }, {
      label: 'Good',
      backgroundColor: '#FFA500',
      borderColor: '#FFA500',
      borderWidth: 1,
      data: [
        <?php echo $comparison_ha_good; ?>
      ]
      }, {
      label: 'Poor',
      backgroundColor: '#FF0000',
      borderColor: '#FF0000',
      borderWidth: 1,
      data: [
        <?php echo $comparison_ha_poor; ?>
      ]
      }]
    },
    options: {
      responsive: true,
      legend: {
        position: 'bottom',
        labels: {
          usePointStyle: true,
        },
      },
      title: {
        display: false,
        text: 'Tonase Sebelum Panen (Ton/Ha)'
      },
      tooltips: {
        mode: 'index',
        intersect: false,
        callbacks: {
          label: function(tooltipItem, data) {
            var label = data.datasets[tooltipItem.datasetIndex].label;
            var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            return label + ' : ' + val + '%';
          }
        }
      },
      scales: {
        yAxes: [{
          gridLines: {
            display: false,
            drawBorder: false,
            drawOnChartArea: false,
          },
          ticks: {
            max: 100,
            min: 0
          }
        }],
        xAxes: [{
          gridLines: {
            display: false,
            drawBorder: true,
            drawOnChartArea: false,
          }
        }]
      },
      animation: {
        onComplete: function () {
          var chartInstance = this.chart;
          var ctx = chartInstance.ctx;
          ctx.textAlign = "center";

          Chart.helpers.each(this.data.datasets.forEach(function (dataset, i) {
            var meta = chartInstance.controller.getDatasetMeta(i);
            Chart.helpers.each(meta.data.forEach(function (bar, index) {
              ctx.fillText(dataset.data[index] + '%', bar._model.x, bar._model.y - 10);
            }),this)
          }),this);
        }
      }
    }
  };
</script>
              </div>
              <div style="display:none;" id="bar_compiration_ha_t0">
                <canvas id="diagram_comparison_ha_t0"></canvas>
<script>
  var config_comparison_ha_t0 = {
    type: 'bar',
    data: {
    labels: ['Excellent', 'Good', 'Poor'],
    datasets: [{
      label: 'PG 1',
      backgroundColor: [
				'#00FF00',
				'#FFA500',
				'#FF0000',
			],
      borderColor: [
				'#00FF00',
				'#FFA500',
				'#FF0000',
			],
      borderWidth: 1,
      data: [
        <?php echo $total_ha_pg1_t0; ?>
      ]
      }, {
      label: 'PG 2',
      backgroundColor: [
				'#00FF00',
				'#FFA500',
				'#FF0000',
			],
      borderColor: [
				'#00FF00',
				'#FFA500',
				'#FF0000',
			],
      borderWidth: 1,
      data: [
        <?php echo $total_ha_pg2_t0; ?>
      ]
      }, {
      label: 'PG 3',
      backgroundColor: [
				'#00FF00',
				'#FFA500',
				'#FF0000',
			],
      borderColor: [
				'#00FF00',
				'#FFA500',
				'#FF0000',
			],
      borderWidth: 1,
      data: [
        <?php echo $total_ha_pg3_t0; ?>
      ]
      }]
    },
    options: {
      responsive: true,
      legend: {
        display: false,
        position: 'bottom',
        labels: {
          usePointStyle: true,
        }
      },
      title: {
        display: false,
        text: 'Tonase Sebelum Panen (Ton/Ha)'
      },
      tooltips: {
        mode: 'index',
        intersect: false,
        callbacks: {
          label: function(tooltipItem, data) {
            var label = data.datasets[tooltipItem.datasetIndex].label;
            var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            return label + ' : ' + val + '%';
          }
        }
      },
      scales: {
        yAxes: [{
          gridLines: {
            display: false,
            drawBorder: false,
            drawOnChartArea: false,
          },
          ticks: {
            max: 100,
            min: 0
          }
        }],
        xAxes: [{
          gridLines: {
            display: false,
            drawBorder: true,
            drawOnChartArea: false,
          }
        }]
      },
      animation: {
        onComplete: function () {
          var chartInstance = this.chart;
          var ctx = chartInstance.ctx;
          ctx.textAlign = "center";

          Chart.helpers.each(this.data.datasets.forEach(function (dataset, i) {
            var meta = chartInstance.controller.getDatasetMeta(i);
            Chart.helpers.each(meta.data.forEach(function (bar, index) {
              ctx.fillText(dataset.data[index] + '%', bar._model.x, bar._model.y - 10);
            }),this)
          }),this);
        }
      }
    }
  };
</script>
              </div>
              <div style="display:none;" id="bar_total_ha_t0">
                <canvas id="diagram_total_ha_t0"></canvas>
<script>
  var config_total_ha_t0 = {
    type: 'bar',
    data: {
    labels: ['PG1', 'PG2', 'PG3'],
    datasets: [{
      label: 'Excellent',
      backgroundColor: '#00FF00',
      borderColor: '#00FF00',
      borderWidth: 1,
      data: [
        <?php echo $comparison_ha_excellent_t0; ?>
      ]
      }, {
      label: 'Good',
      backgroundColor: '#FFA500',
      borderColor: '#FFA500',
      borderWidth: 1,
      data: [
        <?php echo $comparison_ha_good_t0; ?>
      ]
      }, {
      label: 'Poor',
      backgroundColor: '#FF0000',
      borderColor: '#FF0000',
      borderWidth: 1,
      data: [
        <?php echo $comparison_ha_poor_t0; ?>
      ]
      }]
    },
    options: {
      responsive: true,
      legend: {
        position: 'bottom',
        labels: {
          usePointStyle: true,
        },
      },
      title: {
        display: false,
        text: 'Tonase Sebelum Panen (Ton/Ha)'
      },
      tooltips: {
        mode: 'index',
        intersect: false,
        callbacks: {
          label: function(tooltipItem, data) {
            var label = data.datasets[tooltipItem.datasetIndex].label;
            var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            return label + ' : ' + val + '%';
          }
        }
      },
      scales: {
        yAxes: [{
          gridLines: {
            display: false,
            drawBorder: false,
            drawOnChartArea: false,
          },
          ticks: {
            max: 100,
            min: 0
          }
        }],
        xAxes: [{
          gridLines: {
            display: false,
            drawBorder: true,
            drawOnChartArea: false,
          }
        }]
      },
      animation: {
        onComplete: function () {
          var chartInstance = this.chart;
          var ctx = chartInstance.ctx;
          ctx.textAlign = "center";

          Chart.helpers.each(this.data.datasets.forEach(function (dataset, i) {
            var meta = chartInstance.controller.getDatasetMeta(i);
            Chart.helpers.each(meta.data.forEach(function (bar, index) {
              ctx.fillText(dataset.data[index] + '%', bar._model.x, bar._model.y - 10);
            }),this)
          }),this);
        }
      }
    }
  };
</script>
              </div>
              <div style="display:none;" id="bar_compiration_ha_t1">
                <canvas id="diagram_comparison_ha_t1"></canvas>
<script>
  var config_comparison_ha_t1 = {
    type: 'bar',
    data: {
    labels: ['Excellent', 'Good', 'Poor'],
    datasets: [{
      label: 'PG 1',
      backgroundColor: [
				'#00FF00',
				'#FFA500',
				'#FF0000',
			],
      borderColor: [
				'#00FF00',
				'#FFA500',
				'#FF0000',
			],
      borderWidth: 1,
      data: [
        <?php echo $total_ha_pg1_t1; ?>
      ]
      }, {
      label: 'PG 2',
      backgroundColor: [
				'#00FF00',
				'#FFA500',
				'#FF0000',
			],
      borderColor: [
				'#00FF00',
				'#FFA500',
				'#FF0000',
			],
      borderWidth: 1,
      data: [
        <?php echo $total_ha_pg2_t1; ?>
      ]
      }, {
      label: 'PG 3',
      backgroundColor: [
				'#00FF00',
				'#FFA500',
				'#FF0000',
			],
      borderColor: [
				'#00FF00',
				'#FFA500',
				'#FF0000',
			],
      borderWidth: 1,
      data: [
        <?php echo $total_ha_pg3_t1; ?>
      ]
      }]
    },
    options: {
      responsive: true,
      legend: {
        display: false,
        position: 'bottom',
        labels: {
          usePointStyle: true,
        }
      },
      title: {
        display: false,
        text: 'Tonase Sebelum Panen (Ton/Ha)'
      },
      tooltips: {
        mode: 'index',
        intersect: false,
        callbacks: {
          label: function(tooltipItem, data) {
            var label = data.datasets[tooltipItem.datasetIndex].label;
            var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            return label + ' : ' + val + '%';
          }
        }
      },
      scales: {
        yAxes: [{
          gridLines: {
            display: false,
            drawBorder: false,
            drawOnChartArea: false,
          },
          ticks: {
            max: 100,
            min: 0
          }
        }],
        xAxes: [{
          gridLines: {
            display: false,
            drawBorder: true,
            drawOnChartArea: false,
          }
        }]
      },
      animation: {
        onComplete: function () {
          var chartInstance = this.chart;
          var ctx = chartInstance.ctx;
          ctx.textAlign = "center";

          Chart.helpers.each(this.data.datasets.forEach(function (dataset, i) {
            var meta = chartInstance.controller.getDatasetMeta(i);
            Chart.helpers.each(meta.data.forEach(function (bar, index) {
              ctx.fillText(dataset.data[index] + '%', bar._model.x, bar._model.y - 10);
            }),this)
          }),this);
        }
      }
    }
  };
</script>
              </div>
              <div style="display:none;" id="bar_total_ha_t1">
                <canvas id="diagram_total_ha_t1"></canvas>
<script>
  var config_total_ha_t1 = {
    type: 'bar',
    data: {
    labels: ['PG1', 'PG2', 'PG3'],
    datasets: [{
      label: 'Excellent',
      backgroundColor: '#00FF00',
      borderColor: '#00FF00',
      borderWidth: 1,
      data: [
        <?php echo $comparison_ha_excellent_t1; ?>
      ]
      }, {
      label: 'Good',
      backgroundColor: '#FFA500',
      borderColor: '#FFA500',
      borderWidth: 1,
      data: [
        <?php echo $comparison_ha_good_t1; ?>
      ]
      }, {
      label: 'Poor',
      backgroundColor: '#FF0000',
      borderColor: '#FF0000',
      borderWidth: 1,
      data: [
        <?php echo $comparison_ha_poor_t1; ?>
      ]
      }]
    },
    options: {
      responsive: true,
      legend: {
        position: 'bottom',
        labels: {
          usePointStyle: true,
        },
      },
      title: {
        display: false,
        text: 'Tonase Sebelum Panen (Ton/Ha)'
      },
      tooltips: {
        mode: 'index',
        intersect: false,
        callbacks: {
          label: function(tooltipItem, data) {
            var label = data.datasets[tooltipItem.datasetIndex].label;
            var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            return label + ' : ' + val + '%';
          }
        }
      },
      scales: {
        yAxes: [{
          gridLines: {
            display: false,
            drawBorder: false,
            drawOnChartArea: false,
          },
          ticks: {
            max: 100,
            min: 0
          }
        }],
        xAxes: [{
          gridLines: {
            display: false,
            drawBorder: true,
            drawOnChartArea: false,
          }
        }]
      },
      animation: {
        onComplete: function () {
          var chartInstance = this.chart;
          var ctx = chartInstance.ctx;
          ctx.textAlign = "center";

          Chart.helpers.each(this.data.datasets.forEach(function (dataset, i) {
            var meta = chartInstance.controller.getDatasetMeta(i);
            Chart.helpers.each(meta.data.forEach(function (bar, index) {
              ctx.fillText(dataset.data[index] + '%', bar._model.x, bar._model.y - 10);
            }),this)
          }),this);
        }
      }
    }
  };
</script>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading" style="background-color:#0000FF;">
            <div class="panel-title-box">
              <h3 style="color:white;">Performance Plantation Group</h3>
              <span style="color:white;">Base on Rp/Kg</span>
            </div>
            <ul class="panel-controls" style="margin-top: 2px;">
              <select class="form-control select" name="select_kg" id="select_kg" onchange="sort_kg()">
                <option value="1">Comparison</option>
                <option value="2">Total</option>
              </select>
            </ul>
          </div>
          <div class="panel-body">
            <div class="chart-holder">
<?php
  //All
  $total_kg_pg1 = (round($performance['PG1']['Excellent_rp_per_kg'] / $performance['PG1']['Total'] * 100));
  $total_kg_pg1 .= ', '.(round($performance['PG1']['Good_rp_per_kg'] / $performance['PG1']['Total'] * 100));
  $total_kg_pg1 .= ', '.(round($performance['PG1']['Poor_rp_per_kg'] / $performance['PG1']['Total'] * 100));

  $total_kg_pg2 = (round($performance['PG2']['Excellent_rp_per_kg'] / $performance['PG2']['Total'] * 100));
  $total_kg_pg2 .= ', '.(round($performance['PG2']['Good_rp_per_kg'] / $performance['PG2']['Total'] * 100));
  $total_kg_pg2 .= ', '.(round($performance['PG2']['Poor_rp_per_kg'] / $performance['PG2']['Total'] * 100));

  $total_kg_pg3 = (round($performance['PG3']['Excellent_rp_per_kg'] / $performance['PG3']['Total'] * 100));
  $total_kg_pg3 .= ', '.(round($performance['PG3']['Good_rp_per_kg'] / $performance['PG3']['Total'] * 100));
  $total_kg_pg3 .= ', '.(round($performance['PG3']['Poor_rp_per_kg'] / $performance['PG3']['Total'] * 100));


  $comparison_kg_excellent = (round($performance['PG1']['Excellent_rp_per_kg'] / $performance['PG1']['Total'] * 100));
  $comparison_kg_excellent .= ', '.(round($performance['PG2']['Excellent_rp_per_kg'] / $performance['PG2']['Total'] * 100));
  $comparison_kg_excellent .= ', '.(round($performance['PG3']['Excellent_rp_per_kg'] / $performance['PG3']['Total'] * 100));

  $comparison_kg_good = (round($performance['PG1']['Good_rp_per_kg'] / $performance['PG1']['Total'] * 100));
  $comparison_kg_good .= ', '.(round($performance['PG2']['Good_rp_per_kg'] / $performance['PG2']['Total'] * 100));
  $comparison_kg_good .= ', '.(round($performance['PG3']['Good_rp_per_kg'] / $performance['PG3']['Total'] * 100));

  $comparison_kg_poor = (round($performance['PG1']['Poor_rp_per_kg'] / $performance['PG1']['Total'] * 100));
  $comparison_kg_poor .= ', '.(round($performance['PG2']['Poor_rp_per_kg'] / $performance['PG2']['Total'] * 100));
  $comparison_kg_poor .= ', '.(round($performance['PG3']['Poor_rp_per_kg'] / $performance['PG3']['Total'] * 100));

  //T0
  $total_kg_pg1_t0 = (round($performance_t0['PG1']['Excellent_rp_per_kg'] / $performance_t0['PG1']['Total'] * 100));
  $total_kg_pg1_t0 .= ', '.(round($performance_t0['PG1']['Good_rp_per_kg'] / $performance_t0['PG1']['Total'] * 100));
  $total_kg_pg1_t0 .= ', '.(round($performance_t0['PG1']['Poor_rp_per_kg'] / $performance_t0['PG1']['Total'] * 100));

  $total_kg_pg2_t0 = (round($performance_t0['PG2']['Excellent_rp_per_kg'] / $performance_t0['PG2']['Total'] * 100));
  $total_kg_pg2_t0 .= ', '.(round($performance_t0['PG2']['Good_rp_per_kg'] / $performance_t0['PG2']['Total'] * 100));
  $total_kg_pg2_t0 .= ', '.(round($performance_t0['PG2']['Poor_rp_per_kg'] / $performance_t0['PG2']['Total'] * 100));

  $total_kg_pg3_t0 = (round($performance_t0['PG3']['Excellent_rp_per_kg'] / $performance_t0['PG3']['Total'] * 100));
  $total_kg_pg3_t0 .= ', '.(round($performance_t0['PG3']['Good_rp_per_kg'] / $performance_t0['PG3']['Total'] * 100));
  $total_kg_pg3_t0 .= ', '.(round($performance_t0['PG3']['Poor_rp_per_kg'] / $performance_t0['PG3']['Total'] * 100));


  $comparison_kg_excellent_t0 = (round($performance_t0['PG1']['Excellent_rp_per_kg'] / $performance_t0['PG1']['Total'] * 100));
  $comparison_kg_excellent_t0 .= ', '.(round($performance_t0['PG2']['Excellent_rp_per_kg'] / $performance_t0['PG2']['Total'] * 100));
  $comparison_kg_excellent_t0 .= ', '.(round($performance_t0['PG3']['Excellent_rp_per_kg'] / $performance_t0['PG3']['Total'] * 100));

  $comparison_kg_good_t0 = (round($performance_t0['PG1']['Good_rp_per_kg'] / $performance_t0['PG1']['Total'] * 100));
  $comparison_kg_good_t0 .= ', '.(round($performance_t0['PG2']['Good_rp_per_kg'] / $performance_t0['PG2']['Total'] * 100));
  $comparison_kg_good_t0 .= ', '.(round($performance_t0['PG3']['Good_rp_per_kg'] / $performance_t0['PG3']['Total'] * 100));

  $comparison_kg_poor_t0 = (round($performance_t0['PG1']['Poor_rp_per_kg'] / $performance_t0['PG1']['Total'] * 100));
  $comparison_kg_poor_t0 .= ', '.(round($performance_t0['PG2']['Poor_rp_per_kg'] / $performance_t0['PG2']['Total'] * 100));
  $comparison_kg_poor_t0 .= ', '.(round($performance_t0['PG3']['Poor_rp_per_kg'] / $performance_t0['PG3']['Total'] * 100));

  //T1
  $total_kg_pg1_t1 = (round($performance_t1['PG1']['Excellent_rp_per_kg'] / $performance_t1['PG1']['Total'] * 100));
  $total_kg_pg1_t1 .= ', '.(round($performance_t1['PG1']['Good_rp_per_kg'] / $performance_t1['PG1']['Total'] * 100));
  $total_kg_pg1_t1 .= ', '.(round($performance_t1['PG1']['Poor_rp_per_kg'] / $performance_t1['PG1']['Total'] * 100));

  $total_kg_pg2_t1 = (round($performance_t1['PG2']['Excellent_rp_per_kg'] / $performance_t1['PG2']['Total'] * 100));
  $total_kg_pg2_t1 .= ', '.(round($performance_t1['PG2']['Good_rp_per_kg'] / $performance_t1['PG2']['Total'] * 100));
  $total_kg_pg2_t1 .= ', '.(round($performance_t1['PG2']['Poor_rp_per_kg'] / $performance_t1['PG2']['Total'] * 100));

  $total_kg_pg3_t1 = (round($performance_t1['PG3']['Excellent_rp_per_kg'] / $performance_t1['PG3']['Total'] * 100));
  $total_kg_pg3_t1 .= ', '.(round($performance_t1['PG3']['Good_rp_per_kg'] / $performance_t1['PG3']['Total'] * 100));
  $total_kg_pg3_t1 .= ', '.(round($performance_t1['PG3']['Poor_rp_per_kg'] / $performance_t1['PG3']['Total'] * 100));


  $comparison_kg_excellent_t1 = (round($performance_t1['PG1']['Excellent_rp_per_kg'] / $performance_t1['PG1']['Total'] * 100));
  $comparison_kg_excellent_t1 .= ', '.(round($performance_t1['PG2']['Excellent_rp_per_kg'] / $performance_t1['PG2']['Total'] * 100));
  $comparison_kg_excellent_t1 .= ', '.(round($performance_t1['PG3']['Excellent_rp_per_kg'] / $performance_t1['PG3']['Total'] * 100));

  $comparison_kg_good_t1 = (round($performance_t1['PG1']['Good_rp_per_kg'] / $performance_t1['PG1']['Total'] * 100));
  $comparison_kg_good_t1 .= ', '.(round($performance_t1['PG2']['Good_rp_per_kg'] / $performance_t1['PG2']['Total'] * 100));
  $comparison_kg_good_t1 .= ', '.(round($performance_t1['PG3']['Good_rp_per_kg'] / $performance_t1['PG3']['Total'] * 100));

  $comparison_kg_poor_t1 = (round($performance_t1['PG1']['Poor_rp_per_kg'] / $performance_t1['PG1']['Total'] * 100));
  $comparison_kg_poor_t1 .= ', '.(round($performance_t1['PG2']['Poor_rp_per_kg'] / $performance_t1['PG2']['Total'] * 100));
  $comparison_kg_poor_t1 .= ', '.(round($performance_t1['PG3']['Poor_rp_per_kg'] / $performance_t1['PG3']['Total'] * 100));
?>
              <div style="display:none;" id="bar_compiration_kg">
                <canvas id="diagram_comparison_kg"></canvas>
<script>
  var config_comparison_kg = {
    type: 'bar',
    data: {
    labels: ['Excellent', 'Good', 'Poor'],
    datasets: [{
      label: 'PG 1',
      backgroundColor: [
				'#00FF00',
				'#FFA500',
				'#FF0000',
			],
      borderColor: [
				'#00FF00',
				'#FFA500',
				'#FF0000',
			],
      borderWidth: 1,
      data: [
        <?php echo $total_kg_pg1; ?>
      ]
      }, {
      label: 'PG 2',
      backgroundColor: [
				'#00FF00',
				'#FFA500',
				'#FF0000',
			],
      borderColor: [
				'#00FF00',
				'#FFA500',
				'#FF0000',
			],
      borderWidth: 1,
      data: [
        <?php echo $total_kg_pg2; ?>

      ]
      }, {
      label: 'PG 3',
      backgroundColor: [
				'#00FF00',
				'#FFA500',
				'#FF0000',
			],
      borderColor: [
				'#00FF00',
				'#FFA500',
				'#FF0000',
			],
      borderWidth: 1,
      data: [
        <?php echo $total_kg_pg3; ?>
      ]
      }]
    },
    options: {
      responsive: true,
      legend: {
        display: false,
        position: 'bottom',
        labels: {
          usePointStyle: true,
        }
      },
      title: {
        display: false,
        text: 'Tonase Sebelum Panen (Ton/Ha)'
      },
      tooltips: {
        mode: 'index',
        intersect: false,
        callbacks: {
          label: function(tooltipItem, data) {
            var label = data.datasets[tooltipItem.datasetIndex].label;
            var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            return label + ' : ' + val + '%';
          }
        }
      },
      scales: {
        yAxes: [{
          gridLines: {
            display: false,
            drawBorder: false,
            drawOnChartArea: false,
          },
          ticks: {
            max: 100,
            min: 0
          }
        }],
        xAxes: [{
          gridLines: {
            display: false,
            drawBorder: true,
            drawOnChartArea: false,
          }
        }]
      },
      animation: {
        onComplete: function () {
          var chartInstance = this.chart;
          var ctx = chartInstance.ctx;
          ctx.textAlign = "center";

          Chart.helpers.each(this.data.datasets.forEach(function (dataset, i) {
            var meta = chartInstance.controller.getDatasetMeta(i);
            Chart.helpers.each(meta.data.forEach(function (bar, index) {
              ctx.fillText(dataset.data[index] + '%', bar._model.x, bar._model.y - 10);
            }),this)
          }),this);
        }
      }
    }
  };
</script>
              </div>
              <div style="display:none;" id="bar_total_kg">
                <canvas id="diagram_total_kg"></canvas>
<script>
  var config_total_kg = {
    type: 'bar',
    data: {
    labels: ['PG1', 'PG2', 'PG3'],
    datasets: [{
      label: 'Excellent',
      backgroundColor: '#00FF00',
      borderColor: '#00FF00',
      borderWidth: 1,
      data: [
        <?php echo $comparison_kg_excellent; ?>
      ]
      }, {
      label: 'Good',
      backgroundColor: '#FFA500',
      borderColor: '#FFA500',
      borderWidth: 1,
      data: [
        <?php echo $comparison_kg_good; ?>
      ]
      }, {
      label: 'Poor',
      backgroundColor: '#FF0000',
      borderColor: '#FF0000',
      borderWidth: 1,
      data: [
        <?php echo $comparison_kg_poor; ?>
      ]
      }]
    },
    options: {
      responsive: true,
      legend: {
        position: 'bottom',
        labels: {
          usePointStyle: true,
        }
      },
      title: {
        display: false,
        text: 'Tonase Sebelum Panen (Ton/Ha)'
      },
      tooltips: {
        mode: 'index',
        intersect: false,
        callbacks: {
          label: function(tooltipItem, data) {
            var label = data.datasets[tooltipItem.datasetIndex].label;
            var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            return label + ' : ' + val + '%';
          }
        }
      },
      scales: {
        yAxes: [{
          gridLines: {
            display: false,
            drawBorder: false,
            drawOnChartArea: false,
          },
          ticks: {
            max: 100,
            min: 0
          }
        }],
        xAxes: [{
          gridLines: {
            display: false,
            drawBorder: true,
            drawOnChartArea: false,
          }
        }]
      },
      animation: {
        onComplete: function () {
          var chartInstance = this.chart;
          var ctx = chartInstance.ctx;
          ctx.textAlign = "center";

          Chart.helpers.each(this.data.datasets.forEach(function (dataset, i) {
            var meta = chartInstance.controller.getDatasetMeta(i);
            Chart.helpers.each(meta.data.forEach(function (bar, index) {
              ctx.fillText(dataset.data[index] + '%', bar._model.x, bar._model.y - 10);
            }),this)
          }),this);
        }
      }
    }
  };
</script>
              </div>
              <div style="display:none;" id="bar_compiration_kg_t0">
                <canvas id="diagram_comparison_kg_t0"></canvas>
<script>
  var config_comparison_kg_t0 = {
    type: 'bar',
    data: {
    labels: ['Excellent', 'Good', 'Poor'],
    datasets: [{
      label: 'PG 1',
      backgroundColor: [
				'#00FF00',
				'#FFA500',
				'#FF0000',
			],
      borderColor: [
				'#00FF00',
				'#FFA500',
				'#FF0000',
			],
      borderWidth: 1,
      data: [
        <?php echo $total_kg_pg1_t0; ?>
      ]
      }, {
      label: 'PG 2',
      backgroundColor: [
				'#00FF00',
				'#FFA500',
				'#FF0000',
			],
      borderColor: [
				'#00FF00',
				'#FFA500',
				'#FF0000',
			],
      borderWidth: 1,
      data: [
        <?php echo $total_kg_pg2_t0; ?>

      ]
      }, {
      label: 'PG 3',
      backgroundColor: [
				'#00FF00',
				'#FFA500',
				'#FF0000',
			],
      borderColor: [
				'#00FF00',
				'#FFA500',
				'#FF0000',
			],
      borderWidth: 1,
      data: [
        <?php echo $total_kg_pg3_t0; ?>
      ]
      }]
    },
    options: {
      responsive: true,
      legend: {
        display: false,
        position: 'bottom',
        labels: {
          usePointStyle: true,
        }
      },
      title: {
        display: false,
        text: 'Tonase Sebelum Panen (Ton/Ha)'
      },
      tooltips: {
        mode: 'index',
        intersect: false,
        callbacks: {
          label: function(tooltipItem, data) {
            var label = data.datasets[tooltipItem.datasetIndex].label;
            var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            return label + ' : ' + val + '%';
          }
        }
      },
      scales: {
        yAxes: [{
          gridLines: {
            display: false,
            drawBorder: false,
            drawOnChartArea: false,
          },
          ticks: {
            max: 100,
            min: 0
          }
        }],
        xAxes: [{
          gridLines: {
            display: false,
            drawBorder: true,
            drawOnChartArea: false,
          }
        }]
      },
      animation: {
        onComplete: function () {
          var chartInstance = this.chart;
          var ctx = chartInstance.ctx;
          ctx.textAlign = "center";

          Chart.helpers.each(this.data.datasets.forEach(function (dataset, i) {
            var meta = chartInstance.controller.getDatasetMeta(i);
            Chart.helpers.each(meta.data.forEach(function (bar, index) {
              ctx.fillText(dataset.data[index] + '%', bar._model.x, bar._model.y - 10);
            }),this)
          }),this);
        }
      }
    }
  };
</script>
              </div>
              <div style="display:none;" id="bar_total_kg_t0">
                <canvas id="diagram_total_kg_t0"></canvas>
<script>
  var config_total_kg_t0 = {
    type: 'bar',
    data: {
    labels: ['PG1', 'PG2', 'PG3'],
    datasets: [{
      label: 'Excellent',
      backgroundColor: '#00FF00',
      borderColor: '#00FF00',
      borderWidth: 1,
      data: [
        <?php echo $comparison_kg_excellent_t0; ?>
      ]
      }, {
      label: 'Good',
      backgroundColor: '#FFA500',
      borderColor: '#FFA500',
      borderWidth: 1,
      data: [
        <?php echo $comparison_kg_good_t0; ?>
      ]
      }, {
      label: 'Poor',
      backgroundColor: '#FF0000',
      borderColor: '#FF0000',
      borderWidth: 1,
      data: [
        <?php echo $comparison_kg_poor_t0; ?>
      ]
      }]
    },
    options: {
      responsive: true,
      legend: {
        position: 'bottom',
        labels: {
          usePointStyle: true,
        }
      },
      title: {
        display: false,
        text: 'Tonase Sebelum Panen (Ton/Ha)'
      },
      tooltips: {
        mode: 'index',
        intersect: false,
        callbacks: {
          label: function(tooltipItem, data) {
            var label = data.datasets[tooltipItem.datasetIndex].label;
            var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            return label + ' : ' + val + '%';
          }
        }
      },
      scales: {
        yAxes: [{
          gridLines: {
            display: false,
            drawBorder: false,
            drawOnChartArea: false,
          },
          ticks: {
            max: 100,
            min: 0
          }
        }],
        xAxes: [{
          gridLines: {
            display: false,
            drawBorder: true,
            drawOnChartArea: false,
          }
        }]
      },
      animation: {
        onComplete: function () {
          var chartInstance = this.chart;
          var ctx = chartInstance.ctx;
          ctx.textAlign = "center";

          Chart.helpers.each(this.data.datasets.forEach(function (dataset, i) {
            var meta = chartInstance.controller.getDatasetMeta(i);
            Chart.helpers.each(meta.data.forEach(function (bar, index) {
              ctx.fillText(dataset.data[index] + '%', bar._model.x, bar._model.y - 10);
            }),this)
          }),this);
        }
      }
    }
  };
</script>
              </div>
              <div style="display:none;" id="bar_compiration_kg_t1">
                <canvas id="diagram_comparison_kg_t1"></canvas>
<script>
  var config_comparison_kg_t1 = {
    type: 'bar',
    data: {
    labels: ['Excellent', 'Good', 'Poor'],
    datasets: [{
      label: 'PG 1',
      backgroundColor: [
				'#00FF00',
				'#FFA500',
				'#FF0000',
			],
      borderColor: [
				'#00FF00',
				'#FFA500',
				'#FF0000',
			],
      borderWidth: 1,
      data: [
        <?php echo $total_kg_pg1_t1; ?>
      ]
      }, {
      label: 'PG 2',
      backgroundColor: [
				'#00FF00',
				'#FFA500',
				'#FF0000',
			],
      borderColor: [
				'#00FF00',
				'#FFA500',
				'#FF0000',
			],
      borderWidth: 1,
      data: [
        <?php echo $total_kg_pg2_t1; ?>

      ]
      }, {
      label: 'PG 3',
      backgroundColor: [
				'#00FF00',
				'#FFA500',
				'#FF0000',
			],
      borderColor: [
				'#00FF00',
				'#FFA500',
				'#FF0000',
			],
      borderWidth: 1,
      data: [
        <?php echo $total_kg_pg3_t1; ?>
      ]
      }]
    },
    options: {
      responsive: true,
      legend: {
        display: false,
        position: 'bottom',
        labels: {
          usePointStyle: true,
        }
      },
      title: {
        display: false,
        text: 'Tonase Sebelum Panen (Ton/Ha)'
      },
      tooltips: {
        mode: 'index',
        intersect: false,
        callbacks: {
          label: function(tooltipItem, data) {
            var label = data.datasets[tooltipItem.datasetIndex].label;
            var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            return label + ' : ' + val + '%';
          }
        }
      },
      scales: {
        yAxes: [{
          gridLines: {
            display: false,
            drawBorder: false,
            drawOnChartArea: false,
          },
          ticks: {
            max: 100,
            min: 0
          }
        }],
        xAxes: [{
          gridLines: {
            display: false,
            drawBorder: true,
            drawOnChartArea: false,
          }
        }]
      },
      animation: {
        onComplete: function () {
          var chartInstance = this.chart;
          var ctx = chartInstance.ctx;
          ctx.textAlign = "center";

          Chart.helpers.each(this.data.datasets.forEach(function (dataset, i) {
            var meta = chartInstance.controller.getDatasetMeta(i);
            Chart.helpers.each(meta.data.forEach(function (bar, index) {
              ctx.fillText(dataset.data[index] + '%', bar._model.x, bar._model.y - 10);
            }),this)
          }),this);
        }
      }
    }
  };
</script>
              </div>
              <div style="display:none;" id="bar_total_kg_t1">
                <canvas id="diagram_total_kg_t1"></canvas>
<script>
  var config_total_kg_t1 = {
    type: 'bar',
    data: {
    labels: ['PG1', 'PG2', 'PG3'],
    datasets: [{
      label: 'Excellent',
      backgroundColor: '#00FF00',
      borderColor: '#00FF00',
      borderWidth: 1,
      data: [
        <?php echo $comparison_kg_excellent_t1; ?>
      ]
      }, {
      label: 'Good',
      backgroundColor: '#FFA500',
      borderColor: '#FFA500',
      borderWidth: 1,
      data: [
        <?php echo $comparison_kg_good_t1; ?>
      ]
      }, {
      label: 'Poor',
      backgroundColor: '#FF0000',
      borderColor: '#FF0000',
      borderWidth: 1,
      data: [
        <?php echo $comparison_kg_poor_t1; ?>
      ]
      }]
    },
    options: {
      responsive: true,
      legend: {
        position: 'bottom',
        labels: {
          usePointStyle: true,
        }
      },
      title: {
        display: false,
        text: 'Tonase Sebelum Panen (Ton/Ha)'
      },
      tooltips: {
        mode: 'index',
        intersect: false,
        callbacks: {
          label: function(tooltipItem, data) {
            var label = data.datasets[tooltipItem.datasetIndex].label;
            var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            return label + ' : ' + val + '%';
          }
        }
      },
      scales: {
        yAxes: [{
          gridLines: {
            display: false,
            drawBorder: false,
            drawOnChartArea: false,
          },
          ticks: {
            max: 100,
            min: 0
          }
        }],
        xAxes: [{
          gridLines: {
            display: false,
            drawBorder: true,
            drawOnChartArea: false,
          }
        }]
      },
      animation: {
        onComplete: function () {
          var chartInstance = this.chart;
          var ctx = chartInstance.ctx;
          ctx.textAlign = "center";

          Chart.helpers.each(this.data.datasets.forEach(function (dataset, i) {
            var meta = chartInstance.controller.getDatasetMeta(i);
            Chart.helpers.each(meta.data.forEach(function (bar, index) {
              ctx.fillText(dataset.data[index] + '%', bar._model.x, bar._model.y - 10);
            }),this)
          }),this);
        }
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
    sort_ha()
    sort_kg()

    if(screen.width <= 450){
      // $("#diagram_comparison_ha").css('height', '300px');
      // $("#diagram_comparison_ha").height('50');
      // $("#diagram_comparison_kg").height('50');
      // $("#bar_total_ha").css('height', '300px') ;
      // $("#diagram_total_ha").css('height', '50px');
      // document.getElementById("diagram_total_ha").style.height = "250px";
      // $("#diagram_total_kg").height('50');
      document.getElementById("header_wip").innerHTML = "<b>WIP</b>";
    }
    else{
      // $("#diagram_total_ha").height('25');
      // document.getElementById("diagram_total_ha").style.height = "50px";
    }
  });
  function sort_ha(){
    if($("#select_ha").val() == 1){
      if($("#select_tahun").val() == "T"){
        $("#bar_total_ha").hide();
        $("#bar_compiration_ha").show();
        $("#bar_total_ha_t0").hide();
        $("#bar_compiration_ha_t0").hide();
        $("#bar_total_ha_t1").hide();
        $("#bar_compiration_ha_t1").hide();
      }
      else if($("#select_tahun").val() == "T0"){
        $("#bar_total_ha").hide();
        $("#bar_compiration_ha").hide();
        $("#bar_total_ha_t0").hide();
        $("#bar_compiration_ha_t0").show();
        $("#bar_total_ha_t1").hide();
        $("#bar_compiration_ha_t1").hide();
      }
      else{
        $("#bar_total_ha").hide();
        $("#bar_compiration_ha").hide();
        $("#bar_total_ha_t0").hide();
        $("#bar_compiration_ha_t0").hide();
        $("#bar_total_ha_t1").hide();
        $("#bar_compiration_ha_t1").show();
      }
    }
    else{
      if($("#select_tahun").val() == "T"){
        $("#bar_total_ha").show();
        $("#bar_compiration_ha").hide();
        $("#bar_total_ha_t0").hide();
        $("#bar_compiration_ha_t0").hide();
        $("#bar_total_ha_t1").hide();
        $("#bar_compiration_ha_t1").hide();
      }
      else if($("#select_tahun").val() == "T0"){
        $("#bar_total_ha").hide();
        $("#bar_compiration_ha").hide();
        $("#bar_total_ha_t0").show();
        $("#bar_compiration_ha_t0").hide();
        $("#bar_total_ha_t1").hide();
        $("#bar_compiration_ha_t1").hide();
      }
      else{
        $("#bar_total_ha").hide();
        $("#bar_compiration_ha").hide();
        $("#bar_total_ha_t0").hide();
        $("#bar_compiration_ha_t0").hide();
        $("#bar_total_ha_t1").show();
        $("#bar_compiration_ha_t1").hide();
      }
    }
  }

  function sort_kg(){
    if($("#select_kg").val() == 1){
      if($("#select_tahun").val() == "T"){
        $("#bar_total_kg").hide();
        $("#bar_compiration_kg").show();
        $("#bar_total_kg_t0").hide();
        $("#bar_compiration_kg_t0").hide();
        $("#bar_total_kg_t1").hide();
        $("#bar_compiration_kg_t1").hide();
      }
      else if($("#select_tahun").val() == "T0"){
        $("#bar_total_kg").hide();
        $("#bar_compiration_kg").hide();
        $("#bar_total_kg_t0").hide();
        $("#bar_compiration_kg_t0").show();
        $("#bar_total_kg_t1").hide();
        $("#bar_compiration_kg_t1").hide();
      }
      else{
        $("#bar_total_kg").hide();
        $("#bar_compiration_kg").hide();
        $("#bar_total_kg_t0").hide();
        $("#bar_compiration_kg_t0").hide();
        $("#bar_total_kg_t1").hide();
        $("#bar_compiration_kg_t1").show();
      }
    }
    else{
      if($("#select_tahun").val() == "T"){
        $("#bar_total_kg").show();
        $("#bar_compiration_kg").hide();
        $("#bar_total_kg_t0").hide();
        $("#bar_compiration_kg_t0").hide();
        $("#bar_total_kg_t1").hide();
        $("#bar_compiration_kg_t1").hide();
      }
      else if($("#select_tahun").val() == "T0"){
        $("#bar_total_kg").hide();
        $("#bar_compiration_kg").hide();
        $("#bar_total_kg_t0").show();
        $("#bar_compiration_kg_t0").hide();
        $("#bar_total_kg_t1").hide();
        $("#bar_compiration_kg_t1").hide();
      }
      else{
        $("#bar_total_kg").hide();
        $("#bar_compiration_kg").hide();
        $("#bar_total_kg_t0").hide();
        $("#bar_compiration_kg_t0").hide();
        $("#bar_total_kg_t1").show();
        $("#bar_compiration_kg_t1").hide();
      }
    }
  }
  function sort_tahun(){
    var tahun = $("#select_tahun").val();

    switch (tahun) {
      case "T":
        $("#peta12_all").show();
        $("#peta12_t0").hide();
        $("#peta12_t1").hide();
        $("#peta3_all").show();
        $("#peta3_t0").hide();
        $("#peta3_t1").hide();
        break;
      case "T0":
        $("#peta12_all").hide();
        $("#peta12_t0").show();
        $("#peta12_t1").hide();
        $("#peta3_all").hide();
        $("#peta3_t0").show();
        $("#peta3_t1").hide();
        break;
      case "T1":
        $("#peta12_all").hide();
        $("#peta12_t0").hide();
        $("#peta12_t1").show();
        $("#peta3_all").hide();
        $("#peta3_t0").hide();
        $("#peta3_t1").show();
        break;
    }
    sort_ha();
    sort_kg();
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
    //All
		var ctx_comparison_ha = document.getElementById('diagram_comparison_ha').getContext('2d');
		window.myBar = new Chart(ctx_comparison_ha, config_comparison_ha);
		var ctx_total_ha = document.getElementById('diagram_total_ha').getContext('2d');
		window.myBar = new Chart(ctx_total_ha, config_total_ha);
		var ctx_comparison_kg = document.getElementById('diagram_comparison_kg').getContext('2d');
		window.myBar = new Chart(ctx_comparison_kg, config_comparison_kg);
		var ctx_total_kg = document.getElementById('diagram_total_kg').getContext('2d');
		window.myBar = new Chart(ctx_total_kg, config_total_kg);
    //T0
		var ctx_comparison_ha_t0 = document.getElementById('diagram_comparison_ha_t0').getContext('2d');
		window.myBar = new Chart(ctx_comparison_ha_t0, config_comparison_ha_t0);
		var ctx_total_ha_t0 = document.getElementById('diagram_total_ha_t0').getContext('2d');
		window.myBar = new Chart(ctx_total_ha_t0, config_total_ha_t0);
		var ctx_comparison_kg_t0 = document.getElementById('diagram_comparison_kg_t0').getContext('2d');
		window.myBar = new Chart(ctx_comparison_kg_t0, config_comparison_kg_t0);
		var ctx_total_kg_t0 = document.getElementById('diagram_total_kg_t0').getContext('2d');
		window.myBar = new Chart(ctx_total_kg_t0, config_total_kg_t0);
    //T1
		var ctx_comparison_ha_t1 = document.getElementById('diagram_comparison_ha_t1').getContext('2d');
		window.myBar = new Chart(ctx_comparison_ha_t1, config_comparison_ha_t1);
		var ctx_total_ha_t1 = document.getElementById('diagram_total_ha_t1').getContext('2d');
		window.myBar = new Chart(ctx_total_ha_t1, config_total_ha_t1);
		var ctx_comparison_kg_t1 = document.getElementById('diagram_comparison_kg_t1').getContext('2d');
		window.myBar = new Chart(ctx_comparison_kg_t1, config_comparison_kg_t1);
		var ctx_total_kg_t1 = document.getElementById('diagram_total_kg_t1').getContext('2d');
		window.myBar = new Chart(ctx_total_kg_t1, config_total_kg_t1);
	};
</script>
