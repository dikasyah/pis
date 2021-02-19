<?php

class StdUnsurUmur_model extends CI_Model
{
	function get_std_unsur_umur_wilayah($jenis){
		$query = $this->db->query("SELECT
																  std_unsur_umur.`umur`,
																  std_unsur_umur.`N`,
																  std_unsur_umur.`P`,
																  std_unsur_umur.`K`,
																  std_unsur_umur.`MG`
																FROM
																  std_unsur_umur
																WHERE std_unsur_umur.`status` = '$jenis'");

		return $query->result();
	}

	function get_std_metarial($kelas, $umur){
		$query = $this->db->query("SELECT
																  std_material.*
																FROM
																  std_material
																WHERE std_material.`kelas` = '$kelas'
																  AND std_material.`umur` = '$umur'");

		return $query->row_array();
	}
}
