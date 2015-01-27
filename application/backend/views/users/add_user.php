
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>

<!-- BEGIN PAGE HEADER-->
<div class="row">
  <div class="col-md-12"> 
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title"> Edit user </h3>
    <ul class="page-breadcrumb breadcrumb">
      <li> <i class="fa fa-home"></i> <a href="<?php echo base_url(); ?>"> Home </a> <i class="fa fa-angle-right"></i> </li>
      
      <li> <a href="javascript:void(0);"> Edit user </a> </li>
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
        <li class="active"> <a href="#tab_1_1" data-toggle="tab"> Edit user </a> </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1_1">
          <div class="row">
            <div class="col-md-9">
              <div class="row"></div>
              <!--end row-->
              <div class="tab-pane active" id="tab1"></div>
              <form name="frm" id="validation_user" action="<?php echo base_url() .$this->router->class;?>/edit_user_to_database" method="post">
              
              <?php if($do=="edit"){?>
                  <input type="hidden" name="user_id" value="<?php echo $userinfo['id'];?>">
              <?php	}?>
              
              
              <div class="form-group flare">
                <label class="control-label col-md-4"> Name<span class="required"> * </span> </label>
                <div class="col-md-8">
                  <input class="form-control"  name="personal_full_name" id="personal_full_name" type="text" value="<?php echo !empty($userinfo['name']) ? $userinfo['name'] : "";?>"/>
                </div>
              </div>
              
              <div class="form-group flare">
                <label class="control-label col-md-4"> Nationality<span class="required"> * </span> </label>
                <div class="col-md-8">
                  <select id="personal_nationality" name="personal_nationality" >
                    <option value="">Select Nationality</option>
                    <?php  if(isset($country) && ($country != '')) {
                         foreach($country as $coun) : ?>
                    <?php if($userinfo['nationality'] == strtolower($coun['country'])) 
						  {
							   $selected = 'selected=selected'; 
						  } 
						  else 
						  {
							   $selected = '' ; 
						  } ?>
                    <option <?php echo !empty($selected) ? $selected: ''; ?> value="<?php echo strtolower($coun['country']) ?>"><?php echo $coun['country'] ?></option>
                    <?php endforeach; }?>
                  </select>
                </div>
              </div>
              
               <div class="form-group flare">
                <label class="control-label col-md-4"> Identification Type<span class="required"> * </span> </label>
                <div class="col-md-8">
                 <select id="personal_identification_type" name="personal_identification_type">
                  <option value="">Select Identification Type</option>
                  <option value="citizenship" <?php if($userinfo["identification_type"] == "citizenship"){echo 'selected="selected"';}?>>Citizenship</option>
                  <option value="pr" <?php if($userinfo["identification_type"] == "pr"){echo 'selected="selected"';}?>>PR</option>
                </select>
                </div>
              </div>
              
               <div class="form-group flare">
                <label class="control-label col-md-4"> Identification Number<span class="required"> * </span> </label>
                <div class="col-md-8">
                  <input class="form-control"  name="personal_identification_number" id="personal_identification_number" type="text" value="<?php echo !empty($userinfo['identification_number']) ? $userinfo['identification_number'] : "";?>"/>
                </div>
              </div>
              
               <div class="form-group flare">
                <label class="control-label col-md-4"> Gender<span class="required"> * </span> </label>
                <div class="col-md-8">
                  <?php  if(isset($userinfo['gender']) && $userinfo['gender'] == 'm') { $male = 'checked=checked'; } else { $female = 'checked=checked'; }?>
                    <input <?php if(isset($male) && !empty($male)) { echo $male; } ?> type="radio" value="m" class="gender" id="male" name="personal_gender">
                    
                    &nbsp;&nbsp;
                    <label id="male">Male</label>
                  </div>
                  <div class="col-sm-5">
                  <input <?php if(isset($female) && !empty($female)) { echo $female; } ?> type="radio" value="f" class="gender" id="female" name="personal_gender">
                    
                    &nbsp;&nbsp;
                    <label id="female">Female</label>
                </div>
              </div>
              
              
              <div class="form-group flare">
                <label class="control-label col-md-4"> Date of Birth<span class="required"> * </span> </label>
                <div class="col-md-8">
                  <?php if(isset($userinfo['d_o_b']) && !empty($userinfo['d_o_b'])) { ?>
                <div class="col-sm-8   custom_select ">
                  <div class="col-sm-3">
                    <?php $date_of_birth = explode('-', $userinfo['d_o_b']); ?>
                    <?php //debug($date_of_birth);  die; ?>
                    <?php ?>
                    <select name="personal_date" id="personal_date" style="width:95%;">
                      <option value="">Date</option>
                      <?php $dates = range(1, 31) ?>
                      <?php foreach($dates as $date) : ?>
                      <?php if($date == $date_of_birth[2]) { $selected = 'selected=selected'; } else { $selected = ''; } ?>
                      <option <?php if(isset($selected) && ($selected != '')); echo $selected; ?> value="<?php echo $date; ?>"><?php echo $date; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-sm-5">
                    <select name="personal_month" id="personal_month" style="width:95%;">
                      <option value="">Month</option>
                      <?php $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'); ?>
                      <?php foreach($months as $k=>$v) : ?>
                      <?php if($k + 1 == $date_of_birth[1]) { $selected = 'selected=selected'; } else { $selected = ''; } ?>
                      <option <?php if(isset($selected) && ($selected != '')); echo $selected; ?> value="<?php echo $k + 1; ?>"><?php echo $v; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-sm-4">
                    <select  name="personal_year" id="personal_year" style="width:95%;">
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
              </div>
              
               <div class="form-group flare">
                <label class="control-label col-md-4"> Contact(HP)<span class="required"> * </span> </label>
                <div class="col-md-8">
                  <input class="form-control"  name="personal_contact_hp" id="personal_contact_hp" type="text" value="<?php echo !empty($userinfo['contact_hp']) ? $userinfo['contact_hp'] : "";?>"/>
                </div>
              </div>
              
               <div class="form-group flare">
                <label class="control-label col-md-4"> Contact Home<span class="required"> * </span> </label>
                <div class="col-md-8">
                  <input class="form-control"  name="personal_contact_home" id="personal_contact_home" type="text" value="<?php echo !empty($userinfo['contact_home']) ? $userinfo['contact_home'] : "";?>"/>
                </div>
              </div>
              
               <div class="form-group flare">
                <label class="control-label col-md-4"> Contact Office<span class="required"> * </span> </label>
                <div class="col-md-8">
                  <input class="form-control"  name="personal_contact_office" id="personal_contact_office" type="text" value="<?php echo !empty($userinfo['contact_office']) ? $userinfo['contact_office'] : "";?>"/>
                </div>
              </div>
              
              
              <div class="form-group flare">
                <label class="control-label col-md-4"> Email<span class="required"> * </span> </label>
                <div class="col-md-8">
                  <input class="form-control"  name="personal_email" disabled="disabled" id="personal_email" type="text" value="<?php echo !empty($userinfo['email']) ? $userinfo['email'] : "";?>"/>
                </div>
              </div>
              
                <div class="form-group flare">
                <label class="control-label col-md-4"> Postal Code<span class="required"> * </span> </label>
                <div class="col-md-8">
                  <input class="form-control"  name="personal_postal_code"  id="personal_postal_code" type="text" value="<?php echo !empty($userinfo['postal_code']) ? $userinfo['postal_code'] : "";?>"/>
                </div>
              </div>
              
                <div class="form-group flare">
                <label class="control-label col-md-4"> Address<span class="required"> * </span> </label>
                <div class="col-md-8">
                  <input class="form-control"  name="personal_address"  id="personal_address" type="text" value="<?php echo !empty($userinfo['address']) ? $userinfo['address'] : "";?>"/>
                </div>
              </div>
              
              
               <div class="form-group flare">
                <label class="control-label col-md-4"> Username<span class="required"> * </span> </label>
                <div class="col-md-8">
                  <input class="form-control"  name="personal_username"  id="personal_username"  disabled="disabled" type="text" value="<?php echo !empty($userinfo['username']) ? $userinfo['username'] : "";?>"/>
                </div>
              </div>
              
              
               <div class="form-group flare">
                <label class="control-label col-md-4"> Unit-f<span class="required"> * </span> </label>
                <div class="col-md-8">
                  <input class="form-control"  name="personal_unit_f"  id="personal_unit_f" type="text" value="<?php echo !empty($userinfo['unit_f']) ? $userinfo['unit_f'] : "";?>"/>
                </div>
              </div>
              
                 <div class="form-group flare">
                <label class="control-label col-md-4"> Unit-l <span class="required"> * </span> </label>
                <div class="col-md-8">
                 <input class="form-control"  name="personal_unit_l"  id="personal_unit_l" type="text" value="<?php echo !empty($userinfo['unit_l']) ? $userinfo['unit_l'] : "";?>"/>
                  
                </div>
              </div>
              
           
              </div>
             
              <div class="form-group">
                <label class="control-label col-md-4">&nbsp; </label>
                <div class="col-md-8">
                   <button type="button" value="Save" class="btn theme-btn green pull-left" onclick="return validation_user();">Save</button>
                          <a href="<?php echo base_url().$this->router->class;?>/manage_user"  class="btn theme-btn grey pull-left margd">Cancel</a>
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
<script>
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
		else if(!full_name_regex.test(personal_full_name)){
			var response = 'error';
			var message = "only letters,period(.),space is allowed and name must be between 3 to 25 characters";
			$("#personal_full_name").focus();
		}
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
			var message = "Please enter postal code";
			$("#personal_postal_code").focus();
		} 
		else if(!zip_regex.test(personal_postal_code)){
			var response = 'error';
			var message = "Postal code should be between 3 to 12 characters and alphanumeric values are allowed";
			$("#personal_postal_code").focus();
        }
		else if(personal_address == ""){
			var response = 'error';
			var message = "Please enter personal address";
			$("#personal_address").focus();
		}
		else if(personal_unit_f == ""){
			var response = 'error';
			var message = "Please enter unit";
			$("#personal_unit_f").focus();
		}
		 else if(personal_unit_l == ""){
			var response = 'error';
			var message = "Please enter unit";
			$("#personal_unit_l").focus();
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
				document.getElementById("validation_user").submit();
			}
		}
   }
</script>