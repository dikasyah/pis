<?php

class ElementCost_model extends CI_Model
{

	function get_element_cost_all(){
		$query = $this->db->query("SELECT
																  *,
																  BPP_NS_ha AS NS_ha,
																  BPP_NSFC_ha AS NSFC_ha,
																  BPP_NSSC_ha AS NSSC_ha,
																  BPP_NS_kg AS NS_kg,
																  BPP_NSFC_kg AS NSFC_kg,
																  BPP_NSSC_kg AS NSSC_kg,
																  BPP_NS_ha_t1 AS NS_ha_t1,
																  BPP_NSFC_ha_t1 AS NSFC_ha_t1,
																  BPP_NSSC_ha_t1 AS NSSC_ha_t1,
																  BPP_NS_kg_t1 AS NS_kg_t1,
																  BPP_NSFC_kg_t1 AS NSFC_kg_t1,
																  BPP_NSSC_kg_t1 AS NSSC_kg_t1
																FROM
																  element_cost
																WHERE code NOT IN ('ZNTO', 'ZNPM')");

		return $query->result();
	}
	function get_element_cost_panen($tahun){
		$query = $this->db->query("SELECT
																  *,
																  BPP_NS_ha AS NS_ha,
																  BPP_NSFC_ha AS NSFC_ha,
																  BPP_NSSC_ha AS NSSC_ha,
																  BPP_NS_kg AS NS_kg,
																  BPP_NSFC_kg AS NSFC_kg,
																  BPP_NSSC_kg AS NSSC_kg
																FROM
																  element_cost_all
																WHERE code NOT IN ('ZNTO', 'ZNPM')
																  AND tahun_panen = '$tahun'");

		return $query->result();
	}
	function get_element_cost_panen_total($tahun){
		$query = $this->db->query("SELECT
																  *,
																  BPP_NS_ha AS NS_ha,
																  BPP_NSFC_ha AS NSFC_ha,
																  BPP_NSSC_ha AS NSSC_ha,
																  BPP_NS_kg AS NS_kg,
																  BPP_NSFC_kg AS NSFC_kg,
																  BPP_NSSC_kg AS NSSC_kg
																FROM
																  element_cost_all
																WHERE code NOT IN ('ZNTO', 'ZNPM')
																  AND tahun_panen = '$tahun'");

		return $query->row_array();
	}

	function get_element_cost_pm(){
		$query = $this->db->query("SELECT
																  *,
																  BPP_NS_ha AS NS_ha,
																  BPP_NSFC_ha AS NSFC_ha,
																  BPP_NSSC_ha AS NSSC_ha,
																  BPP_NS_kg AS NS_kg,
																  BPP_NSFC_kg AS NSFC_kg,
																  BPP_NSSC_kg AS NSSC_kg,
																  BPP_NS_ha_t1 AS NS_ha_t1,
																  BPP_NSFC_ha_t1 AS NSFC_ha_t1,
																  BPP_NSSC_ha_t1 AS NSSC_ha_t1,
																  BPP_NS_kg_t1 AS NS_kg_t1,
																  BPP_NSFC_kg_t1 AS NSFC_kg_t1,
																  BPP_NSSC_kg_t1 AS NSSC_kg_t1
																FROM
																  element_cost
																WHERE code NOT IN ('ZNTO', 'ZNPM')
																  -- AND code != 'ZN01'
																  -- AND code != 'ZN02'
																  -- AND code != 'ZN03'
																  -- AND code != 'ZN15'");

		return $query->result();
	}

	function get_element_cost_bk(){
		$query = $this->db->query("SELECT
																  *,
																  BPP_NS_ha AS NS_ha,
																  BPP_NSFC_ha AS NSFC_ha,
																  BPP_NSSC_ha AS NSSC_ha,
																  BPP_NS_kg AS NS_kg,
																  BPP_NSFC_kg AS NSFC_kg,
																  BPP_NSSC_kg AS NSSC_kg,
																  BPP_NS_ha_t1 AS NS_ha_t1,
																  BPP_NSFC_ha_t1 AS NSFC_ha_t1,
																  BPP_NSSC_ha_t1 AS NSSC_ha_t1,
																  BPP_NS_kg_t1 AS NS_kg_t1,
																  BPP_NSFC_kg_t1 AS NSFC_kg_t1,
																  BPP_NSSC_kg_t1 AS NSSC_kg_t1
																FROM
																  element_cost
																WHERE code NOT IN (
																	'ZNTO',
																	'ZNPM',
																	'ZN02',
																	'ZN08',
																	'ZN09',
																	'ZN10',
																	'ZN12'
																)");

		return $query->result();
	}
	function get_element_cost_st(){
		$query = $this->db->query("SELECT
																  *,
																  BPP_NS_ha AS NS_ha,
																  BPP_NSFC_ha AS NSFC_ha,
																  BPP_NSSC_ha AS NSSC_ha,
																  BPP_NS_kg AS NS_kg,
																  BPP_NSFC_kg AS NSFC_kg,
																  BPP_NSSC_kg AS NSSC_kg,
																  BPP_NS_ha_t1 AS NS_ha_t1,
																  BPP_NSFC_ha_t1 AS NSFC_ha_t1,
																  BPP_NSSC_ha_t1 AS NSSC_ha_t1,
																  BPP_NS_kg_t1 AS NS_kg_t1,
																  BPP_NSFC_kg_t1 AS NSFC_kg_t1,
																  BPP_NSSC_kg_t1 AS NSSC_kg_t1
																FROM
																  element_cost
																WHERE code NOT IN (
																	'ZNTO',
																	'ZNPM',
																	'ZN02',
																	'ZN08',
																	'ZN09',
																	'ZN10',
																	'ZN12',
																	'ZN15'
																)");

		return $query->result();
	}

	function get_element_cost_code($lokasi, $jenis, $element_cost, $data_master){
		$query = $this->db->query("SELECT
																  SUM($data_master.`biaya_realisasi`) AS total
																FROM
																  $data_master,
																  help_jenis_data
																WHERE $data_master.`lokasi` = '$lokasi'
																  AND $data_master.`jenis_data` = help_jenis_data.`kode`
																  AND help_jenis_data.`category` = '$jenis'
																  AND $data_master.`act_grp` = '$element_cost'");

		return $query->row_array();
	}

	function get_element_cost_all_code($lokasi, $element_cost, $data_master){
		$query = $this->db->query("SELECT
																  (SELECT
																    element_cost.`nama`
																  FROM
																    element_cost
																  WHERE element_cost.`code` = '$element_cost') AS nama,
																  SUM($data_master.`biaya_realisasi`) AS total
																FROM
																  $data_master,
																  help_jenis_data
																WHERE $data_master.`lokasi` = '$lokasi'
																  AND $data_master.`jenis_data` = help_jenis_data.`kode`
																  AND $data_master.`act_grp` = '$element_cost'");

		return $query->row_array();
	}

	function get_element_cost_wilayah_jenis($wilayah, $jenis){
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
																  $wilayah.`act_grp`,
																  SUM($wilayah.`biaya_realisasi`) AS biaya_realisasi
																FROM
																  $wilayah
																  RIGHT JOIN produksi
																    ON $wilayah.`lokasi` = produksi.`lokasi`
																WHERE $wilayah.`jenis_data` != '3X'
																  AND $wilayah.`jenis_data` != '7'
																  AND produksi.`biaya` != '0'
																	AND $wilayah.`act_grp` != 'ZN16'
																  $status
																GROUP BY $wilayah.`act_grp`");

		return $query->result();
	}

	function get_element_cost_wilayah_raport($wilayah){
		$query = $this->db->query("SELECT
																  produksi.`status`,
																  CONCAT('B', MONTH(produksi.`real_dan_sisa_rencana_tgl_selesai_panen`)) AS bulan,
																  $wilayah.`act_grp`,
																  SUM($wilayah.`biaya_realisasi`) AS biaya_realisasi
																FROM
																  $wilayah
																  RIGHT JOIN produksi
																    ON $wilayah.`lokasi` = produksi.`lokasi`
																WHERE $wilayah.`jenis_data` != '3X'
																  AND $wilayah.`jenis_data` != '7'
																  AND produksi.`keterangan` != 'selesai'
																  AND $wilayah.`act_grp` != 'ZN16'
																GROUP BY MONTH(produksi.`real_dan_sisa_rencana_tgl_selesai_panen`),
																  produksi.`status`,
																  $wilayah.`act_grp`
																ORDER BY produksi.`status` ASC, CONCAT('B', MONTH(produksi.`real_dan_sisa_rencana_tgl_selesai_panen`)) ASC, $wilayah.`act_grp` ASC");

		return $query->result();
	}
	function get_element_cost_wilayah_raport_t1($wilayah){
		$query = $this->db->query("SELECT
																  SUBSTRING($wilayah.`current_status_lokasi`, 1, 4) AS status,
																  CONCAT('B', MONTH(
																        IF(ISNULL(lokasi.`tgl_panen_rencana`),
																          IF(ISNULL(lokasi.`tgl_panen_standard`),
																            IF(SUBSTRING(lokasi.`status`, 1, 4) = 'NSSC',
																              lokasi.`tgl_mulai_rawat` + INTERVAL 13 MONTH,
																              IF(SUBSTRING(lokasi.`bibit`, 7, 1) = 'K',
																                lokasi.`tgl_mulai_rawat` + INTERVAL 19 MONTH,
																                IF(SUBSTRING(lokasi.`bibit`, 7, 1) = 'S',
																                  lokasi.`tgl_mulai_rawat` + INTERVAL 17 MONTH,
																                  lokasi.`tgl_mulai_rawat` + INTERVAL 15 MONTH
																                )
																              )
																            ), lokasi.`tgl_panen_rencana`
																          ), lokasi.`tgl_panen_standard`
																        )
																    )
																  ) AS bulan,
																  $wilayah.`act_grp`,
																  SUM($wilayah.`biaya_realisasi`) AS biaya_realisasi
																FROM
																  konstanta,
																  $wilayah,
																  lokasi
																WHERE $wilayah.`lokasi` = lokasi.`lokasi`
																  AND konstanta.`jenis` = 'TGL_TARIK_DATA'
																  AND $wilayah.`jenis_data` != '3X'
																  AND $wilayah.`jenis_data` != '7'
																  AND $wilayah.`act_grp` != 'ZN16'
																  AND YEAR(
																      IF(ISNULL(lokasi.`tgl_panen_rencana`),
																        IF(ISNULL(lokasi.`tgl_panen_standard`),
																          IF(SUBSTRING(lokasi.`status`, 1, 4) = 'NSSC',
																            lokasi.`tgl_mulai_rawat` + INTERVAL 13 MONTH,
																            IF(SUBSTRING(lokasi.`bibit`, 7, 1) = 'K',
																              lokasi.`tgl_mulai_rawat` + INTERVAL 19 MONTH,
																              IF(SUBSTRING(lokasi.`bibit`, 7, 1) = 'S',
																                lokasi.`tgl_mulai_rawat` + INTERVAL 17 MONTH,
																                lokasi.`tgl_mulai_rawat` + INTERVAL 15 MONTH
																              )
																            )
																          ), lokasi.`tgl_panen_rencana`
																        ), lokasi.`tgl_panen_standard`
																      )
																  ) = YEAR(konstanta.`nilai` + INTERVAL 1 YEAR)
																GROUP BY MONTH(
																      IF(ISNULL(lokasi.`tgl_panen_rencana`),
																        IF(ISNULL(lokasi.`tgl_panen_standard`),
																          IF(SUBSTRING(lokasi.`status`, 1, 4) = 'NSSC',
																            lokasi.`tgl_mulai_rawat` + INTERVAL 13 MONTH,
																            IF(SUBSTRING(lokasi.`bibit`, 7, 1) = 'K',
																              lokasi.`tgl_mulai_rawat` + INTERVAL 19 MONTH,
																              IF(SUBSTRING(lokasi.`bibit`, 7, 1) = 'S',
																                lokasi.`tgl_mulai_rawat` + INTERVAL 17 MONTH,
																                lokasi.`tgl_mulai_rawat` + INTERVAL 15 MONTH
																              )
																            )
																          ), lokasi.`tgl_panen_rencana`
																        ), lokasi.`tgl_panen_standard`
																      )
																  ),
																  SUBSTRING($wilayah.`current_status_lokasi`, 1, 4),
																  $wilayah.`act_grp`
																ORDER BY SUBSTRING($wilayah.`current_status_lokasi`, 1, 4) ASC, bulan ASC, $wilayah.`act_grp` ASC");

		return $query->result();
	}

	function get_std_prediksi_biaya($code){
		$query = $this->db->query("SELECT
																  std_prediksi_biaya.`rp_per_ha`,
																	std_prediksi_biaya.`rp_per_kg`
																FROM
																  std_prediksi_biaya
																WHERE std_prediksi_biaya.`code` = '$code'");

		return $query->row_array();
	}
	function get_detil_element_cost($lokasi, $element_cost, $data_master){
		switch ($element_cost) {
			case 'ZN01':
				case 'ZN02':
				case 'ZN03':
				case 'ZN04':
				case 'ZN05':
				case 'ZN06':
				case 'ZN07':
				case 'ZN08':
				case 'ZN09':
				case 'ZN10':
				case 'ZN11':
				case 'ZN12':
				case 'ZN13':
				case 'ZN14':
				case 'ZN15':
					$umur = "TIMESTAMPDIFF(
								    MONTH,
								    (SELECT
								      lokasi.`tgl_mulai_rawat`
								    FROM
								      lokasi
								    WHERE lokasi.`lokasi` = '$lokasi'),
								    $data_master.`tgl_realisasi`) + 1 AS umur,";
				break;
		}
		$query = $this->db->query("SELECT
																  $data_master.`SPK`,
																  $data_master.`PAS_document`,
																  $data_master.`tgl_realisasi` AS tgl,
																  $data_master.`aktivitas_code` AS code_activity,
																  $data_master.`aktivitas_desc` AS desc_activity,
																  SUBSTRING($data_master.`status_lokasi`,3,2) AS status,
																	$umur
																  help_jenis_data.`category` AS jenis_data,
																  $data_master.`bahan_alat` AS code_material,
																  $data_master.`bahan_alat_desc` AS desc_material,
																  $data_master.`biaya_realisasi` AS biaya
																FROM
																  $data_master,
																  help_jenis_data
																WHERE $data_master.`lokasi` = '$lokasi'
																  AND $data_master.`act_grp` = '$element_cost'
																  AND help_jenis_data.`kode` = $data_master.`jenis_data`
																ORDER BY $data_master.`tgl_realisasi` ASC,
																  $data_master.`SPK` ASC");

		return $query->result();
	}
	function get_detil_element_cost_panen($lokasi, $element_cost, $data_master, $tahun_panen){
		$data_master = "P".substr($data_master, 1, 2);
		switch ($element_cost) {
			case 'ZN01':
				case 'ZN02':
				case 'ZN03':
				case 'ZN04':
				case 'ZN05':
				case 'ZN06':
				case 'ZN07':
				case 'ZN08':
				case 'ZN09':
				case 'ZN10':
				case 'ZN11':
				case 'ZN12':
				case 'ZN13':
				case 'ZN14':
				case 'ZN15':
					$umur = "TIMESTAMPDIFF(
								    MONTH,
								    (SELECT
								      produksi_all.`tgl_awal_perawatan`
								    FROM
								      produksi_all
								    WHERE produksi_all.`lokasi` = '$lokasi'),
								    $data_master.`tgl_realisasi`) + 1 AS umur,";
				break;
		}
		$query = $this->db->query("SELECT
																  $data_master.`SPK`,
																  $data_master.`PAS_document`,
																  $data_master.`tgl_realisasi` AS tgl,
																  $data_master.`aktivitas_code` AS code_activity,
																  $data_master.`aktivitas_desc` AS desc_activity,
																  SUBSTRING($data_master.`status_lokasi`,3,2) AS status,
																	$umur
																  help_jenis_data.`category` AS jenis_data,
																  $data_master.`bahan_alat` AS code_material,
																  $data_master.`bahan_alat_desc` AS desc_material,
																  $data_master.`biaya_realisasi` AS biaya
																FROM
																  $data_master,
																  help_jenis_data
																WHERE $data_master.`lokasi` = '$lokasi'
																  AND $data_master.`act_grp` = '$element_cost'
																  AND SUBSTRING($data_master.`bulan_panen`, 1, 4) = '$tahun_panen'
																  AND help_jenis_data.`kode` = $data_master.`jenis_data`
																ORDER BY $data_master.`tgl_realisasi` ASC,
																  $data_master.`SPK` ASC");

		return $query->result();
	}
	function get_element_cost_group_cost($lokasi, $wilayah, $element_cost){
		$query = $this->db->query("SELECT
																  SUM(IF(help_jenis_data.`category` = 'Labour',$wilayah.`biaya_realisasi`, 0)) AS labour,
																  SUM(IF(help_jenis_data.`category` = 'Charge',$wilayah.`biaya_realisasi`, 0)) AS charge,
																  SUM(IF(help_jenis_data.`category` = 'Material',$wilayah.`biaya_realisasi`, 0)) AS material
																FROM
																  $wilayah,
																  help_jenis_data
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`jenis_data` = help_jenis_data.`kode`
																  AND $wilayah.`act_grp` = '$element_cost'");

		return $query->row_array();
	}
	function get_element_cost_group_cost_panen($lokasi, $wilayah, $element_cost, $tahun_panen){
		$wilayah = "P".substr($wilayah, 1, 2);
		$query = $this->db->query("SELECT
																  SUM(IF(help_jenis_data.`category` = 'Labour',$wilayah.`biaya_realisasi`, 0)) AS labour,
																  SUM(IF(help_jenis_data.`category` = 'Charge',$wilayah.`biaya_realisasi`, 0)) AS charge,
																  SUM(IF(help_jenis_data.`category` = 'Material',$wilayah.`biaya_realisasi`, 0)) AS material
																FROM
																  $wilayah,
																  help_jenis_data
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`jenis_data` = help_jenis_data.`kode`
																  AND $wilayah.`act_grp` = '$element_cost'
																  AND SUBSTRING($wilayah.`bulan_panen`, 1, 4) = '$tahun_panen'");

		return $query->row_array();
	}
}
