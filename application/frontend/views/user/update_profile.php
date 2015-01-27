<?php //print_r($userdata); ?>
<!-- BEGIN PAGE HEADER-->

<div class="row">
  <div class="col-md-12"> 
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title"> Update Profile </h3>
    <ul class="page-breadcrumb breadcrumb">
      <li> <i class="fa fa-home"></i> <a href="<?php echo base_url(); ?>"> Home </a> <i class="fa fa-angle-right"></i> </li>
      <li> <a href="<?php echo base_url(); ?>user/update_profile"> Update Profile </a> </li>
    </ul>
    <!-- END PAGE TITLE & BREADCRUMB--> 
  </div>
</div>
<!-- END PAGE HEADER--> 
<!-- BEGIN PAGE CONTENT-->
<div class="row profile">
  <div class="col-md-12"> 
    <!--BEGIN TABS-->
    <div class="tabbable tabbable-custom tabbable-full-width">
      <ul class="nav nav-tabs">
        <li class="active"> <a href="#tab_1_1" data-toggle="tab"> Update Profile </a> </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1_1">
          <div class="row">
            <div class="col-md-9">
              <div class="row"> 
                <div style=" position:absolute; float:left; left:211px;" id="message"> <font color='red'><?php echo $this->session->flashdata('errormsg'); ?></font> <font color='green'><?php echo $this->session->flashdata('successmsg'); ?></font> </div>
                <!--end col-md-8--> 
                
                <!--end col-md-4--> 
              </div>
              <!--end row-->
              <div class="tab-pane active" id="tab1">
                <h3 class="block">Provide your  details</h3>
                <h4 class="form-section">Basic Information</h4>
                
                <form name="frm" id="frm" action="<?php echo base_url();?>user/add_volunteer_to_database" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="<?php echo $userdata1['id'];?>">
                  <?php /*?><div class="form-group">
                    <label class="control-label col-md-4">User Name <span class="required"> * </span></label>
                    <div class="col-md-8">
                      <input type="text" readonly="readonly" disabled="disabled" name="username" class="form-control" value="<?php echo !empty($userdata1['username']) ? $userdata1['username']: ""; ?>">
                      <span class="help-block"><!-- Enter your user name--> </span> </div>
                  </div><?php */?>
                  <div class="form-group">
                    <label class="control-label col-md-4">Email <span class="required"> * </span></label>
                    <div class="col-md-8">
                      <input type="text" id="email" class="form-control" name="email" value="<?php echo !empty($userdata1['email']) ? $userdata1['email']: ""; ?>">
                      <span class="help-block" id="email_error"> </span> </div>
                  </div>
                  <h4 class="form-section">Account</h4>
                  <div class="form-group">
                    <label class="control-label col-md-4">Full Name <span class="required"> * </span></label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" id="fullname" name="name" value="<?php echo !empty($userdata1['name']) ? $userdata1['name']: ""; ?>">
                      <span class="help-block" id="fullname_error"> </span> </div>
                  </div>
                  <div class="form-group flare">
                    <label class="control-label col-md-4">Gender <span class="required"> * </span></label>
                    <div class="col-md-8">
                      <input type="radio" name="gender" value="Male" <?php if(!empty($userdata1['gender'])){ if($userdata1['gender'] == "Male"){ echo 'checked="checked"'; }} ?> data-title="Male" id="male"/>
                      Male
                      </label>
                      <label>
                        <input type="radio" name="gender" value="Female"  <?php  if(!empty($userdata1['gender'])){ if($userdata1['gender'] == "Female"){ echo 'checked="checked" ';} } ?> data-title="Female" id="female"/>
                        Female </label>
                      <div id="gender_error"> </div>
                      <!-- <span class="help-block" > </span> --></div>
                  </div>
                  <div class="form-group flare">
                    <label class="control-label col-md-4">National ID/Passport <span class="required"> * </span></label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="national_id" id="national_id" value="<?php echo !empty($userdata1['national_id']) ? $userdata1['national_id']: ""; ?>">
                      <span class="help-block" id="national_id_error"> </span> </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4">Date of Birth <span class="required"> * </span></label>
                    <div class="col-md-8">
                      <input class="form-control form-control-inline  date-picker" size="16" type="text" name="dob" autocomplete="off" value="<?php echo !empty($userdata1['dob']) ? $userdata1['dob']: ""; ?>"  id="birth_date">
                      <span class="help-block" id="birth_date_error"> </span> </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4">Upload Photo <span class="required"> * </span></label>
                    <div class="col-md-8">
                      <input type="file" class="form-control" name="image" id="image">
                      </br>
                      <input type="hidden" name="prev_image" value="<?php echo $userdata1['image'];?>" id="prev_image">
                      <img src="<?php echo BASEURL;?>pics/<?php echo $userdata1['image'];?>" height="100px" width="120px" />
                      <span class="help-block" id="image_error"> </span> </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4">Phone Number <span class="required"> * </span></label>
                    <div class="col-md-8">
                      <input type="text" class="form-control"  name="phone" id="phone_no" value="<?php echo !empty($userdata1['phone']) ? $userdata1['phone']: ""; ?>">
                      <span class="help-block" id="phone_no_error"> </span> </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4">Date Of Joining <span class="required"> * </span></label>
                    <div class="col-md-8">
                      <input autocomplete="off" class="form-control form-control-inline  date-picker" size="16" type="text" name="joining_date" id="joining_date" value="<?php echo !empty($userdata1['joining_date']) ? $userdata1['joining_date']: ""; ?>">
                      <span class="help-block" id="joining_date_error"> </span> </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4">Mobile Number </label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="mobile" value="<?php echo !empty($userdata1['mobile']) ? $userdata1['mobile']: ""; ?>">
                      <span class="help-block"> </span> </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4">Mailing Address <span class="required"> * </span></label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="mailing_address" id="autocomplete" value="<?php echo !empty($userdata1['mailing_address']) ? $userdata1['mailing_address']: ""; ?>">
                      <span id="autocomplete_error" class="help-block"> </span> </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4">City/Town <span class="required"> * </span></label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="city" id="city" value="<?php echo !empty($userdata1['city']) ? $userdata1['city']: ""; ?>">
                      <span class="help-block" id="city_error"> </span> </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4">Country <span class="required"> * </span></label>
                    <div class="col-md-8">
                      <?php $list_of_country = $this->common->country_list();// print_r($list_of_country); ?>
                      <select name="country" id="country_list"  class="form-control">
                        <option value="">---Select Country---</option>
                        <?php foreach($list_of_country as $k => $v){ ?>
                        <option value="<?php echo $v['name']; ?>" <?php if(!empty($userdata1['country'])){if($userdata1['country'] == $v['name']){ ?>selected="selected"<?php } } ?>><?php echo $v['name']; ?></option>
                        <?php } ?>
                      </select>
                      <span class="help-block" id="country_list_error"> </span> </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4">Category <span class="required"> * </span></label>
                    <div class="col-md-8">
                      <?php $category_vol = $this->common->volunteer_category_db(); ?>
                      <select name="category" id="category_list"  class="form-control">
                        <option value="">---Select Category---</option>
                        <?php foreach($category_vol as $k1 => $v1){ ?>
                        <option value="<?php echo $v1['id']; ?>" <?php if(!empty($userdata1['category'])){if($userdata1['category'] == $v1['id']){ ?>selected="selected"<?php } } ?>><?php echo $v1['name']; ?></option>
                        <?php } ?>
                      </select>
                      <span class="help-block" id="category_list_error"> </span> </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4">Remarks </label>
                    <div class="col-md-8">
                      <textarea class="form-control" rows="3" name="remarks"><?php echo !empty($userdata1['remarks']) ? $userdata1['remarks']: ""; ?></textarea>
                      <span class="help-block"> </span> </div>
                  </div>
                  <h4 class="form-section">Education And Skills </h4>
                  <div class="form-group">
                    <label class="control-label col-md-4">Type of School <span class="required"> * </span></label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="school_type" id="school_type" value="<?php echo !empty($userdata1['school_type']) ? $userdata1['school_type']: ""; ?>">
                      <span class="help-block"  id="school_type"> </span> </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4">Qualification <span class="required"> * </span></label>
                    <div class="col-md-8">
                      <select class="form-control" id="qualification" name="qualification">
                        <option value="">---Select Qualification ---</option>
                        <option value="PhD" <?php if(!empty($userdata1['qualification'])){ if($userdata1['qualification'] == "PhD"){ ?>selected="selected"<?php } } ?>>PhD</option>
                        <option value="Master" <?php if(!empty($userdata1['qualification'])){ if($userdata1['qualification'] == "Master"){ ?>selected="selected"<?php } } ?>>Master</option>
                        <option value="Bachelor" <?php if(!empty($userdata1['qualification'])){ if($userdata1['qualification'] == "Bachelor"){ ?>selected="selected"<?php } } ?>>Bachelor</option>
                        <option value="College" <?php if(!empty($userdata1['qualification'])){ if($userdata1['qualification'] == "College"){ ?>selected="selected"<?php } } ?>>College</option>
                        <option value="High School" <?php if(!empty($userdata1['qualification'])){ if($userdata1['qualification'] == "High School"){ ?>selected="selected"<?php } } ?>>High School</option>
                        <option value="School" <?php if(!empty($userdata1['qualification'])){ if($userdata1['qualification'] == "School"){ ?>selected="selected"<?php } } ?>>School</option>
                      </select>
                      <span class="help-block" id="qualification_error"> </span> </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4">College Name <span class="required"> * </span></label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="college" value="<?php echo !empty($userdata1['college']) ? $userdata1['college']: ""; ?>" id="college"/>
                      <span class="help-block" id="college_error"> </span> </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4">University Name <span class="required"> * </span></label>
                    <div class="col-md-8">
                      <input type="text" class="form-control"name="university" id="university" value="<?php echo !empty($userdata1['university']) ? $userdata1['university']: ""; ?>"/>
                      <span class="help-block" id="university_error"> </span> </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4">State in which University was located?: </label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" id="university_location" name="university_location" value="<?php echo !empty($userdata1['university_location']) ? $userdata1['university_location']: ""; ?>"/>
                      <span class="help-block" id="university_location_error"> </span> </div>
                  </div>
                  <br clear="all"  />
                  <h4 class="form-section">Additional Information </h4>
                  <div class="form-group">
                    <label class="control-label col-md-4">Hobbies </label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="hobbies" value="<?php echo !empty($userdata1['hobbies']) ? $userdata1['hobbies']: ""; ?>">
                      <span class="help-block"> </span> </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4">What they do </label>
                    <div class="col-md-8">
                      <input type="text" class="form-control"  name="what_they_do" value="<?php echo !empty($userdata1['what_they_do']) ? $userdata1['what_they_do']: ""; ?>">
                      <span class="help-block"> </span> </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4">Availability <span class="required"> * </span></label>
                    <div class="col-md-8"> 
                      <!--<input type="text" class="form-control" name="availability" id="availability" value="<?php echo !empty($userdata1['availability']) ? $userdata1['availability']: ""; ?>"/>-->
                      
                      <select name="availability" class="form-control"  id="availability" style="width:100%">
                        <option  value="">Select Availability</option>
                        <?php foreach($availability as $akey=>$aval){ ?>
                        <option  value="<?php echo $aval['name'];?>" <?php if($aval['name']==$userdata1['availability']){echo 'selected=selected';}?>><?php echo stripslashes(ucfirst($aval['name']));?> </option>
                        <?php } ?>
                      </select>
                      <span class="help-block" id="availability_error"></span> </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4">Special Skills </label>
                    <div class="col-md-8">
                      <input type="text" class="form-control" name="special_skills"  id="" value="<?php echo !empty($userdata1['special_skills']) ? $userdata1['special_skills']: ""; ?>">
                      <span class="help-block" id="badges_error"></span> </div>
                  </div>
                  <br clear="all"  />
                  <div class="form-group">
                    <label class="control-label col-md-4">&nbsp; </label>
                    <div class="col-md-8">
                      <input type="submit" value="Save" class="btn theme-btn green pull-left" onclick="return validate_form();">
                      <a href="<?php echo base_url();?>user/dashboard"  class="btn theme-btn grey pull-left margd">Cancel</a> </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--tab_1_2--> 
    </div>
  </div>
  <!--END TABS--> 
