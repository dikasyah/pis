<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_PM extends CI_Controller {

	function __construct()
	{
		parent :: __construct();
		$this->load->model('Wilayah_model');
		$this->load->model('PlantationGroup_model');
		$this->load->model('PerlocationPM_model');
		$this->load->model('PerlocationPM2_model');
		$this->load->model('Lokasi_model');
		$this->load->model('Konstanta_model');
		$this->load->model('Forcing_model');
		$this->load->model('DataMaster_model');
		$this->load->model('Forecast_model');
		$this->load->model('ElementCost_model');
		$this->load->model('ForecastOverhead_model');
		$this->load->model('Koreksi_model');
		$this->load->model('Irrigation_model');
		$this->load->model('TonasePanen_model');
		$this->load->model('GroupCost_model');
		$this->load->model('StdBiayaUmur_model');
		$this->load->model('Produksi_model');
		$this->load->model('Material_model');
		$this->load->model('PerlocationPM3_model');
		$this->load->model('PerlocationPM4_model');
		$this->load->model('SBT_model');
	}

	public function index()
	{
		session_start();
		if($_SESSION['index'] != '10011823'){
			header( "Location: /PIS" );
		}

		$data['wilayah'] = $this->Wilayah_model->get_wilayah_all();
		$data['plantation_groupg'] = $this->PlantationGroup_model->get_plantation_group_all();

		$this->load->view('WIP_PM/include/header');
    $this->load->view('admin/admin_pm.php', $data);
		$this->load->view('WIP_PM/include/footer');
	}

	function detail_lokasi(){
		$wilayah = $this->input->get('wilayah');
		if($wilayah == 'W01'){
			$query = $this->PerlocationPM_model->del_lokasi();
		}

		$konstanta = $this->Konstanta_model->get_konstanta_code("TGL_TARIK_DATA");
		$YEAR_BASE = $this->Konstanta_model->get_konstanta_code("YEAR_BASE");

		$lokasi_t0 = $this->PerlocationPM_model->get_lokasi_t0($wilayah);
		$lokasi_t1 = $this->PerlocationPM_model->get_lokasi_t1($wilayah);
		$lokasi_panen = $this->PerlocationPM_model->get_lokasi_panen($wilayah);

		foreach ($lokasi_t0 as $lok) {
			$lokasi = $this->Lokasi_model->get_lokasi_code($lok->lokasi_aktif);

			$date1 = round(strtotime($konstanta['nilai']) / 86400);
			$date2 = round(strtotime($lokasi['tgl_mulai_rawat']) / 86400);

			$umur = ceil(($date1-$date2) / 30.4583333333333);

			if($lok->tgl_real_forcing != NULL){
				$tgl_forcing = $lok->tgl_real_forcing;
			}
			else{
				$tgl_forcing = $lok->tgl_rencana_forcing;
			}

			$date1 = round(strtotime($konstanta['nilai']) / 86400);
			$date2 = round(strtotime($tgl_forcing) / 86400);

			$umur_f = ceil(($date1-$date2) / 30.4583333333333);

			$data = array(
				'pg' => $lok->pg,
				'wilayah' => $lok->wilayah,
				'kebun' => $lokasi['kebun'],
				'lokasi' => $lok->lokasi_aktif,
				'umur' => $umur,
				'umur_f' => $umur_f,
				'jenis' => $lok->jenis,
				'varietas' => $lok->varietas,
				'kelas' => $lok->kelas,
				'status' => $lok->status,
				'status_bk' => $lok->StatusBK,
				'luas' => $lok->luas,
				'tonase' => $lok->tonase,
				'TGLBK' => $lok->TGLBK,
				'TGLST' => $lok->TGLST,
				'tgl_perawatan' => $lokasi['tgl_mulai_rawat'],
				'tgl_forcing' => $tgl_forcing,
				'tgl_panen' => $lok->tgl_panen,
				'keterangan' => "Rencana"
			);

			$this->PerlocationPM_model->set_lokasi($data);
		}

		foreach ($lokasi_t1 as $lok) {
			$lokasi = $this->Lokasi_model->get_lokasi_code($lok->lokasi_aktif);

			$date1 = round(strtotime($konstanta['nilai']) / 86400);
			$date2 = round(strtotime($lokasi['tgl_mulai_rawat']) / 86400);

			$umur = ceil(($date1-$date2) / 30.4583333333333);

			if($lok->tgl_real_forcing != NULL){
				$tgl_forcing = $lok->tgl_real_forcing;
			}
			else{
				$tgl_forcing = $lok->tgl_rencana_forcing;
			}

			$date1 = round(strtotime($konstanta['nilai']) / 86400);
			$date2 = round(strtotime($tgl_forcing) / 86400);

			$umur_f = ceil(($date1-$date2) / 30.4583333333333);

			$data = array(
				'pg' => $lok->pg,
				'wilayah' => $lok->wilayah,
				'kebun' => $lokasi['kebun'],
				'lokasi' => $lok->lokasi_aktif,
				'umur' => $umur,
				'umur_f' => $umur_f,
				'jenis' => $lok->jenis,
				'varietas' => $lok->varietas,
				'kelas' => $lok->kelas,
				'status' => $lok->status,
				'status_bk' => $lok->StatusBK,
				'luas' => $lok->luas,
				'tonase' => $lok->tonase,
				'TGLBK' => $lok->TGLBK,
				'TGLST' => $lok->TGLST,
				'tgl_perawatan' => $lokasi['tgl_mulai_rawat'],
				'tgl_forcing' => $tgl_forcing,
				'tgl_panen' => $lok->tgl_panen,
				'keterangan' => "Rencana"
			);

			$this->PerlocationPM_model->set_lokasi($data);
		}

		foreach ($lokasi_panen as $lok) {
			$lokasi_desc = $this->Lokasi_model->get_lokasi_code($lok->lokasi);
			$lokasi = $this->Produksi_model->get_produksi_code($lok->lokasi, $lok->status);

			$date1 = round(strtotime($lok->tgl_panen) / 86400);
			$date2 = round(strtotime($lokasi['tgl_awal_perawatan']) / 86400);

			$umur = ceil(($date1-$date2) / 30.4583333333333);

			$date1 = round(strtotime($lok->tgl_panen) / 86400);
			$date2 = round(strtotime($lok->tgl_forcing) / 86400);

			$umur_f = ceil(($date1-$date2) / 30.4583333333333);

			if(isset($lokasi_desc['kebun']) && substr($lokasi_desc['kebun'], 0, 1) == 'W'){
				$cek_kebun = $lokasi_desc['kebun'];
			}
			else{
				$cek_kebun = $lok->wilayah;
			}

			$data = array(
				'pg' => $lok->pg,
				'wilayah' => $lok->wilayah,
				'kebun' => $cek_kebun.'1',
				'lokasi' => $lok->lokasi,
				'umur' => $umur,
				'umur_f' => $umur_f,
				'jenis' => $lok->jenis,
				'varietas' => $lok->varietas,
				'kelas' => $lok->kelas,
				'status' => $lok->status,
				'status_bk' => $lok->StatusBK,
				'luas' => $lok->luas,
				'tonase' => $lok->tonase,
				'TGLBK' => $lok->TGLBK,
				'TGLST' => $lok->TGLST,
				'tgl_perawatan' => $lokasi['tgl_awal_perawatan'],
				'tgl_forcing' => $lok->tgl_forcing,
				'tgl_panen' => $lok->tgl_panen,
				'keterangan' => "Selesai"
			);

			$this->PerlocationPM_model->set_lokasi($data);
		}

		echo "<div class='row'>
			<div class='col-lg-12 text-center'>
				<h1>Update Success Lokasi $wilayah</h1>
			</div>
		</div>";

		if($wilayah == 'W14'){
			echo ("
				<script>
					window.location.href = '/PIS/Admin_PM';
					alert('Berhasil di update LOKASI');
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
					window.location.href = '/PIS/Admin_PM/detail_lokasi?wilayah=W".$cek_wil."';
				</script>
			");
		}
	}

	function detail_harvest_springkle_forcing(){
		$wilayah = $this->input->get('wilayah');
		if($wilayah == 'W01'){
			$query = $this->PerlocationPM2_model->del_harvest_category();
			$query = $this->PerlocationPM2_model->del_forcing_activity();
			$query = $this->PerlocationPM2_model->del_irrigation_priority();
			$query = $this->PerlocationPM4_model->del_activity_BKST_detail();

		}
		$cek = 1;

		$konstanta = $this->Konstanta_model->get_konstanta_code("TGL_TARIK_DATA");
		$YEAR_BASE = $this->Konstanta_model->get_konstanta_code("YEAR_BASE");

		$lokasi = $this->PerlocationPM_model->get_lokasi($wilayah);

		foreach ($lokasi as $lok) {
			if($lok->keterangan != 'Selesai'){
				$harvest = $this->PerlocationPM2_model->get_harvest_category($lok->lokasi, $lok->kebun);
			}
			else{
				$harvest = $this->PerlocationPM2_model->get_harvest_category($lok->lokasi, 'P'.substr($lok->kebun, 1, 2), date('Y', strtotime($lok->tgl_panen)));
			}

			$data_harvest['lokasi'] = $lok->lokasi;
			$data_harvest['1511111511'] = $harvest['Man_Rampet'];
			$data_harvest['1511111513'] = $harvest['Man_Selektif'];
			$data_harvest['1511111517'] = $harvest['Man_Kolekting'];
			$data_harvest['1511111519'] = $harvest['Man_Alami'];
			$data_harvest['1511111119'] = $harvest['Mek_Alami'];
			$data_harvest['1511111521'] = $harvest['Man_Bantuan'];
			$data_harvest['1511111111'] = $harvest['Mek_Rampet'];
			$data_harvest['1511111113'] = $harvest['Mek_Selektif_Pertama'];
			$data_harvest['1511111115'] = $harvest['Mek_Selektif_Rampet'];
			$data_harvest['keterangan'] = $lok->keterangan;

			$this->PerlocationPM2_model->set_harvest_category($data_harvest);

			// $array_forcing['F1'] = '1321111111';
			// $array_forcing['FMa2'] = '1321111315';
			// $array_forcing['FMe2'] = '1321111311';
			// $array_forcing['FSM2'] = '1321111313';
			// $array_forcing['FMa3'] = '1321111515';
			// $array_forcing['FMe3'] = '1321111511';
			// $array_forcing['R1'] = '1321131115';
			// $array_forcing['RMa2'] = '1321131315';
			// $array_forcing['RMe2'] = '1321131311';

			$array_forcing[0] = '1321111111';
			$array_forcing[1] = '1321111315';
			$array_forcing[2] = '1321111311';
			$array_forcing[3] = '1321111313';
			$array_forcing[4] = '1321111515';
			$array_forcing[5] = '1321111511';
			$array_forcing[6] = '1321131115';
			$array_forcing[7] = '1321131315';
			$array_forcing[8] = '1321131311';
			$cek_f3 = 0;

			if($lok->status != 'NSSC'){
				$cek_kelas = $lok->kelas;
			}
			else{
				$cek_kelas = 'NSSC';
			}

			$std_tgl_forcing = $this->Konstanta_model->get_std_forcing_panen($lok->tgl_perawatan, $cek_kelas);

			$IForcing = 0;
			while($IForcing < sizeof($array_forcing)){
				$forcing = $this->PerlocationPM2_model->get_forcing_activity($lok->lokasi, $lok->kebun, $array_forcing[$IForcing], $std_tgl_forcing['tgl_forcing'], $lok->tgl_forcing);
				if($forcing['lokasi'] != NULL){
					$data_forcing['lokasi'] = $lok->lokasi;
					$data_forcing['activity'] = $forcing['aktivitas_code'];
					$data_forcing['Forcing'] = $forcing['Forcing'];
					$data_forcing['Cost'] = $forcing['Cost'];
					$data_forcing['Urea'] = $forcing['Urea'];
					$data_forcing['Borax'] = $forcing['Borax'];
					$data_forcing['Ethylene'] = $forcing['Ethylene'];
					$data_forcing['Ethepon'] = $forcing['Ethepon'];
					$data_forcing['Kaolin'] = $forcing['Kaolin'];
					$data_forcing['keterangan'] = "Rencana";
					$this->PerlocationPM2_model->set_forcing_activity($data_forcing);
				}
				$IForcing++;
			}

			$data_forcing_3['lokasi'] = $lok->lokasi;
			if($cek_f3 == 1 && $lok->status == 'NSFC'){
				$data_forcing_3['NSFC'] = 1;
				$data_forcing_3['NSSC'] = 0;
				$data_forcing_3['Others'] = 0;
			}
			else if($cek_f3 == 1 && $lok->status == 'NSSC'){
				$data_forcing_3['NSFC'] = 0;
				$data_forcing_3['NSSC'] = 1;
				$data_forcing_3['Others'] = 0;
			}
			else{
				$data_forcing_3['NSFC'] = 0;
				$data_forcing_3['NSSC'] = 0;
				$data_forcing_3['Others'] = 1;
			}
			$this->PerlocationPM2_model->set_forcing_3($data_forcing_3);

			$ActivityBK = $this->PerlocationPM4_model->get_activity_BKST($lok->lokasi, $lok->kebun, $lok->keterangan, substr($lok->tgl_panen, 0, 7), 'BK');
			foreach ($ActivityBK as $ABK) {
				$DataActivityBK['Lokasi'] = $lok->lokasi;
				$DataActivityBK['Jenis'] = 'BK';
				$DataActivityBK['ElementCostCode'] = $ABK->ECCode;
				$DataActivityBK['ElementCostDesc'] = $ABK->ECDesc;
				$DataActivityBK['ActivityCode'] = $ABK->ActCode;
				$DataActivityBK['ActivityDesc'] = $ABK->ActDesc;
				$DataActivityBK['Biaya'] = $ABK->Biaya;
				$DataActivityBK['STD'] = $ABK->SBT;
				if($DataActivityBK['Biaya'] > $DataActivityBK['STD']){
					$DataActivityBK['Over'] = 1;
				}
				else{
					$DataActivityBK['Over'] = 0;
				}
				$DataActivityBK['Keterangan'] = $lok->keterangan;
				$this->PerlocationPM4_model->set_activity_BKST_detail($DataActivityBK);
			}

			$ActivityST = $this->PerlocationPM4_model->get_activity_BKST($lok->lokasi, $lok->kebun, $lok->keterangan, substr($lok->tgl_panen, 0, 7), 'ST');
			foreach ($ActivityST as $AST) {
				$DataActivityST['Lokasi'] = $lok->lokasi;
				$DataActivityST['Jenis'] = 'ST';
				$DataActivityST['ElementCostCode'] = $AST->ECCode;
				$DataActivityST['ElementCostDesc'] = $AST->ECDesc;
				$DataActivityST['ActivityCode'] = $AST->ActCode;
				$DataActivityST['ActivityDesc'] = $AST->ActDesc;
				$DataActivityST['Biaya'] = $AST->Biaya;
				$DataActivityST['STD'] = $AST->SBT;
				if($DataActivityST['Biaya'] > $DataActivityST['STD']){
					$DataActivityST['Over'] = 1;
				}
				else{
					$DataActivityST['Over'] = 0;
				}
				$DataActivityST['Keterangan'] = $lok->keterangan;
				$this->PerlocationPM4_model->set_activity_BKST_detail($DataActivityST);
			}

			// echo "<pre>";
			// var_dump($ActivityBK);
			// var_dump($ActivityST);
			// echo "</pre>";
			// die();

			echo $lok->lokasi.' - '.$cek++;
			echo "<br />";
		}

		$irrigation = $this->PerlocationPM2_model->get_irrigation_priority($wilayah.'1');
		foreach ($irrigation as $ir) {
			$data_irrigation['lokasi'] = $ir->lokasi;
			$data_irrigation['tanggal'] = $ir->tanggal;
			$data_irrigation['luas_siram'] = $ir->luas_siram;
			$data_irrigation['luas'] = $ir->luas;
			$data_irrigation['keterangan'] = "Rencana";
			$this->PerlocationPM2_model->set_irrigation_priority($data_irrigation);
		}
		$irrigation = $this->PerlocationPM2_model->get_irrigation_priority($wilayah.'2');
		foreach ($irrigation as $ir) {
			$data_irrigation['lokasi'] = $ir->lokasi;
			$data_irrigation['tanggal'] = $ir->tanggal;
			$data_irrigation['luas_siram'] = $ir->luas_siram;
			$data_irrigation['luas'] = $ir->luas;
			$data_irrigation['keterangan'] = "Rencana";
			$this->PerlocationPM2_model->set_irrigation_priority($data_irrigation);
		}
		$irrigation = $this->PerlocationPM2_model->get_irrigation_priority($wilayah.'3');
		foreach ($irrigation as $ir) {
			$data_irrigation['lokasi'] = $ir->lokasi;
			$data_irrigation['tanggal'] = $ir->tanggal;
			$data_irrigation['luas_siram'] = $ir->luas_siram;
			$data_irrigation['luas'] = $ir->luas;
			$data_irrigation['keterangan'] = "Rencana";
			$this->PerlocationPM2_model->set_irrigation_priority($data_irrigation);
		}

		$irrigation = $this->PerlocationPM2_model->get_irrigation_priority('P'.substr($wilayah, 1, 2));
		foreach ($irrigation as $ir) {
			$data_irrigation['lokasi'] = $ir->lokasi;
			$data_irrigation['tanggal'] = $ir->tanggal;
			$data_irrigation['luas_siram'] = $ir->luas_siram;
			$data_irrigation['luas'] = $ir->luas;
			$data_irrigation['keterangan'] = "Selesai";
			$this->PerlocationPM2_model->set_irrigation_priority($data_irrigation);
		}

		echo "<div class='row'>
			<div class='col-lg-12 text-center'>
				<h1>Update Success Harvest dan Springkle $wilayah</h1>
			</div>
		</div>";

		if($wilayah == 'W14'){
			echo ("
				<script>
					window.location.href = '/PIS/Admin_PM';
					alert('Berhasil di update Harvest dan Springkle');
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
					window.location.href = '/PIS/Admin_PM/detail_harvest_springkle_forcing?wilayah=W".$cek_wil."';
				</script>
			");
		}
	}

	function detail_interval_foliar(){
		$wilayah = $this->input->get('wilayah');
		if($wilayah == 'W01'){
			$query = $this->PerlocationPM3_model->del_interval_foliar();
		}
		$cek = 0;

		$konstanta = $this->Konstanta_model->get_konstanta_code("TGL_TARIK_DATA");
		$YEAR_BASE = $this->Konstanta_model->get_konstanta_code("YEAR_BASE");

		$lokasi = $this->PerlocationPM_model->get_lokasi($wilayah);

		foreach ($lokasi as $lok) {
			if($lok->keterangan != 'Selesai'){
				$interval_foliar = $this->PerlocationPM3_model->get_interval_foliar($lok->lokasi, $lok->kebun);
			}
			else{
				$interval_foliar = $this->PerlocationPM3_model->get_interval_foliar($lok->lokasi, 'P'.substr($lok->kebun, 1, 2), date('Y', strtotime($lok->tgl_panen)));
			}

			$cek_lokasi	= "";
			$cek_interval	= 0;
			$cek_marge = 0;
			foreach ($interval_foliar as $if) {
				if($cek_lokasi != $if->lokasi){
					$cek_lokasi = $if->lokasi;
					$cek_interval = $if->hari;
				}
				$cek_marge = ($if->hari) - ($cek_interval);
				if($if->Forcing >= -7 && $if->Forcing <= 5 && $cek_marge > 5){
					$data_if['lokasi'] = $if->lokasi;
					$data_if['tgl_realisasi'] = $if->tgl_realisasi;
					$data_if['Forcing'] = $if->Forcing;
					$data_if['Interval'] = ($if->hari) - ($cek_interval);
					$data_if['keterangan'] = $lok->keterangan;

					$this->PerlocationPM3_model->set_interval_foliar($data_if);
				}

				$cek_interval = $if->hari;
			}

			echo $lok->lokasi.' - '.$cek++;
			echo "<br />";
		}

		echo "<div class='row'>
			<div class='col-lg-12 text-center'>
				<h1>Update Success Inteval Foliar $wilayah</h1>
			</div>
		</div>";

		if($wilayah == 'W14'){
			echo ("
				<script>
					window.location.href = '/PIS/Admin_PM';
					alert('Berhasil di update Interval Foliar');
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
					window.location.href = '/PIS/Admin_PM/detail_interval_foliar?wilayah=W".$cek_wil."';
				</script>
			");
		}
	}

	function detail_lokasi_cost(){
		$wilayah = $this->input->get('wilayah');
		if($wilayah == 'W01'){
			$query = $this->PerlocationPM_model->del_lokasi_cost();
		}
		$cek = 1;

		$konstanta = $this->Konstanta_model->get_konstanta_code("TGL_TARIK_DATA");
		$YEAR_BASE = $this->Konstanta_model->get_konstanta_code("YEAR_BASE");

		$lokasi = $this->PerlocationPM_model->get_lokasi($wilayah);

		foreach ($lokasi as $lok) {
			if($lok->status != 'NSSC'){
				$cek_kelas = $lok->kelas;
			}
			else{
				$cek_kelas = 'NSSC';
			}
			$std_forcing_panen = $this->Konstanta_model->get_std_forcing_panen($lok->tgl_perawatan, $cek_kelas);
			if($lok->keterangan != 'Selesai'){
				$biaya_forcing = $this->Forcing_model->get_biaya_forcing($lok->lokasi, $lok->kebun, $std_forcing_panen['tgl_forcing'], $lok->tgl_forcing);
			}
			else{
				$biaya_forcing = $this->Forcing_model->get_biaya_forcing_panen($lok->lokasi, 'P'.substr($lok->kebun, 1, 2), $std_forcing_panen['tgl_forcing'], $lok->tgl_forcing, date('Y', strtotime($lok->tgl_panen)));
			}

			$lokasi = $this->Lokasi_model->get_lokasi_code($lok->lokasi);

			if($lok->keterangan != 'Selesai'){
				if(date('Y', strtotime($lok->tgl_panen)) == date('Y', strtotime($YEAR_BASE['nilai']))){
					$cek_produksi = 'produksi';
				}
				else{
					$cek_produksi = 'produksi_t1';
				}

				$ZN01_real = $this->DataMaster_model->get_real_actual_code_zn01_zn04($lok->lokasi, $lok->status, 'ZN01', $cek_produksi);
				$ZN03_real = $this->DataMaster_model->get_real_actual_code_zn01_zn04($lok->lokasi, $lok->status, 'ZN03', $cek_produksi);
				$ZN04_real = $this->DataMaster_model->get_real_actual_code_zn01_zn04($lok->lokasi, $lok->status, 'ZN04', $cek_produksi);
				if($ZN01_real['total'] == NULL || $ZN01_real['total'] == 0){
					$ZN01_real = $this->DataMaster_model->get_element_cost_code_jenis($lok->lokasi, "ZN01", $lok->kebun);
				}
				if($ZN03_real['total'] == NULL || $ZN03_real['total'] == 0){
					$ZN03_real = $this->DataMaster_model->get_element_cost_code_jenis($lok->lokasi, "ZN03", $lok->kebun);
					if($lok->status == 'NSFC'){
						if($lok->tgl_perawatan >= "2019-05-01"){
							$ZN03_real['total'] = $ZN03_real['total'] + (1000000 * $lok->luas);
						}
						else{
							$ZN03_real['total'] = $ZN03_real['total'] + (3676535.88918288 * $lok->luas);
						}
					}
				}
				$ZN04_cek = 1;
				if($ZN04_real['total'] == NULL || $ZN04_real['total'] == 0){
					$ZN04_cek = 0;
					$ZN04_real = $this->DataMaster_model->get_element_cost_code_jenis($lok->lokasi, "ZN04", $lok->kebun);
				}
				$element_cost_real = array(
					'ZN01' => $ZN01_real,
					'ZN02' => $this->DataMaster_model->get_element_cost_code_jenis($lok->lokasi, "ZN02", $lok->kebun),
					'ZN03' => $ZN03_real,
					'ZN04' => $ZN04_real,
					'ZN05' => $this->DataMaster_model->get_element_cost_code_jenis($lok->lokasi, "ZN05", $lok->kebun),
					'ZN06' => $this->DataMaster_model->get_element_cost_code_jenis($lok->lokasi, "ZN06", $lok->kebun),
					'ZN07' => $this->DataMaster_model->get_element_cost_code_jenis($lok->lokasi, "ZN07", $lok->kebun),
					'ZN08' => $this->DataMaster_model->get_element_cost_code_jenis($lok->lokasi, "ZN08", $lok->kebun),
					'ZN09' => $this->DataMaster_model->get_element_cost_code_jenis($lok->lokasi, "ZN09", $lok->kebun),
					'ZN10' => $this->DataMaster_model->get_element_cost_code_jenis($lok->lokasi, "ZN10", $lok->kebun),
					'ZN11' => $this->DataMaster_model->get_element_cost_code_jenis($lok->lokasi, "ZN11", $lok->kebun),
					'ZN12' => $this->DataMaster_model->get_element_cost_code_jenis($lok->lokasi, "ZN12", $lok->kebun),
					'ZN13' => $this->DataMaster_model->get_element_cost_code_jenis($lok->lokasi, "ZN13", $lok->kebun),
					'ZN14' => $this->DataMaster_model->get_element_cost_code_jenis($lok->lokasi, "ZN14", $lok->kebun),
					'ZN15' => $this->DataMaster_model->get_element_cost_code_jenis($lok->lokasi, "ZN15", $lok->kebun)
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
			}
			else{
				$element_cost_real = $this->PerlocationPM3_model->get_element_cost_code_jenis($lok->lokasi, $lok->status);
				$total_real = 0;
				for ($i=1; $i <= 15 ; $i++) {
					if($i < 10){
						$total_real += ($element_cost_real['ZN0'.$i]);
					}
					else{
						$total_real += ($element_cost_real['ZN'.$i]);
					}
				}
			}
			if(date('Y', strtotime($lok->tgl_panen)) == date('Y', strtotime($YEAR_BASE['nilai']))){
				$cek_panen = 1;
				$element_cost_f = array(
					'ZN01' => $this->Forecast_model->get_element_cost_code_jenis($lok->lokasi, "ZN01", $lok->umur),
					'ZN02' => $this->Forecast_model->get_element_cost_code_jenis($lok->lokasi, "ZN02", $lok->umur),
					'ZN03' => $this->Forecast_model->get_element_cost_code_jenis($lok->lokasi, "ZN03", $lok->umur),
					'ZN04' => $this->Forecast_model->get_element_cost_code_jenis($lok->lokasi, "ZN04", $lok->umur),
					'ZN05' => $this->Forecast_model->get_element_cost_code_jenis($lok->lokasi, "ZN05", $lok->umur),
					'ZN06' => $this->Forecast_model->get_element_cost_code_jenis($lok->lokasi, "ZN06", $lok->umur),
					'ZN07' => $this->Forecast_model->get_element_cost_code_jenis($lok->lokasi, "ZN07", $lok->umur),
					'ZN081' => $this->Forecast_model->get_element_cost_code_jenis($lok->lokasi, "ZN08", 1),
					'ZN082' => $this->Forecast_model->get_element_cost_code_jenis($lok->lokasi, "ZN08", 2),
					'ZN083' => $this->Forecast_model->get_element_cost_code_jenis($lok->lokasi, "ZN08", 3),
					'ZN09' => $this->Forecast_model->get_element_cost_code_jenis($lok->lokasi, "ZN09", $lok->umur),
					'ZN10' => $this->Forecast_model->get_element_cost_code_jenis($lok->lokasi, "ZN10", $lok->umur),
					'ZN11' => $this->Forecast_model->get_element_cost_code_jenis($lok->lokasi, "ZN11", $lok->umur),
					'ZN12' => $this->Forecast_model->get_element_cost_code_jenis($lok->lokasi, "ZN12", $lok->umur),
					'ZN13' => $this->Forecast_model->get_element_cost_code_jenis($lok->lokasi, "ZN13", $lok->umur),
					'ZN14' => $this->Forecast_model->get_element_cost_code_jenis($lok->lokasi, "ZN14", $lok->umur),
					'ZN15' => $this->Forecast_model->get_element_cost_code_jenis($lok->lokasi, "ZN15", $lok->umur),
				);
			}
			else{
				$cek_panen = 2;
				$element_cost_f = array(
					'ZN01' => $this->Forecast_model->get_element_cost_code_jenis($lok->lokasi, "ZN01", $lok->umur),
					'ZN02' => $this->Forecast_model->get_element_cost_code_jenis($lok->lokasi, "ZN02", $lok->umur),
					'ZN03' => $this->Forecast_model->get_element_cost_code_jenis($lok->lokasi, "ZN03", $lok->umur),
					'ZN04' => $this->Forecast_model->get_element_cost_code_jenis_t1($lok->lokasi, "ZN04", $lok->umur),
					'ZN05' => $this->Forecast_model->get_element_cost_code_jenis_t1($lok->lokasi, "ZN05", $lok->umur),
					'ZN06' => $this->Forecast_model->get_element_cost_code_jenis_t1($lok->lokasi, "ZN06", $lok->umur),
					'ZN07' => $this->Forecast_model->get_element_cost_code_jenis_t1($lok->lokasi, "ZN07", $lok->umur),
					'ZN081' => $this->Forecast_model->get_element_cost_code_jenis_t1($lok->lokasi, "ZN08", 1),
					'ZN082' => $this->Forecast_model->get_element_cost_code_jenis_t1($lok->lokasi, "ZN08", 2),
					'ZN083' => $this->Forecast_model->get_element_cost_code_jenis_t1($lok->lokasi, "ZN08", 3),
					'ZN09' => $this->Forecast_model->get_element_cost_code_jenis_t1($lok->lokasi, "ZN09", $lok->umur),
					'ZN10' => $this->Forecast_model->get_element_cost_code_jenis_t1($lok->lokasi, "ZN10", $lok->umur),
					'ZN11' => $this->Forecast_model->get_element_cost_code_jenis_t1($lok->lokasi, "ZN11", $lok->umur),
					'ZN12' => $this->Forecast_model->get_element_cost_code_jenis_t1($lok->lokasi, "ZN12", $lok->umur),
					'ZN13' => $this->Forecast_model->get_element_cost_code_jenis_t1($lok->lokasi, "ZN13", $lok->umur),
					'ZN14' => $this->Forecast_model->get_element_cost_code_jenis_t1($lok->lokasi, "ZN14", $lok->umur),
					'ZN15' => $this->Forecast_model->get_element_cost_code_jenis($lok->lokasi, "ZN15", $lok->umur),
				);
			}
			$element_cost_all = $this->ElementCost_model->get_element_cost_all();
			$forecast_overhead = array(
				'ZN04' => $this->ForecastOverhead_model->get_forecast_overhead_code("ZN04", $lok->status, date('n', strtotime($lok->tgl_panen))),
				'ZN05' => $this->ForecastOverhead_model->get_forecast_overhead_code("ZN05", $lok->status, date('n', strtotime($lok->tgl_panen))),
				'ZN06' => $this->ForecastOverhead_model->get_forecast_overhead_code("ZN06", $lok->status, date('n', strtotime($lok->tgl_panen))),
				'ZN10' => $this->ForecastOverhead_model->get_forecast_overhead_code("ZN10", $lok->status, date('n', strtotime($lok->tgl_panen))),
				'ZN13' => $this->ForecastOverhead_model->get_forecast_overhead_code("ZN13", $lok->status, date('n', strtotime($lok->tgl_panen)))
			);
			$koreksi = $this->Koreksi_model->get_koreksi_code($lok->lokasi);
			$tgl_irrigation = array(
				'start' => $this->Konstanta_model->get_konstanta_code('TGL_IRRIGATION_START'),
				'finish' => $this->Konstanta_model->get_konstanta_code('TGL_IRRIGATION_FINISH')
			);
			$tgl_irrigation_t1 = array(
				'start' => $this->Konstanta_model->get_konstanta_code('TGL_IRRIGATION_START_T1'),
				'finish' => $this->Konstanta_model->get_konstanta_code('TGL_IRRIGATION_FINISH_T1')
			);
			$std_interval_siram = $this->Irrigation_model->get_interval_siram($lok->pg);
			$lok->tonase_panen = array(
				'alami' => $this->TonasePanen_model->get_tonase_panen_code($lok->lokasi, "Alami", $lok->kebun),
				'manual' => $this->TonasePanen_model->get_tonase_panen_code($lok->lokasi, "Manual", $lok->kebun),
				'reguler' => $this->TonasePanen_model->get_tonase_panen_code($lok->lokasi, "Reguler", $lok->kebun)
			);

			//Start
			$data['lokasi'] = $lok->lokasi;
		  $total_bpp = 0;
		  $total_rfb = 0;
		  $total_rf = 0;
		  $total_r = 0;
		  $total_f = 0;
		  foreach ($element_cost_all as $ec) {
	      if($cek_panen == 1){
	        if($lok->status == "NSFC"){
	          $bpp = $ec->BPP_NSFC_ha;
	        }
	        else{
	          $bpp = $ec->BPP_NSSC_ha;
	        }
	      }
	      else{
	        if($lok->status == "NSFC"){
	          $bpp = $ec->BPP_NSFC_ha_t1;
	        }
	        else{
	          $bpp = $ec->BPP_NSSC_ha_t1;
	        }
	      }
	      $bpp = $bpp * $lok->luas;

		    $rfb = $bpp;
		    $total_bpp += $bpp;
		    $total_rfb += $bpp;

		    if(isset($forecast_overhead[$ec->code]['fo'])){
		      $fo = $forecast_overhead[$ec->code]['fo'];
		    }
		    else{
		      $fo = 0;
		    }

		    $total_tonase_panen = 0;
		    if($lok->tonase_panen['alami']['produksi_ton'] == NULL){
		      $produksi_alami = 0;
		    }
		    else{
		      $produksi_alami = $lok->tonase_panen['alami']['produksi_ton'] * 1000;
		    }
		    if($lok->tonase_panen['reguler']['produksi_ton'] == NULL){
		      $produksi_reguler = 0;
		    }
		    else{
		      $total_tonase_panen += $lok->tonase_panen['reguler']['produksi_ton'];
		      $produksi_reguler = $lok->tonase_panen['reguler']['produksi_ton'] * 1000;
		    }

		    $help_asumsi_alami = $this->Forecast_model->get_help_zn10(date('n', strtotime($lok->tgl_panen)));

				if($lok->keterangan != 'Selesai'){
					$total_r += $element_cost_real[$ec->code]['total'];
			    $real_rf = $element_cost_real[$ec->code]['total'];
			    switch ($ec->code) {
			      case 'ZN01':
			        if($element_cost_real['ZN10']['total'] / $lok->tonase / 1000 < 100){
			          $real_rf = $element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $lok->luas);
			        }
			        else{
			          $real_rf = $element_cost_real[$ec->code]['total'];
			        }
			      break;
			      case 'ZN02':
			        if($element_cost_real['ZN10']['total'] / $lok->tonase / 1000 < 100){
			          $real_rf = $element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $lok->luas);
			        }
			        else{
			          $real_rf = $element_cost_real[$ec->code]['total'];
			        }
			      break;
			      case 'ZN03':
			        if($element_cost_real['ZN10']['total'] / $lok->tonase / 1000 < 100){
			          $real_rf = $element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $lok->luas);
			        }
			        else{
			          $real_rf = $element_cost_real[$ec->code]['total'];
			        }
			      break;
			      case 'ZN04':
			        if($element_cost_real['ZN10']['total'] / $lok->tonase / 1000 < 100){
			          if($fo != NULL){
			            if($element_cost_real['ZN08']['total'] > 0){
			              if(substr($lok->status, 2, 2) == 'FC'){
			                $real_rf = $element_cost_real[$ec->code]['total'] + (800000 * $lok->luas) + ((800000 * $lok->luas) * $fo);
			              }
			              else{
			                $real_rf = $element_cost_real[$ec->code]['total'] + (500000 * $lok->luas) + ((500000 * $lok->luas) * $fo);
			              }
			            }
			            else{
			              if(substr($lok->status, 2, 2) == 'FC'){
			                $real_rf = $element_cost_real[$ec->code]['total'] + (1300000 * $lok->luas) + ((1300000 * $lok->luas) * $fo);
			              }
			              else{
			                $real_rf = $element_cost_real[$ec->code]['total'] + (890000 * $lok->luas) + ((890000 * $lok->luas) * $fo);
			              }
			            }
			          }
			          else{
			            if($element_cost_real['ZN08']['total'] > 0){
			              if(substr($lok->status, 2, 2) == 'FC'){
			                $real_rf = $element_cost_real[$ec->code]['total'] + (800000 * $lok->luas);
			              }
			              else{
			                $real_rf = $element_cost_real[$ec->code]['total'] + (500000 * $lok->luas);
			              }
			            }
			            else{
			              if(substr($lok->status, 2, 2) == 'FC'){
			                $real_rf = $element_cost_real[$ec->code]['total'] + (1300000 * $lok->luas);
			              }
			              else{
			                $real_rf = $element_cost_real[$ec->code]['total'] + (890000 * $lok->luas);
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
			        $hari_perawatan = strtotime($lok->tgl_perawatan) / 86400;
			        $hari_forcing = strtotime($lok->tgl_forcing) / 86400;

			        if(substr($lok->status, 2, 2) == 'FC'){
			          if(($hari_tarik_data - $hari_perawatan) > 80){
			            $jumlah_aplikasi_1 = round(($hari_forcing - 104) - $hari_tarik_data) / 20;
			          }
			          else{
			            $jumlah_aplikasi_1 = round(($hari_forcing - 104) - ($hari_perawatan + 80)) / 20;
			          }
			        }
			        else if(substr($lok->status, 2, 2) == 'SC'){
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

			        if(substr($lok->status, 2, 2) == 'FC'){
			          if(($hari_forcing - $hari_tarik_data) > 104){
			            $jumlah_aplikasi_2 = 104 / 15;
			          }
			          else{
			            $jumlah_aplikasi_2 = round($hari_forcing - $hari_tarik_data) / 15;
			          }
			        }
			        else if(substr($lok->status, 2, 2) == 'SC'){
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

			        if(substr($lok->status, 2, 2) == 'FC'){
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
		            $real_rf = $element_cost_real[$ec->code]['total'] + ($ZN05_f * $lok->luas) + (($ZN05_f * $lok->luas) * $fo);
		          }
		          else{
		            $real_rf = $element_cost_real[$ec->code]['total'] + ($ZN05_f * $lok->luas);
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
			        if($element_cost_real['ZN10']['total'] / $lok->tonase / 1000 < 100){
			          if($fo != NULL){
			            $real_rf = $element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $lok->luas) + (($element_cost_f[$ec->code]['rp_per_ha'] * $lok->luas) * $fo);
			          }
			          else{
			            $real_rf = $element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $lok->luas);
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
			        if($element_cost_real['ZN10']['total'] / $lok->tonase / 1000 < 100){
			          $real_rf = $element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $lok->luas);
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
			      case 'ZN08':
			        if(($element_cost_real[$ec->code]['total'] / $lok->luas) <= 500000){
			          $ZN08_f = $element_cost_f['ZN081']['rp_per_ha'];
			        }
			        else if(($element_cost_real[$ec->code]['total'] / $lok->luas) <= 1000000){
			          $ZN08_f = $element_cost_f['ZN082']['rp_per_ha'];
			        }
			        else{
								if($lokasi['tgl_forcing_realisasi'] != NULL){
									$ZN08_f = 0;
								}
								else{
			          	$ZN08_f = $element_cost_f['ZN083']['rp_per_ha'];
								}
			        }

		          $real_rf = $element_cost_real[$ec->code]['total'] + ($ZN08_f * $lok->luas);
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
			          $real_rf = $element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $lok->luas);
			        }
			        else{
			          $real_rf = $element_cost_real[$ec->code]['total'];
			        }
			        break;
			      case 'ZN10':
			        $persen_alami = ($produksi_alami / ($lok->tonase * 1000));
			        if(substr($lok->status, 2, 2) == 'FC'){
			          $persen_asumsi_alami = $help_asumsi_alami['ZN10'];
			        }
			        else{
			          $persen_asumsi_alami = '0.01';
			        }

			        if((date('Y-m', strtotime($konstanta['nilai'])) == date('Y-m', strtotime($lok->tgl_panen))) || strtotime($konstanta['nilai']) >= strtotime($lok->tgl_panen)){
			          $sisa_BPP_alami = 0;
			        }
			        else{
			          if($persen_alami > $persen_asumsi_alami){
			            $sisa_BPP_alami = (0.03 * 1000 * $lok->tonase);
			          }
			          else{
			            $sisa_BPP_alami = (($persen_asumsi_alami - $persen_alami) * 1000 * $lok->tonase);
			          }
			        }

			        if(($lok->tonase * 1000) - $sisa_BPP_alami - $produksi_alami - $produksi_reguler < 0){
			          $sisa_BPP_reguler = (0 * 1000 * $lok->tonase);
			        }
			        else{
			          $sisa_BPP_reguler = ($lok->tonase * 1000) - $sisa_BPP_alami - $produksi_alami - $produksi_reguler;
			        }

			        $cek_tonase = $sisa_BPP_reguler + $sisa_BPP_alami + $produksi_alami + $produksi_reguler - ($lok->tonase * 1000);
			        if(substr($lok->status, 2, 2) == 'FC'){
			          $BPP_pnn_alami = $sisa_BPP_alami * 390;
			          $BPP_pnn_reguler = $sisa_BPP_reguler * 116.927412395172;
			          $exclude_panen = 100.14517106282 * ($sisa_BPP_alami + $sisa_BPP_reguler);
			        }
			        else{
			          $BPP_pnn_alami = $sisa_BPP_alami * 610.726268365189;
			          $BPP_pnn_reguler = $sisa_BPP_reguler * 136.355022188611;
			          $exclude_panen = 108.376536114483 * ($sisa_BPP_alami + $sisa_BPP_reguler);
			        }

			        $ZN10_f = ($BPP_pnn_alami + $BPP_pnn_reguler + $exclude_panen) / $lok->luas;

			        $real_rf = $element_cost_real[$ec->code]['total'] + ($ZN10_f * $lok->luas);
			      break;
			      case 'ZN11':
			        $real_rf = $element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $lok->luas);
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
			        if($element_cost_real['ZN10']['total'] / $lok->tonase / 1000 < 100){
			          $real_rf = $element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $lok->luas);
			        }
			        else{
			          $real_rf = $element_cost_real[$ec->code]['total'];
			        }
			      break;
			      case 'ZN13':
			        if(($lok->tgl_panen > $tgl_irrigation['start']['nilai']) && ($lok->tgl_panen < $tgl_irrigation['finish']['nilai'])){
			          $tgl_1 = floor((((strtotime($lok->tgl_panen) - strtotime($tgl_irrigation['start']['nilai'])) / 86400) - 5) / $std_interval_siram['siram']);
			        }
			        else if(($lok->tgl_panen > $tgl_irrigation['start']['nilai']) && ($lok->tgl_panen > $tgl_irrigation['finish']['nilai'])){
			          $tgl_1 = floor((((strtotime($tgl_irrigation['finish']['nilai']) - strtotime($tgl_irrigation['start']['nilai'])) / 86400) - 5) / $std_interval_siram['siram']);
			        }
			        else{
			          $tgl_1 = 0;
			        }
			        if($tgl_1 < 0){
			          $tgl_1 = 0;
			        }

			        if(($lok->tgl_panen > $tgl_irrigation_t1['start']['nilai']) && ($lok->tgl_panen < $tgl_irrigation_t1['finish']['nilai'])){
			          $tgl_2 = floor((((strtotime($lok->tgl_panen) - strtotime($tgl_irrigation_t1['start']['nilai'])) / 86400) - 5) / 10);
			        }
			        else if(($lok->tgl_panen > $tgl_irrigation_t1['start']['nilai']) && ($lok->tgl_panen > $tgl_irrigation_t1['finish']['nilai'])){
			          $tgl_2 = floor((((strtotime($tgl_irrigation_t1['finish']['nilai']) - strtotime($tgl_irrigation_t1['start']['nilai'])) / 86400) - 5) / 10);
			        }
			        else{
			          $tgl_2 = 0;
			        }
			        if($tgl_2 < 0){
			          $tgl_2 = 0;
			        }

			        if(date('Y', strtotime($lok->tgl_panen)) == date('Y', strtotime($YEAR_BASE['nilai']))){
			          if(substr($lok->status, 2, 2) == 'FC'){
			            $jumlah_irrigation_1 = (550000 * $tgl_1) * 0.75;
			            $jumlah_irrigation_2 = 0;
			          }
			          else{
			            $jumlah_irrigation_1 = (550000 * $tgl_1) * 0.4;
			            $jumlah_irrigation_2 = 0;
			          }
			        }
			        else{
			          if(substr($lok->status, 2, 2) == 'FC'){
			            $jumlah_irrigation_1 = (550000 * $tgl_1) * 0.55;
			            $jumlah_irrigation_2 = (550000 * $tgl_2) * 0.75;
			          }
			          else{
			            $jumlah_irrigation_1 = (550000 * $tgl_1) * 0.2;
			            $jumlah_irrigation_2 = (550000 * $tgl_2) * 0.3;
			          }
			        }

			        $ZN13_f = $jumlah_irrigation_1 + $jumlah_irrigation_2;

			        // if($element_cost_real['ZN10']['total'] / $lok->tonase / 1000 < 100){
			          if($fo != NULL){
			            $real_rf = $element_cost_real[$ec->code]['total'] + ($ZN13_f * $lok->luas) + (($ZN13_f * $lok->luas) * $fo);
			          }
			          else{
			            $real_rf = $element_cost_real[$ec->code]['total'] + ($ZN13_f * $lok->luas);
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
			        if($element_cost_real['ZN10']['total'] / $lok->tonase / 1000 < 100){
			          $real_rf = $element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $lok->luas);
			        }
			        else{
			          $real_rf = $element_cost_real[$ec->code]['total'];
			        }
			      break;
			      case 'ZN15':
			        if($element_cost_real['ZN10']['total'] / $lok->tonase / 1000 < 100){
			          $real_rf = $element_cost_real[$ec->code]['total'] + ($element_cost_f[$ec->code]['rp_per_ha'] * $lok->luas);
			        }
			        else{
			          $real_rf = $element_cost_real[$ec->code]['total'];
			        }
			      break;
			    }

			    $total_rf += $real_rf;
			    $total_f += $real_rf - $element_cost_real[$ec->code]['total'];

					$data[$ec->code.'_r'] = $element_cost_real[$ec->code]['total'];
					$data[$ec->code.'_f'] = ($real_rf - $element_cost_real[$ec->code]['total']);
				}
				else{
					$total_r += $element_cost_real[$ec->code];
			    $total_f += 0;

					$data[$ec->code.'_r'] = $element_cost_real[$ec->code];
					$data[$ec->code.'_f'] = 0;
				}
		  }
			//End

			$data['ZNT_r'] = $total_r;
			$data['ZNT_f'] = $total_f;

			if($lok->keterangan != 'Selesai'){
				$group_cost_total = $this->GroupCost_model->get_group_cost_umur_total($lok->lokasi, $lok->kebun);
			}
			else{
				$group_cost_total = $this->GroupCost_model->get_group_cost_umur_total_panen($lok->lokasi, 'P'.substr($lok->kebun, 1, 2), date('Y', strtotime($lok->tgl_panen)));
			}
			if($lok->status == 'NSSC'){
				$kelas = 'NSSC';
			}
			else{
				$kelas = $lok->kelas;
			}
			$group_cost_std_total = $this->StdBiayaUmur_model->get_sbt_group_cost_real_total(date('Y', strtotime($lok->tgl_panen)), $lok->umur, $kelas);

			$data['labour_r'] = $group_cost_total['Labour'];
			$data['labour_b'] = $group_cost_std_total['Labour'] * $lok->luas;
			$data['chrage_r'] = $group_cost_total['Charge'];
			$data['charge_b'] = $group_cost_std_total['Charge'] * $lok->luas;
			$data['material_r'] = $group_cost_total['Material'];
			$data['material_b'] = $group_cost_std_total['Material'] * $lok->luas;
			$data['seed_r'] = $group_cost_total['Seed'];
			$data['seed_b'] = $group_cost_std_total['Seed'] * $lok->luas;

		  $jarak_forcing = $this->PerlocationPM3_model->cek_jarak_foring($std_forcing_panen['tgl_forcing'], $lok->tgl_forcing);

			$data['akurasi_forcing'] = $jarak_forcing['Forcing'];
			$data['cost_forcing'] = ($biaya_forcing['biaya_forcing_real'] - $biaya_forcing['biaya_forcing_std']);

			if($lok->keterangan == 'Selesai'){
				$total_rf = $total_real;
			}
		  if(((($total_rf - $total_bpp) / $total_bpp) * 100) <= -2){
		    $category = "Excellent";
		  }
		  else if(((($total_rf - $total_bpp) / $total_bpp) * 100) <= 2){
		    $category = "Good";
		  }
		  else{
		    $category = "Poor";
		  }
			$data['performance'] = $category;
			$data['keterangan'] = $lok->keterangan;

			$this->PerlocationPM_model->set_lokasi_cost($data);
			echo $lok->lokasi.' - '.$cek++;
			echo "<br />";
		}
		echo "<div class='row'>
			<div class='col-lg-12 text-center'>
				<h1>Update Success Cost $wilayah</h1>
			</div>
		</div>";

		if($wilayah == 'W14'){
			echo ("
				<script>
					window.location.href = '/PIS/Admin_PM';
					alert('Berhasil di update COST');
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
					window.location.href = '/PIS/Admin_PM/detail_lokasi_cost?wilayah=W".$cek_wil."';
				</script>
			");
		}
	}

	function detail_lokasi_material(){
		$wilayah = $this->input->get('wilayah');
		if($wilayah == 'W01'){
			$query = $this->PerlocationPM_model->del_lokasi_material_real();
			$query = $this->PerlocationPM_model->del_lokasi_material_real_total();
			$query = $this->PerlocationPM_model->del_lokasi_material_budget();
			$query = $this->PerlocationPM_model->del_lokasi_material_budget_total();
			$query = $this->PerlocationPM_model->del_lokasi_material_over();
			$query = $this->PerlocationPM_model->del_lokasi_material_qouta();
		}
		$cek = 1;

		$konstanta = $this->Konstanta_model->get_konstanta_code("TGL_TARIK_DATA");
		$YEAR_BASE = $this->Konstanta_model->get_konstanta_code("YEAR_BASE");

		$lokasi = $this->PerlocationPM_model->get_lokasi($wilayah);

		foreach ($lokasi as $lok) {
			if($lok->keterangan != 'Selesai'){
				$material = $this->PerlocationPM_model->get_material_real($lok->lokasi, $lok->kebun, $lok->tgl_perawatan, $lok->tgl_forcing, 'Umur');
				$material_total = $this->PerlocationPM_model->get_material_real($lok->lokasi, $lok->kebun, $lok->tgl_perawatan, $lok->tgl_forcing, 'Total');
			}
			else{
				$material = $this->PerlocationPM_model->get_material_real_panen($lok->lokasi, 'P'.substr($lok->kebun, 1, 2), $lok->tgl_perawatan, $lok->tgl_forcing, date('Y', strtotime($lok->tgl_panen)), 'Umur');
				$material_total = $this->PerlocationPM_model->get_material_real_panen($lok->lokasi, 'P'.substr($lok->kebun, 1, 2), $lok->tgl_perawatan, $lok->tgl_forcing, date('Y', strtotime($lok->tgl_panen)), 'Total');
			}

			foreach ($material as $m) {
				$data_material_real['lokasi'] = $lok->lokasi;
				$data_material_real['umur'] = $m->umur;
				$data_material_real['umur_f'] = $m->umur_f;
				$data_material_real['Urea'] = $m->Urea;
				$data_material_real['Urease'] = $m->Urease;
				$data_material_real['Za'] = $m->Za;
				$data_material_real['K2SO4'] = $m->K2SO4;
				$data_material_real['KCL'] = $m->KCL;
				$data_material_real['TSP'] = $m->TSP;
				$data_material_real['DAP'] = $m->DAP;
				$data_material_real['MgSO4'] = $m->MgSO4;
				$data_material_real['Kieserite'] = $m->Kieserite;
				$data_material_real['FeSO4'] = $m->FeSO4;

				$data_material_real['ZnSO4'] = $m->ZnSO4;
				$data_material_real['Dolomite'] = $m->Dolomite;
				$data_material_real['Gypsum'] = $m->Gypsum;
				$data_material_real['CuSO4'] = $m->CuSO4;
				$data_material_real['Borax'] = $m->Borax;
				$data_material_real['LOB'] = $m->LOB;
				$data_material_real['CaCl2'] = $m->CaCl2;
				$data_material_real['Calcibor'] = $m->Calcibor;
				$data_material_real['Kompos'] = $m->Kompos;
				$data_material_real['Belerang'] = $m->Belerang;

				$data_material_real['Kieserite_G'] = $m->Kieserite_G;
				$data_material_real['NPK'] = $m->NPK;
				$data_material_real['Petro_Cas'] = $m->Petro_Cas;
				$data_material_real['Fosetil'] = $m->Fosetil;
				$data_material_real['Metalaxil'] = $m->Metalaxil;
				$data_material_real['Propiconazole'] = $m->Propiconazole;
				$data_material_real['Prochloraz'] = $m->Prochloraz;
				$data_material_real['Mankozeb'] = $m->Mankozeb;
				$data_material_real['Folirfos'] = $m->Folirfos;
				$data_material_real['H3PO3'] = $m->H3PO3;

				$data_material_real['Detazeb'] = $m->Detazeb;
				$data_material_real['Bromacyl'] = $m->Bromacyl;
				$data_material_real['Diuron'] = $m->Diuron;
				$data_material_real['Glyphosate'] = $m->Glyphosate;
				$data_material_real['Quizalofop'] = $m->Quizalofop;
				$data_material_real['Ametrine'] = $m->Ametrine;
				$data_material_real['Bazza'] = $m->Bazza;
				$data_material_real['Tekasi'] = $m->Tekasi;
				$data_material_real['Tekila'] = $m->Tekila;
				$data_material_real['Chlorpyrifos'] = $m->Chlorpyrifos;

				$data_material_real['Sidazinon'] = $m->Sidazinon;
				$data_material_real['Propoxur'] = $m->Propoxur;
				$data_material_real['Cypermethrin'] = $m->Cypermethrin;
				$data_material_real['Bifentrin_EC'] = $m->Bifentrin_EC;
				$data_material_real['Bifentrin_G'] = $m->Bifentrin_G;
				$data_material_real['BPMC'] = $m->BPMC;
				$data_material_real['Clorpyrifos'] = $m->Clorpyrifos;
				$data_material_real['Abamectin'] = $m->Abamectin;
				$data_material_real['Sanisol'] = $m->Sanisol;
				$data_material_real['Ethylene'] = $m->Ethylene;

				$data_material_real['Ethepon'] = $m->Ethepon;
				$data_material_real['Kaolin'] = $m->Kaolin;
				$data_material_real['Zeolit'] = $m->Zeolit;
				$data_material_real['Rabas'] = $m->Rabas;
				$data_material_real['Ratgone'] = $m->Ratgone;
				$data_material_real['Indostick'] = $m->Indostick;
				$data_material_real['Organosilicon'] = $m->Organosilicon;
				$data_material_real['Soda_Ash'] = $m->Soda_Ash;
				$data_material_real['Sarineb'] = $m->Sarineb;
				$data_material_real['Sorento'] = $m->Sorento;

				$data_material_real['NPK_Haracoat'] = $m->NPK_Haracoat;
				$data_material_real['Oksifluorfen'] = $m->Oksifluorfen;
				$data_material_real['keterangan'] = $lok->keterangan;


				$this->PerlocationPM_model->set_lokasi_material_real($data_material_real);
			}

			foreach ($material_total as $m) {
				$data_material_real_total['lokasi'] = $lok->lokasi;
				$data_material_real_total['Urea'] = $m->Urea;
				$data_material_real_total['Urease'] = $m->Urease;
				$data_material_real_total['Za'] = $m->Za;
				$data_material_real_total['K2SO4'] = $m->K2SO4;
				$data_material_real_total['KCL'] = $m->KCL;
				$data_material_real_total['TSP'] = $m->TSP;
				$data_material_real_total['DAP'] = $m->DAP;
				$data_material_real_total['MgSO4'] = $m->MgSO4;
				$data_material_real_total['Kieserite'] = $m->Kieserite;
				$data_material_real_total['FeSO4'] = $m->FeSO4;

				$data_material_real_total['ZnSO4'] = $m->ZnSO4;
				$data_material_real_total['Dolomite'] = $m->Dolomite;
				$data_material_real_total['Gypsum'] = $m->Gypsum;
				$data_material_real_total['CuSO4'] = $m->CuSO4;
				$data_material_real_total['Borax'] = $m->Borax;
				$data_material_real_total['LOB'] = $m->LOB;
				$data_material_real_total['CaCl2'] = $m->CaCl2;
				$data_material_real_total['Calcibor'] = $m->Calcibor;
				$data_material_real_total['Kompos'] = $m->Kompos;
				$data_material_real_total['Belerang'] = $m->Belerang;

				$data_material_real_total['Kieserite_G'] = $m->Kieserite_G;
				$data_material_real_total['NPK'] = $m->NPK;
				$data_material_real_total['Petro_Cas'] = $m->Petro_Cas;
				$data_material_real_total['Fosetil'] = $m->Fosetil;
				$data_material_real_total['Metalaxil'] = $m->Metalaxil;
				$data_material_real_total['Propiconazole'] = $m->Propiconazole;
				$data_material_real_total['Prochloraz'] = $m->Prochloraz;
				$data_material_real_total['Mankozeb'] = $m->Mankozeb;
				$data_material_real_total['Folirfos'] = $m->Folirfos;
				$data_material_real_total['H3PO3'] = $m->H3PO3;

				$data_material_real_total['Detazeb'] = $m->Detazeb;
				$data_material_real_total['Bromacyl'] = $m->Bromacyl;
				$data_material_real_total['Diuron'] = $m->Diuron;
				$data_material_real_total['Glyphosate'] = $m->Glyphosate;
				$data_material_real_total['Quizalofop'] = $m->Quizalofop;
				$data_material_real_total['Ametrine'] = $m->Ametrine;
				$data_material_real_total['Bazza'] = $m->Bazza;
				$data_material_real_total['Tekasi'] = $m->Tekasi;
				$data_material_real_total['Tekila'] = $m->Tekila;
				$data_material_real_total['Chlorpyrifos'] = $m->Chlorpyrifos;

				$data_material_real_total['Sidazinon'] = $m->Sidazinon;
				$data_material_real_total['Propoxur'] = $m->Propoxur;
				$data_material_real_total['Cypermethrin'] = $m->Cypermethrin;
				$data_material_real_total['Bifentrin_EC'] = $m->Bifentrin_EC;
				$data_material_real_total['Bifentrin_G'] = $m->Bifentrin_G;
				$data_material_real_total['BPMC'] = $m->BPMC;
				$data_material_real_total['Clorpyrifos'] = $m->Clorpyrifos;
				$data_material_real_total['Abamectin'] = $m->Abamectin;
				$data_material_real_total['Sanisol'] = $m->Sanisol;
				$data_material_real_total['Ethylene'] = $m->Ethylene;

				$data_material_real_total['Ethepon'] = $m->Ethepon;
				$data_material_real_total['Kaolin'] = $m->Kaolin;
				$data_material_real_total['Zeolit'] = $m->Zeolit;
				$data_material_real_total['Rabas'] = $m->Rabas;
				$data_material_real_total['Ratgone'] = $m->Ratgone;
				$data_material_real_total['Indostick'] = $m->Indostick;
				$data_material_real_total['Organosilicon'] = $m->Organosilicon;
				$data_material_real_total['Soda_Ash'] = $m->Soda_Ash;
				$data_material_real_total['Sarineb'] = $m->Sarineb;
				$data_material_real_total['Sorento'] = $m->Sorento;

				$data_material_real_total['NPK_Haracoat'] = $m->NPK_Haracoat;
				$data_material_real_total['Oksifluorfen'] = $m->Oksifluorfen;
				$data_material_real_total['keterangan'] = $lok->keterangan;

				$this->PerlocationPM_model->set_lokasi_material_real_total($data_material_real_total);
			}

			if($lok->status == 'NSSC'){
				$kelas = 'NSSC';
			}
			else{
				$kelas = $lok->kelas;
			}

			$a = 1;
			$b = $lok->umur_f - $lok->umur;
			while ($a <= $lok->umur) {
				$budget = $this->PerlocationPM_model->get_material_budget($kelas, $a, 'Umur');

				$data_material_budget['lokasi'] = $lok->lokasi;
				$data_material_budget['umur'] = $a;
				$data_material_budget['umur_f'] = $b;
				$data_material_budget['Urea'] = $budget['Urea'] * $lok->luas;
				$data_material_budget['Urease'] = $budget['Urease'] * $lok->luas;
				$data_material_budget['Za'] = $budget['Za'] * $lok->luas;
				$data_material_budget['K2SO4'] = $budget['K2SO4'] * $lok->luas;
				$data_material_budget['KCL'] = $budget['KCL'] * $lok->luas;
				$data_material_budget['TSP'] = $budget['TSP'] * $lok->luas;
				$data_material_budget['DAP'] = $budget['DAP'] * $lok->luas;
				$data_material_budget['MgSO4'] = $budget['MgSO4'] * $lok->luas;
				$data_material_budget['Kieserite'] = $budget['Kieserite'] * $lok->luas;
				$data_material_budget['FeSO4'] = $budget['FeSO4'] * $lok->luas;

				$data_material_budget['ZnSO4'] = $budget['ZnSO4'] * $lok->luas;
				$data_material_budget['Dolomite'] = $budget['Dolomite'] * $lok->luas;
				$data_material_budget['Gypsum'] = $budget['Gypsum'] * $lok->luas;
				$data_material_budget['CuSO4'] = $budget['CuSO4'] * $lok->luas;
				$data_material_budget['Borax'] = $budget['Borax'] * $lok->luas;
				$data_material_budget['LOB'] = $budget['LOB'] * $lok->luas;
				$data_material_budget['CaCl2'] = $budget['CaCl2'] * $lok->luas;
				$data_material_budget['Calcibor'] = $budget['Calcibor'] * $lok->luas;
				$data_material_budget['Kompos'] = $budget['Kompos'] * $lok->luas;
				$data_material_budget['Belerang'] = $budget['Belerang'] * $lok->luas;

				$data_material_budget['Kieserite_G'] = $budget['Kieserite_G'] * $lok->luas;
				$data_material_budget['NPK'] = $budget['NPK'] * $lok->luas;
				$data_material_budget['Petro_Cas'] = $budget['Petro_Cas'] * $lok->luas;
				$data_material_budget['Fosetil'] = $budget['Fosetil'] * $lok->luas;
				$data_material_budget['Metalaxil'] = $budget['Metalaxil'] * $lok->luas;
				$data_material_budget['Propiconazole'] = $budget['Propiconazole'] * $lok->luas;
				$data_material_budget['Prochloraz'] = $budget['Prochloraz'] * $lok->luas;
				$data_material_budget['Mankozeb'] = $budget['Mankozeb'] * $lok->luas;
				$data_material_budget['Folirfos'] = $budget['Folirfos'] * $lok->luas;
				$data_material_budget['H3PO3'] = $budget['H3PO3'] * $lok->luas;

				$data_material_budget['Detazeb'] = $budget['Detazeb'] * $lok->luas;
				$data_material_budget['Bromacyl'] = $budget['Bromacyl'] * $lok->luas;
				$data_material_budget['Diuron'] = $budget['Diuron'] * $lok->luas;
				$data_material_budget['Glyphosate'] = $budget['Glyphosate'] * $lok->luas;
				$data_material_budget['Quizalofop'] = $budget['Quizalofop'] * $lok->luas;
				$data_material_budget['Ametrine'] = $budget['Ametrine'] * $lok->luas;
				$data_material_budget['Bazza'] = $budget['Bazza'] * $lok->luas;
				$data_material_budget['Tekasi'] = $budget['Tekasi'] * $lok->luas;
				$data_material_budget['Tekila'] = $budget['Tekila'] * $lok->luas;
				$data_material_budget['Chlorpyrifos'] = $budget['Chlorpyrifos'] * $lok->luas;

				$data_material_budget['Sidazinon'] = $budget['Sidazinon'] * $lok->luas;
				$data_material_budget['Propoxur'] = $budget['Propoxur'] * $lok->luas;
				$data_material_budget['Cypermethrin'] = $budget['Cypermethrin'] * $lok->luas;
				$data_material_budget['Bifentrin_EC'] = $budget['Bifentrin_EC'] * $lok->luas;
				$data_material_budget['Bifentrin_G'] = $budget['Bifentrin_G'] * $lok->luas;
				$data_material_budget['BPMC'] = $budget['BPMC'] * $lok->luas;
				$data_material_budget['Clorpyrifos'] = $budget['Clorpyrifos'] * $lok->luas;
				$data_material_budget['Abamectin'] = $budget['Abamectin'] * $lok->luas;
				$data_material_budget['Sanisol'] = $budget['Sanisol'] * $lok->luas;
				$data_material_budget['Ethylene'] = $budget['Ethylene'] * $lok->luas;

				$data_material_budget['Ethepon'] = $budget['Ethepon'] * $lok->luas;
				$data_material_budget['Kaolin'] = $budget['Kaolin'] * $lok->luas;
				$data_material_budget['Zeolit'] = $budget['Zeolit'] * $lok->luas;
				$data_material_budget['Rabas'] = $budget['Rabas'] * $lok->luas;
				$data_material_budget['Ratgone'] = $budget['Ratgone'] * $lok->luas;
				$data_material_budget['Indostick'] = $budget['Indostick'] * $lok->luas;
				$data_material_budget['Organosilicon'] = $budget['Organosilicon'] * $lok->luas;
				$data_material_budget['Soda_Ash'] = $budget['Soda_Ash'] * $lok->luas;
				$data_material_budget['Sarineb'] = $budget['Sarineb'] * $lok->luas;
				$data_material_budget['Sorento'] = $budget['Sorento'] * $lok->luas;

				$data_material_budget['NPK_Haracoat'] = $budget['NPK_Haracoat'] * $lok->luas;
				$data_material_budget['Oksifluorfen'] = $budget['Oksifluorfen'] * $lok->luas;
				$data_material_budget['keterangan'] = $lok->keterangan;

				$this->PerlocationPM_model->set_lokasi_material_budget($data_material_budget);
				$a++;
				$b++;
			}

			$budget = $this->PerlocationPM_model->get_material_budget($kelas, $lok->umur, 'Total');

			$data_material_budget_total['lokasi'] = $lok->lokasi;
			$data_material_budget_total['Urea'] = $budget['Urea'] * $lok->luas;
			$data_material_budget_total['Urease'] = $budget['Urease'] * $lok->luas;
			$data_material_budget_total['Za'] = $budget['Za'] * $lok->luas;
			$data_material_budget_total['K2SO4'] = $budget['K2SO4'] * $lok->luas;
			$data_material_budget_total['KCL'] = $budget['KCL'] * $lok->luas;
			$data_material_budget_total['TSP'] = $budget['TSP'] * $lok->luas;
			$data_material_budget_total['DAP'] = $budget['DAP'] * $lok->luas;
			$data_material_budget_total['MgSO4'] = $budget['MgSO4'] * $lok->luas;
			$data_material_budget_total['Kieserite'] = $budget['Kieserite'] * $lok->luas;
			$data_material_budget_total['FeSO4'] = $budget['FeSO4'] * $lok->luas;

			$data_material_budget_total['ZnSO4'] = $budget['ZnSO4'] * $lok->luas;
			$data_material_budget_total['Dolomite'] = $budget['Dolomite'] * $lok->luas;
			$data_material_budget_total['Gypsum'] = $budget['Gypsum'] * $lok->luas;
			$data_material_budget_total['CuSO4'] = $budget['CuSO4'] * $lok->luas;
			$data_material_budget_total['Borax'] = $budget['Borax'] * $lok->luas;
			$data_material_budget_total['LOB'] = $budget['LOB'] * $lok->luas;
			$data_material_budget_total['CaCl2'] = $budget['CaCl2'] * $lok->luas;
			$data_material_budget_total['Calcibor'] = $budget['Calcibor'] * $lok->luas;
			$data_material_budget_total['Kompos'] = $budget['Kompos'] * $lok->luas;
			$data_material_budget_total['Belerang'] = $budget['Belerang'] * $lok->luas;

			$data_material_budget_total['Kieserite_G'] = $budget['Kieserite_G'] * $lok->luas;
			$data_material_budget_total['NPK'] = $budget['NPK'] * $lok->luas;
			$data_material_budget_total['Petro_Cas'] = $budget['Petro_Cas'] * $lok->luas;
			$data_material_budget_total['Fosetil'] = $budget['Fosetil'] * $lok->luas;
			$data_material_budget_total['Metalaxil'] = $budget['Metalaxil'] * $lok->luas;
			$data_material_budget_total['Propiconazole'] = $budget['Propiconazole'] * $lok->luas;
			$data_material_budget_total['Prochloraz'] = $budget['Prochloraz'] * $lok->luas;
			$data_material_budget_total['Mankozeb'] = $budget['Mankozeb'] * $lok->luas;
			$data_material_budget_total['Folirfos'] = $budget['Folirfos'] * $lok->luas;
			$data_material_budget_total['H3PO3'] = $budget['H3PO3'] * $lok->luas;

			$data_material_budget_total['Detazeb'] = $budget['Detazeb'] * $lok->luas;
			$data_material_budget_total['Bromacyl'] = $budget['Bromacyl'] * $lok->luas;
			$data_material_budget_total['Diuron'] = $budget['Diuron'] * $lok->luas;
			$data_material_budget_total['Glyphosate'] = $budget['Glyphosate'] * $lok->luas;
			$data_material_budget_total['Quizalofop'] = $budget['Quizalofop'] * $lok->luas;
			$data_material_budget_total['Ametrine'] = $budget['Ametrine'] * $lok->luas;
			$data_material_budget_total['Bazza'] = $budget['Bazza'] * $lok->luas;
			$data_material_budget_total['Tekasi'] = $budget['Tekasi'] * $lok->luas;
			$data_material_budget_total['Tekila'] = $budget['Tekila'] * $lok->luas;
			$data_material_budget_total['Chlorpyrifos'] = $budget['Chlorpyrifos'] * $lok->luas;

			$data_material_budget_total['Sidazinon'] = $budget['Sidazinon'] * $lok->luas;
			$data_material_budget_total['Propoxur'] = $budget['Propoxur'] * $lok->luas;
			$data_material_budget_total['Cypermethrin'] = $budget['Cypermethrin'] * $lok->luas;
			$data_material_budget_total['Bifentrin_EC'] = $budget['Bifentrin_EC'] * $lok->luas;
			$data_material_budget_total['Bifentrin_G'] = $budget['Bifentrin_G'] * $lok->luas;
			$data_material_budget_total['BPMC'] = $budget['BPMC'] * $lok->luas;
			$data_material_budget_total['Clorpyrifos'] = $budget['Clorpyrifos'] * $lok->luas;
			$data_material_budget_total['Abamectin'] = $budget['Abamectin'] * $lok->luas;
			$data_material_budget_total['Sanisol'] = $budget['Sanisol'] * $lok->luas;
			$data_material_budget_total['Ethylene'] = $budget['Ethylene'] * $lok->luas;

			$data_material_budget_total['Ethepon'] = $budget['Ethepon'] * $lok->luas;
			$data_material_budget_total['Kaolin'] = $budget['Kaolin'] * $lok->luas;
			$data_material_budget_total['Zeolit'] = $budget['Zeolit'] * $lok->luas;
			$data_material_budget_total['Rabas'] = $budget['Rabas'] * $lok->luas;
			$data_material_budget_total['Ratgone'] = $budget['Ratgone'] * $lok->luas;
			$data_material_budget_total['Indostick'] = $budget['Indostick'] * $lok->luas;
			$data_material_budget_total['Organosilicon'] = $budget['Organosilicon'] * $lok->luas;
			$data_material_budget_total['Soda_Ash'] = $budget['Soda_Ash'] * $lok->luas;
			$data_material_budget_total['Sarineb'] = $budget['Sarineb'] * $lok->luas;
			$data_material_budget_total['Sorento'] = $budget['Sorento'] * $lok->luas;

			$data_material_budget_total['NPK_Haracoat'] = $budget['NPK_Haracoat'] * $lok->luas;
			$data_material_budget_total['Oksifluorfen'] = $budget['Oksifluorfen'] * $lok->luas;
			$data_material_budget_total['keterangan'] = $lok->keterangan;

			$this->PerlocationPM_model->set_lokasi_material_budget_total($data_material_budget_total);

			$budget = $this->PerlocationPM_model->get_material_budget($kelas, $lok->umur, 'Total');

			$data_material_over['lokasi'] = $lok->lokasi;
			if($data_material_budget_total['Urea'] < $data_material_real_total['Urea']) $data_material_over['Urea'] = 1; else $data_material_over['Urea'] = 0;
			if($data_material_budget_total['Urease'] < $data_material_real_total['Urease']) $data_material_over['Urease'] = 1; else $data_material_over['Urease'] = 0;
			if($data_material_budget_total['Za'] < $data_material_real_total['Za']) $data_material_over['Za'] = 1; else $data_material_over['Za'] = 0;
			if($data_material_budget_total['K2SO4'] < $data_material_real_total['K2SO4']) $data_material_over['K2SO4'] = 1; else $data_material_over['K2SO4'] = 0;
			if($data_material_budget_total['KCL'] < $data_material_real_total['KCL']) $data_material_over['KCL'] = 1; else $data_material_over['KCL'] = 0;
			if($data_material_budget_total['TSP'] < $data_material_real_total['TSP']) $data_material_over['TSP'] = 1; else $data_material_over['TSP'] = 0;
			if($data_material_budget_total['DAP'] < $data_material_real_total['DAP']) $data_material_over['DAP'] = 1; else $data_material_over['DAP'] = 0;
			if($data_material_budget_total['MgSO4'] < $data_material_real_total['MgSO4']) $data_material_over['MgSO4'] = 1; else $data_material_over['MgSO4'] = 0;
			if($data_material_budget_total['Kieserite'] < $data_material_real_total['Kieserite']) $data_material_over['Kieserite'] = 1; else $data_material_over['Kieserite'] = 0;
			if($data_material_budget_total['FeSO4'] < $data_material_real_total['FeSO4']) $data_material_over['FeSO4'] = 1; else $data_material_over['FeSO4'] = 0;

			if($data_material_budget_total['ZnSO4'] < $data_material_real_total['ZnSO4']) $data_material_over['ZnSO4'] = 1; else $data_material_over['ZnSO4'] = 0;
			if($data_material_budget_total['Dolomite'] < $data_material_real_total['Dolomite']) $data_material_over['Dolomite'] = 1; else $data_material_over['Dolomite'] = 0;
			if($data_material_budget_total['Gypsum'] < $data_material_real_total['Gypsum']) $data_material_over['Gypsum'] = 1; else $data_material_over['Gypsum'] = 0;
			if($data_material_budget_total['CuSO4'] < $data_material_real_total['CuSO4']) $data_material_over['CuSO4'] = 1; else $data_material_over['CuSO4'] = 0;
			if($data_material_budget_total['Borax'] < $data_material_real_total['Borax']) $data_material_over['Borax'] = 1; else $data_material_over['Borax'] = 0;
			if($data_material_budget_total['LOB'] < $data_material_real_total['LOB']) $data_material_over['LOB'] = 1; else $data_material_over['LOB'] = 0;
			if($data_material_budget_total['CaCl2'] < $data_material_real_total['CaCl2']) $data_material_over['CaCl2'] = 1; else $data_material_over['CaCl2'] = 0;
			if($data_material_budget_total['Calcibor'] < $data_material_real_total['Calcibor']) $data_material_over['Calcibor'] = 1; else $data_material_over['Calcibor'] = 0;
			if($data_material_budget_total['Kompos'] < $data_material_real_total['Kompos']) $data_material_over['Kompos'] = 1; else $data_material_over['Kompos'] = 0;
			if($data_material_budget_total['Belerang'] < $data_material_real_total['Belerang']) $data_material_over['Belerang'] = 1; else $data_material_over['Belerang'] = 0;

			if($data_material_budget_total['Kieserite_G'] < $data_material_real_total['Kieserite_G']) $data_material_over['Kieserite_G'] = 1; else $data_material_over['Kieserite_G'] = 0;
			if($data_material_budget_total['NPK'] < $data_material_real_total['NPK']) $data_material_over['NPK'] = 1; else $data_material_over['NPK'] = 0;
			if($data_material_budget_total['Petro_Cas'] < $data_material_real_total['Petro_Cas']) $data_material_over['Petro_Cas'] = 1; else $data_material_over['Petro_Cas'] = 0;
			if($data_material_budget_total['Fosetil'] < $data_material_real_total['Fosetil']) $data_material_over['Fosetil'] = 1; else $data_material_over['Fosetil'] = 0;
			if($data_material_budget_total['Metalaxil'] < $data_material_real_total['Metalaxil']) $data_material_over['Metalaxil'] = 1; else $data_material_over['Metalaxil'] = 0;
			if($data_material_budget_total['Propiconazole'] < $data_material_real_total['Propiconazole']) $data_material_over['Propiconazole'] = 1; else $data_material_over['Propiconazole'] = 0;
			if($data_material_budget_total['Prochloraz'] < $data_material_real_total['Prochloraz']) $data_material_over['Prochloraz'] = 1; else $data_material_over['Prochloraz'] = 0;
			if($data_material_budget_total['Mankozeb'] < $data_material_real_total['Mankozeb']) $data_material_over['Mankozeb'] = 1; else $data_material_over['Mankozeb'] = 0;
			if($data_material_budget_total['Folirfos'] < $data_material_real_total['Folirfos']) $data_material_over['Folirfos'] = 1; else $data_material_over['Folirfos'] = 0;
			if($data_material_budget_total['H3PO3'] < $data_material_real_total['H3PO3']) $data_material_over['H3PO3'] = 1; else $data_material_over['H3PO3'] = 0;

			if($data_material_budget_total['Detazeb'] < $data_material_real_total['Detazeb']) $data_material_over['Detazeb'] = 1; else $data_material_over['Detazeb'] = 0;
			if($data_material_budget_total['Bromacyl'] < $data_material_real_total['Bromacyl']) $data_material_over['Bromacyl'] = 1; else $data_material_over['Bromacyl'] = 0;
			if($data_material_budget_total['Diuron'] < $data_material_real_total['Diuron']) $data_material_over['Diuron'] = 1; else $data_material_over['Diuron'] = 0;
			if($data_material_budget_total['Glyphosate'] < $data_material_real_total['Glyphosate']) $data_material_over['Glyphosate'] = 1; else $data_material_over['Glyphosate'] = 0;
			if($data_material_budget_total['Quizalofop'] < $data_material_real_total['Quizalofop']) $data_material_over['Quizalofop'] = 1; else $data_material_over['Quizalofop'] = 0;
			if($data_material_budget_total['Ametrine'] < $data_material_real_total['Ametrine']) $data_material_over['Ametrine'] = 1; else $data_material_over['Ametrine'] = 0;
			if($data_material_budget_total['Bazza'] < $data_material_real_total['Bazza']) $data_material_over['Bazza'] = 1; else $data_material_over['Bazza'] = 0;
			if($data_material_budget_total['Tekasi'] < $data_material_real_total['Tekasi']) $data_material_over['Tekasi'] = 1; else $data_material_over['Tekasi'] = 0;
			if($data_material_budget_total['Tekila'] < $data_material_real_total['Tekila']) $data_material_over['Tekila'] = 1; else $data_material_over['Tekila'] = 0;
			if($data_material_budget_total['Chlorpyrifos'] < $data_material_real_total['Chlorpyrifos']) $data_material_over['Chlorpyrifos'] = 1; else $data_material_over['Chlorpyrifos'] = 0;

			if($data_material_budget_total['Sidazinon'] < $data_material_real_total['Sidazinon']) $data_material_over['Sidazinon'] = 1; else $data_material_over['Sidazinon'] = 0;
			if($data_material_budget_total['Propoxur'] < $data_material_real_total['Propoxur']) $data_material_over['Propoxur'] = 1; else $data_material_over['Propoxur'] = 0;
			if($data_material_budget_total['Cypermethrin'] < $data_material_real_total['Cypermethrin']) $data_material_over['Cypermethrin'] = 1; else $data_material_over['Cypermethrin'] = 0;
			if($data_material_budget_total['Bifentrin_EC'] < $data_material_real_total['Bifentrin_EC']) $data_material_over['Bifentrin_EC'] = 1; else $data_material_over['Bifentrin_EC'] = 0;
			if($data_material_budget_total['Bifentrin_G'] < $data_material_real_total['Bifentrin_G']) $data_material_over['Bifentrin_G'] = 1; else $data_material_over['Bifentrin_G'] = 0;
			if($data_material_budget_total['BPMC'] < $data_material_real_total['BPMC']) $data_material_over['BPMC'] = 1; else $data_material_over['BPMC'] = 0;
			if($data_material_budget_total['Clorpyrifos'] < $data_material_real_total['Clorpyrifos']) $data_material_over['Clorpyrifos'] = 1; else $data_material_over['Clorpyrifos'] = 0;
			if($data_material_budget_total['Abamectin'] < $data_material_real_total['Abamectin']) $data_material_over['Abamectin'] = 1; else $data_material_over['Abamectin'] = 0;
			if($data_material_budget_total['Sanisol'] < $data_material_real_total['Sanisol']) $data_material_over['Sanisol'] = 1; else $data_material_over['Sanisol'] = 0;
			if($data_material_budget_total['Ethylene'] < $data_material_real_total['Ethylene']) $data_material_over['Ethylene'] = 1; else $data_material_over['Ethylene'] = 0;

			if($data_material_budget_total['Ethepon'] < $data_material_real_total['Ethepon']) $data_material_over['Ethepon'] = 1; else $data_material_over['Ethepon'] = 0;
			if($data_material_budget_total['Kaolin'] < $data_material_real_total['Kaolin']) $data_material_over['Kaolin'] = 1; else $data_material_over['Kaolin'] = 0;
			if($data_material_budget_total['Zeolit'] < $data_material_real_total['Zeolit']) $data_material_over['Zeolit'] = 1; else $data_material_over['Zeolit'] = 0;
			if($data_material_budget_total['Rabas'] < $data_material_real_total['Rabas']) $data_material_over['Rabas'] = 1; else $data_material_over['Rabas'] = 0;
			if($data_material_budget_total['Ratgone'] < $data_material_real_total['Ratgone']) $data_material_over['Ratgone'] = 1; else $data_material_over['Ratgone'] = 0;
			if($data_material_budget_total['Indostick'] < $data_material_real_total['Indostick']) $data_material_over['Indostick'] = 1; else $data_material_over['Indostick'] = 0;
			if($data_material_budget_total['Organosilicon'] < $data_material_real_total['Organosilicon']) $data_material_over['Organosilicon'] = 1; else $data_material_over['Organosilicon'] = 0;
			if($data_material_budget_total['Soda_Ash'] < $data_material_real_total['Soda_Ash']) $data_material_over['Soda_Ash'] = 1; else $data_material_over['Soda_Ash'] = 0;
			if($data_material_budget_total['Sarineb'] < $data_material_real_total['Sarineb']) $data_material_over['Sarineb'] = 1; else $data_material_over['Sarineb'] = 0;
			if($data_material_budget_total['Sorento'] < $data_material_real_total['Sorento']) $data_material_over['Sorento'] = 1; else $data_material_over['Sorento'] = 0;

			if($data_material_budget_total['NPK_Haracoat'] < $data_material_real_total['NPK_Haracoat']) $data_material_over['NPK_Haracoat'] = 1; else $data_material_over['NPK_Haracoat'] = 0;
			if($data_material_budget_total['Oksifluorfen'] < $data_material_real_total['Oksifluorfen']) $data_material_over['Oksifluorfen'] = 1; else $data_material_over['Oksifluorfen'] = 0;
			$data_material_over['keterangan'] = $lok->keterangan;

			$this->PerlocationPM_model->set_lokasi_material_over($data_material_over);

			$qouta = $this->PerlocationPM_model->get_material_quota($kelas, $lok->umur);

			$data['lokasi'] = $lok->lokasi;
			$data['Urea'] = $qouta['Urea'] * $lok->luas;
			$data['Urease'] = $qouta['Urease'] * $lok->luas;
			$data['Za'] = $qouta['Za'] * $lok->luas;
			$data['K2SO4'] = $qouta['K2SO4'] * $lok->luas;
			$data['KCL'] = $qouta['KCL'] * $lok->luas;
			$data['TSP'] = $qouta['TSP'] * $lok->luas;
			$data['DAP'] = $qouta['DAP'] * $lok->luas;
			$data['MgSO4'] = $qouta['MgSO4'] * $lok->luas;
			$data['Kieserite'] = $qouta['Kieserite'] * $lok->luas;
			$data['FeSO4'] = $qouta['FeSO4'] * $lok->luas;

			$data['ZnSO4'] = $qouta['ZnSO4'] * $lok->luas;
			$data['Dolomite'] = $qouta['Dolomite'] * $lok->luas;
			$data['Gypsum'] = $qouta['Gypsum'] * $lok->luas;
			$data['CuSO4'] = $qouta['CuSO4'] * $lok->luas;
			$data['Borax'] = $qouta['Borax'] * $lok->luas;
			$data['LOB'] = $qouta['LOB'] * $lok->luas;
			$data['CaCl2'] = $qouta['CaCl2'] * $lok->luas;
			$data['Calcibor'] = $qouta['Calcibor'] * $lok->luas;
			$data['Kompos'] = $qouta['Kompos'] * $lok->luas;
			$data['Belerang'] = $qouta['Belerang'] * $lok->luas;

			$data['Kieserite_G'] = $qouta['Kieserite_G'] * $lok->luas;
			$data['NPK'] = $qouta['NPK'] * $lok->luas;
			$data['Petro_Cas'] = $qouta['Petro_Cas'] * $lok->luas;
			$data['Fosetil'] = $qouta['Fosetil'] * $lok->luas;
			$data['Metalaxil'] = $qouta['Metalaxil'] * $lok->luas;
			$data['Propiconazole'] = $qouta['Propiconazole'] * $lok->luas;
			$data['Prochloraz'] = $qouta['Prochloraz'] * $lok->luas;
			$data['Mankozeb'] = $qouta['Mankozeb'] * $lok->luas;
			$data['Folirfos'] = $qouta['Folirfos'] * $lok->luas;
			$data['H3PO3'] = $qouta['H3PO3'] * $lok->luas;

			$data['Detazeb'] = $qouta['Detazeb'] * $lok->luas;
			$data['Bromacyl'] = $qouta['Bromacyl'] * $lok->luas;
			$data['Diuron'] = $qouta['Diuron'] * $lok->luas;
			$data['Glyphosate'] = $qouta['Glyphosate'] * $lok->luas;
			$data['Quizalofop'] = $qouta['Quizalofop'] * $lok->luas;
			$data['Ametrine'] = $qouta['Ametrine'] * $lok->luas;
			$data['Bazza'] = $qouta['Bazza'] * $lok->luas;
			$data['Tekasi'] = $qouta['Tekasi'] * $lok->luas;
			$data['Tekila'] = $qouta['Tekila'] * $lok->luas;
			$data['Chlorpyrifos'] = $qouta['Chlorpyrifos'] * $lok->luas;

			$data['Sidazinon'] = $qouta['Sidazinon'] * $lok->luas;
			$data['Propoxur'] = $qouta['Propoxur'] * $lok->luas;
			$data['Cypermethrin'] = $qouta['Cypermethrin'] * $lok->luas;
			$data['Bifentrin_EC'] = $qouta['Bifentrin_EC'] * $lok->luas;
			$data['Bifentrin_G'] = $qouta['Bifentrin_G'] * $lok->luas;
			$data['BPMC'] = $qouta['BPMC'] * $lok->luas;
			$data['Clorpyrifos'] = $qouta['Clorpyrifos'] * $lok->luas;
			$data['Abamectin'] = $qouta['Abamectin'] * $lok->luas;
			$data['Sanisol'] = $qouta['Sanisol'] * $lok->luas;
			$data['Ethylene'] = $qouta['Ethylene'] * $lok->luas;

			$data['Ethepon'] = $qouta['Ethepon'] * $lok->luas;
			$data['Kaolin'] = $qouta['Kaolin'] * $lok->luas;
			$data['Zeolit'] = $qouta['Zeolit'] * $lok->luas;
			$data['Rabas'] = $qouta['Rabas'] * $lok->luas;
			$data['Ratgone'] = $qouta['Ratgone'] * $lok->luas;
			$data['Indostick'] = $qouta['Indostick'] * $lok->luas;
			$data['Organosilicon'] = $qouta['Organosilicon'] * $lok->luas;
			$data['Soda_Ash'] = $qouta['Soda_Ash'] * $lok->luas;
			$data['Sarineb'] = $qouta['Sarineb'] * $lok->luas;
			$data['Sorento'] = $qouta['Sorento'] * $lok->luas;

			$data['NPK_Haracoat'] = $qouta['NPK_Haracoat'] * $lok->luas;
			$data['Oksifluorfen'] = $qouta['Oksifluorfen'] * $lok->luas;
			$data['keterangan'] = $lok->keterangan;

			$this->PerlocationPM_model->set_lokasi_material_qouta($data);

			echo $lok->lokasi.' - '.$cek++;
			echo "<br />";
		}
		// die();
		echo "<div class='row'>
			<div class='col-lg-12 text-center'>
				<h1>Update Success Material $wilayah</h1>
			</div>
		</div>";

		if($wilayah == 'W14'){
			echo ("
				<script>
					window.location.href = '/PIS/Admin_PM';
					alert('Berhasil di update Matrial');
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
					window.location.href = '/PIS/Admin_PM/detail_lokasi_material?wilayah=W".$cek_wil."';
				</script>
			");
		}
	}

	function detail_lokasi_activity(){
		$wilayah = $this->input->get('wilayah');
		if($wilayah == 'W01'){
			$query = $this->PerlocationPM_model->del_lokasi_activity_real();
			$query = $this->PerlocationPM_model->del_lokasi_activity_budget();
			// $query = $this->PerlocationPM_model->del_lokasi_activity_over();
			$query = $this->PerlocationPM2_model->del_element_cost_ec_real();
		}
		$cek = 1;

		$konstanta = $this->Konstanta_model->get_konstanta_code("TGL_TARIK_DATA");
		$YEAR_BASE = $this->Konstanta_model->get_konstanta_code("YEAR_BASE");

		$activity = $this->PerlocationPM_model->get_activity_real($wilayah.'1');
		foreach($activity as $ac){
			$real['lokasi'] = $ac->lokasi;
			$real['element_cost_code'] = $ac->element_cost_code;
			$real['element_cost_desc'] = $ac->element_cost_desc;
			$real['activity_code'] = $ac->activity_code;
			$real['activity_desc'] = $ac->activity_desc;
			$real['biaya'] = $ac->biaya;
			$real['keterangan'] = 'Rencana';
			$this->PerlocationPM_model->set_lokasi_activity_real($real);
		}
		$activity = $this->PerlocationPM_model->get_activity_real($wilayah.'2');
		foreach($activity as $ac){
			$real['lokasi'] = $ac->lokasi;
			$real['element_cost_code'] = $ac->element_cost_code;
			$real['element_cost_desc'] = $ac->element_cost_desc;
			$real['activity_code'] = $ac->activity_code;
			$real['activity_desc'] = $ac->activity_desc;
			$real['biaya'] = $ac->biaya;
			$real['keterangan'] = 'Rencana';
			$this->PerlocationPM_model->set_lokasi_activity_real($real);
		}
		$activity = $this->PerlocationPM_model->get_activity_real($wilayah.'3');
		foreach($activity as $ac){
			$real['lokasi'] = $ac->lokasi;
			$real['element_cost_code'] = $ac->element_cost_code;
			$real['element_cost_desc'] = $ac->element_cost_desc;
			$real['activity_code'] = $ac->activity_code;
			$real['activity_desc'] = $ac->activity_desc;
			$real['biaya'] = $ac->biaya;
			$real['keterangan'] = 'Rencana';
			$this->PerlocationPM_model->set_lokasi_activity_real($real);
		}

		$activity = $this->PerlocationPM_model->get_activity_real_panen('P'.substr($wilayah, 1, 2), date('Y', strtotime($YEAR_BASE['nilai'])));
		foreach($activity as $ac){
			$real['lokasi'] = $ac->lokasi;
			$real['element_cost_code'] = $ac->element_cost_code;
			$real['element_cost_desc'] = $ac->element_cost_desc;
			$real['activity_code'] = $ac->activity_code;
			$real['activity_desc'] = $ac->activity_desc;
			$real['biaya'] = $ac->biaya;
			$real['keterangan'] = 'Selesai';
			$this->PerlocationPM_model->set_lokasi_activity_real($real);
		}

		$lokasi = $this->PerlocationPM_model->get_lokasi($wilayah);

		foreach ($lokasi as $lok) {
			$activity = $this->PerlocationPM_model->get_activity_budget($lok->status, $lok->umur);
			foreach ($activity as $ac) {
				$budget['lokasi'] = $lok->lokasi;
				$budget['element_cost_code'] = $ac->element_cost_code;
				$budget['element_cost_desc'] = $ac->element_cost_desc;
				$budget['activity_code'] = $ac->activity_code;
				$budget['activity_desc'] = $ac->activity_desc;
				$budget['biaya'] = $ac->biaya * $lok->luas;
				$budget['keterangan'] = $lok->keterangan;
				$this->PerlocationPM_model->set_lokasi_activity_budget($budget);
			}

			$group_cost = array(
				'lokasi' => $lok->lokasi,
				'ZN01_Labour' => NULL,
				'ZN02_Labour' => NULL,
				'ZN03_Labour' => NULL,
				'ZN04_Labour' => NULL,
				'ZN05_Labour' => NULL,
				'ZN06_Labour' => NULL,
				'ZN07_Labour' => NULL,
				'ZN08_Labour' => NULL,
				'ZN09_Labour' => NULL,
				'ZN10_Labour' => NULL,
				'ZN11_Labour' => NULL,
				'ZN12_Labour' => NULL,
				'ZN13_Labour' => NULL,
				'ZN14_Labour' => NULL,
				'ZN15_Labour' => NULL,
				'ZN01_Charge' => NULL,
				'ZN02_Charge' => NULL,
				'ZN03_Charge' => NULL,
				'ZN04_Charge' => NULL,
				'ZN05_Charge' => NULL,
				'ZN06_Charge' => NULL,
				'ZN07_Charge' => NULL,
				'ZN08_Charge' => NULL,
				'ZN09_Charge' => NULL,
				'ZN10_Charge' => NULL,
				'ZN11_Charge' => NULL,
				'ZN12_Charge' => NULL,
				'ZN13_Charge' => NULL,
				'ZN14_Charge' => NULL,
				'ZN15_Charge' => NULL,
				'ZN01_Material' => NULL,
				'ZN02_Material' => NULL,
				'ZN03_Material' => NULL,
				'ZN04_Material' => NULL,
				'ZN05_Material' => NULL,
				'ZN06_Material' => NULL,
				'ZN07_Material' => NULL,
				'ZN08_Material' => NULL,
				'ZN09_Material' => NULL,
				'ZN10_Material' => NULL,
				'ZN11_Material' => NULL,
				'ZN12_Material' => NULL,
				'ZN13_Material' => NULL,
				'ZN14_Material' => NULL,
				'ZN15_Material' => NULL,
				'keterangan' => $lok->keterangan
			);
			$element_cost = $this->PerlocationPM2_model->get_element_cost_ec_real($lok->lokasi, $lok->kebun);
			foreach ($element_cost as $ec) {
				$group_cost[$ec->code.'_Labour'] = $ec->Labour;
				$group_cost[$ec->code.'_Charge'] = $ec->Charge;
				$group_cost[$ec->code.'_Material'] = $ec->Material;
			}

			$this->PerlocationPM2_model->set_element_cost_ec_real($group_cost);

			echo $lok->lokasi.' - '.$cek++;
			echo "<br />";
		}

		echo "<div class='row'>
			<div class='col-lg-12 text-center'>
				<h1>Update Success Activity $wilayah</h1>
			</div>
		</div>";

		if($wilayah == 'W14'){
			echo ("
				<script>
					window.location.href = '/PIS/Admin_PM';
					alert('Berhasil di update Activity');
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
					window.location.href = '/PIS/Admin_PM/detail_lokasi_activity?wilayah=W".$cek_wil."';
				</script>
			");
		}
	}

	function detail_lokasi_activity_over(){
		$wilayah = $this->input->get('wilayah');
		if($wilayah == 'W01'){
			$query = $this->PerlocationPM_model->del_lokasi_activity_over();
		}
		$cek = 1;

		$konstanta = $this->Konstanta_model->get_konstanta_code("TGL_TARIK_DATA");
		$YEAR_BASE = $this->Konstanta_model->get_konstanta_code("YEAR_BASE");

		$cek_lokasi = '';

		$activity = $this->PerlocationPM_model->get_activity_real($wilayah.'1');
		foreach($activity as $ac){
			if($cek_lokasi != $ac->lokasi){
				$cek_lokasi = $ac->lokasi;
				$lokasi = $this->PerlocationPM_model->get_activity_lokasi_cek($ac->lokasi, 'Rencana');
				if($lokasi == NULL){
					$lokasi = $this->PerlocationPM_model->get_activity_lokasi_cek_none($ac->lokasi);
				}
			}
			$budget = $this->PerlocationPM_model->get_activity_budget_lokasi($lokasi['status'], $lokasi['umur'], $ac->activity_code);

			$real['lokasi'] = $ac->lokasi;
			$real['element_cost_code'] = $ac->element_cost_code;
			$real['element_cost_desc'] = $ac->element_cost_desc;
			$real['activity_code'] = $ac->activity_code;
			$real['activity_desc'] = $ac->activity_desc;
			if($ac->biaya <= ($budget['biaya'] * $lokasi['luas'])){
				$real['over'] = 0;
			}
			else{
				$real['over'] = 1;
			}
			$real['keterangan'] = 'Rencana';
			$this->PerlocationPM_model->set_lokasi_activity_over($real);
		}

		$activity = $this->PerlocationPM_model->get_activity_real($wilayah.'2');
		foreach($activity as $ac){
			if($cek_lokasi != $ac->lokasi){
				$cek_lokasi = $ac->lokasi;
				$lokasi = $this->PerlocationPM_model->get_activity_lokasi_cek($ac->lokasi, 'Rencana');
				if($lokasi == NULL){
					$lokasi = $this->PerlocationPM_model->get_activity_lokasi_cek_none($ac->lokasi);
				}
			}
			$budget = $this->PerlocationPM_model->get_activity_budget_lokasi($lokasi['status'], $lokasi['umur'], $ac->activity_code);

			$real['lokasi'] = $ac->lokasi;
			$real['element_cost_code'] = $ac->element_cost_code;
			$real['element_cost_desc'] = $ac->element_cost_desc;
			$real['activity_code'] = $ac->activity_code;
			$real['activity_desc'] = $ac->activity_desc;
			if($ac->biaya <= ($budget['biaya'] * $lokasi['luas'])){
				$real['over'] = 0;
			}
			else{
				$real['over'] = 1;
			}
			$real['keterangan'] = 'Rencana';
			$this->PerlocationPM_model->set_lokasi_activity_over($real);
		}

		$activity = $this->PerlocationPM_model->get_activity_real($wilayah.'3');
		foreach($activity as $ac){
			if($cek_lokasi != $ac->lokasi){
				$cek_lokasi = $ac->lokasi;
				$lokasi = $this->PerlocationPM_model->get_activity_lokasi_cek($ac->lokasi, 'Rencana');
				if($lokasi == NULL){
					$lokasi = $this->PerlocationPM_model->get_activity_lokasi_cek_none($ac->lokasi);
				}
			}
			$budget = $this->PerlocationPM_model->get_activity_budget_lokasi($lokasi['status'], $lokasi['umur'], $ac->activity_code);

			$real['lokasi'] = $ac->lokasi;
			$real['element_cost_code'] = $ac->element_cost_code;
			$real['element_cost_desc'] = $ac->element_cost_desc;
			$real['activity_code'] = $ac->activity_code;
			$real['activity_desc'] = $ac->activity_desc;
			if($ac->biaya <= ($budget['biaya'] * $lokasi['luas'])){
				$real['over'] = 0;
			}
			else{
				$real['over'] = 1;
			}
			$real['keterangan'] = 'Rencana';
			$this->PerlocationPM_model->set_lokasi_activity_over($real);
		}

		$activity = $this->PerlocationPM_model->get_activity_real_panen('P'.substr($wilayah, 1, 2), date('Y', strtotime($YEAR_BASE['nilai'])));
		foreach($activity as $ac){
			if($cek_lokasi != $ac->lokasi){
				$cek_lokasi = $ac->lokasi;
				$lokasi = $this->PerlocationPM_model->get_activity_lokasi_cek($ac->lokasi, 'Selesai');
			}
			$budget = $this->PerlocationPM_model->get_activity_budget_lokasi($lokasi['status'], $lokasi['umur'], $ac->activity_code);

			$real['lokasi'] = $ac->lokasi;
			$real['element_cost_code'] = $ac->element_cost_code;
			$real['element_cost_desc'] = $ac->element_cost_desc;
			$real['activity_code'] = $ac->activity_code;
			$real['activity_desc'] = $ac->activity_desc;
			if($ac->biaya <= ($budget['biaya'] * $lokasi['luas'])){
				$real['over'] = 0;
			}
			else{
				$real['over'] = 1;
			}
			$real['keterangan'] = 'Selesai';
			$this->PerlocationPM_model->set_lokasi_activity_over($real);
		}

		echo "<div class='row'>
			<div class='col-lg-12 text-center'>
				<h1>Update Success Activity Over $wilayah</h1>
			</div>
		</div>";

		if($wilayah == 'W14'){
			echo ("
				<script>
					window.location.href = '/PIS/Admin_PM';
					alert('Berhasil di update Activity Over');
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
					window.location.href = '/PIS/Admin_PM/detail_lokasi_activity_over?wilayah=W".$cek_wil."';
				</script>
			");
		}
	}

	function detail_others(){
		$wilayah = $this->input->get('wilayah');
		if($wilayah == 'W01'){
			$query = $this->PerlocationPM2_model->del_spray_weed();
			$query = $this->PerlocationPM2_model->del_pre_post_planting();
			$query = $this->PerlocationPM2_model->del_insect();
			$query = $this->PerlocationPM3_model->del_cost_bkst('bk');
			$query = $this->PerlocationPM3_model->del_cost_bkst('st');
		}
		$cek = 1;

		$konstanta = $this->Konstanta_model->get_konstanta_code("TGL_TARIK_DATA");
		$YEAR_BASE = $this->Konstanta_model->get_konstanta_code("YEAR_BASE");

		$lokasi = $this->PerlocationPM_model->get_lokasi($wilayah);

		foreach ($lokasi as $lok) {
			$spray_weed = $this->PerlocationPM2_model->get_spray_weed($lok->lokasi, $lok->kebun);

			$data_spray_weed['lokasi'] = $lok->lokasi;
			$data_spray_weed['Spray'] = $spray_weed['Spray'];
			$data_spray_weed['Booster'] = $spray_weed['Booster'];
			$data_spray_weed['Weed_Man'] = $spray_weed['Weed_Man'];
			$data_spray_weed['Rp_Weed_Man'] = $spray_weed['Rp_Weed_Man'];

			$this->PerlocationPM2_model->set_spray_weed($data_spray_weed);

			if($lok->status == 'NSFC'){
				$pre_post = $this->PerlocationPM2_model->get_pre_post_planting($lok->lokasi, $lok->kebun);

				$data_pre_post['lokasi'] = $lok->lokasi;
				$data_pre_post['Pre'] = $pre_post['Pre'];
				$data_pre_post['Post'] = $pre_post['Post'];
				$data_pre_post['Pre_Regulasi'] = $pre_post['Pre_Regulasi'];
				$data_pre_post['Post_Regulasi'] = $pre_post['Post_Regulasi'];
				$data_pre_post['keterangan'] = $lok->keterangan;

				$this->PerlocationPM2_model->set_pre_post_planting($data_pre_post);
			}

			$insect = $this->PerlocationPM2_model->get_insect($lok->lokasi, $lok->kebun, $lok->tgl_forcing);

			$data_insect['lokasi'] = $lok->lokasi;
			$data_insect['Insect_1'] = $insect['Insect_1'];
			$data_insect['Insect_2'] = $insect['Insect_2'];
			$data_insect['Insect_3'] = $insect['Insect_3'];
			$data_insect['R_1'] = $insect['R_1'];
			$data_insect['R_2'] = $insect['R_2'];
			$data_insect['R_3'] = $insect['R_3'];

			$this->PerlocationPM2_model->set_insect($data_insect);

			if($lok->status == 'NSFC'){
				$RealCostBK = $this->PerlocationPM3_model->get_element_cost_bkst($lok->lokasi, $lok->kebun, "BK", $lok->keterangan, date('Y-m', strtotime($lok->tgl_panen)));
				$RealCostST = $this->PerlocationPM3_model->get_element_cost_bkst($lok->lokasi, $lok->kebun, "ST", $lok->keterangan, date('Y-m', strtotime($lok->tgl_panen)));
				$RealBudgetBK = $this->PerlocationPM3_model->get_busget_element_cost_bkst($lok->status_bk, "BK");
				$RealBudgetST = $this->PerlocationPM3_model->get_busget_element_cost_bkst($lok->kelas, "ST");
				$RealGCBK = $this->PerlocationPM3_model->get_group_cost_bkst($lok->lokasi, $lok->kebun, "BK", $lok->keterangan, date('Y-m', strtotime($lok->tgl_panen)));
				$RealGCST = $this->PerlocationPM3_model->get_group_cost_bkst($lok->lokasi, $lok->kebun, "ST", $lok->keterangan, date('Y-m', strtotime($lok->tgl_panen)));

				$DataCostBK['lokasi'] = $lok->lokasi;
				$DataCostBK['ZN01_r'] = $RealCostBK['ZN01'];
				$DataCostBK['ZN01_b'] = $RealBudgetBK['ZN01'] * $lok->luas;
				$DataCostBK['ZN03_r'] = $RealCostBK['ZN03'];
				$DataCostBK['ZN03_b'] = $RealBudgetBK['ZN03'] * $lok->luas;
				$DataCostBK['ZN04_r'] = $RealCostBK['ZN04'];
				$DataCostBK['ZN04_b'] = $RealBudgetBK['ZN04'] * $lok->luas;
				$DataCostBK['ZN05_r'] = $RealCostBK['ZN05'];
				$DataCostBK['ZN05_b'] = $RealBudgetBK['ZN05'] * $lok->luas;
				$DataCostBK['ZN06_r'] = $RealCostBK['ZN06'];
				$DataCostBK['ZN06_b'] = $RealBudgetBK['ZN06'] * $lok->luas;
				$DataCostBK['ZN07_r'] = $RealCostBK['ZN07'];
				$DataCostBK['ZN07_b'] = $RealBudgetBK['ZN07'] * $lok->luas;
				$DataCostBK['ZN11_r'] = $RealCostBK['ZN11'];
				$DataCostBK['ZN11_b'] = $RealBudgetBK['ZN11'] * $lok->luas;
				$DataCostBK['ZN13_r'] = $RealCostBK['ZN13'];
				$DataCostBK['ZN13_b'] = $RealBudgetBK['ZN13'] * $lok->luas;
				$DataCostBK['ZN14_r'] = $RealCostBK['ZN14'];
				$DataCostBK['ZN14_b'] = $RealBudgetBK['ZN14'] * $lok->luas;
				$DataCostBK['ZN15_r'] = $RealCostBK['ZN15'];
				$DataCostBK['ZN15_b'] = $RealBudgetBK['ZN15'] * $lok->luas;
				$DataCostBK['ZNT_r'] = $RealCostBK['ZN01']+$RealCostBK['ZN03']+$RealCostBK['ZN04']+$RealCostBK['ZN05']+$RealCostBK['ZN06']+$RealCostBK['ZN07']+$RealCostBK['ZN11']+$RealCostBK['ZN13']+$RealCostBK['ZN14']+$RealCostBK['ZN15'];
				$DataCostBK['ZNT_b'] = $DataCostBK['ZN01_b']+$DataCostBK['ZN03_b']+$DataCostBK['ZN04_b']+$DataCostBK['ZN05_b']+$DataCostBK['ZN06_b']+$DataCostBK['ZN07_b']+$DataCostBK['ZN11_b']+$DataCostBK['ZN13_b']+$DataCostBK['ZN14_b']+$DataCostBK['ZN15_b'];
				$DataCostBK['labour_r'] = $RealGCBK['Labour'];
				$DataCostBK['charge_r'] = $RealGCBK['Charge'];
				$DataCostBK['material_r'] = $RealGCBK['Material'];
				$DataCostBK['seed_r'] = $RealGCBK['Seed'];
				if(round(($DataCostBK['ZNT_r'] / $DataCostBK['ZNT_b']) * 100, 2) < -106.5){
					$DataCostBK['performance'] = "Excellent";
				}
				else if(round(($DataCostBK['ZNT_r'] / $DataCostBK['ZNT_b']) * 100, 2) <= 106.5){
					$DataCostBK['performance'] = "Good";
				}
				else{
					$DataCostBK['performance'] = "Poor";
				}
				$DataCostBK['keterangan'] = $lok->keterangan;

				$DataCostST['lokasi'] = $lok->lokasi;
				$DataCostST['ZN01_r'] = $RealCostST['ZN01'];
				$DataCostST['ZN01_b'] = $RealBudgetST['ZN01'] * $lok->luas;
				$DataCostST['ZN03_r'] = $RealCostST['ZN03'];
				$DataCostST['ZN03_b'] = $RealBudgetST['ZN03'] * $lok->luas;
				$DataCostST['ZN04_r'] = $RealCostST['ZN04'];
				$DataCostST['ZN04_b'] = $RealBudgetST['ZN04'] * $lok->luas;
				$DataCostST['ZN05_r'] = $RealCostST['ZN05'];
				$DataCostST['ZN05_b'] = $RealBudgetST['ZN05'] * $lok->luas;
				$DataCostST['ZN06_r'] = $RealCostST['ZN06'];
				$DataCostST['ZN06_b'] = $RealBudgetST['ZN06'] * $lok->luas;
				$DataCostST['ZN07_r'] = $RealCostST['ZN07'];
				$DataCostST['ZN07_b'] = $RealBudgetST['ZN07'] * $lok->luas;
				$DataCostST['ZN11_r'] = $RealCostST['ZN11'];
				$DataCostST['ZN11_b'] = $RealBudgetST['ZN11'] * $lok->luas;
				$DataCostST['ZN13_r'] = $RealCostST['ZN13'];
				$DataCostST['ZN13_b'] = $RealBudgetST['ZN13'] * $lok->luas;
				$DataCostST['ZN14_r'] = $RealCostST['ZN14'];
				$DataCostST['ZN14_b'] = $RealBudgetST['ZN14'] * $lok->luas;
				$DataCostST['ZNT_r'] = $RealCostST['ZN01']+$RealCostST['ZN03']+$RealCostST['ZN04']+$RealCostST['ZN05']+$RealCostST['ZN06']+$RealCostST['ZN07']+$RealCostST['ZN11']+$RealCostST['ZN13']+$RealCostST['ZN14'];
				$DataCostST['ZNT_b'] = $DataCostST['ZN01_b']+$DataCostST['ZN03_b']+$DataCostST['ZN04_b']+$DataCostST['ZN05_b']+$DataCostST['ZN06_b']+$DataCostST['ZN07_b']+$DataCostST['ZN11_b']+$DataCostST['ZN13_b']+$DataCostST['ZN14_b'];
				$DataCostST['labour_r'] = $RealGCST['Labour'];
				$DataCostST['charge_r'] = $RealGCST['Charge'];
				$DataCostST['material_r'] = $RealGCST['Material'];
				$DataCostST['seed_r'] = $RealGCST['Seed'];
				if(round(($DataCostST['ZNT_r'] / $DataCostST['ZNT_b']) * 100, 2) < -106.5){
					$DataCostST['performance'] = "Excellent";
				}
				else if(round(($DataCostST['ZNT_r'] / $DataCostST['ZNT_b']) * 100, 2) <= 106.5){
					$DataCostST['performance'] = "Good";
				}
				else{
					$DataCostST['performance'] = "Poor";
				}
				$DataCostST['keterangan'] = $lok->keterangan;

				$this->PerlocationPM3_model->set_cost_bkst($DataCostBK, "BK");
				$this->PerlocationPM3_model->set_cost_bkst($DataCostST, "ST");
			}

			echo $lok->lokasi.' - '.$cek++;
			echo "<br />";
		}

		echo "<div class='row'>
			<div class='col-lg-12 text-center'>
				<h1>Update Success Others $wilayah</h1>
			</div>
		</div>";

		if($wilayah == 'W14'){
			echo ("
				<script>
					window.location.href = '/PIS/Admin_PM';
					alert('Berhasil di update Others');
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
					window.location.href = '/PIS/Admin_PM/detail_others?wilayah=W".$cek_wil."';
				</script>
			");
		}
	}

	function sebaran_material(){
		$category = $this->input->get('category');
		if($category == 'Herbisida'){
			$this->PerlocationPM2_model->del_sebaran_material();
		}

		$YEAR_BASE = $this->Konstanta_model->get_konstanta_code("YEAR_BASE");
		$material = $this->Material_model->get_master_material_category($category);

		foreach ($material as $m) {
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W011', $m->material, 'PG1');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W012', $m->material, 'PG1');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W013', $m->material, 'PG1');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}

			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W021', $m->material, 'PG1');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W022', $m->material, 'PG1');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W023', $m->material, 'PG1');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}

			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W031', $m->material, 'PG1');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W032', $m->material, 'PG1');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W033', $m->material, 'PG1');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}

			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W041', $m->material, 'PG1');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W042', $m->material, 'PG1');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W043', $m->material, 'PG1');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}

			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W051', $m->material, 'PG2');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W052', $m->material, 'PG2');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W053', $m->material, 'PG2');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}

			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W061', $m->material, 'PG2');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W062', $m->material, 'PG2');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W063', $m->material, 'PG2');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}

			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W071', $m->material, 'PG2');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W072', $m->material, 'PG2');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W073', $m->material, 'PG2');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}

			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W081', $m->material, 'PG2');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W082', $m->material, 'PG2');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W083', $m->material, 'PG2');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}

			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W091', $m->material, 'PG3');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W092', $m->material, 'PG3');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W093', $m->material, 'PG3');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}

			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W111', $m->material, 'PG3');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W112', $m->material, 'PG3');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W113', $m->material, 'PG3');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}

			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W121', $m->material, 'PG3');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W122', $m->material, 'PG3');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W123', $m->material, 'PG3');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}

			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W131', $m->material, 'PG3');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W132', $m->material, 'PG3');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W133', $m->material, 'PG3');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}

			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W141', $m->material, 'PG3');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W142', $m->material, 'PG3');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material('W143', $m->material, 'PG3');
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Rencana';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}

			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material_panen('P01', $m->material, 'PG1', substr($YEAR_BASE['nilai'], 0, 4));
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Selesai';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material_panen('P02', $m->material, 'PG1', substr($YEAR_BASE['nilai'], 0, 4));
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Selesai';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material_panen('P03', $m->material, 'PG1', substr($YEAR_BASE['nilai'], 0, 4));
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Selesai';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material_panen('P04', $m->material, 'PG1', substr($YEAR_BASE['nilai'], 0, 4));
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Selesai';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material_panen('P05', $m->material, 'PG2', substr($YEAR_BASE['nilai'], 0, 4));
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Selesai';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material_panen('P06', $m->material, 'PG2', substr($YEAR_BASE['nilai'], 0, 4));
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Selesai';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material_panen('P07', $m->material, 'PG2', substr($YEAR_BASE['nilai'], 0, 4));
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Selesai';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material_panen('P08', $m->material, 'PG2', substr($YEAR_BASE['nilai'], 0, 4));
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Selesai';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material_panen('P09', $m->material, 'PG3', substr($YEAR_BASE['nilai'], 0, 4));
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Selesai';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material_panen('P11', $m->material, 'PG3', substr($YEAR_BASE['nilai'], 0, 4));
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Selesai';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material_panen('P12', $m->material, 'PG3', substr($YEAR_BASE['nilai'], 0, 4));
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Selesai';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material_panen('P13', $m->material, 'PG3', substr($YEAR_BASE['nilai'], 0, 4));
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Selesai';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
			$sebaran_material = $this->PerlocationPM2_model->get_sebaran_material_panen('P14', $m->material, 'PG3', substr($YEAR_BASE['nilai'], 0, 4));
			foreach ($sebaran_material as $sm) {
				$data['material'] = $m->material;
				$data['lokasi'] = $sm->lokasi;
				$data['resource'] = $sm->resource;
				$data['activity_code'] = $sm->aktivitas_code;
				$data['activity_desc'] = $sm->aktivitas_desc;
				$data['iklim'] = $sm->iklim;
				$data['rencana'] = 'Selesai';
				$this->PerlocationPM2_model->set_sebaran_material($data);
			}
		}

		echo ("
			<script>
				window.location.href = '/PIS/Admin_PM';
				alert('Berhasil di update Category $category');
			</script>
		");
	}

	function harvest_category_bulan(){
		$this->PerlocationPM2_model->del_harvest_category_bulan();

		$a = 1;
		while ($a <= 14) {
			if($a < 10){
				$harvest_category = $this->PerlocationPM2_model->get_harvest_category_bulan('W0'.$a.'1');
				foreach ($harvest_category as $hc) {
					$data['lokasi'] = $hc->lokasi;
					$data['activity_code'] = $hc->activity_code;
					$data['jenis'] = $hc->jenis;
					$data['category'] = $hc->category;
					$data['P1'] = $hc->P1;
					$data['P2'] = $hc->P2;
					$data['P3'] = $hc->P3;
					$data['P4'] = $hc->P4;
					$data['P5'] = $hc->P5;
					$data['P6'] = $hc->P6;
					$data['keterangan'] = 'Rencana';
					$this->PerlocationPM2_model->set_harvest_category_bulan($data);
				}
				$harvest_category = $this->PerlocationPM2_model->get_harvest_category_bulan('W0'.$a.'2');
				foreach ($harvest_category as $hc) {
					$data['lokasi'] = $hc->lokasi;
					$data['activity_code'] = $hc->activity_code;
					$data['jenis'] = $hc->jenis;
					$data['category'] = $hc->category;
					$data['P1'] = $hc->P1;
					$data['P2'] = $hc->P2;
					$data['P3'] = $hc->P3;
					$data['P4'] = $hc->P4;
					$data['P5'] = $hc->P5;
					$data['P6'] = $hc->P6;
					$data['keterangan'] = 'Rencana';
					$this->PerlocationPM2_model->set_harvest_category_bulan($data);
				}
				$harvest_category = $this->PerlocationPM2_model->get_harvest_category_bulan('W0'.$a.'3');
				foreach ($harvest_category as $hc) {
					$data['lokasi'] = $hc->lokasi;
					$data['activity_code'] = $hc->activity_code;
					$data['jenis'] = $hc->jenis;
					$data['category'] = $hc->category;
					$data['P1'] = $hc->P1;
					$data['P2'] = $hc->P2;
					$data['P3'] = $hc->P3;
					$data['P4'] = $hc->P4;
					$data['P5'] = $hc->P5;
					$data['P6'] = $hc->P6;
					$data['keterangan'] = 'Rencana';
				$this->PerlocationPM2_model->set_harvest_category_bulan($data);
				}

				$harvest_category = $this->PerlocationPM2_model->get_harvest_category_bulan_panen('P0'.$a, '2020');
				foreach ($harvest_category as $hc) {
					$data_panen['lokasi'] = $hc->lokasi;
					$data_panen['activity_code'] = $hc->activity_code;
					$data_panen['jenis'] = $hc->jenis;
					$data_panen['category'] = $hc->category;
					$data_panen['P1'] = $hc->P1;
					$data_panen['P2'] = $hc->P2;
					$data_panen['P3'] = $hc->P3;
					$data_panen['P4'] = $hc->P4;
					$data_panen['P5'] = $hc->P5;
					$data_panen['P6'] = $hc->P6;
					$data_panen['keterangan'] = 'Selesai';
					$this->PerlocationPM2_model->set_harvest_category_bulan($data_panen);
				}
			}
			else if($a > 10){
				$harvest_category = $this->PerlocationPM2_model->get_harvest_category_bulan('W'.$a.'1');
				foreach ($harvest_category as $hc) {
					$data['lokasi'] = $hc->lokasi;
					$data['activity_code'] = $hc->activity_code;
					$data['jenis'] = $hc->jenis;
					$data['category'] = $hc->category;
					$data['P1'] = $hc->P1;
					$data['P2'] = $hc->P2;
					$data['P3'] = $hc->P3;
					$data['P4'] = $hc->P4;
					$data['P5'] = $hc->P5;
					$data['P6'] = $hc->P6;
					$data['keterangan'] = 'Rencana';
					$this->PerlocationPM2_model->set_harvest_category_bulan($data);
				}
				$harvest_category = $this->PerlocationPM2_model->get_harvest_category_bulan('W'.$a.'2');
				foreach ($harvest_category as $hc) {
					$data['lokasi'] = $hc->lokasi;
					$data['activity_code'] = $hc->activity_code;
					$data['jenis'] = $hc->jenis;
					$data['category'] = $hc->category;
					$data['P1'] = $hc->P1;
					$data['P2'] = $hc->P2;
					$data['P3'] = $hc->P3;
					$data['P4'] = $hc->P4;
					$data['P5'] = $hc->P5;
					$data['P6'] = $hc->P6;
					$data['keterangan'] = 'Rencana';
					$this->PerlocationPM2_model->set_harvest_category_bulan($data);
				}
				$harvest_category = $this->PerlocationPM2_model->get_harvest_category_bulan('W'.$a.'3');
				foreach ($harvest_category as $hc) {
					$data['lokasi'] = $hc->lokasi;
					$data['activity_code'] = $hc->activity_code;
					$data['jenis'] = $hc->jenis;
					$data['category'] = $hc->category;
					$data['P1'] = $hc->P1;
					$data['P2'] = $hc->P2;
					$data['P3'] = $hc->P3;
					$data['P4'] = $hc->P4;
					$data['P5'] = $hc->P5;
					$data['P6'] = $hc->P6;
					$data['keterangan'] = 'Rencana';
					$this->PerlocationPM2_model->set_harvest_category_bulan($data);
				}

				$harvest_category = $this->PerlocationPM2_model->get_harvest_category_bulan_panen('P'.$a, '2020');
				foreach ($harvest_category as $hc) {
					$data_panen['lokasi'] = $hc->lokasi;
					$data_panen['activity_code'] = $hc->activity_code;
					$data_panen['jenis'] = $hc->jenis;
					$data_panen['category'] = $hc->category;
					$data_panen['P1'] = $hc->P1;
					$data_panen['P2'] = $hc->P2;
					$data_panen['P3'] = $hc->P3;
					$data_panen['P4'] = $hc->P4;
					$data_panen['P5'] = $hc->P5;
					$data_panen['P6'] = $hc->P6;
					$data_panen['keterangan'] = 'Selesai';
					$this->PerlocationPM2_model->set_harvest_category_bulan($data_panen);
				}
			}
			$a++;
		}

		echo ("
			<script>
				window.location.href = '/PIS/Admin_PM';
				alert('Berhasil di update Harvest');
			</script>
		");
	}

	function detail_bt_sbtcost(){
		$wilayah = $this->input->get('wilayah');
		if($wilayah == 'W01'){
			$query = $this->PerlocationPM2_model->del_berat_tanaman();
			$query = $this->PerlocationPM2_model->del_berat_tanaman_total();
			$query = $this->PerlocationPM3_model->del_sbt_cost_real();
		}
		$cek = 1;

		$konstanta = $this->Konstanta_model->get_konstanta_code("TGL_TARIK_DATA");
		$YEAR_BASE = $this->Konstanta_model->get_konstanta_code("YEAR_BASE");

		$lokasi = $this->PerlocationPM_model->get_lokasi($wilayah);

		foreach ($lokasi as $lok) {
			$bt = $this->PerlocationPM2_model->get_berat_tanaman($lok->lokasi, $lok->keterangan);

			if($bt != NULL){
				$data_bt['lokasi'] = $bt['lokasi'];
				$data_bt['berat_tanaman'] = $bt['Rata2_BT'];

				$std_bt = $this->PerlocationPM2_model->get_std_berat_tanaman($bt['varian'], $bt['jenis'], $bt['kelas'], $bt['akurasi_forcing']);
				if($std_bt == NULL){
					$std_bt = $this->PerlocationPM2_model->get_std_berat_tanaman('GP3', 'SC', 'S', $bt['akurasi_forcing']);
				}

				$data_bt['std_berat_tanaman'] = $std_bt['berat_tanaman'];

				if($data_bt['std_berat_tanaman'] != NULL){
					if($bt['Rata2_BT'] < $std_bt['batas_bawah']){
						$data_bt['batas_bawah'] = 1;
						$data_bt['on_the_track'] = 0;
						$data_bt['batas_atas'] = 0;
					}
					else if($bt['Rata2_BT'] <= $std_bt['batas_atas']){
						$data_bt['batas_bawah'] = 0;
						$data_bt['on_the_track'] = 1;
						$data_bt['batas_atas'] = 0;
					}
					else{
						$data_bt['batas_bawah'] = 0;
						$data_bt['on_the_track'] = 0;
						$data_bt['batas_atas'] = 1;
					}
					$data_bt['keterangan'] = $lok->keterangan;

					$this->PerlocationPM2_model->set_berat_tanaman($data_bt);
				}
			}

			$bt = $this->PerlocationPM2_model->get_berat_tanaman_total($lok->lokasi, $lok->keterangan);

			if($bt != NULL){
				foreach ($bt as $btt) {
					$data_btt['lokasi'] = $btt->lokasi;

					$std_bt = $this->PerlocationPM2_model->get_std_berat_tanaman($btt->varian, $btt->jenis, $btt->kelas, $btt->akurasi_forcing);
					if($std_bt == NULL){
						$std_bt = $this->PerlocationPM2_model->get_std_berat_tanaman('GP3', 'SC', 'S', $btt->akurasi_forcing);
					}

					$data_btt['umur_f'] = $btt->umur_f;
					$data_btt['berat_tanaman'] = $btt->Rata2_BT;
					$data_btt['std_berat_tanaman'] = $std_bt['berat_tanaman'];
					$data_btt['keterangan'] = $lok->keterangan;

					$this->PerlocationPM2_model->set_berat_tanaman_total($data_btt);
				}
			}

			// Here
			if($lok->status == 'NSFC'){
				$realSBT = $this->SBT_model->get_sbt_real_cost(date('Y', strtotime($lok->tgl_panen)), $lok->kelas, $lok->umur);
			}
			else{
				$realSBT = $this->SBT_model->get_sbt_real_cost(date('Y', strtotime($lok->tgl_panen)), 'NSSC', $lok->umur);
			}

			$dataSBTCostReal['lokasi'] = $lok->lokasi;
			$dataSBTCostReal['ZN01'] = $realSBT['ZN01'];
			$dataSBTCostReal['ZN02'] = $realSBT['ZN02'];
			$dataSBTCostReal['ZN03'] = $realSBT['ZN03'];
			$dataSBTCostReal['ZN04'] = $realSBT['ZN04'];
			$dataSBTCostReal['ZN05'] = $realSBT['ZN05'];
			$dataSBTCostReal['ZN06'] = $realSBT['ZN06'];
			$dataSBTCostReal['ZN07'] = $realSBT['ZN07'];
			$dataSBTCostReal['ZN08'] = $realSBT['ZN08'];
			$dataSBTCostReal['ZN09'] = $realSBT['ZN09'];
			$dataSBTCostReal['ZN10'] = $realSBT['ZN10'];
			$dataSBTCostReal['ZN11'] = $realSBT['ZN11'];
			$dataSBTCostReal['ZN12'] = $realSBT['ZN12'];
			$dataSBTCostReal['ZN13'] = $realSBT['ZN13'];
			$dataSBTCostReal['ZN14'] = $realSBT['ZN14'];
			$dataSBTCostReal['ZN15'] = $realSBT['ZN15'];
			$dataSBTCostReal['keterangan'] = $lok->keterangan;

			$this->PerlocationPM3_model->set_sbt_cost_real($dataSBTCostReal);

			// echo "<pre>";
			// var_dump($dataSBTCostReal);
			// echo "</pre>";
			// die();

			echo $lok->lokasi.' - '.$cek++;
			echo "<br />";
		}

		echo "<div class='row'>
			<div class='col-lg-12 text-center'>
				<h1>Update Success BT $wilayah</h1>
			</div>
		</div>";

		if($wilayah == 'W14'){
			echo ("
				<script>
					window.location.href = '/PIS/Admin_PM';
					alert('Berhasil di update BT');
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
					window.location.href = '/PIS/Admin_PM/detail_bt_sbtcost?wilayah=W".$cek_wil."';
				</script>
			");
		}
	}

	function detail_lokasi_trend_cost(){
		$wilayah = $this->input->get('wilayah');
		if($wilayah == 'W01'){
			$query = $this->PerlocationPM3_model->del_lokasi_trend_cost();
		}
		$cek = 1;

		$konstanta = $this->Konstanta_model->get_konstanta_code("TGL_TARIK_DATA");
		$YEAR_BASE = $this->Konstanta_model->get_konstanta_code("YEAR_BASE");

		$lokasi = $this->PerlocationPM_model->get_lokasi($wilayah);

		foreach ($lokasi as $lok) {
			if($lok->keterangan != 'Selesai'){
				$cost_real = $this->PerlocationPM3_model->get_trend_cost($lok->lokasi, $lok->kebun, $lok->tgl_perawatan);
			}
			else{
				$cost_real = $this->PerlocationPM3_model->get_trend_cost_panen($lok->lokasi, 'P'.substr($lok->kebun, 1, 2), $lok->tgl_perawatan, date('Y', strtotime($lok->tgl_panen)));
			}
			$cost_budget = $this->PerlocationPM3_model->get_trend_cost_budget($lok->status);

			//Start
			$data['lokasi'] = $lok->lokasi;

			$a = 1;
			while ($a <= 21) {
				$data['U'.$a.'_r'] = $cost_real['U'.$a];
				$a++;
			}

			$a = 1;
			while ($a <= 21) {
				$data['U'.$a.'_b'] = $cost_budget['U'.$a] * $lok->luas;
				$a++;
			}

			$data['keterangan'] = $lok->keterangan;

			$this->PerlocationPM3_model->set_lokasi_trend_cost($data);
			echo $lok->lokasi.' - '.$cek++;
			echo "<br />";
		}
		echo "<div class='row'>
			<div class='col-lg-12 text-center'>
				<h1>Update Success Trend Cost $wilayah</h1>
			</div>
		</div>";

		if($wilayah == 'W14'){
			echo ("
				<script>
					window.location.href = '/PIS/Admin_PM';
					alert('Berhasil di update TREND COST');
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
					window.location.href = '/PIS/Admin_PM/detail_lokasi_trend_cost?wilayah=W".$cek_wil."';
				</script>
			");
		}
	}

	function detail_lokasi_activity_bkst(){
		$wilayah = $this->input->get('wilayah');
		if($wilayah == 'W01'){
			$query = $this->PerlocationPM3_model->del_activity_BK();
		}
		$cek = 1;

		$konstanta = $this->Konstanta_model->get_konstanta_code("TGL_TARIK_DATA");
		$YEAR_BASE = $this->Konstanta_model->get_konstanta_code("YEAR_BASE");

		$lokasi = $this->PerlocationPM_model->get_lokasi($wilayah);

		foreach ($lokasi as $lok) {
			$NamaActivityBK = $this->PerlocationPM3_model->get_nama_activity_BK();

			$Accum = 1;
			foreach ($NamaActivityBK as $NABK) {
				$ActivityBK = $this->PerlocationPM3_model->get_activity_BK($lok->lokasi, $lok->kebun, $NABK->code, $lok->keterangan, date("Y-m", strtotime($lok->tgl_panen)));
				$AkumHA = 0;
				$Accum = 1;
				$active = 0;
				foreach ($ActivityBK as $ABK) {
					if(($AkumHA + $ABK->HasilEfektif) >= $ABK->TotalHE && $ABK->Category == "Penarik"){
						if($AkumHA != 0){
							$Accum++;
						}
						$active = 1;
					}
					if($ABK->Category == "Penarik"){
						if($active == 1){
							$AkumHA = $ABK->HasilEfektif;
						}
						else{
							$AkumHA += $ABK->HasilEfektif;
						}
					}
				  $DataActivityBK['lokasi'] = $lok->lokasi;
				  $DataActivityBK['activity'] = $NABK->activity;
				  $DataActivityBK['accum'] = $Accum;
				  $DataActivityBK['jenis'] = $ABK->Category;
				  $DataActivityBK['alat'] = $ABK->JenisACT;
				  $DataActivityBK['hasil'] = $ABK->HasilEfektif;
				  $DataActivityBK['biaya'] = $ABK->Biaya;
				  $DataActivityBK['keterangan'] = $lok->keterangan;

				  $this->PerlocationPM3_model->set_activity_BK($DataActivityBK);
				}
			}

			echo $lok->lokasi.' - '.$cek++;
			echo "<br />";
		}
		// echo "<pre>";
		// var_dump("Complete");
		// echo "</pre>";
		// die();
		echo "<div class='row'>
			<div class='col-lg-12 text-center'>
				<h1>Update Success Activity BKST $wilayah</h1>
			</div>
		</div>";

		if($wilayah == 'W14'){
			echo ("
				<script>
					window.location.href = '/PIS/Admin_PM';
					alert('Berhasil di update Activity BKST');
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
					window.location.href = '/PIS/Admin_PM/detail_lokasi_activity_bkst?wilayah=W".$cek_wil."';
				</script>
			");
		}
	}
}
