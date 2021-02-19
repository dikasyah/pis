<?php

class ForecastOverhead_model extends CI_Model
{

	function get_forecast_overhead_code($jenis, $status, $bulan_panen){
		$query = $this->db->query("SELECT
																  forecast_overhead.`element_cost`,
																  forecast_overhead.`$bulan_panen` AS fo
																FROM
																  forecast_overhead
																WHERE forecast_overhead.`status` = '$status'
																  AND forecast_overhead.`element_cost` = '$jenis'");

		return $query->row_array();
	}
	function get_forecast_overhead_wilayah($wilayah, $jenis){
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
																  SUM((forecast_code.`ZN04` * produksi.`real_dan_sisa_rencana_luas`) * forecast_overhead_code.`ZN04`) AS ZN04,
																  SUM((forecast_code.`ZN05` * produksi.`real_dan_sisa_rencana_luas`) * forecast_overhead_code.`ZN05`) AS ZN05,
																  SUM((forecast_code.`ZN06` * produksi.`real_dan_sisa_rencana_luas`) * forecast_overhead_code.`ZN06`) AS ZN06,
																  SUM((forecast_code.`ZN10` * produksi.`real_dan_sisa_rencana_luas`) * forecast_overhead_code.`ZN10`) AS ZN10,
																  SUM((forecast_code.`ZN13` * produksi.`real_dan_sisa_rencana_luas`) * forecast_overhead_code.`ZN13`) AS ZN13
																FROM
																  forecast_code,
																  forecast_overhead_code,
																  konstanta,
																  lokasi
																  RIGHT JOIN produksi
																    ON lokasi.`lokasi` = produksi.`lokasi`
																WHERE SUBSTRING(kebun, 1, 3) = '$wilayah'
																  AND konstanta.`jenis` = 'TGL_TARIK_DATA'
																  AND produksi.`status` = forecast_overhead_code.`status`
																  AND produksi.`status` = forecast_code.`status`
																  AND produksi.`keterangan` != 'selesai'
																  AND forecast_overhead_code.`bulan_panen` = MONTH(produksi.`real_dan_sisa_rencana_tgl_selesai_panen`)
																  AND forecast_code.`umur` = CEIL(
																    TIMESTAMPDIFF(DAY, produksi.`tgl_awal_perawatan`, konstanta.`nilai`) / 30.4583333333333
																  )
																	$status");

		return $query->row_array();
	}
}
