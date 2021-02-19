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
    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/HPP_Total_Dashboard/plantation_group?page=HM&pg=<?php echo $pg; ?>">
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

    <li class="nav-item active">
      <a class="nav-link p-1" href="#">
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
              Summary 1
            </b></span>
            <span class="d-sm-none" style="color:black;font-size:12px;"><b>
              <?php if($pg != "PG") echo $pg_desc['code']; else echo "All PG"; ?> -
              Summary 1
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

        <div class="row mb-1">
          <div class="col-lg-6">
            <div class="row mb-1">
              <div class="col-lg-6 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-header py-0 text-center" style="background-color:#75229F;">
                    <span style="color:white;font-size:14px;"><b>Proporsi Luas Panen</b></span>
                  </div>
                  <div class="card-body" style="padding:0;">
                    <canvas id="diagram_proporsi_luas_panen" style="padding:5px;"></canvas>
<?php
  if($proporsi_luas_panen['Total'] != 0){
    $NSFC = round(($proporsi_luas_panen['NSFC'] / $proporsi_luas_panen['Total']) * 100);
    $NSSC = round(($proporsi_luas_panen['NSSC'] / $proporsi_luas_panen['Total']) * 100);
  }
  else{
    $NSFC = round((0) * 100);
    $NSSC = round((0) * 100);
  }
  $proporsi_luas_panen = $NSFC.', '.$NSSC;
