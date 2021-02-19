<div class="page-content-wrap">

    <div class="row">
        <div style="margin-top:5px;" class="col-md-12">

            <div class="panel panel-default">
              <div class="panel-heading" style="background-color: #008B8B;">
                <div class="panel-title-box" style="padding-top:4px;padding-left:4px;">
                  <h3 style="color:black;"><b>Simulasi Lokasi <?php echo $lokasi['lokasi']; ?></b></h3>
                </div>
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="row">
                      <div class="table-responsive">
                        <table class="table table-actions">
                          <tbody>
                            <tr>
                              <td colspan="6">
                                &nbsp;
                              </td>
                              <td>
                                <select class="form-control select" name="select_simulasi" id="select_simulasi" onchange="sort_type()">
                                  <option value="Ha">Ha</option>
                                  <option value="Kg">Kg</option>
                                </select>
                              </td>
                            </tr>
                            <tr style="background-color: #00BFFF;">
                              <td style="color:black;padding-top:3px;padding-bottom:3px;" align="center">
                                <b>Group Cost</b>
                              </td>
                              <td style="color:black;padding-top:3px;padding-bottom:3px;" align="center">
                                <b>BPP</b>
                              </td>
                              <td style="color:black;padding-top:3px;padding-bottom:3px;" align="center">
                                <b>RFB</b>
                              </td>
                              <td style="color:black;padding-top:3px;padding-bottom:3px;" align="center">
                                <b>Real+Forecast</b>
                              </td>
                              <td style="color:black;padding-top:3px;padding-bottom:3px;" align="center">
                                <b>Real</b>
                              </td>
                              <td style="color:black;padding-top:3px;padding-bottom:3px;" align="center">
                                <b>Forcast</b>
                              </td>
                              <td style="color:black;padding-top:3px;padding-bottom:3px;" align="center">
                                <b>Koreksi Forcast</b>
                              </td>
                            </tr>
