<?php

class HPP_model extends CI_Model
{
	function get_hpp_lokasi($wilayah){
		$query = $this->db->query("SELECT
															  hpp.`pg`,
															  hpp.`wilayah`,
															  hpp.`lokasi`,
															  hpp.`status`,
															  CONCAT('B', MONTH(produksi.`real_dan_sisa_rencana_tgl_selesai_panen`)) AS bulan,
															  (hpp.`ZN01`) AS ZN01,
															  (hpp.`ZN02`) AS ZN02,
															  (hpp.`ZN03`) AS ZN03,
															  (hpp.`ZN04`) AS ZN04,
															  (hpp.`ZN05`) AS ZN05,
															  (hpp.`ZN06`) AS ZN06,
															  (hpp.`ZN07`) AS ZN07,
															  (hpp.`ZN08`) AS ZN08,
															  (hpp.`ZN09`) AS ZN09,
															  (hpp.`ZN10`) AS ZN10,
															  (hpp.`ZN11`) AS ZN11,
															  (hpp.`ZN12`) AS ZN12,
															  (hpp.`ZN13`) AS ZN13,
															  (hpp.`ZN14`) AS ZN14,
															  (hpp.`ZN15`) AS ZN15,
															  produksi.`real_dan_sisa_rencana_luas` AS luas,
															  produksi.`real_dan_sisa_rencana_tonase` AS tonase
															FROM
															  produksi,
															  hpp
															 WHERE hpp.`wilayah` = '$wilayah'
															   AND hpp.`lokasi` = produksi.`lokasi`
															   AND produksi.`keterangan` = 'selesai'");

		return $query->result();
	}
	function get_hpp_wilayah($wilayah, $jenis){
		$query = $this->db->query("SELECT
																  hpp.`status`,
																  SUM(hpp.`ZN01`) AS ZN01,
																  SUM(hpp.`ZN02`) AS ZN02,
																  SUM(hpp.`ZN03`) AS ZN03,
																  SUM(hpp.`ZN04`) AS ZN04,
																  SUM(hpp.`ZN05`) AS ZN05,
																  SUM(hpp.`ZN06`) AS ZN06,
																  SUM(hpp.`ZN07`) AS ZN07,
																  SUM(hpp.`ZN08`) AS ZN08,
																  SUM(hpp.`ZN09`) AS ZN09,
																  SUM(hpp.`ZN10`) AS ZN10,
																  SUM(hpp.`ZN11`) AS ZN11,
																  SUM(hpp.`ZN12`) AS ZN12,
																  SUM(hpp.`ZN13`) AS ZN13,
																  SUM(hpp.`ZN14`) AS ZN14,
																  SUM(hpp.`ZN15`) AS ZN15
																FROM
																  hpp
																WHERE hpp.`wilayah` = '$wilayah'
																  AND hpp.`status` = '$jenis'");

		return $query->row_array();
	}
	function get_hpp_wilayah_raport($wilayah){
		$query = $this->db->query("SELECT
																  hpp.`status`,
  																CONCAT('B', MONTH(produksi.`real_dan_sisa_rencana_tgl_selesai_panen`)) AS bulan,
																  SUM(hpp.`ZN01`) AS ZN01,
																  SUM(hpp.`ZN02`) AS ZN02,
																  SUM(hpp.`ZN03`) AS ZN03,
																  SUM(hpp.`ZN04`) AS ZN04,
																  SUM(hpp.`ZN05`) AS ZN05,
																  SUM(hpp.`ZN06`) AS ZN06,
																  SUM(hpp.`ZN07`) AS ZN07,
																  SUM(hpp.`ZN08`) AS ZN08,
																  SUM(hpp.`ZN09`) AS ZN09,
																  SUM(hpp.`ZN10`) AS ZN10,
																  SUM(hpp.`ZN11`) AS ZN11,
																  SUM(hpp.`ZN12`) AS ZN12,
																  SUM(hpp.`ZN13`) AS ZN13,
																  SUM(hpp.`ZN14`) AS ZN14,
																  SUM(hpp.`ZN15`) AS ZN15
																FROM
																  hpp
																  INNER JOIN produksi
																    ON hpp.`lokasi` = produksi.`lokasi`
																WHERE hpp.`wilayah` = '$wilayah'
																GROUP BY hpp.`status`,
																  MONTH(produksi.`real_dan_sisa_rencana_tgl_selesai_panen`)");

		return $query->result();
	}
	function get_hpp_all_wilayah($wilayah){
		$query = $this->db->query("SELECT
																  hpp.`status`,
																  SUM(hpp.`ZN01`) AS ZN01,
																  SUM(hpp.`ZN02`) AS ZN02,
																  SUM(hpp.`ZN03`) AS ZN03,
																  SUM(hpp.`ZN04`) AS ZN04,
																  SUM(hpp.`ZN05`) AS ZN05,
																  SUM(hpp.`ZN06`) AS ZN06,
																  SUM(hpp.`ZN07`) AS ZN07,
																  SUM(hpp.`ZN08`) AS ZN08,
																  SUM(hpp.`ZN09`) AS ZN09,
																  SUM(hpp.`ZN10`) AS ZN10,
																  SUM(hpp.`ZN11`) AS ZN11,
																  SUM(hpp.`ZN12`) AS ZN12,
																  SUM(hpp.`ZN13`) AS ZN13,
																  SUM(hpp.`ZN14`) AS ZN14,
																  SUM(hpp.`ZN15`) AS ZN15
																FROM
																  hpp
																WHERE hpp.`wilayah` = '$wilayah'");

		return $query->row_array();
	}
}
