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
              Home
            </b></span>
            <span class="d-sm-none" style="color:black;font-size:12px;"><b>
              <?php if($pg != "PG") echo $pg_desc['code']; else echo "All PG"; ?> -
              Home
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
                  <div class="card-body" style="padding:0;overflow-x:auto;">
<?php
  if($element_cost == "Ha"){
    $pembagi = $luas;
  }
  else{
    $pembagi = $tonase * 1000;
  }
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
      if($tahun == 1){
        if($status == "NSFC"){
          $bpp = $ec->BPP_NSFC_ha;
        }
        else if($status == "NSSC"){
          $bpp = $ec->BPP_NSSC_ha;
        }
        else{
          $bpp = $ec->BPP_NS_ha;
        }
      }
      else{
        if($status == "NSFC"){
          $bpp = $ec->BPP_NSFC_ha_t1;
        }
        else if($status == "NSSC"){
          $bpp = $ec->BPP_NSSC_ha_t1;
        }
        else{
          $bpp = $ec->BPP_NS_ha_t1;
        }
      }
      $bpp = $bpp * $luas;
    }
    else{
      if($tahun == 1){
        if($status == "NSFC"){
          $bpp = $ec->BPP_NSFC_kg;
        }
        else if($status == "NSSC"){
          $bpp = $ec->BPP_NSSC_kg;
        }
        else{
          $bpp = $ec->BPP_NS_kg;
        }
      }
      else{
        if($status == "NSFC"){
          $bpp = $ec->BPP_NSFC_kg_t1;
        }
        else if($status == "NSSC"){
          $bpp = $ec->BPP_NSSC_kg_t1;
        }
        else{
          $bpp = $ec->BPP_NS_kg_t1;
        }
      }
      $bpp = $bpp * $tonase * 1000;
    }
    $rfb = $bpp;
    $total_bpp += $bpp;
    $total_rfb += $bpp;

    $total_r += $wip[$ec->code.'_r'];

    if(isset($forecast_overhead[$ec->code]['fo'])){
      $fo = $forecast_overhead[$ec->code]['fo'];
    }
    else{
      $fo = 0;
    }

    $real_rf = $wip[$ec->code.'_r'] + $wip[$ec->code.'_f'];

    $total_rf += $real_rf;
    $total_f += $real_rf - ($wip[$ec->code.'_r']);
    $total_sbt_t += $SBTCostTotal[$ec->code];
    $total_sbt += $SBTCost[$ec->code];
?>
                      <tr style="font-weight:bold;">
                        <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:blue;text-decoration:none;" href="/PIS/index.php/WIP_PM_Dashboard/plantation_group?page=AC&pg=<?php echo $pg_desc['code']; ?>&ga=<?php echo $ec->code; ?>"><?php echo $ec->nama; ?></a></td>
                        <td class="text-right" style="color:black;padding-top:2px;padding-bottom:2px;"><?php if($pembagi != 0) echo angka_ribuan($bpp / $pembagi); else echo angka_ribuan(0); ?></td>
                        <td class="text-right" style="color:black;padding-top:2px;padding-bottom:2px;"><?php if($pembagi != 0)  echo angka_ribuan($SBTCostTotal[$ec->code]); else echo angka_ribuan(0); ?></td>
                        <td class="text-right" style="color:black;padding-top:2px;padding-bottom:2px;"><?php if($pembagi != 0)  echo angka_ribuan($real_rf / $pembagi); else echo angka_ribuan(0); ?></td>
                        <td class="text-right" style="color:black;padding-top:2px;padding-bottom:2px;"><?php if($pembagi != 0)  echo angka_ribuan($SBTCost[$ec->code] / $pembagi); else echo angka_ribuan(0); ?></td>
                        <td class="text-right" style="color:black;padding-top:2px;padding-bottom:2px;"><?php if($pembagi != 0)  echo angka_ribuan(($wip[$ec->code.'_r']) / $pembagi); else echo angka_ribuan(0); ?></td>
                        <td class="text-right" style="color:black;padding-top:2px;padding-bottom:2px;"><?php if($pembagi != 0)  echo angka_ribuan(($real_rf - ($wip[$ec->code.'_r'])) / $pembagi); else echo angka_ribuan(0); ?></td>
                      </tr>
<?php
  }
