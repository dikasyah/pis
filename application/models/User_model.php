<?php

class User_model extends CI_Model
{

	function get_user_code($username, $password){
		$query = $this->db->query("SELECT
																  user.*
																FROM
																  user
																WHERE user.`username` = ".$this->db->escape($username)."
																  AND user.`password` = ".$this->db->escape($password));

		return $query->row_array();
	}
	function get_user_index($index){
		$query = $this->db->query("SELECT
																  user.*
																FROM
																  user
																WHERE user.`index` = '$index'");

		return $query->row_array();
	}
	function set_pass_user_code($index, $password){
		$query = $this->db->query("UPDATE user
																SET
																  user.`password` = '$password'
																WHERE user.`index` = '$index'");

		return true;
	}
	function set_bio_user_code($index, $tempat_lahir, $tgl_lahir, $alamat, $no_hp){
		$query = $this->db->query("UPDATE user
																SET
																  user.`tempat_lahir` = '$tempat_lahir',
																  user.`tgl_lahir` = '$tgl_lahir',
																  user.`alamat` = '$alamat',
																  user.`no_hp` = '$no_hp'
																WHERE user.`index` = '$index'");

		return true;
	}
	function set_foto_user_code($index, $foto){
		$query = $this->db->query("UPDATE user
																SET
																  user.`foto` = '$foto'
																WHERE user.`index` = '$index'");

		return true;
	}
	function set_bg_user_code($index, $bg){
		$query = $this->db->query("UPDATE user
																SET
																  user.`background` = '$bg'
																WHERE user.`index` = '$index'");

		return true;
	}
	function set_history_login($index){
		$query = $this->db->query("UPDATE
																  user_history
																SET
																  user_history.`status` = '1',
																  user_history.`logout` = CURRENT_TIMESTAMP
																WHERE user_history.`index` = '$index'
																  AND user_history.`status` = '0'");

		return true;
	}
	function reload_history_login($index){
		$query = $this->db->query("UPDATE
																  user_history
																SET
																  user_history.`logout` = CURRENT_TIMESTAMP() + INTERVAL 5 MINUTE
																WHERE user_history.`index` = '$index'
																  AND user_history.`status` = '0'");

		return true;
	}
	function close_history_login($index){
		$query = $this->db->query("UPDATE
																  user_history
																SET
																  user_history.`status` = '1'
																WHERE user_history.`index` = '$index'
																  AND user_history.`status` = '0'");

		return true;
	}
	function get_history_login($index){
		$query = $this->db->query("SELECT
																  user_history.*
																FROM
																  user_history
																WHERE user_history.`index` = '$index'
																  AND user_history.`status` = '0'");

		return $query->row_array();
	}
	function insert_history_login($index){
		$query = $this->db->query("INSERT INTO user_history (user_history.`index`, user_history.`logout`) VALUE ('$index', CURRENT_TIMESTAMP() + INTERVAL 5 MINUTE)");

		return true;
	}

	function get_history_login_index($jabatan, $code, $tgl){
		$query = $this->db->query("SELECT
																  user.`index`,
																  user.`nama`,
																  user.`deskripsi`,
																	ROUND(SUM(
																    TIME_TO_SEC(user_history.`logout`) - TIME_TO_SEC(user_history.`login`)
																  ) / 3600 / 2, 2) AS total
																FROM
																  user
																  LEFT OUTER JOIN user_history
																    ON user.`index` = user_history.`index`
																   AND (DATE(user_history.`login`) = DATE('$tgl')
																    OR DATE(user_history.`login`) = SUBDATE(DATE('$tgl'), 1))
																WHERE user.`deskripsi` = '$jabatan'
																  ");

		return $query->row_array();
	}
	function get_history_login_all_index($jabatan, $code, $tgl){
		$query = $this->db->query("SELECT
																  user.`index`,
																  user.`nama`,
																  user.`deskripsi`,
																	ROUND(SUM(
																    TIME_TO_SEC(user_history.`logout`) - TIME_TO_SEC(user_history.`login`)
																  ) / 3600, 2) AS total
																FROM
																  `user`
																  LEFT OUTER JOIN user_history
																    ON user.`index` = user_history.`index`
																   AND (DATE(user_history.`login`) BETWEEN DATE(CONCAT(YEAR('$tgl'), '-', MONTH('$tgl'), '-01'))
																    AND DATE('$tgl'))
																WHERE user.`deskripsi` = '$jabatan'");

		return $query->row_array();
	}
}
