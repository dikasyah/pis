<!-- Page Wrapper -->
<div id="wrapper">
  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" style="height:100px;">
      <div class="sidebar-brand-icon">
        <img src="/PIS/assets/images/logo-apk.png" height="75px"/>
      </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
      <a class="nav-link p-1" href="#">
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
      <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=CTSP&lokasi=<?php echo $lokasi['lokasi']; ?>">
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
              Dashboard
            </b></span>
            <span class="d-sm-none" style="color:black;font-size:12px;"><b>
              <a href="/PIS/index.php/WIP_PM_Dashboard/plantation_group?pg=<?php echo $pg_wil['pg']; ?>"><?php echo $pg_wil['pg']; ?></a> -
              <a href="/PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=<?php echo $pg_wil['wilayah']; ?>"><?php echo $pg_wil['wilayah']; ?></a> -
              <?php echo $lokasi['lokasi']; ?> -
              Dashboard
            </b></span>
          </div>
        </form>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

          <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="/PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=<?php echo $pg_wil['wilayah']; ?>" role="button" aria-expanded="false">
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
          <div class="col-lg-12 p-1">
            <div class="card shadow" style="width:100%;">
              <div class="card-body" style="padding:0;">
                <div id="peta" style="width:100%;height:350px;"></div>
              </div>
            </div>
          </div>
        </div>

        <div class="row mb-2">
          <div class="col-lg-7">
            <div class="row mb-1">
              <div class="col-lg-12 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-body" style="padding:0;">
                    <select style="color:black;" class="form-control select" name="select_element_cost" id="select_element_cost" onchange="javascript:select_main_filter();">
<?php
  $option_element_cost1 = "";
  $option_element_cost2 = "";
  switch ($element_cost) {
    case 'Ha':
      $option_element_cost1 = "selected";
    break;
    case 'Kg':
      $option_element_cost2 = "selected";
    break;
  }
?>
                      <option value="Ha" style="color:black;" <?php echo $option_element_cost1; ?>>Rp/Ha</option>
                      <option value="Kg" style="color:black;" <?php echo $option_element_cost2; ?>>Rp/Kg</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mb-1">
              <div class="col-lg-12 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-header py-0 text-center" style="background-color:#008080;">
                    <span style="color:white;font-size:14px;"><b>Raport</b></span>
                  </div>
                  <div class="card-body" style="padding:0;">
<?php
  if($element_cost == "Ha"){
    $pembagi = $luas;
  }
  else{
    $pembagi = $tonase * 1000;
  }
  $status = substr($lokasi['status'], 0, 4);
?>
                    <table class="table_pm">
                      <tr class="text-center" style="background-color:#008080;font-weight:bold;">
                        <td width="40%" style="color:white;padding-top:10px;padding-bottom:10px;">Element Cost</td>
                        <td width="12%" style="color:white;padding-top:10px;padding-bottom:10px;">BPP</td>
                        <td width="12%" style="color:white;padding-top:10px;padding-bottom:10px;">SBT</td>
                        <td width="12%" style="color:white;padding-top:10px;padding-bottom:10px;">R+F Ops</td>
                        <td width="12%" style="color:white;padding-top:10px;padding-bottom:10px;">Real SBT</td>
                        <td width="12%" style="color:white;padding-top:10px;padding-bottom:10px;">Real Ops</td>
                        <td width="12%" style="color:white;padding-top:10px;padding-bottom:10px;">Forecast Ops</td>
                      </tr>
