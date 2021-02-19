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
            <a class="collapse-item small p-1" href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=CTF1&lokasi=<?php echo $lokasi['lokasi']; ?>">Summary</a>
            <a class="collapse-item small p-1" href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=CTF2&lokasi=<?php echo $lokasi['lokasi']; ?>">Activity</a>
            <a class="collapse-item small p-1 active" href="#">Growth</a>
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
                Fertilizer Growth
              </b></span>
              <span class="d-sm-none" style="color:black;font-size:12px;"><b>
                <a href="/PIS/index.php/WIP_PM_Dashboard/plantation_group?pg=<?php echo $pg_wil['pg']; ?>"><?php echo $pg_wil['pg']; ?></a> -
                <a href="/PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=<?php echo $pg_wil['wilayah']; ?>"><?php echo $pg_wil['wilayah']; ?></a> -
                <?php echo $lokasi['lokasi']; ?> -
                Fertilizer Growth
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

    $umur = ($date1-$date2) / 30.4583333333333;

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
                <div class="col-lg-12 p-1">
                  <div class="card shadow" style="width:100%;">
                    <div class="card-body" style="padding:0;">
                      <table class="table_pm">
                        <tr style="background-color:#008080;font-weight:bold;">
                          <td style="color:white;">Content : </td>
                          <td>
                            <select class="form-control select" name="select_content" id="select_content" onchange="javascript:select_main_filter();" style="color:black;">
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
                              <option value="NPKMg" <?php echo $option_content1; ?>>NPKMg</option>
                              <option value="Nitrogen" <?php echo $option_content2; ?>>Nitrogen</option>
                              <option value="P2O5" <?php echo $option_content3; ?>>P2O5</option>
                              <option value="K2O" <?php echo $option_content4; ?>>K2O</option>
                              <option value="MgO" <?php echo $option_content5; ?>>MgO</option>
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
                    <div class="card-body" style="padding:0;">
                      <canvas id="diagram_content"></canvas>
<?php
  $a = 1;
  $unsur_real = 0;
  $unsur_std = "";
  $unsur_real_acc = 0;
  $unsur_std_acc = 0;
  $max = 0;
  $max2 = 0;
  while ($a <= 9) {
    switch ($content) {
      case 'Nitrogen':
        $unsur_real = ($unsur_forcing['Urea']['F'.$a] * 0.46) + ($unsur_forcing['Za']['F'.$a] * 0.21) + ($unsur_forcing['DAP']['F'.$a] * 0.18);
      break;
      case 'P2O5':
        $unsur_real = ($unsur_forcing['TSP']['F'.$a] * 0.46) + ($unsur_forcing['DAP']['F'.$a] * 0.46);
      break;
      case 'K2O':
        $unsur_real = ($unsur_forcing['K2SO4']['F'.$a] * 0.5) + ($unsur_forcing['KCL']['F'.$a] * 0.6);
      break;
      case 'MgO':
        $unsur_real = ($unsur_forcing['Kieserite']['F'.$a] * 0.27) + ($unsur_forcing['MgSO4']['F'.$a] * 0.21) + ($unsur_forcing['Dolomid']['F'.$a] * 0.18);
      break;

      default:
        $unsur_real = ($unsur_forcing['Urea']['F'.$a] * 0.46) + ($unsur_forcing['Za']['F'.$a] * 0.21) + ($unsur_forcing['DAP']['F'.$a] * 0.18);
        $unsur_real += ($unsur_forcing['TSP']['F'.$a] * 0.46) + ($unsur_forcing['DAP']['F'.$a] * 0.46);
        $unsur_real += ($unsur_forcing['K2SO4']['F'.$a] * 0.5) + ($unsur_forcing['KCL']['F'.$a] * 0.6);
        $unsur_real += ($unsur_forcing['Kieserite']['F'.$a] * 0.27) + ($unsur_forcing['MgSO4']['F'.$a] * 0.21) + ($unsur_forcing['Dolomid']['F'.$a] * 0.18);
      break;
    }
    if($a == 1){
      $unsur_real_acc = $unsur_real / $luas;
      $unsur_std_acc = $unsur_std_forcing[$a];
      $unsur_real_f = round($unsur_real_acc, 2);
      $unsur_std = round($unsur_std_acc, 2);
      $max = $unsur_real_acc;
      $max2 = $unsur_std_forcing[$a];
      // echo "<pre>";
      // var_dump($max);
      // var_dump($max2);
      // echo "</pre>";
      // die();
    }
    else{
      $unsur_real_acc += $unsur_real / $luas;
      $unsur_std_acc += $unsur_std_forcing[$a];
      $unsur_real_f .= ", ".round($unsur_real_acc, 2);
      $unsur_std .= ", ".round($unsur_std_acc, 2);
      if($max < $unsur_real_acc){
        $max = $unsur_real_acc;
      }
      if($max2 < $unsur_std_acc){
        $max2 = $unsur_std_acc;
      }
    }
    $a++;
  }

  if($max <= $max2){
  $max = $max2;
  }
