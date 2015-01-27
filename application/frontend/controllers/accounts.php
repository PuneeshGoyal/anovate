<?php
    
    class Accounts extends CI_Controller {
        
        function __construct() {
            parent::__construct();
            $this->load->model('account_model');
			 $this->load->model('start_cause_model');
        }
        
        public function index(){
            redirect(base_url().'accounts/manage_account');
        }
        
        public function manage_account() {
            $this->common->is_logged_in();
            $type = $this->session->userdata('user_type');
            $userid = $this->session->userdata('userid');
            if($type == 'organisation') {
                $data['userinfo'] = $this->account_model->get_user_info_org($userid);
                $data['country'] = $this->account_model->get_countries();
                //debug($data['country']); die;
                $data['type'] = 'Organisation';
            } elseif($type == 'personal'){
                $data['userinfo'] = $this->account_model->get_user_info_user($userid);
                $data['type'] = 'Personal';
                $data['country'] = $this->account_model->get_countries();
            }
            $data["master_title"]="Account";
            $data["master_body"]="manage_account";
            $breadcrumb = array("Home" => "home","Account"=>"accounts","Manage Account"=>"");
            $data['breadcrumb'] = $breadcrumb;
            $this->load->theme('home_layout',$data);
            
        }

        public function particulars() {
            
            $this->common->is_logged_in();
            $type = $this->session->userdata('user_type');
            $userid = $this->session->userdata('userid');
            $data["temp_info"] = $this->session->userdata("tempdata");
			$data["check_password"] = $this->session->userdata("temp_pass_data");
			
	
            if($type == 'organisation')
			{
                $data['userinfo'] = $this->account_model->get_user_info_org($userid);
                $data['country'] = $this->account_model->get_countries();
                //debug($data['country']); die;
                $data['type'] = 'organisation';
            }
			 elseif($type == 'personal')
			 {
                $data['userinfo'] = $this->account_model->get_user_info_user($userid);
                $data['type'] = 'Personal';
                $data['country'] = $this->account_model->get_countries();
            }
            $data["master_title"]="Account";
            $data["master_body"]="particulars";
            /*$breadcrumb = array("Home" => "home","Account"=>"accounts","Manage Account"=>"");
            $data['breadcrumb'] = $breadcrumb;*/
            $this->load->theme('home_layout',$data);
			
            if($this->uri->segment(3)!=''&& $this->uri->segment(3)=='2')
            {
                header("Refresh:3;url=".base_url().$this->router->class."/particulars");
            }
            
        }

        public function edit_org_account_to_database() {
            $this->common->is_logged_in();
            $user_id = $this->input->post('user_id');
            $arr['name'] = $this->input->post('organisation_full_name');
            $arr['location'] = $this->input->post('organisation_location');
            $arr['registration_number'] = $this->input->post('registration_number');
            $arr['person_in_charge'] = $this->input->post('person_in_charge');
            $arr['contact_office'] = $this->input->post('organisation_contact_office');
            $arr['postal_code'] = $this->input->post('organisation_postal_code');
            $arr['address'] = $this->input->post('organisation_address');
            $arr['unit_f'] = $this->input->post('organisation_unit_f');
            $arr['unit_l'] = $this->input->post('organisation_unit_l');
            
            if($this->account_model->edit_account_org($arr, $user_id)) {
				
				//update user session 
				$this->session->set_userdata("userid",$user_id);
				$this->session->set_userdata("name",$arr["name"]);
				//$this->session->set_userdata("username",$result["username"]);
				//$this->session->set_userdata("email",$result["email"]);
				$this->session->set_userdata("address",$arr["address"]);
				$this->session->set_userdata("phone_number",$arr["contact_office"]);
				$this->session->set_userdata("is_logged_in",true);
				//$this->session->set_userdata("user_type",'organisation');
					
               $this->session->set_flashdata('accounts_successmsg', 'Your account has been successfully edited');
			   redirect(base_url().'accounts/particulars/2');
            } 
			else {
                $this->session->set_flashdata('accounts_errormsg', 'Your changes are not updated technical error contact administrator');
				redirect(base_url().'accounts/particulars');
            }
        }

        public function edit_user_account_to_database() {
            $this->common->is_logged_in();
            $user_id = $this->input->post('user_id');
            $arr['name'] = $this->input->post('personal_full_name');
            $arr['nationality'] = $this->input->post('personal_nationality');
            $arr['identification_type'] = $this->input->post('personal_identification_type');
            $arr['identification_number'] = $this->input->post('personal_identification_number');
		    $arr['gender'] = $this->input->post('personal_gender');
            $arr['contact_hp'] = $this->input->post('personal_contact_hp');
            $arr['contact_home'] = $this->input->post('personal_contact_home');
            $arr['contact_office'] = $this->input->post('personal_contact_office');
            $arr['postal_code'] = $this->input->post('personal_postal_code');
            $arr['address'] = $this->input->post('personal_address');
            $arr['unit_f'] = $this->input->post('personal_unit_f');
            $arr['unit_l'] = $this->input->post('personal_unit_l');
            $personal_date = clean($this->input->post("personal_date"));
            $personal_month = clean($this->input->post("personal_month"));
            $personal_year = clean($this->input->post("personal_year"));
			$arr['d_o_b'] = $personal_year.'-'.$personal_month.'-'.$personal_date;
			
			if($this->account_model->edit_account_user($arr, $user_id)) 
			{
				$this->session->set_userdata("name",$arr["name"]);
				$this->session->set_userdata("address",$arr["address"]);
				$this->session->set_userdata("gender",$arr["gender"]);
				$this->session->set_userdata("phone_number",$arr["contact_home"]);
				$this->session->set_userdata("d_o_b",$arr["d_o_b"]);
				
				$this->session->set_flashdata('accounts_successmsg', 'Your account has been successfully edited');
				redirect(base_url().'accounts/particulars/2');
				//$this->session->set_flashdata('successmsg', 'Your account has been successfully edited');
			} else {
				$this->session->set_flashdata('accounts_errormsg', 'Your changes are not updated technical error contact administrator');
				redirect(base_url().'accounts/particulars');
			}
        }
		
        public function edit_account_password() {
            $this->common->is_logged_in();
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
            $user_id = $userid;
            $user['current_password'] = $this->input->post('current_password');
            $user['password'] = $this->input->post('new_password');
            $user['confirm_password'] = $this->input->post('confirm_password');
          	$up["check_password"] = $this->session->set_userdata("temp_pass_data",strip_slashes($user));
		 
		    $verify_pass = $this->common->validateHash($user['current_password'], $data_user['password']);
		    if($verify_pass == false){
		  		$this->session->set_flashdata('accounts_errormsg', 'Please enter existing password again');
                redirect(base_url().'accounts/particulars');
		    }
		    if($user['password'] == ""){
				 $this->session->set_flashdata('accounts_errormsg', 'Please enter new password');
                 redirect(base_url().'accounts/particulars');
		    }
			else if(strlen($user["password"]) < 6 || strlen($user["password"]) > 15){
				$this->session->set_flashdata("errormsg","Your password must be between 6 and 15 characters long ");
				$err=1;	
			}
			else if($user['confirm_password'] == ""){
				 $this->session->set_flashdata('accounts_errormsg', 'Please enter confirm password');
                 redirect(base_url().'accounts/particulars');
		    }
			else if($user['password'] <> $user['confirm_password']){
				 $this->session->set_flashdata('accounts_errormsg', 'Both password should be same');
                 redirect(base_url().'accounts/particulars');
		    }
		    else if($user['password'] == $user['confirm_password'])
			{
                $pass['password'] = $data_user['password'];
            } 
			else
			{
                $this->session->set_flashdata('accounts_errormsg', 'Please enter confirm password same as new password');
                redirect(base_url().'accounts/particulars');
            }
            
		    if($verify_pass == 1)
			{
				
                $data['password'] = $this->common->salt_password($user);
				
                if($usertype == 'organisation') {
                    $update_password = $this->account_model->edit_account_org($data, $userid); 
                    if($update_password) {
						$this->session->unset_userdata('temp_pass_data');
                        $this->session->set_flashdata('accounts_successmsg', 'Your password successfully updated');
                        redirect(base_url().'accounts/particulars');
                    }
					else{
						  $this->session->set_flashdata('accounts_successmsg', 'There was problem updating password please contact admin');
                          redirect(base_url().'accounts/particulars');
					}
                }
				else {
					
                    $update_password = $this->account_model->edit_account_user($data, $userid);             
                    if($update_password) {
						$this->session->unset_userdata('temp_pass_data');
                        $this->session->set_flashdata('accounts_successmsg', 'Your password successfully updated');
                        redirect(base_url().'accounts/particulars');
                    }
					else{
						  $this->session->set_flashdata('accounts_successmsg', 'There was problem updating password please contact admin');
                          redirect(base_url().'accounts/particulars');
					}
                }
            } 
			else 
			{
                $this->session->set_flashdata('accounts_errormsg', 'Please enter existing password again');
                redirect(base_url().'accounts/particulars');
            }
        }
		
		
		  

	public function manage_causes(){
		 $this->common->is_logged_in();
		 
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
		$config['base_url']=base_url()."accounts/manage_causes/?".$this->common->removeUrl("per_page",$_SERVER["QUERY_STRING"]);
		$countdata = array();
		$countdata = $_GET;
		$countdata["countdata"] = "yes";	
		$countdata["usertype"] = "";	
		$config['total_rows'] = count($this->start_cause_model->getallusercause($countdata));   
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
			
		$data['resultdata'] = $this->start_cause_model->getallusercause($searcharray);
		
		$data["master_title"]="Manage Causes";
		$data["master_body"]="manage_cause";
		$this->load->theme('home_layout',$data);
	}
	
	public function cause_fundrasing()
	{
	  $data='';
	  $id=$this->uri->segment(3); 
	  $dataset=$this->start_cause_model->getcausedatabyslug($id);
	  $donation_data = $this->start_cause_model->getcausedonationinfo($dataset['id']);
	  $result = $this->start_cause_model->get_cause_donation_by_id($dataset['id']);
	 
	  $closetime = $dataset['activated_time'] + ($dataset['duration']*24*60*60);
	 
	  
	  $data .= '<div class="modal-header custom_m_head">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title custom_title" id="myModalLabel">'.$id.' - Fundraising progress</h4>
		<h6><a href="'.base_url().$this->router->class.'/report/'.$id.'">Download</a></h6>
      </div>
      <div class="modal-body modal_w ">
        <div class="mnt_table_popup">
          <div class="col-sm-6 col-xs-6">Status (amount): '.number_format($donation_data[0]["total_sum"],2).'/'.number_format($dataset["target_amount"],2).'</div>
          <div class="col-sm-6 col-xs-6">Time left: <span data-time="'.$closetime.'" class="kkcount-down1" id="count"></span>
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
                <th>Transaction no.</th>
                <th>Amount (USD)</th>
              </tr>
            </thead>
            <tbody>';
			
			if(count($result) !=0){
			foreach($result as $key=>$val)
			{
				 $name1 = $this->common->get_user_name($val['user_id'],$val['user_type']);
				 if(  $val['transection_id']!=""){ $tid = $val['transection_id']; }else{ $tid =  "N/A"; }
				 if(  $name1 !=""){ $name = $name1; }else{ $name =  "Guest"; }
			     $data .= '<tr>
					<td>'.$name.'</td>
					<td>'.$tid.'</td>
					<td>'.number_format($val['amount'],2).'</td>
				  </tr>';
             }
			}else{
				$data .= '<tr><td colspan="3" style="color:red;">No record found</td></tr>';
			}
         $data .= '</tbody>
           
          </table>
        </div>
		</div>
      </div>';
	  echo $data;
	}
	
	public function cause_petition()
	{
	  $data='';
	  $id=$this->uri->segment(3); 
	  $dataset=$this->start_cause_model->getcausedatabyslug($id);
	  //$donation_data = $this->start_cause_model->getcausedonationinfo($dataset['id']);
	  $petition_cause_data = $this->start_cause_model->getPetitionDonationInfo($dataset['id']);
	  $result = $this->start_cause_model->get_petition_data($dataset['id']);
	  $petition_closetime = $dataset['activated_time'] + ($dataset['duration']*24*60*60);
	 
	 //<div class="col-sm-6 col-xs-6">Status (amount): $'.number_format($donation_data[0]["total_sum"],2).'/$'.number_format($dataset["petition_target_amount"],2).'</div>
	  $data .= '<div class="modal-header custom_m_head">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title custom_title" id="myModalLabel">'.$id.' - Pledge progress</h4>
		<h6><a href="'.base_url().$this->router->class.'/petition_report/'.$id.'">Download</a></h6>
		<h6 style="color:white">'.$petition_cause_data["count"].'/'.$dataset['petition_target_amount'].'pledged</h6>
      </div>
	   <div class="modal-body" style="overflow-y:auto; max-height:500px;">
        <div class="mnt_table_popup mnt_mb4">
        
          <div class="col-sm-6 col-xs-6">Time left: <span data-time="'.$petition_closetime.'" class="kkcount-down" id="count1"></div>
        </div>
        <div class="clearfix"></div>
        <div id="mnt_scroll2">
          <div class="table-responsive">
		  <span id="error_attendence"></span>
		  <form method="post" id="mark_attendence" >
            <input type="hidden" name="id" id="row_id" value='.$dataset['id'].'>
			<table class="table mnt_table_popup manage_table appointment_table table-condensed table-striped table-bordered table-hover no-margin">
              <thead>
                <tr class="mnt_blue">
                  <th>Name</th>
                  <th>Email</th>
				  <th>Location</th>
                  <th>Additional Messages</th>
                </tr>
              </thead>
              <tbody>';
			 
			$response=array();
			$set=0;
			if(count($result) !=0){
			$i=1;foreach($result as $key=>$val)
			{
				//<td>'.$i.'</td><th>Sr. No.</th>
				$set=1;
				 $data .= '<tr>
					<td>'.stripcslashes($val['name']).'</td>
					<td>'.$val['email'].'</td>
					<td>'.stripcslashes($val['address']).'</td>
					<td style="text-align:justify">'.stripcslashes($val['message']).'</td>
				  </tr>';
				  $i++;
             }
			}else{
				$data .= '<tr><td colspan="8" style="color:red;">No record found</td></tr>';
			}
         $data .= '</tbody>
          </table>
		  </form>
        </div>';
		
     $data .= '</div>';
	  echo $data;	
	}
		
	
	public function cause_volunteer()
	{
	  $data = '';
	  $id = $this->uri->segment(3); 
	  $dataset = $this->start_cause_model->getcausedatabyslug($id);
	  $result = $this->start_cause_model->get_volunteer_data($dataset['id']);
	  //debug($dataset);
	  $closetime = $dataset['activated_time'] + ($dataset['duration']*24*60*60);
	  $volunteer_cause_data = $this->start_cause_model->getVolunteerDonationInfo($dataset['id']);
	
	 //<div class="col-sm-6 col-xs-6">Status (amount): $'.number_format($donation_data[0]["total_sum"],2).'/$'.number_format($dataset["petition_target_amount"],2).'</div>
	  $data .= '<div class="modal-header custom_m_head">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title custom_title" id="myModalLabel">'.$id.' - Volunteer progress</h4>
		<h6><a href="'.base_url().$this->router->class.'/volunteer_report/'.$id.'">Download progress report</a></h6>
		<h6 style="color:white">'.$volunteer_cause_data["count"].'/'.$dataset["volunteer_target_number"].' people supported</h6>
		<h6 style="color:white"><a href="'.base_url().$this->router->class.'/download_attendence/'.$id.'">Download attendence</a></h6>
      </div>
	   <div class="modal-body" style="overflow-y:auto; max-height:500px;">
        <div class="mnt_table_popup mnt_mb4">
          <div class="col-sm-6 col-xs-6">Time left: <span data-time="'.$closetime.'" class="kkcount-down" id="count2"></div>
        </div>
        <div class="clearfix"></div>
        <div id="mnt_scroll2">
          <div class="table-responsive">
		  <form method="post" id="mark_attendence" >
			<table class="table mnt_table_popup manage_table appointment_table table-condensed table-striped table-bordered table-hover no-margin">
              <thead>
                <tr class="mnt_blue">
				  <th><input type="checkbox" id="selecctall" onclick="check_all(this)"/></th>
                  <th>Name</th>
                  <th>Gender</th>
                  <th>Age(Yr Old)</th>
				  <th>Location</th>
                  <th>Phone number</th>
                  <th>Email</th>
                </tr>
              </thead>
              <tbody>';
			//<th>Sr. No.</th>
			$response=array();
			$gender='';
			$set=0;
			$exists=0;
			if(count($result) !=0){
			$i=1;foreach($result as $key=>$val)
			{
				
				$set=1;
				/*if($val["user_type"] == "organisation"){
					$response = $this->account_model->get_user_info_org($val['userid']);
					$age = $this->common->get_age($response["d_o_b"]);
				}
				if($val["user_type"] == "personal"){
					$response = $this->account_model->get_user_info_user($val['userid']);
					$age = $this->common->get_age($response["d_o_b"]);
				}
				if($val["user_type"] == "guest"){
					$response = $this->account_model->get_user_info_user($val['userid']);
					$age = $val["age"];
				}*/
				
				//echo $val['id'];<td>'.$i.'</td>
				if($val['is_attended']==1){$disable='disabled="disabled" checked="checked"';}else{$disable='';$exists=1;}
				if($val['gender'] == "m"){$gender= 'Male';}else{$gender= 'Female';}
				 $data .= '<tr>
				  <input '.$disable.' type="hidden" name="id[]" id="row_id" value='.$val['id'].'>
					<td><input '.$disable.' onclick="uncheck_all(this)" class="checkbox_select" type="checkbox" name="chk[]" value="'.$val['id'].'"></td>
				 	<td>'.stripcslashes($val['name']).'</td>
					<td>'.$gender.'</td>
					<td>'.$val['age'].'</td>
					<td>'.stripcslashes($val["address"]).'</td>
					<td>'.$val["phone_number"].'</td>
					<td style="text-align:justify">'.stripcslashes($val["email"]).'</td>
				  </tr>';
				  $i++;
             }
			}else{
				$data .= '<tr><td colspan="8" style="color:red;">No record found</td></tr>';
			}
         $data .= '</tbody>
          </table>
		  </form>
        </div>';
		if($set==1 && $exists ==1){
				$data .='<button type="button" class="btn btn-primary" onclick="return mark_attendence();">Attendence Confirm</button><span id="error_attendence" style="padding-left:10px"></span>';
		} 
     $data .= '</div>';
	  echo $data;	
	}
		
	public function mark_attendence(){
		if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}
		$data=array();
		$arr= array();
		$set='';
		$arr["is_attended"] = $this->input->post("chk");
		$arr["id"] = $this->input->post("id");
		
		foreach($arr["id"] as $k =>$v)
		{
			if($v <> ""){
				if(in_array($v,$arr["is_attended"]))
				{
					$set=0;
					$insert = $this->start_cause_model->mark_attendence($v);
				}
				else{
					$set=1;
				}
			}
		}
		
		if($set==0){
			$data["response"]="success";
			$data["message"]="Attendence for this cause marked successfully";
		}
		else{
			$data["response"]="error";
			$data["message"]="There is an error please contact admin";
		}
		
		echo json_encode($data);die;
	}
	public function download_attendence(){
		
		 $message='';
	 	 $id = $this->uri->segment(3); 
		 $dataset = $this->start_cause_model->getcausedatabyslug($id);
		 $donation_data = $this->start_cause_model->getcausedonationinfo($dataset['id']);
	  	 $result = $this->start_cause_model->get_volunteer_data($dataset['id']);
	  
	  
		 $message = "<table border=\"1\" width=\"100%\">
			<tr style='background-color:#4f81bd;'>
            	<td style='font-size:14px; font-family:Microsoft Tai Le;font-weight:bold;' nowrap=\"nowrap\"><b>Sr.no.</b></td>
				<td style='font-size:14px; font-family:Microsoft Tai Le;font-weight:bold;' nowrap=\"nowrap\"><b>Name</b></td>
				<td style='font-size:14px; font-family:Microsoft Tai Le;font-weight:bold;' nowrap=\"nowrap\"><b>Gender</b></td>
				<td style='font-size:14px; font-family:Microsoft Tai Le;font-weight:bold;' nowrap=\"nowrap\"><b>Age(Yr Old)</b></td>
				<td style='font-size:14px; font-family:Microsoft Tai Le;font-weight:bold;' nowrap=\"nowrap\"><b>Location</b></td>
				<td style='font-size:14px; font-family:Microsoft Tai Le;font-weight:bold;' nowrap=\"nowrap\"><b>Phone number</b></td>
				<td style='font-size:14px; font-family:Microsoft Tai Le;font-weight:bold;' nowrap=\"nowrap\"><b>Email</b></td>
				<td style='font-size:14px; font-family:Microsoft Tai Le;font-weight:bold;' nowrap=\"nowrap\"><b>Attended</b></td>
			</tr>";
			
			$i=1;
			
			foreach($result as $key=>$val)
			{
				if($val['gender'] == "m"){$gender= 'Male';}else{$gender= 'Female';}
				if($val['is_attended'] == "1"){$is_attended= '<span style="color:green">Yes</span>';}else{$is_attended= '<span style="color:red">No</span>';}
				if($i%2 !='0'){$cls="background-color:#dbe5f1";}else{$cls="background-color:#b8cce4";}
				 $message .= "<tr style='".$cls."'>";
				 $message .=  "<td width=\"25%\" style='font-size:12px; font-family:Microsoft Tai Le;text-align:left'>".$i."</td> 
				 <td width=\"25%\" style='font-size:12px; font-family:Microsoft Tai Le;text-align:left'>".stripcslashes(ucfirst($val['name']))."</td>
				 <td width=\"25%\" style='font-size:12px; font-family:Microsoft Tai Le;text-align:left'>".$gender."</td>
				 <td width=\"25%\" style='font-size:12px; font-family:Microsoft Tai Le;text-align:left'>".$val["age"]."</td>
				 <td width=\"25%\" style='font-size:12px; font-family:Microsoft Tai Le;text-align:left;'>".stripcslashes($val['address'])."</td>
				 <td width=\"25%\" style='font-size:12px; font-family:Microsoft Tai Le;text-align:left;'>".stripcslashes($val['phone_number'])."</td>
				 <td width=\"25%\" style='font-size:12px; font-family:Microsoft Tai Le;text-align:left;'>".stripcslashes($val['email'])."</td>
				 <td width=\"25%\" style='font-size:12px; font-family:Microsoft Tai Le;text-align:left;'>".$is_attended."</td>";
				 $message .= "</tr>";
		  
			   $i++;
			}
			 $message .= "</table>";
			 //header to give the order to the browser
			 $myFile = $this->config->item('sitename')."_supporter_report_".date('m/d/y').".xls";
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
	public function volunteer_report(){
		
		 $message='';
	 	 $id = $this->uri->segment(3); 
		 $dataset = $this->start_cause_model->getcausedatabyslug($id);
		 $donation_data = $this->start_cause_model->getcausedonationinfo($dataset['id']);
	  	 $result = $this->start_cause_model->get_volunteer_data($dataset['id']);
	  
	  
		 $message = "<table border=\"1\" width=\"100%\">
			<tr style='background-color:#4f81bd;'>
            	<td style='font-size:14px; font-family:Microsoft Tai Le;font-weight:bold;' nowrap=\"nowrap\"><b>Sr.no.</b></td>
				<td style='font-size:14px; font-family:Microsoft Tai Le;font-weight:bold;' nowrap=\"nowrap\"><b>Name</b></td>
				<td style='font-size:14px; font-family:Microsoft Tai Le;font-weight:bold;' nowrap=\"nowrap\"><b>Gender</b></td>
				<td style='font-size:14px; font-family:Microsoft Tai Le;font-weight:bold;' nowrap=\"nowrap\"><b>Age(Yr Old)</b></td>
				<td style='font-size:14px; font-family:Microsoft Tai Le;font-weight:bold;' nowrap=\"nowrap\"><b>Location</b></td>
				<td style='font-size:14px; font-family:Microsoft Tai Le;font-weight:bold;' nowrap=\"nowrap\"><b>Phone number</b></td>
				<td style='font-size:14px; font-family:Microsoft Tai Le;font-weight:bold;' nowrap=\"nowrap\"><b>Email</b></td>
			</tr>";
			
			$i=1;
			
			foreach($result as $key=>$val)
			{
				if($val['gender'] == "m"){$gender= 'Male';}else{$gender= 'Female';}
				if($i%2 !='0'){$cls="background-color:#dbe5f1";}else{$cls="background-color:#b8cce4";}
				 $message .= "<tr style='".$cls."'>";
				 $message .=  "<td width=\"25%\" style='font-size:12px; font-family:Microsoft Tai Le;text-align:left'>".$i."</td> 
				 <td width=\"25%\" style='font-size:12px; font-family:Microsoft Tai Le;text-align:left'>".stripcslashes(ucfirst($val['name']))."</td>
				 <td width=\"25%\" style='font-size:12px; font-family:Microsoft Tai Le;text-align:left'>".$gender."</td>
				 <td width=\"25%\" style='font-size:12px; font-family:Microsoft Tai Le;text-align:left'>".$val["age"]."</td>
				 <td width=\"25%\" style='font-size:12px; font-family:Microsoft Tai Le;text-align:left;'>".stripcslashes($val['address'])."</td>
				 <td width=\"25%\" style='font-size:12px; font-family:Microsoft Tai Le;text-align:left;'>".stripcslashes($val['phone_number'])."</td>
				 <td width=\"25%\" style='font-size:12px; font-family:Microsoft Tai Le;text-align:left;'>".stripcslashes($val['email'])."</td>";
				 $message .= "</tr>";
		  
			   $i++;
			}
			 $message .= "</table>";
			 //header to give the order to the browser
			 $myFile = $this->config->item('sitename').date('m/d/y').".xls";
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
			
	public function petition_report(){
		
		 $message='';
	 	 $id = $this->uri->segment(3); 
		 $dataset = $this->start_cause_model->getcausedatabyslug($id);
		 $donation_data = $this->start_cause_model->getcausedonationinfo($dataset['id']);
	  	 $result = $this->start_cause_model->get_petition_data($dataset['id']);
	  
	  
		 $message = "<table border=\"1\" width=\"100%\">
			<tr style='background-color:#4f81bd;'>
				<td style='font-size:14px; font-family:Microsoft Tai Le;font-weight:bold;' nowrap=\"nowrap\"><b>Sr.no.</b></td>
				<td style='font-size:14px; font-family:Microsoft Tai Le;font-weight:bold;' nowrap=\"nowrap\"><b>Name</b></td>
				<td style='font-size:14px; font-family:Microsoft Tai Le;font-weight:bold;' nowrap=\"nowrap\"><b>Email.</b></td>
				<td style='font-size:14px; font-family:Microsoft Tai Le;font-weight:bold;' nowrap=\"nowrap\"><b>Location</b></td>
				<td style='font-size:14px; font-family:Microsoft Tai Le;font-weight:bold;' nowrap=\"nowrap\"><b>Message</b></td>
			</tr>";
			
			$i=1;
			
			foreach($result as $key=>$val)
			{
				if($i%2 !='0'){$cls="background-color:#dbe5f1";}else{$cls="background-color:#b8cce4";}
				 $message .= "<tr style='".$cls."'>";
				 $message .=  "<td width=\"25%\" style='font-size:12px; font-family:Microsoft Tai Le;text-align:left'>".$i."</td> 
				 <td width=\"25%\" style='font-size:12px; font-family:Microsoft Tai Le;text-align:left'>".stripcslashes(ucfirst($val['name']))."</td>
				 <td width=\"25%\" style='font-size:12px; font-family:Microsoft Tai Le;text-align:left;'>".stripcslashes($val['email'])."</td>
				 <td width=\"25%\" style='font-size:12px; font-family:Microsoft Tai Le;text-align:left;'>".stripcslashes($val['address'])."</td>
				 <td width=\"25%\" style='font-size:12px; font-family:Microsoft Tai Le;text-align:left;'>".stripcslashes($val['message'])."</td>";
				 $message .= "</tr>";
		  
			   $i++;
			}
			 $message .= "</table>";
			 //header to give the order to the browser
			 $myFile = $this->config->item('sitename').date('m/d/y').".xls";
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
		
		public function report(){
		
		 $message='';
	 	 $id=$this->uri->segment(3); 
		 $dataset=$this->start_cause_model->getcausedatabyslug($id);
		 $donation_data = $this->start_cause_model->getcausedonationinfo($dataset['id']);
	  	 $result = $this->start_cause_model->get_cause_donation_by_id($dataset['id']);
	  
	  
		 $message = "<table border=\"1\" width=\"100%\">
			<tr style='background-color:#4f81bd;'>
				<td style='font-size:14px; font-family:Microsoft Tai Le;font-weight:bold;' nowrap=\"nowrap\"><b>Sr.no.</b></td>
				<td style='font-size:14px; font-family:Microsoft Tai Le;font-weight:bold;' nowrap=\"nowrap\"><b>Name</b></td>
				<td style='font-size:14px; font-family:Microsoft Tai Le;font-weight:bold;' nowrap=\"nowrap\"><b>Transaction no.</b></td>
				<td style='font-size:14px; font-family:Microsoft Tai Le;font-weight:bold;' nowrap=\"nowrap\"><b>Amount(USD)</b></td>
			</tr>";
			
			$i=1;
			
			foreach($result as $key=>$val)
			{
				$name1 = $this->common->get_user_name($val['user_id'],$val['user_type']);
				 if($val['transection_id']!=""){ $tid = $val['transection_id']; }else{ $tid =  "N/A"; }
				 if($name1 !=""){ $name = $name1; }else{ $name =  "Guest"; }
				 
				if($i%2 !='0'){$cls="background-color:#dbe5f1";}else{$cls="background-color:#b8cce4";}
				 $message .= "<tr style='".$cls."'>";
				 $message .=  "<td width=\"25%\" style='font-size:12px; font-family:Microsoft Tai Le;text-align:left'>".$i."</td> 
				 <td width=\"25%\" style='font-size:12px; font-family:Microsoft Tai Le;text-align:left'>".ucfirst($name)."</td>
				 <td width=\"25%\" style='font-size:12px; font-family:Microsoft Tai Le;text-align:left;'>".$tid."</td>
				 <td width=\"25%\" style='font-size:12px; font-family:Microsoft Tai Le;text-align:left;'>$".number_format($val['amount'],2)."</td>";
				 $message .= "</tr>";
		  
			   $i++;
			}
			 $message .= "</table>";
			 //header to give the order to the browser
			 $myFile = $this->config->item('sitename').date('m/d/y').".xls";
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
	
 } 
?>