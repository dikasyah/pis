<?php

class TonasePanen_model extends CI_Model
{

	function get_tonase_panen_code($lokasi, $jenis, $data_master){
		if($jenis == 'Reguler'){
			$jenis_data = "AND ($data_master.`jenis_data` = '3'
											OR $data_master.`jenis_data` = 'A')";
		}
		else{
			$jenis_data = "AND ($data_master.`jenis_data` = '1'
				 							OR $data_master.`jenis_data` = 'C')";
		}
		$query = $this->db->query("SELECT
																  SUM($data_master.`hasil_efektif`) / 1000 AS produksi_ton,
																  SUM($data_master.`biaya_realisasi`) / SUM($data_master.`hasil_efektif`) AS produksi_kg
																FROM
																  $data_master,
																  help_tonase_panen
																WHERE $data_master.lokasi = '$lokasi'
																  $jenis_data
																  AND help_tonase_panen.`kode_aktifitas` = $data_master.`aktivitas_code`
																  AND help_tonase_panen.`category` = '$jenis'");

		return $query->row_array();
	}

	function get_tonase_panen_total_code($lokasi, $data_master){
		$query = $this->db->query("SELECT
																  SUM($data_master.`hasil_efektif`) / 1000 AS produksi_ton
																FROM
																  $data_master,
																  help_tonase_panen
																WHERE $data_master.lokasi = '$lokasi'
																  AND $data_master.`jenis_data` != '3X'
																  AND $data_master.`jenis_data` != '7'
																  AND help_tonase_panen.`kode_aktifitas` = $data_master.`aktivitas_code`");

		return $query->row_array();
	}

	function get_tonase_sebelum_panen_code($lokasi, $jenis, $data_master){
		$query = $this->db->query("SELECT
																  TIMESTAMPDIFF(MONTH, $data_master.`tgl_realisasi`,
																    IF(ISNULL(produksi.`real_dan_sisa_rencana_tgl_selesai_panen`),
																      IF(SUBSTRING(lokasi.`status`, 0, 4) = 'NSSC', 13,
																        IF(SUBSTRING(lokasi.`bibit`, 7, 1) = 'B', 15,
																          IF(SUBSTRING(lokasi.`bibit`, 7, 1 = 'S'), 17, 19
																          )
																        )
																      ),
																      produksi.`real_dan_sisa_rencana_tgl_selesai_panen`
																    )
																  ) AS umur_sebelum_panen,
																  SUM($data_master.`hasil_efektif` / 1000) AS produksi_ton
																FROM
																  $data_master,
																  help_tonase_panen,
																  lokasi
																  LEFT JOIN produksi
																    ON lokasi.`lokasi` = produksi.`lokasi`
																WHERE $data_master.lokasi = '$lokasi'
																  AND $data_master.`jenis_data` != '3X'
																  AND $data_master.`jenis_data` != '7'
																  AND help_tonase_panen.`kode_aktifitas` = $data_master.`aktivitas_code`
																  AND help_tonase_panen.`category` = '$jenis'
																  AND $data_master.`lokasi` = lokasi.`lokasi`
																  AND TIMESTAMPDIFF(MONTH, $data_master.`tgl_realisasi`,
																    IF(ISNULL(produksi.`real_dan_sisa_rencana_tgl_selesai_panen`),
																      IF(SUBSTRING(lokasi.`status`, 0, 4) = 'NSSC', 13,
																        IF(SUBSTRING(lokasi.`bibit`, 7, 1) = 'B', 15,
																          IF(SUBSTRING(lokasi.`bibit`, 7, 1 = 'S'), 17, 19
																          )
																        )
																      ),
																      produksi.`real_dan_sisa_rencana_tgl_selesai_panen`
																    )
																	) <= 6
																GROUP BY umur_sebelum_panen
																ORDER BY umur_sebelum_panen DESC");

		return $query->result();
	}

	function get_tonase_umur_unsur_wilayah($wilayah, $status){
		$query = $this->db->query("SELECT
																  CEIL(TIMESTAMPDIFF(DAY, lokasi.`tgl_mulai_rawat`, konstanta.`nilai`) / 30.4583333333333) AS umur,
																  SUM(IF(ISNULL(produksi.`real_dan_sisa_rencana_tonase`),
																    IF(lokasi.`status` LIKE 'NSFC%', lokasi.`luas` * 98, lokasi.`luas` * 65), produksi.`real_dan_sisa_rencana_tonase`
																  )) AS tonase
																FROM
																  lokasi,
																  konstanta,
																  help_lokasi_aktif
																  LEFT JOIN produksi
																    ON help_lokasi_aktif.`lokasi_aktif` = produksi.`lokasi`
																WHERE help_lokasi_aktif.`wilayah` = '$wilayah'
																  AND help_lokasi_aktif.`lokasi_aktif` = lokasi.`lokasi`
																  AND (
																    CEIL(TIMESTAMPDIFF(DAY, lokasi.`tgl_mulai_rawat`, konstanta.`nilai`) / 30.4583333333333) = '5'
																    OR CEIL(TIMESTAMPDIFF(DAY, lokasi.`tgl_mulai_rawat`, konstanta.`nilai`) / 30.4583333333333) = '8'
																    OR CEIL(TIMESTAMPDIFF(DAY, lokasi.`tgl_mulai_rawat`, konstanta.`nilai`) / 30.4583333333333) = '12'
																    OR CEIL(TIMESTAMPDIFF(DAY, lokasi.`tgl_mulai_rawat`, konstanta.`nilai`) / 30.4583333333333) = '19'
																    OR CEIL(TIMESTAMPDIFF(DAY, lokasi.`tgl_mulai_rawat`, konstanta.`nilai`) / 30.4583333333333) > '20'
																    )
																  AND konstanta.`jenis` = 'TGL_TARIK_DATA'
																  AND SUBSTRING(lokasi.`status`, 1, 4) = '$status'
																GROUP BY CEIL(TIMESTAMPDIFF(DAY, lokasi.`tgl_mulai_rawat`, konstanta.`nilai`) / 30.4583333333333)");

		return $query->result();
	}
}
