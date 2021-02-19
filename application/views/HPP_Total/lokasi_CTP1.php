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
      <a class="nav-link p-1" href="/PIS/index.php/HPP_Total_Lokasi/lokasi?page=HOME&lokasi=<?php echo $produksi['lokasi']; ?>">
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

    <li class="nav-item active">
      <a class="nav-link p-1" href="#">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Observation</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/HPP_Total_Lokasi/lokasi?page=CTP2&lokasi=<?php echo $produksi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Plant Maintenance</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/HPP_Total_Lokasi/lokasi?page=CTP3&lokasi=<?php echo $produksi['lokasi']; ?>">
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
          <div class="col-lg-4 p-1">
            <div class="card shadow" style="width:100%;">
              <div class="card-header py-0 text-center" style="background-color:#75229F;">
                <span style="color:white;font-size:14px;"><b>Analisa Daun</b></span>
              </div>
              <div class="card-body" style="padding:0;">
                <table class="table_hpp" style="font-weight:bold;">
                  <tr style="background-color:#75229F;">
                    <td style="color:white;">Tanggal Pengamatan</td>
<?php
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
    $tgl_pengamatan_analisa_daun = NULL;
  }
  else{
    $tgl_pengamatan_analisa_daun = $pengamatan_daun['tgl_terima_sampel'];
  }
?>
                    <td style="color:white;" class="text-right"><?php echo format_tgl($tgl_pengamatan_analisa_daun); ?></td>
                  </tr>
                  <tr style="background-color:#75229F;">
                    <td style="color:white;">Umur Saat Pengamatan</td>
<?php
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
    $umur_pengamatan_analisa_daun = "- Bulan";
  }
  else{
    if($tgl_pengamatan_analisa_daun != NULL){
      $date1 = round(strtotime($pengamatan_daun['tgl_terima_sampel']) / 86400);
      $date2 = round(strtotime($lokasi['tgl_mulai_rawat']) / 86400);

      $umur = ($date1-$date2) / 30.4583333333333;

      $umur_pengamatan_analisa_daun = ceil($umur)." Bulan";
    }
    else{
      $umur_pengamatan_analisa_daun = "- Bulan";
    }
  }
?>
                    <td style="color:white;" class="text-right"><?php echo $umur_pengamatan_analisa_daun; ?></td>
                  </tr>
                  <tr>
                    <td>P (0.24 - 0.35)</td>
<?php
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
    echo '<td style="color:red;" class="text-right">-';
  }
  else{
    if($pengamatan_daun['P'] == 0){
      echo '<td style="color:red;" class="text-right">-';
    }
    else{
      if($pengamatan_daun['P'] >= 0.24 && $pengamatan_daun['P'] <= 0.35){
        echo '<td style="color:blue;" class="text-right">'.$pengamatan_daun['P'];
      }
      else{
        echo '<td style="color:red;" class="text-right">'.$pengamatan_daun['P'];
      }
    }
  }
?>
                    </td>
                  </tr>
                  <tr>
                    <td>Fe (80 - 150)</td>
<?php
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
    echo '<td style="color:red;" class="text-right">-';
  }
  else{
    if($pengamatan_daun['Fe'] == 0){
      echo '<td style="color:red;" class="text-right">-';
    }
    else{
      if($pengamatan_daun['Fe'] >= 80 && $pengamatan_daun['Fe'] <= 150){
        echo '<td style="color:blue;" class="text-right">'.$pengamatan_daun['Fe'];
      }
      else{
        echo '<td style="color:red;" class="text-right">'.$pengamatan_daun['Fe'];
      }
    }
  }
?>
                    </td>
                  </tr>
                  <tr>
                    <td>K (2.40 - 3.60)</td>
<?php
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
    echo '<td style="color:red;" class="text-right">-';
  }
  else{
    if($pengamatan_daun['K'] == 0){
      echo '<td style="color:red;" class="text-right">-';
    }
    else{
      if($pengamatan_daun['K'] >= 2.4 && $pengamatan_daun['K'] <= 3.6){
        echo '<td style="color:blue;" class="text-right">'.$pengamatan_daun['K'];
      }
      else{
        echo '<td style="color:red;" class="text-right">'.$pengamatan_daun['K'];
      }
    }
  }
