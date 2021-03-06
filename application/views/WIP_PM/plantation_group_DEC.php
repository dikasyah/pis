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
        <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Dashboard/plantation_group?page=HM&pg=<?php echo $pg; ?>">
          <i class="fas fa-fw fa-globe"></i>
          <span class="text-white-600 small">Home</span></a>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed p-1" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span class="text-white-600 small">Wilayah</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white p-1 collapse-inner rounded">
  <?php
    switch ($pg) {
      case 'PG1':
  ?>
            <h6 class="collapse-header p-1 text-center">PG1</h6>
            <a class="collapse-item small p-1" href="/PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=W01">Wilayah 1</a>
            <a class="collapse-item small p-1" href="/PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=W02">Wilayah 2</a>
            <a class="collapse-item small p-1" href="/PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=W03">Wilayah 3</a>
            <a class="collapse-item small p-1" href="/PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=W04">Wilayah 4</a>
  <?php
      break;
      case 'PG2':
  ?>
            <h6 class="collapse-header p-1 text-center">PG2</h6>
            <a class="collapse-item small p-1" href="/PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=W05">Wilayah 5</a>
            <a class="collapse-item small p-1" href="/PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=W06">Wilayah 6</a>
            <a class="collapse-item small p-1" href="/PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=W07">Wilayah 7</a>
            <a class="collapse-item small p-1" href="/PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=W08">Wilayah 8</a>
  <?php
      break;
      case 'PG3':
  ?>
            <h6 class="collapse-header p-1 text-center">PG3</h6>
            <a class="collapse-item small p-1" href="/PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=W09">Wilayah 9</a>
            <a class="collapse-item small p-1" href="/PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=W11">Wilayah 11</a>
            <a class="collapse-item small p-1" href="/PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=W12">Wilayah 12</a>
            <a class="collapse-item small p-1" href="/PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=W13">Wilayah 13</a>
            <a class="collapse-item small p-1" href="/PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=W14">Wilayah 14</a>
  <?php
      break;
      case 'PG':
  ?>
            <h6 class="collapse-header p-1 text-center">PG1</h6>
            <a class="collapse-item small p-1" href="/PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=W01">Wilayah 1</a>
            <a class="collapse-item small p-1" href="/PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=W02">Wilayah 2</a>
            <a class="collapse-item small p-1" href="/PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=W03">Wilayah 3</a>
            <a class="collapse-item small p-1" href="/PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=W04">Wilayah 4</a>
            <h6 class="collapse-header p-1 text-center">PG2</h6>
            <a class="collapse-item small p-1" href="/PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=W05">Wilayah 5</a>
            <a class="collapse-item small p-1" href="/PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=W06">Wilayah 6</a>
            <a class="collapse-item small p-1" href="/PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=W07">Wilayah 7</a>
            <a class="collapse-item small p-1" href="/PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=W08">Wilayah 8</a>
            <h6 class="collapse-header p-1 text-center">PG3</h6>
            <a class="collapse-item small p-1" href="/PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=W09">Wilayah 9</a>
            <a class="collapse-item small p-1" href="/PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=W11">Wilayah 11</a>
            <a class="collapse-item small p-1" href="/PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=W12">Wilayah 12</a>
            <a class="collapse-item small p-1" href="/PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=W13">Wilayah 13</a>
            <a class="collapse-item small p-1" href="/PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=W14">Wilayah 14</a>
  <?php
      break;
    }
  ?>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Heading -->
      <div class="sidebar-heading text-center">
        Summary
      </div>

      <li class="nav-item">
        <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Dashboard/plantation_group?page=BK&pg=<?php echo $pg; ?>">
          <i class="fas fa-fw fa-globe"></i>
          <span class="text-white-600 small">Bongkar</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Dashboard/plantation_group?page=ST&pg=<?php echo $pg; ?>">
          <i class="fas fa-fw fa-globe"></i>
          <span class="text-white-600 small">Tanam</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Dashboard/plantation_group?page=S1&pg=<?php echo $pg; ?>">
          <i class="fas fa-fw fa-globe"></i>
          <span class="text-white-600 small">Cost</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Dashboard/plantation_group?page=S2&pg=<?php echo $pg; ?>">
          <i class="fas fa-fw fa-globe"></i>
          <span class="text-white-600 small">Production</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Dashboard/plantation_group?page=S3&pg=<?php echo $pg; ?>">
          <i class="fas fa-fw fa-globe"></i>
          <span class="text-white-600 small">Boom Spray</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Dashboard/plantation_group?page=S4&pg=<?php echo $pg; ?>">
          <i class="fas fa-fw fa-globe"></i>
          <span class="text-white-600 small">Plant Growth</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Heading -->
      <div class="sidebar-heading text-center">
        Category
      </div>

      <li class="nav-item">
        <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Dashboard/plantation_group?page=FE&pg=<?php echo $pg; ?>">
          <i class="fas fa-fw fa-globe"></i>
          <span class="text-white-600 small">Fertilizer</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Dashboard/plantation_group?page=HE&pg=<?php echo $pg; ?>">
          <i class="fas fa-fw fa-globe"></i>
          <span class="text-white-600 small">Herbicide</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Dashboard/plantation_group?page=IN&pg=<?php echo $pg; ?>">
          <i class="fas fa-fw fa-globe"></i>
          <span class="text-white-600 small">Insecticide</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Dashboard/plantation_group?page=FU&pg=<?php echo $pg; ?>">
          <i class="fas fa-fw fa-globe"></i>
          <span class="text-white-600 small">Fungicide</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Dashboard/plantation_group?page=FO&pg=<?php echo $pg; ?>">
          <i class="fas fa-fw fa-globe"></i>
          <span class="text-white-600 small">Forcing</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Dashboard/plantation_group?page=SP&pg=<?php echo $pg; ?>">
          <i class="fas fa-fw fa-globe"></i>
          <span class="text-white-600 small">Springkle</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Dashboard/plantation_group?page=HA&pg=<?php echo $pg; ?>">
          <i class="fas fa-fw fa-globe"></i>
          <span class="text-white-600 small">Harvest</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Heading -->
      <div class="sidebar-heading text-center">
        Evaluation
      </div>

      <li class="nav-item">
        <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Dashboard/plantation_group?page=MA&pg=<?php echo $pg; ?>">
          <i class="fas fa-fw fa-globe"></i>
          <span class="text-white-600 small">Material</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Dashboard/plantation_group?page=AC&pg=<?php echo $pg; ?>">
          <i class="fas fa-fw fa-globe"></i>
          <span class="text-white-600 small">Activity</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <li class="nav-item">
        <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Dashboard/perlocation_pg?pg=<?php echo $pg; ?>">
          <i class="fas fa-fw fa-globe"></i>
          <span class="text-white-600 small">Perlocation</span></a>
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
                <?php if($pg != "PG") echo $pg_desc['code']; else echo "All PG"; ?> -
                Detail Group Cost
              </b></span>
              <span class="d-sm-none" style="color:black;font-size:12px;"><b>
                <?php if($pg != "PG") echo $pg_desc['code']; else echo "All PG"; ?> -
                Detail Group Cost
              </b></span>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="/PIS/index.php/WIP_PM_Dashboard/plantation_group?pg=<?php echo $pg_desc['code']; ?>&page=<?php echo $JenisStatus; ?>" role="button" aria-expanded="false">
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
                  <input type="text" name="wilayah" id="pg" class="form-control" placeholder="Lokasi" style="background-color:#20B2AA;color:black;text-align:center;font-size:25px;height:50px;" maxlength="3" value="<?php echo $pg; ?>"/>
                </div>
              </div>
            </div>

            <div class="col-lg-10 p-1">
              <div class="card shadow" style="width:100%;">
                <div class="card-header py-0 text-center" style="background-color:#008080;font-size:14px;">
                  <span style="color:white;"><b>Profile <?php echo $pg; ?></b></span>
                </div>
                <div class="card-body" style="padding:0;color:black;font-size:12px;font-weight:bold;">
                  <div class="row px-3">
                    <div class="col-lg-3" style="padding:5px;">
                      <div class="card-body" style="padding:5px;background-color:#20B2AA;">
                        <table width="100%">
                          <tbody>
                            <tr>
                              <td width="120px">
                                Senior Manager
                              </td>
                              <td>
                                <?php if($pg != "PG") echo $pg_desc['senior_manager']; else echo "-"; ?>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                Manager PQPI
                              </td>
                              <td>
                                <?php if($pg != "PG") echo $pg_desc['manager_pqpi']; else echo "-"; ?>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                Manager FS
                              </td>
                              <td>
                                <?php if($pg != "PG") echo $pg_desc['manager_fs']; else echo "-"; ?>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="2">
                                &nbsp;
                              </td>
                            </tr>
                            <tr>
                              <td colspan="2">
                                &nbsp;
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
                                <select name="status" id="status" style="color:black;font-weight:bold;width:100%;" onchange="select_main_filter()">
  <?php
    $option_status_1 = "";
    $option_status_2 = "";
    $option_status_3 = "";
    switch ($status) {
      case 'NS':
        $option_status_1 = "selected";
      break;
      case 'NSFC':
        $option_status_2 = "selected";
      break;
      case 'NSSC':
        $option_status_3 = "selected";
      break;
    }
  ?>
                                  <option value="NS" <?php echo $option_status_1; ?>>NS</option>
                                  <option value="NSFC" <?php echo $option_status_2; ?>>NSFC</option>
                                  <option value="NSSC" <?php echo $option_status_3; ?>>NSSC</option>
                                </select>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                Jenis
                              </td>
                              <td>
  <?php
    if($status == 'NSSC'){
      $disabled_jenis = 'disabled';
    }
    else{
      $disabled_jenis = '';
    }
  ?>
                                <select name="jenis" id="jenis" style="color:black;font-weight:bold;width:100%;" onchange="select_main_filter()" <?php echo $disabled_jenis; ?>>
  <?php
    $option_jenis_1 = "";
    $option_jenis_2 = "";
    $option_jenis_3 = "";
    $option_jenis_4 = "";
    switch ($jenis) {
      case 'All':
        $option_jenis_1 = "selected";
      break;
      case 'AN':
        $option_jenis_2 = "selected";
      break;
      case 'SC':
        $option_jenis_3 = "selected";
      break;
      case 'CR':
        $option_jenis_4 = "selected";
      break;
    }
  ?>
                                  <option style="color:black;font-weight:bold;width:100%;" value="All" <?php echo $option_jenis_1; ?>>All</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="AN" <?php echo $option_jenis_2; ?>>AN</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="SC" <?php echo $option_jenis_3; ?>>SC</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="CR" <?php echo $option_jenis_4; ?>>CR</option>
                                </select>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                Kelas
                              </td>
                              <td>
  <?php
    if($status == 'NSSC'){
      $disabled_kelas = 'disabled';
    }
    else{
      $disabled_kelas = '';
    }
  ?>
                                <select name="kelas" id="kelas" style="color:black;font-weight:bold;width:100%;" onchange="select_main_filter()" <?php echo $disabled_kelas; ?>>
  <?php
    $option_kelas_1 = "";
    $option_kelas_2 = "";
    $option_kelas_3 = "";
    $option_kelas_4 = "";
    switch ($kelas) {
      case 'All':
        $option_kelas_1 = "selected";
      break;
      case 'B':
        $option_kelas_2 = "selected";
      break;
      case 'S':
        $option_kelas_3 = "selected";
      break;
      case 'K':
        $option_kelas_4 = "selected";
      break;
    }
  ?>
                                  <option style="color:black;font-weight:bold;width:100%;" value="All" <?php echo $option_kelas_1; ?>>All</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="B" <?php echo $option_kelas_2; ?>>B</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="S" <?php echo $option_kelas_3; ?>>S</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="K" <?php echo $option_kelas_4; ?>>K</option>
                                </select>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                Bulan Panen
                              </td>
                              <td>
                                <select name="bulan" id="bulan" style="color:black;font-weight:bold;width:100%;" onchange="select_main_filter()">
  <?php
    $option_bulan_1 = "";
    $option_bulan_2 = "";
    $option_bulan_3 = "";
    $option_bulan_4 = "";
    $option_bulan_5 = "";
    $option_bulan_6 = "";
    $option_bulan_7 = "";
    $option_bulan_8 = "";
    $option_bulan_9 = "";
    $option_bulan_10 = "";
    $option_bulan_11 = "";
    $option_bulan_12 = "";
    $option_bulan_13 = "";
    switch ($bulan) {
      case 'All':
        $option_bulan_1 = "selected";
      break;
      case '1':
        $option_bulan_2 = "selected";
      break;
      case '2':
        $option_bulan_3 = "selected";
      break;
      case '3':
        $option_bulan_4 = "selected";
      break;
      case '4':
        $option_bulan_5 = "selected";
      break;
      case '5':
        $option_bulan_6 = "selected";
      break;
      case '6':
        $option_bulan_7 = "selected";
      break;
      case '7':
        $option_bulan_8 = "selected";
      break;
      case '8':
        $option_bulan_9 = "selected";
      break;
      case '9':
        $option_bulan_10 = "selected";
      break;
      case '10':
        $option_bulan_11 = "selected";
      break;
      case '11':
        $option_bulan_12 = "selected";
      break;
      case '12':
        $option_bulan_13 = "selected";
      break;
    }
  ?>
                                  <option style="color:black;font-weight:bold;width:100%;" value="Total" <?php echo $option_bulan_1; ?>>Total</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="1" <?php echo $option_bulan_2; ?>>Januari</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="2" <?php echo $option_bulan_3; ?>>Februari</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="3" <?php echo $option_bulan_4; ?>>Maret</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="4" <?php echo $option_bulan_5; ?>>April</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="5" <?php echo $option_bulan_6; ?>>Mei</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="6" <?php echo $option_bulan_7; ?>>Juni</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="7" <?php echo $option_bulan_8; ?>>Juli</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="8" <?php echo $option_bulan_9; ?>>Agustus</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="9" <?php echo $option_bulan_10; ?>>September</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="10" <?php echo $option_bulan_11; ?>>Oktober</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="11" <?php echo $option_bulan_12; ?>>November</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="12" <?php echo $option_bulan_13; ?>>Desember</option>
                                </select>
                              </td>
                            </tr>
                            <tr>
                              <td>
                                Umur
                              </td>
                              <td>
                                <select name="umur" id="umur" style="color:black;font-weight:bold;width:100%;" onchange="select_main_filter()">
  <?php
    $option_bulan_1 = "";
    $option_bulan_2 = "";
    $option_bulan_3 = "";
    $option_bulan_4 = "";
    $option_bulan_5 = "";
    $option_bulan_6 = "";
    $option_bulan_7 = "";
    $option_bulan_8 = "";
    $option_bulan_9 = "";
    $option_bulan_10 = "";
    $option_bulan_11 = "";
    $option_bulan_12 = "";
    $option_bulan_13 = "";
    $option_bulan_14 = "";
    $option_bulan_15 = "";
    $option_bulan_16 = "";
    $option_bulan_17 = "";
    $option_bulan_18 = "";
    $option_bulan_19 = "";
    $option_bulan_20 = "";
    $option_bulan_21 = "";
    $option_bulan_22 = "";
    $option_bulan_23 = "";
    $option_bulan_24 = "";
    $option_bulan_25 = "";
    $option_bulan_26 = "";
    switch ($umur) {
      case 'Total':
        $option_bulan_1 = "selected";
      break;
      case '1':
        $option_bulan_2 = "selected";
      break;
      case '2':
        $option_bulan_3 = "selected";
      break;
      case '3':
        $option_bulan_4 = "selected";
      break;
      case '4':
        $option_bulan_5 = "selected";
      break;
      case '5':
        $option_bulan_6 = "selected";
      break;
      case '6':
        $option_bulan_7 = "selected";
      break;
      case '7':
        $option_bulan_8 = "selected";
      break;
      case '8':
        $option_bulan_9 = "selected";
      break;
      case '9':
        $option_bulan_10 = "selected";
      break;
      case '10':
        $option_bulan_11 = "selected";
      break;
      case '11':
        $option_bulan_12 = "selected";
      break;
      case '12':
        $option_bulan_13 = "selected";
      break;
      case '13':
        $option_bulan_14 = "selected";
      break;
      case '14':
        $option_bulan_15 = "selected";
      break;
      case '15':
        $option_bulan_16 = "selected";
      break;
      case '16':
        $option_bulan_17 = "selected";
      break;
      case '17':
        $option_bulan_18 = "selected";
      break;
      case '18':
        $option_bulan_19 = "selected";
      break;
      case '19':
        $option_bulan_20 = "selected";
      break;
      case '20':
        $option_bulan_21 = "selected";
      break;
      case '21':
        $option_bulan_22 = "selected";
      break;
      case '22':
        $option_bulan_23 = "selected";
      break;
      case '23':
        $option_bulan_24 = "selected";
      break;
      case '24':
        $option_bulan_25 = "selected";
      break;
      case '25':
        $option_bulan_26 = "selected";
      break;
    }
  ?>
                                  <option style="color:black;font-weight:bold;width:100%;" value="Total" <?php echo $option_bulan_1; ?>>Total</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="1" <?php echo $option_bulan_2; ?>>1</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="2" <?php echo $option_bulan_3; ?>>2</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="3" <?php echo $option_bulan_4; ?>>3</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="4" <?php echo $option_bulan_5; ?>>4</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="5" <?php echo $option_bulan_6; ?>>5</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="6" <?php echo $option_bulan_7; ?>>6</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="7" <?php echo $option_bulan_8; ?>>7</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="8" <?php echo $option_bulan_9; ?>>8</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="9" <?php echo $option_bulan_10; ?>>9</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="10" <?php echo $option_bulan_11; ?>>10</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="11" <?php echo $option_bulan_12; ?>>11</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="12" <?php echo $option_bulan_13; ?>>12</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="13" <?php echo $option_bulan_14; ?>>13</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="14" <?php echo $option_bulan_15; ?>>14</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="15" <?php echo $option_bulan_16; ?>>15</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="16" <?php echo $option_bulan_17; ?>>16</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="17" <?php echo $option_bulan_18; ?>>17</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="18" <?php echo $option_bulan_19; ?>>18</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="19" <?php echo $option_bulan_20; ?>>19</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="20" <?php echo $option_bulan_21; ?>>20</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="21" <?php echo $option_bulan_22; ?>>21</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="22" <?php echo $option_bulan_23; ?>>22</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="23" <?php echo $option_bulan_24; ?>>23</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="24" <?php echo $option_bulan_25; ?>>24</option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="25" <?php echo $option_bulan_26; ?>>25</option>
                                </select>
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
                              <td>
                                Tahun Panen
                              </td>
                              <td>
                                <select name="tahun" id="tahun" style="color:black;font-weight:bold;width:100%;" onchange="select_main_filter()">
  <?php
    $option_tahun_1 = "";
    $option_tahun_2 = "";
    if($tahun == date('Y', strtotime($YEAR_BASE['nilai']))){
      $option_tahun_1 = "selected";
    }
    else{
      $option_tahun_2 = "selected";
    }
  ?>
                                  <option style="color:black;font-weight:bold;width:100%;" value="<?php echo date('Y', strtotime($YEAR_BASE['nilai'])); ?>" <?php echo $option_tahun_1; ?>><?php echo date('Y', strtotime($YEAR_BASE['nilai'])); ?></option>
                                  <option style="color:black;font-weight:bold;width:100%;" value="<?php echo date('Y', strtotime($YEAR_BASE['nilai'])) + 1; ?>" <?php echo $option_tahun_2; ?>><?php echo date('Y', strtotime($YEAR_BASE['nilai'])) + 1; ?></option>
                                </select>
                              </td>
                            </tr>
                            <tr>
                              <td width="120px">
                                Luas
                              </td>
                              <td>
  <?php
    $luas = $luas_tonase['luas'];
    echo angka_ribuan($luas_tonase['luas']);
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
    $tonase = $luas_tonase['tonase'];
    echo angka_ribuan($luas_tonase['tonase']);
  ?>
                                Ton
                              </td>
                            </tr>
                            <tr>
                              <td>
                                Yield
                              </td>
                              <td>
                                <?php if($luas_tonase['luas'] != NULL) echo angka_ribuan_2($luas_tonase['tonase'] / $luas_tonase['luas']); else echo "-"; ?> Ton/Ha
                              </td>
                            </tr>
                            <tr>
                              <td colspan="2">
                                &nbsp;
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="col-lg-3" style="padding:5px;">
                      <div class="card-body" style="padding:5px;background-color:#20B2AA;">
                        <table width="100%" class="text-center" style="font-weight:bold;">
                          <tbody>
                            <tr>
                              <td width="10px" style="color:#20B2AA;">
                                -
                              </td>
                              <td colspan="3">

                              </td>
                              <td width="10px" style="color:#20B2AA;">
                                -
                              </td>
                            </tr>
                            <tr>
                              <td style="color:#20B2AA;">
                                -
                              </td>
  <?php
    if(isset($performance)){
      $total_performance = $performance['Excellent'] + $performance['Good'] + $performance['Poor'];
    }
    else{
      $total_performance = 0;
    }
    if($total_performance != 0){
      $performance_excellent = round(($performance['Excellent'] / $total_performance) * 100);
      $performance_good = round(($performance['Good'] / $total_performance) * 100);
      $performance_poor = round(($performance['Poor'] / $total_performance) * 100);
    }
    else{
      $performance_excellent = round(0 * 100);
      $performance_good = round(0 * 100);
      $performance_poor = round(0 * 100);
    }
  ?>
                              <td rowspan="3" width="<?php echo $performance_excellent; ?>%" style="background-color:#32CD32;">
                                <?php if($performance_excellent != 0) echo $performance_excellent.'%'; ?>
                              </td>
                              <td rowspan="3" width="<?php echo $performance_good; ?>%" style="background-color:#FFFF00;">
                                <?php if($performance_good != 0) echo $performance_good.'%'; ?>
                              </td>
                              <td rowspan="3" width="<?php echo $performance_poor; ?>%" style="background-color:#FF0000;">
                                <?php if($performance_poor != 0) echo $performance_poor.'%'; ?>
                              </td>
                              <td style="color:#20B2AA;">
                                -
                              </td>
                            </tr>
                            <tr>
                              <td style="color:#20B2AA;">
                                -
                              </td>
                              <td style="color:#20B2AA;">
                                -
                              </td>
                            </tr>
                            <tr>
                              <td style="color:#20B2AA;">
                                -
                              </td>
                              <td style="color:#20B2AA;">
                                -
                              </td>
                            </tr>
                            <tr>
                              <td style="color:#20B2AA;">
                                -
                              </td>
                              <td colspan="3">

                              </td>
                              <td style="color:#20B2AA;">
                                -
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
            <div class="col-lg-6 p-1">
              <div class="card shadow" style="width:100%;">
                <div class="card-body" style="padding:0;">
                  <select style="color:black;" class="form-control select" name="SelectJenisStatus" id="SelectJenisStatus" onchange="javascript:select_main_filter();">
