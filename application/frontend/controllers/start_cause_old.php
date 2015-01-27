<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class start_cause extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("start_cause_model");
		$this->load->model("account_model");
		$this->load->model('email_model');
	}
	public function index(){
		$this->home();
	}
	
	//for homepage
	public function home(){	
	
	    $this->common->is_logged_in();
		$data["item"]="Start cause";
		$data["master_title"]="Start cause | ".$this->config->item('sitename');
		$data["master_body"]="start_cause";
		$this->load->theme('home_layout',$data);
		
		if($this->uri->segment(2)!='' && $this->uri->segment(2) == '1')
		{
			header("Refresh:1;url=".base_url()."accounts/manage_causes");
		}
	}
	public function terms(){	
	    
		$data["item"]="Terms and Condition";
		$data["master_title"]="Terms and Condition | ".$this->config->item('sitename');
		$data["master_body"]="terms";
		$this->load->theme('home_layout',$data);
	}
	public function edit_cause(){	
	
	    $this->common->is_logged_in();
		$slug=$this->uri->segment(3);
		$data["dataset"]=$this->start_cause_model->getcausedatabyslug($slug);
	
		$data["item"]="Edit cause";
		$data["master_title"]="Edit cause | ".$this->config->item('sitename');
		$data["master_body"]="edit_cause";
		$this->load->theme('home_layout',$data);
		
		
		if($this->uri->segment(4)!=''&& $this->uri->segment(4)=='2')
		{
			header("Refresh:1;url=".base_url()."accounts/manage_causes");
		}
	}
	public function test(){	
		$data["item"]="Start cause";
		$data["master_title"]="Start cause | ".$this->config->item('sitename');
		$data["master_body"]="test";
		$this->load->view("start_cause/test");
	//	$this->load->theme('home_layout',$data);
	}
	public function upload_image(){	
		//require_once APPPATH.'libraries/server/index.php';
		require_once APPPATH.'libraries/server/UploadHandler.php';
		$upload_handler = new UploadHandler();
	}
	
	public function upload_doc(){	
		require_once APPPATH.'libraries/server/UploadHandler.php';
		$upload_handler = new UploadHandler();
		
	}
	public function remove_image(){	
		    
			$url=$_GET['url']; 
			$new_url = explode('file=',$url);
			
			$path = "upload/".$new_url['1'];
		    $path1 = "upload/thumbnail/".$new_url['1'];
		    chmod("$path",0777);  // set permission to the file.
		    chmod("$path1",0777);  
		    unlink('upload/'.$new_url['1']);
			unlink('upload/thumbnail/'.$new_url['1']);
		   
			$data['result'] = "success";
			$data['img'] = $new_url['1'];
			
			echo json_encode($data);die;
		
	}
	public function remove_docs(){	
		    
			
			$url=$_GET['url']; 
			$new_url = explode('file=',$url);
			
			$path = "upload/".$new_url['1'];
		    $path1 = "upload/thumbnail/".$new_url['1'];
		    chmod("$path",0777);  // set permission to the file.
		    chmod("$path1",0777);  
		    unlink('upload/'.$new_url['1']);
			$data['result'] = "success";
			$data['img'] = $new_url['1'];
			echo json_encode($data);die;
		
	}	
	public function get_user_address(){	
	
		 $user_id = $this->session->userdata("userid");
		 $type = $this->session->userdata("user_type");
		 if($type =='personal')
		 {
		   $data = $this->account_model->get_user_info_user($user_id);
		 }
		 else
		 {
		  $data = $this->account_model->get_user_info_org($user_id);
		 }
		 echo json_encode($data);die;
	}	
		
	 public function move_image($image_name)
     {
          $copy_path="upload/".$image_name;
		  $path = "cause_upload_images/".$image_name;
		  chmod("$copy_path",0777);  // set permission to the file.
		  chmod("$path",0777);  // set permission to the file.
          if(copy($copy_path, $path))//  upload the file to the server
          {
			unlink('upload/'.$image_name);
			$copy_path_thumb="upload/thumbnail/".$image_name;
			$path_thumb = "cause_upload_images/thumbnail/".$image_name;
			chmod("$copy_path_thumb",0777);
			chmod("$path_thumb",0777);
			if(copy($copy_path_thumb, $path_thumb))
			{
			  unlink('upload/thumbnail/'.$image_name);
			}
		 }
       }
		public function move_doc($doc_name)
		 {
			  $copy_path="upload/".$doc_name;
			  $path = "cause_upload_docs/".$doc_name;
			  chmod("$copy_path",0777);  // set permission to the file.
			  chmod("$path",0777);  // set permission to the file.
			  if(copy($copy_path, $path))//  upload the file to the server
			  {
				unlink('upload/'.$doc_name); 
			   }
		 }
	public function add_cause(){	
	   
		$this->common->is_logged_in();
		$arr=array();
		$insert='';
			
		$arr['user_type'] = $this->session->userdata("user_type");
		$arr['user_id'] = $this->session->userdata("userid");
		$arr['title'] = clean($this->input->post('title'));
		$arr["tagline"] = implode(',',$this->input->post("tag"));
		$arr['summary'] = clean($this->input->post('summary'));
		$arr['youtube_link'] = $this->input->post('youtube_link');
		$arr['detailed_stories'] = clean($this->input->post('detailed_stories'));
		
		//if fund allocation is checked 
		
		$arr['is_fundraise'] = ($this->input->post('fundraising'));
		$arr['fund_allocation_information'] = clean($this->input->post('fund_allocation_information'));
		$arr['same_as_user'] = $this->input->post('options');
		$arr['postal_code'] = clean($this->input->post('postal_code'));
		$arr['address'] = clean($this->input->post('address'));
		$arr['unit_f'] = clean($this->input->post('unit_f'));
		$arr['unit_l'] = clean($this->input->post('unit_l'));
		$arr['target_amount'] = clean($this->input->post('target_amount'));
		$arr['duration'] = clean($this->input->post('duration'));
		
		//if petition is checked 
		
		$arr['is_petition'] = ($this->input->post('petition'));
		$arr['petition_target_amount'] = $this->input->post('petition_target_amount');
		$arr['petition_duration'] = clean($this->input->post('petition_duration'));
		$arr['petition_message'] = clean($this->input->post('petition_message'));
		
		//if volunteer is checked 
		$arr['is_volunteer'] = $this->input->post('volunteer');
		$arr['volunteer_event_postal'] = clean($this->input->post('volunteer_event_postal'));
		$arr['volunteer_event_address'] = clean($this->input->post('volunteer_event_address'));
		$arr['volunteer_event_unit_f'] = clean($this->input->post('volunteer_event_unit_f'));
		$arr['volunteer_event_unit_l'] = clean($this->input->post('volunteer_event_unit_l'));
		$arr['volunteer_start_date'] = clean($this->common->get_date_time($this->input->post('volunteer_start_date')));
		$arr['volunteer_end_date'] = clean($this->common->get_date_time($this->input->post('volunteer_end_date')));
		$arr['volunteer_target_number'] = clean($this->input->post('volunteer_target_number'));
		
		$arr['created_time'] = time();
		$arr['status'] = 1;
		
		$arr1['docs'] = $this->input->post('docs');
		$arr1['image'] = $this->input->post('image');
		
		//debug($arr);die;
		 $insert = $this->start_cause_model->add_cause($arr);
	
		if($insert == true)
		 {
			/*$last_id = $this->db->insert_id();
		    foreach($arr1['image'] as $key=>$val){
		       $this->move_image($val);
			   $image['cause_id'] = $last_id;
			   $image['image_name'] = $val;
			   $image['created_time'] = time();
			   $image['status'] = 1;
		       $this->start_cause_model->add_edit_cause_images($image);
		    }
		    if($arr1['docs'] !="") {
			   foreach($arr1['docs'] as $dkey=>$dval){
				   $this->move_doc($dval);
				   $doc['cause_id'] = $last_id;
				   $doc['document_name'] = $dval;
				   $doc['created_time'] = time();
				   $doc['status'] = 1;
				   $this->start_cause_model->add_edit_cause_docs($doc);
			   }
		   }*/
		   $this->session->set_flashdata("successmsg","Your cause will be published soon. Please wait for admin approval.");
		   redirect(base_url()."start_cause/add_cause/1");
		 }
		else
		{
		   $this->session->set_flashdata("errormsg","There is some technical problem to published this cause.");
		}
		redirect(base_url()."home/");
    }
	
	
	public function update_cause(){	
	    
		$this->common->is_logged_in();
		$arr['id'] = clean($this->input->post("id"));
		$arr['user_type'] = clean($this->session->userdata("user_type"));
		$arr['user_id'] = clean($this->session->userdata("userid"));
		$arr['is_fundraise'] = clean($this->input->post('fundraising'));
		$arr['title'] = clean($this->input->post('title'));
		$arr["tagline"] = implode(',',$this->input->post("tag"));
		$arr['summary'] = clean($this->input->post('summary'));
		$arr['youtube_link'] = $this->input->post('youtube_link');
		$arr['detailed_stories'] = clean($this->input->post('detailed_stories'));
		//if petition is checked 
		$arr['fund_allocation_information'] = clean($this->input->post('fund_allocation_information'));
		$arr['same_as_user'] = $this->input->post('options');
		$arr['postal_code'] = clean($this->input->post('postal_code'));
		$arr['address'] = clean($this->input->post('address'));
		$arr['unit_f'] = clean($this->input->post('unit_f'));
		$arr['unit_l'] = clean($this->input->post('unit_l'));
		$arr['target_amount'] = clean($this->input->post('target_amount'));
		$arr['duration'] = clean($this->input->post('duration'));
		
		//if petition is checked 
		$arr['petition_target_amount'] = clean($this->input->post('petition_target_amount'));
		$arr['petition_duration'] = $this->input->post('petition_duration');
		$arr['petition_message'] = clean($this->input->post('petition_message'));
		
		//if volunteer is checked 
		$arr['is_volunteer'] = clean($this->input->post('volunteer'));
		$arr['volunteer_event_postal'] = clean($this->input->post('volunteer_event_postal'));
		$arr['volunteer_event_address'] = clean($this->input->post('volunteer_event_address'));
		$arr['volunteer_event_unit_f'] = clean($this->input->post('volunteer_event_unit_f'));
		$arr['volunteer_event_unit_l'] = clean($this->input->post('volunteer_event_unit_l'));
		$arr['volunteer_start_date'] = clean($this->common->get_date_time($this->input->post('volunteer_start_date')));
		$arr['volunteer_end_date'] = clean($this->common->get_date_time($this->input->post('volunteer_end_date')));
		$arr['volunteer_target_number'] = clean($this->input->post('volunteer_target_number'));
		
		$arr1['docs'] = $this->input->post('docs');
		$arr1['image'] = $this->input->post('image');
		
		 if($this->start_cause_model->edit_cause($arr))
		 {
		   $last_id = $arr['id'];
		   //// remove prev 
		   $this->start_cause_model->delete_cause_images($last_id,$arr1['image']);
		   foreach($arr1['image'] as $key=>$val)
		   {
		      if($val!="")
              { 
				$filename ="cause_upload_images/".$val;
				if (file_exists($filename)) {} 
				else {$this->move_image($val);}	
			   $image['cause_id'] = $last_id;
			   $image['image_name'] = $val;
			   $image['created_time'] = time();
			   $image['status'] = 1;
		       $this->start_cause_model->add_edit_cause_images($image);
		     }
		   } 
		   $this->start_cause_model->delete_cause_docs($last_id,$arr1['docs']);
		   if($arr1['docs'] !="")
		   {
			   foreach($arr1['docs'] as $dkey=>$dval)
			   {
					$filename ="cause_upload_docs/".$dval;
					if (file_exists($filename)) {
					
					} else {
					 $this->move_doc($dval);
					}
					
				    $doc['cause_id'] = $last_id;
				   $doc['document_name'] = $dval;
				   $doc['created_time'] = time();
				   $doc['status'] = 1;
				   $this->start_cause_model->add_edit_cause_docs($doc);
			   }
		   }
		   $this->session->set_flashdata("successmsg","Cause edited Successfully.");
		   redirect(base_url()."start_cause/edit_cause/".$this->input->post("slug")."/2");
		 }
		else
		{
		   $this->session->set_flashdata("errormsg","There is some technical problem to edit this cause.");
		   redirect(base_url()."start_cause/edit_cause/".$this->input->post("slug")."/1");
		}
		
    }	
	
	
	public function remove_image_edit(){	
		    
			
			$url=$_GET['url']; 
			$new_url = explode('file=',$url);
			
			$path = "cause_upload_images/".$new_url['1'];
		    $path1 = "cause_upload_images/thumbnail/".$new_url['1'];
		    chmod("$path",0777);  // set permission to the file.
		    chmod("$path1",0777);  
		    unlink('cause_upload_images/'.$new_url['1']);
			unlink('cause_upload_images/thumbnail/'.$new_url['1']);
		   
			$data['result'] = "success";
			$data['img'] = $new_url['1'];
			
			echo json_encode($data);die;
		
	}
	public function remove_docs_edit(){	
		    
			
			$url=$_GET['url']; 
			$new_url = explode('file=',$url);
			$path = "cause_upload_docs/".$new_url['1'];
		    chmod("$path",0777);  // set permission to the file.
		    chmod("$path1",0777);  
		    unlink('cause_upload_docs/'.$new_url['1']);
			$data['result'] = "success";
			$data['img'] = $new_url['1'];
			echo json_encode($data);die;
		
	}
	public function delete_cause(){	
	    $this->common->is_logged_in();
		$id=$this->uri->segment(3);
		if($this->start_cause_model->deletecause($id))
		{
		   $this->session->set_flashdata("successmsg","Cause deleted Successfully.");
		}
		else
		{
		  $this->session->set_flashdata("errormsg","There is some technical problem to delete this cause.");
		}
		redirect(base_url()."accounts/manage_causes");
	 }
	 
	public function close_cause(){	
	    $this->common->is_logged_in();
		$id=$this->uri->segment(3);
		   $userid = $this->session->userdata('userid');
            $usertype = $this->session->userdata('user_type');
            if($usertype == 'organisation') 
			{
                $data_user = $this->account_model->get_user_info_org($userid);
            } 
			else
			{
                $data_user = $this->account_model->get_user_info_user($userid);
            }
		  $cause_info = $this->start_cause_model->getIndividualcause($id);
		
		if($this->start_cause_model->closecause($id))
		{
		  
		        $emailarr["to"] = $this->config->item("adminemail");;
				$emailarr["subject"] = "Close Request for a cause";
                $emailarr["message"] = "<p>Hi Admin</p>
				<p>User ".$data_user['name']." has put a close request for his runnig cause <b>".$cause_info['title']."</b></p>
				<p>Best Wishes,</p>
				<p>".$this->config->item("sitename")." Team</p>";
				
				$this->email_model->sendIndividualEmail($emailarr); 
		  
		  
		   $this->session->set_flashdata("successmsg","Cause closed Successfully.");
		}
		else
		{
		  $this->session->set_flashdata("errormsg","There is some technical problem to close this cause.");
		}
		redirect(base_url()."accounts/manage_causes");
	 }	
}
