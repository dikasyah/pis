<!-- PAGE CONTENT -->
<div class="page-content">

  <!-- PAGE CONTENT WRAPPER -->
  <div class="page-content-wrap">

    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="panel panel-default">
            <div class="panel-body">
              <div class="row">
                <div class="col-md-2">
                  <div class="panel" style="box-shadow: 0 0 15px #808080, 0 0 20px #A9A9A9;background-color:#2F4F4F;">
                    <div class="panel-body" align="center">
                      <br />
                        <select class="form-control select" name="select_lokasi" id="select_lokasi" onchange="javascript:pindah_lokasi();" data-live-search="true">
                          <option value="NULL">Pilih Lokasi</option>
<?php
  foreach ($lokasi_gallery as $lg) {
    if($lg->info != NULL){
      $option = "style='background-color:#00FF00;'";
    }
    else{
      $option = "";
    }
    if(isset($lokasi)){
      if($lokasi == $lg->lokasi){
?>
                          <option <?php echo $option; ?> value="<?php echo $lg->lokasi; ?>" selected><?php echo $lg->lokasi; ?></option>
<?php
      }
      else{
?>
                          <option <?php echo $option; ?> value="<?php echo $lg->lokasi; ?>"><?php echo $lg->lokasi; ?></option>
<?php
      }
    }
    else{
?>
                          <option <?php echo $option; ?> value="<?php echo $lg->lokasi; ?>"><?php echo $lg->lokasi; ?></option>
<?php
    }
  }
?>
                        </select>
                      <br />
                      <br />
                    </div>
                  </div>
                </div>

                <div class="col-md-10">
                  <div class="panel panel-default" id="profile_lokasi">
                    <div class="panel-heading" style="background-color:#FF4500;">
                      <div class="panel-title-box">
                        <h3 style="color:white;">Lokasi <?php if(isset($lokasi)) echo $lokasi ?></h3>
                      </div>
                    </div>
                    <div class="panel-body" style="padding:10px;">
                      <div class="row">
                        <div class="col-lg-8">
<?php
  if(isset($lokasi)){
    $disable = "";
  }
  else{
    $disable = "disabled";
  }
?>
                          <select class="form-control select" name="select_category" id="select_category" onchange="javascript:category();" <?php echo $disable; ?>>
                            <option value="NULL">Pilih Category</option>
<?php
  if(isset($category)){
    if($category == "Ridger"){
      $selected1 = "selected";
      $selected2 = "";
      $selected3 = "";
      $selected4 = "";
    }
    else if($category == "Tanam"){
      $selected1 = "";
      $selected2 = "selected";
      $selected3 = "";
      $selected4 = "";
    }
    else if($category == "Gulma"){
      $selected1 = "";
      $selected2 = "";
      $selected3 = "selected";
      $selected4 = "";
    }
    else{
      $selected1 = "";
      $selected2 = "";
      $selected3 = "";
      $selected4 = "selected";
    }
  }
  else{
    $selected1 = "";
    $selected2 = "";
    $selected3 = "";
    $selected4 = "";
  }
?>
                            <option value="Ridger" <?php echo $selected1; ?>>Selesai Ridger</option>
                            <option value="Tanam" <?php echo $selected2; ?>>Selesai Tanam</option>
                            <option value="Gulma" <?php echo $selected3; ?>>Gulma</option>
                            <option value="Issue" <?php echo $selected4; ?>>Issue</option>
                          </select>
                        </div>
                        <div class="col-lg-4">
                          <div class="pull-right">
                            <div class="btn-group">
<?php
  if(isset($category) && ($_SESSION['crud'] == '0' || ($_SESSION['crud'] == '1' && $_SESSION['edit'][0] == substr($lokasi_desc['kebun'], 0, 3)) || ($_SESSION['crud'] == '1' && $_SESSION['edit'][0] == $note_lokasi['pg']))){
    $disable = "";
  }
  else{
    $disable = "disabled";
  }
?>
                              <button class="btn btn-primary" <?php echo $disable; ?> onclick="show_modal_gallery()"><span class="fa fa-cloud-upload"></span> Upload</button>
                              <button class="btn btn-primary" onclick="main_menu()"><span class="fa fa-arrow-left"></span> Back</button>
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
      </div>

    </div>
