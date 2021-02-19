<?php

class WeedControl_model extends CI_Model
{

	function get_weed_control_code($lokasi){
		$query = $this->db->query("SELECT
																  *
																FROM
																  weed_control
																WHERE lokasi = '$lokasi'
																ORDER BY tgl_realisasi ASC");

		return $query->result();
	}

	function get_unsur_weed_control($lokasi, $wilayah){
		$query = $this->db->query("SELECT
																  SUM(IF(help_master_material.`material` = 'Bromacyl', $wilayah.`resource`, 0)) AS Bromacyl,
																  SUM(IF(help_master_material.`material` = 'Diuron', $wilayah.`resource`, 0)) AS Diuron,
																  SUM(IF(help_master_material.`material` = 'Glyphosate', $wilayah.`resource`, 0)) AS Glyphosate,
																  SUM(IF(help_master_material.`material` = 'Quizalofop', $wilayah.`resource`, 0)) AS Quizalofop,
																  SUM(IF(help_master_material.`material` = 'Ametrine', $wilayah.`resource`, 0)) AS Ametrine
																FROM
																  $wilayah,
																  help_master_material
																WHERE $wilayah.`lokasi` = '101A'
																  AND help_master_material.`code` = $wilayah.`bahan_alat`");

		return $query->row_array();
	}
	function get_weed_control_booster($lokasi, $wilayah){
		$query = $this->db->query("SELECT
																  $wilayah.`lokasi`,
																  $wilayah.`tgl_realisasi`,
																  $wilayah.`luas_aktif`,
																  SUM($wilayah.`biaya_realisasi`) AS total
																FROM
																  $wilayah
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`aktivitas_code` = '1315131123'
																GROUP BY $wilayah.`tgl_realisasi`
																ORDER BY $wilayah.`tgl_realisasi` ASC");

		return $query->result();
	}
	function get_weed_control_weeding_man($lokasi, $wilayah){
		$query = $this->db->query("SELECT
																  SUM(hasil_efektif) AS hasil_efektif,
																  SUM(biaya_realisasi) AS biaya_realisasi
																FROM
																  $wilayah
																WHERE lokasi = '$lokasi'
																  AND aktivitas_code = '1315111111'");

		return $query->row_array();
	}
}
