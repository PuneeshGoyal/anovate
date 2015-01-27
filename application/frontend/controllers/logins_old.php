<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'libraries/facebook/src/facebook.php';

class Logins extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('email_model');
		$this->load->model('login_model');
		
	}
    
    public function index() 
	{
		
    }
	
	//check login details and login the user
	public function logins_check_user_login()
	{
		$login = array();
		$result = array();
		$data = array();
        
		$login["username"] = clean($this->input->post("username"));	
		$login["password"] = clean($this->input->post("password"));
		$data["userdata"] = $this->session->set_userdata("tempdata", strip_slashes($login));
		
	    $data = $this->common->authenticateUserLogin($login);
		if($data)
		{
			$result = 'success';
			//$result["response"] = '';
		}
		else
		{	
			$result = 'error';
			//$result["response"] = 'Authentication failed. No username exists';
		}
		
		//$msg_arr = implode("|::|",$result);
		echo json_encode($result);
		die;
	}
	
    public function register() {
        $data["master_title"]="Register";
        $data["master_body"]="register";
        $breadcrumb = array("Home" => "home","Login"=>"logins","Register"=>"");
        $data['breadcrumb'] = $breadcrumb;
        $this->load->theme('home_layout',$data);
    }
    
    public function check_username_availability() {
        
        
        if($this->input->post('username') != '') {
                
            
            $username = $this->input->post('username');
            $check_user = $this->login_model->check_username($username);
            if($check_user == 0) {
                echo 'No available';
            } else {
                echo 'Available';
            }
        }
    }
	
	  public function get_address() {
	    $personal_nationality ='';$personal_postal_code='';
		$personal_nationality = $this->input->post('personal_nationality');
		$personal_postal_code = $this->input->post('personal_postal_code');
		
		$url = "http://maps.google.com/maps/api/geocode/json?components=country:$personal_nationality|postal_code:$personal_postal_code" ;
		$exec = file_get_contents($url);
		$fetch = json_decode($exec,true);
		$arr=array();
		$name="";
		
		foreach($fetch["results"] as $k =>$v)
		{
		   	$arr = $v['address_components'];
			$add = $v["formatted_address"];
			$newtext = explode(" ",$add);
			$long_name = $arr[1]["long_name"];
			$short_name = $arr[3]["short_name"];
			$zip = $newtext[1];
			
			$name = ucfirst($personal_nationality).", ".$long_name.", ".$short_name." ".$zip;
			
		}
		if($name){
			$data = $name;
		}
		else{
			$data = 'error';
		}
		echo json_encode($data);die;
    }
	
	public function get_address1() {
	    $organisation_location_type ='';
		$organisation_postal_code='';
		
		$organisation_location_type = $this->input->post('organisation_location_type');
		$organisation_postal_code = $this->input->post('organisation_postal_code');
		
		$url = "http://maps.google.com/maps/api/geocode/json?components=country:$organisation_location_type|postal_code:$organisation_postal_code" ;
		$exec = file_get_contents($url);
		$fetch = json_decode($exec,true);
		$arr=array();
		$name="";
		
		foreach($fetch["results"] as $k =>$v)
		{
		   	$arr = $v['address_components'];
			$add = $v["formatted_address"];
			$newtext = explode(" ",$add);
			$long_name = $arr[1]["long_name"];
			$short_name = $arr[3]["short_name"];
			$zip = $newtext[1];
			
			$name = ucfirst($organisation_location_type).", ".$long_name.", ".$short_name." ".$zip;
			
		}
		if($name){
			$data = $name;
		}
		else{
			$data = 'error';
		}
		echo json_encode($data);die;
    }
    
    public function check_email_availability() {
        
        if($this->input->post('email') != '') {
            $email = $this->input->post('email');
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo 'Please enter valid email';
            } else {
                $check_email = $this->login_model->check_email($email);
                if($check_email == 0) {
                    echo 'No available';
                } else {
                    echo 'Available';
                }
            }
            
        }
    }
    
	public function verify_email()
	{
		 $user_id = base64_decode($this->input->get("verify"));//$loginId;
		 $type =  base64_decode($this->input->get("type"));
		 $verify = $this->login_model->verify_email($user_id,$type);
		
	     $this->session->set_userdata("verfy_email",$user_id);
		 if($verify == 0)
		 {
			$this->session->set_flashdata("successmsg","Your email has been successfully verified");
		 }
		 else{
			$this->session->set_flashdata("successmsg","Your email has been already verified please login!");
		 }
		redirect(base_url()."home");
	}
	
	
    public function add_user_to_database() {
        $check = $this -> input -> post("account_type");
        if($check == 'organisation') {
          
            $arr["name"] = $this -> input -> post("organisation_name");
            $arr["location"] = $this -> input -> post("organisation_location_type");
            $arr["registration_number"] = clean($this -> input -> post("organisation_no"));
            $arr["contact_office"] = clean($this -> input -> post("organisation_contact_office"));
            $arr["email"] = $this -> input -> post("organisation_email");
            $arr["person_in_charge"] = $this -> input -> post("organisation_person_incharge");
            $arr["postal_code"] = $this -> input -> post("organisation_postal_code");
            $arr["address"] = clean($this -> input -> post("organisation_address"));
            $arr["unit_f"] = clean($this -> input -> post("organisation_unit_f"));
            $arr["unit_l"] = clean($this -> input -> post("organisation_unit_l"));
            $arr["username"] = clean($this -> input -> post("organisation_username"));
            $arr["password"] = clean($this -> input -> post("organisation_password"));
            $arr["newsletter"] = clean($this -> input -> post("organisation_newsletter"));
            $arr["status"] = 0;
            $arr["created_time"] = time();
            // $arr["payment_type"] = clean($this -> input -> post("payment_type"));
            // $arr["cc_number"] = clean($this -> input -> post("cc_number"));
            // $arr["cv_number"] = clean($this -> input -> post("cv_number"));
            // $arr["exp_date"] = clean($this -> input -> post("exp_date"));
            // $arr["exp_year"] = clean($this -> input -> post("exp_year"));
            if($this -> login_model -> add_organisation_user($arr))
			{
				$arr2["user_id"] = $this->db->insert_id();
				//$this -> login_model -> add_meta_user($arr2);
				$type = base64_encode('organisations');
				$emailarr["to"] = $arr["email"];
				$emailarr["subject"] = "Sign Up Verification Notification";

				$emailarr["message"] = "<p>Hi ".$arr['name']."</p>
				<p>Welcome to ".$this->config->item("sitename")."</p> 
				<p>We are glad you signed up for your user account. Once you confirm your email address through the link below, you are all set to build your profile.</p>
				<p>Please click on the link below to be redirected to your recently created ".$this->config->item("sitename")." profile.</p>
				<p>".base_url()."logins/verify_email/?verify=".base64_encode($arr2["user_id"])."&type=".$type."</p>
				<p>We hope you have an enjoyable experience with us.</p>
				<p>Best Wishes,</p>
				<p>".$this->config->item("sitename")." Team</p>";
				
				$this->email_model->sendIndividualEmail($emailarr); 
				$err=0;
				$this->session->set_flashdata("successmsg","Your account was successfully created. Please check your inbox for a confirmation email.");
				$this->session->unset_userdata('tempdata');
				redirect(base_url()."cause/");
			}
			else
			{
				$this->session->set_flashdata("errormsg","There was error in adding this user.");
				$err=1;
			}
            
        } 
		elseif($check == 'personal') {
			
            $arr["name"] = $this -> input -> post("personal_full_name");
            $arr["nationality"] = $this -> input -> post("personal_nationality");
            $arr["identification_type"] = clean($this -> input -> post("personal_identification_type"));
            $arr["identification_number"] = clean($this -> input -> post("personal_identification_number"));
            $arr["gender"] = clean($this -> input -> post("personal_gender"));
            $arr["contact_hp"] = clean($this -> input -> post("personal_contact_hp"));
            $arr["contact_home"] = clean($this -> input -> post("personal_contact_home"));
            $arr["contact_office"] = $this -> input -> post("personal_contact_office");
            $arr["email"] = $this -> input -> post("personal_email");
            $arr["postal_code"] = clean($this -> input -> post("personal_postal_code"));
            $arr["address"] = clean($this -> input -> post("personal_address"));
            $arr["unit_f"] = clean($this -> input -> post("personal_unit_f"));
            $arr["unit_l"] = clean($this -> input -> post("personal_unit_l"));
            $arr["username"] = clean($this -> input -> post("personal_username"));
            $arr["password"] = clean($this -> input -> post("personal_password")); 
            $arr["newsletter"] = clean($this -> input -> post("personal_newsletter")); 
            $arr["status"] = 0;
            $arr["created_time"] = time();
            $personal_date = clean($this -> input -> post("personal_date"));
            $personal_month = clean($this -> input -> post("personal_month"));
            $personal_year = clean($this -> input -> post("personal_year"));
            
			$arr['d_o_b'] = $personal_year.'-'.$personal_month.'-'.$personal_date;
            // $arr["payment_type"] = clean($this -> input -> post("payment_type"));
            // $arr["cc_number"] = clean($this -> input -> post("cc_number"));
            // $arr["cv_number"] = clean($this -> input -> post("cv_number"));
            // $arr["exp_date"] = clean($this -> input -> post("exp_date"));
            // $arr["exp_year"] = clean($this -> input -> post("exp_year"));
            if($this -> login_model -> add_personal_user($arr))
			{
				$arr2["user_id"] = $this->db->insert_id();
				//$this -> login_model -> add_meta_user($arr2);
				$type = base64_encode('user');
				
				$emailarr["to"] = $arr["email"];
				$emailarr["subject"] = "Sign Up Verification Notification";

				$emailarr["message"] = "<p>Hi ".$arr['name']."</p>
				<p>Welcome to ".$this->config->item("sitename")."</p> 
				<p>We are glad you signed up for your user account. Once you confirm your email address through the link below, you are all set to build your profile.</p>
				<p>Please click on the link below to be redirected to your recently created ".$this->config->item("sitename")." profile.</p>
				<p>".base_url()."logins/verify_email/?verify=".base64_encode($arr2["user_id"])."&type=".$type."</p>
				<p>We hope you have an enjoyable experience with us.</p>
				<p>Best Wishes,</p>
				<p>".$this->config->item("sitename")." Team</p>";
				
				$this->email_model->sendIndividualEmail($emailarr); 
				$err=0;
				$this->session->set_flashdata("successmsg","Your account was successfully created. Please check your inbox for a confirmation email.");
				$this->session->unset_userdata('tempdata');
				redirect(base_url()."cause/");
			}
			else
			{
				$this->session->set_flashdata("errormsg","There was error in adding this user.");
				$err=1;
			}
		}
	 }

        public function logout() {
            $this->session->sess_destroy();
            redirect(base_url());
        }
		
		public function fb()
		{
		// Create our Application instance (replace this with your appId and secret).
		$facebook = new Facebook(array(
		  'appId'  => $this->config->item('App_ID'),
		  'secret' => $this->config->item('App_Secret'),
		  'cookie' => true
		));
		
		if(isset($_GET['logout']))       
		{
			$url = 'https://www.facebook.com/logout.php?next=' . urlencode('http://demo.phpgang.com/facebook_login_graph_api/') .
			  '&access_token='.$_GET['tocken'];
			session_destroy();
			header('Location: '.$url);
		}
		if(isset($_GET['fbTrue']))
		{
			$token_url = "https://graph.facebook.com/oauth/access_token?"
			   . "client_id=".$this->config->item('App_ID')."&redirect_uri=" . urlencode($this->config->item('callback_url'))
			   . "&client_secret=".$this->config->item('App_Secret')."&code=" . $_GET['code']; 
		
			 $response = file_get_contents($token_url);
			 $params = null;
			 parse_str($response, $params);
		
			 $graph_url = "https://graph.facebook.com/me?access_token=" 
			   . $params['access_token'];
		
			 $user = json_decode(file_get_contents($graph_url));
			 $extra = "<a href='index.php?logout=1&tocken=".$params['access_token']."'>Logout</a><br>";   
			 
			// $content = $user;
			 $content=array();
			 $content['id'] = $user->id;
			 $content['email'] = $user->email;
			 $content['first_name'] = $user->first_name;
			 $content['gender'] = $user->gender;
			 $content['last_name'] = $user->last_name;
			 $content['locale'] = $user->locale;
			 $content['name'] = $user->name;
			 $content = $this->session->set_userdata("fb_data",$content);
			 
		}
		else
		{
			$content = '<a href="https://www.facebook.com/dialog/oauth?client_id='.$this->config->item('App_ID').'&redirect_uri='.$this->config->item('callback_url').'&scope=email,user_likes,publish_stream"><img src="'.base_url().'images/login_facebook.jpg" alt="Sign in with Facebook"/></a>';
		}
	     
		 $data["facebook_data"]  =  $content;
		 $data["item"] = "Fb login";
		 $data["master_title"] = "Fb login | ".$this->config->item('sitename');
		 $data["master_body"] = "register";
		 debug($data);die;
		 $this->load->theme('home_layout',$data);
		}
}
?>