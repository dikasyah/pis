<?php

class StdBiayaUmur_model extends CI_Model
{

	function get_biaya_umur_code($lokasi, $data_master){
		$query = $this->db->query("SELECT
																  TIMESTAMPDIFF(MONTH, lokasi.`tgl_mulai_rawat`, $data_master.`tgl_realisasi`) + 1 AS umur,
																  SUM($data_master.`biaya_realisasi`) / lokasi.`luas` AS biaya_realisasi
																FROM
																  lokasi,
																  $data_master
																WHERE lokasi.`lokasi` = '$lokasi'
																	AND $data_master.`jenis_data` != '3X'
																	AND $data_master.`jenis_data` != '7'
																	AND $data_master.`lokasi` = lokasi.`lokasi`
																GROUP BY TIMESTAMPDIFF(MONTH, lokasi.`tgl_mulai_rawat`, $data_master.`tgl_realisasi`) + 1
																ORDER BY $data_master.`tgl_realisasi` ASC");

		return $query->result();
	}
	function get_biaya_umur_ec($lokasi, $data_master, $ec){
		$query = $this->db->query("SELECT
																  TIMESTAMPDIFF(MONTH, lokasi.`tgl_mulai_rawat`, $data_master.`tgl_realisasi`) + 1 AS umur,
																  SUM($data_master.`biaya_realisasi`) AS biaya_realisasi
																FROM
																  lokasi,
																  $data_master
																WHERE lokasi.`lokasi` = '$lokasi'
																	AND $data_master.`jenis_data` != '3X'
																	AND $data_master.`jenis_data` != '7'
																	AND $data_master.`lokasi` = lokasi.`lokasi`
																	AND $data_master.`act_grp` = '$ec'
																GROUP BY TIMESTAMPDIFF(MONTH, lokasi.`tgl_mulai_rawat`, $data_master.`tgl_realisasi`) + 1
																ORDER BY $data_master.`tgl_realisasi` ASC");

		return $query->result();
	}
	function get_std_biaya_umur_code($jenis){
		$query = $this->db->query("SELECT
																  std_biaya_umur.`umur`,
																  std_biaya_umur.`biaya`
																FROM
																  std_biaya_umur
																WHERE std_biaya_umur.`status` = '$jenis'");

		return $query->result();
	}
	function get_std_biaya_umur_wilayah($jenis){
		$query = $this->db->query("SELECT
																  std_biaya_umur.`umur`,
																  std_biaya_umur.`biaya`
																FROM
																  std_biaya_umur
																WHERE std_biaya_umur.`status` = '$jenis'
																  AND std_biaya_umur.`umur` != '0'");

		return $query->result();
	}
	function get_std_biaya_umur_budget($status, $tahun, $ec){
		$query = $this->db->query("SELECT
																  std_biaya_umur_budget.`status`,
																  std_biaya_umur_budget.`umur`,
																  std_biaya_umur_budget.`$ec` AS biaya
																FROM
																  std_biaya_umur_budget
																WHERE std_biaya_umur_budget.`status` = '$status'
																  AND std_biaya_umur_budget.`tahun` = '$tahun'");

		return $query->result();
	}
	function get_sbt_group_cost_real($tahun, $umur, $kelas, $jenis){
		$query = $this->db->query("SELECT
																  sbt_group_cost_real.`$jenis` AS biaya_realisasi
																FROM
																  sbt_group_cost_real
																WHERE sbt_group_cost_real.`tahun` = '$tahun'
																  AND sbt_group_cost_real.`umur` = '$umur'
																  AND sbt_group_cost_real.`kelas` = '$kelas'");

		return $query->row_array();
	}
	function get_sbt_group_cost_real_total($tahun, $umur, $kelas){
		$query = $this->db->query("SELECT
																  SUM(sbt_group_cost_real.`Labour`) AS Labour,
																  SUM(sbt_group_cost_real.`Charge`) AS Charge,
																  SUM(sbt_group_cost_real.`Material`) AS Material,
																  SUM(sbt_group_cost_real.`Seed`) AS Seed,
																  SUM(sbt_group_cost_real.`Total`) AS Total
																FROM
																  sbt_group_cost_real
																WHERE sbt_group_cost_real.`tahun` = '$tahun'
																  AND sbt_group_cost_real.`umur` = '$umur'
																  AND sbt_group_cost_real.`kelas` = '$kelas'");

		return $query->row_array();
	}
}
