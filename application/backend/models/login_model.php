<?php 
ob_start();
class login_model extends CI_Model { 
    function __construct(){
        parent::__construct();
    }

	public function check_admin_login($arr){
		$this->db->select("*");
		$this->db->from("admin");
		$this->db->where(array("username" => $arr["username"]));
		$result=$this->db->get();
		//echo $this->db->last_query();die;
		$countrows=$result->num_rows();
		$result=$result->row_array();
		return $result;
	}
    
    public function add_personal_user($arr = array()) {
		$arr["password"] = $this->common->salt_password($arr);//generate salted password 
        return $this->db->insert('users', $arr);
		//echo $this->db->last_query();die;
    }
    public function add_organisation_user($arr = array()) {
		$arr["password"] = $this->common->salt_password($arr);//generate salted password 
        return  $this->db->insert('organisations', $arr);
    }
	 public function add_meta_user($arr = array()) {
        return  $this->db->insert('user_meta', $arr);
    }
	
     public function verify_email($id,$type)  
	{	
	
		if($type == "personal")
		{
			$this->db->select('count(*) as count');
			$this->db->from('users');
			$this->db->where(array('id'=>$id,'status' => 0));
			$query = $this->db->get();
			//echo $this->db->last_query();die;
			$verfied=$query->row_array();
			if($verfied["count"] > 0){
				$arr = array("status"=>1);
				$this->db->where(array('id'=>$id));
				$result = $this->db->update("users",$arr);
				$data='0';
			}
			else{
				$data='1';
			}
			return $data;
		}
		else{
			$this->db->select('count(*) as count');
			$this->db->from('organisations');
			$this->db->where(array('id' => $id,'status' => 0));
			$query = $this->db->get();
			//echo $this->db->last_query();die;
			$verfied = $query->row_array();
			if($verfied["count"] > 0){
				$arr = array("status"=>1);
				$this->db->where(array('id' => $id));
				$result = $this->db->update("organisations",$arr);
				$data='0';
			}
			else{
				$data='1';
			}
			return $data;
		}
	}
    public function check_username($username)
    {
        $this->db->select('id');
        $this->db->from('users');
        $this->db->where(array('username'=>$username,"status <>"=>"4"));
        $query=$this->db->get();
        $resultset=$query->num_rows();
        if($resultset==0)
        {
			$this->db->select('id');
            $this->db->from('organisations');
            $this->db->where(array('username'=>$username,"status <>"=>"4"));
            $query=$this->db->get();
            $resultset=$query->num_rows();
            if($resultset==0)
            {
                return true;    
            }
            else
            {
                return false;   
            }       
        }
        else
        {
            return false;   
        }           
    }
    public function check_email($email)

    {
        $this->db->select('id');
        $this->db->from('users');
        $this->db->where(array('email'=>$email,"status <>"=>"4"));
        $query=$this->db->get();
        $resultset=$query->num_rows();
        if($resultset==0)
        {
            $this->db->select('id');
            $this->db->from('organisations');
            $this->db->where(array('email'=>$email,"status <>"=>"4"));
            $query=$this->db->get();
            $resultset=$query->num_rows();
            if($resultset==0)
            {
                return true;    
            }
            else
            {
                return false;   
            }       
        }
        else
        {
            return false;   
        }           
    }
}