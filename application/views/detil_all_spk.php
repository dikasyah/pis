<!-- Page Wrapper -->
<div id="wrapper">

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
              <a href="/PIS/WIP_PM_Dashboard/plantation_group?pg=<?php echo $pg_wil['pg']; ?>"><?php echo $pg_wil['pg']; ?></a> -
              <a href="/PIS/WIP_PM_Dashboard/wilayah?wilayah=<?php echo $pg_wil['wilayah']; ?>"><?php echo $pg_wil['wilayah']; ?></a> -
              <?php echo $lokasi['lokasi']; ?> -
              Detail SPK
            </b></span>
            <span class="d-sm-none" style="color:black;font-size:12px;"><b>
              <a href="/PIS/WIP_PM_Dashboard/plantation_group?pg=<?php echo $pg_wil['pg']; ?>"><?php echo $pg_wil['pg']; ?></a> -
              <a href="/PIS/WIP_PM_Dashboard/wilayah?wilayah=<?php echo $pg_wil['wilayah']; ?>"><?php echo $pg_wil['wilayah']; ?></a> -
              <?php echo $lokasi['lokasi']; ?> -
              Detail SPK
            </b></span>
          </div>
        </form>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

          <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="/PIS/Dashboard/lokasi?lokasi=<?php echo $lokasi['lokasi']; ?>" role="button" aria-expanded="false">
              <i class="fas fa-arrow-circle-left fa-lg"></i>
            </a>
          </li>

          <div class="topbar-divider d-none d-sm-block"></div>

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
    $date1 = round(strtotime($konstanta['nilai'])/86400);
    $date2 = round(strtotime($lokasi['tgl_mulai_rawat'])/86400);

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
                <table class="table_pm">
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
  if($detil_spk != NULL){
    foreach($detil_spk as $spk) {
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
    </div>
    <!-- End of Main Content -->

  </div>
  <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
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

    window.location.href="/PIS/Dashboard/detail_all_spk?lokasi="+lokasi;
  }
  function export_spk(){
    var lokasi = $('#lokasi').val();

    window.location.href="/PIS/Export/export_all_spk?type=WIP&lokasi="+lokasi;
  }
</script>
