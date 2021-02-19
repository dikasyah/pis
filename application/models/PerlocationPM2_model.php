<?php

class PerlocationPM2_model extends CI_Model
{

	function get_element_cost_ec_real($lokasi, $wilayah){
		$query = $this->db->query("SELECT
																  $wilayah.`act_grp` AS code,
																  SUM(IF(help_jenis_data.`category` = 'Labour', $wilayah.`biaya_realisasi`, (NULL))) AS Labour,
																  SUM(IF(help_jenis_data.`category` = 'Charge', $wilayah.`biaya_realisasi`, (NULL))) AS Charge,
																  SUM(IF(help_jenis_data.`category` = 'Material', $wilayah.`biaya_realisasi`, (NULL))) AS Material
																FROM
																  $wilayah
																  RIGHT JOIN element_cost
																  ON $wilayah.`act_grp` = element_cost.`code`
																  INNER JOIN help_jenis_data
																  ON $wilayah.`jenis_data` = help_jenis_data.`kode`
																WHERE $wilayah.`lokasi` = '$lokasi'
																GROUP BY $wilayah.`act_grp`");

		return $query->result();
	}
	function set_element_cost_ec_real($data){
		$set = implode("', '", $data);
		$query = $this->db->query("INSERT INTO perlocation_group_cost_ec_real
																VALUES
																  (
																    '$set'
																  );");

		return true;
	}
	function del_element_cost_ec_real(){
		$query = $this->db->query("TRUNCATE perlocation_group_cost_ec_real;");

		return true;
	}

	function get_element_cost_ec($w, $status, $jenis, $kelas, $tahun, $bulan, $umur, $ec){
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
																  SUM(perlocation_group_cost_ec_real.`".$ec."_Labour`) AS Labour,
																  SUM(perlocation_group_cost_ec_real.`".$ec."_Charge`) AS Charge,
																  SUM(perlocation_group_cost_ec_real.`".$ec."_Material`) AS Material,
																  SUM(perlocation_group_cost_ec_real.`".$ec."_Labour` + perlocation_group_cost_ec_real.`".$ec."_Charge` + perlocation_group_cost_ec_real.`".$ec."_Material`) AS Total
																FROM
																  perlocation_lokasi
																  INNER JOIN perlocation_group_cost_ec_real
																    ON perlocation_lokasi.`lokasi` = perlocation_group_cost_ec_real.`lokasi`
																    AND perlocation_lokasi.`keterangan` = perlocation_group_cost_ec_real.`keterangan`
																WHERE $pg_wil
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																	$option_status
																	$option_jenis
																	$option_kelas
																	$option_bulan
																	$option_umur");

		return $query->row_array();
	}

	function get_harvest_category($lokasi, $wilayah){
		$query = $this->db->query("SELECT
																  $wilayah.`lokasi`,
																  SUM(IF($wilayah.`aktivitas_code` = '1511111511', $wilayah.`hasil_efektif`, (NULL))) AS Man_Rampet,
																  SUM(IF($wilayah.`aktivitas_code` = '1511111513', $wilayah.`hasil_efektif`, (NULL))) AS Man_Selektif,
																  SUM(IF($wilayah.`aktivitas_code` = '1511111517', $wilayah.`hasil_efektif`, (NULL))) AS Man_Kolekting,
																  SUM(IF($wilayah.`aktivitas_code` = '1511111519', $wilayah.`hasil_efektif`, (NULL))) AS Man_Alami,
																  SUM(IF($wilayah.`aktivitas_code` = '1511111119', $wilayah.`hasil_efektif`, (NULL))) AS Mek_Alami,
																  SUM(IF($wilayah.`aktivitas_code` = '1511111521', $wilayah.`hasil_efektif`, (NULL))) AS Man_Bantuan,
																  SUM(IF($wilayah.`aktivitas_code` = '1511111111', $wilayah.`hasil_efektif`, (NULL))) AS Mek_Rampet,
																  SUM(IF($wilayah.`aktivitas_code` = '1511111113', $wilayah.`hasil_efektif`, (NULL))) AS Mek_Selektif_Pertama,
																  SUM(IF($wilayah.`aktivitas_code` = '1511111115', $wilayah.`hasil_efektif`, (NULL))) AS Mek_Selektif_Rampet
																FROM
																  $wilayah
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`act_grp` = 'ZN10'");

		return $query->row_array();
	}
	function get_harvest_category_panen($lokasi, $wilayah, $tahun){
		$query = $this->db->query("SELECT
																  $wilayah.`lokasi`,
																  SUM(IF($wilayah.`aktivitas_code` = '1511111511', $wilayah.`hasil_efektif`, (NULL))) AS Man_Rampet,
																  SUM(IF($wilayah.`aktivitas_code` = '1511111513', $wilayah.`hasil_efektif`, (NULL))) AS Man_Selektif,
																  SUM(IF($wilayah.`aktivitas_code` = '1511111517', $wilayah.`hasil_efektif`, (NULL))) AS Man_Kolekting,
																  SUM(IF($wilayah.`aktivitas_code` = '1511111519', $wilayah.`hasil_efektif`, (NULL))) AS Man_Alami,
																  SUM(IF($wilayah.`aktivitas_code` = '1511111119', $wilayah.`hasil_efektif`, (NULL))) AS Mek_Alami,
																  SUM(IF($wilayah.`aktivitas_code` = '1511111521', $wilayah.`hasil_efektif`, (NULL))) AS Man_Bantuan,
																  SUM(IF($wilayah.`aktivitas_code` = '1511111111', $wilayah.`hasil_efektif`, (NULL))) AS Mek_Rampet,
																  SUM(IF($wilayah.`aktivitas_code` = '1511111113', $wilayah.`hasil_efektif`, (NULL))) AS Mek_Selektif_Pertama,
																  SUM(IF($wilayah.`aktivitas_code` = '1511111115', $wilayah.`hasil_efektif`, (NULL))) AS Mek_Selektif_Rampet
																FROM
																  $wilayah
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`act_grp` = 'ZN10'
																	AND SUBSTRING($wilayah.`bulan_panen`, 1, 4) = '$tahun'");

		return $query->row_array();
	}
	function set_harvest_category($data){
		$set = implode("', '", $data);
		$query = $this->db->query("INSERT INTO perlocation_harvest_category
																VALUES
																  (
																    '$set'
																  );");

		return true;
	}
	function del_harvest_category(){
		$query = $this->db->query("TRUNCATE perlocation_harvest_category;");

		return true;
	}
	function get_summary_harvest($w, $status, $jenis, $kelas, $tahun, $bulan, $umur){
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
																  SUM(perlocation_harvest_category.`1511111511`) AS Man_Rampet,
																  SUM(perlocation_harvest_category.`1511111513`) AS Man_Selektif,
																  SUM(perlocation_harvest_category.`1511111517`) AS Man_Kolekting,
																  SUM(perlocation_harvest_category.`1511111519`) AS Man_Alami,
																  SUM(perlocation_harvest_category.`1511111119`) AS Mek_Alami,
																  SUM(perlocation_harvest_category.`1511111521`) AS Man_Bantuan,
																  SUM(perlocation_harvest_category.`1511111111`) AS Mek_Rampet,
																  SUM(perlocation_harvest_category.`1511111113`) AS Mek_Selektif_Pertama,
																  SUM(perlocation_harvest_category.`1511111115`) AS Mek_Selektif_Rampet,
  																SUM(perlocation_harvest_category.`1511111511` + perlocation_harvest_category.`1511111513` + perlocation_harvest_category.`1511111517` + perlocation_harvest_category.`1511111519` + perlocation_harvest_category.`1511111119` + perlocation_harvest_category.`1511111521` + perlocation_harvest_category.`1511111111` + perlocation_harvest_category.`1511111113` + perlocation_harvest_category.`1511111115`) AS Total
																FROM
																  perlocation_lokasi
																  INNER JOIN perlocation_harvest_category
																  ON perlocation_lokasi.`lokasi` = perlocation_harvest_category.`lokasi`
																  AND perlocation_lokasi.`keterangan` = perlocation_harvest_category.`keterangan`
																WHERE $pg_wil
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}
	function get_summary_harvest_2($w, $status, $jenis, $kelas, $tahun, $bulan, $umur){
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
																	SUM(perlocation_harvest_category.`1511111511` + perlocation_harvest_category.`1511111513` + perlocation_harvest_category.`1511111517` + perlocation_harvest_category.`1511111519` + perlocation_harvest_category.`1511111521`) AS Manual,
																	SUM(perlocation_harvest_category.`1511111119` + perlocation_harvest_category.`1511111111` + perlocation_harvest_category.`1511111113` + perlocation_harvest_category.`1511111115`) AS Mekanik,
																	SUM(perlocation_harvest_category.`1511111519` + perlocation_harvest_category.`1511111119`) AS Alami,
																	SUM(perlocation_harvest_category.`1511111111` + perlocation_harvest_category.`1511111113` + perlocation_harvest_category.`1511111115`) AS Reguler
																FROM
																  perlocation_lokasi
																  INNER JOIN perlocation_harvest_category
																  ON perlocation_lokasi.`lokasi` = perlocation_harvest_category.`lokasi`
																  AND perlocation_lokasi.`keterangan` = perlocation_harvest_category.`keterangan`
																WHERE $pg_wil
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}

	function get_forcing_activity($lokasi, $wilayah, $activity, $std_tgl_f, $tgl_f){
		$query = $this->db->query("SELECT
																	  $wilayah.`lokasi`,
																	  $wilayah.`aktivitas_code`,
  																	FLOOR(TIMESTAMPDIFF(DAY, '$std_tgl_f', '$tgl_f') / (365.5 / 12)) AS Forcing,
																	  SUM($wilayah.`biaya_realisasi`) AS Cost,
																	  SUM(IF(help_master_material.`material` = 'Urea', $wilayah.`resource`, (NULL))) AS Urea,
																	  SUM(IF(help_master_material.`material` = 'Borax', $wilayah.`resource`, (NULL))) AS Borax,
																	  SUM(IF(help_master_material.`material` = 'Ethylene', $wilayah.`resource`, (NULL))) AS Ethylene,
																	  SUM(IF(help_master_material.`material` = 'Ethepon', $wilayah.`resource`, (NULL))) AS Ethepon,
																	  SUM(IF(help_master_material.`material` = 'Kaolin', $wilayah.`resource`, (NULL))) AS Kaolin
																	FROM
																	  $wilayah
																	  LEFT JOIN help_jenis_data
																	     ON $wilayah.`jenis_data` = help_jenis_data.`kode`
																	  LEFT JOIN help_master_material
																	     ON $wilayah.`bahan_alat` = help_master_material.`code`
																	WHERE $wilayah.`lokasi` = '$lokasi'
																	  AND $wilayah.`act_grp` = 'ZN08'
																	  AND $wilayah.`aktivitas_code` = '$activity'");

		return $query->row_array();
	}
	function set_forcing_activity($data){
		$set = implode("', '", $data);
		$query = $this->db->query("INSERT INTO perlocation_pm_forcing
																VALUES
																  (
																    '$set'
																  );");

		return true;
	}
	function del_forcing_activity(){
		$query = $this->db->query("TRUNCATE perlocation_pm_forcing;");

		return true;
	}
	function set_forcing_3($data){
		$set = implode("', '", $data);
		$query = $this->db->query("INSERT INTO perlocation_pm_forcing_3
																VALUES
																  (
																    '$set'
																  );");

		return true;
	}
	function del_forcing_3(){
		$query = $this->db->query("TRUNCATE perlocation_pm_forcing_3;");

		return true;
	}
	function get_summary_forcing($w, $status, $jenis, $kelas, $tahun, $bulan, $umur, $activity){
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
																  perlocation_lokasi.`umur`,
																  perlocation_pm_forcing.`Forcing` AS akurasi_forcing,
																  perlocation_pm_forcing.`Cost` / perlocation_lokasi.`luas` AS Cost,
																  perlocation_pm_forcing.`Urea` / perlocation_lokasi.`luas` AS Urea,
																  perlocation_pm_forcing.`Borax` / perlocation_lokasi.`luas` AS Borax,
																  perlocation_pm_forcing.`Ethylene` / perlocation_lokasi.`luas` AS Ethylene,
																  perlocation_pm_forcing.`Ethepon` / perlocation_lokasi.`luas` AS Ethepon,
																  perlocation_pm_forcing.`Kaolin` / perlocation_lokasi.`luas` AS Kaolin
																FROM
																  perlocation_lokasi
																  INNER JOIN perlocation_pm_forcing
																    ON perlocation_lokasi.`lokasi` = perlocation_pm_forcing.`lokasi`
																    AND perlocation_pm_forcing.`activity` = '$activity'
    																AND perlocation_pm_forcing.`Cost` > 0
																  LEFT JOIN perlocation_pm_cost
																    ON perlocation_lokasi.`lokasi` = perlocation_pm_cost.`lokasi`
																WHERE $pg_wil
																  AND perlocation_lokasi.`keterangan` = 'Rencana'
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur
																ORDER BY Cost DESC
																LIMIT 20");

		return $query->result();
	}
	function get_summary_forcing_3($w, $status, $jenis, $kelas, $tahun, $bulan, $umur){
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
																  SUM(IF(perlocation_pm_forcing_3.`NSFC` = '1', 1, (NULL))) AS NSFC,
																  SUM(IF(perlocation_pm_forcing_3.`NSSC` = '1', 1, (NULL))) AS NSSC,
																  SUM(IF(perlocation_pm_forcing_3.`Others` = '1', 1, (NULL))) AS Others
																FROM
																  perlocation_lokasi
																  LEFT JOIN perlocation_pm_forcing_3
																    ON perlocation_lokasi.`lokasi` = perlocation_pm_forcing_3.`lokasi`
																WHERE $pg_wil
																  AND perlocation_lokasi.`keterangan` = 'Rencana'
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}

	function get_spray_weed($lokasi, $wilayah){
		$query = $this->db->query("SELECT
																  SUM(IF($wilayah.`aktivitas_code` = '1311131711' AND $wilayah.`jenis_data` = 'A', 1, (NULL))) AS Spray,
																  SUM(IF($wilayah.`aktivitas_code` = '1315131123' AND $wilayah.`jenis_data` = 'A', 1, (NULL))) AS Booster,
																  SUM(IF($wilayah.`aktivitas_code` = '1315111111' AND $wilayah.`jenis_data` = '1', $wilayah.`hasil_efektif`, (NULL))) AS Weed_Man,
																  SUM(IF($wilayah.`aktivitas_code` = '1315111111' AND $wilayah.`jenis_data` = '1', $wilayah.`biaya_realisasi`, (NULL))) AS Rp_Weed_Man
																FROM
																	$wilayah
																WHERE $wilayah.`lokasi` = '$lokasi'");

		return $query->row_array();
	}
	function set_spray_weed($data){
		$set = implode("', '", $data);
		$query = $this->db->query("INSERT INTO perlocation_pm_spray_weed
																VALUES
																  (
																    '$set'
																  );");

		return true;
	}
	function del_spray_weed(){
		$query = $this->db->query("TRUNCATE perlocation_pm_spray_weed;");

		return true;
	}
	function get_summary_spray($w, $status, $jenis, $kelas, $tahun, $bulan, $umur){
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
																  SUM(IF(perlocation_pm_spray_weed.`Spray` < 6, 1, (NULL))) AS S1,
																  SUM(IF(perlocation_pm_spray_weed.`Spray` >= 6 AND perlocation_pm_spray_weed.`Spray` < 9, 1, (NULL))) AS S2,
																  SUM(IF(perlocation_pm_spray_weed.`Spray` >= 9 AND perlocation_pm_spray_weed.`Spray` < 12, 1, (NULL))) AS S3,
																  SUM(IF(perlocation_pm_spray_weed.`Spray` >= 12, 1, (NULL))) AS S4
																FROM
																  perlocation_lokasi
																  LEFT JOIN perlocation_pm_spray_weed
																    ON perlocation_lokasi.`lokasi` = perlocation_pm_spray_weed.`lokasi`
																WHERE $pg_wil
																  AND perlocation_lokasi.`keterangan` = 'Rencana'
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}
	function get_summary_weed_man($w, $status, $jenis, $kelas, $tahun, $bulan, $umur){
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
																  SUM(IF((perlocation_pm_spray_weed.`Weed_Man` / perlocation_lokasi.`luas`) < 4, 1, (NULL))) AS W1,
																  SUM(IF((perlocation_pm_spray_weed.`Weed_Man` / perlocation_lokasi.`luas`) >= 4 AND (perlocation_pm_spray_weed.`Weed_Man` / perlocation_lokasi.`luas`) < 7, 1, (NULL))) AS W2,
																  SUM(IF((perlocation_pm_spray_weed.`Weed_Man` / perlocation_lokasi.`luas`) >= 7 AND (perlocation_pm_spray_weed.`Weed_Man` / perlocation_lokasi.`luas`) < 10, 1, (NULL))) AS W3,
																  SUM(IF((perlocation_pm_spray_weed.`Weed_Man` / perlocation_lokasi.`luas`) >= 10, 1, (NULL))) AS W4
																FROM
																  perlocation_lokasi
																  LEFT JOIN perlocation_pm_spray_weed
																    ON perlocation_lokasi.`lokasi` = perlocation_pm_spray_weed.`lokasi`
																WHERE $pg_wil
																  AND perlocation_lokasi.`keterangan` = 'Rencana'
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}
	function get_summary_avg_weed_man($w, $status, $jenis, $kelas, $tahun, $bulan, $umur){
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
																  AVG(perlocation_pm_spray_weed.`Weed_Man` / perlocation_lokasi.`luas`) AS Weed_Man,
																  AVG(perlocation_pm_spray_weed.`Rp_Weed_Man` / perlocation_pm_spray_weed.`Weed_Man`) AS Rp_Weed_Man
																FROM
																  perlocation_lokasi
																  LEFT JOIN perlocation_pm_spray_weed
																    ON perlocation_lokasi.`lokasi` = perlocation_pm_spray_weed.`lokasi`
																WHERE $pg_wil
																  AND perlocation_lokasi.`keterangan` = 'Rencana'
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}

	function get_pre_post_planting($lokasi, $wilayah){
		$query = $this->db->query("SELECT
																  MIN(IF($wilayah.`aktivitas_code` = '1315131111' AND $wilayah.`tgl_realisasi` < lokasi.`tgl_mulai_tanam`, TIMESTAMPDIFF(DAY, $wilayah.`tgl_realisasi`, lokasi.`tgl_mulai_tanam`), (NULL))) AS Pre,
																  MIN(IF($wilayah.`aktivitas_code` = '1315131113' AND $wilayah.`tgl_realisasi` > lokasi.`tgl_mulai_tanam`, TIMESTAMPDIFF(DAY, lokasi.`tgl_mulai_tanam`, $wilayah.`tgl_realisasi`), (NULL))) AS Post,
																  MIN(IF($wilayah.`aktivitas_code` = '1315131111' AND TIMESTAMPDIFF(DAY, $wilayah.`tgl_realisasi`, lokasi.`tgl_mulai_tanam`) >= 4 AND TIMESTAMPDIFF(DAY, $wilayah.`tgl_realisasi`, lokasi.`tgl_mulai_tanam`) <= 10 AND $wilayah.`tgl_realisasi` < lokasi.`tgl_mulai_tanam`, 1, (NULL))) AS Pre_Regulasi,
																  MIN(IF($wilayah.`aktivitas_code` = '1315131113' AND TIMESTAMPDIFF(DAY, lokasi.`tgl_mulai_tanam`, $wilayah.`tgl_realisasi`) >= 30 AND TIMESTAMPDIFF(DAY, lokasi.`tgl_mulai_tanam`, $wilayah.`tgl_realisasi`) <= 45 AND $wilayah.`tgl_realisasi` > lokasi.`tgl_mulai_tanam`, 1, (NULL))) AS Post_Regulasi
																FROM
																  $wilayah,
																  lokasi
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND lokasi.`lokasi` = $wilayah.`lokasi`
																  AND SUBSTRING(lokasi.`status`, 1, 4) = 'NSFC'");

		return $query->row_array();
	}
	function set_pre_post_planting($data){
		$set = implode("', '", $data);
		$query = $this->db->query("INSERT INTO perlocation_pm_pre_post_planting
																VALUES
																  (
																    '$set'
																  );");

		return true;
	}
	function del_pre_post_planting(){
		$query = $this->db->query("TRUNCATE perlocation_pm_pre_post_planting;");

		return true;
	}
	function get_summary_pre_post_planting($w, $status, $jenis, $kelas, $tahun, $bulan, $umur, $type){
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
																  MAX(perlocation_pm_pre_post_planting.`".$type."`) AS Max,
																  AVG(NULLIF(perlocation_pm_pre_post_planting.`".$type."`, 0)) AS Avg,
																  MIN(NULLIF(perlocation_pm_pre_post_planting.`".$type."`, 0)) AS Min,
																  SUM(IF(perlocation_pm_pre_post_planting.`".$type."_Regulasi` = '1', 1, (NULL))) AS R,
																  SUM(IF(perlocation_pm_pre_post_planting.`".$type."_Regulasi` = '0', 1, (NULL))) AS N
																FROM
																  perlocation_lokasi
																  LEFT JOIN perlocation_pm_pre_post_planting
																    ON perlocation_lokasi.`lokasi` = perlocation_pm_pre_post_planting.`lokasi`
																    AND perlocation_lokasi.`keterangan` = perlocation_pm_pre_post_planting.`keterangan`
																WHERE $pg_wil
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																	AND perlocation_lokasi.`keterangan` = 'Rencana'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}

	function get_insect($lokasi, $wilayah, $tgl_forcing){
		$query = $this->db->query("SELECT
																  MAX(IF($wilayah.`aktivitas_code` = '1313111113', TIMESTAMPDIFF(DAY, '$tgl_forcing', $wilayah.`tgl_realisasi`), (NULL))) AS Insect_1,
																  MAX(IF($wilayah.`aktivitas_code` = '1313111115', TIMESTAMPDIFF(DAY, '$tgl_forcing', $wilayah.`tgl_realisasi`), (NULL))) AS Insect_2,
																  MAX(IF($wilayah.`aktivitas_code` = '1313111138', TIMESTAMPDIFF(DAY, '$tgl_forcing', $wilayah.`tgl_realisasi`), (NULL))) AS Insect_3,
																  MAX(IF($wilayah.`aktivitas_code` = '1313111113' AND (TIMESTAMPDIFF(DAY, '$tgl_forcing', $wilayah.`tgl_realisasi`) >= 30 AND TIMESTAMPDIFF(DAY, '$tgl_forcing', $wilayah.`tgl_realisasi`) <= 50), 1, (NULL))) AS R_1,
																  MAX(IF($wilayah.`aktivitas_code` = '1313111115' AND (TIMESTAMPDIFF(DAY, '$tgl_forcing', $wilayah.`tgl_realisasi`) >= 45 AND TIMESTAMPDIFF(DAY, '$tgl_forcing', $wilayah.`tgl_realisasi`) <= 60), 1, (NULL))) AS R_2,
																  MAX(IF($wilayah.`aktivitas_code` = '1313111138' AND (TIMESTAMPDIFF(DAY, '$tgl_forcing', $wilayah.`tgl_realisasi`) >= 55 AND TIMESTAMPDIFF(DAY, '$tgl_forcing', $wilayah.`tgl_realisasi`) <= 60), 1, (NULL))) AS R_3
																FROM
																  $wilayah
																WHERE $wilayah.`lokasi` = '$lokasi'");

		return $query->row_array();
	}
	function set_insect($data){
		$set = implode("', '", $data);
		$query = $this->db->query("INSERT INTO perlocation_pm_insect
																VALUES
																  (
																    '$set'
																  );");

		return true;
	}
	function del_insect(){
		$query = $this->db->query("TRUNCATE perlocation_pm_insect;");

		return true;
	}
	function get_summary_insect($w, $status, $jenis, $kelas, $tahun, $bulan, $umur, $insect){
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
																  AVG(NULLIF(perlocation_pm_insect.`Insect_1`, 0)) AS Insect_1,
																  AVG(NULLIF(perlocation_pm_insect.`Insect_2`, 0)) AS Insect_2,
																  AVG(NULLIF(perlocation_pm_insect.`Insect_3`, 0)) AS Insect_3,
																  SUM(NULLIF(perlocation_pm_insect.`Regulasi_".$insect."`, 0)) AS Regulasi,
																  COUNT(perlocation_lokasi.`lokasi`) AS Total
																FROM
																  perlocation_lokasi
																  LEFT JOIN perlocation_pm_insect
																    ON perlocation_lokasi.`lokasi` = perlocation_pm_insect.`lokasi`
																WHERE $pg_wil
																  AND perlocation_lokasi.`keterangan` = 'Rencana'
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}

	function get_summary_material_saving($w, $status, $jenis, $kelas, $tahun, $bulan, $umur, $material){
		if(substr($w, 0, 2) == 'PG'){
			$pg_wil = "perlocation_lokasi.`pg` = '$w'";
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
																  SUM(IF((perlocation_pm_material_budget.`$material` - perlocation_pm_material_real.`$material`) / perlocation_lokasi.`luas` < 2000000, 1, (NULL))) AS MS1,
																  SUM(IF((perlocation_pm_material_budget.`$material` - perlocation_pm_material_real.`$material`) / perlocation_lokasi.`luas` >= 2000000 AND (perlocation_pm_material_budget.`$material` - perlocation_pm_material_real.`$material`) / perlocation_lokasi.`luas` < 5000000, 1, (NULL))) AS MS2,
																  SUM(IF((perlocation_pm_material_budget.`$material` - perlocation_pm_material_real.`$material`) / perlocation_lokasi.`luas` >= 5000000 AND (perlocation_pm_material_budget.`$material` - perlocation_pm_material_real.`$material`) / perlocation_lokasi.`luas` < 10000000, 1, (NULL))) AS MS3,
																  SUM(IF((perlocation_pm_material_budget.`$material` - perlocation_pm_material_real.`$material`) / perlocation_lokasi.`luas` > 10000000, 1, (NULL))) AS MS4,
																  COUNT(perlocation_lokasi.`lokasi`) AS Total
																FROM
																  perlocation_lokasi
																  LEFT JOIN perlocation_pm_material_real
																    ON perlocation_lokasi.`lokasi` = perlocation_pm_material_real.`lokasi`
																  LEFT JOIN perlocation_pm_material_budget
																    ON perlocation_lokasi.`lokasi` = perlocation_pm_material_budget.`lokasi`
																WHERE $pg_wil
																  AND perlocation_lokasi.`keterangan` = 'Rencana'
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}

	function get_summary_activity_saving($w, $status, $jenis, $kelas, $tahun, $bulan, $umur){
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
																  SUM(IF(((perlocation_pm_cost.`ZN13_r` + perlocation_pm_cost.`ZN13_f`) / perlocation_lokasi.`luas` - IF(perlocation_lokasi.`status` = 'NSFC', element_cost.`BPP_NSFC_ha`, element_cost.`BPP_NSSC_ha`)) < -4000000, 1, (NULL))) AS SS1,
																  SUM(IF(((perlocation_pm_cost.`ZN13_r` + perlocation_pm_cost.`ZN13_f`) / perlocation_lokasi.`luas` - IF(perlocation_lokasi.`status` = 'NSFC', element_cost.`BPP_NSFC_ha`, element_cost.`BPP_NSSC_ha`)) >= -4000000, IF(((perlocation_pm_cost.`ZN13_r` + perlocation_pm_cost.`ZN13_f`) / perlocation_lokasi.`luas` - IF(perlocation_lokasi.`status` = 'NSFC', element_cost.`BPP_NSFC_ha`, element_cost.`BPP_NSSC_ha`)) <= 0, 1, (NULL)), (NULL))) AS SS2,
																  SUM(IF(((perlocation_pm_cost.`ZN13_r` + perlocation_pm_cost.`ZN13_f`) / perlocation_lokasi.`luas` - IF(perlocation_lokasi.`status` = 'NSFC', element_cost.`BPP_NSFC_ha`, element_cost.`BPP_NSSC_ha`)) > 0, IF(((perlocation_pm_cost.`ZN13_r` + perlocation_pm_cost.`ZN13_f`) / perlocation_lokasi.`luas` - IF(perlocation_lokasi.`status` = 'NSFC', element_cost.`BPP_NSFC_ha`, element_cost.`BPP_NSSC_ha`)) <= 4000000, 1, (NULL)), (NULL))) AS SS3,
																  SUM(IF(((perlocation_pm_cost.`ZN13_r` + perlocation_pm_cost.`ZN13_f`) / perlocation_lokasi.`luas` - IF(perlocation_lokasi.`status` = 'NSFC', element_cost.`BPP_NSFC_ha`, element_cost.`BPP_NSSC_ha`)) > 4000000, 1, (NULL))) AS SS4,
																	COUNT(perlocation_lokasi.`lokasi`) AS Total
																FROM
																  element_cost,
																  perlocation_lokasi
																  LEFT JOIN perlocation_pm_cost
																    ON perlocation_lokasi.`lokasi` = perlocation_pm_cost.`lokasi`
																    AND perlocation_lokasi.`keterangan` = perlocation_pm_cost.`keterangan`
																WHERE $pg_wil
																  AND element_cost.`code` = 'ZN13'
																  AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}

	function get_sebaran_material($wilayah, $material, $pg){
		$query = $this->db->query("SELECT
																  $wilayah.*,
																  help_iklim_sebaran.`$pg` AS iklim
																FROM
																  $wilayah,
																  help_master_material,
																  help_iklim_sebaran
																WHERE $wilayah.`bahan_alat` = help_master_material.`code`
																  AND help_master_material.`material` = '$material'
																  AND DATE_FORMAT($wilayah.`tgl_realisasi`, '%Y%m') = help_iklim_sebaran.`code`");

		return $query->result();
	}
	function get_sebaran_material_panen($wilayah, $material, $pg, $tahun){
		$query = $this->db->query("SELECT
																  $wilayah.*,
																  help_iklim_sebaran.`$pg` AS iklim
																FROM
																  $wilayah,
																  help_master_material,
																  help_iklim_sebaran
																WHERE $wilayah.`bahan_alat` = help_master_material.`code`
																  AND help_master_material.`material` = '$material'
																  AND DATE_FORMAT($wilayah.`tgl_realisasi`, '%Y%m') = help_iklim_sebaran.`code`
																	AND SUBSTRING($wilayah.`bulan_panen`, 1, 4) = '$tahun'");

		return $query->result();
	}
	function set_sebaran_material($data){
		$set = implode("', '", $data);
		$query = $this->db->query("INSERT INTO perlocation_pm_sebaran_material
																VALUES
																  (
																    '$set'
																  );");

		return true;
	}
	function del_sebaran_material(){
		$query = $this->db->query("TRUNCATE perlocation_pm_sebaran_material;");

		return true;
	}

	function get_summary_sebaran_material($w, $status, $jenis, $kelas, $tahun, $bulan, $umur, $material){
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
															  SUM(perlocation_pm_sebaran_material.`resource`) AS resource,
															  perlocation_pm_sebaran_material.`activity_code`,
															  perlocation_pm_sebaran_material.`activity_desc`
															FROM
															  perlocation_lokasi
															  LEFT JOIN perlocation_pm_sebaran_material
															    ON perlocation_lokasi.`lokasi` = perlocation_pm_sebaran_material.`lokasi`
															    AND perlocation_pm_sebaran_material.`material` = '$material'
																	  AND perlocation_lokasi.`keterangan` = perlocation_pm_sebaran_material.`keterangan`
																WHERE $pg_wil
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur
																GROUP BY perlocation_pm_sebaran_material.`activity_code`
																ORDER BY resource DESC
																LIMIT 5");

		return $query->result();
	}

	function get_harvest_category_bulan($wilayah){
		$query = $this->db->query("SELECT
																  $wilayah.`lokasi`,
																  help_tonase_panen.`kode_aktifitas` AS activity_code,
																  help_tonase_panen.`jenis`,
																  help_tonase_panen.`category`,
																  SUM(IF(DATE_FORMAT($wilayah.`tgl_realisasi`, '%Y-%m') = DATE_FORMAT(konstanta.`nilai` - INTERVAL 5 MONTH, '%Y-%m'), $wilayah.`hasil_efektif`, (NULL))) AS P1,
																  SUM(IF(DATE_FORMAT($wilayah.`tgl_realisasi`, '%Y-%m') = DATE_FORMAT(konstanta.`nilai` - INTERVAL 4 MONTH, '%Y-%m'), $wilayah.`hasil_efektif`, (NULL))) AS P2,
																  SUM(IF(DATE_FORMAT($wilayah.`tgl_realisasi`, '%Y-%m') = DATE_FORMAT(konstanta.`nilai` - INTERVAL 3 MONTH, '%Y-%m'), $wilayah.`hasil_efektif`, (NULL))) AS P3,
																  SUM(IF(DATE_FORMAT($wilayah.`tgl_realisasi`, '%Y-%m') = DATE_FORMAT(konstanta.`nilai` - INTERVAL 2 MONTH, '%Y-%m'), $wilayah.`hasil_efektif`, (NULL))) AS P4,
																  SUM(IF(DATE_FORMAT($wilayah.`tgl_realisasi`, '%Y-%m') = DATE_FORMAT(konstanta.`nilai` - INTERVAL 1 MONTH, '%Y-%m'), $wilayah.`hasil_efektif`, (NULL))) AS P5,
																  SUM(IF(DATE_FORMAT($wilayah.`tgl_realisasi`, '%Y-%m') = DATE_FORMAT(konstanta.`nilai`, '%Y-%m'), $wilayah.`hasil_efektif`, (NULL))) AS P6
																FROM
																  $wilayah,
																  help_tonase_panen,
																  konstanta
																WHERE $wilayah.`aktivitas_code` = help_tonase_panen.`kode_aktifitas`
																  AND konstanta.`jenis` = 'YEAR_BASE'
																GROUP BY $wilayah.`lokasi`, $wilayah.`aktivitas_code`");

		return $query->result();
	}
	function get_harvest_category_bulan_panen($wilayah, $tahun){
		$query = $this->db->query("SELECT
																  $wilayah.`lokasi`,
																  help_tonase_panen.`kode_aktifitas` AS activity_code,
																  help_tonase_panen.`jenis`,
																  help_tonase_panen.`category`,
																  SUM(IF(DATE_FORMAT($wilayah.`tgl_realisasi`, '%Y-%m') = DATE_FORMAT(konstanta.`nilai` - INTERVAL 5 MONTH, '%Y-%m'), $wilayah.`hasil_efektif`, (NULL))) AS P1,
																  SUM(IF(DATE_FORMAT($wilayah.`tgl_realisasi`, '%Y-%m') = DATE_FORMAT(konstanta.`nilai` - INTERVAL 4 MONTH, '%Y-%m'), $wilayah.`hasil_efektif`, (NULL))) AS P2,
																  SUM(IF(DATE_FORMAT($wilayah.`tgl_realisasi`, '%Y-%m') = DATE_FORMAT(konstanta.`nilai` - INTERVAL 3 MONTH, '%Y-%m'), $wilayah.`hasil_efektif`, (NULL))) AS P3,
																  SUM(IF(DATE_FORMAT($wilayah.`tgl_realisasi`, '%Y-%m') = DATE_FORMAT(konstanta.`nilai` - INTERVAL 2 MONTH, '%Y-%m'), $wilayah.`hasil_efektif`, (NULL))) AS P4,
																  SUM(IF(DATE_FORMAT($wilayah.`tgl_realisasi`, '%Y-%m') = DATE_FORMAT(konstanta.`nilai` - INTERVAL 1 MONTH, '%Y-%m'), $wilayah.`hasil_efektif`, (NULL))) AS P5,
																  SUM(IF(DATE_FORMAT($wilayah.`tgl_realisasi`, '%Y-%m') = DATE_FORMAT(konstanta.`nilai`, '%Y-%m'), $wilayah.`hasil_efektif`, (NULL))) AS P6
																FROM
																  $wilayah,
																  help_tonase_panen,
																  konstanta
																WHERE $wilayah.`aktivitas_code` = help_tonase_panen.`kode_aktifitas`
																  AND konstanta.`jenis` = 'YEAR_BASE'
																	AND SUBSTRING($wilayah.`bulan_panen`, 1, 4) = '$tahun'
																GROUP BY $wilayah.`lokasi`, $wilayah.`aktivitas_code`");

		return $query->result();
	}
	function set_harvest_category_bulan($data){
		$set = implode("', '", $data);
		$query = $this->db->query("INSERT INTO perlocation_harvest_category_bulan
																VALUES
																  (
																    '$set'
																  );");

		return true;
	}
	function del_harvest_category_bulan(){
		$query = $this->db->query("TRUNCATE perlocation_harvest_category_bulan;");

		return true;
	}
	function get_summary_harvest_category_bulan($w, $status, $jenis, $kelas, $tahun, $bulan, $umur, $type, $category){
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
		if($type != 'Total'){
			$option_type = "AND perlocation_harvest_category_bulan.`jenis` = '$type'";
		}
		else{
			$option_type = "";
		}
		if($category != 'Total'){
			$option_category = "AND perlocation_harvest_category_bulan.`category` = '$category'";
		}
		else{
			$option_category = "";
		}
		$query = $this->db->query("SELECT
																  SUM(perlocation_harvest_category_bulan.`P1`) AS P1,
																  SUM(perlocation_harvest_category_bulan.`P2`) AS P2,
																  SUM(perlocation_harvest_category_bulan.`P3`) AS P3,
																  SUM(perlocation_harvest_category_bulan.`P4`) AS P4,
																  SUM(perlocation_harvest_category_bulan.`P5`) AS P5,
																  SUM(perlocation_harvest_category_bulan.`P6`) AS P6
																FROM
																  perlocation_lokasi
																  LEFT JOIN perlocation_harvest_category_bulan
																    ON perlocation_lokasi.`lokasi` = perlocation_harvest_category_bulan.`lokasi`
																    AND perlocation_lokasi.`keterangan` = perlocation_harvest_category_bulan.`keterangan`
																   $option_type
																   $option_category
																WHERE $pg_wil
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}

	function get_irrigation_priority($wilayah){
		if(substr($wilayah, 0, 1 ) == 'P'){
			$option_tahun = "AND SUBSTRING($wilayah.`bulan_panen`, 1, 4) = YEAR(konstanta.`nilai`)";
		}
		else{
			$option_tahun = "";
		}
		$query = $this->db->query("SELECT
																  $wilayah.`lokasi`,
																  DATE_FORMAT($wilayah.`tgl_realisasi`, '%Y-%m') AS tanggal,
																  SUM($wilayah.`hasil_efektif`) AS luas_siram,
  																lokasi.`luas` * 3 AS luas
																FROM
  																konstanta,
																  $wilayah
																  INNER JOIN lokasi
																     ON lokasi.`lokasi` = $wilayah.`lokasi`
																WHERE $wilayah.`aktivitas_code` = '1323151111'
																  AND $wilayah.`jenis_data` = '1'
																  AND konstanta.`jenis` = 'YEAR_BASE'
																  $option_tahun
																GROUP BY $wilayah.`aktivitas_code`, $wilayah.`lokasi`, DATE_FORMAT($wilayah.`tgl_realisasi`, '%Y-%m')");

		return $query->result();
	}
	function set_irrigation_priority($data){
		$set = implode("', '", $data);
		$query = $this->db->query("INSERT INTO perlocation_irrigation_priority
																VALUES
																  (
																    '$set'
																  );");

		return true;
	}
	function del_irrigation_priority(){
		$query = $this->db->query("TRUNCATE perlocation_irrigation_priority;");

		return true;
	}
	function get_summary_irrigation_priority($w, $status, $jenis, $kelas, $tahun, $bulan, $umur, $priority, $tahun_siram){
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
		switch ($priority) {
			case '1':
				$option_priority = "AND perlocation_lokasi.`status` = 'NSFC'
        										AND (TIMESTAMPDIFF(MONTH, perlocation_lokasi.`tgl_forcing`, CONCAT(perlocation_irrigation_priority.`tanggal`, '-01'))) BETWEEN 0 AND 5";
			break;
			case '2':
				$option_priority = "AND perlocation_lokasi.`status` = 'NSFC'
        										AND (TIMESTAMPDIFF(MONTH, perlocation_lokasi.`tgl_perawatan`, CONCAT(perlocation_irrigation_priority.`tanggal`, '-01'))) BETWEEN 0 AND 3";
			break;
			case '3':
				$option_priority = "AND ((perlocation_lokasi.`status` = 'NSFC'
  													AND (TIMESTAMPDIFF(MONTH, perlocation_lokasi.`tgl_forcing`, CONCAT(perlocation_irrigation_priority.`tanggal`, '-01'))) BETWEEN -3 AND 1)
														OR perlocation_lokasi.`status` = 'NSSC')";
			break;
			case '4':
				$option_priority = "AND perlocation_lokasi.`status` = 'NSFC'
														AND (TIMESTAMPDIFF(MONTH, perlocation_lokasi.`tgl_perawatan`, CONCAT(perlocation_irrigation_priority.`tanggal`, '-01'))) >= 4
														AND (TIMESTAMPDIFF(MONTH, perlocation_lokasi.`tgl_forcing`, CONCAT(perlocation_irrigation_priority.`tanggal`, '-01'))) <= -4 ";
			break;
			case '5':
				$option_priority = "AND perlocation_lokasi.`status` = 'NSSC'
														AND (TIMESTAMPDIFF(MONTH, perlocation_lokasi.`tgl_perawatan`, CONCAT(perlocation_irrigation_priority.`tanggal`, '-01'))) >= 0
														AND (TIMESTAMPDIFF(MONTH, perlocation_lokasi.`tgl_forcing`, CONCAT(perlocation_irrigation_priority.`tanggal`, '-01'))) <= -1";
			break;
		}
		$query = $this->db->query("SELECT
																  SUM(IF((perlocation_irrigation_priority.`luas_siram` / (3 * perlocation_lokasi.`luas`)) * 100 < 30, 1, (NULL))) AS SP1,
																  SUM(IF((perlocation_irrigation_priority.`luas_siram` / (3 * perlocation_lokasi.`luas`)) * 100 >= 30 AND (perlocation_irrigation_priority.`luas_siram` / (3 * perlocation_lokasi.`luas`)) * 100 < 50, 1, (NULL))) AS SP2,
																  SUM(IF((perlocation_irrigation_priority.`luas_siram` / (3 * perlocation_lokasi.`luas`)) * 100 >= 50 AND (perlocation_irrigation_priority.`luas_siram` / (3 * perlocation_lokasi.`luas`)) * 100 < 80, 1, (NULL))) AS SP3,
																  SUM(IF((perlocation_irrigation_priority.`luas_siram` / (3 * perlocation_lokasi.`luas`)) * 100 >= 80 AND (perlocation_irrigation_priority.`luas_siram` / (3 * perlocation_lokasi.`luas`)) * 100 < 100, 1, (NULL))) AS SP4,
																  SUM(IF((perlocation_irrigation_priority.`luas_siram` / (3 * perlocation_lokasi.`luas`)) * 100 >= 100 AND (perlocation_irrigation_priority.`luas_siram` / (3 * perlocation_lokasi.`luas`)) * 100 < 110, 1, (NULL))) AS SP5,
																  SUM(IF((perlocation_irrigation_priority.`luas_siram` / (3 * perlocation_lokasi.`luas`)) * 100 >= 110, 1, (NULL))) AS SP6,
  																COUNT(perlocation_irrigation_priority.`lokasi`) AS Total
																FROM
																  perlocation_lokasi
																  LEFT JOIN perlocation_irrigation_priority
																    ON perlocation_lokasi.`lokasi` = perlocation_irrigation_priority.`lokasi`
    																AND perlocation_lokasi.`keterangan` = perlocation_irrigation_priority.`keterangan`
																		AND SUBSTRING(perlocation_irrigation_priority.`tanggal`, 1, 4) = '$tahun_siram'
																WHERE $pg_wil
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur
																	$option_priority");

		return $query->row_array();
	}

	function get_summary_material_over($w, $status, $jenis, $kelas, $tahun, $bulan, $umur){
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
																  SUM(perlocation_pm_material_over.`Urea`) / SUM(1) AS Urea,
																  SUM(perlocation_pm_material_over.`Urease`) / SUM(1) AS Urease,
																  SUM(perlocation_pm_material_over.`Za`) / SUM(1) AS Za,
																  SUM(perlocation_pm_material_over.`K2SO4`) / SUM(1) AS K2SO4,
																  SUM(perlocation_pm_material_over.`KCL`) / SUM(1) AS KCL,
																  SUM(perlocation_pm_material_over.`TSP`) / SUM(1) AS TSP,
																  SUM(perlocation_pm_material_over.`DAP`) / SUM(1) AS DAP,
																  SUM(perlocation_pm_material_over.`MgSO4`) / SUM(1) AS MgSO4,
																  SUM(perlocation_pm_material_over.`Kieserite`) / SUM(1) AS Kieserite,
																  SUM(perlocation_pm_material_over.`FeSO4`) / SUM(1) AS FeSO4,

																  SUM(perlocation_pm_material_over.`ZnSO4`) / SUM(1) AS ZnSO4,
																  SUM(perlocation_pm_material_over.`Dolomite`) / SUM(1) AS Dolomite,
																  SUM(perlocation_pm_material_over.`Gypsum`) / SUM(1) AS Gypsum,
																  SUM(perlocation_pm_material_over.`CuSO4`) / SUM(1) AS CuSO4,
																  SUM(perlocation_pm_material_over.`Borax`) / SUM(1) AS Borax,
																  SUM(perlocation_pm_material_over.`LOB`) / SUM(1) AS LOB,
																  SUM(perlocation_pm_material_over.`CaCl2`) / SUM(1) AS CaCl2,
																  SUM(perlocation_pm_material_over.`Calcibor`) / SUM(1) AS Calcibor,
																  SUM(perlocation_pm_material_over.`Kompos`) / SUM(1) AS Kompos,
																  SUM(perlocation_pm_material_over.`Belerang`) / SUM(1) AS Belerang,

																  SUM(perlocation_pm_material_over.`Kieserite_G`) / SUM(1) AS Kieserite_G,
																  SUM(perlocation_pm_material_over.`NPK`) / SUM(1) AS NPK,
																  SUM(perlocation_pm_material_over.`Petro_Cas`) / SUM(1) AS Petro_Cas,
																  SUM(perlocation_pm_material_over.`Fosetil`) / SUM(1) AS Fosetil,
																  SUM(perlocation_pm_material_over.`Metalaxil`) / SUM(1) AS Metalaxil,
																  SUM(perlocation_pm_material_over.`Propiconazole`) / SUM(1) AS Propiconazole,
																  SUM(perlocation_pm_material_over.`Prochloraz`) / SUM(1) AS Prochloraz,
																  SUM(perlocation_pm_material_over.`Mankozeb`) / SUM(1) AS Mankozeb,
																  SUM(perlocation_pm_material_over.`Folirfos`) / SUM(1) AS Folirfos,
																  SUM(perlocation_pm_material_over.`H3PO3`) / SUM(1) AS H3PO3,

																  SUM(perlocation_pm_material_over.`Detazeb`) / SUM(1) AS Detazeb,
																  SUM(perlocation_pm_material_over.`Bromacyl`) / SUM(1) AS Bromacyl,
																  SUM(perlocation_pm_material_over.`Diuron`) / SUM(1) AS Diuron,
																  SUM(perlocation_pm_material_over.`Glyphosate`) / SUM(1) AS Glyphosate,
																  SUM(perlocation_pm_material_over.`Quizalofop`) / SUM(1) AS Quizalofop,
																  SUM(perlocation_pm_material_over.`Ametrine`) / SUM(1) AS Ametrine,
																  SUM(perlocation_pm_material_over.`Bazza`) / SUM(1) AS Bazza,
																  SUM(perlocation_pm_material_over.`Tekasi`) / SUM(1) AS Tekasi,
																  SUM(perlocation_pm_material_over.`Tekila`) / SUM(1) AS Tekila,
																  SUM(perlocation_pm_material_over.`Chlorpyrifos`) / SUM(1) AS Chlorpyrifos,

																  SUM(perlocation_pm_material_over.`Sidazinon`) / SUM(1) AS Sidazinon,
																  SUM(perlocation_pm_material_over.`Propoxur`) / SUM(1) AS Propoxur,
																  SUM(perlocation_pm_material_over.`Cypermethrin`) / SUM(1) AS Cypermethrin,
																  SUM(perlocation_pm_material_over.`Bifentrin_EC`) / SUM(1) AS Bifentrin_EC,
																  SUM(perlocation_pm_material_over.`Bifentrin_G`) / SUM(1) AS Bifentrin_G,
																  SUM(perlocation_pm_material_over.`BPMC`) / SUM(1) AS BPMC,
																  SUM(perlocation_pm_material_over.`Clorpyrifos`) / SUM(1) AS Clorpyrifos,
																  SUM(perlocation_pm_material_over.`Abamectin`) / SUM(1) AS Abamectin,
																  SUM(perlocation_pm_material_over.`Sanisol`) / SUM(1) AS Sanisol,
																  SUM(perlocation_pm_material_over.`Ethylene`) / SUM(1) AS Ethylene,

																  SUM(perlocation_pm_material_over.`Ethepon`) / SUM(1) AS Ethepon,
																  SUM(perlocation_pm_material_over.`Kaolin`) / SUM(1) AS Kaolin,
																  SUM(perlocation_pm_material_over.`Zeolit`) / SUM(1) AS Zeolit,
																  SUM(perlocation_pm_material_over.`Rabas`) / SUM(1) AS Rabas,
																  SUM(perlocation_pm_material_over.`Ratgone`) / SUM(1) AS Ratgone,
																  SUM(perlocation_pm_material_over.`Indostick`) / SUM(1) AS Indostick,
																  SUM(perlocation_pm_material_over.`Organosilicon`) / SUM(1) AS Organosilicon,
																  SUM(perlocation_pm_material_over.`Soda_Ash`) / SUM(1) AS Soda_Ash,
																  SUM(perlocation_pm_material_over.`Sarineb`) / SUM(1) AS Sarineb,
																  SUM(perlocation_pm_material_over.`Sorento`) / SUM(1) AS Sorento,

																  SUM(perlocation_pm_material_over.`NPK_Haracoat`) / SUM(1) AS NPK_Haracoat,
																  SUM(perlocation_pm_material_over.`Oksifluorfen`) / SUM(1) AS Oksifluorfen
																FROM
																  perlocation_lokasi
																  INNER JOIN perlocation_pm_material_over
																    ON perlocation_lokasi.`lokasi` = perlocation_pm_material_over.`lokasi`
																WHERE $pg_wil
																  AND perlocation_lokasi.`keterangan` = 'Rencana'
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}
	function get_activity_perlocation_over($w, $status, $jenis, $kelas, $tahun, $bulan, $umur, $ec){
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
		switch ($ec) {
			case 'ZN01':
				$resource = "perlocation_activity_zn01_over";
				$dataset = "SUM(perlocation_activity_zn01_over.`1113111315`) AS A1113111315,
									  SUM(perlocation_activity_zn01_over.`1113111511`) AS A1113111511,
									  SUM(perlocation_activity_zn01_over.`1113131311`) AS A1113131311,
									  SUM(perlocation_activity_zn01_over.`1113131117`) AS A1113131117,
									  SUM(perlocation_activity_zn01_over.`1113131111`) AS A1113131111,
									  SUM(perlocation_activity_zn01_over.`1113131113`) AS A1113131113,
									  SUM(perlocation_activity_zn01_over.`1113131315`) AS A1113131315,
									  SUM(perlocation_activity_zn01_over.`1113171112`) AS A1113171112,
									  SUM(perlocation_activity_zn01_over.`1113171313`) AS A1113171313,
									  SUM(perlocation_activity_zn01_over.`1113131313`) AS A1113131313,
									  SUM(perlocation_activity_zn01_over.`1113171111`) AS A1113171111,
									  SUM(perlocation_activity_zn01_over.`1113211111`) AS A1113211111,
									  SUM(perlocation_activity_zn01_over.`1113131511`) AS A1113131511,
									  SUM(perlocation_activity_zn01_over.`1113211115`) AS A1113211115,
									  SUM(perlocation_activity_zn01_over.`1113231711`) AS A1113231711,
									  SUM(perlocation_activity_zn01_over.`1113111512`) AS A1113111512,
									  SUM(perlocation_activity_zn01_over.`1113231713`) AS A1113231713,
									  SUM(perlocation_activity_zn01_over.`1113153111`) AS A1113153111,
									  SUM(perlocation_activity_zn01_over.`6111111719`) AS A6111111719,
									  SUM(perlocation_activity_zn01_over.`1113131115`) AS A1113131115,
									  SUM(perlocation_activity_zn01_over.`6111111115`) AS A6111111115,
									  SUM(perlocation_activity_zn01_over.`1113131119`) AS A1113131119,
									  SUM(perlocation_activity_zn01_over.`1113171113`) AS A1113171113,
									  SUM(perlocation_activity_zn01_over.`6111111713`) AS A6111111713,
									  SUM(perlocation_activity_zn01_over.`1113171317`) AS A1113171317,
									  SUM(perlocation_activity_zn01_over.`6111111125`) AS A6111111125,
									  SUM(perlocation_activity_zn01_over.`1113171115`) AS A1113171115,
									  SUM(perlocation_activity_zn01_over.`6111131315`) AS A6111131315,
									  SUM(perlocation_activity_zn01_over.`1113111313`) AS A1113111313";
			break;
			case 'ZN02':
				$resource = "perlocation_activity_zn02_over";
				$dataset = "SUM(perlocation_activity_zn02_over.`1115111111`) AS A1115111111,
										SUM(perlocation_activity_zn02_over.`1115151313`) AS A1115151313,
										SUM(perlocation_activity_zn02_over.`1115231113`) AS A1115231113";
			break;
			case 'ZN03':
				$resource = "perlocation_activity_zn03_over";
				$dataset = "SUM(perlocation_activity_zn03_over.`1117151115`) AS A1117151115,
										SUM(perlocation_activity_zn03_over.`1117151317`) AS A1117151317,
										SUM(perlocation_activity_zn03_over.`1117211315`) AS A1117211315,
										SUM(perlocation_activity_zn03_over.`1117231315`) AS A1117231315,
										SUM(perlocation_activity_zn03_over.`1117271111`) AS A1117271111,
										SUM(perlocation_activity_zn03_over.`1117151311`) AS A1117151311,
										SUM(perlocation_activity_zn03_over.`1117231717`) AS A1117231717,
										SUM(perlocation_activity_zn03_over.`1117151113`) AS A1117151113,
										SUM(perlocation_activity_zn03_over.`1117271311`) AS A1117271311,
										SUM(perlocation_activity_zn03_over.`1117271913`) AS A1117271913,
										SUM(perlocation_activity_zn03_over.`1117211117`) AS A1117211117,
										SUM(perlocation_activity_zn03_over.`1117231117`) AS A1117231117,
										SUM(perlocation_activity_zn03_over.`1117151117`) AS A1117151117,
										SUM(perlocation_activity_zn03_over.`1117211317`) AS A1117211317,
										SUM(perlocation_activity_zn03_over.`1117231317`) AS A1117231317,
										SUM(perlocation_activity_zn03_over.`1115191119`) AS A1115191119,
										SUM(perlocation_activity_zn03_over.`1117211313`) AS A1117211313,
										SUM(perlocation_activity_zn03_over.`1117231313`) AS A1117231313,
										SUM(perlocation_activity_zn03_over.`1115191113`) AS A1115191113,
										SUM(perlocation_activity_zn03_over.`1115191317`) AS A1115191317,
										SUM(perlocation_activity_zn03_over.`1117211717`) AS A1117211717,
										SUM(perlocation_activity_zn03_over.`1115171311`) AS A1115171311,
										SUM(perlocation_activity_zn03_over.`1115151115`) AS A1115151115,
										SUM(perlocation_activity_zn03_over.`1117131111`) AS A1117131111,
										SUM(perlocation_activity_zn03_over.`1117131113`) AS A1117131113,
										SUM(perlocation_activity_zn03_over.`1117171111`) AS A1117171111,
										SUM(perlocation_activity_zn03_over.`1117211715`) AS A1117211715,
										SUM(perlocation_activity_zn03_over.`1117231715`) AS A1117231715,
										SUM(perlocation_activity_zn03_over.`6111211131`) AS A6111211131,
										SUM(perlocation_activity_zn03_over.`1117211115`) AS A1117211115,
										SUM(perlocation_activity_zn03_over.`1117231115`) AS A1117231115,
										SUM(perlocation_activity_zn03_over.`1117271917`) AS A1117271917";
			break;
			case 'ZN04':
				$resource = "perlocation_activity_zn04_over";
				$dataset = "SUM(perlocation_activity_zn04_over.`6111151360`) AS A6111151360,
										SUM(perlocation_activity_zn04_over.`1317111119`) AS A1317111119,
										SUM(perlocation_activity_zn04_over.`1113171315`) AS A1113171315,
										SUM(perlocation_activity_zn04_over.`6111151313`) AS A6111151313,
										SUM(perlocation_activity_zn04_over.`1317111113`) AS A1317111113,
										SUM(perlocation_activity_zn04_over.`1317111111`) AS A1317111111,
										SUM(perlocation_activity_zn04_over.`6111171141`) AS A6111171141,
										SUM(perlocation_activity_zn04_over.`6111171133`) AS A6111171133,
										SUM(perlocation_activity_zn04_over.`6111151361`) AS A6111151361,
										SUM(perlocation_activity_zn04_over.`6111151319`) AS A6111151319,
										SUM(perlocation_activity_zn04_over.`6111151317`) AS A6111151317,
										SUM(perlocation_activity_zn04_over.`6111191117`) AS A6111191117,
										SUM(perlocation_activity_zn04_over.`6111171131`) AS A6111171131,
										SUM(perlocation_activity_zn04_over.`5111211112`) AS A5111211112,
										SUM(perlocation_activity_zn04_over.`1113231111`) AS A1113231111,
										SUM(perlocation_activity_zn04_over.`6111171145`) AS A6111171145,
										SUM(perlocation_activity_zn04_over.`6111151363`) AS A6111151363,
										SUM(perlocation_activity_zn04_over.`1317111311`) AS A1317111311,
										SUM(perlocation_activity_zn04_over.`6111151359`) AS A6111151359,
										SUM(perlocation_activity_zn04_over.`6111151315`) AS A6111151315,
										SUM(perlocation_activity_zn04_over.`6111171311`) AS A6111171311,
										SUM(perlocation_activity_zn04_over.`6111171123`) AS A6111171123,
										SUM(perlocation_activity_zn04_over.`6111171137`) AS A6111171137,
										SUM(perlocation_activity_zn04_over.`1113171311`) AS A1113171311,
										SUM(perlocation_activity_zn04_over.`6111191119`) AS A6111191119,
										SUM(perlocation_activity_zn04_over.`6111151113`) AS A6111151113,
										SUM(perlocation_activity_zn04_over.`6111171119`) AS A6111171119,
										SUM(perlocation_activity_zn04_over.`1317111115`) AS A1317111115,
										SUM(perlocation_activity_zn04_over.`6111151339`) AS A6111151339,
										SUM(perlocation_activity_zn04_over.`6111191115`) AS A6111191115,
										SUM(perlocation_activity_zn04_over.`6111171125`) AS A6111171125,
										SUM(perlocation_activity_zn04_over.`1317111331`) AS A1317111331,
										SUM(perlocation_activity_zn04_over.`6111171111`) AS A6111171111,
										SUM(perlocation_activity_zn04_over.`6111171157`) AS A6111171157,
										SUM(perlocation_activity_zn04_over.`6111151347`) AS A6111151347,
										SUM(perlocation_activity_zn04_over.`6111151337`) AS A6111151337,
										SUM(perlocation_activity_zn04_over.`6111171153`) AS A6111171153,
										SUM(perlocation_activity_zn04_over.`6111171113`) AS A6111171113,
										SUM(perlocation_activity_zn04_over.`6111171129`) AS A6111171129,
										SUM(perlocation_activity_zn04_over.`6111211527`) AS A6111211527,
										SUM(perlocation_activity_zn04_over.`6111171313`) AS A6111171313,
										SUM(perlocation_activity_zn04_over.`6111151331`) AS A6111151331,
										SUM(perlocation_activity_zn04_over.`6111151365`) AS A6111151365,
										SUM(perlocation_activity_zn04_over.`6111151321`) AS A6111151321,
										SUM(perlocation_activity_zn04_over.`6111171115`) AS A6111171115,
										SUM(perlocation_activity_zn04_over.`6111151345`) AS A6111151345,
										SUM(perlocation_activity_zn04_over.`1113231113`) AS A1113231113";
			break;
			case 'ZN05':
				$resource = "perlocation_activity_zn05_over";
				$dataset = "SUM(perlocation_activity_zn05_over.`1311111111`) AS A1311111111,
										SUM(perlocation_activity_zn05_over.`1311131712`) AS A1311131712,
										SUM(perlocation_activity_zn05_over.`1311131711`) AS A1311131711,
										SUM(perlocation_activity_zn05_over.`1311111115`) AS A1311111115,
										SUM(perlocation_activity_zn05_over.`1311131715`) AS A1311131715,
										SUM(perlocation_activity_zn05_over.`1311111319`) AS A1311111319,
										SUM(perlocation_activity_zn05_over.`1311131115`) AS A1311131115,
										SUM(perlocation_activity_zn05_over.`1113151744`) AS A1113151744,
										SUM(perlocation_activity_zn05_over.`1311131311`) AS A1311131311,
										SUM(perlocation_activity_zn05_over.`1113151722`) AS A1113151722,
										SUM(perlocation_activity_zn05_over.`1113151731`) AS A1113151731,
										SUM(perlocation_activity_zn05_over.`1113151721`) AS A1113151721,
										SUM(perlocation_activity_zn05_over.`1311131113`) AS A1311131113,
										SUM(perlocation_activity_zn05_over.`1113151717`) AS A1113151717,
										SUM(perlocation_activity_zn05_over.`1311131111`) AS A1311131111,
										SUM(perlocation_activity_zn05_over.`1113151725`) AS A1113151725,
										SUM(perlocation_activity_zn05_over.`1311131117`) AS A1311131117,
										SUM(perlocation_activity_zn05_over.`1311131511`) AS A1311131511,
										SUM(perlocation_activity_zn05_over.`1311111311`) AS A1311111311,
										SUM(perlocation_activity_zn05_over.`1311111313`) AS A1311111313,
										SUM(perlocation_activity_zn05_over.`1311111113`) AS A1311111113,
										SUM(perlocation_activity_zn05_over.`1311131123`) AS A1311131123,
										SUM(perlocation_activity_zn05_over.`1113151723`) AS A1113151723,
										SUM(perlocation_activity_zn05_over.`1113151733`) AS A1113151733,
										SUM(perlocation_activity_zn05_over.`1311131119`) AS A1311131119";
			break;
			case 'ZN06':
				$resource = "perlocation_activity_zn06_over";
				$dataset = "SUM(perlocation_activity_zn06_over.`1315131113`) AS A1315131113,
										SUM(perlocation_activity_zn06_over.`1315111111`) AS A1315111111,
										SUM(perlocation_activity_zn06_over.`1315131315`) AS A1315131315,
										SUM(perlocation_activity_zn06_over.`1315131123`) AS A1315131123,
										SUM(perlocation_activity_zn06_over.`1113111113`) AS A1113111113,
										SUM(perlocation_activity_zn06_over.`1315131111`) AS A1315131111,
										SUM(perlocation_activity_zn06_over.`1315131319`) AS A1315131319,
										SUM(perlocation_activity_zn06_over.`1315111511`) AS A1315111511,
										SUM(perlocation_activity_zn06_over.`1315131513`) AS A1315131513,
										SUM(perlocation_activity_zn06_over.`1315131517`) AS A1315131517,
										SUM(perlocation_activity_zn06_over.`1315131317`) AS A1315131317,
										SUM(perlocation_activity_zn06_over.`1315131130`) AS A1315131130,
										SUM(perlocation_activity_zn06_over.`1315131127`) AS A1315131127,
										SUM(perlocation_activity_zn06_over.`1315131117`) AS A1315131117,
										SUM(perlocation_activity_zn06_over.`1315111711`) AS A1315111711,
										SUM(perlocation_activity_zn06_over.`1315111113`) AS A1315111113,
										SUM(perlocation_activity_zn06_over.`1113111112`) AS A1113111112,
										SUM(perlocation_activity_zn06_over.`1315131519`) AS A1315131519,
										SUM(perlocation_activity_zn06_over.`1315131511`) AS A1315131511,
										SUM(perlocation_activity_zn06_over.`1315131121`) AS A1315131121,
										SUM(perlocation_activity_zn06_over.`1315131126`) AS A1315131126,
										SUM(perlocation_activity_zn06_over.`1113111114`) AS A1113111114,
										SUM(perlocation_activity_zn06_over.`1315131112`) AS A1315131112,
										SUM(perlocation_activity_zn06_over.`1315131114`) AS A1315131114,
										SUM(perlocation_activity_zn06_over.`1315131124`) AS A1315131124,
										SUM(perlocation_activity_zn06_over.`1315131119`) AS A1315131119,
										SUM(perlocation_activity_zn06_over.`1315111201`) AS A1315111201,
										SUM(perlocation_activity_zn06_over.`1115271116`) AS A1115271116,
										SUM(perlocation_activity_zn06_over.`1315111112`) AS A1315111112";
			break;
			case 'ZN07':
				$resource = "perlocation_activity_zn07_over";
				$dataset = "SUM(perlocation_activity_zn07_over.`1313111113`) AS A1313111113,
										SUM(perlocation_activity_zn07_over.`1313111115`) AS A1313111115,
										SUM(perlocation_activity_zn07_over.`1313111527`) AS A1313111527,
										SUM(perlocation_activity_zn07_over.`1313111525`) AS A1313111525,
										SUM(perlocation_activity_zn07_over.`1313111142`) AS A1313111142,
										SUM(perlocation_activity_zn07_over.`1313151111`) AS A1313151111,
										SUM(perlocation_activity_zn07_over.`1313151517`) AS A1313151517,
										SUM(perlocation_activity_zn07_over.`1313111511`) AS A1313111511,
										SUM(perlocation_activity_zn07_over.`1313131111`) AS A1313131111,
										SUM(perlocation_activity_zn07_over.`1313111513`) AS A1313111513,
										SUM(perlocation_activity_zn07_over.`1313111517`) AS A1313111517,
										SUM(perlocation_activity_zn07_over.`1313151513`) AS A1313151513,
										SUM(perlocation_activity_zn07_over.`1313111311`) AS A1313111311,
										SUM(perlocation_activity_zn07_over.`1113151745`) AS A1113151745,
										SUM(perlocation_activity_zn07_over.`1313111143`) AS A1313111143,
										SUM(perlocation_activity_zn07_over.`1313111118`) AS A1313111118,
										SUM(perlocation_activity_zn07_over.`1313111111`) AS A1313111111";
			break;
			case 'ZN08':
				$resource = "perlocation_activity_zn08_over";
				$dataset = "SUM(perlocation_activity_zn08_over.`1321111111`) AS A1321111111,
									  SUM(perlocation_activity_zn08_over.`1321111112`) AS A1321111112,
									  SUM(perlocation_activity_zn08_over.`1321111311`) AS A1321111311,
									  SUM(perlocation_activity_zn08_over.`1321111113`) AS A1321111113,
									  SUM(perlocation_activity_zn08_over.`1321111312`) AS A1321111312,
									  SUM(perlocation_activity_zn08_over.`1321111315`) AS A1321111315,
									  SUM(perlocation_activity_zn08_over.`1321111511`) AS A1321111511,
									  SUM(perlocation_activity_zn08_over.`1321111512`) AS A1321111512,
									  SUM(perlocation_activity_zn08_over.`1321111313`) AS A1321111313,
									  SUM(perlocation_activity_zn08_over.`1321131311`) AS A1321131311,
									  SUM(perlocation_activity_zn08_over.`1321131315`) AS A1321131315,
									  SUM(perlocation_activity_zn08_over.`1321111515`) AS A1321111515,
									  SUM(perlocation_activity_zn08_over.`1321131115`) AS A1321131115";
			break;
			case 'ZN09':
				$resource = "perlocation_activity_zn09_over";
				$dataset = "SUM(perlocation_activity_zn09_over.`1325111116`) AS A1325111116,
										SUM(perlocation_activity_zn09_over.`1325111111`) AS A1325111111,
										SUM(perlocation_activity_zn09_over.`1325111112`) AS A1325111112,
										SUM(perlocation_activity_zn09_over.`1325111115`) AS A1325111115";
			break;
			case 'ZN10':
				$resource = "perlocation_activity_zn10_over";
				$dataset = "SUM(perlocation_activity_zn10_over.`1511111519`) AS A1511111519,
										SUM(perlocation_activity_zn10_over.`1511151317`) AS A1511151317,
										SUM(perlocation_activity_zn10_over.`1511151315`) AS A1511151315,
										SUM(perlocation_activity_zn10_over.`1511151112`) AS A1511151112,
										SUM(perlocation_activity_zn10_over.`1511111521`) AS A1511111521,
										SUM(perlocation_activity_zn10_over.`1511151321`) AS A1511151321,
										SUM(perlocation_activity_zn10_over.`1511111515`) AS A1511111515,
										SUM(perlocation_activity_zn10_over.`1511111111`) AS A1511111111,
										SUM(perlocation_activity_zn10_over.`1511111119`) AS A1511111119";
			break;
			case 'ZN11':
				$resource = "perlocation_activity_zn11_over";
				$dataset = "SUM(perlocation_activity_zn11_over.`1321512111`) AS A1321512111,
										SUM(perlocation_activity_zn11_over.`1113511312`) AS A1113511312,
										SUM(perlocation_activity_zn11_over.`1319512111`) AS A1319512111,
										SUM(perlocation_activity_zn11_over.`1113511511`) AS A1113511511,
										SUM(perlocation_activity_zn11_over.`1113511713`) AS A1113511713,
										SUM(perlocation_activity_zn11_over.`1311511117`) AS A1311511117,
										SUM(perlocation_activity_zn11_over.`1113512111`) AS A1113512111,
										SUM(perlocation_activity_zn11_over.`1117511311`) AS A1117511311,
										SUM(perlocation_activity_zn11_over.`1117511315`) AS A1117511315,
										SUM(perlocation_activity_zn11_over.`1117511711`) AS A1117511711,
										SUM(perlocation_activity_zn11_over.`1319511311`) AS A1319511311,
										SUM(perlocation_activity_zn11_over.`1311511113`) AS A1311511113,
										SUM(perlocation_activity_zn11_over.`1113511311`) AS A1113511311,
										SUM(perlocation_activity_zn11_over.`1113511513`) AS A1113511513,
										SUM(perlocation_activity_zn11_over.`1315511511`) AS A1315511511,
										SUM(perlocation_activity_zn11_over.`1511511111`) AS A1511511111,
										SUM(perlocation_activity_zn11_over.`1113512511`) AS A1113512511,
										SUM(perlocation_activity_zn11_over.`1311511111`) AS A1311511111,
										SUM(perlocation_activity_zn11_over.`1313511311`) AS A1313511311,
										SUM(perlocation_activity_zn11_over.`1113511911`) AS A1113511911,
										SUM(perlocation_activity_zn11_over.`1319511111`) AS A1319511111,
										SUM(perlocation_activity_zn11_over.`1311511119`) AS A1311511119,
										SUM(perlocation_activity_zn11_over.`1313511313`) AS A1313511313,
										SUM(perlocation_activity_zn11_over.`1511511113`) AS A1511511113,
										SUM(perlocation_activity_zn11_over.`1117511313`) AS A1117511313,
										SUM(perlocation_activity_zn11_over.`1511511115`) AS A1511511115,
										SUM(perlocation_activity_zn11_over.`1319512122`) AS A1319512122,
										SUM(perlocation_activity_zn11_over.`1115511311`) AS A1115511311";
			break;
			case 'ZN12':
				$resource = "perlocation_activity_zn12_over";
				$dataset = "SUM(perlocation_activity_zn12_over.`1319111311`) AS A1319111311,
										SUM(perlocation_activity_zn12_over.`1319171111`) AS A1319171111,
										SUM(perlocation_activity_zn12_over.`1319111514`) AS A1319111514,
										SUM(perlocation_activity_zn12_over.`1319111516`) AS A1319111516,
										SUM(perlocation_activity_zn12_over.`1319111518`) AS A1319111518,
										SUM(perlocation_activity_zn12_over.`1319111519`) AS A1319111519,
										SUM(perlocation_activity_zn12_over.`1319151311`) AS A1319151311";
			break;
			case 'ZN13':
				$resource = "perlocation_activity_zn13_over";
				$dataset = "SUM(perlocation_activity_zn13_over.`1323111125`) AS A1323111125,
										SUM(perlocation_activity_zn13_over.`1323151111`) AS A1323151111,
										SUM(perlocation_activity_zn13_over.`1323111117`) AS A1323111117,
										SUM(perlocation_activity_zn13_over.`1323111127`) AS A1323111127,
										SUM(perlocation_activity_zn13_over.`1323171113`) AS A1323171113,
										SUM(perlocation_activity_zn13_over.`1323151317`) AS A1323151317,
										SUM(perlocation_activity_zn13_over.`1323131317`) AS A1323131317,
										SUM(perlocation_activity_zn13_over.`1323131315`) AS A1323131315,
										SUM(perlocation_activity_zn13_over.`1323111113`) AS A1323111113,
										SUM(perlocation_activity_zn13_over.`1323171111`) AS A1323171111,
										SUM(perlocation_activity_zn13_over.`1323131319`) AS A1323131319,
										SUM(perlocation_activity_zn13_over.`1323151112`) AS A1323151112,
										SUM(perlocation_activity_zn13_over.`1323151313`) AS A1323151313";
			break;
			case 'ZN14':
				$resource = "perlocation_activity_zn14_over";
				$dataset = "SUM(perlocation_activity_zn14_over.`1911132311`) AS A1911132311,
										SUM(perlocation_activity_zn14_over.`1911132111`) AS A1911132111,
										SUM(perlocation_activity_zn14_over.`1911211511`) AS A1911211511,
										SUM(perlocation_activity_zn14_over.`1911111111`) AS A1911111111,
										SUM(perlocation_activity_zn14_over.`1911111311`) AS A1911111311,
										SUM(perlocation_activity_zn14_over.`1911211111`) AS A1911211111,
										SUM(perlocation_activity_zn14_over.`6111211531`) AS A6111211531,
										SUM(perlocation_activity_zn14_over.`1911211311`) AS A1911211311,
										SUM(perlocation_activity_zn14_over.`6111211529`) AS A6111211529,
										SUM(perlocation_activity_zn14_over.`1911111511`) AS A1911111511";
			break;
			case 'ZN15':
				$resource = "perlocation_activity_zn15_over";
				$dataset = "SUM(perlocation_activity_zn15_over.`6111211133`) AS A6111211133,
										SUM(perlocation_activity_zn15_over.`6111211141`) AS A6111211141,
										SUM(perlocation_activity_zn15_over.`6111211125`) AS A6111211125,
										SUM(perlocation_activity_zn15_over.`6111211539`) AS A6111211539,
										SUM(perlocation_activity_zn15_over.`6111211525`) AS A6111211525,
										SUM(perlocation_activity_zn15_over.`6111211129`) AS A6111211129,
										SUM(perlocation_activity_zn15_over.`6111211311`) AS A6111211311,
										SUM(perlocation_activity_zn15_over.`6111211139`) AS A6111211139,
										SUM(perlocation_activity_zn15_over.`6111211127`) AS A6111211127";
			break;
		}
		$query = $this->db->query("SELECT
  																COUNT(perlocation_lokasi.`lokasi`) AS Total,
																	$dataset
																FROM
																  perlocation_lokasi,
																  $resource
																WHERE perlocation_lokasi.`lokasi` = $resource.`lokasi`
																  AND $pg_wil
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																	$option_status
																	$option_jenis
																	$option_kelas
																	$option_bulan
																	$option_umur");

		return $query->row_array();
	}

	function get_berat_tanaman($lokasi, $keterangan){
		$query = $this->db->query("SELECT
															  perlocation_lokasi.`lokasi`,
															  perlocation_lokasi.`varian`,
															  perlocation_lokasi.`jenis`,
															  perlocation_lokasi.`kelas`,
															  perlocation_lokasi.`umur_f`,
															  perlocation_pm_cost.`akurasi_forcing`,
															  berat_tanaman.`Rata2_BT`
															FROM
															  perlocation_lokasi
															  INNER JOIN berat_tanaman
															    ON perlocation_lokasi.`lokasi` = berat_tanaman.`lokasi`
															    AND perlocation_lokasi.`tgl_perawatan` <= berat_tanaman.`tgl_pengamatan`
															    AND perlocation_lokasi.`tgl_panen` >= berat_tanaman.`tgl_pengamatan`
															  LEFT JOIN perlocation_pm_cost
															    ON perlocation_lokasi.`lokasi` = perlocation_pm_cost.`lokasi`
															    AND perlocation_lokasi.`keterangan` = perlocation_pm_cost.`keterangan`
															WHERE perlocation_lokasi.`lokasi` = '$lokasi'
  															AND perlocation_lokasi.`keterangan` = '$keterangan'
															ORDER BY berat_tanaman.`tgl_pengamatan` DESC
															LIMIT 1");

		return $query->row_array();
	}

	function get_berat_tanaman_total($lokasi, $keterangan){
		$query = $this->db->query("SELECT
																  perlocation_lokasi.`lokasi`,
																  perlocation_lokasi.`varian`,
																  perlocation_lokasi.`jenis`,
																  perlocation_lokasi.`kelas`,
																  ROUND(TIMESTAMPDIFF(DAY, perlocation_lokasi.`tgl_forcing`, berat_tanaman.`tgl_pengamatan`) / (365.5 / 12)) AS umur_f,
																  ROUND(TIMESTAMPDIFF(DAY, perlocation_lokasi.`tgl_forcing`, berat_tanaman.`tgl_pengamatan`) / (365.5 / 12)) + perlocation_pm_cost.`akurasi_forcing` AS akurasi_forcing,
																  berat_tanaman.`tgl_pengamatan`,
																  berat_tanaman.`Rata2_BT`
																FROM
																  perlocation_lokasi
																  INNER JOIN berat_tanaman
																    ON perlocation_lokasi.`lokasi` = berat_tanaman.`lokasi`
																    AND perlocation_lokasi.`tgl_perawatan` <= berat_tanaman.`tgl_pengamatan`
																    AND perlocation_lokasi.`tgl_panen` >= berat_tanaman.`tgl_pengamatan`
																  LEFT JOIN perlocation_pm_cost
																    ON perlocation_lokasi.`lokasi` = perlocation_pm_cost.`lokasi`
																    AND perlocation_lokasi.`keterangan` = perlocation_pm_cost.`keterangan`
																WHERE perlocation_lokasi.`lokasi` = '$lokasi'
																  AND perlocation_lokasi.`keterangan` = '$keterangan'
																ORDER BY berat_tanaman.`tgl_pengamatan` DESC");

		return $query->result();
	}

	function get_std_berat_tanaman($varietas, $jenis, $kelas, $umur){
		$query = $this->db->query("SELECT
																  std_berat_tanaman.`batas_atas`,
																  std_berat_tanaman.`berat_tanaman`,
																  std_berat_tanaman.`batas_bawah`
																FROM
																  std_berat_tanaman
																WHERE std_berat_tanaman.`varietas` = '$varietas'
																  AND std_berat_tanaman.`jenis` = '$jenis'
																  AND std_berat_tanaman.`kelas` = '$kelas'
																  AND std_berat_tanaman.`umur` = '$umur'");

		return $query->row_array();
	}
	function set_berat_tanaman($data){
		$set = implode("', '", $data);
		$query = $this->db->query("INSERT INTO perlocation_pm_berat_tanaman
																VALUES
																  (
																    '$set'
																  );");

		return true;
	}
	function del_berat_tanaman(){
		$query = $this->db->query("TRUNCATE perlocation_pm_berat_tanaman;");

		return true;
	}
	function set_berat_tanaman_total($data){
		$set = implode("', '", $data);
		$query = $this->db->query("INSERT INTO perlocation_pm_berat_tanaman_total
																VALUES
																  (
																    '$set'
																  );");

		return true;
	}
	function del_berat_tanaman_total(){
		$query = $this->db->query("TRUNCATE perlocation_pm_berat_tanaman_total;");

		return true;
	}
	function get_summary_berat_tanaman_1($w, $status, $jenis, $kelas, $tahun, $bulan, $umur){
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
																  AVG(IF(perlocation_pm_berat_tanaman_total.`umur_f` = '-7', perlocation_pm_berat_tanaman_total.`berat_tanaman`, (NULL))) AS R1,
																  AVG(IF(perlocation_pm_berat_tanaman_total.`umur_f` = '-6', perlocation_pm_berat_tanaman_total.`berat_tanaman`, (NULL))) AS R2,
																  AVG(IF(perlocation_pm_berat_tanaman_total.`umur_f` = '-5', perlocation_pm_berat_tanaman_total.`berat_tanaman`, (NULL))) AS R3,
																  AVG(IF(perlocation_pm_berat_tanaman_total.`umur_f` = '-4', perlocation_pm_berat_tanaman_total.`berat_tanaman`, (NULL))) AS R4,
																  AVG(IF(perlocation_pm_berat_tanaman_total.`umur_f` = '-3', perlocation_pm_berat_tanaman_total.`berat_tanaman`, (NULL))) AS R5,
																  AVG(IF(perlocation_pm_berat_tanaman_total.`umur_f` = '-2', perlocation_pm_berat_tanaman_total.`berat_tanaman`, (NULL))) AS R6,
																  AVG(IF(perlocation_pm_berat_tanaman_total.`umur_f` = '-1', perlocation_pm_berat_tanaman_total.`berat_tanaman`, (NULL))) AS R7,
																  AVG(IF(perlocation_pm_berat_tanaman_total.`umur_f` = '0', perlocation_pm_berat_tanaman_total.`berat_tanaman`, (NULL))) AS R8,
																  AVG(IF(perlocation_pm_berat_tanaman_total.`umur_f` = '1', perlocation_pm_berat_tanaman_total.`berat_tanaman`, (NULL))) AS R9,
																  AVG(IF(perlocation_pm_berat_tanaman_total.`umur_f` = '-7', perlocation_pm_berat_tanaman_total.`std_berat_tanaman`, (NULL))) AS S1,
																  AVG(IF(perlocation_pm_berat_tanaman_total.`umur_f` = '-6', perlocation_pm_berat_tanaman_total.`std_berat_tanaman`, (NULL))) AS S2,
																  AVG(IF(perlocation_pm_berat_tanaman_total.`umur_f` = '-5', perlocation_pm_berat_tanaman_total.`std_berat_tanaman`, (NULL))) AS S3,
																  AVG(IF(perlocation_pm_berat_tanaman_total.`umur_f` = '-4', perlocation_pm_berat_tanaman_total.`std_berat_tanaman`, (NULL))) AS S4,
																  AVG(IF(perlocation_pm_berat_tanaman_total.`umur_f` = '-3', perlocation_pm_berat_tanaman_total.`std_berat_tanaman`, (NULL))) AS S5,
																  AVG(IF(perlocation_pm_berat_tanaman_total.`umur_f` = '-2', perlocation_pm_berat_tanaman_total.`std_berat_tanaman`, (NULL))) AS S6,
																  AVG(IF(perlocation_pm_berat_tanaman_total.`umur_f` = '-1', perlocation_pm_berat_tanaman_total.`std_berat_tanaman`, (NULL))) AS S7,
																  AVG(IF(perlocation_pm_berat_tanaman_total.`umur_f` = '0', perlocation_pm_berat_tanaman_total.`std_berat_tanaman`, (NULL))) AS S8,
																  AVG(IF(perlocation_pm_berat_tanaman_total.`umur_f` = '1', perlocation_pm_berat_tanaman_total.`std_berat_tanaman`, (NULL))) AS S9
																FROM
																  perlocation_lokasi
																  INNER JOIN perlocation_pm_berat_tanaman_total
																  ON perlocation_lokasi.`lokasi` = perlocation_pm_berat_tanaman_total.`lokasi`
																  AND perlocation_lokasi.`keterangan` = perlocation_pm_berat_tanaman_total.`keterangan`
																WHERE $pg_wil
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}
	function get_summary_berat_tanaman_2($w, $status, $jenis, $kelas, $tahun, $bulan, $umur){
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
																  SUM(IF(perlocation_pm_berat_tanaman.`batas_bawah` = '1', 1, (NULL))) AS BT1,
																  SUM(IF(perlocation_pm_berat_tanaman.`on_the_track` = '1', 1, (NULL))) AS BT2,
																  SUM(IF(perlocation_pm_berat_tanaman.`batas_atas` = '1', 1, (NULL))) AS BT3,
																  COUNT(perlocation_pm_berat_tanaman.`berat_tanaman`) AS Total
																FROM
																  perlocation_lokasi
																  INNER JOIN perlocation_pm_berat_tanaman
																  ON perlocation_lokasi.`lokasi` = perlocation_pm_berat_tanaman.`lokasi`
																  AND perlocation_lokasi.`keterangan` = perlocation_pm_berat_tanaman.`keterangan`
																WHERE $pg_wil
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}
	function get_summary_berat_tanaman_3($w, $status, $jenis, $kelas, $tahun, $bulan, $umur){
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
																  perlocation_pm_berat_tanaman_total.`umur_f`,
																  perlocation_pm_berat_tanaman_total.`berat_tanaman`
																FROM
																  perlocation_lokasi
																  INNER JOIN perlocation_pm_berat_tanaman_total
																  ON perlocation_lokasi.`lokasi` = perlocation_pm_berat_tanaman_total.`lokasi`
																  AND perlocation_lokasi.`keterangan` = perlocation_pm_berat_tanaman_total.`keterangan`
																WHERE $pg_wil
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->result();
	}
}