?>
                      <tr style="background-color:#008080;font-weight:bold;">
                        <td class="text-center" style="color:white;padding-top:10px;padding-bottom:10px;">Total</td>
                        <td class="text-right" style="color:white;padding-top:10px;padding-bottom:10px;"><?php if($pembagi != 0)  echo angka_ribuan($total_bpp / $pembagi); else echo angka_ribuan(0); ?></td>
                        <td class="text-right" style="color:white;padding-top:10px;padding-bottom:10px;"><?php if($pembagi != 0)  echo angka_ribuan($total_sbt_t); else echo angka_ribuan(0); ?></td>
                        <td class="text-right" style="color:white;padding-top:10px;padding-bottom:10px;"><?php if($pembagi != 0)  echo angka_ribuan($total_rf / $pembagi); else echo angka_ribuan(0); ?></td>
                        <td class="text-right" style="color:white;padding-top:10px;padding-bottom:10px;"><?php if($pembagi != 0)  echo angka_ribuan($total_sbt / $pembagi); else echo angka_ribuan(0); ?></td>
                        <td class="text-right" style="color:white;padding-top:10px;padding-bottom:10px;"><?php if($pembagi != 0)  echo angka_ribuan($total_r / $pembagi); else echo angka_ribuan(0); ?></td>
                        <td class="text-right" style="color:white;padding-top:10px;padding-bottom:10px;"><?php if($pembagi != 0)  echo angka_ribuan($total_f / $pembagi); else echo angka_ribuan(0); ?></td>
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
                              <td style="padding-top:5px;padding-bottom:5px;color:black;"><?php if($pembagi != 0) echo angka_ribuan(($total_rf - $total_bpp) / $pembagi); else echo angka_ribuan(0); ?><br>Rp/<?php echo $element_cost; ?></td>
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
  if($total_bpp != 0){
    if(((($total_rf - $total_bpp) / $total_bpp) * 100) <= -2){
      $category = "Excellent";
      $category_color = "#32CD32";
    }
    else if(((($total_rf - $total_bpp) / $total_bpp) * 100) <= 2){
      $category = "Good";
      $category_color = "#FFFF00";
    }
    else{
      $category = "Poor";
      $category_color = "#FF0000";
    }
  }
  else{
    $category = "-";
    $category_color = "#FFFFFF";
  }
