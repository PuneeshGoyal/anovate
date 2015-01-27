<?php

class Account_Model extends CI_Model {
    function __construct() {
        parent::__construct();
    }
    
    public function get_user_info_org($userid) {
        $this->db->select("*");
        $this->db->from('organisations');
        $this->db->where('id', $userid);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_user_info_user($userid) {
        $this->db->select("*");
        $this->db->from('users');
        $this->db->where('id', $userid);
        $query = $this->db->get();
        return $query->row_array();
    }
    
    public function get_countries() {
        $this->db->select("country");
        $this->db->from('regions');
        $query = $this->db->get();
        //debug($query->result_array()); die;
        return $query->result_array();
    }
    
    public function edit_account_org($arr= array(), $id) {
        $this->db->where('id', $id);
        $query = $this->db->update('organisations', $arr);
        if($query) {
            return true;
        } else {
            return false;
        }
        
    }
    
    public function edit_account_user($arr=array(), $id) {
		
        $this->db->where('id', $id);
        $query = $this->db->update('users', $arr);
		//echo $this->db->last_query();die;
		
        if($query) {
            return true;
        } else {
            return false;
        }
    }
    
    public function edit_acc_password($arr) {
        $this->db->where('id', $arr['id']);
        $this->db->update('organisations', $arr);
    }
}

?>