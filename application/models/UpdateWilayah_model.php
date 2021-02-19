<?php

class UpdateWilayah_model extends CI_Model
{
	function set_biaya_umur_wilayah($wilayah, $status, $umur, $biaya){
		$query = $this->db->query("UPDATE
																  biaya_umur_wilayah
																SET
																  biaya_realisasi = '$biaya'
																WHERE wilayah = '$wilayah'
																  AND status = '$status'
																  AND umur = '$umur'");

		return $query;
	}
	function set_proporsi_luas_panen_wilayah($wilayah, $status, $luas){
		$query = $this->db->query("UPDATE
																  proporsi_luas_panen_wilayah
																SET
																  luas = '$luas'
																WHERE wilayah = '$wilayah'
																  AND status = '$status'");

		return $query;
	}
	function set_kondisi_drainase_wilayah($wilayah, $jenis, $jumlah){
		$query = $this->db->query("UPDATE
																  kondisi_drainase_wilayah
																SET
																  jumlah = '$jumlah'
																WHERE wilayah = '$wilayah'
																  AND jenis = '$jenis'");

		return $query;
	}
	function set_group_cost_wilayah($wilayah, $jenis, $tahun, $jumlah){
		$query = $this->db->query("UPDATE
																  group_cost_wilayah
																SET
																  jumlah = '$jumlah'
																WHERE wilayah = '$wilayah'
																  AND jenis = '$jenis'
																	AND tahun = '$tahun'");

		return $query;
	}
	function set_unsur_umur_wilayah($wilayah, $status, $umur, $unsur, $jumlah){
		$query = $this->db->query("UPDATE
																  unsur_umur_wilayah
																SET
																  jumlah = '$jumlah'
																WHERE wilayah = '$wilayah'
																  AND status = '$status'
																  AND umur = '$umur'
																  AND unsur = '$unsur'");

		return $query;
	}
}
