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

      <li class="nav-item active">
        <a class="nav-link p-1" href="#">
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
                Boom Spray
              </b></span>
              <span class="d-sm-none" style="color:black;font-size:12px;"><b>
                <?php if($pg != "PG") echo $pg_desc['code']; else echo "All PG"; ?> -
                Boom Spray
              </b></span>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="/PIS/index.php/WIP_PM_Dashboard" role="button" aria-expanded="false">
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
                <img class="img-profile rounded-circle" src="/PIS/index.php/assets/images/profile/empty-profile.png">
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

<?php
  if($pg != 'PG'){
?>
          <div class="row mb-2">
            <div class="col-lg-12 p-1">
              <div class="card shadow" style="width:100%;">
                <div class="card-body" style="padding:0;">
                  <div id="peta" style="width:100%;height:350px;"></div>
                </div>
              </div>
            </div>
          </div>
<?php
  }
?>

          <div class="row mb-1">
            <div class="col-lg-8">
              <div class="row mb-1">
                <div class="col-lg-12 p-1">
                  <div class="card shadow" style="width:100%;">
                    <div class="card-body" style="padding:0;">
                      <table class="table_pm">
                        <tr style="background-color:#008080;">
                          <td style="font-weight:bold;color:white;">Activity BSC</td>
                          <td>
                            <select class="form-control select" name="select_activity" id="select_activity" onchange="javascript:select_main_filter();" style="font-weight:bold;color:black;">
<?php
  $option_activity_1 = "";
  $option_activity_2 = "";
  $option_activity_3 = "";
  $option_activity_4 = "";
  $option_activity_5 = "";
  $option_activity_6 = "";
  $option_activity_7 = "";
  $option_activity_8 = "";
  switch ($activity) {
    case 'Total':
      $option_activity_1 = "selected";
    break;
    case 'Booster':
      $option_activity_2 = "selected";
    break;
    case 'Spray':
      $option_activity_3 = "selected";
    break;
    case 'Forcing':
      $option_activity_4 = "selected";
    break;
    case 'Pre':
      $option_activity_5 = "selected";
    break;
    case 'Post':
      $option_activity_6 = "selected";
    break;
    case 'Insecticide':
      $option_activity_7 = "selected";
    break;
    case 'Ripening':
      $option_activity_8 = "selected";
    break;
  }
?>
                              <option value="Total" style="color:black;font-weight:bold;" <?php echo $option_activity_1; ?>>Total Aplikasi</option>
                              <option value="Booster" style="color:black;font-weight:bold;" <?php echo $option_activity_2; ?>>Booster Herbicide</option>
                              <option value="Spray" style="color:black;font-weight:bold;" <?php echo $option_activity_3; ?>>Spray Fertilizer Mek.</option>
                              <option value="Forcing" style="color:black;font-weight:bold;" <?php echo $option_activity_4; ?>>Forcing</option>
                              <option value="Pre" style="color:black;font-weight:bold;" <?php echo $option_activity_5; ?>>Pre Herbicide</option>
                              <option value="Post" style="color:black;font-weight:bold;" <?php echo $option_activity_6; ?>>Post Herbicide</option>
                              <option value="Insecticide" style="color:black;font-weight:bold;" <?php echo $option_activity_7; ?>>Insecticide</option>
                              <option value="Ripening" style="color:black;font-weight:bold;" <?php echo $option_activity_8; ?>>Ripening</option>
                            </select>
                          </td>
                          <td>
                            <select class="form-control select" name="select_bulan_activity" id="select_bulan_activity" onchange="javascript:select_main_filter();" style="font-weight:bold;color:black;">
