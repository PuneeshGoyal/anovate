<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/supercali.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/sweet-alert.css">
<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css"> 
<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap.min.js"></script> 

<?php if ($_REQUEST["size"] == "small") echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/small.css\">\n"; ?>
<?php if ($css) echo $css; ?>
<script type="text/javascript" src="<?php echo base_url();?>js/sweet-alert.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.11.1.min.js"></script>
<script language="JavaScript" src="<?php echo base_url();?>js/CalendarPopup.js"></script>
<script language="JavaScript">document.write(getCalendarStyles());</script>
<script language="JavaScript" src="<?php echo base_url();?>js/ColorPicker2.js"></script>
<script language="JavaScript" src="<?php echo base_url();?>js/miscfunctions.js"></script>
<script type="text/javascript">
$( document ).ready(function() {	
	/************************************function to add weekly date and time  for user***************************************/
	$(document).on("click", ".booked,.partial-booked",function() {
		var current_method = '<?php echo $_GET['do']?>';
		 var delete_length = $(".delete").length;
		 if(delete_length == 1 && current_method == "edit"){
			 swal("oops something wrong", 'You can\'t delete this, atleast one availability required', "error");
		 }
		 else{
			 var cause_id = '<?php echo $_GET['cause_id'];?>'; 
			 var appointment_id = '<?php echo $_GET['appointment_id'];?>'; 
			 var name = $(this).attr("name");
			  $.ajax({
			    type: "GET",
				url:'<?php echo base_url();?>calendar/book?id='+name+'&cause_id='+cause_id+'&appointment_id='+appointment_id,
				beforeSend:function(xhr, settings){ 
				$("#show_loader").fadeIn();
					$('[name="'+name+'"]').append('<img src="<?php echo base_url()?>images/loading.gif" >');
				},
				success:function(result){ 
				  result = JSON.parse(result);
				 
				  $('[name="'+name+'"]').find('img').remove();
				  if(result["response"] == 'success'){
						var id = name.replace(/([~!@#$%^&*()_+=`{}\[\]\|\\:;'<>,.\/? ])+/ig, "");
						$("#"+id).removeClass("booked partial-booked user_booked").addClass("mybooked");
						$("#show_loader").fadeOut();
					}
					else{
						var id = name.replace(/([~!@#$%^&*()_+=`{}\[\]\|\\:;'<>,.\/? ])+/ig, "");
						$("#"+id).removeClass("booked partial-booked").addClass("user_booked");//to mark that slots as booked 
						$("#show_loader").fadeOut();
						swal("oops something wrong", result["message"], "error");
					}
				}	
		  });
		 }
	});
/************************************function to add weekly date and time ***************************************/
});	
 

</script>
<?php if ($javascript) echo $javascript; ?>
</head>
<body>
<div class="modal fade" id="view_modal" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="border-bottom:none;">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      </div>
      <div class="modal-body">
      <span id="test"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</div>
<div class="top">
  <?php include  APPPATH.'views/user_nav.php'; ?>
</div>
<div class="content" style="padding:0px !important;">
<?php if ($msg) echo "<p class=\"warning\">".$msg."</p>\n"; ?>