<?php
  $OptionStatus1 = "";
  $OptionStatus2 = "";
  switch($JenisStatus){
    case 'BK':
      $OptionStatus1 = "selected";
    break;
    case 'ST':
      $OptionStatus2 = "selected";
    break;
  }
?>
                    <option value="BK" style="color:black;" <?php echo $OptionStatus1; ?>>BK</option>
                    <option value="ST" style="color:black;" <?php echo $OptionStatus2; ?>>ST</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-lg-6 p-1">
              <div class="card shadow" style="width:100%;">
                <div class="card-body" style="padding:0;">
                  <select style="color:black;" class="form-control select" name="SelectElementCost" id="SelectElementCost" onchange="javascript:select_main_filter();">
<?php
  $OptionElementCost1 = "";
  $OptionElementCost2 = "";
  $OptionElementCost3 = "";
  $OptionElementCost4 = "";
  $OptionElementCost5 = "";
  $OptionElementCost6 = "";
  $OptionElementCost7 = "";
  $OptionElementCost8 = "";
  $OptionElementCost9 = "";
  $OptionElementCost10 = "";
  switch($ElementCost){
    case 'ZN01':
      $OptionElementCost1 = "selected";
    break;
    case 'ZN03':
      $OptionElementCost2 = "selected";
    break;
    case 'ZN04':
      $OptionElementCost3 = "selected";
    break;
    case 'ZN05':
      $OptionElementCost4 = "selected";
    break;
    case 'ZN06':
      $OptionElementCost5 = "selected";
    break;
    case 'ZN07':
      $OptionElementCost6 = "selected";
    break;
    case 'ZN11':
      $OptionElementCost7 = "selected";
    break;
    case 'ZN13':
      $OptionElementCost8 = "selected";
    break;
    case 'ZN14':
      $OptionElementCost9 = "selected";
    break;
    case 'ZN15':
      $OptionElementCost10 = "selected";
    break;
  }
