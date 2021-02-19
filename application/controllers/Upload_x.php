<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

    public function __construct() {
      parent::__construct();
			$this->load->model('User_model');
			$this->load->model('Noted_model');
			$this->load->model('GalleryLokasi_model');
    }

	function do_upload() {
		$index = $this->input->post('index');
		$foto = $this->input->post('foto');
		$backgroud = $this->input->post('backgroud');
		$ekstensi_diperbolehkan	= array('png','jpg','jpeg');

		$nama_foto = $index.'_profile';
		$x_foto = explode('.', $_FILES['upload_foto']['name']);
		$ekstensi_foto = strtolower(end($x_foto));
		$ukuran_foto	= $_FILES['upload_foto']['size'];
		$file_tmp_foto = $_FILES['upload_foto']['tmp_name'];

		$nama_background = $index.'_background';
		$x_background = explode('.', $_FILES['upload_background']['name']);
		$ekstensi_background = strtolower(end($x_background));
		$ukuran_background	= $_FILES['upload_background']['size'];
		$file_tmp_background = $_FILES['upload_background']['tmp_name'];

		if($_FILES['upload_foto'] != NULL){
			if(in_array($ekstensi_foto, $ekstensi_diperbolehkan) == true){
				if($ukuran_foto < 20480000){
          if($foto != NULL){
            $foto = $_SERVER['DOCUMENT_ROOT'].$foto;
            unlink($foto);
          }
					move_uploaded_file($file_tmp_foto, 'assets/images/profile/'.$nama_foto.'.'.$ekstensi_foto);
					$url_foto = '/PIS/assets/images/profile/'.$nama_foto.'.'.$ekstensi_foto;
					$this->User_model->set_foto_user_code($index, $url_foto);
					//echo 'Berhasil Diubah';
				}
				else{
					//echo 'UKURAN FILE TERLALU BESAR';
				}
			}
			else{
				//echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
		}

		if($_FILES['upload_background'] != NULL){
			if(in_array($ekstensi_background, $ekstensi_diperbolehkan) == true){
				if($ukuran_background < 20480000){
          if($backgroud != NULL){
            $backgroud = $_SERVER['DOCUMENT_ROOT'].$backgroud;
            unlink($backgroud);
          }
					move_uploaded_file($file_tmp_background, 'assets/images/profile/'.$nama_background.'.'.$ekstensi_background);
					$url_background = '/PIS/assets/images/profile/'.$nama_background.'.'.$ekstensi_background;
					$this->User_model->set_bg_user_code($index, $url_background);
					//echo 'Berhasil Diubah';
				}
				else{
					//echo 'UKURAN FILE TERLALU BESAR';
				}
			}
			else{
				//echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}

			header( "Location: /PIS/dashboard/profile" );
	  }
	}

  function insert_note(){
    session_start();
    $pg = $this->input->post('pg');
    $wilayah = $this->input->post('wilayah');
    $lokasi = $this->input->post('lokasi');
    $header = $this->input->post('header');
    $quest = $this->input->post('quest');
    $pic_answer = $this->input->post('pic_answer');
    $pic_quest = $_SESSION['index'];
    $tgl_start = date('Y-m-d');

    //echo "<pre>";
    //var_dump($_FILES);
    //echo "</pre>";
    //die();

		$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
		$nama_foto = $pic_quest.'_'.$lokasi.'_'.date('d-m-Y').'_quest';
		$x_foto = explode('.', $_FILES['foto']['name']);
		$ekstensi_foto = strtolower(end($x_foto));
		$ukuran_foto	= $_FILES['foto']['size'];
		$file_tmp_foto = $_FILES['foto']['tmp_name'];

    if($_FILES['foto'] != NULL){
			if(in_array($ekstensi_foto, $ekstensi_diperbolehkan) == true){
				if($ukuran_foto < 20480000){
					move_uploaded_file($file_tmp_foto, 'assets/images/noted/'.$nama_foto.'.'.$ekstensi_foto);
					$url_foto = '/PIS/assets/images/noted/'.$nama_foto.'.'.$ekstensi_foto;
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

		$ekstensi_diperbolehkan	= array('mp4');
		$nama_video = $pic_quest.'_'.$lokasi.'_'.date('d-m-Y').'_quest';
		$x_video = explode('.', $_FILES['video']['name']);
		$ekstensi_video = strtolower(end($x_video));
		$ukuran_video	= $_FILES['video']['size'];
		$file_tmp_video = $_FILES['video']['tmp_name'];

    if($_FILES['video'] != NULL){
			if(in_array($ekstensi_video, $ekstensi_diperbolehkan) == true){
				if($ukuran_video < 102400000){
					move_uploaded_file($file_tmp_video, 'assets/images/noted/'.$nama_video.'.'.$ekstensi_video);
					$url_video = '/PIS/assets/images/noted/'.$nama_video.'.'.$ekstensi_video;
					//echo 'Berhasil Diubah';
				}
				else{
          $url_video = NULL;
					//echo 'UKURAN FILE TERLALU BESAR';
				}
			}
			else{
        $url_video = NULL;
				//echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
		}
    else{
      $url_video = NULL;
    }

    $this->Noted_model->set_note_lokasi($pg, $wilayah, $lokasi, $header, $quest, $url_foto, $url_video, $pic_answer, $pic_quest, $tgl_start);
		header( "Location: /PIS/dashboard/lokasi?lokasi=".$lokasi );
  }

  function reply_note(){
    session_start();
    $id = $this->input->post('id');
    $lokasi = $this->input->post('lokasi');
    $pic_answer = $this->input->post('pic_answer');
    $answer = $this->input->post('answer');
    $tgl_close = date('Y-m-d', strtotime(date('Y-m-d')) + (86400 * 3));

		$ekstensi_diperbolehkan	= array('png','jpg','jpeg');
		$nama_foto = $pic_answer.'_'.$lokasi.'_'.date('d-m-Y').'_answer';
		$x_foto = explode('.', $_FILES['foto']['name']);
		$ekstensi_foto = strtolower(end($x_foto));
		$ukuran_foto	= $_FILES['foto']['size'];
		$file_tmp_foto = $_FILES['foto']['tmp_name'];

    if($_FILES['foto'] != NULL){
			if(in_array($ekstensi_foto, $ekstensi_diperbolehkan) == true){
				if($ukuran_foto < 20480000){
					move_uploaded_file($file_tmp_foto, 'assets/images//noted/'.$nama_foto.'.'.$ekstensi_foto);
					$url_foto = '/PIS/assets/images/noted/'.$nama_foto.'.'.$ekstensi_foto;
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

    $ekstensi_diperbolehkan	= array('mp4');
    $nama_video = $pic_quest.'_'.$lokasi.'_'.date('d-m-Y').'_quest';
    $x_video = explode('.', $_FILES['video']['name']);
    $ekstensi_video = strtolower(end($x_video));
    $ukuran_video	= $_FILES['video']['size'];
    $file_tmp_video = $_FILES['video']['tmp_name'];

    if($_FILES['video'] != NULL){
      if(in_array($ekstensi_video, $ekstensi_diperbolehkan) == true){
        if($ukuran_video < 102400000){
          move_uploaded_file($file_tmp_video, 'assets/images/noted/'.$nama_video.'.'.$ekstensi_video);
          $url_video = '/PIS/assets/images/noted/'.$nama_video.'.'.$ekstensi_video;
          //echo 'Berhasil Diubah';
        }
        else{
          $url_video = NULL;
          //echo 'UKURAN FILE TERLALU BESAR';
        }
      }
      else{
        $url_video = NULL;
        //echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
      }
    }
    else{
      $url_video = NULL;
    }

    $this->Noted_model->update_note_lokasi($id, $url_foto, $url_video, $answer, $tgl_close);
		header( "Location: /PIS/dashboard/profile");
  }

  function delete_note(){
    session_start();
    $id = $this->input->post('id');
    $foto_quest = $this->input->post('foto_quest');
    $foto_answer = $this->input->post('foto_answer');

    if($foto_quest != NULL){
      $url_foto_quest = $_SERVER['DOCUMENT_ROOT'].$foto_quest;
      unlink($url_foto_quest);
    }
    if($foto_answer != NULL){
      $url_foto_answer = $_SERVER['DOCUMENT_ROOT'].$foto_answer;
      unlink($url_foto_answer);
    }

    $this->Noted_model->delete_note_lokasi($id);
		header( "Location: /PIS/dashboard/profile");
  }

  function insert_gallery(){
    session_start();
    $lokasi = $this->input->post('lokasi');
    $caption = $this->input->post('caption');
    $jenis = $this->input->post('jenis');
    $deskripsi = $this->input->post('deskripsi');

    switch ($jenis) {
      case 'Land Preparation':
        $nama_jenis = 'landprep';
        break;
      case 'Planting':
        $nama_jenis = 'planting';
        break;
      case 'PM Pre Forcing':
        $nama_jenis = 'preforcing';
        break;
      case 'PM Post Forcing':
        $nama_jenis = 'postforcing';
        break;
      case 'Harvesting':
        $nama_jenis = 'harvest';
        break;
    }
    $ekstensi_diperbolehkan	= array('png','jpg','jpeg');
    $nama_foto = $lokasi.'_gallery_'.$nama_jenis.'_'.date('dmY_His');
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

    $this->GalleryLokasi_model->set_gallery_lokasi($lokasi, $jenis, $caption, $url_foto, $deskripsi);
    header( "Location: /PIS/dashboard/lokasi?lokasi=".$lokasi );
  }
  function delete_gallery(){
    session_start();
    $id = $this->input->post('id');
    $lokasi = $this->input->post('lokasi');
    $foto = $this->input->post('foto');

    if($foto != NULL){
      $url_foto = $_SERVER['DOCUMENT_ROOT'].$foto;
      unlink($url_foto);
    }

    $this->GalleryLokasi_model->delete_gallery_lokasi($id);
    header( "Location: /PIS/dashboard/lokasi?lokasi=".$lokasi );
  }
}
