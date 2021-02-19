<!DOCTYPE html>
  <head>
    <title>PIS</title>
    <link rel="icon" href="/PIS/assets/images/logo-ggf.png" type="image/ico" />
    <meta name="keywords" content="" />
  	<meta name="description" content="" />
    <!--
    Polygon Template
    https://templatemo.com/tm-400-polygon
    -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="/PIS/assets/Polygon/css/bootstrap.min.css" rel="stylesheet">
    <link href="/PIS/assets/Polygon/css/font-awesome.min.css" rel="stylesheet">
    <link href="/PIS/assets/Polygon/css/templatemo_misc.css" rel="stylesheet">
    <link href="/PIS/assets/Polygon/css/templatemo_style.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,600' rel='stylesheet' type='text/css'>
    <link href="/PIS/assets/css/prototype.css" rel="stylesheet">

    <script src="/PIS/assets/Polygon/js/jquery-1.10.2.min.js"></script>
  	<script src="/PIS/assets/Polygon/js/jquery.lightbox.js"></script>
  	<script src="/PIS/assets/Polygon/js/templatemo_custom.js"></script>
    <script>
      var sessionValue = "<?php echo isset($_SESSION['status']) ; ?>";
    </script>
  
  </head>
<?php
  $agent = $_SERVER['HTTP_USER_AGENT'];
  if(preg_match('/iPhone|Android|Blackberry/i', $agent)){
?>
  <body style="background-image:url('/PIS/assets/Polygon/images/IOT-D1.png');background-size:cover;">
<?php
  }
  else {
?>
  <body style="background-image:url('/PIS/assets/Polygon/images/IOT-A1.png');background-repeat: no-repeat; background-size: 100% 750px;">
<?php
  }
?>
  <!-- <body style="background-color:#393e42;background-size:cover;"> -->
  	<div class="site-header">
      <div class="main-navigation">
      	<div class="responsive_menu">
    			<ul>
            <li><a class="show-1 templatemo_home" href="#"><span class="fa fa-home"></span>Home</a></li>
            <li><a  id="profileButton" href='<?php echo site_url('/PIS/dashboard/profile') ?>'><span class="fa fa-user "></span>Profile</a></li>
            <li><a class="show-5 templatemo_page5" id="loginButton1" href="#"><span class="fa fa-lock"></span>Login</a></li>
            <li><a style="display:none;" id="logoutButton1" href='<?php echo site_url('/dashboard/logout') ?>'><span class="fa fa-lock"></span>Logout</a></li>
    			</ul>
        </div>
        <div class="container">
          <div class="row templatemo_gallerygap templatemo_gallerygap_prototype">
            <div class="col-md-12 responsive-menu">
				      <a href="#" class="menu-toggle-btn">
               <i class="fa fa-bars" style="color:#000000;"></i>
              </a>
            </div> <!-- /.col-md-12 -->
            <div class="col-md-3 text-center main_menu">
            	<a href="#"><img src="/PIS/assets/Polygon/images/PIS.png" alt="Polygon HTML5 Template"></a>
            </div>
            <div class="col-sm-12 text-center responsive-menu">
            	<a href="#"><img src="/PIS/assets/Polygon/images/PIS-Min.png" alt="Polygon HTML5 Template"></a>
            </div>
  					<div class="col-md-9 main_menu">
  						<ul>
                <li><a style="width:100px" class="show-1 templatemo_home active" href="#"><span class="fa fa-home"></span>Home</a></li>
                <li><a style="width:100px" id="profileButton2"  href='<?php echo site_url('dashboard/profile') ?>'><span class="fa fa-user "></span>Profile</a></li>
                <li><a class="show-5 templatemo_page5" id="loginButton2" href="#"><span class="fa fa-lock"></span>Login</a></li>
                <li><a style="display:none; "  id="logoutButton2" href='<?php echo site_url('/dashboard/logout') ?>'><span class="fa fa-lock"></span>Logout</a></li>
  						</ul>
  					</div> <!-- /.col-md-12 -->
  				</div> <!-- /.row -->
  			</div> <!-- /.container -->
  		</div> <!-- /.main-navigation -->
    </div><!-- /.site-header -->
    
    
