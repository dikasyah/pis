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

    <li class="nav-item active">
      <a class="nav-link p-1" href="#">
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
              Springkle
            </b></span>
            <span class="d-sm-none" style="color:black;font-size:12px;"><b>
              <?php if($pg != "PG") echo $pg_desc['code']; else echo "All PG"; ?> -
              Springkle
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
                            <td rowspan="2" width="<?php echo $performance_excellent; ?>%" style="background-color:#32CD32;">
                              <?php if($performance_excellent != 0) echo $performance_excellent.'%'; ?>
                            </td>
                            <td rowspan="2" width="<?php echo $performance_good; ?>%" style="background-color:#FFFF00;">
                              <?php if($performance_good != 0) echo $performance_good.'%'; ?>
                            </td>
                            <td rowspan="2" width="<?php echo $performance_poor; ?>%" style="background-color:#FF0000;">
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
          <div class="col-lg-6">
            <div class="row mb-1">
              <div class="col-lg-6 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-body" style="padding:0;">
                    <table class="table_pm">
                      <tr style="background-color:#008080;font-weight:bold;">
                        <td style="color:white;">Tahun : </td>
                        <td>
                          <select class="form-control select" name="select_type" id="select_type" onchange="javascript:select_main_filter();">
<?php
  $option_type_1 = "";
  $option_type_2 = "";
  switch ($type) {
    case 'Kali':
      $option_type_1 = "selected";
    break;
    case 'Luas':
      $option_type_2 = "selected";
    break;
  }
?>
                            <option value="Kali" style="color:black;" <?php echo $option_type_1; ?>>Kali Tersiram</option>
                            <option value="Luas" style="color:black;" <?php echo $option_type_2; ?>>Luas Tersiram</option>
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
                        <td style="color:white;">Year : </td>
                        <td>
                          <select class="form-control select" name="select_tahun" id="select_tahun" onchange="javascript:select_main_filter();">
<?php
  $option_tahun_1 = "";
  $option_tahun_2 = "";
  $option_tahun_3 = "";
  $option_tahun_4 = "";
  switch ($tahun_siram) {
    case (date('Y', strtotime($YEAR_BASE['nilai'])) - 3):
      $option_tahun_1 = "selected";
    break;
    case (date('Y', strtotime($YEAR_BASE['nilai'])) - 2):
      $option_tahun_2 = "selected";
    break;
    case (date('Y', strtotime($YEAR_BASE['nilai'])) - 1):
      $option_tahun_3 = "selected";
    break;
    case (date('Y', strtotime($YEAR_BASE['nilai']))):
      $option_tahun_4 = "selected";
    break;
  }
?>
                            <option value="<?php echo date('Y', strtotime($YEAR_BASE['nilai'])) - 3; ?>" style="color:black;" <?php echo $option_tahun_1; ?>><?php echo date('Y', strtotime($YEAR_BASE['nilai'])) - 3; ?></option>
                            <option value="<?php echo date('Y', strtotime($YEAR_BASE['nilai'])) - 2; ?>" style="color:black;" <?php echo $option_tahun_2; ?>><?php echo date('Y', strtotime($YEAR_BASE['nilai'])) - 2; ?></option>
                            <option value="<?php echo date('Y', strtotime($YEAR_BASE['nilai'])) - 1; ?>" style="color:black;" <?php echo $option_tahun_3; ?>><?php echo date('Y', strtotime($YEAR_BASE['nilai'])) - 1; ?></option>
                            <option value="<?php echo date('Y', strtotime($YEAR_BASE['nilai'])); ?>" style="color:black;" <?php echo $option_tahun_4; ?>><?php echo date('Y', strtotime($YEAR_BASE['nilai'])); ?></option>
                          </select>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mb-1">
              <div class="col-lg-12">
                <div class="card shadow" style="width:100%;">
                  <div class="card-body" style="padding:0;">
                    <canvas id="diagram_tahun_siram" style="padding:5px;"></canvas>
