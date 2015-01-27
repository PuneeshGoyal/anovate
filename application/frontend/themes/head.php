<script type="text/javascript">
var BASEURL='<?php echo base_url(); ?>';
</script>
<!--<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.11.1.min.js"></script>-->
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<!--<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
-->
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta content="" name="description" />
<meta content="" name="author" />
<link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.png" />
<link rel="stylesheet" href="<?php echo base_url(); ?>css/font-awesome.min.css" type="text/css">    
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">       
<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/thankyou.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/pop-up.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/custom.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-checkbox.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/sweet-alert.css">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">

<link href="<?php echo base_url(); ?>css/responsive-calendar.css" rel="stylesheet">              
<!-- END PAGE LEVEL PLUGIN STYLES -->

<link href='http://fonts.googleapis.com/css?family=Francois+One' rel='stylesheet' type='text/css'>
<!-- flexslider CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>css/flexslider.css" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap-checkbox.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap-maxlength.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/sweet-alert.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap-maxlength.min.js"></script>

<link href="<?php echo base_url();?>lib/selectdropdown/dist/css/bootstrap-select.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url();?>lib/selectdropdown/dist/js/bootstrap-select.min.js"></script>
<script>
$(window).bind("pageshow", function(event) {
    if (event.originalEvent.persisted) {
        window.location.reload() 
    }
});


var i=0;

function hideDiv()
{
	if(i==2)
	{
		//$("#message").fadeOut();
		//$("#error_msgs").fadeOut();
	}	
	else
	{
		i++;	
	}
	setTimeout("hideDiv()",5000);
}

$(document).ready(function(){
	 $("[data-toggle=\"tooltip\"]").tooltip();
	 $("[rel=\"tooltip\"]").tooltip();
  	 $('[data-toggle="popover"]').popover()
	hideDiv();
});
</script>