<?php
  if($user != NULL){
    $option1 = 'javascript:hpp_total();';
    $option2 = 'javascript:dashboard();';
    $option3 = 'javascript:wip_pm();';
    $option4 = 'javascript:web_gis();';
    $option5 = 'javascript:profile();';
  }
  else{
    $option1 = 'javascript:must_login();';
    $option2 = 'javascript:must_login();';
    $option3 = 'javascript:must_login();';
    $option4 = 'javascript:must_login();';
    $option5 = 'javascript:must_login();';
  }
?>
    <div id="menu-container">
      <!-- gallery start -->
          <div class="content homepage" id="menu-1">
        <div class="container"  id="prototypeMenuOutput" >
        </div>
      </div>
      <!-- gallery end -->
      <!-- contact start -->
      <div class="content contact" id="menu-5">
        <div class="container">
         	<div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="row">
                <div class="col-md-12 leftalign" style="background-color:#000000;opacity:0.7;">
                  <div class="templatemo_contacttitle">Contact Information</div>
                  <div class="clear"></div>
                  <p>If you have any problem, issue, suggest or comment. You can contact below here.</p>
                  <div class="templatemo_address">
                  	<ul>
                    	<li class="left fa fa-map-marker"></li>
                      <li class="right">JL. Raya Arah Menggala Km 77,<br>Terbanggi Besar, Lampung Tengah,<br>Lampung 34163</li>
                      <li class="clear"></li>
                      <li class="left fa fa-phone"></li>
                      <li class="right">Ext. 10013</li>
                      <li class="clear"></li>
                      <li class="left fa fa-envelope"></li>
                      <li class="right">asri.julianda@terbanggi.ggpc.tbg</li>
                    </ul>
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-12 p-1">
                  <button type="button" class="form-control btn btn-info" name="button" onclick="handbook()">User Manual</button>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
            	<form action='<?php echo site_url('dashboard/cek_Login') ?>' method="post">
              	<div class="templatemo_form">
                	<input name="username" type="text" class="form-control" id="username" placeholder="Username" maxlength="20" onkeypress="return format_karakter(event)">
              	</div>
              	<div class="templatemo_form">
                	<input name="password" type="password" class="form-control" id="password" placeholder="Password" onkeypress="return format_password(event)">
              	</div>
              	<div class="templatemo_form"><input type="submit" class="btn btn-primary" value="Login"></div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- gallery end -->
      <!-- contact start -->
      
      <!-- contact end -->
    </div>
    <!-- footer start -->
    <!-- <div class="templatemo_footer">
    	<div class="container">
      	<div class="row">
        	<div class="col-md-12 col-sm-12 text-center">
          	<span>Copyright &copy; <?php echo date('Y');?> GGF | PIS</span>
          </div>
          <div class="col-md-3 col-sm-12 templatemo_rfooter">
        	  <a href="#">
             	<div class="hex_footer">
  		          <span class="fa fa-facebook"></span>
              </div>
            </a>
            <a href="#">
              <div class="hex_footer">
                <span class="fa fa-twitter"></span>
              </div>
            </a>
            <a href="#">
             	<div class="hex_footer">
		            <span class="fa fa-linkedin"></span>
              </div>
            </a>
            <a href="#">
            	<div class="hex_footer">
                <span class="fa fa-rss"></span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div> -->
    <!-- footer end -->
	<!-- templatemo 400 polygon -->
	<div class="pop" id="nlModal">
        <div class="modal-header">
            <div class="title">Not Login</div>
            <button  class="close-button" onclick="popClose('nlModal')">&times;</button>
        </div>
        <div class="modal-body">
            <p> Please Login to continue</p>
        </div>
    </div>
