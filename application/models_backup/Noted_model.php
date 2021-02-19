<?php

class Noted_model extends CI_Model
{

	function get_noted_index($index, $wilayah){
		$query = $this->db->query("SELECT
																  note.*,
																  IF(note.`pic_quest` = '$index', 1, IF(note.`pic_issue` LIKE '%$index%', 2, 3)) AS category
																FROM
																  note
																WHERE (note.`pic_quest` = '$index'
																   OR note.`pic_issue` LIKE '%$index%'
																   OR note.`pic_info` LIKE '%$index%')
																   OR ('10011823' = '$index'
																   OR '05285' = '$index'
																   OR '10007809' = '$index'
																   OR '04660' = '$index'
																   OR '10003609' = '$index'
																   OR '01334' = '$index'
																   OR '10011616' = '$index'
																   OR '10006377' = '$index'
   														 		 OR note.`wilayah` = '$wilayah')
 																ORDER BY note.`tgl_start` DESC");

		return $query->result();
	}

	function get_pic_code($pg, $wilayah, $index){
		$query = $this->db->query("SELECT
																  user.`index`,
																  user.`nama`,
																  user.`deskripsi`
																FROM
																  user
																WHERE (user.`code` = '$pg'
																   OR user.`code` = '$wilayah')
																	AND user.`index` != '$index'");

		return $query->result();
	}

	function get_detil_lokasi_note_code($lokasi){
		$query = $this->db->query("SELECT
																  plantation_group.`code` AS pg,
																  wilayah.`code` AS wilayah,
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
	function get_note_comment($id){
		$query = $this->db->query("SELECT
																  note_comment.*,
																  user.`nama`,
																  user.`deskripsi`
																FROM
																  note_comment
																  LEFT JOIN user
																  ON note_comment.`pic` = user.`index`
																WHERE note_comment.`id_note` = '$id'
																ORDER BY note_comment.`tgl_start` ASC");

		return $query->result();
	}

	function set_note_lokasi($pg, $wilayah, $lokasi, $header, $quest, $foto, $video, $pic_quest, $pic_issue, $pic_info, $tgl_start, $notif_quest_nama, $notif_issue_nama, $foto_pic){
		$query = $this->db->query("INSERT INTO note (
																	  pg,
																	  wilayah,
																	  lokasi,
																	  header,
																	  quest,
																	  foto,
																	  video,
																	  pic_quest,
																	  pic_issue,
																	  pic_info,
																	  tgl_start,
																	  notif_issue,
																	  notif_info,
																		notif_quest_nama,
																	  notif_issue_nama,
																		foto_pic
																	) VALUE (
																	  '$pg',
																	  '$wilayah',
																	  '$lokasi',
																	  '$header',
																	  '$quest',
																	  '$foto',
																	  '$video',
																	  '$pic_quest',
																	  '$pic_issue',
																	  '$pic_info',
																	  CURRENT_TIMESTAMP,
																	  '$pic_issue',
																	  '$pic_info',
																		'$notif_quest_nama',
																		'$notif_issue_nama',
																		'$foto_pic'
																	)");

		return true;
	}

	function update_note_lokasi($id, $comment, $foto, $video, $pic, $foto_pic, $notif_issue, $notif_info, $tgl_close){
		$query = $this->db->query("INSERT INTO note_comment (
																  id_note,
																  comment,
																  foto,
																  video,
																  pic,
																  tgl_start,
																  foto_pic
																) VALUE (
																  '$id',
																  '$comment',
																  '$foto',
																  '$video',
																  '$pic',
																  CURRENT_TIMESTAMP,
																  '$foto_pic'
																)");

		$query = $this->db->query("UPDATE
																  note
																SET
																  note.`notif_issue` = '$notif_issue',
																  note.`notif_info` = '$notif_info',
																	note.`tgl_close` = '$tgl_close'
																WHERE note.id = '$id'");

		return true;
	}
	function close_note($id){
		$query = $this->db->query("UPDATE
																  note
																SET
																  note.`status` = '1',
																  note.`tgl_close` = CURRENT_TIMESTAMP
																WHERE note.`id` = '$id'");

		return true;
	}

	function delete_note_lokasi($id){
		$query = $this->db->query("DELETE FROM
																  note
																WHERE note.`id` = '$id'");

		return true;
	}
	function delete_note_comment_lokasi($id){
		$query = $this->db->query("DELETE FROM
																  note_comment
																WHERE note_comment.`id` = '$id'");

		return true;
	}

	function get_notification($index){
		$query = $this->db->query("SELECT
																  SUM(IF(note.`notif_info` LIKE '%$index%', 1, 0)) AS info,
																  SUM(IF(note.`notif_issue` LIKE '%$index%', 1, 0)) AS issue
																FROM
																  note
																WHERE note.`notif_info` LIKE '%$index%'
																   OR note.`notif_issue` LIKE '%$index%'");

		return $query->row_array();
	}
	function get_push_notification($index){
		$query = $this->db->query("SELECT
																  note.`id`,
																  IF(note.`notif_info` LIKE '%$index, %', REPLACE(notif_info, '$index, ', ''), REPLACE(notif_info, '$index', '')) AS info,
																  IF(note.`notif_issue` LIKE '%$index, %', REPLACE(notif_issue, '$index, ', ''), REPLACE(notif_issue, '$index', '')) AS issue
																FROM
																  note
																WHERE note.`notif_info` LIKE '%$index%'
																   OR note.`notif_issue` LIKE '%$index%'");

		return $query->result();
	}
	function set_notification($id, $info, $issue){
		$query = $this->db->query("UPDATE
																  note
																SET
																  note.`notif_info` = '$info',
																  note.`notif_issue` = '$issue'
																WHERE note.`id` = '$id'");

		return true;
	}
}
