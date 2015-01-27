<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?php echo $master_title; ?></title>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<?php include "head.php"  ?>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/select2/select2-metronic.css"/>
<!-- END PAGE LEVEL SCRIPTS -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo"> <a href="login.php"> <img src="<?php echo base_url();?>images/logo.png" alt="pic"/> </a> </div>
<!-- END LOGO --> 
<!-- BEGIN LOGIN -->

<div class="content" style="position:relative;"> 
<div style="position:absolute; float:left;left:30px; top:70px" id="message"> <font color='red'><?php echo $this->session->flashdata('errormsg'); ?></font> 
          <font color='green'><?php echo $this->session->flashdata('successmsg'); ?></font> </div>
  <!-- BEGIN LOGIN FORM -->
  <form name="login" action="<?php echo base_url();?>login/check_login" method="post"  class="login-form" >
    <h3 class="form-title">Login to your account</h3>
    <div class="alert alert-danger display-hide">
      <button class="close" data-close="alert"></button>
      <span>Enter username and password.</span> </div>
    <div class="form-group"> 
      <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
      <label class="control-label visible-ie8 visible-ie9">Username</label>
      <div class="input-icon"> <i class="fa fa-user"></i>
        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" value="<?php echo !empty($userdata['username']) ? $userdata['username'] : "";?>"/>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label visible-ie8 visible-ie9">Password</label>
      <div class="input-icon"> <i class="fa fa-lock"></i>
        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
      </div>
    </div>
    <div class="form-actions">
      <!--<label class="checkbox">
        <input type="checkbox" value="1" name="type"/>
        Login As Adminstrator </label>-->
      <button type="submit" class="btn blue pull-right"> Login <i class="m-icon-swapright m-icon-white"></i> </button>
    </div>
    <!--<div class="forget-password">
      <h4>Forgot your password ?</h4>
      <p> no worries, click <a href="javascript:;" id="forget-password"> here </a> to reset your password. </p>
    </div>-->
  </form>
  <!-- END LOGIN FORM --> 
  <!-- BEGIN FORGOT PASSWORD FORM -->
  <form class="forget-form" action="index.html" method="post">
    <h3>Forget Password ?</h3>
    <p> Enter your e-mail address below to reset your password. </p>
    <div class="form-group">
      <div class="input-icon"> <i class="fa fa-envelope"></i>
        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email"/>
      </div>
    </div>
    <div class="form-actions">
      <button type="button" id="back-btn" class="btn"> <i class="m-icon-swapleft"></i> Back </button>
      <button type="submit" class="btn blue pull-right"> Submit <i class="m-icon-swapright m-icon-white"></i> </button>
    </div>
  </form>
  <!-- END FORGOT PASSWORD FORM --> 
  
</div>
<!-- END LOGIN --> 
<!-- BEGIN COPYRIGHT -->
<div class="copyright"> © Copyright <?php echo date('Y', time()); echo ' &nbsp; '. $this->config->item('sitename'); ?>.  All Rights Reserved. </div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
	<script src="<?php echo base_url(); ?>assets/plugins/respond.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/plugins/excanvas.min.js"></script> 
	<![endif]-->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url(); ?>assets/scripts/core/app.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/scripts/custom/login-soft.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
		jQuery(document).ready(function() {     
		  App.init();
		  Login.init();
		});
	</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>