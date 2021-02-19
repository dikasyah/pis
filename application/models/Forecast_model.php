<?php

class Forecast_model extends CI_Model
{

	function get_element_cost_code_jenis($lokasi, $jenis, $umur){
		$query = $this->db->query("SELECT
																  forecast.`element_cost`,
																  forecast.`$umur` AS rp_per_ha,
																  (forecast.`$umur` * IF(ISNULL(produksi.`real_dan_sisa_rencana_luas`), lokasi.`luas`, produksi.`real_dan_sisa_rencana_luas`)) AS total
																FROM
																  forecast,
																  lokasi
																LEFT JOIN produksi
																  ON lokasi.`lokasi` = produksi.`lokasi`
																  AND produksi.`status` = SUBSTRING(lokasi.`status`, 1, 4)
																WHERE lokasi.`lokasi` = '$lokasi'
																  AND forecast.`status` = SUBSTRING(lokasi.`status`, 1, 4)
																  AND forecast.`element_cost` = '$jenis'");

		return $query->row_array();
	}
	function get_element_cost_code_jenis_t1($lokasi, $jenis, $umur){
		$query = $this->db->query("SELECT
																  forecast_t1.`element_cost`,
																  forecast_t1.`$umur` AS rp_per_ha,
																  (forecast_t1.`$umur` * IF(ISNULL(produksi_t1.`real_dan_sisa_rencana_luas`), lokasi.`luas`, produksi_t1.`real_dan_sisa_rencana_luas`)) AS total
																FROM
																  forecast_t1,
																  lokasi
																LEFT JOIN produksi_t1
																  ON lokasi.`lokasi` = produksi_t1.`lokasi`
																  AND produksi_t1.`status` = SUBSTRING(lokasi.`status`, 1, 4)
																WHERE lokasi.`lokasi` = '$lokasi'
																  AND forecast_t1.`status` = SUBSTRING(lokasi.`status`, 1, 4)
																  AND forecast_t1.`element_cost` = '$jenis'");

		return $query->row_array();
	}

	function get_forecast_wilayah_jenis($wilayah, $jenis){
		switch ($jenis) {
			case 'NS':
				$status = '';
				break;
			case 'NSFC':
				$status = 'AND produksi.`status` = "NSFC"';
				break;
			case 'NSSC':
				$status = 'AND produksi.`status` = "NSSC"';
				break;
		}
		$query = $this->db->query("SELECT
																  SUM(forecast_code.`ZN01` * produksi.`real_dan_sisa_rencana_luas`) AS ZN01,
																  0 AS ZN01_actual,
																  SUM(forecast_code.`ZN02` * produksi.`real_dan_sisa_rencana_luas`) AS ZN02,
																  0 AS ZN02_actual,
																  SUM(forecast_code.`ZN03` * produksi.`real_dan_sisa_rencana_luas`) AS ZN03,
																  0 AS ZN03_actual,
																  SUM(forecast_code.`ZN04` * produksi.`real_dan_sisa_rencana_luas`) AS ZN04,
																  SUM(forecast_code.`ZN04` * produksi.`real_dan_sisa_rencana_luas`) *
																  (SELECT
																    forecast_overhead_code.`ZN04`
																  FROM
																    forecast_overhead_code
																  WHERE forecast_overhead_code.`status` = forecast_code.`status`
																    AND forecast_overhead_code.`bulan_panen` = MONTH(produksi.`real_dan_sisa_rencana_tgl_selesai_panen`)
																  ) AS ZN04_actual,
																  SUM(forecast_code.`ZN05` * produksi.`real_dan_sisa_rencana_luas`) AS ZN05,
																  SUM(forecast_code.`ZN05` * produksi.`real_dan_sisa_rencana_luas`) *
																  (SELECT
																    forecast_overhead_code.`ZN05`
																  FROM
																    forecast_overhead_code
																  WHERE forecast_overhead_code.`status` = forecast_code.`status`
																    AND forecast_overhead_code.`bulan_panen` = MONTH(produksi.`real_dan_sisa_rencana_tgl_selesai_panen`)
																  ) AS ZN05_actual,
																  SUM(forecast_code.`ZN06` * produksi.`real_dan_sisa_rencana_luas`) AS ZN06,
																  SUM(forecast_code.`ZN06` * produksi.`real_dan_sisa_rencana_luas`) *
																  (SELECT
																    forecast_overhead_code.`ZN06`
																  FROM
																    forecast_overhead_code
																  WHERE forecast_overhead_code.`status` = forecast_code.`status`
																    AND forecast_overhead_code.`bulan_panen` = MONTH(produksi.`real_dan_sisa_rencana_tgl_selesai_panen`)
																  ) AS ZN06_actual,
																  SUM(forecast_code.`ZN07` * produksi.`real_dan_sisa_rencana_luas`) AS ZN07,
																  0 AS ZN07_actual,
																  SUM(forecast_code.`ZN08` * produksi.`real_dan_sisa_rencana_luas`) AS ZN08,
																  SUM(forecast_code.`ZN09` * produksi.`real_dan_sisa_rencana_luas`) AS ZN09,
																  0 AS ZN09_actual,
																  SUM(forecast_code.`ZN10` * produksi.`real_dan_sisa_rencana_luas`) AS ZN10,
																  SUM(forecast_code.`ZN11` * produksi.`real_dan_sisa_rencana_luas`) AS ZN11,
																  0 AS ZN11_actual,
																  SUM(forecast_code.`ZN12` * produksi.`real_dan_sisa_rencana_luas`) AS ZN12,
																  0 AS ZN12_actual,
																  SUM(forecast_code.`ZN13` * produksi.`real_dan_sisa_rencana_luas`) AS ZN13,
																  SUM(forecast_code.`ZN13` * produksi.`real_dan_sisa_rencana_luas`) *
																  (SELECT
																    forecast_overhead_code.`ZN13`
																  FROM
																    forecast_overhead_code
																  WHERE forecast_overhead_code.`status` = forecast_code.`status`
																    AND forecast_overhead_code.`bulan_panen` = MONTH(produksi.`real_dan_sisa_rencana_tgl_selesai_panen`)
																  ) AS ZN13_actual,
																  SUM(forecast_code.`ZN14` * produksi.`real_dan_sisa_rencana_luas`) AS ZN14,
																  0 AS ZN14_actual,
																  SUM(forecast_code.`ZN15` * produksi.`real_dan_sisa_rencana_luas`) AS ZN15,
																  0 AS ZN15_actual
																FROM
																  forecast_code,
																  konstanta,
																  lokasi
																  RIGHT JOIN produksi
																    ON lokasi.`lokasi` = produksi.`lokasi`
																WHERE SUBSTRING(kebun, 1, 3) = '$wilayah'
																  AND konstanta.`jenis` = 'TGL_TARIK_DATA'
																  AND produksi.`status` = forecast_code.`status`
																  AND produksi.`keterangan` != 'selesai'
																  AND forecast_code.`umur` = CEIL(
																    TIMESTAMPDIFF(
																      DAY,
																produksi.`tgl_awal_perawatan`,
																      konstanta.`nilai`
																    ) / (365.25 / 12)
																  )
																	$status");

		return $query->row_array();
	}

	function get_forecast_wilayah_report($wilayah){
		$query = $this->db->query("SELECT
																  SUBSTRING($wilayah.`current_status_lokasi`, 1, 4) AS status,
																  CONCAT('B', MONTH(produksi.`real_dan_sisa_rencana_tgl_selesai_panen`)) AS bulan,
																  $wilayah.`lokasi`,
																  (IF(SUM(IF($wilayah.`act_grp` = 'ZN10', $wilayah.`biaya_realisasi`, 0)) / produksi.`real_dan_sisa_rencana_tonase` / 1000 > 100, 0, forecast_code.`ZN01`) * produksi.`real_dan_sisa_rencana_luas`) AS ZN01,
																  0 AS ZN01_aktual,
																  (IF(SUM(IF($wilayah.`act_grp` = 'ZN10', $wilayah.`biaya_realisasi`, 0)) / produksi.`real_dan_sisa_rencana_tonase` / 1000 > 100, 0, forecast_code.`ZN02`) * produksi.`real_dan_sisa_rencana_luas`) AS ZN02,
																  0 AS ZN02_aktual,
																  (IF(SUM(IF($wilayah.`act_grp` = 'ZN10', $wilayah.`biaya_realisasi`, 0)) / produksi.`real_dan_sisa_rencana_tonase` / 1000 > 100, 0, forecast_code.`ZN03`) * produksi.`real_dan_sisa_rencana_luas`) AS ZN03,
																  0 AS ZN03_aktual,
																  (IF(SUM(IF($wilayah.`act_grp` = 'ZN10', $wilayah.`biaya_realisasi`, 0)) / produksi.`real_dan_sisa_rencana_tonase` / 1000 > 100, 0, forecast_code.`ZN04`) * produksi.`real_dan_sisa_rencana_luas`) AS ZN04,
																  (IF(SUM(IF($wilayah.`act_grp` = 'ZN10', $wilayah.`biaya_realisasi`, 0)) / produksi.`real_dan_sisa_rencana_tonase` / 1000 > 100, 0, forecast_code.`ZN04`) * produksi.`real_dan_sisa_rencana_luas`)
																     *
																  (SELECT
																    forecast_overhead_code.`ZN04`
																  FROM
																    forecast_overhead_code
																  WHERE forecast_overhead_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
																    AND forecast_overhead_code.`bulan_panen` = MONTH(produksi.`real_dan_sisa_rencana_tgl_selesai_panen`)
																  ) AS ZN04_aktual,
																  (IF(SUM(IF($wilayah.`act_grp` = 'ZN10', $wilayah.`biaya_realisasi`, 0)) / produksi.`real_dan_sisa_rencana_tonase` / 1000 > 100, 0, forecast_code.`ZN05`) * produksi.`real_dan_sisa_rencana_luas`) AS ZN05,
																  (IF(SUM(IF($wilayah.`act_grp` = 'ZN10', $wilayah.`biaya_realisasi`, 0)) / produksi.`real_dan_sisa_rencana_tonase` / 1000 > 100, 0, forecast_code.`ZN05`) * produksi.`real_dan_sisa_rencana_luas`)
																     *
																  (SELECT
																    forecast_overhead_code.`ZN05`
																  FROM
																    forecast_overhead_code
																  WHERE forecast_overhead_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
																    AND forecast_overhead_code.`bulan_panen` = MONTH(produksi.`real_dan_sisa_rencana_tgl_selesai_panen`)
																  ) AS ZN05_aktual,
																  (IF(SUM(IF($wilayah.`act_grp` = 'ZN10', $wilayah.`biaya_realisasi`, 0)) / produksi.`real_dan_sisa_rencana_tonase` / 1000 > 100, 0, forecast_code.`ZN06`) * produksi.`real_dan_sisa_rencana_luas`) AS ZN06,
																  (IF(SUM(IF($wilayah.`act_grp` = 'ZN10', $wilayah.`biaya_realisasi`, 0)) / produksi.`real_dan_sisa_rencana_tonase` / 1000 > 100, 0, forecast_code.`ZN06`) * produksi.`real_dan_sisa_rencana_luas`)
																     *
																  (SELECT
																    forecast_overhead_code.`ZN06`
																  FROM
																    forecast_overhead_code
																  WHERE forecast_overhead_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
																    AND forecast_overhead_code.`bulan_panen` = MONTH(produksi.`real_dan_sisa_rencana_tgl_selesai_panen`)
																  ) AS ZN06_aktual,
																  (IF(SUM(IF($wilayah.`act_grp` = 'ZN10', $wilayah.`biaya_realisasi`, 0)) / produksi.`real_dan_sisa_rencana_tonase` / 1000 > 100, 0, forecast_code.`ZN07`) * produksi.`real_dan_sisa_rencana_luas`) AS ZN07,
																  0 AS ZN07_aktual,
																  (IF(SUM(IF($wilayah.`act_grp` = 'ZN09', $wilayah.`biaya_realisasi`, 0)) / produksi.`real_dan_sisa_rencana_tonase` / 1000 > 0, 0, forecast_code.`ZN09`) * produksi.`real_dan_sisa_rencana_luas`) AS ZN09,
																  0 AS ZN09_aktual,
																  (forecast_code.`ZN11` * produksi.`real_dan_sisa_rencana_luas`) AS ZN11,
																  0 AS ZN11_aktual,
																  (IF(SUM(IF($wilayah.`act_grp` = 'ZN10', $wilayah.`biaya_realisasi`, 0)) / produksi.`real_dan_sisa_rencana_tonase` / 1000 > 100, 0, forecast_code.`ZN12`) * produksi.`real_dan_sisa_rencana_luas`) AS ZN12,
																  0 AS ZN12_aktual,
																  (IF(SUM(IF($wilayah.`act_grp` = 'ZN10', $wilayah.`biaya_realisasi`, 0)) / produksi.`real_dan_sisa_rencana_tonase` / 1000 > 100, 0, forecast_code.`ZN13`) * produksi.`real_dan_sisa_rencana_luas`) AS ZN13,
																  (IF(SUM(IF($wilayah.`act_grp` = 'ZN10', $wilayah.`biaya_realisasi`, 0)) / produksi.`real_dan_sisa_rencana_tonase` / 1000 > 100, 0, forecast_code.`ZN13`) * produksi.`real_dan_sisa_rencana_luas`)
																     *
																  (SELECT
																    forecast_overhead_code.`ZN06`
																  FROM
																    forecast_overhead_code
																  WHERE forecast_overhead_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
																    AND forecast_overhead_code.`bulan_panen` = MONTH(produksi.`real_dan_sisa_rencana_tgl_selesai_panen`)
																  ) AS ZN13_aktual,
																  (IF(SUM(IF($wilayah.`act_grp` = 'ZN10', $wilayah.`biaya_realisasi`, 0)) / produksi.`real_dan_sisa_rencana_tonase` / 1000 > 100, 0, forecast_code.`ZN14`) * produksi.`real_dan_sisa_rencana_luas`) AS ZN14,
																  0 AS ZN14_aktual,
																  (IF(SUM(IF($wilayah.`act_grp` = 'ZN10', $wilayah.`biaya_realisasi`, 0)) / produksi.`real_dan_sisa_rencana_tonase` / 1000 > 100, 0, forecast_code.`ZN15`) * produksi.`real_dan_sisa_rencana_luas`) AS ZN15,
																  0 AS ZN15_aktual
																FROM
																  forecast_code,
																  konstanta,
																  $wilayah
																  RIGHT JOIN produksi
																    ON $wilayah.`lokasi` = produksi.`lokasi`
																WHERE $wilayah.`jenis_data` != '3X'
																  AND $wilayah.`jenis_data` != '7'
																  AND konstanta.`jenis` = 'TGL_TARIK_DATA'
																  AND produksi.`status` = forecast_code.`status`
																  AND produksi.`keterangan` != 'selesai'
																  AND forecast_code.`umur` = CEIL(
																    TIMESTAMPDIFF(
																      DAY,
																produksi.`tgl_awal_perawatan`,
																      konstanta.`nilai`
																    ) / (365.25 / 12)
																  )
																GROUP BY SUBSTRING($wilayah.`current_status_lokasi`, 1, 4),
																  MONTH(produksi.`real_dan_sisa_rencana_tgl_selesai_panen`),
																  $wilayah.`lokasi`");

		return $query->result();
	}
	function get_forecast_wilayah_report_t1($wilayah){
		$query = $this->db->query("SELECT
																  SUBSTRING($wilayah.`current_status_lokasi`, 1, 4) AS status,
																  CEIL(
																    TIMESTAMPDIFF(
																      DAY,
																lokasi.`tgl_mulai_rawat`,
																      konstanta.`nilai`
																    ) / 30.4583333333333
																  ) AS umur,
																  CONCAT('B', MONTH(
															      IF(
															        ISNULL(lokasi.`tgl_panen_rencana`),
															        IF(
															          ISNULL(lokasi.`tgl_panen_standard`),
															          IF(
															            SUBSTRING(lokasi.`status`, 1, 4) = 'NSSC',
															            lokasi.`tgl_mulai_rawat` + INTERVAL 13 MONTH,
															            IF(
															              SUBSTRING(lokasi.`bibit`, 7, 1) = 'K',
															              lokasi.`tgl_mulai_rawat` + INTERVAL 19 MONTH,
															              IF(
															                SUBSTRING(lokasi.`bibit`, 7, 1) = 'S',
															                lokasi.`tgl_mulai_rawat` + INTERVAL 17 MONTH,
															                lokasi.`tgl_mulai_rawat` + INTERVAL 15 MONTH
															              )
															            )
															          ),
															          lokasi.`tgl_panen_rencana`
															        ),
															        lokasi.`tgl_panen_standard`
															      )
																  )) AS bulan,
																  $wilayah.`lokasi`,
																  (IF(SUM(IF($wilayah.`act_grp` = 'ZN10', $wilayah.`biaya_realisasi`, 0)) / (lokasi.`luas` * std_yield.`yield`) / 1000 > 100, 0, forecast_code.`ZN01`) * lokasi.`luas`) AS ZN01,
																  0 AS ZN01_aktual,
																  (IF(SUM(IF($wilayah.`act_grp` = 'ZN10', $wilayah.`biaya_realisasi`, 0)) / (lokasi.`luas` * std_yield.`yield`) / 1000 > 100, 0, forecast_code.`ZN02`) * lokasi.`luas`) AS ZN02,
																  0 AS ZN02_aktual,
																  (IF(SUM(IF($wilayah.`act_grp` = 'ZN10', $wilayah.`biaya_realisasi`, 0)) / (lokasi.`luas` * std_yield.`yield`) / 1000 > 100, 0, forecast_code.`ZN03`) * lokasi.`luas`) AS ZN03,
																  0 AS ZN03_aktual,
																  (IF(SUM(IF($wilayah.`act_grp` = 'ZN10', $wilayah.`biaya_realisasi`, 0)) / (lokasi.`luas` * std_yield.`yield`) / 1000 > 100, 0, forecast_code.`ZN04`) * lokasi.`luas`) AS ZN04,
																  (IF(SUM(IF($wilayah.`act_grp` = 'ZN10', $wilayah.`biaya_realisasi`, 0)) / (lokasi.`luas` * std_yield.`yield`) / 1000 > 100, 0, forecast_code.`ZN04`) * lokasi.`luas`)
																     *
																  (SELECT
																    forecast_overhead_code.`ZN04`
																  FROM
																    forecast_overhead_code
																  WHERE forecast_overhead_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
																    AND forecast_overhead_code.`bulan_panen` = MONTH(
															      IF(
															        ISNULL(lokasi.`tgl_panen_rencana`),
															        IF(
															          ISNULL(lokasi.`tgl_panen_standard`),
															          IF(
															            SUBSTRING(lokasi.`status`, 1, 4) = 'NSSC',
															            lokasi.`tgl_mulai_rawat` + INTERVAL 13 MONTH,
															            IF(
															              SUBSTRING(lokasi.`bibit`, 7, 1) = 'K',
															              lokasi.`tgl_mulai_rawat` + INTERVAL 19 MONTH,
															              IF(
															                SUBSTRING(lokasi.`bibit`, 7, 1) = 'S',
															                lokasi.`tgl_mulai_rawat` + INTERVAL 17 MONTH,
															                lokasi.`tgl_mulai_rawat` + INTERVAL 15 MONTH
															              )
															            )
															          ),
															          lokasi.`tgl_panen_rencana`
															        ),
															        lokasi.`tgl_panen_standard`
															      )
																  )
																  ) AS ZN04_aktual,
																  (IF(SUM(IF($wilayah.`act_grp` = 'ZN10', $wilayah.`biaya_realisasi`, 0)) / (lokasi.`luas` * std_yield.`yield`) / 1000 > 100, 0, forecast_code.`ZN05`) * lokasi.`luas`) AS ZN05,
																  (IF(SUM(IF($wilayah.`act_grp` = 'ZN10', $wilayah.`biaya_realisasi`, 0)) / (lokasi.`luas` * std_yield.`yield`) / 1000 > 100, 0, forecast_code.`ZN05`) * lokasi.`luas`)
																     *
																  (SELECT
																    forecast_overhead_code.`ZN05`
																  FROM
																    forecast_overhead_code
																  WHERE forecast_overhead_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
																    AND forecast_overhead_code.`bulan_panen` = MONTH(
															      IF(
															        ISNULL(lokasi.`tgl_panen_rencana`),
															        IF(
															          ISNULL(lokasi.`tgl_panen_standard`),
															          IF(
															            SUBSTRING(lokasi.`status`, 1, 4) = 'NSSC',
															            lokasi.`tgl_mulai_rawat` + INTERVAL 13 MONTH,
															            IF(
															              SUBSTRING(lokasi.`bibit`, 7, 1) = 'K',
															              lokasi.`tgl_mulai_rawat` + INTERVAL 19 MONTH,
															              IF(
															                SUBSTRING(lokasi.`bibit`, 7, 1) = 'S',
															                lokasi.`tgl_mulai_rawat` + INTERVAL 17 MONTH,
															                lokasi.`tgl_mulai_rawat` + INTERVAL 15 MONTH
															              )
															            )
															          ),
															          lokasi.`tgl_panen_rencana`
															        ),
															        lokasi.`tgl_panen_standard`
															      )
																  )
																  ) AS ZN05_aktual,
																  (IF(SUM(IF($wilayah.`act_grp` = 'ZN10', $wilayah.`biaya_realisasi`, 0)) / (lokasi.`luas` * std_yield.`yield`) / 1000 > 100, 0, forecast_code.`ZN06`) * lokasi.`luas`) AS ZN06,
																  (IF(SUM(IF($wilayah.`act_grp` = 'ZN10', $wilayah.`biaya_realisasi`, 0)) / (lokasi.`luas` * std_yield.`yield`) / 1000 > 100, 0, forecast_code.`ZN06`) * lokasi.`luas`)
																     *
																  (SELECT
																    forecast_overhead_code.`ZN06`
																  FROM
																    forecast_overhead_code
																  WHERE forecast_overhead_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
																    AND forecast_overhead_code.`bulan_panen` = MONTH(
															      IF(
															        ISNULL(lokasi.`tgl_panen_rencana`),
															        IF(
															          ISNULL(lokasi.`tgl_panen_standard`),
															          IF(
															            SUBSTRING(lokasi.`status`, 1, 4) = 'NSSC',
															            lokasi.`tgl_mulai_rawat` + INTERVAL 13 MONTH,
															            IF(
															              SUBSTRING(lokasi.`bibit`, 7, 1) = 'K',
															              lokasi.`tgl_mulai_rawat` + INTERVAL 19 MONTH,
															              IF(
															                SUBSTRING(lokasi.`bibit`, 7, 1) = 'S',
															                lokasi.`tgl_mulai_rawat` + INTERVAL 17 MONTH,
															                lokasi.`tgl_mulai_rawat` + INTERVAL 15 MONTH
															              )
															            )
															          ),
															          lokasi.`tgl_panen_rencana`
															        ),
															        lokasi.`tgl_panen_standard`
															      )
																  )
																  ) AS ZN06_aktual,
																  (IF(SUM(IF($wilayah.`act_grp` = 'ZN10', $wilayah.`biaya_realisasi`, 0)) / (lokasi.`luas` * std_yield.`yield`) / 1000 > 100, 0, forecast_code.`ZN07`) * lokasi.`luas`) AS ZN07,
																  0 AS ZN07_aktual,
																  (IF(SUM(IF($wilayah.`act_grp` = 'ZN09', $wilayah.`biaya_realisasi`, 0)) / (lokasi.`luas` * std_yield.`yield`) / 1000 > 0, 0, forecast_code.`ZN09`) * lokasi.`luas`) AS ZN09,
																  0 AS ZN09_aktual,
																  (forecast_code.`ZN11` * lokasi.`luas`) AS ZN11,
																  0 AS ZN11_aktual,
																  (IF(SUM(IF($wilayah.`act_grp` = 'ZN10', $wilayah.`biaya_realisasi`, 0)) / (lokasi.`luas` * std_yield.`yield`) / 1000 > 100, 0, forecast_code.`ZN12`) * lokasi.`luas`) AS ZN12,
																  0 AS ZN12_aktual,
																  (IF(SUM(IF($wilayah.`act_grp` = 'ZN10', $wilayah.`biaya_realisasi`, 0)) / (lokasi.`luas` * std_yield.`yield`) / 1000 > 100, 0, forecast_code.`ZN13`) * lokasi.`luas`) AS ZN13,
																  (IF(SUM(IF($wilayah.`act_grp` = 'ZN10', $wilayah.`biaya_realisasi`, 0)) / (lokasi.`luas` * std_yield.`yield`) / 1000 > 100, 0, forecast_code.`ZN13`) * lokasi.`luas`)
																     *
																  (SELECT
																    forecast_overhead_code.`ZN06`
																  FROM
																    forecast_overhead_code
																  WHERE forecast_overhead_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
																    AND forecast_overhead_code.`bulan_panen` = MONTH(
															      IF(
															        ISNULL(lokasi.`tgl_panen_rencana`),
															        IF(
															          ISNULL(lokasi.`tgl_panen_standard`),
															          IF(
															            SUBSTRING(lokasi.`status`, 1, 4) = 'NSSC',
															            lokasi.`tgl_mulai_rawat` + INTERVAL 13 MONTH,
															            IF(
															              SUBSTRING(lokasi.`bibit`, 7, 1) = 'K',
															              lokasi.`tgl_mulai_rawat` + INTERVAL 19 MONTH,
															              IF(
															                SUBSTRING(lokasi.`bibit`, 7, 1) = 'S',
															                lokasi.`tgl_mulai_rawat` + INTERVAL 17 MONTH,
															                lokasi.`tgl_mulai_rawat` + INTERVAL 15 MONTH
															              )
															            )
															          ),
															          lokasi.`tgl_panen_rencana`
															        ),
															        lokasi.`tgl_panen_standard`
															      )
																  )
																  ) AS ZN13_aktual,
																  (IF(SUM(IF($wilayah.`act_grp` = 'ZN10', $wilayah.`biaya_realisasi`, 0)) / (lokasi.`luas` * std_yield.`yield`) / 1000 > 100, 0, forecast_code.`ZN14`) * lokasi.`luas`) AS ZN14,
																  0 AS ZN14_aktual,
																  (IF(SUM(IF($wilayah.`act_grp` = 'ZN10', $wilayah.`biaya_realisasi`, 0)) / (lokasi.`luas` * std_yield.`yield`) / 1000 > 100, 0, forecast_code.`ZN15`) * lokasi.`luas`) AS ZN15,
																  0 AS ZN15_aktual
																FROM
																  forecast_code,
																  konstanta,
																  std_yield,
																  $wilayah,
																  lokasi
																WHERE $wilayah.`lokasi` = lokasi.`lokasi`
																  AND $wilayah.`jenis_data` != '3X'
																  AND $wilayah.`jenis_data` != '7'
																  AND konstanta.`jenis` = 'TGL_TARIK_DATA'
																  AND SUBSTRING($wilayah.`current_status_lokasi`, 1, 4) = forecast_code.`status`
																  AND std_yield.`jenis` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
																  AND forecast_code.`umur` = CEIL(
																    TIMESTAMPDIFF(
																      DAY,
																lokasi.`tgl_mulai_rawat`,
																      konstanta.`nilai`
																    ) / 30.4583333333333
																  )
																  AND YEAR(
															      IF(
															        ISNULL(lokasi.`tgl_panen_rencana`),
															        IF(
															          ISNULL(lokasi.`tgl_panen_standard`),
															          IF(
															            SUBSTRING(lokasi.`status`, 1, 4) = 'NSSC',
															            lokasi.`tgl_mulai_rawat` + INTERVAL 13 MONTH,
															            IF(
															              SUBSTRING(lokasi.`bibit`, 7, 1) = 'K',
															              lokasi.`tgl_mulai_rawat` + INTERVAL 19 MONTH,
															              IF(
															                SUBSTRING(lokasi.`bibit`, 7, 1) = 'S',
															                lokasi.`tgl_mulai_rawat` + INTERVAL 17 MONTH,
															                lokasi.`tgl_mulai_rawat` + INTERVAL 15 MONTH
															              )
															            )
															          ),
															          lokasi.`tgl_panen_rencana`
															        ),
															        lokasi.`tgl_panen_standard`
															      )
																  ) = YEAR(konstanta.`nilai` + INTERVAL 1 YEAR)
																GROUP BY SUBSTRING($wilayah.`current_status_lokasi`, 1, 4),
																  MONTH(
															      IF(
															        ISNULL(lokasi.`tgl_panen_rencana`),
															        IF(
															          ISNULL(lokasi.`tgl_panen_standard`),
															          IF(
															            SUBSTRING(lokasi.`status`, 1, 4) = 'NSSC',
															            lokasi.`tgl_mulai_rawat` + INTERVAL 13 MONTH,
															            IF(
															              SUBSTRING(lokasi.`bibit`, 7, 1) = 'K',
															              lokasi.`tgl_mulai_rawat` + INTERVAL 19 MONTH,
															              IF(
															                SUBSTRING(lokasi.`bibit`, 7, 1) = 'S',
															                lokasi.`tgl_mulai_rawat` + INTERVAL 17 MONTH,
															                lokasi.`tgl_mulai_rawat` + INTERVAL 15 MONTH
															              )
															            )
															          ),
															          lokasi.`tgl_panen_rencana`
															        ),
															        lokasi.`tgl_panen_standard`
															      )
																  ),
																  $wilayah.`lokasi`");

		return $query->result();
	}

	function get_forecast_zn10_wilayah($wilayah){
		$query = $this->db->query("SELECT
															  $wilayah.`lokasi`,
															  SUBSTRING($wilayah.`current_status_lokasi`, 1, 4) AS status,
															  IF(SUM($wilayah.`biaya_realisasi`) / produksi.`real_dan_sisa_rencana_tonase` / 1000 < 5,
															    (SELECT
															      forecast_code.`ZN10`
															    FROM
															      forecast_code
															    WHERE forecast_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
															      AND forecast_code.`umur` = 1),
															    IF(SUM($wilayah.`biaya_realisasi`) / produksi.`real_dan_sisa_rencana_tonase` / 1000 <= 100,
															      (SELECT
															        forecast_code.`ZN10`
															      FROM
															        forecast_code
															      WHERE forecast_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
															        AND forecast_code.`umur` = CEIL(TIMESTAMPDIFF(DAY, produksi.`tgl_awal_perawatan`, konstanta.`nilai`) / 30.4583333333333)),
															      (SELECT
															        forecast_code.`ZN10`
															      FROM
															        forecast_code
															      WHERE forecast_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
															        AND forecast_code.`umur` = CEIL(TIMESTAMPDIFF(DAY, produksi.`tgl_awal_perawatan`, konstanta.`nilai`) / 30.4583333333333)) * 0.5)
															  ) * produksi.`real_dan_sisa_rencana_luas` AS ZN10,
															  (IF(SUM($wilayah.`biaya_realisasi`) / produksi.`real_dan_sisa_rencana_tonase` / 1000 < 5,
															    (SELECT
															      forecast_code.`ZN10`
															    FROM
															      forecast_code
															    WHERE forecast_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
															      AND forecast_code.`umur` = 1),
															    IF(SUM($wilayah.`biaya_realisasi`) / produksi.`real_dan_sisa_rencana_tonase` / 1000 <= 100,
															      (SELECT
															        forecast_code.`ZN10`
															      FROM
															        forecast_code
															      WHERE forecast_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
															        AND forecast_code.`umur` = CEIL(TIMESTAMPDIFF(DAY, produksi.`tgl_awal_perawatan`, konstanta.`nilai`) / 30.4583333333333)),
															      (SELECT
															        forecast_code.`ZN10`
															      FROM
															        forecast_code
															      WHERE forecast_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
															        AND forecast_code.`umur` = CEIL(TIMESTAMPDIFF(DAY, produksi.`tgl_awal_perawatan`, konstanta.`nilai`) / 30.4583333333333)) * 0.5)
															  ) *
															  (SELECT
															    forecast_overhead_code.`ZN10`
															  FROM
															    forecast_overhead_code
															  WHERE forecast_overhead_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
															    AND forecast_overhead_code.`bulan_panen` = MONTH(produksi.`real_dan_sisa_rencana_tgl_selesai_panen`)
															  )) * produksi.`real_dan_sisa_rencana_luas` AS ZN10_actual
															FROM
															  konstanta,
															  $wilayah
															  RIGHT JOIN produksi
															    ON $wilayah.`lokasi` = produksi.`lokasi`
															WHERE $wilayah.`jenis_data` != '3X'
															  AND $wilayah.`jenis_data` != '7'
															  AND konstanta.`jenis` = 'TGL_TARIK_DATA'
															  AND $wilayah.`act_grp` = 'ZN10'
															GROUP BY $wilayah.`lokasi`
															ORDER BY $wilayah.`lokasi` ASC, $wilayah.`act_grp` ASC");

		return $query->result();
	}
	function get_forecast_zn10_wilayah_raport($wilayah){
		$query = $this->db->query("SELECT
																	$wilayah.`lokasi`,
																	SUBSTRING($wilayah.`current_status_lokasi`, 1, 4) AS status,
																	CONCAT('B', MONTH(produksi.`real_dan_sisa_rencana_tgl_selesai_panen`)) AS bulan,
																	IF(SUM(IF($wilayah.`act_grp` = 'ZN10', $wilayah.`biaya_realisasi`, 0)) / produksi.`real_dan_sisa_rencana_tonase` / 1000 < 5,
																		(SELECT
																			forecast_code.`ZN10`
																		FROM
																			forecast_code
																		WHERE forecast_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
																			AND forecast_code.`umur` = 1),
																		IF(SUM(IF($wilayah.`act_grp` = 'ZN10', $wilayah.`biaya_realisasi`, 0)) / produksi.`real_dan_sisa_rencana_tonase` / 1000 <= 100,
																			(SELECT
																	forecast_code.`ZN10`
																			FROM
																	forecast_code
																			WHERE forecast_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
																	AND forecast_code.`umur` = CEIL(TIMESTAMPDIFF(DAY, produksi.`tgl_awal_perawatan`, konstanta.`nilai`) / 30.4583333333333)),
																			(SELECT
																	forecast_code.`ZN10`
																			FROM
																	forecast_code
																			WHERE forecast_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
																	AND forecast_code.`umur` = CEIL(TIMESTAMPDIFF(DAY, produksi.`tgl_awal_perawatan`, konstanta.`nilai`) / 30.4583333333333)) * 0.5)
																	) * produksi.`real_dan_sisa_rencana_luas` AS ZN10,
																	IF(SUM(IF($wilayah.`act_grp` = 'ZN08', $wilayah.`biaya_realisasi`, 0)) / produksi.`real_dan_sisa_rencana_tonase` / 1000 < 5,
																		(SELECT
																			forecast_code.`ZN10`
																		FROM
																			forecast_code
																		WHERE forecast_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
																			AND forecast_code.`umur` = 1),
																		IF(SUM(IF($wilayah.`act_grp` = 'ZN08', $wilayah.`biaya_realisasi`, 0)) / produksi.`real_dan_sisa_rencana_tonase` / 1000 <= 100,
																			(SELECT
																	forecast_code.`ZN10`
																			FROM
																	forecast_code
																			WHERE forecast_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
																	AND forecast_code.`umur` = CEIL(TIMESTAMPDIFF(DAY, produksi.`tgl_awal_perawatan`, konstanta.`nilai`) / 30.4583333333333)),
																			(SELECT
																	forecast_code.`ZN10`
																			FROM
																	forecast_code
																			WHERE forecast_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
																	AND forecast_code.`umur` = CEIL(TIMESTAMPDIFF(DAY, produksi.`tgl_awal_perawatan`, konstanta.`nilai`) / 30.4583333333333)) * 0.5)
																	) *
																	(SELECT
																		forecast_overhead_code.`ZN10`
																	FROM
																		forecast_overhead_code
																	WHERE forecast_overhead_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
																		AND forecast_overhead_code.`bulan_panen` = MONTH(produksi.`real_dan_sisa_rencana_tgl_selesai_panen`)
																	) * produksi.`real_dan_sisa_rencana_luas` AS ZN10_actual
																FROM
																	konstanta,
																	$wilayah
																	RIGHT JOIN produksi
																		ON $wilayah.`lokasi` = produksi.`lokasi`
																WHERE $wilayah.`jenis_data` != '3X'
																	AND $wilayah.`jenis_data` != '7'
																	AND konstanta.`jenis` = 'TGL_TARIK_DATA'
																AND produksi.`keterangan` != 'selesai'
																GROUP BY SUBSTRING($wilayah.`current_status_lokasi`, 1, 4) ASC,
																	MONTH(produksi.`real_dan_sisa_rencana_tgl_selesai_panen`) ASC,
																	$wilayah.`lokasi` ASC");

		return $query->result();
	}
	function get_forecast_zn10_wilayah_raport_t1($wilayah){
		$query = $this->db->query("SELECT
																  $wilayah.`lokasi`,
																  SUBSTRING($wilayah.`current_status_lokasi`, 1, 4) AS status,
																  CONCAT('B', MONTH(
															      IF(
															        ISNULL(lokasi.`tgl_panen_rencana`),
															        IF(
															          ISNULL(lokasi.`tgl_panen_standard`),
															          IF(
															            SUBSTRING(lokasi.`status`, 1, 4) = 'NSSC',
															            lokasi.`tgl_mulai_rawat` + INTERVAL 13 MONTH,
															            IF(
															              SUBSTRING(lokasi.`bibit`, 7, 1) = 'K',
															              lokasi.`tgl_mulai_rawat` + INTERVAL 19 MONTH,
															              IF(
															                SUBSTRING(lokasi.`bibit`, 7, 1) = 'S',
															                lokasi.`tgl_mulai_rawat` + INTERVAL 17 MONTH,
															                lokasi.`tgl_mulai_rawat` + INTERVAL 15 MONTH
															              )
															            )
															          ),
															          lokasi.`tgl_panen_rencana`
															        ),
															        lokasi.`tgl_panen_standard`
															      )
																  )) AS bulan,
																  IF(
																    SUM(
																      IF(
																        $wilayah.`act_grp` = 'ZN10',
																        $wilayah.`biaya_realisasi`,
																        0
																      )
																    ) / (lokasi.`luas` * std_yield.`yield`) / 1000 < 5,
																    (SELECT
																      forecast_code.`ZN10`
																    FROM
																      forecast_code
																    WHERE forecast_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
																      AND forecast_code.`umur` = 1),
																    IF(
																      SUM(
																        IF(
																          $wilayah.`act_grp` = 'ZN10',
																          $wilayah.`biaya_realisasi`,
																          0
																        )
																      ) / (lokasi.`luas` * std_yield.`yield`) / 1000 <= 100,
																      (SELECT
																        forecast_code.`ZN10`
																      FROM
																        forecast_code
																      WHERE forecast_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
																        AND forecast_code.`umur` = CEIL(
																          TIMESTAMPDIFF(
																            DAY,
																            lokasi.`tgl_mulai_rawat`,
																            konstanta.`nilai`
																          ) / 30.4583333333333
																        )),
																      (SELECT
																        forecast_code.`ZN10`
																      FROM
																        forecast_code
																      WHERE forecast_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
																        AND forecast_code.`umur` = CEIL(
																          TIMESTAMPDIFF(
																            DAY,
																            lokasi.`tgl_mulai_rawat`,
																            konstanta.`nilai`
																          ) / 30.4583333333333
																        )) * 0.5
																    )
																  ) * lokasi.`luas` AS ZN10,
																  IF(
																    SUM(
																      IF(
																        $wilayah.`act_grp` = 'ZN08',
																        $wilayah.`biaya_realisasi`,
																        0
																      )
																    ) / (lokasi.`luas` * std_yield.`yield`) / 1000 < 5,
																    (SELECT
																      forecast_code.`ZN10`
																    FROM
																      forecast_code
																    WHERE forecast_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
																      AND forecast_code.`umur` = 1),
																    IF(
																      SUM(
																        IF(
																          $wilayah.`act_grp` = 'ZN08',
																          $wilayah.`biaya_realisasi`,
																          0
																        )
																      ) / (lokasi.`luas` * std_yield.`yield`) / 1000 <= 100,
																      (SELECT
																        forecast_code.`ZN10`
																      FROM
																        forecast_code
																      WHERE forecast_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
																        AND forecast_code.`umur` = CEIL(
																          TIMESTAMPDIFF(
																            DAY,
																            lokasi.`tgl_mulai_rawat`,
																            konstanta.`nilai`
																          ) / 30.4583333333333
																        )),
																      (SELECT
																        forecast_code.`ZN10`
																      FROM
																        forecast_code
																      WHERE forecast_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
																        AND forecast_code.`umur` = CEIL(
																          TIMESTAMPDIFF(
																            DAY,
																            lokasi.`tgl_mulai_rawat`,
																            konstanta.`nilai`
																          ) / 30.4583333333333
																        )) * 0.5
																    )
																  ) *
																  (SELECT
																    forecast_overhead_code.`ZN10`
																  FROM
																    forecast_overhead_code
																  WHERE forecast_overhead_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
																    AND forecast_overhead_code.`bulan_panen` = MONTH(
															      IF(
															        ISNULL(lokasi.`tgl_panen_rencana`),
															        IF(
															          ISNULL(lokasi.`tgl_panen_standard`),
															          IF(
															            SUBSTRING(lokasi.`status`, 1, 4) = 'NSSC',
															            lokasi.`tgl_mulai_rawat` + INTERVAL 13 MONTH,
															            IF(
															              SUBSTRING(lokasi.`bibit`, 7, 1) = 'K',
															              lokasi.`tgl_mulai_rawat` + INTERVAL 19 MONTH,
															              IF(
															                SUBSTRING(lokasi.`bibit`, 7, 1) = 'S',
															                lokasi.`tgl_mulai_rawat` + INTERVAL 17 MONTH,
															                lokasi.`tgl_mulai_rawat` + INTERVAL 15 MONTH
															              )
															            )
															          ),
															          lokasi.`tgl_panen_rencana`
															        ),
															        lokasi.`tgl_panen_standard`
															      )
																  )) * lokasi.`luas` AS ZN10_actual
																FROM
																  konstanta,
																  std_yield,
																  $wilayah,
																  lokasi
																WHERE $wilayah.`lokasi` = lokasi.`lokasi`
																  AND $wilayah.`jenis_data` != '3X'
																  AND $wilayah.`jenis_data` != '7'
																  AND konstanta.`jenis` = 'TGL_TARIK_DATA'
																  AND std_yield.`jenis` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
																  AND YEAR(
															      IF(
															        ISNULL(lokasi.`tgl_panen_rencana`),
															        IF(
															          ISNULL(lokasi.`tgl_panen_standard`),
															          IF(
															            SUBSTRING(lokasi.`status`, 1, 4) = 'NSSC',
															            lokasi.`tgl_mulai_rawat` + INTERVAL 13 MONTH,
															            IF(
															              SUBSTRING(lokasi.`bibit`, 7, 1) = 'K',
															              lokasi.`tgl_mulai_rawat` + INTERVAL 19 MONTH,
															              IF(
															                SUBSTRING(lokasi.`bibit`, 7, 1) = 'S',
															                lokasi.`tgl_mulai_rawat` + INTERVAL 17 MONTH,
															                lokasi.`tgl_mulai_rawat` + INTERVAL 15 MONTH
															              )
															            )
															          ),
															          lokasi.`tgl_panen_rencana`
															        ),
															        lokasi.`tgl_panen_standard`
															      )
																  ) = YEAR(konstanta.`nilai` + INTERVAL 1 YEAR)
																GROUP BY SUBSTRING($wilayah.`current_status_lokasi`, 1, 4),
																  MONTH(
															      IF(
															        ISNULL(lokasi.`tgl_panen_rencana`),
															        IF(
															          ISNULL(lokasi.`tgl_panen_standard`),
															          IF(
															            SUBSTRING(lokasi.`status`, 1, 4) = 'NSSC',
															            lokasi.`tgl_mulai_rawat` + INTERVAL 13 MONTH,
															            IF(
															              SUBSTRING(lokasi.`bibit`, 7, 1) = 'K',
															              lokasi.`tgl_mulai_rawat` + INTERVAL 19 MONTH,
															              IF(
															                SUBSTRING(lokasi.`bibit`, 7, 1) = 'S',
															                lokasi.`tgl_mulai_rawat` + INTERVAL 17 MONTH,
															                lokasi.`tgl_mulai_rawat` + INTERVAL 15 MONTH
															              )
															            )
															          ),
															          lokasi.`tgl_panen_rencana`
															        ),
															        lokasi.`tgl_panen_standard`
															      )
																  ),
																  $wilayah.`lokasi`");

		return $query->result();
	}

	function get_forecast_zn08_wilayah($wilayah){
		$query = $this->db->query("SELECT
																  $wilayah.`lokasi`,
																  SUBSTRING($wilayah.`current_status_lokasi`, 1, 4) AS status,
																  IF(SUM($wilayah.`biaya_realisasi`) / produksi.`real_dan_sisa_rencana_luas` < 500000,
																    (SELECT
																      forecast_code.`ZN08`
																    FROM
																      forecast_code
																    WHERE forecast_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
																      AND forecast_code.`umur` = 1),
																    IF(SUM($wilayah.`biaya_realisasi`) / produksi.`real_dan_sisa_rencana_luas` <= 1000000,
																      (SELECT
																	forecast_code.`ZN08`
																      FROM
																	forecast_code
																      WHERE forecast_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
																	AND forecast_code.`umur` = 2),
																      (SELECT
																	forecast_code.`ZN08`
																      FROM
																	forecast_code
																      WHERE forecast_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
																	AND forecast_code.`umur` = 3))
																  ) * produksi.`real_dan_sisa_rencana_luas` AS ZN08
																FROM
																  konstanta,
																  $wilayah
																  RIGHT JOIN produksi
																    ON $wilayah.`lokasi` = produksi.`lokasi`
																WHERE $wilayah.`jenis_data` != '3X'
																  AND $wilayah.`jenis_data` != '7'
																  AND konstanta.`jenis` = 'TGL_TARIK_DATA'
																  AND $wilayah.`act_grp` = 'ZN08'
																GROUP BY $wilayah.`lokasi`
																ORDER BY $wilayah.`lokasi` ASC, $wilayah.`act_grp` ASC");

		return $query->result();
	}
	function get_forecast_zn08_wilayah_raport($wilayah){
		$query = $this->db->query("SELECT
															  SUBSTRING($wilayah.`current_status_lokasi`, 1, 4) AS status,
															  CONCAT('B', MONTH(produksi.`real_dan_sisa_rencana_tgl_selesai_panen`)) AS bulan,
															  $wilayah.`lokasi`,
															  IF(SUM(IF($wilayah.`act_grp` = 'ZN08', $wilayah.`biaya_realisasi`, 0)) / produksi.`real_dan_sisa_rencana_luas` < 500000,
															    (SELECT
															      forecast_code.`ZN08`
															    FROM
															      forecast_code
															    WHERE forecast_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
															      AND forecast_code.`umur` = 1),
															    IF(SUM(IF($wilayah.`act_grp` = 'ZN08', $wilayah.`biaya_realisasi`, 0)) / produksi.`real_dan_sisa_rencana_luas` <= 1000000,
															      (SELECT
																forecast_code.`ZN08`
															      FROM
																forecast_code
															      WHERE forecast_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
																AND forecast_code.`umur` = 2),
															      (SELECT
																forecast_code.`ZN08`
															      FROM
																forecast_code
															      WHERE forecast_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
																AND forecast_code.`umur` = 3))
															  ) * produksi.`real_dan_sisa_rencana_luas` AS ZN08,
															  0 * produksi.`real_dan_sisa_rencana_luas` AS ZN08_actual
															FROM
															  konstanta,
															  $wilayah
															  RIGHT JOIN produksi
															    ON $wilayah.`lokasi` = produksi.`lokasi`
															WHERE $wilayah.`jenis_data` != '3X'
															  AND $wilayah.`jenis_data` != '7'
															  AND konstanta.`jenis` = 'TGL_TARIK_DATA'
															AND produksi.`keterangan` != 'selesai'
															GROUP BY SUBSTRING($wilayah.`current_status_lokasi`, 1, 4) ASC,
															  MONTH(produksi.`real_dan_sisa_rencana_tgl_selesai_panen`) ASC,
															  $wilayah.`lokasi` ASC");

		return $query->result();
	}
	function get_forecast_zn08_wilayah_raport_t1($wilayah){
		$query = $this->db->query("SELECT
																  SUBSTRING($wilayah.`current_status_lokasi`, 1, 4) AS status,
																  CONCAT('B', MONTH(
															      IF(
															        ISNULL(lokasi.`tgl_panen_rencana`),
															        IF(
															          ISNULL(lokasi.`tgl_panen_standard`),
															          IF(
															            SUBSTRING(lokasi.`status`, 1, 4) = 'NSSC',
															            lokasi.`tgl_mulai_rawat` + INTERVAL 13 MONTH,
															            IF(
															              SUBSTRING(lokasi.`bibit`, 7, 1) = 'K',
															              lokasi.`tgl_mulai_rawat` + INTERVAL 19 MONTH,
															              IF(
															                SUBSTRING(lokasi.`bibit`, 7, 1) = 'S',
															                lokasi.`tgl_mulai_rawat` + INTERVAL 17 MONTH,
															                lokasi.`tgl_mulai_rawat` + INTERVAL 15 MONTH
															              )
															            )
															          ),
															          lokasi.`tgl_panen_rencana`
															        ),
															        lokasi.`tgl_panen_standard`
															      )
																  )) AS bulan,
																  $wilayah.`lokasi`,
																  IF(SUM(IF($wilayah.`act_grp` = 'ZN08', $wilayah.`biaya_realisasi`, 0)) / lokasi.`lokasi` < 500000,
																    (SELECT
																      forecast_code.`ZN08`
																    FROM
																      forecast_code
																    WHERE forecast_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
																      AND forecast_code.`umur` = 1),
																    IF(SUM(IF($wilayah.`act_grp` = 'ZN08', $wilayah.`biaya_realisasi`, 0)) / lokasi.`lokasi` <= 1000000,
																      (SELECT
																	forecast_code.`ZN08`
																      FROM
																	forecast_code
																      WHERE forecast_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
																	AND forecast_code.`umur` = 2),
																      (SELECT
																	forecast_code.`ZN08`
																      FROM
																	forecast_code
																      WHERE forecast_code.`status` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
																	AND forecast_code.`umur` = 3))
																  ) * lokasi.`luas` AS ZN08,
																  0 * lokasi.`luas` AS ZN08_actual
																FROM
																  konstanta,
																  std_yield,
																  $wilayah,
																  lokasi
																WHERE $wilayah.`lokasi` = lokasi.`lokasi`
																  AND $wilayah.`jenis_data` != '3X'
																  AND $wilayah.`jenis_data` != '7'
																  AND konstanta.`jenis` = 'TGL_TARIK_DATA'
																  AND std_yield.`jenis` = SUBSTRING($wilayah.`current_status_lokasi`, 1, 4)
																  AND YEAR(
															      IF(
															        ISNULL(lokasi.`tgl_panen_rencana`),
															        IF(
															          ISNULL(lokasi.`tgl_panen_standard`),
															          IF(
															            SUBSTRING(lokasi.`status`, 1, 4) = 'NSSC',
															            lokasi.`tgl_mulai_rawat` + INTERVAL 13 MONTH,
															            IF(
															              SUBSTRING(lokasi.`bibit`, 7, 1) = 'K',
															              lokasi.`tgl_mulai_rawat` + INTERVAL 19 MONTH,
															              IF(
															                SUBSTRING(lokasi.`bibit`, 7, 1) = 'S',
															                lokasi.`tgl_mulai_rawat` + INTERVAL 17 MONTH,
															                lokasi.`tgl_mulai_rawat` + INTERVAL 15 MONTH
															              )
															            )
															          ),
															          lokasi.`tgl_panen_rencana`
															        ),
															        lokasi.`tgl_panen_standard`
															      )
																  ) = YEAR(konstanta.`nilai` + INTERVAL 1 YEAR)
																GROUP BY SUBSTRING($wilayah.`current_status_lokasi`, 1, 4),
																  MONTH(
															      IF(
															        ISNULL(lokasi.`tgl_panen_rencana`),
															        IF(
															          ISNULL(lokasi.`tgl_panen_standard`),
															          IF(
															            SUBSTRING(lokasi.`status`, 1, 4) = 'NSSC',
															            lokasi.`tgl_mulai_rawat` + INTERVAL 13 MONTH,
															            IF(
															              SUBSTRING(lokasi.`bibit`, 7, 1) = 'K',
															              lokasi.`tgl_mulai_rawat` + INTERVAL 19 MONTH,
															              IF(
															                SUBSTRING(lokasi.`bibit`, 7, 1) = 'S',
															                lokasi.`tgl_mulai_rawat` + INTERVAL 17 MONTH,
															                lokasi.`tgl_mulai_rawat` + INTERVAL 15 MONTH
															              )
															            )
															          ),
															          lokasi.`tgl_panen_rencana`
															        ),
															        lokasi.`tgl_panen_standard`
															      )
																  ),
																  $wilayah.`lokasi`");

		return $query->result();
	}

	function get_help_zn10($bulan){
		$query = $this->db->query("SELECT
																  ZN10
																FROM
																  help_zn10
																WHERE help_zn10.`bulan` = '$bulan'");

		return $query->row_array();
	}
}
