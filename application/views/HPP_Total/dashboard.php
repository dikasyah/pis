  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-dark accordion toggled" style="background-color:#9F229F;" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" style="height:100px;">
        <div class="sidebar-brand-icon">
          <img src="/PIS/assets/images/logo-apk.png" height="75px"/>
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link p-1" href="#">
          <i class="fas fa-fw fa-globe"></i>
          <span class="text-white-600 small">Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Heading -->
      <div class="sidebar-heading text-center">
        Detail
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed p-1" href="#" data-toggle="collapse" data-target="#collapsePG" aria-expanded="true" aria-controls="collapsePG">
          <i class="fas fa-fw fa-cog"></i>
          <span class="text-white-600 small">Plantation Group</span>
        </a>
        <div id="collapsePG" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white p-1 collapse-inner rounded">
            <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/plantation_group?pg=PG1">PG 1</a>
            <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/plantation_group?pg=PG2">PG 2</a>
            <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/plantation_group?pg=PG3">PG 3</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed p-1" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span class="text-white-600 small">Wilayah</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white p-1 collapse-inner rounded">
            <h6 class="collapse-header p-1 text-center">PG1</h6>
            <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W01">Wilayah 1</a>
            <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W02">Wilayah 2</a>
            <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W03">Wilayah 3</a>
            <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W04">Wilayah 4</a>
            <h6 class="collapse-header p-1 text-center">PG2</h6>
            <a class="collapse-item small p-1" href="/PIS/index.php/index.php/HPP_Total_Dashboard/wilayah?wilayah=W05">Wilayah 5</a>
            <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W06">Wilayah 6</a>
            <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W07">Wilayah 7</a>
            <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W08">Wilayah 8</a>
            <h6 class="collapse-header p-1 text-center">PG3</h6>
            <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W09">Wilayah 9</a>
            <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W11">Wilayah 11</a>
            <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W12">Wilayah 12</a>
            <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W13">Wilayah 13</a>
            <a class="collapse-item small p-1" href="/PIS/index.php/HPP_Total_Dashboard/wilayah?wilayah=W14">Wilayah 14</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Desc -->
          <form class="d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <span class="d-none d-sm-inline-block" style="color:black;font-size:16px;"><b>Finished Harvest - Total Cost</b></span>
              <span class="d-sm-none" style="color:black;font-size:12px;"><b>Finished Harvest</b></span>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="/PIS/" role="button" aria-expanded="false">
                <i class="fas fa-arrow-circle-left fa-lg"></i>
              </a>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nama']; ?></span>
<?php
  if($account['foto'] != NULL){
?>
                <img class="img-profile rounded-circle" src="<?php echo $_SESSION['foto']; ?>">
<?php
  }
  else{
?>
                <img class="img-profile rounded-circle" src="/PIS/index.php/assets/images/profile/empty-profile.png">
<?php
  }
?>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="/PIS/index.php/Dashboard/profile">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400 small"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="/PIS/index.php/Dashboard/main_menu">
                  <i class="fas fa-bars fa-sm fa-fw mr-2 text-gray-400 small"></i>
                  Main Menu
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="row mb-1">
            <div class="col-lg-1 p-1">
              <hr />
            </div>
            <div class="col-lg-2 p-1 text-center">
              <span style="color:black;font-weight:bold;">Status</span>
              <select class="form-control select" name="status" id="status" style="color:black;font-weight:bold;width:100%;" onchange="select_main_filter()">
<?php
  $option_status_1 = "";
  $option_status_2 = "";
  $option_status_3 = "";
  switch ($status) {
    case 'NS':
      $option_status_1 = "selected";
    break;
    case 'NSFC':
      $option_status_2 = "selected";
    break;
    case 'NSSC':
      $option_status_3 = "selected";
    break;
  }
?>
                <option style="color:black;font-weight:bold;" value="NS" <?php echo $option_status_1; ?>>NS</option>
                <option style="color:black;font-weight:bold;" value="NSFC" <?php echo $option_status_2; ?>>NSFC</option>
                <option style="color:black;font-weight:bold;" value="NSSC" <?php echo $option_status_3; ?>>NSSC</option>
              </select>
            </div>
            <div class="col-lg-2 p-1 text-center">
              <span style="color:black;font-weight:bold;">Jenis Bibit</span>
              <select class="form-control select" name="jenis" id="jenis" style="color:black;font-weight:bold;width:100%;" onchange="select_main_filter()">
