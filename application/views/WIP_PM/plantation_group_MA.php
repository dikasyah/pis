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

    <li class="nav-item active">
      <a class="nav-link p-1" href="#">
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
              Material
            </b></span>
            <span class="d-sm-none" style="color:black;font-size:12px;"><b>
              <?php if($pg != "PG") echo $pg_desc['code']; else echo "All PG"; ?> -
              Material
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
          <div class="col-lg-4">
            <div class="row mb-1">
              <div class="col-lg-12 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-body" style="padding:0;">
                    <table class="table_pm">
                      <tr style="background-color:#008080;font-weight:bold;">
                        <td style="color:white;">Quantity : </td>
                        <td>
                          <select class="form-control select" name="select_unsur" id="select_unsur" onchange="javascript:select_main_filter(1);" data-live-search="true">
<?php
  $option_unsur_1 = "";
  $option_unsur_2 = "";
  $option_unsur_3 = "";
  $option_unsur_4 = "";
  $option_unsur_5 = "";
  switch ($unsur) {
    case 'Fertilizer':
      $option_unsur_1 = "selected";
    break;
    case 'Herbicide':
      $option_unsur_2 = "selected";
    break;
    case 'Insecticide':
      $option_unsur_3 = "selected";
    break;
    case 'Fungicide':
      $option_unsur_4 = "selected";
    break;
    case 'Others':
      $option_unsur_5 = "selected";
    break;
  }
?>
                            <option value="Fertilizer" style="color:black;" <?php echo $option_unsur_1; ?>>Fertilizer</option>
                            <option value="Herbicide" style="color:black;" <?php echo $option_unsur_2; ?>>Herbicide</option>
                            <option value="Insecticide" style="color:black;" <?php echo $option_unsur_3; ?>>Insecticide</option>
                            <option value="Fungicide" style="color:black;" <?php echo $option_unsur_4; ?>>Fungicide</option>
                            <option value="Others" style="color:black;" <?php echo $option_unsur_5; ?>>Others</option>
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
                    <table class="table_pm">
                      <tr class="text-center" style="background-color:#008080;font-weight:bold;">
                        <td style="color:white;" colspan="2">Type</td>
                        <td style="color:white;">Budget</td>
                        <td style="color:white;">Realization</td>
                        <td style="color:white;">Over Proportion</td>
                        <td style="color:white;">UOM</td>
                      </tr>
