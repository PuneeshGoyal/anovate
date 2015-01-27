<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pets extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("pets_model");
		$this->load->model("user_model");
		$this->load->model("account_model");
	}
	public function index(){
		$this->home();
	}
	
	public function test(){
		$this->CurrencyConverter = new CurrencyConverter();
		//if($lang == 'hebrew') {
        $this->conversion = $this->CurrencyConverter->convert('USD', 'INR', 100, 0, 0);
       /*} else {$this->conversion = 1;}*/
	}
	
	public function manage_pets(){
		$this->common->is_logged_in();
		 
		$page=isset($_GET["per_page"]) ? $_GET["per_page"]:""; 
		if($page == ''){$page = '0';}
		else{
            if(!is_numeric($page)){
            	redirect(BASEURL.'404');
            }else{
    	        $page = $page;
            }
        }
		$config["per_page"] = $this->config->item("perpageitem"); 
		$config['base_url'] = base_url().$this->router->class."/manage_pets/?".$this->common->removeUrl("per_page",$_SERVER["QUERY_STRING"]);
		$countdata = array();
		$countdata = $_GET;
		$countdata["countdata"] = "yes";	
		$countdata["usertype"] = "";	
		$config['total_rows'] = count($this->pets_model->get_all_pet_adoption_data($countdata));   
		$config["uri_segment"] = (isset($_GET["per_page"]) && $_GET["per_page"]!="")?$_GET["per_page"]:"0";
		$this->pagination->initialize($config);
		/*--------------------------Paging code ends---------------------------------------------------*/

		$searcharray = array();
		$searcharray = $_GET;
		$searcharray["per_page"] = $config["per_page"];
		$searcharray["page"] = $config["uri_segment"];
		$searcharray["usertype"] = "";	
		$userid = $this->session->userdata('userid');
		$usertype = $this->session->userdata('user_type');
		if($usertype == 'organisation') 
		{
		   $data['data_user']  = $this->account_model->get_user_info_org($userid);
		} 
		else
		{
		   $data['data_user']  = $this->account_model->get_user_info_user($userid);
		}
		$data['resultdata'] = $this->pets_model->get_all_pet_adoption_data($searcharray);
		$data["master_title"]="Manage pet adoption";
		$data["master_body"]="manage_pets";
		$this->load->theme('home_layout',$data);
	}
	
	
	//for homepage
	public function home(){	
		$this->common->is_logged_in(); 
		
		$page = isset($_GET["per_page"]) ? $_GET["per_page"] : ""; 
		if($page == ''){$page = '0';}
		else{
            if(!is_numeric($page)){
            redirect(BASEURL.'404');
            }else{
    	        $page = $page;
            }
        }
		$config["per_page"] = $this->config->item("perpageitem"); 
		$config['base_url'] = base_url().$this->router->class."/home/?".$this->common->removeUrl("per_page",$_SERVER["QUERY_STRING"]);
		$countdata = array();
		$countdata = $_GET;
		$countdata["countdata"] = "yes";	
		$countdata["usertype"] = "";	
		//$config['total_rows'] = count($this->pets_model->GetAllPetAdoption($countdata));   
		$config["uri_segment"] = (isset($_GET["per_page"]) && $_GET["per_page"]!="")?$_GET["per_page"]:"0";
		$this->pagination->initialize($config);
		/*--------------------------Paging code ends---------------------------------------------------*/

		$searcharray = array();
		$searcharray = $_GET;
		$searcharray["per_page"] = $config["per_page"];
		$searcharray["page"] = $config["uri_segment"];
		$searcharray["usertype"] = "";	
		$searcharray["type"] = $_GET['type'];
			
		$data['country'] = $this->account_model->get_countries();
		$data['breeds'] = $this->pets_model->get_all_breeds();	
		$data['informations'] = $this->pets_model->get_all_informations();	
		//$data['causedata'] = $this->pets_model->getallcauses($searcharray);
		
		$data["item"] = "Cause";
		$data["master_title"] = "Cause | ".$this->config->item('sitename');
		$data["master_body"] = "pets";
		$this->load->theme('home_layout',$data);
	}	
    
	public function listing(){	
		 
		$page = isset($_GET["per_page"]) ? $_GET["per_page"] : ""; 
		if($page == ''){$page = '0';}
		else{
            if(!is_numeric($page))
			{
            	redirect(BASEURL.'404');
            }else{
    	        $page = $page;
            }
        }
		
		$config["per_page"] = $this->config->item("perpageitem"); 
		$config['base_url'] = base_url().$this->router->class."/listing/?".$this->common->removeUrl("per_page",$_SERVER["QUERY_STRING"]);
		$countdata = array();
		$countdata = $_GET;
		$countdata["countdata"] = "yes";	
		$countdata["usertype"] = "";	
		$config['total_rows'] = count($this->pets_model->getallpets($countdata));   
		$config["uri_segment"] = (isset($_GET["per_page"]) && $_GET["per_page"]!="")?$_GET["per_page"]:"0";
		$this->pagination->initialize($config);
		/*--------------------------Paging code ends---------------------------------------------------*/

		$searcharray = array();
		$searcharray = $_GET;
		$searcharray["per_page"] = $config["per_page"];
		$searcharray["page"] = $config["uri_segment"];
		$searcharray["usertype"] = "";	
		$searcharray["type"] = $_GET['type'];	
			
		$data['petdata'] = $this->pets_model->getallpets($searcharray);
		$data['breeds'] = $this->pets_model->get_all_breeds();
		$data["item"] = "Cause";
		$data["master_title"] = "Cause | ".$this->config->item('sitename');
		$data["master_body"] = "listing";
		$this->load->theme('home_layout',$data);
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
	public function move_image($image_name){
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
			if(copy($copy_path_thumb, $path_thumb)){
			  unlink('upload/thumbnail/'.$image_name);
			}
		 }
     }
	   
	  public function move_doc($doc_name){
		  $copy_path="upload/".$doc_name;
		  $path = "cause_upload_docs/".$doc_name;
		  chmod("$copy_path",0777);  // set permission to the file.
		  chmod("$path",0777);  // set permission to the file.
		  if(copy($copy_path, $path))//  upload the file to the server
		  {unlink('upload/'.$doc_name);}
	  }
	  
	 public function create_unique_slug($string,$table,$field='slug',$key=NULL,$value=NULL)
	 {
		$t =& get_instance();
		$slug = url_title($string);
		$slug = strtolower($slug);
		$i = 0;
		$params = array ();
		$params[$field] = $slug;
	 
		if($key)$params["$key !="] = $value;
	 
		while ($t->db->where($params)->get($table)->num_rows())
		{  
			if (!preg_match ('/-{1}[0-9]+$/', $slug ))
				$slug .= '-' . ++$i;
			else
				$slug = preg_replace ('/[0-9]+$/', ++$i, $slug );
			 
			$params [$field] = $slug;
		}  
		return $slug;  
	}
	
	
	public function add_pet_to_database(){	
	    $pet_information=array();
		$this->common->is_logged_in();
		
		$arr['user_type'] = $this->session->userdata("user_type");
		$arr['userid'] = $this->session->userdata("userid");
		$arr['title'] = clean($this->input->post('title'));
		$arr["country"] = $this->input->post("country");
		$arr["breed_id"] = $this->input->post("breed_id");
		$information_id = $this->input->post("information_id");
		$arr["gender"] = $this->input->post("gender");
		$arr["age"] = $this->input->post("age");
		$arr['summary'] = clean($this->input->post('summary'));
		$arr['detailed_stories'] = clean($this->input->post('detailed_stories'));
		$arr['duration'] = clean($this->input->post('duration'));
		$arr['same_as_user'] = $this->input->post('pet_adoption_same_as_user');
		$arr['location'] = clean($this->input->post('location'));	
		$arr['created_time'] = time();
		$arr['status'] = 1;
		
		$arr1['docs'] = $this->input->post('docs');
		$arr1['image'] = $this->input->post('image');
		
		$array=array();$string='';$table='';$field='';$key='';
		
		$string=$arr['title'];
		$table='pet_adoptions';
		$field='slug';
		$key='id';
		$value='';
		$arr['slug'] = $this->create_unique_slug($string,$table,$field,$key,$value);
		$is_default_image='';
		
		/*debug($arr);
		die;*/
		 if($this->pets_model->add_cause($arr)) {
		   $last_id = $this->db->insert_id();
		   
		   foreach($information_id as $k=>$v){
			   if($v !=""){
				   $pet_information["pet_id"] = $last_id;
				   $pet_information["information_id"] = $v;
				   $pet_information["status"] = "1";
				   $pet_information["created_time"] = time();
				   $this->pets_model->add_edit_pet_informations($pet_information);}
		   }
		   $is_default_image = range(1,6);
		   foreach($arr1['image'] as $key=>$val) {
		       $this->move_image($val);
			   $image['pet_id'] = $last_id;
			   $image['image_name'] = $val;
			   $image['created_time'] = time();
			   $image['status'] = 1;
			   $image["is_default_image"] = $is_default_image[$key];
		       $this->pets_model->add_edit_cause_images($image);
		   }
		   if($arr1['docs'] !=""){
			   foreach($arr1['docs'] as $dkey=>$dval) {
				   $this->move_doc($dval);
				   $doc['pet_id'] = $last_id;
				   $doc['document_name'] = $dval;
				   $doc['created_time'] = time();
				   $doc['status'] = 1;
				   $this->pets_model->add_edit_cause_docs($doc);
			   }
		   }
		   //$this->session->set_flashdata("successmsg","Your pet listing will be published soon. Please wait for admin approval.");
		   redirect(base_url().$this->router->class."/step2/".$last_id);
		 }
		else
		{
		   $this->session->set_flashdata("errormsg","There is some technical problem to published this pet listing.");
		}
		redirect(base_url()."pets");
    }
	
	
	public function edit_pets(){	
	
	    $this->common->is_logged_in();
		$slug =$this->uri->segment(3);
		
		$data["dataset"]=$this->pets_model->getcausedatabyslug($slug);
		$data['breeds'] = $this->pets_model->get_all_breeds();	
		$data['informations'] = $this->pets_model->get_all_informations();	
		$data['user_petadoption_informations'] = $this->pets_model->get_user_petadoption_informations($data["dataset"]["id"]);	
		$data["item"]="Edit cause";
		$data["master_title"]="Edit pet adoption | ".$this->config->item('sitename');
		$data["master_body"]="edit_pets";
		$this->load->theme('home_layout',$data);
		if($this->uri->segment(4) !=''&& $this->uri->segment(4)=='2'){
			header("Refresh:0;url=".base_url().$this->router->class."/edit_step2/".$data["dataset"]["id"]);
		}
	}
	public function update_pet_to_database(){	
	    $pet_information=array();
		$this->common->is_logged_in();
		$arr['id'] = clean($this->input->post("id"));
		$arr['user_type'] = $this->session->userdata("user_type");
		$arr['userid'] = $this->session->userdata("userid");
		$arr['title'] = clean($this->input->post('title'));
		$arr["country"] = $this->input->post("country");
		$arr["breed_id"] = $this->input->post("breed_id");
		$information_id = $this->input->post("information_id");
		$arr["gender"] = $this->input->post("gender");
		$arr["age"] = $this->input->post("age");
		$arr['summary'] = clean($this->input->post('summary'));
		$arr['detailed_stories'] = clean($this->input->post('detailed_stories'));
		$arr['duration'] = clean($this->input->post('duration'));
		$arr['same_as_user'] = $this->input->post('pet_adoption_same_as_user');
		$arr['location'] = clean($this->input->post('location'));
		$arr1['docs'] = $this->input->post('docs');
		$arr1['image'] = $this->input->post('image');
		
		 if($this->pets_model->edit_cause($arr)) {
		   $last_id = $arr['id'];
		   //// remove prev 
		   $this->pets_model->delete_cause_images($last_id,$arr1['image']);
		   $is_default_image = range(1,6);
		  
		   foreach($arr1['image'] as $key=>$val){
		      if($val!=""){ 
			    $filename ="cause_upload_images/".$val;
				if(file_exists($filename)) {}
				else {$this->move_image($val);}	
			    $image['pet_id'] = $last_id;
			    $image['image_name'] = $val;
			    $image['created_time'] = time();
			    $image['status'] = 1;
				$image["is_default_image"] = $is_default_image[$key];
		        $this->pets_model->add_edit_cause_images($image);
		     }
		   } 
		   
		   $this->pets_model->delete_cause_docs($last_id,$arr1['docs']);
		   if($arr1['docs'] !=""){
			   foreach($arr1['docs'] as $dkey=>$dval){
				   $filename ="cause_upload_docs/".$dval;
				   if (file_exists($filename)) {} else { $this->move_doc($dval);}
				   $doc['pet_id'] = $last_id;
				   $doc['document_name'] = $dval;
				   $doc['created_time'] = time();
				   $doc['status'] = 1;
				   $this->pets_model->add_edit_cause_docs($doc);
			   }
		   }
		  // $this->session->set_flashdata("successmsg","Cause edited Successfully.");
		   redirect(base_url().$this->router->class."/edit_pets/".$this->input->post("slug")."/2");
		 }
		else
		{
		   $this->session->set_flashdata("errormsg","There is some technical problem to edit this cause.");
		   redirect(base_url().$this->router->class."/edit_pets/".$this->input->post("slug")."/1");
		}
		
    }
	
    public function step2(){ 
		$this->common->is_logged_in(); 
	    $data["cause_id"] = $this->uri->segment(3);
        $data["item"] = "Step2";
        $data["master_title"] = "Step2 | ".$this->config->item('sitename');
        $data["master_body"] = "pets";
        $this->load->theme('home_layout',$data);
    }
    public function edit_step2(){ 
		$this->common->is_logged_in(); 
	    $data["cause_id"] = $this->uri->segment(3);
        $data["item"] = "Step2";
        $data["master_title"] = "Edit Step2 | ".$this->config->item('sitename');
        $data["master_body"] = "edit_pets";
		//debug($data);die;
        $this->load->theme('home_layout',$data);
    }
	
	public function check_is_date_filled($cause_id){
		  
		  if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		  }
		
		  $data = array();
		  $check_is_date_filled='';
		  
		  $check_is_date_filled = $this->pets_model->check_is_date_filled($cause_id);
		  //echo $check_is_date_filled;die;
		  if($check_is_date_filled > 0){ $data="1";}
		  else{ $data="0"; }
		  echo $data;die;
	}
	  
	public function mark_steps_completed(){
		if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		
		$cause_id = $this->input->post("cause_id");
		$data = array();
		$result = '';
		$result1 = '';
		
		if(!empty($cause_id)){
			$result = $this->pets_model->mark_steps_completed($cause_id);
			$result1 = $this->pets_model->check_is_date_filled($cause_id);
			
			if($result == 0){
				$data["response"]="error";
			}
			else if($result1 == 0){
				$data["response"]="error1";
			}
			else if($result == 1){
				$data["response"]="success";
			}
			echo json_encode($data);
		}
	}
	
	public function is_unique_title(){
		if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		
		$arr['id'] = $this->input->post("id");
		$arr['title'] = $this->input->post("title");
		$data = array();
		
		if(!empty($arr)){
			$result = $this->pets_model->is_unique_title($arr);
			if($result == 0){$data["response"]="success";}
			else{$data["response"]="error";}
			echo json_encode($data);
		}
	}
	
    public function pet(){ 
        $data["item"] = "pet";
        $data["master_title"] = "Pet | ".$this->config->item('sitename');
        $data["master_body"] = "pet";
        $this->load->theme('home_layout',$data);
    } 
    
    public function view_pet(){ 
        $data["item"] = "view_pet";
        $data["master_title"] = "View Pet | ".$this->config->item('sitename');
        $data["master_body"] = "pet_detail";
        $this->load->theme('home_layout',$data);
    }
	
	public function pet_detail(){ 
	
	    $slug=$this->uri->segment(3);
		$id = $this->pets_model->get_pet_id_byslug($slug);
		$userid = $this->session->userdata("userid");
		$data["dataset"] = $this->pets_model->getcausedatabyslug($slug);
		
		/*if($userid <> ""){$data["user_cards"] = $this->user_model->getusercars($userid);}
		else{$data["user_cards"]='0';}
		$data["donation_data"] = $this->start_cause_model->getcausedonationinfo($data["dataset"]['id']);
		$data["petition_cause_data"] = $this->start_cause_model->getPetitionDonationInfo($data["dataset"]['id']);
		$data["volunteer_cause_data"] = $this->start_cause_model->getVolunteerDonationInfo($data["dataset"]['id']);
		$data["heroes"] = $this->start_cause_model->get_all_heroes_of_cause($id);*/
		
		$data["comment"] = $this->pets_model->get_all_comments($id); 
		//debug($data);die;
        $data["item"] = "Pet Detail";
        $data["master_title"] = "Pet Detail | ".$this->config->item('sitename');
        $data["master_body"] = "pet_detail";
		$this->load->theme('home_layout',$data);
		if($this->uri->segment(4)!='' && $this->uri->segment(4)=='0'){
			header("Refresh:0;url=".base_url().$this->router->class."/pet_detail/".$this->uri->segment(3));
		}
    }
	
	public function get_pet_adoption_user_address(){
		 if(!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		 }
		 	
		 $user_id = $this->session->userdata("userid");
		 $type = $this->session->userdata("user_type");
		 $data = array();
		 
		 if($type == 'personal'){
		   $data = $this->account_model->get_user_info_user($user_id);
		 }
		 else{
		  $data = $this->account_model->get_user_info_org($user_id);
		 }
		 echo json_encode($data);die;
	}
	
	public function volunteer_submission(){
		
		if(!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		$data = array();
		$arr = array();
		$insert = '';
		
		$arr["cause_id"] = clean($this->input->post('cause_id'));
		$arr["name"] = clean($this->input->post('name'));
		$arr["address"] = clean($this->input->post('location'));
		$arr["email"] = clean($this->input->post('email'));
		$arr["userid"] = clean($this->input->post('userid'));
		$arr["user_type"] = clean($this->input->post('user_type'));
		$arr["anonymous_status"] = clean($this->input->post('anonymous_status'));
		$arr["age"] = ($this->input->post('age'));
		$arr["gender"] = ($this->input->post('gender'));
		$arr["phone_number"] = ($this->input->post('phone_number'));
		$arr["created_time"] = time();
		$arr["status"] = 1;
		
		$already_supported = $this->common->is_already_supported("volunteers",$arr["email"],$arr["cause_id"]);
		if($already_supported > 0){
			$data["response"]="error";
			$data["message"] = "You have already supported this cause";
		}
		else{
			$insert = $this->start_cause_model->add_volunteer_submission($arr);
			if($insert){
				$data["response"]="success";
				$data["message"] = "Thanks for supporting";
			}
			else{
				$data["response"]="error";
				$data["message"] = "There is some technical problem ,please contact admin.";
			}
		}
		echo json_encode($data);
	}
	
	public function petition_submission(){
		if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		$data=array();
		$arr= array();
		$insert='';
		
		$arr["cause_id"] = clean($this->input->post('cause_id'));
		$arr["name"] = clean($this->input->post('name'));
		$arr["address"] = clean($this->input->post('location'));
		$arr["email"] = clean($this->input->post('email'));
		$arr["message"] = clean($this->input->post('message'));
		$arr["userid"] = clean($this->input->post('userid'));
		$arr["user_type"] = clean($this->input->post('user_type'));
		$arr["anonymous_status"] = clean($this->input->post('anonymous_status'));
		$arr["created_time"] = time();
		$arr["status"] = 1;
		
		//to check whether this user already suppoted cause or not
		$already_supported = $this->common->is_already_supported("petitions",$arr["email"],$arr["cause_id"] );
		if($already_supported > 0){
			$data["response"]="error";
			$data["message"] = "You have already pledged this cause";
		}
		else{
			$insert = $this->start_cause_model->add_petition_submission($arr);
			if($insert){
				$data["response"]="success";
				$data["message"] = "Thanks for supporting"; 
			}
			else{
				$data["response"]="error";
				$data["message"] = "There is some technical problem ,please contact admin.";
			}
		}
		echo json_encode($data);
	}
	
	
	public function add_comment()
	{
		$arr["pet_id"] = $this->pets_model->get_cause_id_byslug($this->input->post("pet_id"));
		$arr["ip"] = $_SERVER['REMOTE_ADDR'];
		$arr["comment"] = clean($this->input->post("comment"));
		$arr["userid"] = $this->session->userdata("userid");
		$arr["user_type"] = $this->session->userdata("user_type");
		$arr["status"] = 1;
		$arr["time"] = time();
		
		if($arr["comment"] == ""){
			$this->session->set_flashdata("comment_errormsg","Please enter your comment");
			redirect(base_url().$this->router->class."/pet_detail/".$this->input->post("pet_id"));
		}
		else{
			if($this->pets_model->add_comment($arr))
			{
				$err=0;
				$this->session->set_flashdata("comment_successmsg",'Comment posted successfully');
				redirect(base_url().$this->router->class."/pet_detail/".$this->input->post("pet_id")."/".$err."");
			}
			else
			{
				$err=1;
				$this->session->set_flashdata("comment_errormsg","There is an error while posting your comment,please contact admin");
				redirect(base_url().$this->router->class."/pet_detail/".$this->input->post("pet_id")."/".$err."");
			}
		}
	}
	
	
	public function load_more(){
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		 }
		  
		$id = $this->uri->segment(3);
		$blogid = $this->uri->segment(4);
		
		$data = array();
		$last_blog_id = array();
		$data = $this->pets_model->load_more($id,$blogid);
		
		if(count($data) !=0){
			$last_blog_id = array_reverse($data,true);
			$max = max(array_keys($last_blog_id));
			$id = $data[$max]["id"];  
		}
		$result =  '';
		$result1 = '';
		$result2 = '';
		
		if(count($data) > 0){
			
			$i=0;foreach($data as $k =>$v){
				//<img src="'.base_url().'images/comment_img.jpg" class="comment_img">
			$result1 .=	'<div class="comment_row" id="data_append_'.$v["id"].'" >    
					 <div class="comment_text">
					 <p><strong>'.$this->common->get_user_name($v["userid"],$v["user_type"]).':</strong></p>
					 <p>'.stripcslashes($v["comment"]).'</p>
			         <p>'.$this->common->convert_time_days($v["time"]).' </p></div></div>';
				$i++;
			}
			$result2 = $id;
		}
		else{
			$result1 = '<div style="float: left;margin-top: 20px;">No more comments</div><div style="clear:both;"></div>';
			$result2 = '0';
		}
		$result[0] = $result1;
		$result[1] = $result2;
		$msg = implode("|::|",$result);
		echo $msg;die;
	}
	
	public function view()
	{
		$data["id"] =  $this->uri->segment(3);
		$redirect_url = array();
		$redirect_url = explode("/",$_SERVER['HTTP_REFERER']);
		$people = array("www.facebook.com", "t.co", "plus.url.google.com");
		//if($redirect_url[0] == "http://t.co/PdvkbaJZDn" || $redirect_url[0] == "https://www.facebook.com/" || $redirect_url[0] == "http://plus.url.google.com/url")
		if(in_array($redirect_url[2], $people))
		{
			$response = $this->start_cause_model->getIndividualcause($data["id"]);
			echo "Please wait we are redirecting you....";
			header("Refresh:0;url=".base_url().$this->router->class."/cause_detail/".$response["slug"]);
		}
		else{
			$this->load->theme('head');
			$this->load->view('cause/share_pop',$data);
		}
	}
	
	public function share_cause()
	{
		$data["id"] =  $this->uri->segment(3);
		$data["row_id"] =  $this->uri->segment(4);
		$redirect_url = array();
		$redirect_url = explode("/",$_SERVER['HTTP_REFERER']);
		$people = array("www.facebook.com", "t.co", "plus.url.google.com");
		//if($redirect_url[0] == "http://t.co/PdvkbaJZDn" || $redirect_url[0] == "https://www.facebook.com/" || $redirect_url[0] == "http://plus.url.google.com/url")
		if(in_array($redirect_url[2], $people))
		{
			$response = $this->start_cause_model->getIndividualcause($data["id"]);
			echo "Please wait we are redirecting you....";
			header("Refresh:0;url=".base_url().$this->router->class."/cause_detail/".$response["slug"]);
		}
		else{
			//$this->load->theme('head');
			$this->load->view('cause/share_cause',$data);
		}
	}
	
	public function thankyou()
	{
		$data["item"] = "Thank you";
        $data["master_title"] = "Thank you | ".$this->config->item('sitename');
        $data["master_body"] = "thankyou";
		
        $this->load->theme('home_layout',$data);
	}
	
	public function proceed_adoption(){
		if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		$arr = array();
		$result='';
		$arr['pet_id'] = $this->input->post("pet_id");
		$arr['created_time'] = time();
		$arr['status'] = 1;
		$arr["userid"] = $this->session->userdata('userid');
		$arr["user_type"] = $this->session->userdata('user_type');
		
		if(!empty($arr)){
			$result = $this->pets_model->proceed_adoption($arr);
			
			if($result == 0){
				$data["response"]="error";
				$data["message"]="";
			}
			else if($result == 1){
				$data["response"]="success";
				$data["message"]=$this->db->insert_id();
			}
			echo json_encode($data);
		}
	}
	
	public function view_appointment(){
	  $data='';
	  $id = $this->uri->segment(3); 
	  $dataset = $this->pets_model->getcausedatabyslug($id);
	  $closetime = $dataset['activated_time'] + ($dataset['duration']*24*60*60);
	  $result = $this->pets_model->get_booked_appointments_userdata($dataset["id"]);
	  //debug($result);
	  //die;
	  $data .= '<div class="modal-header custom_m_head">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title custom_title" id="myModalLabel">'.$id.' - Appointment progress</h4>
		<h6><a href="'.base_url().$this->router->class.'/report/'.$id.'">Download</a></h6>
      </div>
      <div class="modal-body modal_w">
        <div class="mnt_table_popup">
          <div class="col-sm-6 col-xs-6">Time left: <span data-time="'.$closetime.'" class="kkcount-down" id="view_appointment1"></span>
		  </span>
		  </div>
        </div>
        <div class="clearfix"></div>
		<div id="mnt_scroll">
        <div class="table-responsive">
          <table class="table mnt_table_popup manage_table appointment_table table-condensed table-striped table-bordered table-hover no-margin">
            <thead>
              <tr class="mnt_blue">
                <th>Name</th>
				<th>Email</th>
				<th>Contact office</th>
				<th>Type</th>
				<th>Date & Time</th>
              </tr>
            </thead>
            <tbody>';
			//$set=0;debug($result);
			$userinfo='';
				foreach($result as $key => $val){
					if(time() < $val["enabled_time"]){
						
						if($val['user_type'] == 'organisation') {
								$userinfo= $this->account_model->get_user_info_org($val['userid']);
								$name = $userinfo["name"];
								$email = $userinfo["email"];
								$contact_office = $userinfo["contact_office"];
						 } elseif($val['user_type'] == 'personal'){
								$userinfo = $this->account_model->get_user_info_user($val['userid']);
								$name = $userinfo["name"];
								$email = $userinfo["email"];
								$contact_office = $userinfo["contact_office"];
						 }
						 $data .='<tr>';
						 $data .='<td>'.$name.'</td>';
						 $data .='<td>'.$email.'</td>';
						 $data .='<td>'.$contact_office.'</td>';
						 $data .='<td>'.$val['user_type'].'</td>';
						 $data .='<td>'.date('d-M-Y h:i a',$val["enabled_time"]).'</td>';
						 $data .='</tr>';
					}
					/*else{
						$set=1;
					}*/
				 }
			//echo $set;
			if(empty($result)){
				$data .= '<tr><td colspan="5" style="color:red;">No record found</td></tr>';
			}
         $data .= '</tbody>
          </table>
        </div>
		</div>
      </div>';
	  echo $data;
	}
	
	public function report(){
		
		 $message='';
	 	 $id=$this->uri->segment(3); 
		 $dataset=$this->pets_model->getcausedatabyslug($id);
		 $result = $this->pets_model->get_booked_appointments_userdata($dataset["id"]);
	  	 
		 $message = "<table border=\"1\" width=\"100%\">
			<tr style='background-color:#4f81bd;'>
				<td style='font-size:14px; font-family:Microsoft Tai Le;font-weight:bold;' nowrap=\"nowrap\"><b>Sr.no.</b></td>
				<td style='font-size:14px; font-family:Microsoft Tai Le;font-weight:bold;' nowrap=\"nowrap\"><b>Name</b></td>
				<td style='font-size:14px; font-family:Microsoft Tai Le;font-weight:bold;' nowrap=\"nowrap\"><b>Email</b></td>
				<td style='font-size:14px; font-family:Microsoft Tai Le;font-weight:bold;' nowrap=\"nowrap\"><b>Contact office</b></td>
				<td style='font-size:14px; font-family:Microsoft Tai Le;font-weight:bold;' nowrap=\"nowrap\"><b>Type</b></td>
				<td style='font-size:14px; font-family:Microsoft Tai Le;font-weight:bold;' nowrap=\"nowrap\"><b>Date & time</b></td>
			</tr>";
			$set=0;
			$i=1;
			foreach($result as $key => $val){
				if(time() < $val["enabled_time"]){
					if($val['user_type'] == 'organisation') {
								$userinfo= $this->account_model->get_user_info_org($val['userid']);
								$name = $userinfo["name"];
								$email = $userinfo["email"];
								$contact_office = $userinfo["contact_office"];
					} elseif($val['user_type'] == 'personal'){
								$userinfo = $this->account_model->get_user_info_user($val['userid']);
								$name = $userinfo["name"];
								$email = $userinfo["email"];
								$contact_office = $userinfo["contact_office"];
					}
					if($i%2 !='0'){$cls="background-color:#dbe5f1";}else{$cls="background-color:#b8cce4";}
					 $message .= "<tr style='".$cls."'>";
					 $message .=  "<td width=\"25%\" style='font-size:12px; font-family:Microsoft Tai Le;text-align:left'>".$i."</td> 
					 <td width=\"25%\" style='font-size:12px; font-family:Microsoft Tai Le;text-align:left'>".ucfirst($name)."</td>
					 <td width=\"25%\" style='font-size:12px; font-family:Microsoft Tai Le;text-align:left'>".$email."</td>
					 <td width=\"25%\" style='font-size:12px; font-family:Microsoft Tai Le;text-align:left'>".$contact_office."</td>
					 <td width=\"25%\" style='font-size:12px; font-family:Microsoft Tai Le;text-align:left;'>".$val['user_type']."</td>
					 <td width=\"25%\" style='font-size:12px; font-family:Microsoft Tai Le;text-align:left;'>".date('d-M-Y h:i a',$val["enabled_time"])."</td>";
					 $message .= "</tr>";
					 $i++;
			   }
			   else{
				   $set=1;
			   }
			   
			}
			if($set==1 || empty($result)){
				$message .= "<tr>";
				$message .=  "<td colspan='5' width=\"25%\" style='font-size:12px; font-family:Microsoft Tai Le;text-align:center;'>No record found</td>";
				$message .= "</tr>";
			}
			 $message .= "</table>";
			 //header to give the order to the browser
			 $myFile = $this->config->item('sitename')."_Adoption_".date('m/d/y').".xls";
			 header("Pragma: public");
			 header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
			 header("Content-Type: application/force-download");
			 header("Content-Type: application/octet-stream");
			 header("Content-Type: application/download");
			 header("Content-type: application/ms-excel");
			 header("Content-Disposition: attachment; filename=".$myFile);
			 header("Content-Transfer-Encoding: binary");
			 header("Pragma: no-cache"); 
			 header("Expires: 0");
			 echo $message;
		     exit;
		}	
		
		
	public function download_file(){
   //$fullPath = base_url().'cause_upload_docs/'.urldecode($this->uri->segment(3));
    $fullPath ='./cause_upload_docs/'.urldecode($this->uri->segment(3));
    // Must be fresh start
    if( headers_sent() ){ die('Headers Sent'); }
    // Required for some browsers
    if(ini_get('zlib.output_compression')){ ini_set('zlib.output_compression', 'Off');}
    // File Exists?
    if(file_exists($fullPath) ){
	   // Parse Info / Get Extension
	   $fsize = filesize($fullPath);
	   $path_parts = pathinfo($fullPath);
	   $ext = strtolower($path_parts["extension"]);
	   // Determine Content Type
	   switch ($ext) {
		 case "pdf": $ctype="application/pdf"; break;
		 case "exe": $ctype="application/octet-stream"; break;
		 case "zip": $ctype="application/zip"; break;
		 case "doc": $ctype="application/msword"; break;
		 case "xls": $ctype="application/vnd.ms-excel"; break;
		 case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
		 case "gif": $ctype="image/gif"; break;
		 case "png": $ctype="image/png"; break;
		 case "jpeg": $ctype="image/jpeg"; break;
		 case "jpg": $ctype="image/jpg"; break;
		 case "txt": $ctype="application/txt"; break;
		 default: $ctype="application/force-download";
	   }
  
	   header("Pragma: public"); // required
	   header("Expires: 0");
	   header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	   header("Cache-Control: private",false); // required for certain browsers
	   header("Content-Type: $ctype");
	   header("Content-Disposition: attachment; filename=\"".basename($fullPath)."\";" );
	   header("Content-Transfer-Encoding: binary");
	   header("Content-Length: ".$fsize);
	   ob_clean();
	   flush();
	   readfile($fullPath);
    } else{ die('File Not Found');}
  }
 
	 public function del(){
	  $main_dir='';
	  //echo FCPATH;
	  $main_dir = FCPATH."upload";
	  $dirtime  = $this->scan_dir($main_dir);//scan dir and return file name according to time desc
	  $i=0;foreach($dirtime as $k=>$v){
	   if($i==0){
		$max_time = $v;
		$deducted_time = strtotime('-2 hours',$max_time);
	   }
	   if($v < $deducted_time) {unlink("upload/".$k);}
	   $i++;
	  }
	 }
	  public function scan_dir($dir) {
	   $ignored = array('thumbnail','Thumbs.db','.', '..', '.svn', '.htaccess');
	   $files = array();    
	   foreach (scandir($dir) as $file){
		if (in_array($file, $ignored)) continue;
		  $stat = stat($dir."/".$file);
		 $files[$file] = filemtime($dir . '/' . $file);
		}
		arsort($files);
		return ($files) ? $files : false;
	  }
}
?>