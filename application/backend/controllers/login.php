<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('login_model');
	}
	
	/***********************************************Login function starts **************************************************************/
	public function index(){
		$data["master_title"]=$this->config->item('sitename')." | Login"; 
		$data['userdata']=$this->session->userdata('tempdata');
		$this->load->theme('login',$data); 	
	}
	//login function 
	public function check_login(){
		
		$arr["username"] = trim($this->input->post("username"));
		$arr["password"] = trim($this->input->post("password"));
		
		$data['userdata']=$this->session->set_userdata('tempdata',$arr);
		$result = $this->login_model->check_admin_login($arr);
		
		if($arr["username"]=='')
		{
			$err=1;	
			$this->session->set_flashdata("errormsg","Please enter user name");
		}
		else if($arr["password"]=='')
		{
			$err=1;	
			$this->session->set_flashdata("errormsg","Please enter password");
		}
		else if($this->common->validateHash($arr["password"],$result["password"]))
		{
			if(isset($result["username"]) && $result["username"] !="")
			{
				$err=0;
				$this->session->set_userdata("username",$result["username"]);
				$this->session->set_userdata("is_admin_logged_in",TRUE);
			}	
		}
		else{
				$err=1;	
				$this->session->set_flashdata("errormsg","Wrong user name or password");
		}
		if($err==1){redirect(base_url()."login");}
		else{redirect(base_url()."dashboard");}
	}
	//logout the user
	public function logout(){
		$this->session->sess_destroy();
		$this->session->set_flashdata("successmsg","Log out successfully");	
		redirect(base_url()."login");
	}
	/***********************************************Login function ends **************************************************************/
}