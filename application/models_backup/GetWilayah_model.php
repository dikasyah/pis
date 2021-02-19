<?php

class GetWilayah_model extends CI_Model
{
	function get_biaya_umur_wilayah($wilayah, $status){
		$query = $this->db->query("SELECT
																  biaya_umur_wilayah.`umur`,
																  biaya_umur_wilayah.`biaya_realisasi`
																FROM
																  biaya_umur_wilayah
																WHERE biaya_umur_wilayah.`wilayah` = '$wilayah'
																  AND biaya_umur_wilayah.`status` = '$status'");

		return $query->result();
	}
	function get_proporsi_luas_panen_wilayah($wilayah, $status){
		$query = $this->db->query("SELECT
																  proporsi_luas_panen_wilayah.`luas`
																FROM
																  proporsi_luas_panen_wilayah
																WHERE proporsi_luas_panen_wilayah.`wilayah` = '$wilayah'
																  AND proporsi_luas_panen_wilayah.`status` = '$status'");

		return $query->row_array();
	}
	function get_kondisi_drainase_wilayah($wilayah, $jenis){
		$query = $this->db->query("SELECT
																  kondisi_drainase_wilayah.`jumlah`
																FROM
																  kondisi_drainase_wilayah
																WHERE kondisi_drainase_wilayah.`wilayah` = '$wilayah'
																  AND kondisi_drainase_wilayah.`jenis` = '$jenis'");

		return $query->row_array();
	}
	function get_group_cost_wilayah($wilayah, $status, $bulan, $tahun){
		if($status != 'NS'){
			$category_status = "AND group_cost_lokasi.`status` = '$status'";
		}
		else{
			$category_status = "";
		}

		if($bulan != 'Total'){
			$category_bulan = "AND group_cost_lokasi.`bulan` = '$bulan'";
		}
		else{
			$category_bulan = "";
		}
		$query = $this->db->query("SELECT
																  SUM(group_cost_lokasi.`Labour`) AS Labour,
																  SUM(group_cost_lokasi.`Charge`) AS Charge,
																  SUM(group_cost_lokasi.`Material`) AS Material,
																  SUM(group_cost_lokasi.`Bibit`) AS Bibit,
																  SUM(group_cost_lokasi.`luas`) AS luas,
																  SUM(group_cost_lokasi.`tonase`) AS tonase
																FROM
																  group_cost_lokasi
																WHERE group_cost_lokasi.`wilayah` = '$wilayah'
																  $category_status
																	$category_bulan
																  AND group_cost_lokasi.`tahun` = '$tahun'");

		return $query->row_array();
	}
	function get_unsur_umur_wilayah($wilayah, $status, $umur, $unsur){
		$query = $this->db->query("SELECT
																  unsur_umur_wilayah.`jumlah`
																FROM
																  unsur_umur_wilayah
																WHERE unsur_umur_wilayah.`wilayah` = '$wilayah'
																  AND unsur_umur_wilayah.`status` = '$status'
																  AND unsur_umur_wilayah.`umur` = '$umur'
																  AND unsur_umur_wilayah.`unsur` = '$unsur'");

		return $query->row_array();
	}

	function get_lokasi_aktif_wilayah($wilayah){
		$query = $this->db->query("SELECT
																  help_lokasi_aktif.*, lokasi.`kebun`
																FROM
																  help_lokasi_aktif,
																  lokasi
																WHERE help_lokasi_aktif.`wilayah` = '$wilayah'
																  AND lokasi.`lokasi` = help_lokasi_aktif.`lokasi_aktif`");

		return $query->result();
	}
}
