<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workshop extends CI_Controller {

	function __construct()
	{
		parent :: __construct();
		$this->load->model('User_model');
		$this->load->model('Workshop_model');
	}

	public function index()
	{
		session_start();
		if(isset($_SESSION['username'])){
			$this->User_model->reload_history_login($_SESSION['index']);
			$data['account'] = $this->User_model->get_user_index($_SESSION['index']);
			if($data['account']['crud'] == 3){
				$performance_pg = $this->Workshop_model->get_performance_pg("Kawil");
				foreach($performance_pg as $ppg) {
					if($ppg->jabatan == $data['account']['deskripsi']){
						$data['performance'] = array(
							'pg' => $ppg->pg,
							'jabatan' => $ppg->jabatan,
							'total_performance' => $ppg->total_performance,
							'quantity_performance' => $ppg->quantity_performance,
							'quality_performance' => $ppg->quality_performance,
							'cost_performance' => $ppg->cost_performance,
							'mutu_performance' => $ppg->mutu_performance,
							'juara' => $ppg->juara
						);
					}
				}
			}
			else if($data['account']['crud'] == 2 || $data['account']['crud'] == 4){
				$data['performance_total'] = $this->Workshop_model->get_performance_total_pg();
				$data['per_jabatan'] = $this->Workshop_model->get_jabatan();
				$performance_pg = $this->Workshop_model->get_performance_pg($data['account']['deskripsi']);
				foreach($performance_pg as $ppg) {
					if($ppg->pg == $data['account']['code']){
						$data['performance'] = array(
							'pg' => $ppg->pg,
							'jabatan' => $ppg->jabatan,
							'total_performance' => $ppg->total_performance,
							'quantity_performance' => $ppg->quantity_performance,
							'quality_performance' => $ppg->quality_performance,
							'cost_performance' => $ppg->cost_performance,
							'mutu_performance' => $ppg->mutu_performance,
							'juara' => $ppg->juara
						);
					}
				}
			}
			else if($data['account']['crud'] == 0){
				$data['performance_total'] = $this->Workshop_model->get_performance_total_pg();
				$data['per_jabatan'] = $this->Workshop_model->get_jabatan();
			}
			else{
				header( "Location: /PIS" );
			}
			// echo "<pre>";
			// var_dump($data['performance']);
			// echo "</pre>";
			// die();

			$this->load->view('include/header');
			$this->load->view('cek_pemenang', $data);
			$this->load->view('include/footer');
		}
		else{
			header( "Location: /PIS" );
		}
	}

	function detil_performance(){
		session_start();
		if(isset($_SESSION['username'])){
			$this->User_model->reload_history_login($_SESSION['index']);
			$data['account'] = $this->User_model->get_user_index($_SESSION['index']);
			$data['per_jabatan'] = $this->Workshop_model->get_jabatan();
		  if($data['account']['crud'] == 0 || ($data['account']['crud'] == 2 && $data['account']['deskripsi'] == 'Sub Div Head')){
				$jabatan = $this->Workshop_model->get_jabatan_urutan($this->input->get('jabatan'));
				if(isset($jabatan['jabatan'])){
					$data['jabatan'] = $jabatan['jabatan'];
					$data['urutan'] = $this->input->get('jabatan');
				}
				else{
					$data['jabatan'] = "Sub Div Head";
					$data['urutan'] = 1;
				}
			}
			else if($data['account']['crud'] == 3){
				$jabatan = $this->Workshop_model->get_jabatan_jabatan('Kawil');
				$data['jabatan'] = "Kawil";
				$data['urutan'] = $jabatan['urutan'];
			}
			else{
				$jabatan = $this->Workshop_model->get_jabatan_jabatan($data['account']['deskripsi']);
				$data['jabatan'] = $data['account']['deskripsi'];
				$data['urutan'] = $jabatan['urutan'];
			}

			switch ($data['urutan']) {
				case '1':
					$data['performance'] = array(
						'quantity' => array(
							'yield_nsfc' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Yield NSFC'),
							'yield_nssc' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Yield NSSC'),
							'tonnage' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Tonnage'),
							'planting_area' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Planting Area')
						),
						'quality' => array(
							'big_fruit' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Big Fruit'),
							'reject_fruit' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Reject Fruit'),
							'rc_pc' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'RC/PC')
						),
						'cost' => array(
							'nsfc_ha' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Cost', 'NSFC Ha'),
							'nsfc_kg' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Cost', 'NSFC Kg'),
							'nssc_ha' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Cost', 'NSSC Ha'),
							'nssc_kg' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Cost', 'NSSC Kg'),
							'poor_quality' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Cost', 'Poor Quality')
						),
						'mutu' => array(
							'5r' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', '5R'),
							'ssk' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'SSK'),
							'akk' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'AKK'),
							'six_sigma' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'Six Sigma'),
							'afr' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'AFR'),
							'asr' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'ASR')
						),
						'total' => array(
							'pg1' => $this->Workshop_model->get_performance_jabatan($data['jabatan'], 'PG1'),
							'pg2' => $this->Workshop_model->get_performance_jabatan($data['jabatan'], 'PG2'),
							'pg3' => $this->Workshop_model->get_performance_jabatan($data['jabatan'], 'PG3')
						)
					);
				break;
				case '2':
					$data['performance'] = array(
						'quantity' => array(
							'yield_nsfc' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Yield NSFC'),
							'yield_nssc' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Yield NSSC'),
							'fertilizer_program' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Fertilizer Program'),
							'land_preparation' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Land Preparation'),
							'boom_spraying' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Boom Spraying'),
							'forcing_area' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Forcing Area')
						),
						'quality' => array(
							'big_fruit' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Big Fruit'),
							'reject_fruit' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Reject Fruit'),
							'irrigation_unit_available' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Irrigation Unit Available')
						),
						'cost' => array(
							'land_preparation' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Cost', 'Land Preparation'),
							'planting' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Cost', 'Planting'),
							'fertilization' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Cost', 'Fertilization'),
							'weeding' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Cost', 'Weeding'),
							'irrigation' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Cost', 'Irrigation'),
							'harvesting' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Cost', 'Harvesting'),
							'poor_quality' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Cost', 'Poor Quality')
						),
						'mutu' => array(
							'5r' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', '5R'),
							'ssk' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'SSK'),
							'akk' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'AKK'),
							'six_sigma' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'Six Sigma'),
							'afr' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'AFR'),
							'asr' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'ASR')
						),
						'total' => array(
							'pg1' => $this->Workshop_model->get_performance_jabatan($data['jabatan'], 'PG1'),
							'pg2' => $this->Workshop_model->get_performance_jabatan($data['jabatan'], 'PG2'),
							'pg3' => $this->Workshop_model->get_performance_jabatan($data['jabatan'], 'PG3')
						)
					);
				break;
				case '3':
					$data['performance'] = array(
						'quantity' => array(
							'yield_nsfc' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Yield NSFC'),
							'yield_nssc' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Yield NSSC'),
							'fertilizer_program' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Fertilizer Program'),
							'pineapple_stem' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Pineapple Stem'),
							'rc' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', '% RC')
						),
						'quality' => array(
							'big_fruit' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Big Fruit'),
							'reject_fruit' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Reject Fruit'),
							'planting_area_acc' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Planting Area Acc'),
							'tonnage_acc' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Tonnage Acc'),
							'material_plan_acc' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Material Plan Acc'),
							'land_preparation_acc' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Land Preparation Acc')
						),
						'cost' => array(
							'land_preparation' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Cost', 'Land Preparation'),
							'planting' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Cost', 'Planting'),
							'fertilization' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Cost', 'Fertilization'),
							'weeding' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Cost', 'Weeding'),
							'irrigation' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Cost', 'Irrigation'),
							'harvesting' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Cost', 'Harvesting'),
							'poor_quality' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Cost', 'Poor Quality'),
							'capex' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Cost', 'Capex'),
							'opex' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Cost', 'Opex')
						),
						'mutu' => array(
							'5r' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', '5R'),
							'ssk' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'SSK'),
							'akk' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'AKK'),
							'six_sigma' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'Six Sigma'),
							'afr' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'AFR'),
							'asr' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'ASR')
						),
						'total' => array(
							'pg1' => $this->Workshop_model->get_performance_jabatan($data['jabatan'], 'PG1'),
							'pg2' => $this->Workshop_model->get_performance_jabatan($data['jabatan'], 'PG2'),
							'pg3' => $this->Workshop_model->get_performance_jabatan($data['jabatan'], 'PG3')
						)
					);
				break;
				case '4':
					$data['performance'] = array(
						'quantity' => array(

						),
						'quality' => array(

						),
						'cost' => array(

						),
						'mutu' => array(

						),
						'total' => array(

						)
					);
				break;
				case '5':
					$data['performance'] = array(
						'quantity' => array(
							'chopper' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Chopper'),
							'bajak' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Bajak'),
							'jalan_saluran' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Jalan & Saluran'),
							'labor_index' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Labor Index')
						),
						'quality' => array(
							'chopper' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Chopper'),
							'bajak' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Bajak'),
							'jalan_saluran' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Jalan & Saluran'),
							'tertib_pecah_gabung' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Tertib Pecah Gabung')
						),
						'cost' => array(
							'land_prep_hpp' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Cost', 'Land Prep (HPP)'),
							'land_prep_wip' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Cost', 'Land Prep (WIP)')
						),
						'mutu' => array(
							'ssk' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'SSK'),
							'akk' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'AKK'),
							'afr' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'AFR'),
							'asr' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'ASR')
						),
						'total' => array(
							'pg1' => $this->Workshop_model->get_performance_jabatan($data['jabatan'], 'PG1'),
							'pg2' => $this->Workshop_model->get_performance_jabatan($data['jabatan'], 'PG2'),
							'pg3' => $this->Workshop_model->get_performance_jabatan($data['jabatan'], 'PG3')
						)
					);
				break;
				case '6':
					$data['performance'] = array(
						'quantity' => array(
							'tanam_kls_besar' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Tanam Kls Besar'),
							'tanam_kls_sedang' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Tanam Kls Sedang'),
							'tanam_kls_kecil' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Tanam Kls Kecil'),
							'seed_availiablity' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Seed Availiablity'),
							'labor_index' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Labor Index')
						),
						'quality' => array(
							'planting' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Planting'),
							'plant_repair' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Plant Repair'),
							'seed' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Seed'),
							'balance_seed' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Balance Seed')
						),
						'cost' => array(
							'planting_hpp' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Cost', 'Planting (HPP)'),
							'planting_wip' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Cost', 'Planting (WIP)')
						),
						'mutu' => array(
							'ssk' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'SSK'),
							'akk' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'AKK'),
							'afr' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'AFR'),
							'asr' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'ASR')
						),
						'total' => array(
							'pg1' => $this->Workshop_model->get_performance_jabatan($data['jabatan'], 'PG1'),
							'pg2' => $this->Workshop_model->get_performance_jabatan($data['jabatan'], 'PG2'),
							'pg3' => $this->Workshop_model->get_performance_jabatan($data['jabatan'], 'PG3')
						)
					);
				break;
				case '7':
					$data['performance'] = array(
						'quantity' => array(
							'pre_emergency' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Pre Emergency'),
							'post_emergency' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Post Emergency'),
							'booster' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Booster'),
							'labor_index' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Labor Index')
						),
						'quality' => array(
							'sanitation' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Sanitation')
						),
						'cost' => array(
							'weed_control_hpp' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Cost', 'Weed Control (HPP)'),
							'weed_control_wip' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Cost', 'Weed Control (WIP)')
						),
						'mutu' => array(
							'ssk' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'SSK'),
							'akk' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'AKK'),
							'afr' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'AFR'),
							'asr' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'ASR')
						),
						'total' => array(
							'pg1' => $this->Workshop_model->get_performance_jabatan($data['jabatan'], 'PG1'),
							'pg2' => $this->Workshop_model->get_performance_jabatan($data['jabatan'], 'PG2'),
							'pg3' => $this->Workshop_model->get_performance_jabatan($data['jabatan'], 'PG3')
						)
					);
				break;
				case '8':
					$data['performance'] = array(
						'quantity' => array(
							'reguler_spray' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Reguler Spray'),
							'forcing_spray' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Forcing Spray'),
							'aplikasi_hpt' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Aplikasi HPT'),
							'aplikasi_pupuk' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Aplikasi Pupuk'),
							'labor_index' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Labor Index')
						),
						'quality' => array(
							'flowering' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', '% Flowering'),
							'analisa_unsur' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Analisa Unsur'),
							'pengendalian_hpt' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Pengendalian HPT'),
							'golden_time_application' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Golden Time Application')
						),
						'cost' => array(
							'fertilization_hpp' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Cost', 'Fertilization (HPP)'),
							'fertilization_wip' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Cost', 'Fertilization (WIP)')
						),
						'mutu' => array(
							'ssk' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'SSK'),
							'akk' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'AKK'),
							'afr' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'AFR'),
							'asr' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'ASR')
						),
						'total' => array(
							'pg1' => $this->Workshop_model->get_performance_jabatan($data['jabatan'], 'PG1'),
							'pg2' => $this->Workshop_model->get_performance_jabatan($data['jabatan'], 'PG2'),
							'pg3' => $this->Workshop_model->get_performance_jabatan($data['jabatan'], 'PG3')
						)
					);
				break;
				case '9':
					$data['performance'] = array(
						'quantity' => array(
							'availiablity_unt_irigasi' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Availiablity Unt Irigasi'),
							'availiablity_unt_traktor' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Availiablity Unt Traktor'),
							'coverage_irigasi' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Coverage Irigasi')
						),
						'quality' => array(
							'utilization_unt_irigasi' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Utilization Unt Irigasi'),
							'utilization_unt_traktor' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Utilization Unt Traktor')
						),
						'cost' => array(
							'ohc_field_support' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Cost', 'OHC Field Support'),
							'irrigation_hpp' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Cost', 'Irrigation (HPP)')
						),
						'mutu' => array(
							'ssk' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'SSK'),
							'akk' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'AKK'),
							'afr' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'AFR'),
							'asr' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'ASR')
						),
						'total' => array(
							'pg1' => $this->Workshop_model->get_performance_jabatan($data['jabatan'], 'PG1'),
							'pg2' => $this->Workshop_model->get_performance_jabatan($data['jabatan'], 'PG2'),
							'pg3' => $this->Workshop_model->get_performance_jabatan($data['jabatan'], 'PG3')
						)
					);
				break;
				case '10':
					$data['performance'] = array(
						'quantity' => array(
							'inspeksi' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Inspeksi'),
							'pengamatan' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Pengamatan'),
							'labor_test' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Labor Test')
						),
						'quality' => array(
							'land_preparation' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Land Preparation'),
							'seed' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Seed'),
							'planting' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Planting'),
							'plant_maintenance' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Plant Maintenance')
						),
						'cost' => array(
							'observation_hpp' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Cost', 'Observation (HPP)'),
							'observation_wip' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Cost', 'Observation (WIP)')
						),
						'mutu' => array(
							'ssk' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'SSK'),
							'akk' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'AKK'),
							'afr' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'AFR'),
							'asr' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'ASR')
						),
						'total' => array(
							'pg1' => $this->Workshop_model->get_performance_jabatan($data['jabatan'], 'PG1'),
							'pg2' => $this->Workshop_model->get_performance_jabatan($data['jabatan'], 'PG2'),
							'pg3' => $this->Workshop_model->get_performance_jabatan($data['jabatan'], 'PG3')
						)
					);
				break;
				case '11':
					$data['performance'] = array(
						'quantity' => array(
							'rc' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', '% RC'),
							'pineapple_stem' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Pineapple Stem')
						),
						'quality' => array(
							'land_preparation' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Land Preparation'),
							'planting' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Planting'),
							'fertilization' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Fertilization'),
							'hpt' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'HPT'),
							'weed' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Weed'),
							'material' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Material')
						),
						'cost' => array(
							'direct_cost_nsfc' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Cost', 'Direct Cost (NSFC)'),
							'direct_cost_nssc' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Cost', 'Direct Cost (NSSC)')
						),
						'mutu' => array(
							'ssk' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'SSK'),
							'akk' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'AKK'),
							'afr' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'AFR'),
							'asr' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'ASR')
						),
						'total' => array(
							'pg1' => $this->Workshop_model->get_performance_jabatan($data['jabatan'], 'PG1'),
							'pg2' => $this->Workshop_model->get_performance_jabatan($data['jabatan'], 'PG2'),
							'pg3' => $this->Workshop_model->get_performance_jabatan($data['jabatan'], 'PG3')
						)
					);
				break;
				case '12':
					$data['performance'] = array(
						'quantity' => array(
							'reporting_adm' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Reporting & Adm'),
							'plant_weight' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Plant Weight'),
							'pengamatan' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', '% Pengamatan'),
							'labor_test' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', 'Labor Test'),
							'rc' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quantity', '% RC')
						),
						'quality' => array(
							'toonage_accuracy' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Toonage % Accuracy'),
							'closing_spk_h+3' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Closing SPK H+3'),
							'spk_cancel' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'SPK Cancel'),
							'zero_vslock' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Zero Vslock'),
							'tertib_pecah_gabung' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Quality', 'Tertib Pecah Gabung')
						),
						'cost' => array(
							'capex' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Cost', 'Capex'),
							'opex' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Cost', 'Opex')
						),
						'mutu' => array(
							'ssk' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'SSK'),
							'akk' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'AKK'),
							'afr' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'AFR'),
							'asr' => $this->Workshop_model->get_poin_jabatan_detil($data['jabatan'], 'Mutu', 'ASR')
						),
						'total' => array(
							'pg1' => $this->Workshop_model->get_performance_jabatan($data['jabatan'], 'PG1'),
							'pg2' => $this->Workshop_model->get_performance_jabatan($data['jabatan'], 'PG2'),
							'pg3' => $this->Workshop_model->get_performance_jabatan($data['jabatan'], 'PG3')
						)
					);
				break;
			}
			// echo "<pre>";
			// var_dump($data['performance']);
			// echo "</pre>";
			// die();

			$this->load->view('include/header');
			$this->load->view('detil_performance_'.$data['urutan'], $data);
			$this->load->view('include/footer');
		}
		else{
			header( "Location: /PIS" );
		}
	}
}
