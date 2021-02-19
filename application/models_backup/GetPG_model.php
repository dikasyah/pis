<?php

class GetPG_model extends CI_Model
{
	function get_biaya_umur_pg($pg, $status){
		$query = $this->db->query("SELECT
																  biaya_umur_pg.`umur`,
																  biaya_umur_pg.`biaya_realisasi`
																FROM
																  biaya_umur_pg
																WHERE biaya_umur_pg.`pg` = '$pg'
																  AND biaya_umur_pg.`status` = '$status'");

		return $query->result();
	}
	function get_proporsi_luas_panen_pg($pg, $status){
		$query = $this->db->query("SELECT
																  proporsi_luas_panen_pg.`luas`
																FROM
																  proporsi_luas_panen_pg
																WHERE proporsi_luas_panen_pg.`pg` = '$pg'
																  AND proporsi_luas_panen_pg.`status` = '$status'");

		return $query->row_array();
	}
	function get_kondisi_drainase_pg($pg, $jenis){
		$query = $this->db->query("SELECT
																  kondisi_drainase_pg.`jumlah`
																FROM
																  kondisi_drainase_pg
																WHERE kondisi_drainase_pg.`pg` = '$pg'
																  AND kondisi_drainase_pg.`jenis` = '$jenis'");

		return $query->row_array();
	}
	function get_unsur_umur_pg($pg, $status, $umur, $unsur){
		$query = $this->db->query("SELECT
																  unsur_umur_pg.`jumlah`
																FROM
																  unsur_umur_pg
																WHERE unsur_umur_pg.`pg` = '$pg'
																  AND unsur_umur_pg.`status` = '$status'
																  AND unsur_umur_pg.`umur` = '$umur'
																  AND unsur_umur_pg.`unsur` = '$unsur'");

		return $query->row_array();
	}

	function get_lokasi_aktif_pg($pg){
		$query = $this->db->query("SELECT
																  help_lokasi_aktif.*
																FROM
																  help_lokasi_aktif
																WHERE help_lokasi_aktif.`pg` = '$pg'");

		return $query->result();
	}

	function get_group_cost_pg($pg, $status, $bulan, $tahun){
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
																WHERE group_cost_lokasi.`pg` = '$pg'
																  $category_status
																	$category_bulan
																  AND group_cost_lokasi.`tahun` = '$tahun'");

		return $query->row_array();
	}
}
