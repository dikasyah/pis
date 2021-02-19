<?php

class HistoryGallery_model extends CI_Model
{

	function get_history_gallery(){
		$query = $this->db->query("SELECT
																  lokasi.*
																FROM
																  lokasi
																WHERE lokasi.`kebun` LIKE 'W%'
																  AND SUBSTRING(lokasi.`kebun`, 2, 1) <= '1'
																ORDER BY lokasi.`kebun` ASC, lokasi.`lokasi` ASC");

		return $query->result();
	}
	function get_detil_lokasi_code($lokasi){
		$query = $this->db->query("SELECT
																  plantation_group.`code` AS pg,
																  wilayah.`code` AS wilayah,
																  lokasi.`lokasi`
																FROM
																  plantation_group,
																  wilayah,
																  lokasi
																WHERE plantation_group.`code` = wilayah.`plantation_group`
																  AND wilayah.`code` = SUBSTRING(lokasi.`kebun`, 1, 3)
																  AND lokasi.`lokasi` = '$lokasi'");

		return $query->row_array();
	}
	function get_history_gallery_jenis($lokasi, $jenis){
		$query = $this->db->query("SELECT
																  lokasi_history_gallery.*
																FROM
																  lokasi_history_gallery
																WHERE lokasi_history_gallery.`lokasi` = '$lokasi'
																  AND lokasi_history_gallery.`jenis` = '$jenis'
																ORDER BY lokasi_history_gallery.`tgl_upload` DESC");

		return $query->result();
	}

	function set_history_gallery_lokasi($lokasi, $jenis, $caption, $foto, $deskripsi){
		$query = $this->db->query("INSERT INTO lokasi_history_gallery (
																	  lokasi,
																	  jenis,
																	  caption,
																	  foto,
																	  deskripsi
																	)
																	VALUES
																	  (
																	    '$lokasi',
																	    '$jenis',
																	    '$caption',
																	    '$foto',
																	    '$deskripsi'
																	  )");

		return true;
	}
	function delete_history_gallery_lokasi($id){
		$query = $this->db->query("DELETE FROM
																  lokasi_history_gallery
																WHERE lokasi_history_gallery.`id` = '$id'");

		return true;
	}
}
