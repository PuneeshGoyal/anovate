<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class setting extends CI_Controller {
	public function __construct(){
		parent::__construct();
	//	$this->load->model('event_model');
		$this->load->helper('url');
		$this->load->helper('cookie');
		$this->load->model('login_model');
	}
	public function index(){
		$this->lock_screen();	
	}		
	
	
	public function lock_screen(){
		
		$pagename = "lock_screen";
		$data["item"]="Lock Screen";
		$data["master_title"]="Lock Screen | ". $this->config->item('sitename'); 
	   
		delete_cookie('loged_user'); 
		
				$cookie = array(
					'name'   => 'loged_user',
					'value'  => $this->session->userdata['username'].'|::|'.$this->session->userdata['type'],
					'expire' => '31536000' // 1 year
				);
			
		$this->input->set_cookie($cookie);
		$this->load->theme('lock_screen_theme',$data);
	}
	public function login(){
		$info= explode('|::|',$_COOKIE['loged_user']);
		$arr["username"] = $info[0];
		$arr["password"] = clean(trim($this->input->post("password"))); 
		if($info[0]=='admin')
		{
		  $arr["user_type"] = 1;
		}
		else
		{
			$arr["user_type"] = 0;
		}
		
	if($arr["username"]!= "" && $arr["password"]!="" && $arr["password"]!=" "){
		if($arr["user_type"] == "1"){
		 $result = $this->login_model->check_admin_login($arr);
		 if($this->common->validateHash($arr["password"],$result["password"])){
			 
			if($result["username"] != ""){
			    unset($arr["password"]);
				$err=0;
				$this->session->set_userdata("username",$result["username"]);
				$this->session->set_userdata("type",'admin');
				$this->session->set_userdata("id",$result["id"]);
				redirect(base_url()."dashboard");
			}
		}
		else{
				unset($arr["password"]);
				$err=1;	
				$this->session->set_flashdata("errormsg","Wrong user name and password");
				redirect(base_url()."setting/lock_screen"); 
		}
	   }
	   else{
		 $result = $this->login_model->check_sub_admin_login($arr);
		 if($this->common->validateHash($arr["password"],$result["password"])){
			unset($arr["password"]);
			if($result["username"] != ""){
				$err=0;
				$this->session->set_userdata("username",$result["username"]);
				$this->session->set_userdata("type",'subadmin');
				$this->session->set_userdata("id",$result["id"]);
				redirect(base_url()."dashboard"); 
			}
	   }
	   else{
				unset($arr["password"]);
				$err=1;	
				$this->session->set_flashdata("errormsg","Wrong user name and password");
				redirect(base_url()."setting/lock_screen");
		}
	   }
	 }
	 else{
		redirect(base_url()."setting/lock_screen"); 
	  }
   }
}
	
?>