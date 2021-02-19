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
	function get_fertilization_sprink($lokasi, $wilayah){
		$query = $this->db->query("SELECT
																  $wilayah.`lokasi`,
																  $wilayah.`tgl_realisasi`,
																  $wilayah.`luas_aktif`,
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
																  AND help_master_material.`code` = $wilayah.`bahan_alat`");

		return $query->row_array();
	}
}
