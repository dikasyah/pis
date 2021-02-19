<?php

class Drainase_model extends CI_Model
{

	function get_drainase_code($lokasi){
		$query = $this->db->query("SELECT
                                  *
                                FROM
                                  drainase
                                WHERE lokasi = '$lokasi'");

		return $query->row_array();
	}

	function get_drainase_all(){
		$query = $this->db->query("SELECT
                                  *
                                FROM
                                  drainase");

		return $query->result();
	}
}
