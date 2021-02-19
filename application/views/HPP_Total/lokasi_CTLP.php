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
    <li class="nav-item active">
      <a class="nav-link p-1" href="#">
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
              Land Preparation
            </b></span>
            <span class="d-sm-none" style="color:black;font-size:12px;"><b>
              <a href="/PIS/index.php/HPP_Total_Dashboard/plantation_group?pg=<?php echo $produksi['pg']; ?>"><?php echo $produksi['pg']; ?></a> -
              <a href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=<?php echo $produksi['wilayah']; ?>"><?php echo $produksi['wilayah']; ?></a> -
              <?php echo $produksi['lokasi']; ?> -
              Land Preparation
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
          <div class="col-lg-5">
            <div class="row mb-1">
              <div class="col-lg-6 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-header py-0 text-center" style="background-color:#75229F;">
                    <span style="color:white;font-size:14px;"><b>Populasi Tanam</b></span>
                  </div>
                  <div class="card-body" style="padding:0;">
                    <table class="table_hpp text-center" style="font-weight:bold;">
                      <tr>
                        <td style="font-size:16px;padding-top:10px;padding-bottom:10px;">
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
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-header py-0 text-center" style="background-color:#75229F;">
                    <span style="color:white;font-size:14px;"><b>Ex Status</b></span>
                  </div>
                  <div class="card-body" style="padding:0;">
                    <table class="table_hpp text-center" style="font-weight:bold;">
                      <tr>
                        <td style="font-size:16px;padding-top:10px;padding-bottom:10px;">
<?php
  if(substr($produksi['status'], 2, 2) == "SC"){
    echo substr($produksi['status'], 0, 2)."FC";
  }
  else{
    if($histori_lokasi_sebelumnya['status_lokasi'] == NULL){
      echo "-";
    }
    else{
      echo substr($histori_lokasi_sebelumnya['status_lokasi'], 0, 4);
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
              <div class="col-lg-6 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-header py-0 text-center" style="background-color:#75229F;">
                    <span style="color:white;font-size:14px;"><b>Interval Land Prep</b></span>
                  </div>
                  <div class="card-body" style="padding:0;">
                    <table class="table_hpp text-center" style="font-weight:bold;">
                      <tr>
                        <td style="font-size:16px;padding-top:10px;padding-bottom:10px;">
<?php
  if(substr($produksi['status'], 0, 2) == 'SC'){
    echo "-";
  }
  else{
    $bongkar = round(strtotime($histori_lokasi_bk['tgl_perubahan_status']) / 86400);
    $tanam = round(strtotime($histori_lokasi_st['tgl_perubahan_status']) / 86400);

    $interval = $tanam-$bongkar;
    echo $interval." Hari";
  }
?>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-header py-0 text-center" style="background-color:#75229F;">
                    <span style="color:white;font-size:14px;"><b>Kondisi Drainage</b></span>
                  </div>
                  <div class="card-body" style="padding:0;">
                    <table class="table_hpp text-center" style="font-weight:bold;">
                      <tr>
                        <td style="font-size:16px;padding-top:10px;padding-bottom:10px;">
<?php
  if($drainase['value'] == NULL){
    echo "-";
  }
  else{
    echo $drainase['value'];
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
              <div class="col-lg-6 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-header py-0 text-center" style="background-color:#75229F;">
                    <span style="color:white;font-size:14px;"><b>Biaya Tanam (Rp/Ha)</b></span>
                  </div>
                  <div class="card-body" style="padding:0;">
                    <table class="table_hpp" style="font-weight:bold;">
                      <tr>
                        <td style="padding-top:5px;padding-bottom:5px;">Bibit</td>
                        <td class="text-right" style="padding-top:5px;padding-bottom:5px;">
<?php
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
    echo "-";
  }
  else{
    if($biaya_tanam['bibit']['total'] == 0){
      echo "-";
    }
    else{
      echo angka_ribuan($biaya_tanam['bibit']['total'] / $luas);
    }
  }
?>
                        </td>
                      </tr>
                      <tr>
                        <td style="padding-top:5px;padding-bottom:5px;">Sulam</td>
                        <td class="text-right" style="padding-top:5px;padding-bottom:5px;">
<?php
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
    echo "-";
  }
  else{
    if($biaya_tanam['sulam']['total'] == 0){
      echo "-";
    }
    else{
      echo angka_ribuan($biaya_tanam['sulam']['total'] / $luas);
    }
  }
?>
                        </td>
                      </tr>
                      <tr>
                        <td style="padding-top:5px;padding-bottom:5px;">Tanam</td>
                        <td class="text-right" style="padding-top:5px;padding-bottom:5px;">
<?php
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
    echo "-";
  }
  else{
    if($biaya_tanam['tanam']['total'] == 0){
      echo "-";
    }
    else{
      echo angka_ribuan($biaya_tanam['tanam']['total'] / $luas);
    }
  }
