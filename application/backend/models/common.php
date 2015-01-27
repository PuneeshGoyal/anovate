<?php 
class common extends CI_Model {
    function __construct(){
        parent::__construct();
		$http="";
		if(isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"]=="on"){
			$http="http://";	
		}
		else{
			$http="https://";	
		}
		$prevurl=array("prevurl"=>base_url());
		$this->session->set_userdata($prevurl);
		$this->session->set_userdata("currenturl",base_url());
	}
	public function get_extension($file_name){
		$ext = explode('.', $file_name);
		$ext = array_pop($ext);
		return strtolower($ext);
	}
	public function get_video_id_from_url($channel)
	{
		$start=strpos($channel,"?v=")+3;
		$length=strlen($channel);
		$channel=substr($channel,$start,$length);
		$channeldata=explode("&",$channel);
		$channeldata=$channeldata[0];
		return $channeldata;
	}
	public function get_extensions($file_name = NULL){
		$ext1 = explode('.', $file_name);
		$ext = array_pop($ext1);
		//print_r($this->config->item("allowedimages"));die;
		if(!in_array($ext,$this->config->item("allowedimages"))){
			$this->session->set_flashdata("errormsg","Wrong file format only jpg,png,gif allowded");
		}
		else{
			
			return strtolower($ext);
		}
	}
	
