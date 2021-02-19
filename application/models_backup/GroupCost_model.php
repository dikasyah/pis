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
}
