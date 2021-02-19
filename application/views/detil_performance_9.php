<div class="page-content-wrap">

    <div class="row">
        <div style="margin-top:5px;" class="col-md-12">

            <div class="panel panel-default">
              <div class="panel-heading" style="background-color: #32CD32;">
                <div class="panel-title-box" style="padding-top:4px;padding-left:4px;">
                  <h2 style="color:black;"><b>Performance</b></h2>
                </div>
                <ul class="panel-controls" style="margin-top: 4px;padding-top:4px;padding-right:4px">
                  <div class="col-md-6">
                    <button class="btn btn-danger btn-rounded btn-block" onclick="back()"><span class="fa fa-arrow-left"></span> Back</button>
                  </div>
<?php
  if($account['crud'] == 0 || ($account['crud'] == 2 && $account['deskripsi'] == 'Sub Div Head')){
?>
                  <div class="col-md-6">
                    <select class="form-control select" name="select_jabatan" id="select_jabatan" onchange="position()">
<?php
  foreach($per_jabatan as $pj){
    if($pj->jabatan == $jabatan){
?>
                      <option value="<?php echo $pj->urutan; ?>" selected><?php echo $pj->jabatan; ?></option>
<?php
    }
    else{
?>
                      <option value="<?php echo $pj->urutan; ?>"><?php echo $pj->jabatan; ?></option>
<?php
    }
  }
?>
                    </select>
                  </div>
<?php
  }
?>
                </ul>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="row" style="background: url('/PIS/assets/images/WP/WP BG Champ.png') center center ;">
                      <div class="col-md-12" align='center'>
                        <img id="img_trophy" src="/PIS/assets/images/WP/<?php echo $jabatan; ?>.png">
                      </div>
                    </div>
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-md-12" align="center" style="background: url('/PIS/assets/images/WP/WP BG Champ.png') center center ;padding-top:8px;">
                    <font color="black"><h2><b><?php echo $jabatan; ?></b></h2></font>
                  </div>
                </div>
                <hr />
                <div class="row">
                  <div class="col-md-12">
                    <div class="panel panel-default tabs">
                      <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#quantity" role="tab" data-toggle="tab">Quantity</a></li>
                        <li><a href="#quality" role="tab" data-toggle="tab">Quality</a></li>
                        <li><a href="#cost" role="tab" data-toggle="tab">Cost</a></li>
                        <li><a href="#mutu" role="tab" data-toggle="tab">Mutu</a></li>
                        <li><a href="#total" role="tab" data-toggle="tab">Total</a></li>
                      </ul>
                      <div class="panel-body tab-content">
                        <div class="tab-pane active" id="quantity">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="col-md-3">
                                <table class="table table-actions">
                                  <tbody>
                                    <tr style="background-color: #32CD32;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Availiablity Unt Irigasi</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>PG1</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>PG2</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>PG3</b></td>
                                    </tr>
<?php
  $row_num = 0;
  foreach($performance['quantity']['availiablity_unt_irigasi'] as $q1){
    if($row_num % 2 == 0){
      $color_row = "style='background-color:#F5F5F5;'";
    }
    else{
      $color_row = "";
    }
    switch ($row_num) {
      case '0':
      case '1':
        $poin_pg1 = round($q1->pg1, 2);
        $poin_pg2 = round($q1->pg2, 2);
        $poin_pg3 = round($q1->pg3, 2);
      break;
      case '2':
      case '3':
      case '4':
        $poin_pg1 = round($q1->pg1 * 100)."%";
        $poin_pg2 = round($q1->pg2 * 100)."%";
        $poin_pg3 = round($q1->pg3 * 100)."%";
      break;
    }
?>
                                    <tr <?php echo $color_row; ?>>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b><?php echo $q1->deskripsi; ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo $poin_pg1; ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo $poin_pg2; ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo $poin_pg3; ?></b></td>
                                    </tr>
<?php
    $row_num++;
  }
