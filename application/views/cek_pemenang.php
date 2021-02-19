<div class="page-content-wrap">

    <div class="row">
        <div style="margin-top:5px;" class="col-md-12">

            <div class="panel panel-default">
              <div class="panel-heading" style="background-color: #32CD32;">
                <div class="panel-title-box" style="padding-top:4px;padding-left:4px;">
                  <h2 style="color:black;"><b>Workshop Plantation</b></h2>
                </div>
                <ul class="panel-controls" style="margin-top: 4px;padding-top:4px;padding-right:4px">
                  <button class="btn btn-danger btn-rounded btn-block" onclick="back()"><span class="fa fa-arrow-left"></span> Back</button>
                </ul>
              </div>
<?php
  if($account['background'] != NULL){
    $background = $account['background'];
  }
  else{
    $background = "/PIS/assets/images/profile/empty-background.jpg";
  }
?>
                <div class="panel-body profile" style="background: url('<?php echo $background; ?>') center center;height:200px;">
                    <div class="profile-image">
<?php
  if($account['foto'] != NULL){
    $foto = $account['foto'];
  }
  else{
    $foto = "/PIS/assets/images/profile/empty-profile.png";
  }
?>
                        <img src="<?php echo $foto; ?>" alt="<?php echo $account['nama'] ?>"/>
                    </div>
                    <div class="profile-data">
                        <div class="profile-data-name"><?php echo $account['nama'] ?></div>
                        <div class="profile-data-title" style="color: #FFF;"><?php echo $account['deskripsi'] ?></div>
                    </div>
                </div>
                <div class="panel-body">
                  <div id='timer' class="col-md-12" align='center'>
                    <font size='9px' color="black"><p id="demo"></p></font>
                  </div>
