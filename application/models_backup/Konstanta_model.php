<?php

class Konstanta_model extends CI_Model
{

	function get_konstanta_code($jenis){
		$query = $this->db->query("SELECT
                                  *
                                FROM
                                  konstanta
                                WHERE jenis = '$jenis'");

		return $query->row_array();
	}
}