<?php
  $option_jenis_1 = "";
  $option_jenis_2 = "";
  $option_jenis_3 = "";
  $option_jenis_4 = "";
  switch ($jenis) {
    case 'All':
      $option_jenis_1 = "selected";
    break;
    case 'AN':
      $option_jenis_2 = "selected";
    break;
    case 'SC':
      $option_jenis_3 = "selected";
    break;
    case 'CR':
      $option_jenis_4 = "selected";
    break;
  }
?>
                <option style="color:black;font-weight:bold;" value="All" <?php echo $option_jenis_1; ?>>All</option>
                <option style="color:black;font-weight:bold;" value="AN" <?php echo $option_jenis_2; ?>>AN</option>
                <option style="color:black;font-weight:bold;" value="SC" <?php echo $option_jenis_3; ?>>SC</option>
                <option style="color:black;font-weight:bold;" value="CR" <?php echo $option_jenis_4; ?>>CR</option>
              </select>
            </div>
            <div class="col-lg-2 p-1 text-center">
              <span style="color:black;font-weight:bold;">Kelas Bibit</span>
<?php
  if($status == 'NSSC'){
    $disabled_kelas = 'disabled';
  }
  else{
    $disabled_kelas = '';
  }
?>
              <select class="form-control select" name="kelas" id="kelas" style="color:black;font-weight:bold;width:100%;" onchange="select_main_filter()" <?php echo $disabled_kelas; ?>>
<?php
  $option_kelas_1 = "";
  $option_kelas_2 = "";
  $option_kelas_3 = "";
  $option_kelas_4 = "";
  switch ($kelas) {
    case 'All':
      $option_kelas_1 = "selected";
    break;
    case 'B':
      $option_kelas_2 = "selected";
    break;
    case 'S':
      $option_kelas_3 = "selected";
    break;
    case 'K':
      $option_kelas_4 = "selected";
    break;
  }
?>
                <option style="color:black;font-weight:bold;" value="All" <?php echo $option_kelas_1; ?>>All</option>
                <option style="color:black;font-weight:bold;" value="B" <?php echo $option_kelas_2; ?>>B</option>
                <option style="color:black;font-weight:bold;" value="S" <?php echo $option_kelas_3; ?>>S</option>
                <option style="color:black;font-weight:bold;" value="K" <?php echo $option_kelas_4; ?>>K</option>
              </select>
            </div>
            <div class="col-lg-2 p-1 text-center">
              <span style="color:black;font-weight:bold;">Tahun Panen</span>
              <select class="form-control select" name="tahun" id="tahun" style="color:black;font-weight:bold;width:100%;" onchange="select_main_filter()">
<?php
$a = 0;
  while($a < sizeof($tahun_panen)){
    if($tahun_panen[$a]['tahun_panen'] == $tahun){
?>
                <option style="color:black;font-weight:bold;width:100%;" value="<?php echo $tahun_panen[$a]['tahun_panen']; ?>" selected><?php echo $tahun_panen[$a]['tahun_panen']; ?></option>
<?php
    }
    else{
?>
                <option style="color:black;font-weight:bold;width:100%;" value="<?php echo $tahun_panen[$a]['tahun_panen']; ?>"><?php echo $tahun_panen[$a]['tahun_panen']; ?></option>
<?php
    }
    $a++;
  }
?>
              </select>
            </div>
            <div class="col-lg-2 p-1 text-center">
              <span style="color:black;font-weight:bold;">Bulan Panen</span>
              <select class="form-control select" name="bulan" id="bulan" style="color:black;font-weight:bold;width:100%;" onchange="select_main_filter()">
