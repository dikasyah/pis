<?php

class VolumeAir_model extends CI_Model
{
	function get_volume_air_forcing($lokasi, $tgl_forcing){
		$query = $this->db->query("SELECT
																  SUM(IF(volume_air.`tgl_aplikasi` >= '$tgl_forcing' - INTERVAL 8 MONTH, IF(volume_air.`tgl_aplikasi` < '$tgl_forcing' - INTERVAL 7 MONTH, IF(((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))) OR ((SUBSTRING(waktu_aplikasi, 1, 2) >= '17') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '05') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '05') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))), 1, (NULL)), (NULL)), (NULL))) AS G1,
																  SUM(IF(volume_air.`tgl_aplikasi` >= '$tgl_forcing' - INTERVAL 7 MONTH, IF(volume_air.`tgl_aplikasi` < '$tgl_forcing' - INTERVAL 6 MONTH, IF(((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))) OR ((SUBSTRING(waktu_aplikasi, 1, 2) >= '17') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '05') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '05') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))), 1, (NULL)), (NULL)), (NULL))) AS G2,
																  SUM(IF(volume_air.`tgl_aplikasi` >= '$tgl_forcing' - INTERVAL 6 MONTH, IF(volume_air.`tgl_aplikasi` < '$tgl_forcing' - INTERVAL 5 MONTH, IF(((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))) OR ((SUBSTRING(waktu_aplikasi, 1, 2) >= '17') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '05') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '05') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))), 1, (NULL)), (NULL)), (NULL))) AS G3,
																  SUM(IF(volume_air.`tgl_aplikasi` >= '$tgl_forcing' - INTERVAL 5 MONTH, IF(volume_air.`tgl_aplikasi` < '$tgl_forcing' - INTERVAL 4 MONTH, IF(((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))) OR ((SUBSTRING(waktu_aplikasi, 1, 2) >= '17') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '05') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '05') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))), 1, (NULL)), (NULL)), (NULL))) AS G4,
																  SUM(IF(volume_air.`tgl_aplikasi` >= '$tgl_forcing' - INTERVAL 4 MONTH, IF(volume_air.`tgl_aplikasi` < '$tgl_forcing' - INTERVAL 3 MONTH, IF(((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))) OR ((SUBSTRING(waktu_aplikasi, 1, 2) >= '17') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '05') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '05') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))), 1, (NULL)), (NULL)), (NULL))) AS G5,
																  SUM(IF(volume_air.`tgl_aplikasi` >= '$tgl_forcing' - INTERVAL 3 MONTH, IF(volume_air.`tgl_aplikasi` < '$tgl_forcing' - INTERVAL 2 MONTH, IF(((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))) OR ((SUBSTRING(waktu_aplikasi, 1, 2) >= '17') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '05') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '05') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))), 1, (NULL)), (NULL)), (NULL))) AS G6,
																  SUM(IF(volume_air.`tgl_aplikasi` >= '$tgl_forcing' - INTERVAL 2 MONTH, IF(volume_air.`tgl_aplikasi` < '$tgl_forcing' - INTERVAL 1 MONTH, IF(((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))) OR ((SUBSTRING(waktu_aplikasi, 1, 2) >= '17') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '05') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '05') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))), 1, (NULL)), (NULL)), (NULL))) AS G7,
																  SUM(IF(volume_air.`tgl_aplikasi` >= '$tgl_forcing' - INTERVAL 1 MONTH, IF(volume_air.`tgl_aplikasi` < '$tgl_forcing' + INTERVAL 0 MONTH, IF(((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))) OR ((SUBSTRING(waktu_aplikasi, 1, 2) >= '17') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '05') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '05') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))), 1, (NULL)), (NULL)), (NULL))) AS G8,
																  SUM(IF(volume_air.`tgl_aplikasi` >= '$tgl_forcing' + INTERVAL 0 MONTH, IF(volume_air.`tgl_aplikasi` < '$tgl_forcing' + INTERVAL 1 MONTH, IF(((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))) OR ((SUBSTRING(waktu_aplikasi, 1, 2) >= '17') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '05') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '05') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))), 1, (NULL)), (NULL)), (NULL))) AS G9,
																  SUM(IF(volume_air.`tgl_aplikasi` >= '$tgl_forcing' - INTERVAL 8 MONTH, IF(volume_air.`tgl_aplikasi` < '$tgl_forcing' - INTERVAL 7 MONTH, IF(((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))) OR ((SUBSTRING(waktu_aplikasi, 1, 2) >= '17') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '05') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '05') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))), (NULL), 1), (NULL)), (NULL))) AS O1,
																  SUM(IF(volume_air.`tgl_aplikasi` >= '$tgl_forcing' - INTERVAL 7 MONTH, IF(volume_air.`tgl_aplikasi` < '$tgl_forcing' - INTERVAL 6 MONTH, IF(((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))) OR ((SUBSTRING(waktu_aplikasi, 1, 2) >= '17') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '05') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '05') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))), (NULL), 1), (NULL)), (NULL))) AS O2,
																  SUM(IF(volume_air.`tgl_aplikasi` >= '$tgl_forcing' - INTERVAL 6 MONTH, IF(volume_air.`tgl_aplikasi` < '$tgl_forcing' - INTERVAL 5 MONTH, IF(((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))) OR ((SUBSTRING(waktu_aplikasi, 1, 2) >= '17') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '05') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '05') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))), (NULL), 1), (NULL)), (NULL))) AS O3,
																  SUM(IF(volume_air.`tgl_aplikasi` >= '$tgl_forcing' - INTERVAL 5 MONTH, IF(volume_air.`tgl_aplikasi` < '$tgl_forcing' - INTERVAL 4 MONTH, IF(((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))) OR ((SUBSTRING(waktu_aplikasi, 1, 2) >= '17') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '05') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '05') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))), (NULL), 1), (NULL)), (NULL))) AS O4,
																  SUM(IF(volume_air.`tgl_aplikasi` >= '$tgl_forcing' - INTERVAL 4 MONTH, IF(volume_air.`tgl_aplikasi` < '$tgl_forcing' - INTERVAL 3 MONTH, IF(((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))) OR ((SUBSTRING(waktu_aplikasi, 1, 2) >= '17') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '05') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '05') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))), (NULL), 1), (NULL)), (NULL))) AS O5,
																  SUM(IF(volume_air.`tgl_aplikasi` >= '$tgl_forcing' - INTERVAL 3 MONTH, IF(volume_air.`tgl_aplikasi` < '$tgl_forcing' - INTERVAL 2 MONTH, IF(((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))) OR ((SUBSTRING(waktu_aplikasi, 1, 2) >= '17') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '05') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '05') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))), (NULL), 1), (NULL)), (NULL))) AS O6,
																  SUM(IF(volume_air.`tgl_aplikasi` >= '$tgl_forcing' - INTERVAL 2 MONTH, IF(volume_air.`tgl_aplikasi` < '$tgl_forcing' - INTERVAL 1 MONTH, IF(((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))) OR ((SUBSTRING(waktu_aplikasi, 1, 2) >= '17') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '05') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '05') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))), (NULL), 1), (NULL)), (NULL))) AS O7,
																  SUM(IF(volume_air.`tgl_aplikasi` >= '$tgl_forcing' - INTERVAL 1 MONTH, IF(volume_air.`tgl_aplikasi` < '$tgl_forcing' + INTERVAL 0 MONTH, IF(((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))) OR ((SUBSTRING(waktu_aplikasi, 1, 2) >= '17') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '05') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '05') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))), (NULL), 1), (NULL)), (NULL))) AS O8,
																  SUM(IF(volume_air.`tgl_aplikasi` >= '$tgl_forcing' + INTERVAL 0 MONTH, IF(volume_air.`tgl_aplikasi` < '$tgl_forcing' + INTERVAL 1 MONTH, IF(((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))) OR ((SUBSTRING(waktu_aplikasi, 1, 2) >= '17') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '05') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '05') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))), (NULL), 1), (NULL)), (NULL))) AS O9
																FROM
																  volume_air
																WHERE volume_air.`lokasi` = '$lokasi'");

		return $query->row_array();
	}
	function get_volume_air_forcing_summary($w, $status, $jenis, $kelas, $tahun, $bulan, $umur, $activity, $activity_bulan, $activity_tahun){
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
		if($activity_bulan != 'Total'){
			$option_activity_bulan = "AND MONTH(volume_air.`tgl_aplikasi`) = '$activity_bulan'";
		}
		else{
			$option_activity_bulan = "";
		}
		if($activity_tahun != 'Total'){
			$option_activity_tahun = "AND YEAR(volume_air.`tgl_aplikasi`) = '$activity_tahun'";
		}
		else{
			$option_activity_tahun = "";
		}
		switch ($activity) {
			case 'Booster':
				$option_activity = "AND volume_air.`deskripsi` IN (
															'Herbi booster FC',
															'Herbi booster FC',
															'Herbi booster RC',
															'Herbi booster SC'
														)";
			break;
			case 'Spray':
				$option_activity = "AND volume_air.`deskripsi` IN (
															'Foliar Spray PC',
															'Foliar Spray FC',
															'Foliar Spray RC',
															'Foliar Spray SC'
														)";
			break;
			case 'Forcing':
				$option_activity = "AND volume_air.`deskripsi` IN (
															'Forcing'
														)";
			break;
			case 'Pre':
				$option_activity = "AND volume_air.`deskripsi` IN (
															'Herbi Pre'
														)";
			break;
			case 'Post':
				$option_activity = "AND volume_air.`deskripsi` IN (
															'Herbi post'
														)";
			break;
			case 'Insecticide':
				$option_activity = "AND volume_air.`deskripsi` IN (
															'Insektisida'
														)";
			break;
			case 'Ripening':
				$option_activity = "AND volume_air.`deskripsi` IN (
															'Ripening'
														)";
			break;

			default:
				$option_activity = "AND volume_air.`deskripsi` IN (
															'Herbi booster FC',
															'Herbi booster FC',
															'Herbi booster RC',
															'Herbi booster SC',
															'Foliar Spray PC',
															'Foliar Spray FC',
															'Foliar Spray RC',
															'Foliar Spray SC',
															'Forcing',
															'Herbi Pre',
															'Herbi post',
															'Insektisida',
															'Ripening'
														)";
			break;
		}
		$query = $this->db->query("SELECT
																	SUM(IF(volume_air.`tgl_aplikasi` >= perlocation_lokasi.`tgl_forcing` - INTERVAL 8 MONTH, IF(volume_air.`tgl_aplikasi` < perlocation_lokasi.`tgl_forcing` - INTERVAL 7 MONTH, IF(((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))) OR ((SUBSTRING(waktu_aplikasi, 1, 2) >= '17') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '05') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '05') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))), 1, (NULL)), (NULL)), (NULL))) AS G1,
																	SUM(IF(volume_air.`tgl_aplikasi` >= perlocation_lokasi.`tgl_forcing` - INTERVAL 7 MONTH, IF(volume_air.`tgl_aplikasi` < perlocation_lokasi.`tgl_forcing` - INTERVAL 6 MONTH, IF(((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))) OR ((SUBSTRING(waktu_aplikasi, 1, 2) >= '17') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '05') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '05') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))), 1, (NULL)), (NULL)), (NULL))) AS G2,
																	SUM(IF(volume_air.`tgl_aplikasi` >= perlocation_lokasi.`tgl_forcing` - INTERVAL 6 MONTH, IF(volume_air.`tgl_aplikasi` < perlocation_lokasi.`tgl_forcing` - INTERVAL 5 MONTH, IF(((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))) OR ((SUBSTRING(waktu_aplikasi, 1, 2) >= '17') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '05') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '05') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))), 1, (NULL)), (NULL)), (NULL))) AS G3,
																	SUM(IF(volume_air.`tgl_aplikasi` >= perlocation_lokasi.`tgl_forcing` - INTERVAL 5 MONTH, IF(volume_air.`tgl_aplikasi` < perlocation_lokasi.`tgl_forcing` - INTERVAL 4 MONTH, IF(((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))) OR ((SUBSTRING(waktu_aplikasi, 1, 2) >= '17') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '05') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '05') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))), 1, (NULL)), (NULL)), (NULL))) AS G4,
																	SUM(IF(volume_air.`tgl_aplikasi` >= perlocation_lokasi.`tgl_forcing` - INTERVAL 4 MONTH, IF(volume_air.`tgl_aplikasi` < perlocation_lokasi.`tgl_forcing` - INTERVAL 3 MONTH, IF(((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))) OR ((SUBSTRING(waktu_aplikasi, 1, 2) >= '17') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '05') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '05') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))), 1, (NULL)), (NULL)), (NULL))) AS G5,
																	SUM(IF(volume_air.`tgl_aplikasi` >= perlocation_lokasi.`tgl_forcing` - INTERVAL 3 MONTH, IF(volume_air.`tgl_aplikasi` < perlocation_lokasi.`tgl_forcing` - INTERVAL 2 MONTH, IF(((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))) OR ((SUBSTRING(waktu_aplikasi, 1, 2) >= '17') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '05') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '05') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))), 1, (NULL)), (NULL)), (NULL))) AS G6,
																	SUM(IF(volume_air.`tgl_aplikasi` >= perlocation_lokasi.`tgl_forcing` - INTERVAL 2 MONTH, IF(volume_air.`tgl_aplikasi` < perlocation_lokasi.`tgl_forcing` - INTERVAL 1 MONTH, IF(((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))) OR ((SUBSTRING(waktu_aplikasi, 1, 2) >= '17') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '05') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '05') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))), 1, (NULL)), (NULL)), (NULL))) AS G7,
																	SUM(IF(volume_air.`tgl_aplikasi` >= perlocation_lokasi.`tgl_forcing` - INTERVAL 1 MONTH, IF(volume_air.`tgl_aplikasi` < perlocation_lokasi.`tgl_forcing` + INTERVAL 0 MONTH, IF(((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))) OR ((SUBSTRING(waktu_aplikasi, 1, 2) >= '17') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '05') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '05') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))), 1, (NULL)), (NULL)), (NULL))) AS G8,
																	SUM(IF(volume_air.`tgl_aplikasi` >= perlocation_lokasi.`tgl_forcing` + INTERVAL 0 MONTH, IF(volume_air.`tgl_aplikasi` < perlocation_lokasi.`tgl_forcing` + INTERVAL 1 MONTH, IF(((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))) OR ((SUBSTRING(waktu_aplikasi, 1, 2) >= '17') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '05') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '05') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))), 1, (NULL)), (NULL)), (NULL))) AS G9,
																	SUM(IF(volume_air.`tgl_aplikasi` >= perlocation_lokasi.`tgl_forcing` - INTERVAL 8 MONTH, IF(volume_air.`tgl_aplikasi` < perlocation_lokasi.`tgl_forcing` - INTERVAL 7 MONTH, IF(((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))) OR ((SUBSTRING(waktu_aplikasi, 1, 2) >= '17') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '05') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '05') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))), (NULL), 1), (NULL)), (NULL))) AS O1,
																	SUM(IF(volume_air.`tgl_aplikasi` >= perlocation_lokasi.`tgl_forcing` - INTERVAL 7 MONTH, IF(volume_air.`tgl_aplikasi` < perlocation_lokasi.`tgl_forcing` - INTERVAL 6 MONTH, IF(((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))) OR ((SUBSTRING(waktu_aplikasi, 1, 2) >= '17') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '05') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '05') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))), (NULL), 1), (NULL)), (NULL))) AS O2,
																	SUM(IF(volume_air.`tgl_aplikasi` >= perlocation_lokasi.`tgl_forcing` - INTERVAL 6 MONTH, IF(volume_air.`tgl_aplikasi` < perlocation_lokasi.`tgl_forcing` - INTERVAL 5 MONTH, IF(((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))) OR ((SUBSTRING(waktu_aplikasi, 1, 2) >= '17') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '05') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '05') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))), (NULL), 1), (NULL)), (NULL))) AS O3,
																	SUM(IF(volume_air.`tgl_aplikasi` >= perlocation_lokasi.`tgl_forcing` - INTERVAL 5 MONTH, IF(volume_air.`tgl_aplikasi` < perlocation_lokasi.`tgl_forcing` - INTERVAL 4 MONTH, IF(((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))) OR ((SUBSTRING(waktu_aplikasi, 1, 2) >= '17') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '05') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '05') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))), (NULL), 1), (NULL)), (NULL))) AS O4,
																	SUM(IF(volume_air.`tgl_aplikasi` >= perlocation_lokasi.`tgl_forcing` - INTERVAL 4 MONTH, IF(volume_air.`tgl_aplikasi` < perlocation_lokasi.`tgl_forcing` - INTERVAL 3 MONTH, IF(((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))) OR ((SUBSTRING(waktu_aplikasi, 1, 2) >= '17') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '05') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '05') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))), (NULL), 1), (NULL)), (NULL))) AS O5,
																	SUM(IF(volume_air.`tgl_aplikasi` >= perlocation_lokasi.`tgl_forcing` - INTERVAL 3 MONTH, IF(volume_air.`tgl_aplikasi` < perlocation_lokasi.`tgl_forcing` - INTERVAL 2 MONTH, IF(((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))) OR ((SUBSTRING(waktu_aplikasi, 1, 2) >= '17') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '05') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '05') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))), (NULL), 1), (NULL)), (NULL))) AS O6,
																	SUM(IF(volume_air.`tgl_aplikasi` >= perlocation_lokasi.`tgl_forcing` - INTERVAL 2 MONTH, IF(volume_air.`tgl_aplikasi` < perlocation_lokasi.`tgl_forcing` - INTERVAL 1 MONTH, IF(((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))) OR ((SUBSTRING(waktu_aplikasi, 1, 2) >= '17') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '05') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '05') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))), (NULL), 1), (NULL)), (NULL))) AS O7,
																	SUM(IF(volume_air.`tgl_aplikasi` >= perlocation_lokasi.`tgl_forcing` - INTERVAL 1 MONTH, IF(volume_air.`tgl_aplikasi` < perlocation_lokasi.`tgl_forcing` + INTERVAL 0 MONTH, IF(((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))) OR ((SUBSTRING(waktu_aplikasi, 1, 2) >= '17') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '05') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '05') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))), (NULL), 1), (NULL)), (NULL))) AS O8,
																	SUM(IF(volume_air.`tgl_aplikasi` >= perlocation_lokasi.`tgl_forcing` + INTERVAL 0 MONTH, IF(volume_air.`tgl_aplikasi` < perlocation_lokasi.`tgl_forcing` + INTERVAL 1 MONTH, IF(((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))) OR ((SUBSTRING(waktu_aplikasi, 1, 2) >= '17') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '05') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '05') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00')))), (NULL), 1), (NULL)), (NULL))) AS O9
																FROM
																  volume_air,
																  perlocation_lokasi
																WHERE $pg_wil
																  AND volume_air.`tgl_aplikasi` >= perlocation_lokasi.`tgl_perawatan`
																  AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  AND volume_air.`lokasi` = perlocation_lokasi.`lokasi`
																  $option_status
																  $option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur
																  $option_activity_bulan
																  $option_activity_tahun
																  $option_activity");

		return $query->row_array();
	}
	function get_golden_time_data($lokasi){
		$query = $this->db->query("SELECT
																  DISTINCT(volume_air.`tgl_aplikasi`),
																  (IF(((SUBSTRING(volume_air, 1, 2) >= '06') AND ((SUBSTRING(volume_air, 9, 2) < '10') OR ((SUBSTRING(volume_air, 9, 2) = '10') AND (SUBSTRING(volume_air, 12, 2) = '00')))) OR ((SUBSTRING(volume_air, 1, 2) >= '17') AND ((SUBSTRING(volume_air, 9, 2) < '05') OR ((SUBSTRING(volume_air, 9, 2) = '05') AND (SUBSTRING(volume_air, 12, 2) = '00')))), 1, (NULL))) AS GT,
																  (IF(((SUBSTRING(volume_air, 1, 2) >= '06') AND ((SUBSTRING(volume_air, 9, 2) < '10') OR ((SUBSTRING(volume_air, 9, 2) = '10') AND (SUBSTRING(volume_air, 12, 2) = '00')))) OR ((SUBSTRING(volume_air, 1, 2) >= '17') AND ((SUBSTRING(volume_air, 9, 2) < '05') OR ((SUBSTRING(volume_air, 9, 2) = '05') AND (SUBSTRING(volume_air, 12, 2) = '00')))), (NULL), 1)) AS OT
																FROM
																  volume_air
																WHERE volume_air.`lokasi` = '$lokasi'
																  AND volume_air.`deskripsi` IN (
																		'Foliar Spray PC',
																		'Foliar Spray FC',
																		'Foliar Spray RC',
																		'Foliar Spray SC'
																	)");

		return $query->result();
	}
	function get_golden_time_data_summary($w, $status, $jenis, $kelas, $tahun, $bulan, $umur, $activity, $activity_bulan, $activity_tahun){
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
		if($activity_bulan != 'Total'){
			$option_activity_bulan = "AND MONTH(volume_air.`tgl_aplikasi`) = '$activity_bulan'";
		}
		else{
			$option_activity_bulan = "";
		}
		if($activity_tahun != 'Total'){
			$option_activity_tahun = "AND YEAR(volume_air.`tgl_aplikasi`) = '$activity_tahun'";
		}
		else{
			$option_activity_tahun = "";
		}
		switch ($activity) {
			case 'Booster':
				$option_activity = "AND volume_air.`deskripsi` IN (
															'Herbi booster FC',
															'Herbi booster FC',
															'Herbi booster RC',
															'Herbi booster SC'
														)";
			break;
			case 'Spray':
				$option_activity = "AND volume_air.`deskripsi` IN (
															'Foliar Spray PC',
															'Foliar Spray FC',
															'Foliar Spray RC',
															'Foliar Spray SC'
														)";
			break;
			case 'Forcing':
				$option_activity = "AND volume_air.`deskripsi` IN (
															'Forcing'
														)";
			break;
			case 'Pre':
				$option_activity = "AND volume_air.`deskripsi` IN (
															'Herbi Pre'
														)";
			break;
			case 'Post':
				$option_activity = "AND volume_air.`deskripsi` IN (
															'Herbi post'
														)";
			break;
			case 'Insecticide':
				$option_activity = "AND volume_air.`deskripsi` IN (
															'Insektisida'
														)";
			break;
			case 'Ripening':
				$option_activity = "AND volume_air.`deskripsi` IN (
															'Ripening'
														)";
			break;

			default:
				$option_activity = "AND volume_air.`deskripsi` IN (
															'Herbi booster FC',
															'Herbi booster FC',
															'Herbi booster RC',
															'Herbi booster SC',
															'Foliar Spray PC',
															'Foliar Spray FC',
															'Foliar Spray RC',
															'Foliar Spray SC',
															'Forcing',
															'Herbi Pre',
															'Herbi post',
															'Insektisida',
															'Ripening'
														)";
			break;
		}
		$query = $this->db->query("SELECT
																  DISTINCT(volume_air.`tgl_aplikasi`),
																  (IF(((SUBSTRING(volume_air, 1, 2) >= '06') AND ((SUBSTRING(volume_air, 9, 2) < '10') OR ((SUBSTRING(volume_air, 9, 2) = '10') AND (SUBSTRING(volume_air, 12, 2) = '00')))) OR ((SUBSTRING(volume_air, 1, 2) >= '17') AND ((SUBSTRING(volume_air, 9, 2) < '05') OR ((SUBSTRING(volume_air, 9, 2) = '05') AND (SUBSTRING(volume_air, 12, 2) = '00')))), 1, (NULL))) AS GT,
																  (IF(((SUBSTRING(volume_air, 1, 2) >= '06') AND ((SUBSTRING(volume_air, 9, 2) < '10') OR ((SUBSTRING(volume_air, 9, 2) = '10') AND (SUBSTRING(volume_air, 12, 2) = '00')))) OR ((SUBSTRING(volume_air, 1, 2) >= '17') AND ((SUBSTRING(volume_air, 9, 2) < '05') OR ((SUBSTRING(volume_air, 9, 2) = '05') AND (SUBSTRING(volume_air, 12, 2) = '00')))), (NULL), 1)) AS OT
																FROM
																  volume_air,
																  perlocation_lokasi
																WHERE $pg_wil
																  AND volume_air.`tgl_aplikasi` >= perlocation_lokasi.`tgl_perawatan`
																  AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  AND volume_air.`lokasi` = perlocation_lokasi.`lokasi`
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur
																  $option_activity_bulan
																  $option_activity_tahun
																  $option_activity");

		return $query->result();
	}
	function get_forcing_data($lokasi, $wilayah){
		$query = $this->db->query("SELECT
																  DISTINCT($wilayah.`tgl_realisasi`)
																FROM
																  $wilayah
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`aktivitas_code` = '1311131711'");

		return $query->result();
	}
	function get_frekuensi_volume_air($lokasi, $option){
		switch ($option) {
			case 'GT':
				$select = "IF((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00'))), IF(volume_air = 2000, 1, (NULL)), (NULL)) AS VA1,
									IF((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00'))), IF(volume_air = 3000, 1, (NULL)), (NULL)) AS VA2,
									IF((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00'))), IF(volume_air = 4000, 1, (NULL)), (NULL)) AS VA3,
									IF((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00'))), IF(volume_air > 4000, 1, (NULL)), (NULL)) AS VA4";
			break;

			default:
				$select = "IF((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00'))), (NULL), IF(volume_air = 2000, 1, (NULL))) AS VA1,
									IF((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00'))), (NULL), IF(volume_air = 3000, 1, (NULL))) AS VA2,
									IF((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00'))), (NULL), IF(volume_air = 4000, 1, (NULL))) AS VA3,
									IF((SUBSTRING(waktu_aplikasi, 1, 2) >= '06') AND ((SUBSTRING(waktu_aplikasi, 9, 2) < '10') OR ((SUBSTRING(waktu_aplikasi, 9, 2) = '10') AND (SUBSTRING(waktu_aplikasi, 12, 2) = '00'))), (NULL), IF(volume_air > 4000, 1, (NULL))) AS VA4";
			break;
		}
		$query = $this->db->query("SELECT
																  DISTINCT(volume_air.`tgl_aplikasi`),
																  $select
																FROM
																  volume_air
																WHERE volume_air.`lokasi` = '$lokasi'");

		return $query->result();
	}
	function get_frekuensi_volume_air_summary($w, $status, $jenis, $kelas, $tahun, $bulan, $umur, $activity, $activity_bulan, $activity_tahun){
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
		if($activity_bulan != 'Total'){
			$option_activity_bulan = "AND MONTH(volume_air.`tgl_aplikasi`) = '$activity_bulan'";
		}
		else{
			$option_activity_bulan = "";
		}
		if($activity_tahun != 'Total'){
			$option_activity_tahun = "AND YEAR(volume_air.`tgl_aplikasi`) = '$activity_tahun'";
		}
		else{
			$option_activity_tahun = "";
		}
		switch ($activity) {
			case 'Booster':
				$option_activity = "AND volume_air.`deskripsi` IN (
															'Herbi booster FC',
															'Herbi booster FC',
															'Herbi booster RC',
															'Herbi booster SC'
														)";
			break;
			case 'Spray':
				$option_activity = "AND volume_air.`deskripsi` IN (
															'Foliar Spray PC',
															'Foliar Spray FC',
															'Foliar Spray RC',
															'Foliar Spray SC'
														)";
			break;
			case 'Forcing':
				$option_activity = "AND volume_air.`deskripsi` IN (
															'Forcing'
														)";
			break;
			case 'Pre':
				$option_activity = "AND volume_air.`deskripsi` IN (
															'Herbi Pre'
														)";
			break;
			case 'Post':
				$option_activity = "AND volume_air.`deskripsi` IN (
															'Herbi post'
														)";
			break;
			case 'Insecticide':
				$option_activity = "AND volume_air.`deskripsi` IN (
															'Insektisida'
														)";
			break;
			case 'Ripening':
				$option_activity = "AND volume_air.`deskripsi` IN (
															'Ripening'
														)";
			break;

			default:
				$option_activity = "AND volume_air.`deskripsi` IN (
															'Herbi booster FC',
															'Herbi booster FC',
															'Herbi booster RC',
															'Herbi booster SC',
															'Foliar Spray PC',
															'Foliar Spray FC',
															'Foliar Spray RC',
															'Foliar Spray SC',
															'Forcing',
															'Herbi Pre',
															'Herbi post',
															'Insektisida',
															'Ripening'
														)";
			break;
		}
		$query = $this->db->query("SELECT
																  DISTINCT(volume_air.`tgl_aplikasi`),
																  IF(volume_air = 2000, 1, (NULL)) AS VA1,
																  IF(volume_air = 3000, 1, (NULL)) AS VA2,
																  IF(volume_air = 4000, 1, (NULL)) AS VA3,
																  IF(volume_air > 4000, 1, (NULL)) AS VA4
																FROM
																  volume_air,
																  perlocation_lokasi
																WHERE $pg_wil
																  AND volume_air.`tgl_aplikasi` >= perlocation_lokasi.`tgl_perawatan`
																  AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  AND volume_air.`lokasi` = perlocation_lokasi.`lokasi`
																  $option_status
																  $option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur
																  $option_activity_bulan
																  $option_activity_tahun
																  $option_activity");

		return $query->result();
	}
}