?>
                    <option value="ZN01" style="color:black;" <?php echo $OptionElementCost1; ?>>ZN01 - Land Preparation</option>
                    <option value="ZN03" style="color:black;" <?php echo $OptionElementCost2; ?>>ZN03 - Planting</option>
                    <option value="ZN04" style="color:black;" <?php echo $OptionElementCost3; ?>>ZN04 - Road & Drainage</option>
                    <option value="ZN05" style="color:black;" <?php echo $OptionElementCost4; ?>>ZN05 - Fertilization</option>
                    <option value="ZN06" style="color:black;" <?php echo $OptionElementCost5; ?>>ZN06 - Weed Control</option>
                    <option value="ZN07" style="color:black;" <?php echo $OptionElementCost6; ?>>ZN07 - Plant Pest Control</option>
                    <option value="ZN11" style="color:black;" <?php echo $OptionElementCost7; ?>>ZN11 - Observation</option>
                    <option value="ZN13" style="color:black;" <?php echo $OptionElementCost8; ?>>ZN13 - Irrigation</option>
                    <option value="ZN14" style="color:black;" <?php echo $OptionElementCost9; ?>>ZN14 - Guard / Pull / Transportation</option>
                    <option value="ZN15" style="color:black;" <?php echo $OptionElementCost10; ?>>ZN15 - Others</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="row mb-1">
            <div class="col-lg-6 p-1">
              <div class="card shadow" style="width:100%;">
                <div class="card-header py-0 text-center" style="background-color:#008080;">
                  <span style="color:white;font-size:14px;"><b>Detail Activity</b></span>
                </div>
                <div class="card-body" style="padding:0;overflow-x:auto;">
                  <table class="table_pm">
                    <tr class="text-center" style="background-color:#008080;font-weight:bold;">
                      <td style="color:white;padding-top:10px;padding-bottom:10px;">Nama</td>
                      <td style="color:white;padding-top:10px;padding-bottom:10px;">SBT</td>
                      <td style="color:white;padding-top:10px;padding-bottom:10px;">Real</td>
                      <td style="color:white;padding-top:10px;padding-bottom:10px;">Over</td>
                    </tr>
