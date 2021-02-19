<?php

class Irrigation_model extends CI_Model
{

	function get_irrigation_code($lokasi){
		$query = $this->db->query("SELECT
																  irrigation.*
																FROM
																  irrigation, lokasi
																WHERE irrigation.`lokasi` = '$lokasi'
																AND irrigation.`lokasi` = lokasi.`lokasi`
																AND irrigation.`tanggal` > lokasi.`tgl_mulai_rawat`");

		return $query->result();
	}
}
