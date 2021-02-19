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

      <li class="nav-item active">
        <a class="nav-link collapsed p-1" href="#" data-toggle="collapse" data-target="#collapseFertilizer" aria-expanded="true" aria-controls="collapseFertilizer">
          <i class="fas fa-fw fa-cog"></i>
          <span class="text-white-600 small">Fertilizer</span>
        </a>
        <div id="collapseFertilizer" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white p-1 collapse-inner rounded">
            <a class="collapse-item small p-1 active" href="#">Summary</a>
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
                Fertilizer Summary
              </b></span>
              <span class="d-sm-none" style="color:black;font-size:12px;"><b>
                <a href="/PIS/index.php/WIP_PM_Dashboard/plantation_group?pg=<?php echo $pg_wil['pg']; ?>"><?php echo $pg_wil['pg']; ?></a> -
                <a href="/PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=<?php echo $pg_wil['wilayah']; ?>"><?php echo $pg_wil['wilayah']; ?></a> -
                <?php echo $lokasi['lokasi']; ?> -
                Fertilizer Summary
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
                          <td style="color:white;">Fertilizer : </td>
                          <td>
                            <select class="form-control select" name="select_fertilizer" id="select_fertilizer" onchange="javascript:select_main_filter();" data-live-search="true">
<?php
  if($fertilizer == "Fertilizer"){
?>
                              <option value="Fertilizer" style="color:black;" selected>Fertilizer</option>
<?php
  }
  else{
?>
                              <option value="Fertilizer" style="color:black;" selected>Fertilizer</option>
<?php
  }
  foreach ($master_material as $mm) {
    if($mm->code == $fertilizer){
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
    $type_fertilizer_1 = "selected";
    $type_fertilizer_2 = "";
  }
  else{
    $type_fertilizer_1 = "";
    $type_fertilizer_2 = "selected";
  }
?>
                              <option value="1" style="color:black;" <?php echo $type_fertilizer_1; ?>>Per-Umur</option>
                              <option value="2" style="color:black;" <?php echo $type_fertilizer_2; ?>>Accumulation</option>
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
                          <td style="color:white;">Fertilizer : </td>
                          <td>
<?php
  if($compare == 1){
    $disabled_compare = "disabled";
  }
  else{
    $disabled_compare = "";
  }
?>
                            <select class="form-control select" name="select_fertilizer_2" id="select_fertilizer_2" onchange="javascript:select_main_filter();" data-live-search="true" <?php echo $disabled_compare; ?>>
<?php
  foreach ($master_material as $mm) {
    if($mm->code == $fertilizer_2){
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

              <div class="row">
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

            <div class="col-lg-4 p-1">
              <div class="card shadow" style="width:100%;">
                <div class="card-header py-0 text-center" style="background-color:#008080;">
                  <span style="color:white;font-size:14px;"><b>Quantity Pupuk</b></span>
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
  if($std_material['Urea'] >= ($real_material['Urea'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                      <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                      <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=Urea&page=<?php echo $page; ?>&subpage=SPMA">Urea</a></td>
                      <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Urea']); ?></td>
                      <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Urea'] / $luas)); ?></td>
                      <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['Urea']); ?></td>
                      <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['Urea']; ?></td>
                    </tr>
                    <tr>
<?php
  if($std_material['Urease'] >= ($real_material['Urease'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                      <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                      <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=Urease&page=<?php echo $page; ?>&subpage=SPMA">Urease</a></td>
                      <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Urease']); ?></td>
                      <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Urease'] / $luas)); ?></td>
                      <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['Urease']); ?></td>
                      <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['Urease']; ?></td>
                    </tr>
                    <tr>
<?php
  if($std_material['Za'] >= ($real_material['Za'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                      <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                      <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=Za&page=<?php echo $page; ?>&subpage=SPMA">Za</a></td>
                      <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Za']); ?></td>
                      <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Za'] / $luas)); ?></td>
                      <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['Za']); ?></td>
                      <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['Za']; ?></td>
                    </tr>
                    <tr>
<?php
  if($std_material['K2SO4'] >= ($real_material['K2SO4'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                      <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                      <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=K2SO4&page=<?php echo $page; ?>&subpage=SPMA">K2SO4</a></td>
                      <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['K2SO4']); ?></td>
                      <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['K2SO4'] / $luas)); ?></td>
                      <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['K2SO4']); ?></td>
                      <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['K2SO4']; ?></td>
                    </tr>
                    <tr>
<?php
  if($std_material['KCL'] >= ($real_material['KCL'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                      <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                      <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=KCL&page=<?php echo $page; ?>&subpage=SPMA">KCL</a></td>
                      <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['KCL']); ?></td>
                      <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['KCL'] / $luas)); ?></td>
                      <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['KCL']); ?></td>
                      <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['KCL']; ?></td>
                    </tr>
                    <tr>
<?php
  if($std_material['TSP'] >= ($real_material['TSP'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                      <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                      <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=TSP&page=<?php echo $page; ?>&subpage=SPMA">TSP</a></td>
                      <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['TSP']); ?></td>
                      <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['TSP'] / $luas)); ?></td>
                      <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['TSP']); ?></td>
                      <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['TSP']; ?></td>
                    </tr>
                    <tr>
<?php
  if($std_material['DAP'] >= ($real_material['DAP'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                      <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                      <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=DAP&page=<?php echo $page; ?>&subpage=SPMA">DAP</a></td>
                      <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['DAP']); ?></td>
                      <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['DAP'] / $luas)); ?></td>
                      <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['DAP']); ?></td>
                      <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['DAP']; ?></td>
                    </tr>
                    <tr>
<?php
  if($std_material['MgSO4'] >= ($real_material['MgSO4'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                      <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                      <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=MgSO4&page=<?php echo $page; ?>&subpage=SPMA">MgSO4</a></td>
                      <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['MgSO4']); ?></td>
                      <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['MgSO4'] / $luas)); ?></td>
                      <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['MgSO4']); ?></td>
                      <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['MgSO4']; ?></td>
                    </tr>
                    <tr>
<?php
  if($std_material['Kieserite'] >= ($real_material['Kieserite'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                      <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                      <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=Kieserite&page=<?php echo $page; ?>&subpage=SPMA">Kieserite</a></td>
                      <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Kieserite']); ?></td>
                      <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Kieserite'] / $luas)); ?></td>
                      <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['Kieserite']); ?></td>
                      <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['Kieserite']; ?></td>
                    </tr>
                    <tr>
<?php
  if($std_material['FeSO4'] >= ($real_material['FeSO4'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                      <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                      <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=FeSO4&page=<?php echo $page; ?>&subpage=SPMA">FeSO4</a></td>
                      <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['FeSO4']); ?></td>
                      <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['FeSO4'] / $luas)); ?></td>
                      <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['FeSO4']); ?></td>
                      <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['FeSO4']; ?></td>
                    </tr>
                    <tr>
<?php
  if($std_material['ZnSO4'] >= ($real_material['ZnSO4'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                      <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                      <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=ZnSO4&page=<?php echo $page; ?>&subpage=SPMA">ZnSO4</a></td>
                      <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['ZnSO4']); ?></td>
                      <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['ZnSO4'] / $luas)); ?></td>
                      <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['ZnSO4']); ?></td>
                      <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['ZnSO4']; ?></td>
                    </tr>
                    <tr>
<?php
  if($std_material['Dolomite'] >= ($real_material['Dolomite'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                      <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                      <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=Dolomite&page=<?php echo $page; ?>&subpage=SPMA">Dolomite</a></td>
                      <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Dolomite']); ?></td>
                      <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Dolomite'] / $luas)); ?></td>
                      <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['Dolomite']); ?></td>
                      <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['Dolomite']; ?></td>
                    </tr>
                    <tr>
<?php
  if($std_material['Gypsum'] >= ($real_material['Gypsum'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                      <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                      <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=Gypsum&page=<?php echo $page; ?>&subpage=SPMA">Gypsum</a></td>
                      <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Gypsum']); ?></td>
                      <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Gypsum'] / $luas)); ?></td>
                      <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['Gypsum']); ?></td>
                      <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['Gypsum']; ?></td>
                    </tr>
                    <tr>
<?php
  if($std_material['CuSO4'] >= ($real_material['CuSO4'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                      <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                      <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=CuSO4&page=<?php echo $page; ?>&subpage=SPMA">CuSO4</a></td>
                      <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['CuSO4']); ?></td>
                      <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['CuSO4'] / $luas)); ?></td>
                      <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['CuSO4']); ?></td>
                      <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['CuSO4']; ?></td>
                    </tr>
                    <tr>
<?php
  if($std_material['Borax'] >= ($real_material['Borax'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                      <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                      <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=Borax&page=<?php echo $page; ?>&subpage=SPMA">Borax</a></td>
                      <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Borax']); ?></td>
                      <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Borax'] / $luas)); ?></td>
                      <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['Borax']); ?></td>
                      <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['Borax']; ?></td>
                    </tr>
                    <tr>
<?php
  if($std_material['LOB'] >= ($real_material['LOB'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                      <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                      <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=LOB&page=<?php echo $page; ?>&subpage=SPMA">LOB</a></td>
                      <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['LOB']); ?></td>
                      <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['LOB'] / $luas)); ?></td>
                      <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['LOB']); ?></td>
                      <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['LOB']; ?></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>

            <div class="col-lg-4 p-1">
              <div class="row mb-1">
                <div class="col-lg-12">
                <div class="card shadow" style="width:100%;">
                  <div class="card-header py-0 text-center" style="background-color:#008080;">
                    <span style="color:white;font-size:14px;"><b>Quantity Pupuk</b></span>
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
  if($std_material['CaCl2'] >= ($real_material['CaCl2'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=CaCl2&page=<?php echo $page; ?>&subpage=SPMA">CaCl2</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['CaCl2']); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['CaCl2'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['CaCl2']); ?></td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['CaCl2']; ?></td>
                      </tr>
                      <tr>
<?php
  if($std_material['Calcibor'] >= ($real_material['Calcibor'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=Calcibor&page=<?php echo $page; ?>&subpage=SPMA">Calcibor</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Calcibor']); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Calcibor'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['Calcibor']); ?></td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['Calcibor']; ?></td>
                      </tr>
                      <tr>
<?php
  if($std_material['Kompos'] >= ($real_material['Kompos'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=Kompos&page=<?php echo $page; ?>&subpage=SPMA">Kompos</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Kompos']); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Kompos'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['Kompos']); ?></td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['Kompos']; ?></td>
                      </tr>
                      <tr>
<?php
  if($std_material['Belerang'] >= ($real_material['Belerang'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=Belerang&page=<?php echo $page; ?>&subpage=SPMA">Belerang</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Belerang']); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Belerang'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['Belerang']); ?></td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['Belerang']; ?></td>
                      </tr>
                      <tr>
<?php
  if($std_material['Kieserite_G'] >= ($real_material['Kieserite_G'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=Kieserite_G&page=<?php echo $page; ?>&subpage=SPMA">Kieserite G</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Kieserite_G']); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Kieserite_G'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['Kieserite_G']); ?></td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['Kieserite_G']; ?></td>
                      </tr>
                      <tr>
<?php
  if($std_material['NPK'] >= ($real_material['NPK'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=NPK&page=<?php echo $page; ?>&subpage=SPMA">NPK</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['NPK']); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['NPK'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['NPK']); ?></td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['NPK']; ?></td>
                      </tr>
                      <tr>
<?php
  if($std_material['NPK_Haracoat'] >= ($real_material['NPK_Haracoat'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=NPK_Haracoat&page=<?php echo $page; ?>&subpage=SPMA">NPK_Haracoat</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['NPK_Haracoat']); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['NPK_Haracoat'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['NPK_Haracoat']); ?></td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['NPK_Haracoat']; ?></td>
                      </tr>
                      <tr>
<?php
  if($std_material['Petro_Cas'] >= ($real_material['Petro_Cas'] / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=Petro_Cas&page=<?php echo $page; ?>&subpage=SPMA">Petro Cas</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Petro_Cas']); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Petro_Cas'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['Petro_Cas']); ?></td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['Petro_Cas']; ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="card shadow" style="width:100%;">
                    <div class="card-header py-0 text-center" style="background-color:#008080;">
                      <span style="color:white;font-size:14px;"><b>Kandungan Unsur (Kg/Ton)</b></span>
                    </div>
                    <div class="card-body" style="padding:0;">
                      <table class="table_pm">
                        <tr class="text-center" style="background-color:#008080;font-weight:bold;">
                          <td style="color:white;" width='25%'>Nitrogen</td>
                          <td style="color:white;" width='25%'>Sulfur</td>
                          <td style="color:white;" width='25%'>K2O</td>
                          <td style="color:white;" width='25%'>P2O5</td>
                        </tr>
                        <tr class="text-center" style="font-weight:bold;">
                          <td style="padding:10px"><?php echo angka_ribuan_2((($real_material['Urea'] * 0.46) + ($real_material['Za'] * 0.21) + ($real_material['DAP'] * 0.18)) / $tonase); ?></td>
                          <td style="padding:10px"><?php echo angka_ribuan_2((($real_material['Za'] * 0.24) + ($real_material['K2SO4'] * 0.18) + ($real_material['MgSO4'] * 0.23) + ($real_material['Kieserite'] * 0.14) + ($real_material['Belerang'] * 1) + ($real_material['Kieserite_G'] * 0.14)) / $tonase); ?></td>
                          <td style="padding:10px"><?php echo angka_ribuan_2((($real_material['K2SO4'] * 0.5) + ($real_material['KCL'] * 0.6)) / $tonase); ?></td>
                          <td style="padding:10px"><?php echo angka_ribuan_2((($real_material['TSP'] * 0.46) + ($real_material['DAP'] * 0.46)) / $tonase); ?></td>
                        </tr>
                        <tr class="text-center" style="background-color:#008080;font-weight:bold;">
                          <td style="color:white;" width='25%'>MgO</td>
                          <td style="color:white;" width='25%'>Zn</td>
                          <td style="color:white;" width='25%'>CaO</td>
                          <td style="color:white;" width='25%'>B2O3</td>
                        </tr>
                        <tr class="text-center" style="font-weight:bold;">
                          <td style="padding:10px"><?php echo angka_ribuan_2((($real_material['MgSO4'] * 0.16) + ($real_material['Kieserite'] * 0.27) + ($real_material['Dolomite'] * 0.18) + ($real_material['Kieserite_G'] * 0.27)) / $tonase); ?></td>
                          <td style="padding:10px"><?php echo angka_ribuan_2((($real_material['ZnSO4'] * 0.21)) / $tonase); ?></td>
                          <td style="padding:10px"><?php echo angka_ribuan_2((($real_material['Dolomite'] * 0.39) + ($real_material['CaCl2'] * 0.3)) / $tonase); ?></td>
                          <td style="padding:10px"><?php echo angka_ribuan_2((($real_material['Borax'] * 0.48)) / $tonase); ?></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row mb-2">
            <div class="col-lg-4">
              <div class="row mb-1">
                <div class="col-lg-12 p-1">
                  <div class="card shadow" style="width:100%;">
                    <div class="card-body" style="padding:0;">
                      <table class="table_pm">
                        <tr style="background-color:#008080;font-weight:bold;">
                          <td style="color:white;">Content : </td>
                          <td>
                            <select class="form-control select" name="select_content" id="select_content" onchange="javascript:select_main_filter();">
<?php
  $option_content1 = "";
  $option_content2 = "";
  $option_content3 = "";
  $option_content4 = "";
  $option_content5 = "";
  switch ($content) {
    case 'NPKMg':
      $option_content1 = "selected";
    break;
    case 'Nitrogen':
      $option_content2 = "selected";
    break;
    case 'P2O5':
      $option_content3 = "selected";
    break;
    case 'K2O':
      $option_content4 = "selected";
    break;
    case 'MgO':
      $option_content5 = "selected";
    break;
  }
?>
                              <option value="NPKMg" style="color:black;" <?php echo $option_content1; ?>>NPKMg</option>
                              <option value="Nitrogen" style="color:black;" <?php echo $option_content2; ?>>Nitrogen</option>
                              <option value="P2O5" style="color:black;" <?php echo $option_content3; ?>>P2O5</option>
                              <option value="K2O" style="color:black;" <?php echo $option_content4; ?>>K2O</option>
                              <option value="MgO" style="color:black;" <?php echo $option_content5; ?>>MgO</option>
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
                      <canvas id="diagram_unsur_content"></canvas>
<?php
  $a = 1;
  $unsur_real = "";
  $unsur_std = "";
  $unsur_real_acc = 0;
  $unsur_std_acc = 0;
  $max = 0;
  $max2 = 0;
  while ($a <= 21) {
    switch ($content) {
      case 'Nitrogen':
        $content_real = ($unsur_content['Urea']['B'.$a] * 0.46) + ($unsur_content['Za']['B'.$a] * 0.21) + ($unsur_content['DAP']['B'.$a] * 0.18);
      break;
      case 'P2O5':
        $content_real = ($unsur_content['TSP']['B'.$a] * 0.46) + ($unsur_content['DAP']['B'.$a] * 0.46);
      break;
      case 'K2O':
        $content_real = ($unsur_content['K2SO4']['B'.$a] * 0.5) + ($unsur_content['KCL']['B'.$a] * 0.6);
      break;
      case 'MgO':
        $content_real = ($unsur_content['Kieserite']['B'.$a] * 0.27) + ($unsur_content['MgSO4']['B'.$a] * 0.21) + ($unsur_content['Dolomid']['B'.$a] * 0.18);
      break;

      default:
        $content_real = ($unsur_content['Urea']['B'.$a] * 0.46) + ($unsur_content['Za']['B'.$a] * 0.21) + ($unsur_content['DAP']['B'.$a] * 0.18);
        $content_real += ($unsur_content['TSP']['B'.$a] * 0.46) + ($unsur_content['DAP']['B'.$a] * 0.46);
        $content_real += ($unsur_content['K2SO4']['B'.$a] * 0.5) + ($unsur_content['KCL']['B'.$a] * 0.6);
        $content_real += ($unsur_content['Kieserite']['B'.$a] * 0.27) + ($unsur_content['MgSO4']['B'.$a] * 0.21) + ($unsur_content['Dolomid']['B'.$a] * 0.18);
      break;
    }
    if($a == 1){
      $unsur_real_acc = $content_real;
      $unsur_std_acc = $unsur_budget_content[$a];
      $unsur_real = round($unsur_real_acc / $luas);
      $unsur_std = round($unsur_std_acc / $luas);
      $max = $content_real;
      $max2 = $unsur_budget_content[$a];
    }
    else{
      $unsur_real_acc += $content_real;
      $unsur_std_acc += $unsur_budget_content[$a];
      $unsur_real .= ", ".round($unsur_real_acc / $luas);
      $unsur_std .= ", ".round($unsur_std_acc / $luas);
      if($max < $unsur_real_acc){
        $max = $unsur_real_acc;
      }
      if($max2 < $unsur_std_acc){
        $max2 = $unsur_std_acc;
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
  var config_unsur_content = {
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
          <?php echo $unsur_std; ?>
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
          <?php echo $unsur_real; ?>
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
              </div>
            </div>

            <div class="col-lg-4">
              <div class="row mb-1">
                <div class="col-lg-12 p-1">
                  <div class="card shadow" style="width:100%;">
                    <div class="card-body" style="padding:0;">
                      <table class="table_pm">
                        <tr style="background-color:#008080;font-weight:bold;">
                          <td style="color:white;">Scheme : </td>
                          <td>
                            <select class="form-control select" name="select_scheme" id="select_scheme" onchange="javascript:select_main_filter();">
<?php
  $option_scheme1 = "";
  $option_scheme2 = "";
  switch ($scheme) {
    case 'SKAL0000001':
      $option_scheme1 = "selected";
    break;
    case 'SKAL0000002':
      $option_scheme2 = "selected";
    break;
  }
?>
                              <option value="SKAL0000001" style="color:black;" <?php echo $option_scheme1; ?>>K2SO4</option>
                              <option value="SKAL0000002" style="color:black;" <?php echo $option_scheme2; ?>>KCL</option>
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
                      <canvas id="diagram_unsur_scheme"></canvas>
<?php
  $a = 1;
  $unsur_real = "";
  $unsur_std = "";
  $unsur_real_acc = 0;
  $unsur_std_acc = 0;
  $max = 0;
  $max2 = 0;
  $date1 = strtotime($tgl_rencana_forcing) / 86400;
  $date2 = strtotime($lokasi['tgl_mulai_rawat']) / 86400;
  $umur_f = ceil(($date1-$date2) / 30.4583333333333) - 2;
  while ($a <= 21) {
    if($scheme == "SKAL0000001" && $iklim[$a] != 2){
      if($a <= 5){
        $scheme_std = $unsur_budget_scheme['B'.$a] * 0.8;
      }
      else if($a <= $umur_f){
        $scheme_std = $unsur_budget_scheme['B'.$a] * 0.3;
      }
      else{
        $scheme_std = $unsur_budget_scheme['B'.$a] * 1;
      }
    }
    else if($iklim[$a] != 2){
      if($a <= 5){
        $scheme_std = $unsur_budget_scheme['B'.$a] * 0.2;
      }
      else if($a <= $umur_f){
        $scheme_std = $unsur_budget_scheme['B'.$a] * 0.7;
      }
      else{
        $scheme_std = $unsur_budget_scheme['B'.$a] * 0;
      }
    }
    else{
      $scheme_std = $unsur_budget_scheme['B'.$a] * 1;
    }
    if($a == 1){
      $unsur_real_acc = $unsur_scheme['B'.$a];
      $unsur_std_acc = $scheme_std;
      $unsur_real = round($unsur_real_acc / $luas);
      $unsur_std = round($unsur_std_acc / $luas);
      $max = $unsur_scheme['B'.$a];
      $max2 = $scheme_std;
    }
    else{
      $unsur_real_acc += $unsur_scheme['B'.$a];
      $unsur_std_acc += $scheme_std;
      $unsur_real .= ", ".round($unsur_real_acc / $luas);
      $unsur_std .= ", ".round($unsur_std_acc / $luas);
      if($max < $unsur_real_acc){
        $max = $unsur_real_acc;
      }
      if($max2 < $unsur_std_acc){
        $max2 = $unsur_std_acc;
      }
    }
    $a++;
  }

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
    else if($i_f == 5){
      $bu_f .= ", ".($max / $luas);
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
  var config_unsur_scheme = {
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
          <?php echo $unsur_std; ?>
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
          <?php echo $unsur_real; ?>
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
              </div>
            </div>

            <div class="col-lg-4 p-1">
              <div class="row mb-1">
                <div class="col-lg-12 p-1">
                  <div class="card shadow" style="width:100%;">
                    <div class="card-header py-0 text-center" style="background-color:#008080;">
                      <span style="color:white;font-size:14px;"><b>Analisa Daun</b></span>
                    </div>
                    <div class="card-body" style="padding:0;">
                      <table class="table_pm" style="font-weight:bold;">
                        <tr style="background-color:#008080;">
                          <td style="color:white;">Tanggal Pengamatan</td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    $tgl_pengamatan_analisa_daun = NULL;
  }
  else{
    $tgl_pengamatan_analisa_daun = $pengamatan_daun['tgl_terima_sampel'];
  }
?>
                          <td style="color:white;" class="text-right"><?php echo $tgl_pengamatan_analisa_daun; ?></td>
                        </tr>
                        <tr style="background-color:#008080;">
                          <td style="color:white;">Umur Saat Pengamatan</td>
<?php
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
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
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
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
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
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
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
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
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
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
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
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
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
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
              </div>

              <div class="row">
                <div class="col-lg-12 p-1">
                  <div class="card shadow" style="width:100%;">
                    <div class="card-body" style="padding:0;">
                      <table class="table_pm" style="font-weight:bold;">
                        <tr class="text-center" style="background-color:#008080;">
                          <td style="color:white;" rowspan="2" width='34%'>Umur</td>
                          <td style="color:white;" colspan="2" width='66%'>Material</td>
                        </tr>
                        <tr class="text-center" style="background-color:#008080;">
                          <td style="color:white;">K2SO4</td>
                          <td style="color:white;">KCL</td>
                        </tr>
<?php
  if($K2SO4_KCL['K2SO4_1'] + $K2SO4_KCL['KCL_1'] != 0){
    $K2SO4_1 = ($K2SO4_KCL['K2SO4_1'] / ($K2SO4_KCL['K2SO4_1'] + $K2SO4_KCL['KCL_1'])) * 100;
    $KCL_1 = ($K2SO4_KCL['KCL_1'] / ($K2SO4_KCL['K2SO4_1'] + $K2SO4_KCL['KCL_1'])) * 100;
  }
  else{
    $K2SO4_1 = 0;
    $KCL_1 = 0;
  }

  if($K2SO4_KCL['K2SO4_2'] + $K2SO4_KCL['KCL_2'] != 0){
    $K2SO4_2 = ($K2SO4_KCL['K2SO4_2'] / ($K2SO4_KCL['K2SO4_2'] + $K2SO4_KCL['KCL_2'])) * 100;
    $KCL_2 = ($K2SO4_KCL['KCL_2'] / ($K2SO4_KCL['K2SO4_2'] + $K2SO4_KCL['KCL_2'])) * 100;
  }
  else{
    $K2SO4_2 = 0;
    $KCL_2 = 0;
  }

  if($K2SO4_KCL['K2SO4_3'] + $K2SO4_KCL['KCL_3'] != 0){
    $K2SO4_3 = ($K2SO4_KCL['K2SO4_3'] / ($K2SO4_KCL['K2SO4_3'] + $K2SO4_KCL['KCL_3'])) * 100;
    $KCL_3 = ($K2SO4_KCL['KCL_3'] / ($K2SO4_KCL['K2SO4_3'] + $K2SO4_KCL['KCL_3'])) * 100;
  }
  else{
    $K2SO4_3 = 0;
    $KCL_3 = 0;
  }
?>
                        <tr>
                          <td>0 Sampai 5</td>
                          <td class="text-center"><?php echo round($K2SO4_1); ?>%</td>
                          <td class="text-center"><?php echo round($KCL_1); ?>%</td>
                        </tr>
                        <tr>
                          <td>5 Sampai F-2</td>
                          <td class="text-center"><?php echo round($K2SO4_2); ?>%</td>
                          <td class="text-center"><?php echo round($KCL_2); ?>%</td>
                        </tr>
                        <tr>
                          <td>F-2 Sampai H</td>
                          <td class="text-center"><?php echo round($K2SO4_3); ?>%</td>
                          <td class="text-center"><?php echo round($KCL_3); ?>%</td>
                        </tr>
                      </table>
                    </div>
                  </div>
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
    var fertilizer = $('#select_fertilizer').val();
    var type = $('#select_type').val();
    var fertilizer_2 = $('#select_fertilizer_2').val();
    var compare = $('#select_compare').val();
    var content = $('#select_content').val();
    var scheme = $('#select_scheme').val();

    window.location.href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=<?php echo $page; ?>&lokasi="+lokasi+"&fertilizer="+fertilizer+"&type="+type+"&fertilizer_2="+fertilizer_2+"&compare="+compare+"&content="+content+"&scheme="+scheme;
  }
  window.onload = function(){
		var ctx_unsur = document.getElementById('diagram_unsur').getContext('2d');
		window.myBar = new Chart(ctx_unsur, config_unsur);
		var ctx_unsur_content = document.getElementById('diagram_unsur_content').getContext('2d');
		window.myBar = new Chart(ctx_unsur_content, config_unsur_content);
		var ctx_unsur_scheme = document.getElementById('diagram_unsur_scheme').getContext('2d');
		window.myBar = new Chart(ctx_unsur_scheme, config_unsur_scheme);
	};
</script>
