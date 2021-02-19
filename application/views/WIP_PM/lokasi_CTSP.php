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

      <li class="nav-item active">
        <a class="nav-link p-1" href="#">
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
                Springkle
              </b></span>
              <span class="d-sm-none" style="color:black;font-size:12px;"><b>
                <a href="/PIS/index.php/WIP_PM_Dashboard/plantation_group?pg=<?php echo $pg_wil['pg']; ?>"><?php echo $pg_wil['pg']; ?></a> -
                <a href="/PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=<?php echo $pg_wil['wilayah']; ?>"><?php echo $pg_wil['wilayah']; ?></a> -
                <?php echo $lokasi['lokasi']; ?> -
                Springkle
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
            <div class="col-lg-6">
              <div class="row mb-1">
                <div class="col-lg-9 p-1">
                  <div class="card shadow" style="width:100%;">
                    <div class="card-body" style="padding:5px;">
                      <table class="table_pm" style="font-weight:bold;">
                        <tr>
                          <td>Umur</td>
                          <td width="50px">: <?php echo $umur_siram; ?></td>
                          <td>Stasion Hujan</td>
                          <td>: <?php echo $help_histori_siram['Stasiun']; ?></td>
                        </tr>
                        <tr>
                          <td>Prioritas</td>
                          <td>: <?php echo $prioritas_siram; ?></td>
                          <td>Irrigation</td>
                          <td>: <?php echo $help_irrigator['irrigator']." (".$help_irrigator['deskripsi'].")"; ?></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="col-lg-3 p-1">
                  <div class="card shadow" style="width:100%;">
                    <div class="card-body" style="padding:0;">
                      <table class="table_pm text-center" style="font-weight:bold;">
                        <tr>
                          <td style="background-color:#008080;color:white;">Bulan Aplikasi</td>
                        </tr>
                        <tr>
                          <td>
                            <select class="form-control select" name="select_bulan_aplikasi" id="select_bulan_aplikasi" onchange="javascript:select_main_filter();" style="color:black;font-weight:bold;">
