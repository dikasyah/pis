<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WIP_PM_Dashboard extends CI_Controller {

	function __construct(){
		parent :: __construct();

		$this->load->model('User_model');
		$this->load->model('Konstanta_model');
		$this->load->model('Coordinate_model');
		$this->load->model('Performance_model');
		$this->load->model('PlantationGroup_model');
		$this->load->model('Wilayah_model');
		$this->load->model('Material_model');
		$this->load->model('Raport_model');
		$this->load->model('Lokasi_model');
		$this->load->model('ElementCost_model');
		$this->load->model('GroupCost_model');
		$this->load->model('BeratTanaman_model');
		$this->load->model('StdUnsurUmur_model');
		$this->load->model('Fertilization_model');
		$this->load->model('WeedControl_model');
		$this->load->model('PlantPestControl_model');
		$this->load->model('TonasePanen_model');
		$this->load->model('Forcing_model');
		$this->load->model('Activity_model');
		$this->load->model('VolumeAir_model');
		$this->load->model('PerlocationPM_model');
		$this->load->model('PerlocationPM2_model');
		$this->load->model('PerlocationPM3_model');
		$this->load->model('PerlocationPM4_model');
		$this->load->model('Irrigation_model');
		$this->load->model('Iklim_model');
		$this->load->model('PengamatanPersenBunga_model');
	}

	public function index()
	{
		session_start();
		if(isset($_SESSION['username'])){
			$data['account'] = $this->User_model->get_user_index($_SESSION['index']);
			$data["konstanta"] = $this->Konstanta_model->get_konstanta_code("TGL_TARIK_DATA");
			$data["YEAR_BASE"] = $this->Konstanta_model->get_konstanta_code("YEAR_BASE");

			$data['status'] = $this->input->get('status');
			$data['jenis'] = $this->input->get('jenis');
			$data['kelas'] = $this->input->get('kelas');
			$data['tahun'] = $this->input->get('tahun');
			$data['bulan'] = $this->input->get('bulan');
			$data['umur'] = $this->input->get('umur');

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
				$data['tahun'] = date('Y', strtotime($data["YEAR_BASE"]['nilai']));
			}
			if($data['bulan'] == NULL){
				$data['bulan'] = 'Total';
			}
			if($data['umur'] == NULL){
				$data['umur'] = 'Total';
			}

			$data['coordinate'] = array(
				'PG1' => $this->Coordinate_model->get_coordinate_pm('PG1', $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']),
				'PG2' => $this->Coordinate_model->get_coordinate_pm('PG2', $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']),
				'PG3' => $this->Coordinate_model->get_coordinate_pm('PG3', $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'])
			);
			$data['coordinate_center'] = array(
				'PG1' => $this->Coordinate_model->get_coordinate_pg_center('PG1'),
				'PG2' => $this->Coordinate_model->get_coordinate_pg_center('PG2'),
				'PG3' => $this->Coordinate_model->get_coordinate_pg_center('PG3')
			);
			$data['performance']['PG1'] = $this->PerlocationPM_model->get_performance_wip_pm('PG1', $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
			$data['performance']['PG2'] = $this->PerlocationPM_model->get_performance_wip_pm('PG2', $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
			$data['performance']['PG3'] = $this->PerlocationPM_model->get_performance_wip_pm('PG3', $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);

			$this->load->view('WIP_PM/include/header');
			$this->load->view('WIP_PM/dashboard', $data);
			$this->load->view('WIP_PM/include/footer');
		}
		else{
			header( "Location: /PIS/index.php/dashboard" );
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

			$data['status'] = $this->input->get('status');
			$data['jenis'] = $this->input->get('jenis');
			$data['kelas'] = $this->input->get('kelas');
			$data['tahun'] = $this->input->get('tahun');
			$data['bulan'] = $this->input->get('bulan');
			$data['umur'] = $this->input->get('umur');

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
				$data['tahun'] = date('Y', strtotime($data["YEAR_BASE"]['nilai']));
			}
			if($data['bulan'] == NULL){
				$data['bulan'] = 'Total';
			}
			if($data['umur'] == NULL){
				$data['umur'] = 'Total';
			}
			$data['luas_tonase'] = $this->PlantationGroup_model->get_luas_tonase_pg($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);

			$data['performance'] = $this->PerlocationPM_model->get_performance_wip_pm($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
			$data['coordinate'] = $this->Coordinate_model->get_coordinate_pm($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
			$data['coordinate_center'] = $this->Coordinate_model->get_coordinate_pg_center($data['pg']);

			$data['satuan_material'] = $this->StdUnsurUmur_model->get_satuan_metarial();

			$this->load->view('WIP_PM/include/header');
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
					$data["element_cost_all"] = $this->ElementCost_model->get_element_cost_pm();

					$data['wip'] = $this->PerlocationPM_model->get_wip_cost_pm($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
					$data['hpp'] = $this->PerlocationPM_model->get_hpp_cost_pm($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);

					$data['gorup_cost_total'] = $this->PerlocationPM_model->get_group_cost_pm($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
					$data['trend_cost'] = $this->PerlocationPM_model->get_trend_cost_pm($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['group_cost']);
					$data['akurasi_forcing'] = $this->PerlocationPM_model->get_akurasi_forcing_pm($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['group_cost']);

					$data["SBTCostTotal"] = $this->PerlocationPM4_model->get_sbt_cost_real_total($data['status'], $data['tahun']);
					$data["SBTCost"] = $this->PerlocationPM3_model->get_sbt_cost_real($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);

					$this->load->view('WIP_PM/plantation_group', $data);
				break;
				//BK
				case 'BK':
					$data['StatusBK'] = $this->input->get("status_bk");
					$data['QualityBK'] = $this->input->get("qbk");
					$data['ActivityBK'] = $this->input->get("activity_bk");
					if($data['StatusBK'] == NULL){
						$data['StatusBK'] = 'Total';
					}
					if($data['QualityBK'] == NULL){
						$data['QualityBK'] = 'Average';
					}
					if($data['ActivityBK'] == NULL){
						$data['ActivityBK'] = 'Chopper_1';
					}

					$QualityPBK = $this->PerlocationPM3_model->get_quality_bk($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['StatusBK']);
					if($data['QualityBK'] == 'Average'){
							$data["QualityPBK"]["Chopper"]["Q"] = 0;
							$data["QualityPBK"]["Chopper"]["T"] = 0;
							$data["QualityPBK"]["Bajak"]["Q"] = 0;
							$data["QualityPBK"]["Bajak"]["T"] = 0;
							$data["QualityPBK"]["FinishingHarrow"]["Q"] = 0;
							$data["QualityPBK"]["FinishingHarrow"]["T"] = 0;
							$data["QualityPBK"]["Ridger"]["Q"] = 0;
							$data["QualityPBK"]["Ridger"]["T"] = 0;
							$data["QualityPBK"]["JalanSaluran"]["Q"] = 0;
							$data["QualityPBK"]["JalanSaluran"]["T"] = 0;
						foreach ($QualityPBK as $QPBK) {
							if($QPBK->Chopper != NULL){
								$data["QualityPBK"]["Chopper"]["Q"] += $QPBK->Chopper;
								$data["QualityPBK"]["Chopper"]["T"]++;
							}
							if($QPBK->Bajak != NULL){
								$data["QualityPBK"]["Bajak"]["Q"] += $QPBK->Bajak;
								$data["QualityPBK"]["Bajak"]["T"]++;
							}
							if($QPBK->FinishingHarrow != NULL){
								$data["QualityPBK"]["FinishingHarrow"]["Q"] += $QPBK->FinishingHarrow;
								$data["QualityPBK"]["FinishingHarrow"]["T"]++;
							}
							if($QPBK->Ridger != NULL){
								$data["QualityPBK"]["Ridger"]["Q"] += $QPBK->Ridger;
								$data["QualityPBK"]["Ridger"]["T"]++;
							}
							if($QPBK->JalanSaluran != NULL){
								$data["QualityPBK"]["JalanSaluran"]["Q"] += $QPBK->JalanSaluran;
								$data["QualityPBK"]["JalanSaluran"]["T"]++;
							}
						}
					}
					else{
						$data["QualityPBK"] = $QualityPBK;
					}

					$data["TQualityPBK"]["TChopper"] = 0;
					$data["TQualityPBK"]["TBajak"] = 0;
					$data["TQualityPBK"]["TFinishingHarrow"] = 0;
					$data["TQualityPBK"]["TRidger"] = 0;
					$data["TQualityPBK"]["TJalanSaluran"] = 0;
					$data["TQualityPBK"]["Total"] = 0;
					foreach ($QualityPBK as $QPBK) {
						if($QPBK->Chopper != NULL){
							$data["TQualityPBK"]["TChopper"]++;
						}
						if($QPBK->Bajak != NULL){
							$data["TQualityPBK"]["TBajak"]++;
						}
						if($QPBK->FinishingHarrow != NULL){
							$data["TQualityPBK"]["TFinishingHarrow"]++;
						}
						if($QPBK->Ridger != NULL){
							$data["TQualityPBK"]["TRidger"]++;
						}
						if($QPBK->JalanSaluran != NULL){
							$data["TQualityPBK"]["TJalanSaluran"]++;
						}
						$data["TQualityPBK"]["Total"]++;
					}

					$data["TimelineBK"] = $this->PerlocationPM4_model->get_timeline_bk($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['StatusBK']);

					$data["STDQBKST"] = $this->PerlocationPM3_model->get_std_pengamatan_BKST();
					$data["ProportionLuasBK"] = $this->PerlocationPM3_model->get_luas_proportion_BK($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);

					$data["CostBK"] = $this->PerlocationPM3_model->get_summary_cost_bk($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['StatusBK']);

					$ExplodeAct = explode("_", $data['ActivityBK']);
					$cek = explode("|", $ExplodeAct[0]);
					if(sizeof($cek) > 1){
						$data['CurrentActivityBK'] = $cek[0]." ".$cek[1];
					}
					else{
						$data['CurrentActivityBK'] = $ExplodeAct[0];
					}
					$data["ActivityPenarik"] = $this->PerlocationPM3_model->get_summary_activity($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['StatusBK'], $ExplodeAct[0], $ExplodeAct[1], "Penarik");
					$data["ActivityImplement"] = $this->PerlocationPM3_model->get_summary_activity($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['StatusBK'], $ExplodeAct[0], $ExplodeAct[1], "Implement");

					$CodeAct = $this->PerlocationPM3_model->get_desc_activity_bk($data['CurrentActivityBK']);
					$IAct = 0;
					foreach($CodeAct as $CA){
						if($IAct == 0){
							$DescAct = "'".$CA->CodeAct."'";
						}
						else{
							$DescAct = ", '".$CA->CodeAct."'";
						}
					}
					$data["STDActivity"] = $this->PerlocationPM3_model->get_std_activity_bk($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $DescAct);
					$data["RealActivity"] = $this->PerlocationPM3_model->get_real_activity_bk($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $ExplodeAct[0], $ExplodeAct[1]);

					$data["element_cost"] = $this->ElementCost_model->get_element_cost_bk();

					$WIP = $this->PerlocationPM4_model->get_summary_cost($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['StatusBK']);
					$CostST = $this->PerlocationPM3_model->get_summary_cost_st($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['StatusBK']);

					$data['HPP']['ZN01S'] = $WIP['ZN01R'] - ($data["CostBK"]['ZN01R'] + $CostST['ZN01R']);
					$data['HPP']['ZN01H'] = ($data["CostBK"]['ZN01R'] / ($data["CostBK"]['ZN01R'] + $CostST['ZN01R'])) * $data['HPP']['ZN01S'];
					$data['HPP']['ZN03S'] = $WIP['ZN03R'] - ($data["CostBK"]['ZN03R'] + $CostST['ZN03R']);
					$data['HPP']['ZN03H'] = ($data["CostBK"]['ZN03R'] / ($data["CostBK"]['ZN03R'] + $CostST['ZN03R'])) * $data['HPP']['ZN03S'];
					$data['HPP']['ZN04S'] = $WIP['ZN04R'] - ($data["CostBK"]['ZN04R'] + $CostST['ZN04R']);
					$data['HPP']['ZN04H'] = ($data["CostBK"]['ZN04R'] / ($data["CostBK"]['ZN04R'] + $CostST['ZN04R'])) * $data['HPP']['ZN04S'];

					$this->load->view('WIP_PM/plantation_group_BK', $data);
				break;
				//DBK
				case 'DBK':
				$data['ActivityBK'] = $this->input->get("activity_bk");
					if($data['ActivityBK'] == NULL){
						$data['ActivityBK'] = 'Total';
					}
					$data["ChargePenarik"] = $this->PerlocationPM4_model->get_charge_bk('Penarik', $data['ActivityBK']);
					$data["ChargeImplement"] = $this->PerlocationPM4_model->get_charge_bk('Implement', $data['ActivityBK']);

					$this->load->view('WIP_PM/plantation_group_DBK', $data);
				break;
				//DEC
				case 'DEC':
					$data['ElementCost'] = $this->input->get("ga");
					$data['JenisStatus'] = $this->input->get("jenis_status");
					$data['Activity'] = $this->input->get("activity");

					$data["ActivityDetail"] = $this->PerlocationPM4_model->get_activity_bkst_detail($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['ElementCost'], $data['JenisStatus']);
					$data["PerActivityDetail"] = $this->PerlocationPM4_model->get_per_activity_bkst_detail($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['ElementCost'], $data['JenisStatus'], $data['Activity']);

					$this->load->view('WIP_PM/plantation_group_DEC', $data);
				break;
				//ST
				case 'ST':
					$data['StatusBK'] = $this->input->get("status_bk");
					if($data['StatusBK'] == NULL){
						$data['StatusBK'] = 'Total';
					}

					$data["STDQBKST"] = $this->PerlocationPM3_model->get_std_pengamatan_BKST();
					$data["ProportionBibitST"] = $this->PerlocationPM4_model->get_propotion_bibit_st($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);

					$data["CostST"] = $this->PerlocationPM3_model->get_summary_cost_st($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);

					$data["element_cost"] = $this->ElementCost_model->get_element_cost_ST();
					$QualityPST = $this->PerlocationPM4_model->get_quality_st($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
					$data["QualityPST"]["ST1"]["Q"] = 0;
					$data["QualityPST"]["ST1"]["T"] = 0;
					$data["QualityPST"]["ST2"]["Q"] = 0;
					$data["QualityPST"]["ST2"]["T"] = 0;
					$data["QualityPST"]["ST3"]["Q"] = 0;
					$data["QualityPST"]["ST3"]["T"] = 0;
					$data["QualityPST"]["ST4"]["Q"] = 0;
					$data["QualityPST"]["ST4"]["T"] = 0;
					foreach ($QualityPST as $QPST) {
						if($QPST->ST1 != NULL && $QPST->ST1 != 0){
							$data["QualityPST"]["ST1"]["Q"] += $QPST->ST1;
							$data["QualityPST"]["ST1"]["T"]++;
						}
						if($QPST->ST2 != NULL && $QPST->ST2 != 0){
							$data["QualityPST"]["ST2"]["Q"] += $QPST->ST2;
							$data["QualityPST"]["ST2"]["T"]++;
						}
						if($QPST->ST3 != NULL && $QPST->ST3 != 0){
							$data["QualityPST"]["ST3"]["Q"] += $QPST->ST3;
							$data["QualityPST"]["ST3"]["T"]++;
						}
						if($QPST->ST4 != NULL && $QPST->ST4 != 0){
							$data["QualityPST"]["ST4"]["Q"] += $QPST->ST4;
							$data["QualityPST"]["ST4"]["T"]++;
						}
					}

					$data["TQualityPST"]["ST1"] = 0;
					$data["TQualityPST"]["ST2"] = 0;
					$data["TQualityPST"]["ST3"] = 0;
					$data["TQualityPST"]["ST4"] = 0;
					$data["TQualityPST"]["Total"] = 0;
					foreach ($QualityPST as $QPST) {
						if($QPST->ST1 != NULL){
							$data["TQualityPST"]["ST1"]++;
						}
						if($QPST->ST2 != NULL){
							$data["TQualityPST"]["ST2"]++;
						}
						if($QPST->ST3 != NULL){
							$data["TQualityPST"]["ST3"]++;
						}
						if($QPST->ST4 != NULL){
							$data["TQualityPST"]["ST4"]++;
						}
						$data["TQualityPST"]["Total"]++;
					}

					$data["FellowPeriod"] = $this->PerlocationPM4_model->get_fellow_periode($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['StatusBK']);

					$WIP = $this->PerlocationPM4_model->get_summary_cost($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['StatusBK']);
					$CostBK = $this->PerlocationPM3_model->get_summary_cost_bk($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['StatusBK']);

					$data['HPP']['ZN01S'] = $WIP['ZN01R'] - ($data["CostST"]['ZN01R'] + $CostBK['ZN01R']);
					$data['HPP']['ZN01H'] = ($data["CostST"]['ZN01R'] / ($data["CostST"]['ZN01R'] + $CostBK['ZN01R'])) * $data['HPP']['ZN01S'];
					$data['HPP']['ZN03S'] = $WIP['ZN03R'] - ($data["CostST"]['ZN03R'] + $CostBK['ZN03R']);
					$data['HPP']['ZN03H'] = ($data["CostST"]['ZN03R'] / ($data["CostST"]['ZN03R'] + $CostBK['ZN03R'])) * $data['HPP']['ZN03S'];
					$data['HPP']['ZN04S'] = $WIP['ZN04R'] - ($data["CostST"]['ZN04R'] + $CostBK['ZN04R']);
					$data['HPP']['ZN04H'] = ($data["CostST"]['ZN04R'] / ($data["CostST"]['ZN04R'] + $CostBK['ZN04R'])) * $data['HPP']['ZN04S'];

					$this->load->view('WIP_PM/plantation_group_ST', $data);
				break;
				//Summary 1
				case 'S1':
					$data['performance_pg'] = $this->PerlocationPM_model->get_performance_wip_pm_pg($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
					$data['trend_cost'] = $this->PerlocationPM_model->get_trend_cost_pm($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Total');
					$data['cost_real'] = array(
						'Expensive' => $this->Performance_model->get_performance_wip_pm_cost($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Expensive'),
						'Chippest' => $this->Performance_model->get_performance_wip_pm_cost($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Chippest')
					);

					$this->load->view('WIP_PM/plantation_group_S1', $data);
				break;
				//Summary 2
				case 'S2':
					$data['proporsi_ratun'] = $this->PlantationGroup_model->get_proporsi_ratun_pg($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
					$data['umur_lokasi'] = $this->PlantationGroup_model->get_umur_lokasi_pg($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
					$data['proporsi_tonase'] = $this->PerlocationPM3_model->get_proporsi_tonase($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
					$data['proporsi_yield'] = $this->PerlocationPM3_model->get_proporsi_yield($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
					$data['proporsi_yield_lokasi']['high'] = $this->PerlocationPM3_model->get_proporsi_yield_lokasi($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'DESC');
					$data['proporsi_yield_lokasi']['low'] = $this->PerlocationPM3_model->get_proporsi_yield_lokasi($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'ASC');

					$this->load->view('WIP_PM/plantation_group_S2', $data);
				break;
				//Summary 3
				case 'S3':
					$data['activity'] = $this->input->get('activity');
					$data['bulan_activity'] = $this->input->get('bulan_activity');
					$data['tahun_activity'] = $this->input->get('tahun_activity');
					$data['penyakit'] = $this->input->get('penyakit');

					if($data['activity'] == NULL){
						$data['activity'] = 'Total';
					}
					if($data['bulan_activity'] == NULL){
						$data['bulan_activity'] = "Total";
					}
					if($data['tahun_activity'] == NULL){
						$data['tahun_activity'] = "Total";
					}
					if($data['penyakit'] == NULL){
						$data['penyakit'] = "MBW";
					}

					$penyakit = $this->BeratTanaman_model->get_penyakit_wilayah_bulan_pm($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);

					$data['penyakit_lokasi'] = 0;
					$data['penyakit_total'] = 0;
					foreach ($penyakit as $p) {
						switch ($data['penyakit']) {
							case 'MBW':
								$data['penyakit_lokasi'] += $p->MBW;
							break;
							case 'PHY':
								$data['penyakit_lokasi'] += $p->PHY;
							break;
							case 'ERW':
								$data['penyakit_lokasi'] += $p->ERW;
							break;
						}
						$data['penyakit_total']++;
					}

					$golden_time = $this->VolumeAir_model->get_golden_time_data_summary($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['activity'], $data['bulan_activity'], $data['tahun_activity']);

					$data['golden_time']['GT'] = 0;
					$data['golden_time']['OT'] = 0;
					foreach ($golden_time as $gt) {
						$data['golden_time']['GT'] += $gt->GT;
						$data['golden_time']['OT'] += $gt->OT;
					}

					$volume_air = $this->VolumeAir_model->get_frekuensi_volume_air_summary($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['activity'], $data['bulan_activity'], $data['tahun_activity']);

					$data['volume_air']['VA1'] = 0;
					$data['volume_air']['VA2'] = 0;
					$data['volume_air']['VA3'] = 0;
					$data['volume_air']['VA4'] = 0;
					foreach ($volume_air as $va) {
						$data['volume_air']['VA1'] += $va->VA1;
						$data['volume_air']['VA2'] += $va->VA2;
						$data['volume_air']['VA3'] += $va->VA3;
						$data['volume_air']['VA4'] += $va->VA4;
					}

					$data['golden_time_forcing'] = $this->VolumeAir_model->get_volume_air_forcing_summary($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['activity'], $data['bulan_activity'], $data['tahun_activity']);

					$data['type'] = $this->input->get('type');
					$data['umur_f'] = $this->input->get('umur_f');

					if($data['type'] == NULL){
						$data['type'] = 'Scatter';
					}
					if($data['umur_f'] == NULL){
						$data['umur_f'] = -7;
					}

					$data['sebaran_foliar'] = $this->PerlocationPM3_model->get_sebaran_foliar($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['type']);
					$data['proporsi_interval'] = $this->PerlocationPM3_model->get_proporsi_interval($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['umur_f']);

					$this->load->view('WIP_PM/plantation_group_S3', $data);
				break;
				//Summary 4
				case 'S4':
					$data['bulan_bt'] = $this->input->get('bulan_bt');
					$data['option_bt'] = $this->input->get('option_bt');
					$data['size_bt'] = $this->input->get('size_bt');
					if($data['bulan_bt'] == NULL){
						$data['bulan_bt'] = 'Panen';
					}
					if($data['option_bt'] == NULL){
						$data['option_bt'] = 'Scatter';
					}
					if($data['size_bt'] == NULL){
						$data['size_bt'] = 'Big';
					}
					$data['berat_tanaman_bulan'] = $this->BeratTanaman_model->get_berat_tanaman_bulan_pm($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['bulan_bt']);
					$data['berat_tanaman_size'] = $this->BeratTanaman_model->get_berat_tanaman_size_pm($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['size_bt']);

					$data['berat_tanaman'] = $this->input->get('berat_tanaman');
					if($data['berat_tanaman'] == NULL){
						$data['berat_tanaman'] = 'Average';
					}
					$data['berat_tanaman_forcing'] = $this->BeratTanaman_model->get_berat_tanaman_wilayah_forcing_pm($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);

					$data['berat_tanaman_1'] = $this->PerlocationPM2_model->get_summary_berat_tanaman_1($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
					$data['berat_tanaman_2'] = $this->PerlocationPM2_model->get_summary_berat_tanaman_2($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
					$data['berat_tanaman_3'] = $this->PerlocationPM2_model->get_summary_berat_tanaman_3($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);

					$this->load->view('WIP_PM/plantation_group_S4', $data);
				break;
				//Summary 5
				case 'S5':
					$data['type'] = $this->input->get('type');
					$data['umur_f'] = $this->input->get('umur_f');

					if($data['type'] == NULL){
						$data['type'] = 'Scatter';
					}
					if($data['umur_f'] == NULL){
						$data['umur_f'] = -7;
					}

					$data['sebaran_foliar'] = $this->PerlocationPM3_model->get_sebaran_foliar($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['type']);

					$data['proporsi_interval'] = $this->PerlocationPM3_model->get_proporsi_interval($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['umur_f']);

					$lokasi_foliar = $this->PerlocationPM3_model->get_lokasi_foliar($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
					$x = 1;
					foreach ($lokasi_foliar as $lf) {
						$data['lokasi_foliar'][$x]['lokasi'] = $lf->lokasi;
						$data['lokasi_foliar'][$x]['Foliar'] = $lf->Foliar;
						$x++;
					}

					$this->load->view('WIP_PM/plantation_group_S5', $data);
				break;

				//Fertilizer
				case 'FE':
					$data['fertilizer'] = $this->input->get('fertilizer');
					$data['type'] = $this->input->get('type');
					$data['fertilizer_2'] = $this->input->get('fertilizer_2');
					$data['compare'] = $this->input->get('compare');
					$data['content'] = $this->input->get('content');
					$data['master_material'] = $this->Material_model->get_master_material_category('Fertilizer');

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

					$fertilizer_2 = $this->Material_model->get_master_material_code($data['fertilizer_2']);
					$data['nama_2'] = $fertilizer_2['material'];

					//Content
					if($data['content'] == NULL){
						$data['content'] = "NPKMg";
					}

					$data['std_material'] = $this->PerlocationPM_model->get_summary_material($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Budget');
					$data['real_material'] = $this->PerlocationPM_model->get_summary_material($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Real');
					$data['std_material_quota'] = $this->PerlocationPM_model->get_summary_material($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Qouta');

					$data['content_real'] = $this->PerlocationPM_model->get_summary_material_NPKMg($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['content'], 'Real');
					$data['content_budget'] = $this->PerlocationPM_model->get_summary_material_NPKMg($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['content'], 'Budget');

					$data['material_real'] = $this->PerlocationPM_model->get_summary_material_unsur_umur($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $fertilizer['material'], 'Real');
					$data['material_budget'] = $this->PerlocationPM_model->get_summary_material_unsur_umur($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $fertilizer['material'], 'Budget');

					$data['material_real_2'] = $this->PerlocationPM_model->get_summary_material_unsur_umur($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $fertilizer_2['material'], 'Real');
					$data['material_budget_2'] = $this->PerlocationPM_model->get_summary_material_unsur_umur($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $fertilizer_2['material'], 'Budget');

					$data['spray'] = $this->PerlocationPM2_model->get_summary_spray($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);

					$this->load->view('WIP_PM/plantation_group_FE', $data);
				break;
				//Herbicide
				case 'HE':
					$data['herbicide'] = $this->input->get('herbicide');
					$data['type'] = $this->input->get('type');
					$data['herbicide_2'] = $this->input->get('herbicide_2');
					$data['compare'] = $this->input->get('compare');
					$data['booster'] = $this->input->get('booster');
					$data['sebaran_material'] = $this->input->get('sebaran');
					$data['master_material'] = $this->Material_model->get_master_material_category('Herbisida');

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

					$herbicide_2 = $this->Material_model->get_master_material_code($data['herbicide_2']);
					$data['nama_2'] = $herbicide_2['material'];

					$data['std_material'] = $this->PerlocationPM_model->get_summary_material($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Budget');
					$data['real_material'] = $this->PerlocationPM_model->get_summary_material($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Real');
					$data['std_material_quota'] = $this->PerlocationPM_model->get_summary_material($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Qouta');

					if($data['booster'] == NULL){
						$data['booster'] = "Pre";
					}

					if($data['sebaran_material'] == NULL){
						$data['sebaran_material'] = "Bromacyl";
					}

					$data['material_real'] = $this->PerlocationPM_model->get_summary_material_unsur_umur($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $herbicide['material'], 'Real');
					$data['material_budget'] = $this->PerlocationPM_model->get_summary_material_unsur_umur($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $herbicide['material'], 'Budget');

					$data['material_real_2'] = $this->PerlocationPM_model->get_summary_material_unsur_umur($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $herbicide_2['material'], 'Real');
					$data['material_budget_2'] = $this->PerlocationPM_model->get_summary_material_unsur_umur($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $herbicide_2['material'], 'Budget');

					$data['weed_man'] = $this->PerlocationPM2_model->get_summary_weed_man($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
					$data['avg_weed_man'] = $this->PerlocationPM2_model->get_summary_avg_weed_man($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);

					$data['pre_post'] = $this->PerlocationPM2_model->get_summary_pre_post_planting($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['booster']);

					$sebaran = $this->PerlocationPM2_model->get_summary_sebaran_material($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['sebaran_material']);
					$a = 1;
					$data['sebaran'] = array();
					$data['sebaran']['Total'] = 0;
					foreach ($sebaran as $s) {
						$data['sebaran'][$a]['resource'] = $s->resource;
						$data['sebaran'][$a]['activity_code'] = $s->activity_code;
						$data['sebaran'][$a]['activity_desc'] = $s->activity_desc;
						$data['sebaran']['Total'] += $s->resource;
						$a++;
					}

					$this->load->view('WIP_PM/plantation_group_HE', $data);
				break;
				//Insecticide
				case 'IN':
					$data['insecticide'] = $this->input->get('insecticide');
					$data['type'] = $this->input->get('type');
					$data['insecticide_2'] = $this->input->get('insecticide_2');
					$data['compare'] = $this->input->get('compare');
					$data['pengamatan'] = $this->input->get('pengamatan');
					$data['iaf'] = $this->input->get('iaf');
					$data['master_material'] = $this->Material_model->get_master_material_category('Insektisida');

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
						$data['disabled_type_compare'] = 1;
					}
					$data['nama_1'] = $insecticide['material'];

					$insecticide_2 = $this->Material_model->get_master_material_code($data['insecticide_2']);
					$data['nama_2'] = $insecticide_2['material'];

					$data['std_material'] = $this->PerlocationPM_model->get_summary_material($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Budget');
					$data['real_material'] = $this->PerlocationPM_model->get_summary_material($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Real');
					$data['std_material_quota'] = $this->PerlocationPM_model->get_summary_material($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Qouta');

					if($data['pengamatan'] == NULL){
						$data['pengamatan'] = "MBW";
					}

					if($data['iaf'] == NULL){
						$data['iaf'] = "Insect_1";
					}

					$penyakit_min_max = $this->BeratTanaman_model->get_penyakit_wilayah_max_min_pm($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);

					switch ($data['pengamatan']) {
						case 'MBW':
							$data['penyakit_min_max']['max'] = $penyakit_min_max['MBW_max'];
							$data['penyakit_min_max']['avg'] = $penyakit_min_max['MBW_avg'];
							$data['penyakit_min_max']['min'] = $penyakit_min_max['MBW_min'];
						break;
						case 'PHY':
							$data['penyakit_min_max']['max'] = $penyakit_min_max['PHY_max'];
							$data['penyakit_min_max']['avg'] = $penyakit_min_max['PHY_avg'];
							$data['penyakit_min_max']['min'] = $penyakit_min_max['PHY_min'];
						break;
						case 'ERW':
							$data['penyakit_min_max']['max'] = $penyakit_min_max['ERW_max'];
							$data['penyakit_min_max']['avg'] = $penyakit_min_max['ERW_avg'];
							$data['penyakit_min_max']['min'] = $penyakit_min_max['ERW_min'];
						break;
					}

					$penyakit = $this->BeratTanaman_model->get_penyakit_wilayah_bulan_pm($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);

					$data['penyakit_lokasi'] = 0;
					$data['penyakit_total'] = 0;
					foreach ($penyakit as $p) {
						switch ($data['pengamatan']) {
							case 'MBW':
								$data['penyakit_lokasi'] += $p->MBW;
							break;
							case 'PHY':
								$data['penyakit_lokasi'] += $p->PHY;
							break;
							case 'ERW':
								$data['penyakit_lokasi'] += $p->ERW;
							break;
						}
						$data['penyakit_total']++;
					}

					$data['material_real'] = $this->PerlocationPM_model->get_summary_material_unsur_umur($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $insecticide['material'], 'Real');
					$data['material_budget'] = $this->PerlocationPM_model->get_summary_material_unsur_umur($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $insecticide['material'], 'Budget');

					$data['material_real_2'] = $this->PerlocationPM_model->get_summary_material_unsur_umur($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $insecticide_2['material'], 'Real');
					$data['material_budget_2'] = $this->PerlocationPM_model->get_summary_material_unsur_umur($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $insecticide_2['material'], 'Budget');

					$data['standart_insect'] = $this->PerlocationPM2_model->get_summary_insect($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['iaf']);

					$this->load->view('WIP_PM/plantation_group_IN', $data);
				break;
				//Fungicide
				case 'FU':
					$data['fungicide'] = $this->input->get('fungicide');
					$data['type'] = $this->input->get('type');
					$data['fungicide_2'] = $this->input->get('fungicide_2');
					$data['compare'] = $this->input->get('compare');
					$data['pengamatan'] = $this->input->get('pengamatan');
					$data['sebaran_material'] = $this->input->get('sebaran');
					$data['master_material'] = $this->Material_model->get_master_material_category('Fungisida');

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
						$data['disabled_type_compare'] = 1;
					}
					$data['nama_1'] = $fungicide['material'];

					$fungicide_2 = $this->Material_model->get_master_material_code($data['fungicide_2']);
					$data['nama_2'] = $fungicide_2['material'];

					$data['std_material'] = $this->PerlocationPM_model->get_summary_material($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Budget');
					$data['real_material'] = $this->PerlocationPM_model->get_summary_material($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Real');
					$data['std_material_quota'] = $this->PerlocationPM_model->get_summary_material($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Qouta');

					if($data['pengamatan'] == NULL){
						$data['pengamatan'] = "MBW";
					}

					if($data['sebaran_material'] == NULL){
						$data['sebaran_material'] = "Fosetil";
					}

					$penyakit_min_max = $this->BeratTanaman_model->get_penyakit_wilayah_max_min_pm($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);

					switch ($data['pengamatan']) {
						case 'MBW':
							$data['penyakit_min_max']['max'] = $penyakit_min_max['MBW_max'];
							$data['penyakit_min_max']['avg'] = $penyakit_min_max['MBW_avg'];
							$data['penyakit_min_max']['min'] = $penyakit_min_max['MBW_min'];
						break;
						case 'PHY':
							$data['penyakit_min_max']['max'] = $penyakit_min_max['PHY_max'];
							$data['penyakit_min_max']['avg'] = $penyakit_min_max['PHY_avg'];
							$data['penyakit_min_max']['min'] = $penyakit_min_max['PHY_min'];
						break;
						case 'ERW':
							$data['penyakit_min_max']['max'] = $penyakit_min_max['ERW_max'];
							$data['penyakit_min_max']['avg'] = $penyakit_min_max['ERW_avg'];
							$data['penyakit_min_max']['min'] = $penyakit_min_max['ERW_min'];
						break;
					}

					$penyakit = $this->BeratTanaman_model->get_penyakit_wilayah_bulan_pm($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);

					$data['penyakit_lokasi'] = 0;
					$data['penyakit_total'] = 0;
					foreach ($penyakit as $p) {
						switch ($data['pengamatan']) {
							case 'MBW':
								$data['penyakit_lokasi'] += $p->MBW;
							break;
							case 'PHY':
								$data['penyakit_lokasi'] += $p->PHY;
							break;
							case 'ERW':
								$data['penyakit_lokasi'] += $p->ERW;
							break;
						}
						$data['penyakit_total']++;
					}

					$data['material_real'] = $this->PerlocationPM_model->get_summary_material_unsur_umur($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $fungicide['material'], 'Real');
					$data['material_budget'] = $this->PerlocationPM_model->get_summary_material_unsur_umur($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $fungicide['material'], 'Budget');

					$data['material_real_2'] = $this->PerlocationPM_model->get_summary_material_unsur_umur($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $fungicide_2['material'], 'Real');
					$data['material_budget_2'] = $this->PerlocationPM_model->get_summary_material_unsur_umur($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $fungicide_2['material'], 'Budget');

					$data['material_saving'] = $this->PerlocationPM2_model->get_summary_material_saving($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $fungicide['material']);

					$sebaran = $this->PerlocationPM2_model->get_summary_sebaran_material($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['sebaran_material']);
					$a = 1;
					$data['sebaran'] = array();
					$data['sebaran']['Total'] = 0;
					foreach ($sebaran as $s) {
						$data['sebaran'][$a]['resource'] = $s->resource;
						$data['sebaran'][$a]['activity_code'] = $s->activity_code;
						$data['sebaran'][$a]['activity_desc'] = $s->activity_desc;
						$data['sebaran']['Total'] += $s->resource;
						$a++;
					}

					$data['sebaran_iklim'] = $this->PerlocationPM3_model->get_sebaran_iklim($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['sebaran_material']);

					$this->load->view('WIP_PM/plantation_group_FU', $data);
				break;
				//Forcing
				case 'FO':
					$data['forcing'] = $this->input->get('forcing');

					$data['std_material'] = $this->PerlocationPM_model->get_summary_material($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Budget');
					$data['real_material'] = $this->PerlocationPM_model->get_summary_material($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Real');
					$data['over_material'] = $this->PerlocationPM2_model->get_summary_material_over($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);

					if($data['forcing'] == NULL){
						$data['forcing'] = "1321111111";
					}

					$data['akurasi_forcing_cost'] = $this->PerlocationPM_model->get_akurasi_forcing_cost_2_pm($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
					$data['lokasi_forcing'] = $this->PerlocationPM2_model->get_summary_forcing($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['forcing']);
					$data['forcing_3'] = $this->PerlocationPM2_model->get_summary_forcing_3($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);

					$data['PersenBunga'] = $this->PengamatanPersenBunga_model->get_pengamatan_persen_bunga_summary($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);

					$this->load->view('WIP_PM/plantation_group_FO', $data);
				break;
				//Springkle
				case 'SP':
					$data['type'] = $this->input->get('type');
					$data['tahun_siram'] = $this->input->get('tahun_siram');

					if($data['type'] == NULL){
						$data['type'] = "Kali";
					}
					if($data['tahun_siram'] == NULL){
						$data['tahun_siram'] = (date('Y', strtotime($data['YEAR_BASE']['nilai'])) - 1);
					}

					$coverage_area = $this->Irrigation_model->get_coverage_summary($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['tahun_siram']);

					foreach ($coverage_area as $ca) {
						$data['coverage_area'][$ca->bulan] = $ca->luas;
						$data['std_siram'][$ca->bulan] = $ca->standart;
						$data['kali'][$ca->bulan] = $ca->kali;
					}

					$data['activity_saving'] = $this->PerlocationPM2_model->get_summary_activity_saving($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
					$data['priority_1'] = $this->PerlocationPM2_model->get_summary_irrigation_priority($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], '1', $data['tahun_siram']);
					$data['priority_2'] = $this->PerlocationPM2_model->get_summary_irrigation_priority($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], '2', $data['tahun_siram']);
					$data['priority_3'] = $this->PerlocationPM2_model->get_summary_irrigation_priority($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], '3', $data['tahun_siram']);
					$data['priority_4'] = $this->PerlocationPM2_model->get_summary_irrigation_priority($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], '4', $data['tahun_siram']);
					$data['priority_5'] = $this->PerlocationPM2_model->get_summary_irrigation_priority($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], '5', $data['tahun_siram']);

					$this->load->view('WIP_PM/plantation_group_SP', $data);
				break;
				//Harvest
				case 'HA':
					$data['category'] = $this->input->get('category');
					$data['type'] = $this->input->get('type');
					if($data['category'] == NULL){
						$data['category'] = "Total";
					}
					if($data['type'] == NULL){
						$data['type'] = "Total";
					}
					$data['tonase_panen'] = $this->TonasePanen_model->get_tonase_pm(NULL, 'W01'.'1');
					$data['tonase_panen_category'] = $this->TonasePanen_model->get_tonase_category_pm(NULL, 'W01'.'1');
					$data['tonase_panen_umur'] = $this->TonasePanen_model->get_tonase_umur_pm(NULL, 'W01'.'1', $data["YEAR_BASE"]['nilai'], $data['category'], $data['type']);

					$data['harvest_cantergory'] = $this->PerlocationPM2_model->get_summary_harvest($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
					$data['harvest_cantergory_2'] = $this->PerlocationPM2_model->get_summary_harvest_2($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
					$data['harvest_cantergory_bulan'] = $this->PerlocationPM2_model->get_summary_harvest_category_bulan($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['type'], $data['category']);

					$this->load->view('WIP_PM/plantation_group_HA', $data);
				break;

				//Material
				case 'MA':
					$data['unsur'] = $this->input->get('unsur');
					$data['material'] = $this->input->get('material');
					$data['lokasi'] = $this->input->get('lokasi');
					$data['sort'] = $this->input->get('sort');
					if($data['unsur'] == NULL){
						$data['unsur'] = 'Fertilizer';
					}
					if($data['sort'] == NULL){
						$data['sort'] = 'Quantity';
					}
					switch ($data['unsur']) {
				    case 'Fertilizer':
							$data['master_material'] = $this->Material_model->get_master_material_category('Fertilizer');
							if($data['material'] == NULL){
								$data['material'] = 'SNIT0000001';
							}
				    break;
				    case 'Herbicide':
							$data['master_material'] = $this->Material_model->get_master_material_category('Herbisida');
							if($data['material'] == NULL){
								$data['material'] = 'SHER0000006';
							}
				    break;
				    case 'Insecticide':
							$data['master_material'] = $this->Material_model->get_master_material_category('Insektisida');
							if($data['material'] == NULL){
								$data['material'] = '28-TEKASI-A00';
							}
				    break;
				    case 'Fungicide':
							$data['master_material'] = $this->Material_model->get_master_material_category('Fungisida');
							if($data['material'] == NULL){
								$data['material'] = 'SFUN0000010';
							}
				    break;
				    case 'Others':
							$data['master_material'] = $this->Material_model->get_master_material_category('Others');
							if($data['material'] == NULL){
								$data['material'] = 'SABS0000001';
							}
				    break;
					}

					$data['std_material'] = $this->PerlocationPM_model->get_summary_material($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Budget');
					$data['real_material'] = $this->PerlocationPM_model->get_summary_material($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Real');
					$data['over_material'] = $this->PerlocationPM2_model->get_summary_material_over($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
					$data['SatuanMaterial'] = $this->PerlocationPM_model->get_satuan_metarial();

					$unsur = $this->Material_model->get_master_material_code($data['material']);

					$data['lokasi_unusur'] = $this->PerlocationPM_model->get_summary_material_unsur($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $unsur['material']);

					if($data['lokasi'] == NULL){
						$cek = 0;
						foreach ($data['lokasi_unusur'] as $lu) {
							$cek_lokasi[$cek] = $lu->lokasi;
							$cek++;
						}
						$data['lokasi'] = $cek_lokasi[0];
					}

					$desc_lokasi = $this->Lokasi_model->get_lokasi_code($data['lokasi']);
					$data['lokasi_quantity'] = $this->PerlocationPM_model->get_summary_material_lokasi($data['lokasi'], $desc_lokasi['kebun'], $unsur['material'], $data['sort']);

					$this->load->view('WIP_PM/plantation_group_MA', $data);
				break;
				//Activity
				case 'AC':
					$data['ga'] = $this->input->get('ga');
					$data['activity'] = $this->input->get('activity');
					if($data['ga'] == NULL){
						$data['ga'] = 'ZN04';
					}
					$data['master_activity'] = $this->Activity_model->get_activity_only($data['ga']);

					if($data['activity'] == NULL){
						switch ($data['ga']) {
							case 'ZN01':
								$data['activity'] = '1113131115';
							break;
							case 'ZN02':
								$data['activity'] = '1115111111';
							break;
							case 'ZN03':
								$data['activity'] = '1117271111';
							break;
							case 'ZN04':
								$data['activity'] = '6111151360';
							break;
							case 'ZN05':
								$data['activity'] = '1311111111';
							break;
							case 'ZN06':
								$data['activity'] = '1315131113';
							break;
							case 'ZN07':
								$data['activity'] = '1313111113';
							break;
							case 'ZN08':
								$data['activity'] = '1321111111';
							break;
							case 'ZN09':
								$data['activity'] = '1325111116';
							break;
							case 'ZN10':
								$data['activity'] = '1511111519';
							break;
							case 'ZN11':
								$data['activity'] = '1321512111';
							break;
							case 'ZN12':
								$data['activity'] = '1319111311';
							break;
							case 'ZN13':
								$data['activity'] = '1323111125';
							break;
							case 'ZN14':
								$data['activity'] = '1911132311';
							break;
							case 'ZN15':
								$data['activity'] = '1113151323';
							break;
						}
					}

					$data['wip'] = $this->PerlocationPM_model->get_wip_cost_pm($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
					$activity_real = $this->PerlocationPM_model->get_activity_perlocation($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['ga'], 'Real');
					foreach ($activity_real as $ar) {
						$data['activity_real']['A'.$ar->activity_code] = $ar->biaya;
					}

					$activity_budget = $this->PerlocationPM_model->get_activity_perlocation($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['ga'], 'Budget');
					foreach ($activity_budget as $ar) {
						$data['activity_budget']['A'.$ar->activity_code] = $ar->biaya;
					}

					$activity_over = $this->PerlocationPM_model->get_activity_perlocation($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['ga'], 'Over');
					foreach ($activity_over as $ar) {
						$data['activity_over']['A'.$ar->activity_code] = $ar->over_r / $ar->jumlah;
					}

					$data['lokasi_activity'] = $this->PerlocationPM_model->get_summary_activity($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['activity'], $data['ga']);
					$data['group_cost'] = $this->PerlocationPM2_model->get_element_cost_ec($data['pg'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['ga']);

					$this->load->view('WIP_PM/plantation_group_AC', $data);
				break;
			}
			$this->load->view('WIP_PM/include/footer');
		}
		else{
			header( "Location: /PIS/index.php/dashboard" );
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
			$data["lokasi_all"] = $this->Lokasi_model->get_lokasi_wilayah_pm($data['wilayah']);

			$data['status'] = $this->input->get('status');
			$data['jenis'] = $this->input->get('jenis');
			$data['kelas'] = $this->input->get('kelas');
			$data['tahun'] = $this->input->get('tahun');
			$data['bulan'] = $this->input->get('bulan');
			$data['umur'] = $this->input->get('umur');

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
				$data['tahun'] = date('Y', strtotime($data["YEAR_BASE"]['nilai']));
			}
			if($data['bulan'] == NULL){
				$data['bulan'] = 'Total';
			}
			if($data['umur'] == NULL){
				$data['umur'] = 'Total';
			}

			$data['luas_tonase'] = $this->Wilayah_model->get_luas_tonase_wilayah($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);

			$data['performance'] = $this->PerlocationPM_model->get_performance_wip_pm($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
			$data['coordinate'] = $this->Coordinate_model->get_coordinate_pm($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
			$data['coordinate_center'] = $this->Coordinate_model->get_coordinate_wilayah_center($data['wilayah']);

			$data['satuan_material'] = $this->StdUnsurUmur_model->get_satuan_metarial();

			$this->load->view('WIP_PM/include/header');
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
					$data["element_cost_all"] = $this->ElementCost_model->get_element_cost_pm();

					$data['wip'] = $this->PerlocationPM_model->get_wip_cost_pm($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
					$data['hpp'] = $this->PerlocationPM_model->get_hpp_cost_pm($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);

					$data['gorup_cost_total'] = $this->PerlocationPM_model->get_group_cost_pm($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
					$data['trend_cost'] = $this->PerlocationPM_model->get_trend_cost_pm($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['group_cost']);
					$data['akurasi_forcing'] = $this->PerlocationPM_model->get_akurasi_forcing_pm($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['group_cost']);

					$data["SBTCostTotal"] = $this->PerlocationPM4_model->get_sbt_cost_real_total($data['status'], $data['tahun']);
					$data["SBTCost"] = $this->PerlocationPM3_model->get_sbt_cost_real($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);

					$this->load->view('WIP_PM/wilayah', $data);
				break;
				//BK
				case 'BK':
					$data['StatusBK'] = $this->input->get("status_bk");
					$data['QualityBK'] = $this->input->get("qbk");
					$data['ActivityBK'] = $this->input->get("activity_bk");
					if($data['StatusBK'] == NULL){
						$data['StatusBK'] = 'Total';
					}
					if($data['QualityBK'] == NULL){
						$data['QualityBK'] = 'Average';
					}
					if($data['ActivityBK'] == NULL){
						$data['ActivityBK'] = 'Chopper_1';
					}

					$QualityPBK = $this->PerlocationPM3_model->get_quality_bk($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['StatusBK']);
					if($data['QualityBK'] == 'Average'){
							$data["QualityPBK"]["Chopper"]["Q"] = 0;
							$data["QualityPBK"]["Chopper"]["T"] = 0;
							$data["QualityPBK"]["Bajak"]["Q"] = 0;
							$data["QualityPBK"]["Bajak"]["T"] = 0;
							$data["QualityPBK"]["FinishingHarrow"]["Q"] = 0;
							$data["QualityPBK"]["FinishingHarrow"]["T"] = 0;
							$data["QualityPBK"]["Ridger"]["Q"] = 0;
							$data["QualityPBK"]["Ridger"]["T"] = 0;
							$data["QualityPBK"]["JalanSaluran"]["Q"] = 0;
							$data["QualityPBK"]["JalanSaluran"]["T"] = 0;
						foreach ($QualityPBK as $QPBK) {
							if($QPBK->Chopper != NULL){
								$data["QualityPBK"]["Chopper"]["Q"] += $QPBK->Chopper;
								$data["QualityPBK"]["Chopper"]["T"]++;
							}
							if($QPBK->Bajak != NULL){
								$data["QualityPBK"]["Bajak"]["Q"] += $QPBK->Bajak;
								$data["QualityPBK"]["Bajak"]["T"]++;
							}
							if($QPBK->FinishingHarrow != NULL){
								$data["QualityPBK"]["FinishingHarrow"]["Q"] += $QPBK->FinishingHarrow;
								$data["QualityPBK"]["FinishingHarrow"]["T"]++;
							}
							if($QPBK->Ridger != NULL){
								$data["QualityPBK"]["Ridger"]["Q"] += $QPBK->Ridger;
								$data["QualityPBK"]["Ridger"]["T"]++;
							}
							if($QPBK->JalanSaluran != NULL){
								$data["QualityPBK"]["JalanSaluran"]["Q"] += $QPBK->JalanSaluran;
								$data["QualityPBK"]["JalanSaluran"]["T"]++;
							}
						}
					}
					else{
						$data["QualityPBK"] = $QualityPBK;
					}

					$data["TQualityPBK"]["TChopper"] = 0;
					$data["TQualityPBK"]["TBajak"] = 0;
					$data["TQualityPBK"]["TFinishingHarrow"] = 0;
					$data["TQualityPBK"]["TRidger"] = 0;
					$data["TQualityPBK"]["TJalanSaluran"] = 0;
					$data["TQualityPBK"]["Total"] = 0;
					foreach ($QualityPBK as $QPBK) {
						if($QPBK->Chopper != NULL){
							$data["TQualityPBK"]["TChopper"]++;
						}
						if($QPBK->Bajak != NULL){
							$data["TQualityPBK"]["TBajak"]++;
						}
						if($QPBK->FinishingHarrow != NULL){
							$data["TQualityPBK"]["TFinishingHarrow"]++;
						}
						if($QPBK->Ridger != NULL){
							$data["TQualityPBK"]["TRidger"]++;
						}
						if($QPBK->JalanSaluran != NULL){
							$data["TQualityPBK"]["TJalanSaluran"]++;
						}
						$data["TQualityPBK"]["Total"]++;
					}

					// echo "<pre>";
					// var_dump($data["QualityPBK"]);
					// var_dump($data["TQualityPBK"]);
					// echo "</pre>";
					// die();

					$data["TimelineBK"] = $this->PerlocationPM4_model->get_timeline_bk($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['StatusBK']);

					$data["STDQBKST"] = $this->PerlocationPM3_model->get_std_pengamatan_BKST();
					$data["ProportionLuasBK"] = $this->PerlocationPM3_model->get_luas_proportion_BK($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);

					$data["CostBK"] = $this->PerlocationPM3_model->get_summary_cost_bk($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['StatusBK']);

					$ExplodeAct = explode("_", $data['ActivityBK']);
					$cek = explode("|", $ExplodeAct[0]);
					if(sizeof($cek) > 1){
						$data['CurrentActivityBK'] = $cek[0]." ".$cek[1];
					}
					else{
						$data['CurrentActivityBK'] = $ExplodeAct[0];
					}
					$data["ActivityPenarik"] = $this->PerlocationPM3_model->get_summary_activity($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['StatusBK'], $ExplodeAct[0], $ExplodeAct[1], "Penarik");
					$data["ActivityImplement"] = $this->PerlocationPM3_model->get_summary_activity($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['StatusBK'], $ExplodeAct[0], $ExplodeAct[1], "Implement");

					$CodeAct = $this->PerlocationPM3_model->get_desc_activity_bk($data['CurrentActivityBK']);
					$IAct = 0;
					foreach($CodeAct as $CA){
						if($IAct == 0){
							$DescAct = "'".$CA->CodeAct."'";
						}
						else{
							$DescAct = ", '".$CA->CodeAct."'";
						}
					}
					$data["STDActivity"] = $this->PerlocationPM3_model->get_std_activity_bk($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $DescAct);
					$data["RealActivity"] = $this->PerlocationPM3_model->get_real_activity_bk($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $ExplodeAct[0], $ExplodeAct[1]);

					$data["element_cost"] = $this->ElementCost_model->get_element_cost_bk();

					$WIP = $this->PerlocationPM4_model->get_summary_cost($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['StatusBK']);
					$CostST = $this->PerlocationPM3_model->get_summary_cost_st($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['StatusBK']);

					$data['HPP']['ZN01S'] = $WIP['ZN01R'] - ($data["CostBK"]['ZN01R'] + $CostST['ZN01R']);
					$data['HPP']['ZN01H'] = ($data["CostBK"]['ZN01R'] / ($data["CostBK"]['ZN01R'] + $CostST['ZN01R'])) * $data['HPP']['ZN01S'];
					$data['HPP']['ZN03S'] = $WIP['ZN03R'] - ($data["CostBK"]['ZN03R'] + $CostST['ZN03R']);
					$data['HPP']['ZN03H'] = ($data["CostBK"]['ZN03R'] / ($data["CostBK"]['ZN03R'] + $CostST['ZN03R'])) * $data['HPP']['ZN03S'];
					$data['HPP']['ZN04S'] = $WIP['ZN04R'] - ($data["CostBK"]['ZN04R'] + $CostST['ZN04R']);
					$data['HPP']['ZN04H'] = ($data["CostBK"]['ZN04R'] / ($data["CostBK"]['ZN04R'] + $CostST['ZN04R'])) * $data['HPP']['ZN04S'];

					$this->load->view('WIP_PM/wilayah_BK', $data);
				break;
				//DBK
				case 'DBK':
					$data['StatusBK'] = $this->input->get("status_bk");
					if($data['StatusBK'] == NULL){
						$data['StatusBK'] = 'Total';
					}
					$data["ChargePenarik"] = $this->PerlocationPM4_model->get_charge_bk('Penarik', $data['StatusBK']);
					$data["ChargeImplement"] = $this->PerlocationPM4_model->get_charge_bk('Implement', $data['StatusBK']);

					$this->load->view('WIP_PM/wilayah_DBK', $data);
				break;
				//DEC
				case 'DEC':
					$data['ElementCost'] = $this->input->get("ga");
					$data['JenisStatus'] = $this->input->get("jenis_status");
					$data['Activity'] = $this->input->get("activity");

					$data["ActivityDetail"] = $this->PerlocationPM4_model->get_activity_bkst_detail($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['ElementCost'], $data['JenisStatus']);
					$data["PerActivityDetail"] = $this->PerlocationPM4_model->get_per_activity_bkst_detail($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['ElementCost'], $data['JenisStatus'], $data['Activity']);

					$this->load->view('WIP_PM/wilayah_DEC', $data);
				break;
				//ST
				case 'ST':
					$data['StatusBK'] = $this->input->get("status_bk");
					if($data['StatusBK'] == NULL){
						$data['StatusBK'] = 'Total';
					}

					$data["STDQBKST"] = $this->PerlocationPM3_model->get_std_pengamatan_BKST();
					$data["ProportionBibitST"] = $this->PerlocationPM4_model->get_propotion_bibit_st($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);

					$data["CostST"] = $this->PerlocationPM3_model->get_summary_cost_st($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);

					$data["element_cost"] = $this->ElementCost_model->get_element_cost_ST();
					$QualityPST = $this->PerlocationPM4_model->get_quality_st($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
					$data["QualityPST"]["ST1"]["Q"] = 0;
					$data["QualityPST"]["ST1"]["T"] = 0;
					$data["QualityPST"]["ST2"]["Q"] = 0;
					$data["QualityPST"]["ST2"]["T"] = 0;
					$data["QualityPST"]["ST3"]["Q"] = 0;
					$data["QualityPST"]["ST3"]["T"] = 0;
					$data["QualityPST"]["ST4"]["Q"] = 0;
					$data["QualityPST"]["ST4"]["T"] = 0;
					foreach ($QualityPST as $QPST) {
						if($QPST->ST1 != NULL && $QPST->ST1 != 0){
							$data["QualityPST"]["ST1"]["Q"] += $QPST->ST1;
							$data["QualityPST"]["ST1"]["T"]++;
						}
						if($QPST->ST2 != NULL && $QPST->ST2 != 0){
							$data["QualityPST"]["ST2"]["Q"] += $QPST->ST2;
							$data["QualityPST"]["ST2"]["T"]++;
						}
						if($QPST->ST3 != NULL && $QPST->ST3 != 0){
							$data["QualityPST"]["ST3"]["Q"] += $QPST->ST3;
							$data["QualityPST"]["ST3"]["T"]++;
						}
						if($QPST->ST4 != NULL && $QPST->ST4 != 0){
							$data["QualityPST"]["ST4"]["Q"] += $QPST->ST4;
							$data["QualityPST"]["ST4"]["T"]++;
						}
					}

					$data["TQualityPST"]["ST1"] = 0;
					$data["TQualityPST"]["ST2"] = 0;
					$data["TQualityPST"]["ST3"] = 0;
					$data["TQualityPST"]["ST4"] = 0;
					$data["TQualityPST"]["Total"] = 0;
					foreach ($QualityPST as $QPST) {
						if($QPST->ST1 != NULL){
							$data["TQualityPST"]["ST1"]++;
						}
						if($QPST->ST2 != NULL){
							$data["TQualityPST"]["ST2"]++;
						}
						if($QPST->ST3 != NULL){
							$data["TQualityPST"]["ST3"]++;
						}
						if($QPST->ST4 != NULL){
							$data["TQualityPST"]["ST4"]++;
						}
						$data["TQualityPST"]["Total"]++;
					}

					$data["FellowPeriod"] = $this->PerlocationPM4_model->get_fellow_periode($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['StatusBK']);

					$WIP = $this->PerlocationPM4_model->get_summary_cost($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['StatusBK']);
					$CostBK = $this->PerlocationPM3_model->get_summary_cost_bk($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['StatusBK']);

					$data['HPP']['ZN01S'] = $WIP['ZN01R'] - ($data["CostST"]['ZN01R'] + $CostBK['ZN01R']);
					$data['HPP']['ZN01H'] = ($data["CostST"]['ZN01R'] / ($data["CostST"]['ZN01R'] + $CostBK['ZN01R'])) * $data['HPP']['ZN01S'];
					$data['HPP']['ZN03S'] = $WIP['ZN03R'] - ($data["CostST"]['ZN03R'] + $CostBK['ZN03R']);
					$data['HPP']['ZN03H'] = ($data["CostST"]['ZN03R'] / ($data["CostST"]['ZN03R'] + $CostBK['ZN03R'])) * $data['HPP']['ZN03S'];
					$data['HPP']['ZN04S'] = $WIP['ZN04R'] - ($data["CostST"]['ZN04R'] + $CostBK['ZN04R']);
					$data['HPP']['ZN04H'] = ($data["CostST"]['ZN04R'] / ($data["CostST"]['ZN04R'] + $CostBK['ZN04R'])) * $data['HPP']['ZN04S'];

					$this->load->view('WIP_PM/wilayah_ST', $data);
				break;
				//Summary 1
				case 'S1':
					$data['trend_cost'] = $this->PerlocationPM_model->get_trend_cost_pm($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Total');
					$data['cost_real'] = array(
						'Expensive' => $this->Performance_model->get_performance_wip_pm_cost($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Expensive'),
						'Chippest' => $this->Performance_model->get_performance_wip_pm_cost($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Chippest')
					);

					$this->load->view('WIP_PM/wilayah_S1', $data);
				break;
				//Summary 2
				case 'S2':
					$data['proporsi_ratun'] = $this->Wilayah_model->get_proporsi_ratun_wilayah($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
					$data['umur_lokasi'] = $this->Wilayah_model->get_umur_lokasi_wilayah($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
					$data['proporsi_tonase'] = $this->PerlocationPM3_model->get_proporsi_tonase($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
					$data['proporsi_yield'] = $this->PerlocationPM3_model->get_proporsi_yield($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
					$data['proporsi_yield_lokasi']['high'] = $this->PerlocationPM3_model->get_proporsi_yield_lokasi($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'DESC');
					$data['proporsi_yield_lokasi']['low'] = $this->PerlocationPM3_model->get_proporsi_yield_lokasi($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'ASC');

					$this->load->view('WIP_PM/wilayah_S2', $data);
				break;
				//Summary 3
				case 'S3':
					$data['activity'] = $this->input->get('activity');
					$data['bulan_activity'] = $this->input->get('bulan_activity');
					$data['tahun_activity'] = $this->input->get('tahun_activity');
					$data['penyakit'] = $this->input->get('penyakit');

					if($data['activity'] == NULL){
						$data['activity'] = 'Total';
					}
					if($data['bulan_activity'] == NULL){
						$data['bulan_activity'] = "Total";
					}
					if($data['tahun_activity'] == NULL){
						$data['tahun_activity'] = "Total";
					}
					if($data['penyakit'] == NULL){
						$data['penyakit'] = "MBW";
					}

					$penyakit = $this->BeratTanaman_model->get_penyakit_wilayah_bulan_pm($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);

					$data['penyakit_lokasi'] = 0;
					$data['penyakit_total'] = 0;
					foreach ($penyakit as $p) {
						switch ($data['penyakit']) {
							case 'MBW':
								$data['penyakit_lokasi'] += $p->MBW;
							break;
							case 'PHY':
								$data['penyakit_lokasi'] += $p->PHY;
							break;
							case 'ERW':
								$data['penyakit_lokasi'] += $p->ERW;
							break;
						}
						$data['penyakit_total']++;
					}

					$golden_time = $this->VolumeAir_model->get_golden_time_data_summary($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['activity'], $data['bulan_activity'], $data['tahun_activity']);

					$data['golden_time']['GT'] = 0;
					$data['golden_time']['OT'] = 0;
					foreach ($golden_time as $gt) {
						$data['golden_time']['GT'] += $gt->GT;
						$data['golden_time']['OT'] += $gt->OT;
					}

					$volume_air = $this->VolumeAir_model->get_frekuensi_volume_air_summary($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['activity'], $data['bulan_activity'], $data['tahun_activity']);

					$data['volume_air']['VA1'] = 0;
					$data['volume_air']['VA2'] = 0;
					$data['volume_air']['VA3'] = 0;
					$data['volume_air']['VA4'] = 0;
					foreach ($volume_air as $va) {
						$data['volume_air']['VA1'] += $va->VA1;
						$data['volume_air']['VA2'] += $va->VA2;
						$data['volume_air']['VA3'] += $va->VA3;
						$data['volume_air']['VA4'] += $va->VA4;
					}

					$data['golden_time_forcing'] = $this->VolumeAir_model->get_volume_air_forcing_summary($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['activity'], $data['bulan_activity'], $data['tahun_activity']);

					$data['type'] = $this->input->get('type');
					$data['umur_f'] = $this->input->get('umur_f');

					if($data['type'] == NULL){
						$data['type'] = 'Scatter';
					}
					if($data['umur_f'] == NULL){
						$data['umur_f'] = -7;
					}

					$data['sebaran_foliar'] = $this->PerlocationPM3_model->get_sebaran_foliar($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['type']);
					$data['proporsi_interval'] = $this->PerlocationPM3_model->get_proporsi_interval($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['umur_f']);

					$this->load->view('WIP_PM/wilayah_S3', $data);
				break;
				//Summary 4
				case 'S4':
					$data['bulan_bt'] = $this->input->get('bulan_bt');
					$data['option_bt'] = $this->input->get('option_bt');
					$data['size_bt'] = $this->input->get('size_bt');
					if($data['bulan_bt'] == NULL){
						$data['bulan_bt'] = 'Panen';
					}
					if($data['option_bt'] == NULL){
						$data['option_bt'] = 'Scatter';
					}
					if($data['size_bt'] == NULL){
						$data['size_bt'] = 'Big';
					}
					$data['berat_tanaman_bulan'] = $this->BeratTanaman_model->get_berat_tanaman_bulan_pm($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['bulan_bt']);
					$data['berat_tanaman_size'] = $this->BeratTanaman_model->get_berat_tanaman_size_pm($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['size_bt']);

					$data['berat_tanaman'] = $this->input->get('berat_tanaman');
					if($data['berat_tanaman'] == NULL){
						$data['berat_tanaman'] = 'Average';
					}
					$data['berat_tanaman_forcing'] = $this->BeratTanaman_model->get_berat_tanaman_wilayah_forcing_pm($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);

					$data['berat_tanaman_1'] = $this->PerlocationPM2_model->get_summary_berat_tanaman_1($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
					$data['berat_tanaman_2'] = $this->PerlocationPM2_model->get_summary_berat_tanaman_2($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
					$data['berat_tanaman_3'] = $this->PerlocationPM2_model->get_summary_berat_tanaman_3($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);

					$this->load->view('WIP_PM/wilayah_S4', $data);
				break;
				//Summary 5
				case 'S5':
					$data['type'] = $this->input->get('type');
					$data['umur_f'] = $this->input->get('umur_f');

					if($data['type'] == NULL){
						$data['type'] = 'Scatter';
					}
					if($data['umur_f'] == NULL){
						$data['umur_f'] = -7;
					}

					$data['sebaran_foliar'] = $this->PerlocationPM3_model->get_sebaran_foliar($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['type']);

					$data['proporsi_interval'] = $this->PerlocationPM3_model->get_proporsi_interval($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['umur_f']);

					$lokasi_foliar = $this->PerlocationPM3_model->get_lokasi_foliar($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
					$x = 1;
					foreach ($lokasi_foliar as $lf) {
						$data['lokasi_foliar'][$x]['lokasi'] = $lf->lokasi;
						$data['lokasi_foliar'][$x]['Foliar'] = $lf->Foliar;
						$x++;
					}

					$this->load->view('WIP_PM/wilayah_S5', $data);
				break;

				//Fertilizer
				case 'FE':
					$data['fertilizer'] = $this->input->get('fertilizer');
					$data['type'] = $this->input->get('type');
					$data['fertilizer_2'] = $this->input->get('fertilizer_2');
					$data['compare'] = $this->input->get('compare');
					$data['content'] = $this->input->get('content');
					$data['master_material'] = $this->Material_model->get_master_material_category('Fertilizer');

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

					$fertilizer_2 = $this->Material_model->get_master_material_code($data['fertilizer_2']);
					$data['nama_2'] = $fertilizer_2['material'];

					//Content
					if($data['content'] == NULL){
						$data['content'] = "NPKMg";
					}

					$data['std_material'] = $this->PerlocationPM_model->get_summary_material($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Budget');
					$data['real_material'] = $this->PerlocationPM_model->get_summary_material($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Real');
					$data['std_material_quota'] = $this->PerlocationPM_model->get_summary_material($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Qouta');

					$data['content_real'] = $this->PerlocationPM_model->get_summary_material_NPKMg($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['content'], 'Real');
					$data['content_budget'] = $this->PerlocationPM_model->get_summary_material_NPKMg($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['content'], 'Budget');

					$data['material_real'] = $this->PerlocationPM_model->get_summary_material_unsur_umur($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $fertilizer['material'], 'Real');
					$data['material_budget'] = $this->PerlocationPM_model->get_summary_material_unsur_umur($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $fertilizer['material'], 'Budget');

					$data['material_real_2'] = $this->PerlocationPM_model->get_summary_material_unsur_umur($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $fertilizer_2['material'], 'Real');
					$data['material_budget_2'] = $this->PerlocationPM_model->get_summary_material_unsur_umur($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $fertilizer_2['material'], 'Budget');

					$data['spray'] = $this->PerlocationPM2_model->get_summary_spray($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);

					$this->load->view('WIP_PM/wilayah_FE', $data);
				break;
				//Herbicide
				case 'HE':
					$data['herbicide'] = $this->input->get('herbicide');
					$data['type'] = $this->input->get('type');
					$data['herbicide_2'] = $this->input->get('herbicide_2');
					$data['compare'] = $this->input->get('compare');
					$data['booster'] = $this->input->get('booster');
					$data['sebaran_material'] = $this->input->get('sebaran');
					$data['master_material'] = $this->Material_model->get_master_material_category('Herbisida');

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

					$herbicide_2 = $this->Material_model->get_master_material_code($data['herbicide_2']);
					$data['nama_2'] = $herbicide_2['material'];

					$data['std_material'] = $this->PerlocationPM_model->get_summary_material($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Budget');
					$data['real_material'] = $this->PerlocationPM_model->get_summary_material($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Real');
					$data['std_material_quota'] = $this->PerlocationPM_model->get_summary_material($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Qouta');

					if($data['booster'] == NULL){
						$data['booster'] = "Pre";
					}

					if($data['sebaran_material'] == NULL){
						$data['sebaran_material'] = "Bromacyl";
					}

					$data['material_real'] = $this->PerlocationPM_model->get_summary_material_unsur_umur($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $herbicide['material'], 'Real');
					$data['material_budget'] = $this->PerlocationPM_model->get_summary_material_unsur_umur($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $herbicide['material'], 'Budget');

					$data['material_real_2'] = $this->PerlocationPM_model->get_summary_material_unsur_umur($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $herbicide_2['material'], 'Real');
					$data['material_budget_2'] = $this->PerlocationPM_model->get_summary_material_unsur_umur($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $herbicide_2['material'], 'Budget');

					$data['weed_man'] = $this->PerlocationPM2_model->get_summary_weed_man($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
					$data['avg_weed_man'] = $this->PerlocationPM2_model->get_summary_avg_weed_man($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);

					$data['pre_post'] = $this->PerlocationPM2_model->get_summary_pre_post_planting($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['booster']);

					$sebaran = $this->PerlocationPM2_model->get_summary_sebaran_material($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['sebaran_material']);
					$a = 1;
					$data['sebaran'] = array();
					$data['sebaran']['Total'] = 0;
					foreach ($sebaran as $s) {
						$data['sebaran'][$a]['resource'] = $s->resource;
						$data['sebaran'][$a]['activity_code'] = $s->activity_code;
						$data['sebaran'][$a]['activity_desc'] = $s->activity_desc;
						$data['sebaran']['Total'] += $s->resource;
						$a++;
					}

					$this->load->view('WIP_PM/wilayah_HE', $data);
				break;
				//Insecticide
				case 'IN':
					$data['insecticide'] = $this->input->get('insecticide');
					$data['type'] = $this->input->get('type');
					$data['insecticide_2'] = $this->input->get('insecticide_2');
					$data['compare'] = $this->input->get('compare');
					$data['pengamatan'] = $this->input->get('pengamatan');
					$data['iaf'] = $this->input->get('iaf');
					$data['master_material'] = $this->Material_model->get_master_material_category('Insektisida');

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

					$insecticide_2 = $this->Material_model->get_master_material_code($data['insecticide_2']);
					$data['nama_2'] = $insecticide_2['material'];

					$data['std_material'] = $this->PerlocationPM_model->get_summary_material($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Budget');
					$data['real_material'] = $this->PerlocationPM_model->get_summary_material($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Real');
					$data['std_material_quota'] = $this->PerlocationPM_model->get_summary_material($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Qouta');

					if($data['pengamatan'] == NULL){
						$data['pengamatan'] = "MBW";
					}

					if($data['iaf'] == NULL){
						$data['iaf'] = "Insect_1";
					}

					$penyakit_min_max = $this->BeratTanaman_model->get_penyakit_wilayah_max_min_pm($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);

					switch ($data['pengamatan']) {
						case 'MBW':
							$data['penyakit_min_max']['max'] = $penyakit_min_max['MBW_max'];
							$data['penyakit_min_max']['avg'] = $penyakit_min_max['MBW_avg'];
							$data['penyakit_min_max']['min'] = $penyakit_min_max['MBW_min'];
						break;
						case 'PHY':
							$data['penyakit_min_max']['max'] = $penyakit_min_max['PHY_max'];
							$data['penyakit_min_max']['avg'] = $penyakit_min_max['PHY_avg'];
							$data['penyakit_min_max']['min'] = $penyakit_min_max['PHY_min'];
						break;
						case 'ERW':
							$data['penyakit_min_max']['max'] = $penyakit_min_max['ERW_max'];
							$data['penyakit_min_max']['avg'] = $penyakit_min_max['ERW_avg'];
							$data['penyakit_min_max']['min'] = $penyakit_min_max['ERW_min'];
						break;
					}

					$penyakit = $this->BeratTanaman_model->get_penyakit_wilayah_bulan_pm($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);

					$data['penyakit_lokasi'] = 0;
					$data['penyakit_total'] = 0;
					foreach ($penyakit as $p) {
						switch ($data['pengamatan']) {
							case 'MBW':
								$data['penyakit_lokasi'] += $p->MBW;
							break;
							case 'PHY':
								$data['penyakit_lokasi'] += $p->PHY;
							break;
							case 'ERW':
								$data['penyakit_lokasi'] += $p->ERW;
							break;
						}
						$data['penyakit_total']++;
					}

					$data['material_real'] = $this->PerlocationPM_model->get_summary_material_unsur_umur($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $insecticide['material'], 'Real');
					$data['material_budget'] = $this->PerlocationPM_model->get_summary_material_unsur_umur($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $insecticide['material'], 'Budget');

					$data['material_real_2'] = $this->PerlocationPM_model->get_summary_material_unsur_umur($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $insecticide_2['material'], 'Real');
					$data['material_budget_2'] = $this->PerlocationPM_model->get_summary_material_unsur_umur($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $insecticide_2['material'], 'Budget');

					$data['standart_insect'] = $this->PerlocationPM2_model->get_summary_insect($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['iaf']);

					$this->load->view('WIP_PM/wilayah_IN', $data);
				break;
				//Fungicide
				case 'FU':
					$data['fungicide'] = $this->input->get('fungicide');
					$data['type'] = $this->input->get('type');
					$data['fungicide_2'] = $this->input->get('fungicide_2');
					$data['compare'] = $this->input->get('compare');
					$data['pengamatan'] = $this->input->get('pengamatan');
					$data['sebaran_material'] = $this->input->get('sebaran');
					$data['master_material'] = $this->Material_model->get_master_material_category('Fungisida');

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

					$fungicide_2 = $this->Material_model->get_master_material_code($data['fungicide_2']);
					$data['nama_2'] = $fungicide_2['material'];

					$data['std_material'] = $this->PerlocationPM_model->get_summary_material($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Budget');
					$data['real_material'] = $this->PerlocationPM_model->get_summary_material($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Real');
					$data['std_material_quota'] = $this->PerlocationPM_model->get_summary_material($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Qouta');

					if($data['pengamatan'] == NULL){
						$data['pengamatan'] = "MBW";
					}

					if($data['sebaran_material'] == NULL){
						$data['sebaran_material'] = "Fosetil";
					}

					$penyakit_min_max = $this->BeratTanaman_model->get_penyakit_wilayah_max_min_pm($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);

					switch ($data['pengamatan']) {
						case 'MBW':
							$data['penyakit_min_max']['max'] = $penyakit_min_max['MBW_max'];
							$data['penyakit_min_max']['avg'] = $penyakit_min_max['MBW_avg'];
							$data['penyakit_min_max']['min'] = $penyakit_min_max['MBW_min'];
						break;
						case 'PHY':
							$data['penyakit_min_max']['max'] = $penyakit_min_max['PHY_max'];
							$data['penyakit_min_max']['avg'] = $penyakit_min_max['PHY_avg'];
							$data['penyakit_min_max']['min'] = $penyakit_min_max['PHY_min'];
						break;
						case 'ERW':
							$data['penyakit_min_max']['max'] = $penyakit_min_max['ERW_max'];
							$data['penyakit_min_max']['avg'] = $penyakit_min_max['ERW_avg'];
							$data['penyakit_min_max']['min'] = $penyakit_min_max['ERW_min'];
						break;
					}

					$penyakit = $this->BeratTanaman_model->get_penyakit_wilayah_bulan_pm($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);

					$data['penyakit_lokasi'] = 0;
					$data['penyakit_total'] = 0;
					foreach ($penyakit as $p) {
						switch ($data['pengamatan']) {
							case 'MBW':
								$data['penyakit_lokasi'] += $p->MBW;
							break;
							case 'PHY':
								$data['penyakit_lokasi'] += $p->PHY;
							break;
							case 'ERW':
								$data['penyakit_lokasi'] += $p->ERW;
							break;
						}
						$data['penyakit_total']++;
					}

					$data['material_real'] = $this->PerlocationPM_model->get_summary_material_unsur_umur($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $fungicide['material'], 'Real');
					$data['material_budget'] = $this->PerlocationPM_model->get_summary_material_unsur_umur($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $fungicide['material'], 'Budget');

					$data['material_real_2'] = $this->PerlocationPM_model->get_summary_material_unsur_umur($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $fungicide_2['material'], 'Real');
					$data['material_budget_2'] = $this->PerlocationPM_model->get_summary_material_unsur_umur($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $fungicide_2['material'], 'Budget');

					$data['material_saving'] = $this->PerlocationPM2_model->get_summary_material_saving($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $fungicide['material']);

					$sebaran = $this->PerlocationPM2_model->get_summary_sebaran_material($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['sebaran_material']);
					$a = 1;
					$data['sebaran'] = array();
					$data['sebaran']['Total'] = 0;
					foreach ($sebaran as $s) {
						$data['sebaran'][$a]['resource'] = $s->resource;
						$data['sebaran'][$a]['activity_code'] = $s->activity_code;
						$data['sebaran'][$a]['activity_desc'] = $s->activity_desc;
						$data['sebaran']['Total'] += $s->resource;
						$a++;
					}

					$data['sebaran_iklim'] = $this->PerlocationPM3_model->get_sebaran_iklim($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['sebaran_material']);

					$this->load->view('WIP_PM/wilayah_FU', $data);
				break;
				//Forcing
				case 'FO':
					$data['forcing'] = $this->input->get('forcing');

					$data['std_material'] = $this->PerlocationPM_model->get_summary_material($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Budget');
					$data['real_material'] = $this->PerlocationPM_model->get_summary_material($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Real');
					$data['over_material'] = $this->PerlocationPM2_model->get_summary_material_over($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);

					if($data['forcing'] == NULL){
						$data['forcing'] = "1321111111";
					}

					$data['akurasi_forcing_cost'] = $this->PerlocationPM_model->get_akurasi_forcing_cost_2_pm($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
					$data['lokasi_forcing'] = $this->PerlocationPM2_model->get_summary_forcing($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['forcing']);
					$data['forcing_3'] = $this->PerlocationPM2_model->get_summary_forcing_3($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);

					$data['PersenBunga'] = $this->PengamatanPersenBunga_model->get_pengamatan_persen_bunga_summary($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);

					$this->load->view('WIP_PM/wilayah_FO', $data);
				break;
				//Springkle
				case 'SP':
					$data['type'] = $this->input->get('type');
					$data['tahun_siram'] = $this->input->get('tahun_siram');

					if($data['type'] == NULL){
						$data['type'] = "Ha";
					}
					if($data['tahun_siram'] == NULL){
						$data['tahun_siram'] = (date('Y', strtotime($data['YEAR_BASE']['nilai'])) - 1);
					}

					$coverage_area = $this->Irrigation_model->get_coverage_summary($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['tahun_siram']);

					foreach ($coverage_area as $ca) {
						$data['coverage_area'][$ca->bulan] = $ca->luas;
						$data['std_siram'][$ca->bulan] = $ca->standart;
						$data['kali'][$ca->bulan] = $ca->kali;
					}

					$data['activity_saving'] = $this->PerlocationPM2_model->get_summary_activity_saving($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
					$data['priority_1'] = $this->PerlocationPM2_model->get_summary_irrigation_priority($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], '1', $data['tahun_siram']);
					$data['priority_2'] = $this->PerlocationPM2_model->get_summary_irrigation_priority($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], '2', $data['tahun_siram']);
					$data['priority_3'] = $this->PerlocationPM2_model->get_summary_irrigation_priority($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], '3', $data['tahun_siram']);
					$data['priority_4'] = $this->PerlocationPM2_model->get_summary_irrigation_priority($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], '4', $data['tahun_siram']);
					$data['priority_5'] = $this->PerlocationPM2_model->get_summary_irrigation_priority($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], '5', $data['tahun_siram']);

					$this->load->view('WIP_PM/wilayah_SP', $data);
				break;
				//Harvest
				case 'HA':
					$data['category'] = $this->input->get('category');
					$data['type'] = $this->input->get('type');
					if($data['category'] == NULL){
						$data['category'] = "Total";
					}
					if($data['type'] == NULL){
						$data['type'] = "Total";
					}
					$data['tonase_panen'] = $this->TonasePanen_model->get_tonase_pm(NULL, $data['wilayah'].'1');
					$data['tonase_panen_category'] = $this->TonasePanen_model->get_tonase_category_pm(NULL, $data['wilayah'].'1');
					$data['tonase_panen_umur'] = $this->TonasePanen_model->get_tonase_umur_pm(NULL, $data['wilayah'].'1', $data["YEAR_BASE"]['nilai'], $data['category'], $data['type']);

					$data['harvest_cantergory'] = $this->PerlocationPM2_model->get_summary_harvest($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
					$data['harvest_cantergory_2'] = $this->PerlocationPM2_model->get_summary_harvest_2($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
					$data['harvest_cantergory_bulan'] = $this->PerlocationPM2_model->get_summary_harvest_category_bulan($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['type'], $data['category']);

					$this->load->view('WIP_PM/wilayah_HA', $data);
				break;

				//Material
				case 'MA':
					$data['unsur'] = $this->input->get('unsur');
					$data['material'] = $this->input->get('material');
					$data['lokasi'] = $this->input->get('lokasi');
					$data['sort'] = $this->input->get('sort');
					if($data['unsur'] == NULL){
						$data['unsur'] = 'Fertilizer';
					}
					if($data['sort'] == NULL){
						$data['sort'] = 'Quantity';
					}
					switch ($data['unsur']) {
				    case 'Fertilizer':
							$data['master_material'] = $this->Material_model->get_master_material_category('Fertilizer');
							if($data['material'] == NULL){
								$data['material'] = 'SNIT0000001';
							}
				    break;
				    case 'Herbicide':
							$data['master_material'] = $this->Material_model->get_master_material_category('Herbisida');
							if($data['material'] == NULL){
								$data['material'] = 'SHER0000006';
							}
				    break;
				    case 'Insecticide':
							$data['master_material'] = $this->Material_model->get_master_material_category('Insektisida');
							if($data['material'] == NULL){
								$data['material'] = '28-TEKASI-A00';
							}
				    break;
				    case 'Fungicide':
							$data['master_material'] = $this->Material_model->get_master_material_category('Fungisida');
							if($data['material'] == NULL){
								$data['material'] = 'SFUN0000010';
							}
				    break;
				    case 'Others':
							$data['master_material'] = $this->Material_model->get_master_material_category('Others');
							if($data['material'] == NULL){
								$data['material'] = 'SABS0000001';
							}
				    break;
					}

					$data['std_material'] = $this->PerlocationPM_model->get_summary_material($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Budget');
					$data['real_material'] = $this->PerlocationPM_model->get_summary_material($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], 'Real');
					$data['over_material'] = $this->PerlocationPM2_model->get_summary_material_over($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
					$data['SatuanMaterial'] = $this->PerlocationPM_model->get_satuan_metarial();

					$unsur = $this->Material_model->get_master_material_code($data['material']);

					$data['lokasi_unusur'] = $this->PerlocationPM_model->get_summary_material_unsur($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $unsur['material']);

					if($data['lokasi'] == NULL){
						$cek = 0;
						foreach ($data['lokasi_unusur'] as $lu) {
							$cek_lokasi[$cek] = $lu->lokasi;
							$cek++;
						}
						$data['lokasi'] = $cek_lokasi[0];
					}

					$desc_lokasi = $this->Lokasi_model->get_lokasi_code($data['lokasi']);
					$data['lokasi_quantity'] = $this->PerlocationPM_model->get_summary_material_lokasi($data['lokasi'], $desc_lokasi['kebun'], $unsur['material'], $data['sort']);

					$this->load->view('WIP_PM/wilayah_MA', $data);
				break;
				//Activity
				case 'AC':
					$data['ga'] = $this->input->get('ga');
					$data['activity'] = $this->input->get('activity');
					if($data['ga'] == NULL){
						$data['ga'] = 'ZN04';
					}
					$data['master_activity'] = $this->Activity_model->get_activity_only($data['ga']);

					if($data['activity'] == NULL){
						switch ($data['ga']) {
							case 'ZN01':
								$data['activity'] = '1113131115';
							break;
							case 'ZN02':
								$data['activity'] = '1115111111';
							break;
							case 'ZN03':
								$data['activity'] = '1117271111';
							break;
							case 'ZN04':
								$data['activity'] = '6111151360';
							break;
							case 'ZN05':
								$data['activity'] = '1311111111';
							break;
							case 'ZN06':
								$data['activity'] = '1315131113';
							break;
							case 'ZN07':
								$data['activity'] = '1313111113';
							break;
							case 'ZN08':
								$data['activity'] = '1321111111';
							break;
							case 'ZN09':
								$data['activity'] = '1325111116';
							break;
							case 'ZN10':
								$data['activity'] = '1511111519';
							break;
							case 'ZN11':
								$data['activity'] = '1321512111';
							break;
							case 'ZN12':
								$data['activity'] = '1319111311';
							break;
							case 'ZN13':
								$data['activity'] = '1323111125';
							break;
							case 'ZN14':
								$data['activity'] = '1911132311';
							break;
							case 'ZN15':
								$data['activity'] = '1113151323';
							break;
						}
					}

					$data['wip'] = $this->PerlocationPM_model->get_wip_cost_pm($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur']);
					$activity_real = $this->PerlocationPM_model->get_activity_perlocation($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['ga'], 'Real');
					foreach ($activity_real as $ar) {
						$data['activity_real']['A'.$ar->activity_code] = $ar->biaya;
					}

					$activity_budget = $this->PerlocationPM_model->get_activity_perlocation($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['ga'], 'Budget');
					foreach ($activity_budget as $ar) {
						$data['activity_budget']['A'.$ar->activity_code] = $ar->biaya;
					}

					$activity_over = $this->PerlocationPM_model->get_activity_perlocation($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['ga'], 'Over');
					foreach ($activity_over as $ar) {
						$data['activity_over']['A'.$ar->activity_code] = $ar->over_r / $ar->jumlah;
					}

					$data['lokasi_activity'] = $this->PerlocationPM_model->get_summary_activity($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['activity'], $data['ga']);
					$data['group_cost'] = $this->PerlocationPM2_model->get_element_cost_ec($data['wilayah'], $data['status'], $data['jenis'], $data['kelas'], $data['tahun'], $data['bulan'], $data['umur'], $data['ga']);

					$this->load->view('WIP_PM/wilayah_AC', $data);
				break;
			}
			$this->load->view('WIP_PM/include/footer');
		}
		else{
			header( "Location: /PIS/index.php/dashboard" );
		}
	}

	//Perlocation
	public function perlocation_pg(){
		session_start();
		$pg = $this->input->get("pg");
		$data['pg'] = $this->input->get("pg");
		if(isset($_SESSION['username'])){
			$this->User_model->reload_history_login($_SESSION['index']);
			if(in_array($pg, $_SESSION['read'])){
				//header( "Location: /PIS/index.php/WIP_PM_Dashboard/plantation_group?pg=".$pg);
			}
			else if($_SESSION['username']){
				header( "Location: /PIS/index.php/WIP_PM_Dashboard/plantation_group?pg=".$_SESSION['code']);
			}
		}
		else{
			header( "Location: /PIS/index.php");
		}
		$data['account'] = $this->User_model->get_user_index($_SESSION['index']);
		$data["konstanta"] = $this->Konstanta_model->get_konstanta_code("TGL_TARIK_DATA");

		$data['pg_desc'] = $this->PlantationGroup_model->get_plantation_group_pg($data['pg']);
		$data['wilayah_all'] = $this->Wilayah_model->get_wilayah_pg($data['pg']);
		$data['perlocation'] = $this->PerlocationPM3_model->get_perlocation_pm($pg, 'NS', 'All', 'All', 'All', 'Total', 'Total');

		$this->load->view('WIP_PM/include/header');
		$this->load->view('WIP_PM/perlocation_pg', $data);
    $this->load->view('WIP_PM/include/footer');
	}
	public function perlocation_wilayah(){
		session_start();
		$wilayah = $this->input->get('wilayah');
		$data['wilayah'] = $this->input->get("wilayah");
		if(isset($_SESSION['username'])){
			$this->User_model->reload_history_login($_SESSION['index']);
			if(in_array($wilayah, $_SESSION['read'])){
				//header( "Location: /PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=".$wilayah);
			}
			else{
				header( "Location: /PIS/index.php/WIP_PM_Dashboard/wilayah?wilayah=".$_SESSION['code']);
			}
		}
		else{
			header( "Location: /PIS/index.php");
		}
		$data['account'] = $this->User_model->get_user_index($_SESSION['index']);
		$data["konstanta"] = $this->Konstanta_model->get_konstanta_code("TGL_TARIK_DATA");

		$data['wilayah_desc'] = $this->Wilayah_model->get_wilayah_code($data['wilayah']);
		$data['perlocation'] = $this->PerlocationPM3_model->get_perlocation_pm($wilayah, 'NS', 'All', 'All', 'All', 'Total', 'Total');

		$this->load->view('WIP_PM/include/header');
		$this->load->view('WIP_PM/perlocation_wilayah', $data);
    $this->load->view('WIP_PM/include/footer');
	}
}
