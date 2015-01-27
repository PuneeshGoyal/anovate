<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8" />
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="no-cache">
<meta http-equiv="Expires" content="-1">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $master_title;
$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
$this->output->set_header("Pragma: no-cache");
?></title>
<?php include("head.php");?>
</head>
<?php foreach($this->_ci_view_paths as $key=>$val){ $view_path=$key;	} ?>
<?php $controllername=$this->router->class;?>

<body>


<?php include("home_header.php");?>
<!-- logodiv -->

<?php if(isset($master_body) && $master_body!=""){?>
<?php include($view_path.$controllername."/".$master_body.".php"); ?>
<?php } ?>
<div class="clear"></div>
<?php include ("home_footer.php"); ?>
</body>
<!--</script>-->
<!-- for file  uploader  -->
<?php if($this->router->class == "start_cause" || $this->router->class == "pets"){ ?>
<script src="<?php echo base_url();?>js/uploader/jquery.ui.widget.js"></script>
<script src="<?php echo base_url();?>js/uploader/jquery.iframe-transport.js"></script>
<script src="<?php echo base_url();?>js/uploader/jquery.fileupload.js"></script>
<?php }?>