?>
                    </td>
                  </tr>
                  <tr>
                    <td>Zn (15 - 70)</td>
<?php
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
    echo '<td style="color:red;" class="text-right">-';
  }
  else{
    if($pengamatan_daun['Zn'] == 0){
      echo '<td style="color:red;" class="text-right">-';
    }
    else{
      if($pengamatan_daun['Zn'] >= 15 && $pengamatan_daun['Zn'] <= 70){
        echo '<td style="color:blue;" class="text-right">'.$pengamatan_daun['Zn'];
      }
      else{
        echo '<td style="color:red;" class="text-right">'.$pengamatan_daun['Zn'];
      }
    }
  }
?>
                    </td>
                  </tr>
                  <tr>
                    <td>Mg (0.28 - 0.36)</td>
<?php
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
    echo '<td style="color:red;" class="text-right">-';
  }
  else{
    if($pengamatan_daun['Mg'] == 0){
      echo '<td style="color:red;" class="text-right">-';
    }
    else{
      if($pengamatan_daun['Mg'] >= 0.28 && $pengamatan_daun['Mg'] <= 0.36){
        echo '<td style="color:blue;" class="text-right">'.$pengamatan_daun['Mg'];
      }
      else{
        echo '<td style="color:red;" class="text-right">'.$pengamatan_daun['Mg'];
      }
    }
  }
?>
                    </td>
                  </tr>
                  <tr>
                    <td>Ca (0.18 - 0.24)</td>
<?php
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
    echo '<td style="color:red;" class="text-right">-';
  }
  else{
    if($pengamatan_daun['Ca'] == 0){
      echo '<td style="color:red;" class="text-right">-';
    }
    else{
      if($pengamatan_daun['Ca'] >= 0.18 && $pengamatan_daun['Ca'] <= 0.24){
        echo '<td style="color:blue;" class="text-right">'.$pengamatan_daun['Ca'];
      }
      else{
        echo '<td style="color:red;" class="text-right">'.$pengamatan_daun['Ca'];
      }
    }
  }
?>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>

          <div class="col-lg-4 p-1">
            <div class="card shadow" style="width:100%;">
              <div class="card-body" style="padding:0;">
                <canvas id="diagram_berat_tanaman"></canvas>
<?php
  $a = 1;
  $bt_real = "";
  $bt_std = "";
  while ($a <= 9) {
    if($a == 1){
      $bt_real = $berat_tanaman_f['F'.$a];
      if($std_berat_tanaman[$a] != NULL){
        $bt_std = round($std_berat_tanaman[$a], 2);
      }
      else{
        $bt_std = NULL;
      }
    }
    else{
      $bt_real .= ", ".$berat_tanaman_f['F'.$a];
      if($std_berat_tanaman[$a] != NULL){
        $bt_std .= ", ".round($std_berat_tanaman[$a], 2);
      }
      else{
        $bt_std .= ", ".NULL;
      }
    }
    $a++;
  }
