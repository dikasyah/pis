<?php

class ProduksiPanen_model extends CI_Model
{

	function get_produksi_panen($lokasi, $tgl){
		if($tgl != NULL){
			$option = "AND produksi_all.`real_dan_sisa_rencana_tgl_selesai_panen` = '$tgl'";
		}
		else{
			$option = "ORDER BY tahun_panen DESC
									LIMIT 1";
		}
		$query = $this->db->query("SELECT
																  produksi_all.*
																FROM
																  produksi_all
																WHERE produksi_all.`lokasi` = '$lokasi'
																$option");

		return $query->row_array();
	}
	function get_produksi_tgl_panen($lokasi){
		$query = $this->db->query("SELECT
																  produksi_all.`real_dan_sisa_rencana_tgl_selesai_panen` AS tgl_panen
																FROM
																  produksi_all
																WHERE produksi_all.`lokasi` = '$lokasi'
																ORDER BY produksi_all.`real_dan_sisa_rencana_tgl_selesai_panen` DESC");

		return $query->result();
	}

	function get_element_cost_code($lokasi, $data_master, $bulan_panen){
		$data_master = "P".substr($data_master, 1, 2);
		$query = $this->db->query("SELECT
																  $data_master.`lokasi`,
																  SUM(IF($data_master.`act_grp` = 'ZN01', $data_master.`biaya_realisasi`, (NULL))) AS ZN01,
																  SUM(IF($data_master.`act_grp` = 'ZN02', $data_master.`biaya_realisasi`, (NULL))) AS ZN02,
																  SUM(IF($data_master.`act_grp` = 'ZN03', $data_master.`biaya_realisasi`, (NULL))) AS ZN03,
																  SUM(IF($data_master.`act_grp` = 'ZN04', $data_master.`biaya_realisasi`, (NULL))) AS ZN04,
																  SUM(IF($data_master.`act_grp` = 'ZN05', $data_master.`biaya_realisasi`, (NULL))) AS ZN05,
																  SUM(IF($data_master.`act_grp` = 'ZN06', $data_master.`biaya_realisasi`, (NULL))) AS ZN06,
																  SUM(IF($data_master.`act_grp` = 'ZN07', $data_master.`biaya_realisasi`, (NULL))) AS ZN07,
																  SUM(IF($data_master.`act_grp` = 'ZN08', $data_master.`biaya_realisasi`, (NULL))) AS ZN08,
																  SUM(IF($data_master.`act_grp` = 'ZN09', $data_master.`biaya_realisasi`, (NULL))) AS ZN09,
																  SUM(IF($data_master.`act_grp` = 'ZN10', $data_master.`biaya_realisasi`, (NULL))) AS ZN10,
																  SUM(IF($data_master.`act_grp` = 'ZN11', $data_master.`biaya_realisasi`, (NULL))) AS ZN11,
																  SUM(IF($data_master.`act_grp` = 'ZN12', $data_master.`biaya_realisasi`, (NULL))) AS ZN12,
																  SUM(IF($data_master.`act_grp` = 'ZN13', $data_master.`biaya_realisasi`, (NULL))) AS ZN13,
																  SUM(IF($data_master.`act_grp` = 'ZN14', $data_master.`biaya_realisasi`, (NULL))) AS ZN14,
																  SUM(IF($data_master.`act_grp` = 'ZN15', $data_master.`biaya_realisasi`, (NULL))) AS ZN15,
																  SUM(IF(help_jenis_data.`category` = 'Labour', $data_master.`biaya_realisasi`, (NULL))) AS Labour,
																  SUM(IF(help_jenis_data.`category` = 'Charge', $data_master.`biaya_realisasi`, (NULL))) AS Charge,
																  SUM(IF(help_jenis_data.`category` = 'Material', $data_master.`biaya_realisasi`, (NULL))) AS Material
																FROM
																  $data_master,
  																help_jenis_data
																WHERE $data_master.`lokasi` = '$lokasi'
																  AND $data_master.`bulan_panen` = '$bulan_panen'
																  AND $data_master.`jenis_data` != '7'
  																AND $data_master.`jenis_data` = help_jenis_data.`kode`");

		return $query->row_array();
	}
	function get_group_cost_umur_total($lokasi, $data_master, $bulan_panen){
		$data_master = "P".substr($data_master, 1, 2);
		$query = $this->db->query("SELECT
																  SUM(IF(help_jenis_data.`category` = 'Labour', $data_master.`biaya_realisasi`, 0)) AS Labour,
																  SUM(IF(help_jenis_data.`category` = 'Charge', $data_master.`biaya_realisasi`, 0)) AS Charge,
																  SUM(IF(help_jenis_data.`category` = 'Material', $data_master.`biaya_realisasi`, 0)) AS Material,
																  SUM($data_master.`biaya_realisasi`) AS Total
																FROM
																  $data_master,
																  help_jenis_data
																WHERE $data_master.`lokasi` = '$lokasi'
																  AND $data_master.`jenis_data` = help_jenis_data.`kode`
																  AND $data_master.`bulan_panen` = '$bulan_panen'");

		return $query->row_array();
	}
	function get_bk_st($lokasi, $start, $finish, $data_master, $bulan_panen){
		$data_master = "P".substr($data_master, 1, 2);
		$query = $this->db->query("SELECT
																  TIMESTAMPDIFF(DAY, '$start', '$finish') AS hari,
																  SUM($data_master.`biaya_realisasi`) AS biaya
																FROM
																  $data_master
																WHERE $data_master.`jenis_data` != '7'
  																AND $data_master.`status_lokasi` LIKE '%BK%'
																  AND $data_master.`lokasi` = '$lokasi'
																  AND $data_master.`bulan_panen` = '$bulan_panen'");

		return $query->row_array();
	}
	function get_st_perawatan($lokasi, $start, $finish, $data_master, $bulan_panen){
		$data_master = "P".substr($data_master, 1, 2);
		$query = $this->db->query("SELECT
																  TIMESTAMPDIFF(DAY, '$start', '$finish') AS hari,
																  SUM($data_master.`biaya_realisasi`) AS biaya
																FROM
																  $data_master
																WHERE $data_master.`jenis_data` != '7'
  																AND $data_master.`status_lokasi` LIKE 'NSST%'
																  AND $data_master.`lokasi` = '$lokasi'
																  AND $data_master.`bulan_panen` = '$bulan_panen'");

		return $query->row_array();
	}
	function get_perawatan_forcing($lokasi, $start, $finish, $status, $data_master, $bulan_panen){
		$data_master = "P".substr($data_master, 1, 2);
		$before_forcing = date('Y-m-d', strtotime($finish) - 86400);
		$query = $this->db->query("SELECT
																  TIMESTAMPDIFF(DAY, '$start', '$finish') AS hari,
																  SUM($data_master.`biaya_realisasi`) AS biaya
																FROM
																  $data_master
																WHERE $data_master.`jenis_data` != '7'
																  AND $data_master.`tgl_realisasi` < '$before_forcing'
																	AND (SUBSTRING($data_master.`status_lokasi`,1,4) = '$status' OR SUBSTRING($data_master.`status_lokasi`,1,4) = 'NSBB')
																  AND $data_master.`lokasi` = '$lokasi'
																  AND $data_master.`bulan_panen` = '$bulan_panen'");

		return $query->row_array();
	}
	function get_forcing_harvest($lokasi, $start, $finish, $status, $data_master, $bulan_panen){
		$data_master = "P".substr($data_master, 1, 2);
		$query = $this->db->query("SELECT
																  TIMESTAMPDIFF(DAY, '$start', '$finish') AS hari,
																  SUM($data_master.`biaya_realisasi`) AS biaya
																FROM
																  $data_master
																WHERE $data_master.`jenis_data` != '7'
																  AND $data_master.`tgl_realisasi` >= '$start'
																  AND SUBSTRING($data_master.`status_lokasi`,1,4) = '$status'
																  AND $data_master.`lokasi` = '$lokasi'
																  AND $data_master.`bulan_panen` = '$bulan_panen'");

		return $query->row_array();
	}

	function get_group_cost_umur($lokasi, $data_master, $tgl_perawatan, $jenis, $bulan_panen){
		$data_master = "P".substr($data_master, 1, 2);
		switch ($jenis) {
			case 'Labour':
			case 'Charge':
			case 'Material':
				$option = "AND help_jenis_data.`category` = '$jenis'";
			break;

			default:
				$option = "";
			break;
		}
		$query = $this->db->query("SELECT
																  SUM(IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 1 MONTH, $data_master.`biaya_realisasi`, 0)) AS B1,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 1 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 2 MONTH, $data_master.`biaya_realisasi`, 0), 0)) AS B2,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 2 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 3 MONTH, $data_master.`biaya_realisasi`, 0), 0)) AS B3,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 3 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 4 MONTH, $data_master.`biaya_realisasi`, 0), 0)) AS B4,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 4 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 5 MONTH, $data_master.`biaya_realisasi`, 0), 0)) AS B5,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 5 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 6 MONTH, $data_master.`biaya_realisasi`, 0), 0)) AS B6,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 6 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 7 MONTH, $data_master.`biaya_realisasi`, 0), 0)) AS B7,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 7 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 8 MONTH, $data_master.`biaya_realisasi`, 0), 0)) AS B8,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 8 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 9 MONTH, $data_master.`biaya_realisasi`, 0), 0)) AS B9,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 9 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 10 MONTH, $data_master.`biaya_realisasi`, 0), 0)) AS B10,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 10 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 11 MONTH, $data_master.`biaya_realisasi`, 0), 0)) AS B11,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 11 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 12 MONTH, $data_master.`biaya_realisasi`, 0), 0)) AS B12,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 12 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 13 MONTH, $data_master.`biaya_realisasi`, 0), 0)) AS B13,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 13 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 14 MONTH, $data_master.`biaya_realisasi`, 0), 0)) AS B14,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 14 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 15 MONTH, $data_master.`biaya_realisasi`, 0), 0)) AS B15,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 15 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 16 MONTH, $data_master.`biaya_realisasi`, 0), 0)) AS B16,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 16 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 17 MONTH, $data_master.`biaya_realisasi`, 0), 0)) AS B17,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 17 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 18 MONTH, $data_master.`biaya_realisasi`, 0), 0)) AS B18,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 18 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 19 MONTH, $data_master.`biaya_realisasi`, 0), 0)) AS B19,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 19 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 20 MONTH, $data_master.`biaya_realisasi`, 0), 0)) AS B20,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 20 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 21 MONTH, $data_master.`biaya_realisasi`, 0), 0)) AS B21,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 21 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 22 MONTH, $data_master.`biaya_realisasi`, 0), 0)) AS B22,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 22 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 23 MONTH, $data_master.`biaya_realisasi`, 0), 0)) AS B23,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 23 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 24 MONTH, $data_master.`biaya_realisasi`, 0), 0)) AS B24
																FROM
																  $data_master,
																  help_jenis_data
																WHERE $data_master.`lokasi` = '$lokasi'
																  $option
																  AND $data_master.`jenis_data` = help_jenis_data.`kode`
																  AND $data_master.`bulan_panen` = '$bulan_panen'");

		return $query->row_array();
	}
	function get_biaya_tanam_code_jenis($lokasi, $jenis, $data_master, $bulan_panen){
		$data_master = "P".substr($data_master, 1, 2);
		if($jenis == 'Bibit'){
			$query = $this->db->query("SELECT
																	  SUM($data_master.`biaya_realisasi`) AS total
																	FROM
																	  $data_master,
																	  help_nsst
																	WHERE $data_master.lokasi = '$lokasi'
																	  AND $data_master.act_grp = 'ZN03'
																	  AND ($data_master.`jenis_data` = 'B')
																	  AND help_nsst.`kode_aktifitas` = $data_master.`aktivitas_code`
																	  AND $data_master.`bulan_panen` = '$bulan_panen'");

			return $query->row_array();
		}
		else if($jenis == 'Sulam' || $jenis == 'Tanam' || $jenis == 'Others'){
			$query = $this->db->query("SELECT
																	  SUM($data_master.`biaya_realisasi`) AS total
																	FROM
																	  $data_master,
																	  help_nsst
																	WHERE $data_master.lokasi = '$lokasi'
																	  AND $data_master.act_grp = 'ZN03'
																	  AND help_nsst.`category` = '$jenis'
																	  AND $data_master.`jenis_data` = '1'
																	  AND help_nsst.`kode_aktifitas` = $data_master.`aktivitas_code`
																	  AND $data_master.`bulan_panen` = '$bulan_panen'");

			return $query->row_array();
		}
		else{
			$query = $this->db->query("SELECT
																	  SUM($data_master.`biaya_realisasi`) AS total
																	FROM
																	  $data_master,
																	  help_nsst
																	WHERE $data_master.lokasi = '$lokasi'
																	  AND $data_master.act_grp = 'ZN03'
																	  AND help_nsst.`category` = '$jenis'
																	  AND help_nsst.`kode_aktifitas` = $data_master.`aktivitas_code`
																	  AND $data_master.`bulan_panen` = '$bulan_panen'");

			return $query->row_array();
		}
	}
	function get_jumlah_sulam_code($lokasi, $data_master, $bulan_panen){
		$data_master = "P".substr($data_master, 1, 2);
		$query = $this->db->query("SELECT
																  SUM($data_master.`hasil_efektif`) AS jumlah_sulam
																FROM
																  $data_master,
																  help_nsst
																WHERE $data_master.`lokasi` = '$lokasi'
																  AND $data_master.`jenis_data` = '1'
																  AND $data_master.`aktivitas_code` = help_nsst.`kode_aktifitas`
																  AND help_nsst.`category` = 'Sulam'
																  AND $data_master.`bulan_panen` = '$bulan_panen'");

		return $query->row_array();
	}
	function get_index_tk_code($lokasi, $data_master, $bulan_panen){
		$data_master = "P".substr($data_master, 1, 2);
		$query = $this->db->query("SELECT
																   CEIL(SUM($data_master.`hasil_efektif`)) / SUM($data_master.`resource`) AS index_tk
																FROM
																  $data_master,
																  help_nsst
																WHERE $data_master.`lokasi` = '$lokasi'
																  AND $data_master.`jenis_data` = '1'
																  AND $data_master.`aktivitas_code` = help_nsst.`kode_aktifitas`
																  AND help_nsst.`category` = 'Tanam'
																  AND $data_master.`bulan_panen` = '$bulan_panen'");

		return $query->row_array();
	}
	function get_jalan_saluran_code($lokasi, $data_master, $bulan_panen){
		$data_master = "P".substr($data_master, 1, 2);
		$query = $this->db->query("SELECT
																  $data_master.`tgl_realisasi`,
																  help_land_prep.`category`
																FROM
																  $data_master,
																  help_land_prep
																WHERE $data_master.`jenis_data` != '7'
  																AND $data_master.`status_lokasi` LIKE '%BK%'
																  AND $data_master.`lokasi` = '$lokasi'
																  AND $data_master.`aktivitas_code` = help_land_prep.`kode_aktifitas`
																  AND help_land_prep.`category` = 'Jalan & Saluran'
																  AND $data_master.`bulan_panen` = '$bulan_panen'
																ORDER BY $data_master.`tgl_realisasi` DESC
																LIMIT 1");

		return $query->row_array();
	}
	function get_trend_cost_hpp($lokasi, $data_master, $bulan_panen, $tgl_perawatan){
		$data_master = "P".substr($data_master, 1, 2);
		$query = $this->db->query("SELECT
																  $data_master.`lokasi`,
																  SUM(IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 1 MONTH, $data_master.`biaya_realisasi`, (NULL))) AS U1,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 1 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 2 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U2,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 2 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 3 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U3,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 3 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 4 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U4,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 4 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 5 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U5,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 5 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 6 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U6,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 6 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 7 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U7,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 7 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 8 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U8,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 8 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 9 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U9,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 9 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 10 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U10,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 10 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 11 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U11,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 11 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 12 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U12,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 12 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 13 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U13,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 13 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 14 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U14,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 14 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 15 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U15,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 15 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 16 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U16,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 16 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 17 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U17,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 17 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 18 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U18,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 18 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 19 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U19,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 19 MONTH, IF($data_master.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 20 MONTH, $data_master.`biaya_realisasi`, (NULL)), (NULL))) AS U20,
																  SUM(IF($data_master.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 20 MONTH, $data_master.`biaya_realisasi`, (NULL))) AS U21
																FROM
																  $data_master,
																help_jenis_data
																WHERE $data_master.`lokasi` = '$lokasi'
																  AND $data_master.`bulan_panen` = '$bulan_panen'
																  AND $data_master.`jenis_data` != '7'
																AND $data_master.`jenis_data` = help_jenis_data.`kode`");

		return $query->row_array();
	}
	function get_trend_cost_budget_hpp($status){
		$query = $this->db->query("SELECT
																  SUM(IF(std_group_cost_budget_total.`umur` = '1', std_group_cost_budget_total.`Total`, (NULL))) AS U1,
																  SUM(IF(std_group_cost_budget_total.`umur` = '2', std_group_cost_budget_total.`Total`, (NULL))) AS U2,
																  SUM(IF(std_group_cost_budget_total.`umur` = '3', std_group_cost_budget_total.`Total`, (NULL))) AS U3,
																  SUM(IF(std_group_cost_budget_total.`umur` = '4', std_group_cost_budget_total.`Total`, (NULL))) AS U4,
																  SUM(IF(std_group_cost_budget_total.`umur` = '5', std_group_cost_budget_total.`Total`, (NULL))) AS U5,
																  SUM(IF(std_group_cost_budget_total.`umur` = '6', std_group_cost_budget_total.`Total`, (NULL))) AS U6,
																  SUM(IF(std_group_cost_budget_total.`umur` = '7', std_group_cost_budget_total.`Total`, (NULL))) AS U7,
																  SUM(IF(std_group_cost_budget_total.`umur` = '8', std_group_cost_budget_total.`Total`, (NULL))) AS U8,
																  SUM(IF(std_group_cost_budget_total.`umur` = '9', std_group_cost_budget_total.`Total`, (NULL))) AS U9,
																  SUM(IF(std_group_cost_budget_total.`umur` = '10', std_group_cost_budget_total.`Total`, (NULL))) AS U10,
																  SUM(IF(std_group_cost_budget_total.`umur` = '11', std_group_cost_budget_total.`Total`, (NULL))) AS U11,
																  SUM(IF(std_group_cost_budget_total.`umur` = '12', std_group_cost_budget_total.`Total`, (NULL))) AS U12,
																  SUM(IF(std_group_cost_budget_total.`umur` = '13', std_group_cost_budget_total.`Total`, (NULL))) AS U13,
																  SUM(IF(std_group_cost_budget_total.`umur` = '14', std_group_cost_budget_total.`Total`, (NULL))) AS U14,
																  SUM(IF(std_group_cost_budget_total.`umur` = '15', std_group_cost_budget_total.`Total`, (NULL))) AS U15,
																  SUM(IF(std_group_cost_budget_total.`umur` = '16', std_group_cost_budget_total.`Total`, (NULL))) AS U16,
																  SUM(IF(std_group_cost_budget_total.`umur` = '17', std_group_cost_budget_total.`Total`, (NULL))) AS U17,
																  SUM(IF(std_group_cost_budget_total.`umur` = '18', std_group_cost_budget_total.`Total`, (NULL))) AS U18,
																  SUM(IF(std_group_cost_budget_total.`umur` = '19', std_group_cost_budget_total.`Total`, (NULL))) AS U19,
																  SUM(IF(std_group_cost_budget_total.`umur` = '20', std_group_cost_budget_total.`Total`, (NULL))) AS U20,
																  SUM(IF(std_group_cost_budget_total.`umur` >= '21', std_group_cost_budget_total.`Total`, (NULL))) AS U21
																FROM
																  std_group_cost_budget_total
																WHERE std_group_cost_budget_total.`status` = '$status'");

		return $query->row_array();
	}
	function get_group_cost_budget_hpp($w, $tahun){
		if(substr($w, 0, 2) == 'PG'){
			$pg_wil = "produksi_all.`pg` = '$w'";
		}
		else{
			$pg_wil = "produksi_all.`wilayah` = '$w'";
		}
		$query = $this->db->query("SELECT
																  SUM(std_group_cost_budget_total.`Labour` * produksi_all.`luas`) AS Labour,
																  SUM(std_group_cost_budget_total.`Charge` * produksi_all.`luas`) AS Charge,
																  SUM(std_group_cost_budget_total.`Material` * produksi_all.`luas`) AS Material
																FROM
																  std_group_cost_budget_total,
																  help_lokasi_panen,
																  produksi_all
																WHERE help_lokasi_panen.`lokasi_aktif` = produksi_all.`lokasi`
																  AND SUBSTRING(help_lokasi_panen.`bulan_panen`, 1, 4) = produksi_all.`tahun_panen`
																  AND produksi_all.`status` = std_group_cost_budget_total.`status`
																  AND $pg_wil
  																AND produksi_all.`tahun_panen` = '$tahun'");

		return $query->row_array();
	}
	function get_timeline_landprep_code($lokasi, $data_master, $bulan_panen){
		$data_master = "P".substr($data_master, 1, 2);
		$query = $this->db->query("SELECT
																  $data_master.`SPK`,
																  $data_master.`PAS_document`,
																  $data_master.`tgl_realisasi`,
																  help_land_prep.`category` AS jenis,
																  $data_master.`bahan_alat_desc`,
  																SUM($data_master.`biaya_realisasi`) AS biaya_realisasi,
																  $data_master.`hasil_efektif`,
																  help_land_prep_desc.`category`,
																	help_land_prep_desc.`rental`
																FROM
																  $data_master,
																  help_land_prep_desc,
																  help_land_prep
																WHERE $data_master.`jenis_data` != '7'
  																AND $data_master.`status_lokasi` LIKE '%BK%'
																  AND $data_master.`lokasi` = '$lokasi'
																  AND help_land_prep_desc.`jenis` = $data_master.`bahan_alat_desc`
																  AND $data_master.`aktivitas_code` = help_land_prep.`kode_aktifitas`
  																AND help_land_prep.`category` != 'Jalan & Saluran'
																  AND $data_master.`bulan_panen` = '$bulan_panen'
																GROUP BY $data_master.`tgl_realisasi`,
																  help_land_prep_desc.`category`
																	ORDER BY $data_master.`SPK` ASC, help_land_prep_desc.`category` DESC");

		return $query->result();
	}

	function get_total_charge_code($lokasi, $jenis, $data_master, $bulan_panen){
		$data_master = "P".substr($data_master, 1, 2);
		if($jenis == 'Charge'){
			$query = $this->db->query("SELECT
																	  SUM($data_master.`biaya_realisasi`) AS total
																	FROM
																	  $data_master,
																	  help_jenis_data
																	WHERE $data_master.`lokasi` = '$lokasi'
																	  AND help_jenis_data.`category` = '$jenis'
																	  AND help_jenis_data.`kode` = $data_master.`jenis_data`
																	  AND $data_master.`status_lokasi` LIKE '%BK%'
																	  AND $data_master.`bulan_panen` = '$bulan_panen'
																	  AND $data_master.`aktivitas_code` IN (
																	    1113111511,
																	    1113131111,
																	    1113131113,
																	    1113131311,
																	    1113131511,
																	    1113131315,
																	    1113131313,
																	    1113171111,
																	    1113171112,
																	    1113171115
																	  )");
		}
		else if($jenis == 'Material' || $jenis == 'Labour'){
			$query = $this->db->query("SELECT
																	  SUM($data_master.`biaya_realisasi`) AS total
																	FROM
																	  $data_master,
																	  help_jenis_data
																	WHERE $data_master.`lokasi` = '$lokasi'
																	  AND help_jenis_data.`category` = '$jenis'
																	  AND $data_master.`act_grp` = 'ZN01'
																	  AND help_jenis_data.`kode` = $data_master.`jenis_data`
	  																AND $data_master.`status_lokasi` LIKE '%BK%'
																	  AND $data_master.`bulan_panen` = '$bulan_panen'");
		}
		else{
			$query = $this->db->query("SELECT
																	  SUM($data_master.`biaya_realisasi`) AS total
																	FROM
																	  $data_master,
																	  help_jenis_data
																	WHERE $data_master.`lokasi` = '$lokasi'
																	  AND help_jenis_data.`category` != 'Material'
																	  AND help_jenis_data.`category` != 'Labour'
																	  AND $data_master.`act_grp` = 'ZN01'
																	  AND help_jenis_data.`kode` = $data_master.`jenis_data`
	  																AND $data_master.`status_lokasi` LIKE '%BK%'
																	  AND $data_master.`bulan_panen` = '$bulan_panen'
																	  AND $data_master.`aktivitas_code` NOT IN (
																	    1113111511,
																	    1113131111,
																	    1113131113,
																	    1113131311,
																	    1113131511,
																	    1113131315,
																	    1113131313,
																	    1113171111,
																	    1113171112,
																	    1113171115
																	  )");
		}

		return $query->row_array();
	}
}
