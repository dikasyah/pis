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

		$this->load->model('UpdateWilayah_model');
		$this->load->model('GetWilayah_model');
		$this->load->model('UpdatePG_model');
		$this->load->model('GetPG_model');
		$this->load->model('Raport_model');
	}


	/*	function update_wilayah_real_raport(){
			$wilayah = $this->input->get('wilayah');

			$bpp = $this->ElementCost_model->get_element_cost_all();
			$element_cost_real = array(
				$wilayah.'1' => array(
					'real' => $this->ElementCost_model->get_element_cost_wilayah_raport($wilayah.'1'),
					'real_t1' => $this->ElementCost_model->get_element_cost_wilayah_raport_t1($wilayah.'1'),
					'luas_tonase' => $this->Produksi_model->get_luas_tonase_produksi_raport($wilayah.'1'),
					'luas_tonase_t1' => $this->Produksi_model->get_luas_tonase_produksi_raport_t1($wilayah.'1')
				),
				$wilayah.'2' => array(
					'real' => $this->ElementCost_model->get_element_cost_wilayah_raport($wilayah.'2'),
					'real_t1' => $this->ElementCost_model->get_element_cost_wilayah_raport_t1($wilayah.'2'),
					'luas_tonase' => $this->Produksi_model->get_luas_tonase_produksi_raport($wilayah.'2'),
					'luas_tonase_t1' => $this->Produksi_model->get_luas_tonase_produksi_raport_t1($wilayah.'2')
				),
				$wilayah.'3' => array(
					'real' => $this->ElementCost_model->get_element_cost_wilayah_raport($wilayah.'3'),
					'real_t1' => $this->ElementCost_model->get_element_cost_wilayah_raport_t1($wilayah.'3'),
					'luas_tonase' => $this->Produksi_model->get_luas_tonase_produksi_raport($wilayah.'3'),
					'luas_tonase_t1' => $this->Produksi_model->get_luas_tonase_produksi_raport_t1($wilayah.'3')
				)
			);
			$hpp = $this->HPP_model->get_hpp_wilayah_raport($wilayah);

			$element_cost_code = 1;
			while($element_cost_code <= 15){
				if($element_cost_code < 10){
					$no_code = '0'.$element_cost_code;
				}
				else{
					$no_code = $element_cost_code;
				}
				$real['NS']['Total']['T0'][$no_code] = 0;
				$real['NS']['B1']['T0'][$no_code] = 0;
				$real['NS']['B2']['T0'][$no_code] = 0;
				$real['NS']['B3']['T0'][$no_code] = 0;
				$real['NS']['B4']['T0'][$no_code] = 0;
				$real['NS']['B5']['T0'][$no_code] = 0;
				$real['NS']['B6']['T0'][$no_code] = 0;
				$real['NS']['B7']['T0'][$no_code] = 0;
				$real['NS']['B8']['T0'][$no_code] = 0;
				$real['NS']['B9']['T0'][$no_code] = 0;
				$real['NS']['B10']['T0'][$no_code] = 0;
				$real['NS']['B11']['T0'][$no_code] = 0;
				$real['NS']['B12']['T0'][$no_code] = 0;
				$real['NSFC']['Total']['T0'][$no_code] = 0;
				$real['NSFC']['B1']['T0'][$no_code] = 0;
				$real['NSFC']['B2']['T0'][$no_code] = 0;
				$real['NSFC']['B3']['T0'][$no_code] = 0;
				$real['NSFC']['B4']['T0'][$no_code] = 0;
				$real['NSFC']['B5']['T0'][$no_code] = 0;
				$real['NSFC']['B6']['T0'][$no_code] = 0;
				$real['NSFC']['B7']['T0'][$no_code] = 0;
				$real['NSFC']['B8']['T0'][$no_code] = 0;
				$real['NSFC']['B9']['T0'][$no_code] = 0;
				$real['NSFC']['B10']['T0'][$no_code] = 0;
				$real['NSFC']['B11']['T0'][$no_code] = 0;
				$real['NSFC']['B12']['T0'][$no_code] = 0;
				$real['NSSC']['Total']['T0'][$no_code] = 0;
				$real['NSSC']['B1']['T0'][$no_code] = 0;
				$real['NSSC']['B2']['T0'][$no_code] = 0;
				$real['NSSC']['B3']['T0'][$no_code] = 0;
				$real['NSSC']['B4']['T0'][$no_code] = 0;
				$real['NSSC']['B5']['T0'][$no_code] = 0;
				$real['NSSC']['B6']['T0'][$no_code] = 0;
				$real['NSSC']['B7']['T0'][$no_code] = 0;
				$real['NSSC']['B8']['T0'][$no_code] = 0;
				$real['NSSC']['B9']['T0'][$no_code] = 0;
				$real['NSSC']['B10']['T0'][$no_code] = 0;
				$real['NSSC']['B11']['T0'][$no_code] = 0;
				$real['NSSC']['B12']['T0'][$no_code] = 0;

				$real['NS']['Total']['T1'][$no_code] = 0;
				$real['NS']['B1']['T1'][$no_code] = 0;
				$real['NS']['B2']['T1'][$no_code] = 0;
				$real['NS']['B3']['T1'][$no_code] = 0;
				$real['NS']['B4']['T1'][$no_code] = 0;
				$real['NS']['B5']['T1'][$no_code] = 0;
				$real['NS']['B6']['T1'][$no_code] = 0;
				$real['NS']['B7']['T1'][$no_code] = 0;
				$real['NS']['B8']['T1'][$no_code] = 0;
				$real['NS']['B9']['T1'][$no_code] = 0;
				$real['NS']['B10']['T1'][$no_code] = 0;
				$real['NS']['B11']['T1'][$no_code] = 0;
				$real['NS']['B12']['T1'][$no_code] = 0;
				$real['NSFC']['Total']['T1'][$no_code] = 0;
				$real['NSFC']['B1']['T1'][$no_code] = 0;
				$real['NSFC']['B2']['T1'][$no_code] = 0;
				$real['NSFC']['B3']['T1'][$no_code] = 0;
				$real['NSFC']['B4']['T1'][$no_code] = 0;
				$real['NSFC']['B5']['T1'][$no_code] = 0;
				$real['NSFC']['B6']['T1'][$no_code] = 0;
				$real['NSFC']['B7']['T1'][$no_code] = 0;
				$real['NSFC']['B8']['T1'][$no_code] = 0;
				$real['NSFC']['B9']['T1'][$no_code] = 0;
				$real['NSFC']['B10']['T1'][$no_code] = 0;
				$real['NSFC']['B11']['T1'][$no_code] = 0;
				$real['NSFC']['B12']['T1'][$no_code] = 0;
				$real['NSSC']['Total']['T1'][$no_code] = 0;
				$real['NSSC']['B1']['T1'][$no_code] = 0;
				$real['NSSC']['B2']['T1'][$no_code] = 0;
				$real['NSSC']['B3']['T1'][$no_code] = 0;
				$real['NSSC']['B4']['T1'][$no_code] = 0;
				$real['NSSC']['B5']['T1'][$no_code] = 0;
				$real['NSSC']['B6']['T1'][$no_code] = 0;
				$real['NSSC']['B7']['T1'][$no_code] = 0;
				$real['NSSC']['B8']['T1'][$no_code] = 0;
				$real['NSSC']['B9']['T1'][$no_code] = 0;
				$real['NSSC']['B10']['T1'][$no_code] = 0;
				$real['NSSC']['B11']['T1'][$no_code] = 0;
				$real['NSSC']['B12']['T1'][$no_code] = 0;
				$element_cost_code++;
			}

			//Real Wilayah
			$real = array();
			foreach ($element_cost_real[$wilayah.'1']['real'] as $ecs) {
				$real[$ecs->status][$ecs->bulan]['T0'][$ecs->act_grp] += $ecs->biaya_realisasi;
				$real[$ecs->status]['Total']['T0'][$ecs->act_grp] += $ecs->biaya_realisasi;
				$real['NS'][$ecs->bulan]['T0'][$ecs->act_grp] += $ecs->biaya_realisasi;
				$real['NS']['Total']['T0'][$ecs->act_grp] += $ecs->biaya_realisasi;
			}
			foreach ($element_cost_real[$wilayah.'2']['real'] as $ecs) {
				$real[$ecs->status][$ecs->bulan]['T0'][$ecs->act_grp] += $ecs->biaya_realisasi;
				$real[$ecs->status]['Total']['T0'][$ecs->act_grp] += $ecs->biaya_realisasi;
				$real['NS'][$ecs->bulan]['T0'][$ecs->act_grp] += $ecs->biaya_realisasi;
				$real['NS']['Total']['T0'][$ecs->act_grp] += $ecs->biaya_realisasi;
			}
			echo "<pre>";
			var_dump($real);
			echo "</pre>";
			die();
			// : panel
			foreach ($element_cost_real[$wilayah.'3']['real'] as $ecs) {
				$real[$ecs->status][$ecs->bulan]['T0'][$ecs->act_grp] += $ecs->biaya_realisasi;
				$real[$ecs->status]['Total']['T0'][$ecs->act_grp] += $ecs->biaya_realisasi;
				$real['NS'][$ecs->bulan]['T0'][$ecs->act_grp] += $ecs->biaya_realisasi;
				$real['NS']['Total']['T0'][$ecs->act_grp] += $ecs->biaya_realisasi;
			}

			//T1
			foreach ($element_cost_real[$wilayah.'1']['real_t1'] as $ecs) {
				if(isset($real[$ecs->status][$ecs->bulan]['T1'][$ecs->act_grp])){
					$real[$ecs->status][$ecs->bulan]['T1'][$ecs->act_grp] += $ecs->biaya_realisasi;
				}
				else{
					$real[$ecs->status][$ecs->bulan]['T1'][$ecs->act_grp] = $ecs->biaya_realisasi;
				}
				if(isset($real[$ecs->status]['Total']['T1'][$ecs->act_grp])){
					$real[$ecs->status]['Total']['T1'][$ecs->act_grp] += $ecs->biaya_realisasi;
				}
				else{
					$real[$ecs->status]['Total']['T1'][$ecs->act_grp] = $ecs->biaya_realisasi;
				}
				if(isset($real['NS'][$ecs->bulan]['T1'][$ecs->act_grp])){
					$real['NS'][$ecs->bulan]['T1'][$ecs->act_grp] += $ecs->biaya_realisasi;
				}
				else{
					$real['NS'][$ecs->bulan]['T1'][$ecs->act_grp] = $ecs->biaya_realisasi;
				}
				if(isset($real['NS']['Total']['T1'][$ecs->act_grp])){
					$real['NS']['Total']['T1'][$ecs->act_grp] += $ecs->biaya_realisasi;
				}
				else{
					$real['NS']['Total']['T1'][$ecs->act_grp] = $ecs->biaya_realisasi;
				}
			}
			foreach ($element_cost_real[$wilayah.'2']['real_t1'] as $ecs) {
				if(isset($real[$ecs->status][$ecs->bulan]['T1'][$ecs->act_grp])){
					$real[$ecs->status][$ecs->bulan]['T1'][$ecs->act_grp] += $ecs->biaya_realisasi;
				}
				else{
					$real[$ecs->status][$ecs->bulan]['T1'][$ecs->act_grp] = $ecs->biaya_realisasi;
				}
				if(isset($real[$ecs->status]['Total']['T1'][$ecs->act_grp])){
					$real[$ecs->status]['Total']['T1'][$ecs->act_grp] += $ecs->biaya_realisasi;
				}
				else{
					$real[$ecs->status]['Total']['T1'][$ecs->act_grp] = $ecs->biaya_realisasi;
				}
				if(isset($real['NS'][$ecs->bulan]['T1'][$ecs->act_grp])){
					$real['NS'][$ecs->bulan]['T1'][$ecs->act_grp] += $ecs->biaya_realisasi;
				}
				else{
					$real['NS'][$ecs->bulan]['T1'][$ecs->act_grp] = $ecs->biaya_realisasi;
				}
				if(isset($real['NS']['Total']['T1'][$ecs->act_grp])){
					$real['NS']['Total']['T1'][$ecs->act_grp] += $ecs->biaya_realisasi;
				}
				else{
					$real['NS']['Total']['T1'][$ecs->act_grp] = $ecs->biaya_realisasi;
				}
			}
			foreach ($element_cost_real[$wilayah.'3']['real_t1'] as $ecs) {
				if(isset($real[$ecs->status][$ecs->bulan]['T1'][$ecs->act_grp])){
					$real[$ecs->status][$ecs->bulan]['T1'][$ecs->act_grp] += $ecs->biaya_realisasi;
				}
				else{
					$real[$ecs->status][$ecs->bulan]['T1'][$ecs->act_grp] = $ecs->biaya_realisasi;
				}
				if(isset($real[$ecs->status]['Total']['T1'][$ecs->act_grp])){
					$real[$ecs->status]['Total']['T1'][$ecs->act_grp] += $ecs->biaya_realisasi;
				}
				else{
					$real[$ecs->status]['Total']['T1'][$ecs->act_grp] = $ecs->biaya_realisasi;
				}
				if(isset($real['NS'][$ecs->bulan]['T1'][$ecs->act_grp])){
					$real['NS'][$ecs->bulan]['T1'][$ecs->act_grp] += $ecs->biaya_realisasi;
				}
				else{
					$real['NS'][$ecs->bulan]['T1'][$ecs->act_grp] = $ecs->biaya_realisasi;
				}
				if(isset($real['NS']['Total']['T1'][$ecs->act_grp])){
					$real['NS']['Total']['T1'][$ecs->act_grp] += $ecs->biaya_realisasi;
				}
				else{
					$real['NS']['Total']['T1'][$ecs->act_grp] = $ecs->biaya_realisasi;
				}
			}

			//Luas dan Tonase
			$luas = array();
			$tonase = array();
			foreach ($element_cost_real[$wilayah.'1']['luas_tonase'] as $lt) {
				//Luas
				if(isset($luas[$lt->status][$lt->bulan]['T0'])){
					$luas[$lt->status][$lt->bulan]['T0'] += $lt->luas;
				}
				else{
					$luas[$lt->status][$lt->bulan]['T0'] = $lt->luas;
				}
				if(isset($luas[$lt->status]['Total']['T0'])){
					$luas[$lt->status]['Total']['T0'] += $lt->luas;
				}
				else{
					$luas[$lt->status]['Total']['T0'] = $lt->luas;
				}
				if(isset($luas['NS'][$lt->bulan]['T0'])){
					$luas['NS'][$lt->bulan]['T0'] += $lt->luas;
				}
				else{
					$luas['NS'][$lt->bulan]['T0'] = $lt->luas;
				}
				if(isset($luas['NS']['Total']['T0'])){
					$luas['NS']['Total']['T0'] += $lt->luas;
				}
				else{
					$luas['NS']['Total']['T0'] = $lt->luas;
				}

				//Tonase
				if(isset($tonase[$lt->status][$lt->bulan]['T0'])){
					$tonase[$lt->status][$lt->bulan]['T0'] += $lt->tonase;
				}
				else{
					$tonase[$lt->status][$lt->bulan]['T0'] = $lt->tonase;
				}
				if(isset($tonase[$lt->status]['Total']['T0'])){
					$tonase[$lt->status]['Total']['T0'] += $lt->tonase;
				}
				else{
					$tonase[$lt->status]['Total']['T0'] = $lt->tonase;
				}
				if(isset($tonase['NS'][$lt->bulan]['T0'])){
					$tonase['NS'][$lt->bulan]['T0'] += $lt->tonase;
				}
				else{
					$tonase['NS'][$lt->bulan]['T0'] = $lt->tonase;
				}
				if(isset($tonase['NS']['Total']['T0'])){
					$tonase['NS']['Total']['T0'] += $lt->tonase;
				}
				else{
					$tonase['NS']['Total']['T0'] = $lt->tonase;
				}
			}
			foreach ($element_cost_real[$wilayah.'2']['luas_tonase'] as $lt) {
				//Luas
				if(isset($luas[$lt->status][$lt->bulan]['T0'])){
					$luas[$lt->status][$lt->bulan]['T0'] += $lt->luas;
				}
				else{
					$luas[$lt->status][$lt->bulan]['T0'] = $lt->luas;
				}
				if(isset($luas[$lt->status]['Total']['T0'])){
					$luas[$lt->status]['Total']['T0'] += $lt->luas;
				}
				else{
					$luas[$lt->status]['Total']['T0'] = $lt->luas;
				}
				if(isset($luas['NS'][$lt->bulan]['T0'])){
					$luas['NS'][$lt->bulan]['T0'] += $lt->luas;
				}
				else{
					$luas['NS'][$lt->bulan]['T0'] = $lt->luas;
				}
				if(isset($luas['NS']['Total']['T0'])){
					$luas['NS']['Total']['T0'] += $lt->luas;
				}
				else{
					$luas['NS']['Total']['T0'] = $lt->luas;
				}

				//Tonase
				if(isset($tonase[$lt->status][$lt->bulan]['T0'])){
					$tonase[$lt->status][$lt->bulan]['T0'] += $lt->tonase;
				}
				else{
					$tonase[$lt->status][$lt->bulan]['T0'] = $lt->tonase;
				}
				if(isset($tonase[$lt->status]['Total']['T0'])){
					$tonase[$lt->status]['Total']['T0'] += $lt->tonase;
				}
				else{
					$tonase[$lt->status]['Total']['T0'] = $lt->tonase;
				}
				if(isset($tonase['NS'][$lt->bulan]['T0'])){
					$tonase['NS'][$lt->bulan]['T0'] += $lt->tonase;
				}
				else{
					$tonase['NS'][$lt->bulan]['T0'] = $lt->tonase;
				}
				if(isset($tonase['NS']['Total']['T0'])){
					$tonase['NS']['Total']['T0'] += $lt->tonase;
				}
				else{
					$tonase['NS']['Total']['T0'] = $lt->tonase;
				}
			}
			foreach ($element_cost_real[$wilayah.'3']['luas_tonase'] as $lt) {
				//Luas
				if(isset($luas[$lt->status][$lt->bulan]['T0'])){
					$luas[$lt->status][$lt->bulan]['T0'] += $lt->luas;
				}
				else{
					$luas[$lt->status][$lt->bulan]['T0'] = $lt->luas;
				}
				if(isset($luas[$lt->status]['Total']['T0'])){
					$luas[$lt->status]['Total']['T0'] += $lt->luas;
				}
				else{
					$luas[$lt->status]['Total']['T0'] = $lt->luas;
				}
				if(isset($luas['NS'][$lt->bulan]['T0'])){
					$luas['NS'][$lt->bulan]['T0'] += $lt->luas;
				}
				else{
					$luas['NS'][$lt->bulan]['T0'] = $lt->luas;
				}
				if(isset($luas['NS']['Total']['T0'])){
					$luas['NS']['Total']['T0'] += $lt->luas;
				}
				else{
					$luas['NS']['Total']['T0'] = $lt->luas;
				}

				//Tonase
				if(isset($tonase[$lt->status][$lt->bulan]['T0'])){
					$tonase[$lt->status][$lt->bulan]['T0'] += $lt->tonase;
				}
				else{
					$tonase[$lt->status][$lt->bulan]['T0'] = $lt->tonase;
				}
				if(isset($tonase[$lt->status]['Total']['T0'])){
					$tonase[$lt->status]['Total']['T0'] += $lt->tonase;
				}
				else{
					$tonase[$lt->status]['Total']['T0'] = $lt->tonase;
				}
				if(isset($tonase['NS'][$lt->bulan]['T0'])){
					$tonase['NS'][$lt->bulan]['T0'] += $lt->tonase;
				}
				else{
					$tonase['NS'][$lt->bulan]['T0'] = $lt->tonase;
				}
				if(isset($tonase['NS']['Total']['T0'])){
					$tonase['NS']['Total']['T0'] += $lt->tonase;
				}
				else{
					$tonase['NS']['Total']['T0'] = $lt->tonase;
				}
			}
			//T1
			foreach ($element_cost_real[$wilayah.'1']['luas_tonase_t1'] as $lt) {
				//Luas
				if(isset($luas[$lt->status][$lt->bulan]['T1'])){
					$luas[$lt->status][$lt->bulan]['T1'] += $lt->luas;
				}
				else{
					$luas[$lt->status][$lt->bulan]['T1'] = $lt->luas;
				}
				if(isset($luas[$lt->status]['Total']['T1'])){
					$luas[$lt->status]['Total']['T1'] += $lt->luas;
				}
				else{
					$luas[$lt->status]['Total']['T1'] = $lt->luas;
				}
				if(isset($luas['NS'][$lt->bulan]['T1'])){
					$luas['NS'][$lt->bulan]['T1'] += $lt->luas;
				}
				else{
					$luas['NS'][$lt->bulan]['T1'] = $lt->luas;
				}
				if(isset($luas['NS']['Total']['T1'])){
					$luas['NS']['Total']['T1'] += $lt->luas;
				}
				else{
					$luas['NS']['Total']['T1'] = $lt->luas;
				}

				//Tonase
				if(isset($tonase[$lt->status][$lt->bulan]['T1'])){
					$tonase[$lt->status][$lt->bulan]['T1'] += $lt->tonase;
				}
				else{
					$tonase[$lt->status][$lt->bulan]['T1'] = $lt->tonase;
				}
				if(isset($tonase[$lt->status]['Total']['T1'])){
					$tonase[$lt->status]['Total']['T1'] += $lt->tonase;
				}
				else{
					$tonase[$lt->status]['Total']['T1'] = $lt->tonase;
				}
				if(isset($tonase['NS'][$lt->bulan]['T1'])){
					$tonase['NS'][$lt->bulan]['T1'] += $lt->tonase;
				}
				else{
					$tonase['NS'][$lt->bulan]['T1'] = $lt->tonase;
				}
				if(isset($tonase['NS']['Total']['T1'])){
					$tonase['NS']['Total']['T1'] += $lt->tonase;
				}
				else{
					$tonase['NS']['Total']['T1'] = $lt->tonase;
				}
			}
			foreach ($element_cost_real[$wilayah.'2']['luas_tonase_t1'] as $lt) {
				//Luas
				if(isset($luas[$lt->status][$lt->bulan]['T1'])){
					$luas[$lt->status][$lt->bulan]['T1'] += $lt->luas;
				}
				else{
					$luas[$lt->status][$lt->bulan]['T1'] = $lt->luas;
				}
				if(isset($luas[$lt->status]['Total']['T1'])){
					$luas[$lt->status]['Total']['T1'] += $lt->luas;
				}
				else{
					$luas[$lt->status]['Total']['T1'] = $lt->luas;
				}
				if(isset($luas['NS'][$lt->bulan]['T1'])){
					$luas['NS'][$lt->bulan]['T1'] += $lt->luas;
				}
				else{
					$luas['NS'][$lt->bulan]['T1'] = $lt->luas;
				}
				if(isset($luas['NS']['Total']['T1'])){
					$luas['NS']['Total']['T1'] += $lt->luas;
				}
				else{
					$luas['NS']['Total']['T1'] = $lt->luas;
				}

				//Tonase
				if(isset($tonase[$lt->status][$lt->bulan]['T1'])){
					$tonase[$lt->status][$lt->bulan]['T1'] += $lt->tonase;
				}
				else{
					$tonase[$lt->status][$lt->bulan]['T1'] = $lt->tonase;
				}
				if(isset($tonase[$lt->status]['Total']['T1'])){
					$tonase[$lt->status]['Total']['T1'] += $lt->tonase;
				}
				else{
					$tonase[$lt->status]['Total']['T1'] = $lt->tonase;
				}
				if(isset($tonase['NS'][$lt->bulan]['T1'])){
					$tonase['NS'][$lt->bulan]['T1'] += $lt->tonase;
				}
				else{
					$tonase['NS'][$lt->bulan]['T1'] = $lt->tonase;
				}
				if(isset($tonase['NS']['Total']['T1'])){
					$tonase['NS']['Total']['T1'] += $lt->tonase;
				}
				else{
					$tonase['NS']['Total']['T1'] = $lt->tonase;
				}
			}
			foreach ($element_cost_real[$wilayah.'3']['luas_tonase_t1'] as $lt) {
				//Luas
				if(isset($luas[$lt->status][$lt->bulan]['T1'])){
					$luas[$lt->status][$lt->bulan]['T1'] += $lt->luas;
				}
				else{
					$luas[$lt->status][$lt->bulan]['T1'] = $lt->luas;
				}
				if(isset($luas[$lt->status]['Total']['T1'])){
					$luas[$lt->status]['Total']['T1'] += $lt->luas;
				}
				else{
					$luas[$lt->status]['Total']['T1'] = $lt->luas;
				}
				if(isset($luas['NS'][$lt->bulan]['T1'])){
					$luas['NS'][$lt->bulan]['T1'] += $lt->luas;
				}
				else{
					$luas['NS'][$lt->bulan]['T1'] = $lt->luas;
				}
				if(isset($luas['NS']['Total']['T1'])){
					$luas['NS']['Total']['T1'] += $lt->luas;
				}
				else{
					$luas['NS']['Total']['T1'] = $lt->luas;
				}

				//Tonase
				if(isset($tonase[$lt->status][$lt->bulan]['T1'])){
					$tonase[$lt->status][$lt->bulan]['T1'] += $lt->tonase;
				}
				else{
					$tonase[$lt->status][$lt->bulan]['T1'] = $lt->tonase;
				}
				if(isset($tonase[$lt->status]['Total']['T1'])){
					$tonase[$lt->status]['Total']['T1'] += $lt->tonase;
				}
				else{
					$tonase[$lt->status]['Total']['T1'] = $lt->tonase;
				}
				if(isset($tonase['NS'][$lt->bulan]['T1'])){
					$tonase['NS'][$lt->bulan]['T1'] += $lt->tonase;
				}
				else{
					$tonase['NS'][$lt->bulan]['T1'] = $lt->tonase;
				}
				if(isset($tonase['NS']['Total']['T1'])){
					$tonase['NS']['Total']['T1'] += $lt->tonase;
				}
				else{
					$tonase['NS']['Total']['T1'] = $lt->tonase;
				}
			}

			//HPP
			foreach ($hpp as $hpp){
				//Status dan Bulan
				if(isset($real[$hpp->status][$hpp->bulan]['T0']['ZN01'])){
					$real[$hpp->status][$hpp->bulan]['T0']['ZN01'] += $hpp->ZN01;
				}
				else{
					$real[$hpp->status][$hpp->bulan]['T0']['ZN01'] = $hpp->ZN01;
				}
				if(isset($real[$hpp->status][$hpp->bulan]['T0']['ZN02'])){
					$real[$hpp->status][$hpp->bulan]['T0']['ZN02'] += $hpp->ZN02;
				}
				else{
					$real[$hpp->status][$hpp->bulan]['T0']['ZN02'] = $hpp->ZN02;
				}
				if(isset($real[$hpp->status][$hpp->bulan]['T0']['ZN03'])){
					$real[$hpp->status][$hpp->bulan]['T0']['ZN03'] += $hpp->ZN03;
				}
				else{
					$real[$hpp->status][$hpp->bulan]['T0']['ZN03'] = $hpp->ZN03;
				}
				if(isset($real[$hpp->status][$hpp->bulan]['T0']['ZN04'])){
					$real[$hpp->status][$hpp->bulan]['T0']['ZN04'] += $hpp->ZN04;
				}
				else{
					$real[$hpp->status][$hpp->bulan]['T0']['ZN04'] = $hpp->ZN04;
				}
				if(isset($real[$hpp->status][$hpp->bulan]['T0']['ZN05'])){
					$real[$hpp->status][$hpp->bulan]['T0']['ZN05'] += $hpp->ZN05;
				}
				else{
					$real[$hpp->status][$hpp->bulan]['T0']['ZN05'] = $hpp->ZN05;
				}
				if(isset($real[$hpp->status][$hpp->bulan]['T0']['ZN06'])){
					$real[$hpp->status][$hpp->bulan]['T0']['ZN06'] += $hpp->ZN06;
				}
				else{
					$real[$hpp->status][$hpp->bulan]['T0']['ZN06'] = $hpp->ZN06;
				}
				if(isset($real[$hpp->status][$hpp->bulan]['T0']['ZN07'])){
					$real[$hpp->status][$hpp->bulan]['T0']['ZN07'] += $hpp->ZN07;
				}
				else{
					$real[$hpp->status][$hpp->bulan]['T0']['ZN07'] = $hpp->ZN07;
				}
				if(isset($real[$hpp->status][$hpp->bulan]['T0']['ZN08'])){
					$real[$hpp->status][$hpp->bulan]['T0']['ZN08'] += $hpp->ZN08;
				}
				else{
					$real[$hpp->status][$hpp->bulan]['T0']['ZN08'] = $hpp->ZN08;
				}
				if(isset($real[$hpp->status][$hpp->bulan]['T0']['ZN09'])){
					$real[$hpp->status][$hpp->bulan]['T0']['ZN09'] += $hpp->ZN09;
				}
				else{
					$real[$hpp->status][$hpp->bulan]['T0']['ZN09'] = $hpp->ZN09;
				}
				if(isset($real[$hpp->status][$hpp->bulan]['T0']['ZN10'])){
					$real[$hpp->status][$hpp->bulan]['T0']['ZN10'] += $hpp->ZN10;
				}
				else{
					$real[$hpp->status][$hpp->bulan]['T0']['ZN10'] = $hpp->ZN10;
				}
				if(isset($real[$hpp->status][$hpp->bulan]['T0']['ZN11'])){
					$real[$hpp->status][$hpp->bulan]['T0']['ZN11'] += $hpp->ZN11;
				}
				else{
					$real[$hpp->status][$hpp->bulan]['T0']['ZN11'] = $hpp->ZN11;
				}
				if(isset($real[$hpp->status][$hpp->bulan]['T0']['ZN12'])){
					$real[$hpp->status][$hpp->bulan]['T0']['ZN12'] += $hpp->ZN12;
				}
				else{
					$real[$hpp->status][$hpp->bulan]['T0']['ZN12'] = $hpp->ZN12;
				}
				if(isset($real[$hpp->status][$hpp->bulan]['T0']['ZN13'])){
					$real[$hpp->status][$hpp->bulan]['T0']['ZN13'] += $hpp->ZN13;
				}
				else{
					$real[$hpp->status][$hpp->bulan]['T0']['ZN13'] = $hpp->ZN13;
				}
				if(isset($real[$hpp->status][$hpp->bulan]['T0']['ZN14'])){
					$real[$hpp->status][$hpp->bulan]['T0']['ZN14'] += $hpp->ZN14;
				}
				else{
					$real[$hpp->status][$hpp->bulan]['T0']['ZN14'] = $hpp->ZN14;
				}
				if(isset($real[$hpp->status][$hpp->bulan]['T0']['ZN15'])){
					$real[$hpp->status][$hpp->bulan]['T0']['ZN15'] += $hpp->ZN15;
				}
				else{
					$real[$hpp->status][$hpp->bulan]['T0']['ZN15'] = $hpp->ZN15;
				}

				//Status dan Total Bulan
				if(isset($real[$hpp->status]['Total']['T0']['ZN01'])){
					$real[$hpp->status]['Total']['T0']['ZN01'] += $hpp->ZN01;
				}
				else{
					$real[$hpp->status]['Total']['T0']['ZN01'] = $hpp->ZN01;
				}
				if(isset($real[$hpp->status]['Total']['T0']['ZN02'])){
					$real[$hpp->status]['Total']['T0']['ZN02'] += $hpp->ZN02;
				}
				else{
					$real[$hpp->status]['Total']['T0']['ZN02'] = $hpp->ZN02;
				}
				if(isset($real[$hpp->status]['Total']['T0']['ZN03'])){
					$real[$hpp->status]['Total']['T0']['ZN03'] += $hpp->ZN03;
				}
				else{
					$real[$hpp->status]['Total']['T0']['ZN03'] = $hpp->ZN03;
				}
				if(isset($real[$hpp->status]['Total']['T0']['ZN04'])){
					$real[$hpp->status]['Total']['T0']['ZN04'] += $hpp->ZN04;
				}
				else{
					$real[$hpp->status]['Total']['T0']['ZN04'] = $hpp->ZN04;
				}
				if(isset($real[$hpp->status]['Total']['T0']['ZN05'])){
					$real[$hpp->status]['Total']['T0']['ZN05'] += $hpp->ZN05;
				}
				else{
					$real[$hpp->status]['Total']['T0']['ZN05'] = $hpp->ZN05;
				}
				if(isset($real[$hpp->status]['Total']['T0']['ZN06'])){
					$real[$hpp->status]['Total']['T0']['ZN06'] += $hpp->ZN06;
				}
				else{
					$real[$hpp->status]['Total']['T0']['ZN06'] = $hpp->ZN06;
				}
				if(isset($real[$hpp->status]['Total']['T0']['ZN07'])){
					$real[$hpp->status]['Total']['T0']['ZN07'] += $hpp->ZN07;
				}
				else{
					$real[$hpp->status]['Total']['T0']['ZN07'] = $hpp->ZN07;
				}
				if(isset($real[$hpp->status]['Total']['T0']['ZN08'])){
					$real[$hpp->status]['Total']['T0']['ZN08'] += $hpp->ZN08;
				}
				else{
					$real[$hpp->status]['Total']['T0']['ZN08'] = $hpp->ZN08;
				}
				if(isset($real[$hpp->status]['Total']['T0']['ZN09'])){
					$real[$hpp->status]['Total']['T0']['ZN09'] += $hpp->ZN09;
				}
				else{
					$real[$hpp->status]['Total']['T0']['ZN09'] = $hpp->ZN09;
				}
				if(isset($real[$hpp->status]['Total']['T0']['ZN10'])){
					$real[$hpp->status]['Total']['T0']['ZN10'] += $hpp->ZN10;
				}
				else{
					$real[$hpp->status]['Total']['T0']['ZN10'] = $hpp->ZN10;
				}
				if(isset($real[$hpp->status]['Total']['T0']['ZN11'])){
					$real[$hpp->status]['Total']['T0']['ZN11'] += $hpp->ZN11;
				}
				else{
					$real[$hpp->status]['Total']['T0']['ZN11'] = $hpp->ZN11;
				}
				if(isset($real[$hpp->status]['Total']['T0']['ZN12'])){
					$real[$hpp->status]['Total']['T0']['ZN12'] += $hpp->ZN12;
				}
				else{
					$real[$hpp->status]['Total']['T0']['ZN12'] = $hpp->ZN12;
				}
				if(isset($real[$hpp->status]['Total']['T0']['ZN13'])){
					$real[$hpp->status]['Total']['T0']['ZN13'] += $hpp->ZN13;
				}
				else{
					$real[$hpp->status]['Total']['T0']['ZN13'] = $hpp->ZN13;
				}
				if(isset($real[$hpp->status]['Total']['T0']['ZN14'])){
					$real[$hpp->status]['Total']['T0']['ZN14'] += $hpp->ZN14;
				}
				else{
					$real[$hpp->status]['Total']['T0']['ZN14'] = $hpp->ZN14;
				}
				if(isset($real[$hpp->status]['Total']['T0']['ZN15'])){
					$real[$hpp->status]['Total']['T0']['ZN15'] += $hpp->ZN15;
				}
				else{
					$real[$hpp->status]['Total']['T0']['ZN15'] = $hpp->ZN15;
				}

				//Status dan Bulan
				if(isset($real['NS'][$hpp->bulan]['T0']['ZN01'])){
					$real['NS'][$hpp->bulan]['T0']['ZN01'] += $hpp->ZN01;
				}
				else{
					$real['NS'][$hpp->bulan]['T0']['ZN01'] = $hpp->ZN01;
				}
				if(isset($real['NS'][$hpp->bulan]['T0']['ZN02'])){
					$real['NS'][$hpp->bulan]['T0']['ZN02'] += $hpp->ZN02;
				}
				else{
					$real['NS'][$hpp->bulan]['T0']['ZN02'] = $hpp->ZN02;
				}
				if(isset($real['NS'][$hpp->bulan]['T0']['ZN03'])){
					$real['NS'][$hpp->bulan]['T0']['ZN03'] += $hpp->ZN03;
				}
				else{
					$real['NS'][$hpp->bulan]['T0']['ZN03'] = $hpp->ZN03;
				}
				if(isset($real['NS'][$hpp->bulan]['T0']['ZN04'])){
					$real['NS'][$hpp->bulan]['T0']['ZN04'] += $hpp->ZN04;
				}
				else{
					$real['NS'][$hpp->bulan]['T0']['ZN04'] = $hpp->ZN04;
				}
				if(isset($real['NS'][$hpp->bulan]['T0']['ZN05'])){
					$real['NS'][$hpp->bulan]['T0']['ZN05'] += $hpp->ZN05;
				}
				else{
					$real['NS'][$hpp->bulan]['T0']['ZN05'] = $hpp->ZN05;
				}
				if(isset($real['NS'][$hpp->bulan]['T0']['ZN06'])){
					$real['NS'][$hpp->bulan]['T0']['ZN06'] += $hpp->ZN06;
				}
				else{
					$real['NS'][$hpp->bulan]['T0']['ZN06'] = $hpp->ZN06;
				}
				if(isset($real['NS'][$hpp->bulan]['T0']['ZN07'])){
					$real['NS'][$hpp->bulan]['T0']['ZN07'] += $hpp->ZN07;
				}
				else{
					$real['NS'][$hpp->bulan]['T0']['ZN07'] = $hpp->ZN07;
				}
				if(isset($real['NS'][$hpp->bulan]['T0']['ZN08'])){
					$real['NS'][$hpp->bulan]['T0']['ZN08'] += $hpp->ZN08;
				}
				else{
					$real['NS'][$hpp->bulan]['T0']['ZN08'] = $hpp->ZN08;
				}
				if(isset($real['NS'][$hpp->bulan]['T0']['ZN09'])){
					$real['NS'][$hpp->bulan]['T0']['ZN09'] += $hpp->ZN09;
				}
				else{
					$real['NS'][$hpp->bulan]['T0']['ZN09'] = $hpp->ZN09;
				}
				if(isset($real['NS'][$hpp->bulan]['T0']['ZN10'])){
					$real['NS'][$hpp->bulan]['T0']['ZN10'] += $hpp->ZN10;
				}
				else{
					$real['NS'][$hpp->bulan]['T0']['ZN10'] = $hpp->ZN10;
				}
				if(isset($real['NS'][$hpp->bulan]['T0']['ZN11'])){
					$real['NS'][$hpp->bulan]['T0']['ZN11'] += $hpp->ZN11;
				}
				else{
					$real['NS'][$hpp->bulan]['T0']['ZN11'] = $hpp->ZN11;
				}
				if(isset($real['NS'][$hpp->bulan]['T0']['ZN12'])){
					$real['NS'][$hpp->bulan]['T0']['ZN12'] += $hpp->ZN12;
				}
				else{
					$real['NS'][$hpp->bulan]['T0']['ZN12'] = $hpp->ZN12;
				}
				if(isset($real['NS'][$hpp->bulan]['T0']['ZN13'])){
					$real['NS'][$hpp->bulan]['T0']['ZN13'] += $hpp->ZN13;
				}
				else{
					$real['NS'][$hpp->bulan]['T0']['ZN13'] = $hpp->ZN13;
				}
				if(isset($real['NS'][$hpp->bulan]['T0']['ZN14'])){
					$real['NS'][$hpp->bulan]['T0']['ZN14'] += $hpp->ZN14;
				}
				else{
					$real['NS'][$hpp->bulan]['T0']['ZN14'] = $hpp->ZN14;
				}
				if(isset($real['NS'][$hpp->bulan]['T0']['ZN15'])){
					$real['NS'][$hpp->bulan]['T0']['ZN15'] += $hpp->ZN15;
				}
				else{
					$real['NS'][$hpp->bulan]['T0']['ZN15'] = $hpp->ZN15;
				}

				//Status dan Bulan
				if(isset($real['NS']['Total']['T0']['ZN01'])){
					$real['NS']['Total']['T0']['ZN01'] += $hpp->ZN01;
				}
				else{
					$real['NS']['Total']['T0']['ZN01'] = $hpp->ZN01;
				}
				if(isset($real['NS']['Total']['T0']['ZN02'])){
					$real['NS']['Total']['T0']['ZN02'] += $hpp->ZN02;
				}
				else{
					$real['NS']['Total']['T0']['ZN02'] = $hpp->ZN02;
				}
				if(isset($real['NS']['Total']['T0']['ZN03'])){
					$real['NS']['Total']['T0']['ZN03'] += $hpp->ZN03;
				}
				else{
					$real['NS']['Total']['T0']['ZN03'] = $hpp->ZN03;
				}
				if(isset($real['NS']['Total']['T0']['ZN04'])){
					$real['NS']['Total']['T0']['ZN04'] += $hpp->ZN04;
				}
				else{
					$real['NS']['Total']['T0']['ZN04'] = $hpp->ZN04;
				}
				if(isset($real['NS']['Total']['T0']['ZN05'])){
					$real['NS']['Total']['T0']['ZN05'] += $hpp->ZN05;
				}
				else{
					$real['NS']['Total']['T0']['ZN05'] = $hpp->ZN05;
				}
				if(isset($real['NS']['Total']['T0']['ZN06'])){
					$real['NS']['Total']['T0']['ZN06'] += $hpp->ZN06;
				}
				else{
					$real['NS']['Total']['T0']['ZN06'] = $hpp->ZN06;
				}
				if(isset($real['NS']['Total']['T0']['ZN07'])){
					$real['NS']['Total']['T0']['ZN07'] += $hpp->ZN07;
				}
				else{
					$real['NS']['Total']['T0']['ZN07'] = $hpp->ZN07;
				}
				if(isset($real['NS']['Total']['T0']['ZN08'])){
					$real['NS']['Total']['T0']['ZN08'] += $hpp->ZN08;
				}
				else{
					$real['NS']['Total']['T0']['ZN08'] = $hpp->ZN08;
				}
				if(isset($real['NS']['Total']['T0']['ZN09'])){
					$real['NS']['Total']['T0']['ZN09'] += $hpp->ZN09;
				}
				else{
					$real['NS']['Total']['T0']['ZN09'] = $hpp->ZN09;
				}
				if(isset($real['NS']['Total']['T0']['ZN10'])){
					$real['NS']['Total']['T0']['ZN10'] += $hpp->ZN10;
				}
				else{
					$real['NS']['Total']['T0']['ZN10'] = $hpp->ZN10;
				}
				if(isset($real['NS']['Total']['T0']['ZN11'])){
					$real['NS']['Total']['T0']['ZN11'] += $hpp->ZN11;
				}
				else{
					$real['NS']['Total']['T0']['ZN11'] = $hpp->ZN11;
				}
				if(isset($real['NS']['Total']['T0']['ZN12'])){
					$real['NS']['Total']['T0']['ZN12'] += $hpp->ZN12;
				}
				else{
					$real['NS']['Total']['T0']['ZN12'] = $hpp->ZN12;
				}
				if(isset($real['NS']['Total']['T0']['ZN13'])){
					$real['NS']['Total']['T0']['ZN13'] += $hpp->ZN13;
				}
				else{
					$real['NS']['Total']['T0']['ZN13'] = $hpp->ZN13;
				}
				if(isset($real['NS']['Total']['T0']['ZN14'])){
					$real['NS']['Total']['T0']['ZN14'] += $hpp->ZN14;
				}
				else{
					$real['NS']['Total']['T0']['ZN14'] = $hpp->ZN14;
				}
				if(isset($real['NS']['Total']['T0']['ZN15'])){
					$real['NS']['Total']['T0']['ZN15'] += $hpp->ZN15;
				}
				else{
					$real['NS']['Total']['T0']['ZN15'] = $hpp->ZN15;
				}
			}

			echo "<pre>";
			var_dump($real['NS']['Total']['T0']['ZN04']);
			var_dump($real['NSFC']['Total']['T0']['ZN04']);
			var_dump($real['NSSC']['Total']['T0']['ZN04']);
			var_dump($real['NS']['Total']['T1']['ZN04']);
			var_dump($real['NSFC']['Total']['T1']['ZN04']);
			var_dump($real['NSSC']['Total']['T1']['ZN04']);
			echo "</pre>";
			die();
			$il = 0;
			while($il < 3){
				switch ($il) {
					case '0':
						$status = 'NS';
						break;
					case '1':
						$status = 'NSFC';
						break;
					case '2':
						$status = 'NSSC';
						break;
				}
				$iil = 0;
				while($iil <= 12){
					switch ($iil) {
						case '0':
							$bulan = 'Total';
							break;
						default:
							$bulan = 'B'.$iil;
							break;
					}
					$iiil = 1;
					while($iiil <= 15){
						//Real
						if($iiil < 10){
							$jenis = 'ZN0'.$iiil;
						}
						else{
							$jenis = 'ZN'.$iiil;
						}
						if(isset($real[$status][$bulan]['T0'][$jenis])){
							$query = $this->Raport_model->set_real_wilayah($wilayah, $status, $bulan, 'T0', 'Real', $jenis, $real[$status][$bulan]['T0'][$jenis]);
							$query = $this->Raport_model->set_real_wilayah($wilayah, $status, $bulan, 'T0', 'Actual', $jenis, $real[$status][$bulan]['T0'][$jenis]);
						}
						else{
							$query = $this->Raport_model->set_real_wilayah($wilayah, $status, $bulan, 'T0', 'Real', $jenis, 0);
							$query = $this->Raport_model->set_real_wilayah($wilayah, $status, $bulan, 'T0', 'Actual', $jenis, 0);
						}
						if(isset($real[$status][$bulan]['T1'][$jenis])){
							$query = $this->Raport_model->set_real_wilayah($wilayah, $status, $bulan, 'T1', 'Real', $jenis, $real[$status][$bulan]['T1'][$jenis]);
							$query = $this->Raport_model->set_real_wilayah($wilayah, $status, $bulan, 'T1', 'Actual', $jenis, $real[$status][$bulan]['T1'][$jenis]);
						}
						else{
							$query = $this->Raport_model->set_real_wilayah($wilayah, $status, $bulan, 'T1', 'Real', $jenis, 0);
							$query = $this->Raport_model->set_real_wilayah($wilayah, $status, $bulan, 'T1', 'Actual', $jenis, 0);
						}
						$iiil++;
					}
					//Luas dan Tonase
					if(isset($luas[$status][$bulan]['T0'])){
						$query = $this->Raport_model->set_luas_wilayah($wilayah, $status, $bulan, 'T0', $luas[$status][$bulan]['T0']);
					}
					else{
						$query = $this->Raport_model->set_luas_wilayah($wilayah, $status, $bulan, 'T0', '0');
					}
					if(isset($luas[$status][$bulan]['T1'])){
						$query = $this->Raport_model->set_luas_wilayah($wilayah, $status, $bulan, 'T1', $luas[$status][$bulan]['T1']);
					}
					else{
						$query = $this->Raport_model->set_luas_wilayah($wilayah, $status, $bulan, 'T1', '0');
					}
					if(isset($tonase[$status][$bulan]['T0'])){
						$query = $this->Raport_model->set_tonase_wilayah($wilayah, $status, $bulan, 'T0', $tonase[$status][$bulan]['T0']);
					}
					else{
						$query = $this->Raport_model->set_tonase_wilayah($wilayah, $status, $bulan, 'T0', 0);
					}
					if(isset($tonase[$status][$bulan]['T1'])){
						$query = $this->Raport_model->set_tonase_wilayah($wilayah, $status, $bulan, 'T1', $tonase[$status][$bulan]['T1']);
					}
					else{
						$query = $this->Raport_model->set_tonase_wilayah($wilayah, $status, $bulan, 'T1', 0);
					}
					$iil++;
				}
				$il++;
			}
			//On success
			if($wilayah == 'W14'){
				echo ("
					<script>
						window.location.href = '/PIS/admin';
						alert('Berhasil di update Real ".$wilayah."');
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
						window.location.href = '/PIS/admin/update_wilayah_real_raport?wilayah=W".$cek_wil."';
					</script>
				");
			}
		}*/

	/*	function update_wilayah_forecast_raport(){
			$wilayah = $this->input->get('wilayah');
			$element_cost_f = array(
				$wilayah.'1' => $this->Forecast_model->get_forecast_wilayah_report($wilayah.'1'),
				$wilayah.'2' => $this->Forecast_model->get_forecast_wilayah_report($wilayah.'2'),
				$wilayah.'3' => $this->Forecast_model->get_forecast_wilayah_report($wilayah.'3')
			);
			$element_cost_ZN10 = array(
					$wilayah.'1' => $this->Forecast_model->get_forecast_zn10_wilayah_raport($wilayah.'1'),
					$wilayah.'2' => $this->Forecast_model->get_forecast_zn10_wilayah_raport($wilayah.'2'),
					$wilayah.'3' => $this->Forecast_model->get_forecast_zn10_wilayah_raport($wilayah.'3')
			);
			$element_cost_ZN08 = array(
					$wilayah.'1' => $this->Forecast_model->get_forecast_zn08_wilayah_raport($wilayah.'1'),
					$wilayah.'2' => $this->Forecast_model->get_forecast_zn08_wilayah_raport($wilayah.'2'),
					$wilayah.'3' => $this->Forecast_model->get_forecast_zn08_wilayah_raport($wilayah.'3')
			);

			//Forecast dan Actual
			$forecast = array();
			$actual = array();
			//ZN01 - ZN15 Except(ZN08 and ZN10)
			foreach ($element_cost_f[$wilayah.'1'] as $ecf) {
				//Forcast ZN01
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN01'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN01'] += $ecf->ZN01;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN01'] = $ecf->ZN01;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN01'])){
					$forecast[$ecf->status]['Total']['T0']['ZN01'] += $ecf->ZN01;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN01'] = $ecf->ZN01;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN01'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN01'] += $ecf->ZN01;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN01'] = $ecf->ZN01;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN01'])){
					$forecast['NS']['Total']['T0']['ZN01'] += $ecf->ZN01;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN01'] = $ecf->ZN01;
				}
				//Forcast ZN02
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN02'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN02'] += $ecf->ZN02;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN02'] = $ecf->ZN02;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN02'])){
					$forecast[$ecf->status]['Total']['T0']['ZN02'] += $ecf->ZN02;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN02'] = $ecf->ZN02;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN02'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN02'] += $ecf->ZN02;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN02'] = $ecf->ZN02;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN02'])){
					$forecast['NS']['Total']['T0']['ZN02'] += $ecf->ZN02;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN02'] = $ecf->ZN02;
				}
				//Forcast ZN03
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN03'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN03'] += $ecf->ZN03;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN03'] = $ecf->ZN03;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN03'])){
					$forecast[$ecf->status]['Total']['T0']['ZN03'] += $ecf->ZN03;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN03'] = $ecf->ZN03;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN03'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN03'] += $ecf->ZN03;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN03'] = $ecf->ZN03;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN03'])){
					$forecast['NS']['Total']['T0']['ZN03'] += $ecf->ZN03;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN03'] = $ecf->ZN03;
				}
				//Forcast ZN04
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN04'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN04'] += $ecf->ZN04;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN04'] = $ecf->ZN04;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN04'])){
					$forecast[$ecf->status]['Total']['T0']['ZN04'] += $ecf->ZN04;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN04'] = $ecf->ZN04;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN04'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN04'] += $ecf->ZN04;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN04'] = $ecf->ZN04;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN04'])){
					$forecast['NS']['Total']['T0']['ZN04'] += $ecf->ZN04;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN04'] = $ecf->ZN04;
				}
				//Forcast ZN05
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN05'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN05'] += $ecf->ZN05;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN05'] = $ecf->ZN05;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN05'])){
					$forecast[$ecf->status]['Total']['T0']['ZN05'] += $ecf->ZN05;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN05'] = $ecf->ZN05;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN05'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN05'] += $ecf->ZN05;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN05'] = $ecf->ZN05;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN05'])){
					$forecast['NS']['Total']['T0']['ZN05'] += $ecf->ZN05;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN05'] = $ecf->ZN05;
				}
				//Forcast ZN06
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN06'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN06'] += $ecf->ZN06;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN06'] = $ecf->ZN06;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN06'])){
					$forecast[$ecf->status]['Total']['T0']['ZN06'] += $ecf->ZN06;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN06'] = $ecf->ZN06;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN06'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN06'] += $ecf->ZN06;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN06'] = $ecf->ZN06;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN06'])){
					$forecast['NS']['Total']['T0']['ZN06'] += $ecf->ZN06;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN06'] = $ecf->ZN06;
				}
				//Forcast ZN07
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN07'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN07'] += $ecf->ZN07;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN07'] = $ecf->ZN07;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN07'])){
					$forecast[$ecf->status]['Total']['T0']['ZN07'] += $ecf->ZN07;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN07'] = $ecf->ZN07;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN07'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN07'] += $ecf->ZN07;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN07'] = $ecf->ZN07;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN07'])){
					$forecast['NS']['Total']['T0']['ZN07'] += $ecf->ZN07;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN07'] = $ecf->ZN07;
				}
				//Forcast ZN09
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN09'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN09'] += $ecf->ZN09;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN09'] = $ecf->ZN09;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN09'])){
					$forecast[$ecf->status]['Total']['T0']['ZN09'] += $ecf->ZN09;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN09'] = $ecf->ZN09;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN09'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN09'] += $ecf->ZN09;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN09'] = $ecf->ZN09;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN09'])){
					$forecast['NS']['Total']['T0']['ZN09'] += $ecf->ZN09;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN09'] = $ecf->ZN09;
				}
				//Forcast ZN11
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN11'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN11'] += $ecf->ZN11;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN11'] = $ecf->ZN11;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN11'])){
					$forecast[$ecf->status]['Total']['T0']['ZN11'] += $ecf->ZN11;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN11'] = $ecf->ZN11;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN11'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN11'] += $ecf->ZN11;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN11'] = $ecf->ZN11;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN11'])){
					$forecast['NS']['Total']['T0']['ZN11'] += $ecf->ZN11;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN11'] = $ecf->ZN11;
				}
				//Forcast ZN12
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN12'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN12'] += $ecf->ZN12;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN12'] = $ecf->ZN12;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN12'])){
					$forecast[$ecf->status]['Total']['T0']['ZN12'] += $ecf->ZN12;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN12'] = $ecf->ZN12;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN12'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN12'] += $ecf->ZN12;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN12'] = $ecf->ZN12;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN12'])){
					$forecast['NS']['Total']['T0']['ZN12'] += $ecf->ZN12;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN12'] = $ecf->ZN12;
				}
				//Forcast ZN13
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN13'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN13'] += $ecf->ZN13;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN13'] = $ecf->ZN13;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN13'])){
					$forecast[$ecf->status]['Total']['T0']['ZN13'] += $ecf->ZN13;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN13'] = $ecf->ZN13;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN13'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN13'] += $ecf->ZN13;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN13'] = $ecf->ZN13;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN13'])){
					$forecast['NS']['Total']['T0']['ZN13'] += $ecf->ZN13;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN13'] = $ecf->ZN13;
				}
				//Forcast ZN14
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN14'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN14'] += $ecf->ZN14;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN14'] = $ecf->ZN14;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN14'])){
					$forecast[$ecf->status]['Total']['T0']['ZN14'] += $ecf->ZN14;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN14'] = $ecf->ZN14;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN14'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN14'] += $ecf->ZN14;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN14'] = $ecf->ZN14;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN14'])){
					$forecast['NS']['Total']['T0']['ZN14'] += $ecf->ZN14;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN14'] = $ecf->ZN14;
				}
				//Forcast ZN15
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN15'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN15'] += $ecf->ZN15;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN15'] = $ecf->ZN15;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN15'])){
					$forecast[$ecf->status]['Total']['T0']['ZN15'] += $ecf->ZN15;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN15'] = $ecf->ZN15;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN15'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN15'] += $ecf->ZN15;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN15'] = $ecf->ZN15;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN15'])){
					$forecast['NS']['Total']['T0']['ZN15'] += $ecf->ZN15;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN15'] = $ecf->ZN15;
				}

				//Actual ZN01
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN01'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN01'] += $ecf->ZN01;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN01'] = $ecf->ZN01;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN01'])){
					$actual[$ecf->status]['Total']['T0']['ZN01'] += $ecf->ZN01;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN01'] = $ecf->ZN01;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN01'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN01'] += $ecf->ZN01;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN01'] = $ecf->ZN01;
				}
				if(isset($actual['NS']['Total']['T0']['ZN01'])){
					$actual['NS']['Total']['T0']['ZN01'] += $ecf->ZN01;
				}
				else{
					$actual['NS']['Total']['T0']['ZN01'] = $ecf->ZN01;
				}
				//Actual ZN02
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN02'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN02'] += $ecf->ZN02;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN02'] = $ecf->ZN02;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN02'])){
					$actual[$ecf->status]['Total']['T0']['ZN02'] += $ecf->ZN02;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN02'] = $ecf->ZN02;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN02'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN02'] += $ecf->ZN02;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN02'] = $ecf->ZN02;
				}
				if(isset($actual['NS']['Total']['T0']['ZN02'])){
					$actual['NS']['Total']['T0']['ZN02'] += $ecf->ZN02;
				}
				else{
					$actual['NS']['Total']['T0']['ZN02'] = $ecf->ZN02;
				}
				//Actual ZN03
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN03'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN03'] += $ecf->ZN03;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN03'] = $ecf->ZN03;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN03'])){
					$actual[$ecf->status]['Total']['T0']['ZN03'] += $ecf->ZN03;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN03'] = $ecf->ZN03;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN03'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN03'] += $ecf->ZN03;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN03'] = $ecf->ZN03;
				}
				if(isset($actual['NS']['Total']['T0']['ZN03'])){
					$actual['NS']['Total']['T0']['ZN03'] += $ecf->ZN03;
				}
				else{
					$actual['NS']['Total']['T0']['ZN03'] = $ecf->ZN03;
				}
				//Actual ZN04
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN04'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN04'] += $ecf->ZN04;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN04'] = $ecf->ZN04;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN04'])){
					$actual[$ecf->status]['Total']['T0']['ZN04'] += $ecf->ZN04;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN04'] = $ecf->ZN04;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN04'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN04'] += $ecf->ZN04;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN04'] = $ecf->ZN04;
				}
				if(isset($actual['NS']['Total']['T0']['ZN04'])){
					$actual['NS']['Total']['T0']['ZN04'] += $ecf->ZN04;
				}
				else{
					$actual['NS']['Total']['T0']['ZN04'] = $ecf->ZN04;
				}
				//Actual ZN05
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN05'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN05'] += $ecf->ZN05;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN05'] = $ecf->ZN05;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN05'])){
					$actual[$ecf->status]['Total']['T0']['ZN05'] += $ecf->ZN05;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN05'] = $ecf->ZN05;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN05'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN05'] += $ecf->ZN05;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN05'] = $ecf->ZN05;
				}
				if(isset($actual['NS']['Total']['T0']['ZN05'])){
					$actual['NS']['Total']['T0']['ZN05'] += $ecf->ZN05;
				}
				else{
					$actual['NS']['Total']['T0']['ZN05'] = $ecf->ZN05;
				}
				//Actual ZN06
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN06'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN06'] += $ecf->ZN06;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN06'] = $ecf->ZN06;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN06'])){
					$actual[$ecf->status]['Total']['T0']['ZN06'] += $ecf->ZN06;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN06'] = $ecf->ZN06;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN06'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN06'] += $ecf->ZN06;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN06'] = $ecf->ZN06;
				}
				if(isset($actual['NS']['Total']['T0']['ZN06'])){
					$actual['NS']['Total']['T0']['ZN06'] += $ecf->ZN06;
				}
				else{
					$actual['NS']['Total']['T0']['ZN06'] = $ecf->ZN06;
				}
				//Actual ZN07
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN07'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN07'] += $ecf->ZN07;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN07'] = $ecf->ZN07;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN07'])){
					$actual[$ecf->status]['Total']['T0']['ZN07'] += $ecf->ZN07;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN07'] = $ecf->ZN07;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN07'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN07'] += $ecf->ZN07;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN07'] = $ecf->ZN07;
				}
				if(isset($actual['NS']['Total']['T0']['ZN07'])){
					$actual['NS']['Total']['T0']['ZN07'] += $ecf->ZN07;
				}
				else{
					$actual['NS']['Total']['T0']['ZN07'] = $ecf->ZN07;
				}
				//Actual ZN09
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN09'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN09'] += $ecf->ZN09;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN09'] = $ecf->ZN09;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN09'])){
					$actual[$ecf->status]['Total']['T0']['ZN09'] += $ecf->ZN09;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN09'] = $ecf->ZN09;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN09'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN09'] += $ecf->ZN09;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN09'] = $ecf->ZN09;
				}
				if(isset($actual['NS']['Total']['T0']['ZN09'])){
					$actual['NS']['Total']['T0']['ZN09'] += $ecf->ZN09;
				}
				else{
					$actual['NS']['Total']['T0']['ZN09'] = $ecf->ZN09;
				}
				//Actual ZN11
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN11'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN11'] += $ecf->ZN11;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN11'] = $ecf->ZN11;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN11'])){
					$actual[$ecf->status]['Total']['T0']['ZN11'] += $ecf->ZN11;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN11'] = $ecf->ZN11;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN11'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN11'] += $ecf->ZN11;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN11'] = $ecf->ZN11;
				}
				if(isset($actual['NS']['Total']['T0']['ZN11'])){
					$actual['NS']['Total']['T0']['ZN11'] += $ecf->ZN11;
				}
				else{
					$actual['NS']['Total']['T0']['ZN11'] = $ecf->ZN11;
				}
				//Actual ZN12
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN12'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN12'] += $ecf->ZN12;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN12'] = $ecf->ZN12;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN12'])){
					$actual[$ecf->status]['Total']['T0']['ZN12'] += $ecf->ZN12;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN12'] = $ecf->ZN12;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN12'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN12'] += $ecf->ZN12;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN12'] = $ecf->ZN12;
				}
				if(isset($actual['NS']['Total']['T0']['ZN12'])){
					$actual['NS']['Total']['T0']['ZN12'] += $ecf->ZN12;
				}
				else{
					$actual['NS']['Total']['T0']['ZN12'] = $ecf->ZN12;
				}
				//Actual ZN13
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN13'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN13'] += $ecf->ZN13;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN13'] = $ecf->ZN13;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN13'])){
					$actual[$ecf->status]['Total']['T0']['ZN13'] += $ecf->ZN13;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN13'] = $ecf->ZN13;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN13'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN13'] += $ecf->ZN13;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN13'] = $ecf->ZN13;
				}
				if(isset($actual['NS']['Total']['T0']['ZN13'])){
					$actual['NS']['Total']['T0']['ZN13'] += $ecf->ZN13;
				}
				else{
					$actual['NS']['Total']['T0']['ZN13'] = $ecf->ZN13;
				}
				//Actual ZN14
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN14'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN14'] += $ecf->ZN14;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN14'] = $ecf->ZN14;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN14'])){
					$actual[$ecf->status]['Total']['T0']['ZN14'] += $ecf->ZN14;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN14'] = $ecf->ZN14;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN14'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN14'] += $ecf->ZN14;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN14'] = $ecf->ZN14;
				}
				if(isset($actual['NS']['Total']['T0']['ZN14'])){
					$actual['NS']['Total']['T0']['ZN14'] += $ecf->ZN14;
				}
				else{
					$actual['NS']['Total']['T0']['ZN14'] = $ecf->ZN14;
				}
				//Actual ZN15
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN15'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN15'] += $ecf->ZN15;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN15'] = $ecf->ZN15;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN15'])){
					$actual[$ecf->status]['Total']['T0']['ZN15'] += $ecf->ZN15;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN15'] = $ecf->ZN15;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN15'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN15'] += $ecf->ZN15;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN15'] = $ecf->ZN15;
				}
				if(isset($actual['NS']['Total']['T0']['ZN15'])){
					$actual['NS']['Total']['T0']['ZN15'] += $ecf->ZN15;
				}
				else{
					$actual['NS']['Total']['T0']['ZN15'] = $ecf->ZN15;
				}
			}
			foreach ($element_cost_f[$wilayah.'2'] as $ecf) {
				//Forcast ZN01
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN01'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN01'] += $ecf->ZN01;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN01'] = $ecf->ZN01;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN01'])){
					$forecast[$ecf->status]['Total']['T0']['ZN01'] += $ecf->ZN01;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN01'] = $ecf->ZN01;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN01'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN01'] += $ecf->ZN01;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN01'] = $ecf->ZN01;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN01'])){
					$forecast['NS']['Total']['T0']['ZN01'] += $ecf->ZN01;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN01'] = $ecf->ZN01;
				}
				//Forcast ZN02
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN02'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN02'] += $ecf->ZN02;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN02'] = $ecf->ZN02;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN02'])){
					$forecast[$ecf->status]['Total']['T0']['ZN02'] += $ecf->ZN02;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN02'] = $ecf->ZN02;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN02'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN02'] += $ecf->ZN02;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN02'] = $ecf->ZN02;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN02'])){
					$forecast['NS']['Total']['T0']['ZN02'] += $ecf->ZN02;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN02'] = $ecf->ZN02;
				}
				//Forcast ZN03
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN03'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN03'] += $ecf->ZN03;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN03'] = $ecf->ZN03;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN03'])){
					$forecast[$ecf->status]['Total']['T0']['ZN03'] += $ecf->ZN03;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN03'] = $ecf->ZN03;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN03'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN03'] += $ecf->ZN03;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN03'] = $ecf->ZN03;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN03'])){
					$forecast['NS']['Total']['T0']['ZN03'] += $ecf->ZN03;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN03'] = $ecf->ZN03;
				}
				//Forcast ZN04
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN04'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN04'] += $ecf->ZN04;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN04'] = $ecf->ZN04;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN04'])){
					$forecast[$ecf->status]['Total']['T0']['ZN04'] += $ecf->ZN04;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN04'] = $ecf->ZN04;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN04'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN04'] += $ecf->ZN04;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN04'] = $ecf->ZN04;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN04'])){
					$forecast['NS']['Total']['T0']['ZN04'] += $ecf->ZN04;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN04'] = $ecf->ZN04;
				}
				//Forcast ZN05
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN05'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN05'] += $ecf->ZN05;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN05'] = $ecf->ZN05;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN05'])){
					$forecast[$ecf->status]['Total']['T0']['ZN05'] += $ecf->ZN05;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN05'] = $ecf->ZN05;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN05'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN05'] += $ecf->ZN05;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN05'] = $ecf->ZN05;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN05'])){
					$forecast['NS']['Total']['T0']['ZN05'] += $ecf->ZN05;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN05'] = $ecf->ZN05;
				}
				//Forcast ZN06
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN06'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN06'] += $ecf->ZN06;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN06'] = $ecf->ZN06;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN06'])){
					$forecast[$ecf->status]['Total']['T0']['ZN06'] += $ecf->ZN06;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN06'] = $ecf->ZN06;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN06'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN06'] += $ecf->ZN06;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN06'] = $ecf->ZN06;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN06'])){
					$forecast['NS']['Total']['T0']['ZN06'] += $ecf->ZN06;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN06'] = $ecf->ZN06;
				}
				//Forcast ZN07
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN07'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN07'] += $ecf->ZN07;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN07'] = $ecf->ZN07;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN07'])){
					$forecast[$ecf->status]['Total']['T0']['ZN07'] += $ecf->ZN07;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN07'] = $ecf->ZN07;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN07'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN07'] += $ecf->ZN07;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN07'] = $ecf->ZN07;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN07'])){
					$forecast['NS']['Total']['T0']['ZN07'] += $ecf->ZN07;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN07'] = $ecf->ZN07;
				}
				//Forcast ZN09
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN09'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN09'] += $ecf->ZN09;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN09'] = $ecf->ZN09;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN09'])){
					$forecast[$ecf->status]['Total']['T0']['ZN09'] += $ecf->ZN09;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN09'] = $ecf->ZN09;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN09'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN09'] += $ecf->ZN09;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN09'] = $ecf->ZN09;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN09'])){
					$forecast['NS']['Total']['T0']['ZN09'] += $ecf->ZN09;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN09'] = $ecf->ZN09;
				}
				//Forcast ZN11
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN11'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN11'] += $ecf->ZN11;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN11'] = $ecf->ZN11;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN11'])){
					$forecast[$ecf->status]['Total']['T0']['ZN11'] += $ecf->ZN11;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN11'] = $ecf->ZN11;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN11'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN11'] += $ecf->ZN11;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN11'] = $ecf->ZN11;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN11'])){
					$forecast['NS']['Total']['T0']['ZN11'] += $ecf->ZN11;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN11'] = $ecf->ZN11;
				}
				//Forcast ZN12
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN12'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN12'] += $ecf->ZN12;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN12'] = $ecf->ZN12;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN12'])){
					$forecast[$ecf->status]['Total']['T0']['ZN12'] += $ecf->ZN12;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN12'] = $ecf->ZN12;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN12'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN12'] += $ecf->ZN12;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN12'] = $ecf->ZN12;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN12'])){
					$forecast['NS']['Total']['T0']['ZN12'] += $ecf->ZN12;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN12'] = $ecf->ZN12;
				}
				//Forcast ZN13
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN13'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN13'] += $ecf->ZN13;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN13'] = $ecf->ZN13;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN13'])){
					$forecast[$ecf->status]['Total']['T0']['ZN13'] += $ecf->ZN13;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN13'] = $ecf->ZN13;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN13'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN13'] += $ecf->ZN13;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN13'] = $ecf->ZN13;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN13'])){
					$forecast['NS']['Total']['T0']['ZN13'] += $ecf->ZN13;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN13'] = $ecf->ZN13;
				}
				//Forcast ZN14
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN14'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN14'] += $ecf->ZN14;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN14'] = $ecf->ZN14;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN14'])){
					$forecast[$ecf->status]['Total']['T0']['ZN14'] += $ecf->ZN14;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN14'] = $ecf->ZN14;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN14'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN14'] += $ecf->ZN14;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN14'] = $ecf->ZN14;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN14'])){
					$forecast['NS']['Total']['T0']['ZN14'] += $ecf->ZN14;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN14'] = $ecf->ZN14;
				}
				//Forcast ZN15
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN15'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN15'] += $ecf->ZN15;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN15'] = $ecf->ZN15;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN15'])){
					$forecast[$ecf->status]['Total']['T0']['ZN15'] += $ecf->ZN15;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN15'] = $ecf->ZN15;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN15'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN15'] += $ecf->ZN15;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN15'] = $ecf->ZN15;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN15'])){
					$forecast['NS']['Total']['T0']['ZN15'] += $ecf->ZN15;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN15'] = $ecf->ZN15;
				}

				//Actual ZN01
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN01'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN01'] += $ecf->ZN01;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN01'] = $ecf->ZN01;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN01'])){
					$actual[$ecf->status]['Total']['T0']['ZN01'] += $ecf->ZN01;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN01'] = $ecf->ZN01;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN01'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN01'] += $ecf->ZN01;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN01'] = $ecf->ZN01;
				}
				if(isset($actual['NS']['Total']['T0']['ZN01'])){
					$actual['NS']['Total']['T0']['ZN01'] += $ecf->ZN01;
				}
				else{
					$actual['NS']['Total']['T0']['ZN01'] = $ecf->ZN01;
				}
				//Actual ZN02
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN02'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN02'] += $ecf->ZN02;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN02'] = $ecf->ZN02;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN02'])){
					$actual[$ecf->status]['Total']['T0']['ZN02'] += $ecf->ZN02;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN02'] = $ecf->ZN02;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN02'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN02'] += $ecf->ZN02;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN02'] = $ecf->ZN02;
				}
				if(isset($actual['NS']['Total']['T0']['ZN02'])){
					$actual['NS']['Total']['T0']['ZN02'] += $ecf->ZN02;
				}
				else{
					$actual['NS']['Total']['T0']['ZN02'] = $ecf->ZN02;
				}
				//Actual ZN03
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN03'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN03'] += $ecf->ZN03;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN03'] = $ecf->ZN03;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN03'])){
					$actual[$ecf->status]['Total']['T0']['ZN03'] += $ecf->ZN03;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN03'] = $ecf->ZN03;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN03'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN03'] += $ecf->ZN03;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN03'] = $ecf->ZN03;
				}
				if(isset($actual['NS']['Total']['T0']['ZN03'])){
					$actual['NS']['Total']['T0']['ZN03'] += $ecf->ZN03;
				}
				else{
					$actual['NS']['Total']['T0']['ZN03'] = $ecf->ZN03;
				}
				//Actual ZN04
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN04'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN04'] += $ecf->ZN04;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN04'] = $ecf->ZN04;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN04'])){
					$actual[$ecf->status]['Total']['T0']['ZN04'] += $ecf->ZN04;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN04'] = $ecf->ZN04;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN04'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN04'] += $ecf->ZN04;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN04'] = $ecf->ZN04;
				}
				if(isset($actual['NS']['Total']['T0']['ZN04'])){
					$actual['NS']['Total']['T0']['ZN04'] += $ecf->ZN04;
				}
				else{
					$actual['NS']['Total']['T0']['ZN04'] = $ecf->ZN04;
				}
				//Actual ZN05
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN05'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN05'] += $ecf->ZN05;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN05'] = $ecf->ZN05;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN05'])){
					$actual[$ecf->status]['Total']['T0']['ZN05'] += $ecf->ZN05;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN05'] = $ecf->ZN05;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN05'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN05'] += $ecf->ZN05;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN05'] = $ecf->ZN05;
				}
				if(isset($actual['NS']['Total']['T0']['ZN05'])){
					$actual['NS']['Total']['T0']['ZN05'] += $ecf->ZN05;
				}
				else{
					$actual['NS']['Total']['T0']['ZN05'] = $ecf->ZN05;
				}
				//Actual ZN06
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN06'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN06'] += $ecf->ZN06;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN06'] = $ecf->ZN06;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN06'])){
					$actual[$ecf->status]['Total']['T0']['ZN06'] += $ecf->ZN06;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN06'] = $ecf->ZN06;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN06'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN06'] += $ecf->ZN06;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN06'] = $ecf->ZN06;
				}
				if(isset($actual['NS']['Total']['T0']['ZN06'])){
					$actual['NS']['Total']['T0']['ZN06'] += $ecf->ZN06;
				}
				else{
					$actual['NS']['Total']['T0']['ZN06'] = $ecf->ZN06;
				}
				//Actual ZN07
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN07'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN07'] += $ecf->ZN07;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN07'] = $ecf->ZN07;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN07'])){
					$actual[$ecf->status]['Total']['T0']['ZN07'] += $ecf->ZN07;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN07'] = $ecf->ZN07;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN07'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN07'] += $ecf->ZN07;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN07'] = $ecf->ZN07;
				}
				if(isset($actual['NS']['Total']['T0']['ZN07'])){
					$actual['NS']['Total']['T0']['ZN07'] += $ecf->ZN07;
				}
				else{
					$actual['NS']['Total']['T0']['ZN07'] = $ecf->ZN07;
				}
				//Actual ZN09
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN09'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN09'] += $ecf->ZN09;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN09'] = $ecf->ZN09;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN09'])){
					$actual[$ecf->status]['Total']['T0']['ZN09'] += $ecf->ZN09;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN09'] = $ecf->ZN09;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN09'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN09'] += $ecf->ZN09;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN09'] = $ecf->ZN09;
				}
				if(isset($actual['NS']['Total']['T0']['ZN09'])){
					$actual['NS']['Total']['T0']['ZN09'] += $ecf->ZN09;
				}
				else{
					$actual['NS']['Total']['T0']['ZN09'] = $ecf->ZN09;
				}
				//Actual ZN11
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN11'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN11'] += $ecf->ZN11;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN11'] = $ecf->ZN11;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN11'])){
					$actual[$ecf->status]['Total']['T0']['ZN11'] += $ecf->ZN11;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN11'] = $ecf->ZN11;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN11'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN11'] += $ecf->ZN11;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN11'] = $ecf->ZN11;
				}
				if(isset($actual['NS']['Total']['T0']['ZN11'])){
					$actual['NS']['Total']['T0']['ZN11'] += $ecf->ZN11;
				}
				else{
					$actual['NS']['Total']['T0']['ZN11'] = $ecf->ZN11;
				}
				//Actual ZN12
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN12'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN12'] += $ecf->ZN12;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN12'] = $ecf->ZN12;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN12'])){
					$actual[$ecf->status]['Total']['T0']['ZN12'] += $ecf->ZN12;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN12'] = $ecf->ZN12;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN12'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN12'] += $ecf->ZN12;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN12'] = $ecf->ZN12;
				}
				if(isset($actual['NS']['Total']['T0']['ZN12'])){
					$actual['NS']['Total']['T0']['ZN12'] += $ecf->ZN12;
				}
				else{
					$actual['NS']['Total']['T0']['ZN12'] = $ecf->ZN12;
				}
				//Actual ZN13
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN13'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN13'] += $ecf->ZN13;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN13'] = $ecf->ZN13;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN13'])){
					$actual[$ecf->status]['Total']['T0']['ZN13'] += $ecf->ZN13;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN13'] = $ecf->ZN13;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN13'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN13'] += $ecf->ZN13;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN13'] = $ecf->ZN13;
				}
				if(isset($actual['NS']['Total']['T0']['ZN13'])){
					$actual['NS']['Total']['T0']['ZN13'] += $ecf->ZN13;
				}
				else{
					$actual['NS']['Total']['T0']['ZN13'] = $ecf->ZN13;
				}
				//Actual ZN14
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN14'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN14'] += $ecf->ZN14;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN14'] = $ecf->ZN14;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN14'])){
					$actual[$ecf->status]['Total']['T0']['ZN14'] += $ecf->ZN14;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN14'] = $ecf->ZN14;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN14'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN14'] += $ecf->ZN14;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN14'] = $ecf->ZN14;
				}
				if(isset($actual['NS']['Total']['T0']['ZN14'])){
					$actual['NS']['Total']['T0']['ZN14'] += $ecf->ZN14;
				}
				else{
					$actual['NS']['Total']['T0']['ZN14'] = $ecf->ZN14;
				}
				//Actual ZN15
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN15'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN15'] += $ecf->ZN15;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN15'] = $ecf->ZN15;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN15'])){
					$actual[$ecf->status]['Total']['T0']['ZN15'] += $ecf->ZN15;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN15'] = $ecf->ZN15;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN15'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN15'] += $ecf->ZN15;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN15'] = $ecf->ZN15;
				}
				if(isset($actual['NS']['Total']['T0']['ZN15'])){
					$actual['NS']['Total']['T0']['ZN15'] += $ecf->ZN15;
				}
				else{
					$actual['NS']['Total']['T0']['ZN15'] = $ecf->ZN15;
				}
			}
			foreach ($element_cost_f[$wilayah.'3'] as $ecf) {
				//Forcast ZN01
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN01'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN01'] += $ecf->ZN01;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN01'] = $ecf->ZN01;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN01'])){
					$forecast[$ecf->status]['Total']['T0']['ZN01'] += $ecf->ZN01;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN01'] = $ecf->ZN01;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN01'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN01'] += $ecf->ZN01;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN01'] = $ecf->ZN01;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN01'])){
					$forecast['NS']['Total']['T0']['ZN01'] += $ecf->ZN01;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN01'] = $ecf->ZN01;
				}
				//Forcast ZN02
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN02'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN02'] += $ecf->ZN02;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN02'] = $ecf->ZN02;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN02'])){
					$forecast[$ecf->status]['Total']['T0']['ZN02'] += $ecf->ZN02;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN02'] = $ecf->ZN02;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN02'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN02'] += $ecf->ZN02;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN02'] = $ecf->ZN02;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN02'])){
					$forecast['NS']['Total']['T0']['ZN02'] += $ecf->ZN02;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN02'] = $ecf->ZN02;
				}
				//Forcast ZN03
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN03'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN03'] += $ecf->ZN03;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN03'] = $ecf->ZN03;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN03'])){
					$forecast[$ecf->status]['Total']['T0']['ZN03'] += $ecf->ZN03;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN03'] = $ecf->ZN03;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN03'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN03'] += $ecf->ZN03;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN03'] = $ecf->ZN03;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN03'])){
					$forecast['NS']['Total']['T0']['ZN03'] += $ecf->ZN03;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN03'] = $ecf->ZN03;
				}
				//Forcast ZN04
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN04'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN04'] += $ecf->ZN04;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN04'] = $ecf->ZN04;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN04'])){
					$forecast[$ecf->status]['Total']['T0']['ZN04'] += $ecf->ZN04;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN04'] = $ecf->ZN04;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN04'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN04'] += $ecf->ZN04;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN04'] = $ecf->ZN04;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN04'])){
					$forecast['NS']['Total']['T0']['ZN04'] += $ecf->ZN04;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN04'] = $ecf->ZN04;
				}
				//Forcast ZN05
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN05'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN05'] += $ecf->ZN05;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN05'] = $ecf->ZN05;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN05'])){
					$forecast[$ecf->status]['Total']['T0']['ZN05'] += $ecf->ZN05;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN05'] = $ecf->ZN05;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN05'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN05'] += $ecf->ZN05;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN05'] = $ecf->ZN05;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN05'])){
					$forecast['NS']['Total']['T0']['ZN05'] += $ecf->ZN05;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN05'] = $ecf->ZN05;
				}
				//Forcast ZN06
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN06'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN06'] += $ecf->ZN06;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN06'] = $ecf->ZN06;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN06'])){
					$forecast[$ecf->status]['Total']['T0']['ZN06'] += $ecf->ZN06;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN06'] = $ecf->ZN06;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN06'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN06'] += $ecf->ZN06;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN06'] = $ecf->ZN06;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN06'])){
					$forecast['NS']['Total']['T0']['ZN06'] += $ecf->ZN06;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN06'] = $ecf->ZN06;
				}
				//Forcast ZN07
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN07'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN07'] += $ecf->ZN07;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN07'] = $ecf->ZN07;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN07'])){
					$forecast[$ecf->status]['Total']['T0']['ZN07'] += $ecf->ZN07;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN07'] = $ecf->ZN07;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN07'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN07'] += $ecf->ZN07;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN07'] = $ecf->ZN07;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN07'])){
					$forecast['NS']['Total']['T0']['ZN07'] += $ecf->ZN07;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN07'] = $ecf->ZN07;
				}
				//Forcast ZN09
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN09'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN09'] += $ecf->ZN09;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN09'] = $ecf->ZN09;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN09'])){
					$forecast[$ecf->status]['Total']['T0']['ZN09'] += $ecf->ZN09;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN09'] = $ecf->ZN09;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN09'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN09'] += $ecf->ZN09;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN09'] = $ecf->ZN09;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN09'])){
					$forecast['NS']['Total']['T0']['ZN09'] += $ecf->ZN09;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN09'] = $ecf->ZN09;
				}
				//Forcast ZN11
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN11'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN11'] += $ecf->ZN11;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN11'] = $ecf->ZN11;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN11'])){
					$forecast[$ecf->status]['Total']['T0']['ZN11'] += $ecf->ZN11;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN11'] = $ecf->ZN11;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN11'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN11'] += $ecf->ZN11;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN11'] = $ecf->ZN11;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN11'])){
					$forecast['NS']['Total']['T0']['ZN11'] += $ecf->ZN11;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN11'] = $ecf->ZN11;
				}
				//Forcast ZN12
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN12'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN12'] += $ecf->ZN12;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN12'] = $ecf->ZN12;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN12'])){
					$forecast[$ecf->status]['Total']['T0']['ZN12'] += $ecf->ZN12;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN12'] = $ecf->ZN12;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN12'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN12'] += $ecf->ZN12;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN12'] = $ecf->ZN12;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN12'])){
					$forecast['NS']['Total']['T0']['ZN12'] += $ecf->ZN12;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN12'] = $ecf->ZN12;
				}
				//Forcast ZN13
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN13'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN13'] += $ecf->ZN13;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN13'] = $ecf->ZN13;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN13'])){
					$forecast[$ecf->status]['Total']['T0']['ZN13'] += $ecf->ZN13;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN13'] = $ecf->ZN13;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN13'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN13'] += $ecf->ZN13;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN13'] = $ecf->ZN13;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN13'])){
					$forecast['NS']['Total']['T0']['ZN13'] += $ecf->ZN13;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN13'] = $ecf->ZN13;
				}
				//Forcast ZN14
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN14'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN14'] += $ecf->ZN14;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN14'] = $ecf->ZN14;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN14'])){
					$forecast[$ecf->status]['Total']['T0']['ZN14'] += $ecf->ZN14;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN14'] = $ecf->ZN14;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN14'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN14'] += $ecf->ZN14;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN14'] = $ecf->ZN14;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN14'])){
					$forecast['NS']['Total']['T0']['ZN14'] += $ecf->ZN14;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN14'] = $ecf->ZN14;
				}
				//Forcast ZN15
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN15'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN15'] += $ecf->ZN15;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN15'] = $ecf->ZN15;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN15'])){
					$forecast[$ecf->status]['Total']['T0']['ZN15'] += $ecf->ZN15;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN15'] = $ecf->ZN15;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN15'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN15'] += $ecf->ZN15;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN15'] = $ecf->ZN15;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN15'])){
					$forecast['NS']['Total']['T0']['ZN15'] += $ecf->ZN15;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN15'] = $ecf->ZN15;
				}

				//Actual ZN01
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN01'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN01'] += $ecf->ZN01;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN01'] = $ecf->ZN01;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN01'])){
					$actual[$ecf->status]['Total']['T0']['ZN01'] += $ecf->ZN01;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN01'] = $ecf->ZN01;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN01'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN01'] += $ecf->ZN01;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN01'] = $ecf->ZN01;
				}
				if(isset($actual['NS']['Total']['T0']['ZN01'])){
					$actual['NS']['Total']['T0']['ZN01'] += $ecf->ZN01;
				}
				else{
					$actual['NS']['Total']['T0']['ZN01'] = $ecf->ZN01;
				}
				//Actual ZN02
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN02'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN02'] += $ecf->ZN02;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN02'] = $ecf->ZN02;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN02'])){
					$actual[$ecf->status]['Total']['T0']['ZN02'] += $ecf->ZN02;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN02'] = $ecf->ZN02;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN02'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN02'] += $ecf->ZN02;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN02'] = $ecf->ZN02;
				}
				if(isset($actual['NS']['Total']['T0']['ZN02'])){
					$actual['NS']['Total']['T0']['ZN02'] += $ecf->ZN02;
				}
				else{
					$actual['NS']['Total']['T0']['ZN02'] = $ecf->ZN02;
				}
				//Actual ZN03
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN03'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN03'] += $ecf->ZN03;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN03'] = $ecf->ZN03;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN03'])){
					$actual[$ecf->status]['Total']['T0']['ZN03'] += $ecf->ZN03;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN03'] = $ecf->ZN03;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN03'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN03'] += $ecf->ZN03;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN03'] = $ecf->ZN03;
				}
				if(isset($actual['NS']['Total']['T0']['ZN03'])){
					$actual['NS']['Total']['T0']['ZN03'] += $ecf->ZN03;
				}
				else{
					$actual['NS']['Total']['T0']['ZN03'] = $ecf->ZN03;
				}
				//Actual ZN04
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN04'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN04'] += $ecf->ZN04;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN04'] = $ecf->ZN04;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN04'])){
					$actual[$ecf->status]['Total']['T0']['ZN04'] += $ecf->ZN04;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN04'] = $ecf->ZN04;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN04'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN04'] += $ecf->ZN04;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN04'] = $ecf->ZN04;
				}
				if(isset($actual['NS']['Total']['T0']['ZN04'])){
					$actual['NS']['Total']['T0']['ZN04'] += $ecf->ZN04;
				}
				else{
					$actual['NS']['Total']['T0']['ZN04'] = $ecf->ZN04;
				}
				//Actual ZN05
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN05'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN05'] += $ecf->ZN05;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN05'] = $ecf->ZN05;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN05'])){
					$actual[$ecf->status]['Total']['T0']['ZN05'] += $ecf->ZN05;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN05'] = $ecf->ZN05;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN05'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN05'] += $ecf->ZN05;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN05'] = $ecf->ZN05;
				}
				if(isset($actual['NS']['Total']['T0']['ZN05'])){
					$actual['NS']['Total']['T0']['ZN05'] += $ecf->ZN05;
				}
				else{
					$actual['NS']['Total']['T0']['ZN05'] = $ecf->ZN05;
				}
				//Actual ZN06
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN06'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN06'] += $ecf->ZN06;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN06'] = $ecf->ZN06;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN06'])){
					$actual[$ecf->status]['Total']['T0']['ZN06'] += $ecf->ZN06;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN06'] = $ecf->ZN06;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN06'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN06'] += $ecf->ZN06;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN06'] = $ecf->ZN06;
				}
				if(isset($actual['NS']['Total']['T0']['ZN06'])){
					$actual['NS']['Total']['T0']['ZN06'] += $ecf->ZN06;
				}
				else{
					$actual['NS']['Total']['T0']['ZN06'] = $ecf->ZN06;
				}
				//Actual ZN07
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN07'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN07'] += $ecf->ZN07;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN07'] = $ecf->ZN07;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN07'])){
					$actual[$ecf->status]['Total']['T0']['ZN07'] += $ecf->ZN07;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN07'] = $ecf->ZN07;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN07'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN07'] += $ecf->ZN07;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN07'] = $ecf->ZN07;
				}
				if(isset($actual['NS']['Total']['T0']['ZN07'])){
					$actual['NS']['Total']['T0']['ZN07'] += $ecf->ZN07;
				}
				else{
					$actual['NS']['Total']['T0']['ZN07'] = $ecf->ZN07;
				}
				//Actual ZN09
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN09'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN09'] += $ecf->ZN09;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN09'] = $ecf->ZN09;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN09'])){
					$actual[$ecf->status]['Total']['T0']['ZN09'] += $ecf->ZN09;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN09'] = $ecf->ZN09;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN09'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN09'] += $ecf->ZN09;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN09'] = $ecf->ZN09;
				}
				if(isset($actual['NS']['Total']['T0']['ZN09'])){
					$actual['NS']['Total']['T0']['ZN09'] += $ecf->ZN09;
				}
				else{
					$actual['NS']['Total']['T0']['ZN09'] = $ecf->ZN09;
				}
				//Actual ZN11
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN11'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN11'] += $ecf->ZN11;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN11'] = $ecf->ZN11;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN11'])){
					$actual[$ecf->status]['Total']['T0']['ZN11'] += $ecf->ZN11;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN11'] = $ecf->ZN11;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN11'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN11'] += $ecf->ZN11;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN11'] = $ecf->ZN11;
				}
				if(isset($actual['NS']['Total']['T0']['ZN11'])){
					$actual['NS']['Total']['T0']['ZN11'] += $ecf->ZN11;
				}
				else{
					$actual['NS']['Total']['T0']['ZN11'] = $ecf->ZN11;
				}
				//Actual ZN12
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN12'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN12'] += $ecf->ZN12;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN12'] = $ecf->ZN12;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN12'])){
					$actual[$ecf->status]['Total']['T0']['ZN12'] += $ecf->ZN12;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN12'] = $ecf->ZN12;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN12'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN12'] += $ecf->ZN12;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN12'] = $ecf->ZN12;
				}
				if(isset($actual['NS']['Total']['T0']['ZN12'])){
					$actual['NS']['Total']['T0']['ZN12'] += $ecf->ZN12;
				}
				else{
					$actual['NS']['Total']['T0']['ZN12'] = $ecf->ZN12;
				}
				//Actual ZN13
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN13'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN13'] += $ecf->ZN13;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN13'] = $ecf->ZN13;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN13'])){
					$actual[$ecf->status]['Total']['T0']['ZN13'] += $ecf->ZN13;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN13'] = $ecf->ZN13;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN13'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN13'] += $ecf->ZN13;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN13'] = $ecf->ZN13;
				}
				if(isset($actual['NS']['Total']['T0']['ZN13'])){
					$actual['NS']['Total']['T0']['ZN13'] += $ecf->ZN13;
				}
				else{
					$actual['NS']['Total']['T0']['ZN13'] = $ecf->ZN13;
				}
				//Actual ZN14
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN14'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN14'] += $ecf->ZN14;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN14'] = $ecf->ZN14;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN14'])){
					$actual[$ecf->status]['Total']['T0']['ZN14'] += $ecf->ZN14;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN14'] = $ecf->ZN14;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN14'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN14'] += $ecf->ZN14;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN14'] = $ecf->ZN14;
				}
				if(isset($actual['NS']['Total']['T0']['ZN14'])){
					$actual['NS']['Total']['T0']['ZN14'] += $ecf->ZN14;
				}
				else{
					$actual['NS']['Total']['T0']['ZN14'] = $ecf->ZN14;
				}
				//Actual ZN15
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN15'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN15'] += $ecf->ZN15;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN15'] = $ecf->ZN15;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN15'])){
					$actual[$ecf->status]['Total']['T0']['ZN15'] += $ecf->ZN15;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN15'] = $ecf->ZN15;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN15'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN15'] += $ecf->ZN15;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN15'] = $ecf->ZN15;
				}
				if(isset($actual['NS']['Total']['T0']['ZN15'])){
					$actual['NS']['Total']['T0']['ZN15'] += $ecf->ZN15;
				}
				else{
					$actual['NS']['Total']['T0']['ZN15'] = $ecf->ZN15;
				}
			}

			//ZN10
			foreach ($element_cost_ZN10[$wilayah.'1'] as $ecf) {
				//Forcast
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN10'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN10'] += $ecf->ZN10;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN10'] = $ecf->ZN10;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN10'])){
					$forecast[$ecf->status]['Total']['T0']['ZN10'] += $ecf->ZN10;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN10'] = $ecf->ZN10;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN10'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN10'] += $ecf->ZN10;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN10'] = $ecf->ZN10;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN10'])){
					$forecast['NS']['Total']['T0']['ZN10'] += $ecf->ZN10;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN10'] = $ecf->ZN10;
				}

				//Actual
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN10'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN10'] += $ecf->ZN10_actual;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN10'] = $ecf->ZN10_actual;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN10'])){
					$actual[$ecf->status]['Total']['T0']['ZN10'] += $ecf->ZN10_actual;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN10'] = $ecf->ZN10_actual;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN10'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN10'] += $ecf->ZN10_actual;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN10'] = $ecf->ZN10_actual;
				}
				if(isset($actual['NS']['Total']['T0']['ZN10'])){
					$actual['NS']['Total']['T0']['ZN10'] += $ecf->ZN10_actual;
				}
				else{
					$actual['NS']['Total']['T0']['ZN10'] = $ecf->ZN10_actual;
				}
			}
			foreach ($element_cost_ZN10[$wilayah.'2'] as $ecf) {
				//Forcast
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN10'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN10'] += $ecf->ZN10;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN10'] = $ecf->ZN10;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN10'])){
					$forecast[$ecf->status]['Total']['T0']['ZN10'] += $ecf->ZN10;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN10'] = $ecf->ZN10;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN10'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN10'] += $ecf->ZN10;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN10'] = $ecf->ZN10;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN10'])){
					$forecast['NS']['Total']['T0']['ZN10'] += $ecf->ZN10;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN10'] = $ecf->ZN10;
				}

				//Actual
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN10'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN10'] += $ecf->ZN10_actual;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN10'] = $ecf->ZN10_actual;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN10'])){
					$actual[$ecf->status]['Total']['T0']['ZN10'] += $ecf->ZN10_actual;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN10'] = $ecf->ZN10_actual;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN10'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN10'] += $ecf->ZN10_actual;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN10'] = $ecf->ZN10_actual;
				}
				if(isset($actual['NS']['Total']['T0']['ZN10'])){
					$actual['NS']['Total']['T0']['ZN10'] += $ecf->ZN10_actual;
				}
				else{
					$actual['NS']['Total']['T0']['ZN10'] = $ecf->ZN10_actual;
				}
			}
			foreach ($element_cost_ZN10[$wilayah.'3'] as $ecf) {
				//Forcast
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN10'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN10'] += $ecf->ZN10;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN10'] = $ecf->ZN10;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN10'])){
					$forecast[$ecf->status]['Total']['T0']['ZN10'] += $ecf->ZN10;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN10'] = $ecf->ZN10;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN10'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN10'] += $ecf->ZN10;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN10'] = $ecf->ZN10;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN10'])){
					$forecast['NS']['Total']['T0']['ZN10'] += $ecf->ZN10;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN10'] = $ecf->ZN10;
				}

				//Actual
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN10'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN10'] += $ecf->ZN10_actual;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN10'] = $ecf->ZN10_actual;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN10'])){
					$actual[$ecf->status]['Total']['T0']['ZN10'] += $ecf->ZN10_actual;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN10'] = $ecf->ZN10_actual;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN10'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN10'] += $ecf->ZN10_actual;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN10'] = $ecf->ZN10_actual;
				}
				if(isset($actual['NS']['Total']['T0']['ZN10'])){
					$actual['NS']['Total']['T0']['ZN10'] += $ecf->ZN10_actual;
				}
				else{
					$actual['NS']['Total']['T0']['ZN10'] = $ecf->ZN10_actual;
				}
			}
			//ZN08
			foreach ($element_cost_ZN08[$wilayah.'1'] as $ecf) {
				//Forcast
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN08'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN08'] += $ecf->ZN08;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN08'] = $ecf->ZN08;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN08'])){
					$forecast[$ecf->status]['Total']['T0']['ZN08'] += $ecf->ZN08;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN08'] = $ecf->ZN08;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN08'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN08'] += $ecf->ZN08;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN08'] = $ecf->ZN08;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN08'])){
					$forecast['NS']['Total']['T0']['ZN08'] += $ecf->ZN08;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN08'] = $ecf->ZN08;
				}

				//Actual
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN08'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN08'] += $ecf->ZN08_actual;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN08'] = $ecf->ZN08_actual;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN08'])){
					$actual[$ecf->status]['Total']['T0']['ZN08'] += $ecf->ZN08_actual;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN08'] = $ecf->ZN08_actual;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN08'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN08'] += $ecf->ZN08_actual;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN08'] = $ecf->ZN08_actual;
				}
				if(isset($actual['NS']['Total']['T0']['ZN08'])){
					$actual['NS']['Total']['T0']['ZN08'] += $ecf->ZN08_actual;
				}
				else{
					$actual['NS']['Total']['T0']['ZN08'] = $ecf->ZN08_actual;
				}
			}
			foreach ($element_cost_ZN08[$wilayah.'2'] as $ecf) {
				//Forcast
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN08'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN08'] += $ecf->ZN08;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN08'] = $ecf->ZN08;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN08'])){
					$forecast[$ecf->status]['Total']['T0']['ZN08'] += $ecf->ZN08;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN08'] = $ecf->ZN08;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN08'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN08'] += $ecf->ZN08;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN08'] = $ecf->ZN08;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN08'])){
					$forecast['NS']['Total']['T0']['ZN08'] += $ecf->ZN08;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN08'] = $ecf->ZN08;
				}

				//Actual
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN08'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN08'] += $ecf->ZN08_actual;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN08'] = $ecf->ZN08_actual;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN08'])){
					$actual[$ecf->status]['Total']['T0']['ZN08'] += $ecf->ZN08_actual;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN08'] = $ecf->ZN08_actual;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN08'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN08'] += $ecf->ZN08_actual;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN08'] = $ecf->ZN08_actual;
				}
				if(isset($actual['NS']['Total']['T0']['ZN08'])){
					$actual['NS']['Total']['T0']['ZN08'] += $ecf->ZN08_actual;
				}
				else{
					$actual['NS']['Total']['T0']['ZN08'] = $ecf->ZN08_actual;
				}
			}
			foreach ($element_cost_ZN08[$wilayah.'3'] as $ecf) {
				//Forcast
				if(isset($forecast[$ecf->status][$ecf->bulan]['T0']['ZN08'])){
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN08'] += $ecf->ZN08;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T0']['ZN08'] = $ecf->ZN08;
				}
				if(isset($forecast[$ecf->status]['Total']['T0']['ZN08'])){
					$forecast[$ecf->status]['Total']['T0']['ZN08'] += $ecf->ZN08;
				}
				else{
					$forecast[$ecf->status]['Total']['T0']['ZN08'] = $ecf->ZN08;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T0']['ZN08'])){
					$forecast['NS'][$ecf->bulan]['T0']['ZN08'] += $ecf->ZN08;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T0']['ZN08'] = $ecf->ZN08;
				}
				if(isset($forecast['NS']['Total']['T0']['ZN08'])){
					$forecast['NS']['Total']['T0']['ZN08'] += $ecf->ZN08;
				}
				else{
					$forecast['NS']['Total']['T0']['ZN08'] = $ecf->ZN08;
				}

				//Actual
				if(isset($actual[$ecf->status][$ecf->bulan]['T0']['ZN08'])){
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN08'] += $ecf->ZN08_actual;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T0']['ZN08'] = $ecf->ZN08_actual;
				}
				if(isset($actual[$ecf->status]['Total']['T0']['ZN08'])){
					$actual[$ecf->status]['Total']['T0']['ZN08'] += $ecf->ZN08_actual;
				}
				else{
					$actual[$ecf->status]['Total']['T0']['ZN08'] = $ecf->ZN08_actual;
				}
				if(isset($actual['NS'][$ecf->bulan]['T0']['ZN08'])){
					$actual['NS'][$ecf->bulan]['T0']['ZN08'] += $ecf->ZN08_actual;
				}
				else{
					$actual['NS'][$ecf->bulan]['T0']['ZN08'] = $ecf->ZN08_actual;
				}
				if(isset($actual['NS']['Total']['T0']['ZN08'])){
					$actual['NS']['Total']['T0']['ZN08'] += $ecf->ZN08_actual;
				}
				else{
					$actual['NS']['Total']['T0']['ZN08'] = $ecf->ZN08_actual;
				}
			}

			$il = 0;
			while($il < 3){
				switch ($il) {
					case '0':
						$status = 'NS';
						break;
					case '1':
						$status = 'NSFC';
						break;
					case '2':
						$status = 'NSSC';
						break;
				}
				$iil = 0;
				while($iil <= 12){
					switch ($iil) {
						case '0':
							$bulan = 'Total';
							break;
						default:
							$bulan = 'B'.$iil;
							break;
					}
					$iiil = 1;
					while($iiil <= 15){
						//Real
						if($iiil < 10){
							$jenis = 'ZN0'.$iiil;
						}
						else{
							$jenis = 'ZN'.$iiil;
						}
						if(isset($forecast[$status][$bulan]['T0'][$jenis])){
							$total_forecast = $forecast[$status][$bulan]['T0'][$jenis];
						}
						else{
							$total_forecast = 0;
						}
						if(isset($actual[$status][$bulan]['T0'][$jenis])){
							$total_actual = $actual[$status][$bulan]['T0'][$jenis];
						}
						else{
							$total_actual = 0;
						}
						$query = $this->Raport_model->set_forecast_wilayah($wilayah, $status, $bulan, 'T0', 'Real', $jenis, $total_forecast);
						$query = $this->Raport_model->set_forecast_wilayah($wilayah, $status, $bulan, 'T0', 'Actual', $jenis, $total_forecast + $total_actual);
						$iiil++;
					}
					//Luas dan Tonase
					$iil++;
				}
				$il++;
			}

			echo "<pre>";
			var_dump($forecast);
			var_dump($actual);
			echo "</pre>";
			//die();
			//On success
			if($wilayah == 'W14'){
				echo ("
					<script>
						window.location.href = '/PIS/admin';
						alert('Berhasil di update Forecast ".$wilayah."');
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
						window.location.href = '/PIS/admin/update_wilayah_forecast_raport?wilayah=W".$cek_wil."';
					</script>
				");
			}
		}
		*/

	/*	function update_wilayah_forecast_t1_ZN_raport(){
			$wilayah = $this->input->get('wilayah');
			$element_cost_f = array(
				$wilayah.'1' => $this->Forecast_model->get_forecast_wilayah_report_t1($wilayah.'1'),
				$wilayah.'2' => $this->Forecast_model->get_forecast_wilayah_report_t1($wilayah.'2'),
				$wilayah.'3' => $this->Forecast_model->get_forecast_wilayah_report_t1($wilayah.'3')
			);

			//Forecast dan Actual
			$forecast = array();
			$actual = array();
			//ZN01 - ZN15 Except(ZN08 dan ZN10)
			foreach ($element_cost_f[$wilayah.'1'] as $ecf) {
			  //Forcast ZN01
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN01'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN01'] += $ecf->ZN01;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN01'] = $ecf->ZN01;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN01'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN01'] += $ecf->ZN01;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN01'] = $ecf->ZN01;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN01'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN01'] += $ecf->ZN01;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN01'] = $ecf->ZN01;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN01'])){
			    $forecast['NS']['Total']['T1']['ZN01'] += $ecf->ZN01;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN01'] = $ecf->ZN01;
			  }
			  //Forcast ZN02
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN02'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN02'] += $ecf->ZN02;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN02'] = $ecf->ZN02;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN02'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN02'] += $ecf->ZN02;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN02'] = $ecf->ZN02;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN02'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN02'] += $ecf->ZN02;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN02'] = $ecf->ZN02;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN02'])){
			    $forecast['NS']['Total']['T1']['ZN02'] += $ecf->ZN02;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN02'] = $ecf->ZN02;
			  }
			  //Forcast ZN03
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN03'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN03'] += $ecf->ZN03;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN03'] = $ecf->ZN03;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN03'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN03'] += $ecf->ZN03;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN03'] = $ecf->ZN03;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN03'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN03'] += $ecf->ZN03;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN03'] = $ecf->ZN03;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN03'])){
			    $forecast['NS']['Total']['T1']['ZN03'] += $ecf->ZN03;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN03'] = $ecf->ZN03;
			  }
			  //Forcast ZN04
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN04'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN04'] += $ecf->ZN04;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN04'] = $ecf->ZN04;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN04'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN04'] += $ecf->ZN04;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN04'] = $ecf->ZN04;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN04'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN04'] += $ecf->ZN04;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN04'] = $ecf->ZN04;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN04'])){
			    $forecast['NS']['Total']['T1']['ZN04'] += $ecf->ZN04;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN04'] = $ecf->ZN04;
			  }
			  //Forcast ZN05
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN05'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN05'] += $ecf->ZN05;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN05'] = $ecf->ZN05;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN05'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN05'] += $ecf->ZN05;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN05'] = $ecf->ZN05;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN05'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN05'] += $ecf->ZN05;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN05'] = $ecf->ZN05;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN05'])){
			    $forecast['NS']['Total']['T1']['ZN05'] += $ecf->ZN05;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN05'] = $ecf->ZN05;
			  }
			  //Forcast ZN06
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN06'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN06'] += $ecf->ZN06;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN06'] = $ecf->ZN06;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN06'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN06'] += $ecf->ZN06;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN06'] = $ecf->ZN06;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN06'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN06'] += $ecf->ZN06;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN06'] = $ecf->ZN06;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN06'])){
			    $forecast['NS']['Total']['T1']['ZN06'] += $ecf->ZN06;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN06'] = $ecf->ZN06;
			  }
			  //Forcast ZN07
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN07'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN07'] += $ecf->ZN07;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN07'] = $ecf->ZN07;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN07'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN07'] += $ecf->ZN07;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN07'] = $ecf->ZN07;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN07'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN07'] += $ecf->ZN07;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN07'] = $ecf->ZN07;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN07'])){
			    $forecast['NS']['Total']['T1']['ZN07'] += $ecf->ZN07;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN07'] = $ecf->ZN07;
			  }
			  //Forcast ZN09
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN09'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN09'] += $ecf->ZN09;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN09'] = $ecf->ZN09;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN09'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN09'] += $ecf->ZN09;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN09'] = $ecf->ZN09;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN09'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN09'] += $ecf->ZN09;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN09'] = $ecf->ZN09;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN09'])){
			    $forecast['NS']['Total']['T1']['ZN09'] += $ecf->ZN09;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN09'] = $ecf->ZN09;
			  }
			  //Forcast ZN11
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN11'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN11'] += $ecf->ZN11;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN11'] = $ecf->ZN11;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN11'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN11'] += $ecf->ZN11;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN11'] = $ecf->ZN11;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN11'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN11'] += $ecf->ZN11;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN11'] = $ecf->ZN11;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN11'])){
			    $forecast['NS']['Total']['T1']['ZN11'] += $ecf->ZN11;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN11'] = $ecf->ZN11;
			  }
			  //Forcast ZN12
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN12'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN12'] += $ecf->ZN12;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN12'] = $ecf->ZN12;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN12'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN12'] += $ecf->ZN12;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN12'] = $ecf->ZN12;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN12'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN12'] += $ecf->ZN12;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN12'] = $ecf->ZN12;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN12'])){
			    $forecast['NS']['Total']['T1']['ZN12'] += $ecf->ZN12;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN12'] = $ecf->ZN12;
			  }
			  //Forcast ZN13
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN13'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN13'] += $ecf->ZN13;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN13'] = $ecf->ZN13;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN13'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN13'] += $ecf->ZN13;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN13'] = $ecf->ZN13;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN13'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN13'] += $ecf->ZN13;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN13'] = $ecf->ZN13;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN13'])){
			    $forecast['NS']['Total']['T1']['ZN13'] += $ecf->ZN13;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN13'] = $ecf->ZN13;
			  }
			  //Forcast ZN14
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN14'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN14'] += $ecf->ZN14;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN14'] = $ecf->ZN14;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN14'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN14'] += $ecf->ZN14;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN14'] = $ecf->ZN14;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN14'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN14'] += $ecf->ZN14;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN14'] = $ecf->ZN14;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN14'])){
			    $forecast['NS']['Total']['T1']['ZN14'] += $ecf->ZN14;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN14'] = $ecf->ZN14;
			  }
			  //Forcast ZN15
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN15'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN15'] += $ecf->ZN15;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN15'] = $ecf->ZN15;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN15'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN15'] += $ecf->ZN15;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN15'] = $ecf->ZN15;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN15'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN15'] += $ecf->ZN15;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN15'] = $ecf->ZN15;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN15'])){
			    $forecast['NS']['Total']['T1']['ZN15'] += $ecf->ZN15;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN15'] = $ecf->ZN15;
			  }

			  //Actual ZN01
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN01'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN01'] += $ecf->ZN01;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN01'] = $ecf->ZN01;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN01'])){
			    $actual[$ecf->status]['Total']['T1']['ZN01'] += $ecf->ZN01;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN01'] = $ecf->ZN01;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN01'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN01'] += $ecf->ZN01;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN01'] = $ecf->ZN01;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN01'])){
			    $actual['NS']['Total']['T1']['ZN01'] += $ecf->ZN01;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN01'] = $ecf->ZN01;
			  }
			  //Actual ZN02
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN02'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN02'] += $ecf->ZN02;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN02'] = $ecf->ZN02;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN02'])){
			    $actual[$ecf->status]['Total']['T1']['ZN02'] += $ecf->ZN02;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN02'] = $ecf->ZN02;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN02'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN02'] += $ecf->ZN02;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN02'] = $ecf->ZN02;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN02'])){
			    $actual['NS']['Total']['T1']['ZN02'] += $ecf->ZN02;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN02'] = $ecf->ZN02;
			  }
			  //Actual ZN03
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN03'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN03'] += $ecf->ZN03;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN03'] = $ecf->ZN03;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN03'])){
			    $actual[$ecf->status]['Total']['T1']['ZN03'] += $ecf->ZN03;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN03'] = $ecf->ZN03;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN03'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN03'] += $ecf->ZN03;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN03'] = $ecf->ZN03;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN03'])){
			    $actual['NS']['Total']['T1']['ZN03'] += $ecf->ZN03;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN03'] = $ecf->ZN03;
			  }
			  //Actual ZN04
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN04'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN04'] += $ecf->ZN04;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN04'] = $ecf->ZN04;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN04'])){
			    $actual[$ecf->status]['Total']['T1']['ZN04'] += $ecf->ZN04;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN04'] = $ecf->ZN04;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN04'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN04'] += $ecf->ZN04;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN04'] = $ecf->ZN04;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN04'])){
			    $actual['NS']['Total']['T1']['ZN04'] += $ecf->ZN04;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN04'] = $ecf->ZN04;
			  }
			  //Actual ZN05
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN05'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN05'] += $ecf->ZN05;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN05'] = $ecf->ZN05;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN05'])){
			    $actual[$ecf->status]['Total']['T1']['ZN05'] += $ecf->ZN05;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN05'] = $ecf->ZN05;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN05'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN05'] += $ecf->ZN05;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN05'] = $ecf->ZN05;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN05'])){
			    $actual['NS']['Total']['T1']['ZN05'] += $ecf->ZN05;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN05'] = $ecf->ZN05;
			  }
			  //Actual ZN06
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN06'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN06'] += $ecf->ZN06;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN06'] = $ecf->ZN06;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN06'])){
			    $actual[$ecf->status]['Total']['T1']['ZN06'] += $ecf->ZN06;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN06'] = $ecf->ZN06;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN06'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN06'] += $ecf->ZN06;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN06'] = $ecf->ZN06;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN06'])){
			    $actual['NS']['Total']['T1']['ZN06'] += $ecf->ZN06;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN06'] = $ecf->ZN06;
			  }
			  //Actual ZN07
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN07'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN07'] += $ecf->ZN07;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN07'] = $ecf->ZN07;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN07'])){
			    $actual[$ecf->status]['Total']['T1']['ZN07'] += $ecf->ZN07;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN07'] = $ecf->ZN07;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN07'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN07'] += $ecf->ZN07;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN07'] = $ecf->ZN07;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN07'])){
			    $actual['NS']['Total']['T1']['ZN07'] += $ecf->ZN07;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN07'] = $ecf->ZN07;
			  }
			  //Actual ZN09
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN09'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN09'] += $ecf->ZN09;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN09'] = $ecf->ZN09;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN09'])){
			    $actual[$ecf->status]['Total']['T1']['ZN09'] += $ecf->ZN09;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN09'] = $ecf->ZN09;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN09'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN09'] += $ecf->ZN09;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN09'] = $ecf->ZN09;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN09'])){
			    $actual['NS']['Total']['T1']['ZN09'] += $ecf->ZN09;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN09'] = $ecf->ZN09;
			  }
			  //Actual ZN11
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN11'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN11'] += $ecf->ZN11;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN11'] = $ecf->ZN11;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN11'])){
			    $actual[$ecf->status]['Total']['T1']['ZN11'] += $ecf->ZN11;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN11'] = $ecf->ZN11;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN11'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN11'] += $ecf->ZN11;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN11'] = $ecf->ZN11;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN11'])){
			    $actual['NS']['Total']['T1']['ZN11'] += $ecf->ZN11;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN11'] = $ecf->ZN11;
			  }
			  //Actual ZN12
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN12'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN12'] += $ecf->ZN12;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN12'] = $ecf->ZN12;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN12'])){
			    $actual[$ecf->status]['Total']['T1']['ZN12'] += $ecf->ZN12;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN12'] = $ecf->ZN12;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN12'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN12'] += $ecf->ZN12;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN12'] = $ecf->ZN12;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN12'])){
			    $actual['NS']['Total']['T1']['ZN12'] += $ecf->ZN12;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN12'] = $ecf->ZN12;
			  }
			  //Actual ZN13
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN13'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN13'] += $ecf->ZN13;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN13'] = $ecf->ZN13;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN13'])){
			    $actual[$ecf->status]['Total']['T1']['ZN13'] += $ecf->ZN13;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN13'] = $ecf->ZN13;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN13'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN13'] += $ecf->ZN13;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN13'] = $ecf->ZN13;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN13'])){
			    $actual['NS']['Total']['T1']['ZN13'] += $ecf->ZN13;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN13'] = $ecf->ZN13;
			  }
			  //Actual ZN14
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN14'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN14'] += $ecf->ZN14;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN14'] = $ecf->ZN14;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN14'])){
			    $actual[$ecf->status]['Total']['T1']['ZN14'] += $ecf->ZN14;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN14'] = $ecf->ZN14;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN14'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN14'] += $ecf->ZN14;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN14'] = $ecf->ZN14;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN14'])){
			    $actual['NS']['Total']['T1']['ZN14'] += $ecf->ZN14;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN14'] = $ecf->ZN14;
			  }
			  //Actual ZN15
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN15'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN15'] += $ecf->ZN15;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN15'] = $ecf->ZN15;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN15'])){
			    $actual[$ecf->status]['Total']['T1']['ZN15'] += $ecf->ZN15;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN15'] = $ecf->ZN15;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN15'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN15'] += $ecf->ZN15;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN15'] = $ecf->ZN15;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN15'])){
			    $actual['NS']['Total']['T1']['ZN15'] += $ecf->ZN15;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN15'] = $ecf->ZN15;
			  }
			}
			foreach ($element_cost_f[$wilayah.'2'] as $ecf) {
			  //Forcast ZN01
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN01'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN01'] += $ecf->ZN01;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN01'] = $ecf->ZN01;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN01'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN01'] += $ecf->ZN01;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN01'] = $ecf->ZN01;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN01'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN01'] += $ecf->ZN01;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN01'] = $ecf->ZN01;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN01'])){
			    $forecast['NS']['Total']['T1']['ZN01'] += $ecf->ZN01;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN01'] = $ecf->ZN01;
			  }
			  //Forcast ZN02
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN02'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN02'] += $ecf->ZN02;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN02'] = $ecf->ZN02;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN02'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN02'] += $ecf->ZN02;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN02'] = $ecf->ZN02;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN02'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN02'] += $ecf->ZN02;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN02'] = $ecf->ZN02;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN02'])){
			    $forecast['NS']['Total']['T1']['ZN02'] += $ecf->ZN02;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN02'] = $ecf->ZN02;
			  }
			  //Forcast ZN03
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN03'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN03'] += $ecf->ZN03;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN03'] = $ecf->ZN03;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN03'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN03'] += $ecf->ZN03;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN03'] = $ecf->ZN03;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN03'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN03'] += $ecf->ZN03;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN03'] = $ecf->ZN03;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN03'])){
			    $forecast['NS']['Total']['T1']['ZN03'] += $ecf->ZN03;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN03'] = $ecf->ZN03;
			  }
			  //Forcast ZN04
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN04'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN04'] += $ecf->ZN04;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN04'] = $ecf->ZN04;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN04'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN04'] += $ecf->ZN04;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN04'] = $ecf->ZN04;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN04'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN04'] += $ecf->ZN04;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN04'] = $ecf->ZN04;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN04'])){
			    $forecast['NS']['Total']['T1']['ZN04'] += $ecf->ZN04;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN04'] = $ecf->ZN04;
			  }
			  //Forcast ZN05
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN05'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN05'] += $ecf->ZN05;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN05'] = $ecf->ZN05;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN05'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN05'] += $ecf->ZN05;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN05'] = $ecf->ZN05;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN05'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN05'] += $ecf->ZN05;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN05'] = $ecf->ZN05;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN05'])){
			    $forecast['NS']['Total']['T1']['ZN05'] += $ecf->ZN05;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN05'] = $ecf->ZN05;
			  }
			  //Forcast ZN06
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN06'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN06'] += $ecf->ZN06;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN06'] = $ecf->ZN06;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN06'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN06'] += $ecf->ZN06;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN06'] = $ecf->ZN06;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN06'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN06'] += $ecf->ZN06;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN06'] = $ecf->ZN06;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN06'])){
			    $forecast['NS']['Total']['T1']['ZN06'] += $ecf->ZN06;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN06'] = $ecf->ZN06;
			  }
			  //Forcast ZN07
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN07'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN07'] += $ecf->ZN07;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN07'] = $ecf->ZN07;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN07'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN07'] += $ecf->ZN07;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN07'] = $ecf->ZN07;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN07'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN07'] += $ecf->ZN07;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN07'] = $ecf->ZN07;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN07'])){
			    $forecast['NS']['Total']['T1']['ZN07'] += $ecf->ZN07;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN07'] = $ecf->ZN07;
			  }
			  //Forcast ZN09
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN09'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN09'] += $ecf->ZN09;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN09'] = $ecf->ZN09;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN09'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN09'] += $ecf->ZN09;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN09'] = $ecf->ZN09;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN09'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN09'] += $ecf->ZN09;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN09'] = $ecf->ZN09;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN09'])){
			    $forecast['NS']['Total']['T1']['ZN09'] += $ecf->ZN09;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN09'] = $ecf->ZN09;
			  }
			  //Forcast ZN11
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN11'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN11'] += $ecf->ZN11;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN11'] = $ecf->ZN11;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN11'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN11'] += $ecf->ZN11;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN11'] = $ecf->ZN11;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN11'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN11'] += $ecf->ZN11;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN11'] = $ecf->ZN11;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN11'])){
			    $forecast['NS']['Total']['T1']['ZN11'] += $ecf->ZN11;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN11'] = $ecf->ZN11;
			  }
			  //Forcast ZN12
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN12'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN12'] += $ecf->ZN12;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN12'] = $ecf->ZN12;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN12'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN12'] += $ecf->ZN12;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN12'] = $ecf->ZN12;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN12'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN12'] += $ecf->ZN12;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN12'] = $ecf->ZN12;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN12'])){
			    $forecast['NS']['Total']['T1']['ZN12'] += $ecf->ZN12;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN12'] = $ecf->ZN12;
			  }
			  //Forcast ZN13
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN13'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN13'] += $ecf->ZN13;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN13'] = $ecf->ZN13;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN13'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN13'] += $ecf->ZN13;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN13'] = $ecf->ZN13;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN13'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN13'] += $ecf->ZN13;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN13'] = $ecf->ZN13;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN13'])){
			    $forecast['NS']['Total']['T1']['ZN13'] += $ecf->ZN13;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN13'] = $ecf->ZN13;
			  }
			  //Forcast ZN14
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN14'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN14'] += $ecf->ZN14;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN14'] = $ecf->ZN14;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN14'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN14'] += $ecf->ZN14;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN14'] = $ecf->ZN14;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN14'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN14'] += $ecf->ZN14;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN14'] = $ecf->ZN14;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN14'])){
			    $forecast['NS']['Total']['T1']['ZN14'] += $ecf->ZN14;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN14'] = $ecf->ZN14;
			  }
			  //Forcast ZN15
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN15'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN15'] += $ecf->ZN15;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN15'] = $ecf->ZN15;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN15'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN15'] += $ecf->ZN15;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN15'] = $ecf->ZN15;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN15'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN15'] += $ecf->ZN15;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN15'] = $ecf->ZN15;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN15'])){
			    $forecast['NS']['Total']['T1']['ZN15'] += $ecf->ZN15;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN15'] = $ecf->ZN15;
			  }

			  //Actual ZN01
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN01'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN01'] += $ecf->ZN01;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN01'] = $ecf->ZN01;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN01'])){
			    $actual[$ecf->status]['Total']['T1']['ZN01'] += $ecf->ZN01;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN01'] = $ecf->ZN01;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN01'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN01'] += $ecf->ZN01;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN01'] = $ecf->ZN01;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN01'])){
			    $actual['NS']['Total']['T1']['ZN01'] += $ecf->ZN01;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN01'] = $ecf->ZN01;
			  }
			  //Actual ZN02
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN02'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN02'] += $ecf->ZN02;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN02'] = $ecf->ZN02;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN02'])){
			    $actual[$ecf->status]['Total']['T1']['ZN02'] += $ecf->ZN02;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN02'] = $ecf->ZN02;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN02'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN02'] += $ecf->ZN02;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN02'] = $ecf->ZN02;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN02'])){
			    $actual['NS']['Total']['T1']['ZN02'] += $ecf->ZN02;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN02'] = $ecf->ZN02;
			  }
			  //Actual ZN03
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN03'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN03'] += $ecf->ZN03;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN03'] = $ecf->ZN03;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN03'])){
			    $actual[$ecf->status]['Total']['T1']['ZN03'] += $ecf->ZN03;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN03'] = $ecf->ZN03;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN03'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN03'] += $ecf->ZN03;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN03'] = $ecf->ZN03;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN03'])){
			    $actual['NS']['Total']['T1']['ZN03'] += $ecf->ZN03;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN03'] = $ecf->ZN03;
			  }
			  //Actual ZN04
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN04'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN04'] += $ecf->ZN04;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN04'] = $ecf->ZN04;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN04'])){
			    $actual[$ecf->status]['Total']['T1']['ZN04'] += $ecf->ZN04;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN04'] = $ecf->ZN04;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN04'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN04'] += $ecf->ZN04;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN04'] = $ecf->ZN04;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN04'])){
			    $actual['NS']['Total']['T1']['ZN04'] += $ecf->ZN04;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN04'] = $ecf->ZN04;
			  }
			  //Actual ZN05
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN05'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN05'] += $ecf->ZN05;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN05'] = $ecf->ZN05;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN05'])){
			    $actual[$ecf->status]['Total']['T1']['ZN05'] += $ecf->ZN05;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN05'] = $ecf->ZN05;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN05'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN05'] += $ecf->ZN05;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN05'] = $ecf->ZN05;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN05'])){
			    $actual['NS']['Total']['T1']['ZN05'] += $ecf->ZN05;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN05'] = $ecf->ZN05;
			  }
			  //Actual ZN06
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN06'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN06'] += $ecf->ZN06;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN06'] = $ecf->ZN06;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN06'])){
			    $actual[$ecf->status]['Total']['T1']['ZN06'] += $ecf->ZN06;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN06'] = $ecf->ZN06;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN06'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN06'] += $ecf->ZN06;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN06'] = $ecf->ZN06;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN06'])){
			    $actual['NS']['Total']['T1']['ZN06'] += $ecf->ZN06;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN06'] = $ecf->ZN06;
			  }
			  //Actual ZN07
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN07'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN07'] += $ecf->ZN07;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN07'] = $ecf->ZN07;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN07'])){
			    $actual[$ecf->status]['Total']['T1']['ZN07'] += $ecf->ZN07;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN07'] = $ecf->ZN07;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN07'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN07'] += $ecf->ZN07;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN07'] = $ecf->ZN07;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN07'])){
			    $actual['NS']['Total']['T1']['ZN07'] += $ecf->ZN07;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN07'] = $ecf->ZN07;
			  }
			  //Actual ZN09
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN09'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN09'] += $ecf->ZN09;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN09'] = $ecf->ZN09;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN09'])){
			    $actual[$ecf->status]['Total']['T1']['ZN09'] += $ecf->ZN09;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN09'] = $ecf->ZN09;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN09'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN09'] += $ecf->ZN09;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN09'] = $ecf->ZN09;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN09'])){
			    $actual['NS']['Total']['T1']['ZN09'] += $ecf->ZN09;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN09'] = $ecf->ZN09;
			  }
			  //Actual ZN11
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN11'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN11'] += $ecf->ZN11;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN11'] = $ecf->ZN11;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN11'])){
			    $actual[$ecf->status]['Total']['T1']['ZN11'] += $ecf->ZN11;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN11'] = $ecf->ZN11;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN11'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN11'] += $ecf->ZN11;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN11'] = $ecf->ZN11;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN11'])){
			    $actual['NS']['Total']['T1']['ZN11'] += $ecf->ZN11;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN11'] = $ecf->ZN11;
			  }
			  //Actual ZN12
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN12'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN12'] += $ecf->ZN12;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN12'] = $ecf->ZN12;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN12'])){
			    $actual[$ecf->status]['Total']['T1']['ZN12'] += $ecf->ZN12;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN12'] = $ecf->ZN12;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN12'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN12'] += $ecf->ZN12;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN12'] = $ecf->ZN12;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN12'])){
			    $actual['NS']['Total']['T1']['ZN12'] += $ecf->ZN12;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN12'] = $ecf->ZN12;
			  }
			  //Actual ZN13
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN13'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN13'] += $ecf->ZN13;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN13'] = $ecf->ZN13;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN13'])){
			    $actual[$ecf->status]['Total']['T1']['ZN13'] += $ecf->ZN13;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN13'] = $ecf->ZN13;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN13'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN13'] += $ecf->ZN13;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN13'] = $ecf->ZN13;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN13'])){
			    $actual['NS']['Total']['T1']['ZN13'] += $ecf->ZN13;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN13'] = $ecf->ZN13;
			  }
			  //Actual ZN14
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN14'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN14'] += $ecf->ZN14;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN14'] = $ecf->ZN14;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN14'])){
			    $actual[$ecf->status]['Total']['T1']['ZN14'] += $ecf->ZN14;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN14'] = $ecf->ZN14;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN14'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN14'] += $ecf->ZN14;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN14'] = $ecf->ZN14;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN14'])){
			    $actual['NS']['Total']['T1']['ZN14'] += $ecf->ZN14;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN14'] = $ecf->ZN14;
			  }
			  //Actual ZN15
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN15'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN15'] += $ecf->ZN15;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN15'] = $ecf->ZN15;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN15'])){
			    $actual[$ecf->status]['Total']['T1']['ZN15'] += $ecf->ZN15;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN15'] = $ecf->ZN15;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN15'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN15'] += $ecf->ZN15;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN15'] = $ecf->ZN15;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN15'])){
			    $actual['NS']['Total']['T1']['ZN15'] += $ecf->ZN15;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN15'] = $ecf->ZN15;
			  }
			}
			foreach ($element_cost_f[$wilayah.'3'] as $ecf) {
			  //Forcast ZN01
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN01'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN01'] += $ecf->ZN01;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN01'] = $ecf->ZN01;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN01'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN01'] += $ecf->ZN01;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN01'] = $ecf->ZN01;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN01'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN01'] += $ecf->ZN01;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN01'] = $ecf->ZN01;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN01'])){
			    $forecast['NS']['Total']['T1']['ZN01'] += $ecf->ZN01;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN01'] = $ecf->ZN01;
			  }
			  //Forcast ZN02
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN02'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN02'] += $ecf->ZN02;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN02'] = $ecf->ZN02;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN02'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN02'] += $ecf->ZN02;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN02'] = $ecf->ZN02;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN02'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN02'] += $ecf->ZN02;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN02'] = $ecf->ZN02;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN02'])){
			    $forecast['NS']['Total']['T1']['ZN02'] += $ecf->ZN02;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN02'] = $ecf->ZN02;
			  }
			  //Forcast ZN03
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN03'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN03'] += $ecf->ZN03;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN03'] = $ecf->ZN03;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN03'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN03'] += $ecf->ZN03;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN03'] = $ecf->ZN03;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN03'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN03'] += $ecf->ZN03;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN03'] = $ecf->ZN03;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN03'])){
			    $forecast['NS']['Total']['T1']['ZN03'] += $ecf->ZN03;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN03'] = $ecf->ZN03;
			  }
			  //Forcast ZN04
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN04'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN04'] += $ecf->ZN04;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN04'] = $ecf->ZN04;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN04'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN04'] += $ecf->ZN04;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN04'] = $ecf->ZN04;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN04'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN04'] += $ecf->ZN04;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN04'] = $ecf->ZN04;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN04'])){
			    $forecast['NS']['Total']['T1']['ZN04'] += $ecf->ZN04;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN04'] = $ecf->ZN04;
			  }
			  //Forcast ZN05
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN05'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN05'] += $ecf->ZN05;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN05'] = $ecf->ZN05;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN05'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN05'] += $ecf->ZN05;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN05'] = $ecf->ZN05;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN05'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN05'] += $ecf->ZN05;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN05'] = $ecf->ZN05;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN05'])){
			    $forecast['NS']['Total']['T1']['ZN05'] += $ecf->ZN05;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN05'] = $ecf->ZN05;
			  }
			  //Forcast ZN06
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN06'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN06'] += $ecf->ZN06;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN06'] = $ecf->ZN06;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN06'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN06'] += $ecf->ZN06;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN06'] = $ecf->ZN06;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN06'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN06'] += $ecf->ZN06;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN06'] = $ecf->ZN06;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN06'])){
			    $forecast['NS']['Total']['T1']['ZN06'] += $ecf->ZN06;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN06'] = $ecf->ZN06;
			  }
			  //Forcast ZN07
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN07'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN07'] += $ecf->ZN07;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN07'] = $ecf->ZN07;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN07'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN07'] += $ecf->ZN07;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN07'] = $ecf->ZN07;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN07'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN07'] += $ecf->ZN07;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN07'] = $ecf->ZN07;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN07'])){
			    $forecast['NS']['Total']['T1']['ZN07'] += $ecf->ZN07;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN07'] = $ecf->ZN07;
			  }
			  //Forcast ZN09
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN09'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN09'] += $ecf->ZN09;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN09'] = $ecf->ZN09;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN09'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN09'] += $ecf->ZN09;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN09'] = $ecf->ZN09;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN09'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN09'] += $ecf->ZN09;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN09'] = $ecf->ZN09;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN09'])){
			    $forecast['NS']['Total']['T1']['ZN09'] += $ecf->ZN09;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN09'] = $ecf->ZN09;
			  }
			  //Forcast ZN11
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN11'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN11'] += $ecf->ZN11;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN11'] = $ecf->ZN11;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN11'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN11'] += $ecf->ZN11;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN11'] = $ecf->ZN11;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN11'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN11'] += $ecf->ZN11;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN11'] = $ecf->ZN11;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN11'])){
			    $forecast['NS']['Total']['T1']['ZN11'] += $ecf->ZN11;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN11'] = $ecf->ZN11;
			  }
			  //Forcast ZN12
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN12'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN12'] += $ecf->ZN12;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN12'] = $ecf->ZN12;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN12'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN12'] += $ecf->ZN12;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN12'] = $ecf->ZN12;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN12'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN12'] += $ecf->ZN12;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN12'] = $ecf->ZN12;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN12'])){
			    $forecast['NS']['Total']['T1']['ZN12'] += $ecf->ZN12;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN12'] = $ecf->ZN12;
			  }
			  //Forcast ZN13
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN13'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN13'] += $ecf->ZN13;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN13'] = $ecf->ZN13;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN13'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN13'] += $ecf->ZN13;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN13'] = $ecf->ZN13;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN13'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN13'] += $ecf->ZN13;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN13'] = $ecf->ZN13;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN13'])){
			    $forecast['NS']['Total']['T1']['ZN13'] += $ecf->ZN13;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN13'] = $ecf->ZN13;
			  }
			  //Forcast ZN14
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN14'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN14'] += $ecf->ZN14;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN14'] = $ecf->ZN14;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN14'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN14'] += $ecf->ZN14;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN14'] = $ecf->ZN14;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN14'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN14'] += $ecf->ZN14;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN14'] = $ecf->ZN14;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN14'])){
			    $forecast['NS']['Total']['T1']['ZN14'] += $ecf->ZN14;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN14'] = $ecf->ZN14;
			  }
			  //Forcast ZN15
			  if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN15'])){
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN15'] += $ecf->ZN15;
			  }
			  else{
			    $forecast[$ecf->status][$ecf->bulan]['T1']['ZN15'] = $ecf->ZN15;
			  }
			  if(isset($forecast[$ecf->status]['Total']['T1']['ZN15'])){
			    $forecast[$ecf->status]['Total']['T1']['ZN15'] += $ecf->ZN15;
			  }
			  else{
			    $forecast[$ecf->status]['Total']['T1']['ZN15'] = $ecf->ZN15;
			  }
			  if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN15'])){
			    $forecast['NS'][$ecf->bulan]['T1']['ZN15'] += $ecf->ZN15;
			  }
			  else{
			    $forecast['NS'][$ecf->bulan]['T1']['ZN15'] = $ecf->ZN15;
			  }
			  if(isset($forecast['NS']['Total']['T1']['ZN15'])){
			    $forecast['NS']['Total']['T1']['ZN15'] += $ecf->ZN15;
			  }
			  else{
			    $forecast['NS']['Total']['T1']['ZN15'] = $ecf->ZN15;
			  }

			  //Actual ZN01
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN01'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN01'] += $ecf->ZN01;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN01'] = $ecf->ZN01;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN01'])){
			    $actual[$ecf->status]['Total']['T1']['ZN01'] += $ecf->ZN01;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN01'] = $ecf->ZN01;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN01'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN01'] += $ecf->ZN01;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN01'] = $ecf->ZN01;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN01'])){
			    $actual['NS']['Total']['T1']['ZN01'] += $ecf->ZN01;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN01'] = $ecf->ZN01;
			  }
			  //Actual ZN02
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN02'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN02'] += $ecf->ZN02;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN02'] = $ecf->ZN02;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN02'])){
			    $actual[$ecf->status]['Total']['T1']['ZN02'] += $ecf->ZN02;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN02'] = $ecf->ZN02;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN02'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN02'] += $ecf->ZN02;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN02'] = $ecf->ZN02;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN02'])){
			    $actual['NS']['Total']['T1']['ZN02'] += $ecf->ZN02;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN02'] = $ecf->ZN02;
			  }
			  //Actual ZN03
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN03'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN03'] += $ecf->ZN03;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN03'] = $ecf->ZN03;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN03'])){
			    $actual[$ecf->status]['Total']['T1']['ZN03'] += $ecf->ZN03;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN03'] = $ecf->ZN03;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN03'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN03'] += $ecf->ZN03;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN03'] = $ecf->ZN03;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN03'])){
			    $actual['NS']['Total']['T1']['ZN03'] += $ecf->ZN03;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN03'] = $ecf->ZN03;
			  }
			  //Actual ZN04
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN04'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN04'] += $ecf->ZN04;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN04'] = $ecf->ZN04;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN04'])){
			    $actual[$ecf->status]['Total']['T1']['ZN04'] += $ecf->ZN04;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN04'] = $ecf->ZN04;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN04'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN04'] += $ecf->ZN04;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN04'] = $ecf->ZN04;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN04'])){
			    $actual['NS']['Total']['T1']['ZN04'] += $ecf->ZN04;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN04'] = $ecf->ZN04;
			  }
			  //Actual ZN05
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN05'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN05'] += $ecf->ZN05;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN05'] = $ecf->ZN05;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN05'])){
			    $actual[$ecf->status]['Total']['T1']['ZN05'] += $ecf->ZN05;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN05'] = $ecf->ZN05;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN05'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN05'] += $ecf->ZN05;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN05'] = $ecf->ZN05;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN05'])){
			    $actual['NS']['Total']['T1']['ZN05'] += $ecf->ZN05;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN05'] = $ecf->ZN05;
			  }
			  //Actual ZN06
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN06'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN06'] += $ecf->ZN06;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN06'] = $ecf->ZN06;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN06'])){
			    $actual[$ecf->status]['Total']['T1']['ZN06'] += $ecf->ZN06;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN06'] = $ecf->ZN06;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN06'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN06'] += $ecf->ZN06;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN06'] = $ecf->ZN06;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN06'])){
			    $actual['NS']['Total']['T1']['ZN06'] += $ecf->ZN06;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN06'] = $ecf->ZN06;
			  }
			  //Actual ZN07
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN07'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN07'] += $ecf->ZN07;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN07'] = $ecf->ZN07;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN07'])){
			    $actual[$ecf->status]['Total']['T1']['ZN07'] += $ecf->ZN07;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN07'] = $ecf->ZN07;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN07'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN07'] += $ecf->ZN07;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN07'] = $ecf->ZN07;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN07'])){
			    $actual['NS']['Total']['T1']['ZN07'] += $ecf->ZN07;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN07'] = $ecf->ZN07;
			  }
			  //Actual ZN09
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN09'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN09'] += $ecf->ZN09;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN09'] = $ecf->ZN09;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN09'])){
			    $actual[$ecf->status]['Total']['T1']['ZN09'] += $ecf->ZN09;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN09'] = $ecf->ZN09;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN09'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN09'] += $ecf->ZN09;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN09'] = $ecf->ZN09;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN09'])){
			    $actual['NS']['Total']['T1']['ZN09'] += $ecf->ZN09;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN09'] = $ecf->ZN09;
			  }
			  //Actual ZN11
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN11'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN11'] += $ecf->ZN11;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN11'] = $ecf->ZN11;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN11'])){
			    $actual[$ecf->status]['Total']['T1']['ZN11'] += $ecf->ZN11;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN11'] = $ecf->ZN11;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN11'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN11'] += $ecf->ZN11;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN11'] = $ecf->ZN11;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN11'])){
			    $actual['NS']['Total']['T1']['ZN11'] += $ecf->ZN11;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN11'] = $ecf->ZN11;
			  }
			  //Actual ZN12
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN12'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN12'] += $ecf->ZN12;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN12'] = $ecf->ZN12;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN12'])){
			    $actual[$ecf->status]['Total']['T1']['ZN12'] += $ecf->ZN12;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN12'] = $ecf->ZN12;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN12'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN12'] += $ecf->ZN12;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN12'] = $ecf->ZN12;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN12'])){
			    $actual['NS']['Total']['T1']['ZN12'] += $ecf->ZN12;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN12'] = $ecf->ZN12;
			  }
			  //Actual ZN13
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN13'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN13'] += $ecf->ZN13;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN13'] = $ecf->ZN13;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN13'])){
			    $actual[$ecf->status]['Total']['T1']['ZN13'] += $ecf->ZN13;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN13'] = $ecf->ZN13;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN13'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN13'] += $ecf->ZN13;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN13'] = $ecf->ZN13;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN13'])){
			    $actual['NS']['Total']['T1']['ZN13'] += $ecf->ZN13;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN13'] = $ecf->ZN13;
			  }
			  //Actual ZN14
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN14'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN14'] += $ecf->ZN14;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN14'] = $ecf->ZN14;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN14'])){
			    $actual[$ecf->status]['Total']['T1']['ZN14'] += $ecf->ZN14;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN14'] = $ecf->ZN14;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN14'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN14'] += $ecf->ZN14;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN14'] = $ecf->ZN14;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN14'])){
			    $actual['NS']['Total']['T1']['ZN14'] += $ecf->ZN14;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN14'] = $ecf->ZN14;
			  }
			  //Actual ZN15
			  if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN15'])){
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN15'] += $ecf->ZN15;
			  }
			  else{
			    $actual[$ecf->status][$ecf->bulan]['T1']['ZN15'] = $ecf->ZN15;
			  }
			  if(isset($actual[$ecf->status]['Total']['T1']['ZN15'])){
			    $actual[$ecf->status]['Total']['T1']['ZN15'] += $ecf->ZN15;
			  }
			  else{
			    $actual[$ecf->status]['Total']['T1']['ZN15'] = $ecf->ZN15;
			  }
			  if(isset($actual['NS'][$ecf->bulan]['T1']['ZN15'])){
			    $actual['NS'][$ecf->bulan]['T1']['ZN15'] += $ecf->ZN15;
			  }
			  else{
			    $actual['NS'][$ecf->bulan]['T1']['ZN15'] = $ecf->ZN15;
			  }
			  if(isset($actual['NS']['Total']['T1']['ZN15'])){
			    $actual['NS']['Total']['T1']['ZN15'] += $ecf->ZN15;
			  }
			  else{
			    $actual['NS']['Total']['T1']['ZN15'] = $ecf->ZN15;
			  }
			}

			$il = 0;
			while($il < 3){
				switch ($il) {
					case '0':
						$status = 'NS';
						break;
					case '1':
						$status = 'NSFC';
						break;
					case '2':
						$status = 'NSSC';
						break;
				}
				$iil = 0;
				while($iil <= 12){
					switch ($iil) {
						case '0':
							$bulan = 'Total';
							break;
						default:
							$bulan = 'B'.$iil;
							break;
					}
					$iiil = 1;
					while($iiil <= 15){
						//Real
						if($iiil < 10){
							$jenis = 'ZN0'.$iiil;
						}
						else{
							$jenis = 'ZN'.$iiil;
						}
						if(isset($forecast[$status][$bulan]['T1'][$jenis])){
							$total_forecast = $forecast[$status][$bulan]['T1'][$jenis];
						}
						else{
							$total_forecast = 0;
						}
						if(isset($actual[$status][$bulan]['T1'][$jenis])){
							$total_actual = $actual[$status][$bulan]['T1'][$jenis];
						}
						else{
							$total_actual = 0;
						}
						$query = $this->Raport_model->set_forecast_wilayah($wilayah, $status, $bulan, 'T1', 'Real', $jenis, $total_forecast);
						$query = $this->Raport_model->set_forecast_wilayah($wilayah, $status, $bulan, 'T1', 'Actual', $jenis, $total_forecast + $total_actual);
						$iiil++;
					}
					//Luas dan Tonase
					$iil++;
				}
				$il++;
			}

			echo "<pre>";
			var_dump($forecast);
			var_dump($actual);
			echo "</pre>";
			//die();
			//On success
			if($wilayah == 'W14'){
				echo ("
					<script>
						window.location.href = '/PIS/admin';
						alert('Berhasil di update Forecast T1 ZN ".$wilayah."');
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
						window.location.href = '/PIS/admin/update_wilayah_forecast_t1_ZN_raport?wilayah=W".$cek_wil."';
					</script>
				");
			}
		}*/

	/*	function update_wilayah_forecast_t1_ZN08_ZN10_raport(){
			$wilayah = $this->input->get('wilayah');
			$element_cost_ZN10 = array(
					$wilayah.'1' => $this->Forecast_model->get_forecast_zn10_wilayah_raport_t1($wilayah.'1'),
					$wilayah.'2' => $this->Forecast_model->get_forecast_zn10_wilayah_raport_t1($wilayah.'2'),
					$wilayah.'3' => $this->Forecast_model->get_forecast_zn10_wilayah_raport_t1($wilayah.'3')
			);
			$element_cost_ZN08 = array(
					$wilayah.'1' => $this->Forecast_model->get_forecast_zn08_wilayah_raport_t1($wilayah.'1'),
					$wilayah.'2' => $this->Forecast_model->get_forecast_zn08_wilayah_raport_t1($wilayah.'2'),
					$wilayah.'3' => $this->Forecast_model->get_forecast_zn08_wilayah_raport_t1($wilayah.'3')
			);

			//Forecast dan Actual
			$forecast = array();
			$actual = array();
			//ZN10
			foreach ($element_cost_ZN10[$wilayah.'1'] as $ecf) {
				//Forcast
				if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN10'])){
					$forecast[$ecf->status][$ecf->bulan]['T1']['ZN10'] += $ecf->ZN10;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T1']['ZN10'] = $ecf->ZN10;
				}
				if(isset($forecast[$ecf->status]['Total']['T1']['ZN10'])){
					$forecast[$ecf->status]['Total']['T1']['ZN10'] += $ecf->ZN10;
				}
				else{
					$forecast[$ecf->status]['Total']['T1']['ZN10'] = $ecf->ZN10;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN10'])){
					$forecast['NS'][$ecf->bulan]['T1']['ZN10'] += $ecf->ZN10;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T1']['ZN10'] = $ecf->ZN10;
				}
				if(isset($forecast['NS']['Total']['T1']['ZN10'])){
					$forecast['NS']['Total']['T1']['ZN10'] += $ecf->ZN10;
				}
				else{
					$forecast['NS']['Total']['T1']['ZN10'] = $ecf->ZN10;
				}

				//Actual
				if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN10'])){
					$actual[$ecf->status][$ecf->bulan]['T1']['ZN10'] += $ecf->ZN10_actual;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T1']['ZN10'] = $ecf->ZN10_actual;
				}
				if(isset($actual[$ecf->status]['Total']['T1']['ZN10'])){
					$actual[$ecf->status]['Total']['T1']['ZN10'] += $ecf->ZN10_actual;
				}
				else{
					$actual[$ecf->status]['Total']['T1']['ZN10'] = $ecf->ZN10_actual;
				}
				if(isset($actual['NS'][$ecf->bulan]['T1']['ZN10'])){
					$actual['NS'][$ecf->bulan]['T1']['ZN10'] += $ecf->ZN10_actual;
				}
				else{
					$actual['NS'][$ecf->bulan]['T1']['ZN10'] = $ecf->ZN10_actual;
				}
				if(isset($actual['NS']['Total']['T1']['ZN10'])){
					$actual['NS']['Total']['T1']['ZN10'] += $ecf->ZN10_actual;
				}
				else{
					$actual['NS']['Total']['T1']['ZN10'] = $ecf->ZN10_actual;
				}
			}
			foreach ($element_cost_ZN10[$wilayah.'2'] as $ecf) {
				//Forcast
				if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN10'])){
					$forecast[$ecf->status][$ecf->bulan]['T1']['ZN10'] += $ecf->ZN10;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T1']['ZN10'] = $ecf->ZN10;
				}
				if(isset($forecast[$ecf->status]['Total']['T1']['ZN10'])){
					$forecast[$ecf->status]['Total']['T1']['ZN10'] += $ecf->ZN10;
				}
				else{
					$forecast[$ecf->status]['Total']['T1']['ZN10'] = $ecf->ZN10;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN10'])){
					$forecast['NS'][$ecf->bulan]['T1']['ZN10'] += $ecf->ZN10;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T1']['ZN10'] = $ecf->ZN10;
				}
				if(isset($forecast['NS']['Total']['T1']['ZN10'])){
					$forecast['NS']['Total']['T1']['ZN10'] += $ecf->ZN10;
				}
				else{
					$forecast['NS']['Total']['T1']['ZN10'] = $ecf->ZN10;
				}

				//Actual
				if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN10'])){
					$actual[$ecf->status][$ecf->bulan]['T1']['ZN10'] += $ecf->ZN10_actual;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T1']['ZN10'] = $ecf->ZN10_actual;
				}
				if(isset($actual[$ecf->status]['Total']['T1']['ZN10'])){
					$actual[$ecf->status]['Total']['T1']['ZN10'] += $ecf->ZN10_actual;
				}
				else{
					$actual[$ecf->status]['Total']['T1']['ZN10'] = $ecf->ZN10_actual;
				}
				if(isset($actual['NS'][$ecf->bulan]['T1']['ZN10'])){
					$actual['NS'][$ecf->bulan]['T1']['ZN10'] += $ecf->ZN10_actual;
				}
				else{
					$actual['NS'][$ecf->bulan]['T1']['ZN10'] = $ecf->ZN10_actual;
				}
				if(isset($actual['NS']['Total']['T1']['ZN10'])){
					$actual['NS']['Total']['T1']['ZN10'] += $ecf->ZN10_actual;
				}
				else{
					$actual['NS']['Total']['T1']['ZN10'] = $ecf->ZN10_actual;
				}
			}
			foreach ($element_cost_ZN10[$wilayah.'3'] as $ecf) {
				//Forcast
				if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN10'])){
					$forecast[$ecf->status][$ecf->bulan]['T1']['ZN10'] += $ecf->ZN10;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T1']['ZN10'] = $ecf->ZN10;
				}
				if(isset($forecast[$ecf->status]['Total']['T1']['ZN10'])){
					$forecast[$ecf->status]['Total']['T1']['ZN10'] += $ecf->ZN10;
				}
				else{
					$forecast[$ecf->status]['Total']['T1']['ZN10'] = $ecf->ZN10;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN10'])){
					$forecast['NS'][$ecf->bulan]['T1']['ZN10'] += $ecf->ZN10;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T1']['ZN10'] = $ecf->ZN10;
				}
				if(isset($forecast['NS']['Total']['T1']['ZN10'])){
					$forecast['NS']['Total']['T1']['ZN10'] += $ecf->ZN10;
				}
				else{
					$forecast['NS']['Total']['T1']['ZN10'] = $ecf->ZN10;
				}

				//Actual
				if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN10'])){
					$actual[$ecf->status][$ecf->bulan]['T1']['ZN10'] += $ecf->ZN10_actual;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T1']['ZN10'] = $ecf->ZN10_actual;
				}
				if(isset($actual[$ecf->status]['Total']['T1']['ZN10'])){
					$actual[$ecf->status]['Total']['T1']['ZN10'] += $ecf->ZN10_actual;
				}
				else{
					$actual[$ecf->status]['Total']['T1']['ZN10'] = $ecf->ZN10_actual;
				}
				if(isset($actual['NS'][$ecf->bulan]['T1']['ZN10'])){
					$actual['NS'][$ecf->bulan]['T1']['ZN10'] += $ecf->ZN10_actual;
				}
				else{
					$actual['NS'][$ecf->bulan]['T1']['ZN10'] = $ecf->ZN10_actual;
				}
				if(isset($actual['NS']['Total']['T1']['ZN10'])){
					$actual['NS']['Total']['T1']['ZN10'] += $ecf->ZN10_actual;
				}
				else{
					$actual['NS']['Total']['T1']['ZN10'] = $ecf->ZN10_actual;
				}
			}
			//ZN08
			foreach ($element_cost_ZN08[$wilayah.'1'] as $ecf) {
				//Forcast
				if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN08'])){
					$forecast[$ecf->status][$ecf->bulan]['T1']['ZN08'] += $ecf->ZN08;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T1']['ZN08'] = $ecf->ZN08;
				}
				if(isset($forecast[$ecf->status]['Total']['T1']['ZN08'])){
					$forecast[$ecf->status]['Total']['T1']['ZN08'] += $ecf->ZN08;
				}
				else{
					$forecast[$ecf->status]['Total']['T1']['ZN08'] = $ecf->ZN08;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN08'])){
					$forecast['NS'][$ecf->bulan]['T1']['ZN08'] += $ecf->ZN08;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T1']['ZN08'] = $ecf->ZN08;
				}
				if(isset($forecast['NS']['Total']['T1']['ZN08'])){
					$forecast['NS']['Total']['T1']['ZN08'] += $ecf->ZN08;
				}
				else{
					$forecast['NS']['Total']['T1']['ZN08'] = $ecf->ZN08;
				}

				//Actual
				if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN08'])){
					$actual[$ecf->status][$ecf->bulan]['T1']['ZN08'] += $ecf->ZN08_actual;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T1']['ZN08'] = $ecf->ZN08_actual;
				}
				if(isset($actual[$ecf->status]['Total']['T1']['ZN08'])){
					$actual[$ecf->status]['Total']['T1']['ZN08'] += $ecf->ZN08_actual;
				}
				else{
					$actual[$ecf->status]['Total']['T1']['ZN08'] = $ecf->ZN08_actual;
				}
				if(isset($actual['NS'][$ecf->bulan]['T1']['ZN08'])){
					$actual['NS'][$ecf->bulan]['T1']['ZN08'] += $ecf->ZN08_actual;
				}
				else{
					$actual['NS'][$ecf->bulan]['T1']['ZN08'] = $ecf->ZN08_actual;
				}
				if(isset($actual['NS']['Total']['T1']['ZN08'])){
					$actual['NS']['Total']['T1']['ZN08'] += $ecf->ZN08_actual;
				}
				else{
					$actual['NS']['Total']['T1']['ZN08'] = $ecf->ZN08_actual;
				}
			}
			foreach ($element_cost_ZN08[$wilayah.'2'] as $ecf) {
				//Forcast
				if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN08'])){
					$forecast[$ecf->status][$ecf->bulan]['T1']['ZN08'] += $ecf->ZN08;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T1']['ZN08'] = $ecf->ZN08;
				}
				if(isset($forecast[$ecf->status]['Total']['T1']['ZN08'])){
					$forecast[$ecf->status]['Total']['T1']['ZN08'] += $ecf->ZN08;
				}
				else{
					$forecast[$ecf->status]['Total']['T1']['ZN08'] = $ecf->ZN08;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN08'])){
					$forecast['NS'][$ecf->bulan]['T1']['ZN08'] += $ecf->ZN08;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T1']['ZN08'] = $ecf->ZN08;
				}
				if(isset($forecast['NS']['Total']['T1']['ZN08'])){
					$forecast['NS']['Total']['T1']['ZN08'] += $ecf->ZN08;
				}
				else{
					$forecast['NS']['Total']['T1']['ZN08'] = $ecf->ZN08;
				}

				//Actual
				if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN08'])){
					$actual[$ecf->status][$ecf->bulan]['T1']['ZN08'] += $ecf->ZN08_actual;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T1']['ZN08'] = $ecf->ZN08_actual;
				}
				if(isset($actual[$ecf->status]['Total']['T1']['ZN08'])){
					$actual[$ecf->status]['Total']['T1']['ZN08'] += $ecf->ZN08_actual;
				}
				else{
					$actual[$ecf->status]['Total']['T1']['ZN08'] = $ecf->ZN08_actual;
				}
				if(isset($actual['NS'][$ecf->bulan]['T1']['ZN08'])){
					$actual['NS'][$ecf->bulan]['T1']['ZN08'] += $ecf->ZN08_actual;
				}
				else{
					$actual['NS'][$ecf->bulan]['T1']['ZN08'] = $ecf->ZN08_actual;
				}
				if(isset($actual['NS']['Total']['T1']['ZN08'])){
					$actual['NS']['Total']['T1']['ZN08'] += $ecf->ZN08_actual;
				}
				else{
					$actual['NS']['Total']['T1']['ZN08'] = $ecf->ZN08_actual;
				}
			}
			foreach ($element_cost_ZN08[$wilayah.'3'] as $ecf) {
				//Forcast
				if(isset($forecast[$ecf->status][$ecf->bulan]['T1']['ZN08'])){
					$forecast[$ecf->status][$ecf->bulan]['T1']['ZN08'] += $ecf->ZN08;
				}
				else{
					$forecast[$ecf->status][$ecf->bulan]['T1']['ZN08'] = $ecf->ZN08;
				}
				if(isset($forecast[$ecf->status]['Total']['T1']['ZN08'])){
					$forecast[$ecf->status]['Total']['T1']['ZN08'] += $ecf->ZN08;
				}
				else{
					$forecast[$ecf->status]['Total']['T1']['ZN08'] = $ecf->ZN08;
				}
				if(isset($forecast['NS'][$ecf->bulan]['T1']['ZN08'])){
					$forecast['NS'][$ecf->bulan]['T1']['ZN08'] += $ecf->ZN08;
				}
				else{
					$forecast['NS'][$ecf->bulan]['T1']['ZN08'] = $ecf->ZN08;
				}
				if(isset($forecast['NS']['Total']['T1']['ZN08'])){
					$forecast['NS']['Total']['T1']['ZN08'] += $ecf->ZN08;
				}
				else{
					$forecast['NS']['Total']['T1']['ZN08'] = $ecf->ZN08;
				}

				//Actual
				if(isset($actual[$ecf->status][$ecf->bulan]['T1']['ZN08'])){
					$actual[$ecf->status][$ecf->bulan]['T1']['ZN08'] += $ecf->ZN08_actual;
				}
				else{
					$actual[$ecf->status][$ecf->bulan]['T1']['ZN08'] = $ecf->ZN08_actual;
				}
				if(isset($actual[$ecf->status]['Total']['T1']['ZN08'])){
					$actual[$ecf->status]['Total']['T1']['ZN08'] += $ecf->ZN08_actual;
				}
				else{
					$actual[$ecf->status]['Total']['T1']['ZN08'] = $ecf->ZN08_actual;
				}
				if(isset($actual['NS'][$ecf->bulan]['T1']['ZN08'])){
					$actual['NS'][$ecf->bulan]['T1']['ZN08'] += $ecf->ZN08_actual;
				}
				else{
					$actual['NS'][$ecf->bulan]['T1']['ZN08'] = $ecf->ZN08_actual;
				}
				if(isset($actual['NS']['Total']['T1']['ZN08'])){
					$actual['NS']['Total']['T1']['ZN08'] += $ecf->ZN08_actual;
				}
				else{
					$actual['NS']['Total']['T1']['ZN08'] = $ecf->ZN08_actual;
				}
			}

			$il = 0;
			while($il < 3){
				switch ($il) {
					case '0':
						$status = 'NS';
						break;
					case '1':
						$status = 'NSFC';
						break;
					case '2':
						$status = 'NSSC';
						break;
				}
				$iil = 0;
				while($iil <= 12){
					switch ($iil) {
						case '0':
							$bulan = 'Total';
							break;
						default:
							$bulan = 'B'.$iil;
							break;
					}
					$iiil = 8;
					while($iiil <= 10){
						//Real
						if($iiil < 10){
							$jenis = 'ZN0'.$iiil;
						}
						else{
							$jenis = 'ZN'.$iiil;
						}
						if(isset($forecast[$status][$bulan]['T1'][$jenis])){
							$total_forecast = $forecast[$status][$bulan]['T1'][$jenis];
						}
						else{
							$total_forecast = 0;
						}
						if(isset($actual[$status][$bulan]['T1'][$jenis])){
							$total_actual = $actual[$status][$bulan]['T1'][$jenis];
						}
						else{
							$total_actual = 0;
						}
						$query = $this->Raport_model->set_forecast_wilayah($wilayah, $status, $bulan, 'T1', 'Real', $jenis, $total_forecast);
						$query = $this->Raport_model->set_forecast_wilayah($wilayah, $status, $bulan, 'T1', 'Actual', $jenis, $total_forecast + $total_actual);
						$iiil += 2;
					}
					//Luas dan Tonase
					$iil++;
				}
				$il++;
			}

			echo "<pre>";
			var_dump($forecast);
			var_dump($actual);
			echo "</pre>";
			//die();
			//On success
			if($wilayah == 'W14'){
				echo ("
					<script>
						window.location.href = '/PIS/admin';
						alert('Berhasil di update Forecast ZN08 & ZN10 ".$wilayah."');
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
						window.location.href = '/PIS/admin/update_wilayah_forecast_t1_ZN08_ZN10_raport?wilayah=W".$cek_wil."';
					</script>
				");
			}
		}*/
}
