<?php

class Coordinate_model extends CI_Model
{

	function get_coordinate_12($tahun){
		if($tahun != NULL){
			$filter_tahun = "AND YEAR(perlocation.`tgl_rencana_panen`) = '$tahun'";
		}
		else{
			$filter_tahun = "";
		}
		$query = $this->db->query("SELECT
																  lokasi_coordinate.*,
																  perlocation.`category_rp_per_ha`,
																  IF(ISNULL(perlocation.`luas`), lokasi.`luas`, perlocation.`luas`) AS luas,
																  IF(ISNULL(perlocation.`tonase`), NULL, perlocation.`tonase` / perlocation.`luas`) AS yield,
																	SUBSTRING(lokasi.`status`, 1, 4) AS status,
  																perlocation.`umur`,
																  lokasi.`kebun`
																FROM
																  lokasi_coordinate
																  LEFT JOIN perlocation
																  ON lokasi_coordinate.`lokasi` = perlocation.`lokasi`
																	$filter_tahun
																  LEFT JOIN lokasi
																  ON lokasi_coordinate.`lokasi` = lokasi.`lokasi`
																WHERE lokasi_coordinate.`pg` = 'PG1'
																   OR lokasi_coordinate.`pg` = 'PG2'
																ORDER BY lokasi_coordinate.`pg` ASC,
																  lokasi_coordinate.`wilayah` ASC,
																  lokasi_coordinate.`lokasi` ASC");

		return $query->result();
	}
	function get_coordinate_3($tahun){
		if($tahun != NULL){
			$filter_tahun = "AND YEAR(perlocation.`tgl_rencana_panen`) = '$tahun'";
		}
		else{
			$filter_tahun = "";
		}
		$query = $this->db->query("SELECT
																  lokasi_coordinate.*,
																  perlocation.`category_rp_per_ha`,
																  IF(ISNULL(perlocation.`luas`), lokasi.`luas`, perlocation.`luas`) AS luas,
																  IF(ISNULL(perlocation.`tonase`), NULL, perlocation.`tonase` / perlocation.`luas`) AS yield,
  																SUBSTRING(lokasi.`status`, 1, 4) AS status,
  																perlocation.`umur`,
																  lokasi.`kebun`
																FROM
																  lokasi_coordinate
																  LEFT JOIN perlocation
																  ON lokasi_coordinate.`lokasi` = perlocation.`lokasi`
																	$filter_tahun
																  LEFT JOIN lokasi
																  ON lokasi_coordinate.`lokasi` = lokasi.`lokasi`
																WHERE lokasi_coordinate.`pg` = 'PG3'
																ORDER BY lokasi_coordinate.`pg` ASC,
																  lokasi_coordinate.`wilayah` ASC,
																  lokasi_coordinate.`lokasi` ASC");

		return $query->result();
	}
	function get_coordinate_pg($pg, $tahun){
		if($tahun != NULL){
			$filter_tahun = "AND YEAR(perlocation.`tgl_rencana_panen`) = '$tahun'";
		}
		else{
			$filter_tahun = "";
		}
		$query = $this->db->query("SELECT
																  lokasi_coordinate.*,
																  perlocation.`category_rp_per_ha`,
																  IF(ISNULL(perlocation.`luas`), lokasi.`luas`, perlocation.`luas`) AS luas,
																  IF(ISNULL(perlocation.`tonase`), NULL, perlocation.`tonase` / perlocation.`luas`) AS yield,
  																SUBSTRING(lokasi.`status`, 1, 4) AS status,
  																perlocation.`umur`,
																  lokasi.`kebun`
																FROM
																  lokasi_coordinate
																  LEFT JOIN perlocation
																  ON lokasi_coordinate.`lokasi` = perlocation.`lokasi`
																	$filter_tahun
																  LEFT JOIN lokasi
																  ON lokasi_coordinate.`lokasi` = lokasi.`lokasi`
																WHERE lokasi_coordinate.`pg` = '$pg'
																ORDER BY lokasi_coordinate.`pg` ASC,
																  lokasi_coordinate.`wilayah` ASC,
																  lokasi_coordinate.`lokasi` ASC");

		return $query->result();
	}
	function get_coordinate_wilayah($wilayah, $tahun){
		if($tahun != NULL){
			$filter_tahun = "AND YEAR(perlocation.`tgl_rencana_panen`) = '$tahun'";
		}
		else{
			$filter_tahun = "";
		}
		$query = $this->db->query("SELECT
																  lokasi_coordinate.*,
																  perlocation.`category_rp_per_ha`,
																  IF(ISNULL(perlocation.`luas`), lokasi.`luas`, perlocation.`luas`) AS luas,
																  IF(ISNULL(perlocation.`tonase`), NULL, perlocation.`tonase` / perlocation.`luas`) AS yield,
  																SUBSTRING(lokasi.`status`, 1, 4) AS status,
  																perlocation.`umur`,
																  lokasi.`kebun`
																FROM
																  lokasi_coordinate
																  LEFT JOIN perlocation
																  ON lokasi_coordinate.`lokasi` = perlocation.`lokasi`
																	$filter_tahun
																  LEFT JOIN lokasi
																  ON lokasi_coordinate.`lokasi` = lokasi.`lokasi`
																WHERE lokasi_coordinate.`wilayah` = '$wilayah'
																ORDER BY lokasi_coordinate.`wilayah` ASC,
																  lokasi_coordinate.`lokasi` ASC");

		return $query->result();
	}
	function get_coordinate_lokasi($lokasi){
		$query = $this->db->query("SELECT
																  lokasi_coordinate.*,
																  perlocation.`category_rp_per_ha`,
																  IF(ISNULL(perlocation.`luas`), lokasi.`luas`, perlocation.`luas`) AS luas,
																  IF(ISNULL(perlocation.`tonase`), NULL, perlocation.`tonase` / perlocation.`luas`) AS yield,
  																SUBSTRING(lokasi.`status`, 1, 4) AS status,
  																perlocation.`umur`,
																  lokasi.`kebun`
																FROM
																  lokasi_coordinate
																  LEFT JOIN perlocation
																  ON lokasi_coordinate.`lokasi` = perlocation.`lokasi`
																  LEFT JOIN lokasi
																  ON lokasi_coordinate.`lokasi` = lokasi.`lokasi`
																WHERE lokasi_coordinate.`lokasi` = '$lokasi'
																ORDER BY lokasi_coordinate.`lokasi` ASC");

		return $query->row_array();
	}
	function get_coordinate_wilayah_center($wilayah){
		$query = $this->db->query("SELECT
																  wilayah_coordinate.*
																FROM
																  wilayah_coordinate
																WHERE wilayah_coordinate.`code` = '$wilayah'");

		return $query->row_array();
	}
	function get_coordinate_pg_center($pg){
		$query = $this->db->query("SELECT
																  plantation_group_coordinate.*
																FROM
																  plantation_group_coordinate
																WHERE plantation_group_coordinate.`code` = '$pg'");

		return $query->row_array();
	}
	function get_coordinate_wip_pm($w, $status, $kelas, $tahun, $bulan){
		if(substr($w, 0, 2) == 'PG'){
			$pg_wil = "lokasi_coordinate.`pg` = '$w'";
		}
		else{
			$pg_wil = "lokasi_coordinate.`wilayah` = '$w'";
		}
		if($status != 'NS'){
			$option_status = "perlocation.`status` = '$status'";
		}
		else{
			$option_status = "TRUE";
		}
		if($kelas != 'All'){
			$option_kelas = "perlocation.`kelas_bibit` = '$kelas'";
		}
		else{
			$option_kelas = "TRUE";
		}
		if($bulan != 'Total'){
			$option_bulan = "MONTH(perlocation.`tgl_rencana_panen`) = '$bulan'";
		}
		else{
			$option_bulan = "TRUE";
		}
		$query = $this->db->query("SELECT
																  lokasi_coordinate.*,
																  IF($option_status, IF($option_kelas, IF($option_bulan, perlocation.`category_rp_per_ha`, (NULL)), (NULL)), (NULL)) AS category_rp_per_ha,
																  IF(ISNULL(perlocation.`luas`), lokasi.`luas`, perlocation.`luas`) AS luas,
																  IF(ISNULL(perlocation.`tonase`), NULL, perlocation.`tonase` / perlocation.`luas`) AS yield,
																  SUBSTRING(lokasi.`status`, 1, 4) AS status,
																  perlocation.`umur`,
																  lokasi.`kebun`
																FROM
																  lokasi_coordinate
																  LEFT JOIN perlocation
																  ON lokasi_coordinate.`lokasi` = perlocation.`lokasi`
																  AND YEAR(perlocation.`tgl_rencana_panen`) = '$tahun'
																  LEFT JOIN lokasi
																  ON lokasi_coordinate.`lokasi` = lokasi.`lokasi`
																WHERE $pg_wil
																ORDER BY lokasi_coordinate.`wilayah` ASC,
																  lokasi_coordinate.`lokasi` ASC");

		return $query->result();
	}
	function get_coordinate_pm($w, $status, $jenis, $kelas, $tahun, $bulan, $umur){
		if(substr($w, 0, 2) == 'PG'){
			$pg_wil = "lokasi_coordinate.`pg` = '$w'";
		}
		else{
			$pg_wil = "lokasi_coordinate.`wilayah` = '$w'";
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
																  lokasi_coordinate.*,
																	perlocation_pm_cost.`performance`,
																  lokasi.`luas`,
																  IF(ISNULL(perlocation_lokasi.`tonase`), NULL, perlocation_lokasi.`tonase` / perlocation_lokasi.`luas`) AS yield,
  																SUBSTRING(lokasi.`status`, 1, 4) AS status,
  																perlocation_lokasi.`umur`,
																  lokasi.`kebun`
																FROM
																  lokasi_coordinate
																  LEFT JOIN perlocation_lokasi
																  ON lokasi_coordinate.`lokasi` = perlocation_lokasi.`lokasi`
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																	AND (perlocation_lokasi.`keterangan`) = 'Rencana'
																	$option_status
																	$option_jenis
																	$option_kelas
																	$option_bulan
																	$option_umur
																  LEFT JOIN lokasi
																  ON lokasi_coordinate.`lokasi` = lokasi.`lokasi`
																  LEFT JOIN perlocation_pm_cost
																  ON lokasi_coordinate.`lokasi` = perlocation_pm_cost.`lokasi`
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																	AND (perlocation_lokasi.`keterangan`) = 'Rencana'
																	$option_status
																	$option_jenis
																	$option_kelas
																	$option_bulan
																	$option_umur
																WHERE $pg_wil
																ORDER BY lokasi_coordinate.`pg` ASC,
																  lokasi_coordinate.`wilayah` ASC,
																  lokasi_coordinate.`lokasi` ASC");

		return $query->result();
	}
	function get_coordinate_pm_lokasi($w){
		$query = $this->db->query("SELECT
																  lokasi_coordinate.*,
																	perlocation_pm_cost.`performance`,
																  lokasi.`luas`,
																  IF(ISNULL(perlocation_lokasi.`tonase`), NULL, perlocation_lokasi.`tonase` / perlocation_lokasi.`luas`) AS yield,
  																SUBSTRING(lokasi.`status`, 1, 4) AS status,
  																perlocation_lokasi.`umur`,
																  lokasi.`kebun`
																FROM
																  lokasi_coordinate
																  LEFT JOIN perlocation_lokasi
																  ON lokasi_coordinate.`lokasi` = perlocation_lokasi.`lokasi`
																  LEFT JOIN lokasi
																  ON lokasi_coordinate.`lokasi` = lokasi.`lokasi`
																  LEFT JOIN perlocation_pm_cost
																  ON lokasi_coordinate.`lokasi` = perlocation_pm_cost.`lokasi`
																WHERE lokasi_coordinate.`lokasi` = '$w'
																ORDER BY lokasi_coordinate.`pg` ASC,
																  lokasi_coordinate.`wilayah` ASC,
																  lokasi_coordinate.`lokasi` ASC");

		return $query->row_array();
	}
	function get_coordinate_hpp($w, $status, $jenis, $kelas, $tahun, $bulan){
		if(substr($w, 0, 2) == 'PG'){
			$pg_wil = "lokasi_coordinate.`pg` = '$w'";
		}
		else{
			$pg_wil = "lokasi_coordinate.`wilayah` = '$w'";
		}
		if($status != 'NS'){
			$option_status = "AND produksi_all.`status` = '$status'";
		}
		else{
			$option_status = "";
		}
		if($jenis != 'All'){
			$option_jenis = "AND produksi_all.`jenis` = '$jenis'";
		}
		else{
			$option_jenis = "";
		}
		if($kelas != 'All'){
			$option_kelas = "AND produksi_all.`kelas` = '$kelas'";
		}
		else{
			$option_kelas = "";
		}
		if($bulan != 'Total'){
			$option_bulan = "AND MONTH(produksi_all.`real_dan_sisa_rencana_tgl_selesai_panen`) = '$bulan'";
		}
		else{
			$option_bulan = "";
		}
		$query = $this->db->query("SELECT
																  lokasi_coordinate.*,
																	perlocation_hpp_cost.`performance`,
																  lokasi.`luas`,
																  IF(ISNULL(produksi_all.`real_dan_sisa_rencana_tonase`), NULL, produksi_all.`real_dan_sisa_rencana_tonase` / produksi_all.`real_dan_sisa_rencana_luas`) AS yield,
  																SUBSTRING(lokasi.`status`, 1, 4) AS status,
																  lokasi.`kebun`
																FROM
																  lokasi_coordinate
																  LEFT JOIN produksi_all
																  ON lokasi_coordinate.`lokasi` = produksi_all.`lokasi`
																	AND produksi_all.`tahun_panen` = '$tahun'
																	$option_status
																	$option_jenis
																	$option_kelas
																	$option_bulan
																  LEFT JOIN lokasi
																  ON lokasi_coordinate.`lokasi` = lokasi.`lokasi`
																  LEFT JOIN perlocation_hpp_cost
																  ON lokasi_coordinate.`lokasi` = perlocation_hpp_cost.`lokasi`
																	AND perlocation_hpp_cost.`tahun_panen` = '$tahun'
																	$option_status
																	$option_jenis
																	$option_kelas
																	$option_bulan
																WHERE $pg_wil
																ORDER BY lokasi_coordinate.`pg` ASC,
																  lokasi_coordinate.`wilayah` ASC,
																  lokasi_coordinate.`lokasi` ASC");

		return $query->result();
	}
	function get_coordinate_hpp_lokasi($w, $tahun){
		$query = $this->db->query("SELECT
																  lokasi_coordinate.*,
																	perlocation_hpp_cost.`performance`,
																  lokasi.`luas`,
																  IF(ISNULL(produksi_all.`real_dan_sisa_rencana_tonase`), NULL, produksi_all.`real_dan_sisa_rencana_tonase` / produksi_all.`real_dan_sisa_rencana_luas`) AS yield,
  																SUBSTRING(lokasi.`status`, 1, 4) AS status,
																  lokasi.`kebun`
																FROM
																  lokasi_coordinate
																  LEFT JOIN produksi_all
																  ON lokasi_coordinate.`lokasi` = produksi_all.`lokasi`
																	AND produksi_all.`tahun_panen` = '$tahun'
																  LEFT JOIN lokasi
																  ON lokasi_coordinate.`lokasi` = lokasi.`lokasi`
																  LEFT JOIN perlocation_hpp_cost
																  ON lokasi_coordinate.`lokasi` = perlocation_hpp_cost.`lokasi`
																WHERE lokasi_coordinate.`lokasi` = '$w'
																ORDER BY lokasi_coordinate.`pg` ASC,
																  lokasi_coordinate.`wilayah` ASC,
																  lokasi_coordinate.`lokasi` ASC");

		return $query->row_array();
	}
}
