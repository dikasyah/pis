<?php

class Forcing_model extends CI_Model
{

	function get_forcing_code($lokasi, $data_master){
		$query = $this->db->query("SELECT
																  MAX(help_forcing.`category`) AS forcing,
																  (SELECT
																  MAX(help_forcing.`category`)
																FROM
																  $data_master,
																  help_forcing
																WHERE $data_master.`lokasi` = '$lokasi'
																  AND $data_master.`aktivitas_code` = help_forcing.`kode_aktifitas`
																  AND help_forcing.`jenis` = 'Reforcing') AS reforcing
																FROM
																  $data_master,
																  help_forcing
																WHERE $data_master.`lokasi` = '$lokasi'
																  AND $data_master.`aktivitas_code` = help_forcing.`kode_aktifitas`
																  AND help_forcing.`jenis` = 'Forcing'");

		return $query->row_array();
	}
}
