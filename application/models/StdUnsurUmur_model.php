<?php

class StdUnsurUmur_model extends CI_Model
{
	function get_std_unsur_umur_wilayah($jenis){
		$query = $this->db->query("SELECT
																  std_unsur_umur.`umur`,
																  std_unsur_umur.`N`,
																  std_unsur_umur.`P`,
																  std_unsur_umur.`K`,
																  std_unsur_umur.`MG`
																FROM
																  std_unsur_umur
																WHERE std_unsur_umur.`status` = '$jenis'");

		return $query->result();
	}

	function get_std_metarial($kelas, $umur){
		$query = $this->db->query("SELECT
																  std_material.*
																FROM
																  std_material
																WHERE std_material.`kelas` = '$kelas'
																  AND std_material.`umur` = '$umur'");

		return $query->row_array();
	}
	function get_satuan_metarial(){
		$query = $this->db->query("SELECT
																  MAX(IF(help_master_material.`material` = 'Urea', help_master_material.`satuan`, (NULL))) AS Urea,
																  MAX(IF(help_master_material.`material` = 'Urease', help_master_material.`satuan`, (NULL))) AS Urease,
																  MAX(IF(help_master_material.`material` = 'Za', help_master_material.`satuan`, (NULL))) AS Za,
																  MAX(IF(help_master_material.`material` = 'K2SO4', help_master_material.`satuan`, (NULL))) AS K2SO4,
																  MAX(IF(help_master_material.`material` = 'KCL', help_master_material.`satuan`, (NULL))) AS KCL,
																  MAX(IF(help_master_material.`material` = 'TSP', help_master_material.`satuan`, (NULL))) AS TSP,
																  MAX(IF(help_master_material.`material` = 'DAP', help_master_material.`satuan`, (NULL))) AS DAP,
																  MAX(IF(help_master_material.`material` = 'MgSO4', help_master_material.`satuan`, (NULL))) AS MgSO4,
																  MAX(IF(help_master_material.`material` = 'Kieserite', help_master_material.`satuan`, (NULL))) AS Kieserite,
																  MAX(IF(help_master_material.`material` = 'FeSO4', help_master_material.`satuan`, (NULL))) AS FeSO4,

																  MAX(IF(help_master_material.`material` = 'ZnSO4', help_master_material.`satuan`, (NULL))) AS ZnSO4,
																  MAX(IF(help_master_material.`material` = 'Dolomite', help_master_material.`satuan`, (NULL))) AS Dolomite,
																  MAX(IF(help_master_material.`material` = 'Gypsum', help_master_material.`satuan`, (NULL))) AS Gypsum,
																  MAX(IF(help_master_material.`material` = 'CuSO4', help_master_material.`satuan`, (NULL))) AS CuSO4,
																  MAX(IF(help_master_material.`material` = 'Borax', help_master_material.`satuan`, (NULL))) AS Borax,
																  MAX(IF(help_master_material.`material` = 'LOB', help_master_material.`satuan`, (NULL))) AS LOB,
																  MAX(IF(help_master_material.`material` = 'CaCl2', help_master_material.`satuan`, (NULL))) AS CaCl2,
																  MAX(IF(help_master_material.`material` = 'Calcibor', help_master_material.`satuan`, (NULL))) AS Calcibor,
																  MAX(IF(help_master_material.`material` = 'Kompos', help_master_material.`satuan`, (NULL))) AS Kompos,
																  MAX(IF(help_master_material.`material` = 'Belerang', help_master_material.`satuan`, (NULL))) AS Belerang,

																  MAX(IF(help_master_material.`material` = 'Kieserite G', help_master_material.`satuan`, (NULL))) AS Kieserite_G,
																  MAX(IF(help_master_material.`material` = 'NPK', help_master_material.`satuan`, (NULL))) AS NPK,
																  MAX(IF(help_master_material.`material` = 'Petro Cas', help_master_material.`satuan`, (NULL))) AS Petro_Cas,
																  MAX(IF(help_master_material.`material` = 'Fosetil', help_master_material.`satuan`, (NULL))) AS Fosetil,
																  MAX(IF(help_master_material.`material` = 'Metalaxil', help_master_material.`satuan`, (NULL))) AS Metalaxil,
																  MAX(IF(help_master_material.`material` = 'Propiconazole', help_master_material.`satuan`, (NULL))) AS Propiconazole,
																  MAX(IF(help_master_material.`material` = 'Prochloraz', help_master_material.`satuan`, (NULL))) AS Prochloraz,
																  MAX(IF(help_master_material.`material` = 'Mankozeb', help_master_material.`satuan`, (NULL))) AS Mankozeb,
																  MAX(IF(help_master_material.`material` = 'Folirfos', help_master_material.`satuan`, (NULL))) AS Folirfos,
																  MAX(IF(help_master_material.`material` = 'H3PO3', help_master_material.`satuan`, (NULL))) AS H3PO3,

																  MAX(IF(help_master_material.`material` = 'Detazeb', help_master_material.`satuan`, (NULL))) AS Detazeb,
																  MAX(IF(help_master_material.`material` = 'Bromacyl', help_master_material.`satuan`, (NULL))) AS Bromacyl,
																  MAX(IF(help_master_material.`material` = 'Diuron', help_master_material.`satuan`, (NULL))) AS Diuron,
																  MAX(IF(help_master_material.`material` = 'Glyphosate', help_master_material.`satuan`, (NULL))) AS Glyphosate,
																  MAX(IF(help_master_material.`material` = 'Quizalofop', help_master_material.`satuan`, (NULL))) AS Quizalofop,
																  MAX(IF(help_master_material.`material` = 'Ametrine', help_master_material.`satuan`, (NULL))) AS Ametrine,
																  MAX(IF(help_master_material.`material` = 'Bazza', help_master_material.`satuan`, (NULL))) AS Bazza,
																  MAX(IF(help_master_material.`material` = 'Tekasi', help_master_material.`satuan`, (NULL))) AS Tekasi,
																  MAX(IF(help_master_material.`material` = 'Tekila', help_master_material.`satuan`, (NULL))) AS Tekila,
																  MAX(IF(help_master_material.`material` = 'Chlorpyrifos', help_master_material.`satuan`, (NULL))) AS Chlorpyrifos,

																  MAX(IF(help_master_material.`material` = 'Sidazinon', help_master_material.`satuan`, (NULL))) AS Sidazinon,
																  MAX(IF(help_master_material.`material` = 'Propoxur', help_master_material.`satuan`, (NULL))) AS Propoxur,
																  MAX(IF(help_master_material.`material` = 'Cypermethrin', help_master_material.`satuan`, (NULL))) AS Cypermethrin,
																  MAX(IF(help_master_material.`material` = 'Bifentrin EC', help_master_material.`satuan`, (NULL))) AS Bifentrin_EC,
																  MAX(IF(help_master_material.`material` = 'Bifentrin G', help_master_material.`satuan`, (NULL))) AS Bifentrin_G,
																  MAX(IF(help_master_material.`material` = 'BPMC', help_master_material.`satuan`, (NULL))) AS BPMC,
																  MAX(IF(help_master_material.`material` = 'Clorpyrifos', help_master_material.`satuan`, (NULL))) AS Clorpyrifos,
																  MAX(IF(help_master_material.`material` = 'Abamectin', help_master_material.`satuan`, (NULL))) AS Abamectin,
																  MAX(IF(help_master_material.`material` = 'Sanisol', help_master_material.`satuan`, (NULL))) AS Sanisol,
																  MAX(IF(help_master_material.`material` = 'Ethylene', help_master_material.`satuan`, (NULL))) AS Ethylene,

																  MAX(IF(help_master_material.`material` = 'Ethepon', help_master_material.`satuan`, (NULL))) AS Ethepon,
																  MAX(IF(help_master_material.`material` = 'Kaolin', help_master_material.`satuan`, (NULL))) AS Kaolin,
																  MAX(IF(help_master_material.`material` = 'Zeolit', help_master_material.`satuan`, (NULL))) AS Zeolit,
																  MAX(IF(help_master_material.`material` = 'Rabas', help_master_material.`satuan`, (NULL))) AS Rabas,
																  MAX(IF(help_master_material.`material` = 'Ratgone', help_master_material.`satuan`, (NULL))) AS Ratgone,
																  MAX(IF(help_master_material.`material` = 'Indostick', help_master_material.`satuan`, (NULL))) AS Indostick,
																  MAX(IF(help_master_material.`material` = 'Organosilicon', help_master_material.`satuan`, (NULL))) AS Organosilicon,
																  MAX(IF(help_master_material.`material` = 'Soda Ash', help_master_material.`satuan`, (NULL))) AS Soda_Ash,
																  MAX(IF(help_master_material.`material` = 'Sarineb', help_master_material.`satuan`, (NULL))) AS Sarineb,
																  MAX(IF(help_master_material.`material` = 'Sorento', help_master_material.`satuan`, (NULL))) AS Sorento,

																  MAX(IF(help_master_material.`material` = 'NPK Haracoat', help_master_material.`satuan`, (NULL))) AS NPK_Haracoat,
																  MAX(IF(help_master_material.`material` = 'Oksifluorfen', help_master_material.`satuan`, (NULL))) AS Oksifluorfen
																FROM
																  help_master_material");

		return $query->row_array();
	}
	function get_std_metarial_quota($kelas, $umur){
		$query = $this->db->query("SELECT
																  std_material_quota.*
																FROM
																  std_material_quota
																WHERE std_material_quota.`kelas` = '$kelas'
																  AND std_material_quota.`umur` = '$umur'");

		return $query->row_array();
	}
	function get_std_metarial_budget($kelas, $umur, $material){
		switch ($material) {
			case 'Fertilizer':
			case 'Herbicide':
			case 'Insecticide':
			case 'Fungicide':
				$pembagi = "";
			break;

			case 'NPKMg':
			case 'Nitrogen':
			case 'P2O5':
			case 'K2O':
			case 'MgO':
				$pembagi = "";
			break;

			default:
				$pembagi = "/ help_master_material.`harga`";
			break;
		}
		$cek = explode(" ", $material);
		if(sizeof($cek) > 1){
			$material = $cek[0]."_".$cek[1];
		}
		$query = $this->db->query("SELECT
																  std_material_budget.`$material` $pembagi AS material
																FROM
																  std_material_budget
																  LEFT JOIN help_master_material
																  ON help_master_material.`material` = '$material'
																WHERE std_material_budget.`kelas` = '$kelas'
																  AND std_material_budget.`umur` = '$umur'");

		return $query->row_array();
	}
}