<?php
  foreach ($bulan_siram as $bs) {
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
                      <table class="table_pm text-center" style="font-weight:bold;">
                        <tr style="background-color:#008080;">
                          <td style="color:white;">SPK ID</td>
                          <td style="color:white;">Tanggal<br />Realisasi</td>
                          <td style="color:white;">Hasil Siram<br />(Ha)</td>
                        </tr>
<?php
  $total_hasil_efektif = 0;
  if($data_siram != NULL){
    foreach ($data_siram as $ds) {
?>
                        <tr>
                          <td><?php echo $ds->SPK; ?></td>
                          <td><?php echo format_tgl_min($ds->tgl_realisasi); ?></td>
                          <td><?php echo angka_ribuan_2($ds->hasil_efektif); ?></td>
                        </tr>
<?php
      $total_hasil_efektif += $ds->hasil_efektif;
    }
  }
  else{
?>
                      <tr>
                        <td colspan="3">Empty</td>
                      </tr>
<?php
  }
?>
                        <tr style="background-color:#008080;">
                          <td colspan="3"><hr/></td>
                        </tr>
                        <tr>
                          <td colspan="2">Total Siram + Hujan</td>
                          <td><?php echo angka_ribuan_2($total_hasil_efektif); ?></td>
                        </tr>
                        <tr>
                          <td colspan="2">Rencana Siram</td>
                          <td><?php echo angka_ribuan_2($luas * 3); ?></td>
                        </tr>
                        <tr style="background-color:#008080;">
                          <td colspan="3"><hr/></td>
                        </tr>
                        <tr>
                          <td colspan="2">Coverage Siram</td>
                          <td><?php echo round(($total_hasil_efektif / ($luas * 3)) * 100); ?> %</td>
                        </tr>
                        <tr>
<?php
  if((($total_hasil_efektif / ($luas * 3)) * 100) < 30){
    $category_siram = "Very Low";
    $color_siram = "#FF3300";
  }
  else if ((($total_hasil_efektif / ($luas * 3)) * 100) < 80) {
    $category_siram = "Low";
    $color_siram = "#FF6600";
  }
  else if ((($total_hasil_efektif / ($luas * 3)) * 100) < 100) {
    $category_siram = "Good";
    $color_siram = "#FFCC00";
  }
  else if ((($total_hasil_efektif / ($luas * 3)) * 100) < 110) {
    $category_siram = "Excellent";
    $color_siram = "#33CC00";
  }
  else{
    $category_siram = "Over";
    $color_siram = "#FF0000";
  }
?>
                          <td colspan="2">Category</td>
                          <td style="background-color:<?php echo $color_siram; ?>;"><?php echo $category_siram; ?></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6 p-1">
                  <div class="card shadow" style="width:100%;">
                    <div class="card-body" style="padding:0;">
                      <table class="table_pm text-center" style="font-weight:bold;">
                        <tr style="background-color:#008080;">
                          <td style="color:white;">Labour<br />(Rp)</td>
                          <td style="color:white;">Charge<br />(Rp)</td>
                          <td style="color:white;">Total Cost<br />(Rp)</td>
                        </tr>
<?php
  $biaya_siram = 0;
  $total_biaya_siram = 0;
  if($data_siram != NULL){
    foreach ($data_siram as $ds) {
      $biaya_siram = $ds->Labour + $ds->Charge;
?>
                        <tr>
                          <td class="text-right"><?php echo angka_ribuan($ds->Labour); ?></td>
                          <td class="text-right"><?php echo angka_ribuan($ds->Charge); ?></td>
                          <td class="text-right"><?php echo angka_ribuan($biaya_siram); ?></td>
                        </tr>
<?php
      $total_biaya_siram += $biaya_siram;
    }
  }
  else{
?>
                      <tr>
                        <td colspan="3">Empty</td>
                      </tr>
<?php
  }
?>
                        <tr style="background-color:#008080;">
                          <td colspan="3"><hr/></td>
                        </tr>
                        <tr>
                          <td colspan="2">Total Biaya</td>
                          <td class="text-right"><?php echo angka_ribuan($total_biaya_siram); ?></td>
                        </tr>
                        <tr>
                          <td colspan="2">Biaya / Ha</td>
                          <td class="text-right"><?php echo angka_ribuan($total_biaya_siram / $luas); ?></td>
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

            <div class="col-lg-6">
              <div class="row mb-1">
                <div class="col-lg-8">
                  <!-- <div class="row mb-1">
                    <div class="col-lg-12 p-1">
                      <div class="card shadow" style="width:100%;">
                        <div class="card-body" style="padding:0;">
                          <h1>&nbsp;</h1>
                        </div>
                      </div>
                    </div>
                  </div> -->

                  <div class="row mb-1">
                    <div class="col-lg-7 p-1">
                      <div class="card shadow" style="width:100%;">
                        <div class="card-header py-0 text-center" style="background-color:#008080;">
                          <span style="color:white;font-size:14px;"><b>Monitor Hujan</b></span>
                        </div>
                        <div class="card-body" style="padding:0;">
                          <table class="table_pm text-center" style="font-weight:bold;">
                            <tr style="background-color:#008080;">
                              <td style="color:white;">Tanggal</td>
                              <td style="color:white;">Ch (mm)</td>
                              <td style="color:white;">Next Siram</td>
                            </tr>
<?php
  if($ombrometer != NULL){
    foreach ($ombrometer as $om) {
?>
                        <tr>
                          <td><?php echo format_tgl($om->tanggal); ?></td>
                          <td><?php echo angka_ribuan_2($om->hujan); ?></td>
                          <td><?php echo format_tgl(NULL); ?></td>
                        </tr>
<?php
    }
  }
  else{
?>
                      <tr>
                        <td colspan="3">Empty</td>
                      </tr>
<?php
  }
?>
                          </table>
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-5 p-1">
                      <div class="card shadow" style="width:100%;">
                        <div class="card-header py-0 text-center" style="background-color:#008080;">
                          <span style="color:white;font-size:14px;"><b>Time Information</b></span>
                        </div>
                        <div class="card-body" style="padding:0;">
                          <table class="table_pm" style="font-weight:bold;">
                            <tr>
                              <td>Plan Time</td>
                              <td class="text-center"><?php echo round($time_information['S1'], 2); ?></td>
                            </tr>
                            <tr>
                              <td colspan="2" style="background-color:#008080;"><hr /></td>
                            </tr>
                            <tr>
                              <td>Prepare Time</td>
                              <td class="text-center"><?php echo round($time_information['S2'], 2); ?></td>
                            </tr>
                            <tr>
                              <td>Operating Time</td>
                              <td class="text-center"><?php echo round($time_information['S3'], 2); ?></td>
                            </tr>
                            <tr>
                              <td>Waiting Time</td>
                              <td class="text-center"><?php echo round($time_information['S4'], 2); ?></td>
                            </tr>
                            <tr>
                              <td>Repair Time</td>
                              <td class="text-center"><?php echo round($time_information['S5'], 2); ?></td>
                            </tr>
                            <tr>
                              <td>Down Time</td>
                              <td class="text-center"><?php echo round($time_information['S6'], 2); ?></td>
                            </tr>
                            <tr>
                              <td>Standby Time</td>
                              <td class="text-center"><?php echo round($time_information['S7'], 2); ?></td>
                            </tr>
                            <tr>
                              <td>Off Time</td>
                              <td class="text-center"><?php echo round($time_information['S8'], 2); ?></td>
                            </tr>
                            <tr>
                              <td colspan="2" style="background-color:#008080;"><hr /></td>
                            </tr>
                            <tr>
                              <td>T.Oper. Time</td>
                              <td class="text-center"><?php echo round($time_information['S9'], 2); ?></td>
                            </tr>
                            <tr>
                              <td>T.Avail. Time</td>
                              <td class="text-center"><?php echo round($time_information['S10'], 2); ?></td>
                            </tr>
                            <tr>
                              <td>Total Time</td>
                              <td class="text-center"><?php echo round($time_information['S11'], 2); ?></td>
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
                      <span style="color:white;font-size:14px;"><b>Timeline Siram</b></span>
                    </div>
                    <div class="card-body" style="padding:0;">
                      <table class="table_pm text-center" style="font-weight:bold;">
                        <tbody>
                          <tr style="background-color:#008080;">
                            <td style="color:white;">Tanggal</td>
                            <td style="color:white;">Hujan</td>
                          </tr>
<?php
  if($bulan_hujan != NULL){
    foreach ($bulan_hujan as $bh) {
?>
                          <tr>
                            <td><?php echo format_tgl($bh->tgl_realisasi); ?></td>
                            <td>-</td>
                          </tr>
<?php
    }
  }
  else{
?>
                          <tr>
                            <td class="text-center" colspan="2">Empty</td>
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
                <div class="col-lg-12 p-1">
                  <div class="card shadow" style="width:100%;">
                    <div class="card-body" style="padding:0;">
                      <table class="table_pm text-center" style="font-weight:bold;">
                        <tr style="background-color:#008080;">
                          <td colspan="6" style="color:white;">Engine Performance Index</td>
                        </tr>
                        <tr style="background-color:#008080;">
                          <td style="color:white;">Description</td>
                          <td style="color:white;">Rp/Ha</td>
                          <td style="color:white;">Rp/Hm</td>
                          <td style="color:white;">Ha/Hm</td>
                          <td style="color:white;">Feul/Hm</td>
                          <td style="color:white;">Feul/Ha</td>
                        </tr>
                        <tr style="background-color:#5F9EA0;">
                          <td colspan="6">Engine 1 (<?php if(isset($engine_real['1'])) echo $engine_real['1']['engine']; else echo "-"; ?>)</td>
                        </tr>
                        <tr>
                          <td class="text-left">Realization</td>
                          <td><?php if(isset($engine_real['1'])) echo angka_ribuan($engine_real['1']['Rp_per_Ha']); else echo "-"; ?></td>
                          <td><?php if(isset($engine_real['1'])) echo angka_ribuan($engine_real['1']['Rp_per_Hm']); else echo "-"; ?></td>
                          <td><?php if(isset($engine_real['1'])) echo angka_ribuan_2($engine_real['1']['Ha_per_Hm']); else echo "-"; ?></td>
                          <td><?php if(isset($engine_real['1'])) echo angka_ribuan_2($engine_real['1']['Fuel_per_Hm']); else echo "-"; ?></td>
                          <td><?php if(isset($engine_real['1'])) echo angka_ribuan_2($engine_real['1']['Fuel_per_Ha']); else echo "-"; ?></td>
                        </tr>
                        <tr>
                          <td class="text-left">Standart</td>
                          <td><?php if(isset($engine_real['1'])) echo angka_ribuan($engine_std['1']['Rp_per_Ha']); else echo "-"; ?></td>
                          <td><?php if(isset($engine_real['1'])) echo angka_ribuan($engine_std['1']['Rp_per_Hm']); else echo "-"; ?></td>
                          <td><?php if(isset($engine_real['1'])) echo angka_ribuan_2($engine_std['1']['Ha_per_Hm']); else echo "-"; ?></td>
                          <td><?php if(isset($engine_real['1'])) echo angka_ribuan_2($engine_std['1']['Fuel_per_Hm']); else echo "-"; ?></td>
                          <td><?php if(isset($engine_real['1'])) echo angka_ribuan_2($engine_std['1']['Fuel_per_Ha']); else echo "-"; ?></td>
                        </tr>
                        <tr>
                          <td class="text-left">Average (2015-2017)</td>
                          <td><?php if(isset($engine_real['1'])) echo angka_ribuan($engine_avg['1']['Rp_per_Ha']); else echo "-"; ?></td>
                          <td><?php if(isset($engine_real['1'])) echo angka_ribuan($engine_avg['1']['Rp_per_Hm']); else echo "-"; ?></td>
                          <td><?php if(isset($engine_real['1'])) echo angka_ribuan_2($engine_avg['1']['Ha_per_Hm']); else echo "-"; ?></td>
                          <td><?php if(isset($engine_real['1'])) echo angka_ribuan_2($engine_avg['1']['Fuel_per_Hm']); else echo "-"; ?></td>
                          <td><?php if(isset($engine_real['1'])) echo angka_ribuan_2($engine_avg['1']['Fuel_per_Ha']); else echo "-"; ?></td>
                        </tr>
                        <tr style="background-color:#5F9EA0;">
                          <td colspan="6">Engine 2 (<?php if(isset($engine_real['2']['engine'])) echo $engine_real['2']['engine']; else echo "-"; ?>)</td>
                        </tr>
<?php
  if(isset($engine_real['2']['engine'])){
?>
                        <tr>
                          <td class="text-left">Realization</td>
                          <td><?php echo angka_ribuan($engine_real['2']['Rp_per_Ha']); ?></td>
                          <td><?php echo angka_ribuan($engine_real['2']['Rp_per_Hm']); ?></td>
                          <td><?php echo angka_ribuan_2($engine_real['2']['Ha_per_Hm']); ?></td>
                          <td><?php echo angka_ribuan_2($engine_real['2']['Fuel_per_Hm']); ?></td>
                          <td><?php echo angka_ribuan_2($engine_real['2']['Fuel_per_Ha']); ?></td>
                        </tr>
                        <tr>
                          <td class="text-left">Standart</td>
                          <td><?php echo angka_ribuan($engine_std['2']['Rp_per_Ha']); ?></td>
                          <td><?php echo angka_ribuan($engine_std['2']['Rp_per_Hm']); ?></td>
                          <td><?php echo angka_ribuan_2($engine_std['2']['Ha_per_Hm']); ?></td>
                          <td><?php echo angka_ribuan_2($engine_std['2']['Fuel_per_Hm']); ?></td>
                          <td><?php echo angka_ribuan_2($engine_std['2']['Fuel_per_Ha']); ?></td>
                        </tr>
                        <tr>
                          <td class="text-left">Average (2015-2017)</td>
                          <td><?php echo angka_ribuan($engine_avg['2']['Rp_per_Ha']); ?></td>
                          <td><?php echo angka_ribuan($engine_avg['2']['Rp_per_Hm']); ?></td>
                          <td><?php echo angka_ribuan_2($engine_avg['2']['Ha_per_Hm']); ?></td>
                          <td><?php echo angka_ribuan_2($engine_avg['2']['Fuel_per_Hm']); ?></td>
                          <td><?php echo angka_ribuan_2($engine_avg['2']['Fuel_per_Ha']); ?></td>
                        </tr>
<?php
  }
  else{
?>
                        <tr>
                          <td class="text-left">Realization</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                        </tr>
                        <tr>
                          <td class="text-left">Standart</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                        </tr>
                        <tr>
                          <td class="text-left">Average (2015-2017)</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                          <td>-</td>
                        </tr>
<?php
  }
?>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mb-1">
                <div class="col-lg-12 p-1">
                  <div class="card shadow" style="width:100%;">
                    <div class="card-header py-0 text-center" style="background-color:#008080;">
                      <span style="color:white;font-size:14px;"><b>History Siram</b></span>
                    </div>
                    <div class="card-body" style="padding:0;">
                      <canvas id="diagram_histori_siram" style="padding:5px;"></canvas>
<?php
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
      window.location.href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=<?php echo $page; ?>&lokasi="+$('#lokasi').val();
      // select_main_filter();
    }
  }
  function select_main_filter(r){
    var lokasi = $('#lokasi').val();
    var bulan_aplikasi = $('#select_bulan_aplikasi').val();

    window.location.href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=<?php echo $page; ?>&lokasi="+lokasi+"&bulan_aplikasi="+bulan_aplikasi;
  }
  window.onload = function(){
		var ctx_histori_siram = document.getElementById('diagram_histori_siram').getContext('2d');
		window.myBar = new Chart(ctx_histori_siram, config_histori_siram);
		var ctx_tahun_siram = document.getElementById('diagram_tahun_siram').getContext('2d');
		window.myBar = new Chart(ctx_tahun_siram, config_tahun_siram);
  }
</script>
