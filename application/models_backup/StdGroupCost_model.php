<?php

class StdGroupCost_model extends CI_Model
{
	function get_std_group_cost($jenis){
		$query = $this->db->query("SELECT
																  std_group_cost.*
																FROM
																  std_group_cost
																WHERE std_group_cost.`jenis` = '$jenis'");

		return $query->row_array();
	}
}
