<?php

class SBT_model extends CI_Model
{
	function get_sbt_real_cost($tahun, $kelas, $umur){
		$query = $this->db->query("SELECT
																  sbt_real_cost.*
																FROM
																  sbt_real_cost
																WHERE sbt_real_cost.`tahun` = '$tahun'
																  AND sbt_real_cost.`kelas` = '$kelas'
																  AND sbt_real_cost.`umur` = '$umur'");

		return $query->row_array();
	}
}
