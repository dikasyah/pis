<!-- Page Wrapper -->
<div id="wrapper">
  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" style="height:100px;">
      <div class="sidebar-brand-icon">
        <img src="/PIS/index.php/assets/images/logo-apk.png" height="75px"/>
      </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=HOME&lokasi=<?php echo $lokasi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Dashboard</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=GALO&lokasi=<?php echo $lokasi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Gallery Lokasi</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=DSPK&lokasi=<?php echo $lokasi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Detail SPK</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=RSBT&lokasi=<?php echo $lokasi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Real SBT</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Heading -->
    <div class="sidebar-heading text-center">
      Category
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=BKST&lokasi=<?php echo $lokasi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">BK - ST</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed p-1" href="#" data-toggle="collapse" data-target="#collapseFertilizer" aria-expanded="true" aria-controls="collapseFertilizer">
        <i class="fas fa-fw fa-cog"></i>
        <span class="text-white-600 small">Fertilizer</span>
      </a>
      <div id="collapseFertilizer" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white p-1 collapse-inner rounded">
          <a class="collapse-item small p-1" href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=CTF1&lokasi=<?php echo $lokasi['lokasi']; ?>">Summary</a>
          <a class="collapse-item small p-1" href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=CTF2&lokasi=<?php echo $lokasi['lokasi']; ?>">Activity</a>
          <a class="collapse-item small p-1" href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=CTF3&lokasi=<?php echo $lokasi['lokasi']; ?>">Growth</a>
        </div>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed p-1" href="#" data-toggle="collapse" data-target="#collapseHerbicide" aria-expanded="true" aria-controls="collapseHerbicide">
        <i class="fas fa-fw fa-cog"></i>
        <span class="text-white-600 small">Herbicide</span>
      </a>
      <div id="collapseHerbicide" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white p-1 collapse-inner rounded">
          <a class="collapse-item small p-1" href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=CTH1&lokasi=<?php echo $lokasi['lokasi']; ?>">Material</a>
          <a class="collapse-item small p-1" href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=CTH2&lokasi=<?php echo $lokasi['lokasi']; ?>">Booster</a>
        </div>
      </div>
    </li>

    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=CTIN&lokasi=<?php echo $lokasi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Insecticide</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=CTFU&lokasi=<?php echo $lokasi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Fungicide</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=GCSP&lokasi=<?php echo $lokasi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Springkle</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=CTHA&lokasi=<?php echo $lokasi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Harvest</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Heading -->
    <div class="sidebar-heading text-center">
      Group Cost
    </div>

    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=GCLP&lokasi=<?php echo $lokasi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Land Preparation</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=GCSE&lokasi=<?php echo $lokasi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Seedling</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=GCPT&lokasi=<?php echo $lokasi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Planting</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=GCRD&lokasi=<?php echo $lokasi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Road & Drainage</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=GCFE&lokasi=<?php echo $lokasi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Fertilization</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=GCWC&lokasi=<?php echo $lokasi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Weed Control</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=GCPL&lokasi=<?php echo $lokasi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Plant Pest Control</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=GCFO&lokasi=<?php echo $lokasi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Forcing</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=GCPH&lokasi=<?php echo $lokasi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Pre Harvesting</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=GCHA&lokasi=<?php echo $lokasi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Harvesting</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=GCOB&lokasi=<?php echo $lokasi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Observation</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=GCPS&lokasi=<?php echo $lokasi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Plant Selection</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=GCSI&lokasi=<?php echo $lokasi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Springkle / Irrigation</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=GCGU&lokasi=<?php echo $lokasi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Guard / Pull / Labour</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=GCOT&lokasi=<?php echo $lokasi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Others</span></a>
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
              <a href="/PIS/index.php/WIP_PM_Dashboard/plantation_group?pg=<?php echo $pg_wil['pg']; ?>"><?php echo $pg_wil['pg']; ?></a> -
              <a href="/PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=<?php echo $pg_wil['wilayah']; ?>"><?php echo $pg_wil['wilayah']; ?></a> -
              <?php echo $lokasi['lokasi']; ?> -
              <?php echo $material; ?>
            </b></span>
            <span class="d-sm-none" style="color:black;font-size:12px;"><b>
              <a href="/PIS/index.php/WIP_PM_Dashboard/plantation_group?pg=<?php echo $pg_wil['pg']; ?>"><?php echo $pg_wil['pg']; ?></a> -
              <a href="/PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=<?php echo $pg_wil['wilayah']; ?>"><?php echo $pg_wil['wilayah']; ?></a> -
              <?php echo $lokasi['lokasi']; ?> -
              <?php echo $material; ?>
            </b></span>
          </div>
        </form>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

          <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="/PIS/index.php/WIP_PM_Lokasi/lokasi?lokasi=<?php echo $lokasi['lokasi']; ?>&page=<?php echo $page; ?>" role="button" aria-expanded="false">
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
              <div class="card-header py-0 text-center" style="background-color:#008080;font-size:14px;">
                <span style="color:white;"><b>Location</b></span>
              </div>
              <div class="card-body" style="padding:0;height:100px;background-color:#20B2AA;">
                <br>
                <input type="text" name="lokasi" id="lokasi" class="form-control" placeholder="Lokasi" style="background-color:#20B2AA;color:black;text-align:center;font-size:25px;height:50px;" maxlength="5" value="<?php echo $lokasi['lokasi']; ?>"/>
              </div>
            </div>
          </div>

          <div class="col-lg-10 p-1">
            <div class="card shadow" style="width:100%;">
              <div class="card-header py-0 text-center" style="background-color:#008080;font-size:14px;">
                <span style="color:white;"><b>Profile <?php echo $lokasi['lokasi']; ?></b></span>
              </div>
              <div class="card-body" style="padding:0;color:black;font-size:12px;font-weight:bold;">
                <div class="row px-3">
                  <div class="col-lg-3" style="padding:5px;">
                    <div class="card-body" style="padding:5px;background-color:#20B2AA;">
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
                              <?php echo $lokasi['kebun']; ?>
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
                              <?php echo $wilayah['kasie_kebun'.substr($lokasi['kebun'], 3)]; ?>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="col-lg-3" style="padding:5px;">
                    <div class="card-body" style="padding:5px;background-color:#20B2AA;">
                      <table width="100%">
                        <tbody>
                          <tr>
                            <td width="120px">
                              Status
                            </td>
                            <td>
                              <?php echo substr($lokasi['status'], 0, 4); ?>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Varietas Bibit
                            </td>
                            <td>
