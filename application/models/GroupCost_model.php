<?php

class GroupCost_model extends CI_Model
{

	function get_group_cost_code_jenis($lokasi, $jenis, $data_master){
		$query = $this->db->query("SELECT
																  SUM($data_master.`biaya_realisasi`) AS total
																FROM
																  $data_master,
																  help_jenis_data
																WHERE $data_master.`lokasi` = '$lokasi'
																  AND $data_master.`jenis_data` = help_jenis_data.`kode`
																	AND $data_master.`act_grp` != 'ZN16'
																  AND help_jenis_data.`category` = '$jenis'");

		return $query->row_array();
	}
	function get_group_cost_wilayah_jenis($jenis, $data_master){
		$query = $this->db->query("SELECT
																  help_jenis_data.`category`,
																  SUM(
																    IF(
																      (SELECT
																        produksi.`lokasi`
																      FROM
																        produksi
																      WHERE produksi.`keterangan` != 'selesai'
																        AND produksi.`lokasi` = $data_master.`lokasi`),
																      $data_master.`biaya_realisasi`,
																      0
																    )
																  ) AS t0_total,
																  SUM(
																    IF(
																      (SELECT
																        produksi.`lokasi`
																      FROM
																        produksi
																      WHERE produksi.`keterangan` != 'selesai'
																        AND produksi.`lokasi` = $data_master.`lokasi`),
																      0,
																      IF((SELECT
																  lokasi.`lokasi`
																FROM
																  lokasi,
																  konstanta
																WHERE konstanta.`jenis` = 'TGL_TARIK_DATA'
																  AND YEAR(
																    IF(
																      ISNULL(YEAR(lokasi.`tgl_panen_rencana`)),
																      IF(
																        ISNULL(lokasi.`bibit`),
																        IF(
																          SUBSTRING(lokasi.`bibit`, 7, 1) = 'K',
																          lokasi.`tgl_mulai_rawat` + INTERVAL 457 DAY,
																          IF(
																            SUBSTRING(lokasi.`bibit`, 7, 1) = 'S',
																            lokasi.`tgl_mulai_rawat` + INTERVAL 518 DAY,
																            lokasi.`tgl_mulai_rawat` + INTERVAL 579 DAY
																          )
																        ),
																        lokasi.`tgl_mulai_rawat` + INTERVAL 396 DAY
																      ),
																      lokasi.`tgl_panen_rencana`
																    )
																  ) = YEAR(konstanta.`nilai`) + 1
																  AND lokasi.`lokasi` = $data_master.`lokasi`), $data_master.`biaya_realisasi`, 0)
																    )) AS t1_total
																FROM
																  $data_master,
																  help_jenis_data
																WHERE $data_master.`jenis_data` != '3X'
																  AND $data_master.`jenis_data` != '7'
																  AND $data_master.`jenis_data` = help_jenis_data.`kode`
																  AND help_jenis_data.`category` = '$jenis'");

		return $query->row_array();
	}

	function get_group_cost_all_code($lokasi, $data_master){
		$query = $this->db->query("SELECT
																  SUM($data_master.`biaya_realisasi`) AS total
																FROM
																  $data_master,
																  help_jenis_data
																WHERE $data_master.`lokasi` = '$lokasi'
																  AND $data_master.`jenis_data` = help_jenis_data.`kode`");

		return $query->row_array();
	}

	function set_group_cost_lokasi($pg, $wilayah, $lokasi, $status, $bulan, $tahun, $labour, $charge, $material, $bibit, $luas, $tonase){
		$query = $this->db->query("INSERT INTO group_cost_lokasi
																VALUES
																  (
																    '$pg',
																    '$wilayah',
																    '$lokasi',
																		'$status',
																		'$bulan',
																    '$tahun',
																    '$labour',
																    '$charge',
																    '$material',
																    '$bibit',
																    '$luas',
																    '$tonase'
																  )");

		return true;
	}

	function get_group_cost_umur($lokasi, $wilayah, $tgl_perawatan, $jenis){
		switch ($jenis) {
			case 'Labour':
			case 'Charge':
			case 'Material':
				$option = "AND help_jenis_data.`category` = '$jenis'";
			break;

			default:
				$option = "";
			break;
		}
		$query = $this->db->query("SELECT
																  SUM(IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 1 MONTH, $wilayah.`biaya_realisasi`, 0)) AS B1,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 1 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 2 MONTH, $wilayah.`biaya_realisasi`, 0), 0)) AS B2,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 2 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 3 MONTH, $wilayah.`biaya_realisasi`, 0), 0)) AS B3,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 3 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 4 MONTH, $wilayah.`biaya_realisasi`, 0), 0)) AS B4,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 4 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 5 MONTH, $wilayah.`biaya_realisasi`, 0), 0)) AS B5,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 5 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 6 MONTH, $wilayah.`biaya_realisasi`, 0), 0)) AS B6,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 6 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 7 MONTH, $wilayah.`biaya_realisasi`, 0), 0)) AS B7,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 7 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 8 MONTH, $wilayah.`biaya_realisasi`, 0), 0)) AS B8,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 8 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 9 MONTH, $wilayah.`biaya_realisasi`, 0), 0)) AS B9,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 9 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 10 MONTH, $wilayah.`biaya_realisasi`, 0), 0)) AS B10,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 10 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 11 MONTH, $wilayah.`biaya_realisasi`, 0), 0)) AS B11,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 11 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 12 MONTH, $wilayah.`biaya_realisasi`, 0), 0)) AS B12,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 12 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 13 MONTH, $wilayah.`biaya_realisasi`, 0), 0)) AS B13,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 13 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 14 MONTH, $wilayah.`biaya_realisasi`, 0), 0)) AS B14,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 14 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 15 MONTH, $wilayah.`biaya_realisasi`, 0), 0)) AS B15,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 15 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 16 MONTH, $wilayah.`biaya_realisasi`, 0), 0)) AS B16,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 16 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 17 MONTH, $wilayah.`biaya_realisasi`, 0), 0)) AS B17,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 17 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 18 MONTH, $wilayah.`biaya_realisasi`, 0), 0)) AS B18,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 18 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 19 MONTH, $wilayah.`biaya_realisasi`, 0), 0)) AS B19,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 19 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 20 MONTH, $wilayah.`biaya_realisasi`, 0), 0)) AS B20,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 20 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 21 MONTH, $wilayah.`biaya_realisasi`, 0), 0)) AS B21,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 21 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 22 MONTH, $wilayah.`biaya_realisasi`, 0), 0)) AS B22,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 22 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 23 MONTH, $wilayah.`biaya_realisasi`, 0), 0)) AS B23,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 23 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 24 MONTH, $wilayah.`biaya_realisasi`, 0), 0)) AS B24
																FROM
																  $wilayah,
																  help_jenis_data
																WHERE $wilayah.`lokasi` = '$lokasi'
																  $option
																  AND $wilayah.`jenis_data` = help_jenis_data.`kode`
																  -- AND $wilayah.`act_grp` IN (
																  --   'ZN04',
																  --   'ZN05',
																  --   'ZN06',
																  --   'ZN07',
																  --   'ZN08',
																  --   'ZN09',
																  --   'ZN10',
																  --   'ZN11',
																  --   'ZN12',
																  --   'ZN13',
																  --   'ZN14'
																  -- )");

		return $query->row_array();
	}

	function get_group_cost_umur_total($lokasi, $wilayah){
		$query = $this->db->query("SELECT
																  SUM(IF(help_jenis_data.`category` = 'Labour', $wilayah.`biaya_realisasi`, 0)) AS Labour,
																  SUM(IF(help_jenis_data.`category` = 'Charge', $wilayah.`biaya_realisasi`, 0)) AS Charge,
																  SUM(IF(help_jenis_data.`category` = 'Material' AND $wilayah.`act_grp` != 'ZN03', $wilayah.`biaya_realisasi`, 0)) AS Material,
																  SUM(IF((help_jenis_data.`category` = 'Bibit' OR help_jenis_data.`category` = 'Material') AND $wilayah.`act_grp` = 'ZN03', $wilayah.`biaya_realisasi`, 0)) AS Seed,
																  SUM($wilayah.`biaya_realisasi`) AS Total
																FROM
																  $wilayah,
																  help_jenis_data
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`jenis_data` = help_jenis_data.`kode`
																  -- AND $wilayah.`act_grp` IN (
																  --   'ZN04',
																  --   'ZN05',
																  --   'ZN06',
																  --   'ZN07',
																  --   'ZN08',
																  --   'ZN09',
																  --   'ZN10',
																  --   'ZN11',
																  --   'ZN12',
																  --   'ZN13',
																  --   'ZN14'
																  -- )");

		return $query->row_array();
	}
	function get_group_cost_umur_total_all($lokasi, $wilayah){
		$query = $this->db->query("SELECT
																  SUM(IF(help_jenis_data.`category` = 'Labour', $wilayah.`biaya_realisasi`, 0)) AS Labour,
																  SUM(IF(help_jenis_data.`category` = 'Charge', $wilayah.`biaya_realisasi`, 0)) AS Charge,
																  SUM(IF(help_jenis_data.`category` = 'Material' AND $wilayah.`act_grp` != 'ZN03', $wilayah.`biaya_realisasi`, 0)) AS Material,
																  SUM(IF((help_jenis_data.`category` = 'Bibit' OR help_jenis_data.`category` = 'Material') AND $wilayah.`act_grp` = 'ZN03', $wilayah.`biaya_realisasi`, 0)) AS Seed,
																  SUM($wilayah.`biaya_realisasi`) AS Total
																FROM
																  $wilayah,
																  help_jenis_data
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`jenis_data` = help_jenis_data.`kode`
																  AND $wilayah.`act_grp` IN (
																    'ZN01',
																    'ZN02',
																    'ZN03',
																    'ZN04',
																    'ZN05',
																    'ZN06',
																    'ZN07',
																    'ZN08',
																    'ZN09',
																    'ZN10',
																    'ZN11',
																    'ZN12',
																    'ZN13',
																    'ZN14',
																    'ZN15'
																  )");

		return $query->row_array();
	}
	function get_group_cost_umur_total_panen($lokasi, $wilayah, $tahun){
		$query = $this->db->query("SELECT
																  SUM(IF(help_jenis_data.`category` = 'Labour', $wilayah.`biaya_realisasi`, 0)) AS Labour,
																  SUM(IF(help_jenis_data.`category` = 'Charge', $wilayah.`biaya_realisasi`, 0)) AS Charge,
																  SUM(IF(help_jenis_data.`category` = 'Material' AND $wilayah.`act_grp` != 'ZN03', $wilayah.`biaya_realisasi`, 0)) AS Material,
																  SUM(IF((help_jenis_data.`category` = 'Bibit' OR help_jenis_data.`category` = 'Material') AND $wilayah.`act_grp` = 'ZN03', $wilayah.`biaya_realisasi`, 0)) AS Seed,
																  SUM($wilayah.`biaya_realisasi`) AS Total
																FROM
																  $wilayah,
																  help_jenis_data
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`jenis_data` = help_jenis_data.`kode`
																  -- AND $wilayah.`act_grp` IN (
																  --   'ZN04',
																  --   'ZN05',
																  --   'ZN06',
																  --   'ZN07',
																  --   'ZN08',
																  --   'ZN09',
																  --   'ZN10',
																  --   'ZN11',
																  --   'ZN12',
																  --   'ZN13',
																  --   'ZN14'
																  -- )
																	AND SUBSTRING($wilayah.`bulan_panen`, 1, 4) = '$tahun'");

		return $query->row_array();
	}
	function get_group_cost_umur_total_wilayah($wilayah){
		$query = $this->db->query("SELECT
																  SUM(IF(help_jenis_data.`category` = 'Labour', $wilayah.`biaya_realisasi`, 0)) AS Labour,
																  SUM(IF(help_jenis_data.`category` = 'Charge', $wilayah.`biaya_realisasi`, 0)) AS Charge,
																  SUM(IF(help_jenis_data.`category` = 'Material' AND $wilayah.`act_grp` != 'ZN03', $wilayah.`biaya_realisasi`, 0)) AS Material,
																  SUM(IF((help_jenis_data.`category` = 'Bibit' OR help_jenis_data.`category` = 'Material') AND $wilayah.`act_grp` = 'ZN03', $wilayah.`biaya_realisasi`, 0)) AS Seed,
																  SUM($wilayah.`biaya_realisasi`) AS Total
																FROM
																  $wilayah,
																  help_jenis_data
																WHERE $wilayah.`jenis_data` = help_jenis_data.`kode`
																  -- AND $wilayah.`act_grp` IN (
																  --   'ZN04',
																  --   'ZN05',
																  --   'ZN06',
																  --   'ZN07',
																  --   'ZN08',
																  --   'ZN09',
																  --   'ZN10',
																  --   'ZN11',
																  --   'ZN12',
																  --   'ZN13',
																  --   'ZN14'
																  -- )");

		return $query->row_array();
	}
}
