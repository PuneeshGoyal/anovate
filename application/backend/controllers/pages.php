<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('email_model');
		$this->load->model('page_model');
	}
	/**********************************************************Page functions starts ************************************************/
	public function index()
	{
		$this->manage_page();	
	}
	public function manage_page()
	{
		$pagename=$this->uri->segment(3);
		
		if($pagename == 'contact')
		{
			$data["do"]="edit";
			$data["resultset"]=$this->page_model->get_contact_data($pagename);
			$data["update_contact_to_database"]='update_contact_to_database';//function to be called on save
			$data["item"]="Contact us";
			$data["master_title"]="Contact us";   
			$data["master_body"]="manage_contact";  
			$this->load->theme('mainlayout',$data);	 
		}
		else if($pagename == 'about_us')
		{
			$data["do"]="edit";
			$data["resultset"]=$this->page_model->get_contact_data($pagename);
			$data["update_aboutus_to_database"] = 'update_aboutus_to_database';//function to be called on save
			$data["item"]="About us";
			$data["master_title"]="About us";   
			$data["master_body"]="manage_about";  
			$this->load->theme('mainlayout',$data);	 
		}
		else if($pagename == 'how')
		{
			$data["do"]="edit";
			$data["resultset"]=$this->page_model->get_contact_data($pagename);
			$data["update_aboutus_to_database"] = 'update_aboutus_to_database';//function to be called on save
			$data["item"] = "How it works";
			$data["master_title"] = "How it works";   
			$data["master_body"] = "manage_how";  
			$this->load->theme('mainlayout',$data);	 
		}
		else if($pagename == 'terms')
		{
			$data["do"]="edit";
			$data["resultset"]=$this->page_model->get_contact_data($pagename);
			$data["update_aboutus_to_database"] = 'update_aboutus_to_database';//function to be called on save
			$data["item"] = "Terms";
			$data["master_title"] = "Terms";   
			$data["master_body"] = "manage_terms";  
			$this->load->theme('mainlayout',$data);	 
		}
		else if($pagename =="newsletters")
		{
			$data['item'] = 'Manage newsletters';	
			$data["newslettersdata"]=$this->session->flashdata("tempdata");
			$data['master_title'] = $this->config->item('sitename').' | Manage newsletters';
			$data['master_body'] = 'manage_newsletters';
			$this->load->theme('mainlayout',$data);	
			
			if($this->uri->segment(4)!=''&& $this->uri->segment(4)=='0')
			{
				header("Refresh:3;url=".base_url().$this->router->class."/manage_page/newsletters");
			} 
		}
	
	
		else
		{
			/*$data["do"]="edit";
			$data["resultset"]=$this->page_model->getPageData($pagename);
			$data["item"]="Blogs";
			$data["master_title"]="Manage pages";   // Please enter the title of page......
			$data["master_body"]="manage_page";  //  Please use view name in this field please do not include '.php' for including view name
			$this->load->theme('mainlayout',$data);	  // Loading theme for admin panel*/
		}
	}
	 public function send_newsletters(){
		 
		$arr["email"] = $_REQUEST["email"];
		$arr["content"] = clean($this->input->post("content"));
		$arr["type"] = $this->input->post("type");
		
		
		//debug($ids);die;
		$this->session->set_flashdata("tempdata", strip_slashes($arr));	
		//debug($arr);die;
		if($this->validations->validate_sendnewsletter($arr))
		{
			$message = '<table width="100%" border="0" bgcolor="#E0E0E0" cellspacing="1" cellpadding="6" style="border:solid 4px #0076BE;">';
 			$message .= '<tr><td colspan="2" style="font-size:24px; font-weight:bold; color:#002a76;">You have received a new newsletter from '.$this->config->item("sitename").'</td></tr>';
			//$message .= '<tr><td bgcolor="#fbf9f9" width="100"><strong>Email Id</strong></td><td width="150" bgcolor="#fbf9f9">'.$arr['email'].'</td></tr>';
			//<td bgcolor="#fbf9f9" width="100"><strong>Message</strong></td>
			$message .= '<tr><td colspan="2" width="150" bgcolor="#fbf9f9">'.nl2br(stripcslashes($arr['content'])).'</td></tr></table>';
			
			$arr["subject"] = "You have received a new newsletter from ".$this->config->item("sitename");
			$arr["message"] = $message;
			//sent newsletters to all users
			//$SEND_TYPE = $arr["email"][0];
			if($arr["type"] == "all"){
				$arr["type"] = "all";
				unset($arr["email"]);
				
				if($this->email_model->send_newsletter($arr) == 1)
				{ 
					$err=1;
					$this->session->set_flashdata("errormsg","There was error in sending newsletters.");
				}
				else{
					$err=0;
					$this->session->set_flashdata("successmsg","Newsletters has been sent successfully");
					redirect(base_url()."pages/manage_page/newsletters/0");
				}
			}
			//sent newsletters to selected persons
			else{
				$arr["type"] = "user";
				//debug($arr);die;
				if($this->email_model->send_newsletter($arr) == 1)
				{ 
					$err=1;
					$this->session->set_flashdata("errormsg","There was error in sending newsletters.");
				}
				else{
					$err=0;
					$this->session->set_flashdata("successmsg","Newsletters has been sent successfully");
					redirect(base_url()."pages/manage_page/newsletters/0");
				}
			}
		}
		else
		{
			$err=1;	
		}
		redirect(base_url()."pages/manage_page/newsletters/");	
	}
	public function update_page_to_database(){ 
		$arr["id"] = $this->input->post("id");
		//$arr["page_title"]=$this->input->post("page_title");
		$arr["page_content"]= $this->input->post("page_content");
		$arr["page_name"]=$this->input->post("page_name");
		
		if($arr["page_content"] == '' || $arr["page_content"] == " "){
			$this->session->set_flashdata("errormsg","Please enter Page Content");
		}
		else{
			if($this->page_model->updatepagedata($arr)){
				$this->session->set_flashdata("successmsg","Content updated successfully");
			}	
			else{
				$this->session->set_flashdata("errormsg","There is error updating content to database. Please contact database admin");	
			}
		}
		redirect(base_url()."content/".$arr["page_name"]);
	}
	//update contact us page to admin
	public function update_contact_to_database()
	{
		$arr["id"]=$this->input->post("id");
		$arr["page_name"] = trim($this->input->post("page_name"));
		$arr["page_title"] = trim($this->input->post("page_title"));
		$arr["page_content"] = trim($this->input->post("page_content"));
		$arr["page_content1"] = trim($this->input->post("page_content1"));
		$arr["image"] = $_FILES["userfile"]["name"];
		$arr["page_status"] = 1;
		
		if($arr["image"] != "")
		{
			$arr["image"] = time().".".$this->common->get_extension($_FILES["userfile"]["name"]);
		}
		else
		{
			$arr["image"] = $this->input->post("image");	
		}
		//echo "<pre>"; 
		//print_r($arr);die;
		if($this->validations->validate_contact_us($arr))
		{
			if($this->page_model->update_contact_data($arr))
			{
				if($arr["image"] != $this->input->post("image"))
				{
					$config['upload_path'] = '../uploads/';
					$config['allowed_types'] = '*';
					$config['file_name'] = $arr["image"];
					$this->upload->initialize($config);
					if($this->upload->do_upload()){
						$err=0;
					}		
					else {
						//echo $this->upload->display_errors();die;
						$this->session->set_flashdata("successmsg","There is some error uploading the files to server. Please contact server admin");		
					}		
				}
				$this->session->set_flashdata("successmsg","Contact us updated successffuly");
				$err=0;
			}
			else
			{
				$this->session->set_flashdata("errormsg","There is error editing contact us page . Please contact database admin");
				$err=1;
			}
		}
		else
		{
			redirect(base_url()."pages/manage_page/contact/edit");
			$err=1;	
		}
		redirect(base_url()."pages/manage_page/contact/edit");
	}
