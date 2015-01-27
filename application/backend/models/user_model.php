<?php

class user_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function usersdata($per_page, $offset, $sortfield, $order) {

        $this->db->select('*')->from('users');
        $this->db->order_by("$sortfield", "$order");
        $this->db->limit($per_page, $offset);
        $query_result = $this->db->get();

        if ($query_result->num_rows() > 0) {
            foreach ($query_result->result_array() as $row) {
                $sdata[] = array('name' => $row['name'], 'email' => $row['email'], 'id' => $row['id']);
            }
            return $sdata;
        } else {
            return false;
        }
    }

    /* public function getuserData($searchdata = array()){

      if(!isset($searchdata["page"]) || $searchdata["page"]=="")
      {
      $searchdata["page"]=0;
      }
      if(!isset($searchdata["countdata"]))
      {
      if(isset($searchdata["per_page"]) && $searchdata["per_page"]!="")
      {
      $recordperpage=$searchdata["per_page"];
      }
      else
      {
      $recordperpage=1;
      }
      if(isset($searchdata["page"]) && $searchdata["page"]!="")
      {
      $startlimit=$searchdata["page"];
      }
      else
      {
      $startlimit=0;
      }
      }

      $this->db->select("*");
      $this->db->from("users");



      if(isset($searchdata["filter"]) && ($searchdata["filter"] == "name"))
      {
      //$this->db->like('users.nationality', ($searchdata["search"]));
      $where = array("users.name" => $searchdata["search"]);
      $this->db->where($where);
      }

      //fetch record according to country
      if(isset($searchdata["filter"]) && ($searchdata["filter"] == "nationality"))
      {
      //$this->db->like('users.nationality', ($searchdata["search"]));
      $where = array("users.nationality" => $searchdata["search"]);
      $this->db->where($where);
      }

      //fetch record according to country
      else if(isset($searchdata["filter"]) && ($searchdata["filter"] == "identification_type"))
      {
      $where = array("users.identification_type" => $searchdata["search"]);
      $this->db->where($where);
      }

      //fetch record according to country
      else if(isset($searchdata["filter"]) && ($searchdata["filter"] == "email"))
      {
      $this->db->like("users.email",$searchdata["search"]);
      //	$where = array("users.email" => $searchdata["search"]);
      //$this->db->where($where);
      }




      foreach($searchdata as $key=>$val)
      {
      if(isset($searcharray[$key]) && $searchdata[$key]!="")
      {
      if(array_key_exists($key,$searcharray))
      {
      $where=array($searcharray[$key]=>$val);
      $this->db->where($where);
      }
      }
      }

      $where = array("users.status <>" => "4");
      $this->db->where($where);
      //$this->db->order_by("id DESC");
      if($searchdata["col"]!="" && $searchdata["col_val"]!="")
      {
      $this->db->order_by($searchdata["col"], $searchdata["col_val"]);
      }
      else
      {
      $this->db->order_by("id DESC");
      }
      if(isset($searchdata["per_page"]) && $searchdata["per_page"]!="")
      {
      if(isset($recordperpage) && $recordperpage!="" && ($startlimit!="" || $startlimit==0))
      {
      $this->db->limit($recordperpage,$startlimit);
      }
      }

      $query = $this->db->get();
      //echo $this->db->last_query();
      //die;
      $resultset = $query->result_array();
      //debug($resultset);
      return $resultset;
      } */

    public function getuserData($searchdata = array()) {

        if (!isset($searchdata["page"]) || $searchdata["page"] == "") {
            $searchdata["page"] = 0;
        }
        if (!isset($searchdata["countdata"])) {
            if (isset($searchdata["per_page"]) && $searchdata["per_page"] != "") {
                $recordperpage = $searchdata["per_page"];
            } else {
                $recordperpage = 1;
            }
            if (isset($searchdata["page"]) && $searchdata["page"] != "") {
                $startlimit = $searchdata["page"];
            } else {
                $startlimit = 0;
            }
        }

        $this->db->select("*");
        $this->db->from("users");



        if (isset($searchdata["filter"]) && ($searchdata["filter"] == "name")) {
            //$this->db->like('users.nationality', ($searchdata["search"]));
            $where = array("users.name" => $searchdata["search"]);
            $this->db->where($where);
        }

        //fetch record according to country
        if (isset($searchdata["filter"]) && ($searchdata["filter"] == "nationality")) {
            //$this->db->like('users.nationality', ($searchdata["search"]));
            $where = array("users.nationality" => $searchdata["search"]);
            $this->db->where($where);
        }

        //fetch record according to country
        else if (isset($searchdata["filter"]) && ($searchdata["filter"] == "identification_type")) {
            $where = array("users.identification_type" => $searchdata["search"]);
            $this->db->where($where);
        }

        //fetch record according to country
        else if (isset($searchdata["filter"]) && ($searchdata["filter"] == "email")) {
            $this->db->like("users.email", $searchdata["search"]);
            //	$where = array("users.email" => $searchdata["search"]);
            //$this->db->where($where);
        }

        foreach ($searchdata as $key => $val) {
            if (isset($searcharray[$key]) && $searchdata[$key] != "") {
                if (array_key_exists($key, $searcharray)) {
                    $where = array($searcharray[$key] => $val);
                    $this->db->where($where);
                }
            }
        }

        $where = array("users.status <>" => "4");
        $this->db->where($where);
        $this->db->order_by("id DESC");
        //$this->db->order_by("name ASC");	

        if (isset($searchdata["per_page"]) && $searchdata["per_page"] != "") {
            if (isset($recordperpage) && $recordperpage != "" && ($startlimit != "" || $startlimit == 0)) {
                $this->db->limit($recordperpage, $startlimit);
            }
        }

        $query = $this->db->get();
        //echo $this->db->last_query();die;
        $resultset = $query->result_array();
        //debug($resultset);
        return $resultset;
    }

    public function view_user($id) {
        $this->db->select("*");
        $this->db->from('users');
        $where = array("id" => $id, "status <> " => '4');
        $this->db->where($where);
        $query = $this->db->get();
        //echo $this->db->last_query();
        $resultset = $query->row_array();
        return $resultset;
    }

    public function enable_disable_user($id, $status) {
        $this->db->where("id", $id);
        $arr = array("status" => $status);
        return $this->db->update("users", $arr);
        //return $this->db->last_query();
    }

    public function delete_user($id) {
        $this->db->where("id", $id);
        $arr = array("status" => 4);
        return $this->db->update("users", $arr);
        //return $this->db->last_query();
    }

    public function delete_organisation($id) {
        $this->db->where("id", $id);
        $arr = array("status" => 4);
        return $this->db->update("organisations", $arr);
        //return $this->db->last_query();
    }

    public function edit_user($arr = array(), $id) {
        $this->db->where('id', $id);
        $query = $this->db->update('users', $arr);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function edit_organisation($arr = array(), $id) {
        $this->db->where('id', $id);
        $query = $this->db->update('organisations', $arr);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function getorganisationData($searchdata = array()) {

        if (!isset($searchdata["page"]) || $searchdata["page"] == "") {
            $searchdata["page"] = 0;
        }
        if (!isset($searchdata["countdata"])) {
            if (isset($searchdata["per_page"]) && $searchdata["per_page"] != "") {
                $recordperpage = $searchdata["per_page"];
            } else {
                $recordperpage = 1;
            }
            if (isset($searchdata["page"]) && $searchdata["page"] != "") {
                $startlimit = $searchdata["page"];
            } else {
                $startlimit = 0;
            }
        }

        $this->db->select("*");
        $this->db->from("organisations");

        /* if(isset($searchdata["search"]) && $searchdata["search"]!="" && $searchdata["search"]!="search")
          {
          $this->db->like("organisations.name",$searchdata["search"]);
          } */
        if (isset($searchdata["filter"]) && ($searchdata["filter"] == "name")) {
            //$this->db->like('users.nationality', ($searchdata["search"]));
            $where = array("organisations.name" => $searchdata["search"]);
            $this->db->where($where);
        }

        //fetch record according to country
        else if (isset($searchdata["filter"]) && ($searchdata["filter"] == "location")) {
            //$this->db->like('users.nationality', ($searchdata["search"]));
            $where = array("organisations.location" => $searchdata["search"]);
            $this->db->where($where);
        }

        //fetch record according to country
        else if (isset($searchdata["filter"]) && ($searchdata["filter"] == "organisation_type")) {
            $this->db->like("organisations.organisation_type", $searchdata["search"]);
            /* $where = array("organisations.organisation_type" => $searchdata["search"]);
              $this->db->where($where); */
        }

        //fetch record according to country
        else if (isset($searchdata["filter"]) && ($searchdata["filter"] == "email")) {
            $this->db->like("organisations.email", $searchdata["search"]);
            //	$where = array("users.email" => $searchdata["search"]);
            //$this->db->where($where);
        }

        foreach ($searchdata as $key => $val) {
            if (isset($searcharray[$key]) && $searchdata[$key] != "") {
                if (array_key_exists($key, $searcharray)) {
                    $where = array($searcharray[$key] => $val);
                    $this->db->where($where);
                }
            }
        }

        $where = array("organisations.status <>" => "4");
        $this->db->where($where);
        $this->db->order_by("id DESC");
        //$this->db->order_by("name asc");		

        if (isset($searchdata["per_page"]) && $searchdata["per_page"] != "") {
            if (isset($recordperpage) && $recordperpage != "" && ($startlimit != "" || $startlimit == 0)) {
                $this->db->limit($recordperpage, $startlimit);
            }
        }

        $query = $this->db->get();
        //	echo $this->db->last_query();die;
        $resultset = $query->result_array();
        //debug($resultset);
        return $resultset;
    }

    public function view_organisation($id) {
        $this->db->select("*");
        $this->db->from('organisations');
        $where = array("id" => $id, "status <> " => '4');
        $this->db->where($where);
        $query = $this->db->get();
        //echo $this->db->last_query();
        $resultset = $query->row_array();
        return $resultset;
    }

    public function enable_disable_organisation($id, $status) {
        $this->db->where("id", $id);
        $arr = array("status" => $status);
        return $this->db->update("organisations", $arr);
        //return $this->db->last_query();
    }

    public function getusercars($id) {

        $this->db->select("*");
        $this->db->from('user_cards');
        $where = array("user_id" => $id, "status <>" => '4');
        $this->db->where($where);
        $this->db->group_by('card_number');
        $this->db->order_by('id desc');
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        $resultset = $query->result_array();
        return $resultset;
    }

    public function save_user_card($array) {

        return $this->db->insert("user_cards", $array);
    }

}

?>