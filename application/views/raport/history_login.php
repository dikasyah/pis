<div class="page-content-wrap">

    <div class="row">
        <div style="margin-top:5px;" class="col-md-12">

            <div class="panel panel-default">
              <div class="panel-heading" style="background-color: #008B8B;">
                <div class="panel-title-box" style="padding-top:4px;padding-left:4px;">
                  <h3 style="color:black;"><b>History Login</b></h3>
                </div>
                <ul class="panel-controls" style="padding-top:4px;padding-right:4px">
                  <div class="col-md-12">
                    <button class="btn btn-success btn-rounded btn-block" onclick="back()"><span class="fa fa-arrow-left"></span> Back</button>
                  </div>
                </ul>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-6">
                    <select class="form-control select" name="select_bulan" id="select_bulan" onchange="change_tgl(1)">
<?php
  $option_bulan1 = "";
  $option_bulan2 = "";
  $option_bulan3 = "";
  $option_bulan4 = "";
  $option_bulan5 = "";
  $option_bulan6 = "";
  $option_bulan7 = "";
  $option_bulan8 = "";
  $option_bulan9 = "";
  $option_bulan10 = "";
  $option_bulan11 = "";
  $option_bulan12 = "";
  $option_disabled1 = "";
  $option_disabled2 = "";
  $option_disabled3 = "";
  $option_disabled4 = "";
  $option_disabled5 = "";
  $option_disabled6 = "";
  $option_disabled7 = "";
  $option_disabled8 = "";
  $option_disabled9 = "";
  $option_disabled10 = "";
  $option_disabled11 = "";
  $option_disabled12 = "";
  switch (date('m', strtotime($tgl))) {
    case '01':
      $option_bulan1 = "selected";
    break;
    case '02':
      $option_bulan2 = "selected";
    break;
    case '03':
      $option_bulan3 = "selected";
    break;
    case '04':
      $option_bulan4 = "selected";
    break;
    case '05':
      $option_bulan5 = "selected";
    break;
    case '06':
      $option_bulan6 = "selected";
    break;
    case '07':
      $option_bulan7 = "selected";
    break;
    case '08':
      $option_bulan8 = "selected";
    break;
    case '09':
      $option_bulan9 = "selected";
    break;
    case '10':
      $option_bulan10 = "selected";
    break;
    case '11':
      $option_bulan11 = "selected";
    break;
    case '12':
      $option_bulan12 = "selected";
    break;
  }
  switch (date('m')) {
    case '01':
      $option_disabled2 = "disabled";
      $option_disabled3 = "disabled";
      $option_disabled4 = "disabled";
      $option_disabled5 = "disabled";
      $option_disabled6 = "disabled";
      $option_disabled7 = "disabled";
      $option_disabled8 = "disabled";
      $option_disabled9 = "disabled";
      $option_disabled10 = "disabled";
      $option_disabled11 = "disabled";
      $option_disabled12 = "disabled";
    break;
    case '02':
      $option_disabled3 = "disabled";
      $option_disabled4 = "disabled";
      $option_disabled5 = "disabled";
      $option_disabled6 = "disabled";
      $option_disabled7 = "disabled";
      $option_disabled8 = "disabled";
      $option_disabled9 = "disabled";
      $option_disabled10 = "disabled";
      $option_disabled11 = "disabled";
      $option_disabled12 = "disabled";
    break;
    case '03':
      $option_disabled4 = "disabled";
      $option_disabled5 = "disabled";
      $option_disabled6 = "disabled";
      $option_disabled7 = "disabled";
      $option_disabled8 = "disabled";
      $option_disabled9 = "disabled";
      $option_disabled10 = "disabled";
      $option_disabled11 = "disabled";
      $option_disabled12 = "disabled";
    break;
    case '04':
      $option_disabled5 = "disabled";
      $option_disabled6 = "disabled";
      $option_disabled7 = "disabled";
      $option_disabled8 = "disabled";
      $option_disabled9 = "disabled";
      $option_disabled10 = "disabled";
      $option_disabled11 = "disabled";
      $option_disabled12 = "disabled";
    break;
    case '05':
      $option_disabled6 = "disabled";
      $option_disabled7 = "disabled";
      $option_disabled8 = "disabled";
      $option_disabled9 = "disabled";
      $option_disabled10 = "disabled";
      $option_disabled11 = "disabled";
      $option_disabled12 = "disabled";
    break;
    case '06':
      $option_disabled7 = "disabled";
      $option_disabled8 = "disabled";
      $option_disabled9 = "disabled";
      $option_disabled10 = "disabled";
      $option_disabled11 = "disabled";
      $option_disabled12 = "disabled";
    break;
    case '07':
      $option_disabled8 = "disabled";
      $option_disabled9 = "disabled";
      $option_disabled10 = "disabled";
      $option_disabled11 = "disabled";
      $option_disabled12 = "disabled";
    break;
    case '08':
      $option_disabled9 = "disabled";
      $option_disabled10 = "disabled";
      $option_disabled11 = "disabled";
      $option_disabled12 = "disabled";
    break;
    case '09':
      $option_disabled10 = "disabled";
      $option_disabled11 = "disabled";
      $option_disabled12 = "disabled";
    break;
    case '10':
      $option_disabled11 = "disabled";
      $option_disabled12 = "disabled";
    break;
    case '11':
      $option_disabled12 = "disabled";
    break;
    case '12':
    break;
  }
