<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_Export extends CI_Controller {

	function __construct()
	{
		parent :: __construct();
		$this->load->model('User_model');
		$this->load->model('Lokasi_model');
		$this->load->model('Wilayah_model');
		$this->load->model('Produksi_model');
		$this->load->model('StdYield_model');
		$this->load->model('Konstanta_model');
		$this->load->model('HistoriLokasi_model');
		$this->load->model('Drainase_model');
		$this->load->model('PengamatanTanah_model');
		$this->load->model('PopulasiAwal_model');
		$this->load->model('DataMaster_model');
		$this->load->model('TonasePanen_model');
		$this->load->model('GroupCost_model');
		$this->load->model('Forecast_model');
		$this->load->model('StdUnsurUmur_model');
		$this->load->model('BeratTanaman_model');
		$this->load->model('PengamatanDaun_model');
		$this->load->model('PengamatanPersenBunga_model');
		$this->load->model('Fertilization_model');
		$this->load->model('WeedControl_model');
		$this->load->model('PlantPestControl_model');
		$this->load->model('Forcing_model');
		$this->load->model('Irrigation_model');
		$this->load->model('HistoriPanen_model');
		$this->load->model('ElementCost_model');
		$this->load->model('Target_model');
		$this->load->model('ForecastOverhead_model');
		$this->load->model('StdBiayaUmur_model');
		$this->load->model('HistoriSiram_model');
		$this->load->model('Koreksi_model');
	}

	public function export_lokasi_labita(){
		session_start();
		if(isset($_SESSION['username'])){
			$lokasi = $this->input->get('lokasi');
			$data["lokasi"] = $this->Lokasi_model->get_lokasi_code($lokasi);

			if((substr($data["lokasi"]["status"],2,2) == 'BB') || (substr($data["lokasi"]["status"],2,2) == 'ST') || (substr($data["lokasi"]["status"],2,2) == 'BK')){
				$cek_status = $this->DataMaster_model->cek_current_status($lokasi, $data["lokasi"]['kebun']);
				if($cek_status['status'] != NULL){
					$data["lokasi"]["status"] = $cek_status['status'];
				}
				else{
					$data["lokasi"]["status"] = substr($data["lokasi"]["status"],0,4);
				}
			}
			else{
				$data["lokasi"]["status"] = substr($data["lokasi"]["status"],0,4);
			}
			$data["wilayah"] = $this->Wilayah_model->get_wilayah_code(substr($data["lokasi"]["kebun"],0,3));
			$data["produksi"] = $this->Produksi_model->get_produksi_code($lokasi, $data["lokasi"]["status"]);
			if($data["produksi"] == NULL){
				$data["produksi"] = $this->Produksi_model->get_produksi_t1_code($lokasi, substr($data["lokasi"]["status"], 0, 4));
			}
			$data["std_yield"] = $this->StdYield_model->get_std_yield_code($data["lokasi"]["status"]);
			$data["konstanta"] = $this->Konstanta_model->get_konstanta_code("TGL_TARIK_DATA");
			$data["histori_lokasi_nssc_nsfc"] = $this->HistoriLokasi_model->get_histori_lokasi_code_nssc_nsfc($lokasi);
			$data["histori_lokasi_sebelumnya"] = $this->HistoriLokasi_model->get_histori_lokasi_code_before($lokasi);
			$data["histori_lokasi_bk"] = $this->HistoriLokasi_model->get_histori_lokasi_code_bk($lokasi);
			$data["histori_lokasi_st"] = $this->HistoriLokasi_model->get_histori_lokasi_code_st($lokasi);
			$data["drainase"] = $this->Drainase_model->get_drainase_code($lokasi);
			$data["pengamatan_tanah"] = $this->PengamatanTanah_model->get_pengamatan_tanah_code_desc($lokasi);
			$data["pengamatan_populasi"] = $this->PopulasiAwal_model->get_polulasi_tanam_lokasi($lokasi);

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
			$data["fertilization"] = array(
				//Fertilization
				'Urea' => $this->DataMaster_model->get_fertilization_code($lokasi, "Urea", $data["lokasi"]["kebun"]),
				'Za' => $this->DataMaster_model->get_fertilization_code($lokasi, "Za", $data["lokasi"]["kebun"]),
				'TSP' => $this->DataMaster_model->get_fertilization_code($lokasi, "TSP", $data["lokasi"]["kebun"]),
				'DAP' => $this->DataMaster_model->get_fertilization_code($lokasi, "DAP", $data["lokasi"]["kebun"]),
				'ZnSo4' => $this->DataMaster_model->get_fertilization_code($lokasi, "ZnSo4", $data["lokasi"]["kebun"]),
				'CaCl2' => $this->DataMaster_model->get_fertilization_code($lokasi, "CaCl2", $data["lokasi"]["kebun"]),
				'Calcibor' => $this->DataMaster_model->get_fertilization_code($lokasi, "Calcibor", $data["lokasi"]["kebun"]),
				'CuSo4' => $this->DataMaster_model->get_fertilization_code($lokasi, "CuSo4", $data["lokasi"]["kebun"]),
				'FeSo4' => $this->DataMaster_model->get_fertilization_code($lokasi, "FeSo4", $data["lokasi"]["kebun"]),
				'K2SO4' => $this->DataMaster_model->get_fertilization_code($lokasi, "K2SO4", $data["lokasi"]["kebun"]),
				'KCl' => $this->DataMaster_model->get_fertilization_code($lokasi, "KCl", $data["lokasi"]["kebun"]),
				'Kiesrite' => $this->DataMaster_model->get_fertilization_code($lokasi, "Kiesrite", $data["lokasi"]["kebun"]),
				'MgSo4' => $this->DataMaster_model->get_fertilization_code($lokasi, "MgSo4", $data["lokasi"]["kebun"]),
				'CaCl' => $this->DataMaster_model->get_fertilization_code($lokasi, "CaCl", $data["lokasi"]["kebun"]),
				'Dolomite' => $this->DataMaster_model->get_fertilization_code($lokasi, "Dolomite", $data["lokasi"]["kebun"]),
				'Gypsum' => $this->DataMaster_model->get_fertilization_code($lokasi, "Gypsum", $data["lokasi"]["kebun"]),
				'Sulfur_Powder' => $this->DataMaster_model->get_fertilization_code($lokasi, "Sulfur Powder", $data["lokasi"]["kebun"]),
				'Kompos' => $this->DataMaster_model->get_fertilization_code($lokasi, "Kompos", $data["lokasi"]["kebun"]),
				'LOB' => $this->DataMaster_model->get_fertilization_code($lokasi, "LOB", $data["lokasi"]["kebun"]),
				'Borax' => $this->DataMaster_model->get_fertilization_code($lokasi, "Borax", $data["lokasi"]["kebun"]),

				//Herbisida
				'Ametrin' => $this->DataMaster_model->get_fertilization_code($lokasi, "Ametrin", $data["lokasi"]["kebun"]),
				'Diuron' => $this->DataMaster_model->get_fertilization_code($lokasi, "Diuron", $data["lokasi"]["kebun"]),
				'Quizalofop' => $this->DataMaster_model->get_fertilization_code($lokasi, "Quizalofop", $data["lokasi"]["kebun"]),
				'Glyphosite' => $this->DataMaster_model->get_fertilization_code($lokasi, "Glyphosite", $data["lokasi"]["kebun"]),
				'Bromacyl' => $this->DataMaster_model->get_fertilization_code($lokasi, "Bromacyl", $data["lokasi"]["kebun"]),
				'Paraquat' => $this->DataMaster_model->get_fertilization_code($lokasi, "Paraquat", $data["lokasi"]["kebun"]),

				//Pestisida
				'Tekasi' => $this->DataMaster_model->get_fertilization_code($lokasi, "Tekasi", $data["lokasi"]["kebun"]),
				'Tekila' => $this->DataMaster_model->get_fertilization_code($lokasi, "Tekila", $data["lokasi"]["kebun"]),
				'Bifentrin_Talstar' => $this->DataMaster_model->get_fertilization_code($lokasi, "Bifentrin Talstar", $data["lokasi"]["kebun"]),
				'Bifentrin_Granule' => $this->DataMaster_model->get_fertilization_code($lokasi, "Bifentrin Granule", $data["lokasi"]["kebun"]),
				'Propoxur' => $this->DataMaster_model->get_fertilization_code($lokasi, "Propoxur", $data["lokasi"]["kebun"]),
				'Chlorpyrofos' => $this->DataMaster_model->get_fertilization_code($lokasi, "Chlorpyrofos", $data["lokasi"]["kebun"]),
				'Cypermethrin' => $this->DataMaster_model->get_fertilization_code($lokasi, "Cypermethrin", $data["lokasi"]["kebun"]),
				'Metalaxyl' => $this->DataMaster_model->get_fertilization_code($lokasi, "Metalaxyl", $data["lokasi"]["kebun"]),
				'Propiconazole' => $this->DataMaster_model->get_fertilization_code($lokasi, "Propiconazole", $data["lokasi"]["kebun"]),
				'Fosetil-Al' => $this->DataMaster_model->get_fertilization_code($lokasi, "Fosetil-Al", $data["lokasi"]["kebun"]),
				'Sarineb' => $this->DataMaster_model->get_fertilization_code($lokasi, "Sarineb", $data["lokasi"]["kebun"]),
				'Folirfos' => $this->DataMaster_model->get_fertilization_code($lokasi, "Folirfos", $data["lokasi"]["kebun"]),
				'H3PO3' => $this->DataMaster_model->get_fertilization_code($lokasi, "H3PO3", $data["lokasi"]["kebun"]),
				'Rabas' => $this->DataMaster_model->get_fertilization_code($lokasi, "Rabas", $data["lokasi"]["kebun"]),
				'Ratgone' => $this->DataMaster_model->get_fertilization_code($lokasi, "Ratgone", $data["lokasi"]["kebun"]),

				//Surfaktan
				'Indostik' => $this->DataMaster_model->get_fertilization_code($lokasi, "Indostik", $data["lokasi"]["kebun"]),
				'Organosilicon' => $this->DataMaster_model->get_fertilization_code($lokasi, "Organosilicon", $data["lokasi"]["kebun"]),

				//Forcing
				'Ethylene' => $this->DataMaster_model->get_fertilization_code($lokasi, "Ethylene", $data["lokasi"]["kebun"]),
				'Ethepon' => $this->DataMaster_model->get_fertilization_code($lokasi, "Ethepon", $data["lokasi"]["kebun"]),
				'Kaolin' => $this->DataMaster_model->get_fertilization_code($lokasi, "Kaolin", $data["lokasi"]["kebun"])
			);
			$data["tonase_panen"] = array(
				'alami' => $this->TonasePanen_model->get_tonase_panen_code($lokasi, "Alami", $data["lokasi"]["kebun"]),
				'manual' => $this->TonasePanen_model->get_tonase_panen_code($lokasi, "Manual", $data["lokasi"]["kebun"]),
				'reguler' => $this->TonasePanen_model->get_tonase_panen_code($lokasi, "Reguler", $data["lokasi"]["kebun"])
			);
			$data["group_cost"] = array(
				'labour' => $this->GroupCost_model->get_group_cost_code_jenis($lokasi, "Labour", $data["lokasi"]["kebun"]),
				'charge' => $this->GroupCost_model->get_group_cost_code_jenis($lokasi, "Charge", $data["lokasi"]["kebun"]),
				'material' => $this->GroupCost_model->get_group_cost_code_jenis($lokasi, "Material", $data["lokasi"]["kebun"]),
				'bibit' => $this->GroupCost_model->get_group_cost_code_jenis($lokasi, "Bibit", $data["lokasi"]["kebun"]),
				'total' => $this->GroupCost_model->get_group_cost_all_code($lokasi, $data["lokasi"]["kebun"])
			);
			$ZN01_real = $this->DataMaster_model->get_real_actual_code_zn01_zn04($lokasi, substr($data['lokasi']['status'], 0, 4), 'ZN01');
			$ZN03_real = $this->DataMaster_model->get_real_actual_code_zn03($lokasi, substr($data['lokasi']['status'], 0, 4));
			$ZN04_real = $this->DataMaster_model->get_real_actual_code_zn01_zn04($lokasi, substr($data['lokasi']['status'], 0, 4), 'ZN04');
			$data["ZN03_hko"] = $this->DataMaster_model->get_hko_ZN03_code($lokasi, $data["lokasi"]["kebun"]);
			$data['cek_ZN03'] = 1;
			if($ZN01_real['total'] == NULL){
				$ZN01_real = $this->DataMaster_model->get_element_cost_code_jenis($lokasi, "ZN01", $data["lokasi"]["kebun"]);
			}
			if($ZN03_real['total'] == NULL){
				$ZN03_real = $this->DataMaster_model->get_element_cost_code_jenis($lokasi, "ZN03", $data["lokasi"]["kebun"]);
				$data['cek_ZN03'] = 0;
			}
			if($ZN04_real['total'] == NULL){
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
			for ($i=1; $i <= 15 ; $i++) {
				if($i < 10){
					if($i == 3 && $data['cek_ZN03'] == 1){
						$data['total_real'] += ($ZN03_real['total'] * $ZN03_real['luas']);
					}
					else{
						$data['total_real'] += ($data["element_cost_real"]['ZN0'.$i]['total']);
					}
				}
				else{
					$data['total_real'] += ($data["element_cost_real"]['ZN'.$i]['total']);
				}
			}
			$data["hko"] = array(
				'ZN01' => $this->DataMaster_model->get_hko_code_jenis($lokasi, "ZN01", $data["lokasi"]["kebun"]),
				'ZN02' => $this->DataMaster_model->get_hko_code_jenis($lokasi, "ZN02", $data["lokasi"]["kebun"]),
				'ZN03' => $this->DataMaster_model->get_hko_code_jenis($lokasi, "ZN03", $data["lokasi"]["kebun"]),
				'ZN04' => $this->DataMaster_model->get_hko_code_jenis($lokasi, "ZN04", $data["lokasi"]["kebun"]),
				'ZN05' => $this->DataMaster_model->get_hko_code_jenis($lokasi, "ZN05", $data["lokasi"]["kebun"]),
				'ZN06' => $this->DataMaster_model->get_hko_code_jenis($lokasi, "ZN06", $data["lokasi"]["kebun"]),
				'ZN07' => $this->DataMaster_model->get_hko_code_jenis($lokasi, "ZN07", $data["lokasi"]["kebun"]),
				'ZN08' => $this->DataMaster_model->get_hko_code_jenis($lokasi, "ZN08", $data["lokasi"]["kebun"]),
				'ZN09' => $this->DataMaster_model->get_hko_code_jenis($lokasi, "ZN09", $data["lokasi"]["kebun"]),
				'ZN10' => $this->DataMaster_model->get_hko_code_jenis($lokasi, "ZN10", $data["lokasi"]["kebun"]),
				'ZN11' => $this->DataMaster_model->get_hko_code_jenis($lokasi, "ZN11", $data["lokasi"]["kebun"]),
				'ZN12' => $this->DataMaster_model->get_hko_code_jenis($lokasi, "ZN12", $data["lokasi"]["kebun"]),
				'ZN13' => $this->DataMaster_model->get_hko_code_jenis($lokasi, "ZN13", $data["lokasi"]["kebun"]),
				'ZN14' => $this->DataMaster_model->get_hko_code_jenis($lokasi, "ZN14", $data["lokasi"]["kebun"]),
				'ZN15' => $this->DataMaster_model->get_hko_code_jenis($lokasi, "ZN15", $data["lokasi"]["kebun"])
			);

			$data["standart_panen"] = array(
				'B' => $this->Produksi_model->get_standart_produksi_code('B'),
				'S' => $this->Produksi_model->get_standart_produksi_code('S'),
				'K' => $this->Produksi_model->get_standart_produksi_code('K')
			);
		  if($data['produksi'] == NULL){
		    if($data['lokasi']['tgl_panen_rencana'] != NULL){
		      $tgl_panen = $data['lokasi']['tgl_panen_rencana'];
		    }
		    else{
					if($data["lokasi"]["tgl_mulai_rawat"] != NULL){
			      if(substr($data['lokasi']['status'], 0, 4) != 'NSSC'){
			        $tgl_panen = date('Y-m-d', strtotime($data["lokasi"]["tgl_mulai_rawat"]) + $data['standart_panen'][substr($data['lokasi']['bibit'], 6, 1)]['bulan'] * 30.4583333333333 * 86400);
			      }
			      else{
			        $tgl_panen = date('Y-m-d', strtotime($data["lokasi"]["tgl_mulai_rawat"]) + 13 * 30.5 * 86400);
			      }

				    if(date('Y', strtotime($tgl_panen)) == date('Y', strtotime($data['konstanta']['nilai']))){
				      $tgl_panen = date('Y-m-d', strtotime($tgl_panen) + (86400 * 91.5));
				    }
					}
					else{
						$tgl_panen = NULL;
					}
		    }
		  }
		  else{
		    $tgl_panen = $data['produksi']['real_dan_sisa_rencana_tgl_selesai_panen'];
		  }
			$tgl_panen = date('Y-m-d', strtotime($tgl_panen));
			if(date('Y', strtotime($tgl_panen)) == date('Y', strtotime($data['konstanta']['nilai']))){
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
			if($data["lokasi"]["status"] == 'NSFC'){
				$kelas = substr($data["lokasi"]['bibit'],6,1);
			}
			else{
				$kelas = 'NSSC';
			}
			$data['std_material'] = $this->StdUnsurUmur_model->get_std_metarial($kelas, ceil((strtotime($data["konstanta"]["nilai"]) - strtotime($data["lokasi"]["tgl_mulai_rawat"])) / 86400 / 30.4583333333333));

			$data["standart_panen"] = array(
				'B' => $this->Produksi_model->get_standart_produksi_code('B'),
				'S' => $this->Produksi_model->get_standart_produksi_code('S'),
				'K' => $this->Produksi_model->get_standart_produksi_code('K')
			);
			$tgl_forcing = date('Y-m-d', strtotime($tgl_panen) - (152 * 86400));
			$data["timeline_perawatan"] = array(
				'bk_st' => $this->DataMaster_model->get_bk_st($lokasi, $data["histori_lokasi_bk"]["tgl_perubahan_status"], $data["histori_lokasi_st"]["tgl_perubahan_status"], $data["lokasi"]["kebun"]),
				'st_perawatan' => $this->DataMaster_model->get_st_perawatan($lokasi, $data["histori_lokasi_st"]["tgl_perubahan_status"], $data["lokasi"]["tgl_mulai_rawat"], $data["lokasi"]["kebun"]),
				'perawatan_forcing' => $this->DataMaster_model->get_perawatan_forcing($lokasi, $data["lokasi"]["tgl_mulai_rawat"], $tgl_forcing, substr($data['lokasi']['status'], 0, 4), $data["lokasi"]["kebun"]),
				'forcing_harvest' => $this->DataMaster_model->get_forcing_harvest($lokasi, $tgl_forcing, $tgl_panen, substr($data['lokasi']['status'], 0, 4), $data["lokasi"]["kebun"])
			);
			$data["total_charge"] = array(
				'charge' => $this->DataMaster_model->get_total_charge_code($lokasi, 'Charge', $data["lokasi"]["kebun"]),
				'material' => $this->DataMaster_model->get_total_charge_code($lokasi, 'Material', $data["lokasi"]["kebun"]),
				'labour' => $this->DataMaster_model->get_total_charge_code($lokasi, 'Labour', $data["lokasi"]["kebun"]),
				'others' => $this->DataMaster_model->get_total_charge_code($lokasi, 'Others', $data["lokasi"]["kebun"])
			);
			$data["timeline_landprep"] = $this->DataMaster_model->get_timeline_landprep_code($lokasi, $data["lokasi"]["kebun"]);

			$data["berat_tanaman"] = $this->BeratTanaman_model->get_berat_tanaman_code_desc($lokasi);
			$data["pengamatan_daun"] = $this->PengamatanDaun_model->get_pengamatan_daun_code_asc($lokasi);
			$data["pengamatan_persen_bunga"] = $this->PengamatanPersenBunga_model->get_pengamatan_persen_bunga_code($lokasi);
			$data["spray_mekanis"] = $this->Fertilization_model->get_fertilization_code($lokasi);
			$data["weed_control"] = $this->WeedControl_model->get_weed_control_code($lokasi);
			$data["weed_manual"] = $this->DataMaster_model->get_weed_manual_code($lokasi, $data["lokasi"]["kebun"]);
			$data["plant_pest_control"] = $this->PlantPestControl_model->get_plant_pest_control_code($lokasi);
			$data["forcing"] = $this->Forcing_model->get_forcing_code($lokasi, $data["lokasi"]["kebun"]);
			$data["irrigation"] = $this->Irrigation_model->get_irrigation_code($lokasi);
			$data["tonase_panen_total"] = $this->TonasePanen_model->get_tonase_panen_total_code($lokasi, $data["lokasi"]["kebun"]);
			$data["histori_panen"] = $this->HistoriPanen_model->get_histori_panen_code($lokasi);
			$data["hpp"] = $this->HistoriPanen_model->get_hpp_code($lokasi);
			$data["element_cost"] = $this->ElementCost_model->get_element_cost_all();
			$data["target"] = $this->Target_model->get_target_lokasi($data["lokasi"]["status"]);
			$data["jalan_saluran"] = $this->DataMaster_model->get_jalan_saluran_code($lokasi, $data["lokasi"]["kebun"]);

			$data["forecast_overhead"] = array(
				'ZN04' => $this->ForecastOverhead_model->get_forecast_overhead_code("ZN04", substr($data["lokasi"]["status"], 0, 4), date('n', strtotime($tgl_panen))),
				'ZN05' => $this->ForecastOverhead_model->get_forecast_overhead_code("ZN05", substr($data["lokasi"]["status"], 0, 4), date('n', strtotime($tgl_panen))),
				'ZN06' => $this->ForecastOverhead_model->get_forecast_overhead_code("ZN06", substr($data["lokasi"]["status"], 0, 4), date('n', strtotime($tgl_panen))),
				'ZN10' => $this->ForecastOverhead_model->get_forecast_overhead_code("ZN10", substr($data["lokasi"]["status"], 0, 4), date('n', strtotime($tgl_panen))),
				'ZN13' => $this->ForecastOverhead_model->get_forecast_overhead_code("ZN13", substr($data["lokasi"]["status"], 0, 4), date('n', strtotime($tgl_panen)))
			);
			//Rata-rata Berat Tanaman
			$rata_berat_tanaman_sebelum = $this->BeratTanaman_model->get_rata_berat_tanaman($lokasi, 'F-');
			$cek_isi = 0;
			$berat_tanaman = '';
			foreach ($rata_berat_tanaman_sebelum as $row) {
				if($cek_isi == 0){
					$berat_tanaman = $row->berat_tanaman;
				}
				else{
					$berat_tanaman = $row->berat_tanaman.', '.$berat_tanaman;
				}
				$cek_isi++;
			}
			if($cek_isi < 7){
				while($cek_isi < 7){
					$cek_isi++;
					$berat_tanaman = $berat_tanaman.', ';
				}
			}
			$rata_berat_tanaman_f = $this->BeratTanaman_model->get_rata_berat_tanaman($lokasi, 'F');
			$cek_isi = 0;
			foreach ($rata_berat_tanaman_f as $row) {
				$berat_tanaman = $berat_tanaman.', '.$row->berat_tanaman;
				$cek_isi++;
			}
			if($cek_isi < 1){
				while($cek_isi < 1){
					$cek_isi++;
					$berat_tanaman = $berat_tanaman.', ';
				}
			}
			$rata_berat_tanaman_sesudah = $this->BeratTanaman_model->get_rata_berat_tanaman($lokasi, 'F+');
			$cek_isi = 0;
			foreach ($rata_berat_tanaman_sesudah as $row) {
				$berat_tanaman = $berat_tanaman.', '.$row->berat_tanaman;
				$cek_isi++;
			}
			if($cek_isi < 2){
				while($cek_isi < 2){
					$cek_isi++;
					$berat_tanaman = $berat_tanaman.', ';
				}
			}
			$data['rata_berat_tanaman'] = $berat_tanaman;
			$std_biaya_umur = $this->StdBiayaUmur_model->get_biaya_umur_code($lokasi, $data["lokasi"]["kebun"]);
			$biaya_umur = array();
			$biaya_umur_perawatan = 0;
			$biaya_umur_sesudah = 0;
			$cek_umur = 0;
			foreach($std_biaya_umur as $sbu){
				if($sbu->umur < 0){
					$biaya_umur_perawatan += $sbu->biaya_realisasi;
				}
				else if($sbu->umur > 20){
					$biaya_umur_sesudah += $sbu->biaya_realisasi;
				}
				else{
					$biaya_umur_perawatan += $sbu->biaya_realisasi;
					array_push($biaya_umur, $biaya_umur_perawatan);
					$cek_umur++;
				}
			}
			if($cek_umur <= 20){
				while ($cek_umur <= 20) {
					array_push($biaya_umur, 0);
					$cek_umur++;
				}
			}
			if($biaya_umur_sesudah != NULL){
				array_push($biaya_umur, $biaya_umur_perawatan + $biaya_umur_sesudah);
			}
			else{
				array_push($biaya_umur, '0');
			}
			$data['biaya_umur'] = $biaya_umur;
			$data['std_biaya_umur'] = $this->StdBiayaUmur_model->get_std_biaya_umur_code(substr($data["lokasi"]["status"], 0, 4));
			$hs = array(
				'T14' => $this->HistoriSiram_model->get_histori_siram_code($lokasi, '2014'),
				'T15' => $this->HistoriSiram_model->get_histori_siram_code($lokasi, '2015'),
				'T16' => $this->HistoriSiram_model->get_histori_siram_code($lokasi, '2016'),
				'T17' => $this->HistoriSiram_model->get_histori_siram_code($lokasi, '2017'),
				'T18' => $this->HistoriSiram_model->get_histori_siram_code($lokasi, '2018')
			);
			$data['histori_siram'] = $hs;
			$data['std_histori_siram'] = $this->HistoriSiram_model->get_std_histori_siram_code(substr($data["lokasi"]["kebun"], 0, 3));
			$sebelum_panen_alami = array();
			$sebelum_panen_manual = array();
			$sebelum_panen_kolekting = array();
			$sebelum_panen_mekanis = array();
			$sebelum_panen = array(
				'alami' => $this->TonasePanen_model->get_tonase_sebelum_panen_code($lokasi, "Alami", $data["lokasi"]["kebun"]),
				'manual' => $this->TonasePanen_model->get_tonase_sebelum_panen_code($lokasi, "Manual", $data["lokasi"]["kebun"]),
				'kolekting' => $this->TonasePanen_model->get_tonase_sebelum_panen_code($lokasi, "Kolekting", $data["lokasi"]["kebun"]),
				'mekanis' => $this->TonasePanen_model->get_tonase_sebelum_panen_code($lokasi, "Mekanis", $data["lokasi"]["kebun"])
			);
			foreach ($sebelum_panen['alami'] as $sp_alami) {
				$sebelum_panen_alami[$sp_alami->umur_sebelum_panen] = $sp_alami->produksi_ton;
			}
			foreach ($sebelum_panen['manual'] as $sp_manual) {
				$sebelum_panen_manual[$sp_manual->umur_sebelum_panen] = $sp_manual->produksi_ton;
			}
			foreach ($sebelum_panen['kolekting'] as $sp_kolekting) {
				$sebelum_panen_kolekting[$sp_kolekting->umur_sebelum_panen] = $sp_kolekting->produksi_ton;
			}
			foreach ($sebelum_panen['mekanis'] as $sp_mekanis) {
				$sebelum_panen_mekanis[$sp_mekanis->umur_sebelum_panen] = $sp_mekanis->produksi_ton;
			}
			$data['sebelum_panen'] = array(
				'alami' => $sebelum_panen_alami,
				'manual' => $sebelum_panen_manual,
				'kolekting' => $sebelum_panen_kolekting,
				'mekanis' => $sebelum_panen_mekanis
			);
			$data['koreksi'] = $this->Koreksi_model->get_koreksi_code($lokasi);
			$data['tgl_irrigation'] = array(
				'start' => $this->Konstanta_model->get_konstanta_code('TGL_TARIK_DATA'),
				'finish' => $this->Konstanta_model->get_konstanta_code('TGL_IRRIGATION_FINISH')
			);
			$data['tgl_irrigation_t1'] = array(
				'start' => $this->Konstanta_model->get_konstanta_code('TGL_IRRIGATION_START_T1'),
				'finish' => $this->Konstanta_model->get_konstanta_code('TGL_IRRIGATION_FINISH_T1')
			);

			$this->load->library('PHPExcel');
			$this->load->view('raport/export_lokasi_labita', $data);
		}
		else{
			header( "Location: /PIS");
		}
	}
}
