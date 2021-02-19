<?php

class HistoriSiram_model extends CI_Model
{

	function get_histori_siram_code($lokasi, $tahun){
		$query = $this->db->query("SELECT
																  histori_siram.`tahun`,
																  histori_siram.`luas_siram` / histori_siram.`rencana_siram` AS coverage_area
																FROM
																  histori_siram
																WHERE histori_siram.`lokasi` = '$lokasi'
																  AND histori_siram.`tahun` = '$tahun'");

		return $query->row_array();
	}
	function get_std_histori_siram_code($wilayah){
		$query = $this->db->query("SELECT
																  help_histori_siram.*
																FROM
																  help_histori_siram
																WHERE help_histori_siram.`wilayah` = '$wilayah'");

		return $query->row_array();
	}
}
