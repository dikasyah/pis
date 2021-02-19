<?php

class Irrigation_model extends CI_Model
{

	function get_irrigation_code($lokasi){
		$query = $this->db->query("SELECT
																  irrigation.*
																FROM
																  irrigation, lokasi
																WHERE irrigation.`lokasi` = '$lokasi'
																AND irrigation.`lokasi` = lokasi.`lokasi`
																AND irrigation.`tanggal` > lokasi.`tgl_mulai_rawat`");

		return $query->result();
	}
	function get_irrigation_code_hpp($lokasi, $tgl_perawatan, $tgl_panen){
		$query = $this->db->query("SELECT
																  irrigation.*
																FROM
																  irrigation
																WHERE irrigation.`lokasi` = '$lokasi'
																AND irrigation.`tanggal` > '$tgl_perawatan'
																AND irrigation.`tanggal` < '$tgl_panen'");

		return $query->result();
	}

	function get_interval_siram($pg){
		$query = $this->db->query("SELECT
																  std_interval_siram.*
																FROM
																  std_interval_siram
																WHERE std_interval_siram.`pg` = '$pg'");

		return $query->row_array();
	}

	function get_coverage_summary($w, $status, $jenis, $kelas, $tahun, $bulan, $umur, $tahun_siram){
		if(substr($w, 0, 2) == 'PG'){
			if($w != 'PG'){
				$pg_wil = "perlocation_lokasi.`pg` = '$w'";
			}
			else{
				$pg_wil = "perlocation_lokasi.`pg` LIKE 'PG%'";
			}
		}
		else{
			$pg_wil = "perlocation_lokasi.`wilayah` = '$w'";
		}
		if($status != 'NS'){
			$option_status = "AND perlocation_lokasi.`status` = '$status'";
		}
		else{
			$option_status = "";
		}
		if($jenis != 'All'){
			$option_jenis = "AND perlocation_lokasi.`jenis` = '$jenis'";
		}
		else{
			$option_jenis = "";
		}
		if($kelas != 'All'){
			$option_kelas = "AND perlocation_lokasi.`kelas` = '$kelas'";
		}
		else{
			$option_kelas = "";
		}
		if($bulan != 'Total'){
			$option_bulan = "AND MONTH(perlocation_lokasi.`tgl_panen`) = '$bulan'";
		}
		else{
			$option_bulan = "";
		}
		if($umur != 'Total'){
			$option_umur = "AND perlocation_lokasi.`umur` = '$umur'";
		}
		else{
			$option_umur = "";
		}
		$query = $this->db->query("SELECT
																  CAST(SUBSTRING(perlocation_irrigation_priority.`tanggal`, 6, 2) AS UNSIGNED) AS bulan,
																  CEIL(AVG(perlocation_irrigation_priority.`luas_siram` / perlocation_irrigation_priority.`luas`)) AS kali,
																  SUM(perlocation_irrigation_priority.`luas`) AS standart,
																  SUM(perlocation_irrigation_priority.`luas_siram`) AS luas
																FROM
																  perlocation_lokasi
																  INNER JOIN perlocation_irrigation_priority
																     ON perlocation_lokasi.`lokasi` = perlocation_irrigation_priority.`lokasi`
																WHERE $pg_wil
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur
																	AND SUBSTRING(perlocation_irrigation_priority.`tanggal`, 1, 4) = '$tahun_siram'
																	GROUP BY SUBSTRING(perlocation_irrigation_priority.`tanggal`, 6, 2)");

		return $query->result();
	}
}
