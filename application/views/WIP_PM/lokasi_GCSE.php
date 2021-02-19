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

      <li class="nav-item active">
        <a class="nav-link p-1" href="#">
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
                Seedling
              </b></span>
              <span class="d-sm-none" style="color:black;font-size:12px;"><b>
                <a href="/PIS/index.php/WIP_PM_Dashboard/plantation_group?pg=<?php echo $pg_wil['pg']; ?>"><?php echo $pg_wil['pg']; ?></a> -
                <a href="/PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=<?php echo $pg_wil['wilayah']; ?>"><?php echo $pg_wil['wilayah']; ?></a> -
                <?php echo $lokasi['lokasi']; ?> -
                Seedling
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
            <div class="col-lg-5 p-1" style="overflow-x:auto;">
              <div class="card shadow" style="width:100%;">
                <div class="card-body" style="padding:0;">
                  <table class="table_pm">
                    <thead>
                      <tr class="text-center" style="background-color:#008080;font-weight:bold;">
                        <td style="color:white;" colspan="2" rowspan="2">Activity</td>
                        <td style="color:white;" colspan="2">Biaya (Rp/Ha)</td>
                      </tr>
                      <tr class="text-center" style="background-color:#008080;font-weight:bold;">
                        <td style="color:white;">Budget</td>
                        <td style="color:white;">Realization</td>
                      </tr>
                    </thead>
                    </body>