?>
                        </td>
                      </tr>
                      <tr>
                        <td style="padding-top:5px;padding-bottom:5px;">Ecer</td>
                        <td class="text-right" style="padding-top:5px;padding-bottom:5px;">
<?php
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
    echo "-";
  }
  else{
    if($biaya_tanam['ecer']['total'] == 0){
      echo "-";
    }
    else{
      echo angka_ribuan($biaya_tanam['ecer']['total'] / $luas);
    }
  }
?>
                        </td>
                      </tr>
                      <tr>
                        <td style="padding-top:5px;padding-bottom:5px;">Transport</td>
                        <td class="text-right" style="padding-top:5px;padding-bottom:5px;">
<?php
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
    echo "-";
  }
  else{
    if($biaya_tanam['transport']['total'] == 0){
      echo "-";
    }
    else{
      echo angka_ribuan($biaya_tanam['transport']['total'] / $luas);
    }
  }
?>
                        </td>
                      </tr>
                      <tr>
                        <td style="padding-top:5px;padding-bottom:5px;">Others</td>
                        <td class="text-right" style="padding-top:5px;padding-bottom:5px;">
<?php
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
    echo "-";
  }
  else{
    if($biaya_tanam['others']['total'] == 0){
      echo "-";
    }
    else{
      echo angka_ribuan($biaya_tanam['others']['total'] / $luas);
    }
  }
?>
                        </td>
                      </tr>
                      <tr style="background-color:#75229F;">
                        <td colspan="2"><hr /></td>
                      </tr>
                      <tr>
                        <td style="padding-top:5px;padding-bottom:5px;">Jumlah Sulam</td>
                        <td class="text-right" style="padding-top:5px;padding-bottom:5px;">
<?php
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
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
                        <td style="padding-top:5px;padding-bottom:5px;">Index Sulam</td>
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
                        <td class="text-right" style="color:<?php echo $color_index_sulam; ?>;padding-top:5px;padding-bottom:5px;">
<?php
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
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
                      <tr>
                        <td style="padding-top:5px;padding-bottom:5px;">Index TK Tanam</td>
                        <td class="text-right" style="padding-top:5px;padding-bottom:5px;">
<?php
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
    echo "-";
  }
  else{
    if($biaya_tanam['index_tk']['index_tk'] == 0){
      echo "-";
    }
    else{
      echo round($biaya_tanam['index_tk']['index_tk'], 2).' Ha/TK';
    }
  }
?>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-header py-0 text-center" style="background-color:#75229F;">
                    <span style="color:white;font-size:14px;"><b>Analisa Tanah Siap Tanam</b></span>
                  </div>
                  <div class="card-body" style="padding:0;">
                    <table class="table_hpp" style="font-weight:bold;">
                      <tr>
                        <td style="padding-top:5px;padding-bottom:5px;">pH (4.3 - 4.8)</td>
<?php
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
    $color = "#000000";
    $value = "-";
  }
  else{
    if($pengamatan_tanah['pH_H2O'] == 0){
      $color = "#000000";
      $value = angka_ribuan_2($pengamatan_tanah['pH_H2O']);
    }
    else{
      if($pengamatan_tanah['pH_H2O'] >= 4.3 && $pengamatan_tanah['pH_H2O'] <= 4.8){
        $color = "#0000FF";
        $value = angka_ribuan_2($pengamatan_tanah['pH_H2O']);
      }
      else{
        $color = "#FF0000";
        $value = angka_ribuan_2($pengamatan_tanah['pH_H2O']);
      }
    }
  }
