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
      <li class="nav-item">
        <a class="nav-link p-1" href="/PIS/index.php/HPP_Total_Lokasi/lokasi?page=GALO&lokasi=<?php echo $produksi['lokasi']; ?>">
          <i class="fas fa-fw fa-globe"></i>
          <span class="text-white-600 small">Gallery</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link p-1" href="#">
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
    $date1 = round(strtotime($produksi['real_dan_sisa_rencana_tgl_selesai_panen'])/86400);
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

          <div class="row mb-1">
            <div class="col-lg-12 p-1">
              <div class="card shadow" style="width:100%;">
                <div class="card-body" style="padding:0;">
                  <button class="btn btn-default btn-block" style="background-color:#32CD32;color:white;font-weight:bold;" onclick="export_spk();">Export</button>
                </div>
              </div>
            </div>
          </div>

          <div class="row mb-1">
            <div class="col-lg-12 p-1">
              <div class="card shadow" style="width:100%;">
                <div class="card-header py-0 text-center" style="background-color:#008080;">
                  <span style="color:white;font-size:14px;"><b>Detail SPK</b></span>
                </div>
                <div class="card-body" style="padding:0;overflow-x:auto;">
                  <table class="table_hpp">
                    <thead>
                      <tr class="text-center" style="font-weight:bold;font-size:12px;">
                        <td style="background-color:#4682B4;color:white;" colspan="2">Umur</td>
                        <td style="background-color:#20B2AA;color:white;width:80px;" rowspan="2" class="absorbing-column">Tanggal</td>
                        <td style="background-color:#20B2AA;color:white;" rowspan="2">Code Activity</td>
                        <td style="background-color:#20B2AA;color:white;" rowspan="2">Desc Activity</td>
                        <td style="background-color:#3CB371;color:white;" rowspan="2">Hasil</td>
                        <td style="background-color:#3CB371;color:white;" rowspan="2">HKO</td>
                        <td style="background-color:#3CB371;color:white;" colspan="4">Cost</td>
                        <td style="background-color:#9370DB;color:white;" colspan="2">Unit</td>
                        <td style="background-color:#808080;color:white;" colspan="22">Fertilizer</td>
                        <td style="background-color:#C71585;color:white;" colspan="6">Herbicide</td>
                        <td style="background-color:#A0522D;color:white;" colspan="11">Insecticide</td>
                        <td style="background-color:#CD5C5C;color:white;" colspan="8">Fungicide</td>
                        <td style="background-color:#414BCE;color:white;" colspan="9">Others</td>
                        <td style="background-color:#FF0000;color:white;" colspan="2">Group Cost</td>
                      </tr>
                      <tr class="text-center" style="font-weight:bold;font-size:12px;white-space:nowrap;">
                        <td style="background-color:#4682B4;color:white;">Hari</td>
                        <td style="background-color:#4682B4;color:white;">Bulan</td>
                        <td style="background-color:#3CB371;color:white;">Labour</td>
                        <td style="background-color:#3CB371;color:white;">Charge</td>
                        <td style="background-color:#3CB371;color:white;">Material</td>
                        <td style="background-color:#3CB371;color:white;">Total</td>
                        <td style="background-color:#9370DB;color:white;">Penarik</td>
                        <td style="background-color:#9370DB;color:white;">Implement</td>

                        <td style="background-color:#808080;color:white;">Urea</td>
                        <td style="background-color:#808080;color:white;">Za</td>
                        <td style="background-color:#808080;color:white;">K2SO4</td>
                        <td style="background-color:#808080;color:white;">KCL</td>
                        <td style="background-color:#808080;color:white;">TSP</td>
                        <td style="background-color:#808080;color:white;">DAP</td>
                        <td style="background-color:#808080;color:white;">MgSO4</td>
                        <td style="background-color:#808080;color:white;">Kieserite</td>
                        <td style="background-color:#808080;color:white;">FeSO4</td>
                        <td style="background-color:#808080;color:white;">ZnSO4</td>

                        <td style="background-color:#808080;color:white;">Dolomite</td>
                        <td style="background-color:#808080;color:white;">Gypsum</td>
                        <td style="background-color:#808080;color:white;">CuSO4</td>
                        <td style="background-color:#808080;color:white;">Borax</td>
                        <td style="background-color:#808080;color:white;">LOB</td>
                        <td style="background-color:#808080;color:white;">CaCl2</td>
                        <td style="background-color:#808080;color:white;">Calcibor</td>
                        <td style="background-color:#808080;color:white;">Kompos</td>
                        <td style="background-color:#808080;color:white;">Belerang</td>
                        <td style="background-color:#808080;color:white;">Kieserite G</td>

                        <td style="background-color:#808080;color:white;">NPK</td>
                        <td style="background-color:#808080;color:white;">Petro Cas</td>

                        <td style="background-color:#C71585;color:white;">Bromacyl</td>
                        <td style="background-color:#C71585;color:white;">Diuron</td>
                        <td style="background-color:#C71585;color:white;">Glyphosate</td>
                        <td style="background-color:#C71585;color:white;">Quizalofop</td>
                        <td style="background-color:#C71585;color:white;">Ametrine</td>
                        <td style="background-color:#C71585;color:white;">Bazza</td>

                        <td style="background-color:#A0522D;color:white;">Tekasi</td>
                        <td style="background-color:#A0522D;color:white;">Tekila</td>
                        <td style="background-color:#A0522D;color:white;">Chlorpyrifos</td>
                        <td style="background-color:#A0522D;color:white;">Sidazinon</td>
                        <td style="background-color:#A0522D;color:white;">Propoxur</td>
                        <td style="background-color:#A0522D;color:white;">Cypermethrin</td>
                        <td style="background-color:#A0522D;color:white;">Bifentrin EC</td>
                        <td style="background-color:#A0522D;color:white;">Bifentrin G</td>
                        <td style="background-color:#A0522D;color:white;">BPMC</td>
                        <td style="background-color:#A0522D;color:white;">Clorpyrifos</td>

                        <td style="background-color:#A0522D;color:white;">Abamectin</td>

                        <td style="background-color:#CD5C5C;color:white;">Fosetil</td>
                        <td style="background-color:#CD5C5C;color:white;">Metalaxil</td>
                        <td style="background-color:#CD5C5C;color:white;">Propiconazole</td>
                        <td style="background-color:#CD5C5C;color:white;">Prochloraz</td>
                        <td style="background-color:#CD5C5C;color:white;">Mankozeb</td>
                        <td style="background-color:#CD5C5C;color:white;">Folirfos</td>
                        <td style="background-color:#CD5C5C;color:white;">H3PO3</td>
                        <td style="background-color:#CD5C5C;color:white;">Detazeb</td>

                        <td style="background-color:#414BCE;color:white;">Sanisol</td>
                        <td style="background-color:#414BCE;color:white;">Ethylene</td>
                        <td style="background-color:#414BCE;color:white;">Ethepon</td>
                        <td style="background-color:#414BCE;color:white;">Kaolin</td>
                        <td style="background-color:#414BCE;color:white;">Zeolit</td>
                        <td style="background-color:#414BCE;color:white;">Rabas</td>
                        <td style="background-color:#414BCE;color:white;">Ratgone</td>
                        <td style="background-color:#414BCE;color:white;">Indostick</td>
                        <td style="background-color:#414BCE;color:white;">Organosilicon</td>

                        <td style="background-color:#FF0000;color:white;">Code</td>
                        <td style="background-color:#FF0000;color:white;">Deskripsi</td>
                      </tr>
                    </thead>
                    <tbody>
  <?php
    if($detail_spk != NULL){
      foreach($detail_spk as $spk) {
  ?>
                      <tr style="font-weight:bold;font-size:11px;white-space:nowrap;">
                        <td class="text-center"><?php echo $spk->umur_hari; ?></td>
                        <td class="text-center"><?php echo $spk->umur_bulan; ?></td>
                        <td class="text-center" class="absorbing-column"><?php echo format_tgl($spk->tanggal); ?></td>
                        <td class="text-center"><?php echo $spk->code_activity; ?></td>
                        <td><?php echo $spk->desc_activity; ?></td>
                        <td class="text-center"><?php echo angka_ribuan_2($spk->hasil_efektif); ?></td>
                        <td class="text-center"><?php echo angka_ribuan_2($spk->HKO); ?></td>
                        <td class="text-right"><?php echo angka_ribuan($spk->Labour); ?></td>
                        <td class="text-right"><?php echo angka_ribuan($spk->Charge); ?></td>
                        <td class="text-right"><?php echo angka_ribuan($spk->Material); ?></td>
                        <td class="text-right"><?php echo angka_ribuan($spk->Total_Biaya); ?></td>
                        <td><?php if($spk->Penarik != NULL) echo $spk->Penarik; else echo "-"; ?></td>
                        <td><?php if($spk->Implement != NULL) echo $spk->Implement; else echo "-"; ?></td>

                        <td class="text-right"><?php echo angka_ribuan_2($spk->Urea); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->Za); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->K2SO4); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->KCL); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->TSP); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->DAP); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->MgSO4); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->Kieserite); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->FeSO4); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->ZnSO4); ?></td>

                        <td class="text-right"><?php echo angka_ribuan_2($spk->Dolomite); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->Gypsum); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->CuSO4); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->Borax); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->LOB); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->CaCl2); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->Calcibor); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->Kompos); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->Belerang); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->Kieserite_G); ?></td>

                        <td class="text-right"><?php echo angka_ribuan_2($spk->NPK); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->Petro_Cas); ?></td>

                        <td class="text-right"><?php echo angka_ribuan_2($spk->Bromacyl); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->Diuron); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->Glyphosate); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->Quizalofop); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->Ametrine); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->Bazza); ?></td>

                        <td class="text-right"><?php echo angka_ribuan_2($spk->Tekasi); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->Tekila); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->Chlorpyrifos); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->Sidazinon); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->Propoxur); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->Cypermethrin); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->Bifentrin_EC); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->Bifentrin_G); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->BPMC); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->Clorpyrifos); ?></td>

                        <td class="text-right"><?php echo angka_ribuan_2($spk->Abamectin); ?></td>

                        <td class="text-right"><?php echo angka_ribuan_2($spk->Fosetil); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->Metalaxil); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->Propiconazole); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->Prochloraz); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->Mankozeb); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->Folirfos); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->H3PO3); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->Detazeb); ?></td>

                        <td class="text-right"><?php echo angka_ribuan_2($spk->Sanisol); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->Ethylene); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->Ethepon); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->Kaolin); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->Zeolit); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->Rabas); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->Ratgone); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->Indostick); ?></td>
                        <td class="text-right"><?php echo angka_ribuan_2($spk->Organosilicon); ?></td>

                        <td class="text-center"><?php echo $spk->group_cost_code; ?></td>
                        <td class="text-left"><?php echo $spk->group_cost_desc; ?></td>
                      </tr>
  <?php
      }
    }
    else{
  ?>
                      <tr style="font-weight:bold;font-size:11px;">
                        <td colspan="15" class="text-center">Empty</td>
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
  function export_spk(){
    var lokasi = $('#lokasi').val();

    window.location.href="/PIS/index.php/Export/export_all_spk?type=HPP&lokasi="+lokasi;
  }
</script>
