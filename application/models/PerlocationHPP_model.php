<?php

class PerlocationHPP_model extends CI_Model
{

	function get_lokasi_panen($w){
		$query = $this->db->query("SELECT
																  produksi_all.*
																FROM
																  produksi_all
																  INNER JOIN help_lokasi_panen
																  ON produksi_all.`lokasi` = help_lokasi_panen.`lokasi_aktif`
																  AND produksi_all.`tahun_panen` = SUBSTRING(help_lokasi_panen.`bulan_panen`, 1, 4)
																WHERE produksi_all.`wilayah` = '$w'
																ORDER BY produksi_all.`tahun_panen` ASC,
																  produksi_all.`lokasi` ASC");

		return $query->result();
	}
	function get_lokasi($w){
		$query = $this->db->query("SELECT
																  DISTINCT(help_lokasi_panen.`lokasi_aktif`) AS lokasi_aktif
																FROM
																  help_lokasi_panen
																WHERE help_lokasi_panen.`wilayah` = '$w'
																ORDER BY help_lokasi_panen.`lokasi_aktif` ASC");

		return $query->result();
	}
	function del_lokasi_cost(){
		$query = $this->db->query("TRUNCATE perlocation_hpp_cost;");

		return true;
	}
	function del_lokasi_trend_cost(){
		$query = $this->db->query("TRUNCATE perlocation_hpp_trend_cost;");

		return true;
	}
	function get_tahun_panen($w){
		if(substr($w, 0, 2) == 'PG'){
			if($w != 'PG'){
				$pg_wil = "WHERE help_lokasi_panen.`pg` = '$w'";
			}
			else{
				$pg_wil = "WHERE help_lokasi_panen.`pg` LIKE 'PG%'";
			}
		}
		else if(substr($w, 0, 1) == 'W'){
			$pg_wil = "WHERE help_lokasi_panen.`wilayah` = '$w'";
		}
		else{
			$pg_wil = "";
		}
		$query = $this->db->query("SELECT
																	DISTINCT(SUBSTRING(help_lokasi_panen.`bulan_panen`, 1, 4)) AS tahun_panen
																FROM
																  help_lokasi_panen
																$pg_wil
																ORDER BY help_lokasi_panen.`bulan_panen` ASC");

		return $query->result_array();
	}
	function get_performance_hpp($w, $status, $jenis, $kelas, $tahun, $bulan){
		if(substr($w, 0, 2) == 'PG'){
			if($w != 'PG'){
				$pg_wil = "produksi_all.`pg` = '$w'";
			}
			else{
				$pg_wil = "produksi_all.`pg` LIKE 'PG%'";
			}
		}
		else{
			$pg_wil = "produksi_all.`wilayah` = '$w'";
		}
		if($status != 'NS'){
			$option_status = "AND produksi_all.`status` = '$status'";
		}
		else{
			$option_status = "";
		}
		if($jenis != 'All'){
			$option_jenis = "AND produksi_all.`jenis` = '$jenis'";
		}
		else{
			$option_jenis = "";
		}
		if($kelas != 'All'){
			$option_kelas = "AND produksi_all.`kelas` = '$kelas'";
		}
		else{
			$option_kelas = "";
		}
		if($bulan != 'Total'){
			$option_bulan = "AND MONTH(produksi_all.`real_dan_sisa_rencana_tgl_selesai_panen`) = '$bulan'";
		}
		else{
			$option_bulan = "";
		}
		$query = $this->db->query("SELECT
																  SUM(IF(perlocation_hpp_cost.`performance` = 'Excellent', 1, (NULL))) AS Excellent,
																  SUM(IF(perlocation_hpp_cost.`performance` = 'Good', 1, (NULL))) AS Good,
																  SUM(IF(perlocation_hpp_cost.`performance` = 'Poor', 1, (NULL))) AS Poor,
																  COUNT(perlocation_hpp_cost.`performance`) AS Total
																FROM
																  produksi_all,
																  perlocation_hpp_cost
																WHERE produksi_all.`lokasi` = perlocation_hpp_cost.`lokasi`
																  AND produksi_all.`tahun_panen` = perlocation_hpp_cost.`tahun_panen`
																  AND $pg_wil
																	AND produksi_all.`tahun_panen` = '$tahun'
																	$option_status
																	$option_jenis
																	$option_kelas
																	$option_bulan");

		return $query->row_array();
	}
	function get_trend_cost_hpp($w, $status, $jenis, $kelas, $tahun, $bulan){
		if(substr($w, 0, 2) == 'PG'){
			if($w != 'PG'){
				$pg_wil = "produksi_all.`pg` = '$w'";
			}
			else{
				$pg_wil = "produksi_all.`pg` LIKE 'PG%'";
			}
		}
		else{
			$pg_wil = "produksi_all.`wilayah` = '$w'";
		}
		if($status != 'NS'){
			$option_status = "AND produksi_all.`status` = '$status'";
		}
		else{
			$option_status = "";
		}
		if($jenis != 'All'){
			$option_jenis = "AND produksi_all.`jenis` = '$jenis'";
		}
		else{
			$option_jenis = "";
		}
		if($kelas != 'All'){
			$option_kelas = "AND produksi_all.`kelas` = '$kelas'";
		}
		else{
			$option_kelas = "";
		}
		if($bulan != 'Total'){
			$option_bulan = "AND MONTH(produksi_all.`real_dan_sisa_rencana_tgl_selesai_panen`) = '$bulan'";
		}
		else{
			$option_bulan = "";
		}
		$query = $this->db->query("SELECT
																  SUM(perlocation_hpp_trend_cost.`U1_r`) AS U1_r,
																  SUM(perlocation_hpp_trend_cost.`U2_r`) AS U2_r,
																  SUM(perlocation_hpp_trend_cost.`U3_r`) AS U3_r,
																  SUM(perlocation_hpp_trend_cost.`U4_r`) AS U4_r,
																  SUM(perlocation_hpp_trend_cost.`U5_r`) AS U5_r,
																  SUM(perlocation_hpp_trend_cost.`U6_r`) AS U6_r,
																  SUM(perlocation_hpp_trend_cost.`U7_r`) AS U7_r,
																  SUM(perlocation_hpp_trend_cost.`U8_r`) AS U8_r,
																  SUM(perlocation_hpp_trend_cost.`U9_r`) AS U9_r,
																  SUM(perlocation_hpp_trend_cost.`U10_r`) AS U10_r,
																  SUM(perlocation_hpp_trend_cost.`U11_r`) AS U11_r,
																  SUM(perlocation_hpp_trend_cost.`U12_r`) AS U12_r,
																  SUM(perlocation_hpp_trend_cost.`U13_r`) AS U13_r,
																  SUM(perlocation_hpp_trend_cost.`U14_r`) AS U14_r,
																  SUM(perlocation_hpp_trend_cost.`U15_r`) AS U15_r,
																  SUM(perlocation_hpp_trend_cost.`U16_r`) AS U16_r,
																  SUM(perlocation_hpp_trend_cost.`U17_r`) AS U17_r,
																  SUM(perlocation_hpp_trend_cost.`U18_r`) AS U18_r,
																  SUM(perlocation_hpp_trend_cost.`U19_r`) AS U19_r,
																  SUM(perlocation_hpp_trend_cost.`U20_r`) AS U20_r,
																  SUM(perlocation_hpp_trend_cost.`U21_r`) AS U21_r,
																  SUM(perlocation_hpp_trend_cost.`U1_b`) AS U1_b,
																  SUM(perlocation_hpp_trend_cost.`U2_b`) AS U2_b,
																  SUM(perlocation_hpp_trend_cost.`U3_b`) AS U3_b,
																  SUM(perlocation_hpp_trend_cost.`U4_b`) AS U4_b,
																  SUM(perlocation_hpp_trend_cost.`U5_b`) AS U5_b,
																  SUM(perlocation_hpp_trend_cost.`U6_b`) AS U6_b,
																  SUM(perlocation_hpp_trend_cost.`U7_b`) AS U7_b,
																  SUM(perlocation_hpp_trend_cost.`U8_b`) AS U8_b,
																  SUM(perlocation_hpp_trend_cost.`U9_b`) AS U9_b,
																  SUM(perlocation_hpp_trend_cost.`U10_b`) AS U10_b,
																  SUM(perlocation_hpp_trend_cost.`U11_b`) AS U11_b,
																  SUM(perlocation_hpp_trend_cost.`U12_b`) AS U12_b,
																  SUM(perlocation_hpp_trend_cost.`U13_b`) AS U13_b,
																  SUM(perlocation_hpp_trend_cost.`U14_b`) AS U14_b,
																  SUM(perlocation_hpp_trend_cost.`U15_b`) AS U15_b,
																  SUM(perlocation_hpp_trend_cost.`U16_b`) AS U16_b,
																  SUM(perlocation_hpp_trend_cost.`U17_b`) AS U17_b,
																  SUM(perlocation_hpp_trend_cost.`U18_b`) AS U18_b,
																  SUM(perlocation_hpp_trend_cost.`U19_b`) AS U19_b,
																  SUM(perlocation_hpp_trend_cost.`U20_b`) AS U20_b,
																  SUM(perlocation_hpp_trend_cost.`U21_b`) AS U21_b
																FROM
																  produksi_all,
																  perlocation_hpp_trend_cost
																WHERE produksi_all.`lokasi` = perlocation_hpp_trend_cost.`lokasi`
																  AND produksi_all.`tahun_panen` = perlocation_hpp_trend_cost.`tahun_panen`
																  AND $pg_wil
																	AND produksi_all.`tahun_panen` = '$tahun'
																	$option_status
																	$option_jenis
																	$option_kelas
																	$option_bulan");

		return $query->row_array();
	}
	function get_cost_panen($w, $status, $jenis, $kelas, $tahun, $bulan){
		if(substr($w, 0, 2) == 'PG'){
			if($w != 'PG'){
				$pg_wil = "hpp_all.`pg` = '$w'";
			}
			else{
				$pg_wil = "hpp_all.`pg` LIKE 'PG%'";
			}
		}
		else{
			$pg_wil = "hpp_all.`wilayah` = '$w'";
		}
		if($status != 'NS'){
			$option_status = "AND produksi_all.`status` = '$status'";
		}
		else{
			$option_status = "";
		}
		if($jenis != 'All'){
			$option_jenis = "AND produksi_all.`jenis` = '$jenis'";
		}
		else{
			$option_jenis = "";
		}
		if($kelas != 'All'){
			$option_kelas = "AND produksi_all.`kelas` = '$kelas'";
		}
		else{
			$option_kelas = "";
		}
		if($bulan != 'Total'){
			$option_bulan = "AND MONTH(produksi_all.`real_dan_sisa_rencana_tgl_selesai_panen`) = '$bulan'";
		}
		else{
			$option_bulan = "";
		}
		$query = $this->db->query("SELECT
																  SUM(hpp_all.`ZN01`) AS ZN01,
																  SUM(hpp_all.`ZN02`) AS ZN02,
																  SUM(hpp_all.`ZN03`) AS ZN03,
																  SUM(hpp_all.`ZN04`) AS ZN04,
																  SUM(hpp_all.`ZN05`) AS ZN05,
																  SUM(hpp_all.`ZN06`) AS ZN06,
																  SUM(hpp_all.`ZN07`) AS ZN07,
																  SUM(hpp_all.`ZN08`) AS ZN08,
																  SUM(hpp_all.`ZN09`) AS ZN09,
																  SUM(hpp_all.`ZN10`) AS ZN10,
																  SUM(hpp_all.`ZN11`) AS ZN11,
																  SUM(hpp_all.`ZN12`) AS ZN12,
																  SUM(hpp_all.`ZN13`) AS ZN13,
																  SUM(hpp_all.`ZN14`) AS ZN14,
																  SUM(hpp_all.`ZN15`) AS ZN15,
																  SUM(hpp_all.`Labour`) AS Labour,
																  SUM(hpp_all.`Charge`) AS Charge,
																  SUM(hpp_all.`Material`) AS Material,
																  SUM(hpp_all.`Alokasi`) AS Alokasi,
																  SUM(hpp_all.`Total`) AS Total
																FROM
																  hpp_all
																  INNER JOIN help_lokasi_panen
																  ON hpp_all.`lokasi` = help_lokasi_panen.`lokasi_aktif`
																  AND hpp_all.`tahun_panen` = SUBSTRING(help_lokasi_panen.`bulan_panen`, 1, 4)
																  INNER JOIN produksi_all
																  ON hpp_all.`lokasi` = produksi_all.`lokasi`
																  AND hpp_all.`tahun_panen` = produksi_all.`tahun_panen`
																  AND hpp_all.`status` = produksi_all.`status`
																  AND produksi_all.`tahun_panen` = '$tahun'
																	$option_status
																  $option_jenis
																  $option_kelas
																  $option_bulan
																WHERE $pg_wil");

		return $query->row_array();
	}
	function get_real_panen($w, $status, $jenis, $kelas, $tahun, $bulan){
		if(substr($w, 0, 2) == 'PG'){
			if($w != 'PG'){
				$pg_wil = "produksi_all.`pg` = '$w'";
			}
			else{
				$pg_wil = "produksi_all.`pg` LIKE 'PG%'";
			}
		}
		else{
			$pg_wil = "produksi_all.`wilayah` = '$w'";
		}
		if($status != 'NS'){
			$option_status = "AND produksi_all.`status` = '$status'";
		}
		else{
			$option_status = "";
		}
		if($jenis != 'All'){
			$option_jenis = "AND produksi_all.`jenis` = '$jenis'";
		}
		else{
			$option_jenis = "";
		}
		if($kelas != 'All'){
			$option_kelas = "AND produksi_all.`kelas` = '$kelas'";
		}
		else{
			$option_kelas = "";
		}
		if($bulan != 'Total'){
			$option_bulan = "AND MONTH(produksi_all.`real_dan_sisa_rencana_tgl_selesai_panen`) = '$bulan'";
		}
		else{
			$option_bulan = "";
		}
		$query = $this->db->query("SELECT
																  SUM(perlocation_hpp_cost.`ZN01`) AS ZN01,
																  SUM(perlocation_hpp_cost.`ZN02`) AS ZN02,
																  SUM(perlocation_hpp_cost.`ZN03`) AS ZN03,
																  SUM(perlocation_hpp_cost.`ZN04`) AS ZN04,
																  SUM(perlocation_hpp_cost.`ZN05`) AS ZN05,
																  SUM(perlocation_hpp_cost.`ZN06`) AS ZN06,
																  SUM(perlocation_hpp_cost.`ZN07`) AS ZN07,
																  SUM(perlocation_hpp_cost.`ZN08`) AS ZN08,
																  SUM(perlocation_hpp_cost.`ZN09`) AS ZN09,
																  SUM(perlocation_hpp_cost.`ZN10`) AS ZN10,
																  SUM(perlocation_hpp_cost.`ZN11`) AS ZN11,
																  SUM(perlocation_hpp_cost.`ZN12`) AS ZN12,
																  SUM(perlocation_hpp_cost.`ZN13`) AS ZN13,
																  SUM(perlocation_hpp_cost.`ZN14`) AS ZN14,
																  SUM(perlocation_hpp_cost.`ZN15`) AS ZN15,
																  SUM(perlocation_hpp_cost.`Labour`) AS Labour,
																  SUM(perlocation_hpp_cost.`Charge`) AS Charge,
																  SUM(perlocation_hpp_cost.`Material`) AS Material,
																  SUM(perlocation_hpp_cost.`ZNT`) AS Total
																FROM
																  perlocation_hpp_cost
																  INNER JOIN help_lokasi_panen
																  ON perlocation_hpp_cost.`lokasi` = help_lokasi_panen.`lokasi_aktif`
																  AND perlocation_hpp_cost.`tahun_panen` = SUBSTRING(help_lokasi_panen.`bulan_panen`, 1, 4)
																  INNER JOIN produksi_all
																  ON perlocation_hpp_cost.`lokasi` = produksi_all.`lokasi`
																  AND perlocation_hpp_cost.`tahun_panen` = produksi_all.`tahun_panen`
																  AND produksi_all.`tahun_panen` = '$tahun'
																	$option_status
																  $option_jenis
																  $option_kelas
																  $option_bulan
																WHERE $pg_wil");

		return $query->row_array();
	}
	function get_cost_panen_lokasi($lokasi, $status, $tahun_panen){
		$query = $this->db->query("SELECT
																  SUM(hpp_all.`ZN01`) AS ZN01,
																  SUM(hpp_all.`ZN02`) AS ZN02,
																  SUM(hpp_all.`ZN03`) AS ZN03,
																  SUM(hpp_all.`ZN04`) AS ZN04,
																  SUM(hpp_all.`ZN05`) AS ZN05,
																  SUM(hpp_all.`ZN06`) AS ZN06,
																  SUM(hpp_all.`ZN07`) AS ZN07,
																  SUM(hpp_all.`ZN08`) AS ZN08,
																  SUM(hpp_all.`ZN09`) AS ZN09,
																  SUM(hpp_all.`ZN10`) AS ZN10,
																  SUM(hpp_all.`ZN11`) AS ZN11,
																  SUM(hpp_all.`ZN12`) AS ZN12,
																  SUM(hpp_all.`ZN13`) AS ZN13,
																  SUM(hpp_all.`ZN14`) AS ZN14,
																  SUM(hpp_all.`ZN15`) AS ZN15,
																  SUM(hpp_all.`Labour`) AS Labour,
																  SUM(hpp_all.`Charge`) AS Charge,
																  SUM(hpp_all.`Material`) AS Material,
																  SUM(hpp_all.`Alokasi`) AS Alokasi,
																  SUM(hpp_all.`Total`) AS Total
																FROM
																  hpp_all
																  INNER JOIN help_lokasi_panen
																  ON hpp_all.`lokasi` = help_lokasi_panen.`lokasi_aktif`
																  AND hpp_all.`tahun_panen` = SUBSTRING(help_lokasi_panen.`bulan_panen`, 1, 4)
																  INNER JOIN produksi_all
																  ON hpp_all.`lokasi` = produksi_all.`lokasi`
																  AND hpp_all.`tahun_panen` = produksi_all.`tahun_panen`
																  AND hpp_all.`status` = produksi_all.`status`
    															AND hpp_all.`lokasi` = '$lokasi'
																	AND hpp_all.`status` = '$status'
																	AND hpp_all.`tahun_panen` = '$tahun_panen'");

		return $query->row_array();
	}
	function get_total_cost_panen($w, $status, $jenis, $kelas, $tahun, $bulan){
		if(substr($w, 0, 2) == 'PG'){
			if($w != 'PG'){
				$pg_wil = "produksi_all.`pg` = '$w'";
			}
			else{
				$pg_wil = "produksi_all.`pg` LIKE 'PG%'";
			}
		}
		else{
			$pg_wil = "produksi_all.`wilayah` = '$w'";
		}
		if($status != 'NS'){
			$option_status = "AND produksi_all.`status` = '$status'";
		}
		else{
			$option_status = "";
		}
		if($jenis != 'All'){
			$option_jenis = "AND produksi_all.`jenis` = '$jenis'";
		}
		else{
			$option_jenis = "";
		}
		if($kelas != 'All'){
			$option_kelas = "AND produksi_all.`kelas` = '$kelas'";
		}
		else{
			$option_kelas = "";
		}
		if($bulan != 'Total'){
			$option_bulan = "AND MONTH(produksi_all.`real_dan_sisa_rencana_tgl_selesai_panen`) = '$bulan'";
		}
		else{
			$option_bulan = "";
		}
		$query = $this->db->query("SELECT
																  SUM(hpp_all.`Total`) AS Total
																FROM
																  produksi_all
																  INNER JOIN hpp_all
																  ON produksi_all.`lokasi` = hpp_all.`lokasi`
																  AND produksi_all.`status` = hpp_all.`status`
																  AND produksi_all.`tahun_panen` = hpp_all.`tahun_panen`
																WHERE $pg_wil
																  AND produksi_all.`tahun_panen` = '$tahun'
																	$option_status
																	$option_jenis
																	$option_kelas
																	$option_bulan");

		return $query->row_array();
	}
	function get_luas_tonase_panen($w, $status, $jenis, $kelas, $tahun, $bulan){
		if(substr($w, 0, 2) == 'PG'){
			if($w != 'PG'){
				$pg_wil = "help_lokasi_panen.`pg` = '$w'";
			}
			else{
				$pg_wil = "help_lokasi_panen.`pg` LIKE 'PG%'";
			}
		}
		else{
			$pg_wil = "help_lokasi_panen.`wilayah` = '$w'";
		}
		if($status != 'NS'){
			$option_status = "AND produksi_all.`status` = '$status'";
		}
		else{
			$option_status = "";
		}
		if($jenis != 'All'){
			$option_jenis = "AND produksi_all.`jenis` = '$jenis'";
		}
		else{
			$option_jenis = "";
		}
		if($kelas != 'All'){
			$option_kelas = "AND produksi_all.`kelas` = '$kelas'";
		}
		else{
			$option_kelas = "";
		}
		if($bulan != 'Total'){
			$option_bulan = "AND MONTH(produksi_all.`real_dan_sisa_rencana_tgl_selesai_panen`) = '$bulan'";
		}
		else{
			$option_bulan = "";
		}
		$query = $this->db->query("SELECT
																  SUM(produksi_all.`real_dan_sisa_rencana_luas`) AS luas,
																  SUM(produksi_all.`real_dan_sisa_rencana_tonase`) AS tonase
																FROM
																  produksi_all
																  INNER JOIN help_lokasi_panen
																    ON produksi_all.`lokasi` = help_lokasi_panen.`lokasi_aktif`
																    AND produksi_all.`tahun_panen` = SUBSTRING(help_lokasi_panen.`bulan_panen`, 1, 4)
																    AND $pg_wil
																    AND produksi_all.`tahun_panen` = '$tahun'
																		$option_status
																	  $option_jenis
																	  $option_kelas
																	  $option_bulan");

		return $query->row_array();
	}
	function get_proporsi_luas_panen($w, $status, $jenis, $kelas, $tahun, $bulan){
		if(substr($w, 0, 2) == 'PG'){
			if($w != 'PG'){
				$pg_wil = "produksi_all.`pg` = '$w'";
			}
			else{
				$pg_wil = "produksi_all.`pg` LIKE 'PG%'";
			}
		}
		else{
			$pg_wil = "produksi_all.`wilayah` = '$w'";
		}
		if($status != 'NS'){
			$option_status = "AND produksi_all.`status` = '$status'";
		}
		else{
			$option_status = "";
		}
		if($jenis != 'All'){
			$option_jenis = "AND produksi_all.`jenis` = '$jenis'";
		}
		else{
			$option_jenis = "";
		}
		if($kelas != 'All'){
			$option_kelas = "AND produksi_all.`kelas` = '$kelas'";
		}
		else{
			$option_kelas = "";
		}
		if($bulan != 'Total'){
			$option_bulan = "AND MONTH(produksi_all.`real_dan_sisa_rencana_tgl_selesai_panen`) = '$bulan'";
		}
		else{
			$option_bulan = "";
		}
		$query = $this->db->query("SELECT
																  SUM(IF(produksi_all.`status` = 'NSFC', 1, (NULL))) AS NSFC,
																  SUM(IF(produksi_all.`status` = 'NSSC', 1, (NULL))) AS NSSC,
																  COUNT(produksi_all.`status`) AS Total
																FROM
																  produksi_all
																WHERE $pg_wil
																  AND produksi_all.`tahun_panen` = '$tahun'
																	$option_status
																  $option_jenis
																  $option_kelas
																  $option_bulan");

		return $query->row_array();
	}
	function get_kondisi_drainase($w, $status, $jenis, $kelas, $tahun, $bulan){
		if(substr($w, 0, 2) == 'PG'){
			if($w != 'PG'){
				$pg_wil = "produksi_all.`pg` = '$w'";
			}
			else{
				$pg_wil = "produksi_all.`pg` LIKE 'PG%'";
			}
		}
		else{
			$pg_wil = "produksi_all.`wilayah` = '$w'";
		}
		if($status != 'NS'){
			$option_status = "AND produksi_all.`status` = '$status'";
		}
		else{
			$option_status = "";
		}
		if($jenis != 'All'){
			$option_jenis = "AND produksi_all.`jenis` = '$jenis'";
		}
		else{
			$option_jenis = "";
		}
		if($kelas != 'All'){
			$option_kelas = "AND produksi_all.`kelas` = '$kelas'";
		}
		else{
			$option_kelas = "";
		}
		if($bulan != 'Total'){
			$option_bulan = "AND MONTH(produksi_all.`real_dan_sisa_rencana_tgl_selesai_panen`) = '$bulan'";
		}
		else{
			$option_bulan = "";
		}
		$query = $this->db->query("SELECT
																  SUM(IF(drainase.`value` = 'Berat', 1, (NULL))) AS Berat,
																  SUM(IF(drainase.`value` = 'Sedang', 1, (NULL))) AS Sedang,
																  SUM(IF(drainase.`value` = 'Ringan', 1, (NULL))) AS Ringan,
																  COUNT(produksi_all.`status`) AS Total
																FROM
																  produksi_all,
																  drainase
																WHERE produksi_all.`lokasi`= drainase.`lokasi`
																  AND $pg_wil
																  AND produksi_all.`tahun_panen` = '$tahun'
																	$option_status
																  $option_jenis
																  $option_kelas
																  $option_bulan");

		return $query->row_array();
	}
	function set_lokasi_cost($data){
		$set = implode("', '", $data);
		$query = $this->db->query("INSERT INTO perlocation_hpp_cost
																VALUES
																  (
																    '$set'
																  );");

		return true;
	}
	function set_lokasi_trend_cost($data){
		$set = implode("', '", $data);
		$query = $this->db->query("INSERT INTO perlocation_hpp_trend_cost
																VALUES
																  (
																    '$set'
																  );");

		return true;
	}

	function get_perlocation($w, $tahun){
		if(substr($w, 0, 2) == 'PG'){
			if($w != 'PG'){
				$pg_wil = "help_lokasi_panen.`pg` = '$w'";
			}
			else{
				$pg_wil = "help_lokasi_panen.`pg` LIKE 'PG%'";
			}
		}
		else{
			$pg_wil = "help_lokasi_panen.`wilayah` = '$w'";
		}
		$query = $this->db->query("SELECT
																  produksi_all.`pg`,
																  produksi_all.`wilayah`,
																  produksi_all.`kebun`,
																  produksi_all.`lokasi`,
																  TIMESTAMPDIFF(MONTH, produksi_all.`tgl_awal_perawatan`, produksi_all.`real_dan_sisa_rencana_tgl_selesai_panen`) AS umur,
																  produksi_all.`jenis`,
																  produksi_all.`varietas`,
																  produksi_all.`kelas`,
																  produksi_all.`status`,
																  produksi_all.`real_dan_sisa_rencana_luas` AS luas,
																  produksi_all.`real_dan_sisa_rencana_tonase` AS tonase,
																  produksi_all.`tgl_awal_perawatan`,
																  produksi_all.`real_dan_sisa_rencana_tgl_selesai_panen` - INTERVAL 5 MONTH AS tgl_forcing,
																  produksi_all.`real_dan_sisa_rencana_tgl_selesai_panen` AS tgl_panen,
																  IF(produksi_all.`status` = 'NSFC', element_cost_all.`BPP_NSFC_ha`, element_cost_all.`BPP_NSSC_ha`) AS budget_ha,
																  (hpp_all.`Total` / produksi_all.`real_dan_sisa_rencana_luas`) - IF(produksi_all.`status` = 'NSFC', element_cost_all.`BPP_NSFC_ha`, element_cost_all.`BPP_NSSC_ha`) AS varian,
																  (hpp_all.`Total` / produksi_all.`real_dan_sisa_rencana_luas`) AS real_ha,
																  (hpp_all.`Total` / produksi_all.`real_dan_sisa_rencana_luas`) / IF(produksi_all.`status` = 'NSFC', element_cost_all.`BPP_NSFC_ha`, element_cost_all.`BPP_NSSC_ha`) AS deviasi_ha,
																  IF(((hpp_all.`Total` / produksi_all.`real_dan_sisa_rencana_luas`) / IF(produksi_all.`status` = 'NSFC', element_cost_all.`BPP_NSFC_ha`, element_cost_all.`BPP_NSSC_ha`)) <= 0.98, 'Excellent', IF(((hpp_all.`Total` / produksi_all.`real_dan_sisa_rencana_luas`) / IF(produksi_all.`status` = 'NSFC', element_cost_all.`BPP_NSFC_ha`, element_cost_all.`BPP_NSSC_ha`)) <= 1.02, 'Good', 'Poor')) AS performance_ha,
																  IF(produksi_all.`status` = 'NSFC', element_cost_all.`BPP_NSFC_kg`, element_cost_all.`BPP_NSSC_kg`) AS budget_kg,
																  (hpp_all.`Total` / produksi_all.`real_dan_sisa_rencana_tonase` / 1000) AS real_kg,
																  (hpp_all.`Total` / produksi_all.`real_dan_sisa_rencana_tonase` / 1000) / IF(produksi_all.`status` = 'NSFC', element_cost_all.`BPP_NSFC_kg`, element_cost_all.`BPP_NSSC_kg`) AS deviasi_kg,
																  IF(((hpp_all.`Total` / produksi_all.`real_dan_sisa_rencana_tonase` / 1000) / IF(produksi_all.`status` = 'NSFC', element_cost_all.`BPP_NSFC_kg`, element_cost_all.`BPP_NSSC_kg`)) <= 0.98, 'Excellent', IF(((hpp_all.`Total` / produksi_all.`real_dan_sisa_rencana_tonase` / 1000) / IF(produksi_all.`status` = 'NSFC', element_cost_all.`BPP_NSFC_kg`, element_cost_all.`BPP_NSSC_kg`)) <= 1.02, 'Good', 'Poor')) AS performance_kg,
																  sumber_air.`titik_air`,
																  sumber_air.`sumber_air`
																FROM
																  produksi_all,
																  element_cost_all,
																  hpp_all,
																  help_lokasi_panen
																  LEFT JOIN sumber_air
																    ON help_lokasi_panen.`lokasi_aktif` = sumber_air.`lokasi`
																WHERE $pg_wil
																  -- AND SUBSTRING(help_lokasi_panen.`bulan_panen`, 1, 4) = '$tahun'
																  AND produksi_all.`lokasi` = help_lokasi_panen.`lokasi_aktif`
																  AND produksi_all.`tahun_panen` = SUBSTRING(help_lokasi_panen.`bulan_panen`, 1, 4)
																  AND element_cost_all.`code` = 'ZNTO'
																  AND element_cost_all.`tahun_panen` = SUBSTRING(help_lokasi_panen.`bulan_panen`, 1, 4)
																  AND hpp_all.`lokasi` = help_lokasi_panen.`lokasi_aktif`
																  AND hpp_all.`tahun_panen` = SUBSTRING(help_lokasi_panen.`bulan_panen`, 1, 4)
																ORDER BY help_lokasi_panen.`lokasi_aktif` ASC");

		return $query->result();
	}
}
