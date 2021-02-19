<?php

class UpdatePG_model extends CI_Model
{
	function set_biaya_umur_pg($pg, $status, $umur, $biaya){
		$query = $this->db->query("UPDATE
																  biaya_umur_pg
																SET
																  biaya_realisasi = '$biaya'
																WHERE pg = '$pg'
																  AND STATUS = '$status'
																  AND umur = '$umur'");

		return $query;
	}
	function set_proporsi_luas_panen_pg($pg, $status, $luas){
		$query = $this->db->query("UPDATE
																  proporsi_luas_panen_pg
																SET
																  luas = '$luas'
																WHERE pg = '$pg'
																  AND status = '$status'");

		return $query;
	}
	function set_kondisi_drainase_pg($pg, $jenis, $jumlah){
		$query = $this->db->query("UPDATE
																  kondisi_drainase_pg
																SET
																  jumlah = '$jumlah'
																WHERE pg = '$pg'
																  AND jenis = '$jenis'");

		return $query;
	}
	function set_group_cost_pg($pg, $jenis, $tahun, $jumlah){
		$query = $this->db->query("UPDATE
																  group_cost_pg
																SET
																  jumlah = '$jumlah'
																WHERE pg = '$pg'
																  AND jenis = '$jenis'
																	AND tahun = '$tahun'");

		return $query;
	}
	function set_unsur_umur_pg($pg, $status, $umur, $unsur, $jumlah){
		$query = $this->db->query("UPDATE
																  unsur_umur_pg
																SET
																  jumlah = '$jumlah'
																WHERE pg = '$pg'
																  AND status = '$status'
																  AND umur = '$umur'
																  AND unsur = '$unsur'");

		return $query;
	}
}