<?php
  //Produksi
  if($produksi == NULL){
    $luas = $lokasi['luas'];
    if(substr($lokasi['status'], 2, 2) == 'FC'){
      if(substr($lokasi['status'], 0, 4) == 'NFFC'){
        echo angka_ribuan(82.2*$luas)." Ton";
        $tonase = 82.2*$luas;
      }
      else{
        echo angka_ribuan(98*$luas)." Ton";
        $tonase = 98*$luas;
      }
    }
    else{
      $tonase = $luas * 65;
    }
    if($lokasi['tgl_panen_standard'] != NULL){
      $tgl_panen = $lokasi['tgl_panen_standard'];
    }
    else if($lokasi['tgl_panen_rencana'] != NULL){
      $tgl_panen = $lokasi['tgl_panen_rencana'];
    }
    else{
      if(substr(substr($lokasi['status'], 0, 4), 0, 4) != 'NSSC'){
        $tgl_panen = strtotime($lokasi['tgl_mulai_rawat']) + ($standart_panen[$kelas]['bulan'] * 30.4583333333333 * 86400);
      }
      else{
        $tgl_panen = strtotime($lokasi['tgl_mulai_rawat']) + 13 * 30.5 * 86400;
      }
      $tgl_panen = date('Y-m-d', $tgl_panen);
    }

    if(date('Y', strtotime($tgl_panen)) == date('Y', strtotime($konstanta['nilai']))){
      $tgl_panen = date('Y-m-d', strtotime($tgl_panen) + (86400 * 91.5));
    }
  }
  else{
    $luas = $produksi['real_dan_sisa_rencana_luas'];
    $tonase = $produksi['real_dan_sisa_rencana_tonase'];
    $tgl_panen = $produksi['real_dan_sisa_rencana_tgl_selesai_panen'];
  }
  //Tgl Forcing
  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
    $tgl_rencana_forcing = NULL;
  }
  else{
    $tgl_rencana_forcing = strtotime($tgl_panen) - (152 * 86400);
  }

  //Produksi
  if($tonase_panen['alami']['produksi_ton'] == NULL){
    $produksi_alami = 0;
  }
  else{
    $produksi_alami = $tonase_panen['alami']['produksi_ton'] * 1000;
  }
  if($tonase_panen['reguler']['produksi_ton'] == NULL){
    $produksi_mekanis = 0;
  }
  else{
    $produksi_mekanis = $tonase_panen['reguler']['produksi_ton'] * 1000;
  }

  $total_bpp_ha = 0;
  $total_bpp_kg = 0;
  $ec_real = 0;
  $ec_f = 0;
  $total_real = 0;
  $total_f = 0;
  $i = 0;
  foreach ($element_cost as $ec) {
    if(substr($ec->code, 2) % 2 == 1){
      $color_element_cost = "style='background-color:#F5F5F5;'";
    }
    else{
      $color_element_cost = "";
    }

    if(date('Y', strtotime($tgl_panen)) == date('Y', strtotime($konstanta['nilai']))){
      if($target[$ec->code] != NULL){
        $bpp_ha = $target[$ec->code];
        $bpp_kg = ($target[$ec->code] * $luas) / $tonase / 1000;
      }
      else{
        if(substr($lokasi['status'], 2, 2) == 'FC'){
          $bpp_ha = $ec->NSFC_ha;
          $bpp_kg = $ec->NSFC_kg;
        }
        else if(substr($lokasi['status'], 0, 4) == 'NSSC'){
          $bpp_ha = $ec->NSSC_ha;
          $bpp_kg = $ec->NSSC_kg;
        }
      }
      if($ec->code == 'ZN02'){
        $total_bpp_ha += $target['ZN02X'];
        $total_bpp_kg += ($target['ZN02X'] * $luas) / $tonase / 1000;
      }
      else{
        $total_bpp_ha += $bpp_ha;
        $total_bpp_kg += ($bpp_ha * $luas) / $tonase / 1000;
      }
    }
    else{
      if(substr($lokasi['status'], 2, 2) == 'FC'){
        $bpp_ha = $ec->NSFC_ha_t1;
        $bpp_kg = $ec->NSFC_kg_t1;
      }
      else if(substr($lokasi['status'], 0, 4) == 'NSSC'){
        $bpp_ha = $ec->NSSC_ha_t1;
        $bpp_kg = $ec->NSSC_kg_t1;
      }
      $total_bpp_ha += $bpp_ha;
      $total_bpp_kg += $bpp_kg;
    }

    //Bobot Charge
    if(isset($forecast_overhead[$ec->code]['fo'])){
      $fo = $forecast_overhead[$ec->code]['fo'];
    }
    else{
      $fo = 0;
    }

    //Real
    $ec_real = $element_cost_real[$ec->code]['total'];

    //Forecast
    if($ec->code == 'ZN08'){
      if(($element_cost_real[$ec->code]['total'] / $luas) <= 500000){
        if(isset($koreksi[$ec->code])){
          if((($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f['ZN081']['rp_per_ha'] + ($element_cost_f['ZN081']['rp_per_ha'] * $fo))) * $koreksi[$ec->code] >= ($element_cost_real[$ec->code]['total'] / $luas)){
            $ec_f = ((($element_cost_f['ZN081']['rp_per_ha'] + ($element_cost_f['ZN081']['rp_per_ha'] * $fo))) * $koreksi[$ec->code]) * $luas;
          }
          else{
            $ec_f = 0;
          }
        }
        else{
          $ec_f = ($element_cost_f['ZN081']['rp_per_ha'] + ($element_cost_f['ZN081']['rp_per_ha'] * $fo)) * $luas;
        }
      }
      else if(($element_cost_real[$ec->code]['total'] / $luas) <= 1000000){
        if(isset($koreksi[$ec->code])){
          if((($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f['ZN082']['rp_per_ha'] + ($element_cost_f['ZN082']['rp_per_ha'] * $fo))) * $koreksi[$ec->code] >= ($element_cost_real[$ec->code]['total'] / $luas)){
            $ec_f = ((($element_cost_f['ZN082']['rp_per_ha'] + ($element_cost_f['ZN082']['rp_per_ha'] * $fo))) * $koreksi[$ec->code]) * $luas;
          }
          else{
            $ec_f = 0;
          }
        }
        else{
          $ec_f = ($element_cost_f['ZN082']['rp_per_ha'] + ($element_cost_f['ZN082']['rp_per_ha'] * $fo)) * $luas;
        }
      }
      else{
        if(isset($koreksi[$ec->code])){
          if((($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f['ZN083']['rp_per_ha'] + ($element_cost_f['ZN083']['rp_per_ha'] * $fo))) * $koreksi[$ec->code] >= ($element_cost_real[$ec->code]['total'] / $luas)){
            $ec_f = ((($element_cost_f['ZN083']['rp_per_ha'] + ($element_cost_f['ZN083']['rp_per_ha'] * $fo))) * $koreksi[$ec->code]) * $luas;
          }
          else{
            $ec_f = 0;
          }
        }
        else{
          $ec_f = ($element_cost_f['ZN083']['rp_per_ha'] + ($element_cost_f['ZN083']['rp_per_ha'] * $fo)) * $luas;
        }
      }
    }
    else if($ec->code == 'ZN03' && substr($lokasi['status'], 2, 2) == 'FC'){
      if(strtotime($lokasi['tgl_mulai_rawat']) >= strtotime('2019-05-01')){
        $ec_f = ($element_cost_f[$ec->code]['rp_per_ha'] + 1000000) * $luas;
      }
      else{
        $ec_f = ($element_cost_f[$ec->code]['rp_per_ha'] + 3676535.88918288) * $luas;
      }
    }
    else if($ec->code == 'ZN04' && substr($tgl_panen, 0, 4) == date('Y', strtotime($konstanta['nilai']))){
      if(substr($lokasi['status'], 2, 2) == 'FC'){
        $ec_f = (1300000 + (1300000 * $fo)) * $luas;
      }
      else{
        $ec_f = (890000 + (890000 * $fo)) * $luas;
      }
    }
    else if($ec->code == 'ZN05'){
      //Work on
      $hari_tarik_data = strtotime($konstanta['nilai']);
      $hari_perawatan = strtotime($lokasi['tgl_mulai_rawat']);
      $hari_rencana_forcing = ($tgl_rencana_forcing);
      $jml_sesudah = 0;
      if(substr($lokasi['status'], 2, 2) == 'FC'){
        if(($hari_tarik_data - $hari_perawatan) > (80 * 86400)){
          $jml_sesudah = (($hari_rencana_forcing - (104 * 86400)) - $hari_tarik_data) / (20 * 86400);
        }
        else{
          $jml_sesudah = ((($hari_rencana_forcing - (104 * 86400)) - ($hari_perawatan + (80 * 86400))) / (20 * 86400));
        }
      }
      else if(substr($lokasi['status'], 0, 4) == 'NSSC'){
        $jml_sesudah = (($hari_rencana_forcing - (80 * 86400)) - $hari_tarik_data) / (30 * 86400);
      }
      else{
        $jml_sesudah = 0;
      }
      if($jml_sesudah > 0){
        $jml_sesudah = ceil($jml_sesudah);
      }
      else{
        $jml_sesudah = 0;
      }

      $jml_sebelum = 0;
      if(substr($lokasi['status'], 2, 2) == 'FC'){
        if(($hari_rencana_forcing - $hari_tarik_data) > (104 * 86400)){
          $jml_sebelum = 104 / 15;
        }
        else{
          $jml_sebelum = ($hari_rencana_forcing - $hari_tarik_data) / (15 * 86400);
        }
      }
      else if(substr($lokasi['status'], 0, 4) == 'NSSC'){
        if(($hari_rencana_forcing - $hari_tarik_data) > (80 * 86400)){
          $jml_sebelum = 80 / 20;
        }
        else{
          $jml_sebelum = ($hari_rencana_forcing - $hari_tarik_data) / (20 * 86400);
        }
      }
      else{
        $jml_sebelum = 0;
      }
      if($jml_sebelum > 0){
        $jml_sebelum = floor($jml_sebelum);
      }
      else{
        $jml_sebelum = 0;
      }

      $f_ZN05 = 0;
      if(substr($lokasi['status'], 2, 2) == 'FC'){
          if(($hari_tarik_data - $hari_perawatan) < (60 * 86400)){
            $tambahan = 2068249.63690476;
          }
          else{
            $tambahan = 0;
          }
          $f_ZN05 = (($jml_sesudah + $jml_sebelum) * 19454856 / 14) + $tambahan;
      }
      else if(substr($lokasi['status'], 0, 4) == 'NSSC'){
          $f_ZN05 = ($jml_sesudah + $jml_sebelum) * 8083566 / 9;
      }
      else{
          $f_ZN05 = 0;
      }

      if(isset($koreksi[$ec->code])){
        if((($element_cost_real[$ec->code]['total'] / $luas) + ($f_ZN05 + ($f_ZN05 * $fo))) * $koreksi[$ec->code] >= ($element_cost_real[$ec->code]['total'] / $luas)){
          $ec_f = (((($element_cost_real[$ec->code]['total'] / $luas) + ($f_ZN05 + ($f_ZN05 * $fo))) * $koreksi[$ec->code]) - ($element_cost_real[$ec->code]['total'] / $luas)) * $luas;
        }
        else{
          $ec_f = 0;
        }
      }
      else{
        $ec_f = ($f_ZN05 + ($f_ZN05 * $fo)) * $luas;
      }
    }
    else if($ec->code == 'ZN13'){
      if(strtotime($tgl_panen) > strtotime($tgl_irrigation['start']['nilai']) && strtotime($tgl_panen) < strtotime($tgl_irrigation['finish']['nilai'])){
        $jumlah_irrigation = (floor(((strtotime($tgl_panen) - (86400 * 5)) - strtotime($tgl_irrigation['start']['nilai'])) / (86400 * 10))) * 550000;
      }
      else if(strtotime($tgl_panen) > strtotime($tgl_irrigation['start']['nilai']) && strtotime($tgl_panen) > strtotime($tgl_irrigation['finish']['nilai'])){
        $jumlah_irrigation = (floor(((strtotime($tgl_irrigation['finish']['nilai']) - (86400 * 5)) - strtotime($tgl_irrigation['start']['nilai'])) / (86400 * 10))) * 550000;
      }
      else{
        $jumlah_irrigation = 0;
      }
      if(date('Y', strtotime($tgl_panen)) == date('Y', strtotime($konstanta['nilai']))){
        if(substr($lokasi['status'], 2, 2) == 'FC'){
          $jumlah_irrigation = $jumlah_irrigation * 0.75;
        }
        else{
          $jumlah_irrigation = $jumlah_irrigation * 0.4;
        }
      }
      else{
        if(substr($lokasi['status'], 2, 2) == 'FC'){
          $jumlah_irrigation = $jumlah_irrigation * 0.55;
        }
        else{
          $jumlah_irrigation = $jumlah_irrigation * 0.2;
        }
      }

      if(strtotime($tgl_panen) > strtotime($tgl_irrigation_t1['start']['nilai']) && strtotime($tgl_panen) < strtotime($tgl_irrigation_t1['finish']['nilai'])){
        $jumlah_irrigation_t1 = (floor(((strtotime($tgl_panen) - (86400 * 5)) - strtotime($tgl_irrigation_t1['start']['nilai'])) / (86400 * 10))) * 550000;
      }
      else if(strtotime($tgl_panen) > strtotime($tgl_irrigation_t1['start']['nilai']) && strtotime($tgl_panen) > strtotime($tgl_irrigation_t1['finish']['nilai'])){
        $jumlah_irrigation_t1 = (floor(((strtotime($tgl_irrigation_t1['finish']['nilai']) - (86400 * 5)) - strtotime($tgl_irrigation_t1['start']['nilai'])) / (86400 * 10))) * 550000;
      }
      else{
        $jumlah_irrigation_t1 = 0;
      }
      if(substr($lokasi['status'], 2, 2) == 'FC'){
        $jumlah_irrigation_t1 = $jumlah_irrigation_t1 * 0.75;
      }
      else{
        $jumlah_irrigation_t1 = $jumlah_irrigation_t1 * 0.3;
      }
      $jumlah_irrigation = $jumlah_irrigation + $jumlah_irrigation_t1;

      if(isset($koreksi[$ec->code])){
        if((($element_cost_real[$ec->code]['total'] / $luas) + ($jumlah_irrigation + ($jumlah_irrigation * $fo))) * $koreksi[$ec->code] >= ($element_cost_real[$ec->code]['total'] / $luas)){
          $ec_f = (((($element_cost_real[$ec->code]['total'] / $luas) + ($jumlah_irrigation + ($jumlah_irrigation * $fo))) * $koreksi[$ec->code]) - ($element_cost_real[$ec->code]['total'] / $luas)) * $luas;
        }
        else{
          $ec_f = 0;
        }
      }
      else{
        $ec_f = ($jumlah_irrigation + ($jumlah_irrigation * $fo)) * $luas;
      }
    }
    else{
      if($element_cost_f[$ec->code]['rp_per_ha'] + ($element_cost_real[$ec->code]['total'] / $luas) != NULL || $ec->code == 'ZN10'){
        if(($element_cost_real['ZN10']['total'] / $tonase / 1000) < 100 || ($ec->code == 'ZN09' || $ec->code == 'ZN10' || $ec->code == 'ZN11')){
          if($ec->code == 'ZN09' && $element_cost_real['ZN09']['total'] > 0){
            $ec_f = 0;
          }
          else{
            if($ec->code == 'ZN10'){
              $persen_alami = $produksi_alami / ($tonase * 1000);
      		    $asumsi_alami = $this->Forecast_model->get_help_zn10(date('n', strtotime($tgl_panen)));
              if(substr($lokasi['status'], 2, 2) == 'FC'){
        		    $asumsi_alami = $asumsi_alami['ZN10'];
              }
              else{
        		    $asumsi_alami = 0.01;
              }

              if(date('Y-m', strtotime($tgl_panen)) == date('Y-m', strtotime($konstanta['nilai']))){
                $sisa_alami = 0;
              }
              else{
                if($persen_alami > $asumsi_alami){
                  $sisa_alami = (0.03 * $tonase) * 1000;
                }
                else{
                  $sisa_alami = ($asumsi_alami - $persen_alami) * $tonase * 1000;
                }
              }

              if(($tonase * 1000) - $sisa_alami - $produksi_alami - $produksi_mekanis < 0){
                $sisa_panen = 0 * $tonase * 1000;
              }
              else{
                $sisa_panen = ($tonase * 1000) - $sisa_alami - $produksi_alami - $produksi_mekanis;
              }

              if(substr($lokasi['status'], 2, 2) == 'FC'){
                $bpp_alami = $sisa_alami * 390;
                $bpp_mekanis = $sisa_panen * 116.927412395172;
              }
              else{
                $bpp_alami = $sisa_alami * 610.726268365189;
                $bpp_mekanis = $sisa_panen * 136.355022188611;
              }

              if(substr($lokasi['status'], 2, 2) == 'FC'){
                $exclude_panen = 100.14517106282 * ($sisa_alami + $sisa_panen);
              }
              else{
                $exclude_panen = 108.376536114483 * ($sisa_alami + $sisa_panen);
              }

              if($produksi == NULL){
                $luas_panen = $luas;
              }
              else{
                $luas_panen = $produksi['real_dan_sisa_rencana_luas'];
              }

              $forecast_ZN10 = ($bpp_alami + $bpp_mekanis + $exclude_panen) / $luas_panen;

              $ec_f = ($forecast_ZN10) * $luas;
            }
            else{
              if(isset($koreksi[$ec->code])){
                if((($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f[$ec->code]['rp_per_ha'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $fo))) * $koreksi[$ec->code] >= ($element_cost_real[$ec->code]['total'] / $luas)){
                  $ec_f = ((($element_cost_f[$ec->code]['rp_per_ha'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $fo))) * $koreksi[$ec->code]) * $luas;
                }
                else{
                  $ec_f = 0;
                }
              }
              else{
                $ec_f = ($element_cost_f[$ec->code]['rp_per_ha'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $fo)) * $luas;
              }
            }
          }
        }
        else{
          $ec_f = 0;
        }
      }
      else{
        $ec_f = 0;
      }
    }
    $i++;
?>
                            <tr <?php echo $color_element_cost; ?>>
                              <td style="color:black;padding-top:1px;padding-bottom:1px;">
                                <b><?php echo $ec->nama; ?></b>
                              </td>
                              <td style="color:black;padding-top:1px;padding-bottom:1px;" align="right">
                                <b style="display:none;" class="HA_PER_RP"><?php echo angka_ribuan($bpp_ha); ?></b>
                                <b style="display:none;" class="KG_PER_RP"><?php echo angka_ribuan($bpp_kg); ?></b>
                              </td>
                              <td style="color:black;padding-top:1px;padding-bottom:1px;" align="right">
                                <b style="display:none;" class="HA_PER_RP"><?php echo angka_ribuan($bpp_ha); ?></b>
                                <b style="display:none;" class="KG_PER_RP"><?php echo angka_ribuan($bpp_kg); ?></b>
                              </td>
                              <td style="color:black;padding-top:1px;padding-bottom:1px;" align="right">
                                <b style="display:none;" class="HA_PER_RP"><?php echo angka_ribuan(($ec_real + $ec_f) / $luas); ?></b>
                                <b style="display:none;" class="KG_PER_RP"><?php echo angka_ribuan(($ec_real + $ec_f) / $tonase / 1000); ?></b>
                              </td>
                              <td style="color:black;padding-top:1px;padding-bottom:1px;" align="right">
                                <b style="display:none;" class="HA_PER_RP"><?php echo angka_ribuan($ec_real / $luas); ?></b>
                                <b style="display:none;" class="KG_PER_RP"><?php echo angka_ribuan($ec_real / $tonase / 1000); ?></b>
                              </td>
                              <td style="color:black;padding-top:1px;padding-bottom:1px;" align="right">
                                <b style="display:none;" class="HA_PER_RP"><?php echo angka_ribuan($ec_f / $luas); ?></b>
                                <b style="display:none;" class="KG_PER_RP"><?php echo angka_ribuan($ec_f / $tonase / 1000); ?></b>
                              </td>
                              <td style="color:black;padding-top:1px;padding-bottom:1px;" align="right">
                                <input style="display:none;text-align:right;" onkeyup="changeNumber(this.id);" type="text" class="form-control HA_PER_RP_INPUT" id="ha_<?php echo ($i); ?>" value="<?php echo round($ec_f / $luas); ?>">
                                <input style="display:none;text-align:right;" onkeyup="changeNumber(this.id);" type="text" class="form-control KG_PER_RP_INPUT" id="kg_<?php echo ($i); ?>" value="<?php echo round($ec_f / $tonase / 1000); ?>">
                              </td>
                            </tr>
<?php
    $total_real += $ec_real;
    $total_f += $ec_f;
  }
