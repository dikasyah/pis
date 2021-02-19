<?php

class DataMaster_model extends CI_Model
{

	function get_biaya_tanam_code_jenis($lokasi, $jenis, $data_master){
		if($jenis == 'Bibit'){
			$query = $this->db->query("SELECT
																	  SUM($data_master.`biaya_realisasi`) AS total
																	FROM
																	  $data_master,
																	  help_nsst
																	WHERE $data_master.lokasi = '$lokasi'
																	  AND $data_master.act_grp = 'ZN03'
																	  AND ($data_master.`jenis_data` = 'B'
																		 OR $data_master.`jenis_data` = '4')
																	  AND help_nsst.`kode_aktifitas` = $data_master.`aktivitas_code`");

			return $query->row_array();
		}
		else if($jenis == 'Sulam' || $jenis == 'Tanam' || $jenis == 'Others'){
			$query = $this->db->query("SELECT
																	  SUM($data_master.`biaya_realisasi`) AS total
																	FROM
																	  $data_master,
																	  help_nsst
																	WHERE $data_master.lokasi = '$lokasi'
																	  AND $data_master.act_grp = 'ZN03'
																	  AND help_nsst.`category` = '$jenis'
																	  AND $data_master.`jenis_data` = '1'
																	  AND help_nsst.`kode_aktifitas` = $data_master.`aktivitas_code`");

			return $query->row_array();
		}
		else{
			$query = $this->db->query("SELECT
																	  SUM($data_master.`biaya_realisasi`) AS total
																	FROM
																	  $data_master,
																	  help_nsst
																	WHERE $data_master.lokasi = '$lokasi'
																	  AND $data_master.act_grp = 'ZN03'
																	  AND help_nsst.`category` = '$jenis'
																	  AND help_nsst.`kode_aktifitas` = $data_master.`aktivitas_code`");

			return $query->row_array();
		}
	}

	function get_timeline_landprep_code($lokasi, $data_master){
		$query = $this->db->query("SELECT
																  $data_master.`SPK`,
																  $data_master.`PAS_document`,
																  $data_master.`tgl_realisasi`,
																  help_land_prep.`category` AS jenis,
																  $data_master.`bahan_alat_desc`,
  																SUM($data_master.`biaya_realisasi`) / $data_master.`luas_aktif` AS biaya_realisasi,
																  $data_master.`hasil_efektif`,
																  help_land_prep_desc.`category`,
																	help_land_prep_desc.`rental`
																FROM
																  $data_master,
																  help_land_prep_desc,
																  help_land_prep
																WHERE $data_master.`jenis_data` != '3X'
																  AND $data_master.`jenis_data` != '7'
  																AND $data_master.`status_lokasi` LIKE '%BK%'
																  AND $data_master.`lokasi` = '$lokasi'
																  AND help_land_prep_desc.`jenis` = $data_master.`bahan_alat_desc`
																  AND $data_master.`aktivitas_code` = help_land_prep.`kode_aktifitas`
  																AND help_land_prep.`category` != 'Jalan & Saluran'
																GROUP BY $data_master.`tgl_realisasi`,
																  help_land_prep_desc.`category`
																	ORDER BY $data_master.`SPK` ASC, help_land_prep_desc.`category` DESC");

		return $query->result();
	}
	function get_jalan_saluran_code($lokasi, $data_master){
		$query = $this->db->query("SELECT
																  $data_master.`tgl_realisasi`,
																  help_land_prep.`category`
																FROM
																  $data_master,
																  help_land_prep
																WHERE $data_master.`jenis_data` != '3X'
																  AND $data_master.`jenis_data` != '7'
  																AND $data_master.`status_lokasi` LIKE '%BK%'
																  AND $data_master.`lokasi` = '$lokasi'
																  AND $data_master.`aktivitas_code` = help_land_prep.`kode_aktifitas`
																  AND help_land_prep.`category` = 'Jalan & Saluran'
																ORDER BY $data_master.`tgl_realisasi` DESC
																LIMIT 1");

		return $query->row_array();
	}

	function get_fertilization_code($lokasi, $jenis, $data_master){
		$query = $this->db->query("SELECT
																  SUM($data_master.`resource`) AS total
																FROM
																  $data_master, help_kode_bahan
																WHERE $data_master.`lokasi` = '$lokasi'
																  AND help_kode_bahan.`kode_desc` = '$jenis'
																  AND help_kode_bahan.`kode_bahan` = $data_master.`bahan_alat`");

		return $query->row_array();
	}

	function get_weed_manual_code($lokasi, $data_master){
		$query = $this->db->query("SELECT
																  SUM(hasil_efektif) AS hasil_efektif,
																  SUM(biaya_realisasi) / SUM(hasil_efektif) AS biaya_realisasi,
																  (SELECT
																    SUM($data_master.`resource`)
																  FROM
																    $data_master, help_jenis_data
																  WHERE $data_master.`lokasi` = '$lokasi'
																    AND $data_master.`aktivitas_code` = '1315111111'
																    AND $data_master.`jenis_data` = help_jenis_data.`kode`
																    AND help_jenis_data.`category` = 'Labour') AS tk
																FROM
																  $data_master
																WHERE lokasi = '$lokasi'
																  AND aktivitas_code = '1315111111'");

		return $query->row_array();
	}

	function get_element_cost_code_jenis($lokasi, $jenis, $data_master){
		$query = $this->db->query("SELECT
																  $data_master.`act_grp` AS element_cost,
																  SUM($data_master.`biaya_realisasi`) AS total
																FROM
																  $data_master
																WHERE $data_master.`lokasi` = '$lokasi'
																  AND $data_master.`jenis_data` != '3X'
																  AND $data_master.`jenis_data` != '7'
																  AND $data_master.`act_grp` = '$jenis'");

		return $query->row_array();
	}

	function get_hko_code_jenis($lokasi, $jenis, $data_master){
		$query = $this->db->query("SELECT
																  $data_master.`act_grp` AS element_cost,
																  SUM($data_master.`resource`) / $data_master.`luas_aktif` AS hko_per_ha
																FROM
																  help_jenis_data,
																  $data_master
																WHERE $data_master.`lokasi` = '$lokasi'
																  AND $data_master.`jenis_data` = help_jenis_data.`kode`
																  AND help_jenis_data.`category` = 'Labour'
																  AND $data_master.`act_grp` = '$jenis'");

		return $query->row_array();
	}

	// Timeline BK sampai Hervest
	function get_bk_st($lokasi, $start, $finish, $data_master){
		$query = $this->db->query("SELECT
																  TIMESTAMPDIFF(DAY, '$start', '$finish') AS bk_st,
																  SUM($data_master.`biaya_realisasi`) / $data_master.`luas_aktif` AS biaya
																FROM
																  $data_master
																WHERE $data_master.`jenis_data` != '3X'
																  AND $data_master.`jenis_data` != '7'
  																AND $data_master.`status_lokasi` LIKE '%BK%'
																  AND $data_master.`lokasi` = '$lokasi'");

		return $query->row_array();
	}
	function get_st_perawatan($lokasi, $start, $finish, $data_master){
		$query = $this->db->query("SELECT
																  TIMESTAMPDIFF(DAY, '$start', '$finish') AS st_perawatan,
																  SUM($data_master.`biaya_realisasi`) / $data_master.`luas_aktif` AS biaya
																FROM
																  $data_master
																WHERE $data_master.`jenis_data` != '3X'
																  AND $data_master.`jenis_data` != '7'
  																AND $data_master.`status_lokasi` LIKE 'NSST%'
																  AND $data_master.`lokasi` = '$lokasi'");

		return $query->row_array();
	}
	function get_perawatan_forcing($lokasi, $start, $finish, $status, $data_master){
		$before_forcing = date('Y-m-d', strtotime($finish) - 86400);
		$query = $this->db->query("SELECT
																  TIMESTAMPDIFF(DAY, '$start', '$finish') AS perawatan_forcing,
																  SUM($data_master.`biaya_realisasi`) / $data_master.`luas_aktif` AS biaya
																FROM
																  $data_master
																WHERE $data_master.`jenis_data` != '3X'
																  AND $data_master.`jenis_data` != '7'
																  AND $data_master.`tgl_realisasi` < '$before_forcing'
																	AND (SUBSTRING($data_master.`status_lokasi`,1,4) = '$status' OR SUBSTRING($data_master.`status_lokasi`,1,4) = 'NSBB')
																  AND $data_master.`lokasi` = '$lokasi'");

		return $query->row_array();
	}
	function get_forcing_harvest($lokasi, $start, $finish, $status, $data_master){
		$query = $this->db->query("SELECT
																  TIMESTAMPDIFF(DAY, '$start', '$finish') AS forcing_harvest,
																  SUM($data_master.`biaya_realisasi`) / $data_master.`luas_aktif` AS biaya
																FROM
																  $data_master
																WHERE $data_master.`jenis_data` != '3X'
																  AND $data_master.`jenis_data` != '7'
																  AND $data_master.`tgl_realisasi` >= '$start'
																  AND SUBSTRING($data_master.`status_lokasi`,1,4) = '$status'
																  AND $data_master.`lokasi` = '$lokasi'");

		return $query->row_array();
	}

	function get_total_charge_code($lokasi, $jenis, $data_master){
		if($jenis == 'Charge'){
			$query = $this->db->query("SELECT
																	  SUM($data_master.`biaya_realisasi`) / $data_master.`luas_aktif` AS total
																	FROM
																	  $data_master,
																	  help_jenis_data
																	WHERE $data_master.`lokasi` = '$lokasi'
																	  AND help_jenis_data.`category` = '$jenis'
																	  AND help_jenis_data.`kode` = $data_master.`jenis_data`
																	  AND $data_master.`status_lokasi` LIKE '%BK%'
																	  AND $data_master.`aktivitas_code` IN (
																	    1113111511,
																	    1113131111,
																	    1113131113,
																	    1113131311,
																	    1113131511,
																	    1113131315,
																	    1113131313,
																	    1113171111,
																	    1113171112,
																	    1113171115
																	  )");
		}
		else if($jenis == 'Material' || $jenis == 'Labour'){
			$query = $this->db->query("SELECT
																	  SUM($data_master.`biaya_realisasi`) / $data_master.`luas_aktif` AS total
																	FROM
																	  $data_master,
																	  help_jenis_data
																	WHERE $data_master.`lokasi` = '$lokasi'
																	  AND help_jenis_data.`category` = '$jenis'
																	  AND $data_master.`act_grp` = 'ZN01'
																	  AND help_jenis_data.`kode` = $data_master.`jenis_data`
	  																AND $data_master.`status_lokasi` LIKE '%BK%'");
		}
		else{
			$query = $this->db->query("SELECT
																	  SUM($data_master.`biaya_realisasi`) / $data_master.`luas_aktif` AS total
																	FROM
																	  $data_master,
																	  help_jenis_data
																	WHERE $data_master.`lokasi` = '$lokasi'
																	  AND help_jenis_data.`category` != 'Material'
																	  AND help_jenis_data.`category` != 'Labour'
																	  AND $data_master.`act_grp` = 'ZN01'
																	  AND help_jenis_data.`kode` = $data_master.`jenis_data`
	  																AND $data_master.`status_lokasi` LIKE '%BK%'
																	  AND $data_master.`aktivitas_code` NOT IN (
																	    1113111511,
																	    1113131111,
																	    1113131113,
																	    1113131311,
																	    1113131511,
																	    1113131315,
																	    1113131313,
																	    1113171111,
																	    1113171112,
																	    1113171115
																	  )");
		}

		return $query->row_array();
	}

	//Detil Element Cost
	function get_detil_element_cost_code($lokasi, $element_cost, $data_master){
		switch ($element_cost) {
			case 'ZN01':
				$umur = "TIMESTAMPDIFF(MONTH, (SELECT
																		      tgl_perubahan_status
																		    FROM
																		      histori_lokasi
																		    WHERE lokasi = '$lokasi'
																		      AND (status_group = 'BK')
																		      AND tgl_perubahan_status <= (SELECT
																				        tgl_perubahan_status
																				      FROM
																				        histori_lokasi
																				      WHERE lokasi = '$lokasi'
																				        AND status_group = 'ST'
																				      ORDER BY tgl_perubahan_status DESC
																				      LIMIT 1)
																			    ORDER BY tgl_perubahan_status DESC
																			    LIMIT 1),
																			    $data_master.`tgl_realisasi`) AS umur,";
				break;
				case 'ZN02':
				case 'ZN03':
				case 'ZN04':
					$umur = "TIMESTAMPDIFF(MONTH, (SELECT
																			      tgl_perubahan_status
																			    FROM
																			      histori_lokasi
																			    WHERE lokasi = '$lokasi'
																			      AND (status_group = 'BK')
																			      AND tgl_perubahan_status <= (SELECT
																					        tgl_perubahan_status
																					      FROM
																					        histori_lokasi
																					      WHERE lokasi = '$lokasi'
																					        AND status_group = 'ST'
																					      ORDER BY tgl_perubahan_status DESC
																					      LIMIT 1)
																				    ORDER BY tgl_perubahan_status DESC
																				    LIMIT 1),
																				    $data_master.`tgl_realisasi`) AS umur,";
					break;
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
									    $data_master.`tgl_realisasi`) AS umur,";
						break;
		}
		$query = $this->db->query("SELECT
																  $data_master.`SPK`,
																  $data_master.`PAS_document`,
																  $data_master.`tgl_realisasi`,
																  $data_master.`aktivitas_code`,
																  $data_master.`aktivitas_desc`,
																  SUBSTRING($data_master.`status_lokasi`,3,2) AS status,
																	$umur
																  help_jenis_data.`category` AS jenis_data,
																  $data_master.`bahan_alat`,
																  $data_master.`bahan_alat_desc`,
																  $data_master.`biaya_realisasi`,
																  $data_master.`hasil_efektif`
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

	function get_jumlah_sulam_code($lokasi, $data_master){
				$query = $this->db->query("SELECT
																		  SUM($data_master.`hasil_efektif`) AS jumlah_sulam
																		FROM
																		  $data_master,
																		  help_nsst
																		WHERE $data_master.`lokasi` = '$lokasi'
																		  AND $data_master.`jenis_data` = '1'
																		  AND $data_master.`aktivitas_code` = help_nsst.`kode_aktifitas`
																		  AND help_nsst.`category` = 'Sulam'");

		return $query->row_array();
	}
	function get_index_tk_code($lokasi, $data_master){
				$query = $this->db->query("SELECT
																		   CEIL(SUM($data_master.`hasil_efektif`)) / SUM($data_master.`resource`) AS index_tk
																		FROM
																		  $data_master,
																		  help_nsst
																		WHERE $data_master.`lokasi` = '$lokasi'
																		  AND $data_master.`jenis_data` = '1'
																		  AND $data_master.`aktivitas_code` = help_nsst.`kode_aktifitas`
																		  AND help_nsst.`category` = 'Tanam'");

		return $query->row_array();
	}
	function cek_current_status($status, $data_master){
		$query = $this->db->query("SELECT
																  DISTINCT(SUBSTRING($data_master.`current_status_lokasi`, 1, 4)) AS status
																FROM
																  $data_master
																WHERE $data_master.`lokasi` = '$status'");

		return $query->row_array();
	}
	function get_hko_ZN03_code($lokasi, $data_master){
		$query = $this->db->query("SELECT
																  $data_master.`act_grp` AS element_cost,
																  SUM($data_master.`biaya_realisasi`) AS hko_per_ha
																FROM
																  help_jenis_data,
																  $data_master
																WHERE $data_master.`lokasi` = '$lokasi'
																  AND $data_master.`jenis_data` = help_jenis_data.`kode`
																  AND help_jenis_data.`category` != 'Bibit'
																  AND $data_master.`act_grp` = 'ZN03'");

		return $query->row_array();
	}
	function get_real_actual_code_zn03($lokasi, $status){
		$query = $this->db->query("SELECT
																  help_real_actual_zn03.`luas`,
																  help_real_actual_zn03.`ZN03` AS total
																FROM
																  help_real_actual_zn03
																WHERE help_real_actual_zn03.`lokasi` = '$lokasi'
																  AND help_real_actual_zn03.`status` = '$status'");

		return $query->row_array();
	}
	function get_real_actual_code_zn01_zn04($lokasi, $status, $jenis, $produksi){
		$query = $this->db->query("SELECT
																  help_real_actual_zn01_zn04.`luas`,
																  (help_real_actual_zn01_zn04.`$jenis` / help_real_actual_zn01_zn04.`luas`) * $produksi.`real_dan_sisa_rencana_luas` AS total
																FROM
																  help_real_actual_zn01_zn04
																  INNER JOIN $produksi
																    ON help_real_actual_zn01_zn04.`lokasi` = $produksi.`lokasi`
																    AND help_real_actual_zn01_zn04.`status` = SUBSTRING($produksi.`status`, 1, 4)
																WHERE help_real_actual_zn01_zn04.`lokasi` = '$lokasi'
																  AND help_real_actual_zn01_zn04.`status` = '$status'");

		return $query->row_array();
	}
}