<?php
  if(isset($lokasi)){
?>
      <div class="row">
        <div class="col-md-12">
          <div id="peta_all"  style="width:100%;height:300px;"></div>
<script>
<?php
  $longlat = explode(", ", $coordinate['longlat']);
?>
  function initMap() {
  var map = new google.maps.Map(document.getElementById('peta_all'), {
    center:new google.maps.LatLng(<?php echo $longlat[1]; ?>, <?php echo $longlat[0]; ?>),
    zoom:15,
    mapTypeId: google.maps.MapTypeId.SATELLITE
  });

<?php
  switch ($coordinate['category_rp_per_ha']) {
    case 'Excellent':
      $warna_isi = "#00FF00";
      $aktif = 1;
      break;
    case 'Good':
      $warna_isi = "#FFFF00";
      $aktif = 1;
      break;
    case 'Poor':
      $warna_isi = "#FF0000";
      $aktif = 1;
      break;

    default:
      $warna_isi = "#0000FF";
      $aktif = 0;
      break;
  }

  switch ($coordinate['kebun']) {
    case '1':
      $warna_border = "#FF4500";
      break;
    case '2':
      $warna_border = "#00FFFF";
      break;
    case '3':
      $warna_border = "#FF00FF";
      break;

    default:
      $warna_border = "#000000";
      break;
  }

  $long = sizeof($longlat) - 1;
?>
    var longlat<?php echo $coordinate['lokasi']; ?> = [
<?php
  for ($i = 0; $i < $long; $i++) {
    if($i % 2 == 0){
?>
      {lng: <?php echo $longlat[$i]; ?>,
    <?php
    }
    else{
?>
      lat: <?php echo $longlat[$i]; ?>},
<?php
    }
  }
?>
    ];

    // Construct the polygon.
    var lok<?php echo $coordinate['lokasi']; ?> = new google.maps.Polygon({
      paths: longlat<?php echo $coordinate['lokasi']; ?>,
      strokeColor: '<?php echo $warna_isi; ?>',
      strokeOpacity: 1,
      strokeWeight: 4,
      fillColor: '<?php echo $warna_isi; ?>',
      fillOpacity: 0
    });
    lok<?php echo $coordinate['lokasi']; ?>.setMap(map);
    google.maps.event.addListener(lok<?php echo $coordinate['lokasi']; ?>, "click", function(event) {
      var info<?php echo $coordinate['lokasi']; ?> = "<h2 style='color:black;'><?php echo $coordinate['lokasi']; ?></h2>" +
      "<div class='row'>" +
        "<table width='100%'>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>PG</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $coordinate['pg']; ?></b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Wilayah</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $coordinate['wilayah']; ?></b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Kebun</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $coordinate['kebun']; ?></b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Lokasi</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $coordinate['lokasi']; ?></b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Luas</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $coordinate['luas']; ?> Ha</b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Status</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $coordinate['status']; ?></b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Yield</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php if($coordinate['yield'] == NULL) echo '-'; else echo round($coordinate['yield']); ?> Ton/Ha</b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Umur</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php if($coordinate['umur'] == NULL) echo '-'; else echo round($coordinate['umur']); ?> Bulan</b></td>" +
          "</tr>" +
          "<tr>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Category</b></td>" +
            "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
            "<td style='color:<?php echo $warna_isi; ?>;padding-top:1px;padding-bottom:1px;'><b><?php if($coordinate['category_rp_per_ha'] == NULL) echo '-'; else echo $coordinate['category_rp_per_ha']; ?></b></td>" +
          "</tr>" +
<?php
  if($coordinate['foto'] != NULL){
?>
          "<tr>" +
            "<td colspan='3' style='color:black;padding-top:5px;padding-bottom:1px;' align='center'>" +
              "<img onclick='show_modal_show_foto(\"<?php echo $coordinate['foto']; ?>\")' src='<?php echo $coordinate['foto']; ?>' height='auto' width='150'>" +
            "</td>" +
          "</tr>" +
<?php
  }
?>
        "</table>" +
      "</div>";
      iw<?php echo $coordinate['lokasi']; ?> = new google.maps.InfoWindow();
      iw<?php echo $coordinate['lokasi']; ?>.setContent(info<?php echo $coordinate['lokasi']; ?>);
      iw<?php echo $coordinate['lokasi']; ?>.setPosition(event.latLng);
      iw<?php echo $coordinate['lokasi']; ?>.open(map);
    });

    if(navigator.geolocation){
      navigator.geolocation.getCurrentPosition(function(p){
        var cp = new google.maps.Marker({
          position:{
            lat: p.coords.latitude,
            lng: p.coords.longitude
          },
          map: map,
          icon: '/PIS/assets/images/marker.png'
        });
      });
    }
  }

  window.initialize = initMap;
</script>
        </div>
      </div>
<?php
  }

  if(isset($category) && !empty($history_gallery)){
?>
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="panel panel-default">
            <div class="panel-body">
                  <div class="gallery" id="links">
<?php
  foreach ($history_gallery as $glp) {
?>
                    <a class="gallery-item" title="<?php echo $glp->caption; ?>" data-gallery>
                      <div class="image">
                        <img href="<?php echo $glp->foto; ?>" src="<?php echo $glp->foto; ?>" alt="<?php echo $glp->foto; ?>" style="max-height:200px;max-width:100%;"/>
                        <ul class="gallery-item-controls">
                          <li><span class="check" onclick="show_modal_show_foto('<?php echo $glp->foto; ?>')"><i class="glyphicon glyphicon-zoom-in"></i></span></li>
<?php
  if($_SESSION['crud'] == '0' || ($_SESSION['crud'] == '1' && $_SESSION['edit'][0] == substr($lokasi_desc['kebun'], 0, 3)) || ($_SESSION['crud'] == '4' && $_SESSION['edit'][0] == $note_lokasi['pg']) || ($_SESSION['crud'] == '1' && $_SESSION['edit'][0] == $note_lokasi['pg'])){
?>
                          <li><span class="check" onclick="show_modal_gallery_delete('<?php echo $glp->id; ?>', '<?php echo $glp->foto; ?>', '<?php echo $glp->caption; ?>', '<?php echo $glp->deskripsi; ?>')"><i class="fa fa-times"></i></span></li>
<?php
  }
?>
                        </ul>
                      </div>
                      <div class="meta">
                        <strong><?php echo $glp->caption; ?></strong>
                        <span><?php echo $glp->deskripsi; ?></span>
                      </div>
                    </a>
<?php
  }
?>
                  </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php
  }
