<html lang="en" class="body-full-height">
  <head>
    <!-- META SECTION -->
    <title>PIS</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="/PIS/assets/images/logo-ggf.png" type="image/ico" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="/PIS/assets/css/theme-white.css"/>
    <!-- EOF CSS INCLUDE -->
  </head>
  <body>

    <div class="login-container" id="background" style="background-image:url('/PIS/assets/images/profile/empty-background.jpg');">

      <div class="login-box animated fadeInDown">
        <div class="col-md-12" align='center' style="padding-bottom:10px;">
          <img src="/PIS/assets/images/logo-login.png" alt="Location is not available" width="100px">
        </div>
        <div class="login-body" style="background-color:#404040;opacity:0.9;">
          <div class="login-title" align='center'><strong>Plantation Information System</strong></div>
          <form action="/PIS/dashboard/cek_login" class="form-horizontal" method="post">
          <div class="form-group">
            <div class="col-md-12">
              <input type="text" class="form-control" placeholder="Username" id='username' name='username'/>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-12">
              <input type="password" class="form-control" placeholder="Password" id='password' name='password'/>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-6">
              <a href="#" class="btn btn-link btn-block">Forgot your password?</a>
            </div>
            <div class="col-md-6">
              <button type="submit" class="btn btn-info btn-block">Log In</button>
            </div>
          </div>
          </form>
        </div>
        <div class="login-footer">
          <div class="pull-left">
            &copy; 2019 PIS
          </div>
          <div class="pull-right">
            <a href="#">About</a> |
            <a href="#">Contact Us</a>
          </div>
        </div>
      </div>

    </div>

  </body>
</html>
<script>
  document.addEventListener("DOMContentLoaded", function(event) {
    //Resolusi Layar
    if(screen.width <= 768){
      document.getElementById("background").style.backgroundSize = "100% 100%";
    }
    else{
      document.getElementById("background").style.backgroundSize = "contain";
    }
  });
</script>
