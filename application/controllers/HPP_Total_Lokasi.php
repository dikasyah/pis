<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HPP_Total_Lokasi extends CI_Controller {

	function __construct(){
		parent :: __construct();

		$this->load->model('User_model');
		$this->load->model('Konstanta_model');
		$this->load->model('Coordinate_model');
		$this->load->model('Lokasi_model');
		$this->load->model('Wilayah_model');
		$this->load->model('Performance_model');
		$this->load->model('ElementCost_model');
		$this->load->model('HistoriLokasi_model');
		$this->load->model('Produksi_model');
		$this->load->model('StdYield_model');
		$this->load->model('DataMaster_model');
		$this->load->model('GroupCost_model');
		$this->load->model('StdBiayaUmur_model');
		$this->load->model('GalleryLokasi_model');
		$this->load->model('Noted_model');
		$this->load->model('PopulasiAwal_model');
		$this->load->model('ProduksiPanen_model');
		$this->load->model('Drainase_model');
		$this->load->model('PengamatanTanah_model');
		$this->load->model('HistoriPanen_model');
		$this->load->model('TonasePanen_model');
		$this->load->model('PengamatanDaun_model');
		$this->load->model('BeratTanaman_model');
		$this->load->model('PengamatanPersenBunga_model');
		$this->load->model('HistoriSiram_model');
		$this->load->model('Irrigation_model');
		$this->load->model('StdUnsurUmur_model');
		$this->load->model('Fertilization_model');
		$this->load->model('WeedControl_model');
		$this->load->model('PlantPestControl_model');
		$this->load->model('Forcing_model');
		$this->load->model('PerlocationHPP_model');
		$this->load->model('Material_model');
		$this->load->model('Activity_model');
	}

	public function lokasi()
	{
		session_start();
		if(isset($_SESSION['username'])){
			$page = $this->input->get('page');
			$lokasi = $this->input->get('lokasi');
			$data['tgl_panen'] = $this->input->get('tgl_panen');
			$data['account'] = $this->User_model->get_user_index($_SESSION['index']);
			$data["konstanta"] = $this->Konstanta_model->get_konstanta_code("TGL_TARIK_DATA");
			$data["YEAR_BASE"] = $this->Konstanta_model->get_konstanta_code("YEAR_BASE");
			$data["produksi"] = $this->ProduksiPanen_model->get_produksi_panen($lokasi, $data['tgl_panen']);
			$data['tgl_panen'] = $data["produksi"]["real_dan_sisa_rencana_tgl_selesai_panen"];
			$data["tgl_panen_all"] = $this->ProduksiPanen_model->get_produksi_tgl_panen($lokasi);

			$data["wilayah"] = $this->Wilayah_model->get_wilayah_code($data["produksi"]["wilayah"]);
			$data["histori_lokasi_nssc_nsfc"] = $this->HistoriLokasi_model->get_histori_lokasi_code_nssc_nsfc($lokasi);

      $data["tgl_rencana_forcing"] = date('Y-m-d', strtotime($data["produksi"]["real_dan_sisa_rencana_tgl_selesai_panen"]) - (((365.5 / 12) * 5) * 86400));

			$data['status'] = $data["produksi"]["status"];
      $data['tonase'] = $data["produksi"]["real_dan_sisa_rencana_tonase"];
      $data['luas'] = $data["produksi"]["real_dan_sisa_rencana_luas"];
      $data['yield'] = $data["produksi"]["real_dan_sisa_rencana_yield"];

			$date1 = round(strtotime($data["produksi"]["real_dan_sisa_rencana_tgl_selesai_panen"]) / 86400);
			$date2 = round(strtotime($data["produksi"]["tgl_awal_perawatan"]) / 86400);

			$data['umur'] = ceil(($date1-$date2) / 30.4583333333333);

			$data["histori_lokasi_bk"] = $this->HistoriLokasi_model->get_histori_lokasi_code_bk($lokasi);
			$data["histori_lokasi_st"] = $this->HistoriLokasi_model->get_histori_lokasi_code_st($lokasi);

			$data['page'] = $page;
			$this->load->view('HPP_Total/include/header');
			switch ($page) {
				//Dashboard
				default:
				case 'HOME':
					$data['group_cost'] = $this->input->get("group_cost");
					$data['element_cost'] = $this->input->get("element_cost");
					$data['coordinate'] = $this->Coordinate_model->get_coordinate_hpp_lokasi($lokasi, substr($data['tgl_panen'], 0, 4));

					if($data['element_cost'] == NULL){
						$data['element_cost'] = 'Ha';
					}

					$data["element_cost_real"] = $this->ProduksiPanen_model->get_element_cost_code($lokasi, $data["produksi"]["kebun"], substr($data['tgl_panen'], 0, 7));
					$data['total_real'] = 0;
					for ($i=4; $i <= 14 ; $i++) {
						if($i < 10){
							$data['total_real'] += ($data["element_cost_real"]['ZN0'.$i]);
						}
						else{
							$data['total_real'] += ($data["element_cost_real"]['ZN'.$i]);
						}
					}
					$data["element_cost_all"] = $this->ElementCost_model->get_element_cost_panen(substr($data['tgl_panen'], 0, 4));
					$data["hpp"] = $this->PerlocationHPP_model->get_cost_panen_lokasi($lokasi, $data['status'], substr($data['tgl_panen'], 0, 4));

					//Group Cost
					if($data['group_cost'] == NULL){
						$data['group_cost'] = "Total";
					}

					if($data["produksi"]["status"] != 'NSSC'){
						$kelas = $data["produksi"]["kelas"];
					}
					else{
						$kelas = "NSSC";
					}

					$data['group_cost_total'] = $this->ProduksiPanen_model->get_group_cost_umur_total($lokasi, $data["produksi"]["kebun"], substr($data['tgl_panen'], 0, 7));
					$data['group_cost_std_total'] = $this->StdBiayaUmur_model->get_sbt_group_cost_real_total(date('Y', strtotime($data['tgl_panen'])), 30, $kelas);
					$data['group_cost_biaya'] = $this->ProduksiPanen_model->get_group_cost_umur($lokasi, $data["produksi"]["kebun"], $data["produksi"]["tgl_awal_perawatan"], $data['group_cost'], substr($data['tgl_panen'], 0, 7));

					$a = 1;
					while ($a <= 21) {
						$budget = $this->StdBiayaUmur_model->get_sbt_group_cost_real(date('Y', strtotime($data['tgl_panen'])), $a, $kelas, $data['group_cost']);
						$data["group_cost_std"][$a] = $budget['biaya_realisasi'];
						$a++;
					}

					$data["timeline_perawatan"] = array(
						'BK' => $this->ProduksiPanen_model->get_bk_st($lokasi, $data["histori_lokasi_bk"]["tgl_perubahan_status"], $data["histori_lokasi_st"]["tgl_perubahan_status"], $data["produksi"]["kebun"], substr($data['tgl_panen'], 0, 7)),
						'ST' => $this->ProduksiPanen_model->get_st_perawatan($lokasi, $data["histori_lokasi_st"]["tgl_perubahan_status"], $data["produksi"]["tgl_awal_perawatan"], $data["produksi"]["kebun"], substr($data['tgl_panen'], 0, 7)),
						'Pre' => $this->ProduksiPanen_model->get_perawatan_forcing($lokasi, $data["produksi"]["tgl_awal_perawatan"], $data["tgl_rencana_forcing"], $data["produksi"]["status"], $data["produksi"]["kebun"], substr($data['tgl_panen'], 0, 7)),
						'Post' => $this->ProduksiPanen_model->get_forcing_harvest($lokasi, $data["tgl_rencana_forcing"], $data["produksi"]["real_dan_sisa_rencana_tgl_selesai_panen"], $data["produksi"]["status"], $data["produksi"]["kebun"], substr($data['tgl_panen'], 0, 7))
					);

					$this->load->view('HPP_Total/lokasi', $data);
				break;
				//Gallery Lokasi
				case 'GALO':
					$data['gallery'] = array(
						'peta' => $this->GalleryLokasi_model->get_peta_lokasi_code($lokasi),
						'land_prep' => $this->GalleryLokasi_model->get_gallery_lokasi_code_hpp($lokasi, 'Land Preparation', substr($data['tgl_panen'], 0, 4)),
						'planting' => $this->GalleryLokasi_model->get_gallery_lokasi_code_hpp($lokasi, 'Planting', substr($data['tgl_panen'], 0, 4)),
						'pre_f' => $this->GalleryLokasi_model->get_gallery_lokasi_code_hpp($lokasi, 'PM Pre Forcing', substr($data['tgl_panen'], 0, 4)),
						'post_f' => $this->GalleryLokasi_model->get_gallery_lokasi_code_hpp($lokasi, 'PM Post Forcing', substr($data['tgl_panen'], 0, 4)),
						'harvest' => $this->GalleryLokasi_model->get_gallery_lokasi_code_hpp($lokasi, 'Harvesting', substr($data['tgl_panen'], 0, 4)),
						'note' => $this->Noted_model->get_note_gallery($lokasi)
					);
					$data["note_lokasi"] = $this->Noted_model->get_detil_lokasi_note_code($lokasi);
					$data["note_pic"] = $this->Noted_model->get_pic_code($data["note_lokasi"]['pg'], $data["note_lokasi"]['wilayah'], $_SESSION['index']);

					$this->load->view('HPP_Total/lokasi_GALO', $data);
				break;
				//Detail SPK
				case 'DSPK':
					$data['detail_spk'] = $this->Lokasi_model->get_detil_spk_sbt_panen($lokasi, 'P'.substr($data["produksi"]["wilayah"], 1, 2), substr($data['tgl_panen'], 0, 7));

					$this->load->view('HPP_Total/lokasi_DSPK', $data);
				break;
				//Land Preparation
				case 'CTLP':
					$data["pengamatan_populasi"] = $this->PopulasiAwal_model->get_polulasi_tanam_lokasi($lokasi);
					$data["histori_lokasi_sebelumnya"] = $this->HistoriLokasi_model->get_histori_lokasi_code_before_panen($lokasi, $data['produksi']['real_dan_sisa_rencana_tgl_selesai_panen']);
					$data["drainase"] = $this->Drainase_model->get_drainase_code($lokasi);

					$data["biaya_tanam"] = array(
						'bibit' => $this->ProduksiPanen_model->get_biaya_tanam_code_jenis($lokasi, "Bibit", $data["produksi"]["kebun"], substr($data['tgl_panen'], 0, 7)),
						'sulam' => $this->ProduksiPanen_model->get_biaya_tanam_code_jenis($lokasi, "Sulam", $data["produksi"]["kebun"], substr($data['tgl_panen'], 0, 7)),
						'tanam' => $this->ProduksiPanen_model->get_biaya_tanam_code_jenis($lokasi, "Tanam", $data["produksi"]["kebun"], substr($data['tgl_panen'], 0, 7)),
						'ecer' => $this->ProduksiPanen_model->get_biaya_tanam_code_jenis($lokasi, "Ecer", $data["produksi"]["kebun"], substr($data['tgl_panen'], 0, 7)),
						'transport' => $this->ProduksiPanen_model->get_biaya_tanam_code_jenis($lokasi, "Transport", $data["produksi"]["kebun"], substr($data['tgl_panen'], 0, 7)),
						'others' => $this->ProduksiPanen_model->get_biaya_tanam_code_jenis($lokasi, "Others", $data["produksi"]["kebun"], substr($data['tgl_panen'], 0, 7)),
						'jumlah_sulam' => $this->ProduksiPanen_model->get_jumlah_sulam_code($lokasi, $data["produksi"]["kebun"], substr($data['tgl_panen'], 0, 7)),
						'index_tk' => $this->ProduksiPanen_model->get_index_tk_code($lokasi, $data["produksi"]["kebun"], substr($data['tgl_panen'], 0, 7))
					);

					$data["pengamatan_tanah"] = $this->PengamatanTanah_model->get_pengamatan_tanah_code_desc($lokasi);
					$data["jalan_saluran"] = $this->ProduksiPanen_model->get_jalan_saluran_code($lokasi, $data["produksi"]["kebun"], substr($data['tgl_panen'], 0, 7));
					$data["timeline_landprep"] = $this->ProduksiPanen_model->get_timeline_landprep_code($lokasi, $data["produksi"]["kebun"], substr($data['tgl_panen'], 0, 7));

					$data["total_charge"] = array(
						'charge' => $this->ProduksiPanen_model->get_total_charge_code($lokasi, 'Charge', $data["produksi"]["kebun"], substr($data['tgl_panen'], 0, 7)),
						'material' => $this->ProduksiPanen_model->get_total_charge_code($lokasi, 'Material', $data["produksi"]["kebun"], substr($data['tgl_panen'], 0, 7)),
						'labour' => $this->ProduksiPanen_model->get_total_charge_code($lokasi, 'Labour', $data["produksi"]["kebun"], substr($data['tgl_panen'], 0, 7)),
						'others' => $this->ProduksiPanen_model->get_total_charge_code($lokasi, 'Others', $data["produksi"]["kebun"], substr($data['tgl_panen'], 0, 7))
					);

					$data["element_cost_real"] = $this->ProduksiPanen_model->get_element_cost_code($lokasi, $data["produksi"]["kebun"], substr($data['tgl_panen'], 0, 7));

					$this->load->view('HPP_Total/lokasi_CTLP', $data);
				break;
				//Plant Maintenance Observation
				case 'CTP1':
					$data["pengamatan_daun"] = $this->PengamatanDaun_model->get_pengamatan_daun_code_asc($lokasi);
					$data['berat_tanaman'] = $this->BeratTanaman_model->get_berat_tanaman_code_desc($lokasi);
					$data["persen_bunga"] = $this->PengamatanPersenBunga_model->get_pengamatan_persen_bunga_code($lokasi);

					$data['std_forcing_panen'] = $this->Konstanta_model->get_std_forcing_panen($data['produksi']['tgl_awal_perawatan'], $data['produksi']['kelas']);
					$data["berat_tanaman_f"] = $this->BeratTanaman_model->get_berat_tanaman_forcing($lokasi, $data["tgl_rencana_forcing"]);

					if(substr($data['produksi']['status'], 2, 2) != 'NSSC'){
						$std_berat_tanaman = $this->BeratTanaman_model->get_std_berat_tanaman($data['produksi']['varietas'], $data['produksi']['jenis'], $data['produksi']['kelas']);
						if($std_berat_tanaman == NULL){
							$std_berat_tanaman = $this->BeratTanaman_model->get_std_berat_tanaman('GP3', 'S', 'S');
						}
						$jarak_forcing = (floor(((strtotime($data['std_forcing_panen']['tgl_forcing']) - strtotime($data["tgl_rencana_forcing"])) / 86400) / 30.4583333333333));
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
					$data["persen_bunga"] = $this->PengamatanPersenBunga_model->get_pengamatan_persen_bunga_code($lokasi);

					$this->load->view('HPP_Total/lokasi_CTP1', $data);
				break;
				//Plant Maintenance Material
				case 'CTP2':
					$data['std_material'] = $this->StdUnsurUmur_model->get_std_metarial($data['produksi']['kelas'], 25);
					$data['real_fertilizer'] = $this->Fertilization_model->get_unsur_fertilization_panen($lokasi, $data['produksi']['kebun'], substr($data['tgl_panen'], 0, 7));
					$data["spray_mekanis"] = $this->Fertilization_model->get_fertilization_spray_panen($lokasi, $data['produksi']['kebun'], substr($data['tgl_panen'], 0, 7));

					$data['real_herbicide'] = $this->WeedControl_model->get_unsur_weed_control_panen($lokasi, $data['produksi']['kebun'], substr($data['tgl_panen'], 0, 7));
					$data["booster"] = $this->WeedControl_model->get_weed_control_booster_panen($lokasi, $data['produksi']['kebun'], substr($data['tgl_panen'], 0, 7));

					$data['real_ppc'] = $this->PlantPestControl_model->get_unsur_plant_pest_control_panen($lokasi, $data['produksi']['kebun'], substr($data['tgl_panen'], 0, 7));

					$data['real_others'] = $this->Fertilization_model->get_unsur_others_panen($lokasi, $data['produksi']['kebun'], substr($data['tgl_panen'], 0, 7));
					$data["forcing"] = $this->Forcing_model->get_forcing_code_panen($lokasi, $data['produksi']['kebun'], substr($data['tgl_panen'], 0, 7));
					$data["weeding_manual"] = $this->WeedControl_model->get_weed_control_weeding_man_panen($lokasi, $data['produksi']['kebun'], substr($data['tgl_panen'], 0, 7));

					$this->load->view('HPP_Total/lokasi_CTP2', $data);
				break;
				//Plant Maintenance Irrigation
				case 'CTP3':
					$data['pbs'] = $this->input->get('pbs');
					$data["irrigation"] = $this->Irrigation_model->get_irrigation_code_hpp($lokasi, $data['produksi']['tgl_awal_perawatan'], $data['produksi']['real_dan_sisa_rencana_tgl_selesai_panen']);
					$data['histori_siram'] = array(
						'T14' => $this->HistoriSiram_model->get_histori_siram_code($lokasi, '2014'),
						'T15' => $this->HistoriSiram_model->get_histori_siram_code($lokasi, '2015'),
						'T16' => $this->HistoriSiram_model->get_histori_siram_code($lokasi, '2016'),
						'T17' => $this->HistoriSiram_model->get_histori_siram_code($lokasi, '2017'),
						'T18' => $this->HistoriSiram_model->get_histori_siram_code($lokasi, '2018')
					);
					$data['std_histori_siram'] = $this->HistoriSiram_model->get_std_histori_siram_code($data["produksi"]["wilayah"]);
					$data['tahun_siram'] = $this->HistoriSiram_model->get_siram_tgl_panen($lokasi, $data["produksi"]["kebun"], substr($data['tgl_panen'], 0, 4));

					if($data['pbs'] == NULL){
						$a = 0;
						$cek_bulan = array();
						foreach ($data['tahun_siram'] as $bs) {
							$cek_bulan[$a] = $bs->tanggal;
						}
						$data['pbs'] = end($cek_bulan);
					}

					// echo "<pre>";
					// var_dump($data['pbs']);
					// echo "</pre>";
					// die();

					$data_siram_tahun = $this->HistoriSiram_model->get_siram_tahun_panen($lokasi, substr($data['tgl_panen'], 0, 4), $data['pbs']);

					foreach ($data_siram_tahun as $dst) {
						$data['data_siram_tahun'][$dst->bulan] = $dst->luas;
					}

					$this->load->view('HPP_Total/lokasi_CTP3', $data);
				break;
				//Production
				case 'CTPR':
					$data['category'] = $this->input->get('category');
					$data['type'] = $this->input->get('type');
					if($data['category'] == NULL){
						$data['category'] = "Total";
					}
					if($data['type'] == NULL){
						$data['type'] = "Total";
					}
					$data["histori_panen"] = $this->HistoriPanen_model->get_histori_panen_code($lokasi);

					$data['tonase_panen'] = $this->TonasePanen_model->get_tonase_hpp($lokasi, $data["produksi"]["kebun"], substr($data['tgl_panen'], 0, 7));
					$data['tonase_panen_category'] = $this->TonasePanen_model->get_tonase_category_hpp($lokasi, $data["produksi"]["kebun"], substr($data['tgl_panen'], 0, 7));
					$data['tonase_panen_umur'] = $this->TonasePanen_model->get_tonase_umur_hpp($lokasi, $data["produksi"]["kebun"], $data["produksi"]["real_dan_sisa_rencana_tgl_selesai_panen"], $data['category'], $data['type'], substr($data['tgl_panen'], 0, 7));

					$this->load->view('HPP_Total/lokasi_CTPR', $data);
				break;
			}
			$this->load->view('HPP_Total/include/footer');
		}
		else{
			header( "Location: /PIS/HPP_Total_Dashboard" );
		}
	}
	public function activity_detail(){
		session_start();
		if(isset($_SESSION['username'])){
			$lokasi = $this->input->get('lokasi');
			$data['element_cost'] = $this->input->get('ec');
			$data['page'] = $this->input->get('page');
			$data['subpage'] = $this->input->get('subpage');
			$data['tgl_panen'] = $this->input->get('tgl_panen');
			$data['account'] = $this->User_model->get_user_index($_SESSION['index']);
			$data["konstanta"] = $this->Konstanta_model->get_konstanta_code("TGL_TARIK_DATA");
			$data["YEAR_BASE"] = $this->Konstanta_model->get_konstanta_code("YEAR_BASE");
			$data["produksi"] = $this->ProduksiPanen_model->get_produksi_panen($lokasi, $data['tgl_panen']);
			$data['tgl_panen'] = $data["produksi"]["real_dan_sisa_rencana_tgl_selesai_panen"];
			$data["tgl_panen_all"] = $this->ProduksiPanen_model->get_produksi_tgl_panen($lokasi);

			$data["wilayah"] = $this->Wilayah_model->get_wilayah_code($data["produksi"]["wilayah"]);
			$data["histori_lokasi_nssc_nsfc"] = $this->HistoriLokasi_model->get_histori_lokasi_code_nssc_nsfc($lokasi);

      $data["tgl_rencana_forcing"] = date('Y-m-d', strtotime($data["produksi"]["real_dan_sisa_rencana_tgl_selesai_panen"]) - (((365.5 / 12) * 5) * 86400));

			$data['status'] = $data["produksi"]["status"];
      $data['tonase'] = $data["produksi"]["real_dan_sisa_rencana_tonase"];
      $data['luas'] = $data["produksi"]["real_dan_sisa_rencana_luas"];
      $data['yield'] = $data["produksi"]["real_dan_sisa_rencana_yield"];

			$date1 = round(strtotime($data["produksi"]["real_dan_sisa_rencana_tgl_selesai_panen"]) / 86400);
			$date2 = round(strtotime($data["produksi"]["tgl_awal_perawatan"]) / 86400);

			$data['umur'] = ceil(($date1-$date2) / 30.4583333333333);

			$data["histori_lokasi_bk"] = $this->HistoriLokasi_model->get_histori_lokasi_code_bk($lokasi);
			$data["histori_lokasi_st"] = $this->HistoriLokasi_model->get_histori_lokasi_code_st($lokasi);

			$this->load->view('HPP_Total/include/header');
			switch ($data['subpage']) {
				case 'SPMA':
					$data['material'] = $this->input->get('code');
					$cek_kata = explode('_', $data['material']);
					if(sizeof($cek_kata) > 1){
						$data['material'] = $cek_kata[0].' '.$cek_kata[1];
					}
					$data['material_all'] = $this->Material_model->get_master_material();
					$material = $this->Material_model->get_master_material_nama($data['material']);

					$data["detil_spk"] = $this->Material_model->get_detil_activity_material_panen($lokasi, $data["produksi"]["kebun"], $material['code'], substr($data['tgl_panen'], 0, 4));
					$data["unsur_real"] = $this->Material_model->get_material_unsur_panen($lokasi, $data["produksi"]["kebun"], $data["produksi"]['tgl_awal_perawatan'], $material['code'], substr($data['tgl_panen'], 0, 4));

					$a = 1;
					$data['jumlah_unsur'] = 0;
					while ($a <= 24) {
						$data['jumlah_unsur'] += $data["unsur_real"]['B'.$a];
						$a++;
					}

					$this->load->view('HPP_Total/detail_SPMA', $data);
				break;
				case 'SPSP':
					$data['tanggal'] = $this->input->get('tgl');
					$data['tgl_spray'] = $this->Activity_model->get_master_material_tgl_panen($lokasi, $data["produksi"]["kebun"], '1311131711', substr($data['tgl_panen'], 0, 4));
					$data["detil_spk"] = $this->Activity_model->get_detil_activity_tgl_panen($lokasi, $data["produksi"]["kebun"], $data['tanggal'], '1311131711', substr($data['tgl_panen'], 0, 4));
					$data["group_cost"] = $this->Activity_model->get_activity_group_cost_tgl_panen($lokasi, $data["produksi"]["kebun"], 'ZN05', '1311131711', $data['tanggal'], substr($data['tgl_panen'], 0, 4));

					$this->load->view('HPP_Total/detail_SPSP', $data);
				break;
				case 'SPBO':
					$data['tanggal'] = $this->input->get('tgl');
					$data['tgl_spray'] = $this->Activity_model->get_master_material_tgl_panen($lokasi, $data["produksi"]["kebun"], '1315131123', substr($data['tgl_panen'], 0, 4));
					$data["detil_spk"] = $this->Activity_model->get_detil_activity_tgl_panen($lokasi, $data["produksi"]["kebun"], $data['tanggal'], '1315131123', substr($data['tgl_panen'], 0, 4));
					$data["group_cost"] = $this->Activity_model->get_activity_group_cost_tgl_panen($lokasi, $data["produksi"]["kebun"], 'ZN06', '1315131123', $data['tanggal'], substr($data['tgl_panen'], 0, 4));

					$this->load->view('HPP_Total/detail_SPBO', $data);
				break;
				case 'SPEC':
					$data['element_cost'] = $this->input->get('ec');
					$data["element_cost_all"] = $this->ElementCost_model->get_element_cost_all();

					$data["detil_spk"] = $this->ElementCost_model->get_detil_element_cost_panen($lokasi, $data['element_cost'], $data["produksi"]["kebun"], substr($data['tgl_panen'], 0, 4));
					$data["group_cost"] = $this->ElementCost_model->get_element_cost_group_cost_panen($lokasi, $data["produksi"]["kebun"], $data['element_cost'], substr($data['tgl_panen'], 0, 4));

					$this->load->view('HPP_Total/detail_SPEC', $data);
				break;
			}
			$this->load->view('HPP_Total/include/footer');
		}
		else{
			header( "Location: /PIS/HPP_Total_Dashboard" );
		}
	}
}
