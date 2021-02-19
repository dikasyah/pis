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
              <?php echo format_tgl($tanggal); ?>
            </b></span>
            <span class="d-sm-none" style="color:black;font-size:12px;"><b>
              <a href="/PIS/WIP_PM_Dashboard/plantation_group?pg=<?php echo $pg_wil['pg']; ?>"><?php echo $pg_wil['pg']; ?></a> -
              <a href="/PIS/WIP_PM_Dashboard/wilayah?wilayah=<?php echo $pg_wil['wilayah']; ?>"><?php echo $pg_wil['wilayah']; ?></a> -
              <?php echo $lokasi['lokasi']; ?> -
              <?php echo format_tgl($tanggal); ?>
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

        <div class="row mb-2">
          <div class="col-lg-3">
            <div class="row mb-2">
              <div class="col-lg-12 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-header py-0 text-center" style="background-color:#008080;font-size:14px;">
                    <span style="color:white;"><b>Tanggal</b></span>
                  </div>
                  <div class="card-body" style="padding:0;background-color:#20B2AA;">
                    <br />
                    <select class="form-control select" name="select_tanggal" id="select_tanggal" onchange="javascript:pindah_tanggal();" data-live-search="true" style="color:black;font-family:'Lucida Console'">
                      <option value="0" style="color:black;">Pilih Tanggal</option>
<?php
  foreach ($tgl_spray as $aa) {
    if($tanggal == $aa->tgl){
?>
                      <option class="text-right" value="<?php echo $aa->tgl; ?>" selected><?php echo date('d/m/Y', strtotime($aa->tgl)); ?></option>
<?php
    }
    else{
?>
                      <option class="text-right" value="<?php echo $aa->tgl; ?>"><?php echo date('d/m/Y', strtotime($aa->tgl)); ?></option>
<?php
    }
  }
?>
                    </select>
                    <br />
                  </div>
                </div>
              </div>
            </div>

            <div class="row mb-2">
              <div class="col-lg-12 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-header py-0 text-center" style="background-color:#008080;">
                    <span style="color:white;font-size:14px;"><b>Group Cost</b></span>
                  </div>
                  <div class="card-body" style="padding:0;">
                    <table class="table_pm">
                      <tr class="text-center" style="font-weight:bold;background-color:#008080;">
                        <td style="color:white;">Category</td>
                        <td style="color:white;">Rp/Ha</td>
                        <td style="color:white;">Total</td>
                      </tr>
                      <tr>
                        <td>Charge</td>
                        <td class="text-right"><?php echo angka_ribuan($group_cost['charge'] / $lokasi['luas']); ?></td>
                        <td class="text-right"><?php echo angka_ribuan($group_cost['charge']); ?></td>
                      </tr>
                      <tr>
                        <td>Labour</td>
                        <td class="text-right"><?php echo angka_ribuan($group_cost['labour'] / $lokasi['luas']); ?></td>
                        <td class="text-right"><?php echo angka_ribuan($group_cost['labour']); ?></td>
                      </tr>
                      <tr>
                        <td>Material</td>
                        <td class="text-right"><?php echo angka_ribuan($group_cost['material'] / $lokasi['luas']); ?></td>
                        <td class="text-right"><?php echo angka_ribuan($group_cost['material']); ?></td>
                      </tr>
                      <tr style="font-size:13px;font-weight:bold;">
                        <td>Total</td>
                        <td class="text-right"><?php echo angka_ribuan(($group_cost['charge'] + $group_cost['labour'] + $group_cost['material']) / $lokasi['luas']); ?></td>
                        <td class="text-right"><?php echo angka_ribuan($group_cost['charge'] + $group_cost['labour'] + $group_cost['material']); ?></td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="row mb-2">
              <div class="col-lg-12 p-1">
                <div class="card shadow" style="width:100%;">
                  <div class="card-body" style="padding:5px;">
                    <canvas id="diagram_group_cost"></canvas>
<?php
  $total_group_cost = $group_cost['charge'] + $group_cost['labour'] + $group_cost['material'];
  if($total_group_cost != NULL){
    $percen_charge = ($group_cost['charge'] / $total_group_cost) * 100;
    $percen_labour = ($group_cost['labour'] / $total_group_cost) * 100;
    $percen_material = ($group_cost['material'] / $total_group_cost) * 100;
  }
  else{
    $percen_charge = 0;
    $percen_labour = 0;
    $percen_material = 0;
  }
  $percen_group_cost = round($percen_charge, 1).', '.round($percen_labour, 1).', '.round($percen_material, 1);