?>
                      <option value="01" <?php echo $option_bulan1." ".$option_disabled1; ?>>Jan</option>
                      <option value="02" <?php echo $option_bulan2." ".$option_disabled2; ?>>Feb</option>
                      <option value="03" <?php echo $option_bulan3." ".$option_disabled3; ?>>Mar</option>
                      <option value="04" <?php echo $option_bulan4." ".$option_disabled4; ?>>Apr</option>
                      <option value="05" <?php echo $option_bulan5." ".$option_disabled5; ?>>Mei</option>
                      <option value="06" <?php echo $option_bulan6." ".$option_disabled6; ?>>Jum</option>
                      <option value="07" <?php echo $option_bulan7." ".$option_disabled7; ?>>Jul</option>
                      <option value="08" <?php echo $option_bulan8." ".$option_disabled8; ?>>Ags</option>
                      <option value="09" <?php echo $option_bulan9." ".$option_disabled9; ?>>Sep</option>
                      <option value="10" <?php echo $option_bulan10." ".$option_disabled10; ?>>Okt</option>
                      <option value="11" <?php echo $option_bulan11." ".$option_disabled11; ?>>Nov</option>
                      <option value="12" <?php echo $option_bulan12." ".$option_disabled12; ?>>Des</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <select class="form-control select" name="select_tgl" id="select_tgl" onchange="change_tgl()">
<?php
  $now = date('t', strtotime($tgl));
  $set = date('d', strtotime($tgl));
  for($i = 1; $i <= $now; $i++){
    if($i < 10){
      $nomor = "0".$i;
    }
    else{
      $nomor = $i;
    }
    if($set == $nomor){
?>
                      <option value="<?php echo $nomor; ?>" selected><?php echo $i; ?></option>
<?php
    }
    else{
?>
                      <option value="<?php echo $nomor; ?>"><?php echo $i; ?></option>
<?php
    }
  }
?>
                    </select>
                  </div>
                </div>
                <br />
                <br />
                <div class="row" align="center">
                  <h2><b><?php echo format_bln($tgl); ?></b></h2>
                </div>
                <div class="row">