<!--not login pop up end-->
<!--login result pop up-->
    <div class="pop" id="rModal">
        <div class="modal-header">
            <div class="title">Login Result</div>
            <button  class="close-button" onclick="popClose('rModal')">&times;</button>
        </div>
        <div class="modal-body">
            <p> Please Login to continue</p>
        </div>
    </div>
<!--login result pop up end-->
<!--menu pop up-->
<div class="menuPop" id="menuModal">
        <div class="modal-header">
          <div class="row">
            <div class="col-sm-2 pmh-one" >
              <p>Menu</p>
            </div>
            <div class="col-sm-9 pmh-two" >
              
              <table style="width:100%;">
                <thead>
                  <tr>
                    <td style=" " id="name">-</td>
                    <td style="width:18%;"><button class="first-menu" type="button" onclick="menuBack()" id="submenuButton">Back</button></td>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
        <div class="modal-body" style="padding:15px; ">
          <div class="menu-pop-body-container" id="outputSubmenu">
            <div class="" id="firstMenu">
              
            </div>
            <div class="hide" id="secondMenu">
              
            </div>
          </div>
           
        </div>
    </div>

<!--menu pop up end-->
<!--overlay for pop-->
<div id="overlay"></div>
 
<?php
  if($this->input->get('validation') == 'Success'){
?>
  <script type="text/javascript">
    alert('Login Success');
  </script>
<?php
  }
  else if($this->input->get('validation') == 'Fail'){
?>
  <script type="text/javascript">
    alert('Login Failed');
  </script>
<?php
  }
?>
<script type="text/javascript">

getMainMenu();   
  function format_karakter(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
      if ((charCode >= 48 && charCode <= 57) || (charCode >= 65 && charCode <= 90) || (charCode >= 97 && charCode <= 122) || charCode == 95 || charCode == 46 || charCode == 46){
	       return true;
      }
	  return false;
  }
  function format_password(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
      if ((charCode != 34 && charCode != 37 && charCode != 39 && charCode != 45 && charCode != 47 && charCode != 59 && charCode != 61 && charCode != 64 && charCode != 92 && charCode != 96 && charCode != 126)){
	       return true;
      }
	  return false;
  }

  function profile(){
    window.location.href="/PIS/index.php/dashboard/profile";
  }
  function web_gis(){
    window.location.href="/PIS/index.php/GIS_Dashboard";
  }
  function dashboard(){
    window.location.href="/PIS/index.php/dashboard/dashboard";
  }
  function wip_pm(){
    window.location.href="/PIS/index.php/WIP_PM_Dashboard";
  }
  function hpp_total(){
    window.location.href="/PIS/index.php/HPP_Total_Dashboard";
  }
  function warning_lokasi(){
    window.location.href="/PIS/index.php/dashboard/warning_lokasi";
  }
  function logout(){
    window.location.href="/PIS/index.php/dashboard/logout";
  }
  function workshop(){
    window.location.href="/PIS/index.php/Workshop";
  }
  function handbook(){
    window.location.href="/Handbook/";
  }
  function must_login(){
    alert('Anda Belum Login');

    return false;
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
      //window.location.href="/PIS/dashboard/logout";
    }
  }, 1000);
  
  if(sessionValue != '1'){
  document.getElementById("profileButton").setAttribute('href', "javascript:must_login()");
  document.getElementById("profileButton2").setAttribute('href', "javascript:must_login()");
  document.getElementById("loginButton1").setAttribute("style","display:block");
  document.getElementById("loginButton2").setAttribute("style","display:block");
  document.getElementById("logoutButton1").setAttribute("style","display:none !important")
  document.getElementById("logoutButton2").setAttribute("style","display:none !important")
}else{
  
  document.getElementById("loginButton1").setAttribute("style","display:none !important");
  document.getElementById("loginButton2").setAttribute("style","display:none !important");
  document.getElementById("logoutButton1").setAttribute("style","display:block")
  document.getElementById("logoutButton2").setAttribute("style","display:block")
}

