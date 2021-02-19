<?php

class BeratTanaman_model extends CI_Model
{

	function get_berat_tanaman_code_desc($lokasi){
		$query = $this->db->query("SELECT
																  *
																FROM
																  berat_tanaman
																WHERE lokasi = '$lokasi'
																ORDER BY tgl_pengamatan DESC
																LIMIT 1");

		return $query->row_array();
	}

	function get_berat_tanaman($lokasi){
		$query = $this->db->query("SELECT
																  Rata2_BT
																FROM
																  berat_tanaman
																WHERE lokasi = '$lokasi'
																ORDER BY tgl_pengamatan ASC");

		return $query->result();
	}

	function get_rata_berat_tanaman($lokasi, $jenis){
		switch ($jenis) {
			case 'F-':
				$bulan = '';
				$kondisi = '<=';
				$sort = 'ORDER BY tgl_pengamatan DESC';
				$limit = '7';
				$not_f = "AND MONTH(berat_tanaman.`tgl_pengamatan`) != MONTH(
								    IF(
								      ISNULL(lokasi.`tgl_forcing_realisasi`),
								      IF(
								        ISNULL(lokasi.`tgl_forcing_rencana`),
								        IF(
								          SUBSTRING(lokasi.`status`, 1, 4) = 'NSFC',
								          lokasi.`tgl_mulai_rawat` + INTERVAL help_standart_forcing.`bulan` MONTH,
								          lokasi.`tgl_mulai_rawat` + INTERVAL '8' MONTH
								        ),
								        lokasi.`tgl_forcing_rencana`
								      ),
								      lokasi.`tgl_forcing_realisasi`
								    )
								  )";
				break;
			case 'F+':
				$bulan = '';
				$kondisi = '>';
				$sort = 'ORDER BY tgl_pengamatan ASC';
				$limit = '2';
				$not_f = '';
				break;
			case 'F':
				$bulan = 'MONTH';
				$kondisi = '=';
				$sort = '';
				$limit = '1';
				$not_f = '';
				break;
		}
		$query = $this->db->query("SELECT
																  berat_tanaman.`tgl_pengamatan`,
																  berat_tanaman.`Rata2_BT` AS berat_tanaman
																FROM
																  berat_tanaman,
																  lokasi,
																  help_standart_forcing
																WHERE berat_tanaman.`lokasi` = '$lokasi'
																  AND $bulan(berat_tanaman.`tgl_pengamatan`) $kondisi $bulan(IF(
																    ISNULL(lokasi.`tgl_forcing_realisasi`),
																    IF(
																      ISNULL(lokasi.`tgl_forcing_rencana`),
																      IF(
																        SUBSTRING(lokasi.`status`, 1, 4) = 'NSFC',
																        lokasi.`tgl_mulai_rawat` + INTERVAL help_standart_forcing.`bulan` MONTH,
																        lokasi.`tgl_mulai_rawat` + INTERVAL '8' MONTH
																      ),
																      lokasi.`tgl_forcing_rencana`
																    ),
																    lokasi.`tgl_forcing_realisasi`
																  ))
																  AND lokasi.`lokasi` = berat_tanaman.`lokasi`
																  AND SUBSTRING(lokasi.`bibit`, 7, 1) = help_standart_forcing.`kelas`
																	$not_f
																$sort
																LIMIT $limit");

		return $query->result();
	}
}