<?php
  $siram = array(
    '1' => '',
    '2' => '',
    '3' => '',
    '4' => '',
    '5' => '',
    '6' => '',
    '7' => '',
    '8' => '',
    '9' => '',
    '10' => '',
    '11' => '',
    '12' => ''
  );
  $std_s = array(
    '1' => '',
    '2' => '',
    '3' => '',
    '4' => '',
    '5' => '',
    '6' => '',
    '7' => '',
    '8' => '',
    '9' => '',
    '10' => '',
    '11' => '',
    '12' => ''
  );
  $a = 1;
  $cek_max = 0;
  if($type == 'Kali'){
    $rencana_siram = (3).", ".(3).", ".(3).", ".(3).", ".(3).", ".(3);
    $rencana_siram .= ', '.(3).", ".(3).", ".(3).", ".(3).", ".(3).", ".(3);
    while ($a <= 12) {
      if(isset($coverage_area[$a])){
        $siram[$a] = $kali[$a];
      }
      else{
        $siram[$a] = 0;
      }
      $a++;
    }
    $max = 'max: 6,';
  }
  else{
    while ($a <= 12) {
      if(isset($coverage_area[$a])){
        $siram[$a] = $coverage_area[$a];
        $std_s[$a] = $std_siram[$a];
      }
      else{
        $siram[$a] = 0;
        $std_s[$a] = 0;
      }
      if($cek_max < $siram[$a]){
        $cek_max = $siram[$a];
      }
      if($cek_max < $std_s[$a]){
        $cek_max = $std_s[$a];
      }
      $a++;
    }
    $rencana_siram = round($std_s[1]).", ".round($std_s[2]).", ".round($std_s[3]).", ".round($std_s[4]).", ".round($std_s[5]).", ".round($std_s[6]);
    $rencana_siram .= ', '.round($std_s[7]).", ".round($std_s[8]).", ".round($std_s[9]).", ".round($std_s[10]).", ".round($std_s[11]).", ".round($std_s[12]);
    $max = 'max: '.($cek_max * 2).',';
  }
  $ca = round($siram[1]).", ".round($siram[2]).", ".round($siram[3]).", ".round($siram[4]).", ".round($siram[5]).", ".round($siram[6]);
  $ca .= ', '.round($siram[7]).", ".round($siram[8]).", ".round($siram[9]).", ".round($siram[10]).", ".round($siram[11]).", ".round($siram[12]);
