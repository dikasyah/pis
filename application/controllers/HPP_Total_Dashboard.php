<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HPP_Total_Dashboard extends CI_Controller {

	function __construct(){
		parent :: __construct();

		$this->load->model('User_model');
		$this->load->model('Konstanta_model');
		$this->load->model('Coordinate_model');
		$this->load->model('PerlocationHPP_model');
		$this->load->model('PlantationGroup_model');
		$this->load->model('Wilayah_model');
		$this->load->model('Lokasi_model');
		$this->load->model('Performance_model');
		$this->load->model('ElementCost_model');
		$this->load->model('StdUnsurUmur_model');
		$this->load->model('ProduksiPanen_model');
	}

	public function index()
	{
		session_start();
		if(isset($_SESSION['username'])){
			$data['account'] = $this->User_model->get_user_index($_SESSION['index']);
			$data["konstanta"] = $this->Konstanta_model->get_konstanta_code("TGL_TARIK_DATA");
			$data["YEAR_BASE"] = $this->Konstanta_model->get_konstanta_code("YEAR_BASE");
			$data["tahun_panen"] = $this->PerlocationHPP_model->get_tahun_panen("All");

			$data['status'] = $this->input->get('status');
			$data['jenis'] = $this->input->get('jenis');
			$data['kelas'] = $this->input->get('kelas');
			$data['tahun'] = $this->input->get('tahun');
			$data['bulan'] = $this->input->get('bulan');

			if($data['status'] == NULL){
				$data['status'] = 'NS';
			}
			if($data['jenis'] == NULL || $data['status'] == 'NSSC'){
				$data['jenis'] = 'All';
			}
			if($data['kelas'] == NULL || $data['status'] == 'NSSC'){
				$data['kelas'] = 'All';
			}
			if($data['tahun'] == NULL){
				$tahun_terakhir = end($data["tahun_panen"]);
				$data['tahun'] = $tahun_terakhir['tahun_panen'];
			}
			if($data['bulan'] == NULL){
				$data['bulan'] = 'Total';
			}

			$data['coordinate'] = array(
				'PG1' => $this->Coordinate_model->get_coordinate_hpp('PG1', $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan']),
				'PG2' => $this->Coordinate_model->get_coordinate_hpp('PG2', $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan']),
				'PG3' => $this->Coordinate_model->get_coordinate_hpp('PG3', $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'])
			);
			$data['coordinate_center'] = array(
				'PG1' => $this->Coordinate_model->get_coordinate_pg_center('PG1'),
				'PG2' => $this->Coordinate_model->get_coordinate_pg_center('PG2'),
				'PG3' => $this->Coordinate_model->get_coordinate_pg_center('PG3')
			);
			$data['performance']['PG1'] = $this->PerlocationHPP_model->get_performance_hpp('PG1', $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan']);
			$data['performance']['PG2'] = $this->PerlocationHPP_model->get_performance_hpp('PG2', $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan']);
			$data['performance']['PG3'] = $this->PerlocationHPP_model->get_performance_hpp('PG3', $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan']);

			// echo "<pre>";
			// var_dump($data['performance']['PG1']);
			// echo "</pre>";
			// die();

			$this->load->view('HPP_Total/include/header');
			$this->load->view('HPP_Total/dashboard', $data);
			$this->load->view('HPP_Total/include/footer');
		}
		else{
			header( "Location: /PIS/dashboard" );
		}
	}

	//PG Cost
	public function plantation_group(){
		session_start();
		if(isset($_SESSION['username'])){
			$data['pg'] = $this->input->get('pg');
			$data['page'] = $this->input->get('page');
			$data['account'] = $this->User_model->get_user_index($_SESSION['index']);
			$data["konstanta"] = $this->Konstanta_model->get_konstanta_code("TGL_TARIK_DATA");
			$data["YEAR_BASE"] = $this->Konstanta_model->get_konstanta_code("YEAR_BASE");

			$data['pg_desc'] = $this->PlantationGroup_model->get_plantation_group_pg($data['pg']);
			$data['wilayah_all'] = $this->Wilayah_model->get_wilayah_pg($data['pg']);
			$data["tahun_panen"] = $this->PerlocationHPP_model->get_tahun_panen($data['pg']);

			$data['status'] = $this->input->get('status');
			$data['jenis'] = $this->input->get('jenis');
			$data['kelas'] = $this->input->get('kelas');
			$data['tahun'] = $this->input->get('tahun');
			$data['bulan'] = $this->input->get('bulan');

			if($data['status'] == NULL){
				$data['status'] = 'NS';
			}
			if($data['jenis'] == NULL || $data['status'] == 'NSSC'){
				$data['jenis'] = 'All';
			}
			if($data['kelas'] == NULL || $data['status'] == 'NSSC'){
				$data['kelas'] = 'All';
			}
			if($data['tahun'] == NULL){
				$tahun_terakhir = end($data["tahun_panen"]);
				$data['tahun'] = $tahun_terakhir['tahun_panen'];
			}
			if($data['bulan'] == NULL){
				$data['bulan'] = 'Total';
			}
			$data['luas_tonase'] = $this->PerlocationHPP_model->get_luas_tonase_panen($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan']);

			$data['performance'] = $this->PerlocationHPP_model->get_performance_hpp($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan']);
			$data['coordinate'] = $this->Coordinate_model->get_coordinate_hpp($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan']);

			$data['coordinate_center'] = $this->Coordinate_model->get_coordinate_pg_center($data['pg']);

			if($data['page'] == NULL){
				$data['page'] = 'HM';
			}

			$this->load->view('HPP_Total/include/header');
			switch ($data['page']) {
				//Home
				case 'HM':
				default:
					$data['element_cost'] = $this->input->get("element_cost");
					$data['group_cost'] = $this->input->get("group_cost");
					$data['group_cost_filter'] = $this->input->get("group_cost_filter");
					if($data['element_cost'] == NULL){
						$data['element_cost'] = 'Ha';
					}
					if($data['group_cost'] == NULL){
						$data['group_cost'] = 'Total';
					}
					if($data['group_cost_filter'] == NULL){
						$data['group_cost_filter'] = 'Accumulation';
					}
					$data["element_cost_all"] = $this->ElementCost_model->get_element_cost_panen($data['tahun']);

					$data['real'] = $this->PerlocationHPP_model->get_real_panen($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan']);
					$data['hpp'] = $this->PerlocationHPP_model->get_cost_panen($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan']);

					$data['group_cost_std'] = $this->ProduksiPanen_model->get_group_cost_budget_hpp($data['pg'], $data['tahun']);

					$this->load->view('HPP_Total/plantation_group', $data);
				break;
				//Summary 1
				case 'S1':
					$data['proporsi_luas_panen'] = $this->PerlocationHPP_model->get_proporsi_luas_panen($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan']);
					$data['kondisi_drainase'] = $this->PerlocationHPP_model->get_kondisi_drainase($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan']);

					$data["ec_total"] = $this->ElementCost_model->get_element_cost_panen_total($data['tahun']);
					$data["hpp_total"] = $this->PerlocationHPP_model->get_total_cost_panen($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan']);

					$data['trend_cost'] = $this->PerlocationHPP_model->get_trend_cost_hpp($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan']);

					$this->load->view('HPP_Total/plantation_group_S1', $data);
				break;
			}
			$this->load->view('HPP_Total/include/footer');
		}
		else{
			header( "Location: /PIS/dashboard" );
		}
	}

	//Wilayah Cost
	public function wilayah(){
		session_start();
		if(isset($_SESSION['username'])){
			$data['wilayah'] = $this->input->get('wilayah');
			$data['page'] = $this->input->get('page');
			$data['account'] = $this->User_model->get_user_index($_SESSION['index']);
			$data["konstanta"] = $this->Konstanta_model->get_konstanta_code("TGL_TARIK_DATA");
			$data["YEAR_BASE"] = $this->Konstanta_model->get_konstanta_code("YEAR_BASE");

			$data['wilayah_desc'] = $this->Wilayah_model->get_wilayah_code($data['wilayah']);
			$data["lokasi_all"] = $this->PerlocationHPP_model->get_lokasi($data['wilayah']);
			$data["tahun_panen"] = $this->PerlocationHPP_model->get_tahun_panen($data['wilayah']);

			$data['status'] = $this->input->get('status');
			$data['jenis'] = $this->input->get('jenis');
			$data['kelas'] = $this->input->get('kelas');
			$data['tahun'] = $this->input->get('tahun');
			$data['bulan'] = $this->input->get('bulan');

			if($data['status'] == NULL){
				$data['status'] = 'NS';
			}
			if($data['jenis'] == NULL || $data['status'] == 'NSSC'){
				$data['jenis'] = 'All';
			}
			if($data['kelas'] == NULL || $data['status'] == 'NSSC'){
				$data['kelas'] = 'All';
			}
			if($data['tahun'] == NULL){
				$tahun_terakhir = end($data["tahun_panen"]);
				$data['tahun'] = $tahun_terakhir['tahun_panen'];
			}
			if($data['bulan'] == NULL){
				$data['bulan'] = 'Total';
			}
			$data['luas_tonase'] = $this->PerlocationHPP_model->get_luas_tonase_panen($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan']);

			$data['performance'] = $this->PerlocationHPP_model->get_performance_hpp($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan']);
			$data['coordinate'] = $this->Coordinate_model->get_coordinate_hpp($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan']);

			$data['coordinate_center'] = $this->Coordinate_model->get_coordinate_wilayah_center($data['wilayah']);

			$this->load->view('HPP_Total/include/header');
			switch ($data['page']) {
				//Home
				case 'HM':
				default:
					$data['element_cost'] = $this->input->get("element_cost");
					$data['group_cost'] = $this->input->get("group_cost");
					$data['group_cost_filter'] = $this->input->get("group_cost_filter");
					if($data['element_cost'] == NULL){
						$data['element_cost'] = 'Ha';
					}
					if($data['group_cost'] == NULL){
						$data['group_cost'] = 'Total';
					}
					if($data['group_cost_filter'] == NULL){
						$data['group_cost_filter'] = 'Accumulation';
					}
					$data["element_cost_all"] = $this->ElementCost_model->get_element_cost_panen($data['tahun']);

					$data['real'] = $this->PerlocationHPP_model->get_real_panen($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan']);
					$data['hpp'] = $this->PerlocationHPP_model->get_cost_panen($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan']);

					$data['group_cost_std'] = $this->ProduksiPanen_model->get_group_cost_budget_hpp($data['wilayah'], $data['tahun']);

					$this->load->view('HPP_Total/wilayah', $data);
				break;
				//Summary 1
				case 'S1':
					$data['proporsi_luas_panen'] = $this->PerlocationHPP_model->get_proporsi_luas_panen($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan']);
					$data['kondisi_drainase'] = $this->PerlocationHPP_model->get_kondisi_drainase($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan']);

					$data["ec_total"] = $this->ElementCost_model->get_element_cost_panen_total($data['tahun']);
					$data["hpp_total"] = $this->PerlocationHPP_model->get_total_cost_panen($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan']);

					$data['trend_cost'] = $this->PerlocationHPP_model->get_trend_cost_hpp($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan']);

					$this->load->view('HPP_Total/wilayah_S1', $data);
				break;
			}
			$this->load->view('HPP_Total/include/footer');
		}
		else{
			header( "Location: /PIS/dashboard" );
		}
	}

	//Perlocation
	public function perlocation_pg(){
		session_start();
		$pg = $this->input->get("pg");
		$data['pg'] = $this->input->get("pg");
		$category_ha = $this->input->get("category_ha");
		$category_kg = $this->input->get("category_kg");
		// if(isset($_SESSION['username'])){
		// 	$this->User_model->reload_history_login($_SESSION['index']);
		// 	if(in_array($pg, $_SESSION['read'])){
		// 		//header( "Location: /PIS/HPP_Total_Dashboard/plantation_group?pg=".$pg);
		// 	}
		// 	else if($_SESSION['username']){
		// 		header( "Location: /PIS/HPP_Total_Dashboard/plantation_group?pg=".$_SESSION['code']);
		// 	}
		// }
		// else{
		// 	header( "Location: /PIS");
		// }
		$data['account'] = $this->User_model->get_user_index($_SESSION['index']);
		$data["konstanta"] = $this->Konstanta_model->get_konstanta_code("TGL_TARIK_DATA");

		$data['pg_desc'] = $this->PlantationGroup_model->get_plantation_group_pg($data['pg']);
		$data['wilayah_all'] = $this->Wilayah_model->get_wilayah_pg($data['pg']);
		$data['perlocation'] = $this->PerlocationHPP_model->get_perlocation($pg, '2019');

		$this->load->view('HPP_Total/include/header');
		$this->load->view('HPP_Total/perlocation_pg', $data);
    $this->load->view('HPP_Total/include/footer');
	}
	public function perlocation_wilayah(){
		session_start();
		$wilayah = $this->input->get('wilayah');
		$data['wilayah'] = $this->input->get("wilayah");
		$category_ha = $this->input->get("category_ha");
		$category_kg = $this->input->get("category_kg");
		if(isset($_SESSION['username'])){
			$this->User_model->reload_history_login($_SESSION['index']);
			if(in_array($wilayah, $_SESSION['read'])){
				//header( "Location: /PIS/HPP_Total_Dashboard/wilayah?wilayah=".$wilayah);
			}
			else{
				header( "Location: /PIS/HPP_Total_Dashboard/wilayah?wilayah=".$_SESSION['code']);
			}
		}
		else{
			header( "Location: /PIS");
		}
		$data['account'] = $this->User_model->get_user_index($_SESSION['index']);
		$data["konstanta"] = $this->Konstanta_model->get_konstanta_code("TGL_TARIK_DATA");

		$data['wilayah_desc'] = $this->Wilayah_model->get_wilayah_code($data['wilayah']);
		$data['perlocation'] = $this->PerlocationHPP_model->get_perlocation($wilayah, '2019');

		$this->load->view('HPP_Total/include/header');
		$this->load->view('HPP_Total/perlocation_wilayah', $data);
    $this->load->view('HPP_Total/include/footer');
	}
}
