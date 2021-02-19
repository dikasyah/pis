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
        <a class="nav-link p-1" href="/PIS/index.php/HPP_Total_Lokasi/lokasi?page=HOME&lokasi=<?php echo $produksi['lokasi']; ?>">
          <i class="fas fa-fw fa-globe"></i>
          <span class="text-white-600 small">Dashboard</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link p-1" href="#">
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
                Gallery Lokasi
              </b></span>
              <span class="d-sm-none" style="color:black;font-size:12px;"><b>
                <a href="/PIS/index.php/HPP_Total_Dashboard/plantation_group?pg=<?php echo $produksi['pg']; ?>"><?php echo $produksi['pg']; ?></a> -
                <a href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=<?php echo $produksi['wilayah']; ?>"><?php echo $produksi['wilayah']; ?></a> -
                <?php echo $produksi['lokasi']; ?> -
                Gallery Lokasi
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
    if(substr($produksi['status'], 0, 4) == "NSBB" || substr($produksi['status'], 0, 4) == "NSBK"){
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
    if(substr($produksi['status'], 0, 4) == "NSBB" || substr($produksi['status'], 0, 4) == "NSBK"){
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
  if(substr($produksi['status'], 0, 4) == "NSBB" || substr($produksi['status'], 0, 4) == "NSBK"){
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
  if(substr($produksi['status'], 0, 4) == "NSBB" || substr($produksi['status'], 0, 4) == "NSBK"){
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
  if(substr($produksi['status'], 0, 4) == "NSBB" || substr($produksi['status'], 0, 4) == "NSBK"){
    echo "-";
  }
  else{
    $date1 = round(strtotime($konstanta['nilai'])/86400);
    $date2 = round(strtotime($produksi['tgl_awal_perawatan'])/86400);

    $umur = ($date1-$date2)/30.4583333333333;

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

          <div class="row mb-2">
            <div class="col-md-12 p-1">
              <div class="card shadow" style="width:100%;">
                <div class="card-header py-0 text-center" style="background-color:#75229F;">
                  <span style="color:white;"><b>Lokasi Gallery</b></span>
                </div>
                <div class="card-body" style="padding:0;">
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="d-sm-flex align-items-center justify-content-between" style="padding:10px;">
                        <span style="color:black;"><b>Peta Lokasi</b></span>
<?php
  if($_SESSION['crud'] == '0' || ($_SESSION['crud'] == '3' && $_SESSION['edit'][0] == $wilayah['code'])){
    if(sizeof($gallery['peta']) >= 0){
      $disable = '';
    }
    else{
      $disable = 'disabled';
    }
?>
                        <button onclick="show_modal_peta()" <?php echo $disable; ?>  class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa fa-cloud-upload fa-sm text-white-50"></i> Upload</button>
<?php
  }
?>
                      </div>
                      <div class="row mb-1">
<?php
  foreach ($gallery['peta'] as $glp) {
?>
                        <div class="col-lg-3 text-center">
                          <div class="container">
                            <img class="p-1 images" href="<?php echo $glp->foto; ?>" src="<?php echo $glp->foto; ?>" alt="<?php echo $glp->foto; ?>" style="max-width:100%;max-height:300px;"/>
                            <div class="overlay">
                              <a class="icon" title="#">
                                <i onclick="show_modal_show_foto('<?php echo $glp->foto; ?>')" class="fa fa-search-plus"></i>
<?php
  if($_SESSION['crud'] == '0' || ($_SESSION['crud'] == '3' && $_SESSION['edit'][0] == $wilayah['code'])){
?>
                                <i onclick="show_modal_peta_delete('<?php echo $glp->id; ?>', '<?php echo $glp->foto; ?>', '<?php echo $glp->caption; ?>')" class="fa fa-times"></i>
<?php
  }
?>
                              </a>
                            </div>
                            <div class="meta">
                              <strong><?php echo format_tgl($glp->tgl_upload); ?></strong><br />
                              <strong><?php echo $glp->caption; ?></strong><br />
                            </div>
                          </div>
                        </div>
<?php
  }
?>
                      </div>
                    </div>
                  </div>

                  <hr class="m-1" />

                  <div class="row">
                    <div class="col-lg-12">
                      <div class="d-sm-flex align-items-center justify-content-between" style="padding:10px;">
                        <span style="color:black;"><b>Land Preparation</b></span>
<?php
  if($_SESSION['crud'] == '0' || ($_SESSION['crud'] == '3' && $_SESSION['edit'][0] == $wilayah['code'])){
    if(sizeof($gallery['land_prep']) >= 0){
      $disable = '';
    }
    else{
      $disable = 'disabled';
    }
?>
                        <button onclick="show_modal_gallery('Land Preparation')" <?php echo $disable; ?>  class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa fa-cloud-upload fa-sm text-white-50"></i> Upload</button>
<?php
  }
?>
                      </div>
                      <div class="row mb-1">
<?php
  foreach ($gallery['land_prep'] as $glp) {
?>
                        <div class="col-lg-3 text-center">
                          <div class="container">
                            <img class="p-1 images" href="<?php echo $glp->foto; ?>" src="<?php echo $glp->foto; ?>" alt="<?php echo $glp->foto; ?>" style="max-width:100%;max-height:300px;"/>
                            <div class="overlay">
                              <a class="icon" title="#">
                                <i onclick="show_modal_show_foto('<?php echo $glp->foto; ?>')" class="fa fa-search-plus"></i>
<?php
  if($_SESSION['crud'] == '0' || ($_SESSION['crud'] == '3' && $_SESSION['edit'][0] == $wilayah['code'])){
?>
                                <i onclick="show_modal_gallery_delete('<?php echo $glp->id; ?>', '<?php echo $glp->foto; ?>', '<?php echo $glp->caption; ?>', '<?php echo $glp->deskripsi; ?>')" class="fa fa-times"></i>
<?php
  }
?>
                              </a>
                            </div>
                            <div class="meta">
                              <strong><?php echo format_tgl($glp->tgl_upload); ?></strong><br />
                              <strong><?php echo $glp->caption; ?></strong><br />
                              <span><?php echo $glp->deskripsi; ?></span>
                            </div>
                          </div>
                        </div>
<?php
  }
?>
                      </div>
                    </div>
                  </div>

                  <hr class="m-1" />

                  <div class="row">
                    <div class="col-lg-12">
                      <div class="d-sm-flex align-items-center justify-content-between" style="padding:10px;">
                        <span style="color:black;"><b>Planting</b></span>
<?php
  if($_SESSION['crud'] == '0' || ($_SESSION['crud'] == '3' && $_SESSION['edit'][0] == $wilayah['code'])){
    if(sizeof($gallery['planting']) >= 0){
      $disable = '';
    }
    else{
      $disable = 'disabled';
    }
?>
                        <button onclick="show_modal_gallery('Planting')" <?php echo $disable; ?>  class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa fa-cloud-upload fa-sm text-white-50"></i> Upload</button>
<?php
  }
?>
                      </div>
                      <div class="row mb-1">
<?php
  foreach ($gallery['planting'] as $glp) {
?>
                        <div class="col-lg-3 text-center">
                          <div class="container">
                            <img class="p-1 images" href="<?php echo $glp->foto; ?>" src="<?php echo $glp->foto; ?>" alt="<?php echo $glp->foto; ?>" style="max-width:100%;max-height:300px;"/>
                            <div class="overlay">
                              <a class="icon" title="#">
                                <i onclick="show_modal_show_foto('<?php echo $glp->foto; ?>')" class="fa fa-search-plus"></i>
<?php
  if($_SESSION['crud'] == '0' || ($_SESSION['crud'] == '3' && $_SESSION['edit'][0] == $wilayah['code'])){
?>
                                <i onclick="show_modal_gallery_delete('<?php echo $glp->id; ?>', '<?php echo $glp->foto; ?>', '<?php echo $glp->caption; ?>', '<?php echo $glp->deskripsi; ?>')" class="fa fa-times"></i>
<?php
  }
?>
                              </a>
                            </div>
                            <div class="meta">
                              <strong><?php echo format_tgl($glp->tgl_upload); ?></strong><br />
                              <strong><?php echo $glp->caption; ?></strong><br />
                              <span><?php echo $glp->deskripsi; ?></span>
                            </div>
                          </div>
                        </div>
<?php
  }
?>
                      </div>
                    </div>
                  </div>

                  <hr class="m-1" />

                  <div class="row">
                    <div class="col-lg-12">
                      <div class="d-sm-flex align-items-center justify-content-between" style="padding:10px;">
                        <span style="color:black;"><b>Pre Forcing</b></span>
<?php
  if($_SESSION['crud'] == '0' || ($_SESSION['crud'] == '3' && $_SESSION['edit'][0] == $wilayah['code'])){
    if(sizeof($gallery['pre_f']) >= 0){
      $disable = '';
    }
    else{
      $disable = 'disabled';
    }
?>
                        <button onclick="show_modal_gallery('Pre Forcing')" <?php echo $disable; ?>  class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa fa-cloud-upload fa-sm text-white-50"></i> Upload</button>
<?php
  }
?>
                      </div>
                      <div class="row mb-1">
<?php
  foreach ($gallery['pre_f'] as $glp) {
?>
                        <div class="col-lg-3 text-center">
                          <div class="container">
                            <img class="p-1 images" href="<?php echo $glp->foto; ?>" src="<?php echo $glp->foto; ?>" alt="<?php echo $glp->foto; ?>" style="max-width:100%;max-height:300px;"/>
                            <div class="overlay">
                              <a class="icon" title="#">
                                <i onclick="show_modal_show_foto('<?php echo $glp->foto; ?>')" class="fa fa-search-plus"></i>
<?php
  if($_SESSION['crud'] == '0' || ($_SESSION['crud'] == '3' && $_SESSION['edit'][0] == $wilayah['code'])){
?>
                                <i onclick="show_modal_gallery_delete('<?php echo $glp->id; ?>', '<?php echo $glp->foto; ?>', '<?php echo $glp->caption; ?>', '<?php echo $glp->deskripsi; ?>')" class="fa fa-times"></i>
<?php
  }
?>
                              </a>
                            </div>
                            <div class="meta">
                              <strong><?php echo format_tgl($glp->tgl_upload); ?></strong><br />
                              <strong><?php echo $glp->caption; ?></strong><br />
                              <span><?php echo $glp->deskripsi; ?></span>
                            </div>
                          </div>
                        </div>
<?php
  }
?>
                      </div>
                    </div>
                  </div>

                  <hr class="m-1" />

                  <div class="row">
                    <div class="col-lg-12">
                      <div class="d-sm-flex align-items-center justify-content-between" style="padding:10px;">
                        <span style="color:black;"><b>Post Forcing</b></span>
<?php
  if($_SESSION['crud'] == '0' || ($_SESSION['crud'] == '3' && $_SESSION['edit'][0] == $wilayah['code'])){
    if(sizeof($gallery['post_f']) >= 0){
      $disable = '';
    }
    else{
      $disable = 'disabled';
    }
?>
                        <button onclick="show_modal_gallery('Post Forcing')" <?php echo $disable; ?>  class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa fa-cloud-upload fa-sm text-white-50"></i> Upload</button>
<?php
  }
?>
                      </div>
                      <div class="row mb-1">
<?php
  foreach ($gallery['post_f'] as $glp) {
?>
                        <div class="col-lg-3 text-center">
                          <div class="container">
                            <img class="p-1 images" href="<?php echo $glp->foto; ?>" src="<?php echo $glp->foto; ?>" alt="<?php echo $glp->foto; ?>" style="max-width:100%;max-height:300px;"/>
                            <div class="overlay">
                              <a class="icon" title="#">
                                <i onclick="show_modal_show_foto('<?php echo $glp->foto; ?>')" class="fa fa-search-plus"></i>
<?php
  if($_SESSION['crud'] == '0' || ($_SESSION['crud'] == '3' && $_SESSION['edit'][0] == $wilayah['code'])){
?>
                                <i onclick="show_modal_gallery_delete('<?php echo $glp->id; ?>', '<?php echo $glp->foto; ?>', '<?php echo $glp->caption; ?>', '<?php echo $glp->deskripsi; ?>')" class="fa fa-times"></i>
<?php
  }
?>
                              </a>
                            </div>
                            <div class="meta">
                              <strong><?php echo format_tgl($glp->tgl_upload); ?></strong><br />
                              <strong><?php echo $glp->caption; ?></strong><br />
                              <span><?php echo $glp->deskripsi; ?></span>
                            </div>
                          </div>
                        </div>
<?php
  }
?>
                      </div>
                    </div>
                  </div>

                  <hr class="m-1" />

                  <div class="row">
                    <div class="col-lg-12">
                      <div class="d-sm-flex align-items-center justify-content-between" style="padding:10px;">
                        <span style="color:black;"><b>Harvesting</b></span>
<?php
  if($_SESSION['crud'] == '0' || ($_SESSION['crud'] == '3' && $_SESSION['edit'][0] == $wilayah['code'])){
    if(sizeof($gallery['harvest']) >= 0){
      $disable = '';
    }
    else{
      $disable = 'disabled';
    }
?>
                        <button onclick="show_modal_gallery('Harvesting')" <?php echo $disable; ?>  class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa fa-cloud-upload fa-sm text-white-50"></i> Upload</button>
<?php
  }
?>
                      </div>
                      <div class="row mb-1">
<?php
  foreach ($gallery['harvest'] as $glp) {
?>
                        <div class="col-lg-3 text-center">
                          <div class="container">
                            <img class="p-1 images" href="<?php echo $glp->foto; ?>" src="<?php echo $glp->foto; ?>" alt="<?php echo $glp->foto; ?>" style="max-width:100%;max-height:300px;"/>
                            <div class="overlay">
                              <a class="icon" title="#">
                                <i onclick="show_modal_show_foto('<?php echo $glp->foto; ?>')" class="fa fa-search-plus"></i>
<?php
  if($_SESSION['crud'] == '0' || ($_SESSION['crud'] == '3' && $_SESSION['edit'][0] == $wilayah['code'])){
?>
                                <i onclick="show_modal_gallery_delete('<?php echo $glp->id; ?>', '<?php echo $glp->foto; ?>', '<?php echo $glp->caption; ?>', '<?php echo $glp->deskripsi; ?>')" class="fa fa-times"></i>
<?php
  }
?>
                              </a>
                            </div>
                            <div class="meta">
                              <strong><?php echo format_tgl($glp->tgl_upload); ?></strong><br />
                              <strong><?php echo $glp->caption; ?></strong><br />
                              <span><?php echo $glp->deskripsi; ?></span>
                            </div>
                          </div>
                        </div>
<?php
  }
?>
                      </div>
                    </div>
                  </div>

                  <hr class="m-1" />

                  <div class="row">
                    <div class="col-lg-12">
                      <div class="d-sm-flex align-items-center justify-content-between" style="padding:10px;">
                        <span style="color:black;"><b>Note</b></span>
<?php
  if($_SESSION['crud'] == '0' || ($_SESSION['crud'] == '3' && $_SESSION['edit'][0] == $wilayah['code'])){
    if(sizeof($gallery['harvest']) >= 0){
      $disable = '';
    }
    else{
      $disable = 'disabled';
    }
?>
                        <!-- <button onclick="show_modal_gallery('Harvesting')" <?php echo $disable; ?>  class="d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa fa-cloud-upload fa-sm text-white-50"></i> Upload</button> -->
<?php
  }
?>
                      </div>
                      <div class="row mb-1">
<?php
  foreach ($gallery['harvest'] as $glp) {
?>
                        <div class="col-lg-3 text-center">
                          <div class="container">
                            <img class="p-1 images" href="<?php echo $glp->foto; ?>" src="<?php echo $glp->foto; ?>" alt="<?php echo $glp->foto; ?>" style="max-width:100%;max-height:300px;"/>
                            <div class="overlay">
                              <a class="icon" title="#">
                                <i onclick="show_modal_show_foto('<?php echo $glp->foto; ?>')" class="fa fa-search-plus"></i>
<?php
  if($_SESSION['crud'] == '0' || ($_SESSION['crud'] == '3' && $_SESSION['edit'][0] == $wilayah['code'])){
?>
                                <!-- <i onclick="show_modal_gallery_delete('<?php echo $glp->id; ?>', '<?php echo $glp->foto; ?>', '<?php echo $glp->header; ?>', '<?php echo $glp->quest; ?>')" class="fa fa-times"></i> -->
<?php
  }
?>
                              </a>
                            </div>
                            <div class="meta">
                              <strong><?php echo format_tgl($glp->tgl_upload); ?></strong><br />
                              <strong><?php echo $glp->header; ?></strong><br />
                              <span><?php echo $glp->quest; ?></span>
                            </div>
                          </div>
                        </div>
<?php
  }
?>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
<script>

</script>
      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->

  <div id="modal_gallery" class="modal">
    <span class="close" onclick="close_modal_gallery()">&times;</span>
    <!-- Modal content -->
    <div class="modal-content">
      <div class="row" align='center'>
        <h3><?php echo $note_lokasi['pg']; ?> - <?php echo $note_lokasi['wilayah']; ?> - <?php echo $note_lokasi['lokasi']; ?></h3>
      </div>
      <div class="row">
        <div class="col-md-6">
          <form action="/PIS/index.php/Upload/insert_gallery" method="post" enctype="multipart/form-data" >
            <input type="hidden" name="lokasi" value="<?php echo $note_lokasi['lokasi']; ?>">
            <input type="hidden" name="url" value="/HPP_Total_Lokasi/lokasi?page=<?php echo $page; ?>&lokasi=<?php echo $produksi['lokasi']; ?>">
            <table width='100%'>
              <tr>
                <td style="padding-top:5px;padding-bottom:2px;width:50px;">
                  Caption
                </td>
                <td style="padding-top:5px;padding-bottom:2px;width:10px;">
                  :
                </td>
                <td style="padding-top:5px;padding-bottom:2px;">
                  <input type="text" class="form-control" name='caption' placeholder="Caption" required>
                </td>
              </tr>
              <tr>
                <td style="padding-top:5px;padding-bottom:2px;width:50px;">
                  Jenis
                </td>
                <td style="padding-top:5px;padding-bottom:2px;width:10px;">
                  :
                </td>
                <td style="padding-top:5px;padding-bottom:2px;">
                  <div id='jenis_d'></div>
                  <input type="hidden" name="jenis" id="jenis">
                </td>
              </tr>
              <tr>
                <td style="padding-top:2px;padding-bottom:2px;width:50px;">
                  Foto
                </td>
                <td style="padding-top:2px;padding-bottom:2px;width:10px;">
                  :
                </td>
                <td style="padding-top:2px;padding-bottom:2px;">
                  <input type="file" class="btn btn-default" name="foto" style="width:100%;">
                </td>
              </tr>
              <tr>
                <td style="padding-top:2px;padding-bottom:5px;width:50px;">
                  Note
                </td>
                <td style="padding-top:2px;padding-bottom:5px;width:10px;">
                  :
                </td>
                <td style="padding-top:2px;padding-bottom:5px;">
                  <textarea name="deskripsi" rows="5" style="width:100%;" placeholder="Text here.." required></textarea>
                </td>
              </tr>
              <tr>
                <td colspan="3" align='center' style="padding-top:5px;padding-bottom:5px;width:50px;">
                  <button type="submit" class="btn btn-success">Simpan</button>
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>

  </div>

  <div id="modal_gallery_delete" class="modal">
    <span class="close" onclick="close_modal_gallery_delete()">&times;</span>
    <!-- Modal content -->
    <div class="modal-content">
      <div class="row" align='center'>
        <h3 id='lokasi_delete'></h3>
      </div>
      <div class="row">
        <div class="col-md-6">
          <form action="/PIS/index.php/Upload/delete_gallery" method="post">
            <input type="hidden" name="lokasi" value="<?php echo $note_lokasi['lokasi']; ?>">
            <input type="hidden" name='id' id='id_gallery_delete'>
            <input type="hidden" name='foto' id='foto_gallery_delete'>
            <input type="hidden" name="url" value="/HPP_Total_Lokasi/lokasi?page=<?php echo $page; ?>&lokasi=<?php echo $produksi['lokasi']; ?>">
            <table width='100%'>
              <tr>
                <td style="padding-top:5px;padding-bottom:2px;width:50px;">
                  Caption
                </td>
                <td style="padding-top:5px;padding-bottom:2px;width:10px;">
                  :
                </td>
                <td style="padding-top:5px;padding-bottom:2px;">
                  <div id='caption_delete'></div>
                </td>
              </tr>
              <tr>
                <td style="padding-top:2px;padding-bottom:2px;width:50px;">
                  Deskripsi
                </td>
                <td style="padding-top:2px;padding-bottom:2px;width:10px;">
                  :
                </td>
                <td style="padding-top:2px;padding-bottom:2px;">
                  <div id='deskripsi_delete'></div>
                </td>
              </tr>
              <tr>
                <td colspan="3" align='center' style="padding-top:2px;padding-bottom:2px;width:50px;">
                  Anda yakin ingin menghapus?
                </td>
              </tr>
              <tr>
                <td colspan="3" align='center' style="padding-top:5px;padding-bottom:5px;width:50px;">
                  <button type="submit" class="btn btn-danger">Hapus</button>
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div id="modal_peta" class="modal">
    <span class="close" onclick="close_modal_peta()">&times;</span>
    <!-- Modal content -->
    <div class="modal-content">
      <div class="row" align='center'>
        <h3><?php echo $note_lokasi['pg']; ?> - <?php echo $note_lokasi['wilayah']; ?> - <?php echo $note_lokasi['lokasi']; ?></h3>
      </div>
      <div class="row">
        <div class="col-md-6">
          <form action="/PIS/index.php/Upload/insert_peta" method="post" enctype="multipart/form-data" >
            <input type="hidden" name="lokasi" value="<?php echo $note_lokasi['lokasi']; ?>">
            <input type="hidden" name="url" value="/HPP_Total_Lokasi/lokasi?page=<?php echo $page; ?>&lokasi=<?php echo $produksi['lokasi']; ?>">
            <table width='100%'>
              <tr>
                <td style="padding-top:5px;padding-bottom:2px;width:50px;">
                  Caption
                </td>
                <td style="padding-top:5px;padding-bottom:2px;width:10px;">
                  :
                </td>
                <td style="padding-top:5px;padding-bottom:2px;">
                  <input type="text" class="form-control" name='caption' placeholder="Caption" required>
                </td>
              </tr>
              <tr>
                <td style="padding-top:2px;padding-bottom:2px;width:50px;">
                  Foto
                </td>
                <td style="padding-top:2px;padding-bottom:2px;width:10px;">
                  :
                </td>
                <td style="padding-top:2px;padding-bottom:2px;">
                  <input type="file" class="btn btn-default" name="foto" style="width:100%;">
                </td>
              </tr>
              <tr>
                <td colspan="3" align='center' style="padding-top:5px;padding-bottom:5px;width:50px;">
                  <button type="submit" class="btn btn-success">Simpan</button>
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>

  </div>

  <div id="modal_peta_delete" class="modal">
    <span class="close" onclick="close_modal_peta_delete()">&times;</span>
    <!-- Modal content -->
    <div class="modal-content">
      <div class="row" align='center'>
        <h3 id='lokasi_delete'></h3>
      </div>
      <div class="row">
        <div class="col-md-6">
          <form action="/PIS/index.php/Upload/delete_peta" method="post">
            <input type="hidden" name="lokasi" value="<?php echo $note_lokasi['lokasi']; ?>">
            <input type="hidden" name='id' id='id_peta_delete'>
            <input type="hidden" name='foto' id='foto_peta_delete'>
            <input type="hidden" name="url" value="/HPP_Total_Lokasi/lokasi?page=<?php echo $page; ?>&lokasi=<?php echo $produksi['lokasi']; ?>">
            <table width='100%'>
              <tr>
                <td style="padding-top:5px;padding-bottom:2px;width:50px;">
                  Caption
                </td>
                <td style="padding-top:5px;padding-bottom:2px;width:10px;">
                  :
                </td>
                <td style="padding-top:5px;padding-bottom:2px;">
                  <div id='peta_caption_delete'></div>
                </td>
              </tr>
              <tr>
                <td colspan="3" align='center' style="padding-top:2px;padding-bottom:2px;width:50px;">
                  Anda yakin ingin menghapus?
                </td>
              </tr>
              <tr>
                <td colspan="3" align='center' style="padding-top:5px;padding-bottom:5px;width:50px;">
                  <button type="submit" class="btn btn-danger">Hapus</button>
                </td>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div id="modal_show_foto" class="modal">
    <span class="close" onclick="close_modal_show_foto()">&times;</span>
    <!-- Modal content -->
      <div class="col-md-12" align="center">
        <img id='show_foto' style="max-width:80%;max-height:650px;">
      </div>
  </div>

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
      window.location.href="/PIS/index.php/HPP_Total_Lokasi/lokasi?page=GALO&lokasi="+$('#lokasi').val();
    }
  }

  //Lokasi Gallery
  function show_modal_gallery(jenis){
    document.getElementById("jenis").value = jenis;
    document.getElementById("jenis_d").innerHTML = jenis;
    modal_gallery.style.display = "block";
  }
  function close_modal_gallery(){
    modal_gallery.style.display = "none";
  }

  function show_modal_gallery_delete(id, foto, caption, deskripsi){
    document.getElementById("id_gallery_delete").value = id;
    document.getElementById("foto_gallery_delete").value = foto;
    document.getElementById("caption_delete").innerHTML = caption;
    document.getElementById("deskripsi_delete").innerHTML = deskripsi;
    modal_gallery_delete.style.display = "block";
  }
  function close_modal_gallery_delete(){
    modal_gallery_delete.style.display = "none";
  }

  function show_modal_peta(){
    modal_peta.style.display = "block";
  }
  function close_modal_peta(){
    modal_peta.style.display = "none";
  }

  function show_modal_peta_delete(id, foto, caption){
    document.getElementById("id_peta_delete").value = id;
    document.getElementById("foto_peta_delete").value = foto;
    document.getElementById("peta_caption_delete").innerHTML = caption;
    modal_peta_delete.style.display = "block";
  }
  function close_modal_peta_delete(){
    modal_peta_delete.style.display = "none";
  }

  function show_modal_show_foto(id){
    modal_show_foto.style.display = "block";
    var img = document.getElementById("show_foto");
    img.src = id;
  }
  function close_modal_show_foto(){
    modal_show_foto.style.display = "none";
  }
</script>
