<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>

<!-- BEGIN PAGE HEADER-->
<div class="row">
  <div class="col-md-12"> 
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title"> Edit user </h3>
    <ul class="page-breadcrumb breadcrumb">
      <li> <i class="fa fa-home"></i> <a href="<?php echo base_url(); ?>"> Home </a> <i class="fa fa-angle-right"></i> </li>
      
      <li> <a href="javascript:void(0);"> Edit organisation </a> </li>
    </ul>
    <!-- END PAGE TITLE & BREADCRUMB--> 
  </div>
</div>
<!-- END PAGE HEADER--> 
<!-- BEGIN PAGE CONTENT-->
 <div  id="message">
 <font color='red'><?php echo $this->session->flashdata('errormsg'); ?></font> 
 <font color='green'><?php echo $this->session->flashdata('successmsg'); ?></font> </div>
<div class="row profile">
  <div class="col-md-12"> 
    <!--BEGIN TABS-->
    <div class="tabbable tabbable-custom tabbable-full-width">
      <ul class="nav nav-tabs">
        <li class="active"> <a href="#tab_1_1" data-toggle="tab"> Edit organisation </a> </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1_1">
          <div class="row">
            <div class="col-md-9">
              <div class="row"></div>
              <!--end row-->
              <div class="tab-pane active" id="tab1"></div>
              <form name="frm" id="submit_form1" action="<?php echo base_url() .$this->router->class;?>/edit_organisation_to_database" method="post">
              
              <?php if($do=="edit"){?>
                  <input type="hidden" name="user_id" value="<?php echo $userinfo['id'];?>">
              <?php	}?>
              
              
              <div class="form-group flare">
                <label class="control-label col-md-4"> Name of organisation<span class="required"> * </span> </label>
                <div class="col-md-8">
                  <input class="form-control"  name="organisation_full_name" id="organisation_full_name" type="text" value="<?php echo !empty($userinfo['name']) ? $userinfo['name'] : "";?>"/>
                </div>
              </div>
              
              <div class="form-group flare">
                <label class="control-label col-md-4"> Location Type<span class="required"> * </span> </label>
                <div class="col-md-8">
                  <select id="organisation_location" name="organisation_location" >
                    <option value="">Select Type</option>
                    <?php  if(isset($country) && !empty($country)) {
                         foreach($country as $coun) : ?>
                    <?php if($userinfo['location'] == strtolower($coun['country'])) { $selected = 'selected="selected"'; } else { $selected = '' ; } ?>
                    <option <?php echo !empty($selected) ? $selected: ''; ?> value=<?php echo strtolower($coun['country']) ?>><?php echo $coun['country'] ?></option>
                    <?php endforeach; }?>
                  </select>
                </div>
              </div>
              
               <div class="form-group flare">
                <label class="control-label col-md-4">Organistaion Registeration No<span class="required"> * </span> </label>
                <div class="col-md-8">
                  <input class="form-control"  name="person_in_charge" id="person_in_charge" type="text" value="<?php echo !empty($userinfo['person_in_charge']) ? $userinfo['person_in_charge'] : "";?>"/>
                </div>
              </div>
              
               <div class="form-group flare">
                <label class="control-label col-md-4">Person In-Charge </label>
                <div class="col-md-8">
                  <input class="form-control"  name="registration_number" id="registration_number" type="text" value="<?php echo !empty($userinfo['registration_number']) ? $userinfo['registration_number'] : "";?>"/>
                </div>
              </div>
              
               <div class="form-group flare">
                <label class="control-label col-md-4"> Contact Office<span class="required"> * </span> </label>
                <div class="col-md-8">
                  <input class="form-control"  name="organisation_contact_office" id="contact_office" type="text" value="<?php echo !empty($userinfo['contact_office']) ? $userinfo['contact_office'] : "";?>"/>
                </div>
              </div>
              
              
              <div class="form-group flare">
                <label class="control-label col-md-4"> Email Address<span class="required"> * </span> </label>
                <div class="col-md-8">
                  <input class="form-control"  name="organisation_email" disabled="disabled" id="organisation_email" type="text" value="<?php echo !empty($userinfo['email']) ? $userinfo['email'] : "";?>"/>
                </div>
              </div>
              
                <div class="form-group flare">
                <label class="control-label col-md-4"> Postal Code<span class="required"> * </span> </label>
                <div class="col-md-8">
                  <input class="form-control"  name="organisation_postal_code"  id="organisation_postal_code" type="text" value="<?php echo !empty($userinfo['postal_code']) ? $userinfo['postal_code'] : "";?>"/>
                </div>
              </div>
              
                <div class="form-group flare">
                <label class="control-label col-md-4"> Address<span class="required"> * </span> </label>
                <div class="col-md-8">
                  <input class="form-control"  name="organisation_address"  id="organisation_address" type="text" value="<?php echo !empty($userinfo['address']) ? $userinfo['address'] : "";?>"/>
                </div>
              </div>
              
              
               <div class="form-group flare">
                <label class="control-label col-md-4"> Username<span class="required"> * </span> </label>
                <div class="col-md-8">
                  <input class="form-control"  name="organisation_username"  id="organisation_username"  disabled="disabled" type="text" value="<?php echo !empty($userinfo['username']) ? $userinfo['username'] : "";?>"/>
                </div>
              </div>
              
              
               <div class="form-group flare">
                <label class="control-label col-md-4"> Unit-f<span class="required"> * </span> </label>
                <div class="col-md-8">
                  <input class="form-control"  name="organisation_unit_f"  id="organisation_unit_f" type="text" value="<?php echo !empty($userinfo['unit_f']) ? $userinfo['unit_f'] : "";?>"/>
                </div>
              </div>
              
                 <div class="form-group flare">
                <label class="control-label col-md-4"> Unit-l <span class="required"> * </span> </label>
                <div class="col-md-8">
                 <input class="form-control"  name="organisation_unit_l"  id="organisation_unit_l" type="text" value="<?php echo !empty($userinfo['unit_l']) ? $userinfo['unit_l'] : "";?>"/>
                  
                </div>
              </div>
              
           
              </div>
             
              <div class="form-group">
                <label class="control-label col-md-4">&nbsp; </label>
                <div class="col-md-8">
                   <button type="submit" class="btn theme-btn green pull-left" onclick="return validation_organisation();">Save</button>
                   <a href="<?php echo base_url().$this->router->class;?>/manage_organisation"  class="btn theme-btn grey pull-left margd">Cancel</a>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!--tab_1_2--> 
      
    </div>
  </div>
  
  <!--END TABS--> 
