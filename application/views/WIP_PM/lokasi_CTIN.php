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

      <li class="nav-item active">
        <a class="nav-link p-1" href="#">
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
                Insecticide
              </b></span>
              <span class="d-sm-none" style="color:black;font-size:12px;"><b>
                <a href="/PIS/index.php/WIP_PM_Dashboard/plantation_group?pg=<?php echo $pg_wil['pg']; ?>"><?php echo $pg_wil['pg']; ?></a> -
                <a href="/PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=<?php echo $pg_wil['wilayah']; ?>"><?php echo $pg_wil['wilayah']; ?></a> -
                <?php echo $lokasi['lokasi']; ?> -
                Insecticide
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
            <div class="col-lg-4">
              <div class="row mb-1">
                <div class="col-lg-6 p-1">
                  <div class="card shadow" style="width:100%;">
                    <div class="card-body" style="padding:0;">
                      <table class="table_pm">
                        <tr style="background-color:#008080;font-weight:bold;">
                          <td style="color:white;">Insecticide</td>
                          <td>
                            <select class="form-control select" name="select_insecticide" id="select_insecticide" onchange="javascript:select_main_filter();" data-live-search="true">
<?php
  if($insecticide == "Insecticide"){
?>
                              <option value="Insecticide" style="color:black;" selected>Insecticide</option>
<?php
  }
  else{
?>
                              <option value="Insecticide" style="color:black;" selected>Insecticide</option>
<?php
  }
  foreach ($master_material as $mm) {
    if($mm->code == $insecticide){
?>
                              <option value="<?php echo $mm->code; ?>" style="color:black;" selected><?php echo $mm->material; ?></option>
<?php
    }
    else{
?>
                              <option value="<?php echo $mm->code; ?>" style="color:black;"><?php echo $mm->material; ?></option>
<?php
    }
  }
?>
                            </select>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6 p-1">
                  <div class="card shadow" style="width:100%;">
                    <div class="card-body" style="padding:0;">
                      <table class="table_pm">
                        <tr style="background-color:#008080;font-weight:bold;">
                          <td style="color:white;">Type : </td>
                          <td>
                            <select class="form-control select" name="select_type" id="select_type" onchange="javascript:select_main_filter();">
<?php
  if($type == 1){
    $type_insecticide_1 = "selected";
    $type_insecticide_2 = "";
  }
  else{
    $type_insecticide_1 = "";
    $type_insecticide_2 = "selected";
  }
?>
                              <option value="1" style="color:black;" <?php echo $type_insecticide_1; ?>>Per-Umur</option>
                              <option value="2" style="color:black;" <?php echo $type_insecticide_2; ?>>Accumulation</option>
                            </select>
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
                    <div class="card-body" style="padding:0;">
                      <table class="table_pm">
                        <tr style="background-color:#008080;font-weight:bold;">
                          <td style="color:white;">Insecticide : </td>
                          <td>
<?php
  if($compare == 1){
    $disabled_compare = "disabled";
  }
  else{
    $disabled_compare = "";
  }
?>
                            <select class="form-control select" name="select_insecticide_2" id="select_insecticide_2" onchange="javascript:select_main_filter();" data-live-search="true" <?php echo $disabled_compare; ?>>
<?php
  foreach ($master_material as $mm) {
    if($mm->code == $insecticide_2){
?>
                              <option value="<?php echo $mm->code; ?>" style="color:black;" selected><?php echo $mm->material; ?></option>
<?php
    }
    else{
?>
                              <option value="<?php echo $mm->code; ?>" style="color:black;"><?php echo $mm->material; ?></option>
<?php
    }
  }
?>
                            </select>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6 p-1">
                  <div class="card shadow" style="width:100%;">
                    <div class="card-body" style="padding:0;">
                      <table class="table_pm">
                        <tr style="background-color:#008080;font-weight:bold;">
                          <td style="color:white;">Compare ? </td>
                          <td>
<?php
  if(isset($disabled_type_compare)){
    $disabled_type = "disabled";
  }
  else{
    $disabled_type = "";
  }
?>
                            <select class="form-control select" name="select_compare" id="select_compare" onchange="javascript:select_main_filter();" <?php echo $disabled_type; ?>>
<?php
  if($compare == 1){
    $type_compare_1 = "selected";
    $type_compare_2 = "";
  }
  else{
    $type_compare_1 = "";
    $type_compare_2 = "selected";
  }
?>
                              <option value="1" style="color:black;" <?php echo $type_compare_1; ?>>No</option>
                              <option value="2" style="color:black;" <?php echo $type_compare_2; ?>>Yes</option>
                            </select>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mb-1">
                <div class="col-lg-12 p-1">
                  <div class="card shadow" style="width:100%;">
                    <div class="card-body" style="padding:0;padding-bottom:5px;">
                      <canvas id="diagram_unsur"></canvas>
