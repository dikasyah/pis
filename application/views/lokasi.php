<!-- PAGE CONTENT -->
<div class="page-content">

  <!-- PAGE CONTENT WRAPPER -->
  <div class="page-content-wrap">

    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="row">
                <div class="col-md-2">
                  <div class="panel" style="box-shadow: 0 0 15px #808080, 0 0 20px #A9A9A9;background-color:#2F4F4F;">
                    <div class="panel-body" align="center">
                      <h2 style="color:black;">
                        <button class="btn btn-default" onclick="main_menu();"><i class="fa fa-home"></i> Home</button>
                        <button class="btn btn-default" onclick="profile();"><i class="fa fa-user"></i> Profile</button>
                      </h2>
                      <br />
                      <input type="text" name="lokasi" id="lokasi" class="form-control" placeholder="Lokasi" style="text-align:center;font-size:25px;height:50px;" maxlength="5" value="<?php echo $lokasi['lokasi']; ?>"/>
                      <br />
                      <button class="btn btn-default" onclick="back();"><i class="fa fa-arrow-left"></i> Back</button>
                      <button class="btn btn-default" onclick="show_modal_note();"><i class="fa fa-pencil-square"></i> Note</button>
                    </div>
                  </div>
                </div>

                <div class="col-md-10">
                  <div class="panel panel-default" id="profile_lokasi">
                    <div class="panel-heading" style="background-color:#FF4500;">
                      <div class="panel-title-box">
                        <h3 style="color:white;">Profile Lokasi <?php echo $lokasi['lokasi']; ?></h3>
                      </div>
                    </div>
                    <div class="panel-body">
                      <div class="col-md-3">
                        <div class="panel panel-info">
                          <div class="panel-body" style="background-color: #B22222;">
                            <table width="100%">
                              <tr>
                                <td width="50%">
                                  <b style="color:white;">Wilayah</b>
                                </td>
                                <td width="50%">
                                  <b style="color:white;"><?php echo $wilayah['code']; ?></b>
                                </td>
                              </tr>
                              <tr>
                                <td width="50%">
                                  <b style="color:white;">Kebun</b>
                                </td>
                                <td width="50%">
                                  <b style="color:white;"><?php echo $lokasi['kebun']; ?></b>
                                </td>
                              </tr>
                              <tr>
                                <td width="50%">
                                  <b style="color:white;">Kepala Wilayah</b>
                                </td>
                                <td width="50%">
                                  <b style="color:white;"><?php echo $wilayah['kepala_wilayah']; ?></b>
                                </td>
                              </tr>
                              <tr>
                                <td width="50%">
                                  <b style="color:white;">Kasie Kebun</b>
                                </td>
                                <td width="50%">
                                  <b style="color:white;"><?php echo $wilayah['kasie_kebun'.substr($lokasi['kebun'],3,1)]; ?></b>
                                </td>
                              </tr>
                            </table>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="panel panel-info">
                          <div class="panel-body" style="background-color: #B22222;">
                            <table width="100%">
                              <tr>
                                <td width="50%">
                                  <b style="color:white;">Status</b>
                                </td>
                                <td width="50%">
                                  <b style="color:white;"><?php echo $lokasi['status']; ?></b>
                                </td>
                              </tr>
                              <tr>
                                <td width="50%">
                                  <b style="color:white;">Varietas Bibit</b>
                                </td>
                                <td width="50%">
                                  <b style="color:white;">
<?php
  if($lokasi['bibit'] == NULL)
    if($lokasi['status'] == "NSSC")
      echo substr($histori_lokasi_nssc_nsfc['kode_bibit_lokasi'],2,3);
    else
      echo "-";
  else
    echo substr($lokasi['bibit'],2,3);
?>
                                  </b>
                                </td>
                              </tr>
                              <tr>
                                <td width="50%">
                                  <b style="color:white;">Jenis Bibit</b>
                                </td>
                                <td width="50%">
                                  <b style="color:white;">
<?php
  if($lokasi['bibit'] == NULL)
    if($lokasi['status'] == "NSSC")
      if(substr($histori_lokasi_nssc_nsfc['kode_bibit_lokasi'],5,1) == "C")
        echo "CR";
      else if(substr($histori_lokasi_nssc_nsfc['kode_bibit_lokasi'],5,1) == "S")
        echo "SC";
      else
        echo "AN";
    else
      echo "-";
  else
    if(substr($lokasi['bibit'],5,1) == "C")
      echo "CR";
    else if(substr($lokasi['bibit'],5,1) == "S")
      echo "SC";
    else
      echo "AN";
?>
                                  </b>
                                </td>
                              </tr>
                              <tr>
                                <td width="50%">
                                  <b style="color:white;">Kelas Bibit</b>
                                </td>
                                <td width="50%">
                                  <b style="color:white;">
<?php
  if($lokasi['bibit'] == NULL){
    if($lokasi['status'] == "NSSC"){
      $kelas = substr($histori_lokasi_nssc_nsfc['kode_bibit_lokasi'],6,1);
      echo substr($histori_lokasi_nssc_nsfc['kode_bibit_lokasi'],6,1);
    }
    else{
      echo "-";
    }
  }
  else{
    $kelas = substr($lokasi['bibit'],6,1);
    echo substr($lokasi['bibit'],6,1);
  }
?>
                                  </b>
                                </td>
                              </tr>
                            </table>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="panel panel-info">
                          <div class="panel-body" style="background-color: #B22222;">
                            <table width="100%">
                              <tr>
                                <td width="50%">
                                  <b style="color:white;">Tanggal Perawatan</b>
                                </td>
                                <td width="50%">
                                  <b style="color:white;">
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    $tgl_perawatan = "";
    echo "-";
  }
  else{
    $tgl_perawatan = $lokasi['tgl_mulai_rawat'];
    echo format_tgl($lokasi['tgl_mulai_rawat']);
  }
?>
                                  </b>
                                </td>
                              </tr>
                              <tr>
                                <td width="50%">
                                  <b style="color:white;">Rencana Forcing</b>
                                </td>
                                <td width="50%">
                                  <b style="color:white;">
<?php
  if($produksi == NULL){
    if($lokasi['tgl_panen_rencana'] != NULL){
      $tgl_panen = $lokasi['tgl_panen_rencana'];
    }
    else{
      if(substr($lokasi['status'], 0, 4) != 'NSSC'){
        $tgl_panen = strtotime($lokasi['tgl_mulai_rawat']) + ($standart_panen[$kelas]['bulan'] * 30.4583333333333 * 86400);
      }
      else{
        $tgl_panen = strtotime($lokasi['tgl_mulai_rawat']) + 13 * 30.5 * 86400;
      }
      $tgl_panen = date('Y-m-d', $tgl_panen);
    }

    // if(date('Y', strtotime($tgl_panen)) == date('Y', strtotime($YEAR_BASE['nilai']))){
    //   $tgl_panen = date('Y-m-d', strtotime($tgl_panen) + (86400 * 91.5));
    // }
    echo format_tgl($tgl_panen);
  }
  else{
    $tgl_panen = $produksi['real_dan_sisa_rencana_tgl_selesai_panen'];
    if($tgl_panen <= $lokasi['tgl_mulai_rawat']){
      if(substr($lokasi['status'], 0, 4) != 'NSSC'){
        $tgl_panen = strtotime($lokasi['tgl_mulai_rawat']) + ($standart_panen[$kelas]['bulan'] * 30.4583333333333 * 86400);
      }
      else{
        $tgl_panen = strtotime($lokasi['tgl_mulai_rawat']) + 13 * 30.5 * 86400;
      }
      $tgl_panen = date('Y-m-d', $tgl_panen);
    }
  }
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo "-";
    $tgl_rencana_forcing = NULL;
  }
  else{
    // if($lokasi['tgl_forcing_standard'] == NULL){
      // if($lokasi['status'] == 'NSFC'){
      //   switch ($kelas) {
      //     case 'B':
      //       echo format_tgl(date('Y-m-d', strtotime($tgl_panen) + ((84600 * 10) * 30.4583333333333)));
      //       $tgl_rencana_forcing = date('Y-m-d', strtotime($tgl_panen) + ((84600 * 10) * 30.4583333333333));
      //       break;
      //     case 'S':
      //       echo format_tgl(date('Y-m-d', strtotime($tgl_panen) + ((84600 * 12) * 30.4583333333333)));
      //       $tgl_rencana_forcing = date('Y-m-d', strtotime($tgl_panen) + ((84600 * 12) * 30.4583333333333));
      //       break;
      //     case 'K':
      //       echo format_tgl(date('Y-m-d', strtotime($tgl_panen) + ((84600 * 14) * 30.4583333333333)));
      //       $tgl_rencana_forcing = date('Y-m-d', strtotime($tgl_panen) + ((84600 * 14) * 30.4583333333333));
      //       break;
      //   }
      // }
      // else{
        echo format_tgl(date('Y-m-d', strtotime($tgl_panen) - (152 * 86400)));
        $tgl_rencana_forcing = strtotime($tgl_panen) - (152 * 86400);
      // }
    // }
    // else{
    //   echo format_tgl($lokasi['tgl_forcing_standard']);
    //   $tgl_rencana_forcing = $lokasi['tgl_forcing_standard'];
    // }
  }
?>
                                  </b>
                                </td>
                              </tr>
                              <tr>
                                <td width="50%">
                                  <b style="color:white;">Real Focing</b>
                                </td>
                                <td width="50%">
                                  <b style="color:white;">
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK")
    echo "-";
  else
    echo format_tgl($lokasi['tgl_forcing_realisasi']);
?>
                                  </b>
                                </td>
                              </tr>
                              <tr>
                                <td width="50%">
                                  <b style="color:white;">Rencana Panen</b>
                                </td>
                                <td width="50%">
                                  <b style="color:white;">
<?php
  if($produksi == NULL){
    if($lokasi['tgl_panen_rencana'] != NULL){
      $tgl_panen = $lokasi['tgl_panen_rencana'];
    }
    else{
      if(substr($lokasi['status'], 0, 4) != 'NSSC'){
        $tgl_panen = strtotime($lokasi['tgl_mulai_rawat']) + ($standart_panen[$kelas]['bulan'] * 30.4583333333333 * 86400);
      }
      else{
        $tgl_panen = strtotime($lokasi['tgl_mulai_rawat']) + 13 * 30.5 * 86400;
      }
      $tgl_panen = date('Y-m-d', $tgl_panen);
    }

    if(date('Y', strtotime($tgl_panen)) == date('Y', strtotime($YEAR_BASE['nilai']))){
      $tgl_panen = date('Y-m-d', strtotime($tgl_panen) + (86400 * 91.5));
    }
    echo format_tgl($tgl_panen);
  }
  else{
    $tgl_panen = $produksi['real_dan_sisa_rencana_tgl_selesai_panen'];
    if($tgl_panen <= $lokasi['tgl_mulai_rawat']){
      if(substr($lokasi['status'], 0, 4) != 'NSSC'){
        $tgl_panen = strtotime($lokasi['tgl_mulai_rawat']) + ($standart_panen[$kelas]['bulan'] * 30.4583333333333 * 86400);
      }
      else{
        $tgl_panen = strtotime($lokasi['tgl_mulai_rawat']) + 13 * 30.5 * 86400;
      }
      $tgl_panen = date('Y-m-d', $tgl_panen);
      echo format_tgl($tgl_panen);
    }
    else{
      echo format_tgl($produksi['real_dan_sisa_rencana_tgl_selesai_panen']);
    }
  }
?>
                                  </b>
                                </td>
                              </tr>
                            </table>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="panel panel-info">
                          <div class="panel-body" style="background-color: #B22222;">
                            <table width="100%">
                              <tr>
                                <td width="50%">
                                  <b style="color:white;">Luas</b>
                                </td>
                                <td width="50%">
                                  <b style="color:white;">
<?php
  if($produksi != NULL){
    echo $produksi['real_dan_sisa_rencana_luas'];
    $luas = $produksi['real_dan_sisa_rencana_luas'];;
  }
  else{
    echo $lokasi['luas'];
    $luas = $lokasi['luas'];
  }
?>
                                  Ha</b>
                                </td>
                              </tr>
                              <tr>
                                <td width="50%">
                                  <b style="color:white;">Prediksi Tonase</b>
                                </td>
                                <td width="50%">
                                  <b style="color:white;">
<?php
  if($produksi == NULL){
    if($lokasi['status'] == 'NFFC'){
      echo angka_ribuan(82.2*$luas)." Ton";
      $tonase = 82.2*$luas;
    }
    else{
      echo angka_ribuan($std_yield['yield']*$luas)." Ton";
      $tonase = $std_yield['yield']*$luas;
    }
  }
  else{
    echo angka_ribuan($produksi['real_dan_sisa_rencana_tonase'])." Ton";
    $tonase = $produksi['real_dan_sisa_rencana_tonase'];
  }
?>
                                  </b>
                                </td>
                              </tr>
                              <tr>
                                <td width="50%">
                                  <b style="color:white;">Yield</b>
                                </td>
                                <td width="50%">
                                  <b style="color:white;">
<?php
  if($produksi == NULL){
    if($lokasi['status'] == 'NFFC'){
      echo round(82.2, 2)." Ton/Ha";
    }
    else{
      echo round($std_yield['yield'], 2)." Ton/Ha";
    }
  }
  else{
    echo round($produksi['real_dan_sisa_rencana_yield'], 2)." Ton/Ha";
  }
?>
                                  </b>
                                </td>
                              </tr>
                              <tr>
                                <td width="50%">
                                  <b style="color:white;">Umur Saat Ini</b>
                                </td>
                                <td width="50%">
                                  <b style="color:white;">
<?php
if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
  echo "- Bulan";
}
else{
  $date1 = round(strtotime($konstanta['nilai'])/86400);
  $date2 = round(strtotime($lokasi['tgl_mulai_rawat'])/86400);

  $umur = ($date1-$date2)/30.4583333333333;

  echo ceil($umur)." Bulan";
}
?>
                                  </b>
                                </td>
                              </tr>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="progress" style="background-color:#000000;">
<?php
if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
  $persentase = 0;
}
else{
  $date1 = round(strtotime($tgl_perawatan)/86400);
  $date2 = round(strtotime($tgl_panen)/86400);

  $persentase = (ceil($umur)/(($date2-$date1)/30.4583333333333))*100;
  if(round($persentase) >= 100){
    $persentase = 100;
  }
  else{
    $persentase = round($persentase,2);
  }
}
?>
                  <div class="progress-bar progress-bar-success active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $persentase; ?>%;color:black;"><b><?php echo $persentase; ?>% Complete</b></div>
                </div>
                <button class="btn btn-default btn-block" style="background-color:#4169E1;color:white;font-weight:bold;" onclick="detail_all_spk();">Detail SPK</button>
              </div>
            </div>
          </div>
        </div>
      </div>


      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-body" style="background-color: black;" align="center">
<?php
  if($lokasi['status'] == 'NSFC' || $lokasi['status'] == 'NFFC'){
?>
              <div class="col-md-1">
                <div class="panel" align="center">
                  <div class="panel-body" style="background-color: #0000CD;">
                    <h4><b style="color:white;">BK<b></h4>
                  </div>
                </div>
              </div>
              <div class="col-md-1" align='center'>
                <h4><b style="color:white;"><?php echo $timeline_perawatan['bk_st']['bk_st']; ?> Hari<b></h4>
                <h4><b style="color:white;"><?php echo angka_ribuan($timeline_perawatan['bk_st']['biaya']); ?> Rp/Ha<b></h4>
              </div>
              <div class="col-md-2">
                <div class="panel" align="center">
                  <div class="panel-body" style="background-color: #0000CD;">
                    <h4><b style="color:white;">ST<b></h4>
                  </div>
                </div>
              </div>
              <div class="col-md-1" align='center'>
                <h4><b style="color:white;"><?php echo $timeline_perawatan['st_perawatan']['st_perawatan']; ?> Hari<b></h4>
                <h4><b style="color:white;"><?php echo angka_ribuan($timeline_perawatan['st_perawatan']['biaya']); ?> Rp/Ha<b></h4>
              </div>
              <div class="col-md-2">
                <div class="panel" align="center">
                  <div class="panel-body" style="background-color: #0000CD;">
                    <h4><b style="color:white;">NSFC<b></h4>
                  </div>
                </div>
              </div>
              <div class="col-md-1" align='center'>
                <h4><b style="color:white;"><?php echo $timeline_perawatan['perawatan_forcing']['perawatan_forcing']; ?> Hari<b></h4>
                <h4><b style="color:white;"><?php echo angka_ribuan($timeline_perawatan['perawatan_forcing']['biaya']); ?> Rp/Ha<b></h4>
              </div>
              <div class="col-md-2">
                <div class="panel" align="center">
                  <div class="panel-body" style="background-color: #0000CD;">
                    <h4><b style="color:white;">Forcing<b></h4>
                  </div>
                </div>
              </div>
              <div class="col-md-1" align='center'>
                <h4><b style="color:white;"><?php echo $timeline_perawatan['forcing_harvest']['forcing_harvest']; ?> Hari<b></h4>
                <h4><b style="color:white;"><?php echo angka_ribuan($timeline_perawatan['forcing_harvest']['biaya']); ?> Rp/Ha<b></h4>
              </div>
              <div class="col-md-1">
                <div class="panel" align="center">
                  <div class="panel-body" style="background-color: #0000CD;">
                    <h4><b style="color:white;">Harvest<b></h4>
                  </div>
                </div>
              </div>
<?php
  }
  else if($lokasi['status'] == "NSSC"){
?>
              <div class="col-md-2">
                <div class="panel" align="center">
                  <div class="panel-body" style="background-color: #0000CD;">
                    <h4><b style="color:white;">NSSC<b></h4>
                  </div>
                </div>
              </div>
              <div class="col-md-3" align='center'>
                <h4><b style="color:white;"><?php echo $timeline_perawatan['perawatan_forcing']['perawatan_forcing']; ?> Hari<b></h4>
                <h4><b style="color:white;"><?php echo angka_ribuan($timeline_perawatan['perawatan_forcing']['biaya']); ?> Rp/Ha<b></h4>
              </div>
              <div class="col-md-2">
                <div class="panel" align="center">
                  <div class="panel-body" style="background-color: #0000CD;">
                    <h4><b style="color:white;">Forcing<b></h4>
                  </div>
                </div>
              </div>
              <div class="col-md-3" align='center'>
                <h4><b style="color:white;"><?php echo $timeline_perawatan['forcing_harvest']['forcing_harvest']; ?> Hari<b></h4>
                <h4><b style="color:white;"><?php echo angka_ribuan($timeline_perawatan['forcing_harvest']['biaya']); ?> Rp/Ha<b></h4>
              </div>
              <div class="col-md-2">
                <div class="panel" align="center">
                  <div class="panel-body" style="background-color: #0000CD;">
                    <h4><b style="color:white;">Harvest<b></h4>
                  </div>
                </div>
              </div>
<?php
  }
?>


            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div id="peta_all"  style="width:100%;height:650px;"></div>
<script>
<?php
  $longlat = explode(", ", $coordinate['longlat']);
?>
  function initMap() {
  var map = new google.maps.Map(document.getElementById('peta_all'), {
    center:new google.maps.LatLng(<?php echo $longlat[1]; ?>, <?php echo $longlat[0]; ?>),
    zoom:15,
    mapTypeId: google.maps.MapTypeId.SATELLITE
  });

<?php
  switch ($coordinate['category_rp_per_ha']) {
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

  switch ($coordinate['kebun']) {
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

  $long = sizeof($longlat) - 1;
?>
    var longlat<?php echo $coordinate['lokasi']; ?> = [
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
    var lok<?php echo $coordinate['lokasi']; ?> = new google.maps.Polygon({
      paths: longlat<?php echo $coordinate['lokasi']; ?>,
      strokeColor: '<?php echo $warna_isi; ?>',
      strokeOpacity: 1,
      strokeWeight: 4,
      fillColor: '<?php echo $warna_isi; ?>',
      fillOpacity: 0
    });
    lok<?php echo $coordinate['lokasi']; ?>.setMap(map);
    google.maps.event.addListener(lok<?php echo $coordinate['lokasi']; ?>, "click", function(event) {
      var info<?php echo $coordinate['lokasi']; ?> = "<h2 style='color:black;'><?php echo $coordinate['lokasi']; ?></h2>" +
      "<div class='row'>" +
        "<table width='100%'>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>PG</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $coordinate['pg']; ?></b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Wilayah</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $coordinate['wilayah']; ?></b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Kebun</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $coordinate['kebun']; ?></b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Lokasi</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $coordinate['lokasi']; ?></b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Luas</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $coordinate['luas']; ?> Ha</b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Status</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $coordinate['status']; ?></b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Yield</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php if($coordinate['yield'] == NULL) echo '-'; else echo round($coordinate['yield']); ?> Ton/Ha</b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Umur</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php if($coordinate['umur'] == NULL) echo '-'; else echo round($coordinate['umur']); ?> Bulan</b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Category</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:<?php echo $warna_isi; ?>;padding-top:1px;padding-bottom:1px;'><b><?php if($coordinate['category_rp_per_ha'] == NULL) echo '-'; else echo $coordinate['category_rp_per_ha']; ?></b></td>" +
          "</tr>" +
<?php
  if($coordinate['foto'] != NULL){
?>
          "<tr>" +
            "<td colspan='3' style='color:black;padding-top:5px;padding-bottom:1px;' align='center'>" +
              "<img onclick='show_modal_show_foto(\"<?php echo $coordinate['foto']; ?>\")' src='<?php echo $coordinate['foto']; ?>' height='auto' width='150'>" +
            "</td>" +
          "</tr>" +
<?php
  }
?>
        "</table>" +
      "</div>";
      iw<?php echo $coordinate['lokasi']; ?> = new google.maps.InfoWindow();
      iw<?php echo $coordinate['lokasi']; ?>.setContent(info<?php echo $coordinate['lokasi']; ?>);
      iw<?php echo $coordinate['lokasi']; ?>.setPosition(event.latLng);
      iw<?php echo $coordinate['lokasi']; ?>.open(map);
    });

    if(navigator.geolocation){
      navigator.geolocation.getCurrentPosition(function(p){
        var cp = new google.maps.Marker({
          position:{
            lat: p.coords.latitude,
            lng: p.coords.longitude
          },
          map: map,
          icon: '/PIS/assets/images/marker.png'
        });
      });
    }
  }

  window.initialize = initMap;
</script>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading" style="background-color: #00CED1;">
              <div class="panel-title-box" style="margin-top: 4px;padding-top:4px;padding-left:4px">
                <h2 style="color:black;"><b>LABITA</b></h2>
              </div>
              <ul class="panel-controls" style="margin-top: 4px;padding-top:4px;padding-right:4px">
                <!-- <li><a href="/PIS/Dashboard_Export/export_lokasi_labita?lokasi=<?php echo $lokasi['lokasi']; ?>" target="_blank"><span style="color:black;" class="fa fa-print"></span></a></li> -->
                <li><a href="#" class="panel-collapse"><span style="color:black;" class="fa fa-angle-down"></span></a></li>
              </ul>
            </div>
            <div class="panel-body">
              <div class="col-md-4" style="padding-right:0px;padding-left:0px;padding-bottom:0px;">
                <div class="row" align="center">
                  <div class="col-md-6">
                    <div class="widget widget-info">
                        <div class="widget-title">Populasi Tanam</div>
                        <br />
                        <br />
                        <div class="widget-int">
<?php
  if($pengamatan_populasi['populasi_tanam'] != NULL){
    echo angka_ribuan($pengamatan_populasi['populasi_tanam']);
    $populasi_tanam = $pengamatan_populasi['populasi_tanam'];
  }
  else{
    echo angka_ribuan(72000);
    $populasi_tanam = 72000;
  }
?>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="widget widget-info">
                        <div class="widget-title">Ex Status</div>
                        <br />
                        <br />
                        <div class="widget-int">
<?php
  if(substr($lokasi['status'], 2, 2) == "SC"){
    echo substr($lokasi['status'], 0, 2)."FC";
  }
  else{
    if($histori_lokasi_sebelumnya['status_lokasi'] == NULL){
      echo "-";
    }
    else{
      echo substr($histori_lokasi_sebelumnya['status_lokasi'],0,4);
    }
  }
?>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="row" align="center">
                  <div class="col-md-6">
                    <div class="widget widget-info">
                        <div class="widget-title">Interval Land Prep</div>
                        <br />
                        <br />
                        <div class="widget-int">
<?php
  if($lokasi['bibit'] == NULL){
    echo "-";
  }
  else{
    $bongkar = round(strtotime($histori_lokasi_bk['tgl_realisasi']) / 86400);
    $tanam = round(strtotime($lokasi['tgl_mulai_tanam']) / 86400);

    $interval = $tanam-$bongkar;
    echo $interval." Hari";
  }
?>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="widget widget-info">
                        <div class="widget-title">Kondisi Drainase</div>
                        <br />
                        <br />
                        <div class="widget-int">
<?php
  if($drainase['value'] == NULL){
    echo "-";
  }
  else{
    echo $drainase['value'];
  }
?>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <table class="table table-actions">
                      <tbody>
                        <tr style="background-color: #00CED1;">
                          <td style="color:black;padding-top:5px;padding-bottom:5px;" colspan="2">
                            Biaya Tanam (Rp/Ha)
                          </td>
                        </tr>
                        <tr style="background-color: #F5F5F5;">
                          <td style="color:black;padding-top:2px;padding-bottom:2px;">Bibit</td>
                          <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo "-";
  }
  else{
    if($biaya_tanam['bibit']['total'] == 0){
      echo "-";
    }
    else{
      echo angka_ribuan($biaya_tanam['bibit']['total']/$luas);
    }
  }
?>
                          </td>
                        </tr>
                        <tr>
                          <td style="color:black;padding-top:2px;padding-bottom:2px;">Sulam</td>
                          <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo "-";
  }
  else{
    if($biaya_tanam['sulam']['total'] == 0){
      echo "-";
    }
    else{
      echo angka_ribuan($biaya_tanam['sulam']['total']/$luas);
    }
  }
?>
                          </td>
                        </tr>
                        <tr style="background-color: #F5F5F5;">
                          <td style="color:black;padding-top:2px;padding-bottom:2px;">Tanam</td>
                          <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo "-";
  }
  else{
    if($biaya_tanam['tanam']['total'] == 0){
      echo "-";
    }
    else{
      echo angka_ribuan($biaya_tanam['tanam']['total']/$luas);
    }
  }
