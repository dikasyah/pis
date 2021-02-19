<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Export extends CI_Controller {

  public function __construct(){
    parent::__construct();

    $this->load->model('Lokasi_model');
    $this->load->model('User_model');
    $this->load->model('Konstanta_model');
    $this->load->model('Wilayah_model');
    $this->load->model('HistoriLokasi_model');
    $this->load->model('Produksi_model');
    $this->load->model('StdYield_model');
    $this->load->model('ProduksiPanen_model');
  }

  public function export_all_spk(){
		session_start();
    $lok = $this->input->get('lokasi');
    $type = $this->input->get('type');
    $account = $this->User_model->get_user_index($_SESSION['index']);
    $konstanta = $this->Konstanta_model->get_konstanta_code("TGL_TARIK_DATA");
    $YEAR_BASE = $this->Konstanta_model->get_konstanta_code("YEAR_BASE");

    if($type == 'WIP'){
      $pg_wil = $this->Lokasi_model->get_detil_lokasi_pg_wil($lok);

      $lokasi = $this->Lokasi_model->get_lokasi_code($lok);
      $wilayah = $this->Wilayah_model->get_wilayah_code(substr($lokasi['kebun'], 0, 3));
      $histori_lokasi_nssc_nsfc = $this->HistoriLokasi_model->get_histori_lokasi_code_nssc_nsfc($lok);
      $produksi = $this->Produksi_model->get_produksi_code($lok, substr($lokasi["status"], 0, 4));
      if($produksi == NULL){
        $produksi = $this->Produksi_model->get_produksi_t1_code($lok, substr($lokasi["status"], 0, 4));
      }

      if(substr($lokasi['status'], 0, 4) == 'NSFC' || substr($lokasi['status'], 0, 4) == 'NFFC'){
        $kelas = substr($lokasi['bibit'], 6, 1);
      }
      else{
        $kelas = 'NSSC';
      }

      $standart_panen = array(
        'B' => $this->Produksi_model->get_standart_produksi_code('B'),
        'S' => $this->Produksi_model->get_standart_produksi_code('S'),
        'K' => $this->Produksi_model->get_standart_produksi_code('K')
      );

      $std_yield = array(
        'NSFC' => $this->StdYield_model->get_std_yield_code('NSFC'),
        'NFFC' => $this->StdYield_model->get_std_yield_code('NFFC'),
        'NSSC' => $this->StdYield_model->get_std_yield_code('NSSC')
      );

      if($produksi == NULL){
        if($lokasi['tgl_panen_standard'] != NULL){
          $tgl_panen = $lokasi['tgl_panen_standard'];
        }
        else if($lokasi['tgl_panen_rencana'] != NULL){
          $tgl_panen = $lokasi['tgl_panen_rencana'];
        }
        else{
          if(substr($lokasi['status'], 0, 4) != 'NSSC'){
            $tgl_panen = strtotime($lokasi['tgl_mulai_rawat']) + ($standart_panen[$kelas]['bulan'] * 30.4583333333333 * 86400);
          }
          else{
            $tgl_panen = strtotime($lokasi['tgl_mulai_rawat']) + ((13 * 30.5) * 86400);
          }
          $tgl_panen = date('Y-m-d', $tgl_panen);
        }
      }
      else{
        $tgl_panen = $produksi['real_dan_sisa_rencana_tgl_selesai_panen'];
      }
      $tgl_rencana_forcing = date('Y-m-d', strtotime($tgl_panen) - (152 * 86400));

      if($produksi == NULL){
        if($lokasi['status'] == 'NFFC'){
          $tonase = 82.2 * $lokasi['luas'];
          $yield = 82.2;
        }
        else{
          $status = substr($lokasi['status'], 0, 4);
          $tonase = $std_yield[$status]['yield'] * $lokasi['luas'];
          $yield = $std_yield[$status]['yield'];
        }
      }
      else{
        $tonase = $produksi['real_dan_sisa_rencana_tonase'];
        $yield = $produksi['real_dan_sisa_rencana_yield'];
      }
      if($produksi['real_dan_sisa_rencana_luas'] != NULL){
        $luas = $produksi['real_dan_sisa_rencana_luas'];
      }
      else{
        $luas = $lokasi['luas'];
      }
      if(date('Y', strtotime($tgl_panen)) == date('Y', strtotime($YEAR_BASE['nilai']))){
        $std_yield = $this->StdYield_model->get_std_yield_code(substr($lokasi['status'], 0, 4).'');
        $tahun = 'T0';
      }
      else{
        $std_yield = $this->StdYield_model->get_std_yield_code(substr($lokasi['status'], 0, 4).'_t1');
        $tahun = 'T1';
      }
      if($lokasi['tgl_forcing_realisasi'] != NULL){
        $tgl_forcing = $lokasi['tgl_forcing_realisasi'];
      }
      else{
        $tgl_forcing = $tgl_rencana_forcing;
      }
      $std_forcing_panen = $this->Konstanta_model->get_std_forcing_panen($lokasi['tgl_mulai_rawat'], $kelas);


      if($lokasi['bibit'] == NULL){
        if(substr($lokasi['status'], 0, 4) == "NSSC"){
          $varietas_bibit = substr($histori_lokasi_nssc_nsfc['kode_bibit_lokasi'], 2, 3);
        }
        else{
          $varietas_bibit = "-";
        }
      }
      else{
        $varietas_bibit = substr($lokasi['bibit'], 2, 3);
      }
      if($lokasi['bibit'] == NULL){
        if(substr($lokasi['status'], 0, 4) == "NSSC"){
          if(substr($histori_lokasi_nssc_nsfc['kode_bibit_lokasi'], 5, 1) == "C"){
            $jenis_bibit = "CR";
          }
          else if(substr($histori_lokasi_nssc_nsfc['kode_bibit_lokasi'], 5, 1) == "S"){
            $jenis_bibit = "SC";
          }
          else{
            $jenis_bibit = "AN";
          }
        }
        else{
          $jenis_bibit = "-";
        }
      }
      else{
        if(substr($lokasi['bibit'], 5, 1) == "C"){
          $jenis_bibit = "CR";
        }
        else if(substr($lokasi['bibit'], 5, 1) == "S"){
          $jenis_bibit = "SC";
        }
        else{
          $jenis_bibit = "AN";
        }
      }
      if($lokasi['bibit'] == NULL){
        if(substr($lokasi['status'], 0, 4) == "NSSC"){
          $kelas_bibit = substr($histori_lokasi_nssc_nsfc['kode_bibit_lokasi'], 6, 1);
        }
        else{
          $kelas_bibit = "-";
        }
      }
      else{
        $kelas_bibit = substr($lokasi['bibit'], 6, 1);
      }
      $date1 = round(strtotime($konstanta['nilai']) / 86400);
      $date2 = round(strtotime($lokasi['tgl_mulai_rawat']) / 86400);

      $umur = ceil(($date1-$date2)/30.4583333333333);
    }
    else{
      $tgl_panen = $this->input->get('tahun');
      $produksi = $this->ProduksiPanen_model->get_produksi_panen($lok, $tgl_panen);

      $lokasi['kebun'] = $produksi['kebun'];
      $wilayah = $this->Wilayah_model->get_wilayah_code(substr($lokasi['kebun'], 0, 3));
      $lokasi['status'] = $produksi['status'];
      $varietas_bibit = $produksi['varietas'];
      $jenis_bibit = $produksi['jenis'];
      $kelas_bibit = $produksi['kelas'];

      $lokasi['tgl_mulai_rawat'] = $produksi['tgl_awal_perawatan'];
      $tgl_panen = $produksi['real_dan_sisa_rencana_tgl_selesai_panen'];
			$cek_tgl_forcing = $this->db->query("SELECT '$tgl_panen' - INTERVAL 152 DAY AS tgl_forcing")->row_array();
      $tgl_rencana_forcing = $cek_tgl_forcing['tgl_forcing'];
      $lokasi['tgl_forcing_realisasi'] = $cek_tgl_forcing['tgl_forcing'];

      $lokasi['luas'] = $produksi['real_dan_sisa_rencana_luas'];
      $tonase = $produksi['real_dan_sisa_rencana_tonase'];
      $yield = $produksi['real_dan_sisa_rencana_yield'];

      $date1 = round(strtotime($produksi['real_dan_sisa_rencana_tgl_selesai_panen']) / 86400);
      $date2 = round(strtotime($lokasi['tgl_mulai_rawat']) / 86400);

      $umur = ceil(($date1-$date2)/30.4583333333333);
    }

    // die();

    // Load plugin PHPExcel nya
    include APPPATH.'third_party/PHPExcel/PHPExcel.php';

    // Panggil class PHPExcel nya
    $excel = new PHPExcel();

    // Settingan awal fil excel
    $excel->getProperties()->setCreator('Asri Julianda')
                 ->setLastModifiedBy($account['nama'])
                 ->setTitle("Detail SPK ".$lok." ".date("Ymd", strtotime($konstanta['nilai'])))
                 ->setSubject("SPK Lokasi ".$lok)
                 ->setDescription("Detail SPK ".$lok)
                 ->setKeywords("SPK");

    $style_header = array(
      'font' => array(
        'bold' => true,
        'color' => array('rgb' => '000000'),
        'size' => 15
      ),
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
      )
    );
    $style_sub_header_center = array(
      'font' => array(
        'bold' => true,
        'color' => array('rgb' => 'FFFFFF')
      ),
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
      )
    );
    $style_sub_header_left = array(
      'font' => array(
        'bold' => true,
        'color' => array('rgb' => 'FFFFFF')
      ),
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
      )
    );
    $style_border_full = array(
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_MEDIUM),
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_MEDIUM),
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_MEDIUM),
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_MEDIUM)
      )
    );
    $style_border_top = array(
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_MEDIUM),
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_MEDIUM),
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_MEDIUM)
      )
    );
    $style_border_wing = array(
      'borders' => array(
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_MEDIUM),
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_MEDIUM)
      )
    );
    $style_border_bottom = array(
      'borders' => array(
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_MEDIUM),
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_MEDIUM),
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_MEDIUM)
      )
    );
    $style_color_0 = array(
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb' => '008080')
      )
    );
    $style_color_1 = array(
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb' => '4682B4')
      )
    );
    $style_color_2 = array(
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb' => '20B2AA')
      )
    );
    $style_color_3 = array(
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb' => '3CB371')
      )
    );
    $style_color_4 = array(
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb' => '9370DB')
      )
    );
    $style_color_5 = array(
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb' => '808080')
      )
    );
    $style_color_6 = array(
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb' => 'C71585')
      )
    );
    $style_color_7 = array(
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb' => 'A0522D')
      )
    );
    $style_color_8 = array(
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb' => 'CD5C5C')
      )
    );
    $style_color_9 = array(
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb' => '414BCE')
      )
    );
    $style_color_10 = array(
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb' => 'FF0000')
      )
    );

    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
    $style_center = array(
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      )
    );
    $style_right = array(
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_RIGHT,
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      )
    );

    $excel->setActiveSheetIndex(0)->setCellValue('B2', $lok);
    $excel->getActiveSheet()->mergeCells('B2:G2');

    $excel->setActiveSheetIndex(0)->setCellValue('B4', "Wilayah");
    $excel->getActiveSheet()->mergeCells('B4:C4');
    $excel->setActiveSheetIndex(0)->setCellValue('B5', "Kebun");
    $excel->getActiveSheet()->mergeCells('B5:C5');
    $excel->setActiveSheetIndex(0)->setCellValue('B6', "Kawil");
    $excel->getActiveSheet()->mergeCells('B6:C6');
    $excel->setActiveSheetIndex(0)->setCellValue('B7', "Kasbun");
    $excel->getActiveSheet()->mergeCells('B7:C7');
    $excel->setActiveSheetIndex(0)->setCellValue('D4', $wilayah['code']);
    $excel->setActiveSheetIndex(0)->setCellValue('D5', $lokasi['kebun']);
    $excel->setActiveSheetIndex(0)->setCellValue('D6', $wilayah['kepala_wilayah']);
    $excel->setActiveSheetIndex(0)->setCellValue('D7', $wilayah['kasie_kebun'.substr($lokasi['kebun'], 3)]);

    $excel->setActiveSheetIndex(0)->setCellValue('B9', "Status");
    $excel->getActiveSheet()->mergeCells('B9:C9');
    $excel->setActiveSheetIndex(0)->setCellValue('B10', "Varietas Bibit");
    $excel->getActiveSheet()->mergeCells('B10:C10');
    $excel->setActiveSheetIndex(0)->setCellValue('B11', "Jenis Bibit");
    $excel->getActiveSheet()->mergeCells('B11:C11');
    $excel->setActiveSheetIndex(0)->setCellValue('B12', "Kelas Bibit");
    $excel->getActiveSheet()->mergeCells('B12:C12');

    $excel->setActiveSheetIndex(0)->setCellValue('D9', substr($lokasi['status'], 0, 4));
    $excel->setActiveSheetIndex(0)->setCellValue('D10', $varietas_bibit);
    $excel->setActiveSheetIndex(0)->setCellValue('D11', $jenis_bibit);
    $excel->setActiveSheetIndex(0)->setCellValue('D12', $kelas_bibit);

    $excel->setActiveSheetIndex(0)->setCellValue('F4', "Tgl Perawatan");
    $excel->setActiveSheetIndex(0)->setCellValue('F5', "Rencana Forcing");
    $excel->setActiveSheetIndex(0)->setCellValue('F6', "Real Forcing");
    $excel->setActiveSheetIndex(0)->setCellValue('F7', "Rencana Panen");
    $excel->setActiveSheetIndex(0)->setCellValue('G4', '=DATE('.date('Y', strtotime($lokasi['tgl_mulai_rawat'])).', '.date('m', strtotime($lokasi['tgl_mulai_rawat'])).', '.date('d', strtotime($lokasi['tgl_mulai_rawat'])).')');
    $excel->setActiveSheetIndex(0)->setCellValue('G5', '=DATE('.date('Y', strtotime($tgl_rencana_forcing)).', '.date('m', strtotime($tgl_rencana_forcing)).', '.date('d', strtotime($tgl_rencana_forcing)).')');
    $excel->setActiveSheetIndex(0)->setCellValue('G6', '=DATE('.date('Y', strtotime($lokasi['tgl_forcing_realisasi'])).', '.date('m', strtotime($lokasi['tgl_forcing_realisasi'])).', '.date('d', strtotime($lokasi['tgl_forcing_realisasi'])).')');
    $excel->setActiveSheetIndex(0)->setCellValue('G7', '=DATE('.date('Y', strtotime($tgl_panen)).', '.date('m', strtotime($tgl_panen)).', '.date('d', strtotime($tgl_panen)).')');

    $excel->setActiveSheetIndex(0)->setCellValue('F9', "Luas");
    $excel->setActiveSheetIndex(0)->setCellValue('F10', "Tonase");
    $excel->setActiveSheetIndex(0)->setCellValue('F11', "Yield");
    $excel->setActiveSheetIndex(0)->setCellValue('F12', "Umur");
    $excel->setActiveSheetIndex(0)->setCellValue('G9', number_format($lokasi['luas'] ,2 , '.', ',').' Ha');
    $excel->setActiveSheetIndex(0)->setCellValue('G10', number_format($tonase, 0, '.', ',').' Ton');
    $excel->setActiveSheetIndex(0)->setCellValue('G11', number_format($yield, 2, '.', ',').' Ton/Ha');
    $excel->setActiveSheetIndex(0)->setCellValue('G12', $umur.' Bulan');

    $excel->setActiveSheetIndex(0)->setCellValue('B14', "Umur");
    $excel->getActiveSheet()->mergeCells('B14:C14');
    $excel->setActiveSheetIndex(0)->setCellValue('B15', "Hari");
    $excel->setActiveSheetIndex(0)->setCellValue('C15', "Bulan");

    $excel->setActiveSheetIndex(0)->setCellValue('D14', "Tanggal");
    $excel->getActiveSheet()->mergeCells('D14:D15');
    $excel->setActiveSheetIndex(0)->setCellValue('E14', "Activity Code");
    $excel->getActiveSheet()->mergeCells('E14:E15');
    $excel->setActiveSheetIndex(0)->setCellValue('F14', "Activity Desc");
    $excel->getActiveSheet()->mergeCells('F14:H15');

    $excel->setActiveSheetIndex(0)->setCellValue('I14', "Hasil");
    $excel->getActiveSheet()->mergeCells('I14:I15');
    $excel->setActiveSheetIndex(0)->setCellValue('J14', "HKO");
    $excel->getActiveSheet()->mergeCells('J14:J15');
    $excel->setActiveSheetIndex(0)->setCellValue('K14', "Cost");
    $excel->getActiveSheet()->mergeCells('K14:N14');
    $excel->setActiveSheetIndex(0)->setCellValue('K15', "Labour");
    $excel->setActiveSheetIndex(0)->setCellValue('L15', "Charge");
    $excel->setActiveSheetIndex(0)->setCellValue('M15', "Material");
    $excel->setActiveSheetIndex(0)->setCellValue('N15', "Total");

    $excel->setActiveSheetIndex(0)->setCellValue('O14', "Unit");
    $excel->getActiveSheet()->mergeCells('O14:P14');
    $excel->setActiveSheetIndex(0)->setCellValue('O15', "Penarik");
    $excel->setActiveSheetIndex(0)->setCellValue('P15', "Implement");

    $excel->setActiveSheetIndex(0)->setCellValue('Q14', "Fertilizer");
    $excel->getActiveSheet()->mergeCells('Q14:AL14');
    $excel->setActiveSheetIndex(0)->setCellValue('Q15', "Urea");
    $excel->setActiveSheetIndex(0)->setCellValue('R15', "Za");
    $excel->setActiveSheetIndex(0)->setCellValue('S15', "K2SO4");
    $excel->setActiveSheetIndex(0)->setCellValue('T15', "KCL");
    $excel->setActiveSheetIndex(0)->setCellValue('U15', "TSP");
    $excel->setActiveSheetIndex(0)->setCellValue('V15', "DAP");
    $excel->setActiveSheetIndex(0)->setCellValue('W15', "MgSO4");
    $excel->setActiveSheetIndex(0)->setCellValue('X15', "Kieserite");
    $excel->setActiveSheetIndex(0)->setCellValue('Y15', "FeSO4");
    $excel->setActiveSheetIndex(0)->setCellValue('Z15', "ZnSO4");
    $excel->setActiveSheetIndex(0)->setCellValue('AA15', "Dolomite");
    $excel->setActiveSheetIndex(0)->setCellValue('AB15', "Gypsum");
    $excel->setActiveSheetIndex(0)->setCellValue('AC15', "CuSO4");
    $excel->setActiveSheetIndex(0)->setCellValue('AD15', "Borax");
    $excel->setActiveSheetIndex(0)->setCellValue('AE15', "LOB");
    $excel->setActiveSheetIndex(0)->setCellValue('AF15', "CaCl2");
    $excel->setActiveSheetIndex(0)->setCellValue('AG15', "Calcibor");
    $excel->setActiveSheetIndex(0)->setCellValue('AH15', "Kompos");
    $excel->setActiveSheetIndex(0)->setCellValue('AI15', "Belerang");
    $excel->setActiveSheetIndex(0)->setCellValue('AJ15', "Kieserite G");
    $excel->setActiveSheetIndex(0)->setCellValue('AK15', "NPK");
    $excel->setActiveSheetIndex(0)->setCellValue('AL15', "Petro Cas");

    $excel->setActiveSheetIndex(0)->setCellValue('AM14', "Herbicide");
    $excel->getActiveSheet()->mergeCells('AM14:AR14');
    $excel->setActiveSheetIndex(0)->setCellValue('AM15', "Bromacyl");
    $excel->setActiveSheetIndex(0)->setCellValue('AN15', "Diuron");
    $excel->setActiveSheetIndex(0)->setCellValue('AO15', "Glyphosate");
    $excel->setActiveSheetIndex(0)->setCellValue('AP15', "Quizalofop");
    $excel->setActiveSheetIndex(0)->setCellValue('AQ15', "Ametrine");
    $excel->setActiveSheetIndex(0)->setCellValue('AR15', "Bazza");

    $excel->setActiveSheetIndex(0)->setCellValue('AS14', "Insecticide");
    $excel->getActiveSheet()->mergeCells('AS14:BC14');
    $excel->setActiveSheetIndex(0)->setCellValue('AS15', "Tekasi");
    $excel->setActiveSheetIndex(0)->setCellValue('AT15', "Tekila");
    $excel->setActiveSheetIndex(0)->setCellValue('AU15', "Chlorpyrifos");
    $excel->setActiveSheetIndex(0)->setCellValue('AV15', "Sidazinon");
    $excel->setActiveSheetIndex(0)->setCellValue('AW15', "Propoxur");
    $excel->setActiveSheetIndex(0)->setCellValue('AX15', "Cypermethrin");
    $excel->setActiveSheetIndex(0)->setCellValue('AY15', "Bifentrin EC");
    $excel->setActiveSheetIndex(0)->setCellValue('AZ15', "Bifentrin G");
    $excel->setActiveSheetIndex(0)->setCellValue('BA15', "BPMC");
    $excel->setActiveSheetIndex(0)->setCellValue('BB15', "Clorpyrifos");
    $excel->setActiveSheetIndex(0)->setCellValue('BC15', "Abamectin");

    $excel->setActiveSheetIndex(0)->setCellValue('BD14', "Fungicide");
    $excel->getActiveSheet()->mergeCells('BD14:BK14');
    $excel->setActiveSheetIndex(0)->setCellValue('BD15', "Fosetil");
    $excel->setActiveSheetIndex(0)->setCellValue('BE15', "Metalaxil");
    $excel->setActiveSheetIndex(0)->setCellValue('BF15', "Propiconazole");
    $excel->setActiveSheetIndex(0)->setCellValue('BG15', "Prochloraz");
    $excel->setActiveSheetIndex(0)->setCellValue('BH15', "Mankozeb");
    $excel->setActiveSheetIndex(0)->setCellValue('BI15', "Folirfos");
    $excel->setActiveSheetIndex(0)->setCellValue('BJ15', "H3PO3");
    $excel->setActiveSheetIndex(0)->setCellValue('BK15', "Detazeb");

    $excel->setActiveSheetIndex(0)->setCellValue('BL14', "Others");
    $excel->getActiveSheet()->mergeCells('BL14:BT14');
    $excel->setActiveSheetIndex(0)->setCellValue('BL15', "Sanisol");
    $excel->setActiveSheetIndex(0)->setCellValue('BM15', "Ethylene");
    $excel->setActiveSheetIndex(0)->setCellValue('BN15', "Ethepon");
    $excel->setActiveSheetIndex(0)->setCellValue('BO15', "Kaolin");
    $excel->setActiveSheetIndex(0)->setCellValue('BP15', "Zeolit");
    $excel->setActiveSheetIndex(0)->setCellValue('BQ15', "Rabas");
    $excel->setActiveSheetIndex(0)->setCellValue('BR15', "Ratgone");
    $excel->setActiveSheetIndex(0)->setCellValue('BS15', "Indostick");
    $excel->setActiveSheetIndex(0)->setCellValue('BT15', "Organosilicon");

    $excel->setActiveSheetIndex(0)->setCellValue('BU14', "Group Cost");
    $excel->getActiveSheet()->mergeCells('BU14:BV14');
    $excel->setActiveSheetIndex(0)->setCellValue('BU15', "Code");
    $excel->setActiveSheetIndex(0)->setCellValue('BV15', "Deskripsi");

    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
    $excel->getActiveSheet()->getStyle('B2:G2')->applyFromArray($style_header);
    $excel->getActiveSheet()->getStyle('B2:G2')->applyFromArray($style_border_full);

    $excel->getActiveSheet()->getStyle('B4:D7')->applyFromArray($style_sub_header_left);
    $excel->getActiveSheet()->getStyle('B9:D12')->applyFromArray($style_sub_header_left);
    $excel->getActiveSheet()->getStyle('F4:G7')->applyFromArray($style_sub_header_left);
    $excel->getActiveSheet()->getStyle('F9:G12')->applyFromArray($style_sub_header_left);
    $excel->getActiveSheet()->getStyle('B4:D7')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('B9:D12')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('F4:G7')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('G4:G7')->getNumberFormat()->setFormatCode('dd/mm/yy');
    $excel->getActiveSheet()->getStyle('F9:G12')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('B4:D7')->applyFromArray($style_color_0);
    $excel->getActiveSheet()->getStyle('B9:D12')->applyFromArray($style_color_0);
    $excel->getActiveSheet()->getStyle('F4:G7')->applyFromArray($style_color_0);
    $excel->getActiveSheet()->getStyle('F9:G12')->applyFromArray($style_color_0);

    $excel->getActiveSheet()->getStyle('B14:C14')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('B15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('C15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('B14:C14')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('B15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('C15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('B14:C14')->applyFromArray($style_color_1);
    $excel->getActiveSheet()->getStyle('B15')->applyFromArray($style_color_1);
    $excel->getActiveSheet()->getStyle('C15')->applyFromArray($style_color_1);

    $excel->getActiveSheet()->getStyle('D14:D15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('E14:E15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('F14:H15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('D14:D15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('E14:E15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('F14:H15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('D14:D15')->applyFromArray($style_color_2);
    $excel->getActiveSheet()->getStyle('E14:E15')->applyFromArray($style_color_2);
    $excel->getActiveSheet()->getStyle('F14:H15')->applyFromArray($style_color_2);

    $excel->getActiveSheet()->getStyle('I14:I15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('J14:J15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('K14:N14')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('K15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('L15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('M15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('N15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('I14:I15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('J14:J15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('K14:N14')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('K15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('L15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('M15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('N15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('I14:I15')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('J14:J15')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('K14:N14')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('K15')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('L15')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('M15')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('N15')->applyFromArray($style_color_3);

    $excel->getActiveSheet()->getStyle('O14:P14')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('O15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('P15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('O14:P14')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('O15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('P15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('O14:P14')->applyFromArray($style_color_4);
    $excel->getActiveSheet()->getStyle('O15')->applyFromArray($style_color_4);
    $excel->getActiveSheet()->getStyle('P15')->applyFromArray($style_color_4);

    $excel->getActiveSheet()->getStyle('Q14:AL14')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('Q15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('R15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('S15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('T15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('U15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('V15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('W15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('X15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('Y15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('Z15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AA15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AB15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AC15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AD15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AE15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AF15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AG15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AH15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AI15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AJ15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AK15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AL15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('Q14:AL14')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('Q15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('R15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('S15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('T15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('U15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('V15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('W15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('X15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('Y15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('Z15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AA15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AB15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AC15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AD15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AE15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AF15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AG15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AH15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AI15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AJ15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AK15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AL15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('Q14:AL14')->applyFromArray($style_color_5);
    $excel->getActiveSheet()->getStyle('Q15')->applyFromArray($style_color_5);
    $excel->getActiveSheet()->getStyle('R15')->applyFromArray($style_color_5);
    $excel->getActiveSheet()->getStyle('S15')->applyFromArray($style_color_5);
    $excel->getActiveSheet()->getStyle('T15')->applyFromArray($style_color_5);
    $excel->getActiveSheet()->getStyle('U15')->applyFromArray($style_color_5);
    $excel->getActiveSheet()->getStyle('V15')->applyFromArray($style_color_5);
    $excel->getActiveSheet()->getStyle('W15')->applyFromArray($style_color_5);
    $excel->getActiveSheet()->getStyle('X15')->applyFromArray($style_color_5);
    $excel->getActiveSheet()->getStyle('Y15')->applyFromArray($style_color_5);
    $excel->getActiveSheet()->getStyle('Z15')->applyFromArray($style_color_5);
    $excel->getActiveSheet()->getStyle('AA15')->applyFromArray($style_color_5);
    $excel->getActiveSheet()->getStyle('AB15')->applyFromArray($style_color_5);
    $excel->getActiveSheet()->getStyle('AC15')->applyFromArray($style_color_5);
    $excel->getActiveSheet()->getStyle('AD15')->applyFromArray($style_color_5);
    $excel->getActiveSheet()->getStyle('AE15')->applyFromArray($style_color_5);
    $excel->getActiveSheet()->getStyle('AF15')->applyFromArray($style_color_5);
    $excel->getActiveSheet()->getStyle('AG15')->applyFromArray($style_color_5);
    $excel->getActiveSheet()->getStyle('AH15')->applyFromArray($style_color_5);
    $excel->getActiveSheet()->getStyle('AI15')->applyFromArray($style_color_5);
    $excel->getActiveSheet()->getStyle('AJ15')->applyFromArray($style_color_5);
    $excel->getActiveSheet()->getStyle('AK15')->applyFromArray($style_color_5);
    $excel->getActiveSheet()->getStyle('AL15')->applyFromArray($style_color_5);

    $excel->getActiveSheet()->getStyle('AM14:AR14')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AM15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AN15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AO15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AP15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AQ15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AR15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AM14:AR14')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AM15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AN15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AO15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AP15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AQ15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AR15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AM14:AR14')->applyFromArray($style_color_6);
    $excel->getActiveSheet()->getStyle('AM15')->applyFromArray($style_color_6);
    $excel->getActiveSheet()->getStyle('AN15')->applyFromArray($style_color_6);
    $excel->getActiveSheet()->getStyle('AO15')->applyFromArray($style_color_6);
    $excel->getActiveSheet()->getStyle('AP15')->applyFromArray($style_color_6);
    $excel->getActiveSheet()->getStyle('AQ15')->applyFromArray($style_color_6);
    $excel->getActiveSheet()->getStyle('AR15')->applyFromArray($style_color_6);

    $excel->getActiveSheet()->getStyle('AS14:BC14')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AS15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AT15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AU15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AV15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AW15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AX15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AY15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AZ15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BA15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BB15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BC15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AS14:BC14')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AS15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AT15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AU15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AV15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AW15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AX15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AY15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AZ15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BA15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BB15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BC15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AS14:BC14')->applyFromArray($style_color_7);
    $excel->getActiveSheet()->getStyle('AS15')->applyFromArray($style_color_7);
    $excel->getActiveSheet()->getStyle('AT15')->applyFromArray($style_color_7);
    $excel->getActiveSheet()->getStyle('AU15')->applyFromArray($style_color_7);
    $excel->getActiveSheet()->getStyle('AV15')->applyFromArray($style_color_7);
    $excel->getActiveSheet()->getStyle('AW15')->applyFromArray($style_color_7);
    $excel->getActiveSheet()->getStyle('AX15')->applyFromArray($style_color_7);
    $excel->getActiveSheet()->getStyle('AY15')->applyFromArray($style_color_7);
    $excel->getActiveSheet()->getStyle('AZ15')->applyFromArray($style_color_7);
    $excel->getActiveSheet()->getStyle('BA15')->applyFromArray($style_color_7);
    $excel->getActiveSheet()->getStyle('BB15')->applyFromArray($style_color_7);
    $excel->getActiveSheet()->getStyle('BC15')->applyFromArray($style_color_7);

    $excel->getActiveSheet()->getStyle('BD14:BK14')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BD15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BE15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BF15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BG15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BH15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BI15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BJ15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BK15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BD14:BK14')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BD15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BE15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BF15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BG15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BH15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BI15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BJ15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BK15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BD14:BK14')->applyFromArray($style_color_8);
    $excel->getActiveSheet()->getStyle('BD15')->applyFromArray($style_color_8);
    $excel->getActiveSheet()->getStyle('BE15')->applyFromArray($style_color_8);
    $excel->getActiveSheet()->getStyle('BF15')->applyFromArray($style_color_8);
    $excel->getActiveSheet()->getStyle('BG15')->applyFromArray($style_color_8);
    $excel->getActiveSheet()->getStyle('BH15')->applyFromArray($style_color_8);
    $excel->getActiveSheet()->getStyle('BI15')->applyFromArray($style_color_8);
    $excel->getActiveSheet()->getStyle('BJ15')->applyFromArray($style_color_8);
    $excel->getActiveSheet()->getStyle('BK15')->applyFromArray($style_color_8);

    $excel->getActiveSheet()->getStyle('BL14:BT14')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BL15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BM15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BN15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BO15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BP15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BQ15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BR15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BS15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BT15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BL14:BT14')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BL15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BM15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BN15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BO15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BP15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BQ15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BR15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BS15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BT15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BL14:BT14')->applyFromArray($style_color_9);
    $excel->getActiveSheet()->getStyle('BL15')->applyFromArray($style_color_9);
    $excel->getActiveSheet()->getStyle('BM15')->applyFromArray($style_color_9);
    $excel->getActiveSheet()->getStyle('BN15')->applyFromArray($style_color_9);
    $excel->getActiveSheet()->getStyle('BO15')->applyFromArray($style_color_9);
    $excel->getActiveSheet()->getStyle('BP15')->applyFromArray($style_color_9);
    $excel->getActiveSheet()->getStyle('BQ15')->applyFromArray($style_color_9);
    $excel->getActiveSheet()->getStyle('BR15')->applyFromArray($style_color_9);
    $excel->getActiveSheet()->getStyle('BS15')->applyFromArray($style_color_9);
    $excel->getActiveSheet()->getStyle('BT15')->applyFromArray($style_color_9);

    $excel->getActiveSheet()->getStyle('BU14:BV14')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BU15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BV15')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BU14:BV14')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BU15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BV15')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BU14:BV14')->applyFromArray($style_color_10);
    $excel->getActiveSheet()->getStyle('BU15')->applyFromArray($style_color_10);
    $excel->getActiveSheet()->getStyle('BV15')->applyFromArray($style_color_10);

    if($type == 'WIP'){
      $spk = $this->Lokasi_model->get_detil_spk_sbt($lokasi['lokasi'], $lokasi['kebun']);
    }
    else{
      $spk = $this->Lokasi_model->get_detil_spk_sbt_panen($lok, 'P'.substr($produksi["wilayah"], 1, 2), substr($produksi['real_dan_sisa_rencana_tgl_selesai_panen'], 0, 7));
    }

    $cek = 0;
    $numrow = 16;
    foreach($spk as $data){
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->umur_hari);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->umur_bulan);

      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, '=DATE('.date('Y', strtotime($data->tanggal)).', '.date('m', strtotime($data->tanggal)).', '.date('d', strtotime($data->tanggal)).')');
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->code_activity);
      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->desc_activity);
      $excel->getActiveSheet()->mergeCells('F'.$numrow.':H'.$numrow);

      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->hasil_efektif);
      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->HKO);
      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->Labour);
      $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->Charge);
      $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->Material);
      $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->Total_Biaya);

      $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->Penarik);
      $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data->Implement);

      $excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data->Urea);
      $excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data->Za);
      $excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $data->K2SO4);
      $excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $data->KCL);
      $excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $data->TSP);
      $excel->setActiveSheetIndex(0)->setCellValue('V'.$numrow, $data->DAP);
      $excel->setActiveSheetIndex(0)->setCellValue('W'.$numrow, $data->MgSO4);
      $excel->setActiveSheetIndex(0)->setCellValue('X'.$numrow, $data->Kieserite);
      $excel->setActiveSheetIndex(0)->setCellValue('Y'.$numrow, $data->FeSO4);
      $excel->setActiveSheetIndex(0)->setCellValue('Z'.$numrow, $data->ZnSO4);
      $excel->setActiveSheetIndex(0)->setCellValue('AA'.$numrow, $data->Dolomite);
      $excel->setActiveSheetIndex(0)->setCellValue('AB'.$numrow, $data->Gypsum);
      $excel->setActiveSheetIndex(0)->setCellValue('AC'.$numrow, $data->CuSO4);
      $excel->setActiveSheetIndex(0)->setCellValue('AD'.$numrow, $data->Borax);
      $excel->setActiveSheetIndex(0)->setCellValue('AE'.$numrow, $data->LOB);
      $excel->setActiveSheetIndex(0)->setCellValue('AF'.$numrow, $data->CaCl2);
      $excel->setActiveSheetIndex(0)->setCellValue('AG'.$numrow, $data->Calcibor);
      $excel->setActiveSheetIndex(0)->setCellValue('AH'.$numrow, $data->Kompos);
      $excel->setActiveSheetIndex(0)->setCellValue('AI'.$numrow, $data->Belerang);
      $excel->setActiveSheetIndex(0)->setCellValue('AJ'.$numrow, $data->Kieserite_G);
      $excel->setActiveSheetIndex(0)->setCellValue('AK'.$numrow, $data->NPK);
      $excel->setActiveSheetIndex(0)->setCellValue('AL'.$numrow, $data->Petro_Cas);

      $excel->setActiveSheetIndex(0)->setCellValue('AM'.$numrow, $data->Bromacyl);
      $excel->setActiveSheetIndex(0)->setCellValue('AN'.$numrow, $data->Diuron);
      $excel->setActiveSheetIndex(0)->setCellValue('AO'.$numrow, $data->Glyphosate);
      $excel->setActiveSheetIndex(0)->setCellValue('AP'.$numrow, $data->Quizalofop);
      $excel->setActiveSheetIndex(0)->setCellValue('AQ'.$numrow, $data->Ametrine);
      $excel->setActiveSheetIndex(0)->setCellValue('AR'.$numrow, $data->Bazza);

      $excel->setActiveSheetIndex(0)->setCellValue('AS'.$numrow, $data->Tekasi);
      $excel->setActiveSheetIndex(0)->setCellValue('AT'.$numrow, $data->Tekila);
      $excel->setActiveSheetIndex(0)->setCellValue('AU'.$numrow, $data->Chlorpyrifos);
      $excel->setActiveSheetIndex(0)->setCellValue('AV'.$numrow, $data->Sidazinon);
      $excel->setActiveSheetIndex(0)->setCellValue('AW'.$numrow, $data->Propoxur);
      $excel->setActiveSheetIndex(0)->setCellValue('AX'.$numrow, $data->Cypermethrin);
      $excel->setActiveSheetIndex(0)->setCellValue('AY'.$numrow, $data->Bifentrin_EC);
      $excel->setActiveSheetIndex(0)->setCellValue('AZ'.$numrow, $data->Bifentrin_G);
      $excel->setActiveSheetIndex(0)->setCellValue('BA'.$numrow, $data->BPMC);
      $excel->setActiveSheetIndex(0)->setCellValue('BB'.$numrow, $data->Clorpyrifos);
      $excel->setActiveSheetIndex(0)->setCellValue('BC'.$numrow, $data->Abamectin);

      $excel->setActiveSheetIndex(0)->setCellValue('BD'.$numrow, $data->Fosetil);
      $excel->setActiveSheetIndex(0)->setCellValue('BE'.$numrow, $data->Metalaxil);
      $excel->setActiveSheetIndex(0)->setCellValue('BF'.$numrow, $data->Propiconazole);
      $excel->setActiveSheetIndex(0)->setCellValue('BG'.$numrow, $data->Prochloraz);
      $excel->setActiveSheetIndex(0)->setCellValue('BH'.$numrow, $data->Mankozeb);
      $excel->setActiveSheetIndex(0)->setCellValue('BI'.$numrow, $data->Folirfos);
      $excel->setActiveSheetIndex(0)->setCellValue('BJ'.$numrow, $data->H3PO3);
      $excel->setActiveSheetIndex(0)->setCellValue('BK'.$numrow, $data->Detazeb);

      $excel->setActiveSheetIndex(0)->setCellValue('BL'.$numrow, $data->Sanisol);
      $excel->setActiveSheetIndex(0)->setCellValue('BM'.$numrow, $data->Ethylene);
      $excel->setActiveSheetIndex(0)->setCellValue('BN'.$numrow, $data->Ethepon);
      $excel->setActiveSheetIndex(0)->setCellValue('BO'.$numrow, $data->Kaolin);
      $excel->setActiveSheetIndex(0)->setCellValue('BP'.$numrow, $data->Zeolit);
      $excel->setActiveSheetIndex(0)->setCellValue('BQ'.$numrow, $data->Rabas);
      $excel->setActiveSheetIndex(0)->setCellValue('BR'.$numrow, $data->Ratgone);
      $excel->setActiveSheetIndex(0)->setCellValue('BS'.$numrow, $data->Indostick);
      $excel->setActiveSheetIndex(0)->setCellValue('BT'.$numrow, $data->Organosilicon);

      $excel->setActiveSheetIndex(0)->setCellValue('BU'.$numrow, $data->group_cost_code);
      $excel->setActiveSheetIndex(0)->setCellValue('BV'.$numrow, $data->group_cost_desc);

    //   if($cek == 0){
    //     $border = $style_border_top;
    //   }
    //   else if($cek == (sizeof($spk) - 1)){
    //     $border = $style_border_bottom;
    //   }
    //   else{
        $border = $style_border_wing;
    //   }

      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($border);

      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('D'.$numrow)->getNumberFormat()->setFormatCode('dd/mm/yy');
      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('B'.$numrow.':E'.$numrow)->applyFromArray($style_center);
      $excel->getActiveSheet()->getStyle('F'.$numrow.':H'.$numrow)->applyFromArray($border);

      $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('I'.$numrow.':J'.$numrow)->getNumberFormat()->setFormatCode('#,##0.00');
      $excel->getActiveSheet()->getStyle('K'.$numrow.':N'.$numrow)->getNumberFormat()->setFormatCode('#,##0');
      $excel->getActiveSheet()->getStyle('I'.$numrow.':N'.$numrow)->applyFromArray($style_right);

      $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($border);

      $excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('T'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('U'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('V'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('W'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('X'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('Y'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('Z'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('AA'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('AB'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('AC'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('AD'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('AE'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('AF'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('AG'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('AH'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('AI'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('AJ'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('AK'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('AL'.$numrow)->applyFromArray($border);

      $excel->getActiveSheet()->getStyle('AM'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('AN'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('AO'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('AP'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('AQ'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('AR'.$numrow)->applyFromArray($border);

      $excel->getActiveSheet()->getStyle('AS'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('AT'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('AU'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('AV'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('AW'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('AX'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('AY'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('AZ'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('BA'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('BB'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('BC'.$numrow)->applyFromArray($border);

      $excel->getActiveSheet()->getStyle('BD'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('BE'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('BF'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('BG'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('BH'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('BI'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('BJ'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('BK'.$numrow)->applyFromArray($border);

      $excel->getActiveSheet()->getStyle('BL'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('BM'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('BN'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('BO'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('BP'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('BQ'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('BR'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('BS'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('BT'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('Q'.$numrow.':BT'.$numrow)->getNumberFormat()->setFormatCode('#,##0.00');
      $excel->getActiveSheet()->getStyle('Q'.$numrow.':BT'.$numrow)->applyFromArray($style_right);

      $excel->getActiveSheet()->getStyle('BU'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('BU'.$numrow)->applyFromArray($style_center);
      $excel->getActiveSheet()->getStyle('BV'.$numrow)->applyFromArray($border);

      $cek++;
      $numrow++;
    }

    // Set width kolom
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(1);

    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(8);
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(7);

    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(16);
    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(15);

    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(14);
    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(8);
    $excel->getActiveSheet()->getColumnDimension('K')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('M')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('N')->setWidth(15);

    $excel->getActiveSheet()->getColumnDimension('O')->setWidth(50);
    $excel->getActiveSheet()->getColumnDimension('P')->setWidth(50);

    $excel->getActiveSheet()->getColumnDimension('Q')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('R')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('S')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('T')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('U')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('V')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('W')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('X')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('Y')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('Z')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('AA')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('AB')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('AC')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('AD')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('AE')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('AF')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('AG')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('AH')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('AI')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('AJ')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('AK')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('AL')->setWidth(15);

    $excel->getActiveSheet()->getColumnDimension('AM')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('AN')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('AO')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('AP')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('AQ')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('AR')->setWidth(15);

    $excel->getActiveSheet()->getColumnDimension('AS')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('AT')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('AU')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('AV')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('AW')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('AX')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('AY')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('AZ')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('BA')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('BB')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('BC')->setWidth(15);

    $excel->getActiveSheet()->getColumnDimension('BD')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('BE')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('BF')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('BG')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('BH')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('BI')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('BJ')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('BK')->setWidth(15);

    $excel->getActiveSheet()->getColumnDimension('BL')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('BM')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('BN')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('BO')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('BP')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('BQ')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('BR')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('BS')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('BT')->setWidth(15);

    $excel->getActiveSheet()->getColumnDimension('BU')->setWidth(7);
    $excel->getActiveSheet()->getColumnDimension('BV')->setWidth(25);

    $excel->getActiveSheet()->getColumnDimension('BW')->setWidth(1);

    $excel->getActiveSheet()->freezePane('I16');

    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Detail Lokasi SPK");
    $excel->setActiveSheetIndex(0);

    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Detail SPK '.$lok.' '.date("Ymd", strtotime($konstanta['nilai'])).'.xlsx"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');

    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
  }
}
