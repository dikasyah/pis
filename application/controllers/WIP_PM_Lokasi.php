<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WIP_PM_Lokasi extends CI_Controller {

	function __construct(){
		parent :: __construct();

		$this->load->model('User_model');
		$this->load->model('Konstanta_model');
		$this->load->model('Coordinate_model');
		$this->load->model('Wilayah_model');
		$this->load->model('Lokasi_model');
		$this->load->model('HistoriLokasi_model');
		$this->load->model('Produksi_model');
		$this->load->model('Coordinate_model');
		$this->load->model('StdYield_model');
		$this->load->model('GalleryLokasi_model');
		$this->load->model('Noted_model');
		$this->load->model('StdUnsurUmur_model');

		$this->load->model('Fertilization_model');
		$this->load->model('WeedControl_model');
		$this->load->model('PlantPestControl_model');
		$this->load->model('Activity_model');
		$this->load->model('DataMaster_model');
		$this->load->model('StdYield_model');
		$this->load->model('StdBiayaUmur_model');
		$this->load->model('PengamatanDaun_model');
		$this->load->model('Material_model');
		$this->load->model('Iklim_model');
		$this->load->model('BeratTanaman_model');
		$this->load->model('PengamatanPersenBunga_model');
		$this->load->model('GroupCost_model');
		$this->load->model('Forcing_model');
		$this->load->model('TonasePanen_model');
		$this->load->model('Forecast_model');
		$this->load->model('ElementCost_model');
		$this->load->model('ForecastOverhead_model');
		$this->load->model('VolumeAir_model');
		$this->load->model('HistoriSiram_model');
		$this->load->model('Koreksi_model');
		$this->load->model('Irrigation_model');
		$this->load->model('SBT_model');
		$this->load->model('PopulasiAwal_model');
		$this->load->model('Drainase_model');
		$this->load->model('PengamatanTanah_model');
		$this->load->model('PerlocationPM3_model');
	}

	public function lokasi()
	{
		session_start();
		if(isset($_SESSION['username'])){
			$page = $this->input->get('page');
			$lokasi = $this->input->get('lokasi');
			$data['account'] = $this->User_model->get_user_index($_SESSION['index']);
			$data["konstanta"] = $this->Konstanta_model->get_konstanta_code("TGL_TARIK_DATA");
			$data["YEAR_BASE"] = $this->Konstanta_model->get_konstanta_code("YEAR_BASE");
			$data["pg_wil"] = $this->Lokasi_model->get_detil_lokasi_pg_wil($lokasi);

			$data["lokasi"] = $this->Lokasi_model->get_lokasi_code($lokasi);
			$data["wilayah"] = $this->Wilayah_model->get_wilayah_code(substr($data['lokasi']['kebun'], 0, 3));
			$data["histori_lokasi_nssc_nsfc"] = $this->HistoriLokasi_model->get_histori_lokasi_code_nssc_nsfc($lokasi);
			$data["produksi"] = $this->Produksi_model->get_produksi_code($lokasi, substr($data["lokasi"]["status"], 0, 4));
			if($data["produksi"] == NULL){
				$data["produksi"] = $this->Produksi_model->get_produksi_t1_code($lokasi, substr($data["lokasi"]["status"], 0, 4));
			}

			if(substr($data["lokasi"]['status'], 0, 4) == 'NSFC' || substr($data["lokasi"]['status'], 0, 4) == 'NFFC'){
				$kelas = substr($data["lokasi"]['bibit'], 6, 1);
			}
			else{
				$kelas = 'NSSC';
			}

			$standart_panen = array(
				'B' => $this->Produksi_model->get_standart_produksi_code('B'),
				'S' => $this->Produksi_model->get_standart_produksi_code('S'),
				'K' => $this->Produksi_model->get_standart_produksi_code('K'),
				'E' => $this->Produksi_model->get_standart_produksi_code('E')
			);

			$data["std_yield"] = array(
				'NSFC' => $this->StdYield_model->get_std_yield_code('NSFC'),
				'NFFC' => $this->StdYield_model->get_std_yield_code('NFFC'),
				'NSSC' => $this->StdYield_model->get_std_yield_code('NSSC')
			);

		  if($data["produksi"] == NULL){
		    if($data["lokasi"]['tgl_panen_standard'] != NULL){
		      $data["tgl_panen"] = $data["lokasi"]['tgl_panen_standard'];
		    }
		    else if($data["lokasi"]['tgl_panen_rencana'] != NULL){
		      $data["tgl_panen"] = $data["lokasi"]['tgl_panen_rencana'];
		    }
		    else{
		      if(substr($data["lokasi"]['status'], 0, 4) != 'NSSC'){
		        $data["tgl_panen"] = strtotime($data["lokasi"]['tgl_mulai_rawat']) + ($standart_panen[$kelas]['bulan'] * 30.4583333333333 * 86400);
		      }
		      else{
		        $data["tgl_panen"] = strtotime($data["lokasi"]['tgl_mulai_rawat']) + ((13 * 30.5) * 86400);
		      }
		      $data["tgl_panen"] = date('Y-m-d', $data["tgl_panen"]);
		    }

		    // if(date('Y', strtotime($data["tgl_panen"])) == date('Y', strtotime($data["YEAR_BASE"]['nilai']))){
		    //   $data["tgl_panen"] = date('Y-m-d', strtotime($data["tgl_panen"]) + (86400 * 91.5));
		    // }
		  }
		  else{
		    $data["tgl_panen"] = $data["produksi"]['real_dan_sisa_rencana_tgl_selesai_panen'];
		  }

			$tgl_panen = $data["tgl_panen"];
			$cek_tgl_forcing = $this->db->query("SELECT '$tgl_panen' - INTERVAL 152 DAY AS tgl_forcing")->row_array();
      $tgl_rencana_forcing = date('Y-m-d', strtotime($cek_tgl_forcing['tgl_forcing']));
      $data["tgl_rencana_forcing"] = date('Y-m-d', strtotime($cek_tgl_forcing['tgl_forcing']));

		  if($data['produksi'] == NULL){
		    if($data['lokasi']['status'] == 'NFFC'){
		      $data['tonase'] = 82.2 * $data['lokasi']['luas'];
		      $data['yield'] = 82.2;
		    }
		    else{
					$status = substr($data["lokasi"]['status'], 0, 4);
		      $data['tonase'] = $data['std_yield'][$status]['yield'] * $data['lokasi']['luas'];
		      $data['yield'] = $data['std_yield'][$status]['yield'];
		    }
		  }
		  else{
		    $data['tonase'] = $data['produksi']['real_dan_sisa_rencana_tonase'];
		    $data['yield'] = $data['produksi']['real_dan_sisa_rencana_yield'];
		  }
		  if($data['produksi']['real_dan_sisa_rencana_luas'] != NULL){
		    $data['luas'] = $data['produksi']['real_dan_sisa_rencana_luas'];
		  }
		  else{
		    $data['luas'] = $data['lokasi']['luas'];
		  }
			if(date('Y', strtotime($data["tgl_panen"])) == date('Y', strtotime($data["YEAR_BASE"]['nilai']))){
				$data['std_yield'] = $this->StdYield_model->get_std_yield_code(substr($data['lokasi']['status'], 0, 4).'');
				$tahun = 'T0';
			}
			else{
				$data['std_yield'] = $this->StdYield_model->get_std_yield_code(substr($data['lokasi']['status'], 0, 4).'_t1');
				$tahun = 'T1';
			}
			if($data['lokasi']['tgl_forcing_realisasi'] != NULL){
				$tgl_forcing = $data['lokasi']['tgl_forcing_realisasi'];
				$data['tgl_forcing'] = $data['lokasi']['tgl_forcing_realisasi'];
			}
			else{
				$tgl_forcing = $data['tgl_rencana_forcing'];
				$data['tgl_forcing'] = $data['tgl_rencana_forcing'];
			}
			$data['std_forcing_panen'] = $this->Konstanta_model->get_std_forcing_panen($data['lokasi']['tgl_mulai_rawat'], $kelas);

			$data['satuan_material'] = $this->StdUnsurUmur_model->get_satuan_metarial();

			$data['page'] = $page;
			$this->load->view('WIP_PM/include/header');
			switch ($page) {
				//Dashboard
				case 'HOME':
				default:
					$data['group_cost'] = $this->input->get("group_cost");
					$data['element_cost'] = $this->input->get("element_cost");
					$data['coordinate'] = $this->Coordinate_model->get_coordinate_pm_lokasi($lokasi);
					$data['biaya_forcing'] = $this->Forcing_model->get_biaya_forcing($lokasi, $data['lokasi']['kebun'], $data['std_forcing_panen']['tgl_forcing'], $tgl_forcing);

					if($data['element_cost'] == NULL){
						$data['element_cost'] = 'Ha';
					}

					if(date('Y', strtotime($data["tgl_panen"])) == date('Y', strtotime($data["YEAR_BASE"]['nilai']))){
						$cek_produksi = 'produksi';
					}
					else{
						$cek_produksi = 'produksi_t1';
					}
					$ZN01_real = $this->DataMaster_model->get_real_actual_code_zn01_zn04($lokasi, substr($data['lokasi']['status'], 0, 4), 'ZN01', $cek_produksi);
					$ZN03_real = $this->DataMaster_model->get_real_actual_code_zn01_zn04($lokasi, substr($data['lokasi']['status'], 0, 4), 'ZN03', $cek_produksi);
					$ZN04_real = $this->DataMaster_model->get_real_actual_code_zn01_zn04($lokasi, substr($data['lokasi']['status'], 0, 4), 'ZN04', $cek_produksi);
					if($ZN01_real['total'] == NULL || $ZN01_real['total'] == 0){
						$ZN01_real = $this->DataMaster_model->get_element_cost_code_jenis($lokasi, "ZN01", $data["lokasi"]["kebun"]);
					}
					if($ZN03_real['total'] == NULL || $ZN03_real['total'] == 0){
						$ZN03_real = $this->DataMaster_model->get_element_cost_code_jenis($lokasi, "ZN03", $data["lokasi"]["kebun"]);
						if(substr($data['lokasi']['status'], 0, 4) == 'NSFC'){
							if($data['lokasi']['tgl_mulai_rawat'] >= "2019-05-01"){
								$ZN03_real['total'] = $ZN03_real['total'] + (1000000 * $data['lokasi']['luas']);
							}
							else{
								$ZN03_real['total'] = $ZN03_real['total'] + (3676535.88918288 * $data['lokasi']['luas']);
							}
						}
					}
					if($ZN04_real['total'] == NULL || $ZN04_real['total'] == 0){
						$ZN04_real = $this->DataMaster_model->get_element_cost_code_jenis($lokasi, "ZN04", $data["lokasi"]["kebun"]);
					}
					$data["element_cost_real"] = array(
						'ZN01' => $ZN01_real,
						'ZN02' => $this->DataMaster_model->get_element_cost_code_jenis($lokasi, "ZN02", $data["lokasi"]["kebun"]),
						'ZN03' => $ZN03_real,
						'ZN04' => $ZN04_real,
						'ZN05' => $this->DataMaster_model->get_element_cost_code_jenis($lokasi, "ZN05", $data["lokasi"]["kebun"]),
						'ZN06' => $this->DataMaster_model->get_element_cost_code_jenis($lokasi, "ZN06", $data["lokasi"]["kebun"]),
						'ZN07' => $this->DataMaster_model->get_element_cost_code_jenis($lokasi, "ZN07", $data["lokasi"]["kebun"]),
						'ZN08' => $this->DataMaster_model->get_element_cost_code_jenis($lokasi, "ZN08", $data["lokasi"]["kebun"]),
						'ZN09' => $this->DataMaster_model->get_element_cost_code_jenis($lokasi, "ZN09", $data["lokasi"]["kebun"]),
						'ZN10' => $this->DataMaster_model->get_element_cost_code_jenis($lokasi, "ZN10", $data["lokasi"]["kebun"]),
						'ZN11' => $this->DataMaster_model->get_element_cost_code_jenis($lokasi, "ZN11", $data["lokasi"]["kebun"]),
						'ZN12' => $this->DataMaster_model->get_element_cost_code_jenis($lokasi, "ZN12", $data["lokasi"]["kebun"]),
						'ZN13' => $this->DataMaster_model->get_element_cost_code_jenis($lokasi, "ZN13", $data["lokasi"]["kebun"]),
						'ZN14' => $this->DataMaster_model->get_element_cost_code_jenis($lokasi, "ZN14", $data["lokasi"]["kebun"]),
						'ZN15' => $this->DataMaster_model->get_element_cost_code_jenis($lokasi, "ZN15", $data["lokasi"]["kebun"])
					);
					$data['total_real'] = 0;
					for ($i=4; $i <= 14 ; $i++) {
						if($i < 10){
							$data['total_real'] += ($data["element_cost_real"]['ZN0'.$i]['total']);
						}
						else{
							$data['total_real'] += ($data["element_cost_real"]['ZN'.$i]['total']);
						}
					}
					if(date('Y', strtotime($data["tgl_panen"])) == date('Y', strtotime($data['YEAR_BASE']['nilai']))){
						$data['cek_panen'] = 1;
						$data['element_cost_f'] = array(
							'ZN01' => $this->Forecast_model->get_element_cost_code_jenis($lokasi, "ZN01", ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
							'ZN02' => $this->Forecast_model->get_element_cost_code_jenis($lokasi, "ZN02", ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
							'ZN03' => $this->Forecast_model->get_element_cost_code_jenis($lokasi, "ZN03", ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
							'ZN04' => $this->Forecast_model->get_element_cost_code_jenis($lokasi, "ZN04", ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
							'ZN05' => $this->Forecast_model->get_element_cost_code_jenis($lokasi, "ZN05", ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
							'ZN06' => $this->Forecast_model->get_element_cost_code_jenis($lokasi, "ZN06", ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
							'ZN07' => $this->Forecast_model->get_element_cost_code_jenis($lokasi, "ZN07", ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
							'ZN081' => $this->Forecast_model->get_element_cost_code_jenis($lokasi, "ZN08", 1),
							'ZN082' => $this->Forecast_model->get_element_cost_code_jenis($lokasi, "ZN08", 2),
							'ZN083' => $this->Forecast_model->get_element_cost_code_jenis($lokasi, "ZN08", 3),
							'ZN09' => $this->Forecast_model->get_element_cost_code_jenis($lokasi, "ZN09", ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
							'ZN10' => $this->Forecast_model->get_element_cost_code_jenis($lokasi, "ZN10", ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
							'ZN11' => $this->Forecast_model->get_element_cost_code_jenis($lokasi, "ZN11", ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
							'ZN12' => $this->Forecast_model->get_element_cost_code_jenis($lokasi, "ZN12", ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
							'ZN13' => $this->Forecast_model->get_element_cost_code_jenis($lokasi, "ZN13", ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
							'ZN14' => $this->Forecast_model->get_element_cost_code_jenis($lokasi, "ZN14", ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
							'ZN15' => $this->Forecast_model->get_element_cost_code_jenis($lokasi, "ZN15", ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333))
						);
					}
					else{
						$data['cek_panen'] = 2;
						$data['element_cost_f'] = array(
							'ZN01' => $this->Forecast_model->get_element_cost_code_jenis_t1($lokasi, "ZN01", ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
							'ZN02' => $this->Forecast_model->get_element_cost_code_jenis_t1($lokasi, "ZN02", ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
							'ZN03' => $this->Forecast_model->get_element_cost_code_jenis_t1($lokasi, "ZN03", ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
							'ZN04' => $this->Forecast_model->get_element_cost_code_jenis_t1($lokasi, "ZN04", ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
							'ZN05' => $this->Forecast_model->get_element_cost_code_jenis_t1($lokasi, "ZN05", ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
							'ZN06' => $this->Forecast_model->get_element_cost_code_jenis_t1($lokasi, "ZN06", ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
							'ZN07' => $this->Forecast_model->get_element_cost_code_jenis_t1($lokasi, "ZN07", ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
							'ZN081' => $this->Forecast_model->get_element_cost_code_jenis_t1($lokasi, "ZN08", 1),
							'ZN082' => $this->Forecast_model->get_element_cost_code_jenis_t1($lokasi, "ZN08", 2),
							'ZN083' => $this->Forecast_model->get_element_cost_code_jenis_t1($lokasi, "ZN08", 3),
							'ZN09' => $this->Forecast_model->get_element_cost_code_jenis_t1($lokasi, "ZN09", ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
							'ZN10' => $this->Forecast_model->get_element_cost_code_jenis_t1($lokasi, "ZN10", ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
							'ZN11' => $this->Forecast_model->get_element_cost_code_jenis_t1($lokasi, "ZN11", ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
							'ZN12' => $this->Forecast_model->get_element_cost_code_jenis_t1($lokasi, "ZN12", ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
							'ZN13' => $this->Forecast_model->get_element_cost_code_jenis_t1($lokasi, "ZN13", ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
							'ZN14' => $this->Forecast_model->get_element_cost_code_jenis_t1($lokasi, "ZN14", ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
							'ZN15' => $this->Forecast_model->get_element_cost_code_jenis_t1($lokasi, "ZN15", ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333))
						);
					}

					$data["element_cost_all"] = $this->ElementCost_model->get_element_cost_pm();
					$data["forecast_overhead"] = array(
						'ZN04' => $this->ForecastOverhead_model->get_forecast_overhead_code("ZN04", substr($data["lokasi"]["status"], 0, 4), date('n', strtotime($data["tgl_panen"]))),
						'ZN05' => $this->ForecastOverhead_model->get_forecast_overhead_code("ZN05", substr($data["lokasi"]["status"], 0, 4), date('n', strtotime($data["tgl_panen"]))),
						'ZN06' => $this->ForecastOverhead_model->get_forecast_overhead_code("ZN06", substr($data["lokasi"]["status"], 0, 4), date('n', strtotime($data["tgl_panen"]))),
						'ZN10' => $this->ForecastOverhead_model->get_forecast_overhead_code("ZN10", substr($data["lokasi"]["status"], 0, 4), date('n', strtotime($data["tgl_panen"]))),
						'ZN13' => $this->ForecastOverhead_model->get_forecast_overhead_code("ZN13", substr($data["lokasi"]["status"], 0, 4), date('n', strtotime($data["tgl_panen"])))
					);
					$data['koreksi'] = $this->Koreksi_model->get_koreksi_code($lokasi);
					$data['tgl_irrigation'] = array(
						'start' => $this->Konstanta_model->get_konstanta_code('TGL_IRRIGATION_START'),
						'finish' => $this->Konstanta_model->get_konstanta_code('TGL_IRRIGATION_FINISH')
					);
					$data['tgl_irrigation_t1'] = array(
						'start' => $this->Konstanta_model->get_konstanta_code('TGL_IRRIGATION_START_T1'),
						'finish' => $this->Konstanta_model->get_konstanta_code('TGL_IRRIGATION_FINISH_T1')
					);
					$data['std_interval_siram'] = $this->Irrigation_model->get_interval_siram($data['pg_wil']['pg']);
					$data["tonase_panen"] = array(
						'alami' => $this->TonasePanen_model->get_tonase_panen_code($lokasi, "Alami", $data["lokasi"]["kebun"]),
						'manual' => $this->TonasePanen_model->get_tonase_panen_code($lokasi, "Manual", $data["lokasi"]["kebun"]),
						'reguler' => $this->TonasePanen_model->get_tonase_panen_code($lokasi, "Reguler", $data["lokasi"]["kebun"])
					);

					//Group Cost
					if($data['group_cost'] == NULL){
						$data['group_cost'] = "Total";
					}

			    $date1 = round(strtotime($data['konstanta']['nilai']) / 86400);
			    $date2 = round(strtotime($data['lokasi']['tgl_mulai_rawat']) / 86400);

			    $umur = ceil(($date1-$date2) / 30.4583333333333);

					$data['group_cost_total'] = $this->GroupCost_model->get_group_cost_umur_total($data['lokasi']['lokasi'], $data['lokasi']['kebun']);
					$data['group_cost_std_total'] = $this->StdBiayaUmur_model->get_sbt_group_cost_real_total(substr(date('Y', strtotime($tgl_panen)), 0, 4), $umur, $kelas);

					$data['group_cost_biaya'] = $this->GroupCost_model->get_group_cost_umur($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $data['lokasi']['tgl_mulai_rawat'], $data['group_cost']);

					$a = 1;
					while ($a <= 21) {
						$budget = $this->StdBiayaUmur_model->get_sbt_group_cost_real(date('Y', strtotime($tgl_panen)), $a, $kelas, $data['group_cost']);
						$data["group_cost_std"][$a] = $budget['biaya_realisasi'];
						$a++;
					}
					// echo "<pre>";
					// var_dump($data["group_cost_std"]);
					// echo "</pre>";
					// die();
					$data['std_interval_siram'] = $this->Irrigation_model->get_interval_siram($data['pg_wil']['pg']);

					if(substr($data['lokasi']['status'], 0, 4) == 'NSFC'){
						$data["SBTCostTotal"] = $this->SBT_model->get_sbt_real_cost(date('Y', strtotime($tgl_panen)), $kelas, '25');
						$data["SBTCost"] = $this->SBT_model->get_sbt_real_cost(date('Y', strtotime($tgl_panen)), $kelas, ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333));
					}
					else{
						$data["SBTCostTotal"] = $this->SBT_model->get_sbt_real_cost(date('Y', strtotime($tgl_panen)), 'NSSC', '25');
						$data["SBTCost"] = $this->SBT_model->get_sbt_real_cost(date('Y', strtotime($tgl_panen)), $kelas, ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333));
					}

					$this->load->view('WIP_PM/lokasi', $data);
				break;
				//Gallery Lokasi
				case 'GALO':
					$data['gallery'] = array(
						'land_prep' => $this->GalleryLokasi_model->get_gallery_lokasi_code($lokasi, 'Land Preparation'),
						'planting' => $this->GalleryLokasi_model->get_gallery_lokasi_code($lokasi, 'Planting'),
						'pre_f' => $this->GalleryLokasi_model->get_gallery_lokasi_code($lokasi, 'PM Pre Forcing'),
						'post_f' => $this->GalleryLokasi_model->get_gallery_lokasi_code($lokasi, 'PM Post Forcing'),
						'harvest' => $this->GalleryLokasi_model->get_gallery_lokasi_code($lokasi, 'Harvesting'),
						'note' => $this->Noted_model->get_note_gallery($lokasi),
						'gis' => $this->GalleryLokasi_model->get_foto_gis($lokasi)
					);
					$data["note_lokasi"] = $this->Noted_model->get_detil_lokasi_note_code($lokasi);
					$data["note_pic"] = $this->Noted_model->get_pic_code($data["note_lokasi"]['pg'], $data["note_lokasi"]['wilayah'], $_SESSION['index']);

					$this->load->view('WIP_PM/lokasi_GALO', $data);
				break;
				//Detail SPK
				case 'DSPK':
					$data['detail_spk'] = $this->Lokasi_model->get_detil_spk_sbt($data['lokasi']['lokasi'], $data['lokasi']['kebun']);

					$this->load->view('WIP_PM/lokasi_DSPK', $data);
				break;
				//Detail SPK
				case 'RSBT':
					$data['ElementCost'] = $this->input->get('element_cost');
					$data['Activity'] = $this->input->get('activity');
					if($data['ElementCost'] == NULL){
						$data['ElementCost'] = 'Total';
					}
					if($data['Activity'] == NULL){
						$data['Activity'] = 'Total';
					}
					$date1 = round(strtotime($data['konstanta']['nilai']) / 86400);
					$date2 = round(strtotime($data['lokasi']['tgl_mulai_rawat']) / 86400);

					$umur = ceil(($date1-$date2) / 30.4583333333333);
					$data['RealActivity'] = $this->PerlocationPM3_model->get_real_activity($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $data['ElementCost'], $data['Activity']);

					foreach ($data['RealActivity'] as $RA){
						$BudgetActivity = $this->PerlocationPM3_model->get_budget_activity(date('Y', strtotime($tgl_panen)), $kelas, $umur, $RA->CodeAct);
						$ActBdt = $RA->CodeAct;
						if($RA->CodGrp == 'ZN03'){
							$data['BudgetActivity'][$ActBdt]['Material'] = 0;
							$data['BudgetActivity'][$ActBdt]['Seed'] = $BudgetActivity['Material'];
						}
						else{
							$data['BudgetActivity'][$ActBdt]['Material'] = $BudgetActivity['Material'];
							$data['BudgetActivity'][$ActBdt]['Seed'] = 0;
						}
						$data['BudgetActivity'][$ActBdt]['Labour'] = $BudgetActivity['Labour'];
						$data['BudgetActivity'][$ActBdt]['Charge'] = $BudgetActivity['Charge'];
						$data['BudgetActivity'][$ActBdt]['Total'] = $BudgetActivity['Total'];
					}

					$data["ElementCostList"] = $this->PerlocationPM3_model->get_element_cost_list($data['lokasi']['lokasi'], $data['lokasi']['kebun']);
					$data["ActivityList"] = $this->PerlocationPM3_model->get_activity_list($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $data['ElementCost']);

					// echo "<pre>";
					// var_dump($data["ActivityList"]);
					// echo "</pre>";
					// die();

					$this->load->view('WIP_PM/lokasi_RSBT', $data);
				break;
				//BK - ST
				case 'BKST':
					$data['STD_Populasi_Tanam'] = $this->Konstanta_model->get_std_populasi_tanam();
					$data["Pengamatan_Populasi"] = $this->PerlocationPM3_model->get_pengamatan_tanam($lokasi, $data["lokasi"]["tgl_mulai_rawat"]);
					$data["Kualitas_Bibit"] = $this->PerlocationPM3_model->get_pengamatan_bibit($lokasi, $data["lokasi"]["tgl_mulai_rawat"]);

					$data['Pengamatan'] = array(
						'Bajak' => $this->PerlocationPM3_model->get_pengamatan_bajak($lokasi, $data["lokasi"]["tgl_mulai_rawat"]),
						'Chopper' => $this->PerlocationPM3_model->get_pengamatan_chopper($lokasi, $data["lokasi"]["tgl_mulai_rawat"]),
						'FinishingHarrow' => $this->PerlocationPM3_model->get_pengamatan_finishing_harrow($lokasi, $data["lokasi"]["tgl_mulai_rawat"]),
						'JalanSaluran' => $this->PerlocationPM3_model->get_pengamatan_jalan_saluran($lokasi, $data["lokasi"]["tgl_mulai_rawat"]),
						'Ridger' => $this->PerlocationPM3_model->get_pengamatan_ridger($lokasi, $data["lokasi"]["tgl_mulai_rawat"])
					);

					// echo "<pre>";
					// var_dump($data["Pengamatan"]);
					// echo "</pre>";
					// die();
					$data["histori_lokasi_sebelumnya"] = $this->HistoriLokasi_model->get_histori_lokasi_code_before_panen($lokasi, $data['produksi']['real_dan_sisa_rencana_tgl_selesai_panen']);
					$data["drainase"] = $this->Drainase_model->get_drainase_code($lokasi);

					$data["biaya_tanam"] = array(
						'bibit' => $this->DataMaster_model->get_biaya_tanam_code_jenis($lokasi, "Bibit", $data["lokasi"]["kebun"]),
						'sulam' => $this->DataMaster_model->get_biaya_tanam_code_jenis($lokasi, "Sulam", $data["lokasi"]["kebun"]),
						'tanam' => $this->DataMaster_model->get_biaya_tanam_code_jenis($lokasi, "Tanam", $data["lokasi"]["kebun"]),
						'ecer' => $this->DataMaster_model->get_biaya_tanam_code_jenis($lokasi, "Ecer", $data["lokasi"]["kebun"]),
						'transport' => $this->DataMaster_model->get_biaya_tanam_code_jenis($lokasi, "Transport", $data["lokasi"]["kebun"]),
						'others' => $this->DataMaster_model->get_biaya_tanam_code_jenis($lokasi, "Others", $data["lokasi"]["kebun"]),
						'jumlah_sulam' => $this->DataMaster_model->get_jumlah_sulam_code($lokasi, $data["lokasi"]["kebun"]),
						'index_tk' => $this->DataMaster_model->get_index_tk_code($lokasi, $data["lokasi"]["kebun"])
					);

					$data["pengamatan_tanah"] = $this->PengamatanTanah_model->get_pengamatan_tanah_code_desc($lokasi);
					$data["jalan_saluran"] = $this->DataMaster_model->get_jalan_saluran_code($lokasi, $data["lokasi"]["kebun"]);
					$data["timeline_landprep"] = $this->PerlocationPM3_model->get_timeline_landprep_code($lokasi, $data["lokasi"]["kebun"]);

					$data["total_charge"] = array(
						'charge' => $this->PerlocationPM3_model->get_total_charge_code($lokasi, 'Charge', $data["lokasi"]["kebun"]),
						'material' => $this->PerlocationPM3_model->get_total_charge_code($lokasi, 'Material', $data["lokasi"]["kebun"]),
						'labour' => $this->PerlocationPM3_model->get_total_charge_code($lokasi, 'Labour', $data["lokasi"]["kebun"]),
						'others' => $this->PerlocationPM3_model->get_total_charge_code($lokasi, 'Others', $data["lokasi"]["kebun"])
					);

					$data["histori_lokasi_bk"] = $this->HistoriLokasi_model->get_histori_lokasi_code_bk($lokasi);
					$data["histori_lokasi_st"] = $this->HistoriLokasi_model->get_histori_lokasi_code_st($lokasi);

					if(date('Y', strtotime($data["tgl_panen"])) == date('Y', strtotime($data["YEAR_BASE"]['nilai']))){
						$cek_produksi = 'produksi';
					}
					else{
						$cek_produksi = 'produksi_t1';
					}
					$ZN01_real = $this->DataMaster_model->get_real_actual_code_zn01_zn04($lokasi, substr($data['lokasi']['status'], 0, 4), 'ZN01', $cek_produksi);
					$ZN03_real = $this->DataMaster_model->get_real_actual_code_zn01_zn04($lokasi, substr($data['lokasi']['status'], 0, 4), 'ZN03', $cek_produksi);
					if($ZN01_real['total'] == NULL || $ZN01_real['total'] == 0){
						$ZN01_real = $this->DataMaster_model->get_element_cost_code_jenis($lokasi, "ZN01", $data["lokasi"]["kebun"]);
					}
					if($ZN03_real['total'] == NULL || $ZN03_real['total'] == 0){
						$ZN03_real = $this->DataMaster_model->get_element_cost_code_jenis($lokasi, "ZN03", $data["lokasi"]["kebun"]);
						if(substr($data['lokasi']['status'], 0, 4) == 'NSFC'){
							if($data['lokasi']['tgl_mulai_rawat'] >= "2019-05-01"){
								$ZN03_real['total'] = $ZN03_real['total'] + (1000000 * $data['lokasi']['luas']);
							}
							else{
								$ZN03_real['total'] = $ZN03_real['total'] + (3676535.88918288 * $data['lokasi']['luas']);
							}
						}
					}
					$data["element_cost_real"] = array(
						'ZN01' => $ZN01_real,
						'ZN03' => $ZN03_real
					);

					$this->load->view('WIP_PM/lokasi_BKST', $data);
				break;
				//Fertilizer Summary
				case 'CTF1':
					$date1 = round(strtotime($data['konstanta']['nilai']) / 86400);
					$date2 = round(strtotime($data['lokasi']['tgl_mulai_rawat']) / 86400);
					$umur = ceil(($date1-$date2) / 30.4583333333333);
					$data['fertilizer'] = $this->input->get('fertilizer');
					$data['type'] = $this->input->get('type');
					$data['fertilizer_2'] = $this->input->get('fertilizer_2');
					$data['compare'] = $this->input->get('compare');
					$data['content'] = $this->input->get('content');
					$data['scheme'] = $this->input->get('scheme');
					$data['std_material'] = $this->StdUnsurUmur_model->get_std_metarial($kelas, ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333));
					$data['real_material'] = $this->Fertilization_model->get_unsur_fertilization($lokasi, $data['lokasi']['kebun']);
					$data['std_material_quota'] = $this->StdUnsurUmur_model->get_std_metarial_quota($kelas, ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333));
					$data["pengamatan_daun"] = $this->PengamatanDaun_model->get_pengamatan_daun_code_asc($lokasi);
					$data['K2SO4_KCL'] = $this->Fertilization_model->get_unsur_K2SO4_KCL($lokasi, $data['lokasi']['kebun'], $data['lokasi']['tgl_mulai_rawat'], $tgl_forcing);
					$data['master_material'] = $this->Material_model->get_master_material_category('Fertilizer');
					$data['cost_impact'] = $this->Material_model->get_material_cost_impact($lokasi, $data['lokasi']['kebun'], 'Fertilizer');
					$data['std_cost_impact'] = $this->Material_model->get_std_material_cost_impact($kelas, $umur, 'Fertilizer');

					// Iklim
					$iklim_real = $this->Iklim_model->get_iklim_code($data["wilayah"]['plantation_group'], $data['lokasi']['tgl_mulai_rawat']);
					$umur_iklim = 1;
					$iklim = array();
					foreach ($iklim_real as $ik) {
						$iklim[$umur_iklim] = $ik->iklim;
						$umur_iklim++;
					}

					$umur_iklim = 1;
					$umur_real = sizeof($iklim);
					$bulan_iklim = date('n', strtotime($data['konstanta']['nilai']));
					while ($umur_iklim <= 24) {
						if($umur_iklim <= $umur_real){
							$data['iklim'][$umur_iklim] = $iklim[$umur_iklim];
						}
						else{
							if($bulan_iklim > 12){
								$bulan_iklim = 1;
								$std_iklim = $this->Iklim_model->get_std_iklim($bulan_iklim);
								$data['iklim'][$umur_iklim] = $std_iklim['iklim'];
							}
							else{
								$std_iklim = $this->Iklim_model->get_std_iklim($bulan_iklim);
								$data['iklim'][$umur_iklim] = $std_iklim['iklim'];
							}
							$bulan_iklim++;
						}
						$umur_iklim++;
					}

					//Fertilizer
					if($data['fertilizer'] == NULL || $data['type'] == NULL){
						$data['fertilizer'] = "SNIT0000001";
						$data['type'] = '2';
					}
					if($data['fertilizer_2'] == NULL || $data['compare'] == NULL){
						$data['fertilizer_2'] = "SNIT0000001";
						$data['compare'] = '1';
					}

					$fertilizer = $this->Material_model->get_master_material_code($data['fertilizer']);
					if($fertilizer == NULL){
						$fertilizer['material'] = "Fertilizer";
						$data['head_all'] = 1;
						$data['compare'] = '1';
						$data['disabled_type_compare'] = 1;
					}
					$data['nama_1'] = $fertilizer['material'];
					$data['unsur'] = $this->Material_model->get_material_unsur($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $data['lokasi']['tgl_mulai_rawat'], $data['fertilizer']);

					$fertilizer_2 = $this->Material_model->get_master_material_code($data['fertilizer_2']);
					$data['nama_2'] = $fertilizer_2['material'];
					$data['unsur_2'] = $this->Material_model->get_material_unsur($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $data['lokasi']['tgl_mulai_rawat'], $data['fertilizer_2']);

					$a = 1;
					$data['dry'] = array('total' => 0);
					$data['wet'] = array('total' => 0);
					$data['unsur_std']= array();
					while ($a <= 21) {
						$budget = $this->StdUnsurUmur_model->get_std_metarial_budget($kelas, $a, $fertilizer['material']);
						$data["unsur_budget"][$a] = $budget['material'] * $data['lokasi']['luas'];
						if($a > $umur){
							$data['unsur']['B'.$a] = $budget['material'] * $data['lokasi']['luas'];
							$data['unsur_realisasi'][$a] = 0;
						}
						else{
							$data['unsur_realisasi'][$a] = $data['unsur']['B'.$a];
						}
						if($data['iklim'][$a] == 2){
							$data['dry']['total'] += $data['unsur']['B'.$a];
							$data['dry'][$a] = $data['unsur']['B'.$a];
						}
						else{
							$data['wet']['total'] += $data['unsur']['B'.$a];
							$data['wet'][$a] = $data['unsur']['B'.$a];
						}
						$a++;
					}

					$a = 1;
					$data['unsur_std']= array();
					while ($a <= 21) {
						$budget_2 = $this->StdUnsurUmur_model->get_std_metarial_budget($kelas, $a, $fertilizer_2['material']);
						$data["unsur_budget_2"][$a] = $budget_2['material'] * $data['lokasi']['luas'];
						if($a > $umur){
							$data['unsur_2']['B'.$a] = $budget_2['material'] * $data['lokasi']['luas'];
							$data['unsur_realisasi_2'][$a] = 0;
						}
						else{
							$data['unsur_realisasi_2'][$a] = $data['unsur_2']['B'.$a];
						}
						$a++;
					}

					//Content
					if($data['content'] == NULL){
						$data['content'] = "NPKMg";
					}

					switch ($data['content']) {
						case 'Nitrogen':
							$data['unsur_content']['Urea'] = $this->Material_model->get_material_unsur($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $data['lokasi']['tgl_mulai_rawat'], 'SNIT0000001');
							$data['unsur_content']['Za'] = $this->Material_model->get_material_unsur($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $data['lokasi']['tgl_mulai_rawat'], 'SNIT0000002');
							$data['unsur_content']['DAP'] = $this->Material_model->get_material_unsur($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $data['lokasi']['tgl_mulai_rawat'], 'SPHO0000002');
						break;
						case 'P2O5':
							$data['unsur_content']['TSP'] = $this->Material_model->get_material_unsur($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $data['lokasi']['tgl_mulai_rawat'], 'SPHO0000001');
							$data['unsur_content']['DAP'] = $this->Material_model->get_material_unsur($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $data['lokasi']['tgl_mulai_rawat'], 'SPHO0000002');
						break;
						case 'K2O':
							$data['unsur_content']['K2SO4'] = $this->Material_model->get_material_unsur($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $data['lokasi']['tgl_mulai_rawat'], 'SKAL0000001');
							$data['unsur_content']['KCL'] = $this->Material_model->get_material_unsur($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $data['lokasi']['tgl_mulai_rawat'], 'SKAL0000002');
						break;
						case 'MgO':
							$data['unsur_content']['Kieserite'] = $this->Material_model->get_material_unsur($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $data['lokasi']['tgl_mulai_rawat'], 'SMAG0000001');
							$data['unsur_content']['MgSO4'] = $this->Material_model->get_material_unsur($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $data['lokasi']['tgl_mulai_rawat'], 'SMAG0000002');
							$data['unsur_content']['Dolomid'] = $this->Material_model->get_material_unsur($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $data['lokasi']['tgl_mulai_rawat'], 'SCAL0000001');
						break;

						default :
							$data['unsur_content']['Urea'] = $this->Material_model->get_material_unsur($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $data['lokasi']['tgl_mulai_rawat'], 'SNIT0000001');
							$data['unsur_content']['Za'] = $this->Material_model->get_material_unsur($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $data['lokasi']['tgl_mulai_rawat'], 'SNIT0000002');
							$data['unsur_content']['DAP'] = $this->Material_model->get_material_unsur($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $data['lokasi']['tgl_mulai_rawat'], 'SPHO0000002');

							$data['unsur_content']['TSP'] = $this->Material_model->get_material_unsur($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $data['lokasi']['tgl_mulai_rawat'], 'SPHO0000001');
							$data['unsur_content']['DAP'] = $this->Material_model->get_material_unsur($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $data['lokasi']['tgl_mulai_rawat'], 'SPHO0000002');

							$data['unsur_content']['K2SO4'] = $this->Material_model->get_material_unsur($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $data['lokasi']['tgl_mulai_rawat'], 'SKAL0000001');
							$data['unsur_content']['KCL'] = $this->Material_model->get_material_unsur($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $data['lokasi']['tgl_mulai_rawat'], 'SKAL0000002');

							$data['unsur_content']['Kieserite'] = $this->Material_model->get_material_unsur($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $data['lokasi']['tgl_mulai_rawat'], 'SMAG0000001');
							$data['unsur_content']['MgSO4'] = $this->Material_model->get_material_unsur($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $data['lokasi']['tgl_mulai_rawat'], 'SMAG0000002');
							$data['unsur_content']['Dolomid'] = $this->Material_model->get_material_unsur($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $data['lokasi']['tgl_mulai_rawat'], 'SCAL0000001');
						break;
					}

					$a = 1;
					$data['unsur_std']= array();
					while ($a <= 21) {
						$budget = $this->StdUnsurUmur_model->get_std_metarial_budget($kelas, $a, $data['content']);
						$data["unsur_budget_content"][$a] = $budget['material'] * $data['lokasi']['luas'];
						$a++;
					}

					//K2SO4 dan KCL
					if($data['scheme'] == NULL){
						$data['scheme'] = "SKAL0000001";
					}

					$scheme = $this->Material_model->get_master_material_code($data['scheme']);
					$data['unsur_scheme'] = $this->Material_model->get_material_unsur($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $data['lokasi']['tgl_mulai_rawat'], $data['scheme']);
					$data['unsur_budget_scheme'] = $this->Material_model->get_material_unsur($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $data['lokasi']['tgl_mulai_rawat'], "K2SO4-KCL");

					$this->load->view('WIP_PM/lokasi_CTF1', $data);
				break;
				//Fertilizer Activity
				case 'CTF2':
					$data["spray_mekanis"] = $this->Fertilization_model->get_fertilization_spray($lokasi, $data["lokasi"]["kebun"]);
					$data["manual"] = $this->Fertilization_model->get_fertilization_manual($lokasi, $data["lokasi"]["kebun"]);

					$data["frekuensi_spray"] = $this->Fertilization_model->get_frekuensi_fertilizer($lokasi, $data["lokasi"]["kebun"], $data['lokasi']['tgl_mulai_rawat'], '1311131711');
					$data["frekuensi_manual"] = $this->Fertilization_model->get_frekuensi_fertilizer($lokasi, $data["lokasi"]["kebun"], $data['lokasi']['tgl_mulai_rawat'], '1311131115');


					$data["range_spray"] = array(
						'1' => $this->Fertilization_model->get_range_fertilizer($lokasi, $data["lokasi"]["kebun"], $data['lokasi']['tgl_mulai_rawat'], '1311131711', '0', '3'),
						'2' => $this->Fertilization_model->get_range_fertilizer($lokasi, $data["lokasi"]["kebun"], $data['lokasi']['tgl_mulai_rawat'], '1311131711', '3', '8'),
						'3' => $this->Fertilization_model->get_range_fertilizer($lokasi, $data["lokasi"]["kebun"], $data['lokasi']['tgl_mulai_rawat'], '1311131711', '8', '16'),
						'4' => $this->Fertilization_model->get_range_fertilizer($lokasi, $data["lokasi"]["kebun"], $data['lokasi']['tgl_mulai_rawat'], '1311131711', '16', '24')
					);

					$this->load->view('WIP_PM/lokasi_CTF2', $data);
				break;
				//Fertilizer Growth
				case 'CTF3':
					$data['content'] = $this->input->get("content");
					$data['volume_air'] = $this->input->get("volume_air");
					$data["pengamatan_daun"] = $this->PengamatanDaun_model->get_pengamatan_daun_code_asc($lokasi);
					$data["berat_tanaman"] = $this->BeratTanaman_model->get_berat_tanaman_forcing($lokasi, $tgl_forcing);
					$data["golden_time_frocing"] = $this->VolumeAir_model->get_volume_air_forcing($lokasi, $tgl_forcing);

					if(substr($data['lokasi']['status'], 0, 4) != 'NSSC'){
						$std_berat_tanaman = $this->BeratTanaman_model->get_std_berat_tanaman(substr($data['lokasi']['bibit'], 2, 3), substr($data['lokasi']['bibit'], 5, 1), substr($data['lokasi']['bibit'], 6, 1));
						if($std_berat_tanaman == NULL){
							$std_berat_tanaman = $this->BeratTanaman_model->get_std_berat_tanaman('GP3', 'S', 'S');
						}
						$jarak_forcing = (floor(((strtotime($data['std_forcing_panen']['tgl_forcing']) - strtotime($tgl_forcing)) / 86400) / 30.4583333333333));
						$a = 1;
						foreach ($std_berat_tanaman as $sbt) {
							if((($sbt->umur + $jarak_forcing) >= -7) && (($sbt->umur + $jarak_forcing) <= 1)){
								$data["std_berat_tanaman"][$a] = $sbt->berat_tanaman;
								$a++;
							}
						}
					}
					else{
						$data["std_berat_tanaman"] = NULL;
					}

					//Content
					if($data['content'] == NULL){
						$data['content'] = "NPKMg";
					}

					switch ($data['content']) {
						case 'Nitrogen':
							$data['unsur_forcing']['Urea'] = $this->Material_model->get_material_unsur_forcing($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $tgl_forcing, 'SNIT0000001');
							$data['unsur_forcing']['Za'] = $this->Material_model->get_material_unsur_forcing($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $tgl_forcing, 'SNIT0000002');
							$data['unsur_forcing']['DAP'] = $this->Material_model->get_material_unsur_forcing($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $tgl_forcing, 'SPHO0000002');
						break;
						case 'P2O5':
							$data['unsur_forcing']['TSP'] = $this->Material_model->get_material_unsur_forcing($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $tgl_forcing, 'SPHO0000001');
							$data['unsur_forcing']['DAP'] = $this->Material_model->get_material_unsur_forcing($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $tgl_forcing, 'SPHO0000002');
						break;
						case 'K2O':
							$data['unsur_forcing']['K2SO4'] = $this->Material_model->get_material_unsur_forcing($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $tgl_forcing, 'SKAL0000001');
							$data['unsur_forcing']['KCL'] = $this->Material_model->get_material_unsur_forcing($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $tgl_forcing, 'SKAL0000002');
						break;
						case 'MgO':
							$data['unsur_forcing']['Kieserite'] = $this->Material_model->get_material_unsur_forcing($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $tgl_forcing, 'SMAG0000001');
							$data['unsur_forcing']['MgSO4'] = $this->Material_model->get_material_unsur_forcing($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $tgl_forcing, 'SMAG0000002');
							$data['unsur_forcing']['Dolomid'] = $this->Material_model->get_material_unsur_forcing($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $tgl_forcing, 'SCAL0000001');
						break;

						default :
							$data['unsur_forcing']['Urea'] = $this->Material_model->get_material_unsur_forcing($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $tgl_forcing, 'SNIT0000001');
							$data['unsur_forcing']['Za'] = $this->Material_model->get_material_unsur_forcing($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $tgl_forcing, 'SNIT0000002');
							$data['unsur_forcing']['DAP'] = $this->Material_model->get_material_unsur_forcing($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $tgl_forcing, 'SPHO0000002');

							$data['unsur_forcing']['TSP'] = $this->Material_model->get_material_unsur_forcing($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $tgl_forcing, 'SPHO0000001');
							$data['unsur_forcing']['DAP'] = $this->Material_model->get_material_unsur_forcing($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $tgl_forcing, 'SPHO0000002');

							$data['unsur_forcing']['K2SO4'] = $this->Material_model->get_material_unsur_forcing($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $tgl_forcing, 'SKAL0000001');
							$data['unsur_forcing']['KCL'] = $this->Material_model->get_material_unsur_forcing($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $tgl_forcing, 'SKAL0000002');

							$data['unsur_forcing']['Kieserite'] = $this->Material_model->get_material_unsur_forcing($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $tgl_forcing, 'SMAG0000001');
							$data['unsur_forcing']['MgSO4'] = $this->Material_model->get_material_unsur_forcing($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $tgl_forcing, 'SMAG0000002');
							$data['unsur_forcing']['Dolomid'] = $this->Material_model->get_material_unsur_forcing($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $tgl_forcing, 'SCAL0000001');
						break;
					}

					$a = 1;
					$b = ceil((strtotime($tgl_forcing) - strtotime($data['lokasi']['tgl_mulai_rawat'])) / 86400 / 30.4583333333333) - 7;
					$c = ceil((strtotime($tgl_forcing) - strtotime($data['lokasi']['tgl_mulai_rawat'])) / 86400 / 30.4583333333333) + 1;
					while ($b <= $c) {
						$budget = $this->StdUnsurUmur_model->get_std_metarial_budget($kelas, $b, $data['content']);
						$data['unsur_std_forcing'][$a] = $budget['material'];
						$a++;
						$b++;
					}

					$golden_time_data = $this->VolumeAir_model->get_golden_time_data($lokasi);
					$total_data = $this->VolumeAir_model->get_forcing_data($lokasi, $data['lokasi']['kebun']);
					if($data['volume_air'] == NULL){
						$data['volume_air'] = 'GT';
					}
					$frekuensi_volume_air = $this->VolumeAir_model->get_frekuensi_volume_air($lokasi, $data['volume_air']);

					$gtt = 0;
					$ott = 0;
					foreach ($golden_time_data as $gt) {
						$gtt += $gt->GT;
						$ott += $gt->OT;
					}
					$ttt = 0;
					foreach ($total_data as $tt) {
						$ttt++;
					}
					$va1 = 0;
					$va2 = 0;
					$va3 = 0;
					$va4 = 0;
					foreach ($frekuensi_volume_air as $fva) {
						$va1 += $fva->VA1;
						$va2 += $fva->VA2;
						$va3 += $fva->VA3;
						$va4 += $fva->VA4;
					}

					$data["golden_time_data"] = array(
						'GT' => $gtt,
						'OT' => $ott,
						'Total' => $ttt
					);
					$data['frekuensi_volume_air'] = array(
						'VA1' => $va1,
						'VA2' => $va2,
						'VA3' => $va3,
						'VA4' => $va4,
						'Total' => ($va1 + $va2 + $va3 + $va4)
					);

					$this->load->view('WIP_PM/lokasi_CTF3', $data);
				break;

				//Herbicide Material
				case 'CTH1':
					$date1 = round(strtotime($data['konstanta']['nilai']) / 86400);
					$date2 = round(strtotime($data['lokasi']['tgl_mulai_rawat']) / 86400);
					$umur = ceil(($date1-$date2) / 30.4583333333333);
					$data['std_material'] = $this->StdUnsurUmur_model->get_std_metarial($kelas, ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333));
					$data['real_material'] = $this->WeedControl_model->get_unsur_weed_control($lokasi, $data['lokasi']['kebun']);
					$data['std_material_quota'] = $this->StdUnsurUmur_model->get_std_metarial_quota($kelas, ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333));

					$data['master_material'] = $this->Material_model->get_master_material_category('Herbisida');
					$data["weeding_manual"] = $this->WeedControl_model->get_weed_control_weeding_man($lokasi, $data["lokasi"]["kebun"]);
					$data["pre_planting"] = $this->WeedControl_model->get_weed_control_pre_post_planting($lokasi, $data["lokasi"]["kebun"], '1315131111');
					$data["pre_planting_tgl"] = $this->WeedControl_model->get_weed_control_pre_post_planting_tgl($lokasi, $data["lokasi"]["kebun"], '1315131111');
					$data["post_planting"] = $this->WeedControl_model->get_weed_control_pre_post_planting($lokasi, $data["lokasi"]["kebun"], '1315131113');
					$data["post_planting_tgl"] = $this->WeedControl_model->get_weed_control_pre_post_planting_tgl($lokasi, $data["lokasi"]["kebun"], '1315131113');
					$data['cost_impact'] = $this->Material_model->get_material_cost_impact($lokasi, $data['lokasi']['kebun'], 'Herbicide');
					$data['std_cost_impact'] = $this->Material_model->get_std_material_cost_impact($kelas, $umur, 'Herbicide');

					// Iklim
					$iklim_real = $this->Iklim_model->get_iklim_code($data["wilayah"]['plantation_group'], $data['lokasi']['tgl_mulai_rawat']);
					$umur_iklim = 1;
					$iklim = array();
					foreach ($iklim_real as $ik) {
						$iklim[$umur_iklim] = $ik->iklim;
						$umur_iklim++;
					}

					$umur_iklim = 1;
					$umur_real = sizeof($iklim);
					$bulan_iklim = date('n', strtotime($data['konstanta']['nilai']));
					while ($umur_iklim <= 24) {
						if($umur_iklim <= $umur_real){
							$data['iklim'][$umur_iklim] = $iklim[$umur_iklim];
						}
						else{
							if($bulan_iklim > 12){
								$bulan_iklim = 1;
								$std_iklim = $this->Iklim_model->get_std_iklim($bulan_iklim);
								$data['iklim'][$umur_iklim] = $std_iklim['iklim'];
							}
							else{
								$std_iklim = $this->Iklim_model->get_std_iklim($bulan_iklim);
								$data['iklim'][$umur_iklim] = $std_iklim['iklim'];
							}
							$bulan_iklim++;
						}
						$umur_iklim++;
					}

					//Herbicide
					$data['herbicide'] = $this->input->get('herbicide');
					$data['type'] = $this->input->get('type');
					$data['herbicide_2'] = $this->input->get('herbicide_2');
					$data['compare'] = $this->input->get('compare');
					if($data['herbicide'] == NULL || $data['type'] == NULL){
						$data['herbicide'] = "SHER0000006";
						$data['type'] = '2';
					}
					if($data['herbicide_2'] == NULL || $data['compare'] == NULL){
						$data['herbicide_2'] = "SHER0000006";
						$data['compare'] = '1';
					}

					$herbicide = $this->Material_model->get_master_material_code($data['herbicide']);
					if($herbicide == NULL){
						$herbicide['material'] = "Herbicide";
						$data['head_all'] = 1;
						$data['compare'] = '1';
						$data['disabled_type_compare'] = 1;
					}
					$data['nama_1'] = $herbicide['material'];
					$data['unsur'] = $this->Material_model->get_material_unsur($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $data['lokasi']['tgl_mulai_rawat'], $data['herbicide']);

					$herbicide_2 = $this->Material_model->get_master_material_code($data['herbicide_2']);
					$data['nama_2'] = $herbicide_2['material'];
					$data['unsur_2'] = $this->Material_model->get_material_unsur($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $data['lokasi']['tgl_mulai_rawat'], $data['herbicide_2']);

					$a = 1;
					$data['dry'] = array('total' => 0);
					$data['wet'] = array('total' => 0);
					$data['unsur_std']= array();
					while ($a <= 21) {
						$budget = $this->StdUnsurUmur_model->get_std_metarial_budget($kelas, $a, $herbicide['material']);
						$data["unsur_budget"][$a] = $budget['material'] * $data['lokasi']['luas'];
						if($a > $umur){
							$data['unsur']['B'.$a] = $budget['material'] * $data['lokasi']['luas'];
							$data['unsur_realisasi'][$a] = 0;
						}
						else{
							$data['unsur_realisasi'][$a] = $data['unsur']['B'.$a];
						}
						if($data['iklim'][$a] == 2){
							$data['dry']['total'] += $data['unsur']['B'.$a];
							$data['dry'][$a] = $data['unsur']['B'.$a];
						}
						else{
							$data['wet']['total'] += $data['unsur']['B'.$a];
							$data['wet'][$a] = $data['unsur']['B'.$a];
						}
						$a++;
					}

					$a = 1;
					$data['unsur_std']= array();
					while ($a <= 21) {
						$budget_2 = $this->StdUnsurUmur_model->get_std_metarial_budget($kelas, $a, $herbicide_2['material']);
						$data["unsur_budget_2"][$a] = $budget_2['material'] * $data['lokasi']['luas'];
						if($a > $umur){
							$data['unsur_2']['B'.$a] = $budget_2['material'] * $data['lokasi']['luas'];
							$data['unsur_realisasi_2'][$a] = 0;
						}
						else{
							$data['unsur_realisasi_2'][$a] = $data['unsur_2']['B'.$a];
						}
						$a++;
					}

					$this->load->view('WIP_PM/lokasi_CTH1', $data);
				break;
				//Herbicide Booster
				case 'CTH2':
					$data["booster"] = $this->WeedControl_model->get_weed_control_booster($lokasi, $data["lokasi"]["kebun"]);
					$data["booster_detail"] = $this->WeedControl_model->get_weed_control_booster_detail($lokasi, $data["lokasi"]["kebun"]);

					$this->load->view('WIP_PM/lokasi_CTH2', $data);
				break;

				//Insecticide
				case 'CTIN':
					$date1 = round(strtotime($data['konstanta']['nilai']) / 86400);
					$date2 = round(strtotime($data['lokasi']['tgl_mulai_rawat']) / 86400);
					$umur = ceil(($date1-$date2) / 30.4583333333333);
					$data['std_material'] = $this->StdUnsurUmur_model->get_std_metarial($kelas, ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333));
					$data['real_material'] = $this->PlantPestControl_model->get_unsur_plant_pest_control($lokasi, $data['lokasi']['kebun']);
					$data['std_material_quota'] = $this->StdUnsurUmur_model->get_std_metarial_quota($kelas, ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333));

					$data['berat_tanaman'] = $this->BeratTanaman_model->get_berat_tanaman_code_desc($lokasi);
					$data["persen_bunga"] = $this->PengamatanPersenBunga_model->get_pengamatan_persen_bunga_code($lokasi);
					$data['master_material'] = $this->Material_model->get_master_material_category('Insektisida');
					$data["insect_1"] = $this->PlantPestControl_model->get_plant_pest_control_insect($lokasi, $data["lokasi"]["kebun"], '1313111113');
					$data["insect_2"] = $this->PlantPestControl_model->get_plant_pest_control_insect($lokasi, $data["lokasi"]["kebun"], '1313111115');
					$data["insect_1_tgl"] = $this->PlantPestControl_model->get_plant_pest_control_insect_tgl($lokasi, $data["lokasi"]["kebun"], '1313111113');
					$data["insect_2_tgl"] = $this->PlantPestControl_model->get_plant_pest_control_insect_tgl($lokasi, $data["lokasi"]["kebun"], '1313111115');
					$data['cost_impact'] = $this->Material_model->get_material_cost_impact($lokasi, $data['lokasi']['kebun'], 'Insecticide');
					$data['std_cost_impact'] = $this->Material_model->get_std_material_cost_impact($kelas, $umur, 'Insecticide');

					// Iklim
					$iklim_real = $this->Iklim_model->get_iklim_code($data["wilayah"]['plantation_group'], $data['lokasi']['tgl_mulai_rawat']);
					$umur_iklim = 1;
					$iklim = array();
					foreach ($iklim_real as $ik) {
						$iklim[$umur_iklim] = $ik->iklim;
						$umur_iklim++;
					}

					$umur_iklim = 1;
					$umur_real = sizeof($iklim);
					$bulan_iklim = date('n', strtotime($data['konstanta']['nilai']));
					while ($umur_iklim <= 24) {
						if($umur_iklim <= $umur_real){
							$data['iklim'][$umur_iklim] = $iklim[$umur_iklim];
						}
						else{
							if($bulan_iklim > 12){
								$bulan_iklim = 1;
								$std_iklim = $this->Iklim_model->get_std_iklim($bulan_iklim);
								$data['iklim'][$umur_iklim] = $std_iklim['iklim'];
							}
							else{
								$std_iklim = $this->Iklim_model->get_std_iklim($bulan_iklim);
								$data['iklim'][$umur_iklim] = $std_iklim['iklim'];
							}
							$bulan_iklim++;
						}
						$umur_iklim++;
					}

					//Insecticide
					$data['insecticide'] = $this->input->get('insecticide');
					$data['type'] = $this->input->get('type');
					$data['insecticide_2'] = $this->input->get('insecticide_2');
					$data['compare'] = $this->input->get('compare');
					if($data['insecticide'] == NULL || $data['type'] == NULL){
						$data['insecticide'] = "28-TEKASI-A00";
						$data['type'] = '2';
					}
					if($data['insecticide_2'] == NULL || $data['compare'] == NULL){
						$data['insecticide_2'] = "28-TEKASI-A00";
						$data['compare'] = '1';
					}

					$insecticide = $this->Material_model->get_master_material_code($data['insecticide']);
					if($insecticide == NULL){
						$insecticide['material'] = "Insecticide";
						$data['head_all'] = 1;
						$data['compare'] = '1';
						$data['disabled_type_compare'] = 1;
					}
					$data['nama_1'] = $insecticide['material'];
					$data['unsur'] = $this->Material_model->get_material_unsur($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $data['lokasi']['tgl_mulai_rawat'], $data['insecticide']);

					$insecticide_2 = $this->Material_model->get_master_material_code($data['insecticide_2']);
					$data['nama_2'] = $insecticide_2['material'];
					$data['unsur_2'] = $this->Material_model->get_material_unsur($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $data['lokasi']['tgl_mulai_rawat'], $data['insecticide_2']);

					$a = 1;
					$data['dry'] = array('total' => 0);
					$data['wet'] = array('total' => 0);
					$data['unsur_std']= array();
					while ($a <= 21) {
						$budget = $this->StdUnsurUmur_model->get_std_metarial_budget($kelas, $a, $insecticide['material']);
						$data["unsur_budget"][$a] = $budget['material'] * $data['lokasi']['luas'];
						if($a > $umur){
							$data['unsur']['B'.$a] = $budget['material'] * $data['lokasi']['luas'];
							$data['unsur_realisasi'][$a] = 0;
						}
						else{
							$data['unsur_realisasi'][$a] = $data['unsur']['B'.$a];
						}
						if($data['iklim'][$a] == 2){
							$data['dry']['total'] += $data['unsur']['B'.$a];
							$data['dry'][$a] = $data['unsur']['B'.$a];
						}
						else{
							$data['wet']['total'] += $data['unsur']['B'.$a];
							$data['wet'][$a] = $data['unsur']['B'.$a];
						}
						$a++;
					}

					$a = 1;
					$data['unsur_std']= array();
					while ($a <= 21) {
						$budget_2 = $this->StdUnsurUmur_model->get_std_metarial_budget($kelas, $a, $insecticide_2['material']);
						$data["unsur_budget_2"][$a] = $budget_2['material'] * $data['lokasi']['luas'];
						if($a > $umur){
							$data['unsur_2']['B'.$a] = $budget_2['material'] * $data['lokasi']['luas'];
							$data['unsur_realisasi_2'][$a] = 0;
						}
						else{
							$data['unsur_realisasi_2'][$a] = $data['unsur_2']['B'.$a];
						}
						$a++;
					}

					$this->load->view('WIP_PM/lokasi_CTIN', $data);
				break;

				//Fungicide
				case 'CTFU':
					$date1 = round(strtotime($data['konstanta']['nilai']) / 86400);
					$date2 = round(strtotime($data['lokasi']['tgl_mulai_rawat']) / 86400);
					$umur = ceil(($date1-$date2) / 30.4583333333333);
					$data['std_material'] = $this->StdUnsurUmur_model->get_std_metarial($kelas, ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333));
					$data['real_material'] = $this->PlantPestControl_model->get_unsur_plant_pest_control($lokasi, $data['lokasi']['kebun']);
					$data['std_material_quota'] = $this->StdUnsurUmur_model->get_std_metarial_quota($kelas, ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333));

					$data['master_material'] = $this->Material_model->get_master_material_category('Fungisida');
					$data['berat_tanaman'] = $this->BeratTanaman_model->get_berat_tanaman_code_desc($lokasi);
					$data['cost_impact'] = $this->Material_model->get_material_cost_impact($lokasi, $data['lokasi']['kebun'], 'Fungicide');
					$data['std_cost_impact'] = $this->Material_model->get_std_material_cost_impact($kelas, $umur, 'Fungicide');

					// Iklim
					$iklim_real = $this->Iklim_model->get_iklim_code($data["wilayah"]['plantation_group'], $data['lokasi']['tgl_mulai_rawat']);
					$umur_iklim = 1;
					$iklim = array();
					foreach ($iklim_real as $ik) {
						$iklim[$umur_iklim] = $ik->iklim;
						$umur_iklim++;
					}

					$umur_iklim = 1;
					$umur_real = sizeof($iklim);
					$bulan_iklim = date('n', strtotime($data['konstanta']['nilai']));
					while ($umur_iklim <= 24) {
						if($umur_iklim <= $umur_real){
							$data['iklim'][$umur_iklim] = $iklim[$umur_iklim];
						}
						else{
							if($bulan_iklim > 12){
								$bulan_iklim = 1;
								$std_iklim = $this->Iklim_model->get_std_iklim($bulan_iklim);
								$data['iklim'][$umur_iklim] = $std_iklim['iklim'];
							}
							else{
								$std_iklim = $this->Iklim_model->get_std_iklim($bulan_iklim);
								$data['iklim'][$umur_iklim] = $std_iklim['iklim'];
							}
							$bulan_iklim++;
						}
						$umur_iklim++;
					}

					//Fungicide
					$data['fungicide'] = $this->input->get('fungicide');
					$data['type'] = $this->input->get('type');
					$data['fungicide_2'] = $this->input->get('fungicide_2');
					$data['compare'] = $this->input->get('compare');
					if($data['fungicide'] == NULL || $data['type'] == NULL){
						$data['fungicide'] = "SFUN0000010";
						$data['type'] = '2';
					}
					if($data['fungicide_2'] == NULL || $data['compare'] == NULL){
						$data['fungicide_2'] = "SFUN0000010";
						$data['compare'] = '1';
					}

					$fungicide = $this->Material_model->get_master_material_code($data['fungicide']);
					if($fungicide == NULL){
						$fungicide['material'] = "Fungicide";
						$data['head_all'] = 1;
						$data['compare'] = '1';
						$data['disabled_type_compare'] = 1;
					}
					$data['nama_1'] = $fungicide['material'];
					$data['unsur'] = $this->Material_model->get_material_unsur($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $data['lokasi']['tgl_mulai_rawat'], $data['fungicide']);

					$fungicide_2 = $this->Material_model->get_master_material_code($data['fungicide_2']);
					$data['nama_2'] = $fungicide_2['material'];
					$data['unsur_2'] = $this->Material_model->get_material_unsur($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $data['lokasi']['tgl_mulai_rawat'], $data['fungicide_2']);

					$a = 1;
					$data['dry'] = array('total' => 0);
					$data['wet'] = array('total' => 0);
					$data['unsur_std']= array();
					while ($a <= 21) {
						$budget = $this->StdUnsurUmur_model->get_std_metarial_budget($kelas, $a, $fungicide['material']);
						$data["unsur_budget"][$a] = $budget['material'] * $data['lokasi']['luas'];
						if($a > $umur){
							$data['unsur']['B'.$a] = $budget['material'] * $data['lokasi']['luas'];
							$data['unsur_realisasi'][$a] = 0;
						}
						else{
							$data['unsur_realisasi'][$a] = $data['unsur']['B'.$a];
						}
						if($data['iklim'][$a] == 2){
							$data['dry']['total'] += $data['unsur']['B'.$a];
							$data['dry'][$a] = $data['unsur']['B'.$a];
						}
						else{
							$data['wet']['total'] += $data['unsur']['B'.$a];
							$data['wet'][$a] = $data['unsur']['B'.$a];
						}
						$a++;
					}

					$a = 1;
					$data['unsur_std']= array();
					while ($a <= 21) {
						$budget_2 = $this->StdUnsurUmur_model->get_std_metarial_budget($kelas, $a, $fungicide_2['material']);
						$data["unsur_budget_2"][$a] = $budget_2['material'] * $data['lokasi']['luas'];
						if($a > $umur){
							$data['unsur_2']['B'.$a] = $budget_2['material'] * $data['lokasi']['luas'];
							$data['unsur_realisasi_2'][$a] = 0;
						}
						else{
							$data['unsur_realisasi_2'][$a] = $data['unsur_2']['B'.$a];
						}
						$a++;
					}

					$this->load->view('WIP_PM/lokasi_CTFU', $data);
				break;

				//Springkle
				case 'CTSP':
					$data['pbs'] = $this->input->get('bulan_aplikasi');
					$date1 = round(strtotime($data['konstanta']['nilai']) / 86400);
					$date2 = round(strtotime($data['lokasi']['tgl_mulai_rawat']) / 86400);
					$umur = ceil(($date1-$date2) / 30.4583333333333);
					$forcing = ceil(((strtotime($data['konstanta']['nilai']) - strtotime($tgl_forcing)) / 86400) / 30.4583333333333);

					if((substr($data['lokasi']['status'], 0, 4) == 'NSFC') && ($forcing >= 0 && $forcing <= 5)){
						$data['prioritas_siram'] = 1;
					}
					else if((substr($data['lokasi']['status'], 0, 4) == 'NSFC') && ($umur >= 0 && $umur <= 3)) {
						$data['prioritas_siram'] = 2;
					}
					else if(((substr($data['lokasi']['status'], 0, 4) == 'NSFC') && ($forcing >= -3 && $forcing < 0)) || ((substr($data['lokasi']['status'], 0, 4) == 'NSSC') && ($forcing >= 0 && $forcing <= 5))) {
						$data['prioritas_siram'] = 3;
					}
					else if((substr($data['lokasi']['status'], 0, 4) == 'NSFC') && ($umur >= 4 && $forcing <= -4)) {
						$data['prioritas_siram'] = 4;
					}
					else if((substr($data['lokasi']['status'], 0, 4) == 'NSSC') && ($umur >= 0 && $forcing <= -1)) {
						$data['prioritas_siram'] = 5;
					}
					else{
						$data['prioritas_siram'] = "-";
					}

					if($forcing >= -7){
						if($forcing < 0){
							$data['umur_siram'] = "F".$forcing;
						}
						else{
							$data['umur_siram'] = "F+".$forcing;
						}
					}
					else{
						$data['umur_siram'] = $umur.' Bulan';
					}

					$data['help_histori_siram'] = $this->HistoriSiram_model->get_std_histori_siram_code(substr($data['lokasi']['kebun'], 0, 3));
					$data['help_irrigator'] = $this->HistoriSiram_model->get_irrigator($lokasi);
					$data['bulan_siram'] = $this->HistoriSiram_model->get_siram_tgl($lokasi, $data['lokasi']['kebun']);

					if($data['pbs'] == NULL){
						$a = 0;
						$cek_bulan = array();
						foreach ($data['bulan_siram'] as $bs) {
							$cek_bulan[$a] = $bs->tanggal;
						}
						$data['pbs'] = end($cek_bulan);
					}

					$data['data_siram'] = $this->HistoriSiram_model->get_siram_bulan($lokasi, $data['lokasi']['kebun'], $data['pbs']);
					$data['ombrometer'] = $this->HistoriSiram_model->get_ombrometer($lokasi);
					$data['bulan_hujan'] = $this->HistoriSiram_model->get_siram_bulan_hujan($lokasi, $data['lokasi']['kebun'], $data['pbs']);
					$data['time_information'] = $this->HistoriSiram_model->get_time_information($lokasi, $data['pbs']);

					$engine_real = $this->HistoriSiram_model->get_engine_real($lokasi, $data['pbs']);

					$a = 1;
					$data['engine_real'] = array();
					foreach ($engine_real as $er) {
						$data['engine_real'][$a]['engine'] = $er->engine;
						$data['engine_real'][$a]['Rp_per_Ha'] = $er->E1;
						$data['engine_real'][$a]['Rp_per_Hm'] = $er->E2;
						$data['engine_real'][$a]['Ha_per_Hm'] = $er->E3;
						$data['engine_real'][$a]['Fuel_per_Hm'] = $er->E4;
						$data['engine_real'][$a]['Fuel_per_Ha'] = $er->E5;
						$a++;
					}

					if(sizeof($data['engine_real']) >= 1){
						$data['engine_std']['1'] = $this->HistoriSiram_model->get_engine_std($data['engine_real']['1']['engine']);
						$data['engine_avg']['1'] = $this->HistoriSiram_model->get_engine_avg($data['engine_real']['1']['engine']);
					}

					if(sizeof($data['engine_real']) == 2){
							$data['engine_std']['2'] = $this->HistoriSiram_model->get_engine_std($data['engine_real']['2']['engine']);
							$data['engine_avg']['2'] = $this->HistoriSiram_model->get_engine_avg($data['engine_real']['2']['engine']);
					}

					$data['histori_siram'] = array(
						'T14' => $this->HistoriSiram_model->get_histori_siram_code($lokasi, '2014'),
						'T15' => $this->HistoriSiram_model->get_histori_siram_code($lokasi, '2015'),
						'T16' => $this->HistoriSiram_model->get_histori_siram_code($lokasi, '2016'),
						'T17' => $this->HistoriSiram_model->get_histori_siram_code($lokasi, '2017'),
						'T18' => $this->HistoriSiram_model->get_histori_siram_code($lokasi, '2018')
					);

					$data_siram_tahun = $this->HistoriSiram_model->get_siram_tahun($lokasi, substr($data['pbs'], 0, 4));

					foreach ($data_siram_tahun as $dst) {
						$data['data_siram_tahun'][$dst->bulan] = $dst->luas;
					}

					$this->load->view('WIP_PM/lokasi_CTSP', $data);
				break;

				//Harvest
				case 'CTHA':
					$data['category'] = $this->input->get('category');
					$data['type'] = $this->input->get('type');
					if($data['category'] == NULL){
						$data['category'] = "Total";
					}
					if($data['type'] == NULL){
						$data['type'] = "Total";
					}
					$data['tonase_panen'] = $this->TonasePanen_model->get_tonase_pm($lokasi, $data['lokasi']['kebun']);
					$data['tonase_panen_category'] = $this->TonasePanen_model->get_tonase_category_pm($lokasi, $data['lokasi']['kebun']);
					$data['tonase_panen_umur'] = $this->TonasePanen_model->get_tonase_umur_pm($lokasi, $data['lokasi']['kebun'], $data['tgl_panen'], $data['category'], $data['type']);

					$this->load->view('WIP_PM/lokasi_CTHA', $data);
				break;

				//Land Preparation
				case 'GCLP':
					$data["element_cost"] = "ZN01";
					$data["activity"] = $this->Activity_model->get_activity_ec($data["element_cost"], $data['lokasi']['status'], ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333), $data["lokasi"]["lokasi"], $data["lokasi"]["kebun"]);
					$data["group_cost"] = $this->Activity_model->get_ec_group_cost($lokasi, $data["lokasi"]["kebun"], $data["element_cost"]);

					$data["std_biaya_umur"] = $this->StdBiayaUmur_model->get_std_biaya_umur_budget(substr($data['lokasi']['status'], 0, 4), $tahun, $data["element_cost"]);
					$biaya_umur = $this->StdBiayaUmur_model->get_biaya_umur_ec($lokasi, $data["lokasi"]["kebun"], $data["element_cost"]);
					$data["trend"] = array();
					for($i = 1; $i <= 21; $i++) {
						$data["trend"][$i] = 0;
					}
					foreach ($biaya_umur as $bu) {
						if($bu->umur <= 1){
							$data["trend"][1] += $bu->biaya_realisasi;
						}
						elseif ($bu->umur >= 21) {
							$data["trend"][21] += $bu->biaya_realisasi;
						}
						else{
							$data["trend"][$bu->umur] = $bu->biaya_realisasi;
						}
					}

					if(date('Y', strtotime($data["tgl_panen"])) == date('Y', strtotime($data["YEAR_BASE"]['nilai']))){
						$cek_produksi = 'produksi';
					}
					else{
						$cek_produksi = 'produksi_t1';
					}
					$data['ZN01_real'] = $this->DataMaster_model->get_real_actual_code_zn01_zn04($lokasi, substr($data['lokasi']['status'], 0, 4), 'ZN01', $cek_produksi);
					if($data['ZN01_real']['total'] == NULL){
						$data['ZN01_real'] = $this->DataMaster_model->get_element_cost_code_jenis($lokasi, "ZN01", $data["lokasi"]["kebun"]);
					}

					$this->load->view('WIP_PM/lokasi_GCLP', $data);
				break;

				//Seedling
				case 'GCSE':
					$data["element_cost"] = "ZN02";
					$data["activity"] = $this->Activity_model->get_activity_ec($data["element_cost"], $data['lokasi']['status'], ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333), $data["lokasi"]["lokasi"], $data["lokasi"]["kebun"]);
					$data["group_cost"] = $this->Activity_model->get_ec_group_cost($lokasi, $data["lokasi"]["kebun"], $data["element_cost"]);

					$data["std_biaya_umur"] = $this->StdBiayaUmur_model->get_std_biaya_umur_budget(substr($data['lokasi']['status'], 0, 4), $tahun, $data["element_cost"]);
					$biaya_umur = $this->StdBiayaUmur_model->get_biaya_umur_ec($lokasi, $data["lokasi"]["kebun"], $data["element_cost"]);
					$data["trend"] = array();
					for($i = 1; $i <= 21; $i++) {
						$data["trend"][$i] = 0;
					}
					foreach ($biaya_umur as $bu) {
						if($bu->umur <= 1){
							$data["trend"][1] += $bu->biaya_realisasi;
						}
						elseif ($bu->umur >= 21) {
							$data["trend"][21] += $bu->biaya_realisasi;
						}
						else{
							$data["trend"][$bu->umur] = $bu->biaya_realisasi;
						}
					}

					$this->load->view('WIP_PM/lokasi_GCSE', $data);
				break;

				//Planting
				case 'GCPT':
					$data["element_cost"] = "ZN03";
					$data["activity"] = $this->Activity_model->get_activity_ec($data["element_cost"], $data['lokasi']['status'], ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333), $data["lokasi"]["lokasi"], $data["lokasi"]["kebun"]);
					$data["group_cost"] = $this->Activity_model->get_ec_group_cost($lokasi, $data["lokasi"]["kebun"], $data["element_cost"]);

					$data["std_biaya_umur"] = $this->StdBiayaUmur_model->get_std_biaya_umur_budget(substr($data['lokasi']['status'], 0, 4), $tahun, $data["element_cost"]);
					$biaya_umur = $this->StdBiayaUmur_model->get_biaya_umur_ec($lokasi, $data["lokasi"]["kebun"], $data["element_cost"]);
					$data["trend"] = array();
					for($i = 1; $i <= 21; $i++) {
						$data["trend"][$i] = 0;
					}
					foreach ($biaya_umur as $bu) {
						if($bu->umur <= 1){
							$data["trend"][1] += $bu->biaya_realisasi;
						}
						elseif ($bu->umur >= 21) {
							$data["trend"][21] += $bu->biaya_realisasi;
						}
						else{
							$data["trend"][$bu->umur] = $bu->biaya_realisasi;
						}
					}

					if(date('Y', strtotime($data["tgl_panen"])) == date('Y', strtotime($data["YEAR_BASE"]['nilai']))){
						$cek_produksi = 'produksi';
					}
					else{
						$cek_produksi = 'produksi_t1';
					}
					$data['ZN03_real'] = $this->DataMaster_model->get_real_actual_code_zn01_zn04($lokasi, substr($data['lokasi']['status'], 0, 4), 'ZN03', $cek_produksi);
					if($data['ZN03_real']['total'] == NULL){
						$data['ZN03_real'] = $this->DataMaster_model->get_element_cost_code_jenis($lokasi, "ZN03", $data["lokasi"]["kebun"]);
						if(substr($data['lokasi']['status'], 0, 4) == 'NSFC'){
							if($data['lokasi']['tgl_mulai_rawat'] >= "2019-05-01"){
								$data['ZN03_real']['total'] = $data['ZN03_real']['total'] + (1000000 * $data['lokasi']['luas']);
							}
							else{
								$data['ZN03_real']['total'] = $data['ZN03_real']['total'] + (3676535.88918288 * $data['lokasi']['luas']);
							}
						}
					}

					$this->load->view('WIP_PM/lokasi_GCPT', $data);
				break;


				//Road & Drainage
				case 'GCRD':
					$data["element_cost"] = "ZN04";
					$data["activity"] = $this->Activity_model->get_activity_ec($data["element_cost"], $data['lokasi']['status'], ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333), $data["lokasi"]["lokasi"], $data["lokasi"]["kebun"]);
					$data["group_cost"] = $this->Activity_model->get_ec_group_cost($lokasi, $data["lokasi"]["kebun"], $data["element_cost"]);

					$data["std_biaya_umur"] = $this->StdBiayaUmur_model->get_std_biaya_umur_budget(substr($data['lokasi']['status'], 0, 4), $tahun, $data["element_cost"]);
					$biaya_umur = $this->StdBiayaUmur_model->get_biaya_umur_ec($lokasi, $data["lokasi"]["kebun"], $data["element_cost"]);
					$data["trend"] = array();
					for($i = 1; $i <= 21; $i++) {
						$data["trend"][$i] = 0;
					}
					foreach ($biaya_umur as $bu) {
						if($bu->umur <= 1){
							$data["trend"][1] += $bu->biaya_realisasi;
						}
						elseif ($bu->umur >= 21) {
							$data["trend"][21] += $bu->biaya_realisasi;
						}
						else{
							$data["trend"][$bu->umur] = $bu->biaya_realisasi;
						}
					}

					if(date('Y', strtotime($data["tgl_panen"])) == date('Y', strtotime($data["YEAR_BASE"]['nilai']))){
						$cek_produksi = 'produksi';
					}
					else{
						$cek_produksi = 'produksi_t1';
					}
					$data['ZN04_real'] = $this->DataMaster_model->get_real_actual_code_zn01_zn04($lokasi, substr($data['lokasi']['status'], 0, 4), 'ZN04', $cek_produksi);
					if($data['ZN04_real']['total'] == NULL){
						$data['ZN04_real'] = $this->DataMaster_model->get_element_cost_code_jenis($lokasi, "ZN04", $data["lokasi"]["kebun"]);
					}

					$this->load->view('WIP_PM/lokasi_GCRD', $data);
				break;

				//Fertilization
				case 'GCFE':
					$data["element_cost"] = "ZN05";
					$data["activity"] = $this->Activity_model->get_activity_ec($data["element_cost"], $data['lokasi']['status'], ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333), $data["lokasi"]["lokasi"], $data["lokasi"]["kebun"]);
					$data["group_cost"] = $this->Activity_model->get_ec_group_cost($lokasi, $data["lokasi"]["kebun"], $data["element_cost"]);
					$data["spray_mekanis"] = $this->Fertilization_model->get_fertilization_spray($lokasi, $data["lokasi"]["kebun"]);
					$data["manual"] = $this->Fertilization_model->get_fertilization_manual($lokasi, $data["lokasi"]["kebun"]);

					$data["std_biaya_umur"] = $this->StdBiayaUmur_model->get_std_biaya_umur_budget(substr($data['lokasi']['status'], 0, 4), $tahun, $data["element_cost"]);
					$biaya_umur = $this->StdBiayaUmur_model->get_biaya_umur_ec($lokasi, $data["lokasi"]["kebun"], $data["element_cost"]);
					$data["trend"] = array();
					for($i = 1; $i <= 21; $i++) {
						$data["trend"][$i] = 0;
					}
					foreach ($biaya_umur as $bu) {
						if($bu->umur <= 1){
							$data["trend"][1] += $bu->biaya_realisasi;
						}
						elseif ($bu->umur >= 21) {
							$data["trend"][21] += $bu->biaya_realisasi;
						}
						else{
							$data["trend"][$bu->umur] = $bu->biaya_realisasi;
						}
					}

					$data['std_material'] = $this->StdUnsurUmur_model->get_std_metarial($kelas, ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333));
					$data['real_material'] = $this->Fertilization_model->get_unsur_fertilization($lokasi, $data['lokasi']['kebun']);

					$this->load->view('WIP_PM/lokasi_GCFE', $data);
				break;

				//Weed Control
				case 'GCWC':
					$data["element_cost"] = "ZN06";
					$data["activity"] = $this->Activity_model->get_activity_ec($data["element_cost"], $data['lokasi']['status'], ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333), $data["lokasi"]["lokasi"], $data["lokasi"]["kebun"]);
					$data["group_cost"] = $this->Activity_model->get_ec_group_cost($lokasi, $data["lokasi"]["kebun"], $data["element_cost"]);
					$data["booster"] = $this->WeedControl_model->get_weed_control_booster($lokasi, $data["lokasi"]["kebun"]);
					$data["weeding_manual"] = $this->WeedControl_model->get_weed_control_weeding_man($lokasi, $data["lokasi"]["kebun"]);

					$data["std_biaya_umur"] = $this->StdBiayaUmur_model->get_std_biaya_umur_budget(substr($data['lokasi']['status'], 0, 4), $tahun, $data["element_cost"]);
					$biaya_umur = $this->StdBiayaUmur_model->get_biaya_umur_ec($lokasi, $data["lokasi"]["kebun"], $data["element_cost"]);
					$data["trend"] = array();
					for($i = 1; $i <= 21; $i++) {
						$data["trend"][$i] = 0;
					}
					foreach ($biaya_umur as $bu) {
						if($bu->umur <= 1){
							$data["trend"][1] += $bu->biaya_realisasi;
						}
						elseif ($bu->umur >= 21) {
							$data["trend"][21] += $bu->biaya_realisasi;
						}
						else{
							$data["trend"][$bu->umur] = $bu->biaya_realisasi;
						}
					}

					$data['std_material'] = $this->StdUnsurUmur_model->get_std_metarial($kelas, ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333));
					$data['real_material'] = $this->WeedControl_model->get_unsur_weed_control($lokasi, $data['lokasi']['kebun']);

					$this->load->view('WIP_PM/lokasi_GCWC', $data);
				break;

				//Plant Pest Control
				case 'GCPL':
					$data["element_cost"] = "ZN07";
					$data["activity"] = $this->Activity_model->get_activity_ec($data["element_cost"], $data['lokasi']['status'], ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333), $data["lokasi"]["lokasi"], $data["lokasi"]["kebun"]);
					$data["group_cost"] = $this->Activity_model->get_ec_group_cost($lokasi, $data["lokasi"]["kebun"], $data["element_cost"]);

					$data["std_biaya_umur"] = $this->StdBiayaUmur_model->get_std_biaya_umur_budget(substr($data['lokasi']['status'], 0, 4), $tahun, $data["element_cost"]);
					$biaya_umur = $this->StdBiayaUmur_model->get_biaya_umur_ec($lokasi, $data["lokasi"]["kebun"], $data["element_cost"]);
					$data["trend"] = array();
					for($i = 1; $i <= 21; $i++) {
						$data["trend"][$i] = 0;
					}
					foreach ($biaya_umur as $bu) {
						if($bu->umur <= 1){
							$data["trend"][1] += $bu->biaya_realisasi;
						}
						elseif ($bu->umur >= 21) {
							$data["trend"][21] += $bu->biaya_realisasi;
						}
						else{
							$data["trend"][$bu->umur] = $bu->biaya_realisasi;
						}
					}

					$data['std_material'] = $this->StdUnsurUmur_model->get_std_metarial($kelas, ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333));
					$data['real_material'] = $this->PlantPestControl_model->get_unsur_plant_pest_control($lokasi, $data['lokasi']['kebun']);

					$this->load->view('WIP_PM/lokasi_GCPL', $data);
				break;

				//Forcing
				case 'GCFO':
					$data["element_cost"] = "ZN08";
					$data["activity"] = $this->Activity_model->get_activity_ec($data["element_cost"], $data['lokasi']['status'], ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333), $data["lokasi"]["lokasi"], $data["lokasi"]["kebun"]);
					$data["group_cost"] = $this->Activity_model->get_ec_group_cost($lokasi, $data["lokasi"]["kebun"], $data["element_cost"]);

					$data["std_biaya_umur"] = $this->StdBiayaUmur_model->get_std_biaya_umur_budget(substr($data['lokasi']['status'], 0, 4), $tahun, $data["element_cost"]);
					$biaya_umur = $this->StdBiayaUmur_model->get_biaya_umur_ec($lokasi, $data["lokasi"]["kebun"], $data["element_cost"]);
					$data["trend"] = array();
					for($i = 1; $i <= 21; $i++) {
						$data["trend"][$i] = 0;
					}
					foreach ($biaya_umur as $bu) {
						if($bu->umur <= 1){
							$data["trend"][1] += $bu->biaya_realisasi;
						}
						elseif ($bu->umur >= 21) {
							$data["trend"][21] += $bu->biaya_realisasi;
						}
						else{
							$data["trend"][$bu->umur] = $bu->biaya_realisasi;
						}
					}

					$this->load->view('WIP_PM/lokasi_GCFO', $data);
				break;

				//Pre Harvest
				case 'GCPH':
					$data["element_cost"] = "ZN09";
					$data["activity"] = $this->Activity_model->get_activity_ec($data["element_cost"], $data['lokasi']['status'], ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333), $data["lokasi"]["lokasi"], $data["lokasi"]["kebun"]);
					$data["group_cost"] = $this->Activity_model->get_ec_group_cost($lokasi, $data["lokasi"]["kebun"], $data["element_cost"]);
					$data["ripening"] = $this->Fertilization_model->get_ripening_tgl($lokasi, $data["lokasi"]["kebun"]);

					$data["std_biaya_umur"] = $this->StdBiayaUmur_model->get_std_biaya_umur_budget(substr($data['lokasi']['status'], 0, 4), $tahun, $data["element_cost"]);
					$biaya_umur = $this->StdBiayaUmur_model->get_biaya_umur_ec($lokasi, $data["lokasi"]["kebun"], $data["element_cost"]);
					$data["trend"] = array();
					for($i = 1; $i <= 21; $i++) {
						$data["trend"][$i] = 0;
					}
					foreach ($biaya_umur as $bu) {
						if($bu->umur <= 1){
							$data["trend"][1] += $bu->biaya_realisasi;
						}
						elseif ($bu->umur >= 21) {
							$data["trend"][21] += $bu->biaya_realisasi;
						}
						else{
							$data["trend"][$bu->umur] = $bu->biaya_realisasi;
						}
					}

					$this->load->view('WIP_PM/lokasi_GCPH', $data);
				break;

				//Harvest
				case 'GCHA':
					$data["element_cost"] = "ZN10";
					$data["activity"] = $this->Activity_model->get_activity_ec($data["element_cost"], $data['lokasi']['status'], ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333), $data["lokasi"]["lokasi"], $data["lokasi"]["kebun"]);
					$data["group_cost"] = $this->Activity_model->get_ec_group_cost($lokasi, $data["lokasi"]["kebun"], $data["element_cost"]);

					$data["std_biaya_umur"] = $this->StdBiayaUmur_model->get_std_biaya_umur_budget(substr($data['lokasi']['status'], 0, 4), $tahun, $data["element_cost"]);
					$biaya_umur = $this->StdBiayaUmur_model->get_biaya_umur_ec($lokasi, $data["lokasi"]["kebun"], $data["element_cost"]);
					$data["trend"] = array();
					for($i = 1; $i <= 21; $i++) {
						$data["trend"][$i] = 0;
					}
					foreach ($biaya_umur as $bu) {
						if($bu->umur <= 1){
							$data["trend"][1] += $bu->biaya_realisasi;
						}
						elseif ($bu->umur >= 21) {
							$data["trend"][21] += $bu->biaya_realisasi;
						}
						else{
							$data["trend"][$bu->umur] = $bu->biaya_realisasi;
						}
					}

					$this->load->view('WIP_PM/lokasi_GCHA', $data);
				break;

				//Observation
				case 'GCOB':
					$data["element_cost"] = "ZN11";
					$data["activity"] = $this->Activity_model->get_activity_ec($data["element_cost"], $data['lokasi']['status'], ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333), $data["lokasi"]["lokasi"], $data["lokasi"]["kebun"]);
					$data["group_cost"] = $this->Activity_model->get_ec_group_cost($lokasi, $data["lokasi"]["kebun"], $data["element_cost"]);

					$data["std_biaya_umur"] = $this->StdBiayaUmur_model->get_std_biaya_umur_budget(substr($data['lokasi']['status'], 0, 4), $tahun, $data["element_cost"]);
					$biaya_umur = $this->StdBiayaUmur_model->get_biaya_umur_ec($lokasi, $data["lokasi"]["kebun"], $data["element_cost"]);
					$data["trend"] = array();
					for($i = 1; $i <= 21; $i++) {
						$data["trend"][$i] = 0;
					}
					foreach ($biaya_umur as $bu) {
						if($bu->umur <= 1){
							$data["trend"][1] += $bu->biaya_realisasi;
						}
						elseif ($bu->umur >= 21) {
							$data["trend"][21] += $bu->biaya_realisasi;
						}
						else{
							$data["trend"][$bu->umur] = $bu->biaya_realisasi;
						}
					}

					$this->load->view('WIP_PM/lokasi_GCOB', $data);
				break;

				//Plant Selection
				case 'GCPS':
					$data["element_cost"] = "ZN12";
					$data["activity"] = $this->Activity_model->get_activity_ec($data["element_cost"], $data['lokasi']['status'], ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333), $data["lokasi"]["lokasi"], $data["lokasi"]["kebun"]);
					$data["group_cost"] = $this->Activity_model->get_ec_group_cost($lokasi, $data["lokasi"]["kebun"], $data["element_cost"]);

					$data["std_biaya_umur"] = $this->StdBiayaUmur_model->get_std_biaya_umur_budget(substr($data['lokasi']['status'], 0, 4), $tahun, $data["element_cost"]);
					$biaya_umur = $this->StdBiayaUmur_model->get_biaya_umur_ec($lokasi, $data["lokasi"]["kebun"], $data["element_cost"]);
					$data["trend"] = array();
					for($i = 1; $i <= 21; $i++) {
						$data["trend"][$i] = 0;
					}
					foreach ($biaya_umur as $bu) {
						if($bu->umur <= 1){
							$data["trend"][1] += $bu->biaya_realisasi;
						}
						elseif ($bu->umur >= 21) {
							$data["trend"][21] += $bu->biaya_realisasi;
						}
						else{
							$data["trend"][$bu->umur] = $bu->biaya_realisasi;
						}
					}

					$this->load->view('WIP_PM/lokasi_GCPS', $data);
				break;

				//Springkle / Irrigation
				case 'GCSI':
					$data["element_cost"] = "ZN13";
					$data["activity"] = $this->Activity_model->get_activity_ec($data["element_cost"], $data['lokasi']['status'], ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333), $data["lokasi"]["lokasi"], $data["lokasi"]["kebun"]);
					$data["group_cost"] = $this->Activity_model->get_ec_group_cost($lokasi, $data["lokasi"]["kebun"], $data["element_cost"]);

					$data["std_biaya_umur"] = $this->StdBiayaUmur_model->get_std_biaya_umur_budget(substr($data['lokasi']['status'], 0, 4), $tahun, $data["element_cost"]);
					$biaya_umur = $this->StdBiayaUmur_model->get_biaya_umur_ec($lokasi, $data["lokasi"]["kebun"], $data["element_cost"]);
					$data["trend"] = array();
					for($i = 1; $i <= 21; $i++) {
						$data["trend"][$i] = 0;
					}
					foreach ($biaya_umur as $bu) {
						if($bu->umur <= 1){
							$data["trend"][1] += $bu->biaya_realisasi;
						}
						elseif ($bu->umur >= 21) {
							$data["trend"][21] += $bu->biaya_realisasi;
						}
						else{
							$data["trend"][$bu->umur] = $bu->biaya_realisasi;
						}
					}

					$this->load->view('WIP_PM/lokasi_GCSI', $data);
				break;

				//Guard / Pool / Labour
				case 'GCGU':
					$data["element_cost"] = "ZN14";
					$data["activity"] = $this->Activity_model->get_activity_ec($data["element_cost"], $data['lokasi']['status'], ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333), $data["lokasi"]["lokasi"], $data["lokasi"]["kebun"]);
					$data["group_cost"] = $this->Activity_model->get_ec_group_cost($lokasi, $data["lokasi"]["kebun"], $data["element_cost"]);

					$data["std_biaya_umur"] = $this->StdBiayaUmur_model->get_std_biaya_umur_budget(substr($data['lokasi']['status'], 0, 4), $tahun, $data["element_cost"]);
					$biaya_umur = $this->StdBiayaUmur_model->get_biaya_umur_ec($lokasi, $data["lokasi"]["kebun"], $data["element_cost"]);
					$data["trend"] = array();
					for($i = 1; $i <= 21; $i++) {
						$data["trend"][$i] = 0;
					}
					foreach ($biaya_umur as $bu) {
						if($bu->umur <= 1){
							$data["trend"][1] += $bu->biaya_realisasi;
						}
						elseif ($bu->umur >= 21) {
							$data["trend"][21] += $bu->biaya_realisasi;
						}
						else{
							$data["trend"][$bu->umur] = $bu->biaya_realisasi;
						}
					}

					$this->load->view('WIP_PM/lokasi_GCGU', $data);
				break;

				//Others
				case 'GCOT':
					$data["element_cost"] = "ZN15";
					$data["activity"] = $this->Activity_model->get_activity_ec($data["element_cost"], $data['lokasi']['status'], ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333), $data["lokasi"]["lokasi"], $data["lokasi"]["kebun"]);
					$data["group_cost"] = $this->Activity_model->get_ec_group_cost($lokasi, $data["lokasi"]["kebun"], $data["element_cost"]);

					$data["std_biaya_umur"] = $this->StdBiayaUmur_model->get_std_biaya_umur_budget(substr($data['lokasi']['status'], 0, 4), $tahun, $data["element_cost"]);
					$biaya_umur = $this->StdBiayaUmur_model->get_biaya_umur_ec($lokasi, $data["lokasi"]["kebun"], $data["element_cost"]);
					$data["trend"] = array();
					for($i = 1; $i <= 21; $i++) {
						$data["trend"][$i] = 0;
					}
					foreach ($biaya_umur as $bu) {
						if($bu->umur <= 1){
							$data["trend"][1] += $bu->biaya_realisasi;
						}
						elseif ($bu->umur >= 21) {
							$data["trend"][21] += $bu->biaya_realisasi;
						}
						else{
							$data["trend"][$bu->umur] = $bu->biaya_realisasi;
						}
					}

					$this->load->view('WIP_PM/lokasi_GCOT', $data);
				break;
			}
			$this->load->view('WIP_PM/include/footer');
		}
		else{
			header( "Location: /PIS/WIP_PM_Dashboard" );
		}
	}
	public function activity_detail(){
		session_start();
		if(isset($_SESSION['username'])){
			$lokasi = $this->input->get('lokasi');
			$data['element_cost'] = $this->input->get('ec');
			$data['page'] = $this->input->get('page');
			$data['subpage'] = $this->input->get('subpage');
			$data['account'] = $this->User_model->get_user_index($_SESSION['index']);
			$data["konstanta"] = $this->Konstanta_model->get_konstanta_code("TGL_TARIK_DATA");
			$data["YEAR_BASE"] = $this->Konstanta_model->get_konstanta_code("YEAR_BASE");
			$data["pg_wil"] = $this->Lokasi_model->get_detil_lokasi_pg_wil($lokasi);
			$data["lokasi"] = $this->Lokasi_model->get_lokasi_code($lokasi);
			$data["histori_lokasi_nssc_nsfc"] = $this->HistoriLokasi_model->get_histori_lokasi_code_nssc_nsfc($lokasi);

			$data["wilayah"] = $this->Wilayah_model->get_wilayah_code(substr($data['lokasi']['kebun'], 0, 3));
			$data["produksi"] = $this->Produksi_model->get_produksi_code($lokasi, substr($data["lokasi"]["status"], 0, 4));
			if($data["produksi"] == NULL){
				$data["produksi"] = $this->Produksi_model->get_produksi_t1_code($lokasi, substr($data["lokasi"]["status"], 0, 4));
			}

			if(substr($data["lokasi"]['status'], 0, 4) == 'NSFC' || substr($data["lokasi"]['status'], 0, 4) == 'NFFC'){
				$kelas = substr($data["lokasi"]['bibit'], 6, 1);
			}
			else{
				$kelas = 'NSSC';
			}

		  if($data["produksi"] == NULL){
		    if($data["lokasi"]['tgl_panen_standard'] != NULL){
		      $data["tgl_panen"] = $data["lokasi"]['tgl_panen_standard'];
		    }
		    else if($data["lokasi"]['tgl_panen_rencana'] != NULL){
		      $data["tgl_panen"] = $data["lokasi"]['tgl_panen_rencana'];
		    }
		    else{
		      if(substr($data["lokasi"]['status'], 0, 4) != 'NSSC'){
		        $data["tgl_panen"] = strtotime($data["lokasi"]['tgl_mulai_rawat']) + ($standart_panen[$kelas]['bulan'] * 30.4583333333333 * 86400);
		      }
		      else{
		        $data["tgl_panen"] = strtotime($data["lokasi"]['tgl_mulai_rawat']) + 13 * 30.5 * 86400;
		      }
		      $data["tgl_panen"] = date('Y-m-d', $data["tgl_panen"]);
		    }

		    if(date('Y', strtotime($data["tgl_panen"])) == date('Y', strtotime($data["YEAR_BASE"]['nilai']))){
		      $data["tgl_panen"] = date('Y-m-d', strtotime($data["tgl_panen"]) + (86400 * 91.5));
		    }
		  }
		  else{
		    $data["tgl_panen"] = $data["produksi"]['real_dan_sisa_rencana_tgl_selesai_panen'];
		  }
      $data["tgl_rencana_forcing"] = date('Y-m-d', strtotime($data["tgl_panen"]) - (152 * 86400));

		  if($data['produksi'] == NULL){
		    if($data['lokasi']['status'] == 'NFFC'){
		      $data['tonase'] = 82.2 * $data['lokasi']['luas'];
		      $data['yield'] = 82.2;
		    }
		    else{
					$status = substr($data["lokasi"]['status'], 0, 4);
		      $data['tonase'] = $data['std_yield'][$status]['yield'] * $data['lokasi']['luas'];
		      $data['yield'] = $data['std_yield'][$status]['yield'];
		    }
		  }
		  else{
		    $data['tonase'] = $data['produksi']['real_dan_sisa_rencana_tonase'];
		    $data['yield'] = $data['produksi']['real_dan_sisa_rencana_yield'];
		  }
		  if($data['produksi']['real_dan_sisa_rencana_luas'] != NULL){
		    $data['luas'] = $data['produksi']['real_dan_sisa_rencana_luas'];
		  }
		  else{
		    $data['luas'] = $data['lokasi']['luas'];
		  }
			if(date('Y', strtotime($data["tgl_panen"])) == date('Y', strtotime($data["YEAR_BASE"]['nilai']))){
				$data['std_yield'] = $this->StdYield_model->get_std_yield_code(substr($data['lokasi']['status'], 0, 4).'');
				$tahun = 'T0';
			}
			else{
				$data['std_yield'] = $this->StdYield_model->get_std_yield_code(substr($data['lokasi']['status'], 0, 4).'_t1');
				$tahun = 'T1';
			}
			if($data['lokasi']['tgl_forcing_realisasi'] != NULL){
				$tgl_forcing = $data['lokasi']['tgl_forcing_realisasi'];
				$data['tgl_forcing'] = $data['lokasi']['tgl_forcing_realisasi'];
			}
			else{
				$tgl_forcing = $data['tgl_rencana_forcing'];
				$data['tgl_forcing'] = $data['tgl_rencana_forcing'];
			}
			$data['std_forcing_panen'] = $this->Konstanta_model->get_std_forcing_panen($data['lokasi']['tgl_mulai_rawat'], $kelas);

			$this->load->view('WIP_PM/include/header');
			switch ($data['subpage']) {
				case 'SPEC':
					$data['element_cost'] = $this->input->get('ec');
					$data["element_cost_all"] = $this->ElementCost_model->get_element_cost_pm();

					$data["detil_spk"] = $this->ElementCost_model->get_detil_element_cost($lokasi, $data['element_cost'], $data["lokasi"]["kebun"]);
					$data["group_cost"] = $this->ElementCost_model->get_element_cost_group_cost($lokasi, $data["lokasi"]["kebun"], $data['element_cost']);

					switch ($data['element_cost']) {
						case 'ZN01':
						case 'ZN03':
						case 'ZN04':
							if(date('Y', strtotime($data["tgl_panen"])) == date('Y', strtotime($data["YEAR_BASE"]['nilai']))){
								$cek_produksi = 'produksi';
							}
							else{
								$cek_produksi = 'produksi_t1';
							}
							$data['ZN_real'] = $this->DataMaster_model->get_real_actual_code_zn01_zn04($lokasi, substr($data['lokasi']['status'], 0, 4), $data['element_cost'], $cek_produksi);
							if($data['ZN_real']['total'] == NULL){
								$data['ZN_real'] = $this->DataMaster_model->get_element_cost_code_jenis($lokasi, $data['element_cost'], $data["lokasi"]["kebun"]);
							}
						break;
					}

					// echo "<pre>";
					// var_dump($data['ZN_real']);
					// echo "</pre>";
					// die();

					$this->load->view('WIP_PM/detail_SPEC', $data);
				break;
				case 'SPAC':
					$data['STD_Populasi_Tanam'] = $this->Konstanta_model->get_std_populasi_tanam();
					$data['activity'] = $this->input->get('code');
					$data['activity_all'] = $this->Activity_model->get_activity_all();

					$data['Luas_Tanam'] = $this->PerlocationPM3_model->get_luas_tanam($lokasi, $data['element_cost'], $data["lokasi"]["kebun"], $data['activity']);
					$data["detil_spk"] = $this->Activity_model->get_detil_activity($lokasi, $data['element_cost'], $data["lokasi"]["kebun"], $data['activity']);
					$data["group_cost"] = $this->Activity_model->get_activity_group_cost($lokasi, $data["lokasi"]["kebun"], $data['element_cost'], $data['activity']);

					$this->load->view('WIP_PM/detail_SPAC', $data);
				break;
				case 'SPMA':
					$data['material'] = $this->input->get('code');
					$data['luas_type'] = $this->input->get('luas');
					if($data['luas_type'] == NULL){
						$data['luas_type'] = 0;
					}
					$cek_kata = explode('_', $data['material']);
					if(sizeof($cek_kata) > 1){
						$data['material'] = $cek_kata[0].' '.$cek_kata[1];
					}
					$data['material_all'] = $this->Material_model->get_master_material();
					$material = $this->Material_model->get_master_material_nama($data['material']);
					$data["detil_spk"] = $this->Material_model->get_detil_activity_material($lokasi, $data["lokasi"]["kebun"], $material['code']);

					if($data['luas_type'] == 0){
						$data["unsur_real"] = $this->Material_model->get_material_unsur($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $data['lokasi']['tgl_mulai_rawat'], $material['code']);
						$a = 1;
						$data['jumlah_unsur'] = 0;
						while ($a <= 24) {
							$data['jumlah_unsur'] += $data["unsur_real"]['B'.$a];
							$a++;
						}
					}
					else{
						$unsur_real = $this->Material_model->get_material_unsur_luas_aktif($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $data['lokasi']['tgl_mulai_rawat'], $material['code']);
						$resource = array();
						$luas_aktif = array();
						$data['unsur_real'] = array(
							'B1' => 0,
							'B2' => 0,
							'B3' => 0,
							'B4' => 0,
							'B5' => 0,
							'B6' => 0,
							'B7' => 0,
							'B8' => 0,
							'B9' => 0,
							'B10' => 0,
							'B11' => 0,
							'B12' => 0,
							'B13' => 0,
							'B14' => 0,
							'B15' => 0,
							'B16' => 0,
							'B17' => 0,
							'B18' => 0,
							'B19' => 0,
							'B20' => 0,
							'B21' => 0,
							'B22' => 0,
							'B23' => 0,
							'B24' => 0,
							'U1' => 0,
							'U2' => 0,
							'U3' => 0,
							'U4' => 0,
							'U5' => 0,
							'U6' => 0,
							'U7' => 0,
							'U8' => 0,
							'U9' => 0,
							'U10' => 0,
							'U11' => 0,
							'U12' => 0,
							'U13' => 0,
							'U14' => 0,
							'U15' => 0,
							'U16' => 0,
							'U17' => 0,
							'U18' => 0,
							'U19' => 0,
							'U20' => 0,
							'U21' => 0,
							'U22' => 0,
							'U23' => 0,
							'U24' => 0,
							'L1' => 0,
							'L2' => 0,
							'L3' => 0,
							'L4' => 0,
							'L5' => 0,
							'L6' => 0,
							'L7' => 0,
							'L8' => 0,
							'L9' => 0,
							'L10' => 0,
							'L11' => 0,
							'L12' => 0,
							'L13' => 0,
							'L14' => 0,
							'L15' => 0,
							'L16' => 0,
							'L17' => 0,
							'L18' => 0,
							'L19' => 0,
							'L20' => 0,
							'L21' => 0,
							'L22' => 0,
							'L23' => 0,
							'L24' => 0,
						);
						foreach ($unsur_real as $ur) {
							if($ur->L1 != 0) $data['unsur_real']['B1'] += $ur->B1 / $ur->L1;
							if($ur->L2 != 0) $data['unsur_real']['B2'] += $ur->B2 / $ur->L2;
							if($ur->L3 != 0) $data['unsur_real']['B3'] += $ur->B3 / $ur->L3;
							if($ur->L4 != 0) $data['unsur_real']['B4'] += $ur->B4 / $ur->L4;
							if($ur->L5 != 0) $data['unsur_real']['B5'] += $ur->B5 / $ur->L5;
							if($ur->L6 != 0) $data['unsur_real']['B6'] += $ur->B6 / $ur->L6;
							if($ur->L7 != 0) $data['unsur_real']['B7'] += $ur->B7 / $ur->L7;
							if($ur->L8 != 0) $data['unsur_real']['B8'] += $ur->B8 / $ur->L8;
							if($ur->L9 != 0) $data['unsur_real']['B9'] += $ur->B9 / $ur->L9;
							if($ur->L10 != 0) $data['unsur_real']['B10'] += $ur->B10 / $ur->L10;
							if($ur->L11 != 0) $data['unsur_real']['B11'] += $ur->B11 / $ur->L11;
							if($ur->L12 != 0) $data['unsur_real']['B12'] += $ur->B12 / $ur->L12;
							if($ur->L13 != 0) $data['unsur_real']['B13'] += $ur->B13 / $ur->L13;
							if($ur->L14 != 0) $data['unsur_real']['B14'] += $ur->B14 / $ur->L14;
							if($ur->L15 != 0) $data['unsur_real']['B15'] += $ur->B15 / $ur->L15;
							if($ur->L16 != 0) $data['unsur_real']['B16'] += $ur->B16 / $ur->L16;
							if($ur->L17 != 0) $data['unsur_real']['B17'] += $ur->B17 / $ur->L17;
							if($ur->L18 != 0) $data['unsur_real']['B18'] += $ur->B18 / $ur->L18;
							if($ur->L19 != 0) $data['unsur_real']['B19'] += $ur->B19 / $ur->L19;
							if($ur->L20 != 0) $data['unsur_real']['B20'] += $ur->B20 / $ur->L20;
							if($ur->L21 != 0) $data['unsur_real']['B21'] += $ur->B21 / $ur->L21;
							if($ur->L22 != 0) $data['unsur_real']['B22'] += $ur->B22 / $ur->L22;
							if($ur->L23 != 0) $data['unsur_real']['B23'] += $ur->B23 / $ur->L23;
							if($ur->L24 != 0) $data['unsur_real']['B24'] += $ur->B24 / $ur->L24;


							$data['unsur_real']['U1'] += $ur->B1;
							$data['unsur_real']['U2'] += $ur->B2;
							$data['unsur_real']['U3'] += $ur->B3;
							$data['unsur_real']['U4'] += $ur->B4;
							$data['unsur_real']['U5'] += $ur->B5;
							$data['unsur_real']['U6'] += $ur->B6;
							$data['unsur_real']['U7'] += $ur->B7;
							$data['unsur_real']['U8'] += $ur->B8;
							$data['unsur_real']['U9'] += $ur->B9;
							$data['unsur_real']['U10'] += $ur->B10;
							$data['unsur_real']['U11'] += $ur->B11;
							$data['unsur_real']['U12'] += $ur->B12;
							$data['unsur_real']['U13'] += $ur->B13;
							$data['unsur_real']['U14'] += $ur->B14;
							$data['unsur_real']['U15'] += $ur->B15;
							$data['unsur_real']['U16'] += $ur->B16;
							$data['unsur_real']['U17'] += $ur->B17;
							$data['unsur_real']['U18'] += $ur->B18;
							$data['unsur_real']['U19'] += $ur->B19;
							$data['unsur_real']['U20'] += $ur->B20;
							$data['unsur_real']['U21'] += $ur->B21;
							$data['unsur_real']['U22'] += $ur->B22;
							$data['unsur_real']['U23'] += $ur->B23;
							$data['unsur_real']['U24'] += $ur->B24;
							$data['unsur_real']['L1'] += $ur->L1;
							$data['unsur_real']['L2'] += $ur->L2;
							$data['unsur_real']['L3'] += $ur->L3;
							$data['unsur_real']['L4'] += $ur->L4;
							$data['unsur_real']['L5'] += $ur->L5;
							$data['unsur_real']['L6'] += $ur->L6;
							$data['unsur_real']['L7'] += $ur->L7;
							$data['unsur_real']['L8'] += $ur->L8;
							$data['unsur_real']['L9'] += $ur->L9;
							$data['unsur_real']['L10'] += $ur->L10;
							$data['unsur_real']['L11'] += $ur->L11;
							$data['unsur_real']['L12'] += $ur->L12;
							$data['unsur_real']['L13'] += $ur->L13;
							$data['unsur_real']['L14'] += $ur->L14;
							$data['unsur_real']['L15'] += $ur->L15;
							$data['unsur_real']['L16'] += $ur->L16;
							$data['unsur_real']['L17'] += $ur->L17;
							$data['unsur_real']['L18'] += $ur->L18;
							$data['unsur_real']['L19'] += $ur->L19;
							$data['unsur_real']['L20'] += $ur->L20;
							$data['unsur_real']['L21'] += $ur->L21;
							$data['unsur_real']['L22'] += $ur->L22;
							$data['unsur_real']['L23'] += $ur->L23;
							$data['unsur_real']['L24'] += $ur->L24;
						}
						$a = 1;
						$data['jumlah_unsur'] = 0;
						$data['jumlah_unsur_total'] = 0;
						while ($a <= 24) {
							$data['jumlah_unsur'] += $data["unsur_real"]['B'.$a];
							$data['jumlah_unsur_total'] += $data["unsur_real"]['U'.$a];
							$a++;
						}
					}

					$this->load->view('WIP_PM/detail_SPMA', $data);
				break;
				case 'SPPP':
					$data['material'] = $this->input->get('code');
					$cek_kata = explode('_', $data['material']);
					if(sizeof($cek_kata) > 1){
						$data['material'] = $cek_kata[0].' '.$cek_kata[1];
					}
					$data['material_prepost'] = $this->WeedControl_model->get_master_material_prepost();
					$material = $this->Material_model->get_master_material_nama($data['material']);
					$data["detil_spk"] = $this->WeedControl_model->get_detil_activity_prepost_material($lokasi, $data["lokasi"]["kebun"], $material['code']);
					$data["unsur_real"] = $this->WeedControl_model->get_material_unsur_prepost($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $material['code']);

					$this->load->view('WIP_PM/detail_SPPP', $data);
				break;
				case 'SPIN':
					$data['material'] = $this->input->get('code');
					$cek_kata = explode('_', $data['material']);
					if(sizeof($cek_kata) > 1){
						$data['material'] = $cek_kata[0].' '.$cek_kata[1];
					}
					$data['material_insect'] = $this->PlantPestControl_model->get_master_material_insect();
					$material = $this->Material_model->get_master_material_nama($data['material']);
					$data["detil_spk"] = $this->PlantPestControl_model->get_detil_activity_insect_material($lokasi, $data["lokasi"]["kebun"], $material['code']);
					$data["unsur_real"] = $this->PlantPestControl_model->get_material_unsur_insect($data['lokasi']['lokasi'], $data['lokasi']['kebun'], $material['code']);

					$this->load->view('WIP_PM/detail_SPIN', $data);
				break;
				case 'SPSP':
					$data['tanggal'] = $this->input->get('tgl');
					$data['tgl_spray'] = $this->Activity_model->get_master_material_tgl($lokasi, $data["lokasi"]["kebun"], '1311131711');
					$data["detil_spk"] = $this->Activity_model->get_detil_activity_tgl($lokasi, $data["lokasi"]["kebun"], $data['tanggal'], '1311131711');
					$data["group_cost"] = $this->Activity_model->get_activity_group_cost_tgl($lokasi, $data["lokasi"]["kebun"], 'ZN05', '1311131711', $data['tanggal']);

					$this->load->view('WIP_PM/detail_SPSP', $data);
				break;
				case 'SPMN':
					$data['tanggal'] = $this->input->get('tgl');
					$data['tgl_spray'] = $this->Activity_model->get_master_material_tgl($lokasi, $data["lokasi"]["kebun"], '1311131115');
					$data["detil_spk"] = $this->Activity_model->get_detil_activity_tgl($lokasi, $data["lokasi"]["kebun"], $data['tanggal'], '1311131115');
					$data["group_cost"] = $this->Activity_model->get_activity_group_cost_tgl($lokasi, $data["lokasi"]["kebun"], 'ZN05', '1311131115', $data['tanggal']);

					$this->load->view('WIP_PM/detail_SPMN', $data);
				break;
				case 'SPBO':
					$data['tanggal'] = $this->input->get('tgl');
					$data['tgl_spray'] = $this->Activity_model->get_master_material_tgl($lokasi, $data["lokasi"]["kebun"], '1315131123');
					$data["detil_spk"] = $this->Activity_model->get_detil_activity_tgl($lokasi, $data["lokasi"]["kebun"], $data['tanggal'], '1315131123');
					$data["group_cost"] = $this->Activity_model->get_activity_group_cost_tgl($lokasi, $data["lokasi"]["kebun"], 'ZN06', '1315131123', $data['tanggal']);

					$this->load->view('WIP_PM/detail_SPMN', $data);
				break;
				case 'HSLK':
					$data["HistoryLokasi"] = $this->PerlocationPM3_model->get_history_lokasi($lokasi);

					$this->load->view('WIP_PM/detail_HSLK', $data);
				break;
			}
			$this->load->view('WIP_PM/include/footer');
		}
		else{
			header( "Location: /PIS/WIP_PM_Dashboard" );
		}
	}
}
