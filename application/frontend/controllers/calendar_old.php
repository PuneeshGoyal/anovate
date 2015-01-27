<?php 
class calendar extends CI_Controller{
    public function __construct(){
	    parent::__construct(); 
		$this->load->model('pets_model');
		
		$link=mysql_connect ($this->db->hostname,$this->db->username,$this->db->password);
		if(!$link){die("Could not connect to MySQL".mysql_error());}
		mysql_select_db($this->db->database,$link) or die ("could not open db".mysql_error());
    } 

    public function index(){ 
	  $this->load->view('calendar/index', $data);
    }
    public function weekly_index(){ 
	  $this->load->view ('calendar/weekly', $data);
    }
	public function is_date_in_week_exists_new($start_time,$end_time){
		$sql_q = "select * from evt_events
		WHERE user_id = '".$this->session->userdata("userid")."'
		AND user_type ='".$this->session->userdata("user_type")."'
		AND type = 'week'
		AND enabled_time BETWEEN '".$start_time."' AND '".$end_time."';";
		$exec_q = mysql_query($sql_q);
		$num = mysql_num_rows($exec_q);// print_r($q_r);
		return $num; 
	}
	public function add_events_month(){ 
	
	  $cause_id =  $_GET['cause_id'];
	  $datetime = $_GET['id'];//date choosen
	  $from_data = explode('/',$datetime);
	  $stamp = strtotime($from_data[0]."-".$from_data[1]."-".$from_data[2]." 00:00:00");
	  $end_time = strtotime($from_data[0]."-".$from_data[1]."-".$from_data[2]." 23:59:59");
	  $user_id = $this->session->userdata("userid");
	  $user_type = $this->session->userdata("user_type");
	  //to check whether this user added event to this cause already or not 
	  //if yes then delete that one
	  //if not then insert a new one
	  $sql_s = "SELECT * from evt_events
	   WHERE user_id='".$user_id."'
	   AND user_type = '".$user_type."'
	   AND cause_id = '".$cause_id."'
	   AND enabled_time= '".$stamp."'";
	   //AND type='month'";
	
	  $exec = mysql_query($sql_s);
	  $count = mysql_num_rows($exec);
	 
	  $arr = array();
	  
	  if($count > 0){
		  //to delete entry from week when entry deleted from month
		  $is_date_in_week_exists = $this->is_date_in_week_exists_new($stamp,$end_time); 
	     
		  if($is_date_in_week_exists > 0) {
			   $sql_m = "delete from evt_events
			   WHERE user_id='".$user_id."'
			   AND user_type='".$user_type."'
			   AND cause_id = '".$cause_id."'
			   AND enabled_time BETWEEN '".$stamp."' AND '".$end_time."'
			   AND type='week'";
		 	   $exec_m =  mysql_query($sql_m);
		  }
		  else{
			   $sql_d = "delete from evt_events
			   WHERE user_id='".$user_id."'
			   AND user_type='".$user_type."'
			   AND cause_id = '".$cause_id."'
			   AND enabled_time= '".$stamp."'
			   AND type='week'
			   ";
			   $exec_d =  mysql_query($sql_d);
		  }
		  if($exec_d || $exec_m){
			$arr["response"] = "success";
		  }
		  else{
			  $arr["response"] = "error";
		  }	
		  echo json_encode($arr);
	}
	else{
	    $sql = "INSERT into evt_events (user_type,user_id,cause_id,enabled_time,type) values ('".$user_type."','".$user_id."','".$cause_id."','".$stamp."','month')"; 
		if(mysql_query($sql)){
		  $arr["response"] ="success";
		  }
		  else{
			  $arr["response"] ="error";
		  }	
		  echo json_encode($arr);
	}
 } 
	
	public function add_events_week(){ 
		  	
	      $cause_id =  $_GET['cause_id'];
		  $datetime = $_GET['id'];
		  $from_data=explode(':',$datetime);
		  $hrs = $from_data[0];
		  $mnts = $from_data[1];
		  $from_data2 = explode('/',trim($from_data[2]));
		  $stamp1 = strtotime($from_data2[1]."-".$from_data2[0]."-".$from_data2[2]." ".$hrs.":".$mnts.":00 ");
		  $user_id = $this->session->userdata("userid");
		  $user_type = $this->session->userdata("user_type");
		  
		   
		  $sql_s= "select * from evt_events 
		  	WHERE user_id='".$user_id."'
			AND user_type = '".$user_type."'
			AND cause_id = '".$cause_id."'
			AND enabled_time= '".$stamp1."'
			AND type='week'";
			
		  $exec =mysql_query($sql_s);
		  $count = mysql_num_rows($exec);
		  
		  
		  if($count > 0){
			$sql_d = "delete from evt_events 
				WHERE user_id='".$user_id."'
				AND cause_id = '".$cause_id."'
				AND enabled_time= '".$stamp1."'
				AND type='week'";
			if(mysql_query($sql_d)){
				$arr["response"] ="success";
			  }
			  else{
				  $arr["response"] ="error";
			  }	
			  echo json_encode($arr);
		}
		else{
			 $sql = "INSERT into evt_events (user_type,user_id,cause_id,enabled_time,type) values ('".$user_type."','".$user_id."','".$cause_id."','".$stamp1."','week')";
			  if(mysql_query($sql)){
			  $arr["response"] ="success";
			  }
			  else{
				  $arr["response"] ="error";
			  }	
			  echo json_encode($arr);
			}
 	  } 
	  
	  public function check_is_date_filled(){
		  
		  if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		  }
		
		  $cause_id = $this->input->post('cause_id');
		  $data = array();
		  $check_is_date_filled='';
		  
		  $check_is_date_filled = $this->pets_model->check_is_date_filled($cause_id);
		  //echo $check_is_date_filled;die;
		  if($check_is_date_filled > 0){
			  $data["response"] ="success";
			  $data["message"] ="success";
		  }
		  else{
			   $data["response"] ="error";
			   $data["message"] ="Please create atleast one availability.";
		  }
		  echo json_encode($data);
	  }
} 
?> 