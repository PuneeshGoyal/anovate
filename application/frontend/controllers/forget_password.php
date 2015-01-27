<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class forget_password extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("forgetpassword_model");
		$this->load->model('email_model');
		$this->load->model('common');
	}
	
	public function index()
	{
		$this->users_forget_password();
		
	}
	public function users_forget_password()
	{
		$is_logged_in = $this->session->userdata("is_logged_in");
		if($is_logged_in == false)
		{
			$data["item"]="Forget Password";
			$data["master_title"]="Forget Password";  
			$data['userdata']=$this->session->userdata("tempdata");
			$breadcrumb = array("Home" => "home","Choose Login"=>"logins/choose_login","Consumer login"=>"logins/user_login","Consumer Forget Password"=>"");
			$data['breadcrumb'] = $breadcrumb;
			$data["master_body"]="forget_password";
			$this->load->theme('home_layout',$data);	
		}
		else{
			redirect(base_url()."accounts/particulars/");
		}
	}
	public function forget_user_password(){
		
			$arr["email"] = clean($this->input->post("email"));
			
			if($arr["email"] == ''){
				if($this->uri->segment(3) != '') {
					$this->session->set_flashdata("errormsg1","Please enter the email address.");
				} else {
					$this->session->set_flashdata("errormsg","Please enter the email address.");
				}
			}
			else{
				$user_id = $this->common->getuser_id_new($arr["email"]); //print_r($user_id); die;
				if($user_id["id"] == ""){
					if($this->uri->segment(3) != '') {
						$this->session->set_flashdata("errormsg1","No such email found in our database");
					} else {
						$this->session->set_flashdata("errormsg","No such email found in our database");
					}
				}
				else{
					if($result = $this->forgetpassword_model->forgot_password($arr)){
						//print_r($result); die;
						//generate random password
						$username = '';
						if($this->uri->segment(3) != '') {
						   $username = '<p>Username: '.$result['username'].'</p>';
						}
						else{
							$var["password"] = $this->common->random_generator(6);
							$arr["password"] = $this->common->salt_password($var);//generate salted password  from random generated password
							$usertype = $this->session->userdata('usertype');
							/*debug($var);
							debug($arr);die;*/
							$this->forgetpassword_model->update_forgot_password($arr, $usertype);//update password to crossponding email
							$this->session->unset_userdata('usertype');                    
						}
						
						$emailarr["to"] = $arr["email"];
						if($this->uri->segment(3) != '') 
						{
							$emailarr['subject'] = "Your Forgotten Username \n";
							$emailarr["message"] = "<p>Dear ". stripcslashes($result['name'])."</p>
							<p>Your Login information as:</p>
							".$username."
							<p>Using the username, if you still not able to login into your account then contact our support</p>
							<p>Email: ".$this->config->item('adminemail')."</p>
							<p>Best Regards <br/>
							".$this->config->item('sitename')."</p>";
						}
						else 
						 {
							 $emailarr['subject'] = "Your Forgotten Password is \n";
							 $emailarr["message"] = "<p>Dear ". stripcslashes($result['name'])."</p>
							 <p>Your Login information as:</p>
							 ".$username."
							 <p>Password : ".$var["password"]."</p>
							 <p>Using the password, if you still not able to login into your account then contact our support</p>
							 <p>Email: ".$this->config->item('adminemail')."</p>
							 <p>Best Regards <br/>
							 ".$this->config->item('sitename')."</p>";
						}
						$this->email_model->sendIndividualEmail($emailarr); 
						$err=0;
						if($this->uri->segment(3) != '')
						{
							$this->session->set_flashdata("successmsg1","Your username has been sent to your email. please check inbox.");
						}
						else
						{
							$this->session->set_flashdata("successmsg","Your password has been sent to your email. Please check inbox.");
						}
						$this->session->unset_userdata('tempdata');
					}	
				}
			}
			redirect(base_url()."forget_password/users_forget_password");
		
	}
	
	public function forget_user_username(){
        $arr["email"] = clean($this->input->post("email"));
      	if($arr["username"]==''){
            $this->session->set_flashdata("errormsg","Please enter the email address.");
        }
        else{
            $user_id = $this->common->getuser_id_new($arr["email"]); //print_r($user_id); die;
            if($user_id["id"] == ""){
                $this->session->set_flashdata("errormsg","No such email found in our database");
            }
            else{
                if($result = $this->forgetpassword_model->forgot_password($arr)){
                   
                    $var["password"] = $this->common->random_generator(6);
                    $arr["password"] = $this->common->salt_password($var);//generate salted password  from random generated password
                    $usertype = $this->session->userdata('usertype');
                    $this->forgetpassword_model->update_forgot_password($arr, $usertype);//update password to crossponding email
                    $this->session->unset_userdata('usertype');                    
                    $emailarr["to"] = $arr["email"];
                    $emailarr['subject'] = "Your Forgotten Password is \n";
                    $emailarr["message"] = "<p>Dear ". stripcslashes($result['first_name'])." ". stripcslashes($result['last_name'])."</p>
                    <p>Your Login information as:</p>
                    <p>Password : ".$var["password"]."</p>
                
                    <p>Using the password, if you still not able to login into your account then contact our support</p>
                    <p>Email: ".$this->config->item('adminemail')."</p>
                    <p>Best Regards <br/>
                    ".$this->config->item('sitename')."</p>";
                    
                    $this->email_model->sendIndividualEmail($emailarr); 
                    $err=0;
                    $this->session->set_flashdata("successmsg","Your password has been sent to your email. Please check inbox.");
                    $this->session->unset_userdata('tempdata');
                }   
            }
        }
        redirect(base_url()."forget_password/users_forget_password");   
    }

}
