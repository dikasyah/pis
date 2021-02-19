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
		$total_excellent_ha = 0;
		$total_good_ha = 0;
		$total_poor_ha = 0;
		$total_excellent_kg = 0;
		$total_good_kg = 0;
		$total_poor_kg = 0;
		$standart_panen = array(
			'B' => $this->Produksi_model->get_standart_produksi_code('B'),
			'S' => $this->Produksi_model->get_standart_produksi_code('S'),
			'K' => $this->Produksi_model->get_standart_produksi_code('K')
		);
		$tgl_irrigation = array(
			'start' => $this->Konstanta_model->get_konstanta_code('TGL_TARIK_DATA'),
			'finish' => $this->Konstanta_model->get_konstanta_code('TGL_IRRIGATION_FINISH')
		);
		$tgl_irrigation_t1 = array(
			'start' => $this->Konstanta_model->get_konstanta_code('TGL_IRRIGATION_START_T1'),
			'finish' => $this->Konstanta_model->get_konstanta_code('TGL_IRRIGATION_FINISH_T1')
		);
		$konstanta = $this->Konstanta_model->get_konstanta_code("TGL_TARIK_DATA");

		foreach ($lokasi_aktif as $la) {
			//Deklarasi
			$lokasi = $this->Lokasi_model->get_lokasi_code($la->lokasi_aktif);
			$perlocation = $this->Performance_model->get_perlocation($la->lokasi_aktif);
			$histori_lokasi_sebelumnya = $this->HistoriLokasi_model->get_histori_lokasi_code_before_NS($la->lokasi_aktif);
			$koreksi = $this->Koreksi_model->get_koreksi_code($la->lokasi_aktif);
			$tonase_panen = array(
				'alami' => $this->TonasePanen_model->get_tonase_panen_code($la->lokasi_aktif, "Alami", $la->kebun),
				'reguler' => $this->TonasePanen_model->get_tonase_panen_code($la->lokasi_aktif, "Reguler", $la->kebun)
			);
			$produksi_alami = $tonase_panen['alami']['produksi_ton'] * 1000;
			$produksi_mekanis = $tonase_panen['reguler']['produksi_ton'] * 1000;
			$kelas_bibit = $perlocation['kelas_bibit'];
			if((substr($lokasi["status"],2,2) == 'BB') || (substr($lokasi["status"],2,2) == 'ST') || (substr($lokasi["status"],2,2) == 'BK')){
				$cek_status = $this->DataMaster_model->cek_current_status($lokasi['lokasi'], $lokasi['kebun']);
				if($cek_status['status'] != NULL){
					$lokasi["status"] = $cek_status['status'];
				}
				else{
					$lokasi["status"] = substr($lokasi["status"],0,4);
				}
			}
			else{
				$lokasi["status"] = substr($lokasi["status"],0,4);
			}
			$target = $this->Target_model->get_target_lokasi($lokasi["status"]);
			// $produksi = $this->Produksi_model->get_produksi_code($la->lokasi_aktif, $lokasi["status"]);
			// $cek_produksi_t1 = 0;
			// if($produksi == NULL){
			// 	$cek_produksi_t1 = 1;
			// 	$produksi = $this->Produksi_model->get_produksi_t1_code($la->lokasi_aktif, $lokasi["status"]);
			// }
			// if($perlocation['tgl_rencana_panen'] != NULL && $cek_produksi_t1 == 0){
			// 	$tgl_panen = $perlocation['tgl_rencana_panen'];
			// }
			// else{
			// 	if($perlocation['status'] == 'NSFC'){
			// 		switch ($kelas_bibit) {
			// 			case 'B':
			// 				$tgl_panen = date('Y-m-d', strtotime($perlocation['tgl_mulai_rawat']) + (86400 * 457));
			// 				break;
			// 			case 'S':
			// 				$tgl_panen = date('Y-m-d', strtotime($perlocation['tgl_mulai_rawat']) + (86400 * 518));
			// 				break;
			// 			case 'K':
			// 				$tgl_panen = date('Y-m-d', strtotime($perlocation['tgl_mulai_rawat']) + (86400 * 579));
			// 				break;
			// 		}
			// 	}
			// 	else{
			// 		$tgl_panen = date('Y-m-d', strtotime($perlocation['tgl_mulai_rawat']) + (86400 * 396));
			// 	}
			// }
			$produksi = $this->Produksi_model->get_produksi_code($la->lokasi_aktif, $lokasi["status"]);
			$cek_produksi_t1 = 0;
			if($produksi == NULL){
				$cek_produksi_t1 = 1;
				$produksi = $this->Produksi_model->get_produksi_t1_code($la->lokasi_aktif, $lokasi["status"]);
			}
			// if(date('Y', strtotime($tgl_panen)) == date('Y', strtotime($konstanta['nilai'])) && $produksi == NULL){
			// 	$tgl_panen = date('Y-m-d', strtotime($tgl_panen) + (86400 * 91.5));
			// }
			$std_yield = $this->StdYield_model->get_std_yield_code($lokasi["status"]);
			$ZN01_real = $this->DataMaster_model->get_real_actual_code($la->lokasi_aktif, substr($lokasi["status"], 0, 4), 'ZN01');
			$ZN03_real = $this->DataMaster_model->get_real_actual_code($la->lokasi_aktif, substr($lokasi["status"], 0, 4), 'ZN03');
			$ZN04_real = $this->DataMaster_model->get_real_actual_code($la->lokasi_aktif, substr($lokasi["status"], 0, 4), 'ZN04');
			$ZN03_hko = $this->DataMaster_model->get_hko_ZN03_code($la->lokasi_aktif, $lokasi["kebun"]);
			$cek_ZN03 = 1;
			if($ZN03_real == NULL){
				$ZN01_real = $this->DataMaster_model->get_element_cost_code_jenis($la->lokasi_aktif, "ZN01", $lokasi["kebun"]);
				$ZN03_real = $this->DataMaster_model->get_element_cost_code_jenis($la->lokasi_aktif, "ZN03", $lokasi["kebun"]);
				$ZN04_real = $this->DataMaster_model->get_element_cost_code_jenis($la->lokasi_aktif, "ZN04", $lokasi["kebun"]);
				$cek_ZN03 = 0;
			}
			$element_cost_real = array(
				'ZN01' => $ZN01_real,
				'ZN02' => $this->DataMaster_model->get_element_cost_code_jenis($la->lokasi_aktif, "ZN02", $lokasi["kebun"]),
				'ZN03' => $ZN03_real,
				'ZN04' => $ZN04_real,
				'ZN05' => $this->DataMaster_model->get_element_cost_code_jenis($la->lokasi_aktif, "ZN05", $lokasi["kebun"]),
				'ZN06' => $this->DataMaster_model->get_element_cost_code_jenis($la->lokasi_aktif, "ZN06", $lokasi["kebun"]),
				'ZN07' => $this->DataMaster_model->get_element_cost_code_jenis($la->lokasi_aktif, "ZN07", $lokasi["kebun"]),
				'ZN08' => $this->DataMaster_model->get_element_cost_code_jenis($la->lokasi_aktif, "ZN08", $lokasi["kebun"]),
				'ZN09' => $this->DataMaster_model->get_element_cost_code_jenis($la->lokasi_aktif, "ZN09", $lokasi["kebun"]),
				'ZN10' => $this->DataMaster_model->get_element_cost_code_jenis($la->lokasi_aktif, "ZN10", $lokasi["kebun"]),
				'ZN11' => $this->DataMaster_model->get_element_cost_code_jenis($la->lokasi_aktif, "ZN11", $lokasi["kebun"]),
				'ZN12' => $this->DataMaster_model->get_element_cost_code_jenis($la->lokasi_aktif, "ZN12", $lokasi["kebun"]),
				'ZN13' => $this->DataMaster_model->get_element_cost_code_jenis($la->lokasi_aktif, "ZN13", $lokasi["kebun"]),
				'ZN14' => $this->DataMaster_model->get_element_cost_code_jenis($la->lokasi_aktif, "ZN14", $lokasi["kebun"]),
				'ZN15' => $this->DataMaster_model->get_element_cost_code_jenis($la->lokasi_aktif, "ZN15", $lokasi["kebun"])
			);
		  if($produksi == NULL){
		    if($lokasi['tgl_panen_rencana'] != NULL){
		      $tgl_panen = $lokasi['tgl_panen_rencana'];
		    }
		    else{
					if($lokasi["tgl_mulai_rawat"] != NULL){
			      if(substr($lokasi['status'], 0, 4) != 'NSSC'){
			        $tgl_panen = strtotime($lokasi["tgl_mulai_rawat"]) + $standart_panen[substr($lokasi['bibit'], 6, 1)]['bulan'] * 30.4583333333333 * 86400;
			      }
			      else{
			        $tgl_panen = strtotime($lokasi["tgl_mulai_rawat"]) + 13 * 30.5 * 86400;
			      }

				    if(date('Y', strtotime($tgl_panen)) == date('Y', strtotime($konstanta['nilai']))){
				      $tgl_panen = date('Y-m-d', strtotime($tgl_panen) + (86400 * 91.5));
				    }
					}
					else{
						$tgl_panen = NULL;
					}
		    }
		  }
		  else{
		    $tgl_panen = $produksi['real_dan_sisa_rencana_tgl_selesai_panen'];
		  }
			$tgl_panen = date('Y-m-d', strtotime($tgl_panen));
			if(date('Y', strtotime($tgl_panen)) == date('Y', strtotime($konstanta['nilai']))){
				$element_cost_f = array(
					'ZN01' => $this->Forecast_model->get_element_cost_code_jenis($la->lokasi_aktif, "ZN01", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN02' => $this->Forecast_model->get_element_cost_code_jenis($la->lokasi_aktif, "ZN02", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN03' => $this->Forecast_model->get_element_cost_code_jenis($la->lokasi_aktif, "ZN03", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN04' => $this->Forecast_model->get_element_cost_code_jenis($la->lokasi_aktif, "ZN04", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN05' => $this->Forecast_model->get_element_cost_code_jenis($la->lokasi_aktif, "ZN05", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN06' => $this->Forecast_model->get_element_cost_code_jenis($la->lokasi_aktif, "ZN06", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN07' => $this->Forecast_model->get_element_cost_code_jenis($la->lokasi_aktif, "ZN07", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN081' => $this->Forecast_model->get_element_cost_code_jenis($la->lokasi_aktif, "ZN08", 1),
					'ZN082' => $this->Forecast_model->get_element_cost_code_jenis($la->lokasi_aktif, "ZN08", 2),
					'ZN083' => $this->Forecast_model->get_element_cost_code_jenis($la->lokasi_aktif, "ZN08", 3),
					'ZN09' => $this->Forecast_model->get_element_cost_code_jenis($la->lokasi_aktif, "ZN09", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN10' => $this->Forecast_model->get_element_cost_code_jenis($la->lokasi_aktif, "ZN10", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN11' => $this->Forecast_model->get_element_cost_code_jenis($la->lokasi_aktif, "ZN11", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN12' => $this->Forecast_model->get_element_cost_code_jenis($la->lokasi_aktif, "ZN12", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN13' => $this->Forecast_model->get_element_cost_code_jenis($la->lokasi_aktif, "ZN13", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN14' => $this->Forecast_model->get_element_cost_code_jenis($la->lokasi_aktif, "ZN14", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN15' => $this->Forecast_model->get_element_cost_code_jenis($la->lokasi_aktif, "ZN15", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333))
				);
			}
			else{
				$element_cost_f = array(
					'ZN01' => $this->Forecast_model->get_element_cost_code_jenis_t1($la->lokasi_aktif, "ZN01", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN02' => $this->Forecast_model->get_element_cost_code_jenis_t1($la->lokasi_aktif, "ZN02", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN03' => $this->Forecast_model->get_element_cost_code_jenis_t1($la->lokasi_aktif, "ZN03", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN04' => $this->Forecast_model->get_element_cost_code_jenis_t1($la->lokasi_aktif, "ZN04", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN05' => $this->Forecast_model->get_element_cost_code_jenis_t1($la->lokasi_aktif, "ZN05", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN06' => $this->Forecast_model->get_element_cost_code_jenis_t1($la->lokasi_aktif, "ZN06", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN07' => $this->Forecast_model->get_element_cost_code_jenis_t1($la->lokasi_aktif, "ZN07", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN081' => $this->Forecast_model->get_element_cost_code_jenis_t1($la->lokasi_aktif, "ZN08", 1),
					'ZN082' => $this->Forecast_model->get_element_cost_code_jenis_t1($la->lokasi_aktif, "ZN08", 2),
					'ZN083' => $this->Forecast_model->get_element_cost_code_jenis_t1($la->lokasi_aktif, "ZN08", 3),
					'ZN09' => $this->Forecast_model->get_element_cost_code_jenis_t1($la->lokasi_aktif, "ZN09", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN10' => $this->Forecast_model->get_element_cost_code_jenis_t1($la->lokasi_aktif, "ZN10", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN11' => $this->Forecast_model->get_element_cost_code_jenis_t1($la->lokasi_aktif, "ZN11", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN12' => $this->Forecast_model->get_element_cost_code_jenis_t1($la->lokasi_aktif, "ZN12", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN13' => $this->Forecast_model->get_element_cost_code_jenis_t1($la->lokasi_aktif, "ZN13", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN14' => $this->Forecast_model->get_element_cost_code_jenis_t1($la->lokasi_aktif, "ZN14", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333)),
					'ZN15' => $this->Forecast_model->get_element_cost_code_jenis_t1($la->lokasi_aktif, "ZN15", ceil((strtotime($konstanta["nilai"]) - strtotime($lokasi["tgl_mulai_rawat"])) / 86400 / 30.4583333333333))
				);
			}
			$forecast_overhead = array(
				'ZN04' => $this->ForecastOverhead_model->get_forecast_overhead_code("ZN04", substr($lokasi["status"], 0, 4), date('n', strtotime($tgl_panen))),
				'ZN05' => $this->ForecastOverhead_model->get_forecast_overhead_code("ZN05", substr($lokasi["status"], 0, 4), date('n', strtotime($tgl_panen))),
				'ZN06' => $this->ForecastOverhead_model->get_forecast_overhead_code("ZN06", substr($lokasi["status"], 0, 4), date('n', strtotime($tgl_panen))),
				'ZN10' => $this->ForecastOverhead_model->get_forecast_overhead_code("ZN10", substr($lokasi["status"], 0, 4), date('n', strtotime($tgl_panen))),
				'ZN13' => $this->ForecastOverhead_model->get_forecast_overhead_code("ZN13", substr($lokasi["status"], 0, 4), date('n', strtotime($tgl_panen)))
			);

			//Proccess
			if($produksi == NULL){
		    $tonase = $std_yield['yield'] * $lokasi['luas'];
				$luas = $lokasi['luas'];
		  }
		  else{
		    $tonase = $produksi['real_dan_sisa_rencana_tonase'];
				$luas = $produksi['real_dan_sisa_rencana_luas'];
		  }
			if($perlocation['status'] == 'NSSC'){
				if(substr($histori_lokasi_sebelumnya['kode_bibit_lokasi'], 5, 1) == 'C'){
					$jenis_bibit = "CR";
				}
				else if(substr($histori_lokasi_sebelumnya['kode_bibit_lokasi'], 5, 1) == 'S'){
					$jenis_bibit = "SC";
				}
				else if(substr($histori_lokasi_sebelumnya['kode_bibit_lokasi'], 5, 1) == 'N'){
					$jenis_bibit = "AN";
				}
				else if(substr($histori_lokasi_sebelumnya['kode_bibit_lokasi'], 5, 1) == 'T'){
					$jenis_bibit = "SO";
				}
				else{
					$jenis_bibit = "";
				}
				$varian_bibit = substr($histori_lokasi_sebelumnya['kode_bibit_lokasi'], 2, 3);
				$kelas_bibit = substr($histori_lokasi_sebelumnya['kode_bibit_lokasi'], 6, 1);
			}
			else{
				$jenis_bibit = $perlocation['jenis_bibit'];
				$varian_bibit = $perlocation['varian_bibit'];
				$kelas_bibit = $perlocation['kelas_bibit'];
			}
			// if($perlocation['tgl_rencana_forcing'] != NULL){
			// 	$tgl_rencana_forcing = $perlocation['tgl_rencana_forcing'];
			// }
		  if($lokasi['status'] == "NSBB" || $lokasi['status'] == "NSBK"){
		    echo "-";
		    $tgl_rencana_forcing = NULL;
		  }
			else{
			// 	if($perlocation['status'] == 'NSFC'){
			// 		switch ($kelas_bibit) {
			// 			case 'B':
			// 				$tgl_rencana_forcing = date('Y-m-d', strtotime($perlocation['tgl_mulai_rawat']) + ((86400 * 10) * 30.4583333333333));
			// 				break;
			// 			case 'S':
			// 				$tgl_rencana_forcing = date('Y-m-d', strtotime($perlocation['tgl_mulai_rawat']) + ((86400 * 12) * 30.4583333333333));
			// 				break;
			// 			case 'K':
			// 				$tgl_rencana_forcing = date('Y-m-d', strtotime($perlocation['tgl_mulai_rawat']) + ((86400 * 14) * 30.4583333333333));
			// 				break;
			// 		}
			// 	}
			// 	else{
				$tgl_rencana_forcing = strtotime($tgl_panen) - (152 * 86400);
				// }
			}
			$group_cost = array(
				'labour' => $this->GroupCost_model->get_group_cost_code_jenis($la->lokasi_aktif, "Labour", $lokasi["kebun"]),
				'charge' => $this->GroupCost_model->get_group_cost_code_jenis($la->lokasi_aktif, "Charge", $lokasi["kebun"]),
				'material' => $this->GroupCost_model->get_group_cost_code_jenis($la->lokasi_aktif, "Material", $lokasi["kebun"]),
				'bibit' => $this->GroupCost_model->get_group_cost_code_jenis($la->lokasi_aktif, "Bibit", $lokasi["kebun"]),
				'total' => $this->GroupCost_model->get_group_cost_all_code($la->lokasi_aktif, $lokasi["kebun"])
			);
		  if($lokasi['status'] == 'NSFC'){
		    if($cek_ZN03 == 1){
		      $group_cost_bibit = ($element_cost_real['ZN03']['total']) - $ZN03_hko['hko_per_ha'];
		    }
		    else{
		      if(strtotime($perlocation['tgl_mulai_rawat']) >= strtotime('2019-05-01')){
		        $group_cost_bibit = $group_cost['bibit']['total'] + (1000000 * $luas);
		      }
		      else{
		        $group_cost_bibit = $group_cost['bibit']['total'] + (3676535.88918288 * $luas);
		      }
		    }
		  }
		  else{
		    $group_cost_bibit = $group_cost['bibit']['total'];
		  }
			echo ("
				<table border='1'>
					<thead>
						<tr>
							<th>Real (Rp/Ha)</th>
							<th>Real (Rp/Kg)</th>
							<th>R+F (Rp/Ha)</th>
							<th>R+F (Rp/Kg)</th>
						</tr>
					</thead>
					<tbody>
			");
		  $total_bpp_ha = 0;
		  $total_bpp_kg = 0;
		  $total_real_ha = 0;
		  $total_real_kg = 0;
		  $total_rf_ha = 0;
		  $total_rf_kg = 0;
		  $total_category_ha = 0;
		  $total_category_kg = 0;
			$raport_real = 0;
			$raport_forecast_real = 0;
			$raport_forecast_actual = 0;

		  foreach ($element_cost as $ec) {
				$raport_real = 0;
				$raport_forecast_real = 0;
				$raport_forecast_actual = 0;
		    //Forecast
		    if(date('Y', strtotime($tgl_panen)) == date('Y', strtotime($konstanta['nilai']))){
		      if($target[$ec->code] != NULL){
		        $bpp_ha = $target[$ec->code];
		        $bpp_kg = ($target[$ec->code] * $luas) / $tonase / 1000;
		      }
		      else{
		        if($lokasi['status'] == 'NSFC'){
				      $bpp_ha = $ec->NSFC_ha;
				      $bpp_kg = $ec->NSFC_kg;
		        }
		        else if($lokasi['status'] == 'NSSC'){
				      $bpp_ha = $ec->NSSC_ha;
				      $bpp_kg = $ec->NSSC_kg;
		        }
		      }
		    }
		    else{
		      if($lokasi['status'] == 'NSFC'){
						$bpp_ha = $ec->NSFC_ha_t1;
						$bpp_kg = $ec->NSFC_kg_t1;
		      }
		      else if($lokasi['status'] == 'NSSC'){
						$bpp_ha = $ec->NSSC_ha_t1;
						$bpp_kg = $ec->NSSC_kg_t1;
		      }
		    }
				$total_bpp_ha += $bpp_ha;
				$total_bpp_kg += $bpp_kg;

		    //Forecast Overhead
		    $over = 0;
		    if(isset($forecast_overhead[$ec->code]['fo'])){
		      $fo = $forecast_overhead[$ec->code]['fo'];
		    }
		    else{
		      $fo = 0;
		    }

				if($ec->code == 'ZN04'){
					//die($fo);
				}
		    switch ($ec->code) {
		      case 'ZN03':
		        if($lokasi['status'] == 'NSFC'){
		          if($cek_ZN03 == 1){
								$total_category_ha += ($element_cost_real[$ec->code]['total'] / $luas) + $element_cost_f[$ec->code]['rp_per_ha'];
								$total_category_kg += (($element_cost_real[$ec->code]['total']) + ($element_cost_f[$ec->code]['rp_per_ha'] * $luas) + (1000000 * $luas)) / $tonase / 1000;
		          }
		          else{
		            if(strtotime($perlocation['tgl_mulai_rawat']) >= strtotime('2019-05-01')){
				          $total_category_ha += ($element_cost_real[$ec->code]['total'] / $luas) + $element_cost_f[$ec->code]['rp_per_ha'] + 1000000;
				          $total_category_kg += ($element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $luas) + (1000000 * $luas)) / $tonase / 1000;
		            }
		            else{
				          $total_category_ha += ($element_cost_real[$ec->code]['total'] / $luas) + $element_cost_f[$ec->code]['rp_per_ha'] + 3676535.88918288;
				          $total_category_kg += ($element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $luas) + (3676535.88918288 * $luas)) / $tonase / 1000;
		            }
		          }
		        }
		        else {
		          $total_category_ha += 0;
		          $total_category_kg += 0;
		        }
		        break;
		      case 'ZN04':
		          if(substr($tgl_panen, 0, 4) == (date('Y', strtotime($konstanta['nilai'])))){
		            if($lokasi['status'] == 'NSFC'){
				          $total_category_ha += ($element_cost_real[$ec->code]['total'] / $luas) + (1300000 + (1300000 * $fo));
				          $total_category_kg += ($element_cost_real[$ec->code]['total'] + (1300000 + (1300000 * $fo))) / $tonase / 1000;
		            }
		            else{
				          $total_category_ha += ($element_cost_real[$ec->code]['total'] / $luas) + (890000 + (890000 * $fo));
				          $total_category_kg += ($element_cost_real[$ec->code]['total'] + (890000 + (890000 * $fo))) / $tonase / 1000;
		            }
		          }
		          else{
								$total_category_ha += ($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f[$ec->code]['rp_per_ha'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $fo));
								$total_category_kg += ($element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $fo))) / $tonase / 1000;
		          }
		        break;
		      case 'ZN05':
		        //Work on
		        $hari_tarik_data = strtotime($konstanta['nilai']);
		        $hari_perawatan = strtotime($perlocation['tgl_mulai_rawat']);
		        $hari_rencana_forcing = ($tgl_rencana_forcing);
		        if($lokasi['status'] == 'NSFC'){
		          if(($hari_tarik_data - $hari_perawatan) > (80 * 86400)){
		            $jml_sesudah = (($hari_rencana_forcing - (104 * 86400)) - $hari_tarik_data) / (20 * 86400);
		          }
		          else{
		            $jml_sesudah = ((($hari_rencana_forcing - (104 * 86400)) - ($hari_perawatan + (80 * 86400))) / (20 * 86400));
		          }
		        }
		        else if($lokasi['status'] == 'NSSC'){
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
		        if($lokasi['status'] == 'NSFC'){
		          if(($hari_rencana_forcing - $hari_tarik_data) > (104 * 86400)){
		            $jml_sebelum = 104 / 15;
		          }
		          else{
		            $jml_sebelum = ($hari_rencana_forcing - $hari_tarik_data) / (15 * 86400);
		          }
		        }
		        else if($lokasi['status'] == 'NSSC'){
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
		        if($lokasi['status'] == 'NSFC'){
		            if(($hari_tarik_data - $hari_perawatan) < (60 * 86400)){
		              $tambahan = 2068249.63690476;
		            }
		            else{
		              $tambahan = 0;
		            }
		            $f_ZN05 = (($jml_sesudah + $jml_sebelum) * 19454856 / 14) + $tambahan;
		        }
		        else if($lokasi['status'] == 'NSSC'){
		            $f_ZN05 = ($jml_sesudah + $jml_sebelum) * 8083566 / 9;
		        }
		        else{
		            $f_ZN05 = 0;
		        }

						if($lokasi['status'] == 'NSFC' || $lokasi['status'] == 'NSSC'){
							if(($element_cost_real['ZN10']['total'] / $tonase / 1000) < 100 || ($ec->code == 'ZN11')){
								if(isset($koreksi[$ec->code])){
									if((($element_cost_real[$ec->code]['total'] / $luas) + ($f_ZN05 + ($f_ZN05 * $fo))) * $koreksi[$ec->code] >= ($element_cost_real[$ec->code]['total'] / $luas)){
										$total_category_ha += (($element_cost_real[$ec->code]['total'] / $luas) + ($f_ZN05 + ($f_ZN05 * $fo))) * $koreksi[$ec->code];
										$total_category_kg += (($element_cost_real[$ec->code]['total'] / $tonase / 1000) + ((($f_ZN05 * $luas) + (($f_ZN05 * $luas) * $fo)) / $tonase / 1000)) * $koreksi[$ec->code];
									}
									else{
										$total_category_ha += ($element_cost_real[$ec->code]['total'] / $luas);
										$total_category_kg += $element_cost_real[$ec->code]['total'] / $tonase / 1000;
									}
								}
								else{
									$total_category_ha += ($element_cost_real[$ec->code]['total'] / $luas) + ($f_ZN05 + ($f_ZN05 * $fo));
									$total_category_kg += ($element_cost_real[$ec->code]['total'] / $tonase / 1000) + ((($f_ZN05 * $luas) + (($f_ZN05 * $luas) * $fo)) / $tonase / 1000);
								}
							}
							else{
								$total_category_ha += ($element_cost_real[$ec->code]['total'] / $luas);
								$total_category_kg += ($element_cost_real[$ec->code]['total'] / $tonase / 1000);
							}
						}
						else {
							$total_category_ha += 0;
							$total_category_kg += 0;
						}
		        break;
		      case 'ZN06':
		      case 'ZN07':
		      case 'ZN11':
		        if($lokasi['status'] == 'NSFC' || $lokasi['status'] == 'NSSC'){
		          if(($element_cost_real['ZN10']['total'] / $tonase / 1000) < 100 || ($ec->code == 'ZN11')){
		            if(isset($koreksi[$ec->code])){
		              if((($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f[$ec->code]['rp_per_ha'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $fo))) * $koreksi[$ec->code] >= ($element_cost_real[$ec->code]['total'] / $luas)){
		                $total_category_ha += (($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f[$ec->code]['rp_per_ha'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $fo))) * $koreksi[$ec->code];
		                $total_category_kg += (($element_cost_real[$ec->code]['total'] / $tonase / 1000) + ((($element_cost_f[$ec->code]['rp_per_ha'] * $luas) + (($element_cost_f[$ec->code]['rp_per_ha'] * $luas) * $fo)) / $tonase / 1000)) * $koreksi[$ec->code];
		              }
		              else{
		                $total_category_ha += ($element_cost_real[$ec->code]['total'] / $luas);
										$total_category_kg += $element_cost_real[$ec->code]['total'] / $tonase / 1000;
		              }
		            }
		            else{
		              $total_category_ha += ($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f[$ec->code]['rp_per_ha'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $fo));
		              $total_category_kg += ($element_cost_real[$ec->code]['total'] / $tonase / 1000) + ((($element_cost_f[$ec->code]['rp_per_ha'] * $luas) + (($element_cost_f[$ec->code]['rp_per_ha'] * $luas) * $fo)) / $tonase / 1000);
		            }
		          }
		          else{
		            $total_category_ha += ($element_cost_real[$ec->code]['total'] / $luas);
		            $total_category_kg += ($element_cost_real[$ec->code]['total'] / $tonase / 1000);
		          }
		        }
		        else {
		          $total_category_ha += 0;
	            $total_category_kg += 0;
		        }
		        break;
		      case 'ZN01':
		      case 'ZN02':
		      case 'ZN09':
		      case 'ZN12':
		      case 'ZN14':
		      case 'ZN15':
		        if($lokasi["status"] == 'NSFC' || $lokasi["status"] == 'NSSC'){
		          if(($element_cost_real['ZN10']['total'] / $tonase / 1000) < 100 || ($ec->code == 'ZN09')){
		            if($ec->code == 'ZN09' && $element_cost_real['ZN09']['total'] > 0){
		              $total_category_ha += ($element_cost_real[$ec->code]['total'] / $luas);
		              $total_category_kg += $element_cost_real[$ec->code]['total'] / $tonase / 1000;
		            }
		            else{
		              $total_category_ha += ($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f[$ec->code]['rp_per_ha'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $fo));
		              $total_category_kg += ($element_cost_real[$ec->code]['total'] / $tonase / 1000) + ((($element_cost_f[$ec->code]['rp_per_ha'] * $luas) + (($element_cost_f[$ec->code]['rp_per_ha'] * $luas) * $fo)) / $tonase / 1000);
		            }
		          }
		          else{
		            $total_category_ha += ($element_cost_real[$ec->code]['total'] / $luas);
		            $total_category_kg += $element_cost_real[$ec->code]['total'] / $tonase / 1000;
		          }
		        }
		        else {
		          $total_category_ha += 0;
		          $total_category_kg += 0;
		        }
		        break;
		      case 'ZN10':
		      case 'ZN13':
						$total_category_ha += $bpp_ha;
						$total_category_kg += $bpp_kg;
		        break;
		      case 'ZN08':
		        if($lokasi['status'] == 'NSFC' || $lokasi['status'] == 'NSSC'){
		          if(($element_cost_real[$ec->code]['total'] / $luas) <= 500000){
		            if(isset($koreksi[$ec->code])){
		              if((($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f['ZN081']['rp_per_ha'] + ($element_cost_f['ZN081']['rp_per_ha'] * $fo))) * $koreksi[$ec->code] >= ($element_cost_real[$ec->code]['total'] / $luas)){
		                $total_category_ha += (($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f['ZN081']['rp_per_ha'] + ($element_cost_f['ZN081']['rp_per_ha'] * $fo))) * $koreksi[$ec->code];
		                $total_category_kg += (($element_cost_real[$ec->code]['total'] / $tonase / 1000) + (($element_cost_f['ZN081']['total'] + ($element_cost_f['ZN081']['total'] * $fo)) / $tonase / 1000)) * $koreksi[$ec->code];
		              }
		              else{
		                $total_category_ha += ($element_cost_real[$ec->code]['total'] / $luas);
		                $total_category_kg += $element_cost_real[$ec->code]['total'] / $tonase / 1000;
		              }
		            }
		            else{
		              $total_category_ha += ($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f['ZN081']['rp_per_ha'] + ($element_cost_f['ZN081']['rp_per_ha'] * $fo));
		              $total_category_kg += ($element_cost_real[$ec->code]['total'] / $tonase / 1000) + (($element_cost_f['ZN081']['total'] + ($element_cost_f['ZN081']['total'] * $fo)) / $tonase / 1000);
		            }
		          }
		          else if(($element_cost_real[$ec->code]['total'] / $luas) <= 1000000){
		            if(isset($koreksi[$ec->code])){
		              if((($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f['ZN082']['rp_per_ha'] + ($element_cost_f['ZN082']['rp_per_ha'] * $fo))) * $koreksi[$ec->code] >= ($element_cost_real[$ec->code]['total'] / $luas)){
		                $total_category_ha += (($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f['ZN082']['rp_per_ha'] + ($element_cost_f['ZN082']['rp_per_ha'] * $fo))) * $koreksi[$ec->code];
		                $total_category_kg += (($element_cost_real[$ec->code]['total'] / $tonase / 1000) + (($element_cost_f['ZN082']['total'] + ($element_cost_f['ZN082']['total'] * $fo)) / $tonase / 1000)) * $koreksi[$ec->code];
		              }
		              else{
		                $total_category_ha += ($element_cost_real[$ec->code]['total'] / $luas);
		                $total_category_kg += $element_cost_real[$ec->code]['total'] / $tonase / 1000;
		              }
		            }
		            else{
		              $total_category_ha += ($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f['ZN082']['rp_per_ha'] + ($element_cost_f['ZN082']['rp_per_ha'] * $fo));
		              $total_category_kg += ($element_cost_real[$ec->code]['total'] / $tonase / 1000) + (($element_cost_f['ZN082']['total'] + ($element_cost_f['ZN082']['total'] * $fo)) / $tonase / 1000);
		            }
		          }
		          else{
		            if(isset($koreksi[$ec->code])){
		              if((($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f['ZN083']['rp_per_ha'] + ($element_cost_f['ZN083']['rp_per_ha'] * $fo))) * $koreksi[$ec->code] >= ($element_cost_real[$ec->code]['total'] / $luas)){
		                $total_category_ha += (($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f['ZN083']['rp_per_ha'] + ($element_cost_f['ZN083']['rp_per_ha'] * $fo))) * $koreksi[$ec->code];
		                $total_category_kg += (($element_cost_real[$ec->code]['total'] / $tonase / 1000) + (($element_cost_f['ZN083']['total'] + ($element_cost_f['ZN083']['total'] * $fo)) / $tonase / 1000)) * $koreksi[$ec->code];
		              }
		              else{
		                $total_category_ha += ($element_cost_real[$ec->code]['total'] / $luas);
		                $total_category_kg += $element_cost_real[$ec->code]['total'] / $tonase / 1000;
		              }
		            }
		            else{
		              $total_category_ha += ($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f['ZN083']['rp_per_ha'] + ($element_cost_f['ZN083']['rp_per_ha'] * $fo));
		              $total_category_kg += ($element_cost_real[$ec->code]['total'] / $tonase / 1000) + (($element_cost_f['ZN083']['total'] + ($element_cost_f['ZN083']['total'] * $fo)) / $tonase / 1000);
		            }
		          }
		        }
		        else {
		          $total_category_ha += 0;
		          $total_category_kg += 0;
		        }
		        break;
		    }
				echo ("
            <tr>
              <td style='color:black;padding-top:0px;padding-bottom:0px;' align='right'>
				");
		    if(($element_cost_real[$ec->code]['total'] / $luas) != 0 && ($element_cost_real[$ec->code]['total'] / $luas) != NULL){
			    if($ec->code == 'ZN03' && $lokasi['status'] == 'NSFC'){
			      if($cek_ZN03 == 1){
			        echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $luas));
			        $total_real_ha += ($element_cost_real[$ec->code]['total'] / $luas);
			      }
			      else{
			        if(strtotime($perlocation['tgl_mulai_rawat']) >= strtotime('2019-05-01')){
			          echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $luas) + 1000000);
			          $total_real_ha += ($element_cost_real[$ec->code]['total'] / $luas) + 1000000;
			        }
			        else{
			          echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $luas) + 3676535.88918288);
			          $total_real_ha += ($element_cost_real[$ec->code]['total'] / $luas) + 3676535.88918288;
			        }
			      }
			    }
			    else{
			      echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $luas));
			      $total_real_ha += ($element_cost_real[$ec->code]['total'] / $luas);
			    }
		    }
		    else{
			    echo "-";
		      $total_real_ha += 0;
		    }
				echo ("
                </td>
              	<td style='color:black;padding-top:0px;padding-bottom:0px;' align='right'>
				");
		    if($element_cost_real[$ec->code]['total'] != 0 && $element_cost_real[$ec->code]['total'] != NULL){
			    if($ec->code == 'ZN03' && $lokasi['status'] == 'NSFC'){
			      if($cek_ZN03 == 1){
							echo angka_ribuan(($element_cost_real[$ec->code]['total']) / $tonase / 1000);
							$total_real_kg += ($element_cost_real[$ec->code]['total']) / $tonase / 1000;
							$raport_real = $element_cost_real[$ec->code]['total'];
			      }
			      else{
			        if(strtotime($perlocation['tgl_mulai_rawat']) >= strtotime('2019-05-01')){
					      echo angka_ribuan(($element_cost_real[$ec->code]['total'] + (1000000 * $luas)) / $tonase / 1000);
					      $total_real_kg += ($element_cost_real[$ec->code]['total'] + (1000000 * $luas)) / $tonase / 1000;
								$raport_real = $element_cost_real[$ec->code]['total'] + (1000000 * $luas);
			        }
			        else{
					      echo angka_ribuan(($element_cost_real[$ec->code]['total'] + (3676535.88918288 * $luas)) / $tonase / 1000);
					      $total_real_kg += ($element_cost_real[$ec->code]['total'] + (3676535.88918288 * $luas)) / $tonase / 1000;
								$raport_real = $element_cost_real[$ec->code]['total'] + (3676535.88918288 * $luas);
			        }
			      }
			    }
			    else{
			      echo angka_ribuan($element_cost_real[$ec->code]['total'] / $tonase / 1000);
			      $total_real_kg += $element_cost_real[$ec->code]['total'] / $tonase / 1000;
						$raport_real = $element_cost_real[$ec->code]['total'];
			    }
		    }
		    else{
			    echo "-";
		      $total_real_kg += 0;
		    }
				echo ("
                </td>
                <td style='color:black;padding-top:0px;padding-bottom:0px;' align='right'>
				");
		    if($ec->code == 'ZN08'){
			    if(($element_cost_real[$ec->code]['total'] / $luas) <= 500000){
			      if(isset($koreksi[$ec->code])){
			        if((($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f['ZN081']['rp_per_ha'] + ($element_cost_f['ZN081']['rp_per_ha'] * $fo))) * $koreksi[$ec->code] >= ($element_cost_real[$ec->code]['total'] / $luas)){
			          echo angka_ribuan((($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f['ZN081']['rp_per_ha'] + ($element_cost_f['ZN081']['rp_per_ha'] * $fo))) * $koreksi[$ec->code]);
			          $total_rf_ha += (($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f['ZN081']['rp_per_ha'] + ($element_cost_f['ZN081']['rp_per_ha'] * $fo))) * $koreksi[$ec->code];
			        }
			        else{
			          echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $luas));
			          $total_rf_ha += ($element_cost_real[$ec->code]['total'] / $luas);
			        }
			      }
			      else{
			        echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f['ZN081']['rp_per_ha'] + ($element_cost_f['ZN081']['rp_per_ha'] * $fo)));
			        $total_rf_ha += ($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f['ZN081']['rp_per_ha'] + ($element_cost_f['ZN081']['rp_per_ha'] * $fo));
			      }
			    }
			    else if(($element_cost_real[$ec->code]['total'] / $luas) <= 1000000){
			      if(isset($koreksi[$ec->code])){
			        if((($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f['ZN082']['rp_per_ha'] + ($element_cost_f['ZN082']['rp_per_ha'] * $fo))) * $koreksi[$ec->code] >= ($element_cost_real[$ec->code]['total'] / $luas)){
			          echo angka_ribuan((($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f['ZN082']['rp_per_ha'] + ($element_cost_f['ZN082']['rp_per_ha'] * $fo))) * $koreksi[$ec->code]);
			          $total_rf_ha += (($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f['ZN082']['rp_per_ha'] + ($element_cost_f['ZN082']['rp_per_ha'] * $fo))) * $koreksi[$ec->code];
			        }
			        else{
			          echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $luas));
			          $total_rf_ha += ($element_cost_real[$ec->code]['total'] / $luas);
			        }
			      }
			      else{
			        echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f['ZN082']['rp_per_ha'] + ($element_cost_f['ZN082']['rp_per_ha'] * $fo)));
			        $total_rf_ha += ($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f['ZN082']['rp_per_ha'] + ($element_cost_f['ZN082']['rp_per_ha'] * $fo));
			      }
			    }
			    else{
			      if(isset($koreksi[$ec->code])){
			        if((($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f['ZN083']['rp_per_ha'] + ($element_cost_f['ZN083']['rp_per_ha'] * $fo))) * $koreksi[$ec->code] >= ($element_cost_real[$ec->code]['total'] / $luas)){
			          echo angka_ribuan((($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f['ZN083']['rp_per_ha'] + ($element_cost_f['ZN083']['rp_per_ha'] * $fo))) * $koreksi[$ec->code]);
			          $total_rf_ha += (($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f['ZN083']['rp_per_ha'] + ($element_cost_f['ZN083']['rp_per_ha'] * $fo))) * $koreksi[$ec->code];
			        }
			        else{
			          echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $luas));
			          $total_rf_ha += ($element_cost_real[$ec->code]['total'] / $luas);
			        }
			      }
			      else{
			        echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f['ZN083']['rp_per_ha'] + ($element_cost_f['ZN083']['rp_per_ha'] * $fo)));
			        $total_rf_ha += ($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f['ZN083']['rp_per_ha'] + ($element_cost_f['ZN083']['rp_per_ha'] * $fo));
			      }
			    }
		    }
			  else if($ec->code == 'ZN03' && $lokasi['status'] == 'NSFC'){
			    if($cek_ZN03 == 1){
			      echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $luas) + $element_cost_f[$ec->code]['rp_per_ha']);
			      $total_rf_ha += ($element_cost_real[$ec->code]['total'] / $luas) + $element_cost_f[$ec->code]['rp_per_ha'];
			    }
			    else{
			      if(strtotime($perlocation['tgl_mulai_rawat']) >= strtotime('2019-05-01')){
			        echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $luas) + $element_cost_f[$ec->code]['rp_per_ha'] + 1000000);
			        $total_rf_ha += ($element_cost_real[$ec->code]['total'] / $luas) + $element_cost_f[$ec->code]['rp_per_ha'] + 1000000;
			      }
			      else{
			        echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $luas) + $element_cost_f[$ec->code]['rp_per_ha'] + 3676535.88918288);
			        $total_rf_ha += ($element_cost_real[$ec->code]['total'] / $luas) + $element_cost_f[$ec->code]['rp_per_ha'] + 3676535.88918288;
			      }
			    }
			  }
			  else if($ec->code == 'ZN04' && substr($tgl_panen, 0, 4) == date('Y', strtotime($konstanta['nilai']))){
			    if($lokasi['status'] == 'NSFC'){
			      echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $luas) + (1300000 + (1300000 * $fo)));
			      $total_rf_ha += ($element_cost_real[$ec->code]['total'] / $luas) + (1300000 + (1300000 * $fo));
			    }
			    else{
			      echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $luas) + (890000 + (890000 * $fo)));
			      $total_rf_ha += ($element_cost_real[$ec->code]['total'] / $luas) + (890000 + (890000 * $fo));
			    }
			  }
			  else if($ec->code == 'ZN05'){
			    //Work on
			    $hari_tarik_data = strtotime($konstanta['nilai']);
			    $hari_perawatan = strtotime($perlocation['tgl_mulai_rawat']);
			    $hari_rencana_forcing = ($tgl_rencana_forcing);
			    if($lokasi['status'] == 'NSFC'){
			      if(($hari_tarik_data - $hari_perawatan) > (80 * 86400)){
			        $jml_sesudah = (($hari_rencana_forcing - (104 * 86400)) - $hari_tarik_data) / (20 * 86400);
			      }
			      else{
			        $jml_sesudah = ((($hari_rencana_forcing - (104 * 86400)) - ($hari_perawatan + (80 * 86400))) / (20 * 86400));
			      }
			    }
			    else if($lokasi['status'] == 'NSSC'){
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
			    if($lokasi['status'] == 'NSFC'){
			      if(($hari_rencana_forcing - $hari_tarik_data) > (104 * 86400)){
			        $jml_sebelum = 104 / 15;
			      }
			      else{
			        $jml_sebelum = ($hari_rencana_forcing - $hari_tarik_data) / (15 * 86400);
			      }
			    }
			    else if($lokasi['status'] == 'NSSC'){
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
			    if($lokasi['status'] == 'NSFC'){
			        if(($hari_tarik_data - $hari_perawatan) < (60 * 86400)){
	              $tambahan = 2068249.63690476;
			        }
			        else{
			          $tambahan = 0;
			        }
			        $f_ZN05 = (($jml_sesudah + $jml_sebelum) * 19454856 / 14) + $tambahan;
			    }
			    else if($lokasi['status'] == 'NSSC'){
			        $f_ZN05 = ($jml_sesudah + $jml_sebelum) * 8083566 / 9;
			    }
			    else{
			        $f_ZN05 = 0;
			    }

			    if(isset($koreksi[$ec->code])){
			      if((($element_cost_real[$ec->code]['total'] / $luas) + ($f_ZN05 + ($f_ZN05 * $fo))) * $koreksi[$ec->code] >= ($element_cost_real[$ec->code]['total'] / $luas)){
							echo angka_ribuan((($element_cost_real[$ec->code]['total'] / $luas) + ($f_ZN05 + ($f_ZN05 * $fo))) * $koreksi[$ec->code]);
			        $total_rf_ha += (($element_cost_real[$ec->code]['total'] / $luas) + ($f_ZN05 + ($f_ZN05 * $fo))) * $koreksi[$ec->code];
						}
			      else{
			        echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $luas));
			        $total_rf_ha += ($element_cost_real[$ec->code]['total'] / $luas);
			      }
			    }
			    else{
			      echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $luas) + ($f_ZN05 + ($f_ZN05 * $fo)));
			      $total_rf_ha += ($element_cost_real[$ec->code]['total'] / $luas) + ($f_ZN05 + ($f_ZN05 * $fo));
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
					// Work on
					if(date('Y', strtotime($tgl_panen)) == date('Y', strtotime($konstanta['nilai']))){
						if($perlocation['status'] == 'NSFC'){
				      $jumlah_irrigation = $jumlah_irrigation * 0.75;
						}
						else{
				      $jumlah_irrigation = $jumlah_irrigation * 0.4;
						}
					}
					else{
						if($perlocation['status'] == 'NSFC'){
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
					if($perlocation['status'] == 'NSFC'){
			      $jumlah_irrigation_t1 = $jumlah_irrigation_t1 * 0.75;
					}
					else{
			      $jumlah_irrigation_t1 = $jumlah_irrigation_t1 * 0.4;
					}
					$jumlah_irrigation = $jumlah_irrigation + $jumlah_irrigation_t1;

			    if(isset($koreksi[$ec->code])){
			      if((($element_cost_real[$ec->code]['total'] / $luas) + ($jumlah_irrigation + ($jumlah_irrigation * $fo))) * $koreksi[$ec->code] >= ($element_cost_real[$ec->code]['total'] / $luas)){
			        echo angka_ribuan((($element_cost_real[$ec->code]['total'] / $luas) + ($jumlah_irrigation + ($jumlah_irrigation * $fo))) * $koreksi[$ec->code]);
			        $total_rf_ha += (($element_cost_real[$ec->code]['total'] / $luas) + ($jumlah_irrigation + ($jumlah_irrigation * $fo))) * $koreksi[$ec->code];
			      }
			      else{
			        echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $luas));
			        $total_rf_ha += ($element_cost_real[$ec->code]['total'] / $luas);
			      }
			    }
			    else{
			      echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $luas) + ($jumlah_irrigation + ($jumlah_irrigation * $fo)));
			      $total_rf_ha += ($element_cost_real[$ec->code]['total'] / $luas) + ($jumlah_irrigation + ($jumlah_irrigation * $fo));
			    }
			  }
		    else{
		      if($element_cost_f[$ec->code]['rp_per_ha'] + ($element_cost_real[$ec->code]['total'] / $luas) != NULL || $ec->code == 'ZN10'){
			      if(($element_cost_real['ZN10']['total'] / $tonase / 1000) < 100 || ($ec->code == 'ZN09' || $ec->code == 'ZN10' || $ec->code == 'ZN11')){
			        if($ec->code == 'ZN09' && $element_cost_real['ZN09']['total'] > 0){
			          echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $luas));
			          $total_rf_ha += ($element_cost_real[$ec->code]['total'] / $luas);
			        }
			        else{
			          if($ec->code == 'ZN10'){
			            $persen_alami = $produksi_alami / ($tonase * 1000);
			    		    $asumsi_alami = $this->Forecast_model->get_help_zn10(date('n', strtotime($tgl_panen)));
			            if($lokasi['status'] == 'NSFC'){
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

			            $bpp_alami = $sisa_alami * 331.678741711832;
			            $bpp_mekanis = $sisa_panen * 116.927412395172;

			            if($lokasi['status'] == 'NSFC'){
			              $exclude_panen = 100.14517106282 * ($sisa_alami + $sisa_panen);
			            }
			            else{
			              $exclude_panen = 108.376536114483 * ($sisa_alami + $sisa_panen);
			            }

			            if($produksi == NULL){
			              $luas_panen = $lokasi['luas'];
			            }
			            else{
			              $luas_panen = $produksi['real_dan_sisa_rencana_luas'];
			            }

			            $forecast_ZN10 = ($bpp_alami + $bpp_mekanis + $exclude_panen) / $luas_panen;

									//echo "<pre>";
									//var_dump(angka_ribuan($forecast_ZN10));
									//echo "</pre>";
									//die();
			            echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $luas) + $forecast_ZN10);
			            $total_rf_ha += (($element_cost_real[$ec->code]['total'] / $luas) + $forecast_ZN10);
			          }
			          else{
			            if(isset($koreksi[$ec->code])){
			              if((($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f[$ec->code]['rp_per_ha'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $fo))) * $koreksi[$ec->code] >= ($element_cost_real[$ec->code]['total'] / $luas)){
			                echo angka_ribuan((($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f[$ec->code]['rp_per_ha'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $fo))) * $koreksi[$ec->code]);
			                $total_rf_ha += (($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f[$ec->code]['rp_per_ha'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $fo))) * $koreksi[$ec->code];
			              }
			              else{
			                echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $luas));
			                $total_rf_ha += ($element_cost_real[$ec->code]['total'] / $luas);
			              }
			            }
			            else{
			              echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f[$ec->code]['rp_per_ha'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $fo)));
			              $total_rf_ha += ($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f[$ec->code]['rp_per_ha'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $fo));
			            }
			          }
			        }
			      }
			      else{
			        echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $luas));
			        $total_rf_ha += ($element_cost_real[$ec->code]['total'] / $luas);
			      }
			    }
		      else{
			      echo "-";
		        $total_rf_ha += 0;
		      }
		    }
				echo ("
              </td>
              <td style='color:black;padding-top:0px;padding-bottom:0px;' align='right'>
				");
		    if($ec->code == 'ZN08'){
			    if(($element_cost_real[$ec->code]['total'] / $luas) <= 500000){
			      if(isset($koreksi[$ec->code])){
			        if((($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f['ZN081']['rp_per_ha'] + ($element_cost_f['ZN081']['rp_per_ha'] * $fo))) * $koreksi[$ec->code] >= ($element_cost_real[$ec->code]['total'] / $luas)){
			          echo angka_ribuan((($element_cost_real[$ec->code]['total'] / $tonase / 1000) + (($element_cost_f['ZN081']['total'] + ($element_cost_f['ZN081']['total'] * $fo)) / $tonase / 1000)) * $koreksi[$ec->code]);
			          $total_rf_kg += (($element_cost_real[$ec->code]['total'] / $tonase / 1000) + (($element_cost_f['ZN081']['total'] + ($element_cost_f['ZN081']['total'] * $fo)) / $tonase / 1000)) * $koreksi[$ec->code];
								$raport_forecast_actual = (($element_cost_real[$ec->code]['total'] + ($element_cost_f['ZN081']['total'] + ($element_cost_f['ZN081']['total'] * $fo))) * $koreksi[$ec->code]) - $element_cost_real[$ec->code]['total'];
								$raport_forecast_real = (($element_cost_real[$ec->code]['total'] + $element_cost_f['ZN081']['total']) * $koreksi[$ec->code]) - $element_cost_real[$ec->code]['total'];
			        }
			        else{
			          echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $tonase / 1000));
			          $total_rf_kg += ($element_cost_real[$ec->code]['total'] / $tonase / 1000);
								$raport_forecast_actual = 0;
								$raport_forecast_real = 0;
			        }
			      }
			      else{
			        echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $tonase / 1000) + (($element_cost_f['ZN081']['total'] + ($element_cost_f['ZN081']['total'] * $fo)) / $tonase / 1000));
			        $total_rf_kg += ($element_cost_real[$ec->code]['total'] / $tonase / 1000) + (($element_cost_f['ZN081']['total'] + ($element_cost_f['ZN081']['total'] * $fo)) / $tonase / 1000);
							$raport_forecast_actual = ($element_cost_f['ZN081']['total'] + ($element_cost_f['ZN081']['total'] * $fo));
							$raport_forecast_real = ($element_cost_f['ZN081']['total']);
			      }
			    }
			    else if(($element_cost_real[$ec->code]['total'] / $luas) <= 1000000){
			      if(isset($koreksi[$ec->code])){
			        if((($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f['ZN082']['rp_per_ha'] + ($element_cost_f['ZN082']['rp_per_ha'] * $fo))) * $koreksi[$ec->code] >= ($element_cost_real[$ec->code]['total'] / $luas)){
			          echo angka_ribuan((($element_cost_real[$ec->code]['total'] / $tonase / 1000) + (($element_cost_f['ZN082']['total'] + ($element_cost_f['ZN082']['total'] * $fo)) / $tonase / 1000)) * $koreksi[$ec->code]);
			          $total_rf_kg += (($element_cost_real[$ec->code]['total'] / $tonase / 1000) + (($element_cost_f['ZN082']['total'] + ($element_cost_f['ZN082']['total'] * $fo)) / $tonase / 1000)) * $koreksi[$ec->code];
								$raport_forecast_actual = (($element_cost_real[$ec->code]['total'] + ($element_cost_f['ZN082']['total'] + ($element_cost_f['ZN082']['total'] * $fo))) * $koreksi[$ec->code]) - $element_cost_real[$ec->code]['total'];
								$raport_forecast_real = (($element_cost_real[$ec->code]['total'] + $element_cost_f['ZN082']['total']) * $koreksi[$ec->code]) - $element_cost_real[$ec->code]['total'];
			        }
			        else{
			          echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $tonase / 1000));
			          $total_rf_kg += ($element_cost_real[$ec->code]['total'] / $tonase / 1000);
								$raport_forecast_actual = 0;
								$raport_forecast_real = 0;
			        }
			      }
			      else{
			        echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $tonase / 1000) + (($element_cost_f['ZN082']['total'] + ($element_cost_f['ZN082']['total'] * $fo)) / $tonase / 1000));
			        $total_rf_kg += ($element_cost_real[$ec->code]['total'] / $tonase / 1000) + (($element_cost_f['ZN082']['total'] + ($element_cost_f['ZN082']['total'] * $fo)) / $tonase / 1000);
							$raport_forecast_actual = ($element_cost_f['ZN082']['total'] + ($element_cost_f['ZN082']['total'] * $fo));
							$raport_forecast_real = ($element_cost_f['ZN082']['total']);
			      }
			    }
			    else{
			      if(isset($koreksi[$ec->code])){
			        if((($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f['ZN083']['rp_per_ha'] + ($element_cost_f['ZN083']['rp_per_ha'] * $fo))) * $koreksi[$ec->code] >= ($element_cost_real[$ec->code]['total'] / $luas)){
			          echo angka_ribuan((($element_cost_real[$ec->code]['total'] / $tonase / 1000) + (($element_cost_f['ZN083']['total'] + ($element_cost_f['ZN083']['total'] * $fo)) / $tonase / 1000)) * $koreksi[$ec->code]);
			          $total_rf_kg += (($element_cost_real[$ec->code]['total'] / $tonase / 1000) + (($element_cost_f['ZN083']['total'] + ($element_cost_f['ZN083']['total'] * $fo)) / $tonase / 1000)) * $koreksi[$ec->code];
								$raport_forecast_actual = (($element_cost_real[$ec->code]['total'] + ($element_cost_f['ZN083']['total'] + ($element_cost_f['ZN083']['total'] * $fo))) * $koreksi[$ec->code]) - $element_cost_real[$ec->code]['total'];
								$raport_forecast_real = (($element_cost_real[$ec->code]['total'] + $element_cost_f['ZN083']['total']) * $koreksi[$ec->code]) - $element_cost_real[$ec->code]['total'];
			        }
			        else{
			          echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $tonase / 1000));
			          $total_rf_kg += ($element_cost_real[$ec->code]['total'] / $tonase / 1000);
								$raport_forecast_actual = 0;
								$raport_forecast_real = 0;
			        }
			      }
			      else{
			        echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $tonase / 1000) + (($element_cost_f['ZN083']['total'] + ($element_cost_f['ZN083']['total'] * $fo)) / $tonase / 1000));
			        $total_rf_kg += ($element_cost_real[$ec->code]['total'] / $tonase / 1000) + (($element_cost_f['ZN083']['total'] + ($element_cost_f['ZN083']['total'] * $fo)) / $tonase / 1000);
							$raport_forecast_actual = ($element_cost_f['ZN083']['total'] + ($element_cost_f['ZN083']['total'] * $fo));
							$raport_forecast_real = ($element_cost_f['ZN083']['total']);
			      }
			    }
		    }
			  else if($ec->code == 'ZN03' && $lokasi['status'] == 'NSFC'){
			    if($cek_ZN03 == 1){
			      echo angka_ribuan((($element_cost_real[$ec->code]['total']) + ($element_cost_f[$ec->code]['rp_per_ha'] * $luas)) / $tonase / 1000);
			      $total_rf_kg += (($element_cost_real[$ec->code]['total']) + ($element_cost_f[$ec->code]['rp_per_ha'] * $luas)) / $tonase / 1000;
						$raport_forecast_actual = (($element_cost_f[$ec->code]['rp_per_ha'] * $luas));
						$raport_forecast_real = (($element_cost_f[$ec->code]['rp_per_ha'] * $luas));
			    }
			    else{
			      if(strtotime($perlocation['tgl_mulai_rawat']) >= strtotime('2019-05-01')){
					    echo angka_ribuan(($element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $luas) + (1000000 * $luas)) / $tonase / 1000);
					    $total_rf_kg += ($element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $luas) + (1000000 * $luas)) / $tonase / 1000;
							$raport_forecast_actual = (($element_cost_f[$ec->code]['rp_per_ha'] * $luas));
							$raport_forecast_real = (($element_cost_f[$ec->code]['rp_per_ha'] * $luas));
			      }
			      else{
					    echo angka_ribuan(($element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $luas) + (3676535.88918288 * $luas)) / $tonase / 1000);
					    $total_rf_kg += ($element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $luas) + (3676535.88918288 * $luas)) / $tonase / 1000;
							$raport_forecast_actual = (($element_cost_f[$ec->code]['rp_per_ha'] * $luas));
							$raport_forecast_real = (($element_cost_f[$ec->code]['rp_per_ha'] * $luas));
			      }
			    }
			  }
			  else if($ec->code == 'ZN04' && substr($tgl_panen, 0, 4) == date('Y', strtotime($konstanta['nilai']))){
			    if($lokasi['status'] == 'NSFC'){
			      echo angka_ribuan(($element_cost_real[$ec->code]['total'] + ((1300000 * $luas) + ((1300000 * $luas) * $fo))) / $tonase / 1000);
			      $total_rf_kg += ($element_cost_real[$ec->code]['total'] + ((1300000 * $luas) + ((1300000 * $luas) * $fo))) / $tonase / 1000;
						$raport_forecast_actual = ((1300000 * $luas) + ((1300000 * $luas) * $fo));
						$raport_forecast_real = (1300000 * $luas);
			    }
			    else{
			      echo angka_ribuan(($element_cost_real[$ec->code]['total'] + ((890000 * $luas) + ((890000 * $luas) * $fo))) / $tonase / 1000);
			      $total_rf_kg += ($element_cost_real[$ec->code]['total'] + ((890000 * $luas) + ((890000 * $luas) * $fo))) / $tonase / 1000;
						$raport_forecast_actual = ((890000 * $luas) + ((890000 * $luas) * $fo));
						$raport_forecast_real = (890000 * $luas);
			    }
			  }
			  else if($ec->code == 'ZN05'){
			    //Work on
			    $hari_tarik_data = strtotime($konstanta['nilai']);
			    $hari_perawatan = strtotime($perlocation['tgl_mulai_rawat']);
			    $hari_rencana_forcing = ($tgl_rencana_forcing);
			    if($lokasi['status'] == 'NSFC'){
			      if(($hari_tarik_data - $hari_perawatan) > (80 * 86400)){
			        $jml_sesudah = (($hari_rencana_forcing - (104 * 86400)) - $hari_tarik_data) / (20 * 86400);
			      }
			      else{
			        $jml_sesudah = ((($hari_rencana_forcing - (104 * 86400)) - ($hari_perawatan + (80 * 86400))) / (20 * 86400));
			      }
			    }
			    else if($lokasi['status'] == 'NSSC'){
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
			    if($lokasi['status'] == 'NSFC'){
			      if(($hari_rencana_forcing - $hari_tarik_data) > (104 * 86400)){
			        $jml_sebelum = 104 / 15;
			      }
			      else{
			        $jml_sebelum = ($hari_rencana_forcing - $hari_tarik_data) / (15 * 86400);
			      }
			    }
			    else if($lokasi['status'] == 'NSSC'){
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
			    if($lokasi['status'] == 'NSFC'){
			        if(($hari_tarik_data - $hari_perawatan) < (60 * 86400)){
	              $tambahan = 2068249.63690476;
			        }
			        else{
			          $tambahan = 0;
			        }
			        $f_ZN05 = (($jml_sesudah + $jml_sebelum) * 19454856 / 14) + $tambahan;
			    }
			    else if($lokasi['status'] == 'NSSC'){
			        $f_ZN05 = ($jml_sesudah + $jml_sebelum) * 8083566 / 9;
			    }
			    else{
			        $f_ZN05 = 0;
			    }

					if(isset($koreksi[$ec->code])){
						if((($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f[$ec->code]['rp_per_ha'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $fo))) * $koreksi[$ec->code] >= ($element_cost_real[$ec->code]['total'] / $luas)){
							echo angka_ribuan((($element_cost_real[$ec->code]['total'] / $tonase / 1000) + ((($f_ZN05 * $luas) + (($f_ZN05 * $luas) * $fo)) / $tonase / 1000)) * $koreksi[$ec->code]);
							$total_rf_kg += (($element_cost_real[$ec->code]['total'] / $tonase / 1000) + ((($f_ZN05 * $luas) + (($f_ZN05 * $luas) * $fo)) / $tonase / 1000)) * $koreksi[$ec->code];
							$raport_forecast_actual = (($element_cost_real[$ec->code]['total'] + (($f_ZN05 * $luas) + (($f_ZN05 * $luas) * $fo))) * $koreksi[$ec->code]) - $element_cost_real[$ec->code]['total'];
							$raport_forecast_real = (($element_cost_real[$ec->code]['total'] + ($f_ZN05 * $luas)) * $koreksi[$ec->code]) - $element_cost_real[$ec->code]['total'];
						}
						else{
							echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $tonase / 1000));
							$total_rf_kg += ($element_cost_real[$ec->code]['total'] / $tonase / 1000);
							$raport_forecast_actual = 0;
							$raport_forecast_real = 0;
						}
					}
					else{
						echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $tonase / 1000) + ((($f_ZN05 * $luas) + (($f_ZN05 * $luas) * $fo)) / $tonase / 1000));
						$total_rf_kg += ($element_cost_real[$ec->code]['total'] / $tonase / 1000) + ((($f_ZN05 * $luas) + (($f_ZN05 * $luas) * $fo)) / $tonase / 1000);
						$raport_forecast_actual = (($f_ZN05 * $luas) + (($f_ZN05 * $luas) * $fo));
						$raport_forecast_real = (($f_ZN05 * $luas));
					}
			  }
			  else if($ec->code == 'ZN13'){
			    if(strtotime($tgl_panen) > strtotime($tgl_irrigation['start']['nilai']) && strtotime($tgl_panen) < strtotime($tgl_irrigation['finish']['nilai'])){
			      $jumlah_irrigation = (floor(((strtotime($tgl_panen) - (86400 * 5)) - strtotime($tgl_irrigation['start']['nilai'])) / (86400 * 10))) * ((550000 * $luas) / $tonase / 1000);
						$jumlah_irrigation_raport = (floor(((strtotime($tgl_panen) - (86400 * 5)) - strtotime($tgl_irrigation['start']['nilai'])) / (86400 * 10))) * (550000 * $luas);
			    }
			    else if(strtotime($tgl_panen) > strtotime($tgl_irrigation['start']['nilai']) && strtotime($tgl_panen) > strtotime($tgl_irrigation['finish']['nilai'])){
			      $jumlah_irrigation = (floor(((strtotime($tgl_irrigation['finish']['nilai']) - (86400 * 5)) - strtotime($tgl_irrigation['start']['nilai'])) / (86400 * 10))) * ((550000 * $luas) / $tonase / 1000);
			      $jumlah_irrigation_raport = (floor(((strtotime($tgl_irrigation['finish']['nilai']) - (86400 * 5)) - strtotime($tgl_irrigation['start']['nilai'])) / (86400 * 10))) * (550000 * $luas);
			    }
			    else{
			      $jumlah_irrigation = 0;
			      $jumlah_irrigation_raport = 0;
			    }
					if(date('Y', strtotime($tgl_panen)) == date('Y', strtotime($konstanta['nilai']))){
						if($perlocation['status'] == 'NSFC'){
				      $jumlah_irrigation = $jumlah_irrigation * 0.75;
				      $jumlah_irrigation_raport = $jumlah_irrigation_raport * 0.75;
						}
						else{
				      $jumlah_irrigation = $jumlah_irrigation * 0.4;
				      $jumlah_irrigation_raport = $jumlah_irrigation_raport * 0.4;
						}
					}
					else{
						if($perlocation['status'] == 'NSFC'){
				      $jumlah_irrigation = $jumlah_irrigation * 0.55;
				      $jumlah_irrigation_raport = $jumlah_irrigation_raport * 0.55;
						}
						else{
				      $jumlah_irrigation = $jumlah_irrigation * 0.2;
				      $jumlah_irrigation_raport = $jumlah_irrigation_raport * 0.2;
						}
					}

			    if(strtotime($tgl_panen) > strtotime($tgl_irrigation_t1['start']['nilai']) && strtotime($tgl_panen) < strtotime($tgl_irrigation_t1['finish']['nilai'])){
			      $jumlah_irrigation_t1 = (floor(((strtotime($tgl_panen) - (86400 * 5)) - strtotime($tgl_irrigation_t1['start']['nilai'])) / (86400 * 10))) * ((550000 * $luas) / $tonase / 1000);
						$jumlah_irrigation_raport_t1 = (floor(((strtotime($tgl_panen) - (86400 * 5)) - strtotime($tgl_irrigation_t1['start']['nilai'])) / (86400 * 10))) * (550000 * $luas);
			    }
			    else if(strtotime($tgl_panen) > strtotime($tgl_irrigation_t1['start']['nilai']) && strtotime($tgl_panen) > strtotime($tgl_irrigation_t1['finish']['nilai'])){
			      $jumlah_irrigation_t1 = (floor(((strtotime($tgl_irrigation_t1['finish']['nilai']) - (86400 * 5)) - strtotime($tgl_irrigation_t1['start']['nilai'])) / (86400 * 10))) * ((550000 * $luas) / $tonase / 1000);
			      $jumlah_irrigation_raport_t1 = (floor(((strtotime($tgl_irrigation_t1['finish']['nilai']) - (86400 * 5)) - strtotime($tgl_irrigation_t1['start']['nilai'])) / (86400 * 10))) * (550000 * $luas);
			    }
			    else{
			      $jumlah_irrigation_t1 = 0;
			      $jumlah_irrigation_raport_t1 = 0;
			    }
					if($perlocation['status'] == 'NSFC'){
			      $jumlah_irrigation_t1 = $jumlah_irrigation_t1 * 0.75;
			      $jumlah_irrigation_raport_t1 = $jumlah_irrigation_raport_t1 * 0.75;
					}
					else{
			      $jumlah_irrigation_t1 = $jumlah_irrigation_t1 * 0.4;
			      $jumlah_irrigation_raport_t1 = $jumlah_irrigation_raport_t1 * 0.4;
					}
					$jumlah_irrigation = $jumlah_irrigation + $jumlah_irrigation;
					$jumlah_irrigation_raport = $jumlah_irrigation_raport + $jumlah_irrigation_raport_t1;

			    if(isset($koreksi[$ec->code])){
			      if((($element_cost_real[$ec->code]['total'] / $tonase / 1000) + ($jumlah_irrigation + ($jumlah_irrigation * $fo))) * $koreksi[$ec->code] >= ($element_cost_real[$ec->code]['total'] / $tonase / 1000)){
			        echo angka_ribuan((($element_cost_real[$ec->code]['total'] / $tonase / 1000) + ($jumlah_irrigation + ($jumlah_irrigation * $fo))) * $koreksi[$ec->code]);
			        $total_rf_kg += (($element_cost_real[$ec->code]['total'] / $tonase / 1000) + ($jumlah_irrigation + ($jumlah_irrigation * $fo))) * $koreksi[$ec->code];
							$raport_forecast_actual = (($element_cost_real[$ec->code]['total'] + ($jumlah_irrigation_raport + ($jumlah_irrigation_raport * $fo))) * $koreksi[$ec->code]) - $element_cost_real[$ec->code]['total'];
							$raport_forecast_real = (($element_cost_real[$ec->code]['total'] + $jumlah_irrigation_raport) * $koreksi[$ec->code]) - $element_cost_real[$ec->code]['total'];
			      }
			      else{
			        echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $tonase / 1000));
			        $total_rf_kg += ($element_cost_real[$ec->code]['total'] / $tonase / 1000);
							$raport_forecast_actual = 0;
							$raport_forecast_real = 0;
			      }
			    }
			    else{
			      echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $tonase / 1000) + ($jumlah_irrigation + ($jumlah_irrigation * $fo)));
			      $total_rf_kg += ($element_cost_real[$ec->code]['total'] / $tonase / 1000) + ($jumlah_irrigation + ($jumlah_irrigation * $fo));
						$raport_forecast_actual = ($jumlah_irrigation_raport + ($jumlah_irrigation_raport * $fo));
						$raport_forecast_real = ($jumlah_irrigation_raport);
			    }
			  }
		    else{
			    if((($element_cost_f[$ec->code]['rp_per_ha'] * $luas) / $tonase / 1000) + ($element_cost_real[$ec->code]['total'] / $tonase / 1000) != NULL || $ec->code == 'ZN10'){
			      if(($element_cost_real['ZN10']['total'] / $tonase / 1000) < 100 || ($ec->code == 'ZN09' || $ec->code == 'ZN10' || $ec->code == 'ZN11')){
			        if($ec->code == 'ZN09' && $element_cost_real['ZN09']['total'] > 0){
			          echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $tonase / 1000));
			          $total_rf_kg += ($element_cost_real[$ec->code]['total'] / $tonase / 1000);
								$raport_forecast_actual = 0;
								$raport_forecast_real = 0;
			        }
			        else{
			          if($ec->code == 'ZN10'){
			            $persen_alami = $produksi_alami / ($tonase * 1000);
			    		    $asumsi_alami = $this->Forecast_model->get_help_zn10(date('n', strtotime($tgl_panen)));
			            if($lokasi['status'] == 'NSFC'){
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
			                $sisa_alami = 0.03 * $tonase * 1000;
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
			            $bpp_alami = $sisa_alami * 331.678741711832;
			            $bpp_mekanis = $sisa_panen * 116.927412395172;
			            if($lokasi['status'] == 'NSFC'){
			              $exclude_panen = 100.14517106282 * ($sisa_alami + $sisa_panen);
			            }
			            else{
			              $exclude_panen = 108.376536114483 * ($sisa_alami + $sisa_panen);
			            }
			            if($produksi == NULL){
			              $luas_panen = $lokasi['luas'];
			            }
			            else{
			              $luas_panen = $produksi['real_dan_sisa_rencana_luas'];
			            }
			            $forecast_ZN10 = ($bpp_alami + $bpp_mekanis + $exclude_panen) / $tonase / 1000;
									$forecast_ZN10_raport = ($bpp_alami + $bpp_mekanis + $exclude_panen);

			            echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $tonase / 1000) + $forecast_ZN10);
			            $total_rf_kg += (($element_cost_real[$ec->code]['total'] / $tonase / 1000) + $forecast_ZN10);
									$raport_forecast_actual = $forecast_ZN10_raport;
									$raport_forecast_real = $forecast_ZN10_raport;
			          }
			          else{
			            if(isset($koreksi[$ec->code])){
			              if((($element_cost_real[$ec->code]['total'] / $luas) + ($element_cost_f[$ec->code]['rp_per_ha'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $fo))) * $koreksi[$ec->code] >= ($element_cost_real[$ec->code]['total'] / $luas)){
			                echo angka_ribuan((($element_cost_real[$ec->code]['total'] / $tonase / 1000) + ((($element_cost_f[$ec->code]['rp_per_ha'] * $luas) + (($element_cost_f[$ec->code]['rp_per_ha'] * $luas) * $fo)) / $tonase / 1000)) * $koreksi[$ec->code]);
			                $total_rf_kg += (($element_cost_real[$ec->code]['total'] / $tonase / 1000) + ((($element_cost_f[$ec->code]['rp_per_ha'] * $luas) + (($element_cost_f[$ec->code]['rp_per_ha'] * $luas) * $fo)) / $tonase / 1000)) * $koreksi[$ec->code];
											$raport_forecast_actual = (($element_cost_real[$ec->code]['total'] + (($element_cost_f[$ec->code]['rp_per_ha'] * $luas) + (($element_cost_f[$ec->code]['rp_per_ha'] * $luas) * $fo))) * $koreksi[$ec->code]) - $element_cost_real[$ec->code]['total'];
											$raport_forecast_real = (($element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $luas)) * $koreksi[$ec->code]) - $element_cost_real[$ec->code]['total'];
										}
			              else{
			                echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $tonase / 1000));
			                $total_rf_kg += ($element_cost_real[$ec->code]['total'] / $tonase / 1000);
											$raport_forecast_actual = 0;
											$raport_forecast_real = 0;
			              }
			            }
			            else{
			              echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $tonase / 1000) + ((($element_cost_f[$ec->code]['rp_per_ha'] * $luas) + (($element_cost_f[$ec->code]['rp_per_ha'] * $luas) * $fo)) / $tonase / 1000));
			              $total_rf_kg += ($element_cost_real[$ec->code]['total'] / $tonase / 1000) + ((($element_cost_f[$ec->code]['rp_per_ha'] * $luas) + (($element_cost_f[$ec->code]['rp_per_ha'] * $luas) * $fo)) / $tonase / 1000);
										$raport_forecast_actual = (($element_cost_f[$ec->code]['rp_per_ha'] * $luas) + (($element_cost_f[$ec->code]['rp_per_ha'] * $luas) * $fo));
										$raport_forecast_real = (($element_cost_f[$ec->code]['rp_per_ha'] * $luas));
									}
			          }
			        }
			      }
			      else{
			        echo angka_ribuan(($element_cost_real[$ec->code]['total'] / $tonase / 1000));
			        $total_rf_kg += ($element_cost_real[$ec->code]['total'] / $tonase / 1000);
							$raport_forecast_actual = 0;
							$raport_forecast_real = 0;
			      }
		      }
		      else{
			      echo "-";
		        $total_rf_kg += 0;
						$raport_forecast_actual = 0;
						$raport_forecast_real = 0;
		      }
		    }
				echo ("
	              </td>
	            </tr>
				");
				// : panel1
				if($produksi != NULL){
					if($cek_produksi_t1 == 1){
						$query = $this->Raport_model->set_real_lokasi($perlocation['pg'], $perlocation['wilayah'], $perlocation['lokasi'], $perlocation['status'], 'B'.date('n', strtotime($tgl_panen)), 'T1', 'Real', $ec->code, $raport_real, $raport_forecast_real);
						$query = $this->Raport_model->set_real_lokasi($perlocation['pg'], $perlocation['wilayah'], $perlocation['lokasi'], $perlocation['status'], 'B'.date('n', strtotime($tgl_panen)), 'T1', 'Actual', $ec->code, $raport_real, $raport_forecast_actual);
					}
					else{
						$query = $this->Raport_model->set_real_lokasi($perlocation['pg'], $perlocation['wilayah'], $perlocation['lokasi'], $perlocation['status'], 'B'.date('n', strtotime($tgl_panen)), 'T0', 'Real', $ec->code, $raport_real, $raport_forecast_real);
						$query = $this->Raport_model->set_real_lokasi($perlocation['pg'], $perlocation['wilayah'], $perlocation['lokasi'], $perlocation['status'], 'B'.date('n', strtotime($tgl_panen)), 'T0', 'Actual', $ec->code, $raport_real, $raport_forecast_actual);
					}
				}
				// else if((date('Y', strtotime($tgl_panen))) == (date('Y', strtotime($konstanta['nilai'])) + 1)){
						// $query = $this->Raport_model->set_real_lokasi($perlocation['pg'], $perlocation['wilayah'], $perlocation['lokasi'], $perlocation['status'], 'B'.date('n', strtotime($tgl_panen)), 'T1', 'Real', $ec->code, $raport_real, $raport_forecast_real);
						// $query = $this->Raport_model->set_real_lokasi($perlocation['pg'], $perlocation['wilayah'], $perlocation['lokasi'], $perlocation['status'], 'B'.date('n', strtotime($tgl_panen)), 'T1', 'Actual', $ec->code, $raport_real, $raport_forecast_actual);
				// }
				//Cek Lokasi
				if($ec->code == 'ZN15' && ($raport_real + $raport_forecast_actual) == 0){
					$zn15 = 0;
				}
				else{
					$zn15 = 1;
				}
				if($perlocation['status'] != 'NSSC' && ($ec->code != 'ZN01' || $ec->code != 'ZN02' || $ec->code != 'ZN03') && $zn15 == 1){
					if($perlocation['status'] == 'NSFC'){
						$std_budget = $bpp_ha;
					}
					else{
						$std_budget = $bpp_ha;
					}
					if((($raport_real + $raport_forecast_actual) / $perlocation['luas']) > ($std_budget * 1.5) || (($raport_real + $raport_forecast_actual) / $perlocation['luas']) < ($std_budget * 0.5)){
						$query = $this->Raport_model->set_cek_lokasi($perlocation['pg'], $perlocation['wilayah'], $perlocation['lokasi'], $perlocation['status'], 'B'.date('n', strtotime($tgl_panen)), 'T1', $ec->code, ($raport_real + $raport_forecast_actual) / $perlocation['luas']);
					}
				}
				//Perlocation Detil
				$real_detil_ZN[$ec->code] = $raport_real;
				$forecast_detil_ZN[$ec->code] = $raport_forecast_actual;
		  }
			echo ("
						</tbody>
					</table>
			");
			if($produksi != NULL){
				if($cek_produksi_t1 == 1){
					$query = $this->Raport_model->set_luas_tonase_lokasi($perlocation['pg'], $perlocation['wilayah'], $perlocation['lokasi'], $perlocation['status'], 'B'.date('n', strtotime($tgl_panen)), 'T1', $perlocation['luas'], $perlocation['tonase']);
					$query = $this->GroupCost_model->set_group_cost_lokasi($perlocation['pg'], $perlocation['wilayah'], $perlocation['lokasi'], $perlocation['status'], 'B'.date('n', strtotime($tgl_panen)), 'T1', $group_cost['labour']['total'], $group_cost['charge']['total'], $group_cost['material']['total'], $group_cost_bibit, $perlocation['luas'], $perlocation['tonase']);
				}
				else{
					$query = $this->Raport_model->set_luas_tonase_lokasi($perlocation['pg'], $perlocation['wilayah'], $perlocation['lokasi'], $perlocation['status'], 'B'.date('n', strtotime($tgl_panen)), 'T0', $perlocation['luas'], $perlocation['tonase']);
					$query = $this->GroupCost_model->set_group_cost_lokasi($perlocation['pg'], $perlocation['wilayah'], $perlocation['lokasi'], $perlocation['status'], 'B'.date('n', strtotime($tgl_panen)), 'T0', $group_cost['labour']['total'], $group_cost['charge']['total'], $group_cost['material']['total'], $group_cost_bibit, $perlocation['luas'], $perlocation['tonase']);
				}
			}
			// else if(substr($tgl_panen, 0, 4) == (date('Y', strtotime($konstanta['nilai'])) + 1)){
			// 	$query = $this->Raport_model->set_luas_tonase_lokasi($perlocation['pg'], $perlocation['wilayah'], $perlocation['lokasi'], $perlocation['status'], 'B'.date('n', strtotime($tgl_panen)), 'T1', $perlocation['luas'], $perlocation['tonase']);
			// 	if($perlocation['status'] == 'NSFC'){
			// 		$query = $this->GroupCost_model->set_group_cost_lokasi($perlocation['pg'], $perlocation['wilayah'], $perlocation['lokasi'], $perlocation['status'], 'B'.date('n', strtotime($tgl_panen)), 'T1', $group_cost['labour']['total'], $group_cost['charge']['total'], $group_cost['material']['total'], $group_cost['bibit']['total'] + 1000000, $perlocation['luas'], $perlocation['tonase']);
			// 	}
			// 	else{
			// 		$query = $this->GroupCost_model->set_group_cost_lokasi($perlocation['pg'], $perlocation['wilayah'], $perlocation['lokasi'], $perlocation['status'], 'B'.date('n', strtotime($tgl_panen)), 'T1', $group_cost['labour']['total'], $group_cost['charge']['total'], $group_cost['material']['total'], $group_cost['bibit']['total'], $perlocation['luas'], $perlocation['tonase']);
			// 	}
			// }
		  if($total_rf_ha != 0 && $total_rf_kg != 0){
		    if($total_rf_ha != NULL && $total_rf_kg != 0){
					//Rp per Ha
		      if((($total_rf_ha / $total_bpp_ha) * 100) < 98){
						$total_excellent_ha++;
						$status_lokasi_ha = 'Excellent';
		      }
		      else if((($total_rf_ha / $total_bpp_ha) * 100) <= 102){
						$total_good_ha++;
						$status_lokasi_ha = 'Good';
		      }
		      else{
						$total_poor_ha++;
						$status_lokasi_ha = 'Poor';
		      }
					//Rp per Kg
		      if((($total_rf_kg / $total_bpp_kg) * 100) < 98){
						$total_excellent_kg++;
						$status_lokasi_kg = 'Excellent';
		      }
		      else if((($total_rf_kg / $total_bpp_kg) * 100) <= 102){
						$total_good_kg++;
						$status_lokasi_kg = 'Good';
		      }
		      else{
						$total_poor_kg++;
						$status_lokasi_kg = 'Poor';
		      }
		    }
		  }
			echo "<pre>";
			var_dump($lokasi['lokasi'].' '.(($total_rf_ha / $total_bpp_ha) * 100).' '.$status_lokasi_ha);
			var_dump($lokasi['lokasi'].' '.(($total_rf_kg / $total_bpp_kg) * 100).' '.$status_lokasi_kg);
			var_dump($lokasi['lokasi'].' '.angka_ribuan($total_rf_ha).' '.$status_lokasi_ha);
			var_dump($lokasi['lokasi'].' '.angka_ribuan($total_rf_kg).' '.$status_lokasi_kg);
			echo "</pre>";
			//die();

			// : panel1
			$data = array(
				'pg' => $perlocation['pg'],
				'wilayah' => $perlocation['wilayah'],
				'kebun' => $perlocation['kebun'],
				'lokasi' => $perlocation['lokasi'],
				'umur' => $perlocation['umur'],
				'jenis_bibit' => $jenis_bibit,
				'varian_bibit' => $varian_bibit,
				'kelas_bibit' => $kelas_bibit,
				'status' => $perlocation['status'],
				'luas' => $perlocation['luas'],
				'tonase' => $perlocation['tonase'],
				'forcing' => $tgl_rencana_forcing,
				'panen' => $tgl_panen,
				'budget_ha' => $total_bpp_ha,
				'real_ha' => $total_real_ha,
				'sisa_saldo' => $total_real_ha - $total_bpp_ha,
				'rf_ha' => $total_rf_ha,
				'deviasi_ha' => $total_rf_ha / $total_bpp_ha,
				'category_ha' => $status_lokasi_ha,
				'budget_kg' => $total_bpp_kg,
				'real_kg' => $total_real_kg,
				'rf_kg' => $total_rf_kg,
				'deviasi_kg' => $total_rf_kg / $total_bpp_kg,
				'category_kg' => $status_lokasi_kg,
				'ZN_r' => $real_detil_ZN,
				'ZN_f'=> $forecast_detil_ZN
			);
			echo "<pre>";
			var_dump($data);
			echo "</pre>";
			// : panel
			$query = $this->Performance_model->set_perlocation($data);
			// die();
		}
		$query = $this->Performance_model->set_peformance_wilayah($wilayah, $total_excellent_ha, $total_good_ha, $total_poor_ha, $total_excellent_kg, $total_good_kg, $total_poor_kg);
		//die();
		//On success
		if($wilayah == 'W04' || $wilayah == 'W08' || $wilayah == 'W14'){
			echo ("
				<script>
					window.location.href = '/PIS/admin';
					alert('Berhasil di update Performance ".$wilayah."');
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
		if($wilayah == 'W04' || $wilayah == 'W08' || $wilayah == 'W14'){
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