<?php
  $option_bulan_1 = "";
  $option_bulan_2 = "";
  $option_bulan_3 = "";
  $option_bulan_4 = "";
  $option_bulan_5 = "";
  $option_bulan_6 = "";
  $option_bulan_7 = "";
  $option_bulan_8 = "";
  $option_bulan_9 = "";
  $option_bulan_10 = "";
  $option_bulan_11 = "";
  $option_bulan_12 = "";
  $option_bulan_13 = "";
  switch ($bulan) {
    case 'All':
      $option_bulan_1 = "selected";
    break;
    case '1':
      $option_bulan_2 = "selected";
    break;
    case '2':
      $option_bulan_3 = "selected";
    break;
    case '3':
      $option_bulan_4 = "selected";
    break;
    case '4':
      $option_bulan_5 = "selected";
    break;
    case '5':
      $option_bulan_6 = "selected";
    break;
    case '6':
      $option_bulan_7 = "selected";
    break;
    case '7':
      $option_bulan_8 = "selected";
    break;
    case '8':
      $option_bulan_9 = "selected";
    break;
    case '9':
      $option_bulan_10 = "selected";
    break;
    case '10':
      $option_bulan_11 = "selected";
    break;
    case '11':
      $option_bulan_12 = "selected";
    break;
    case '12':
      $option_bulan_13 = "selected";
    break;
  }
?>
                <option style="color:black;font-weight:bold;" value="Total" <?php echo $option_bulan_1; ?>>Total</option>
                <option style="color:black;font-weight:bold;" value="1" <?php echo $option_bulan_2; ?>>1</option>
                <option style="color:black;font-weight:bold;" value="2" <?php echo $option_bulan_3; ?>>2</option>
                <option style="color:black;font-weight:bold;" value="3" <?php echo $option_bulan_4; ?>>3</option>
                <option style="color:black;font-weight:bold;" value="4" <?php echo $option_bulan_5; ?>>4</option>
                <option style="color:black;font-weight:bold;" value="5" <?php echo $option_bulan_6; ?>>5</option>
                <option style="color:black;font-weight:bold;" value="6" <?php echo $option_bulan_7; ?>>6</option>
                <option style="color:black;font-weight:bold;" value="7" <?php echo $option_bulan_8; ?>>7</option>
                <option style="color:black;font-weight:bold;" value="8" <?php echo $option_bulan_9; ?>>8</option>
                <option style="color:black;font-weight:bold;" value="9" <?php echo $option_bulan_10; ?>>9</option>
                <option style="color:black;font-weight:bold;" value="10" <?php echo $option_bulan_11; ?>>10</option>
                <option style="color:black;font-weight:bold;" value="11" <?php echo $option_bulan_12; ?>>11</option>
                <option style="color:black;font-weight:bold;" value="12" <?php echo $option_bulan_13; ?>>12</option>
              </select>
            </div>
            <div class="col-lg-1 p-1">
              <hr />
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="row">
                <div class="card shadow" style="width:100%;">
                  <div class="card-header py-2 text-center" style="background-color:#75229F;">
                    <span style="font:14px;color:white;"><b><a style="color:white;text-decoration:none;" href="/PIS/HPP_Total_Dashboard/plantation_group?pg=PG1">PG 1</a></b></span>
                  </div>
                  <div class="card-body" style="padding:0;">
                    <div id="peta_pg1" style="height:400px;"></div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="card shadow mb-4" style="width:100%;">
                  <div class="card-body" style="padding-left:0;padding-right:0;padding-bottom:0;">
                    <canvas id="diagram_performance_pg1" style="height:300px;"></canvas>
<?php
  if($performance['PG1']['Total'] != 0){
    $performance_pg1 = round(($performance['PG1']['Excellent'] / $performance['PG1']['Total']) * 100, 1).", ".round(($performance['PG1']['Good'] / $performance['PG1']['Total']) * 100, 1).", ".round(($performance['PG1']['Poor'] / $performance['PG1']['Total']) * 100, 1);
  }
  else{
    $performance_pg1 = ", , ";
  }
