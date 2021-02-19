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
	function get_tonase_panen_code_panen($lokasi, $jenis, $data_master, $bulan_panen){
		$data_master = "P".substr($data_master, 1, 2);
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
																  AND help_tonase_panen.`category` = '$jenis'
																	AND $data_master.`bulan_panen` = '$bulan_panen'");

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

	function get_tonase_pm($lokasi, $wilayah){
		$query = $this->db->query("SELECT
																  SUM(IF(help_tonase_panen.`jenis` = 'Manual', $wilayah.`hasil_efektif`, 0)) AS manual,
																  SUM(IF(help_tonase_panen.`jenis` = 'Mekanik', $wilayah.`hasil_efektif`, 0)) AS mekanik,
																  SUM(IF(help_tonase_panen.`category` = 'Alami', $wilayah.`hasil_efektif`, 0)) AS alami,
																  SUM(IF(help_tonase_panen.`category` = 'Reguler', $wilayah.`hasil_efektif`, 0)) AS reguler,
																  SUM($wilayah.`hasil_efektif`) AS total
																FROM
																  $wilayah,
																  help_tonase_panen
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`aktivitas_code` = help_tonase_panen.`kode_aktifitas`");

		return $query->row_array();
	}
	function get_tonase_hpp($lokasi, $wilayah, $bulan_panen){
		$wilayah = "P".substr($wilayah, 1, 2);
		$query = $this->db->query("SELECT
																  SUM(IF(help_tonase_panen.`jenis` = 'Manual', $wilayah.`hasil_efektif`, 0)) AS manual,
																  SUM(IF(help_tonase_panen.`jenis` = 'Mekanik', $wilayah.`hasil_efektif`, 0)) AS mekanik,
																  SUM(IF(help_tonase_panen.`category` = 'Alami', $wilayah.`hasil_efektif`, 0)) AS alami,
																  SUM(IF(help_tonase_panen.`category` = 'Reguler', $wilayah.`hasil_efektif`, 0)) AS reguler,
																  SUM($wilayah.`hasil_efektif`) AS total
																FROM
																  $wilayah,
																  help_tonase_panen
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`aktivitas_code` = help_tonase_panen.`kode_aktifitas`
																	AND $wilayah.`bulan_panen` = '$bulan_panen'");

		return $query->row_array();
	}
	function get_tonase_category_pm($lokasi, $wilayah){
		$query = $this->db->query("SELECT
																  SUM(IF(help_tonase_panen.`kode_aktifitas` = '1511111111', $wilayah.`hasil_efektif`, 0)) AS mek_rampet,
																  SUM(IF(help_tonase_panen.`kode_aktifitas` = '1511111113', $wilayah.`hasil_efektif`, 0)) AS mek_selektif_pertama,
																  SUM(IF(help_tonase_panen.`kode_aktifitas` = '1511111115', $wilayah.`hasil_efektif`, 0)) AS mek_selektif_rampet,
																  SUM(IF(help_tonase_panen.`kode_aktifitas` = '1511111119', $wilayah.`hasil_efektif`, 0)) AS mek_alami,
																  SUM(IF(help_tonase_panen.`kode_aktifitas` = '1511111511', $wilayah.`hasil_efektif`, 0)) AS man_rampet,
																  SUM(IF(help_tonase_panen.`kode_aktifitas` = '1511111513', $wilayah.`hasil_efektif`, 0)) AS man_selektif,
																  SUM(IF(help_tonase_panen.`kode_aktifitas` = '1511111517', $wilayah.`hasil_efektif`, 0)) AS man_kolekting,
																  SUM(IF(help_tonase_panen.`kode_aktifitas` = '1511111519', $wilayah.`hasil_efektif`, 0)) AS man_alami,
																  SUM(IF(help_tonase_panen.`kode_aktifitas` = '1511111521', $wilayah.`hasil_efektif`, 0)) AS man_bantuan,
																  SUM($wilayah.`hasil_efektif`) AS total
																FROM
																  $wilayah,
																  help_tonase_panen
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`aktivitas_code` = help_tonase_panen.`kode_aktifitas`");

		return $query->row_array();
	}
	function get_tonase_category_hpp($lokasi, $wilayah, $bulan_panen){
		$wilayah = "P".substr($wilayah, 1, 2);
		$query = $this->db->query("SELECT
																  SUM(IF(help_tonase_panen.`kode_aktifitas` = '1511111111', $wilayah.`hasil_efektif`, 0)) AS mek_rampet,
																  SUM(IF(help_tonase_panen.`kode_aktifitas` = '1511111113', $wilayah.`hasil_efektif`, 0)) AS mek_selektif_pertama,
																  SUM(IF(help_tonase_panen.`kode_aktifitas` = '1511111115', $wilayah.`hasil_efektif`, 0)) AS mek_selektif_rampet,
																  SUM(IF(help_tonase_panen.`kode_aktifitas` = '1511111119', $wilayah.`hasil_efektif`, 0)) AS mek_alami,
																  SUM(IF(help_tonase_panen.`kode_aktifitas` = '1511111511', $wilayah.`hasil_efektif`, 0)) AS man_rampet,
																  SUM(IF(help_tonase_panen.`kode_aktifitas` = '1511111513', $wilayah.`hasil_efektif`, 0)) AS man_selektif,
																  SUM(IF(help_tonase_panen.`kode_aktifitas` = '1511111517', $wilayah.`hasil_efektif`, 0)) AS man_kolekting,
																  SUM(IF(help_tonase_panen.`kode_aktifitas` = '1511111519', $wilayah.`hasil_efektif`, 0)) AS man_alami,
																  SUM(IF(help_tonase_panen.`kode_aktifitas` = '1511111521', $wilayah.`hasil_efektif`, 0)) AS man_bantuan,
																  SUM($wilayah.`hasil_efektif`) AS total
																FROM
																  $wilayah,
																  help_tonase_panen
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`aktivitas_code` = help_tonase_panen.`kode_aktifitas`
																	AND $wilayah.`bulan_panen` = '$bulan_panen'");

		return $query->row_array();
	}
	function get_tonase_umur_pm($lokasi, $wilayah, $tgl_panen, $category, $type){
		switch ($category) {
			case 'Alami':
			case 'Reguler':
				$option1 = "AND help_tonase_panen.`category` = '$category'";
			break;

			default:
				$option1 = "";
			break;
		}

		switch ($type) {
			case 'Mekanik':
			case 'Manual':
				$option2 = "AND help_tonase_panen.`jenis` = '$type'";
			break;

			default:
				$option2 = "";
			break;
			}
		$query = $this->db->query("SELECT
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_panen' - INTERVAL 6 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_panen' - INTERVAL 5 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS P1,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_panen' - INTERVAL 5 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_panen' - INTERVAL 4 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS P2,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_panen' - INTERVAL 4 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_panen' - INTERVAL 3 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS P3,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_panen' - INTERVAL 3 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_panen' - INTERVAL 2 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS P4,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_panen' - INTERVAL 2 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_panen' - INTERVAL 1 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS P5,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_panen' - INTERVAL 1 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_panen' + INTERVAL 0 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS P6,
  																SUM($wilayah.`hasil_efektif`) AS total
																FROM
																  $wilayah,
																  help_tonase_panen
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`aktivitas_code` = help_tonase_panen.`kode_aktifitas`
																	$option1
																	$option2");

		return $query->row_array();
	}
	function get_tonase_umur_hpp($lokasi, $wilayah, $tgl_panen, $category, $type, $bulan_panen){
		$wilayah = "P".substr($wilayah, 1, 2);
		switch ($category) {
			case 'Alami':
			case 'Reguler':
				$option1 = "AND help_tonase_panen.`category` = '$category'";
			break;

			default:
				$option1 = "";
			break;
		}

		switch ($type) {
			case 'Mekanik':
			case 'Manual':
				$option2 = "AND help_tonase_panen.`jenis` = '$type'";
			break;

			default:
				$option2 = "";
			break;
			}
		$query = $this->db->query("SELECT
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_panen' - INTERVAL 6 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_panen' - INTERVAL 5 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS P1,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_panen' - INTERVAL 5 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_panen' - INTERVAL 4 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS P2,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_panen' - INTERVAL 4 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_panen' - INTERVAL 3 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS P3,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_panen' - INTERVAL 3 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_panen' - INTERVAL 2 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS P4,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_panen' - INTERVAL 2 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_panen' - INTERVAL 1 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS P5,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_panen' - INTERVAL 1 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_panen' + INTERVAL 0 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS P6,
  																SUM($wilayah.`hasil_efektif`) AS total
																FROM
																  $wilayah,
																  help_tonase_panen
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`aktivitas_code` = help_tonase_panen.`kode_aktifitas`
																	$option1
																	$option2
																	AND $wilayah.`bulan_panen` = '$bulan_panen'");

		return $query->row_array();
	}
}
