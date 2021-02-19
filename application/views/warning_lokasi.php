<!-- PAGE CONTENT -->
<div class="page-content">

  <!-- PAGE CONTENT WRAPPER -->
  <div class="page-content-wrap">

    <div class="col-md-12">
      <div class="panel-body">
        <div class="row">
        <div class="col-md-12">
          <div class="row">
          <div class="panel panel-default">
            <div class="panel-heading" style="background-color: #7B68EE;">
              <h3 class="panel-title"><b>Detil SPK</b></h3>
              <ul class="panel-controls" style="margin-top: 2px;width:50%;">
                <div class="col-md-2" style="padding:0px;">
                  <select class="form-control select" id="pg" onchange="filter_warning()">
                    <option value='NULL'>Semua PG</option>
<?php
  foreach ($pg as $pgll) {
    if($filter['pg'] == $pgll->code){
?>
                    <option value='<?php echo $pgll->code; ?>' selected><?php echo $pgll->nama; ?></option>
<?php
    }
    else{
?>
                    <option value='<?php echo $pgll->code; ?>'><?php echo $pgll->nama; ?></option>
<?php
    }
  }
?>
                  </select>
                </div>
                <div class="col-md-2" style="padding:0px;">
                  <select class="form-control select" id="wilayah" onchange="filter_warning()">
                    <option value='NULL'>Semua Wilayah</option>
<?php
  foreach ($wilayah as $wll) {
    if($filter['wilayah'] == $wll->code){
?>
                    <option value='<?php echo $wll->code; ?>' selected><?php echo $wll->nama; ?></option>
<?php
    }
    else{
?>
                    <option value='<?php echo $wll->code; ?>'><?php echo $wll->nama; ?></option>
<?php
    }
  }
?>
                  </select>
                </div>
                <div class="col-md-2" style="padding:0px;">
                  <select class="form-control select" id="lokasi" onchange="filter_warning()">
                    <option value='NULL'>Semua Lokasi</option>
<?php
  foreach ($lokasi_all as $ll) {
    if($filter['lokasi'] == $ll->lokasi){
?>
                    <option value='<?php echo $ll->lokasi; ?>' selected><?php echo $ll->lokasi; ?></option>
<?php
    }
    else{
?>
                    <option value='<?php echo $ll->lokasi; ?>'><?php echo $ll->lokasi; ?></option>
<?php
    }
  }
?>
                  </select>
                </div>
                <div class="col-md-2" style="padding:0px;">
                  <select class="form-control select" id="status" onchange="filter_warning()">
<?php
  if($filter['status'] == 'NSFC'){
?>
                    <option value='NULL'>NS</option>
                    <option value='NSFC' selected>NSFC</option>
                    <option value='NSSC'>NSSC</option>
<?php
  }
  else if($filter['status'] == 'NSSC'){
?>
                    <option value='NULL'>NS</option>
                    <option value='NSFC'>NSFC</option>
                    <option value='NSSC' selected>NSSC</option>
<?php
  }
  else{
?>
                    <option value='NULL' selected>NS</option>
                    <option value='NSFC'>NSFC</option>
                    <option value='NSSC'>NSSC</option>
<?php
  }
?>
                  </select>
                </div>
                <div class="col-md-2" style="padding:0px;">
                  <select class="form-control select" id="code" onchange="filter_warning()">
                    <option value='NULL'>Semua Element Cost</option>