?>
<script>
  var config_performance_pg1 = {
    type: 'bar',
    data: {
    labels: ['Excellent', 'Good', 'Poor'],
    datasets: [{
      label: 'PG1',
      backgroundColor: [
				'#32CD32',
				'#FFA500',
				'#FF0000',
			],
      borderColor: [
				'#32CD32',
				'#FFA500',
				'#FF0000',
			],
      borderWidth: 5,
      data: [
        <?php echo $performance_pg1; ?>
      ]
      }]
    },
    options: {
      responsive: true,
      legend: {
        display: false,
        position: 'bottom',
        labels: {
          usePointStyle: true,
        },
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
          display: true,
          gridLines: {
            display: false,
            drawBorder: false,
            drawOnChartArea: false,
          },
          ticks: {
            max: 100,
            min: 0,
            stepSize: 20
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

            <div class="col-md-4">
              <div class="row">
                <div class="card shadow" style="width:100%;">
                  <div class="card-header py-2 text-center" style="background-color:#75229F;">
                    <span style="font:14px;color:white;"><b><a style="color:white;text-decoration:none;" href="/PIS/HPP_Total_Dashboard/plantation_group?pg=PG2">PG 2</a></b></span>
                  </div>
                  <div class="card-body" style="padding:0;">
                    <div id="peta_pg2" style="height:400px;"></div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="card shadow mb-4" style="width:100%;">
                  <div class="card-body" style="padding-left:0;padding-right:0;padding-bottom:0;">
                    <canvas id="diagram_performance_pg2"></canvas>
<?php
  if($performance['PG2']['Total'] != 0){
    $performance_pg2 = round(($performance['PG2']['Excellent'] / $performance['PG2']['Total']) * 100, 1).", ".round(($performance['PG2']['Good'] / $performance['PG2']['Total']) * 100, 1).", ".round(($performance['PG2']['Poor'] / $performance['PG2']['Total']) * 100, 1);
  }
  else{
    $performance_pg2 = ", , ";
  }
?>
<script>
  var config_performance_pg2 = {
    type: 'bar',
    data: {
    labels: ['Excellent', 'Good', 'Poor'],
    datasets: [{
      label: 'PG2',
      backgroundColor: [
				'#32CD32',
				'#FFA500',
				'#FF0000',
			],
      borderColor: [
				'#32CD32',
				'#FFA500',
				'#FF0000',
			],
      borderWidth: 5,
      data: [
        <?php echo $performance_pg2; ?>
      ]
      }]
    },
    options: {
      responsive: true,
      legend: {
        display: false,
        position: 'bottom',
        labels: {
          usePointStyle: true,
        },
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
          display: true,
          gridLines: {
            display: false,
            drawBorder: false,
            drawOnChartArea: false,
          },
          ticks: {
            max: 100,
            min: 0,
            stepSize: 20
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

            <div class="col-md-4">
              <div class="row">
                <div class="card shadow" style="width:100%;">
                  <div class="card-header py-2 text-center" style="background-color:#75229F;">
                    <span style="font:14px;color:white;"><b><a style="color:white;text-decoration:none;" href="/PIS/HPP_Total_Dashboard/plantation_group?pg=PG3">PG 3</a></b></span>
                  </div>
                  <div class="card-body" style="padding:0;">
                    <div id="peta_pg3" style="height:400px;"></div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="card shadow mb-4" style="width:100%;">
                  <div class="card-body" style="padding-left:0;padding-right:0;padding-bottom:0;">
                    <canvas id="diagram_performance_pg3"></canvas>
<?php
  if($performance['PG3']['Total'] != 0){
    $performance_pg3 = round(($performance['PG3']['Excellent'] / $performance['PG3']['Total']) * 100, 1).", ".round(($performance['PG3']['Good'] / $performance['PG3']['Total']) * 100, 1).", ".round(($performance['PG3']['Poor'] / $performance['PG3']['Total']) * 100, 1);
  }
  else{
    $performance_pg3 = ", , ";
  }
?>
<script>
  var config_performance_pg3 = {
    type: 'bar',
    data: {
    labels: ['Excellent', 'Good', 'Poor'],
    datasets: [{
      label: 'PG3',
      backgroundColor: [
				'#32CD32',
				'#FFA500',
				'#FF0000',
			],
      borderColor: [
				'#32CD32',
				'#FFA500',
				'#FF0000',
			],
      borderWidth: 5,
      data: [
        <?php echo $performance_pg3; ?>
      ]
      }]
    },
    options: {
      responsive: true,
      legend: {
        display: false,
        position: 'bottom',
        labels: {
          usePointStyle: true,
        },
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
          display: true,
          gridLines: {
            display: false,
            drawBorder: false,
            drawOnChartArea: false,
          },
          ticks: {
            max: 100,
            min: 0,
            stepSize: 20
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
<script>
  <?php
    $longlat_pg1 = explode(", ", $coordinate_center['PG1']['longlat']);
    $longlat_pg2 = explode(", ", $coordinate_center['PG2']['longlat']);
    $longlat_pg3 = explode(", ", $coordinate_center['PG3']['longlat']);
  ?>
    function initMap() {
      var peta_pg1 = new google.maps.Map(document.getElementById('peta_pg1'), {
        center:new google.maps.LatLng(<?php echo $longlat_pg1[0]; ?>, <?php echo $longlat_pg1[1]; ?>),
        zoom:11,
        mapTypeId: google.maps.MapTypeId.SATELLITE
      });
      var peta_pg2 = new google.maps.Map(document.getElementById('peta_pg2'), {
        center:new google.maps.LatLng(<?php echo $longlat_pg2[0]; ?>, <?php echo $longlat_pg2[1]; ?>),
        zoom:11,
        mapTypeId: google.maps.MapTypeId.SATELLITE
      });
      var peta_pg3 = new google.maps.Map(document.getElementById('peta_pg3'), {
        center:new google.maps.LatLng(<?php echo $longlat_pg3[0]; ?>, <?php echo $longlat_pg3[1]; ?>),
        zoom:11,
        mapTypeId: google.maps.MapTypeId.SATELLITE
      });
<?php
  //Tahun PG1
  foreach ($coordinate['PG1'] as $co) {
    if($co->yield != NULL){
      switch ($co->performance) {
        case 'Excellent':
          $warna_isi = "#32CD32";
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
    }
    else{
      $warna_isi = "#0000FF";
      $aktif = 0;
    }

    $longlat = explode(", ", $co->longlat);
    $long = sizeof($longlat) - 1;
?>
    var longlat<?php echo $co->lokasi; ?> = [
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
    var lok<?php echo $co->lokasi; ?> = new google.maps.Polygon({
      paths: longlat<?php echo $co->lokasi; ?>,
      strokeColor: '#FF4500',
      strokeOpacity: 0.6,
      strokeWeight: 0.8,
      fillColor: '<?php echo $warna_isi; ?>',
      fillOpacity: 0.3
    });
    lok<?php echo $co->lokasi; ?>.setMap(peta_pg1);
    google.maps.event.addListener(lok<?php echo $co->lokasi; ?>, "click", function(event) {
      var info<?php echo $co->lokasi; ?> = "<div class='row'><div class='col-md-12 text-center'><h2 style='color:black;'><?php echo $co->lokasi; ?></h2></div></div>" +
      "<div class='row'>" +
        "<div class='col-md-12'>" +
          "<table width='100%'>" +
            "<tr>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>PG</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->pg; ?></b></td>" +
            "</tr>" +
            "<tr>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Wilayah</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->wilayah; ?></b></td>" +
            "</tr>" +
            "<tr>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Kebun</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->kebun; ?></b></td>" +
            "</tr>" +
            "<tr>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Lokasi</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->lokasi; ?></b></td>" +
            "</tr>" +
            "<tr>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Luas</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->luas; ?> Ha</b></td>" +
            "</tr>" +
            "<tr>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Status</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->status; ?></b></td>" +
            "</tr>" +
            "<tr>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Yield</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php if($co->yield == NULL) echo '-'; else echo round($co->yield); ?> Ton/Ha</b></td>" +
            "</tr>" +
            "<tr>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Category</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
              "<td style='color:<?php echo $warna_isi; ?>;padding-top:1px;padding-bottom:1px;'><b><?php if($co->performance == NULL) echo '-'; else echo $co->performance; ?></b></td>" +
            "</tr>" +
<?php
  if($co->foto != NULL){
?>
            "<tr>" +
              "<td colspan='3' style='color:black;padding-top:5px;padding-bottom:1px;' align='center'>" +
                "<img onclick='show_modal_show_foto(\"<?php echo $co->foto; ?>\")' src='<?php echo $co->foto; ?>' height='auto' width='150'>" +
              "</td>" +
            "</tr>" +
<?php
  }
?>
          "</table>" +
        "</div>" +
      "</div>";
      iw<?php echo $co->lokasi; ?> = new google.maps.InfoWindow();
      iw<?php echo $co->lokasi; ?>.setContent(info<?php echo $co->lokasi; ?>);
      iw<?php echo $co->lokasi; ?>.setPosition(event.latLng);
      iw<?php echo $co->lokasi; ?>.open(peta_pg1);
    });
<?php
  }
  //Tahun PG2
  foreach ($coordinate['PG2'] as $co) {
    if($co->yield != NULL){
      switch ($co->performance) {
        case 'Excellent':
          $warna_isi = "#32CD32";
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
    }
    else{
      $warna_isi = "#0000FF";
      $aktif = 0;
    }

    $longlat = explode(", ", $co->longlat);
    $long = sizeof($longlat) - 1;
?>
    var longlat<?php echo $co->lokasi; ?> = [
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
    var lok<?php echo $co->lokasi; ?> = new google.maps.Polygon({
      paths: longlat<?php echo $co->lokasi; ?>,
      strokeColor: '#00FFFF',
      strokeOpacity: 0.6,
      strokeWeight: 0.8,
      fillColor: '<?php echo $warna_isi; ?>',
      fillOpacity: 0.3
    });
    lok<?php echo $co->lokasi; ?>.setMap(peta_pg2);
    google.maps.event.addListener(lok<?php echo $co->lokasi; ?>, "click", function(event) {
      var info<?php echo $co->lokasi; ?> = "<div class='row'><div class='col-md-12 text-center'><h2 style='color:black;'><?php echo $co->lokasi; ?></h2></div></div>" +
      "<div class='row'>" +
        "<div class='col-md-12'>" +
          "<table width='100%'>" +
            "<tr>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>PG</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->pg; ?></b></td>" +
            "</tr>" +
            "<tr>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Wilayah</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->wilayah; ?></b></td>" +
            "</tr>" +
            "<tr>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Kebun</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->kebun; ?></b></td>" +
            "</tr>" +
            "<tr>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Lokasi</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->lokasi; ?></b></td>" +
            "</tr>" +
            "<tr>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Luas</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->luas; ?> Ha</b></td>" +
            "</tr>" +
            "<tr>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Status</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->status; ?></b></td>" +
            "</tr>" +
            "<tr>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Yield</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php if($co->yield == NULL) echo '-'; else echo round($co->yield); ?> Ton/Ha</b></td>" +
            "</tr>" +
            "<tr>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Category</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
              "<td style='color:<?php echo $warna_isi; ?>;padding-top:1px;padding-bottom:1px;'><b><?php if($co->performance == NULL) echo '-'; else echo $co->performance; ?></b></td>" +
            "</tr>" +
<?php
  if($co->foto != NULL){
?>
            "<tr>" +
              "<td colspan='3' style='color:black;padding-top:5px;padding-bottom:1px;' align='center'>" +
                "<img onclick='show_modal_show_foto(\"<?php echo $co->foto; ?>\")' src='<?php echo $co->foto; ?>' height='auto' width='150'>" +
              "</td>" +
            "</tr>" +
<?php
  }
?>
          "</table>" +
        "</div>" +
      "</div>";
      iw<?php echo $co->lokasi; ?> = new google.maps.InfoWindow();
      iw<?php echo $co->lokasi; ?>.setContent(info<?php echo $co->lokasi; ?>);
      iw<?php echo $co->lokasi; ?>.setPosition(event.latLng);
      iw<?php echo $co->lokasi; ?>.open(peta_pg2);
    });
<?php
  }
  //Tahun PG3
  foreach ($coordinate['PG3'] as $co) {
    if($co->yield != NULL){
      switch ($co->performance) {
        case 'Excellent':
          $warna_isi = "#32CD32";
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
    }
    else{
      $warna_isi = "#0000FF";
      $aktif = 0;
    }

    $longlat = explode(", ", $co->longlat);
    $long = sizeof($longlat) - 1;
?>
    var longlat<?php echo $co->lokasi; ?> = [
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
    var lok<?php echo $co->lokasi; ?> = new google.maps.Polygon({
      paths: longlat<?php echo $co->lokasi; ?>,
      strokeColor: '#FF00FF',
      strokeOpacity: 0.6,
      strokeWeight: 0.8,
      fillColor: '<?php echo $warna_isi; ?>',
      fillOpacity: 0.3
    });
    lok<?php echo $co->lokasi; ?>.setMap(peta_pg3);
    google.maps.event.addListener(lok<?php echo $co->lokasi; ?>, "click", function(event) {
      var info<?php echo $co->lokasi; ?> = "<div class='row'><div class='col-md-12 text-center'><h2 style='color:black;'><?php echo $co->lokasi; ?></h2></div></div>" +
      "<div class='row'>" +
        "<div class='col-md-12'>" +
          "<table width='100%'>" +
            "<tr>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>PG</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->pg; ?></b></td>" +
            "</tr>" +
            "<tr>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Wilayah</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->wilayah; ?></b></td>" +
            "</tr>" +
            "<tr>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Kebun</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->kebun; ?></b></td>" +
            "</tr>" +
            "<tr>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Lokasi</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->lokasi; ?></b></td>" +
            "</tr>" +
            "<tr>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Luas</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->luas; ?> Ha</b></td>" +
            "</tr>" +
            "<tr>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Status</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php echo $co->status; ?></b></td>" +
            "</tr>" +
            "<tr>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Yield</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b><?php if($co->yield == NULL) echo '-'; else echo round($co->yield); ?> Ton/Ha</b></td>" +
            "</tr>" +
            "<tr>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;'><b>Category</b></td>" +
              "<td style='color:black;padding-top:1px;padding-bottom:1px;' width='10px' align='center'><b>:</b></td>" +
              "<td style='color:<?php echo $warna_isi; ?>;padding-top:1px;padding-bottom:1px;'><b><?php if($co->performance == NULL) echo '-'; else echo $co->performance; ?></b></td>" +
            "</tr>" +
<?php
  if($co->foto != NULL){
?>
            "<tr>" +
              "<td colspan='3' style='color:black;padding-top:5px;padding-bottom:1px;' align='center'>" +
                "<img onclick='show_modal_show_foto(\"<?php echo $co->foto; ?>\")' src='<?php echo $co->foto; ?>' height='auto' width='150'>" +
              "</td>" +
            "</tr>" +
<?php
  }
?>
          "</table>" +
        "</div>" +
      "</div>";
      iw<?php echo $co->lokasi; ?> = new google.maps.InfoWindow();
      iw<?php echo $co->lokasi; ?>.setContent(info<?php echo $co->lokasi; ?>);
      iw<?php echo $co->lokasi; ?>.setPosition(event.latLng);
      iw<?php echo $co->lokasi; ?>.open(peta_pg3);
    });
<?php
  }
?>
    if(navigator.geolocation){
      navigator.geolocation.getCurrentPosition(function(p){
        var cp_pg1 = new google.maps.Marker({
          position:{
            lat: p.coords.latitude,
            lng: p.coords.longitude
          },
          map: peta_pg1,
          icon: '/PIS/assets/images/marker.png'
        });
        var cp_pg2 = new google.maps.Marker({
          position:{
            lat: p.coords.latitude,
            lng: p.coords.longitude
          },
          map: peta_pg2,
          icon: '/PIS/assets/images/marker.png'
        });
        var cp_pg3 = new google.maps.Marker({
          position:{
            lat: p.coords.latitude,
            lng: p.coords.longitude
          },
          map: peta_pg3,
          icon: '/PIS/assets/images/marker.png'
        });
      });
    }
  }

  window.initialize = initMap;
</script>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="/PIS/index.php/dashboard/logout">Logout</a>
        </div>
      </div>
    </div>
  </div>

<script>
function select_main_filter(){
  var status = $('#status').val();
  var jenis = $('#jenis').val();
  var kelas = $('#kelas').val();
  var tahun = $('#tahun').val();
  var bulan = $('#bulan').val();
  window.location.href="/PIS/index.php/HPP_Total_Dashboard?status="+status+"&jenis="+jenis+"&kelas="+kelas+"&tahun="+tahun+"&bulan="+bulan;
}
  window.onload = function(){
		var ctx_performance_pg1 = document.getElementById('diagram_performance_pg1').getContext('2d');
		window.myBar = new Chart(ctx_performance_pg1, config_performance_pg1);
		var ctx_performance_pg2 = document.getElementById('diagram_performance_pg2').getContext('2d');
		window.myBar = new Chart(ctx_performance_pg2, config_performance_pg2);
		var ctx_performance_pg3 = document.getElementById('diagram_performance_pg3').getContext('2d');
		window.myBar = new Chart(ctx_performance_pg3, config_performance_pg3);
	};
</script>
