<?php

class StdBiayaUmur_model extends CI_Model
{

	function get_biaya_umur_code($lokasi, $data_master){
		$query = $this->db->query("SELECT
																  TIMESTAMPDIFF(MONTH, lokasi.`tgl_mulai_rawat`, $data_master.`tgl_realisasi`) + 1 AS umur,
																  SUM($data_master.`biaya_realisasi`) / lokasi.`luas` AS biaya_realisasi
																FROM
																  lokasi,
																  $data_master
																WHERE lokasi.`lokasi` = '$lokasi'
																	AND $data_master.`jenis_data` != '3X'
																	AND $data_master.`jenis_data` != '7'
																	AND $data_master.`lokasi` = lokasi.`lokasi`
																GROUP BY TIMESTAMPDIFF(MONTH, lokasi.`tgl_mulai_rawat`, $data_master.`tgl_realisasi`) + 1
																ORDER BY $data_master.`tgl_realisasi` ASC");

		return $query->result();
	}
	function get_std_biaya_umur_code($jenis){
		$query = $this->db->query("SELECT
																  std_biaya_umur.`umur`,
																  std_biaya_umur.`biaya`
																FROM
																  std_biaya_umur
																WHERE std_biaya_umur.`status` = '$jenis'");

		return $query->result();
	}
	function get_std_biaya_umur_wilayah($jenis){
		$query = $this->db->query("SELECT
																  std_biaya_umur.`umur`,
																  std_biaya_umur.`biaya`
																FROM
																  std_biaya_umur
																WHERE std_biaya_umur.`status` = '$jenis'
																  AND std_biaya_umur.`umur` != '0'");

		return $query->result();
	}
}