<?php
  foreach ($element_cost as $ec) {
    switch ($ec->code) {
      case 'ZN01':
        $desc_ZN = 'Land Preparation';
        break;
      case 'ZN02':
        $desc_ZN = 'Seedling Allocation';
        break;
      case 'ZN03':
        $desc_ZN = 'Planting';
        break;
      case 'ZN04':
        $desc_ZN = 'Road and Drainage';
        break;
      case 'ZN05':
        $desc_ZN = 'Fertilization';
        break;
      case 'ZN06':
        $desc_ZN = 'Weed Control';
        break;
      case 'ZN07':
        $desc_ZN = 'Plant Pest Control';
        break;
      case 'ZN08':
        $desc_ZN = 'Forcing';
        break;
      case 'ZN09':
        $desc_ZN = 'Pre Harvesting';
        break;
      case 'ZN10':
        $desc_ZN = 'Harvesting';
        break;
      case 'ZN11':
        $desc_ZN = 'Observation';
        break;
      case 'ZN12':
        $desc_ZN = 'Plant Selection';
        break;
      case 'ZN13':
        $desc_ZN = 'Springkle/Irrigation';
        break;
      case 'ZN14':
        $desc_ZN = 'Guard/Pull/Labor or Transportation';
        break;
      case 'ZN15':
        $desc_ZN = 'Others';
        break;
    }
    if($filter['code'] == $ec->code){
?>
                    <option value='<?php echo $ec->code; ?>' selected><?php echo $ec->code.' - '.$desc_ZN; ?></option>
<?php
    }
    else{
?>
                    <option value='<?php echo $ec->code; ?>'><?php echo $ec->code.' - '.$desc_ZN; ?></option>
<?php
    }
  }
?>
                  </select>
                </div>
                <div class="col-md-2" style="padding:0px;">
                  <button type="button" class="btn btn-info" onclick="main_menu()">Menu Utama</button>
                </div>
              </ul>
            </div>
            <div class="panel-body">
              <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <td align='center' style="background-color:#6A5ACD;color:black;width:60px;"><b>No</b></td>
                    <td align='center' style="background-color:#6A5ACD;color:black;width:50px;"><b>PG</b></td>
                    <td align='center' style="background-color:#6A5ACD;color:black;width:50px;"><b>Wilayah</b></td>
                    <td align='center' style="background-color:#6A5ACD;color:black;width:60px;"><b>Lokasi</b></td>
                    <td align='center' style="background-color:#6A5ACD;color:black;width:60px;"><b>Status</b></td>
                    <td align='center' style="background-color:#6A5ACD;color:black;width:250px;"><b>Element Cost</b></td>
                    <td align='center' style="background-color:#6A5ACD;color:black;"><b>Cost</b></td>
                    <td align='center' style="background-color:#6A5ACD;color:black;width:750px;"><b>Note</b></td>
                    <td align='center' style="background-color:#6A5ACD;color:black;"><b>Note By</b></td>
                    <td align='center' style="background-color:#6A5ACD;color:black;width:60px;"></td>
                  </tr>
                </thead>
                <tbody>
