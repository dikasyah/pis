<?php

class StdYield_model extends CI_Model
{

	function get_std_yield_code($jenis){
		$query = $this->db->query("SELECT
                                  *
                                FROM
                                  std_yield
                                WHERE jenis = '$jenis'");

		return $query->row_array();
	}
}
