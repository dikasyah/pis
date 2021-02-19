<?php

class HistoriPanen_model extends CI_Model
{

	function get_histori_panen_code($lokasi){
		$query = $this->db->query("SELECT
																  *
																FROM
																  histori_panen
																WHERE lokasi = '$lokasi'
																  AND tahun >= 2000");

		return $query->result();
	}

	function get_hpp_code($lokasi){
		$query = $this->db->query("SELECT
																  *
																FROM
																  histori_panen
																WHERE lokasi = '$lokasi'
																AND hpp != 0");

		return $query->result();
	}
}