<?php
  switch ($unsur) {
    case 'Fertilizer':
?>
                      <tr>
<?php
  if($std_material['Urea'] >= ($real_material['Urea'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Urea</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Urea'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Urea'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Urea'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Urea']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Urease'] >= ($real_material['Urease'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Urease</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Urease'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Urease'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Urease'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Urease']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Za'] >= ($real_material['Za'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Za</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Za'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Za'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Za'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Za']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['K2SO4'] >= ($real_material['K2SO4'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">K2SO4</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['K2SO4'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['K2SO4'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['K2SO4'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['K2SO4']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['KCL'] >= ($real_material['KCL'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">KCL</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['KCL'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['KCL'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['KCL'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['KCL']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['TSP'] >= ($real_material['TSP'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">TSP</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['TSP'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['TSP'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['TSP'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['TSP']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['DAP'] >= ($real_material['DAP'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">DAP</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['DAP'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['DAP'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['DAP'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['DAP']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['MgSO4'] >= ($real_material['MgSO4'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">MgSO4</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['MgSO4'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['MgSO4'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['MgSO4'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['MgSO4']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Kieserite'] >= ($real_material['Kieserite'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Kieserite</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Kieserite'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Kieserite'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Kieserite'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Kieserite']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['FeSO4'] >= ($real_material['FeSO4'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">FeSO4</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['FeSO4'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['FeSO4'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['FeSO4'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['FeSO4']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['ZnSO4'] >= ($real_material['ZnSO4'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">ZnSO4</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['ZnSO4'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['ZnSO4'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['ZnSO4'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['ZnSO4']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Dolomite'] >= ($real_material['Dolomite'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Dolomite</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Dolomite'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Dolomite'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Dolomite'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Dolomite']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Gypsum'] >= ($real_material['Gypsum'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Gypsum</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Gypsum'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Gypsum'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Gypsum'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Gypsum']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['CuSO4'] >= ($real_material['CuSO4'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">CuSO4</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['CuSO4'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['CuSO4'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['CuSO4'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['CuSO4']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Borax'] >= ($real_material['Borax'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Borax</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Borax'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Borax'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Borax'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Borax']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['LOB'] >= ($real_material['LOB'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">LOB</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['LOB'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['LOB'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['LOB'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['LOB']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['CaCl2'] >= ($real_material['CaCl2'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">CaCl2</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['CaCl2'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['CaCl2'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['CaCl2'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['CaCl2']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Calcibor'] >= ($real_material['Calcibor'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Calcibor</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Calcibor'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Calcibor'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Calcibor'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Calcibor']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Kompos'] >= ($real_material['Kompos'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Kompos</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Kompos'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Kompos'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Kompos'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Kompos']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Belerang'] >= ($real_material['Belerang'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Belerang</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Belerang'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Belerang'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Belerang'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Belerang']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Kieserite_G'] >= ($real_material['Kieserite_G'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Kieserite G</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Kieserite_G'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Kieserite_G'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Kieserite_G'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Kieserite_G']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['NPK'] >= ($real_material['NPK'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">NPK</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['NPK'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['NPK'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['NPK'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['NPK']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['NPK_Haracoat'] >= ($real_material['NPK_Haracoat'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">NPK Haracoat</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['NPK_Haracoat'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['NPK_Haracoat'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['NPK_Haracoat'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['NPK_Haracoat']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Petro_Cas'] >= ($real_material['Petro_Cas'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Petro Cas</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Petro_Cas'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Petro_Cas'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Petro_Cas'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Petro_Cas']; ?> </td>
                      </tr>
<?php
    break;
    case 'Herbicide':
?>
                      <tr>
<?php
  if($std_material['Bromacyl'] >= ($real_material['Bromacyl'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Bromacyl</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Bromacyl'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Bromacyl'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Bromacyl'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Bromacyl']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Diuron'] >= ($real_material['Diuron'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Diuron</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Diuron'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Diuron'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Diuron'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Diuron']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Glyphosate'] >= ($real_material['Glyphosate'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Glyphosate</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Glyphosate'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Glyphosate'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Glyphosate'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Glyphosate']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Quizalofop'] >= ($real_material['Quizalofop'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Quizalofop</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Quizalofop'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Quizalofop'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Quizalofop'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Quizalofop']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Ametrine'] >= ($real_material['Ametrine'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Ametrine</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Ametrine'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Ametrine'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Ametrine'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Ametrine']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Bazza'] >= ($real_material['Bazza'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Bazza</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Bazza'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Bazza'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Bazza'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Bazza']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Oksifluorfen'] >= ($real_material['Oksifluorfen'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Oksifluorfen</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Oksifluorfen'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Oksifluorfen'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Oksifluorfen'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Oksifluorfen']; ?> </td>
                      </tr>
<?php
    break;
    case 'Insecticide':
?>
                      </tr>
                      <tr>
<?php
  if($std_material['Tekasi'] >= ($real_material['Tekasi'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Tekasi</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Tekasi'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Tekasi'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Tekasi'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Tekasi']; ?> </td>
                      </tr>
                      <tr>
  <?php
  if($std_material['Tekila'] >= ($real_material['Tekila'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Tekila</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Tekila'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Tekila'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Tekila'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Tekila']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Chlorpyrifos'] >= ($real_material['Chlorpyrifos'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Chlorpyrifos</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Chlorpyrifos'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Chlorpyrifos'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Chlorpyrifos'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Chlorpyrifos']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Sidazinon'] >= ($real_material['Sidazinon'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Sidazinon</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Sidazinon'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Sidazinon'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Sidazinon'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Sidazinon']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Propoxur'] >= ($real_material['Propoxur'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Propoxur</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Propoxur'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Propoxur'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Propoxur'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Propoxur']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Cypermethrin'] >= ($real_material['Cypermethrin'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Cypermethrin</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Cypermethrin'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Cypermethrin'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Cypermethrin'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Cypermethrin']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Bifentrin_EC'] >= ($real_material['Bifentrin_EC'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Bifentrin EC</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Bifentrin_EC'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Bifentrin_EC'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Bifentrin_EC'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Bifentrin_EC']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Bifentrin_G'] >= ($real_material['Bifentrin_G'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Bifentrin G</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Bifentrin_G'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Bifentrin_G'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Bifentrin_G'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Bifentrin_G']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['BPMC'] >= ($real_material['BPMC'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">BPMC</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['BPMC'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['BPMC'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['BPMC'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['BPMC']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Clorpyrifos'] >= ($real_material['Clorpyrifos'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Clorpyrifos</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Clorpyrifos'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Clorpyrifos'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Clorpyrifos'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Clorpyrifos']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Abamectin'] >= ($real_material['Abamectin'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Abamectin</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Abamectin'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Abamectin'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Abamectin'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Abamectin']; ?> </td>
                      </tr>
<?php
    break;
    case 'Fungicide':
?>
                      <tr>
<?php
  if($std_material['Fosetil'] >= ($real_material['Fosetil'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Fosetil</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Fosetil'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Fosetil'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Fosetil'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Fosetil']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Metalaxil'] >= ($real_material['Metalaxil'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Metalaxil</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Metalaxil'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Metalaxil'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Metalaxil'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Metalaxil']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Propiconazole'] >= ($real_material['Propiconazole'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Propiconazole</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Propiconazole'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Propiconazole'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Propiconazole'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Propiconazole']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Prochloraz'] >= ($real_material['Prochloraz'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Prochloraz</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Prochloraz'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Prochloraz'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Prochloraz'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Prochloraz']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Mankozeb'] >= ($real_material['Mankozeb'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Mankozeb</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Mankozeb'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Mankozeb'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Mankozeb'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Mankozeb']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Folirfos'] >= ($real_material['Folirfos'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Folirfos</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Folirfos'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Folirfos'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Folirfos'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Folirfos']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['H3PO3'] >= ($real_material['H3PO3'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">H3PO3</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['H3PO3'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['H3PO3'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['H3PO3'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['H3PO3']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Detazeb'] >= ($real_material['Detazeb'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Detazeb</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Detazeb'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Detazeb'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Detazeb'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Detazeb']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Sarineb'] >= ($real_material['Sarineb'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Sarineb</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Sarineb'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Sarineb'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Sarineb'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Sarineb']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Sorento'] >= ($real_material['Sorento'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Sorento</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Sorento'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Sorento'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Sorento'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Sorento']; ?> </td>
                      </tr>
<?php
    break;
    case 'Others':
?>
                      <tr>
<?php
  if($std_material['Sanisol'] >= ($real_material['Sanisol'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Sanisol</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Sanisol'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Sanisol'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Sanisol'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Sanisol']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Ethylene'] >= ($real_material['Ethylene'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Ethylene</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Ethylene'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Ethylene'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Ethylene'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Ethylene']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Ethepon'] >= ($real_material['Ethepon'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Ethepon</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Ethepon'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Ethepon'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Ethepon'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Ethepon']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Kaolin'] >= ($real_material['Kaolin'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Kaolin</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Kaolin'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Kaolin'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Kaolin'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Kaolin']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Zeolit'] >= ($real_material['Zeolit'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Zeolit</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Zeolit'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Zeolit'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Urea'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Zeolit']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Rabas'] >= ($real_material['Rabas'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Rabas</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Rabas'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Rabas'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Rabas'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Rabas']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Ratgone'] >= ($real_material['Ratgone'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Ratgone</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Ratgone'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Ratgone'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Ratgone'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Ratgone']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Indostick'] >= ($real_material['Indostick'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Indostick</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Indostick'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Indostick'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Indostick'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Indostick']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Organosilicon'] >= ($real_material['Organosilicon'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Organosilicon</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Organosilicon'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Organosilicon'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Organosilicon'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Organosilicon']; ?> </td>
                      </tr>
                      <tr>
<?php
  if($std_material['Soda_Ash'] >= ($real_material['Soda_Ash'])){
    $color_std = "#32CD32";
    $color_real = "#32CD32";
  }
  else{
    $color_std = "#FF0000";
    $color_real = "#FF0000";
  }
?>
                        <td width="10px" style="background-color:<?php echo $color_std; ?>;">&nbsp;</td>
                        <td><a style="color:black;text-decoration:none;" href="#">Soda Ash</a></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material['Soda_Ash'] / $luas); ?></td>
                        <td class="text-right" style="font-weight:bold;color:<?php echo $color_real; ?>;"><?php echo angka_ribuan_2(($real_material['Soda_Ash'] / $luas)); ?></td>
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan($over_material['Soda_Ash'] * 100); ?> %</td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $SatuanMaterial['Soda_Ash']; ?> </td>
                      </tr>
<?php
    break;
  }
?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-8">
            <div class="row mb-1">
              <div class="col-lg-12 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-body" style="padding:0;">
                    <table class="table_pm">
                      <tr style="background-color:#008080;font-weight:bold;">
                        <td style="color:white;">Material : </td>
                        <td>
                          <select class="form-control select" name="select_material" id="select_material" onchange="javascript:select_main_filter();" data-live-search="true">
<?php
  foreach ($master_material as $mm) {
    if($mm->code == $material){
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
            </div>

            <div class="row mb-1">
              <div class="col-lg-6 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-body" style="padding:0;">
                    <table class="table_pm" style="font-weight:bold;">
                      <tr class="text-center" style="background-color:#008080;">
                        <td colspan="7" style="color:white;">List Lokasi</td>
                      </tr>
                      <tr class="text-center" style="background-color:#008080;">
                        <td style="color:white;">No</td>
                        <td style="color:white;">Lokasi</td>
                        <td style="color:white;">Status</td>
                        <td style="color:white;">Umur</td>
                        <td style="color:white;">Qty</td>
                        <td style="color:white;">Std</td>
                        <td style="color:white;">Over</td>
                      </tr>
<?php
  $a = 1;
  foreach ($lokasi_unusur as $lu) {
    if($lu->over_m > 0){
      $color_over = '#FF0000';
    }
    else{
      $color_over = '#32CD32';
    }
?>
                      <tr class="text-center">
                        <td><?php echo $a; ?></td>
                        <td><a href='/PIS/index.php/WIP_PM_Lokasi/lokasi?lokasi=<?php echo $lu->lokasi; ?>'><?php echo $lu->lokasi; ?></a></td>
                        <td><?php echo $lu->status; ?></td>
                        <td><?php echo $lu->umur; ?></td>
                        <td><?php echo angka_ribuan(ceil($lu->r)); ?></td>
                        <td><?php echo angka_ribuan(round($lu->budget)); ?></td>
                        <td style="color:<?php echo $color_over; ?>;"><?php echo angka_ribuan(abs(ceil($lu->over_m))); ?></td>
                      </tr>
<?php
    $a++;
  }
?>
                    </table>
                  </div>
                </div>
              </div>

              <div class="col-lg-6">
                <div class="row mb-1">
                  <div class="col-lg-12 p-1">
                    <div class="card shadow" style="width:100%;">
                      <div class="card-body" style="padding:0;">
                        <table class="table_pm">
                          <tr style="background-color:#008080;font-weight:bold;">
                            <td style="color:white;">Lokasi : </td>
                            <td>
                              <select class="form-control select" name="select_lokasi_unsur" id="select_lokasi_unsur" onchange="javascript:select_main_filter();" data-live-search="true">

<?php
  foreach ($lokasi_unusur as $lu) {
    if($lu->lokasi == $lokasi){
?>
                                <option value="<?php echo $lu->lokasi; ?>" style="color:black;" selected><?php echo $lu->lokasi; ?></option>
<?php
    }
    else{
?>
                                <option value="<?php echo $lu->lokasi; ?>" style="color:black;"><?php echo $lu->lokasi; ?></option>
<?php
    }
  }
?>
                              </select>
                            </td>
                            <td style="color:white;">Sort : </td>
                            <td>
                              <select class="form-control select" name="select_sort" id="select_sort" onchange="javascript:select_main_filter();" data-live-search="true">
<?php
  $option_sort_1 = "";
  $option_sort_2 = "";
  switch ($sort) {
    case 'Quantity':
      $option_sort_1 = "selected";
    break;
    case 'Tanggal':
      $option_sort_2 = "selected";
    break;
  }
?>
                                <option value="Quantity" style="color:black;" <?php echo $option_sort_1; ?>>Quantity</option>
                                <option value="Tanggal" style="color:black;" <?php echo $option_sort_2; ?>>Tanggal</option>
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
                        <table class="table_pm" style="font-weight:bold;">
                          <tr style="background-color:#008080;">
                            <td colspan="4" style="color:white;" class="text-center">Activity</td>
                          </tr>
                          <tr class="text-center" style="background-color:#008080;">
                            <td style="color:white;">Tanggal</td>
                            <td style="color:white;">Umur</td>
                            <td style="color:white;">Activity</td>
                            <td style="color:white;">Qty</td>
                          </tr>
    <?php
      foreach ($lokasi_quantity as $lq) {
    ?>
                          <tr>
                            <td class="text-right"><?php echo format_tgl($lq->tgl_realisasi); ?></td>
                            <td class="text-center"><?php echo $lq->umur; ?></td>
                            <td><?php echo $lq->deskripsi; ?></td>
                            <td class="text-right"><?php echo angka_ribuan_2($lq->quantity); ?></td>
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
  function select_main_filter(change){
    var status = $('#status').val();
    var jenis = $('#jenis').val();
    var kelas = $('#kelas').val();
    var tahun = $('#tahun').val();
    var bulan = $('#bulan').val();
    var umur = $('#umur').val();
    var status_panen = $('#status_panen').val();

    var pg = $('#pg').val();
    var unsur = $('#select_unsur').val();
    var lokasi = $('#select_lokasi_unsur').val();
    var sort = $('#select_sort').val();

    if(change == 1){
      window.location.href="/PIS/index.php/WIP_PM_Dashboard/plantation_group?page=<?php echo $page; ?>&pg="+pg+"&status="+status+"&jenis="+jenis+"&kelas="+kelas+"&tahun="+tahun+"&bulan="+bulan+"&umur="+umur+"&unsur="+unsur+"&lokasi="+lokasi+"&sort="+sort;
    }
    else{
      var material = $('#select_material').val();
      if(!lokasi){
        window.location.href="/PIS/index.php/WIP_PM_Dashboard/plantation_group?page=<?php echo $page; ?>&pg="+pg+"&status="+status+"&jenis="+jenis+"&kelas="+kelas+"&tahun="+tahun+"&bulan="+bulan+"&umur="+umur+"&unsur="+unsur+"&material="+material+"&sort="+sort;
      }
      else{
        window.location.href="/PIS/index.php/WIP_PM_Dashboard/plantation_group?page=<?php echo $page; ?>&pg="+pg+"&status="+status+"&jenis="+jenis+"&kelas="+kelas+"&tahun="+tahun+"&bulan="+bulan+"&umur="+umur+"&unsur="+unsur+"&material="+material+"&lokasi="+lokasi+"&sort="+sort;
      }
    }
  }
  function pindah_lokasi(){
    window.location.href="/PIS/index.php/WIP_PM_Lokasi/lokasi?lokasi="+$('#select_lokasi').val();
  }
</script>
