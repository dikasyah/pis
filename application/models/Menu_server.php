<?php

class Menu_server extends CI_Model{

    function ambilMainMenu($table){
        $query = $this->db->get($table);
        return $query->result();
    }

    function cekLogin($username,$password){
        $condition = array(
			'username' => $username,
			'password' => $password,
        );
        $this->db->select("index");
        $this->db->from("user");
        $this->db->where($condition);
        $query = $this->db->get();
        return $query->result();
    }

    function ambilData($param){
        $this->db->select("*");
        $this->db->from('submenus');
        $this->db->join('submenulist', 'submenus.submenus_id = submenulist.submenus_id');
        $this->db->where('menus_id', $param);
        $query = $this->db->get();
        return $query->result();
    }
    function ambilDataDua($param){
        $this->db->select("*");
        $this->db->from('activities');
        $this->db->join('activitylist', 'activities.activities_id = activitylist.activities_id');
        $this->db->where('submenus_id', $param);
        $query = $this->db->get();
        return $query->result();
    }

    function simpanUpload($comment,$image,$lokasi,$uid,$title){
        $data = array(
            'comment' => $comment,
            'img' => $image,
            'lokasi' => $lokasi, 
            'title' => $title,
        );  
        
        $this->db->insert('post',$data);
        $post_id = $this->db->insert_id();
        
        $data2 = array(
           'post_id' => $post_id,
           'user_id' => $uid, 
        );
        $result = $this->db->insert('postlist', $data2);
        return $result;
    }

    function ambilPost(){
        $this->db->select('*');
        $this->db->from('postlist a'); 
        $this->db->join('post b', 'b.post_id=a.post_id');
        $this->db->join('user c', 'c.index=a.user_id');       
        $query = $this->db->get(); 
        return $query->result();
    }

    function editProfile($image_profile, $id){
        $data = array(
            'foto' => $image_profile,
        );  
        $this->db->where('index', $id);
        $result = $this->db->update('user',$data);
        return $result;
    }
    function editSampul($image_sampul, $id){
        $data = array(
            'background' => $image_sampul,
        );  
        $this->db->where('index', $id);
        $result = $this->db->update('user',$data);
        return $result;
    }
    function readProfileImage($param){
        $this->db->select("*");
        $this->db->from('user');
        $this->db->where('index', $param);
        $query = $this->db->get();
        return $query->result();
    }
    function inputComment($pid,$com,$uid){
        $comData = array(
            'user_id' => $uid,
            'comment_value' => $com, 
        );  
        $this->db->insert('comments',$comData);
        $com_id = $this->db->insert_id();
        $comData2 = array(
           'comment_id' => $com_id,
           'post_id' => $pid, 
        );
        $result = $this->db->insert('commentlist', $comData2);
        return $result;
    }

    function getComment($param){
        
        $this->db->select('*');
        $this->db->from('comments a'); 
        $this->db->join('commentlist b', 'b.comment_id = a.comment_id');
        $this->db->join('user c', 'c.index = a.user_id');  
        $this->db->where('post_id', $param);
        $query = $this->db->get(); 
        return $query->result();
    }
}
