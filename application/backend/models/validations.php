<?php 
class validations extends CI_Model {
 
    function __construct(){
        parent::__construct();
    }
//validate change password data	
	public function validate_change_password($arr){
		if($arr["oldpassword"]==""){
			$this->session->set_flashdata("errormsg","Please enter Current password");	
			$err=1;	
		}	
		else if($arr["newpassword"]==""){
			$this->session->set_flashdata("errormsg","Please enter new password");	
			$err=1;	
		}
		else if(preg_match('/[#$@%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/',$arr["newpassword"])){
			$this->session->set_flashdata("errormsg","Spacial characters are not allowed in new password");
			$err=1;	
		}
		else if(strlen($arr["newpassword"]) < 5 || strlen($arr["newpassword"]) > 10){
			$this->session->set_flashdata("errormsg","Your password must be between 5 and 10 characters long ");
			$err=1;	
		}
		else if($arr["confirmnewpassword"]==""){
			$this->session->set_flashdata("errormsg","Please confirm your password");	
			$err=1;	
		}
		else if(preg_match('/[#$@%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/',$arr["confirmnewpassword"])){
			$this->session->set_flashdata("errormsg","Spacial characters are not allowed in confirm password");
			$err=1;	
		}
		else if($arr["confirmnewpassword"]!=$arr["newpassword"]){
			$this->session->set_flashdata("errormsg","new password and confirm password should match.");	
			$err=1;	
		}
		else{
			$err=0;	
		}
		if($err==0){
			return true;	
		}
		else{
			return false;	
		}
	}
	
	
		
	/******************************************Profile validation starts ****************************************/
	public function validatepasswords($arr)
	{
		if($arr["oldpassword"]=="")
		{
			$this->session->set_flashdata("errormsg","Please enter old password");	
			$err=1;	
		}	
		else if($this->common->checkpasswordvalidity($arr))
		{
			$this->session->set_flashdata("errormsg","Wrong old password");	
			$err=1;	
		}
		else if($arr["newpassword"]=="")
		{
			$this->session->set_flashdata("errormsg","Please enter new password");	
			$err=1;	
		}
		else if(preg_match('/[#$@%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/',$arr["newpassword"]))
		{
			$this->session->set_flashdata("errormsg","Spacial characters are not allowed in new password");
			$err=1;	
		}
		else if(strlen($arr["newpassword"]) < 5 || strlen($arr["newpassword"]) > 15)
		{
			$this->session->set_flashdata("errormsg","Your password must be between 5 and 15 characters long ");
			$err=1;	
		}
		else if($arr["confirmnewpassword"]=="")
		{
			$this->session->set_flashdata("errormsg","Please confirm your password");	
			$err=1;	
		}
		
		else if($arr["newpassword"]!=$arr["confirmnewpassword"])
		{
			$this->session->set_flashdata("errormsg","Both passwords do not matches");	
			$err=1;	
		}
		else
		{
			$err=0;	
		}
		if($err==0)
		{
			return true;	
		}
		else
		{
			return false;	
		}
	}
	
	public function update_password($arr)
	{
		$err=0;
		if($arr["password"]=="")
		{
			$this->session->set_flashdata("errormsg","Please enter your password");
			$err=1;	
		}	
		else if($arr["confirmpassword"]=="")
		{
			$this->session->set_flashdata("errormsg","Please confirm your password");
			$err=1;	
		}
			
		
		if($err==0)
		{
			return true;	
		}
		else
		{
			return false;	
		}
	}

	/****************************** signup  validation ********************************/
		
