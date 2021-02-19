<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GIS_Dashboard extends CI_Controller {
    
	function __construct(){
        parent :: __construct();
        $this->load->model('Gis_server','g');
        $this->load->model('Gis_server');
        $this->load->helper(array('form', 'url'));
        session_start();
	}

	public function index()
	{
        $date = date('Y-m-d');
        $uid = $_SESSION['index'];
        $data['script'] = $this->load->view('include/script.php',NULL,TRUE);
        $data['style'] = $this->load->view('include/styleGIS.php',NULL,TRUE);
        $data['akses'] = json_encode($this->g->getAkses($uid));
        $data['galery'] =  json_encode($this->g->getGaleryImage($date));
        $data['detailLokasi'] = json_encode($this->g->getDetailLokasi());
        $this->load->view('GIS/Dashboard.php', $data);
    }

   public function NDVI(){
        $uid = $_SESSION['index'];
        $authorization = $this->g->getAuthorization($uid);
        $page = $this->input->get('page');
        $loc = $this->input->get('loc');
        $currLoc = $this->input->get('currLoc');
        $date = $this->input->get('date');
        if($date != null){
            $date = str_replace("_"," ",$date);
        }
        $data['loc'] = $loc;
        $data['page'] = $page;
        $data['currLoc'] = $currLoc;
        $data['pageDate'] = $date;
        $data['subpage'] = 'NDVI';
		$data['script'] = $this->load->view('include/script.php',NULL,TRUE);
		$data['style'] = $this->load->view('include/styleGIS.php',NULL,TRUE);
		
		$data['modal'] =  $this->load->view('template/logoutModal.php',NULL,TRUE);	
        if($loc == 'PG'){
            if($currLoc == null){
                $pictLoc = "PG1";
            }else{
                $pictLoc = $currLoc;
            }
            $data['navbar'] = $this->load->view('template/GIS/navbarPG.php',NULL,TRUE);	
            $data['header'] = $this->load->view('template/GIS/headerPG.php', array('currLoc' => $currLoc, 'authorization' => $authorization), TRUE);if($page == 'NDVI'){
                $data['picts'] = $this->g->getPict('NDVI','NDVI',$pictLoc);
                $data['allPicts'] = $this->g->getAllPict('NDVI','NDVI',$pictLoc);
                $data['locationTable'] = json_encode($this->g->getLocationTablePG($pictLoc,'NDVI'));
                $this->load->view('GIS/NDVI/PG/Home.php', $data);
            }else if($page == 'PW'){
                $data['picts'] = $this->g->getPict('NDVI','Plant Weight',$pictLoc);
                $data['allPicts'] = $this->g->getAllPict('NDVI','Plant Weight',$pictLoc);
                $data['locationTable'] = json_encode($this->g->getLocationTablePG($pictLoc,'Plant Weight'));
                $this->load->view('GIS/NDVI/PG/plantWeight.php', $data);
            }else if($page == 'PD'){
                $data['picts'] = $this->g->getPict('NDVI','Plant Disease',$pictLoc);
                $data['allPicts'] = $this->g->getAllPict('NDVI','Plant Disease',$pictLoc);
                $data['locationTable'] = json_encode($this->g->getLocationTablePG($pictLoc,'Plant Disease'));
                $this->load->view('GIS/NDVI/PG/plantDisease.php', $data);
            }else if($page == 'SOW'){
                $data['picts'] = $this->g->getPict('NDVI','Sufficiency Of Water',$pictLoc);
                $data['allPicts'] = $this->g->getAllPict('NDVI','Sufficiency Of Water',$pictLoc);
                $data['locationTable'] = json_encode($this->g->getLocationTablePG($pictLoc,'Sufficiency Of Water'));
                // $data['tester'] = json_encode($this->g->getAllTableLocation());
                $this->load->view('GIS/NDVI/PG/sufficiencyOfWater.php', $data);
            }else if($page == 'SUG'){
                $data['allPicts'] = $this->g->getAllPict('NDVI','Suggestion',$pictLoc);
                
                $this->load->view('GIS/NDVI/PG/suggestion.php', $data);
            }else if($page == 'LOG'){
                $data['picts'] = $this->g->getPict('NDVI','Level Of Greennes',$pictLoc);
                $data['allPicts'] = $this->g->getAllPict('NDVI','Level Of Greennes',$pictLoc);
                $data['locationTable'] = json_encode($this->g->getLocationTablePG($pictLoc,'Level Of Greennes'));
                // $data['tester'] = json_encode($this->g->getAllTableLocation());
                $this->load->view('GIS/NDVI/PG/levelofGreenes.php', $data);
            }
            
        }else if($loc == 'Wilayah'){
            if($currLoc == null){
                $pictLoc = "W01";
            }else{
                $pictLoc = $currLoc;
            }
            $data['navbar'] = $this->load->view('template/GIS/navbarWilayah.php',NULL,TRUE);	
            $data['header'] = $this->load->view('template/GIS/headerwilayah.php', array('currLoc' => $currLoc, 'authorization' => $authorization), TRUE);
            if($page == 'NDVI'){
                $data['picts'] = $this->g->getPict('NDVI','NDVI',$pictLoc);
                $data['allPicts'] = $this->g->getAllPict('NDVI','NDVI',$pictLoc);
                $data['locationTable'] = json_encode($this->g->getLocationTableWilayah($pictLoc,'NDVI'));
                $this->load->view('GIS/NDVI/Wilayah/Home.php', $data);
            }else if($page == 'PW'){
                $data['picts'] = $this->g->getPict('NDVI','Plant Weight',$pictLoc);
                $data['allPicts'] = $this->g->getAllPict('NDVI','Plant Weight',$pictLoc);
                $data['locationTable'] = json_encode($this->g->getLocationTableWilayah($pictLoc,'Plant Weight'));
                $this->load->view('GIS/NDVI/Wilayah/plantWeight.php', $data);
            }else if($page == 'PD'){
                $data['picts'] = $this->g->getPict('NDVI','Plant Disease',$pictLoc);
                $data['allPicts'] = $this->g->getAllPict('NDVI','Plant Disease',$pictLoc);
                $data['locationTable'] = json_encode($this->g->getLocationTableWilayah($pictLoc,'Plant Disease'));
                $this->load->view('GIS/NDVI/Wilayah/plantDisease.php', $data);
            }else if($page == 'SOW'){
                $data['picts'] = $this->g->getPict('NDVI','Sufficiency Of Water',$pictLoc);
                $data['allPicts'] = $this->g->getAllPict('NDVI','Sufficiency Of Water',$pictLoc);
                $data['locationTable'] = json_encode($this->g->getLocationTableWilayah($pictLoc,'Sufficiency Of Water'));
                $this->load->view('GIS/NDVI/Wilayah/sufficiencyOfWater.php', $data);
            }else if($page == 'SUG'){
                $data['allPicts'] = $this->g->getAllPict('NDVI','Suggestion',$pictLoc);
                 $data['locationTable'] = json_encode($this->g->getLocationTableWilayah($pictLoc,'NDVI'));
                $this->load->view('GIS/NDVI/Wilayah/suggestion.php', $data);
            }else if($page == 'LOG'){
                $data['allPicts'] = $this->g->getAllPict('NDVI','Level Of Greennes',$pictLoc);
                 $data['locationTable'] = json_encode($this->g->getLocationTableWilayah($pictLoc,'Level Of Greennes'));
                $this->load->view('GIS/NDVI/Wilayah/levelofGreenes.php', $data);
            }
        }else if($loc == 'Lokasi'){
            $listLokasi = $this->g->getLokasi();
            if($currLoc == null){
                $pictLoc = $listLokasi[0]->lokasi;
            }else{
                $pictLoc = $currLoc;
            }
            $data['navbar'] = $this->load->view('template/GIS/navbarLokasi.php',NULL,TRUE);	
            $data['header'] = $this->load->view('template/GIS/headerlokasi.php',array('currLoc' => $currLoc, 'authorization' => $authorization, 'listLokasi' =>$listLokasi), TRUE);
            if($page == 'NDVI'){
                if($date != null){
                    $data['picts'] = $this->g->getPictByDateTime('NDVI','NDVI',$pictLoc,$date);
                }else{
                    $data['picts'] = $this->g->getPict('NDVI','NDVI',$pictLoc);
                }
                $data['allPicts'] = $this->g->getAllPict('NDVI','NDVI',$pictLoc);
                $this->load->view('GIS/NDVI/Lokasi/Home.php', $data);
            }else if($page == 'PW'){
                if($date != null){
                    $data['picts'] = $this->g->getPictByDateTime('NDVI','Plant Weigt',$pictLoc,$date);
                }else{
                    $data['picts'] = $this->g->getPict('NDVI','Plant Weight',$pictLoc);
                }
                $data['allPicts'] = $this->g->getAllPict('NDVI','Plant Weight',$pictLoc);
                $this->load->view('GIS/NDVI/Lokasi/plantWeight.php', $data);
            }else if($page == 'PD'){
                if($date != null){
                    $data['picts'] = $this->g->getPictByDateTime('NDVI','Plant Disease',$pictLoc,$date);
                }else{
                    $data['picts'] = $this->g->getPict('NDVI','Plant Disease',$pictLoc);
                }
                $data['allPicts'] = $this->g->getAllPict('NDVI','Plant Disease',$pictLoc);
                $this->load->view('GIS/NDVI/Lokasi/plantDisease.php', $data);
            }else if($page == 'SOW'){
                if($date != null){
                    $data['picts'] = $this->g->getPictByDateTime('NDVI','Sufficiency Of Water',$pictLoc,$date);
                }else{
                    $data['picts'] = $this->g->getPict('NDVI','Sufficiency Of Water',$pictLoc);
                }
                $data['allPicts'] = $this->g->getAllPict('NDVI','Sufficiency Of Water',$pictLoc);
                $this->load->view('GIS/NDVI/Lokasi/sufficiencyOfWater.php', $data);
            }else if($page == 'SUG'){
                $data['allPicts'] = $this->g->getAllPict('NDVI','Suggestion',$pictLoc);
                $this->load->view('GIS/NDVI/Lokasi/suggestion.php', $data);
            }else if($page == 'LOG'){
                $data['allPicts'] = $this->g->getAllPict('NDVI','Level Of Greennes',$pictLoc);
                $this->load->view('GIS/NDVI/Lokasi/levelofGreenes.php', $data);
            }
        }
    }
    
    public function DSM(){
        $uid = $_SESSION['index'];
        $authorization = $this->g->getAuthorization($uid);
        $page = $this->input->get('page');
        $loc = $this->input->get('loc');
        $currLoc = $this->input->get('currLoc');
        $date = $this->input->get('date');
        if($date != null){
            $date = str_replace("_"," ",$date);
        }
        $data['loc'] = $loc;
        $data['page'] = $page;
        $data['currLoc'] = $currLoc;
        $data['pageDate'] = $date;
        $data['subpage'] = 'DSM';
		$data['script'] = $this->load->view('include/script.php',NULL,TRUE);
		$data['style'] = $this->load->view('include/styleGIS.php',NULL,TRUE);
        $data['modal'] =  $this->load->view('template/logoutModal.php',NULL,TRUE);
        if($loc == "PG"){
            if($currLoc == null){
                $pictLoc = "PG1";
            }else{
                $pictLoc = $currLoc;
            }
            $data['navbar'] = $this->load->view('template/GIS/navbarPG.php',NULL,TRUE);	
            $data['header'] = $this->load->view('template/GIS/headerPG.php', array('currLoc' => $currLoc, 'authorization' => $authorization), TRUE); 
            if($page == 'DSM'){
                $data['picts'] = $this->g->getPict('DSM','DSM',$pictLoc);
                $data['allPicts'] = $this->g->getAllPict('DSM','DSM',$pictLoc);
                $data['locationTable'] = json_encode($this->g->getLocationTablePG($pictLoc,'DSM'));
                $this->load->view('GIS/DSM/PG/Home.php', $data);
            }else if($page == 'WF'){
                $data['picts'] = $this->g->getPict('DSM','Water Flow',$pictLoc);
                $data['allPicts'] = $this->g->getAllPict('DSM','Water Flow',$pictLoc);
                $data['locationTable'] = json_encode($this->g->getLocationTablePG($pictLoc,'Water Flow'));
                $this->load->view('GIS/DSM/PG/waterFlow.php', $data);
            }else if($page == 'WD'){
                $data['picts'] = $this->g->getPict('DSM','Water Direction',$pictLoc);
                $data['allPicts'] = $this->g->getAllPict('DSM','Water Direction',$pictLoc);
                $data['locationTable'] = json_encode($this->g->getLocationTablePG($pictLoc,'Water Direction'));
                $this->load->view('GIS/DSM/PG/waterDirection.php', $data);
            }else if($page == 'WL'){
                $data['picts'] = $this->g->getPict('DSM','Water Logging',$pictLoc);
                $data['allPicts'] = $this->g->getAllPict('DSM','Water Logging',$pictLoc);
                $data['locationTable'] = json_encode($this->g->getLocationTablePG($pictLoc,'Water Logging'));
                $this->load->view('GIS/DSM/PG/waterLogging.php', $data);
            }else if($page == 'RGB'){
                $data['picts'] = $this->g->getPict('DSM','RGB',$pictLoc);
                $data['allPicts'] = $this->g->getAllPict('DSM','RGB',$pictLoc);
                $data['locationTable'] = json_encode($this->g->getLocationTablePG($pictLoc,'RGB'));
                $this->load->view('GIS/DSM/PG/RGB.php', $data);
            }else if($page == "DL"){
                $data['picts'] = $this->g->getPict('DSM','Design Location',$pictLoc);
                $data['allPicts'] = $this->g->getAllPict('DSM','Design Location',$pictLoc);
                $data['locationTable'] = json_encode($this->g->getLocationTablePG($pictLoc,'Design Location'));
                $this->load->view('GIS/DSM/PG/DesignLocation.php', $data);
            }else if($page == "DD"){
                $data['picts'] = $this->g->getPict('DSM','Design Deal',$pictLoc);
                $data['allPicts'] = $this->g->getAllPict('DSM','Design Deal',$pictLoc);
                $data['locationTable'] = json_encode($this->g->getLocationTablePG($pictLoc,'Design Deal'));
                $this->load->view('GIS/DSM/PG/DesignDeal.php', $data);
            }
        }else if($loc == "Wilayah"){
            if($currLoc == null){
                $pictLoc = "W01";
            }else{
                $pictLoc = $currLoc;
            }
            $data['header'] = $this->load->view('template/GIS/headerwilayah.php', array('currLoc' => $currLoc, 'authorization' => $authorization), TRUE);		
            $data['navbar'] = $this->load->view('template/GIS/navbarWilayah.php',NULL,TRUE);
            if($page == 'DSM'){
                $data['picts'] = $this->g->getPict('DSM','DSM',$pictLoc);
                $data['allPicts'] = $this->g->getAllPict('DSM','DSM',$pictLoc);
                $data['locationTable'] = json_encode($this->g->getLocationTableWilayah($pictLoc,'DSM'));
                $this->load->view('GIS/DSM/Wilayah/Home.php', $data);
            }else if($page == 'WF'){
                $data['picts'] = $this->g->getPict('DSM','Water Flow',$pictLoc);
                $data['allPicts'] = $this->g->getAllPict('DSM','Water Flow',$pictLoc);
                $data['locationTable'] = json_encode($this->g->getLocationTableWilayah($pictLoc,'Water Flow'));
                $this->load->view('GIS/DSM/Wilayah/waterFlow.php', $data);
            }else if($page == 'WD'){
                $data['picts'] = $this->g->getPict('DSM','Water Direction',$pictLoc);
                $data['allPicts'] = $this->g->getAllPict('DSM','Water Direction',$pictLoc);
                $data['locationTable'] = json_encode($this->g->getLocationTableWilayah($pictLoc,'Water Direction'));
                $this->load->view('GIS/DSM/Wilayah/waterDirection.php', $data);
            }else if($page == 'WL'){
                $data['picts'] = $this->g->getPict('DSM','Water Logging',$pictLoc);
                $data['allPicts'] = $this->g->getAllPict('DSM','Water Logging',$pictLoc);
                $data['locationTable'] = json_encode($this->g->getLocationTableWilayah($pictLoc,'Water Logging'));
                $this->load->view('GIS/DSM/Wilayah/waterLogging.php', $data);
            }else if($page == 'RGB'){
                $data['picts'] = $this->g->getPict('DSM','RGB',$pictLoc);
                $data['allPicts'] = $this->g->getAllPict('DSM','RGB',$pictLoc);
                $data['locationTable'] = json_encode($this->g->getLocationTableWilayah($pictLoc,'RGB'));
                $this->load->view('GIS/DSM/Wilayah/RGB.php', $data);
            }else if($page == "DL"){
                $data['picts'] = $this->g->getPict('DSM','Design Location',$pictLoc);
                $data['allPicts'] = $this->g->getAllPict('DSM','Design Location',$pictLoc);
                $data['locationTable'] = json_encode($this->g->getLocationTableWilayah($pictLoc,'Design Location'));
                $this->load->view('GIS/DSM/Wilayah/DesignLocation.php', $data);
            }else if($page == "DD"){
                $data['picts'] = $this->g->getPict('DSM','Design Deal',$pictLoc);
                $data['allPicts'] = $this->g->getAllPict('DSM','Design Deal',$pictLoc);
                $data['locationTable'] = json_encode($this->g->getLocationTableWilayah($pictLoc,'Design Deal'));
                $this->load->view('GIS/DSM/Wilayah/DesignDeal.php', $data);
            }
        }else if($loc == "Lokasi"){
            $listLokasi = $this->g->getLokasi();
            if($currLoc == null){
                $pictLoc = $listLokasi[0]->lokasi;
            }else{
                $pictLoc = $currLoc;
            }
            $data['header'] = $this->load->view('template/GIS/headerlokasi.php',array('currLoc' => $currLoc, 'authorization' => $authorization, 'listLokasi' =>$listLokasi), TRUE);	
            $data['navbar'] = $this->load->view('template/GIS/navbarLokasi.php',NULL,TRUE);
            if($page == 'DSM'){
                if($date != null){
                    $data['picts'] = $this->g->getPictByDateTime('DSM','DSM',$pictLoc,$date);
                }else{
                    $data['picts'] = $this->g->getPict('DSM','DSM',$pictLoc);
                }
                $data['allPicts'] = $this->g->getAllPict('DSM','DSM',$pictLoc);
                $this->load->view('GIS/DSM/Lokasi/Home.php', $data);
            }else if($page == 'WF'){
                if($date != null){
                    $data['picts'] = $this->g->getPictByDateTime('DSM','Water Flow',$pictLoc,$date);
                }else{
                    $data['picts'] = $this->g->getPict('DSM','Water Flow',$pictLoc);
                }
                $data['allPicts'] = $this->g->getAllPict('DSM','Water Flow',$pictLoc);
                $this->load->view('GIS/DSM/Lokasi/waterFlow.php', $data);
            }else if($page == 'WD'){
                if($date != null){
                    $data['picts'] = $this->g->getPictByDateTime('DSM','Water Direction',$pictLoc,$date);
                }else{
                    $data['picts'] = $this->g->getPict('DSM','Water Direction',$pictLoc);
                }
                $data['allPicts'] = $this->g->getAllPict('DSM','Water Direction',$pictLoc);
                $this->load->view('GIS/DSM/Lokasi/waterDirection.php', $data);
            }else if($page == 'WL'){
                if($date != null){
                    $data['picts'] = $this->g->getPictByDateTime('DSM','Water Logging',$pictLoc,$date);
                }else{
                    $data['picts'] = $this->g->getPict('DSM','Water Logging',$pictLoc);
                }
                $data['allPicts'] = $this->g->getAllPict('DSM','Water Logging',$pictLoc);
                $data['chartData'] =  isset($data['picts'][0]->photo_id) ?json_encode($this->g->getWaterLogging($data['picts'][0]->photo_id)) :json_encode(array(array("Dry"=>0, "Moist"=>0, "Wet"=>0, "Very_Wet"=>0, "Flood"=>0)));
                $this->load->view('GIS/DSM/Lokasi/waterLogging.php', $data);
            }else if($page == "RGB"){
                if($date != null){
                    $data['picts'] = $this->g->getPictByDateTime('DSM','RGB',$pictLoc,$date);
                }else{
                    $data['picts'] = $this->g->getPict('DSM','RGB',$pictLoc);
                }
                $data['allPicts'] = $this->g->getAllPict('DSM','RGB',$pictLoc);
                $this->load->view('GIS/DSM/Lokasi/RGB.php', $data);
            }else if($page == "DL"){
                if($date != null){
                    $data['picts'] = $this->g->getPictByDateTime('DSM','Design Location',$pictLoc,$date);
                }else{
                    $data['picts'] = $this->g->getPict('DSM','Design Location',$pictLoc);
                }
                $data['allPicts'] = $this->g->getAllPict('DSM','Design Location',$pictLoc);
                $this->load->view('GIS/DSM/Lokasi/DesignLocation.php', $data);
            }else if($page == "DD"){
                if($date != null){
                    $data['picts'] = $this->g->getPictByDateTime('DSM','Design Deal',$pictLoc,$date);
                }else{
                    $data['picts'] = $this->g->getPict('DSM','Design Deal',$pictLoc);
                }
                $data['allPicts'] = $this->g->getAllPict('DSM','Design Deal',$pictLoc);
                $this->load->view('GIS/DSM/Lokasi/DesignDeal.php', $data);
            }
        }
    }

    public function Sensor(){
        $uid = $_SESSION['index'];
        $authorization = $this->g->getAuthorization($uid);
        $page = $this->input->get('page');
        $loc = $this->input->get('loc');
        $currLoc = $this->input->get('currLoc');
        $date = $this->input->get('date');
        if($date != null){
            $date = str_replace("_"," ",$date);
        }
        $data['loc'] = $loc;
        $data['page'] = $page;
        $data['currLoc'] = $currLoc;
        $data['pageDate'] = $date;
        $data['subpage'] = 'Sensor';
		$data['script'] = $this->load->view('include/script.php',NULL,TRUE);
		$data['style'] = $this->load->view('include/styleGIS.php',NULL,TRUE);
		$data['header'] = $this->load->view('template/GIS/header.php',NULL,TRUE);	
        $data['modal'] =  $this->load->view('template/logoutModal.php',NULL,TRUE);	
        if($loc == 'PG'){
            if($currLoc == null){
                $pictLoc = "PG1";
            }else{
                $pictLoc = $currLoc;
            }
            $data['navbar'] = $this->load->view('template/GIS/navbar.php', array('currLoc' => $currLoc, 'authorization' => $authorization), TRUE);
            if($page == 'LWL'){
                $data['picts'] = $this->g->getPict('Sensor','Lagoon Water Level',$pictLoc);
                $data['allPicts'] = $this->g->getAllPict('Sensor','Lagoon Water Level',$pictLoc);
                $this->load->view('GIS/Sensor/PG/lagoonWaterLevel.php', $data);
            }else if($page == 'RF'){
                $data['picts'] = $this->g->getPict('Sensor','Rainfall',$pictLoc);
                $data['allPicts'] = $this->g->getAllPict('Sensor','Rainfall',$pictLoc);
                $data['locationTable'] = json_encode($this->g->getLocationTablePG($pictLoc,'Rainfall'));
                $this->load->view('GIS/Sensor/PG/rainfall.php', $data);
            }else if($page == 'TM'){
                $data['picts'] = $this->g->getPict('Sensor','Temperature',$pictLoc);
                $data['allPicts'] = $this->g->getAllPict('Sensor','Temperature',$pictLoc);
                $data['locationTable'] = json_encode($this->g->getLocationTablePG($pictLoc,'Temperature'));
                $this->load->view('GIS/Sensor/PG/temperature.php', $data);
            }else if($page == 'HU'){
                $data['picts'] = $this->g->getPict('Sensor','Humidity',$pictLoc);
                $data['allPicts'] = $this->g->getAllPict('Sensor','Humidity',$pictLoc);
                $data['locationTable'] = json_encode($this->g->getLocationTablePG($pictLoc,'Humidity'));
                $this->load->view('GIS/Sensor/PG/humidity.php', $data);
            }else if($page == 'SM'){
                $data['picts'] = $this->g->getPict('Sensor','Soil Moisture',$pictLoc);
                $data['allPicts'] = $this->g->getAllPict('Sensor','Soil Moisture',$pictLoc);
                $data['locationTable'] = json_encode($this->g->getLocationTablePG($pictLoc,'Soil Moisture'));
                $this->load->view('GIS/Sensor/PG/soilMoisture.php', $data);
            }
        }else if($loc == "Wilayah"){
            if($currLoc == null){
                $pictLoc = "W01";
            }else{
                $pictLoc = $currLoc;
            }
            $data['navbar'] = $this->load->view('template/GIS/navbarWilayah.php',array('currLoc' => $currLoc, 'authorization' => $authorization),TRUE);
            if($page == 'LWL'){
                $data['picts'] = $this->g->getPict('Sensor','Lagoon Water Level',$pictLoc);
                $data['allPicts'] = $this->g->getAllPict('Sensor','Lagoon Water Level',$pictLoc);
                
                $this->load->view('GIS/Sensor/Wilayah/lagoonWaterLevel.php', $data);
            }else if($page == 'RF'){
                $data['picts'] = $this->g->getPict('Sensor','Rainfall',$pictLoc);
                $data['allPicts'] = $this->g->getAllPict('Sensor','Rainfall',$pictLoc);
                $data['locationTable'] = json_encode($this->g->getLocationTableWilayah($pictLoc,'Rainfall'));
                $this->load->view('GIS/Sensor/Wilayah/rainfall.php', $data);
            }else if($page == 'TM'){
                $data['picts'] = $this->g->getPict('Sensor','Temperature',$pictLoc);
                $data['allPicts'] = $this->g->getAllPict('Sensor','Temperature',$pictLoc);
                $data['locationTable'] = json_encode($this->g->getLocationTableWilayah($pictLoc,'Temperature'));
                $this->load->view('GIS/Sensor/Wilayah/temperature.php', $data);
            }else if($page == 'HU'){
                $data['picts'] = $this->g->getPict('Sensor','Humidity',$pictLoc);
                $data['allPicts'] = $this->g->getAllPict('Sensor','Humidity',$pictLoc);
                $data['locationTable'] = json_encode($this->g->getLocationTableWilayah($pictLoc,'Humidity'));
                $this->load->view('GIS/Sensor/Wilayah/humidity.php', $data);
            }else if($page == 'SM'){
                $data['picts'] = $this->g->getPict('Sensor','Soil Moisture',$pictLoc);
                $data['allPicts'] = $this->g->getAllPict('Sensor','Soil Moisture',$pictLoc);
                $data['locationTable'] = json_encode($this->g->getLocationTableWilayah($pictLoc,'Soil Moisture'));
                $this->load->view('GIS/Sensor/Wilayah/soilMoisture.php', $data);
            }
        }else if($loc == "Lokasi"){
            $listLokasi = $this->g->getLokasi();
            if($currLoc == null){
                $pictLoc = $listLokasi[0]->lokasi;
            }else{
                $pictLoc = $currLoc;
            }
            $data['navbar'] = $this->load->view('template/GIS/navbarLokasi.php',array('currLoc' => $currLoc, 'authorization' => $authorization, 'listLokasi' =>$listLokasi), TRUE);
            if($page == 'RF'){
                if($date != null){
                    $data['picts'] = $this->g->getPictByDateTime('Sensor','Rainfall',$pictLoc,$date);
                }else{
                    $data['picts'] = $this->g->getPict('Sensor','Rainfall',$pictLoc);
                }
                $data['allPicts'] = $this->g->getAllPict('Sensor','Rainfall',$pictLoc);
                $this->load->view('GIS/Sensor/Lokasi/rainfall.php', $data);
            }else if($page == 'TM'){
                if($date != null){
                    $data['picts'] = $this->g->getPictByDateTime('Sensor','Temperature',$pictLoc,$date);
                }else{
                    $data['picts'] = $this->g->getPict('Sensor','Temperature',$pictLoc);
                }
                $data['allPicts'] = $this->g->getAllPict('Sensor','Temperature',$pictLoc);
                $this->load->view('GIS/Sensor/Lokasi/temperature.php', $data);
            }else if($page == 'HU'){
                if($date != null){
                    $data['picts'] = $this->g->getPictByDateTime('Sensor','Humidity',$pictLoc,$date);
                }else{
                    $data['picts'] = $this->g->getPict('Sensor','Humidity',$pictLoc);
                }
                $data['allPicts'] = $this->g->getAllPict('Sensor','Humidity',$pictLoc);
                $this->load->view('GIS/Sensor/Lokasi/humidity.php', $data);
            }else if($page == 'SM'){
                if($date != null){
                    $data['picts'] = $this->g->getPictByDateTime('Sensor','Soil Moisture',$pictLoc,$date);
                }else{
                    $data['picts'] = $this->g->getPict('Sensor','Soil Moisture',$pictLoc);
                }
                $data['allPicts'] = $this->g->getAllPict('Sensor','Soil Moisture',$pictLoc);
                $this->load->view('GIS/Sensor/Lokasi/soilMoisture.php', $data);
            }
        }
       
		
    }

    public function Other(){
        $uid = $_SESSION['index'];
        $authorization = $this->g->getAuthorization($uid);
        $page = $this->input->get('page');
        $loc = $this->input->get('loc');
        $currLoc = $this->input->get('currLoc');
        $date = $this->input->get('date');
        if($date != null){
            $date = str_replace("_"," ",$date);
        }
        $data['loc'] = $loc;
        $data['page'] = $page;
        $data['subpage'] = 'Other';
        $data['currLoc'] = $currLoc;
        $data['pageDate'] = $date;
		$data['script'] = $this->load->view('include/script.php',NULL,TRUE);
		$data['style'] = $this->load->view('include/styleGIS.php',NULL,TRUE);
		$data['header'] = $this->load->view('template/GIS/header.php',NULL,TRUE);
        $data['modal'] =  $this->load->view('template/logoutModal.php',NULL,TRUE);	
        if($loc == "PG"){
            if($currLoc == null){
                $pictLoc = "PG1";
            }else{
                $pictLoc = $currLoc;
            }
            $data['navbar'] = $this->load->view('template/GIS/navbar.php',array('currLoc' => $currLoc, 'authorization' => $authorization),TRUE);	
            if($page == 'ST'){
                $data['picts'] = $this->g->getPict('Other','Soil Texture',$pictLoc);
                $data['allPicts'] = $this->g->getAllPict('Other','Soil Texture',$pictLoc);
                $data['locationTable'] = json_encode($this->g->getLocationTablePG($pictLoc,'Soil Texture'));
                $this->load->view('GIS/Other/PG/soilTexture.php', $data);
            }else if($page == 'RD'){
                $data['picts'] = $this->g->getPict('Other','Road & Drainage',$pictLoc);
                $data['allPicts'] = $this->g->getAllPict('Other','Road & Drainage',$pictLoc);
                $data['locationTable'] = json_encode($this->g->getLocationTablePG($pictLoc,'Road & Drainage'));
                $this->load->view('GIS/Other/PG/roadDrainage.php', $data);
            }
        }else if($loc == "Wilayah"){
            if($currLoc == null){
                $pictLoc = "W01";
            }else{
                $pictLoc = $currLoc;
            }
            $data['navbar'] = $this->load->view('template/GIS/navbarWilayah.php',array('currLoc' => $currLoc, 'authorization' => $authorization),TRUE);	
            if($page == 'ST'){
                $data['picts'] = $this->g->getPict('Other','Soil Texture',$pictLoc);
                $data['allPicts'] = $this->g->getAllPict('Other','Soil Texture',$pictLoc);
                $data['locationTable'] = json_encode($this->g->getLocationTableWilayah($pictLoc,'Soil Texture'));
                $this->load->view('GIS/Other/Wilayah/soilTexture.php', $data);
            }else if($page == 'RD'){
                $data['picts'] = $this->g->getPict('Other','Road & Drainage',$pictLoc);
                $data['allPicts'] = $this->g->getAllPict('Other','Road & Drainage',$pictLoc);
                $data['locationTable'] = json_encode($this->g->getLocationTableWilayah($pictLoc,'Road & Drainage'));
                $this->load->view('GIS/Other/Wilayah/roadDrainage.php', $data);
            }
        }else if($loc == "Lokasi"){
            $listLokasi = $this->g->getLokasi();
            if($currLoc == null){
                $pictLoc = $listLokasi[0]->lokasi;
            }else{
                $pictLoc = $currLoc;
            }
            $data['navbar'] = $this->load->view('template/GIS/navbarLokasi.php',array('currLoc' => $currLoc, 'authorization' => $authorization, 'listLokasi' =>$listLokasi), TRUE);
            if($page == 'ST'){
                if($date != null){
                    $data['picts'] = $this->g->getPictByDateTime('Other','Soil Texture',$pictLoc,$date);
                }else{
                    $data['picts'] = $this->g->getPict('Other','Soil Texture',$pictLoc);
                }
                $data['allPicts'] = $this->g->getAllPict('Other','Soil Texture',$pictLoc);
                $this->load->view('GIS/Other/Lokasi/soilTexture.php', $data);
            }else if($page == 'RD'){
                if($date != null){
                    $data['picts'] = $this->g->getPictByDateTime('Other','Road & Drainage',$pictLoc,$date);
                }else{
                    $data['picts'] = $this->g->getPict('Other','Road & Drainage',$pictLoc);
                }
                $data['allPicts'] = $this->g->getAllPict('Other','Road & Drainage',$pictLoc);
                $this->load->view('GIS/Other/Lokasi/roadDrainage.php', $data);
            }
        }
    }
    public function Upload(){
        $uid = $_SESSION['index'];
        $authorization = $this->g->getAuthorization($uid);
        $loc = $this->input->get('loc');
        $currLoc = $this->input->get('currLoc');
        $listLokasi = $this->g->getLokasi();
        $data['loc'] = $loc;
        $data['authorization'] = $authorization;
        $data['page'] = "UPLD";
        $data['currLoc'] = $currLoc;
		$data['script'] = $this->load->view('include/script.php',NULL,TRUE);
		$data['style'] = $this->load->view('include/styleGIS.php',NULL,TRUE);
        $data['locationList'] =  json_encode( $listLokasi);
        $data['listLokasi'] = $listLokasi;
            
        if($loc == 'PG'){
           $data['header'] = $this->load->view('template/GIS/header_upload.php',array('currLoc' => $currLoc, 'authorization' => $authorization, 'listLokasi' =>$listLokasi), TRUE);
            $data['navbar'] = $this->load->view('template/GIS/navbarPG.php',NULL,TRUE);
        }else if($loc == 'Wilayah'){
            $data['header'] = $this->load->view('template/GIS/header_upload.php',array('currLoc' => $currLoc, 'authorization' => $authorization, 'listLokasi' =>$listLokasi), TRUE);
            $data['navbar'] = $this->load->view('template/GIS/navbarWilayah.php',NULL,TRUE);
        }else if($loc == 'Lokasi'){
            $data['header'] = $this->load->view('template/GIS/header_upload.php',array('currLoc' => $currLoc, 'authorization' => $authorization, 'listLokasi' =>$listLokasi), TRUE);
            $data['navbar'] = $this->load->view('template/GIS/navbarLokasi.php',NULL,TRUE);
        }
        $data['modal'] =  $this->load->view('template/logoutModal.php',NULL,TRUE);
        $data['id_photo'] = $this->g->id_photo()->row_array();	
        $this->load->view('GIS/Upload.php', $data);
		
    }
    
public function uploadPict(){
        $uid = $_SESSION['index'];
        $kategori =  $this->input->post('kategori');
        $date =  date('Y-m-d H:i:s');
        $jenis = $this->input->post('jenis');
        $extension = $this->input->post('extension');
        $id_photo =$this->input->post('id_photo');
        $name = $kategori."_".str_replace(array(' ','&'), array('_', '-'),$jenis)."_".$uid."_".str_replace(array(' ',':'), array('_', '-'),$date).".".$extension;
        $min  = $kategori."_".str_replace(' ','_',$jenis)."_".$uid."_".str_replace(array(' ',':'), array('_', '-'),$date."-"."min").".".$extension;
        $pdfname =  $kategori."_".str_replace(array(' ','&'), array('_', '-'),$jenis)."_".$uid."_".str_replace(array(' ',':'), array('_', '-'),$date).".pdf";
        $xlsxname =  $kategori."_".str_replace(array(' ','&'), array('_', '-'),$jenis)."_".$uid."_".str_replace(array(' ',':'), array('_', '-'),$date).".xlsx";

		$config = array();
		$config['upload_path'] = './assets/upload/gis_xls/';
		$config['allowed_types'] = 'xlsx|csv';
        $config['overwrite'] = true;
        $config['file_name'] = $xlsxname;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('xlsx')) {
            $xlsx = $this->upload->data();
            include APPPATH.'third_party/PHPExcel/PHPExcel.php';
            
            $excelreader = new PHPExcel_Reader_Excel2007();
            $loadexcel = $excelreader->load('assets/upload/gis_xls/'.$xlsx['file_name']); // Load file yang telah diupload ke folder excel
            $sheet = $loadexcel->getActiveSheet()->toArray(
              null, true, true ,true,true, true
            , true, true ,true,true, true ,true, true, true ,true,true, true ,true
            , true, true ,true,true, true ,true, true, true ,true,true, true ,true
            , true, true ,true,true, true ,true, true, true ,true,true, true ,true);
            
            // Buat sebuah variabel array untuk menampung array data yg akan kita insert ke database
            $data = array();
            
            $numrow = 1;
            foreach($sheet as $row){
                // Cek $numrow apakah lebih dari 1
                // Artinya karena baris pertama adalah nama-nama kolom
                // Jadi dilewat saja, tidak usah diimport
                if($numrow > 1){
                    // Kita push (add) array data ke variabel data
                    array_push($data, array(
                        'photo_id'=>$id_photo, // Insert data nis dari kolom A di excel
                        'lokasi'=>$row['A'], // Insert data nama dari kolom B di excel
                        'luas'=>$row['B'], // Insert data jenis kelamin dari kolom C di excel
                        'status'=>$row['C'],
                        'varietas_bibit'=>$row['D'],
                        'jenis_bibit'=>$row['E'],
                        'kelas_bibit'=>$row['F'],
                        'tanggal_awal_perawatan'=> date("Y-m-d", strtotime($row['G'])),
                        'rencana_forcing'=>date("Y-m-d", strtotime($row['H'])),
                        'tanggal_terbang'=>date("Y-m-d", strtotime($row['I'])),
                        'umur_forcing'=>$row['J'],
                        'plot'=>$row['L'],
                        'rata-rata'=>$row['M'],
                        '0-0,05'=>$row['N'],
                        '0,05-0,1'=>$row['O'],
                        '0,1-0,15'=>$row['P'],
                        '0,15-0,2'=>$row['Q'],
                        '0,2-0,25'=>$row['R'],
                        '0,25-0,3'=>$row['S'],
                        '0,3-0,35'=>$row['T'],
                        '0,35-0,4'=>$row['U'],
                        '0,4-0,45'=>$row['V'],
                        '0,45-0,5'=>$row['W'],
                        '0,5-0,55'=>$row['X'],
                        '0,55-0,6'=>$row['Y'],
                        '0,6-0,65'=>$row['Z'],
                        '0,65-0,7'=>$row['AA'],
                        '0,7-0,75'=>$row['AB'],
                        '0,75-0,8'=>$row['AC'],
                        '0,8-0,85'=>$row['AD'],
                        '0,85-0,9'=>$row['AE'],
                        '0,9-0,95'=>$row['AF'],
                        '0,95-1'=>$row['AG'],
                        '1,'=>(($row['N']+$row['O']+$row['P']+$row['Q'])/4),
                        '2,'=>($row['R']+$row['S']+$row['T'])/3,
                        '3,'=>($row['U']+$row['V']+$row['W'])/3,
                        '4,'=>($row['X']+$row['Y']+$row['Z'])/3,
                        '5,'=>($row['AA']+$row['AB']+$row['AC']+$row['AD'])/4,
                        '6,'=>($row['AE']+$row['AF']+$row['AG'])/3,
                        '1-2'=>((($row['N']+$row['O']+$row['P']+$row['Q'])/4)+(($row['R']+$row['S']+$row['T'])/3))/2,
                        '3-4'=>((($row['U']+$row['V']+$row['W'])/3)+(($row['X']+$row['Y']+$row['Z'])/3))/2,
                        '5-6'=>((($row['AE']+$row['AF']+$row['AG'])/3)+(($row['AA']+$row['AB']+$row['AC']+$row['AD'])/4)/2),
                        'tingkat_kehijauan'=>$row['AH'],
                    ));
                }
                
                $numrow++; // Tambah 1 setiap kali looping
            }

            // Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
            $this->db->insert_batch('plant', $data);
        }
        
        $config = array();
		$config['upload_path']		= './assets/upload/gis_pict/';
		$config['allowed_types']	= 'gif|jpg|png';
		$config['overwrite']		= true;
        $config['file_name'] = $name;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')){
            $gbr = $this->upload->data();
            //Compress Image
            $config['image_library']='gd';
            $config['source_image']='./assets/upload/gis_pict/'.$gbr['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= FALSE;
            $config['quality']= '30%';
            $config['width']= 1000;
            $config['height']= 800;
            $config['new_image']= './assets/upload/gis_pict/'.$min;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
        }
            

        $this->upload->initialize($config);
        $upload_image = $this->upload->do_upload('image');	
		$location = $this->input->post('location');
        $description =  $this->input->post('description');
        
        $config = array();
        $config['upload_path'] = './assets/upload/gis_pdf/';
        $config['allowed_types'] = 'pdf';
        $config['file_name'] = $pdfname;
        
        $this->upload->initialize($config);
        $upload_pdf = $this->upload->do_upload('pdf');

    
            
		if($upload_image && $upload_pdf){
			$data = array('upload_data' => $this->upload->data());
			$result= $this->g->simpanUploadImage($location,$jenis,$description,$name,$pdfname,$kategori,$date); 
			echo json_encode($result);
		}else{
            echo "false";
        }
       
    }
   
    public function uploadImageAndData(){
        $uid = $_SESSION['index'];
        $kategori =  $this->input->post('kategori');
        $date =  date('Y-m-d H:i:s');
        $last_update =  date('Y-m-d');
        $jenis = $this->input->post('jenis');
        $extension = $this->input->post('extension');
        $name = $kategori."_".str_replace(' ','_',$jenis)."_".$uid."_".str_replace(array(' ',':'), array('_', '-'),$date).".".$extension;
        $min  = $kategori."_".str_replace(' ','_',$jenis)."_".$uid."_".str_replace(array(' ',':'), array('_', '-'),$date."-"."min").".".$extension;
        $pdfname =  $kategori."_".str_replace(' ','_',$jenis)."_".$uid."_".str_replace(array(' ',':'), array('_', '-'),$date).".pdf";
        $config = array();
		$config['upload_path']		= './assets/upload/gis_pict/';
		$config['allowed_types']	= 'gif|jpg|png';
		$config['overwrite']		= true;
        $config['file_name'] = $name;
        $this->load->library('upload', $config);
        
       
        if ($this->upload->do_upload('image')){
            $gbr = $this->upload->data();
            //Compress Image
            $config['image_library']='gd';
            $config['source_image']='./assets/upload/gis_pict/'.$gbr['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= FALSE;
            $config['quality']= '0.00001%';
            $config['new_image']= './assets/upload/gis_pict/'.$min;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
        }
            
          

        $this->upload->initialize($config);
        $upload_image = $this->upload->do_upload('image');	
		$location = $this->input->post('location');
        $description =  $this->input->post('description');
        $tableData = json_decode($this->input->post('tbldata'), TRUE);
        $tblname = $this->input->post('tblname');
        
        $config = array();
        $config['upload_path'] = './assets/upload/gis_pdf/';
        $config['allowed_types'] = 'pdf';
        $config['file_name'] = $pdfname;
        
        $this->upload->initialize($config);
        $upload_pdf = $this->upload->do_upload('pdf');
            
		if($upload_image && $upload_pdf){
			$data = array('upload_data' => $this->upload->data());
			$result= $this->g->uploadImageAndData($location,$jenis,$description,$name,$pdfname,$kategori,$date, $last_update, $tblname, $tableData); 
			echo json_encode($result);
		}else{
            echo "false";
        }
    }


    public function getPictByDateTime(){
        $date = $this->input->post('date');
        $kategori = $this->input->post('kategori');
        $jenis = $this->input->post('jenis');
        $location = $this->input->post('location');
        $result = $this->g->getPictByDateTime($kategori,$jenis,$location,$date); 
		echo json_encode($result);
    }

    public function getWatterLogging(){
        $photo_id = $this->input->post('photo_id');
        $result = $this->g->getWaterLogging($photo_id);
        echo json_encode($result);
    }

    function id_photo(){
        $data = $this->g->id_photo()->result();
        echo json_encode($data);
      }

    function trend_ndvi(){
        $lokasi = $this->input->post('lokasi',TRUE);
        $data = $this->g->trendndvi($lokasi)->result();
        echo json_encode($data);
    }

    function trend_pw(){
        $lokasi = $this->input->post('lokasi',TRUE);
        $data = $this->g->trendpw($lokasi)->result();
        echo json_encode($data);
      }

    function trend_log(){
        $lokasi = $this->input->post('lokasi',TRUE);
        $data = $this->g->trendlog($lokasi)->result();
        echo json_encode($data);
    }

      function legeda1_pw(){
        $lokasi = $this->input->post('lokasi',TRUE);
        $data = $this->g->legendaspw1($lokasi)->result();
        echo json_encode($data);
      }

      function legeda2_pw(){
        $lokasi = $this->input->post('lokasi',TRUE);
        $data = $this->g->legendapw2($lokasi)->result();
        echo json_encode($data);
      }

      function legeda1_ndvi(){
        $lokasi = $this->input->post('lokasi',TRUE);
        $data = $this->g->legendandvi1($lokasi)->result();
        echo json_encode($data);
      }

      function legeda2_ndvi(){
        $lokasi = $this->input->post('lokasi',TRUE);
        $data = $this->g->legendandvi2($lokasi)->result();
        echo json_encode($data);
      }
      
      function legeda1_log(){
        $lokasi = $this->input->post('lokasi',TRUE);
        $data = $this->g->legendalog1($lokasi)->result();
        echo json_encode($data);
      }

      function legeda2_log(){
        $lokasi = $this->input->post('lokasi',TRUE);
        $data = $this->g->legendalog2($lokasi)->result();
        echo json_encode($data);
      }

      function date_ndvi(){
        $lokasi = $this->input->post('lokasi',TRUE);
        $data = $this->g->datendvi($lokasi)->result();
        echo json_encode($data);
      }

      function date_pw(){
        $lokasi = $this->input->post('lokasi',TRUE);
        $data = $this->g->datepw($lokasi)->result();
        echo json_encode($data);
      }
      function date_log(){
        $lokasi = $this->input->post('lokasi',TRUE);
        $data = $this->g->datelog($lokasi)->result();
        echo json_encode($data);
      }

      function date_rgb(){
        $lokasi = $this->input->post('lokasi',TRUE);
        $data = $this->g->datergb($lokasi)->result();
        echo json_encode($data);
      }

      function date_wl(){
        $lokasi = $this->input->post('lokasi',TRUE);
        $data = $this->g->datewl($lokasi)->result();
        echo json_encode($data);
      }

      function date_wd(){
        $lokasi = $this->input->post('lokasi',TRUE);
        $data = $this->g->datewd($lokasi)->result();
        echo json_encode($data);
      }

      function date_wf(){
        $lokasi = $this->input->post('lokasi',TRUE);
        $data = $this->g->datewf($lokasi)->result();
        echo json_encode($data);
      }

      function date_dsm(){
        $lokasi = $this->input->post('lokasi',TRUE);
        $data = $this->g->datedsm($lokasi)->result();
        echo json_encode($data);
      }
      function date_dl(){
        $lokasi = $this->input->post('lokasi',TRUE);
        $data = $this->g->datedl($lokasi)->result();
        echo json_encode($data);
      }
      function date_dd(){
        $lokasi = $this->input->post('lokasi',TRUE);
        $data = $this->g->datedd($lokasi)->result();
        echo json_encode($data);
      }
}
