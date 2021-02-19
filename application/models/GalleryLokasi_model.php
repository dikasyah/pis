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
	function get_gallery_lokasi_code_hpp($lokasi, $jenis, $tahun){
		$query = $this->db->query("SELECT
																  lokasi_gallery.*
																FROM
																  lokasi_gallery,
																  produksi_all
																WHERE lokasi_gallery.`lokasi` = '$lokasi'
																  AND lokasi_gallery.`jenis` = '$jenis'
																  AND lokasi_gallery.`lokasi` = produksi_all.`lokasi`
																  AND produksi_all.`tahun_panen` = '$tahun'
																  AND lokasi_gallery.`tgl_upload` >= produksi_all.`tgl_awal_perawatan`
																  AND lokasi_gallery.`tgl_upload` <= produksi_all.`real_dan_sisa_rencana_tgl_selesai_panen`
																ORDER BY lokasi_gallery.`tgl_upload` DESC");

		return $query->result();
	}
	function get_peta_lokasi_code($lokasi){
		$query = $this->db->query("SELECT
																  lokasi_peta.*
																FROM
																  lokasi_peta,
																  lokasi
																WHERE lokasi_peta.`lokasi` = '$lokasi'
																  AND lokasi_peta.`lokasi` = lokasi.`lokasi`
																  -- AND lokasi_peta.`tgl_upload` >= lokasi.`tgl_mulai_rawat`
																ORDER BY lokasi_peta.`tgl_upload` DESC");

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

	function set_peta_lokasi($lokasi, $caption, $foto){
		$query = $this->db->query("INSERT INTO lokasi_peta (
																	  lokasi,
																	  caption,
																	  foto
																	)
																	VALUES
																	  (
																	    '$lokasi',
																	    '$caption',
																	    '$foto'
																	  )");

		return true;
	}

	function delete_peta_lokasi($id){
		$query = $this->db->query("DELETE FROM
																  lokasi_peta
																WHERE lokasi_peta.`id` = '$id'");

		return true;
	}

	function get_foto_gis($lokasi){
		$query = $this->db->query("SELECT
																  gis_photo.*
																FROM
																  gis_photo
																WHERE gis_photo.`location` = '$lokasi'
																ORDER BY DATE DESC");

		return $query->result();
	}
}
