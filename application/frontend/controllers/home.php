<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class home extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("start_cause_model");
    }

    public function index() {
        $this->home();
    }
	
    //for homepage
    public function home() {
        $data['causedata'] = $this->start_cause_model->getfrontpagecause();
        $data["item"] = "Home";
        $data["master_title"] = "Home | " . $this->config->item('sitename');
        $data["master_body"] = "home";
        $this->load->theme('home_layout', $data);
    }

//for logout 
    public function logout() {
        $this->session->sess_destroy();
        delete_cookie("login");
        redirect(base_url());
    }
	public function newsletters(){
		
		$data = array();
		$arr = array();
		$result = '';
		
		$arr["email"] = clean($this->input->post("email"));
		$arr["created_on"] = time();
		$arr["status"] = 1;
		
		//$data["newsletter"] = $this->session->set_userdata("tempdata", strip_slashes($arr));
		$result = $this->start_cause_model->newsletter($arr);
		
		if($arr["email"]==""){
			$data["response"] = "error";
			$data["message"] = "Please enter email address";
		}
		else if(!filter_var($arr["email"], FILTER_VALIDATE_EMAIL)) {
			$data["response"] = "error";
			$data["message"] = "Please enter valid email";
        }
		else if($result == 0){
			$data["response"] = "success";
			$data["message"] = "You have successfully subscribed for newsletters";
		}
		else if($result == 1){
			$data["response"] = "error";
			$data["message"] = "You have already subscribed for newsletters";
		}
		else if($result == 2){
			$data["response"] = "error";
			$data["message"] = "There was an error while subscribing newsletters please contact admin";
		}
		echo json_encode($data);die;
	}
}
