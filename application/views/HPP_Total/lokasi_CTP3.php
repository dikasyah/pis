<!-- Page Wrapper -->
<div id="wrapper">
  <!-- Sidebar -->
  <ul class="navbar-nav sidebar sidebar-dark accordion toggled" style="background-color:#9F229F;" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" style="height:100px;">
      <div class="sidebar-brand-icon">
        <img src="/PIS/assets/images/logo-apk.png" height="75px"/>
      </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/HPP_Total_Lokasi/lokasi?page=CTP3&lokasi=<?php echo $produksi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Dashboard</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/HPP_Total_Lokasi/lokasi?page=GALO&lokasi=<?php echo $produksi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Gallery</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/HPP_Total_Lokasi/lokasi?page=DSPK&lokasi=<?php echo $produksi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Detail SPK</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Heading -->
    <div class="sidebar-heading text-center">
      Category
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/HPP_Total_Lokasi/lokasi?page=CTLP&lokasi=<?php echo $produksi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Land Preparation</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/HPP_Total_Lokasi/lokasi?page=CTP1&lokasi=<?php echo $produksi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Observation</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/HPP_Total_Lokasi/lokasi?page=CTP2&lokasi=<?php echo $produksi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Plant Maintenance</span></a>
    </li>
    <li class="nav-item active">
      <a class="nav-link p-1" href="#">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Irrigation</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/HPP_Total_Lokasi/lokasi?page=CTPR&lokasi=<?php echo $produksi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Production</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>
  <!-- End of Sidebar -->

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

      <!-- Topbar -->
      <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
          <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Desc -->
        <form class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
          <div class="input-group">
            <span class="d-none d-sm-inline-block" style="color:black;font-size:14px;"><b>
              <a href="/PIS/index.php/HPP_Total_Dashboard/plantation_group?pg=<?php echo $produksi['pg']; ?>"><?php echo $produksi['pg']; ?></a> -
              <a href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=<?php echo $produksi['wilayah']; ?>"><?php echo $produksi['wilayah']; ?></a> -
              <?php echo $produksi['lokasi']; ?> -
              Observation
            </b></span>
            <span class="d-sm-none" style="color:black;font-size:12px;"><b>
              <a href="/PIS/index.php/HPP_Total_Dashboard/plantation_group?pg=<?php echo $produksi['pg']; ?>"><?php echo $produksi['pg']; ?></a> -
              <a href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=<?php echo $produksi['wilayah']; ?>"><?php echo $produksi['wilayah']; ?></a> -
              <?php echo $produksi['lokasi']; ?> -
              Observation
            </b></span>
          </div>
        </form>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

          <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=<?php echo $produksi['wilayah']; ?>" role="button" aria-expanded="false">
              <i class="fas fa-arrow-circle-left fa-lg"></i>
            </a>
          </li>

          <div class="topbar-divider d-none d-sm-block"></div>

          <!-- Nav Item - User Information -->
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nama']; ?></span>
<?php
if($account['foto'] != NULL){
?>
              <img class="img-profile rounded-circle" src="<?php echo $_SESSION['foto']; ?>">
<?php
}
else{
?>
              <img class="img-profile rounded-circle" src="/PIS/assets/images/profile/empty-profile.png">
<?php
}
?>
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="/PIS/index.php/Dashboard/profile">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400 small"></i>
                Profile
              </a>
              <a class="dropdown-item" href="/PIS/index.php/Dashboard/main_menu">
                <i class="fas fa-bars fa-sm fa-fw mr-2 text-gray-400 small"></i>
                Main Menu
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
              </a>
            </div>
          </li>

        </ul>

      </nav>
      <!-- End of Topbar -->

      <!-- Begin Page Content -->
      <div class="container-fluid">

        <div class="row mb-2">
          <div class="col-lg-2 p-1">
            <div class="card shadow" style="width:100%;">
              <div class="card-header py-0 text-center" style="background-color:#75229F;font-size:14px;">
                <span style="color:white;"><b>Location</b></span>
              </div>
              <div class="card-body" style="padding:0;height:100px;background-color:#9944CC;">
                <br>
                <input type="text" name="lokasi" id="lokasi" class="form-control" placeholder="Lokasi" style="background-color:#9944CC;color:black;text-align:center;font-size:25px;height:50px;" maxlength="5" value="<?php echo $produksi['lokasi']; ?>"/>
              </div>
            </div>
          </div>

          <div class="col-lg-10 p-1">
            <div class="card shadow" style="width:100%;">
              <div class="card-header py-0 text-center" style="background-color:#75229F;font-size:14px;">
                <span style="color:white;"><b>Profile <?php echo $produksi['lokasi']; ?></b></span>
              </div>
              <div class="card-body" style="padding:0;color:black;font-size:12px;font-weight:bold;">
                <div class="row px-3">
                  <div class="col-lg-3" style="padding:5px;">
                    <div class="card-body" style="padding:5px;background-color:#9944CC;">
                      <table width="100%">
                        <tbody>
                          <tr>
                            <td width="120px">
                              Wilayah
                            </td>
                            <td>
                              <?php echo $wilayah['code']; ?>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Kebun
                            </td>
                            <td>
                              <?php echo $produksi['kebun']; ?>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Ka. Wilayah
                            </td>
                            <td>
                              <?php echo $wilayah['kepala_wilayah']; ?>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Ka. Kasie
                            </td>
                            <td>
                              <?php echo $wilayah['kasie_kebun'.substr($produksi['kebun'], 3)]; ?>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="col-lg-3" style="padding:5px;">
                    <div class="card-body" style="padding:5px;background-color:#9944CC;">
                      <table width="100%">
                        <tbody>
                          <tr>
                            <td width="120px">
                              Status
                            </td>
                            <td>
                              <?php echo $produksi['status']; ?>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Varietas Bibit
                            </td>
                            <td>
