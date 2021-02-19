<?php

class WeedControl_model extends CI_Model
{

	function get_weed_control_code($lokasi){
		$query = $this->db->query("SELECT
																  *
																FROM
																  weed_control
																WHERE lokasi = '$lokasi'
																ORDER BY tgl_realisasi ASC");

		return $query->result();
	}

	function get_unsur_weed_control($lokasi, $wilayah){
		$query = $this->db->query("SELECT
																  SUM(IF(help_master_material.`material` = 'Bromacyl', $wilayah.`resource`, 0)) AS Bromacyl,
																  SUM(IF(help_master_material.`material` = 'Diuron', $wilayah.`resource`, 0)) AS Diuron,
																  SUM(IF(help_master_material.`material` = 'Glyphosate', $wilayah.`resource`, 0)) AS Glyphosate,
																  SUM(IF(help_master_material.`material` = 'Quizalofop', $wilayah.`resource`, 0)) AS Quizalofop,
																  SUM(IF(help_master_material.`material` = 'Ametrine', $wilayah.`resource`, 0)) AS Ametrine,
																  SUM(IF(help_master_material.`material` = 'Bazza', $wilayah.`resource`, 0)) AS Bazza,
																  SUM(IF(help_master_material.`material` = 'Oksifluorfen', $wilayah.`resource`, 0)) AS Oksifluorfen
																FROM
																  $wilayah,
																  help_master_material
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND help_master_material.`code` = $wilayah.`bahan_alat`");

		return $query->row_array();
	}
	function get_unsur_weed_control_panen($lokasi, $wilayah, $bulan_panen){
		$wilayah = "P".substr($wilayah, 1, 2);
		$query = $this->db->query("SELECT
																  SUM(IF(help_master_material.`material` = 'Bromacyl', $wilayah.`resource`, 0)) AS Bromacyl,
																  SUM(IF(help_master_material.`material` = 'Diuron', $wilayah.`resource`, 0)) AS Diuron,
																  SUM(IF(help_master_material.`material` = 'Glyphosate', $wilayah.`resource`, 0)) AS Glyphosate,
																  SUM(IF(help_master_material.`material` = 'Quizalofop', $wilayah.`resource`, 0)) AS Quizalofop,
																  SUM(IF(help_master_material.`material` = 'Ametrine', $wilayah.`resource`, 0)) AS Ametrine
																FROM
																  $wilayah,
																  help_master_material
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND help_master_material.`code` = $wilayah.`bahan_alat`
																	AND $wilayah.`bulan_panen` = '$bulan_panen'");

		return $query->row_array();
	}
	function get_weed_control_booster($lokasi, $wilayah){
		$query = $this->db->query("SELECT
																  $wilayah.`lokasi`,
																  $wilayah.`tgl_realisasi`,
																  $wilayah.`luas_aktif`,
																  SUM($wilayah.`biaya_realisasi`) AS total
																FROM
																  $wilayah
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`aktivitas_code` = '1315131123'
																GROUP BY $wilayah.`tgl_realisasi`
																ORDER BY $wilayah.`tgl_realisasi` ASC");

		return $query->result();
	}
	function get_weed_control_booster_panen($lokasi, $wilayah, $bulan_panen){
		$wilayah = "P".substr($wilayah, 1, 2);
		$query = $this->db->query("SELECT
																  $wilayah.`lokasi`,
																  $wilayah.`tgl_realisasi`,
																  $wilayah.`luas_aktif`,
																  SUM($wilayah.`biaya_realisasi`) AS total
																FROM
																  $wilayah
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`aktivitas_code` = '1315131123'
																	AND $wilayah.`bulan_panen` = '$bulan_panen'
																GROUP BY $wilayah.`tgl_realisasi`
																ORDER BY $wilayah.`tgl_realisasi` ASC");

		return $query->result();
	}
	function get_weed_control_weeding_man($lokasi, $wilayah){
		$query = $this->db->query("SELECT
																  SUM(hasil_efektif) AS hasil_efektif,
																  SUM(biaya_realisasi) AS biaya_realisasi
																FROM
																  $wilayah
																WHERE lokasi = '$lokasi'
																  AND aktivitas_code = '1315111111'");

		return $query->row_array();
	}
	function get_weed_control_weeding_man_panen($lokasi, $wilayah, $bulan_panen){
		$wilayah = "P".substr($wilayah, 1, 2);
		$query = $this->db->query("SELECT
																  SUM(hasil_efektif) AS hasil_efektif,
																  SUM(biaya_realisasi) AS biaya_realisasi
																FROM
																  $wilayah
																WHERE lokasi = '$lokasi'
																  AND aktivitas_code = '1315111111'
																	AND $wilayah.`bulan_panen` = '$bulan_panen'");

		return $query->row_array();
	}
	function get_weed_control_pre_post_planting($lokasi, $wilayah, $activity){
		$query = $this->db->query("SELECT
																  SUM(IF(help_master_material.`material` = 'Urea', $wilayah.`resource`, 0)) AS Urea,
																  SUM(IF(help_master_material.`material` = 'Bromacyl', $wilayah.`resource`, 0)) AS Bromacyl,
																  SUM(IF(help_master_material.`material` = 'Ametrine', $wilayah.`resource`, 0)) AS Ametrine,
																  SUM(IF(help_master_material.`material` = 'Quizalofop', $wilayah.`resource`, 0)) AS Quizalofop,
																  SUM(IF(help_master_material.`material` = 'Diuron', $wilayah.`resource`, 0)) AS Diuron,
																  SUM(IF(help_master_material.`material` = 'Chlorpyrifos', $wilayah.`resource`, 0)) AS Chlorpyrifos,
																  SUM(IF(help_master_material.`material` = 'Sidazinon', $wilayah.`resource`, 0)) AS Sidazinon,
																  SUM(IF(help_master_material.`material` = 'Bifentrin EC', $wilayah.`resource`, 0)) AS Bifentrin_EC,
																  SUM(IF(help_master_material.`material` = 'BPMC', $wilayah.`resource`, 0)) AS BPMC,
																  SUM(IF(help_master_material.`material` = 'Abamectin', $wilayah.`resource`, 0)) AS Abamectin,
																  SUM(IF(help_master_material.`material` = 'Kaolin', $wilayah.`resource`, 0)) AS Kaolin,
																  SUM(IF(help_master_material.`material` = 'Fosetil', $wilayah.`resource`, 0)) AS Fosetil,
																  SUM(IF(help_master_material.`material` = 'Metalaxil', $wilayah.`resource`, 0)) AS Metalaxil,
																  SUM(IF(help_master_material.`material` = 'Zeolit', $wilayah.`resource`, 0)) AS Zeolit,
																  SUM(IF(help_master_material.`material` = 'Indostick', $wilayah.`resource`, 0)) AS Indostick
																FROM
																  $wilayah,
																  help_master_material
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND help_master_material.`code` = $wilayah.`bahan_alat`
																  AND $wilayah.`aktivitas_code` = '$activity'");

		return $query->row_array();
	}
	function get_weed_control_pre_post_planting_tgl($lokasi, $wilayah, $activity){
		if($activity == '1315131113'){
			$option = 'ASC';
		}
		else{
			$option = 'DESC';
		}
		$query = $this->db->query("SELECT
																  $wilayah.`tgl_realisasi`
																FROM
																  $wilayah
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`aktivitas_code` = '$activity'
																ORDER BY $wilayah.`tgl_realisasi` $option
																LIMIT 1");

		return $query->row_array();
	}
	function get_weed_control_booster_detail($lokasi, $wilayah){
		$query = $this->db->query("SELECT
																  $wilayah.`tgl_realisasi`,
  																volume_air.`volume_air`,
																  SUM(IF(help_master_material.`material` = 'Indostick', $wilayah.`resource`, 0)) AS Indostick,
																  SUM(IF(help_master_material.`material` = 'Ametrine', $wilayah.`resource`, 0)) AS Ametrine,
																  SUM(IF(help_master_material.`material` = 'Diuron', $wilayah.`resource`, 0)) AS Diuron,
																  SUM(IF(help_master_material.`material` = 'BPMC', $wilayah.`resource`, 0)) AS BPMC,
																  SUM(IF(help_master_material.`material` = 'Urea', $wilayah.`resource`, 0)) AS Urea,
																  SUM(IF(help_master_material.`material` = 'Quizalofop', $wilayah.`resource`, 0)) AS Quizalofop,
																  SUM(IF(help_master_material.`material` = 'Fosetil', $wilayah.`resource`, 0)) AS Fosetil,
																  SUM(IF(help_master_material.`material` = 'K2SO4', $wilayah.`resource`, 0)) AS K2SO4,
																  SUM(IF(help_master_material.`material` = 'Chlorpyrifos', $wilayah.`resource`, 0)) AS Chlorpyrifos,
																  SUM(IF(help_master_material.`material` = 'Bifentrin EC', $wilayah.`resource`, 0)) AS Bifentrin_EC,
																  SUM(IF(help_master_material.`material` = 'Zeolit', $wilayah.`resource`, 0)) AS Zeolit,
																  SUM(IF(help_master_material.`material` = 'Clorpyrifos', $wilayah.`resource`, 0)) AS Clorpyrifos,
																  SUM(IF(help_master_material.`material` = 'Metalaxil', $wilayah.`resource`, 0)) AS Metalaxil,
																  SUM(IF(help_master_material.`material` = 'Sidazinon', $wilayah.`resource`, 0)) AS Sidazinon,
																  SUM(IF(help_master_material.`material` = 'KCL', $wilayah.`resource`, 0)) AS KCL,
																  SUM(IF(help_master_material.`material` = 'LOB', $wilayah.`resource`, 0)) AS LOB,
																  SUM(IF(help_master_material.`material` = 'Cypermethrin', $wilayah.`resource`, 0)) AS Cypermethrin,
																  SUM(IF(help_master_material.`material` = 'Propoxur', $wilayah.`resource`, 0)) AS Propoxur,
																  SUM(IF(help_master_material.`material` = 'Bromacyl', $wilayah.`resource`, 0)) AS Bromacyl
																FROM
																  help_master_material,
																  $wilayah
																  LEFT JOIN volume_air
																     ON $wilayah.`lokasi` = volume_air.`lokasi`
																    AND volume_air.`deskripsi` LIKE '%Herbi booster%'
																    AND $wilayah.`tgl_realisasi` = volume_air.`tgl_aplikasi`
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND help_master_material.`code` = $wilayah.`bahan_alat`
																  AND $wilayah.`aktivitas_code` = '1315131123'
																GROUP BY $wilayah.`tgl_realisasi`");

		return $query->result();
	}
	function get_detil_activity_prepost_material($lokasi, $data_master, $material){
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
																  AND ($data_master.`aktivitas_code` = '1315131111'
																   OR $data_master.`aktivitas_code` = '1315131113')
																ORDER BY $data_master.`tgl_realisasi` ASC,
																  $data_master.`SPK` ASC");

		return $query->result();
	}

	function get_material_unsur_prepost($lokasi, $wilayah, $unsur){
		$query = $this->db->query("SELECT
																  SUM(IF($wilayah.`aktivitas_code` = '1315131111', $wilayah.`resource`, 0)) AS Pre,
																  SUM(IF($wilayah.`aktivitas_code` = '1315131113', $wilayah.`resource`, 0)) AS Post
																FROM
																  $wilayah
																WHERE $wilayah.`lokasi` = '$lokasi'
																  AND $wilayah.`bahan_alat` = '$unsur'");

		return $query->row_array();
	}
	function get_master_material_prepost(){
		$query = $this->db->query("SELECT
																  *
																FROM
																  help_master_material
																WHERE help_master_material.`material` IN (
																    'Urea',
																    'Bromacyl',
																    'Ametrine',
																    'Quizalofop',
																    'Diuron',
																    'Chlorpyrifos',
																    'Sidazinon',
																    'Bifentrin EC',
																    'BPMC',
																    'Abamectin',
																    'Kaolin',
																    'Fosetil',
																    'Metalaxil',
																    'Zeolit',
																    'Indostick'
																  )");

		return $query->result();
	}
}
