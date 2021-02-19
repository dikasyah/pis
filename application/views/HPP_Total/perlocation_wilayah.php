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
        <a class="nav-link p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?page=HM&wilayah=<?php echo $wilayah; ?>">
          <i class="fas fa-fw fa-globe"></i>
          <span class="text-white-600 small">Home</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Heading -->
      <div class="sidebar-heading text-center">
        Summary
      </div>

      <li class="nav-item">
        <a class="nav-link p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?page=S1&wilayah=<?php echo $wilayah; ?>">
          <i class="fas fa-fw fa-globe"></i>
          <span class="text-white-600 small">Summary 1</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <li class="nav-item active">
        <a class="nav-link p-1" href="#">
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
              <span class="d-none d-sm-inline-block" style="color:black;font-size:16px;"><b><?php echo $wilayah_desc['nama']; ?> - Perlocation</b></span>
              <span class="d-sm-none" style="color:black;font-size:12px;"><b><?php echo $wilayah; ?> - Perlocation</b></span>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="/PIS/index.php/HPP_Total_Dashboard/plantation_group?pg=<?php echo $wilayah_desc['plantation_group']; ?>" role="button" aria-expanded="false">
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
            <div class="col-lg-12" style="padding:0;">
              <div class="card shadow" style="width:100%;">
                <div class="card-header py-0 text-center" style="background-color:#75229F;">
                  <span style="color:white;"><b>Perlocation <?php echo $wilayah; ?></b></span>
                </div>
                <div class="card-body" style="color:black;padding:0;font-size:10px;">
                  <div class="table-responsive">
                    <table class="table table-striped" style="color:black;">
                      <thead>
                        <tr>
                          <td rowspan="2" align='center' style="vertical-align:middle;background-color:#66FF66;padding:5px;"><b>PG</b></td>
                          <td rowspan="2" align='center' style="vertical-align:middle;background-color:#66FF66;padding:5px;"><b>Wilayah</b></td>
                          <td rowspan="2" align='center' style="vertical-align:middle;background-color:#66FF66;padding:5px;"><b>Kebun</b></td>
                          <td rowspan="2" align='center' style="vertical-align:middle;background-color:#66FF66;padding:5px;"><b>Lokasi</b></td>
                          <td rowspan="2" align='center' style="vertical-align:middle;background-color:#66FF66;padding:5px;"><b>Umur</b></td>
                          <td colspan="3" align='center' style="vertical-align:middle;background-color:#66FF66;padding:5px;"><b>Bibit</b></td>
                          <td rowspan="2" align='center' style="vertical-align:middle;background-color:#66FF66;padding:5px;"><b>Status</b></td>
                          <td rowspan="2" align='center' style="vertical-align:middle;background-color:#66FF66;padding:5px;"><b>Luas</b></td>
                          <td rowspan="2" align='center' style="vertical-align:middle;background-color:#66FF66;padding:5px;"><b>Prediksi Tonase</b></td>
                          <td rowspan="2" align='center' style="vertical-align:middle;background-color:#66FF66;padding:5px;"><b>Yield (Ton/Ha)</b></td>
                          <td rowspan="2" align='center' style="vertical-align:middle;background-color:#66FF66;padding:10px;"><b>Tanggal Forcing</b></td>
                          <td rowspan="2" align='center' style="vertical-align:middle;background-color:#66FF66;padding:10px;"><b>Tanggal Panen</b></td>
                          <td colspan="6" align='center' style="vertical-align:middle;background-color:#00BFFF;padding:5px;"><b>Rp/Ha</b></td>
                          <td colspan="5" align='center' style="vertical-align:middle;background-color:#1E90FF;padding:5px;"><b>Rp/Kg</b></td>
                        </tr>
                        <tr>
                          <td align='center' style="vertical-align:middle;background-color:#66FF66;padding:5px;"><b>Jenis</b></td>
                          <td align='center' style="vertical-align:middle;background-color:#66FF66;padding:5px;"><b>Varian</b></td>
                          <td align='center' style="vertical-align:middle;background-color:#66FF66;padding:5px;"><b>Kelas</b></td>
                          <td align='center' style="vertical-align:middle;background-color:#00BFFF;padding:5px;"><b>Budget</b></td>
                          <td align='center' style="vertical-align:middle;background-color:#00BFFF;padding:5px;"><b>Realisasi</b></td>
                          <td align='center' style="vertical-align:middle;background-color:#00BFFF;padding:5px;"><b>Varian</b></td>
                          <td align='center' style="vertical-align:middle;background-color:#00BFFF;padding:5px;"><b>Deviasi</b></td>
                          <td align='center' style="vertical-align:middle;background-color:#00BFFF;padding:5px;"><b>Category</b></td>
                          <td align='center' style="vertical-align:middle;background-color:#1E90FF;padding:5px;"><b>Budget</b></td>
                          <td align='center' style="vertical-align:middle;background-color:#1E90FF;padding:5px;"><b>Realisasi</b></td>
                          <td align='center' style="vertical-align:middle;background-color:#1E90FF;padding:5px;"><b>Deviasi</b></td>
                          <td align='center' style="vertical-align:middle;background-color:#1E90FF;padding:5px;"><b>Category</b></td>
                        </tr>
                      </thead>
                      <tbody>
