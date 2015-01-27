<?php $resultset['badges'] = ''; //print_r($volunteerdata); 
$userdata['username'] = $this->session->userdata['username'];
?>

<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/css/datepicker.css"/>
<!-- END PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/dd.css" />
<!-- BEGIN PAGE HEADER-->
<div class="row">
  <div class="col-md-12"> 
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title"> Update Profile </h3>
    <ul class="page-breadcrumb breadcrumb">
      <li> <i class="fa fa-home"></i> <a href="index.html"> Home </a> <i class="fa fa-angle-right"></i> </li>
      <li> <a href="#"> Update Profile </a> </li>
    </ul>
    <!-- END PAGE TITLE & BREADCRUMB--> 
  </div>
</div>
<!-- END PAGE HEADER--> 
<!-- BEGIN PAGE CONTENT--> 
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
                
                <!--end col-md-8--> 
                
                <!--end col-md-4--> 
              </div>
              <!--end row-->
              
              <div class="tab-pane active" >
                <div class="message2" id="message_dev"> <font color='red'><?php echo $this->session->flashdata('errormsg'); ?></font> <font color='green'><?php echo $this->session->flashdata('successmsg'); ?></font> </div>
                <form name="frm" id="frm" action="<?php echo base_url();?>commonfunctions/update_admin_profile" method="post" enctype="multipart/form-data">
                  <?php if($do=="edit"){ ?>
                  <input type="hidden" name="id" value="<?php echo $userdata1['id'];?>">
                  <?php } ?>
                  <div class="form-group">
                    <label class="control-label col-md-4">User Name <span class="required"> * </span></label>
                    <div class="col-md-8">
                      <input name="username" id="username" value="<?php if(!empty($userdata['username'])){ echo $userdata['username']; } ?>" type="text" <?php  if($this->session->userdata['type'] != "admin"){ ?>readonly="readonly" disabled="disabled"<?php } ?> class="form-control" >
                      <span class="help-block" id="username_error"><!-- Enter your user name--> </span> </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4">Old Password <span class="required"> * </span></label>
                    <div class="col-md-8">
                      <input type="password" autocomplete="off" id="oldpassword" class="form-control" name="oldpassword" value="<?php if(!empty($userdata['oldpassword'])){ echo $userdata['oldpassword']; } ?>">
                      <span class="help-block" id="oldpassword1"> </span> </div>
                  </div>
                  
                  
                  <div class="form-group">
                    <label class="control-label col-md-4">New Password <span class="required"> * </span></label>
                    <div class="col-md-8">
                      <input type="password" autocomplete="off" id="newpassword" class="form-control" name="newpassword" value="<?php if(!empty($userdata['newpassword'])){ echo $userdata['newpassword']; } ?>" >
                      <span class="help-block" id="newpassword1"> </span> </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label col-md-4">Confirm Password <span class="required"> * </span></label>
                    <div class="col-md-8">
                      <input type="password" autocomplete="off" id="confirmnewpassword" class="form-control" name="confirmnewpassword" value="<?php if(!empty($userdata['confirmnewpassword'])){ echo $userdata['confirmnewpassword']; } ?>" >
                      <span class="help-block" id="confirmnewpassword1"> </span> </div>
                  </div>
                  
                  <br clear="all"  />
                  <div class="form-group">
                    <label class="control-label col-md-4">&nbsp; </label>
                    <div class="col-md-8">
                      <input type="submit" value="Save" class="btn theme-btn green pull-left" onclick="return validate_form1();">
                      <a href="<?php echo base_url();?>dashboard"  class="btn theme-btn grey pull-left margd">Cancel</a> </div>
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

<!-- BEGIN PAGE LEVEL PLUGINS --> 
<script src="<?php echo base_url(); ?>assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>js/jsFunctions.js"></script> 
<script src="<?php echo base_url(); ?>assets/scripts/msdropdown/jquery.dd.min.js"></script> 
<script>
//var tc;
$(document).ready(function(e) {
	$("#payments").msDropdown({visibleRows:4});
	$("#tech").msDropdown().data("dd");//{animStyle:'none'} /{animStyle:'slideDown'} {animStyle:'show'}		
	//no use
	try {
		var pages = $("#pages").msDropdown({on:{change:function(data, ui) {
			var val = data.value;
			if(val!="")
				window.location = val;
		}}}).data("dd");

		var pagename = document.location.pathname.toString();
		pagename = pagename.split("/");
		pages.setIndexByValue(pagename[pagename.length-1]);
		$("#ver").html(msBeautify.version.msDropdown);
	} catch(e) {
		//console.log(e);	
	}
	
	$("#ver").html(msBeautify.version.msDropdown);
});

</script> 

<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/jquery.cokie.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script> 
<!-- END CORE PLUGINS --> 
<!-- BEGIN PAGE LEVEL PLUGINS --> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script> 
<!-- END PAGE LEVEL PLUGINS --> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> 
<!-- BEGIN PAGE LEVEL SCRIPTS --> 
<script src="<?php echo base_url(); ?>assets/scripts/core/app.js"></script> 
<script src="<?php echo base_url(); ?>assets/scripts/custom/components-pickers.js"></script> 
<!-- END PAGE LEVEL SCRIPTS --> 
<script>
        jQuery(document).ready(function() {       
           // initiate layout and plugins
           App.init();
          ComponentsPickers.init();
        });   
    </script> 
<script type="text/javascript" src="<?php echo base_url(); ?>js/validate_functions.js"></script> 
<script type="text/javascript">
function validate_form(){
	var username = $('#username').val();
	var oldpassword = $('#oldpassword').val();
	var newpassword = $('#newpassword').val();
	var confirmnewpassword = $('#confirmnewpassword').val();
	
	//var email_regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
	
	 if(username == ""){
		$('.help-block').html('');
		$('#username_error').html('Provide Username').css({'color':'red'});
		$('#username').focus(); 
		return false;
	 }
	else if(oldpassword == ""){
		$('.help-block').html('');
		$('#oldpassword1').html('Provide Old Password').css({'color':'red'});
		$('#oldpassword').focus(); 
		return false;
	 } 
	else if(newpassword == ""){
		$('.help-block').html('');
		$('#newpassword1').html('Provide New Password').css({'color':'red'});
		$('#newpassword').focus(); 
		return false;
	 } 
	 else if(newpassword.length < 5 || newpassword.length > 15){
		$('.help-block').html('');
		$('#newpassword1').html('Your password must be between 5 and 15 characters long').css({'color':'red'});
		$('#newpassword').focus(); 
		return false;
	 }
	  else if(confirmnewpassword == ""){
		$('.help-block').html('');
		$('#confirmnewpassword1').html('Provide Confirm Password').css({'color':'red'});
		$('#confirmnewpassword').focus(); 
		return false;
	 }
	  else if(confirmnewpassword.length < 5 || confirmnewpassword.length > 15){
		$('.help-block').html('');
		$('#confirmnewpassword1').html('Your password must be between 5 and 15 characters long').css({'color':'red'});
		$('#confirmnewpassword1').focus(); 
		return false;
	 } 
	 else if(confirmnewpassword != newpassword){
		$('.help-block').html('');
		$('#confirmnewpassword1').html('Both passwords did not matched').css({'color':'red'});
		$('#confirmnewpassword').focus(); 
		return false;
	 } 
	 else
	 {
	   return true;
	 }

}
</script> 