<?php
  if($_SESSION['crud'] == 0 || $_SESSION['index'] == "01334" || $_SESSION['index'] == "10007809" || $_SESSION['index'] == "10003609" || $_SESSION['index'] == "04660" || strpos($_SESSION['deskripsi'], "PG1")){
?>
                  <div class="col-md-4">
                    <canvas id="diagram_history_login_pg1"></canvas>
<?php
  $total_pg1_part1 = $PG1['sn_manager']['total'].", ".$PG1['ppic_manager']['total'].", ".$PG1['fs_manager']['total'].", ".$PG1['kawil_1']['total'].", ".$PG1['kawil_2']['total'].", ".$PG1['kawil_3']['total'].", ".$PG1['kawil_4']['total'];
  $total_pg1_part2 = $PG1['kabag_fe']['total'].", ".$PG1['kabag_planting']['total'].", ".$PG1['kabag_fs']['total'].", ".$PG1['kabag_pm']['total'].", ".$PG1['kabag_qc']['total'].", ".$PG1['kabag_gulma']['total'].", ".$PG1['kabag_ppo']['total'].", ".$PG1['kabag_pppp']['total'];
  $total_pg1 = $total_pg1_part1.", ".$total_pg1_part2;


  $total_pg1_part1_all = $PG1_all['sn_manager']['total'].", ".$PG1_all['ppic_manager']['total'].", ".$PG1_all['fs_manager']['total'].", ".$PG1_all['kawil_1']['total'].", ".$PG1_all['kawil_2']['total'].", ".$PG1_all['kawil_3']['total'].", ".$PG1_all['kawil_4']['total'];
  $total_pg1_part2_all = $PG1_all['kabag_fe']['total'].", ".$PG1_all['kabag_planting']['total'].", ".$PG1_all['kabag_fs']['total'].", ".$PG1_all['kabag_pm']['total'].", ".$PG1_all['kabag_qc']['total'].", ".$PG1_all['kabag_gulma']['total'].", ".$PG1_all['kabag_ppo']['total'].", ".$PG1_all['kabag_pppp']['total'];
  $total_pg1_all = $total_pg1_part1_all.", ".$total_pg1_part2_all;
?>
<script>
	var config_history_login_pg1 = {
    type: 'bar',
    data: {
  		labels: [
        "Sn. Manager", "Mn. PPIC", "Mn. FS", "W01", "W02", "W03", "W04", "FE", "Planting", "FS", "PM", "QC", "Gulma", "PPO", "P4"
      ],
  		datasets: [{
        type: 'bar',
        label: 'Total',
        yAxisID: 'Total',
        backgroundColor: '#FF0000',
        borderWidth: 1,
        data: [
          <?php echo $total_pg1_all; ?>
        ]
      },{
        type: 'line',
        fill: true,
  			backgroundColor: '#FF9C9C',
        borderColor: '#FF9C9C',
        label: 'Average',
        yAxisID: 'Average',
        data: [
          <?php echo $total_pg1; ?>
        ]
        },]
    },
    options: {
      responsive: true,
      legend: {
        display: false,
        position: 'bottom',
        labels: {
          usePointStyle: true,
        }
      },
      title: {
        display: true,
        text: 'History Login PG1'
      },
      tooltips: {
        mode: 'index',
        intersect: false,
        callbacks: {
          label: function(tooltipItem, data) {
            var label = data.datasets[tooltipItem.datasetIndex].label;
            if(data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index] >= 0){
              var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            }
            else{
              var val = 0;
            }
            return label + ' : ' + val + 'H';
          }
        }
      },
			scales: {
				yAxes: [{
    			display: true,
          id: 'Average',
					gridLines: {
      			display: false,
      			drawBorder: false,
      			drawOnChartArea: false,
      		},
					ticks: {
            max: 6,
            min: 0
					}
				},{
    			display: true,
          position: 'right',
          id: 'Total',
					gridLines: {
      			display: false,
      			drawBorder: false,
      			drawOnChartArea: false,
      		},
					ticks: {
            max: 180,
            min: 0
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
      // animation: {
      //   onComplete: function () {
      //     var chartInstance = this.chart;
      //     var ctx = chartInstance.ctx;
      //     ctx.textAlign = "center";
      //
      //     Chart.helpers.each(this.data.datasets.forEach(function (dataset, i) {
      //       var meta = chartInstance.controller.getDatasetMeta(i);
      //       Chart.helpers.each(meta.data.forEach(function (bar, index) {
      //         ctx.fillText(dataset.data[index], bar._model.x, bar._model.y - 10);
      //       }),this)
      //     }),this);
      //   }
      // }
    }
	};
</script>
                  </div>
<?php
  }
  if($_SESSION['crud'] == 0 || $_SESSION['index'] == "01334" || $_SESSION['index'] == "10007809" || $_SESSION['index'] == "10003609" || $_SESSION['index'] == "04660" || strpos($_SESSION['deskripsi'], "PG2")){
?>
                  <div class="col-md-4">
                    <canvas id="diagram_history_login_pg2"></canvas>
<?php
  $total_pg2_part1 = $PG2['sn_manager']['total'].", ".$PG2['ppic_manager']['total'].", ".$PG2['fs_manager']['total'].", ".$PG2['kawil_5']['total'].", ".$PG2['kawil_6']['total'].", ".$PG2['kawil_7']['total'].", ".$PG2['kawil_8']['total'];
  $total_pg2_part2 = $PG2['kabag_fe']['total'].", ".$PG2['kabag_planting']['total'].", ".$PG2['kabag_fs']['total'].", ".$PG2['kabag_pm']['total'].", ".$PG2['kabag_qc']['total'].", ".$PG2['kabag_gulma']['total'].", ".$PG2['kabag_ppo']['total'].", ".$PG2['kabag_pppp']['total'];
  $total_pg2 = $total_pg2_part1.", ".$total_pg2_part2;

  $total_pg2_part1_all = $PG2_all['sn_manager']['total'].", ".$PG2_all['ppic_manager']['total'].", ".$PG2_all['fs_manager']['total'].", ".$PG2_all['kawil_5']['total'].", ".$PG2_all['kawil_6']['total'].", ".$PG2_all['kawil_7']['total'].", ".$PG2_all['kawil_8']['total'];
  $total_pg2_part2_all = $PG2_all['kabag_fe']['total'].", ".$PG2_all['kabag_planting']['total'].", ".$PG2_all['kabag_fs']['total'].", ".$PG2_all['kabag_pm']['total'].", ".$PG2_all['kabag_qc']['total'].", ".$PG2_all['kabag_gulma']['total'].", ".$PG2_all['kabag_ppo']['total'].", ".$PG2_all['kabag_pppp']['total'];
  $total_pg2_all = $total_pg2_part1_all.", ".$total_pg2_part2_all;
?>
<script>
	var config_history_login_pg2 = {
    type: 'bar',
    data: {
  		labels: [
        "Sn. Manager", "Mn. PPIC", "Mn. FS", "W05", "W06", "W07", "W08", "FE", "Planting", "FS", "PM", "QC", "Gulma", "PPO", "P4"
      ],
  		datasets: [{
        type: 'bar',
        label: 'Total',
        yAxisID: 'Total',
        backgroundColor: '#0000FF',
        borderWidth: 1,
        data: [
          <?php echo $total_pg2_all; ?>
        ]
      },{
        type: 'line',
        fill: true,
  			backgroundColor: '#9C9CFF',
        borderColor: '#9C9CFF',
        label: 'Average',
        yAxisID: 'Average',
        data: [
          <?php echo $total_pg2; ?>
        ]
        },]
    },
    options: {
      responsive: true,
      legend: {
        display: false,
        position: 'bottom',
        labels: {
          usePointStyle: true,
        }
      },
      title: {
        display: true,
        text: 'History Login PG2'
      },
      tooltips: {
        mode: 'index',
        intersect: false,
        callbacks: {
          label: function(tooltipItem, data) {
            var label = data.datasets[tooltipItem.datasetIndex].label;
            if(data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index] >= 0){
              var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            }
            else{
              var val = 0;
            }
            return label + ' : ' + val + 'H';
          }
        }
      },
			scales: {
				yAxes: [{
    			display: true,
          id: 'Average',
					gridLines: {
      			display: false,
      			drawBorder: false,
      			drawOnChartArea: false,
      		},
					ticks: {
            max: 6,
            min: 0
					}
				},{
    			display: true,
          position: 'right',
          id: 'Total',
					gridLines: {
      			display: false,
      			drawBorder: false,
      			drawOnChartArea: false,
      		},
					ticks: {
            max: 180,
            min: 0
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
      // animation: {
      //   onComplete: function () {
      //     var chartInstance = this.chart;
      //     var ctx = chartInstance.ctx;
      //     ctx.textAlign = "center";
      //
      //     Chart.helpers.each(this.data.datasets.forEach(function (dataset, i) {
      //       var meta = chartInstance.controller.getDatasetMeta(i);
      //       Chart.helpers.each(meta.data.forEach(function (bar, index) {
      //         ctx.fillText(dataset.data[index], bar._model.x, bar._model.y - 10);
      //       }),this)
      //     }),this);
      //   }
      // }
    }
	};
</script>
                  </div>
<?php
  }
  if($_SESSION['crud'] == 0 || $_SESSION['index'] == "01334" || $_SESSION['index'] == "10007809" || $_SESSION['index'] == "10003609" || $_SESSION['index'] == "04660" || strpos($_SESSION['deskripsi'], "PG3")){
?>
                  <div class="col-md-4">
                    <canvas id="diagram_history_login_pg3"></canvas>
<?php
  $total_pg3_part1 = $PG3['sn_manager']['total'].", ".$PG3['ppic_manager']['total'].", ".$PG3['fs_manager']['total'].", ".$PG3['kawil_9']['total'].", ".$PG3['kawil_11']['total'].", ".$PG3['kawil_12']['total'].", ".$PG3['kawil_13']['total'].", ".$PG3['kawil_14']['total'];
  $total_pg3_part2 = $PG3['kabag_fe']['total'].", ".$PG3['kabag_planting']['total'].", ".$PG3['kabag_fs']['total'].", ".$PG3['kabag_pm']['total'].", ".$PG3['kabag_qc']['total'].", ".$PG3['kabag_gulma']['total'].", ".$PG3['kabag_ppo']['total'].", ".$PG3['kabag_pppp']['total'];
  $total_pg3 = $total_pg3_part1.", ".$total_pg3_part2;

  $total_pg3_part1_all = $PG3_all['sn_manager']['total'].", ".$PG3_all['ppic_manager']['total'].", ".$PG3_all['fs_manager']['total'].", ".$PG3_all['kawil_9']['total'].", ".$PG3_all['kawil_11']['total'].", ".$PG3_all['kawil_12']['total'].", ".$PG3_all['kawil_13']['total'].", ".$PG3_all['kawil_14']['total'];
  $total_pg3_part2_all = $PG3_all['kabag_fe']['total'].", ".$PG3_all['kabag_planting']['total'].", ".$PG3_all['kabag_fs']['total'].", ".$PG3_all['kabag_pm']['total'].", ".$PG3_all['kabag_qc']['total'].", ".$PG3_all['kabag_gulma']['total'].", ".$PG3_all['kabag_ppo']['total'].", ".$PG3_all['kabag_pppp']['total'];
  $total_pg3_all = $total_pg3_part1_all.", ".$total_pg3_part2_all;
?>
<script>
	var config_history_login_pg3 = {
    type: 'bar',
    data: {
  		labels: [
        "Sn. Manager", "Mn. PPIC", "Mn. FS", "W09", "W11", "W12", "W13", "W14", "FE", "Planting", "FS", "PM", "QC", "Gulma", "PPO", "P4"
      ],
  		datasets: [{
        type: 'bar',
        label: 'Total',
        yAxisID: 'Total',
        backgroundColor: '#00FF00',
        borderWidth: 1,
        data: [
          <?php echo $total_pg3_all; ?>
        ]
      },{
        type: 'line',
        fill: true,
  			backgroundColor: '#9CFF9C',
        borderColor: '#9CFF9C',
        label: 'Average',
        yAxisID: 'Average',
        data: [
          <?php echo $total_pg3; ?>
        ]
        },]
    },
    options: {
      responsive: true,
      legend: {
        display: false,
        position: 'bottom',
        labels: {
          usePointStyle: true,
        }
      },
      title: {
        display: true,
        text: 'History Login PG3'
      },
      tooltips: {
        mode: 'index',
        intersect: false,
        callbacks: {
          label: function(tooltipItem, data) {
            var label = data.datasets[tooltipItem.datasetIndex].label;
            if(data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index] >= 0){
              var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
            }
            else{
              var val = 0;
            }
            return label + ' : ' + val + 'H';
          }
        }
      },
			scales: {
				yAxes: [{
    			display: true,
          id: 'Average',
					gridLines: {
      			display: false,
      			drawBorder: false,
      			drawOnChartArea: false,
      		},
					ticks: {
            max: 6,
            min: 0
					}
				},{
    			display: true,
          position: 'right',
          id: 'Total',
					gridLines: {
      			display: false,
      			drawBorder: false,
      			drawOnChartArea: false,
      		},
					ticks: {
            max: 180,
            min: 0
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
      // animation: {
      //   onComplete: function () {
      //     var chartInstance = this.chart;
      //     var ctx = chartInstance.ctx;
      //     ctx.textAlign = "center";
      //
      //     Chart.helpers.each(this.data.datasets.forEach(function (dataset, i) {
      //       var meta = chartInstance.controller.getDatasetMeta(i);
      //       Chart.helpers.each(meta.data.forEach(function (bar, index) {
      //         ctx.fillText(dataset.data[index], bar._model.x, bar._model.y - 10);
      //       }),this)
      //     }),this);
      //   }
      // }
    }
	};
</script>
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
<script>
  document.addEventListener("DOMContentLoaded", function(event) {

  });
  function back(){
    window.location.href="/PIS/Dashboard/profile";
  }
  function change_tgl(bulan){
    if(bulan == 1){
      window.location.href="/PIS/Report/history_login?tanggal="+$("#select_bulan").val()+"-"+$("#select_tgl").val()+"&cb=1";
    }
    else{
      window.location.href="/PIS/Report/history_login?tanggal="+$("#select_bulan").val()+"-"+$("#select_tgl").val();
    }
  }
  window.onload = function() {
<?php
  if($_SESSION['crud'] == 0 || $_SESSION['index'] == "01334" || $_SESSION['index'] == "10007809" || $_SESSION['index'] == "10003609" || $_SESSION['index'] == "04660" || strpos($_SESSION['deskripsi'], "PG1")){
?>
    var ctx_history_login_pg1 = document.getElementById('diagram_history_login_pg1').getContext('2d');
    window.myBar = new Chart(ctx_history_login_pg1, config_history_login_pg1);
<?php
  }
  if($_SESSION['crud'] == 0 || $_SESSION['index'] == "01334" || $_SESSION['index'] == "10007809" || $_SESSION['index'] == "10003609" || $_SESSION['index'] == "04660" || strpos($_SESSION['deskripsi'], "PG2")){
?>
    var ctx_history_login_pg2 = document.getElementById('diagram_history_login_pg2').getContext('2d');
    window.myBar = new Chart(ctx_history_login_pg2, config_history_login_pg2);
<?php
  }
  if($_SESSION['crud'] == 0 || $_SESSION['index'] == "01334" || $_SESSION['index'] == "10007809" || $_SESSION['index'] == "10003609" || $_SESSION['index'] == "04660" || strpos($_SESSION['deskripsi'], "PG3")){
?>
    var ctx_history_login_pg3 = document.getElementById('diagram_history_login_pg3').getContext('2d');
    window.myBar = new Chart(ctx_history_login_pg3, config_history_login_pg3);
<?php
  }
?>
  }
</script>