<?php
  if($produksi['varietas'] == NULL){
    echo "-";
  }
  else{
    echo $produksi['varietas'];
  }
?>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Jenis Bibit
                            </td>
                            <td>
<?php
  if($produksi['jenis'] == NULL){
    echo "-";
  }
  else{
    echo $produksi['jenis'];
  }
?>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Kelas Bibit
                            </td>
                            <td>
<?php
  if($produksi['kelas'] == NULL){
    echo "-";
  }
  else{
    echo $produksi['kelas'];
  }
?>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="col-lg-3" style="padding:5px;">
                    <div class="card-body" style="padding:5px;background-color:#9944CC;">
                      <table width="100%">
                        <tbody>
                          <tr>
                            <td width="120px">
                              Tgl Perawatan
                            </td>
                            <td>
<?php
  if(substr($produksi['status'], 0, 4) == "NSBB" || substr($produksi['status'], 0, 4) == "NSBK"){
    echo "-";
  }
  else{
    echo format_tgl($produksi['tgl_awal_perawatan']);
  }
?>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Rencana Forcing
                            </td>
                            <td>
<?php
  if(substr($produksi['status'], 0, 4) == "NSBB" || substr($produksi['status'], 0, 4) == "NSBK"){
    echo "-";
  }
  else{
    echo format_tgl($tgl_rencana_forcing);
  }
?>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Real Forcing
                            </td>
                            <td>
<?php
  if($produksi['status'] == "NSBB" || $produksi['status'] == "NSBK"){
    echo "-";
  }
  else{
    echo format_tgl($tgl_rencana_forcing);
  }
?>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Panen
                            </td>
                            <td>
                              <select name="tgl_panen" id="tgl_panen" style="color:black;font-weight:bold;width:100%;" onchange="select_main_filter()">
<?php
  foreach ($tgl_panen_all as $tpa) {
    if($tpa->tgl_panen == $tgl_panen){
?>
                                <option style="color:black;font-weight:bold;width:100%;" value="<?php echo $tpa->tgl_panen; ?>" selected><?php echo format_tgl($tpa->tgl_panen); ?></option>
<?php
    }
    else{
?>
                                <option style="color:black;font-weight:bold;width:100%;" value="<?php echo $tpa->tgl_panen; ?>"><?php echo format_tgl($tpa->tgl_panen); ?></option>
<?php
    }
  }
?>
                              </select>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="col-lg-3" style="padding:5px;">
                    <div class="card-body" style="padding:5px;background-color:#9944CC;">
                      <table width="100%">
                        <tbody>
                          <tr>
                            <td width="120px">
                              Luas
                            </td>
                            <td>
<?php
  if($produksi['real_dan_sisa_rencana_luas'] != NULL){
    echo angka_ribuan_2($produksi['real_dan_sisa_rencana_luas']);
  }
  else{
    echo angka_ribuan_2($produksi['luas']);
  }
?>
                              Ha
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Tonase
                            </td>
                            <td>
<?php
  if(substr($produksi['status'], 0, 4) == "NSBB" || substr($produksi['status'], 0, 4) == "NSBK"){
    echo angka_ribuan(0);
  }
  else{
    echo angka_ribuan($tonase);
  }