<?php
  if($account['crud'] == 0){
?>
                  <div id='champion_pg' style="display:none;">
                  <!-- <div id='champion_pg'> -->
                    <div class="row" style="background: url('/PIS/assets/images/WP/WP BG Champ.png') center center ;">
                      <div class="col-md-12" align='center'>
<?php
  $performance_poin_pg1 = ($performance_total['gold_pg1'] * 4) + ($performance_total['silver_pg1'] * 2) + ($performance_total['bronze_pg1'] * 1);
  $performance_poin_pg2 = ($performance_total['gold_pg2'] * 4) + ($performance_total['silver_pg2'] * 2) + ($performance_total['bronze_pg2'] * 1);
  $performance_poin_pg3 = ($performance_total['gold_pg3'] * 4) + ($performance_total['silver_pg3'] * 2) + ($performance_total['bronze_pg3'] * 1);
  if($performance_poin_pg1 > $performance_poin_pg2 && $performance_poin_pg1 > $performance_poin_pg3){
    $warna = "#FFD700";
    $category = "GOLD";
  }
  else if($performance_poin_pg2 > $performance_poin_pg1 && $performance_poin_pg2 > $performance_poin_pg3){
    $warna = "#C0C0C0";
    $category = "SILVER";
  }
  else{
    $warna = "#000000";
    $category = "Coba Lagi";
  }
  // echo "<pre>";
  // var_dump($performance_pg1);
  // var_dump($performance_pg2);
  // var_dump($performance_pg3);
  // var_dump($performance_total);
  // echo "</pre>";
  // die();
?>
                        <img id="img_trophy" src="/PIS/assets/images/WP/Trophy.png" width="auto">
                      </div>
                    </div>
                    <hr />
                    <div class="row">
                      <div class="col-md-6">
                        <table width='100%'>
                          <tr style="background-color:#32CD32;">
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b>MENDALI</b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b>PG1</b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b>PG2</b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b>PG3</b>
                            </td>
                          </tr>
                          <tr style="background-color:#FFD700;">
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b>GOLD (4 poin)</b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b><?php echo $performance_total['gold_pg1']; ?></b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b><?php echo $performance_total['gold_pg2']; ?></b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b><?php echo $performance_total['gold_pg3']; ?></b>
                            </td>
                          </tr>
                          <tr style="background-color:#C0C0C0;">
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b>SILVER (2 poin)</b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b><?php echo $performance_total['silver_pg1']; ?></b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b><?php echo $performance_total['silver_pg2']; ?></b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b><?php echo $performance_total['silver_pg3']; ?></b>
                            </td>
                          </tr>
                          <tr style="background-color:#945d41;">
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b>BRONZE (1 poin)</b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b><?php echo $performance_total['bronze_pg1']; ?></b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b><?php echo $performance_total['bronze_pg2']; ?></b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b><?php echo $performance_total['bronze_pg3']; ?></b>
                            </td>
                          </tr>
                          <tr style="background-color:#32CD32;">
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <font size='3px'><b>Total</b></font>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <font size='3px'><b><?php echo $performance_poin_pg1; ?></b></font>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <font size='3px'><b><?php echo $performance_poin_pg2; ?></b></font>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <font size='3px'><b><?php echo $performance_poin_pg3; ?></b></font>
                            </td>
                          </tr>
                        </table>
                      </div>
                      <div class="col-md-6">
                        <table width='100%'>
                          <tr style="background-color:#32CD32;">
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b>JABATAN</b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b>PG1</b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b>PG2</b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b>PG3</b>
                            </td>
                          </tr>
<?php
  $row_num = 0;
  foreach ($per_jabatan as $pj) {
    $poin = $this->Workshop_model->get_poin_jabatan($pj->jabatan);
    if($row_num % 2 == 0){
      $color_row = "style='background-color:#F5F5F5;'";
    }
    else{
      $color_row = "";
    }
?>
                          <tr <?php echo $color_row; ?>>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b><?php echo $pj->jabatan; ?></b>
                            </td>
<?php
  if($poin['pg1'] == 'GOLD'){
    $color_row = "background-color:#FFD700;";
  }
  else if($poin['pg1'] == 'SILVER'){
    $color_row = "background-color:#C0C0C0;";
  }
  else{
    $color_row = "background-color:#945d41;";
  }
?>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;<?php echo $color_row; ?>" align='center'>
                              <b><?php echo $poin['pg1']; ?></b>
                            </td>
<?php
  if($poin['pg2'] == 'GOLD'){
    $color_row = "background-color:#FFD700;";
  }
  else if($poin['pg2'] == 'SILVER'){
    $color_row = "background-color:#C0C0C0;";
  }
  else{
    $color_row = "background-color:#945d41;";
  }
?>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;<?php echo $color_row; ?>" align='center'>
                              <b><?php echo $poin['pg2']; ?></b>
                            </td>
<?php
  if($poin['pg3'] == 'GOLD'){
    $color_row = "background-color:#FFD700;";
  }
  else if($poin['pg3'] == 'SILVER'){
    $color_row = "background-color:#C0C0C0;";
  }
  else{
    $color_row = "background-color:#945d41;";
  }
?>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;<?php echo $color_row; ?>" align='center'>
                              <b><?php echo $poin['pg3']; ?></b>
                            </td>
                          </tr>
<?php
    $row_num++;
  }
?>
                        </table>
                      </div>
                    </div>
                  </div>
                  <hr />
                  <div class="row">
                    <div class="col-md-12">
                      <table width="100%">
                        <tr>
                          <td>
                            <button style="display:none;" id="btn_best_pg" class="btn btn-info btn-rounded btn-block" onclick="best_pg()"><span class="fa fa-trophy"></span> PG Performance</button>
                            <button style="display:none;" id="btn_summary_pg" class="btn btn-info btn-rounded btn-block" onclick="summary()"><span class="fa fa-thumbs-up"></span> Summary</button>
                            <button style="display:none;" id="btn_detil_pg" class="btn btn-success btn-rounded btn-block" onclick="detil_performance()"><span class="fa fa-bar-chart-o"></span> Detail</button>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
<?php
  }
  else if($account['crud'] == 2){
?>
                  <div id='champion_pg_sm' style="display:none;">
                  <!-- <div id='champion_pg'> -->
                    <div class="row" style="background: url('/PIS/assets/images/WP/WP BG Champ.png') center center ;">
                      <div class="col-md-12" align='center'>
<?php
  $performance_poin_pg1 = ($performance_total['gold_pg1'] * 4) + ($performance_total['silver_pg1'] * 2) + ($performance_total['bronze_pg1'] * 1);
  $performance_poin_pg2 = ($performance_total['gold_pg2'] * 4) + ($performance_total['silver_pg2'] * 2) + ($performance_total['bronze_pg2'] * 1);
  $performance_poin_pg3 = ($performance_total['gold_pg3'] * 4) + ($performance_total['silver_pg3'] * 2) + ($performance_total['bronze_pg3'] * 1);
  if($performance_poin_pg1 > $performance_poin_pg2 && $performance_poin_pg1 > $performance_poin_pg3){
    $warna = "#FFD700";
    $category = "GOLD";
  }
  else if($performance_poin_pg2 > $performance_poin_pg1 && $performance_poin_pg2 > $performance_poin_pg3){
    $warna = "#C0C0C0";
    $category = "SILVER";
  }
  else{
    $warna = "#000000";
    $category = "Coba Lagi";
  }
  // echo "<pre>";
  // var_dump($performance_pg1);
  // var_dump($performance_pg2);
  // var_dump($performance_pg3);
  // var_dump($performance_total);
  // echo "</pre>";
  // die();
?>
                        <img id="img_trophy" src="/PIS/assets/images/WP/Trophy.png" width="auto">
                      </div>
                    </div>
                    <hr />
                    <div class="row">
                      <div class="col-md-6">
                        <table width='100%'>
                          <tr style="background-color:#32CD32;">
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b>MENDALI</b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b>PG1</b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b>PG2</b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b>PG3</b>
                            </td>
                          </tr>
                          <tr style="background-color:#FFD700;">
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b>GOLD (4 poin)</b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b><?php echo $performance_total['gold_pg1']; ?></b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b><?php echo $performance_total['gold_pg2']; ?></b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b><?php echo $performance_total['gold_pg3']; ?></b>
                            </td>
                          </tr>
                          <tr style="background-color:#C0C0C0;">
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b>SILVER (2 poin)</b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b><?php echo $performance_total['silver_pg1']; ?></b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b><?php echo $performance_total['silver_pg2']; ?></b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b><?php echo $performance_total['silver_pg3']; ?></b>
                            </td>
                          </tr>
                          <tr style="background-color:#945d41;">
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b>BRONZE (1 poin)</b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b><?php echo $performance_total['bronze_pg1']; ?></b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b><?php echo $performance_total['bronze_pg2']; ?></b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b><?php echo $performance_total['bronze_pg3']; ?></b>
                            </td>
                          </tr>
                          <tr style="background-color:#32CD32;">
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <font size='3px'><b>Total</b></font>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <font size='3px'><b><?php echo $performance_poin_pg1; ?></b></font>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <font size='3px'><b><?php echo $performance_poin_pg2; ?></b></font>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <font size='3px'><b><?php echo $performance_poin_pg3; ?></b></font>
                            </td>
                          </tr>
                        </table>
                      </div>
                      <div class="col-md-6">
                        <table width='100%'>
                          <tr style="background-color:#32CD32;">
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b>JABATAN</b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b>PG1</b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b>PG2</b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b>PG3</b>
                            </td>
                          </tr>
<?php
  $row_num = 0;
  foreach ($per_jabatan as $pj) {
    $poin = $this->Workshop_model->get_poin_jabatan($pj->jabatan);
    if($row_num % 2 == 0){
      $color_row = "style='background-color:#F5F5F5;'";
    }
    else{
      $color_row = "";
    }
?>
                          <tr <?php echo $color_row; ?>>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;" align='center'>
                              <b><?php echo $pj->jabatan; ?></b>
                            </td>
<?php
  if($poin['pg1'] == 'GOLD'){
    $color_row = "background-color:#FFD700;";
  }
  else if($poin['pg1'] == 'SILVER'){
    $color_row = "background-color:#C0C0C0;";
  }
  else{
    $color_row = "background-color:#945d41;";
  }
?>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;<?php echo $color_row; ?>" align='center'>
                              <b><?php echo $poin['pg1']; ?></b>
                            </td>
<?php
  if($poin['pg2'] == 'GOLD'){
    $color_row = "background-color:#FFD700;";
  }
  else if($poin['pg2'] == 'SILVER'){
    $color_row = "background-color:#C0C0C0;";
  }
  else{
    $color_row = "background-color:#945d41;";
  }
?>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;<?php echo $color_row; ?>" align='center'>
                              <b><?php echo $poin['pg2']; ?></b>
                            </td>
<?php
  if($poin['pg3'] == 'GOLD'){
    $color_row = "background-color:#FFD700;";
  }
  else if($poin['pg3'] == 'SILVER'){
    $color_row = "background-color:#C0C0C0;";
  }
  else{
    $color_row = "background-color:#945d41;";
  }
?>
                            <td style="padding-top:5px;padding-bottom:5px;color:black;<?php echo $color_row; ?>" align='center'>
                              <b><?php echo $poin['pg3']; ?></b>
                            </td>
                          </tr>
<?php
    $row_num++;
  }
?>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div id='champion_sm' style="display:none;">
                    <div class="row" style="background: url('/PIS/assets/images/WP/WP BG Champ.png') center center ;">
                      <div class="col-md-12" align='center'>
<?php
  if($performance['juara'] == 1){
    $warna = "#FFD700";
    $category = "GOLD";
    $trophy = "Trophy 1.png";
    $win = 1;
  }
  else if($performance['juara'] == 2){
    $warna = "#C0C0C0";
    $category = "SILVER";
    $trophy = "Trophy 2.png";
    $win = 1;
  }
  else if($performance['juara'] == 3){
    $warna = "#945d41";
    $category = "BRONZE";
    $trophy = "Trophy 3.png";
    $win = 1;
  }
  else{
    $warna = "#000000";
    $category = "Coba Lagi";
    $win = 0;
  }
  if($win != 0){
?>
                        <img src="/PIS/assets/images/WP/<?php echo $trophy; ?>">
<?php
  }
  else{
?>
                        <table style="border: 10px groove black;">
                          <tr>
                            <td style="padding-top:5px;padding-bottom:5px;width:225px;color:white;background-color:<?php echo $warna; ?>;" align='center'>
                              <font size='5px'><b><?php echo $category; ?></b></font>
                            </td>
                          </tr>
                        </table>
<?php
  }
?>
                      </div>
                    </div>
                    <hr />
                    <div class="row">
                      <div class="col-md-12">
                        <table width='100%'>
                          <tr style="background-color:#CDCDCD;">
                            <td style="padding-top:5px;padding-bottom:5px;padding-left:5px;color:black;">
                              <font size='3px'><b>TOTAL PERFORMANCE</b></font>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;padding-right:5px;color:black;" align='right'>
                              <font size='3px'><b><?php echo round($performance['total_performance'] * 100)." %"; ?></b></font>
                            </td>
                          </tr>
                          <tr>
                            <td style="padding-top:5px;padding-bottom:5px;padding-left:5px;color:black;">
                              <b>QUANTITY PERFORMANCE</b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;padding-right:5px;color:black;" align='right'>
                              <b><?php echo round($performance['quantity_performance'] * 100)." %"; ?></b>
                            </td>
                          </tr>
                          <tr style="background-color:#F5F5F5;">
                            <td style="padding-top:5px;padding-bottom:5px;padding-left:5px;color:black;">
                              <b>QUALITY PERFORMANCE</b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;padding-right:5px;color:black;" align='right'>
                              <b><?php echo round($performance['quality_performance'] * 100)." %"; ?></b>
                            </td>
                          </tr>
                          <tr>
                            <td style="padding-top:5px;padding-bottom:5px;padding-left:5px;color:black;">
                              <b>COST PERFORMANCE</b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;padding-right:5px;color:black;" align='right'>
                              <b><?php echo round($performance['cost_performance'] * 100)." %"; ?></b>
                            </td>
                          </tr>
                          <tr style="background-color:#F5F5F5;">
                            <td style="padding-top:5px;padding-bottom:5px;padding-left:5px;color:black;">
                              <b>MUTU PERFORMANCE</b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;padding-right:5px;color:black;" align='right'>
                              <b><?php echo round($performance['mutu_performance'] * 100)." %"; ?></b>
                            </td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                  <hr />
                  <div class="row">
                    <div class="col-md-12">
                      <table width="100%">
                        <tr>
                          <td>
<?php
if($account['deskripsi'] == 'Sub Div Head'){
?>
                             <button style="display:none;" id="btn_best_pg_sm" class="btn btn-info btn-rounded btn-block" onclick="best_pg()"><span class="fa fa-trophy"></span> PG Performance</button> 
<?php
}
?>
                            <button style="display:none;" id="btn_summary_pg_sm" class="btn btn-info btn-rounded btn-block" onclick="summary()"><span class="fa fa-thumbs-up"></span> Summary</button>
                            <button style="display:none;" id="btn_detil_pg_sm" class="btn btn-success btn-rounded btn-block" onclick="detil_performance()"><span class="fa fa-bar-chart-o"></span> Detail</button>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
<?php
  }
  else{
?>
                  <div id='champion' style="display:none;">
                    <div class="row" style="background: url('/PIS/assets/images/WP/WP BG Champ.png') center center ;">
                      <div class="col-md-12" align='center'>
<?php
  if($performance['juara'] == 1){
    $warna = "#FFD700";
    $category = "GOLD";
    $trophy = "Trophy 1.png";
    $win = 1;
  }
  else if($performance['juara'] == 2){
    $warna = "#C0C0C0";
    $category = "SILVER";
    $trophy = "Trophy 2.png";
    $win = 1;
  }
  else if($performance['juara'] == 3){
    $warna = "#945d41";
    $category = "BRONZE";
    $trophy = "Trophy 3.png";
    $win = 1;
  }
  else{
    $warna = "#000000";
    $category = "Coba Lagi";
    $win = 0;
  }
  if($win != 0){
?>
                        <img src="/PIS/assets/images/WP/<?php echo $trophy; ?>">
<?php
  }
  else{
?>
                        <table style="border: 10px groove black;">
                          <tr>
                            <td style="padding-top:5px;padding-bottom:5px;width:225px;color:white;background-color:<?php echo $warna; ?>;" align='center'>
                              <font size='5px'><b><?php echo $category; ?></b></font>
                            </td>
                          </tr>
                        </table>
<?php
  }
?>
                      </div>
                    </div>
                    <hr />
                    <div class="row">
                      <div class="col-md-12">
                        <table width='100%'>
                          <tr style="background-color:#CDCDCD;">
                            <td style="padding-top:5px;padding-bottom:5px;padding-left:5px;color:black;">
                              <font size='3px'><b>TOTAL PERFORMANCE</b></font>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;padding-right:5px;color:black;" align='right'>
                              <font size='3px'><b><?php echo round($performance['total_performance'] * 100)." %"; ?></b></font>
                            </td>
                          </tr>
                          <tr>
                            <td style="padding-top:5px;padding-bottom:5px;padding-left:5px;color:black;">
                              <b>QUANTITY PERFORMANCE</b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;padding-right:5px;color:black;" align='right'>
                              <b><?php echo round($performance['quantity_performance'] * 100)." %"; ?></b>
                            </td>
                          </tr>
                          <tr style="background-color:#F5F5F5;">
                            <td style="padding-top:5px;padding-bottom:5px;padding-left:5px;color:black;">
                              <b>QUALITY PERFORMANCE</b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;padding-right:5px;color:black;" align='right'>
                              <b><?php echo round($performance['quality_performance'] * 100)." %"; ?></b>
                            </td>
                          </tr>
                          <tr>
                            <td style="padding-top:5px;padding-bottom:5px;padding-left:5px;color:black;">
                              <b>COST PERFORMANCE</b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;padding-right:5px;color:black;" align='right'>
                              <b><?php echo round($performance['cost_performance'] * 100)." %"; ?></b>
                            </td>
                          </tr>
                          <tr style="background-color:#F5F5F5;">
                            <td style="padding-top:5px;padding-bottom:5px;padding-left:5px;color:black;">
                              <b>MUTU PERFORMANCE</b>
                            </td>
                            <td style="padding-top:5px;padding-bottom:5px;padding-right:5px;color:black;" align='right'>
                              <b><?php echo round($performance['mutu_performance'] * 100)." %"; ?></b>
                            </td>
                          </tr>
                        </table>
                      </div>
                    </div>
                    <hr />
                    <div class="row">
                      <div class="col-md-12">
                        <table width="100%">
                          <tr>
                            <td>
                              <button class="btn btn-success btn-rounded btn-block" onclick="detil_performance()"><span class="fa fa-bar-chart-o"></span> Detail</button>
                            </td>
                          </tr>
                        </table>
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
<script>
  document.addEventListener("DOMContentLoaded", function(event) {
    //Resolusi Layar
    if(screen.width <= 600){
      $("#img_trophy").css('width', '100%');
    }
    else{

    }
    if(<?php echo $account['crud']; ?> != 0){
      $('#timer').hide();
      $('#champion').show();
    }
    else{
      document.getElementById("demo").innerHTML = "Who is The Winner ?";
      $('#btn_best_pg').show();
    }
    if(<?php echo $account['crud']; ?> == 2){
      $('#timer').hide();
      $('#champion_sm').show();
      $('#btn_best_pg_sm').show();
      $('#btn_detil_pg_sm').show();
    }
  });
  function back(){
    window.location.href="/PIS/Dashboard";
  }
  function best_pg(){
    $('#timer').hide();
    $('#champion_pg').show();
    $('#btn_best_pg').hide();
    $('#btn_detil_pg').show();
    $('#btn_summary_pg').show();
    if(<?php echo $account['crud'] ?> == 2){
      $('#champion_pg_sm').show();
      $('#btn_best_pg_sm').hide();
      $('#btn_detil_pg_sm').show();
      $('#champion_sm').hide();
      $('#btn_summary_pg_sm').show();
    }
  }
  function summary(){
    $('#timer').hide();
    $('#champion_pg').hide();
    $('#btn_best_pg').show();
    $('#btn_summary_pg').hide();
    if(<?php echo $account['crud'] ?> == 2){
      $('#champion_pg_sm').hide();
      $('#btn_best_pg_sm').show();
      $('#champion_sm').show();
      $('#btn_summary_pg_sm').hide();
    }
  }
  function detil_performance(){
    window.location.href="/PIS/Workshop/detil_performance";
  }
//   var countDownDate = new Date("Sep 6, 2019 18:56:00").getTime();
//   var x = setInterval(function(){
//     var now = new Date().getTime();
//     var distance = countDownDate - now;

//     // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
//     var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
//     var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
//     var seconds = Math.floor((distance % (1000 * 60)) / 1000);

//     document.getElementById("demo").innerHTML = hours + "H "
//     + minutes + "M " + seconds + "S";

//     if (distance < 0) {
//       clearInterval(x);
//       if(<?php echo $account['crud']; ?> != 0){
//         $('#timer').hide();
//         $('#champion').show();
//       }
//       else{
//         document.getElementById("demo").innerHTML = "Who is The Winner ?";
//         $('#btn_best_pg').show();
//       }
//       if(<?php echo $account['crud']; ?> == 2){
//         $('#timer').hide();
//         $('#champion_sm').show();
//         $('#btn_best_pg_sm').show();
//         $('#btn_detil_pg_sm').show();
//       }
//     }
//   }, 1000);
</script>
