<?php
	class PerlocationPM4_model extends CI_Model{

		function get_propotion_bibit_st($w, $status, $jenis, $kelas, $tahun, $bulan, $umur){
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
																  SUM(IF(perlocation_lokasi.`jenis` = 'CR', 1, NULL)) AS CR,
																  SUM(IF(perlocation_lokasi.`jenis` = 'SC', 1, NULL)) AS SC,
																  SUM(IF(perlocation_lokasi.`jenis` = 'AN', 1, NULL)) AS AN,
																  SUM(IF(perlocation_lokasi.`kelas` = 'E', 1, NULL)) AS E,
																  SUM(IF(perlocation_lokasi.`kelas` = 'B', 1, NULL)) AS B,
																  SUM(IF(perlocation_lokasi.`kelas` = 'S', 1, NULL)) AS S,
																  SUM(IF(perlocation_lokasi.`kelas` = 'K', 1, NULL)) AS K,
																  SUM(1) AS Total
																FROM
																  perlocation_lokasi
																WHERE $pg_wil
																	AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
  																AND perlocation_lokasi.`status` = 'NSFC'
																	$option_status
																	$option_jenis
																	$option_kelas
																	$option_bulan
																	$option_umur");

			return $query->row_array();
		}
		function get_quality_st($w, $status, $jenis, $kelas, $tahun, $bulan, $umur){
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
																	  perlocation_lokasi.`lokasi` AS Lokasi,
																	  MAX(pengamatan_tanam.`Conformance_Conf_-_Jrk_Tnm_Antr_Baris`) AS ST1,
																	  MAX(pengamatan_tanam.`Conformance_Conf_-_Jrk_Tnm_Dlm_Baris`) AS ST2,
																	  MAX(pengamatan_tanam.`Conformance_Conf_-_Kedalaman_Tanam`) AS ST3,
  																	MAX((pengamatan_tanam.`Real_-_Populasi_Tanaman` / pengamatan_tanam.`Target_-_Populasi_Tanaman`) * 100) AS ST4
																	FROM
																	  perlocation_lokasi
																	  LEFT JOIN pengamatan_tanam
																	  ON perlocation_lokasi.`lokasi` = pengamatan_tanam.`Lokasi`
																	WHERE $pg_wil
																		AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
  																	AND perlocation_lokasi.`status` = 'NSFC'
																	  $option_status
																		$option_jenis
																	  $option_kelas
																	  $option_bulan
																		$option_umur
																	GROUP BY perlocation_lokasi.`lokasi`
																	ORDER BY perlocation_lokasi.`lokasi` ASC");

			return $query->result();
		}
		function get_timeline_bk($w, $status, $jenis, $kelas, $tahun, $bulan, $umur, $status_bk){
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
			if($status_bk != 'Total'){
				$OptionStatusBK = "AND perlocation_lokasi.`status_bk` = '$status_bk'";
			}
			else{
				$OptionStatusBK = "";
			}
			$query = $this->db->query("SELECT
																	  SUM(IF(perlocation_pm_activity_bk.`activity` = 'Chopper', perlocation_pm_activity_bk.`biaya`, NULL)) AS CChopper,
																	  SUM(IF(perlocation_pm_activity_bk.`activity` = 'Chopper', 1, NULL)) AS TChopper,
																	  SUM(IF(perlocation_pm_activity_bk.`activity` = 'Moldboard', perlocation_pm_activity_bk.`biaya`, NULL)) AS CMoldboard,
																	  SUM(IF(perlocation_pm_activity_bk.`activity` = 'Moldboard', 1, NULL)) AS TMoldboard,
																	  SUM(IF(perlocation_pm_activity_bk.`activity` = 'Diskplow', perlocation_pm_activity_bk.`biaya`, NULL)) AS CDiskplow,
																	  SUM(IF(perlocation_pm_activity_bk.`activity` = 'Diskplow', 1, NULL)) AS TDiskplow,
																	  SUM(IF(perlocation_pm_activity_bk.`activity` = 'Harrow', perlocation_pm_activity_bk.`biaya`, NULL)) AS CHarrow,
																	  SUM(IF(perlocation_pm_activity_bk.`activity` = 'Harrow', 1, NULL)) AS THarrow,
																	  SUM(IF(perlocation_pm_activity_bk.`activity` = 'Sub Soiling', perlocation_pm_activity_bk.`biaya`, NULL)) AS CSubSoiling,
																	  SUM(IF(perlocation_pm_activity_bk.`activity` = 'Sub Soiling', 1, NULL)) AS TSubSoiling,

																	  SUM(IF(perlocation_pm_activity_bk.`activity` = 'Finish Rotary', perlocation_pm_activity_bk.`biaya`, NULL)) AS CFinishRotary,
																	  SUM(IF(perlocation_pm_activity_bk.`activity` = 'Finish Rotary', 1, NULL)) AS TFinishRotary,
																	  SUM(IF(perlocation_pm_activity_bk.`activity` = 'Finish Harrow', perlocation_pm_activity_bk.`biaya`, NULL)) AS CFinishHarrow,
																	  SUM(IF(perlocation_pm_activity_bk.`activity` = 'Finish Harrow', 1, NULL)) AS TFinishHarrow,
																	  SUM(IF(perlocation_pm_activity_bk.`activity` = 'Ridger', perlocation_pm_activity_bk.`biaya`, NULL)) AS CRidger,
																	  SUM(IF(perlocation_pm_activity_bk.`activity` = 'Ridger', 1, NULL)) AS TRidger,
																	  SUM(IF(perlocation_pm_activity_bk.`activity` = 'Jalan', perlocation_pm_activity_bk.`biaya`, NULL)) AS CJalan,
																	  SUM(IF(perlocation_pm_activity_bk.`activity` = 'Jalan', 1, NULL)) AS TJalan,
																	  SUM(IF(perlocation_pm_activity_bk.`activity` = 'Saluran', perlocation_pm_activity_bk.`biaya`, NULL)) AS CSaluran,
																	  SUM(IF(perlocation_pm_activity_bk.`activity` = 'Saluran', 1, NULL)) AS TSaluran
																	FROM
																	  perlocation_lokasi
																	  LEFT JOIN perlocation_pm_activity_bk
																	    ON perlocation_lokasi.`lokasi` = perlocation_pm_activity_bk.`lokasi`
																	    AND perlocation_lokasi.`keterangan` = perlocation_pm_activity_bk.`keterangan`
																	WHERE $pg_wil
																		AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
  																	AND perlocation_lokasi.`status` = 'NSFC'
																		$OptionStatusBK
																	  $option_status
																		$option_jenis
																	  $option_kelas
																	  $option_bulan
																		$option_umur");

			return $query->row_array();
		}
		function get_fellow_periode($w, $status, $jenis, $kelas, $tahun, $bulan, $umur, $status_bk){
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
			if($status_bk != 'Total'){
				$OptionStatusBK = "AND perlocation_lokasi.`status_bk` = '$status_bk'";
			}
			else{
				$OptionStatusBK = "";
			}
			$query = $this->db->query("SELECT
																	  SUM(TIMESTAMPDIFF(DAY, perlocation_lokasi.`TGLBK`, perlocation_lokasi.`TGLST`)) AS FellowPeriod,
																	  SUM(1) AS Total
																	FROM
																	  perlocation_lokasi
																	WHERE $pg_wil
																		AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																	  AND perlocation_lokasi.`status` = 'NSFC'
																	  AND TIMESTAMPDIFF(DAY, perlocation_lokasi.`TGLBK`, perlocation_lokasi.`TGLST`) > 0
																		$OptionStatusBK
																	  $option_status
																		$option_jenis
																	  $option_kelas
																	  $option_bulan
																		$option_umur");

			return $query->row_array();
		}
		function get_charge_bk($jenis, $type){
			if($jenis == 'Implement'){
				switch ($type) {
					case 'Chopper':
						$OptionType = "AND std_nama_alat_bk.`jenis` IN (
													    'Berti',
													    'Fae',
													    'Fecon',
													    'GGP',
													    'Jumbo',
													    'Kulin',
													    'LU'
													  )";
					break;
					case 'Moldboard':
						$OptionType = "AND std_nama_alat_bk.`jenis` IN (
													    'Kulin',
													    '2.5 BTR',
													    '5 BTR',
													    'Revers. Kulin',
													    'Single Kulin',
													    'GGP',
													    'Howard'
													  )";
					break;
					case 'Diskplow':
						$OptionType = "AND std_nama_alat_bk.`jenis` IN (
													    'PGN0D01',
													    'KDK0D01',
													    'Rental'
													  )";
					break;
					case 'Harrow':
						$OptionType = "AND std_nama_alat_bk.`jenis` IN (
													    'CH64',
													    'FHK',
													    'TRCW',
													    'TRH',
													    'Rental'
													  )";
					break;
					case 'Sub Soiling':
						$OptionType = "AND std_nama_alat_bk.`jenis` IN (
															'Mounted',
															'R&R'
														)";
					break;
					case 'Finish Rotary':
						$OptionType = "AND std_nama_alat_bk.`jenis` IN (
													    'Berti',
													    'Fae',
													    'Fecon',
													    'Jumbo',
													    'Kulin',
													    'LU',
													    'Tiller Nortwest',
													    'Rental'
													  )";
					break;
					case 'Finish Harrow':
						$OptionType = "AND std_nama_alat_bk.`jenis` IN (
													    'CH64',
													    'FHK',
													    'TRCW',
													    'TRH',
													    'Rental'
													  )";
					break;
					case 'Ridger':
						$OptionType = "AND std_nama_alat_bk.`jenis` IN (
													    'Palir',
													    'Saluran',
													    'Single Row',
													    'Double Row',
													    'Standard',
													    'GGP',
													    'Rental'
													  )";
					break;
					case 'Saluran':
						$OptionType = "AND std_nama_alat_bk.`jenis` IN (
													    'Ridger Standard',
													    'Ridger Saluran',
													    'Ridger GGP'
													  )";
					break;
					case 'Jalan':
						$OptionType = "AND std_nama_alat_bk.`jenis` IN (
													    ''
													  )";
					break;
					default:
						$OptionType = "";
					break;
				}
			}
			else if($jenis == 'Penarik'){
				if($type != 'Total'){
					$OptionType = "AND std_nama_alat_bk.`jenis` IN (
												    'Traktor',
												    'While Traktor',
												    'Rental Traktor',
												    'Crawler Dozer',
												    'Motor Grader'
												  )";
				}
				else{
					$OptionType = "";
				}
			}
			else{
				$OptionType = "";
			}
			$query = $this->db->query("SELECT
																	  std_nama_alat_bk.`category` AS Category,
																	  std_nama_alat_bk.`jenis` AS Jenis,
																	  std_nama_alat_bk.`nama` AS Nama
																	FROM
																	  std_nama_alat_bk
																	WHERE std_nama_alat_bk.`category` = '$jenis'
																		$OptionType
																	ORDER BY std_nama_alat_bk.`jenis` ASC,
																	  std_nama_alat_bk.`nama` ASC");

			return $query->result();
		}function get_summary_cost($w, $status, $jenis, $kelas, $tahun, $bulan, $umur, $status_bk){
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
			if($status_bk != 'Total'){
				$option_status_bk = "AND perlocation_lokasi.`status_bk` = '$status_bk'";
			}
			else{
				$option_status_bk = "";
			}
			$query = $this->db->query("SELECT
																	  SUM(perlocation_pm_cost.`ZN01_r`) AS ZN01R,
																	  SUM(perlocation_pm_cost.`ZN02_r`) AS ZN02R,
																  	SUM(perlocation_pm_cost.`ZN03_r`) AS ZN03R,
																	  SUM(perlocation_pm_cost.`ZN04_r`) AS ZN04R,
																	  SUM(perlocation_pm_cost.`ZN05_r`) AS ZN05R,
																	  SUM(perlocation_pm_cost.`ZN06_r`) AS ZN06R,
																	  SUM(perlocation_pm_cost.`ZN07_r`) AS ZN07R,
																	  SUM(perlocation_pm_cost.`ZN08_r`) AS ZN08R,
																	  SUM(perlocation_pm_cost.`ZN09_r`) AS ZN09R,
																	  SUM(perlocation_pm_cost.`ZN10_r`) AS ZN10R,
																	  SUM(perlocation_pm_cost.`ZN11_r`) AS ZN11R,
																	  SUM(perlocation_pm_cost.`ZN12_r`) AS ZN12R,
																	  SUM(perlocation_pm_cost.`ZN13_r`) AS ZN13R,
																	  SUM(perlocation_pm_cost.`ZN14_r`) AS ZN14R,
																	  SUM(perlocation_pm_cost.`ZN15_r`) AS ZN15R,
																	  SUM(perlocation_pm_cost.`ZNT_r`) AS ZNTR
																	FROM
																	  perlocation_lokasi
																	  INNER JOIN perlocation_pm_cost
																	  ON perlocation_lokasi.`lokasi` = perlocation_pm_cost.`lokasi`
																		AND perlocation_lokasi.`keterangan` = perlocation_pm_cost.`keterangan`
																	WHERE  $pg_wil
																	  AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																		AND perlocation_lokasi.`status` = 'NSFC'
																		$option_status_bk
																	  $option_status
																		$option_jenis
																	  $option_kelas
																	  $option_bulan
																		$option_umur");

			return $query->row_array();
		}
		function get_activity_BKST($lokasi, $kebun, $panen, $bulan_panen, $status){
			if($panen == 'Rencana'){
				$query = $this->db->query("SELECT
																		  $kebun.`lokasi` AS Lokasi,
																		  $kebun.`act_grp` AS ECCode,
																		  $kebun.`activity_desc` AS ECDesc,
																		  $kebun.`aktivitas_code` AS ActCode,
																		  $kebun.`aktivitas_desc` AS ActDesc,
																		  SUM($kebun.`biaya_realisasi`) AS Biaya,
																		  (
																		SELECT
																		  CASE
																		    WHEN perlocation_lokasi.`status` LIKE '%FC%'
																		    THEN
																		    CASE
																		      WHEN perlocation_lokasi.`umur` = 1
																		      THEN help_activity.`FC_1`
																		      WHEN perlocation_lokasi.`umur` = 2
																		      THEN help_activity.`FC_2`
																		      WHEN perlocation_lokasi.`umur` = 3
																		      THEN help_activity.`FC_3`
																		      WHEN perlocation_lokasi.`umur` = 4
																		      THEN help_activity.`FC_4`
																		      WHEN perlocation_lokasi.`umur` = 5
																		      THEN help_activity.`FC_5`
																		      WHEN perlocation_lokasi.`umur` = 6
																		      THEN help_activity.`FC_6`
																		      WHEN perlocation_lokasi.`umur` = 7
																		      THEN help_activity.`FC_7`
																		      WHEN perlocation_lokasi.`umur` = 8
																		      THEN help_activity.`FC_8`
																		      WHEN perlocation_lokasi.`umur` = 9
																		      THEN help_activity.`FC_9`
																		      WHEN perlocation_lokasi.`umur` = 10
																		      THEN help_activity.`FC_10`
																		      WHEN perlocation_lokasi.`umur` = 11
																		      THEN help_activity.`FC_11`
																		      WHEN perlocation_lokasi.`umur` = 12
																		      THEN help_activity.`FC_12`
																		      WHEN perlocation_lokasi.`umur` = 13
																		      THEN help_activity.`FC_13`
																		      WHEN perlocation_lokasi.`umur` = 14
																		      THEN help_activity.`FC_14`
																		      WHEN perlocation_lokasi.`umur` = 15
																		      THEN help_activity.`FC_15`
																		      WHEN perlocation_lokasi.`umur` = 16
																		      THEN help_activity.`FC_16`
																		      WHEN perlocation_lokasi.`umur` = 17
																		      THEN help_activity.`FC_17`
																		      WHEN perlocation_lokasi.`umur` = 18
																		      THEN help_activity.`FC_18`
																		      WHEN perlocation_lokasi.`umur` = 19
																		      THEN help_activity.`FC_19`
																		      WHEN perlocation_lokasi.`umur` = 20
																		      THEN help_activity.`FC_20`
																		      WHEN perlocation_lokasi.`umur` = 21
																		      THEN help_activity.`FC_21`
																		      WHEN perlocation_lokasi.`umur` = 22
																		      THEN help_activity.`FC_22`
																		      WHEN perlocation_lokasi.`umur` = 23
																		      THEN help_activity.`FC_23`
																		      WHEN perlocation_lokasi.`umur` = 24
																		      THEN help_activity.`FC_24`
																		      WHEN perlocation_lokasi.`umur` = 25
																		      THEN help_activity.`FC_25`
																		      WHEN perlocation_lokasi.`umur` = 26
																		      THEN help_activity.`FC_26`
																		      WHEN perlocation_lokasi.`umur` = 27
																		      THEN help_activity.`FC_27`
																		      WHEN perlocation_lokasi.`umur` = 28
																		      THEN help_activity.`FC_28`
																		      WHEN perlocation_lokasi.`umur` = 29
																		      THEN help_activity.`FC_29`
																		      WHEN perlocation_lokasi.`umur` = 30
																		      THEN help_activity.`FC_30`
																		    END
																		  END AS STD
																		FROM
																		  perlocation_lokasi,
																		  help_activity
																		WHERE perlocation_lokasi.`lokasi` = $kebun.`lokasi`
																		  AND help_activity.`code_activity` = $kebun.`aktivitas_code`
																			AND perlocation_lokasi.`keterangan` = 'Rencana'
																		LIMIT 1
																		  ) * perlocation_lokasi.`luas` AS SBT
																		FROM
																		  $kebun
																		  INNER JOIN perlocation_lokasi
																		    ON $kebun.`lokasi` = perlocation_lokasi.`lokasi`
																		    AND perlocation_lokasi.`keterangan` = 'Rencana'
																		WHERE SUBSTRING($kebun.`status_lokasi`, 3, 2) = '$status'
    																	AND $kebun.`lokasi` = '$lokasi'
																		GROUP BY $kebun.`lokasi`,
																		  $kebun.`aktivitas_code`
																		ORDER BY $kebun.`lokasi` ASC,
																		  $kebun.`act_grp` ASC,
																		  $kebun.`aktivitas_code` ASC");
			}
			else{
				$kebun = "P".substr($kebun, 1, 2);
				$query = $this->db->query("SELECT
																		  $kebun.`lokasi` AS Lokasi,
																		  $kebun.`act_grp` AS ECCode,
																		  $kebun.`activity_desc` AS ECDesc,
																		  $kebun.`aktivitas_code` AS ActCode,
																		  $kebun.`aktivitas_desc` AS ActDesc,
																		  SUM($kebun.`biaya_realisasi`) AS Biaya,
																		  (
																		SELECT
																		  CASE
																		    WHEN perlocation_lokasi.`status` LIKE '%FC%'
																		    THEN
																		    CASE
																		      WHEN perlocation_lokasi.`umur` = 1
																		      THEN help_activity.`FC_1`
																		      WHEN perlocation_lokasi.`umur` = 2
																		      THEN help_activity.`FC_2`
																		      WHEN perlocation_lokasi.`umur` = 3
																		      THEN help_activity.`FC_3`
																		      WHEN perlocation_lokasi.`umur` = 4
																		      THEN help_activity.`FC_4`
																		      WHEN perlocation_lokasi.`umur` = 5
																		      THEN help_activity.`FC_5`
																		      WHEN perlocation_lokasi.`umur` = 6
																		      THEN help_activity.`FC_6`
																		      WHEN perlocation_lokasi.`umur` = 7
																		      THEN help_activity.`FC_7`
																		      WHEN perlocation_lokasi.`umur` = 8
																		      THEN help_activity.`FC_8`
																		      WHEN perlocation_lokasi.`umur` = 9
																		      THEN help_activity.`FC_9`
																		      WHEN perlocation_lokasi.`umur` = 10
																		      THEN help_activity.`FC_10`
																		      WHEN perlocation_lokasi.`umur` = 11
																		      THEN help_activity.`FC_11`
																		      WHEN perlocation_lokasi.`umur` = 12
																		      THEN help_activity.`FC_12`
																		      WHEN perlocation_lokasi.`umur` = 13
																		      THEN help_activity.`FC_13`
																		      WHEN perlocation_lokasi.`umur` = 14
																		      THEN help_activity.`FC_14`
																		      WHEN perlocation_lokasi.`umur` = 15
																		      THEN help_activity.`FC_15`
																		      WHEN perlocation_lokasi.`umur` = 16
																		      THEN help_activity.`FC_16`
																		      WHEN perlocation_lokasi.`umur` = 17
																		      THEN help_activity.`FC_17`
																		      WHEN perlocation_lokasi.`umur` = 18
																		      THEN help_activity.`FC_18`
																		      WHEN perlocation_lokasi.`umur` = 19
																		      THEN help_activity.`FC_19`
																		      WHEN perlocation_lokasi.`umur` = 20
																		      THEN help_activity.`FC_20`
																		      WHEN perlocation_lokasi.`umur` = 21
																		      THEN help_activity.`FC_21`
																		      WHEN perlocation_lokasi.`umur` = 22
																		      THEN help_activity.`FC_22`
																		      WHEN perlocation_lokasi.`umur` = 23
																		      THEN help_activity.`FC_23`
																		      WHEN perlocation_lokasi.`umur` = 24
																		      THEN help_activity.`FC_24`
																		      WHEN perlocation_lokasi.`umur` = 25
																		      THEN help_activity.`FC_25`
																		      WHEN perlocation_lokasi.`umur` = 26
																		      THEN help_activity.`FC_26`
																		      WHEN perlocation_lokasi.`umur` = 27
																		      THEN help_activity.`FC_27`
																		      WHEN perlocation_lokasi.`umur` = 28
																		      THEN help_activity.`FC_28`
																		      WHEN perlocation_lokasi.`umur` = 29
																		      THEN help_activity.`FC_29`
																		      WHEN perlocation_lokasi.`umur` = 30
																		      THEN help_activity.`FC_30`
																		    END
																		  END AS STD
																		FROM
																		  perlocation_lokasi,
																		  help_activity
																		WHERE perlocation_lokasi.`lokasi` = $kebun.`lokasi`
																		  AND help_activity.`code_activity` = $kebun.`aktivitas_code`
																			AND perlocation_lokasi.`keterangan` = 'Selesai'
																		LIMIT 1
																		  ) * perlocation_lokasi.`luas` AS SBT
																		FROM
																		  $kebun
																		  INNER JOIN perlocation_lokasi
																		    ON $kebun.`lokasi` = perlocation_lokasi.`lokasi`
																		    AND perlocation_lokasi.`keterangan` = 'Selesai'
																		    AND $kebun.`bulan_panen` = '$bulan_panen'
																		WHERE SUBSTRING($kebun.`status_lokasi`, 3, 2) = '$status'
    																	AND $kebun.`lokasi` = '$lokasi'
																		GROUP BY $kebun.`lokasi`,
																		  $kebun.`aktivitas_code`
																		ORDER BY $kebun.`lokasi` ASC,
																		  $kebun.`act_grp` ASC,
																		  $kebun.`aktivitas_code` ASC");
			}

			return $query->result();
		}

		function set_activity_BKST_detail($data){
			$set = implode("', '", $data);
			$query = $this->db->query("INSERT INTO perlocation_pm_activity_bkst_detail
																	VALUES
																		(
																			'$set'
																		);");

			return true;
		}
		function del_activity_BKST_detail(){
			$query = $this->db->query("TRUNCATE perlocation_pm_activity_bkst_detail;");

			return true;
		}
		function get_activity_bkst_detail($w, $status, $jenis, $kelas, $tahun, $bulan, $umur, $element_cost, $status_data){
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
																		  perlocation_pm_activity_bkst_detail.`ActivityCode`,
																		  perlocation_pm_activity_bkst_detail.`ActivityDesc`,
																		  SUM(perlocation_pm_activity_bkst_detail.`STD`) AS SBT,
																		  SUM(perlocation_pm_activity_bkst_detail.`Biaya`) AS RealCost,
																		  SUM(perlocation_pm_activity_bkst_detail.`Over`) AS RealOver,
																		  SUM(1) AS Total,
																			(
																		    SELECT
																		      SUM(perlocation_lokasi.`luas`)
																		    FROM
																		      perlocation_lokasi
																		    WHERE $pg_wil
																		      AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																					$option_status
																					$option_jenis
																					$option_kelas
																					$option_bulan
																					$option_umur
																		  ) AS Luas
																		FROM
																		  perlocation_lokasi
																		  INNER JOIN perlocation_pm_activity_bkst_detail
																		    ON perlocation_lokasi.`lokasi` = perlocation_pm_activity_bkst_detail.`Lokasi`
																		    AND perlocation_lokasi.`keterangan` = perlocation_pm_activity_bkst_detail.`Keterangan`
																		WHERE $pg_wil
																			AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																		  AND perlocation_pm_activity_bkst_detail.`ElementCostCode` = '$element_cost'
																		  AND perlocation_pm_activity_bkst_detail.`Jenis` = '$status_data'
																			$option_status
																			$option_jenis
																			$option_kelas
																			$option_bulan
																			$option_umur
																		GROUP BY perlocation_pm_activity_bkst_detail.`ActivityCode`");

			return $query->result();
		}
		function get_per_activity_bkst_detail($w, $status, $jenis, $kelas, $tahun, $bulan, $umur, $element_cost, $status_data, $activity){
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
																	  perlocation_lokasi.`lokasi` AS Lokasi,
																	  perlocation_pm_activity_bkst_detail.`STD` / perlocation_lokasi.`luas` AS SBT,
																	  perlocation_pm_activity_bkst_detail.`Biaya` / perlocation_lokasi.`luas` AS Biaya,
																	  (perlocation_pm_activity_bkst_detail.`Biaya` - perlocation_pm_activity_bkst_detail.`STD`) / perlocation_lokasi.`luas` AS RealOver,
																	  perlocation_lokasi.`keterangan` AS Keterangan
																	FROM
																	  perlocation_lokasi
																	  INNER JOIN perlocation_pm_activity_bkst_detail
																	    ON perlocation_lokasi.`lokasi` = perlocation_pm_activity_bkst_detail.`Lokasi`
																	    AND perlocation_lokasi.`keterangan` = perlocation_pm_activity_bkst_detail.`Keterangan`
																	    AND perlocation_pm_activity_bkst_detail.`ActivityCode` = '$activity'
																	WHERE $pg_wil
																		AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																	  AND perlocation_pm_activity_bkst_detail.`ElementCostCode` = '$element_cost'
																	  AND perlocation_pm_activity_bkst_detail.`Jenis` = '$status_data'
																		$option_status
																		$option_jenis
																		$option_kelas
																		$option_bulan
																		$option_umur
																	GROUP BY perlocation_pm_activity_bkst_detail.`Lokasi`
																	ORDER BY RealOver DESC
																	LIMIT 20");

			return $query->result();
		}
		function get_sbt_cost_real_total($status, $tahun){
			if($status != 'NS'){
				if($status == 'NSFC'){
					$option_status = "AND sbt_real_cost.`kelas` = 'S'";
				}
				else{
					$option_status = "AND sbt_real_cost.`kelas` = 'NSSC'";
				}
			}
			else{
				$option_status = "AND (sbt_real_cost.`kelas` = 'S'
													OR sbt_real_cost.`kelas` = 'NSSC')";
			}
			$query = $this->db->query("SELECT
																	  AVG(sbt_real_cost.`ZN01`) AS ZN01,
																	  AVG(sbt_real_cost.`ZN02`) AS ZN02,
																	  AVG(sbt_real_cost.`ZN03`) AS ZN03,
																	  AVG(sbt_real_cost.`ZN04`) AS ZN04,
																	  AVG(sbt_real_cost.`ZN05`) AS ZN05,
																	  AVG(sbt_real_cost.`ZN06`) AS ZN06,
																	  AVG(sbt_real_cost.`ZN07`) AS ZN07,
																	  AVG(sbt_real_cost.`ZN08`) AS ZN08,
																	  AVG(sbt_real_cost.`ZN09`) AS ZN09,
																	  AVG(sbt_real_cost.`ZN10`) AS ZN10,
																	  AVG(sbt_real_cost.`ZN11`) AS ZN11,
																	  AVG(sbt_real_cost.`ZN12`) AS ZN12,
																	  AVG(sbt_real_cost.`ZN13`) AS ZN13,
																	  AVG(sbt_real_cost.`ZN14`) AS ZN14,
																	  AVG(sbt_real_cost.`ZN15`) AS ZN15
																	FROM
																	  sbt_real_cost
																	WHERE sbt_real_cost.`tahun` = '$tahun'
																		$option_status
																	  AND sbt_real_cost.`umur` = '25'
																	GROUP BY sbt_real_cost.`tahun`");

			return $query->row_array();
		}
	}
?>
