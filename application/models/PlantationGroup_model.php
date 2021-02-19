<?php

class PlantationGroup_model extends CI_Model
{

	function get_plantation_group_pg($pg){
		if($pg != 'PG'){
			$pg_wil = "code = '$pg'";
		}
		else{
			$pg_wil = "code LIKE 'PG%'";
		}
		$query = $this->db->query("SELECT
                                  *
                                FROM
                                  plantation_group
                                WHERE code = '$pg'");

		return $query->row_array();
	}

	function get_plantation_group_all(){
		$query = $this->db->query("SELECT
                                  *
                                FROM
                                  plantation_group");

		return $query->result();
	}
	function get_proporsi_luas_pg($pg){
		$query = $this->db->query("SELECT
																	SUM(IF(SUBSTRING(lokasi.`status`,1,4) = 'NSFC', IF(ISNULL(produksi.`real_dan_sisa_rencana_luas`), lokasi.`luas`, produksi.`real_dan_sisa_rencana_luas`), 0)) AS nsfc,
																	SUM(IF(SUBSTRING(lokasi.`status`,1,4) = 'NSSC', IF(ISNULL(produksi.`real_dan_sisa_rencana_luas`), lokasi.`luas`, produksi.`real_dan_sisa_rencana_luas`), 0)) AS nssc,
																	SUM(IF(SUBSTRING(lokasi.`status`,1,4) = 'NSFC', IF(ISNULL(produksi.`real_dan_sisa_rencana_luas`), lokasi.`luas`, produksi.`real_dan_sisa_rencana_luas`), 0) + IF(SUBSTRING(lokasi.`status`,1,4) = 'NSSC', IF(ISNULL(produksi.`real_dan_sisa_rencana_luas`), lokasi.`luas`, produksi.`real_dan_sisa_rencana_luas`), 0)) AS total
																FROM
																  lokasi,
																  help_lokasi_aktif
																  LEFT JOIN produksi
																  ON produksi.`lokasi` = help_lokasi_aktif.`lokasi_aktif`
																WHERE help_lokasi_aktif.`pg` = '$pg'
																  AND help_lokasi_aktif.`lokasi_aktif` = lokasi.`lokasi`");

		return $query->row_array();
	}
	function get_kondisi_drainase_pg($pg){
		$query = $this->db->query("SELECT
																  SUM(IF(drainase.`value` = 'Berat', 1, 0)) AS berat,
																  SUM(IF(drainase.`value` = 'Sedang', 1, 0)) AS sedang,
																  SUM(IF(drainase.`value` = 'Ringan', 1, 0)) AS ringan,
																  SUM(
																    IF(drainase.`value` = 'Berat', 1, 0) +
																    IF(drainase.`value` = 'Sedang', 1, 0) +
																    IF(drainase.`value` = 'Ringan', 1, 0)
																  ) AS total
																FROM
																  help_lokasi_aktif
																LEFT JOIN drainase
																ON help_lokasi_aktif.`lokasi_aktif` = drainase.`lokasi`
																WHERE help_lokasi_aktif.`pg` = '$pg'");

		return $query->row_array();
	}

	function get_luas_tonase_pg($pg, $status, $jenis, $kelas, $tahun, $bulan, $umur){
		if($pg != 'PG'){
			$option_pg = "perlocation_lokasi.`pg` = '$pg'";
		}
		else{
			$option_pg = "perlocation_lokasi.`pg` LIKE 'PG%'";
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
																  SUM(perlocation_lokasi.`luas`) AS luas,
																  SUM(perlocation_lokasi.`tonase`) AS tonase
																FROM
																  perlocation_lokasi
																WHERE $option_pg
																  AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																	$option_status
																	$option_jenis
																	$option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}

	function get_proporsi_ratun_pg($w, $status, $jenis, $kelas, $tahun, $bulan, $umur){
		if($w != 'PG'){
			$pg_wil = "perlocation_lokasi.`pg` = '$w'";
		}
		else{
			$pg_wil = "perlocation_lokasi.`pg` LIKE 'PG%'";
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
																  SUM(IF(perlocation_lokasi.`status` = 'NSFC', 1, (NULL))) AS NSFC,
																  SUM(IF(perlocation_lokasi.`status` = 'NSSC', 1, (NULL))) AS NSSC
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

	function get_umur_lokasi_pg($w, $status, $jenis, $kelas, $tahun, $bulan, $umur){
		if($w != 'PG'){
			$pg_wil = "perlocation_lokasi.`pg` = '$w'";
		}
		else{
			$pg_wil = "perlocation_lokasi.`pg` LIKE 'PG%'";
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
																  SUM(IF(perlocation_lokasi.`umur` < 5, 1, (NULL))) AS U1,
																  SUM(IF((perlocation_lokasi.`umur` >= 5) AND (perlocation_lokasi.`umur` < 10), 1, (NULL))) AS U2,
																  SUM(IF((perlocation_lokasi.`umur` >= 10) AND (perlocation_lokasi.`umur` < 19), 1, (NULL))) AS U3,
																  SUM(IF((perlocation_lokasi.`umur` >= 19) AND (perlocation_lokasi.`umur` < 24), 1, (NULL))) AS U4
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
}
