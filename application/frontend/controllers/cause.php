<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cause extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("start_cause_model");
		$this->load->model("user_model");
	}
	public function index(){
		$this->home();
		$this->session->unset_userdata('login_userid');//unset session userid after inserting to database
		$this->session->unset_userdata('signup_user_type');//unset signup user type
	}
	
	//for homepage
	public function home(){	
		 
		$page=isset($_GET["per_page"])?$_GET["per_page"]:""; 
		if($page == ''){$page = '0';}
		else{
            if(!is_numeric($page)){
            redirect(BASEURL.'404');
            }else{
    	        $page = $page;
            }
        }
		$config["per_page"] = $this->config->item("perpageitem"); 
		$config['base_url'] = base_url()."cause/home/?".$this->common->removeUrl("per_page",$_SERVER["QUERY_STRING"]);
		$countdata = array();
		$countdata = $_GET;
		$countdata["countdata"] = "yes";	
		$countdata["usertype"] = "";	
		$config['total_rows'] = count($this->start_cause_model->getallcauses($countdata));   
		$config["uri_segment"] = (isset($_GET["per_page"]) && $_GET["per_page"]!="")?$_GET["per_page"]:"0";
		$this->pagination->initialize($config);
		/*--------------------------Paging code ends---------------------------------------------------*/

		$searcharray = array();
		$searcharray = $_GET;
		$searcharray["per_page"] = $config["per_page"];
		$searcharray["page"] = $config["uri_segment"];
		$searcharray["usertype"] = "";	
		$searcharray["type"] = $_GET['type'];	
			
		$data['causedata'] = $this->start_cause_model->getallcauses($searcharray);
		
		$data["item"] = "Cause";
		$data["master_title"] = "Cause | ".$this->config->item('sitename');
		$data["master_body"] = "cause";
		$this->load->theme('home_layout',$data);
		
	}	
    
    public function view_cause(){ 
        $data["item"] = "view_cause";
        $data["master_title"] = "View Cause | ".$this->config->item('sitename');
        $data["master_body"] = "cause_detail";
        $this->load->theme('home_layout',$data);
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
	
	public function cause_detail(){ 
		$this->load->library('user_agent');
	 $data['is_mobile'] =  $this->agent->is_mobile();
	
	//$this->benchmark->mark('code_start');
	    $slug=$this->uri->segment(3);
		$id = $this->start_cause_model->get_cause_id_byslug($slug);
		$userid = $this->session->userdata("userid");
		$data["dataset"] = $this->start_cause_model->getcausedatabyslug($slug);
		if($userid <> ""){
			$data["user_cards"] = $this->user_model->getusercars($userid);
		}
		else{
			$data["user_cards"]='0';
		}
		
		$data["donation_data"] = $this->start_cause_model->getcausedonationinfo($data["dataset"]['id']);
		$data["petition_cause_data"] = $this->start_cause_model->getPetitionDonationInfo($data["dataset"]['id']);
		$data["volunteer_cause_data"] = $this->start_cause_model->getVolunteerDonationInfo($data["dataset"]['id']);
		
		$data["comment"] = $this->start_cause_model->get_all_comments($id); 
		$data["heroes"] = $this->start_cause_model->get_all_heroes_of_cause($id); 
		//debug($data);die;
        $data["item"] = "Cause Detail";
        $data["master_title"] = "Cause Detail | ".$this->config->item('sitename');
        $data["master_body"] = "cause_detail";
        
		$this->load->theme('home_layout',$data);
		
		if($this->uri->segment(4)!=''&& $this->uri->segment(4)=='0')
		{
			header("Refresh:3;url=".base_url().$this->router->class."/cause_detail/".$this->uri->segment(3));
		}
    }
	
	public function volunteer_submission(){
		
		if (!$this->input->is_ajax_request()) {
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
		$arr["cause_id"] = $this->start_cause_model->get_cause_id_byslug($this->input->post("cause_id"));
		$arr["ip"] = $_SERVER['REMOTE_ADDR'];
		$arr["comment"] = clean($this->input->post("comment"));
		$arr["userid"] = $this->session->userdata("userid");
		$arr["user_type"] = $this->session->userdata("user_type");
		$arr["status"] = 1;
		$arr["time"] = time();
		//debug($arr);die;
		$this->session->set_flashdata("tempdata", strip_slashes($arr));	
	
	
		/*if($arr["userid"] == ""){
			$this->session->set_flashdata("comment_errormsg","Please enter your name");
			redirect(base_url().$this->router->class."/cause_detail/".$this->input->post("cause_id"));
		}
		else*/
		if($arr["comment"] == ""){
			$this->session->set_flashdata("comment_errormsg","Please enter your comment");
			redirect(base_url().$this->router->class."/cause_detail/".$this->input->post("cause_id"));
		}
		else{
			if($this->start_cause_model->add_comment($arr))
			{
				$err=0;
				$this->session->set_flashdata("comment_successmsg",'Comment posted successfully');
				redirect(base_url().$this->router->class."/cause_detail/".$this->input->post("cause_id")."/".$err."");
			}
			else
			{
				$err=1;
				$this->session->set_flashdata("comment_errormsg","There is an error while posting your comment,please contact admin");
				redirect(base_url().$this->router->class."/cause_detail/".$this->input->post("cause_id")."/".$err."");
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
		$data = $this->start_cause_model->load_more($id,$blogid);
		
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
			$result1 = '<div style="float: left;margin-top: 20px;">No more comments</div>';
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
	
	public function test()
	{
		$data["item"] = "Test";
        $data["master_title"] = "Thank you | ".$this->config->item('sitename');
        $data["master_body"] = "test";
		//debug($this->input->get_post());
		//die;
        $this->load->theme('home_layout',$data);
	}
	
	public function download_file(){
 
   
   //$fullPath = base_url().'cause_upload_docs/'.urldecode($this->uri->segment(3));
    $fullPath ='./cause_upload_docs/'.urldecode($this->uri->segment(3));

    // Must be fresh start
    if( headers_sent() ){
  		 die('Headers Sent');
    }
    // Required for some browsers
    if(ini_get('zlib.output_compression')){
   ini_set('zlib.output_compression', 'Off');
    }
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
  
    } else{
   die('File Not Found');
    }
  
  }
 
	 
}
?>