?>
                            <tr style="background-color:#DCDCDC;">
                              <td style="color:black;padding-top:3px;padding-bottom:3px;">
                                <b>Total</b>
                              </td>
                              <td style="color:black;padding-top:3px;padding-bottom:3px;" align="right">
                                <b style="display:none;" class="HA_PER_RP"><?php echo angka_ribuan($total_bpp_ha); ?></b>
                                <b style="display:none;" class="KG_PER_RP"><?php echo angka_ribuan($total_bpp_kg); ?></b>
                              </td>
                              <td style="color:black;padding-top:3px;padding-bottom:3px;" align="right">
                                <b style="display:none;" class="HA_PER_RP"><?php echo angka_ribuan($total_bpp_ha); ?></b>
                                <b style="display:none;" class="KG_PER_RP"><?php echo angka_ribuan($total_bpp_kg); ?></b>
                              </td>
                              <td style="color:black;padding-top:3px;padding-bottom:3px;" align="right">
                                <b style="display:none;" class="HA_PER_RP"><?php echo angka_ribuan(($total_real + $total_f) / $luas); ?></b>
                                <b style="display:none;" class="KG_PER_RP"><?php echo angka_ribuan(($total_real + $total_f) / $tonase / 1000); ?></b>
                              </td>
                              <td style="color:black;padding-top:3px;padding-bottom:3px;" align="right">
                                <b style="display:none;" class="HA_PER_RP"><?php echo angka_ribuan($total_real / $luas); ?></b>
                                <b style="display:none;" class="KG_PER_RP"><?php echo angka_ribuan($total_real / $tonase / 1000); ?></b>
                              </td>
                              <td style="color:black;padding-top:3px;padding-bottom:3px;" align="right">
                                <b style="display:none;" class="HA_PER_RP"><?php echo angka_ribuan($total_f / $luas); ?></b>
                                <b style="display:none;" class="KG_PER_RP"><?php echo angka_ribuan($total_f / $tonase / 1000); ?></b>
                              </td>
                              <td style="color:black;padding-top:3px;padding-bottom:3px;" align="right">
                                <?php echo '<b style="display:none;" class="HA_PER_RP" id="total_s_ha">'.angka_ribuan($total_f / $luas).'</b>'; ?>
                                <?php echo '<b style="display:none;" class="KG_PER_RP" id="total_s_kg">'.angka_ribuan($total_f / $tonase / 1000).'</b>'; ?>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="row">
                      <div class="col-md-3">
                        <table class="table table-actions">
                          <tr style="background-color: #00BFFF;">
                            <td style="color:black;padding-top:3px;padding-bottom:3px;" align="center">
                              <b>Yield<b>
                            </td>
                          </tr>
                          <tr>
                            <td style="color:black;padding-top:1px;padding-bottom:1px;">
                              <input onkeyup="#" style="text-align:center;" maxlength="3" type="text" class="form-control" id="yield" value="<?php echo round($tonase / $luas); ?>" required>
                            </td>
                          </tr>
                        </table>
                      </div>
                    </div>
