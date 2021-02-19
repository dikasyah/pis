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

    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/HPP_Total_Lokasi/lokasi?page=CTP1&lokasi=<?php echo $produksi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Observation</span></a>
    </li>
    <li class="nav-item active">
      <a class="nav-link p-1" href="#">
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
              Plant Maintenance
            </b></span>
            <span class="d-sm-none" style="color:black;font-size:12px;"><b>
              <a href="/PIS/index.php/HPP_Total_Dashboard/plantation_group?pg=<?php echo $produksi['pg']; ?>"><?php echo $produksi['pg']; ?></a> -
              <a href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=<?php echo $produksi['wilayah']; ?>"><?php echo $produksi['wilayah']; ?></a> -
              <?php echo $produksi['lokasi']; ?> -
              Plant Maintenance
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
          <div class="col-lg-6">
            <div class="row mb-1">
              <div class="col-lg-12 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-header py-0 text-center" style="background-color:#75229F;">
                    <span style="color:white;font-size:14px;"><b>Fertilizer</b></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mb-1">
              <div class="col-lg-5">
                <div class="row">
                  <div class="col-lg-12 p-1">
                    <div class="card shadow" style="width:100%;">
                      <div class="card-body" style="padding:0;">
                        <table class="table_hpp" style="font-weight:bold;">
                          <tr class="text-center" style="background-color:#75229F;font-weight:bold;">
                            <td style="color:white;" colspan="2">Type</td>
                            <td style="color:white;">Budget</td>
                            <td style="color:white;">Realization</td>
                          </tr>
                          <tr>
  <?php
    if($std_material['Urea'] >= ($real_fertilizer['Urea'] / $luas)){
      $color_std = "#32CD32";
      $color_real = "#32CD32";
    }
    else{
      $color_std = "#FF0000";
      $color_real = "#FF0000";
    }
  ?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Urea&page=<?php echo $page; ?>&subpage=SPMA">Urea</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Urea']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_fertilizer['Urea'] / $luas)); ?></td>
                          </tr>
                          <tr>
  <?php
    if($std_material['Za'] >= ($real_fertilizer['Za'] / $luas)){
      $color_std = "#32CD32";
      $color_real = "#32CD32";
    }
    else{
      $color_std = "#FF0000";
      $color_real = "#FF0000";
    }
  ?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Za&page=<?php echo $page; ?>&subpage=SPMA">Za</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Za']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_fertilizer['Za'] / $luas)); ?></td>
                          </tr>
                          <tr>
  <?php
    if($std_material['K2SO4'] >= ($real_fertilizer['K2SO4'] / $luas)){
      $color_std = "#32CD32";
      $color_real = "#32CD32";
    }
    else{
      $color_std = "#FF0000";
      $color_real = "#FF0000";
    }
  ?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=K2SO4&page=<?php echo $page; ?>&subpage=SPMA">K2SO4</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['K2SO4']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_fertilizer['K2SO4'] / $luas)); ?></td>
                          </tr>
                          <tr>
  <?php
    if($std_material['KCL'] >= ($real_fertilizer['KCL'] / $luas)){
      $color_std = "#32CD32";
      $color_real = "#32CD32";
    }
    else{
      $color_std = "#FF0000";
      $color_real = "#FF0000";
    }
  ?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=KCL&page=<?php echo $page; ?>&subpage=SPMA">KCL</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['KCL']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_fertilizer['KCL'] / $luas)); ?></td>
                          </tr>
                          <tr>
  <?php
    if($std_material['TSP'] >= ($real_fertilizer['TSP'] / $luas)){
      $color_std = "#32CD32";
      $color_real = "#32CD32";
    }
    else{
      $color_std = "#FF0000";
      $color_real = "#FF0000";
    }
  ?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=TSP&page=<?php echo $page; ?>&subpage=SPMA">TSP</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['TSP']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_fertilizer['TSP'] / $luas)); ?></td>
                          </tr>
                          <tr>
  <?php
    if($std_material['DAP'] >= ($real_fertilizer['DAP'] / $luas)){
      $color_std = "#32CD32";
      $color_real = "#32CD32";
    }
    else{
      $color_std = "#FF0000";
      $color_real = "#FF0000";
    }
  ?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=DAP&page=<?php echo $page; ?>&subpage=SPMA">DAP</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['DAP']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_fertilizer['DAP'] / $luas)); ?></td>
                          </tr>
                          <tr>
  <?php
    if($std_material['MgSO4'] >= ($real_fertilizer['MgSO4'] / $luas)){
      $color_std = "#32CD32";
      $color_real = "#32CD32";
    }
    else{
      $color_std = "#FF0000";
      $color_real = "#FF0000";
    }
  ?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=MgSO4&page=<?php echo $page; ?>&subpage=SPMA">MgSO4</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['MgSO4']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_fertilizer['MgSO4'] / $luas)); ?></td>
                          </tr>
                          <tr>
  <?php
    if($std_material['Kieserite'] >= ($real_fertilizer['Kieserite'] / $luas)){
      $color_std = "#32CD32";
      $color_real = "#32CD32";
    }
    else{
      $color_std = "#FF0000";
      $color_real = "#FF0000";
    }
  ?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Kieserite&page=<?php echo $page; ?>&subpage=SPMA">Kieserite</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Kieserite']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_fertilizer['Kieserite'] / $luas)); ?></td>
                          </tr>
                          <tr>
  <?php
    if($std_material['FeSO4'] >= ($real_fertilizer['FeSO4'] / $luas)){
      $color_std = "#32CD32";
      $color_real = "#32CD32";
    }
    else{
      $color_std = "#FF0000";
      $color_real = "#FF0000";
    }
  ?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=FeSO4&page=<?php echo $page; ?>&subpage=SPMA">FeSO4</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['FeSO4']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_fertilizer['FeSO4'] / $luas)); ?></td>
                          </tr>
                          <tr>
  <?php
    if($std_material['ZnSO4'] >= ($real_fertilizer['ZnSO4'] / $luas)){
      $color_std = "#32CD32";
      $color_real = "#32CD32";
    }
    else{
      $color_std = "#FF0000";
      $color_real = "#FF0000";
    }
  ?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=ZnSO4&page=<?php echo $page; ?>&subpage=SPMA">ZnSO4</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['ZnSO4']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_fertilizer['ZnSO4'] / $luas)); ?></td>
                          </tr>
                          <tr>
  <?php
    if($std_material['Dolomite'] >= ($real_fertilizer['Dolomite'] / $luas)){
      $color_std = "#32CD32";
      $color_real = "#32CD32";
    }
    else{
      $color_std = "#FF0000";
      $color_real = "#FF0000";
    }
  ?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Dolomite&page=<?php echo $page; ?>&subpage=SPMA">Dolomite</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Dolomite']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_fertilizer['Dolomite'] / $luas)); ?></td>
                          </tr>
                          <tr>
  <?php
    if($std_material['Gypsum'] >= ($real_fertilizer['Gypsum'] / $luas)){
      $color_std = "#32CD32";
      $color_real = "#32CD32";
    }
    else{
      $color_std = "#FF0000";
      $color_real = "#FF0000";
    }
  ?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Gypsum&page=<?php echo $page; ?>&subpage=SPMA">Gypsum</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Gypsum']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_fertilizer['Gypsum'] / $luas)); ?></td>
                          </tr>
                          <tr>
  <?php
    if($std_material['CuSO4'] >= ($real_fertilizer['CuSO4'] / $luas)){
      $color_std = "#32CD32";
      $color_real = "#32CD32";
    }
    else{
      $color_std = "#FF0000";
      $color_real = "#FF0000";
    }
  ?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=CuSO4&page=<?php echo $page; ?>&subpage=SPMA">CuSO4</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['CuSO4']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_fertilizer['CuSO4'] / $luas)); ?></td>
                          </tr>
                          <tr>
  <?php
    if($std_material['Borax'] >= ($real_fertilizer['Borax'] / $luas)){
      $color_std = "#32CD32";
      $color_real = "#32CD32";
    }
    else{
      $color_std = "#FF0000";
      $color_real = "#FF0000";
    }
  ?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Borax&page=<?php echo $page; ?>&subpage=SPMA">Borax</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Borax']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_fertilizer['Borax'] / $luas)); ?></td>
                          </tr>
                          <tr>
  <?php
    if($std_material['LOB'] >= ($real_fertilizer['LOB'] / $luas)){
      $color_std = "#32CD32";
      $color_real = "#32CD32";
    }
    else{
      $color_std = "#FF0000";
      $color_real = "#FF0000";
    }
  ?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=LOB&page=<?php echo $page; ?>&subpage=SPMA">LOB</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['LOB']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_fertilizer['LOB'] / $luas)); ?></td>
                          </tr>
                          <tr>