?>
                          </td>
                        </tr>
                        <tr>
                          <td style="color:black;padding-top:2px;padding-bottom:2px;">Ecer</td>
                          <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo "-";
  }
  else{
    if($biaya_tanam['ecer']['total'] == 0){
      echo "-";
    }
    else{
      echo angka_ribuan($biaya_tanam['ecer']['total']/$luas);
    }
  }
?>
                          </td>
                        </tr>
                        <tr style="background-color: #F5F5F5;">
                          <td style="color:black;padding-top:2px;padding-bottom:2px;">Transport</td>
                          <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo "-";
  }
  else{
    if($biaya_tanam['transport']['total'] == 0){
      echo "-";
    }
    else{
      echo angka_ribuan($biaya_tanam['transport']['total']/$luas);
    }
  }
?>
                          </td>
                        </tr>
                        <tr>
                          <td style="color:black;padding-top:2px;padding-bottom:2px;">Others</td>
                          <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo "-";
  }
  else{
    if($biaya_tanam['others']['total'] == 0){
      echo "-";
    }
    else{
      echo angka_ribuan($biaya_tanam['others']['total']/$luas);
    }
  }
?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table>
                      <table class="table table-actions">
                        <tr style="background-color: #F5F5F5;">
                          <td style="color:black;padding-top:2px;padding-bottom:2px;">Jumlah Sulam</td>
                          <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo "-";
  }
  else{
    if($biaya_tanam['jumlah_sulam']['jumlah_sulam'] == 0){
      echo "-";
    }
    else{
      echo angka_ribuan($biaya_tanam['jumlah_sulam']['jumlah_sulam']).' Batang';
    }
  }
?>
                          </td>
                        </tr>
                        <tr>
                          <td style="color:black;padding-top:2px;padding-bottom:2px;">Index Sulam</td>
<?php
  if($biaya_tanam['jumlah_sulam']['jumlah_sulam'] == NULL){
    $color_index_sulam = 'black';
  }
  else{
    if($populasi_tanam / $biaya_tanam['jumlah_sulam']['jumlah_sulam'] > 5){
      $color_index_sulam = 'red';
    }
    else{
      $color_index_sulam = 'blue';
    }
  }
?>
                          <td style="color:<?php echo $color_index_sulam; ?>;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo "-";
  }
  else{
    if($biaya_tanam['jumlah_sulam']['jumlah_sulam'] == 0){
      echo "- %";
    }
    else{
      echo round($populasi_tanam / $biaya_tanam['jumlah_sulam']['jumlah_sulam'], 2).' %';
    }
  }
?>
                          </td>
                        </tr>
                        <tr style="background-color: #F5F5F5;">
                          <td style="color:black;padding-top:2px;padding-bottom:2px;">Index TK Tanam</td>
                          <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo "-";
  }
  else{
    if($biaya_tanam['index_tk']['index_tk'] == 0){
      echo "-";
    }
    else{
      echo round(($biaya_tanam['index_tk']['index_tk'] / $populasi_tanam), 2).' Ha/TK';
    }
  }
?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="col-md-6">
                    <table class="table table-actions">
                      <tbody>
                        <tr style="background-color: #00CED1;">
                          <td style="color:black;padding-top:5px;padding-bottom:5px;" colspan="2">
                            Analisa Tanah Siap Tanam
                          </td>
                        </tr>
                        <tr style="background-color: #F5F5F5;">
                          <td style="color:black;padding-top:2px;padding-bottom:2px;">pH (4.3 - 4.8)</td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($pengamatan_tanah['pH_H2O'] == 0){
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">-';
    }
    else{
      if($pengamatan_tanah['pH_H2O'] >= 4.3 && $pengamatan_tanah['pH_H2O'] <= 4.8){
        echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.$pengamatan_tanah['pH_H2O'];
      }
      else{
        echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.$pengamatan_tanah['pH_H2O'];
      }
    }
  }
?>
                          </td>
                        </tr>
                        <tr>
                          <td style="color:black;padding-top:2px;padding-bottom:2px;">C-Organik(> 1.2)</td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($pengamatan_tanah['C'] == 0){
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">-';
    }
    else{
      if($pengamatan_tanah['C'] >= 1.2){
        echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.$pengamatan_tanah['C'];
      }
      else{
        echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.$pengamatan_tanah['C'];
      }
    }
  }
?>
                          </td>
                        </tr>
                        <tr style="background-color: #F5F5F5;">
                          <td style="color:black;padding-top:2px;padding-bottom:2px;">P (> 20 ppm)</td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($pengamatan_tanah['P'] == 0){
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">-';
    }
    else{
      if($pengamatan_tanah['P'] >= 20){
        echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.$pengamatan_tanah['P'];
      }
      else{
        echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.$pengamatan_tanah['P'];
      }
    }
  }
?>
                          </td>
                        </tr>
                        <tr>
                          <td style="color:black;padding-top:2px;padding-bottom:2px;">K (> 0.38 me)</td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($pengamatan_tanah['K'] == 0){
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">-';
    }
    else{
      if($pengamatan_tanah['K'] >= 0.38){
        echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.$pengamatan_tanah['K'];
      }
      else{
        echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.$pengamatan_tanah['K'];
      }
    }
  }
?>
                          </td>
                        </tr>
                        <tr style="background-color: #F5F5F5;">
                          <td style="color:black;padding-top:2px;padding-bottom:2px;">Ca (> 0.5 me)</td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($pengamatan_tanah['Ca'] == 0){
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">-';
    }
    else{
      if($pengamatan_tanah['Ca'] >= 0.5){
        echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.$pengamatan_tanah['Ca'];
      }
      else{
        echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.$pengamatan_tanah['Ca'];
      }
    }
  }
?>
                          </td>
                        </tr>
                        <tr>
                          <td style="color:black;padding-top:2px;padding-bottom:2px;">Mg (> 0.42 me)</td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($pengamatan_tanah['Mg'] == 0){
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">-';
    }
    else{
      if($pengamatan_tanah['Mg'] >= 0.42){
        echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.$pengamatan_tanah['Mg'];
      }
      else{
        echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.$pengamatan_tanah['Mg'];
      }
    }
  }
?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="row">
                  <h2>Timeline Land Preparation</h2>
                  <div class="table-responsive">
                    <table class="table table-actions">
                      <tbody>
                        <tr style="background-color: #00CED1;">
                          <td rowspan="2" style="color:black;padding-top:3px;padding-bottom:3px;text-align:center;vertical-align:middle;" width="150px">Tanggal</th>
                          <td rowspan="2" style="color:black;padding-top:3px;padding-bottom:3px;text-align:center;vertical-align:middle;">Aktivitas</td>
                          <td colspan="2" style="color:black;padding-top:3px;padding-bottom:0px;text-align:center;">Penarik</td>
                          <td colspan="2" style="color:black;padding-top:3px;padding-bottom:0px;text-align:center;">Implement</td>
                        </tr>
                        <tr style="background-color: #00CED1;">
                          <td style="color:black;padding-top:0px;padding-bottom:3px;text-align:center;">Jenis</td>
                          <td style="color:black;padding-top:0px;padding-bottom:3px;text-align:center;">Biaya</td>
                          <td style="color:black;padding-top:0px;padding-bottom:3px;text-align:center;">Jenis</td>
                          <td style="color:black;padding-top:0px;padding-bottom:3px;text-align:center;">Biaya</td>
                        </tr>
                        <!-- <tr>
<?php
  if($lokasi['status'] == 'NSSC'){
?>
                          <td style="color:black;padding-top:0px;padding-bottom:0px;" align="right">-</td>
                          <td style="color:black;padding-top:0px;padding-bottom:0px;" colspan="6">Siap Bongkar</td>
<?php
  }
  else{
?>
                          <td style="color:black;padding-top:0px;padding-bottom:0px;" align="right"><?php echo format_tgl($histori_lokasi_bk['tgl_perubahan_status']); ?></td>
                          <td style="color:black;padding-top:0px;padding-bottom:0px;" colspan="6">Siap Bongkar</td>
<?php
  }
?>
                        </tr> -->
<?php
  $cek_tgl_chopper = '';
  $cek_he_chopper = 0;
  $i_chopper = 0;
  $no_chopper = 0;
  $biaya_chopper1 = 0;
  $biaya_chopper2 = 0;
  $implement_chopper = 0;

  $cek_tgl_moldboard = '';
  $cek_he_moldboard = 0;
  $i_moldboard = 0;
  $no_moldboard = 0;
  $biaya_moldboard1 = 0;
  $biaya_moldboard2 = 0;
  $implement_moldboard = 0;

  $cek_tgl_diskplow = '';
  $cek_he_diskplow = 0;
  $i_diskplow = 0;
  $no_diskplow = 0;
  $biaya_diskplow1 = 0;
  $biaya_diskplow2 = 0;
  $implement_diskplow = 0;

  $cek_tgl_harrow = '';
  $cek_he_harrow = 0;
  $i_harrow = 0;
  $no_harrow = 0;
  $biaya_harrow1 = 0;
  $biaya_harrow2 = 0;
  $implement_harrow = 0;

  $cek_tgl_subsoiling = '';
  $cek_he_subsoiling = 0;
  $i_subsoiling = 0;
  $no_subsoiling = 0;
  $biaya_subsoiling1 = 0;
  $biaya_subsoiling2 = 0;
  $implement_subsoiling = 0;

  $cek_tgl_finishingrotary = '';
  $cek_he_finishingrotary = 0;
  $i_finishingrotary = 0;
  $no_finishingrotary = 0;
  $biaya_finishingrotary1 = 0;
  $biaya_finishingrotary2 = 0;
  $implement_finishingrotary = 0;

  $cek_tgl_finishingharrow = '';
  $cek_he_finishingharrow = 0;
  $i_finishingharrow = 0;
  $no_finishingharrow = 0;
  $biaya_finishingharrow1 = 0;
  $biaya_finishingharrow2 = 0;
  $implement_finishingharrow = 0;

  $cek_tgl_ridger = '';
  $cek_he_ridger = 0;
  $i_ridger = 0;
  $no_ridger = 0;
  $biaya_ridger1 = 0;
  $biaya_ridger2 = 0;
  $implement_ridger = 0;

  $cek_tgl_bedder = '';
  $cek_he_bedder = 0;
  $i_bedder = 0;
  $no_bedder = 0;
  $biaya_bedder1 = 0;
  $biaya_bedder2 = 0;
  $implement_bedder = 0;

  $total_biaya_penarik = 0;
  $total_biaya_implement = 0;
  $i = 0;
  $hide = 0;
  $biaya_tl1 = 0;
  $biaya_tl2 = 0;
  $no = 0;
  foreach ($timeline_landprep as $tl) {
    if($tl->category == 'Penarik'){
      switch ($tl->jenis) {
        case 'Chopper':
          $i = ++$i_chopper;
          $jenis = 'chopper';
          $cek_he_chopper += $tl->hasil_efektif;
          if(((strtotime($tl->tgl_realisasi) - strtotime($cek_tgl_chopper)) / 86400 <= 7)){
            $hide = 1;
            $no = $no_chopper;
            $biaya_chopper1 += $tl->biaya_realisasi;
            $biaya_tl1 = $biaya_chopper1;
            $implement_chopper = 1;
          }
          else{
            $cek_tgl_chopper = $tl->tgl_realisasi;
            $hide = 0;
            $no_chopper++;
            $no = $no_chopper;
            $biaya_chopper1 = $tl->biaya_realisasi;
            $biaya_tl1 = $tl->biaya_realisasi;
            $implement_chopper = 0;
          }
          break;
        case 'Moldboard':
          $i = ++$i_moldboard;
          $jenis = 'moldboard';
          $cek_he_moldboard += $tl->hasil_efektif;
          if(((strtotime($tl->tgl_realisasi) - strtotime($cek_tgl_moldboard)) / 86400 <= 7)){
            $hide = 1;
            $no = $no_moldboard;
            $biaya_moldboard1 += $tl->biaya_realisasi;
            $biaya_tl1 = $biaya_moldboard1;
            $implement_moldboard = 1;
          }
          else{
            $cek_tgl_moldboard = $tl->tgl_realisasi;
            $hide = 0;
            $no_moldboard++;
            $no = $no_moldboard;
            $biaya_moldboard1 = $tl->biaya_realisasi;
            $biaya_tl1 = $tl->biaya_realisasi;
            $implement_moldboard = 0;
          }
          break;
        case 'Disk Plow':
          $i = ++$i_diskplow;
          $jenis = 'diskplow';
          $cek_he_diskplow += $tl->hasil_efektif;
          if(((strtotime($tl->tgl_realisasi) - strtotime($cek_tgl_diskplow)) / 86400 <= 7)){
            $hide = 1;
            $no = $no_diskplow;
            $biaya_diskplow1 += $tl->biaya_realisasi;
            $biaya_tl1 = $biaya_diskplow1;
            $implement_diskplow = 1;
          }
          else{
            $cek_tgl_diskplow = $tl->tgl_realisasi;
            $hide = 0;
            $no_diskplow++;
            $no = $no_diskplow;
            $biaya_diskplow1 = $tl->biaya_realisasi;
            $biaya_tl1 = $tl->biaya_realisasi;
            $implement_diskplow = 0;
          }
          break;
        case 'Harrow':
          $i = ++$i_harrow;
          $jenis = 'harrow';
          $cek_he_harrow += $tl->hasil_efektif;
          if(((strtotime($tl->tgl_realisasi) - strtotime($cek_tgl_harrow)) / 86400 <= 7)){
            $hide = 1;
            $no = $no_harrow;
            $biaya_harrow1 += $tl->biaya_realisasi;
            $biaya_tl1 = $biaya_harrow1;
            $implement_harrow = 1;
          }
          else{
            $cek_tgl_harrow = $tl->tgl_realisasi;
            $hide = 0;
            $no_harrow++;
            $no = $no_harrow;
            $biaya_harrow1 = $tl->biaya_realisasi;
            $biaya_tl1 = $tl->biaya_realisasi;
            $implement_harrow = 0;
          }
          break;
        case 'Sub Soiling':
          $i = ++$i_subsoiling;
          $jenis = 'subsoiling';
          $cek_he_subsoiling += $tl->hasil_efektif;
          if(((strtotime($tl->tgl_realisasi) - strtotime($cek_tgl_subsoiling)) / 86400 <= 7)){
            $hide = 1;
            $no = $no_subsoiling;
            $biaya_subsoiling1 += $tl->biaya_realisasi;
            $biaya_tl1 = $biaya_subsoiling1;
            $implement_subsoiling = 1;
          }
          else{
            $cek_tgl_subsoiling = $tl->tgl_realisasi;
            $hide = 0;
            $no_subsoiling++;
            $no = $no_subsoiling;
            $biaya_subsoiling1 = $tl->biaya_realisasi;
            $biaya_tl1 = $tl->biaya_realisasi;
            $implement_subsoiling = 0;
          }
          break;
        case 'Finishing Rotary':
          $i = ++$i_finishingrotary;
          $jenis = 'finishingrotary';
          $cek_he_finishingrotary += $tl->hasil_efektif;
          if(((strtotime($tl->tgl_realisasi) - strtotime($cek_tgl_finishingrotary)) / 86400 <= 7)){
            $hide = 1;
            $no = $no_finishingrotary;
            $biaya_finishingrotary1 += $tl->biaya_realisasi;
            $biaya_tl1 = $biaya_finishingrotary1;
            $implement_finishingrotary = 1;
          }
          else{
            $cek_tgl_finishingrotary = $tl->tgl_realisasi;
            $hide = 0;
            $no_finishingrotary++;
            $no = $no_finishingrotary;
            $biaya_finishingrotary1 = $tl->biaya_realisasi;
            $biaya_tl1 = $tl->biaya_realisasi;
            $implement_finishingrotary = 0;
          }
          break;
        case 'Finishing Harrow':
          $i = ++$i_finishingharrow;
          $jenis = 'finishingharrow';
          $cek_he_finishingharrow += $tl->hasil_efektif;
          if(((strtotime($tl->tgl_realisasi) - strtotime($cek_tgl_finishingharrow)) / 86400 <= 7)){
            $hide = 1;
            $no = $no_finishingharrow;
            $biaya_finishingharrow1 += $tl->biaya_realisasi;
            $biaya_tl1 = $biaya_finishingharrow1;
            $implement_finishingharrow = 1;
          }
          else{
            $cek_tgl_finishingharrow = $tl->tgl_realisasi;
            $hide = 0;
            $no_finishingharrow++;
            $no = $no_finishingharrow;
            $biaya_finishingharrow1 = $tl->biaya_realisasi;
            $biaya_tl1 = $tl->biaya_realisasi;
            $implement_finishingharrow = 0;
          }
          break;
        case 'Ridger':
          $i = ++$i_ridger;
          $jenis = 'ridger';
          $cek_he_ridger += $tl->hasil_efektif;
          if(((strtotime($tl->tgl_realisasi) - strtotime($cek_tgl_ridger)) / 86400 <= 7)){
            $hide = 1;
            $no = $no_ridger;
            $biaya_ridger1 += $tl->biaya_realisasi;
            $biaya_tl1 = $biaya_ridger1;
            $implement_ridger = 1;
          }
          else{
            $cek_tgl_ridger = $tl->tgl_realisasi;
            $hide = 0;
            $no_ridger++;
            $no = $no_ridger;
            $biaya_ridger1 = $tl->biaya_realisasi;
            $biaya_tl1 = $tl->biaya_realisasi;
            $implement_ridger = 0;
          }
          break;
        case 'Bedder':
          $i = ++$i_bedder;
          $jenis = 'bedder';
          $cek_he_bedder += $tl->hasil_efektif;
          if(((strtotime($tl->tgl_realisasi) - strtotime($cek_tgl_bedder)) / 86400 <= 7)){
            $hide = 1;
            $no = $no_bedder;
            $biaya_bedder1 += $tl->biaya_realisasi;
            $biaya_tl1 = $biaya_bedder1;
            $implement_bedder = 1;
          }
          else{
            $cek_tgl_bedder = $tl->tgl_realisasi;
            $hide = 0;
            $no_bedder++;
            $no = $no_bedder;
            $biaya_bedder1 = $tl->biaya_realisasi;
            $biaya_tl1 = $tl->biaya_realisasi;
            $implement_bedder = 0;
          }
          break;
      }

      if($tl->jenis == 'Disk Plow' && $tl->rental == 1){
?>
                        <tr id='tr_landprep_<?php echo $jenis.$i; ?>'>
                          <td style="color:black;padding-top:0px;padding-bottom:0px;" align="right"><?php echo format_tgl($tl->tgl_realisasi); ?></td>
                          <td style="color:black;padding-top:0px;padding-bottom:0px;"><?php echo $tl->jenis.' '.$no; ?></td>
                          <td style="color:black;padding-top:0px;padding-bottom:0px;"><?php echo $tl->bahan_alat_desc; ?></td>
                          <td style="color:black;padding-top:0px;padding-bottom:0px;" align="right"><?php echo angka_ribuan($biaya_tl1); ?></td>
                          <td style="color:black;padding-top:0px;padding-bottom:0px;" colspan="2">&nbsp;</td>
                        </tr>
<?php
      }
      else{
?>
                        <tr id='tr_landprep_<?php echo $jenis.$i; ?>'>
                          <td style="color:black;padding-top:0px;padding-bottom:0px;" align="right"><?php echo format_tgl($tl->tgl_realisasi); ?></td>
                          <td style="color:black;padding-top:0px;padding-bottom:0px;"><?php echo $tl->jenis.' '.$no; ?></td>
                          <td style="color:black;padding-top:0px;padding-bottom:0px;"><?php echo $tl->bahan_alat_desc; ?></td>
                          <td style="color:black;padding-top:0px;padding-bottom:0px;" align="right"><?php echo angka_ribuan($biaya_tl1); ?></td>
<?php
      }
      $total_biaya_penarik += $tl->biaya_realisasi;

      if($hide == 1){
?>
  <script>
    hide_tr('tr_landprep_<?php echo $jenis.($i-1); ?>');
  </script>
<?php
      }

    }
    else{
      switch ($tl->jenis) {
        case 'Chopper':
          if($implement_chopper == 1){
            $biaya_chopper2 += $tl->biaya_realisasi;
            $biaya_tl2 = $biaya_chopper2;
          }
          else{
            $biaya_chopper2 = $tl->biaya_realisasi;
            $biaya_tl2 = $tl->biaya_realisasi;
          }
          break;
        case 'Moldboard':
          if($implement_moldboard == 1){
            $biaya_moldboard2 += $tl->biaya_realisasi;
            $biaya_tl2 = $biaya_moldboard2;
          }
          else{
            $biaya_moldboard2 = $tl->biaya_realisasi;
            $biaya_tl2 = $tl->biaya_realisasi;
          }
          break;
        case 'Disk Plow':
          if($implement_diskplow == 1){
            $biaya_diskplow2 += $tl->biaya_realisasi;
            $biaya_tl2 = $biaya_diskplow2;
          }
          else{
            $biaya_diskplow2 = $tl->biaya_realisasi;
            $biaya_tl2 = $tl->biaya_realisasi;
          }
          break;
        case 'Harrow':
          if($implement_harrow == 1){
            $biaya_harrow2 += $tl->biaya_realisasi;
            $biaya_tl2 = $biaya_harrow2;
          }
          else{
            $biaya_harrow2 = $tl->biaya_realisasi;
            $biaya_tl2 = $tl->biaya_realisasi;
          }
          break;
        case 'Sub Soiling':
          if($implement_subsoiling == 1){
            $biaya_subsoiling2 += $tl->biaya_realisasi;
            $biaya_tl2 = $biaya_subsoiling2;
          }
          else{
            $biaya_subsoiling2 = $tl->biaya_realisasi;
            $biaya_tl2 = $tl->biaya_realisasi;
          }
          break;
        case 'Finishing Rotary':
          if($implement_finishingrotary == 1){
            $biaya_finishingrotary2 += $tl->biaya_realisasi;
            $biaya_tl2 = $biaya_finishingrotary2;
          }
          else{
            $biaya_finishingrotary2 = $tl->biaya_realisasi;
            $biaya_tl2 = $tl->biaya_realisasi;
          }
          break;
        case 'Finishing Harrow':
          if($implement_finishingharrow == 1){
            $biaya_finishingharrow2 += $tl->biaya_realisasi;
            $biaya_tl2 = $biaya_finishingharrow2;
          }
          else{
            $biaya_finishingharrow2 = $tl->biaya_realisasi;
            $biaya_tl2 = $tl->biaya_realisasi;
          }
          break;
        case 'Ridger':
          if($implement_ridger == 1){
            $biaya_ridger2 += $tl->biaya_realisasi;
            $biaya_tl2 = $biaya_ridger2;
          }
          else{
            $biaya_ridger2 = $tl->biaya_realisasi;
            $biaya_tl2 = $tl->biaya_realisasi;
          }
          break;
        case 'Bedder':
          if($implement_bedder == 1){
            $biaya_bedder2 += $tl->biaya_realisasi;
            $biaya_tl2 = $biaya_bedder1;
          }
          else{
            $biaya_bedder2 = $tl->biaya_realisasi;
            $biaya_tl2 = $tl->biaya_realisasi;
          }
          break;
      }
?>
                          <td style="color:black;padding-top:0px;padding-bottom:0px;"><?php echo $tl->bahan_alat_desc; ?></td>
                          <td style="color:black;padding-top:0px;padding-bottom:0px;" align="right"><?php echo angka_ribuan($biaya_tl2); ?></td>
                        </tr>
<?php
      $total_biaya_implement += $tl->biaya_realisasi;
    }
  }
