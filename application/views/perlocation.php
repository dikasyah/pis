<!-- PAGE CONTENT -->
<div class="page-content">

  <!-- PAGE CONTENT WRAPPER -->
  <div class="page-content-wrap">

    <div class="col-md-12" style="padding:0px;">
      <div class="panel-body">
        <div class="col-md-12" style="padding:0px;">
          <div class="panel panel-default">
            <div class="panel-heading" style="background-color: #00CED1;">
              <h3 class="panel-title"><b>Per Lokasi Aktif</b></h3>
              <!-- <ul class="panel-controls" style="margin-top: 2px;width:40%;">
                <div class="col-md-6" style="padding:0px;">
                  <select class="form-control select" id="category_ha" onchange="category_ha()">
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
              </ul> -->
            </div>
            <div class="panel-body">
              <button class="btn btn-default btn-block" style="background-color:#32CD32;color:white;font-weight:bold;" onclick="export_perlocation();">Export</button>
              <br/>
              <div class="table-responsive">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <td rowspan="2" align='center' style="vertical-align:middle;background-color:#228B22;color:white;"><b>Plantation Group</b></td>
                      <td rowspan="2" align='center' style="vertical-align:middle;background-color:#228B22;color:white;"><b>Wilayah</b></td>
                      <td rowspan="2" align='center' style="vertical-align:middle;background-color:#228B22;color:white;"><b>Kebun</b></td>
                      <td rowspan="2" align='center' style="vertical-align:middle;background-color:#228B22;color:white;"><b>Lokasi</b></td>
                      <td rowspan="2" align='center' style="vertical-align:middle;background-color:#228B22;color:white;"><b>Umur</b></td>
                      <td colspan="3" align='center' style="vertical-align:middle;background-color:#228B22;color:white;"><b>Bibit</b></td>
                      <td rowspan="2" align='center' style="vertical-align:middle;background-color:#228B22;color:white;"><b>Status</b></td>
                      <td rowspan="2" align='center' style="vertical-align:middle;background-color:#228B22;color:white;"><b>Luas</b></td>
                      <td rowspan="2" align='center' style="vertical-align:middle;background-color:#228B22;color:white;"><b>Prediksi Tonase</b></td>
                      <td rowspan="2" align='center' style="vertical-align:middle;background-color:#228B22;color:white;"><b>Yield (Ton/Ha)</b></td>
                      <td rowspan="2" align='center' style="vertical-align:middle;background-color:#228B22;color:white;width:150px;"><b>Tanggal Rencana Forcing</b></td>
                      <td rowspan="2" align='center' style="vertical-align:middle;background-color:#228B22;color:white;width:150px;"><b>Tanggal Rencana Panen</b></td>
                      <td colspan="6" align='center' style="vertical-align:middle;background-color:#1E90FF;color:white;"><b>Rp/Ha</b></td>
                      <td colspan="5" align='center' style="vertical-align:middle;background-color:#1E90FF;color:white;"><b>Rp/Kg</b></td>
                      <td rowspan="2" align='center' style="vertical-align:middle;background-color:#228B22;color:white;"><b>Titik Lokasi Air</b></td>
                      <td rowspan="2" align='center' style="vertical-align:middle;background-color:#228B22;color:white;"><b>Jenis Sumber Air</b></td>

                      <td colspan="4" align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Land Preparation</b></td>
                      <td colspan="4" align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Seedling Allocation</b></td>
                      <td colspan="4" align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Planting</b></td>
                      <td colspan="4" align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Road and Drainage</b></td>
                      <td colspan="4" align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Fertilization</b></td>
                      <td colspan="4" align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Weed Control</b></td>
                      <td colspan="4" align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Plant Pest Control</b></td>
                      <td colspan="4" align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Forcing</b></td>
                      <td colspan="4" align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Pre Harvesting</b></td>
                      <td colspan="4" align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Harvesting</b></td>
                      <td colspan="4" align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Observation</b></td>
                      <td colspan="4" align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Plant Selection</b></td>
                      <td colspan="4" align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Springkle/Irrigation</b></td>
                      <td colspan="4" align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Guard/Pull/Labor or Transportation</b></td>
                      <td colspan="4" align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Others</b></td>
                    </tr>
                    <tr>
                      <td align='center' style="vertical-align:middle;background-color:#228B22;color:white;"><b>Jenis</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#228B22;color:white;"><b>Varian</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#228B22;color:white;"><b>Kelas</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#1E90FF;color:white;"><b>Budget</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#1E90FF;color:white;"><b>Realisasi</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#1E90FF;color:white;"><b>Sisa Saldo</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#1E90FF;color:white;"><b>Real + Prediksi</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#1E90FF;color:white;"><b>Devisiasi</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#1E90FF;color:white;"><b>Cateory</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#1E90FF;color:white;"><b>Budget</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#1E90FF;color:white;"><b>Realisasi</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#1E90FF;color:white;"><b>Real + Prediksi</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#1E90FF;color:white;"><b>Devisiasi</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#1E90FF;color:white;"><b>Cateory</b></td>

                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>BPP</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Real</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Forcast</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Total</b></td>

                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>BPP</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Real</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Forcast</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Total</b></td>

                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>BPP</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Real</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Forcast</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Total</b></td>

                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>BPP</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Real</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Forcast</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Total</b></td>

                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>BPP</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Real</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Forcast</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Total</b></td>

                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>BPP</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Real</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Forcast</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Total</b></td>

                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>BPP</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Real</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Forcast</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Total</b></td>

                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>BPP</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Real</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Forcast</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Total</b></td>

                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>BPP</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Real</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Forcast</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Total</b></td>

                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>BPP</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Real</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Forcast</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Total</b></td>

                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>BPP</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Real</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Forcast</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Total</b></td>

                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>BPP</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Real</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Forcast</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Total</b></td>

                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>BPP</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Real</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Forcast</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Total</b></td>

                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>BPP</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Real</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Forcast</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Total</b></td>

                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>BPP</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Real</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Forcast</b></td>
                      <td align='center' style="vertical-align:middle;background-color:#4B0082;color:white;"><b>Total</b></td>
                    </tr>
                  </thead>
                  <tbody>
