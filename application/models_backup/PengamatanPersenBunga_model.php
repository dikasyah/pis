<?php

class PengamatanPersenBunga_model extends CI_Model
{

	function get_pengamatan_persen_bunga_code($lokasi){
		$query = $this->db->query("SELECT
																  *
																FROM
																  pengamatan_persen_bunga
																WHERE lokasi = '$lokasi'");

		return $query->row_array();
	}
}
