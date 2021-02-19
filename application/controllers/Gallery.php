<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	function __construct()
	{
		parent :: __construct();
		$this->load->model('User_model');
		$this->load->model('HistoryGallery_model');
		$this->load->model('Lokasi_model');
		$this->load->model('Coordinate_model');
	}

	function history_gallery(){
		session_start();
		if(isset($_SESSION['username'])){
			$data["lokasi"] = $this->input->get('lokasi');
			$data["category"] = $this->input->get('category');
			$data["lokasi_desc"] = $this->Lokasi_model->get_lokasi_code($data["lokasi"]);
			$data["account"] = $this->User_model->get_user_index($_SESSION['index']);
			$data["lokasi_gallery"] = $this->HistoryGallery_model->get_history_gallery();
			$data["note_lokasi"] = $this->HistoryGallery_model->get_detil_lokasi_code($data["lokasi"]);
			$data["history_gallery"] = $this->HistoryGallery_model->get_history_gallery_jenis($data["lokasi"], $data["category"]);
			$data['coordinate'] = $this->Coordinate_model->get_coordinate_lokasi($data["lokasi"]);

			$this->load->view('include/header');
			$this->load->view('gallery/history_gallery', $data);
			$this->load->view('include/footer');
		}
		else{
			header( "Location: /PIS" );
		}
	}

	function insert_gallery(){
		session_start();
		$this->User_model->reload_history_login($_SESSION['index']);
		$lokasi = $this->input->post('lokasi');
		$caption = $this->input->post('caption');
		$jenis = $this->input->post('jenis');
		$deskripsi = $this->input->post('deskripsi');

		switch ($jenis) {
			case 'Ridger':
				$nama_jenis = 'ridger';
				break;
			case 'Tanam':
				$nama_jenis = 'tanam';
				break;
			case 'Gulma':
				$nama_jenis = 'gulma';
				break;
			case 'Issue':
				$nama_jenis = 'issue';
				break;
		}
		$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
		$nama_foto = $lokasi.'_history_gallery_'.$nama_jenis.'_'.date('dmY_His');
		$x_foto = explode('.', $_FILES['foto']['name']);
		$ekstensi_foto = strtolower(end($x_foto));
		$ukuran_foto	= $_FILES['foto']['size'];
		$file_tmp_foto = $_FILES['foto']['tmp_name'];

		if($_FILES['foto'] != NULL){
			if(in_array($ekstensi_foto, $ekstensi_diperbolehkan) == true){
				if($ukuran_foto < 20480000){
					move_uploaded_file($file_tmp_foto, 'assets/images/gallery/'.$nama_foto.'.'.$ekstensi_foto);
					$url_foto = '/PIS/assets/images/gallery/'.$nama_foto.'.'.$ekstensi_foto;
					//echo 'Berhasil Diubah';
				}
				else{
					$url_foto = NULL;
					//echo 'UKURAN FILE TERLALU BESAR';
				}
			}
			else{
				$url_foto = NULL;
				//echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
		}
		else{
			$url_foto = NULL;
		}

		$this->HistoryGallery_model->set_history_gallery_lokasi($lokasi, $jenis, $caption, $url_foto, $deskripsi);
		header( "Location: /PIS/Gallery/history_gallery?lokasi=".$lokasi."&category=".$jenis);
	}
  function delete_gallery(){
    session_start();
		$this->User_model->reload_history_login($_SESSION['index']);
    $id = $this->input->post('id');
    $lokasi = $this->input->post('lokasi');
    $foto = $this->input->post('foto');
		$jenis = $this->input->post('jenis');

    if($foto != NULL){
      $url_foto = $_SERVER['DOCUMENT_ROOT'].$foto;
      unlink($url_foto);
    }

    $this->HistoryGallery_model->delete_history_gallery_lokasi($id);
		header( "Location: /PIS/Gallery/history_gallery?lokasi=".$lokasi."&category=".$jenis);
  }
}
