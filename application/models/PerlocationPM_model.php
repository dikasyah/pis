<?php

class PerlocationPM_model extends CI_Model
{

	function get_lokasi_t0($wilayah){
		$query = $this->db->query("SELECT
																  help_lokasi_aktif.*,
																  produksi.`status`,
																  IF(produksi.`status` = 'NSSC', NULL, (
																    SELECT
																      histori_lokasi.`jenis_tanaman`
																    FROM
																      histori_lokasi
																    WHERE histori_lokasi.`lokasi` = help_lokasi_aktif.`lokasi_aktif`
																      AND histori_lokasi.`status_group` = 'BK'
																    ORDER BY histori_lokasi.`tgl_perubahan_status` DESC
																    LIMIT 1
																  )) AS StatusBK,
																  produksi.`varietas_bibit` AS varietas,
																  produksi.`jenis_bibit` AS jenis,
																  produksi.`kelas_bibit` AS kelas,
																  IF(produksi.`status` = 'NSSC', NULL, (
																    SELECT
																      histori_lokasi.`tgl_perubahan_status`
																    FROM
																      histori_lokasi
																    WHERE histori_lokasi.`lokasi` = help_lokasi_aktif.`lokasi_aktif`
																      AND histori_lokasi.`status_group` = 'BK'
																    ORDER BY histori_lokasi.`tgl_perubahan_status` DESC
																    LIMIT 1
																  )) AS TGLBK,
																  IF(produksi.`status` = 'NSSC', NULL, (
																    SELECT
																      histori_lokasi.`tgl_perubahan_status`
																    FROM
																      histori_lokasi
																    WHERE histori_lokasi.`lokasi` = help_lokasi_aktif.`lokasi_aktif`
																      AND histori_lokasi.`status_group` = 'ST'
																    ORDER BY histori_lokasi.`tgl_perubahan_status` DESC
																    LIMIT 1
																  )) AS TGLST,
																  produksi.`real_dan_sisa_rencana_tgl_selesai_panen` - INTERVAL 152 DAY AS tgl_rencana_forcing,
																  lokasi.`tgl_forcing_realisasi` AS tgl_real_forcing,
																  produksi.`real_dan_sisa_rencana_tgl_selesai_panen` AS tgl_panen,
																  produksi.`real_dan_sisa_rencana_luas` AS luas,
																  produksi.`real_dan_sisa_rencana_tonase` AS tonase,
																  produksi.`real_dan_sisa_rencana_yield` AS yield
																FROM
																  help_lokasi_aktif,
																  lokasi
																  INNER JOIN produksi
																    ON lokasi.`lokasi` = produksi.`lokasi`
																    AND SUBSTRING(lokasi.`status`, 1, 4) = produksi.`status`
																WHERE help_lokasi_aktif.`wilayah` = '$wilayah'
																  AND help_lokasi_aktif.`lokasi_aktif` = lokasi.`lokasi`");

		return $query->result();
	}
	function get_lokasi_t1($wilayah){
		$query = $this->db->query("SELECT
																  help_lokasi_aktif.*,
																  produksi_t1.`status`,
																  IF(produksi_t1.`status` = 'NSSC', NULL, (
																    SELECT
																      histori_lokasi.`jenis_tanaman`
																    FROM
																      histori_lokasi
																    WHERE histori_lokasi.`lokasi` = help_lokasi_aktif.`lokasi_aktif`
																      AND histori_lokasi.`status_group` = 'BK'
																    ORDER BY histori_lokasi.`tgl_perubahan_status` DESC
																    LIMIT 1
																  )) AS StatusBK,
																  produksi_t1.`varietas_bibit` AS varietas,
																  produksi_t1.`jenis_bibit` AS jenis,
																  produksi_t1.`kelas_bibit` AS kelas,
																  IF(produksi_t1.`status` = 'NSSC', NULL, (
																    SELECT
																      histori_lokasi.`tgl_perubahan_status`
																    FROM
																      histori_lokasi
																    WHERE histori_lokasi.`lokasi` = help_lokasi_aktif.`lokasi_aktif`
																      AND histori_lokasi.`status_group` = 'BK'
																    ORDER BY histori_lokasi.`tgl_perubahan_status` DESC
																    LIMIT 1
																  )) AS TGLBK,
																  IF(produksi_t1.`status` = 'NSSC', NULL, (
																    SELECT
																      histori_lokasi.`tgl_perubahan_status`
																    FROM
																      histori_lokasi
																    WHERE histori_lokasi.`lokasi` = help_lokasi_aktif.`lokasi_aktif`
																      AND histori_lokasi.`status_group` = 'ST'
																    ORDER BY histori_lokasi.`tgl_perubahan_status` DESC
																    LIMIT 1
																  )) AS TGLST,
																  produksi_t1.`real_dan_sisa_rencana_tgl_selesai_panen` - INTERVAL 152 DAY AS tgl_rencana_forcing,
																  lokasi.`tgl_forcing_realisasi` AS tgl_real_forcing,
																  produksi_t1.`real_dan_sisa_rencana_tgl_selesai_panen` AS tgl_panen,
																  produksi_t1.`real_dan_sisa_rencana_luas` AS luas,
																  produksi_t1.`real_dan_sisa_rencana_tonase` AS tonase,
																  produksi_t1.`real_dan_sisa_rencana_yield` AS yield
																FROM
																  help_lokasi_aktif,
																  lokasi
																  INNER JOIN produksi_t1
																    ON lokasi.`lokasi` = produksi_t1.`lokasi`
																    AND SUBSTRING(lokasi.`status`, 1, 4) = produksi_t1.`status`
																WHERE help_lokasi_aktif.`wilayah` = '$wilayah'
																  AND help_lokasi_aktif.`lokasi_aktif` = lokasi.`lokasi`");

		return $query->result();
	}
	function get_lokasi_panen($wilayah){
		$query = $this->db->query("SELECT
																  hpp.`pg`,
																  hpp.`wilayah`,
																  hpp.`lokasi`,
																  produksi.`status`,
																  IF(produksi.`status` = 'NSSC', NULL, (
																    SELECT
																      histori_lokasi.`jenis_tanaman`
																    FROM
																      histori_lokasi
																    WHERE histori_lokasi.`lokasi` = produksi.`lokasi`
																      AND histori_lokasi.`status_group` = 'BK'
																    ORDER BY histori_lokasi.`tgl_perubahan_status` DESC
																    LIMIT 1
																  )) AS StatusBK,
																  produksi.`varietas_bibit` AS varietas,
																  produksi.`jenis_bibit` AS jenis,
																  produksi.`kelas_bibit` AS kelas,
																  IF(produksi.`status` = 'NSSC', NULL, (
																    SELECT
																      histori_lokasi.`tgl_perubahan_status`
																    FROM
																      histori_lokasi
																    WHERE histori_lokasi.`lokasi` = produksi.`lokasi`
																      AND histori_lokasi.`status_group` = 'BK'
																    ORDER BY histori_lokasi.`tgl_perubahan_status` DESC
																    LIMIT 1
																  )) AS TGLBK,
																  IF(produksi.`status` = 'NSSC', NULL, (
																    SELECT
																      histori_lokasi.`tgl_perubahan_status`
																    FROM
																      histori_lokasi
																    WHERE histori_lokasi.`lokasi` = produksi.`lokasi`
																      AND histori_lokasi.`status_group` = 'ST'
																    ORDER BY histori_lokasi.`tgl_perubahan_status` DESC
																    LIMIT 1
																  )) AS TGLST,
																  produksi.`real_dan_sisa_rencana_tgl_selesai_panen` - INTERVAL 152 DAY AS tgl_forcing,
																  produksi.`real_dan_sisa_rencana_tgl_selesai_panen` AS tgl_panen,
																  produksi.`real_dan_sisa_rencana_luas` AS luas,
																  produksi.`real_dan_sisa_rencana_tonase` AS tonase,
																  produksi.`real_dan_sisa_rencana_yield` AS yield
																FROM
																  hpp
																  INNER JOIN produksi
																    ON hpp.`lokasi` = produksi.`lokasi`
																    AND hpp.`status` = produksi.`status`
																WHERE hpp.`wilayah` = '$wilayah'");

		return $query->result();
	}

	function set_lokasi($data){
		$set = implode("', '", $data);
		$query = $this->db->query("INSERT INTO perlocation_lokasi
																VALUES
																  (
																    '$set'
																  );");

		return true;
	}
	function del_lokasi(){
		$query = $this->db->query("TRUNCATE perlocation_lokasi;");

		return true;
	}

	function get_lokasi($wilayah){
		$query = $this->db->query("SELECT
																  perlocation_lokasi.*
																FROM
																  perlocation_lokasi
																WHERE perlocation_lokasi.`wilayah` = '$wilayah'");

		return $query->result();
	}

	function set_lokasi_cost($data){
		$set = implode("', '", $data);
		$query = $this->db->query("INSERT INTO perlocation_pm_cost
																VALUES
																  (
																    '$set'
																  );");

		return true;
	}
	function del_lokasi_cost(){
		$query = $this->db->query("TRUNCATE perlocation_pm_cost;");

		return true;
	}

	function get_performance_wip_pm($w, $status, $jenis, $kelas, $tahun, $bulan, $umur){
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
																  SUM(IF(perlocation_pm_cost.`performance` = 'Excellent', 1, (NULL))) AS Excellent,
																  SUM(IF(perlocation_pm_cost.`performance` = 'Good', 1, (NULL))) AS Good,
																  SUM(IF(perlocation_pm_cost.`performance` = 'Poor', 1, (NULL))) AS Poor,
																  COUNT(perlocation_pm_cost.`performance`) AS Total
																FROM
																  perlocation_lokasi,
																  perlocation_pm_cost
																WHERE perlocation_lokasi.`lokasi` = perlocation_pm_cost.`lokasi`
																  AND perlocation_lokasi.`keterangan` = perlocation_pm_cost.`keterangan`
																  AND $pg_wil
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																	$option_status
																	$option_jenis
																	$option_kelas
																	$option_bulan
																	$option_umur");

		return $query->row_array();
	}

	function get_performance_wip_pm_pg($w, $status, $jenis, $kelas, $tahun, $bulan, $umur){
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
  																perlocation_lokasi.`wilayah`,
																  SUM(IF(perlocation_pm_cost.`performance` = 'Excellent', 1, (NULL))) AS Excellent,
																  SUM(IF(perlocation_pm_cost.`performance` = 'Good', 1, (NULL))) AS Good,
																  SUM(IF(perlocation_pm_cost.`performance` = 'Poor', 1, (NULL))) AS Poor,
																  COUNT(perlocation_pm_cost.`performance`) AS Total
																FROM
																  perlocation_lokasi,
																  perlocation_pm_cost
																WHERE perlocation_lokasi.`lokasi` = perlocation_pm_cost.`lokasi`
																  AND perlocation_lokasi.`keterangan` = perlocation_pm_cost.`keterangan`
																  AND $pg_wil
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																	$option_status
																	$option_jenis
																	$option_kelas
																	$option_bulan
																	$option_umur
																GROUP BY perlocation_lokasi.`wilayah`");

		return $query->result();
	}

	function get_wip_cost_pm($w, $status, $jenis, $kelas, $tahun, $bulan, $umur){
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
																  SUM(perlocation_pm_cost.`ZN01_r`) AS ZN01_r,
																  SUM(perlocation_pm_cost.`ZN02_r`) AS ZN02_r,
															  	SUM(perlocation_pm_cost.`ZN03_r`) AS ZN03_r,
																  SUM(perlocation_pm_cost.`ZN04_r`) AS ZN04_r,
																  SUM(perlocation_pm_cost.`ZN05_r`) AS ZN05_r,
																  SUM(perlocation_pm_cost.`ZN06_r`) AS ZN06_r,
																  SUM(perlocation_pm_cost.`ZN07_r`) AS ZN07_r,
																  SUM(perlocation_pm_cost.`ZN08_r`) AS ZN08_r,
																  SUM(perlocation_pm_cost.`ZN09_r`) AS ZN09_r,
																  SUM(perlocation_pm_cost.`ZN10_r`) AS ZN10_r,
																  SUM(perlocation_pm_cost.`ZN11_r`) AS ZN11_r,
																  SUM(perlocation_pm_cost.`ZN12_r`) AS ZN12_r,
																  SUM(perlocation_pm_cost.`ZN13_r`) AS ZN13_r,
																  SUM(perlocation_pm_cost.`ZN14_r`) AS ZN14_r,
																  SUM(perlocation_pm_cost.`ZN15_r`) AS ZN15_r,
																  SUM(perlocation_pm_cost.`ZNT_r`) AS ZNT_r,
																  SUM(perlocation_pm_cost.`ZN01_f`) AS ZN01_f,
																  SUM(perlocation_pm_cost.`ZN02_f`) AS ZN02_f,
																  SUM(perlocation_pm_cost.`ZN03_f`) AS ZN03_f,
																  SUM(perlocation_pm_cost.`ZN04_f`) AS ZN04_f,
																  SUM(perlocation_pm_cost.`ZN05_f`) AS ZN05_f,
																  SUM(perlocation_pm_cost.`ZN06_f`) AS ZN06_f,
																  SUM(perlocation_pm_cost.`ZN07_f`) AS ZN07_f,
																  SUM(perlocation_pm_cost.`ZN08_f`) AS ZN08_f,
																  SUM(perlocation_pm_cost.`ZN09_f`) AS ZN09_f,
																  SUM(perlocation_pm_cost.`ZN10_f`) AS ZN10_f,
																  SUM(perlocation_pm_cost.`ZN11_f`) AS ZN11_f,
																  SUM(perlocation_pm_cost.`ZN12_f`) AS ZN12_f,
																  SUM(perlocation_pm_cost.`ZN13_f`) AS ZN13_f,
																  SUM(perlocation_pm_cost.`ZN14_f`) AS ZN14_f,
																  SUM(perlocation_pm_cost.`ZN15_f`) AS ZN15_f,
																  SUM(perlocation_pm_cost.`ZNT_f`) AS ZNT_f
																FROM
																  perlocation_lokasi
																  INNER JOIN perlocation_pm_cost
																  ON perlocation_lokasi.`lokasi` = perlocation_pm_cost.`lokasi`
																	AND perlocation_lokasi.`keterangan` = perlocation_pm_cost.`keterangan`
																WHERE  $pg_wil
																  AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}

	function get_hpp_cost_pm($w, $status, $jenis, $kelas, $tahun, $bulan, $umur){
		if(substr($w, 0, 2) == 'PG'){
			if($w != 'PG'){
				$pg_wil = "hpp.`pg` = '$w'";
			}
			else{
				$pg_wil = "hpp.`pg` LIKE 'PG%'";
			}
		}
		else{
			$pg_wil = "hpp.`wilayah` = '$w'";
		}
		if($status != 'NS'){
			$option_status = "AND produksi.`status` = '$status'";
		}
		else{
			$option_status = "";
		}
		if($jenis != 'All'){
			$option_jenis = "AND produksi.`jenis_bibit` = '$jenis'";
		}
		else{
			$option_jenis = "";
		}
		if($kelas != 'All'){
			$option_kelas = "AND produksi.`kelas_bibit` = '$kelas'";
		}
		else{
			$option_kelas = "";
		}
		if($bulan != 'Total'){
			$option_bulan = "AND MONTH(produksi.`real_dan_sisa_rencana_tgl_selesai_panen`) = '$bulan'";
		}
		else{
			$option_bulan = "";
		}
		if($umur != 'Total'){
			$option_umur = "AND TIMESTAMPDIFF(MONTH, produksi.`tgl_awal_perawatan`, produksi.`real_dan_sisa_rencana_tgl_selesai_panen`) = '$umur'";
		}
		else{
			$option_umur = "";
		}
		$query = $this->db->query("SELECT
																  SUM(hpp.`ZN04`) AS ZN04_s,
																  SUM(hpp.`ZN05`) AS ZN05_s,
																  SUM(hpp.`ZN06`) AS ZN06_s,
																  SUM(hpp.`ZN07`) AS ZN07_s,
																  SUM(hpp.`ZN08`) AS ZN08_s,
																  SUM(hpp.`ZN09`) AS ZN09_s,
																  SUM(hpp.`ZN10`) AS ZN10_s,
																  SUM(hpp.`ZN11`) AS ZN11_s,
																  SUM(hpp.`ZN12`) AS ZN12_s,
																  SUM(hpp.`ZN13`) AS ZN13_s,
																  SUM(hpp.`ZN14`) AS ZN14_s
																FROM
																  hpp
																  INNER JOIN produksi
																    ON hpp.`lokasi` = produksi.`lokasi`
																    AND hpp.`status` = produksi.`status`
																WHERE hpp.`pg` = 'PG1'
																  AND YEAR(produksi.`real_dan_sisa_rencana_tgl_selesai_panen`) = '$tahun'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}

	function get_group_cost_pm($w, $status, $jenis, $kelas, $tahun, $bulan, $umur){
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
																  SUM(perlocation_pm_cost.`labour_r`) AS Labour_r,
																  SUM(perlocation_pm_cost.`charge_r`) AS Charge_r,
																  SUM(perlocation_pm_cost.`material_r`) AS Material_r,
																  SUM(perlocation_pm_cost.`Seed_r`) AS Seed_r,
																  SUM(perlocation_pm_cost.`labour_r` + perlocation_pm_cost.`charge_r` + perlocation_pm_cost.`material_r` + perlocation_pm_cost.`seed_r`) AS Total_r,
																  SUM(perlocation_pm_cost.`labour_b`) AS Labour_b,
																  SUM(perlocation_pm_cost.`charge_b`) AS Charge_b,
																  SUM(perlocation_pm_cost.`material_b`) AS Material_b,
																  SUM(perlocation_pm_cost.`Seed_b`) AS Seed_b,
																  SUM(perlocation_pm_cost.`labour_b` + perlocation_pm_cost.`charge_b` + perlocation_pm_cost.`material_b` + perlocation_pm_cost.`seed_b`) AS Total_b,
  																SUM(perlocation_lokasi.`luas`) AS luas
																FROM
																  perlocation_lokasi
																  INNER JOIN perlocation_pm_cost
																  ON perlocation_lokasi.`lokasi` = perlocation_pm_cost.`lokasi`
  																AND perlocation_lokasi.`keterangan` = perlocation_pm_cost.`keterangan`
																WHERE $pg_wil
																  AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}

	function get_trend_cost_pm($w, $status, $jenis, $kelas, $tahun, $bulan, $umur, $gc){
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
		switch ($gc) {
			case 'Total':
				$option_gc_r = "ZNT_r";
				$option_gc_b = "(perlocation_pm_cost.`Labour_b` + perlocation_pm_cost.`Charge_b` + perlocation_pm_cost.`Material_b`)";
			break;
			case 'Labour':
				$option_gc_r = "Labour_r";
				$option_gc_b = "perlocation_pm_cost.`Labour_b`";
			break;
			case 'Charge':
				$option_gc_r = "Charge_r";
				$option_gc_b = "perlocation_pm_cost.`Charge_b`";
			break;
			case 'Material':
				$option_gc_r = "Material_r";
				$option_gc_b = "perlocation_pm_cost.`Material_b`";
			break;
		}
		$query = $this->db->query("SELECT
																  SUM(perlocation_pm_trend_cost.`U1_r`) AS U1,
																  SUM(perlocation_pm_trend_cost.`U2_r`) AS U2,
																  SUM(perlocation_pm_trend_cost.`U3_r`) AS U3,
																  SUM(perlocation_pm_trend_cost.`U4_r`) AS U4,
																  SUM(perlocation_pm_trend_cost.`U5_r`) AS U5,
																  SUM(perlocation_pm_trend_cost.`U6_r`) AS U6,
																  SUM(perlocation_pm_trend_cost.`U7_r`) AS U7,
																  SUM(perlocation_pm_trend_cost.`U8_r`) AS U8,
																  SUM(perlocation_pm_trend_cost.`U9_r`) AS U9,
																  SUM(perlocation_pm_trend_cost.`U10_r`) AS U10,
																  SUM(perlocation_pm_trend_cost.`U11_r`) AS U11,
																  SUM(perlocation_pm_trend_cost.`U12_r`) AS U12,
																  SUM(perlocation_pm_trend_cost.`U13_r`) AS U13,
																  SUM(perlocation_pm_trend_cost.`U14_r`) AS U14,
																  SUM(perlocation_pm_trend_cost.`U15_r`) AS U15,
																  SUM(perlocation_pm_trend_cost.`U16_r`) AS U16,
																  SUM(perlocation_pm_trend_cost.`U17_r`) AS U17,
																  SUM(perlocation_pm_trend_cost.`U18_r`) AS U18,
																  SUM(perlocation_pm_trend_cost.`U19_r`) AS U19,
																  SUM(perlocation_pm_trend_cost.`U20_r`) AS U20,
																  SUM(perlocation_pm_trend_cost.`U21_r`) AS U21,
																  SUM(perlocation_pm_trend_cost.`U1_b`) AS B1,
																  SUM(perlocation_pm_trend_cost.`U2_b`) AS B2,
																  SUM(perlocation_pm_trend_cost.`U3_b`) AS B3,
																  SUM(perlocation_pm_trend_cost.`U4_b`) AS B4,
																  SUM(perlocation_pm_trend_cost.`U5_b`) AS B5,
																  SUM(perlocation_pm_trend_cost.`U6_b`) AS B6,
																  SUM(perlocation_pm_trend_cost.`U7_b`) AS B7,
																  SUM(perlocation_pm_trend_cost.`U8_b`) AS B8,
																  SUM(perlocation_pm_trend_cost.`U9_b`) AS B9,
																  SUM(perlocation_pm_trend_cost.`U10_b`) AS B10,
																  SUM(perlocation_pm_trend_cost.`U11_b`) AS B11,
																  SUM(perlocation_pm_trend_cost.`U12_b`) AS B12,
																  SUM(perlocation_pm_trend_cost.`U13_b`) AS B13,
																  SUM(perlocation_pm_trend_cost.`U14_b`) AS B14,
																  SUM(perlocation_pm_trend_cost.`U15_b`) AS B15,
																  SUM(perlocation_pm_trend_cost.`U16_b`) AS B16,
																  SUM(perlocation_pm_trend_cost.`U17_b`) AS B17,
																  SUM(perlocation_pm_trend_cost.`U18_b`) AS B18,
																  SUM(perlocation_pm_trend_cost.`U19_b`) AS B19,
																  SUM(perlocation_pm_trend_cost.`U20_b`) AS B20,
																  SUM(perlocation_pm_trend_cost.`U21_b`) AS B21
																FROM
																  perlocation_lokasi
																  INNER JOIN perlocation_pm_trend_cost
																  ON perlocation_lokasi.`lokasi` = perlocation_pm_trend_cost.`lokasi`
																WHERE $pg_wil
																  AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}

	function get_akurasi_forcing_pm($w, $status, $jenis, $kelas, $tahun, $bulan, $umur){
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
																  AVG(perlocation_pm_cost.`akurasi_forcing`) AS akurasi_forcing,
																  SUM(perlocation_pm_cost.`cost_forcing`) AS cost_forcing
																FROM
																  perlocation_lokasi
																  INNER JOIN perlocation_pm_cost
																     ON perlocation_lokasi.`lokasi` = perlocation_pm_cost.`lokasi`
																	   AND perlocation_lokasi.`keterangan` = perlocation_pm_cost.`keterangan`
																WHERE $pg_wil
																  AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																  $option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}

	function get_akurasi_forcing_range_pm($w, $status, $jenis, $kelas, $tahun, $bulan, $umur){
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
																  SUM(IF(ROUND(perlocation_pm_cost.`akurasi_forcing`) > 2, 1, (NULL))) AS AF1,
																  SUM(IF(ROUND(perlocation_pm_cost.`akurasi_forcing`) <= 2, IF(ROUND(perlocation_pm_cost.`akurasi_forcing`) > 0, 1, (NULL)), (NULL))) AS AF2,
																  SUM(IF(ROUND(perlocation_pm_cost.`akurasi_forcing`) = 0, 1, (NULL))) AS AF3,
																  SUM(IF(ROUND(perlocation_pm_cost.`akurasi_forcing`) >= -2, IF(ROUND(perlocation_pm_cost.`akurasi_forcing`) < 0, 1, (NULL)), (NULL))) AS AF4,
																  SUM(IF(ROUND(perlocation_pm_cost.`akurasi_forcing`) < -2, 1, (NULL))) AS AF5,
  																COUNT(perlocation_pm_cost.`akurasi_forcing`) AS Total
																FROM
																  perlocation_lokasi
																  INNER JOIN perlocation_pm_cost
																  ON perlocation_lokasi.`lokasi` = perlocation_pm_cost.`lokasi`
																WHERE $pg_wil
																  AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																  $option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}

	function get_akurasi_forcing_cost_pm($w, $status, $jenis, $kelas, $tahun, $bulan, $umur){
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
																  SUM(IF((perlocation_pm_cost.`cost_forcing` / perlocation_lokasi.`luas`) > 10000000, 1, (NULL))) AS AF1,
																  SUM(IF((perlocation_pm_cost.`cost_forcing` / perlocation_lokasi.`luas`) <= 10000000, IF(perlocation_pm_cost.`cost_forcing` > 5000000, 1, (NULL)), (NULL))) AS AF2,
																  SUM(IF((perlocation_pm_cost.`cost_forcing` / perlocation_lokasi.`luas`) <= 5000000, IF(perlocation_pm_cost.`cost_forcing` > 2000000, 1, (NULL)), (NULL))) AS AF3,
																  SUM(IF((perlocation_pm_cost.`cost_forcing` / perlocation_lokasi.`luas`) <= 2000000, IF(perlocation_pm_cost.`cost_forcing` > 0, 1, (NULL)), (NULL))) AS AF4,
																  SUM(IF((perlocation_pm_cost.`cost_forcing` / perlocation_lokasi.`luas`) >= -2000000, IF(perlocation_pm_cost.`cost_forcing` <= 0, 1, (NULL)), (NULL))) AS AF5,
																  SUM(IF((perlocation_pm_cost.`cost_forcing` / perlocation_lokasi.`luas`) >= -5000000, IF(perlocation_pm_cost.`cost_forcing` < -2000000, 1, (NULL)), (NULL))) AS AF6,
																  SUM(IF((perlocation_pm_cost.`cost_forcing` / perlocation_lokasi.`luas`) >= -10000000, IF(perlocation_pm_cost.`cost_forcing` < -5000000, 1, (NULL)), (NULL))) AS AF7,
																  SUM(IF((perlocation_pm_cost.`cost_forcing` / perlocation_lokasi.`luas`) < -10000000, 1, (NULL))) AS AF8,
																  COUNT(perlocation_pm_cost.`akurasi_forcing`) AS Total
																FROM
																  perlocation_lokasi
																  INNER JOIN perlocation_pm_cost
																  ON perlocation_lokasi.`lokasi` = perlocation_pm_cost.`lokasi`
																WHERE $pg_wil
																  AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}
	function get_akurasi_forcing_cost_2_pm($w, $status, $jenis, $kelas, $tahun, $bulan, $umur){
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
																  SUM(IF(((perlocation_pm_cost.`ZN08_r` + perlocation_pm_cost.`ZN08_f`) / perlocation_lokasi.`luas` - IF(perlocation_lokasi.`status` = 'NSFC', element_cost.`BPP_NSFC_ha`, element_cost.`BPP_NSSC_ha`)) < -2000000, 1, (NULL))) AS AF4,
																  SUM(IF(((perlocation_pm_cost.`ZN08_r` + perlocation_pm_cost.`ZN08_f`) / perlocation_lokasi.`luas` - IF(perlocation_lokasi.`status` = 'NSFC', element_cost.`BPP_NSFC_ha`, element_cost.`BPP_NSSC_ha`)) >= -2000000, IF(((perlocation_pm_cost.`ZN08_r` + perlocation_pm_cost.`ZN08_f`) / perlocation_lokasi.`luas` - IF(perlocation_lokasi.`status` = 'NSFC', element_cost.`BPP_NSFC_ha`, element_cost.`BPP_NSSC_ha`)) <= 0, 1, (NULL)), (NULL))) AS AF3,
																  SUM(IF(((perlocation_pm_cost.`ZN08_r` + perlocation_pm_cost.`ZN08_f`) / perlocation_lokasi.`luas` - IF(perlocation_lokasi.`status` = 'NSFC', element_cost.`BPP_NSFC_ha`, element_cost.`BPP_NSSC_ha`)) > 0, IF(((perlocation_pm_cost.`ZN08_r` + perlocation_pm_cost.`ZN08_f`) / perlocation_lokasi.`luas` - IF(perlocation_lokasi.`status` = 'NSFC', element_cost.`BPP_NSFC_ha`, element_cost.`BPP_NSSC_ha`)) <= 2000000, 1, (NULL)), (NULL))) AS AF2,
																  SUM(IF(((perlocation_pm_cost.`ZN08_r` + perlocation_pm_cost.`ZN08_f`) / perlocation_lokasi.`luas` - IF(perlocation_lokasi.`status` = 'NSFC', element_cost.`BPP_NSFC_ha`, element_cost.`BPP_NSSC_ha`)) > 2000000, 1, (NULL))) AS AF1
																FROM
																  element_cost,
																  perlocation_lokasi
																  LEFT JOIN perlocation_pm_cost
																    ON perlocation_lokasi.`lokasi` = perlocation_pm_cost.`lokasi`
																    AND perlocation_lokasi.`keterangan` = perlocation_pm_cost.`keterangan`
																WHERE $pg_wil
																  AND element_cost.`code` = 'ZN08'
																  AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}
	function get_material_real($lokasi, $wilayah, $tgl_perawatan, $tgl_forcing, $type){
		if($type != 'Total'){
			$option_type = "GROUP BY CEIL(TIMESTAMPDIFF(DAY, '$tgl_perawatan', $wilayah.`tgl_realisasi`) / (365.5 / 12)),
							 				CEIL(TIMESTAMPDIFF(DAY, '$tgl_forcing', $wilayah.`tgl_realisasi`) / (365.5 / 12))";
		}
		else{
			$option_type = "";
		}
		$query = $this->db->query("SELECT
																  $wilayah.`lokasi`,
																  CEIL(TIMESTAMPDIFF(DAY, '$tgl_perawatan', $wilayah.`tgl_realisasi`) / (365.5 / 12)) AS umur,
																	CEIL(TIMESTAMPDIFF(DAY, '$tgl_forcing', $wilayah.`tgl_realisasi`) / (365.5 / 12)) AS umur_f,
																  SUM(IF(help_master_material.`material` = 'Urea', $wilayah.`resource`, 0)) AS Urea,
																  SUM(IF(help_master_material.`material` = 'Urease', $wilayah.`resource`, 0)) AS Urease,
																  SUM(IF(help_master_material.`material` = 'Za', $wilayah.`resource`, 0)) AS Za,
																  SUM(IF(help_master_material.`material` = 'K2SO4', $wilayah.`resource`, 0)) AS K2SO4,
																  SUM(IF(help_master_material.`material` = 'KCL', $wilayah.`resource`, 0)) AS KCL,
																  SUM(IF(help_master_material.`material` = 'TSP', $wilayah.`resource`, 0)) AS TSP,
																  SUM(IF(help_master_material.`material` = 'DAP', $wilayah.`resource`, 0)) AS DAP,
																  SUM(IF(help_master_material.`material` = 'MgSO4', $wilayah.`resource`, 0)) AS MgSO4,
																  SUM(IF(help_master_material.`material` = 'Kieserite', $wilayah.`resource`, 0)) AS Kieserite,
																  SUM(IF(help_master_material.`material` = 'FeSO4', $wilayah.`resource`, 0)) AS FeSO4,

																  SUM(IF(help_master_material.`material` = 'ZnSO4', $wilayah.`resource`, 0)) AS ZnSO4,
																  SUM(IF(help_master_material.`material` = 'Dolomite', $wilayah.`resource`, 0)) AS Dolomite,
																  SUM(IF(help_master_material.`material` = 'Gypsum', $wilayah.`resource`, 0)) AS Gypsum,
																  SUM(IF(help_master_material.`material` = 'CuSO4', $wilayah.`resource`, 0)) AS CuSO4,
																  SUM(IF(help_master_material.`material` = 'Borax', $wilayah.`resource`, 0)) AS Borax,
																  SUM(IF(help_master_material.`material` = 'LOB', $wilayah.`resource`, 0)) AS LOB,
																  SUM(IF(help_master_material.`material` = 'CaCl2', $wilayah.`resource`, 0)) AS CaCl2,
																  SUM(IF(help_master_material.`material` = 'Calcibor', $wilayah.`resource`, 0)) AS Calcibor,
																  SUM(IF(help_master_material.`material` = 'Kompos', $wilayah.`resource`, 0)) AS Kompos,
																  SUM(IF(help_master_material.`material` = 'Belerang', $wilayah.`resource`, 0)) AS Belerang,

																  SUM(IF(help_master_material.`material` = 'Kieserite G', $wilayah.`resource`, 0)) AS Kieserite_G,
																  SUM(IF(help_master_material.`material` = 'NPK', $wilayah.`resource`, 0)) AS NPK,
																  SUM(IF(help_master_material.`material` = 'Petro Cas', $wilayah.`resource`, 0)) AS Petro_Cas,
																  SUM(IF(help_master_material.`material` = 'Fosetil', $wilayah.`resource`, 0)) AS Fosetil,
																  SUM(IF(help_master_material.`material` = 'Metalaxil', $wilayah.`resource`, 0)) AS Metalaxil,
																  SUM(IF(help_master_material.`material` = 'Propiconazole', $wilayah.`resource`, 0)) AS Propiconazole,
																  SUM(IF(help_master_material.`material` = 'Prochloraz', $wilayah.`resource`, 0)) AS Prochloraz,
																  SUM(IF(help_master_material.`material` = 'Mankozeb', $wilayah.`resource`, 0)) AS Mankozeb,
																  SUM(IF(help_master_material.`material` = 'Folirfos', $wilayah.`resource`, 0)) AS Folirfos,
																  SUM(IF(help_master_material.`material` = 'H3PO3', $wilayah.`resource`, 0)) AS H3PO3,

																  SUM(IF(help_master_material.`material` = 'Detazeb', $wilayah.`resource`, 0)) AS Detazeb,
																  SUM(IF(help_master_material.`material` = 'Bromacyl', $wilayah.`resource`, 0)) AS Bromacyl,
																  SUM(IF(help_master_material.`material` = 'Diuron', $wilayah.`resource`, 0)) AS Diuron,
																  SUM(IF(help_master_material.`material` = 'Glyphosate', $wilayah.`resource`, 0)) AS Glyphosate,
																  SUM(IF(help_master_material.`material` = 'Quizalofop', $wilayah.`resource`, 0)) AS Quizalofop,
																  SUM(IF(help_master_material.`material` = 'Ametrine', $wilayah.`resource`, 0)) AS Ametrine,
																  SUM(IF(help_master_material.`material` = 'Bazza', $wilayah.`resource`, 0)) AS Bazza,
																  SUM(IF(help_master_material.`material` = 'Tekasi', $wilayah.`resource`, 0)) AS Tekasi,
																  SUM(IF(help_master_material.`material` = 'Tekila', $wilayah.`resource`, 0)) AS Tekila,
																  SUM(IF(help_master_material.`material` = 'Chlorpyrifos', $wilayah.`resource`, 0)) AS Chlorpyrifos,

																  SUM(IF(help_master_material.`material` = 'Sidazinon', $wilayah.`resource`, 0)) AS Sidazinon,
																  SUM(IF(help_master_material.`material` = 'Propoxur', $wilayah.`resource`, 0)) AS Propoxur,
																  SUM(IF(help_master_material.`material` = 'Cypermethrin', $wilayah.`resource`, 0)) AS Cypermethrin,
																  SUM(IF(help_master_material.`material` = 'Bifentrin EC', $wilayah.`resource`, 0)) AS Bifentrin_EC,
																  SUM(IF(help_master_material.`material` = 'Bifentrin G', $wilayah.`resource`, 0)) AS Bifentrin_G,
																  SUM(IF(help_master_material.`material` = 'BPMC', $wilayah.`resource`, 0)) AS BPMC,
																  SUM(IF(help_master_material.`material` = 'Clorpyrifos', $wilayah.`resource`, 0)) AS Clorpyrifos,
																  SUM(IF(help_master_material.`material` = 'Abamectin', $wilayah.`resource`, 0)) AS Abamectin,
																  SUM(IF(help_master_material.`material` = 'Sanisol', $wilayah.`resource`, 0)) AS Sanisol,
																  SUM(IF(help_master_material.`material` = 'Ethylene', $wilayah.`resource`, 0)) AS Ethylene,

																  SUM(IF(help_master_material.`material` = 'Ethepon', $wilayah.`resource`, 0)) AS Ethepon,
																  SUM(IF(help_master_material.`material` = 'Kaolin', $wilayah.`resource`, 0)) AS Kaolin,
																  SUM(IF(help_master_material.`material` = 'Zeolit', $wilayah.`resource`, 0)) AS Zeolit,
																  SUM(IF(help_master_material.`material` = 'Rabas', $wilayah.`resource`, 0)) AS Rabas,
																  SUM(IF(help_master_material.`material` = 'Ratgone', $wilayah.`resource`, 0)) AS Ratgone,
																  SUM(IF(help_master_material.`material` = 'Indostick', $wilayah.`resource`, 0)) AS Indostick,
																  SUM(IF(help_master_material.`material` = 'Organosilicon', $wilayah.`resource`, 0)) AS Organosilicon,
																  SUM(IF(help_master_material.`material` = 'Soda Ash', $wilayah.`resource`, 0)) AS Soda_Ash,
																  SUM(IF(help_master_material.`material` = 'Sarineb', $wilayah.`resource`, 0)) AS Sarineb,
																  SUM(IF(help_master_material.`material` = 'Sorento', $wilayah.`resource`, 0)) AS Sorento,

																  SUM(IF(help_master_material.`material` = 'NPK Haracoat', $wilayah.`resource`, 0)) AS NPK_Haracoat,
																  SUM(IF(help_master_material.`material` = 'Oksifluorfen', $wilayah.`resource`, 0)) AS Oksifluorfen
																FROM
																  $wilayah,
																  help_master_material
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND help_master_material.`code` = $wilayah.`bahan_alat`
																$option_type");

		return $query->result();
	}
	function get_material_real_panen($lokasi, $wilayah, $tgl_perawatan, $tgl_forcing, $tahun, $type){
		if($type != 'Total'){
			$option_type = "GROUP BY CEIL(TIMESTAMPDIFF(DAY, '$tgl_perawatan', $wilayah.`tgl_realisasi`) / (365.5 / 12)),
							 				CEIL(TIMESTAMPDIFF(DAY, '$tgl_forcing', $wilayah.`tgl_realisasi`) / (365.5 / 12))";
		}
		else{
			$option_type = "";
		}
		$query = $this->db->query("SELECT
																  $wilayah.`lokasi`,
																  CEIL(TIMESTAMPDIFF(DAY, '$tgl_perawatan', $wilayah.`tgl_realisasi`) / (365.5 / 12)) AS umur,
																	CEIL(TIMESTAMPDIFF(DAY, '$tgl_forcing', $wilayah.`tgl_realisasi`) / (365.5 / 12)) AS umur_f,
																  SUM(IF(help_master_material.`material` = 'Urea', $wilayah.`resource`, 0)) AS Urea,
																  SUM(IF(help_master_material.`material` = 'Urease', $wilayah.`resource`, 0)) AS Urease,
																  SUM(IF(help_master_material.`material` = 'Za', $wilayah.`resource`, 0)) AS Za,
																  SUM(IF(help_master_material.`material` = 'K2SO4', $wilayah.`resource`, 0)) AS K2SO4,
																  SUM(IF(help_master_material.`material` = 'KCL', $wilayah.`resource`, 0)) AS KCL,
																  SUM(IF(help_master_material.`material` = 'TSP', $wilayah.`resource`, 0)) AS TSP,
																  SUM(IF(help_master_material.`material` = 'DAP', $wilayah.`resource`, 0)) AS DAP,
																  SUM(IF(help_master_material.`material` = 'MgSO4', $wilayah.`resource`, 0)) AS MgSO4,
																  SUM(IF(help_master_material.`material` = 'Kieserite', $wilayah.`resource`, 0)) AS Kieserite,
																  SUM(IF(help_master_material.`material` = 'FeSO4', $wilayah.`resource`, 0)) AS FeSO4,

																  SUM(IF(help_master_material.`material` = 'ZnSO4', $wilayah.`resource`, 0)) AS ZnSO4,
																  SUM(IF(help_master_material.`material` = 'Dolomite', $wilayah.`resource`, 0)) AS Dolomite,
																  SUM(IF(help_master_material.`material` = 'Gypsum', $wilayah.`resource`, 0)) AS Gypsum,
																  SUM(IF(help_master_material.`material` = 'CuSO4', $wilayah.`resource`, 0)) AS CuSO4,
																  SUM(IF(help_master_material.`material` = 'Borax', $wilayah.`resource`, 0)) AS Borax,
																  SUM(IF(help_master_material.`material` = 'LOB', $wilayah.`resource`, 0)) AS LOB,
																  SUM(IF(help_master_material.`material` = 'CaCl2', $wilayah.`resource`, 0)) AS CaCl2,
																  SUM(IF(help_master_material.`material` = 'Calcibor', $wilayah.`resource`, 0)) AS Calcibor,
																  SUM(IF(help_master_material.`material` = 'Kompos', $wilayah.`resource`, 0)) AS Kompos,
																  SUM(IF(help_master_material.`material` = 'Belerang', $wilayah.`resource`, 0)) AS Belerang,

																  SUM(IF(help_master_material.`material` = 'Kieserite G', $wilayah.`resource`, 0)) AS Kieserite_G,
																  SUM(IF(help_master_material.`material` = 'NPK', $wilayah.`resource`, 0)) AS NPK,
																  SUM(IF(help_master_material.`material` = 'Petro Cas', $wilayah.`resource`, 0)) AS Petro_Cas,
																  SUM(IF(help_master_material.`material` = 'Fosetil', $wilayah.`resource`, 0)) AS Fosetil,
																  SUM(IF(help_master_material.`material` = 'Metalaxil', $wilayah.`resource`, 0)) AS Metalaxil,
																  SUM(IF(help_master_material.`material` = 'Propiconazole', $wilayah.`resource`, 0)) AS Propiconazole,
																  SUM(IF(help_master_material.`material` = 'Prochloraz', $wilayah.`resource`, 0)) AS Prochloraz,
																  SUM(IF(help_master_material.`material` = 'Mankozeb', $wilayah.`resource`, 0)) AS Mankozeb,
																  SUM(IF(help_master_material.`material` = 'Folirfos', $wilayah.`resource`, 0)) AS Folirfos,
																  SUM(IF(help_master_material.`material` = 'H3PO3', $wilayah.`resource`, 0)) AS H3PO3,

																  SUM(IF(help_master_material.`material` = 'Detazeb', $wilayah.`resource`, 0)) AS Detazeb,
																  SUM(IF(help_master_material.`material` = 'Bromacyl', $wilayah.`resource`, 0)) AS Bromacyl,
																  SUM(IF(help_master_material.`material` = 'Diuron', $wilayah.`resource`, 0)) AS Diuron,
																  SUM(IF(help_master_material.`material` = 'Glyphosate', $wilayah.`resource`, 0)) AS Glyphosate,
																  SUM(IF(help_master_material.`material` = 'Quizalofop', $wilayah.`resource`, 0)) AS Quizalofop,
																  SUM(IF(help_master_material.`material` = 'Ametrine', $wilayah.`resource`, 0)) AS Ametrine,
																  SUM(IF(help_master_material.`material` = 'Bazza', $wilayah.`resource`, 0)) AS Bazza,
																  SUM(IF(help_master_material.`material` = 'Tekasi', $wilayah.`resource`, 0)) AS Tekasi,
																  SUM(IF(help_master_material.`material` = 'Tekila', $wilayah.`resource`, 0)) AS Tekila,
																  SUM(IF(help_master_material.`material` = 'Chlorpyrifos', $wilayah.`resource`, 0)) AS Chlorpyrifos,

																  SUM(IF(help_master_material.`material` = 'Sidazinon', $wilayah.`resource`, 0)) AS Sidazinon,
																  SUM(IF(help_master_material.`material` = 'Propoxur', $wilayah.`resource`, 0)) AS Propoxur,
																  SUM(IF(help_master_material.`material` = 'Cypermethrin', $wilayah.`resource`, 0)) AS Cypermethrin,
																  SUM(IF(help_master_material.`material` = 'Bifentrin EC', $wilayah.`resource`, 0)) AS Bifentrin_EC,
																  SUM(IF(help_master_material.`material` = 'Bifentrin G', $wilayah.`resource`, 0)) AS Bifentrin_G,
																  SUM(IF(help_master_material.`material` = 'BPMC', $wilayah.`resource`, 0)) AS BPMC,
																  SUM(IF(help_master_material.`material` = 'Clorpyrifos', $wilayah.`resource`, 0)) AS Clorpyrifos,
																  SUM(IF(help_master_material.`material` = 'Abamectin', $wilayah.`resource`, 0)) AS Abamectin,
																  SUM(IF(help_master_material.`material` = 'Sanisol', $wilayah.`resource`, 0)) AS Sanisol,
																  SUM(IF(help_master_material.`material` = 'Ethylene', $wilayah.`resource`, 0)) AS Ethylene,

																  SUM(IF(help_master_material.`material` = 'Ethepon', $wilayah.`resource`, 0)) AS Ethepon,
																  SUM(IF(help_master_material.`material` = 'Kaolin', $wilayah.`resource`, 0)) AS Kaolin,
																  SUM(IF(help_master_material.`material` = 'Zeolit', $wilayah.`resource`, 0)) AS Zeolit,
																  SUM(IF(help_master_material.`material` = 'Rabas', $wilayah.`resource`, 0)) AS Rabas,
																  SUM(IF(help_master_material.`material` = 'Ratgone', $wilayah.`resource`, 0)) AS Ratgone,
																  SUM(IF(help_master_material.`material` = 'Indostick', $wilayah.`resource`, 0)) AS Indostick,
																  SUM(IF(help_master_material.`material` = 'Organosilicon', $wilayah.`resource`, 0)) AS Organosilicon,
																  SUM(IF(help_master_material.`material` = 'Soda Ash', $wilayah.`resource`, 0)) AS Soda_Ash,
																  SUM(IF(help_master_material.`material` = 'Sarineb', $wilayah.`resource`, 0)) AS Sarineb,
																  SUM(IF(help_master_material.`material` = 'Sorento', $wilayah.`resource`, 0)) AS Sorento,

																  SUM(IF(help_master_material.`material` = 'NPK Haracoat', $wilayah.`resource`, 0)) AS NPK_Haracoat,
																  SUM(IF(help_master_material.`material` = 'Oksifluorfen', $wilayah.`resource`, 0)) AS Oksifluorfen
																FROM
																  $wilayah,
																  help_master_material
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND help_master_material.`code` = $wilayah.`bahan_alat`
  																AND SUBSTRING($wilayah.`bulan_panen`, 1, 4) = '$tahun'
																$option_type");

		return $query->result();
	}
	function set_lokasi_material_real($data){
		$set = implode("', '", $data);
		$query = $this->db->query("INSERT INTO perlocation_pm_material_real
																VALUES
																  (
																    '$set'
																  );");

		return true;
	}
	function del_lokasi_material_real(){
		$query = $this->db->query("TRUNCATE perlocation_pm_material_real;");

		return true;
	}
	function set_lokasi_material_real_total($data){
		$set = implode("', '", $data);
		$query = $this->db->query("INSERT INTO perlocation_pm_material_real_total
																VALUES
																  (
																    '$set'
																  );");

		return true;
	}
	function del_lokasi_material_real_total(){
		$query = $this->db->query("TRUNCATE perlocation_pm_material_real_total;");

		return true;
	}

	function get_material_budget($kelas, $umur, $type){
		if($type != 'Total'){
			$option_type = "std_material_acc";
		}
		else{
			$option_type = "std_material";
		}
		$query = $this->db->query("SELECT
																  $option_type.`Urea` AS Urea,
																  $option_type.`Urease` AS Urease,
																  $option_type.`Za` AS Za,
																  $option_type.`K2SO4` AS K2SO4,
																  $option_type.`KCL` AS KCL,
																  $option_type.`TSP` AS TSP,
																  $option_type.`DAP` AS DAP,
																  $option_type.`MgSO4` AS MgSO4,
																  $option_type.`Kieserite` AS Kieserite,
																  $option_type.`FeSO4` AS FeSO4,
																  $option_type.`ZnSO4` AS ZnSO4,
																  $option_type.`Dolomite` AS Dolomite,
																  $option_type.`Gypsum` AS Gypsum,
																  $option_type.`CuSO4` AS CuSO4,
																  $option_type.`Borax` AS Borax,
																  $option_type.`LOB` AS LOB,
																  $option_type.`CaCl2` AS CaCl2,
																  $option_type.`Calcibor` AS Calcibor,
																  $option_type.`Kompos` AS Kompos,
																  $option_type.`Belerang` AS Belerang,
																  $option_type.`Kieserite_G` AS Kieserite_G,
																  $option_type.`NPK` AS NPK,
																  $option_type.`Petro_Cas` AS Petro_Cas,
																  $option_type.`Fosetil` AS Fosetil,
																  $option_type.`Metalaxil` AS Metalaxil,
																  $option_type.`Propiconazole` AS Propiconazole,
																  $option_type.`Prochloraz` AS Prochloraz,
																  $option_type.`Mankozeb` AS Mankozeb,
																  $option_type.`Folirfos` AS Folirfos,
																  $option_type.`H3PO3` AS H3PO3,
																  $option_type.`Detazeb` AS Detazeb,
																  $option_type.`Bromacyl` AS Bromacyl,
																  $option_type.`Diuron` AS Diuron,
																  $option_type.`Glyphosate` AS Glyphosate,
																  $option_type.`Quizalofop` AS Quizalofop,
																  $option_type.`Ametrine` AS Ametrine,
																  $option_type.`Bazza` AS Bazza,
																  $option_type.`Tekasi` AS Tekasi,
																  $option_type.`Tekila` AS Tekila,
																  $option_type.`Chlorpyrifos` AS Chlorpyrifos,
																  $option_type.`Sidazinon` AS Sidazinon,
																  $option_type.`Propoxur` AS Propoxur,
																  $option_type.`Cypermethrin` AS Cypermethrin,
																  $option_type.`Bifentrin_EC` AS Bifentrin_EC,
																  $option_type.`Bifentrin_G` AS Bifentrin_G,
																  $option_type.`BPMC` AS BPMC,
																  $option_type.`Clorpyrifos` AS Clorpyrifos,
																  $option_type.`Abamectin` AS Abamectin,
																  $option_type.`Sanisol` AS Sanisol,
																  $option_type.`Ethylene` AS Ethylene,
																  $option_type.`Ethepon` AS Ethepon,
																  $option_type.`Kaolin` AS Kaolin,
																  $option_type.`Zeolit` AS Zeolit,
																  $option_type.`Rabas` AS Rabas,
																  $option_type.`Ratgone` AS Ratgone,
																  $option_type.`Indostick` AS Indostick,
																  $option_type.`Organosilicon` AS Organosilicon,
																  $option_type.`Soda_Ash` AS Soda_Ash,
																  $option_type.`Sarineb` AS Sarineb,
																  $option_type.`Sorento` AS Sorento,
																  $option_type.`NPK_Haracoat` AS NPK_Haracoat,
																  $option_type.`Oksifluorfen` AS Oksifluorfen
																FROM
																  $option_type
																WHERE $option_type.`kelas` = '$kelas'
																  AND $option_type.`umur` = '$umur'");

		return $query->row_array();
	}
	function set_lokasi_material_budget($data){
		$set = implode("', '", $data);
		$query = $this->db->query("INSERT INTO perlocation_pm_material_budget
																VALUES
																  (
																    '$set'
																  );");

		return true;
	}
	function set_lokasi_material_budget_total($data){
		$set = implode("', '", $data);
		$query = $this->db->query("INSERT INTO perlocation_pm_material_budget_total
																VALUES
																  (
																    '$set'
																  );");

		return true;
	}
	function del_lokasi_material_budget(){
		$query = $this->db->query("TRUNCATE perlocation_pm_material_budget;");

		return true;
	}
	function del_lokasi_material_budget_total(){
		$query = $this->db->query("TRUNCATE perlocation_pm_material_budget_total;");

		return true;
	}

	function set_lokasi_material_over($data){
		$set = implode("', '", $data);
		$query = $this->db->query("INSERT INTO perlocation_pm_material_over
																VALUES
																  (
																    '$set'
																  );");

		return true;
	}
	function del_lokasi_material_over(){
		$query = $this->db->query("TRUNCATE perlocation_pm_material_over;");

		return true;
	}

	function get_material_quota($kelas, $umur){
		$query = $this->db->query("SELECT
																  (std_material_quota.`Urea`) AS Urea,
																  (std_material_quota.`Urease`) AS Urease,
																  (std_material_quota.`Za`) AS Za,
																  (std_material_quota.`K2SO4`) AS K2SO4,
																  (std_material_quota.`KCL`) AS KCL,
																  (std_material_quota.`TSP`) AS TSP,
																  (std_material_quota.`DAP`) AS DAP,
																  (std_material_quota.`MgSO4`) AS MgSO4,
																  (std_material_quota.`Kieserite`) AS Kieserite,
																  (std_material_quota.`FeSO4`) AS FeSO4,

																  (std_material_quota.`ZnSO4`) AS ZnSO4,
																  (std_material_quota.`Dolomite`) AS Dolomite,
																  (std_material_quota.`Gypsum`) AS Gypsum,
																  (std_material_quota.`CuSO4`) AS CuSO4,
																  (std_material_quota.`Borax`) AS Borax,
																  (std_material_quota.`LOB`) AS LOB,
																  (std_material_quota.`CaCl2`) AS CaCl2,
																  (std_material_quota.`Calcibor`) AS Calcibor,
																  (std_material_quota.`Kompos`) AS Kompos,
																  (std_material_quota.`Belerang`) AS Belerang,

																  (std_material_quota.`Kieserite_G`) AS Kieserite_G,
																  (std_material_quota.`NPK`) AS NPK,
																  (std_material_quota.`Petro_Cas`) AS Petro_Cas,
																  (std_material_quota.`Fosetil`) AS Fosetil,
																  (std_material_quota.`Metalaxil`) AS Metalaxil,
																  (std_material_quota.`Propiconazole`) AS Propiconazole,
																  (std_material_quota.`Prochloraz`) AS Prochloraz,
																  (std_material_quota.`Mankozeb`) AS Mankozeb,
																  (std_material_quota.`Folirfos`) AS Folirfos,
																  (std_material_quota.`H3PO3`) AS H3PO3,

																  (std_material_quota.`Detazeb`) AS Detazeb,
																  (std_material_quota.`Bromacyl`) AS Bromacyl,
																  (std_material_quota.`Diuron`) AS Diuron,
																  (std_material_quota.`Glyphosate`) AS Glyphosate,
																  (std_material_quota.`Quizalofop`) AS Quizalofop,
																  (std_material_quota.`Ametrine`) AS Ametrine,
																  (std_material_quota.`Bazza`) AS Bazza,
																  (std_material_quota.`Tekasi`) AS Tekasi,
																  (std_material_quota.`Tekila`) AS Tekila,
																  (std_material_quota.`Chlorpyrifos`) AS Chlorpyrifos,

																  (std_material_quota.`Sidazinon`) AS Sidazinon,
																  (std_material_quota.`Propoxur`) AS Propoxur,
																  (std_material_quota.`Cypermethrin`) AS Cypermethrin,
																  (std_material_quota.`Bifentrin_EC`) AS Bifentrin_EC,
																  (std_material_quota.`Bifentrin_G`) AS Bifentrin_G,
																  (std_material_quota.`BPMC`) AS BPMC,
																  (std_material_quota.`Clorpyrifos`) AS Clorpyrifos,
																  (std_material_quota.`Abamectin`) AS Abamectin,
																  (std_material_quota.`Sanisol`) AS Sanisol,
																  (std_material_quota.`Ethylene`) AS Ethylene,

																  (std_material_quota.`Ethepon`) AS Ethepon,
																  (std_material_quota.`Kaolin`) AS Kaolin,
																  (std_material_quota.`Zeolit`) AS Zeolit,
																  (std_material_quota.`Rabas`) AS Rabas,
																  (std_material_quota.`Ratgone`) AS Ratgone,
																  (std_material_quota.`Indostick`) AS Indostick,
																  (std_material_quota.`Organosilicon`) AS Organosilicon,
																  (std_material_quota.`Soda_Ash`) AS Soda_Ash,
																  (std_material_quota.`Sarineb`) AS Sarineb,
																  (std_material_quota.`Sorento`) AS Sorento,

																  (std_material_quota.`NPK_Haracoat`) AS NPK_Haracoat,
																  (std_material_quota.`Oksifluorfen`) AS Oksifluorfen
																FROM
																  std_material_quota
																WHERE std_material_quota.`kelas` = '$kelas'
																  AND std_material_quota.`umur` = '$umur'");

		return $query->row_array();
	}
	function set_lokasi_material_qouta($data){
		$set = implode("', '", $data);
		$query = $this->db->query("INSERT INTO perlocation_pm_material_qouta
																VALUES
																  (
																    '$set'
																  );");

		return true;
	}
	function del_lokasi_material_qouta(){
		$query = $this->db->query("TRUNCATE perlocation_pm_material_qouta;");

		return true;
	}

	function get_summary_material($w, $status, $jenis, $kelas, $tahun, $bulan, $umur, $type){
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
		switch ($type) {
			case 'Real':
				$resource = 'perlocation_pm_material_real';
			break;
			case 'Budget':
				$resource = 'perlocation_pm_material_budget';
			break;
			case 'Qouta':
				$resource = 'perlocation_pm_material_qouta';
			break;
		}
		$query = $this->db->query("SELECT
																  SUM($resource.`Urea`) AS Urea,
																  SUM($resource.`Urease`) AS Urease,
																  SUM($resource.`Za`) AS Za,
																  SUM($resource.`K2SO4`) AS K2SO4,
																  SUM($resource.`KCL`) AS KCL,
																  SUM($resource.`TSP`) AS TSP,
																  SUM($resource.`DAP`) AS DAP,
																  SUM($resource.`MgSO4`) AS MgSO4,
																  SUM($resource.`Kieserite`) AS Kieserite,
																  SUM($resource.`FeSO4`) AS FeSO4,

																  SUM($resource.`ZnSO4`) AS ZnSO4,
																  SUM($resource.`Dolomite`) AS Dolomite,
																  SUM($resource.`Gypsum`) AS Gypsum,
																  SUM($resource.`CuSO4`) AS CuSO4,
																  SUM($resource.`Borax`) AS Borax,
																  SUM($resource.`LOB`) AS LOB,
																  SUM($resource.`CaCl2`) AS CaCl2,
																  SUM($resource.`Calcibor`) AS Calcibor,
																  SUM($resource.`Kompos`) AS Kompos,
																  SUM($resource.`Belerang`) AS Belerang,

																  SUM($resource.`Kieserite_G`) AS Kieserite_G,
																  SUM($resource.`NPK`) AS NPK,
																  SUM($resource.`Petro_Cas`) AS Petro_Cas,
																  SUM($resource.`Fosetil`) AS Fosetil,
																  SUM($resource.`Metalaxil`) AS Metalaxil,
																  SUM($resource.`Propiconazole`) AS Propiconazole,
																  SUM($resource.`Prochloraz`) AS Prochloraz,
																  SUM($resource.`Mankozeb`) AS Mankozeb,
																  SUM($resource.`Folirfos`) AS Folirfos,
																  SUM($resource.`H3PO3`) AS H3PO3,

																  SUM($resource.`Detazeb`) AS Detazeb,
																  SUM($resource.`Bromacyl`) AS Bromacyl,
																  SUM($resource.`Diuron`) AS Diuron,
																  SUM($resource.`Glyphosate`) AS Glyphosate,
																  SUM($resource.`Quizalofop`) AS Quizalofop,
																  SUM($resource.`Ametrine`) AS Ametrine,
																  SUM($resource.`Bazza`) AS Bazza,
																  SUM($resource.`Tekasi`) AS Tekasi,
																  SUM($resource.`Tekila`) AS Tekila,
																  SUM($resource.`Chlorpyrifos`) AS Chlorpyrifos,

																  SUM($resource.`Sidazinon`) AS Sidazinon,
																  SUM($resource.`Propoxur`) AS Propoxur,
																  SUM($resource.`Cypermethrin`) AS Cypermethrin,
																  SUM($resource.`Bifentrin_EC`) AS Bifentrin_EC,
																  SUM($resource.`Bifentrin_G`) AS Bifentrin_G,
																  SUM($resource.`BPMC`) AS BPMC,
																  SUM($resource.`Clorpyrifos`) AS Clorpyrifos,
																  SUM($resource.`Abamectin`) AS Abamectin,
																  SUM($resource.`Sanisol`) AS Sanisol,
																  SUM($resource.`Ethylene`) AS Ethylene,

																  SUM($resource.`Ethepon`) AS Ethepon,
																  SUM($resource.`Kaolin`) AS Kaolin,
																  SUM($resource.`Zeolit`) AS Zeolit,
																  SUM($resource.`Rabas`) AS Rabas,
																  SUM($resource.`Ratgone`) AS Ratgone,
																  SUM($resource.`Indostick`) AS Indostick,
																  SUM($resource.`Organosilicon`) AS Organosilicon,
																  SUM($resource.`Soda_Ash`) AS Soda_Ash,
																  SUM($resource.`Sarineb`) AS Sarineb,
																  SUM($resource.`Sorento`) AS Sorento,

																  SUM($resource.`NPK_Haracoat`) AS NPK_Haracoat,
																  SUM($resource.`Oksifluorfen`) AS Oksifluorfen,
																	SUM(perlocation_lokasi.`luas`) AS luas,
																	SUM(perlocation_lokasi.`tonase`) AS tonase
																FROM
																  perlocation_lokasi
																  INNER JOIN $resource
																    ON perlocation_lokasi.`lokasi` = $resource.`lokasi`
																    AND perlocation_lokasi.`keterangan` = $resource.`keterangan`
																WHERE $pg_wil
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}function get_satuan_metarial(){
		$query = $this->db->query("SELECT
																  MAX(IF(help_master_material.`material` = 'Urea', help_master_material.`satuan`, NULL)) AS Urea,
																  MAX(IF(help_master_material.`material` = 'Urease', help_master_material.`satuan`, NULL)) AS Urease,
																  MAX(IF(help_master_material.`material` = 'Za', help_master_material.`satuan`, NULL)) AS Za,
																  MAX(IF(help_master_material.`material` = 'K2SO4', help_master_material.`satuan`, NULL)) AS K2SO4,
																  MAX(IF(help_master_material.`material` = 'KCL', help_master_material.`satuan`, NULL)) AS KCL,
																  MAX(IF(help_master_material.`material` = 'TSP', help_master_material.`satuan`, NULL)) AS TSP,
																  MAX(IF(help_master_material.`material` = 'DAP', help_master_material.`satuan`, NULL)) AS DAP,
																  MAX(IF(help_master_material.`material` = 'MgSO4', help_master_material.`satuan`, NULL)) AS MgSO4,
																  MAX(IF(help_master_material.`material` = 'Kieserite', help_master_material.`satuan`, NULL)) AS Kieserite,
																  MAX(IF(help_master_material.`material` = 'FeSO4', help_master_material.`satuan`, NULL)) AS FeSO4,

																  MAX(IF(help_master_material.`material` = 'ZnSO4', help_master_material.`satuan`, NULL)) AS ZnSO4,
																  MAX(IF(help_master_material.`material` = 'Dolomite', help_master_material.`satuan`, NULL)) AS Dolomite,
																  MAX(IF(help_master_material.`material` = 'Gypsum', help_master_material.`satuan`, NULL)) AS Gypsum,
																  MAX(IF(help_master_material.`material` = 'CuSO4', help_master_material.`satuan`, NULL)) AS CuSO4,
																  MAX(IF(help_master_material.`material` = 'Borax', help_master_material.`satuan`, NULL)) AS Borax,
																  MAX(IF(help_master_material.`material` = 'CaCl2', help_master_material.`satuan`, NULL)) AS CaCl2,
																  MAX(IF(help_master_material.`material` = 'Calcibor', help_master_material.`satuan`, NULL)) AS Calcibor,
																  MAX(IF(help_master_material.`material` = 'Belerang', help_master_material.`satuan`, NULL)) AS Belerang,
																  MAX(IF(help_master_material.`material` = 'Kieserite G', help_master_material.`satuan`, NULL)) AS Kieserite_G,
																  MAX(IF(help_master_material.`material` = 'NPK', help_master_material.`satuan`, NULL)) AS NPK,

																  MAX(IF(help_master_material.`material` = 'Petro Cas', help_master_material.`satuan`, NULL)) AS Petro_Cas,
																  MAX(IF(help_master_material.`material` = 'NPK Haracoat', help_master_material.`satuan`, NULL)) AS NPK_Haracoat,

																  MAX(IF(help_master_material.`material` = 'Bromacyl', help_master_material.`satuan`, NULL)) AS Bromacyl,
																  MAX(IF(help_master_material.`material` = 'Diuron', help_master_material.`satuan`, NULL)) AS Diuron,
																  MAX(IF(help_master_material.`material` = 'Glyphosate', help_master_material.`satuan`, NULL)) AS Glyphosate,
																  MAX(IF(help_master_material.`material` = 'Quizalofop', help_master_material.`satuan`, NULL)) AS Quizalofop,
																  MAX(IF(help_master_material.`material` = 'Ametrine', help_master_material.`satuan`, NULL)) AS Ametrine,
																  MAX(IF(help_master_material.`material` = 'Bazza', help_master_material.`satuan`, NULL)) AS Bazza,
																  MAX(IF(help_master_material.`material` = 'Oksifluorfen', help_master_material.`satuan`, NULL)) AS Oksifluorfen,

																  MAX(IF(help_master_material.`material` = 'Tekasi', help_master_material.`satuan`, NULL)) AS Tekasi,
																  MAX(IF(help_master_material.`material` = 'Tekila', help_master_material.`satuan`, NULL)) AS Tekila,
																  MAX(IF(help_master_material.`material` = 'Chlorpyrifos', help_master_material.`satuan`, NULL)) AS Chlorpyrifos,
																  MAX(IF(help_master_material.`material` = 'Sidazinon', help_master_material.`satuan`, NULL)) AS Sidazinon,
																  MAX(IF(help_master_material.`material` = 'Propoxur', help_master_material.`satuan`, NULL)) AS Propoxur,
																  MAX(IF(help_master_material.`material` = 'Cypermethrin', help_master_material.`satuan`, NULL)) AS Cypermethrin,
																  MAX(IF(help_master_material.`material` = 'Bifentrin EC', help_master_material.`satuan`, NULL)) AS Bifentrin_EC,
																  MAX(IF(help_master_material.`material` = 'Bifentrin G', help_master_material.`satuan`, NULL)) AS Bifentrin_G,
																  MAX(IF(help_master_material.`material` = 'BPMC', help_master_material.`satuan`, NULL)) AS BPMC,
																  MAX(IF(help_master_material.`material` = 'Clorpyrifos', help_master_material.`satuan`, NULL)) AS Clorpyrifos,

																  MAX(IF(help_master_material.`material` = 'Abamectin', help_master_material.`satuan`, NULL)) AS Abamectin,

																  MAX(IF(help_master_material.`material` = 'Fosetil', help_master_material.`satuan`, NULL)) AS Fosetil,
																  MAX(IF(help_master_material.`material` = 'Metalaxil', help_master_material.`satuan`, NULL)) AS Metalaxil,
																  MAX(IF(help_master_material.`material` = 'Propiconazole', help_master_material.`satuan`, NULL)) AS Propiconazole,
																  MAX(IF(help_master_material.`material` = 'Prochloraz', help_master_material.`satuan`, NULL)) AS Prochloraz,
																  MAX(IF(help_master_material.`material` = 'Mankozeb', help_master_material.`satuan`, NULL)) AS Mankozeb,
																  MAX(IF(help_master_material.`material` = 'Folirfos', help_master_material.`satuan`, NULL)) AS Folirfos,
																  MAX(IF(help_master_material.`material` = 'H3PO3', help_master_material.`satuan`, NULL)) AS H3PO3,
																  MAX(IF(help_master_material.`material` = 'Detazeb', help_master_material.`satuan`, NULL)) AS Detazeb,
																  MAX(IF(help_master_material.`material` = 'Sarineb', help_master_material.`satuan`, NULL)) AS Sarineb,
																  MAX(IF(help_master_material.`material` = 'Sorento', help_master_material.`satuan`, NULL)) AS Sorento,

																  MAX(IF(help_master_material.`material` = 'Soda_Ash', help_master_material.`satuan`, NULL)) AS Soda_Ash,
																  MAX(IF(help_master_material.`material` = 'Sanisol', help_master_material.`satuan`, NULL)) AS Sanisol,
																  MAX(IF(help_master_material.`material` = 'Kaolin', help_master_material.`satuan`, NULL)) AS Kaolin,
																  MAX(IF(help_master_material.`material` = 'Zeolit', help_master_material.`satuan`, NULL)) AS Zeolit,
																  MAX(IF(help_master_material.`material` = 'Ethepon', help_master_material.`satuan`, NULL)) AS Ethepon,
																  MAX(IF(help_master_material.`material` = 'Ethylene', help_master_material.`satuan`, NULL)) AS Ethylene,
																  MAX(IF(help_master_material.`material` = 'Ratgone', help_master_material.`satuan`, NULL)) AS Ratgone,
																  MAX(IF(help_master_material.`material` = 'Rabas', help_master_material.`satuan`, NULL)) AS Rabas,
																  MAX(IF(help_master_material.`material` = 'Indostick', help_master_material.`satuan`, NULL)) AS Indostick,
																  MAX(IF(help_master_material.`material` = 'Organosilicon', help_master_material.`satuan`, NULL)) AS Organosilicon,

																  MAX(IF(help_master_material.`material` = 'Kompos', help_master_material.`satuan`, NULL)) AS Kompos,
																  MAX(IF(help_master_material.`material` = 'LOB', help_master_material.`satuan`, NULL)) AS LOB,
																  SUM(1) AS Total
																FROM
																  help_master_material");

		return $query->row_array();
	}

	function get_summary_material_unsur($w, $status, $jenis, $kelas, $tahun, $bulan, $umur, $type){
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
																  perlocation_pm_material_real_total.`$type` / perlocation_lokasi.`luas` AS r,
																  perlocation_pm_material_budget_total.`$type` / perlocation_lokasi.`luas` AS budget,
																  (perlocation_pm_material_real_total.`$type` / perlocation_lokasi.`luas`) - (perlocation_pm_material_budget_total.`$type`) / (perlocation_lokasi.`luas`) AS over_m
																FROM
																  perlocation_lokasi
																  INNER JOIN perlocation_pm_material_real_total
																    ON perlocation_lokasi.`lokasi` = perlocation_pm_material_real_total.`lokasi`
																    AND perlocation_lokasi.`keterangan` = perlocation_pm_material_real_total.`keterangan`
   																	AND perlocation_pm_material_real_total.`$type` > 0
																  LEFT JOIN perlocation_pm_material_budget_total
																    ON perlocation_lokasi.`lokasi` = perlocation_pm_material_budget_total.`lokasi`
																    AND perlocation_lokasi.`keterangan` = perlocation_pm_material_budget_total.`keterangan`
																WHERE $pg_wil
																  AND perlocation_lokasi.`keterangan` = 'Rencana'
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur
																ORDER BY over_m DESC
																LIMIT 20");

		return $query->result();
	}

	function get_summary_material_lokasi($lokasi, $wilayah, $unsur, $sort){
		switch ($sort) {
			case 'Quantity':
				$sort = $wilayah.'.`resource`';
			break;
			case 'Tanggal':
				$sort = $wilayah.'.`tgl_realisasi`';
			break;
		}
		$query = $this->db->query("SELECT
																  $wilayah.`tgl_realisasi`,
																  TIMESTAMPDIFF(MONTH, perlocation_lokasi.`tgl_perawatan`, $wilayah.`tgl_realisasi`) AS umur,
																  $wilayah.`aktivitas_desc` AS deskripsi,
																  $wilayah.`resource` / perlocation_lokasi.`luas` AS quantity
																FROM
																  $wilayah,
																  help_master_material,
																  perlocation_lokasi
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`bahan_alat` = help_master_material.`code`
																  AND help_master_material.`material` = '$unsur'
																  AND $wilayah.`lokasi` = perlocation_lokasi.`lokasi`
																ORDER BY $sort DESC");

		return $query->result();
	}

	function get_summary_material_NPKMg($w, $status, $jenis, $kelas, $tahun, $bulan, $umur, $unsur, $type){
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
		switch ($type) {
			case 'Budget':
				$option_type = "perlocation_pm_material_budget";
			break;
			case 'Real':
				$option_type = "perlocation_pm_material_real";
			break;
		}
		switch ($unsur) {
			case 'NPKMg':
				$option_unsur = "((".$option_type.".`Urea` * 0.46) + (".$option_type.".`Za` * 0.21)+ (".$option_type.".`DAP` * 0.18))
												+ ((".$option_type.".`TSP` * 0.46) + (".$option_type.".`DAP` * 0.46))
												+ ((".$option_type.".`K2SO4` * 0.5) + (".$option_type.".`KCL` * 0.6))
												+ ((".$option_type.".`MgSO4` * 0.16) + (".$option_type.".`Kieserite` * 0.27) + (".$option_type.".`Dolomite` * 0.18))";
			break;
			case 'Nitrogen':
				$option_unsur = "((".$option_type.".`Urea` * 0.46) + (".$option_type.".`Za` * 0.21)+ (".$option_type.".`DAP` * 0.18))";
			break;
			case 'P2O5':
				$option_unsur = "((".$option_type.".`TSP` * 0.46) + (".$option_type.".`DAP` * 0.46))";
			break;
			case 'K2O':
				$option_unsur = "((".$option_type.".`K2SO4` * 0.5) + (".$option_type.".`KCL` * 0.6))";
			break;
			case 'MgO':
				$option_unsur = "((".$option_type.".`MgSO4` * 0.16) + (".$option_type.".`Kieserite` * 0.27) + (".$option_type.".`Dolomite` * 0.18))";
			break;
		}
		$query = $this->db->query("SELECT
																  SUM(IF($option_type.`umur` <= '1', $option_unsur, (NULL))) AS U1,
																  SUM(IF($option_type.`umur` = '2', $option_unsur, (NULL))) AS U2,
																  SUM(IF($option_type.`umur` = '3', $option_unsur, (NULL))) AS U3,
																  SUM(IF($option_type.`umur` = '4', $option_unsur, (NULL))) AS U4,
																  SUM(IF($option_type.`umur` = '5', $option_unsur, (NULL))) AS U5,
																  SUM(IF($option_type.`umur` = '6', $option_unsur, (NULL))) AS U6,
																  SUM(IF($option_type.`umur` = '7', $option_unsur, (NULL))) AS U7,
																  SUM(IF($option_type.`umur` = '8', $option_unsur, (NULL))) AS U8,
																  SUM(IF($option_type.`umur` = '9', $option_unsur, (NULL))) AS U9,
																  SUM(IF($option_type.`umur` = '10', $option_unsur, (NULL))) AS U10,
																  SUM(IF($option_type.`umur` = '11', $option_unsur, (NULL))) AS U11,
																  SUM(IF($option_type.`umur` = '12', $option_unsur, (NULL))) AS U12,
																  SUM(IF($option_type.`umur` = '13', $option_unsur, (NULL))) AS U13,
																  SUM(IF($option_type.`umur` = '14', $option_unsur, (NULL))) AS U14,
																  SUM(IF($option_type.`umur` = '15', $option_unsur, (NULL))) AS U15,
																  SUM(IF($option_type.`umur` = '16', $option_unsur, (NULL))) AS U16,
																  SUM(IF($option_type.`umur` = '17', $option_unsur, (NULL))) AS U17,
																  SUM(IF($option_type.`umur` = '18', $option_unsur, (NULL))) AS U18,
																  SUM(IF($option_type.`umur` = '19', $option_unsur, (NULL))) AS U19,
																  SUM(IF($option_type.`umur` = '20', $option_unsur, (NULL))) AS U20,
																  SUM(IF($option_type.`umur` >= '21', $option_unsur, (NULL))) AS U21
																FROM
																  perlocation_lokasi,
																  $option_type
																WHERE perlocation_lokasi.`lokasi` = $option_type.`lokasi`
																  AND $pg_wil
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																	AND perlocation_lokasi.`keterangan` = $option_type.`keterangan`
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}

	function get_summary_material_unsur_umur($w, $status, $jenis, $kelas, $tahun, $bulan, $umur, $unsur, $type){
		if(substr($w, 0, 2) == 'PG'){
			if($w != 'PG'){
				if($w != 'PG'){
					$pg_wil = "perlocation_lokasi.`pg` = '$w'";
				}
				else{
					$pg_wil = "perlocation_lokasi.`pg` LIKE 'PG%'";
				}
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
		switch ($type) {
			case 'Budget':
				$option_type = "perlocation_pm_material_budget";
			break;
			case 'Real':
				$option_type = "perlocation_pm_material_real";
			break;
		}
		$cek = explode(" ", $unsur);
		if(sizeof($cek) > 1){
			$unsur = $cek[0]."_".$cek[1];
		}
		$query = $this->db->query("SELECT
																  SUM(IF($option_type.`umur` <= '1', $option_type.`$unsur`, (NULL))) AS U1,
																  SUM(IF($option_type.`umur` = '2', $option_type.`$unsur`, (NULL))) AS U2,
																  SUM(IF($option_type.`umur` = '3', $option_type.`$unsur`, (NULL))) AS U3,
																  SUM(IF($option_type.`umur` = '4', $option_type.`$unsur`, (NULL))) AS U4,
																  SUM(IF($option_type.`umur` = '5', $option_type.`$unsur`, (NULL))) AS U5,
																  SUM(IF($option_type.`umur` = '6', $option_type.`$unsur`, (NULL))) AS U6,
																  SUM(IF($option_type.`umur` = '7', $option_type.`$unsur`, (NULL))) AS U7,
																  SUM(IF($option_type.`umur` = '8', $option_type.`$unsur`, (NULL))) AS U8,
																  SUM(IF($option_type.`umur` = '9', $option_type.`$unsur`, (NULL))) AS U9,
																  SUM(IF($option_type.`umur` = '10', $option_type.`$unsur`, (NULL))) AS U10,
																  SUM(IF($option_type.`umur` = '11', $option_type.`$unsur`, (NULL))) AS U11,
																  SUM(IF($option_type.`umur` = '12', $option_type.`$unsur`, (NULL))) AS U12,
																  SUM(IF($option_type.`umur` = '13', $option_type.`$unsur`, (NULL))) AS U13,
																  SUM(IF($option_type.`umur` = '14', $option_type.`$unsur`, (NULL))) AS U14,
																  SUM(IF($option_type.`umur` = '15', $option_type.`$unsur`, (NULL))) AS U15,
																  SUM(IF($option_type.`umur` = '16', $option_type.`$unsur`, (NULL))) AS U16,
																  SUM(IF($option_type.`umur` = '17', $option_type.`$unsur`, (NULL))) AS U17,
																  SUM(IF($option_type.`umur` = '18', $option_type.`$unsur`, (NULL))) AS U18,
																  SUM(IF($option_type.`umur` = '19', $option_type.`$unsur`, (NULL))) AS U19,
																  SUM(IF($option_type.`umur` = '20', $option_type.`$unsur`, (NULL))) AS U20,
																  SUM(IF($option_type.`umur` >= '21', $option_type.`$unsur`, (NULL))) AS U21
																FROM
																  perlocation_lokasi,
																  $option_type
																WHERE perlocation_lokasi.`lokasi` = $option_type.`lokasi`
																  AND $pg_wil
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																	AND perlocation_lokasi.`keterangan` = $option_type.`keterangan`
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}
	function get_summary_material_NPKMg_forcing($w, $status, $jenis, $kelas, $tahun, $bulan, $umur, $unsur, $type){
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
		switch ($type) {
			case 'Budget':
				$option_type = "perlocation_pm_material_budget";
			break;
			case 'Real':
				$option_type = "perlocation_pm_material_real";
			break;
		}
		switch ($unsur) {
			case 'NPKMg':
				$option_unsur = "((".$option_type.".`Urea` * 0.46) + (".$option_type.".`Za` * 0.21)+ (".$option_type.".`DAP` * 0.18))
												+ ((".$option_type.".`TSP` * 0.46) + (".$option_type.".`DAP` * 0.46))
												+ ((".$option_type.".`K2SO4` * 0.5) + (".$option_type.".`KCL` * 0.6))
												+ ((".$option_type.".`MgSO4` * 0.16) + (".$option_type.".`Kieserite` * 0.27) + (".$option_type.".`Dolomite` * 0.18))";
			break;
			case 'Nitrogen':
				$option_unsur = "((".$option_type.".`Urea` * 0.46) + (".$option_type.".`Za` * 0.21)+ (".$option_type.".`DAP` * 0.18))";
			break;
			case 'P2O5':
				$option_unsur = "((".$option_type.".`TSP` * 0.46) + (".$option_type.".`DAP` * 0.46))";
			break;
			case 'K2O':
				$option_unsur = "((".$option_type.".`K2SO4` * 0.5) + (".$option_type.".`KCL` * 0.6))";
			break;
			case 'MgO':
				$option_unsur = "((".$option_type.".`MgSO4` * 0.16) + (".$option_type.".`Kieserite` * 0.27) + (".$option_type.".`Dolomite` * 0.18))";
			break;
		}
		$query = $this->db->query("SELECT
																  SUM(IF($option_type.`umur_f` = '-7', $option_unsur, (NULL))) AS F1,
																  SUM(IF($option_type.`umur_f` = '-6', $option_unsur, (NULL))) AS F2,
																  SUM(IF($option_type.`umur_f` = '-5', $option_unsur, (NULL))) AS F3,
																  SUM(IF($option_type.`umur_f` = '-4', $option_unsur, (NULL))) AS F4,
																  SUM(IF($option_type.`umur_f` = '-3', $option_unsur, (NULL))) AS F5,
																  SUM(IF($option_type.`umur_f` = '-2', $option_unsur, (NULL))) AS F6,
																  SUM(IF($option_type.`umur_f` = '-1', $option_unsur, (NULL))) AS F7,
																  SUM(IF($option_type.`umur_f` = '0', $option_unsur, (NULL))) AS F8,
																  SUM(IF($option_type.`umur_f` = '1', $option_unsur, (NULL))) AS F9
																FROM
																  perlocation_lokasi,
																  $option_type
																WHERE perlocation_lokasi.`lokasi` = $option_type.`lokasi`
																  AND $pg_wil
																  AND perlocation_lokasi.`keterangan` = 'Rencana'
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																	AND perlocation_lokasi.`keterangan` = $option_type.`keterangan`
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}
	function get_summary_material_K2SO4_KCL($w, $status, $jenis, $kelas, $tahun, $bulan, $umur){
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
																  SUM(IF(perlocation_pm_material_real.`umur` <= '5', (perlocation_pm_material_real.`K2SO4`), (NULL))) AS K21,
																  SUM(IF(perlocation_pm_material_real.`umur` <= '5', (perlocation_pm_material_real.`KCL`), (NULL))) AS KC1,
																  SUM(IF(perlocation_pm_material_real.`umur` <= '5', (perlocation_pm_material_real.`K2SO4` + perlocation_pm_material_real.`KCL`), (NULL))) AS T1,
																  SUM(IF(perlocation_pm_material_real.`umur` > '5', IF(perlocation_pm_material_real.`umur_f` <= '-2', (perlocation_pm_material_real.`K2SO4`), (NULL)), (NULL))) AS K22,
																  SUM(IF(perlocation_pm_material_real.`umur` > '5', IF(perlocation_pm_material_real.`umur_f` <= '-2', (perlocation_pm_material_real.`KCL`), (NULL)), (NULL))) AS KC2,
																  SUM(IF(perlocation_pm_material_real.`umur` > '5', IF(perlocation_pm_material_real.`umur_f` <= '-2', (perlocation_pm_material_real.`K2SO4` + perlocation_pm_material_real.`KCL`), (NULL)), (NULL))) AS T2,
																  SUM(IF(perlocation_pm_material_real.`umur_f` > '-2', (perlocation_pm_material_real.`K2SO4`), (NULL))) AS K23,
																  SUM(IF(perlocation_pm_material_real.`umur_f` > '-2', (perlocation_pm_material_real.`KCL`), (NULL))) AS KC3,
																  SUM(IF(perlocation_pm_material_real.`umur_f` > '-2', (perlocation_pm_material_real.`K2SO4` + perlocation_pm_material_real.`KCL`), (NULL))) AS T3
																FROM
																  perlocation_lokasi,
																  perlocation_pm_material_real
																WHERE perlocation_lokasi.`lokasi` = perlocation_pm_material_real.`lokasi`
																  AND $pg_wil
																  AND perlocation_lokasi.`keterangan` = 'Rencana'
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																	AND perlocation_lokasi.`keterangan` = perlocation_pm_material_real.`keterangan`
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}

	function get_activity_lokasi_cek($lokasi, $keterangan){
		$query = $this->db->query("SELECT
																  perlocation_lokasi.*
																FROM
																  perlocation_lokasi
																WHERE perlocation_lokasi.`lokasi` = '$lokasi'
																  AND perlocation_lokasi.`keterangan` = '$keterangan'");

		return $query->row_array();
	}
	function get_activity_lokasi_cek_none($lokasi){
		$query = $this->db->query("SELECT
																  SUBSTRING(lokasi.`status`, 1, 4) AS status,
																  CEIL(TIMESTAMPDIFF(DAY, lokasi.`tgl_mulai_rawat`, konstanta.`nilai`) / (365.5 / 12)) AS umur,
																	lokasi.`luas`
																FROM
																  lokasi,
																  konstanta
																WHERE lokasi.`lokasi` = '$lokasi'
																  AND konstanta.`jenis` = 'TGL_TARIK_DATA'");

		return $query->row_array();
	}
	function get_activity_budget_lokasi($status, $umur, $activity){
		$resource = substr($status, 2, 3).'_'.$umur;
		$query = $this->db->query("SELECT
																  help_activity.`code_element_cost` AS element_cost_code,
																  help_activity.`desc_element_cost` AS element_cost_desc,
																  help_activity.`code_activity` AS activity_code,
																  help_activity.`desc_activity` AS activity_desc,
																  help_activity.`$resource` AS biaya
																FROM
																  help_activity
																WHERE help_activity.`code_activity` = '$activity'");

		return $query->row_array();
	}
	function get_activity_real($wilayah){
		$query = $this->db->query("SELECT
																  $wilayah.`lokasi`,
																  $wilayah.`act_grp` AS element_cost_code,
																  $wilayah.`activity_desc` AS element_cost_desc,
																  $wilayah.`aktivitas_code` AS activity_code,
																  $wilayah.`aktivitas_desc` AS activity_desc,
																  SUM($wilayah.`biaya_realisasi`) AS biaya
																FROM
																  $wilayah
																GROUP BY $wilayah.`lokasi`,
																  $wilayah.`aktivitas_code`
																ORDER BY $wilayah.`lokasi` ASC,
																  $wilayah.`act_grp` ASC,
  																$wilayah.`aktivitas_code` ASC");

		return $query->result();
	}
	function get_activity_real_panen($wilayah, $tahun){
		$query = $this->db->query("SELECT
																  $wilayah.`lokasi`,
																  $wilayah.`act_grp` AS element_cost_code,
																  $wilayah.`activity_desc` AS element_cost_desc,
																  $wilayah.`aktivitas_code` AS activity_code,
																  $wilayah.`aktivitas_desc` AS activity_desc,
																  SUM($wilayah.`biaya_realisasi`) AS biaya
																FROM
																  $wilayah
																WHERE SUBSTRING($wilayah.`bulan_panen`, 1, 4) = '$tahun'
																GROUP BY $wilayah.`lokasi`,
																  $wilayah.`aktivitas_code`
																ORDER BY $wilayah.`lokasi` ASC,
																  $wilayah.`act_grp` ASC,
  																$wilayah.`aktivitas_code` ASC");

		return $query->result();
	}
	function del_lokasi_activity_real(){
		$query = $this->db->query("TRUNCATE perlocation_pm_activity_real;");

		return true;
	}
	function set_lokasi_activity_real($data){
		$real = implode("', '", $data);
		$query = $this->db->query("INSERT INTO perlocation_pm_activity_real
																VALUES
																  (
																    '$real'
																  )");

		return true;
	}
	function del_lokasi_activity_over(){
		$query = $this->db->query("TRUNCATE perlocation_pm_activity_over;");

		return true;
	}
	function set_lokasi_activity_over($data){
		$over = implode("', '", $data);
		$query = $this->db->query("INSERT INTO perlocation_pm_activity_over
																VALUES
																  (
																    '$over'
																  )");

		return true;
	}

	function get_activity_budget($status, $umur){
		$resource = substr($status, 2, 3).'_'.$umur;
		$query = $this->db->query("SELECT
																  help_activity.`code_element_cost` AS element_cost_code,
																  help_activity.`desc_element_cost` AS element_cost_desc,
																  help_activity.`code_activity` AS activity_code,
																  help_activity.`desc_activity` AS activity_desc,
																  help_activity.`$resource` AS biaya
																FROM
																  help_activity
																-- WHERE help_activity.`code_element_cost` NOT IN ('ZN01', 'ZN02', 'ZN03', 'ZN15')");

		return $query->result();
	}
	function del_lokasi_activity_budget(){
		$query = $this->db->query("TRUNCATE perlocation_pm_activity_budget;");

		return true;
	}
	function set_lokasi_activity_budget($data){
		$budget = implode("', '", $data);
		$query = $this->db->query("INSERT INTO perlocation_pm_activity_budget
																VALUES
																  (
																    '$budget'
																  )");

		return true;
	}

	function get_activity_perlocation($w, $status, $jenis, $kelas, $tahun, $bulan, $umur, $ec, $type){
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
		switch ($type) {
			case 'Real':
				$oprtion_type = 'real';
				$view = "SUM(perlocation_pm_activity_".$oprtion_type.".`biaya`) AS biaya";
			break;
			case 'Budget':
				$oprtion_type = 'budget';
				$view = "SUM(perlocation_pm_activity_".$oprtion_type.".`biaya`) AS biaya";
			break;
			case 'Over':
				$oprtion_type = 'over';
				$view = "SUM(IF(perlocation_pm_activity_over.`over` = '1', 1, (NULL))) AS over_r,
								COUNT(perlocation_pm_activity_over.`activity_code`) AS jumlah";
			break;
		}
		$query = $this->db->query("SELECT
																  perlocation_pm_activity_".$oprtion_type.".`activity_code`,
																  perlocation_pm_activity_".$oprtion_type.".`activity_desc`,
																  $view
																FROM
																  perlocation_pm_activity_".$oprtion_type."
																  INNER JOIN perlocation_lokasi
																    ON perlocation_pm_activity_".$oprtion_type.".`lokasi` = perlocation_lokasi.`lokasi`
																    AND perlocation_pm_activity_".$oprtion_type.".`keterangan` = perlocation_lokasi.`keterangan`
																		$pg_wil
																		AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																		$option_status
																		$option_jenis
																		$option_kelas
																		$option_bulan
																		$option_umur
																WHERE perlocation_pm_activity_".$oprtion_type.".`element_cost_code` = '$ec'
																GROUP BY perlocation_pm_activity_".$oprtion_type.".`activity_code`");

		return $query->result();
	}
	function get_summary_activity($w, $status, $jenis, $kelas, $tahun, $bulan, $umur, $activity, $ec){
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
				$resource = "zn01";
			break;
			case 'ZN02':
				$resource = "zn02";
			break;
			case 'ZN03':
				$resource = "zn03";
			break;
			case 'ZN04':
				$resource = "zn04";
			break;
			case 'ZN05':
				$resource = "zn05";
			break;
			case 'ZN06':
				$resource = "zn06";
			break;
			case 'ZN07':
				$resource = "zn07";
			break;
			case 'ZN08':
				$resource = "zn08";
			break;
			case 'ZN09':
				$resource = "zn09";
			break;
			case 'ZN10':
				$resource = "zn10";
			break;
			case 'ZN11':
				$resource = "zn11";
			break;
			case 'ZN12':
				$resource = "zn12";
			break;
			case 'ZN13':
				$resource = "zn13";
			break;
			case 'ZN14':
				$resource = "zn14";
			break;
			case 'ZN15':
				$resource = "zn15";
			break;
		}
		$query = $this->db->query("SELECT
																  perlocation_lokasi.`lokasi`,
																  perlocation_lokasi.`status`,
																  perlocation_lokasi.`umur`,
																	perlocation_lokasi.`keterangan`,
																  perlocation_pm_activity_real.`biaya` / perlocation_lokasi.`luas` AS r,
																  perlocation_pm_activity_budget.`biaya` / perlocation_lokasi.`luas` AS budget,
																  (
																    (
																      perlocation_pm_activity_real.`biaya`
																    ) - (
																      perlocation_pm_activity_budget.`biaya`
																    )
																  ) / perlocation_lokasi.`luas` AS over_m
																FROM
																  perlocation_lokasi
																  INNER JOIN perlocation_pm_activity_real
																    ON perlocation_lokasi.`lokasi` = perlocation_pm_activity_real.`lokasi`
																    AND perlocation_lokasi.`keterangan` = perlocation_pm_activity_real.`keterangan`
																    AND perlocation_pm_activity_real.`biaya` > 0
																    AND perlocation_pm_activity_real.`activity_code` = '$activity'
																  LEFT JOIN perlocation_pm_activity_budget
																    ON perlocation_lokasi.`lokasi` = perlocation_pm_activity_budget.`lokasi`
																    AND perlocation_lokasi.`keterangan` = perlocation_pm_activity_budget.`keterangan`
																    AND perlocation_pm_activity_budget.`activity_code` = '$activity'
																WHERE $pg_wil
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																	$option_status
																	$option_jenis
																	$option_kelas
																	$option_bulan
																	$option_umur
																ORDER BY over_m DESC
																LIMIT 20");

		return $query->result();
	}
}
