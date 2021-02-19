<!-- Page Wrapper -->
<div id="wrapper">
  <!-- Sidebar -->
  <ul class="navbar-nav sidebar sidebar-dark accordion toggled" style="background-color:#9F229F;" id="accordionSidebar">

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
          <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W01">Wilayah 1</a>
          <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W02">Wilayah 2</a>
          <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W03">Wilayah 3</a>
          <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W04">Wilayah 4</a>
<?php
    break;
    case 'PG2':
?>
          <h6 class="collapse-header p-1 text-center">PG2</h6>
          <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W05">Wilayah 5</a>
          <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W06">Wilayah 6</a>
          <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W07">Wilayah 7</a>
          <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W08">Wilayah 8</a>
<?php
    break;
    case 'PG3':
?>
          <h6 class="collapse-header p-1 text-center">PG3</h6>
          <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W09">Wilayah 9</a>
          <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W11">Wilayah 11</a>
          <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W12">Wilayah 12</a>
          <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W13">Wilayah 13</a>
          <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W14">Wilayah 14</a>
<?php
    break;
    case 'PG':
?>
          <h6 class="collapse-header p-1 text-center">PG1</h6>
          <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W01">Wilayah 1</a>
          <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W02">Wilayah 2</a>
          <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W03">Wilayah 3</a>
          <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W04">Wilayah 4</a>
          <h6 class="collapse-header p-1 text-center">PG2</h6>
          <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W05">Wilayah 5</a>
          <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W06">Wilayah 6</a>
          <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W07">Wilayah 7</a>
          <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W08">Wilayah 8</a>
          <h6 class="collapse-header p-1 text-center">PG3</h6>
          <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W09">Wilayah 9</a>
          <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W11">Wilayah 11</a>
          <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W12">Wilayah 12</a>
          <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W13">Wilayah 13</a>
          <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W14">Wilayah 14</a>
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
      <a class="nav-link p-1" href="/PIS/index.php/HPP_Total_Dashboard/plantation_group?page=S1&pg=<?php echo $pg; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Summary 1</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/HPP_Total_Dashboard/perlocation_pg?pg=<?php echo $pg; ?>">
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
            <a class="nav-link dropdown-toggle" href="/PIS/index.php/HPP_Total_Dashboard" role="button" aria-expanded="false">
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
              <div class="card-header py-0 text-center" style="background-color:#75229F;font-size:14px;">
                <span style="color:white;"><b>Plantation Group</b></span>
              </div>
              <div class="card-body" style="padding:0;height:100px;background-color:#9944CC;">
                <br>
                <input type="text" name="wilayah" id="pg" class="form-control" placeholder="Lokasi" style="background-color:#9944CC;color:black;text-align:center;font-size:25px;height:50px;" maxlength="3" value="<?php echo $pg; ?>"/>
              </div>
            </div>
          </div>

          <div class="col-lg-10 p-1">
            <div class="card shadow" style="width:100%;">
              <div class="card-header py-0 text-center" style="background-color:#75229F;font-size:14px;">
                <span style="color:white;"><b>Profile <?php echo $pg; ?></b></span>
              </div>
              <div class="card-body" style="padding:0;color:black;font-size:12px;font-weight:bold;">
                <div class="row px-3">
                  <div class="col-lg-3" style="padding:5px;">
                    <div class="card-body" style="padding:5px;background-color:#9944CC;">
                      <table width="100%">
                        <tbody>
                          <tr>
                            <td width="120px">
                              Senior Manager
                            </td>
                            <td>
                              <?php echo $pg_desc['senior_manager']; ?>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Manager PQPI
                            </td>
                            <td>
                              <?php echo $pg_desc['manager_pqpi']; ?>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Manager FS
                            </td>
                            <td>
                              <?php echo $pg_desc['manager_fs']; ?>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              &nbsp;
                            </td>
                            <td>
                              &nbsp;
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="col-lg-3" style="padding:5px;">
                    <div class="card-body" style="padding:5px;background-color:#9944CC;">
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
                                <option style="color:black;font-weight:bold;width:100%;" value="NS" <?php echo $option_status_1; ?>>NS</option>
                                <option style="color:black;font-weight:bold;width:100%;" value="NSFC" <?php echo $option_status_2; ?>>NSFC</option>
                                <option style="color:black;font-weight:bold;width:100%;" value="NSSC" <?php echo $option_status_3; ?>>NSSC</option>
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
                              </select>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="col-lg-3" style="padding:5px;">
                    <div class="card-body" style="padding:5px;background-color:#9944CC;">
                      <table width="100%">
                        <tbody>
                          <tr>
                            <td>
                              Tahun Panen
                            </td>
                            <td>
                              <select name="tahun" id="tahun" style="color:black;font-weight:bold;width:100%;" onchange="select_main_filter()">
