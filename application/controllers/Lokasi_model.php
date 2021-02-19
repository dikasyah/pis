<?php

class Lokasi_model extends CI_Model
{

	function get_lokasi_code($lokasi){
		$query = $this->db->query("SELECT
                                  *
                                FROM
                                  lokasi
                                WHERE lokasi = '$lokasi'");

		return $query->row_array();
	}

	function get_lokasi_wilayah($wilayah){
		$query = $this->db->query("SELECT
																  help_lokasi_aktif.*,
																  perlocation.`category_rp_per_ha` AS category
																FROM
																  help_lokasi_aktif
																  LEFT JOIN perlocation
																    ON help_lokasi_aktif.`lokasi_aktif` = perlocation.`lokasi`
																WHERE help_lokasi_aktif.`wilayah` = '$wilayah'");

		return $query->result();
	}

	function get_lokasi_wilayah_pm($wilayah){
		$query = $this->db->query("SELECT
																  help_lokasi_aktif.*,
																  perlocation_pm_cost.`performance` AS category
																FROM
																  help_lokasi_aktif
																  LEFT JOIN perlocation_pm_cost
																    ON help_lokasi_aktif.`lokasi_aktif` = perlocation_pm_cost.`lokasi`
																    AND perlocation_pm_cost.`keterangan` = 'Rencana'
																WHERE help_lokasi_aktif.`wilayah` = '$wilayah'
																ORDER BY help_lokasi_aktif.`lokasi_aktif` ASC");

		return $query->result();
	}

	function get_luas_panen_wilayah($wilayah){
		$query = $this->db->query("SELECT
																  SUM(lokasi.`luas`) AS NSFC,
																  (SELECT
																    SUM(lokasi.`luas`)
																  FROM
																    lokasi
																  WHERE SUBSTRING(lokasi.`kebun`, 1, 3) = '$wilayah'
																    AND SUBSTRING(lokasi.`status`, 1, 4) = 'NSSC') AS NSSC
																FROM
																  lokasi
																WHERE SUBSTRING(lokasi.`kebun`, 1, 3) = '$wilayah'
																  AND SUBSTRING(lokasi.`status`, 1, 4) = 'NSFC'");

		return $query->row_array();
	}

	function get_detil_lokasi_pg_wil($lokasi){
		$query = $this->db->query("SELECT
																  plantation_group.`code` AS pg,
																  plantation_group.`nama` AS pg_nama,
																  wilayah.`code` AS wilayah,
																  wilayah.`nama` AS wilayah_nama,
																  lokasi.`lokasi`
																FROM
																  plantation_group,
																  wilayah,
																  lokasi
																WHERE plantation_group.`code` = wilayah.`plantation_group`
																  AND wilayah.`code` = SUBSTRING(lokasi.`kebun`, 1, 3)
																  AND lokasi.`lokasi` = '$lokasi'");

		return $query->row_array();
	}

	function get_detil_spk_all($lokasi, $wilayah){
		$query = $this->db->query("SELECT
																  $wilayah.`SPK`,
																  $wilayah.`PAS_document`,
																  $wilayah.`tgl_realisasi` AS tgl,
																  SUBSTRING($wilayah.`status_lokasi`, 3, 2) AS status,
																  CEIL(TIMESTAMPDIFF(
																    DAY,
																    (SELECT
																      lokasi.`tgl_mulai_rawat`
																    FROM
																      lokasi
																    WHERE lokasi.`lokasi` = '$lokasi'),
																    $wilayah.`tgl_realisasi`
																  ) / (365.5 / 12)) AS umur,
																  $wilayah.`act_grp` AS code_element_cost,
																  $wilayah.`activity_desc` AS desc_element_cost,
																  $wilayah.`aktivitas_code` AS code_activity,
																  $wilayah.`aktivitas_desc` AS desc_activity,
																  help_jenis_data.`category` AS jenis_data,
																  $wilayah.`bahan_alat` AS code_material,
																  $wilayah.`bahan_alat_desc` AS desc_material,
																  $wilayah.`resource` AS resource,
																  $wilayah.`hasil_efektif` AS hasil_efektif,
																  $wilayah.`biaya_realisasi` AS biaya
																FROM
																  $wilayah,
																  help_jenis_data
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND help_jenis_data.`kode` = $wilayah.`jenis_data`
																ORDER BY $wilayah.`tgl_realisasi` ASC,
																  $wilayah.`SPK` ASC");

		return $query->result();
	}

	function get_detil_spk_sbt($lokasi, $wilayah){
		$query = $this->db->query("SELECT
																  CEIL(TIMESTAMPDIFF(
																    DAY,
																    (SELECT
																      lokasi.`tgl_mulai_rawat`
																    FROM
																      lokasi
																    WHERE lokasi.`lokasi` = '$lokasi'),
																    $wilayah.`tgl_realisasi`
																  )) AS umur_hari,
																  CEIL(TIMESTAMPDIFF(
																    DAY,
																    (SELECT
																      lokasi.`tgl_mulai_rawat`
																    FROM
																      lokasi
																    WHERE lokasi.`lokasi` = '$lokasi'),
																    $wilayah.`tgl_realisasi`
																  ) / (365.5 / 12)) AS umur_bulan,
																  $wilayah.`SPK`,
																  $wilayah.`tgl_realisasi` AS tanggal,
																  $wilayah.`aktivitas_code` AS code_activity,
																  $wilayah.`aktivitas_desc` AS desc_activity,
																  ($wilayah.`hasil_efektif`) AS hasil_efektif,
																  SUM(IF(help_jenis_data.`category` = 'Labour', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS HKO,
																  SUM(IF(help_jenis_data.`category` = 'Labour', $wilayah.`biaya_realisasi` / $wilayah.`hasil_efektif`, 0)) AS Labour,
																  SUM(IF(help_jenis_data.`category` = 'Charge', $wilayah.`biaya_realisasi` / $wilayah.`hasil_efektif`, 0)) AS Charge,
																  SUM(IF(help_jenis_data.`category` = 'Material', $wilayah.`biaya_realisasi` / $wilayah.`hasil_efektif`, 0)) AS Material,
																  SUM($wilayah.`biaya_realisasi` / $wilayah.`hasil_efektif`) AS Total_Biaya,
																  MAX(IF(help_land_prep_desc.`category` = 'Penarik', $wilayah.`bahan_alat_desc`, (NULL))) AS Penarik,
																  MAX(IF(help_land_prep_desc.`category` = 'Implement', $wilayah.`bahan_alat_desc`, (NULL))) AS Implement,

																  SUM(IF(help_master_material.`material` = 'Urea', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Urea,
																  SUM(IF(help_master_material.`material` = 'Za', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Za,
																  SUM(IF(help_master_material.`material` = 'K2SO4', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS K2SO4,
																  SUM(IF(help_master_material.`material` = 'KCL', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS KCL,
																  SUM(IF(help_master_material.`material` = 'TSP', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS TSP,
																  SUM(IF(help_master_material.`material` = 'DAP', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS DAP,
																  SUM(IF(help_master_material.`material` = 'MgSO4', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS MgSO4,
																  SUM(IF(help_master_material.`material` = 'Kieserite', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Kieserite,
																  SUM(IF(help_master_material.`material` = 'FeSO4', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS FeSO4,
																  SUM(IF(help_master_material.`material` = 'ZnSO4', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS ZnSO4,

																  SUM(IF(help_master_material.`material` = 'Dolomite', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Dolomite,
																  SUM(IF(help_master_material.`material` = 'Gypsum', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Gypsum,
																  SUM(IF(help_master_material.`material` = 'CuSO4', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS CuSO4,
																  SUM(IF(help_master_material.`material` = 'Borax', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Borax,
																  SUM(IF(help_master_material.`material` = 'LOB', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS LOB,
																  SUM(IF(help_master_material.`material` = 'CaCl2', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS CaCl2,
																  SUM(IF(help_master_material.`material` = 'Calcibor', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Calcibor,
																  SUM(IF(help_master_material.`material` = 'Kompos', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Kompos,
																  SUM(IF(help_master_material.`material` = 'Belerang', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Belerang,
																  SUM(IF(help_master_material.`material` = 'Kieserite G', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Kieserite_G,

																  SUM(IF(help_master_material.`material` = 'NPK', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS NPK,
																  SUM(IF(help_master_material.`material` = 'Petro Cas', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Petro_Cas,
																  SUM(IF(help_master_material.`material` = 'Fosetil', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Fosetil,
																  SUM(IF(help_master_material.`material` = 'Metalaxil', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Metalaxil,
																  SUM(IF(help_master_material.`material` = 'Propiconazole', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Propiconazole,
																  SUM(IF(help_master_material.`material` = 'Prochloraz', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Prochloraz,
																  SUM(IF(help_master_material.`material` = 'Mankozeb', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Mankozeb,
																  SUM(IF(help_master_material.`material` = 'Folirfos', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Folirfos,
																  SUM(IF(help_master_material.`material` = 'H3PO3', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS H3PO3,
																  SUM(IF(help_master_material.`material` = 'Detazeb', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Detazeb,

																  SUM(IF(help_master_material.`material` = 'Bromacyl', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Bromacyl,
																  SUM(IF(help_master_material.`material` = 'Diuron', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Diuron,
																  SUM(IF(help_master_material.`material` = 'Glyphosate', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Glyphosate,
																  SUM(IF(help_master_material.`material` = 'Quizalofop', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Quizalofop,
																  SUM(IF(help_master_material.`material` = 'Ametrine', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Ametrine,
																  SUM(IF(help_master_material.`material` = 'Bazza', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Bazza,
																  SUM(IF(help_master_material.`material` = 'Tekasi', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Tekasi,
																  SUM(IF(help_master_material.`material` = 'Tekila', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Tekila,
																  SUM(IF(help_master_material.`material` = 'Chlorpyrifos', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Chlorpyrifos,
																  SUM(IF(help_master_material.`material` = 'Sidazinon', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Sidazinon,

																  SUM(IF(help_master_material.`material` = 'Propoxur', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Propoxur,
																  SUM(IF(help_master_material.`material` = 'Cypermethrin', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Cypermethrin,
																  SUM(IF(help_master_material.`material` = 'Bifentrin EC', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Bifentrin_EC,
																  SUM(IF(help_master_material.`material` = 'Bifentrin G', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Bifentrin_G,
																  SUM(IF(help_master_material.`material` = 'BPMC', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS BPMC,
																  SUM(IF(help_master_material.`material` = 'Clorpyrifos', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Clorpyrifos,
																  SUM(IF(help_master_material.`material` = 'Abamectin', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Abamectin,
																  SUM(IF(help_master_material.`material` = 'Sanisol', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Sanisol,
																  SUM(IF(help_master_material.`material` = 'Ethylene', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Ethylene,
																  SUM(IF(help_master_material.`material` = 'Ethepon', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Ethepon,

																  SUM(IF(help_master_material.`material` = 'Kaolin', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Kaolin,
																  SUM(IF(help_master_material.`material` = 'Zeolit', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Zeolit,
																  SUM(IF(help_master_material.`material` = 'Rabas', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Rabas,
																  SUM(IF(help_master_material.`material` = 'Ratgone', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Ratgone,
																  SUM(IF(help_master_material.`material` = 'Indostick', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Indostick,
																  SUM(IF(help_master_material.`material` = 'Organosilicon', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Organosilicon,

																  $wilayah.`act_grp` AS group_cost_code,
																  $wilayah.`activity_desc` AS group_cost_desc
																FROM
																  help_jenis_data,
																  $wilayah
																  LEFT JOIN help_land_prep_desc
																  ON $wilayah.`bahan_alat_desc` = help_land_prep_desc.`jenis`
																  LEFT JOIN help_master_material
																  ON $wilayah.`bahan_alat` = help_master_material.`code`
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND help_jenis_data.`kode` = $wilayah.`jenis_data`
  																AND $wilayah.`hasil_efektif` != 0
																GROUP BY $wilayah.`SPK`, $wilayah.`aktivitas_code`, $wilayah.`tgl_realisasi`
																ORDER BY $wilayah.`tgl_realisasi` ASC,
																  $wilayah.`SPK` ASC");

		return $query->result();
	}

	function get_detil_spk_sbt_panen($lokasi, $wilayah, $bulan){
		$tahun = substr($bulan, 0, 4);
		$query = $this->db->query("SELECT
																  CEIL(TIMESTAMPDIFF(
																    DAY,
																    (SELECT
																      produksi_all.`tgl_awal_perawatan`
																    FROM
																      produksi_all
																    WHERE produksi_all.`lokasi` = '$lokasi'
																      AND produksi_all.`tahun_panen` = '$tahun'),
																    $wilayah.`tgl_realisasi`
																  )) AS umur_hari,
																  CEIL(TIMESTAMPDIFF(
																    DAY,
																    (SELECT
																      produksi_all.`tgl_awal_perawatan`
																    FROM
																      produksi_all
																    WHERE produksi_all.`lokasi` = '$lokasi'
																      AND produksi_all.`tahun_panen` = '$tahun'),
																    $wilayah.`tgl_realisasi`
																  ) / (365.5 / 12)) AS umur_bulan,
																  $wilayah.`SPK`,
																  $wilayah.`tgl_realisasi` AS tanggal,
																  $wilayah.`aktivitas_code` AS code_activity,
																  $wilayah.`aktivitas_desc` AS desc_activity,
																  ($wilayah.`hasil_efektif`) AS hasil_efektif,
																  SUM(IF(help_jenis_data.`category` = 'Labour', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS HKO,
																  SUM(IF(help_jenis_data.`category` = 'Labour', $wilayah.`biaya_realisasi` / $wilayah.`hasil_efektif`, 0)) AS Labour,
																  SUM(IF(help_jenis_data.`category` = 'Charge', $wilayah.`biaya_realisasi` / $wilayah.`hasil_efektif`, 0)) AS Charge,
																  SUM(IF(help_jenis_data.`category` = 'Material', $wilayah.`biaya_realisasi` / $wilayah.`hasil_efektif`, 0)) AS Material,
																  SUM($wilayah.`biaya_realisasi` / $wilayah.`hasil_efektif`) AS Total_Biaya,
																  MAX(IF(help_land_prep_desc.`category` = 'Penarik', $wilayah.`bahan_alat_desc`, (NULL))) AS Penarik,
																  MAX(IF(help_land_prep_desc.`category` = 'Implement', $wilayah.`bahan_alat_desc`, (NULL))) AS Implement,

																  SUM(IF(help_master_material.`material` = 'Urea', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Urea,
																  SUM(IF(help_master_material.`material` = 'Za', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Za,
																  SUM(IF(help_master_material.`material` = 'K2SO4', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS K2SO4,
																  SUM(IF(help_master_material.`material` = 'KCL', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS KCL,
																  SUM(IF(help_master_material.`material` = 'TSP', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS TSP,
																  SUM(IF(help_master_material.`material` = 'DAP', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS DAP,
																  SUM(IF(help_master_material.`material` = 'MgSO4', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS MgSO4,
																  SUM(IF(help_master_material.`material` = 'Kieserite', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Kieserite,
																  SUM(IF(help_master_material.`material` = 'FeSO4', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS FeSO4,
																  SUM(IF(help_master_material.`material` = 'ZnSO4', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS ZnSO4,

																  SUM(IF(help_master_material.`material` = 'Dolomite', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Dolomite,
																  SUM(IF(help_master_material.`material` = 'Gypsum', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Gypsum,
																  SUM(IF(help_master_material.`material` = 'CuSO4', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS CuSO4,
																  SUM(IF(help_master_material.`material` = 'Borax', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Borax,
																  SUM(IF(help_master_material.`material` = 'LOB', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS LOB,
																  SUM(IF(help_master_material.`material` = 'CaCl2', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS CaCl2,
																  SUM(IF(help_master_material.`material` = 'Calcibor', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Calcibor,
																  SUM(IF(help_master_material.`material` = 'Kompos', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Kompos,
																  SUM(IF(help_master_material.`material` = 'Belerang', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Belerang,
																  SUM(IF(help_master_material.`material` = 'Kieserite G', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Kieserite_G,

																  SUM(IF(help_master_material.`material` = 'NPK', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS NPK,
																  SUM(IF(help_master_material.`material` = 'Petro Cas', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Petro_Cas,
																  SUM(IF(help_master_material.`material` = 'Fosetil', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Fosetil,
																  SUM(IF(help_master_material.`material` = 'Metalaxil', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Metalaxil,
																  SUM(IF(help_master_material.`material` = 'Propiconazole', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Propiconazole,
																  SUM(IF(help_master_material.`material` = 'Prochloraz', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Prochloraz,
																  SUM(IF(help_master_material.`material` = 'Mankozeb', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Mankozeb,
																  SUM(IF(help_master_material.`material` = 'Folirfos', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Folirfos,
																  SUM(IF(help_master_material.`material` = 'H3PO3', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS H3PO3,
																  SUM(IF(help_master_material.`material` = 'Detazeb', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Detazeb,

																  SUM(IF(help_master_material.`material` = 'Bromacyl', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Bromacyl,
																  SUM(IF(help_master_material.`material` = 'Diuron', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Diuron,
																  SUM(IF(help_master_material.`material` = 'Glyphosate', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Glyphosate,
																  SUM(IF(help_master_material.`material` = 'Quizalofop', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Quizalofop,
																  SUM(IF(help_master_material.`material` = 'Ametrine', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Ametrine,
																  SUM(IF(help_master_material.`material` = 'Bazza', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Bazza,
																  SUM(IF(help_master_material.`material` = 'Tekasi', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Tekasi,
																  SUM(IF(help_master_material.`material` = 'Tekila', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Tekila,
																  SUM(IF(help_master_material.`material` = 'Chlorpyrifos', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Chlorpyrifos,
																  SUM(IF(help_master_material.`material` = 'Sidazinon', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Sidazinon,

																  SUM(IF(help_master_material.`material` = 'Propoxur', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Propoxur,
																  SUM(IF(help_master_material.`material` = 'Cypermethrin', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Cypermethrin,
																  SUM(IF(help_master_material.`material` = 'Bifentrin EC', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Bifentrin_EC,
																  SUM(IF(help_master_material.`material` = 'Bifentrin G', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Bifentrin_G,
																  SUM(IF(help_master_material.`material` = 'BPMC', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS BPMC,
																  SUM(IF(help_master_material.`material` = 'Clorpyrifos', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Clorpyrifos,
																  SUM(IF(help_master_material.`material` = 'Abamectin', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Abamectin,
																  SUM(IF(help_master_material.`material` = 'Sanisol', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Sanisol,
																  SUM(IF(help_master_material.`material` = 'Ethylene', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Ethylene,
																  SUM(IF(help_master_material.`material` = 'Ethepon', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Ethepon,

																  SUM(IF(help_master_material.`material` = 'Kaolin', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Kaolin,
																  SUM(IF(help_master_material.`material` = 'Zeolit', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Zeolit,
																  SUM(IF(help_master_material.`material` = 'Rabas', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Rabas,
																  SUM(IF(help_master_material.`material` = 'Ratgone', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Ratgone,
																  SUM(IF(help_master_material.`material` = 'Indostick', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Indostick,
																  SUM(IF(help_master_material.`material` = 'Organosilicon', $wilayah.`resource` / $wilayah.`hasil_efektif`, 0)) AS Organosilicon,

																  $wilayah.`act_grp` AS group_cost_code,
																  $wilayah.`activity_desc` AS group_cost_desc
																FROM
																  help_jenis_data,
																  $wilayah
																  LEFT JOIN help_land_prep_desc
																  ON $wilayah.`bahan_alat_desc` = help_land_prep_desc.`jenis`
																  LEFT JOIN help_master_material
																  ON $wilayah.`bahan_alat` = help_master_material.`code`
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND help_jenis_data.`kode` = $wilayah.`jenis_data`
  																AND $wilayah.`bulan_panen` = '$bulan'
  																AND $wilayah.`hasil_efektif` != 0
																GROUP BY $wilayah.`SPK`, $wilayah.`aktivitas_code`, $wilayah.`tgl_realisasi`
																ORDER BY $wilayah.`tgl_realisasi` ASC,
																  $wilayah.`SPK` ASC");

		return $query->result();
	}
}
