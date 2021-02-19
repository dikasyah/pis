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
      <a class="nav-link p-1" href="/PIS/HPP_Total_Lokasi/lokasi?page=HOME&lokasi=<?php echo $produksi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Dashboard</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/HPP_Total_Lokasi/lokasi?page=GALO&lokasi=<?php echo $produksi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Gallery</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/HPP_Total_Lokasi/lokasi?page=DSPK&lokasi=<?php echo $produksi['lokasi']; ?>">
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
      <a class="nav-link p-1" href="/PIS/HPP_Total_Lokasi/lokasi?page=CTLP&lokasi=<?php echo $produksi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Land Preparation</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/HPP_Total_Lokasi/lokasi?page=CTP1&lokasi=<?php echo $produksi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Observation</span></a>
    </li>
    <li class="nav-item active">
      <a class="nav-link p-1" href="#">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Plant Maintenance</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/HPP_Total_Lokasi/lokasi?page=CTP3&lokasi=<?php echo $produksi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Irrigation</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/HPP_Total_Lokasi/lokasi?page=CTPR&lokasi=<?php echo $produksi['lokasi']; ?>">
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
              <a href="/PIS/WIP_PM_Dashboard/plantation_group?pg=<?php echo $produksi['pg']; ?>"><?php echo $produksi['pg']; ?></a> -
              <a href="/PIS/WIP_PM_Dashboard/wilayah?wilayah=<?php echo $produksi['wilayah']; ?>"><?php echo $produksi['wilayah']; ?></a> -
              <?php echo $produksi['lokasi']; ?> -
              <?php echo $material; ?>
            </b></span>
            <span class="d-sm-none" style="color:black;font-size:12px;"><b>
              <a href="/PIS/WIP_PM_Dashboard/plantation_group?pg=<?php echo $produksi['pg']; ?>"><?php echo $produksi['pg']; ?></a> -
              <a href="/PIS/WIP_PM_Dashboard/wilayah?wilayah=<?php echo $produksi['wilayah']; ?>"><?php echo $produksi['wilayah']; ?></a> -
              <?php echo $produksi['lokasi']; ?> -
              <?php echo $material; ?>
            </b></span>
          </div>
        </form>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

          <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="/PIS/HPP_Total_Lokasi/lokasi?lokasi=<?php echo $produksi['lokasi']; ?>&page=<?php echo $page; ?>" role="button" aria-expanded="false">
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
              <a class="dropdown-item" href="/PIS/Dashboard/profile">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400 small"></i>
                Profile
              </a>
              <a class="dropdown-item" href="/PIS/Dashboard/main_menu">
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
  if($produksi['tgl_awal_perawatan'] == NULL){
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
  if($produksi['status'] == "NSBB" || $produksi['status'] == "NSBK"){
    echo "-";
  }
  else{
    echo $umur;
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

        <div class="row mb-2">
          <div class="col-lg-3">
            <div class="row mb-2">
              <div class="col-lg-12 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-header py-0 text-center" style="background-color:#75229F;font-size:14px;">
                    <span style="color:white;"><b>Material</b></span>
                  </div>
                  <div class="card-body" style="padding:0;background-color:#9944CC;">
                    <br />
                    <select class="form-control select" name="select_material" id="select_material" onchange="javascript:pindah_material();" data-live-search="true" style="color:black;font-family:'Lucida Console'">
                      <option value="0" style="color:black;">Semua Material</option>
<?php
  foreach ($material_all as $aa) {
    if($material == $aa->material){
?>
                      <option value="<?php echo $aa->material; ?>" selected><?php echo $aa->category." - ".$aa->material." (".$aa->code.")"; ?></option>
<?php
    }
    else{
?>
                      <option value="<?php echo $aa->material; ?>"><?php echo $aa->category." - ".$aa->material." (".$aa->code.")"; ?></option>
<?php
    }
  }
?>
                    </select>
                    <br />
                  </div>
                </div>
              </div>
            </div>

            <div class="row mb-2">
              <div class="col-lg-12 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-header py-0 text-center" style="background-color:#75229F;">
                    <span style="color:white;font-size:14px;"><b>Quantity Per Umur</b></span>
                  </div>
                  <div class="card-body" style="padding:0;">
                    <table class="table_hpp" style="font-weight:bold;">
                      <tr style="background-color:#75229F;">
                        <td class="text-center" style="color:white;">Umur</td>
                        <td class="text-center" style="color:white;">Kg/Ha</td>
                        <td class="text-center" style="color:white;">Total</td>
                      </tr>
                      <tr>
                        <td class="text-center">1</td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B1'] / $produksi['luas']); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B1']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">2</td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B2'] / $produksi['luas']); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B2']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">3</td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B3'] / $produksi['luas']); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B3']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">4</td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B4'] / $produksi['luas']); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B4']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">5</td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B5'] / $produksi['luas']); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B5']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">6</td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B6'] / $produksi['luas']); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B6']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">7</td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B7'] / $produksi['luas']); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B7']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">8</td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B8'] / $produksi['luas']); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B8']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">9</td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B9'] / $produksi['luas']); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B9']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">10</td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B10'] / $produksi['luas']); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B10']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">11</td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B11'] / $produksi['luas']); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B11']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">12</td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B12'] / $produksi['luas']); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B12']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">13</td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B13'] / $produksi['luas']); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B13']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">14</td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B14'] / $produksi['luas']); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B14']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">15</td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B15'] / $produksi['luas']); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B15']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">16</td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B16'] / $produksi['luas']); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B16']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">17</td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B17'] / $produksi['luas']); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B17']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">18</td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B18'] / $produksi['luas']); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B18']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">19</td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B19'] / $produksi['luas']); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B19']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">20</td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B20'] / $produksi['luas']); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B20']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">21</td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B21'] / $produksi['luas']); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B21']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">22</td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B22'] / $produksi['luas']); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B22']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">23</td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B23'] / $produksi['luas']); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B23']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">24</td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B24'] / $produksi['luas']); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($unsur_real['B24']); ?></td>
                      </tr>
                      <tr style="background-color:#75229F;">
                        <td class="text-center" style="color:white;">Jumlah</td>
                        <td class="text-right" style="color:white;"><?php echo angka_ribuan_2($jumlah_unsur / $produksi['luas']); ?></td>
                        <td class="text-right" style="color:white;"><?php echo angka_ribuan_2($jumlah_unsur); ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-9 p-1" style="overflow-x:auto;">
            <div class="card shadow" style="width:100%;">
              <div class="card-body" style="padding:0;">
                <table class="table_hpp">
                  <thead>
                    <tr class="text-center" style="background-color:#75229F;font-weight:bold;font-size:12px;">
                      <td style="color:white;">SPK</td>
                      <td style="color:white;width:80px;" class="absorbing-column">Tanggal</td>
                      <!-- <td>Code Activity</td>
                      <td>Desc Activity</td> -->
                      <td style="color:white;">Status</td>
                      <td style="color:white;">Umur</td>
                      <td style="color:white;">Jenis Data</td>
                      <td style="color:white;">Code Activity</td>
                      <td style="color:white;">Desc Activity</td>
                      <td style="color:white;">Quantity</td>
                      <td style="color:white;">Hasil Efektif</td>
                    </tr>
                  </thead>
                  <tbody>
