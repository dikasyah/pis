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
                              <div class="table-responsive">
                                <table class="table table-actions">
                                  <tbody>
                                    <tr style="background-color: #32CD32;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Toonage</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>W01</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>W02</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>W03</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b>W04</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>W05</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>W06</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>W07</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b>W08</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>W09</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>W11</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>W12</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b>W13</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b>W14</b></td>
                                    </tr>
                                    <tr style="background-color: #F5F5F5;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>BPP</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo angka_ribuan(17247.82); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo angka_ribuan(12914.78); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo angka_ribuan(19625.5); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo angka_ribuan(14978.91); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo angka_ribuan(14141.65); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo angka_ribuan(20838.62); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo angka_ribuan(13712.57); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo angka_ribuan(23696.63); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo angka_ribuan(4334.28); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo angka_ribuan(15094.87); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo angka_ribuan(16778.51); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo angka_ribuan(17014.36); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo angka_ribuan(12808.87); ?></b></td>
                                    </tr>
                                    <tr>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Actual</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo angka_ribuan(19204.557); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo angka_ribuan(13295.49); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo angka_ribuan(14789.085); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo angka_ribuan(14769.514); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo angka_ribuan(12026.57); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo angka_ribuan(19126.124); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo angka_ribuan(15394.216); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo angka_ribuan(20420.769); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo angka_ribuan(7727.59); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo angka_ribuan(10273.325); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo angka_ribuan(13247.224); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo angka_ribuan(17643.18); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo angka_ribuan(15550.571); ?></b></td>
                                    </tr>
                                    <tr style="background-color: #F5F5F5;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Achivement</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(1.11344836622831, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1.02947862836223, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.753564749942677, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.986020611646642, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.850436123083233, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.917821045731435, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1.12263536302823, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.861758359733009, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.680583867234365, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.789535185186289, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1.03695819296171, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                    </tr>
                                    <tr>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Weight</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.12, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.12, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.12, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.12, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.12, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.12, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.12, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.12, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.12, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.12, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.12, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.12, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(0.12, 2); ?></b></td>
                                    </tr>
                                    <tr style="background-color: #F5F5F5;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Result</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.133613803947397, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.123537435403468, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.0904277699931212, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.118322473397597, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.102052334769988, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.110138525487772, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.134716243563387, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.103411003167961, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.144, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.0816700640681238, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.0947442222223547, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.124434983155405, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(0.144, 2); ?></b></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="table-responsive">
                                <table class="table table-actions">
                                  <tbody>
                                    <tr style="background-color: #32CD32;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Yield NSFC</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>W01</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>W02</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>W03</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b>W04</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>W05</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>W06</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>W07</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b>W08</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>W09</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>W11</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>W12</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b>W13</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b>W14</b></td>
                                    </tr>
                                    <tr style="background-color: #F5F5F5;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>BPP</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo angka_ribuan(100.432795478745); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo angka_ribuan(100.654575194843); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo angka_ribuan(100.687871373646); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo angka_ribuan(101.73409350057); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo angka_ribuan(92.6633855216245); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo angka_ribuan(98.285430372807); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo angka_ribuan(99.3091557669441); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo angka_ribuan(97.2759801163009); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo angka_ribuan(100.590690208668); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo angka_ribuan(101.994409441832); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo angka_ribuan(101.271950072668); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo angka_ribuan(101.759896008051); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo angka_ribuan(104.368412075729); ?></b></td>
                                    </tr>
                                    <tr>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Actual</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo angka_ribuan(101.874466820733); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo angka_ribuan(96.8716704288939); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo angka_ribuan(104.903046640993); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo angka_ribuan(100.639803807465); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo angka_ribuan(88.6600405363268); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo angka_ribuan(94.6603138696451); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo angka_ribuan(101.17403435513); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo angka_ribuan(94.3167233835683); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo angka_ribuan(98.0458333333333); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo angka_ribuan(88.174872464112); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo angka_ribuan(83.1838924876728); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo angka_ribuan(86.473882854393); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo angka_ribuan(91.8773775589531); ?></b></td>
                                    </tr>
                                    <tr style="background-color: #F5F5F5;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Achivement</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(1.01435458741455, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.962416961587429, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1.04186378368955, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.989243628606189, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.956796905673563, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.963116440662554, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1.01877851617792, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.969578751823477, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.974700870726155, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.864506917061949, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.82139123842272, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.849783522258625, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(0.880317863725735, 2); ?></b></td>
                                    </tr>
                                    <tr>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Weight</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.13, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.13, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.13, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.13, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.13, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.13, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.13, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.13, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.13, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.13, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.13, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.13, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(0.13, 2); ?></b></td>
                                    </tr>
                                    <tr style="background-color: #F5F5F5;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Result</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.131866096363892, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.125114205006366, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.135442291879641, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.128601671718805, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.124383597737563, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.125205137286132, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.13244120710313, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.126045237737052, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.1267111131944, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.112385899218053, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.106780860994954, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.110471857893621, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(0.114441322284346, 2); ?></b></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="table-responsive">
                                <table class="table table-actions">
                                  <tbody>
                                    <tr style="background-color: #32CD32;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Yield NSSC</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>W01</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>W02</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>W03</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b>W04</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>W05</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>W06</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>W07</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b>W08</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>W09</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>W11</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>W12</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b>W13</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b>W14</b></td>
                                    </tr>
                                    <tr style="background-color: #F5F5F5;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>BPP</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo angka_ribuan(64.41834625323); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo angka_ribuan(65); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo angka_ribuan(65); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo angka_ribuan(63.8434700115948); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo angka_ribuan(58.6747181964573); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo angka_ribuan(63.4702032043767); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo angka_ribuan(62); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo angka_ribuan(61.0227272727273); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo angka_ribuan(63.1722007722008); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo angka_ribuan(62.1096929975854); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo angka_ribuan(63.2888119065948); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo angka_ribuan(65.021449507061); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo angka_ribuan(62.7026900365545); ?></b></td>
                                    </tr>
                                    <tr>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Actual</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo angka_ribuan(60.1881196298744); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo angka_ribuan(51.7605562913907); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo angka_ribuan(67.9960873263397); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo angka_ribuan(51.1131035356736); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo angka_ribuan(48.5132372564718); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo angka_ribuan(48.8768915426433); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo angka_ribuan(59.2633089943578); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo angka_ribuan(42.8521900826446); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo angka_ribuan(56.6465481171548); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo angka_ribuan(60.0884955752212); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo angka_ribuan(56.889748524506); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo angka_ribuan(56.9443586632844); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo angka_ribuan(59.5932822197882); ?></b></td>
                                    </tr>
                                    <tr style="background-color: #F5F5F5;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Achivement</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.934331958682602, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.796316250636781, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1.04609365117446, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.800600335890119, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.82681670654195, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.770076178663831, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.955859822489642, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.702233282546132, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.896700564880152, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.967457616922326, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.89889108059837, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.87577805624128, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(0.950410296353258, 2); ?></b></td>
                                    </tr>
                                    <tr>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Weight</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.13, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.13, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.13, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.13, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.13, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.13, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.13, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.13, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.13, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.13, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.13, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.13, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(0.13, 2); ?></b></td>
                                    </tr>
                                    <tr style="background-color: #F5F5F5;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Result</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.121463154628738, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.103521112582781, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.135992174652679, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.104078043665715, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.107486171850453, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.100109903226298, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.124261776923653, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.0912903267309971, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.11657107343442, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.125769490199902, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.116855840477788, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.113851147311366, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(0.123553338525923, 2); ?></b></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="quality">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="table-responsive">
                                <table class="table table-actions">
                                  <tbody>
                                    <tr style="background-color: #32CD32;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Actual</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>BPP</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>W01</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>W02</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>W03</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b>W04</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>W05</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>W06</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>W07</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b>W08</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>W09</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>W11</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>W12</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b>W13</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b>W14</b></td>
                                    </tr>
                                    <tr style="background-color: #F5F5F5;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Reject Fruit</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>5</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.0190993774617368, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.0282555470854207, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(0.0100189247070092, 2); ?></b></td>
                                    </tr>
                                    <tr>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Plant Repair</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>5</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(5.82740213523132, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1.37684313377154, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(2.79306110556111, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.0001, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(10.4440384615385, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(4.02219556088782, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(7.85857439606093, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(8.62102517389864, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(7.23426001635323, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.0001, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1.89128687865917, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(2.52330916087021, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(0.0001, 2); ?></b></td>
                                    </tr>
                                    <tr style="background-color: #F5F5F5;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Reduce NPKMg</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>37</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(24.0610799708668, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(22.6817342948057, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(21.1812134881252, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(21.0324047883299, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(28.4792597165741, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(24.4152066780117, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(25.0212894020165, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(23.064613432914, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(23.1459069010729, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(22.9247764985686, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(25.2023802044098, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(23.4156955030979, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(24.4128895338826, 2); ?></b></td>
                                    </tr>
                                    <tr>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>RF Produksi</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>90</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(88.5170338419741, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(76.1228451910352, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(100, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(75.1706539971365, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(71.3471012289838, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(71.881917716918, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(87.1569399426324, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(63.021552809326, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(83.3084115254714, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(88.3703508617978, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(83.6662435164387, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(83.7465226344367, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(87.6423546954652, 2); ?></b></td>
                                    </tr>
                                    <tr style="background-color: #F5F5F5;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Big Fruit</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>61</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(66.5483178043208, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(67.3274891880803, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(71.8987166649099, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(64.9770863323604, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(61.7270562218253, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(63.7690995469303, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(71.3892686630641, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(71.7845585681116, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(66.98891017825, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(65.402356139556, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(64.461097806564, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(67.8274516116052, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(65.3561462422551, 2); ?></b></td>
                                    </tr>
                                    <tr>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Kualitas Buah</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>35</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(31.6899266358594, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(31.6808575568644, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(32.7438011107182, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(35.0294121437051, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(36.5861581199638, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(34.3177083012844, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(33.4618247870222, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(34.015093508523, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(39.2837652627201, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(32.3682011517191, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(32.3783734067799, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(33.0076423104626, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(35.0772412472149, 2); ?></b></td>
                                    </tr>
                                    <tr style="background-color: #F5F5F5;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Kematangan</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>35</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(30.2666077140286, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(36.2415893803503, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(32.6776366081817, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(29.012802623301, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(36.955685708692, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(35.0023250338758, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(29.24215618231, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(24.7304616778116, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(30.6363893389939, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(29.1456650081292, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(37.3113820533374, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(30.6043126827691, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(33.5942661769368, 2); ?></b></td>
                                    </tr>
                                    <tr>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Weeding Labor</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>0.06</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.0436593259117878, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.0475783740430516, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.0643585078634825, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.0472997989176582, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.0691533352373398, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.0630285071273886, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.0491608438940713, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.0798875126041446, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.0451450730983875, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.0508753377086251, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.0711712433255608, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.0421345180241756, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(0.0469980570151437, 2); ?></b></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="table-responsive">
                                <table class="table table-actions">
                                  <tbody>
                                    <tr style="background-color: #32CD32;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Achivement</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>BPP</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>W01</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>W02</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>W03</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b>W04</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>W05</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>W06</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>W07</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b>W08</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>W09</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>W11</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>W12</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b>W13</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b>W14</b></td>
                                    </tr>
                                    <tr style="background-color: #F5F5F5;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Reject Fruit</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>%</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                    </tr>
                                    <tr>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Plant Repair</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>%</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.858015267175572, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.478742013294296, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.636247714662627, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.579977427178638, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.691155693698785, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                    </tr>
                                    <tr style="background-color: #F5F5F5;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Reduce NPKMg</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>%</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                    </tr>
                                    <tr>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>RF Produksi</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>%</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.983522598244157, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.845809391011503, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1.11111111111111, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.835229488857072, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.792745569210931, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.798687974632422, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.968410443807027, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.700239475659178, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.925649016949682, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.981892787353308, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.92962492796043, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.930516918160407, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(0.973803941060724, 2); ?></b></td>
                                    </tr>
                                    <tr style="background-color: #F5F5F5;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Big Fruit</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>%</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(1.08911625703281, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1.10186801769432, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1.17667979842557, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1.06340180178984, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(1.01021246889584, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1.04363213533244, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1.16834227586708, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1.17481151019234, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(1.09632690236545, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1.07036168110646, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1.05495723834438, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1.11005030120399, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(1.06960541930982, 2); ?></b></td>
                                    </tr>
                                    <tr>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Kualitas Buah</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>%</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.905426475310269, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.905167358767554, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.935537174591949, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1.000840346963, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(1.04531880342754, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.980505951465269, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.956052136772063, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.971859814529229, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(1.12239329322057, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.924805747191974, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.925096383050854, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.943075494584646, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(1.00220689277757, 2); ?></b></td>
                                    </tr>
                                    <tr style="background-color: #F5F5F5;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Kematangan</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>%</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.672591282533969, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.805368652896673, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.726169702404038, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.644728947184467, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.821237460193156, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.77782944519724, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.77782944519724, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.54956581506248, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.680808651977642, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.647681444625093, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.829141823407498, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.680095837394869, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(0.746539248376373, 2); ?></b></td>
                                    </tr>
                                    <tr>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Weeding Labor</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>%</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.932277673796792, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.867637110980623, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.951950200545483, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(11.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.751056054246045, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1.17935335080494, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.84303712, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="cost">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="table-responsive">
                                <table class="table table-actions">
                                  <tbody>
                                    <tr style="background-color: #32CD32;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Actual</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>BPP</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>W01</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>W02</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>W03</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b>W04</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>W05</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>W06</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>W07</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b>W08</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>W09</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>W11</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>W12</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b>W13</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b>W14</b></td>
                                    </tr>
                                    <tr style="background-color: #F5F5F5;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>NSFC (HPP)</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>1.175</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(1362.06576542777, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1223.98016697427, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1268.96780064688, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1257.02413307653, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(1375.16098591753, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1203.60908346203, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1141.01215953501, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1251.63156475025, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(1615.96351435003, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1509.78088229045, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1778.95529270065, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1494.73258353407, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(1554.072845311, 2); ?></b></td>
                                    </tr>
                                    <tr>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>NSSC (HPP)</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>469</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(603.997551338427, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(543.638459027261, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(573.043293022549, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(636.632641969983, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(731.222714272433, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(596.367114082282, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(545.305251958785, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(702.755817423052, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(603.488554140666, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1509.78088229045, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1778.95529270065, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1494.73258353407, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(1554.072845311, 2); ?></b></td>
                                    </tr>
                                    <tr style="background-color: #F5F5F5;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>NSFC (WIP)</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>1.175</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(1373.24991595426, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1295.03280532699, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1284.00059713061, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1289.90338360223, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(1320.89110670039, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1203.83453600709, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1182.22156677244, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1307.76819793681, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(1460.62723552576, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1399.65162957379, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1490.64702960376, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1392.56862267624, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(1351.06840072265, 2); ?></b></td>
                                    </tr>
                                    <tr>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>NSSC (WIP)</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>469</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(560.781322810022, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(512.476698603991, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(578.464691324675, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(588.944725128845, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(601.892064369799, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(560.944066912095, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(543.848119582034, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(691.779110519676, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(605.569899992221, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(638.127169492776, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(618.165609123262, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(549.247251632658, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(549.247251632658, 2); ?></b></td>
                                    </tr>
                                    <tr style="background-color: #F5F5F5;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Send RF HPP</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>98</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(8.25, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(8.5, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(8.5, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(100, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(97.5, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(100, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(100, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(100, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(97.5, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(100, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(7.5, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(87.5, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(100, 2); ?></b></td>
                                    </tr>
                                    <tr>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Acc RF HPP</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>90</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(80.2927515506603, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(91.7821347269511, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(91.8881720291531, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(95.9815243567912, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(95.1493055382834, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(80.0566941162246, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(89.3571354914911, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(95.697943085777, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(83.2296906989249, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(71.6161021768801, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(74.664912853295, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(77.5071118193184, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(82.8496501111254, 2); ?></b></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="table-responsive">
                                <table class="table table-actions">
                                  <tbody>
                                    <tr style="background-color: #32CD32;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Achivement</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>BPP</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>W01</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>W02</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>W03</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b>W04</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>W05</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>W06</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>W07</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b>W08</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>W09</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>W11</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>W12</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b>W13</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b>W14</b></td>
                                    </tr>
                                    <tr style="background-color: #F5F5F5;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>NSFC (HPP)</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>%</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.858989359909909, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.955897841786349, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.92200921048081, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.930769719700177, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.850809477567717, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.972076412579608, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1.02540537383651, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.934779876882908, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.724026247876392, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.774946890455404, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.6576893780303, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.782748708958837, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(0.752860461805354, 2); ?></b></td>
                                    </tr>
                                    <tr>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>NSSC (HPP)</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>%</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.776493214187244, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.862705704889215, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.818437290359395, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.736688584720909, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.641391454129889, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.786428340740618, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.860068738225627, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.667372632673159, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.777148127801413, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.310641103951781, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.26363787888565, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.313768499574098, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(0.301787655202317, 2); ?></b></td>
                                    </tr>
                                    <tr style="background-color: #F5F5F5;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>NSFC (WIP)</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>%</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.851993498348024, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.903452016958428, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.911214529506162, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.907044678596483, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.885765672934752, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.97189436339041, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.989662202825646, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.894653962258633, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.801025731646619, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.835922293289708, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.784894060608705, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.840174035913212, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(0.865981322170068, 2); ?></b></td>
                                    </tr>
                                    <tr>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>NSSC (WIP)</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>%</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.836333131870166, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.915163560172739, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.810766857569124, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.796339588400924, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.779209475856869, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.836090490415146, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.862373120569843, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.677962073251503, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.774477066984381, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.734963221159806, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.758696364013485, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.853895943231177, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(0.822260065440137, 2); ?></b></td>
                                    </tr>
                                    <tr style="background-color: #F5F5F5;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Send RF HPP</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>%</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.841836734693878, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.86734693877551, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.86734693877551, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1.02040816326531, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.994897959183674, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1.02040816326531, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1.02040816326531, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1.02040816326531, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.994897959183674, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1.02040816326531, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.76530612244898, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.892857142857143, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(1.02040816326531, 2); ?></b></td>
                                    </tr>
                                    <tr>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Acc RF HPP</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>%</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.892141683896226, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1.01980149696612, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1.02097968921281, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1.06646138174212, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(1.05721450598093, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.889518823513607, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.992857061016568, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1.06331047873086, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.924774341099166, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.795734468632001, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.829610142814389, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.86119013132576, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(0.920551667901393, 2); ?></b></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="mutu">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="table-responsive">
                                <table class="table table-actions">
                                  <tbody>
                                    <tr style="background-color: #32CD32;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Actual</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>BPP</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>W01</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>W02</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>W03</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b>W04</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>W05</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>W06</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>W07</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b>W08</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>W09</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>W11</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>W12</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b>W13</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b>W14</b></td>
                                    </tr>
                                    <tr style="background-color: #F5F5F5;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>SKK</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>1,00</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(1, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1.14285714285714, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(1.57142857142857, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1.42857142857143, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(3.125, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1.33333333333333, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(4.6, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(2.875, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(3.42857142857143, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(4, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(3.85714285714286, 2); ?></b></td>
                                    </tr>
                                    <tr>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>AKK</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>1,00</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(1, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(1, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(1, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(1, 2); ?></b></td>
                                    </tr>
                                    <tr style="background-color: #F5F5F5;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>AFR</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>3</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(4.43085879426428, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(4.43085879426428, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(4.43085879426428, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(4.43085879426428, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(17.8313136748345, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(17.8313136748345, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(17.8313136748345, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(17.8313136748345, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(11.0723685192344, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(11.0723685192344, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(11.0723685192344, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(11.0723685192344, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(11.0723685192344, 2); ?></b></td>
                                    </tr>
                                    <tr>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>ASR</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>47</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(13.8138538880004, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(13.8138538880004, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(13.8138538880004, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(13.8138538880004, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(34.6137265452669, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(34.6137265452669, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(34.6137265452669, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(34.6137265452669, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(13.2387014903889, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(13.2387014903889, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(13.2387014903889, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(13.2387014903889, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(13.2387014903889, 2); ?></b></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-12">
                              <div class="table-responsive">
                                <table class="table table-actions">
                                  <tbody>
                                    <tr style="background-color: #32CD32;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>Achivement</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>BPP</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>W01</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>W02</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>W03</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b>W04</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>W05</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>W06</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>W07</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b>W08</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b>W09</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b>W11</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b>W12</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b>W13</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b>W14</b></td>
                                    </tr>
                                    <tr style="background-color: #F5F5F5;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>SKK</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>%</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(1, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1.14285714285714, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                    </tr>
                                    <tr>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>AKK</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>%</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(1, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(1, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(1, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(1, 2); ?></b></td>
                                    </tr>
                                    <tr style="background-color: #F5F5F5;">
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>AFR</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>%</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.744776611764706, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.744776611764706, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.744776611764706, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.744776611764706, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.185067688235294, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.185067688235294, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.185067688235294, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.185067688235294, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(0.298039213043478, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(0.298039213043478, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(0.298039213043478, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(0.298039213043478, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(0.298039213043478, 2); ?></b></td>
                                    </tr>
                                    <tr>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;"><b>ASR</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;" align='center'><b>%</b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF0000;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#00008B;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#228B22;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#FF8C00;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                      <td style="color:black;padding-top:2px;padding-bottom:2px;color:#8FBC8F;" align='center'><b><?php echo round(1.2, 2); ?></b></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="tab-pane" id="total">
                          <div class="col-md-4">
                            <canvas id="diagram_poin_total1"></canvas>
<script>
	var config_poin_total1 = {
    type: 'bar',
    data: {
  		labels: [
        "Quantity", "Quality", "Cost", "Mutu"
      ],
  		datasets: [{
        label: 'W01',
        backgroundColor: '#FF0000',
        borderColor: '#FF0000',
        borderWidth: 1,
        data: [
          102, 100, 85, 99
        ]
        }, {
        label: 'W02',
        backgroundColor: '#00008B',
        borderColor: '#00008B',
        borderWidth: 1,
        data: [
          93, 102, 93, 66
        ]
        }, {
        label: 'W03',
        backgroundColor: '#228B22',
        borderColor: '#228B22',
        borderWidth: 1,
        data: [
          95, 103, 90, 104
        ]
        }, {
        label: 'W04',
        backgroundColor: '#FF8C00',
        borderColor: '#FF8C00',
        borderWidth: 1,
        data: [
          92, 100, 90, 66
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
                          <div class="col-md-4">
                            <canvas id="diagram_poin_total2"></canvas>
<script>
	var config_poin_total2 = {
    type: 'bar',
    data: {
  		labels: [
        "Quantity", "Quality", "Cost", "Mutu"
      ],
  		datasets: [{
        label: 'W05',
        backgroundColor: '#FF0000',
        borderColor: '#FF0000',
        borderWidth: 1,
        data: [
          88, 93, 85, 96
        ]
        }, {
        label: 'W06',
        backgroundColor: '#00008B',
        borderColor: '#00008B',
        borderWidth: 1,
        data: [
          88, 97, 92, 96
        ]
        }, {
        label: 'W07',
        backgroundColor: '#228B22',
        borderColor: '#228B22',
        borderWidth: 1,
        data: [
          103, 101, 96, 96
        ]
        }, {
        label: 'W08',
        backgroundColor: '#FF8C00',
        borderColor: '#FF8C00',
        borderWidth: 1,
        data: [
          84, 88, 87, 96
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
                          <div class="col-md-4">
                            <canvas id="diagram_poin_total3"></canvas>
<script>
	var config_poin_total3 = {
    type: 'bar',
    data: {
  		labels: [
        "Quantity", "Quality", "Cost", "Mutu"
      ],
  		datasets: [{
        label: 'W09',
        backgroundColor: '#FF0000',
        borderColor: '#FF0000',
        borderWidth: 1,
        data: [
          102, 102, 79, 98
        ]
        }, {
        label: 'W11',
        backgroundColor: '#00008B',
        borderColor: '#00008B',
        borderWidth: 1,
        data: [
          84, 101, 73, 98
        ]
        }, {
        label: 'W12',
        backgroundColor: '#228B22',
        borderColor: '#228B22',
        borderWidth: 1,
        data: [
          84, 98, 67, 98
        ]
        }, {
        label: 'W13',
        backgroundColor: '#FF8C00',
        borderColor: '#FF8C00',
        borderWidth: 1,
        data: [
          92, 102, 75, 98
        ]
        }, {
        label: 'W14',
        backgroundColor: '#8FBC8F',
        borderColor: '#8FBC8F',
        borderWidth: 1,
        data: [
          101, 104, 76, 98
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
    var ctx_poin_total1 = document.getElementById('diagram_poin_total1').getContext('2d');
    window.myBar = new Chart(ctx_poin_total1, config_poin_total1);
    var ctx_poin_total2 = document.getElementById('diagram_poin_total2').getContext('2d');
    window.myBar = new Chart(ctx_poin_total2, config_poin_total2);
    var ctx_poin_total3 = document.getElementById('diagram_poin_total3').getContext('2d');
    window.myBar = new Chart(ctx_poin_total3, config_poin_total3);
  }
</script>
