<?php

class GalleryLokasi_model extends CI_Model
{

	function get_gallery_lokasi_code($lokasi, $jenis){
		$query = $this->db->query("SELECT
																  lokasi_gallery.*
																FROM
																  lokasi_gallery,
																  lokasi
																WHERE lokasi_gallery.`lokasi` = '$lokasi'
																  AND lokasi_gallery.`jenis` = '$jenis'
																  AND lokasi_gallery.`lokasi` = lokasi.`lokasi`
																  AND lokasi_gallery.`tgl_upload` >= lokasi.`tgl_mulai_rawat`
																ORDER BY lokasi_gallery.`tgl_upload` DESC");

		return $query->result();
	}

	function set_gallery_lokasi($lokasi, $jenis, $caption, $foto, $deskripsi){
		$query = $this->db->query("INSERT INTO lokasi_gallery (
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

	function delete_gallery_lokasi($id){
		$query = $this->db->query("DELETE FROM
																  lokasi_gallery
																WHERE lokasi_gallery.`id` = '$id'");

		return true;
	}
}