?>
                                  </tbody>
                                </table>
                              </div>
                              <div class="col-md-3">
                                <table class="table table-actions">
                                  <tbody>
                                    <tr style="background-color: #32CD32;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Availiablity Unt Traktor</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>PG1</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>PG2</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>PG3</b></td>
                                    </tr>
<?php
  $row_num = 0;
  foreach($performance['quantity']['availiablity_unt_traktor'] as $q1){
    if($row_num % 2 == 0){
      $color_row = "style='background-color:#F5F5F5;'";
    }
    else{
      $color_row = "";
    }
    switch ($row_num) {
      case '0':
      case '1':
        $poin_pg1 = round($q1->pg1, 2);
        $poin_pg2 = round($q1->pg2, 2);
        $poin_pg3 = round($q1->pg3, 2);
      break;
      case '2':
      case '3':
      case '4':
        $poin_pg1 = round($q1->pg1 * 100)."%";
        $poin_pg2 = round($q1->pg2 * 100)."%";
        $poin_pg3 = round($q1->pg3 * 100)."%";
      break;
    }
?>
                                    <tr <?php echo $color_row; ?>>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b><?php echo $q1->deskripsi; ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo $poin_pg1; ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo $poin_pg2; ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo $poin_pg3; ?></b></td>
                                    </tr>
<?php
    $row_num++;
  }
?>
                                  </tbody>
                                </table>
                              </div>
                              <div class="col-md-3">
                                <table class="table table-actions">
                                  <tbody>
                                    <tr style="background-color: #32CD32;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Coverage Irigasi</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>PG1</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>PG2</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>PG3</b></td>
                                    </tr>
<?php
  $row_num = 0;
  foreach($performance['quantity']['coverage_irigasi'] as $q1){
    if($row_num % 2 == 0){
      $color_row = "style='background-color:#F5F5F5;'";
    }
    else{
      $color_row = "";
    }
    switch ($row_num) {
      case '0':
      case '1':
        $poin_pg1 = angka_ribuan($q1->pg1);
        $poin_pg2 = angka_ribuan($q1->pg2);
        $poin_pg3 = angka_ribuan($q1->pg3);
      break;
      case '2':
      case '3':
      case '4':
        $poin_pg1 = round($q1->pg1 * 100)."%";
        $poin_pg2 = round($q1->pg2 * 100)."%";
        $poin_pg3 = round($q1->pg3 * 100)."%";
      break;
    }
?>
                                    <tr <?php echo $color_row; ?>>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b><?php echo $q1->deskripsi; ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo $poin_pg1; ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo $poin_pg2; ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo $poin_pg3; ?></b></td>
                                    </tr>
<?php
    $row_num++;
  }
?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="quality">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="col-md-3">
                                <table class="table table-actions">
                                  <tbody>
                                    <tr style="background-color: #32CD32;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Utilization Unt Irigasi</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>PG1</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>PG2</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>PG3</b></td>
                                    </tr>
<?php
  $row_num = 0;
  foreach($performance['quality']['utilization_unt_irigasi'] as $q1){
    if($row_num % 2 == 0){
      $color_row = "style='background-color:#F5F5F5;'";
    }
    else{
      $color_row = "";
    }
    switch ($row_num) {
      case '0':
      case '1':
        $poin_pg1 = round($q1->pg1, 2);
        $poin_pg2 = round($q1->pg2, 2);
        $poin_pg3 = round($q1->pg3, 2);
      break;
      case '2':
      case '3':
      case '4':
        $poin_pg1 = round($q1->pg1 * 100)."%";
        $poin_pg2 = round($q1->pg2 * 100)."%";
        $poin_pg3 = round($q1->pg3 * 100)."%";
      break;
    }
?>
                                    <tr <?php echo $color_row; ?>>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b><?php echo $q1->deskripsi; ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo $poin_pg1; ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo $poin_pg2; ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo $poin_pg3; ?></b></td>
                                    </tr>
<?php
    $row_num++;
  }
?>
                                  </tbody>
                                </table>
                              </div>
                              <div class="col-md-3">
                                <table class="table table-actions">
                                  <tbody>
                                    <tr style="background-color: #32CD32;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Utilization Unt Traktor</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>PG1</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>PG2</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>PG3</b></td>
                                    </tr>