?>
<script>
  var config_berat_tanaman = {
    type: 'bar',
    data: {
    labels: ['F-7', 'F-6', 'F-5', 'F-4', 'F-3', 'F-2', 'F-1', 'F-0', 'F+1'],
    datasets: [{
      type: 'line',
      label: 'STD',
      borderColor: '#0000FF',
      backgroundColor : '#FF0000',
      borderWidth: 3,
      pointRadius: 3,
      fill: false,
      data: [
        <?php echo $bt_std; ?>
      ]
    },{
      type: 'line',
      label: 'Real',
      borderColor: '#008000',
      backgroundColor : '#008000',
      borderWidth: 3,
      pointRadius: 3,
      fill: false,
      data: [
        <?php echo $bt_real; ?>
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
            max: 5,
            stepSize: 1,
            callback: function(label, index, labels) {
              return label;
            }
          },
          scaleLabel: {
              display: false,
              labelString: '1 M = 1.000.000'
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

          <div class="col-lg-4 p-1">
            <div class="card shadow" style="width:100%;">
              <div class="card-header py-0 text-center" style="background-color:#75229F;">
                <span style="color:white;font-size:14px;"><b>Pengamatan D-Leaf</b></span>
              </div>
              <div class="card-body" style="padding:0;">
                <table class="table_hpp" style="font-weight:bold;">
                  <tr style="background-color:#75229F;">
                    <td style="color:white;">Tanggal Pengamatan</td>
<?php
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
    $tgl_pengamatan_dleaf = NULL;
  }
  else{
    $tgl_pengamatan_dleaf = $berat_tanaman['tgl_pengamatan'];
  }
?>
                    <td style="color:white;" class="text-right"><?php echo format_tgl($tgl_pengamatan_dleaf); ?></td>
                  </tr>
                  <tr style="background-color:#75229F;">
                    <td style="color:white;">Umur Saat Pengamatan</td>
<?php
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
    $umur_pengamatan_dleaf = "- Bulan";
  }
  else{
    if($tgl_pengamatan_dleaf != NULL){
      $date1 = round(strtotime($berat_tanaman['tgl_pengamatan'])/86400);
      $date2 = round(strtotime($produksi['tgl_awal_perawatan'])/86400);

      $umur = ($date1-$date2)/30.4583333333333;

      $umur_pengamatan_dleaf = ceil($umur)." Bulan";
    }
    else{
      $umur_pengamatan_dleaf = "- Bulan";
    }
  }
?>
                    <td style="color:white;" class="text-right"><?php echo $umur_pengamatan_dleaf; ?></td>
                  </tr>
                  <tr>
                    <td>Populasi Normal</td>
                    <td class="text-right" style="">
<?php
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
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
                    <td>Warna Daun</td>
                    <td class="text-right" style="">
<?php
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
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
                  <tr>
                    <td>Mealybug</td>
                    <td class="text-right" style="">
<?php
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
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
                    <td>Phytoptora</td>
                    <td class="text-right" style="">
<?php
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
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
                  <tr>
                    <td>Erwinia</td>
                    <td class="text-right" style="">
<?php
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
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
                  <tr>
                    <td>Berat Tanaman</td>
                    <td class="text-right" style="">
<?php
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
    echo "-";
  }
  else{
    if($berat_tanaman['Rata2_BT'] == 0){
      echo "-";
    }
    else{
      echo $berat_tanaman['Rata2_BT'];
    }
  }
?>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        </div>

        <div class="row mb-1">
          <div class="col-lg-4 p-1">
            <div class="card shadow" style="width:100%;">
              <div class="card-header py-0 text-center" style="background-color:#75229F;">
                <span style="color:white;font-size:14px;"><b>Persen Bunga</b></span>
              </div>
              <div class="card-body" style="padding:0;">
                <table class="table_hpp" style="font-weight:bold;">
                  <tr style="background-color:#75229F;">
                    <td style="color:white;">Tanggal Pengamatan</td>
<?php
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
    $pengamatan_persen_bunga = NULL;
  }
  else{
    $pengamatan_persen_bunga = $persen_bunga['tgl_pengamatan'];
  }
?>
                    <td style="color:white;" class="text-right"><?php echo format_tgl($pengamatan_persen_bunga); ?></td>
                  </tr>
                  <tr style="background-color:#75229F;">
                    <td style="color:white;">Umur Saat Pengamatan</td>
<?php
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
    $umur_persen_bunga = "- Bulan";
  }
  else{
    if($pengamatan_persen_bunga != NULL){
      $date1 = round(strtotime($pengamatan_persen_bunga)/86400);
      $date2 = round(strtotime($produksi['tgl_awal_perawatan'])/86400);

      $umur = ($date1-$date2)/30.4583333333333;

      $umur_persen_bunga = ceil($umur)." Bulan";
    }
    else{
      $umur_persen_bunga = "- Bulan";
    }
  }
?>
                    <td style="color:white;" class="text-right"><?php echo $umur_persen_bunga; ?></td>
                  </tr>
                  <tr style="background-color:#75229F;">
                    <td colspan="2" style="color:black;padding-top:5px;padding-bottom:5px;">
                      <b style="color:white;">Populasi :</b>
                    </td>
                  </tr>
                  <tr>
                    <td>Pop. Serangan Tikus</td>
                    <td align="right">