?>
<script>
  var config_content = {
    type: 'bar',
    data: {
      labels: ['F-7', 'F-6', 'F-5', 'F-4', 'F-3', 'F-2', 'F-1', 'F-0', 'F+1'],
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
          0, 0, 0, 0, 0, 0, 0, <?php echo $max; ?>, 0
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
          <?php echo $unsur_real_f; ?>
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

            <div class="col-lg-3 p-1">
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
                      <td style="color:white;" class="text-right"><?php echo format_tgl($tgl_pengamatan_analisa_daun); ?></td>
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

            <div class="col-lg-5 p-1">
              <div class="card shadow" style="width:100%;">
                <div class="card-body" style="padding:5px;">
                  <canvas id="diagram_frekuensi_golden_time"></canvas>
<?php
  $a = 1;
  $gt = "";
  $others = "";
  while ($a <= 9) {
    if($a == 1){
      $gt = $golden_time_frocing['G'.$a];
      $others = $golden_time_frocing['O'.$a];
    }
    else{
      $gt .= ", ".$golden_time_frocing['G'.$a];
      $others .= ", ".$golden_time_frocing['O'.$a];
    }
    $a++;
  }
?>
<script>
  var config_frekuensi_golden_time = {
    type: 'bar',
    data: {
    labels: ['F-7', 'F-6', 'F-5', 'F-4', 'F-3', 'F-2', 'F-1', 'F-0', 'F+1'],
    datasets: [{
      type: 'line',
      label: 'Others Time',
      borderColor: '#0000FF',
      backgroundColor : '#0000FF',
      borderWidth: 2,
      pointRadius: 3,
      fill: false,
      data: [
        <?php echo $others; ?>
      ]
    },{
      type: 'bar',
      label: 'Golden Time',
      borderColor: '#008000',
      backgroundColor : '#008000',
      borderWidth: 0,
      pointRadius: 0,
      fill: false,
      data: [
        <?php echo $gt; ?>
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
            max: 6,
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
          </div>

          <div class="row mb-2">
            <div class="col-lg-6 p-1">
              <div class="card shadow" style="width:100%;">
                <div class="card-header py-0 text-center" style="background-color:#008080;">
                  <span style="color:white;"><b>Chart Berat Tanaman</b></span>
                </div>
                <div class="card-body" style="padding:5px;">
                  <canvas id="diagram_berat_tanaman"></canvas>
<?php
  $a = 1;
  $bt_real = "";
  $bt_std = "";
  while ($a <= 9) {
    if($a == 1){
      $bt_real = $berat_tanaman['F'.$a];
      if($std_berat_tanaman[$a] != NULL){
        $bt_std = round($std_berat_tanaman[$a], 2);
      }
      else{
        $bt_std = NULL;
      }
    }
    else{
      $bt_real .= ", ".$berat_tanaman['F'.$a];
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
            max: 3,
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

            <div class="col-lg-3">
              <div class="row mb-1">
                <div class="col-lg-12 p-1">
                  <div class="card shadow" style="width:100%;">
                    <div class="card-header py-0 text-center" style="background-color:#008080;">
                      <span style="color:white;font-size:14px;"><b>Berat Tanaman</b></span>
                    </div>
                    <div class="card-body" style="padding:0;">
                      <table class="table_pm text-center" style="font-weight:bold;">
                        <tr>
                          <td>F-7</td>
<?php
  $cek_bt = 0;
  $cek_color = "";
  if($berat_tanaman['F1'] >= $std_berat_tanaman['1']){
    $color_bt = "#008000";
  }
  else{
    $color_bt = "#FF0000";
  }
  if($berat_tanaman['F1'] != NULL){
    $cek_bt = $berat_tanaman['F1'];
    $cek_color = $color_bt;
  }
?>
                          <td style="color:<?php echo $color_bt; ?>;"><?php echo angka_ribuan_2($berat_tanaman['F1']); ?></td>
                        </tr>
                        <tr>
                          <td>F-6</td>
<?php
  if($berat_tanaman['F2'] >= $std_berat_tanaman['2']){
    $color_bt = "#008000";
  }
  else{
    $color_bt = "#FF0000";
  }
  if($berat_tanaman['F2'] != NULL){
    $cek_bt = $berat_tanaman['F2'];
    $cek_color = $color_bt;
  }
?>
                          <td style="color:<?php echo $color_bt; ?>;"><?php echo angka_ribuan_2($berat_tanaman['F2']); ?></td>
                        </tr>
                        <tr>
                          <td>F-5</td>
<?php
  if($berat_tanaman['F3'] >= $std_berat_tanaman['3']){
    $color_bt = "#008000";
  }
  else{
    $color_bt = "#FF0000";
  }
  if($berat_tanaman['F3'] != NULL){
    $cek_bt = $berat_tanaman['F3'];
    $cek_color = $color_bt;
  }
?>
                          <td style="color:<?php echo $color_bt; ?>;"><?php echo angka_ribuan_2($berat_tanaman['F3']); ?></td>
                        </tr>
                        <tr>
                          <td>F-4</td>
<?php
  if($berat_tanaman['F4'] >= $std_berat_tanaman['4']){
    $color_bt = "#008000";
  }
  else{
    $color_bt = "#FF0000";
  }
  if($berat_tanaman['F4'] != NULL){
    $cek_bt = $berat_tanaman['F4'];
    $cek_color = $color_bt;
  }
?>
                          <td style="color:<?php echo $color_bt; ?>;"><?php echo angka_ribuan_2($berat_tanaman['F4']); ?></td>
                        </tr>
                        <tr>
                          <td>F-3</td>
<?php
  if($berat_tanaman['F5'] >= $std_berat_tanaman['5']){
    $color_bt = "#008000";
  }
  else{
    $color_bt = "#FF0000";
  }
  if($berat_tanaman['F5'] != NULL){
    $cek_bt = $berat_tanaman['F5'];
    $cek_color = $color_bt;
  }
?>
                          <td style="color:<?php echo $color_bt; ?>;"><?php echo angka_ribuan_2($berat_tanaman['F5']); ?></td>
                        </tr>
                        <tr>
                          <td>F-2</td>
<?php
  if($berat_tanaman['F6'] >= $std_berat_tanaman['6']){
    $color_bt = "#008000";
  }
  else{
    $color_bt = "#FF0000";
  }
  if($berat_tanaman['F6'] != NULL){
    $cek_bt = $berat_tanaman['F6'];
    $cek_color = $color_bt;
  }
?>
                          <td style="color:<?php echo $color_bt; ?>;"><?php echo angka_ribuan_2($berat_tanaman['F6']); ?></td>
                        </tr>
                        <tr>
                          <td>F-1</td>
<?php
  if($berat_tanaman['F7'] >= $std_berat_tanaman['7']){
    $color_bt = "#008000";
  }
  else{
    $color_bt = "#FF0000";
  }
  if($berat_tanaman['F7'] != NULL){
    $cek_bt = $berat_tanaman['F7'];
    $cek_color = $color_bt;
  }
?>
                          <td style="color:<?php echo $color_bt; ?>;"><?php echo angka_ribuan_2($berat_tanaman['F7']); ?></td>
                        </tr>
                        <tr>
                          <td>F-0</td>
<?php
  if($berat_tanaman['F8'] >= $std_berat_tanaman['8']){
    $color_bt = "#008000";
  }
  else{
    $color_bt = "#FF0000";
  }
  if($berat_tanaman['F8'] != NULL){
    $cek_bt = $berat_tanaman['F8'];
    $cek_color = $color_bt;
  }
?>
                          <td style="color:<?php echo $color_bt; ?>;"><?php echo angka_ribuan_2($berat_tanaman['F8']); ?></td>
                        </tr>
                        <tr>
                          <td>F+1</td>
<?php
  if($berat_tanaman['F9'] >= $std_berat_tanaman['9']){
    $color_bt = "#008000";
  }
  else{
    $color_bt = "#FF0000";
  }
  if($berat_tanaman['F9'] != NULL){
    $cek_bt = $berat_tanaman['F9'];
    $cek_color = $color_bt;
  }
?>
                          <td style="color:<?php echo $color_bt; ?>;"><?php echo angka_ribuan_2($berat_tanaman['F9']); ?></td>
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
                      <table class="table_pm text-center" style="font-weight:bold;">
                        <tr style="background-color:#008080">
                          <td style="padding-top:15px;padding-bottom:15px;" width='50%'>Saat Ini</td>
                          <td style="padding-top:15px;padding-bottom:15px;" width='50%'>F-0</td>
                        </tr>
                        <tr>
                          <td style="padding-top:15px;padding-bottom:15px;background-color:<?php echo $cek_color; ?>;color:white;" width='50%'><?php echo angka_ribuan_2($cek_bt); ?></td>
<?php
  if($berat_tanaman['F8'] >= $std_berat_tanaman['8']){
    $color_bt = "#008000";
  }
  else{
    $color_bt = "#FF0000";
  }
?>
                            <td style="padding-top:15px;padding-bottom:15px;background-color:<?php echo $color_bt; ?>;color:white;" width='50%'><?php echo angka_ribuan_2($berat_tanaman['F8']); ?></td>
                        </tr>
                        <tr style="background-color:#008080">
<?php
  if($lokasi['tgl_forcing_realisasi'] != NULL){
    $desc_frocing = "Sudah Forcing";
  }
  else{
    $desc_frocing = "Belum Forcing";
  }
?>
                          <td style="padding-top:15px;padding-bottom:15px;" colspan="2"><?php echo $desc_frocing; ?></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-3">
              <div class="row mb-1">
                <div class="col-lg-12 p-1">
                  <div class="card shadow" style="width:100%;">
                    <div class="card-header py-0 text-center" style="background-color:#008080;">
                      <span style="color:white;font-size:13px;"><b>Golden Time Aplikasi Spray Mekanik</b></span>
                    </div>
                    <div class="card-body" style="padding:5px;">
                      <canvas id="diagram_spray_time"></canvas>
<?php
  if($golden_time_data['Total'] != NULL){
    $spray_gt = round(($golden_time_data['GT'] / $golden_time_data['Total']) * 100);
    $spray_others = round(($golden_time_data['OT'] / $golden_time_data['Total']) * 100);
    $spray_null = round((($golden_time_data['Total'] - $golden_time_data['GT']) / $golden_time_data['Total']) * 100);
  }
  else{
    $spray_gt = round((0) * 100);
    $spray_others = round((0) * 100);
    $spray_null = round((0) * 100);
  }
  $sprey_time = $spray_gt.', '.$spray_others.', '.$spray_null;
?>
<script>
  var config_spray_time = {
    type: 'doughnut',
    data: {
      datasets: [{
        data: [
          <?php echo $sprey_time; ?>
        ],
        backgroundColor: [
          '#4169E1',
          '#FF8C00',
          '#228B22'
        ],
        label: 'Cost and Production'
      }],
      labels: [
        'Golden Time',
        'Others Time',
        'None Data'
      ]
      },
      options: {
      responsive: true,
      tooltips: {
        mode: 'point',
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
        position: 'right',
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
              </div>

              <div class="row mb-1">
                <div class="col-lg-12 p-1">
                  <div class="card shadow" style="width:100%;">
                    <div class="card-body" style="padding:0;">
                      <table class="table_pm">
                        <tr style="background-color:#008080;font-weight:bold;">
                          <td style="color:white;">Time : </td>
                          <td>
                            <select class="form-control select" name="select_volume_air" id="select_volume_air" onchange="javascript:select_main_filter();" style="color:black;">
<?php
  $option_volume_air1 = "";
  $option_volume_air2 = "";
  switch ($volume_air) {
    case 'GT':
      $option_volume_air1 = "selected";
    break;
    case 'OT':
      $option_volume_air2 = "selected";
    break;
  }
?>
                              <option value="GT" <?php echo $option_volume_air1; ?>>Golden Time</option>
                              <option value="OT" <?php echo $option_volume_air2; ?>>Others Time</option>
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
                    <div class="card-header py-0 text-center" style="background-color:#008080;">
                      <span style="color:white;font-size:14px;"><b>Water Volume</b></span>
                    </div>
                    <div class="card-body" style="padding:0;">
                      <canvas id="diagram_water_volume"></canvas>
<?php
  if($frekuensi_volume_air['Total'] != NULL){
    $water_volume_1 = round(($frekuensi_volume_air['VA1'] / $frekuensi_volume_air['Total']) * 100);
    $water_volume_2 = round(($frekuensi_volume_air['VA2'] / $frekuensi_volume_air['Total']) * 100);
    $water_volume_3 = round(($frekuensi_volume_air['VA3'] / $frekuensi_volume_air['Total']) * 100);
    $water_volume_4 = round(($frekuensi_volume_air['VA4'] / $frekuensi_volume_air['Total']) * 100);
  }
  else{
    $water_volume_1 = round((0) * 100);
    $water_volume_2 = round((0) * 100);
    $water_volume_3 = round((0) * 100);
    $water_volume_4 = round((0) * 100);
  }
  $sprey_time = $water_volume_1.', '.$water_volume_2.', '.$water_volume_3.', '.$water_volume_4;
?>
<script>
  var config_water_volume = {
    type: 'doughnut',
    data: {
      datasets: [{
        data: [
          <?php echo $sprey_time; ?>
        ],
        backgroundColor: [
          '#4169E1',
          '#FF8C00',
          '#228B22',
          '#FF0000'
        ],
        label: 'Cost and Production'
      }],
      labels: [
        '2.000',
        '3.000',
        '4.000',
        '> 4.000'
      ]
      },
      options: {
      responsive: true,
      tooltips: {
        mode: 'point',
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
        position: 'right',
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
    var content = $('#select_content').val();
    var volume_air = $('#select_volume_air').val();

    window.location.href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=<?php echo $page; ?>&lokasi="+lokasi+"&content="+content+"&volume_air="+volume_air;
  }
  window.onload = function(){
		var ctx_content = document.getElementById('diagram_content').getContext('2d');
		window.myBar = new Chart(ctx_content, config_content);
		var ctx_frekuensi_golden_time = document.getElementById('diagram_frekuensi_golden_time').getContext('2d');
		window.myBar = new Chart(ctx_frekuensi_golden_time, config_frekuensi_golden_time);
		var ctx_berat_tanaman = document.getElementById('diagram_berat_tanaman').getContext('2d');
		window.myBar = new Chart(ctx_berat_tanaman, config_berat_tanaman);
		var ctx_spray_time = document.getElementById('diagram_spray_time').getContext('2d');
		window.myBar = new Chart(ctx_spray_time, config_spray_time);
		var ctx_water_volume = document.getElementById('diagram_water_volume').getContext('2d');
		window.myBar = new Chart(ctx_water_volume, config_water_volume);
	};
</script>
