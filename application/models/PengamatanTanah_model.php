<?php

class PengamatanTanah_model extends CI_Model
{

	function get_pengamatan_tanah_code_desc($lokasi){
		$query = $this->db->query("SELECT
																  *
																FROM
																  pengamatan_tanah
																WHERE lokasi = '$lokasi'
																ORDER BY tgl_terima_sampel DESC,
																  nomor_pengamatan DESC
																LIMIT 1");

		return $query->row_array();
	}

	function get_pengamatan_tanah_code($lokasi){
		$query = $this->db->query("SELECT
																  *
																FROM
																  pengamatan_tanah
																WHERE lokasi = '$lokasi'");

		return $query->result();
	}
}