<?php
  $bulan_activity_1 = "";
  $bulan_activity_2 = "";
  $bulan_activity_3 = "";
  $bulan_activity_4 = "";
  $bulan_activity_5 = "";
  $bulan_activity_6 = "";
  $bulan_activity_7 = "";
  $bulan_activity_8 = "";
  $bulan_activity_9 = "";
  $bulan_activity_10 = "";
  $bulan_activity_11 = "";
  $bulan_activity_12 = "";
  $bulan_activity_13 = "";
  switch ($bulan_activity) {
    case 'Total':
      $bulan_activity_1 = "selected";
    break;
    case '1':
      $bulan_activity_2 = "selected";
    break;
    case '2':
      $bulan_activity_3 = "selected";
    break;
    case '3':
      $bulan_activity_4 = "selected";
    break;
    case '4':
      $bulan_activity_5 = "selected";
    break;
    case '5':
      $bulan_activity_6 = "selected";
    break;
    case '6':
      $bulan_activity_7 = "selected";
    break;
    case '7':
      $bulan_activity_8 = "selected";
    break;
    case '8':
      $bulan_activity_9 = "selected";
    break;
    case '9':
      $bulan_activity_10 = "selected";
    break;
    case '10':
      $bulan_activity_11 = "selected";
    break;
    case '11':
      $bulan_activity_12 = "selected";
    break;
    case '12':
      $bulan_activity_13 = "selected";
    break;
}
?>
                              <option value="Total" style="color:black;font-weight:bold;" <?php echo $bulan_activity_1; ?>>Total</option>
                              <option value="1" style="color:black;font-weight:bold;" <?php echo $bulan_activity_2; ?>>Jan</option>
                              <option value="2" style="color:black;font-weight:bold;" <?php echo $bulan_activity_3; ?>>Feb</option>
                              <option value="3" style="color:black;font-weight:bold;" <?php echo $bulan_activity_4; ?>>Mar</option>
                              <option value="4" style="color:black;font-weight:bold;" <?php echo $bulan_activity_5; ?>>Apr</option>
                              <option value="5" style="color:black;font-weight:bold;" <?php echo $bulan_activity_6; ?>>Mei</option>
                              <option value="6" style="color:black;font-weight:bold;" <?php echo $bulan_activity_7; ?>>Jun</option>
                              <option value="7" style="color:black;font-weight:bold;" <?php echo $bulan_activity_8; ?>>Jul</option>
                              <option value="8" style="color:black;font-weight:bold;" <?php echo $bulan_activity_9; ?>>Ags</option>
                              <option value="9" style="color:black;font-weight:bold;" <?php echo $bulan_activity_10; ?>>Sep</option>
                              <option value="10" style="color:black;font-weight:bold;" <?php echo $bulan_activity_11; ?>>Okt</option>
                              <option value="11" style="color:black;font-weight:bold;" <?php echo $bulan_activity_12; ?>>Nov</option>
                              <option value="12" style="color:black;font-weight:bold;" <?php echo $bulan_activity_13; ?>>Des</option>
                            </select>
                          </td>
                          <td>
                            <select class="form-control select" name="select_tahun_activity" id="select_tahun_activity" onchange="javascript:select_main_filter();" style="font-weight:bold;color:black;">
<?php
  $tahun_activity_1 = "";
  $tahun_activity_2 = "";
  $tahun_activity_3 = "";
  $tahun_activity_4 = "";
  switch ($tahun_activity) {
    case 'Total':
      $tahun_activity_1 = "selected";
    break;
    case date('Y', strtotime($YEAR_BASE['nilai'])) - 2:
      $tahun_activity_2 = "selected";
    break;
    case date('Y', strtotime($YEAR_BASE['nilai'])) - 1:
      $tahun_activity_3 = "selected";
    break;
    case date('Y', strtotime($YEAR_BASE['nilai'])):
      $tahun_activity_4 = "selected";
    break;
}
?>
                              <option value="Total" style="color:black;font-weight:bold;" <?php echo $tahun_activity_1; ?>>Total</option>
                              <option value="<?php echo date('Y', strtotime($YEAR_BASE['nilai'])) - 2; ?>" style="color:black;font-weight:bold;" <?php echo $tahun_activity_2; ?>><?php echo date('Y', strtotime($YEAR_BASE['nilai'])) - 2; ?></option>
                              <option value="<?php echo date('Y', strtotime($YEAR_BASE['nilai'])) - 1; ?>" style="color:black;font-weight:bold;" <?php echo $tahun_activity_3; ?>><?php echo date('Y', strtotime($YEAR_BASE['nilai'])) - 1; ?></option>
                              <option value="<?php echo date('Y', strtotime($YEAR_BASE['nilai'])); ?>" style="color:black;font-weight:bold;" <?php echo $tahun_activity_4; ?>><?php echo date('Y', strtotime($YEAR_BASE['nilai'])); ?></option>
                            </select>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 p-1">
                  <div class="card shadow" style="width:100%;">
                    <div class="card-body" style="padding:0;">
                      <canvas id="diagram_time_activity"></canvas>