?>
<script>
  var config_group_cost = {
    type: 'bar',
    data: {
    labels: ['Charge', 'Labour', 'Material'],
    datasets: [{
      label: 'Biaya',
      backgroundColor: [
				'#32CD32',
				'#FFA500',
				'#FF0000',
			],
      borderColor: [
				'#32CD32',
				'#FFA500',
				'#FF0000',
			],
      borderWidth: 1,
      data: [
        <?php echo $percen_group_cost; ?>
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
            return label + ' : ' + val + '%';
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
            max: 100,
            min: 0
          }
        }],
        xAxes: [{
          gridLines: {
            display: false,
            drawBorder: true,
            drawOnChartArea: false,
          }
        }]
      },
      // animation: {
      //   onComplete: function () {
      //     var chartInstance = this.chart;
      //     var ctx = chartInstance.ctx;
      //     ctx.textAlign = "center";
      //
      //     Chart.helpers.each(this.data.datasets.forEach(function (dataset, i) {
      //       var meta = chartInstance.controller.getDatasetMeta(i);
      //       Chart.helpers.each(meta.data.forEach(function (bar, index) {
      //         ctx.fillText(dataset.data[index] + '%', bar._model.x, bar._model.y - 10);
      //       }),this)
      //     }),this);
      //   }
      // }
    }
  };
</script>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-9 p-1" style="overflow-x:auto;">
            <div class="card shadow" style="width:100%;">
              <div class="card-body" style="padding:0;">
                <table class="table_pm">
                  <thead>
                    <tr class="text-center" style="background-color:#008080;font-weight:bold;font-size:12px;">
                      <td style="color:white;">SPK</td>
                      <td style="color:white;">PAS Document</td>
                      <td style="color:white;width:80px;" class="absorbing-column">Tanggal</td>
                      <!-- <td>Code Activity</td>
                      <td>Desc Activity</td> -->
                      <td style="color:white;">Status</td>
                      <td style="color:white;">Umur</td>
                      <td style="color:white;">Jenis Data</td>
                      <td style="color:white;">Code Material</td>
                      <td style="color:white;">Desc Material</td>
                      <td style="color:white;">Biaya</td>
                      <td style="color:white;">Quantity</td>
                      <td style="color:white;">Hasil Efektif</td>
                    </tr>
                  </thead>
                  <tbody>
<?php
  if($detil_spk != NULL){
    foreach ($detil_spk as $spk) {
?>
                    <tr style="font-weight:bold;font-size:11px;">
                      <td class="text-center"><?php echo $spk->SPK; ?></td>
                      <td class="text-center"><?php echo $spk->PAS_document; ?></td>
                      <td class="text-right"><?php echo format_tgl($spk->tgl); ?></td>
                      <!-- <td class="text-center"><?php echo $spk->code_activity; ?></td>
                      <td><?php echo $spk->desc_activity; ?></td> -->
                      <td class="text-center"><?php echo $spk->status; ?></td>
                      <td class="text-center"><?php echo $spk->umur; ?></td>
                      <td><?php echo $spk->jenis_data; ?></td>
                      <td><?php echo $spk->code_material; ?></td>
                      <td><?php echo $spk->desc_material; ?></td>
                      <td class="text-right"><?php echo angka_ribuan($spk->biaya_realisasi); ?></td>
                      <td class="text-right"><?php echo angka_ribuan_2($spk->resource); ?></td>
                      <td class="text-right"><?php echo $spk->hasil_efektif; ?></td>
                    </tr>
<?php
    }
  }
  else{
?>
                    <tr style="font-weight:bold;font-size:11px;">
                      <td colspan="9" class="text-center">Empty</td>
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
  function pindah_material(){
    var code_material = $("#select_material").val();
    window.location.href="/PIS/dashboard/detail_material?lokasi=<?php echo $lokasi['lokasi']; ?>&material="+code_material;
  }
  window.onload = function(){
		var ctx_group_cost = document.getElementById('diagram_group_cost').getContext('2d');
		window.myBar = new Chart(ctx_group_cost, config_group_cost);
	};
</script>