?>
                        <tr>
                          <td style="color:black;padding-top:0px;padding-bottom:0px;" align="right"><?php echo format_tgl($jalan_saluran['tgl_realisasi']); ?></td>
                          <td style="color:black;padding-top:0px;padding-bottom:0px;" colspan="6"><?php echo $jalan_saluran['category']; ?></td>
                        </tr>
                        <tr>
<?php
  if($lokasi['status'] == 'NSSC'){
?>
                          <td style="color:black;padding-top:0px;padding-bottom:0px;" align="right">-</td>
                          <td style="color:black;padding-top:0px;padding-bottom:0px;" colspan="6">Siap Tanam</td>
<?php
  }
  else{
?>
                          <td style="color:black;padding-top:0px;padding-bottom:0px;" align="right"><?php echo format_tgl($lokasi['tgl_mulai_tanam']); ?></td>
                          <td style="color:black;padding-top:0px;padding-bottom:0px;" colspan="6">Siap Tanam</td>
<?php
  }
?>
                        </tr>
                      </tbody>
                      <tfoot>
                        <tr style="background-color:#DCDCDC;">
                          <td style="color:black;padding-top:0px;padding-bottom:0px;" colspan="3"><b>Total Biaya</b></td>
                          <td style="color:black;padding-top:0px;padding-bottom:0px;" align="right"><b><?php echo angka_ribuan($total_biaya_penarik); ?></b></td>
                          <td style="color:black;padding-top:0px;padding-bottom:0px;">&nbsp;</td>
                          <td style="color:black;padding-top:0px;padding-bottom:0px;" align="right" colspan="2"><b><?php echo angka_ribuan($total_biaya_implement); ?></b></td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-3">
                    <table class="table table-actions">
                      <tbody>
                        <tr style="background-color: #F5F5F5;">
                          <td style="color:black;padding-top:0px;padding-bottom:0px;">Charge</td>
                          <td style="color:black;padding-top:0px;padding-bottom:0px;" align="right"><?php echo angka_ribuan($total_charge['charge']['total']); ?></td>
                        </tr>
                        <tr>
                          <td style="color:black;padding-top:0px;padding-bottom:0px;">Material</td>
                          <td style="color:black;padding-top:0px;padding-bottom:0px;" align="right"><?php echo angka_ribuan($total_charge['material']['total']); ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="col-md-3">
                    <table class="table table-actions">
                      <tbody>
                        <tr style="background-color: #F5F5F5;">
                          <td style="color:black;padding-top:0px;padding-bottom:0px;">Labour</td>
                          <td style="color:black;padding-top:0px;padding-bottom:0px;" align="right"><?php echo angka_ribuan($total_charge['labour']['total']); ?></td>
                        </tr>
                        <tr>
                          <td style="color:black;padding-top:0px;padding-bottom:0px;">Others</td>
                          <td style="color:black;padding-top:0px;padding-bottom:0px;" align="right"><?php echo angka_ribuan($total_charge['others']['total']); ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <table class="table table-actions">
                      <tbody>
                        <tr style="background-color: #F5F5F5;">
                          <td style="color:black;padding-top:0px;padding-bottom:0px;">Varian Cost</td>
                          <td style="color:black;padding-top:0px;padding-bottom:0px;" align="right">
<?php
  $lp_varian_cost = ($element_cost_real['ZN01']['total'] / $luas) - ($total_charge['charge']['total'] + $total_charge['labour']['total'] + $total_charge['material']['total'] + $total_charge['others']['total']);
  echo angka_ribuan(($element_cost_real['ZN01']['total'] / $luas) - ($total_charge['charge']['total'] + $total_charge['labour']['total'] + $total_charge['material']['total'] + $total_charge['others']['total']));
?>
                          </td>
                        </tr>
                        <tr style="background-color: #CDCDCD;">
                          <td style="color:black;padding-top:0px;padding-bottom:0px;">Total Landprep</td>
                          <td style="color:black;padding-top:0px;padding-bottom:0px;" align="right"><?php echo angka_ribuan($total_charge['charge']['total'] + $total_charge['labour']['total'] + $total_charge['material']['total'] + $total_charge['others']['total'] + $lp_varian_cost); ?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading" style="background-color: #32CD32;">
              <div class="panel-title-box" style="margin-top: 4px;padding-top:4px;padding-left:4px">
                <h2 style="color:black;"><b>Plant Maintenance</b></h2>
              </div>
              <ul class="panel-controls" style="margin-top: 4px;padding-top:4px;padding-right:4px">
                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
              </ul>
            </div>
            <div class="panel-body">
              <div class="row">
              <div class="col-md-12" style="padding-right:0px;padding-left:0px;padding-bottom:0px;">
                <div class="panel panel-default">
                  <div class="panel-heading" style="background-color: #32CD32;">
                    <h3 style="color:black;" class="panel-title"><b>Observation</b></h3>
                  </div>
                  <div class="panel-body">
                    <div class="col-md-3" style="padding-right:5px;padding-left:0px;padding-bottom:0px;">
                      <div class="row">
                        <table class="table table-actions">
                          <tbody>
                            <tr style="background-color: #32CD32;">
                              <td style="color:black;padding-top:5px;padding-bottom:5px;" colspan="2">
                                Pengamatan D-Leaf
                              </td>
                            </tr>
                            <tr style="background-color: #F5F5F5;">
                              <td style="color:black;padding-top:2px;padding-bottom:2px;">Tanggal Pengamatan</td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
  <?php
    if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
      echo "-";
      $tgl_pengamatan_dleaf = NULL;
    }
    else{
      echo format_tgl($berat_tanaman['tgl_pengamatan']);
      $tgl_pengamatan_dleaf = $berat_tanaman['tgl_pengamatan'];
    }
  ?>
                              </td>
                            </tr>
                            <tr>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;">Umur Saat Pengamatan</td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
  <?php
    if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
      echo "- Bulan";
    }
    else{
      if($tgl_pengamatan_dleaf != NULL){
        $date1 = round(strtotime($berat_tanaman['tgl_pengamatan'])/86400);
        $date2 = round(strtotime($lokasi['tgl_mulai_rawat'])/86400);

        $umur = ($date1-$date2)/30.4583333333333;

        echo ceil($umur)." Bulan";
      }
      else{
        echo "- Bulan";
      }
    }
  ?>
                              </td>
                            </tr>
                            <tr style="background-color: #F5F5F5;">
                              <td style="color:black;padding-top:2px;padding-bottom:2px;">Populasi Normal</td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
  <?php
    if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
      echo "-";
    }
    else{
      if($berat_tanaman['total'] == 0){
        echo "-";
      }
      else{
        echo angka_ribuan($berat_tanaman['total']);
      }
    }
  ?>
                              </td>
                            </tr>
                            <tr>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;">Warna Daun</td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
  <?php
    if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
      echo "-";
    }
    else{
      if($berat_tanaman['0-25'] == 0){
        echo "-";
      }
      else{
        echo $berat_tanaman['0-25'];
      }
    }
  ?>
                              </td>
                            </tr>
                            <tr style="background-color: #F5F5F5;">
                              <td style="color:black;padding-top:2px;padding-bottom:2px;">Mealybug</td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
  <?php
    if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
      echo "-";
    }
    else{
      if($berat_tanaman['MBW'] == 0){
        echo "-";
      }
      else{
        echo $berat_tanaman['MBW'];
      }
    }
  ?>
                              </td>
                            </tr>
                            <tr>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;">Phytoptora</td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
  <?php
    if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
      echo "-";
    }
    else{
      if($berat_tanaman['PHY'] == 0){
        echo "-";
      }
      else{
        echo $berat_tanaman['PHY'];
      }
    }
  ?>
                              </td>
                            </tr>
                            <tr style="background-color: #F5F5F5;">
                              <td style="color:black;padding-top:2px;padding-bottom:2px;">Erwinia</td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
  <?php
    if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
      echo "-";
    }
    else{
      if($berat_tanaman['ERW'] == 0){
        echo "-";
      }
      else{
        echo $berat_tanaman['ERW'];
      }
    }
  ?>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="row">
                        <canvas id="diagram_berat_tanaman"></canvas>
<script>
  var config_berat_tanaman = {
		type: 'line',
		data: {
			labels: ['F-7', 'F-6', 'F-5', 'F-4', 'F-3', 'F-2', 'F-1', 'F0', 'F+1', 'F+2'],
			datasets: [{
				label: 'Berat Tanaman',
				backgroundColor: '#32CD32',
				borderColor: '#32CD32',
				data: [
          <?php echo $rata_berat_tanaman; ?>
				],
				fill: false,
			}]
		},
		options: {
      tension: 1,
      legend: {
          display: false,
      },
			responsive: true,
			title: {
				display: true,
				text: 'Berat Tanaman',
        fontSize: 14,
        fontFamily: 'arial',
        padding: 5,
        lineHeight: 1,
			},
      tooltips: {
        mode: 'index',
        intersect: false
      },
      scales: {
				xAxes: [{
					gridLines: {
        			display: false,
        			drawBorder: true,
        			drawOnChartArea: false,
        		},
  					ticks: {
  						min: 0,
  						max: 2.8,
  					}
				}],
				yAxes: [{
					gridLines: {
        			display: false,
        			drawBorder: false,
        			drawOnChartArea: false,
        		}
				}]
			}
		}
	};
</script>
                      </div>
                    </div>
                    <div class="col-md-3" style="padding-right:5px;padding-left:5px;padding-bottom:0px;">
                      <table class="table table-actions">
                        <tbody>
                          <tr style="background-color: #32CD32;">
                            <td style="color:black;padding-top:5px;padding-bottom:5px;" colspan="2">
                              Analisa Daun
                            </td>
                          </tr>
                          <tr style="background-color: #F5F5F5;">
                            <td style="color:black;padding-top:2px;padding-bottom:2px;">Tanggal Pengamatan</td>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo "-";
    $tgl_pengamatan_analisa_daun = NULL;
  }
  else{
    echo format_tgl($pengamatan_daun['tgl_terima_sampel']);
    $tgl_pengamatan_analisa_daun = $pengamatan_daun['tgl_terima_sampel'];
  }
?>
                            </td>
                          </tr>
                          <tr>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;">Umur Saat Pengamatan</td>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo "- Bulan";
  }
  else{
    if($tgl_pengamatan_analisa_daun != NULL){
      $date1 = round(strtotime($pengamatan_daun['tgl_terima_sampel'])/86400);
      $date2 = round(strtotime($lokasi['tgl_mulai_rawat'])/86400);

      $umur = ($date1-$date2)/30.4583333333333;

      echo ceil($umur)." Bulan";
    }
    else{
      echo "- Bulan";
    }
  }
?>
                            </td>
                          </tr>
                          <tr style="background-color: #F5F5F5;">
                            <td style="color:black;padding-top:2px;padding-bottom:2px;">P (0.24 - 0.35)</td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($pengamatan_daun['P'] == 0){
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">-';
    }
    else{
      if($pengamatan_daun['P'] >= 0.24 && $pengamatan_daun['P'] <= 0.35){
        echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.$pengamatan_daun['P'];
      }
      else{
        echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.$pengamatan_daun['P'];
      }
    }
  }
?>
                            </td>
                          </tr>
                          <tr>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;">Fe (80 - 150)</td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($pengamatan_daun['Fe'] == 0){
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">-';
    }
    else{
      if($pengamatan_daun['Fe'] >= 80 && $pengamatan_daun['Fe'] <= 150){
        echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.$pengamatan_daun['Fe'];
      }
      else{
        echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.$pengamatan_daun['Fe'];
      }
    }
  }
?>
                            </td>
                          </tr>
                          <tr style="background-color: #F5F5F5;">
                            <td style="color:black;padding-top:2px;padding-bottom:2px;">K (2.40 - 3.60)</td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($pengamatan_daun['K'] == 0){
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">-';
    }
    else{
      if($pengamatan_daun['K'] >= 2.4 && $pengamatan_daun['K'] <= 3.6){
        echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.$pengamatan_daun['K'];
      }
      else{
        echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.$pengamatan_daun['K'];
      }
    }
  }
?>
                            </td>
                          </tr>
                          <tr>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;">Zn (15 - 70)</td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($pengamatan_daun['Zn'] == 0){
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">-';
    }
    else{
      if($pengamatan_daun['Zn'] >= 15 && $pengamatan_daun['Zn'] <= 70){
        echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.$pengamatan_daun['Zn'];
      }
      else{
        echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.$pengamatan_daun['Zn'];
      }
    }
  }
?>
                            </td>
                          </tr>
                          <tr style="background-color: #F5F5F5;">
                            <td style="color:black;padding-top:2px;padding-bottom:2px;">Mg (0.28 - 0.36)</td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($pengamatan_daun['Mg'] == 0){
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">-';
    }
    else{
      if($pengamatan_daun['Mg'] >= 0.28 && $pengamatan_daun['Mg'] <= 0.36){
        echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.$pengamatan_daun['Mg'];
      }
      else{
        echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.$pengamatan_daun['Mg'];
      }
    }
  }
?>
                            </td>
                          </tr>
                          <tr>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;">Ca (0.18 - 0.24)</td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($pengamatan_daun['Ca'] == 0){
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">-';
    }
    else{
      if($pengamatan_daun['Ca'] >= 0.18 && $pengamatan_daun['Ca'] <= 0.24){
        echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.$pengamatan_daun['Ca'];
      }
      else{
        echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.$pengamatan_daun['Ca'];
      }
    }
  }
?>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="col-md-6" style="padding-right:0px;padding-left:5px;padding-bottom:0px;">
                      <div class="col-md-7" style="padding-right:5px;padding-left:0px;padding-bottom:0px;">
                        <canvas id="diagram_persen_bunga" width="100%" height="65px"></canvas>
<?php
  $persen_bunga = '';
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    $persen_bunga .= "0, 0, 0, 0, 0, 0, 0, 0";
  }
  else{
    $persen_bunga .= round($pengamatan_persen_bunga['persen_berbunga_normal_NN'], 2);
    $persen_bunga .= ", ".round($pengamatan_persen_bunga['persen_berbunga_normal_NT'], 2);
    $persen_bunga .= ", ".round($pengamatan_persen_bunga['persen_mandul_kerdil'], 2);
    $persen_bunga .= ", ".round($pengamatan_persen_bunga['persen_mandul_penyakit'], 2);
    $persen_bunga .= ", ".round($pengamatan_persen_bunga['persen_mandul_normal'], 2);
    $persen_bunga .= ", ".round($pengamatan_persen_bunga['persen_berbunga_kerdil'], 2);
    $persen_bunga .= ", ".round($pengamatan_persen_bunga['persen_berbunga_penyakit'], 2);
    if($pengamatan_persen_bunga['total'] != NULL){
      $pengamatan_persen_berbunga_normal = ($pengamatan_persen_bunga['berbunga_normal'] / $pengamatan_persen_bunga['total']) * 100;
    }
    else{
      $pengamatan_persen_berbunga_normal = 0;
    }
    $persen_bunga .= ", ".round($pengamatan_persen_berbunga_normal, 2);
  }
?>
<script>
  var config_persen_bunga = {
		type: 'horizontalBar',
		data: {
			labels: ['Normal / Normal', 'Total / Total', 'Mandul Kerdil', 'Mandul Penyakit', 'Mandul Normal', 'Bunga Kerdil', 'Bunga Penyakit', 'Bunga Normal'],
			datasets: [{
				label: 'Persen Bunga',
				backgroundColor: '#32CD32',
				borderColor: '#32CD32',
				data: [
          <?php echo $persen_bunga; ?>
				],
				fill: false,
			}]
		},
		options: {
      tension: 1,
      legend: {
          display: false,
      },
			responsive: true,
			title: {
				display: true,
				text: 'Persen Bunga',
        fontSize: 14,
        fontFamily: 'arial',
        padding: 5,
        lineHeight: 1,
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
      scales: {
				yAxes: [{
					gridLines: {
        			display: false,
        			drawBorder: true,
        			drawOnChartArea: false,
        		}
				}],
				xAxes: [{
    			display: false
				}]
			}
		}
	};
</script>
                      </div>
                      <div class="col-md-5" style="padding-right:0px;padding-left:5px;padding-bottom:0px;">
                        <table class="table table-actions">
                          <tbody>
                            <tr style="background-color: #32CD32;">
                              <td style="color:black;padding-top:5px;padding-bottom:5px;" colspan="2">
                                Persen Bunga
                              </td>
                            </tr>
                            <tr style="background-color: #F5F5F5;">
                              <td style="color:black;padding-top:2px;padding-bottom:2px;">Tanggal Pengamatan</td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo "-";
  }
  else{
    echo format_tgl($pengamatan_persen_bunga['tgl_pengamatan']);
  }
?>
                              </td>
                            </tr>
                            <tr>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;">Umur Saat Pengamatan</td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo "- Bulan";
  }
  else{
    if($pengamatan_persen_bunga['tgl_pengamatan'] == NULL){
      echo "-";
    }
    else{
      $date1 = round(strtotime($pengamatan_persen_bunga['tgl_pengamatan'])/86400);
      $date2 = round(strtotime($lokasi['tgl_mulai_rawat'])/86400);

      $umur = ($date1-$date2)/30.4583333333333;

      echo ceil($umur)." Bulan";
    }
  }
?>
                              </td>
                            </tr>
                            <tr style="background-color: #32CD32;">
                              <td colspan="2" style="color:black;padding-top:5px;padding-bottom:5px;">
                                <b>Populasi :</b>
                              </td>
                            </tr>
                            <tr style="background-color: #F5F5F5;">
                              <td style="color:black;padding-top:2px;padding-bottom:2px;">Pop. Serangan Tikus</td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo "-";
  }
  else{
    if($pengamatan_persen_bunga['dimakan_tikus'] == 0){
      echo "-";
    }
    else{
      echo angka_ribuan($pengamatan_persen_bunga['dimakan_tikus']);
    }
  }
?>
                              </td>
                            </tr>
                            <tr>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;">Pop. Buah Alami</td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo "-";
  }
  else{
    if($pengamatan_persen_bunga['jumlah_buah_alami'] == 0){
      echo "-";
    }
    else{
      echo angka_ribuan($pengamatan_persen_bunga['jumlah_buah_alami']);
    }
  }
?>
                              </td>
                            </tr>
                            <tr style="background-color: #F5F5F5;">
                              <td style="color:black;padding-top:2px;padding-bottom:2px;">Populasi Normal</td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo "-";
  }
  else{
    if($pengamatan_persen_bunga['berbunga_normal'] == 0){
      echo "-";
    }
    else{
      echo angka_ribuan($pengamatan_persen_bunga['berbunga_normal']);
    }
  }
?>
                              </td>
                            </tr>
                          </tbody>
                          <tfoot>
                            <tr>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;">Populasi Total</td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo "-";
  }
  else{
    if($pengamatan_persen_bunga['total'] == 0){
      echo "-";
    }
    else{
      echo angka_ribuan($pengamatan_persen_bunga['total']);
    }
  }
?>
                              </td>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </div>

              <div class="col-md-4" style="padding-right:5px;padding-left:0px;padding-bottom:0px;">
                <div class="panel panel-default" style="z-index:10;">
                  <div class="panel-heading" style="background-color: #32CD32;">
                    <h3 style="color:black;" class="panel-title"><b>Fertilization</b></h3>
                  </div>
                  <div class="panel-body">
                    <div class="col-md-6" style="padding-right:5px;padding-left:0px;padding-bottom:0px;">
                      <div class="row">
                        <table class="table table-actions">
                          <tbody>
                            <tr style="background-color: #32CD32;">
                              <td style="color:black;padding-top:2px;padding-bottom:2px;">Material</td></td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align='right'>Real</td></td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align='right'>STD</td></td>
                            </tr>
                            <tr style="background-color: #F5F5F5;">
                              <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Urea');">Urea</a></td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($fertilization['Urea'] / $luas == 0){
      echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
    }
    else{
      if($fertilization['Urea'] / $luas <= $std_material['Urea']){
        echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['Urea'] / $luas);
      }
      else{
        echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['Urea'] / $luas);
      }
    }
  }
?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo angka_ribuan($std_material['Urea']); ?></td>
                            </tr>
                            <tr>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Za');">Za</a></td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($fertilization['Za'] / $luas == 0){
      echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
    }
    else{
      if($fertilization['Za'] / $luas <= $std_material['Za']){
        echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['Za'] / $luas);
      }
      else{
        echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['Za'] / $luas);
      }
    }
  }
?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo angka_ribuan($std_material['Za']); ?></td>
                            </tr>
                            <tr style="background-color: #F5F5F5;">
                              <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('K2SO4');">K2SO4</a></td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($fertilization['K2SO4'] / $luas == 0){
      echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
    }
    else{
      if($fertilization['K2SO4'] / $luas <= $std_material['K2SO4']){
        echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['K2SO4'] / $luas);
      }
      else{
        echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['K2SO4'] / $luas);
      }
    }
  }
?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo angka_ribuan($std_material['K2SO4']); ?></td>
                            </tr>
                            <tr>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('KCL');">KCL</a></td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($fertilization['KCL'] / $luas == 0){
      echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
    }
    else{
      if($fertilization['KCL'] / $luas <= $std_material['KCL']){
        echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['KCL'] / $luas);
      }
      else{
        echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['KCL'] / $luas);
      }
    }
  }
?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo angka_ribuan($std_material['KCL']); ?></td>
                            </tr>
                            <tr style="background-color: #F5F5F5;">
                              <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('TSP');">TSP</a></td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($fertilization['TSP'] / $luas == 0){
      echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
    }
    else{
      if($fertilization['TSP'] / $luas <= $std_material['TSP']){
        echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['TSP'] / $luas);
      }
      else{
        echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['TSP'] / $luas);
      }
    }
  }
