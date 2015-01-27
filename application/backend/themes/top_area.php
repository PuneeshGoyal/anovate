<div class="header navbar navbar-fixed-top"> 
  <!-- BEGIN TOP NAVIGATION BAR -->
  <div class="header-inner"> 
    <!-- BEGIN LOGO --> 
    <a class="navbar-brand" href="<?php echo base_url(); ?>"> <img height="27" src="<?php echo base_url();?>assets/logo1.png" alt="pic"/> <?php echo $this->config->item('sitename'); ?></a> 
    <!-- END LOGO --> 
    <!-- BEGIN HORIZANTAL MENU -->
    <?php
	// $type=$this->session->userdata['type']; 
	?>
    <div class="hor-menu hidden-sm hidden-xs">
      <ul class="nav navbar-nav">
        <li class="classic-menu-dropdown"> <a href="<?php echo base_url(); ?>dashboard"> Dashboard <span class="selected"> </span> </a> </li>
   <?php //if($type == 'admin'){ ?>
        <li class="classic-menu-dropdown"> <a data-toggle="dropdown" data-hover="dropdown" data-close-others="true" href=""> System Setup  <span class="selected"> </span> </a>
          <ul class="dropdown-menu">
            <li class="dropdown-submenu"> <a href="javascript:;"> Users Administration </a>
              <ul class="dropdown-menu">
              <li> <a href="<?php echo base_url(); ?>users/manage_user"> Manage Users </a> </li>
			  <li> <a href="<?php echo base_url(); ?>organisation/manage_organisation"> Manage Organisations </a> </li>
              </ul>
            </li>
            
            <li class="dropdown-submenu"> <a href="javascript:;">Content Mangement </a>
              <ul class="dropdown-menu">
              	<li> <a href="<?php echo base_url(); ?>pages/manage_page/about_us/edit">About us</a> </li>
                <li> <a href="<?php echo base_url(); ?>pages/manage_page/how/edit">How it works</a> </li>
                <li> <a href="<?php echo base_url(); ?>pages/manage_page/terms/edit">Terms & conditions</a> </li>
                <li> <a href="<?php echo base_url(); ?>pages/manage_page/newsletters/">Newsletters</a> </li>
              </ul>
            </li>
          </ul>
        </li>
        <!--<li <?php $pagename=$this->uri->segment(1); if($pagename=="reports" ){ echo 'class="active"'; }?>> <a href="<?php echo base_url(); ?>reports"> Reports <span class="selected"> </span> </a> </li>-->
      </ul>
    </div>
    
    
    
    <!-- END HORIZANTAL MENU --> 
    <!-- BEGIN RESPONSIVE MENU TOGGLER --> 
    <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"> <img src="assets/img/menu-toggler.png" alt=""/> </a> 
    <!-- END RESPONSIVE MENU TOGGLER --> 
    <!-- BEGIN TOP NAVIGATION MENU -->
    <ul class="nav navbar-nav pull-right">
      <li class="dropdown user"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> <!--<img alt="" src="<?php echo base_url(); ?>assets/img/avatar1_small.jpg"/>--> <span class="username">  <?php echo $this->session->userdata['username']; ?> </span> <i class="fa fa-angle-down"></i> </a>
        <ul class="dropdown-menu">
          <!--<li> <a href="extra_profile.html"> <i class="fa fa-user"></i> My Profile </a> </li>-->
          <li> <a href="<?php echo base_url(); ?>commonfunctions/updateprofile"> <i class="fa fa-calendar" style="margin-right:5px;"></i>Update Profile </a> </li>
         <!-- <li> <a href="#"> <i class="fa fa-envelope"></i> Change Password </a> </li>-->
          <!--<li><a href="#"><i class="fa fa-tasks"></i> My Tasks<span class="badge badge-success">7</span></a></li>-->
          <li class="divider"> </li>
          <li> <a href="javascript:;" id="trigger_fullscreen"> <i class="fa fa-arrows"></i> Full Screen </a> </li>
          <!--<li> <a href="<?php echo base_url(); ?>setting/lock_screen"> <i class="fa fa-lock"></i> Lock Screen </a> </li>-->
          <li> <a href="<?php echo base_url(); ?>login/logout"> <i class="fa fa-key"></i> Log Out </a> </li>
        </ul>
      </li>
      <!-- END USER LOGIN DROPDOWN -->
    </ul>
    <!-- END TOP NAVIGATION MENU --> 
  </div>
  <!-- END TOP NAVIGATION BAR --> 
</div>
