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

    <li class="nav-item active">
      <a class="nav-link p-1" href="#">
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
              Herbicide
            </b></span>
            <span class="d-sm-none" style="color:black;font-size:12px;"><b>
              <?php if($pg != "PG") echo $pg_desc['code']; else echo "All PG"; ?> -
              Insecticide
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
              <div class="col-lg-6 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-body" style="padding:0;">
                    <table class="table_pm">
                      <tr style="background-color:#008080;font-weight:bold;">
                        <td style="color:white;">Insecticide : </td>
                        <td>
                          <select class="form-control select" name="select_insecticide" id="select_insecticide" onchange="javascript:select_main_filter();" data-live-search="true">
<?php
  if($insecticide == "Insecticide"){
?>
                            <!-- <option value="Insecticide" style="color:black;" selected>Insecticide</option> -->
<?php
  }
  else{
?>
                            <!-- <option value="Insecticide" style="color:black;" selected>Insecticide</option> -->
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
                  <div class="card-body" style="padding:0;">
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
        $unsur_real = round($material_real['U'.$a] / $luas);
        $unsur_std = round($material_budget['U'.$a] / $luas);
        $max = $material_real['U'.$a] / $luas;
      }
      else{
        $unsur_real .= ", ".round($material_real['U'.$a] / $luas);
        $unsur_std .= ", ".round($material_budget['U'.$a] / $luas);
        if($max < $material_real['U'.$a] / $luas){
          $max = $material_real['U'.$a] / $luas;
        }
      }
    }
    else{
      if($a == 1){
        $unsur_real_acc = $material_real['U'.$a];
        $unsur_std_acc = $material_budget['U'.$a];
        $unsur_real = round($unsur_real_acc / $luas);
        $unsur_std = round($unsur_std_acc / $luas);
        $max = $material_real['U'.$a] / $luas;
        $max2 = $material_budget['U'.$a] / $luas;
      }
      else{
        $unsur_real_acc += $material_real['U'.$a];
        $unsur_std_acc += $material_budget['U'.$a];
        $unsur_real .= ", ".round($unsur_real_acc / $luas);
        $unsur_std .= ", ".round($unsur_std_acc / $luas);
        if($max < $unsur_real_acc / $luas){
          $max = $unsur_real_acc / $luas;
        }
        if($max2 < $unsur_std_acc / $luas){
          $max2 = $unsur_std_acc / $luas;
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
        $unsur_real_2 = round($material_real_2['U'.$a] / $luas);
        $unsur_std_2 = round($material_budget_2['U'.$a] / $luas);
        $max_2 = $material_real_2['U'.$a] / $luas;
      }
      else{
        $unsur_real_2 .= ", ".round($material_real_2['U'.$a] / $luas);
        $unsur_std_2 .= ", ".round($material_budget_2['U'.$a] / $luas);
        if($max_2 < $material_real_2['U'.$a] / $luas){
          $max_2 = $material_real_2['U'.$a] / $luas;
        }
      }
    }
    else{
      if($a == 1){
        $unsur_real_acc_2 = $material_real_2['U'.$a];
        $unsur_std_acc_2 = $material_budget_2['U'.$a];
        $unsur_real_2 = round($unsur_real_acc_2 / $luas);
        $unsur_std_2 = round($unsur_std_acc_2 / $luas);
        $max_2 = $material_real_2['U'.$a] / $luas;
        $max2_2 = $material_budget_2['U'.$a] / $luas;
      }
      else{
        $unsur_real_acc_2 += $material_real_2['U'.$a];
        $unsur_std_acc_2 += $material_budget_2['U'.$a];
        $unsur_real_2 .= ", ".round($unsur_real_acc_2 / $luas);
        $unsur_std_2 .= ", ".round($unsur_std_acc_2 / $luas);
        if($max_2 < $unsur_real_acc_2 / $luas){
          $max_2 = $unsur_real_acc_2 / $luas;
        }
        if($max2_2 < $unsur_std_acc_2 / $luas){
          $max2_2 = $unsur_std_acc_2 / $luas;
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

  $bu_f = ', , , , , , , , , '.$max.', , , , , , , , , , ,';

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
      borderColor: '#8BFF00',
      borderWidth: 2,
      pointRadius: 0,
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
      borderWidth: 2,
      pointRadius: 3,
      fill: false,
      yAxisID: 'Fertilizer_2',
      data: [
        ".$unsur_real_2."
      ]
    }";
    $option_chart5 = 'false';
    $option_chart6 = $nama_1;
    $option_chart7 = 'STD '.$nama_1;
    $option_color = '#00BFFF';
  }
  else{
    $option_chart3 = 'false';
    $option_chart4 = '';
    $option_chart5 = 'true';
    $option_chart6 = "Realisasi";
    $option_chart7 = 'STD';
    $option_color = '#FF0000';
  }
?>
<script>
  var config_unsur = {
    type: 'bar',
    data: {
      labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '>20'],
      datasets: [{
        type: 'bar',
        label: 'Forcing',
        backgroundColor: '#005C5C',
        yAxisID: '<?php echo $option_chart8; ?>',
        data: [
          <?php echo $bu_f; ?>
        ]
      }, {
        type: 'line',
        label: '<?php echo $option_chart7; ?>',
        borderColor: '<?php echo $option_color; ?>',
        borderWidth: 2,
        pointRadius: 0,
        fill: false,
        yAxisID: 'Fertilizer_1',
        data: [
          <?php echo $unsur_std; ?>
        ]
      }, {
        type: 'line',
        label: '<?php echo $option_chart6; ?>',
        borderColor: '#0000FF',
        backgroundColor : '#0000FF',
        borderWidth: 2,
        pointRadius: 3,
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
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['Tekasi'] / $luas); ?></td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['Tekasi']; ?></td>
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
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['Tekila'] / $luas); ?></td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['Tekila']; ?></td>
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
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['Chlorpyrifos'] / $luas); ?></td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['Chlorpyrifos']; ?></td>
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
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['Sidazinon'] / $luas); ?></td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['Sidazinon']; ?></td>
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
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['Propoxur'] / $luas); ?></td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['Propoxur']; ?></td>
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
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['Cypermethrin'] / $luas); ?></td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['Cypermethrin']; ?></td>
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
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['Bifentrin_EC'] / $luas); ?></td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['Bifentrin_EC']; ?></td>
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
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['Bifentrin_G'] / $luas); ?></td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['Bifentrin_G']; ?></td>
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
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['BPMC'] / $luas); ?></td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['BPMC']; ?></td>
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
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['Clorpyrifos'] / $luas); ?></td>
                        <td class="text-left" style="font-weight:bold;"><?php echo $satuan_material['Clorpyrifos']; ?></td>
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
                        <td class="text-right" style="font-weight:bold;"><?php echo angka_ribuan_2($std_material_quota['Abamectin'] / $luas); ?></td>
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
                  <div class="card-body" style="padding:0;">
                    <table class="table_pm">
                      <tr style="background-color:#008080;font-weight:bold;">
                        <td style="color:white;">Insect After Forcing : </td>
                        <td>
                          <select class="form-control select" name="select_sebaran" id="select_sebaran" onchange="javascript:select_main_filter();" data-live-search="true">