<?php
  $a = 0;
  while($a < sizeof($tahun_panen)){
    if($tahun_panen[$a]['tahun_panen'] == $tahun){
?>
                                <option style="color:black;font-weight:bold;width:100%;" value="<?php echo $tahun_panen[$a]['tahun_panen']; ?>" selected><?php echo $tahun_panen[$a]['tahun_panen']; ?></option>
<?php
    }
    else{
?>
                                <option style="color:black;font-weight:bold;width:100%;" value="<?php echo $tahun_panen[$a]['tahun_panen']; ?>"><?php echo $tahun_panen[$a]['tahun_panen']; ?></option>
<?php
    }
    $a++;
  }
?>
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
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="col-lg-3" style="padding:5px;">
                    <div class="card-body" style="padding:5px;background-color:#9944CC;">
                      <table width="100%" class="text-center" style="font-weight:bold;">
                        <tbody>
                          <tr>
                            <td width="10px" style="color:#9944CC;">
                              -
                            </td>
                            <td colspan="3">

                            </td>
                            <td width="10px" style="color:#9944CC;">
                              -
                            </td>
                          </tr>
                          <tr>
                            <td style="color:#9944CC;">
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
                            <td style="color:#9944CC;">
                              -
                            </td>
                          </tr>
                          <tr>
                            <td style="color:#9944CC;">
                              -
                            </td>
                            <td style="color:#9944CC;">
                              -
                            </td>
                          </tr>
                          <tr>
                            <td style="color:#9944CC;">
                              -
                            </td>
                            <td colspan="3">

                            </td>
                            <td style="color:#9944CC;">
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
                  <div class="card-header py-0 text-center" style="background-color:#75229F;">
                    <span style="color:white;font-size:14px;"><b>Raport</b></span>
                  </div>
                  <div class="card-body" style="padding:0;">
<?php
  if($element_cost == "Ha"){
    $pembagi = $luas;
  }
  else{
    $pembagi = $tonase * 1000;
  }
?>
                    <div class="table-responsive">
                      <table class="table_hpp">
                        <tr class="text-center" style="background-color:#75229F;font-weight:bold;">
                          <td width="40%" style="color:white;padding-top:10px;padding-bottom:10px;">Element Cost</td>
                          <td width="12%" style="color:white;padding-top:10px;padding-bottom:10px;">BPP</td>
                          <td width="12%" style="color:white;padding-top:10px;padding-bottom:10px;">RFB</td>
                          <td width="12%" style="color:white;padding-top:10px;padding-bottom:10px;">Real</td>
                          <td width="12%" style="color:white;padding-top:10px;padding-bottom:10px;">Varian (KOB1)</td>
                          <td width="12%" style="color:white;padding-top:10px;padding-bottom:10px;">HPP</td>
                        </tr>
<?php
  $total_bpp = 0;
  $total_rfb = 0;
  $total_rf = 0;
  $total_r = 0;
  $total_f = 0;
  foreach ($element_cost_all as $ec) {
    if($element_cost == "Ha"){
        if($status == "NSFC"){
          $bpp = $ec->BPP_NSFC_ha;
        }
        else if($status == "NSSC"){
          $bpp = $ec->BPP_NSSC_ha;
        }
        else{
          $bpp = $ec->BPP_NS_ha;
        }
      $bpp = $bpp * $luas;
    }
    else{
        if($status == "NSFC"){
          $bpp = $ec->BPP_NSFC_kg;
        }
        else if($status == "NSSC"){
          $bpp = $ec->BPP_NSSC_kg;
        }
        else{
          $bpp = $ec->BPP_NS_kg;
        }
      $bpp = $bpp * $tonase * 1000;
    }
    $rfb = $bpp;
    $total_bpp += $bpp;
    $total_rfb += $bpp;

    $total_r += $real[$ec->code];

    $real_rf = $hpp[$ec->code];

    $total_rf += $real_rf;
    $total_f += $real_rf - ($real[$ec->code]);
?>
                        <tr style="font-weight:bold;">
                          <td style="color:black;padding-top:2px;padding-bottom:2px;"><?php echo $ec->nama; ?></td>
                          <td class="text-right" style="color:black;padding-top:2px;padding-bottom:2px;"><?php if($pembagi != NULL) echo angka_ribuan($bpp / $pembagi); else echo "-"; ?></td>
                          <td class="text-right" style="color:black;padding-top:2px;padding-bottom:2px;"><?php if($pembagi != NULL) echo angka_ribuan($rfb / $pembagi); else echo "-"; ?></td>
                          <td class="text-right" style="color:black;padding-top:2px;padding-bottom:2px;"><?php if($pembagi != NULL) echo angka_ribuan($real[$ec->code] / $pembagi); else echo "-"; ?></td>
                          <td class="text-right" style="color:black;padding-top:2px;padding-bottom:2px;"><?php if($pembagi != NULL) echo angka_ribuan(($real_rf - $real[$ec->code]) / $pembagi); else echo "-"; ?></td>
                          <td class="text-right" style="color:black;padding-top:2px;padding-bottom:2px;"><?php if($pembagi != NULL) echo angka_ribuan($real_rf / $pembagi); else echo "-"; ?></td>
                        </tr>
<?php
  }
