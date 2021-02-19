<?php

class Wilayah_model extends CI_Model
{

	function get_wilayah_pg($pg){
		$query = $this->db->query("SELECT
                                  *
                                FROM
                                  wilayah
                                WHERE plantation_group = '$pg'");

		return $query->result();
	}

	function get_wilayah_all(){
		$query = $this->db->query("SELECT
                                  *
                                FROM
                                  wilayah");

		return $query->result();
	}

	function get_wilayah_code($w){
		$query = $this->db->query("SELECT
                                  *
                                FROM
                                  wilayah
                                WHERE code = '$w'");

		return $query->row_array();
	}
	function get_proporsi_luas_wilayah($w){
		$query = $this->db->query("SELECT
																  SUM(IF(SUBSTRING(lokasi.`status`,1,4) = 'NSFC', lokasi.`luas`, 0)) AS nsfc,
																  SUM(IF(SUBSTRING(lokasi.`status`,1,4) = 'NSSC', lokasi.`luas`, 0)) AS nssc,
																  SUM(IF(SUBSTRING(lokasi.`status`,1,4) = 'NSFC', lokasi.`luas`, 0) + IF(SUBSTRING(lokasi.`status`,1,4) = 'NSSC', lokasi.`luas`, 0)) AS total
																FROM
																  help_lokasi_aktif
																LEFT JOIN lokasi
																ON help_lokasi_aktif.`lokasi_aktif` = lokasi.`lokasi`
																WHERE help_lokasi_aktif.`wilayah` = '$w'");

		return $query->row_array();
	}
	function get_kondisi_drainase_wilayah($w){
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
																WHERE help_lokasi_aktif.`wilayah` = '$w'");

		return $query->row_array();
	}

	function get_biaya_umur_wilayah($w, $data_master){
		$query = $this->db->query("SELECT
																  CEIL(TIMESTAMPDIFF(DAY, lokasi.`tgl_mulai_rawat`, konstanta.`nilai`) / 30.4583333333333) AS umur,
																  SUM(IF(lokasi.`status` LIKE 'NSFC%', $data_master.`biaya_realisasi`, 0)) AS biaya_realisasi_nsfc,
																  SUM(IF(lokasi.`status` LIKE 'NSSC%', $data_master.`biaya_realisasi`, 0)) AS biaya_realisasi_nssc,
																  SUM(DISTINCT(IF(lokasi.`status` LIKE 'NSFC%', lokasi.`luas`, 0))) AS luas_nsfc,
																  SUM(DISTINCT(IF(lokasi.`status` LIKE 'NSSC%', lokasi.`luas`, 0))) AS luas_nssc
																FROM
																  $data_master,
																  konstanta,
																  lokasi
																  RIGHT JOIN help_lokasi_aktif
																    ON lokasi.`lokasi` = help_lokasi_aktif.`lokasi_aktif`
																WHERE help_lokasi_aktif.`wilayah` = '$w'
																  AND $data_master.`jenis_data` != '3X'
																  AND $data_master.`jenis_data` != '7'
																  AND $data_master.`lokasi` = lokasi.`lokasi`
																  AND konstanta.`jenis` = 'TGL_TARIK_DATA'
																GROUP BY CEIL(TIMESTAMPDIFF(DAY, lokasi.`tgl_mulai_rawat`, konstanta.`nilai`) / 30.4583333333333)
																ORDER BY CEIL(TIMESTAMPDIFF(DAY, lokasi.`tgl_mulai_rawat`, konstanta.`nilai`) / 30.4583333333333) ASC");

		return $query->result();
	}
}