<?php
  $option_iaf_1 = "";
  $option_iaf_2 = "";
  switch ($iaf) {
  case 'Insect_1':
    $option_iaf_1 = "selected";
  break;
  case 'Insect_2':
    $option_iaf_2 = "selected";
  break;
  }
?>
                            <option value="Insect_1" style="color:black;" <?php echo $option_iaf_1; ?>>Insect I</option>
                            <option value="Insect_2" style="color:black;" <?php echo $option_iaf_2; ?>>Insect II</option>
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
                  <div class="card-body" style="padding:0;height:200px;">
                    <table class="table_pm" style="font-weight:bold;height:100%;">
<?php
  $width_iaf_1 = 0;
  $width_iaf_2 = 0;
  if($standart_insect['Total'] != NULL){
    $width_iaf_1 = ($standart_insect['Regulasi'] / $standart_insect['Total']) * 100;
    $width_iaf_2 = (($standart_insect['Total'] - $standart_insect['Regulasi']) / $standart_insect['Total']) * 100;
  }
?>
                      <tr class="text-center">
                        <td style="background-color:#008000;height:<?php echo $width_iaf_1; ?>px;">Standart (<?php echo angka_ribuan($width_iaf_1); ?>%)</td>
                      </tr>
                      <tr class="text-center">
                        <td style="background-color:#9ACD32;height:<?php echo $width_iaf_2; ?>px;">Non Standart (<?php echo angka_ribuan($width_iaf_2); ?>%)</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row mb-1">
          <div class="col-lg-2 p-1">
            <div class="card shadow" style="width:100%;">
              <div class="card-body" style="padding:0;">
                <table class="table_pm text-center" style="font-weight:bold;">
                  <tr style="background-color:#FF0000;">
                    <td style="padding-top:30px;padding-bottom:30px;">Max</td>
                    <td style="padding-top:30px;padding-bottom:30px;"><?php echo angka_ribuan_2($penyakit_min_max['max']); ?></td>
                  </tr>
                  <tr>
                    <td style="padding-top:30px;padding-bottom:30px;">Average</td>
                    <td style="padding-top:30px;padding-bottom:30px;"><?php echo angka_ribuan_2($penyakit_min_max['avg']); ?></td>
                  </tr>
                  <tr style="background-color:#32CD32;">
                    <td style="padding-top:30px;padding-bottom:30px;">Min</td>
                    <td style="padding-top:30px;padding-bottom:30px;"><?php echo angka_ribuan_2($penyakit_min_max['min']); ?></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="row mb-1">
              <div class="col-lg-12 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-body" style="padding:0;">
                    <table class="table_pm" style="font-weight:bold;">
                      <tr style="background-color:#008080;">
                        <td style="font-weight:bold;color:white;">Pengamatan</td>
                        <td>
                          <select class="form-control select" name="select_pengamatan" id="select_pengamatan" onchange="javascript:select_main_filter();" style="font-weight:bold;color:black;">