?>
  </div>
  <!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTENT -->

<div id="modal_gallery" class="modal">
  <span class="close" onclick="close_modal_gallery()">&times;</span>
  <!-- Modal content -->
  <div class="modal-content">
    <div class="row" align='center'>
      <h3><?php echo $note_lokasi['pg']; ?> - <?php echo $note_lokasi['wilayah']; ?> - <?php echo $note_lokasi['lokasi']; ?></h3>
    </div>
    <div class="row">
      <div class="col-md-6">
        <form action="/PIS/Gallery/insert_gallery" method="post" enctype="multipart/form-data" >
          <input type="hidden" name="lokasi" value="<?php echo $note_lokasi['lokasi']; ?>">
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
        <form action="/PIS/Gallery/delete_gallery" method="post">
          <input type="hidden" name="lokasi" value="<?php echo $note_lokasi['lokasi']; ?>">
          <input type="hidden" name='id' id='id_gallery_delete'>
          <input type="hidden" name='foto' id='foto_gallery_delete'>
          <input type="hidden" name="jenis" id="jenis_delete">
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

<!-- The Modal -->
<div id="modal_show_foto" class="modal">
  <span class="close" onclick="close_modal_show_foto()">&times;</span>
  <!-- Modal content -->
    <div class="col-md-12" align="center">
      <img id='show_foto' style="max-width:80%;max-height:650px;">
    </div>
</div>

<script>
  $( document ).ready(function() {
    $('#lokasi').focus();
    $('#lokasi').keyup(function(){
      this.value = this.value.toUpperCase();

      return runScript(event);

    });

    //Resolusi Layar
    if(screen.width <= 600){
      $("#diagram_berat_tanaman").css('height', '30vh');
      $("#diagram_histori_siram").css('height', '45px');
      $("#diagram_biaya_umur").css('height', '30px');
    }
    else{
      $("#diagram_berat_tanaman").css('height', '20vh');
    }
  });

  function show_modal_gallery(){
    document.getElementById("jenis").value = $("#select_category").val();
    document.getElementById("jenis_d").innerHTML = $("#select_category").val();
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
    document.getElementById("jenis_delete").value = $("#select_category").val();
    modal_gallery_delete.style.display = "block";
  }
  function close_modal_gallery_delete(){
    modal_gallery_delete.style.display = "none";
  }

  function show_modal_show_foto(id){
    modal_show_foto.style.display = "block";
    var img = document.getElementById("show_foto");
    img.src = id;
  }
  function close_modal_show_foto(){
    modal_show_foto.style.display = "none";
  }

  function pindah_lokasi(){
    if($('#select_lokasi').val() == 'NULL'){
      return false;
    }
    else{
      window.location.href="/PIS/Gallery/history_gallery?lokasi="+$('#select_lokasi').val();
    }
  }
  function category(){
    if($('#select_lokasi').val() == 'NULL'){
      return false;
    }
    else{
      if($('#select_category').val() == 'NULL'){
        return false;
      }
      else{
        window.location.href="/PIS/Gallery/history_gallery?lokasi="+$('#select_lokasi').val()+"&category="+$('#select_category').val();
      }
    }
  }
  function main_menu(){
    window.location.href="/PIS/dashboard/main_menu";
  }
</script>
