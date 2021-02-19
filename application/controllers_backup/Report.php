<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	function __construct()
	{
		parent :: __construct();
		$this->load->model('User_model');
		$this->load->model('ElementCost_model');
		$this->load->model('Lokasi_model');
		$this->load->model('Target_model');
		$this->load->model('Konstanta_model');
		$this->load->model('Produksi_model');
		$this->load->model('DataMaster_model');
		$this->load->model('Forecast_model');
		$this->load->model('ForecastOverhead_model');
		$this->load->model('TonasePanen_model');
		$this->load->model('Koreksi_model');
	}

	public function index()
	{
		session_start();
		if(isset($_SESSION['username'])){
			header( "Location: /PIS" );
		}
		else{
			header( "Location: /PIS" );
		}
	}

	function history_login(){
		session_start();
		if(isset($_SESSION['username'])){
			$this->User_model->reload_history_login($_SESSION['index']);
			$tgl = $this->input->get('tgl');
			if($tgl != NULL){
				$tgl = date("Y-m-".$this->input->get('tgl'));
				$data['tgl'] = date("Y-m-".$this->input->get('tgl'));
			}
			else{
				$tgl = date('Y-m-d');
				$data['tgl'] = date('Y-m-d');
			}
			if($_SESSION['crud'] == 0 || $_SESSION['index'] == "01334"){
				$data['PG1'] = array(
					'sn_manager' => $this->User_model->get_history_login_index("Sub Div Head", "PG1", $tgl),
					'ppic_manager' => $this->User_model->get_history_login_index("Dept Head PPIC", "PG1", $tgl),
					'fs_manager' => $this->User_model->get_history_login_index("Dept Head FS", "PG1", $tgl),
					'kawil_1' => $this->User_model->get_history_login_index("Kawil 1", "W01", $tgl),
					'kawil_2' => $this->User_model->get_history_login_index("Kawil 2", "W02", $tgl),
					'kawil_3' => $this->User_model->get_history_login_index("Kawil 3", "W03", $tgl),
					'kawil_4' => $this->User_model->get_history_login_index("Kawil 4", "W04", $tgl),
					'kabag_fe' => $this->User_model->get_history_login_index("Kabag FE", "PG1", $tgl),
					'kabag_planting' => $this->User_model->get_history_login_index("Kabag Planting", "PG1", $tgl),
					'kabag_fs' => $this->User_model->get_history_login_index("Kabag FS", "PG1", $tgl),
					'kabag_pm' => $this->User_model->get_history_login_index("Kabag PM", "PG1", $tgl),
					'kabag_qc' => $this->User_model->get_history_login_index("Kabag QC", "PG1", $tgl),
					'kabag_gulma' => $this->User_model->get_history_login_index("Kabag Gulma", "PG1", $tgl),
					'kabag_ppo' => $this->User_model->get_history_login_index("Kabag PPO", "PG1", $tgl),
					'kabag_pppp' => $this->User_model->get_history_login_index("Kabag PPPP", "PG1", $tgl)
				);
				$data['PG2'] = array(
					'sn_manager' => $this->User_model->get_history_login_index("Sub Div Head", "PG2", $tgl),
					'ppic_manager' => $this->User_model->get_history_login_index("Dept Head PPIC", "PG2", $tgl),
					'fs_manager' => $this->User_model->get_history_login_index("Dept Head FS", "PG2", $tgl),
					'kawil_5' => $this->User_model->get_history_login_index("Kawil 5", "W05", $tgl),
					'kawil_6' => $this->User_model->get_history_login_index("Kawil 6", "W06", $tgl),
					'kawil_7' => $this->User_model->get_history_login_index("Kawil 7", "W07", $tgl),
					'kawil_8' => $this->User_model->get_history_login_index("Kawil 8", "W08", $tgl),
					'kabag_fe' => $this->User_model->get_history_login_index("Kabag FE", "PG2", $tgl),
					'kabag_planting' => $this->User_model->get_history_login_index("Kabag Planting", "PG2", $tgl),
					'kabag_fs' => $this->User_model->get_history_login_index("Kabag FS", "PG2", $tgl),
					'kabag_pm' => $this->User_model->get_history_login_index("Kabag PM", "PG2", $tgl),
					'kabag_qc' => $this->User_model->get_history_login_index("Kabag QC", "PG2", $tgl),
					'kabag_gulma' => $this->User_model->get_history_login_index("Kabag Gulma", "PG2", $tgl),
					'kabag_ppo' => $this->User_model->get_history_login_index("Kabag PPO", "PG2", $tgl),
					'kabag_pppp' => $this->User_model->get_history_login_index("Kabag PPPP", "PG2", $tgl)
				);
				$data['PG3'] = array(
					'sn_manager' => $this->User_model->get_history_login_index("Sub Div Head", "PG3", $tgl),
					'ppic_manager' => $this->User_model->get_history_login_index("Dept Head PPIC", "PG3", $tgl),
					'fs_manager' => $this->User_model->get_history_login_index("Dept Head FS", "PG3", $tgl),
					'kawil_9' => $this->User_model->get_history_login_index("Kawil 9", "W09", $tgl),
					'kawil_11' => $this->User_model->get_history_login_index("Kawil 11", "W11", $tgl),
					'kawil_12' => $this->User_model->get_history_login_index("Kawil 12", "W12", $tgl),
					'kawil_13' => $this->User_model->get_history_login_index("Kawil 13", "W13", $tgl),
					'kawil_14' => $this->User_model->get_history_login_index("Kawil 14", "W14", $tgl),
					'kabag_fe' => $this->User_model->get_history_login_index("Kabag FE", "PG3", $tgl),
					'kabag_planting' => $this->User_model->get_history_login_index("Kabag Planting", "PG3", $tgl),
					'kabag_fs' => $this->User_model->get_history_login_index("Kabag FS", "PG3", $tgl),
					'kabag_pm' => $this->User_model->get_history_login_index("Kabag PM", "PG3", $tgl),
					'kabag_qc' => $this->User_model->get_history_login_index("Kabag QC", "PG3", $tgl),
					'kabag_gulma' => $this->User_model->get_history_login_index("Kabag Gulma", "PG3", $tgl),
					'kabag_ppo' => $this->User_model->get_history_login_index("Kabag PPO", "PG3", $tgl),
					'kabag_pppp' => $this->User_model->get_history_login_index("Kabag PPPP", "PG3", $tgl)
				);
				$data['PG1_all'] = array(
					'sn_manager' => $this->User_model->get_history_login_all_index("Sub Div Head", "PG1", $tgl),
					'ppic_manager' => $this->User_model->get_history_login_all_index("Dept Head PPIC", "PG1", $tgl),
					'fs_manager' => $this->User_model->get_history_login_all_index("Dept Head FS", "PG1", $tgl),
					'kawil_1' => $this->User_model->get_history_login_all_index("Kawil 1", "W01", $tgl),
					'kawil_2' => $this->User_model->get_history_login_all_index("Kawil 2", "W02", $tgl),
					'kawil_3' => $this->User_model->get_history_login_all_index("Kawil 3", "W03", $tgl),
					'kawil_4' => $this->User_model->get_history_login_all_index("Kawil 4", "W04", $tgl),
					'kabag_fe' => $this->User_model->get_history_login_all_index("Kabag FE", "PG1", $tgl),
					'kabag_planting' => $this->User_model->get_history_login_all_index("Kabag Planting", "PG1", $tgl),
					'kabag_fs' => $this->User_model->get_history_login_all_index("Kabag FS", "PG1", $tgl),
					'kabag_pm' => $this->User_model->get_history_login_all_index("Kabag PM", "PG1", $tgl),
					'kabag_qc' => $this->User_model->get_history_login_all_index("Kabag QC", "PG1", $tgl),
					'kabag_gulma' => $this->User_model->get_history_login_all_index("Kabag Gulma", "PG1", $tgl),
					'kabag_ppo' => $this->User_model->get_history_login_all_index("Kabag PPO", "PG1", $tgl),
					'kabag_pppp' => $this->User_model->get_history_login_all_index("Kabag PPPP", "PG1", $tgl)
				);
				$data['PG2_all'] = array(
					'sn_manager' => $this->User_model->get_history_login_all_index("Sub Div Head", "PG2", $tgl),
					'ppic_manager' => $this->User_model->get_history_login_all_index("Dept Head PPIC", "PG2", $tgl),
					'fs_manager' => $this->User_model->get_history_login_all_index("Dept Head FS", "PG2", $tgl),
					'kawil_5' => $this->User_model->get_history_login_all_index("Kawil 5", "W05", $tgl),
					'kawil_6' => $this->User_model->get_history_login_all_index("Kawil 6", "W06", $tgl),
					'kawil_7' => $this->User_model->get_history_login_all_index("Kawil 7", "W07", $tgl),
					'kawil_8' => $this->User_model->get_history_login_all_index("Kawil 8", "W08", $tgl),
					'kabag_fe' => $this->User_model->get_history_login_all_index("Kabag FE", "PG2", $tgl),
					'kabag_planting' => $this->User_model->get_history_login_all_index("Kabag Planting", "PG2", $tgl),
					'kabag_fs' => $this->User_model->get_history_login_all_index("Kabag FS", "PG2", $tgl),
					'kabag_pm' => $this->User_model->get_history_login_all_index("Kabag PM", "PG2", $tgl),
					'kabag_qc' => $this->User_model->get_history_login_all_index("Kabag QC", "PG2", $tgl),
					'kabag_gulma' => $this->User_model->get_history_login_all_index("Kabag Gulma", "PG2", $tgl),
					'kabag_ppo' => $this->User_model->get_history_login_all_index("Kabag PPO", "PG2", $tgl),
					'kabag_pppp' => $this->User_model->get_history_login_all_index("Kabag PPPP", "PG2", $tgl)
				);
				$data['PG3_all'] = array(
					'sn_manager' => $this->User_model->get_history_login_all_index("Sub Div Head", "PG3", $tgl),
					'ppic_manager' => $this->User_model->get_history_login_all_index("Dept Head PPIC", "PG3", $tgl),
					'fs_manager' => $this->User_model->get_history_login_all_index("Dept Head FS", "PG3", $tgl),
					'kawil_9' => $this->User_model->get_history_login_all_index("Kawil 9", "W09", $tgl),
					'kawil_11' => $this->User_model->get_history_login_all_index("Kawil 11", "W11", $tgl),
					'kawil_12' => $this->User_model->get_history_login_all_index("Kawil 12", "W12", $tgl),
					'kawil_13' => $this->User_model->get_history_login_all_index("Kawil 13", "W13", $tgl),
					'kawil_14' => $this->User_model->get_history_login_all_index("Kawil 14", "W14", $tgl),
					'kabag_fe' => $this->User_model->get_history_login_all_index("Kabag FE", "PG3", $tgl),
					'kabag_planting' => $this->User_model->get_history_login_all_index("Kabag Planting", "PG3", $tgl),
					'kabag_fs' => $this->User_model->get_history_login_all_index("Kabag FS", "PG3", $tgl),
					'kabag_pm' => $this->User_model->get_history_login_all_index("Kabag PM", "PG3", $tgl),
					'kabag_qc' => $this->User_model->get_history_login_all_index("Kabag QC", "PG3", $tgl),
					'kabag_gulma' => $this->User_model->get_history_login_all_index("Kabag Gulma", "PG3", $tgl),
					'kabag_ppo' => $this->User_model->get_history_login_all_index("Kabag PPO", "PG3", $tgl),
					'kabag_pppp' => $this->User_model->get_history_login_all_index("Kabag PPPP", "PG3", $tgl)
				);
			}
			else{
				switch($_SESSION['code']) {
					case 'PG1':
						$data['PG1'] = array(
							'sn_manager' => $this->User_model->get_history_login_index("Sub Div Head", "PG1", $tgl),
							'ppic_manager' => $this->User_model->get_history_login_index("Dept Head PPIC", "PG1", $tgl),
							'fs_manager' => $this->User_model->get_history_login_index("Dept Head FS", "PG1", $tgl),
							'kawil_1' => $this->User_model->get_history_login_index("Kawil 1", "W01", $tgl),
							'kawil_2' => $this->User_model->get_history_login_index("Kawil 2", "W02", $tgl),
							'kawil_3' => $this->User_model->get_history_login_index("Kawil 3", "W03", $tgl),
							'kawil_4' => $this->User_model->get_history_login_index("Kawil 4", "W04", $tgl),
							'kabag_fe' => $this->User_model->get_history_login_index("Kabag FE", "PG1", $tgl),
							'kabag_planting' => $this->User_model->get_history_login_index("Kabag Planting", "PG1", $tgl),
							'kabag_fs' => $this->User_model->get_history_login_index("Kabag FS", "PG1", $tgl),
							'kabag_pm' => $this->User_model->get_history_login_index("Kabag PM", "PG1", $tgl),
							'kabag_qc' => $this->User_model->get_history_login_index("Kabag QC", "PG1", $tgl),
							'kabag_gulma' => $this->User_model->get_history_login_index("Kabag Gulma", "PG1", $tgl),
							'kabag_ppo' => $this->User_model->get_history_login_index("Kabag PPO", "PG1", $tgl),
							'kabag_pppp' => $this->User_model->get_history_login_index("Kabag PPPP", "PG1", $tgl)
						);
						$data['PG1_all'] = array(
							'sn_manager' => $this->User_model->get_history_login_all_index("Sub Div Head", "PG1", $tgl),
							'ppic_manager' => $this->User_model->get_history_login_all_index("Dept Head PPIC", "PG1", $tgl),
							'fs_manager' => $this->User_model->get_history_login_all_index("Dept Head FS", "PG1", $tgl),
							'kawil_1' => $this->User_model->get_history_login_all_index("Kawil 1", "W01", $tgl),
							'kawil_2' => $this->User_model->get_history_login_all_index("Kawil 2", "W02", $tgl),
							'kawil_3' => $this->User_model->get_history_login_all_index("Kawil 3", "W03", $tgl),
							'kawil_4' => $this->User_model->get_history_login_all_index("Kawil 4", "W04", $tgl),
							'kabag_fe' => $this->User_model->get_history_login_all_index("Kabag FE", "PG1", $tgl),
							'kabag_planting' => $this->User_model->get_history_login_all_index("Kabag Planting", "PG1", $tgl),
							'kabag_fs' => $this->User_model->get_history_login_all_index("Kabag FS", "PG1", $tgl),
							'kabag_pm' => $this->User_model->get_history_login_all_index("Kabag PM", "PG1", $tgl),
							'kabag_qc' => $this->User_model->get_history_login_all_index("Kabag QC", "PG1", $tgl),
							'kabag_gulma' => $this->User_model->get_history_login_all_index("Kabag Gulma", "PG1", $tgl),
							'kabag_ppo' => $this->User_model->get_history_login_all_index("Kabag PPO", "PG1", $tgl),
							'kabag_pppp' => $this->User_model->get_history_login_all_index("Kabag PPPP", "PG1", $tgl)
						);
					break;
					case 'PG2':
						$data['PG2'] = array(
							'sn_manager' => $this->User_model->get_history_login_index("Sub Div Head", "PG2", $tgl),
							'ppic_manager' => $this->User_model->get_history_login_index("Dept Head PPIC", "PG2", $tgl),
							'fs_manager' => $this->User_model->get_history_login_index("Dept Head FS", "PG2", $tgl),
							'kawil_5' => $this->User_model->get_history_login_index("Kawil 5", "W05", $tgl),
							'kawil_6' => $this->User_model->get_history_login_index("Kawil 6", "W06", $tgl),
							'kawil_7' => $this->User_model->get_history_login_index("Kawil 7", "W07", $tgl),
							'kawil_8' => $this->User_model->get_history_login_index("Kawil 8", "W08", $tgl),
							'kabag_fe' => $this->User_model->get_history_login_index("Kabag FE", "PG2", $tgl),
							'kabag_planting' => $this->User_model->get_history_login_index("Kabag Planting", "PG2", $tgl),
							'kabag_fs' => $this->User_model->get_history_login_index("Kabag FS", "PG2", $tgl),
							'kabag_pm' => $this->User_model->get_history_login_index("Kabag PM", "PG2", $tgl),
							'kabag_qc' => $this->User_model->get_history_login_index("Kabag QC", "PG2", $tgl),
							'kabag_gulma' => $this->User_model->get_history_login_index("Kabag Gulma", "PG2", $tgl),
							'kabag_ppo' => $this->User_model->get_history_login_index("Kabag PPO", "PG2", $tgl),
							'kabag_pppp' => $this->User_model->get_history_login_index("Kabag PPPP", "PG2", $tgl)
						);
						$data['PG2_all'] = array(
							'sn_manager' => $this->User_model->get_history_login_all_index("Sub Div Head", "PG2", $tgl),
							'ppic_manager' => $this->User_model->get_history_login_all_index("Dept Head PPIC", "PG2", $tgl),
							'fs_manager' => $this->User_model->get_history_login_all_index("Dept Head FS", "PG2", $tgl),
							'kawil_5' => $this->User_model->get_history_login_all_index("Kawil 5", "W05", $tgl),
							'kawil_6' => $this->User_model->get_history_login_all_index("Kawil 6", "W06", $tgl),
							'kawil_7' => $this->User_model->get_history_login_all_index("Kawil 7", "W07", $tgl),
							'kawil_8' => $this->User_model->get_history_login_all_index("Kawil 8", "W08", $tgl),
							'kabag_fe' => $this->User_model->get_history_login_all_index("Kabag FE", "PG2", $tgl),
							'kabag_planting' => $this->User_model->get_history_login_all_index("Kabag Planting", "PG2", $tgl),
							'kabag_fs' => $this->User_model->get_history_login_all_index("Kabag FS", "PG2", $tgl),
							'kabag_pm' => $this->User_model->get_history_login_all_index("Kabag PM", "PG2", $tgl),
							'kabag_qc' => $this->User_model->get_history_login_all_index("Kabag QC", "PG2", $tgl),
							'kabag_gulma' => $this->User_model->get_history_login_all_index("Kabag Gulma", "PG2", $tgl),
							'kabag_ppo' => $this->User_model->get_history_login_all_index("Kabag PPO", "PG2", $tgl),
							'kabag_pppp' => $this->User_model->get_history_login_all_index("Kabag PPPP", "PG2", $tgl)
						);
					break;
					case 'PG3':
						$data['PG3'] = array(
							'sn_manager' => $this->User_model->get_history_login_index("Sub Div Head", "PG3", $tgl),
							'ppic_manager' => $this->User_model->get_history_login_index("Dept Head PPIC", "PG3", $tgl),
							'fs_manager' => $this->User_model->get_history_login_index("Dept Head FS", "PG3", $tgl),
							'kawil_9' => $this->User_model->get_history_login_index("Kawil 9", "W09", $tgl),
							'kawil_11' => $this->User_model->get_history_login_index("Kawil 11", "W11", $tgl),
							'kawil_12' => $this->User_model->get_history_login_index("Kawil 12", "W12", $tgl),
							'kawil_13' => $this->User_model->get_history_login_index("Kawil 13", "W13", $tgl),
							'kawil_14' => $this->User_model->get_history_login_index("Kawil 14", "W14", $tgl),
							'kabag_fe' => $this->User_model->get_history_login_index("Kabag FE", "PG3", $tgl),
							'kabag_planting' => $this->User_model->get_history_login_index("Kabag Planting", "PG3", $tgl),
							'kabag_fs' => $this->User_model->get_history_login_index("Kabag FS", "PG3", $tgl),
							'kabag_pm' => $this->User_model->get_history_login_index("Kabag PM", "PG3", $tgl),
							'kabag_qc' => $this->User_model->get_history_login_index("Kabag QC", "PG3", $tgl),
							'kabag_gulma' => $this->User_model->get_history_login_index("Kabag Gulma", "PG3", $tgl),
							'kabag_ppo' => $this->User_model->get_history_login_index("Kabag PPO", "PG3", $tgl),
							'kabag_pppp' => $this->User_model->get_history_login_index("Kabag PPPP", "PG3", $tgl)
						);
						$data['PG3_all'] = array(
							'sn_manager' => $this->User_model->get_history_login_all_index("Sub Div Head", "PG3", $tgl),
							'ppic_manager' => $this->User_model->get_history_login_all_index("Dept Head PPIC", "PG3", $tgl),
							'fs_manager' => $this->User_model->get_history_login_all_index("Dept Head FS", "PG3", $tgl),
							'kawil_9' => $this->User_model->get_history_login_all_index("Kawil 9", "W09", $tgl),
							'kawil_11' => $this->User_model->get_history_login_all_index("Kawil 11", "W11", $tgl),
							'kawil_12' => $this->User_model->get_history_login_all_index("Kawil 12", "W12", $tgl),
							'kawil_13' => $this->User_model->get_history_login_all_index("Kawil 13", "W13", $tgl),
							'kawil_14' => $this->User_model->get_history_login_all_index("Kawil 14", "W14", $tgl),
							'kabag_fe' => $this->User_model->get_history_login_all_index("Kabag FE", "PG3", $tgl),
							'kabag_planting' => $this->User_model->get_history_login_all_index("Kabag Planting", "PG3", $tgl),
							'kabag_fs' => $this->User_model->get_history_login_all_index("Kabag FS", "PG3", $tgl),
							'kabag_pm' => $this->User_model->get_history_login_all_index("Kabag PM", "PG3", $tgl),
							'kabag_qc' => $this->User_model->get_history_login_all_index("Kabag QC", "PG3", $tgl),
							'kabag_gulma' => $this->User_model->get_history_login_all_index("Kabag Gulma", "PG3", $tgl),
							'kabag_ppo' => $this->User_model->get_history_login_all_index("Kabag PPO", "PG3", $tgl),
							'kabag_pppp' => $this->User_model->get_history_login_all_index("Kabag PPPP", "PG3", $tgl)
						);
					break;
				}
			}

			// echo "<pre>";
			// var_dump($data["PG1_all"]);
			// var_dump($data["PG2_all"]);
			// var_dump($data["PG3_all"]);
			// echo "</pre>";
			// die();

			$this->load->view('include/header');
			$this->load->view('raport/history_login', $data);
			$this->load->view('include/footer');
		}
		else{
			header( "Location: /PIS" );
		}
	}

	function simulasi(){
		session_start();
		if(isset($_SESSION['username'])){
			$lokasi = $this->input->get('lokasi');
			$data["lokasi"] = $this->Lokasi_model->get_lokasi_code($lokasi);

			$data["element_cost"] = $this->ElementCost_model->get_element_cost_all();
			$data["target"] = $this->Target_model->get_target_lokasi($data["lokasi"]["status"]);
			$data["konstanta"] = $this->Konstanta_model->get_konstanta_code("TGL_TARIK_DATA");
			$data["standart_panen"] = array(
				'B' => $this->Produksi_model->get_standart_produksi_code('B'),
				'S' => $this->Produksi_model->get_standart_produksi_code('S'),
				'K' => $this->Produksi_model->get_standart_produksi_code('K')
			);
			$data["produksi"] = $this->Produksi_model->get_produksi_code($lokasi, substr($data["lokasi"]["status"],0,4));
			if($data["produksi"] == NULL){
				$data["produksi"] = $this->Produksi_model->get_produksi_t1_code($lokasi, substr($data["lokasi"]["status"],0,4));
			}
			$data['tgl_irrigation'] = array(
				'start' => $this->Konstanta_model->get_konstanta_code('TGL_TARIK_DATA'),
				'finish' => $this->Konstanta_model->get_konstanta_code('TGL_IRRIGATION_FINISH')
			);
			$data['tgl_irrigation_t1'] = array(
				'start' => $this->Konstanta_model->get_konstanta_code('TGL_IRRIGATION_START_T1'),
				'finish' => $this->Konstanta_model->get_konstanta_code('TGL_IRRIGATION_FINISH_T1')
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
		  if($data['produksi'] == NULL){
		    if($data['lokasi']['tgl_panen_rencana'] != NULL){
		      $tgl_panen = $data['lokasi']['tgl_panen_rencana'];
		    }
		    else{
					if($data["lokasi"]["tgl_mulai_rawat"] != NULL){
			      if(substr($data['lokasi']['status'], 0, 4) != 'NSSC'){
			        $tgl_panen = strtotime($data["lokasi"]["tgl_mulai_rawat"]) + $data['standart_panen'][substr($data['lokasi']['bibit'], 6, 1)]['bulan'] * 30.4583333333333 * 86400;
			      }
			      else{
			        $tgl_panen = strtotime($data["lokasi"]["tgl_mulai_rawat"]) + 13 * 30.5 * 86400;
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
			$data["forecast_overhead"] = array(
				'ZN04' => $this->ForecastOverhead_model->get_forecast_overhead_code("ZN04", substr($data["lokasi"]["status"], 0, 4), date('n', strtotime($tgl_panen))),
				'ZN05' => $this->ForecastOverhead_model->get_forecast_overhead_code("ZN05", substr($data["lokasi"]["status"], 0, 4), date('n', strtotime($tgl_panen))),
				'ZN06' => $this->ForecastOverhead_model->get_forecast_overhead_code("ZN06", substr($data["lokasi"]["status"], 0, 4), date('n', strtotime($tgl_panen))),
				'ZN10' => $this->ForecastOverhead_model->get_forecast_overhead_code("ZN10", substr($data["lokasi"]["status"], 0, 4), date('n', strtotime($tgl_panen))),
				'ZN13' => $this->ForecastOverhead_model->get_forecast_overhead_code("ZN13", substr($data["lokasi"]["status"], 0, 4), date('n', strtotime($tgl_panen)))
			);
			$data["tonase_panen"] = array(
				'alami' => $this->TonasePanen_model->get_tonase_panen_code($lokasi, "Alami", $data["lokasi"]["kebun"]),
				'manual' => $this->TonasePanen_model->get_tonase_panen_code($lokasi, "Manual", $data["lokasi"]["kebun"]),
				'reguler' => $this->TonasePanen_model->get_tonase_panen_code($lokasi, "Reguler", $data["lokasi"]["kebun"])
			);
			$data['koreksi'] = $this->Koreksi_model->get_koreksi_code($lokasi);
			if(substr($data["lokasi"]["status"], 2, 2) == 'FC'){
				$data['kelas'] = substr($data["lokasi"]['bibit'],6,1);
			}

			// echo "<pre>";
			// var_dump($data["produksi"]);
			// echo "</pre>";
			// die();

			$this->load->view('include/header');
			$this->load->view('raport/simulasi', $data);
			$this->load->view('include/footer');
		}
		else{
			header( "Location: /PIS" );
		}
	}
}