<?php
  $impact_rf = ($total_real + $total_f) / $tonase / 1000;
  $impact_rfb = $total_bpp_kg;
?>
                    <div class="row">
                      <table class="table table-actions">
                        <tr style="background-color: #00BFFF;">
                          <td style="color:black;padding-top:3px;padding-bottom:3px;" colspan="4" align="center">
                            <b>Cost Impact<b>
                          </td>
                        </tr>
                        <tr style="background-color: #DCDCDC;">
                          <td style="color:#FF0000;padding-top:3px;padding-bottom:3px;" align="center" colspan="2">
                            <b>Sebelum Koreksi<b>
                          </td>
                          <td style="color:#0000FF;padding-top:3px;padding-bottom:3px;" align="center" colspan="2">
                            <b>Sesudah Koreksi<b>
                          </td>
                        </tr>
                        <tr style="background-color: #DCDCDC;">
                          <td style="background-color: #FFB3B3;color:black;padding-top:15px;padding-bottom:0px;" align="center" colspan="2">
                            <font size="10px">
                              <b><?php echo round($impact_rf - $impact_rfb); ?><b>
                            </font>
                            <br />
                            <b>Rp/kg<b>
                          </td>
                          <td style="background-color: #B3B3FF;color:black;padding-top:15px;padding-bottom:0px;" align="center" colspan="2">
                            <font size="10px">
                              <b id="cost_impact"><?php echo round($impact_rf - $impact_rfb); ?><b>
                            </font>
                            <br />
                            <b>Rp/kg<b>
                          </td>
                        </tr>
