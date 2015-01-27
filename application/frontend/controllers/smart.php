
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class smart extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	public function index(){
		$this->home();
	}
	
	//for homepage
	public function home(){	
		$data["item"] = "Smart";
		$data["master_title"] = "Smart | ".$this->config->item('sitename');
		$data["master_body"] = "smart";
		$this->load->theme('home_layout',$data);
	}	
}
