<?php

class PopulasiAwal_model extends CI_Model
{

	function get_polulasi_tanam_lokasi($lokasi){
		$query = $this->db->query("SELECT
																  populasi_awal.`jumlah_total` AS populasi_tanam
																FROM
																  populasi_awal
																WHERE populasi_awal.`lokasi` = '$lokasi'");

		return $query->row_array();
	}
	function get_polulasi_tanam_wilayah($wilayah){
		$query = $this->db->query("SELECT
																  AVG(populasi_awal.`jumlah_total`) AS populasi_tanam
																FROM
																  populasi_awal,
																  help_lokasi_aktif
																WHERE help_lokasi_aktif.`wilayah` = '$wilayah'
																  AND help_lokasi_aktif.`lokasi_aktif` = populasi_awal.`lokasi`");

		return $query->row_array();
	}
	function get_polulasi_tanam_pg($pg){
		$query = $this->db->query("SELECT
																  AVG(populasi_awal.`jumlah_total`) AS populasi_tanam
																FROM
																  populasi_awal,
																  help_lokasi_aktif
																WHERE help_lokasi_aktif.`pg` = '$pg'
																  AND help_lokasi_aktif.`lokasi_aktif` = populasi_awal.`lokasi`");

		return $query->row_array();
	}
}
