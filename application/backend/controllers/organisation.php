<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class organisation extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("user_model");
		$this->load->model("account_model");
	}
	
	public function index(){
		$this->manage_organisation();
	}
	
	public function manage_organisation(){
		$data["filter"] = $this->input->get("filter");
		$page = isset($_GET["per_page"])?$_GET["per_page"]:""; 
		if($page == ''){$page = '0';}
		else{
            if(!is_numeric($page))
			{
            	redirect(BASEURL.'404');
            }
			else
			{
    	        $page = $page;
            }
        }
		
		$config["per_page"] = $this->config->item("perpageitem"); 
		$config['base_url'] = base_url().$this->router->class."/manage_organisation/?".$this->common->removeUrl("per_page",$_SERVER["QUERY_STRING"]);
		$countdata = array();
		$countdata = $_GET;
		$countdata["countdata"] = "yes";
		$countdata["filter"] = $data["filter"];
		$config['total_rows'] = count($this->user_model->getorganisationData($countdata));   
		$config["uri_segment"] = (isset($_GET["per_page"]) && $_GET["per_page"]!="")?$_GET["per_page"]:"0";
		$this->pagination->initialize($config);
		/*--------------------------Paging code ends---------------------------------------------------*/

		$searcharray=array();
		$searcharray=$_GET;
		$searcharray["per_page"]=$config["per_page"];
		$searcharray["page"]=$config["uri_segment"];
		$searcharray["filter"] = $data["filter"];
			
		$data['resultset'] = $this->user_model->getorganisationData($searcharray);
		$data["item"]="organisation";
		//debug($data['resultset']);die;
		$data["master_title"]="Manage organisation";
		$data["master_body"]="manage_organisation";
		$this->load->theme('mainlayout',$data);
	}
	
	public function enable_disable_organisation()
	{
		$id = $this->uri->segment(3);
		$status = $this->uri->segment(4);
		
	/*	echo $tagid;
		echo $status;
		die;*/
		if($status == 1)
		{
			$show_status = "activated";	
		}	
		else
		{
			$show_status = "deactivated";	
		}
		$this->user_model->enable_disable_organisation($id,$status);
		$this->session->set_flashdata("successmsg","organisation ".$show_status." successfully");	
		redirect(base_url().$this->router->class."/manage_organisation");
	}
	
	public function view_organisation()
	{
		$id = $this->uri->segment(3);
		if($id == "")
		{
			redirect(base_url()."invalidpage");				
		}
		else
		{
			$data["resultset"] = $this->user_model->view_organisation($id);	
		}
		
		//debug($data["resultset"]);die;
		$data["master_title"] = "View organisation";  
		$data["master_body"] = "view_organisation";  
		$this->load->theme('mainlayout',$data);  
	}
	
	public function edit_organisation(){	
	
		$slug = $this->uri->segment(3);
		$data['country'] = $this->account_model->get_countries();
		$data["userinfo"] = $this->user_model->view_organisation($slug);
		$data["do"]="edit";
		$data["item"] = "Edit organisation";
		$data["master_title"] = "Edit organisation | ".$this->config->item('sitename');
		$data["master_body"] = "add_organisation";
		$this->load->theme('mainlayout',$data);
	}
	
	public function edit_organisation_to_database(){	
		$user_id = $this->input->post('user_id');
		$arr['name'] = $this->input->post('organisation_full_name');
		$arr['location'] = $this->input->post('organisation_location');
		$arr['registration_number'] = $this->input->post('registration_number');
		$arr['person_in_charge'] = $this->input->post('person_in_charge');
		$arr['contact_office'] = $this->input->post('organisation_contact_office');
		$arr['postal_code'] = $this->input->post('organisation_postal_code');
		$arr['address'] = $this->input->post('organisation_address');
		$arr['unit_f'] = $this->input->post('organisation_unit_f');
		$arr['unit_l'] = $this->input->post('organisation_unit_l');
		
		if($this->user_model->edit_organisation($arr, $user_id))
		{
		   $this->session->set_flashdata('successmsg', 'Your account has been successfully edited');
		   redirect(base_url().$this->router->class.'/manage_organisation');
		} 
		else 
		{
			$this->session->set_flashdata('errormsg', 'Your changes are not updated technical error contact administrator');
			redirect(base_url().$this->router->class.'/manage_organisation');
		}
	}
	
	public function test(){	
		$data["item"]="Start organisation";
		$data["master_title"]="Start organisation | ".$this->config->item('sitename');
		$data["master_body"]="test";
		$this->load->view("start_organisation/test");
	//	$this->load->theme('home_layout',$data);
	}
	
	
	
	public function delete_organisation(){	
	    //$this->common->is_logged_in();
		$id=$this->uri->segment(3);
		if($this->user_model->delete_organisation($id))
		{
		   $this->session->set_flashdata("successmsg","organisation deleted Successfully.");
		}
		else
		{
		  $this->session->set_flashdata("errormsg","There is some technical problem to delete this organisation.");
		}
		redirect(base_url().$this->router->class."/manage_organisation");
	 }
	 
	
}
?>