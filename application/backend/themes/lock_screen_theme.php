<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $master_title; ?></title>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>images/favicon.ico" />
<meta charset="utf-8"/>
<title>Metronic | Extra - Lock Screen</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="<?php echo base_url(); ?>assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="<?php echo base_url(); ?>assets/css/pages/lock.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<!-- incluse all the scripts and css here in this file -->
</head>
<?php
	foreach($this->_ci_view_paths as $key=>$val){
		$view_path=$key;	
	}
?>
<body>
<?php
	$controllername=$this->router->class;
?>
      <?php if(isset($master_body) && $master_body!=""){?>
      <?php include($view_path.$controllername."/".$master_body.".php"); ?>
      <?php } ?>

<div class="page-lock">
  <?php /*?><div class="page-logo"> <a class="brand" href="index.html"> <img src="<?php echo base_url(); ?>assets/logo.png" alt="" /> </a> </div><?php */?>
  <div class="page-body"> <img class="page-lock-img" src="<?php echo base_url(); ?>assets/large_logo.jpg" alt="">
    <div class="page-lock-info">
      <h1><?php $info= explode('|::|',$_COOKIE['loged_user']);
		$arr["username"] = $info[0]; echo ucfirst($arr["username"]);?>
        
        </h1>
      <!--<span class="email"> bob@keenthemes.com </span> <span class="locked"> Locked </span>-->
       <form class="form-inline" action="<?php echo base_url();?>setting/login" method="post">
        <div class="input-group input-medium">
         <input type="password" class="form-control"  autocomplete="off" placeholder="Password" name="password">
          <span class="input-group-btn">
          <button type="submit" class="btn blue icn-only"><i class="m-icon-swapright m-icon-white"></i></button>
          </span> </div>
        <!-- /input-group -->
        <div class="relogin"> <a href="<?php echo base_url();?>login/logout"> Not <?php  echo ucfirst($arr["username"]);?> ? </a> </div>
      </form>
    </div>
  </div>
  <div class="page-footer">  &copy; Copyright <?php echo date('Y', time()); ?> <?php echo $this->config->item('sitename'); ?> . All Rights Reserved </div>
</div>
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
<script src="<?php echo base_url(); ?>assets/plugins/backstretch/jquery.backstretch.min.js" type="text/javascript"></script> 
<!-- END PAGE LEVEL PLUGINS --> 
<script src="<?php echo base_url(); ?>assets/scripts/core/app.js"></script> 
<script src="<?php echo base_url(); ?>assets/scripts/custom/lock.js"></script> 
<script>
jQuery(document).ready(function() {    
   App.init();
   Lock.init();
});
</script> 
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
<?php
	if($this->config->item("process")=="yes"){
	 $this->output->enable_profiler(TRUE);
	}
?>