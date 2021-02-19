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
        <span class="text-white-600 small">Dashboard</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/HPP_Total_Lokasi/lokasi?page=GALO&lokasi=<?php echo $produksi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Gallery</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/HPP_Total_Lokasi/lokasi?page=DSPK&lokasi=<?php echo $produksi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Detail SPK</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Heading -->
    <div class="sidebar-heading text-center">
      Category
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/HPP_Total_Lokasi/lokasi?page=CTLP&lokasi=<?php echo $produksi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Land Preparation</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/HPP_Total_Lokasi/lokasi?page=CTP1&lokasi=<?php echo $produksi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Observation</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/HPP_Total_Lokasi/lokasi?page=CTP2&lokasi=<?php echo $produksi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Plant Maintenance</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/HPP_Total_Lokasi/lokasi?page=CTP3&lokasi=<?php echo $produksi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Irrigation</span></a>
    </li>

    <li class="nav-item">
      <a class="nav-link p-1" href="/PIS/index.php/HPP_Total_Lokasi/lokasi?page=CTPR&lokasi=<?php echo $produksi['lokasi']; ?>">
        <i class="fas fa-fw fa-globe"></i>
        <span class="text-white-600 small">Production</span></a>
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
              <a href="/PIS/index.php/HPP_Total_Dashboard/plantation_group?pg=<?php echo $produksi['pg']; ?>"><?php echo $produksi['pg']; ?></a> -
              <a href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=<?php echo $produksi['wilayah']; ?>"><?php echo $produksi['wilayah']; ?></a> -
              <?php echo $produksi['lokasi']; ?> -
              Dashboard
            </b></span>
            <span class="d-sm-none" style="color:black;font-size:12px;"><b>
              <a href="/PIS/index.php/HPP_Total_Dashboard/plantation_group?pg=<?php echo $produksi['pg']; ?>"><?php echo $produksi['pg']; ?></a> -
              <a href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=<?php echo $produksi['wilayah']; ?>"><?php echo $produksi['wilayah']; ?></a> -
              <?php echo $produksi['lokasi']; ?> -
              Dashboard
            </b></span>
          </div>
        </form>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

          <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=<?php echo $produksi['wilayah']; ?>" role="button" aria-expanded="false">
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
                <span style="color:white;"><b>Location</b></span>
              </div>
              <div class="card-body" style="padding:0;height:100px;background-color:#9944CC;">
                <br>
                <input type="text" name="lokasi" id="lokasi" class="form-control" placeholder="Lokasi" style="background-color:#9944CC;color:black;text-align:center;font-size:25px;height:50px;" maxlength="5" value="<?php echo $produksi['lokasi']; ?>"/>
              </div>
            </div>
          </div>

          <div class="col-lg-10 p-1">
            <div class="card shadow" style="width:100%;">
              <div class="card-header py-0 text-center" style="background-color:#75229F;font-size:14px;">
                <span style="color:white;"><b>Profile <?php echo $produksi['lokasi']; ?></b></span>
              </div>
              <div class="card-body" style="padding:0;color:black;font-size:12px;font-weight:bold;">
                <div class="row px-3">
                  <div class="col-lg-3" style="padding:5px;">
                    <div class="card-body" style="padding:5px;background-color:#9944CC;">
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
                              <?php echo $produksi['kebun']; ?>
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
                              <?php echo $wilayah['kasie_kebun'.substr($produksi['kebun'], 3)]; ?>
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
                              <?php echo $produksi['status']; ?>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              Varietas Bibit
                            </td>
                            <td>
