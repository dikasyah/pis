<?php

class BeratTanaman_model extends CI_Model
{

	function get_berat_tanaman_code_desc($lokasi){
		$query = $this->db->query("SELECT
																  *
																FROM
																  berat_tanaman,
																	lokasi
																WHERE lokasi.`lokasi` = berat_tanaman.`lokasi`
																  AND berat_tanaman.`tgl_pengamatan` >= lokasi.`tgl_mulai_rawat`
																  AND berat_tanaman.`lokasi` = '$lokasi'
																ORDER BY berat_tanaman.`tgl_pengamatan` DESC
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
																  AND berat_tanaman.`tgl_pengamatan` >= lokasi.`tgl_mulai_rawat`
																  AND SUBSTRING(lokasi.`bibit`, 7, 1) = help_standart_forcing.`kelas`
																	$not_f
																$sort
																LIMIT $limit");

		return $query->result();
	}

	function get_berat_tanaman_forcing($lokasi, $tgl_forcing){
		$query = $this->db->query("SELECT
																	MAX(IF(berat_tanaman.`tgl_pengamatan` >= '$tgl_forcing' - INTERVAL 8 MONTH, IF(berat_tanaman.`tgl_pengamatan` < '$tgl_forcing' - INTERVAL 7 MONTH, berat_tanaman.`Rata2_BT`, (NULL)), (NULL))) AS F1,
																  MAX(IF(berat_tanaman.`tgl_pengamatan` >= '$tgl_forcing' - INTERVAL 7 MONTH, IF(berat_tanaman.`tgl_pengamatan` < '$tgl_forcing' - INTERVAL 6 MONTH, berat_tanaman.`Rata2_BT`, (NULL)), (NULL))) AS F2,
																  MAX(IF(berat_tanaman.`tgl_pengamatan` >= '$tgl_forcing' - INTERVAL 6 MONTH, IF(berat_tanaman.`tgl_pengamatan` < '$tgl_forcing' - INTERVAL 5 MONTH, berat_tanaman.`Rata2_BT`, (NULL)), (NULL))) AS F3,
																  MAX(IF(berat_tanaman.`tgl_pengamatan` >= '$tgl_forcing' - INTERVAL 5 MONTH, IF(berat_tanaman.`tgl_pengamatan` < '$tgl_forcing' - INTERVAL 4 MONTH, berat_tanaman.`Rata2_BT`, (NULL)), (NULL))) AS F4,
																  MAX(IF(berat_tanaman.`tgl_pengamatan` >= '$tgl_forcing' - INTERVAL 4 MONTH, IF(berat_tanaman.`tgl_pengamatan` < '$tgl_forcing' - INTERVAL 3 MONTH, berat_tanaman.`Rata2_BT`, (NULL)), (NULL))) AS F5,
																  MAX(IF(berat_tanaman.`tgl_pengamatan` >= '$tgl_forcing' - INTERVAL 3 MONTH, IF(berat_tanaman.`tgl_pengamatan` < '$tgl_forcing' - INTERVAL 2 MONTH, berat_tanaman.`Rata2_BT`, (NULL)), (NULL))) AS F6,
																  MAX(IF(berat_tanaman.`tgl_pengamatan` >= '$tgl_forcing' - INTERVAL 2 MONTH, IF(berat_tanaman.`tgl_pengamatan` < '$tgl_forcing' - INTERVAL 1 MONTH, berat_tanaman.`Rata2_BT`, (NULL)), (NULL))) AS F7,
																  MAX(IF(berat_tanaman.`tgl_pengamatan` >= '$tgl_forcing' - INTERVAL 1 MONTH, IF(berat_tanaman.`tgl_pengamatan` < '$tgl_forcing' + INTERVAL 0 MONTH, berat_tanaman.`Rata2_BT`, (NULL)), (NULL))) AS F8,
																  MAX(IF(berat_tanaman.`tgl_pengamatan` >= '$tgl_forcing' + INTERVAL 0 MONTH, IF(berat_tanaman.`tgl_pengamatan` < '$tgl_forcing' + INTERVAL 1 MONTH, berat_tanaman.`Rata2_BT`, (NULL)), (NULL))) AS F9
																FROM
																  berat_tanaman
																WHERE berat_tanaman.`lokasi` = '$lokasi'");

		return $query->row_array();
	}

	function get_std_berat_tanaman($var, $jenis, $kelas){
		switch ($jenis) {
			case 'C':
				$jenis = 'CR';
			break;
			case 'S':
				$jenis = 'SC';
			break;
			default:
				$jenis = 'AN';
			break;
		}
		$query = $this->db->query("SELECT
																  std_berat_tanaman.*
																FROM
																  std_berat_tanaman
																WHERE std_berat_tanaman.`varietas` = '$var'
																  AND std_berat_tanaman.`jenis` = '$jenis'
																  AND std_berat_tanaman.`kelas` = '$kelas'");

		return $query->result();
	}

	function get_berat_tanaman_bulan_pm($w, $status, $jenis, $kelas, $tahun, $bulan, $umur, $type){
		if(substr($w, 0, 2) == 'PG'){
			if($w != 'PG'){
				$pg_wil = "perlocation_lokasi.`pg` = '$w'";
			}
			else{
				$pg_wil = "perlocation_lokasi.`pg` LIKE 'PG%'";
			}
		}
		else{
			$pg_wil = "perlocation_lokasi.`wilayah` = '$w'";
		}
		if($status != 'NS'){
			$option_status = "AND perlocation_lokasi.`status` = '$status'";
		}
		else{
			$option_status = "";
		}
		if($jenis != 'All'){
			$option_jenis = "AND perlocation_lokasi.`jenis` = '$jenis'";
		}
		else{
			$option_jenis = "";
		}
		if($kelas != 'All'){
			$option_kelas = "AND perlocation_lokasi.`kelas` = '$kelas'";
		}
		else{
			$option_kelas = "";
		}
		if($bulan != 'Total'){
			$option_bulan = "AND MONTH(perlocation_lokasi.`tgl_panen`) = '$bulan'";
		}
		else{
			$option_bulan = "";
		}
		if($umur != 'Total'){
			$option_umur = "AND perlocation_lokasi.`umur` = '$umur'";
		}
		else{
			$option_umur = "";
		}
		if($type == 'Panen'){
			$type = 'MONTH(perlocation_lokasi.`tgl_panen`) AS bulan';
		}
		else{
			$type = 'MONTH(perlocation_lokasi.`tgl_forcing`) AS bulan';
		}
		$query = $this->db->query("SELECT
																  berat_tanaman.`lokasi`,
																  MAX(berat_tanaman.`Rata2_BT`) AS berat_tanaman,
																  $type
																FROM
																  berat_tanaman,
																  perlocation_lokasi
																WHERE $pg_wil
																  AND berat_tanaman.`lokasi` = perlocation_lokasi.`lokasi`
																  AND berat_tanaman.`tgl_pengamatan` >= perlocation_lokasi.`tgl_perawatan`
																  AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																  $option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur
																GROUP BY berat_tanaman.`lokasi`");

		return $query->result();
	}
	function get_penyakit_wilayah_bulan_pm($w, $status, $jenis, $kelas, $tahun, $bulan, $umur){
		if(substr($w, 0, 2) == 'PG'){
			if($w != 'PG'){
				$pg_wil = "perlocation_lokasi.`pg` = '$w'";
			}
			else{
				$pg_wil = "perlocation_lokasi.`pg` LIKE 'PG%'";
			}
		}
		else{
			$pg_wil = "perlocation_lokasi.`wilayah` = '$w'";
		}
		if($status != 'NS'){
			$option_status = "AND perlocation_lokasi.`status` = '$status'";
		}
		else{
			$option_status = "";
		}
		if($jenis != 'All'){
			$option_jenis = "AND perlocation_lokasi.`jenis` = '$jenis'";
		}
		else{
			$option_jenis = "";
		}
		if($kelas != 'All'){
			$option_kelas = "AND perlocation_lokasi.`kelas` = '$kelas'";
		}
		else{
			$option_kelas = "";
		}
		if($bulan != 'Total'){
			$option_bulan = "AND MONTH(perlocation_lokasi.`tgl_panen`) = '$bulan'";
		}
		else{
			$option_bulan = "";
		}
		if($umur != 'Total'){
			$option_umur = "AND perlocation_lokasi.`umur` = '$umur'";
		}
		else{
			$option_umur = "";
		}
		$query = $this->db->query("SELECT
																  berat_tanaman.`lokasi`,
																  IF(MAX(berat_tanaman.`MBW`) > konstanta.`nilai`, 1, NULL) AS MBW,
																  IF(MAX(berat_tanaman.`PHY`) > konstanta.`nilai`, 1, NULL) AS PHY,
																  IF(MAX(berat_tanaman.`ERW`) > konstanta.`nilai`, 1, NULL) AS ERW
																FROM
																  berat_tanaman,
																  perlocation_lokasi,
  																konstanta
																WHERE $pg_wil
																  AND berat_tanaman.`lokasi` = perlocation_lokasi.`lokasi`
																  AND berat_tanaman.`tgl_pengamatan` >= perlocation_lokasi.`tgl_perawatan`
																  AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																  $option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur
  																AND konstanta.`jenis` = 'STD_PENYAKIT'
																GROUP BY berat_tanaman.`lokasi`");

		return $query->result();
	}
	function get_penyakit_wilayah_max_min_pm($w, $status, $jenis, $kelas, $tahun, $bulan, $umur){
		if(substr($w, 0, 2) == 'PG'){
			if($w != 'PG'){
				$pg_wil = "perlocation_lokasi.`pg` = '$w'";
			}
			else{
				$pg_wil = "perlocation_lokasi.`pg` LIKE 'PG%'";
			}
		}
		else{
			$pg_wil = "perlocation_lokasi.`wilayah` = '$w'";
		}
		if($status != 'NS'){
			$option_status = "AND perlocation_lokasi.`status` = '$status'";
		}
		else{
			$option_status = "";
		}
		if($jenis != 'All'){
			$option_jenis = "AND perlocation_lokasi.`jenis` = '$jenis'";
		}
		else{
			$option_jenis = "";
		}
		if($kelas != 'All'){
			$option_kelas = "AND perlocation_lokasi.`kelas` = '$kelas'";
		}
		else{
			$option_kelas = "";
		}
		if($bulan != 'Total'){
			$option_bulan = "AND MONTH(perlocation_lokasi.`tgl_panen`) = '$bulan'";
		}
		else{
			$option_bulan = "";
		}
		if($umur != 'Total'){
			$option_umur = "AND perlocation_lokasi.`umur` = '$umur'";
		}
		else{
			$option_umur = "";
		}
		$query = $this->db->query("SELECT
																  berat_tanaman.`lokasi`,
																  MAX(berat_tanaman.`MBW`) AS MBW_max,
																  MAX(berat_tanaman.`PHY`) AS PHY_max,
																  MAX(berat_tanaman.`ERW`) AS ERW_max,
																  AVG(berat_tanaman.`MBW`) AS MBW_avg,
																  AVG(berat_tanaman.`PHY`) AS PHY_avg,
																  AVG(berat_tanaman.`ERW`) AS ERW_avg,
																  MIN(NULLIF(berat_tanaman.`MBW`, 0)) AS MBW_min,
																  MIN(NULLIF(berat_tanaman.`PHY`, 0)) AS PHY_min,
																  MIN(NULLIF(berat_tanaman.`ERW`, 0)) AS ERW_min
																FROM
																  berat_tanaman,
																  perlocation_lokasi
																WHERE $pg_wil
																  AND berat_tanaman.`lokasi` = perlocation_lokasi.`lokasi`
																  AND berat_tanaman.`tgl_pengamatan` >= perlocation_lokasi.`tgl_perawatan`
																  AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur");

		return $query->row_array();
	}
	function get_berat_tanaman_size_pm($w, $status, $jenis, $kelas, $tahun, $bulan, $umur, $type){
		if(substr($w, 0, 2) == 'PG'){
			if($w != 'PG'){
				$pg_wil = "perlocation_lokasi.`pg` = '$w'";
			}
			else{
				$pg_wil = "perlocation_lokasi.`pg` LIKE 'PG%'";
			}
		}
		else{
			$pg_wil = "perlocation_lokasi.`wilayah` = '$w'";
		}
		if($status != 'NS'){
			$option_status = "AND perlocation_lokasi.`status` = '$status'";
		}
		else{
			$option_status = "";
		}
		if($jenis != 'All'){
			$option_jenis = "AND perlocation_lokasi.`jenis` = '$jenis'";
		}
		else{
			$option_jenis = "";
		}
		if($kelas != 'All'){
			$option_kelas = "AND perlocation_lokasi.`kelas` = '$kelas'";
		}
		else{
			$option_kelas = "";
		}
		if($bulan != 'Total'){
			$option_bulan = "AND MONTH(perlocation_lokasi.`tgl_panen`) = '$bulan'";
		}
		else{
			$option_bulan = "";
		}
		if($umur != 'Total'){
			$option_umur = "AND perlocation_lokasi.`umur` = '$umur'";
		}
		else{
			$option_umur = "";
		}
		if($type == 'Big'){
			$type = 'DESC';
		}
		else{
			$type = 'ASC';
		}
		$query = $this->db->query("SELECT
																  berat_tanaman.`lokasi`,
																  perlocation_lokasi.`tgl_panen` AS bulan_panen,
																  MAX(berat_tanaman.`Rata2_BT`) AS berat_tanaman,
																	perlocation_lokasi.`keterangan`
																FROM
																  berat_tanaman,
																  perlocation_lokasi
																WHERE $pg_wil
																  AND berat_tanaman.`lokasi` = perlocation_lokasi.`lokasi`
																  AND berat_tanaman.`tgl_pengamatan` >= perlocation_lokasi.`tgl_perawatan`
																  AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur
																GROUP BY berat_tanaman.`lokasi`
																ORDER BY berat_tanaman $type
																LIMIT 10");

		return $query->result();
	}
	function get_berat_tanaman_wilayah_forcing_pm($w, $status, $jenis, $kelas, $tahun, $bulan, $umur){
		if(substr($w, 0, 2) == 'PG'){
			if($w != 'PG'){
				$pg_wil = "perlocation_lokasi.`pg` = '$w'";
			}
			else{
				$pg_wil = "perlocation_lokasi.`pg` LIKE 'PG%'";
			}
		}
		else{
			$pg_wil = "perlocation_lokasi.`wilayah` = '$w'";
		}
		if($status != 'NS'){
			$option_status = "AND perlocation_lokasi.`status` = '$status'";
		}
		else{
			$option_status = "";
		}
		if($jenis != 'All'){
			$option_jenis = "AND perlocation_lokasi.`jenis` = '$jenis'";
		}
		else{
			$option_jenis = "";
		}
		if($kelas != 'All'){
			$option_kelas = "AND perlocation_lokasi.`kelas` = '$kelas'";
		}
		else{
			$option_kelas = "";
		}
		if($bulan != 'Total'){
			$option_bulan = "AND MONTH(perlocation_lokasi.`tgl_forcing`) = '$bulan'";
		}
		else{
			$option_bulan = "";
		}
		if($umur != 'Total'){
			$option_umur = "AND perlocation_lokasi.`umur` = '$umur'";
		}
		else{
			$option_umur = "";
		}
		$query = $this->db->query("SELECT
																  berat_tanaman.`lokasi`,
																  berat_tanaman.`tgl_pengamatan`,
																  IF(berat_tanaman.`tgl_pengamatan` >= perlocation_lokasi.`tgl_forcing` - INTERVAL 8 MONTH, IF(berat_tanaman.`tgl_pengamatan` < perlocation_lokasi.`tgl_forcing` - INTERVAL 7 MONTH, berat_tanaman.`Rata2_BT`, (NULL)), (NULL)) AS F1,
																  IF(berat_tanaman.`tgl_pengamatan` >= perlocation_lokasi.`tgl_forcing` - INTERVAL 7 MONTH, IF(berat_tanaman.`tgl_pengamatan` < perlocation_lokasi.`tgl_forcing` - INTERVAL 6 MONTH, berat_tanaman.`Rata2_BT`, (NULL)), (NULL)) AS F2,
																  IF(berat_tanaman.`tgl_pengamatan` >= perlocation_lokasi.`tgl_forcing` - INTERVAL 6 MONTH, IF(berat_tanaman.`tgl_pengamatan` < perlocation_lokasi.`tgl_forcing` - INTERVAL 5 MONTH, berat_tanaman.`Rata2_BT`, (NULL)), (NULL)) AS F3,
																  IF(berat_tanaman.`tgl_pengamatan` >= perlocation_lokasi.`tgl_forcing` - INTERVAL 5 MONTH, IF(berat_tanaman.`tgl_pengamatan` < perlocation_lokasi.`tgl_forcing` - INTERVAL 4 MONTH, berat_tanaman.`Rata2_BT`, (NULL)), (NULL)) AS F4,
																  IF(berat_tanaman.`tgl_pengamatan` >= perlocation_lokasi.`tgl_forcing` - INTERVAL 4 MONTH, IF(berat_tanaman.`tgl_pengamatan` < perlocation_lokasi.`tgl_forcing` - INTERVAL 3 MONTH, berat_tanaman.`Rata2_BT`, (NULL)), (NULL)) AS F5,
																  IF(berat_tanaman.`tgl_pengamatan` >= perlocation_lokasi.`tgl_forcing` - INTERVAL 3 MONTH, IF(berat_tanaman.`tgl_pengamatan` < perlocation_lokasi.`tgl_forcing` - INTERVAL 2 MONTH, berat_tanaman.`Rata2_BT`, (NULL)), (NULL)) AS F6,
																  IF(berat_tanaman.`tgl_pengamatan` >= perlocation_lokasi.`tgl_forcing` - INTERVAL 2 MONTH, IF(berat_tanaman.`tgl_pengamatan` < perlocation_lokasi.`tgl_forcing` - INTERVAL 1 MONTH, berat_tanaman.`Rata2_BT`, (NULL)), (NULL)) AS F7,
																  IF(berat_tanaman.`tgl_pengamatan` >= perlocation_lokasi.`tgl_forcing` - INTERVAL 1 MONTH, IF(berat_tanaman.`tgl_pengamatan` < perlocation_lokasi.`tgl_forcing` + INTERVAL 0 MONTH, berat_tanaman.`Rata2_BT`, (NULL)), (NULL)) AS F8,
																  IF(berat_tanaman.`tgl_pengamatan` >= perlocation_lokasi.`tgl_forcing` + INTERVAL 0 MONTH, IF(berat_tanaman.`tgl_pengamatan` < perlocation_lokasi.`tgl_forcing` + INTERVAL 1 MONTH, berat_tanaman.`Rata2_BT`, (NULL)), (NULL)) AS F9
																FROM
																  berat_tanaman,
																  perlocation_lokasi
																WHERE $pg_wil
																  AND berat_tanaman.`lokasi` = perlocation_lokasi.`lokasi`
																  AND berat_tanaman.`tgl_pengamatan` >= perlocation_lokasi.`tgl_perawatan`
																  AND YEAR(perlocation_lokasi.`tgl_panen`) = '$tahun'
																  $option_status
																	$option_jenis
																  $option_kelas
																  $option_bulan
																	$option_umur
																ORDER BY berat_tanaman.`lokasi` ASC, berat_tanaman.`tgl_pengamatan` ASC");

		return $query->result();
	}
}
