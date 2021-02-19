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
	function get_std_forcing_panen($tgl_perawatan, $kelas){
		$query = $this->db->query("SELECT
																  '$tgl_perawatan' + INTERVAL std_forcing_panen.`forcing` DAY AS tgl_forcing,
																  '$tgl_perawatan' + INTERVAL std_forcing_panen.`panen` DAY AS tgl_panen
																FROM
																  std_forcing_panen
																WHERE std_forcing_panen.`kelas` = '$kelas'");

		return $query->row_array();
	}
	function get_std_populasi_tanam(){
		$query = $this->db->query("SELECT
																  konstanta.`nilai`
																FROM
																  konstanta
																WHERE konstanta.`jenis` = 'POPULASI_TANAM'");

		return $query->row_array();
	}
}
