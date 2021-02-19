<?php

class Performance_model extends CI_Model
{
	function get_peformance_wilayah($wilayah){
		$query = $this->db->query("SELECT
																  SUM(performance.`excellent_ha`) AS Excellent_rp_per_ha,
																  SUM(performance.`good_ha`) AS Good_rp_per_ha,
																  SUM(performance.`poor_ha`) AS Poor_rp_per_ha,
																  SUM(performance.`excellent_kg`) AS Excellent_rp_per_kg,
																  SUM(performance.`good_kg`) AS Good_rp_per_kg,
																  SUM(performance.`poor_kg`) AS Poor_rp_per_kg,
																  SUM(performance.`excellent_ha` + performance.`good_ha` + performance.`poor_ha`) AS Total
																FROM
																  performance
																WHERE performance.`wilayah` = '$wilayah'");

		return $query->row_array();
	}
	function get_peformance_wilayah_tahun($wilayah, $tahun){
		$query = $this->db->query("SELECT
																  SUM(performance.`excellent_ha`) AS Excellent_rp_per_ha,
																  SUM(performance.`good_ha`) AS Good_rp_per_ha,
																  SUM(performance.`poor_ha`) AS Poor_rp_per_ha,
																  SUM(performance.`excellent_kg`) AS Excellent_rp_per_kg,
																  SUM(performance.`good_kg`) AS Good_rp_per_kg,
																  SUM(performance.`poor_kg`) AS Poor_rp_per_kg,
																  SUM(performance.`excellent_ha` + performance.`good_ha` + performance.`poor_ha`) AS Total
																FROM
																  performance
																WHERE performance.`wilayah` = '$wilayah'
																  AND performance.`tahun` = '$tahun'");

		return $query->row_array();
	}
	function set_peformance_wilayah($wilayah, $tahun, $e_ha, $g_ha, $p_ha, $e_kg, $g_kg, $p_kg){
		$query = $this->db->query("UPDATE
																  performance
																SET
																  excellent_ha = '$e_ha',
																  good_ha = '$g_ha',
																  poor_ha = '$p_ha',
																  excellent_kg = '$e_kg',
																  good_kg = '$g_kg',
																  poor_kg = '$p_kg'
																WHERE wilayah = '$wilayah'
																  AND tahun = '$tahun'");

		return $query;
	}
	function get_peformance_pg($pg){
		$query = $this->db->query("SELECT
																  SUM(performance.`excellent_ha`) AS Excellent_rp_per_ha,
																  SUM(performance.`good_ha`) AS Good_rp_per_ha,
																  SUM(performance.`poor_ha`) AS Poor_rp_per_ha,
																  SUM(performance.`excellent_kg`) AS Excellent_rp_per_kg,
																  SUM(performance.`good_kg`) AS Good_rp_per_kg,
																  SUM(performance.`poor_kg`) AS Poor_rp_per_kg,
																  SUM(performance.`excellent_ha` + performance.`good_ha` + performance.`poor_ha`) AS Total
																FROM
																  performance
																WHERE performance.`pg` = '$pg'");

		return $query->row_array();
	}
	function get_peformance_pg_tahun($pg, $tahun){
		$query = $this->db->query("SELECT
																  SUM(performance.`excellent_ha`) AS Excellent_rp_per_ha,
																  SUM(performance.`good_ha`) AS Good_rp_per_ha,
																  SUM(performance.`poor_ha`) AS Poor_rp_per_ha,
																  SUM(performance.`excellent_kg`) AS Excellent_rp_per_kg,
																  SUM(performance.`good_kg`) AS Good_rp_per_kg,
																  SUM(performance.`poor_kg`) AS Poor_rp_per_kg,
																  SUM(performance.`excellent_ha` + performance.`good_ha` + performance.`poor_ha`) AS Total
																FROM
																  performance
																WHERE performance.`pg` = '$pg'
																  AND performance.`tahun` = '$tahun'");

		return $query->row_array();
	}

	function get_perlocation($lokasi){
		$query = $this->db->query("SELECT
																	  help_lokasi_aktif.`pg`,
																	  help_lokasi_aktif.`wilayah`,
																	  lokasi.`kebun`,
																	  lokasi.`lokasi`,
																	  CEIL(TIMESTAMPDIFF(DAY, lokasi.`tgl_mulai_rawat`, konstanta.`nilai`) / 30.4583333333333) AS umur,
																	  IF(lokasi.`bibit` = '', NULL, IF(SUBSTRING(lokasi.`bibit`, 6, 1) = 'C', 'CR', IF(SUBSTRING(lokasi.`bibit`, 6, 1) = 'S', 'SC', IF(SUBSTRING(lokasi.`bibit`, 6, 1) = 'N', 'AN', 'SO')))) AS jenis_bibit,
																	  IF(lokasi.`bibit` = '', NULL, SUBSTRING(lokasi.`bibit`, 3, 3)) AS varian_bibit,
																	  IF(lokasi.`bibit` = '', NULL, SUBSTRING(lokasi.`bibit`, 7, 1)) AS kelas_bibit,
																	  IF(produksi.`keterangan` = 'Selesai', SUBSTRING(lokasi.`status`, 1, 4), IF(ISNULL(produksi.`status`), SUBSTRING(lokasi.`status`, 1, 4), produksi.`status`)) AS status,
																	  IF(produksi.`keterangan` = 'Selesai', IF(ISNULL(produksi_t1.`real_dan_sisa_rencana_luas`), lokasi.`luas`, produksi_t1.`real_dan_sisa_rencana_luas`), IF(ISNULL(produksi.`real_dan_sisa_rencana_luas`), IF(ISNULL(produksi_t1.`real_dan_sisa_rencana_luas`), lokasi.`luas`, produksi_t1.`real_dan_sisa_rencana_luas`), produksi.`real_dan_sisa_rencana_luas`)) AS luas,
																	  IF(produksi.`keterangan` = 'Selesai', IF(ISNULL(produksi_t1.`real_dan_sisa_rencana_tonase`), lokasi.`luas` * std_yield.`yield`, produksi_t1.`real_dan_sisa_rencana_tonase`), IF(ISNULL(produksi.`real_dan_sisa_rencana_tonase`), IF(ISNULL(produksi_t1.`real_dan_sisa_rencana_tonase`), lokasi.`luas` * std_yield.`yield`, produksi_t1.`real_dan_sisa_rencana_tonase`), produksi.`real_dan_sisa_rencana_tonase`)) AS tonase,
																	  IF(ISNULL(lokasi.`tgl_forcing_realisasi`), IF(ISNULL(lokasi.`tgl_forcing_rencana`), lokasi.`tgl_forcing_standard`, lokasi.`tgl_forcing_rencana`), lokasi.`tgl_forcing_realisasi`) AS tgl_rencana_forcing,
																	  IF(produksi.`keterangan` = 'Selesai', IF(ISNULL(produksi_t1.`real_dan_sisa_rencana_tgl_selesai_panen`), IF(ISNULL(lokasi.`tgl_panen_rencana`), lokasi.`tgl_panen_standard`, lokasi.`tgl_panen_rencana`), produksi_t1.`real_dan_sisa_rencana_tgl_selesai_panen`), IF(ISNULL(produksi.`real_dan_sisa_rencana_tgl_selesai_panen`), IF(ISNULL(produksi_t1.`real_dan_sisa_rencana_tgl_selesai_panen`), IF(ISNULL(lokasi.`tgl_panen_rencana`), lokasi.`tgl_panen_standard`, lokasi.`tgl_panen_rencana`), produksi_t1.`real_dan_sisa_rencana_tgl_selesai_panen`), produksi.`real_dan_sisa_rencana_tgl_selesai_panen`)) AS tgl_rencana_panen,
																	  IF(IF(produksi.`keterangan` = 'Selesai', IF(ISNULL(produksi_t1.`status`), SUBSTRING(lokasi.`status`, 1, 4), produksi_t1.`status`), IF(ISNULL(produksi.`status`), IF(ISNULL(produksi_t1.`status`), SUBSTRING(lokasi.`status`, 1, 4), produksi_t1.`status`), produksi.`status`)) = 'NSFC', element_cost.`BPP_NSFC_ha`, element_cost.`BPP_NSSC_ha`) AS budget_rp_per_ha,
																	  IF(IF(produksi.`keterangan` = 'Selesai', IF(ISNULL(produksi_t1.`status`), SUBSTRING(lokasi.`status`, 1, 4), produksi_t1.`status`), IF(ISNULL(produksi.`status`), IF(ISNULL(produksi_t1.`status`), SUBSTRING(lokasi.`status`, 1, 4), produksi_t1.`status`), produksi.`status`)) = 'NSFC', element_cost.`BPP_NSFC_kg`, element_cost.`BPP_NSSC_kg`) AS budget_rp_per_kg,
																	  IF(produksi.`keterangan` = 'Selesai', IF(ISNULL(produksi_t1.`tgl_awal_perawatan`), lokasi.`tgl_mulai_rawat`, produksi_t1.`tgl_awal_perawatan`), IF(ISNULL(produksi.`tgl_awal_perawatan`), IF(ISNULL(produksi_t1.`tgl_awal_perawatan`), lokasi.`tgl_mulai_rawat`, produksi_t1.`tgl_awal_perawatan`), produksi.`tgl_awal_perawatan`)) AS tgl_mulai_rawat
																	FROM
																	  element_cost,
																	  std_yield,
																	  konstanta,
																	  help_lokasi_aktif,
																	  lokasi
																	  LEFT JOIN produksi
																	    ON lokasi.`lokasi` = produksi.`lokasi`
																	  LEFT JOIN produksi_t1
																	    ON lokasi.`lokasi` = produksi_t1.`lokasi`
																	WHERE help_lokasi_aktif.`lokasi_aktif` = lokasi.`lokasi`
																	  AND konstanta.`jenis` = 'TGL_TARIK_DATA'
																	  AND IF(produksi.`keterangan` = 'Selesai', IF(ISNULL(produksi_t1.`status`), SUBSTRING(lokasi.`status`, 1, 4), produksi_t1.`status`), IF(ISNULL(produksi.`status`), IF(ISNULL(produksi_t1.`status`), SUBSTRING(lokasi.`status`, 1, 4), produksi_t1.`status`), produksi.`status`)) = std_yield.`jenis`
																	  AND element_cost.`code` = 'ZNTO'
																	  AND lokasi.`lokasi` = '$lokasi'");

		return $query->row_array();
	}
	function set_perlocation($data){
		$pg = $data['pg'];
		$wilayah = $data['wilayah'];
		$kebun =  $data['kebun'];
		$lokasi =  $data['lokasi'];
		$umur =  $data['umur'];
		$jenis_bibit =  $data['jenis_bibit'];
		$varian_bibit =  $data['varian_bibit'];
		$kelas_bibit =  $data['kelas_bibit'];
		$status =  $data['status'];
		$luas =  $data['luas'];
		$tonase =  $data['tonase'];
		$forcing =  $data['forcing'];
		$panen =  $data['panen'];
		$budget_ha =  $data['budget_ha'];
		$real_ha =  $data['real_ha'];
		$sisa_saldo =  $data['sisa_saldo'];
		$rf_ha =  $data['rf_ha'];
		$deviasi_ha =  $data['deviasi_ha'];
		$category_ha =  $data['category_ha'];
		$budget_kg =  $data['budget_kg'];
		$real_kg =  $data['real_kg'];
		$rf_kg =  $data['rf_kg'];
		$deviasi_kg =  $data['deviasi_kg'];
		$category_kg =  $data['category_kg'];
		$ZN01_r = $data['ZN_r']['ZN01'];
		$ZN02_r = $data['ZN_r']['ZN02'];
		$ZN03_r = $data['ZN_r']['ZN03'];
		$ZN04_r = $data['ZN_r']['ZN04'];
		$ZN05_r = $data['ZN_r']['ZN05'];
		$ZN06_r = $data['ZN_r']['ZN06'];
		$ZN07_r = $data['ZN_r']['ZN07'];
		$ZN08_r = $data['ZN_r']['ZN08'];
		$ZN09_r = $data['ZN_r']['ZN09'];
		$ZN10_r = $data['ZN_r']['ZN10'];
		$ZN11_r = $data['ZN_r']['ZN11'];
		$ZN12_r = $data['ZN_r']['ZN12'];
		$ZN13_r = $data['ZN_r']['ZN13'];
		$ZN14_r = $data['ZN_r']['ZN14'];
		$ZN15_r = $data['ZN_r']['ZN15'];

		$ZN01_f = $data['ZN_f']['ZN01'];
		$ZN02_f = $data['ZN_f']['ZN02'];
		$ZN03_f = $data['ZN_f']['ZN03'];
		$ZN04_f = $data['ZN_f']['ZN04'];
		$ZN05_f = $data['ZN_f']['ZN05'];
		$ZN06_f = $data['ZN_f']['ZN06'];
		$ZN07_f = $data['ZN_f']['ZN07'];
		$ZN08_f = $data['ZN_f']['ZN08'];
		$ZN09_f = $data['ZN_f']['ZN09'];
		$ZN10_f = $data['ZN_f']['ZN10'];
		$ZN11_f = $data['ZN_f']['ZN11'];
		$ZN12_f = $data['ZN_f']['ZN12'];
		$ZN13_f = $data['ZN_f']['ZN13'];
		$ZN14_f = $data['ZN_f']['ZN14'];
		$ZN15_f = $data['ZN_f']['ZN15'];
		$query = $this->db->query("INSERT INTO
																perlocation
															VALUES
															  (
															    '$pg',
															    '$wilayah',
															    '$kebun',
															    '$lokasi',
															    '$umur',
															    '$jenis_bibit',
															    '$varian_bibit',
															    '$kelas_bibit',
															    '$status',
															  	'$luas',
															    '$tonase',
															    '$forcing',
															    '$panen',
															    '$budget_ha',
															    '$real_ha',
															    '$sisa_saldo',
															    '$rf_ha',
															    '$deviasi_ha',
															    '$category_ha',
															    '$budget_kg',
															    '$real_kg',
															    '$rf_kg',
															    '$deviasi_kg',
															    '$category_kg',
																	'$ZN01_r',
																	'$ZN02_r',
																	'$ZN03_r',
																	'$ZN04_r',
																	'$ZN05_r',
																	'$ZN06_r',
																	'$ZN07_r',
																	'$ZN08_r',
																	'$ZN09_r',
																	'$ZN10_r',
																	'$ZN11_r',
																	'$ZN12_r',
																	'$ZN13_r',
																	'$ZN14_r',
																	'$ZN15_r',
																	'$ZN01_f',
																	'$ZN02_f',
																	'$ZN03_f',
																	'$ZN04_f',
																	'$ZN05_f',
																	'$ZN06_f',
																	'$ZN07_f',
																	'$ZN08_f',
																	'$ZN09_f',
																	'$ZN10_f',
																	'$ZN11_f',
																	'$ZN12_f',
																	'$ZN13_f',
																	'$ZN14_f',
																	'$ZN15_f'
															  )");

		return true;
	}

	function clear_perlocation(){
		$query = $this->db->query("TRUNCATE perlocation");
		$query = $this->db->query("TRUNCATE cek_lokasi");

		return true;
	}
	function clear_raport_lokasi(){
		$query = $this->db->query("TRUNCATE raport_lokasi");
		$query = $this->db->query("TRUNCATE luas_tonase_lokasi");

		return true;
	}
	function clear_group_cost(){
		$query = $this->db->query("TRUNCATE group_cost_lokasi");

		return true;
	}
}