<?php
  $TotalSBTCost = 0;
  $TotalRealCost = 0;
  foreach ($ActivityDetail as $AD) {
    if($AD->RealCost > $AD->SBT){
      $ColorRealCost = "#FF0000";
    }
    else{
      $ColorRealCost = "#32CD32";
    }
?>
                    <tr style="font-weight:bold;">
                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><?php echo $AD->ActivityCode.' - '.$AD->ActivityDesc; ?></td>
                      <td class="text-right" style="color:black;padding-top:2px;padding-bottom:2px;"><?php echo angka_ribuan($AD->SBT / $AD->Luas); ?></td>
                      <td class="text-right" style="color:black;padding-top:2px;padding-bottom:2px;color:<?php echo $ColorRealCost; ?>"><?php echo angka_ribuan($AD->RealCost / $AD->Luas); ?></td>
                      <td class="text-right" style="color:black;padding-top:2px;padding-bottom:2px;"><?php echo round(($AD->RealOver / $AD->Total) * 100).' %'; ?></td>
                    </tr>
<?php
    $TotalSBTCost += $AD->SBT;
    $TotalRealCost += $AD->RealCost;
  }
?>
                    <tr style="background-color:#008080;font-weight:bold;">
                      <td class="text-center" style="color:white;padding-top:10px;padding-bottom:10px;">Total</td>
                      <td class="text-right" style="color:white;padding-top:10px;padding-bottom:10px;"><?php echo angka_ribuan($TotalSBTCost / $AD->Luas); ?></td>
                      <td class="text-right" style="color:white;padding-top:10px;padding-bottom:10px;"><?php echo angka_ribuan($TotalRealCost / $AD->Luas); ?></td>
                      <td class="text-right" style="color:white;padding-top:10px;padding-bottom:10px;"></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="row mb-1">
                <div class="col-lg-12 p-1">
                  <div class="card shadow" style="width:100%;">
                    <div class="card-body" style="padding:0;">
                      <select style="color:black;" class="form-control select" name="SelectActivity" id="SelectActivity" onchange="javascript:select_main_filter();">
                        <option value="NULL" style="color:black;">Pilih Activity</option>