//update about us data
	public function update_aboutus_to_database()
	{
		$arr["page_content"] = trim($this->input->post("page_content"));
		$arr["page_name"] = trim($this->input->post("page_name"));
		//print_r($arr);die;
		if($this->validations->validate_aboutus($arr))
		{
			
			if($this->page_model->update_aboutus_to_database($arr))
			{
				$this->session->set_flashdata("successmsg","Content updated successffuly");
				$err=0;
			}
			else
			{
				$this->session->set_flashdata("errormsg","there was a problem updating Content ");
				$err=1;	
			}
		}
		else
		{
			
			$err=1;	
		}
		redirect(base_url()."pages/manage_page/".$arr["page_name"]."/edit");	
	}
	
	
	public function get_image_Extension($imagename)
	{
		$imagename=explode(".",$imagename);
		return $imagename[1];
	}
	
	public function upload_images()
	{
		$config['upload_path'] = '../ckeditorimages/';
		$config['allowed_types'] = '*';
		$config['file_name']=$_FILES['upload']['name'];
		$this->upload->initialize($config);
		$validimages=array("jpg","gif","png","jpeg","bmp");
		if(in_array($this->get_image_Extension($_FILES['upload']['name']),$validimages))
		{
			if($this->upload->do_upload('upload'))
			{
				$arr=$this->upload->data();
				$url = $this->config->item("ckeditorimages").$arr['file_name'];
			}
			else
			{
				$message = "Error moving uploaded file. Check the script is granted Read/Write/Modify permissions.";	
			}
		}
		else
		{
			$message = "Only images file with ".implode(",",$validimages)." extensions are allowed";	
		}
		 $funcNum = $_GET['CKEditorFuncNum'] ;
		echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
	}
	/**********************************************************Page functions starts*/
	
	
	//////////////////////////////////////////////////////////////////////////////
}

?>