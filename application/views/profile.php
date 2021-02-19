<!-- PAGE CONTENT -->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<div class="page-content">

  <!-- PAGE CONTENT WRAPPER -->
  <div class="page-content-wrap">

    <div class="col-md-12" style="padding:0px;">
      <div class="panel-body">
        <div class="col-md-12" style="padding:0px;">
          <div class="row">
            <div class="col-md-12" style="padding:0px;">
              <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #25E625;">
                  <h3 class="panel-title" style="color:black;"><b>Profile</b></h3>
                </div>
                <div class="panel-body" style="padding:10px;">
                  <div class="col-md-3" style="padding:10px;">
<?php
  if($account['foto'] != NULL){
?>
                    <!-- <a class="gallery-item" href="<?php echo $account['foto']; ?>" title="<?php echo $_SESSION['nama']; ?>" data-gallery>
                      <div class="w3-container" style="padding-left:2px;padding-right:2px;"> -->
                        <img src="<?php echo $account['foto']; ?>" onclick="show_modal_show_foto('<?php echo $account['foto']; ?>')" class="w3-border"  style="padding:4px;" alt="<?php echo $_SESSION['nama']; ?>" width="100%"/>
                      <!-- </div>
                    </a> -->
<?php
  }
  else{
?>
                    <div class="w3-container" style="padding-left:2px;padding-right:2px;">
                      <img src="/PIS/assets/images/profile/empty-profile.png" class="w3-border"  style="padding:4px;" alt="Photo Profile" width="100%"/>
                    </div>
<?php
  }