?>
                        <td class="text-right" style="color:<?php echo $color; ?>;padding-top:5px;padding-bottom:5px;">
                          <?php echo $value; ?>
                        </td>
                      </tr>
                      <tr>
                        <td style="padding-top:5px;padding-bottom:5px;">C-Organik(> 1.2)</td>
<?php
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
    $color = "#000000";
    $value = "-";
  }
  else{
    if($pengamatan_tanah['C'] == 0){
      $color = "#000000";
      $value = angka_ribuan_2($pengamatan_tanah['C']);
    }
    else{
      if($pengamatan_tanah['C'] >= 1.2){
        $color = "#0000FF";
        $value = angka_ribuan_2($pengamatan_tanah['C']);
      }
      else{
        $color = "#FF0000";
        $value = angka_ribuan_2($pengamatan_tanah['C']);
      }
    }
  }
?>
                        <td class="text-right" style="color:<?php echo $color; ?>;padding-top:5px;padding-bottom:5px;">
                          <?php echo $value; ?>
                        </td>
                      </tr>
                      <tr>
                        <td style="padding-top:5px;padding-bottom:5px;">P (> 20 ppm)</td>
<?php
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
    $color = "#000000";
    $value = "-";
  }
  else{
    if($pengamatan_tanah['P'] == 0){
      $color = "#000000";
      $value = angka_ribuan_2($pengamatan_tanah['P']);
    }
    else{
      if($pengamatan_tanah['P'] >= 20){
        $color = "#0000FF";
        $value = angka_ribuan_2($pengamatan_tanah['P']);
      }
      else{
        $color = "#FF0000";
        $value = angka_ribuan_2($pengamatan_tanah['P']);
      }
    }
  }
?>
                        <td class="text-right" style="color:<?php echo $color; ?>;padding-top:5px;padding-bottom:5px;">
                          <?php echo $value; ?>
                        </td>
                      </tr>
                      <tr>
                        <td style="padding-top:5px;padding-bottom:5px;">K (> 0.38 me)</td>
<?php
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
    $color = "#000000";
    $value = "-";
  }
  else{
    if($pengamatan_tanah['K'] == 0){
      $color = "#000000";
      $value = angka_ribuan_2($pengamatan_tanah['K']);
    }
    else{
      if($pengamatan_tanah['K'] >= 0.38){
        $color = "#0000FF";
        $value = angka_ribuan_2($pengamatan_tanah['K']);
      }
      else{
        $color = "#FF0000";
        $value = angka_ribuan_2($pengamatan_tanah['K']);
      }
    }
  }
?>
                        <td class="text-right" style="color:<?php echo $color; ?>;padding-top:5px;padding-bottom:5px;">
                          <?php echo $value; ?>
                        </td>
                      </tr>
                      <tr>
                        <td style="padding-top:5px;padding-bottom:5px;">Ca (> 0.5 me)</td>
<?php
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
    $color = "#000000";
    $value = "-";
  }
  else{
    if($pengamatan_tanah['Ca'] == 0){
      $color = "#000000";
      $value = angka_ribuan_2($pengamatan_tanah['Ca']);
    }
    else{
      if($pengamatan_tanah['Ca'] >= 0.5){
        $color = "#0000FF";
        $value = angka_ribuan_2($pengamatan_tanah['Ca']);
      }
      else{
        $color = "#FF0000";
        $value = angka_ribuan_2($pengamatan_tanah['Ca']);
      }
    }
  }
?>
                        <td class="text-right" style="color:<?php echo $color; ?>;padding-top:5px;padding-bottom:5px;">
                          <?php echo $value; ?>
                        </td>
                      </tr>
                      <tr>
                        <td style="padding-top:5px;padding-bottom:5px;">Mg (> 0.42 me)</td>
<?php
  if(substr($produksi['status'], 2, 2) == "BB" || substr($produksi['status'], 2, 2) == "BK"){
    $color = "#000000";
    $value = "-";
  }
  else{
    if($pengamatan_tanah['Mg'] == 0){
      $color = "#000000";
      $value = angka_ribuan_2($pengamatan_tanah['P']);
    }
    else{
      if($pengamatan_tanah['Mg'] >= 0.42){
        $color = "#0000FF";
        $value = angka_ribuan_2($pengamatan_tanah['Mg']);
      }
      else{
        $color = "#FF0000";
        $value = angka_ribuan_2($pengamatan_tanah['Mg']);
      }
    }
  }