?>
                              <td style="padding-top:5px;padding-bottom:5px;color:black;background-color:<?php echo $category_color; ?>;"><?php echo $category; ?></td>
                              <td style="padding-top:5px;padding-bottom:5px;color:black;"><?php if($total_bpp != 0) echo round(((($total_rf - $total_bpp) / $total_bpp) * 100)); else echo angka_ribuan(0); ?> %</td>
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
  if($gorup_cost_total['Total_r'] != NULL){
    $p_gc_labour = round(($gorup_cost_total['Labour_r'] / $gorup_cost_total['Total_r']) * 100);
    $p_gc_charge = round(($gorup_cost_total['Charge_r'] / $gorup_cost_total['Total_r']) * 100);
    $p_gc_material = round(($gorup_cost_total['Material_r'] / $gorup_cost_total['Total_r']) * 100);
    $PGCSeed = round(($gorup_cost_total['Seed_r'] / $gorup_cost_total['Total_r']) * 100);
  }
  else{
    $p_gc_labour = round((0) * 100);
    $p_gc_charge = round((0) * 100);
    $p_gc_material = round((0) * 100);
    $PGCSeed = round((0) * 100);
  }
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
  if($akurasi_forcing['cost_forcing'] <= 0){
    $forcing_impact_color = "#32CD32";
  }
  else{
    $forcing_impact_color = "#FF0000";
  }

  if(round($akurasi_forcing['akurasi_forcing']) == 0){
    $accuracy_forcing = "On The Track";
  }
  else if(round($akurasi_forcing['akurasi_forcing']) > 0){
    $accuracy_forcing = "Mundur ".abs(round($akurasi_forcing['akurasi_forcing']))." Bulan";
  }
  else{
    $accuracy_forcing = "Maju ".abs(round($akurasi_forcing['akurasi_forcing']))." Bulan";
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
                        <td style="padding-top:5px;padding-bottom:5px;color:<?php echo $forcing_impact_color; ?>;"><?php if($luas != 0) echo angka_ribuan(abs($akurasi_forcing['cost_forcing'] / $luas)); else echo angka_ribuan(0); ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-5">
            <div class="row mb-1">
              <div class="col-lg-6 p-1">
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

              <div class="col-lg-6 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-body" style="padding:0;">
                    <select style="color:black;" class="form-control select" name="select_group_cost_filter" id="select_group_cost_filter" onchange="javascript:select_main_filter();">
<?php
  $option_group_cost_filter1 = "";
  $option_group_cost_filter2 = "";
  switch ($group_cost_filter) {
    case 'Accumulation':
      $option_group_cost_filter1 = "selected";
    break;
    case 'Per-Umur':
      $option_group_cost_filter2 = "selected";
    break;
  }
?>
                      <option value="Accumulation" style="color:black;" <?php echo $option_group_cost_filter1; ?>>Accumulation</option>
                      <option value="Per-Umur" style="color:black;" <?php echo $option_group_cost_filter2; ?>>Per-Umur</option>
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
  if($luas != 0){
    while ($a <= 21) {
      if($group_cost_filter == 'Accumulation'){
        if($a == 1){
          $real_acc = $trend_cost['U'.$a];
          $std_acc = $trend_cost['B'.$a];
          $real = round($real_acc / $luas);
          $std = round($std_acc / $luas);
          $max = $trend_cost['U'.$a] / $luas;
          $max2 = $trend_cost['B'.$a] / $luas;
        }
        else{
          $real_acc += $trend_cost['U'.$a];
          $std_acc += $trend_cost['B'.$a];
          $real .= ", ".round($real_acc / $luas);
          $std .= ", ".round($std_acc / $luas);
          if($max < $real_acc / $luas){
            $max = $real_acc / $luas;
          }
          if($max2 < $std_acc / $luas){
            $max2 = $std_acc / $luas;
          }
        }
      }
      else{
        if($a == 1){
          $real = round($trend_cost['U'.$a] / $luas);
          $std = round($trend_cost['B'.$a] / $luas);
          $max = $trend_cost['U'.$a] / $luas;
          $max2 = $trend_cost['B'.$a] / $luas;
        }
        else{
          $real .= ", ".round($trend_cost['U'.$a] / $luas);
          $std .= ", ".round($trend_cost['B'.$a] / $luas);
          if($max < $trend_cost['U'.$a] / $luas){
            $max = $trend_cost['U'.$a] / $luas;
          }
          if($max2 < $trend_cost['B'.$a]){
            $max2 = $trend_cost['B'.$a] / $luas;
          }
        }
      }
      $a++;
    }
  }
  else{
    $real = ', , , , , , , , , , , , , , , , , , ,';
    $std = ', , , , , , , , , , , , , , , , , , ,';
  }
  if($max < $max2){
    $max = $max2;
  }
  $bu_f = ', , , , , , , '.$max.', , , , , , , , , , , ,';
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
      },{
        type: 'bar',
        label: 'Forcing',
        backgroundColor: '#005C5C',
        data: [
          <?php echo $bu_f; ?>
        ]
      },{
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
            min: 0,
            callback: function(label, index, labels) {
              return (label / 1000000) + "M";
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
  if(($gorup_cost_total['Labour_b']) >= $gorup_cost_total['Labour_r']){
    $color = "#32CD32";
  }
  else{
    $color = "#FF0000";
  }
?>
                        <td style="padding-top:10px;padding-bottom:10px;color:<?php echo $color; ?>;"><?php if($gorup_cost_total['luas'] != 0) echo angka_ribuan($gorup_cost_total['Labour_r'] / $gorup_cost_total['luas']); else echo angka_ribuan(0); ?></td>
<?php
  if(($gorup_cost_total['Charge_b']) >= $gorup_cost_total['Charge_r']){
    $color = "#32CD32";
  }
  else{
    $color = "#FF0000";
  }
?>
                        <td style="padding-top:10px;padding-bottom:10px;color:<?php echo $color; ?>;"><?php if($gorup_cost_total['luas'] != 0) echo angka_ribuan($gorup_cost_total['Charge_r'] /$gorup_cost_total['luas']); else echo angka_ribuan(0); ?></td>
<?php
  if(($gorup_cost_total['Material_b']) >= $gorup_cost_total['Material_r']){
    $color = "#32CD32";
  }
  else{
    $color = "#FF0000";
  }
?>
                        <td style="padding-top:10px;padding-bottom:10px;color:<?php echo $color; ?>;"><?php if($gorup_cost_total['luas'] != 0) echo angka_ribuan($gorup_cost_total['Material_r'] / $gorup_cost_total['luas']); else echo angka_ribuan(0); ?></td>
<?php
  if(($gorup_cost_total['Seed_b']) >= $gorup_cost_total['Seed_r']){
    $color = "#32CD32";
  }
  else{
    $color = "#FF0000";
  }
?>
                        <td style="padding-top:10px;padding-bottom:10px;color:<?php echo $color; ?>;"><?php if($gorup_cost_total['luas'] != 0) echo angka_ribuan($gorup_cost_total['Seed_r'] / $gorup_cost_total['luas']); else echo angka_ribuan(0); ?></td>
<?php
    if(($total_r - $gorup_cost_total['Total_r']) <= 0){
      $color = "#32CD32";
    }
    else{
      $color = "#FF0000";
    }
?>
                        <td style="padding-top:10px;padding-bottom:10px;color:<?php echo $color; ?>;"><?php if($gorup_cost_total['luas'] != 0) echo angka_ribuan(($total_r - $gorup_cost_total['Total_r']) / $gorup_cost_total['luas']); else echo angka_ribuan(0); ?></td>
<?php
    if(($gorup_cost_total['Total_r'] + ($total_r - $gorup_cost_total['Total_r'])) >= ($gorup_cost_total['Labour_b'] + $gorup_cost_total['Charge_b'] + $gorup_cost_total['Material_b'] + $gorup_cost_total['Seed_r'])){
      $color = "#32CD32";
    }
    else{
      $color = "#FF0000";
    }
?>
                        <td style="padding-top:10px;padding-bottom:10px;color:<?php echo $color; ?>;"><?php if($gorup_cost_total['luas'] != 0) echo angka_ribuan(($gorup_cost_total['Total_r'] + ($total_r - $gorup_cost_total['Total_r'])) / $gorup_cost_total['luas']); else echo angka_ribuan(0); ?></td>
                      </tr>
                      <tr class="text-center" style="font-weight:bold;background-color:#008080">
                        <td style="color:white;padding-top:5px;padding-bottom:5px;">SBT</td>
                        <td style="color:white;padding-top:5px;padding-bottom:5px;"><?php if($gorup_cost_total['luas'] != 0) echo angka_ribuan($gorup_cost_total['Labour_b'] /$gorup_cost_total['luas']); else echo angka_ribuan(0); ?></td>
                        <td style="color:white;padding-top:5px;padding-bottom:5px;"><?php if($gorup_cost_total['luas'] != 0) echo angka_ribuan($gorup_cost_total['Charge_b'] /$gorup_cost_total['luas']); else echo angka_ribuan(0); ?></td>
                        <td style="color:white;padding-top:5px;padding-bottom:5px;"><?php if($gorup_cost_total['luas'] != 0) echo angka_ribuan($gorup_cost_total['Material_b'] /$gorup_cost_total['luas']); else echo angka_ribuan(0); ?></td>
                        <td style="color:white;padding-top:5px;padding-bottom:5px;"><?php if($gorup_cost_total['luas'] != 0) echo angka_ribuan($gorup_cost_total['Seed_b'] /$gorup_cost_total['luas']); else echo angka_ribuan(0); ?></td>
                        <td style="color:white;padding-top:5px;padding-bottom:5px;"><?php if($gorup_cost_total['luas'] != 0) echo angka_ribuan(0 / $gorup_cost_total['luas']); else echo angka_ribuan(0); ?></td>
                        <td style="color:white;padding-top:5px;padding-bottom:5px;"><?php if($gorup_cost_total['luas'] != 0) echo angka_ribuan(($gorup_cost_total['Labour_b'] + $gorup_cost_total['Charge_b'] + $gorup_cost_total['Material_b'] + $gorup_cost_total['Seed_b']) / $gorup_cost_total['luas']); else echo angka_ribuan(0); ?></td>
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
<script>
<?php
  $longlat = explode(", ", $coordinate_center['longlat']);
?>
  function initMap() {
    var peta = new google.maps.Map(document.getElementById('peta'), {
      center:new google.maps.LatLng(<?php echo $longlat[0]; ?>, <?php echo $longlat[1]; ?>),
      zoom:11,
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
    // var BaseStation = new google.maps.Circle({
    //     strokeColor: '#FFFFFF',
    //     strokeOpacity: 1,
    //     strokeWeight: 1,
    //     fillColor: '#FFFFFF',
    //     fillOpacity: 0,
    //     center: new google.maps.LatLng(-4.812477, 105.192582),
    //     radius: 10000,
    //     zIndex: -1
    // });
    // BaseStation.setMap(peta);
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

    var pg = $('#pg').val();
    var element_cost = $('#select_element_cost').val();
    var group_cost = $('#select_group_cost').val();
    var group_cost_filter = $('#select_group_cost_filter').val();
    window.location.href="/PIS/index.php/WIP_PM_Dashboard/plantation_group?page=<?php echo $page; ?>&pg="+pg+"&status="+status+"&jenis="+jenis+"&kelas="+kelas+"&tahun="+tahun+"&bulan="+bulan+"&umur="+umur+"&element_cost="+element_cost+"&group_cost="+group_cost+"&group_cost_filter="+group_cost_filter;
  }
  window.onload = function(){
		var ctx_p_gc = document.getElementById('diagram_p_gc').getContext('2d');
		window.myBar = new Chart(ctx_p_gc, config_p_gc);
		var ctx_group_cost = document.getElementById('diagram_group_cost').getContext('2d');
		window.myBar = new Chart(ctx_group_cost, config_group_cost);
  }
</script>