<?php
  foreach($ActivityDetail as $AD){
    if($Activity == $AD->ActivityCode){
?>
                        <option value="<?php echo $AD->ActivityCode; ?>" style="color:black;" selected><?php echo $AD->ActivityCode.' - '.$AD->ActivityDesc; ?></option>
<?php
    }
    else{
?>
                        <option value="<?php echo $AD->ActivityCode; ?>" style="color:black;"><?php echo $AD->ActivityCode.' - '.$AD->ActivityDesc; ?></option>
<?php
    }
  }
?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row mb-1">
                <div class="col-lg-12 p-1">
                  <div class="card shadow" style="width:100%;">
                    <div class="card-header py-0 text-center" style="background-color:#008080;">
                      <span style="color:white;font-size:14px;"><b>Detail Activity</b></span>
                    </div>
                    <div class="card-body" style="padding:0;overflow-x:auto;">
                      <table class="table_pm">
                        <tr class="text-center" style="background-color:#008080;font-weight:bold;">
                          <td style="color:white;padding-top:10px;padding-bottom:10px;">Lokasi</td>
                          <td style="color:white;padding-top:10px;padding-bottom:10px;">SBT</td>
                          <td style="color:white;padding-top:10px;padding-bottom:10px;">Real</td>
                          <td style="color:white;padding-top:10px;padding-bottom:10px;">Over</td>
                          <td style="color:white;padding-top:10px;padding-bottom:10px;">Keterangan</td>
                        </tr>
  <?php
    foreach ($PerActivityDetail as $PAD) {
      if($PAD->RealOver > 0){
        $ColorRealCostActivity = "#FF0000";
      }
      else{
        $ColorRealCostActivity = "#32CD32";
      }
  ?>
                        <tr style="font-weight:bold;">
<?php
  if($PAD->Keterangan == 'Rencana'){
?>
                          <td class="text-center" style="color:black;padding-top:2px;padding-bottom:2px;"><a href='/PIS/index.php/WIP_PM_Lokasi/lokasi?lokasi=<?php echo $PAD->Lokasi; ?>'><?php echo $PAD->Lokasi; ?></a></td>
<?php
  }
  else{
?>
                          <td class="text-center" style="color:black;padding-top:2px;padding-bottom:2px;"><?php echo $PAD->Lokasi; ?></td>
<?php
  }
?>
                          <td class="text-center" style="color:black;padding-top:2px;padding-bottom:2px;"><?php echo angka_ribuan($PAD->SBT); ?></td>
                          <td class="text-center" style="color:black;padding-top:2px;padding-bottom:2px;"><?php echo angka_ribuan($PAD->Biaya); ?></td>
                          <td class="text-center" style="color:black;padding-top:2px;padding-bottom:2px;color:<?php echo $ColorRealCostActivity; ?>"><?php echo angka_ribuan(abs($PAD->RealOver)); ?></td>
                          <td class="text-center" style="color:black;padding-top:2px;padding-bottom:2px;"><?php echo $PAD->Keterangan; ?></td>
                        </tr>
  <?php
    }
  ?>
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
<script>
<?php
  $longlat = explode(", ", $coordinate_center['longlat']);
