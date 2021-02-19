<?php

class HistoriLokasi_model extends CI_Model
{

	function get_histori_lokasi_code($lokasi){
		$query = $this->db->query("SELECT
                                  *
                                FROM
                                  histori_lokasi
                                WHERE lokasi = '$lokasi'");

		return $query->result();
	}

	function get_histori_lokasi_code_before($lokasi){
		$query = $this->db->query("SELECT
																  *
																FROM
																  histori_lokasi
																WHERE lokasi = '$lokasi'
																  AND (
																    status_group NOT LIKE 'BB'
																    AND status_group NOT LIKE 'ST'
																    AND status_group NOT LIKE 'BK'
																  )
																  AND tgl_perubahan_status <
																  (SELECT
																    tgl_perubahan_status
																  FROM
																    histori_lokasi
																  WHERE lokasi = '$lokasi'
																    AND status_group NOT LIKE 'BB'
																    AND status_group NOT LIKE 'ST'
																    AND status_group NOT LIKE 'BK'
																  ORDER BY tgl_perubahan_status DESC
																  LIMIT 1)
																ORDER BY tgl_perubahan_status ASC
																LIMIT 1");

		return $query->row_array();
	}
	function get_histori_lokasi_code_before_panen($lokasi, $tgl_panen){
		$query = $this->db->query("SELECT
																  *
																FROM
																  histori_lokasi
																WHERE lokasi = '$lokasi'
																  AND (
																    status_group NOT LIKE 'BB'
																    AND status_group NOT LIKE 'ST'
																    AND status_group NOT LIKE 'BK'
																  )
																  AND tgl_perubahan_status <
																  (SELECT
																    tgl_perubahan_status
																  FROM
																    histori_lokasi
																  WHERE lokasi = '$lokasi'
																    AND status_group NOT LIKE 'BB'
																    AND status_group NOT LIKE 'ST'
																    AND status_group NOT LIKE 'BK'
    																AND tgl_perubahan_status <= '$tgl_panen'
																  ORDER BY tgl_perubahan_status DESC
																  LIMIT 1)
																ORDER BY tgl_perubahan_status ASC
																LIMIT 1");

		return $query->row_array();
	}
	function get_histori_lokasi_code_before_NS($lokasi){
		$query = $this->db->query("SELECT
																  *
																FROM
																  histori_lokasi
																WHERE lokasi = '$lokasi'
																  AND (
																    status_group NOT LIKE 'BB'
																    AND status_group NOT LIKE 'ST'
																    AND status_group NOT LIKE 'BK'
    																AND jenis_tanaman = 'NS'
																  )
																  AND tgl_perubahan_status <
																  (SELECT
																    tgl_perubahan_status
																  FROM
																    histori_lokasi
																  WHERE lokasi = '$lokasi'
																    AND status_group NOT LIKE 'BB'
																    AND status_group NOT LIKE 'ST'
																    AND status_group NOT LIKE 'BK'
    																AND jenis_tanaman = 'NS'
																  ORDER BY tgl_perubahan_status DESC
																  LIMIT 1)
																ORDER BY tgl_perubahan_status ASC
																LIMIT 1");

		return $query->row_array();
	}

	function get_histori_lokasi_code_bk($lokasi){
		$query = $this->db->query("SELECT
																  *
																FROM
																  histori_lokasi
																WHERE lokasi = '$lokasi'
																  AND (
																    status_group = 'BK'
																  )
																  AND tgl_perubahan_status <=
																  (SELECT
																    tgl_perubahan_status
																  FROM
																    histori_lokasi
																  WHERE lokasi = '$lokasi'
																    AND status_group = 'ST'
																  ORDER BY tgl_perubahan_status DESC
																  LIMIT 1)
																ORDER BY tgl_perubahan_status DESC
																LIMIT 1");

		return $query->row_array();
	}

	function get_histori_lokasi_code_st($lokasi){
		$query = $this->db->query("SELECT
																  *
																FROM
																  histori_lokasi
																WHERE lokasi = '$lokasi'
																  AND (
																    status_group = 'ST'
																  )
																  AND tgl_perubahan_status <=
																  (SELECT
																    tgl_perubahan_status
																  FROM
																    histori_lokasi
																  WHERE lokasi = '$lokasi'
																    AND status_group = 'ST'
																  ORDER BY tgl_perubahan_status DESC
																  LIMIT 1)
																ORDER BY tgl_perubahan_status DESC
																LIMIT 1");

		return $query->row_array();
	}

	function get_histori_lokasi_code_nssc_nsfc($lokasi){
		$query = $this->db->query("SELECT
																  *
																FROM
																  histori_lokasi
																WHERE lokasi = '$lokasi'
																  AND status_group = 'FC'
																ORDER BY tgl_perubahan_status DESC
																LIMIT 1");

		return $query->row_array();
	}

	function get_histori_lokasi_all(){
		$query = $this->db->query("SELECT
                                  *
                                FROM
																	histori_lokasi");

		return $query->result();
	}

	function get_first_activity($lokasi, $kebun){
		$query = $this->db->query("SELECT
																  $kebun.`tgl_realisasi`
																FROM
																  $kebun
																WHERE $kebun.`lokasi` = '$lokasi'
																ORDER BY $kebun.`tgl_realisasi` ASC
																LIMIT 1");

		return $query->row_array();
	}
}