</div>
<!-- END PAGE CONTENT--> 
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/jquery.cokie.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script> 
<!-- END CORE PLUGINS --> 
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"  type="text/javascript" ></script> 
<script src="<?php echo base_url(); ?>assets/plugins/fancybox/source/jquery.fancybox.pack.js"></script> 
<script src="<?php echo base_url(); ?>assets/scripts/core/app.js"></script> 
<script src="<?php echo base_url(); ?>assets/scripts/custom/search.js"></script> 
<script>
jQuery(document).ready(function() {    
   App.init();
   Search.init();
});
</script>
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
		else if(!full_name_regex.test(organisation_full_name))
		{
			var response = 'error';
			var message = "only letters,period(.),space is allowed and organisation name must be between 3 to 25 characters";
			$("#personal_full_name").focus();
			$("#personal_full_name").css("background-color", "rgba(255, 0, 0, 0.3)");
		}
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
		else if(organisation_unit_f == "" || organisation_unit_f == '0'){
			var response = 'error';
			var message = "Please enter unit";
			$("#organisation_unit_f").focus();
		}
		else if(organisation_unit_l == "" || organisation_unit_l == '0'){
			var response = 'error';
			var message = "Please enter unit";
			$("#organisation_unit_l").focus();
		}
		else{
			var response = 'success';
			var message = "success";
		}
		
		if(message != '' && message != null)
		{
			//alert(response);
			if(response == 'error'){
				jQuery('html,body').animate({scrollTop:0},500);
				$('#message').html(message).show().css({'color':'red'});
				return false;
			}
			else
			{
				document.getElementById("submit_form1").submit();
			}
		}
   }
   </script>