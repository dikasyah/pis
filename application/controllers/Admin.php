<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent :: __construct();

		$this->load->model('PlantationGroup_model');
		$this->load->model('Wilayah_model');
		$this->load->model('Lokasi_model');
		$this->load->model('ElementCost_model');
		$this->load->model('GroupCost_model');
		$this->load->model('Produksi_model');
		$this->load->model('StdYield_model');
		$this->load->model('Konstanta_model');
		$this->load->model('HistoriLokasi_model');
		$this->load->model('Drainase_model');
		$this->load->model('PengamatanTanah_model');
		$this->load->model('DataMaster_model');
		$this->load->model('BeratTanaman_model');
		$this->load->model('PengamatanDaun_model');
		$this->load->model('PengamatanPersenBunga_model');
		$this->load->model('Fertilization_model');
		$this->load->model('WeedControl_model');
		$this->load->model('PlantPestControl_model');
		$this->load->model('Forcing_model');
		$this->load->model('Irrigation_model');
		$this->load->model('TonasePanen_model');
		$this->load->model('HistoriPanen_model');
		$this->load->model('Forecast_model');
		$this->load->model('ForecastOverhead_model');
		$this->load->model('PopulasiAwal_model');
		$this->load->model('HPP_model');
		$this->load->model('StdBiayaUmur_model');
		$this->load->model('HistoriSiram_model');
		$this->load->model('StdUnsurUmur_model');
		$this->load->model('Performance_model');
		$this->load->model('Koreksi_model');
		$this->load->model('Target_model');

		$this->load->model('UpdateWilayah_model');
		$this->load->model('GetWilayah_model');
		$this->load->model('UpdatePG_model');
		$this->load->model('GetPG_model');
		$this->load->model('Raport_model');
	}

	public function index(){
		$data['wilayah'] = $this->Wilayah_model->get_wilayah_all();
		$data['plantation_groupg'] = $this->PlantationGroup_model->get_plantation_group_all();

    $this->load->view('include/header');
    $this->load->view('admin/admin.php', $data);
    $this->load->view('include/footer');
	}

	public function update_wilayah(){
		$wilayah = $this->input->get('wilayah');

		//Deklarasi
		$biaya_umur = array(
			$wilayah.'1' => $this->Wilayah_model->get_biaya_umur_wilayah($wilayah, $wilayah.'1'),
			$wilayah.'2' => $this->Wilayah_model->get_biaya_umur_wilayah($wilayah, $wilayah.'2'),
			$wilayah.'3' => $this->Wilayah_model->get_biaya_umur_wilayah($wilayah, $wilayah.'3')
		);
		$proporsi_luas = $this->Wilayah_model->get_proporsi_luas_wilayah($wilayah);
		$kondisi_drainase = $this->Wilayah_model->get_kondisi_drainase_wilayah($wilayah);
		$unsur_umur = array(
			'NSFC' => array(
				$wilayah.'1' => $this->Fertilization_model->get_unsur_umur_wilayah($wilayah.'1', 'NSFC'),
				$wilayah.'2' => $this->Fertilization_model->get_unsur_umur_wilayah($wilayah.'2', 'NSFC'),
				$wilayah.'3' => $this->Fertilization_model->get_unsur_umur_wilayah($wilayah.'3', 'NSFC'),
				'tonase' => $this->TonasePanen_model->get_tonase_umur_unsur_wilayah($wilayah, 'NSFC')
			),
			'NSSC' => array(
				$wilayah.'1' => $this->Fertilization_model->get_unsur_umur_wilayah($wilayah.'1', 'NSSC'),
				$wilayah.'2' => $this->Fertilization_model->get_unsur_umur_wilayah($wilayah.'2', 'NSSC'),
				$wilayah.'3' => $this->Fertilization_model->get_unsur_umur_wilayah($wilayah.'3', 'NSSC'),
				'tonase' => $this->TonasePanen_model->get_tonase_umur_unsur_wilayah($wilayah, 'NSSC')
			)
		);

		//Insert Data
		//Biaya Umur
	  $biaya_umur_nsfc = array();
	  $biaya_umur_nssc = array();
	  $luas_nsfc = array();
	  $luas_nssc = array();
	  foreach ($biaya_umur[$wilayah.'1'] as $w1) {
	    $biaya_umur_nsfc[$w1->umur] = $w1->biaya_realisasi_nsfc;
	    $biaya_umur_nssc[$w1->umur] = $w1->biaya_realisasi_nssc;
	    $luas_nsfc[$w1->umur] = $w1->luas_nsfc;
	    $luas_nssc[$w1->umur] = $w1->luas_nssc;
	  }
	  foreach ($biaya_umur[$wilayah.'2'] as $w2) {
	    if(isset($biaya_umur_nsfc[$w2->umur])){
	      $biaya_umur_nsfc[$w2->umur] += $w2->biaya_realisasi_nsfc;
	      $biaya_umur_nssc[$w2->umur] += $w2->biaya_realisasi_nssc;
	      $luas_nsfc[$w2->umur] += $w2->luas_nsfc;
	      $luas_nssc[$w2->umur] += $w2->luas_nssc;
	    }
	    else{
	      $biaya_umur_nsfc[$w2->umur] = $w2->biaya_realisasi_nsfc;
	      $biaya_umur_nssc[$w2->umur] = $w2->biaya_realisasi_nssc;
	      $luas_nsfc[$w2->umur] = $w2->luas_nsfc;
	      $luas_nssc[$w2->umur] = $w2->luas_nssc;
	    }
	  }
	  foreach ($biaya_umur[$wilayah.'3'] as $w3) {
	    if(isset($biaya_umur_nsfc[$w3->umur])){
	      $biaya_umur_nsfc[$w3->umur] += $w3->biaya_realisasi_nsfc;
	      $biaya_umur_nssc[$w3->umur] += $w3->biaya_realisasi_nssc;
	      $luas_nsfc[$w3->umur] += $w3->luas_nsfc;
	      $luas_nssc[$w3->umur] += $w3->luas_nssc;
	    }
	    else{
	      $biaya_umur_nsfc[$w3->umur] = $w3->biaya_realisasi_nsfc;
	      $biaya_umur_nssc[$w3->umur] = $w3->biaya_realisasi_nssc;
	      $luas_nsfc[$w3->umur] = $w3->luas_nsfc;
	      $luas_nssc[$w3->umur] = $w3->luas_nssc;
	    }
	  }
		//NSFC
	  $i_bu = 1;
	  $biaya_umur_sesudah = 0;
	  $luas_sesudah = 0;
	  $bu_real_nsfc = '';
	  $bu_std_nsfc = 0;
	  while($i_bu <= 25){
	    if($i_bu == 1){
	      if(isset($biaya_umur_nsfc[$i_bu])){
					if($luas_nsfc[$i_bu] != '0'){
						$query = $this->UpdateWilayah_model->set_biaya_umur_wilayah($wilayah, 'NSFC', $i_bu, ($biaya_umur_nsfc[$i_bu] / $luas_nsfc[$i_bu]));
					}
					else{
						$query = $this->UpdateWilayah_model->set_biaya_umur_wilayah($wilayah, 'NSFC', $i_bu, '0');
					}
	      }
	      else{
					$query = $this->UpdateWilayah_model->set_biaya_umur_wilayah($wilayah, 'NSFC', $i_bu, '0');
	      }
	    }
	    else if($i_bu >= 21){
	      if(isset($biaya_umur_nsfc[$i_bu]) && $luas_nsfc[$i_bu] != '0'){
	        $biaya_umur_sesudah += $biaya_umur_nsfc[$i_bu];
	        $luas_sesudah += $luas_nsfc[$i_bu];
	      }
	      else{
	        $biaya_umur_sesudah += 0;
	        $luas_sesudah += 0;
	      }
	    }
	    else{
	      if(isset($biaya_umur_nsfc[$i_bu]) && $luas_nsfc[$i_bu] != '0'){
					if($luas_nsfc[$i_bu] != '0'){
						$query = $this->UpdateWilayah_model->set_biaya_umur_wilayah($wilayah, 'NSFC', $i_bu, $biaya_umur_nsfc[$i_bu] / $luas_nsfc[$i_bu]);
					}
					else{
						$query = $this->UpdateWilayah_model->set_biaya_umur_wilayah($wilayah, 'NSFC', $i_bu, '0');
					}
	      }
	      else{
					$query = $this->UpdateWilayah_model->set_biaya_umur_wilayah($wilayah, 'NSFC', $i_bu, '0');
	      }
	    }
	    $i_bu++;
	  }
	  if($luas_sesudah != NULL){
			if($luas_sesudah != '0'){
				$query = $this->UpdateWilayah_model->set_biaya_umur_wilayah($wilayah, 'NSFC', '>20', $biaya_umur_sesudah / $luas_sesudah);
			}
			else{
				$query = $this->UpdateWilayah_model->set_biaya_umur_wilayah($wilayah, 'NSFC', $i_bu, '0');
			}
		}
	  else{
			$query = $this->UpdateWilayah_model->set_biaya_umur_wilayah($wilayah, 'NSFC', '>20', '0');
	  }
		//NSSC
	  $i_bu = 1;
	  $biaya_umur_sesudah = 0;
	  $luas_sesudah = 0;
	  $bu_real_nssc = '';
	  $bu_std_nssc = 0;
	  while($i_bu <= 25){
	    if($i_bu == 1){
	      if(isset($biaya_umur_nssc[$i_bu])){
					if($luas_nssc[$i_bu] != '0'){
						$query = $this->UpdateWilayah_model->set_biaya_umur_wilayah($wilayah, 'NSSC', $i_bu, ($biaya_umur_nssc[$i_bu] / $luas_nssc[$i_bu]));
					}
					else{
						$query = $this->UpdateWilayah_model->set_biaya_umur_wilayah($wilayah, 'NSSC', $i_bu, '0');
					}
	      }
	      else{
					$query = $this->UpdateWilayah_model->set_biaya_umur_wilayah($wilayah, 'NSSC', $i_bu, '0');
	      }
	    }
	    else if($i_bu >= 21){
	      if(isset($biaya_umur_nssc[$i_bu]) && $luas_nssc[$i_bu] != '0'){
	        $biaya_umur_sesudah += $biaya_umur_nssc[$i_bu];
	        $luas_sesudah += $luas_nssc[$i_bu];
	      }
	      else{
	        $biaya_umur_sesudah += 0;
	        $luas_sesudah += 0;
	      }
	    }
	    else{
	      if(isset($biaya_umur_nssc[$i_bu]) && $luas_nssc[$i_bu] != '0'){
					if($luas_nssc[$i_bu] != '0'){
						$query = $this->UpdateWilayah_model->set_biaya_umur_wilayah($wilayah, 'NSSC', $i_bu, $biaya_umur_nssc[$i_bu] / $luas_nssc[$i_bu]);
					}
					else{
						$query = $this->UpdateWilayah_model->set_biaya_umur_wilayah($wilayah, 'NSSC', $i_bu, '0');
					}
	      }
	      else{
					$query = $this->UpdateWilayah_model->set_biaya_umur_wilayah($wilayah, 'NSSC', $i_bu, '0');
	      }
	    }
	    $i_bu++;
	  }
	  if($luas_sesudah != NULL){
			if($luas_sesudah != '0'){
				$query = $this->UpdateWilayah_model->set_biaya_umur_wilayah($wilayah, 'NSSC', '>20', $biaya_umur_sesudah / $luas_sesudah);
			}
			else{
				$query = $this->UpdateWilayah_model->set_biaya_umur_wilayah($wilayah, 'NSSC', $i_bu, '0');
			}
		}
	  else{
			$query = $this->UpdateWilayah_model->set_biaya_umur_wilayah($wilayah, 'NSSC', '>20', '0');
	  }

		//Proporsi Luas Panen
	  $luas_total = $proporsi_luas['total'];
	  if($luas_total != NULL){
			$query = $this->UpdateWilayah_model->set_proporsi_luas_panen_wilayah($wilayah, 'NSFC', $proporsi_luas['nsfc'] / $luas_total);
			$query = $this->UpdateWilayah_model->set_proporsi_luas_panen_wilayah($wilayah, 'NSSC', $proporsi_luas['nssc'] / $luas_total);
	  }
	  else{
			$query = $this->UpdateWilayah_model->set_proporsi_luas_panen_wilayah($wilayah, 'NSFC', 0);
			$query = $this->UpdateWilayah_model->set_proporsi_luas_panen_wilayah($wilayah, 'NSSC', 0);
	  }

		//Kondisi Drainase
	  $kondisi_total = $kondisi_drainase['total'];
	  if($kondisi_total != NULL){
			$query = $this->UpdateWilayah_model->set_kondisi_drainase_wilayah($wilayah, 'Berat', $kondisi_drainase['berat'] / $kondisi_total);
			$query = $this->UpdateWilayah_model->set_kondisi_drainase_wilayah($wilayah, 'Sedang', $kondisi_drainase['sedang'] / $kondisi_total);
			$query = $this->UpdateWilayah_model->set_kondisi_drainase_wilayah($wilayah, 'Ringan', $kondisi_drainase['ringan'] / $kondisi_total);
	  }
	  else{
			$query = $this->UpdateWilayah_model->set_kondisi_drainase_wilayah($wilayah, 'Berat', 0);
			$query = $this->UpdateWilayah_model->set_kondisi_drainase_wilayah($wilayah, 'Sedang', 0);
			$query = $this->UpdateWilayah_model->set_kondisi_drainase_wilayah($wilayah, 'Ringan', 0);
	  }

		//Unsur Umur
		//NSFC
	  $n_unsur_nsfc = array(
	    '5' => 0,
	    '8' => 0,
	    '12' => 0,
	    '19' => 0,
	    '>20' => 0
	  );
	  $p_unsur_nsfc = array(
	    '5' => 0,
	    '8' => 0,
	    '12' => 0,
	    '19' => 0,
	    '>20' => 0
	  );
	  $k_unsur_nsfc = array(
	    '5' => 0,
	    '8' => 0,
	    '12' => 0,
	    '19' => 0,
	    '>20' => 0
	  );
	  $mg_unsur_nsfc = array(
	    '5' => 0,
	    '8' => 0,
	    '12' => 0,
	    '19' => 0,
	    '>20' => 0
	  );
	  $tonase_unsur_nsfc = array(
	    '5' => 1,
	    '8' => 1,
	    '12' => 1,
	    '19' => 1,
	    '>20' => 1
	  );
	  foreach ($unsur_umur['NSFC'][$wilayah.'1'] as $uu) {
	    if($uu->umur <= 20){
	      $n_unsur_nsfc[$uu->umur] += $uu->N;
	      $p_unsur_nsfc[$uu->umur] += $uu->P;
	      $k_unsur_nsfc[$uu->umur] += $uu->K;
	      $mg_unsur_nsfc[$uu->umur] += $uu->MG;
	    }
	    else{
	      $n_unsur_nsfc['>20'] += $uu->N;
	      $p_unsur_nsfc['>20'] += $uu->P;
	      $k_unsur_nsfc['>20'] += $uu->K;
	      $mg_unsur_nsfc['>20'] += $uu->MG;
	    }
	  }
	  foreach ($unsur_umur['NSFC'][$wilayah.'2'] as $uu) {
	    if($uu->umur <= 20){
	      $n_unsur_nsfc[$uu->umur] += $uu->N;
	      $p_unsur_nsfc[$uu->umur] += $uu->P;
	      $k_unsur_nsfc[$uu->umur] += $uu->K;
	      $mg_unsur_nsfc[$uu->umur] += $uu->MG;
	    }
	    else{
	      $n_unsur_nsfc['>20'] += $uu->N;
	      $p_unsur_nsfc['>20'] += $uu->P;
	      $k_unsur_nsfc['>20'] += $uu->K;
	      $mg_unsur_nsfc['>20'] += $uu->MG;
	    }
	  }
	  foreach ($unsur_umur['NSFC'][$wilayah.'3'] as $uu) {
	    if($uu->umur <= 20){
	      $n_unsur_nsfc[$uu->umur] += $uu->N;
	      $p_unsur_nsfc[$uu->umur] += $uu->P;
	      $k_unsur_nsfc[$uu->umur] += $uu->K;
	      $mg_unsur_nsfc[$uu->umur] += $uu->MG;
	    }
	    else{
	      $n_unsur_nsfc['>20'] += $uu->N;
	      $p_unsur_nsfc['>20'] += $uu->P;
	      $k_unsur_nsfc['>20'] += $uu->K;
	      $mg_unsur_nsfc['>20'] += $uu->MG;
	    }
	  }
	  foreach ($unsur_umur['NSFC']['tonase'] as $tuu) {
	    if($tuu->umur <= 20){
	      $tonase_unsur_nsfc[$tuu->umur] += $tuu->tonase;
	    }
	    else{
	      $tonase_unsur_nsfc['>20'] += $tuu->tonase;
	    }
	  }
	  $query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSFC', '5', 'N', $n_unsur_nsfc[5] / $tonase_unsur_nsfc[5]);
		$query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSFC', '8', 'N', $n_unsur_nsfc[8] / $tonase_unsur_nsfc[8]);
		$query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSFC', '12', 'N', $n_unsur_nsfc[12] / $tonase_unsur_nsfc[12]);
		$query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSFC', '19', 'N', $n_unsur_nsfc[19] / $tonase_unsur_nsfc[19]);
		$query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSFC', '>20', 'N', $n_unsur_nsfc['>20'] / $tonase_unsur_nsfc['>20']);
	  $query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSFC', '5', 'P', $p_unsur_nsfc[5] / $tonase_unsur_nsfc[5]);
		$query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSFC', '8', 'P', $p_unsur_nsfc[8] / $tonase_unsur_nsfc[8]);
		$query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSFC', '12', 'P', $p_unsur_nsfc[12] / $tonase_unsur_nsfc[12]);
		$query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSFC', '19', 'P', $p_unsur_nsfc[19] / $tonase_unsur_nsfc[19]);
		$query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSFC', '>20', 'P', $p_unsur_nsfc['>20'] / $tonase_unsur_nsfc['>20']);
	  $query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSFC', '5', 'K', $k_unsur_nsfc[5] / $tonase_unsur_nsfc[5]);
		$query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSFC', '8', 'K', $k_unsur_nsfc[8] / $tonase_unsur_nsfc[8]);
		$query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSFC', '12', 'K', $k_unsur_nsfc[12] / $tonase_unsur_nsfc[12]);
		$query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSFC', '19', 'K', $k_unsur_nsfc[19] / $tonase_unsur_nsfc[19]);
		$query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSFC', '>20', 'K', $k_unsur_nsfc['>20'] / $tonase_unsur_nsfc['>20']);
	  $query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSFC', '5', 'MG', $mg_unsur_nsfc[5] / $tonase_unsur_nsfc[5]);
		$query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSFC', '8', 'MG', $mg_unsur_nsfc[8] / $tonase_unsur_nsfc[8]);
		$query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSFC', '12', 'MG', $mg_unsur_nsfc[12] / $tonase_unsur_nsfc[12]);
		$query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSFC', '19', 'MG', $mg_unsur_nsfc[19] / $tonase_unsur_nsfc[19]);
		$query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSFC', '>20', 'MG', $mg_unsur_nsfc['>20'] / $tonase_unsur_nsfc['>20']);
		//NSSC
	  $n_unsur_nssc = array(
	    '5' => 0,
	    '8' => 0,
	    '12' => 0,
	    '19' => 0,
	    '>20' => 0
	  );
	  $p_unsur_nssc = array(
	    '5' => 0,
	    '8' => 0,
	    '12' => 0,
	    '19' => 0,
	    '>20' => 0
	  );
	  $k_unsur_nssc = array(
	    '5' => 0,
	    '8' => 0,
	    '12' => 0,
	    '19' => 0,
	    '>20' => 0
	  );
	  $mg_unsur_nssc = array(
	    '5' => 0,
	    '8' => 0,
	    '12' => 0,
	    '19' => 0,
	    '>20' => 0
	  );
	  $tonase_unsur_nssc = array(
	    '5' => 1,
	    '8' => 1,
	    '12' => 1,
	    '19' => 1,
	    '>20' => 1
	  );
	  foreach ($unsur_umur['NSSC'][$wilayah.'1'] as $uu) {
	    if($uu->umur <= 20){
	      $n_unsur_nssc[$uu->umur] += $uu->N;
	      $p_unsur_nssc[$uu->umur] += $uu->P;
	      $k_unsur_nssc[$uu->umur] += $uu->K;
	      $mg_unsur_nssc[$uu->umur] += $uu->MG;
	    }
	    else{
	      $n_unsur_nssc['>20'] += $uu->N;
	      $p_unsur_nssc['>20'] += $uu->P;
	      $k_unsur_nssc['>20'] += $uu->K;
	      $mg_unsur_nssc['>20'] += $uu->MG;
	    }
	  }
	  foreach ($unsur_umur['NSSC'][$wilayah.'2'] as $uu) {
	    if($uu->umur <= 20){
	      $n_unsur_nssc[$uu->umur] += $uu->N;
	      $p_unsur_nssc[$uu->umur] += $uu->P;
	      $k_unsur_nssc[$uu->umur] += $uu->K;
	      $mg_unsur_nssc[$uu->umur] += $uu->MG;
	    }
	    else{
	      $n_unsur_nssc['>20'] += $uu->N;
	      $p_unsur_nssc['>20'] += $uu->P;
	      $k_unsur_nssc['>20'] += $uu->K;
	      $mg_unsur_nssc['>20'] += $uu->MG;
	    }
	  }
	  foreach ($unsur_umur['NSSC'][$wilayah.'3'] as $uu) {
	    if($uu->umur <= 20){
	      $n_unsur_nssc[$uu->umur] += $uu->N;
	      $p_unsur_nssc[$uu->umur] += $uu->P;
	      $k_unsur_nssc[$uu->umur] += $uu->K;
	      $mg_unsur_nssc[$uu->umur] += $uu->MG;
	    }
	    else{
	      $n_unsur_nssc['>20'] += $uu->N;
	      $p_unsur_nssc['>20'] += $uu->P;
	      $k_unsur_nssc['>20'] += $uu->K;
	      $mg_unsur_nssc['>20'] += $uu->MG;
	    }
	  }
	  foreach ($unsur_umur['NSSC']['tonase'] as $tuu) {
	    if($tuu->umur <= 20){
	      $tonase_unsur_nssc[$tuu->umur] += $tuu->tonase;
	    }
	    else{
	      $tonase_unsur_nssc['>20'] += $tuu->tonase;
	    }
	  }
	  $query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSSC', '5', 'N', $n_unsur_nssc[5] / $tonase_unsur_nssc[5]);
		$query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSSC', '8', 'N', $n_unsur_nssc[8] / $tonase_unsur_nssc[8]);
		$query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSSC', '12', 'N', $n_unsur_nssc[12] / $tonase_unsur_nssc[12]);
		$query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSSC', '19', 'N', $n_unsur_nssc[19] / $tonase_unsur_nssc[19]);
		$query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSSC', '>20', 'N', $n_unsur_nssc['>20'] / $tonase_unsur_nssc['>20']);
	  $query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSSC', '5', 'P', $p_unsur_nssc[5] / $tonase_unsur_nssc[5]);
		$query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSSC', '8', 'P', $p_unsur_nssc[8] / $tonase_unsur_nssc[8]);
		$query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSSC', '12', 'P', $p_unsur_nssc[12] / $tonase_unsur_nssc[12]);
		$query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSSC', '19', 'P', $p_unsur_nssc[19] / $tonase_unsur_nssc[19]);
		$query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSSC', '>20', 'P', $p_unsur_nssc['>20'] / $tonase_unsur_nssc['>20']);
	  $query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSSC', '5', 'K', $k_unsur_nssc[5] / $tonase_unsur_nssc[5]);
		$query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSSC', '8', 'K', $k_unsur_nssc[8] / $tonase_unsur_nssc[8]);
		$query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSSC', '12', 'K', $k_unsur_nssc[12] / $tonase_unsur_nssc[12]);
		$query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSSC', '19', 'K', $k_unsur_nssc[19] / $tonase_unsur_nssc[19]);
		$query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSSC', '>20', 'K', $k_unsur_nssc['>20'] / $tonase_unsur_nssc['>20']);
	  $query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSSC', '5', 'MG', $mg_unsur_nssc[5] / $tonase_unsur_nssc[5]);
		$query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSSC', '8', 'MG', $mg_unsur_nssc[8] / $tonase_unsur_nssc[8]);
		$query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSSC', '12', 'MG', $mg_unsur_nssc[12] / $tonase_unsur_nssc[12]);
		$query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSSC', '19', 'MG', $mg_unsur_nssc[19] / $tonase_unsur_nssc[19]);
		$query = $this->UpdateWilayah_model->set_unsur_umur_wilayah($wilayah, 'NSSC', '>20', 'MG', $mg_unsur_nssc['>20'] / $tonase_unsur_nssc['>20']);

		//On success
		if($wilayah == 'W14'){
			echo ("
				<script>
					window.location.href = '/PIS/admin';
					alert('Berhasil di update ".$wilayah."');
				</script>
			");
		}
		else{
			$cek_wil = substr($wilayah, 1, 2) + 1;
			if($cek_wil < 10){
				$cek_wil = '0'.$cek_wil;
			}
			else{
				if($cek_wil == 10){
					$cek_wil = 11;
				}
			}
			echo ("
				<script>
					window.location.href = '/PIS/admin/update_wilayah?wilayah=W".$cek_wil."';
				</script>
			");
		}
	}

	public function update_wilayah_performance(){
	  function angka_ribuan($angka){
	    $hasil = number_format($angka,0,',','.');
	    return $hasil;
	  }
		$wilayah = $this->input->get('wilayah');
		if($wilayah == 'W01'){
			$query = $this->Performance_model->clear_perlocation();
			$query = $this->Performance_model->clear_raport_lokasi();
			$query = $this->Performance_model->clear_group_cost();
		}
		$element_cost = $this->ElementCost_model->get_element_cost_all();
		$lokasi_aktif = $this->GetWilayah_model->get_lokasi_aktif_wilayah($wilayah);
		$total_excellent_ha_t0 = 0;
		$total_excellent_ha_t1 = 0;
		$total_good_ha_t0 = 0;
		$total_good_ha_t1 = 0;
		$total_poor_ha_t0 = 0;
		$total_poor_ha_t1 = 0;
		$total_excellent_kg_t0 = 0;
		$total_excellent_kg_t1 = 0;
		$total_good_kg_t0 = 0;
		$total_good_kg_t1 = 0;
		$total_poor_kg_t0 = 0;
		$total_poor_kg_t1 = 0;
		foreach ($lokasi_aktif as $la) {
			//Deklarasi
			$konstanta = $this->Konstanta_model->get_konstanta_code("TGL_TARIK_DATA");
			$YEAR_BASE = $this->Konstanta_model->get_konstanta_code("YEAR_BASE");
			$pg_wil = $this->Lokasi_model->get_detil_lokasi_pg_wil($la->lokasi_aktif);

			$lokasi = $this->Lokasi_model->get_lokasi_code($la->lokasi_aktif);
			$wilayah = $this->Wilayah_model->get_wilayah_code(substr($lokasi['kebun'], 0, 3));
			$histori_lokasi_nssc_nsfc = $this->HistoriLokasi_model->get_histori_lokasi_code_nssc_nsfc($la->lokasi_aktif);
			$produksi = $this->Produksi_model->get_produksi_code($la->lokasi_aktif, substr($lokasi["status"], 0, 4));
			if($produksi == NULL){
				$produksi = $this->Produksi_model->get_produksi_t1_code($la->lokasi_aktif, substr($lokasi["status"], 0, 4));
			}

			if(substr($lokasi['status'], 0, 4) == 'NSFC' || substr($lokasi['status'], 0, 4) == 'NFFC'){
				$kelas = substr($lokasi['bibit'], 6, 1);
			}
			else{
				$kelas = 'NSSC';
			}

			$standart_panen = array(
				'B' => $this->Produksi_model->get_standart_produksi_code('B'),
				'S' => $this->Produksi_model->get_standart_produksi_code('S'),
				'K' => $this->Produksi_model->get_standart_produksi_code('K')
			);

			$std_yield = array(
				'NSFC' => $this->StdYield_model->get_std_yield_code('NSFC'),
				'NFFC' => $this->StdYield_model->get_std_yield_code('NFFC'),
				'NSSC' => $this->StdYield_model->get_std_yield_code('NSSC')
			);

		  if($produksi == NULL){
		    if($lokasi['tgl_panen_standard'] != NULL){
		      $tgl_panen = $lokasi['tgl_panen_standard'];
		    }
		    else if($lokasi['tgl_panen_rencana'] != NULL){
		      $tgl_panen = $lokasi['tgl_panen_rencana'];
		    }
		    else{
		      if(substr($lokasi['status'], 0, 4) != 'NSSC'){
		        $tgl_panen = strtotime($lokasi['tgl_mulai_rawat']) + ($standart_panen[$kelas]['bulan'] * 30.4583333333333 * 86400);
		      }
		      else{
		        $tgl_panen = strtotime($lokasi['tgl_mulai_rawat']) + 13 * 30.5 * 86400;
		      }
		      $tgl_panen = date('Y-m-d', $tgl_panen);
		    }

		    // if(date('Y', strtotime($tgl_panen)) == date('Y', strtotime($YEAR_BASE['nilai']))){
		    //   $tgl_panen = date('Y-m-d', strtotime($tgl_panen) + (86400 * 91.5));
		    // }
		  }
		  else{
		    $tgl_panen = $produksi['real_dan_sisa_rencana_tgl_selesai_panen'];
		  }

			$cek_tgl_forcing = $this->db->query("SELECT '$tgl_panen' - INTERVAL 152 DAY AS tgl_forcing")->row_array();
      $tgl_rencana_forcing = date('Y-m-d', strtotime($cek_tgl_forcing['tgl_forcing']));

		  if($produksi == NULL){
		    if($lokasi['status'] == 'NFFC'){
		      $tonase = 82.2 * $lokasi['luas'];
		      $yield = 82.2;
		    }
		    else{
					$status = substr($lokasi['status'], 0, 4);
		      $tonase = $std_yield[$status]['yield'] * $lokasi['luas'];
		      $yield = $std_yield[$status]['yield'];
		    }
		  }
		  else{
		    $tonase = $produksi['real_dan_sisa_rencana_tonase'];
		    $yield = $produksi['real_dan_sisa_rencana_yield'];
		  }
		  if($produksi['real_dan_sisa_rencana_luas'] != NULL){
		    $luas = $produksi['real_dan_sisa_rencana_luas'];
		  }
		  else{
		    $luas = $lokasi['luas'];
		  }
			if(date('Y', strtotime($tgl_panen)) == date('Y', strtotime($YEAR_BASE['nilai']))){
				$std_yield = $this->StdYield_model->get_std_yield_code(substr($lokasi['status'], 0, 4).'');
				$tahun = 'T0';
			}
			else{
				$std_yield = $this->StdYield_model->get_std_yield_code(substr($lokasi['status'], 0, 4).'_t1');
				$tahun = 'T1';
			}
			if($lokasi['tgl_forcing_realisasi'] != NULL){
				$tgl_forcing = $lokasi['tgl_forcing_realisasi'];
			}
			else{
				$tgl_forcing = $tgl_rencana_forcing;
			}
			$std_forcing_panen = $this->Konstanta_model->get_std_forcing_panen($lokasi['tgl_mulai_rawat'], $kelas);

			if(date('Y', strtotime($tgl_panen)) == date('Y', strtotime($YEAR_BASE['nilai']))){
				$cek_produksi = 'produksi';
			}
			else{
				$cek_produksi = 'produksi_t1';
			}
			$ZN01_real = $this->DataMaster_model->get_real_actual_code_zn01_zn04($lokasi['lokasi'], substr($lokasi['status'], 0, 4), 'ZN01', $cek_produksi);
			$ZN03_real = $this->DataMaster_model->get_real_actual_code_zn01_zn04($lokasi['lokasi'], substr($lokasi['status'], 0, 4), 'ZN03', $cek_produksi);
			$ZN04_real = $this->DataMaster_model->get_real_actual_code_zn01_zn04($lokasi['lokasi'], substr($lokasi['status'], 0, 4), 'ZN04', $cek_produksi);
			$cek_ZN03 = 0;
			if($ZN01_real['total'] == NULL || $ZN01_real['total'] == 0){
				$ZN01_real = $this->DataMaster_model->get_element_cost_code_jenis($lokasi['lokasi'], "ZN01", $lokasi["kebun"]);
			}
			if($ZN03_real['total'] == NULL || $ZN03_real['total'] == 0){
				$ZN03_real = $this->DataMaster_model->get_element_cost_code_jenis($lokasi['lokasi'], "ZN03", $lokasi["kebun"]);
				$cek_ZN03 = 1;
			}
			if($ZN04_real['total'] == NULL || $ZN04_real['total'] == 0){
				$ZN04_real = $this->DataMaster_model->get_element_cost_code_jenis($lokasi['lokasi'], "ZN04", $lokasi["kebun"]);
			}
			$element_cost_real = array(
				'ZN01' => $ZN01_real,
				'ZN02' => $this->DataMaster_model->get_element_cost_code_jenis($lokasi['lokasi'], "ZN02", $lokasi["kebun"]),
				'ZN03' => $ZN03_real,
				'ZN04' => $ZN04_real,
				'ZN05' => $this->DataMaster_model->get_element_cost_code_jenis($lokasi['lokasi'], "ZN05", $lokasi["kebun"]),
				'ZN06' => $this->DataMaster_model->get_element_cost_code_jenis($lokasi['lokasi'], "ZN06", $lokasi["kebun"]),
				'ZN07' => $this->DataMaster_model->get_element_cost_code_jenis($lokasi['lokasi'], "ZN07", $lokasi["kebun"]),
				'ZN08' => $this->DataMaster_model->get_element_cost_code_jenis($lokasi['lokasi'], "ZN08", $lokasi["kebun"]),
				'ZN09' => $this->DataMaster_model->get_element_cost_code_jenis($lokasi['lokasi'], "ZN09", $lokasi["kebun"]),
				'ZN10' => $this->DataMaster_model->get_element_cost_code_jenis($lokasi['lokasi'], "ZN10", $lokasi["kebun"]),
				'ZN11' => $this->DataMaster_model->get_element_cost_code_jenis($lokasi['lokasi'], "ZN11", $lokasi["kebun"]),
				'ZN12' => $this->DataMaster_model->get_element_cost_code_jenis($lokasi['lokasi'], "ZN12", $lokasi["kebun"]),
				'ZN13' => $this->DataMaster_model->get_element_cost_code_jenis($lokasi['lokasi'], "ZN13", $lokasi["kebun"]),
				'ZN14' => $this->DataMaster_model->get_element_cost_code_jenis($lokasi['lokasi'], "ZN14", $lokasi["kebun"]),
				'ZN15' => $this->DataMaster_model->get_element_cost_code_jenis($lokasi['lokasi'], "ZN15", $lokasi["kebun"])
			);
			$total_real = 0;
			for ($i=4; $i <= 14 ; $i++) {
				if($i < 10){
					$total_real += ($element_cost_real['ZN0'.$i]['total']);
				}
				else{
					$total_real += ($element_cost_real['ZN'.$i]['total']);
				}
			}
			if(date('Y', strtotime($tgl_panen)) == date('Y', strtotime($YEAR_BASE['nilai']))){
				$cek_panen = 1;
				$element_cost_f = array(
					'ZN01' => $this->Forecast_model->get_element_cost_code_jenis($lokasi['lokasi'], "ZN01", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN02' => $this->Forecast_model->get_element_cost_code_jenis($lokasi['lokasi'], "ZN02", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN03' => $this->Forecast_model->get_element_cost_code_jenis($lokasi['lokasi'], "ZN03", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN04' => $this->Forecast_model->get_element_cost_code_jenis($lokasi['lokasi'], "ZN04", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN05' => $this->Forecast_model->get_element_cost_code_jenis($lokasi['lokasi'], "ZN05", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN06' => $this->Forecast_model->get_element_cost_code_jenis($lokasi['lokasi'], "ZN06", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN07' => $this->Forecast_model->get_element_cost_code_jenis($lokasi['lokasi'], "ZN07", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN081' => $this->Forecast_model->get_element_cost_code_jenis($lokasi['lokasi'], "ZN08", 1),
					'ZN082' => $this->Forecast_model->get_element_cost_code_jenis($lokasi['lokasi'], "ZN08", 2),
					'ZN083' => $this->Forecast_model->get_element_cost_code_jenis($lokasi['lokasi'], "ZN08", 3),
					'ZN09' => $this->Forecast_model->get_element_cost_code_jenis($lokasi['lokasi'], "ZN09", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN10' => $this->Forecast_model->get_element_cost_code_jenis($lokasi['lokasi'], "ZN10", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN11' => $this->Forecast_model->get_element_cost_code_jenis($lokasi['lokasi'], "ZN11", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN12' => $this->Forecast_model->get_element_cost_code_jenis($lokasi['lokasi'], "ZN12", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN13' => $this->Forecast_model->get_element_cost_code_jenis($lokasi['lokasi'], "ZN13", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN14' => $this->Forecast_model->get_element_cost_code_jenis($lokasi['lokasi'], "ZN14", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN15' => $this->Forecast_model->get_element_cost_code_jenis($lokasi['lokasi'], "ZN15", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333))
				);
			}
			else{
				$cek_panen = 2;
				$element_cost_f = array(
					'ZN01' => $this->Forecast_model->get_element_cost_code_jenis_t1($lokasi['lokasi'], "ZN01", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN02' => $this->Forecast_model->get_element_cost_code_jenis_t1($lokasi['lokasi'], "ZN02", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN03' => $this->Forecast_model->get_element_cost_code_jenis_t1($lokasi['lokasi'], "ZN03", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN04' => $this->Forecast_model->get_element_cost_code_jenis_t1($lokasi['lokasi'], "ZN04", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN05' => $this->Forecast_model->get_element_cost_code_jenis_t1($lokasi['lokasi'], "ZN05", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN06' => $this->Forecast_model->get_element_cost_code_jenis_t1($lokasi['lokasi'], "ZN06", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN07' => $this->Forecast_model->get_element_cost_code_jenis_t1($lokasi['lokasi'], "ZN07", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN081' => $this->Forecast_model->get_element_cost_code_jenis_t1($lokasi['lokasi'], "ZN08", 1),
					'ZN082' => $this->Forecast_model->get_element_cost_code_jenis_t1($lokasi['lokasi'], "ZN08", 2),
					'ZN083' => $this->Forecast_model->get_element_cost_code_jenis_t1($lokasi['lokasi'], "ZN08", 3),
					'ZN09' => $this->Forecast_model->get_element_cost_code_jenis_t1($lokasi['lokasi'], "ZN09", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN10' => $this->Forecast_model->get_element_cost_code_jenis_t1($lokasi['lokasi'], "ZN10", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN11' => $this->Forecast_model->get_element_cost_code_jenis_t1($lokasi['lokasi'], "ZN11", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN12' => $this->Forecast_model->get_element_cost_code_jenis_t1($lokasi['lokasi'], "ZN12", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN13' => $this->Forecast_model->get_element_cost_code_jenis_t1($lokasi['lokasi'], "ZN13", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN14' => $this->Forecast_model->get_element_cost_code_jenis_t1($lokasi['lokasi'], "ZN14", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN15' => $this->Forecast_model->get_element_cost_code_jenis_t1($lokasi['lokasi'], "ZN15", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333))
				);
			}
			$element_cost_all = $this->ElementCost_model->get_element_cost_pm();
			$forecast_overhead = array(
				'ZN04' => $this->ForecastOverhead_model->get_forecast_overhead_code("ZN04", substr($lokasi["status"], 0, 4), date('n', strtotime($tgl_panen))),
				'ZN05' => $this->ForecastOverhead_model->get_forecast_overhead_code("ZN05", substr($lokasi["status"], 0, 4), date('n', strtotime($tgl_panen))),
				'ZN06' => $this->ForecastOverhead_model->get_forecast_overhead_code("ZN06", substr($lokasi["status"], 0, 4), date('n', strtotime($tgl_panen))),
				'ZN10' => $this->ForecastOverhead_model->get_forecast_overhead_code("ZN10", substr($lokasi["status"], 0, 4), date('n', strtotime($tgl_panen))),
				'ZN13' => $this->ForecastOverhead_model->get_forecast_overhead_code("ZN13", substr($lokasi["status"], 0, 4), date('n', strtotime($tgl_panen)))
			);
			$koreksi = $this->Koreksi_model->get_koreksi_code($lokasi['lokasi']);
			$tgl_irrigation = array(
				'start' => $this->Konstanta_model->get_konstanta_code('TGL_IRRIGATION_START'),
				'finish' => $this->Konstanta_model->get_konstanta_code('TGL_IRRIGATION_FINISH')
			);
			$tgl_irrigation_t1 = array(
				'start' => $this->Konstanta_model->get_konstanta_code('TGL_IRRIGATION_START_T1'),
				'finish' => $this->Konstanta_model->get_konstanta_code('TGL_IRRIGATION_FINISH_T1')
			);
			$std_interval_siram = $this->Irrigation_model->get_interval_siram($pg_wil['pg']);
			$tonase_panen = array(
				'alami' => $this->TonasePanen_model->get_tonase_panen_code($lokasi['lokasi'], "Alami", $lokasi["kebun"]),
				'manual' => $this->TonasePanen_model->get_tonase_panen_code($lokasi['lokasi'], "Manual", $lokasi["kebun"]),
				'reguler' => $this->TonasePanen_model->get_tonase_panen_code($lokasi['lokasi'], "Reguler", $lokasi["kebun"])
			);

			$date1 = round(strtotime($konstanta['nilai']) / 86400);
			$date2 = round(strtotime($lokasi['tgl_mulai_rawat']) / 86400);

			$umur = ceil(($date1-$date2) / 30.4583333333333);

		  if($lokasi['bibit'] == NULL){
		    if(substr($lokasi['status'], 0, 4) == "NSSC"){
		      $varian_desc = substr($histori_lokasi_nssc_nsfc['kode_bibit_lokasi'], 2, 3);
		    }
		    else{
		      $varian_desc = "";
		    }
		  }
		  else{
		    $varian_desc = substr($lokasi['bibit'], 2, 3);
		  }

		  if($lokasi['bibit'] == NULL){
		    if(substr($lokasi['status'], 0, 4) == "NSSC"){
		      if(substr($histori_lokasi_nssc_nsfc['kode_bibit_lokasi'], 5, 1) == "C"){
		        $jenis_desc = "CR";
		      }
		      else if(substr($histori_lokasi_nssc_nsfc['kode_bibit_lokasi'], 5, 1) == "S"){
		        $jenis_desc = "SC";
		      }
		      else{
		        $jenis_desc = "AN";
		      }
		    }
		    else{
		      $jenis_desc = "";
		    }
		  }
		  else{
		    if(substr($lokasi['bibit'], 5, 1) == "C"){
		      $jenis_desc = "CR";
		    }
		    else if(substr($lokasi['bibit'], 5, 1) == "S"){
		      $jenis_desc = "SC";
		    }
		    else{
		      $jenis_desc = "AN";
		    }
		  }

		  if($lokasi['bibit'] == NULL){
		    if(substr($lokasi['status'], 0, 4) == "NSSC"){
		      $kelas_desc = substr($histori_lokasi_nssc_nsfc['kode_bibit_lokasi'], 6, 1);
		    }
		    else{
		      $kelas_desc = "";
		    }
		  }
		  else{
		    $kelas_desc = substr($lokasi['bibit'], 6, 1);
		  }
			//Start
?>
										<table border="1">
                      <tr>
                        <td>Element Cost</td>
                        <td>BPP HA</td>
                        <td>BPP KG</td>
                        <td>Real</td>
                        <td>Forecast</td>
                        <td>R+F HA</td>
                        <td>R+F KG</td>
                      </tr>
<?php
  $total_bpp_ha = 0;
  $total_bpp_kg = 0;
  $total_rfb = 0;
  $total_rf = 0;
  $total_r = 0;
  $total_f = 0;
  foreach ($element_cost as $ec) {
		$status = substr($lokasi['status'], 0, 4);
    if($cek_panen == 1){
      if($status == "NSFC"){
        $bpp_ha = $ec->BPP_NSFC_ha;
      }
      else{
        $bpp_ha = $ec->BPP_NSSC_ha;
      }
    }
    else{
      if($status == "NSFC"){
        $bpp_ha = $ec->BPP_NSFC_ha_t1;
      }
      else{
        $bpp_ha = $ec->BPP_NSSC_ha_t1;
      }
    }
    $bpp_ha = $bpp_ha * $luas;

    if($cek_panen == 1){
      if($status == "NSFC"){
        $bpp_kg = $ec->BPP_NSFC_kg;
      }
      else{
        $bpp_kg = $ec->BPP_NSSC_kg;
      }
    }
    else{
      if($status == "NSFC"){
        $bpp_kg = $ec->BPP_NSFC_kg_t1;
      }
      else{
        $bpp_kg = $ec->BPP_NSSC_kg_t1;
      }
    }
    $bpp_kg = $bpp_kg * $tonase * 1000;

    $rfb = $bpp_ha;
    $total_bpp_ha += $bpp_ha;
    $total_bpp_kg += $bpp_kg;
    $total_rfb += $bpp_ha;

		if($cek_ZN03 == 1 && $ec->code == 'ZN03' && $status == "NSFC"){
			if(strtotime($lokasi["tgl_mulai_rawat"]) >= strtotime('2019-05-01')){
				$element_cost_real[$ec->code]['total'] += 1000000 * $luas;
			}
			else{
				$element_cost_real[$ec->code]['total'] += 3676535.88918288 * $luas;
			}
		}

		$total_r += $element_cost_real[$ec->code]['total'];

    if(isset($forecast_overhead[$ec->code]['fo'])){
      $fo = $forecast_overhead[$ec->code]['fo'];
    }
    else{
      $fo = 0;
    }

    $total_tonase_panen = 0;
    if($tonase_panen['alami']['produksi_ton'] == NULL){
      $produksi_alami = 0;
    }
    else{
      $produksi_alami = $tonase_panen['alami']['produksi_ton'] * 1000;
    }
    if($tonase_panen['reguler']['produksi_ton'] == NULL){
      $produksi_reguler = 0;
    }
    else{
      $total_tonase_panen += $tonase_panen['reguler']['produksi_ton'];
      $produksi_reguler = $tonase_panen['reguler']['produksi_ton'] * 1000;
    }

    $help_asumsi_alami = $this->Forecast_model->get_help_zn10(date('n', strtotime($tgl_panen)));

    switch ($ec->code) {
      case 'ZN01':
        if($element_cost_real['ZN10']['total'] / $tonase / 1000 < 100){
          $real_rf = $element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $luas);
        }
        else{
          $real_rf = $element_cost_real[$ec->code]['total'];
        }
      break;
      case 'ZN02':
        if($element_cost_real['ZN10']['total'] / $tonase / 1000 < 100){
          $real_rf = $element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $luas);
        }
        else{
          $real_rf = $element_cost_real[$ec->code]['total'];
        }
      break;
      case 'ZN03':
        if($element_cost_real['ZN10']['total'] / $tonase / 1000 < 100){
          $real_rf = $element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $luas);
        }
        else{
          $real_rf = $element_cost_real[$ec->code]['total'];
        }
      break;
      case 'ZN04':
        if($element_cost_real['ZN10']['total'] / $tonase / 1000 < 100){
          if($fo != NULL){
            if($element_cost_real['ZN08']['total'] > 0){
              if(substr($lokasi['status'], 2, 2) == 'FC'){
                $real_rf = $element_cost_real[$ec->code]['total'] + (800000 * $luas) + ((800000 * $luas) * $fo);
              }
              else{
                $real_rf = $element_cost_real[$ec->code]['total'] + (500000 * $luas) + ((500000 * $luas) * $fo);
              }
            }
            else{
              if(substr($lokasi['status'], 2, 2) == 'FC'){
                $real_rf = $element_cost_real[$ec->code]['total'] + (1300000 * $luas) + ((1300000 * $luas) * $fo);
              }
              else{
                $real_rf = $element_cost_real[$ec->code]['total'] + (890000 * $luas) + ((890000 * $luas) * $fo);
              }
            }
          }
          else{
            if($element_cost_real['ZN08']['total'] > 0){
              if(substr($lokasi['status'], 2, 2) == 'FC'){
                $real_rf = $element_cost_real[$ec->code]['total'] + (800000 * $luas);
              }
              else{
                $real_rf = $element_cost_real[$ec->code]['total'] + (500000 * $luas);
              }
            }
            else{
              if(substr($lokasi['status'], 2, 2) == 'FC'){
                $real_rf = $element_cost_real[$ec->code]['total'] + (1300000 * $luas);
              }
              else{
                $real_rf = $element_cost_real[$ec->code]['total'] + (890000 * $luas);
              }
            }
          }
        }
        else{
          $real_rf = $element_cost_real[$ec->code]['total'];
        }
      break;
      case 'ZN05':
        $hari_tarik_data = strtotime($konstanta['nilai']) / 86400;
        $hari_perawatan = strtotime($lokasi['tgl_mulai_rawat']) / 86400;
        $hari_forcing = strtotime($tgl_forcing) / 86400;

        if(substr($lokasi['status'], 2, 2) == 'FC'){
          if(($hari_tarik_data - $hari_perawatan) > 80){
            $jumlah_aplikasi_1 = round(($hari_forcing - 104) - $hari_tarik_data) / 20;
          }
          else{
            $jumlah_aplikasi_1 = round(($hari_forcing - 104) - ($hari_perawatan + 80)) / 20;
          }
        }
        else if(substr($lokasi['status'], 2, 2) == 'SC'){
          $jumlah_aplikasi_1 = round(($hari_forcing - 80) - $hari_tarik_data) / 30;
        }
        else{
          $jumlah_aplikasi_1 = 0;
        }
        if($jumlah_aplikasi_1 > 0){
          $jumlah_aplikasi_1 = ceil($jumlah_aplikasi_1);
        }
        else{
          $jumlah_aplikasi_1 = 0;
        }

        if(substr($lokasi['status'], 2, 2) == 'FC'){
          if(($hari_forcing - $hari_tarik_data) > 104){
            $jumlah_aplikasi_2 = 104 / 15;
          }
          else{
            $jumlah_aplikasi_2 = round($hari_forcing - $hari_tarik_data) / 15;
          }
        }
        else if(substr($lokasi['status'], 2, 2) == 'SC'){
          if(($hari_forcing - $hari_tarik_data) > 80){
            $jumlah_aplikasi_2 = 80 / 20;
          }
          else{
            $jumlah_aplikasi_2 = round($hari_forcing - $hari_tarik_data) / 20;
          }
        }
        else{
          $jumlah_aplikasi_2 = 0;
        }
        if($jumlah_aplikasi_2 > 0){
          $jumlah_aplikasi_2 = floor($jumlah_aplikasi_2);
        }
        else{
          $jumlah_aplikasi_2 = 0;
        }

        if(substr($lokasi['status'], 2, 2) == 'FC'){
          if(round($hari_tarik_data - $hari_perawatan) < 60){
            $ZN05_f = (($jumlah_aplikasi_1 + $jumlah_aplikasi_2) * (19454856/14)) + 2068249.63690476;
          }
          else{
            $ZN05_f = (($jumlah_aplikasi_1 + $jumlah_aplikasi_2) * (19454856/14));
          }
        }
        else{
          $ZN05_f = (($jumlah_aplikasi_1 + $jumlah_aplikasi_2) * (8083566/9));
        }

        if($fo != NULL){
          $real_rf = $element_cost_real[$ec->code]['total'] + ($ZN05_f * $luas) + (($ZN05_f * $luas) * $fo);
        }
        else{
          $real_rf = $element_cost_real[$ec->code]['total'] + ($ZN05_f * $luas);
        }
				if(isset($koreksi[$ec->code])){
					if(($real_rf * $koreksi[$ec->code]) >= $element_cost_real[$ec->code]['total']){
						$real_rf = $real_rf * $koreksi[$ec->code];
					}
					else{
						$real_rf = $element_cost_real[$ec->code]['total'];
					}
				}
      break;
      case 'ZN06':
        if($element_cost_real['ZN10']['total'] / $tonase / 1000 < 100){
          if($fo != NULL){
            $real_rf = $element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $luas) + (($element_cost_f[$ec->code]['rp_per_ha'] * $luas) * $fo);
          }
          else{
            $real_rf = $element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $luas);
          }
        }
        else{
          $real_rf = $element_cost_real[$ec->code]['total'];
        }
				if(isset($koreksi[$ec->code])){
					if(($real_rf * $koreksi[$ec->code]) >= $element_cost_real[$ec->code]['total']){
						$real_rf = $real_rf * $koreksi[$ec->code];
					}
					else{
						$real_rf = $element_cost_real[$ec->code]['total'];
					}
				}
        break;
      case 'ZN07':
        if($element_cost_real['ZN10']['total'] / $tonase / 1000 < 100){
          $real_rf = $element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $luas);
          if(isset($koreksi[$ec->code])){
            if(($real_rf * $koreksi[$ec->code]) >= $element_cost_real[$ec->code]['total']){
              $real_rf = $real_rf * $koreksi[$ec->code];
            }
            else{
              $real_rf = $element_cost_real[$ec->code]['total'];
            }
          }
        }
        else{
          $real_rf = $element_cost_real[$ec->code]['total'];
        }
      break;
      case 'ZN08':
        if(($element_cost_real[$ec->code]['total'] / $luas) <= 500000){
          $ZN08_f = $element_cost_f['ZN081']['rp_per_ha'];
        }
        else if(($element_cost_real[$ec->code]['total'] / $luas) <= 1000000){
          $ZN08_f = $element_cost_f['ZN082']['rp_per_ha'];
        }
        else{
          $ZN08_f = $element_cost_f['ZN083']['rp_per_ha'];
        }

        $real_rf = $element_cost_real[$ec->code]['total'] + ($ZN08_f * $luas);
        if(isset($koreksi[$ec->code])){
          if(($real_rf * $koreksi[$ec->code]) >= $element_cost_real[$ec->code]['total']){
            $real_rf = $real_rf * $koreksi[$ec->code];
          }
          else{
            $real_rf = $element_cost_real[$ec->code]['total'];
          }
        }
      break;
      case 'ZN09':
        if($element_cost_real['ZN09']['total'] <= 0){
          $real_rf = $element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $luas);
        }
        else{
          $real_rf = $element_cost_real[$ec->code]['total'];
        }
        break;
      case 'ZN10':
        $persen_alami = ($produksi_alami / ($tonase * 1000));
        if(substr($lokasi['status'], 2, 2) == 'FC'){
          $persen_asumsi_alami = $help_asumsi_alami['ZN10'];
        }
        else{
          $persen_asumsi_alami = '0.01';
        }

        if((date('Y-m', strtotime($konstanta['nilai'])) == date('Y-m', strtotime($tgl_panen))) || strtotime($konstanta['nilai']) >= strtotime($tgl_panen)){
          $sisa_BPP_alami = 0;
        }
        else{
          if($persen_alami > $persen_asumsi_alami){
            $sisa_BPP_alami = (0.03 * 1000 * $tonase);
          }
          else{
            $sisa_BPP_alami = (($persen_asumsi_alami - $persen_alami) * 1000 * $tonase);
          }
        }

        if(($tonase * 1000) - $sisa_BPP_alami - $produksi_alami - $produksi_reguler < 0){
          $sisa_BPP_reguler = (0 * 1000 * $tonase);
        }
        else{
          $sisa_BPP_reguler = ($tonase * 1000) - $sisa_BPP_alami - $produksi_alami - $produksi_reguler;
        }

        $cek_tonase = $sisa_BPP_reguler + $sisa_BPP_alami + $produksi_alami + $produksi_reguler - ($tonase * 1000);
        if(substr($lokasi['status'], 2, 2) == 'FC'){
          $BPP_pnn_alami = $sisa_BPP_alami * 390;
          $BPP_pnn_reguler = $sisa_BPP_reguler * 116.927412395172;
          $exclude_panen = 100.14517106282 * ($sisa_BPP_alami + $sisa_BPP_reguler);
        }
        else{
          $BPP_pnn_alami = $sisa_BPP_alami * 610.726268365189;
          $BPP_pnn_reguler = $sisa_BPP_reguler * 136.355022188611;
          $exclude_panen = 108.376536114483 * ($sisa_BPP_alami + $sisa_BPP_reguler);
        }

        $ZN10_f = ($BPP_pnn_alami + $BPP_pnn_reguler + $exclude_panen) / $luas;

        $real_rf = $element_cost_real[$ec->code]['total'] + ($ZN10_f * $luas);
      break;
      case 'ZN11':
        $real_rf = $element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $luas);
        if(isset($koreksi[$ec->code])){
          if(($real_rf * $koreksi[$ec->code]) >= $element_cost_real[$ec->code]['total']){
            $real_rf = $real_rf * $koreksi[$ec->code];
          }
          else{
            $real_rf = $element_cost_real[$ec->code]['total'];
          }
        }
      break;
      case 'ZN12':
        if($element_cost_real['ZN10']['total'] / $tonase / 1000 < 100){
          $real_rf = $element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $luas);
        }
        else{
          $real_rf = $element_cost_real[$ec->code]['total'];
        }
      break;
      case 'ZN13':
        if(($tgl_panen > $tgl_irrigation['start']['nilai']) && ($tgl_panen < $tgl_irrigation['finish']['nilai'])){
          $tgl_1 = floor((((strtotime($tgl_panen) - strtotime($tgl_irrigation['start']['nilai'])) / 86400) - 5) / $std_interval_siram['siram']);
        }
        else if(($tgl_panen > $tgl_irrigation['start']['nilai']) && ($tgl_panen > $tgl_irrigation['finish']['nilai'])){
          $tgl_1 = floor((((strtotime($tgl_irrigation['finish']['nilai']) - strtotime($tgl_irrigation['start']['nilai'])) / 86400) - 5) / $std_interval_siram['siram']);
        }
        else{
          $tgl_1 = 0;
        }
				if($tgl_1 < 0){
					$tgl_1 = 0;
				}

        if(($tgl_panen > $tgl_irrigation_t1['start']['nilai']) && ($tgl_panen < $tgl_irrigation_t1['finish']['nilai'])){
          $tgl_2 = floor((((strtotime($tgl_panen) - strtotime($tgl_irrigation_t1['start']['nilai'])) / 86400) - 5) / 10);
        }
        else if(($tgl_panen > $tgl_irrigation_t1['start']['nilai']) && ($tgl_panen > $tgl_irrigation_t1['finish']['nilai'])){
          $tgl_2 = floor((((strtotime($tgl_irrigation_t1['finish']['nilai']) - strtotime($tgl_irrigation_t1['start']['nilai'])) / 86400) - 5) / 10);
        }
        else{
          $tgl_2 = 0;
        }
				if($tgl_2 < 0){
					$tgl_2 = 0;
				}

        if(date('Y', strtotime($tgl_panen)) == date('Y', strtotime($YEAR_BASE['nilai']))){
          if(substr($lokasi['status'], 2, 2) == 'FC'){
            $jumlah_irrigation_1 = (550000 * $tgl_1) * 0.75;
            $jumlah_irrigation_2 = 0;
          }
          else{
            $jumlah_irrigation_1 = (550000 * $tgl_1) * 0.4;
            $jumlah_irrigation_2 = 0;
          }
        }
        else{
          if(substr($lokasi['status'], 2, 2) == 'FC'){
            $jumlah_irrigation_1 = (550000 * $tgl_1) * 0.55;
            $jumlah_irrigation_2 = (550000 * $tgl_2) * 0.75;
          }
          else{
            $jumlah_irrigation_1 = (550000 * $tgl_1) * 0.2;
            $jumlah_irrigation_2 = (550000 * $tgl_2) * 0.3;
          }
        }

        $ZN13_f = $jumlah_irrigation_1 + $jumlah_irrigation_2;

        // if($element_cost_real['ZN10']['total'] / $tonase / 1000 < 100){
          if($fo != NULL){
            $real_rf = $element_cost_real[$ec->code]['total'] + ($ZN13_f * $luas) + (($ZN13_f * $luas) * $fo);
          }
          else{
            $real_rf = $element_cost_real[$ec->code]['total'] + ($ZN13_f * $luas);
          }
          if(isset($koreksi[$ec->code])){
            if(($real_rf * $koreksi[$ec->code]) >= $element_cost_real[$ec->code]['total']){
              $real_rf = $real_rf * $koreksi[$ec->code];
            }
            else{
              $real_rf = $element_cost_real[$ec->code]['total'];
            }
          }
        // }
        // else{
        //   $real_rf = $element_cost_real[$ec->code]['total'];
        // }
      break;
      case 'ZN14':
        if($element_cost_real['ZN10']['total'] / $tonase / 1000 < 100){
          $real_rf = $element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $luas);
        }
        else{
          $real_rf = $element_cost_real[$ec->code]['total'];
        }
      break;
      case 'ZN15':
        if($element_cost_real['ZN10']['total'] / $tonase / 1000 < 100){
          $real_rf = $element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $luas);
        }
        else{
          $real_rf = $element_cost_real[$ec->code]['total'];
        }
      break;
    }

    $total_rf += $real_rf;
    $total_f += $real_rf - $element_cost_real[$ec->code]['total'];
		$real_detil_ZN[$ec->code] = $element_cost_real[$ec->code]['total'];
		$forecast_detil_ZN[$ec->code] = ($real_rf - $element_cost_real[$ec->code]['total']);
		$budget_detil_ZN[$ec->code] = $bpp_ha;
?>
                      <tr>
                        <td><?php echo $ec->nama; ?></td>
                        <td><?php echo angka_ribuan($bpp_ha / $luas); ?></td>
                        <td><?php echo angka_ribuan($bpp_kg / $tonase / 1000); ?></td>
                        <td><?php echo angka_ribuan($element_cost_real[$ec->code]['total'] / $luas); ?></td>
                        <td><?php echo angka_ribuan(($real_rf - $element_cost_real[$ec->code]['total']) / $luas); ?></td>
                        <td><?php echo angka_ribuan($real_rf / $luas); ?></td>
                        <td><?php echo angka_ribuan($real_rf / $tonase / 1000); ?></td>
                      </tr>
<?php
		if($produksi != NULL){
			if($cek_panen == 1){
				$query = $this->Raport_model->set_real_lokasi($pg_wil['pg'], $pg_wil['wilayah'], $lokasi['lokasi'], $status, 'B'.date('n', strtotime($tgl_panen)), 'T0', 'Real', $ec->code, $element_cost_real[$ec->code]['total'], ($real_rf - $element_cost_real[$ec->code]['total']));
				$query = $this->Raport_model->set_real_lokasi($pg_wil['pg'], $pg_wil['wilayah'], $lokasi['lokasi'], $status, 'B'.date('n', strtotime($tgl_panen)), 'T0', 'Actual', $ec->code, $element_cost_real[$ec->code]['total'], ($real_rf - $element_cost_real[$ec->code]['total']));
			}
			else{
				$query = $this->Raport_model->set_real_lokasi($pg_wil['pg'], $pg_wil['wilayah'], $lokasi['lokasi'], $status, 'B'.date('n', strtotime($tgl_panen)), 'T1', 'Real', $ec->code, $element_cost_real[$ec->code]['total'], ($real_rf - $element_cost_real[$ec->code]['total']));
				$query = $this->Raport_model->set_real_lokasi($pg_wil['pg'], $pg_wil['wilayah'], $lokasi['lokasi'], $status, 'B'.date('n', strtotime($tgl_panen)), 'T1', 'Actual', $ec->code, $element_cost_real[$ec->code]['total'], ($real_rf - $element_cost_real[$ec->code]['total']));
			}
		}
		// else if((date('Y', strtotime($tgl_panen))) == (date('Y', strtotime($YEAR_BASE['nilai'])) + 1)){
		// 		$query = $this->Raport_model->set_real_lokasi($pg_wil['pg'], $pg_wil['wilayah'], $lokasi['lokasi'], $status, 'B'.date('n', strtotime($tgl_panen)), 'T1', 'Real', $ec->code, $raport_real, $raport_forecast_real);
		// 		$query = $this->Raport_model->set_real_lokasi($pg_wil['pg'], $pg_wil['wilayah'], $lokasi['lokasi'], $status, 'B'.date('n', strtotime($tgl_panen)), 'T1', 'Actual', $ec->code, $raport_real, ($real_rf - $element_cost_real[$ec->code]['total']));
		// }
		//Cek Lokasi
		if($ec->code == 'ZN15' && ($element_cost_real[$ec->code]['total'] + ($real_rf - $element_cost_real[$ec->code]['total'])) == 0){
			$zn15 = 0;
		}
		else{
			$zn15 = 1;
		}
		if($status != 'NSSC' && ($ec->code != 'ZN01' || $ec->code != 'ZN02' || $ec->code != 'ZN03') && $zn15 == 1){
			if($status == 'NSFC' || $lokasi['status'] == 'NFFC'){
				$std_budget = $bpp_ha;
			}
			else{
				$std_budget = $bpp_ha;
			}
			if((($element_cost_real[$ec->code]['total'] + ($real_rf - $element_cost_real[$ec->code]['total'])) / $luas) > ($std_budget * 1.5) || (($element_cost_real[$ec->code]['total'] + ($real_rf - $element_cost_real[$ec->code]['total'])) / $luas) < ($std_budget * 0.5)){
				$query = $this->Raport_model->set_cek_lokasi($pg_wil['pg'], $pg_wil['wilayah'], $lokasi['lokasi'], $status, 'B'.date('n', strtotime($tgl_panen)), 'T1', $ec->code, ($element_cost_real[$ec->code]['total'] + ($real_rf - $element_cost_real[$ec->code]['total'])) / $luas);
			}
		}
  }
?>
                      <tr>
                        <td>Total</td>
                        <td><?php echo angka_ribuan($total_bpp_ha / $luas); ?></td>
                        <td><?php echo angka_ribuan($total_bpp_kg / $tonase / 1000); ?></td>
                        <td><?php echo angka_ribuan($total_r / $luas); ?></td>
                        <td><?php echo angka_ribuan($total_f / $luas); ?></td>
                        <td><?php echo angka_ribuan($total_rf / $luas); ?></td>
                        <td><?php echo angka_ribuan($total_rf / $tonase / 1000); ?></td>
                      </tr>
                    </table>
<?php
			//End
			$group_cost = $this->GroupCost_model->get_group_cost_umur_total($lokasi['lokasi'], $lokasi['kebun']);
			if($produksi != NULL){
				if($cek_panen == 1){
					$query = $this->Raport_model->set_luas_tonase_lokasi($pg_wil['pg'], $pg_wil['wilayah'], $lokasi['lokasi'], $status, 'B'.date('n', strtotime($tgl_panen)), 'T0', $luas, $tonase);
					$query = $this->GroupCost_model->set_group_cost_lokasi($pg_wil['pg'], $pg_wil['wilayah'], $lokasi['lokasi'], $status, 'B'.date('n', strtotime($tgl_panen)), 'T0', $group_cost['Labour'], $group_cost['Charge'], $group_cost['Material'], NULL, $luas, $tonase);
				}
				else{
					$query = $this->Raport_model->set_luas_tonase_lokasi($pg_wil['pg'], $pg_wil['wilayah'], $lokasi['lokasi'], $status, 'B'.date('n', strtotime($tgl_panen)), 'T1', $luas, $tonase);
					$query = $this->GroupCost_model->set_group_cost_lokasi($pg_wil['pg'], $pg_wil['wilayah'], $lokasi['lokasi'], $status, 'B'.date('n', strtotime($tgl_panen)), 'T1', $group_cost['Labour'], $group_cost['Charge'], $group_cost['Material'], NULL, $luas, $tonase);
				}
			}
			// else if(substr($tgl_panen, 0, 4) == (date('Y', strtotime($konstanta['nilai'])) + 1)){
			// 	$query = $this->Raport_model->set_luas_tonase_lokasi($pg_wil['pg'], $pg_wil['wilayah'], $lokasi['lokasi'], $status, 'B'.date('n', strtotime($tgl_panen)), 'T1', $luas, $tonase);
			// 	if($status == 'NSFC'){
			// 		$query = $this->GroupCost_model->set_group_cost_lokasi($pg_wil['pg'], $pg_wil['wilayah'], $lokasi['lokasi'], $status, 'B'.date('n', strtotime($tgl_panen)), 'T1', $group_cost['labour']['total'], $group_cost['charge']['total'], $group_cost['material']['total'], $group_cost['bibit']['total'] + 1000000, $luas, $tonase);
			// 	}
			// 	else{
			// 		$query = $this->GroupCost_model->set_group_cost_lokasi($pg_wil['pg'], $pg_wil['wilayah'], $lokasi['lokasi'], $status, 'B'.date('n', strtotime($tgl_panen)), 'T1', $group_cost['labour']['total'], $group_cost['charge']['total'], $group_cost['material']['total'], $group_cost['bibit']['total'], $luas, $tonase);
			// 	}
			// }
		  if($total_rf != 0){
		    if($total_rf != NULL){
					//Rp per Ha
					if($cek_panen == 1){
			      if(((($total_rf / $luas) / ($total_bpp_ha / $luas)) * 100) < 98){
							$total_excellent_ha_t0++;
							$status_lokasi_ha = 'Excellent';
			      }
			      else if(((($total_rf / $luas) / ($total_bpp_ha / $luas)) * 100) <= 102){
							$total_good_ha_t0++;
							$status_lokasi_ha = 'Good';
			      }
			      else{
							$total_poor_ha_t0++;
							$status_lokasi_ha = 'Poor';
			      }
						//Rp per Kg
			      if(((($total_rf / $tonase / 1000) / ($total_bpp_kg / $tonase / 1000)) * 100) < 98){
							$total_excellent_kg_t0++;
							$status_lokasi_kg = 'Excellent';
			      }
			      else if(((($total_rf / $tonase / 1000) / ($total_bpp_kg / $tonase / 1000)) * 100) <= 102){
							$total_good_kg_t0++;
							$status_lokasi_kg = 'Good';
			      }
			      else{
							$total_poor_kg_t0++;
							$status_lokasi_kg = 'Poor';
			      }
					}
					else{
			      if(((($total_rf / $luas) / ($total_bpp_ha / $luas)) * 100) < 98){
							$total_excellent_ha_t1++;
							$status_lokasi_ha = 'Excellent';
			      }
			      else if(((($total_rf / $luas) / ($total_bpp_ha / $luas)) * 100) <= 102){
							$total_good_ha_t1++;
							$status_lokasi_ha = 'Good';
			      }
			      else{
							$total_poor_ha_t1++;
							$status_lokasi_ha = 'Poor';
			      }
						//Rp per Kg
			      if(((($total_rf / $tonase / 1000) / ($total_bpp_kg / $tonase / 1000)) * 100) < 98){
							$total_excellent_kg_t1++;
							$status_lokasi_kg = 'Excellent';
			      }
			      else if(((($total_rf / $tonase / 1000) / ($total_bpp_kg / $tonase / 1000)) * 100) <= 102){
							$total_good_kg_t1++;
							$status_lokasi_kg = 'Good';
			      }
			      else{
							$total_poor_kg_t1++;
							$status_lokasi_kg = 'Poor';
			      }
					}
		    }
		  }
			echo "<pre>";
			var_dump($lokasi['lokasi'].' '.((($total_rf / $luas) / ($total_bpp_ha / $luas)) * 100).' '.$status_lokasi_ha);
			var_dump($lokasi['lokasi'].' '.((($total_rf / $tonase / 1000) / ($total_bpp_kg / $tonase / 1000)) * 100).' '.$status_lokasi_kg);
			var_dump($lokasi['lokasi'].' '.angka_ribuan(($total_rf / $luas)).' '.$status_lokasi_ha);
			var_dump($lokasi['lokasi'].' '.angka_ribuan(($total_rf / $tonase / 1000)).' '.$status_lokasi_kg);
			echo "</pre>";
			// die();

			// : panel1
			$data = array(
				'pg' => $pg_wil['pg'],
				'wilayah' => $pg_wil['wilayah'],
				'kebun' => $lokasi['kebun'],
				'lokasi' => $lokasi['lokasi'],
				'umur' => $umur,
				'jenis_bibit' => $jenis_desc,
				'varian_bibit' => $varian_desc,
				'kelas_bibit' => $kelas_desc,
				'status' => $status,
				'luas' => $luas,
				'tonase' => $tonase,
				'tgl_perawatan' => $lokasi['tgl_mulai_rawat'],
				'forcing' => date("Y-m-d", strtotime($tgl_forcing)),
				'panen' => $tgl_panen,
				'budget_ha' => ($total_bpp_ha / $luas),
				'real_ha' => $total_r / $luas,
				'sisa_saldo' => ($total_r / $luas) - ($total_bpp_ha / $luas),
				'rf_ha' => ($total_rf / $luas),
				'deviasi_ha' => ($total_rf / $luas) / ($total_bpp_ha / $luas),
				'category_ha' => $status_lokasi_ha,
				'budget_kg' => ($total_bpp_kg / $tonase / 1000),
				'real_kg' => $total_r / $tonase / 1000,
				'rf_kg' => ($total_rf / $tonase / 1000),
				'deviasi_kg' => ($total_rf / $tonase / 1000) / ($total_bpp_kg / $tonase / 1000),
				'category_kg' => $status_lokasi_kg,
				'ZN_r' => $real_detil_ZN,
				'ZN_f'=> $forecast_detil_ZN,
				'ZN_b'=> $budget_detil_ZN
			);
			echo "<pre>";
			var_dump($data);
			echo "</pre>";
			// : panel
			// die();
			$query = $this->Performance_model->set_perlocation($data);
			// die();
		}
		$query = $this->Performance_model->set_peformance_wilayah($pg_wil['wilayah'], 'T0', $total_excellent_ha_t0, $total_good_ha_t0, $total_poor_ha_t0, $total_excellent_kg_t0, $total_good_kg_t0, $total_poor_kg_t0);
		// echo "<pre>";
		// var_dump($this->db->last_query());
		// echo "</pre>";
		$query = $this->Performance_model->set_peformance_wilayah($pg_wil['wilayah'], 'T1', $total_excellent_ha_t1, $total_good_ha_t1, $total_poor_ha_t1, $total_excellent_kg_t1, $total_good_kg_t1, $total_poor_kg_t1);
		// echo "<pre>";
		// var_dump($this->db->last_query());
		// echo "</pre>";
		// die();
		//On success
		if($pg_wil['wilayah'] == 'W14'){
			echo ("
				<script>
					window.location.href = '/PIS/admin';
					alert('Berhasil di update ".$pg_wil['wilayah']."');
				</script>
			");
		}
		else{
			$cek_wil = substr($pg_wil['wilayah'], 1, 2) + 1;
			if($cek_wil < 10){
				$cek_wil = '0'.$cek_wil;
			}
			else{
				if($cek_wil == 10){
					$cek_wil = 11;
				}
			}
			echo ("
			<script>
				window.location.href = '/PIS/admin/update_wilayah_performance?wilayah=W".$cek_wil."';
			</script>
			");
		}
	}

	public function update_pg(){
		$pg = $this->input->get('pg');
		$wilayah = $this->Wilayah_model->get_wilayah_pg($pg);

		//Deklarasi
		foreach ($wilayah as $wil) {
			$biaya_umur[$wil->code] = array(
				$wil->code.'1' => $this->Wilayah_model->get_biaya_umur_wilayah($wil->code, $wil->code.'1'),
				$wil->code.'2' => $this->Wilayah_model->get_biaya_umur_wilayah($wil->code, $wil->code.'2'),
				$wil->code.'3' => $this->Wilayah_model->get_biaya_umur_wilayah($wil->code, $wil->code.'3')
			);
		}
		$proporsi_luas = $this->PlantationGroup_model->get_proporsi_luas_pg($pg);
		$kondisi_drainase = $this->PlantationGroup_model->get_kondisi_drainase_pg($pg);

		foreach ($wilayah as $wil) {
			$unsur_umur[$wil->code] = array(
				'NSFC' => array(
					$wil->code.'1' => $this->Fertilization_model->get_unsur_umur_wilayah($wil->code.'1', 'NSFC'),
					$wil->code.'2' => $this->Fertilization_model->get_unsur_umur_wilayah($wil->code.'2', 'NSFC'),
					$wil->code.'3' => $this->Fertilization_model->get_unsur_umur_wilayah($wil->code.'3', 'NSFC'),
					'tonase' => $this->TonasePanen_model->get_tonase_umur_unsur_wilayah($wil->code, 'NSFC')
				),
				'NSSC' => array(
					$wil->code.'1' => $this->Fertilization_model->get_unsur_umur_wilayah($wil->code.'1', 'NSSC'),
					$wil->code.'2' => $this->Fertilization_model->get_unsur_umur_wilayah($wil->code.'2', 'NSSC'),
					$wil->code.'3' => $this->Fertilization_model->get_unsur_umur_wilayah($wil->code.'3', 'NSSC'),
					'tonase' => $this->TonasePanen_model->get_tonase_umur_unsur_wilayah($wil->code, 'NSSC')
				)
			);
		}

		//Insert Data
		//Biaya Umur
	  $biaya_umur_nsfc = array();
	  $biaya_umur_nssc = array();
	  $luas_nsfc = array();
	  $luas_nssc = array();
		foreach ($wilayah as $wil) {
		  foreach ($biaya_umur[$wil->code][$wil->code.'1'] as $w1) {
		    if(isset($biaya_umur_nsfc[$w1->umur])){
		      $biaya_umur_nsfc[$w1->umur] += $w1->biaya_realisasi_nsfc;
		      $biaya_umur_nssc[$w1->umur] += $w1->biaya_realisasi_nssc;
		      $luas_nsfc[$w1->umur] += $w1->luas_nsfc;
		      $luas_nssc[$w1->umur] += $w1->luas_nssc;
		    }
		    else{
			    $biaya_umur_nsfc[$w1->umur] = $w1->biaya_realisasi_nsfc;
			    $biaya_umur_nssc[$w1->umur] = $w1->biaya_realisasi_nssc;
			    $luas_nsfc[$w1->umur] = $w1->luas_nsfc;
			    $luas_nssc[$w1->umur] = $w1->luas_nssc;
		    }
		  }
		  foreach ($biaya_umur[$wil->code][$wil->code.'2'] as $w2) {
		    if(isset($biaya_umur_nsfc[$w2->umur])){
		      $biaya_umur_nsfc[$w2->umur] += $w2->biaya_realisasi_nsfc;
		      $biaya_umur_nssc[$w2->umur] += $w2->biaya_realisasi_nssc;
		      $luas_nsfc[$w2->umur] += $w2->luas_nsfc;
		      $luas_nssc[$w2->umur] += $w2->luas_nssc;
		    }
		    else{
		      $biaya_umur_nsfc[$w2->umur] = $w2->biaya_realisasi_nsfc;
		      $biaya_umur_nssc[$w2->umur] = $w2->biaya_realisasi_nssc;
		      $luas_nsfc[$w2->umur] = $w2->luas_nsfc;
		      $luas_nssc[$w2->umur] = $w2->luas_nssc;
		    }
		  }
		  foreach ($biaya_umur[$wil->code][$wil->code.'3'] as $w3) {
		    if(isset($biaya_umur_nsfc[$w3->umur])){
		      $biaya_umur_nsfc[$w3->umur] += $w3->biaya_realisasi_nsfc;
		      $biaya_umur_nssc[$w3->umur] += $w3->biaya_realisasi_nssc;
		      $luas_nsfc[$w3->umur] += $w3->luas_nsfc;
		      $luas_nssc[$w3->umur] += $w3->luas_nssc;
		    }
		    else{
		      $biaya_umur_nsfc[$w3->umur] = $w3->biaya_realisasi_nsfc;
		      $biaya_umur_nssc[$w3->umur] = $w3->biaya_realisasi_nssc;
		      $luas_nsfc[$w3->umur] = $w3->luas_nsfc;
		      $luas_nssc[$w3->umur] = $w3->luas_nssc;
		    }
		  }
		}
		//NSFC
	  $i_bu = 1;
	  $biaya_umur_sesudah = 0;
	  $luas_sesudah = 0;
	  $bu_real_nsfc = '';
	  $bu_std_nsfc = 0;
	  while($i_bu <= 25){
	    if($i_bu == 1){
	      if(isset($biaya_umur_nsfc[$i_bu])){
					if($luas_nsfc[$i_bu] != '0'){
						$query = $this->UpdatePG_model->set_biaya_umur_pg($pg, 'NSFC', $i_bu, ($biaya_umur_nsfc[$i_bu] / $luas_nsfc[$i_bu]));
					}
					else{
						$query = $this->UpdatePG_model->set_biaya_umur_pg($pg, 'NSFC', $i_bu, '0');
					}
	      }
	      else{
					$query = $this->UpdatePG_model->set_biaya_umur_pg($pg, 'NSFC', $i_bu, '0');
	      }
	    }
	    else if($i_bu >= 21){
	      if(isset($biaya_umur_nsfc[$i_bu]) && $luas_nsfc[$i_bu] != '0'){
	        $biaya_umur_sesudah += $biaya_umur_nsfc[$i_bu];
	        $luas_sesudah += $luas_nsfc[$i_bu];
	      }
	      else{
	        $biaya_umur_sesudah += 0;
	        $luas_sesudah += 0;
	      }
	    }
	    else{
	      if(isset($biaya_umur_nsfc[$i_bu]) && $luas_nsfc[$i_bu] != '0'){
					if($luas_nsfc[$i_bu] != '0'){
						$query = $this->UpdatePG_model->set_biaya_umur_pg($pg, 'NSFC', $i_bu, $biaya_umur_nsfc[$i_bu] / $luas_nsfc[$i_bu]);
					}
					else{
						$query = $this->UpdatePG_model->set_biaya_umur_pg($pg, 'NSFC', $i_bu, '0');
					}
	      }
	      else{
					$query = $this->UpdatePG_model->set_biaya_umur_pg($pg, 'NSFC', $i_bu, '0');
	      }
	    }
	    $i_bu++;
	  }
	  if($luas_sesudah != NULL){
			if($luas_sesudah != '0'){
				$query = $this->UpdatePG_model->set_biaya_umur_pg($pg, 'NSFC', '>20', $biaya_umur_sesudah / $luas_sesudah);
			}
			else{
				$query = $this->UpdatePG_model->set_biaya_umur_pg($pg, 'NSFC', $i_bu, '0');
			}
		}
	  else{
			$query = $this->UpdatePG_model->set_biaya_umur_pg($pg, 'NSFC', '>20', '0');
	  }
		//NSSC
	  $i_bu = 1;
	  $biaya_umur_sesudah = 0;
	  $luas_sesudah = 0;
	  $bu_real_nssc = '';
	  $bu_std_nssc = 0;
	  while($i_bu <= 25){
	    if($i_bu == 1){
	      if(isset($biaya_umur_nssc[$i_bu])){
					if($luas_nssc[$i_bu] != '0'){
						$query = $this->UpdatePG_model->set_biaya_umur_pg($pg, 'NSSC', $i_bu, ($biaya_umur_nssc[$i_bu] / $luas_nssc[$i_bu]));
					}
					else{
						$query = $this->UpdatePG_model->set_biaya_umur_pg($pg, 'NSSC', $i_bu, '0');
					}
	      }
	      else{
					$query = $this->UpdatePG_model->set_biaya_umur_pg($pg, 'NSSC', $i_bu, '0');
	      }
	    }
	    else if($i_bu >= 21){
	      if(isset($biaya_umur_nssc[$i_bu]) && $luas_nssc[$i_bu] != '0'){
	        $biaya_umur_sesudah += $biaya_umur_nssc[$i_bu];
	        $luas_sesudah += $luas_nssc[$i_bu];
	      }
	      else{
	        $biaya_umur_sesudah += 0;
	        $luas_sesudah += 0;
	      }
	    }
	    else{
	      if(isset($biaya_umur_nssc[$i_bu]) && $luas_nssc[$i_bu] != '0'){
					if($luas_nssc[$i_bu] != '0'){
						$query = $this->UpdatePG_model->set_biaya_umur_pg($pg, 'NSSC', $i_bu, $biaya_umur_nssc[$i_bu] / $luas_nssc[$i_bu]);
					}
					else{
						$query = $this->UpdatePG_model->set_biaya_umur_pg($pg, 'NSSC', $i_bu, '0');
					}
	      }
	      else{
					$query = $this->UpdatePG_model->set_biaya_umur_pg($pg, 'NSSC', $i_bu, '0');
	      }
	    }
	    $i_bu++;
	  }
	  if($luas_sesudah != NULL){
			if($luas_sesudah != '0'){
				$query = $this->UpdatePG_model->set_biaya_umur_pg($pg, 'NSSC', '>20', $biaya_umur_sesudah / $luas_sesudah);
			}
			else{
				$query = $this->UpdatePG_model->set_biaya_umur_pg($pg, 'NSSC', $i_bu, '0');
			}
		}
	  else{
			$query = $this->UpdatePG_model->set_biaya_umur_pg($pg, 'NSSC', '>20', '0');
	  }

		//Proporsi Luas Panen
	  $luas_total = $proporsi_luas['total'];
	  if($luas_total != NULL){
			$query = $this->UpdatePG_model->set_proporsi_luas_panen_pg($pg, 'NSFC', $proporsi_luas['nsfc'] / $luas_total);
			$query = $this->UpdatePG_model->set_proporsi_luas_panen_pg($pg, 'NSSC', $proporsi_luas['nssc'] / $luas_total);
	  }
	  else{
			$query = $this->UpdatePG_model->set_proporsi_luas_panen_pg($pg, 'NSFC', 0);
			$query = $this->UpdatePG_model->set_proporsi_luas_panen_pg($pg, 'NSSC', 0);
	  }

		//Kondisi Drainase
	  $kondisi_total = $kondisi_drainase['total'];
	  if($kondisi_total != NULL){
			$query = $this->UpdatePG_model->set_kondisi_drainase_pg($pg, 'Berat', $kondisi_drainase['berat'] / $kondisi_total);
			$query = $this->UpdatePG_model->set_kondisi_drainase_pg($pg, 'Sedang', $kondisi_drainase['sedang'] / $kondisi_total);
			$query = $this->UpdatePG_model->set_kondisi_drainase_pg($pg, 'Ringan', $kondisi_drainase['ringan'] / $kondisi_total);
	  }
	  else{
			$query = $this->UpdatePG_model->set_kondisi_drainase_pg($pg, 'Berat', 0);
			$query = $this->UpdatePG_model->set_kondisi_drainase_pg($pg, 'Sedang', 0);
			$query = $this->UpdatePG_model->set_kondisi_drainase_pg($pg, 'Ringan', 0);
	  }

		//Unsur Umur
		//NSFC
	  $n_unsur_nsfc = array(
	    '5' => 0,
	    '8' => 0,
	    '12' => 0,
	    '19' => 0,
	    '>20' => 0
	  );
	  $p_unsur_nsfc = array(
	    '5' => 0,
	    '8' => 0,
	    '12' => 0,
	    '19' => 0,
	    '>20' => 0
	  );
	  $k_unsur_nsfc = array(
	    '5' => 0,
	    '8' => 0,
	    '12' => 0,
	    '19' => 0,
	    '>20' => 0
	  );
	  $mg_unsur_nsfc = array(
	    '5' => 0,
	    '8' => 0,
	    '12' => 0,
	    '19' => 0,
	    '>20' => 0
	  );
	  $tonase_unsur_nsfc = array(
	    '5' => 1,
	    '8' => 1,
	    '12' => 1,
	    '19' => 1,
	    '>20' => 1
	  );
		foreach ($wilayah as $wil) {
		  foreach ($unsur_umur[$wil->code]['NSFC'][$wil->code.'1'] as $uu) {
		    if($uu->umur <= 20){
		      $n_unsur_nsfc[$uu->umur] += $uu->N;
		      $p_unsur_nsfc[$uu->umur] += $uu->P;
		      $k_unsur_nsfc[$uu->umur] += $uu->K;
		      $mg_unsur_nsfc[$uu->umur] += $uu->MG;
		    }
		    else{
		      $n_unsur_nsfc['>20'] += $uu->N;
		      $p_unsur_nsfc['>20'] += $uu->P;
		      $k_unsur_nsfc['>20'] += $uu->K;
		      $mg_unsur_nsfc['>20'] += $uu->MG;
		    }
		  }
		  foreach ($unsur_umur[$wil->code]['NSFC'][$wil->code.'2'] as $uu) {
		    if($uu->umur <= 20){
		      $n_unsur_nsfc[$uu->umur] += $uu->N;
		      $p_unsur_nsfc[$uu->umur] += $uu->P;
		      $k_unsur_nsfc[$uu->umur] += $uu->K;
		      $mg_unsur_nsfc[$uu->umur] += $uu->MG;
		    }
		    else{
		      $n_unsur_nsfc['>20'] += $uu->N;
		      $p_unsur_nsfc['>20'] += $uu->P;
		      $k_unsur_nsfc['>20'] += $uu->K;
		      $mg_unsur_nsfc['>20'] += $uu->MG;
		    }
		  }
		  foreach ($unsur_umur[$wil->code]['NSFC'][$wil->code.'3'] as $uu) {
		    if($uu->umur <= 20){
		      $n_unsur_nsfc[$uu->umur] += $uu->N;
		      $p_unsur_nsfc[$uu->umur] += $uu->P;
		      $k_unsur_nsfc[$uu->umur] += $uu->K;
		      $mg_unsur_nsfc[$uu->umur] += $uu->MG;
		    }
		    else{
		      $n_unsur_nsfc['>20'] += $uu->N;
		      $p_unsur_nsfc['>20'] += $uu->P;
		      $k_unsur_nsfc['>20'] += $uu->K;
		      $mg_unsur_nsfc['>20'] += $uu->MG;
		    }
		  }
		  foreach ($unsur_umur[$wil->code]['NSFC']['tonase'] as $tuu) {
		    if($tuu->umur <= 20){
		      $tonase_unsur_nsfc[$tuu->umur] += $tuu->tonase;
		    }
		    else{
		      $tonase_unsur_nsfc['>20'] += $tuu->tonase;
		    }
		  }
		}
	  $query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSFC', '5', 'N', $n_unsur_nsfc[5] / $tonase_unsur_nsfc[5]);
		$query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSFC', '8', 'N', $n_unsur_nsfc[8] / $tonase_unsur_nsfc[8]);
		$query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSFC', '12', 'N', $n_unsur_nsfc[12] / $tonase_unsur_nsfc[12]);
		$query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSFC', '19', 'N', $n_unsur_nsfc[19] / $tonase_unsur_nsfc[19]);
		$query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSFC', '>20', 'N', $n_unsur_nsfc['>20'] / $tonase_unsur_nsfc['>20']);
	  $query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSFC', '5', 'P', $p_unsur_nsfc[5] / $tonase_unsur_nsfc[5]);
		$query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSFC', '8', 'P', $p_unsur_nsfc[8] / $tonase_unsur_nsfc[8]);
		$query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSFC', '12', 'P', $p_unsur_nsfc[12] / $tonase_unsur_nsfc[12]);
		$query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSFC', '19', 'P', $p_unsur_nsfc[19] / $tonase_unsur_nsfc[19]);
		$query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSFC', '>20', 'P', $p_unsur_nsfc['>20'] / $tonase_unsur_nsfc['>20']);
	  $query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSFC', '5', 'K', $k_unsur_nsfc[5] / $tonase_unsur_nsfc[5]);
		$query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSFC', '8', 'K', $k_unsur_nsfc[8] / $tonase_unsur_nsfc[8]);
		$query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSFC', '12', 'K', $k_unsur_nsfc[12] / $tonase_unsur_nsfc[12]);
		$query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSFC', '19', 'K', $k_unsur_nsfc[19] / $tonase_unsur_nsfc[19]);
		$query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSFC', '>20', 'K', $k_unsur_nsfc['>20'] / $tonase_unsur_nsfc['>20']);
	  $query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSFC', '5', 'MG', $mg_unsur_nsfc[5] / $tonase_unsur_nsfc[5]);
		$query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSFC', '8', 'MG', $mg_unsur_nsfc[8] / $tonase_unsur_nsfc[8]);
		$query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSFC', '12', 'MG', $mg_unsur_nsfc[12] / $tonase_unsur_nsfc[12]);
		$query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSFC', '19', 'MG', $mg_unsur_nsfc[19] / $tonase_unsur_nsfc[19]);
		$query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSFC', '>20', 'MG', $mg_unsur_nsfc['>20'] / $tonase_unsur_nsfc['>20']);
		//NSSC
	  $n_unsur_nssc = array(
	    '5' => 0,
	    '8' => 0,
	    '12' => 0,
	    '19' => 0,
	    '>20' => 0
	  );
	  $p_unsur_nssc = array(
	    '5' => 0,
	    '8' => 0,
	    '12' => 0,
	    '19' => 0,
	    '>20' => 0
	  );
	  $k_unsur_nssc = array(
	    '5' => 0,
	    '8' => 0,
	    '12' => 0,
	    '19' => 0,
	    '>20' => 0
	  );
	  $mg_unsur_nssc = array(
	    '5' => 0,
	    '8' => 0,
	    '12' => 0,
	    '19' => 0,
	    '>20' => 0
	  );
	  $tonase_unsur_nssc = array(
	    '5' => 1,
	    '8' => 1,
	    '12' => 1,
	    '19' => 1,
	    '>20' => 1
	  );
		foreach ($wilayah as $wil) {
		  foreach ($unsur_umur[$wil->code]['NSSC'][$wil->code.'1'] as $uu) {
		    if($uu->umur <= 20){
		      $n_unsur_nssc[$uu->umur] += $uu->N;
		      $p_unsur_nssc[$uu->umur] += $uu->P;
		      $k_unsur_nssc[$uu->umur] += $uu->K;
		      $mg_unsur_nssc[$uu->umur] += $uu->MG;
		    }
		    else{
		      $n_unsur_nssc['>20'] += $uu->N;
		      $p_unsur_nssc['>20'] += $uu->P;
		      $k_unsur_nssc['>20'] += $uu->K;
		      $mg_unsur_nssc['>20'] += $uu->MG;
		    }
		  }
		  foreach ($unsur_umur[$wil->code]['NSSC'][$wil->code.'2'] as $uu) {
		    if($uu->umur <= 20){
		      $n_unsur_nssc[$uu->umur] += $uu->N;
		      $p_unsur_nssc[$uu->umur] += $uu->P;
		      $k_unsur_nssc[$uu->umur] += $uu->K;
		      $mg_unsur_nssc[$uu->umur] += $uu->MG;
		    }
		    else{
		      $n_unsur_nssc['>20'] += $uu->N;
		      $p_unsur_nssc['>20'] += $uu->P;
		      $k_unsur_nssc['>20'] += $uu->K;
		      $mg_unsur_nssc['>20'] += $uu->MG;
		    }
		  }
		  foreach ($unsur_umur[$wil->code]['NSSC'][$wil->code.'3'] as $uu) {
		    if($uu->umur <= 20){
		      $n_unsur_nssc[$uu->umur] += $uu->N;
		      $p_unsur_nssc[$uu->umur] += $uu->P;
		      $k_unsur_nssc[$uu->umur] += $uu->K;
		      $mg_unsur_nssc[$uu->umur] += $uu->MG;
		    }
		    else{
		      $n_unsur_nssc['>20'] += $uu->N;
		      $p_unsur_nssc['>20'] += $uu->P;
		      $k_unsur_nssc['>20'] += $uu->K;
		      $mg_unsur_nssc['>20'] += $uu->MG;
		    }
		  }
		  foreach ($unsur_umur[$wil->code]['NSSC']['tonase'] as $tuu) {
		    if($tuu->umur <= 20){
		      $tonase_unsur_nssc[$tuu->umur] += $tuu->tonase;
		    }
		    else{
		      $tonase_unsur_nssc['>20'] += $tuu->tonase;
		    }
		  }
		}
	  $query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSSC', '5', 'N', $n_unsur_nssc[5] / $tonase_unsur_nssc[5]);
		$query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSSC', '8', 'N', $n_unsur_nssc[8] / $tonase_unsur_nssc[8]);
		$query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSSC', '12', 'N', $n_unsur_nssc[12] / $tonase_unsur_nssc[12]);
		$query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSSC', '19', 'N', $n_unsur_nssc[19] / $tonase_unsur_nssc[19]);
		$query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSSC', '>20', 'N', $n_unsur_nssc['>20'] / $tonase_unsur_nssc['>20']);
	  $query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSSC', '5', 'P', $p_unsur_nssc[5] / $tonase_unsur_nssc[5]);
		$query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSSC', '8', 'P', $p_unsur_nssc[8] / $tonase_unsur_nssc[8]);
		$query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSSC', '12', 'P', $p_unsur_nssc[12] / $tonase_unsur_nssc[12]);
		$query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSSC', '19', 'P', $p_unsur_nssc[19] / $tonase_unsur_nssc[19]);
		$query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSSC', '>20', 'P', $p_unsur_nssc['>20'] / $tonase_unsur_nssc['>20']);
	  $query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSSC', '5', 'K', $k_unsur_nssc[5] / $tonase_unsur_nssc[5]);
		$query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSSC', '8', 'K', $k_unsur_nssc[8] / $tonase_unsur_nssc[8]);
		$query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSSC', '12', 'K', $k_unsur_nssc[12] / $tonase_unsur_nssc[12]);
		$query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSSC', '19', 'K', $k_unsur_nssc[19] / $tonase_unsur_nssc[19]);
		$query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSSC', '>20', 'K', $k_unsur_nssc['>20'] / $tonase_unsur_nssc['>20']);
	  $query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSSC', '5', 'MG', $mg_unsur_nssc[5] / $tonase_unsur_nssc[5]);
		$query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSSC', '8', 'MG', $mg_unsur_nssc[8] / $tonase_unsur_nssc[8]);
		$query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSSC', '12', 'MG', $mg_unsur_nssc[12] / $tonase_unsur_nssc[12]);
		$query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSSC', '19', 'MG', $mg_unsur_nssc[19] / $tonase_unsur_nssc[19]);
		$query = $this->UpdatePG_model->set_unsur_umur_pg($pg, 'NSSC', '>20', 'MG', $mg_unsur_nssc['>20'] / $tonase_unsur_nssc['>20']);

		//On success
		echo ("
			<script>
				window.location.href = '/PIS/admin';
				alert('Berhasil di update ".$pg."');
			</script>
		");
	}

	public function update_hpp(){
		$wilayah = $this->input->get('wilayah');

		$hpp_lokasi = $this->HPP_model->get_hpp_lokasi($wilayah);

		//echo "<pre>";
		//var_dump($hpp_lokasi);
		//echo "</pre>";
		//die();
		foreach ($hpp_lokasi as $hl) {
			//Real
			$query = $this->Raport_model->set_real_lokasi($hl->pg, $hl->wilayah, $hl->lokasi, $hl->status, $hl->bulan, 'T0', 'Real', 'ZN01', $hl->ZN01, 0);
			$query = $this->Raport_model->set_real_lokasi($hl->pg, $hl->wilayah, $hl->lokasi, $hl->status, $hl->bulan, 'T0', 'Real', 'ZN02', $hl->ZN02, 0);
			$query = $this->Raport_model->set_real_lokasi($hl->pg, $hl->wilayah, $hl->lokasi, $hl->status, $hl->bulan, 'T0', 'Real', 'ZN03', $hl->ZN03, 0);
			$query = $this->Raport_model->set_real_lokasi($hl->pg, $hl->wilayah, $hl->lokasi, $hl->status, $hl->bulan, 'T0', 'Real', 'ZN04', $hl->ZN04, 0);
			$query = $this->Raport_model->set_real_lokasi($hl->pg, $hl->wilayah, $hl->lokasi, $hl->status, $hl->bulan, 'T0', 'Real', 'ZN05', $hl->ZN05, 0);
			$query = $this->Raport_model->set_real_lokasi($hl->pg, $hl->wilayah, $hl->lokasi, $hl->status, $hl->bulan, 'T0', 'Real', 'ZN06', $hl->ZN06, 0);
			$query = $this->Raport_model->set_real_lokasi($hl->pg, $hl->wilayah, $hl->lokasi, $hl->status, $hl->bulan, 'T0', 'Real', 'ZN07', $hl->ZN07, 0);
			$query = $this->Raport_model->set_real_lokasi($hl->pg, $hl->wilayah, $hl->lokasi, $hl->status, $hl->bulan, 'T0', 'Real', 'ZN08', $hl->ZN08, 0);
			$query = $this->Raport_model->set_real_lokasi($hl->pg, $hl->wilayah, $hl->lokasi, $hl->status, $hl->bulan, 'T0', 'Real', 'ZN09', $hl->ZN09, 0);
			$query = $this->Raport_model->set_real_lokasi($hl->pg, $hl->wilayah, $hl->lokasi, $hl->status, $hl->bulan, 'T0', 'Real', 'ZN10', $hl->ZN10, 0);
			$query = $this->Raport_model->set_real_lokasi($hl->pg, $hl->wilayah, $hl->lokasi, $hl->status, $hl->bulan, 'T0', 'Real', 'ZN11', $hl->ZN11, 0);
			$query = $this->Raport_model->set_real_lokasi($hl->pg, $hl->wilayah, $hl->lokasi, $hl->status, $hl->bulan, 'T0', 'Real', 'ZN12', $hl->ZN12, 0);
			$query = $this->Raport_model->set_real_lokasi($hl->pg, $hl->wilayah, $hl->lokasi, $hl->status, $hl->bulan, 'T0', 'Real', 'ZN13', $hl->ZN13, 0);
			$query = $this->Raport_model->set_real_lokasi($hl->pg, $hl->wilayah, $hl->lokasi, $hl->status, $hl->bulan, 'T0', 'Real', 'ZN14', $hl->ZN14, 0);
			$query = $this->Raport_model->set_real_lokasi($hl->pg, $hl->wilayah, $hl->lokasi, $hl->status, $hl->bulan, 'T0', 'Real', 'ZN15', $hl->ZN15, 0);
			//Actual
			$query = $this->Raport_model->set_real_lokasi($hl->pg, $hl->wilayah, $hl->lokasi, $hl->status, $hl->bulan, 'T0', 'Actual', 'ZN01', $hl->ZN01, 0);
			$query = $this->Raport_model->set_real_lokasi($hl->pg, $hl->wilayah, $hl->lokasi, $hl->status, $hl->bulan, 'T0', 'Actual', 'ZN02', $hl->ZN02, 0);
			$query = $this->Raport_model->set_real_lokasi($hl->pg, $hl->wilayah, $hl->lokasi, $hl->status, $hl->bulan, 'T0', 'Actual', 'ZN03', $hl->ZN03, 0);
			$query = $this->Raport_model->set_real_lokasi($hl->pg, $hl->wilayah, $hl->lokasi, $hl->status, $hl->bulan, 'T0', 'Actual', 'ZN04', $hl->ZN04, 0);
			$query = $this->Raport_model->set_real_lokasi($hl->pg, $hl->wilayah, $hl->lokasi, $hl->status, $hl->bulan, 'T0', 'Actual', 'ZN05', $hl->ZN05, 0);
			$query = $this->Raport_model->set_real_lokasi($hl->pg, $hl->wilayah, $hl->lokasi, $hl->status, $hl->bulan, 'T0', 'Actual', 'ZN06', $hl->ZN06, 0);
			$query = $this->Raport_model->set_real_lokasi($hl->pg, $hl->wilayah, $hl->lokasi, $hl->status, $hl->bulan, 'T0', 'Actual', 'ZN07', $hl->ZN07, 0);
			$query = $this->Raport_model->set_real_lokasi($hl->pg, $hl->wilayah, $hl->lokasi, $hl->status, $hl->bulan, 'T0', 'Actual', 'ZN08', $hl->ZN08, 0);
			$query = $this->Raport_model->set_real_lokasi($hl->pg, $hl->wilayah, $hl->lokasi, $hl->status, $hl->bulan, 'T0', 'Actual', 'ZN09', $hl->ZN09, 0);
			$query = $this->Raport_model->set_real_lokasi($hl->pg, $hl->wilayah, $hl->lokasi, $hl->status, $hl->bulan, 'T0', 'Actual', 'ZN10', $hl->ZN10, 0);
			$query = $this->Raport_model->set_real_lokasi($hl->pg, $hl->wilayah, $hl->lokasi, $hl->status, $hl->bulan, 'T0', 'Actual', 'ZN11', $hl->ZN11, 0);
			$query = $this->Raport_model->set_real_lokasi($hl->pg, $hl->wilayah, $hl->lokasi, $hl->status, $hl->bulan, 'T0', 'Actual', 'ZN12', $hl->ZN12, 0);
			$query = $this->Raport_model->set_real_lokasi($hl->pg, $hl->wilayah, $hl->lokasi, $hl->status, $hl->bulan, 'T0', 'Actual', 'ZN13', $hl->ZN13, 0);
			$query = $this->Raport_model->set_real_lokasi($hl->pg, $hl->wilayah, $hl->lokasi, $hl->status, $hl->bulan, 'T0', 'Actual', 'ZN14', $hl->ZN14, 0);
			$query = $this->Raport_model->set_real_lokasi($hl->pg, $hl->wilayah, $hl->lokasi, $hl->status, $hl->bulan, 'T0', 'Actual', 'ZN15', $hl->ZN15, 0);

			$query = $this->Raport_model->set_luas_tonase_lokasi($hl->pg, $hl->wilayah, $hl->lokasi, $hl->status, $hl->bulan, 'T0', $hl->luas, $hl->tonase);
		}

		//On success
		if($wilayah == 'W14'){
			echo ("
				<script>
					window.location.href = '/PIS/admin';
					alert('Berhasil di update HPP Raport ".$wilayah."');
				</script>
			");
		}
		else{
			$cek_wil = substr($wilayah, 1, 2) + 1;
			if($cek_wil < 10){
				$cek_wil = '0'.$cek_wil;
			}
			else{
				if($cek_wil == 10){
					$cek_wil = 11;
				}
			}
			echo ("
				<script>
					window.location.href = '/PIS/admin/update_hpp?wilayah=W".$cek_wil."';
				</script>
			");
		}
	}
}
