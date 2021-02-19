<?php

class Iklim_model extends CI_Model
{

	function get_iklim_code($pg, $tgl_perawatan){
		$query = $this->db->query("SELECT
																  help_iklim.`code`,
																  help_iklim.`bulan`,
																  help_iklim.`tahun`,
																  help_iklim.`$pg` AS iklim
																FROM
																  help_iklim
																WHERE help_iklim.`code` >= DATE_FORMAT('$tgl_perawatan', '%Y%m')
																LIMIT 24");

		return $query->result();
	}
	function get_std_iklim($bulan){
		$query = $this->db->query("SELECT
																  *
																FROM
																  std_iklim
																WHERE std_iklim.`bulan` = '$bulan'");

		return $query->row_array();
	}
}