?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo angka_ribuan($std_material['TSP']); ?></td>
                            </tr>
                            <tr>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('DAP');">DAP</a></td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($fertilization['DAP'] / $luas == 0){
      echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
    }
    else{
      if($fertilization['DAP'] / $luas <= $std_material['DAP']){
        echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['DAP'] / $luas);
      }
      else{
        echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['DAP'] / $luas);
      }
    }
  }
?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo angka_ribuan($std_material['DAP']); ?></td>
                            </tr>
                            <tr style="background-color: #F5F5F5;">
                              <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('MgSO4');">MgSO4</a></td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($fertilization['MgSO4'] / $luas == 0){
      echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
    }
    else{
      if($fertilization['MgSO4'] / $luas <= $std_material['MgSO4']){
        echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['MgSO4'] / $luas);
      }
      else{
        echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['MgSO4'] / $luas);
      }
    }
  }
?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo angka_ribuan($std_material['MgSO4']); ?></td>
                            </tr>
                            <tr>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Kieserite');">Kieserite</a></td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($fertilization['Kieserite'] / $luas == 0){
      echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
    }
    else{
      if($fertilization['Kieserite'] / $luas <= $std_material['Kieserite']){
        echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['Kieserite'] / $luas);
      }
      else{
        echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['Kieserite'] / $luas);
      }
    }
  }
?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo angka_ribuan($std_material['Kieserite']); ?></td>
                            </tr>
                            <tr style="background-color: #F5F5F5;">
                              <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('FeSO4');">FeSO4</a></td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($fertilization['FeSO4'] / $luas == 0){
      echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
    }
    else{
      if($fertilization['FeSO4'] / $luas <= $std_material['FeSO4']){
        echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['FeSO4'] / $luas);
      }
      else{
        echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['FeSO4'] / $luas);
      }
    }
  }
?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo angka_ribuan($std_material['FeSO4']); ?></td>
                            </tr>
                            <tr>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('ZnSO4');">ZnSO4</a></td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($fertilization['ZnSO4'] / $luas == 0){
      echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
    }
    else{
      if($fertilization['ZnSO4'] / $luas <= $std_material['ZnSO4']){
        echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['ZnSO4'] / $luas);
      }
      else{
        echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['ZnSO4'] / $luas);
      }
    }
  }
?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo angka_ribuan($std_material['ZnSO4']); ?></td>
                            </tr>
                            <tr style="background-color: #F5F5F5;">
                              <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Dolomite');">Dolomite</a></td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($fertilization['Dolomite'] / $luas == 0){
      echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
    }
    else{
      if($fertilization['Dolomite'] / $luas <= $std_material['KCL']){
        echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['Dolomite'] / $luas);
      }
      else{
        echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['Dolomite'] / $luas);
      }
    }
  }
?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo angka_ribuan($std_material['Dolomite']); ?></td>
                            </tr>
                            <tr>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Gypsum');">Gypsum</a></td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($fertilization['Gypsum'] / $luas == 0){
      echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
    }
    else{
      if($fertilization['Gypsum'] / $luas <= $std_material['Gypsum']){
        echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['Gypsum'] / $luas);
      }
      else{
        echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['Gypsum'] / $luas);
      }
    }
  }
?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo angka_ribuan($std_material['Gypsum']); ?></td>
                            </tr>
                            <tr style="background-color: #F5F5F5;">
                              <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('CuSO4');">CuSO4</a></td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($fertilization['CuSO4'] / $luas == 0){
      echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
    }
    else{
      if($fertilization['CuSO4'] / $luas <= $std_material['CuSO4']){
        echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['CuSO4'] / $luas);
      }
      else{
        echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['CuSO4'] / $luas);
      }
    }
  }
?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo angka_ribuan($std_material['CuSO4']); ?></td>
                            </tr>
                            <tr>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Borax');">Borax</a></td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($fertilization['Borax'] / $luas == 0){
      echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
    }
    else{
      if($fertilization['Borax'] / $luas <= $std_material['Borax']){
        echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['Borax'] / $luas);
      }
      else{
        echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['Borax'] / $luas);
      }
    }
  }
?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo angka_ribuan($std_material['Borax']); ?></td>
                            </tr>
                            <tr style="background-color: #F5F5F5;">
                              <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('LOB');">LOB</a></td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($fertilization['LOB'] / $luas == 0){
      echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
    }
    else{
      if($fertilization['LOB'] / $luas <= $std_material['LOB']){
        echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['LOB'] / $luas);
      }
      else{
        echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['LOB'] / $luas);
      }
    }
  }
?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo angka_ribuan($std_material['LOB']); ?></td>
                            </tr>
                            <tr>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('CaCl2');">CaCl2</a></td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($fertilization['CaCl2'] / $luas == 0){
      echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
    }
    else{
      if($fertilization['CaCl2'] / $luas <= $std_material['CaCl2']){
        echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['CaCl2'] / $luas);
      }
      else{
        echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['CaCl2'] / $luas);
      }
    }
  }
?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo angka_ribuan($std_material['CaCl2']); ?></td>
                            </tr>
                            <tr style="background-color: #F5F5F5;">
                              <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Calcibor');">Calcibor</a></td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($fertilization['Calcibor'] / $luas == 0){
      echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
    }
    else{
      if($fertilization['Calcibor'] / $luas <= $std_material['Calcibor']){
        echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['Calcibor'] / $luas);
      }
      else{
        echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['Calcibor'] / $luas);
      }
    }
  }
?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo angka_ribuan($std_material['Calcibor']); ?></td>
                            </tr>
                            <tr>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Kompos');">Kompos</a></td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($fertilization['Kompos'] / $luas == 0){
      echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
    }
    else{
      if($fertilization['Kompos'] / $luas <= $std_material['Kompos']){
        echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['Kompos'] / $luas);
      }
      else{
        echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['Kompos'] / $luas);
      }
    }
  }
?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo angka_ribuan($std_material['Kompos']); ?></td>
                            </tr>
                            <tr style="background-color: #F5F5F5;">
                              <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Belerang');">Belerang</a></td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($fertilization['Belerang'] / $luas == 0){
      echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
    }
    else{
      if($fertilization['Belerang'] / $luas <= $std_material['Belerang']){
        echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['Belerang'] / $luas);
      }
      else{
        echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['Belerang'] / $luas);
      }
    }
  }
?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo angka_ribuan($std_material['Belerang']); ?></td>
                            </tr>
                            <tr>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Kieserite_G');">Kieserite G</a></td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($fertilization['Kieserite_G'] / $luas == 0){
      echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
    }
    else{
      if($fertilization['Kieserite_G'] / $luas <= $std_material['Kieserite_G']){
        echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['Kieserite_G'] / $luas);
      }
      else{
        echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['Kieserite_G'] / $luas);
      }
    }
  }
?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo angka_ribuan($std_material['Kieserite_G']); ?></td>
                            </tr>
                            <tr>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('NPK');">NPK</a></td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($fertilization['NPK'] / $luas == 0){
      echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
    }
    else{
      if($fertilization['NPK'] / $luas <= $std_material['NPK']){
        echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['NPK'] / $luas);
      }
      else{
        echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['NPK'] / $luas);
      }
    }
  }
?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo angka_ribuan($std_material['NPK']); ?></td>
                            </tr>
                            <tr style="background-color: #F5F5F5;">
                              <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Petro_Cas');">Petro Cas</a></td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($fertilization['Petro_Cas'] / $luas == 0){
      echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
    }
    else{
      if($fertilization['Petro_Cas'] / $luas <= $std_material['Petro_Cas']){
        echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['Petro_Cas'] / $luas);
      }
      else{
        echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.angka_ribuan($fertilization['Petro_Cas'] / $luas);
      }
    }
  }
?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo angka_ribuan($std_material['Petro_Cas']); ?></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="row">
                        <table class="table table-actions">
                          <tbody>
                            <tr style="background-color: #32CD32;">
                              <td style="color:black;padding-top:5px;padding-bottom:5px;" colspan="2">
                                Bahan Pupuk / Unsur
                              </td>
                            </tr>
                            <tr style="background-color: #F5F5F5;">
                              <td style="color:black;padding-top:2px;padding-bottom:2px;">Unsur N</td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  $total_unsur = 0;
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo "-";
  }
  else{
    if($fertilization['Urea'] == 0){
      $Urea = 0;
    }
    else{
      $Urea = ($fertilization['Urea'] / $luas) * 0.46;
    }

    if($fertilization['Za'] == 0){
      $Za = 0;
    }
    else{
      $Za = ($fertilization['Za'] / $luas) * 0.21;
    }

    if($fertilization['DAP'] == 0){
      $DAP = 0;
    }
    else{
      $DAP = ($fertilization['DAP'] / $luas) * 0.18;
    }

    echo angka_ribuan($Urea + $Za + $DAP);
    $total_unsur += $Urea + $Za + $DAP;
  }
?>
                              </td>
                            </tr>
                            <tr>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;">Unsur P2o</td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo "-";
  }
  else{
    if($fertilization['TSP'] == 0){
      $TSP = 0;
    }
    else{
      $TSP = ($fertilization['TSP'] / $luas) * 0.46;
    }

    if($fertilization['DAP'] == 0){
      $DAP = 0;
    }
    else{
      $DAP = ($fertilization['DAP'] / $luas) * 0.46;
    }

    echo angka_ribuan($TSP + $DAP);
    $total_unsur += $TSP + $DAP;
  }
?>

                              </td>
                            </tr>
                            <tr style="background-color: #F5F5F5;">
                              <td style="color:black;padding-top:2px;padding-bottom:2px;">Unsur K2o</td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo "-";
  }
  else{
    if($fertilization['K2SO4'] == 0){
      $K2SO4 = 0;
    }
    else{
      $K2SO4 = ($fertilization['K2SO4'] / $luas) * 0.5;
    }

    if($fertilization['KCL'] == 0){
      $KCL = 0;
    }
    else{
      $KCL = ($fertilization['KCL'] / $luas) * 0.6;
    }

    echo angka_ribuan($K2SO4 + $KCL);
    $total_unsur += $K2SO4 + $KCL;
  }
?>
                              </td>
                            </tr>
                            <tr>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;">Unsur Mg</td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo "-";
  }
  else{
    if($fertilization['Kieserite'] == 0){
      $Kieserite = 0;
    }
    else{
      $Kieserite = ($fertilization['Kieserite'] / $luas) * 0.27;
    }

    if($fertilization['MgSO4'] == 0){
      $MgSO4 = 0;
    }
    else{
      $MgSO4 = ($fertilization['MgSO4'] / $luas) * 0.16;
    }

    if($fertilization['Dolomite'] == 0){
      $Dolomite = 0;
    }
    else{
      $Dolomite = ($fertilization['Dolomite'] / $luas) * 0.18;
    }

    echo angka_ribuan($Kieserite + $MgSO4 + $Dolomite);
    $total_unsur += $Kieserite + $MgSO4 + $Dolomite;
  }
?>
                              </td>
                            </tr>
                            <tr style="background-color:#DCDCDC;">
                              <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Total Unsur</b></td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><b>
<?php
  echo angka_ribuan($total_unsur);
?>
                              </b></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="col-md-6" style="padding-right:0px;padding-left:5px;padding-bottom:0px;">
                      <div class="row">
                        <table class="table table-actions">
                          <tbody>
                            <tr style="background-color: #32CD32;">
                              <td style="color:black;padding-top:5px;padding-bottom:5px;" colspan="3">Pupuk Spray Mekanis</td>
                            </tr>
  <?php
    $jarak_hari = 0;
    $jumlah_spray_mekanis = 0;
    foreach ($spray_mekanis as $sm) {
      $jumlah_spray_mekanis++;
      if($jumlah_spray_mekanis % 2 == 1){
        $color_spray_mekanis = "style='background-color: #F5F5F5;'";
      }
      else{
        $color_spray_mekanis = "";
      }
      if($jarak_hari != 0){
        $jarak_hari = round((strtotime($sm->tgl_realisasi) - strtotime($jarak_hari)) / 86400);
      }
      else{
        $jarak_hari = '-';
      }
  ?>
                            <tr <?php echo $color_spray_mekanis; ?>>
                              <td style="color:black;padding-top:1px;padding-bottom:1px;" align="right" width="30%"><?php echo $jarak_hari." Hari"; ?></td>
                              <td style="color:black;padding-top:1px;padding-bottom:1px;" align="right" width="40%"><a style="color:black;text-decoration:none;" href="javascript:detail_activity('<?php echo $sm->tgl_realisasi; ?>', 'Fertilization');"><?php echo format_tgl($sm->tgl_realisasi); ?></a></td>
                              <td style="color:black;padding-top:1px;padding-bottom:1px;" width="30%"><?php echo $sm->luas_aktif; ?> Ha</td>
                            </tr>
  <?php
      $jarak_hari = $sm->tgl_realisasi;
    }
  ?>
                          </tbody>
                        </table>
                      </div>
                      <div class="row">
                        <div class="col-md-12" style="padding-right:0px;padding-left:0px;padding-bottom:0px;">
                          <div class="panel panel-default" style="padding-right:0px;padding-left:0px;padding-bottom:0px;">
                            <div class="panel-body" style="background-color: #32CD32;" align="center">
                              <h2>
                                <b style="color:white;"><?php echo $jumlah_spray_mekanis; ?></b>
                              </h2>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-2" style="padding-right:5px;padding-left:5px;padding-bottom:0px;">
                <div class="panel panel-default" style="z-index:10;">
                  <div class="panel-heading" style="background-color: #32CD32;">
                    <h3 style="color:black;" class="panel-title"><b>Herbisida</b></h3>
                  </div>
                  <div class="panel-body">
                    <div class="row">
                      <table class="table table-actions">
                        <tbody>
                          <tr style="background-color: #32CD32;">
                            <td style="color:black;padding-top:2px;padding-bottom:2px;">Material</td></td>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align='right'>Real</td></td>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align='right'>STD</td></td>
                          </tr>
                          <tr style="background-color: #F5F5F5;">
                            <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Bromacyl');">Bromacyl</a></td>
<?php
if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
  echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
}
else{
  if($wc_material['Bromacyl'] / $luas == 0){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($wc_material['Bromacyl'] / $luas <= $std_material['Bromacyl']){
      echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.round($wc_material['Bromacyl'] / $luas, 2);
    }
    else{
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.round($wc_material['Bromacyl'] / $luas, 2);
    }
  }
}
?>
                            </td>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo round($std_material['Bromacyl'], 2); ?></td>
                          </tr>
                          <tr>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Diuron');">Diuron</a></td>
<?php
if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
  echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
}
else{
  if($wc_material['Diuron'] / $luas == 0){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($wc_material['Diuron'] / $luas <= $std_material['Diuron']){
      echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.round($wc_material['Diuron'] / $luas, 2);
    }
    else{
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.round($wc_material['Diuron'] / $luas, 2);
    }
  }
}
?>
                            </td>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo round($std_material['Diuron'], 2); ?></td>
                          </tr>
                          <tr style="background-color: #F5F5F5;">
                            <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Glyphosate');">Glyphosate</a></td>
<?php
if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
  echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
}
else{
  if($wc_material['Glyphosate'] / $luas == 0){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($wc_material['Glyphosate'] / $luas <= $std_material['Glyphosate']){
      echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.round($wc_material['Glyphosate'] / $luas, 2);
    }
    else{
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.round($wc_material['Glyphosate'] / $luas, 2);
    }
  }
}
?>
                            </td>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo round($std_material['Glyphosate'], 2); ?></td>
                          </tr>
                          <tr>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Quizalofop');">Quizalofop</a></td>
<?php
if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
  echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
}
else{
  if($wc_material['Quizalofop'] / $luas == 0){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($wc_material['Quizalofop'] / $luas <= $std_material['Glyphosate']){
      echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.round($wc_material['Quizalofop'] / $luas, 2);
    }
    else{
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.round($wc_material['Quizalofop'] / $luas, 2);
    }
  }
}
?>
                            </td>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo round($std_material['Quizalofop'], 2); ?></td>
                          </tr>
                          <tr style="background-color: #F5F5F5;">
                            <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Ametrine');">Ametrine</a></td>
<?php
if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
  echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
}
else{
  if($wc_material['Ametrine'] / $luas == 0){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($wc_material['Ametrine'] / $luas <= $std_material['Ametrine']){
      echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.round($wc_material['Ametrine'] / $luas, 2);
    }
    else{
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.round($wc_material['Ametrine'] / $luas, 2);
    }
  }
}
?>
                            </td>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo round($std_material['Ametrine'], 2); ?></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <div class="row">
                      <table class="table table-actions">
                        <tbody>
                          <tr style="background-color: #32CD32;">
                            <td style="color:black;padding-top:5px;padding-bottom:5px;" colspan="3">Herbisida Booster Mekanis</td>
                          </tr>
<?php
  $jarak_hari = 0;
  $jumlah_spray_boom = 0;
  foreach ($weed_control as $wc) {
    $jumlah_spray_boom++;
    if($jumlah_spray_boom % 2 == 1){
      $color_spray_boom = "style='background-color: #F5F5F5;'";
    }
    else{
      $color_spray_boom = "";
    }
    if($jarak_hari != 0){
      $jarak_hari = round((strtotime($wc->tgl_realisasi) - strtotime($jarak_hari)) / 86400);
    }
    else{
      $jarak_hari = '-';
    }
?>
                          <tr <?php echo $color_spray_boom; ?>>
                            <td style="color:black;padding-top:1px;padding-bottom:1px;" align="right" width="30%"><?php echo $jarak_hari." Hari"; ?></td>
                            <td style="color:black;padding-top:1px;padding-bottom:1px;" align="right" width="40%"><a style="color:black;text-decoration:none;" href="javascript:detail_activity('<?php echo $wc->tgl_realisasi; ?>', 'Weed_Control');"><?php echo format_tgl($wc->tgl_realisasi); ?></a></td>
                            <td style="color:black;padding-top:1px;padding-bottom:1px;" width="30%"><?php echo $wc->luas_aktif; ?> Ha</td>
                          </tr>
<?php
    $jarak_hari = $wc->tgl_realisasi;
  }
?>
                        </tbody>
                      </table>
                    </div>

                    <div class="row">
                      <div class="col-md-12" style="padding-right:0px;padding-left:0px;padding-bottom:0px;">
                        <div class="panel panel-default" style="padding-right:0px;padding-left:0px;padding-bottom:0px;">
                          <div class="panel-body" style="background-color: #32CD32;" align="center">
                            <h2>
                              <b style="color:white;"><?php echo $jumlah_spray_boom; ?></b>
                            </h2>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12" style="padding-right:0px;padding-left:0px;padding-bottom:0px;">
                        <div class="panel panel-default" style="padding-right:0px;padding-left:0px;padding-bottom:0px;">
                          <div class="panel-body" style="background-color: #32CD32;" align="center">
                            <h3>
                              <b style="color:white;">Weeding Manual</b>
                            </h3>
                            <h2>
                              <b style="color:white;"><?php echo ceil($weed_manual['hasil_efektif']/$luas); ?> Kali</b>
                            </h2>
                            <br />
                            <h3>
                              <b style="color:white;">Cost</b>
                            </h3>
                            <h2>
                              <b style="color:white;"><?php echo angka_ribuan($weed_manual['biaya_realisasi']); ?> /Ha</b>
                            </h2>
                            <br />
                            <h3>
                              <b style="color:white;">Index TK</b>
                            </h3>
                            <h2>
                              <b style="color:white;"><?php if($weed_manual['tk'] != NULL) echo round($weed_manual['hasil_efektif']/$weed_manual['tk'], 2); else echo 0; ?> Ha/TK</b>
                            </h2>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-4" style="padding-right:5px;padding-left:5px;padding-bottom:0px;">
                <div class="panel panel-default" style="z-index:10;">
                  <div class="panel-heading" style="background-color: #32CD32;">
                    <h3 style="color:black;" class="panel-title"><b>Pestisida</b></h3>
                  </div>
                  <div class="panel-body">
                    <div class="col-md-6" style="padding-right:5px;padding-left:0px;padding-bottom:0px;">
                      <div class="row">
                        <table class="table table-actions">
                          <tbody>
                            <tr style="background-color: #32CD32;">
                              <td style="color:black;padding-top:5px;padding-bottom:5px;" colspan="3">Plant Pest Control</td>
                            </tr>
  <?php
    $jarak_hari = 0;
    $jumlah_plant_pest_control = 0;
    $cek_aktivitas_code = "";
    $cek_tgl_realisasi = "";
    foreach ($plant_pest_control as $pps) {
      if($jumlah_plant_pest_control % 2 == 0){
        $color_plant_pest_control = "style='background-color: #F5F5F5;'";
      }
      else{
        $color_plant_pest_control = "";
      }
      if($pps->aktivitas_code == $cek_aktivitas_code){
        $cek_tgl = (strtotime($pps->tgl_realisasi)/86400) - (strtotime($cek_tgl_realisasi)/86400);
        if(round($cek_tgl) > 7){
          if($jarak_hari != 0){
            $jarak_hari = round((strtotime($pps->tgl_realisasi) - strtotime($jarak_hari)) / 86400);
          }
          else{
            $jarak_hari = '-';
          }
?>
                            <tr <?php echo $color_plant_pest_control; ?>>
                              <td style="color:black;padding-top:1px;padding-bottom:1px;" align="right" width="28%"><?php echo $jarak_hari." Hari"; ?></td>
                              <td style="color:black;padding-top:1px;padding-bottom:1px;" align="right" width="37%"><?php echo format_tgl($pps->tgl_realisasi); ?></td>
                              <td style="color:black;padding-top:1px;padding-bottom:1px;" width="35%"><?php echo $pps->category; ?></td>
                            </tr>
<?php
          $jumlah_plant_pest_control++;
          $cek_aktivitas_code = $pps->aktivitas_code;
          $cek_tgl_realisasi = $pps->tgl_realisasi;
          $jarak_hari = $pps->tgl_realisasi;
        }
      }
      else{
        if($jarak_hari != 0){
          $jarak_hari = round((strtotime($pps->tgl_realisasi) - strtotime($jarak_hari)) / 86400);
        }
        else{
          $jarak_hari = '-';
        }
?>
                            <tr <?php echo $color_plant_pest_control; ?>>
                              <td style="color:black;padding-top:1px;padding-bottom:1px;" align="right" width="28%"><?php echo $jarak_hari." Hari"; ?></td>
                              <td style="color:black;padding-top:1px;padding-bottom:1px;" align="right" width="37%"><?php echo format_tgl($pps->tgl_realisasi); ?></td>
                              <td style="color:black;padding-top:1px;padding-bottom:1px;" width="40%"><?php echo $pps->category; ?></td>
                            </tr>
<?php
        $cek_aktivitas_code = $pps->aktivitas_code;
        $cek_tgl_realisasi = $pps->tgl_realisasi;
        $jumlah_plant_pest_control++;
        $jarak_hari = $pps->tgl_realisasi;
      }
    }
  ?>
                          </tbody>
                        </table>
                      </div>
                      <div class="row">
                        <div class="col-md-12" style="padding-right:0px;padding-left:0px;padding-bottom:0px;">
                          <div class="panel panel-default" style="padding-right:0px;padding-left:0px;padding-bottom:0px;">
                            <div class="panel-body" style="background-color: #32CD32;" align="center">
                              <h2>
                                <b style="color:white;"><?php echo $jumlah_plant_pest_control; ?></b>
                              </h2>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6" style="padding-right:0px;padding-left:5px;padding-bottom:0px;">
                      <table class="table table-actions">
                        <tbody>
                          <tr style="background-color: #32CD32;">
                            <td style="color:black;padding-top:2px;padding-bottom:2px;">Material</td></td>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align='right'>Real</td></td>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align='right'>STD</td></td>
                          </tr>
                          <tr style="background-color: #F5F5F5;">
                            <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Tekasi');">Tekasi</a></td>
