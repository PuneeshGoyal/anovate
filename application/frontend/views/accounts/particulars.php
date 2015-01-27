<?php //debug($this->session->all_userdata());?>
<!--mid area-->
<script type="text/javascript">
   function validation_organisation()
   {
		var organisation_full_name = $("#organisation_full_name").val().trim();
		var organisation_location = $("#organisation_location").val().trim();
		var registration_number = $("#registration_number").val().trim();
		var person_in_charge = $("#person_in_charge").val().trim();
		var contact_office = $("#contact_office").val().trim();
		var organisation_postal_code = $("#organisation_postal_code").val().trim();
		var organisation_address = $("#organisation_address").val().trim();
		var organisation_unit_f = $("#organisation_unit_f").val().trim();
		var organisation_unit_l = $("#organisation_unit_l").val().trim();
		var full_name_regex = /^[a-zA-Z\s.]{3,25}$/i;//only letters, period(.),space get accepted
		var user_name_regex = /^[a-zA-Z0-9._\-]{3,34}$/i;//numeric, alphabets,Underscore, hyphen, dot
		var password_regex = /^[a-zA-Z0-9!-@#$%^&*()_]{6,15}$/;
		var phone_regex = /[0-9-()+]{10,20}/; 
		var float_regex = '[-+]?([0-9]*.[0-9]+|[0-9]+)'; ////match ints and floats/decimals
		var zip_regex = /^[a-zA-Z0-9]{3,12}$/i;//numeric, alphabets 3-12 in length
			
		var response='';
		var message='';
		 
		if(organisation_full_name == "")
		{
			var response = 'error';
			var message = "Please enter organisation name";
			$("#organisation_full_name").focus();
		}
		/*else if(!full_name_regex.test(organisation_full_name))
		{
			var response = 'error';
			var message = "only letters,period(.),space is allowed and organisation name must be between 3 to 25 characters";
			$("#personal_full_name").focus();
			$("#personal_full_name").css("background-color", "rgba(255, 0, 0, 0.3)");
		}*/
		else if(organisation_location == "")
		{
			var response = 'error';
			var message = "Please select location";
			$("#organisation_location").focus();
		} 
		else if(registration_number == "")
		{
			var response = 'error';
			var message = "Please enter registration number";
			$("#registration_number").focus();
		} 
		/*else if(person_in_charge == ""){
			var response = 'error';
			var message = "Please enter person in charge";
			$("#person_in_charge").focus();
		}
		else if(contact_office == ""){
			var response = 'error';
			var message = "Please enter contact office";
			$("#contact_office").focus();
		}*/
		else if(organisation_postal_code == "")
		{
			var response = 'error';
			var message = "Please enter postal code";
			$("#organisation_postal_code").focus();
		} 
		else if(!zip_regex.test(organisation_postal_code)){
			var response = 'error';
			var message = "zip code should be between 3 to 12 character and alphanumeric values are allowed";
			$("#organisation_postal_code").focus();
        }
		else if(organisation_address == ""){
			var response = 'error';
			var message = "Please enter organisation address";
			$("#organisation_address").focus();
		} 
		/*else if(organisation_unit_f == "" || organisation_unit_f == '0'){
			var response = 'error';
			var message = "Please enter unit";
			$("#organisation_unit_f").focus();
		}
		else if(organisation_unit_l == "" || organisation_unit_l == '0'){
			var response = 'error';
			var message = "Please enter unit";
			$("#organisation_unit_l").focus();
		}*/
		else{
			var response = 'success';
			var message = "success";
		}
		
		if(message != '' && message != null)
		{
			//alert(response);
			if(response == 'error'){
				jQuery('html,body').animate({scrollTop:0},500);
				$('#error_particular').html(message).show().css({'color':'red'});
				return false;
			}
			else
			{
				document.getElementById("submit_form1").submit();
			}
		}
   }
   
   
   function validation_user()
   {
		var personal_full_name = $("#personal_full_name").val().trim();
		var personal_nationality = $("#personal_nationality").val().trim();
		var personal_identification_type = $("#personal_identification_type").val().trim();
		var personal_identification_number = $("#personal_identification_number").val().trim();
		var personal_date = $("#personal_date").val().trim();
		var personal_month = $("#personal_month").val().trim();
		var personal_year = $("#personal_year").val().trim();
		var personal_contact_hp = $("#personal_contact_hp").val().trim();
		var personal_postal_code = $("#personal_postal_code").val().trim();
		var personal_address = $("#personal_address").val().trim();
		var personal_unit_f = $("#personal_unit_f").val().trim();
		var personal_unit_l = $("#personal_unit_l").val().trim();
		var full_name_regex = /^[a-zA-Z\s.]{3,25}$/i;//only letters, period(.),space get accepted
		var zip_regex = /^[a-zA-Z0-9]{3,12}$/i;//numeric, alphabets 3-12 in length
		
		var response='';
		var message='';
		 
		if(personal_full_name == ""){
			var response = 'error';
			var message = "Please enter name";
			$("#personal_full_name").focus();
		}
		/*else if(!full_name_regex.test(personal_full_name)){
			var response = 'error';
			var message = "only letters,period(.),space is allowed and name must be between 3 to 25 characters";
			$("#personal_full_name").focus();
		}*/
		else if(personal_nationality == ""){
			var response = 'error';
			var message = "Please select nationality";
			$("#personal_nationality").focus();
		} 
		else if(personal_identification_type == ""){
			var response = 'error';
			var message = "Please enter identification type";
			$("#personal_identification_type").focus();
		} 
		else if(personal_identification_number == ""){
			var response = 'error';
			var message = "Please enter identification number";
			$("#personal_identification_number").focus();
		}
		else if(personal_date == ""){
			var response = 'error';
			var message = "Please select date";
			$("#personal_date").focus();
		}
		else if(personal_month == ""){
			var response = 'error';
			var message = "Please select month";
			$("#personal_month").focus();
		}
		else if(personal_year == ""){
			var response = 'error';
			var message = "Please select year";
			$("#personal_year").focus();
		}
		else if(personal_contact_hp == ""){
			var response = 'error';
			var message = "Please enter contact hp";
			$("#personal_contact_hp").focus();
		} 
		else if(personal_postal_code == ""){
			var response = 'error';
			var message = "Please enter personal postel code";
			$("#personal_postal_code").focus();
		} 
		else if(!zip_regex.test(personal_postal_code)){
			var response = 'error';
			var message = "zip code should be between 3 to 12 character and alphanumeric values are allowed";
			$("#personal_postal_code").focus();
        }
		else if(personal_address == ""){
			var response = 'error';
			var message = "Please enter personal address";
			$("#personal_address").focus();
		}
		/*else if(personal_unit_f == ""){
			var response = 'error';
			var message = "Please enter unit";
			$("#personal_unit_f").focus();
		}
		 else if(personal_unit_l == ""){
			var response = 'error';
			var message = "Please enter unit";
			$("#personal_unit_l").focus();
		}*/
		else{
			var response = 'success';
			var message = "success";
		}
		
		if(message != '' && message != null)
		{
			//alert(response);
			if(response == 'error'){
				jQuery('html,body').animate({scrollTop:0},500);
				$('#error_particular').html(message).show().css({'color':'red'});
				return false;
			}
			else
			{
				document.getElementById("validation_user").submit();
			}
		}
   }
   
   function change_password()
   {
	   var current_password = $("#current_password").val().trim();
	   var new_password = $("#new_password").val().trim();
	   var confirm_password = $("#confirm_password").val().trim();
	   var password_regex = /^[a-zA-Z0-9!-@#$%^&*()_]{6,15}$/;
		
		var response='';
		var message='';
		 
		if(current_password == ""){
			var response = 'error';
			var message = "Please enter existing password";
			$("#current_password").focus();
		}
		else if(new_password == ""){
			var response = 'error';
			var message = "Please enter new password";
			$("#new_password").focus();
		}
		else if(!password_regex.test(new_password)){
			var response = 'error';
			var message = "Password must be between 6 to 15 characters";
			$("#new_password").focus();
		}
		else if(confirm_password == ""){
			var response = 'error';
			var message = "Please enter confirm password";
			$("#confirm_password").focus();
		}
		else if(!password_regex.test(confirm_password)){
			var response = 'error';
			var message = "Confirm Password must be between 6 to 15 characters";
			$("#confirm_password").focus();
		}
		else if(confirm_password != new_password){
			var response = 'error';
			var message = "Both password should match";
			$("#confirm_password").focus();
		}
		else{
			var response = 'success';
			var message = "success";
		}
		
		if(message != '' && message != null)
		{
			if(response == 'error'){
				window.scrollTo(0,400);
				$('#error_particular').html(message).show().css({'color':'red'});
				return false;
			}
			else
			{
				document.getElementById("submit_form2").submit();
			}
		}
   }
</script> 

<div class="container"> 
  
  <!-- Ist row-->
  <div class="row custom-row top_custm_hdng">
    <div class="clearfix"></div>
    <div id="message"> <font color='red'><?php echo $this->session->flashdata('accounts_errormsg'); ?></font> <font color='green'><?php echo $this->session->flashdata('accounts_successmsg'); ?></font> </div>
    <div class="col-md-12 account_heading">
      <h3 class="col-md-2 offset-md-10">Account</h3>
    </div>
  </div>
  <div class="row accnt_parah">
    <div class="col-md-9 detail">
      <p><?php echo !empty($userinfo['name']) ? $userinfo['name'] : ''; ?></p>
    </div>
   <!-- <div class="col-md-3 rewards"> <span>Rewards points:</span> <font>0</font> </div>-->
  </div>
  <!--end-->
  
  <div class="row main_content_row">
    <div id="content">
        <ul id="tabs" class="nav nav-tabs acc_custom_nav_tabs" data-tabs="tabs">
        <li class="active"><a href="<?php echo base_url();?>accounts/particulars">Particular</a></li>
        <li><a href="<?php echo base_url();?>accounts/manage_causes" >Manage Your Causes</a></li>
        <li><a href="<?php echo base_url();?>pets/manage_pets" >Manage Your Pet Listing</a></li>
       <!-- <li><a href="<?php// echo base_url();?>accounts/appointments">Appointments</a></li>
        <li><a href="<?php echo base_url();?>accounts/hostory">History</a></li>-->
      </ul>
      <div id="my-tab-content" class="tab-content">
        <div class="tab-pane active" id="Particulars">
          <div class="tab-pane tab-2" id="input_perticular">
            <div class="account_type">
              <h1>Account Type:</h1>
              <span><?php echo !empty($type) ? ucfirst($type) : ''; ; ?></span> </div>
            <div class="personl_hding">
              <h3><?php echo !empty($type) ? ucfirst($type) : ''; ; ?> Account</h3>
              <!--<a href="#" class="edit_bttn">Edit Account</a>--> </div>
            <div class="clearfix"></div>
            <span id="error_particular"></span>
            <?php 
			
			if($type == 'organisation' ) : ?>
            
            <form id="submit_form1" class="form-horizontal custom_form_horizontal steps" method="post" action="<?php echo base_url() ?>accounts/edit_org_account_to_database" role="form">
              <div class="form-group">
                <label for="organisation_full_name" class="col-sm-3 control-label">Name of organisation:<span style="color:#F00;">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="organisation_full_name" placeholder="" name="organisation_full_name" value="<?php echo !empty($userinfo['name']) ? $userinfo['name'] : ''; ?> ">
                </div>
              </div>
              <div class="form-group">
                <label for="location" class="col-sm-3 control-label">Location Type:<span style="color:#F00;">*</span></label>
                <div class="col-sm-8">
                
                  <select id="organisation_location" name="organisation_location" class="selectpicker show-menu-arrow input-xlarge nation">
                 <!-- <option value="">Select Type</option>
                    <?php  //if(isset($country) && !empty($country)) {
                         //foreach($country as $coun) : ?>
                    <?php //if($userinfo['location'] == strtolower($coun['country'])) { $selected = 'selected="selected"'; } else { $selected = '' ; } ?>
                    <option <?php //echo !empty($selected) ? $selected: ''; ?> value=<?php //echo strtolower($coun['country']) ?>><?php //echo $coun['country'] ?></option>
                    <?php //endforeach; }?>-->
                     
                    <option value="singapore" <?php if($userinfo['location']=="singapore"){echo 'selected="selected"';}?>>Singapore</option> 
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="registration_number" class="col-sm-3 control-label">Organistaion Registeration No:<span style="color:#F00;">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="registration_number" name="registration_number" placeholder="123456" value="<?php echo !empty($userinfo['registration_number']) ? $userinfo['registration_number'] : ''; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="person_in_charge" class="col-sm-3 control-label">Person In-Charge:</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="person_in_charge" name="person_in_charge" placeholder="123456" value="<?php echo !empty($userinfo['person_in_charge']) ? $userinfo['person_in_charge'] : ''; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="contact_office" class="col-sm-3 control-label">Contact Office:<span style="color:#F00;">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control"  placeholder="Contact Office" name="organisation_contact_office" id="contact_office" value="<?php echo !empty($userinfo['contact_office']) ? $userinfo['contact_office'] : ''; ?>">
                </div>
                <!--<div class="col-md-2 option"> (Optional) </div>--> 
              </div>
              <div class="form-group">
                <label for="firstname" class="col-sm-3 control-label">Email Address:<span style="color:#F00;">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="organisation_email" disabled="disabled" name="organisation_email" placeholder="johnmartin@gmail.com" value="<?php echo !empty($userinfo['email']) ? $userinfo['email'] : ''; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="firstname" class="col-sm-3 control-label">Postal Code:<span style="color:#F00;">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="organisation_postal_code" name="organisation_postal_code" placeholder="12345" value="<?php echo !empty($userinfo['postal_code']) ? $userinfo['postal_code'] : '' ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="organisation_address" class="col-sm-3 control-label">Address:<span style="color:#F00;">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="organisation_address" name="organisation_address" value="<?php echo !empty($userinfo['address']) ? $userinfo['address'] : ''; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="organisation_username" class="col-sm-3 control-label">Username:<span style="color:#F00;">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="organisation_username" name="organisation_username"  disabled="disabled" value="<?php echo !empty($userinfo['username']) ? $userinfo['username'] : ''; ?>">
                  <input type="hidden" class="form-control" name="user_id" id="user_id" value="<?php echo !empty($userinfo['id']) ? $userinfo['id'] : '' ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="organisation_unit" class="col-sm-3 control-label">Unit:<span style="color:#F00;">*</span></label>
                <div class="col-sm-8">
                  <div class="col-sm-1 hash">#</div>
                  <div class="col-md-3 col-sm-5">
                    <input type="text" class="form-control " id="organisation_unit_f" name="organisation_unit_f" placeholder="00" value="<?php echo !empty($userinfo['unit_f']) ? $userinfo['unit_f']: '';  ?> ">
                  </div>
                  <div class="col-sm-1 hash">-</div>
                  <div class="col-md-3 col-sm-5">
                    <input type="text" class="form-control" id="organisation_unit_l" name="organisation_unit_l" value="<?php echo !empty($userinfo['unit_l']) ? $userinfo['unit_l'] : '' ?>">
                  </div>
                </div>
              </div>
              
              <div class="form-group">
                <div class="col-md-2 col-sm-2 col-md-offset-7 col-sm-offset-3 control-label col-xs-5">
                <button type="submit"  class="btn btn-default black-bt" onclick="return validation_organisation();" >Save</button>
                </div>
                <div class="col-sm-2"> <a class="btn btn-primry1 next" href="<?php echo base_url().'accounts/particulars' ?>">Cancel</a> </div>
              </div>
            </form>
            
            
            <?php else : ?>
            <form id="validation_user" class="form-horizontal custom_form_horizontal steps" method="post" action="<?php echo base_url() ?>accounts/edit_user_account_to_database" role="form">
              <div class="form-group">
                <label for="personal_full_name" class="col-sm-3 control-label">Name:<span style="color:#F00;">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="personal_full_name" placeholder="" name="personal_full_name" value="<?php echo !empty($userinfo['name']) ? $userinfo['name'] : ''; ?> ">
                </div>
              </div>
              <div class="form-group">
                <label for="location" class="col-sm-3 control-label">Nationality:<span style="color:#F00;">*</span></label>
                <div class="col-sm-8">
                  <select id="personal_nationality" name="personal_nationality" class="selectpicker show-menu-arrow input-xlarge nation">
                    <!--<option value="">Select Nationality</option>-->
                     <option value="singapore" <?php if($userinfo['nationality']=="singapore"){echo 'selected="selected"';}?>>Singapore</option> 
                   <!-- <?php // if(isset($country) && ($country != '')) {
                        // foreach($country as $coun) : ?>
                    <?php //if($userinfo['nationality'] == strtolower($coun['country'])) 
					  /*{
						   $selected = 'selected=selected'; 
					  } 
					  else 
					  {
						   $selected = '' ; 
					  }*/ ?>
                    <option <?php //echo !empty($selected) ? $selected: ''; ?> value="<?php //echo strtolower($coun['country']) ?>"><?php //echo $coun['country'] ?></option>
                    <?php //endforeach; }?>-->
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="personal_identification_type" class="col-sm-3 control-label">Identification Type:<span style="color:#F00;">*</span></label>
                <div class="col-sm-8">
               
               <select class="selectpicker show-menu-arrow input-xlarge nation" id="personal_identification_type" name="personal_identification_type">
                  <option value="">Select Identification Type</option>
                  <option value="citizenship" <?php if($userinfo["identification_type"] == "citizenship"){echo 'selected="selected"';}?>>Citizenship</option>
                  <option value="pr" <?php if($userinfo["identification_type"] == "pr"){echo 'selected="selected"';}?>>PR</option>
                </select>
               
                </div>
              </div>
              <div class="form-group">
                <label for="personal_identification_number" class="col-sm-3 control-label">Identification Number:<span style="color:#F00;">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="personal_identification_number" name="personal_identification_number" placeholder="123456" value="<?php echo !empty($userinfo['identification_number']) ? $userinfo['identification_number'] : ''; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="female" class="col-sm-3 control-label">Gender:<span style="color:#F00;">*</span></label>
               
                  <div class="col-sm-2 col-md-2 col-xs-6">
                    <?php  if(isset($userinfo['gender']) && $userinfo['gender'] == 'm') { $male = 'checked=checked'; } else { $female = 'checked=checked'; }?>
                    <input <?php if(isset($male) && !empty($male)) { echo $male; } ?> type="radio" value="m" class="gender" id="male" name="personal_gender">
                    
                    &nbsp;&nbsp;
                    <label id="male">Male</label>
                  </div>
                  <div class="col-sm-2 col-md-2 col-xs-6">
                  <input <?php if(isset($female) && !empty($female)) { echo $female; } ?> type="radio" value="f" class="gender" id="female" name="personal_gender">
                    
                    &nbsp;&nbsp;
                    <label id="female">Female</label>
                  </div>
                
              </div>
              <div class="form-group">
                <label for="Date of Birth" class="col-sm-3 control-label">Date of Birth:<span style="color:#F00;">*</span></label>
                <?php 
				
				
				if(isset($userinfo['d_o_b']) && !empty($userinfo['d_o_b'])) { ?>
                <div class="col-sm-8   custom_select ">
                  <div class="col-sm-4">
                    <?php $date_of_birth = explode('-', $userinfo['d_o_b']); ?>
                    <?php //debug($date_of_birth);  die; ?>
                    <?php ?>
                    <select class="selectpicker show-menu-arrow" name="personal_date" id="personal_date" style="width:95%;">
                      <option value="">Day</option>
                      <?php $dates = range(1, 31) ?>
                      <?php foreach($dates as $date) : ?>
                      <?php if($date == $date_of_birth[2]) { $selected = 'selected=selected'; } else { $selected = ''; } ?>
                      <option <?php if(isset($selected) && ($selected != '')); echo $selected; ?> value="<?php echo $date; ?>"><?php echo $date; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-sm-4">
                    <select class="selectpicker show-menu-arrow" name="personal_month" id="personal_month" style="width:95%;">
                      <option value="">Month</option>
                      <?php $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'); ?>
                      <?php foreach($months as $k=>$v) : ?>
                      <?php if($k + 1 == $date_of_birth[1]) { $selected = 'selected=selected'; } else { $selected = ''; } ?>
                      <option <?php if(isset($selected) && ($selected != '')); echo $selected; ?> value="<?php echo $k + 1; ?>"><?php echo $v; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-sm-4">
                    <select class="selectpicker show-menu-arrow" name="personal_year" id="personal_year" style="width:95%;">
                      <option value="">Year</option>
                      <?php $year = '1930'; ?>
                      <?php for($i=$year; $i <= date('Y'); $i++) : ?>
                      <?php if($i == $date_of_birth[0]) { $selected = 'selected=selected'; } else { $selected = ''; } ?>
                      <option <?php if(isset($selected) && ($selected != '')); echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                      <?php endfor; ?>
                    </select>
                  </div>
                </div>
                <?php } ?>
              </div>
              <div class="form-group">
                <label for="firstname" class="col-sm-3 control-label">Contact(HP):<span style="color:#F00;">*</span></label>
                <div class="col-sm-8 col-xs-12">
                  <input type="text" id="personal_contact_hp" name="personal_contact_hp" class="form-control"
                       placeholder="" value="<?php echo !empty($userinfo['contact_hp']) ? $userinfo['contact_hp'] : '';  ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="firstname" class="col-sm-3 control-label">Contact Home:</label>
                <div class="col-sm-8 col-xs-12">
                  <input type="text" class="form-control" name="personal_contact_home" id="personal_contact_home"
                       placeholder="" value="<?php echo !empty($userinfo['contact_home']) ? $userinfo['contact_home'] : '';  ?>">
                </div>
                <!--<div class="col-md-2 option"> (Optional) </div>--> 
              </div>
              <div class="form-group">
                <label for="contact_office" class="col-sm-3 control-label">Contact Office:</label>
                <div class="col-sm-8 col-xs-12">
                  <input type="text" class="form-control" name="personal_contact_office" id="personal_contact_office" value="<?php echo !empty($userinfo['contact_office']) ? $userinfo['contact_office'] : ''; ?>">
                </div>
                <!--<div class="col-md-2 option"> (Optional) </div>--> 
              </div>
              <div class="form-group">
                <label for="firstname" class="col-sm-3 control-label">Email Address:<span style="color:#F00;">*</span></label>
                <div class="col-sm-8 col-xs-12">
                  <input type="text" class="form-control" id="personal_email" disabled="disabled" name="personal_email" placeholder="johnmartin@gmail.com" value="<?php echo !empty($userinfo['email']) ? $userinfo['email'] : '' ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="firstname" class="col-sm-3 control-label">Postal Code:<span style="color:#F00;">*</span></label>
                <div class="col-sm-8 col-xs-12">
                  <input type="text" class="form-control" id="personal_postal_code" name="personal_postal_code" placeholder="12345" value="<?php echo !empty($userinfo['postal_code']) ? $userinfo['postal_code'] : ''; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="organisation_address" class="col-sm-3 control-label">Address:<span style="color:#F00;">*</span></label>
                <div class="col-sm-8 col-xs-12">
                  <input type="text" class="form-control" id="personal_address" name="personal_address" value="<?php echo !empty($userinfo['address']) ? $userinfo['address'] : ''; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="organisation_username" class="col-sm-3 control-label">Username:<span style="color:#F00;">*</span></label>
                <div class="col-sm-8 col-xs-12">
                  <input type="text" class="form-control" id="personal_username" name="personal_username"  disabled="disabled" value="<?php echo $userinfo['username'] ?>">
                  <input type="hidden" class="form-control" name="user_id" id="user_id" value="<?php echo !empty($userinfo['id']) ? $userinfo['id'] : ''; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="organisation_unit" class="col-sm-3 control-label">Unit:<span style="color:#F00;">*</span></label>
                <div class="col-sm-8 col-xs-12">
                  <div class="col-sm-1">#</div>
                  <div class="col-md-3 col-sm-5">
                    <input type="text" class="form-control " id="personal_unit_f" name="personal_unit_f" placeholder="00" value="<?php echo !empty($userinfo['unit_f']) ? $userinfo['unit_f'] : '' ?>">
                  </div>
                  <div class="col-sm-1">-</div>
                  <div class="col-md-3 col-sm-5">
                    <input type="text" class="form-control" id="personal_unit_l" name="personal_unit_l" value="<?php echo !empty($userinfo['unit_l']) ? $userinfo['unit_l'] : ''  ?>">
                  </div>
                </div>
              </div>
              
           <!--<div class="form-group has-success has-feedback">
                <label class="control-label col-sm-3">Default Payment Method:</label>
                <div class="col-md-3 col-sm-6 col-xs-6 default_none">None</div>
                <div class="col-md-1 col-sm-6 col-xs-6 col-md-offset-1">
                  <input type="checkbox" class="checkBoxClass"/>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="form-group has-success has-feedback">
                <label class="control-label col-sm-3"></label>
                <div class="col-md-3 col-sm-6 col-xs-6 default_none">None</div>
                <div class="col-md-1 col-sm-6 col-xs-6 col-md-offset-1">
                  <input type="checkbox" class="checkBoxClass"/>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="form-group has-success has-feedback">
                <label class="control-label col-sm-3"></label>
                <div class="col-md-3 col-sm-6 col-xs-6 default_none">None</div>
                <div class="col-md-1 col-sm-6 col-xs-6 col-md-offset-1">
                  <input type="checkbox" class="checkBoxClass"/>
                </div>
              </div>-->
              
              
              <div class="form-group">
                <div class="col-md-2 col-sm-2 col-md-offset-7 col-sm-offset-7 control-label col-xs-5">
                <button type="button"  class="btn btn-default black-bt" onclick="return validation_user();" >Save</button>
                </div>
                <div class="col-sm-2 col-xs-5"> <a class="btn btn-primry1 next" href="<?php echo base_url().'accounts/particulars' ?>">Cancel</a> </div>
              </div>
            </form>
            <?php endif; ?>
            
            <h3>Change Password</h3>
            <form id="submit_form2" class="form-horizontal custom_form_horizontal steps" role="form" method="post" action="<?php echo base_url().'accounts/edit_account_password' ?>">
              <div class="form-group">
                <label for="firstname" class="col-sm-3 control-label">Existing Password:<span style="color:#F00;">*</span></label>
                <div class="col-sm-8 col-md-8">
                  <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Please enter existing password" value="<?php //echo $check_password["current_password"]?>">
                </div>
              </div>
              <div class="form-group">
                <label for="firstname" class="col-sm-3 control-label">New Password:<span style="color:#F00;">*</span></label>
                <div class="col-sm-8 col-md-8">
                  <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Please enter new password" value="<?php //echo $check_password["password"]?>">
                </div>
              </div>
              <div class="form-group">
                <label for="firstname" class="col-sm-3 control-label">Retype New Password:<span style="color:#F00;">*</span></label>
                <div class="col-sm-8 col-md-8">
                  <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Please re-enter password">
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-2 col-sm-2 col-md-offset-7 col-sm-offset-7 control-label col-xs-5">
                  <button type="button"  class="btn btn-default black-bt" onclick="return change_password();" >Save</button>
                </div>
                <div class="col-sm-2 col-xs-5">
                  <button class="btn btn-primry1 next" type="reset">Cancel</button>
                </div>
              </div>
            </form>
          </div>
        </div>
       
      </div>
    </div>
  </div>
</div>

