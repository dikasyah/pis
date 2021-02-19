<?php

class WarningLokasi_model extends CI_Model
{

	function get_warning_lokasi($pg, $wilayah, $lokasi, $status, $code){
		if($pg != NULL){
			$filter_pg = "AND cek_lokasi.`pg` = '$pg'";
		}
		else{
			$filter_pg = "";
		}

		if($wilayah != NULL){
			$filter_wilayah = "AND cek_lokasi.`wilayah` = '$wilayah'";
		}
		else{
			$filter_wilayah = "";
		}

		if($lokasi != NULL){
			$filter_lokasi = "AND cek_lokasi.`lokasi` = '$lokasi'";
		}
		else{
			$filter_lokasi = "";
		}

		if($status != NULL){
			$filter_status = "AND cek_lokasi.`status` = '$status'";
		}
		else{
			$filter_status = "";
		}

		if($code != NULL){
			$filter_code = "AND cek_lokasi.`code` = '$code'";
		}
		else{
			$filter_code = "";
		}
		$query = $this->db->query("SELECT
																  cek_lokasi.*
																FROM
																  cek_lokasi
															  WHERE cek_lokasi.`lokasi` != ''
																	$filter_pg
																	$filter_wilayah
																	$filter_lokasi
																	$filter_status
																	$filter_code
																ORDER BY cek_lokasi.`lokasi` ASC,
																  cek_lokasi.`code` ASC");

		return $query->result();
	}
	function get_warning_lokasi_all($pg, $wilayah){
		if($pg != NULL){
			$filter_pg = "AND cek_lokasi.`pg` = '$pg'";
		}
		else{
			$filter_pg = "";
		}

		if($wilayah != NULL){
			$filter_wilayah = "AND cek_lokasi.`wilayah` = '$wilayah'";
		}
		else{
			$filter_wilayah = "";
		}
		$query = $this->db->query("SELECT
																  DISTINCT(lokasi)
																FROM
																  cek_lokasi
																WHERE cek_lokasi.`lokasi` != ''
																	$filter_pg
																	$filter_wilayah
																ORDER BY cek_lokasi.`lokasi` ASC,
																  cek_lokasi.`code` ASC");

		return $query->result();
	}
}
