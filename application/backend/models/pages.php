<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('email_model');
		$this->load->model("page_model");
		
		//$this->load->model("testimonial_model");
		
	}
	
	public function _remap()
	{
		
		 $pagedata=$this->uri->segment(2);
		
		if($pagedata == 'about'){
			$this->about_us($pagedata);	
		}
		else if($pagedata == 'sell'){
			$this->sell($pagedata);	
		}
		else if($pagedata == 'faq'){
			$this->faq($pagedata);	
		}
		else if($pagedata == 'contact'){
			
			$this->contact($pagedata);	
		}
		else if($pagedata == 'careers'){
			$this->careers($pagedata);	
		}
		else if($pagedata == 'share'){
			$this->share($pagedata);	
		}
		else if($pagedata == 'returns'){
			$this->returns($pagedata);	
		}
			else if($pagedata == 'press'){
			$this->press($pagedata);	
		}
			else if($pagedata == 'support'){
			$this->support($pagedata);	
		}
			else if($pagedata == 'terms'){
			$this->terms($pagedata);
				
		}
		else if($pagedata == 'contact_to_admin'){
			$this->contact_to_admin($pagedata);
				
		}
		else if($pagedata == 'submit_application'){
			$this->submit_application($pagedata);
				
		}
		else if($pagedata == 'upload_attchement'){
			$this->upload_attchement($pagedata);
				
		}
		else if($pagedata == 'unlink_attachment'){
			$this->unlink_attachment($pagedata);
				
		}
		
	}
	

	
	public function about_us($pagedata){
		$data['item'] ='About Us';
		$data['active'] = $pagedata;
		$data['content'] = $this->page_model->getPageData($pagedata);
		$data['master_title'] = "About Us";
		$data['master_body'] = 'about_us';
		$this->load->theme('mainlayout_contant',$data);
	}
	
	public function sell($pagedata){
		$data['item'] = 'Sell';
		$data['active'] = $pagedata;
		$data['content'] = $this->page_model->getPageData($pagedata);
		$data['master_title'] = 'Sell';
		$data['master_body'] = 'sell';
		$this->load->theme("mainlayout_contant",$data);	
	}
	public function faq($pagedata){
		$data['item'] = 'FAQ';
		$data['active'] = $pagedata;
		$data['content'] = $this->page_model->getFaqData($pagedata);
		$data['master_title'] = 'FAQ';
		$data['master_body'] = 'faq';
		$this->load->theme("mainlayout_contant",$data);	
	}
	public function contact($pagedata){
	  
		$data['item'] = 'Contact';
		$data['active'] = $pagedata;
		$data['master_title'] = 'Contact Us';
		$data['master_body'] = 'contact_us';
		$this->load->theme("mainlayout_contant",$data);	
	}
	
	public function careers($pagedata){
		$data['item'] = 'Career';
		$data['active'] = $pagedata;
		$data['content'] = $this->page_model->getPageData($pagedata);
		$data['master_title'] = 'Career';
		$data['master_body'] = 'careers';
		$this->load->theme("mainlayout_contant",$data);	
	}
	public function share($pagedata){
		$data['item'] = 'Share';
		$data['active'] = $pagedata;
		$data['content'] = $this->page_model->getPageData($pagedata);
		$data['master_title'] = 'Share';
		$data['master_body'] = 'share';
		$this->load->theme("mainlayout_contant",$data);	
	}
	public function returns($pagedata){
		$data['item'] = 'Returns';
		$data['active'] = $pagedata;
		$data['content'] = $this->page_model->getPageData($pagedata);
		$data['master_title'] = 'Returns';
		$data['master_body'] = 'Returns';
		$this->load->theme("mainlayout_contant",$data);	
	}
	public function press($pagedata){
		$data['item'] = 'Press';
		$data['active'] = $pagedata;
		$data['content'] = $this->page_model->getPageData($pagedata);
		$data['master_title'] = 'Press';
		$data['master_body'] = 'press';
		$this->load->theme("mainlayout_contant",$data);	
	}
public function support($pagedata){
		$data['item'] = 'Support';
		$data['active'] = $pagedata;
		$data['content'] = $this->page_model->getPageData($pagedata);
		$data['master_title'] = 'Support';
		$data['master_body'] = 'Support';
		$this->load->theme("mainlayout_contant",$data);	
	}
public function terms($pagedata){
		$data['item'] = 'Terms And Conditions';
		$data['active'] = $pagedata;
		$data['content'] = $this->page_model->getPageData($pagedata);
		$data['master_title'] = 'Terms and conditions';
		$data['master_body'] = 'terms';
		$this->load->theme("mainlayout_contant",$data);	
	}

	public function contact_to_admin()
	{
		$arr["email"]=$this->input->post("email");
		$arr["subject"]=$this->input->post("subject");
		$arr["message"]=$this->input->post("message");
		if($this->input->post("order_no")!=""){
		$arr["order_no"]==	$this->input->post("order_no");
		}
		$this->session->set_flashdata("tempdata",$arr);
		if($this->validations->validate_contact_details($arr))
		{
			$arr["to"]='info@socialtyer.com';  ////info@socialtyer.com
			if($this->email_model->send_contact_email($arr))
			{
				$err=0;
				$this->session->set_flashdata("successmsg","Message sent to admin succesffully. You will be notified soon");	
			}	
			else
			{
				$err=1;
				$this->session->set_flashdata("errormsg","There is some error sending email to admin. Pease try again");
			}
		}	
		
		redirect(base_url()."pages/contact");
	}
	
	 public function unlink_attachment()
	 {
		  $image_name=$this->uri->segment(3); 
		  $path = "productimages/".$image_name;
		  
		  chmod("$path",0777);  // set permission to the file.
		  unlink('attachments/'.$image_name);
		  return "success"; die;
     }
	
	public function upload_attchement()
	{
	   //  debug($_FILES['uploadfile']['name']);die;
	     $size = $_FILES['uploadfile']['size'];
		
	     if($size < (1024*1024*5))
		 {
			
		 $type=explode('/',$_FILES['uploadfile']['type']);
		 $ext=$type['1'];
		 $image_name= "st_".time().".".$ext; 
         $path = "attachments/".$image_name;
		 chmod("$path",0777);  // set permission to the file.
		 if(copy($_FILES['uploadfile']['tmp_name'], $path))//  upload the file to the server
		 {
			 echo "success|::|".$image_name;	
		 }
		 else
		 {
			echo "error"; die;
		 }
		 }
		  else
		 {
		    echo "error"; die;
		 }	 
		
	}
	
}
