<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//http://www.sanwebe.com/2012/11/login-with-google-api-php
require_once APPPATH.'libraries/facebook/src/facebook.php';
//include google api files
require_once APPPATH.'libraries/gmail/src/Google_Client.php';
require_once APPPATH.'libraries/gmail/src/contrib/Google_Oauth2Service.php';

class Logins extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('email_model');
		$this->load->model('login_model');
	    $this->load->library('session');
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
		//$data["userdata"] = $this->session->set_userdata("tempdata", strip_slashes($login));
		
	    $data = $this->common->authenticateUserLogin($login);
		
		if($data)
		{
			$result = 'success';
		}
		else
		{	
			$result = 'error';
		}
		echo json_encode($result);
		die;
	}
	
    public function register() {
	
	    $is_logged_in = $this->session->userdata("is_logged_in");
		if($is_logged_in == false)
		{
			session_start();
			$google_client_id 		=  $this->config->item('google_client_id');
			$google_client_secret 	=  $this->config->item('google_client_secret');
			$google_redirect_url 	=  $this->config->item('google_redirect_url'); //path to your script
			$google_developer_key 	=  $this->config->item('google_developer_key');
	
			$data=array();
			$data["master_title"]="Register";
			$data["master_body"]="register";
			
			/*###################################################################### FACEBOOK SIGNUP STARTS###############################################################################*/
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
				 $content['fid'] = $user->id;
				 $content['email'] = $user->email;
				 $content['first_name'] = $user->first_name;
				 $content['gender'] = $user->gender;
				 $content['last_name'] = $user->last_name;
				 $content['locale'] = $user->locale;
				 $content['name'] = $user->name;
				 //debug($content);die;
				 $this->session->set_userdata("facebook_data",$content);
				 $data['content'] = '<div class="col-md-3 col-sm-6 col-xs-12 facebook "><a href="https://www.facebook.com/dialog/oauth?client_id='.$this->config->item('App_ID').'&redirect_uri='.$this->config->item('callback_url').'&scope=email,user_likes,publish_stream"><img src="'.base_url().'images/login_facebook.jpg" alt="Sign in with Facebook"/></a></div>'; //to show register button during signup
				 
				 $this->load->theme('home_layout',$data);//to load view during signup
			}
			else
			{//if not logged show signup button
				$data['content'] = '<div class="col-md-3 col-sm-6 col-xs-12 facebook "><a href="https://www.facebook.com/dialog/oauth?client_id='.$this->config->item('App_ID').'&redirect_uri='.$this->config->item('callback_url').'&scope=email,user_likes,publish_stream"><img src="'.base_url().'images/login_facebook.jpg" alt="Sign in with Facebook"/></a></div>'; 
			}
			
			/*###################################################################### FACEBOOK SIGNUP ENDS ###############################################################################*/
			
			/*###################################################################### G+ SIGNUP STARTS ###############################################################################*/
			
			$gClient = new Google_Client();
			$gClient->setApplicationName('Login to Crowd causes');
			$gClient->setClientId($google_client_id);
			$gClient->setClientSecret($google_client_secret);
			$gClient->setRedirectUri($google_redirect_url);
			$gClient->setDeveloperKey($google_developer_key);
			$google_oauthV2 = new Google_Oauth2Service($gClient);
			
			//If user wish to log out, we just unset Session variable
			if (isset($_REQUEST['reset'])) 
			{
			  unset($_SESSION['token']);
			  $gClient->revokeToken();
			  header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL)); //redirect user back to page
			}
			
			//If code is empty, redirect user to google authentication page for code.
			//Code is required to aquire Access Token from google
			//Once we have access token, assign token to session variable
			//and we can redirect user back to page and login.
			if (isset($_GET['code'])) 
			{ 
				$gClient->authenticate($_GET['code']);
				$_SESSION['token'] = $gClient->getAccessToken();
				header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL));
				return;
			}
			
			if (isset($_SESSION['token'])) 
			{ 
				$gClient->setAccessToken($_SESSION['token']);
			}
			
			if ($gClient->getAccessToken()) 
			{
				  //For logged in user, get details from google using access token
				  $user 				= $google_oauthV2->userinfo->get();
				  $user_id 				= $user['id'];
				  $user_name 			= filter_var($user['name'], FILTER_SANITIZE_SPECIAL_CHARS);
				  $email 				= filter_var($user['email'], FILTER_SANITIZE_EMAIL);
				  $profile_url 			= filter_var($user['link'], FILTER_VALIDATE_URL);
				  $profile_image_url 	= filter_var($user['picture'], FILTER_VALIDATE_URL);
				  $personMarkup 		= "$email<div><img src='$profile_image_url?sz=40'></div>";
				  $_SESSION['token'] 	= $gClient->getAccessToken();
			}
			else 
			{
				//For Guest user, get google login url
				$authUrl = $gClient->createAuthUrl();
			}
			//debug($user);die;
			$gdata = array();
			if(isset($authUrl)) //user is not logged in, show login button
			{
				$data["google_data"] = '<div class=" col-md-9 col-sm-6 col-xs-12 google">
				<a class="login" href="'.$authUrl.'"><img src="'.base_url().'images/google.jpg" /></a></div>';
			} 
			else{
				//set session and load it into the view
				 $already_set = $this->session->userdata["register_gmail_data"]["id"];
				// $this->session->sess_destroy();
				 if(empty($already_set)){
					 $gdata['id'] =  $user_id;
					 $gdata['gid'] =  $user_id;
					 $gdata['email'] =  $email;
					 $gdata['name'] = $user_name;
					 $this->session->set_userdata("register_gmail_data",$gdata);
					 //If user wish to log out, we just unset Session variable
			   
					  unset($_SESSION['token']);
					  $gClient->revokeToken();
					  header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL)); //redirect user back to page
			
					// debug($this->session->userdata("register_gmail_data"));die;
					 $data["google_data"] = '<div class=" col-md-9 col-sm-6 col-xs-12 google">
					<a class="login" href="'.$authUrl.'"><img src="'.base_url().'images/google.jpg" /></a></div>';//to show google sign up button during signup
				 }
				 else
				 {
					//  $data["google_data"]='already set';
					 // $this->session->unset_userdata("register_gmail_data");
				 }
			}
						/*###################################################################### G+ SIGNUP ENDS ###############################################################################*/
			 $this->load->theme('home_layout',$data);
		
		}
		else{
			redirect(base_url()."accounts/particulars/");
		}
    }
    
    public function check_username_availability() {
        
        if($this->input->post('username') != '') {
                
            $username = $this->input->post('username');
			
			if(!preg_match('/^[A-Za-z0-9._-]{3,34}$/',$username)){
				echo 'error';
			}
			else{
			
				$check_user = $this->login_model->check_username($username);
				if($check_user == 0) {
					echo 'No available';
				} else {
					echo 'Available';
				}
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
			$this->session->set_flashdata("email_successmsg","Your email has been successfully verified");
			$this->session->unset_userdata('verfy_email');//unset session userid after verification
		 }
		 else{
			$this->session->set_flashdata("email_successmsg","Your email has been already verified please login!");
			$this->session->unset_userdata('verfy_email');//unset session userid after verification
		 }
		redirect(base_url()."home/?q=true");
	}
	
	
    public function add_user_to_database() {
		//$check = $this->session->userdata("register_user_type"); 
		$check = trim($this->input->post("register_user_type"));
		//$this->session->set_userdata("register_user_type",$check);
		//debug($this->input->post());die;
        if($check == 'organisation') {
            $arr["fid"] = $this -> input -> post("fid");
			$arr["gid"] = $this -> input -> post("gid");
            $arr["name"] = $this -> input -> post("organisation_name");
            $arr["location"] = $this -> input -> post("organisation_location_type");
			$arr["organisation_type"] = $this -> input -> post("organisation_type");
			$arr["organisation_ipc_no"] = $this -> input -> post("organisation_ipc_no");
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
			
			//debug($arr);die;
            $insert = $this-> login_model->add_organisation_user($arr);
		    
            if($insert==1)
			{
				$arr2["user_id"] = $this->db->insert_id();
				$email = $arr["email"];
				$onsite_data = array('login_userid' => $arr2["user_id"],'email' => $email);
				
				$this->session->set_userdata("signup_userdata",$onsite_data);
				$this->session->unset_userdata('tempdata');
				$this->session->unset_userdata('facebook_data');//unset facebook data
				$this->session->unset_userdata('register_gmail_data');//unset facebook data
				
				redirect(base_url().$this->router->class."/register/?return=true");
			}
			else
			{
				$this->session->set_flashdata("signup_errormsg","There was error in adding this user.");
				redirect(base_url().$this->router->class."/register/?return=false");
			}
        } 
		
		else if($check == 'personal') {
			
			$arr["fid"] = $this -> input -> post("fid");
			$arr["gid"] = $this -> input -> post("gid");
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
            
		
			$insert = $this->login_model->add_personal_user($arr);
			
            if($insert == 1)
			{
				$arr2["user_id"] = $this->db->insert_id();
				$email = $arr["email"];
				
				$onsite_data = array('login_userid' => $arr2["user_id"],'email' => $email);
				$this->session->set_userdata("signup_userdata",$onsite_data);
				$this->session->unset_userdata('tempdata');
				$this->session->unset_userdata('facebook_data');//unset facebook data
				$this->session->unset_userdata('register_gmail_data');//unset google data
				
				redirect(base_url().$this->router->class."/register/?return=true");
			}
			else
			{
				$this->session->set_flashdata("signup_errormsg","There was error in adding this user.");
				redirect(base_url().$this->router->class."/register/?return=false");
			}
		}
	 }

        public function logout() {
            $this->session->sess_destroy();
            redirect(base_url());
        }
		
		public function fb()
		{
		 $data["item"] = "Fb login";
		 $data["master_title"] = "Fb login | ".$this->config->item('sitename');
		 $data["master_body"] = "register";
		//debug($data);die;
		 $this->load->theme('home_layout',$data);
		}
		
		public function setUserType()
		{
			$name='';
			$type = trim($this->input->get("user_type"));
			if(!empty($type)){
				$this->session->set_userdata("register_user_type",$type);
				echo $this->session->userdata("register_user_type");
				die;
			}
		}
		
		public function send_email()
		{
			//debug($this->session->userdata);die;
			$signup_userdata = array();
			$signup_userdata  =  ($this->session->userdata('signup_userdata'));
			$user_id = $signup_userdata["login_userid"];
			$user_email = $signup_userdata["email"];
            $user_type = ($this->session->userdata('register_user_type'));
			
			$emailarr["to"] = $user_email;
			$emailarr["subject"] = "Sign Up Verification Notification";
			$txt = 'logins/verify_email/?verify='.base64_encode($user_id)."&type=".base64_encode($user_type).'';
			$link = '<a href='.base_url().$txt.'>'.base_url().$txt.'</a>';
			$emailarr["message"] = "<p>Hi ".$arr['name']."</p>
			<p>Welcome to ".$this->config->item("sitename")."</p> 
			<p>We are glad you signed up for your user account. Once you confirm your email address through the link below, you are all set to build your profile.</p>
			<p>Please click on the link below to be redirected to your recently created ".$this->config->item("sitename")." profile.</p>
			<p>".$link."</p>
			<p>We hope you have an enjoyable experience with us.</p>
			<p>Best Wishes,</p>
			<p>".$this->config->item("sitename")." Team</p>";
			
			
			//debug($emailarr);die;
			$email_send = $this->email_model->sendIndividualEmail($emailarr); //send email ro the users
			if($email_send == 0)
			{
				$this->session->unset_userdata('signup_userdata');//unset session userid after inserting to database
				$this->session->unset_userdata('register_user_type');//unset signup user type
				$result['status'] = 'success';
				$result['msg'] = 'Your account was successfully created. Please check your inbox for a confirmation email.';
			}
			else 
			{
				$result['status'] = 'error';
				$result['msg'] = 'There is an error to update database please contact to admin.';
			}
			echo json_encode($result);die;
		}
		
}
?>