<?php
  if($detil_spk != NULL){
    foreach ($detil_spk as $spk) {
?>
                    <tr style="font-weight:bold;font-size:11px;">
                      <td class="text-center"><?php echo $spk->SPK; ?></td>
                      <td class="text-right"><?php echo format_tgl($spk->tgl); ?></td>
                      <!-- <td class="text-center"><?php echo $spk->code_activity; ?></td>
                      <td><?php echo $spk->desc_activity; ?></td> -->
                      <td class="text-center"><?php echo $spk->status; ?></td>
                      <td class="text-center"><?php echo $spk->umur; ?></td>
                      <td><?php echo $spk->jenis_data; ?></td>
                      <td class="text-center"><?php echo $spk->code_activity; ?></td>
                      <td><?php echo $spk->desc_activity; ?></td>
                      <td class="text-right"><?php echo angka_ribuan_2($spk->resource); ?></td>
                      <td class="text-right"><?php echo $spk->hasil_efektif; ?></td>
                    </tr>
<?php
    }
  }
  else{
?>
                    <tr style="font-weight:bold;font-size:11px;">
                      <td colspan="9" class="text-center">Empty</td>
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
        <a class="btn btn-primary" href="/PIS/dashboard/logout">Logout</a>
      </div>
    </div>
  </div>
</div>
<script>
  function pindah_material(){
    var code_material = $("#select_material").val();
    window.location.href="/PIS/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&code="+code_material+"&page=<?php echo $page; ?>&subpage=SPMA";
  }
  window.onload = function(){
		var ctx_group_cost = document.getElementById('diagram_group_cost').getContext('2d');
		window.myBar = new Chart(ctx_group_cost, config_group_cost);
	};
</script>
