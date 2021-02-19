<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class export_Perlocation extends CI_Controller {

  public function __construct(){
    parent::__construct();

    $this->load->model('Lokasi_model');
    $this->load->model('User_model');
    $this->load->model('Konstanta_model');
    $this->load->model('Wilayah_model');
    $this->load->model('Raport_model');
  }

  public function export_perlocation(){
		session_start();
    $code = $this->input->get('code');
    $type = $this->input->get('type');
		$category_ha = $this->input->get("category_ha");
		$category_kg = $this->input->get("category_kg");
    $konstanta = $this->Konstanta_model->get_konstanta_code("TGL_TARIK_DATA");
    $YEAR_BASE = $this->Konstanta_model->get_konstanta_code("YEAR_BASE");
    $account = $this->User_model->get_user_index($_SESSION['index']);

    if($type == 'WIP'){
		    $data['perlocation'] = $this->Raport_model->get_perlocation_wilayah($code, $category_ha, $category_kg);
    }
    else{

    }
    // die();

    // Load plugin PHPExcel nya
    include APPPATH.'third_party/PHPExcel/PHPExcel.php';

    // Panggil class PHPExcel nya
    $excel = new PHPExcel();

    // Settingan awal fil excel
    $excel->getProperties()->setCreator('Asri Julianda')
                 ->setLastModifiedBy($account['nama'])
                 ->setTitle("Perlocation ".$code." ".date("Ymd", strtotime($konstanta['nilai'])))
                 ->setSubject("SPK Lokasi ".$code)
                 ->setDescription("Perlocation ".$code)
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
        'color' => array('rgb' => '228B22')
      )
    );
    $style_color_2 = array(
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb' => '1E90FF')
      )
    );
    $style_color_3 = array(
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb' => '4B0082')
      )
    );
    $style_color_4 = array(
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb' => '00FF00')
      )
    );
    $style_color_5 = array(
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb' => 'FFFF00')
      )
    );
    $style_color_6 = array(
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb' => 'FF0000')
      )
    );
    $style_color_7 = array(
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb' => '008000')
      )
    );
    $style_color_8 = array(
      'fill' => array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'color' => array('rgb' => '008080')
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

    $excel->setActiveSheetIndex(0)->setCellValue('B2', "PG");
    $excel->getActiveSheet()->mergeCells('B2:B3');
    $excel->setActiveSheetIndex(0)->setCellValue('C2', "Wilayah");
    $excel->getActiveSheet()->mergeCells('C2:C3');
    $excel->setActiveSheetIndex(0)->setCellValue('D2', "Kebun");
    $excel->getActiveSheet()->mergeCells('D2:D3');
    $excel->setActiveSheetIndex(0)->setCellValue('E2', "Lokasi");
    $excel->getActiveSheet()->mergeCells('E2:E3');
    $excel->setActiveSheetIndex(0)->setCellValue('F2', "Umur");
    $excel->getActiveSheet()->mergeCells('F2:F3');

    $excel->setActiveSheetIndex(0)->setCellValue('G2', "Bibit");
    $excel->getActiveSheet()->mergeCells('G2:I2');
    $excel->setActiveSheetIndex(0)->setCellValue('G3', "Jenis");
    $excel->setActiveSheetIndex(0)->setCellValue('H3', "Varian");
    $excel->setActiveSheetIndex(0)->setCellValue('I3', "Kelas");

    $excel->setActiveSheetIndex(0)->setCellValue('J2', "Status");
    $excel->getActiveSheet()->mergeCells('J2:J3');
    $excel->setActiveSheetIndex(0)->setCellValue('K2', "Luas");
    $excel->getActiveSheet()->mergeCells('K2:K3');
    $excel->setActiveSheetIndex(0)->setCellValue('L2', "Tonase");
    $excel->getActiveSheet()->mergeCells('L2:L3');
    $excel->setActiveSheetIndex(0)->setCellValue('M2', "Yield");
    $excel->getActiveSheet()->mergeCells('M2:M3');

    $excel->setActiveSheetIndex(0)->setCellValue('N2', "Tanggal Forcing");
    $excel->getActiveSheet()->mergeCells('N2:N3');
    $excel->setActiveSheetIndex(0)->setCellValue('O2', "Tanggal Panen");
    $excel->getActiveSheet()->mergeCells('O2:O3');

    $excel->setActiveSheetIndex(0)->setCellValue('P2', "Rp/Ha");
    $excel->getActiveSheet()->mergeCells('P2:U2');
    $excel->setActiveSheetIndex(0)->setCellValue('P3', "Budget");
    $excel->setActiveSheetIndex(0)->setCellValue('Q3', "Realisasi");
    $excel->setActiveSheetIndex(0)->setCellValue('R3', "Sisa Saldo");
    $excel->setActiveSheetIndex(0)->setCellValue('S3', "R+F");
    $excel->setActiveSheetIndex(0)->setCellValue('T3', "Devisiasi");
    $excel->setActiveSheetIndex(0)->setCellValue('U3', "Cateory");

    $excel->setActiveSheetIndex(0)->setCellValue('V2', "Rp/Ha");
    $excel->getActiveSheet()->mergeCells('V2:Z2');
    $excel->setActiveSheetIndex(0)->setCellValue('V3', "Budget");
    $excel->setActiveSheetIndex(0)->setCellValue('W3', "Realisasi");
    $excel->setActiveSheetIndex(0)->setCellValue('X3', "R+F");
    $excel->setActiveSheetIndex(0)->setCellValue('Y3', "Devisiasi");
    $excel->setActiveSheetIndex(0)->setCellValue('Z3', "Cateory");

    $excel->setActiveSheetIndex(0)->setCellValue('AA2', "Titik Lokasi Air");
    $excel->getActiveSheet()->mergeCells('AA2:AA3');
    $excel->setActiveSheetIndex(0)->setCellValue('AB2', "Jenis Sumber Air");
    $excel->getActiveSheet()->mergeCells('AB2:AB3');

    $excel->setActiveSheetIndex(0)->setCellValue('AC2', "Land Preparation");
    $excel->getActiveSheet()->mergeCells('AC2:AF2');
    $excel->setActiveSheetIndex(0)->setCellValue('AC3', "BPP");
    $excel->setActiveSheetIndex(0)->setCellValue('AD3', "Real");
    $excel->setActiveSheetIndex(0)->setCellValue('AE3', "Forcast");
    $excel->setActiveSheetIndex(0)->setCellValue('AF3', "Total");

    $excel->setActiveSheetIndex(0)->setCellValue('AG2', "Seedling");
    $excel->getActiveSheet()->mergeCells('AG2:AJ2');
    $excel->setActiveSheetIndex(0)->setCellValue('AG3', "BPP");
    $excel->setActiveSheetIndex(0)->setCellValue('AH3', "Real");
    $excel->setActiveSheetIndex(0)->setCellValue('AI3', "Forcast");
    $excel->setActiveSheetIndex(0)->setCellValue('AJ3', "Total");

    $excel->setActiveSheetIndex(0)->setCellValue('AK2', "Planting");
    $excel->getActiveSheet()->mergeCells('AK2:AN2');
    $excel->setActiveSheetIndex(0)->setCellValue('AK3', "BPP");
    $excel->setActiveSheetIndex(0)->setCellValue('AL3', "Real");
    $excel->setActiveSheetIndex(0)->setCellValue('AM3', "Forcast");
    $excel->setActiveSheetIndex(0)->setCellValue('AN3', "Total");

    $excel->setActiveSheetIndex(0)->setCellValue('AO2', "Road & Drainage");
    $excel->getActiveSheet()->mergeCells('AO2:AR2');
    $excel->setActiveSheetIndex(0)->setCellValue('AO3', "BPP");
    $excel->setActiveSheetIndex(0)->setCellValue('AP3', "Real");
    $excel->setActiveSheetIndex(0)->setCellValue('AQ3', "Forcast");
    $excel->setActiveSheetIndex(0)->setCellValue('AR3', "Total");

    $excel->setActiveSheetIndex(0)->setCellValue('AS2', "Fertilization");
    $excel->getActiveSheet()->mergeCells('AS2:AV2');
    $excel->setActiveSheetIndex(0)->setCellValue('AS3', "BPP");
    $excel->setActiveSheetIndex(0)->setCellValue('AT3', "Real");
    $excel->setActiveSheetIndex(0)->setCellValue('AU3', "Forcast");
    $excel->setActiveSheetIndex(0)->setCellValue('AV3', "Total");

    $excel->setActiveSheetIndex(0)->setCellValue('AW2', "Weed Control");
    $excel->getActiveSheet()->mergeCells('AW2:AZ2');
    $excel->setActiveSheetIndex(0)->setCellValue('AW3', "BPP");
    $excel->setActiveSheetIndex(0)->setCellValue('AX3', "Real");
    $excel->setActiveSheetIndex(0)->setCellValue('AY3', "Forcast");
    $excel->setActiveSheetIndex(0)->setCellValue('AZ3', "Total");
    //
    $excel->setActiveSheetIndex(0)->setCellValue('BA2', "Plant Pest Control");
    $excel->getActiveSheet()->mergeCells('BA2:BD2');
    $excel->setActiveSheetIndex(0)->setCellValue('BA3', "BPP");
    $excel->setActiveSheetIndex(0)->setCellValue('BB3', "Real");
    $excel->setActiveSheetIndex(0)->setCellValue('BC3', "Forcast");
    $excel->setActiveSheetIndex(0)->setCellValue('BD3', "Total");

    $excel->setActiveSheetIndex(0)->setCellValue('BE2', "Forcing");
    $excel->getActiveSheet()->mergeCells('BE2:BH2');
    $excel->setActiveSheetIndex(0)->setCellValue('BE3', "BPP");
    $excel->setActiveSheetIndex(0)->setCellValue('BF3', "Real");
    $excel->setActiveSheetIndex(0)->setCellValue('BG3', "Forcast");
    $excel->setActiveSheetIndex(0)->setCellValue('BH3', "Total");
    //
    $excel->setActiveSheetIndex(0)->setCellValue('BI2', "Pre Harvesting");
    $excel->getActiveSheet()->mergeCells('BI2:BL2');
    $excel->setActiveSheetIndex(0)->setCellValue('BI3', "BPP");
    $excel->setActiveSheetIndex(0)->setCellValue('BJ3', "Real");
    $excel->setActiveSheetIndex(0)->setCellValue('BK3', "Forcast");
    $excel->setActiveSheetIndex(0)->setCellValue('BL3', "Total");

    $excel->setActiveSheetIndex(0)->setCellValue('BM2', "Harvesting");
    $excel->getActiveSheet()->mergeCells('BM2:BP2');
    $excel->setActiveSheetIndex(0)->setCellValue('BM3', "BPP");
    $excel->setActiveSheetIndex(0)->setCellValue('BN3', "Real");
    $excel->setActiveSheetIndex(0)->setCellValue('BO3', "Forcast");
    $excel->setActiveSheetIndex(0)->setCellValue('BP3', "Total");

    $excel->setActiveSheetIndex(0)->setCellValue('BQ2', "Observation");
    $excel->getActiveSheet()->mergeCells('BQ2:BT2');
    $excel->setActiveSheetIndex(0)->setCellValue('BQ3', "BPP");
    $excel->setActiveSheetIndex(0)->setCellValue('BR3', "Real");
    $excel->setActiveSheetIndex(0)->setCellValue('BS3', "Forcast");
    $excel->setActiveSheetIndex(0)->setCellValue('BT3', "Total");

    $excel->setActiveSheetIndex(0)->setCellValue('BU2', "Plant Selection");
    $excel->getActiveSheet()->mergeCells('BU2:BX2');
    $excel->setActiveSheetIndex(0)->setCellValue('BU3', "BPP");
    $excel->setActiveSheetIndex(0)->setCellValue('BV3', "Real");
    $excel->setActiveSheetIndex(0)->setCellValue('BW3', "Forcast");
    $excel->setActiveSheetIndex(0)->setCellValue('BX3', "Total");

    $excel->setActiveSheetIndex(0)->setCellValue('BY2', "Irrigation / Springkle");
    $excel->getActiveSheet()->mergeCells('BY2:CB2');
    $excel->setActiveSheetIndex(0)->setCellValue('BY3', "BPP");
    $excel->setActiveSheetIndex(0)->setCellValue('BZ3', "Real");
    $excel->setActiveSheetIndex(0)->setCellValue('CA3', "Forcast");
    $excel->setActiveSheetIndex(0)->setCellValue('CB3', "Total");

    $excel->setActiveSheetIndex(0)->setCellValue('CC2', "Guard / Pull / Transportation");
    $excel->getActiveSheet()->mergeCells('CC2:CF2');
    $excel->setActiveSheetIndex(0)->setCellValue('CC3', "BPP");
    $excel->setActiveSheetIndex(0)->setCellValue('CD3', "Real");
    $excel->setActiveSheetIndex(0)->setCellValue('CE3', "Forcast");
    $excel->setActiveSheetIndex(0)->setCellValue('CF3', "Total");

    $excel->setActiveSheetIndex(0)->setCellValue('CG2', "Others");
    $excel->getActiveSheet()->mergeCells('CG2:CJ2');
    $excel->setActiveSheetIndex(0)->setCellValue('CG3', "BPP");
    $excel->setActiveSheetIndex(0)->setCellValue('CH3', "Real");
    $excel->setActiveSheetIndex(0)->setCellValue('CI3', "Forcast");
    $excel->setActiveSheetIndex(0)->setCellValue('CJ3', "Total");

    // Apply style header yang telah kita buat tadi ke masing-masing kolom header

    $excel->getActiveSheet()->getStyle('B2:B3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('C2:C3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('D2:D3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('E2:E3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('F2:F3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('B2:B3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('C2:C3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('D2:D3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('E2:E3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('F2:F3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('B2:B3')->applyFromArray($style_color_1);
    $excel->getActiveSheet()->getStyle('C2:C3')->applyFromArray($style_color_1);
    $excel->getActiveSheet()->getStyle('D2:D3')->applyFromArray($style_color_1);
    $excel->getActiveSheet()->getStyle('E2:E3')->applyFromArray($style_color_1);
    $excel->getActiveSheet()->getStyle('F2:F3')->applyFromArray($style_color_1);

    $excel->getActiveSheet()->getStyle('G2:I2')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('G2:I2')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('G2:I2')->applyFromArray($style_color_1);
    $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_color_1);
    $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_color_1);
    $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_color_1);

    $excel->getActiveSheet()->getStyle('J2:J3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('K2:K3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('L2:L3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('M2:M3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('N2:N3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('O2:O3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('J2:J3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('K2:K3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('L2:L3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('M2:M3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('N2:N3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('O2:O3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('J2:J3')->applyFromArray($style_color_1);
    $excel->getActiveSheet()->getStyle('K2:K3')->applyFromArray($style_color_1);
    $excel->getActiveSheet()->getStyle('L2:L3')->applyFromArray($style_color_1);
    $excel->getActiveSheet()->getStyle('M2:M3')->applyFromArray($style_color_1);
    $excel->getActiveSheet()->getStyle('N2:N3')->applyFromArray($style_color_1);
    $excel->getActiveSheet()->getStyle('O2:O3')->applyFromArray($style_color_1);

    $excel->getActiveSheet()->getStyle('P2:U2')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('R3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('S3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('T3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('U3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('P2:U2')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('R3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('S3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('T3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('U3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('P2:U2')->applyFromArray($style_color_2);
    $excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_color_2);
    $excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_color_2);
    $excel->getActiveSheet()->getStyle('R3')->applyFromArray($style_color_2);
    $excel->getActiveSheet()->getStyle('S3')->applyFromArray($style_color_2);
    $excel->getActiveSheet()->getStyle('T3')->applyFromArray($style_color_2);
    $excel->getActiveSheet()->getStyle('U3')->applyFromArray($style_color_2);

    $excel->getActiveSheet()->getStyle('V2:Z2')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('V3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('W3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('X3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('Y3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('Z3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('V2:Z2')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('V3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('W3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('X3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('Y3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('Z3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('V2:Z2')->applyFromArray($style_color_2);
    $excel->getActiveSheet()->getStyle('V3')->applyFromArray($style_color_2);
    $excel->getActiveSheet()->getStyle('W3')->applyFromArray($style_color_2);
    $excel->getActiveSheet()->getStyle('X3')->applyFromArray($style_color_2);
    $excel->getActiveSheet()->getStyle('Y3')->applyFromArray($style_color_2);
    $excel->getActiveSheet()->getStyle('Z3')->applyFromArray($style_color_2);

    $excel->getActiveSheet()->getStyle('AA2:AA3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AB2:AB3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AA2:AA3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AB2:AB3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AA2:AA3')->applyFromArray($style_color_1);
    $excel->getActiveSheet()->getStyle('AB2:AB3')->applyFromArray($style_color_1);

    $excel->getActiveSheet()->getStyle('AC2:AF2')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AC3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AD3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AE3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AF3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AC2:AF2')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AC3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AD3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AE3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AF3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AC2:AF2')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('AC3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('AD3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('AE3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('AF3')->applyFromArray($style_color_3);

    $excel->getActiveSheet()->getStyle('AG2:AJ2')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AG3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AH3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AI3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AJ3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AG2:AJ2')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AG3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AH3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AI3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AJ3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AG2:AJ2')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('AG3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('AH3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('AI3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('AJ3')->applyFromArray($style_color_3);

    $excel->getActiveSheet()->getStyle('AK2:AN2')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AK3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AL3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AM3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AN3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AK2:AN2')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AK3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AL3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AM3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AN3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AK2:AN2')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('AK3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('AL3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('AM3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('AN3')->applyFromArray($style_color_3);

    $excel->getActiveSheet()->getStyle('AO2:AR2')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AO3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AP3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AQ3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AR3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AO2:AR2')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AO3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AP3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AQ3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AR3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AO2:AR2')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('AO3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('AP3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('AQ3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('AR3')->applyFromArray($style_color_3);

    $excel->getActiveSheet()->getStyle('AS2:AV2')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AS3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AT3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AU3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AV3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AS2:AV2')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AS3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AT3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AU3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AV3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AS2:AV2')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('AS3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('AT3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('AU3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('AV3')->applyFromArray($style_color_3);

    $excel->getActiveSheet()->getStyle('AW2:AZ2')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AW3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AX3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AY3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AZ3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('AW2:AZ2')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AW3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AX3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AY3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AZ3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('AW2:AZ2')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('AW3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('AX3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('AY3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('AZ3')->applyFromArray($style_color_3);

    $excel->getActiveSheet()->getStyle('BA2:BD2')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BA3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BB3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BC3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BD3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BA2:BD2')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BA3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BB3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BC3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BD3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BA2:BD2')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('BA3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('BB3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('BC3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('BD3')->applyFromArray($style_color_3);

    $excel->getActiveSheet()->getStyle('BE2:BH2')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BE3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BF3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BG3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BH3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BE2:BH2')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BE3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BF3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BG3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BH3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BE2:BH2')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('BE3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('BF3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('BG3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('BH3')->applyFromArray($style_color_3);

    $excel->getActiveSheet()->getStyle('BI2:BL2')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BI3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BJ3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BK3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BL3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BI2:BL2')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BI3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BJ3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BK3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BL3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BI2:BL2')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('BI3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('BJ3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('BK3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('BL3')->applyFromArray($style_color_3);

    $excel->getActiveSheet()->getStyle('BM2:BP2')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BM3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BN3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BO3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BP3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BM2:BP2')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BM3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BN3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BO3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BP3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BM2:BP2')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('BM3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('BN3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('BO3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('BP3')->applyFromArray($style_color_3);

    $excel->getActiveSheet()->getStyle('BQ2:BT2')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BQ3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BR3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BS3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BT3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BQ2:BT2')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BQ3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BR3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BS3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BT3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BQ2:BT2')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('BQ3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('BR3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('BS3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('BT3')->applyFromArray($style_color_3);

    $excel->getActiveSheet()->getStyle('BU2:BX2')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BU3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BV3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BW3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BX3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BU2:BX2')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BU3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BV3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BW3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BX3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BU2:BX2')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('BU3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('BV3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('BW3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('BX3')->applyFromArray($style_color_3);

    $excel->getActiveSheet()->getStyle('BY2:CB2')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BY3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BZ3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('CA3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('CB3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('BY2:CB2')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BY3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BZ3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('CA3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('CB3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('BY2:CB2')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('BY3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('BZ3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('CA3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('CB3')->applyFromArray($style_color_3);

    $excel->getActiveSheet()->getStyle('CC2:CF2')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('CC3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('CD3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('CE3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('CF3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('CC2:CF2')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('CC3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('CD3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('CE3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('CF3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('CC2:CF2')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('CC3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('CD3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('CE3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('CF3')->applyFromArray($style_color_3);

    $excel->getActiveSheet()->getStyle('CG2:CJ2')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('CG3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('CH3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('CI3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('CJ3')->applyFromArray($style_sub_header_center);
    $excel->getActiveSheet()->getStyle('CG2:CJ2')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('CG3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('CH3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('CI3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('CJ3')->applyFromArray($style_border_full);
    $excel->getActiveSheet()->getStyle('CG2:CJ2')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('CG3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('CH3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('CI3')->applyFromArray($style_color_3);
    $excel->getActiveSheet()->getStyle('CJ3')->applyFromArray($style_color_3);

    if($type == 'WIP'){
      $perlocation = $this->Raport_model->get_perlocation($code, $category_ha, $category_kg);
    }
    else{

    }

    $cek = 0;
    $numrow = 4;
    foreach($perlocation as $data){
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->pg);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->wilayah);
      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->kebun);
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->lokasi);
      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->umur);
      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->jenis_bibit);
      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->varian_bibit);
      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->kelas_bibit);
      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->status);
      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->tonase);
      $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, round($data->tonase / $data->luas));

      $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, '=DATE('.date('Y', strtotime($data->tgl_rencana_forcing)).', '.date('m', strtotime($data->tgl_rencana_forcing)).', '.date('d', strtotime($data->tgl_rencana_forcing)).')');
      $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, '=DATE('.date('Y', strtotime($data->tgl_rencana_panen)).', '.date('m', strtotime($data->tgl_rencana_panen)).', '.date('d', strtotime($data->tgl_rencana_panen)).')');

      $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data->budget_rp_per_ha);
      $excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data->realisasi_rp_per_ha);
      $excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data->sisa_saldo);
      $excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $data->rf_rp_per_ha);
      $excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, ($data->deviasi_rp_per_ha));
      $excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $data->category_rp_per_ha);

      $excel->setActiveSheetIndex(0)->setCellValue('V'.$numrow, $data->budget_rp_per_kg);
      $excel->setActiveSheetIndex(0)->setCellValue('W'.$numrow, $data->realisasi_rp_per_kg);
      $excel->setActiveSheetIndex(0)->setCellValue('X'.$numrow, $data->rf_rp_per_kg);
      $excel->setActiveSheetIndex(0)->setCellValue('Y'.$numrow, ($data->deviasi_rp_per_kg));
      $excel->setActiveSheetIndex(0)->setCellValue('Z'.$numrow, $data->category_rp_per_kg);

      if($data->titik_air != NULL){
        $titik_air = $data->titik_air;
        $sumber_air = $data->sumber_air;
      }
      else{
        $titik_air = "-";
        $sumber_air = "No Water Resource";
      }
      $excel->setActiveSheetIndex(0)->setCellValue('AA'.$numrow, $titik_air);
      $excel->setActiveSheetIndex(0)->setCellValue('AB'.$numrow, $sumber_air);

      $excel->setActiveSheetIndex(0)->setCellValue('AC'.$numrow, $data->ZN01_b / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('AD'.$numrow, $data->ZN01_r / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('AE'.$numrow, $data->ZN01_f / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('AF'.$numrow, ($data->ZN01_r + $data->ZN01_f) / $data->luas);

      $excel->setActiveSheetIndex(0)->setCellValue('AG'.$numrow, $data->ZN02_b / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('AH'.$numrow, $data->ZN02_r / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('AI'.$numrow, $data->ZN02_f / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('AJ'.$numrow, ($data->ZN02_r + $data->ZN02_f) / $data->luas);

      $excel->setActiveSheetIndex(0)->setCellValue('AK'.$numrow, $data->ZN03_b / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('AL'.$numrow, $data->ZN03_r / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('AM'.$numrow, $data->ZN03_f / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('AN'.$numrow, ($data->ZN03_r + $data->ZN03_f) / $data->luas);

      $excel->setActiveSheetIndex(0)->setCellValue('AO'.$numrow, $data->ZN04_b / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('AP'.$numrow, $data->ZN04_r / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('AQ'.$numrow, $data->ZN04_f / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('AR'.$numrow, ($data->ZN04_r + $data->ZN04_f) / $data->luas);

      $excel->setActiveSheetIndex(0)->setCellValue('AS'.$numrow, $data->ZN05_b / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('AT'.$numrow, $data->ZN05_r / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('AU'.$numrow, $data->ZN05_f / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('AV'.$numrow, ($data->ZN05_r + $data->ZN05_f) / $data->luas);

      $excel->setActiveSheetIndex(0)->setCellValue('AW'.$numrow, $data->ZN06_b / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('AX'.$numrow, $data->ZN06_r / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('AY'.$numrow, $data->ZN06_f / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('AZ'.$numrow, ($data->ZN06_r + $data->ZN06_f) / $data->luas);

      $excel->setActiveSheetIndex(0)->setCellValue('BA'.$numrow, $data->ZN07_b / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('BB'.$numrow, $data->ZN07_r / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('BC'.$numrow, $data->ZN07_f / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('BD'.$numrow, ($data->ZN07_r + $data->ZN07_f) / $data->luas);

      $excel->setActiveSheetIndex(0)->setCellValue('BE'.$numrow, $data->ZN08_b / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('BF'.$numrow, $data->ZN08_r / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('BG'.$numrow, $data->ZN08_f / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('BH'.$numrow, ($data->ZN08_r + $data->ZN08_f) / $data->luas);

      $excel->setActiveSheetIndex(0)->setCellValue('BI'.$numrow, $data->ZN09_b / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('BJ'.$numrow, $data->ZN09_r / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('BK'.$numrow, $data->ZN09_f / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('BL'.$numrow, ($data->ZN09_r + $data->ZN09_f) / $data->luas);

      $excel->setActiveSheetIndex(0)->setCellValue('BM'.$numrow, $data->ZN10_b / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('BN'.$numrow, $data->ZN10_r / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('BO'.$numrow, $data->ZN10_f / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('BP'.$numrow, ($data->ZN10_r + $data->ZN10_f) / $data->luas);

      $excel->setActiveSheetIndex(0)->setCellValue('BQ'.$numrow, $data->ZN11_b / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('BR'.$numrow, $data->ZN11_r / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('BS'.$numrow, $data->ZN11_f / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('BT'.$numrow, ($data->ZN11_r + $data->ZN11_f) / $data->luas);

      $excel->setActiveSheetIndex(0)->setCellValue('BU'.$numrow, $data->ZN12_b / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('BV'.$numrow, $data->ZN12_r / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('BW'.$numrow, $data->ZN12_f / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('BX'.$numrow, ($data->ZN12_r + $data->ZN12_f) / $data->luas);

      $excel->setActiveSheetIndex(0)->setCellValue('BY'.$numrow, $data->ZN13_b / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('BZ'.$numrow, $data->ZN13_r / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('CA'.$numrow, $data->ZN13_f / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('CB'.$numrow, ($data->ZN13_r + $data->ZN13_f) / $data->luas);

      $excel->setActiveSheetIndex(0)->setCellValue('CC'.$numrow, $data->ZN14_b / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('CD'.$numrow, $data->ZN14_r / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('CE'.$numrow, $data->ZN14_f / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('CF'.$numrow, ($data->ZN14_r + $data->ZN14_f) / $data->luas);

      $excel->setActiveSheetIndex(0)->setCellValue('CG'.$numrow, $data->ZN15_b / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('CH'.$numrow, $data->ZN15_r / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('CI'.$numrow, $data->ZN15_f / $data->luas);
      $excel->setActiveSheetIndex(0)->setCellValue('CJ'.$numrow, ($data->ZN15_r + $data->ZN15_f) / $data->luas);

      // if($cek == 0){
      //   $border = $style_border_top;
      // }
      // else if($cek == (sizeof($data) - 2)){
        // $border = $style_border_bottom;
      // }
      // else{
        $border = $style_border_wing;
      // }

      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('B'.$numrow.':J'.$numrow)->applyFromArray($style_center);
      $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('K'.$numrow)->getNumberFormat()->setFormatCode('#,##0.00');
      $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('L'.$numrow)->getNumberFormat()->setFormatCode('#,##0');
      $excel->getActiveSheet()->getStyle('K'.$numrow.':L'.$numrow)->applyFromArray($style_right);
      $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('N'.$numrow.':O'.$numrow)->getNumberFormat()->setFormatCode('dd/mm/yy');
      $excel->getActiveSheet()->getStyle('N'.$numrow.':O'.$numrow)->applyFromArray($style_center);

      $excel->getActiveSheet()->getStyle('P'.$numrow.':S'.$numrow)->getNumberFormat()->setFormatCode('#,##0');
      $excel->getActiveSheet()->getStyle('T'.$numrow)->getNumberFormat()->setFormatCode()->applyFromArray(array('code' => PHPExcel_Style_NumberFormat::FORMAT_PERCENTAGE));
      $excel->getActiveSheet()->getStyle('P'.$numrow.':U'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('T'.$numrow.':U'.$numrow)->applyFromArray($style_center);
      switch ($data->category_rp_per_ha) {
        case 'Excellent':
          $bg_color = $style_color_4;
          break;
        case 'Good':
          $bg_color = $style_color_5;
          break;
        case 'Poor':
          $bg_color = $style_color_6;
          break;
      }
      $excel->getActiveSheet()->getStyle('U'.$numrow)->applyFromArray($bg_color);

      $excel->getActiveSheet()->getStyle('V'.$numrow.':X'.$numrow)->getNumberFormat()->setFormatCode('#,##0');
      $excel->getActiveSheet()->getStyle('Y'.$numrow)->getNumberFormat()->setFormatCode()->applyFromArray(array('code' => PHPExcel_Style_NumberFormat::FORMAT_PERCENTAGE));
      $excel->getActiveSheet()->getStyle('V'.$numrow.':Z'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('Y'.$numrow.':Z'.$numrow)->applyFromArray($style_center);
      switch ($data->category_rp_per_kg) {
        case 'Excellent':
          $bg_color = $style_color_4;
          break;
        case 'Good':
          $bg_color = $style_color_5;
          break;
        case 'Poor':
          $bg_color = $style_color_6;
          break;
      }
      $excel->getActiveSheet()->getStyle('Z'.$numrow)->applyFromArray($bg_color);

      $excel->getActiveSheet()->getStyle('AA'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('AB'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('AA'.$numrow.':AB'.$numrow)->applyFromArray($style_center);
      switch ($data->sumber_air) {
        case 'Lebung':
          $bg_color = $style_color_7;
        break;
        case 'Sumur':
          $bg_color = $style_color_8;
        break;

        default:
          $bg_color = $style_color_6;
        break;
      }
      $excel->getActiveSheet()->getStyle('AB'.$numrow)->applyFromArray($bg_color);

      $excel->getActiveSheet()->getStyle('AC'.$numrow.':AF'.$numrow)->getNumberFormat()->setFormatCode('#,##0');
      $excel->getActiveSheet()->getStyle('AC'.$numrow.':AF'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('AC'.$numrow.':AF'.$numrow)->applyFromArray($style_right);

      $excel->getActiveSheet()->getStyle('AG'.$numrow.':AJ'.$numrow)->getNumberFormat()->setFormatCode('#,##0');
      $excel->getActiveSheet()->getStyle('AG'.$numrow.':AJ'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('AG'.$numrow.':AJ'.$numrow)->applyFromArray($style_right);

      $excel->getActiveSheet()->getStyle('AK'.$numrow.':AN'.$numrow)->getNumberFormat()->setFormatCode('#,##0');
      $excel->getActiveSheet()->getStyle('AK'.$numrow.':AN'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('AK'.$numrow.':AN'.$numrow)->applyFromArray($style_right);

      $excel->getActiveSheet()->getStyle('AO'.$numrow.':AR'.$numrow)->getNumberFormat()->setFormatCode('#,##0');
      $excel->getActiveSheet()->getStyle('AO'.$numrow.':AR'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('AO'.$numrow.':AR'.$numrow)->applyFromArray($style_right);

      $excel->getActiveSheet()->getStyle('AS'.$numrow.':AV'.$numrow)->getNumberFormat()->setFormatCode('#,##0');
      $excel->getActiveSheet()->getStyle('AS'.$numrow.':AV'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('AS'.$numrow.':AV'.$numrow)->applyFromArray($style_right);

      $excel->getActiveSheet()->getStyle('AW'.$numrow.':AZ'.$numrow)->getNumberFormat()->setFormatCode('#,##0');
      $excel->getActiveSheet()->getStyle('AW'.$numrow.':AZ'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('AW'.$numrow.':AZ'.$numrow)->applyFromArray($style_right);

      $excel->getActiveSheet()->getStyle('BA'.$numrow.':BD'.$numrow)->getNumberFormat()->setFormatCode('#,##0');
      $excel->getActiveSheet()->getStyle('BA'.$numrow.':BD'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('BA'.$numrow.':BD'.$numrow)->applyFromArray($style_right);

      $excel->getActiveSheet()->getStyle('BE'.$numrow.':BH'.$numrow)->getNumberFormat()->setFormatCode('#,##0');
      $excel->getActiveSheet()->getStyle('BE'.$numrow.':BH'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('BE'.$numrow.':BH'.$numrow)->applyFromArray($style_right);

      $excel->getActiveSheet()->getStyle('BI'.$numrow.':BL'.$numrow)->getNumberFormat()->setFormatCode('#,##0');
      $excel->getActiveSheet()->getStyle('BI'.$numrow.':BL'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('BI'.$numrow.':BL'.$numrow)->applyFromArray($style_right);

      $excel->getActiveSheet()->getStyle('BM'.$numrow.':BP'.$numrow)->getNumberFormat()->setFormatCode('#,##0');
      $excel->getActiveSheet()->getStyle('BM'.$numrow.':BP'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('BM'.$numrow.':BP'.$numrow)->applyFromArray($style_right);

      $excel->getActiveSheet()->getStyle('BQ'.$numrow.':BT'.$numrow)->getNumberFormat()->setFormatCode('#,##0');
      $excel->getActiveSheet()->getStyle('BQ'.$numrow.':BT'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('BQ'.$numrow.':BT'.$numrow)->applyFromArray($style_right);

      $excel->getActiveSheet()->getStyle('BU'.$numrow.':BX'.$numrow)->getNumberFormat()->setFormatCode('#,##0');
      $excel->getActiveSheet()->getStyle('BU'.$numrow.':BX'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('BU'.$numrow.':BX'.$numrow)->applyFromArray($style_right);

      $excel->getActiveSheet()->getStyle('BY'.$numrow.':CB'.$numrow)->getNumberFormat()->setFormatCode('#,##0');
      $excel->getActiveSheet()->getStyle('BY'.$numrow.':CB'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('BY'.$numrow.':CB'.$numrow)->applyFromArray($style_right);

      $excel->getActiveSheet()->getStyle('CC'.$numrow.':CF'.$numrow)->getNumberFormat()->setFormatCode('#,##0');
      $excel->getActiveSheet()->getStyle('CC'.$numrow.':CF'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('CC'.$numrow.':CF'.$numrow)->applyFromArray($style_right);

      $excel->getActiveSheet()->getStyle('CG'.$numrow.':CJ'.$numrow)->getNumberFormat()->setFormatCode('#,##0');
      $excel->getActiveSheet()->getStyle('CG'.$numrow.':CJ'.$numrow)->applyFromArray($border);
      $excel->getActiveSheet()->getStyle('CG'.$numrow.':CJ'.$numrow)->applyFromArray($style_right);

      $cek++;
      $numrow++;
    }

    // Set width kolom
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(3);

    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(8);
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(8);
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(8);
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(8);

    $excel->getActiveSheet()->getColumnDimension('F')->setWidth(6);

    $excel->getActiveSheet()->getColumnDimension('G')->setWidth(8);
    $excel->getActiveSheet()->getColumnDimension('H')->setWidth(8);
    $excel->getActiveSheet()->getColumnDimension('I')->setWidth(8);

    $excel->getActiveSheet()->getColumnDimension('J')->setWidth(8);
    $excel->getActiveSheet()->getColumnDimension('K')->setWidth(8);
    $excel->getActiveSheet()->getColumnDimension('L')->setWidth(8);
    $excel->getActiveSheet()->getColumnDimension('M')->setWidth(8);

    $excel->getActiveSheet()->getColumnDimension('N')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('O')->setWidth(15);

    $excel->getActiveSheet()->getColumnDimension('P')->setWidth(13);
    $excel->getActiveSheet()->getColumnDimension('Q')->setWidth(13);
    $excel->getActiveSheet()->getColumnDimension('R')->setWidth(13);
    $excel->getActiveSheet()->getColumnDimension('S')->setWidth(13);
    $excel->getActiveSheet()->getColumnDimension('T')->setWidth(10);
    $excel->getActiveSheet()->getColumnDimension('U')->setWidth(12);

    $excel->getActiveSheet()->getColumnDimension('V')->setWidth(10);
    $excel->getActiveSheet()->getColumnDimension('W')->setWidth(10);
    $excel->getActiveSheet()->getColumnDimension('X')->setWidth(10);
    $excel->getActiveSheet()->getColumnDimension('Y')->setWidth(10);
    $excel->getActiveSheet()->getColumnDimension('Z')->setWidth(12);

    $excel->getActiveSheet()->getColumnDimension('AA')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('AB')->setWidth(18);

    $excel->getActiveSheet()->getColumnDimension('AC')->setWidth(10);
    $excel->getActiveSheet()->getColumnDimension('AD')->setWidth(10);
    $excel->getActiveSheet()->getColumnDimension('AE')->setWidth(10);
    $excel->getActiveSheet()->getColumnDimension('AF')->setWidth(12);

    $excel->getActiveSheet()->getColumnDimension('AG')->setWidth(10);
    $excel->getActiveSheet()->getColumnDimension('AH')->setWidth(10);
    $excel->getActiveSheet()->getColumnDimension('AI')->setWidth(10);
    $excel->getActiveSheet()->getColumnDimension('AJ')->setWidth(12);

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

    $excel->getActiveSheet()->getColumnDimension('BU')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('BV')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('BW')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('BX')->setWidth(15);

    $excel->getActiveSheet()->getColumnDimension('BY')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('BZ')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('CA')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('CB')->setWidth(15);

    $excel->getActiveSheet()->getColumnDimension('CC')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('CD')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('CE')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('CF')->setWidth(15);

    $excel->getActiveSheet()->getColumnDimension('CG')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('CH')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('CI')->setWidth(15);
    $excel->getActiveSheet()->getColumnDimension('CJ')->setWidth(15);

    $excel->getActiveSheet()->getColumnDimension('CK')->setWidth(3);

    $excel->getActiveSheet()->freezePane('P4');

    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Detail Lokasi SPK");
    $excel->setActiveSheetIndex(0);

    // Proses file excel
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Perlocation '.$code.' '.date("Ymd", strtotime($konstanta['nilai'])).'.xlsx"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');

    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
  }
}