<?php
  if($golden_time['GT'] + $golden_time['OT'] != NULL){
    $gt = round(($golden_time['GT'] / ($golden_time['GT'] + $golden_time['OT'])) * 100, 2);
    $ot = round(($golden_time['OT'] / ($golden_time['GT'] + $golden_time['OT'])) * 100, 2);
  }
  else{
    $gt = round((0) * 100);
    $ot = round((0) * 100);
  }
  $at = $gt.', '.$ot;
?>
<script>
  var config_time_activity = {
    type: 'pie',
    data: {
      datasets: [{
        data: [
          <?php echo $at; ?>
        ],
        backgroundColor: [
          '#4169E1',
          '#FF8C00'
        ],
        label: 'Cost and Production'
      }],
      labels: [
        'Golden Time',
        'Others Time'
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
        position: 'bottom',
        labels: {
          usePointStyle: true,
        }
      },
      title: {
        display: true,
        text: 'Application Time'
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
                      <canvas id="diagram_water_volume"></canvas>
<?php
  $total_volume_air = $volume_air['VA1'] + $volume_air['VA2'] + $volume_air['VA3'] + $volume_air['VA4'];
  if($total_volume_air != NULL){
    $va1 = round(($volume_air['VA1'] / $total_volume_air) * 100, 2);
    $va2 = round(($volume_air['VA2'] / $total_volume_air) * 100, 2);
    $va3 = round(($volume_air['VA3'] / $total_volume_air) * 100, 2);
    $va4 = round(($volume_air['VA4'] / $total_volume_air) * 100, 2);
  }
  else{
    $va1 = round((0) * 100);
    $va2 = round((0) * 100);
    $va3 = round((0) * 100);
    $va4 = round((0) * 100);
  }
  $va0 = $va1.', '.$va2.', '.$va3.', '.$va4;
?>
<script>
  var config_water_volume = {
    type: 'pie',
    data: {
      datasets: [{
        data: [
          <?php echo $va0; ?>
        ],
        backgroundColor: [
          '#4169E1',
          '#FF8C00',
          '#008000',
          '#FF00FF'
        ],
        label: 'Cost and Production'
      }],
      labels: [
        '> 4000',
        '4000',
        '3000',
        '2000'
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
        position: 'bottom',
        labels: {
          usePointStyle: true,
        }
      },
      title: {
        display: true,
        text: 'Water Volume (Ha)'
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

            <div class="col-lg-4">
              <div class="row mb-1">
                <div class="col-lg-12 p-1">
                  <div class="card shadow" style="width:100%;">
                    <div class="card-body" style="padding:0;">
                      <table class="table_pm">
                        <tr style="background-color:#008080;">
                          <td style="font-weight:bold;color:white;">Summary Penyakit</td>
                          <td>
                            <select class="form-control select" name="select_penyakit" id="select_penyakit" onchange="javascript:select_main_filter();" style="font-weight:bold;color:black;">
<?php
  $option_penyakit_1 = "";
  $option_penyakit_2 = "";
  $option_penyakit_3 = "";
  switch ($penyakit) {
    case 'MBW':
      $option_penyakit_1 = "selected";
    break;
    case 'ERW':
      $option_penyakit_2 = "selected";
    break;
    case 'PHY':
      $option_penyakit_3 = "selected";
    break;
  }
?>
                              <option value="MBW" style="color:black;font-weight:bold;" <?php echo $option_penyakit_1; ?>>MBW</option>
                              <option value="ERW" style="color:black;font-weight:bold;" <?php echo $option_penyakit_2; ?>>ERW</option>
                              <option value="PHY" style="color:black;font-weight:bold;" <?php echo $option_penyakit_3; ?>>PHY</option>
                            </select>
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
                      <canvas id="diagram_penyakit"></canvas>
<?php
  if($penyakit_total != NULL){
    $P1 = round(($penyakit_lokasi / $penyakit_total) * 100, 2);
    $PN = round((($penyakit_total - $penyakit_lokasi) / $penyakit_total) * 100, 2);
  }
  else{
    $P1 = round((0) * 100);
    $PN = round((1) * 100);
  }
  $P = $P1.', '.$PN;
?>
<script>
  var config_penyakit = {
    type: 'doughnut',
    data: {
      datasets: [{
        data: [
          <?php echo $P; ?>
        ],
        backgroundColor: [
          '#4169E1',
          '#F0F0FF'
        ],
        label: 'Cost and Production'
      }],
      labels: [
        '<?php echo $penyakit; ?> (>= 0.34)',
        'Normal (< 0.34)'
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
        display: true,
        position: 'right',
        labels: {
          usePointStyle: true,
        }
      },
      title: {
        display: false,
        text: 'Application Time'
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

          <div class="row mb-1">
            <div class="col-lg-12">
              <div class="row">
                <div class="col-lg-4">
                  <div class="row">
                    <div class="col-lg-12 p-1">
                      <table class="table_pm">
                        <tr style="background-color:#008080;font-weight:bold;">
                          <td style="color:white;">Sebaran Interval Foliar</td>
                          <td>
                            <select class="form-control select" name="select_type" id="select_type" onchange="javascript:select_main_filter();">
<?php
  if($type == 'Scatter'){
    $type_sebaran_1 = "selected";
    $type_sebaran_2 = "";
  }
  else{
    $type_sebaran_1 = "";
    $type_sebaran_2 = "selected";
  }
?>
                              <option value="Scatter" style="color:black;" <?php echo $type_sebaran_1; ?>>Scatter</option>
                              <option value="Average" style="color:black;" <?php echo $type_sebaran_2; ?>>Average</option>
                            </select>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 p-1">
                      <div class="card shadow" style="width:100%;">
                        <div class="card-body" style="padding:0;">
                          <table class="table_pm">
                            <tr style="font-weight:bold;">
                              <td style="background-color:#F0E68C;">&nbsp;</td>
                              <td style="background-color:#FFFFFF;">Fase Cepat Skema & STD</td>
                              <td style="background-color:#CCDCFF;">&nbsp;</td>
                              <td style="background-color:#FFFFFF;">Interval Foliar STD</td>
                              <td style="background-color:#FFCFCF;">&nbsp;</td>
                              <td style="background-color:#FFFFFF;">Interval Foliar Over</td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 p-1">
                      <div class="card shadow" style="width:100%;">
                        <div class="card-body" style="padding:0;padding-top:5px;">
                          <canvas id="diagram_sebaran_foliar"></canvas>
<?php
  $result = array(
    'F-7' => NULL,
    'F-6' => NULL,
    'F-5' => NULL,
    'F-4' => NULL,
    'F-3' => NULL,
    'F-2' => NULL,
    'F-1' => NULL,
    'F-0' => NULL,
    'F+1' => NULL,
    'F+2' => NULL,
    'F+3' => NULL,
    'F+4' => NULL,
    'F+5' => NULL
  );
  if($type != 'Average'){
    $dataset = "";
    foreach ($sebaran_foliar as $sf) {
      $color_bt = random_color();
      $dataset .= "
        {
          type: 'line',
          label: '$sf->lokasi',
          borderColor: '$color_bt',
          backgroundColor : '$color_bt',
          borderWidth: 2,
          pointRadius: 3,
          fill: false,
          data: [
      ";
      switch ($sf->Forcing) {
        case '-7':
          $dataset .= "
            $sf->Interval, , , , , , , , , , , ,
          ";
        break;
        case '-6':
          $dataset .= "
            , $sf->Interval, , , , , , , , , , ,
          ";
        break;
        case '-5':
          $dataset .= "
            , , $sf->Interval, , , , , , , , , ,
          ";
        break;
        case '-4':
          $dataset .= "
            , , , $sf->Interval, , , , , , , , ,
          ";
        break;
        case '-3':
          $dataset .= "
            , , , , $sf->Interval, , , , , , , ,
          ";
        break;
        case '-2':
          $dataset .= "
            , , , , , $sf->Interval, , , , , , ,
          ";
        break;
        case '-1':
          $dataset .= "
            , , , , , , $sf->Interval, , , , , ,
          ";
        break;
        case '0':
          $dataset .= "
            , , , , , , , $sf->Interval, , , , ,
          ";
        break;
        case '1':
          $dataset .= "
            , , , , , , , , $sf->Interval, , , ,
          ";
        break;
        case '2':
          $dataset .= "
            , , , , , , , , , $sf->Interval, , ,
          ";
        break;
        case '3':
          $dataset .= "
            , , , , , , , , , , $sf->Interval, ,
          ";
        break;
        case '4':
          $dataset .= "
            , , , , , , , , , , , $sf->Interval ,
          ";
        break;
        case '5':
          $dataset .= "
            , , , , , , , , , , , , $sf->Interval
          ";
        break;
      }
      $dataset .= "
          ]
        },
      ";
    }
    $toolstip = "";
  }
  else{
    foreach($sebaran_foliar as $sf){
      switch ($sf->Forcing) {
        case '-7':
          $result['F-7'] = $sf->FI.", ";
        break;
        case '-6':
          $result['F-6'] = $sf->FI.", ";
        break;
        case '-5':
          $result['F-5'] = $sf->FI.", ";
        break;
        case '-4':
          $result['F-4'] = $sf->FI.", ";
        break;
        case '-3':
          $result['F-3'] = $sf->FI.", ";
        break;
        case '-2':
          $result['F-2'] = $sf->FI.", ";
        break;
        case '-1':
          $result['F-1'] = $sf->FI.", ";
        break;
        case '0':
          $result['F-0'] = $sf->FI.", ";
        break;
        case '1':
          $result['F+1'] = $sf->FI.", ";
        break;
        case '2':
          $result['F+2'] = $sf->FI.", ";
        break;
        case '3':
          $result['F+3'] = $sf->FI.", ";
        break;
        case '4':
          $result['F+4'] = $sf->FI.", ";
        break;
        case '5':
          $result['F+5'] = $sf->FI.", ";
        break;
      }
    }
    $value = $result['F-7'].$result['F-6'].$result['F-5'].$result['F-4'].$result['F-3'].$result['F-2'].$result['F-1'].$result['F-0'].$result['F+1'].$result['F+2'].$result['F+3'].$result['F+4'].$result['F+5'];
    $dataset = "{
      type: 'line',
      label: 'Foliar',
      borderColor: '#0000FF',
      backgroundColor : '#0000FF',
      borderWidth: 2,
      pointRadius: 3,
      fill: false,
      data: [
        ".$value."
      ]
    },";
    $toolstip = "
      tooltips: {
        mode: 'index',
        intersect: false,
        callbacks: {
          label: function(tooltipItem, data) {
            var label = data.datasets[tooltipItem.datasetIndex].label;
            var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            if(label != 'Std'){
              return label + ' : ' + val;
            }
          }
        }
      },";
  }
?>
<script>
  var config_sebaran_foliar = {
    type: 'bar',
    data: {
      labels: ['F-7', 'F-6', 'F-5', 'F-4', 'F-3', 'F-2', 'F-1', 'F-0', 'F+1', 'F+2', 'F+3', 'F+4', 'F+5'],
      datasets: [{
        type: 'line',
        label: 'Std',
        borderColor: '#FF0000',
        backgroundColor : '#FF0000',
        borderWidth: 2,
        pointRadius: 3,
        fill: false,
        data: [
          30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30
        ]
      },{
        type: 'line',
        label: 'Std',
        borderColor: '#FF0000',
        backgroundColor : '#FF0000',
        borderWidth: 2,
        pointRadius: 3,
        fill: false,
        data: [
          60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60, 60
        ]
      },
      <?php echo $dataset; ?>
      {
        type: 'line',
        label: 'Std',
        borderColor: '#CCDCFF',
        backgroundColor : '#CCDCFF',
        borderWidth: 2,
        fill: true,
				lineTension: 0,
        data: [
          20, 20, 20, 20, 15, 15, 15, 15, 15, , , ,
        ]
      },{
        type: 'line',
        label: 'Std',
        borderColor: '#FFCFCF',
        backgroundColor : '#FFCFCF',
        borderWidth: 2,
        fill: true,
				lineTension: 0,
        data: [
          , , , , , , , , 90, 90, 90, 90, 90
        ]
      },{
        type: 'bar',
        label: 'Std',
        borderColor : '#F0E68C',
        backgroundColor : '#F0E68C',
        borderWidth: 2,
        pointRadius: 3,
        fill: false,
        data: [
          , , 90, , 90, , , , , , , ,
        ]
      },]
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
        text: 'Sebaran Foliar'
      },
      <?php echo $toolstip; ?>
      scales: {
        yAxes: [{
          ticks: {
            min: 0,
            max: 90,
            stepSize: 30
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

                <div class="col-lg-4">
                  <div class="row">
                    <div class="col-lg-12 p-1">
                      <table class="table_pm">
                        <tr style="background-color:#008080;font-weight:bold;">
                          <td style="color:white;">Proporsi Interval</td>
                          <td>
                            <select class="form-control select" name="select_umur_f" id="select_umur_f" onchange="javascript:select_main_filter();">
<?php
  $type_umur_f_1 = "";
  $type_umur_f_2 = "";
  $type_umur_f_3 = "";
  $type_umur_f_4 = "";
  $type_umur_f_5 = "";
  $type_umur_f_6 = "";
  $type_umur_f_7 = "";
  $type_umur_f_8 = "";
  switch ($umur_f) {
    case '-7':
      $type_umur_f_1 = "selected";
      $type_umur_f_2 = "";
      $type_umur_f_3 = "";
      $type_umur_f_4 = "";
      $type_umur_f_5 = "";
      $type_umur_f_6 = "";
      $type_umur_f_7 = "";
      $type_umur_f_8 = "";
    break;
    case '-6':
      $type_umur_f_1 = "";
      $type_umur_f_2 = "selected";
      $type_umur_f_3 = "";
      $type_umur_f_4 = "";
      $type_umur_f_5 = "";
      $type_umur_f_6 = "";
      $type_umur_f_7 = "";
      $type_umur_f_8 = "";
    break;
    case '-5':
      $type_umur_f_1 = "";
      $type_umur_f_2 = "";
      $type_umur_f_3 = "selected";
      $type_umur_f_4 = "";
      $type_umur_f_5 = "";
      $type_umur_f_6 = "";
      $type_umur_f_7 = "";
      $type_umur_f_8 = "";
    break;
    case '-4':
      $type_umur_f_1 = "";
      $type_umur_f_2 = "";
      $type_umur_f_3 = "";
      $type_umur_f_4 = "selected";
      $type_umur_f_5 = "";
      $type_umur_f_6 = "";
      $type_umur_f_7 = "";
      $type_umur_f_8 = "";
    break;
    case '-3':
      $type_umur_f_1 = "";
      $type_umur_f_2 = "";
      $type_umur_f_3 = "";
      $type_umur_f_4 = "";
      $type_umur_f_5 = "selected";
      $type_umur_f_6 = "";
      $type_umur_f_7 = "";
      $type_umur_f_8 = "";
    break;
    case '-2':
      $type_umur_f_1 = "";
      $type_umur_f_2 = "";
      $type_umur_f_3 = "";
      $type_umur_f_4 = "";
      $type_umur_f_5 = "";
      $type_umur_f_6 = "selected";
      $type_umur_f_7 = "";
      $type_umur_f_8 = "";
    break;
    case '-1':
      $type_umur_f_1 = "";
      $type_umur_f_2 = "";
      $type_umur_f_3 = "";
      $type_umur_f_4 = "";
      $type_umur_f_5 = "";
      $type_umur_f_6 = "";
      $type_umur_f_7 = "selected";
      $type_umur_f_8 = "";
    break;
    case '0':
      $type_umur_f_1 = "";
      $type_umur_f_2 = "";
      $type_umur_f_3 = "";
      $type_umur_f_4 = "";
      $type_umur_f_5 = "";
      $type_umur_f_6 = "";
      $type_umur_f_7 = "";
      $type_umur_f_8 = "selected";
    break;
  }
?>
                              <option value="-7" style="color:black;" <?php echo $type_umur_f_1; ?>>F-7</option>
                              <option value="-6" style="color:black;" <?php echo $type_umur_f_2; ?>>F-6</option>
                              <option value="-5" style="color:black;" <?php echo $type_umur_f_3; ?>>F-5</option>
                              <option value="-4" style="color:black;" <?php echo $type_umur_f_4; ?>>F-4</option>
                              <option value="-3" style="color:black;" <?php echo $type_umur_f_5; ?>>F-3</option>
                              <option value="-2" style="color:black;" <?php echo $type_umur_f_6; ?>>F-2</option>
                              <option value="-1" style="color:black;" <?php echo $type_umur_f_7; ?>>F-1</option>
                              <option value="0" style="color:black;" <?php echo $type_umur_f_8; ?>>F-0</option>
                            </select>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 p-1">
                      <div class="card shadow" style="width:100%;">
                        <div class="card-body" style="padding:0;">
                          <canvas id="diagram_interval_foliar"></canvas>
<?php
  if($proporsi_interval['Total'] != 0){
    $F1 = round(($proporsi_interval['F1'] / $proporsi_interval['Total']) * 100);
    $F2 = round(($proporsi_interval['F2'] / $proporsi_interval['Total']) * 100);
    $F3 = round(($proporsi_interval['F3'] / $proporsi_interval['Total']) * 100);
    $F4 = round(($proporsi_interval['F4'] / $proporsi_interval['Total']) * 100);
  }
  else{
    $F1 = round((0) * 100);
    $F2 = round((0) * 100);
    $F3 = round((0) * 100);
    $F4 = round((0) * 100);
  }
  $foliar = $F1.', '.$F2.', '.$F3.', '.$F4;
?>
<script>
  var config_interval_foliar = {
    type: 'doughnut',
    data: {
      datasets: [{
        data: [
          <?php echo $foliar; ?>
        ],
        backgroundColor: [
          '#B22222',
          '#FFA500',
          '#0000CD',
          '#228B22'
        ],
        label: 'Forcing'
      }],
      labels: [
        'S < 10',
        '10 < S < 15',
        '15 < S < 20',
        'S > 20'
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
        text: 'Foliar'
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

                <div class="col-lg-4">
                  <div class="row mb-1">
                    <div class="col-lg-12 p-1">
                      <div class="card shadow" style="width:100%;">
                        <div class="card-header py-0 text-center" style="background-color:#008080;font-size:14px;">
                          <span style="color:white;"><b>Trend Golden Time</b></span>
                        </div>
                        <div class="card-body" style="padding:0;padding-top:5px;">
                          <canvas id="diagram_golden_time"></canvas>
<?php
  $trend_golden_time = "";
  if($golden_time_forcing['G1'] + $golden_time_forcing['O1'] != NULL){
    $golden_time_forcing['T1'] = round(($golden_time_forcing['G1'] / ($golden_time_forcing['G1'] + $golden_time_forcing['O1'])) * 100, 2);
  }
  else{
    $golden_time_forcing['T1'] = round((0) * 100, 2);
  }
  if($golden_time_forcing['G2'] + $golden_time_forcing['O2'] != NULL){
    $golden_time_forcing['T2'] = round(($golden_time_forcing['G2'] / ($golden_time_forcing['G2'] + $golden_time_forcing['O2'])) * 100, 2);
  }
  else{
    $golden_time_forcing['T2'] = round((0) * 100, 2);
  }
  if($golden_time_forcing['G3'] + $golden_time_forcing['O3'] != NULL){
    $golden_time_forcing['T3'] = round(($golden_time_forcing['G3'] / ($golden_time_forcing['G3'] + $golden_time_forcing['O3'])) * 100, 2);
  }
  else{
    $golden_time_forcing['T3'] = round((0) * 100, 2);
  }
  if($golden_time_forcing['G4'] + $golden_time_forcing['O4'] != NULL){
    $golden_time_forcing['T4'] = round(($golden_time_forcing['G4'] / ($golden_time_forcing['G4'] + $golden_time_forcing['O4'])) * 100, 2);
  }
  else{
    $golden_time_forcing['T4'] = round((0) * 100, 2);
  }
  if($golden_time_forcing['G5'] + $golden_time_forcing['O5'] != NULL){
    $golden_time_forcing['T5'] = round(($golden_time_forcing['G5'] / ($golden_time_forcing['G5'] + $golden_time_forcing['O5'])) * 100, 2);
  }
  else{
    $golden_time_forcing['T5'] = round((0) * 100, 2);
  }
  if($golden_time_forcing['G6'] + $golden_time_forcing['O6'] != NULL){
    $golden_time_forcing['T6'] = round(($golden_time_forcing['G6'] / ($golden_time_forcing['G6'] + $golden_time_forcing['O6'])) * 100, 2);
  }
  else{
    $golden_time_forcing['T6'] = round((0) * 100, 2);
  }
  if($golden_time_forcing['G7'] + $golden_time_forcing['O7'] != NULL){
    $golden_time_forcing['T7'] = round(($golden_time_forcing['G7'] / ($golden_time_forcing['G7'] + $golden_time_forcing['O7'])) * 100, 2);
  }
  else{
    $golden_time_forcing['T7'] = round((0) * 100, 2);
  }
  if($golden_time_forcing['G8'] + $golden_time_forcing['O8'] != NULL){
    $golden_time_forcing['T8'] = round(($golden_time_forcing['G8'] / ($golden_time_forcing['G8'] + $golden_time_forcing['O8'])) * 100, 2);
  }
  else{
    $golden_time_forcing['T8'] = round((0) * 100, 2);
  }
  if($golden_time_forcing['G9'] + $golden_time_forcing['O9'] != NULL){
    $golden_time_forcing['T9'] = round(($golden_time_forcing['G9'] / ($golden_time_forcing['G9'] + $golden_time_forcing['O9'])) * 100, 2);
  }
  else{
    $golden_time_forcing['T9'] = round((0) * 100, 2);
  }
  $trend_golden_time = $golden_time_forcing['T1'].', '.$golden_time_forcing['T2'].', '.$golden_time_forcing['T3'].', '.$golden_time_forcing['T4'].', '.$golden_time_forcing['T5'];
  $trend_golden_time .= ', '.$golden_time_forcing['T6'].', '.$golden_time_forcing['T7'].', '.$golden_time_forcing['T8'].', '.$golden_time_forcing['T9'];
?>
<script>
  var config_golden_time = {
    type: 'bar',
    data: {
      labels: ['F-7', 'F-6', 'F-5', 'F-4', 'F-3', 'F-2', 'F-1', 'F-0', 'F+1'],
      datasets: [{
        type: 'bar',
        label: 'Golden Time',
        borderColor: '#4169E1',
        backgroundColor: '#4169E1',
        borderWidth: 2,
        pointRadius: 3,
        fill: false,
        data: [
          <?php echo $trend_golden_time; ?>
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

            return label + ' : ' + val + '%';
          }
        }
      },
      scales: {
        yAxes: [{
          ticks: {
            min: 50,
            max: 100
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
          icon: '/PIS/index.php/assets/images/marker.png'
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
    var status_panen = $('#status_panen').val();

    var pg = $('#pg').val();
    var penyakit = $('#select_penyakit').val();
    var activity = $('#select_activity').val();
    var bulan_activity = $('#select_bulan_activity').val();
    var tahun_activity = $('#select_tahun_activity').val();
    var type = $('#select_type').val();
    var umur_f = $('#select_umur_f').val();
    window.location.href="/PIS/index.php/WIP_PM_Dashboard/plantation_group?page=<?php echo $page; ?>&pg="+pg+"&status="+status+"&jenis="+jenis+"&kelas="+kelas+"&tahun="+tahun+"&bulan="+bulan+"&umur="+umur+"&penyakit="+penyakit+"&activity="+activity+"&bulan_activity="+bulan_activity+"&tahun_activity="+tahun_activity+"&type="+type+"&umur_f="+umur_f;
  }
  function pindah_lokasi(){
    window.location.href="/PIS/index.php/WIP_PM_Lokasi/lokasi?lokasi="+$('#select_lokasi').val();
  }
  window.onload = function(){
		var ctx_golden_time = document.getElementById('diagram_golden_time').getContext('2d');
		window.myBar = new Chart(ctx_golden_time, config_golden_time);
		var ctx_time_activity = document.getElementById('diagram_time_activity').getContext('2d');
		window.myBar = new Chart(ctx_time_activity, config_time_activity);
		var ctx_water_volume = document.getElementById('diagram_water_volume').getContext('2d');
		window.myBar = new Chart(ctx_water_volume, config_water_volume);
		var ctx_penyakit = document.getElementById('diagram_penyakit').getContext('2d');
		window.myBar = new Chart(ctx_penyakit, config_penyakit);
		var ctx_interval_foliar = document.getElementById('diagram_interval_foliar').getContext('2d');
		window.myBar = new Chart(ctx_interval_foliar, config_interval_foliar);
		var ctx_sebaran_foliar = document.getElementById('diagram_sebaran_foliar').getContext('2d');
		window.myBar = new Chart(ctx_sebaran_foliar, config_sebaran_foliar);
  }
</script>
