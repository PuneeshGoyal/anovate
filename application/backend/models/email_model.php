<?php 

class email_model extends CI_Model { 

function __construct()
{
 parent::__construct();
 $this->load->model("user_model");
}
	public function send_newsletter($emailarr = array()){
	 	//debug($emailarr);die;
	   if($emailarr["type"] == "all")
		{
			  $resultset = $this->page_model->get_newsletter();
			  //debug($resultset);die;
			  foreach($resultset as $k => $v)
			  {
				  $this->email->clear();	
				  $config["mailtype"]="html";
	       	      $this->email->initialize($config);	
				  $this->load->library('email', $config);
				  $this->load->library('parser', $config);
				  $this->email->set_newline("\r\n");
				  $this->email->to($v["email"]);// change it to yours
				  $this->email->from($config['smtp_user'], $this->config->item("sitename"));
				  $this->email->subject($emailarr["subject"]);
				  $this->email->message($emailarr["message"]);
				  $result = $this->email->send();
			  }
			  
			  if($result){
				$err=0;
			  }
			  else{
				//show_error($this->email->print_debugger());
				 $this->email->print_debugger();
				 $err=1;
			  }
			   return $err;
		}
		else{
			  //debug($emailarr);die;
			  foreach($emailarr["email"] as $k => $v)
			  {
				  $this->email->clear();
				  $config["mailtype"]="html";
	       	      $this->email->initialize($config);		
				  $this->load->library('email', $config);
				  $this->load->library('parser', $config);
				  $this->email->set_newline("\r\n");
				  $this->email->to($v);// change it to yours
				  $this->email->from($config['smtp_user'], $this->config->item("sitename"));
				  $this->email->subject($emailarr["subject"]);
				  $this->email->message($emailarr["message"]);
				  $result = $this->email->send();
			  }
			  if($result){
				$err=0;
			  }
			  else{
				//show_error($this->email->print_debugger());
				 $this->email->print_debugger();
				 $err = 1;
			  }
			  return $err;
		}
	 }
	 
	public function sendIndividualEmail($emailarr = array())
   {
   
	   if($_SERVER['SERVER_NAME'] == "localhost" || $_SERVER['SERVER_NAME'] == "192.168.1.226" || $_SERVER['SERVER_NAME'] == "112.196.33.85")
	   {
			  
			 $this->load->library('email', $config);
			 $this->load->library('parser', $config);
			 $this->email->set_newline("\r\n");
			 $this->email->to($emailarr["to"]);// change it to yours
			 $this->email->from($config['smtp_user'],  $this->config->item('sitename'));
		  	 $this->email->subject($emailarr["subject"]);
			 $this->email->message($emailarr["message"]);
			 $result = $this->email->send();
			 //echo $result; die;
			 if($result){
				return $err=0;
			 }
			 else{
				//echo  $this->email->print_debugger();die;
				 return $err=1;
			}
	   }
	   else{
	   
		    $this->email->clear();
			$config["mailtype"]="html";
			$this->email->initialize($config);		
			$this->email->to($emailarr["to"]);// change it to yours
			$this->email->from('dev@crowdcauses.com', $this->config->item('sitename'));
			$this->email->subject($emailarr["subject"]);
			$this->email->message($emailarr["message"]);
			
			$result = $this->email->send();
			//echo $result; die;
			if($result){
				return $err=0;
			}
			else{
				 $this->email->print_debugger();
				 return $err=1;
			}
	   }
		
		/*$config = Array(		
		    'protocol' => 'smtp',
		    'smtp_host' => 'mail.crowdcauses.com',
		    'smtp_port' => 26,
		    'smtp_user' => 'dev@crowdcauses.com',
		    'smtp_pass' => 'dev@123',
		    'smtp_timeout' => '4',
		    'mailtype'  => 'text', 
		    'charset'   => 'iso-8859-1'
		);
		
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->clear();
	    $config["mailtype"]="html";
		$this->email->initialize($config);	
			
	    $this->email->from("dev@crowdcauses.com",  $this->config->item('sitename'));
		
		$this->email->subject($emailarr["subject"]);
		$this->email->message($emailarr["message"]);
		
		$result = $this->email->send();
		//echo $result; die;
		if($result){
			$err=0;
		}
		else{
			
			 $this->email->print_debugger();
			 return $err=1;
		}*/
	}
	
	/************************************************* Email function ends **************************************************/
	public function UserPasswordsendIndividualEmail($emailarr){
		
	@$this->load->library('email', $config);
    @$this->load->library('parser', $config);
	$this->email->set_newline("\r\n");
	
	$this->email->to($emailarr["to"]);// change it to yours
     if($_SERVER['SERVER_NAME'] == "localhost" || $_SERVER['SERVER_NAME'] == "192.168.1.226" || $_SERVER['SERVER_NAME'] == "112.196.33.85"){
    	  $this->email->from($config['smtp_user'],  $this->config->item('sitename'));
	  }
	  else{
	 	 $this->email->from($this->config->item('admin_email'),  $this->config->item('sitename'));
	  }
	$this->email->subject($emailarr["subject"]);
	$this->email->message($emailarr["message"]);
	$result = $this->email->send();
	if($result){
		$err=true;
	}
	else{
		//show_error($this->email->print_debugger());
		 $this->email->print_debugger();
		  $err=false;
		}
		return  $err;
	}
	
	
public function send_contact_email($emailarr){
	//print_r($emailarr); die;
		
	@$this->load->library('email', $config);
    @$this->load->library('parser', $config);
	$this->email->set_newline("\r\n");
	
	$this->email->to($emailarr["to"]);// change it to yours
     if($_SERVER['SERVER_NAME'] == "localhost" || $_SERVER['SERVER_NAME'] == "192.168.1.226" || $_SERVER['SERVER_NAME'] == "112.196.33.85"){
    	  $this->email->from($config['smtp_user'],  $this->config->item('sitename'));
	  }
	  else{
	 	 $this->email->from($this->config->item('admin_email'),  $this->config->item('sitename'));
	  }
	//print_r($emailarr); die;

	$this->email->subject($emailarr["subject"]);
	$this->email->message($emailarr["message1"]);
	$result = $this->email->send();
	if($result){ 
		$err=true;
	}
	else{
		//show_error($this->email->print_debugger());
		 $this->email->print_debugger();
		  $err=false;
		}
		return  $err;
	}
	
	
	public function send_email_vtracking($emailarr){
		
	@$this->load->library('email', $config);
    @$this->load->library('parser', $config);
	$this->email->set_newline("\r\n");
	
	$this->email->to($emailarr["to"]);// change it to yours
     if($_SERVER['SERVER_NAME'] == "localhost" || $_SERVER['SERVER_NAME'] == "192.168.1.226" || $_SERVER['SERVER_NAME'] == "112.196.33.85"){
    	  $this->email->from($config['smtp_user'],  $this->config->item('sitename'));
	  }
	  else{
	 	 $this->email->from($this->config->item('admin_email'),  $this->config->item('sitename'));
	  }
	//print_r($emailarr); die;

	$this->email->subject($emailarr["subject1"]);
	$this->email->message($emailarr["message1"]);
	$result = $this->email->send();
	if($result){ 
		$err=true;
	}
	else{
		//show_error($this->email->print_debugger());
		 $this->email->print_debugger();
		  $err=false;
		}
		return  $err;
	}

	
	
}