<?php
  $row_num = 0;
  foreach($performance['quality']['utilization_unt_traktor'] as $q1){
    if($row_num % 2 == 0){
      $color_row = "style='background-color:#F5F5F5;'";
    }
    else{
      $color_row = "";
    }
    switch ($row_num) {
      case '0':
      case '1':
        $poin_pg1 = round($q1->pg1, 2);
        $poin_pg2 = round($q1->pg2, 2);
        $poin_pg3 = round($q1->pg3, 2);
      break;
      case '2':
      case '3':
      case '4':
        $poin_pg1 = round($q1->pg1 * 100)."%";
        $poin_pg2 = round($q1->pg2 * 100)."%";
        $poin_pg3 = round($q1->pg3 * 100)."%";
      break;
    }
?>
                                    <tr <?php echo $color_row; ?>>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b><?php echo $q1->deskripsi; ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo $poin_pg1; ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo $poin_pg2; ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo $poin_pg3; ?></b></td>
                                    </tr>
<?php
    $row_num++;
  }
?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="cost">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="col-md-3">
                                <table class="table table-actions">
                                  <tbody>
                                    <tr style="background-color: #32CD32;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>OHC Field Support</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>PG1</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>PG2</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>PG3</b></td>
                                    </tr>
<?php
  $row_num = 0;
  foreach($performance['cost']['ohc_field_support'] as $q1){
    if($row_num % 2 == 0){
      $color_row = "style='background-color:#F5F5F5;'";
    }
    else{
      $color_row = "";
    }
    switch ($row_num) {
      case '0':
      case '1':
        $poin_pg1 = round($q1->pg1, 2);
        $poin_pg2 = round($q1->pg2, 2);
        $poin_pg3 = round($q1->pg3, 2);
      break;
      case '2':
      case '3':
      case '4':
        $poin_pg1 = round($q1->pg1 * 100)."%";
        $poin_pg2 = round($q1->pg2 * 100)."%";
        $poin_pg3 = round($q1->pg3 * 100)."%";
      break;
    }
?>
                                    <tr <?php echo $color_row; ?>>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b><?php echo $q1->deskripsi; ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo $poin_pg1; ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo $poin_pg2; ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo $poin_pg3; ?></b></td>
                                    </tr>
<?php
    $row_num++;
  }
?>
                                  </tbody>
                                </table>
                              </div>
                              <div class="col-md-3">
                                <table class="table table-actions">
                                  <tbody>
                                    <tr style="background-color: #32CD32;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Irrigation (HPP)</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>PG1</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>PG2</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>PG3</b></td>
                                    </tr>
<?php
  $row_num = 0;
  foreach($performance['cost']['irrigation_hpp'] as $q1){
    if($row_num % 2 == 0){
      $color_row = "style='background-color:#F5F5F5;'";
    }
    else{
      $color_row = "";
    }
    switch ($row_num) {
      case '0':
      case '1':
        $poin_pg1 = round($q1->pg1, 2);
        $poin_pg2 = round($q1->pg2, 2);
        $poin_pg3 = round($q1->pg3, 2);
      break;
      case '2':
      case '3':
      case '4':
        $poin_pg1 = round($q1->pg1 * 100)."%";
        $poin_pg2 = round($q1->pg2 * 100)."%";
        $poin_pg3 = round($q1->pg3 * 100)."%";
      break;
    }
?>
                                    <tr <?php echo $color_row; ?>>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b><?php echo $q1->deskripsi; ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo $poin_pg1; ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo $poin_pg2; ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo $poin_pg3; ?></b></td>
                                    </tr>
<?php
    $row_num++;
  }
?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="mutu">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="col-md-3">
                                <table class="table table-actions">
                                  <tbody>
                                    <tr style="background-color: #32CD32;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>SSK</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>PG1</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>PG2</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>PG3</b></td>
                                    </tr>
