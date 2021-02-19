<?php

class Workshop_model extends CI_Model
{

	function get_performance_pg($jabatan){
		$query = $this->db->query("SELECT
																  workshop_plantation_performance.*,
																  IF((@cnt + 1) <= 3, (@cnt := @cnt + 1), NULL) AS juara
																FROM
																  workshop_plantation_performance
																  CROSS JOIN (SELECT @cnt := 0) AS dummy
																WHERE workshop_plantation_performance.`jabatan` LIKE '$jabatan%'
																ORDER BY workshop_plantation_performance.`total_performance` DESC");

		return $query->result();
	}
	function get_performance_jabatan($jabatan, $pg){
		$query = $this->db->query("SELECT
																  workshop_plantation_performance.*
																FROM
																  workshop_plantation_performance
																WHERE workshop_plantation_performance.`jabatan` = '$jabatan'
																  AND workshop_plantation_performance.`pg` = '$pg'");

		return $query->row_array();
	}
	function get_performance_total_pg(){
		$query = $this->db->query("SELECT
																  SUM(IF(workshop_plantation_pg.`pg` = 'PG1' AND workshop_plantation_pg.`category` = 'GOLD', 1, 0)) AS gold_pg1,
																  SUM(IF(workshop_plantation_pg.`pg` = 'PG2' AND workshop_plantation_pg.`category` = 'GOLD', 1, 0)) AS gold_pg2,
																  SUM(IF(workshop_plantation_pg.`pg` = 'PG3' AND workshop_plantation_pg.`category` = 'GOLD', 1, 0)) AS gold_pg3,
																  SUM(IF(workshop_plantation_pg.`pg` = 'PG1' AND workshop_plantation_pg.`category` = 'SILVER', 1, 0)) AS silver_pg1,
																  SUM(IF(workshop_plantation_pg.`pg` = 'PG2' AND workshop_plantation_pg.`category` = 'SILVER', 1, 0)) AS silver_pg2,
																  SUM(IF(workshop_plantation_pg.`pg` = 'PG3' AND workshop_plantation_pg.`category` = 'SILVER', 1, 0)) AS silver_pg3,
																  SUM(IF(workshop_plantation_pg.`pg` = 'PG1' AND workshop_plantation_pg.`category` = 'BRONZE', 1, 0)) AS bronze_pg1,
																  SUM(IF(workshop_plantation_pg.`pg` = 'PG2' AND workshop_plantation_pg.`category` = 'BRONZE', 1, 0)) AS bronze_pg2,
																  SUM(IF(workshop_plantation_pg.`pg` = 'PG3' AND workshop_plantation_pg.`category` = 'BRONZE', 1, 0)) AS bronze_pg3
																FROM
																  workshop_plantation_pg");

		return $query->row_array();
	}
	function get_jabatan(){
		$query = $this->db->query("SELECT
																	workshop_plantation_pg.`urutan`,
																  workshop_plantation_pg.`jabatan`
																FROM
																  workshop_plantation_pg
																GROUP BY workshop_plantation_pg.`jabatan`
																ORDER BY workshop_plantation_pg.`urutan` ASC");

		return $query->result();
	}
	function get_jabatan_urutan($urutan){
		$query = $this->db->query("SELECT
																  DISTINCT(workshop_plantation_pg.`jabatan`)
																FROM
																  workshop_plantation_pg
																WHERE workshop_plantation_pg.`urutan` = '$urutan'");

		return $query->row_array();
	}
	function get_jabatan_jabatan($jabatan){
		$query = $this->db->query("SELECT
																  DISTINCT(workshop_plantation_pg.`urutan`)
																FROM
																  workshop_plantation_pg
																WHERE workshop_plantation_pg.`jabatan` = '$jabatan'");

		return $query->row_array();
	}
	function get_poin_jabatan($jabatan){
		$query = $this->db->query("SELECT
																  MAX(IF(workshop_plantation_pg.`pg` = 'PG1', workshop_plantation_pg.`category`, NULL)) AS pg1,
																  MAX(IF(workshop_plantation_pg.`pg` = 'PG2', workshop_plantation_pg.`category`, NULL)) AS pg2,
																  MAX(IF(workshop_plantation_pg.`pg` = 'PG3', workshop_plantation_pg.`category`, NULL)) AS pg3
																FROM
																  workshop_plantation_pg
																WHERE workshop_plantation_pg.`jabatan` = '$jabatan'");

		return $query->row_array();
	}
	function get_poin_jabatan_detil($jabatan, $category, $jenis){
		$query = $this->db->query("SELECT
																  workshop_plantation_detil.*
																FROM
																  workshop_plantation_detil
																WHERE workshop_plantation_detil.`jabatan` = '$jabatan'
																  AND workshop_plantation_detil.`category` = '$category'
																  AND workshop_plantation_detil.`jenis` = '$jenis'");

		return $query->result();
	}
}