<?php
if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
  echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
}
else{
  if($ppc_material['Tekasi'] / $luas == 0){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($ppc_material['Tekasi'] / $luas <= $std_material['Tekasi']){
      echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['Tekasi'] / $luas, 2);
    }
    else{
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['Tekasi'] / $luas, 2);
    }
  }
}
?>
                            </td>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo round($std_material['Tekasi'], 2); ?></td>
                          </tr>
                          <tr>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Tekila');">Tekila</a></td>
<?php
if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
  echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
}
else{
  if($ppc_material['Tekila'] / $luas == 0){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($ppc_material['Tekila'] / $luas <= $std_material['Tekila']){
      echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['Tekila'] / $luas, 2);
    }
    else{
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['Tekila'] / $luas, 2);
    }
  }
}
?>
                            </td>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo round($std_material['Tekila'], 2); ?></td>
                          </tr>
                          <tr style="background-color: #F5F5F5;">
                            <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Chlorpyrifos');">Chlorpyrifos</a></td>
<?php
if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
  echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
}
else{
  if($ppc_material['Chlorpyrifos'] / $luas == 0){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($ppc_material['Chlorpyrifos'] / $luas <= $std_material['Chlorpyrifos']){
      echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['Chlorpyrifos'] / $luas, 2);
    }
    else{
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['Chlorpyrifos'] / $luas, 2);
    }
  }
}
?>
                            </td>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo round($std_material['Chlorpyrifos'], 2); ?></td>
                          </tr>
                          <tr>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Sidazinon');">Sidazinon</a></td>
<?php
if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
  echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
}
else{
  if($ppc_material['Sidazinon'] / $luas == 0){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($ppc_material['Sidazinon'] / $luas <= $std_material['Bifentrin_G']){
      echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['Sidazinon'] / $luas, 2);
    }
    else{
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['Sidazinon'] / $luas, 2);
    }
  }
}
?>
                            </td>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo round($std_material['Sidazinon'], 2); ?></td>
                          </tr>
                          <tr style="background-color: #F5F5F5;">
                            <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Propoxur');">Propoxur</a></td>
<?php
if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
  echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
}
else{
  if($ppc_material['Propoxur'] / $luas == 0){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($ppc_material['Propoxur'] / $luas <= $std_material['Propoxur']){
      echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['Propoxur'] / $luas, 2);
    }
    else{
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['Propoxur'] / $luas, 2);
    }
  }
}
?>
                            </td>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo round($std_material['Propoxur'], 2); ?></td>
                          </tr>
                          <tr>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Cypermethrin');">Cypermethrin</a></td>
<?php
if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
  echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
}
else{
  if($ppc_material['Cypermethrin'] / $luas == 0){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($ppc_material['Cypermethrin'] / $luas <= $std_material['Chlorpyrifos']){
      echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['Cypermethrin'] / $luas, 2);
    }
    else{
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['Cypermethrin'] / $luas, 2);
    }
  }
}
?>
                            </td>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo round($std_material['Cypermethrin'], 2); ?></td>
                          </tr>
                          <tr style="background-color: #F5F5F5;">
                            <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Bifentrin_EC');">Bifentrin EC</a></td>
<?php
if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
  echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
}
else{
  if($ppc_material['Bifentrin_EC'] / $luas == 0){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($ppc_material['Bifentrin_EC'] / $luas <= $std_material['Bifentrin_EC']){
      echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['Bifentrin_EC'] / $luas, 2);
    }
    else{
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['Bifentrin_EC'] / $luas, 2);
    }
  }
}
?>
                            </td>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo round($std_material['Bifentrin_EC'], 2); ?></td>
                          </tr>
                          <tr>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Bifentrin_G');">Bifentrin G</a></td>
<?php
if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
  echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
}
else{
  if($ppc_material['Bifentrin_G'] / $luas == 0){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($ppc_material['Bifentrin_G'] / $luas <= $std_material['Bifentrin_G']){
      echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['Bifentrin_G'] / $luas, 2);
    }
    else{
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['Bifentrin_G'] / $luas, 2);
    }
  }
}
?>
                            </td>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo round($std_material['Bifentrin_G'], 2); ?></td>
                          </tr>
                          <tr style="background-color: #F5F5F5;">
                            <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('BPMC');">BPMC</a></td>
<?php
if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
  echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
}
else{
  if($ppc_material['BPMC'] / $luas == 0){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($ppc_material['BPMC'] / $luas <= $std_material['Propiconazole']){
      echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['BPMC'] / $luas, 2);
    }
    else{
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['BPMC'] / $luas, 2);
    }
  }
}
?>
                            </td>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo round($std_material['BPMC'], 2); ?></td>
                          </tr>
                          <tr>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Clorpyrifos');">Clorpyrifos</a></td>
<?php
if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
  echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
}
else{
  if($ppc_material['Clorpyrifos'] / $luas == 0){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($ppc_material['Clorpyrifos'] / $luas <= $std_material['Clorpyrifos']){
      echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['Clorpyrifos'] / $luas, 2);
    }
    else{
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['Clorpyrifos'] / $luas, 2);
    }
  }
}
?>
                            </td>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo round($std_material['Clorpyrifos'], 2); ?></td>
                          </tr>
                          <tr style="background-color: #F5F5F5;">
                            <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Abamectin');">Abamectin</a></td>
<?php
if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
  echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
}
else{
  if($ppc_material['Abamectin'] / $luas == 0){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($ppc_material['Abamectin'] / $luas <= $std_material['Abamectin']){
      echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['Abamectin'] / $luas, 2);
    }
    else{
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['Abamectin'] / $luas, 2);
    }
  }
}
?>
                            </td>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo round($std_material['Abamectin'], 2); ?></td>
                          </tr>
                          <tr>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Fosetil');">Fosetil</a></td>
<?php
if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
  echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
}
else{
  if($ppc_material['Fosetil'] / $luas == 0){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($ppc_material['Fosetil'] / $luas <= $std_material['Fosetil']){
      echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['Fosetil'] / $luas, 2);
    }
    else{
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['Fosetil'] / $luas, 2);
    }
  }
}
?>
                            </td>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo round($std_material['Fosetil'], 2); ?></td>
                          </tr>
                          <tr style="background-color: #F5F5F5;">
                            <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Metalaxil');">Metalaxil</a></td>
<?php
if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
  echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
}
else{
  if($ppc_material['Metalaxil'] / $luas == 0){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($ppc_material['Metalaxil'] / $luas <= $std_material['Metalaxil']){
      echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['Metalaxil'] / $luas, 2);
    }
    else{
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['Metalaxil'] / $luas, 2);
    }
  }
}
?>
                            </td>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo round($std_material['Metalaxil'], 2); ?></td>
                          </tr>
                          <tr>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Propiconazole');">Propiconazole</a></td>
<?php
if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
  echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
}
else{
  if($ppc_material['Propiconazole'] / $luas == 0){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($ppc_material['Propiconazole'] / $luas <= $std_material['Propiconazole']){
      echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['Propiconazole'] / $luas, 2);
    }
    else{
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['Propiconazole'] / $luas, 2);
    }
  }
}
?>
                            </td>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo round($std_material['Propiconazole'], 2); ?></td>
                          </tr>
                          <tr style="background-color: #F5F5F5;">
                            <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Prochloraz');">Prochloraz</a></td>
<?php
if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
  echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
}
else{
  if($ppc_material['Prochloraz'] / $luas == 0){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($ppc_material['Prochloraz'] / $luas <= $std_material['Prochloraz']){
      echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['Prochloraz'] / $luas, 2);
    }
    else{
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['Prochloraz'] / $luas, 2);
    }
  }
}
?>
                            </td>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo round($std_material['Prochloraz'], 2); ?></td>
                          </tr>
                          <tr>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Mankozeb');">Mankozeb</a></td>
<?php
if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
  echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
}
else{
  if($ppc_material['Mankozeb'] / $luas == 0){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($ppc_material['Mankozeb'] / $luas <= $std_material['Mankozeb']){
      echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['Mankozeb'] / $luas, 2);
    }
    else{
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['Mankozeb'] / $luas, 2);
    }
  }
}
?>
                            </td>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo round($std_material['Mankozeb'], 2); ?></td>
                          </tr>
                          <tr style="background-color: #F5F5F5;">
                            <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Folirfos');">Folirfos</a></td>
<?php
if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
  echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
}
else{
  if($ppc_material['Folirfos'] / $luas == 0){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($ppc_material['Folirfos'] / $luas <= $std_material['Folirfos']){
      echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['Folirfos'] / $luas, 2);
    }
    else{
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['Folirfos'] / $luas, 2);
    }
  }
}
?>
                            </td>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo round($std_material['Folirfos'], 2); ?></td>
                          </tr>
                          <tr>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('H3PO3');">H3PO3</a></td>
<?php
if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
  echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
}
else{
  if($ppc_material['H3PO3'] / $luas == 0){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($ppc_material['H3PO3'] / $luas <= $std_material['H3PO3']){
      echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['H3PO3'] / $luas, 2);
    }
    else{
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['H3PO3'] / $luas, 2);
    }
  }
}
?>
                            </td>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo round($std_material['H3PO3'], 2); ?></td>
                          </tr>
                          <tr style="background-color: #F5F5F5;">
                            <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Detazeb');">Detazeb</a></td>
<?php
if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
  echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
}
else{
  if($ppc_material['Detazeb'] / $luas == 0){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($ppc_material['Detazeb'] / $luas <= $std_material['Detazeb']){
      echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['Detazeb'] / $luas, 2);
    }
    else{
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.round($ppc_material['Detazeb'] / $luas, 2);
    }
  }
}
?>
                            </td>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo round($std_material['Detazeb'], 2); ?></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-2" style="padding-right:0px;padding-left:5px;padding-bottom:0px;">
                <div class="row">
                  <div class="panel panel-default" style="z-index:10;">
                    <div class="panel-heading" style="background-color: #32CD32;">
                      <h3 style="color:black;" class="panel-title"><b>Surfaktan</b></h3>
                    </div>
                    <div class="panel-body">
                      <table class="table table-actions">
                        <tbody>
                          <tr style="background-color: #32CD32;">
                            <td style="color:black;padding-top:2px;padding-bottom:2px;">Material</td></td>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align='right'>Real</td></td>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align='right'>STD</td></td>
                          </tr>
                          <tr style="background-color: #F5F5F5;">
                            <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Indostick');">Indostick</a></td>
<?php
if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
  echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
}
else{
  if($others_material['Indostick'] / $luas == 0){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($others_material['Indostick'] / $luas <= 0){
      echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.round($others_material['Indostick'] / $luas, 2);
    }
    else{
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.round($others_material['Indostick'] / $luas, 2);
    }
  }
}
?>
                            </td>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo round($std_material['Indostick'], 2); ?></td>
                          </tr>
                          <tr>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Organosilicon');">Organosilicon</a></td>
<?php
if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
  echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
}
else{
  if($others_material['Organosilicon'] / $luas == 0){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($others_material['Organosilicon'] / $luas <= $std_material['Organosilicon']){
      echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.round($others_material['Organosilicon'] / $luas, 2);
    }
    else{
      echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.round($others_material['Organosilicon'] / $luas, 2);
    }
  }
}
?>
                            </td>
                            <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo round($std_material['Organosilicon'], 2); ?></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="panel panel-default" style="z-index:10;">
                    <div class="panel-heading" style="background-color: #32CD32;">
                      <h3 style="color:black;" class="panel-title"><b>Forcing / Ripening</b></h3>
                    </div>
                    <div class="panel-body">
                      <div class="row">
                        <table class="table table-actions">
                          <tbody>
                            <tr style="background-color: #32CD32;">
                              <td style="color:black;padding-top:2px;padding-bottom:2px;">Material</td></td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align='right'>Real</td></td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align='right'>STD</td></td>
                            </tr>
                            <tr style="background-color: #F5F5F5;">
                              <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Ethylene');">Ethylene</a></td>
  <?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($others_material['Ethylene'] / $luas == 0){
      echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
    }
    else{
      if($others_material['Ethylene'] / $luas <= $std_material['Ethylene']){
        echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.round($others_material['Ethylene'] / $luas, 2);
      }
      else{
        echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.round($others_material['Ethylene'] / $luas, 2);
      }
    }
  }
  ?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo round($std_material['Ethylene'], 2); ?></td>
                            </tr>
                            <tr>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Ethepon');">Ethepon</a></td>
  <?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($others_material['Ethepon'] / $luas == 0){
      echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
    }
    else{
      if($others_material['Ethepon'] / $luas <= $std_material['Ethepon']){
        echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.round($others_material['Ethepon'] / $luas, 2);
      }
      else{
        echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.round($others_material['Ethepon'] / $luas, 2);
      }
    }
  }
  ?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo round($std_material['Ethepon'], 2); ?></td>
                            </tr>
                            <tr style="background-color: #F5F5F5;">
                              <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="javascript:detail_material('Kaolin');">Kaolin</a></td>
  <?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
  }
  else{
    if($others_material['Kaolin'] / $luas == 0){
      echo '<td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">-';
    }
    else{
      if($others_material['Kaolin'] / $luas <= $std_material['Kaolin']){
        echo '<td style="color:blue;padding-top:2px;padding-bottom:2px;" align="right">'.round($others_material['Kaolin'] / $luas, 2);
      }
      else{
        echo '<td style="color:red;padding-top:2px;padding-bottom:2px;" align="right">'.round($others_material['Kaolin'] / $luas, 2);
      }
    }
  }
  ?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo round($std_material['Kaolin'], 2); ?></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>

                      <div class="row">
                        <div class="panel panel-default" style="padding-right:0px;padding-left:0px;padding-bottom:0px;">
                          <div class="panel-body" style="background-color: #32CD32;" align="center">
                            <b style="color:white;"><?php if($forcing['forcing'] != NULL) echo $forcing['forcing']; else echo "0" ?> Kali Aplikasi Forcing</b>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="panel panel-default" style="padding-right:0px;padding-left:0px;padding-bottom:0px;">
                          <div class="panel-body" style="background-color: #32CD32;" align="center">
                            <b style="color:white;"><?php if($forcing['reforcing'] != NULL) echo $forcing['reforcing']; else echo "0" ?> Kali Aplikasi Reforcing</b>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-12" style="padding-right:5px;padding-left:0px;padding-bottom:0px;">
                <div class="panel panel-default">
                  <div class="panel-heading" style="background-color: #32CD32;">
                    <h3 style="color:black;" class="panel-title"><b>Irrigation</b></h3>
                  </div>
                  <div class="panel-body">
                    <div class="col-md-7" style="padding-right:5px;padding-left:0px;padding-bottom:0px;">
                      <div class="table-responsive">
                        <table class="table table-actions">
                          <tbody>
                            <tr style="background-color: #32CD32;">
                              <td style="color:black;padding-top:5px;padding-bottom:5px;" align="center">Date</td>
                              <td style="color:black;padding-top:5px;padding-bottom:5px;" align="center">Coverage</td>
                              <td style="color:black;padding-top:5px;padding-bottom:5px;" align="center">Availability</td>
                              <td style="color:black;padding-top:5px;padding-bottom:5px;" align="center">Utilization</td>
                              <td style="color:black;padding-top:5px;padding-bottom:5px;" align="center">Cost/Ha</td>
                              <td style="color:black;padding-top:5px;padding-bottom:5px;" align="center">Ha/Day</td>
                              <td style="color:black;padding-top:5px;padding-bottom:5px;" align="center">Ha/Hour</td>
                              <td style="color:black;padding-top:5px;padding-bottom:5px;" align="center">Fuel/Hour</td>
                              <td style="color:black;padding-top:5px;padding-bottom:5px;" align="center">Fuel/Ha</td>
                            </tr>
<?php
  $i = 0;
  $cek_bulan = "";
  $biaya_total = 0;
  $operation_time = 0;
  $total_operation_time = 0;
  $total_available_time = 0;
  $luas_siram = 0;
  $solar_terpakai = 0;
  $total_luas_siram = 0;
  $banyak_bulan = 0;
  foreach($irrigation as $ir){
    $total_luas_siram += $ir->luas_siram;
    if(date("m", strtotime($ir->tanggal)) != $cek_bulan){
      $cek_bulan = date("m", strtotime($ir->tanggal));
      $biaya_total = $ir->biaya_total;
      $operation_time = $ir->operation_time;
      $total_operation_time = $ir->total_operation_time;
      $total_time = $ir->total_time;
      $luas_siram = $ir->luas_siram;
      $solar_terpakai = $ir->solar_terpakai;
      $banyak_bulan++;
?>
                            <tr id="tr_irrigation<?php echo $i; ?>">
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo format_bln($ir->tanggal); ?></td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="center"><?php echo round($luas_siram/($luas*3)*100, 2); ?> %</td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="center"><?php echo round(($total_operation_time/$total_time)*100); ?> %</td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="center"><?php echo round(($operation_time/$total_operation_time)*100); ?> %</td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="center"><?php echo angka_ribuan(($biaya_total/$luas_siram)); ?></td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="center"><?php echo round(($luas_siram/($total_operation_time/24)), 2); ?></td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="center"><?php echo round(($luas_siram/$operation_time), 2); ?></td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="center"><?php echo round(($solar_terpakai/$operation_time), 2); ?></td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="center"><?php echo round(($solar_terpakai/$luas_siram), 2); ?></td>
                            </tr>
<?php
    }
    else{
      $cek_bulan = date("m", strtotime($ir->tanggal));
      $biaya_total += $ir->biaya_total;
      $operation_time += $ir->operation_time;
      $total_operation_time += $ir->total_operation_time;
      $total_time += $ir->total_time;
      $luas_siram += $ir->luas_siram;
      $solar_terpakai += $ir->solar_terpakai;
?>
<script>
  hide_tr('tr_irrigation<?php echo $i-1; ?>');
</script>
                            <tr id="tr_irrigation<?php echo $i; ?>">
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><?php echo format_bln($ir->tanggal); ?></td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="center"><?php echo round($luas_siram/($luas*3)*100, 2); ?> %</td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="center"><?php echo round(($total_operation_time/$total_time)*100); ?> %</td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="center"><?php echo round(($operation_time/$total_operation_time)*100); ?> %</td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="center"><?php echo angka_ribuan(($biaya_total/$luas_siram)); ?></td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="center"><?php echo round(($luas_siram/($total_operation_time/24)), 2); ?></td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="center"><?php echo round(($luas_siram/$operation_time), 2); ?></td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="center"><?php echo round(($solar_terpakai/$operation_time), 2); ?></td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="center"><?php echo round(($solar_terpakai/$luas_siram), 2); ?></td>
                            </tr>
<?php
    }
    $i++;
  }
?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="col-md-5" style="padding-right:5px;padding-left:0px;padding-bottom:0px;">
                      <div class="row">
                        <div class="col-md-12">
                          <!-- : panel -->
                          <canvas id="diagram_histori_siram" height="100hv"></canvas>
<?php
  $shs = '';
  $shs .= (round($std_histori_siram['2014'] * 0.5, 2));
  $shs .= ', '.(round($std_histori_siram['2015'] * 0.5, 2));
  $shs .= ', '.(round($std_histori_siram['2016'] * 0.5, 2));
  $shs .= ', '.(round($std_histori_siram['2017'] * 0.5, 2));
  $shs .= ', '.(round($std_histori_siram['2018'] * 0.5, 2));

  $ca = '';
  $ca .= (round($histori_siram['T14']['coverage_area'] * 100));
  $ca .= ', '.(round($histori_siram['T15']['coverage_area'] * 100));
  $ca .= ', '.(round($histori_siram['T16']['coverage_area'] * 100));
  $ca .= ', '.(round($histori_siram['T17']['coverage_area'] * 100));
  $ca .= ', '.(round($histori_siram['T18']['coverage_area'] * 100));
