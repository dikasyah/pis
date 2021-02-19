<?php
  function format_tgl($tgl){
    if($tgl == NULL){
      return "-";
    }
    else{
      switch (date("n", strtotime($tgl))) {
        case '1':
          return date("j", strtotime($tgl))." Januari ".date("Y", strtotime($tgl));
        break;
        case '2':
          return date("j", strtotime($tgl))." Februari ".date("Y", strtotime($tgl));
        break;
        case '3':
          return date("j", strtotime($tgl))." Maret ".date("Y", strtotime($tgl));
        break;
        case '4':
          return date("j", strtotime($tgl))." April ".date("Y", strtotime($tgl));
        break;
        case '5':
          return date("j", strtotime($tgl))." Mei ".date("Y", strtotime($tgl));
        break;
        case '6':
          return date("j", strtotime($tgl))." Juni ".date("Y", strtotime($tgl));
        break;
        case '7':
          return date("j", strtotime($tgl))." Juli ".date("Y", strtotime($tgl));
        break;
        case '8':
          return date("j", strtotime($tgl))." Agustus ".date("Y", strtotime($tgl));
        break;
        case '9':
          return date("j", strtotime($tgl))." September ".date("Y", strtotime($tgl));
        break;
        case '10':
          return date("j", strtotime($tgl))." Oktober ".date("Y", strtotime($tgl));
        break;
        case '11':
          return date("j", strtotime($tgl))." November ".date("Y", strtotime($tgl));
        break;
        case '12':
          return date("j", strtotime($tgl))." Desember ".date("Y", strtotime($tgl));
        break;
      }
    }
  }
?>
<html lang="en" class="body-full-height">
  <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- META SECTION -->
    <title>PIS</title>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="/PIS/assets/images/logo-ggf.png" type="image/ico" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="/PIS/assets/css/theme-white.css"/>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- EOF CSS INCLUDE -->

    <style>
      .badge_info {
        position: absolute;
        top: -5px;
        right: 15px;
        padding: 5px 10px;
        border-radius: 50%;
        background-color: blue;
        color: white;
      }

      .badge_issue {
        position: absolute;
        top: -5px;
        right: -10px;
        padding: 5px 10px;
        border-radius: 50%;
        background-color: red;
        color: white;
      }
    </style>
  </head>
  <body>
<?php
  if($account['background'] != NULL){
?>
    <div class="login-container" style="background-image:url('<?php echo $account['background']; ?>');background-size:contain;">
<?php
  }
  else{
?>
    <div class="login-container" style="background-color:#323232;background-size:contain;">
<?php
  }
?>
      <div class="login-box animated fadeInDown">
        <div class="login-logo"></div>
        <div class="login-body" style="background-color:#404040;opacity:0.9;">
          <div class="login-title" align='center'>
            Rolling Forecast per <?php echo format_tgl($konstanta['nilai']); ?> <br />
            <?php echo $_SESSION['nama']; ?>
          </div>
          <form action="index.html" class="form-horizontal" method="post">
          <div class="form-group">
            <div class="row">
              <div class="col-md-6" style="padding-left:0px;padding-right:0px;" align='center'>
                <div class="row">
<?php
  if($account['foto'] != NULL){
?>
                  <a class="gallery-item" href="<?php echo $account['foto']; ?>" title="<?php echo $_SESSION['nama']; ?>" data-gallery>
                    <div class="w3-container" style="padding-left:2px;padding-right:2px;">
                      <img id='photo_profile' src="<?php echo $account['foto']; ?>" class="w3-border"  style="padding:4px;" alt="<?php echo $_SESSION['nama']; ?>" width="100%"/>
                    </div>
                  </a>
<?php
  }
  else{
?>
                  <div class="w3-container" style="padding-left:2px;padding-right:2px;">
                    <img id='photo_profile' src="/PIS/assets/images/profile/empty-profile.png" class="w3-border"  style="padding:4px;" alt="Photo Profile" width="100%"/>
                  </div>
<?php
  }
