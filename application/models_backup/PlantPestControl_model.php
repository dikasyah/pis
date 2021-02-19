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
															  SUM(IF(help_master_material.`material` = 'Detazeb', $wilayah.`resource`, 0)) AS Detazeb
															FROM
															  $wilayah,
															  help_master_material
															WHERE $wilayah.`lokasi` = '$lokasi'
															  AND help_master_material.`code` = $wilayah.`bahan_alat`");

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
}
