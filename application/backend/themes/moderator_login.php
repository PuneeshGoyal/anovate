<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $master_title; ?></title>
<?php include("head.php");?>    <!-- incluse all the scripts and css here in this file -->
</head>
<div align="center">
  <div class="container">
    <div class="content1" style="border:none">
      <div class="login">
        <div class="bannar"> <img src="<?php echo base_url();?>images/logo.png" alt="images/button2" width="85" height="69" /> 
          <div class="bnrtxt"><?php echo $this->config->item("sitename"); ?> Moderator Panel</div>
          <div class="clear"></div>
          <span id="message">
		  <font color="red">
		  <?php 
		  echo $this->session->flashdata("errormsg");
		  ?>
          </font>
          <font color="red">
          <?php
		  echo $this->session->flashdata("successmsg");
		   ?>
           </font>
           </span>
        </div>
        <form name="login" action="<?php echo base_url();?>moderator_panel/check_login" method="post" class="upload" >
        
          <div class="login1"> <img src="<?php echo base_url();?>images/username_icon.png" height="14" width="17" />E-mail: </div>
          <div class="logintxt">
           <input class="field" type="text" name="username" autocomplete="off" />
          </div>
          <div class="login1"> <img src="<?php echo base_url();?>images/password_icon.png" height="14" width="13" />Password: </div>
          <div class="logintxt">
            <input class="field" type="password" name="password" maxlength="15" autocomplete="off" />
          </div>
          <div class="login2">
            <div class="clear"></div>
            <input type="submit" name="submitbtn"  value="Login" />
          </div>
        </form>
        <div class="clear"></div>
        <div class="lastlogin"><a href="http://www.slinfy.com">Powered By Solitaire Infosys Inc.</a></div>
      </div>
    </div>
  </div>
</div>