?>
                              Ton
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Yield
                            </td>
                            <td>
<?php
  if(substr($produksi['status'], 0, 4) == "NSBB" || substr($produksi['status'], 0, 4) == "NSBK"){
    echo angka_ribuan_2(0);
  }
  else{
    echo angka_ribuan_2($yield);
  }
?>
                              Ton/Ha
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Umur
                            </td>
                            <td>
<?php
  if(substr($produksi['status'], 0, 4) == "NSBB" || substr($produksi['status'], 0, 4) == "NSBK"){
    echo "-";
  }
  else{
    $date1 = round(strtotime($konstanta['nilai'])/86400);
    $date2 = round(strtotime($produksi['tgl_awal_perawatan'])/86400);

    $umur = ($date1-$date2)/30.4583333333333;

    echo ceil($umur);
  }
?>
                              Bulan
                            </td>
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

        <div class="row mb-1">
          <div class="col-lg-7">
            <div class="row mb-1">
              <div class="col-lg-12 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-body" style="padding:0;">
                    <div class="table-responsive">
                      <table class="table_hpp" style="font-weight:bold;">
                        <tr class="text-center" style="background-color: #75229F;">
                          <td style="color:white;">Date</td>
                          <td style="color:white;">Coverage</td>
                          <td style="color:white;">Availability</td>
                          <td style="color:white;">Utilization</td>
                          <td style="color:white;">Cost/Ha</td>
                          <td style="color:white;">Ha/Day</td>
                          <td style="color:white;">Ha/Hour</td>
                          <td style="color:white;">Fuel/Hour</td>
                          <td style="color:white;">Fuel/Ha</td>
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
                        <tr class="text-center" id="tr_irrigation<?php echo $i; ?>">
                          <td><?php echo format_bln($ir->tanggal); ?></td>
                          <td><?php echo angka_ribuan_2($luas_siram / ($luas * 3) * 100); ?> %</td>
                          <td><?php echo round(($total_operation_time/$total_time)*100); ?> %</td>
                          <td><?php echo round(($operation_time/$total_operation_time)*100); ?> %</td>
                          <td><?php echo angka_ribuan(($biaya_total/$luas_siram)); ?></td>
                          <td><?php echo round(($luas_siram/($total_operation_time/24)), 2); ?></td>
                          <td><?php echo round(($luas_siram/$operation_time), 2); ?></td>
                          <td><?php echo angka_ribuan_2(($solar_terpakai / $operation_time)); ?></td>
                          <td><?php echo round(($solar_terpakai/$luas_siram), 2); ?></td>
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
                        <tr class="text-center" id="tr_irrigation<?php echo $i; ?>">
                          <td><?php echo format_bln($ir->tanggal); ?></td>
                          <td><?php echo angka_ribuan_2($luas_siram / ($luas * 3) * 100); ?> %</td>
                          <td><?php echo round(($total_operation_time/$total_time)*100); ?> %</td>
                          <td><?php echo round(($operation_time/$total_operation_time)*100); ?> %</td>
                          <td><?php echo angka_ribuan(($biaya_total/$luas_siram)); ?></td>
                          <td><?php echo round(($luas_siram/($total_operation_time/24)), 2); ?></td>
                          <td><?php echo round(($luas_siram/$operation_time), 2); ?></td>
                          <td><?php echo angka_ribuan_2(($solar_terpakai / $operation_time)); ?></td>
                          <td><?php echo round(($solar_terpakai/$luas_siram), 2); ?></td>
                        </tr>
<?php
    }
    $i++;
  }
?>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-1">
              <div class="col-lg-12 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-body" style="padding:0;">
                    <select class="form-control select" name="select_tahun_aplikasi" id="select_tahun_aplikasi" onchange="javascript:select_main_filter();" style="color:black;font-weight:bold;">
<?php
  foreach ($tahun_siram as $bs) {
    if($bs->tanggal == $pbs){
?>
                      <option value="<?php echo $bs->tanggal; ?>" selected><?php echo $bs->tanggal; ?></option>
<?php
    }
    else{
?>
                      <option value="<?php echo $bs->tanggal; ?>"><?php echo $bs->tanggal; ?></option>
<?php
    }
  }
?>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-1">
              <div class="col-lg-12 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-header py-0 text-center" style="background-color:#75229F;">
                    <span style="color:white;font-size:14px;"><b>Sebaran Siram per Bulan</b></span>
                  </div>
                  <div class="card-body" style="padding:0;">
                    <canvas id="diagram_tahun_siram" style="padding:5px;"></canvas>
