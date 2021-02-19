<?php

class PerlocationPM3_model extends CI_Model
{

	function get_element_cost_code_jenis($lokasi, $status){
		$query = $this->db->query("SELECT
																  hpp.*
																FROM
																  hpp
																WHERE hpp.`lokasi` = '$lokasi'
																  AND hpp.`status` = '$status'");

		return $query->row_array();
	}
	function cek_jarak_foring($std_tgl, $real_tgl){
		$query = $this->db->query("SELECT FLOOR(TIMESTAMPDIFF(DAY, '$std_tgl', '$real_tgl') / (365.5 / 12)) AS Forcing");

		return $query->row_array();
	}

	function get_sebaran_iklim($w, $status, $jenis, $kelas, $tahun, $bulan, $umur, $material){
		if(substr($w, 0, 2) == 'PG'){
			if($w != 'PG'){
				$pg_wil = "perlocation_lokasi.`pg` = '$w'";
			}
			else{
				$pg_wil = "perlocation_lokasi.`pg` LIKE 'PG%'";
			}
		}
		else{
			$pg_wil = "perlocation_lokasi.`wilayah` = '$w'";
		}
		if($status != 'NS'){
			$option_status = "AND perlocation_lokasi.`status` = '$status'";
		}
		else{
			$option_status = "";
		}
		if($jenis != 'All'){
			$option_jenis = "AND perlocation_lokasi.`jenis` = '$jenis'";
		}
		else{
			$option_jenis = "";
		}
		if($kelas != 'All'){
			$option_kelas = "AND perlocation_lokasi.`kelas` = '$kelas'";
		}
		else{
			$option_kelas = "";
		}
		if($bulan != 'Total'){
			$option_bulan = "AND MONTH(perlocation_lokasi.`tgl_panen`) = '$bulan'";
		}
		else{
			$option_bulan = "";
		}
		if($umur != 'Total'){
			$option_umur = "AND perlocation_lokasi.`umur` = '$umur'";
		}
		else{
			$option_umur = "";
		}
		$query = $this->db->query("SELECT
																  COUNT(perlocation_pm_sebaran_material.`activity_code`) AS Total,
																  SUM(IF(perlocation_pm_sebaran_material.`iklim` = '1', 1, (NULL))) AS S1,
																  SUM(IF(perlocation_pm_sebaran_material.`iklim` = '2', 1, (NULL))) AS S2,
																  SUM(IF(perlocation_pm_sebaran_material.`iklim` = '3', 1, (NULL))) AS S3,
																  SUM(IF(perlocation_pm_sebaran_material.`iklim` = '4', 1, (NULL))) AS S4,
																  SUM(IF(perlocation_pm_sebaran_material.`iklim` = '5', 1, (NULL))) AS S5
																FROM
																  perlocation_lokasi
																  LEFT JOIN perlocation_pm_sebaran_material
																    ON perlocation_lokasi.`lokasi` = perlocation_pm_sebaran_material.`lokasi`
																    AND perlocation_lokasi.`keterangan` = perlocation_pm_sebaran_material.`keterangan`
																    AND perlocation_pm_sebaran_material.`material` = '$material'
																WHERE $pg_wil
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}

	function set_lokasi_trend_cost($data){
		$set = implode("', '", $data);
		$query = $this->db->query("INSERT INTO perlocation_pm_trend_cost
																VALUES
																	(
																		'$set'
																	);");

		return true;
	}
	function del_lokasi_trend_cost(){
		$query = $this->db->query("TRUNCATE perlocation_pm_trend_cost;");

		return true;
	}
	function get_trend_cost($lokasi, $data_master, $tgl_perawatan){
		$query = $this->db->query("SELECT
																  $data_master.`lokasi`,
																  SUM(IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 1 MONTH, $data_master.`biaya_realisasi`, (NULL))) AS U1,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 1 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 2 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U2,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 2 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 3 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U3,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 3 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 4 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U4,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 4 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 5 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U5,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 5 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 6 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U6,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 6 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 7 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U7,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 7 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 8 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U8,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 8 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 9 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U9,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 9 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 10 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U10,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 10 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 11 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U11,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 11 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 12 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U12,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 12 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 13 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U13,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 13 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 14 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U14,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 14 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 15 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U15,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 15 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 16 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U16,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 16 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 17 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U17,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 17 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 18 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U18,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 18 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 19 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U19,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 19 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 20 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U20,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 20 MONTH, $data_master.`biaya_realisasi`, (NULL))) AS U21
																FROM
																  $data_master,
																	help_jenis_data
																WHERE $data_master.`lokasi` = '$lokasi'
																  AND $data_master.`jenis_data` != '7'
																	AND $data_master.`act_grp` IN (
																		'ZN04',
																		'ZN05',
																		'ZN06',
																		'ZN07',
																		'ZN08',
																		'ZN09',
																		'ZN10',
																		'ZN11',
																		'ZN12',
																		'ZN13',
																		'ZN14'
																	)
																	AND $data_master.`jenis_data` = help_jenis_data.`kode`");

		return $query->row_array();
	}
	function get_trend_cost_panen($lokasi, $data_master, $tgl_perawatan, $tahun_panen){
		$query = $this->db->query("SELECT
																  $data_master.`lokasi`,
																  SUM(IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 1 MONTH, $data_master.`biaya_realisasi`, (NULL))) AS U1,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 1 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 2 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U2,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 2 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 3 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U3,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 3 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 4 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U4,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 4 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 5 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U5,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 5 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 6 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U6,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 6 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 7 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U7,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 7 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 8 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U8,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 8 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 9 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U9,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 9 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 10 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U10,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 10 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 11 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U11,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 11 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 12 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U12,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 12 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 13 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U13,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 13 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 14 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U14,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 14 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 15 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U15,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 15 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 16 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U16,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 16 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 17 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U17,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 17 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 18 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U18,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 18 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 19 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U19,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 19 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 20 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U20,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 20 MONTH, $data_master.`biaya_realisasi`, (NULL))) AS U21
																FROM
																  $data_master,
																help_jenis_data
																WHERE $data_master.`lokasi` = '$lokasi'
																  AND SUBSTRING($data_master.`bulan_panen`, 1, 4) = '$tahun_panen'
																  AND $data_master.`jenis_data` != '7'
																	  AND $data_master.`jenis_data` != '7'
																		AND $data_master.`act_grp` IN (
																			'ZN04',
																			'ZN05',
																			'ZN06',
																			'ZN07',
																			'ZN08',
																			'ZN09',
																			'ZN10',
																			'ZN11',
																			'ZN12',
																			'ZN13',
																			'ZN14'
																		)
																AND $data_master.`jenis_data` = help_jenis_data.`kode`");