?>
                </div>
              </div>
              <div class="col-md-6">
                <div class="col-md-12" style="padding:2px;">
                  <button type="button" class="btn btn-lg btn-info btn-block" style="text-align:left;" onclick="dashboard()">Total Cost WIP</button>
                </div>
                <div class="col-md-12" style="padding:2px;">
                  <button type="button" class="btn btn-lg btn-info btn-block" style="text-align:left;" onclick="wip_pm()">PM Cost WIP</button>
                </div>
                 <div class="col-md-12" style="padding:2px;">
                  <button type="button" class="btn btn-lg btn-info btn-block" style="text-align:left;" onclick="hpp_total()">Finished Harvest</button>
                </div>
                <div class="col-md-12" style="padding:2px;">
                  <button type="button" class="btn btn-lg btn-info btn-block" style="text-align:left;" onclick="history_gallery()">Drone Utilization</button>
                </div>
                <div class="col-md-12" style="padding:2px;">
                  <button type="button" class="btn btn-lg btn-info btn-block" style="text-align:left;" onclick="profile()">User Profile</button>
                  <span class="badge_info"><?php if($notif['info'] != NULL) echo $notif['info']; else echo '0'; ?></span>
                  <span class="badge_issue"><?php if($notif['issue'] != NULL) echo $notif['issue']; else echo '0'; ?></span>
                </div>
<?php
  if(($account['crud'] == '1' && $account['deskripsi'] == 'PPIC') || $account['crud'] == '0'){
?>
                <!-- <div class="col-md-12" style="padding:2px;">
                  <button type="button" class="btn btn-lg btn-info btn-block" style="text-align:left;" onclick="warning_lokasi()">Warning per Location</button>
                </div> -->
                
<?php
  }
  if($account['crud'] == '0'){
?>
                <div class="col-md-12" style="padding:2px;">
                  <button type="button" class="btn btn-lg btn-info btn-block" style="text-align:left;" onclick="workshop()">Workshop</button>
                </div>
<?php
  }
  if($account['crud'] == '2' || $account['crud'] == '3' || $account['crud'] == '4'){
?>
                <!-- <div class="col-md-12" style="padding:2px;">
                  <button type="button" class="btn btn-lg btn-info btn-block" style="text-align:left;" onclick="workshop()">Workshop</button>
                </div> -->
<?php
  }
?>
                <div class="col-md-12" style="padding:2px;">
                  <button type="button" class="btn btn-lg btn-info btn-block" style="text-align:left;" onclick="logout()">Logout</button>
                </div>
              </div>
            </div>
          </div>
          </form>
        </div>
      </div>

    </div>

  </body>
</html>
<script>
  document.addEventListener("DOMContentLoaded", function(event) {
    //Resolusi Layar
    if(screen.width <= 768){
      document.getElementById("photo_profile").style.width = "75%";
    }
  });
  function profile(){
    window.location.href="/PIS/dashboard/profile";
  }
  function dashboard(){
    window.location.href="/PIS/dashboard/dashboard";
  }
  function warning_lokasi(){
    window.location.href="/PIS/dashboard/warning_lokasi";
  }
  function history_gallery(){
    window.location.href="/PIS/Gallery/history_gallery";
  }
  function wip_pm(){
    window.location.href="/PIS/WIP_PM_Dashboard";
  }
  function hpp_total(){
    window.location.href="/PIS/HPP_Total_Dashboard";
  }
  function logout(){
    window.location.href="/PIS/dashboard/logout";
  }
  function workshop(){
    window.location.href="/PIS/Workshop";
  }
  var countDownDate = new Date("<?php echo date("M j, Y H:i:s", strtotime(date("M j, Y H:i:s")) + 30600); ?>").getTime();
  var x = setInterval(function(){
    var now = new Date().getTime();
    var distance = countDownDate - now;

    // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    console.log(hours + "H " + minutes + "M " + seconds + "S");

    if (distance < 0) {
      clearInterval(x);
      window.location.href="/PIS/dashboard/logout";
    }
  }, 1000);
</script>
