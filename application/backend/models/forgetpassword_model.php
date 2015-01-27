<?php 
class forgetpassword_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
    }

	public function get_user(){
		$this->db->select("*");	
		$this->db->from('users');
		$where=array("status" =>1,"archive <> " => 1);
		$this->db->where($where);
		$this->db->order_by("name asc");
		$query = $this->db->get();
	    //echo $this->db->last_query();die;
		$resultset=$query->result_array();
		return $resultset;	
	}
	public function forgot_password($arr){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where(array('email' => $arr["email"],'status' => 1));
		$query = $this->db->get();
		$resultset = $query->num_rows();
		//echo $this->db->last_query();die;
		$result = $query->row_array();
        if($resultset == 0) {
            $this->db->select('*');
            $this->db->from('organisations');
            $this->db->where(array('email' => $arr["email"],'status' => 1));
            $query = $this->db->get();
            $resultset = $query->num_rows();
            $result = $query->row_array();
            if($resultset == 0) {
                return false;
            } else {
				$this->session->set_userdata('usertype', 'organisation');
                return $result;
            }
        } else {
			  $this->session->set_userdata('usertype', 'personal');
            return $result;
        }
	}
	
	public function update_forgot_password($arr , $usertype)
	{
		$email = $arr["email"];
	
		$this->db->where(array("email" => $email));
        if($usertype == 'personal')
		{
		    $result = $this->db->update("users",$arr);
        }
		else
		{
            $result = $this->db->update("organisations",$arr);
        }
		//echo $this->db->last_query();die;
		return  $result;
	}
	
	public function get_user_data($user_id){
		$this->db->select('*');
		$this->db->from('users');
		$this->db->where(array('id' => $user_id));
		$query = $this->db->get();
		//echo $this->db->last_query();
		$resultset = $query->row_array();
		return $resultset;
	}
}
?>