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
        <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=CTSP&lokasi=<?php echo $lokasi['lokasi']; ?>">
          <i class="fas fa-fw fa-globe"></i>
          <span class="text-white-600 small">Springkle</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link p-1" href="#">
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

      <li class="nav-item">
        <a class="nav-link p-1" href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=GCSE&lokasi=<?php echo $lokasi['lokasi']; ?>">
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
                Harvest
              </b></span>
              <span class="d-sm-none" style="color:black;font-size:12px;"><b>
                <a href="/PIS/index.php/WIP_PM_Dashboard/plantation_group?pg=<?php echo $pg_wil['pg']; ?>"><?php echo $pg_wil['pg']; ?></a> -
                <a href="/PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=<?php echo $pg_wil['wilayah']; ?>"><?php echo $pg_wil['wilayah']; ?></a> -
                <?php echo $lokasi['lokasi']; ?> -
                Harvest
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
    $date1 = round(strtotime($konstanta['nilai']) / 86400);
    $date2 = round(strtotime($lokasi['tgl_mulai_rawat']) / 86400);

    $umur = ($date1-$date2) / 30.4583333333333;

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

          <div class="row mb-1">
            <div class="col-lg-5">
              <div class="row mb-1">
                <div class="col-lg-6 p-1">
                  <div class="card shadow" style="width:100%;">
                    <div class="card-body" style="padding:0;">
                      <canvas id="diagram_tonase_1" style="padding:5px;"></canvas>
<?php
  if($tonase_panen['total'] != NULL){
    $tonase_panen_manual = round(($tonase_panen['manual'] / $tonase_panen['total']) * 100);
    $tonase_panen_mekanik = round(($tonase_panen['mekanik'] / $tonase_panen['total']) * 100);
  }
  else{
    $tonase_panen_manual = round((0) * 100);
    $tonase_panen_mekanik = round((0) * 100);
  }
  $panen_tonase_1 = $tonase_panen_manual.', '.$tonase_panen_mekanik;