	public function validate_userdata($arr){
		
		if($arr["email"] == "" ){
			$err=1;
			$this->session->set_flashdata("errormsg","Error : Please enter Email Id");	
		}
		else if(!$this->common->validate_email($arr["email"])){
			$err=1;
			$this->session->set_flashdata("errormsg","Error : Email should be valid");	
		}
		else if($arr["password"] == ""){
			$err=1;
			$this->session->set_flashdata("errormsg","Error : Please enter Password");	
		}
		else if(strlen($arr["password"]) < 5 || strlen($arr["password"]) > 15){
			$this->session->set_flashdata("errormsg","Error : Your password must be between 5 and 15 characters long ");
			$err=1;	
		}
		/*else if(!$this->common->check_name_availabilty($arr["name"],$arr["id"])){
			$err=1;
			$this->session->set_flashdata("errormsg","Error : User with this name id already exists");	
		}*/
		else if(!$this->common->check_email_availabilty($arr["email"],$arr["id"])){
			$err=1;
			$this->session->set_flashdata("errormsg","Error : User with this email id already exists");	
		}
		else{
			$err=0;
		}
		if($err == 1){
			return false;	
		}
		else{
			return true;	
		}
	}



	
	//validation for contact us page 
	public function validate_contact_request($arr){
		/*echo "<pre>";
		print_r($arr);*/	
		if($arr["name"]==""){
			$err=1;
			$this->session->set_flashdata("errormsg","Please enter your name");	
		}
		else if(preg_match('/[#$%^&*()+=\-\[\]\';,.\/{}|":<>?~\\\\]/', $arr["name"])){
			$this->session->set_flashdata("errormsg","Spacial characters are not allowed in name");
			$err=1;	
		}
		else if($arr["email"]==""){
			$err=1;
			$this->session->set_flashdata("errormsg","Please enter email");	
		}
		else if(!$this->common->validate_email($arr["email"])){
				$err=1;
				$this->session->set_flashdata("errormsg","Email should be valid");	
		}
		else if($arr["subject"]==""){
			$err=1;
			$this->session->set_flashdata("errormsg","Please enter subject");	
		}
		else if($arr["message"]==""){
			$err=1;
			$this->session->set_flashdata("errormsg","Please enter message");	
		}
		else{
			$err=0;
		}
		if($err==1)
		{
			return false;	
		}	
		else
		{
			return true;	
		}
	}
	public function validate_aboutus($arr){
		
		/*echo "<pre>";
		print_r($arr);die;*/
		
	   if($arr["page_content"] == ""){
			$this->session->set_flashdata("errormsg","Please enter page content");	
			$err=1;
		}
		else{
			$err=0;	
		}
		if($err==1)
		{
			return false;	
		}	
		else
		{
			return true;	
		}
	}
	
//for forget password
	public function validate_forgot_password($arr){
		$err=0;
		if($arr == ""){
			$this->session->set_flashdata("errormsg","Error : Please enter your email id");
			$err=1;	
		}
		else if(!$this->common->validate_email($arr)){
			$this->session->set_flashdata("errormsg","Error : Email you entered is not valid");
			$err=1;		
		}
		else if($this->common->check_email_availabilty($arr, '')){
				$this->session->set_flashdata("errormsg","Error : Email id not exist or your account not active, please enter correct email id ");
			    $err=1;		
		}
		else if(!$this->common->getuser_id_new($arr)){
				$this->session->set_flashdata("errormsg","Error : Your account is currently inactive. Please contact admin.");	
			    $err=1;		
		}
		
		if($err==0){
			return true;	
		}
		else{
			return false;	
		}
			
	}
  
	//for user manual on front panel after login
	public function validate_contact_details($arr){
		if($arr["name"]==""){
			$err=1;
			$this->session->set_flashdata("errormsg","Error : Please enter Name.");	
		}
		else if($arr["email"]==""){
			$err=1;
			$this->session->set_flashdata("errormsg","Error : Please enter Email.");	
		}
		else if(!$this->common->validate_email($arr["email"])){
			$err=1;
			$this->session->set_flashdata("errormsg","Error : Please enter correct Email.");	
		}
		/*else if($arr["subject"]==""){
			$err=1;
			$this->session->set_flashdata("errormsg","Error : Please enter Subject.");	
		}*/
		else if($arr["message"]==""){
			$err=1;
			$this->session->set_flashdata("errormsg","Error : Please enter Message.");	
		}
		
		if($err == 1){
			return false;	
		}
		else{
			return true;	
		}
	}


	public function validate_slideshow_data($slideshowarray = array()){
		
		
		if($slideshowarray["title"]=="" )
		{
			$this->session->set_flashdata("errormsg","Please enter title");
			$err=1;		
		}
		else if($slideshowarray["description1"]=="")
		{
			$this->session->set_flashdata("errormsg","Please enter discription 1");
			$err=1;		
		}
		else if($slideshowarray["description2"]=="")
		{
			$this->session->set_flashdata("errormsg","Please enter discription 2");
			$err=1;		
		}
		else if($slideshowarray["image"]==""  && $slideshowarray["id"]=="")
		{
			$this->session->set_flashdata("errormsg","Please select image");
			$err=1;		
		}
		else if(isset($slideshowarray["image"]) && $slideshowarray["image"]!="" && !in_array($this->common->get_extension($slideshowarray["image"]),$this->config->item("allowedimages")))
		{
			$this->session->set_flashdata("errormsg","File type is not valid");
			$err=1;	
		}
		else{
			$err=0;
		}
		if($err==1)
		{
			return false;	
		}	
		else
		{
			return true;	
		}
	}
	public function validate_sendnewsletter($arr){
		
		if($arr["type"] != "all" && $arr["type"] != "user"){
			$err=1;
			$this->session->set_flashdata("errormsg","Please select user type");	
		}
		else if($arr["type"] == "all"){
			
			if($arr["content"]==""){
				$err=1;
				$this->session->set_flashdata("errormsg","Please enter newsletter content");	
			}
			else {
				$err=0;
			}
			if($err==1)
			{
				return false;	
			}	
			else
			{
				return true;	
			}
		}
		else if($arr["type"] == "user"){
			if($arr["email"]==""){
				$err=1;
				$this->session->set_flashdata("errormsg","Please enter email");	
			}
			/*else if(!$this->common->validate_email($arr["email"])){
				$err=1;
				$this->session->set_flashdata("errormsg","Email should be valid");	
			}*/
			else if($arr["content"]==""){
				$err=1;
				$this->session->set_flashdata("errormsg","Please enter newsletter content");	
			}
			else {
				$err=0;
			}
			
			if($err==1)
			{
				return false;	
			}	
			else
			{
				return true;	
			}
		}
		
	}
}