<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//$this->load->model('email_model');
		$this->load->model("page_model");
	}
	public function _remap()
	{
		$pagedata = $this->uri->segment(2);
		
		if($pagedata == 'about_us'){
			$this->about_us($pagedata);
		}
		else if($pagedata == 'how'){
			$this->how($pagedata);
		}
		else if($pagedata == 'terms'){
			$this->terms($pagedata);
		}
		else if($pagedata == 'privacy_policy'){
			$this->privacy_policy($pagedata);
		}
		
		else 
		{
			if($pagedata != "add_contact_to_admin")
			{
				$this->contact_us();	
			}
			else
			{
				$this->add_contact_to_admin();	
			}
		}
	}
	
	//for terms and conditions
	public function how($pagedata){
		$data['item'] = 'How it works';
		$data['active'] = $pagedata;
		$data['how'] = $this->page_model->getPageData($pagedata);
		$data['master_title'] = 'How it works';
		$data['master_body'] = 'how';
		$this->load->theme("home_layout",$data);	
	}
	public function about_us($pagedata)
	{
		$data['item'] = 'About Us';	
		$data['active'] = $pagedata;
		$data['about_us'] = $this->page_model->getPageData($pagedata);
		$data['master_title'] =$this->config->item('sitename').'| About Us';
		$data['master_body'] = 'about_us';
		$this->load->theme("home_layout",$data);	
	}
	public function terms($pagedata)
	{
		$data['item'] = 'Terms';	
		$data['active'] = $pagedata;
		$data['terms'] = $this->page_model->getPageData($pagedata);
		$data['master_title'] =$this->config->item('sitename').'| Terms';
		$data['master_body'] = 'terms';
		$this->load->theme("home_layout",$data);	
	}
	//for  privacy_policy
	public function privacy_policy($pagedata){
		$data['item'] = 'Privacy Policy';
		$data['active'] = $pagedata;
		//$data['content'] = $this->page_model->getPageData($pagedata);
		$data['master_title'] = $this->config->item('sitename').' | Privacy Policy';
		$data['master_body'] = 'privacy_policy';
		$this->load->theme("home_layout",$data);	
	}
	public function contact_us()
	{
		$data['item'] = 'Contact Us';	
		$pagedata='contact_us';
		$data["contactdata"]=$this->session->flashdata("tempdata");
		//$data['about_us'] = $this->page_model->getPageData($pagedata);
		$data['master_title'] = $this->config->item('sitename').' | Contact Us';
		$data['master_body'] = 'contact_us';
		$this->load->theme("home_layout",$data);	
	}
	
	
	
	/*public function help()
	{
		$data['item'] = 'Help';	
		$pagedata='help';
		$data['help'] = $this->page_model->getPageData($pagedata);
		$data['master_title'] = 'Motorush | Help';
		$data['master_body'] = 'help';
		$this->load->theme("home_layout",$data);	
	}*/
	/*public function fees_commissions()
	{
		$data['item'] = 'Fees and Commissions';	
		$pagedata='fees_commissions';
		$data['fees_commissions'] = $this->page_model->getPageData($pagedata);
		
		$data['master_title'] = 'Motorush | Fees and Commissions';
		$data['master_body'] = 'fees_commissions';
		$this->load->theme("home_layout",$data);	
	}*/
	/*public function testimonials()
	{
		$testimonialsid=$this->uri->segment(3);
		$data['item'] = 'Testimonials';	
		$data['testimonials'] = $this->testimonial_model->getIndividualTestimonial($testimonialsid);
		$data['master_title'] = 'Motorush | Testimonials';
		$data['master_body'] = 'testimonials';
		$this->load->theme("home_layout",$data);	
	}*/
	/*public function add_contact_to_admin()
	{
		$arr["name"]=$this->input->post("name");
		$arr["email"]=$this->input->post("email");
		$arr["subject"]=$this->input->post("subject");
		$arr["phone_no"]=$this->input->post("phone_no");
		$arr["message"]=$this->input->post("message");
		$this->session->set_flashdata("tempdata",$arr);
		if($this->validations->validate_contact_details($arr))
		{
			$arr["to"]='info@motorush.com';  
			if($this->email_model->send_contact_email($arr))
			{
				$err=0;
				$this->session->set_flashdata("successmsg","We have received your message, and will get back to you as soon as possible.");	
			}	
			else
			{
				$err=1;
				$this->session->set_flashdata("errormsg","There was an error in sending this message. Please try again soon.");
			}
		}	
		
		redirect(base_url()."pages/contact_us");
	}*/
	
}
