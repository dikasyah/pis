<?php

class Produksi_model extends CI_Model
{

	function get_produksi_code($lokasi, $status){
		$query = $this->db->query("SELECT
                                  *
                                FROM
                                  produksi
                                WHERE lokasi = '$lokasi'
																  AND status = '$status'");

		return $query->row_array();
	}
	function get_produksi_t1_code($lokasi, $status){
		$query = $this->db->query("SELECT
                                  *
                                FROM
                                  produksi_t1
                                WHERE lokasi = '$lokasi'
																  AND status = '$status'");

		return $query->row_array();
	}

	function get_standart_produksi_code($kelas){
		$query = $this->db->query("SELECT
																  *
																FROM
																  help_standart_panen
																WHERE kelas = '$kelas'");

		return $query->row_array();
	}

	function get_produksi_all(){
		$query = $this->db->query("SELECT
                                  *
                                FROM
                                  produksi");

		return $query->result();
	}
	function get_produksi_t1_all(){
		$query = $this->db->query("SELECT
                                  *
                                FROM
                                  produksi_t1");

		return $query->result();
	}

	function get_produksi_wilayah($wilayah){
		$query = $this->db->query("SELECT
																  help_lokasi_aktif.`lokasi_aktif` AS lokasi,
																  SUBSTRING(lokasi.`status`, 1, 4) AS status,
																  lokasi.`luas`,
																  produksi.`real_dan_sisa_rencana_tonase` AS tonase,
																  produksi.`real_dan_sisa_rencana_yield` AS yield
																FROM
																  lokasi,
																  help_lokasi_aktif
																  LEFT JOIN produksi
																    ON help_lokasi_aktif.`lokasi_aktif` = produksi.`lokasi`
																WHERE help_lokasi_aktif.`wilayah` = '$wilayah'
																  AND help_lokasi_aktif.`lokasi_aktif` = lokasi.`lokasi`");

		return $query->result();
	}
	function get_produksi_t1_wilayah($wilayah){
		$query = $this->db->query("SELECT
																  help_lokasi_aktif.`lokasi_aktif` AS lokasi,
																  SUBSTRING(lokasi.`status`, 1, 4) AS status,
																  lokasi.`luas`,
																  produksi_t1.`real_dan_sisa_rencana_tonase` AS tonase,
																  produksi_t1.`real_dan_sisa_rencana_yield` AS yield
																FROM
																  lokasi,
																  help_lokasi_aktif
																  LEFT JOIN produksi_t1
																    ON help_lokasi_aktif.`lokasi_aktif` = produksi_t1.`lokasi`
																WHERE help_lokasi_aktif.`wilayah` = '$wilayah'
																  AND help_lokasi_aktif.`lokasi_aktif` = lokasi.`lokasi`");

		return $query->result();
	}

	function get_produksi_pg($pg){
		$query = $this->db->query("SELECT
																  help_lokasi_aktif.`lokasi_aktif` AS lokasi,
																  SUBSTRING(lokasi.`status`, 1, 4) AS status,
																  lokasi.`luas`,
																  produksi.`real_dan_sisa_rencana_tonase` AS tonase,
																  produksi.`real_dan_sisa_rencana_yield` AS yield
																FROM
																  lokasi,
																  help_lokasi_aktif
																  LEFT JOIN produksi
																    ON help_lokasi_aktif.`lokasi_aktif` = produksi.`lokasi`
																WHERE help_lokasi_aktif.`pg` = '$pg'
																  AND help_lokasi_aktif.`lokasi_aktif` = lokasi.`lokasi`");

		return $query->result();
	}
	function get_produksi_t1_pg($pg){
		$query = $this->db->query("SELECT
																  help_lokasi_aktif.`lokasi_aktif` AS lokasi,
																  SUBSTRING(lokasi.`status`, 1, 4) AS status,
																  lokasi.`luas`,
																  produksi_t1.`real_dan_sisa_rencana_tonase` AS tonase,
																  produksi_t1.`real_dan_sisa_rencana_yield` AS yield
																FROM
																  lokasi,
																  help_lokasi_aktif
																  LEFT JOIN produksi_t1
																    ON help_lokasi_aktif.`lokasi_aktif` = produksi_t1.`lokasi`
																WHERE help_lokasi_aktif.`pg` = '$pg'
																  AND help_lokasi_aktif.`lokasi_aktif` = lokasi.`lokasi`");

		return $query->result();
	}

	function get_luas_tonase_produksi_wilayah($wilayah, $jenis){
		switch ($jenis) {
			case 'NS':
				$status = '';
				break;
			case 'NSFC':
				$status = 'AND produksi.`status` = "NSFC"';
				break;
			case 'NSSC':
				$status = 'AND produksi.`status` = "NSSC"';
				break;
		}

		$query = $this->db->query("SELECT
															  SUM(produksi.`real_dan_sisa_rencana_luas`) AS luas,
															  SUM(produksi.`real_dan_sisa_rencana_tonase`) AS tonase
															FROM
															  lokasi,
															  produksi
															WHERE lokasi.`lokasi` = produksi.`lokasi`
															  AND lokasi.`kebun` = '$wilayah'
															  $status");

		return $query->row_array();
	}
	function get_luas_tonase_produksi_t1_wilayah($wilayah, $jenis){
		switch ($jenis) {
			case 'NS':
				$status = '';
				break;
			case 'NSFC':
				$status = 'AND produksi_t1.`status` = "NSFC"';
				break;
			case 'NSSC':
				$status = 'AND produksi_t1.`status` = "NSSC"';
				break;
		}

		$query = $this->db->query("SELECT
															  SUM(produksi_t1.`real_dan_sisa_rencana_luas`) AS luas,
															  SUM(produksi_t1.`real_dan_sisa_rencana_tonase`) AS tonase
															FROM
															  lokasi,
															  produksi_t1
															WHERE lokasi.`lokasi` = produksi_t1.`lokasi`
															  AND lokasi.`kebun` = '$wilayah'
															  $status");

		return $query->row_array();
	}

	function get_luas_tonase_produksi_raport($wilayah){
		$query = $this->db->query("SELECT
																  produksi.`status`,
  																CONCAT('B', MONTH(produksi.`real_dan_sisa_rencana_tgl_selesai_panen`)) AS bulan,
																  SUM(produksi.`real_dan_sisa_rencana_luas`) AS luas,
																  SUM(produksi.`real_dan_sisa_rencana_tonase`) AS tonase
																FROM
																  lokasi,
																  produksi
																WHERE lokasi.`lokasi` = produksi.`lokasi`
																  AND lokasi.`kebun` = '$wilayah'
																GROUP BY produksi.`status`,
																  MONTH(produksi.`real_dan_sisa_rencana_tgl_selesai_panen`)");

		return $query->result();
	}
	function get_luas_tonase_produksi_t1_raport($wilayah){
		$query = $this->db->query("SELECT
																  produksi_t1.`status`,
  																CONCAT('B', MONTH(produksi_t1.`real_dan_sisa_rencana_tgl_selesai_panen`)) AS bulan,
																  SUM(produksi_t1.`real_dan_sisa_rencana_luas`) AS luas,
																  SUM(produksi_t1.`real_dan_sisa_rencana_tonase`) AS tonase
																FROM
																  lokasi,
																  produksi_t1
																WHERE lokasi.`lokasi` = produksi_t1.`lokasi`
																  AND lokasi.`kebun` = '$wilayah'
																GROUP BY produksi_t1.`status`,
																  MONTH(produksi_t1.`real_dan_sisa_rencana_tgl_selesai_panen`)");

		return $query->result();
	}

	function get_luas_tonase_produksi_raport_t1($wilayah){
		$query = $this->db->query("SELECT
																  SUBSTRING(lokasi.`status`, 1, 4) AS status,
																  CONCAT('B', MONTH(
																        IF(ISNULL(lokasi.`tgl_panen_rencana`),
																          IF(ISNULL(lokasi.`tgl_panen_standard`),
																            IF(SUBSTRING(lokasi.`status`, 1, 4) = 'NSSC',
																              lokasi.`tgl_mulai_rawat` + INTERVAL 13 MONTH,
																              IF(SUBSTRING(lokasi.`bibit`, 7, 1) = 'K',
																                lokasi.`tgl_mulai_rawat` + INTERVAL 19 MONTH,
																                IF(SUBSTRING(lokasi.`bibit`, 7, 1) = 'S',
																                  lokasi.`tgl_mulai_rawat` + INTERVAL 17 MONTH,
																                  lokasi.`tgl_mulai_rawat` + INTERVAL 15 MONTH
																                )
																              )
																            ), lokasi.`tgl_panen_rencana`
																          ), lokasi.`tgl_panen_standard`
																        )
																    )
																  ) AS bulan,
																  SUM(lokasi.`luas`) AS luas,
																  SUM(lokasi.`luas` * std_yield.`yield`) AS tonase
																FROM
																  std_yield,
																  konstanta,
																  lokasi,
																  help_lokasi_aktif
																WHERE lokasi.`lokasi` = help_lokasi_aktif.`lokasi_aktif`
																  AND lokasi.`kebun` = '$wilayah'
																  AND konstanta.`jenis` = 'TGL_TARIK_DATA'
																  AND (SUBSTRING(lokasi.`status`, 1, 4) = 'NSFC'
																    OR SUBSTRING(lokasi.`status`, 1, 4) = 'NSSC')
																  AND std_yield.`jenis` = SUBSTRING(lokasi.`status`, 1, 4)
																  AND YEAR(
																      IF(ISNULL(lokasi.`tgl_panen_rencana`),
																        IF(ISNULL(lokasi.`tgl_panen_standard`),
																          IF(SUBSTRING(lokasi.`status`, 1, 4) = 'NSSC',
																            lokasi.`tgl_mulai_rawat` + INTERVAL 13 MONTH,
																            IF(SUBSTRING(lokasi.`bibit`, 7, 1) = 'K',
																              lokasi.`tgl_mulai_rawat` + INTERVAL 19 MONTH,
																              IF(SUBSTRING(lokasi.`bibit`, 7, 1) = 'S',
																                lokasi.`tgl_mulai_rawat` + INTERVAL 17 MONTH,
																                lokasi.`tgl_mulai_rawat` + INTERVAL 15 MONTH
																              )
																            )
																          ), lokasi.`tgl_panen_rencana`
																        ), lokasi.`tgl_panen_standard`
																      )
																  ) = YEAR(konstanta.`nilai` + INTERVAL 1 YEAR)
																GROUP BY SUBSTRING(lokasi.`status`, 1, 4),
																  MONTH(
																      IF(ISNULL(lokasi.`tgl_panen_rencana`),
																        IF(ISNULL(lokasi.`tgl_panen_standard`),
																          IF(SUBSTRING(lokasi.`status`, 1, 4) = 'NSSC',
																            lokasi.`tgl_mulai_rawat` + INTERVAL 13 MONTH,
																            IF(SUBSTRING(lokasi.`bibit`, 7, 1) = 'K',
																              lokasi.`tgl_mulai_rawat` + INTERVAL 19 MONTH,
																              IF(SUBSTRING(lokasi.`bibit`, 7, 1) = 'S',
																                lokasi.`tgl_mulai_rawat` + INTERVAL 17 MONTH,
																                lokasi.`tgl_mulai_rawat` + INTERVAL 15 MONTH
																              )
																            )
																          ), lokasi.`tgl_panen_rencana`
																        ), lokasi.`tgl_panen_standard`
																      )
																  )");

		return $query->result();
	}

	function get_rank_wilayah($wilayah, $rank){
		switch ($rank) {
			case 'min':
				$cat = 'ASC';
				break;
			case 'max':
				$cat = 'DESC';
				break;
		}

		$query = $this->db->query("SELECT
																  *
																FROM
																  perlocation
																WHERE perlocation.`wilayah` = '$wilayah'
																ORDER BY perlocation.`deviasi_rp_per_kg` $cat
																LIMIT 3");

		return $query->result();
	}

	function get_rank_pg($pg, $rank){
		switch ($rank) {
			case 'min':
				$cat = 'ASC';
				break;
			case 'max':
				$cat = 'DESC';
				break;
		}

		$query = $this->db->query("SELECT
																  *
																FROM
																  perlocation
																WHERE perlocation.`pg` = '$pg'
																ORDER BY perlocation.`deviasi_rp_per_kg` $cat
																LIMIT 3");

		return $query->result();
	}

	function get_prediksi_biaya_wilayah($wilayah, $tahun){
		$query = $this->db->query("SELECT
																  raport_wilayah.`tahun`,
																  SUM(raport_wilayah.`real`) AS pbreal,
																  SUM(raport_wilayah.`forecast`) AS pbforecast
																FROM
																  raport_wilayah
																WHERE raport_wilayah.`wilayah` = '$wilayah'
																  AND raport_wilayah.`status` = 'NS'
																  AND raport_wilayah.`bulan` = 'Total'
																  AND raport_wilayah.`charge` = 'Actual'
																  AND raport_wilayah.`tahun` = '$tahun'
																GROUP BY raport_wilayah.`tahun`");

		return $query->row_array();
	}
	function get_prediksi_biaya_pg($pg, $tahun){
		$query = $this->db->query("SELECT
																  raport_wilayah.`tahun`,
																  SUM(raport_wilayah.`real`) AS pbreal,
																  SUM(raport_wilayah.`forecast`) AS pbforecast
																FROM
																  raport_wilayah
																WHERE raport_wilayah.`pg` = '$pg'
																  AND raport_wilayah.`status` = 'NS'
																  AND raport_wilayah.`bulan` = 'Total'
																  AND raport_wilayah.`charge` = 'Actual'
																  AND raport_wilayah.`tahun` = '$tahun'
																GROUP BY raport_wilayah.`tahun`");

		return $query->row_array();
	}

	function get_prediksi_biaya_luas_tonase_wilayah($wilayah, $tahun){
		$query = $this->db->query("SELECT
																  luas_tonase_wilayah.`tahun`,
																  SUM(luas_tonase_wilayah.`luas`) AS pbluas,
																  SUM(luas_tonase_wilayah.`tonase`) AS pbtonase
																FROM
																  luas_tonase_wilayah
																WHERE luas_tonase_wilayah.`wilayah` = '$wilayah'
																  AND luas_tonase_wilayah.`status` = 'NS'
																  AND luas_tonase_wilayah.`bulan` = 'Total'
																  AND luas_tonase_wilayah.`tahun` = '$tahun'
																GROUP BY luas_tonase_wilayah.`tahun`");

		return $query->row_array();
	}
	function get_prediksi_biaya_luas_tonase_pg($pg, $tahun){
		$query = $this->db->query("SELECT
																  luas_tonase_wilayah.`tahun`,
																  SUM(luas_tonase_wilayah.`luas`) AS pbluas,
																  SUM(luas_tonase_wilayah.`tonase`) AS pbtonase
																FROM
																  luas_tonase_wilayah
																WHERE luas_tonase_wilayah.`pg` = '$pg'
																  AND luas_tonase_wilayah.`status` = 'NS'
																  AND luas_tonase_wilayah.`bulan` = 'Total'
																  AND luas_tonase_wilayah.`tahun` = '$tahun'
																GROUP BY luas_tonase_wilayah.`tahun`");

		return $query->row_array();
	}

	function get_hpp_luas_tonase_wilayah($wilayah, $status){
		$query = $this->db->query("SELECT
																  SUM(produksi.`real_dan_sisa_rencana_luas`) AS luas,
																  SUM(produksi.`real_dan_sisa_rencana_tonase`) AS tonase
																FROM
																  produksi,
																  lokasi
																WHERE produksi.`lokasi` = lokasi.`lokasi`
																  AND produksi.`keterangan` = 'selesai'
																  AND lokasi.`kebun` LIKE '$wilayah%'
																	AND produksi.`status` = '$status'");

		return $query->row_array();
	}
}