function getMainMenu(){
 $.ajax({
    type: 'POST',
    url: 'https://ai.gg-foods.com/PIS/index.php/dashboard/ambilmainmenu',
    dataType: 'json',
    success: function(data){
      console.log(data);
      let output = '';
      let ctr = 0;
      for(let i = 0; i<data.length;i++){
        if(ctr == 0){
          output += 
        ` <div class="prototype-menu-container">
        `
        }
        output += 
            `<div class="prototype-menu" onclick="submenu('${data[i].menu}&${data[i].menus_id}');" style="background-color:${data[i].color}">
              <img src="${data[i].image}">
              <p>${data[i].menu}</p>  
            </div>
            `;
        ctr += 1;
        if(i == data.length-1 && ctr < 2){
          for(let j = ctr; j < 3; j++){
            output += `<div class="prototype-submenu" ></div>
            `
          }
          output += `</div>
          `
        }
        if(ctr == 2){
          output += `</div>
          `
          ctr = 0;
        }
      }
      document.querySelector('#prototypeMenuOutput').innerHTML = output;
    }
 });
}

function submenu(menuName){
    const modal = document.getElementById("menuModal");
    var fm = document.getElementById("firstMenu");
    var sm = document.getElementById("secondMenu");
    const loginmodal = document.getElementById("nlModal");
    var smButton = document.getElementById("submenuButton")
    // var lable = document.getElementById("targetLable");
    let menus = menuName.split("&");
    let menu = menus[0];
    if(sessionValue != '1'){
      must_login()
    }else{
      if(menu == 'Drone Utilization'){
        window.location.href="<?php echo site_url('GIS_Dashboard') ?>"
      }else{
        getMenu(menuName);
        fm.classList.remove('hide');
        //sm.classList.remove('show');
        //smButton.classList.remove('show');
        // lable.classList.remove('secondScreen');
        //fm.classList.add('show');
        sm.classList.add('hide');
        //smButton.classList.add('hide');
      
        if (modal == null) return
        modal.classList.add('active');
        overlay.classList.add('active');
        overlay.addEventListener('click', () => {
            modal.classList.remove('active')
            overlay.classList.remove('active')
        })
      }
    }
}
function popClose(id){
    const modal = document.getElementById(id);
    modal.classList.remove('active')
    overlay.classList.remove('active')
}

if(sessionValue != '1'){
  document.getElementById("profileButton").setAttribute('href', "javascript:must_login()");
  document.getElementById("profileButton2").setAttribute('href', "javascript:must_login()");
  document.getElementById("loginButton1").setAttribute("style","display:block");
  document.getElementById("loginButton2").setAttribute("style","display:block");
  document.getElementById("logoutButton1").setAttribute("style","display:none !important")
  document.getElementById("logoutButton2").setAttribute("style","display:none !important")
}else{
  
  document.getElementById("loginButton1").setAttribute("style","display:none !important");
  document.getElementById("loginButton2").setAttribute("style","display:none !important");
  document.getElementById("logoutButton1").setAttribute("style","display:block")
  document.getElementById("logoutButton2").setAttribute("style","display:block")
}

function menuBack(){
  var fm = document.getElementById("firstMenu");
  var sm = document.getElementById("secondMenu");
  var smButton = document.getElementById("submenuButton")
  // var lable = document.getElementById("targetLable");
  if(smButton.classList.contains("first-menu")){
    popClose('menuModal')
  }else if(smButton.classList.contains("second-menu")){
    fm.classList.remove('hide');
    // lable.classList.remove('secondScreen');
    smButton.classList.remove('second-menu');
    sm.classList.add('hide');
    smButton.classList.add('first-menu');
    // document.querySelector('#submenuText').innerHTML = '-';
  }
 
}

function must_login(){
  const loginmodal = document.getElementById("nlModal");
  if (loginmodal == null) return
  loginmodal.classList.add('active');
  overlay.classList.add('active');
  overlay.addEventListener('click', () => {
    loginmodal.classList.remove('active')
    overlay.classList.remove('active')
  })
}