<?php
  $total_bpp = 0;
  $total_rfb = 0;
  $total_rf = 0;
  $total_r = 0;
  $total_f = 0;
  $total_sbt_t = 0;
  $total_sbt = 0;
  foreach ($element_cost_all as $ec) {
    if($element_cost == "Ha"){
      if($cek_panen == 1){
        if($status == "NSFC"){
          $bpp = $ec->BPP_NSFC_ha;
        }
        else{
          $bpp = $ec->BPP_NSSC_ha;
        }
      }
      else{
        if($status == "NSFC"){
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
        if($status == "NSFC"){
          $bpp = $ec->BPP_NSFC_kg;
        }
        else{
          $bpp = $ec->BPP_NSSC_kg;
        }
      }
      else{
        if($status == "NSFC"){
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
    $total_sbt_t += $SBTCostTotal[$ec->code];
    $total_sbt += $SBTCost[$ec->code];
?>
                      <tr style="font-weight:bold;">
                        <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&ec=<?php echo $ec->code; ?>&page=<?php echo $page; ?>&subpage=SPEC"><?php echo $ec->nama; ?></a></td>
                        <td class="text-right" style="color:black;padding-top:2px;padding-bottom:2px;"><?php echo angka_ribuan($bpp / $pembagi); ?></td>
                        <td class="text-right" style="color:black;padding-top:2px;padding-bottom:2px;"><?php echo angka_ribuan(($SBTCostTotal[$ec->code] * $luas) / $pembagi); ?></td>
                        <td class="text-right" style="color:black;padding-top:2px;padding-bottom:2px;"><?php echo angka_ribuan($real_rf / $pembagi); ?></td>
                        <td class="text-right" style="color:black;padding-top:2px;padding-bottom:2px;"><?php echo angka_ribuan(($SBTCost[$ec->code] * $luas) / $pembagi); ?></td>
                        <td class="text-right" style="color:black;padding-top:2px;padding-bottom:2px;"><?php echo angka_ribuan($element_cost_real[$ec->code]['total'] / $pembagi); ?></td>
                        <td class="text-right" style="color:black;padding-top:2px;padding-bottom:2px;"><?php echo angka_ribuan(($real_rf - $element_cost_real[$ec->code]['total']) / $pembagi); ?></td>
                      </tr>
<?php
  }
?>
                      <tr style="background-color:#008080;font-weight:bold;">
                        <td class="text-center" style="color:white;padding-top:10px;padding-bottom:10px;">Total</td>
                        <td class="text-right" style="color:white;padding-top:10px;padding-bottom:10px;"><?php echo angka_ribuan($total_bpp / $pembagi); ?></td>
                        <td class="text-right" style="color:white;padding-top:10px;padding-bottom:10px;"><?php echo angka_ribuan(($total_sbt_t * $luas) / $pembagi); ?></td>
                        <td class="text-right" style="color:white;padding-top:10px;padding-bottom:10px;"><?php echo angka_ribuan($total_rf / $pembagi); ?></td>
                        <td class="text-right" style="color:white;padding-top:10px;padding-bottom:10px;"><?php echo angka_ribuan(($total_sbt * $luas) / $pembagi); ?></td>
                        <td class="text-right" style="color:white;padding-top:10px;padding-bottom:10px;"><?php echo angka_ribuan($total_r / $pembagi); ?></td>
                        <td class="text-right" style="color:white;padding-top:10px;padding-bottom:10px;"><?php echo angka_ribuan($total_f / $pembagi); ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mb-1">
              <div class="col-lg-3 p-1">
                <div class="row">
                  <div class="col-lg-12 col-xs-6">
                    <div class="card shadow" style="width:100%;">
                      <div class="card-body" style="padding:0;">
                        <table class="text-center" width="100%" style="font-weight:bold;font-size:12px;">
                          <tbody>
                            <tr>
                              <td style="color:white;background-color:#008080;">Total Cost Impact</td>
                            </tr>
                            <tr>
                              <td style="padding-top:5px;padding-bottom:5px;color:black;"><?php echo angka_ribuan(($total_rf - $total_bpp) / $pembagi); ?><br>Rp/<?php echo $element_cost; ?></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-lg-12 col-xs-6">
                    <div class="card shadow" style="width:100%;">
                      <div class="card-body" style="padding:0;">
                        <table class="text-center" width="100%" style="font-weight:bold;font-size:12px;">
                          <tbody>
                            <tr>
                              <td style="background-color:#008080;color:white;">Category</td>
                              <td style="background-color:#008080;color:white;">% Cost</td>
                            </tr>
                            <tr>
<?php
  if(floor((($total_rf - $total_bpp) / $total_bpp) * 100) <= -2){
    $category = "Excellent";
    $category_color = "#32CD32";
  }
  else if(floor((($total_rf - $total_bpp) / $total_bpp) * 100) <= 2){
    $category = "Good";
    $category_color = "#FFFF00";
  }
  else{
    $category = "Poor";
    $category_color = "#FF0000";
  }
?>
                              <td style="padding-top:5px;padding-bottom:5px;color:black;background-color:<?php echo $category_color; ?>;"><?php echo $category; ?></td>
                              <td style="padding-top:5px;padding-bottom:5px;color:black;"><?php echo (floor((($total_rf - $total_bpp) / $total_bpp) * 100)); ?> %</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-3 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-body" style="padding:0;">
                    <canvas id="diagram_p_gc" height="150px"></canvas>
<?php
  $p_gc_labour = round(($group_cost_total['Labour'] / $group_cost_total['Total']) * 100);
  $p_gc_charge = round(($group_cost_total['Charge'] / $group_cost_total['Total']) * 100);
  $p_gc_material = round(($group_cost_total['Material'] / $group_cost_total['Total']) * 100);
  $PGCSeed = round(($group_cost_total['Seed'] / $group_cost_total['Total']) * 100);
  $p_gc = $p_gc_labour.', '.$p_gc_charge.', '.$p_gc_material.', '.$PGCSeed;
?>
<script>
  var config_p_gc = {
    type: 'doughnut',
    data: {
      datasets: [{
        data: [
          <?php echo $p_gc; ?>
        ],
        backgroundColor: [
          '#4169E1',
          '#FF8C00',
          '#228B22',
          '#FF0000',
        ],
        label: 'Cost and Production'
      }],
      labels: [
        'Labour',
        'Charge',
        'Material',
        'Seed',
      ]
      },
      options: {
      responsive: true,
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
      legend: {
        display: false,
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

              <div class="col-lg-6 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-body" style="padding:0;">
<?php
  if($lokasi['tgl_forcing_realisasi'] != NULL){
    $tgl_forcing = $lokasi['tgl_forcing_realisasi'];
  }
  else{
    $tgl_forcing = $tgl_rencana_forcing;
  }

  if($biaya_forcing['biaya_forcing_real'] <= $biaya_forcing['biaya_forcing_std']){
    $forcing_impact_color = "#32CD32";
  }
  else{
    $forcing_impact_color = "#FF0000";
  }

  $jarak_forcing = ceil(((strtotime($std_forcing_panen['tgl_forcing']) - strtotime($tgl_forcing)) / 86400) / 30.4583333333333);
  if($jarak_forcing == 0){
    $accuracy_forcing = "On The Track";
  }
  else if($jarak_forcing < 0){
    $accuracy_forcing = "Mundur ".abs($jarak_forcing)." Bulan";
  }
  else{
    $accuracy_forcing = "Maju ".abs($jarak_forcing)." Bulan";
  }
?>
                    <table class="table_pm text-center" style="font-weight:bold;font-size:12px;">
                      <tr>
                        <td style="color:white;background-color:#008080;">Forcing Accuracy</td>
                      </tr>
                      <tr>
                        <td style="padding-top:5px;padding-bottom:5px;"><?php echo $accuracy_forcing; ?></td>
                      </tr>
                      <tr>
                        <td style="color:white;background-color:#008080;">Forcing Accuracy Cost Impact</td>
                      </tr>
                      <tr>
                        <td style="padding-top:5px;padding-bottom:5px;color:<?php echo $forcing_impact_color; ?>;"><?php echo angka_ribuan(abs(($biaya_forcing['biaya_forcing_real'] - $biaya_forcing['biaya_forcing_std']) / $luas)); ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-5">
            <div class="row mb-1">
              <div class="col-lg-12 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-body" style="padding:0;">
                    <select style="color:black;" class="form-control select" name="select_group_cost" id="select_group_cost" onchange="javascript:select_main_filter();">
<?php
  $option_group_cost1 = "";
  $option_group_cost2 = "";
  $option_group_cost3 = "";
  $option_group_cost4 = "";
  switch ($group_cost) {
    case 'Labour':
      $option_group_cost1 = "selected";
    break;
    case 'Charge':
      $option_group_cost2 = "selected";
    break;
    case 'Material':
      $option_group_cost3 = "selected";
    break;
    case 'Total':
      $option_group_cost4 = "selected";
    break;
  }
?>
                      <option value="Labour" style="color:black;" <?php echo $option_group_cost1; ?>>Labour</option>
                      <option value="Charge" style="color:black;" <?php echo $option_group_cost2; ?>>Charge</option>
                      <option value="Material" style="color:black;" <?php echo $option_group_cost3; ?>>Material</option>
                      <option value="Total" style="color:black;" <?php echo $option_group_cost4; ?>>Total</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mb-1">
              <div class="col-lg-12 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-header py-0 text-center" style="background-color:#008080;">
                    <span style="color:white;font-size:14px;"><b>Biaya per Umur</b></span>
                  </div>
                    <div class="card-body" style="padding:0;padding-bottom:5px;">
                      <canvas id="diagram_group_cost"></canvas>
<?php
  $a = 1;
  $real = "";
  $std = "";
  $real_acc = 0;
  $std_acc = 0;
  $max = 0;
  $max2 = 0;
  while ($a <= 21) {
    if($a == 1){
      $real_acc = $group_cost_biaya['B'.$a];
      $std_acc = $group_cost_std[$a];
      $real = round($real_acc / $luas);
      $std = round($std_acc);
      $max = $group_cost_biaya['B'.$a];
      $max2 = $group_cost_std[$a];
    }
    else{
      $real_acc += $group_cost_biaya['B'.$a];
      $std_acc = $group_cost_std[$a];
      $real .= ", ".round($real_acc / $luas);
      $std .= ", ".round($std_acc);
      if($max < $real_acc){
        $max = $real_acc;
      }
      if($max2 < $std_acc){
        $max2 = $std_acc;
      }
    }
    $a++;
  }

  $date1 = strtotime($tgl_rencana_forcing) / 86400;
  $date2 = strtotime($lokasi['tgl_mulai_rawat']) / 86400;
  $umur_f = ceil(($date1-$date2) / 30.4583333333333);
  $i_f = 1;
  $bu_f = '';

  if($max <= $max2){
    $max = $max2;
  }

  while($i_f <= 21){
    if($i_f == 1){
      if($i_f == $umur_f){
        $bu_f .= $max / $luas;
      }
      else{
        $bu_f .= '0';
      }
    }
    else if($i_f == $umur_f){
      $bu_f .= ", ".($max / $luas);
    }
    else{
      $bu_f .= ', 0';
    }
    $i_f++;
  }
?>
<script>
  var config_group_cost = {
    type: 'bar',
    data: {
      labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '>20'],
      datasets: [{
        type: 'line',
        label: 'SBT',
        borderColor: '#FF0000',
        borderWidth: 2,
        pointRadius: 3,
        fill: false,
        data: [
          <?php echo $std; ?>
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
        label: 'Realisasi',
        borderColor: '#0000FF',
        backgroundColor : '#0000FF',
        borderWidth: 0,
        pointRadius: 0,
        fill: true,
        data: [
          <?php echo $real; ?>
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
            min: 0
          },
          ticks: {
            min: 0,
            callback: function(label, index, labels) {
              return (label / 1000000) + "M";
            }
          },
          scaleLabel: {
              display: true,
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
            </div>

            <div class="row mb-2">
              <div class="col-lg-12 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-body" style="padding:0;">
                    <table class="table_pm">
                      <tr class="text-center" style="font-weight:bold;background-color:#008080">
                        <td style="color:white;padding-top:5px;padding-bottom:5px;">Description</td>
                        <td style="color:white;padding-top:5px;padding-bottom:5px;">Labour</td>
                        <td style="color:white;padding-top:5px;padding-bottom:5px;">Charge</td>
                        <td style="color:white;padding-top:5px;padding-bottom:5px;">Material</td>
                        <td style="color:white;padding-top:5px;padding-bottom:5px;">Seed</td>
                        <td style="color:white;padding-top:5px;padding-bottom:5px;">Variance</td>
                        <td style="color:white;padding-top:5px;padding-bottom:5px;">Total</td>
                      </tr>
                      <tr class="text-center" style="font-weight:bold;">
                        <td style="padding-top:10px;padding-bottom:10px;color:black;">Real</td>
<?php
  if(($group_cost_std_total['Labour'] * $luas) >= $group_cost_total['Labour']){
    $color = "#32CD32";
  }
  else{
    $color = "#FF0000";
  }
?>
                        <td style="padding-top:10px;padding-bottom:10px;color:<?php echo $color; ?>;"><?php echo angka_ribuan($group_cost_total['Labour'] / $luas); ?></td>
<?php
  if(($group_cost_std_total['Charge'] * $luas) >= $group_cost_total['Charge']){
    $color = "#32CD32";
  }
  else{
    $color = "#FF0000";
  }
?>
                        <td style="padding-top:10px;padding-bottom:10px;color:<?php echo $color; ?>;"><?php echo angka_ribuan($group_cost_total['Charge'] / $luas); ?></td>
<?php
  if(($group_cost_std_total['Material'] * $luas) >= $group_cost_total['Material']){
    $color = "#32CD32";
  }
  else{
    $color = "#FF0000";
  }
?>
                        <td style="padding-top:10px;padding-bottom:10px;color:<?php echo $color; ?>;"><?php echo angka_ribuan($group_cost_total['Material'] / $luas); ?></td>
<?php
  if(($group_cost_std_total['Seed'] * $luas) >= $group_cost_total['Seed']){
    $color = "#32CD32";
  }
  else{
    $color = "#FF0000";
  }
?>
                        <td style="padding-top:10px;padding-bottom:10px;color:<?php echo $color; ?>;"><?php echo angka_ribuan($group_cost_total['Seed'] / $luas); ?></td>
<?php
    if(($total_r - $group_cost_total['Total']) <= 0){
      $color = "#32CD32";
    }
    else{
      $color = "#FF0000";
    }
?>
                        <td style="padding-top:10px;padding-bottom:10px;color:<?php echo $color; ?>;"><?php echo angka_ribuan(($total_r - $group_cost_total['Total']) / $luas); ?></td>
<?php
    if(($group_cost_total['Total'] + ($total_r - $group_cost_total['Total'])) <= (($group_cost_std_total['Labour'] + $group_cost_std_total['Charge'] + $group_cost_std_total['Material'] + 0) * $luas)){
      $color = "#32CD32";
    }
    else{
      $color = "#FF0000";
    }
?>
                        <td style="padding-top:10px;padding-bottom:10px;color:<?php echo $color; ?>;"><?php echo angka_ribuan(($group_cost_total['Total'] + ($total_r - $group_cost_total['Total'])) / $luas); ?></td>
                      </tr>
                      <tr class="text-center" style="font-weight:bold;background-color:#008080">
                        <td style="color:white;padding-top:5px;padding-bottom:5px;">SBT</td>
                        <td style="color:white;padding-top:5px;padding-bottom:5px;"><?php echo angka_ribuan($group_cost_std_total['Labour']); ?></td>
                        <td style="color:white;padding-top:5px;padding-bottom:5px;"><?php echo angka_ribuan($group_cost_std_total['Charge']); ?></td>
                        <td style="color:white;padding-top:5px;padding-bottom:5px;"><?php echo angka_ribuan($group_cost_std_total['Material']); ?></td>
                        <td style="color:white;padding-top:5px;padding-bottom:5px;"><?php echo angka_ribuan($group_cost_std_total['Seed']); ?></td>
                        <td style="color:white;padding-top:5px;padding-bottom:5px;"><?php echo angka_ribuan(0 / $luas); ?></td>
                        <td style="color:white;padding-top:5px;padding-bottom:5px;"><?php echo angka_ribuan(($group_cost_std_total['Labour'] + $group_cost_std_total['Charge'] + $group_cost_std_total['Material'] + $group_cost_std_total['Seed'])); ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
<script>
<?php
$longlat = explode(", ", $coordinate['longlat']);
?>
function initMap() {
var map = new google.maps.Map(document.getElementById('peta'), {
  center:new google.maps.LatLng(<?php echo $longlat[1]; ?>, <?php echo $longlat[0]; ?>),
  zoom:15,
  mapTypeId: google.maps.MapTypeId.SATELLITE
});

<?php
switch ($coordinate['performance']) {
  case 'Excellent':
    $warna_isi = "#32CD32";
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
    var info<?php echo $coordinate['lokasi']; ?> = "<div class='row mb-1'>" +
        "<div class='col-lg-12 text-center'>" +
          "<h3 style='color:black;'><?php echo $coordinate['lokasi']; ?></h3>" +
        "</div>" +
      "</div>" +
      "<div class='row mb-1'>" +
        "<div class='col-lg-12'>" +
          "<table width='100%' class='table_pm'>" +
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
              "<td style='color:<?php echo $warna_isi; ?>;padding-top:1px;padding-bottom:1px;'><b><?php if($coordinate['performance'] == NULL) echo '-'; else echo $coordinate['performance']; ?></b></td>" +
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
        "</div>" +
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
      select_main_filter();
    }
  }
  function select_main_filter(){
    var lokasi = $('#lokasi').val();
    var element_cost = $('#select_element_cost').val();
    var group_cost = $('#select_group_cost').val();

    window.location.href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=<?php echo $page; ?>&lokasi="+lokasi+"&element_cost="+element_cost+"&group_cost="+group_cost;
  }
  window.onload = function(){
    var ctx_group_cost = document.getElementById('diagram_group_cost').getContext('2d');
    window.myBar = new Chart(ctx_group_cost, config_group_cost);
    var ctx_p_gc = document.getElementById('diagram_p_gc').getContext('2d');
    window.myBar = new Chart(ctx_p_gc, config_p_gc);
  }
</script>
