<?php

class Gis_server extends CI_Model{
    function simpanUploadImage($location,$jenis,$description,$name,$pdfname,$kategori,$date){
        $data = array(
            'location' => $location,
            'jenis' => $jenis,
            'image' => $name, 
            'pdf' => $pdfname,
            'description' => $description,
            'kategori' => $kategori,
            'date' => $date,
        );  
        $result = $this->db->insert('gis_photo',$data);
        return $result;
    }

    function uploadImageAndData($location,$jenis,$description,$name,$pdfname,$kategori,$date, $last_update, $tblname, $tableData){
        $data = array(
            'location' => $location,
            'jenis' => $jenis,
            'image' => $name, 
            'pdf' => $pdfname,
            'description' => $description,
            'kategori' => $kategori,
            'date' => $date,
        );  
        $this->db->insert('gis_photo',$data);
        $id_photo = $this->db->insert_id();
        $data2 =  array(
            'id_photo' => $id_photo,
        ); 
        $data3 = array(
            'last_update' => $last_update,
        );
        $tempdata = array_merge($data2,$tableData);
        $inputdata = array_merge($tempdata,$data3);
        $result = $this->db->insert($tblname, $inputdata);
        return $result;
    }

    function getPict($kategori,$jenis,$location){
        $this->db->select("*");
        $this->db->from('gis_photo');
        $condition = array('kategori' => $kategori, 'jenis' => $jenis, 'location' => $location);
        $this->db->where($condition);
        $this->db->order_by('photo_id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }

    function getAllPict($kategori,$jenis,$location){
        $this->db->select("*");
        $this->db->from('gis_photo');
        $condition = array('kategori' => $kategori, 'jenis' => $jenis, 'location' => $location);
        $this->db->where($condition);
        $this->db->order_by('photo_id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    function getPictByDateTime($kategori,$jenis,$location,$date){
        $this->db->select("*");
        $this->db->from('gis_photo');
        $condition = array('kategori' => $kategori, 'jenis' => $jenis, 'location' => $location, 'date' => $date);
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result();
    }

    function getLokasi(){
        $this->db->select("lokasi");
        $this->db->from('lokasi');
        $this->db->where('LENGTH(kebun) =', 4, FALSE)->where_in('SUBSTRING(kebun, 1, 3)',[ 'W01','W02','W03','W04','W05','W06','W07','W08','W09','W11','W12','W13','W14']);
        $query = $this->db->get();
        return $query->result();
    }

    function getAuthorization($id){
        $this->db->select("authorization");
        $this->db->from("user_gis");
        $this->db->where("id_user",$id);
        $query = $this->db->get();
        return $query->result();
    }

    function getWaterLogging($photo_id){
        $this->db->select("Dry, Moist, Wet, Very_Wet, Flood");
        $this->db->from("gis_dsm_water_logging");
        $this->db->where('id_photo',$photo_id);
        $query = $this->db->get();
        return $query->result();
    }

    function getAkses($id_user){
        $this->db->select("*");
        $this->db->from("user_gis");
        $this->db->where('id_user',$id_user);
        $query = $this->db->get();
        if ($query->num_rows() > 0){
            return 1;
        }else{
            return 0;
        }
    }

    function getGaleryImage($date){
        $this->db->select('image,location,jenis,kategori');
        $this->db->from('gis_photo'); 
        $this->db->where('DATE(date)',$date);
        $this->db->order_by('photo_id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    function getLocationTablePG($pg,$jenis){
      
       // $this->db->query("CREATE TEMPORARY TABLE newLok AS (select * from lokasi group by lokasi )");
        $this->db->select('photo_id,lokasi,plantation_group,code,kebun,umur_hari,kepala_wilayah,IF(SUBSTRING(kebun, 4, 4) = 1, kasie_kebun1, IF(SUBSTRING(kebun, 4, 4) = 2, kasie_kebun2, kasie_kebun3)) AS kasbun,image,pdf,date,jenis,kategori');
        $this->db->from('wilayah a');
        $this->db->join('lokasi b', 'SUBSTRING(b.kebun, 1, 3) = a.code');
        $this->db->join('gis_photo c', 'c.location = b.lokasi' );
        $condition = array('plantation_group' => $pg, 'jenis' => $jenis);
        $this->db->where($condition);
        $this->db->order_by('date', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    function getLocationTableWilayah($wilayah,$jenis){
        //$this->db->query("CREATE TEMPORARY TABLE newLok AS (select * from lokasi group by lokasi )");
        $this->db->select('photo_id,lokasi,plantation_group,code,kebun,umur_hari,kepala_wilayah,IF(SUBSTRING(kebun, 4, 4) = 1, kasie_kebun1, IF(SUBSTRING(kebun, 4, 4) = 2, kasie_kebun2, kasie_kebun3)) AS kasbun,image,pdf,date,jenis,kategori');
        $this->db->from('wilayah a');
        $this->db->join('lokasi b', 'SUBSTRING(b.kebun, 1, 3) = a.code');
        $this->db->join('gis_photo c', 'c.location = b.lokasi');
        $condition = array('code' => $wilayah, 'jenis' => $jenis);
        $this->db->where($condition);
        $this->db->order_by('date', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    
    function getAllTableLocation(){
    //     $query = $this->db->query(" WITH ranked_messages AS (
    //         SELECT wilayah.`plantation_group` AS PG, wilayah.`code` AS Wilayah, wilayah.`kepala_wilayah` AS Kawil, IF(SUBSTRING(lokasi.`kebun`, 4, 4) = '1', wilayah.`kasie_kebun1`, IF(SUBSTRING(lokasi.`kebun`, 4, 4) = '2', wilayah.`kasie_kebun2`, wilayah.`kasie_kebun3`)) AS Kasbun, gis_photo.`image`, gis_photo.`pdf`, gis_photo.`date`, ROW_NUMBER() OVER (PARTITION BY gis_photo.`location` ORDER BY gis_photo.`date` DESC) AS rn
    //         FROM gis_photo, wilayah, lokasi
    //         WHERE gis_photo.`jenis` = 'RGB'
    //           AND gis_photo.`location` = lokasi.`lokasi`
    //           AND wilayah.`code` = SUBSTRING(lokasi.`kebun`, 1, 3)
    //       )
    //       SELECT * FROM ranked_messages WHERE rn = 1;");
          
       

    //     $this->db->select('photo_id,lokasi,plantation_group,code,kebun,umur_hari,kepala_wilayah,IF(SUBSTRING(kebun, 4, 4) = 1, kasie_kebun1, IF(SUBSTRING(kebun, 4, 4) = 2, kasie_kebun2, kasie_kebun3)) AS Kasbun,image,pdf,date,jenis,kategori');
    //     $this->db->from('wilayah a');
    //     $this->db->join('lokasi b', 'SUBSTRING(b.kebun, 1, 3) = a.code');
    //     $this->db->join('gis_photo c', 'c.location = b.lokasi');
    //     $condition = array('plantation_group' => $pg, 'jenis' => $jenis);
    //     $this->db->where($condition);
    //    //$this->db->order_by('photo_id', 'ASC');
    //     $query = $this->db->getRow();

    //     return $query->result();
    }

    function getDetailLokasi(){
        // $this->db->query("CREATE TEMPORARY TABLE newLok AS (select * from lokasi group by lokasi )");
        $this->db->select('photo_id,lokasi,plantation_group,code,kebun,IF(kategori = "NDVI" || kategori = "Sensor",CONCAT(umur_hari, " Hari"), "-") AS umur_hari,kepala_wilayah,IF(SUBSTRING(kebun, 4, 4) = 1, kasie_kebun1, IF(SUBSTRING(kebun, 4, 4) = 2, kasie_kebun2, kasie_kebun3)) AS kasbun,image,pdf,date,jenis,kategori');
        $this->db->from('wilayah a');
        $this->db->join('lokasi b', 'SUBSTRING(b.kebun, 1, 3) = a.code');
        $this->db->join('gis_photo c', 'c.location = b.lokasi', 'right');
        $this->db->order_by('date', 'DESC');
        $query = $this->db->get();
        return $query->result();
        
    }

function legendandvi1($lokasi){
        $query = $this->db->query(
            "SELECT `1,`AS satu, `2,` AS dua, `3,`AS tiga ,`4,`AS empat, `5,`AS lima, `6,`AS enam 
            FROM plant 
            INNER JOIN `gis_photo`
            ON plant.`photo_id` = `gis_photo`.`photo_id`
            WHERE plot = '0' 
            AND lokasi = '$lokasi'
            AND kategori= 'NDVI'
            AND jenis= 'NDVI'
            AND gis_photo.`date` = (SELECT MAX(gis_photo.`date`) FROM gis_photo 
				    WHERE location='$lokasi'
				    AND kategori= 'NDVI'
				    AND jenis= 'NDVI')
            GROUP BY `umur_forcing` ");
            return $query;
    }
    
    function legendandvi2($lokasi){
        $query = $this->db->query(
            "SELECT `1-2`AS satu1,`3-4`AS dua1,`5-6`AS tiga1 
            FROM plant
            INNER JOIN `gis_photo`	
            ON plant.`photo_id` = `gis_photo`.`photo_id`
            WHERE plot = '0' 
            AND lokasi = '$lokasi'
            AND kategori= 'NDVI'
            AND jenis= 'NDVI'
            AND gis_photo.`date` = (SELECT MAX(gis_photo.`date`) FROM gis_photo 
                WHERE location='$lokasi'
                AND kategori= 'NDVI'
                AND jenis= 'NDVI')");
            return $query;
    }

    function legendalog1($lokasi){
        $query = $this->db->query(
            "SELECT `1,`AS satu, `2,` AS dua, `3,`AS tiga ,`4,`AS empat, `5,`AS lima, `6,`AS enam 
            FROM plant 
            INNER JOIN `gis_photo`
            ON plant.`photo_id` = `gis_photo`.`photo_id`
            WHERE plot = '0' 
            AND lokasi = '$lokasi'
            AND kategori= 'NDVI'
            AND jenis= 'level of greennes'
            AND gis_photo.`date` = (SELECT MAX(gis_photo.`date`) FROM gis_photo 
				    WHERE location='$lokasi'
				    AND kategori= 'NDVI'
				    AND jenis= 'level of greennes')
            GROUP BY `umur_forcing` ");
            return $query;
    }
    
    function legendalog2($lokasi){
        $query = $this->db->query(
            "SELECT `1-2`AS satu1,`3-4`AS dua1,`5-6`AS tiga1 
            FROM plant
            INNER JOIN `gis_photo`	
            ON plant.`photo_id` = `gis_photo`.`photo_id`
            WHERE plot = '0' 
            AND lokasi = '$lokasi'
            AND kategori= 'NDVI'
            AND jenis= 'level of greennes'
            AND gis_photo.`date` = (SELECT MAX(gis_photo.`date`) FROM gis_photo 
                WHERE location='$lokasi'
                AND kategori= 'NDVI'
                AND jenis= 'level of greennes')");
            return $query;
    }
    
    
function trendndvi($lokasi){
        $query = $this->db->query(
            "SELECT * FROM
            (SELECT plant.umur_forcing,
                        `0-0,05` AS satu ,
                        `0,05-0,1` AS dua,
                        `0,1-0,15` AS tiga,
                        `0,15-0,2` AS empat,
                        `0,2-0,25` AS lima,
                        `0,25-0,3` AS enam,
                        `0,3-0,35` AS tujuh,
                        `0,35-0,4` AS delapan,
                        `0,4-0,45` AS sembilan,
                        `0,45-0,5` AS sepuluh,
                        `0,5-0,55` AS sebelas,
                        `0,55-0,6` AS duabelas,
                        `0,6-0,65` AS tigabelas,
                        `0,65-0,7` AS empatbelas,
                        `0,7-0,75` AS limabelas,
                        `0,75-0,8` AS enambelas,
                        `0,8-0,85` AS tujuhbelas,
                        `0,85-0,9` AS delapanbelas,
                        `0,9-0,95` AS sembilanbelas,
                        `0,95-1` AS duapuluh
                        FROM plant
                        INNER JOIN gis_photo
                        ON gis_photo.`photo_id` = plant.`photo_id`
                        WHERE plot = '0'
                        AND jenis= 'NDVI'
                        AND kategori ='NDVI'
                        AND lokasi= '$lokasi'
                        AND `umur_forcing`= '1' 
                        AND `tanggal_terbang` = (SELECT MAX(`tanggal_terbang`) FROM plant WHERE `umur_forcing`='1' AND plot ='0' AND lokasi='$lokasi')
            UNION
            SELECT plant.umur_forcing,
                        `0-0,05` AS satu ,
                        `0,05-0,1` AS dua,
                        `0,1-0,15` AS tiga,
                        `0,15-0,2` AS empat,
                        `0,2-0,25` AS lima,
                        `0,25-0,3` AS enam,
                        `0,3-0,35` AS tujuh,
                        `0,35-0,4` AS delapan,
                        `0,4-0,45` AS sembilan,
                        `0,45-0,5` AS sepuluh,
                        `0,5-0,55` AS sebelas,
                        `0,55-0,6` AS duabelas,
                        `0,6-0,65` AS tigabelas,
                        `0,65-0,7` AS empatbelas,
                        `0,7-0,75` AS limabelas,
                        `0,75-0,8` AS enambelas,
                        `0,8-0,85` AS tujuhbelas,
                        `0,85-0,9` AS delapanbelas,
                        `0,9-0,95` AS sembilanbelas,
                        `0,95-1` AS duapuluh
                        FROM plant
                        INNER JOIN gis_photo
                        ON gis_photo.`photo_id` = plant.`photo_id`
                        WHERE plot = '0'
                        AND jenis= 'NDVI'
                        AND kategori ='NDVI'
                        AND lokasi= '$lokasi'
                        AND `umur_forcing`= '2' 
                        AND `tanggal_terbang` = (SELECT MAX(`tanggal_terbang`) FROM plant WHERE `umur_forcing`='2' AND plot ='0' AND lokasi='$lokasi')
            UNION
            SELECT plant.umur_forcing,
                        `0-0,05` AS satu ,
                        `0,05-0,1` AS dua,
                        `0,1-0,15` AS tiga,
                        `0,15-0,2` AS empat,
                        `0,2-0,25` AS lima,
                        `0,25-0,3` AS enam,
                        `0,3-0,35` AS tujuh,
                        `0,35-0,4` AS delapan,
                        `0,4-0,45` AS sembilan,
                        `0,45-0,5` AS sepuluh,
                        `0,5-0,55` AS sebelas,
                        `0,55-0,6` AS duabelas,
                        `0,6-0,65` AS tigabelas,
                        `0,65-0,7` AS empatbelas,
                        `0,7-0,75` AS limabelas,
                        `0,75-0,8` AS enambelas,
                        `0,8-0,85` AS tujuhbelas,
                        `0,85-0,9` AS delapanbelas,
                        `0,9-0,95` AS sembilanbelas,
                        `0,95-1` AS duapuluh
                        FROM plant
                        INNER JOIN gis_photo
                        ON gis_photo.`photo_id` = plant.`photo_id`
                        WHERE plot = '0'
                        AND jenis= 'NDVI'
                        AND kategori ='NDVI'
                        AND lokasi= '$lokasi'
                        AND `umur_forcing`= '3' 
                        AND `tanggal_terbang` = (SELECT MAX(`tanggal_terbang`) FROM plant WHERE `umur_forcing`='3' AND plot ='0' AND lokasi='$lokasi')
            UNION
            SELECT plant.umur_forcing,
                        `0-0,05` AS satu ,
                        `0,05-0,1` AS dua,
                        `0,1-0,15` AS tiga,
                        `0,15-0,2` AS empat,
                        `0,2-0,25` AS lima,
                        `0,25-0,3` AS enam,
                        `0,3-0,35` AS tujuh,
                        `0,35-0,4` AS delapan,
                        `0,4-0,45` AS sembilan,
                        `0,45-0,5` AS sepuluh,
                        `0,5-0,55` AS sebelas,
                        `0,55-0,6` AS duabelas,
                        `0,6-0,65` AS tigabelas,
                        `0,65-0,7` AS empatbelas,
                        `0,7-0,75` AS limabelas,
                        `0,75-0,8` AS enambelas,
                        `0,8-0,85` AS tujuhbelas,
                        `0,85-0,9` AS delapanbelas,
                        `0,9-0,95` AS sembilanbelas,
                        `0,95-1` AS duapuluh
                        FROM plant
                        INNER JOIN gis_photo
                        ON gis_photo.`photo_id` = plant.`photo_id`
                        WHERE plot = '0'
                        AND jenis= 'NDVI'
                        AND kategori ='NDVI'
                        AND lokasi= '$lokasi'
                        AND `umur_forcing`= '4' 
                        AND `tanggal_terbang` = (SELECT MAX(`tanggal_terbang`) FROM plant WHERE `umur_forcing`='4' AND plot ='0' AND lokasi='$lokasi')
            UNION
            SELECT plant.umur_forcing,
                        `0-0,05` AS satu ,
                        `0,05-0,1` AS dua,
                        `0,1-0,15` AS tiga,
                        `0,15-0,2` AS empat,
                        `0,2-0,25` AS lima,
                        `0,25-0,3` AS enam,
                        `0,3-0,35` AS tujuh,
                        `0,35-0,4` AS delapan,
                        `0,4-0,45` AS sembilan,
                        `0,45-0,5` AS sepuluh,
                        `0,5-0,55` AS sebelas,
                        `0,55-0,6` AS duabelas,
                        `0,6-0,65` AS tigabelas,
                        `0,65-0,7` AS empatbelas,
                        `0,7-0,75` AS limabelas,
                        `0,75-0,8` AS enambelas,
                        `0,8-0,85` AS tujuhbelas,
                        `0,85-0,9` AS delapanbelas,
                        `0,9-0,95` AS sembilanbelas,
                        `0,95-1` AS duapuluh
                        FROM plant
                        INNER JOIN gis_photo
                        ON gis_photo.`photo_id` = plant.`photo_id`
                        WHERE plot = '0'
                        AND jenis= 'NDVI'
                        AND kategori ='NDVI'
                        AND lokasi= '$lokasi'
                        AND `umur_forcing`= '5' 
                        AND `tanggal_terbang` = (SELECT MAX(`tanggal_terbang`) FROM plant WHERE `umur_forcing`='5' AND plot ='0' AND lokasi='$lokasi')
            UNION
            SELECT plant.umur_forcing,
                        `0-0,05` AS satu ,
                        `0,05-0,1` AS dua,
                        `0,1-0,15` AS tiga,
                        `0,15-0,2` AS empat,
                        `0,2-0,25` AS lima,
                        `0,25-0,3` AS enam,
                        `0,3-0,35` AS tujuh,
                        `0,35-0,4` AS delapan,
                        `0,4-0,45` AS sembilan,
                        `0,45-0,5` AS sepuluh,
                        `0,5-0,55` AS sebelas,
                        `0,55-0,6` AS duabelas,
                        `0,6-0,65` AS tigabelas,
                        `0,65-0,7` AS empatbelas,
                        `0,7-0,75` AS limabelas,
                        `0,75-0,8` AS enambelas,
                        `0,8-0,85` AS tujuhbelas,
                        `0,85-0,9` AS delapanbelas,
                        `0,9-0,95` AS sembilanbelas,
                        `0,95-1` AS duapuluh
                        FROM plant
                        INNER JOIN gis_photo
                        ON gis_photo.`photo_id` = plant.`photo_id`
                        WHERE plot = '0'
                        AND jenis= 'NDVI'
                        AND kategori ='NDVI'
                        AND lokasi= '$lokasi'
                        AND `umur_forcing`= '6' 
                        AND `tanggal_terbang` = (SELECT MAX(`tanggal_terbang`) FROM plant WHERE `umur_forcing`='6' AND plot ='0' AND lokasi='$lokasi')
            UNION
            SELECT plant.umur_forcing,
                        `0-0,05` AS satu ,
                        `0,05-0,1` AS dua,
                        `0,1-0,15` AS tiga,
                        `0,15-0,2` AS empat,
                        `0,2-0,25` AS lima,
                        `0,25-0,3` AS enam,
                        `0,3-0,35` AS tujuh,
                        `0,35-0,4` AS delapan,
                        `0,4-0,45` AS sembilan,
                        `0,45-0,5` AS sepuluh,
                        `0,5-0,55` AS sebelas,
                        `0,55-0,6` AS duabelas,
                        `0,6-0,65` AS tigabelas,
                        `0,65-0,7` AS empatbelas,
                        `0,7-0,75` AS limabelas,
                        `0,75-0,8` AS enambelas,
                        `0,8-0,85` AS tujuhbelas,
                        `0,85-0,9` AS delapanbelas,
                        `0,9-0,95` AS sembilanbelas,
                        `0,95-1` AS duapuluh
                        FROM plant
                        INNER JOIN gis_photo
                        ON gis_photo.`photo_id` = plant.`photo_id`
                        WHERE plot = '0'
                        AND jenis= 'NDVI'
                        AND kategori ='NDVI'
                        AND lokasi= '$lokasi'
                        AND `umur_forcing`= '7' 
                        AND `tanggal_terbang` = (SELECT MAX(`tanggal_terbang`) FROM plant WHERE `umur_forcing`='7' AND plot ='0' AND lokasi='$lokasi'))a
             RIGHT JOIN 
             (SELECT umur_f.`F` FROM umur_f) b
             ON a.umur_forcing=b.f");
            return $query;
    }

    function trendlog($lokasi){
        $query = $this->db->query(
            "SELECT * FROM
            (SELECT plant.umur_forcing,
                        `0-0,05` AS satu ,
                        `0,05-0,1` AS dua,
                        `0,1-0,15` AS tiga,
                        `0,15-0,2` AS empat,
                        `0,2-0,25` AS lima,
                        `0,25-0,3` AS enam,
                        `0,3-0,35` AS tujuh,
                        `0,35-0,4` AS delapan,
                        `0,4-0,45` AS sembilan,
                        `0,45-0,5` AS sepuluh,
                        `0,5-0,55` AS sebelas,
                        `0,55-0,6` AS duabelas,
                        `0,6-0,65` AS tigabelas,
                        `0,65-0,7` AS empatbelas,
                        `0,7-0,75` AS limabelas,
                        `0,75-0,8` AS enambelas,
                        `0,8-0,85` AS tujuhbelas,
                        `0,85-0,9` AS delapanbelas,
                        `0,9-0,95` AS sembilanbelas,
                        `0,95-1` AS duapuluh
                        FROM plant
                        INNER JOIN gis_photo
                        ON gis_photo.`photo_id` = plant.`photo_id`
                        WHERE plot = '0'
                        AND jenis= 'level of greennes'
                        AND kategori ='NDVI'
                        AND lokasi= '$lokasi'
                        AND `umur_forcing`= '1' 
                        AND `tanggal_terbang` = (SELECT MAX(`tanggal_terbang`) FROM plant WHERE `umur_forcing`='1' AND plot ='0' AND lokasi='$lokasi')
            UNION
            SELECT plant.umur_forcing,
                        `0-0,05` AS satu ,
                        `0,05-0,1` AS dua,
                        `0,1-0,15` AS tiga,
                        `0,15-0,2` AS empat,
                        `0,2-0,25` AS lima,
                        `0,25-0,3` AS enam,
                        `0,3-0,35` AS tujuh,
                        `0,35-0,4` AS delapan,
                        `0,4-0,45` AS sembilan,
                        `0,45-0,5` AS sepuluh,
                        `0,5-0,55` AS sebelas,
                        `0,55-0,6` AS duabelas,
                        `0,6-0,65` AS tigabelas,
                        `0,65-0,7` AS empatbelas,
                        `0,7-0,75` AS limabelas,
                        `0,75-0,8` AS enambelas,
                        `0,8-0,85` AS tujuhbelas,
                        `0,85-0,9` AS delapanbelas,
                        `0,9-0,95` AS sembilanbelas,
                        `0,95-1` AS duapuluh
                        FROM plant
                        INNER JOIN gis_photo
                        ON gis_photo.`photo_id` = plant.`photo_id`
                        WHERE plot = '0'
                        AND jenis= 'level of greennes'
                        AND kategori ='NDVI'
                        AND lokasi= '$lokasi'
                        AND `umur_forcing`= '2' 
                        AND `tanggal_terbang` = (SELECT MAX(`tanggal_terbang`) FROM plant WHERE `umur_forcing`='2' AND plot ='0' AND lokasi='$lokasi')
            UNION
            SELECT plant.umur_forcing,
                        `0-0,05` AS satu ,
                        `0,05-0,1` AS dua,
                        `0,1-0,15` AS tiga,
                        `0,15-0,2` AS empat,
                        `0,2-0,25` AS lima,
                        `0,25-0,3` AS enam,
                        `0,3-0,35` AS tujuh,
                        `0,35-0,4` AS delapan,
                        `0,4-0,45` AS sembilan,
                        `0,45-0,5` AS sepuluh,
                        `0,5-0,55` AS sebelas,
                        `0,55-0,6` AS duabelas,
                        `0,6-0,65` AS tigabelas,
                        `0,65-0,7` AS empatbelas,
                        `0,7-0,75` AS limabelas,
                        `0,75-0,8` AS enambelas,
                        `0,8-0,85` AS tujuhbelas,
                        `0,85-0,9` AS delapanbelas,
                        `0,9-0,95` AS sembilanbelas,
                        `0,95-1` AS duapuluh
                        FROM plant
                        INNER JOIN gis_photo
                        ON gis_photo.`photo_id` = plant.`photo_id`
                        WHERE plot = '0'
                        AND jenis= 'level of greennes'
                        AND kategori ='NDVI'
                        AND lokasi= '$lokasi'
                        AND `umur_forcing`= '3' 
                        AND `tanggal_terbang` = (SELECT MAX(`tanggal_terbang`) FROM plant WHERE `umur_forcing`='3' AND plot ='0' AND lokasi='$lokasi')
            UNION
            SELECT plant.umur_forcing,
                        `0-0,05` AS satu ,
                        `0,05-0,1` AS dua,
                        `0,1-0,15` AS tiga,
                        `0,15-0,2` AS empat,
                        `0,2-0,25` AS lima,
                        `0,25-0,3` AS enam,
                        `0,3-0,35` AS tujuh,
                        `0,35-0,4` AS delapan,
                        `0,4-0,45` AS sembilan,
                        `0,45-0,5` AS sepuluh,
                        `0,5-0,55` AS sebelas,
                        `0,55-0,6` AS duabelas,
                        `0,6-0,65` AS tigabelas,
                        `0,65-0,7` AS empatbelas,
                        `0,7-0,75` AS limabelas,
                        `0,75-0,8` AS enambelas,
                        `0,8-0,85` AS tujuhbelas,
                        `0,85-0,9` AS delapanbelas,
                        `0,9-0,95` AS sembilanbelas,
                        `0,95-1` AS duapuluh
                        FROM plant
                        INNER JOIN gis_photo
                        ON gis_photo.`photo_id` = plant.`photo_id`
                        WHERE plot = '0'
                        AND jenis= 'level of greennes'
                        AND kategori ='NDVI'
                        AND lokasi= '$lokasi'
                        AND `umur_forcing`= '4' 
                        AND `tanggal_terbang` = (SELECT MAX(`tanggal_terbang`) FROM plant WHERE `umur_forcing`='4' AND plot ='0' AND lokasi='$lokasi')
            UNION
            SELECT plant.umur_forcing,
                        `0-0,05` AS satu ,
                        `0,05-0,1` AS dua,
                        `0,1-0,15` AS tiga,
                        `0,15-0,2` AS empat,
                        `0,2-0,25` AS lima,
                        `0,25-0,3` AS enam,
                        `0,3-0,35` AS tujuh,
                        `0,35-0,4` AS delapan,
                        `0,4-0,45` AS sembilan,
                        `0,45-0,5` AS sepuluh,
                        `0,5-0,55` AS sebelas,
                        `0,55-0,6` AS duabelas,
                        `0,6-0,65` AS tigabelas,
                        `0,65-0,7` AS empatbelas,
                        `0,7-0,75` AS limabelas,
                        `0,75-0,8` AS enambelas,
                        `0,8-0,85` AS tujuhbelas,
                        `0,85-0,9` AS delapanbelas,
                        `0,9-0,95` AS sembilanbelas,
                        `0,95-1` AS duapuluh
                        FROM plant
                        INNER JOIN gis_photo
                        ON gis_photo.`photo_id` = plant.`photo_id`
                        WHERE plot = '0'
                        AND jenis= 'level of greennes'
                        AND kategori ='NDVI'
                        AND lokasi= '$lokasi'
                        AND `umur_forcing`= '5' 
                        AND `tanggal_terbang` = (SELECT MAX(`tanggal_terbang`) FROM plant WHERE `umur_forcing`='5' AND plot ='0' AND lokasi='$lokasi')
            UNION
            SELECT plant.umur_forcing,
                        `0-0,05` AS satu ,
                        `0,05-0,1` AS dua,
                        `0,1-0,15` AS tiga,
                        `0,15-0,2` AS empat,
                        `0,2-0,25` AS lima,
                        `0,25-0,3` AS enam,
                        `0,3-0,35` AS tujuh,
                        `0,35-0,4` AS delapan,
                        `0,4-0,45` AS sembilan,
                        `0,45-0,5` AS sepuluh,
                        `0,5-0,55` AS sebelas,
                        `0,55-0,6` AS duabelas,
                        `0,6-0,65` AS tigabelas,
                        `0,65-0,7` AS empatbelas,
                        `0,7-0,75` AS limabelas,
                        `0,75-0,8` AS enambelas,
                        `0,8-0,85` AS tujuhbelas,
                        `0,85-0,9` AS delapanbelas,
                        `0,9-0,95` AS sembilanbelas,
                        `0,95-1` AS duapuluh
                        FROM plant
                        INNER JOIN gis_photo
                        ON gis_photo.`photo_id` = plant.`photo_id`
                        WHERE plot = '0'
                        AND jenis= 'level of greennes'
                        AND kategori ='NDVI'
                        AND lokasi= '$lokasi'
                        AND `umur_forcing`= '6' 
                        AND `tanggal_terbang` = (SELECT MAX(`tanggal_terbang`) FROM plant WHERE `umur_forcing`='6' AND plot ='0' AND lokasi='$lokasi')
            UNION
            SELECT plant.umur_forcing,
                        `0-0,05` AS satu ,
                        `0,05-0,1` AS dua,
                        `0,1-0,15` AS tiga,
                        `0,15-0,2` AS empat,
                        `0,2-0,25` AS lima,
                        `0,25-0,3` AS enam,
                        `0,3-0,35` AS tujuh,
                        `0,35-0,4` AS delapan,
                        `0,4-0,45` AS sembilan,
                        `0,45-0,5` AS sepuluh,
                        `0,5-0,55` AS sebelas,
                        `0,55-0,6` AS duabelas,
                        `0,6-0,65` AS tigabelas,
                        `0,65-0,7` AS empatbelas,
                        `0,7-0,75` AS limabelas,
                        `0,75-0,8` AS enambelas,
                        `0,8-0,85` AS tujuhbelas,
                        `0,85-0,9` AS delapanbelas,
                        `0,9-0,95` AS sembilanbelas,
                        `0,95-1` AS duapuluh
                        FROM plant
                        INNER JOIN gis_photo
                        ON gis_photo.`photo_id` = plant.`photo_id`
                        WHERE plot = '0'
                        AND jenis= 'level of greennes'
                        AND kategori ='NDVI'
                        AND lokasi= '$lokasi'
                        AND `umur_forcing`= '7' 
                        AND `tanggal_terbang` = (SELECT MAX(`tanggal_terbang`) FROM plant WHERE `umur_forcing`='7' AND plot ='0' AND lokasi='$lokasi'))a
             RIGHT JOIN 
             (SELECT umur_f.`F` FROM umur_f) b
             ON a.umur_forcing=b.f");
            return $query;
    }
    
    function id_photo(){
        $query = $this->db->query("SELECT `photo_id` FROM `gis_photo`
        ORDER BY `photo_id`DESC LIMIT 1"
            );
            return $query;
    }

    function datendvi($lokasi){
        $query = $this->db->query(
            "SELECT * FROM `gis_photo` 
            WHERE `kategori` ='NDVI'
            AND `jenis` = 'NDVI'
            AND  location = '$lokasi'
            ORDER BY `date` DESC");
            return $query;
    }
    
    function datepw($lokasi){
        $query = $this->db->query(
            "SELECT * FROM `gis_photo` 
            WHERE `kategori` ='NDVI'
            AND `jenis` = 'plant weight'
            AND  location = '$lokasi'
            ORDER BY `date` DESC");
            return $query;
    }
    function datelog($lokasi){
        $query = $this->db->query(
            "SELECT * FROM `gis_photo` 
            WHERE `kategori` ='NDVI'
            AND `jenis` = 'level of greennes'
            AND  location = '$lokasi'
            ORDER BY `date` DESC");
            return $query;
    }

    function datergb($lokasi){
        $query = $this->db->query(
            "SELECT * FROM `gis_photo` 
            WHERE `kategori` ='DSM'
            AND `jenis` = 'RGB'
            AND  location = '$lokasi'
            ORDER BY `date` DESC");
            return $query;
    }

    function datewd($lokasi){
        $query = $this->db->query(
            "SELECT * FROM `gis_photo` 
            WHERE `kategori` ='DSM'
            AND `jenis` = 'Water Direction'
            AND  location = '$lokasi'
            ORDER BY `date` DESC");
            return $query;
    }

    function datewl($lokasi){
        $query = $this->db->query(
            "SELECT * FROM `gis_photo` 
            WHERE `kategori` ='DSM'
            AND `jenis` = 'Water Logging'
            AND  location = '$lokasi'
            ORDER BY `date` DESC");
            return $query;
    }

    function datewf($lokasi){
        $query = $this->db->query(
            "SELECT * FROM `gis_photo` 
            WHERE `kategori` ='DSM'
            AND `jenis` = 'Water Flow'
            AND  location = '$lokasi'
            ORDER BY `date` DESC");
            return $query;
    }

    function datedl($lokasi){
        $query = $this->db->query(
            "SELECT * FROM `gis_photo` 
            WHERE `kategori` ='DSM'
            AND `jenis` = 'Design Location'
            AND  location = '$lokasi'
            ORDER BY `date` DESC");
            return $query;
    }

    function datedsm($lokasi){
        $query = $this->db->query(
            "SELECT * FROM `gis_photo` 
            WHERE `kategori` ='DSM'
            AND `jenis` = 'DSM'
            AND  location = '$lokasi'
            ORDER BY `date` DESC");
            return $query;
    }

    function datedd($lokasi){
        $query = $this->db->query(
            "SELECT * FROM `gis_photo` 
            WHERE `kategori` ='DSM'
            AND `jenis` = 'Design Deal'
            AND  location = '$lokasi'
            ORDER BY `date` DESC");
            return $query;
    }

    
}
