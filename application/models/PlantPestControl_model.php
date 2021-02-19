<?php

class PlantPestControl_model extends CI_Model
{

	function get_plant_pest_control_code($lokasi){
		$query = $this->db->query("SELECT
																  plant_pest_control.`tgl_realisasi`,
																  help_plant_pest_control.`category`,
																  plant_pest_control.`aktivitas_code`
																FROM
																  plant_pest_control,
																  help_plant_pest_control
																WHERE plant_pest_control.lokasi = '$lokasi'
																  AND plant_pest_control.`aktivitas_code` = help_plant_pest_control.`kode_aktifitas`
																ORDER BY plant_pest_control.`tgl_realisasi` ASC, plant_pest_control.`aktivitas_code` ASC");

		return $query->result();
	}

	function get_unsur_plant_pest_control($lokasi, $wilayah){
		$query = $this->db->query("SELECT
															  SUM(IF(help_master_material.`material` = 'Tekasi', $wilayah.`resource`, 0)) AS Tekasi,
															  SUM(IF(help_master_material.`material` = 'Tekila', $wilayah.`resource`, 0)) AS Tekila,
															  SUM(IF(help_master_material.`material` = 'Chlorpyrifos', $wilayah.`resource`, 0)) AS Chlorpyrifos,
															  SUM(IF(help_master_material.`material` = 'Sidazinon', $wilayah.`resource`, 0)) AS Sidazinon,
															  SUM(IF(help_master_material.`material` = 'Propoxur', $wilayah.`resource`, 0)) AS Propoxur,
															  SUM(IF(help_master_material.`material` = 'Cypermethrin', $wilayah.`resource`, 0)) AS Cypermethrin,
															  SUM(IF(help_master_material.`material` = 'Bifentrin EC', $wilayah.`resource`, 0)) AS Bifentrin_EC,
															  SUM(IF(help_master_material.`material` = 'Bifentrin G', $wilayah.`resource`, 0)) AS Bifentrin_G,
															  SUM(IF(help_master_material.`material` = 'BPMC', $wilayah.`resource`, 0)) AS BPMC,
															  SUM(IF(help_master_material.`material` = 'Clorpyrifos', $wilayah.`resource`, 0)) AS Clorpyrifos,
															  SUM(IF(help_master_material.`material` = 'Abamectin', $wilayah.`resource`, 0)) AS Abamectin,
															  SUM(IF(help_master_material.`material` = 'Fosetil', $wilayah.`resource`, 0)) AS Fosetil,
															  SUM(IF(help_master_material.`material` = 'Metalaxil', $wilayah.`resource`, 0)) AS Metalaxil,
															  SUM(IF(help_master_material.`material` = 'Propiconazole', $wilayah.`resource`, 0)) AS Propiconazole,
															  SUM(IF(help_master_material.`material` = 'Prochloraz', $wilayah.`resource`, 0)) AS Prochloraz,
															  SUM(IF(help_master_material.`material` = 'Mankozeb', $wilayah.`resource`, 0)) AS Mankozeb,
															  SUM(IF(help_master_material.`material` = 'Folirfos', $wilayah.`resource`, 0)) AS Folirfos,
															  SUM(IF(help_master_material.`material` = 'H3PO3', $wilayah.`resource`, 0)) AS H3PO3,
															  SUM(IF(help_master_material.`material` = 'Detazeb', $wilayah.`resource`, 0)) AS Detazeb,
															  SUM(IF(help_master_material.`material` = 'Sarineb', $wilayah.`resource`, 0)) AS Sarineb,
															  SUM(IF(help_master_material.`material` = 'Sorento', $wilayah.`resource`, 0)) AS Sorento
															FROM
															  $wilayah,
															  help_master_material
															WHERE $wilayah.`lokasi` = '$lokasi'
															  AND help_master_material.`code` = $wilayah.`bahan_alat`");

		return $query->row_array();
	}
	function get_unsur_plant_pest_control_panen($lokasi, $wilayah, $bulan_panen){
		$wilayah = "P".substr($wilayah, 1, 2);
		$query = $this->db->query("SELECT
															  SUM(IF(help_master_material.`material` = 'Tekasi', $wilayah.`resource`, 0)) AS Tekasi,
															  SUM(IF(help_master_material.`material` = 'Tekila', $wilayah.`resource`, 0)) AS Tekila,
															  SUM(IF(help_master_material.`material` = 'Chlorpyrifos', $wilayah.`resource`, 0)) AS Chlorpyrifos,
															  SUM(IF(help_master_material.`material` = 'Sidazinon', $wilayah.`resource`, 0)) AS Sidazinon,
															  SUM(IF(help_master_material.`material` = 'Propoxur', $wilayah.`resource`, 0)) AS Propoxur,
															  SUM(IF(help_master_material.`material` = 'Cypermethrin', $wilayah.`resource`, 0)) AS Cypermethrin,
															  SUM(IF(help_master_material.`material` = 'Bifentrin EC', $wilayah.`resource`, 0)) AS Bifentrin_EC,
															  SUM(IF(help_master_material.`material` = 'Bifentrin G', $wilayah.`resource`, 0)) AS Bifentrin_G,
															  SUM(IF(help_master_material.`material` = 'BPMC', $wilayah.`resource`, 0)) AS BPMC,
															  SUM(IF(help_master_material.`material` = 'Clorpyrifos', $wilayah.`resource`, 0)) AS Clorpyrifos,
															  SUM(IF(help_master_material.`material` = 'Abamectin', $wilayah.`resource`, 0)) AS Abamectin,
															  SUM(IF(help_master_material.`material` = 'Fosetil', $wilayah.`resource`, 0)) AS Fosetil,
															  SUM(IF(help_master_material.`material` = 'Metalaxil', $wilayah.`resource`, 0)) AS Metalaxil,
															  SUM(IF(help_master_material.`material` = 'Propiconazole', $wilayah.`resource`, 0)) AS Propiconazole,
															  SUM(IF(help_master_material.`material` = 'Prochloraz', $wilayah.`resource`, 0)) AS Prochloraz,
															  SUM(IF(help_master_material.`material` = 'Mankozeb', $wilayah.`resource`, 0)) AS Mankozeb,
															  SUM(IF(help_master_material.`material` = 'Folirfos', $wilayah.`resource`, 0)) AS Folirfos,
															  SUM(IF(help_master_material.`material` = 'H3PO3', $wilayah.`resource`, 0)) AS H3PO3,
															  SUM(IF(help_master_material.`material` = 'Detazeb', $wilayah.`resource`, 0)) AS Detazeb
															FROM
															  $wilayah,
															  help_master_material
															WHERE $wilayah.`lokasi` = '$lokasi'
															  AND help_master_material.`code` = $wilayah.`bahan_alat`
																AND $wilayah.`bulan_panen` = '$bulan_panen'");

		return $query->row_array();
	}
	function get_plant_pest_control($lokasi, $wilayah){
		$query = $this->db->query("SELECT
																  SUM(hasil_efektif) AS hasil_efektif,
																  SUM(biaya_realisasi) AS biaya_realisasi
																FROM
																  $wilayah
																WHERE lokasi = '$lokasi'
																  AND aktivitas_code = '1315111111'");

		return $query->row_array();
	}
	function get_plant_pest_control_insect($lokasi, $wilayah, $activity){
		$query = $this->db->query("SELECT
																  SUM(IF(help_master_material.`material` = 'Cypermethrin', $wilayah.`resource`, 0)) AS Cypermethrin,
																  SUM(IF(help_master_material.`material` = 'Propoxur', $wilayah.`resource`, 0)) AS Propoxur,
																  SUM(IF(help_master_material.`material` = 'BPMC', $wilayah.`resource`, 0)) AS BPMC,
																  SUM(IF(help_master_material.`material` = 'K2SO4', $wilayah.`resource`, 0)) AS K2SO4,
																  SUM(IF(help_master_material.`material` = 'Urea', $wilayah.`resource`, 0)) AS Urea,
																  SUM(IF(help_master_material.`material` = 'Sidazinon', $wilayah.`resource`, 0)) AS Sidazinon,
																  SUM(IF(help_master_material.`material` = 'LOB', $wilayah.`resource`, 0)) AS LOB,
																  SUM(IF(help_master_material.`material` = 'Borax', $wilayah.`resource`, 0)) AS Borax,
																  SUM(IF(help_master_material.`material` = 'Kaolin', $wilayah.`resource`, 0)) AS Kaolin,
																  SUM(IF(help_master_material.`material` = 'FeSO4', $wilayah.`resource`, 0)) AS FeSO4,
																  SUM(IF(help_master_material.`material` = 'ZnSO4', $wilayah.`resource`, 0)) AS ZnSO4,
																  SUM(IF(help_master_material.`material` = 'Bifentrin EC', $wilayah.`resource`, 0)) AS Bifentrin_EC,
																  SUM(IF(help_master_material.`material` = 'Abamectin', $wilayah.`resource`, 0)) AS Abamectin,
																  SUM(IF(help_master_material.`material` = 'Sanisol', $wilayah.`resource`, 0)) AS Sanisol,
																  SUM(IF(help_master_material.`material` = 'Metalaxil', $wilayah.`resource`, 0)) AS Metalaxil
																FROM
																  $wilayah,
																  help_master_material
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND help_master_material.`code` = $wilayah.`bahan_alat`
																  AND $wilayah.`aktivitas_code` = '$activity'");

		return $query->row_array();
	}
	function get_plant_pest_control_insect_tgl($lokasi, $wilayah, $activity){
		$query = $this->db->query("SELECT
																  $wilayah.`tgl_realisasi`
																FROM
																  $wilayah
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`aktivitas_code` = '$activity'
																LIMIT 1");

		return $query->row_array();
	}
	function get_detil_activity_insect_material($lokasi, $data_master, $material){
		$query = $this->db->query("SELECT
																  $data_master.`SPK`,
																  $data_master.`PAS_document`,
																  $data_master.`tgl_realisasi` AS tgl,
																  $data_master.`aktivitas_code` AS code_activity,
																  $data_master.`aktivitas_desc` AS desc_activity,
																  SUBSTRING($data_master.`status_lokasi`,3,2) AS status,
																	TIMESTAMPDIFF(
																				    MONTH,
																				    (SELECT
																				      lokasi.`tgl_mulai_rawat`
																				    FROM
																				      lokasi
																				    WHERE lokasi.`lokasi` = '$lokasi'),
																				    $data_master.`tgl_realisasi`) + 1 AS umur,
																  help_jenis_data.`category` AS jenis_data,
																  $data_master.`bahan_alat` AS code_material,
																  $data_master.`bahan_alat_desc` AS desc_material,
																  $data_master.`resource`,
																  $data_master.`hasil_efektif`
																FROM
																  $data_master,
																  help_jenis_data
																WHERE $data_master.`lokasi` = '$lokasi'
																  AND help_jenis_data.`kode` = $data_master.`jenis_data`
																  AND $data_master.`bahan_alat` = '$material'
																  AND ($data_master.`aktivitas_code` = '1313111113'
																   OR $data_master.`aktivitas_code` = '1313111115')
																ORDER BY $data_master.`tgl_realisasi` ASC,
																  $data_master.`SPK` ASC");

		return $query->result();
	}

	function get_material_unsur_insect($lokasi, $wilayah, $unsur){
		$query = $this->db->query("SELECT
																  SUM(IF($wilayah.`aktivitas_code` = '1313111113', $wilayah.`resource`, 0)) AS Insect_1,
																  SUM(IF($wilayah.`aktivitas_code` = '1313111115', $wilayah.`resource`, 0)) AS Insect_2
																FROM
																  $wilayah
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`bahan_alat` = '$unsur'");

		return $query->row_array();
	}
	function get_master_material_insect(){
		$query = $this->db->query("SELECT
																  *
																FROM
																  help_master_material
																WHERE help_master_material.`material` IN (
																    'Cypermethrin',
																    'Propoxur',
																    'BPMC',
																    'K2SO4',
																    'Urea',
																    'Sidazinon',
																    'LOB',
																    'Borax',
																    'Kaolin',
																    'FeSO4',
																    'ZnSO4',
																    'Bifentrin EC',
																    'Abamectin',
																    'Sanisol',
																    'Metalaxil'
																  )");

		return $query->result();
	}
}
