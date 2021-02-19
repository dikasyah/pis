<?php

class HistoriSiram_model extends CI_Model
{

	function get_histori_siram_code($lokasi, $tahun){
		$query = $this->db->query("SELECT
																  histori_siram.`tahun`,
																  histori_siram.`luas_siram` / histori_siram.`rencana_siram` AS coverage_area
																FROM
																  histori_siram
																WHERE histori_siram.`lokasi` = '$lokasi'
																  AND histori_siram.`tahun` = '$tahun'");

		return $query->row_array();
	}
	function get_std_histori_siram_code($wilayah){
		$query = $this->db->query("SELECT
																  help_histori_siram.*
																FROM
																  help_histori_siram
																WHERE help_histori_siram.`wilayah` = '$wilayah'");

		return $query->row_array();
	}
	function get_irrigator($lokasi){
		$query = $this->db->query("SELECT
																  DISTINCT(irrigation.`lokasi`),
																  SUBSTRING(irrigation.`irigator`, 1, 3) AS irrigator,
																  help_irrigator.`deskripsi`
																FROM
																  irrigation,
																  lokasi,
																  help_irrigator
																WHERE irrigation.`lokasi` = lokasi.`lokasi`
																  AND irrigation.`tanggal` >= lokasi.`tgl_mulai_rawat`
																  AND lokasi.`lokasi` = '$lokasi'
																  AND help_irrigator.`irrigator` = SUBSTRING(irrigation.`irigator`, 1, 3)
															  LIMIT 1");

		return $query->row_array();
	}
	function get_time_information($lokasi, $bulan){
		$query = $this->db->query("SELECT
																  SUM(irrigation.`plan_time`) AS S1,
																  SUM(irrigation.`prepare_time`) AS S2,
																  SUM(irrigation.`operation_time`) AS S3,
																  SUM(irrigation.`waiting_time`) AS S4,
																  SUM(irrigation.`repair_time`) AS S5,
																  SUM(irrigation.`down_time`) AS S6,
																  SUM(irrigation.`standby_time`) AS S7,
																  SUM(irrigation.`off_time`) AS S8,
																  SUM(irrigation.`total_operation_time`) AS S9,
																  SUM(irrigation.`total_available_time`) AS S10,
																  SUM(irrigation.`total_time`) AS S11
																FROM
																  irrigation
																WHERE irrigation.`lokasi` = '$lokasi'
																  AND DATE_FORMAT(irrigation.`tanggal`, '%Y-%m') = '$bulan'");

		return $query->row_array();
	}
	function get_siram_tgl($lokasi, $wilayah){
		$query = $this->db->query("SELECT
																  DISTINCT(SUBSTRING($wilayah.`tgl_realisasi`, 1, 7)) AS tanggal
																FROM
																  $wilayah,
																  lokasi
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`act_grp` = 'ZN13'
																  AND $wilayah.`aktivitas_code` = '1323151111'
																  AND $wilayah.`lokasi` = lokasi.`lokasi`
																  AND $wilayah.`tgl_realisasi` >= lokasi.`tgl_mulai_rawat`
																  GROUP BY $wilayah.`SPK`");

		return $query->result();
	}
	function get_siram_tgl_panen($lokasi, $wilayah, $tahun_panen){
		$wilayah = "P".substr($wilayah, 1, 2);
		$query = $this->db->query("SELECT
																  DISTINCT(SUBSTRING($wilayah.`tgl_realisasi`, 1, 4)) AS tanggal
																FROM
																  $wilayah,
																  produksi_all
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`act_grp` = 'ZN13'
																  AND $wilayah.`aktivitas_code` = '1323151111'
																  AND $wilayah.`lokasi` = produksi_all.`lokasi`
																  AND $wilayah.`tgl_realisasi` >= produksi_all.`tgl_awal_perawatan`
																  AND $wilayah.`tgl_realisasi` <= produksi_all.`real_dan_sisa_rencana_tgl_selesai_panen`
																  AND produksi_all.`tahun_panen` = '$tahun_panen'
																  GROUP BY $wilayah.`SPK`");

		return $query->result();
	}
	function get_siram_bulan($lokasi, $wilayah, $bulan){
		$query = $this->db->query("SELECT
																  $wilayah.`SPK`,
																  $wilayah.`PAS_document`,
																  $wilayah.`tgl_realisasi`,
																  $wilayah.`hasil_efektif`,
																  SUM(IF(help_jenis_data.`category` = 'Labour', $wilayah.`biaya_realisasi`, (NULL))) AS Labour,
																  SUM(IF(help_jenis_data.`category` = 'Charge', $wilayah.`biaya_realisasi`, (NULL))) AS Charge
																FROM
																  $wilayah,
																  lokasi,
																  help_jenis_data
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`act_grp` = 'ZN13'
																  AND $wilayah.`aktivitas_code` = '1323151111'
																  AND $wilayah.`lokasi` = lokasi.`lokasi`
																  -- AND $wilayah.`tgl_realisasi` >= lokasi.`tgl_mulai_rawat`
																  AND $wilayah.`jenis_data` = help_jenis_data.`kode`
																  AND DATE_FORMAT($wilayah.`tgl_realisasi`, '%Y-%m') = '$bulan'
																  GROUP BY $wilayah.`SPK`");

		return $query->result();
	}
	function get_siram_tahun($lokasi, $tahun){
		$query = $this->db->query("SELECT
																  DATE_FORMAT(irrigation.`tanggal`, '%c') AS bulan,
																  SUM(irrigation.`luas_siram`) AS luas
																FROM
																  irrigation,
																  lokasi
																WHERE irrigation.`lokasi` = '$lokasi'
																  AND irrigation.`lokasi` = lokasi.`lokasi`
  																AND DATE_FORMAT(irrigation.`tanggal`, '%Y-%m') >= DATE_FORMAT(lokasi.`tgl_mulai_rawat`, '%Y-%m')
																  AND DATE_FORMAT(irrigation.`tanggal`, '%Y') = '$tahun'
																  GROUP BY DATE_FORMAT(irrigation.`tanggal`, '%m')");

		return $query->result();
	}
	function get_siram_tahun_panen($lokasi, $tahun_panen, $tahun){
		$query = $this->db->query("SELECT
																	  DATE_FORMAT(irrigation.`tanggal`, '%c') AS bulan,
																	  SUM(irrigation.`luas_siram`) AS luas
																	FROM
																	  irrigation,
																	  produksi_all
																	WHERE irrigation.`lokasi` = '$lokasi'
																	  AND irrigation.`lokasi` = produksi_all.`lokasi`
																	  AND irrigation.`tanggal` >= produksi_all.`tgl_awal_perawatan`
																	  AND irrigation.`tanggal` <= produksi_all.`real_dan_sisa_rencana_tgl_selesai_panen`
																	  AND produksi_all.`tahun_panen` = '$tahun_panen'
																	  AND DATE_FORMAT(irrigation.`tanggal`, '%Y') = '$tahun'
																	GROUP BY DATE_FORMAT(irrigation.`tanggal`, '%m')");

		return $query->result();
	}
	function get_siram_bulan_hujan($lokasi, $wilayah, $bulan){
		$query = $this->db->query("SELECT
																  $wilayah.`tgl_realisasi`
																FROM
																  $wilayah,
																  lokasi
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`act_grp` = 'ZN13'
																  AND $wilayah.`aktivitas_code` = '1323151111'
																  AND $wilayah.`lokasi` = lokasi.`lokasi`
																  AND $wilayah.`tgl_realisasi` >= lokasi.`tgl_mulai_rawat`
																  AND DATE_FORMAT($wilayah.`tgl_realisasi`, '%Y-%m') = '$bulan'
																  GROUP BY $wilayah.`tgl_realisasi`");

		return $query->result();
	}
	function get_ombrometer($lokasi){
		$query = $this->db->query("SELECT
																  ombrometer.*
																FROM
																  ombrometer
																WHERE ombrometer.`lokasi` = '$lokasi'");

		return $query->result();
	}
	function get_engine_std($engine){
		$query = $this->db->query("SELECT
																  irrigation_engine_std.*
																FROM
																  irrigation_engine_std
																WHERE irrigation_engine_std.`engine` = '$engine'");

		return $query->row_array();
	}
	function get_engine_avg($engine){
		$query = $this->db->query("SELECT
																  irrigation_engine_avg.*
																FROM
																  irrigation_engine_avg
																WHERE irrigation_engine_avg.`engine` = '$engine'");

		return $query->row_array();
	}
	function get_engine_real($lokasi, $bulan){
		$query = $this->db->query("SELECT
																  SUBSTRING(irrigation.`engine`, 1, 3) AS engine,
																  SUM(irrigation.`Rp_per_Ha`) AS E1,
																  SUM(irrigation.`biaya_total` / irrigation.`total_time`) AS E2,
																  SUM(irrigation.`Ha_per_Jam`) AS E3,
																  SUM(irrigation.`solar_Ltr_per_Ha`) AS E4,
																  SUM(irrigation.`solar_Ltr_per_Ha`) AS E5
																FROM
																  irrigation
																WHERE irrigation.`lokasi` = '$lokasi'
																  AND DATE_FORMAT(irrigation.`tanggal`, '%Y-%m') = '$bulan'
																GROUP BY SUBSTRING(irrigation.`engine`, 1, 3)");

		return $query->result();
	}
}
