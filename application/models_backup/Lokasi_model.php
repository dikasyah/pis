<?php

class Lokasi_model extends CI_Model
{

	function get_lokasi_code($lokasi){
		$query = $this->db->query("SELECT
                                  *
                                FROM
                                  lokasi
                                WHERE lokasi = '$lokasi'");

		return $query->row_array();
	}

	function get_lokasi_wilayah($wilayah){
		$query = $this->db->query("SELECT
																  help_lokasi_aktif.*,
																  perlocation.`category_rp_per_ha` AS category
																FROM
																  help_lokasi_aktif
																  LEFT JOIN perlocation
																    ON help_lokasi_aktif.`lokasi_aktif` = perlocation.`lokasi`
																WHERE help_lokasi_aktif.`wilayah` = '$wilayah'");

		return $query->result();
	}

	function get_luas_panen_wilayah($wilayah){
		$query = $this->db->query("SELECT
																  SUM(lokasi.`luas`) AS NSFC,
																  (SELECT
																    SUM(lokasi.`luas`)
																  FROM
																    lokasi
																  WHERE SUBSTRING(lokasi.`kebun`, 1, 3) = '$wilayah'
																    AND SUBSTRING(lokasi.`status`, 1, 4) = 'NSSC') AS NSSC
																FROM
																  lokasi
																WHERE SUBSTRING(lokasi.`kebun`, 1, 3) = '$wilayah'
																  AND SUBSTRING(lokasi.`status`, 1, 4) = 'NSFC'");

		return $query->row_array();
	}
}
