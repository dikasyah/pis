<?php
  //Total Cost
  $luas_panen_nsfc = 0;
  $yield_nsfc = 0;
  $tonase_nsfc = 0;
  $nsfc = 0;
  $luas_panen_nssc = 0;
  $yield_nssc = 0;
  $tonase_nssc = 0;
  $nssc = 0;
  foreach ($produksi as $pro) {
    if($pro->status == 'NSFC'){
      $luas_panen_nsfc += $pro->luas;
      if($pro->yield != NULL){
        $yield_nsfc += $pro->yield;
        $tonase_nsfc += $pro->tonase;
      }
      else{
        $yield_nsfc += $std_yield['NSFC']['yield'];
        $tonase_nsfc += ($std_yield['NSFC']['yield'] * $pro->luas);
      }
      $nsfc++;
    }
    else{
      $luas_panen_nssc += $pro->luas;
      if($pro->yield != NULL){
        $yield_nssc += $pro->yield;
        $tonase_nssc += $pro->tonase;
      }
      else{
        $yield_nssc += $std_yield['NSSC']['yield'];
        $tonase_nssc += ($std_yield['NSSC']['yield'] * $pro->luas);
      }
      $nssc++;
    }
  }
  $luas_panen = $luas_panen_nsfc + $luas_panen_nssc;
  $tonase = $tonase_nsfc + $tonase_nssc;
  $yield = ($yield_nsfc + $yield_nssc) / ($nsfc + $nssc);
  $yield_nsfc = $yield_nsfc / $nsfc;
  $yield_nssc = $yield_nssc / $nssc;

  //Luas Produksi 2019
  $luas_produksi_nsfc = $element_cost_real[$wil.'1']['luas_tonase_NSFC']['luas'] + $element_cost_real[$wil.'2']['luas_tonase_NSFC']['luas'] + $element_cost_real[$wil.'3']['luas_tonase_NSFC']['luas'];
  $luas_produksi_nssc = $element_cost_real[$wil.'1']['luas_tonase_NSSC']['luas'] + $element_cost_real[$wil.'2']['luas_tonase_NSSC']['luas'] + $element_cost_real[$wil.'3']['luas_tonase_NSSC']['luas'];
  $luas_produksi_ns = $element_cost_real[$wil.'1']['luas_tonase_total']['luas'] + $element_cost_real[$wil.'2']['luas_tonase_total']['luas'] + $element_cost_real[$wil.'3']['luas_tonase_total']['luas'];
  //Tonase Produksi 2019
  $tonase_produksi_nsfc = $element_cost_real[$wil.'1']['luas_tonase_NSFC']['tonase'] + $element_cost_real[$wil.'2']['luas_tonase_NSFC']['tonase'] + $element_cost_real[$wil.'3']['luas_tonase_NSFC']['tonase'];
  $tonase_produksi_nssc = $element_cost_real[$wil.'1']['luas_tonase_NSSC']['tonase'] + $element_cost_real[$wil.'2']['luas_tonase_NSSC']['tonase'] + $element_cost_real[$wil.'3']['luas_tonase_NSSC']['tonase'];
  $tonase_produksi_ns = $element_cost_real[$wil.'1']['luas_tonase_total']['tonase'] + $element_cost_real[$wil.'2']['luas_tonase_total']['tonase'] + $element_cost_real[$wil.'3']['luas_tonase_total']['tonase'];
  //Element constant 2019
  $real_nsfc = array(
    'ZN01' => NULL,
    'ZN02' => NULL,
    'ZN03' => NULL,
    'ZN04' => NULL,
    'ZN05' => NULL,
    'ZN06' => NULL,
    'ZN07' => NULL,
    'ZN08' => NULL,
    'ZN09' => NULL,
    'ZN10' => NULL,
    'ZN11' => NULL,
    'ZN12' => NULL,
    'ZN13' => NULL,
    'ZN14' => NULL,
    'ZN15' => NULL
  );
  $real_nssc = array(
    'ZN01' => NULL,
    'ZN02' => NULL,
    'ZN03' => NULL,
    'ZN04' => NULL,
    'ZN05' => NULL,
    'ZN06' => NULL,
    'ZN07' => NULL,
    'ZN08' => NULL,
    'ZN09' => NULL,
    'ZN10' => NULL,
    'ZN11' => NULL,
    'ZN12' => NULL,
    'ZN13' => NULL,
    'ZN14' => NULL,
    'ZN15' => NULL
  );
  $real_ns = array(
    'ZN01' => NULL,
    'ZN02' => NULL,
    'ZN03' => NULL,
    'ZN04' => NULL,
    'ZN05' => NULL,
    'ZN06' => NULL,
    'ZN07' => NULL,
    'ZN08' => NULL,
    'ZN09' => NULL,
    'ZN10' => NULL,
    'ZN11' => NULL,
    'ZN12' => NULL,
    'ZN13' => NULL,
    'ZN14' => NULL,
    'ZN15' => NULL
  );

  //Real NSFC
  foreach ($element_cost_real[$wil.'1']['NSFC'] as $ec) {
    $real_nsfc[$ec->act_grp] += $ec->biaya_realisasi;
  }
  foreach ($element_cost_real[$wil.'2']['NSFC'] as $ec) {
    $real_nsfc[$ec->act_grp] += $ec->biaya_realisasi;
  }
  foreach ($element_cost_real[$wil.'3']['NSFC'] as $ec) {
    $real_nsfc[$ec->act_grp] += $ec->biaya_realisasi;
  }
  //Real NSSC
  foreach ($element_cost_real[$wil.'1']['NSSC'] as $ec) {
    $real_nssc[$ec->act_grp] += $ec->biaya_realisasi;
  }
  foreach ($element_cost_real[$wil.'2']['NSSC'] as $ec) {
    $real_nssc[$ec->act_grp] += $ec->biaya_realisasi;
  }
  foreach ($element_cost_real[$wil.'3']['NSSC'] as $ec) {
    $real_nssc[$ec->act_grp] += $ec->biaya_realisasi;
  }
  //Real NS
  foreach ($element_cost_real[$wil.'1']['total'] as $ec) {
    $real_ns[$ec->act_grp] += $ec->biaya_realisasi;
  }
  foreach ($element_cost_real[$wil.'2']['total'] as $ec) {
    $real_ns[$ec->act_grp] += $ec->biaya_realisasi;
  }
  foreach ($element_cost_real[$wil.'3']['total'] as $ec) {
    $real_ns[$ec->act_grp] += $ec->biaya_realisasi;
  }
?>
<!-- PAGE CONTENT -->
<div class="page-content">

  <!-- PAGE CONTENT WRAPPER -->
  <div class="page-content-wrap">

    <div class="row">
      <div class="col-md-6">
        <div class="row" align="center">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="row">
                <h2><b><?php echo $wilayah['nama']; ?></b></h2>
              </div>
              <div class="row">
                <!--Mobile Ver-->
                <div class="div-mobile">
                  <div class="col-md-12">
                    <img src="/PIS/assets/images/<?php echo $wilayah['code']; ?>.png" alt="Location is not available" width="100%">
                  </div>
                </div>
                <!--Leptop Ver-->
                <div class="div-leptop">
                  <div class="col-md-12"  style="height: 385px;">
                    <img src="/PIS/assets/images/<?php echo $wilayah['code']; ?>.png" alt="Location is not available" height="100%">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      <div id="show_profile">
      </div>

        <div class="row">
          <div class="panel panel-default tabs">
            <ul class="nav nav-tabs" role="tablist">
              <li class="active"><a href="#tab-total_cost" role="tab" data-toggle="tab">Total</a></li>
              <li><a href="#tab-standart_total_cost" role="tab" data-toggle="tab">Standart</a></li>
            </ul>
            <div class="panel-body tab-content">

              <div class="tab-pane active" id="tab-total_cost">
                <div class="col-md-5">
                  <div class="chart-holder">
                    <canvas id="diagram_total_cost" height="280px"></canvas>
<?php
  $group_cost_total = $group_cost['labour']['jumlah'] + $group_cost['charge']['jumlah'] + $group_cost['material']['jumlah'] + $group_cost['bibit']['jumlah'];
  $group_cost_labour = round($group_cost['labour']['jumlah'] / $group_cost_total * 100, 2);
  $group_cost_charge = round($group_cost['charge']['jumlah'] / $group_cost_total * 100, 2);
  $group_cost_material = round($group_cost['material']['jumlah'] / $group_cost_total * 100, 2);
  $group_cost_bibit = round($group_cost['bibit']['jumlah'] / $group_cost_total * 100, 2);
  $gct = $group_cost_labour.', '.$group_cost_charge.', '.$group_cost_material.', '.$group_cost_bibit;