<?php
  $a = 1;
  $unsur_real = "";
  $unsur_std = "";
  $unsur_real_acc = 0;
  $unsur_std_acc = 0;
  $max = 0;
  $max2 = 0;
  while ($a <= 21) {
    if($type == 1){
      if($a == 1){
        if(isset($head_all)){
          $unsur_real = round($unsur_realisasi[$a] / $luas);
          $unsur_std = round($unsur['B'.$a] / $luas);
        }
        else{
          $unsur_real = round($unsur_realisasi[$a] / $luas);
          $unsur_std = round($unsur['B'.$a] / $luas);
        }
        $max = $unsur['B'.$a];
      }
      else{
        if(isset($unsur_realisasi[$a])){
          $unsur_real .= ", ".round($unsur_realisasi[$a] / $luas);
        }
        else{
          $unsur_real .= ", 0";
        }
        $unsur_std .= ", ".round($unsur['B'.$a] / $luas);
        if($max < $unsur['B'.$a]){
          $max = $unsur['B'.$a];
        }
      }
    }
    else{
      if($a == 1){
        $unsur_real_acc = $unsur_realisasi[$a];
        $unsur_std_acc = $unsur_budget[$a];
        $unsur_real = round($unsur_real_acc / $luas);
        $unsur_std = round($unsur_std_acc / $luas);
        $max = $unsur['B'.$a];
        $max2 = $unsur_budget[$a];
      }
      else{
        $unsur_real_acc += $unsur_realisasi[$a];
        $unsur_std_acc += $unsur_budget[$a];
        $unsur_real .= ", ".round($unsur_real_acc / $luas);
        $unsur_std .= ", ".round($unsur_std_acc / $luas);
        if($max < $unsur_real_acc){
          $max = $unsur_real_acc;
        }
        if($max2 < $unsur_std_acc){
          $max2 = $unsur_std_acc;
        }
      }
    }
    $a++;
  }

  if($max <= $max2){
    $max = $max2;
  }

  $a = 1;
  $unsur_real_2 = "";
  $unsur_std_2 = "";
  $unsur_real_acc_2 = 0;
  $unsur_std_acc_2 = 0;
  $max_2 = 0;
  $max2_2 = 0;
  while ($a <= 21) {
    if($type == 1){
      if($a == 1){
        if(isset($head_all)){
          $unsur_real_2 = round($unsur_realisasi_2[$a] / $luas);
          $unsur_std_2 = round($unsur_2['B'.$a] / $luas);
        }
        else{
          $unsur_real_2 = round($unsur_realisasi_2[$a] / $luas);
          $unsur_std_2 = round($unsur_2['B'.$a] / $luas);
        }
        $max_2 = $unsur['B'.$a];
      }
      else{
        if(isset($unsur_realisasi_2[$a])){
          $unsur_real_2 .= ", ".round($unsur_realisasi_2[$a] / $luas);
        }
        else{
          $unsur_real_2 .= ", 0";
        }
        $unsur_std_2 .= ", ".round($unsur_2['B'.$a] / $luas);
        if($max_2 < $unsur_2['B'.$a]){
          $max_2 = $unsur_2['B'.$a];
        }
      }
    }
    else{
      if($a == 1){
        $unsur_real_acc_2 = $unsur_realisasi_2[$a];
        $unsur_std_acc_2 = $unsur_budget_2[$a];
        $unsur_real_2 = round($unsur_real_acc_2 / $luas);
        $unsur_std_2 = round($unsur_std_acc_2 / $luas);
        $max_2 = $unsur_2['B'.$a];
        $max2_2 = $unsur_budget[$a];
      }
      else{
        $unsur_real_acc_2 += $unsur_realisasi_2[$a];
        $unsur_std_acc_2 += $unsur_budget_2[$a];
        $unsur_real_2 .= ", ".round($unsur_real_acc_2 / $luas);
        $unsur_std_2 .= ", ".round($unsur_std_acc_2 / $luas);
        if($max_2 < $unsur_real_acc_2){
          $max_2 = $unsur_real_acc_2;
        }
        if($max2 < $unsur_std_acc_2){
          $max2_2 = $unsur_std_acc_2;
        }
      }
    }
    $a++;
  }

  if($max_2 <= $max2_2){
    $max_2 = $max2_2;
  }

  $option_chart8 = 'Fertilizer_1';
  if($max <= $max_2 && $compare != 1){
    $max = $max_2;
    $option_chart8 = 'Fertilizer_2';
  }

  $date1 = strtotime($tgl_rencana_forcing) / 86400;
  $date2 = strtotime($lokasi['tgl_mulai_rawat']) / 86400;
  $umur_f = ceil(($date1-$date2) / 30.4583333333333);
  $i_f = 1;
  $bu_f = '';

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
<?php
  if(isset($head_all)){
    $option_chart1 = " / 1000000 + ' M'";
    $option_chart2 = "true";
  }
  else{
    $option_chart1 = "";
    $option_chart2 = "false";
  }

  if($compare != 1){
    $option_chart3 = 'true';
    $option_chart4 = "{
      type: 'line',
      label: 'STD ".$nama_2."',
      borderColor: '#800080',
      borderWidth: 2,
      pointRadius: 3,
      fill: false,
      yAxisID: 'Fertilizer_2',
      data: [
        ".$unsur_std_2."
      ]
    }, {
      type: 'line',
      label: '".$nama_2."',
      borderColor: '#008000',
      backgroundColor : '#008000',
      borderWidth: 0,
      pointRadius: 0,
      fill: false,
      yAxisID: 'Fertilizer_2',
      data: [
        ".$unsur_real_2."
      ]
    }";
    $option_chart5 = 'false';
    $option_chart6 = $nama_1;
    $option_chart7 = 'STD '.$nama_1;
  }
  else{
    $option_chart3 = 'false';
    $option_chart4 = '';
    $option_chart5 = 'true';
    $option_chart6 = "Realisasi";
    $option_chart7 = 'STD';
  }