<?php
  foreach ($perlocation as $l) {
    if($l->varian <= 0){
      $color_varian = 'blue';
    }
    else{
      $color_varian = 'red';
    }
    switch ($l->performance_ha) {
      case 'Excellent':
        $color_rp_per_ha = '00FF00';
        break;
      case 'Good':
        $color_rp_per_ha = 'FFFF00';
        break;
      case 'Poor':
        $color_rp_per_ha = 'FF0000';
        break;
    }
    switch ($l->performance_kg) {
      case 'Excellent':
        $color_rp_per_kg = '00FF00';
        break;
      case 'Good':
        $color_rp_per_kg = 'FFFF00';
        break;
      case 'Poor':
        $color_rp_per_kg = 'FF0000';
        break;
    }
?>
                    <tr>
                      <td align='center' style="padding:0;"><?php echo $l->pg; ?></td>
                      <td align='center' style="padding:0;"><?php echo $l->wilayah; ?></td>
                      <td align='center' style="padding:0;"><?php echo $l->kebun; ?></td>
                      <td align='center' style="padding:0;"><a href='/PIS/index.php/HPP_Total_Lokasi/lokasi?lokasi=<?php echo $l->lokasi; ?>&tgl_panen=<?php echo $l->tgl_panen; ?>'><?php echo $l->lokasi; ?></a></td>
                      <td align='center' style="padding:0;"><?php echo $l->umur; ?></td>
                      <td align='center' style="padding:0;"><?php echo $l->jenis; ?></td>
                      <td align='center' style="padding:0;"><?php echo $l->varietas; ?></td>
                      <td align='center' style="padding:0;"><?php echo $l->kelas; ?></td>
                      <td align='center' style="padding:0;"><?php echo $l->status; ?></td>
                      <td align='center' style="padding:0;"><?php echo $l->luas; ?></td>
                      <td align='center' style="padding:0;"><?php echo angka_ribuan($l->tonase); ?></td>
                      <td align='center' style="padding:0;"><?php echo angka_ribuan_2($l->tonase / $l->luas); ?></td>
                      <td align='right' style="padding:0;"><?php echo format_tgl($l->tgl_forcing); ?></td>
                      <td align='right' style="padding:0;"><?php echo format_tgl($l->tgl_panen); ?></td>
                      <td align='right' style="padding:0;"><?php echo angka_ribuan($l->budget_ha); ?></td>
                      <td align='right' style="padding:0;"><?php echo angka_ribuan($l->real_ha); ?></td>
                      <td align='right' style="padding:0;color:<?php echo $color_varian; ?>;"><?php echo angka_ribuan($l->varian); ?></td>
                      <td align='right' style="padding:0;"><?php echo round($l->deviasi_ha * 100).'%'; ?></td>
                      <td align='center' style="padding:0;color:black;background-color:#<?php echo $color_rp_per_ha; ?>;"><b><?php echo $l->performance_ha; ?></b></td>
                      <td align='right' style="padding:0;"><?php echo angka_ribuan($l->budget_kg); ?></td>
                      <td align='right' style="padding:0;"><?php echo angka_ribuan($l->real_kg); ?></td>
                      <td align='right' style="padding:0;"><?php echo round($l->deviasi_kg * 100).'%'; ?></td>
                      <td align='center' style="padding:0;color:black;background-color:#<?php echo $color_rp_per_kg; ?>;"><b><?php echo $l->performance_kg; ?></b></td>
                    </tr>
<?php
  }
?>
                      </tbody>
                    </table>
                  </div>
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