		return $query->row_array();
	}
	function get_trend_cost_budget($status){
		$query = $this->db->query("SELECT
																  SUM(IF(std_group_cost_budget_total.`umur` = '1', std_group_cost_budget_total.`Total`, (NULL))) AS U1,
																  SUM(IF(std_group_cost_budget_total.`umur` = '2', std_group_cost_budget_total.`Total`, (NULL))) AS U2,
																  SUM(IF(std_group_cost_budget_total.`umur` = '3', std_group_cost_budget_total.`Total`, (NULL))) AS U3,
																  SUM(IF(std_group_cost_budget_total.`umur` = '4', std_group_cost_budget_total.`Total`, (NULL))) AS U4,
																  SUM(IF(std_group_cost_budget_total.`umur` = '5', std_group_cost_budget_total.`Total`, (NULL))) AS U5,
																  SUM(IF(std_group_cost_budget_total.`umur` = '6', std_group_cost_budget_total.`Total`, (NULL))) AS U6,
																  SUM(IF(std_group_cost_budget_total.`umur` = '7', std_group_cost_budget_total.`Total`, (NULL))) AS U7,
																  SUM(IF(std_group_cost_budget_total.`umur` = '8', std_group_cost_budget_total.`Total`, (NULL))) AS U8,
																  SUM(IF(std_group_cost_budget_total.`umur` = '9', std_group_cost_budget_total.`Total`, (NULL))) AS U9,
																  SUM(IF(std_group_cost_budget_total.`umur` = '10', std_group_cost_budget_total.`Total`, (NULL))) AS U10,
																  SUM(IF(std_group_cost_budget_total.`umur` = '11', std_group_cost_budget_total.`Total`, (NULL))) AS U11,
																  SUM(IF(std_group_cost_budget_total.`umur` = '12', std_group_cost_budget_total.`Total`, (NULL))) AS U12,
																  SUM(IF(std_group_cost_budget_total.`umur` = '13', std_group_cost_budget_total.`Total`, (NULL))) AS U13,
																  SUM(IF(std_group_cost_budget_total.`umur` = '14', std_group_cost_budget_total.`Total`, (NULL))) AS U14,
																  SUM(IF(std_group_cost_budget_total.`umur` = '15', std_group_cost_budget_total.`Total`, (NULL))) AS U15,
																  SUM(IF(std_group_cost_budget_total.`umur` = '16', std_group_cost_budget_total.`Total`, (NULL))) AS U16,
																  SUM(IF(std_group_cost_budget_total.`umur` = '17', std_group_cost_budget_total.`Total`, (NULL))) AS U17,
																  SUM(IF(std_group_cost_budget_total.`umur` = '18', std_group_cost_budget_total.`Total`, (NULL))) AS U18,
																  SUM(IF(std_group_cost_budget_total.`umur` = '19', std_group_cost_budget_total.`Total`, (NULL))) AS U19,
																  SUM(IF(std_group_cost_budget_total.`umur` = '20', std_group_cost_budget_total.`Total`, (NULL))) AS U20,
																  SUM(IF(std_group_cost_budget_total.`umur` >= '21', std_group_cost_budget_total.`Total`, (NULL))) AS U21
																FROM
																  std_group_cost_budget_total
																WHERE std_group_cost_budget_total.`status` = '$status'");

		return $query->row_array();
	}

	function set_interval_foliar($data){
		$set = implode("', '", $data);
		$query = $this->db->query("INSERT INTO perlocation_pm_interval_foliar
																VALUES
																	(
																		'$set'
																	);");

		return true;
	}
	function del_interval_foliar(){
		$query = $this->db->query("TRUNCATE perlocation_pm_interval_foliar;");

		return true;
	}
	function get_interval_foliar($lokasi, $data_master){
		$query = $this->db->query("SELECT
																  perlocation_lokasi.`lokasi`,
																  $data_master.`tgl_realisasi`,
																  ROUND(TIMESTAMPDIFF(DAY, perlocation_lokasi.`tgl_forcing`, $data_master.`tgl_realisasi`) / (365.5 / 12)) AS Forcing,
  																TIMESTAMPDIFF(DAY, perlocation_lokasi.`tgl_forcing`, $data_master.`tgl_realisasi`) AS hari
																FROM
																  perlocation_lokasi,
																  $data_master
																WHERE perlocation_lokasi.`lokasi` = $data_master.`lokasi`
  																AND perlocation_lokasi.`lokasi` = '$lokasi'
																  AND $data_master.`aktivitas_code` = '1311131711'
																GROUP BY $data_master.`SPK`,
																  $data_master.`tgl_realisasi`,
																  $data_master.`aktivitas_code`
																ORDER BY perlocation_lokasi.`lokasi` ASC,
																  $data_master.`tgl_realisasi` ASC");

		return $query->result();
	}

	function get_interval_foliar_panen($lokasi, $data_master, $tahun_panen){
		$query = $this->db->query("SELECT
																  perlocation_lokasi.`lokasi`,
																  $data_master.`tgl_realisasi`,
																  ROUND(TIMESTAMPDIFF(DAY, perlocation_lokasi.`tgl_forcing`, $data_master.`tgl_realisasi`) / (365.5 / 12)) AS Forcing,
  																TIMESTAMPDIFF(DAY, perlocation_lokasi.`tgl_forcing`, $data_master.`tgl_realisasi`) AS hari
																FROM
																  perlocation_lokasi,
																  $data_master
																WHERE perlocation_lokasi.`lokasi` = $data_master.`lokasi`
  																AND perlocation_lokasi.`lokasi` = '$lokasi'
																  AND $data_master.`aktivitas_code` = '1311131711'
																  AND SUBSTRING($data_master.`bulan_panen`, 1, 4) = '$tahun_panen'
																GROUP BY $data_master.`SPK`,
																  $data_master.`tgl_realisasi`,
																  $data_master.`aktivitas_code`
																ORDER BY perlocation_lokasi.`lokasi` ASC,
																  $data_master.`tgl_realisasi` ASC");

		return $query->row_array();
	}

	function get_proporsi_interval($w, $status, $jenis, $kelas, $tahun, $bulan, $umur, $forcing){
		if(substr($w, 0, 2) == 'PG'){
			if($w != 'PG'){
				$pg_wil = "perlocation_lokasi.`pg` = '$w'";
			}
			else{
				$pg_wil = "perlocation_lokasi.`pg` LIKE 'PG%'";
			}
		}
		else{
			$pg_wil = "perlocation_lokasi.`wilayah` = '$w'";
		}
		if($status != 'NS'){
			$option_status = "AND perlocation_lokasi.`status` = '$status'";
		}
		else{
			$option_status = "";
		}
		if($jenis != 'All'){
			$option_jenis = "AND perlocation_lokasi.`jenis` = '$jenis'";
		}
		else{
			$option_jenis = "";
		}
		if($kelas != 'All'){
			$option_kelas = "AND perlocation_lokasi.`kelas` = '$kelas'";
		}
		else{
			$option_kelas = "";
		}
		if($bulan != 'Total'){
			$option_bulan = "AND MONTH(perlocation_lokasi.`tgl_panen`) = '$bulan'";
		}
		else{
			$option_bulan = "";
		}
		if($umur != 'Total'){
			$option_umur = "AND perlocation_lokasi.`umur` = '$umur'";
		}
		else{
			$option_umur = "";
		}
		$query = $this->db->query("SELECT
																  SUM(IF(perlocation_pm_interval_foliar.`Interval` <= 10, 1, NULL)) AS F1,
																  SUM(IF(perlocation_pm_interval_foliar.`Interval` > 10, IF(perlocation_pm_interval_foliar.`Interval` <= 15, 1, NULL), NULL)) AS F2,
																  SUM(IF(perlocation_pm_interval_foliar.`Interval` > 15, IF(perlocation_pm_interval_foliar.`Interval` <= 20, 1, NULL), NULL)) AS F3,
																  SUM(IF(perlocation_pm_interval_foliar.`Interval` > 20, 1, NULL)) AS F4,
																  COUNT(perlocation_lokasi.`lokasi`) AS Total
																FROM
																  perlocation_lokasi
																  INNER JOIN perlocation_pm_interval_foliar
																  ON perlocation_lokasi.`lokasi` = perlocation_pm_interval_foliar.`lokasi`
																  AND perlocation_lokasi.`keterangan` = perlocation_pm_interval_foliar.`keterangan`
																  AND perlocation_pm_interval_foliar.`Forcing` = '$forcing'
																WHERE $pg_wil
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}

	function get_lokasi_foliar($w, $status, $jenis, $kelas, $tahun, $bulan, $umur){
		if(substr($w, 0, 2) == 'PG'){
			if($w != 'PG'){
				$pg_wil = "perlocation_lokasi.`pg` = '$w'";
			}
			else{
				$pg_wil = "perlocation_lokasi.`pg` LIKE 'PG%'";
			}
		}
		else{
			$pg_wil = "perlocation_lokasi.`wilayah` = '$w'";
		}
		if($status != 'NS'){
			$option_status = "AND perlocation_lokasi.`status` = '$status'";
		}
		else{
			$option_status = "";
		}
		if($jenis != 'All'){
			$option_jenis = "AND perlocation_lokasi.`jenis` = '$jenis'";
		}
		else{
			$option_jenis = "";
		}
		if($kelas != 'All'){
			$option_kelas = "AND perlocation_lokasi.`kelas` = '$kelas'";
		}
		else{
			$option_kelas = "";
		}
		if($bulan != 'Total'){
			$option_bulan = "AND MONTH(perlocation_lokasi.`tgl_panen`) = '$bulan'";
		}
		else{
			$option_bulan = "";
		}
		if($umur != 'Total'){
			$option_umur = "AND perlocation_lokasi.`umur` = '$umur'";
		}
		else{
			$option_umur = "";
		}
		$query = $this->db->query("SELECT
																  perlocation_pm_interval_foliar.`lokasi`,
																  COUNT(perlocation_pm_interval_foliar.`lokasi`) AS Foliar
																FROM
																  perlocation_lokasi
																  INNER JOIN perlocation_pm_interval_foliar
																  ON perlocation_lokasi.`lokasi` = perlocation_pm_interval_foliar.`lokasi`
																  AND perlocation_lokasi.`keterangan` = perlocation_pm_interval_foliar.`keterangan`
																  AND perlocation_pm_interval_foliar.`Forcing` > 0
																WHERE $pg_wil
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur
																GROUP BY perlocation_lokasi.`lokasi`
																ORDER BY COUNT(perlocation_pm_interval_foliar.`lokasi`) DESC,
																  perlocation_lokasi.`umur` DESC
																LIMIT 30");

		return $query->result();
	}

	function get_sebaran_foliar($w, $status, $jenis, $kelas, $tahun, $bulan, $umur, $type){
		if(substr($w, 0, 2) == 'PG'){
			if($w != 'PG'){
				$pg_wil = "perlocation_lokasi.`pg` = '$w'";
			}
			else{
				$pg_wil = "perlocation_lokasi.`pg` LIKE 'PG%'";
			}
		}
		else{
			$pg_wil = "perlocation_lokasi.`wilayah` = '$w'";
		}
		if($status != 'NS'){
			$option_status = "AND perlocation_lokasi.`status` = '$status'";
		}
		else{
			$option_status = "";
		}
		if($jenis != 'All'){
			$option_jenis = "AND perlocation_lokasi.`jenis` = '$jenis'";
		}
		else{
			$option_jenis = "";
		}
		if($kelas != 'All'){
			$option_kelas = "AND perlocation_lokasi.`kelas` = '$kelas'";
		}
		else{
			$option_kelas = "";
		}
		if($bulan != 'Total'){
			$option_bulan = "AND MONTH(perlocation_lokasi.`tgl_panen`) = '$bulan'";
		}
		else{
			$option_bulan = "";
		}
		if($umur != 'Total'){
			$option_umur = "AND perlocation_lokasi.`umur` = '$umur'";
		}
		else{
			$option_umur = "";
		}
		if($type != 'Average'){
			$query = $this->db->query("SELECT
																	  perlocation_pm_interval_foliar.`lokasi`,
																	  perlocation_pm_interval_foliar.`Forcing`,
																	  perlocation_pm_interval_foliar.`Interval`
																	FROM
																	  perlocation_lokasi,
																	  perlocation_pm_interval_foliar
																	WHERE $pg_wil
																	AND perlocation_lokasi.`lokasi` = perlocation_pm_interval_foliar.`lokasi`
																	AND perlocation_lokasi.`keterangan` = perlocation_pm_interval_foliar.`keterangan`
																	AND perlocation_pm_interval_foliar.`Interval` < 90
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																	  $option_status
																		$option_jenis
																	  $option_kelas
																	  $option_bulan
																		$option_umur
																	ORDER BY perlocation_lokasi.`lokasi` ASC,
																		perlocation_pm_interval_foliar.`Forcing` ASC");
		}
		else{
			$query = $this->db->query("SELECT
																	  perlocation_pm_interval_foliar.`Forcing`,
																	  ROUND(AVG(perlocation_pm_interval_foliar.`Interval`)) AS FI
																	FROM
																	  perlocation_lokasi,
																	  perlocation_pm_interval_foliar
																	WHERE $pg_wil
																	AND perlocation_lokasi.`lokasi` = perlocation_pm_interval_foliar.`lokasi`
																	AND perlocation_lokasi.`keterangan` = perlocation_pm_interval_foliar.`keterangan`
																	AND perlocation_pm_interval_foliar.`Interval` < 90
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																	  $option_status
																		$option_jenis
																	  $option_kelas
																	  $option_bulan
																		$option_umur
																	GROUP BY perlocation_pm_interval_foliar.`Forcing`
																	ORDER BY perlocation_pm_interval_foliar.`Forcing` ASC");
		}

		return $query->result();
	}

	function get_proporsi_tonase($w, $status, $jenis, $kelas, $tahun, $bulan, $umur){
		if(substr($w, 0, 2) == 'PG'){
			if($w != 'PG'){
				$pg_wil = "perlocation_lokasi.`pg` = '$w'";
			}
			else{
				$pg_wil = "perlocation_lokasi.`pg` LIKE 'PG%'";
			}
		}
		else{
			$pg_wil = "perlocation_lokasi.`wilayah` = '$w'";
		}
		if($status != 'NS'){
			$option_status = "AND perlocation_lokasi.`status` = '$status'";
		}
		else{
			$option_status = "";
		}
		if($jenis != 'All'){
			$option_jenis = "AND perlocation_lokasi.`jenis` = '$jenis'";
		}
		else{
			$option_jenis = "";
		}
		if($kelas != 'All'){
			$option_kelas = "AND perlocation_lokasi.`kelas` = '$kelas'";
		}
		else{
			$option_kelas = "";
		}
		if($bulan != 'Total'){
			$option_bulan = "AND MONTH(perlocation_lokasi.`tgl_panen`) = '$bulan'";
		}
		else{
			$option_bulan = "";
		}
		if($umur != 'Total'){
			$option_umur = "AND perlocation_lokasi.`umur` = '$umur'";
		}
		else{
			$option_umur = "";
		}
		$query = $this->db->query("SELECT
																  SUM(IF(perlocation_lokasi.`status` = 'NSFC', perlocation_lokasi.`tonase`, (NULL))) AS NSFC,
																  SUM(IF(perlocation_lokasi.`status` = 'NSSC', perlocation_lokasi.`tonase`, (NULL))) AS NSSC,
																  SUM(perlocation_lokasi.`tonase`) AS Tonase
																FROM
																  perlocation_lokasi
																WHERE $pg_wil
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}

	function get_proporsi_yield($w, $status, $jenis, $kelas, $tahun, $bulan, $umur){
		if(substr($w, 0, 2) == 'PG'){
			if($w != 'PG'){
				$pg_wil = "perlocation_lokasi.`pg` = '$w'";
			}
			else{
				$pg_wil = "perlocation_lokasi.`pg` LIKE 'PG%'";
			}
		}
		else{
			$pg_wil = "perlocation_lokasi.`wilayah` = '$w'";
		}
		if($status != 'NS'){
			$option_status = "AND perlocation_lokasi.`status` = '$status'";
		}
		else{
			$option_status = "";
		}
		if($jenis != 'All'){
			$option_jenis = "AND perlocation_lokasi.`jenis` = '$jenis'";
		}
		else{
			$option_jenis = "";
		}
		if($kelas != 'All'){
			$option_kelas = "AND perlocation_lokasi.`kelas` = '$kelas'";
		}
		else{
			$option_kelas = "";
		}
		if($bulan != 'Total'){
			$option_bulan = "AND MONTH(perlocation_lokasi.`tgl_panen`) = '$bulan'";
		}
		else{
			$option_bulan = "";
		}
		if($umur != 'Total'){
			$option_umur = "AND perlocation_lokasi.`umur` = '$umur'";
		}
		else{
			$option_umur = "";
		}
		$query = $this->db->query("SELECT
																  SUM(IF((perlocation_lokasi.`tonase` / perlocation_lokasi.`luas`) > 98, 1, (NULL))) AS T1,
																  SUM(IF((perlocation_lokasi.`tonase` / perlocation_lokasi.`luas`) > 95, IF((perlocation_lokasi.`tonase` / perlocation_lokasi.`luas`) <= 98, 1, (NULL)), (NULL))) AS T2,
																  SUM(IF((perlocation_lokasi.`tonase` / perlocation_lokasi.`luas`) > 90, IF((perlocation_lokasi.`tonase` / perlocation_lokasi.`luas`) <= 95, 1, (NULL)), (NULL))) AS T3,
																  SUM(IF((perlocation_lokasi.`tonase` / perlocation_lokasi.`luas`) > 80, IF((perlocation_lokasi.`tonase` / perlocation_lokasi.`luas`) <= 90, 1, (NULL)), (NULL))) AS T4,
																  SUM(IF((perlocation_lokasi.`tonase` / perlocation_lokasi.`luas`) > 70, IF((perlocation_lokasi.`tonase` / perlocation_lokasi.`luas`) <= 80, 1, (NULL)), (NULL))) AS T5,
																  SUM(IF((perlocation_lokasi.`tonase` / perlocation_lokasi.`luas`) > 65, IF((perlocation_lokasi.`tonase` / perlocation_lokasi.`luas`) <= 70, 1, (NULL)), (NULL))) AS T6,
																  SUM(IF((perlocation_lokasi.`tonase` / perlocation_lokasi.`luas`) > 60, IF((perlocation_lokasi.`tonase` / perlocation_lokasi.`luas`) <= 65, 1, (NULL)), (NULL))) AS T7,
																  SUM(IF((perlocation_lokasi.`tonase` / perlocation_lokasi.`luas`) > 55, IF((perlocation_lokasi.`tonase` / perlocation_lokasi.`luas`) <= 60, 1, (NULL)), (NULL))) AS T8,
																  SUM(IF((perlocation_lokasi.`tonase` / perlocation_lokasi.`luas`) > 45, IF((perlocation_lokasi.`tonase` / perlocation_lokasi.`luas`) <= 55, 1, (NULL)), (NULL))) AS T9,
																  SUM(IF((perlocation_lokasi.`tonase` / perlocation_lokasi.`luas`) > 35, IF((perlocation_lokasi.`tonase` / perlocation_lokasi.`luas`) <= 45, 1, (NULL)), (NULL))) AS T10,
																  SUM(IF((perlocation_lokasi.`tonase` / perlocation_lokasi.`luas`) > 25, IF((perlocation_lokasi.`tonase` / perlocation_lokasi.`luas`) <= 35, 1, (NULL)), (NULL))) AS T11,
																  SUM(IF((perlocation_lokasi.`tonase` / perlocation_lokasi.`luas`) <= 25, 1, (NULL))) AS T12,
																  COUNT(perlocation_lokasi.`lokasi`) AS Total
																FROM
																  perlocation_lokasi
																WHERE $pg_wil
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}

	function get_proporsi_yield_lokasi($w, $status, $jenis, $kelas, $tahun, $bulan, $umur, $desc){
		if(substr($w, 0, 2) == 'PG'){
			if($w != 'PG'){
				$pg_wil = "perlocation_lokasi.`pg` = '$w'";
			}
			else{
				$pg_wil = "perlocation_lokasi.`pg` LIKE 'PG%'";
			}
		}
		else{
			$pg_wil = "perlocation_lokasi.`wilayah` = '$w'";
		}
		if($status != 'NS'){
			$option_status = "AND perlocation_lokasi.`status` = '$status'";
		}
		else{
			$option_status = "";
		}
		if($jenis != 'All'){
			$option_jenis = "AND perlocation_lokasi.`jenis` = '$jenis'";
		}
		else{
			$option_jenis = "";
		}
		if($kelas != 'All'){
			$option_kelas = "AND perlocation_lokasi.`kelas` = '$kelas'";
		}
		else{
			$option_kelas = "";
		}
		if($bulan != 'Total'){
			$option_bulan = "AND MONTH(perlocation_lokasi.`tgl_panen`) = '$bulan'";
		}
		else{
			$option_bulan = "";
		}
		if($umur != 'Total'){
			$option_umur = "AND perlocation_lokasi.`umur` = '$umur'";
		}
		else{
			$option_umur = "";
		}
		$query = $this->db->query("SELECT
																  perlocation_lokasi.`lokasi`,
																  perlocation_lokasi.`status`,
  																perlocation_lokasi.`keterangan`,
																  perlocation_lokasi.`tonase` / perlocation_lokasi.`luas` AS Yield
																FROM
																  perlocation_lokasi
																WHERE $pg_wil
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur
																ORDER BY Yield $desc
																LIMIT 18");

		return $query->result();
	}

	function get_perlocation_pm($w, $status, $jenis, $kelas, $tahun, $bulan, $umur){
		if(substr($w, 0, 2) == 'PG'){
			if($w != 'PG'){
				$pg_wil = "perlocation_lokasi.`pg` = '$w'";
			}
			else{
				$pg_wil = "perlocation_lokasi.`pg` LIKE 'PG%'";
			}
		}
		else{
			$pg_wil = "perlocation_lokasi.`wilayah` = '$w'";
		}
		if($status != 'NS'){
			$option_status = "AND perlocation_lokasi.`status` = '$status'";
		}
		else{
			$option_status = "";
		}
		if($jenis != 'All'){
			$option_jenis = "AND perlocation_lokasi.`jenis` = '$jenis'";
		}
		else{
			$option_jenis = "";
		}
		if($kelas != 'All'){
			$option_kelas = "AND perlocation_lokasi.`kelas` = '$kelas'";
		}
		else{
			$option_kelas = "";
		}
		if($bulan != 'Total'){
			$option_bulan = "AND MONTH(perlocation_lokasi.`tgl_panen`) = '$bulan'";
		}
		else{
			$option_bulan = "";
		}
		if($umur != 'Total'){
			$option_umur = "AND perlocation_lokasi.`umur` = '$umur'";
		}
		else{
			$option_umur = "";
		}
		// $query = $this->db->query("SELECT
		// 														  perlocation_lokasi.`pg` AS PG,
		// 														  perlocation_lokasi.`wilayah` AS Wilayah,
		// 														  perlocation_lokasi.`kebun` AS Kebun,
		// 														  perlocation_lokasi.`lokasi` AS Lokasi,
		// 														  perlocation_lokasi.`umur` AS Umur,
		// 														  perlocation_lokasi.`jenis` AS Jenis,
		// 														  perlocation_lokasi.`varian` AS Varian,
		// 														  perlocation_lokasi.`kelas` AS Kelas,
		// 														  perlocation_lokasi.`status` AS Status,
		// 														  perlocation_lokasi.`luas` AS Luas,
		// 														  perlocation_lokasi.`tonase` AS Tonase,
		// 														  perlocation_lokasi.`tonase` / perlocation_lokasi.`luas` AS Yield,
		// 														  perlocation_lokasi.`tgl_perawatan` AS TglPerawatan,
		// 														  perlocation_lokasi.`tgl_panen` - INTERVAL 152 DAY AS TglRencanaForcing,
		// 														  lokasi.`tgl_forcing_realisasi` AS TglRealForcing,
		// 														  perlocation_lokasi.`tgl_panen` AS TglPanen,
		// 														  perlocation_lokasi.`tgl_perawatan` + INTERVAL IF(ISNULL(std_forcing_panen.`forcing`), 244, std_forcing_panen.`forcing`) DAY AS TglSTDForcing,
		// 														  perlocation_lokasi.`tgl_perawatan` + INTERVAL IF(ISNULL(std_forcing_panen.`panen`), 396, std_forcing_panen.`panen`) DAY AS TglSTDPanen,
  	// 															perlocation_pm_cost.`akurasi_forcing` AS AccForcing,
		// 														  IF(YEAR(perlocation_lokasi.`tgl_panen`) = YEAR(NOW()), IF(perlocation_lokasi.`status` = 'NSFC', element_cost.`BPP_NSFC_ha`, element_cost.`BPP_NSSC_ha`), IF(perlocation_lokasi.`status` = 'NSFC', element_cost.`BPP_NSFC_ha_t1`, element_cost.`BPP_NSSC_ha_t1`)) AS BudgetHA,
		// 														  perlocation_pm_cost.`ZNT_r` / perlocation_lokasi.`luas` AS RealHA,
		// 														  (perlocation_pm_cost.`ZNT_r` / perlocation_lokasi.`luas`) - IF(YEAR(perlocation_lokasi.`tgl_panen`) = YEAR(NOW()), IF(perlocation_lokasi.`status` = 'NSFC', element_cost.`BPP_NSFC_ha`, element_cost.`BPP_NSSC_ha`), IF(perlocation_lokasi.`status` = 'NSFC', element_cost.`BPP_NSFC_ha_t1`, element_cost.`BPP_NSSC_ha_t1`)) AS SisaSaldo,
		// 														  (perlocation_pm_cost.`ZNT_r` + perlocation_pm_cost.`ZNT_f`) / perlocation_lokasi.`luas` AS RFHA,
		// 														  IF(YEAR(perlocation_lokasi.`tgl_panen`) = YEAR(NOW()), IF(perlocation_lokasi.`status` = 'NSFC', element_cost.`BPP_NSFC_kg`, element_cost.`BPP_NSSC_kg`), IF(perlocation_lokasi.`status` = 'NSFC', element_cost.`BPP_NSFC_kg_t1`, element_cost.`BPP_NSSC_kg_t1`)) AS BudgetKG,
		// 														  perlocation_pm_cost.`ZNT_r` / perlocation_lokasi.`tonase` / 1000 AS RealKG,
		// 														  (perlocation_pm_cost.`ZNT_r` + perlocation_pm_cost.`ZNT_f`) / perlocation_lokasi.`tonase` / 1000 AS RFKG,
		// 														  perlocation_lokasi.`keterangan` AS Keterangan
		// 														FROM
		// 														  perlocation_lokasi
		// 														  LEFT JOIN sumber_air
		// 														  ON perlocation_lokasi.`lokasi` = sumber_air.`lokasi`
		// 														  LEFT JOIN std_forcing_panen
		// 														  ON perlocation_lokasi.`kelas` = std_forcing_panen.`kelas`
		// 														  AND perlocation_lokasi.`status` = 'NSFC'
		// 														  LEFT JOIN lokasi
		// 														  ON perlocation_lokasi.`lokasi` = lokasi.`lokasi`
		// 														  INNER JOIN perlocation_pm_cost
		// 														  ON perlocation_lokasi.`lokasi` = perlocation_pm_cost.`lokasi`
		// 														  AND perlocation_lokasi.`keterangan` = perlocation_pm_cost.`keterangan`,
		// 														  element_cost
		// 														WHERE $pg_wil
		// 															-- AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
  	// 															AND element_cost.`code` = 'ZNTO'
		// 															AND perlocation_lokasi.`keterangan` = 'Rencana'
		// 														  $option_status
		// 															$option_jenis
		// 														  $option_kelas
		// 														  $option_bulan
		// 															$option_umur
		// 														ORDER BY perlocation_lokasi.`lokasi` ASC");
		$query = $this->db->query("SELECT
																  perlocation_lokasi.`pg` AS PG,
																  perlocation_lokasi.`wilayah` AS Wilayah,
																  perlocation_lokasi.`kebun` AS Kebun,
																  perlocation_lokasi.`lokasi` AS Lokasi,
																  perlocation_lokasi.`umur` AS Umur,
																  perlocation_lokasi.`jenis` AS Jenis,
																  perlocation_lokasi.`varian` AS Varian,
																  perlocation_lokasi.`kelas` AS Kelas,
																  perlocation_lokasi.`status` AS Status,
																  perlocation_lokasi.`luas` AS Luas,
																  perlocation_lokasi.`tonase` AS Tonase,
																  perlocation_lokasi.`tonase` / perlocation_lokasi.`luas` AS Yield,
																  perlocation_lokasi.`tgl_perawatan` AS TglPerawatan,
																  perlocation_lokasi.`tgl_panen` - INTERVAL 152 DAY AS TglRencanaForcing,
																  lokasi.`tgl_forcing_realisasi` AS TglRealForcing,
																  perlocation_lokasi.`tgl_panen` AS TglPanen,
																  perlocation_lokasi.`tgl_perawatan` + INTERVAL IF(ISNULL(std_forcing_panen.`forcing`), 244, std_forcing_panen.`forcing`) DAY AS TglSTDForcing,
																  perlocation_lokasi.`tgl_perawatan` + INTERVAL IF(ISNULL(std_forcing_panen.`panen`), 396, std_forcing_panen.`panen`) DAY AS TglSTDPanen,
																  perlocation_pm_cost.`akurasi_forcing` AS AccForcing,
																  IF(YEAR(perlocation_lokasi.`tgl_panen`) = YEAR(NOW()), IF(perlocation_lokasi.`status` = 'NSFC', element_cost.`BPP_NSFC_ha`, element_cost.`BPP_NSSC_ha`), IF(perlocation_lokasi.`status` = 'NSFC', element_cost.`BPP_NSFC_ha_t1`, element_cost.`BPP_NSSC_ha_t1`)) AS BudgetHA,
																  (perlocation_pm_cost.`ZN04_r` + perlocation_pm_cost.`ZN05_r` + perlocation_pm_cost.`ZN06_r` + perlocation_pm_cost.`ZN07_r` + perlocation_pm_cost.`ZN08_r` + perlocation_pm_cost.`ZN09_r` + perlocation_pm_cost.`ZN10_r` + perlocation_pm_cost.`ZN11_r` + perlocation_pm_cost.`ZN12_r` + perlocation_pm_cost.`ZN13_r` + perlocation_pm_cost.`ZN14_r`) / perlocation_lokasi.`luas` AS RealHA,
																  ((perlocation_pm_cost.`ZN04_r` + perlocation_pm_cost.`ZN05_r` + perlocation_pm_cost.`ZN06_r` + perlocation_pm_cost.`ZN07_r` + perlocation_pm_cost.`ZN08_r` + perlocation_pm_cost.`ZN09_r` + perlocation_pm_cost.`ZN10_r` + perlocation_pm_cost.`ZN11_r` + perlocation_pm_cost.`ZN12_r` + perlocation_pm_cost.`ZN13_r` + perlocation_pm_cost.`ZN14_r`) / perlocation_lokasi.`luas`) - IF(YEAR(perlocation_lokasi.`tgl_panen`) = YEAR(NOW()), IF(perlocation_lokasi.`status` = 'NSFC', element_cost.`BPP_NSFC_ha`, element_cost.`BPP_NSSC_ha`), IF(perlocation_lokasi.`status` = 'NSFC', element_cost.`BPP_NSFC_ha_t1`, element_cost.`BPP_NSSC_ha_t1`)) AS SisaSaldo,
																  ((perlocation_pm_cost.`ZN04_r` + perlocation_pm_cost.`ZN05_r` + perlocation_pm_cost.`ZN06_r` + perlocation_pm_cost.`ZN07_r` + perlocation_pm_cost.`ZN08_r` + perlocation_pm_cost.`ZN09_r` + perlocation_pm_cost.`ZN10_r` + perlocation_pm_cost.`ZN11_r` + perlocation_pm_cost.`ZN12_r` + perlocation_pm_cost.`ZN13_r` + perlocation_pm_cost.`ZN14_r`) + perlocation_pm_cost.`ZNT_f`) / perlocation_lokasi.`luas` AS RFHA,
																  IF(YEAR(perlocation_lokasi.`tgl_panen`) = YEAR(NOW()), IF(perlocation_lokasi.`status` = 'NSFC', element_cost.`BPP_NSFC_kg`, element_cost.`BPP_NSSC_kg`), IF(perlocation_lokasi.`status` = 'NSFC', element_cost.`BPP_NSFC_kg_t1`, element_cost.`BPP_NSSC_kg_t1`)) AS BudgetKG,
																  (perlocation_pm_cost.`ZN04_r` + perlocation_pm_cost.`ZN05_r` + perlocation_pm_cost.`ZN06_r` + perlocation_pm_cost.`ZN07_r` + perlocation_pm_cost.`ZN08_r` + perlocation_pm_cost.`ZN09_r` + perlocation_pm_cost.`ZN10_r` + perlocation_pm_cost.`ZN11_r` + perlocation_pm_cost.`ZN12_r` + perlocation_pm_cost.`ZN13_r` + perlocation_pm_cost.`ZN14_r`) / perlocation_lokasi.`tonase` / 1000 AS RealKG,
																  ((perlocation_pm_cost.`ZN04_r` + perlocation_pm_cost.`ZN05_r` + perlocation_pm_cost.`ZN06_r` + perlocation_pm_cost.`ZN07_r` + perlocation_pm_cost.`ZN08_r` + perlocation_pm_cost.`ZN09_r` + perlocation_pm_cost.`ZN10_r` + perlocation_pm_cost.`ZN11_r` + perlocation_pm_cost.`ZN12_r` + perlocation_pm_cost.`ZN13_r` + perlocation_pm_cost.`ZN14_r`) + perlocation_pm_cost.`ZNT_f`) / perlocation_lokasi.`tonase` / 1000 AS RFKG,
																  perlocation_lokasi.`keterangan` AS Keterangan,
  																pengamatan_tanam.`Real_-_Populasi_Tanaman` AS RealPopulasi
																FROM
																  perlocation_lokasi
																  LEFT JOIN sumber_air
																  ON perlocation_lokasi.`lokasi` = sumber_air.`lokasi`
																  LEFT JOIN std_forcing_panen
																  ON perlocation_lokasi.`kelas` = std_forcing_panen.`kelas`
																  AND perlocation_lokasi.`status` = 'NSFC'
																  LEFT JOIN lokasi
																  ON perlocation_lokasi.`lokasi` = lokasi.`lokasi`
																  INNER JOIN perlocation_pm_cost
																  ON perlocation_lokasi.`lokasi` = perlocation_pm_cost.`lokasi`
																  AND perlocation_lokasi.`keterangan` = perlocation_pm_cost.`keterangan`
																  LEFT JOIN pengamatan_tanam
																  ON perlocation_lokasi.`lokasi` = pengamatan_tanam.`Lokasi`,
																  element_cost
																WHERE $pg_wil
																	-- AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
  																AND element_cost.`code` = 'ZNPM'
																	AND perlocation_lokasi.`keterangan` = 'Rencana'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur
																ORDER BY perlocation_lokasi.`lokasi` ASC");

		return $query->result();
	}

	function set_sbt_cost_real($data){
		$set = implode("', '", $data);
		$query = $this->db->query("INSERT INTO perlocation_pm_sbt_cost_real
																VALUES
																	(
																		'$set'
																	);");

		return true;
	}
	function del_sbt_cost_real(){
		$query = $this->db->query("TRUNCATE perlocation_pm_sbt_cost_real;");

		return true;
	}

	function get_sbt_cost_real($w, $status, $jenis, $kelas, $tahun, $bulan, $umur){
		if(substr($w, 0, 2) == 'PG'){
			if($w != 'PG'){
				$pg_wil = "perlocation_lokasi.`pg` = '$w'";
			}
			else{
				$pg_wil = "perlocation_lokasi.`pg` LIKE 'PG%'";
			}
		}
		else{
			$pg_wil = "perlocation_lokasi.`wilayah` = '$w'";
		}
		if($status != 'NS'){
			$option_status = "AND perlocation_lokasi.`status` = '$status'";
		}
		else{
			$option_status = "";
		}
		if($jenis != 'All'){
			$option_jenis = "AND perlocation_lokasi.`jenis` = '$jenis'";
		}
		else{
			$option_jenis = "";
		}
		if($kelas != 'All'){
			$option_kelas = "AND perlocation_lokasi.`kelas` = '$kelas'";
		}
		else{
			$option_kelas = "";
		}
		if($bulan != 'Total'){
			$option_bulan = "AND MONTH(perlocation_lokasi.`tgl_panen`) = '$bulan'";
		}
		else{
			$option_bulan = "";
		}
		if($umur != 'Total'){
			$option_umur = "AND perlocation_lokasi.`umur` = '$umur'";
		}
		else{
			$option_umur = "";
		}
		$query = $this->db->query("SELECT
																  SUM(perlocation_pm_sbt_cost_real.`ZN01` * perlocation_lokasi.`luas`) AS ZN01,
																  SUM(perlocation_pm_sbt_cost_real.`ZN02` * perlocation_lokasi.`luas`) AS ZN02,
																  SUM(perlocation_pm_sbt_cost_real.`ZN03` * perlocation_lokasi.`luas`) AS ZN03,
																  SUM(perlocation_pm_sbt_cost_real.`ZN04` * perlocation_lokasi.`luas`) AS ZN04,
																  SUM(perlocation_pm_sbt_cost_real.`ZN05` * perlocation_lokasi.`luas`) AS ZN05,
																  SUM(perlocation_pm_sbt_cost_real.`ZN06` * perlocation_lokasi.`luas`) AS ZN06,
																  SUM(perlocation_pm_sbt_cost_real.`ZN07` * perlocation_lokasi.`luas`) AS ZN07,
																  SUM(perlocation_pm_sbt_cost_real.`ZN08` * perlocation_lokasi.`luas`) AS ZN08,
																  SUM(perlocation_pm_sbt_cost_real.`ZN09` * perlocation_lokasi.`luas`) AS ZN09,
																  SUM(perlocation_pm_sbt_cost_real.`ZN10` * perlocation_lokasi.`luas`) AS ZN10,
																  SUM(perlocation_pm_sbt_cost_real.`ZN11` * perlocation_lokasi.`luas`) AS ZN11,
																  SUM(perlocation_pm_sbt_cost_real.`ZN12` * perlocation_lokasi.`luas`) AS ZN12,
																  SUM(perlocation_pm_sbt_cost_real.`ZN13` * perlocation_lokasi.`luas`) AS ZN13,
																  SUM(perlocation_pm_sbt_cost_real.`ZN14` * perlocation_lokasi.`luas`) AS ZN14,
																  SUM(perlocation_pm_sbt_cost_real.`ZN15` * perlocation_lokasi.`luas`) AS ZN15,
																	SUM(perlocation_lokasi.`luas`) AS Luas,
																	SUM(perlocation_lokasi.`tonase`) AS Tonase
																FROM
																  perlocation_lokasi
																  INNER JOIN perlocation_pm_sbt_cost_real
																    ON perlocation_lokasi.`lokasi` = perlocation_pm_sbt_cost_real.`lokasi`
																    AND perlocation_lokasi.`keterangan` = perlocation_pm_sbt_cost_real.`keterangan`
																WHERE $pg_wil
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}

	function get_element_cost_code($lokasi, $data_master){
		$query = $this->db->query("SELECT
																  $data_master.`lokasi`,
																  SUM(IF($data_master.`act_grp` = 'ZN01', $data_master.`biaya_realisasi`, (NULL))) AS ZN01,
																  SUM(IF($data_master.`act_grp` = 'ZN02', $data_master.`biaya_realisasi`, (NULL))) AS ZN02,
																  SUM(IF($data_master.`act_grp` = 'ZN03', $data_master.`biaya_realisasi`, (NULL))) AS ZN03,
																  SUM(IF($data_master.`act_grp` = 'ZN04', $data_master.`biaya_realisasi`, (NULL))) AS ZN04,
																  SUM(IF($data_master.`act_grp` = 'ZN05', $data_master.`biaya_realisasi`, (NULL))) AS ZN05,
																  SUM(IF($data_master.`act_grp` = 'ZN06', $data_master.`biaya_realisasi`, (NULL))) AS ZN06,
																  SUM(IF($data_master.`act_grp` = 'ZN07', $data_master.`biaya_realisasi`, (NULL))) AS ZN07,
																  SUM(IF($data_master.`act_grp` = 'ZN08', $data_master.`biaya_realisasi`, (NULL))) AS ZN08,
																  SUM(IF($data_master.`act_grp` = 'ZN09', $data_master.`biaya_realisasi`, (NULL))) AS ZN09,
																  SUM(IF($data_master.`act_grp` = 'ZN10', $data_master.`biaya_realisasi`, (NULL))) AS ZN10,
																  SUM(IF($data_master.`act_grp` = 'ZN11', $data_master.`biaya_realisasi`, (NULL))) AS ZN11,
																  SUM(IF($data_master.`act_grp` = 'ZN12', $data_master.`biaya_realisasi`, (NULL))) AS ZN12,
																  SUM(IF($data_master.`act_grp` = 'ZN13', $data_master.`biaya_realisasi`, (NULL))) AS ZN13,
																  SUM(IF($data_master.`act_grp` = 'ZN14', $data_master.`biaya_realisasi`, (NULL))) AS ZN14,
																  SUM(IF($data_master.`act_grp` = 'ZN15', $data_master.`biaya_realisasi`, (NULL))) AS ZN15,
																  SUM(IF(help_jenis_data.`category` = 'Labour', $data_master.`biaya_realisasi`, (NULL))) AS Labour,
																  SUM(IF(help_jenis_data.`category` = 'Charge', $data_master.`biaya_realisasi`, (NULL))) AS Charge,
																  SUM(IF(help_jenis_data.`category` = 'Material', $data_master.`biaya_realisasi`, (NULL))) AS Material
																FROM
																  $data_master,
  																help_jenis_data
																WHERE $data_master.`lokasi` = '$lokasi'
																  AND $data_master.`jenis_data` != '7'
  																AND $data_master.`jenis_data` = help_jenis_data.`kode`");

		return $query->row_array();
	}

	function get_timeline_landprep_code($lokasi, $data_master){
		$query = $this->db->query("SELECT
																  $data_master.`SPK`,
																  $data_master.`PAS_document`,
																  $data_master.`tgl_realisasi`,
																  help_land_prep.`category` AS jenis,
																  $data_master.`bahan_alat_desc`,
  																SUM($data_master.`biaya_realisasi`) AS biaya_realisasi,
																  $data_master.`hasil_efektif`,
																  help_land_prep_desc.`category`,
																	help_land_prep_desc.`rental`
																FROM
																  $data_master,
																  help_land_prep_desc,
																  help_land_prep
																WHERE $data_master.`jenis_data` != '3X'
																  AND $data_master.`jenis_data` != '7'
  																AND $data_master.`status_lokasi` LIKE '%BK%'
																  AND $data_master.`lokasi` = '$lokasi'
																  AND help_land_prep_desc.`jenis` = $data_master.`bahan_alat_desc`
																  AND $data_master.`aktivitas_code` = help_land_prep.`kode_aktifitas`
  																AND help_land_prep.`category` != 'Jalan & Saluran'
																GROUP BY $data_master.`tgl_realisasi`,
																  help_land_prep_desc.`category`
																	ORDER BY $data_master.`SPK` ASC, help_land_prep_desc.`category` DESC");

		return $query->result();
	}

	function get_total_charge_code($lokasi, $jenis, $data_master){
		if($jenis == 'Charge'){
			$query = $this->db->query("SELECT
																	  SUM($data_master.`biaya_realisasi`) AS total
																	FROM
																	  $data_master,
																	  help_jenis_data
																	WHERE $data_master.`lokasi` = '$lokasi'
																	  AND help_jenis_data.`category` = '$jenis'
																	  AND help_jenis_data.`kode` = $data_master.`jenis_data`
																	  AND $data_master.`status_lokasi` LIKE '%BK%'
																	  AND $data_master.`aktivitas_code` IN (
																	    1113111511,
																	    1113131111,
																	    1113131113,
																	    1113131311,
																	    1113131511,
																	    1113131315,
																	    1113131313,
																	    1113171111,
																	    1113171112,
																	    1113171115
																	  )");
		}
		else if($jenis == 'Material' || $jenis == 'Labour'){
			$query = $this->db->query("SELECT
																	  SUM($data_master.`biaya_realisasi`) AS total
																	FROM
																	  $data_master,
																	  help_jenis_data
																	WHERE $data_master.`lokasi` = '$lokasi'
																	  AND help_jenis_data.`category` = '$jenis'
																	  AND $data_master.`act_grp` = 'ZN01'
																	  AND help_jenis_data.`kode` = $data_master.`jenis_data`
	  																AND $data_master.`status_lokasi` LIKE '%BK%'");
		}
		else{
			$query = $this->db->query("SELECT
																	  SUM($data_master.`biaya_realisasi`) AS total
																	FROM
																	  $data_master,
																	  help_jenis_data
																	WHERE $data_master.`lokasi` = '$lokasi'
																	  AND help_jenis_data.`category` != 'Material'
																	  AND help_jenis_data.`category` != 'Labour'
																	  AND $data_master.`act_grp` = 'ZN01'
																	  AND help_jenis_data.`kode` = $data_master.`jenis_data`
	  																AND $data_master.`status_lokasi` LIKE '%BK%'
																	  AND $data_master.`aktivitas_code` NOT IN (
																	    1113111511,
																	    1113131111,
																	    1113131113,
																	    1113131311,
																	    1113131511,
																	    1113131315,
																	    1113131313,
																	    1113171111,
																	    1113171112,
																	    1113171115
																	  )");
		}

		return $query->row_array();
	}

	function get_total_bibit_code($lokasi, $jenis, $data_master){
		if($jenis == 'Charge'){
			$query = $this->db->query("SELECT
																	  SUM($data_master.`biaya_realisasi`) AS total
																	FROM
																	  $data_master,
																	  help_jenis_data
																	WHERE $data_master.`lokasi` = '$lokasi'
																	  AND help_jenis_data.`category` = '$jenis'
																	  AND help_jenis_data.`kode` = $data_master.`jenis_data`
																	  AND $data_master.`act_grp` = 'ZN03'
																	  AND $data_master.`status_lokasi` LIKE '%ST%'
																	  -- AND $data_master.`aktivitas_code` IN (
																	  --   1113111511,
																	  --   1113131111,
																	  --   1113131113,
																	  --   1113131311,
																	  --   1113131511,
																	  --   1113131315,
																	  --   1113131313,
																	  --   1113171111,
																	  --   1113171112,
																	  --   1113171115
																	  -- )");
		}
		else if($jenis == 'Material' || $jenis == 'Labour'){
			$query = $this->db->query("SELECT
																	  SUM($data_master.`biaya_realisasi`) AS total
																	FROM
																	  $data_master,
																	  help_jenis_data
																	WHERE $data_master.`lokasi` = '$lokasi'
																	  AND help_jenis_data.`category` = '$jenis'
																	  AND $data_master.`act_grp` = 'ZN03'
																	  AND help_jenis_data.`kode` = $data_master.`jenis_data`
	  																AND $data_master.`status_lokasi` LIKE '%ST%'");
		}
		else{
			$query = $this->db->query("SELECT
																	  SUM($data_master.`biaya_realisasi`) AS total
																	FROM
																	  $data_master,
																	  help_jenis_data
																	WHERE $data_master.`lokasi` = '$lokasi'
																	  AND help_jenis_data.`category` != 'Material'
																	  AND help_jenis_data.`category` != 'Labour'
																	  AND $data_master.`act_grp` = 'ZN03'
																	  AND help_jenis_data.`kode` = $data_master.`jenis_data`
	  																AND $data_master.`status_lokasi` LIKE '%ST%'
																	  -- AND $data_master.`aktivitas_code` NOT IN (
																	  --   1113111511,
																	  --   1113131111,
																	  --   1113131113,
																	  --   1113131311,
																	  --   1113131511,
																	  --   1113131315,
																	  --   1113131313,
																	  --   1113171111,
																	  --   1113171112,
																	  --   1113171115
																	  -- )");
		}

		return $query->row_array();
	}

	function get_pengamatan_tanam($lokasi, $tgl_perawatan){
		$query = $this->db->query("SELECT
																  pengamatan_tanam.`Conformance_Conf_-_Jrk_Tnm_Antr_Baris` AS JA_Baris,
																  pengamatan_tanam.`Conformance_Conf_-_Jrk_Tnm_Dlm_Baris` AS JD_Baris,
																  pengamatan_tanam.`Conformance_Conf_-_Kedalaman_Tanam` AS Kedalaman_Tanam,
																  pengamatan_tanam.`Real_-_Populasi_Tanaman` AS Real_Populasi,
																  pengamatan_tanam.`Target_-_Populasi_Tanaman` AS Target_Populasi
																FROM
																  pengamatan_tanam
																WHERE pengamatan_tanam.`Lokasi` = '$lokasi'
																  AND pengamatan_tanam.`Tanggal_Pengamatan` <= '$tgl_perawatan'
																ORDER BY pengamatan_tanam.`Tanggal_Pengamatan` DESC
																LIMIT 1");

		return $query->row_array();
	}
	function get_pengamatan_bibit($lokasi, $tgl_perawatan){
		$query = $this->db->query("SELECT
																  pengamatan_bibit.`Distribusi_Over_(%)` AS B0,
																  pengamatan_bibit.`Distribusi_1_(%)` AS B1,
																  pengamatan_bibit.`Distribusi_2_(%)` AS B2,
																  pengamatan_bibit.`Distribusi_3_(%)` AS B3,
																  pengamatan_bibit.`Distribusi_4_(%)` AS B4,
																  pengamatan_bibit.`Distribusi_5_(%)` AS B5,
																  pengamatan_bibit.`Distribusi_6_(%)` AS B6
																FROM
																  pengamatan_bibit
																WHERE pengamatan_bibit.`Lokasi` = '$lokasi'
																  AND pengamatan_bibit.`Tanggal_Pengamatan` <= '$tgl_perawatan'
																ORDER BY pengamatan_bibit.`Tanggal_Pengamatan` DESC
																LIMIT 1");

		return $query->row_array();
	}
	function get_luas_tanam($lokasi, $element_cost, $data_master, $activity){
		$query = $this->db->query("SELECT
																  SUM(IF($data_master.`hasil_efektif` >= 50, $data_master.`hasil_efektif` / konstanta.`nilai`, $data_master.`hasil_efektif`)) AS Luas
																FROM
																  $data_master,
																  help_jenis_data,
																  konstanta
																WHERE $data_master.`lokasi` = '$lokasi'
																  AND $data_master.`act_grp` = '$element_cost'
																  AND help_jenis_data.`kode` = $data_master.`jenis_data`
																  AND $data_master.`aktivitas_code` = '$activity'
																  AND help_jenis_data.`category` = 'Material'
																  AND konstanta.`jenis` = 'POPULASI_TANAM'
																ORDER BY $data_master.`tgl_realisasi` ASC,
																  $data_master.`SPK` ASC");

		return $query->row_array();
	}

	function get_pengamatan_bajak($lokasi, $tgl_perawatan){
		$query = $this->db->query("SELECT
  																pengamatan_bajak.`Total_(%)` AS Total
																FROM
																  pengamatan_bajak
																WHERE pengamatan_bajak.`Lokasi` = '$lokasi'
																  AND pengamatan_bajak.`Tanggal_Pengamatan` <= '$tgl_perawatan'
																ORDER BY pengamatan_bajak.`Tanggal_Pengamatan` DESC
																LIMIT 1");

		return $query->row_array();
	}
	function get_pengamatan_chopper($lokasi, $tgl_perawatan){
		$query = $this->db->query("SELECT
  																pengamatan_chopper.`Total_(%)` AS Total
																FROM
																  pengamatan_chopper
																WHERE pengamatan_chopper.`Lokasi` = '$lokasi'
																  AND pengamatan_chopper.`Tanggal_Pengamatan` <= '$tgl_perawatan'
																ORDER BY pengamatan_chopper.`Tanggal_Pengamatan` DESC
																LIMIT 1");

		return $query->row_array();
	}
	function get_pengamatan_finishing_harrow($lokasi, $tgl_perawatan){
		$query = $this->db->query("SELECT
  																pengamatan_finishing_harrow.`Total_(%)` AS Total
																FROM
																  pengamatan_finishing_harrow
																WHERE pengamatan_finishing_harrow.`Lokasi` = '$lokasi'
																  AND pengamatan_finishing_harrow.`Tanggal_Pengamatan` <= '$tgl_perawatan'
																ORDER BY pengamatan_finishing_harrow.`Tanggal_Pengamatan` DESC
																LIMIT 1");

		return $query->row_array();
	}
	function get_pengamatan_jalan_saluran($lokasi, $tgl_perawatan){
		$query = $this->db->query("SELECT
																  pengamatan_jalan_saluran.`Total_Pencapaian_(%)` AS Total
																FROM
																  pengamatan_jalan_saluran
																WHERE pengamatan_jalan_saluran.`Lokasi` = '$lokasi'
																  AND pengamatan_jalan_saluran.`Tanggal_Pengamatan` <= '$tgl_perawatan'
																ORDER BY pengamatan_jalan_saluran.`Tanggal_Pengamatan` DESC
																LIMIT 1");

		return $query->row_array();
	}
	function get_pengamatan_ridger($lokasi, $tgl_perawatan){
		$query = $this->db->query("SELECT
  																pengamatan_ridger.`Total_(%)` AS Total
																FROM
																  pengamatan_ridger
																WHERE pengamatan_ridger.`Lokasi` = '$lokasi'
																  AND pengamatan_ridger.`Tanggal_Pengamatan` <= '$tgl_perawatan'
																ORDER BY pengamatan_ridger.`Tanggal_Pengamatan` DESC
																LIMIT 1");

		return $query->row_array();
	}
	function get_history_lokasi($lokasi){
		$query = $this->db->query("SELECT
																  histori_lokasi.`lokasi` AS Lokasi,
																  histori_lokasi.`jenis_tanaman` AS Jenis,
																  histori_lokasi.`status_group` AS Status,
																  histori_lokasi.`tgl_perubahan_status` AS Tgl_Perubahan_Status,
																  histori_lokasi.`kode_bibit_lokasi` AS Bibit,
																  histori_lokasi.`luas_aktif` AS Luas,
																  histori_lokasi.`populasi_awal` AS Populasi_Awal,
																  histori_lokasi.`populasi_akhir` AS Populasi_Akhir,
																  histori_lokasi.`tgl_mulai_tanam` AS Tgl_Tanam,
																  histori_lokasi.`tgl_mulai_perawatan` AS Tgl_Perawatan,
																  histori_lokasi.`tgl_forcing_actual` AS Tgl_Forcing,
																  histori_lokasi.`tgl_panen_actual` AS Tgl_Panen
																FROM
																  histori_lokasi
																WHERE histori_lokasi.`lokasi` = '$lokasi'
																ORDER BY histori_lokasi.`tgl_perubahan_status` DESC");

		return $query->result();
	}
	function get_real_activity($lokasi, $kebun, $element_cost, $activity){
		if($element_cost != 'Total'){
			$category_ec = "AND $kebun.`act_grp` = '$element_cost'";
		}
		else{
			$category_ec = "";
		}
		if($activity != 'Total'){
			$category_act = "AND $kebun.`aktivitas_code` = '$activity'";
		}
		else{
			$category_act = "";
		}
		$query = $this->db->query("SELECT
																  $kebun.`aktivitas_code` AS CodeAct,
																  $kebun.`aktivitas_desc` AS DescAct,
																  $kebun.`act_grp` AS CodGrp,
																  $kebun.`activity_desc` AS DescGrp,
																  SUM(IF(help_jenis_data.`category` = 'Labour', $kebun.`biaya_realisasi`, NULL)) AS Labour,
																  SUM(IF(help_jenis_data.`category` = 'Material' AND $kebun.`act_grp` != 'ZN03', $kebun.`biaya_realisasi`, NULL)) AS Material,
																  SUM(IF(help_jenis_data.`category` = 'Charge', $kebun.`biaya_realisasi`, NULL)) AS Charge,
																  SUM(IF(help_jenis_data.`category` = 'Material' AND $kebun.`act_grp` = 'ZN03', $kebun.`biaya_realisasi`, NULL)) AS Seed,
																  SUM($kebun.`biaya_realisasi`) AS Total
																FROM
																  $kebun
																  LEFT JOIN help_jenis_data
																  ON $kebun.`jenis_data` = help_jenis_data.`kode`
																WHERE $kebun.`lokasi` = '$lokasi'
																	$category_ec
																	$category_act
																GROUP BY $kebun.`aktivitas_code`
																ORDER BY CodGrp ASC, DescAct ASC");

		return $query->result();
	}
	function get_element_cost_list($lokasi, $kebun){
		$query = $this->db->query("SELECT
																  $kebun.`act_grp` AS CodGrp,
																  $kebun.`activity_desc` AS DescGrp
																FROM
																  $kebun
																WHERE $kebun.`lokasi` = '$lokasi'
																GROUP BY $kebun.`act_grp`");

		return $query->result();
	}
	function get_activity_list($lokasi, $kebun, $element_cost){
		if($element_cost != 'Total'){
			$category_ec = "AND $kebun.`act_grp` = '$element_cost'";
		}
		else{
			$category_ec = "";
		}
		$query = $this->db->query("SELECT
																  $kebun.`aktivitas_code` AS CodeAct,
																  $kebun.`aktivitas_desc` AS DescAct
																FROM
																  $kebun
																WHERE $kebun.`lokasi` = '$lokasi'
																  $category_ec
																GROUP BY $kebun.`aktivitas_code`");

		return $query->result();
	}
	function get_budget_activity($tahun, $kelas, $umur, $activity){
		$query = $this->db->query("SELECT
																  sbt_activity.`tahun`,
																  sbt_activity.`kelas`,
																  sbt_activity.`umur`,
																  sbt_activity.`activity` AS CodeAct,
																  help_activity.`desc_activity` AS DescAct,
																  SUM(IF(sbt_activity.`jenis` = 'Labour', sbt_activity.`cost`, NULL)) AS Labour,
																  SUM(IF(sbt_activity.`jenis` = 'Material', sbt_activity.`cost`, NULL)) AS Material,
																  SUM(IF(sbt_activity.`jenis` = 'Charge', sbt_activity.`cost`, NULL)) AS Charge,
																  SUM(sbt_activity.`cost`) AS Total
																FROM
																  sbt_activity
																  LEFT JOIN help_activity
																  ON sbt_activity.`activity` = help_activity.`code_activity`
																WHERE sbt_activity.`tahun` = '$tahun'
																  AND sbt_activity.`kelas` = '$kelas'
																  AND sbt_activity.`umur` = '$umur'
																  AND sbt_activity.`activity` = '$activity'");

		return $query->row_array();
	}
	function get_element_cost_bk($lokasi, $kebun){
		$query = $this->db->query("SELECT
																  $kebun.`lokasi`,
																  SUM(IF($kebun.`act_grp` = 'ZN01', $kebun.`biaya_realisasi`, NULL)) AS ZN01,
																  SUM(IF($kebun.`act_grp` = 'ZN03', $kebun.`biaya_realisasi`, NULL)) AS ZN03,
																  SUM(IF($kebun.`act_grp` = 'ZN04', $kebun.`biaya_realisasi`, NULL)) AS ZN04,
																  SUM(IF($kebun.`act_grp` = 'ZN05', $kebun.`biaya_realisasi`, NULL)) AS ZN05,
																  SUM(IF($kebun.`act_grp` = 'ZN06', $kebun.`biaya_realisasi`, NULL)) AS ZN06,
																  SUM(IF($kebun.`act_grp` = 'ZN07', $kebun.`biaya_realisasi`, NULL)) AS ZN07,
																  SUM(IF($kebun.`act_grp` = 'ZN11', $kebun.`biaya_realisasi`, NULL)) AS ZN11,
																  SUM(IF($kebun.`act_grp` = 'ZN13', $kebun.`biaya_realisasi`, NULL)) AS ZN13,
																  SUM(IF($kebun.`act_grp` = 'ZN14', $kebun.`biaya_realisasi`, NULL)) AS ZN14,
																  SUM(IF($kebun.`act_grp` = 'ZN15', $kebun.`biaya_realisasi`, NULL)) AS ZN15,
																  SUM(IF($kebun.`act_grp` = 'ZN16', $kebun.`biaya_realisasi`, NULL)) AS ZN16
																FROM
																  $kebun
																WHERE $kebun.`lokasi` = '$lokasi'
																  AND SUBSTRING($kebun.`status_lokasi`, 3, 2) = 'BK'");

		return $query->row_array();
	}

	function get_quality_bk($w, $status, $jenis, $kelas, $tahun, $bulan, $umur, $status_bk){
		if(substr($w, 0, 2) == 'PG'){
			if($w != 'PG'){
				$pg_wil = "perlocation_lokasi.`pg` = '$w'";
			}
			else{
				$pg_wil = "perlocation_lokasi.`pg` LIKE 'PG%'";
			}
		}
		else{
			$pg_wil = "perlocation_lokasi.`wilayah` = '$w'";
		}
		if($status != 'NS'){
			$option_status = "AND perlocation_lokasi.`status` = '$status'";
		}
		else{
			$option_status = "";
		}
		if($jenis != 'All'){
			$option_jenis = "AND perlocation_lokasi.`jenis` = '$jenis'";
		}
		else{
			$option_jenis = "";
		}
		if($kelas != 'All'){
			$option_kelas = "AND perlocation_lokasi.`kelas` = '$kelas'";
		}
		else{
			$option_kelas = "";
		}
		if($bulan != 'Total'){
			$option_bulan = "AND MONTH(perlocation_lokasi.`tgl_panen`) = '$bulan'";
		}
		else{
			$option_bulan = "";
		}
		if($umur != 'Total'){
			$option_umur = "AND perlocation_lokasi.`umur` = '$umur'";
		}
		else{
			$option_umur = "";
		}
		if($status_bk != 'Total'){
			$OptionStatusBK = "AND perlocation_lokasi.`status_bk` = '$status_bk'";
		}
		else{
			$OptionStatusBK = "";
		}
		$query = $this->db->query("SELECT
																  perlocation_lokasi.`lokasi` AS Lokasi,
																  MAX(pengamatan_chopper.`Total_(%)`) AS Chopper,
																  MAX(pengamatan_bajak.`Total_(%)`) AS Bajak,
																  MAX(pengamatan_finishing_harrow.`Total_(%)`) AS FinishingHarrow,
																  MAX(pengamatan_ridger.`Total_(%)`) AS Ridger,
																  MAX(pengamatan_jalan_saluran.`Total_Pencapaian_(%)`) AS JalanSaluran
																FROM
																  perlocation_lokasi
																  LEFT JOIN pengamatan_chopper
																  ON perlocation_lokasi.`lokasi` = pengamatan_chopper.`Lokasi`
																  LEFT JOIN pengamatan_bajak
																  ON perlocation_lokasi.`lokasi` = pengamatan_bajak.`Lokasi`
																  LEFT JOIN pengamatan_finishing_harrow
																  ON perlocation_lokasi.`lokasi` = pengamatan_finishing_harrow.`Lokasi`
																  LEFT JOIN pengamatan_ridger
																  ON perlocation_lokasi.`lokasi` = pengamatan_ridger.`Lokasi`
																  LEFT JOIN pengamatan_jalan_saluran
																  ON perlocation_lokasi.`lokasi` = pengamatan_jalan_saluran.`Lokasi`
																WHERE $pg_wil
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																	AND perlocation_lokasi.`status` = 'NSFC'
																	$OptionStatusBK
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur
																GROUP BY perlocation_lokasi.`lokasi`
																ORDER BY perlocation_lokasi.`lokasi` ASC");

		return $query->result();
	}
	function get_std_pengamatan_BKST(){
		$query = $this->db->query("SELECT
																  SUM(IF(std_quality_bkst.`jenis` = 'Chopper', std_quality_bkst.`total`, NULL)) AS Chopper,
																  SUM(IF(std_quality_bkst.`jenis` = 'Bajak', std_quality_bkst.`total`, NULL)) AS Bajak,
																  SUM(IF(std_quality_bkst.`jenis` = 'Subsoil', std_quality_bkst.`total`, NULL)) AS Subsoil,
																  SUM(IF(std_quality_bkst.`jenis` = 'Finishing Harrow', std_quality_bkst.`total`, NULL)) AS FinishingHarrow,
																  SUM(IF(std_quality_bkst.`jenis` = 'Ridger', std_quality_bkst.`total`, NULL)) AS Ridger,
																  SUM(IF(std_quality_bkst.`jenis` = 'Jalan & Saluran', std_quality_bkst.`total`, NULL)) AS JalanSaluran,
																  SUM(IF(std_quality_bkst.`jenis` = 'Jarak Dalam Baris', std_quality_bkst.`total`, NULL)) AS JarakDalamBaris,
																  SUM(IF(std_quality_bkst.`jenis` = 'Jarak Antar Baris', std_quality_bkst.`total`, NULL)) AS JarakAntarBaris,
																  SUM(IF(std_quality_bkst.`jenis` = 'Kedalaman', std_quality_bkst.`total`, NULL)) AS Kedalaman,
																  SUM(IF(std_quality_bkst.`jenis` = 'Populasi', std_quality_bkst.`total`, NULL)) AS Populasi
																FROM
																  std_quality_bkst");

		return $query->row_array();
	}
	function get_luas_proportion_BK($w, $status, $jenis, $kelas, $tahun, $bulan, $umur){
		if(substr($w, 0, 2) == 'PG'){
			if($w != 'PG'){
				$pg_wil = "perlocation_lokasi.`pg` = '$w'";
			}
			else{
				$pg_wil = "perlocation_lokasi.`pg` LIKE 'PG%'";
			}
		}
		else{
			$pg_wil = "perlocation_lokasi.`wilayah` = '$w'";
		}
		if($status != 'NS'){
			$option_status = "AND perlocation_lokasi.`status` = '$status'";
		}
		else{
			$option_status = "";
		}
		if($jenis != 'All'){
			$option_jenis = "AND perlocation_lokasi.`jenis` = '$jenis'";
		}
		else{
			$option_jenis = "";
		}
		if($kelas != 'All'){
			$option_kelas = "AND perlocation_lokasi.`kelas` = '$kelas'";
		}
		else{
			$option_kelas = "";
		}
		if($bulan != 'Total'){
			$option_bulan = "AND MONTH(perlocation_lokasi.`tgl_panen`) = '$bulan'";
		}
		else{
			$option_bulan = "";
		}
		if($umur != 'Total'){
			$option_umur = "AND perlocation_lokasi.`umur` = '$umur'";
		}
		else{
			$option_umur = "";
		}
		$query = $this->db->query("SELECT
																  SUM(IF(perlocation_lokasi.`status_bk` = 'NS', perlocation_lokasi.`luas`, NULL)) AS NSBK,
																  SUM(IF(perlocation_lokasi.`status_bk` = 'PS', perlocation_lokasi.`luas`, NULL)) AS PSBK,
																  SUM(IF(perlocation_lokasi.`status_bk` = 'SK', perlocation_lokasi.`luas`, NULL)) AS SKBK,
																  SUM(IF(perlocation_lokasi.`status_bk` = 'NR', perlocation_lokasi.`luas`, NULL)) AS NRBK,
																  SUM(IF(perlocation_lokasi.`status_bk` = 'NT', perlocation_lokasi.`luas`, NULL)) AS NTBK,
																  SUM(IF(perlocation_lokasi.`status_bk` = 'NF', perlocation_lokasi.`luas`, NULL)) AS NFBK,
																  SUM(IF(perlocation_lokasi.`status_bk` = 'JG', perlocation_lokasi.`luas`, NULL)) AS JGBK,
  																SUM(IF(perlocation_lokasi.`status_bk` != '', perlocation_lokasi.`luas`, NULL)) AS Total
																FROM
																  perlocation_lokasi
																WHERE $pg_wil
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																	AND perlocation_lokasi.`status` = 'NSFC'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}
	function get_element_cost_bkst($lokasi, $kebun, $status, $panen, $bulan_panen){
		if($panen == 'Rencana'){
			$query = $this->db->query("SELECT
																	  $kebun.`lokasi` AS Lokasi,
																	  SUM(IF($kebun.`act_grp` = 'ZN01', $kebun.`biaya_realisasi`, NULL)) AS ZN01,
																	  SUM(IF($kebun.`act_grp` = 'ZN03', $kebun.`biaya_realisasi`, NULL)) AS ZN03,
																	  SUM(IF($kebun.`act_grp` = 'ZN04', $kebun.`biaya_realisasi`, NULL)) AS ZN04,
																	  SUM(IF($kebun.`act_grp` = 'ZN05', $kebun.`biaya_realisasi`, NULL)) AS ZN05,
																	  SUM(IF($kebun.`act_grp` = 'ZN06', $kebun.`biaya_realisasi`, NULL)) AS ZN06,
																	  SUM(IF($kebun.`act_grp` = 'ZN07', $kebun.`biaya_realisasi`, NULL)) AS ZN07,
																	  SUM(IF($kebun.`act_grp` = 'ZN11', $kebun.`biaya_realisasi`, NULL)) AS ZN11,
																	  SUM(IF($kebun.`act_grp` = 'ZN13', $kebun.`biaya_realisasi`, NULL)) AS ZN13,
																	  SUM(IF($kebun.`act_grp` = 'ZN14', $kebun.`biaya_realisasi`, NULL)) AS ZN14,
																	  SUM(IF($kebun.`act_grp` = 'ZN15', $kebun.`biaya_realisasi`, NULL)) AS ZN15
																	FROM
																	  $kebun
																	WHERE $kebun.`lokasi` = '$lokasi'
																	  AND SUBSTRING($kebun.`status_lokasi`, 3, 2) = '$status'");
		}
		else{
			$kebun = "P".substr($kebun, 1, 2);
			$query = $this->db->query("SELECT
																	  $kebun.`lokasi` AS Lokasi,
																	  SUM(IF($kebun.`act_grp` = 'ZN01', $kebun.`biaya_realisasi`, NULL)) AS ZN01,
																	  SUM(IF($kebun.`act_grp` = 'ZN03', $kebun.`biaya_realisasi`, NULL)) AS ZN03,
																	  SUM(IF($kebun.`act_grp` = 'ZN04', $kebun.`biaya_realisasi`, NULL)) AS ZN04,
																	  SUM(IF($kebun.`act_grp` = 'ZN05', $kebun.`biaya_realisasi`, NULL)) AS ZN05,
																	  SUM(IF($kebun.`act_grp` = 'ZN06', $kebun.`biaya_realisasi`, NULL)) AS ZN06,
																	  SUM(IF($kebun.`act_grp` = 'ZN07', $kebun.`biaya_realisasi`, NULL)) AS ZN07,
																	  SUM(IF($kebun.`act_grp` = 'ZN11', $kebun.`biaya_realisasi`, NULL)) AS ZN11,
																	  SUM(IF($kebun.`act_grp` = 'ZN13', $kebun.`biaya_realisasi`, NULL)) AS ZN13,
																	  SUM(IF($kebun.`act_grp` = 'ZN14', $kebun.`biaya_realisasi`, NULL)) AS ZN14,
																	  SUM(IF($kebun.`act_grp` = 'ZN15', $kebun.`biaya_realisasi`, NULL)) AS ZN15
																	FROM
																	  $kebun
																	WHERE $kebun.`lokasi` = '$lokasi'
																	  AND SUBSTRING($kebun.`status_lokasi`, 3, 2) = '$status'
  																	AND $kebun.`bulan_panen` = '$bulan_panen'");
		}

		return $query->row_array();
	}
	function get_group_cost_bkst($lokasi, $kebun, $status, $panen, $bulan_panen){
		if($panen == 'Rencana'){
			if($status == 'BK'){
				$OptionActGrp = "AND $kebun.`act_grp` IN (
														'ZN01',
														'ZN03',
														'ZN04',
														'ZN05',
														'ZN06',
														'ZN07',
														'ZN09',
														'ZN11',
														'ZN13',
														'ZN14',
														'ZN15'
													)";
			}
			else{
				$OptionActGrp = "AND $kebun.`act_grp` IN (
														'ZN01',
														'ZN03',
														'ZN04',
														'ZN05',
														'ZN06',
														'ZN07',
														'ZN09',
														'ZN11',
														'ZN13',
														'ZN14'
													)";
			}
			$query = $this->db->query("SELECT
																	  $kebun.`lokasi` AS Lokasi,
																	  SUM(IF(help_jenis_data.`category` = 'Labour', $kebun.`biaya_realisasi`, NULL)) AS Labour,
																	  SUM(IF(help_jenis_data.`category` = 'Material', IF($kebun.`act_grp` != 'ZN03', $kebun.`biaya_realisasi`, NULL), NULL)) AS Material,
																	  SUM(IF(help_jenis_data.`category` = 'Charge', $kebun.`biaya_realisasi`, NULL)) AS Charge,
  																	SUM(IF(help_jenis_data.`category` = 'Material' || help_jenis_data.`category` = 'Bibit', IF($kebun.`act_grp` = 'ZN03', $kebun.`biaya_realisasi`, NULL), NULL)) AS Seed
																	FROM
																	  $kebun
																	  INNER JOIN help_jenis_data
																	  ON $kebun.`jenis_data` = help_jenis_data.`kode`
																	WHERE $kebun.`lokasi` = '$lokasi'
																	  AND SUBSTRING($kebun.`status_lokasi`, 3, 2) = '$status'
																		$OptionActGrp");
		}
		else{
			$kebun = "P".substr($kebun, 1, 2);
			if($status == 'BK'){
				$OptionActGrp = "AND $kebun.`act_grp` IN (
														'ZN01',
														'ZN03',
														'ZN04',
														'ZN05',
														'ZN06',
														'ZN07',
														'ZN09',
														'ZN11',
														'ZN13',
														'ZN14',
														'ZN15'
													)";
			}
			else{
				$OptionActGrp = "AND $kebun.`act_grp` IN (
														'ZN01',
														'ZN03',
														'ZN04',
														'ZN05',
														'ZN06',
														'ZN07',
														'ZN09',
														'ZN11',
														'ZN13',
														'ZN14'
													)";
			}
			$query = $this->db->query("SELECT
																	  $kebun.`lokasi` AS Lokasi,
																	  SUM(IF(help_jenis_data.`category` = 'Labour', $kebun.`biaya_realisasi`, NULL)) AS Labour,
																	  SUM(IF(help_jenis_data.`category` = 'Material', IF($kebun.`act_grp` != 'ZN03', $kebun.`biaya_realisasi`, NULL), NULL)) AS Material,
																	  SUM(IF(help_jenis_data.`category` = 'Charge', $kebun.`biaya_realisasi`, NULL)) AS Charge,
  																	SUM(IF(help_jenis_data.`category` = 'Material' || help_jenis_data.`category` = 'Bibit', IF($kebun.`act_grp` = 'ZN03', $kebun.`biaya_realisasi`, NULL), NULL)) AS Seed
																	FROM
																	  $kebun
																	  INNER JOIN help_jenis_data
																	  ON $kebun.`jenis_data` = help_jenis_data.`kode`
																	WHERE $kebun.`lokasi` = '$lokasi'
																	  AND SUBSTRING($kebun.`status_lokasi`, 3, 2) = '$status'
  																	AND $kebun.`bulan_panen` = '$bulan_panen'
																		$OptionActGrp");
		}

		return $query->row_array();
	}
	function get_busget_element_cost_bkst($data, $status){
		if($status == 'BK'){
			$query = $this->db->query("SELECT
																	  SUM(IF(std_element_cost_bk.`element_cost` = 'ZN01', std_element_cost_bk.`total`, NULL)) AS ZN01,
																	  SUM(IF(std_element_cost_bk.`element_cost` = 'ZN03', std_element_cost_bk.`total`, NULL)) AS ZN03,
																	  SUM(IF(std_element_cost_bk.`element_cost` = 'ZN04', std_element_cost_bk.`total`, NULL)) AS ZN04,
																	  SUM(IF(std_element_cost_bk.`element_cost` = 'ZN05', std_element_cost_bk.`total`, NULL)) AS ZN05,
																	  SUM(IF(std_element_cost_bk.`element_cost` = 'ZN06', std_element_cost_bk.`total`, NULL)) AS ZN06,
																	  SUM(IF(std_element_cost_bk.`element_cost` = 'ZN07', std_element_cost_bk.`total`, NULL)) AS ZN07,
																	  SUM(IF(std_element_cost_bk.`element_cost` = 'ZN11', std_element_cost_bk.`total`, NULL)) AS ZN11,
																	  SUM(IF(std_element_cost_bk.`element_cost` = 'ZN13', std_element_cost_bk.`total`, NULL)) AS ZN13,
																	  SUM(IF(std_element_cost_bk.`element_cost` = 'ZN14', std_element_cost_bk.`total`, NULL)) AS ZN14,
																	  SUM(IF(std_element_cost_bk.`element_cost` = 'ZN15', std_element_cost_bk.`total`, NULL)) AS ZN15
																	FROM
																	  std_element_cost_bk
																	WHERE SUBSTRING(std_element_cost_bk.`status`, 1, 2) = '$data'");
		}
		else{
			$query = $this->db->query("SELECT
																	  SUM(IF(std_element_cost_st.`element_cost` = 'ZN01', std_element_cost_st.`total`, NULL)) AS ZN01,
																	  SUM(IF(std_element_cost_st.`element_cost` = 'ZN03', std_element_cost_st.`total`, NULL)) AS ZN03,
																	  SUM(IF(std_element_cost_st.`element_cost` = 'ZN04', std_element_cost_st.`total`, NULL)) AS ZN04,
																	  SUM(IF(std_element_cost_st.`element_cost` = 'ZN05', std_element_cost_st.`total`, NULL)) AS ZN05,
																	  SUM(IF(std_element_cost_st.`element_cost` = 'ZN06', std_element_cost_st.`total`, NULL)) AS ZN06,
																	  SUM(IF(std_element_cost_st.`element_cost` = 'ZN07', std_element_cost_st.`total`, NULL)) AS ZN07,
																	  SUM(IF(std_element_cost_st.`element_cost` = 'ZN11', std_element_cost_st.`total`, NULL)) AS ZN11,
																	  SUM(IF(std_element_cost_st.`element_cost` = 'ZN13', std_element_cost_st.`total`, NULL)) AS ZN13,
																	  SUM(IF(std_element_cost_st.`element_cost` = 'ZN14', std_element_cost_st.`total`, NULL)) AS ZN14
																	FROM
																	  std_element_cost_st
																	WHERE std_element_cost_st.`kelas` = '$data'");
		}

		return $query->row_array();
	}

	function set_cost_bkst($data, $status){
		$set = implode("', '", $data);
		$query = $this->db->query("INSERT INTO perlocation_pm_cost_$status
																VALUES
																	(
																		'$set'
																	);");

		return true;
	}
	function del_cost_bkst($status){
		$query = $this->db->query("TRUNCATE perlocation_pm_cost_$status;");

		return true;
	}
	function get_summary_cost_bk($w, $status, $jenis, $kelas, $tahun, $bulan, $umur, $status_bk){
		if(substr($w, 0, 2) == 'PG'){
			if($w != 'PG'){
				$pg_wil = "perlocation_lokasi.`pg` = '$w'";
			}
			else{
				$pg_wil = "perlocation_lokasi.`pg` LIKE 'PG%'";
			}
		}
		else{
			$pg_wil = "perlocation_lokasi.`wilayah` = '$w'";
		}
		if($status != 'NS'){
			$option_status = "AND perlocation_lokasi.`status` = '$status'";
		}
		else{
			$option_status = "";
		}
		if($jenis != 'All'){
			$option_jenis = "AND perlocation_lokasi.`jenis` = '$jenis'";
		}
		else{
			$option_jenis = "";
		}
		if($kelas != 'All'){
			$option_kelas = "AND perlocation_lokasi.`kelas` = '$kelas'";
		}
		else{
			$option_kelas = "";
		}
		if($bulan != 'Total'){
			$option_bulan = "AND MONTH(perlocation_lokasi.`tgl_panen`) = '$bulan'";
		}
		else{
			$option_bulan = "";
		}
		if($umur != 'Total'){
			$option_umur = "AND perlocation_lokasi.`umur` = '$umur'";
		}
		else{
			$option_umur = "";
		}
		if($status_bk != 'Total'){
			$option_status_bk = "AND perlocation_lokasi.`status_bk` = '$status_bk'";
		}
		else{
			$option_status_bk = "";
		}
		$query = $this->db->query("SELECT
																  SUM(perlocation_pm_cost_bk.`ZN01_r`) AS ZN01R,
																  SUM(perlocation_pm_cost_bk.`ZN03_r`) AS ZN03R,
																  SUM(perlocation_pm_cost_bk.`ZN04_r`) AS ZN04R,
																  SUM(perlocation_pm_cost_bk.`ZN05_r`) AS ZN05R,
																  SUM(perlocation_pm_cost_bk.`ZN06_r`) AS ZN06R,
																  SUM(perlocation_pm_cost_bk.`ZN07_r`) AS ZN07R,
																  SUM(perlocation_pm_cost_bk.`ZN11_r`) AS ZN11R,
																  SUM(perlocation_pm_cost_bk.`ZN13_r`) AS ZN13R,
																  SUM(perlocation_pm_cost_bk.`ZN14_r`) AS ZN14R,
																  SUM(perlocation_pm_cost_bk.`ZN15_r`) AS ZN15R,

																  SUM(perlocation_pm_cost_bk.`ZN01_b`) AS ZN01B,
																  SUM(perlocation_pm_cost_bk.`ZN03_b`) AS ZN03B,
																  SUM(perlocation_pm_cost_bk.`ZN04_b`) AS ZN04B,
																  SUM(perlocation_pm_cost_bk.`ZN05_b`) AS ZN05B,
																  SUM(perlocation_pm_cost_bk.`ZN06_b`) AS ZN06B,
																  SUM(perlocation_pm_cost_bk.`ZN07_b`) AS ZN07B,
																  SUM(perlocation_pm_cost_bk.`ZN11_b`) AS ZN11B,
																  SUM(perlocation_pm_cost_bk.`ZN13_b`) AS ZN13B,
																  SUM(perlocation_pm_cost_bk.`ZN14_b`) AS ZN14B,
																  SUM(perlocation_pm_cost_bk.`ZN15_b`) AS ZN15B,

																  SUM(perlocation_pm_cost_bk.`labour_r`) AS Labour,
																  SUM(perlocation_pm_cost_bk.`charge_r`) AS Charge,
																  SUM(perlocation_pm_cost_bk.`material_r`) AS Material,
																  SUM(perlocation_pm_cost_bk.`seed_r`) AS Seed,
																  SUM(perlocation_pm_cost_bk.`ZNT_r`) AS ZNTR,
																  SUM(perlocation_pm_cost_bk.`ZNT_b`) AS ZNTB,
																	SUM(perlocation_lokasi.`luas`) AS Luas
																FROM
																  perlocation_lokasi
																  INNER JOIN perlocation_pm_cost_bk
																  ON perlocation_lokasi.`lokasi` = perlocation_pm_cost_bk.`lokasi`
																  AND perlocation_lokasi.`keterangan` = perlocation_pm_cost_bk.`keterangan`
																WHERE $pg_wil
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																	AND perlocation_lokasi.`status` = 'NSFC'
																	$option_status_bk
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}
	function get_summary_cost_st($w, $status, $jenis, $kelas, $tahun, $bulan, $umur){
		if(substr($w, 0, 2) == 'PG'){
			if($w != 'PG'){
				$pg_wil = "perlocation_lokasi.`pg` = '$w'";
			}
			else{
				$pg_wil = "perlocation_lokasi.`pg` LIKE 'PG%'";
			}
		}
		else{
			$pg_wil = "perlocation_lokasi.`wilayah` = '$w'";
		}
		if($status != 'NS'){
			$option_status = "AND perlocation_lokasi.`status` = '$status'";
		}
		else{
			$option_status = "";
		}
		if($jenis != 'All'){
			$option_jenis = "AND perlocation_lokasi.`jenis` = '$jenis'";
		}
		else{
			$option_jenis = "";
		}
		if($kelas != 'All'){
			$option_kelas = "AND perlocation_lokasi.`kelas` = '$kelas'";
		}
		else{
			$option_kelas = "";
		}
		if($bulan != 'Total'){
			$option_bulan = "AND MONTH(perlocation_lokasi.`tgl_panen`) = '$bulan'";
		}
		else{
			$option_bulan = "";
		}
		if($umur != 'Total'){
			$option_umur = "AND perlocation_lokasi.`umur` = '$umur'";
		}
		else{
			$option_umur = "";
		}
		$query = $this->db->query("SELECT
																  SUM(perlocation_pm_cost_st.`ZN01_r`) AS ZN01R,
																  SUM(perlocation_pm_cost_st.`ZN03_r`) AS ZN03R,
																  SUM(perlocation_pm_cost_st.`ZN04_r`) AS ZN04R,
																  SUM(perlocation_pm_cost_st.`ZN05_r`) AS ZN05R,
																  SUM(perlocation_pm_cost_st.`ZN06_r`) AS ZN06R,
																  SUM(perlocation_pm_cost_st.`ZN07_r`) AS ZN07R,
																  SUM(perlocation_pm_cost_st.`ZN11_r`) AS ZN11R,
																  SUM(perlocation_pm_cost_st.`ZN13_r`) AS ZN13R,
																  SUM(perlocation_pm_cost_st.`ZN14_r`) AS ZN14R,

																  SUM(perlocation_pm_cost_st.`ZN01_b`) AS ZN01B,
																  SUM(perlocation_pm_cost_st.`ZN03_b`) AS ZN03B,
																  SUM(perlocation_pm_cost_st.`ZN04_b`) AS ZN04B,
																  SUM(perlocation_pm_cost_st.`ZN05_b`) AS ZN05B,
																  SUM(perlocation_pm_cost_st.`ZN06_b`) AS ZN06B,
																  SUM(perlocation_pm_cost_st.`ZN07_b`) AS ZN07B,
																  SUM(perlocation_pm_cost_st.`ZN11_b`) AS ZN11B,
																  SUM(perlocation_pm_cost_st.`ZN13_b`) AS ZN13B,
																  SUM(perlocation_pm_cost_st.`ZN14_b`) AS ZN14B,

																  SUM(perlocation_pm_cost_st.`labour_r`) AS Labour,
																  SUM(perlocation_pm_cost_st.`charge_r`) AS Charge,
																  SUM(perlocation_pm_cost_st.`material_r`) AS Material,
																  SUM(perlocation_pm_cost_st.`seed_r`) AS Seed,
																  SUM(perlocation_pm_cost_st.`ZNT_r`) AS ZNTR,
																  SUM(perlocation_pm_cost_st.`ZNT_b`) AS ZNTB,
																	SUM(perlocation_lokasi.`luas`) AS Luas
																FROM
																  perlocation_lokasi
																  LEFT JOIN perlocation_pm_cost_st
																  ON perlocation_lokasi.`lokasi` = perlocation_pm_cost_st.`lokasi`
																  AND perlocation_lokasi.`keterangan` = perlocation_pm_cost_st.`keterangan`
																WHERE $pg_wil
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																	AND perlocation_lokasi.`status` = 'NSFC'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}
	function get_nama_activity_BK(){
		$query = $this->db->query("SELECT
																  std_nama_aktivitas_bk.*
																FROM
																  std_nama_aktivitas_bk");

		return $query->result();
	}
	function get_activity_BK($lokasi, $kebun, $activity, $panen, $bulan_panen){
		if($panen == 'Rencana'){
			$query = $this->db->query("SELECT
																	  $kebun.`aktivitas_code` AS CodeAct,
																	  $kebun.`aktivitas_desc` AS DescAct,
  																	std_nama_alat_bk.`category` AS Category,
																	  std_nama_alat_bk.`jenis` AS JenisACT,
																	  $kebun.`hasil_efektif` AS HasilEfektif,
  																	$kebun.`biaya_realisasi` AS Biaya,
																	  (
																	    SELECT
																	      lokasi.`luas`
																	    FROM
																	      lokasi
																	    WHERE lokasi.`lokasi` = '$lokasi'
																	  ) AS TotalHE
																	FROM
																	  $kebun
																	  INNER JOIN std_nama_alat_bk
																	  ON $kebun.`bahan_alat_desc` = std_nama_alat_bk.`nama`
																	WHERE $kebun.`lokasi` = '$lokasi'
																	  AND $kebun.`aktivitas_code` = '$activity'
																	  AND SUBSTRING($kebun.`status_lokasi`, 3, 2) = 'BK'
																	ORDER BY $kebun.`tgl_realisasi` ASC, $kebun.`SPK` ASC, std_nama_alat_bk.`category` ASC");
		}
		else{
			$kebun = "P".substr($kebun, 1, 2);
			$query = $this->db->query("SELECT
																	  $kebun.`aktivitas_code` AS CodeAct,
																	  $kebun.`aktivitas_desc` AS DescAct,
  																	std_nama_alat_bk.`category` AS Category,
																	  std_nama_alat_bk.`jenis` AS JenisACT,
																	  $kebun.`hasil_efektif` AS HasilEfektif,
  																	$kebun.`biaya_realisasi` AS Biaya,
																	  (
																	    SELECT
																	      lokasi.`luas`
																	    FROM
																	      lokasi
																	    WHERE lokasi.`lokasi` = '$lokasi'
																	  ) AS TotalHE
																	FROM
																	  $kebun
																	  INNER JOIN std_nama_alat_bk
																	  ON $kebun.`bahan_alat_desc` = std_nama_alat_bk.`nama`
																	WHERE $kebun.`lokasi` = '$lokasi'
																	  AND $kebun.`aktivitas_code` = '$activity'
																	  AND SUBSTRING($kebun.`status_lokasi`, 3, 2) = 'BK'
  																	AND $kebun.`bulan_panen` = '$bulan_panen'
																	ORDER BY $kebun.`tgl_realisasi` ASC, $kebun.`SPK` ASC, std_nama_alat_bk.`category` ASC");
		}

		return $query->result();
	}

	function set_activity_BK($data){
		$set = implode("', '", $data);
		$query = $this->db->query("INSERT INTO perlocation_pm_activity_bk
																VALUES
																	(
																		'$set'
																	);");

		return true;
	}
	function del_activity_BK(){
		$query = $this->db->query("TRUNCATE perlocation_pm_activity_bk;");

		return true;
	}
	function get_summary_activity($w, $status, $jenis, $kelas, $tahun, $bulan, $umur, $status_bk, $activity, $accum, $type){
		if(substr($w, 0, 2) == 'PG'){
			if($w != 'PG'){
				$pg_wil = "perlocation_lokasi.`pg` = '$w'";
			}
			else{
				$pg_wil = "perlocation_lokasi.`pg` LIKE 'PG%'";
			}
		}
		else{
			$pg_wil = "perlocation_lokasi.`wilayah` = '$w'";
		}
		if($status != 'NS'){
			$option_status = "AND perlocation_lokasi.`status` = '$status'";
		}
		else{
			$option_status = "";
		}
		if($jenis != 'All'){
			$option_jenis = "AND perlocation_lokasi.`jenis` = '$jenis'";
		}
		else{
			$option_jenis = "";
		}
		if($kelas != 'All'){
			$option_kelas = "AND perlocation_lokasi.`kelas` = '$kelas'";
		}
		else{
			$option_kelas = "";
		}
		if($bulan != 'Total'){
			$option_bulan = "AND MONTH(perlocation_lokasi.`tgl_panen`) = '$bulan'";
		}
		else{
			$option_bulan = "";
		}
		if($umur != 'Total'){
			$option_umur = "AND perlocation_lokasi.`umur` = '$umur'";
		}
		else{
			$option_umur = "";
		}
		$cek = explode("|", $activity);
		if(sizeof($cek) > 1){
			$activity = $cek[0]." ".$cek[1];
		}
		if($type == "Penarik"){
			$OptionView = "SUM(IF(perlocation_pm_activity_bk.`alat` = 'Traktor', 1, NULL)) AS T1,
											SUM(IF(perlocation_pm_activity_bk.`alat` = 'Wheel Traktor', 1, NULL)) AS T2,
											SUM(IF(perlocation_pm_activity_bk.`alat` = 'Rental Traktor', 1, NULL)) AS T3,
											SUM(IF(perlocation_pm_activity_bk.`alat` = 'Motor Grader', 1, NULL)) AS T4,
											SUM(IF(perlocation_pm_activity_bk.`alat` = 'Crawler Dozer', 1, NULL)) AS T5,";
		}
		else{
			switch ($activity) {
				case 'Chopper':
					$OptionView = "SUM(IF(perlocation_pm_activity_bk.`alat` = 'Berti', 1, NULL)) AS T1,
												  SUM(IF(perlocation_pm_activity_bk.`alat` = 'Fae', 1, NULL)) AS T2,
												  SUM(IF(perlocation_pm_activity_bk.`alat` = 'Fecon', 1, NULL)) AS T3,
												  SUM(IF(perlocation_pm_activity_bk.`alat` = 'GGP', 1, NULL)) AS T4,
												  SUM(IF(perlocation_pm_activity_bk.`alat` = 'Jumbo', 1, NULL)) AS T5,
												  SUM(IF(perlocation_pm_activity_bk.`alat` = 'Kulin', 1, NULL)) AS T6,
												  SUM(IF(perlocation_pm_activity_bk.`alat` = 'LU', 1, NULL)) AS T7,";
				break;
				case 'Moldboard':
					$OptionView = "SUM(IF(perlocation_pm_activity_bk.`alat` = 'Kulin', 1, NULL)) AS T1,
												  SUM(IF(perlocation_pm_activity_bk.`alat` = '2.5 BTR', 1, NULL)) AS T2,
												  SUM(IF(perlocation_pm_activity_bk.`alat` = '5 BTR', 1, NULL)) AS T3,
												  SUM(IF(perlocation_pm_activity_bk.`alat` = 'Revers. Kulin', 1, NULL)) AS T4,
												  SUM(IF(perlocation_pm_activity_bk.`alat` = 'Single Kulin', 1, NULL)) AS T5,
												  SUM(IF(perlocation_pm_activity_bk.`alat` = 'GGP', 1, NULL)) AS T6,
												  SUM(IF(perlocation_pm_activity_bk.`alat` = 'Howard', 1, NULL)) AS T7,";
				break;
				case 'Diskplow':
					$OptionView = "SUM(IF(perlocation_pm_activity_bk.`alat` = 'PGN0D01', 1, NULL)) AS T1,
												  SUM(IF(perlocation_pm_activity_bk.`alat` = 'KDK0D01', 1, NULL)) AS T2,
												  SUM(IF(perlocation_pm_activity_bk.`alat` = 'Rental', 1, NULL)) AS T3,";
				break;
				case 'Harrow':
					$OptionView = "SUM(IF(perlocation_pm_activity_bk.`alat` = 'CH64', 1, NULL)) AS T1,
												  SUM(IF(perlocation_pm_activity_bk.`alat` = 'FHK', 1, NULL)) AS T2,
												  SUM(IF(perlocation_pm_activity_bk.`alat` = 'TRCW', 1, NULL)) AS T3,
												  SUM(IF(perlocation_pm_activity_bk.`alat` = 'TRH', 1, NULL)) AS T4,
												  SUM(IF(perlocation_pm_activity_bk.`alat` = 'Rental', 1, NULL)) AS T5,";
				break;
				case 'Sub Soiling':
					$OptionView = "SUM(IF(perlocation_pm_activity_bk.`alat` = 'Mounted', 1, NULL)) AS T1,
  												SUM(IF(perlocation_pm_activity_bk.`alat` = 'R&R', 1, NULL)) AS T2,";
				break;
				case 'Finish Rotary':
					$OptionView = "SUM(IF(perlocation_pm_activity_bk.`alat` = 'Berti', 1, NULL)) AS T1,
												  SUM(IF(perlocation_pm_activity_bk.`alat` = 'Fae', 1, NULL)) AS T2,
												  SUM(IF(perlocation_pm_activity_bk.`alat` = 'Fecon', 1, NULL)) AS T3,
												  SUM(IF(perlocation_pm_activity_bk.`alat` = 'Jumbo', 1, NULL)) AS T4,
												  SUM(IF(perlocation_pm_activity_bk.`alat` = 'Kulin', 1, NULL)) AS T5,
												  SUM(IF(perlocation_pm_activity_bk.`alat` = 'LU', 1, NULL)) AS T6,
												  SUM(IF(perlocation_pm_activity_bk.`alat` = 'Tiller Nortwest', 1, NULL)) AS T7,
												  SUM(IF(perlocation_pm_activity_bk.`alat` = 'Rental', 1, NULL)) AS T8,";
				break;
				case 'Finish Harrow':
					$OptionView = "SUM(IF(perlocation_pm_activity_bk.`alat` = 'CH64', 1, NULL)) AS T1,
												  SUM(IF(perlocation_pm_activity_bk.`alat` = 'FHK', 1, NULL)) AS T2,
												  SUM(IF(perlocation_pm_activity_bk.`alat` = 'TRCW', 1, NULL)) AS T3,
												  SUM(IF(perlocation_pm_activity_bk.`alat` = 'TRH', 1, NULL)) AS T4,
												  SUM(IF(perlocation_pm_activity_bk.`alat` = 'Rental', 1, NULL)) AS T5,";
				break;
				case 'Ridger':
					$OptionView = "SUM(IF(perlocation_pm_activity_bk.`alat` = 'Palir', 1, NULL)) AS T1,
												  SUM(IF(perlocation_pm_activity_bk.`alat` = 'Saluran', 1, NULL)) AS T2,
												  SUM(IF(perlocation_pm_activity_bk.`alat` = 'Single Row', 1, NULL)) AS T3,
												  SUM(IF(perlocation_pm_activity_bk.`alat` = 'Double Row', 1, NULL)) AS T4,
												  SUM(IF(perlocation_pm_activity_bk.`alat` = 'Standard', 1, NULL)) AS T5,
												  SUM(IF(perlocation_pm_activity_bk.`alat` = 'GGP', 1, NULL)) AS T6,";
				break;
				case 'Saluran':
					$OptionView = "SUM(IF(perlocation_pm_activity_bk.`alat` = 'Ridger Standard', 1, NULL)) AS T1,
												  SUM(IF(perlocation_pm_activity_bk.`alat` = 'Ridger Saluran', 1, NULL)) AS T2,
												  SUM(IF(perlocation_pm_activity_bk.`alat` = 'Ridger GGP', 1, NULL)) AS T3,";
				break;
				default:
					$OptionView = "";
				break;
			}
		}
		if($status_bk != 'Total'){
			$OptionStatusBK = "AND perlocation_lokasi.`status_bk` = '$status_bk'";
		}
		else{
			$OptionStatusBK = "";
		}
		$query = $this->db->query("SELECT
																  $OptionView
  																SUM(1) AS Total
																FROM
																  perlocation_lokasi
																  INNER JOIN perlocation_pm_activity_bk
																  ON perlocation_lokasi.`lokasi` = perlocation_pm_activity_bk.`lokasi`
																  AND perlocation_lokasi.`keterangan` = perlocation_pm_activity_bk.`keterangan`
																  AND perlocation_pm_activity_bk.`activity` = '$activity'
																  AND perlocation_pm_activity_bk.`accum` = '$accum'
																  AND perlocation_pm_activity_bk.`jenis` = '$type'
																WHERE $pg_wil
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																	AND perlocation_lokasi.`status` = 'NSFC'
																	$OptionStatusBK
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}

	function get_std_activity_bk($w, $status, $jenis, $kelas, $tahun, $bulan, $umur, $activity){
		if(substr($w, 0, 2) == 'PG'){
			if($w != 'PG'){
				$pg_wil = "AND perlocation_lokasi.`pg` = '$w'";
			}
			else{
				$pg_wil = "AND perlocation_lokasi.`pg` LIKE 'PG%'";
			}
		}
		else{
			$pg_wil = "AND perlocation_lokasi.`wilayah` = '$w'";
		}
		if($status != 'NS'){
			$option_status = "AND perlocation_lokasi.`status` = '$status'";
		}
		else{
			$option_status = "";
		}
		if($jenis != 'All'){
			$option_jenis = "AND perlocation_lokasi.`jenis` = '$jenis'";
		}
		else{
			$option_jenis = "";
		}
		if($kelas != 'All'){
			$option_kelas = "AND perlocation_lokasi.`kelas` = '$kelas'";
		}
		else{
			$option_kelas = "";
		}
		if($bulan != 'Total'){
			$option_bulan = "AND MONTH(perlocation_lokasi.`tgl_panen`) = '$bulan'";
		}
		else{
			$option_bulan = "";
		}
		if($umur != 'Total'){
			$option_umur = "AND perlocation_lokasi.`umur` = '$umur'";
		}
		else{
			$option_umur = "";
		}
		$query = $this->db->query("SELECT
																  SUM(perlocation_pm_activity_budget.`biaya`) AS Biaya
																FROM
																  perlocation_pm_activity_budget
																  INNER JOIN perlocation_lokasi
																    ON perlocation_pm_activity_budget.`lokasi` = perlocation_lokasi.`lokasi`
																    AND perlocation_pm_activity_budget.`keterangan` = perlocation_lokasi.`keterangan`
																		AND perlocation_pm_activity_budget.`activity_code` IN ($activity)
																		$pg_wil
																		AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																		$option_status
																		$option_jenis
																		$option_kelas
																		$option_bulan
																		$option_umur");

		return $query->row_array();
	}
	function get_real_activity_bk($w, $status, $jenis, $kelas, $tahun, $bulan, $umur, $activity, $accum){
		if(substr($w, 0, 2) == 'PG'){
			if($w != 'PG'){
				$pg_wil = "perlocation_lokasi.`pg` = '$w'";
			}
			else{
				$pg_wil = "perlocation_lokasi.`pg` LIKE 'PG%'";
			}
		}
		else{
			$pg_wil = "perlocation_lokasi.`wilayah` = '$w'";
		}
		if($status != 'NS'){
			$option_status = "AND perlocation_lokasi.`status` = '$status'";
		}
		else{
			$option_status = "";
		}
		if($jenis != 'All'){
			$option_jenis = "AND perlocation_lokasi.`jenis` = '$jenis'";
		}
		else{
			$option_jenis = "";
		}
		if($kelas != 'All'){
			$option_kelas = "AND perlocation_lokasi.`kelas` = '$kelas'";
		}
		else{
			$option_kelas = "";
		}
		if($bulan != 'Total'){
			$option_bulan = "AND MONTH(perlocation_lokasi.`tgl_panen`) = '$bulan'";
		}
		else{
			$option_bulan = "";
		}
		if($umur != 'Total'){
			$option_umur = "AND perlocation_lokasi.`umur` = '$umur'";
		}
		else{
			$option_umur = "";
		}
		$cek = explode("|", $activity);
		if(sizeof($cek) > 1){
			$activity = $cek[0]." ".$cek[1];
		}
		$query = $this->db->query("SELECT
															  SUM(perlocation_pm_activity_bk.`biaya`) AS Total,
															  SUM(1) AS Aplikasi
															FROM
																perlocation_lokasi
																INNER JOIN perlocation_pm_activity_bk
																ON perlocation_lokasi.`lokasi` = perlocation_pm_activity_bk.`lokasi`
																AND perlocation_lokasi.`keterangan` = perlocation_pm_activity_bk.`keterangan`
																AND perlocation_pm_activity_bk.`activity` = '$activity'
																AND perlocation_pm_activity_bk.`accum` = '$accum'
															WHERE $pg_wil
																AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																$option_status
																$option_jenis
																$option_kelas
																$option_bulan
																$option_umur");

		return $query->row_array();
	}
	function get_desc_activity_bk($activity){
		$query = $this->db->query("SELECT
																  help_activity.`code_activity` AS CodeAct,
																  help_activity.`desc_activity` AS DescAct
																FROM
																  std_nama_aktivitas_bk
																  LEFT JOIN help_activity
																  ON std_nama_aktivitas_bk.`code` = help_activity.`code_activity`
																WHERE std_nama_aktivitas_bk.`activity` = '$activity'");

		return $query->result();
	}
}
?>
