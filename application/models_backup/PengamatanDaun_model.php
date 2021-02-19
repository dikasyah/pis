<?php

class PengamatanDaun_model extends CI_Model
{

	function get_pengamatan_daun_code_asc($lokasi){
		$query = $this->db->query("SELECT
																  pengamatan_daun.*
																FROM
																  pengamatan_daun,
																  lokasi
																WHERE pengamatan_daun.lokasi = '$lokasi'
																  AND pengamatan_daun.`tgl_terima_sampel` > lokasi.`tgl_mulai_rawat`
																  AND pengamatan_daun.`lokasi` = lokasi.`lokasi`
																ORDER BY pengamatan_daun.tgl_terima_sampel ASC
																LIMIT 1");

		return $query->row_array();
	}
}