?>
                  </div>
                  <div class="col-md-5">
                    <div class="panel panel-default">
                      <div class="panel-heading" style="color:black;background-color: #25E625;">
                        <b>Biodata</b>
                      </div>
                      <div class="panel-body" style="padding:5px;">
                        <div class="col-md-12">
                          <font color="black" size="4">
                            <table width="100%">
                              <tr>
                                <td style="padding-top:5px;padding-bottom:2px;" width="140px">
                                  Index
                                </td>
                                <td style="padding-top:5px;padding-bottom:2px;">
                                  &nbsp;:&nbsp;
                                </td>
                                <td style="padding-top:5px;padding-bottom:2px;">
                                  <?php echo $_SESSION['index']; ?>
                                </td>
                              </tr>
                              <tr>
                                <td style="padding-top:2px;padding-bottom:2px;">
                                  Nama
                                </td>
                                <td style="padding-top:2px;padding-bottom:2px;">
                                  &nbsp;:&nbsp;
                                </td>
                                <td style="padding-top:2px;padding-bottom:2px;">
                                  <?php echo $_SESSION['nama']; ?>
                                </td>
                              </tr>
                              <tr>
                                <td style="padding-top:2px;padding-bottom:2px;">
                                  User Lavel
                                </td>
                                <td style="padding-top:2px;padding-bottom:2px;">
                                  &nbsp;:&nbsp;
                                </td>
                                <td style="padding-top:2px;padding-bottom:2px;">
                                  <?php echo $_SESSION['deskripsi']; ?>
                                </td>
                              </tr>
                              <tr>
                                <td style="padding-top:2px;padding-bottom:2px;">
                                  Tempat Lahir
                                </td>
                                <td style="padding-top:2px;padding-bottom:2px;">
                                  &nbsp;:&nbsp;
                                </td>
                                <td style="padding-top:2px;padding-bottom:2px;">
                                  <input type="text" class="form-control" id='tempat_lahir' value="<?php echo $account['tempat_lahir']; ?>" placeholder="Kota / Kabupaten">
                                </td>
                              </tr>
                              <tr>
                                <td style="padding-top:2px;padding-bottom:2px;vertical-align:top;">
                                  Tanggal Lahir
                                </td>
                                <td style="padding-top:2px;padding-bottom:2px;vertical-align:top;">
                                  &nbsp;:&nbsp;
                                </td>
                                <td style="padding-top:2px;padding-bottom:2px;">
                                  <div class="col-md-3" style="padding-left:0px;">
                                    <input type="text" class="form-control" maxlength="2" id='tgl_lahir' value="<?php echo substr($account['tgl_lahir'], 8, 2); ?>" placeholder="DD">
                                  </div>
                                  <div class="col-md-3">
                                    <input type="text" class="form-control" maxlength="2" id='bulan_lahir' value="<?php echo substr($account['tgl_lahir'], 5, 2); ?>" placeholder="MM">
                                  </div>
                                  <div class="col-md-4" style="padding-right:0px;">
                                    <input type="text" class="form-control" maxlength="4" id='tahun_lahir' value="<?php echo substr($account['tgl_lahir'], 0, 4); ?>" placeholder="YYYY">
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td style="padding-top:2px;padding-bottom:2px;">
                                  Alamat
                                </td>
                                <td style="padding-top:2px;padding-bottom:2px;">
                                  &nbsp;:&nbsp;
                                </td>
                                <td style="padding-top:2px;padding-bottom:2px;">
                                  <input type="text" class="form-control" id='alamat' value="<?php echo $account['alamat']; ?>" placeholder="Alamat">
                                </td>
                              </tr>
                              <tr>
                                <td style="padding-top:2px;padding-bottom:2px;">
                                  No. HP
                                </td>
                                <td style="padding-top:2px;padding-bottom:2px;">
                                  &nbsp;:&nbsp;
                                </td>
                                <td style="padding-top:2px;padding-bottom:2px;">
                                  <input type="text" class="form-control" id='no_hp' value="<?php echo $account['no_hp']; ?>" placeholder="No. HP">
                                </td>
                              </tr>
                              <tr>
                                <td colspan="3" align='center' style="padding-top:5px;padding-bottom:5px;">
                                  <button type="button" class="btn btn-success" onclick="ubah_bio()">Simpan</button>
                                </td>
                              </tr>
                            </table>
                          </font>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="panel panel-default">
                      <div class="panel-heading" style="color:black;background-color: #25E625;">
                        <b>Settings</b>
                      </div>
                      <div class="panel-body" style="padding:5px;">
                        <div class="col-md-12">
                          <font color="black" size="4">
                            <table width="100%">
                              <tr>
                                <td style="padding-top:5px;padding-bottom:2px;" width="170px">
                                  Username
                                </td>
                                <td style="padding-top:5px;padding-bottom:2px;">
                                  &nbsp;:&nbsp;
                                </td>
                                <td style="padding-top:5px;padding-bottom:2px;">
                                  <?php echo $_SESSION['username']; ?>
                                </td>
                              </tr>
                              <tr>
                                <td style="padding-top:2px;padding-bottom:2px;">
                                  Password Saat Ini
                                </td>
                                <td style="padding-top:2px;padding-bottom:2px;">
                                  &nbsp;:&nbsp;
                                </td>
                                <td style="padding-top:2px;padding-bottom:2px;">
                                  <input type="password" class="form-control" id='password_lama' placeholder="********">
                                </td>
                              </tr>
                              <tr>
                                <td style="padding-top:2px;padding-bottom:2px;">
                                  Password Saat Baru
                                </td>
                                <td style="padding-top:2px;padding-bottom:2px;">
                                  &nbsp;:&nbsp;
                                </td>
                                <td style="padding-top:2px;padding-bottom:2px;">
                                  <input type="password" class="form-control" id='password_baru' placeholder="********">
                                </td>
                              </tr>
                              <tr>
                                <td colspan="3" align='center' style="padding-top:5px;padding-bottom:5px;">
                                  <button type="button" class="btn btn-danger" onclick="ubah_password()">Ubah Password</button>
                                </td>
                              </tr>
                            </table>
                            <br />
                            <form method="post" enctype="multipart/form-data" action='/PIS/Upload/do_upload'>
                              <table width="100%">
                                <tr>
                                  <td style="padding-top:5px;padding-bottom:2px;" width="170px">
                                    Upload Foto
                                  </td>
                                  <td style="padding-top:2px;padding-bottom:2px;">
                                    &nbsp;:&nbsp;
                                  </td>
                                  <td style="padding-top:2px;padding-bottom:2px;">
                                    <input type="file" class="btn btn-default" name="upload_foto" id="upload_foto" style="width:100%;">
                                    <input type="hidden" name="index" value="<?php echo $_SESSION['index']; ?>">
                                    <input type="hidden" name="foto" value="<?php echo $account['foto']; ?>">
                                  </td>
                                </tr>
                                <tr>
                                  <td style="padding-top:2px;padding-bottom:2px;">
                                    Upload Background
                                  </td>
                                  <td style="padding-top:2px;padding-bottom:2px;">
                                    &nbsp;:&nbsp;
                                  </td>
                                  <td style="padding-top:2px;padding-bottom:2px;">
                                    <input type="file" class="btn btn-default" name="upload_background" id="upload_background" style="width:100%;">
                                    <input type="hidden" name="background" value="<?php echo $account['background']; ?>">
                                  </td>
                                </tr>
                                <tr>
                                <tr>
                                  <td colspan="3" align='center' style="padding-top:5px;padding-bottom:5px;">
                                    <button type="submit" class="btn btn-success">Upload</button>
                                    <button type="button" class="btn btn-info" onclick="main_menu()">Menu Utama</button>
                                    <!--<button type="button" class="btn btn-info" onclick="dashboard()">Dashboard</button>-->
