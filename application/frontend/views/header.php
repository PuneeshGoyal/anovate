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
	/************************************function to add date and time  ***************************************/

	$(document).on("click",".add", function() {
		 if(confirm("Are you sure you want to book full day")){ 	
		 	
			 var cause_id = '<?php echo $_GET['cause_id'];?>'; 
			 var name = $(this).parents('td').attr("name");
			 var current_div = $(this); 
			 if(cause_id == "" || cause_id == 0){
				  swal("oops something wrong", 'No data found', "error");
			 }
			 else if(name == "" || name == undefined){
				 swal("oops something wrong", 'No date found', "error");
			 }
			 else{
				 
				 $.ajax({
				   type: "GET",
					url:'<?php echo base_url();?>calendar/add_events_month?do=grid&id='+name+'&cause_id='+cause_id,
					beforeSend:function(xhr, settings){ 
						$("#show_loader").fadeIn();
						$('[name="'+name+'"]').append('<img src="<?php echo base_url()?>images/loading.gif">');
					},
					success:function(result){  
					result = JSON.parse(result);
					$('[name="'+name+'"]').find('img').remove();
					$('[name="'+name+'"]').attr('readonly', false);
					   if(result["response"] == 'success'){
						   $("#show_loader").fadeOut();
							//$('[name="'+name+'"]').addClass('vik_grid ');
							var id = name.replace(/([~!@#$%^&*()_+=`{}\[\]\|\\:;'<>,.\/? ])+/ig, "");
							current_div.removeClass("add").addClass('delete');
							/*current_div.nextAll('div.view').remove();
							current_div.after('<div class="setting view"></div>');*/
							$("."+id).removeClass("partial-booked").addClass("booked");
						}
						else{
							$("#show_loader").fadeOut();
							swal("oops something wrong", 'Opps! error to perform opration. Try again.', "error");
						}
					}	
				});
			 }
		 }
	  });
	/************************************function to add date and time  ***************************************/

	  
	/************************************function to delete the date and time  ***************************************/
 
	$(document).on("click",".delete",function() {  
	
		if(confirm("Are you sure you delete full day booking")){
		 //when edit we need atleast one row is required 
		 var current_method = '<?php echo $_GET['do']?>';
		 var delete_length = $(".delete").length;
		 if(delete_length == 1 && current_method == "edit"){
			 swal("oops something wrong", 'You can\'t delete this, atleast one availability required', "error");
		 }
		 else{
			 var cause_id = '<?php echo $_GET['cause_id'];?>'; 
			 var current_div = $(this);
			 var name = $(this).parents('td').attr("name");
				 $.ajax({
				   type: "GET",
					url:'<?php echo base_url();?>calendar/delete_events_month?id='+name+'&cause_id='+cause_id,
					beforeSend:function(xhr, settings){ 
						$("#show_loader").fadeIn();
						$('[name="'+name+'"]').append('<img src="<?php echo base_url()?>images/loading.gif">');
					},
					success:function(result){  
					result = JSON.parse(result);
					$('[name="'+name+'"]').find('img').remove();
					$('[name="'+name+'"]').attr('readonly', false);
					   if(result["response"] == 'success'){
							$("#show_loader").fadeOut();
							var id = name.replace(/([~!@#$%^&*()_+=`{}\[\]\|\\:;'<>,.\/? ])+/ig, "");
							current_div.toggleClass("add delete");
							current_div.next().remove();
							$("."+id).removeClass("booked partial-booked");
						}
						else{
							$("#show_loader").fadeOut();
							swal("oops something wrong", 'Opps! error to perform opration. Try again.', "error");
						}
					}	
				});
			}
		}
	});
		/************************************function to delete the date and time  ***************************************/

	/************************************function to add weekly date and time ***************************************/
	$(document).on("click", ".vik",function() {
		var name = $(this).attr("name");
		console.log(name);
		var current_method = '<?php echo $_GET['do']?>';
		 var delete_length = $(".booked").length;
		 if(delete_length == 1 && current_method == "edit"){
			 swal("oops something wrong", 'You can\'t delete this, atleast one availability required', "error");
		 }
		 else{
			 var cause_id = '<?php echo $_GET['cause_id'];?>'; 
			 
			 
			  $.ajax({
			   type: "GET",
				url:'<?php echo base_url();?>calendar/add_events_week?do=week&id='+name+'&cause_id='+cause_id,
				beforeSend:function(xhr, settings){ 
				$("#show_loader").fadeIn();
					$('[name="'+name+'"]').append('<img src="<?php echo base_url()?>images/loading.gif" >');
				},
				success:function(result){ 
				  result = JSON.parse(result);
				  $('[name="'+name+'"]').find('img').remove();
				  if(result["response"] == 'success'){
						var id = name.replace(/([~!@#$%^&*()_+=`{}\[\]\|\\:;'<>,.\/? ])+/ig, "");
						$("#"+id).toggleClass("partial-booked ");//week_delete
						$("#show_loader").fadeOut();
					}
					else{
						$("#show_loader").fadeOut();
						swal("oops something wrong", 'Opps! error to perform opration. Try again.', "error");
					}
				}	
		  });
		 }
	});
/************************************function to add weekly date and time ***************************************/


	/************************************function to load view into modal  ***************************************/

	$(document).on("click",".view", function() {
		var cause_id = '<?php echo $_GET['cause_id'];?>'; 
		var date_time = $(this).parents('td').attr("name");
		var current_div = $(this); 
        //var Id = jQuery(this).attr("id");
       
	    $.ajax({
            type: 'POST',
            data: {
                'cause_id' : cause_id,
				'date_time' : date_time
            },
            url : "<?php echo base_url();?>calendar/view_user_booked_availability/",
            success: function(response){
                if(response) {
                    $('#test').append(response);
                    $('#view_modal').modal('show');
                    $(document).on('hidden.bs.modal', '#view_modal', function (event) {
                        $(this).remove();
                    });
                } else {
                    alert('Error');
                }
            }
        });
    });
	/************************************function to load view into modal  ***************************************/
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
  <?php include  APPPATH.'views/nav.php'; ?>
</div>
<div class="content" style="padding:0px !important;">
<?php if ($msg) echo "<p class=\"warning\">".$msg."</p>\n"; ?>