<?php
  if($lokasi['bibit'] == NULL){
    if(substr($lokasi['status'], 0, 4) == "NSSC"){
      echo substr($histori_lokasi_nssc_nsfc['kode_bibit_lokasi'], 2, 3);
    }
    else{
      echo "-";
    }
  }
  else{
    echo substr($lokasi['bibit'], 2, 3);
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
  if($lokasi['bibit'] == NULL){
    if(substr($lokasi['status'], 0, 4) == "NSSC"){
      if(substr($histori_lokasi_nssc_nsfc['kode_bibit_lokasi'], 5, 1) == "C"){
        echo "CR";
      }
      else if(substr($histori_lokasi_nssc_nsfc['kode_bibit_lokasi'], 5, 1) == "S"){
        echo "SC";
      }
      else{
        echo "AN";
      }
    }
    else{
      echo "-";
    }
  }
  else{
    if(substr($lokasi['bibit'], 5, 1) == "C"){
      echo "CR";
    }
    else if(substr($lokasi['bibit'], 5, 1) == "S"){
      echo "SC";
    }
    else{
      echo "AN";
    }
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
  if($lokasi['bibit'] == NULL){
    if(substr($lokasi['status'], 0, 4) == "NSSC"){
      $kelas = substr($histori_lokasi_nssc_nsfc['kode_bibit_lokasi'], 6, 1);
      echo substr($histori_lokasi_nssc_nsfc['kode_bibit_lokasi'], 6, 1);
    }
    else{
      echo "-";
    }
  }
  else{
    $kelas = substr($lokasi['bibit'], 6, 1);
    echo substr($lokasi['bibit'], 6, 1);
  }
?>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="col-lg-3" style="padding:5px;">
                    <div class="card-body" style="padding:5px;background-color:#20B2AA;">
                      <table width="100%">
                        <tbody>
                          <tr>
                            <td width="120px">
                              Tgl Perawatan
                            </td>
                            <td>
<?php
  if(substr($lokasi['status'], 0, 4) == "NSBB" || substr($lokasi['status'], 0, 4) == "NSBK"){
    echo "-";
  }
  else{
    echo format_tgl($lokasi['tgl_mulai_rawat']);
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
  if(substr($lokasi['status'], 0, 4) == "NSBB" || substr($lokasi['status'], 0, 4) == "NSBK"){
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
  if($lokasi['tgl_forcing_realisasi'] == NULL){
    echo "-";
  }
  else{
    echo format_tgl($lokasi['tgl_forcing_realisasi']);
  }
?>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Rencana Panen
                            </td>
                            <td>
<?php
  if(substr($lokasi['status'], 0, 4) == "NSBB" || substr($lokasi['status'], 0, 4) == "NSBK"){
    echo "-";
  }
  else{
    echo format_tgl($tgl_panen);
  }
?>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="col-lg-3" style="padding:5px;">
                    <div class="card-body" style="padding:5px;background-color:#20B2AA;">
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
    echo angka_ribuan_2($lokasi['luas']);
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
  if(substr($lokasi['status'], 0, 4) == "NSBB" || substr($lokasi['status'], 0, 4) == "NSBK"){
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
  if(substr($lokasi['status'], 0, 4) == "NSBB" || substr($lokasi['status'], 0, 4) == "NSBK"){
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
  if(substr($lokasi['status'], 0, 4) == "NSBB" || substr($lokasi['status'], 0, 4) == "NSBK"){
    echo "-";
  }
  else{
    $date1 = round(strtotime($konstanta['nilai'])/86400);
    $date2 = round(strtotime($lokasi['tgl_mulai_rawat'])/86400);

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

        <div class="row mb-2">
          <div class="col-lg-3">
            <div class="row mb-2">
              <div class="col-lg-12 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-header py-0 text-center" style="background-color:#008080;font-size:14px;">
                    <span style="color:white;"><b>Material</b></span>
                  </div>
                  <div class="card-body" style="padding:0;background-color:#20B2AA;">
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
                <select class="form-control select" name="select_luas" id="select_luas" onchange="javascript:pindah_material();" data-live-search="true" style="color:black;">
<?php
  if($luas_type == 0){
    $selected_luas_1 = "selected";
    $selected_luas_2 = "";
  }
  else{
    $selected_luas_1 = "";
    $selected_luas_2 = "selected";
  }
?>
                  <option value="0" style="color:black;" <?php echo $selected_luas_1; ?>>Luas</option>
                  <option value="1" style="color:black;" <?php echo $selected_luas_2; ?>>Hasil Efektif</option>
                </select>
              </div>
            </div>

            <div class="row mb-2">
              <div class="col-lg-12 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-header py-0 text-center" style="background-color:#008080;">
                    <span style="color:white;font-size:14px;"><b>Quantity Per Umur</b></span>
                  </div>
                  <div class="card-body" style="padding:0;">
                    <table class="table_pm" style="font-weight:bold;">
                      <tr style="background-color:#008080;">
                        <td class="text-center" style="color:white;">Umur</td>
                        <td class="text-center" style="color:white;">Kg/Ha</td>
                        <td class="text-center" style="color:white;">Total</td>
                      </tr>
                      <tr>
                        <td class="text-center">1</td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['B1']); else echo angka_ribuan_2($unsur_real['B1'] / $lokasi['luas']); ?></td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['U1']); else echo angka_ribuan_2($unsur_real['B1']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">2</td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['B2']); else echo angka_ribuan_2($unsur_real['B2'] / $lokasi['luas']); ?></td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['U2']); else echo angka_ribuan_2($unsur_real['B2']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">3</td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['B3']); else echo angka_ribuan_2($unsur_real['B3'] / $lokasi['luas']); ?></td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['U3']); else echo angka_ribuan_2($unsur_real['B3']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">4</td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['B4']); else echo angka_ribuan_2($unsur_real['B4'] / $lokasi['luas']); ?></td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['U4']); else echo angka_ribuan_2($unsur_real['B4']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">5</td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['B5']); else echo angka_ribuan_2($unsur_real['B5'] / $lokasi['luas']); ?></td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['U5']); else echo angka_ribuan_2($unsur_real['B5']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">6</td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['B6']); else echo angka_ribuan_2($unsur_real['B6'] / $lokasi['luas']); ?></td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['U6']); else echo angka_ribuan_2($unsur_real['B6']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">7</td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['B7']); else echo angka_ribuan_2($unsur_real['B7'] / $lokasi['luas']); ?></td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['U7']); else echo angka_ribuan_2($unsur_real['B7']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">8</td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['B8']); else echo angka_ribuan_2($unsur_real['B8'] / $lokasi['luas']); ?></td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['U8']); else echo angka_ribuan_2($unsur_real['B8']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">9</td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['B9']); else echo angka_ribuan_2($unsur_real['B9'] / $lokasi['luas']); ?></td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['U9']); else echo angka_ribuan_2($unsur_real['B9']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">10</td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['B10']); else echo angka_ribuan_2($unsur_real['B10'] / $lokasi['luas']); ?></td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['U10']); else echo angka_ribuan_2($unsur_real['B10']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">11</td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['B11']); else echo angka_ribuan_2($unsur_real['B11'] / $lokasi['luas']); ?></td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['U11']); else echo angka_ribuan_2($unsur_real['B11']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">12</td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['B12']); else echo angka_ribuan_2($unsur_real['B12'] / $lokasi['luas']); ?></td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['U12']); else echo angka_ribuan_2($unsur_real['B12']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">13</td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['B13']); else echo angka_ribuan_2($unsur_real['B13'] / $lokasi['luas']); ?></td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['U13']); else echo angka_ribuan_2($unsur_real['B13']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">14</td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['B14']); else echo angka_ribuan_2($unsur_real['B14'] / $lokasi['luas']); ?></td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['U14']); else echo angka_ribuan_2($unsur_real['B14']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">15</td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['B15']); else echo angka_ribuan_2($unsur_real['B15'] / $lokasi['luas']); ?></td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['U15']); else echo angka_ribuan_2($unsur_real['B15']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">16</td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['B16']); else echo angka_ribuan_2($unsur_real['B16'] / $lokasi['luas']); ?></td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['U16']); else echo angka_ribuan_2($unsur_real['B16']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">17</td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['B17']); else echo angka_ribuan_2($unsur_real['B17'] / $lokasi['luas']); ?></td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['U17']); else echo angka_ribuan_2($unsur_real['B17']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">18</td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['B18']); else echo angka_ribuan_2($unsur_real['B18'] / $lokasi['luas']); ?></td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['U18']); else echo angka_ribuan_2($unsur_real['B18']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">19</td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['B19']); else echo angka_ribuan_2($unsur_real['B19'] / $lokasi['luas']); ?></td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['U19']); else echo angka_ribuan_2($unsur_real['B19']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">20</td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['B20']); else echo angka_ribuan_2($unsur_real['B20'] / $lokasi['luas']); ?></td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['U20']); else echo angka_ribuan_2($unsur_real['B20']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">21</td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['B21']); else echo angka_ribuan_2($unsur_real['B21'] / $lokasi['luas']); ?></td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['U21']); else echo angka_ribuan_2($unsur_real['B21']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">22</td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['B22']); else echo angka_ribuan_2($unsur_real['B22'] / $lokasi['luas']); ?></td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['U22']); else echo angka_ribuan_2($unsur_real['B22']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">23</td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['B23']); else echo angka_ribuan_2($unsur_real['B23'] / $lokasi['luas']); ?></td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['U23']); else echo angka_ribuan_2($unsur_real['B23']); ?></td>
                      </tr>
                      <tr>
                        <td class="text-center">24</td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['B24']); else echo angka_ribuan_2($unsur_real['B24'] / $lokasi['luas']); ?></td>
                        <td class="text-right"><?php if($luas_type != 0) echo angka_ribuan_2($unsur_real['U24']); else echo angka_ribuan_2($unsur_real['B24']); ?></td>
                      </tr>
                      <tr style="background-color:#008080;">
                        <td class="text-center" style="color:white;">Jumlah</td>
                        <td class="text-right" style="color:white;"><?php if($luas_type != 0) echo angka_ribuan_2($jumlah_unsur); else echo angka_ribuan_2($jumlah_unsur / $lokasi['luas']); ?></td>
                        <td class="text-right" style="color:white;"><?php if($luas_type != 0) echo angka_ribuan_2($jumlah_unsur_total); else echo angka_ribuan_2($jumlah_unsur); ?></td>
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
                <table class="table_pm">
                  <thead>
                    <tr class="text-center" style="background-color:#008080;font-weight:bold;font-size:12px;">
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
                      <td style="color:white;">Quantity (Qty/Ha)</td>
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
                      <td class="text-right"><?php echo angka_ribuan_2($spk->resource / $lokasi['luas']); ?></td>
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
        <a class="btn btn-primary" href="/PIS/index.php/dashboard/logout">Logout</a>
      </div>
    </div>
  </div>
</div>
<script>
  function pindah_material(){
    var code_material = $("#select_material").val();
    var luas = $("#select_luas").val();
    window.location.href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code="+code_material+"&luas="+luas+"&page=<?php echo $page; ?>&subpage=SPMA";
  }
  window.onload = function(){
		var ctx_group_cost = document.getElementById('diagram_group_cost').getContext('2d');
		window.myBar = new Chart(ctx_group_cost, config_group_cost);
	};
</script>