<?php
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
    echo "-";
  }
  else{
    if($persen_bunga['dimakan_tikus'] == 0){
      echo "-";
    }
    else{
      echo angka_ribuan($persen_bunga['dimakan_tikus']);
    }
  }
?>
                    </td>
                  </tr>
                  <tr>
                    <td>Pop. Buah Alami</td>
                    <td align="right">
<?php
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
    echo "-";
  }
  else{
    if($persen_bunga['jumlah_buah_alami'] == 0){
      echo "-";
    }
    else{
      echo angka_ribuan($persen_bunga['jumlah_buah_alami']);
    }
  }
?>
                    </td>
                  </tr>
                  <tr>
                    <td>Populasi Normal</td>
                    <td align="right">
<?php
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
    echo "-";
  }
  else{
    if($persen_bunga['berbunga_normal'] == 0){
      echo "-";
    }
    else{
      echo angka_ribuan($persen_bunga['berbunga_normal']);
    }
  }
?>
                    </td>
                  </tr>
                  <tr style="background-color:#75229F;">
                    <td colspan="2"><hr /></td>
                  </tr>
                  <tr>
                    <td>Populasi Total</td>
                    <td align="right">
<?php
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
    echo "-";
  }
  else{
    if($persen_bunga['total'] == 0){
      echo "-";
    }
    else{
      echo angka_ribuan($persen_bunga['total']);
    }
  }
?>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>

          <div class="col-lg-4 p-1">
            <div class="card shadow" style="width:100%;">
              <div class="card-body" style="padding:0;">
                <canvas id="diagram_persen_bunga" style="padding-right:20px;"></canvas>
<?php
  $persen_bunga_total = '';
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
    $persen_bunga_total .= "0, 0, 0, 0, 0, 0, 0, 0";
  }
  else{
    $persen_bunga_total .= round($persen_bunga['persen_berbunga_normal_NN']);
    $persen_bunga_total .= ", ".round($persen_bunga['persen_berbunga_normal_NT']);
    $persen_bunga_total .= ", ".round($persen_bunga['persen_mandul_kerdil']);
    $persen_bunga_total .= ", ".round($persen_bunga['persen_mandul_penyakit']);
    $persen_bunga_total .= ", ".round($persen_bunga['persen_mandul_normal']);
    $persen_bunga_total .= ", ".round($persen_bunga['persen_berbunga_kerdil']);
    $persen_bunga_total .= ", ".round($persen_bunga['persen_berbunga_penyakit']);
    if($persen_bunga['total'] != NULL){
      $pengamatan_persen_berbunga_normal = ($persen_bunga['berbunga_normal'] / $persen_bunga['total']) * 100;
    }
    else{
      $pengamatan_persen_berbunga_normal = 0;
    }
    $persen_bunga_total .= ", ".round($pengamatan_persen_berbunga_normal);
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
          <?php echo $persen_bunga_total; ?>
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
        display: false,
        text: 'Persen Bunga',
        fontSize: 14,
        fontFamily: 'arial',
        padding: 5,
        lineHeight: 1,
      },
      tooltips: {
        mode: 'nearest',
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

    if(change == 1){
      window.location.href="/PIS/index.php/HPP_Total_Lokasi/lokasi?page=<?php echo $page; ?>&lokasi="+lokasi;
    }
    else{
      var tgl_panen = $('#tgl_panen').val();
      window.location.href="/PIS/index.php/HPP_Total_Lokasi/lokasi?page=<?php echo $page; ?>&lokasi="+lokasi+"&tgl_panen="+tgl_panen;
    }
  }
  window.onload = function(){
		var ctx_berat_tanaman = document.getElementById('diagram_berat_tanaman').getContext('2d');
		window.myBar = new Chart(ctx_berat_tanaman, config_berat_tanaman);
		var ctx_persen_bunga = document.getElementById('diagram_persen_bunga').getContext('2d');
		window.myBar = new Chart(ctx_persen_bunga, config_persen_bunga);
	};
</script>
