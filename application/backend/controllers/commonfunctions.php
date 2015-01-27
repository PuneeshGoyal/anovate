<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class commonfunctions extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
	}

/***********************************************User function starts **************************************************************/
	public function updateprofile()
	{
		$data["userdata"] = $this->session->flashdata("tempdata");
		$data["master_title"] = "Update profile";  
		$data["master_body"] = "update_profile";  
		//debug($data);die;
		$this->load->theme('mainlayout',$data); 
		
		//echo debug($data);die;
		if($this->uri->segment(3)!=''&& $this->uri->segment(3)=='0')
		{
			header("Refresh:3;url=".base_url()."dashboard");
		} 
	}
	
	public function update_admin_profile()
	{		
		$arr["username"] = $this->input->post("username");
		$arr["oldpassword"] = $this->input->post("oldpassword");	
		$arr["newpassword"] = $this->input->post("newpassword");
		$this->session->set_flashdata("tempdata",$arr);
		$arr["confirmnewpassword"] = $this->input->post("confirmnewpassword");
		
		//debug($arr);die;
		if($this->validations->validatepasswords($arr))
		{
			if($this->common->update_profile($arr))
			{
				$this->db->select("username");
				$this->db->from("admin");
				$query=$this->db->get();
				$resultset=$query->row_array();
				
				/*if($resultset['username'] != $this->session->userdata('username'))
				{
					$this->session->set_userdata('username',$resultset['username']);
					$err=0;*/
					$this->session->set_flashdata("successmsg","Profile updated successfully");	
					redirect(base_url()."commonfunctions/updateprofile/0");
				//}
			}	
			else
			{
				$err=1;
				$this->session->set_flashdata("errormsg","There is error updating profile of admin. Please contact database admin");
			}
		}
		redirect(base_url()."commonfunctions/updateprofile");
	}
	
/***********************************************User function ends **************************************************************/	
}