?>
  function initMap() {
    var peta = new google.maps.Map(document.getElementById('peta'), {
      center:new google.maps.LatLng(<?php echo $longlat[0]; ?>, <?php echo $longlat[1]; ?>),
      zoom:12,
      mapTypeId: google.maps.MapTypeId.SATELLITE
    });
<?php
  foreach ($coordinate as $co) {
    switch ($co->performance) {
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

    $longlat = explode(", ", $co->longlat);
    $long = sizeof($longlat) - 1;
?>
    var longlat<?php echo $co->lokasi; ?> = [
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
    var lok<?php echo $co->lokasi; ?> = new google.maps.Polygon({
      paths: longlat<?php echo $co->lokasi; ?>,
      strokeColor: '#FF4500',
      strokeOpacity: 0.6,
      strokeWeight: 0.8,
      fillColor: '<?php echo $warna_isi; ?>',
      fillOpacity: 0.3
    });
    lok<?php echo $co->lokasi; ?>.setMap(peta);
    google.maps.event.addListener(lok<?php echo $co->lokasi; ?>, "click", function(event) {
      var info<?php echo $co->lokasi; ?> = "<div class='row mb-1'>" +
          "<div class='col-lg-12 text-center'>" +
            "<h3 style='color:black;'><?php echo $co->lokasi; ?></h3>" +
          "</div>" +
        "</div>" +
        "<div class='row mb-1'>" +
          "<div class='col-lg-12'>" +
            "<table width='100%' class='table_pm'>" +
              "<tr>" +
                "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>PG</b></td>" +
                "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
                "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->pg; ?></b></td>" +
              "</tr>" +
              "<tr>" +
                "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Wilayah</b></td>" +
                "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
                "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->wilayah; ?></b></td>" +
              "</tr>" +
              "<tr>" +
                "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Kebun</b></td>" +
                "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
                "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->kebun; ?></b></td>" +
              "</tr>" +
              "<tr>" +
                "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Lokasi</b></td>" +
                "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
                "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->lokasi; ?></b></td>" +
              "</tr>" +
              "<tr>" +
                "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Luas</b></td>" +
                "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
                "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->luas; ?> Ha</b></td>" +
              "</tr>" +
              "<tr>" +
                "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Status</b></td>" +
                "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
                "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->status; ?></b></td>" +
              "</tr>" +
              "<tr>" +
                "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Yield</b></td>" +
                "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
                "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php if($co->yield == NULL) echo '-'; else echo round($co->yield); ?> Ton/Ha</b></td>" +
              "</tr>" +
              "<tr>" +
                "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Umur</b></td>" +
                "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
                "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php if($co->umur == NULL) echo '-'; else echo round($co->umur); ?> Bulan</b></td>" +
              "</tr>" +
              "<tr>" +
                "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Category</b></td>" +
                "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
                "<td style='color:<?php echo $warna_isi; ?>;padding-top:1px;padding-bottom:1px;'><b><?php if($co->performance == NULL) echo '-'; else echo $co->performance; ?></b></td>" +
              "</tr>" +
<?php
    if($co->foto != NULL){
?>
              "<tr>" +
                "<td colspan='3' style='color:black;padding-top:5px;padding-bottom:1px;' align='center'>" +
                  "<img onclick='show_modal_show_foto(\"<?php echo $co->foto; ?>\")' src='<?php echo $co->foto; ?>' height='auto' width='150'>" +
                "</td>" +
              "</tr>" +
<?php
    }
?>
            "</table>" +
          "</div>" +
        "</div>";
<?php
    if($aktif == 1){
?>
      info<?php echo $co->lokasi; ?> += "<div class='row mb-1'>" +
          "<div class='col-lg-12 text-center'>" +
            "<button type='button' class='btn btn-info btn-sm' onclick='detail_lokasi(\"<?php echo $co->lokasi; ?>\", \"HOME\");'>Detail Lokasi</button>" +
          "</div>" +
        "</div>";
<?php
    }
?>
      iw<?php echo $co->lokasi; ?> = new google.maps.InfoWindow();
      iw<?php echo $co->lokasi; ?>.setContent(info<?php echo $co->lokasi; ?>);
      iw<?php echo $co->lokasi; ?>.setPosition(event.latLng);
      iw<?php echo $co->lokasi; ?>.open(peta, this);
    });
<?php
  }
?>
    if(navigator.geolocation){
      navigator.geolocation.getCurrentPosition(function(p){
        var cp_wilayah1 = new google.maps.Marker({
          position:{
            lat: p.coords.latitude,
            lng: p.coords.longitude
          },
          map: peta,
          icon: '/PIS/assets/images/marker.png'
        });
      });
    }
  }

  window.initialize = initMap;
</script>
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
    $('#pg').focus();
    $('#pg').keyup(function(){
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
    var status = $('#status').val();
    var jenis = $('#jenis').val();
    var kelas = $('#kelas').val();
    var tahun = $('#tahun').val();
    var bulan = $('#bulan').val();
    var umur = $('#umur').val();
    var jenis_status = $('#SelectJenisStatus').val();
    var ga = $('#SelectElementCost').val();
    var activity = $('#SelectActivity').val();

    var pg = $('#pg').val();
    window.location.href="/PIS/index.php/WIP_PM_Dashboard/plantation_group?page=DEC&pg="+pg+"&status="+status+"&jenis="+jenis+"&kelas="+kelas+"&tahun="+tahun+"&bulan="+bulan+"&umur="+umur+"&jenis_status="+jenis_status+"&ga="+ga+"&activity="+activity;
  }
</script>
