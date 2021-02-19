<?php

class PlantationGroup_model extends CI_Model
{

	function get_plantation_group_pg($pg){
		$query = $this->db->query("SELECT
                                  *
                                FROM
                                  plantation_group
                                WHERE code = '$pg'");

		return $query->row_array();
	}

	function get_plantation_group_all(){
		$query = $this->db->query("SELECT
                                  *
                                FROM
                                  plantation_group");

		return $query->result();
	}
	function get_proporsi_luas_pg($pg){
		$query = $this->db->query("SELECT
																	SUM(IF(SUBSTRING(lokasi.`status`,1,4) = 'NSFC', IF(ISNULL(produksi.`real_dan_sisa_rencana_luas`), lokasi.`luas`, produksi.`real_dan_sisa_rencana_luas`), 0)) AS nsfc,
																	SUM(IF(SUBSTRING(lokasi.`status`,1,4) = 'NSSC', IF(ISNULL(produksi.`real_dan_sisa_rencana_luas`), lokasi.`luas`, produksi.`real_dan_sisa_rencana_luas`), 0)) AS nssc,
																	SUM(IF(SUBSTRING(lokasi.`status`,1,4) = 'NSFC', IF(ISNULL(produksi.`real_dan_sisa_rencana_luas`), lokasi.`luas`, produksi.`real_dan_sisa_rencana_luas`), 0) + IF(SUBSTRING(lokasi.`status`,1,4) = 'NSSC', IF(ISNULL(produksi.`real_dan_sisa_rencana_luas`), lokasi.`luas`, produksi.`real_dan_sisa_rencana_luas`), 0)) AS total
																FROM
																  lokasi,
																  help_lokasi_aktif
																  LEFT JOIN produksi
																  ON produksi.`lokasi` = help_lokasi_aktif.`lokasi_aktif`
																WHERE help_lokasi_aktif.`pg` = '$pg'
																  AND help_lokasi_aktif.`lokasi_aktif` = lokasi.`lokasi`");

		return $query->row_array();
	}
	function get_kondisi_drainase_pg($pg){
		$query = $this->db->query("SELECT
																  SUM(IF(drainase.`value` = 'Berat', 1, 0)) AS berat,
																  SUM(IF(drainase.`value` = 'Sedang', 1, 0)) AS sedang,
																  SUM(IF(drainase.`value` = 'Ringan', 1, 0)) AS ringan,
																  SUM(
																    IF(drainase.`value` = 'Berat', 1, 0) +
																    IF(drainase.`value` = 'Sedang', 1, 0) +
																    IF(drainase.`value` = 'Ringan', 1, 0)
																  ) AS total
																FROM
																  help_lokasi_aktif
																LEFT JOIN drainase
																ON help_lokasi_aktif.`lokasi_aktif` = drainase.`lokasi`
																WHERE help_lokasi_aktif.`pg` = '$pg'");

		return $query->row_array();
	}
}