<?php
  if($_SESSION['crud'] == 1 || $_SESSION['crud'] == 0 || $_SESSION['index'] == "01334" || $_SESSION['index'] == "10003609" || $_SESSION['index'] == "04660" || $_SESSION['index'] == "10007809"){
?>
                                    <button type="button" class="btn btn-info" onclick="history_login()">History Login</button>
<?php
  }
?>
                                  </td>
                                </tr>
                              </table>
                            </form>
                          </font>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12" style="padding:0px;">
              <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #00BFFF;">
                  <h3 class="panel-title" style="color:black;"><b>Information</b></h3>
<!--
                  <ul class="panel-controls" style="margin-top: 2px;">
                    <button type="button" class="btn btn-default" id="myBtn">Input Note</button>
                  </ul>
-->
                </div>
                <div class="panel-body" style="padding:10px;">
                  <div class="col-md-12">
                    <div class="timeline timeline-right">
                      <!-- START TIMELINE ITEM -->
<?php
  foreach ($noted as $note) {
?>
                        <div class="timeline-item timeline-item-right">
                          <div class="timeline-item-info"><?php echo format_tgl($note->tgl_start); ?><br /><?php echo date('H:i', strtotime($note->tgl_start)); ?></div>
                          <div class="timeline-item-icon">
<?php
  if($note->category == 1){
    echo "<span style='color:green;' class='fa fa-question-circle'></span>";
  }
  else if($note->category == 2){
    echo "<span style='color:red;' class='fa fa-exclamation-circle'></span>";
  }
  else{
    echo "<span style='color:blue;' class='fa fa-info-circle'></span>";
  }
?>
                          </div>
                          <div class="timeline-item-content">
                            <div class="timeline-heading">
                              <img <?php if($note->foto_pic != NULL) echo "onclick='show_modal_show_foto(\"$note->foto_pic\")'"; ?> src="<?php if($note->foto_pic != NULL) echo $note->foto_pic; else echo "/PIS/assets/images/profile/empty-profile.png"; ?>"/>
                              <b><?php echo $note->notif_quest_nama; ?></b> added Note to <b><?php echo $note->notif_issue_nama; ?></b> - (
                              <a href="/PIS/dashboard/plantation_group?pg=<?php echo $note->pg; ?>"><?php echo $note->pg; ?></a> -
                              <a href="/PIS/dashboard/wilayah?wilayah=<?php echo $note->wilayah; ?>"><?php echo $note->wilayah; ?></a> -
                              <a href="/PIS/dashboard/lokasi?lokasi=<?php echo $note->lokasi; ?>"><?php echo $note->lokasi; ?></a> )
                            </div>
                            <div class="timeline-body" style="padding-top:0px;">
                              <div class="row" align="center">
                                <font size='4px' style="padding-top:0px;"><b><?php echo $note->header; ?></b></font>
                              </div>
                              <div class="row">
<?php
  $col_quest = 12;
  if($note->foto != NULL){
    $col_quest = $col_quest - 2;
?>
                                <div class="col-md-2" style="z-index:5;">
                                  <img onclick="show_modal_show_foto('<?php echo $note->foto; ?>')" src="<?php echo $note->foto; ?>" class="img-text" width="100%" align="left"/>
                                </div>
<?php
  }
  if($note->video != NULL){
    $col_quest = $col_quest - 2;
?>
                                <div class="col-md-2">
                                  <video width="100%" controls>
                                    <source src="<?php echo $note->video; ?>" type="video/mp4">
                                    Your browser/device does not support HTML5 video.
                                  </video>
                                </div>
<?php
  }
  $sure_name = explode(' ', $note->notif_quest_nama);
?>
                                <div class="col-md-<?php echo $col_quest; ?>">
                                  <p><?php echo $sure_name[0]; ?> : <?php echo $note->quest; ?></p>
                                </div>
                              </div>
<?php
  if(date('Y-m-d') <= $note->tgl_close || $note->tgl_close == NULL){
    if($note->status == 0){
      $status = 'Open';
      $status_color = '#FF0000';
    }
    // else if($note->status == 1){
    //   $status = 'Comment';
    //   $status_color = '#FFFF00';
    // }
    else{
      $status = 'Close';
      $status_color = '#00FF00';
    }
  }
  else{
    $status = 'Close';
    $status_color = '#00FF00';
  }
?>
                            <ul class="list-tags">
                              <li><a style="background-color:<?php echo $status_color; ?>;color:black;"><span class="fa fa-tag"></span> <b><?php echo $status; ?></b></a></li>
                            </ul>
                          </div>
<?php
  $note_comment = $this->Noted_model->get_note_comment($note->id);
  foreach ($note_comment as $nc) {
?>
                          <div class="timeline-body comments">
                            <div class="comment-item">
<?php
  if($nc->pic == $_SESSION['index'] && ($status != 'Close' || date('Y-m-d') <= $note->tgl_close)){
?>
                              <div class="pull-right">
                                  <a href="javascript:show_modal_delete_comment('<?php echo $nc->id; ?>', '<?php echo $nc->foto; ?>', '<?php echo $nc->video; ?>');"><span class="glyphicon glyphicon-remove-circle"></span></a>
                              </div>
<?php
  }
?>
                              <img <?php if($nc->foto_pic != NULL) echo "onclick='show_modal_show_foto(\"$nc->foto_pic\")'"; ?> src="<?php if($nc->foto_pic != NULL) echo $nc->foto_pic; else echo "/PIS/assets/images/profile/empty-profile.png"; ?>"/>
                              <div class="row">
                                <p class="comment-head">
                                  <b><?php echo $nc->nama; ?></b> - <span class="text-muted"><?php echo $nc->deskripsi; ?></span>
                                </p>
<?php
  if($nc->foto != NULL){
?>
                                <img onclick="show_modal_show_foto('<?php echo $nc->foto; ?>')" src="<?php echo $nc->foto; ?>" class="img-text" width="100%" align="left"/>
<?php
  }
  // if($nc->video != NULL){
?>
                                <!-- <video width="100%" controls>
                                  <source src="<?php echo $nc->video; ?>" type="video/mp4">
                                  Your browser/device does not support HTML5 video.
                                </video> -->
<?php
  // }
?>
                                <p><?php echo $nc->comment; ?></p>
                                </div>
                              <small class="text-muted"><?php echo format_tgl($nc->tgl_start); ?> - <?php echo date('H:i', strtotime($nc->tgl_start)); ?></small>
                            </div>
                          </div>
<?php
  }
?>
                          <div class="timeline-footer">
<?php
  if(date('Y-m-d') <= $note->tgl_close || $note->tgl_close == NULL){
    if($note->category == 1 && $note->status == 0 && sizeof($note_comment) == NULL){
?>
<!--
                            <button type="button" class="btn btn-info" onclick="show_modal_edit('<?php echo $note->id; ?>', '<?php echo $note->pg; ?>', '<?php echo $note->wilayah; ?>', '<?php echo $note->lokasi; ?>', '<?php echo $note->header; ?>', '<?php echo $note->nama_answer; ?>', '<?php echo $note->quest; ?>')">Edit</button>
-->
                            <button type="button" class="btn btn-danger" id='btn_delete' onclick="show_modal_delete('<?php echo $note->id; ?>', '<?php echo $note->pg; ?>', '<?php echo $note->wilayah; ?>', '<?php echo $note->lokasi; ?>', '<?php echo $note->header; ?>', '<?php echo $note->notif_issue_nama; ?>', '<?php echo $note->foto; ?>', '<?php echo $note->video; ?>')">Hapus</button>
<?php
    }
    else if($note->status == 0){
      if($note->pic_quest != $_SESSION['index']){
        $notif_issue = $note->pic_quest.', '.$note->pic_issue;
      }
      else{
        $notif_issue = $note->pic_issue;
      }
      $notif_info = $note->pic_info;
?>
                            <button type="button" class="btn btn-info" id='btn_reply' onclick="show_modal_reply('<?php echo $note->id; ?>', '<?php echo $note->pg; ?>', '<?php echo $note->wilayah; ?>', '<?php echo $note->lokasi; ?>', '<?php echo $note->header; ?>', '<?php echo $note->notif_quest_nama; ?>', '<?php echo $note->quest; ?>', '<?php echo $notif_issue; ?>', '<?php echo $notif_info; ?>')">Comment</button>
<?php
    }
    if($note->wilayah == $_SESSION['code'] && ($note->status == 0 && date('Y-m-d') <= $note->tgl_close)){
?>
                            <button type="button" class="btn btn-success" id='btn_close' onclick="show_modal_close('<?php echo $note->id; ?>')">Close</button>
<?php
    }
  }
?>
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
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTENT -->

<!-- The Modal -->
<div id="close_note" class="modal">
  <span class="close" onclick="close_modal_close()">&times;</span>
  <!-- Modal content -->
  <div class="modal-content">
    <div class="row" align='center'>
      <h3 id='lokasi_delete'></h3>
    </div>
    <div class="row">
      <div class="col-md-6">
        <form action="/PIS/Upload/close_note" method="post">
          <input type="hidden" name='id' id='id_close'>
          <table width='100%'>
            <tr>
              <td colspan="3" align='center' style="padding-top:2px;padding-bottom:2px;width:50px;">
                Anda yakin ingin menutup note ini?
              </td>
            </tr>
            <tr>
              <td colspan="3" align='center' style="padding-top:5px;padding-bottom:5px;width:50px;">
                <button type="submit" class="btn btn-danger">Close</button>
              </td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>

</div>

<!-- The Modal -->
<div id="delete_note_comment" class="modal">
  <span class="close" onclick="close_modal_delete_comment()">&times;</span>
  <!-- Modal content -->
  <div class="modal-content">
    <div class="row" align='center'>
      <h3 id='lokasi_delete'></h3>
    </div>
    <div class="row">
      <div class="col-md-6">
        <form action="/PIS/Upload/delete_note_comment" method="post">
          <input type="hidden" name='id' id='id_delete_comment'>
          <input type="hidden" name='foto' id='foto_delete_comment'>
          <input type="hidden" name='video' id='video_delete_comment'>
          <table width='100%'>
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
<div id="delete_note" class="modal">
  <span class="close" onclick="close_modal_delete()">&times;</span>
  <!-- Modal content -->
  <div class="modal-content">
    <div class="row" align='center'>
      <h3 id='lokasi_delete'></h3>
    </div>
    <div class="row">
      <div class="col-md-6">
        <form action="/PIS/Upload/delete_note" method="post">
          <input type="hidden" name='id' id='id_delete'>
          <input type="hidden" name='foto' id='foto_delete'>
          <input type="hidden" name='video' id='video_delete'>
          <table width='100%'>
            <tr>
              <td style="padding-top:5px;padding-bottom:2px;width:70px;">
                Judul
              </td>
              <td style="padding-top:5px;padding-bottom:2px;width:10px;">
                :
              </td>
              <td style="padding-top:5px;padding-bottom:2px;">
                <div id='header_delete'></div>
              </td>
            </tr>
            <tr>
              <td style="padding-top:2px;padding-bottom:2px;width:70px;">
                Issue To
              </td>
              <td style="padding-top:2px;padding-bottom:2px;width:10px;">
                :
              </td>
              <td style="padding-top:2px;padding-bottom:2px;">
                <div id='pic_answer_delete'></div>
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


<div id="reply_note" class="modal">
  <span class="close" onclick="close_modal_reply()">&times;</span>
  <!-- Modal content -->
  <div class="modal-content">
    <div class="row" align='center'>
      <h3 id='lokasi_reply'></h3>
    </div>
    <div class="row">
      <div class="col-md-6">
        <form action="/PIS/Upload/reply_note" method="post" enctype="multipart/form-data" >
          <input type="hidden" name='id' id='id_reply'>
          <input type="hidden" name='lokasi' id='lokasi'>
          <input type="hidden" name='notif_issue' id='notif_issue'>
          <input type="hidden" name='notif_info' id='notif_info'>
          <table width='100%'>
            <tr>
              <td style="padding-top:5px;padding-bottom:2px;width:50px;">
                Judul
              </td>
              <td style="padding-top:5px;padding-bottom:2px;width:10px;">
                :
              </td>
              <td style="padding-top:5px;padding-bottom:2px;">
                <div id='header_reply'></div>
              </td>
            </tr>
            <tr>
              <td style="padding-top:2px;padding-bottom:2px;width:50px;">
                Issue By
              </td>
              <td style="padding-top:2px;padding-bottom:2px;width:10px;">
                :
              </td>
              <td style="padding-top:2px;padding-bottom:2px;">
                <div id='pic_quest_reply'></div>
              </td>
            </tr>
            <tr>
              <td style="padding-top:2px;padding-bottom:2px;width:50px;">
                Question
              </td>
              <td style="padding-top:2px;padding-bottom:2px;width:10px;">
                :
              </td>
              <td style="padding-top:2px;padding-bottom:2px;">
                <div id='quest_reply'></div>
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
                <input type="file" class="btn btn-default" name="foto" id="foto" style="width:100%;">
              </td>
            </tr>
            <!-- <tr>
              <td style="padding-top:2px;padding-bottom:2px;width:50px;">
                Video
              </td>
              <td style="padding-top:2px;padding-bottom:2px;width:10px;">
                :
              </td>
              <td style="padding-top:2px;padding-bottom:2px;">
                <input type="file" class="btn btn-default" name="video" id="video" style="width:100%;">
              </td>
            </tr> -->
            <tr>
              <td style="padding-top:2px;padding-bottom:5px;width:50px;">
                Note
              </td>
              <td style="padding-top:2px;padding-bottom:5px;width:10px;">
                :
              </td>
              <td style="padding-top:2px;padding-bottom:5px;">
                <textarea id='comment' name="comment" rows="5" style="width:100%;" placeholder="Text here.." required></textarea>
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

  });
  function dashboard(){
    window.location.href="/PIS/dashboard/dashboard";
  }
  function main_menu(){
    window.location.href="/PIS/dashboard/main_menu";
  }
  function history_login(){
    window.location.href="/PIS/report/history_login";
  }
  function ubah_password(){
    var password_lama = document.getElementById("password_lama").value;
    var password_baru = document.getElementById("password_baru").value;

    if(password_lama != '<?php echo $_SESSION['password']; ?>'){
      alert('Password lama anda salah');
      document.getElementById("password_baru").value = "";
      document.getElementById("password_lama").value = "";
    }
    else if(password_lama == password_baru){
      alert('Password baru tidak boleh sama');
      document.getElementById("password_baru").value = "";
    }
    else{
      window.location.href="/PIS/dashboard/ubah_password?index=<?php echo $_SESSION['index']; ?>&password="+password_baru;
    }
  }

  // Get the modal
  var modal_delete = document.getElementById("delete_note");
  var modal_delete_comment = document.getElementById("delete_note_comment");
  var modal_close = document.getElementById("close_note");
  var modal_reply = document.getElementById("reply_note");

  // Get the button that opens the modal
  var btn_delete = document.getElementById("btn_delete");
  var btn_reply = document.getElementById("btn_reply");

  // Get the <span> element that closes the modal
  // var span = document.getElementsByClassName("close")[0];

  // When the user clicks the button, open the modal
  // btn.onclick = function() {
  //   modal_delete.style.display = "block";
  // }

  // When the user clicks on <span> (x), close the modal
  // span.onclick = function() {
  //   modal_delete.style.display = "none";
  // }

  // When the user clicks anywhere outside of the modal, close it
  // window.onclick = function(event) {
  //   if (event.target == modal_delete) {
  //     modal.style.display = "none";
  //   }
  // }

  function show_modal_reply(id, pg, wilayah, lokasi, header, pic_quest, quest, notif_issue, notif_info){
    modal_reply.style.display = "block";
    document.getElementById("id_reply").value = id;
    document.getElementById("lokasi").value = lokasi;
    document.getElementById("notif_issue").value = notif_issue;
    document.getElementById("notif_info").value = notif_info;
    document.getElementById("lokasi_reply").innerHTML = pg + ' - ' + wilayah + ' - ' + lokasi;
    document.getElementById("header_reply").innerHTML = header;
    document.getElementById("pic_quest_reply").innerHTML = pic_quest;
    document.getElementById("quest_reply").innerHTML = quest;
  }
  function show_modal_delete(id, pg, wilayah, lokasi, header, pic_answer, foto, video){
    modal_delete.style.display = "block";
    document.getElementById("id_delete").value = id;
    document.getElementById("foto_delete").value = foto;
    document.getElementById("video_delete").value = video;
    document.getElementById("lokasi_delete").innerHTML = pg + ' - ' + wilayah + ' - ' + lokasi;
    document.getElementById("header_delete").innerHTML = header;
    document.getElementById("pic_answer_delete").innerHTML = pic_answer;
  }
  function show_modal_delete_comment(id, foto, video){
    modal_delete_comment.style.display = "block";
    document.getElementById("id_delete_comment").value = id;
    document.getElementById("foto_delete_comment").value = foto;
    document.getElementById("video_delete_comment").value = video;
  }
  function show_modal_close(id){
    modal_close.style.display = "block";
    document.getElementById("id_close").value = id;
  }
  function show_modal_edit(id, pg, wilayah, lokasi, header, pic_quest, quest){
    modal_edit.style.display = "block";
    document.getElementById("id_edit").value = id;
    document.getElementById("lokasi_reply").innerHTML = pg + ' - ' + wilayah + ' - ' + lokasi;
    document.getElementById("header_edit").value = header;
    document.getElementById("pic_quest_edit").innerHTML = pic_quest;
    document.getElementById("quest_edit").value = quest;
    modal_edit.style.display = "block";
  }

  function close_modal_reply(){
    modal_reply.style.display = "none";
  }
  function close_modal_close(){
    modal_close.style.display = "none";
  }
  function close_modal_delete(){
    modal_delete.style.display = "none";
  }
  function close_modal_delete_comment(){
    modal_delete_comment.style.display = "none";
  }
  function close_modal_edit(){
    modal_edit.style.display = "none";
  }

  function ubah_bio(){
    var tempat_lahir = document.getElementById("tempat_lahir").value;
    var tgl_lahir = document.getElementById("tahun_lahir").value+'-'+document.getElementById("bulan_lahir").value+'-'+document.getElementById("tgl_lahir").value;
    var alamat = document.getElementById("alamat").value;
    var no_hp = document.getElementById("no_hp").value;

    window.location.href="/PIS/dashboard/ubah_bio?index=<?php echo $_SESSION['index']; ?>&bio1="+tempat_lahir+"&bio2="+tgl_lahir+"&bio3="+alamat+"&bio4="+no_hp;
  }

  function show_modal_show_foto(id){
    modal_show_foto.style.display = "block";
    var img = document.getElementById("show_foto");
    img.src = id;
  }
  function close_modal_show_foto(){
    modal_show_foto.style.display = "none";
  }
</script>