<?php
  if($produksi['varietas'] == NULL){
    echo "-";
  }
  else{
    echo $produksi['varietas'];
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
  if($produksi['jenis'] == NULL){
    echo "-";
  }
  else{
    echo $produksi['jenis'];
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
  if($produksi['kelas'] == NULL){
    echo "-";
  }
  else{
    echo $produksi['kelas'];
  }
?>
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
                              Tgl Perawatan
                            </td>
                            <td>
<?php
  if($produksi['tgl_awal_perawatan'] == NULL){
    echo "-";
  }
  else{
    echo format_tgl($produksi['tgl_awal_perawatan']);
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
  if($produksi['status'] == "NSBB" || $produksi['status'] == "NSBK"){
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
  if($produksi['status'] == "NSBB" || $produksi['status'] == "NSBK"){
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
                              Panen
                            </td>
                            <td>
                              <select name="tgl_panen" id="tgl_panen" style="color:black;font-weight:bold;width:100%;" onchange="select_main_filter()">
<?php
  foreach ($tgl_panen_all as $tpa) {
    if($tpa->tgl_panen == $tgl_panen){
?>
                                <option style="color:black;font-weight:bold;width:100%;" value="<?php echo $tpa->tgl_panen; ?>" selected><?php echo format_tgl($tpa->tgl_panen); ?></option>
<?php
    }
    else{
?>
                                <option style="color:black;font-weight:bold;width:100%;" value="<?php echo $tpa->tgl_panen; ?>"><?php echo format_tgl($tpa->tgl_panen); ?></option>
<?php
    }
  }
?>
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
                            <td width="120px">
                              Luas
                            </td>
                            <td>
<?php
  if($produksi['real_dan_sisa_rencana_luas'] != NULL){
    echo angka_ribuan_2($produksi['real_dan_sisa_rencana_luas']);
  }
  else{
    echo angka_ribuan_2($produksi['luas']);
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
  if($produksi['status'] == "NSBB" || $produksi['status'] == "NSBK"){
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
  if($produksi['status'] == "NSBB" || $produksi['status'] == "NSBK"){
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
  if($produksi['status'] == "NSBB" || $produksi['status'] == "NSBK"){
    echo "-";
  }
  else{
    echo $umur;
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
          <div class="col-lg-12 p-1">
            <div class="card shadow" style="width:100%;">
              <div class="card-body" style="padding:0;">
                <div id="peta" style="width:100%;height:350px;"></div>
              </div>
            </div>
          </div>
        </div>

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
  $status = $produksi['status'];
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
      else{
        $bpp = $ec->BPP_NSSC_ha;
      }
      $bpp = $bpp * $luas;
    }
    else{
      if($status == "NSFC"){
        $bpp = $ec->BPP_NSFC_kg;
      }
      else{
        $bpp = $ec->BPP_NSSC_kg;
      }
      $bpp = $bpp * $tonase * 1000;
    }
    $rfb = $bpp;
    $total_bpp += $bpp;
    $total_rfb += $bpp;

    $total_r += $element_cost_real[$ec->code];

    if(isset($forecast_overhead[$ec->code]['fo'])){
      $fo = $forecast_overhead[$ec->code]['fo'];
    }
    else{
      $fo = 0;
    }

    $real_rf = $hpp[$ec->code];

    $total_rf += $real_rf;
    $total_f += $real_rf - $element_cost_real[$ec->code];
    // echo "<pre>";
    // var_dump($bpp);
    // echo "</pre>";
    // die();
?>
                        <tr style="font-weight:bold;">
                          <td style="color:black;padding-top:2px;padding-bottom:2px;"><a style="color:black;text-decoration:none;" href="/PIS/index.php/HPP_Total_Lokasi/activity_detail?lokasi=<?php echo $produksi['lokasi']; ?>&ec=<?php echo $ec->code; ?>&page=<?php echo $page; ?>&subpage=SPEC"><?php echo $ec->nama; ?></a></td>
                          <td class="text-right" style="color:black;padding-top:2px;padding-bottom:2px;"><?php echo angka_ribuan($bpp / $pembagi); ?></td>
                          <td class="text-right" style="color:black;padding-top:2px;padding-bottom:2px;"><?php echo angka_ribuan($rfb / $pembagi); ?></td>
                          <td class="text-right" style="color:black;padding-top:2px;padding-bottom:2px;"><?php echo angka_ribuan($element_cost_real[$ec->code] / $pembagi); ?></td>
                          <td class="text-right" style="color:black;padding-top:2px;padding-bottom:2px;"><?php echo angka_ribuan(($real_rf - $element_cost_real[$ec->code]) / $pembagi); ?></td>
                          <td class="text-right" style="color:black;padding-top:2px;padding-bottom:2px;"><?php echo angka_ribuan($real_rf / $pembagi); ?></td>
                        </tr>
<?php
  }
?>
                        <tr style="background-color:#75229F;font-weight:bold;">
                          <td class="text-center" style="color:white;padding-top:10px;padding-bottom:10px;">Total</td>
                          <td class="text-right" style="color:white;padding-top:10px;padding-bottom:10px;"><?php echo angka_ribuan($total_bpp / $pembagi); ?></td>
                          <td class="text-right" style="color:white;padding-top:10px;padding-bottom:10px;"><?php echo angka_ribuan($total_rfb / $pembagi); ?></td>
                          <td class="text-right" style="color:white;padding-top:10px;padding-bottom:10px;"><?php echo angka_ribuan($total_r / $pembagi); ?></td>
                          <td class="text-right" style="color:white;padding-top:10px;padding-bottom:10px;"><?php echo angka_ribuan($total_f / $pembagi); ?></td>
                          <td class="text-right" style="color:white;padding-top:10px;padding-bottom:10px;"><?php echo angka_ribuan($total_rf / $pembagi); ?></td>
                        </tr>
                      </table>
                    </div>
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
                              <td style="color:white;background-color:#75229F;">Cost Impact</td>
                            </tr>
                            <tr>
                              <td style="padding-top:5px;padding-bottom:5px;color:black;"><?php echo angka_ribuan(($total_rf - $total_bpp) / $pembagi); ?><br>Rp/<?php echo $element_cost; ?></td>
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
?>
                              <td style="padding-top:5px;padding-bottom:5px;color:black;background-color:<?php echo $category_color; ?>;"><?php echo $category; ?></td>
                              <td style="padding-top:5px;padding-bottom:5px;color:black;"><?php echo round(((($total_rf - $total_bpp) / $total_bpp) * 100)); ?> %</td>
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
  if($group_cost_total['Total'] != NULL){
    $p_gc_labour = round(($group_cost_total['Labour'] / $group_cost_total['Total']) * 100);
    $p_gc_charge = round(($group_cost_total['Charge'] / $group_cost_total['Total']) * 100);
    $p_gc_material = round(($group_cost_total['Material'] / $group_cost_total['Total']) * 100);
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

              <div class="col-lg-6 p-1">
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
  if(($group_cost_std_total['Labour'] * $luas) >= $group_cost_total['Labour']){
    $color = "#32CD32";
  }
  else{
    $color = "#FF0000";
  }
?>
                        <td style="padding-top:10px;padding-bottom:10px;color:<?php echo $color; ?>;"><?php echo angka_ribuan($group_cost_total['Labour'] / $luas); ?></td>
<?php
  if(($group_cost_std_total['Charge'] * $luas) >= $group_cost_total['Charge']){
    $color = "#32CD32";
  }
  else{
    $color = "#FF0000";
  }
?>
                        <td style="padding-top:10px;padding-bottom:10px;color:<?php echo $color; ?>;"><?php echo angka_ribuan($group_cost_total['Charge'] / $luas); ?></td>
<?php
  if(($group_cost_std_total['Material'] * $luas) >= $group_cost_total['Material']){
    $color = "#32CD32";
  }
  else{
    $color = "#FF0000";
  }
?>
                        <td style="padding-top:10px;padding-bottom:10px;color:<?php echo $color; ?>;"><?php echo angka_ribuan($group_cost_total['Material'] / $luas); ?></td>
                      </tr>
                      <tr class="text-center" style="font-weight:bold;background-color:#75229F">
                        <td style="color:white;padding-top:5px;padding-bottom:5px;"><?php echo angka_ribuan($group_cost_std_total['Labour']); ?></td>
                        <td style="color:white;padding-top:5px;padding-bottom:5px;"><?php echo angka_ribuan($group_cost_std_total['Charge']); ?></td>
                        <td style="color:white;padding-top:5px;padding-bottom:5px;"><?php echo angka_ribuan($group_cost_std_total['Material']); ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-5">
            <div class="row mb-1">
              <div class="col-lg-12 p-1">
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
            </div>

            <div class="row mb-1">
              <div class="col-lg-12 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-header py-0 text-center" style="background-color:#75229F;">
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
  while ($a <= 21) {
    if($a == 1){
      $real_acc = $group_cost_biaya['B'.$a];
      $std_acc = $group_cost_std[$a];
      $real = round($real_acc / $luas);
      $std = round($std_acc / $luas);
      $max = $group_cost_biaya['B'.$a];
      $max2 = $group_cost_std[$a];
    }
    else{
      $real_acc += $group_cost_biaya['B'.$a];
      $std_acc += $group_cost_std[$a];
      $real .= ", ".round($real_acc / $luas);
      $std .= ", ".round($std_acc / $luas);
      if($max < $real_acc){
        $max = $real_acc;
      }
      if($max2 < $std_acc){
        $max2 = $std_acc;
      }
    }
    $a++;
  }

  $date1 = strtotime($tgl_rencana_forcing) / 86400;
  $date2 = strtotime($produksi['tgl_awal_perawatan']) / 86400;
  $umur_f = ceil(($date1-$date2) / 30.4583333333333);
  $i_f = 1;
  $bu_f = '';

  if($max <= $max2){
    $max = $max2;
  }

  while($i_f <= 21){
    if($i_f == 1){
      if($i_f == $umur_f){
        $bu_f .= $max / $luas;
      }
      else{
        $bu_f .= '0';
      }
    }
    else if($i_f == $umur_f){
      $bu_f .= ", ".($max / $luas);
    }
    else{
      $bu_f .= ', 0';
    }
    $i_f++;
  }
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
      }, {
        type: 'bar',
        label: 'Forcing',
        backgroundColor: '#005C5C',
        data: [
          <?php echo $bu_f; ?>
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
            min: 0
          },
          ticks: {
            min: 0,
            callback: function(label, index, labels) {
              return (label / 1000000) + "M";
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
                  <div class="card-header py-0 text-center" style="background-color:#75229F;">
                    <span style="color:white;font-size:14px;"><b>Timeline Cost</b></span>
                  </div>
                  <div class="card-body" style="padding:0;">
                    <table class="table_hpp" style="font-weight:bold;">
                      <tr>
                        <td style="color:white;background-color:#75229F;padding-top:5px;padding-bottom:5px;">BK</td>
                        <td class="text-center" style="padding-top:5px;padding-bottom:5px;"><?php if($timeline_perawatan['BK']['hari'] != NULL) echo $timeline_perawatan['BK']['hari']." Hari"; else echo "-"; ?></td>
                        <td class="text-center" style="padding-top:5px;padding-bottom:5px;"><?php if($timeline_perawatan['BK']['biaya'] != NULL) echo angka_ribuan($timeline_perawatan['BK']['biaya']/ $luas)." Rp/Ha"; else echo "-"; ?></td>
                      </tr>
                      <tr>
                        <td style="color:white;background-color:#75229F;padding-top:5px;padding-bottom:5px;">ST</td>
                        <td class="text-center" style="padding-top:5px;padding-bottom:5px;"><?php if($timeline_perawatan['ST']['hari'] != NULL) echo $timeline_perawatan['ST']['hari']." Hari"; else echo "-"; ?></td>
                        <td class="text-center" style="padding-top:5px;padding-bottom:5px;"><?php if($timeline_perawatan['ST']['biaya'] != NULL) echo angka_ribuan($timeline_perawatan['ST']['biaya']/ $luas)." Rp/Ha"; else echo "-"; ?></td>
                      </tr>
                      <tr>
                        <td style="color:white;background-color:#75229F;padding-top:5px;padding-bottom:5px;">Pre Forcing</td>
                        <td class="text-center" style="padding-top:5px;padding-bottom:5px;"><?php if($timeline_perawatan['Pre']['hari'] != NULL) echo $timeline_perawatan['Pre']['hari']." Hari"; else echo "-"; ?></td>
                        <td class="text-center" style="padding-top:5px;padding-bottom:5px;"><?php if($timeline_perawatan['Pre']['biaya'] != NULL) echo angka_ribuan($timeline_perawatan['Pre']['biaya']/ $luas)." Rp/Ha"; else echo "-"; ?></td>
                      </tr>
                      <tr>
                        <td style="color:white;background-color:#75229F;padding-top:5px;padding-bottom:5px;">Post Forcing</td>
                        <td class="text-center" style="padding-top:5px;padding-bottom:5px;"><?php if($timeline_perawatan['Post']['hari'] != NULL) echo $timeline_perawatan['Post']['hari']." Hari"; else echo "-"; ?></td>
                        <td class="text-center" style="padding-top:5px;padding-bottom:5px;"><?php if($timeline_perawatan['Post']['biaya'] != NULL) echo angka_ribuan($timeline_perawatan['Post']['biaya']/ $luas)." Rp/Ha"; else echo "-"; ?></td>
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
<script>
<?php
$longlat = explode(", ", $coordinate['longlat']);
?>
function initMap() {
var map = new google.maps.Map(document.getElementById('peta'), {
  center:new google.maps.LatLng(<?php echo $longlat[1]; ?>, <?php echo $longlat[0]; ?>),
  zoom:15,
  mapTypeId: google.maps.MapTypeId.SATELLITE
});

<?php
switch ($coordinate['performance']) {
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

switch ($coordinate['kebun']) {
  case '1':
    $warna_border = "#FF4500";
    break;
  case '2':
    $warna_border = "#00FFFF";
    break;
  case '3':
    $warna_border = "#FF00FF";
    break;

  default:
    $warna_border = "#000000";
    break;
}

$long = sizeof($longlat) - 1;
?>
  var longlat<?php echo $coordinate['lokasi']; ?> = [
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
  var lok<?php echo $coordinate['lokasi']; ?> = new google.maps.Polygon({
    paths: longlat<?php echo $coordinate['lokasi']; ?>,
    strokeColor: '<?php echo $warna_isi; ?>',
    strokeOpacity: 1,
    strokeWeight: 4,
    fillColor: '<?php echo $warna_isi; ?>',
    fillOpacity: 0
  });
  lok<?php echo $coordinate['lokasi']; ?>.setMap(map);
  google.maps.event.addListener(lok<?php echo $coordinate['lokasi']; ?>, "click", function(event) {
    var info<?php echo $coordinate['lokasi']; ?> = "<div class='row mb-1'>" +
        "<div class='col-lg-12 text-center'>" +
          "<h3 style='color:black;'><?php echo $coordinate['lokasi']; ?></h3>" +
        "</div>" +
      "</div>" +
      "<div class='row mb-1'>" +
        "<div class='col-lg-12'>" +
          "<table width='100%' class='table_hpp'>" +
            "<tr>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>PG</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $coordinate['pg']; ?></b></td>" +
            "</tr>" +
            "<tr>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Wilayah</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $coordinate['wilayah']; ?></b></td>" +
            "</tr>" +
            "<tr>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Kebun</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $coordinate['kebun']; ?></b></td>" +
            "</tr>" +
            "<tr>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Lokasi</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $coordinate['lokasi']; ?></b></td>" +
            "</tr>" +
            "<tr>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Luas</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $coordinate['luas']; ?> Ha</b></td>" +
            "</tr>" +
            "<tr>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Status</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $coordinate['status']; ?></b></td>" +
            "</tr>" +
            "<tr>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Yield</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php if($coordinate['yield'] == NULL) echo '-'; else echo round($coordinate['yield']); ?> Ton/Ha</b></td>" +
            "</tr>" +
            "<tr>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Category</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
              "<td style='color:<?php echo $warna_isi; ?>;padding-top:1px;padding-bottom:1px;'><b><?php if($coordinate['performance'] == NULL) echo '-'; else echo $coordinate['performance']; ?></b></td>" +
            "</tr>" +
<?php
  if($coordinate['foto'] != NULL){
?>
            "<tr>" +
              "<td colspan='3' style='color:black;padding-top:5px;padding-bottom:1px;' align='center'>" +
                "<img onclick='show_modal_show_foto(\"<?php echo $coordinate['foto']; ?>\")' src='<?php echo $coordinate['foto']; ?>' height='auto' width='150'>" +
              "</td>" +
            "</tr>" +
<?php
  }
?>
          "</table>" +
        "</div>" +
      "</div>";
    iw<?php echo $coordinate['lokasi']; ?> = new google.maps.InfoWindow();
    iw<?php echo $coordinate['lokasi']; ?>.setContent(info<?php echo $coordinate['lokasi']; ?>);
    iw<?php echo $coordinate['lokasi']; ?>.setPosition(event.latLng);
    iw<?php echo $coordinate['lokasi']; ?>.open(map);
  });

  if(navigator.geolocation){
    navigator.geolocation.getCurrentPosition(function(p){
      var cp = new google.maps.Marker({
        position:{
          lat: p.coords.latitude,
          lng: p.coords.longitude
        },
        map: map,
        icon: '/PIS/assets/images/marker.png'
      });
    });
  }
}

window.initialize = initMap;
</script>
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
      select_main_filter(1);
    }
  }
  function select_main_filter(change){
    var lokasi = $('#lokasi').val();
    var element_cost = $('#select_element_cost').val();
    var group_cost = $('#select_group_cost').val();

    if(change == 1){
      window.location.href="/PIS/index.php/HPP_Total_Lokasi/lokasi?page=<?php echo $page; ?>&lokasi="+lokasi+"&element_cost="+element_cost+"&group_cost="+group_cost;
    }
    else{
      var tgl_panen = $('#tgl_panen').val();
      window.location.href="/PIS/index.php/HPP_Total_Lokasi/lokasi?page=<?php echo $page; ?>&lokasi="+lokasi+"&element_cost="+element_cost+"&group_cost="+group_cost+"&tgl_panen="+tgl_panen;
    }
  }
  window.onload = function(){
    var ctx_group_cost = document.getElementById('diagram_group_cost').getContext('2d');
    window.myBar = new Chart(ctx_group_cost, config_group_cost);
    var ctx_p_gc = document.getElementById('diagram_p_gc').getContext('2d');
    window.myBar = new Chart(ctx_p_gc, config_p_gc);
  }
</script>