?>
<script>
  var config_proporsi_luas_panen = {
    type: 'doughnut',
    data: {
      datasets: [{
        data: [
          <?php echo $proporsi_luas_panen; ?>
        ],
        backgroundColor: [
          '#00008B',
          '#8B4513'
        ],
        label: 'Cost and Production'
      }],
      labels: [
        'NSFC',
        'NSSC'
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
                  <div class="card-header py-0 text-center" style="background-color:#75229F;">
                    <span style="color:white;font-size:14px;"><b>Kondisi Drainase</b></span>
                  </div>
                  <div class="card-body" style="padding:0;">
                    <canvas id="diagram_kondisi_drainase" style="padding:5px;"></canvas>
<?php
  if($kondisi_drainase['Total'] != 0){
    $Berat = round(($kondisi_drainase['Berat'] / $kondisi_drainase['Total']) * 100);
    $Sedang = round(($kondisi_drainase['Sedang'] / $kondisi_drainase['Total']) * 100);
    $Ringan = round(($kondisi_drainase['Ringan'] / $kondisi_drainase['Total']) * 100);
  }
  else{
    $Berat = round((0) * 100);
    $Sedang = round((0) * 100);
    $Ringan = round((0) * 100);
  }
  $kondisi_drainase = $Berat.', '.$Sedang.', '.$Ringan;
?>
<script>
  var config_kondisi_drainase = {
    type: 'doughnut',
    data: {
      datasets: [{
        data: [
          <?php echo $kondisi_drainase; ?>
        ],
        backgroundColor: [
          '#B22222',
          '#228B22',
          '#696969'
        ],
        label: 'Cost and Production'
      }],
      labels: [
        'Berat',
        'Sedang',
        'Ringan'
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
              <div class="col-lg-6 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-header py-0 text-center" style="background-color:#75229F;">
                    <span style="color:white;font-size:14px;"><b>Budget HPP</b></span>
                  </div>
                  <div class="card-body" style="padding:0;">
                    <table class="table_hpp" style="font-weight:bold;">
                      <tr>
                        <td class="text-center" rowspan="2" style="background-color:#75229F;color:white;"><?php echo $tahun; ?></td>
                        <td class="text-right" style="padding-top:20px;padding-bottom:20px;"><?php if($luas != NULL) echo angka_ribuan($ec_total['BPP_'.$status.'_ha']); else echo "-"; ?> Rp/Ha</td>
                      </tr>
                      <tr>
                        <td class="text-right" style="padding-top:20px;padding-bottom:20px;"><?php if($luas != NULL) echo angka_ribuan($ec_total['BPP_'.$status.'_kg']); else echo "-"; ?> Rp/Kg</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>

              <div class="col-lg-6 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-header py-0 text-center" style="background-color:#75229F;">
                    <span style="color:white;font-size:14px;"><b>Realization HPP</b></span>
                  </div>
                  <div class="card-body" style="padding:0;">
                    <table class="table_hpp" style="font-weight:bold;">
                      <tr>
                        <td class="text-center" rowspan="2" style="background-color:#75229F;color:white;"><?php echo $tahun; ?></td>
                        <td class="text-right" style="padding-top:20px;padding-bottom:20px;"><?php if($luas != NULL) echo angka_ribuan($hpp_total['Total'] / $luas); else echo "-"; ?> Rp/Ha</td>
                      </tr>
                      <tr>
                        <td class="text-right" style="padding-top:20px;padding-bottom:20px;"><?php if($luas != NULL) echo angka_ribuan($hpp_total['Total'] / $tonase / 1000); else echo "-"; ?> Rp/Kg</td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 p-1">
            <div class="card shadow" style="width:100%;">
              <div class="card-header py-0 text-center" style="background-color:#75229F;">
                <span style="color:white;font-size:14px;"><b>Real Cost Per Umur</b></span>
              </div>
              <div class="card-body" style="padding:0;">
                <canvas id="diagram_biaya_umur"></canvas>
<?php
  $bu_real = '';
  $bu_std = '';
  $a = 1;
  if($luas != NULL){
    while ($a <= 21) {
      if($a == 1){
        $real = $trend_cost['U'.$a.'_r'];
        $bu_real = round($real / $luas);
        $std = $trend_cost['U'.$a.'_b'];
        $bu_std = round($std / $luas);
      }
      else{
        $real += $trend_cost['U'.$a.'_r'];
        $bu_real .= ', '.round($real / $luas);
        $std += $trend_cost['U'.$a.'_b'];
        $bu_std .= ', '.round($std / $luas);
      }
      $a++;
    }
    $option1 = 'true';
    $option2  = "label / 1000000 + ' M'";
  }
  else{
    $bu_real = ", , , , , , , , , , , , , , , , , , , , ,";
    $bu_std = ", , , , , , , , , , , , , , , , , , , , ,";
    $option1 = 'false';
    $option2  = "label";
  }
?>
<script>
	var config_biaya_umur = {
    type: 'bar',
    data: {
  		labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '>20'],
  		datasets: [{
  			type: 'line',
  			label: 'Std Biaya',
  			borderColor: '#FF0000',
        backgroundColor : '#FF0000',
  			borderWidth: 3,
				pointRadius: 3,
  			fill: false,
  			data: [
          <?php echo $bu_std; ?>
  			]
  		}, {
  			type: 'line',
  			label: 'Biaya',
  			borderColor: '#228B22',
        backgroundColor : '#228B22',
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
            return label + ' : ' + val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
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
              return <?php echo $option2; ?>;
            }
					},
          scaleLabel: {
              display: <?php echo $option1; ?>,
              labelString: '1 M = 1000.000'
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
    var group_cost = $('#select_group_cost').val();
    var group_cost_filter = $('#select_group_cost_filter').val();

    if(change == 1){
      window.location.href="/PIS/index.php/HPP_Total_Dashboard/plantation_group?page=<?php echo $page; ?>&pg="+pg+"&status="+status+"&jenis="+jenis+"&kelas="+kelas+"&bulan="+bulan+"&element_cost="+element_cost;
    }
    else{
      window.location.href="/PIS/index.php/HPP_Total_Dashboard/plantation_group?page=<?php echo $page; ?>&pg="+pg+"&status="+status+"&jenis="+jenis+"&kelas="+kelas+"&tahun="+tahun+"&bulan="+bulan+"&element_cost="+element_cost;
    }
  }
  window.onload = function(){
		var ctx_proporsi_luas_panen = document.getElementById('diagram_proporsi_luas_panen').getContext('2d');
		window.myBar = new Chart(ctx_proporsi_luas_panen, config_proporsi_luas_panen);
		var ctx_kondisi_drainase = document.getElementById('diagram_kondisi_drainase').getContext('2d');
		window.myBar = new Chart(ctx_kondisi_drainase, config_kondisi_drainase);
		var ctx_biaya_umur = document.getElementById('diagram_biaya_umur').getContext('2d');
		window.myBar = new Chart(ctx_biaya_umur, config_biaya_umur);
		var ctx_unsur_umur = document.getElementById('diagram_unsur_umur').getContext('2d');
		window.myBar = new Chart(ctx_unsur_umur, config_unsur_umur);
  }
</script>