function getMenu(myMenu){
  let menus = myMenu.split("&");
  let menu = menus[0];
  let menus_id = menus[1];
  document.querySelector('#firstMenu').innerHTML = '';
  // document.querySelector('#submenuText').innerHTML = '-';
  let mainTitle = '';
  document.querySelector('.pmh-two #name').innerHTML = menu;
 $.ajax({
    type: 'POST',
    url: 'https://ai.gg-foods.com/PIS/index.php/dashboard/ambilData',
    data:{
      'menus_id' : menus_id,
    },
    dataType: 'json',
    success: function(data){
      let output = '';
      let ctr = 0;
      for(let i = 0; i<data.length;i++){
        if(ctr == 0){
          output += 
        `<div class="prototype-submenu-container">
        `
        }
        if(menu=="Working in Process"){
        
        output += 
            `<div class="prototype-submenu prototype-submenu-clickable" onclick="routingMenu('${data[i].submenu}')" style="background-color:${data[i].color}">
              <img src="${data[i].image}" >
              <h class="stat">${data[i].submenu}</h>
              <h class="stat2">${data[i].Process}</h>
            </div>
            `;
        

        }
       else if(menu==="History Harvested"){
        output += 
            `<div class="prototype-submenu prototype-submenu-clickable" onclick="routingMenu1('${data[i].submenu}')" style="background-color:${data[i].color}">
              <img src="${data[i].image}" >
               <h class="stat">${data[i].submenu}</h>
              <h class="stat2">${data[i].Process}</h>
            </div>
            `;
        }
        ctr += 1;
        if(i == data.length-1 && ctr < 3){
          for(let j = ctr; j < 3; j++){
            output += `<div class="prototype-submenu" ></div>
            `
          }
          output += `</div>
          `
        }
        if(ctr == 3){
          output += `</div>
          `
          ctr = 0;
        }
      }
      document.querySelector('#firstMenu').innerHTML = output
    }
 });
}
function routingMenu(menus){
  if(menus == '#'){
    window.location.href="<?php echo site_url('WIP_LABITA_BK_Dashboard') ?>"
  }else if(menus == '#'){
    window.location.href="<?php echo site_url('WIP_LABITA_ST_Dashboard') ?>"
  }else if(menus == '#'){
    window.location.href="<?php echo site_url('WIP_LABITA_BB_Dashboard') ?>"
  }else if(menus == '#'){
    window.location.href="<?php echo site_url('WIP_LABITA_LB_Dashboard') ?>"
  }else if(menus == 'Plant Care'){
    window.location.href="<?php echo site_url('WIP_PM_Dashboard') ?>"
  }else{
    alert('Menunya Masih Dalam Process.');
  }
}

function routingMenu1(menus){
  if(menus == '#'){
    window.location.href="<?php echo site_url('WIP_LABITA_BK_Dashboard') ?>"
  }else if(menus == '#'){
    window.location.href="<?php echo site_url('WIP_LABITA_ST_Dashboard') ?>"
  }else if(menus == '#'){
    window.location.href="<?php echo site_url('WIP_LABITA_BB_Dashboard') ?>"
  }else if(menus == '#'){
    window.location.href="<?php echo site_url('WIP_LABITA_LB_Dashboard') ?>"
  }else if(menus == 'Plant Care'){
    window.location.href="<?php echo site_url('HPP_Total_Dashboard') ?>"
  }else{
    alert('Menunya Masih Dalam Process.');
  }
}
</script>
<div id="lightbox" style="display:none;"><a href="#" class="lightbox-close lightbox-button"></a><div class="lightbox-nav" style="display: none;"><a href="#" class="lightbox-previous lightbox-button"></a><a href="#" class="lightbox-next lightbox-button"></a></div><div href="#" class="lightbox-caption"><p></p></div></div>
</body>
</html>