<?php
  $luas_rencana_siram = angka_ribuan_2($luas * 3);
  $rencana_siram = (100).", ".(100).", ".(100).", ".(100).", ".(100).", ".(100);
  $rencana_siram .= ', '.(100).", ".(100).", ".(100).", ".(100).", ".(100).", ".(100);
  $a = 1;
  while($a <= 12){
    if($a == 1){
      if(isset($data_siram_tahun[$a])){
        $ca = round(($data_siram_tahun[$a] / ($luas * 3)) * 100);
      }
      else{
        $ca = (0);
      }
    }
    else{
      if(isset($data_siram_tahun[$a])){
        $ca .= ', '.round(($data_siram_tahun[$a] / ($luas * 3)) * 100);
      }
      else{
        $ca .= ', '.(0);
      }
    }
    $a++;
  }
?>
<script>
  var config_tahun_siram = {
    type: 'bar',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
      datasets: [{
        type: 'line',
        label: 'Rencana Siram',
        borderColor: '#FF0000',
        backgroundColor : '#FFCC00',
        borderWidth: 2,
        pointRadius: 3,
        fill: false,
        data: [
          <?php echo $rencana_siram; ?>
        ]
      },{
        type: 'bar',
        label: 'Coverage Area',
        backgroundColor: '#008000',
        data: [
          <?php echo $ca; ?>
        ]
      }]
    },
    options: {
      responsive: true,
      legend: {
        display: false,
        labels: {
          usePointStyle: true,
        }
      },
      title: {
        display: false,
        text: 'Trend Siram Springkle'
      },
      tooltips: {
        mode: 'index',
        intersect: false,
        callbacks: {
          label: function(tooltipItem, data) {
            var label = data.datasets[tooltipItem.datasetIndex].label;
            var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            if(label != 'Rencana Siram'){
              // if(val != 0){
                return label + ' : ' + val + '%';
              // }
            }
          }
        }
      },
      scales: {
        yAxes: [{
          ticks: {
            min: 0,
            max: 200,
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
              </div>
            </div>
          </div>

          <div class="col-lg-5">
            <div class="row mb-1">
              <div class="col-lg-12 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-header py-0 text-center" style="background-color:#75229F;">
                    <span style="color:white;font-size:14px;"><b>Trend Siram Springkle</b></span>
                  </div>
                  <div class="card-body" style="padding:0;">
                    <canvas id="diagram_histori_siram"></canvas>
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
        display: false,
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
              </div>
            </div>

            <div class="row mb-1">
              <div class="col-lg-6 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-header py-0 text-center" style="background-color:#75229F;">
                    <span style="color:white;font-size:14px;"><b>Coverage Area</b></span>
                  </div>
                  <div class="card-body text-center" style="padding:0;">
                    <h3 style="color:black;padding:10px;"><?php if($banyak_bulan != NULL) echo round(($total_luas_siram / ($luas * 3 * $banyak_bulan)) * 100); else echo '-'; ?> %</h3>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->

  </div>
  <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="/PIS/index.php/dashboard/logout">Logout</a>
      </div>
    </div>
  </div>
</div>
<script>
  $( document ).ready(function() {
    $('#lokasi').focus();
    $('#lokasi').keyup(function(){
      this.value = this.value.toUpperCase();
      return runScript(event);
    });
  });
  function runScript(e){
    if (e.keyCode == 13) {
      select_main_filter(1);
    }
  }
  function select_main_filter(change){
    var lokasi = $('#lokasi').val();
    var pbs = $('#select_tahun_aplikasi').val();

    if(change == 1){
      window.location.href="/PIS/index.php/HPP_Total_Lokasi/lokasi?page=<?php echo $page; ?>&lokasi="+lokasi+"&pbs="+pbs;
    }
    else{
      var tgl_panen = $('#tgl_panen').val();
      window.location.href="/PIS/index.php/HPP_Total_Lokasi/lokasi?page=<?php echo $page; ?>&lokasi="+lokasi+"&pbs="+pbs+"&tgl_panen="+tgl_panen;
    }
  }
  window.onload = function() {
		var ctx_histori_siram = document.getElementById('diagram_histori_siram').getContext('2d');
		window.myBar = new Chart(ctx_histori_siram, config_histori_siram);
		var ctx_tahun_siram = document.getElementById('diagram_tahun_siram').getContext('2d');
		window.myBar = new Chart(ctx_tahun_siram, config_tahun_siram);
	}
</script>