?>
                        <td class="text-right" style="color:<?php echo $color; ?>;padding-top:5px;padding-bottom:5px;">
                          <?php echo $value; ?>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-7">
            <div class="row mb-1">
              <div class="col-lg-12 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-header py-0 text-center" style="background-color:#75229F;">
                    <span style="color:white;font-size:14px;"><b>Timeline Land Preparation</b></span>
                  </div>
                  <div class="card-body" style="padding:0;">
                    <div class="table-responsive">
                      <table class="table_hpp" style="font-weight:bold;">
                        <tr style="background-color:#75229F;" class="text-center">
                          <td rowspan="2" style="color:white;">Tanggal</td>
                          <td rowspan="2" style="color:white;">Aktivitas</td>
                          <td colspan="2" style="color:white;">Penarik</td>
                          <td colspan="2" style="color:white;">Implement</td>
                        </tr>
                        <tr style="background-color:#75229F;" class="text-center">
                          <td style="color:white;">Jenis</td>
                          <td style="color:white;">Biaya</td>
                          <td style="color:white;">Jenis</td>
                          <td style="color:white;">Biaya</td>
                        </tr>
                        <tr>
<?php
  if(substr($produksi['status'], 2, 2) == 'SC'){
?>
                          <td style="padding-top:5px;padding-bottom:5px;" class="text-center">-</td>
                          <td style="padding-top:5px;padding-bottom:5px;">Siap Bongkar</td>
                          <td style="padding-top:5px;padding-bottom:5px;" colspan="5">&nbsp;</td>
<?php
  }
  else{
?>
                          <td style="padding-top:5px;padding-bottom:5px;" class="text-center"><?php echo format_tgl($histori_lokasi_bk['tgl_perubahan_status']); ?></td>
                          <td style="padding-top:5px;padding-bottom:5px;">Siap Bongkar</td>
                          <td style="padding-top:5px;padding-bottom:5px;" colspan="5">&nbsp;</td>
<?php
  }
?>
                        </tr>
<!-- Land Preparation Start -->
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
                                <td style="padding-top:5px;padding-bottom:5px;" class="text-center"><?php echo format_tgl($tl->tgl_realisasi); ?></td>
                                <td style="padding-top:5px;padding-bottom:5px;"><?php echo $tl->jenis.' '.$no; ?></td>
                                <td style="padding-top:5px;padding-bottom:5px;font-size:9px;"><?php echo $tl->bahan_alat_desc; ?></td>
                                <td style="padding-top:5px;padding-bottom:5px;" class="text-right"><?php echo angka_ribuan($biaya_tl1 / $luas); ?></td>
                                <td style="padding-top:5px;padding-bottom:5px;" colspan="2">&nbsp;</td>
                              </tr>
<?php
      }
      else{
?>
                              <tr id='tr_landprep_<?php echo $jenis.$i; ?>'>
                                <td style="padding-top:5px;padding-bottom:5px;" class="text-center"><?php echo format_tgl($tl->tgl_realisasi); ?></td>
                                <td style="padding-top:5px;padding-bottom:5px;"><?php echo $tl->jenis.' '.$no; ?></td>
                                <td style="padding-top:5px;padding-bottom:5px;font-size:9px;"><?php echo $tl->bahan_alat_desc; ?></td>
                                <td style="padding-top:5px;padding-bottom:5px;" class="text-right"><?php echo angka_ribuan($biaya_tl1 / $luas); ?></td>
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
                                <td style="padding-top:5px;padding-bottom:5px;font-size:9px;"><?php echo $tl->bahan_alat_desc; ?></td>
                                <td style="padding-top:5px;padding-bottom:5px;" class="text-right"><?php echo angka_ribuan($biaya_tl2 / $luas); ?></td>
                              </tr>
<?php
      $total_biaya_implement += $tl->biaya_realisasi;
    }
  }
  if($jalan_saluran['tgl_realisasi'] != NULL){
?>
                        <tr>
                          <td style="padding-top:5px;padding-bottom:5px;" class="text-center"><?php echo format_tgl($jalan_saluran['tgl_realisasi']); ?></td>
                          <td style="padding-top:5px;padding-bottom:5px;"><?php echo $jalan_saluran['category']; ?></td>
                          <td style="padding-top:5px;padding-bottom:5px;" colspan="5">&nbsp;</td>
                        </tr>
<?php
  }