<?php
  $option_pengamatan_1 = "";
  $option_pengamatan_2 = "";
  $option_pengamatan_3 = "";
  switch ($pengamatan) {
    case 'MBW':
      $option_pengamatan_1 = "selected";
    break;
    case 'ERW':
      $option_pengamatan_2 = "selected";
    break;
    case 'PHY':
      $option_pengamatan_3 = "selected";
    break;
  }
?>
                            <option value="MBW" style="color:black;font-weight:bold;" <?php echo $option_pengamatan_1; ?>>MBW</option>
                            <option value="ERW" style="color:black;font-weight:bold;" <?php echo $option_pengamatan_2; ?>>ERW</option>
                            <option value="PHY" style="color:black;font-weight:bold;" <?php echo $option_pengamatan_3; ?>>PHY</option>
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
                    <canvas id="diagram_pengamatan"></canvas>
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
  var config_pengamatan = {
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
        '<?php echo $pengamatan; ?> (>= 0.34)',
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

          <div class="col-lg-6 p-1">
            <div class="card shadow" style="width:100%;">
              <div class="card-header py-0 text-center" style="background-color:#008080;">
                <span style="color:white;font-size:14px;"><b>Timeline</b></span>
              </div>
              <div class="card-body" style="padding:0;">
                <table class="table_pm text-center" style="font-weight:bold;">
                  <tr>
                    <td style="background-color:#008080;color:white;" rowspan="4">Forcing</td>
                    <td style="padding-top:15px;padding-bottom:15px;"><<<<<<<<<<</td>
                    <td style="padding-top:15px;padding-bottom:15px;"><<<<<<<<<<</td>
                    <td style="padding-top:15px;padding-bottom:15px;"><<<<<<<<<<</td>
                  </tr>
                  <tr>
                    <td style="padding-top:15px;padding-bottom:15px;"><?php echo angka_ribuan($standart_insect['Insect_1']); ?> Hari</td>
                    <td style="padding-top:15px;padding-bottom:15px;"><?php echo angka_ribuan($standart_insect['Insect_2']); ?> Hari</td>
                    <td style="padding-top:15px;padding-bottom:15px;"><?php echo angka_ribuan($standart_insect['Insect_3']); ?> Hari</td>
                  </tr>
                  <tr style="background-color:#008080;">
                    <td colspan="3"><hr /></td>
                  </tr>
                  <tr>
                    <td style="padding-top:15px;padding-bottom:15px;">Insect I</td>
                    <td style="padding-top:15px;padding-bottom:15px;">Insect II</td>
                    <td style="padding-top:15px;padding-bottom:15px;">Insect III</td>
                  </tr>
                </table>
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
  function select_main_filter(){
    var status = $('#status').val();
    var jenis = $('#jenis').val();
    var kelas = $('#kelas').val();
    var tahun = $('#tahun').val();
    var bulan = $('#bulan').val();
    var umur = $('#umur').val();
    var status_panen = $('#status_panen').val();

    var pg = $('#pg').val();
    var insecticide = $('#select_insecticide').val();
    var type = $('#select_type').val();
    var insecticide_2 = $('#select_insecticide_2').val();
    var compare = $('#select_compare').val();
    var pengamatan = $('#select_pengamatan').val();
    var iaf = $('#select_sebaran').val();
    window.location.href="/PIS/index.php/WIP_PM_Dashboard/plantation_group?page=<?php echo $page; ?>&pg="+pg+"&status="+status+"&jenis="+jenis+"&kelas="+kelas+"&tahun="+tahun+"&bulan="+bulan+"&umur="+umur+"&insecticide="+insecticide+"&type="+type+"&insecticide_2="+insecticide_2+"&compare="+compare+"&pengamatan="+pengamatan+"&iaf="+iaf;
  }
  function pindah_lokasi(){
    window.location.href="/PIS/index.php/WIP_PM_Lokasi/lokasi?lokasi="+$('#select_lokasi').val();
  }
  window.onload = function(){
		var ctx_unsur = document.getElementById('diagram_unsur').getContext('2d');
		window.myBar = new Chart(ctx_unsur, config_unsur);
		var ctx_pengamatan = document.getElementById('diagram_pengamatan').getContext('2d');
		window.myBar = new Chart(ctx_pengamatan, config_pengamatan);
	};
</script>