<?php
  foreach ($perlocation as $l) {
    if($l->sisa_saldo <= 0){
      $color_sisa_saldo = 'blue';
    }
    else{
      $color_sisa_saldo = 'red';
    }
    switch ($l->category_rp_per_ha) {
      case 'Excellent':
        $color_rp_per_ha = '00FF00';
        break;
      case 'Good':
        $color_rp_per_ha = 'FFFF00';
        break;
      case 'Poor':
        $color_rp_per_ha = 'FF0000';
        break;
    }
    switch ($l->category_rp_per_kg) {
      case 'Excellent':
        $color_rp_per_kg = '00FF00';
        break;
      case 'Good':
        $color_rp_per_kg = 'FFFF00';
        break;
      case 'Poor':
        $color_rp_per_kg = 'FF0000';
        break;
    }
?>
                    <tr>
                      <td align='center'><?php echo $l->pg; ?></td>
                      <td align='center'><?php echo $l->wilayah; ?></td>
                      <td align='center'><?php echo $l->kebun; ?></td>
                      <td align='center'><a href='/PIS/dashboard/lokasi?lokasi=<?php echo $l->lokasi; ?>'><?php echo $l->lokasi; ?></a></td>
                      <td align='center'><?php echo $l->umur; ?></td>
                      <td align='center'><?php echo $l->jenis_bibit; ?></td>
                      <td align='center'><?php echo $l->varian_bibit; ?></td>
                      <td align='center'><?php echo $l->kelas_bibit; ?></td>
                      <td align='center'><?php echo $l->status; ?></td>
                      <td align='center'><?php echo $l->luas; ?></td>
                      <td align='center'><?php echo angka_ribuan($l->tonase); ?></td>
                      <td align='center'><?php echo round($l->tonase / $l->luas, 2); ?></td>
                      <td align='right'><?php echo format_tgl($l->tgl_rencana_forcing); ?></td>
                      <td align='right'><?php echo format_tgl($l->tgl_rencana_panen); ?></td>
                      <td align='right'><?php echo angka_ribuan($l->budget_rp_per_ha); ?></td>
                      <td align='right'><?php echo angka_ribuan($l->realisasi_rp_per_ha); ?></td>
                      <td align='right' style="color:<?php echo $color_sisa_saldo; ?>;"><?php echo angka_ribuan($l->sisa_saldo); ?></td>
                      <td align='right'><?php echo angka_ribuan($l->rf_rp_per_ha); ?></td>
                      <td align='right'><?php echo round($l->deviasi_rp_per_ha * 100).'%'; ?></td>
                      <td align='center' style="color:black;background-color:#<?php echo $color_rp_per_ha; ?>;"><b><?php echo $l->category_rp_per_ha; ?></b></td>
                      <td align='right'><?php echo angka_ribuan($l->budget_rp_per_kg); ?></td>
                      <td align='right'><?php echo angka_ribuan($l->realisasi_rp_per_kg); ?></td>
                      <td align='right'><?php echo angka_ribuan($l->rf_rp_per_kg); ?></td>
                      <td align='right'><?php echo round($l->deviasi_rp_per_kg * 100).'%'; ?></td>
                      <td align='center' style="color:black;background-color:#<?php echo $color_rp_per_kg; ?>;"><b><?php echo $l->category_rp_per_kg; ?></b></td>
                      <td align='center'><?php if($l->titik_air != NULL) echo $l->titik_air; else echo "-"; ?></td>
<?php
  switch ($l->sumber_air) {
    case 'Lebung':
      $bg_color = "#008000";
    break;
    case 'Sumur':
      $bg_color = "#008080";
    break;

    default:
      $bg_color = "#FF0000";
    break;
  }
?>
                      <td align='center' style="color:white;background-color:<?php echo $bg_color; ?>;font-weight:bold;"><?php if($l->sumber_air != NULL) echo $l->sumber_air; else echo "No Water Resource"; ?></td>

                      <td align='right' style="color:red;"><?php if($l->ZN01_b != 0) echo angka_ribuan($l->ZN01_b / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:blue;"><?php if($l->ZN01_r != 0) echo angka_ribuan($l->ZN01_r / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:#00B250;"><?php if($l->ZN01_f != 0) echo angka_ribuan($l->ZN01_f / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:orange;"><b><?php if(($l->ZN01_r + $l->ZN01_f) != 0) echo angka_ribuan(($l->ZN01_r + $l->ZN01_f) / $l->luas); else echo "-"; ?></b></td>

                      <td align='right' style="color:red;"><?php if($l->ZN02_b != 0) echo angka_ribuan($l->ZN02_b / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:blue;"><?php if($l->ZN02_r != 0) echo angka_ribuan($l->ZN02_r / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:#00B250;"><?php if($l->ZN02_f != 0) echo angka_ribuan($l->ZN02_f / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:orange;"><b><?php if(($l->ZN02_r + $l->ZN02_f) != 0) echo angka_ribuan(($l->ZN02_r + $l->ZN02_f) / $l->luas); else echo "-"; ?></b></td>

                      <td align='right' style="color:red;"><?php if($l->ZN03_b != 0) echo angka_ribuan($l->ZN03_b / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:blue;"><?php if($l->ZN03_r != 0) echo angka_ribuan($l->ZN03_r / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:#00B250;"><?php if($l->ZN03_f != 0) echo angka_ribuan($l->ZN03_f / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:orange;"><b><?php if(($l->ZN03_r + $l->ZN03_f) != 0) echo angka_ribuan(($l->ZN03_r + $l->ZN03_f) / $l->luas); else echo "-"; ?></b></td>

                      <td align='right' style="color:red;"><?php if($l->ZN04_b != 0) echo angka_ribuan($l->ZN04_b / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:blue;"><?php if($l->ZN04_r != 0) echo angka_ribuan($l->ZN04_r / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:#00B250;"><?php if($l->ZN04_f != 0) echo angka_ribuan($l->ZN04_f / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:orange;"><b><?php if(($l->ZN04_r + $l->ZN04_f) != 0) echo angka_ribuan(($l->ZN04_r + $l->ZN04_f) / $l->luas); else echo "-"; ?></b></td>

                      <td align='right' style="color:red;"><?php if($l->ZN05_b != 0) echo angka_ribuan($l->ZN05_b / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:blue;"><?php if($l->ZN05_r != 0) echo angka_ribuan($l->ZN05_r / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:#00B250;"><?php if($l->ZN05_f != 0) echo angka_ribuan($l->ZN05_f / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:orange;"><b><?php if(($l->ZN05_r + $l->ZN05_f) != 0) echo angka_ribuan(($l->ZN05_r + $l->ZN05_f) / $l->luas); else echo "-"; ?></b></td>

                      <td align='right' style="color:red;"><?php if($l->ZN06_b != 0) echo angka_ribuan($l->ZN06_b / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:blue;"><?php if($l->ZN06_r != 0) echo angka_ribuan($l->ZN06_r / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:#00B250;"><?php if($l->ZN06_f != 0) echo angka_ribuan($l->ZN06_f / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:orange;"><b><?php if(($l->ZN06_r + $l->ZN06_f) != 0) echo angka_ribuan(($l->ZN06_r + $l->ZN06_f) / $l->luas); else echo "-"; ?></b></td>

                      <td align='right' style="color:red;"><?php if($l->ZN07_b != 0) echo angka_ribuan($l->ZN07_b / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:blue;"><?php if($l->ZN07_r != 0) echo angka_ribuan($l->ZN07_r / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:#00B250;"><?php if($l->ZN07_f != 0) echo angka_ribuan($l->ZN07_f / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:orange;"><b><?php if(($l->ZN07_r + $l->ZN07_f) != 0) echo angka_ribuan(($l->ZN07_r + $l->ZN07_f) / $l->luas); else echo "-"; ?></b></td>

                      <td align='right' style="color:red;"><?php if($l->ZN08_b != 0) echo angka_ribuan($l->ZN08_b / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:blue;"><?php if($l->ZN08_r != 0) echo angka_ribuan($l->ZN08_r / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:#00B250;"><?php if($l->ZN08_f != 0) echo angka_ribuan($l->ZN08_f / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:orange;"><b><?php if(($l->ZN08_r + $l->ZN08_f) != 0) echo angka_ribuan(($l->ZN08_r + $l->ZN08_f) / $l->luas); else echo "-"; ?></b></td>

                      <td align='right' style="color:red;"><?php if($l->ZN09_b != 0) echo angka_ribuan($l->ZN09_b / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:blue;"><?php if($l->ZN09_r != 0) echo angka_ribuan($l->ZN09_r / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:#00B250;"><?php if($l->ZN09_f != 0) echo angka_ribuan($l->ZN09_f / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:orange;"><b><?php if(($l->ZN09_r + $l->ZN09_f) != 0) echo angka_ribuan(($l->ZN09_r + $l->ZN09_f) / $l->luas); else echo "-"; ?></b></td>

                      <td align='right' style="color:red;"><?php if($l->ZN10_b != 0) echo angka_ribuan($l->ZN10_b / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:blue;"><?php if($l->ZN10_r != 0) echo angka_ribuan($l->ZN10_r / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:#00B250;"><?php if($l->ZN10_f != 0) echo angka_ribuan($l->ZN10_f / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:orange;"><b><?php if(($l->ZN10_r + $l->ZN10_f) != 0) echo angka_ribuan(($l->ZN10_r + $l->ZN10_f) / $l->luas); else echo "-"; ?></b></td>

                      <td align='right' style="color:red;"><?php if($l->ZN11_b != 0) echo angka_ribuan($l->ZN11_b / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:blue;"><?php if($l->ZN11_r != 0) echo angka_ribuan($l->ZN11_r / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:#00B250;"><?php if($l->ZN11_f != 0) echo angka_ribuan($l->ZN11_f / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:orange;"><b><?php if(($l->ZN11_r + $l->ZN11_f) != 0) echo angka_ribuan(($l->ZN11_r + $l->ZN11_f) / $l->luas); else echo "-"; ?></b></td>

                      <td align='right' style="color:red;"><?php if($l->ZN12_b != 0) echo angka_ribuan($l->ZN12_b / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:blue;"><?php if($l->ZN12_r != 0) echo angka_ribuan($l->ZN12_r / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:#00B250;"><?php if($l->ZN12_f != 0) echo angka_ribuan($l->ZN12_f / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:orange;"><b><?php if(($l->ZN12_r + $l->ZN12_f) != 0) echo angka_ribuan(($l->ZN12_r + $l->ZN12_f) / $l->luas); else echo "-"; ?></b></td>

                      <td align='right' style="color:red;"><?php if($l->ZN13_b != 0) echo angka_ribuan($l->ZN13_b / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:blue;"><?php if($l->ZN13_r != 0) echo angka_ribuan($l->ZN13_r / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:#00B250;"><?php if($l->ZN13_f != 0) echo angka_ribuan($l->ZN13_f / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:orange;"><b><?php if(($l->ZN13_r + $l->ZN13_f) != 0) echo angka_ribuan(($l->ZN13_r + $l->ZN13_f) / $l->luas); else echo "-"; ?></b></td>

                      <td align='right' style="color:red;"><?php if($l->ZN14_b != 0) echo angka_ribuan($l->ZN14_b / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:blue;"><?php if($l->ZN14_r != 0) echo angka_ribuan($l->ZN14_r / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:#00B250;"><?php if($l->ZN14_f != 0) echo angka_ribuan($l->ZN14_f / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:orange;"><b><?php if(($l->ZN14_r + $l->ZN14_f) != 0) echo angka_ribuan(($l->ZN14_r + $l->ZN14_f) / $l->luas); else echo "-"; ?></b></td>

                      <td align='right' style="color:red;"><?php if($l->ZN15_b != 0) echo angka_ribuan($l->ZN15_b / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:blue;"><?php if($l->ZN15_r != 0) echo angka_ribuan($l->ZN15_r / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:#00B250;"><?php if($l->ZN15_f != 0) echo angka_ribuan($l->ZN15_f / $l->luas); else echo "-"; ?></td>
                      <td align='right' style="color:orange;"><b><?php if(($l->ZN15_r + $l->ZN15_f) != 0) echo angka_ribuan(($l->ZN15_r + $l->ZN15_f) / $l->luas); else echo "-"; ?></b></td>
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
  <!-- END PAGE CONTENT WRAPPER -->
</div>
<!-- END PAGE CONTENT -->
<?php
  if(isset($_GET['pg'])){
    $code = $_GET['pg'];
  }
  else{
    $code = $_GET['wilayah'];
  }
?>
<script>
  $( document ).ready(function() {

  });

  function export_perlocation(){
    var code = '<?php echo $code; ?>';

    window.location.href="/PIS/Export_Perlocation/export_perlocation?type=WIP&code="+code;
  }
</script>
