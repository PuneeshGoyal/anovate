<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ajax_front extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}
	public function username_availability($arr=array()){
		$this->db->select("username");
		$this->db->from("users");	
		
		if($arr["id"] == ""){
			$this->db->where(array("username"=>$arr["username"],"status <>" => "4"));
		}
		else{
			$this->db->where(array("username"=>$arr["username"],"status <>" => "4","id <>" => $arr["id"]));
		}
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		$result = $query->row_array();
		//echo count($result);die;
		if($result)
		{
			return false;	
		}
		else
		{
			return true;	
		}
	}
	public function check_username(){
		//to check whether valid ajax request or not 
		
		if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		
		$arr["username"] = clean($this->input->post("username"));
		if($arr["username"]==""){
			$data["response"]="error";
			$data["message"]="Please enter username";
		}
		else if(!$this->username_availability($arr)){
			$data["response"]="error";
			$data["message"]="This username already exists in our database ";
		}
		else{
			$data["response"]="success";
			$data["message"]="This username is available";
		}
		echo json_encode($data);die;
	}
	
	public function email_availability($arr=array()){
		$this->db->select("email");
		$this->db->from("users");	
		
		if($arr["id"] == ""){
			$this->db->where(array("email" => $arr["email"],"status <>" => "4"));
		}
		else{
			$this->db->where(array("email" => $arr["email"],"status <>" => "4","id <>" => $arr["id"]));
		}
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		$result = $query->row_array();
		//echo count($result);die;
		if($result)
		{
			return false;	
		}
		else
		{
			return true;	
		}
	}
	public function check_email(){
		//to check whether valid ajax request or not 
		if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		
		$arr["email"] = clean($this->input->post("email"));
		if($arr["email"] == ""){
			$data["response"]="error";
			$data["message"]="Please enter email";
		}
		else if(!$this->email_availability($arr)){
			$data["response"]="error";
			$data["message"]="This email already exists in our database ";
		}
		else{
			$data["response"]="success";
			$data["message"]="This email is available";
		}
		echo json_encode($data);die;
	}
	/*public function check_password(){
		//to check whether valid ajax request or not 
		if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		
		$arr["password"] = clean($this->input->post("password"));
		if($arr["password"]==""){
			$data["response"]="error";
			$data["message"]="Please enter password";
		}
		else if(!$this->password_availability($arr)){
			$data["response"]="error";
			$data["message"]="Wrong password";
		}
		else{
			$data["response"]="success";
			$data["message"]="Correct password";
		}
		echo json_encode($data);die;
	}
	
	public function password_availability($arr){
		$this->db->select("password");
		$this->db->from("users");	
		
		if($arr["id"] == ""){
			$this->db->where(array("password" => $arr["password"],"status <>" => "4"));
		}
		else{
			$this->db->where(array("password" => $arr["password"],"status <>" => "4"));
		}
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		$result = $query->row_array();
		//echo count($result);die;
		if($result)
		{
			return false;	
		}
		else
		{
			return true;	
		}
	}*/
}
?>