<?php
  $total_budget = 0;
  $total_real = 0;
  foreach ($activity as $act) {
    if($act->budget >= ($act->total / $luas)){
      $color_std = "#32CD32";
      $color_real = "#32CD32";
    }
    else{
      $color_std = "#FF0000";
      $color_real = "#FF0000";
    }
    $total_budget += $act->budget;
    $total_real += $act->total;
?>
                      <tr>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="/PIS/index.php/WIP_PM_Lokasi/activity_detail?lokasi=<?php echo $lokasi['lokasi']; ?>&code=<?php echo $act->code_activity; ?>&page=<?php echo $page; ?>&ec=<?php echo $element_cost; ?>&subpage=SPAC"><?php echo $act->desc_activity; ?></a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($act->budget); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan(($act->total / $luas)); ?></td>
                      </tr>
<?php
  }
  if($total_budget >= ($total_real / $luas)){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                      <tr style="font-weight:bold;">
                        <td colspan="2" class="text-center" style="color:white;background-color:#008080;">Total</td>
                        <td class="text-right"><?php echo angka_ribuan($total_budget); ?></td>
                        <td class="text-right" style="color:<?php echo $color_real; ?>;"><?php echo angka_ribuan(($total_real / $luas)); ?></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="col-lg-7">
              <div class="row mb-1">
                <div class="col-lg-3">
                  <div class="row mb-1">
                    <div class="col-lg-12 p-1">
                      <div class="card shadow" style="width:100%;">
                        <div class="card-header py-0 text-center" style="background-color:#008080;">
                          <span style="color:white;font-size:14px;"><b>Cost Impact</b></span>
                        </div>
                        <div class="card-body text-center" style="padding:10px;color:black;">
<?php
  if(($total_real / $tonase / 1000) - ($total_budget / $std_yield['yield'] / 1000) <= 0){
    $color = "#32CD32";
  }
  else{
    $color = "#FF0000";
  }
?>
                          <h4 style="font-weight:bold;color:<?php echo $color; ?>"><?php echo angka_ribuan_2(abs(($total_real / $tonase / 1000) - ($total_budget / $std_yield['yield'] / 1000))); ?></h4> Rp/Kg
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-1">
                    <div class="col-lg-12 p-1">
                      <div class="card shadow" style="width:100%;">
                        <div class="card-header py-0 text-center" style="background-color:#008080;">
                          <span style="color:white;font-size:14px;"><b>Labour</b></span>
                        </div>
                        <div class="card-body text-center" style="padding:10px;color:black;">
                          <h4 style="font-weight:bold;"><?php echo angka_ribuan($group_cost['labour'] / $luas); ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-1">
                    <div class="col-lg-12 p-1">
                      <div class="card shadow" style="width:100%;">
                        <div class="card-header py-0 text-center" style="background-color:#008080;">
                          <span style="color:white;font-size:14px;"><b>Charge</b></span>
                        </div>
                        <div class="card-body text-center" style="padding:10px;color:black;">
                          <h4 style="font-weight:bold;"><?php echo angka_ribuan($group_cost['charge'] / $luas); ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-1">
                    <div class="col-lg-12 p-1">
                      <div class="card shadow" style="width:100%;">
                        <div class="card-header py-0 text-center" style="background-color:#008080;">
                          <span style="color:white;font-size:14px;"><b>Material</b></span>
                        </div>
                        <div class="card-body text-center" style="padding:10px;color:black;">
                          <h4 style="font-weight:bold;"><?php echo angka_ribuan($group_cost['material'] / $luas); ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-9">
                  <div class="row mb-1">
                    <div class="col-lg-12 p-1">
                      <div class="card shadow" style="width:100%;">
                        <div class="card-header py-0 text-center" style="background-color:#008080;">
                          <span style="color:white;font-size:14px;"><b>Seedling</b></span>
                        </div>
                        <div class="card-body" style="padding-bottom:5px;">
                          <canvas id="diagram_trend"></canvas>
<?php
  $bu = 1;
  $total_std = 0;
  $bu_real = '';
  $bu_real_acu = 0;
  $bu_std = '';
  $fb = '';
  while ($bu <= 21) {
    $bu_real_acu += ($trend[$bu] / $luas);
    if($bu == 1){
      $bu_real = round($bu_real_acu);
    }
    else{
      $bu_real .= ', '.(round($bu_real_acu));
    }
    $bu++;
  }
  foreach($std_biaya_umur as $sbu) {
    $total_std += $sbu->biaya;
    if($sbu->umur == '1'){
      $bu_std .= round($total_std);
    }
    else{
      $bu_std .= ', '.(round($total_std));
    }
  }
  $date1 = strtotime($tgl_rencana_forcing)/86400;
  $date2 = strtotime($lokasi['tgl_mulai_rawat'])/86400;
  $umur_f = ceil(($date1-$date2)/30.4583333333333);
  $i_f = 1;
  $bu_f = '';
  if($total_std >= $bu_real_acu){
    $max_biaya_umur = $total_std;
  }
  else{
    $max_biaya_umur = $bu_real_acu;
  }
  while($i_f <= 21){
    if($i_f == 1){
      if($i_f == $umur_f){
        $bu_f .= $max_biaya_umur;
      }
      else{
        $bu_f .= '0';
      }
    }
    else if($i_f == $umur_f){
      $bu_f .= ', '.$max_biaya_umur;
    }
    else{
      $bu_f .= ', 0';
    }
    $i_f++;
  }
?>
<script>
	var config_trend = {
    type: 'bar',
    data: {
  		labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '>20'],
  		datasets: [{
  			type: 'line',
  			label: 'Std Biaya',
  			borderColor: '#00005C',
  			borderWidth: 2,
				pointRadius: 3,
  			fill: false,
  			data: [
          <?php echo $bu_std; ?>
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
  			label: 'Biaya',
  			borderColor: '#B22222',
        backgroundColor : '#B22222',
  			borderWidth: 0,
				pointRadius: 0,
  			fill: true,
  			data: [
          <?php echo $bu_real; ?>
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
            callback: function(label, index, labels) {
              return label / 1000000 + ' M';
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

                  <div class="row mb-1">
                    <div class="col-lg-12 p-1">
                      <div class="card shadow" style="width:100%;">
                        <div class="card-header py-0 text-center" style="background-color:#008080;">
                          <span style="color:white;font-size:14px;"><b>Element Cost Proportion</b></span>
                        </div>
                        <div class="card-body" style="padding-bottom:5px;">
                          <canvas id="diagram_group_cost"></canvas>
<?php
  $total_group_cost = $group_cost['labour'] + $group_cost['charge'] + $group_cost['material'];
  if($total_group_cost != NULL){
    $percen_labour = ($group_cost['labour'] / $total_group_cost) * 100;
    $percen_charge = ($group_cost['charge'] / $total_group_cost) * 100;
    $percen_material = ($group_cost['material'] / $total_group_cost) * 100;
  }
  else{
    $percen_labour = 0;
    $percen_charge = 0;
    $percen_material = 0;
  }
  $percen_group_cost = round($percen_labour, 1).', '.round($percen_charge, 1).', '.round($percen_material, 1);
?>
<script>
  var config_group_cost = {
    type: 'bar',
    data: {
    labels: ['Labour', 'Charge', 'Material'],
    datasets: [{
      label: 'Biaya',
      backgroundColor: [
				'#008080',
				'#FFA500',
				'#FF0000',
			],
      borderColor: [
				'#008080',
				'#FFA500',
				'#FF0000',
			],
      borderWidth: 1,
      data: [
        <?php echo $percen_group_cost; ?>
      ]
      }]
    },
    options: {
      responsive: true,
      legend: {
        display: false,
        position: 'bottom',
        labels: {
          usePointStyle: true,
        }
      },
      title: {
        display: false,
        text: 'Group Cost'
      },
      tooltips: {
        mode: 'index',
        intersect: false,
        callbacks: {
          label: function(tooltipItem, data) {
            var label = data.datasets[tooltipItem.datasetIndex].label;
            var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            return label + ' : ' + val + '%';
          }
        }
      },
      scales: {
        yAxes: [{
          display: false,
          gridLines: {
            display: false,
            drawBorder: false,
            drawOnChartArea: false,
          },
          ticks: {
            max: 100,
            min: 0
          }
        }],
        xAxes: [{
          gridLines: {
            display: false,
            drawBorder: true,
            drawOnChartArea: false,
          }
        }]
      },
      // animation: {
      //   onComplete: function () {
      //     var chartInstance = this.chart;
      //     var ctx = chartInstance.ctx;
      //     ctx.textAlign = "center";
      //
      //     Chart.helpers.each(this.data.datasets.forEach(function (dataset, i) {
      //       var meta = chartInstance.controller.getDatasetMeta(i);
      //       Chart.helpers.each(meta.data.forEach(function (bar, index) {
      //         ctx.fillText(dataset.data[index] + '%', bar._model.x, bar._model.y - 10);
      //       }),this)
      //     }),this);
      //   }
      // }
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
    }
  }
  window.onload = function(){
		var ctx_group_cost = document.getElementById('diagram_group_cost').getContext('2d');
		window.myBar = new Chart(ctx_group_cost, config_group_cost);
		var ctx_trend = document.getElementById('diagram_trend').getContext('2d');
		window.myBar = new Chart(ctx_trend, config_trend);
	};
</script>