<?php
  if($std_material['CaCl2'] >= ($real_fertilizer['CaCl2'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=CaCl2&page=<?php echo $page; ?>&subpage=SPMA">CaCl2</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['CaCl2']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_fertilizer['CaCl2'] / $luas)); ?></td>
                          </tr>
                          <tr>
<?php
  if($std_material['Calcibor'] >= ($real_fertilizer['Calcibor'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Calcibor&page=<?php echo $page; ?>&subpage=SPMA">Calcibor</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Calcibor']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_fertilizer['Calcibor'] / $luas)); ?></td>
                          </tr>
                          <tr>
<?php
  if($std_material['Kompos'] >= ($real_fertilizer['Kompos'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Kompos&page=<?php echo $page; ?>&subpage=SPMA">Kompos</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Kompos']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_fertilizer['Kompos'] / $luas)); ?></td>
                          </tr>
                          <tr>
<?php
  if($std_material['Belerang'] >= ($real_fertilizer['Belerang'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Belerang&page=<?php echo $page; ?>&subpage=SPMA">Belerang</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Belerang']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_fertilizer['Belerang'] / $luas)); ?></td>
                          </tr>
                          <tr>
<?php
  if($std_material['Kieserite_G'] >= ($real_fertilizer['Kieserite_G'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Kieserite_G&page=<?php echo $page; ?>&subpage=SPMA">Kieserite G</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Kieserite_G']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_fertilizer['Kieserite_G'] / $luas)); ?></td>
                          </tr>
                          <tr>
<?php
  if($std_material['NPK'] >= ($real_fertilizer['NPK'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=NPK&page=<?php echo $page; ?>&subpage=SPMA">NPK</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['NPK']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_fertilizer['NPK'] / $luas)); ?></td>
                          </tr>
                          <tr>
<?php
  if($std_material['Petro_Cas'] >= ($real_fertilizer['Petro_Cas'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Petro_Cas&page=<?php echo $page; ?>&subpage=SPMA">Petro Cas</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Petro_Cas']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_fertilizer['Petro_Cas'] / $luas)); ?></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-12 p-1">
                    <div class="card shadow" style="width:100%;">
                      <div class="card-header py-0 text-center" style="background-color:#75229F;">
                        <span style="color:white;font-size:14px;"><b>Kandungan Unsur (Kg/Ton)</b></span>
                      </div>
                      <div class="card-body" style="padding:0;">
                        <table class="table_hpp">
                          <tr class="text-center" style="background-color:#75229F;font-weight:bold;">
                            <td style="color:white;" width='25%'>Nitrogen</td>
                            <td style="color:white;" width='25%'>Sulfur</td>
                            <td style="color:white;" width='25%'>K2O</td>
                            <td style="color:white;" width='25%'>P2O5</td>
                          </tr>
                          <tr class="text-center" style="font-weight:bold;">
                            <td style="padding:10px"><?php echo angka_ribuan_2((($real_fertilizer['Urea'] * 0.46) + ($real_fertilizer['Za'] * 0.21) + ($real_fertilizer['DAP'] * 0.18)) / $tonase); ?></td>
                            <td style="padding:10px"><?php echo angka_ribuan_2((($real_fertilizer['Za'] * 0.24) + ($real_fertilizer['K2SO4'] * 0.18) + ($real_fertilizer['MgSO4'] * 0.23) + ($real_fertilizer['Kieserite'] * 0.14) + ($real_fertilizer['Belerang'] * 1) + ($real_fertilizer['Kieserite_G'] * 0.14)) / $tonase); ?></td>
                            <td style="padding:10px"><?php echo angka_ribuan_2((($real_fertilizer['K2SO4'] * 0.5) + ($real_fertilizer['KCL'] * 0.6)) / $tonase); ?></td>
                            <td style="padding:10px"><?php echo angka_ribuan_2((($real_fertilizer['TSP'] * 0.46) + ($real_fertilizer['DAP'] * 0.46)) / $tonase); ?></td>
                          </tr>
                          <tr class="text-center" style="background-color:#75229F;font-weight:bold;">
                            <td style="color:white;" width='25%'>MgO</td>
                            <td style="color:white;" width='25%'>Zn</td>
                            <td style="color:white;" width='25%'>CaO</td>
                            <td style="color:white;" width='25%'>B2O3</td>
                          </tr>
                          <tr class="text-center" style="font-weight:bold;">
                            <td style="padding:10px"><?php echo angka_ribuan_2((($real_fertilizer['MgSO4'] * 0.16) + ($real_fertilizer['Kieserite'] * 0.27) + ($real_fertilizer['Dolomite'] * 0.18) + ($real_fertilizer['Kieserite_G'] * 0.27)) / $tonase); ?></td>
                            <td style="padding:10px"><?php echo angka_ribuan_2((($real_fertilizer['ZnSO4'] * 0.21)) / $tonase); ?></td>
                            <td style="padding:10px"><?php echo angka_ribuan_2((($real_fertilizer['Dolomite'] * 0.39) + ($real_fertilizer['CaCl2'] * 0.3)) / $tonase); ?></td>
                            <td style="padding:10px"><?php echo angka_ribuan_2((($real_fertilizer['Borax'] * 0.48)) / $tonase); ?></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-7 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-header py-0 text-center" style="background-color:#75229F;">
                    <span style="color:white;font-size:14px;"><b>Spray Mekanis Fertilizer</b></span>
                  </div>
                  <div class="card-body" style="padding:0;">
                    <table class="table_hpp" style="font-weight:bold;">
                      <tbody>
<?php
  if($spray_mekanis != NULL){
    $jarak_hari = 0;
    $jumlah = 0;
    foreach ($spray_mekanis as $sm) {
      $jumlah++;
      if($jarak_hari != 0){
        $jarak_hari = round((strtotime($sm->tgl_realisasi) - strtotime($jarak_hari)) / 86400);
      }
      else{
        $jarak_hari = '-';
      }
?>
                        <tr>
                          <td style="color:black;padding-top:1px;padding-bottom:1px;" align="right">
                            <a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&tgl=<?php echo $sm->tgl_realisasi; ?>&page=<?php echo $page; ?>&subpage=SPSP"><?php echo format_tgl($sm->tgl_realisasi); ?></a>
                          </td>
                          <td class="text-right" style="color:black;padding-top:1px;padding-bottom:1px;" width="40px">| Rp.</td>
                          <td class="text-right" style="color:black;padding-top:1px;padding-bottom:1px;"><?php echo angka_ribuan($sm->total / $luas); ?></td>
                          <td class="text-center" style="color:black;padding-top:1px;padding-bottom:1px;"><?php echo $jarak_hari." Hari"; ?></td>
                        </tr>
<?php
      $jarak_hari = $sm->tgl_realisasi;
    }
  }
  else{
?>
                        <tr>
                          <td class="text-center">Empty</td>
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
          <div class="col-lg-6">
            <div class="row mb-1">
              <div class="col-lg-12 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-header py-0 text-center" style="background-color:#75229F;">
                    <span style="color:white;font-size:14px;"><b>Herbicide</b></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mb-1">
              <div class="col-lg-5 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-body" style="padding:0;">
                    <table class="table_hpp" style="font-weight:bold;">
                      <tr class="text-center" style="background-color:#75229F;">
                        <td style="color:white;" colspan="2">Type</td>
                        <td style="color:white;">Budget</td>
                        <td style="color:white;">Realization</td>
                      </tr>
                      <tr>
<?php
  if($std_material['Bromacyl'] >= ($real_herbicide['Bromacyl'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Bromacyl&page=<?php echo $page; ?>&subpage=SPMA">Bromacyl</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Bromacyl']); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_herbicide['Bromacyl'] / $luas)); ?></td>
                      </tr>
                      <tr>
<?php
  if($std_material['Diuron'] >= ($real_herbicide['Diuron'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Diuron&page=<?php echo $page; ?>&subpage=SPMA">Diuron</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Diuron']); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_herbicide['Diuron'] / $luas)); ?></td>
                      </tr>
                      <tr>
<?php
  if($std_material['Glyphosate'] >= ($real_herbicide['Glyphosate'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Glyphosate&page=<?php echo $page; ?>&subpage=SPMA">Glyphosate</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Glyphosate']); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_herbicide['Glyphosate'] / $luas)); ?></td>
                      </tr>
                      <tr>
<?php
  if($std_material['Quizalofop'] >= ($real_herbicide['Quizalofop'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Quizalofop&page=<?php echo $page; ?>&subpage=SPMA">Quizalofop</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Quizalofop']); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_herbicide['Quizalofop'] / $luas)); ?></td>
                      </tr>
                      <tr>
<?php
  if($std_material['Ametrine'] >= ($real_herbicide['Ametrine'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Ametrine&page=<?php echo $page; ?>&subpage=SPMA">Ametrine</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Ametrine']); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_herbicide['Ametrine'] / $luas)); ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
              <div class="col-lg-7 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-header py-0 text-center" style="background-color:#75229F;">
                    <span style="color:white;font-size:14px;"><b>Booster Herbicide</b></span>
                  </div>
                  <div class="card-body" style="padding:0;">
                    <table class="table_hpp" style="font-weight:bold;">
                      <tbody>
<?php
  if($booster != NULL){
    $jarak_hari = 0;
    $jumlah = 0;
    foreach ($booster as $sm) {
      $jumlah++;
      if($jarak_hari != 0){
        $jarak_hari = round((strtotime($sm->tgl_realisasi) - strtotime($jarak_hari)) / 86400);
      }
      else{
        $jarak_hari = '-';
      }
?>
                        <tr>
                          <td style="color:black;padding-top:1px;padding-bottom:1px;" align="right">
                            <a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&tgl=<?php echo $sm->tgl_realisasi; ?>&page=<?php echo $page; ?>&subpage=SPBO"><?php echo format_tgl($sm->tgl_realisasi); ?></a>
                          </td>
                          <td class="text-right" style="color:black;padding-top:1px;padding-bottom:1px;" width="40px">| Rp.</td>
                          <td class="text-right" style="color:black;padding-top:1px;padding-bottom:1px;"><?php echo angka_ribuan($sm->total / $luas); ?></td>
                          <td style="color:black;padding-top:1px;padding-bottom:1px;" align="right"><?php echo $jarak_hari." H"; ?></td>
                        </tr>
<?php
      $jarak_hari = $sm->tgl_realisasi;
    }
  }
  else{
?>
                        <tr>
                          <td class="text-center">Empty</td>
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

            <div class="row mb-1">
              <div class="col-lg-6">
                <div class="row mb-1">
                  <div class="col-lg-12 p-1">
                    <div class="card shadow" style="width:100%;">
                      <div class="card-header py-0 text-center" style="background-color:#75229F;">
                        <span style="color:white;font-size:14px;"><b>Insecticide</b></span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row mb-1">
                  <div class="col-lg-12 p-1">
                    <div class="card shadow" style="width:100%;">
                      <div class="card-body" style="padding:0;">
                        <table class="table_hpp" style="font-weight:bold;">
                          <tr class="text-center" style="background-color:#75229F;">
                            <td style="color:white;" colspan="2">Type</td>
                            <td style="color:white;">Budget</td>
                            <td style="color:white;">Realization</td>
                          </tr>
                          <tr>
<?php
  if($std_material['Tekasi'] >= ($real_ppc['Tekasi'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Tekasi&page=<?php echo $page; ?>&subpage=SPMA">Tekasi</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Tekasi']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_ppc['Tekasi'] / $luas)); ?></td>
                          </tr>
                          <tr>
<?php
  if($std_material['Tekila'] >= ($real_ppc['Tekila'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Tekila&page=<?php echo $page; ?>&subpage=SPMA">Tekila</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Tekila']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_ppc['Tekila'] / $luas)); ?></td>
                          </tr>
                          <tr>
<?php
  if($std_material['Chlorpyrifos'] >= ($real_ppc['Chlorpyrifos'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Chlorpyrifos&page=<?php echo $page; ?>&subpage=SPMA">Chlorpyrifos</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Chlorpyrifos']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_ppc['Chlorpyrifos'] / $luas)); ?></td>
                          </tr>
                          <tr>
<?php
  if($std_material['Sidazinon'] >= ($real_ppc['Sidazinon'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Sidazinon&page=<?php echo $page; ?>&subpage=SPMA">Sidazinon</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Sidazinon']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_ppc['Sidazinon'] / $luas)); ?></td>
                          </tr>
                          <tr>
<?php
  if($std_material['Propoxur'] >= ($real_ppc['Propoxur'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Propoxur&page=<?php echo $page; ?>&subpage=SPMA">Propoxur</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Propoxur']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_ppc['Propoxur'] / $luas)); ?></td>
                          </tr>
                          <tr>
<?php
  if($std_material['Cypermethrin'] >= ($real_ppc['Cypermethrin'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Cypermethrin&page=<?php echo $page; ?>&subpage=SPMA">Cypermethrin</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Cypermethrin']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_ppc['Cypermethrin'] / $luas)); ?></td>
                          </tr>
                          <tr>
<?php
  if($std_material['Bifentrin_EC'] >= ($real_ppc['Bifentrin_EC'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Bifentrin_EC&page=<?php echo $page; ?>&subpage=SPMA">Bifentrin EC</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Bifentrin_EC']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_ppc['Bifentrin_EC'] / $luas)); ?></td>
                          </tr>
                          <tr>
<?php
  if($std_material['Bifentrin_G'] >= ($real_ppc['Bifentrin_G'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Bifentrin G&page=<?php echo $page; ?>&subpage=SPMA">Bifentrin G</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Bifentrin_G']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_ppc['Bifentrin_G'] / $luas)); ?></td>
                          </tr>
                          <tr>
<?php
  if($std_material['BPMC'] >= ($real_ppc['BPMC'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=BPMC&page=<?php echo $page; ?>&subpage=SPMA">BPMC</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['BPMC']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_ppc['BPMC'] / $luas)); ?></td>
                          </tr>
                          <tr>
<?php
  if($std_material['Clorpyrifos'] >= ($real_ppc['Clorpyrifos'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Clorpyrifos&page=<?php echo $page; ?>&subpage=SPMA">Clorpyrifos</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Clorpyrifos']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_ppc['Clorpyrifos'] / $luas)); ?></td>
                          </tr>
                          <tr>
<?php
  if($std_material['Abamectin'] >= ($real_ppc['Abamectin'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Abamectin&page=<?php echo $page; ?>&subpage=SPMA">Abamectin</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Abamectin']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_ppc['Abamectin'] / $luas)); ?></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="row mb-1">
                  <div class="col-lg-12 p-1">
                    <div class="card shadow" style="width:100%;">
                      <div class="card-header py-0 text-center" style="background-color:#75229F;">
                        <span style="color:white;font-size:14px;"><b>Fungicide</b></span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row mb-1">
                  <div class="col-lg-12 p-1">
                    <div class="card shadow" style="width:100%;">
                      <div class="card-body" style="padding:0;">
                        <table class="table_hpp" style="font-weight:bold;">
                          <tr class="text-center" style="background-color:#75229F;font-weight:bold;">
                            <td style="color:white;" colspan="2">Type</td>
                            <td style="color:white;">Budget</td>
                            <td style="color:white;">Realization</td>
                          </tr>
                          <tr>
<?php
  if($std_material['Fosetil'] >= ($real_ppc['Fosetil'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Fosetil&page=<?php echo $page; ?>&subpage=SPMA">Fosetil</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Fosetil']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_ppc['Fosetil'] / $luas)); ?></td>
                          </tr>
                          <tr>
<?php
  if($std_material['Metalaxil'] >= ($real_ppc['Metalaxil'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Metalaxil&page=<?php echo $page; ?>&subpage=SPMA">Metalaxil</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Metalaxil']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_ppc['Metalaxil'] / $luas)); ?></td>
                          </tr>
                          <tr>
<?php
  if($std_material['Propiconazole'] >= ($real_ppc['Propiconazole'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Propiconazole&page=<?php echo $page; ?>&subpage=SPMA">Propiconazole</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Propiconazole']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_ppc['Propiconazole'] / $luas)); ?></td>
                          </tr>
                          <tr>
<?php
  if($std_material['Prochloraz'] >= ($real_ppc['Prochloraz'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Prochloraz&page=<?php echo $page; ?>&subpage=SPMA">Prochloraz</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Prochloraz']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_ppc['Prochloraz'] / $luas)); ?></td>
                          </tr>
                          <tr>
<?php
  if($std_material['Mankozeb'] >= ($real_ppc['Mankozeb'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Mankozeb&page=<?php echo $page; ?>&subpage=SPMA">Mankozeb</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Mankozeb']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_ppc['Mankozeb'] / $luas)); ?></td>
                          </tr>
                          <tr>
<?php
  if($std_material['Folirfos'] >= ($real_ppc['Folirfos'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Folirfos&page=<?php echo $page; ?>&subpage=SPMA">Folirfos</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Folirfos']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_ppc['Folirfos'] / $luas)); ?></td>
                          </tr>
                          <tr>
<?php
  if($std_material['H3PO3'] >= ($real_ppc['H3PO3'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=H3PO3&page=<?php echo $page; ?>&subpage=SPMA">H3PO3</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['H3PO3']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_ppc['H3PO3'] / $luas)); ?></td>
                          </tr>
                          <tr>
<?php
  if($std_material['Detazeb'] >= ($real_ppc['Detazeb'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Detazeb&page=<?php echo $page; ?>&subpage=SPMA">Detazeb</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Detazeb']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_ppc['Detazeb'] / $luas)); ?></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="row mb-1">
              <div class="col-lg-6">
                <div class="row mb-1">
                  <div class="col-lg-12 p-1">
                    <div class="card shadow" style="width:100%;">
                      <div class="card-header py-0 text-center" style="background-color:#75229F;">
                        <span style="color:white;font-size:14px;"><b>Others</b></span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row mb-1">
                  <div class="col-lg-12 p-1">
                    <div class="card shadow" style="width:100%;">
                      <div class="card-body" style="padding:0;">
                        <table class="table_hpp" style="font-weight:bold;">
                          <tr class="text-center" style="background-color:#75229F;font-weight:bold;">
                            <td style="color:white;" colspan="2">Type</td>
                            <td style="color:white;">Budget</td>
                            <td style="color:white;">Realization</td>
                          </tr>
                          <tr>
<?php
  if($std_material['Indostick'] >= ($real_others['Indostick'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Indostick&page=<?php echo $page; ?>&subpage=SPMA">Indostick</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Indostick']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_others['Indostick'] / $luas)); ?></td>
                          </tr>
                          <tr>
<?php
  if($std_material['Organosilicon'] >= ($real_others['Organosilicon'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Organosilicon&page=<?php echo $page; ?>&subpage=SPMA">Organosilicon</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Organosilicon']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_others['Organosilicon'] / $luas)); ?></td>
                          </tr>
                          <tr>
<?php
  if($std_material['Ethylene'] >= ($real_others['Ethylene'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Ethylene&page=<?php echo $page; ?>&subpage=SPMA">Ethylene</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Ethylene']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_others['Ethylene'] / $luas)); ?></td>
                          </tr>
                          <tr>
<?php
  if($std_material['Ethepon'] >= ($real_others['Ethepon'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Ethepon&page=<?php echo $page; ?>&subpage=SPMA">Ethepon</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Ethepon']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_others['Ethepon'] / $luas)); ?></td>
                          </tr>
                          <tr>
<?php
  if($std_material['Kaolin'] >= ($real_others['Kaolin'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                            <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                            <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code=Kaolin&page=<?php echo $page; ?>&subpage=SPMA">Kaolin</a></td>
                            <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Kaolin']); ?></td>
                            <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_others['Kaolin'] / $luas)); ?></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="row mb-1">
                  <div class="col-lg-12 p-1">
                    <div class="card shadow" style="width:100%;">
                      <div class="card-header py-0 text-center" style="background-color:#75229F;">
                        <span style="color:white;font-size:14px;"><b>Forcing</b></span>
                      </div>
                      <div class="card-body" style="padding:0;">
                        <table class="table_hpp text-center" style="font-weight:bold;">
                          <tr>
                            <td>Forcing</td>
                            <td><?php if($forcing['forcing'] != NULL) echo $forcing['forcing']; else echo "0" ?> Kali</td>
                          </tr>
                          <tr>
                            <td>Reforcing</td>
                            <td><?php if($forcing['reforcing'] != NULL) echo $forcing['reforcing']; else echo "0" ?> Kali </td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row mb-1">
                  <div class="col-lg-12 p-1">
                    <div class="card shadow" style="width:100%;">
                      <div class="card-header py-0 text-center" style="background-color:#75229F;">
                        <span style="color:white;font-size:14px;"><b>Weeding Manual</b></span>
                      </div>
                      <div class="card-body" style="padding:0;">
                        <table class="table_hpp">
                          <tr class="text-center">
                            <td style="padding-top:10px;padding-bottom:10px;">
                              <h3><?php echo ceil($weeding_manual['hasil_efektif'] / $luas); ?></h3>
                            </td>
                            <td style="padding-top:10px;padding-bottom:10px;">
                              <h3><?php if($weeding_manual['hasil_efektif'] != NULL) echo angka_ribuan($weeding_manual['biaya_realisasi'] / ($luas * ceil($weeding_manual['hasil_efektif'] / $luas))); else echo "-"; ?></h3>
                            </td>
                          </tr>
                          <tr class="text-center" style="background-color:#75229F;font-weight:bold;">
                            <td style="color:white;">Kali</td>
                            <td style="color:white;">Rp/Ha per Application</td>
                          </tr>
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
      window.location.href="/PIS/index.php/HPP_Total_Lokasi/lokasi?page=<?php echo $page; ?>&lokasi="+lokasi+"&category="+category+"&type="+type;
    }
    else{
      var tgl_panen = $('#tgl_panen').val();
      window.location.href="/PIS/index.php/HPP_Total_Lokasi/lokasi?page=<?php echo $page; ?>&lokasi="+lokasi+"&category="+category+"&type="+type+"&tgl_panen="+tgl_panen;
    }
  }
</script>
