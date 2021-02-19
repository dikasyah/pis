<?php

class Activity_model extends CI_Model
{

	function get_activity_ec($ec, $status, $umur, $lokasi, $wilayah){
		$category = substr($status, 2, 2)."_".$umur;
		$query = $this->db->query("SELECT
																  help_activity.`code_activity`,
																  help_activity.`desc_activity`,
																  help_activity.`code_element_cost`,
																  help_activity.`desc_element_cost`,
																  help_activity.`$category` AS budget,
																  SUM($wilayah.`biaya_realisasi`) AS total
																FROM
																  help_activity
																  LEFT JOIN $wilayah
																    ON help_activity.`code_activity` = $wilayah.`aktivitas_code`
																    AND $wilayah.`lokasi` = '$lokasi'
																WHERE help_activity.`code_element_cost` = '$ec'
																GROUP BY help_activity.`code_activity`
																ORDER BY help_activity.`urutan` ASC");

		return $query->result();
	}
	function get_activity_only($ec){
		$query = $this->db->query("SELECT
																  help_activity.`code_activity`,
																  help_activity.`desc_activity`,
																  help_activity.`code_element_cost`,
																  help_activity.`desc_element_cost`
																FROM
																  help_activity
																WHERE help_activity.`code_element_cost` = '$ec'");

		return $query->result();
	}
	function get_activity_all(){
		$query = $this->db->query("SELECT
																  help_activity.`code_activity`,
																  help_activity.`desc_activity`,
																  help_activity.`code_element_cost`,
																  help_activity.`desc_element_cost`
																FROM
																  help_activity
																ORDER BY help_activity.`code_element_cost` ASC,
																  help_activity.`urutan` ASC");

		return $query->result();
	}
	function get_ec_group_cost($lokasi, $wilayah, $element_cost){
		$query = $this->db->query("SELECT
																  SUM(IF(help_jenis_data.`category` = 'Labour',$wilayah.`biaya_realisasi`, 0)) AS labour,
																  SUM(IF(help_jenis_data.`category` = 'Charge',$wilayah.`biaya_realisasi`, 0)) AS charge,
																  SUM(IF(help_jenis_data.`category` = 'Material',$wilayah.`biaya_realisasi`, 0)) AS material
																FROM
																  $wilayah,
																  help_jenis_data
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`jenis_data` = help_jenis_data.`kode`
																  AND $wilayah.`act_grp` = '$element_cost'");

		return $query->row_array();
	}
	function get_activity_group_cost($lokasi, $wilayah, $element_cost, $activity){
		$query = $this->db->query("SELECT
																  SUM(IF(help_jenis_data.`category` = 'Labour',$wilayah.`biaya_realisasi`, 0)) AS labour,
																  SUM(IF(help_jenis_data.`category` = 'Charge',$wilayah.`biaya_realisasi`, 0)) AS charge,
																  SUM(IF(help_jenis_data.`category` = 'Material',$wilayah.`biaya_realisasi`, 0)) AS material
																FROM
																  $wilayah,
																  help_jenis_data
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`jenis_data` = help_jenis_data.`kode`
																  AND $wilayah.`act_grp` = '$element_cost'
																  AND $wilayah.`aktivitas_code` = '$activity'");

		return $query->row_array();
	}
	function get_activity_group_cost_tgl($lokasi, $wilayah, $element_cost, $activity, $tgl){
		$query = $this->db->query("SELECT
																  SUM(IF(help_jenis_data.`category` = 'Labour',$wilayah.`biaya_realisasi`, 0)) AS labour,
																  SUM(IF(help_jenis_data.`category` = 'Charge',$wilayah.`biaya_realisasi`, 0)) AS charge,
																  SUM(IF(help_jenis_data.`category` = 'Material',$wilayah.`biaya_realisasi`, 0)) AS material
																FROM
																  $wilayah,
																  help_jenis_data
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`jenis_data` = help_jenis_data.`kode`
																  AND $wilayah.`act_grp` = '$element_cost'
																  AND $wilayah.`aktivitas_code` = '$activity'
																	AND $wilayah.`tgl_realisasi` = '$tgl'");

		return $query->row_array();
	}
	function get_activity_group_cost_tgl_panen($lokasi, $wilayah, $element_cost, $activity, $tgl, $tahun_panen){
		$wilayah = "P".substr($wilayah, 1, 2);
		$query = $this->db->query("SELECT
																  SUM(IF(help_jenis_data.`category` = 'Labour',$wilayah.`biaya_realisasi`, 0)) AS labour,
																  SUM(IF(help_jenis_data.`category` = 'Charge',$wilayah.`biaya_realisasi`, 0)) AS charge,
																  SUM(IF(help_jenis_data.`category` = 'Material',$wilayah.`biaya_realisasi`, 0)) AS material
																FROM
																  $wilayah,
																  help_jenis_data
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`jenis_data` = help_jenis_data.`kode`
																  AND $wilayah.`act_grp` = '$element_cost'
																  AND $wilayah.`aktivitas_code` = '$activity'
  																AND SUBSTRING($wilayah.`bulan_panen`, 1, 4) = '$tahun_panen'
																	AND $wilayah.`tgl_realisasi` = '$tgl'");

		return $query->row_array();
	}
	function get_detil_activity($lokasi, $element_cost, $data_master, $activity){
		switch ($element_cost) {
			case 'ZN01':
				// $umur = "TIMESTAMPDIFF(MONTH, (SELECT
				// 														      tgl_perubahan_status
				// 														    FROM
				// 														      histori_lokasi
				// 														    WHERE lokasi = '$lokasi'
				// 														      AND (status_group = 'BK')
				// 														      AND tgl_perubahan_status <= (SELECT
				// 																        tgl_perubahan_status
				// 																      FROM
				// 																        histori_lokasi
				// 																      WHERE lokasi = '$lokasi'
				// 																        AND status_group = 'ST'
				// 																      ORDER BY tgl_perubahan_status DESC
				// 																      LIMIT 1)
				// 															    ORDER BY tgl_perubahan_status DESC
				// 															    LIMIT 1),
				// 															    $data_master.`tgl_realisasi`) + 1 AS umur,";
				// break;
			case 'ZN02':
			case 'ZN03':
			case 'ZN04':
				// $umur = "TIMESTAMPDIFF(MONTH, (SELECT
				// 														      tgl_perubahan_status
				// 														    FROM
				// 														      histori_lokasi
				// 														    WHERE lokasi = '$lokasi'
				// 														      AND (status_group = 'BK')
				// 														      AND tgl_perubahan_status <= (SELECT
				// 																        tgl_perubahan_status
				// 																      FROM
				// 																        histori_lokasi
				// 																      WHERE lokasi = '$lokasi'
				// 																        AND status_group = 'ST'
				// 																      ORDER BY tgl_perubahan_status DESC
				// 																      LIMIT 1)
				// 															    ORDER BY tgl_perubahan_status DESC
				// 															    LIMIT 1),
				// 															    $data_master.`tgl_realisasi`) + 1 AS umur,";
				// break;
				case 'ZN05':
				case 'ZN06':
				case 'ZN07':
				case 'ZN08':
				case 'ZN09':
				case 'ZN10':
				case 'ZN11':
				case 'ZN12':
				case 'ZN13':
				case 'ZN14':
				case 'ZN15':
					$umur = "TIMESTAMPDIFF(
								    MONTH,
								    (SELECT
								      lokasi.`tgl_mulai_rawat`
								    FROM
								      lokasi
								    WHERE lokasi.`lokasi` = '$lokasi'),
								    $data_master.`tgl_realisasi`) + 1 AS umur,";
				break;
		}
		$query = $this->db->query("SELECT
																  $data_master.`SPK`,
																  $data_master.`PAS_document`,
																  $data_master.`tgl_realisasi` AS tgl,
																  $data_master.`aktivitas_code` AS code_activity,
																  $data_master.`aktivitas_desc` AS desc_activity,
																  SUBSTRING($data_master.`status_lokasi`,3,2) AS status,
																	$umur
																  help_jenis_data.`category` AS jenis_data,
																  $data_master.`bahan_alat` AS code_material,
																  $data_master.`bahan_alat_desc` AS desc_material,
																  $data_master.`biaya_realisasi` AS biaya,
																  $data_master.`hasil_efektif`
																FROM
																  $data_master,
																  help_jenis_data
																WHERE $data_master.`lokasi` = '$lokasi'
																  AND $data_master.`act_grp` = '$element_cost'
																  AND help_jenis_data.`kode` = $data_master.`jenis_data`
																  AND $data_master.`aktivitas_code` = '$activity'
																ORDER BY $data_master.`tgl_realisasi` ASC,
																  $data_master.`SPK` ASC");

		return $query->result();
	}
	function get_detil_activity_tgl($lokasi, $data_master, $tgl, $activity){
		$query = $this->db->query("SELECT
																  $data_master.`SPK`,
																  $data_master.`PAS_document`,
																  $data_master.`tgl_realisasi` AS tgl,
																  $data_master.`aktivitas_code` AS code_activity,
																  $data_master.`aktivitas_desc` AS desc_activity,
																  SUBSTRING($data_master.`status_lokasi`,3,2) AS status,
																	TIMESTAMPDIFF(
																    MONTH,
																    (SELECT
																      lokasi.`tgl_mulai_rawat`
																    FROM
																      lokasi
																    WHERE lokasi.`lokasi` = '$lokasi'),
																    $data_master.`tgl_realisasi`) + 1 AS umur,
																  help_jenis_data.`category` AS jenis_data,
																  $data_master.`bahan_alat` AS code_material,
																  $data_master.`bahan_alat_desc` AS desc_material,
																  $data_master.`resource`,
																  $data_master.`biaya_realisasi`,
																  $data_master.`hasil_efektif`
																FROM
																  $data_master,
																  help_jenis_data
																WHERE $data_master.`lokasi` = '$lokasi'
																  AND help_jenis_data.`kode` = $data_master.`jenis_data`
																  AND $data_master.`aktivitas_code` = '$activity'
																  AND $data_master.`tgl_realisasi` = '$tgl'
																ORDER BY $data_master.`tgl_realisasi` ASC,
																  $data_master.`SPK` ASC");

		return $query->result();
	}
	function get_detil_activity_tgl_panen($lokasi, $data_master, $tgl, $activity, $tahun_panen){
		$data_master = "P".substr($data_master, 1, 2);
		$query = $this->db->query("SELECT
																  $data_master.`SPK`,
																  $data_master.`PAS_document`,
																  $data_master.`tgl_realisasi` AS tgl,
																  $data_master.`aktivitas_code` AS code_activity,
																  $data_master.`aktivitas_desc` AS desc_activity,
																  SUBSTRING($data_master.`status_lokasi`, 3, 2) AS status,
																	TIMESTAMPDIFF(
																    MONTH,
																    (SELECT
																      produksi_all.`tgl_awal_perawatan`
																    FROM
																      produksi_all
																    WHERE produksi_all.`lokasi` = '$lokasi'),
																    $data_master.`tgl_realisasi`) + 1 AS umur,
																  help_jenis_data.`category` AS jenis_data,
																  $data_master.`bahan_alat` AS code_material,
																  $data_master.`bahan_alat_desc` AS desc_material,
																  $data_master.`resource`,
																  $data_master.`biaya_realisasi`,
																  $data_master.`hasil_efektif`
																FROM
																  $data_master,
																  help_jenis_data
																WHERE $data_master.`lokasi` = '$lokasi'
																  AND help_jenis_data.`kode` = $data_master.`jenis_data`
																  AND $data_master.`aktivitas_code` = '$activity'
																  AND $data_master.`tgl_realisasi` = '$tgl'
  																AND SUBSTRING($data_master.`bulan_panen`, 1, 4) = '$tahun_panen'
																ORDER BY $data_master.`tgl_realisasi` ASC,
																  $data_master.`SPK` ASC");

		return $query->result();
	}
	function get_master_material_tgl($lokasi, $wilayah, $activity){
		$query = $this->db->query("SELECT
																  DISTINCT($wilayah.`tgl_realisasi`) AS tgl
																FROM
																  $wilayah
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`aktivitas_code` = '$activity'
																ORDER BY $wilayah.`tgl_realisasi` ASC");

		return $query->result();
	}
	function get_master_material_tgl_panen($lokasi, $wilayah, $activity, $tahun_panen){
		$wilayah = "P".substr($wilayah, 1, 2);
		$query = $this->db->query("SELECT
																  DISTINCT($wilayah.`tgl_realisasi`) AS tgl
																FROM
																  $wilayah
																WHERE $wilayah.`lokasi` = '$lokasi'
  																AND SUBSTRING($wilayah.`bulan_panen`, 1, 4) = '$tahun_panen'
																  AND $wilayah.`aktivitas_code` = '$activity'
																ORDER BY $wilayah.`tgl_realisasi` ASC");

		return $query->result();
	}
}
