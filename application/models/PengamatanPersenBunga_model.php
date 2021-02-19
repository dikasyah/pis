<?php

class PengamatanPersenBunga_model extends CI_Model
{

	function get_pengamatan_persen_bunga_code($lokasi){
		$query = $this->db->query("SELECT
																  *
																FROM
																  pengamatan_persen_bunga,
																	lokasi
																WHERE lokasi.`lokasi` = pengamatan_persen_bunga.`lokasi`
																  AND pengamatan_persen_bunga.`tgl_pengamatan` >= lokasi.`tgl_mulai_rawat`
																  AND pengamatan_persen_bunga.`lokasi` = '$lokasi'");

		return $query->row_array();
	}
	function get_pengamatan_persen_bunga_summary($w, $status, $jenis, $kelas, $tahun, $bulan, $umur){
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
																  COUNT(pengamatan_persen_bunga.`lokasi`) AS Lokasi,
																  SUM(IF(pengamatan_persen_bunga.`persen_berbunga_normal_NN` >= 98, 1, NULL)) AS PersenBunga,
																	SUM(pengamatan_persen_bunga.`total`) / COUNT(pengamatan_persen_bunga.`lokasi`) AS Total,
																  SUM(pengamatan_persen_bunga.`berbunga_normal` + pengamatan_persen_bunga.`mandul_normal`) / COUNT(pengamatan_persen_bunga.`lokasi`) AS NTotal,
																  SUM(pengamatan_persen_bunga.`berbunga_kerdil` + pengamatan_persen_bunga.`berbunga_penyakit` + pengamatan_persen_bunga.`buah_sudah_dipanen` + pengamatan_persen_bunga.`dimakan_tikus` + pengamatan_persen_bunga.`mandul_kerdil` + pengamatan_persen_bunga.`mandul_penyakit` + pengamatan_persen_bunga.`jumlah_buah_alami`) / COUNT(pengamatan_persen_bunga.`lokasi`) AS ATotal,
																  SUM(pengamatan_persen_bunga.`persen_berbunga_normal_NT`) / COUNT(pengamatan_persen_bunga.`lokasi`) AS BNormalNT,
																  SUM(pengamatan_persen_bunga.`persen_berbunga_normal_NN`) / COUNT(pengamatan_persen_bunga.`lokasi`) AS BNormalNN,
																  SUM(pengamatan_persen_bunga.`persen_berbunga_total`) / COUNT(pengamatan_persen_bunga.`lokasi`) AS BNormal,
																  SUM(pengamatan_persen_bunga.`persen_berbunga_penyakit`) / COUNT(pengamatan_persen_bunga.`lokasi`) AS BPenyakit,
																  SUM(pengamatan_persen_bunga.`persen_berbunga_kerdil`) / COUNT(pengamatan_persen_bunga.`lokasi`) AS BKerdil,
																  SUM(pengamatan_persen_bunga.`persen_berbunga_buah_alami`) / COUNT(pengamatan_persen_bunga.`lokasi`) AS BBuahAlami,
																  SUM(pengamatan_persen_bunga.`persen_berbunga_dimakan_tikus`) / COUNT(pengamatan_persen_bunga.`lokasi`) AS BDimakanTikus,
																  SUM(pengamatan_persen_bunga.`persen_berbunga_sudah_dipanen`) / COUNT(pengamatan_persen_bunga.`lokasi`) AS BSudahDipanen,
																  SUM(pengamatan_persen_bunga.`persen_mandul_kerdil`) / COUNT(pengamatan_persen_bunga.`lokasi`) AS MKerdil,
																  SUM(pengamatan_persen_bunga.`persen_mandul_penyakit`) / COUNT(pengamatan_persen_bunga.`lokasi`) AS MPenyakit,
																  SUM(pengamatan_persen_bunga.`persen_mandul_normal`) / COUNT(pengamatan_persen_bunga.`lokasi`) AS MNormal
																FROM
																  perlocation_lokasi
																  INNER JOIN pengamatan_persen_bunga
																    ON pengamatan_persen_bunga.`lokasi` = perlocation_lokasi.`lokasi`
																    AND pengamatan_persen_bunga.`tgl_pengamatan` >= perlocation_lokasi.`tgl_perawatan`
																    AND pengamatan_persen_bunga.`tgl_pengamatan` <= perlocation_lokasi.`tgl_panen`
																WHERE $pg_wil
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																	$option_status
																	$option_jenis
																	$option_kelas
																	$option_bulan
																	$option_umur");

		return $query->row_array();
	}
}