?>
<!-- Land Preparation Finish -->
                        <tr>
<?php
  if(substr($produksi['status'], 2, 2) == 'SC'){
?>
                          <td style="padding-top:5px;padding-bottom:5px;" class="text-center">-</td>
                          <td style="padding-top:5px;padding-bottom:5px;">Siap Tanam</td>
                          <td style="padding-top:5px;padding-bottom:5px;" colspan="5">&nbsp;</td>
<?php
  }
  else{
?>
                          <td style="padding-top:5px;padding-bottom:5px;" class="text-center"><?php echo format_tgl($histori_lokasi_st['tgl_perubahan_status']); ?></td>
                          <td style="padding-top:5px;padding-bottom:5px;">Siap Tanam</td>
                          <td style="padding-top:5px;padding-bottom:5px;" colspan="5">&nbsp;</td>
<?php
  }
?>
                        </tr>
                        <tr style="background-color:#75229F;">
                          <td style="color:white;padding-top:5px;padding-bottom:5px;" colspan="3"><b>Total Biaya</b></td>
                          <td style="color:white;padding-top:5px;padding-bottom:5px;" class="text-right"><b><?php echo angka_ribuan($total_biaya_penarik / $luas); ?></b></td>
                          <td style="color:white;padding-top:5px;padding-bottom:5px;">&nbsp;</td>
                          <td style="color:white;padding-top:5px;padding-bottom:5px;" class="text-right" colspan="2"><b><?php echo angka_ribuan($total_biaya_implement / $luas); ?></b></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mb-1">
              <div class="col-lg-6">
                <table class="table_hpp" style="font-weight:bold;">
                  <tr>
                    <td style="padding-top:5px;padding-bottom:5px;">Charge</td>
                    <td style="padding-top:5px;padding-bottom:5px;" class="text-right"><?php echo angka_ribuan($total_charge['charge']['total'] / $luas); ?></td>
                    <td style="padding-top:5px;padding-bottom:5px;">Labour</td>
                    <td style="padding-top:5px;padding-bottom:5px;" class="text-right"><?php echo angka_ribuan($total_charge['material']['total'] / $luas); ?></td>
                  </tr>
                  <tr>
                    <td style="padding-top:5px;padding-bottom:5px;">Material</td>
                    <td style="padding-top:5px;padding-bottom:5px;" class="text-right"><?php echo angka_ribuan($total_charge['labour']['total'] / $luas); ?></td>
                    <td style="padding-top:5px;padding-bottom:5px;">Others</td>
                    <td style="padding-top:5px;padding-bottom:5px;" class="text-right"><?php echo angka_ribuan($total_charge['others']['total'] / $luas); ?></td>
                  </tr>
<?php
  $lp_varian_cost = ($element_cost_real['ZN01']) - ($total_charge['charge']['total'] + $total_charge['labour']['total'] + $total_charge['material']['total'] + $total_charge['others']['total']);
?>
                  <tr>
                    <td style="padding-top:5px;padding-bottom:5px;" colspan="2">Varian (KOB1)</td>
                    <td style="padding-top:5px;padding-bottom:5px;" colspan="2" class="text-right"><?php echo angka_ribuan($lp_varian_cost / $luas); ?></td>
                  </tr>
                  <tr style="background-color:#75229F;">
                    <td style="padding-top:5px;padding-bottom:5px;color:white;" colspan="2">Total Land Preparation</td>
                    <td style="padding-top:5px;padding-bottom:5px;color:white;" colspan="2" class="text-right"><?php echo angka_ribuan(($total_charge['charge']['total'] + $total_charge['labour']['total'] + $total_charge['material']['total'] + $total_charge['others']['total'] + $lp_varian_cost) / $luas); ?></td>
                  </tr>
                </table>
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
</script>