<?php
  $row_num = 0;
  foreach($performance['mutu']['ssk'] as $q1){
    if($row_num % 2 == 0){
      $color_row = "style='background-color:#F5F5F5;'";
    }
    else{
      $color_row = "";
    }
    switch ($row_num) {
      case '0':
      case '1':
        $poin_pg1 = round($q1->pg1, 2);
        $poin_pg2 = round($q1->pg2, 2);
        $poin_pg3 = round($q1->pg3, 2);
      break;
      case '2':
      case '3':
      case '4':
        $poin_pg1 = round($q1->pg1 * 100)."%";
        $poin_pg2 = round($q1->pg2 * 100)."%";
        $poin_pg3 = round($q1->pg3 * 100)."%";
      break;
    }
?>
                                    <tr <?php echo $color_row; ?>>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b><?php echo $q1->deskripsi; ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo $poin_pg1; ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo $poin_pg2; ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo $poin_pg3; ?></b></td>
                                    </tr>
<?php
    $row_num++;
  }
?>
                                  </tbody>
                                </table>
                              </div>
                              <div class="col-md-3">
                                <table class="table table-actions">
                                  <tbody>
                                    <tr style="background-color: #32CD32;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>AKK</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>PG1</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>PG2</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>PG3</b></td>
                                    </tr>
<?php
  $row_num = 0;
  foreach($performance['mutu']['akk'] as $q1){
    if($row_num % 2 == 0){
      $color_row = "style='background-color:#F5F5F5;'";
    }
    else{
      $color_row = "";
    }
    switch ($row_num) {
      case '0':
      case '1':
        $poin_pg1 = round($q1->pg1, 2);
        $poin_pg2 = round($q1->pg2, 2);
        $poin_pg3 = round($q1->pg3, 2);
      break;
      case '2':
      case '3':
      case '4':
        $poin_pg1 = round($q1->pg1 * 100)."%";
        $poin_pg2 = round($q1->pg2 * 100)."%";
        $poin_pg3 = round($q1->pg3 * 100)."%";
      break;
    }
?>
                                    <tr <?php echo $color_row; ?>>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b><?php echo $q1->deskripsi; ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo $poin_pg1; ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo $poin_pg2; ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo $poin_pg3; ?></b></td>
                                    </tr>
<?php
    $row_num++;
  }
?>
                                  </tbody>
                                </table>
                              </div>
                              <div class="col-md-3">
                                <table class="table table-actions">
                                  <tbody>
                                    <tr style="background-color: #32CD32;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>AFR</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>PG1</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>PG2</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>PG3</b></td>
                                    </tr>
<?php
  $row_num = 0;
  foreach($performance['mutu']['afr'] as $q1){
    if($row_num % 2 == 0){
      $color_row = "style='background-color:#F5F5F5;'";
    }
    else{
      $color_row = "";
    }
    switch ($row_num) {
      case '0':
      case '1':
        $poin_pg1 = round($q1->pg1, 2);
        $poin_pg2 = round($q1->pg2, 2);
        $poin_pg3 = round($q1->pg3, 2);
      break;
      case '2':
      case '3':
      case '4':
        $poin_pg1 = round($q1->pg1 * 100)."%";
        $poin_pg2 = round($q1->pg2 * 100)."%";
        $poin_pg3 = round($q1->pg3 * 100)."%";
      break;
    }
?>
                                    <tr <?php echo $color_row; ?>>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b><?php echo $q1->deskripsi; ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo $poin_pg1; ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo $poin_pg2; ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo $poin_pg3; ?></b></td>
                                    </tr>
<?php
    $row_num++;
  }
?>
                                  </tbody>
                                </table>
                              </div>
                              <div class="col-md-3">
                                <table class="table table-actions">
                                  <tbody>
                                    <tr style="background-color: #32CD32;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>ASR</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>PG1</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>PG2</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>PG3</b></td>
                                    </tr>