?>
<script>
  var config_unsur = {
    type: 'bar',
    data: {
      labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '>20'],
      datasets: [{
        type: 'line',
        label: '<?php echo $option_chart7; ?>',
        borderColor: '#FF0000',
        borderWidth: 2,
        pointRadius: 3,
        fill: false,
        yAxisID: 'Fertilizer_1',
        data: [
          <?php echo $unsur_std; ?>
        ]
      }, {
        type: 'bar',
        label: 'Forcing',
        backgroundColor: '#005C5C',
        yAxisID: '<?php echo $option_chart8; ?>',
        data: [
          <?php echo $bu_f; ?>
        ]
      }, {
        type: 'line',
        label: '<?php echo $option_chart6; ?>',
        borderColor: '#0000FF',
        backgroundColor : '#0000FF',
        borderWidth: 0,
        pointRadius: 0,
        fill: <?php echo $option_chart5; ?>,
        yAxisID: 'Fertilizer_1',
        data: [
          <?php echo $unsur_real; ?>
        ]
      },
      <?php echo $option_chart4; ?>]
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
    			display: true,
          id: 'Fertilizer_1',
          gridLines: {
            display: false,
            drawBorder: true,
            drawOnChartArea: false,
          },
					ticks: {
						min: 0,
            callback: function(label, index, labels) {
              return label <?php echo $option_chart1; ?>;
            }
					},
          scaleLabel: {
              display: <?php echo $option_chart2; ?>,
              labelString: '1 M = 1.000.000'
          }
        },{
    			display: <?php echo $option_chart3; ?>,
          position: 'right',
          id: 'Fertilizer_2',
          gridLines: {
            display: false,
            drawBorder: true,
            drawOnChartArea: false,
          },
					ticks: {
						min: 0,
            callback: function(label, index, labels) {
              return label;
            }
					},
          scaleLabel: {
              display: false,
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
                <div class="col-lg-4 p-1">
                  <div class="card shadow" style="width:100%;">
                    <div class="card-header py-0 text-center" style="background-color:#008080;">
                      <span style="color:white;font-size:14px;"><b>Cost Impact</b></span>
                    </div>
                    <div class="card-body text-center" style="padding:10px;color:black;">
<?php
  if($cost_impact['total'] <= ($std_cost_impact['std_total'] * $luas)){
    $color = "#32CD32";
  }
  else{
    $color = "#FF0000";
  }
?>
                      <h4 style="font-weight:bold;color:<?php echo $color; ?>"><?php echo angka_ribuan_2(abs((($cost_impact['total'] / $tonase) / 1000) - ((($std_cost_impact['std_total'] * $luas) / $tonase) / 1000))); ?></h4> Rp/Kg
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 p-1">
                  <div class="card shadow" style="width:100%;">
                    <div class="card-body" style="padding:0;">
                      <table class="table_pm">
                        <tr class="text-center" style="font-weight:bold;">
                          <td width='25px' style="background-color:#FF0000;">&nbsp</td>
                          <td style="color:white;background-color:#008080;font-weight:bold;">Dry</td>
                        </tr>
                        <tr class="text-center">
<?php
  if(isset($head_all)){
?>
                          <td colspan="2" style="color:#FF0000;padding:10px;font-weight:bold;"><?php echo angka_ribuan_2(0); ?></td>
<?php
  }
  else{
?>
                          <td colspan="2" style="color:#FF0000;padding:10px;font-weight:bold;"><?php echo angka_ribuan_2($dry['total'] / $luas); ?></td>
<?php
  }
?>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 p-1">
                  <div class="card shadow" style="width:100%;">
                    <div class="card-body" style="padding:0;">
                      <table class="table_pm">
                        <tr class="text-center" style="font-weight:bold;">
                          <td width='25px' style="background-color:#0000FF;">&nbsp</td>
                          <td style="color:white;background-color:#008080;font-weight:bold;">Wet</td>
                        </tr>
                        <tr class="text-center">
<?php
  if(isset($head_all)){
?>
                          <td colspan="2" style="color:#0000FF;padding:10px;font-weight:bold;"><?php echo angka_ribuan_2(0); ?></td>
<?php
  }
  else{
?>
                          <td colspan="2" style="color:#0000FF;padding:10px;font-weight:bold;"><?php echo angka_ribuan_2($wet['total'] / $luas); ?></td>
<?php
  }
?>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="row mb-1">
                <div class="col-lg-12 p-1">
                  <div class="card shadow" style="width:100%;">
                    <div class="card-header py-0 text-center" style="background-color:#008080;">
                      <span style="color:white;font-size:14px;"><b>Quantity Insecticide</b></span>
                    </div>
                    <div class="card-body" style="padding:0;">
                      <table class="table_pm">
                        <tr class="text-center" style="background-color:#008080;font-weight:bold;">
                          <td style="color:white;" colspan="2">Type</td>
                          <td style="color:white;">Budget</td>
                          <td style="color:white;">Realization</td>
                          <td style="color:white;">Quota</td>
                          <td style="color:white;">UOM</td>
                        </tr>
                        <tr>
<?php
  if($std_material['Tekasi'] >= ($real_material['Tekasi'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                          <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                          <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=Tekasi&page=<?php echo $page; ?>&subpage=SPMA">Tekasi</a></td>
                          <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Tekasi']); ?></td>
                          <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Tekasi'] / $luas)); ?></td>
                          <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['Tekasi']); ?></td>
                          <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['Tekasi']; ?></td>
                        </tr>
                        <tr>
<?php
  if($std_material['Tekila'] >= ($real_material['Tekila'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                          <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                          <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=Tekila&page=<?php echo $page; ?>&subpage=SPMA">Tekila</a></td>
                          <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Tekila']); ?></td>
                          <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Tekila'] / $luas)); ?></td>
                          <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['Tekila']); ?></td>
                          <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['Tekila']; ?></td>
                        </tr>
                        <tr>
<?php
  if($std_material['Chlorpyrifos'] >= ($real_material['Chlorpyrifos'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                          <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                          <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=Chlorpyrifos&page=<?php echo $page; ?>&subpage=SPMA">Chlorpyrifos</a></td>
                          <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Chlorpyrifos']); ?></td>
                          <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Chlorpyrifos'] / $luas)); ?></td>
                          <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['Chlorpyrifos']); ?></td>
                          <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['Chlorpyrifos']; ?></td>
                        </tr>
                        <tr>
<?php
  if($std_material['Sidazinon'] >= ($real_material['Sidazinon'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                          <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                          <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=Sidazinon&page=<?php echo $page; ?>&subpage=SPMA">Sidazinon</a></td>
                          <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Sidazinon']); ?></td>
                          <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Sidazinon'] / $luas)); ?></td>
                          <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['Sidazinon']); ?></td>
                          <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['Sidazinon']; ?></td>
                        </tr>
                        <tr>
<?php
  if($std_material['Propoxur'] >= ($real_material['Propoxur'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                          <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                          <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=Propoxur&page=<?php echo $page; ?>&subpage=SPMA">Propoxur</a></td>
                          <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Propoxur']); ?></td>
                          <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Propoxur'] / $luas)); ?></td>
                          <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['Propoxur']); ?></td>
                          <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['Propoxur']; ?></td>
                        </tr>
                        <tr>
<?php
  if($std_material['Cypermethrin'] >= ($real_material['Cypermethrin'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                          <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                          <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=Cypermethrin&page=<?php echo $page; ?>&subpage=SPMA">Cypermethrin</a></td>
                          <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Cypermethrin']); ?></td>
                          <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Cypermethrin'] / $luas)); ?></td>
                          <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['Cypermethrin']); ?></td>
                          <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['Cypermethrin']; ?></td>
                        </tr>
                        <tr>
<?php
  if($std_material['Bifentrin_EC'] >= ($real_material['Bifentrin_EC'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                          <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                          <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=Bifentrin_EC&page=<?php echo $page; ?>&subpage=SPMA">Bifentrin EC</a></td>
                          <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Bifentrin_EC']); ?></td>
                          <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Bifentrin_EC'] / $luas)); ?></td>
                          <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['Bifentrin_EC']); ?></td>
                          <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['Bifentrin_EC']; ?></td>
                        </tr>
                        <tr>
<?php
  if($std_material['Bifentrin_G'] >= ($real_material['Bifentrin_G'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                          <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                          <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=Bifentrin G&page=<?php echo $page; ?>&subpage=SPMA">Bifentrin G</a></td>
                          <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Bifentrin_G']); ?></td>
                          <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Bifentrin_G'] / $luas)); ?></td>
                          <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['Bifentrin_G']); ?></td>
                          <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['Bifentrin_G']; ?></td>
                        </tr>
                        <tr>
<?php
  if($std_material['BPMC'] >= ($real_material['BPMC'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                          <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                          <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=BPMC&page=<?php echo $page; ?>&subpage=SPMA">BPMC</a></td>
                          <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['BPMC']); ?></td>
                          <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['BPMC'] / $luas)); ?></td>
                          <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['BPMC']); ?></td>
                          <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['BPMC']; ?></td>
                        </tr>
                        <tr>
<?php
  if($std_material['Clorpyrifos'] >= ($real_material['Clorpyrifos'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                          <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                          <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=Clorpyrifos&page=<?php echo $page; ?>&subpage=SPMA">Clorpyrifos</a></td>
                          <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Clorpyrifos']); ?></td>
                          <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Clorpyrifos'] / $luas)); ?></td>
                          <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['Clorpyrifos']); ?></td>
                          <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['Clorpyrifos']; ?></td>
                        </tr>
                        <tr>
<?php
  if($std_material['Abamectin'] >= ($real_material['Abamectin'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                          <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                          <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=Abamectin&page=<?php echo $page; ?>&subpage=SPMA">Abamectin</a></td>
                          <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Abamectin']); ?></td>
                          <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Abamectin'] / $luas)); ?></td>
                          <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['Abamectin']); ?></td>
                          <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['Abamectin']; ?></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="row mb-1">
                <div class="col-lg-12 p-1">
                  <div class="card shadow" style="width:100%;">
                    <div class="card-header py-0 text-center" style="background-color:#008080;">
                      <span style="color:white;font-size:14px;"><b>Insecticide After Forcing</b></span>
                    </div>
                    <div class="card-body" style="padding:0;">
<?php
  if($lokasi['tgl_forcing_realisasi'] != NULL){
    $tgl_forcing = $lokasi['tgl_forcing_realisasi'];
  }
  else{
    $tgl_forcing = $tgl_rencana_forcing;
  }
?>
                      <table class="table_pm">
                        <tr class="text-center" style="font-weight:bold;">
                          <td width="33%">Insect II</td>
                          <td width="33%">
<?php
  if($insect_2_tgl['tgl_realisasi'] != NULL){
    echo ceil((strtotime($insect_2_tgl['tgl_realisasi']) - strtotime($insect_1_tgl['tgl_realisasi'])) / 86400)." Hari";
  }
  else{
    echo "-";
  }
?>
                            <br />>>>>>>>>>>
                          </td>
                          <td width="34%">Insect I</td>
                        </tr>
                        <tr class="text-center" style="font-weight:bold;">
                          <td>
<?php
  if($insect_1_tgl['tgl_realisasi'] != NULL){
    echo ceil((strtotime($insect_1_tgl['tgl_realisasi']) - strtotime($tgl_forcing)) / 86400)." Hari";
  }
  else{
    echo "-";
  }
?>
                            <br />>>>>>>>>>>
                          </td>
                          <td>
<?php
  if($insect_2_tgl['tgl_realisasi'] != NULL){
    echo ceil((strtotime($insect_2_tgl['tgl_realisasi']) - strtotime($tgl_forcing)) / 86400)." Hari";
  }
  else{
    echo "-";
  }
?>
                            <br />>>>>>>>>>>
                          </td>
                          <td>|<br>|</td>
                        </tr>
                        <tr class="text-center" style="font-weight:bold;">
                          <td>
<?php
  if($insect_2_tgl['tgl_realisasi'] != NULL){
    echo format_tgl($insect_2_tgl['tgl_realisasi']);
  }
  else{
    echo "-";
  }
?>
                          <br />
                          Insect II
                          </td>
                          <td>
<?php
  if($insect_1_tgl['tgl_realisasi'] != NULL){
    echo format_tgl($insect_1_tgl['tgl_realisasi']);
  }
  else{
    echo "-";
  }
?>
                          <br />
                          Insect I
                          </td>
                          <td><?php echo format_tgl($tgl_forcing); ?><br />Forcing</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mb-1">
                <div class="col-lg-12 p-1">
                  <div class="card shadow" style="width:100%;">
                    <div class="card-header py-0 text-center" style="background-color:#008080;">
                      <span style="color:white;font-size:14px;"><b>Persen Bunga</b></span>
                    </div>
                    <div class="card-body" style="padding:0;">
                      <table class="table_pm">
                        <tr style="background-color:#008080;font-weight:bold;">
                          <td style="color:white;">Tanggal Pengamatan</td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    $pengamatan_persen_bunga = NULL;
  }
  else{
    $pengamatan_persen_bunga = $persen_bunga['tgl_pengamatan'];
  }
?>
                          <td style="color:white;" class="text-right"><?php echo format_tgl($pengamatan_persen_bunga); ?></td>
                        </tr>
                        <tr style="background-color:#008080;font-weight:bold;">
                          <td style="color:white;">Umur Saat Pengamatan</td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    $umur_persen_bunga = "- Bulan";
  }
  else{
    if($pengamatan_persen_bunga != NULL){
      $date1 = round(strtotime($pengamatan_persen_bunga)/86400);
      $date2 = round(strtotime($lokasi['tgl_mulai_rawat'])/86400);

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
                      </table>
                      <canvas id="diagram_persen_bunga" style="padding-right:20px;"></canvas>
<?php
  $persen_bunga_total = '';
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    $persen_bunga_total .= "0, 0, 0, 0, 0, 0, 0, 0";
  }
  else{
    if($persen_bunga['total'] != NULL){
      $pengamatan_persen_berbunga_normal = ($persen_bunga['berbunga_normal'] / $persen_bunga['total']) * 100;
    }
    else{
      $pengamatan_persen_berbunga_normal = 0;
    }
    $persen_bunga_total .= round($persen_bunga['persen_berbunga_normal_NT']);
    $persen_bunga_total .= ", ".round($persen_bunga['persen_berbunga_normal_NN']);
    //$persen_bunga_total .= ", ".round($pengamatan_persen_berbunga_normal);
    $persen_bunga_total .= ", ".round($persen_bunga['persen_berbunga_penyakit']);
    $persen_bunga_total .= ", ".round($persen_bunga['persen_berbunga_kerdil']);
    $persen_bunga_total .= ", ".round($persen_bunga['persen_berbunga_buah_alami']);
    $persen_bunga_total .= ", ".round($persen_bunga['persen_berbunga_sudah_dipanen']);
    $persen_bunga_total .= ", ".round($persen_bunga['persen_berbunga_dimakan_tikus']);
    $persen_bunga_total .= ", ".round($persen_bunga['persen_mandul_kerdil']);
    $persen_bunga_total .= ", ".round($persen_bunga['persen_mandul_penyakit']);
    $persen_bunga_total .= ", ".round($persen_bunga['persen_mandul_normal']);
  }
?>
<script>
  var config_persen_bunga = {
    type: 'horizontalBar',
    data: {
      labels: ['Normal / Total', 'Normal / Normal', 'Bunga Penyakit', 'Bunga Kerdil', 'Bunga Buah Alami', 'Bunga Sudah Dipanen', 'Bunga Dimakan Tikus', 'Bunga Kerdil', 'Bunga Penyakit', 'Mandul Kerdil', 'Mandul Penyakit', 'Mandul Normal'],
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
          </div>

          <div class="row mb-2">
            <div class="col-lg-4 p-1">
              <div class="card shadow" style="width:100%;">
                <div class="card-header py-0 text-center" style="background-color:#008080;">
                  <span style="color:white;font-size:14px;"><b>Pengamatan D-Leaf</b></span>
                </div>
                <div class="card-body" style="padding:0;">
                  <table class="table_pm">
                    <tr style="background-color:#008080;font-weight:bold;">
                      <td style="color:white;">Tanggal Pengamatan</td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    $tgl_pengamatan_dleaf = NULL;
  }
  else{
    $tgl_pengamatan_dleaf = $berat_tanaman['tgl_pengamatan'];
  }
?>
                      <td style="color:white;" class="text-right"><?php echo format_tgl($tgl_pengamatan_dleaf); ?></td>
                    </tr>
                    <tr style="background-color:#008080;font-weight:bold;">
                      <td style="color:white;">Umur Saat Pengamatan</td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    $umur_pengamatan_dleaf = "- Bulan";
  }
  else{
    if($tgl_pengamatan_dleaf != NULL){
      $date1 = round(strtotime($tgl_pengamatan_dleaf)/86400);
      $date2 = round(strtotime($lokasi['tgl_mulai_rawat'])/86400);

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
                      <td class="text-right" style="font-weight:bold;">
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
                      <td>Warna Daun</td>
                      <td class="text-right" style="font-weight:bold;">
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
                    <tr>
                      <td>Mealybug</td>
                      <td class="text-right" style="font-weight:bold;">
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
                      <td>Phytoptora</td>
                      <td class="text-right" style="font-weight:bold;">
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
                    <tr>
                      <td>Erwinia</td>
                      <td class="text-right" style="font-weight:bold;">
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
                    <tr>
                      <td>Berat Tanaman</td>
                      <td class="text-right" style="font-weight:bold;">
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
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

            <div class="col-lg-4 p-1">
              <div class="card shadow" style="width:100%;">
                <div class="card-header py-0 text-center" style="background-color:#008080;">
                  <span style="color:white;font-size:14px;"><b>Insecticide Material</b></span>
                </div>
                <div class="card-body" style="padding:0;">
                  <table class="table_pm">
                    <tr class="text-center" style="background-color:#008080;font-weight:bold;">
                      <td style="color:white;">Material</td>
                      <td style="color:white;">Insect I</td>
                      <td style="color:white;">Insect II</td>
                    </tr>
                    <tr>
                      <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=Cypermethrin&page=<?php echo $page; ?>&subpage=SPIN">Cypermethrin</a></td>
                      <td class="text-center" style="font-weight:bold;"><?php echo angka_ribuan_2($insect_1['Cypermethrin'] / $luas); ?></td>
                      <td class="text-center" style="font-weight:bold;"><?php echo angka_ribuan_2($insect_2['Cypermethrin'] / $luas); ?></td>
                    </tr>
                    <tr>
                      <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=Propoxur&page=<?php echo $page; ?>&subpage=SPIN">Propoxur</a></td>
                      <td class="text-center" style="font-weight:bold;"><?php echo angka_ribuan_2($insect_1['Propoxur'] / $luas); ?></td>
                      <td class="text-center" style="font-weight:bold;"><?php echo angka_ribuan_2($insect_2['Propoxur'] / $luas); ?></td>
                    </tr>
                    <tr>
                      <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=BPMC&page=<?php echo $page; ?>&subpage=SPIN">BPMC</a></td>
                      <td class="text-center" style="font-weight:bold;"><?php echo angka_ribuan_2($insect_1['BPMC'] / $luas); ?></td>
                      <td class="text-center" style="font-weight:bold;"><?php echo angka_ribuan_2($insect_2['BPMC'] / $luas); ?></td>
                    </tr>
                    <tr>
                      <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=K2SO4&page=<?php echo $page; ?>&subpage=SPIN">K2SO4</a></td>
                      <td class="text-center" style="font-weight:bold;"><?php echo angka_ribuan_2($insect_1['K2SO4'] / $luas); ?></td>
                      <td class="text-center" style="font-weight:bold;"><?php echo angka_ribuan_2($insect_2['K2SO4'] / $luas); ?></td>
                    </tr>
                    <tr>
                      <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=Urea&page=<?php echo $page; ?>&subpage=SPIN">Urea</a></td>
                      <td class="text-center" style="font-weight:bold;"><?php echo angka_ribuan_2($insect_1['Urea'] / $luas); ?></td>
                      <td class="text-center" style="font-weight:bold;"><?php echo angka_ribuan_2($insect_2['Urea'] / $luas); ?></td>
                    </tr>
                    <tr>
                      <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=Sidazinon&page=<?php echo $page; ?>&subpage=SPIN">Sidazinon</a></td>
                      <td class="text-center" style="font-weight:bold;"><?php echo angka_ribuan_2($insect_1['Sidazinon'] / $luas); ?></td>
                      <td class="text-center" style="font-weight:bold;"><?php echo angka_ribuan_2($insect_2['Sidazinon'] / $luas); ?></td>
                    </tr>
                    <tr>
                      <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=LOB&page=<?php echo $page; ?>&subpage=SPIN">LOB</a></td>
                      <td class="text-center" style="font-weight:bold;"><?php echo angka_ribuan_2($insect_1['LOB'] / $luas); ?></td>
                      <td class="text-center" style="font-weight:bold;"><?php echo angka_ribuan_2($insect_2['LOB'] / $luas); ?></td>
                    </tr>
                    <tr>
                      <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=Borax&page=<?php echo $page; ?>&subpage=SPIN">Borax</a></td>
                      <td class="text-center" style="font-weight:bold;"><?php echo angka_ribuan_2($insect_1['Borax'] / $luas); ?></td>
                      <td class="text-center" style="font-weight:bold;"><?php echo angka_ribuan_2($insect_2['Borax'] / $luas); ?></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>

            <div class="col-lg-4 p-1">
              <div class="card shadow" style="width:100%;">
                <div class="card-header py-0 text-center" style="background-color:#008080;">
                  <span style="color:white;font-size:14px;"><b>Insecticide Material</b></span>
                </div>
                <div class="card-body" style="padding:0;">
                  <table class="table_pm">
                    <tr class="text-center" style="background-color:#008080;font-weight:bold;">
                      <td style="color:white;">Material</td>
                      <td style="color:white;">Insect I</td>
                      <td style="color:white;">Insect II</td>
                    </tr>
                    <tr>
                      <td>Kaolin</td>
                      <td class="text-center" style="font-weight:bold;"><?php echo angka_ribuan_2($insect_1['Kaolin'] / $luas); ?></td>
                      <td class="text-center" style="font-weight:bold;"><?php echo angka_ribuan_2($insect_2['Kaolin'] / $luas); ?></td>
                    </tr>
                    <tr>
                      <td>FeSO4</td>
                      <td class="text-center" style="font-weight:bold;"><?php echo angka_ribuan_2($insect_1['FeSO4'] / $luas); ?></td>
                      <td class="text-center" style="font-weight:bold;"><?php echo angka_ribuan_2($insect_2['FeSO4'] / $luas); ?></td>
                    </tr>
                    <tr>
                      <td>ZnSO4</td>
                      <td class="text-center" style="font-weight:bold;"><?php echo angka_ribuan_2($insect_1['ZnSO4'] / $luas); ?></td>
                      <td class="text-center" style="font-weight:bold;"><?php echo angka_ribuan_2($insect_2['ZnSO4'] / $luas); ?></td>
                    </tr>
                    <tr>
                      <td>Bifentrin EC</td>
                      <td class="text-center" style="font-weight:bold;"><?php echo angka_ribuan_2($insect_1['Bifentrin_EC'] / $luas); ?></td>
                      <td class="text-center" style="font-weight:bold;"><?php echo angka_ribuan_2($insect_2['Bifentrin_EC'] / $luas); ?></td>
                    </tr>
                    <tr>
                      <td>Abamectin</td>
                      <td class="text-center" style="font-weight:bold;"><?php echo angka_ribuan_2($insect_1['Abamectin'] / $luas); ?></td>
                      <td class="text-center" style="font-weight:bold;"><?php echo angka_ribuan_2($insect_2['Abamectin'] / $luas); ?></td>
                    </tr>
                    <tr>
                      <td>Sanisol</td>
                      <td class="text-center" style="font-weight:bold;"><?php echo angka_ribuan_2($insect_1['Sanisol'] / $luas); ?></td>
                      <td class="text-center" style="font-weight:bold;"><?php echo angka_ribuan_2($insect_2['Sanisol'] / $luas); ?></td>
                    </tr>
                    <tr>
                      <td>Metalaxil</td>
                      <td class="text-center" style="font-weight:bold;"><?php echo angka_ribuan_2($insect_1['Metalaxil'] / $luas); ?></td>
                      <td class="text-center" style="font-weight:bold;"><?php echo angka_ribuan_2($insect_2['Metalaxil'] / $luas); ?></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="row mb-1">
            <div class="col-lg-12 p-1">
              <div class="card shadow" style="width:100%;">
                <div class="card-body" style="padding:0;">
<?php
  $date1 = round(strtotime($konstanta['nilai'])/86400);
  $date2 = round(strtotime($lokasi['tgl_mulai_rawat'])/86400);

  $umur = ceil(($date1-$date2)/30.4583333333333);
  $umur_iklim = 1;
  while($umur_iklim <= 24) {
    if($iklim[$umur_iklim] == 1){
      $color_umur[$umur_iklim] = "#0000FF";
    }
    else{
      $color_umur[$umur_iklim] = "#FF0000";
    }
    if($umur_iklim <= $umur){
      $color_background[$umur_iklim] = "#FAEBD7";
    }
    else{
      $color_background[$umur_iklim] = "#F0F8FF";
    }
    $umur_iklim++;
  }
?>
                  <div class="row">
                    <div class="col-lg-4">
                      <table class="table_pm">
                        <tr class="text-center" style="background-color:#008080;font-weight:bold;">
                          <td style="color:white;">1</td>
                          <td style="color:white;">2</td>
                          <td style="color:white;">3</td>
                          <td style="color:white;">4</td>
                          <td style="color:white;">5</td>
                          <td style="color:white;">6</td>
                          <td style="color:white;">7</td>
                          <td style="color:white;">8</td>
                        </tr>
                        <tr class="text-center">
                          <td style="background-color:<?php echo $color_umur['1']; ?>;padding:3px;"> </td>
                          <td style="background-color:<?php echo $color_umur['2']; ?>;padding:3px;"> </td>
                          <td style="background-color:<?php echo $color_umur['3']; ?>;padding:3px;"> </td>
                          <td style="background-color:<?php echo $color_umur['4']; ?>;padding:3px;"> </td>
                          <td style="background-color:<?php echo $color_umur['5']; ?>;padding:3px;"> </td>
                          <td style="background-color:<?php echo $color_umur['6']; ?>;padding:3px;"> </td>
                          <td style="background-color:<?php echo $color_umur['7']; ?>;padding:3px;"> </td>
                          <td style="background-color:<?php echo $color_umur['8']; ?>;padding:3px;"> </td>
                        </tr>
                        <tr class="text-center" style="padding:5px;;font-weight:bold;">
<?php
  if(isset($head_all)){
?>
                          <td style="padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2(0); ?></td>
                          <td style="padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2(0); ?></td>
                          <td style="padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2(0); ?></td>
                          <td style="padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2(0); ?></td>
                          <td style="padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2(0); ?></td>
                          <td style="padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2(0); ?></td>
                          <td style="padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2(0); ?></td>
                          <td style="padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2(0); ?></td>
<?php
  }
  else{
?>
                          <td style="background-color:<?php echo $color_background['1']; ?>;padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2($unsur['B1'] / $luas); ?></td>
                          <td style="background-color:<?php echo $color_background['2']; ?>;padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2($unsur['B2'] / $luas); ?></td>
                          <td style="background-color:<?php echo $color_background['3']; ?>;padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2($unsur['B3'] / $luas); ?></td>
                          <td style="background-color:<?php echo $color_background['4']; ?>;padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2($unsur['B4'] / $luas); ?></td>
                          <td style="background-color:<?php echo $color_background['5']; ?>;padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2($unsur['B5'] / $luas); ?></td>
                          <td style="background-color:<?php echo $color_background['6']; ?>;padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2($unsur['B6'] / $luas); ?></td>
                          <td style="background-color:<?php echo $color_background['7']; ?>;padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2($unsur['B7'] / $luas); ?></td>
                          <td style="background-color:<?php echo $color_background['8']; ?>;padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2($unsur['B8'] / $luas); ?></td>
<?php
  }
?>
                        </tr>
                      </table>
                    </div>
                    <div class="col-lg-4">
                      <table class="table_pm">
                        <tr class="text-center" style="background-color:#008080;font-weight:bold;">
                          <td style="color:white;">9</td>
                          <td style="color:white;">10</td>
                          <td style="color:white;">11</td>
                          <td style="color:white;">12</td>
                          <td style="color:white;">13</td>
                          <td style="color:white;">14</td>
                          <td style="color:white;">15</td>
                          <td style="color:white;">16</td>
                        </tr>
                        <tr class="text-center">
                          <td style="background-color:<?php echo $color_umur['9']; ?>;padding:3px;"> </td>
                          <td style="background-color:<?php echo $color_umur['10']; ?>;padding:3px;"> </td>
                          <td style="background-color:<?php echo $color_umur['11']; ?>;padding:3px;"> </td>
                          <td style="background-color:<?php echo $color_umur['12']; ?>;padding:3px;"> </td>
                          <td style="background-color:<?php echo $color_umur['13']; ?>;padding:3px;"> </td>
                          <td style="background-color:<?php echo $color_umur['14']; ?>;padding:3px;"> </td>
                          <td style="background-color:<?php echo $color_umur['15']; ?>;padding:3px;"> </td>
                          <td style="background-color:<?php echo $color_umur['16']; ?>;padding:3px;"> </td>
                        </tr>
                        <tr class="text-center" style="padding:5px;;font-weight:bold;">
<?php
  if(isset($head_all)){
?>
                          <td style="padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2(0); ?></td>
                          <td style="padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2(0); ?></td>
                          <td style="padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2(0); ?></td>
                          <td style="padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2(0); ?></td>
                          <td style="padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2(0); ?></td>
                          <td style="padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2(0); ?></td>
                          <td style="padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2(0); ?></td>
                          <td style="padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2(0); ?></td>
<?php
  }
  else{
?>
                          <td style="background-color:<?php echo $color_background['9']; ?>;padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2($unsur['B9'] / $luas); ?></td>
                          <td style="background-color:<?php echo $color_background['10']; ?>;padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2($unsur['B10'] / $luas); ?></td>
                          <td style="background-color:<?php echo $color_background['11']; ?>;padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2($unsur['B11'] / $luas); ?></td>
                          <td style="background-color:<?php echo $color_background['12']; ?>;padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2($unsur['B12'] / $luas); ?></td>
                          <td style="background-color:<?php echo $color_background['13']; ?>;padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2($unsur['B13'] / $luas); ?></td>
                          <td style="background-color:<?php echo $color_background['14']; ?>;padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2($unsur['B14'] / $luas); ?></td>
                          <td style="background-color:<?php echo $color_background['15']; ?>;padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2($unsur['B15'] / $luas); ?></td>
                          <td style="background-color:<?php echo $color_background['16']; ?>;padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2($unsur['B16'] / $luas); ?></td>
<?php
  }
?>
                        </tr>
                      </table>
                    </div>
                    <div class="col-lg-4">
                      <table class="table_pm">
                        <tr class="text-center" style="background-color:#008080;font-weight:bold;">
                          <td style="color:white;">17</td>
                          <td style="color:white;">18</td>
                          <td style="color:white;">19</td>
                          <td style="color:white;">20</td>
                          <td style="color:white;">21</td>
                          <td style="color:white;">22</td>
                          <td style="color:white;">23</td>
                          <td style="color:white;">24</td>
                        </tr>
                        <tr class="text-center">
                          <td style="background-color:<?php echo $color_umur['17']; ?>;padding:3px;"> </td>
                          <td style="background-color:<?php echo $color_umur['18']; ?>;padding:3px;"> </td>
                          <td style="background-color:<?php echo $color_umur['19']; ?>;padding:3px;"> </td>
                          <td style="background-color:<?php echo $color_umur['20']; ?>;padding:3px;"> </td>
                          <td style="background-color:<?php echo $color_umur['21']; ?>;padding:3px;"> </td>
                          <td style="background-color:<?php echo $color_umur['22']; ?>;padding:3px;"> </td>
                          <td style="background-color:<?php echo $color_umur['23']; ?>;padding:3px;"> </td>
                          <td style="background-color:<?php echo $color_umur['24']; ?>;padding:3px;"> </td>
                        </tr>
                        <tr class="text-center" style="padding:5px;;font-weight:bold;">
<?php
  if(isset($head_all)){
?>
                          <td style="padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2(0); ?></td>
                          <td style="padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2(0); ?></td>
                          <td style="padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2(0); ?></td>
                          <td style="padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2(0); ?></td>
                          <td style="padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2(0); ?></td>
                          <td style="padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2(0); ?></td>
                          <td style="padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2(0); ?></td>
                          <td style="padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2(0); ?></td>
<?php
  }
  else{
?>
                          <td style="background-color:<?php echo $color_background['17']; ?>;padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2($unsur['B17'] / $luas); ?></td>
                          <td style="background-color:<?php echo $color_background['18']; ?>;padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2($unsur['B18'] / $luas); ?></td>
                          <td style="background-color:<?php echo $color_background['19']; ?>;padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2($unsur['B19'] / $luas); ?></td>
                          <td style="background-color:<?php echo $color_background['20']; ?>;padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2($unsur['B20'] / $luas); ?></td>
                          <td style="background-color:<?php echo $color_background['21']; ?>;padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2($unsur['B21'] / $luas); ?></td>
                          <td style="background-color:<?php echo $color_background['22']; ?>;padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2($unsur['B22'] / $luas); ?></td>
                          <td style="background-color:<?php echo $color_background['23']; ?>;padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2($unsur['B23'] / $luas); ?></td>
                          <td style="background-color:<?php echo $color_background['24']; ?>;padding-top:10px;padding-bottom:10px;" width="12.5%"><?php echo angka_ribuan_2($unsur['B24'] / $luas); ?></td>
<?php
  }
?>
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
    var insecticide = $('#select_insecticide').val();
    var type = $('#select_type').val();
    var insecticide_2 = $('#select_insecticide_2').val();
    var compare = $('#select_compare').val();

    window.location.href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=<?php echo $page; ?>&lokasi="+lokasi+"&insecticide="+insecticide+"&type="+type+"&insecticide_2="+insecticide_2+"&compare="+compare;
  }
  window.onload = function(){
		var ctx_unsur = document.getElementById('diagram_unsur').getContext('2d');
		window.myBar = new Chart(ctx_unsur, config_unsur);
		var ctx_persen_bunga = document.getElementById('diagram_persen_bunga').getContext('2d');
		window.myBar = new Chart(ctx_persen_bunga, config_persen_bunga);
	};
</script>
