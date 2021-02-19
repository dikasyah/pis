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
}