</div>
<!-- END FOOTER --> 
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) --> 
<!-- BEGIN CORE PLUGINS --> 
<!--[if lt IE 9]>
<script src="<?php echo base_url(); ?>assets/plugins/respond.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/excanvas.min.js" type="text/javascript"></script> 
<![endif]--> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/jquery-1.10.2.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>js/jsFunctions.js"></script> 

<script type="text/javascript">

//******************************** start signup step 1 ****************************************//
/*function validate_form(){  
   var email = $.trim($('#email').val()); 
   var fullname = $.trim($('#fullname').val());
   var gender = $("input[name=gender]:checked").val(); //alert(gender);
   var national_id = $.trim($('#national_id').val());
   var birth_date = $.trim($('#birth_date').val());
   var userfile = $.trim($('#userfile').val());
   var phone_no = $.trim($('#phone_no').val());
   var joining_date = $.trim($('#joining_date').val());
   var joining_date = $.trim($('#joining_date').val());
   var city = $.trim($('#city').val());
   var country_list = $.trim($('#country_list').val());
   var school_type = $.trim($('#school_type').val());
   var qualification = $("#qualification").val(); //alert(gender);
   var college = $.trim($('#college').val());
   var university = $.trim($('#university').val());
   var university_location = $.trim($('#university_location').val());
   var availability = $.trim($('#availability').val());
   var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
   	if(email == ""){
		$('.help-block').html('');
		$('#email_error').html('Error : Provide Email Id').css({'color':'red'});;
		$('#email').focus(); 
		return false;
	 }
    else if(fullname == ""){
		$('.help-block').html('');
		$('#fullname_error').html('Error : Provide Fullname').css({'color':'red'});
		$('#fullname').focus(); 
		return false;
	 } 
	 else if(gender == ""){
		$('.help-block').html('');
		$('#gender_error').html('Error : Provide Gender').css({'color':'red'});;
		$('#gender').focus(); 
		return false;
	 }
	 else if(national_id == ""){
		$('.help-block').html('');
		$('#national_id_error').html('Error : Provide National ID/Passport').css({'color':'red'});;
		$('#national_id').focus(); 
		return false;
	 }
	 else if(birth_date == ""){
		$('.help-block').html('');
		$('#birth_date_error').html('Error : Provide your Date of Birth').css({'color':'red'});;
		$('#birth_date').focus(); 
		return false;
	 }
	 else if(userfile == ""){
		$('.help-block').html('');
		$('#userfile_error').html('Error : Upload your photo').css({'color':'red'});;
		$('#userfile').focus(); 
		return false;
	 }
	 else if(phone_no == ""){
		$('.help-block').html('');
		$('#phone_no_error').html('Error :  Provide your Phone Number ').css({'color':'red'});;
		$('#phone_no').focus(); 
		return false;
	 }
	 else if(joining_date == ""){
		$('.help-block').html('');
		$('#joining_date_error').html('Error :  Provide Joining Date ').css({'color':'red'});;
		$('#joining_date').focus(); 
		return false;
	 }
	 else if(autocomplete == ""){
		$('.help-block').html('');
		$('#autocomplete_error').html('Error :  Provide Mailing Address ').css({'color':'red'});;
		$('#autocomplete').focus(); 
		return false;
	 }
	 else if(city == ""){
		$('.help-block').html('');
		$('#city_error').html('Error :  Provide your City/Town').css({'color':'red'});;
		$('#city').focus(); 
		return false;
	 }
	 else if(country_list == ""){
		$('.help-block').html('');
		$('#country_list_error').html('Error :  Provide your Country ').css({'color':'red'});;
		$('#country_list').focus(); 
		return false;
	 }
	 else if(category_list == ""){
		$('.help-block').html('');
		$('#category_list_error').html('Error :  Provide your Category ').css({'color':'red'});;
		$('#category_list').focus(); 
		return false;
	 }
     else if(school_type == ""){
		$('.help-block').html('');
		$('#school_type_error').html('Error : Provide Type of School').css({'color':'red'});
		$('#school_type').focus(); 
		return false;
	 } 
	 else if(qualification == ""){
		$('.help-block').html('');
		$('#qualification_error').html('Error : Provide Qualification').css({'color':'red'});;
		$('#qualification').focus(); 
		return false;
	 }
	 else if(college == ""){
		$('.help-block').html('');
		$('#college_error').html('Error : Provide College Name').css({'color':'red'});;
		$('#college').focus(); 
		return false;
	 }
	 else if(university == ""){
		$('.help-block').html('');
		$('#university_error').html('Error : Provide University Name').css({'color':'red'});;
		$('#university').focus(); 
		return false;
	 }
	 else if(university_location == ""){
		$('.help-block').html('');
		$('#university_location_error').html('Error : Provide State in which University was located?').css({'color':'red'});;
		$('#university_location').focus(); 
		return false;
	 }
	else if(availability == ""){
		$('.help-block').html('');
		$('#availability_error').html('Error : Provide Availability').css({'color':'red'});
		$('#availability_type').focus(); 
		return false;
	 } 
	 else if(email != ""){
		if(!regex.test($("#"+email).val())){
			$('#email_error').html('Error : Provide valid Email Id').css({'color':'red'});;
			$('#email').focus(); 
			return false;
		}
	}
	 else{
	   return true;
	 }
}*/
//******************************** end signup step 1 *****************************************//
</script> 
<script src="<?php echo base_url(); ?>assets/admin/scripts/msdropdown/jquery.dd.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery.blockui.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery.cokie.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/admin/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script> 
<!-- END CORE PLUGINS --> 
<!-- BEGIN PAGE LEVEL PLUGINS --> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> 
<script src="<?php echo base_url(); ?>assets/admin/scripts/core/app.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/admin/scripts/custom/components-pickers.js" type="text/javascript"></script> 
<script>
        jQuery(document).ready(function() {       
           // initiate layout and plugins
           App.init();
           ComponentsPickers.init();
        });   
    </script> 
