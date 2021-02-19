<?php

class Fertilization_model extends CI_Model
{

	function get_fertilization_code($lokasi){
		$query = $this->db->query("SELECT
																  *
																FROM
																  fertilization
																WHERE lokasi = '$lokasi'
																ORDER BY tgl_realisasi ASC");

		return $query->result();
	}
	function get_fertilization_spray($lokasi, $wilayah){
		$query = $this->db->query("SELECT
																  $wilayah.`lokasi`,
																  $wilayah.`tgl_realisasi`,
																  $wilayah.`luas_aktif`,
																  SUM($wilayah.`biaya_realisasi`) AS total
																FROM
																  $wilayah
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`aktivitas_code` = '1311131711'
																GROUP BY $wilayah.`tgl_realisasi`
																ORDER BY $wilayah.`tgl_realisasi` ASC");

		return $query->result();
	}
	function get_fertilization_spray_panen($lokasi, $wilayah, $bulan_panen){
		$wilayah = "P".substr($wilayah, 1, 2);
		$query = $this->db->query("SELECT
																  $wilayah.`lokasi`,
																  $wilayah.`tgl_realisasi`,
																  $wilayah.`luas_aktif`,
																  SUM($wilayah.`biaya_realisasi`) AS total
																FROM
																  $wilayah
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`aktivitas_code` = '1311131711'
																	AND $wilayah.`bulan_panen` = '$bulan_panen'
																GROUP BY $wilayah.`tgl_realisasi`
																ORDER BY $wilayah.`tgl_realisasi` ASC");

		return $query->result();
	}
	function get_fertilization_manual($lokasi, $wilayah){
		$query = $this->db->query("SELECT
																  $wilayah.`lokasi`,
																  $wilayah.`tgl_realisasi`,
  																$wilayah.`hasil_efektif` AS luas_aktif,
																  SUM($wilayah.`biaya_realisasi`) AS total
																FROM
																  $wilayah
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`aktivitas_code` = '1311131115'
																GROUP BY $wilayah.`tgl_realisasi`
																ORDER BY $wilayah.`tgl_realisasi` ASC");

		return $query->result();
	}

	function get_unsur_umur_wilayah($data_master, $status){
		$w = substr($data_master, 0, 3);
		$query = $this->db->query("SELECT
															  CEIL(TIMESTAMPDIFF(DAY, lokasi.`tgl_mulai_rawat`, konstanta.`nilai`) / 30.4583333333333) AS umur,
															  SUM(IF(lokasi.`status` LIKE '$status%', IF(help_kode_bahan.`kode_desc` = 'Urea', $data_master.`resource` * 0.46, 0) + IF(help_kode_bahan.`kode_desc` = 'ZA', $data_master.`resource` * 0.21, 0) + IF(help_kode_bahan.`kode_desc` = 'DAP', $data_master.`resource` * 0.18, 0), 0)) AS N,
															  SUM(IF(lokasi.`status` LIKE '$status%', IF(help_kode_bahan.`kode_desc` = 'TSP', $data_master.`resource` * 0.46, 0) + IF(help_kode_bahan.`kode_desc` = 'DAP', $data_master.`resource` * 0.46, 0), 0)) AS P,
															  SUM(IF(lokasi.`status` LIKE '$status%', IF(help_kode_bahan.`kode_desc` = 'K2SO4', $data_master.`resource` * 0.5, 0) + IF(help_kode_bahan.`kode_desc` = 'KCl', $data_master.`resource` * 0.6, 0), 0)) AS K,
															  SUM(IF(lokasi.`status` LIKE '$status%', IF(help_kode_bahan.`kode_desc` = 'Kiesrite', $data_master.`resource` * 0.27, 0) + IF(help_kode_bahan.`kode_desc` = 'MgSo4', $data_master.`resource` * 0.16, 0) + IF(help_kode_bahan.`kode_desc` = 'Dolomite', $data_master.`resource` * 0.18, 0), 0)) AS MG
															FROM
															  help_kode_bahan,
															  $data_master,
															  konstanta,
															  lokasi
															  RIGHT JOIN help_lokasi_aktif
															    ON lokasi.`lokasi` = help_lokasi_aktif.`lokasi_aktif`
															WHERE help_lokasi_aktif.`wilayah` = '$w'
															  AND $data_master.`lokasi` = lokasi.`lokasi`
															  AND konstanta.`jenis` = 'TGL_TARIK_DATA'
															  AND $data_master.`bahan_alat` = help_kode_bahan.`kode_bahan`
															  AND (
															    help_kode_bahan.`kode_desc` = 'Urea'
															    OR help_kode_bahan.`kode_desc` = 'ZA'
															    OR help_kode_bahan.`kode_desc` = 'DAP'
															    OR help_kode_bahan.`kode_desc` = 'TSP'
															    OR help_kode_bahan.`kode_desc` = 'K2SO4'
															    OR help_kode_bahan.`kode_desc` = 'KCl'
															    OR help_kode_bahan.`kode_desc` = 'Kiesrite'
															    OR help_kode_bahan.`kode_desc` = 'MgSo4'
															    OR help_kode_bahan.`kode_desc` = 'Dolomite'
															  )
															  AND (
															    CEIL(TIMESTAMPDIFF(DAY, lokasi.`tgl_mulai_rawat`, konstanta.`nilai`) / 30.4583333333333) = '5'
															    OR CEIL(TIMESTAMPDIFF(DAY, lokasi.`tgl_mulai_rawat`, konstanta.`nilai`) / 30.4583333333333) = '8'
															    OR CEIL(TIMESTAMPDIFF(DAY, lokasi.`tgl_mulai_rawat`, konstanta.`nilai`) / 30.4583333333333) = '12'
															    OR CEIL(TIMESTAMPDIFF(DAY, lokasi.`tgl_mulai_rawat`, konstanta.`nilai`) / 30.4583333333333) = '19'
															    OR CEIL(TIMESTAMPDIFF(DAY, lokasi.`tgl_mulai_rawat`, konstanta.`nilai`) / 30.4583333333333) > '20'
															  )
															GROUP BY CEIL(TIMESTAMPDIFF(DAY, lokasi.`tgl_mulai_rawat`, konstanta.`nilai`) / 30.4583333333333)
															ORDER BY CEIL(TIMESTAMPDIFF(DAY, lokasi.`tgl_mulai_rawat`, konstanta.`nilai`) / 30.4583333333333) ASC");

		return $query->result();
	}

	function get_unsur_fertilization($lokasi, $wilayah){
		$query = $this->db->query("SELECT
																  SUM(IF(help_master_material.`material` = 'Urea', $wilayah.`resource`, 0)) AS Urea,
																  SUM(IF(help_master_material.`material` = 'Urease', $wilayah.`resource`, 0)) AS Urease,
																  SUM(IF(help_master_material.`material` = 'Za', $wilayah.`resource`, 0)) AS Za,
																  SUM(IF(help_master_material.`material` = 'K2SO4', $wilayah.`resource`, 0)) AS K2SO4,
																  SUM(IF(help_master_material.`material` = 'KCL', $wilayah.`resource`, 0)) AS KCL,
																  SUM(IF(help_master_material.`material` = 'TSP', $wilayah.`resource`, 0)) AS TSP,
																  SUM(IF(help_master_material.`material` = 'DAP', $wilayah.`resource`, 0)) AS DAP,
																  SUM(IF(help_master_material.`material` = 'MgSO4', $wilayah.`resource`, 0)) AS MgSO4,
																  SUM(IF(help_master_material.`material` = 'Kieserite', $wilayah.`resource`, 0)) AS Kieserite,
																  SUM(IF(help_master_material.`material` = 'FeSO4', $wilayah.`resource`, 0)) AS FeSO4,
																  SUM(IF(help_master_material.`material` = 'ZnSO4', $wilayah.`resource`, 0)) AS ZnSO4,
																  SUM(IF(help_master_material.`material` = 'Dolomite', $wilayah.`resource`, 0)) AS Dolomite,
																  SUM(IF(help_master_material.`material` = 'Gypsum', $wilayah.`resource`, 0)) AS Gypsum,
																  SUM(IF(help_master_material.`material` = 'CuSO4', $wilayah.`resource`, 0)) AS CuSO4,
																  SUM(IF(help_master_material.`material` = 'Borax', $wilayah.`resource`, 0)) AS Borax,
																  SUM(IF(help_master_material.`material` = 'LOB', $wilayah.`resource`, 0)) AS LOB,
																  SUM(IF(help_master_material.`material` = 'CaCl2', $wilayah.`resource`, 0)) AS CaCl2,
																  SUM(IF(help_master_material.`material` = 'Calcibor', $wilayah.`resource`, 0)) AS Calcibor,
																  SUM(IF(help_master_material.`material` = 'Kompos', $wilayah.`resource`, 0)) AS Kompos,
																  SUM(IF(help_master_material.`material` = 'Belerang', $wilayah.`resource`, 0)) AS Belerang,
																  SUM(IF(help_master_material.`material` = 'Kieserite G', $wilayah.`resource`, 0)) AS Kieserite_G,
																  SUM(IF(help_master_material.`material` = 'NPK', $wilayah.`resource`, 0)) AS NPK,
																  SUM(IF(help_master_material.`material` = 'NPK Haracoat', $wilayah.`resource`, 0)) AS NPK_Haracoat,
																  SUM(IF(help_master_material.`material` = 'Petro Cas', $wilayah.`resource`, 0)) AS Petro_Cas
																FROM
																  $wilayah,
																  help_master_material
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND help_master_material.`code` = $wilayah.`bahan_alat`");

		return $query->row_array();
	}
	function get_unsur_fertilization_panen($lokasi, $wilayah, $bulan_panen){
		$wilayah = "P".substr($wilayah, 1, 2);
		$query = $this->db->query("SELECT
																  SUM(IF(help_master_material.`material` = 'Urea', $wilayah.`resource`, 0)) AS Urea,
																  SUM(IF(help_master_material.`material` = 'Za', $wilayah.`resource`, 0)) AS Za,
																  SUM(IF(help_master_material.`material` = 'K2SO4', $wilayah.`resource`, 0)) AS K2SO4,
																  SUM(IF(help_master_material.`material` = 'KCL', $wilayah.`resource`, 0)) AS KCL,
																  SUM(IF(help_master_material.`material` = 'TSP', $wilayah.`resource`, 0)) AS TSP,
																  SUM(IF(help_master_material.`material` = 'DAP', $wilayah.`resource`, 0)) AS DAP,
																  SUM(IF(help_master_material.`material` = 'MgSO4', $wilayah.`resource`, 0)) AS MgSO4,
																  SUM(IF(help_master_material.`material` = 'Kieserite', $wilayah.`resource`, 0)) AS Kieserite,
																  SUM(IF(help_master_material.`material` = 'FeSO4', $wilayah.`resource`, 0)) AS FeSO4,
																  SUM(IF(help_master_material.`material` = 'ZnSO4', $wilayah.`resource`, 0)) AS ZnSO4,
																  SUM(IF(help_master_material.`material` = 'Dolomite', $wilayah.`resource`, 0)) AS Dolomite,
																  SUM(IF(help_master_material.`material` = 'Gypsum', $wilayah.`resource`, 0)) AS Gypsum,
																  SUM(IF(help_master_material.`material` = 'CuSO4', $wilayah.`resource`, 0)) AS CuSO4,
																  SUM(IF(help_master_material.`material` = 'Borax', $wilayah.`resource`, 0)) AS Borax,
																  SUM(IF(help_master_material.`material` = 'LOB', $wilayah.`resource`, 0)) AS LOB,
																  SUM(IF(help_master_material.`material` = 'CaCl2', $wilayah.`resource`, 0)) AS CaCl2,
																  SUM(IF(help_master_material.`material` = 'Calcibor', $wilayah.`resource`, 0)) AS Calcibor,
																  SUM(IF(help_master_material.`material` = 'Kompos', $wilayah.`resource`, 0)) AS Kompos,
																  SUM(IF(help_master_material.`material` = 'Belerang', $wilayah.`resource`, 0)) AS Belerang,
																  SUM(IF(help_master_material.`material` = 'Kieserite G', $wilayah.`resource`, 0)) AS Kieserite_G,
																  SUM(IF(help_master_material.`material` = 'NPK', $wilayah.`resource`, 0)) AS NPK,
																  SUM(IF(help_master_material.`material` = 'Petro Cas', $wilayah.`resource`, 0)) AS Petro_Cas
																FROM
																  $wilayah,
																  help_master_material
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND help_master_material.`code` = $wilayah.`bahan_alat`
																	AND $wilayah.`bulan_panen` = '$bulan_panen'");

		return $query->row_array();
	}
	function get_unsur_others($lokasi, $wilayah){
		$query = $this->db->query("SELECT
																	SUM(IF(help_master_material.`material` = 'Sanisol', $wilayah.`resource`, 0)) AS Sanisol,
																	SUM(IF(help_master_material.`material` = 'Ethylene', $wilayah.`resource`, 0)) AS Ethylene,
																	SUM(IF(help_master_material.`material` = 'Ethepon', $wilayah.`resource`, 0)) AS Ethepon,
																	SUM(IF(help_master_material.`material` = 'Kaolin', $wilayah.`resource`, 0)) AS Kaolin,
																	SUM(IF(help_master_material.`material` = 'Zeolit', $wilayah.`resource`, 0)) AS Zeolit,
																	SUM(IF(help_master_material.`material` = 'Rabas', $wilayah.`resource`, 0)) AS Rabas,
																	SUM(IF(help_master_material.`material` = 'Ratgone', $wilayah.`resource`, 0)) AS Ratgone,
																	SUM(IF(help_master_material.`material` = 'Indostick', $wilayah.`resource`, 0)) AS Indostick,
																	SUM(IF(help_master_material.`material` = 'Organosilicon', $wilayah.`resource`, 0)) AS Organosilicon
																FROM
																  $wilayah,
																  help_master_material
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND help_master_material.`code` = $wilayah.`bahan_alat`");

		return $query->row_array();
	}
	function get_unsur_others_panen($lokasi, $wilayah, $bulan_panen){
		$wilayah = "P".substr($wilayah, 1, 2);
		$query = $this->db->query("SELECT
																	SUM(IF(help_master_material.`material` = 'Sanisol', $wilayah.`resource`, 0)) AS Sanisol,
																	SUM(IF(help_master_material.`material` = 'Ethylene', $wilayah.`resource`, 0)) AS Ethylene,
																	SUM(IF(help_master_material.`material` = 'Ethepon', $wilayah.`resource`, 0)) AS Ethepon,
																	SUM(IF(help_master_material.`material` = 'Kaolin', $wilayah.`resource`, 0)) AS Kaolin,
																	SUM(IF(help_master_material.`material` = 'Zeolit', $wilayah.`resource`, 0)) AS Zeolit,
																	SUM(IF(help_master_material.`material` = 'Rabas', $wilayah.`resource`, 0)) AS Rabas,
																	SUM(IF(help_master_material.`material` = 'Ratgone', $wilayah.`resource`, 0)) AS Ratgone,
																	SUM(IF(help_master_material.`material` = 'Indostick', $wilayah.`resource`, 0)) AS Indostick,
																	SUM(IF(help_master_material.`material` = 'Organosilicon', $wilayah.`resource`, 0)) AS Organosilicon
																FROM
																  $wilayah,
																  help_master_material
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND help_master_material.`code` = $wilayah.`bahan_alat`
																	AND $wilayah.`bulan_panen` = '$bulan_panen'");

		return $query->row_array();
	}
	function get_unsur_K2SO4_KCL($lokasi, $wilayah, $tgl_perawatan, $tgl_forcing){
		$query = $this->db->query("SELECT
																  SUM(IF(help_master_material.`material` = 'K2SO4', IF($wilayah.`tgl_realisasi` <= ('$tgl_perawatan' + INTERVAL 5 MONTH), $wilayah.`resource`, 0), 0)) AS K2SO4_1,
																  SUM(IF(help_master_material.`material` = 'KCL', IF($wilayah.`tgl_realisasi` <= ('$tgl_perawatan' + INTERVAL 5 MONTH), $wilayah.`resource`, 0), 0)) AS KCL_1,
																  SUM(IF(help_master_material.`material` = 'K2SO4', IF($wilayah.`tgl_realisasi` > ('$tgl_perawatan' + INTERVAL 5 MONTH), IF($wilayah.`tgl_realisasi` <= ('$tgl_forcing' + INTERVAL 2 MONTH), $wilayah.`resource`, 0), 0), 0)) AS K2SO4_2,
																  SUM(IF(help_master_material.`material` = 'KCL', IF($wilayah.`tgl_realisasi` > ('$tgl_perawatan' + INTERVAL 5 MONTH), IF($wilayah.`tgl_realisasi` <= ('$tgl_forcing' + INTERVAL 2 MONTH), $wilayah.`resource`, 0), 0), 0)) AS KCL_2,
																  SUM(IF(help_master_material.`material` = 'K2SO4', IF($wilayah.`tgl_realisasi` > ('$tgl_forcing' + INTERVAL 2 MONTH), $wilayah.`resource`, 0), 0)) AS K2SO4_3,
																  SUM(IF(help_master_material.`material` = 'KCL', IF($wilayah.`tgl_realisasi` > ('$tgl_forcing' + INTERVAL 2 MONTH), $wilayah.`resource`, 0), 0)) AS KCL_3
																FROM
																  $wilayah,
																  help_master_material
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND help_master_material.`code` = $wilayah.`bahan_alat`");

		return $query->row_array();
	}
	function get_frekuensi_fertilizer($lokasi, $wilayah, $tgl_perawatan, $activity){
		$query = $this->db->query("SELECT
																  SUM(IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 1 MONTH, $wilayah.`hasil_efektif`, 0)) AS B1,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 1 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 2 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS B2,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 2 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 3 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS B3,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 3 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 4 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS B4,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 4 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 5 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS B5,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 5 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 6 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS B6,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 6 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 7 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS B7,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 7 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 8 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS B8,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 8 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 9 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS B9,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 9 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 10 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS B10,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 10 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 11 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS B11,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 11 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 12 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS B12,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 12 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 13 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS B13,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 13 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 14 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS B14,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 14 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 15 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS B15,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 15 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 16 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS B16,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 16 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 17 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS B17,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 17 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 18 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS B18,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 18 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 19 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS B19,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 19 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 20 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS B20,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 20 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 21 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS B21,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 21 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 22 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS B22,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 22 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 23 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS B23,
																  SUM(IF($wilayah.`tgl_realisasi` >= '$tgl_perawatan' + INTERVAL 23 MONTH, IF($wilayah.`tgl_realisasi` < '$tgl_perawatan' + INTERVAL 24 MONTH, $wilayah.`hasil_efektif`, 0), 0)) AS B24
																FROM
																  $wilayah
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`aktivitas_code` = '$activity'
																  AND ($wilayah.`jenis_data` = 'A'
																	 OR $wilayah.`jenis_data` = '1')");

		return $query->row_array();
	}
	function get_range_fertilizer($lokasi, $wilayah, $tgl_perawatan, $activity, $start, $finish){
		$query = $this->db->query("SELECT
																	  $wilayah.`tgl_realisasi`
																	FROM
																	  $wilayah
																	WHERE $wilayah.`lokasi` = '$lokasi'
																	  AND $wilayah.`aktivitas_code` = '$activity'
																	  AND $wilayah.`tgl_realisasi` > '$tgl_perawatan' + INTERVAL $start MONTH
																	  AND $wilayah.`tgl_realisasi` <= '$tgl_perawatan' + INTERVAL $finish MONTH
																	GROUP BY $wilayah.`tgl_realisasi`
																	ORDER BY $wilayah.`tgl_realisasi` ASC");

		return $query->result();
	}
	function get_ripening_tgl($lokasi, $wilayah){
		$query = $this->db->query("SELECT
																  $wilayah.`tgl_realisasi`
																FROM
																  $wilayah
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`aktivitas_code` = '1325111111'
																LIMIT 1");

		return $query->row_array();
	}
}