?>
<script>
  var config_total_cost = {
    type: 'doughnut',
    data: {
      datasets: [{
        data: [
          <?php echo $gct; ?>
        ],
        backgroundColor: [
          '#1E90FF',
          '#D2691E',
          '#696969',
          '#FF8C00',
        ],
        label: 'Cost and Production'
      }],
      labels: [
        'Labour',
        'Charge',
        'Material',
        'Bibit',
      ]
    },
    options: {
      responsive: true,
      legend: {
        position: 'bottom',
        labels: {
          usePointStyle: true,
        }
      },
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
      title: {
        display: true,
        text: 'Total Cost',
        fontSize: 16,
        fontFamily: 'arial',
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

                <div class="col-md-7">
                  <div class="row">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th colspan="2">
                            Total Cost
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td style="color:black;padding-top:3px;padding-bottom:3px;">Labour</td>
                          <td align="right" style="color:black;padding-top:3px;padding-bottom:3px;">
<?php
  $biaya_total = 0;
  echo angka_ribuan($group_cost['labour']['jumlah']);
  $biaya_total += $group_cost['labour']['jumlah'];
?>
                          </td>
                        </tr>
                        <tr>
                          <td style="color:black;padding-top:3px;padding-bottom:3px;">Charge</td>
                          <td align="right" style="color:black;padding-top:3px;padding-bottom:3px;">
<?php
  echo angka_ribuan($group_cost['charge']['jumlah']);
  $biaya_total += $group_cost['charge']['jumlah'];
?>
                          </td>
                        </tr>
                        <tr>
                          <td style="color:black;padding-top:3px;padding-bottom:3px;">Material</td>
                          <td align="right" style="color:black;padding-top:3px;padding-bottom:3px;">
<?php
  echo angka_ribuan($group_cost['material']['jumlah']);
  $biaya_total += $group_cost['material']['jumlah'];
?>
                          </td>
                        </tr>
                        <tr>
                          <td style="color:black;padding-top:3px;padding-bottom:3px;">Bibit</td>
                          <td align="right" style="color:black;padding-top:3px;padding-bottom:3px;">
<?php
  echo angka_ribuan($group_cost['bibit']['jumlah']);
  $biaya_total += $group_cost['bibit']['jumlah'];
?>
                            </td>
                        </tr>
                      </tbody>
                      <tfoot>
                        <tr>
                          <td style="color:black;padding-top:3px;padding-bottom:3px;"><b>Total</b></td>
                          <td align="right" style="color:black;padding-top:3px;padding-bottom:3px;"><b><?php echo angka_ribuan($biaya_total); ?></b></td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>

                  <div class="row">
                    <div class="col-md-7">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th colspan="2">
                              Total Cost (Rp/Ha)
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td style="color:black;padding-top:3px;padding-bottom:3px;">Labour</td>
                            <td align="right" style="color:black;padding-top:3px;padding-bottom:3px;">
<?php
  $biaya_total = 0;
  echo angka_ribuan($group_cost['labour']['jumlah'] / $luas_panen);
  $biaya_total += $group_cost['labour']['jumlah'] / $luas_panen;
?>
                            </td>
                          </tr>
                          <tr>
                            <td style="color:black;padding-top:3px;padding-bottom:3px;">Charge</td>
                            <td align="right" style="color:black;padding-top:3px;padding-bottom:3px;">
<?php
  echo angka_ribuan($group_cost['charge']['jumlah'] / $luas_panen);
  $biaya_total += $group_cost['charge']['jumlah'] / $luas_panen;
?>
                            </td>
                          </tr>
                          <tr>
                            <td style="color:black;padding-top:3px;padding-bottom:3px;">Material</td>
                            <td align="right" style="color:black;padding-top:3px;padding-bottom:3px;">
<?php
  echo angka_ribuan($group_cost['material']['jumlah'] / $luas_panen);
  $biaya_total += $group_cost['material']['jumlah'] / $luas_panen;
?>
                          </td>
                        </tr>
                        <tr>
                          <td style="color:black;padding-top:3px;padding-bottom:3px;">Bibit</td>
                          <td align="right" style="color:black;padding-top:3px;padding-bottom:3px;">
<?php
  echo angka_ribuan($group_cost['bibit']['jumlah'] / $luas_panen);
  $biaya_total += $group_cost['bibit']['jumlah'] / $luas_panen;
?>
                              </td>
                          </tr>
                        </tbody>
                        <tfoot>
                          <tr>
                            <td style="color:black;padding-top:3px;padding-bottom:3px;"><b>Total</b></td>
                            <td align="right" style="color:black;padding-top:3px;padding-bottom:3px;"><b><?php echo angka_ribuan($biaya_total); ?></b></td>
                          </tr>
                        </tfoot>
                      </table>
                    </div>

                    <div class="col-md-5">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th colspan="2">
                              Total Cost (Rp/Kg)
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td style="color:black;padding-top:3px;padding-bottom:3px;">Labour</td>
                            <td align="right" style="color:black;padding-top:3px;padding-bottom:3px;">
<?php
  $biaya_total = 0;
  echo angka_ribuan($group_cost['labour']['jumlah'] / $tonase / 1000);
  $biaya_total += $group_cost['labour']['jumlah'] / $tonase / 1000;
?>
                            </td>
                          </tr>
                          <tr>
                            <td style="color:black;padding-top:3px;padding-bottom:3px;">Charge</td>
                            <td align="right" style="color:black;padding-top:3px;padding-bottom:3px;">
<?php
  echo angka_ribuan($group_cost['charge']['jumlah'] / $tonase / 1000);
  $biaya_total += $group_cost['charge']['jumlah'] / $tonase / 1000;
?>
                            </td>
                          </tr>
                          <tr>
                            <td style="color:black;padding-top:3px;padding-bottom:3px;">Material</td>
                            <td align="right" style="color:black;padding-top:3px;padding-bottom:3px;">
<?php
  echo angka_ribuan($group_cost['material']['jumlah'] / $tonase / 1000);
  $biaya_total += $group_cost['material']['jumlah'] / $tonase / 1000;
?>
                          </td>
                        </tr>
                        <tr>
                          <td style="color:black;padding-top:3px;padding-bottom:3px;">Bibit</td>
                          <td align="right" style="color:black;padding-top:3px;padding-bottom:3px;">
<?php
  echo angka_ribuan($group_cost['bibit']['jumlah'] / $tonase / 1000);
  $biaya_total += $group_cost['bibit']['jumlah'] / $tonase / 1000;
?>
                              </td>
                          </tr>
                        </tbody>
                        <tfoot>
                          <tr>
                            <td style="color:black;padding-top:3px;padding-bottom:3px;"><b>Total</b></td>
                            <td align="right" style="color:black;padding-top:3px;padding-bottom:3px;"><b><?php echo angka_ribuan($biaya_total); ?></b></td>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>

                </div>
              </div>

              <div class="tab-pane" id="tab-standart_total_cost">
                <div class="col-md-5">
                  <div class="chart-holder">
                    <canvas id="diagram_std_total_cost" height="280px"></canvas>
<?php
/*
  $std_group_cost_total = $labour_total + $charge_total + $material_total + $bibit_total;
  if($group_cost_total != NULL){
    $std_group_cost_labour = round($std_labour_total / $std_group_cost_total * 100);
    $std_group_cost_charge = round($std_charge_total / $std_group_cost_total * 100);
    $std_group_cost_material = round($std_material_total / $std_group_cost_total * 100);
    $std_group_cost_bibit = round($std_bibit_total / $std_group_cost_total * 100);
  }
  else{
    $std_group_cost_labour = 0;
    $std_group_cost_charge = 0;
    $std_group_cost_material = 0;
    $std_group_cost_bibit = 0;
  }
  $gct = $std_group_cost_labour.', '.$std_group_cost_charge.', '.$std_group_cost_material.', '.$std_group_cost_bibit;
*/
?>
<script>
  var config_std_total_cost = {
    type: 'doughnut',
    data: {
      datasets: [{
        data: [
          <?php echo NULL; ?>
        ],
        backgroundColor: [
          '#1E90FF',
          '#D2691E',
          '#696969',
          '#FF8C00',
        ],
        label: 'Cost and Production'
      }],
      labels: [
        'Labour',
        'Charge',
        'Material',
        'Bibit',
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
        display: true,
        text: 'Total Cost',
        fontSize: 16,
        fontFamily: 'arial',
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

                <div class="col-md-7">
                  <div class="row">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th colspan="2">
                            Total Cost
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td style="color:black;padding-top:3px;padding-bottom:3px;">Labour</td>
                          <td align="right" style="color:black;padding-top:3px;padding-bottom:3px;"><?php echo "-"; ?></td>
                        </tr>
                        <tr>
                          <td style="color:black;padding-top:3px;padding-bottom:3px;">Charge</td>
                          <td align="right" style="color:black;padding-top:3px;padding-bottom:3px;"><?php echo "-"; ?></td>
                        </tr>
                        <tr>
                          <td style="color:black;padding-top:3px;padding-bottom:3px;">Material</td>
                          <td align="right" style="color:black;padding-top:3px;padding-bottom:3px;"><?php echo "-"; ?></td>
                        </tr>
                        <tr>
                          <td style="color:black;padding-top:3px;padding-bottom:3px;">Bibit</td>
                          <td align="right" style="color:black;padding-top:3px;padding-bottom:3px;"><?php echo "-"; ?></td>
                        </tr>
                      </tbody>
                      <tfoot>
                        <tr>
                          <td style="color:black;padding-top:3px;padding-bottom:3px;"><b>Total</b></td>
                          <td align="right" style="color:black;padding-top:3px;padding-bottom:3px;"><b><?php echo "-"; ?></b></td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>

                  <div class="row">
                    <div class="col-md-7">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th colspan="2">
                              Std. Total Cost (Rp/Ha)
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td style="color:black;padding-top:3px;padding-bottom:3px;">Labour</td>
                            <td align="right" style="color:black;padding-top:3px;padding-bottom:3px;"><?php echo "-"; ?></td>
                          </tr>
                          <tr>
                            <td style="color:black;padding-top:3px;padding-bottom:3px;">Charge</td>
                            <td align="right" style="color:black;padding-top:3px;padding-bottom:3px;"><?php echo "-"; ?></td>
                          </tr>
                          <tr>
                            <td style="color:black;padding-top:3px;padding-bottom:3px;">Material</td>
                            <td align="right" style="color:black;padding-top:3px;padding-bottom:3px;"><?php echo "-"; ?></td>
                          </tr>
                          <tr>
                            <td style="color:black;padding-top:3px;padding-bottom:3px;">Bibit</td>
                            <td align="right" style="color:black;padding-top:3px;padding-bottom:3px;"><?php echo "-"; ?></td>
                          </tr>
                        </tbody>
                        <tfoot>
                          <tr>
                            <td style="color:black;padding-top:3px;padding-bottom:3px;"><b>Total</b></td>
                            <td align="right" style="color:black;padding-top:3px;padding-bottom:3px;"><b><?php echo "-"; ?></b></td>
                          </tr>
                        </tfoot>
                      </table>
                    </div>

                    <div class="col-md-5">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th colspan="2">
                              Std. Total Cost (Rp/Kg)
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td style="color:black;padding-top:3px;padding-bottom:3px;">Labour</td>
                            <td align="right" style="color:black;padding-top:3px;padding-bottom:3px;"><?php echo "-"; ?></td>
                          </tr>
                          <tr>
                            <td style="color:black;padding-top:3px;padding-bottom:3px;">Charge</td>
                            <td align="right" style="color:black;padding-top:3px;padding-bottom:3px;"><?php echo "-"; ?></td>
                          </tr>
                          <tr>
                            <td style="color:black;padding-top:3px;padding-bottom:3px;">Material</td>
                            <td align="right" style="color:black;padding-top:3px;padding-bottom:3px;"><?php echo "-"; ?></td>
                          </tr>
                          <tr>
                            <td style="color:black;padding-top:3px;padding-bottom:3px;">Bibit</td>
                            <td align="right" style="color:black;padding-top:3px;padding-bottom:3px;"><?php echo "-"; ?></td>
                          </tr>
                        </tbody>
                        <tfoot>
                          <tr>
                            <td style="color:black;padding-top:3px;padding-bottom:3px;"><b>Total</b></td>
                            <td align="right" style="color:black;padding-top:3px;padding-bottom:3px;"><b><?php echo "-"; ?></b></td>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>

                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="div-leptop" id='show_infomasi'>
          <div class="col-md-2">
            <div id='profile' class="panel panel-default" style="height: 350px;">
              <div class="panel-heading">
                <div class="panel-title-box">
                  <h3>Profile <?php echo $wilayah['nama']; ?></h3>
                </div>
              </div>
              <div class="panel-body padding" align="center">
                <b>
                  KEPALA WILAYAH<br /><?php echo $wilayah['kepala_wilayah']; ?><br /><br />
                  KASIE KEBUN 1<br /><?php echo $wilayah['kasie_kebun1']; ?><br /><br />
                  KASIE KEBUN 2<br /><?php echo $wilayah['kasie_kebun2']; ?><br /><br />
                  KASIE KEBUN 3<br /><?php echo $wilayah['kasie_kebun3']; ?><br /><br />
                </b>
                <select class="form-control select" name="select_pg" id="select_pg" onchange="javascript:pindah_pg();">
<?php
  foreach($pg_all as $pga){
    if($pga->code == $wilayah['plantation_group']){
?>
                  <option value="<?php echo $pga->code; ?>" selected><?php echo $pga->nama; ?></option>
<?php
    }
    else{
?>
                  <option value="<?php echo $pga->code; ?>"><?php echo $pga->nama; ?></option>
<?php
    }
  }
?>
                </select>
                <select class="form-control select" name="select_wilayah" id="select_wilayah" onchange="javascript:pindah_wilayah();">
                  <option value="0">Semua Wilayah</option>
<?php
  foreach($wilayah_all as $w){
    if($w->code == $wilayah['code']){
?>
                  <option value="<?php echo $w->code; ?>" selected><?php echo $w->nama; ?></option>
<?php
    }
    else{
?>
                  <option value="<?php echo $w->code; ?>"><?php echo $w->nama; ?></option>
<?php
    }
  }
?>
                </select>
                <select class="form-control select" name="select_lokasi" id="select_lokasi" onchange="javascript:pindah_lokasi();">
                  <option value="0">Semua Lokasi</option>
<?php
  foreach($lokasi_all as $l){
?>
                <option value="<?php echo $l->lokasi_aktif; ?>"><?php echo $l->lokasi_aktif; ?></option>
<?php
  }
?>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-4" align="center">
            <div class="panel panel-default">
              <div class="panel-heading">
                <div class="panel-title-box">
                  <h3>Produksi</h3>
                </div>
              </div>
              <div class="panel-body padding">
                <div class="row">
                  <div class="col-md-6">
                    <div class="widget widget-info">
                        <div class="widget-title">Luas Panen</div>
                        <br />
                        <br />
                        <!--<div class="widget-tiny-int"><b><?php echo round($luas_panen_nsfc, 2); ?> Ha (PC)</b></div>
                        <div class="widget-tiny-int"><b><?php echo round($luas_panen_nssc, 2); ?> Ha (RC)</b></div>-->
                        <div class="widget-tiny-int"><b><?php echo round($luas_tonase['NSFC']['luas'], 2); ?> Ha (PC)</b></div>
                        <div class="widget-tiny-int"><b><?php echo round($luas_tonase['NSSC']['luas'], 2); ?> Ha (RC)</b></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="widget widget-info">
                        <div class="widget-title">Produksi Tonasi</div>
                        <br />
                        <br />
                        <!--<div class="widget-tiny-int"><b><?php echo angka_ribuan($tonase_nsfc); ?> Ton (PC)</b></div>
                        <div class="widget-tiny-int"><b><?php echo angka_ribuan($tonase_nssc); ?> Ton (RC)</b></div>-->
                        <div class="widget-tiny-int"><b><?php echo angka_ribuan($luas_tonase['NSFC']['tonase']); ?> Ton (PC)</b></div>
                        <div class="widget-tiny-int"><b><?php echo angka_ribuan($luas_tonase['NSSC']['tonase']); ?> Ton (RC)</b></div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="widget widget-info">
                        <div class="widget-title">Yield</div>
                        <br />
                        <br />
                        <div class="widget-tiny-int"><b><?php if($luas_tonase['NSFC']['luas'] != 0) echo round($luas_tonase['NSFC']['tonase'] / $luas_tonase['NSFC']['luas'], 2); else echo 0; ?> Ton/Ha (PC)</b></div>
                        <div class="widget-tiny-int"><b><?php if($luas_tonase['NSSC']['luas'] != 0) echo round($luas_tonase['NSSC']['tonase'] / $luas_tonase['NSSC']['luas'], 2); else echo 0; ?> Ton/Ha (RC)</b></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="widget widget-info">
                        <div class="widget-title">Avg. Populasi Panen</div>
                        <br />
                        <br />
                        <div class="widget-int"><?php echo angka_ribuan($populasi_tanam['populasi_tanam']); ?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="panel panel-default tabs">
            <ul class="nav nav-tabs" role="tablist">
<?php
  if(isset($status) && isset($bulan) && isset($tahun) && isset($charge)){
    $active_tab1 = '';
    $active_tab3 = 'active';
  }
  else{
    $active_tab1 = 'active';
    $active_tab3 = '';
  }
?>
              <li class="<?php echo $active_tab1; ?>"><a href="#tab-first" role="tab" data-toggle="tab">Summary 1</a></li>
              <li><a href="#tab-second" role="tab" data-toggle="tab">Summary 2</a></li>
              <li class="<?php echo $active_tab3; ?>"><a href="#tab-third" role="tab" data-toggle="tab">Raport</a></li>
            </ul>
            <div class="panel-body tab-content">
              <div class="tab-pane <?php echo $active_tab1; ?>" id="tab-first">

                <div class="row">
                  <div class="col-md-4">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <div class="panel-title-box">
                          <h3>Performance</h3>
                          <span><?php echo $wilayah['code']; ?></span>
                        </div>
                        <ul class="panel-controls" style="margin-top: 2px;">
                          <select class="form-control select" name="select_satuan" id="select_satuan" onchange="sort_performance()">
                            <option value="1">Rp/Ha</option>
                            <option value="2">Rp/Kg</option>
                          </select>
                        </ul>
                      </div>
                      <div class="panel-body padding">
                        <div class="chart-holder" style="height: 200px;">
                          <div id="pie_total_ha">
                            <canvas id="diagram_performance_ha" height="280px"></canvas>
<?php
  $total_performance = $performance['Total'];
  $excellent_rp_per_ha = round(($performance['Excellent_rp_per_ha'] / $total_performance) * 100, 2);
  $good_rp_per_ha = round(($performance['Good_rp_per_ha'] / $total_performance) * 100, 2);
  $poor_rp_per_ha = round(($performance['Poor_rp_per_ha'] / $total_performance) * 100, 2);
  $performance_rp_per_ha = $excellent_rp_per_ha.', '.$good_rp_per_ha.', '.$poor_rp_per_ha;
?>
<script>
  var config_performance_ha = {
    type: 'pie',
    data: {
      datasets: [{
        data: [
          <?php echo $performance_rp_per_ha; ?>
        ],
        backgroundColor: [
          '#00FF00',
          '#FFA500',
          '#FF0000',
        ],
        label: 'Cost and Production'
      }],
      labels: [
        'Excellent',
        'Good',
        'Poor',
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
                          <div id="pie_total_kg">
                            <canvas id="diagram_performance_kg" height="280px"></canvas>
<?php
  $excellent_rp_per_kg = round(($performance['Excellent_rp_per_kg'] / $total_performance) * 100, 2);
  $good_rp_per_kg = round(($performance['Good_rp_per_kg'] / $total_performance) * 100, 2);
  $poor_rp_per_kg = round(($performance['Poor_rp_per_kg'] / $total_performance) * 100, 2);
  $performance_rp_per_kg = $excellent_rp_per_kg.', '.$good_rp_per_kg.', '.$poor_rp_per_kg;
?>
<script>
  var config_performance_kg = {
    type: 'pie',
    data: {
      datasets: [{
        data: [
          <?php echo $performance_rp_per_kg; ?>
        ],
        backgroundColor: [
          '#00FF00',
          '#FFA500',
          '#FF0000',
        ],
        label: 'Cost and Production'
      }],
      labels: [
        'Excellent',
        'Good',
        'Poor',
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
                  </div>

                  <div class="row">
                    <div class="col-md-4">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <div class="panel-title-box">
                            <h3>Proporsi Luas Panen</h3>
                          </div>
                        </div>
                        <div class="panel-body padding">
                          <div class="chart-holder" style="height: 200px;">
                            <canvas id="diagram_proporsi_luas" height="280px"></canvas>
<?php
  $luas_nsfc = round($proporsi_luas['NSFC']['luas'] * 100);
  $luas_nssc = round($proporsi_luas['NSSC']['luas'] * 100);
  $proporsi_luas_panen = $luas_nsfc.', '.$luas_nssc;
?>
<script>
  var config_proporsi_luas = {
    type: 'pie',
    data: {
      datasets: [{
        data: [
          <?php echo $proporsi_luas_panen; ?>
        ],
        backgroundColor: [
          '#0000CD',
          '#8B4513',
        ],
        label: 'Cost and Production'
      }],
      labels: [
        'NSFC',
        'NSSC',
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

                    <div class="col-md-4">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <div class="panel-title-box">
                            <h3>Kondisi Drainase</h3>
                          </div>
                        </div>
                        <div class="panel-body padding">
                          <div class="chart-holder" style="height: 200px;">
                            <canvas id="diagram_kondisi_drainase" height="280px"></canvas>
<?php
  $kondisi_berat = round($kondisi_drainase['berat']['jumlah'] * 100);
  $kondisi_sedang = round($kondisi_drainase['sedang']['jumlah'] * 100);
  $kondisi_ringan = round($kondisi_drainase['ringan']['jumlah'] * 100);
  $kondisi_drainase = $kondisi_berat.', '.$kondisi_sedang.', '.$kondisi_ringan;
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
          '#4169E1',
          '#FF8C00',
          '#228B22',
        ],
        label: 'Cost and Production'
      }],
      labels: [
        'Berat',
        'Sedang',
        'Ringan',
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

                    <div class="col-md-4">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <div class="panel-title-box">
                            <h3>Std Prediksi Biaya</h3>
                          </div>
                        </div>
                        <div class="panel-body padding">
                          <div class="chart-holder" style="height: 125px;">
                            <div class="row">
                              <div class="col-md-12">
                                <b><?php echo date('Y', strtotime($konstanta['nilai'])); ?></b>
                              </div>
                              <div class="col-md-12" align="right">
                                <?php echo angka_ribuan($std_prediksi_biaya['T0']['total'])." Rp/Ha"; ?><br />
                                <?php echo angka_ribuan(($std_prediksi_biaya['T0']['total'] * $luas_panen) / $tonase / 1000)." Rp/Kg"; ?>
                              </div>
                            </div>
                            <br />
                            <div class="row">
                              <div class="col-md-12">
                                <b><?php echo date('Y', strtotime($konstanta['nilai'])) + 1; ?></b>
                              </div>
                              <div class="col-md-12" align="right">
                                <?php echo angka_ribuan($std_prediksi_biaya['T1']['total'])." Rp/Ha"; ?><br />
                                <?php echo angka_ribuan(($std_prediksi_biaya['T0']['total'] * $luas_panen) / $tonase / 1000)." Rp/Kg"; ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="panel panel-default">
                        <div class="panel-heading">
                          <div class="panel-title-box">
                            <h3>Prediksi Biaya</h3>
                          </div>
                        </div>
                        <div class="panel-body padding">
                          <div class="chart-holder" style="height: 125px;">
                            <div class="row">
                              <div class="col-md-12">
                                <b><?php echo date('Y', strtotime($konstanta['nilai'])); ?></b>
                              </div>
                              <div class="col-md-12" align="right">
                                <?php echo "<div id='show_total_cost_ha1'></div>"; ?>
                                <?php echo "<div id='show_total_cost_kg1'></div>"; ?>
                              </div>
                            </div>
                            <br />
                            <div class="row">
                              <div class="col-md-12">
                                <b><?php echo date('Y', strtotime($konstanta['nilai'])) + 1; ?></b>
                              </div>
                              <div class="col-md-12" align="right">
                                <?php echo "Rp/Ha"; ?><br />
                                <?php echo "Rp/Kg"; ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="tab-pane" id="tab-second">
                <div class="row">
                  <div class="col-md-12">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <div class="panel-title-box">
                          <h3>Real Cost per Umur (Rp/Ha)</h3>
                        </div>
                        <ul class="panel-controls" style="margin-top: 2px;">
                          <select class="form-control select" name="select_cost" id="select_cost" onchange="sort_cost()">
                            <option value="NSFC">NSFC</option>
                            <option value="NSSC">NSSC</option>
                          </select>
                        </ul>
                      </div>
                      <div class="panel-body padding">
                        <div class="chart-holder" style="height: 200px;">
                          <div id="combined_cost_nsfc">
                            <canvas id="diagram_biaya_umur_nsfc" height="80px"></canvas>
<?php
  $bu_real_nsfc = '';
  $bu_std_nsfc = '';
  foreach ($biaya_umur['NSFC'] as $bu) {
    if($bu->umur == '1'){
      $bu_real_nsfc = (round($bu->biaya_realisasi));
    }
    else{
      $bu_real_nsfc .= ', '.(round($bu->biaya_realisasi));
    }
  }

  foreach($std_biaya_umur['NSFC'] as $sbu) {
    if($sbu->umur == '1'){
      $bu_std_nsfc .= round($sbu->biaya);
    }
    else if($sbu->umur == '>20'){
      $bu_std_nsfc .= ', '.(round($sbu->biaya));
    }
    else{
      $bu_std_nsfc .= ', '.(round($sbu->biaya));
    }
  }
?>
<script>
	var config_biaya_umur_nsfc = {
    type: 'bar',
    data: {
  		labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '>20'],
  		datasets: [{
  			type: 'line',
  			label: 'Std Biaya',
  			borderColor: '#FF0000',
        backgroundColor : '#FF0000',
  			borderWidth: 2,
				pointRadius: 3,
  			fill: false,
  			data: [
          <?php echo $bu_std_nsfc; ?>
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
          <?php echo $bu_real_nsfc; ?>
  			]
  		}]
    },
    options: {
      responsive: true,
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
			elements: {
				line: {
					tension: 0.000001
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
						max: 150000000,
		        stepSize: 50000000,
            callback: function(label, index, labels) {
              return label / 1000000 + ' M';
            }
					},
          scaleLabel: {
              display: true,
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
                          <div id="combined_cost_nssc">
                            <canvas id="diagram_biaya_umur_nssc" height="80px"></canvas>
<?php
  $bu_real_nssc = '';
  $bu_std_nssc = '';
  foreach ($biaya_umur['NSSC'] as $bu) {
    if($bu->umur == '1'){
      $bu_real_nssc = (round($bu->biaya_realisasi));
    }
    else{
      $bu_real_nssc .= ', '.(round($bu->biaya_realisasi));
    }
  }

  foreach($std_biaya_umur['NSSC'] as $sbu) {
    if($sbu->umur == '1'){
      $bu_std_nssc .= round($sbu->biaya);
    }
    else if($sbu->umur == '>20'){
      $bu_std_nssc .= ', '.(round($sbu->biaya));
    }
    else{
      $bu_std_nssc .= ', '.(round($sbu->biaya));
    }
  }
?>
<script>
	var config_biaya_umur_nssc = {
    type: 'bar',
    data: {
  		labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '>20'],
  		datasets: [{
  			type: 'line',
  			label: 'Std Biaya',
  			borderColor: '#FF0000',
        backgroundColor : '#FF0000',
  			borderWidth: 2,
				pointRadius: 3,
  			fill: false,
  			data: [
          <?php echo $bu_std_nssc; ?>
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
          <?php echo $bu_real_nssc; ?>
  			]
  		}]
    },
    options: {
      responsive: true,
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
			elements: {
				line: {
					tension: 0.000001
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
						max: 40000000,
		        stepSize: 10000000,
            callback: function(label, index, labels) {
              return label / 1000000 + ' M';
            }
					},
          scaleLabel: {
              display: true,
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
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <div class="panel-title-box">
                          <h3>Average Unsur per Umur (Kg/Ton)</h3>
                        </div>
                        <ul class="panel-controls" style="margin-top: 2px;">
                          <select class="form-control select" name="select_unsur" id="select_unsur" onchange="sort_unsur()">
                            <option value="NSFC">NSFC</option>
                            <option value="NSSC">NSSC</option>
                          </select>
                        </ul>
                      </div>
                      <div class="panel-body padding">
                        <div class="chart-holder" style="height: 200px;">
                          <div id="combined_unsur_nsfc">
                            <canvas id="diagram_unsur_umur_nsfc" height="80px"></canvas>
<?php
  $n_unsur_nsfc = (round($unsur_umur['NSFC']['N']['5']['jumlah'], 2));
  $n_unsur_nsfc .= ', '.(round($unsur_umur['NSFC']['N']['8']['jumlah'], 2));
  $n_unsur_nsfc .= ', '.(round($unsur_umur['NSFC']['N']['12']['jumlah'], 2));
  $n_unsur_nsfc .= ', '.(round($unsur_umur['NSFC']['N']['19']['jumlah'], 2));
  $n_unsur_nsfc .= ', '.(round($unsur_umur['NSFC']['N']['>20']['jumlah'], 2));
  $p_unsur_nsfc = (round($unsur_umur['NSFC']['P']['5']['jumlah'], 2));
  $p_unsur_nsfc .= ', '.(round($unsur_umur['NSFC']['P']['8']['jumlah'], 2));
  $p_unsur_nsfc .= ', '.(round($unsur_umur['NSFC']['P']['12']['jumlah'], 2));
  $p_unsur_nsfc .= ', '.(round($unsur_umur['NSFC']['P']['19']['jumlah'], 2));
  $p_unsur_nsfc .= ', '.(round($unsur_umur['NSFC']['P']['>20']['jumlah'], 2));
  $k_unsur_nsfc = (round($unsur_umur['NSFC']['K']['5']['jumlah'], 2));
  $k_unsur_nsfc .= ', '.(round($unsur_umur['NSFC']['K']['8']['jumlah'], 2));
  $k_unsur_nsfc .= ', '.(round($unsur_umur['NSFC']['K']['12']['jumlah'], 2));
  $k_unsur_nsfc .= ', '.(round($unsur_umur['NSFC']['K']['19']['jumlah'], 2));
  $k_unsur_nsfc .= ', '.(round($unsur_umur['NSFC']['K']['>20']['jumlah'], 2));
  $mg_unsur_nsfc = (round($unsur_umur['NSFC']['MG']['5']['jumlah'], 2));
  $mg_unsur_nsfc .= ', '.(round($unsur_umur['NSFC']['MG']['8']['jumlah'], 2));
  $mg_unsur_nsfc .= ', '.(round($unsur_umur['NSFC']['MG']['12']['jumlah'], 2));
  $mg_unsur_nsfc .= ', '.(round($unsur_umur['NSFC']['MG']['19']['jumlah'], 2));
  $mg_unsur_nsfc .= ', '.(round($unsur_umur['NSFC']['MG']['>20']['jumlah'], 2));
  $n_std_nsfc = '';
  $p_std_nsfc = '';
  $k_std_nsfc = '';
  $mg_std_nsfc = '';
  foreach($std_unsur_umur['NSFC'] as $suu) {
    if($suu->umur == '5'){
      $n_std_nsfc .= round($suu->N, 2);
      $p_std_nsfc .= round($suu->P, 2);
      $k_std_nsfc .= round($suu->K, 2);
      $mg_std_nsfc .= round($suu->MG, 2);
    }
    else{
      $n_std_nsfc .= ', '.(round($suu->N, 2));
      $p_std_nsfc .= ', '.(round($suu->P, 2));
      $k_std_nsfc .= ', '.(round($suu->K, 2));
      $mg_std_nsfc .= ', '.(round($suu->MG, 2));
    }
  }
?>
<script>
var config_unsur_umur_nsfc = {
  type: 'bar',
  data: {
    labels: ['5', '8', '12', '19', '>20'],
    datasets: [{
      type: 'line',
      label: 'Std N',
      borderColor: '#7FFF00',
      backgroundColor : '#7FFF00',
      borderWidth: 3,
      pointRadius: 0,
      fill: false,
      data: [
        <?php echo $n_std_nsfc; ?>
      ]
    }, {
      type: 'line',
      label: 'Std P',
      borderColor: '#00CED1',
      backgroundColor : '#00CED1',
      borderWidth: 3,
      pointRadius: 0,
      fill: false,
      data: [
        <?php echo $p_std_nsfc; ?>
      ]
    }, {
      type: 'line',
      label: 'Std K',
      borderColor: '#FFA500',
      backgroundColor : '#FFA500',
      borderWidth: 3,
      pointRadius: 0,
      fill: false,
      data: [
        <?php echo $k_std_nsfc; ?>
      ]
    }, {
      type: 'line',
      label: 'Std Mg',
      borderColor: '#D2691E',
      backgroundColor : '#D2691E',
      borderWidth: 3,
      pointRadius: 0,
      fill: false,
      data: [
        <?php echo $mg_std_nsfc; ?>
      ]
    }, {
      type: 'bar',
      label: 'Unsur N',
      borderColor: '#228B22',
      backgroundColor : '#228B22',
      data: [
        <?php echo $n_unsur_nsfc; ?>
      ]
    }, {
      type: 'bar',
      label: 'Unsur P',
      borderColor: '#20B2AA',
      backgroundColor : '#20B2AA',
      data: [
        <?php echo $p_unsur_nsfc; ?>
      ]
    }, {
      type: 'bar',
      label: 'Unsur K',
      borderColor: '#C18100',
      backgroundColor : '#C18100',
      data: [
        <?php echo $k_unsur_nsfc; ?>
      ]
    }, {
      type: 'bar',
      label: 'Unsur MG',
      borderColor: '#A95616',
      backgroundColor : '#A95616',
      data: [
        <?php echo $mg_unsur_nsfc; ?>
      ]
    }]
  },
  options: {
    responsive: true,
    title: {
      display: false,
      text: 'Biaya per Umur'
    },
    legend: {
      position: 'top',
      labels: {
        usePointStyle: true,
      }
    },
    tooltips: {
      mode: 'index',
      intersect: false,
      callbacks: {
        label: function(tooltipItem, data) {
          var label = data.datasets[tooltipItem.datasetIndex].label;
          var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
          switch (label) {
            case 'Unsur N':
            case 'Unsur P':
            case 'Unsur K':
            case 'Unsur MG':
              return label + ' : ' + val;
              break;
            default:
              return false;
          }
        }
      }
    },
    elements: {
      line: {
        tension: 0.000001
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
          max: 15,
          stepSize: 3
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
                          <div id="combined_unsur_nssc">
                            <canvas id="diagram_unsur_umur_nssc" height="80px"></canvas>
<?php
  $n_unsur_nssc = (round($unsur_umur['NSSC']['N']['5']['jumlah'], 2));
  $n_unsur_nssc .= ', '.(round($unsur_umur['NSSC']['N']['8']['jumlah'], 2));
  $n_unsur_nssc .= ', '.(round($unsur_umur['NSSC']['N']['12']['jumlah'], 2));
  $n_unsur_nssc .= ', '.(round($unsur_umur['NSSC']['N']['19']['jumlah'], 2));
  $n_unsur_nssc .= ', '.(round($unsur_umur['NSSC']['N']['>20']['jumlah'], 2));
  $p_unsur_nssc = (round($unsur_umur['NSSC']['P']['5']['jumlah'], 2));
  $p_unsur_nssc .= ', '.(round($unsur_umur['NSSC']['P']['8']['jumlah'], 2));
  $p_unsur_nssc .= ', '.(round($unsur_umur['NSSC']['P']['12']['jumlah'], 2));
  $p_unsur_nssc .= ', '.(round($unsur_umur['NSSC']['P']['19']['jumlah'], 2));
  $p_unsur_nssc .= ', '.(round($unsur_umur['NSSC']['P']['>20']['jumlah'], 2));
  $k_unsur_nssc = (round($unsur_umur['NSSC']['K']['5']['jumlah'], 2));
  $k_unsur_nssc .= ', '.(round($unsur_umur['NSSC']['K']['8']['jumlah'], 2));
  $k_unsur_nssc .= ', '.(round($unsur_umur['NSSC']['K']['12']['jumlah'], 2));
  $k_unsur_nssc .= ', '.(round($unsur_umur['NSSC']['K']['19']['jumlah'], 2));
  $k_unsur_nssc .= ', '.(round($unsur_umur['NSSC']['K']['>20']['jumlah'], 2));
  $mg_unsur_nssc = (round($unsur_umur['NSSC']['MG']['5']['jumlah'], 2));
  $mg_unsur_nssc .= ', '.(round($unsur_umur['NSSC']['MG']['8']['jumlah'], 2));
  $mg_unsur_nssc .= ', '.(round($unsur_umur['NSSC']['MG']['12']['jumlah'], 2));
  $mg_unsur_nssc .= ', '.(round($unsur_umur['NSSC']['MG']['19']['jumlah'], 2));
  $mg_unsur_nssc .= ', '.(round($unsur_umur['NSSC']['MG']['>20']['jumlah'], 2));
  $n_std_nssc = '';
  $p_std_nssc = '';
  $k_std_nssc = '';
  $mg_std_nssc = '';
  foreach($std_unsur_umur['NSSC'] as $suu) {
    if($suu->umur == '5'){
      $n_std_nssc .= round($suu->N, 2);
      $p_std_nssc .= round($suu->P, 2);
      $k_std_nssc .= round($suu->K, 2);
      $mg_std_nssc .= round($suu->MG, 2);
    }
    else{
      $n_std_nssc .= ', '.(round($suu->N, 2));
      $p_std_nssc .= ', '.(round($suu->P, 2));
      $k_std_nssc .= ', '.(round($suu->K, 2));
      $mg_std_nssc .= ', '.(round($suu->MG, 2));
    }
  }
?>
<script>
var config_unsur_umur_nssc = {
  type: 'bar',
  data: {
    labels: ['5', '8', '12', '19', '>20'],
    datasets: [{
      type: 'line',
      label: 'Std N',
      borderColor: '#7FFF00',
      backgroundColor : '#7FFF00',
      borderWidth: 3,
      pointRadius: 0,
      fill: false,
      data: [
        <?php echo $n_std_nssc; ?>
      ]
    }, {
      type: 'line',
      label: 'Std P',
      borderColor: '#00CED1',
      backgroundColor : '#00CED1',
      borderWidth: 3,
      pointRadius: 0,
      fill: false,
      data: [
        <?php echo $p_std_nssc; ?>
      ]
    }, {
      type: 'line',
      label: 'Std K',
      borderColor: '#FFA500',
      backgroundColor : '#FFA500',
      borderWidth: 3,
      pointRadius: 0,
      fill: false,
      data: [
        <?php echo $k_std_nssc; ?>
      ]
    }, {
      type: 'line',
      label: 'Std Mg',
      borderColor: '#D2691E',
      backgroundColor : '#D2691E',
      borderWidth: 3,
      pointRadius: 0,
      fill: false,
      data: [
        <?php echo $mg_std_nssc; ?>
      ]
    }, {
      type: 'bar',
      label: 'Unsur N',
      borderColor: '#228B22',
      backgroundColor : '#228B22',
      data: [
        <?php echo $n_unsur_nssc; ?>
      ]
    }, {
      type: 'bar',
      label: 'Unsur P',
      borderColor: '#20B2AA',
      backgroundColor : '#20B2AA',
      data: [
        <?php echo $p_unsur_nssc; ?>
      ]
    }, {
      type: 'bar',
      label: 'Unsur K',
      borderColor: '#C18100',
      backgroundColor : '#C18100',
      data: [
        <?php echo $k_unsur_nssc; ?>
      ]
    }, {
      type: 'bar',
      label: 'Unsur MG',
      borderColor: '#A95616',
      backgroundColor : '#A95616',
      data: [
        <?php echo $mg_unsur_nssc; ?>
      ]
    }]
  },
  options: {
    responsive: true,
    legend: {
      position: 'top',
      labels: {
        usePointStyle: true,
      }
    },
    tooltips: {
      mode: 'index',
      intersect: false,
      callbacks: {
        label: function(tooltipItem, data) {
          var label = data.datasets[tooltipItem.datasetIndex].label;
          var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
          switch (label) {
            case 'Unsur N':
            case 'Unsur P':
            case 'Unsur K':
            case 'Unsur MG':
              return label + ' : ' + val;
              break;
            default:
              return false;
          }
        }
      }
    },
    title: {
      display: false,
      text: 'Biaya per Umur'
    },
    elements: {
      line: {
        tension: 0.000001
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
          max: 9,
          stepSize: 1.5
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
                </div>
              </div>

              <div class="tab-pane <?php echo $active_tab3; ?>" id="tab-third">
                <div class="row">
                  <div class="col-md-10">
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Element Cost</th>
                            <th>BPP (Rp/Ha)</th>
                            <th>Real (Rp/Ha)</th>
                            <th>R + F (Rp/Ha)</th>
                            <th>R + F (Rp/Kg)</th>
                          </tr>
                        </thead>
                        <tbody>
<?php
  $total_NS = 0;
  $total_NSFC = 0;
  $total_NSSC = 0;
  $total_real_NS = 0;
  $total_real_NSFC = 0;
  $total_real_NSSC = 0;
  $total_rf_ha_NS = 0;
  $total_rf_ha_NSFC = 0;
  $total_rf_ha_NSSC = 0;
  $total_rf_kg_NS = 0;
  $total_rf_kg_NSFC = 0;
  $total_rf_kg_NSSC = 0;

  //Forecast ZN10
  $forecast_ZN10_NS = 0;
  $forecast_ZN10_NSFC = 0;
  $forecast_ZN10_NSSC = 0;
  foreach ($element_cost_ZN10[$wil.'1'] as $zn10) {
    if($zn10->status == 'NSFC'){
      $forecast_ZN10_NSFC += $zn10->ZN10 + $zn10->ZN10_actual;
    }
    else{
      $forecast_ZN10_NSSC += $zn10->ZN10 + $zn10->ZN10_actual;
    }
    $forecast_ZN10_NS += $zn10->ZN10 + $zn10->ZN10_actual;
  }
  foreach ($element_cost_ZN10[$wil.'2'] as $zn10) {
    if($zn10->status == 'NSFC'){
      $forecast_ZN10_NSFC += $zn10->ZN10 + $zn10->ZN10_actual;
    }
    else{
      $forecast_ZN10_NSSC += $zn10->ZN10 + $zn10->ZN10_actual;
    }
    $forecast_ZN10_NS += $zn10->ZN10 + $zn10->ZN10_actual;
  }
  foreach ($element_cost_ZN10[$wil.'3'] as $zn10) {
    if($zn10->status == 'NSFC'){
      $forecast_ZN10_NSFC += $zn10->ZN10 + $zn10->ZN10_actual;
    }
    else{
      $forecast_ZN10_NSSC += $zn10->ZN10 + $zn10->ZN10_actual;
    }
    $forecast_ZN10_NS += $zn10->ZN10 + $zn10->ZN10_actual;
  }

  //echo "<pre>";
  //echo $forecast_ZN10_NSSC;
  //echo "</pre>";
  //die();

  //Forecast ZN08
  $forecast_ZN08_NS = 0;
  $forecast_ZN08_NSFC = 0;
  $forecast_ZN08_NSSC = 0;
  foreach ($element_cost_ZN08[$wil.'1'] as $zn08) {
    if($zn08->status == 'NSFC'){
      $forecast_ZN08_NSFC += $zn08->ZN08;
    }
    else{
      $forecast_ZN08_NSSC += $zn08->ZN08;
    }
    $forecast_ZN08_NS += $zn08->ZN08;
  }
  foreach ($element_cost_ZN08[$wil.'2'] as $zn08) {
    if($zn08->status == 'NSFC'){
      $forecast_ZN08_NSFC += $zn08->ZN08;
    }
    else{
      $forecast_ZN08_NSSC += $zn08->ZN08;
    }
    $forecast_ZN08_NS += $zn08->ZN08;
  }
  foreach ($element_cost_ZN08[$wil.'3'] as $zn08) {
    if($zn08->status == 'NSFC'){
      $forecast_ZN08_NSFC += $zn08->ZN08;
    }
    else{
      $forecast_ZN08_NSSC += $zn08->ZN08;
    }
    $forecast_ZN08_NS += $zn08->ZN08;
  }

  foreach($element_cost as $ec){
    //Total BPP
    $total_NS += $ec->NS_ha;
    $total_NSFC += $ec->NSFC_ha;
    $total_NSSC += $ec->NSSC_ha;

    //Total Real
    $total_real_NS += ($real_ns[$ec->code] + $hpp['total'][$ec->code]) / $luas_produksi_ns;
    $total_real_NSFC += ($real_nsfc[$ec->code] + $hpp['NSFC'][$ec->code]) / $luas_produksi_nsfc;
    $total_real_NSSC += ($real_nssc[$ec->code] + $hpp['NSSC'][$ec->code]) / $luas_produksi_nssc;

    if($ec->code == 'ZN10'){
      $ec_forecast_NS = $forecast_ZN10_NS;
      $ec_forecast_NSFC = $forecast_ZN10_NSFC;
      $ec_forecast_NSSC = $forecast_ZN10_NSSC;
    }
    else if($ec->code == 'ZN08'){
      $ec_forecast_NS = $forecast_ZN08_NS;
      $ec_forecast_NSFC = $forecast_ZN08_NSFC;
      $ec_forecast_NSSC = $forecast_ZN08_NSSC;
    }
    else{
      $ec_forecast_NS = $element_cost_f['total'][$ec->code] + $element_cost_f['total'][$ec->code.'_actual'];
      $ec_forecast_NSFC = $element_cost_f['NSFC'][$ec->code] + $element_cost_f['NSFC'][$ec->code.'_actual'];
      $ec_forecast_NSSC = $element_cost_f['NSSC'][$ec->code] + $element_cost_f['NSSC'][$ec->code.'_actual'];
    }
    //Total Real + Forecast (Rp/Ha)
    $total_rf_ha_NS += (($real_ns[$ec->code] + $hpp['total'][$ec->code] + $ec_forecast_NS + ($ec_forecast_NS)) / $luas_produksi_ns);
    $total_rf_ha_NSFC += (($real_nsfc[$ec->code] + $hpp['NSFC'][$ec->code] + $ec_forecast_NSFC + ($ec_forecast_NSFC)) / $luas_produksi_nsfc);
    $total_rf_ha_NSSC += (($real_nssc[$ec->code] + $hpp['NSSC'][$ec->code] + $ec_forecast_NSSC + ($ec_forecast_NSSC)) / $luas_produksi_nssc);

    //Total Real + Forecast (Rp/Kg)
    $total_rf_kg_NS += (($real_ns[$ec->code] + $hpp['total'][$ec->code] + $ec_forecast_NS + ($ec_forecast_NS)) / $tonase_produksi_ns / 1000);
    $total_rf_kg_NSFC += (($real_nsfc[$ec->code] + $hpp['NSFC'][$ec->code] + $ec_forecast_NSFC + ($ec_forecast_NSFC)) / $tonase_produksi_nsfc / 1000);
    $total_rf_kg_NSSC += (($real_nssc[$ec->code] + $hpp['NSSC'][$ec->code] + $ec_forecast_NSSC + ($ec_forecast_NSSC)) / $tonase_produksi_nssc / 1000);
?>
                          <tr>
                            <td><?php echo $ec->nama; ?></td>
                            <td align="right" class="NS"><?php if($ec->NS_ha == 0) echo "-"; else echo angka_ribuan($ec->NS_ha); ?></td>
                            <td align="right" class="NS">
<?php
  if(($real_ns[$ec->code] + $hpp['total'][$ec->code]) == 0)
    echo "-";
  else
    echo angka_ribuan(($real_ns[$ec->code] + $hpp['total'][$ec->code]) / $luas_produksi_ns);
?>
                            </td>
                            <td align="right" class="NS">
<?php
  if(($real_ns[$ec->code] + $hpp['total'][$ec->code] + $element_cost_f['total'][$ec->code]) == 0)
    echo "-";
  else
    echo angka_ribuan(($real_ns[$ec->code] + $hpp['total'][$ec->code] + $ec_forecast_NS + ($ec_forecast_NS)) / $luas_produksi_ns);
?>
                            </td>
                            <td align="right" class="NS">
<?php
  if(($real_ns[$ec->code] + $hpp['total'][$ec->code] + $element_cost_f['total'][$ec->code]) == 0)
    echo "-";
  else
    echo angka_ribuan(($real_ns[$ec->code] + $hpp['total'][$ec->code] + $ec_forecast_NS + ($ec_forecast_NS)) / $tonase_produksi_ns / 1000);
?>
                            </td>

                            <td align="right" class="NSFC"><?php if($ec->NSFC_ha == 0) echo "-"; else echo angka_ribuan($ec->NSFC_ha); ?></td>
                            <td align="right" class="NSFC">
<?php
if(($real_nsfc[$ec->code] + $hpp['NSFC'][$ec->code]) == 0)
  echo "-";
else
  echo angka_ribuan(($real_nsfc[$ec->code] + $hpp['NSFC'][$ec->code]) / $luas_produksi_nsfc);
?>
                            </td>
                            <td align="right" class="NSFC">
<?php
if(($real_nsfc[$ec->code] + $hpp['NSFC'][$ec->code] + $element_cost_f['NSFC'][$ec->code]) == 0)
  echo "-";
else
  echo angka_ribuan(($real_nsfc[$ec->code] + $hpp['NSFC'][$ec->code] + $ec_forecast_NSFC + ($ec_forecast_NSFC)) / $luas_produksi_nsfc);
?>
                            </td>
                            <td align="right" class="NSFC">
<?php
if(($real_nsfc[$ec->code] + $hpp['NSFC'][$ec->code] + $element_cost_f['NSFC'][$ec->code]) == 0)
  echo "-";
else
  echo angka_ribuan(($real_nsfc[$ec->code] + $hpp['NSFC'][$ec->code] + $ec_forecast_NSFC + ($ec_forecast_NSFC)) / $tonase_produksi_nsfc / 1000);
?>
                            </td>

                            <td align="right" class="NSSC"><?php if($ec->NSSC_ha == 0) echo "-"; else echo angka_ribuan($ec->NSSC_ha); ?></td>
                            <td align="right" class="NSSC">
<?php
  if(($real_nssc[$ec->code] + $hpp['NSSC'][$ec->code]) == 0)
    echo "-";
  else
    echo angka_ribuan(($real_nssc[$ec->code] + $hpp['NSSC'][$ec->code]) / $luas_produksi_nssc);
?>
                            </td>
                            <td align="right" class="NSSC">
<?php
  if(($real_nssc[$ec->code] + $hpp['NSSC'][$ec->code] + $element_cost_f['NSSC'][$ec->code]) == 0)
    echo "-";
  else
    echo angka_ribuan(($real_nssc[$ec->code] + $hpp['NSSC'][$ec->code] + $ec_forecast_NSSC + ($ec_forecast_NSSC)) / $luas_produksi_nssc);
?>
                            </td>
                            <td align="right" class="NSSC">
<?php
  if(($real_nssc[$ec->code] + $hpp['NSSC'][$ec->code] + $element_cost_f['NSSC'][$ec->code]) == 0)
    echo "-";
  else
    echo angka_ribuan(($real_nssc[$ec->code] + $hpp['NSSC'][$ec->code] + $ec_forecast_NSSC + ($ec_forecast_NSSC)) / $tonase_produksi_nssc / 1000);
?>
                            </td>
                          </tr>
<?php
  }
?>
                        </tbody>
                        <tfoot>
                          <tr>
                            <td><b>Total Direct Cost</b></td>
                            <td align="right" class="NS"><b><?php if($total_NS == 0) echo "-"; else echo angka_ribuan($total_NS); ?></b></td>
                            <td align="right" class="NS"><b><?php if($total_real_NS == 0) echo "-"; else echo angka_ribuan($total_real_NS); ?></b></td>
                            <td align="right" class="NS"><b><div id='total_cost_ha1'><?php if($total_rf_ha_NS == 0) echo "-"; else echo angka_ribuan($total_rf_ha_NS); ?></div></b></td>
                            <td align="right" class="NS"><b><div id='total_cost_kg1'><?php if($total_rf_kg_NS == 0) echo "-"; else echo angka_ribuan($total_rf_kg_NS); ?></div></b></td>

                            <td align="right" class="NSFC"><b><?php if($total_NSFC == 0) echo "-"; else echo angka_ribuan($total_NSFC); ?></b></td>
                            <td align="right" class="NSFC"><b><?php if($total_real_NSFC == 0) echo "-"; else echo angka_ribuan($total_real_NSFC); ?></b></td>
                            <td align="right" class="NSFC"><b><?php if($total_rf_ha_NSFC == 0) echo "-"; else echo angka_ribuan($total_rf_ha_NSFC); ?></b></td>
                            <td align="right" class="NSFC"><b><?php if($total_rf_kg_NSFC == 0) echo "-"; else echo angka_ribuan($total_rf_kg_NSFC); ?></b></td>

                            <td align="right" class="NSSC"><b><?php if($total_NSSC == 0) echo "-"; else echo angka_ribuan($total_NSSC); ?></b></td>
                            <td align="right" class="NSSC"><b><?php if($total_real_NSSC == 0) echo "-"; else echo angka_ribuan($total_real_NSSC); ?></b></td>
                            <td align="right" class="NSSC"><b><?php if($total_rf_ha_NSSC == 0) echo "-"; else echo angka_ribuan($total_rf_ha_NSSC); ?></b></td>
                            <td align="right" class="NSSC"><b><?php if($total_rf_kg_NSSC == 0) echo "-"; else echo angka_ribuan($total_rf_kg_NSSC); ?></b></td>
                          </tr>
                          <tr>
                            <td colspan="3" bgcolor="green"></td>
                            <td><b>Category</b></td>
                            <td><b><div id='peformance_category'></div></b></td>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                  </div>

                  <div class="col-md-2">
                    <div class="row">
                      <table class="table table-hover compact">
                        <thead>
                          <tr>
                            <th>Change Forecast</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <select class="form-control select" name="select_charge" id="select_charge" onchange="sort_raport()">
                                <option value="Real">Real</option>
                                <option value="Actual" selected>Actual</option>
                              </select>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <div class="row">
                      <table class="table table-hover compact">
                        <thead>
                          <tr>
                            <th>Tahun</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <select class="form-control select" name="select_tahun" id="select_tahun" onchange="sort_raport()">
                                <option value="T0"><?php echo date('Y', strtotime($konstanta['nilai'])); ?></option>
                                <option value="T1"><?php echo date('Y', strtotime($konstanta['nilai'])) + 1; ?></option>
                              </select>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <div class="row">
                      <table class="table table-hover compact">
                        <thead>
                          <tr>
                            <th>Month</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <select class="form-control select" name="select_bulan" id="select_bulan" onchange="sort_raport()">
                                <option value="Total">Total</option>
                                <option value="B1">1</option>
                                <option value="B2">2</option>
                                <option value="B3">3</option>
                                <option value="B4">4</option>
                                <option value="B5">5</option>
                                <option value="B6">6</option>
                                <option value="B7">7</option>
                                <option value="B8">8</option>
                                <option value="B9">9</option>
                                <option value="B10">10</option>
                                <option value="B11">11</option>
                                <option value="B12">12</option>
                              </select>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <div class="row">
                      <table class="table table-hover compact">
                        <thead>
                          <tr>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <select class="form-control select" name="select_status" id="select_status" onchange="sort_raport()">
                                <option value="NS">NS</option>
                                <option value="NSFC">NSFC</option>
                                <option value="NSSC">NSSC</option>
                              </select>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>

                    <div class="row">
                      <table class="table table-hover compact">
                        <thead>
                          <tr>
                            <th>Rank</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <select class="form-control select" name="select_min_max" id="select_min_max" onchange="sort_min_max()">
                                <option value="0">Cheapest</option>
                                <option value="1">Expensive</option>
                              </select>
                            </td>
                          </tr>
                          <tr class='Min' >
                            <td align="center"><?php echo 'Kbn 1 '.$rank[$wil.'1']['min']['lokasi']; ?></td>
                          </tr>
                          <tr class='Min'>
                            <td align="center"><?php echo 'Kbn 2 '.$rank[$wil.'2']['min']['lokasi']; ?></td>
                          </tr>
                          <tr class='Min'>
                            <td align="center"><?php echo 'Kbn 3 '.$rank[$wil.'3']['min']['lokasi']; ?></td>
                          </tr>
                          <tr class='Max'>
                            <td align="center"><?php echo 'Kbn 1 '.$rank[$wil.'1']['max']['lokasi']; ?></td>
                          </tr>
                          <tr class='Max'>
                            <td align="center"><?php echo 'Kbn 2 '.$rank[$wil.'2']['max']['lokasi']; ?></td>
                          </tr>
                          <tr class='Max'>
                            <td align="center"><?php echo 'Kbn 3 '.$rank[$wil.'3']['max']['lokasi']; ?></td>
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
      </div>

    </div>
  </div>
  <!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTENT -->

<script>
  $( document ).ready(function() {
    $("#pie_total_kg").hide();
    $("#bar_comparison_ha").hide();
    $("#bar_comparison_kg").hide();
    $("#combined_cost_nssc").hide();
    $("#combined_unsur_nssc").hide();

    //Prediksi Biaya
    $("#show_total_cost_ha1").html($("#total_cost_ha1").html() + ' Rp/Ha');
    $("#show_total_cost_kg1").html($("#total_cost_kg1").html() + ' Rp/Kg');

    //Resolusi Layar
    if(screen.width <= 450){
      $(".div-mobile").show();
      $(".div-leptop").hide();
      $("#profile").height('auto');
      $("#show_profile").html($("#show_infomasi").html());
    }
    else{
      $(".div-mobile").hide();
      $(".div-leptop").show();
      $("#show_profile").html("");
    }
  });

  //Tab 1
  function sort_performance(){
    if($("#select_satuan").val() == 1){
      $("#pie_total_ha").show();
      $("#pie_total_kg").hide();
    }
    else{
      $("#pie_total_ha").hide();
      $("#pie_total_kg").show();
    }
  }

  //Tab 2
  function sort_cost(){
    if($("#select_cost").val() == "NSFC"){
      $("#combined_cost_nsfc").show();
      $("#combined_cost_nssc").hide();
    }
    else{
      $("#combined_cost_nsfc").hide();
      $("#combined_cost_nssc").show();
    }
  }
  function sort_unsur(){
    if($("#select_unsur").val() == "NSFC"){
      $("#combined_unsur_nsfc").show();
      $("#combined_unsur_nssc").hide();
    }
    else{
      $("#combined_unsur_nsfc").hide();
      $("#combined_unsur_nssc").show();
    }
  }

  //Tab 3
  function sort_raport(){
    var status = $('#select_status').val();
    var bulan = $('#select_bulan').val();
    var tahun = $('#select_tahun').val();
    var charge = $('#select_charge').val();

    location.href = "/PIS/dashboard/wilayah?wilayah=<?php echo $wil; ?>&status=" + status + "&bulan=" + bulan + "&tahun=" + tahun + "&charge=" + charge;
  }
  function sort_min_max(){
    if($("#select_min_max").val() == "0"){
      $(".Min").show();
      $(".Max").hide();
    }
    else{
      $(".Min").hide();
      $(".Max").show();
    }
  }

  function pindah_pg(){
    window.location.href="/PIS/dashboard/plantation_group?pg="+$('#select_pg').val();
  }
  function pindah_wilayah(){
    if($('#select_wilayah').val() == '0'){
      window.location.href="/PIS/dashboard/plantation_group?pg="+$('#select_pg').val();
    }
    else{
      window.location.href="/PIS/dashboard/wilayah?wilayah="+$('#select_wilayah').val();
    }
  }
  function pindah_lokasi(){
    window.location.href="/PIS/dashboard/lokasi?lokasi="+$('#select_lokasi').val();
  }
  window.onload = function() {
    var ctx_total_cost = document.getElementById('diagram_total_cost').getContext('2d');
    window.myDoughnut = new Chart(ctx_total_cost, config_total_cost);
    var ctx_std_total_cost = document.getElementById('diagram_std_total_cost').getContext('2d');
    window.myDoughnut = new Chart(ctx_std_total_cost, config_std_total_cost);
		var ctx_performance_ha = document.getElementById('diagram_performance_ha').getContext('2d');
		window.myPie = new Chart(ctx_performance_ha, config_performance_ha);
		var ctx_performance_kg = document.getElementById('diagram_performance_kg').getContext('2d');
		window.myPie = new Chart(ctx_performance_kg, config_performance_kg);
		var ctx_proporsi_luas = document.getElementById('diagram_proporsi_luas').getContext('2d');
		window.myPie = new Chart(ctx_proporsi_luas, config_proporsi_luas);
		var ctx_kondisi_drainase = document.getElementById('diagram_kondisi_drainase').getContext('2d');
		window.myPie = new Chart(ctx_kondisi_drainase, config_kondisi_drainase);
		var ctx_biaya_umur_nsfc = document.getElementById('diagram_biaya_umur_nsfc').getContext('2d');
		window.myPie = new Chart(ctx_biaya_umur_nsfc, config_biaya_umur_nsfc);
		var ctx_biaya_umur_nssc = document.getElementById('diagram_biaya_umur_nssc').getContext('2d');
		window.myPie = new Chart(ctx_biaya_umur_nssc, config_biaya_umur_nssc);
		var ctx_unsur_umur_nsfc = document.getElementById('diagram_unsur_umur_nsfc').getContext('2d');
		window.myPie = new Chart(ctx_unsur_umur_nsfc, config_unsur_umur_nsfc);
		var ctx_unsur_umur_nssc = document.getElementById('diagram_unsur_umur_nssc').getContext('2d');
		window.myPie = new Chart(ctx_unsur_umur_nssc, config_unsur_umur_nssc);
  };
</script>