?>
<script>
	var config_histori_siram = {
    type: 'bar',
    data: {
  		labels: ['2014', '2015', '2016', '2017', '2018'],
  		datasets: [{
  			type: 'line',
  			label: 'Std Curah Hujan',
  			borderColor: '#00005C',
  			borderWidth: 2,
				pointRadius: 3,
  			fill: false,
  			data: [
          50, 50, 50, 50, 50
  			]
  		}, {
  			type: 'line',
  			label: 'Curah Hujan',
  			borderColor: '#B22222',
        backgroundColor : '#B22222',
  			borderWidth: 2,
				pointRadius: 3,
  			fill: false,
  			data: [
          <?php echo $shs; ?>
  			]
  		}, {
  			type: 'bar',
  			label: 'Coverage Area',
  			backgroundColor: '#005C5C',
  			data: [
          <?php echo $ca; ?>
        ]
  		}]
    },
    options: {
      responsive: true,
      legend: {
        labels: {
          usePointStyle: true,
        }
      },
      title: {
        display: true,
        text: 'Trend Siram Springkle'
      },
      tooltips: {
        mode: 'index',
        intersect: false,
        callbacks: {
          label: function(tooltipItem, data) {
            var label = data.datasets[tooltipItem.datasetIndex].label;
            var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            if(label == 'Std Curah Hujan' || label == 'Curah Hujan'){
              return label + ' : ' + (val * 2) + 'mm';
            }
            else{
              return label + ' : ' + val + '%';
            }
          }
        }
      },
			scales: {
				yAxes: [{
					ticks: {
						min: 0,
						max: 100,
						stepSize: 20
					},
					gridLines: {
      			display: false,
      			drawBorder: true,
      			drawOnChartArea: false,
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
                      <div class="row">
                        <div class="col-md-4">
                          <div class="panel-body" style="background-color: #32CD32;" align="center">
                            <h3>
                              <b style="color:white;">Coverage Area</b>
                            </h3>
                            <h2>
                              <b style="color:white;"><?php if($banyak_bulan != NULL) echo round(($total_luas_siram / ($luas * 3 * $banyak_bulan)) * 100); else echo '-'; ?> %</b>
                            </h2>
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
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading" style="background-color: #B22222;">
              <div class="panel-title-box" style="margin-top: 4px;padding-top:4px;padding-left:4px">
                <h2 style="color:white;"><b>Cost and Production</b></h2>
              </div>
              <ul class="panel-controls" style="margin-top: 4px;padding-top:4px;padding-right:4px">
                <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down" style="color: #FFFFFF;"></span></a></li>
              </ul>
            </div>
            <div class="panel-body padding-0">
              <div class="col-md-5" style="padding-top:10px;">
                <div class="row">
                  <div class="col-md-5">
                    <div class="row">
                      <div class="panel-body" style="background-color: #B22222;" align="center">
                        <h3>
                          <b style="color:white;">Yield (Prediksi)</b>
                        </h3>
                        <h2>
                          <b style="color:white;">
<?php
  if($produksi == NULL){
    echo round($std_yield['yield'])." Ton/Ha";
  }
  else{
    echo round($produksi['real_dan_sisa_rencana_yield'])." Ton/Ha";
  }
?>
                          </b>
                        </h2>
                      </div>
                    </div>

                    <div class="row" style="padding-top:10px;">
                      <div class="panel-body" style="background-color: #B22222;" align="center">
                        <h4>
                          <b style="color:white;">Produksi s.d saat ini</b>
                        </h4>
                        <h2>
                          <b style="color:white;">
<?php
  if($tonase_panen_total['produksi_ton'] == NULL){
    echo "- Ton";
  }
  else{
    echo angka_ribuan($tonase_panen_total['produksi_ton'])." Ton";
  }
?>
                          </b>
                        </h2>
                      </div>
                    </div>

                    <div class="row">
                      <div class="cal-md-12" style="padding-right:0px;padding-top:10px;padding-left:0px">
                        <table class="table table-actions">
                          <tbody>
                            <tr style="background-color: #B22222;">
                              <td style="color:white;padding-top:5px;padding-bottom:5px;" align="center">Jenis</td>
                              <td style="color:white;padding-top:5px;padding-bottom:5px;" align="center">Ton</td>
                              <td style="color:white;padding-top:5px;padding-bottom:5px;" align="center">Rp/Kg</td>
                            </tr>
                            <tr style="background-color: #F5F5F5;">
                              <td style="color:black;padding-top:2px;padding-bottom:2px;">Alami</td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  $total_tonase_panen = 0;
  if($tonase_panen['alami']['produksi_ton'] == NULL){
    echo "-";
    $produksi_alami = 0;
  }
  else{
    $total_tonase_panen += $tonase_panen['alami']['produksi_ton'];
    echo round($tonase_panen['alami']['produksi_ton']);
    $produksi_alami = $tonase_panen['alami']['produksi_ton'] * 1000;
  }
?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  if($tonase_panen['alami']['produksi_kg'] == NULL){
    echo "-";
  }
  else{
    echo round($tonase_panen['alami']['produksi_kg']);
  }
?>
                              </td>
                            </tr>
                            <tr>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;">Manual</td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  if($tonase_panen['manual']['produksi_ton'] == NULL){
    echo "-";
  }
  else{
    $total_tonase_panen += $tonase_panen['manual']['produksi_ton'];
    echo round($tonase_panen['manual']['produksi_ton']);
  }
?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  if($tonase_panen['manual']['produksi_kg'] == NULL){
    echo "-";
  }
  else{
    echo round($tonase_panen['manual']['produksi_kg']);
  }
?>
                              </td>
                            </tr>
                            <tr style="background-color: #F5F5F5;">
                                <td style="color:black;padding-top:2px;padding-bottom:2px;">Reguler</td>
                                <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  if($tonase_panen['reguler']['produksi_ton'] == NULL){
    echo "-";
    $produksi_mekanis = 0;
  }
  else{
    $total_tonase_panen += $tonase_panen['reguler']['produksi_ton'];
    echo round($tonase_panen['reguler']['produksi_ton']);
    $produksi_mekanis = $tonase_panen['reguler']['produksi_ton'] * 1000;
  }
?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  if($tonase_panen['reguler']['produksi_kg'] == NULL){
    echo "-";
  }
  else{
    echo round($tonase_panen['reguler']['produksi_kg']);
  }
?>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-7" style="margin-top:0px;padding-top:0px;padding-left:0px">
                    <div class="row">
                      <div class="chart-holder" style="height: auto;">
                        <canvas id="diagram_sebelum_panen" height="160px"></canvas>
<?php
  $cek_sp = 6;
  $sp_tonase_alami = '';
  $sp_tonase_manual = '';
  $sp_tonase_mekanis = '';
  while($cek_sp > 0){
    if($cek_sp == 6){
      if(isset($sebelum_panen['alami'][$cek_sp])){
        $sp_tonase_alami = round($sebelum_panen['alami'][$cek_sp], 2);
      }
      else{
        $sp_tonase_alami = '0';
      }
      if(isset($sebelum_panen['manual'][$cek_sp])){
        $sp_tonase_manual = round($sebelum_panen['manual'][$cek_sp], 2);
      }
      else{
        $sp_tonase_manual = '0';
      }
      if(isset($sebelum_panen['reguler'][$cek_sp])){
        $sp_tonase_mekanis = round($sebelum_panen['reguler'][$cek_sp], 2);
      }
      else{
        $sp_tonase_mekanis = '0';
      }
    }
    else{
      if(isset($sebelum_panen['alami'][$cek_sp])){
        $sp_tonase_alami .= ', '.(round($sebelum_panen['alami'][$cek_sp], 2));
      }
      else{
        $sp_tonase_alami .= ', 0';
      }
      if(isset($sebelum_panen['manual'][$cek_sp])){
        $sp_tonase_manual .= ', '.(round($sebelum_panen['manual'][$cek_sp], 2));
      }
      else{
        $sp_tonase_manual .= ', 0';
      }
      if(isset($sebelum_panen['reguler'][$cek_sp])){
        $sp_tonase_mekanis .= ', '.(round($sebelum_panen['reguler'][$cek_sp], 2));
      }
      else{
        $sp_tonase_mekanis .= ', 0';
      }
    }
    $cek_sp--;
  }
?>
<script>
	var config_sebelum_panen = {
    type: 'bar',
    data: {
  		labels: ['H-6', 'H-5', 'H-4', 'H-3', 'H-2', 'H-1'],
  		datasets: [{
				label: 'Alami',
				backgroundColor: '#0000CD',
				borderColor: '#0000CD',
				borderWidth: 1,
				data: [
					<?php echo $sp_tonase_alami; ?>
				]
			}, {
				label: 'Manual',
				backgroundColor: '#8B4513',
				borderColor: '#8B4513',
				borderWidth: 1,
				data: [
					<?php echo $sp_tonase_manual; ?>
				]
			}, {
				label: 'Makenis',
				backgroundColor: '#32CD32',
				borderColor: '#32CD32',
				borderWidth: 1,
				data: [
					<?php echo $sp_tonase_mekanis; ?>
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
        display: true,
        text: 'Tonase Sebelum Panen (Ton/Ha)',
        fontSize: 14,
        fontFamily: 'arial',
        padding: 3,
        lineHeight: 1,
      },
      tooltips: {
        mode: 'index',
        intersect: false,
        callbacks: {
          label: function(tooltipItem, data) {
            var label = data.datasets[tooltipItem.datasetIndex].label;
            var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            return label + ' : ' + val;
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
			}
    }
	};
</script>
                      </div>
                    </div>
                    <hr style="background-color:#000000;" size='4px' />
                    <div class="row">
                      <div class="col-md-12" style="margin-top:10px;padding-top:0px;padding-left:0px">
                        <div class="chart-holder">
                          <canvas id="diagram_production_tonase" width="100%" height="40px"></canvas>
  <?php
    $production_tonase = '';
    if($total_tonase_panen == NULL){
      $production_tonase .= '0';
      $production_tonase .= ', 0';
      $production_tonase .= ', 0';
    }
    else{
      $production_tonase .= round(($tonase_panen['alami']['produksi_ton'] / $total_tonase_panen) * 100);
      $production_tonase .= ', '.round(($tonase_panen['manual']['produksi_ton'] / $total_tonase_panen) * 100);
      $production_tonase .= ', '.round(($tonase_panen['reguler']['produksi_ton'] / $total_tonase_panen) * 100);
    }
  ?>
  <script>
  var config_production_tonase = {
  type: 'doughnut',
  data: {
    datasets: [{
      data: [
        <?php echo $production_tonase; ?>
      ],
      backgroundColor: [
        '#0000CD',
        '#8B4513',
        '#696969',
        '#32CD32',
      ],
      label: 'Cost and Production'
    }],
    labels: [
      'Alami',
      'Manual',
      'Kolekting'
    ]
    },
    options: {
      responsive: true,
      tooltips: {
        enabled: true,
        callbacks: {
          label: function(tooltipItem, data) {
            var label = data.labels[tooltipItem.index];
            var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            return label + ' : ' + val + '%';
          }
        }
      },
      legend: {
        position: 'right',
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
                  <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #B22222;">
                      <h3 class="panel-title" style="color:white;"><b>Cost Production</b></h3>
                    </div>
                    <div class="panel-body">
                      <div class="col-md-5" style="padding-right:0px;padding-left:0px;padding-bottom:0px;">
                        <canvas id="diagram_cost_production" width="100%" height="85px"></canvas>
<?php
  $group_cost_total = $group_cost['labour']['total'] + $group_cost['charge']['total'] + $group_cost['material']['total'];
  $cost_and_production = '';
  $cost_and_production .= round(($group_cost['labour']['total'] / $group_cost_total) * 100);
  $cost_and_production .= ', '.round(($group_cost['charge']['total'] / $group_cost_total) * 100);
  $cost_and_production .= ', '.round(($group_cost['material']['total'] / $group_cost_total) * 100);
  $cost_and_production .= ', '.round(($group_cost['bibit']['total'] / $group_cost_total) * 100);
?>
<script>
  var config_cost_production = {
    type: 'doughnut',
    data: {
      datasets: [{
        data: [
          <?php echo $cost_and_production; ?>
        ],
        backgroundColor: [
          '#0000CD',
          '#8B4513',
          '#696969',
          '#32CD32'
        ],
        label: 'Cost and Production'
      }],
      labels: [
        'Labour',
        'Charge',
        'Material',
        'Bibit'
      ]
    },
    options: {
      responsive: true,
      tooltips: {
        enabled: true,
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
                      <div class="col-md-7" style="padding-right:0px;padding-left:0px;padding-bottom:10px;">
                        <table class="table table-actions">
                          <tbody>
                            <tr style="background-color: #B22222;">
                              <td style="color:white;padding-top:5px;padding-bottom:5px;" align="center">Biaya</td>
                              <td style="color:white;padding-top:5px;padding-bottom:5px;" align="center">Total</td>
                              <td style="color:white;padding-top:5px;padding-bottom:5px;" align="center">Rp/Ha</td>
                              <td style="color:white;padding-top:5px;padding-bottom:5px;" align="center">Rp/Kg</td>
                            </tr>
                            <tr style="background-color: #F5F5F5;">
                              <td style="color:black;padding-top:2px;padding-bottom:2px;">Labour</td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  if($group_cost['labour']['total'] == NULL || $group_cost['labour']['total'] == 0){
    echo "-";
  }
  else{
    echo angka_ribuan($group_cost['labour']['total']);
  }
?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  if($group_cost['labour']['total'] == NULL || $group_cost['labour']['total'] == 0){
    echo "-";
  }
  else{
    echo angka_ribuan($group_cost['labour']['total'] / $luas);
  }
?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  if($group_cost['labour']['total'] == NULL || $group_cost['labour']['total'] == 0){
    echo "-";
  }
  else{
    echo angka_ribuan($group_cost['labour']['total'] / $tonase / 1000);
  }
?>
                              </td>
                            </tr>
                            <tr>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;">Charge</td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  if($group_cost['charge']['total'] == NULL){
    echo "-";
  }
  else{
    echo angka_ribuan($group_cost['charge']['total']);
  }
?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  if($group_cost['charge']['total'] == NULL){
    echo "-";
  }
  else{
    echo angka_ribuan($group_cost['charge']['total'] / $luas);
  }
?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  if($group_cost['charge']['total'] == NULL){
    echo "-";
  }
  else{
    echo angka_ribuan($group_cost['charge']['total'] / $tonase / 1000);
  }
?>
                              </td>
                            </tr>
                            <tr style="background-color: #F5F5F5;">
                              <td style="color:black;padding-top:2px;padding-bottom:2px;">Material</td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  if($group_cost['material']['total'] == NULL){
    echo "-";
  }
  else{
    echo angka_ribuan($group_cost['material']['total']);
  }
?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  if($group_cost['material']['total'] == NULL){
    echo "-";
  }
  else{
    echo angka_ribuan($group_cost['material']['total'] / $luas);
  }
?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  if($group_cost['material']['total'] == NULL){
    echo "-";
  }
  else{
    echo angka_ribuan($group_cost['material']['total'] / $tonase / 1000);
  }
?>
                            </td>
                          </tr>
                          <tr>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;">Bibit</td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  if($group_cost['bibit']['total'] == NULL){
    echo "-";
  }
  else{
    echo angka_ribuan($group_cost['bibit']['total']);
  }
?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  if($group_cost['bibit']['total'] == NULL){
    echo "-";
  }
  else{
    echo angka_ribuan($group_cost['bibit']['total'] / $luas);
  }
?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  if($group_cost['bibit']['total'] == NULL){
    echo "-";
  }
  else{
    echo angka_ribuan($group_cost['bibit']['total'] / $tonase / 1000);
  }
?>
                              </td>
                            </tr>
                            <tr style="background-color: #F5F5F5;">
                              <td style="color:black;padding-top:2px;padding-bottom:2px;">Varian Cost</td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  echo angka_ribuan($total_real - $group_cost_total);
?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  echo angka_ribuan(($total_real - $group_cost_total) / $luas);
?>
                              </td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right">
<?php
  echo angka_ribuan(($total_real - $group_cost_total) / $tonase / 1000);
?>
                              </td>
                            </tr>
                          </body>
                          <tfoot>
                            <tr style="background-color: #DCDCDC;">
                              <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Total</b></td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><b>
<?php
  if($group_cost_total == NULL){
    echo "-";
  }
  else{
    echo angka_ribuan($group_cost_total + ($total_real - $group_cost_total));
  }
?>
                              </b></td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><b>
<?php
  if($group_cost_total == NULL){
    echo "-";
  }
  else{
    echo angka_ribuan(($group_cost_total + ($total_real - $group_cost_total)) / $luas);
  }
?>
                              </b></td>
                              <td style="color:black;padding-top:2px;padding-bottom:2px;" align="right"><b>
<?php
  if($group_cost_total == NULL){
    echo "-";
  }
  else{
    echo angka_ribuan(($group_cost_total + ($total_real - $group_cost_total)) / $tonase / 1000);
  }
?>
                              </b></td>
                            </tr>
                          </tfoot>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12" align="center">
                    <a href="/PIS/report/simulasi?lokasi=<?php echo $lokasi['lokasi']; ?>"><img src="/PIS/assets/images/simulasi.png"></a>
                  </div>
                </div>
              </div>
              <!-- : panel -->
              <div class="col-md-7" style="margin-top:0px;padding-top:0px;padding-left:0px">
                <div class="row">
                  <div class="col-md-12" style="margin-top:0px;padding-top:0px;padding-left:0px">
                    <canvas id="diagram_biaya_umur" height="80hv"></canvas>
<?php
  $bu = 0;
  $bu_real = '';
  $bu_std = '';
  $fb = '';
  while ($bu <= 21) {
    if($bu == 0){
      if($lokasi['status'] == 'NSFC' || $lokasi['status'] == 'NFFC'){
        $bu_real = round($biaya_umur[$bu]);
      }
      else{
        $bu_real = '0, '.round($biaya_umur[$bu]);
      }
    }
    else{
      $bu_real .= ', '.(round($biaya_umur[$bu]));
    }
    $bu++;
  }
  foreach($std_biaya_umur as $sbu) {
    if($sbu->umur == '0'){
      $bu_std .= round($sbu->biaya);
    }
    else if($sbu->umur == '>20'){
      $bu_std .= ', '.(round($sbu->biaya));
    }
    else{
      $bu_std .= ', '.(round($sbu->biaya));
    }
  }
  if($lokasi['tgl_forcing_standard'] != NULL){
    $date1 = strtotime($lokasi['tgl_forcing_standard'])/86400;
    $date2 = strtotime($lokasi['tgl_mulai_rawat'])/86400;
  }
  else{
    $date1 = strtotime($lokasi['tgl_forcing_realisasi'])/86400;
    $date2 = strtotime($lokasi['tgl_mulai_rawat'])/86400;
  }
  if($lokasi['status'] == 'NSFC' || $lokasi['status'] == 'NFFC'){
    $max_biaya_umur = '120000000';
  }
  else{
    $max_biaya_umur = '35000000';
  }
  $umur_f = ceil(($date1-$date2)/30.4583333333333);
  $i_f = 0;
  $bu_f = '';
  while($i_f <= 21){
    if($i_f == 0){
      if($i_f == $umur_f){
        $bu_f .= $max_biaya_umur;
      }
      else{
        $bu_f .= '0';
      }
    }
    else if($i_f == $umur_f){
      $bu_f .= ', '.$max_biaya_umur;
    }
    else{
      $bu_f .= ', 0';
    }
    $i_f++;
  }
?>
<script>
	var config_biaya_umur = {
    type: 'bar',
    data: {
  		labels: ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '>20'],
  		datasets: [{
  			type: 'line',
  			label: 'Std Biaya',
  			borderColor: '#00005C',
  			borderWidth: 2,
				pointRadius: 3,
  			fill: false,
  			data: [
          <?php echo $bu_std; ?>
  			]
  		}, {
  			type: 'bar',
  			label: 'Forcing',
  			backgroundColor: '#005C5C',
  			data: [
          <?php echo $bu_f; ?>
        ]
  		}, {
  			type: 'line',
  			label: 'Biaya',
  			borderColor: '#B22222',
        backgroundColor : '#B22222',
  			borderWidth: 0,
				pointRadius: 0,
  			fill: true,
  			data: [
          <?php echo $bu_real; ?>
  			]
  		}]
    },
    options: {
      responsive: true,
      legend: {
        labels: {
          usePointStyle: true,
        }
      },
      title: {
        display: true,
        text: 'Biaya per Umur'
      },
      tooltips: {
        mode: 'index',
        intersect: false,
        callbacks: {
          label: function(tooltipItem, data) {
            var label = data.datasets[tooltipItem.datasetIndex].label;
            var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            if(label != 'Forcing'){
              return label + ' : ' + val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }
            else{
              return false;
            }
          }
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
						max: <?php echo $max_biaya_umur; ?>,
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

                <div class="col-md-12" style="margin-top:0px;padding-top:0px;padding-left:0px">
                  <div class="col-md-8" style="padding-top:0px;">
                    <div class="row">
                    <div class="panel panel-default">
                      <div class="panel-heading" style="background-color: #B22222;">
                        <h3 class="panel-title" style="color:white;"><b>Group Cost</b></h3>
                      </div>
                      <div class="panel-body">
                        <div class="row">
                          <div class="col-md-12" style="padding-right:0px;padding-left:0px;padding-bottom:0px;">
                            <div class="table-responsive">
                              <table class="table table-actions">
                                <tr style="background-color: #B22222;">
                                  <td style="color:white;padding-top:5px;padding-bottom:5px;" align="center" width="25%">Element Cost</td>
                                  <td style="color:white;padding-top:5px;padding-bottom:5px;" align="center">BPP 2019</td>
                                  <td style="color:white;padding-top:5px;padding-bottom:5px;" align="center">Real (Rp/Ha)</td>
                                  <td style="color:white;padding-top:5px;padding-bottom:5px;" align="center">Forecast (Rp/Ha)</td>
                                  <td style="color:white;padding-top:5px;padding-bottom:5px;" align="center">R+F (Rp/Ha)</td>
                                  <td style="color:white;padding-top:5px;padding-bottom:5px;" align="center">R+F (Rp/Kg)</td>
                                </tr>
<?php
  $total_bpp = 0;
  $total_rfb = 0;
  $total_rf = 0;
  $total_r = 0;
  $total_f = 0;
  foreach ($element_cost as $ec) {
    if($element_cost == "Ha"){
      if($cek_panen == 1){
        if($lokasi['status'] == "NSFC"){
          $bpp = $ec->BPP_NSFC_ha;
        }
        else{
          $bpp = $ec->BPP_NSSC_ha;
        }
      }
      else{
        if($lokasi['status'] == "NSFC"){
          $bpp = $ec->BPP_NSFC_ha_t1;
        }
        else{
          $bpp = $ec->BPP_NSSC_ha_t1;
        }
      }
      $bpp = $bpp * $luas;
    }
    else{
      if($cek_panen == 1){
        if($lokasi['status'] == "NSFC"){
          $bpp = $ec->BPP_NSFC_kg;
        }
        else{
          $bpp = $ec->BPP_NSSC_kg;
        }
      }
      else{
        if($lokasi['status'] == "NSFC"){
          $bpp = $ec->BPP_NSFC_kg_t1;
        }
        else{
          $bpp = $ec->BPP_NSSC_kg_t1;
        }
      }
      $bpp = $bpp * $tonase * 1000;
    }
    $rfb = $bpp;
    $total_bpp += $bpp;
    $total_rfb += $bpp;

    $total_r += $element_cost_real[$ec->code]['total'];

    if(isset($forecast_overhead[$ec->code]['fo'])){
      $fo = $forecast_overhead[$ec->code]['fo'];
    }
    else{
      $fo = 0;
    }

    $total_tonase_panen = 0;
    if($tonase_panen['alami']['produksi_ton'] == NULL){
      $produksi_alami = 0;
    }
    else{
      $produksi_alami = $tonase_panen['alami']['produksi_ton'] * 1000;
    }
    if($tonase_panen['reguler']['produksi_ton'] == NULL){
      $produksi_reguler = 0;
    }
    else{
      $total_tonase_panen += $tonase_panen['reguler']['produksi_ton'];
      $produksi_reguler = $tonase_panen['reguler']['produksi_ton'] * 1000;
    }

    $help_asumsi_alami = $this->Forecast_model->get_help_zn10(date('n', strtotime($tgl_panen)));

    $real_rf = $element_cost_real[$ec->code]['total'];
    switch ($ec->code) {
      case 'ZN01':
        if($element_cost_real['ZN10']['total'] / $tonase / 1000 < 100){
          $real_rf = $element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $luas);
        }
        else{
          $real_rf = $element_cost_real[$ec->code]['total'];
        }
      break;
      case 'ZN02':
        if($element_cost_real['ZN10']['total'] / $tonase / 1000 < 100){
          $real_rf = $element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $luas);
        }
        else{
          $real_rf = $element_cost_real[$ec->code]['total'];
        }
      break;
      case 'ZN03':
        if($element_cost_real['ZN10']['total'] / $tonase / 1000 < 100){
          $real_rf = $element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $luas);
        }
        else{
          $real_rf = $element_cost_real[$ec->code]['total'];
        }
      break;
      case 'ZN04':
        if($element_cost_real['ZN10']['total'] / $tonase / 1000 < 100){
          if($fo != NULL){
            if($element_cost_real['ZN08']['total'] > 0){
              if(substr($lokasi['status'], 2, 2) == 'FC'){
                $real_rf = $element_cost_real[$ec->code]['total'] + (800000 * $luas) + ((800000 * $luas) * $fo);
              }
              else{
                $real_rf = $element_cost_real[$ec->code]['total'] + (500000 * $luas) + ((500000 * $luas) * $fo);
              }
            }
            else{
              if(substr($lokasi['status'], 2, 2) == 'FC'){
                $real_rf = $element_cost_real[$ec->code]['total'] + (1300000 * $luas) + ((1300000 * $luas) * $fo);
              }
              else{
                $real_rf = $element_cost_real[$ec->code]['total'] + (890000 * $luas) + ((890000 * $luas) * $fo);
              }
            }
          }
          else{
            if($element_cost_real['ZN08']['total'] > 0){
              if(substr($lokasi['status'], 2, 2) == 'FC'){
                $real_rf = $element_cost_real[$ec->code]['total'] + (800000 * $luas);
              }
              else{
                $real_rf = $element_cost_real[$ec->code]['total'] + (500000 * $luas);
              }
            }
            else{
              if(substr($lokasi['status'], 2, 2) == 'FC'){
                $real_rf = $element_cost_real[$ec->code]['total'] + (1300000 * $luas);
              }
              else{
                $real_rf = $element_cost_real[$ec->code]['total'] + (890000 * $luas);
              }
            }
          }
        }
        else{
          $real_rf = $element_cost_real[$ec->code]['total'];
        }
      break;
      case 'ZN05':
        $hari_tarik_data = strtotime($konstanta['nilai']) / 86400;
        $hari_perawatan = strtotime($lokasi['tgl_mulai_rawat']) / 86400;
        $hari_forcing = strtotime($tgl_forcing) / 86400;

        if(substr($lokasi['status'], 2, 2) == 'FC'){
          if(($hari_tarik_data - $hari_perawatan) > 80){
            $jumlah_aplikasi_1 = round(($hari_forcing - 104) - $hari_tarik_data) / 20;
          }
          else{
            $jumlah_aplikasi_1 = round(($hari_forcing - 104) - ($hari_perawatan + 80)) / 20;
          }
        }
        else if(substr($lokasi['status'], 2, 2) == 'SC'){
          $jumlah_aplikasi_1 = round(($hari_forcing - 80) - $hari_tarik_data) / 30;
        }
        else{
          $jumlah_aplikasi_1 = 0;
        }
        if($jumlah_aplikasi_1 > 0){
          $jumlah_aplikasi_1 = ceil($jumlah_aplikasi_1);
        }
        else{
          $jumlah_aplikasi_1 = 0;
        }

        if(substr($lokasi['status'], 2, 2) == 'FC'){
          if(($hari_forcing - $hari_tarik_data) > 104){
            $jumlah_aplikasi_2 = 104 / 15;
          }
          else{
            $jumlah_aplikasi_2 = round($hari_forcing - $hari_tarik_data) / 15;
          }
        }
        else if(substr($lokasi['status'], 2, 2) == 'SC'){
          if(($hari_forcing - $hari_tarik_data) > 80){
            $jumlah_aplikasi_2 = 80 / 20;
          }
          else{
            $jumlah_aplikasi_2 = round($hari_forcing - $hari_tarik_data) / 20;
          }
        }
        else{
          $jumlah_aplikasi_2 = 0;
        }
        if($jumlah_aplikasi_2 > 0){
          $jumlah_aplikasi_2 = floor($jumlah_aplikasi_2);
        }
        else{
          $jumlah_aplikasi_2 = 0;
        }

        if(substr($lokasi['status'], 2, 2) == 'FC'){
          if(round($hari_tarik_data - $hari_perawatan) < 60){
            $ZN05_f = (($jumlah_aplikasi_1 + $jumlah_aplikasi_2) * (19454856/14)) + 2068249.63690476;
          }
          else{
            $ZN05_f = (($jumlah_aplikasi_1 + $jumlah_aplikasi_2) * (19454856/14));
          }
        }
        else{
          $ZN05_f = (($jumlah_aplikasi_1 + $jumlah_aplikasi_2) * (8083566/9));
        }

        if($fo != NULL){
          $real_rf = $element_cost_real[$ec->code]['total'] + ($ZN05_f * $luas) + (($ZN05_f * $luas) * $fo);
        }
        else{
          $real_rf = $element_cost_real[$ec->code]['total'] + ($ZN05_f * $luas);
        }
        if(isset($koreksi[$ec->code])){
          if(($real_rf * $koreksi[$ec->code]) >= $element_cost_real[$ec->code]['total']){
            $real_rf = $real_rf * $koreksi[$ec->code];
          }
          else{
            $real_rf = $element_cost_real[$ec->code]['total'];
          }
        }
      break;
      case 'ZN06':
        if($element_cost_real['ZN10']['total'] / $tonase / 1000 < 100){
          if($fo != NULL){
            $real_rf = $element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $luas) + (($element_cost_f[$ec->code]['rp_per_ha'] * $luas) * $fo);
          }
          else{
            $real_rf = $element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $luas);
          }
        }
        else{
          $real_rf = $element_cost_real[$ec->code]['total'];
        }
        if(isset($koreksi[$ec->code])){
          if(($real_rf * $koreksi[$ec->code]) >= $element_cost_real[$ec->code]['total']){
            $real_rf = $real_rf * $koreksi[$ec->code];
          }
          else{
            $real_rf = $element_cost_real[$ec->code]['total'];
          }
        }
        break;
      case 'ZN07':
        if($element_cost_real['ZN10']['total'] / $tonase / 1000 < 100){
          $real_rf = $element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $luas);
        }
        else{
          $real_rf = $element_cost_real[$ec->code]['total'];
        }
        if(isset($koreksi[$ec->code])){
          if(($real_rf * $koreksi[$ec->code]) >= $element_cost_real[$ec->code]['total']){
            $real_rf = $real_rf * $koreksi[$ec->code];
          }
          else{
            $real_rf = $element_cost_real[$ec->code]['total'];
          }
        }
      break;
      case 'ZN08':
        if(($element_cost_real[$ec->code]['total'] / $luas) <= 500000){
          $ZN08_f = $element_cost_f['ZN081']['rp_per_ha'];
        }
        else if(($element_cost_real[$ec->code]['total'] / $luas) <= 1000000){
          $ZN08_f = $element_cost_f['ZN082']['rp_per_ha'];
        }
        else{
          if($lokasi['tgl_forcing_realisasi'] != NULL){
            $ZN08_f = 0;
          }
          else{
            $ZN08_f = $element_cost_f['ZN083']['rp_per_ha'];
          }
        }

        $real_rf = $element_cost_real[$ec->code]['total'] + ($ZN08_f * $luas);
        if(isset($koreksi[$ec->code])){
          if(($real_rf * $koreksi[$ec->code]) >= $element_cost_real[$ec->code]['total']){
            $real_rf = $real_rf * $koreksi[$ec->code];
          }
          else{
            $real_rf = $element_cost_real[$ec->code]['total'];
          }
        }
      break;
      case 'ZN09':
        if($element_cost_real['ZN09']['total'] <= 0){
          $real_rf = $element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $luas);
        }
        else{
          $real_rf = $element_cost_real[$ec->code]['total'];
        }
        break;
      case 'ZN10':
        $persen_alami = ($produksi_alami / ($tonase * 1000));
        if(substr($lokasi['status'], 2, 2) == 'FC'){
          $persen_asumsi_alami = $help_asumsi_alami['ZN10'];
        }
        else{
          $persen_asumsi_alami = '0.01';
        }

        if((date('Y-m', strtotime($konstanta['nilai'])) == date('Y-m', strtotime($tgl_panen))) || strtotime($konstanta['nilai']) >= strtotime($tgl_panen)){
          $sisa_BPP_alami = 0;
        }
        else{
          if($persen_alami > $persen_asumsi_alami){
            $sisa_BPP_alami = (0.03 * 1000 * $tonase);
          }
          else{
            $sisa_BPP_alami = (($persen_asumsi_alami - $persen_alami) * 1000 * $tonase);
          }
        }

        if(($tonase * 1000) - $sisa_BPP_alami - $produksi_alami - $produksi_reguler < 0){
          $sisa_BPP_reguler = (0 * 1000 * $tonase);
        }
        else{
          $sisa_BPP_reguler = ($tonase * 1000) - $sisa_BPP_alami - $produksi_alami - $produksi_reguler;
        }

        $cek_tonase = $sisa_BPP_reguler + $sisa_BPP_alami + $produksi_alami + $produksi_reguler - ($tonase * 1000);
        if(substr($lokasi['status'], 2, 2) == 'FC'){
          $BPP_pnn_alami = $sisa_BPP_alami * 390;
          $BPP_pnn_reguler = $sisa_BPP_reguler * 116.927412395172;
          $exclude_panen = 100.14517106282 * ($sisa_BPP_alami + $sisa_BPP_reguler);
        }
        else{
          $BPP_pnn_alami = $sisa_BPP_alami * 610.726268365189;
          $BPP_pnn_reguler = $sisa_BPP_reguler * 136.355022188611;
          $exclude_panen = 108.376536114483 * ($sisa_BPP_alami + $sisa_BPP_reguler);
        }

        $ZN10_f = ($BPP_pnn_alami + $BPP_pnn_reguler + $exclude_panen) / $luas;

        $real_rf = $element_cost_real[$ec->code]['total'] + ($ZN10_f * $luas);
      break;
      case 'ZN11':
        $real_rf = $element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $luas);
        if(isset($koreksi[$ec->code])){
          if(($real_rf * $koreksi[$ec->code]) >= $element_cost_real[$ec->code]['total']){
            $real_rf = $real_rf * $koreksi[$ec->code];
          }
          else{
            $real_rf = $element_cost_real[$ec->code]['total'];
          }
        }
      break;
      case 'ZN12':
        if($element_cost_real['ZN10']['total'] / $tonase / 1000 < 100){
          $real_rf = $element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $luas);
        }
        else{
          $real_rf = $element_cost_real[$ec->code]['total'];
        }
      break;
      case 'ZN13':
        if(($tgl_panen > $tgl_irrigation['start']['nilai']) && ($tgl_panen < $tgl_irrigation['finish']['nilai'])){
          $tgl_1 = floor((((strtotime($tgl_panen) - strtotime($tgl_irrigation['start']['nilai'])) / 86400) - 5) / $std_interval_siram['siram']);
        }
        else if(($tgl_panen > $tgl_irrigation['start']['nilai']) && ($tgl_panen > $tgl_irrigation['finish']['nilai'])){
          $tgl_1 = floor((((strtotime($tgl_irrigation['finish']['nilai']) - strtotime($tgl_irrigation['start']['nilai'])) / 86400) - 5) / $std_interval_siram['siram']);
        }
        else{
          $tgl_1 = 0;
        }
        if($tgl_1 < 0){
          $tgl_1 = 0;
        }

        if(($tgl_panen > $tgl_irrigation_t1['start']['nilai']) && ($tgl_panen < $tgl_irrigation_t1['finish']['nilai'])){
          $tgl_2 = floor((((strtotime($tgl_panen) - strtotime($tgl_irrigation_t1['start']['nilai'])) / 86400) - 5) / 10);
        }
        else if(($tgl_panen > $tgl_irrigation_t1['start']['nilai']) && ($tgl_panen > $tgl_irrigation_t1['finish']['nilai'])){
          $tgl_2 = floor((((strtotime($tgl_irrigation_t1['finish']['nilai']) - strtotime($tgl_irrigation_t1['start']['nilai'])) / 86400) - 5) / 10);
        }
        else{
          $tgl_2 = 0;
        }
        if($tgl_2 < 0){
          $tgl_2 = 0;
        }

        if(date('Y', strtotime($tgl_panen)) == date('Y', strtotime($YEAR_BASE['nilai']))){
          if(substr($lokasi['status'], 2, 2) == 'FC'){
            $jumlah_irrigation_1 = (550000 * $tgl_1) * 0.75;
            $jumlah_irrigation_2 = 0;
          }
          else{
            $jumlah_irrigation_1 = (550000 * $tgl_1) * 0.4;
            $jumlah_irrigation_2 = 0;
          }
        }
        else{
          if(substr($lokasi['status'], 2, 2) == 'FC'){
            $jumlah_irrigation_1 = (550000 * $tgl_1) * 0.55;
            $jumlah_irrigation_2 = (550000 * $tgl_2) * 0.75;
          }
          else{
            $jumlah_irrigation_1 = (550000 * $tgl_1) * 0.2;
            $jumlah_irrigation_2 = (550000 * $tgl_2) * 0.3;
          }
        }

        $ZN13_f = $jumlah_irrigation_1 + $jumlah_irrigation_2;

        // if($element_cost_real['ZN10']['total'] / $tonase / 1000 < 100){
          if($fo != NULL){
            $real_rf = $element_cost_real[$ec->code]['total'] + ($ZN13_f * $luas) + (($ZN13_f * $luas) * $fo);
          }
          else{
            $real_rf = $element_cost_real[$ec->code]['total'] + ($ZN13_f * $luas);
          }
          if(isset($koreksi[$ec->code])){
            if(($real_rf * $koreksi[$ec->code]) >= $element_cost_real[$ec->code]['total']){
              $real_rf = $real_rf * $koreksi[$ec->code];
            }
            else{
              $real_rf = $element_cost_real[$ec->code]['total'];
            }
          }
        // }
        // else{
        //   $real_rf = $element_cost_real[$ec->code]['total'];
        // }
      break;
      case 'ZN14':
        if($element_cost_real['ZN10']['total'] / $tonase / 1000 < 100){
          $real_rf = $element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $luas);
        }
        else{
          $real_rf = $element_cost_real[$ec->code]['total'];
        }
      break;
      case 'ZN15':
        if($element_cost_real['ZN10']['total'] / $tonase / 1000 < 100){
          $real_rf = $element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $luas);
        }
        else{
          $real_rf = $element_cost_real[$ec->code]['total'];
        }
      break;
    }

    $total_rf += $real_rf;
    $total_f += $real_rf - $element_cost_real[$ec->code]['total'];
?>
                                <tr style="font-weight:bold;">
                                  <td style="color:black;padding-top:1px;padding-bottom:1px;"><a style="color:black;text-decoration:none;" href="/PIS/dashboard/detil_element_cost?lokasi=<?php echo $lokasi['lokasi']; ?>&code=<?php echo $ec->code; ?>"><?php echo $ec->nama; ?></a></td>
                                  <td class="text-right" style="color:black;padding-top:1px;padding-bottom:1px;"><?php echo angka_ribuan($bpp / $luas); ?></td>
                                  <td class="text-right" style="color:black;padding-top:1px;padding-bottom:1px;"><?php echo angka_ribuan($element_cost_real[$ec->code]['total'] / $luas); ?></td>
                                  <td class="text-right" style="color:black;padding-top:1px;padding-bottom:1px;"><?php echo angka_ribuan(($real_rf - $element_cost_real[$ec->code]['total']) / $luas); ?></td>
                                  <td class="text-right" style="color:black;padding-top:1px;padding-bottom:1px;"><?php echo angka_ribuan($real_rf / $luas); ?></td>
                                  <td class="text-right" style="color:black;padding-top:1px;padding-bottom:1px;"><?php echo angka_ribuan($real_rf / $tonase / 1000); ?></td>
                                </tr>
<?php
  }
?>
                                <tr style="background-color:#DCDCDC;">
                                  <td class="text-center" style="color:black;padding-top:1px;padding-bottom:1px;">Total</td>
                                  <td class="text-right" style="color:black;padding-top:1px;padding-bottom:1px;"><?php echo angka_ribuan($total_bpp / $luas); ?></td>
                                  <td class="text-right" style="color:black;padding-top:1px;padding-bottom:1px;"><?php echo angka_ribuan($total_r / $luas); ?></td>
                                  <td class="text-right" style="color:black;padding-top:1px;padding-bottom:1px;"><?php echo angka_ribuan($total_f / $luas); ?></td>
                                  <td class="text-right" style="color:black;padding-top:1px;padding-bottom:1px;"><?php echo angka_ribuan($total_rf / $luas); ?></td>
                                  <td class="text-right" style="color:black;padding-top:1px;padding-bottom:1px;"><?php echo angka_ribuan($total_rf / $tonase / 1000); ?></td>
                                </tr>
<?php
  if($total_rf - $total_bpp <= 0){
    $warna_isi = "#0000FF";
  }
  else{
    $warna_isi = "#FF0000";
  }

  if(((($total_rf / $luas) - ($total_bpp / $luas)) / ($total_bpp / $luas)) * 100 < -2){
    $category = "Excellent";
    $category_color = "#32CD32";
  }
  else if(((($total_rf / $luas) - ($total_bpp / $luas)) / ($total_bpp / $luas)) * 100 <= 2){
    $category = "Good";
    $category_color = "#FFFF00";
  }
  else{
    $category = "Poor";
    $category_color = "#FF0000";
  }
?>
                                <tr>
                                  <td style="color:black;background-color:#B22222;padding-top:1px;padding-bottom:1px;"></td>
                                  <td style="color:black;background-color:#DCDCDC;padding-top:1px;padding-bottom:1px;width:80px;">Sisa Saldo</td>
                                  <td style="color:<?php echo $warna_isi; ?>;background-color:#DCDCDC;padding-top:1px;padding-bottom:1px;" align="right"><?php echo angka_ribuan(($total_rf - $total_bpp) / $luas); ?></td>
                                  <td style="color:black;background-color:#DCDCDC;padding-top:1px;padding-bottom:1px;">Category</td>
                                  <td style='color:black;background-color:<?php echo $category_color; ?>;padding-top:1px;padding-bottom:1px;' align='center'><?php echo $category; ?></td>
                                  <td style="color:black;background-color: #B22222;padding-top:1px;padding-bottom:1px;"></td>
                                </tr>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>

                  <div class="col-md-4" style="padding-top:0px;padding-left:5px">
                    <div class="row">
                      <div class="panel panel-default">
                        <div class="panel-heading" style="background-color: #B22222;">
                          <h3 class="panel-title" style="color:white;"><b>Histori Panen</b></h3>
                        </div>
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-12" style="padding-right:0px;padding-left:0px;padding-bottom:0px;">
                              <div class="table-responsive">
                                <table class="table table-actions">
                                  <tbody>
                                    <tr style="background-color: #B22222;">
                                      <td style="color:white;padding-top:5px;padding-bottom:5px;" align="center">Tahun</td>
                                      <td style="color:white;padding-top:5px;padding-bottom:5px;" align="center">Ton/Ha</td>
                                      <td style="color:white;padding-top:5px;padding-bottom:5px;" align="center">Status</td>
                                      <td style="color:white;padding-top:5px;padding-bottom:5px;" align="center">Varietas</td>
                                    </tr>
<?php
  $i_hp = 0;
  foreach ($histori_panen as $hp) {
    if($i_hp % 2 == 0){
      $color_hp = "style='background-color:#F5F5F5;'";
    }
    else{
      $color_hp = "";
    }
?>
                                    <tr <?php echo $color_hp; ?>>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align="center"><?php echo $hp->tahun; ?></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align="center"><?php echo round($hp->ton_per_ha, 2); ?></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align="center"><?php echo $hp->status; ?></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align="center"><?php echo $hp->varietas; ?></td>
                                    </tr>
<?php
    $i_hp++;
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

                    <div class="row">
                      <div class="panel panel-default">
                        <div class="panel-heading" style="background-color: #B22222;">
                          <h3 class="panel-title" style="color:white;"><b>Histori Direct Cost</b></h3>
                        </div>
                        <div class="panel-body">
                          <div class="row">
                            <div class="col-md-12" style="padding-right:0px;padding-left:0px;padding-bottom:0px;">
                              <div class="table-responsive">
                                <table class="table table-actions">
                                  <tbody>
                                    <tr style="background-color: #B22222;">
                                      <td style="color:white;padding-top:5px;padding-bottom:5px;" align="center">Tahun</td>
                                      <td style="color:white;padding-top:5px;padding-bottom:5px;" align="center">Rp/Kg</td>
                                      <td style="color:white;padding-top:5px;padding-bottom:5px;" align="center">Status</td>
                                      <td style="color:white;padding-top:5px;padding-bottom:5px;" align="center">Varietas</td>
                                    </tr>
<?php
  $i_hpp = 0;
  foreach ($hpp as $row) {
    if($i_hpp % 2 == 0){
      $color_hpp = "style='background-color:#F5F5F5;'";
    }
    else{
      $color_hpp = "";
    }
?>
                                      <tr <?php echo $color_hpp; ?>>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align="center"><?php echo $row->tahun; ?></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align="center"><?php echo angka_ribuan($row->hpp); ?></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align="center"><?php echo $row->status; ?></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align="center"><?php echo $row->varietas; ?></td>
                                    </tr>
<?php
    $i_hpp++;
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
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading" style="background-color: #99FF00;">
                <div class="panel-title-box" style="margin-top: 4px;padding-top:4px;padding-left:4px">
                  <h2 style="color:black;"><b>Gallery Lokasi</b></h2>
                </div>
                <ul class="panel-controls" style="margin-top: 4px;padding-top:4px;padding-right:4px">
                  <li><a href="#" class="panel-collapse"><span style="color:black;" class="fa fa-angle-down"></span></a></li>
                </ul>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="pull-left push-up-10">
                    <h3>Lokasi Peta</h3>
                  </div>
<?php
  if($_SESSION['crud'] == '0' || ($_SESSION['crud'] == '1' && $_SESSION['edit'][0] == $wilayah['plantation_group'] || $_SESSION['edit'][0] == $wilayah['code'])){
    if(sizeof($gallery['peta']) >= 0){
      $disable = '';
    }
    else{
      $disable = 'disabled';
    }
?>
                  <div class="pull-right push-up-10">
                    <div class="btn-group">
                      <button class="btn btn-primary" <?php echo $disable; ?> onclick="show_modal_peta()"><span class="fa fa-cloud-upload"></span> Upload</button>
                    </div>
                  </div>
<?php
  }
?>
                  <div class="gallery" id="links">
<?php
  foreach ($gallery['peta'] as $glp) {
?>
                    <a class="gallery-item" title="<?php echo $glp->caption; ?>" data-gallery>
                      <div class="image">
                        <img href="<?php echo $glp->foto; ?>" src="<?php echo $glp->foto; ?>" alt="<?php echo $glp->foto; ?>"/>
                        <ul class="gallery-item-controls">
                          <li><span class="check" onclick="show_modal_show_foto('<?php echo $glp->foto; ?>')"><i class="glyphicon glyphicon-zoom-in"></i></span></li>
<?php
  if($_SESSION['crud'] == '0' || ($_SESSION['crud'] == '1' && $_SESSION['edit'][0] == $wilayah['plantation_group'] || $_SESSION['edit'][0] == $wilayah['code'])){
?>
                          <li><span class="check" onclick="show_modal_peta_delete('<?php echo $glp->id; ?>', '<?php echo $glp->foto; ?>', '<?php echo $glp->caption; ?>')"><i class="fa fa-times"></i></span></li>
<?php
  }
?>
                        </ul>
                      </div>
                      <div class="meta">
                        <strong><?php echo $glp->caption; ?></strong>
                        <strong><?php echo format_tgl($glp->tgl_upload); ?></strong>
                      </div>
                    </a>
<?php
  }
?>
                  </div>
                </div>
                <div class="row">
                  <div class="pull-left push-up-10">
                    <h3>Land Preparation</h3>
                  </div>
<?php
  if($_SESSION['crud'] == '0' || ($_SESSION['crud'] == '1' && $_SESSION['edit'][0] == $wilayah['plantation_group'] || $_SESSION['edit'][0] == $wilayah['code'])){
    if(sizeof($gallery['land_prep']) >= 0){
      $disable = '';
    }
    else{
      $disable = 'disabled';
    }
?>
                  <div class="pull-right push-up-10">
                    <div class="btn-group">
                      <button class="btn btn-primary" <?php echo $disable; ?> onclick="show_modal_gallery('Land Preparation')"><span class="fa fa-cloud-upload"></span> Upload</button>
                    </div>
                  </div>
<?php
  }
?>
                  <div class="gallery" id="links">
<?php
  foreach ($gallery['land_prep'] as $glp) {
?>
                    <a class="gallery-item" title="<?php echo $glp->caption; ?>" data-gallery>
                      <div class="image">
                        <img href="<?php echo $glp->foto; ?>" src="<?php echo $glp->foto; ?>" alt="<?php echo $glp->foto; ?>"/>
                        <ul class="gallery-item-controls">
                          <li><span class="check" onclick="show_modal_show_foto('<?php echo $glp->foto; ?>')"><i class="glyphicon glyphicon-zoom-in"></i></span></li>
<?php
  if($_SESSION['crud'] == '0' || ($_SESSION['crud'] == '1' && $_SESSION['edit'][0] == $wilayah['plantation_group'] || $_SESSION['edit'][0] == $wilayah['code'])){
?>
                          <li><span class="check" onclick="show_modal_gallery_delete('<?php echo $glp->id; ?>', '<?php echo $glp->foto; ?>', '<?php echo $glp->caption; ?>', '<?php echo $glp->deskripsi; ?>')"><i class="fa fa-times"></i></span></li>
<?php
  }
?>
                        </ul>
                      </div>
                      <div class="meta">
                        <strong><?php echo $glp->caption; ?></strong>
                        <span><?php echo $glp->deskripsi; ?></span>
                      </div>
                    </a>
<?php
  }
?>
                  </div>
                </div>
                <div class="row">
                  <hr />
                  <div class="pull-left push-up-10">
                    <h3>Planting</h3>
                  </div>
<?php
  if($_SESSION['crud'] == '0' || ($_SESSION['crud'] == '1' && $_SESSION['edit'][0] == $wilayah['plantation_group'] || $_SESSION['edit'][0] == $wilayah['code'])){
    if(sizeof($gallery['planting']) >= 0){
      $disable = '';
    }
    else{
      $disable = 'disabled';
    }
?>
                  <div class="pull-right push-up-10">
                    <div class="btn-group">
                      <button class="btn btn-primary" <?php echo $disable; ?> onclick="show_modal_gallery('Planting')"><span class="fa fa-cloud-upload"></span> Upload</button>
                    </div>
                  </div>
<?php
  }
?>
                  <div class="gallery" id="links">
<?php
  foreach ($gallery['planting'] as $glp) {
?>
                    <a class="gallery-item" title="<?php echo $glp->caption; ?>" data-gallery>
                      <div class="image">
                        <img href="<?php echo $glp->foto; ?>" src="<?php echo $glp->foto; ?>" alt="<?php echo $glp->foto; ?>"/>
                        <ul class="gallery-item-controls">
                          <li><span class="check" onclick="show_modal_show_foto('<?php echo $glp->foto; ?>')"><i class="glyphicon glyphicon-zoom-in"></i></span></li>
<?php
  if($_SESSION['crud'] == '0' || ($_SESSION['crud'] == '1' && $_SESSION['edit'][0] == $wilayah['plantation_group'] || $_SESSION['edit'][0] == $wilayah['code'])){
?>
                          <li><span class="check" onclick="show_modal_gallery_delete('<?php echo $glp->id; ?>', '<?php echo $glp->foto; ?>', '<?php echo $glp->caption; ?>', '<?php echo $glp->deskripsi; ?>')"><i class="fa fa-times"></i></span></li>
<?php
  }
?>
                        </ul>
                      </div>
                      <div class="meta">
                        <strong><?php echo $glp->caption; ?></strong>
                        <span><?php echo $glp->deskripsi; ?></span>
                      </div>
                    </a>
<?php
  }
?>
                  </div>
                </div>
                <div class="row">
                  <hr />
                  <div class="pull-left push-up-10">
                    <h3>PM Pre Forcing</h3>
                  </div>
<?php
  if($_SESSION['crud'] == '0' || ($_SESSION['crud'] == '1' && $_SESSION['edit'][0] == $wilayah['plantation_group'] || $_SESSION['edit'][0] == $wilayah['code'])){
    if(sizeof($gallery['pre_f']) >= 0){
      $disable = '';
    }
    else{
      $disable = 'disabled';
    }
?>
                  <div class="pull-right push-up-10">
                    <div class="btn-group">
                      <button class="btn btn-primary" <?php echo $disable; ?> onclick="show_modal_gallery('PM Pre Forcing')"><span class="fa fa-cloud-upload"></span> Upload</button>
                    </div>
                  </div>
<?php
  }
?>
                  <div class="gallery" id="links">
<?php
  foreach ($gallery['pre_f'] as $glp) {
?>
                    <a class="gallery-item" title="<?php echo $glp->caption; ?>" data-gallery>
                      <div class="image">
                        <img href="<?php echo $glp->foto; ?>" src="<?php echo $glp->foto; ?>" alt="<?php echo $glp->foto; ?>"/>
                        <ul class="gallery-item-controls">
                          <li><span class="check" onclick="show_modal_show_foto('<?php echo $glp->foto; ?>')"><i class="glyphicon glyphicon-zoom-in"></i></span></li>
<?php
  if($_SESSION['crud'] == '0' || ($_SESSION['crud'] == '1' && $_SESSION['edit'][0] == $wilayah['plantation_group'] || $_SESSION['edit'][0] == $wilayah['code'])){
?>
                          <li><span class="check" onclick="show_modal_gallery_delete('<?php echo $glp->id; ?>', '<?php echo $glp->foto; ?>', '<?php echo $glp->caption; ?>', '<?php echo $glp->deskripsi; ?>')"><i class="fa fa-times"></i></span></li>
<?php
  }
?>
                        </ul>
                      </div>
                      <div class="meta">
                        <strong><?php echo $glp->caption; ?></strong>
                        <span><?php echo $glp->deskripsi; ?></span>
                      </div>
                    </a>
<?php
  }
?>
                  </div>
                </div>
                <div class="row">
                  <hr />
                  <div class="pull-left push-up-10">
                    <h3>PM Post Forcing</h3>
                  </div>
<?php
  if($_SESSION['crud'] == '0' || ($_SESSION['crud'] == '1' && $_SESSION['edit'][0] == $wilayah['plantation_group'] || $_SESSION['edit'][0] == $wilayah['code'])){
    if(sizeof($gallery['post_f']) >= 0){
      $disable = '';
    }
    else{
      $disable = 'disabled';
    }
?>
                  <div class="pull-right push-up-10">
                    <div class="btn-group">
                      <button class="btn btn-primary" <?php echo $disable; ?> onclick="show_modal_gallery('PM Post Forcing')"><span class="fa fa-cloud-upload"></span> Upload</button>
                    </div>
                  </div>
<?php
  }
?>
                  <div class="gallery" id="links">
<?php
  foreach ($gallery['post_f'] as $glp) {
?>
                    <a class="gallery-item" title="<?php echo $glp->caption; ?>" data-gallery>
                      <div class="image">
                        <img href="<?php echo $glp->foto; ?>" src="<?php echo $glp->foto; ?>" alt="<?php echo $glp->foto; ?>"/>
                        <ul class="gallery-item-controls">
                          <li><span class="check" onclick="show_modal_show_foto('<?php echo $glp->foto; ?>')"><i class="glyphicon glyphicon-zoom-in"></i></span></li>
<?php
  if($_SESSION['crud'] == '0' || ($_SESSION['crud'] == '1' && $_SESSION['edit'][0] == $wilayah['plantation_group'] || $_SESSION['edit'][0] == $wilayah['code'])){
?>
                          <li><span class="check" onclick="show_modal_gallery_delete('<?php echo $glp->id; ?>', '<?php echo $glp->foto; ?>', '<?php echo $glp->caption; ?>', '<?php echo $glp->deskripsi; ?>')"><i class="fa fa-times"></i></span></li>
<?php
  }
?>
                        </ul>
                      </div>
                      <div class="meta">
                        <strong><?php echo $glp->caption; ?></strong>
                        <span><?php echo $glp->deskripsi; ?></span>
                      </div>
                    </a>
<?php
  }
?>
                  </div>
                </div>
                <div class="row">
                  <hr />
                  <div class="pull-left push-up-10">
                    <h3>Harvesting</h3>
                  </div>
<?php
  if($_SESSION['crud'] == '0' || ($_SESSION['crud'] == '1' && $_SESSION['edit'][0] == $wilayah['plantation_group'] || $_SESSION['edit'][0] == $wilayah['code'])){
    if(sizeof($gallery['harvest']) >= 0){
      $disable = '';
    }
    else{
      $disable = 'disabled';
    }
?>
                  <div class="pull-right push-up-10">
                    <div class="btn-group">
                      <button class="btn btn-primary" <?php echo $disable; ?> onclick="show_modal_gallery('Harvesting')"><span class="fa fa-cloud-upload"></span> Upload</button>
                    </div>
                  </div>
<?php
  }
?>
                  <div class="gallery" id="links">
<?php
  foreach ($gallery['harvest'] as $glp) {
?>
                    <a class="gallery-item" title="<?php echo $glp->caption; ?>" data-gallery>
                      <div class="image">
                        <img href="<?php echo $glp->foto; ?>" src="<?php echo $glp->foto; ?>" alt="<?php echo $glp->foto; ?>"/>
                        <ul class="gallery-item-controls">
                          <li><span class="check" onclick="show_modal_show_foto('<?php echo $glp->foto; ?>')"><i class="glyphicon glyphicon-zoom-in"></i></span></li>
<?php
  if($_SESSION['crud'] == '0' || ($_SESSION['crud'] == '1' && $_SESSION['edit'][0] == $wilayah['plantation_group'] || $_SESSION['edit'][0] == $wilayah['code'])){
?>
                          <li><span class="check" onclick="show_modal_gallery_delete('<?php echo $glp->id; ?>', '<?php echo $glp->foto; ?>', '<?php echo $glp->caption; ?>', '<?php echo $glp->deskripsi; ?>')"><i class="fa fa-times"></i></span></li>
<?php
  }
?>
                        </ul>
                      </div>
                      <div class="meta">
                        <strong><?php echo $glp->caption; ?></strong>
                        <span><?php echo $glp->deskripsi; ?></span>
                      </div>
                    </a>
<?php
  }
?>
                  </div>
                </div>

                <div class="row">
                  <hr />
                  <div class="pull-left push-up-10">
                    <h3>Note</h3>
                  </div>
                  <div class="gallery" id="links">
<?php
  foreach ($gallery['note'] as $glp) {
?>
                    <a class="gallery-item" title="<?php echo $glp->header; ?>" data-gallery>
                      <div class="image">
                        <img href="<?php echo $glp->foto; ?>" src="<?php echo $glp->foto; ?>" alt="<?php echo $glp->foto; ?>"/>
                        <ul class="gallery-item-controls">
                          <li><span class="check" onclick="show_modal_show_foto('<?php echo $glp->foto; ?>')"><i class="glyphicon glyphicon-zoom-in"></i></span></li>
                        </ul>
                      </div>
                      <div class="meta">
                        <strong><?php echo $glp->header; ?></strong>
                        <span><?php echo $glp->quest; ?></span>
                      </div>
                    </a>
<?php
  }
?>
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
<div id="modal_note" class="modal">
  <span class="close" onclick="close_modal_note()">&times;</span>
  <!-- Modal content -->
  <div class="modal-content" style="overflow-x:auto;">
    <div class="row" align='center'>
      <h3><?php echo $note_lokasi['pg']; ?> - <?php echo $note_lokasi['wilayah']; ?> - <?php echo $note_lokasi['lokasi']; ?></h3>
    </div>
    <div class="row">
      <div class="col-md-6">
        <form action="/PIS/Upload/insert_note" method="post" enctype="multipart/form-data" >
          <input type="hidden" name="pg" value="<?php echo $note_lokasi['pg']; ?>">
          <input type="hidden" name="wilayah" value="<?php echo $note_lokasi['wilayah']; ?>">
          <input type="hidden" name="lokasi" value="<?php echo $note_lokasi['lokasi']; ?>">
          <input type="hidden" name="url" value="/Dashboard/lokasi?lokasi=<?php echo $produksi['lokasi']; ?>">
          <table width='100%'>
            <tr>
              <td style="padding-top:5px;padding-bottom:2px;width:50px;">
                Judul
              </td>
              <td style="padding-top:5px;padding-bottom:2px;width:10px;">
                :
              </td>
              <td style="padding-top:5px;padding-bottom:2px;">
                <input type="text" class="form-control" name='header' placeholder="Subject" required>
              </td>
            </tr>
            <tr>
              <td style="padding-top:2px;padding-bottom:2px;width:50px;">
                PIC
              </td>
              <td style="padding-top:2px;padding-bottom:2px;width:10px;">
                :
              </td>
              <td style="padding-top:2px;padding-bottom:2px;">
                <select multiple class="form-control select" name="pic_issue[]" id="pic_issue" required>
<?php
  foreach ($note_pic as $np) {
?>
                  <option value="<?php echo $np->index.', '.$np->nama; ?>"><?php echo $np->nama; ?> - <?php echo $np->deskripsi; ?></option>
<?php
  }
?>
                </select>
              </td>
            </tr>
            <tr>
              <td style="padding-top:2px;padding-bottom:2px;width:50px;">
                CC
              </td>
              <td style="padding-top:2px;padding-bottom:2px;width:10px;">
                :
              </td>
              <td style="padding-top:2px;padding-bottom:2px;">
                <select multiple class="form-control select" name="pic_info[]" id="pic_info">
<?php
  foreach ($note_pic as $np) {
?>
                  <option value="<?php echo $np->index; ?>"><?php echo $np->nama; ?> - <?php echo $np->deskripsi; ?></option>
<?php
  }
?>
                </select>
              </td>
            </tr>
            <tr>
              <td style="padding-top:2px;padding-bottom:2px;width:50px;">
                Foto
              </td>
              <td style="padding-top:2px;padding-bottom:2px;width:10px;">
                :
              </td>
              <td style="padding-top:2px;padding-bottom:2px;">
                <input type="file" class="btn btn-default" name="foto" id="foto" style="width:100%;">
              </td>
            </tr>
            <tr>
              <td style="padding-top:2px;padding-bottom:2px;width:50px;">
                Video
              </td>
              <td style="padding-top:2px;padding-bottom:2px;width:10px;">
                :
              </td>
              <td style="padding-top:2px;padding-bottom:2px;">
                <input type="file" class="btn btn-default" name="video" id="video" style="width:100%;">
              </td>
            </tr>
            <tr>
              <td style="padding-top:2px;padding-bottom:5px;width:50px;">
                Note
              </td>
              <td style="padding-top:2px;padding-bottom:5px;width:10px;">
                :
              </td>
              <td style="padding-top:2px;padding-bottom:5px;">
                <textarea id='quest' name="quest" rows="5" style="width:100%;" placeholder="Text here.." required></textarea>
              </td>
            </tr>
            <tr>
              <td colspan="3" align='center' style="padding-top:5px;padding-bottom:5px;width:50px;">
                <button type="submit" class="btn btn-success">Simpan</button>
              </td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>

</div>

<div id="modal_gallery" class="modal">
  <span class="close" onclick="close_modal_gallery()">&times;</span>
  <!-- Modal content -->
  <div class="modal-content">
    <div class="row" align='center'>
      <h3><?php echo $note_lokasi['pg']; ?> - <?php echo $note_lokasi['wilayah']; ?> - <?php echo $note_lokasi['lokasi']; ?></h3>
    </div>
    <div class="row">
      <div class="col-md-6">
        <form action="/PIS/Upload/insert_gallery" method="post" enctype="multipart/form-data" >
          <input type="hidden" name="lokasi" value="<?php echo $note_lokasi['lokasi']; ?>">
          <input type="hidden" name="url" value="/Dashboard/lokasi?lokasi=<?php echo $produksi['lokasi']; ?>">
          <table width='100%'>
            <tr>
              <td style="padding-top:5px;padding-bottom:2px;width:50px;">
                Caption
              </td>
              <td style="padding-top:5px;padding-bottom:2px;width:10px;">
                :
              </td>
              <td style="padding-top:5px;padding-bottom:2px;">
                <input type="text" class="form-control" name='caption' placeholder="Caption" required>
              </td>
            </tr>
            <tr>
              <td style="padding-top:5px;padding-bottom:2px;width:50px;">
                Jenis
              </td>
              <td style="padding-top:5px;padding-bottom:2px;width:10px;">
                :
              </td>
              <td style="padding-top:5px;padding-bottom:2px;">
                <div id='jenis_d'></div>
                <input type="hidden" name="jenis" id="jenis">
              </td>
            </tr>
            <tr>
              <td style="padding-top:2px;padding-bottom:2px;width:50px;">
                Foto
              </td>
              <td style="padding-top:2px;padding-bottom:2px;width:10px;">
                :
              </td>
              <td style="padding-top:2px;padding-bottom:2px;">
                <input type="file" class="btn btn-default" name="foto" style="width:100%;">
              </td>
            </tr>
            <tr>
              <td style="padding-top:2px;padding-bottom:5px;width:50px;">
                Note
              </td>
              <td style="padding-top:2px;padding-bottom:5px;width:10px;">
                :
              </td>
              <td style="padding-top:2px;padding-bottom:5px;">
                <textarea name="deskripsi" rows="5" style="width:100%;" placeholder="Text here.." required></textarea>
              </td>
            </tr>
            <tr>
              <td colspan="3" align='center' style="padding-top:5px;padding-bottom:5px;width:50px;">
                <button type="submit" class="btn btn-success">Simpan</button>
              </td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>

</div>

<div id="modal_peta" class="modal">
  <span class="close" onclick="close_modal_peta()">&times;</span>
  <!-- Modal content -->
  <div class="modal-content">
    <div class="row" align='center'>
      <h3><?php echo $note_lokasi['pg']; ?> - <?php echo $note_lokasi['wilayah']; ?> - <?php echo $note_lokasi['lokasi']; ?></h3>
    </div>
    <div class="row">
      <div class="col-md-6">
        <form action="/PIS/Upload/insert_peta" method="post" enctype="multipart/form-data" >
          <input type="hidden" name="lokasi" value="<?php echo $note_lokasi['lokasi']; ?>">
          <input type="hidden" name="url" value="/Dashboard/lokasi?lokasi=<?php echo $produksi['lokasi']; ?>">
          <table width='100%'>
            <tr>
              <td style="padding-top:5px;padding-bottom:2px;width:50px;">
                Caption
              </td>
              <td style="padding-top:5px;padding-bottom:2px;width:10px;">
                :
              </td>
              <td style="padding-top:5px;padding-bottom:2px;">
                <input type="text" class="form-control" name='caption' placeholder="Caption" required>
              </td>
            </tr>
            <tr>
              <td style="padding-top:2px;padding-bottom:2px;width:50px;">
                Foto
              </td>
              <td style="padding-top:2px;padding-bottom:2px;width:10px;">
                :
              </td>
              <td style="padding-top:2px;padding-bottom:2px;">
                <input type="file" class="btn btn-default" name="foto" style="width:100%;">
              </td>
            </tr>
            <tr>
              <td colspan="3" align='center' style="padding-top:5px;padding-bottom:5px;width:50px;">
                <button type="submit" class="btn btn-success">Simpan</button>
              </td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>

</div>

<div id="modal_peta_delete" class="modal">
  <span class="close" onclick="close_modal_peta_delete()">&times;</span>
  <!-- Modal content -->
  <div class="modal-content">
    <div class="row" align='center'>
      <h3 id='lokasi_delete'></h3>
    </div>
    <div class="row">
      <div class="col-md-6">
        <form action="/PIS/Upload/delete_peta" method="post">
          <input type="hidden" name="lokasi" value="<?php echo $note_lokasi['lokasi']; ?>">
          <input type="hidden" name='id' id='id_peta_delete'>
          <input type="hidden" name='foto' id='foto_peta_delete'>
          <input type="hidden" name="url" value="/Dashboard/lokasi?lokasi=<?php echo $produksi['lokasi']; ?>">
          <table width='100%'>
            <tr>
              <td style="padding-top:5px;padding-bottom:2px;width:50px;">
                Caption
              </td>
              <td style="padding-top:5px;padding-bottom:2px;width:10px;">
                :
              </td>
              <td style="padding-top:5px;padding-bottom:2px;">
                <div id='peta_caption_delete'></div>
              </td>
            </tr>
            <tr>
              <td colspan="3" align='center' style="padding-top:2px;padding-bottom:2px;width:50px;">
                Anda yakin ingin menghapus?
              </td>
            </tr>
            <tr>
              <td colspan="3" align='center' style="padding-top:5px;padding-bottom:5px;width:50px;">
                <button type="submit" class="btn btn-danger">Hapus</button>
              </td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>
</div>
<div id="modal_gallery_delete" class="modal">
  <span class="close" onclick="close_modal_gallery_delete()">&times;</span>
  <!-- Modal content -->
  <div class="modal-content">
    <div class="row" align='center'>
      <h3 id='lokasi_delete'></h3>
    </div>
    <div class="row">
      <div class="col-md-6">
        <form action="/PIS/Upload/delete_gallery" method="post">
          <input type="hidden" name="lokasi" value="<?php echo $note_lokasi['lokasi']; ?>">
          <input type="hidden" name='id' id='id_gallery_delete'>
          <input type="hidden" name='foto' id='foto_gallery_delete'>
          <input type="hidden" name="url" value="/Dashboard/lokasi?lokasi=<?php echo $lokasi['lokasi']; ?>">
          <table width='100%'>
            <tr>
              <td style="padding-top:5px;padding-bottom:2px;width:50px;">
                Caption
              </td>
              <td style="padding-top:5px;padding-bottom:2px;width:10px;">
                :
              </td>
              <td style="padding-top:5px;padding-bottom:2px;">
                <div id='caption_delete'></div>
              </td>
            </tr>
            <tr>
              <td style="padding-top:2px;padding-bottom:2px;width:50px;">
                Deskripsi
              </td>
              <td style="padding-top:2px;padding-bottom:2px;width:10px;">
                :
              </td>
              <td style="padding-top:2px;padding-bottom:2px;">
                <div id='deskripsi_delete'></div>
              </td>
            </tr>
            <tr>
              <td colspan="3" align='center' style="padding-top:2px;padding-bottom:2px;width:50px;">
                Anda yakin ingin menghapus?
              </td>
            </tr>
            <tr>
              <td colspan="3" align='center' style="padding-top:5px;padding-bottom:5px;width:50px;">
                <button type="submit" class="btn btn-danger">Hapus</button>
              </td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>
</div>

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
    $('#lokasi').focus();
    $('#lokasi').keyup(function(){
      this.value = this.value.toUpperCase();

      return runScript(event);

    });

    //Resolusi Layar
    if(screen.width <= 600){
      $("#diagram_berat_tanaman").css('height', '30vh');
      $("#diagram_histori_siram").css('height', '45px');
      $("#diagram_biaya_umur").css('height', '30px');
    }
    else{
      $("#diagram_berat_tanaman").css('height', '20vh');
    }
  });

  function show_modal_note(){
    modal_note.style.display = "block";
  }
  function close_modal_note(){
    modal_note.style.display = "none";
  }

  function show_modal_gallery(jenis){
    document.getElementById("jenis").value = jenis;
    document.getElementById("jenis_d").innerHTML = jenis;
    modal_gallery.style.display = "block";
  }
  function close_modal_gallery(){
    modal_gallery.style.display = "none";
  }

  function show_modal_gallery_delete(id, foto, caption, deskripsi){
    document.getElementById("id_gallery_delete").value = id;
    document.getElementById("foto_gallery_delete").value = foto;
    document.getElementById("caption_delete").innerHTML = caption;
    document.getElementById("deskripsi_delete").innerHTML = deskripsi;
    modal_gallery_delete.style.display = "block";
  }
  function close_modal_gallery_delete(){
    modal_gallery_delete.style.display = "none";
  }

  function show_modal_peta(){
    modal_peta.style.display = "block";
  }
  function close_modal_peta(){
    modal_peta.style.display = "none";
  }

  function show_modal_peta_delete(id, foto, caption){
    document.getElementById("id_peta_delete").value = id;
    document.getElementById("foto_peta_delete").value = foto;
    document.getElementById("peta_caption_delete").innerHTML = caption;
    modal_peta_delete.style.display = "block";
  }
  function close_modal_peta_delete(){
    modal_peta_delete.style.display = "none";
  }

  function show_modal_show_foto(id){
    modal_show_foto.style.display = "block";
    var img = document.getElementById("show_foto");
    img.src = id;
  }
  function close_modal_show_foto(){
    modal_show_foto.style.display = "none";
  }

  function runScript(e){
    if (e.keyCode == 13) {
      window.location.href="/PIS/dashboard/lokasi?lokasi="+$('#lokasi').val();
    }
  }
  function back(){
    window.location.href="/PIS/dashboard/wilayah?wilayah=<?php echo substr($lokasi['kebun'], 0, 3); ?>";
  }
  function profile(){
    window.location.href="/PIS/dashboard/profile";
  }
  function main_menu(){
    window.location.href="/PIS/dashboard/main_menu";
  }
  function detail_material(nama){
    window.location.href="/PIS/dashboard/detail_material?material="+nama+"&lokasi=<?php echo $lokasi['lokasi']; ?>";
  }
  function detail_all_spk(){
    window.location.href="/PIS/dashboard/detail_all_spk?lokasi=<?php echo $lokasi['lokasi']; ?>";
  }
  function detail_activity(tgl, type){
    window.location.href="/PIS/dashboard/detail_activity?tanggal="+tgl+"&lokasi=<?php echo $lokasi['lokasi']; ?>&type="+type;
  }
  window.onload = function() {
		var ctx_berat_tanaman = document.getElementById('diagram_berat_tanaman').getContext('2d');
		window.myLine = new Chart(ctx_berat_tanaman, config_berat_tanaman);
		var ctx_persen_bunga = document.getElementById('diagram_persen_bunga').getContext('2d');
		window.myBar = new Chart(ctx_persen_bunga, config_persen_bunga);
		var ctx_histori_siram = document.getElementById('diagram_histori_siram').getContext('2d');
		window.myBar = new Chart(ctx_histori_siram, config_histori_siram);
		var ctx_sebelum_panen = document.getElementById('diagram_sebelum_panen').getContext('2d');
		window.myBar = new Chart(ctx_sebelum_panen, config_sebelum_panen);
		var ctx_production_tonase = document.getElementById('diagram_production_tonase').getContext('2d');
		window.myDoughnut = new Chart(ctx_production_tonase, config_production_tonase);
		var ctx_cost_production = document.getElementById('diagram_cost_production').getContext('2d');
		window.myDoughnut = new Chart(ctx_cost_production, config_cost_production);
		var ctx_biaya_umur = document.getElementById('diagram_biaya_umur').getContext('2d');
		window.myMixedChart = new Chart(ctx_biaya_umur, config_biaya_umur);
	}
</script>