<?php
  $persen_cost = (($impact_rf - $impact_rfb) / $impact_rfb) * 100;
  if($persen_cost < -2){
    $category = "Excellent";
    $category_color = "#00FF00";
  }
  else if($persen_cost <= 2){
    $category = "Good";
    $category_color = "#FFFF00";
  }
  else{
    $category = "Poor";
    $category_color = "#FF0000";
  }
?>
                        <tr style="background-color: #00BFFF;">
                          <td style="color:black;padding-top:1px;padding-bottom:1px;" align="center">
                            <b>% Cost<b>
                          </td>
                          <td style="color:black;padding-top:1px;padding-bottom:1px;" align="center">
                            <b>Category<b>
                          </td>
                          <td style="color:black;padding-top:1px;padding-bottom:1px;" align="center">
                            <b>Category<b>
                          </td>
                          <td style="color:black;padding-top:1px;padding-bottom:1px;" align="center">
                            <b>% Cost<b>
                          </td>
                        </tr>
                        <tr>
                          <td style="background-color:#DCDCDC;color:black;padding-top:3px;padding-bottom:3px;" align="center">
                            <b><?php echo round($persen_cost)."%"; ?><b>
                          </td>
                          <td style="background-color:<?php echo $category_color; ?>;color:black;padding-top:3px;padding-bottom:3px;" align="center">
                            <b><?php echo $category; ?><b>
                          </td>
                          <td id="category_color" style="background-color:<?php echo $category_color; ?>;color:black;padding-top:3px;padding-bottom:3px;" align="center">
                            <b id="category"><?php echo $category; ?><b>
                          </td>
                          <td style="background-color:#DCDCDC;color:black;padding-top:3px;padding-bottom:3px;" align="center">
                            <b id="persen_cost"><?php echo round($persen_cost)."%"; ?><b>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        </div>
    </div>