?>
                        <tr style="background-color:#75229F;font-weight:bold;">
                          <td class="text-center" style="color:white;padding-top:10px;padding-bottom:10px;">Total</td>
                          <td class="text-right" style="color:white;padding-top:10px;padding-bottom:10px;"><?php if($pembagi != NULL) echo angka_ribuan($total_bpp / $pembagi); else echo "-"; ?></td>
                          <td class="text-right" style="color:white;padding-top:10px;padding-bottom:10px;"><?php if($pembagi != NULL) echo angka_ribuan($total_rfb / $pembagi); else echo "-"; ?></td>
                          <td class="text-right" style="color:white;padding-top:10px;padding-bottom:10px;"><?php if($pembagi != NULL) echo angka_ribuan($total_r / $pembagi); else echo "-"; ?></td>
                          <td class="text-right" style="color:white;padding-top:10px;padding-bottom:10px;"><?php if($pembagi != NULL) echo angka_ribuan($total_f / $pembagi); else echo "-"; ?></td>
                          <td class="text-right" style="color:white;padding-top:10px;padding-bottom:10px;"><?php if($pembagi != NULL) echo angka_ribuan($total_rf / $pembagi); else echo "-"; ?></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-5">
            <div class="row mb-1">
              <div class="col-lg-6 p-1">
                <div class="row">
                  <div class="col-lg-12 col-xs-6">
                    <div class="card shadow" style="width:100%;">
                      <div class="card-body" style="padding:0;">
                        <table class="text-center" width="100%" style="font-weight:bold;font-size:12px;">
                          <tbody>
                            <tr>
                              <td style="color:white;background-color:#75229F;">Cost Impact</td>
                            </tr>
                            <tr>
                              <td style="padding-top:5px;padding-bottom:5px;color:black;"><?php if($pembagi != NULL) echo angka_ribuan(($total_rf - $total_bpp) / $pembagi); else echo "-"; ?><br>Rp/<?php echo $element_cost; ?></td>
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
                              <td style="background-color:#75229F;color:white;">Category</td>
                              <td style="background-color:#75229F;color:white;">% Cost</td>
                            </tr>
                            <tr>