<?php
  $row_num = 0;
  foreach($performance['mutu']['asr'] as $q1){
    if($row_num % 2 == 0){
      $color_row = "style='background-color:#F5F5F5;'";
    }
    else{
      $color_row = "";
    }
    switch ($row_num) {
      case '0':
      case '1':
        $poin_pg1 = round($q1->pg1, 2);
        $poin_pg2 = round($q1->pg2, 2);
        $poin_pg3 = round($q1->pg3, 2);
      break;
      case '2':
      case '3':
      case '4':
        $poin_pg1 = round($q1->pg1 * 100)."%";
        $poin_pg2 = round($q1->pg2 * 100)."%";
        $poin_pg3 = round($q1->pg3 * 100)."%";
      break;
    }
?>
                                    <tr <?php echo $color_row; ?>>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b><?php echo $q1->deskripsi; ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo $poin_pg1; ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo $poin_pg2; ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo $poin_pg3; ?></b></td>
                                    </tr>
<?php
    $row_num++;
  }
?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="total">
                          <div class="col-md-3">
                            &nbsp;
                          </div>
                          <div class="col-md-5">
                            <canvas id="diagram_poin_total"></canvas>
<?php
  $pg1_total = round($performance['total']['pg1']['quantity_performance']*100).", ".round($performance['total']['pg1']['quality_performance']*100).", ".round($performance['total']['pg1']['cost_performance']*100).", ".round($performance['total']['pg1']['mutu_performance']*100);
  $pg2_total = round($performance['total']['pg2']['quantity_performance']*100).", ".round($performance['total']['pg2']['quality_performance']*100).", ".round($performance['total']['pg2']['cost_performance']*100).", ".round($performance['total']['pg2']['mutu_performance']*100);
  $pg3_total = round($performance['total']['pg3']['quantity_performance']*100).", ".round($performance['total']['pg3']['quality_performance']*100).", ".round($performance['total']['pg3']['cost_performance']*100).", ".round($performance['total']['pg3']['mutu_performance']*100);
?>
<script>
	var config_poin_total = {
    type: 'bar',
    data: {
  		labels: [
        "Quantity", "Quality", "Cost", "Mutu"
      ],
  		datasets: [{
        label: 'PG1',
        backgroundColor: '#FF0000',
        borderColor: '#FF0000',
        borderWidth: 1,
        data: [
          <?php echo $pg1_total; ?>
        ]
        }, {
        label: 'PG2',
        backgroundColor: '#00008B',
        borderColor: '#00008B',
        borderWidth: 1,
        data: [
          <?php echo $pg2_total; ?>
        ]
        }, {
        label: 'PG3',
        backgroundColor: '#228B22',
        borderColor: '#228B22',
        borderWidth: 1,
        data: [
          <?php echo $pg3_total; ?>
        ]
        }]
    },
    options: {
      responsive: true,
      legend: {
        position: 'bottom',
        labels: {
          usePointStyle: true,
        }
      },
      title: {
        display: false,
        text: 'Tonase Sebelum Panen (Ton/Ha)'
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
            max: 130,
            min: 40
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
      animation: {
        onComplete: function () {
          var chartInstance = this.chart;
          var ctx = chartInstance.ctx;
          ctx.textAlign = "center";

          Chart.helpers.each(this.data.datasets.forEach(function (dataset, i) {
            var meta = chartInstance.controller.getDatasetMeta(i);
            Chart.helpers.each(meta.data.forEach(function (bar, index) {
              ctx.fillText(dataset.data[index] + '%', bar._model.x, bar._model.y - 10);
            }),this)
          }),this);
        }
      }
    }
	};
</script>
                          </div>
                          <div class="col-md-3">
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

</div>
<script>
  document.addEventListener("DOMContentLoaded", function(event) {
    //Resolusi Layar
    if(screen.width <= 600){
      $("#img_trophy").css('width', '100%');
    }
    else{

    }
  });
  function position(){
    var jabatan = $("#select_jabatan").val();
    window.location.href="/PIS/Workshop/detil_performance?jabatan="+jabatan;
  }
  function back(){
    window.location.href="/PIS/Workshop";
  }
  window.onload = function() {
    var ctx_poin_total = document.getElementById('diagram_poin_total').getContext('2d');
    window.myBar = new Chart(ctx_poin_total, config_poin_total);
  }
</script>
