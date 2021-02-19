<?php

class Material_model extends CI_Model
{

	function get_master_material(){
		$query = $this->db->query("SELECT
																  *
																FROM
																  help_master_material");

		return $query->result();
	}

	function get_master_material_category($category){
		if($category == 'Others'){
			$option = "help_master_material.`category` IN (
							    'Lain - Lain',
							    'PGR',
							    'Rodentisida',
							    'Surfaktan'
							  )";
		}
		else{
			$option = "help_master_material.`category` = '$category'";
		}
		$query = $this->db->query("SELECT
																  *
																FROM
																  help_master_material
																WHERE $option");

		return $query->result();
	}
	function get_master_material_forcing(){
		$query = $this->db->query("SELECT
																  *
																FROM
																  help_master_material
																WHERE help_master_material.`material` IN (
																    'Urea',
																    'Borax',
																    'Ethylene',
																    'Ethepon',
																    'Kaolin'
																  )");

		return $query->result();
	}

	function get_master_material_code($code){
		$query = $this->db->query("SELECT
																  *
																FROM
																  help_master_material
																WHERE help_master_material.`code` = '$code'");

		return $query->row_array();
	}
	function get_master_material_nama($material){
		$query = $this->db->query("SELECT
																  *
																FROM
																  help_master_material
																WHERE help_master_material.`material` = '$material'");

		return $query->row_array();
	}

	function get_material_unsur($lokasi, $wilayah, $tgl_perawatan, $unsur){
		switch ($unsur) {
			case 'Fertilizer':
				$option = "AND help_master_material.`category` = 'Fertilizer'";
				$std = "biaya_realisasi";
			break;
			case 'Fungicide':
				$option = "AND help_master_material.`category` = 'Fungisida'";
				$std = "biaya_realisasi";
			break;
			case 'Insecticide':
				$option = "AND help_master_material.`category` = 'Insektisida'";
				$std = "biaya_realisasi";
			break;
			case 'Herbicide':
				$option = "AND help_master_material.`category` = 'Herbisida'";
				$std = "biaya_realisasi";
			break;

			case 'K2SO4-KCL':
				$option = "AND (help_master_material.`code` = 'SKAL0000001'
   									OR help_master_material.`code` = 'SKAL0000002')";
				$std = "resource";
			break;

			default:
				$option = "AND help_master_material.`code` = '$unsur'";
				$std = "resource";
			break;
		}
		$query = $this->db->query("SELECT
																  SUM(IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 1 MONTH, $wilayah.`$std`, 0)) AS B1,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 1 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 2 MONTH, $wilayah.`$std`, 0), 0)) AS B2,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 2 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 3 MONTH, $wilayah.`$std`, 0), 0)) AS B3,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 3 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 4 MONTH, $wilayah.`$std`, 0), 0)) AS B4,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 4 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 5 MONTH, $wilayah.`$std`, 0), 0)) AS B5,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 5 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 6 MONTH, $wilayah.`$std`, 0), 0)) AS B6,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 6 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 7 MONTH, $wilayah.`$std`, 0), 0)) AS B7,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 7 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 8 MONTH, $wilayah.`$std`, 0), 0)) AS B8,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 8 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 9 MONTH, $wilayah.`$std`, 0), 0)) AS B9,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 9 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 10 MONTH, $wilayah.`$std`, 0), 0)) AS B10,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 10 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 11 MONTH, $wilayah.`$std`, 0), 0)) AS B11,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 11 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 12 MONTH, $wilayah.`$std`, 0), 0)) AS B12,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 12 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 13 MONTH, $wilayah.`$std`, 0), 0)) AS B13,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 13 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 14 MONTH, $wilayah.`$std`, 0), 0)) AS B14,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 14 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 15 MONTH, $wilayah.`$std`, 0), 0)) AS B15,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 15 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 16 MONTH, $wilayah.`$std`, 0), 0)) AS B16,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 16 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 17 MONTH, $wilayah.`$std`, 0), 0)) AS B17,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 17 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 18 MONTH, $wilayah.`$std`, 0), 0)) AS B18,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 18 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 19 MONTH, $wilayah.`$std`, 0), 0)) AS B19,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 19 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 20 MONTH, $wilayah.`$std`, 0), 0)) AS B20,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 20 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 21 MONTH, $wilayah.`$std`, 0), 0)) AS B21,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 21 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 22 MONTH, $wilayah.`$std`, 0), 0)) AS B22,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 22 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 23 MONTH, $wilayah.`$std`, 0), 0)) AS B23,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 23 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 24 MONTH, $wilayah.`$std`, 0), 0)) AS B24
																FROM
																  $wilayah,
																  help_master_material
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND help_master_material.`code` = $wilayah.`bahan_alat`
																  $option");

		return $query->row_array();
	}

	function get_material_unsur_luas_aktif($lokasi, $wilayah, $tgl_perawatan, $unsur){
		$query = $this->db->query("SELECT
																	$wilayah.`tgl_realisasi`,
																  $wilayah.`aktivitas_code`,
																  $wilayah.`aktivitas_desc`,
																  SUM(IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 1 MONTH, $wilayah.`resource`, 0)) AS B1,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 1 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 2 MONTH, $wilayah.`resource`, 0), 0)) AS B2,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 2 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 3 MONTH, $wilayah.`resource`, 0), 0)) AS B3,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 3 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 4 MONTH, $wilayah.`resource`, 0), 0)) AS B4,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 4 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 5 MONTH, $wilayah.`resource`, 0), 0)) AS B5,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 5 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 6 MONTH, $wilayah.`resource`, 0), 0)) AS B6,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 6 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 7 MONTH, $wilayah.`resource`, 0), 0)) AS B7,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 7 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 8 MONTH, $wilayah.`resource`, 0), 0)) AS B8,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 8 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 9 MONTH, $wilayah.`resource`, 0), 0)) AS B9,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 9 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 10 MONTH, $wilayah.`resource`, 0), 0)) AS B10,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 10 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 11 MONTH, $wilayah.`resource`, 0), 0)) AS B11,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 11 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 12 MONTH, $wilayah.`resource`, 0), 0)) AS B12,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 12 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 13 MONTH, $wilayah.`resource`, 0), 0)) AS B13,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 13 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 14 MONTH, $wilayah.`resource`, 0), 0)) AS B14,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 14 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 15 MONTH, $wilayah.`resource`, 0), 0)) AS B15,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 15 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 16 MONTH, $wilayah.`resource`, 0), 0)) AS B16,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 16 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 17 MONTH, $wilayah.`resource`, 0), 0)) AS B17,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 17 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 18 MONTH, $wilayah.`resource`, 0), 0)) AS B18,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 18 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 19 MONTH, $wilayah.`resource`, 0), 0)) AS B19,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 19 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 20 MONTH, $wilayah.`resource`, 0), 0)) AS B20,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 20 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 21 MONTH, $wilayah.`resource`, 0), 0)) AS B21,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 21 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 22 MONTH, $wilayah.`resource`, 0), 0)) AS B22,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 22 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 23 MONTH, $wilayah.`resource`, 0), 0)) AS B23,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 23 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 24 MONTH, $wilayah.`resource`, 0), 0)) AS B24,
																  SUM(IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 1 MONTH, $wilayah.`hasil_efektif`, 0)) AS L1,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 1 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 2 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS L2,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 2 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 3 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS L3,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 3 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 4 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS L4,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 4 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 5 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS L5,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 5 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 6 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS L6,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 6 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 7 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS L7,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 7 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 8 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS L8,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 8 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 9 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS L9,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 9 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 10 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS L10,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 10 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 11 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS L11,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 11 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 12 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS L12,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 12 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 13 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS L13,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 13 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 14 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS L14,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 14 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 15 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS L15,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 15 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 16 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS L16,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 16 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 17 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS L17,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 17 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 18 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS L18,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 18 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 19 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS L19,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 19 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 20 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS L20,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 20 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 21 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS L21,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 21 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 22 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS L22,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 22 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 23 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS L23,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 23 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 24 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS L24
																FROM
																  $wilayah,
																  help_master_material
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND help_master_material.`code` = $wilayah.`bahan_alat`
																  AND help_master_material.`code` = '$unsur'
																GROUP BY $wilayah.`aktivitas_code`, $wilayah.`tgl_realisasi`
																ORDER BY $wilayah.`tgl_realisasi` ASC, $wilayah.`aktivitas_code` ASC");

		return $query->result();
	}
	function get_material_unsur_panen($lokasi, $wilayah, $tgl_perawatan, $unsur, $tahun_panen){
		$wilayah = "P".substr($wilayah, 1, 2);
		switch ($unsur) {
			case 'Fertilizer':
				$option = "AND help_master_material.`category` = 'Fertilizer'";
				$std = "biaya_realisasi";
			break;
			case 'Fungicide':
				$option = "AND help_master_material.`category` = 'Fungisida'";
				$std = "biaya_realisasi";
			break;
			case 'Insecticide':
				$option = "AND help_master_material.`category` = 'Insektisida'";
				$std = "biaya_realisasi";
			break;
			case 'Herbicide':
				$option = "AND help_master_material.`category` = 'Herbisida'";
				$std = "biaya_realisasi";
			break;

			case 'K2SO4-KCL':
				$option = "AND (help_master_material.`code` = 'SKAL0000001'
   									OR help_master_material.`code` = 'SKAL0000002')";
				$std = "resource";
			break;

			default:
				$option = "AND help_master_material.`code` = '$unsur'";
				$std = "resource";
			break;
		}
		$query = $this->db->query("SELECT
																  SUM(IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 1 MONTH, $wilayah.`$std`, 0)) AS B1,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 1 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 2 MONTH, $wilayah.`$std`, 0), 0)) AS B2,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 2 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 3 MONTH, $wilayah.`$std`, 0), 0)) AS B3,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 3 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 4 MONTH, $wilayah.`$std`, 0), 0)) AS B4,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 4 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 5 MONTH, $wilayah.`$std`, 0), 0)) AS B5,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 5 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 6 MONTH, $wilayah.`$std`, 0), 0)) AS B6,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 6 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 7 MONTH, $wilayah.`$std`, 0), 0)) AS B7,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 7 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 8 MONTH, $wilayah.`$std`, 0), 0)) AS B8,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 8 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 9 MONTH, $wilayah.`$std`, 0), 0)) AS B9,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 9 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 10 MONTH, $wilayah.`$std`, 0), 0)) AS B10,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 10 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 11 MONTH, $wilayah.`$std`, 0), 0)) AS B11,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 11 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 12 MONTH, $wilayah.`$std`, 0), 0)) AS B12,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 12 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 13 MONTH, $wilayah.`$std`, 0), 0)) AS B13,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 13 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 14 MONTH, $wilayah.`$std`, 0), 0)) AS B14,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 14 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 15 MONTH, $wilayah.`$std`, 0), 0)) AS B15,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 15 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 16 MONTH, $wilayah.`$std`, 0), 0)) AS B16,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 16 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 17 MONTH, $wilayah.`$std`, 0), 0)) AS B17,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 17 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 18 MONTH, $wilayah.`$std`, 0), 0)) AS B18,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 18 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 19 MONTH, $wilayah.`$std`, 0), 0)) AS B19,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 19 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 20 MONTH, $wilayah.`$std`, 0), 0)) AS B20,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 20 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 21 MONTH, $wilayah.`$std`, 0), 0)) AS B21,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 21 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 22 MONTH, $wilayah.`$std`, 0), 0)) AS B22,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 22 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 23 MONTH, $wilayah.`$std`, 0), 0)) AS B23,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 23 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 24 MONTH, $wilayah.`$std`, 0), 0)) AS B24
																FROM
																  $wilayah,
																  help_master_material
																WHERE $wilayah.`lokasi` = '$lokasi'
  																AND SUBSTRING($wilayah.`bulan_panen`, 1, 4) = '$tahun_panen'
																  AND help_master_material.`code` = $wilayah.`bahan_alat`
																  $option");

		return $query->row_array();
	}

	function get_material_unsur_forcing($lokasi, $wilayah, $tgl_forcing, $unsur){
		switch ($unsur) {
			case 'Fertilizer':
				$option = "AND help_master_material.`category` = 'Fertilizer'";
				$std = "biaya_realisasi";
			break;
			case 'Fungicide':
				$option = "AND help_master_material.`category` = 'Fungisida'";
				$std = "biaya_realisasi";
			break;
			case 'Insecticide':
				$option = "AND help_master_material.`category` = 'Insektisida'";
				$std = "biaya_realisasi";
			break;
			case 'Herbicide':
				$option = "AND help_master_material.`category` = 'Herbisida'";
				$std = "biaya_realisasi";
			break;

			case 'K2SO4-KCL':
				$option = "AND (help_master_material.`code` = 'SKAL0000001'
   									OR help_master_material.`code` = 'SKAL0000002')";
				$std = "resource";
			break;

			default:
				$option = "AND help_master_material.`code` = '$unsur'";
				$std = "resource";
			break;
		}
		$query = $this->db->query("SELECT
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_forcing' - INTERVAL 8 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_forcing' - INTERVAL 7 MONTH, $wilayah.`$std`, (NULL)), (NULL))) AS F1,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_forcing' - INTERVAL 7 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_forcing' - INTERVAL 6 MONTH, $wilayah.`$std`, (NULL)), (NULL))) AS F2,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_forcing' - INTERVAL 6 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_forcing' - INTERVAL 5 MONTH, $wilayah.`$std`, (NULL)), (NULL))) AS F3,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_forcing' - INTERVAL 5 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_forcing' - INTERVAL 4 MONTH, $wilayah.`$std`, (NULL)), (NULL))) AS F4,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_forcing' - INTERVAL 4 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_forcing' - INTERVAL 3 MONTH, $wilayah.`$std`, (NULL)), (NULL))) AS F5,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_forcing' - INTERVAL 3 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_forcing' - INTERVAL 2 MONTH, $wilayah.`$std`, (NULL)), (NULL))) AS F6,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_forcing' - INTERVAL 2 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_forcing' - INTERVAL 1 MONTH, $wilayah.`$std`, (NULL)), (NULL))) AS F7,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_forcing' - INTERVAL 1 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_forcing' + INTERVAL 0 MONTH, $wilayah.`$std`, (NULL)), (NULL))) AS F8,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_forcing' + INTERVAL 0 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_forcing' + INTERVAL 1 MONTH, $wilayah.`$std`, (NULL)), (NULL))) AS F9
																FROM
																  $wilayah,
																  help_master_material
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND help_master_material.`code` = $wilayah.`bahan_alat`
																  $option");

		return $query->row_array();
	}
	function get_detil_activity_material($lokasi, $data_master, $material){
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
																  $data_master.`hasil_efektif`
																FROM
																  $data_master,
																  help_jenis_data
																WHERE $data_master.`lokasi` = '$lokasi'
																  AND help_jenis_data.`kode` = $data_master.`jenis_data`
																  AND $data_master.`bahan_alat` = '$material'
																ORDER BY $data_master.`tgl_realisasi` ASC,
																  $data_master.`SPK` ASC");

		return $query->result();
	}
	function get_detil_activity_material_panen($lokasi, $data_master, $material, $tahun_panen){
		$data_master = "P".substr($data_master, 1, 2);
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
																				      produksi_all.`tgl_awal_perawatan`
																				    FROM
																				      produksi_all
																				    WHERE produksi_all.`lokasi` = '$lokasi'),
																				    $data_master.`tgl_realisasi`) + 1 AS umur,
																  help_jenis_data.`category` AS jenis_data,
																  $data_master.`bahan_alat` AS code_material,
																  $data_master.`bahan_alat_desc` AS desc_material,
																  $data_master.`resource`,
																  $data_master.`hasil_efektif`
																FROM
																  $data_master,
																  help_jenis_data
																WHERE $data_master.`lokasi` = '$lokasi'
																  AND help_jenis_data.`kode` = $data_master.`jenis_data`
																  AND $data_master.`bahan_alat` = '$material'
  																AND SUBSTRING($data_master.`bulan_panen`, 1, 4) = '$tahun_panen'
																ORDER BY $data_master.`tgl_realisasi` ASC,
																  $data_master.`SPK` ASC");

		return $query->result();
	}
	function get_activity_material_group_cost($lokasi, $wilayah, $element_cost, $material){
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
																  AND $wilayah.`bahan_alat` = '$material'");

		return $query->row_array();
	}
	function get_material_cost_impact($lokasi, $wilayah, $unsur){
		switch ($unsur) {
			case 'Fertilizer':
				$unsur = "Fertilizer";
			break;
			case 'Fungicide':
				$unsur = "Fungisida";
			break;
			case 'Insecticide':
				$unsur = "Insektisida";
			break;
			case 'Herbicide':
				$unsur = "Herbisida";
			break;
		}
		$query = $this->db->query("SELECT
																  SUM($wilayah.`biaya_realisasi`) AS total
																FROM
																  $wilayah,
																  help_master_material
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND help_master_material.`code` = $wilayah.`bahan_alat`
																  AND help_master_material.`category` = '$unsur'");

		return $query->row_array();
	}
	function get_std_material_cost_impact($kelas, $umur, $unsur){
		$query = $this->db->query("SELECT
																  SUM(std_material_budget.`$unsur`) AS std_total
																FROM
																  std_material_budget
																WHERE std_material_budget.`kelas` = '$kelas'
																  AND std_material_budget.`umur` <= '$umur'");

		return $query->row_array();
	}
}