<?php
  if($total_bpp != NULL){
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
                              <td style="padding-top:5px;padding-bottom:5px;color:black;"><?php if($total_bpp != NULL) echo round(((($total_rf - $total_bpp) / $total_bpp) * 100)); else echo "-"; ?> %</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-body" style="padding:0;">
                    <canvas id="diagram_p_gc" height="150px"></canvas>
<?php
  if($real['Total'] != NULL){
    $p_gc_labour = round(($real['Labour'] / $real['Total']) * 100);
    $p_gc_charge = round(($real['Charge'] / $real['Total']) * 100);
    $p_gc_material = round(($real['Material'] / $real['Total']) * 100);
  }
  else{
    $p_gc_labour = round((0) * 100);
    $p_gc_charge = round((0) * 100);
    $p_gc_material = round((0) * 100);
  }
  $p_gc = $p_gc_labour.', '.$p_gc_charge.', '.$p_gc_material;
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
        ],
        label: 'Cost and Production'
      }],
      labels: [
        'Labour',
        'Charge',
        'Material',
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
            </div>

            <div class="row mb-1">
              <div class="col-lg-12 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-body" style="padding:0;">
                    <table class="table_hpp">
                      <tr class="text-center" style="font-weight:bold;background-color:#75229F">
                        <td style="color:white;padding-top:5px;padding-bottom:5px;">Labour</td>
                        <td style="color:white;padding-top:5px;padding-bottom:5px;">Charge</td>
                        <td style="color:white;padding-top:5px;padding-bottom:5px;">Material</td>
                      </tr>
                      <tr class="text-center" style="font-weight:bold;">
<?php
  if(($group_cost_std['Labour']) >= $real['Labour']){
    $color = "#32CD32";
  }
  else{
    $color = "#FF0000";
  }
?>
                        <td style="padding-top:10px;padding-bottom:10px;color:<?php echo $color; ?>;"><?php if($luas != NULL) echo angka_ribuan($real['Labour'] / $luas); else echo "-"; ?></td>
<?php
  if(($group_cost_std['Charge']) >= $real['Charge']){
    $color = "#32CD32";
  }
  else{
    $color = "#FF0000";
  }
?>
                        <td style="padding-top:10px;padding-bottom:10px;color:<?php echo $color; ?>;"><?php if($luas != NULL) echo angka_ribuan($real['Charge'] / $luas); else echo "-"; ?></td>
<?php
  if(($group_cost_std['Material']) >= $real['Material']){
    $color = "#32CD32";
  }
  else{
    $color = "#FF0000";
  }
?>
                        <td style="padding-top:10px;padding-bottom:10px;color:<?php echo $color; ?>;"><?php if($luas != NULL) echo angka_ribuan($real['Material'] / $luas); else echo "-"; ?></td>
                      </tr>
                      <tr class="text-center" style="font-weight:bold;background-color:#75229F">
                        <td style="color:white;padding-top:5px;padding-bottom:5px;"><?php if($luas != NULL) echo angka_ribuan($group_cost_std['Labour'] / $luas); else echo "-"; ?></td>
                        <td style="color:white;padding-top:5px;padding-bottom:5px;"><?php if($luas != NULL) echo angka_ribuan($group_cost_std['Charge'] / $luas); else echo "-"; ?></td>
                        <td style="color:white;padding-top:5px;padding-bottom:5px;"><?php if($luas != NULL) echo angka_ribuan($group_cost_std['Material'] / $luas); else echo "-"; ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mb-1">
              <div class="col-lg-12 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-header py-0 text-center" style="background-color:#75229F;">
                    <span style="color:white;font-size:14px;"><b>Biggest 3</b></span>
                  </div>
                  <div class="card-body" style="padding-bottom:5px;font-weight:bold;color:black;">
                    <canvas id="diagram_biggest"></canvas>
<?php
  $a = 1;
  $cek_b['1'] = "";
  $cek_b['2'] = "";
  $cek_b['3'] = "";
  $biggest = array(
    'N1' => array(
      'nama' => NULL,
      'biaya' => NULL,
    ),
    'N2' => array(
      'nama' => NULL,
      'biaya' => NULL,
    ),
    'N3' => array(
      'nama' => NULL,
      'biaya' => NULL,
    ),
  );
  while($a <= 15){
    if($a == 1){
      $biggest['N1']['biaya'] = $hpp['ZN0'.$a];
      $biggest['N1']['nama'] = 'ZN0'.$a;
      $cek_b['1'] = 'ZN0'.$a;
    }
    else if($a < 10){
      if($biggest['N1']['biaya'] < $hpp['ZN0'.$a]){
        $biggest['N1']['biaya'] = $hpp['ZN0'.$a];
        $biggest['N1']['nama'] = 'ZN0'.$a;
        $cek_b['1'] = 'ZN0'.$a;
      }
    }
    else{
      if($biggest['N1']['biaya'] < $hpp['ZN'.$a]){
        $biggest['N1']['biaya'] = $hpp['ZN'.$a];
        $biggest['N1']['nama'] = 'ZN'.$a;
        $cek_b['1'] = 'ZN'.$a;
      }
    }
    $a++;
  }
  $a = 1;
  while($a <= 15){
    if($a == 1 && 'ZN01' != $cek_b['1']){
      $biggest['N2']['biaya'] = $hpp['ZN0'.$a];
      $biggest['N2']['nama'] = 'ZN0'.$a;
      $cek_b['2'] = 'ZN0'.$a;
    }
    else if($a < 10 && 'ZN0'.$a != $cek_b['1']){
      if($biggest['N2']['biaya'] < $hpp['ZN0'.$a]){
        $biggest['N2']['biaya'] = $hpp['ZN0'.$a];
        $biggest['N2']['nama'] = 'ZN0'.$a;
        $cek_b['2'] = 'ZN0'.$a;
      }
    }
    else if($a >= 10 && 'ZN'.$a != $cek_b['1']){
      if($biggest['N2']['biaya'] < $hpp['ZN'.$a]){
        $biggest['N2']['biaya'] = $hpp['ZN'.$a];
        $biggest['N2']['nama'] = 'ZN'.$a;
        $cek_b['2'] = 'ZN'.$a;
      }
    }
    $a++;
  }
  $a = 1;
  while($a <= 15){
    if($a == 1 && 'ZN01' != $cek_b['1'] && 'ZN01' != $cek_b['2']){
      $biggest['N3']['biaya'] = $hpp['ZN0'.$a];
      $biggest['N3']['nama'] = 'ZN0'.$a;
      $cek_b['3'] = 'ZN0'.$a;
    }
    else if($a < 10 && 'ZN0'.$a != $cek_b['1'] && 'ZN0'.$a != $cek_b['2']){
      if($biggest['N3']['biaya'] < $hpp['ZN0'.$a]){
        $biggest['N3']['biaya'] = $hpp['ZN0'.$a];
        $biggest['N3']['nama'] = 'ZN0'.$a;
        $cek_b['3'] = 'ZN0'.$a;
      }
    }
    else if($a >= 10 && 'ZN'.$a != $cek_b['1'] && 'ZN'.$a != $cek_b['2']){
      if($biggest['N3']['biaya'] < $hpp['ZN'.$a]){
        $biggest['N3']['biaya'] = $hpp['ZN'.$a];
        $biggest['N3']['nama'] = 'ZN'.$a;
        $cek_b['3'] = 'ZN'.$a;
      }
    }
    $a++;
  }
 if($luas != NULL){
     $total_biggest = round($biggest['N1']['biaya'] / $luas).', '.round($biggest['N2']['biaya'] / $luas).', '.round($biggest['N3']['biaya'] / $luas);
     $nama_biggest = '"'.format_nama_ec($biggest['N1']['nama']).'", "'.format_nama_ec($biggest['N2']['nama']).'", "'.format_nama_ec($biggest['N3']['nama']).'"';
  }
  else{
    $total_biggest = "'-', '-', '-'";
    $nama_biggest = "'-', '-', '-'";
  }
?>
<script>
  var config_biggest = {
    type: 'bar',
    data: {
      labels: [<?php echo $nama_biggest; ?>],
      datasets: [{
      label: 'Biaya',
      backgroundColor: [
        '#B22222',
        '#FF8C00',
        '#ADFF2F',
      ],
      borderColor: [
        '#B22222',
        '#FF8C00',
        '#ADFF2F',
      ],
      borderWidth: 1,
      data: [
        <?php echo $total_biggest; ?>
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
            return label + ' : ' + val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
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
            min: 0
          }
        }],
        xAxes: [{
          ticks: {
            fontColor: "#000000",
          },
          gridLines: {
            display: false,
            drawBorder: true,
            drawOnChartArea: false,
          }
        }]
      },
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
            "<table width='100%' class='table_hpp'>" +
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
            "<button type='button' class='btn btn-info btn-sm' onclick='detail_lokasi(\"<?php echo $co->lokasi; ?>\");'>Detail Lokasi</button>" +
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
      select_main_filter(1);
    }
  }
  function select_main_filter(change){
    var status = $('#status').val();
    var jenis = $('#jenis').val();
    var kelas = $('#kelas').val();
    var tahun = $('#tahun').val();
    var bulan = $('#bulan').val();

    var pg = $('#pg').val();
    var element_cost = $('#select_element_cost').val();

    if(change == 1){
      window.location.href="/PIS/index.php/HPP_Total_Dashboard/plantation_group?page=<?php echo $page; ?>&pg="+pg+"&status="+status+"&jenis="+jenis+"&kelas="+kelas+"&bulan="+bulan+"&element_cost="+element_cost;
    }
    else{
      window.location.href="/PIS/index.php/HPP_Total_Dashboard/plantation_group?page=<?php echo $page; ?>&pg="+pg+"&status="+status+"&jenis="+jenis+"&kelas="+kelas+"&tahun="+tahun+"&bulan="+bulan+"&element_cost="+element_cost;
    }
  }
  window.onload = function(){
		var ctx_p_gc = document.getElementById('diagram_p_gc').getContext('2d');
		window.myBar = new Chart(ctx_p_gc, config_p_gc);
		var ctx_biggest = document.getElementById('diagram_biggest').getContext('2d');
		window.myBar = new Chart(ctx_biggest, config_biggest);
  }
</script>
