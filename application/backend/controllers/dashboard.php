<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('login_model');
		$this->load->model('dashboard_model');
	}
	public function index(){
		$data["master_title"] = $this->config->item('sitename')." | Home";
		$data['sort'] = $this->input->post("sort"); //echo $data['sort']; die;
		$data["master_body"]="dashboard";  
		$this->load->theme('mainlayout',$data);
	}
}