	public function get_extensions_attachement($file_name = NULL){
		$ext1 = explode('.', $file_name);
		$ext = array_pop($ext1);
		//print_r($this->config->item("allowedimages"));die;
		if(!in_array($ext,$this->config->item("alloweddocs"))){
			$this->session->set_flashdata("errormsg","Wrong file format only doc, docx allowded");
		}
		else{
			
			return strtolower($ext);
		}
	}
	
/// for random genrator text	
	public function generate_transaction_number($digits=6){
		srand((double) microtime() * 10000000);
		$input = array("A", "B", "C", "D", "E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","a", "b", "c", "d", "e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
		$random_generator="";
		for ($i=1; $i<=$digits; $i++){
			if(rand(1,2) == 1){
				$rand_index = array_rand($input);
				$random_generator .=$input[$rand_index];
			}
			else{
				$random_generator .=rand(1,9);
			}
		}
   		return $random_generator;	
	}
	
	public function convert_date($arr){
		    $from_data=explode('/',$arr);
			$from = strtotime($from_data[1]."-".$from_data[0]."-".$from_data[2]." "."00:00:00");
            return $from;
	 }
	function validate_email($email = NULL){
		return filter_var($email, FILTER_VALIDATE_EMAIL);	
	}
	
	//to check login status
	public function check_authentication() {

        $controllername = $this->router->class;
        $methodname = $this->router->method;

        if (($controllername == "login") && $methodname != "logout") {
            $username = $this->session->userdata("username");
            if (isset($username) && $username != "") {
                redirect(base_url() . "dashboard");
            }
        }

        if ($controllername != "login") {
            // echo $this->config->item("usertype");die;
            if ($this->config->item("usertype") == "admin") {
                $this->db->select("username");
                $this->db->from("admin");
                $query = $this->db->get();
                $resultset = $query->row_array();
                //debug($resultset);
                //echo $this->session->userdata("username");
                //	echo $this->db->last_query();die;
                if ($resultset["username"] != $this->session->userdata("username")) {
                    $this->session->set_flashdata("errormsg", "Please login to access admin panel first");
                    redirect(base_url() . "login/");
                }
            }
        }
    }
	public function checkpasswordvalidity($arr = NULL)
	{
		$this->db->select("*");
		$this->db->from("admin");
		$this->db->where("username",$this->session->userdata("username"));
		$query = $this->db->get();
		//echo $this->db->last_query();die;
		$result = $query->row_array();
		
		if($this->validateHash($arr["oldpassword"],$result["password"])){
			return false;	
		}	
		else{
			return true;	
		}
	}
	
	//update user profile data
	public function update_profile($arr = NULL)
	{
		//2736f2f2cb760b84488b342f26e6210e:xl
		$newarr["password"] = $this->salt_password(array("password" => $arr["newpassword"]));
		if(isset($arr["username"]) && $arr["username"]!="")
		{
			$newarr["username"] = $arr["username"];
		}
		return $this->db->update("admin",$newarr);
	}
	
	//remove parameter from url
	public function removeUrl($parametername = NULL,$querystring = NULL)
	{
		$newquerystring="";
		$querystring=explode("&",$querystring);
			
		foreach($querystring as $key=>$val)
		{
			$newval=explode("=",$val);
			if($newval[0]!="")
			{
				if($newval[0]!=$parametername)
				{
					$newquerystring.="&".$newval[0]."=".$newval[1];	
				}
			}
		}		
		
		$newquerystring=substr($newquerystring,1,strlen($newquerystring));
		
		return $newquerystring;
	}
	
	public function addUrl($parametername = NULL,$parametervalue = NULL,$querystring = NULL)
	{
		
		//echo $parametername."=".$parametervalue;		
		$querystring=explode("&",$querystring);
		$newquerystring="";
		$i=0;
		if(count($querystring)!=0 && $querystring[0]!="")
		{
			foreach($querystring as $key=>$val)
			{
					$valnew=explode("=",$val);
					if($valnew[0]!=$parametername)
					{
						$newquerystring.="&".$valnew[0]."=".$valnew[1];
					}
					else
					{
						$newquerystring.="&".$parametername."=".$parametervalue;	
						$i=1;
					}
			}
		}
		if($i==0)
		{
				$newquerystring.="&".$parametername."=".$parametervalue;
		}
		return $newquerystring=substr($newquerystring,1,strlen($newquerystring));
	}
	
	//to check user login status 	
	public function is_logged_in(){
		
   		 $is_logged_in = $this->session->userdata('is_logged_in');
		 if($is_logged_in != true){
			$this->session->set_flashdata("errormsg","Authentication failed. You need to login to access this page");
			redirect(base_url());
			//return false;
       		// echo 'You need to login to access this page';
       		 //die();
  		 }
		 else{
			  // $this->db->select("*");
			  // $this->db->from("users"); 
			  // $this->db->where(array("id"=>$this->session->userdata("userid"),"archive <>"=>"1"));
			  // $result=$this->db->get();
			  // $row=$result->row_array();
			  // $num_row = $result->num_rows();
// 		     
		      // $err=0;
			  // if($num_row == 0){
			  	 // $err =1; 
			  // }
			  // else
			  // {
				  // $data_array= array("userid" => $row['id']);
				  // $this->session->set_userdata($data_array);
				  // $err=0;
			  // }
			  // if($err==1)
			  // {
			   // redirect(base_url()."users/sign_in");
			  // }
		 }
	}
	
	
	//login user and set session
	public function authenticateUserLogin($loginarray = array()){
		$result=array();
		
		$this->db->select("*");
		$this->db->from("users");
		$this->db->where(array("username" => $loginarray["username"], "status" => "1"));
		$query = $this->db->get();
		$countrows = $query->num_rows();
		//echo $this->db->last_query();die;
		$result = $query->row_array();
		$result["status"]='';
		
		if($countrows == '0')
		{
			$this->db->select("*");
			$this->db->from("organisations");
			$this->db->where(array("username" => $loginarray["username"], "status" => "1"));
			$query = $this->db->get();
			//echo $this->db->last_query();die;
			$countrows = $query->num_rows();
			$result = $query->row_array();
			
			if($countrows == 0)
			{
				return false;	
			}
			else
			{
				if($this->validateHash($loginarray["password"],$result["password"]))
                {
                    $this->session->set_userdata("userid",$result["id"]);
                    $this->session->set_userdata("name",$result["name"]);
                    $this->session->set_userdata("username",$result["username"]);
					$this->session->set_userdata("email",$result["email"]);
					$this->session->set_userdata("address",$result["address"]);
					$this->session->set_userdata("phone_number",$result["contact_office"]);
                    $this->session->set_userdata("is_logged_in",true);
                    $this->session->set_userdata("user_type",'organisation');
					$this->session->set_userdata("registration_number",$result["registration_number"]);
					$this->session->set_userdata("contact_office",$result["contact_office"]);
                    return true;
                }
                else{
                    return false;
                }
			}
		}
		else
		{
			//login the user that is a personal user
			if($this->validateHash($loginarray["password"],$result["password"]))
			{
				$this->session->set_userdata("userid",$result["id"]);
				$this->session->set_userdata("name",$result["name"]);
				$this->session->set_userdata("username",$result["username"]);
				$this->session->set_userdata("email",$result["email"]);
				$this->session->set_userdata("address",$result["address"]);
				$this->session->set_userdata("gender",$result["gender"]);
				$this->session->set_userdata("phone_number",$result["contact_home"]);
				$this->session->set_userdata("d_o_b",$result["d_o_b"]);
				$this->session->set_userdata("is_logged_in",true);
                $this->session->set_userdata("user_type",'personal');
				$this->session->set_userdata("nationality",$result["nationality"]);
				$this->session->set_userdata("identification_type",$result["identification_type"]);
				$this->session->set_userdata("identification_number",$result["identification_number"]);
				$this->session->set_userdata("contact_hp",$result["contact_hp"]);
				return true;
			}
            else{
                return false;
            }
		}
	}
	
	
	public function logins_fb_user_login($loginarray = array()){
		$result=array();
		
		$this->db->select("*");
		$this->db->from("users");
		$this->db->where(array("email" => $loginarray["email"], "status" => "1"));
		$query = $this->db->get();
		$countrows = $query->num_rows();
		//echo $this->db->last_query();die;
		$result = $query->row_array();
				
		if($countrows == '0')
		{
			$this->db->select("*");
			$this->db->from("organisations");
			$this->db->where(array("email" => $loginarray["email"], "status" => "1"));
			$query = $this->db->get();
			//echo $this->db->last_query();die;
			$countrows = $query->num_rows();
			$result = $query->row_array();
			
			if($countrows == 0)
			{
				return false;	
			}
			else
			{
				$this->session->set_userdata("userid",$result["id"]);
				$this->session->set_userdata("name",$result["name"]);
				$this->session->set_userdata("username",$result["username"]);
				$this->session->set_userdata("email",$result["email"]);
				$this->session->set_userdata("address",$result["address"]);
				$this->session->set_userdata("phone_number",$result["contact_office"]);
				$this->session->set_userdata("is_logged_in",true);
				$this->session->set_userdata("user_type",'organisation');
				$this->session->set_userdata("registration_number",$result["registration_number"]);
				$this->session->set_userdata("contact_office",$result["contact_office"]);
				return true;
			}
		}
		else
		{
			//login the user that is a personal user
			$this->session->set_userdata("userid",$result["id"]);
			$this->session->set_userdata("name",$result["name"]);
			$this->session->set_userdata("username",$result["username"]);
			$this->session->set_userdata("email",$result["email"]);
			$this->session->set_userdata("address",$result["address"]);
			$this->session->set_userdata("gender",$result["gender"]);
			$this->session->set_userdata("phone_number",$result["contact_home"]);
			$this->session->set_userdata("d_o_b",$result["d_o_b"]);
			$this->session->set_userdata("is_logged_in",true);
			$this->session->set_userdata("user_type",'personal');
			$this->session->set_userdata("nationality",$result["nationality"]);
			$this->session->set_userdata("identification_type",$result["identification_type"]);
			$this->session->set_userdata("identification_number",$result["identification_number"]);
			$this->session->set_userdata("contact_hp",$result["contact_hp"]);
			return true;
		}
	}
//for user login

	public function login_check_user_login($data){
		 $login["email"]=trim($data['email']);	
		 $login["password"]=trim($data['password']);
		 $this->session->set_flashdata("tempdata",$login);
		 if($this->common->authenticateUserLogin($login)){
				redirect(base_url()."user/dashboard");
		}
		else{	
			redirect(base_url()."home/login");
		}
	}
	
	public function get_age($birth_date){
	 	return floor((time() - strtotime($birth_date))/31556926);
	}
	 
	//make encrypted. password
	public function salt_password($arr = NULL){
		//print_r($arr["password"]);die;
		 $salt_key = $this->common->random_generator(2);
		 $pas = md5($salt_key. $arr["password"]);
		 $column = ':';
		 return $pas.$column.$salt_key;
	}
	
	public function validateHash($password = NULL, $hash = NULL)
	{
		$hashArr = explode(':', $hash);
		if(md5($hashArr[1].$password) === $hashArr[0])
		{
			//echo "matched";die;
			return true;	
		}
		else
		{
			//echo "not matched";die;
			return false;	
		}
	}
	
	//to empty session values
	public function empty_filed()
	{
		return  $this->session->unset_userdata('tempdata'); 
	}
	
	public function random_generator($digits = NULL){
    // function starts
		srand((double) microtime() * 10000000);
		$input = array("A", "B", "C", "D", "E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","a", "b", "c", "d", "e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
		$random_generator="";
		// Initialize the string to store random numbers
		for ($i=1; $i<=$digits; $i++) {
			// Loop the number of times of required digits
			if (rand(1,2) == 1) {
				// to decide the digit should be numeric or alphabet
				// Add one random alphabet
				$rand_index = array_rand($input);
				$random_generator .=$input[$rand_index];
				// One char is added
			} else {
				// Add one numeric digit between 1 and 9
				$random_generator .=rand(1,9);
				// one number is added
			}
			// end of if else
		}
		// end of for loop
		return $random_generator;
	}
	
///===================================================================================================/
	public function get_time_stamp($date = NULL){
		$date=explode("-",$date);
		$date=$date[2]."-".$date[1]."-".$date[0];//d-m-y
		$time=strtotime($date);
		return $time;	
	}
	
	public function get_date_time($date_time){
		$posted_date=array();
		$posted_date_time=array();
		
		$posted_date_time = explode(" ",$date_time);
		$posted_date = explode("/",$posted_date_time[0]);
		$posted_time = explode(":",$posted_date_time[1]);
		$starttime = $posted_date[0]."-".$posted_date[1]."-".$posted_date[2]." ".$posted_time[0].":".$posted_time[1].":00 ".$posted_date_time[3];
		$result = strtotime($starttime);
		//$result = mktime($posted_time[0],$posted_time[1],0,$posted_date[1],$posted_date[0],$posted_date[2],$posted_date_time[2]);
		return $result;
	}
	
//for get user id	
	public function getuser_id($email){
		//echo $email;die;
	     $this->db->select("*");
		 $this->db->from("volunteer");
		 $this->db->where(array("email"=>$email,"status =" => 1));
	     $query=$this->db->get();
		// echo $this->db->last_query();
	  //  echo var_dump($this->db->queries);
	 	 $countrows=$query->num_rows();
		//echo $countrows;
		if($countrows==0){
			
			$results = $query->row_array();
			if($results["status"] == 0){
				$arr["id"]=$results["id"];
				$arr["name"]=$results["name"];
				$arr["email"]=$results["email"];
				$arr["password"]=$results["password"];
				return $arr;	
			}
			else{
				$this->session->set_flashdata("errormsg","Your account is currently inactive. Please contact admin.");	
				return false;
			}
		}
		else{
			$result=$query->row_array();
			if($result["status"]=="1"){
				 $arr["id"]=$result["id"];
		        // $arr["user_name"]=$result["firstname"]." ".$result["lastname"];
		         $arr["email"]=$result["email"];
				 $arr["name"]=$result["name"];
				  $arr["username"]=$result["username"];
				 $arr["password"]=$result["password"];
				 return $arr;	
			}
			/*else{
				$this->session->set_flashdata("errormsg","Your account is currently inactive. Please contact admin.");	
				return false;
			}*/
		}
	}
	//get user data	
public function getuser_id_new($email){
		//echo $email;die;
	     $this->db->select("*");
		 $this->db->from("users");
		 $this->db->where(array("email"=>$email,"status" => 1));
	     $query=$this->db->get();
         $resultset=$query->num_rows();
		 $result=$query->row_array();

         if($resultset==0){
			 $this->db->select("*");
			 $this->db->from("organisations");
			 $this->db->where(array("email"=>$email,"status" => 1));
			 $query=$this->db->get();
			 $resultset=$query->num_rows();
			 $result=$query->row_array();
			 
			 if($resultset==0) {
				 return false;
			 } else {
				 return $result;
			 }
	   	  }
		  else {
	       return $result;
	   	  }
	}

	
//check blog name already exists
	public function check_tag_name($arr = NULL){
		
		$this->db->select("tag");
		$this->db->from("tags");	
		
		if($arr["id"] == ""){
			$this->db->where(array("tag"=>$arr["tag"],"status <>" => "4"));
		}
		else{
			$this->db->where(array("tag"=>$arr["tag"],"status <>" => "4","id <>" => $arr["id"]));
		}
		$result=$this->db->get();
		$result=$result->result_array();
		//echo count($result);
		if(count($result)==0)
		{
			return true;	
		}
		else
		{
			return false;	
		}
	}
	//check information name already exists
	public function check_information_name($arr = NULL){
		
		$this->db->select("*");
		$this->db->from("informations");	
		
		if($arr["id"] == ""){
			$this->db->where(array("title"=>$arr["title"],"status <>" => "4"));
		}
		else{
			$this->db->where(array("title"=>$arr["title"],"status <>" => "4","id <>" => $arr["id"]));
		}
		$result=$this->db->get();
		$result=$result->result_array();
		//echo count($result);
		if(count($result)==0)
		{
			return true;	
		}
		else
		{
			return false;	
		}
	}
	//check information name already exists
	public function check_breed_name($arr = NULL){
		
		$this->db->select("*");
		$this->db->from("animal_breeds");	
		
		if($arr["id"] == ""){
			$this->db->where(array("name"=>$arr["name"],"status <>" => "4"));
		}
		else{
			$this->db->where(array("name"=>$arr["name"],"status <>" => "4","id <>" => $arr["id"]));
		}
		$result=$this->db->get();
		$result=$result->result_array();
		//echo count($result);
		if(count($result)==0)
		{
			return true;	
		}
		else
		{
			return false;	
		}
	}
// for get data by id
	public function get_data_passing_id($table, $id){ 
		$this->db->select("*");
		$this->db->from("$table");	
		$this->db->where(array("status"=>1,"archive <>" => "1", 'id' => $id));
		$this->db->order_by("name asc");
		$result=$this->db->get();
		// $this->db->last_query(); die;
		$c=$result->result_array();
		//echo print_r($c); 
		return $c;
	}


	
//for content pages data like login, signup, security
	public function getcontentpagedata($arr){
		//$resultset=$this->db->select("*")->from("contents")->get();
		$this->db->select("*");
		$this->db->from("content_pages");
		$this->db->where(array("page_name"=>$arr));
		$query=$this->db->get();
		//$this->db->last_query();
		return $resultset=$query->row_array();	
	}



//for header phone number and email id
	public function header_content_data(){
		$sql = "select contact_email, contact_number from content_pages where id=4";
		$query = $this->db->query($sql);
		$resultset=$query->row_array();	
		
		return $resultset;

	}
	
//for update logged in time
	public function last_login($table, $id){
		$this->db->where("id",$id);
		$noti['last_login'] = time();
		$result = $this->db->update("$table",$noti);
		//echo $this->db->last_query(); die;
		return $result;

	}
	
	  //show time in ago
	 public function convert_time_days($time){
	  
		  $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
		  $lengths = array("60","60","24","7","4.35","12","10");     
		  $now = time();     
		  $difference     = $now - $time;
		  $tense         = "ago";     
		  
		  for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
		   $difference /= $lengths[$j];
		  }     
		  
		  $difference = round($difference);     
		  if($difference != 1) {
		   	$periods[$j].= "s";
		  }     
		  return "$difference $periods[$j] ago ";   
	 }

	public function validate_forgot_email_exist($arr = NULL){
		
		$this->db->select('email');
		$this->db->from('users');
		if($arr["id"] == ""){
			$this->db->where(array("email" => $arr["email"],"archive <>" => "1"));
		}
		else{
			$this->db->where(array("email" => $arr["email"],"archive <>" => "1","id <>" => $arr["id"]));
		}
		$query = $this->db->get();
		//echo	$this->db->last_query();die;
		$resultset = $query->num_rows();
		
		if($resultset==0)
		{
			return false;
	    }
		else
		{
			return true;	
		}	
	}
	
	public function get_mktime_time_stamp($date = NULL){
		$data = explode("-",$date);
		$open_time = mktime(23,59,59, $data[1],$data[2],$data[0]);
		return $open_time;	
	}
	public function get_user_name($userid,$type)
	{
		if($type == "personal")
		{
			$query = $this->db->get_where('users', array('id' => $userid));
			//echo $this->db->last_query();die;
			$result = $query->row_array(); //For single row
			//debug($result);
			$name = $result["name"];
		}
		else
		{
			$query = $this->db->get_where('organisations', array('id' => $userid));
			$result = $query->row_array(); //For single row
			$name = $result["name"];
		}
		  
		return $name;
	}
	
	public function get_banners(){
		
		$this->db->select('*');
		$this->db->from('banners');
		$this->db->where(array("status" => "1","archive <>" => "1"));
		$query = $this->db->get();
		//echo	$this->db->last_query();die;
		$resultset = $query->result_array();
		return $resultset;
	}
	
	public function my_donate_amt($userid,$causeid){
		
		$this->db->select('amount');
		$this->db->from('cause_donations');
		$this->db->where(array("user_id" => $userid,"cause_id" => $causeid));
		$query = $this->db->get();
		//echo	$this->db->last_query();die;
		$resultset = $query->row_array();
		return $resultset["amount"];
	}
	
	public function is_already_supported($table,$email,$causeid){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where(array("email" => $email,"cause_id" => $causeid));
		$query = $this->db->get();
		//echo	$this->db->last_query();die;
		$resultset = $query->result_array();
		return count($resultset);
	}
	
}
if(FRONTPATH !="frontend"){
	$common= new common;	
	$common->check_authentication();
	/*$dir='';$con='';$arr=array();$str='';
	$dir =  APPPATH."controllers/";
	$con = scandir($dir, 1);
	foreach($con as $k =>$v){
		
		
			$a =  explode('.',$v);
			//array_push("contact",$a[0]);
			if(!empty($a[0])){
				$str.=$a[0]."\n";
			}
	}
	$arr =	explode("\n",$str);
	echo $this->router->class;die;
	if(in_array($this->router->class,$arr) && $this->session->userdata("is_admin_logged_in") <> true)
	{
		redirect(base_url()."/login/logout/");
	}*/
}