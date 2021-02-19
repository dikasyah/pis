<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_HPP extends CI_Controller {

	function __construct()
	{
		parent :: __construct();
		$this->load->model('Wilayah_model');
		$this->load->model('PlantationGroup_model');
		$this->load->model('PerlocationHPP_model');
		$this->load->model('Lokasi_model');
		$this->load->model('Konstanta_model');
		$this->load->model('Forcing_model');
		$this->load->model('DataMaster_model');
		$this->load->model('Forecast_model');
		$this->load->model('ElementCost_model');
		$this->load->model('ForecastOverhead_model');
		$this->load->model('Koreksi_model');
		$this->load->model('Irrigation_model');
		$this->load->model('TonasePanen_model');
		$this->load->model('GroupCost_model');
		$this->load->model('StdBiayaUmur_model');
		$this->load->model('ProduksiPanen_model');
	}

	public function index()
	{
		session_start();
		if($_SESSION['index'] != '10011823'){
			header( "Location: /PIS" );
		}

		$data['wilayah'] = $this->Wilayah_model->get_wilayah_all();
		$data['plantation_groupg'] = $this->PlantationGroup_model->get_plantation_group_all();

		$this->load->view('WIP_PM/include/header');
    $this->load->view('admin/admin_hpp.php', $data);
		$this->load->view('WIP_PM/include/footer');
	}

	function detail_lokasi_cost(){
		$wilayah = $this->input->get('wilayah');
		if($wilayah == 'W01'){
			$query = $this->PerlocationHPP_model->del_lokasi_cost();
		}
		$cek = 1;

		$konstanta = $this->Konstanta_model->get_konstanta_code("TGL_TARIK_DATA");
		$YEAR_BASE = $this->Konstanta_model->get_konstanta_code("YEAR_BASE");

		$lokasi = $this->PerlocationHPP_model->get_lokasi_panen($wilayah);

		foreach ($lokasi as $lok) {
			$tgl_panen = $lok->real_dan_sisa_rencana_tgl_selesai_panen;
			$element_cost_real = $this->ProduksiPanen_model->get_element_cost_code($lok->lokasi, $lok->kebun, substr($tgl_panen, 0, 7));
			$total_real = 0;
			for ($i = 1; $i <= 15 ; $i++) {
				if($i < 10){
					$total_real += ($element_cost_real['ZN0'.$i]);
				}
				else{
					$total_real += ($element_cost_real['ZN'.$i]);
				}
			}

			$element_cost_all = $this->ElementCost_model->get_element_cost_panen(substr($tgl_panen, 0, 4));
			$hpp = $this->PerlocationHPP_model->get_cost_panen_lokasi($lok->lokasi, $lok->status, substr($tgl_panen, 0, 4));

			//Start
			$data['tahun_panen'] = substr($tgl_panen, 0, 4);
			$data['lokasi'] = $lok->lokasi;
		  $total_bpp = 0;
		  $total_rfb = 0;
		  $total_rf = 0;
		  $total_r = 0;
		  $total_f = 0;
		  foreach ($element_cost_all as $ec) {
        if($lok->status == "NSFC"){
          $bpp = $ec->BPP_NSFC_ha;
        }
        else{
          $bpp = $ec->BPP_NSSC_ha;
        }
	      $bpp = $bpp * $lok->luas;

		    $rfb = $bpp;
		    $total_bpp += $bpp;
		    $total_rfb += $bpp;

		    $total_r += $element_cost_real[$ec->code];

				$real_rf = $hpp[$ec->code];

		    $total_rf += $real_rf;
		    $total_f += $real_rf - $element_cost_real[$ec->code];

				$data[$ec->code] = $element_cost_real[$ec->code];
		  }
			//End

			$data['ZNT'] = $total_real;

			$data['labour'] = $element_cost_real['Labour'];
			$data['chrage'] = $element_cost_real['Charge'];
			$data['material'] = $element_cost_real['Material'];

		  if(((($total_rf - $total_bpp) / $total_bpp) * 100) <= -2){
		    $category = "Excellent";
		  }
		  else if(((($total_rf - $total_bpp) / $total_bpp) * 100) <= 2){
		    $category = "Good";
		  }
		  else{
		    $category = "Poor";
		  }

			$data['performance'] = $category;

		  if(((($total_r - $total_bpp) / $total_bpp) * 100) <= -2){
		    $category = "Excellent";
		  }
		  else if(((($total_r - $total_bpp) / $total_bpp) * 100) <= 2){
		    $category = "Good";
		  }
		  else{
		    $category = "Poor";
		  }

			$data['performance_real'] = $category;

			$this->PerlocationHPP_model->set_lokasi_cost($data);
			echo $lok->lokasi.' - '.$cek++;
			echo "<br />";
		}
		echo "<div class='row'>
			<div class='col-lg-12 text-center'>
				<h1>Update Success Cost $wilayah</h1>
			</div>
		</div>";

		if($wilayah == 'W14'){
			echo ("
				<script>
					window.location.href = '/PIS/Admin_HPP';
					alert('Berhasil di update COST');
				</script>
			");
		}
		else{
			$cek_wil = substr($wilayah, 1, 2) + 1;
			if($cek_wil < 10){
				$cek_wil = '0'.$cek_wil;
			}
			else{
				if($cek_wil == 10){
					$cek_wil = 11;
				}
			}
			echo ("
				<script>
					window.location.href = '/PIS/Admin_HPP/detail_lokasi_cost?wilayah=W".$cek_wil."';
				</script>
			");
		}
	}

	function detail_lokasi_trend_cost(){
		$wilayah = $this->input->get('wilayah');
		if($wilayah == 'W01'){
			$query = $this->PerlocationHPP_model->del_lokasi_trend_cost();
		}
		$cek = 1;

		$konstanta = $this->Konstanta_model->get_konstanta_code("TGL_TARIK_DATA");
		$YEAR_BASE = $this->Konstanta_model->get_konstanta_code("YEAR_BASE");

		$lokasi = $this->PerlocationHPP_model->get_lokasi_panen($wilayah);

		foreach ($lokasi as $lok) {
			$tgl_panen = $lok->real_dan_sisa_rencana_tgl_selesai_panen;
			$cost_real = $this->ProduksiPanen_model->get_trend_cost_hpp($lok->lokasi, $lok->kebun, substr($tgl_panen, 0, 7), $lok->tgl_awal_perawatan);
			$cost_budget = $this->ProduksiPanen_model->get_trend_cost_budget_hpp($lok->status);

			//Start
			$data['tahun_panen'] = substr($tgl_panen, 0, 4);
			$data['lokasi'] = $lok->lokasi;

			$a = 1;
			while ($a <= 21) {
				$data['U'.$a.'_r'] = $cost_real['U'.$a];
				$a++;
			}

			$a = 1;
			while ($a <= 21) {
				$data['U'.$a.'_b'] = $cost_budget['U'.$a] * $lok->luas;
				$a++;
			}

			$this->PerlocationHPP_model->set_lokasi_trend_cost($data);
			echo $lok->lokasi.' - '.$cek++;
			echo "<br />";
		}
		echo "<div class='row'>
			<div class='col-lg-12 text-center'>
				<h1>Update Success Cost $wilayah</h1>
			</div>
		</div>";

		if($wilayah == 'W14'){
			echo ("
				<script>
					window.location.href = '/PIS/Admin_HPP';
					alert('Berhasil di update COST');
				</script>
			");
		}
		else{
			$cek_wil = substr($wilayah, 1, 2) + 1;
			if($cek_wil < 10){
				$cek_wil = '0'.$cek_wil;
			}
			else{
				if($cek_wil == 10){
					$cek_wil = 11;
				}
			}
			echo ("
				<script>
					window.location.href = '/PIS/Admin_HPP/detail_lokasi_trend_cost?wilayah=W".$cek_wil."';
				</script>
			");
		}
	}
}
