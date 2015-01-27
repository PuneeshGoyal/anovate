<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class content extends CI_Controller {
	public function __construct(){ 
		parent::__construct();
		$this->load->model('page_model');
	}
	/******************************************** Page functions starts  ************************************************/
	public function index(){
		$this->help();	
	}	
	public function help(){ 
		  $pagename=$this->uri->segment(2); 
			$data["do"]="edit";
			$data["page_name"]=$pagename;
			$data["resultset"]=$this->page_model->getPageData($pagename);
			$data["item"]="Help & Support";
			$data["master_title"]=$this->config->item('sitename')." | Help & Support";  
			$data["master_body"]="help";  
			$this->load->theme('mainlayout',$data);	
	}
	public function donations(){ 
		  $pagename=$this->uri->segment(2); 
			$data["do"]="edit";
			$data["page_name"]=$pagename;
			$data["resultset"]=$this->page_model->getPageData($pagename);
			$data["item"]="Donations";
			//print_r($data); die;
			$data["master_title"]= "Donations | ".$this->config->item('sitename');  
			$data["master_body"]="donations";  
			$this->load->theme('mainlayout',$data);	
	}
	public function resources(){ 
		  $pagename=$this->uri->segment(2); 
			$data["do"]="edit";
			$data["page_name"]=$pagename;
			$data["resultset"]=$this->page_model->getPageData($pagename);
			$data["item"]="Resources";
			//print_r($data); die;
			$data["master_title"]= "Resources | ".$this->config->item('sitename');  
			$data["master_body"]="resources";  
			$this->load->theme('mainlayout',$data);	
	}
	public function training(){ 
		  $pagename=$this->uri->segment(2); 
			$data["do"]="edit";
			$data["page_name"]=$pagename;
			$data["resultset"]=$this->page_model->getPageData($pagename);
			$data["item"]="Training";
			//print_r($data); die;
			$data["master_title"]= "Training | ".$this->config->item('sitename');  
			$data["master_body"]="training";  
			$this->load->theme('mainlayout',$data);	
	}
	public function after_slideshow(){ 
		  $pagename=$this->uri->segment(2); 
			$data["do"]="edit";
			$data["page_name"]=$pagename;
			$data["resultset"]=$this->page_model->getPageData($pagename);
			$data["item"]="After Slideshow Content";
			//print_r($data); die;
			$data["master_title"]= "After Slideshow Content | ".$this->config->item('sitename');  
			$data["master_body"]="after_slideshow";  
			$this->load->theme('mainlayout',$data);	
	}
	public function add_after_slideshow_to_database(){
		$arr["id"] = clean($this->input->post("id"));
		$arr["page_name"] = clean($this->input->post("page_name"));

		$arr["left_title"] = clean($this->input->post("left_title"));
		$arr["left_description"] = $this->input->post("left_description");
		//$arr["middle_title"] = clean($this->input->post("middle_title"));
		//$arr["middle_description"] = $this->input->post("middle_description");
		$arr["right_title"] = clean($this->input->post("right_title"));
		$arr["right_description"] = $this->input->post("right_description");
		//$arr["left_image"] = clean($this->input->post("left_image"));
		//$arr["middle_image"] = clean($this->input->post("middle_image"));
		$arr["image0"] = mysql_real_escape_string($this->input->post("image0"));
		//$arr["image1"] = mysql_real_escape_string($this->input->post("image1"));
		$arr["image2"] = mysql_real_escape_string($this->input->post("image2"));
		//print_r($_FILES["pics"]["name"]);
		$count = count($_FILES["pics"]["name"]); 
		for($i=0;$i<=$count-1;$i++){
			$j=1;
			if($_FILES['pics']['name'][$i] <> ''){
				$_FILES['userfile']['name'] = $_FILES['pics']['name'][$i];
				$_FILES['userfile']['type'] = $_FILES['pics']['type'][$i];
				$_FILES['userfile']['tmp_name'] = $_FILES['pics']['tmp_name'][$i];
				$_FILES['userfile']['error'] = $_FILES['pics']['error'][$i];
				$_FILES['userfile']['size'] = $_FILES['pics']['size'][$i];
				$arr["image".$i]=$i.$this->common->generate_transaction_number().".".$this->common->get_extension($_FILES['pics']['name'][$i]);
			
				$config['upload_path'] = '../slideshowimages/';
				$config['allowed_types'] = '*';
					$config['file_name']=$arr["image".$i];
				$this->upload->initialize($config);
			}else{
				$arr["image".$i]=$this->input->post("image".$i);
				//$arr["left_image"]=$this->input->post("image".$i);
			}
			if($this->page_model->updatehomepagedata($arr)){
				$err=0;
				if(!empty($_FILES["pics"]["name"])){
					if($this->upload->do_upload()) {
						$this->session->set_flashdata("successmsg","Content updated successfully");
					}else{
						//$this->session->set_flashdata("errormsg","There is some error uploading the files to server. Please contact server admin");	
					}
				}
				$this->session->set_flashdata("successmsg","Content updated successfully");

			}		
			else{
				$err=1;
			    $this->session->set_flashdata("errormsg","There is error updating content to database. Please contact database admin");	
			}		
			$j++;
		}
		redirect(base_url()."content/".$arr["page_name"]);		
	}
	
	public function contact(){ 
		  $pagename=$this->uri->segment(2); 
			$data["do"]="edit";
			$data["page_name"]=$pagename;
			$data["resultset"]=$this->page_model->getPageData($pagename);
			$data["item"]="Contact Us";
			//print_r($data); die;
			$data["master_title"]= "Contact Us | ".$this->config->item('sitename');  
			$data["master_body"]="contact";  
			$this->load->theme('mainlayout',$data);	
	}
	public function manual(){ 
		   $pagename=$this->uri->segment(2); 
			$data["do"]="edit";
			$data["page_name"]=$pagename;
			$data["resultset"]=$this->page_model->getPageData($pagename);
			$data["item"]="Help & Support";
			//print_r($data); die;
			$data["master_title"]=$this->config->item('sitename')." | Help & Support";  
			$data["master_body"]="manual";  
			$this->load->theme('mainlayout',$data);	
	}
	
	
	public function update_page_to_database(){ 
		$arr["id"]=$this->input->post("id");
		//$arr["page_title"]=$this->input->post("page_title");
		$arr["page_content"]= $this->input->post("page_content");
		$arr["page_name"]=$this->input->post("page_name");
		if($arr["page_content"] == '' || $arr["page_content"] == " "){
			$this->session->set_flashdata("errormsg","Please enter Page Content");
		}else{
			if($this->page_model->updatepagedata($arr)){
				$this->session->set_flashdata("successmsg","Content updated successfully");
			}	
			else{
				$this->session->set_flashdata("errormsg","There is error updating content to database. Please contact database admin");	
			}
		}
		redirect(base_url()."content/".$arr["page_name"]);
	}
	
	
	public function update_contact_information(){
		$arr["id"]=$this->input->post("id");
		$arr["page_name"]=$this->input->post("page_name");
		$arr["contact_number"]=clean($this->input->post("contact_number"));
		$arr["contact_email"]=clean($this->input->post("contact_email"));
		$arr["page_content"]=$this->input->post("page_content");
		$arr["summary"]=$this->input->post("summary");	
		if($this->validations->validate_contact_information($arr)){
			if($this->page_model->update_contact_information_db($arr)){
				$this->session->set_flashdata("successmsg","Contact Information updated successffuly");
				$err=0;
			}
			else{
				$err=1;	
			}
		}
		else{
			$err=1;	
		}
		redirect(base_url()."content/contact");	
	}
	public function get_image_Extension($imagename){
		$imagename=explode(".",$imagename);
		return $imagename[1];
	}
	public function upload_images(){
		$config['upload_path'] = '../ckeditorimages/';
		$config['allowed_types'] = '*';
		$config['file_name']=$_FILES['upload']['name'];
		$this->upload->initialize($config);
		$validimages=array("jpg","gif","png","jpeg","bmp");
		if(in_array($this->get_image_Extension($_FILES['upload']['name']),$validimages)){
			if($this->upload->do_upload('upload')){
				$arr=$this->upload->data();
				$url = $this->config->item("ckeditorimages").$arr['file_name'];
			}
			else{
				$message = "Error moving uploaded file. Check the script is granted Read/Write/Modify permissions.";	
			}
		}
		else{
			$message = "Only images file with ".implode(",",$validimages)." extensions are allowed";	
		}

		 $funcNum = $_GET['CKEditorFuncNum'] ;
		 echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";

	}

/*************************************** Page functions starts  ************************************************/
}

?>