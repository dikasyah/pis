<?php

class Target_model extends CI_Model
{

	function get_target_wilayah($wilayah, $jenis){
		switch ($jenis) {
			case 'NS':
				$status = "";
				break;
			case 'NSFC':
				$status = "AND target.`status` = 'NSFC'";
				break;
			case 'NSSC':
				$status = "AND target.`status` = 'NSSC'";
				break;
		}
		$query = $this->db->query("SELECT
																  SUM(target.`ZN01`) / SUM(target.`luas`) AS ZN01,
																  SUM(target.`ZN02`) / SUM(target.`luas`) AS ZN02,
																  SUM(target.`ZN03`) / SUM(target.`luas`) AS ZN03,
																  SUM(target.`ZN04`) / SUM(target.`luas`) AS ZN04,
																  SUM(target.`ZN05`) / SUM(target.`luas`) AS ZN05,
																  SUM(target.`ZN06`) / SUM(target.`luas`) AS ZN06,
																  SUM(target.`ZN07`) / SUM(target.`luas`) AS ZN07,
																  SUM(target.`ZN08`) / SUM(target.`luas`) AS ZN08,
																  SUM(target.`ZN09`) / SUM(target.`luas`) AS ZN09,
																  SUM(target.`ZN10`) / SUM(target.`luas`) AS ZN10,
																  SUM(target.`ZN11`) / SUM(target.`luas`) AS ZN11,
																  SUM(target.`ZN12`) / SUM(target.`luas`) AS ZN12,
																  SUM(target.`ZN13`) / SUM(target.`luas`) AS ZN13,
																  SUM(target.`ZN14`) / SUM(target.`luas`) AS ZN14,
																  SUM(target.`ZN15`) / SUM(target.`luas`) AS ZN15
																FROM
																  target
																WHERE target.`wilayah` = '$wilayah'
																  $status");

		return $query->row_array();
	}
	function get_target_pg($pg, $jenis){
		switch ($jenis) {
			case 'NS':
				$status = "";
				break;
			case 'NSFC':
				$status = "AND target.`status` = 'NSFC'";
				break;
			case 'NSSC':
				$status = "AND target.`status` = 'NSSC'";
				break;
		}
		$query = $this->db->query("SELECT
																  SUM(target.`ZN01`) / SUM(target.`luas`) AS ZN01,
																  SUM(target.`ZN02`) / SUM(target.`luas`) AS ZN02,
																  SUM(target.`ZN03`) / SUM(target.`luas`) AS ZN03,
																  SUM(target.`ZN04`) / SUM(target.`luas`) AS ZN04,
																  SUM(target.`ZN05`) / SUM(target.`luas`) AS ZN05,
																  SUM(target.`ZN06`) / SUM(target.`luas`) AS ZN06,
																  SUM(target.`ZN07`) / SUM(target.`luas`) AS ZN07,
																  SUM(target.`ZN08`) / SUM(target.`luas`) AS ZN08,
																  SUM(target.`ZN09`) / SUM(target.`luas`) AS ZN09,
																  SUM(target.`ZN10`) / SUM(target.`luas`) AS ZN10,
																  SUM(target.`ZN11`) / SUM(target.`luas`) AS ZN11,
																  SUM(target.`ZN12`) / SUM(target.`luas`) AS ZN12,
																  SUM(target.`ZN13`) / SUM(target.`luas`) AS ZN13,
																  SUM(target.`ZN14`) / SUM(target.`luas`) AS ZN14,
																  SUM(target.`ZN15`) / SUM(target.`luas`) AS ZN15
																FROM
																  target
																WHERE target.`pg` = '$pg'
																  $status");

		return $query->row_array();
	}
	function get_target_lokasi($status){
		if($status != 'NS'){
			$filter_status = "WHERE target.`status` = '$status'";
		}
		else{
			$filter_status = "";
		}
		$query = $this->db->query("SELECT
																  SUM(target.`ZN01`) / SUM(target.`luas`) AS ZN01,
																  0 AS ZN02,
																  SUM(target.`ZN02`) / SUM(target.`luas`) AS ZN02X,
																  SUM(target.`ZN03`) / SUM(target.`luas`) AS ZN03,
																  SUM(target.`ZN04`) / SUM(target.`luas`) AS ZN04,
																  SUM(target.`ZN05`) / SUM(target.`luas`) AS ZN05,
																  SUM(target.`ZN06`) / SUM(target.`luas`) AS ZN06,
																  SUM(target.`ZN07`) / SUM(target.`luas`) AS ZN07,
																  SUM(target.`ZN08`) / SUM(target.`luas`) AS ZN08,
																  SUM(target.`ZN09`) / SUM(target.`luas`) AS ZN09,
																  SUM(target.`ZN10`) / SUM(target.`luas`) AS ZN10,
																  SUM(target.`ZN11`) / SUM(target.`luas`) AS ZN11,
																  SUM(target.`ZN12`) / SUM(target.`luas`) AS ZN12,
																  SUM(target.`ZN13`) / SUM(target.`luas`) AS ZN13,
																  SUM(target.`ZN14`) / SUM(target.`luas`) AS ZN14,
																  SUM(target.`ZN15`) / SUM(target.`luas`) AS ZN15
																FROM
																  target
																$filter_status");

		return $query->row_array();
	}
}
