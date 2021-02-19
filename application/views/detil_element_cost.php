<!-- PAGE CONTENT -->
<div class="page-content">

  <!-- PAGE CONTENT WRAPPER -->
  <div class="page-content-wrap">

    <div class="col-md-12">
      <div class="panel-body">
        <div class="row">
        <div class="col-md-8">
          <div class="row">
          <div class="panel panel-default">
            <div class="panel-heading" style="background-color: #7B68EE;">
              <h3 class="panel-title" style="color:white;"><b>Detil SPK</b></h3>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
              <table class="table table-striped datatable">
                <thead>
                  <tr>
                    <th>SPK</th>
                    <th>PAS Document</th>
                    <th>Tanggal Ralisasi</th>
                    <th>Aktivitas Code</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th>Umur</th>
                    <th>Jenis Data</th>
                    <th>Bahan Alat</th>
                    <th>Biaya Realisasi</th>
                    <th>Biaya Realisasi (Rp/Ha)</th>
                    <th>Hasil Efektif</th>
                  </tr>
                </thead>
                <tbody>
<?php
  foreach ($detil_spk as $ds) {
?>
                  <tr>
                    <td style="color:black;"><?php echo $ds->SPK; ?></td>
                    <td style="color:black;"><?php echo $ds->PAS_document; ?></td>
                    <td style="color:black;" align='right'><?php echo format_tgl($ds->tgl_realisasi); ?></td>
                    <td style="color:black;"><?php echo $ds->aktivitas_code; ?></td>
                    <td style="color:black;"><?php echo $ds->aktivitas_desc; ?></td>
                    <td style="color:black;"><?php echo $ds->status; ?></td>
                    <td style="color:black;" align='right'><?php echo $ds->umur; ?></td>
                    <td style="color:black;"><?php echo $ds->jenis_data; ?></td>
                    <td style="color:black;"><?php echo $ds->bahan_alat_desc; ?></td>
                    <td style="color:black;" align='right'><?php echo angka_ribuan($ds->biaya_realisasi); ?></td>
                    <td style="color:black;" align='right'><?php echo angka_ribuan($ds->biaya_realisasi / $lokasi['luas']); ?></td>
                    <td style="color:black;" align='right'><?php echo angka_ribuan($ds->hasil_efektif); ?></td>
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

        <div class="col-md-4">
          <div class="row">
            <div class="panel panel-default">
              <div class="panel-heading" style="background-color: #7B68EE;">
                <h3 class="panel-title" style="color:white;"><b>Total Cost</b></h3>
              </div>
              <div class="panel-body">
                <div class="col-md-6" style="padding-left:0px;padding-bottom:0px;padding-right:5px;">
                  <div class="row" style="vertical-align:middle;">
                    <table class="table table-action">
                      <tbody>
                        <tr style="background-color:#F5F5F5;">
                          <td style="color:black;" align='center'><?php echo $group_cost['total']['nama']; ?> (Rp/Ha)</td>
                        </tr>
                        <tr>
                          <td style="color:black;" align='center'>
<?php
  switch ($element_cost) {
    case 'ZN01':
      $label_total_cost = "'Land Preparation', 'Others'";
      break;
    case 'ZN02':
      $label_total_cost = "'Seedling Allocation', 'Others'";
      break;
    case 'ZN03':
      $label_total_cost = "'Planting', 'Others'";
      break;
    case 'ZN04':
      $label_total_cost = "'Road and Drainage', 'Others'";
      break;
    case 'ZN05':
      $label_total_cost = "'Fertilization', 'Others'";
      break;
    case 'ZN06':
      $label_total_cost = "'Weed Control', 'Others'";
      break;
    case 'ZN07':
      $label_total_cost = "'Plant Pest Control', 'Others'";
      break;
    case 'ZN08':
      $label_total_cost = "'Forcing', 'Others'";
      break;
    case 'ZN09':
      $label_total_cost = "'Pre Harvesting', 'Others'";
      break;
    case 'ZN10':
      $label_total_cost = "'Harvesting', 'Others'";
      break;
    case 'ZN11':
      $label_total_cost = "'Observation', 'Others'";
      break;
    case 'ZN12':
      $label_total_cost = "'Plant Selection', 'Others'";
      break;
    case 'ZN13':
      $label_total_cost = "'Springkle/Irrigation', 'Others'";
      break;
    case 'ZN14':
      $label_total_cost = "'Guard/Pull/Labor or Transportation', 'Others'";
      break;
    case 'ZN15':
      $label_total_cost = "'Others', 'Others'";
      break;
  }
  if($group_cost['total']['total'] == NULL){
    echo "-";
  }
  else{
    echo angka_ribuan(($element_cost_real[$element_cost]['total']) / $lokasi['luas']);
  }
?>
                          </td>
                        </tr>
                        <tr style="background-color:#F5F5F5;">
                          <td style="color:black;" align='center'>Others (Rp/Ha)</td>
                        </tr>
                        <tr>
                          <td style="color:black;" align='center'>
<?php
  if(($group_cost['all']['total']) == NULL){
    echo "-";
  }
  else{
    echo angka_ribuan(($total_real - $element_cost_real[$element_cost]['total']) / $lokasi['luas']);
  }
?>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-md-6" style="padding-left:5px;padding-bottom:0px;padding-right:0px;">
                  <canvas id="diagram_total_cost" width="100%" height="60px"></canvas>
<?php
  $total_cost = '';
  $total_cost .= round(($element_cost_real[$element_cost]['total']) / ($total_real) * 100, 2);
  $total_cost .= ', '.round(($total_real - $element_cost_real[$element_cost]['total']) / ($total_real) * 100, 2);
?>
<script>
  var config_total_cost = {
    type: 'doughnut',
    data: {
      datasets: [{
        data: [
          <?php echo $total_cost; ?>
        ],
        backgroundColor: [
          '#0000CD',
          '#696969',
        ],
        label: 'Cost and Production'
      }],
      labels: [
        <?php echo $label_total_cost; ?>
      ]
    },
    options: {
      responsive: true,
      tooltips: {
        mode: 'index',
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
          <div class="row">
            <div class="panel panel-default">
              <div class="panel-heading" style="background-color: #7B68EE;">
                <h3 class="panel-title" style="color:white;"><b>Group Cost</b></h3>
              </div>
              <div class="panel-body">
                <div class="row">
                  <table class="table table-hover">
                    <tbody>
                      <tr style="background-color:#7B68EE;">
                        <td style="color:white;" align="center">Biaya</td>
                        <td style="color:white;" align="center">Total</td>
                        <td style="color:white;" align="center">Rp/Ha</td>
                        <td style="color:white;" align="center">Rp/Kg</td>
                      </tr>
                      <tr style="background-color:#F5F5F5;">
                        <td style="color:black;">Labour</td>
                        <td style="color:black;" align="right">
<?php
  if($produksi == NULL){
    if(substr($lokasi['status'], 0, 4) == 'NFFC'){
      $tonase = 82.2 * $lokasi['luas'];
    }
    else{
      $tonase = $std_yield['yield'] * $lokasi['luas'];
    }
  }
  else{
    $tonase = $produksi['real_dan_sisa_rencana_tonase'];
  }

  if($group_cost['labour']['total'] == NULL || $group_cost['labour']['total'] == 0){
    echo "-";
  }
  else{
    echo angka_ribuan($group_cost['labour']['total']);
  }
?>
                        </td>
                        <td style="color:black;" align="right">
<?php
  if($group_cost['labour']['total'] == NULL || $group_cost['labour']['total'] == 0){
    echo "-";
  }
  else{
    echo angka_ribuan($group_cost['labour']['total'] / $lokasi['luas']);
  }
?>
                        </td>
                        <td style="color:black;" align="right">
<?php
  if($group_cost['labour']['total'] == NULL || $group_cost['labour']['total'] == 0){
    echo "-";
  }
  else{
    echo angka_ribuan($group_cost['labour']['total'] / $tonase / 1000);
  }
?>
                        </td>
                      </tr>
                      <tr>
                        <td style="color:black;">Charge</td>
                        <td style="color:black;" align="right">
<?php
  if($group_cost['charge']['total'] == NULL){
    echo "-";
  }
  else{
    echo angka_ribuan($group_cost['charge']['total']);
  }
?>
                        </td>
                        <td style="color:black;" align="right">
<?php
  if($group_cost['charge']['total'] == NULL){
    echo "-";
  }
  else{
    echo angka_ribuan($group_cost['charge']['total'] / $lokasi['luas']);
  }
?>
                        </td>
                        <td style="color:black;" align="right">
<?php
  if($group_cost['charge']['total'] == NULL){
    echo "-";
  }
  else{
    echo angka_ribuan($group_cost['charge']['total'] / $tonase / 1000);
  }
?>
                        </td>
                      </tr>
                      <tr style="background-color:#F5F5F5;">
                        <td style="color:black;">Material</td>
                        <td style="color:black;" align="right">
<?php
  if($group_cost['material']['total'] == NULL){
    echo "-";
  }
  else{
    echo angka_ribuan($group_cost['material']['total']);
  }
?>
                        </td>
                        <td style="color:black;" align="right">
<?php
  if($group_cost['material']['total'] == NULL){
    echo "-";
  }
  else{
    echo angka_ribuan($group_cost['material']['total'] / $lokasi['luas']);
  }
?>
                        </td>
                        <td style="color:black;" align="right">
<?php
  if($group_cost['material']['total'] == NULL){
    echo "-";
  }
  else{
    echo angka_ribuan($group_cost['material']['total'] / $tonase / 1000);
  }
?>
                        </td>
                      </tr>
                      <tr>
                        <td style="color:black;">Bibit</td>
                        <td style="color:black;" align="right">
<?php
  if($group_cost['bibit']['total'] == NULL){
    echo "-";
  }
  else{
    echo angka_ribuan($group_cost['bibit']['total']);
  }
?>
                        </td>
                        <td style="color:black;" align="right">
<?php
  if($group_cost['bibit']['total'] == NULL){
    echo "-";
  }
  else{
    echo angka_ribuan($group_cost['bibit']['total'] / $lokasi['luas']);
  }
?>
                        </td>
                        <td style="color:black;" align="right">
<?php
  if($group_cost['bibit']['total'] == NULL){
    echo "-";
  }
  else{
    echo angka_ribuan($group_cost['bibit']['total'] / $tonase / 1000);
  }
?>
                        </td>
                      </tr>
<?php
  if($element_cost == 'ZN01' || $element_cost == 'ZN03' || $element_cost == 'ZN04'){
?>
                      <tr style="background-color:#F5F5F5;">
                        <td style="color:black;">Est. Varian Cost</td>
                        <td style="color:black;" align="right">
<?php
  if($element_cost_real[$element_cost]['total'] == NULL){
    echo "-";
  }
  else{
    echo angka_ribuan($element_cost_real[$element_cost]['total'] - $group_cost['total']['total']);
  }
?>
                        </td>
                        <td style="color:black;" align="right">
<?php
  if($element_cost_real[$element_cost]['total'] == NULL){
    echo "-";
  }
  else{
    echo angka_ribuan(($element_cost_real[$element_cost]['total'] - $group_cost['total']['total']) / $lokasi['luas']);
  }
?>
                        </td>
                        <td style="color:black;" align="right">
<?php
  if($element_cost_real[$element_cost]['total'] == NULL){
    echo "-";
  }
  else{
    echo angka_ribuan(($element_cost_real[$element_cost]['total'] - $group_cost['total']['total']) / $tonase / 1000);
  }
?>
                        </td>
                      </tr>
<?php
  }
?>
                    </body>
                    <tfoot>
                      <tr style="background-color:#DCDCDC;">
                        <td style="color:black;"><b>Total</b></td>
                        <td style="color:black;" align="right"><b>
<?php
  if($group_cost['total']['total'] == NULL){
    echo "-";
  }
  else{
    echo angka_ribuan($element_cost_real[$element_cost]['total']);
  }
?>
                        </b></td>
                        <td style="color:black;" align="right"><b>
<?php
  if($group_cost['total']['total'] == NULL){
    echo "-";
  }
  else{
    echo angka_ribuan(($element_cost_real[$element_cost]['total']) / $lokasi['luas']);
  }
?>
                        </b></td>
                        <td style="color:black;" align="right"><b>
<?php
  if($group_cost['total']['total'] == NULL){
    echo "-";
  }
  else{
    echo angka_ribuan(($element_cost_real[$element_cost]['total']) / $tonase / 1000);
  }
?>
                        </b></td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    &nbsp;
                  </div>
                  <div class="col-md-8">
                    <canvas id="diagram_group_cost" width="100%" height="40px"></canvas>
<?php
  $cost_and_production = '';
  if($group_cost['total']['total'] == NULL){
    $cost_and_production .= '0';
    $cost_and_production .= ', 0';
    $cost_and_production .= ', 0';
    $cost_and_production .= ', 0';
  }
  else{
    $cost_and_production .= round(($group_cost['labour']['total'] / $group_cost['total']['total']) * 100);
    $cost_and_production .= ', '.round(($group_cost['charge']['total'] / $group_cost['total']['total']) * 100);
    $cost_and_production .= ', '.round(($group_cost['material']['total'] / $group_cost['total']['total']) * 100);
    $cost_and_production .= ', '.round(($group_cost['bibit']['total'] / $group_cost['total']['total']) * 100);
  }
?>
<script>
  var config_group_cost = {
  type: 'doughnut',
  data: {
    datasets: [{
      data: [
        <?php echo $cost_and_production; ?>
      ],
      backgroundColor: [
        '#0000CD',
        '#8B4513',
        '#696969',
        '#32CD32',
      ],
      label: 'Cost and Production'
    }],
    labels: [
      'Labour',
      'Charge',
      'Material',
      'Bibit'
    ]
    },
    options: {
      responsive: true,
      tooltips: {
        mode: 'index',
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
                  <div class="col-md-2">
                    &nbsp;
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>

  </div>
  <!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTENT -->

<script>
  $( document ).ready(function() {

  });

  window.onload = function() {
		var ctx_total_cost = document.getElementById('diagram_total_cost').getContext('2d');
		window.myDoughnut = new Chart(ctx_total_cost, config_total_cost);
		var ctx_group_cost = document.getElementById('diagram_group_cost').getContext('2d');
		window.myDoughnut = new Chart(ctx_group_cost, config_group_cost);
	};
</script>