</div>
<script>
  document.addEventListener("DOMContentLoaded", function(event){
    total_s_ha();
    total_s_kg();
    sort_type();

<?php
for($i = 1; $i <= 15; $i++){
  if($i < 10){
    $angka = "0".$i;
  }
  else{
    $angka = $i;
  }
?>
    changeNumber("ha_<?php echo ($i); ?>");
    changeNumber("kg_<?php echo ($i); ?>");
<?php
}
?>

    $(".HA_PER_RP_INPUT").keyup(function(){
      total_s_ha();
<?php
  for($i = 1; $i <= 15; $i++){
    if($i < 10){
      $angka = "0".$i;
    }
    else{
      $angka = $i;
    }
?>
      if($("#ha_<?php echo ($i); ?>").val() == ""){
        var ZN<?php echo ($angka); ?> = "0";
      }
      else{
        var ZN<?php echo ($angka); ?> = $("#ha_<?php echo ($i); ?>").val();
      }
      ZN<?php echo ($angka); ?> = ZN<?php echo ($angka); ?>.replace(/[\D\s\._\-]+/g, "");
<?php
  }
?>
      var total_s = parseInt(ZN01) + parseInt(ZN02) + parseInt(ZN03) + parseInt(ZN04) + parseInt(ZN05) + parseInt(ZN06) + parseInt(ZN07) + parseInt(ZN08) + parseInt(ZN09) + parseInt(ZN10) + parseInt(ZN11) + parseInt(ZN12) + parseInt(ZN13) + parseInt(ZN14) + parseInt(ZN15);
      var yield = $("#yield").val();
      document.getElementById("cost_impact").innerHTML = (parseInt(((total_s + <?php echo $total_real / $luas; ?>) / yield) / 1000) - parseInt(<?php echo $impact_rfb; ?>));
      var cost_impact = $("#cost_impact").html();
      document.getElementById("persen_cost").innerHTML = Math.round(parseInt((cost_impact / <?php echo $impact_rfb; ?>) * 100)) + "%";
      if(parseInt((cost_impact / <?php echo $impact_rfb; ?>) * 100) < -2){
        var category = "Excellent";
        var category_color = "#00FF00";
      }
      else if(parseInt((cost_impact / <?php echo $impact_rfb; ?>) * 100) <= 2){
        var category = "Good";
        var category_color = "#FFFF00";
      }
      else{
        var category = "Poor";
        var category_color = "#FF0000";
      }
      document.getElementById("category").innerHTML = category;
      $("#category_color").css("background-color", category_color);
    });

    $(".KG_PER_RP_INPUT").keyup(function(){
      total_s_kg();
<?php
  for($i = 1; $i <= 15; $i++){
    if($i < 10){
      $angka = "0".$i;
    }
    else{
      $angka = $i;
    }
?>
      if($("#kg_<?php echo ($i); ?>").val() == ""){
        var ZN<?php echo ($angka); ?> = "0";
      }
      else{
        var ZN<?php echo ($angka); ?> = $("#kg_<?php echo ($i); ?>").val();
      }
      ZN<?php echo ($angka); ?> = ZN<?php echo ($angka); ?>.replace(/[\D\s\._\-]+/g, "");
<?php
  }
?>
      var total_s = parseInt(ZN01) + parseInt(ZN02) + parseInt(ZN03) + parseInt(ZN04) + parseInt(ZN05) + parseInt(ZN06) + parseInt(ZN07) + parseInt(ZN08) + parseInt(ZN09) + parseInt(ZN10) + parseInt(ZN11) + parseInt(ZN12) + parseInt(ZN13) + parseInt(ZN14) + parseInt(ZN15);
      var yield = $("#yield").val();
      document.getElementById("cost_impact").innerHTML = (parseInt(total_s + <?php echo $total_real / $tonase / 1000; ?>) - parseInt(<?php echo $impact_rfb; ?>));
      var cost_impact = $("#cost_impact").html();
      document.getElementById("persen_cost").innerHTML = Math.round(parseInt((cost_impact / <?php echo $impact_rfb; ?>) * 100)) + "%";
      if(parseInt((cost_impact / <?php echo $impact_rfb; ?>) * 100) < -2){
        var category = "Excellent";
        var category_color = "#00FF00";
      }
      else if(parseInt((cost_impact / <?php echo $impact_rfb; ?>) * 100) <= 2){
        var category = "Good";
        var category_color = "#FFFF00";
      }
      else{
        var category = "Poor";
        var category_color = "#FF0000";
      }
      document.getElementById("category").innerHTML = category;
      $("#category_color").css("background-color", category_color);
    });

    $("#yield").keyup(function(){
<?php
  for($i = 1; $i <= 15; $i++){
    if($i < 10){
      $angka = "0".$i;
    }
    else{
      $angka = $i;
    }
?>
      if($("#ha_<?php echo ($i); ?>").val() == ""){
        var ZN<?php echo ($angka); ?> = "0";
      }
      else{
        var ZN<?php echo ($angka); ?> = $("#ha_<?php echo ($i); ?>").val();
      }
      ZN<?php echo ($angka); ?> = ZN<?php echo ($angka); ?>.replace(/[\D\s\._\-]+/g, "");
<?php
  }
?>
      var total_s = parseInt(ZN01) + parseInt(ZN02) + parseInt(ZN03) + parseInt(ZN04) + parseInt(ZN05) + parseInt(ZN06) + parseInt(ZN07) + parseInt(ZN08) + parseInt(ZN09) + parseInt(ZN10) + parseInt(ZN11) + parseInt(ZN12) + parseInt(ZN13) + parseInt(ZN14) + parseInt(ZN15);
      var yield = $("#yield").val();
      document.getElementById("cost_impact").innerHTML = (parseInt(((total_s + <?php echo $total_real / $luas; ?>) / yield) / 1000) - parseInt(<?php echo $impact_rfb; ?>));
      var cost_impact = $("#cost_impact").html();
      document.getElementById("persen_cost").innerHTML = Math.round(parseInt((cost_impact / <?php echo $impact_rfb; ?>) * 100)) + "%";
      if(parseInt((cost_impact / <?php echo $impact_rfb; ?>) * 100) < -2){
        var category = "Excellent";
        var category_color = "#00FF00";
      }
      else if(parseInt((cost_impact / <?php echo $impact_rfb; ?>) * 100) <= 2){
        var category = "Good";
        var category_color = "#FFFF00";
      }
      else{
        var category = "Poor";
        var category_color = "#FF0000";
      }
      document.getElementById("category").innerHTML = category;
      $("#category_color").css("background-color", category_color);
    });
    //Resolusi Layar
    if(screen.width <= 600){

    }
    else{

    }
  });
  function back(){
    window.location.href="/PIS/Dashboard/profile";
  }
  function sort_type(){
    if($("#select_simulasi").val() == 'Ha'){
      $(".HA_PER_RP").show();
      $(".KG_PER_RP").hide();
      $(".HA_PER_RP_INPUT").show();
      $(".KG_PER_RP_INPUT").hide();
      $("#yield").prop('disabled', false);
    }
    else{
      $(".HA_PER_RP").hide();
      $(".KG_PER_RP").show();
      $(".HA_PER_RP_INPUT").hide();
      $(".KG_PER_RP_INPUT").show();
      $("#yield").val(<?php echo round($tonase / $luas); ?>);
      $("#yield").prop('disabled', true);
    }
  }
  function total_s_ha(){
<?php
  for($i = 1; $i <= 15; $i++){
    if($i < 10){
      $angka = "0".$i;
    }
    else{
      $angka = $i;
    }
?>
    if($("#ha_<?php echo ($i); ?>").val() == ""){
      var ZN<?php echo ($angka); ?> = "0";
    }
    else{
      var ZN<?php echo ($angka); ?> = $("#ha_<?php echo ($i); ?>").val();
    }
    ZN<?php echo ($angka); ?> = ZN<?php echo ($angka); ?>.replace(/[\D\s\._\-]+/g, "");
<?php
  }
?>
    var total_s = parseInt(ZN01) + parseInt(ZN02) + parseInt(ZN03) + parseInt(ZN04) + parseInt(ZN05) + parseInt(ZN06) + parseInt(ZN07) + parseInt(ZN08) + parseInt(ZN09) + parseInt(ZN10) + parseInt(ZN11) + parseInt(ZN12) + parseInt(ZN13) + parseInt(ZN14) + parseInt(ZN15);
    document.getElementById("total_s_ha").innerHTML = formatAngka(total_s);
  }
  function total_s_kg(){
<?php
  for($i = 1; $i <= 15; $i++){
    if($i < 10){
      $angka = "0".$i;
    }
    else{
      $angka = $i;
    }
?>
    if($("#kg_<?php echo ($i); ?>").val() == ""){
      var ZN<?php echo ($angka); ?> = "0";
    }
    else{
      var ZN<?php echo ($angka); ?> = $("#kg_<?php echo ($i); ?>").val();
    }
    ZN<?php echo ($angka); ?> = ZN<?php echo ($angka); ?>.replace(/[\D\s\._\-]+/g, "");
<?php
  }
?>
    var total_s = parseInt(ZN01) + parseInt(ZN02) + parseInt(ZN03) + parseInt(ZN04) + parseInt(ZN05) + parseInt(ZN06) + parseInt(ZN07) + parseInt(ZN08) + parseInt(ZN09) + parseInt(ZN10) + parseInt(ZN11) + parseInt(ZN12) + parseInt(ZN13) + parseInt(ZN14) + parseInt(ZN15);
    document.getElementById("total_s_kg").innerHTML = total_s;
  }
  function formatAngka(angka) {
    if (typeof(angka) != 'string') angka = angka.toString();
    var reg = new RegExp('([0-9]+)([0-9]{3})');
    while(reg.test(angka)) angka = angka.replace(reg, '$1.$2');
    return angka;
  }
  function changeNumber(id){
    // 1.
    var selection = window.getSelection().toString();
    if ( selection !== '' ) {
       return;
    }
    // 2.
    if ( $.inArray( event.keyCode, [38,40,37,39] ) !== -1 ) {
       return;
    }

    // 1
    var $this = $("#"+id);
    var input = $this.val();

    // 2
    var input = input.replace(/[\D\s\._\-]+/g, "");

    // 3
    input = input ? parseInt( input, 10 ) : 0;

    // 4
    $this.val( function() {
        return ( input === 0 ) ? "" : input.toLocaleString( "id-ID" );
    } );
  }
</script>