?>
<script>
  var config_tahun_siram = {
    type: 'bar',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
      datasets: [{
        type: 'line',
        label: 'STD',
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
        label: 'Real',
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
            // if(label != 'Rencana Siram'){
              // if(val != 0){
                return label + ' : ' + val;
              // }
            // }
          }
        }
      },
      scales: {
        yAxes: [{
          display: false,
          ticks: {
            min: 0,
            <?php echo $max; ?>
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
              <div class="col-lg-12 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-header py-0 text-center" style="background-color:#008080;">
                    <span style="color:white;font-size:14px;"><b>Cost Impact Aplikasi Siram Springkle</b></span>
                  </div>
                  <div class="card-body" style="padding:0;">
                    <table class="table_pm text-center" style="font-weight:bold;">
<?php
  $width_ac_1 = 0;
  $width_ac_2 = 0;
  $width_ac_3 = 0;
  $width_ac_4 = 0;
  if($activity_saving['Total'] != NULL){
    $width_ac_1 = ($activity_saving['SS1'] - $activity_saving['Total']) * 100;
    $width_ac_2 = ($activity_saving['SS2'] - $activity_saving['Total']) * 100;
    $width_ac_3 = ($activity_saving['SS3'] - $activity_saving['Total']) * 100;
    $width_ac_4 = ($activity_saving['SS4'] - $activity_saving['Total']) * 100;
  }
?>
                      <tr>
                        <td style="padding-top:75px;padding-bottom:75px;background-color:#008000;" width="<?php echo $width_ac_1; ?>%">S < -4Jt<br /><?php echo angka_ribuan($activity_saving['SS1']); ?> Lokasi</td>
                        <td style="padding-top:75px;padding-bottom:75px;background-color:#0000FF;" width="<?php echo $width_ac_2; ?>%">-4Jt < S < 0<br /><?php echo angka_ribuan($activity_saving['SS2']); ?> Lokasi</td>
                        <td style="padding-top:75px;padding-bottom:75px;background-color:#FFFF00;" width="<?php echo $width_ac_3; ?>%">0 < S < 4Jt<br /><?php echo angka_ribuan($activity_saving['SS3']); ?> Lokasi</td>
                        <td style="padding-top:75px;padding-bottom:75px;background-color:#FF0000;" width="<?php echo $width_ac_4; ?>%">S > 4Jt<br /><?php echo angka_ribuan($activity_saving['SS4']); ?> Lokasi</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mb-1">
              <div class="col-lg-12 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-body" style="padding:0;padding-top:5px;">
                    <canvas id="diagram_prioritas"></canvas>
<?php
  if($priority_1['Total'] != 0){
    $sp1['vl'] = ($priority_1['SP1'] / $priority_1['Total']) * 100;
    $sp1['l'] = ($priority_1['SP2'] / $priority_1['Total']) * 100;
    $sp1['en'] = ($priority_1['SP3'] / $priority_1['Total']) * 100;
    $sp1['g'] = ($priority_1['SP4'] / $priority_1['Total']) * 100;
    $sp1['ex'] = ($priority_1['SP5'] / $priority_1['Total']) * 100;
    $sp1['o'] = ($priority_1['SP6'] / $priority_1['Total']) * 100;
  }
  else{
    $sp1['vl'] = (0) * 100;
    $sp1['l'] = (0) * 100;
    $sp1['en'] = (0) * 100;
    $sp1['g'] = (0) * 100;
    $sp1['ex'] = (0) * 100;
    $sp1['o'] = (0) * 100;
  }
  if($priority_2['Total'] != 0){
    $sp2['vl'] = ($priority_2['SP1'] / $priority_2['Total']) * 100;
    $sp2['l'] = ($priority_2['SP2'] / $priority_2['Total']) * 100;
    $sp2['en'] = ($priority_2['SP3'] / $priority_2['Total']) * 100;
    $sp2['g'] = ($priority_2['SP4'] / $priority_2['Total']) * 100;
    $sp2['ex'] = ($priority_2['SP5'] / $priority_2['Total']) * 100;
    $sp2['o'] = ($priority_2['SP6'] / $priority_2['Total']) * 100;
  }
  else{
    $sp2['vl'] = (0) * 100;
    $sp2['l'] = (0) * 100;
    $sp2['en'] = (0) * 100;
    $sp2['g'] = (0) * 100;
    $sp2['ex'] = (0) * 100;
    $sp2['o'] = (0) * 100;
  }
  if($priority_3['Total'] != 0){
    $sp3['vl'] = ($priority_3['SP1'] / $priority_3['Total']) * 100;
    $sp3['l'] = ($priority_3['SP2'] / $priority_3['Total']) * 100;
    $sp3['en'] = ($priority_3['SP3'] / $priority_3['Total']) * 100;
    $sp3['g'] = ($priority_3['SP4'] / $priority_3['Total']) * 100;
    $sp3['ex'] = ($priority_3['SP5'] / $priority_3['Total']) * 100;
    $sp3['o'] = ($priority_3['SP6'] / $priority_3['Total']) * 100;
  }
  else{
    $sp3['vl'] = (0) * 100;
    $sp3['l'] = (0) * 100;
    $sp3['en'] = (0) * 100;
    $sp3['g'] = (0) * 100;
    $sp3['ex'] = (0) * 100;
    $sp3['o'] = (0) * 100;
  }
  if($priority_4['Total'] != 0){
    $sp4['vl'] = ($priority_4['SP1'] / $priority_4['Total']) * 100;
    $sp4['l'] = ($priority_4['SP2'] / $priority_4['Total']) * 100;
    $sp4['en'] = ($priority_4['SP3'] / $priority_4['Total']) * 100;
    $sp4['g'] = ($priority_4['SP4'] / $priority_4['Total']) * 100;
    $sp4['ex'] = ($priority_4['SP5'] / $priority_4['Total']) * 100;
    $sp4['o'] = ($priority_4['SP6'] / $priority_4['Total']) * 100;
  }
  else{
    $sp4['vl'] = (0) * 100;
    $sp4['l'] = (0) * 100;
    $sp4['en'] = (0) * 100;
    $sp4['g'] = (0) * 100;
    $sp4['ex'] = (0) * 100;
    $sp4['o'] = (0) * 100;
  }
  if($priority_5['Total'] != 0){
    $sp5['vl'] = ($priority_5['SP1'] / $priority_5['Total']) * 100;
    $sp5['l'] = ($priority_5['SP2'] / $priority_5['Total']) * 100;
    $sp5['en'] = ($priority_5['SP3'] / $priority_5['Total']) * 100;
    $sp5['g'] = ($priority_5['SP4'] / $priority_5['Total']) * 100;
    $sp5['ex'] = ($priority_5['SP5'] / $priority_5['Total']) * 100;
    $sp5['o'] = ($priority_5['SP6'] / $priority_5['Total']) * 100;
  }
  else{
    $sp5['vl'] = (0) * 100;
    $sp5['l'] = (0) * 100;
    $sp5['en'] = (0) * 100;
    $sp5['g'] = (0) * 100;
    $sp5['ex'] = (0) * 100;
    $sp5['o'] = (0) * 100;
  }
  $very_low = round($sp1['vl']).', '.round($sp2['vl']).', '.round($sp3['vl']).', '.round($sp4['vl']).', '.round($sp5['vl']);
  $low = round($sp1['l']).', '.round($sp2['l']).', '.round($sp3['l']).', '.round($sp4['l']).', '.round($sp5['l']);
  $enough = round($sp1['en']).', '.round($sp2['en']).', '.round($sp3['en']).', '.round($sp4['en']).', '.round($sp5['en']);
  $good = round($sp1['g']).', '.round($sp2['g']).', '.round($sp3['g']).', '.round($sp4['g']).', '.round($sp5['g']);
  $excellent = round($sp1['ex']).', '.round($sp2['ex']).', '.round($sp3['ex']).', '.round($sp4['ex']).', '.round($sp5['ex']);
  $over = round($sp1['o']).', '.round($sp2['o']).', '.round($sp3['o']).', '.round($sp4['o']).', '.round($sp5['o']);
?>
<script>
	var config_prioritas = {
    type: 'bar',
    data: {
  		labels: [
        "Priority 1", "Priority 2", "Priority 3", "Priority 4", "Priority 5"
      ],
  		datasets: [{
        label: 'Very Low',
        backgroundColor: '#DC143C',
        borderColor: '#DC143C',
        borderWidth: 1,
        data: [
          <?php echo $very_low; ?>
        ]
      },{
        label: 'Low',
        backgroundColor: '#FF4500',
        borderColor: '#FF4500',
        borderWidth: 1,
        data: [
          <?php echo $low; ?>
        ]
      },{
        label: 'Enough',
        backgroundColor: '#FFA500',
        borderColor: '#FFA500',
        borderWidth: 1,
        data: [
          <?php echo $enough; ?>
        ]
      },{
        label: 'Good',
        backgroundColor: '#FFFF00',
        borderColor: '#FFFF00',
        borderWidth: 1,
        data: [
          <?php echo $good; ?>
        ]
      },{
        label: 'Excellent',
        backgroundColor: '#008000',
        borderColor: '#008000',
        borderWidth: 1,
        data: [
          <?php echo $excellent; ?>
        ]
      },{
        label: 'Over',
        backgroundColor: '#FF0000',
        borderColor: '#FF0000',
        borderWidth: 1,
        data: [
          <?php echo $over; ?>
        ]
      }]
    },
    options: {
      responsive: true,
      legend: {
        position: 'bottom',
        labels: {
          usePointStyle: true,
        }
      },
      title: {
        display: false,
        text: 'Tonase Sebelum Panen (Ton/Ha)'
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
          stacked: true,
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
          stacked: true,
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
    var type = $('#select_type').val();
    var tahun_siram = $('#select_tahun').val();
    window.location.href="/PIS/index.php/WIP_PM_Dashboard/plantation_group?page=<?php echo $page; ?>&pg="+pg+"&status="+status+"&jenis="+jenis+"&kelas="+kelas+"&tahun="+tahun+"&bulan="+bulan+"&umur="+umur+"&type="+type+"&tahun_siram="+tahun_siram;
  }
  function pindah_lokasi(){
    window.location.href="/PIS/index.php/WIP_PM_Lokasi/lokasi?lokasi="+$('#select_lokasi').val();
  }
  window.onload = function(){
		var ctx_tahun_siram = document.getElementById('diagram_tahun_siram').getContext('2d');
		window.myBar = new Chart(ctx_tahun_siram, config_tahun_siram);
		var ctx_prioritas = document.getElementById('diagram_prioritas').getContext('2d');
		window.myBar = new Chart(ctx_prioritas, config_prioritas);
  }
</script>