?>
<script>
  var config_tonase_1 = {
    type: 'doughnut',
    data: {
      datasets: [{
        data: [
          <?php echo $panen_tonase_1; ?>
        ],
        backgroundColor: [
          '#2E8B57',
          '#20B2AA'
        ],
        label: 'Cost and Production'
      }],
      labels: [
        'Manual',
        'Mekanik'
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
        display: false,
        position: 'right',
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
                      <table class="table_pm">
                        <tr>
                          <td width="5px" style="background-color:#2E8B57;padding-top:10px;padding-bottom:10px;">&nbsp;</td>
                          <td style="padding-top:10px;padding-bottom:10px;">Manual</td>
                          <td style="font-weight:bold;padding-top:10px;padding-bottom:10px;" class="text-right"><?php echo angka_ribuan_2($tonase_panen['manual'] / 1000); ?> Ton</td>
                        </tr>
                        <tr>
                          <td width="5px" style="background-color:#20B2AA;padding-top:10px;padding-bottom:10px;">&nbsp;</td>
                          <td style="padding-top:10px;padding-bottom:10px;">Mekanik</td>
                          <td style="font-weight:bold;padding-top:10px;padding-bottom:10px;" class="text-right"><?php echo angka_ribuan_2($tonase_panen['mekanik'] / 1000); ?> Ton</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6 p-1">
                  <div class="card shadow" style="width:100%;">
                    <div class="card-body" style="padding:0;">
                      <canvas id="diagram_tonase_2" style="padding:5px;"></canvas>
<?php
  if ($tonase_panen['total'] != NULL) {
    $tonase_panen_alami = round(($tonase_panen['alami'] / $tonase_panen['total']) * 100);
    $tonase_panen_reguler = round(($tonase_panen['reguler'] / $tonase_panen['total']) * 100);
  }
  else{
    $tonase_panen_alami = round((0) * 100);
    $tonase_panen_reguler = round((0) * 100);
  }
  $panen_tonase_2 = $tonase_panen_alami.', '.$tonase_panen_reguler;
?>
<script>
  var config_tonase_2 = {
    type: 'doughnut',
    data: {
      datasets: [{
        data: [
          <?php echo $panen_tonase_2; ?>
        ],
        backgroundColor: [
          '#FF0000',
          '#32CD32'
        ],
        label: 'Cost and Production'
      }],
      labels: [
        'Alami',
        'Reguler'
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
        display: false,
        position: 'right',
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
                      <table class="table_pm">
                        <tr>
                          <td width="5px" style="background-color:#FF0000;padding-top:10px;padding-bottom:10px;">&nbsp;</td>
                          <td style="padding-top:10px;padding-bottom:10px;">Alami</td>
                          <td style="font-weight:bold;padding-top:10px;padding-bottom:10px;" class="text-right"><?php echo angka_ribuan_2($tonase_panen['alami'] / 1000); ?> Ton</td>
                        </tr>
                        <tr>
                          <td width="5px" style="background-color:#32CD32;padding-top:10px;padding-bottom:10px;">&nbsp;</td>
                          <td style="padding-top:10px;padding-bottom:10px;">Reguler</td>
                          <td style="font-weight:bold;padding-top:10px;padding-bottom:10px;" class="text-right"><?php echo angka_ribuan_2($tonase_panen['reguler'] / 1000); ?> Ton</td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-7">
              <div class="row mb-1">
                <div class="col-lg-4">
                  <div class="row mb-1">
                    <div class="col-lg-12 p-1">
                      <div class="card shadow" style="width:100%;">
                        <div class="card-header py-0 text-center" style="background-color:#008080;">
                          <span style="color:white;font-size:14px;"><b>Rencana Panen</b></span>
                        </div>
                        <div class="card-body text-center" style="padding:0;">
                          <h4 style="font-weight:bold;color:black;padding-top:15px;padding-bottom:15px;"><?php echo angka_ribuan($tonase); ?> Ton</h4>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row mb-1">
                    <div class="col-lg-12 p-1">
                      <div class="card shadow" style="width:100%;">
                        <div class="card-header py-0 text-center" style="background-color:#008080;">
                          <span style="color:white;font-size:14px;"><b>Produksi s.d Saat Ini</b></span>
                        </div>
                        <div class="card-body text-center" style="padding:0;">
                          <h4 style="font-weight:bold;color:black;padding-top:15px;padding-bottom:15px;"><?php echo angka_ribuan($tonase_panen_category['total'] / 1000); ?> Ton</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-8 p-1">
                  <div class="card shadow" style="width:100%;">
                    <div class="card-body" style="padding:5px;">
                      <canvas id="diagram_tonase_category"></canvas>
<?php
  if($tonase_panen_category['total'] != NULL){
    $rampet1 = round(($tonase_panen_category['mek_rampet'] / $tonase_panen_category['total']) * 100);
    $selektif1 = round(($tonase_panen_category['mek_selektif_pertama'] / $tonase_panen_category['total']) * 100);
    $selektif2 = round(($tonase_panen_category['mek_selektif_rampet'] / $tonase_panen_category['total']) * 100);
    $alami1 = round(($tonase_panen_category['mek_alami'] / $tonase_panen_category['total']) * 100);
    $rampet2 = round(($tonase_panen_category['man_rampet'] / $tonase_panen_category['total']) * 100);
    $selektif3 = round(($tonase_panen_category['man_selektif'] / $tonase_panen_category['total']) * 100);
    $kolekting = round(($tonase_panen_category['man_kolekting'] / $tonase_panen_category['total']) * 100);
    $alami2 = round(($tonase_panen_category['man_alami'] / $tonase_panen_category['total']) * 100);
    $bantuan = round(($tonase_panen_category['man_bantuan'] / $tonase_panen_category['total']) * 100);
  }
  else{
    $rampet1 = round((0) * 100);
    $selektif1 = round((0) * 100);
    $selektif2 = round((0) * 100);
    $alami1 = round((0) * 100);
    $rampet2 = round((0) * 100);
    $selektif3 = round((0) * 100);
    $kolekting = round((0) * 100);
    $alami2 = round((0) * 100);
    $bantuan = round((0) * 100);
  }
  $panen_tonase_category = $rampet1.', '.$selektif1.', '.$selektif2;
  $panen_tonase_category .= ', '.$alami1.', '.$rampet2.', '.$selektif3;
  $panen_tonase_category .= ', '.$kolekting.', '.$alami2.', '.$bantuan;
?>
<script>
  var config_tonase_category = {
    type: 'doughnut',
    data: {
      datasets: [{
        data: [
          <?php echo $panen_tonase_category; ?>
        ],
        backgroundColor: [
          '#4169E1',
          '#FF8C00',
          '#228B22',
          '#B22222',
          '#9ACD32',
          '#6B8E23',
          '#20B2AA',
          '#191970',
          '#BA55D3',
        ],
        label: 'Cost and Production'
      }],
      labels: [
        'Mek. Rampet',
        'Mek. Selektif Pertama',
        'Mek. Selektif Rampet',
        'Mek. Alami',
        'Man. Rampet',
        'Man. Selektif',
        'Man. Kolekting',
        'Man. Alami',
        'Man. Bantuan',
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
            </div>
          </div>

          <div class="row mb-1">
            <div class="col-lg-6 p-1">
              <div class="card shadow" style="width:100%;">
                <div class="card-body" style="padding:0;">
                  <table class="table_pm">
                    <tr style="background-color:#008080;font-weight:bold;">
                      <td style="color:white;">Type</td>
                      <td>
                        <select style="color:black;" class="form-control select" name="select_type" id="select_type" onchange="javascript:select_main_filter();">
<?php
  $option_type1 = "";
  $option_type2 = "";
  $option_type3 = "";
  switch ($type) {
    case 'Total':
      $option_type1 = "selected";
    break;
    case 'Manual':
      $option_type2 = "selected";
    break;
    case 'Mekanik':
      $option_type3 = "selected";
    break;
  }
?>
                          <option value="Total" style="color:black;" <?php echo $option_type1; ?>>Total</option>
                          <option value="Manual" style="color:black;" <?php echo $option_type2; ?>>Manual</option>
                          <option value="Mekanik" style="color:black;" <?php echo $option_type3; ?>>Mekanik</option>
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
                      <td style="color:white;">Category</td>
                      <td>
                        <select style="color:black;" class="form-control select" name="select_category" id="select_category" onchange="javascript:select_main_filter();">
<?php
  $option_category1 = "";
  $option_category2 = "";
  $option_category3 = "";
  switch ($category) {
    case 'Total':
      $option_category1 = "selected";
    break;
    case 'Alami':
      $option_category2 = "selected";
    break;
    case 'Reguler':
      $option_category3 = "selected";
    break;
  }
?>
                          <option value="Total" style="color:black;" <?php echo $option_category1; ?>>Total</option>
                          <option value="Alami" style="color:black;" <?php echo $option_category2; ?>>Alami</option>
                          <option value="Reguler" style="color:black;" <?php echo $option_category3; ?>>Reguler</option>
                        </select>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>

          <div class="row mb-2">
            <div class="col-lg-12 p-1">
              <div class="card shadow" style="width:100%;">
                <div class="card-body" style="padding:0;">
                  <table class="table_pm">
                    <tr class="text-center" style="background-color:#008080;font-weight:bold;">
                      <td colspan="6" style="color:white;font-size:14px;padding-top:5px;padding-bottom:5px;"><?php echo format_bln($tgl_panen); ?> - Harvesting <?php echo round((($tonase_panen_umur['total'] / 1000) / $tonase) * 100); ?>% Ton</td>
                    </tr>
                    <tr class="text-center" style="font-weight:bold;">
                      <td width="<?php echo 100/6; ?>%" style="color:black;padding-top:5px;padding-bottom:5px;"><?php echo format_bln(date("Y-m-d", strtotime($tgl_panen) - (86400 * 5 * 30.4583333333333))); ?></td>
                      <td width="<?php echo 100/6; ?>%" style="color:black;padding-top:5px;padding-bottom:5px;"><?php echo format_bln(date("Y-m-d", strtotime($tgl_panen) - (86400 * 4 * 30.4583333333333))); ?></td>
                      <td width="<?php echo 100/6; ?>%" style="color:black;padding-top:5px;padding-bottom:5px;"><?php echo format_bln(date("Y-m-d", strtotime($tgl_panen) - (86400 * 3 * 30.4583333333333))); ?></td>
                      <td width="<?php echo 100/6; ?>%" style="color:black;padding-top:5px;padding-bottom:5px;"><?php echo format_bln(date("Y-m-d", strtotime($tgl_panen) - (86400 * 2 * 30.4583333333333))); ?></td>
                      <td width="<?php echo 100/6; ?>%" style="color:black;padding-top:5px;padding-bottom:5px;"><?php echo format_bln(date("Y-m-d", strtotime($tgl_panen) - (86400 * 1 * 30.4583333333333))); ?></td>
                      <td width="<?php echo 100/6; ?>%" style="color:black;padding-top:5px;padding-bottom:5px;"><?php echo format_bln(date("Y-m-d", strtotime($tgl_panen) - (86400 * 0 * 30.4583333333333))); ?></td>
                    </tr>
                    <tr class="text-center" style="font-weight:bold;">
                      <td colspan="6"><hr /></td>
                    </tr>
                    <tr class="text-center" style="font-weight:bold;">
                      <td width="<?php echo 100/6; ?>%" style="color:black;padding-top:5px;padding-bottom:5px;"><?php echo angka_ribuan_2($tonase_panen_umur["P1"] / 1000); ?> Ton</td>
                      <td width="<?php echo 100/6; ?>%" style="color:black;padding-top:5px;padding-bottom:5px;"><?php echo angka_ribuan_2($tonase_panen_umur["P2"] / 1000); ?> Ton</td>
                      <td width="<?php echo 100/6; ?>%" style="color:black;padding-top:5px;padding-bottom:5px;"><?php echo angka_ribuan_2($tonase_panen_umur["P3"] / 1000); ?> Ton</td>
                      <td width="<?php echo 100/6; ?>%" style="color:black;padding-top:5px;padding-bottom:5px;"><?php echo angka_ribuan_2($tonase_panen_umur["P4"] / 1000); ?> Ton</td>
                      <td width="<?php echo 100/6; ?>%" style="color:black;padding-top:5px;padding-bottom:5px;"><?php echo angka_ribuan_2($tonase_panen_umur["P5"] / 1000); ?> Ton</td>
                      <td width="<?php echo 100/6; ?>%" style="color:black;padding-top:5px;padding-bottom:5px;"><?php echo angka_ribuan_2($tonase_panen_umur["P6"] / 1000); ?> Ton</td>
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
      select_main_filter();
    }
  }
  function select_main_filter(){
    var lokasi = $('#lokasi').val();
    var category = $('#select_category').val();
    var type = $('#select_type').val();

    window.location.href="/PIS/index.php/WIP_PM_Lokasi/lokasi?page=<?php echo $page; ?>&lokasi="+lokasi+"&category="+category+"&type="+type;
  }

  window.onload = function() {
    var ctx_tonase_category = document.getElementById('diagram_tonase_category').getContext('2d');
    window.myDoughnut = new Chart(ctx_tonase_category, config_tonase_category);
    var ctx_tonase_1 = document.getElementById('diagram_tonase_1').getContext('2d');
    window.myDoughnut = new Chart(ctx_tonase_1, config_tonase_1);
    var ctx_tonase_2 = document.getElementById('diagram_tonase_2').getContext('2d');
    window.myDoughnut = new Chart(ctx_tonase_2, config_tonase_2);
  };
</script>
