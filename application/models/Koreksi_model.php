<?php

class Koreksi_model extends CI_Model
{

	function get_koreksi_code($lokasi){
		$query = $this->db->query("SELECT
																  *
																FROM
																  koreksi
																WHERE koreksi.`lokasi` = '$lokasi'");

		return $query->row_array();
	}
}