<?php
  $i = 0;
  foreach ($warning_lokasi as $wl) {
    switch ($wl->code) {
      case 'ZN01':
        $desc_ZN = 'Land Preparation';
        break;
      case 'ZN02':
        $desc_ZN = 'Seedling Allocation';
        break;
      case 'ZN03':
        $desc_ZN = 'Planting';
        break;
      case 'ZN04':
        $desc_ZN = 'Road and Drainage';
        break;
      case 'ZN05':
        $desc_ZN = 'Fertilization';
        break;
      case 'ZN06':
        $desc_ZN = 'Weed Control';
        break;
      case 'ZN07':
        $desc_ZN = 'Plant Pest Control';
        break;
      case 'ZN08':
        $desc_ZN = 'Forcing';
        break;
      case 'ZN09':
        $desc_ZN = 'Pre Harvesting';
        break;
      case 'ZN10':
        $desc_ZN = 'Harvesting';
        break;
      case 'ZN11':
        $desc_ZN = 'Observation';
        break;
      case 'ZN12':
        $desc_ZN = 'Plant Selection';
        break;
      case 'ZN13':
        $desc_ZN = 'Springkle/Irrigation';
        break;
      case 'ZN14':
        $desc_ZN = 'Guard/Pull/Labor or Transportation';
        break;
      case 'ZN15':
        $desc_ZN = 'Others';
        break;
    }
?>
                  <tr>
                    <td style="color:black;" align='center'><?php echo ++$i; ?></td>
                    <td style="color:black;" align='center'><?php echo $wl->pg; ?></td>
                    <td style="color:black;" align='center'><?php echo $wl->wilayah; ?></td>
                    <td style="color:black;" align='center'><?php echo $wl->lokasi; ?></td>
                    <td style="color:black;" align='center'><?php echo $wl->status; ?></td>
                    <td style="color:black;" align='left'><?php echo $wl->code." - ".$desc_ZN; ?></td>
                    <td style="color:black;" align='right'><?php echo number_format($wl->over); ?></td>
                    <td style="color:black;"><?php echo $wl->note; ?></td>
                    <td style="color:black;" align='center'><?php echo $wl->by; ?></td>
                    <td><button type="button" class="btn btn-success" onclick="show_modal_note('<?php echo $wl->pg; ?>', '<?php echo $wl->wilayah; ?>', '<?php echo $wl->lokasi; ?>', '<?php echo $wl->code; ?>', '<?php echo $wl->note; ?>', '<?php echo $wl->by; ?>')"><span class="fa fa-pencil"></span></button></td>
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
      </div>
    </div>

  </div>
  <!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTENT -->

<!-- The Modal -->
<div id="modal_note" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close" onclick="close_modal_note()">&times;</span>
    <div class="row" align='center'>
      <h3 id='lokasi_d'></h3>
    </div>
    <div class="row">
      <div class="col-md-6">
        <form action="/PIS/Upload/insert_note" method="post" enctype="multipart/form-data" >
          <input type="hidden" id='lokasi' name="lokasi">
          <table width='100%'>
            <tr>
              <td style="padding-top:5px;padding-bottom:2px;width:100px;">
                Element Cost
              </td>
              <td style="padding-top:5px;padding-bottom:2px;width:10px;">
                :
              </td>
              <td style="padding-top:5px;padding-bottom:2px;">
                <div id='code_d'></div>
                <input type="hidden" id='code' name='code'>
              </td>
            </tr>
            <tr>
              <td style="padding-top:2px;padding-bottom:5px;width:100px;">
                Note
              </td>
              <td style="padding-top:2px;padding-bottom:5px;width:10px;">
                :
              </td>
              <td style="padding-top:2px;padding-bottom:5px;">
                <textarea id='note' name="note" rows="5" style="width:100%;" placeholder="Text here.." required></textarea>
              </td>
            </tr>
            <tr>
              <td style="padding-top:2px;padding-bottom:5px;width:100px;">
                Note By
              </td>
              <td style="padding-top:2px;padding-bottom:5px;width:10px;">
                :
              </td>
              <td style="padding-top:2px;padding-bottom:5px;">
                <div id='note_by_d'></div>
                <input type="hidden" id='note_by' name='note_by'>
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
<script>
  $( document ).ready(function() {

  });
  function main_menu(){
    window.location.href="/PIS/dashboard/main_menu";
  }
  function filter_warning(){
    var var_post = '';
    var pg = document.getElementById('pg').value;
    var wilayah = document.getElementById('wilayah').value;
    var lokasi = document.getElementById('lokasi').value;
    var status = document.getElementById('status').value;
    var code = document.getElementById('code').value;
    if(pg != 'NULL'){
      var_post = var_post + 'pg=' + pg + '&';
    }
    if(wilayah != 'NULL'){
      var_post = var_post + 'wilayah=' + wilayah + '&';
    }
    if(lokasi != 'NULL'){
      var_post = var_post + 'lokasi=' + lokasi + '&';
    }
    if(status != 'NULL'){
      var_post = var_post + 'status=' + status + '&';
    }
    if(code != 'NULL'){
      var_post = var_post + 'code=' + code + '&';
    }
    window.location.href="/PIS/dashboard/warning_lokasi?" + var_post;
  }

  function show_modal_note(pg, wilayah, lokasi, code, note, note_by){
    modal_note.style.display = "block";
    document.getElementById("lokasi").value = lokasi;
    document.getElementById("lokasi_d").innerHTML = pg + ' - ' + wilayah + ' - ' + lokasi;
    document.getElementById("code").value = code;
    document.getElementById("code_d").innerHTML = code;
    document.getElementById("note").innerHTML = note;
    document.getElementById("note_by").value = note_by;
    if(note_by == ''){
      document.getElementById("note_by_d").innerHTML = "-";
    }
    else{
      document.getElementById("note_by_d").innerHTML = note_by;
    }
  }
  function close_modal_note(){
    modal_note.style.display = "none";
  }
</script>
