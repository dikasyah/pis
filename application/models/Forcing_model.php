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
	function get_forcing_code_panen($lokasi, $data_master, $bulan_panen){
		$data_master = "P".substr($data_master, 1, 2);
		$query = $this->db->query("SELECT
																  MAX(help_forcing.`category`) AS forcing,
																  (SELECT
																  MAX(help_forcing.`category`)
																FROM
																  $data_master,
																  help_forcing
																WHERE $data_master.`lokasi` = '$lokasi'
																  AND $data_master.`aktivitas_code` = help_forcing.`kode_aktifitas`
																  AND help_forcing.`jenis` = 'Reforcing'
																	AND $data_master.`bulan_panen` = '$bulan_panen') AS reforcing
																FROM
																  $data_master,
																  help_forcing
																WHERE $data_master.`lokasi` = '$lokasi'
																  AND $data_master.`aktivitas_code` = help_forcing.`kode_aktifitas`
																  AND help_forcing.`jenis` = 'Forcing'
																	AND $data_master.`bulan_panen` = '$bulan_panen'");

		return $query->row_array();
	}
	function get_biaya_forcing($lokasi, $wilayah, $tgl_forcing_std, $tgl_forcing_real){
		$query = $this->db->query("SELECT
																  SUM(IF($wilayah.`tgl_realisasi` <= '$tgl_forcing_std', $wilayah.`biaya_realisasi`, 0)) AS biaya_forcing_std,
																  SUM(IF($wilayah.`tgl_realisasi` <= '$tgl_forcing_real', $wilayah.`biaya_realisasi`, 0)) AS biaya_forcing_real
																FROM
																  $wilayah
																	INNER JOIN help_jenis_data
																	   ON $wilayah.`jenis_data` = help_jenis_data.`kode`
																		 AND help_jenis_data.`category` = 'Material'
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`act_grp` IN (
																    'ZN08'
																  )
																  AND $wilayah.`aktivitas_code` IN (
																		'1321111111',
																		'1321111315',
																		'1321111311',
																		'1321111313',
																		'1321111515',
																		'1321111511',
																		'1321131115',
																		'1321131315',
																		'1321131311'
																  )");

		return $query->row_array();
	}
	function get_biaya_forcing_panen($lokasi, $wilayah, $tgl_forcing_std, $tgl_forcing_real, $tahun){
		$query = $this->db->query("SELECT
																  SUM(IF($wilayah.`tgl_realisasi` <= '$tgl_forcing_std', $wilayah.`biaya_realisasi`, 0)) AS biaya_forcing_std,
																  SUM(IF($wilayah.`tgl_realisasi` <= '$tgl_forcing_real', $wilayah.`biaya_realisasi`, 0)) AS biaya_forcing_real
																FROM
																  $wilayah
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`act_grp` IN (
																    'ZN04',
																    'ZN05',
																    'ZN06',
																    'ZN07',
																    'ZN08',
																    'ZN09',
																    'ZN10',
																    'ZN11',
																    'ZN12',
																    'ZN13',
																    'ZN14'
																  )
																	AND SUBSTRING($wilayah.`bulan_panen`, 1, 4) = '$tahun'");

		return $query->row_array();
	}

	function get_unsur_forcing($lokasi, $wilayah){
		$query = $this->db->query("SELECT
																  SUM(IF(help_master_material.`material` = 'Urea', $wilayah.`resource`, 0)) AS Urea,
																  SUM(IF(help_master_material.`material` = 'Borax', $wilayah.`resource`, 0)) AS Borax,
																  SUM(IF(help_master_material.`material` = 'Ethylene', $wilayah.`resource`, 0)) AS Ethylene,
																  SUM(IF(help_master_material.`material` = 'Ethepon', $wilayah.`resource`, 0)) AS Ethepon,
																  SUM(IF(help_master_material.`material` = 'Kaolin', $wilayah.`resource`, 0)) AS Kaolin
																FROM
																  $wilayah,
																  help_master_material
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND help_master_material.`code` = $wilayah.`bahan_alat`");

		return $query->row_array();
	}
}
