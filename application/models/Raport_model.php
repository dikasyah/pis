<?php

class Raport_model extends CI_Model
{

	function get_raport_category($category){
		$query = $this->db->query("SELECT
																  *
																FROM
																  help_raport
																WHERE category = '$category'");

		return $query->result();
	}

	function set_luas_wilayah($wilayah, $status, $bulan, $tahun, $luas){
		$query = $this->db->query("UPDATE
																  luas_tonase_wilayah
																SET
																  luas = '$luas'
																WHERE wilayah = '$wilayah'
																  AND status = '$status'
																  AND bulan = '$bulan'
																  AND tahun = '$tahun'");

		return $query;
	}
	function set_tonase_wilayah($wilayah, $status, $bulan, $tahun, $tonase){
		$query = $this->db->query("UPDATE
																  luas_tonase_wilayah
																SET
																  tonase = '$tonase'
																WHERE wilayah = '$wilayah'
																  AND status = '$status'
																  AND bulan = '$bulan'
																  AND tahun = '$tahun'");

		return $query;
	}
	function get_luas_tonase_wilayah($wilayah, $status, $bulan, $tahun){
		if($status != 'NS'){
			$status_where = "AND status = '$status'";
		}
		else{
			$status_where = "";
		}
		if($bulan != 'Total'){
			$bulan_where = "AND bulan = '$bulan'";
		}
		else{
			$bulan_where = "";
		}
		$query = $this->db->query("SELECT
																  SUM(luas_tonase_lokasi.`luas`) AS luas,
																  SUM(luas_tonase_lokasi.`tonase`) AS tonase
																FROM
																  luas_tonase_lokasi
																WHERE wilayah = '$wilayah'
																  $status_where
																  $bulan_where
																  AND tahun = '$tahun'");

		return $query->row_array();
	}
	function get_luas_tonase_pg($pg, $status, $bulan, $tahun){
		if($pg != 'PG'){
			$option_pg = "pg = '$pg'";
		}
		else{
			$option_pg = "pg LIKE '$pg%'";
		}
		if($status != 'NS'){
			$status_where = "AND status = '$status'";
		}
		else{
			$status_where = "";
		}
		if($bulan != 'Total'){
			$bulan_where = "AND bulan = '$bulan'";
		}
		else{
			$bulan_where = "";
		}
		$query = $this->db->query("SELECT
																  SUM(luas_tonase_lokasi.`luas`) AS luas,
																  SUM(luas_tonase_lokasi.`tonase`) AS tonase
																FROM
																  luas_tonase_lokasi
																WHERE $option_pg
																  $status_where
																  $bulan_where
																  AND tahun = '$tahun'");

		return $query->row_array();
	}
	// function set_real_wilayah($wilayah, $status, $bulan, $tahun, $charge, $jenis, $real){
	// 	$query = $this->db->query("UPDATE
	// 															  raport_wilayah
	// 															SET
	// 															  raport_wilayah.real = '$real'
	// 															WHERE wilayah = '$wilayah'
	// 															  AND status = '$status'
	// 															  AND bulan = '$bulan'
	// 															  AND tahun = '$tahun'
	// 															  AND charge = '$charge'
	// 															  AND code = '$jenis'");
	//
	// 	return $query;
	// }
	function set_forecast_wilayah($wilayah, $status, $bulan, $tahun, $charge, $jenis, $forecast){
		$query = $this->db->query("UPDATE
																  raport_wilayah
																SET
																  forecast = '$forecast'
																WHERE wilayah = '$wilayah'
																  AND status = '$status'
																  AND bulan = '$bulan'
																  AND tahun = '$tahun'
																  AND charge = '$charge'
																  AND code = '$jenis'");

		return $query;
	}
	function get_real_forecast_wilayah($wilayah, $status, $bulan, $tahun, $charge){
		if($status != 'NS'){
			$status_where = "AND status = '$status'";
		}
		else{
			$status_where = "";
		}
		if($bulan != 'Total'){
			$bulan_where = "AND bulan = '$bulan'";
		}
		else{
			$bulan_where = "";
		}
		$query = $this->db->query("SELECT
																  code,
																  SUM(raport_lokasi.`real`) AS real_,
																  SUM(raport_lokasi.`forecast`) AS forecast
																FROM
																  raport_lokasi
																WHERE wilayah = '$wilayah'
																	$status_where
																  $bulan_where
																  AND tahun = '$tahun'
																  AND charge = '$charge'
																GROUP BY code");

		return $query->result();
	}
	function get_real_forecast_pg($pg, $status, $bulan, $tahun, $charge){
		if($pg != 'PG'){
			$option_pg = "pg = '$pg'";
		}
		else{
			$option_pg = "pg LIKE '$pg%'";
		}
		if($status != 'NS'){
			$status_where = "AND status = '$status'";
		}
		else{
			$status_where = "";
		}
		if($bulan != 'Total'){
			$bulan_where = "AND bulan = '$bulan'";
		}
		else{
			$bulan_where = "";
		}
		$query = $this->db->query("SELECT
																  code,
																  SUM(raport_lokasi.`real`) AS real_,
																  SUM(raport_lokasi.`forecast`) AS forecast
																FROM
																  raport_lokasi
																WHERE $option_pg
																	$status_where
																  $bulan_where
																  AND tahun = '$tahun'
																  AND charge = '$charge'
																GROUP BY code");

		return $query->result();
	}

	function get_perlocation_wilayah($wilayah, $category_ha, $category_kg){
		if($category_ha != NULL){
			$cat_ha = "AND perlocation.`category_rp_per_ha` = '$category_ha'";
		}
		else{
			$cat_ha = "";
		}
		if($category_kg != NULL){
			$cat_kg = "AND perlocation.`category_rp_per_kg` = '$category_kg'";
		}
		else{
			$cat_kg = "";
		}
		$query = $this->db->query("SELECT
															  perlocation.*,
															  sumber_air.`titik_air`,
															  sumber_air.`sumber_air`
															FROM
															  perlocation
															  LEFT JOIN sumber_air
															  ON perlocation.`lokasi` = sumber_air.`lokasi`
															WHERE perlocation.`wilayah`= '$wilayah'
																  $cat_ha
																	$cat_kg
															ORDER BY perlocation.`lokasi` ASC");

		return $query->result();
	}
	function get_perlocation_pg($pg, $category_ha, $category_kg){
		if($category_ha != NULL){
			$cat_ha = "AND perlocation.`category_rp_per_ha` = '$category_ha'";
		}
		else{
			$cat_ha = "";
		}
		if($category_kg != NULL){
			$cat_kg = "AND perlocation.`category_rp_per_kg` = '$category_kg'";
		}
		else{
			$cat_kg = "";
		}
		$query = $this->db->query("SELECT
															  perlocation.*,
															  sumber_air.`titik_air`,
															  sumber_air.`sumber_air`
															FROM
															  perlocation
															  LEFT JOIN sumber_air
															  ON perlocation.`lokasi` = sumber_air.`lokasi`
															WHERE perlocation.`pg`= '$pg'
																  $cat_ha
																	$cat_kg
															ORDER BY perlocation.`lokasi` ASC");

		return $query->result();
	}
	function get_perlocation($w, $category_ha, $category_kg){
		if(substr($w, 0, 2) == 'PG'){
			$pg_wil = "perlocation.`pg` = '$w'";
		}
		else{
			$pg_wil = "perlocation.`wilayah` = '$w'";
		}
		if($category_ha != NULL){
			$cat_ha = "AND perlocation.`category_rp_per_ha` = '$category_ha'";
		}
		else{
			$cat_ha = "";
		}
		if($category_kg != NULL){
			$cat_kg = "AND perlocation.`category_rp_per_kg` = '$category_kg'";
		}
		else{
			$cat_kg = "";
		}
		$query = $this->db->query("SELECT
															  perlocation.*,
															  sumber_air.`titik_air`,
															  sumber_air.`sumber_air`
															FROM
															  perlocation
															  LEFT JOIN sumber_air
															  ON perlocation.`lokasi` = sumber_air.`lokasi`
															WHERE $pg_wil
																  $cat_ha
																	$cat_kg
															ORDER BY perlocation.`lokasi` ASC");

		return $query->result();
	}
	function set_real_lokasi($pg, $wilayah, $lokasi, $status, $bulan, $tahun, $charge, $jenis, $real, $forecast){
		$query = $this->db->query("INSERT INTO raport_lokasi
																VALUES
																  (
																    '$pg',
																    '$wilayah',
																    '$lokasi',
																    '$status',
																    '$bulan',
																    '$tahun',
																    '$charge',
																    '$jenis',
																    '$real',
																    '$forecast'
																  )");

		return $query;
	}

	function set_cek_lokasi($pg, $wilayah, $lokasi, $status, $bulan, $tahun, $code, $over){
		$query = $this->db->query("INSERT INTO cek_lokasi
																VALUES
																  (
																    '$pg',
																    '$wilayah',
																    '$lokasi',
																    '$status',
																    '$bulan',
																    '$tahun',
																    '$code',
																    '$over',
																		NULL,
																		NULL
																  )");

		return $query;
	}
	function set_luas_tonase_lokasi($pg, $wilayah, $lokasi, $status, $bulan, $tahun, $luas, $tonase){
		$query = $this->db->query("INSERT INTO luas_tonase_lokasi
																VALUES
																  (
																    '$pg',
																    '$wilayah',
																    '$lokasi',
																    '$status',
																    '$bulan',
																    '$tahun',
																    '$luas',
																    '$tonase'
																  )");

		return $query;
	}
}
