<?php
//fetch all active tags and that are not deleted 
$all_tags=array();
$all_tags = $this->start_cause_model->get_all_tags();

?>

<!--  $('.adfile').click(function(e){
        $('#fileupload').trigger('click');
    });	-->
<style>
#append_data > div {
	float: left;
}
#append_data > div img, #append_data > div span {
	margin-left: 10px;
	margin-top: 5px;
}
#append_data1 > div {
	float: left;
}
#append_data1 > div img, #append_data > div span {
	margin-left: 10px;
	margin-top: 5px;
}
.dropzone {
	/*palegreen*/
	background: #ACE7F0;
	/* width: 150px;*/
	height: 50px;
	line-height: 50px;
	text-align: center;
	font-weight: bold;
}
.dropzone.in {
	width: 600px;
	height: 200px;
	line-height: 200px;
	font-size: larger;
}
.dropzone.hover {
	background: gray;
}
.dropzone.fade {
	-webkit-transition: all 0.3s ease-out;
	-moz-transition: all 0.3s ease-out;
	-ms-transition: all 0.3s ease-out;
	-o-transition: all 0.3s ease-out;
	transition: all 0.3s ease-out;
	opacity: 1;
}
</style>

<div id="carousel-example-generic" class="carousel slide sliders custom-slider" data-ride="carousel"> 
  <!-- Indicators --> 
  
  <!-- Causes1 checkboxes -->
  <div class="container">
    <form role="form" enctype="multipart/form-data" id="tutorial_replym" action="<?php echo base_url();?>start_cause/add_cause" method="post">
      <div class="row check_box">
        <div class="col-md-12 checkfields">
          <div id="error_msgs" style="color: red;padding-top:13px; text-align:center;width:50%"></div>
          <div id="message"> <font color='red'><?php echo $this->session->flashdata('errormsg'); ?></font> <font color='green'><?php echo $this->session->flashdata('successmsg'); ?></font> </div>
          <div class="input-group checkboxes">
            <label>Fundraising :</label>
            <input type="checkbox" id="fundraising" name="fundraising" value="1" onclick="show_hide('fundraising');"/>
          </div>
          <!-- <div class="input-group checkboxes">
          <label>Volunteer :</label>
         
		  <input type="checkbox" id="volunteer" name="volunteer" value="1" onclick="show_hide('volunteer');"/>
        </div>
        <div class="input-group checkboxes">
          <label>Peition :</label>
          
		   <input type="checkbox" id="petition" name="petition" value="1" onclick="show_hide('petition');"/>
        </div>
        <div class="input-group checkboxes">
          <label>Pet adoption :</label>
		  <input type="checkbox" id="petadoption" name="petadoption" value="1" onclick="show_hide('petadoption');"/>
        
        </div>--> 
          <!-- <input id="chkBoxPetAdopt" data-toggle="modal" data-target="#myModalk"  type="checkbox"/>--> 
          <!-- /input-group --> 
        </div>
      </div>
      
      <!--Startacayse formstrcture start-->
      <div class="row" id="startacause">
        <div class="col-sm-12">
          <div class="form-group col-sm-4">
            <label for="Title" class="control-label">Title<span class="asterisk">*</span> :</label>
            <input type="text" class="form-control" id="title" value="" name="title" placeholder="">
          </div>
          <div class="form-group fl">
            <label class="col-sm-3 control-label label_pad" for="search" style="float:left;">Add taglines for search and flter <span class="asterisk">*</span>:
            
            
            
              <!--<select class="form-control" id="tag" multiple="multiple" name="tag[]"  style="width:300px;">
                 <option value="" disabled="disabled" style="margin:10px 0 0 0;">Select tag</option>
                <?php  if(count($all_tags) !=0){
               $i=0; 
               foreach ($all_tags as $k=>$v)
                {?>
                <option value="<?php echo $v["id"];?>"><?php echo $v["tag"];?></option>
                <?php  $i++;}}?>
              </select>-->
            </label>
        <div class="col-sm-9 col-xs-12 pd_none">
          <!-- Build your select: -->
			<select class="multiselect" multiple="multiple">
			<option value="cheese">Cheese</option>
			<option value="tomatoes">Tomatoes</option>
			<option value="mozarella">Mozzarella</option>
			<option value="mushrooms">Mushrooms</option>
			<option value="pepperoni">Pepperoni</option>
			<option value="onions">Onions</option>
			</select>
        </div>
          </div>
          
          <div class="form-group fl">
            <label for="Summary" class="control-label col-sm-6">Summary headlines<span class="asterisk">*</span>:</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="summary" value="" name="summary"  placeholder="">
            </div>
          </div>
          
          
          <div class="form-group fl">
            <label for="Summary" class="control-label col-sm-6">Youtube video id<span class="asterisk">*</span>:</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="youtube_link"  value="" name="youtube_link"  placeholder="Please enter the video id mark as red below">
              <span style="color:#818080;">e.g. -http://www.youtube.com/watch?v=<span style="color:red;">PzvLKrfEz3o</span></span>
            </div>
          </div>
          
          
          <div class="form-group fl">
            <label for="Summary" class="control-label col-sm-6">Upload pictures in sequences (at least two pictures)<span class="asterisk">*</span>:</label>
            <div class="col-sm-8 adfile">
              <div id="dropzone"  class="dropzone" style="height:auto; min-height:200px;">
                <div id="append_data" style=""></div>
              </div>
              <span id="upload_1" style=" display:none;color: #0163BE;position: absolute;top: 75px; font-weight:normal;font-size: 30px;left: 138px;">Please wait uploading under progress.....</span>
              <div id="browse_image" class="pull-right browse_icon"> <!--<span id="mukesh"><img id="webcamon" src="<?php echo base_url();?>images/browse_icon.png" class="br_icon" / ></span>-->
                <div id='file_browse_wrapper'>
                  <input type='file' id='fileupload' name="files[]" multiple />
                </div>
              </div>
               <span style="color:red;">Max size: 2mb</span>
              <span style="float: right;position: relative;top: 11px;right: 0px"><img style="display:none" id="image_loading" src="<?php echo base_url();?>images/loading.gif" /></span>
            </div>
          </div>
          <input type="hidden" id="c" value=""/>
          <!-------------------------------CAM---------------------------> 
          
          <!--<div style="width:330px;float:left;">
			<div id="webcam">
			</div>
			<div style="margin:5px;">
				<img src="<?php echo base_url();?>webcam/webcamlogo.png" style="vertical-align:text-top"/>
				<select id="cameraNames" size="1" onChange="changeCamera()" style="width:245px;font-size:10px;height:25px;">
				</select>
			</div>
		</div>
		<div style="width:135px;float:left;">
			<p><button class="btn btn-small" id="btn1" onClick="base64_tofield()">Snapshot to form</button></p>
			<p><button class="btn btn-small" id="btn2" onClick="base64_toimage()">Snapshot to image</button></p>
		</div>
		<div style="width:200px;float:left;">
			<p><textarea id="formfield" style="width:190px;height:50px;"></textarea></p>
			<p><img id="image" style="width:200px;height:15px;"/></p>
		</div>--> 
          <!-------------------------------CAM---------------------------> 
          
          <!--<span id="append_data"></span>-->
          
          <div class="form-group fl">
            <label for="Summary" class="control-label col-sm-6">Detailed stories<span class="asterisk">*</span>:</label>
            <div class="col-sm-8">
              <textarea rows="10" class="form-control detail_field" name="detailed_stories" id="detailed_stories"></textarea>
            </div>
          </div>
          <div class="form-group fl">
            <label for="Summary" class="control-label col-sm-10">Documents for references (eg. income statement, medical report, social enterprise register pdf etc)</label>
            <div class="col-sm-8">
              <div id="dropzone1"  class="dropzone" style="height:auto; min-height:200px;">
                <div id="append_data1"></div>
                <span id="upload_2" style=" display:none;color: #0163BE;position: absolute;top: 75px; font-weight:normal;font-size: 30px;left: 138px;">Please wait uploading under progress.....</span> </div>
              <div id="browse_doc" class="pull-right browse_icon"> <!--<img id="webcamon" src="<?php echo base_url();?>images/browse_icon.png" class="br_icon" / >-->
                <div id='file_browse_wrapper'>
                  <input type='file' id='fileupload1' name="files[]" multiple />
                </div>
              </div>
              <span style="color:red;">Max size: 2mb</span>
              <span style="float: right;position: relative;top: 11px;right: 0px"><img  style="display:none" id="doc_loading" src="<?php echo base_url();?>images/loading.gif" /></span>
            </div>
          </div>
          <!--</form>--> 
        </div>
        <div class="col-sm-12 information_form" id="fundraising_block" style="display:none;">
          <h1>Fundraising additional information</h1>
          <div class="add_info">
            <div class="form-group fl">
              <label for="Fund allocation" class="col-sm-3 control-label label_pad">Fund allocation <span class="asterisk">*</span>:</label>
              <div class="col-sm-9">
                <input type="text" placeholder="" class="form-control" name="fund_allocation_information"  id ="fund_allocation_information" value="">
              </div>
            </div>
            <div class="form-group fl">
              <label for="benefciary" class="col-sm-3 control-label label_pad">Address of beneficiary<span class="asterisk">*</span>:</label>
            </div>
            <div class="form-group fl">
              <div class="radio">
                <label class="control-label scfl">
                  <input type="checkbox" name="options" id="options" value="" class="radio_btn" onclick="get_user_address();">
                  Same as User : <span id="loading"></span></label>
              </div>
            </div>
            <div class="form-group fl">
              <label class="col-sm-2 control-label label_pad" for="Postal">Postal :</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="" id="postal_code" name="postal_code" value="">
              </div>
              <label class="col-sm-2 control-label label_pad" for="Address">Address :</label>
              <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="" id="address" name="address" value="">
              </div>
            </div>
            <div class="form-group fl">
              <label class="col-sm-2 control-label label_pad" for="Unit">Unit :</label>
              <span class="sym">#</span>
              <div class="col-sm-2">
                <input type="text" class="form-control" placeholder="" id="unit_f" name="unit_f" value="">
              </div>
              <span class="sym">-</span>
              <div class="col-sm-2">
                <input type="text" class="form-control" placeholder="" id="unit_l" name="unit_l" value="">
              </div>
            </div>
            <div class="form-group col-sm-4">
              <label class="control-label" for="Title"> Target amount <span class="asterisk">*</span> </label>
              <input type="text" placeholder=""  class="form-control" id="target_amount" name="target_amount" value="">
            </div>
            <div class="form-group col-sm-4">
              <label class="control-label" for="Title">Duration<span class="asterisk">*</span>/ Days</label>
              <input type="text" placeholder=""  class="form-control" id="duration" name="duration" value="">
            </div>
          </div>
        </div>
        <div class="col-md-8 pull-left information_form" id="volunteer_block" style="display:none;">
          <h1>Volunteer recruiting additional information</h1>
          <div class="addi_form">
            <div class="col-md-12 col-sm-12 col-xs-12 padng_none ">
              <div class="col-md-6 col-sm-6 col-xs-12 padng_none">
                <label>Location <span class="asterisk">*</span> : Postal :</label>
                <input id="volunteer_event_postal" name="volunteer_event_postal" value="" type="text" placeholder="Lorem Ipsum" class="input">
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12 padng_none">
                <label>Address :</label>
                <input name="volunteer_event_location" id="volunteer_event_location" value="" type="text" placeholder="Lorem Ipsum #1226" class="input3">
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 padng_none">
              <div class="col-md-6 padng_none top15">
                <label>Unit : #</label>
                <input name="volunteer_event_unit_f" id="volunteer_event_unit_f" value="" type="text" placeholder="00" class="input2">
                -
                <input name="volunteer_event_unit_l" id="volunteer_event_unit_l" value="" type="text" placeholder="00" class="input2">
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-12 col-xs-12 padng_none">
              <div class="col-md-7 col-sm-7 col-xs-9 padng_none top15">
                <label for="search" class="control-label label_pad">Frequency of event:</label>
                <select id="frequency_of_event" class="form-control2">
                  <option value="">Select frequency</option>
                  <option value="one_time">One time</option>
                  <option value="irregular">Irregular</option>
                  <option value="weekly">Weekly</option>
                  <option value="monthly">Monthly</option>
                </select>
              </div>
            </div>
            <div class="col-md-12 col-sm-12 padng_none align top15 mnt_start">
              <div class="col-md-2 col-sm-2 col-xs-12">
                <label>Starts on:</label>
              </div>
              <div class="col-md-7 col-sm-7 col-xs-12 padng_none">
                <div class="responsive-calendar">
                  <div class="controls"> <a class="pull-left" data-go="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                    <h4><span data-head-year>January </span> <span data-head-month>14</span></h4>
                    <a class="pull-right" data-go="next"><span class="glyphicon glyphicon-chevron-right"></span></a> </div>
                  <div class="clearfix"></div>
                  <div class="day-headers date_bg">
                    <div class="day header border_none">Mon</div>
                    <div class="day header border_none">Tue</div>
                    <div class="day header border_none">Wed</div>
                    <div class="day header border_none">Thu</div>
                    <div class="day header border_none">Fri</div>
                    <div class="day header border_none">Sat</div>
                    <div class="day header border_none">Sun</div>
                  </div>
                  <div class="days" data-group="days"> </div>
                </div>
                
                <!--clander-->
                
                <div class="col-md-12 padng_none align">
                  <div class="col-md-12 padng_none top15">
                    <label class="control-label label_pad" for="search">Time available:</label>
                    <select class="form-control3" id="selectbasic">
                      <option>HH.MM</option>
                      <option>option 2</option>
                    </select>
                    <select class="form-control3" id="selectbasic">
                      <option>AM</option>
                      <option>option 2</option>
                    </select>
                  </div>
                </div>
              </div>
              <!--Calander End--> 
            </div>
          </div>
        </div>
        <div class="col-md-8 pull-left information_form">
          <div id="petition_block" style="display:none;">
            <h1>Petition additional information</h1>
            <div class="addi_form"> 
              <!--<form action="" method="get" class="addi_form">-->
              
              <div class="form-group col-md-12 col-sm-12 padng_none">
                <div class="form-group col-sm-4 col-xs-12  padng_none2 startacause">
                  <label for="Title" class="control-label">Target amount of petition<span class="asterisk">*</span></label>
                  <input type="text" class="form-control" id="target_amount_of_petition" name="target_amount_of_petition" value="" placeholder="">
                </div>
                <div class="form-group col-sm-4 col-xs-12  padng_none2 startacause">
                  <label for="Title" class="control-label">Duration<span class="asterisk">*</span>/ Days</label>
                  <input type="text" class="form-control4" id="duration_of_petition" name="duration_of_petition"  value="">
                  <label>Day</label>
                </div>
              </div>
              <label class="control-label" for="Title">Petition messages</label>
              <!--<form role="form">-->
              <textarea rows="3" class="form-control" name="petition_messages" id="petition_messages"></textarea>
              <!-- </form>--> 
            </div>
          </div>
          <div class="clearfix"></div>
          
          <!-- <form class="term" method="get" action="">-->
          <div class="form-group col-md-12 padng_none2 startacause">
            <p style="color:#F00;"> * refers to essential information and we would need the user to indicate before proceeding. </p>
            <div class="checkbox">
              <label class="label_text">
                <input type="checkbox" value="1" id="confirm">
                I have confrmed that the information I input is accurate and is of truth and have agreed to the <a href="<?php echo base_url();?>pages/terms"> Terms and Conditions </a> for using of this site </label>
            </div>
          </div>
          <div class="col-md-12 text-center">
            <div class="col-md-12"> 
              <!--<div class="col-md-6 col-sm-6 col-xs-6">
              <button class="btn btn-danger red_btn" type="button">Preview</button>
            </div>-->
              <div class="col-md-6 col-sm-6 col-xs-6">
                <button class="btn btn-primary blue_btn" type="button" onclick="javascript: return check_validation();">Submit</button>
              </div>
            </div>
          </div>
          <!--</form>--> 
          
        </div>
      </div>
    </form>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap-multiselect.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/custom.js"></script>

<script type="text/javascript">
$(document).ready(function() {
$('.multiselect').multiselect();
});
</script>

<script type="text/javascript">

    $(document).ready(function () {
	
    $('#chkBoxPetAdopt').click(function () {
          if ($(this).is(':checked')) {
              $("#myModalk").modal('show');
              $('#chkBoxPetAdopt').prop('checked', false);  
          } else {
              $("#myModalk").modal('hide');
              $('#chkBoxPetAdopt').prop('checked', false);                      
          }
          $('#myModal').on('hidden.bs.modal', function (e) {
             $('#chkBoxPetAdopt').prop('checked', false);                      
          })
      });
    });
    </script> 
<!-- <script type="text/javascript" src="js/jquery.slimscroll.js"></script>-->  
<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap-checkbox.js"></script>  
<script language="JavaScript" src="//ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script> 
<script type="text/javascript">
      function check_validation()
	  {
		var fundraising =$('#fundraising').is(":checked");
		var volunteer =$('#volunteer').is(":checked");
		var petition =$('#petition').is(":checked");
		var petadoption =$('#petadoption').is(":checked");
	     if(fundraising == false && volunteer == false && petition == false  && petadoption == false)
	      {
	       alert('Please select yor cause type');
	      }
	 }
	 
	  function show_hide(id)
	  {
	    var block_id  = $('#'+id).is(":checked");
	    if(id === 'petadoption' && block_id == true)
	    {
	         $('#fundraising').prop('checked', false);
			 $('#volunteer').prop('checked', false);
			 $('#petition').prop('checked', false);
		      if(confirm("By selecting the 'Pet adoption' checkbox for creating adoption cause all previous message will be lost. Proceed??"))
					{
					 window.location.href = BASEURL+"start_cause/";
					}
			 else
			 {
			  $('#'+id).prop('checked', false);
			 }
		}
		else
		{
		   if(block_id == true)
			{
			$('#'+id+'_block').show();
			}
			else
			{
			$('#'+id+'_block').hide();
			}
		}
	  }
	 
	
	 function remove_doc(id,name)
	 {
		
		var url = BASEURL+'start_cause/remove_docs/';
         $.ajax({
		 url:url,
	     data:'type=json&url='+id,
		 success:function(result){
		  	$("#"+name).remove();
		  }	
		});		
	}
	
	function get_user_address(){
		
		if($('#options').is(":checked") == true){
			
			 var url = BASEURL+'start_cause/get_user_address/';
			 $.ajax({
			 url:url,
			 data:'type=json',
				 beforeSend:function(){
					$('#options').hide();
					$('#loading').html('<font style="color:red;">Processing....</font>');
				},
				 success:function(result)
				 {
					$('#loading').html('');
					$('#options').show();
					var result = eval("("+result+")");
					$('#postal_code').val(result['postal_code']);
					$('#address').val(result['address']);
					$('#unit_f').val(result['unit_f']);
					$('#unit_l').val(result['unit_l']);
				  }
			 });	
	   }
	   else
	   {
			$('#postal_code').val('');
			$('#address').val('');
			$('#unit_f').val('');
			$('#unit_l').val('');
	   }	
	}
	
	function check_validation(){
		var fundraising =$('#fundraising').is(":checked");
		var volunteer =$('#volunteer').is(":checked");
		var petition =$('#petition').is(":checked");
		var petadoption =$('#petadoption').is(":checked");
		var confirmtion =$('#confirm').is(":checked");
		var title =$('#title').val();
		var tag =$('#tag').val();
		var summary =$('#summary').val();
		var youtube_link = $("#youtube_link").val();
		var images = $('input[name*="image"]').length;
		var is_image = $('input[class*="temp_upload_img"]').length;
		
		var detailed_stories = $('#detailed_stories').val();
		var fund_allocation_information =$('#fund_allocation_information').val();
		var postal_code  = $('#postal_code').val();
		var address  = $('#address').val();
		var unit_f  = $('#unit_f').val();
		var unit_l  = $('#unit_l').val();
		var target_amount  = $('#target_amount').val();
		var duration  = $('#duration').val();
		var float = /^[1-9]\d*(\.\d+)?$/;
		var num = /^[0-9\ ]+$/;
		
		var imgexts = ['gif','GIF','jpg','jpeg','JPEG','png','PNG'];
		
		if(fundraising == false && volunteer == false && petition == false  && petadoption == false)
		{
			var error = "Please select yor cause type";
		}
		else if(title == ""){
			var error = "Please enter title";
		}
		else if(tag == null){
			var error = "Please select tag";
		}
		else if(summary == ""){
			var error = "Please enter summary";
		}
		else if(summary == ""){
			var error = "Please enter summary";
		}
		else if(youtube_link == ""){
			var error = "Please enter youtube video id";
		}
		else if(images == ""){
			var error = "Please provide images";
		}
		else if(detailed_stories == ""){
			var error = "Please enter detailed stories";
		}
		else if(fund_allocation_information == ""){
			var error = "Please enter fund allocation";
		}
		else if(postal_code == ""){
			var error = "Please enter postal";
		}
		else if(address == ""){
			var error = "Please enter address";
		 }
		 else if(unit_f == "" || unit_l == ""){
			var error = "Please enter units";
		 }
		else if(unit_l == ""){
			var error = "Please enter units";
		 }
		 else if(target_amount == ""){
			var error = "Please enter target amount";
		 }
		 else if(!float.test(target_amount)){
			var error = "Amount must be a number";
		 }
		 else if(duration == ""){
			var error = "Please enter duration";
		 }
		 else if(!num.test(duration)){
			var error = "Duration must be a number";
		 }
		 else if(confirmtion == false){
			var error = "Please confirm the information";
		 }
		 else if(images != "")
		 {
			$( ".temp_upload_img" ).each(function( index) {
					var image_name = $( this ).attr("rel");
					var get_ext = image_name.split('.');// split file name at dot
					get_ext = get_ext.reverse();// reverse name to check extension
					// check file type is valid as given in 'exts' array
					if ($.inArray(get_ext[0].toLowerCase(),imgexts ) > -1 ){
						set = 0;
					} 
					else{
						set = 1;
					}
		  });
			
			if(set == '1')
			{
			   var error = "Please provide atleast one image";
			}	
			
		 }
		  if(error != '' && error != null)
		   {
				 jQuery('html,body').animate({scrollTop:0},500);
				//window.scrollTo(0,400);
				$('#error_msgs').html(error).show().css({'color':'red'});
				return false;
			}
		  else
		  {
		   document.getElementById('tutorial_replym').submit();  
		  } 
		}
		$(document).ready(function() {/*
		$("#postal_code").on("blur", function (e) {
				var personal_nationality = 'singapore';
				var personal_postal_code = $("#postal_code").val();
				 $.ajax({
						type : 'POST',
						url  : BASEURL+'logins/get_address/',
						data : {'personal_nationality':personal_nationality, 'personal_postal_code': personal_postal_code},
						beforeSend : function(){
							//$('#loading_'+dish_id).show();
						},
						success: function(rep){
						
							obj = JSON.parse(rep);
							if(obj == 'error')
							{
								$('#address').val('');
								alert("No result found");
							}
							else
							{
								$('#address').val(obj);
							}
						}
					});
		});
	*/});
</script> 
<script type="text/javascript">
/**********************************drag and  drop file for uploading starts**********************************************/
$(document).bind('drop dragover', function (e) {
    e.preventDefault();
});


$(document).bind('dragover', function (e)
{
    var dropZone = $('.dropzone'),
        foundDropzone,
        timeout = window.dropZoneTimeout;
        if (!timeout)
        {
            dropZone.addClass('in');
        }
        else
        {
            clearTimeout(timeout);
        }
        var found = false,
        node = e.target;

        do{

            if ($(node).hasClass('dropzone'))
            {
                found = true;
                foundDropzone = $(node);
                break;
            }

            node = node.parentNode;

        }while (node != null);

        dropZone.removeClass('in hover');

        if (found)
        {
            foundDropzone.addClass('hover');
        }

        window.dropZoneTimeout = setTimeout(function ()
        {
            window.dropZoneTimeout = null;
            dropZone.removeClass('in hover');
        }, 100);
			
    });
/**********************************drag and  drop file for uploading starts**********************************************/
$(function() {
	
		//window.prevcount=0;
        'use strict';
        // Change this to the location of your server-side upload handler:
        var url = BASEURL+'start_cause/upload_image/';
		$('#fileupload').fileupload({
			url: url,
            dataType: 'json',
			dropZone: $('#dropzone'),
			beforeSend:function(event,files,index,xhr,handler,callBack){
				$("#upload_1").show();
				$("#browse_image").hide();
				$("#image_loading").show();
   			},
			add: function(e, data) {
					var uploadErrors = [];
					var file = data.originalFiles[0]['name'];
					//prevcount +=1;
					
					//debugger;
					//test(file);
					//,'3g2','3gp','asf','asx','avi','flv','m4v','mov','mp4','mpg','wmv'
					  var exts = ['gif','GIF','jpg','jpeg','JPEG','png','PNG'];
					  var imageexts = ['gif','GIF','jpg','jpeg','JPEG','png','PNG'];
					  
					  if (file) 
					  {
						var get_ext = file.split('.');// split file name at dot
						get_ext = get_ext.reverse();// reverse name to check extension
						// check file type is valid as given in 'exts' array
						if ($.inArray ( get_ext[0].toLowerCase(), exts ) > -1 ){
						 //uploadErrors.push( 'ok' );
						} 
						else{
							uploadErrors.push( 'Wrong file type '+get_ext[0]);
						}
					  }
					
					//alert("hii"+prevcount);
					/*if(prevcount > 6){
						$("#c").val('6');
					}
					else{
						//alert(prevcount);
						$("#c").val(prevcount);
					}
					var tt = $("#c").val();
					if(tt > 6){
						uploadErrors.push('you can\'t add more than 6 images/video');
						$("#c").val('6');
					}
					else */
					if(data.originalFiles[0]['size'] > 2000000) {
						uploadErrors.push('Filesize is too big please upload file less than 2 mb');
					}
					if(uploadErrors.length > 0) {
						alert(uploadErrors.join("\n"));
					} else {
						data.submit();
					}
			},
			
			complete: function(response) { // on complete
				//$("#upload_1").html('Uploading completed.....');
				//alert(response.responseText);
				//output.html(response.responseText); //update element with received data
				//progressbox.slideUp(); // hide progressbar
				/*+url+"/delete/"*/
			},
            done: function(e, data) {
				$("#upload_1").hide();
				$("#image_loading").hide();
				$("#browse_image").show();
				$('#message').val('');
				
                $.each(data.result.files, function(index, file) {
				    var name = file.name;
				    var type = file.type;
					var file_type = type.split('/');
					var newString = name.replace(/([~!@#$%^&*()_+=`{}\[\]\|\\:;'<>,.\/? ])+/ig, "-");
					if(file_type[0] == 'video' )
					{
						$('#append_data').append('<div class="temp_upload_img" rel="'+name+'" id="'+newString+'"><div><div>'+file.name+'</div><img style="position:relative;" src="'+BASEURL+'images/video.png" alt="pic" height="100" width="100" class="image"/></div><span  style="float:left"><input type="hidden" name="image[]"   value="'+file.name+'" /><a id='+file.deleteUrl+' name='+newString+' onclick="remove_doc(this.id,this.name);" style="cursor:pointer;">Delete</a></span></div></div>');
					} 
					else
					{
						$('#append_data').append('<div class="temp_upload_img" rel="'+name+'" id="'+newString+'"><div><div>'+file.name+'</div><img style="position:relative;" src="'+file.thumbnailUrl+'" alt="pic" height="100" width="100" class="image"/></div><span  style="float:left"><input type="hidden" name="image[]" value="'+file.name+'" /><a id='+file.deleteUrl+' name='+newString+' onclick="remove_image(this.id,this.name);" style="cursor:pointer;">Delete</a></span></div></div>');
					}
				});
				
            }
        }).bind('fileuploadsubmit', function(e, data) {
           var message_sender = $("#message_sender").val();
           data.formData = {message_sender: message_sender};
        }).prop('disabled', !$.support.fileInput).parent().addClass($.support.fileInput ? undefined : 'disabled');
    });
	
	
	
//////////////////////////////////////////////////////////// doc upload /////////////////////////////////////////////////////////////////////////////////////////////	
	$(function() {
		//var prevcount=0;
        'use strict';
        // Change this to the location of your server-side upload handler:
        var url = BASEURL+'start_cause/upload_doc/';
		
		$('#fileupload1').fileupload({
			
			url: url,
            dataType: 'json',
			dropZone: $('#dropzone1'),
			beforeSend:function(event,files,index,xhr,handler,callBack){
				//count_docs();
				$("#upload_2").show();
				$("#browse_doc").hide();
				$("#doc_loading").show();
   			},
			add: function(e, data) {
					var uploadErrors = [];
					var file = data.originalFiles[0]['name'];
					//prevcount +=1;
				    
//,'3g2','3gp','asf','asx','avi','flv','m4v','mov','mp4','mpg','wmv','gif','GIF','jpg','jpeg','JPEG','png','PNG','zip','rar','xlsx','xls','csv',,'ppt','pptx','psd'
					  //var exts = ['pdf','PDF','txt','doc','docx','DOC','DOCX'];
					    var exts = ['pdf','PDF'];
					  if (file) {
						var get_ext = file.split('.');// split file name at dot
						get_ext = get_ext.reverse();// reverse name to check extension
						// check file type is valid as given in 'exts' array
						if ($.inArray ( get_ext[0].toLowerCase(), exts ) > -1 ){
						 //uploadErrors.push( 'ok' );
						} 
						else{
							uploadErrors.push( 'Wrong file type '+get_ext[0]);
						}
					  }
				    /*if(prevcount > 3){
						uploadErrors.push('you can\'t add more than 3 documents');
					}
					else */
					
					if(data.originalFiles[0]['size'] > 2000000) {
						uploadErrors.push('Filesize is too big please upload file less than 2 mb');
					}
					if(uploadErrors.length > 0) {
						alert(uploadErrors.join("\n"));
					} else {
						data.submit();
					}
			},
			complete: function(response) { // on complete
				//$("#upload_2").html('Uploading completed.....');
				//alert(response.responseText);
				//output.html(response.responseText); //update element with received data
				//progressbox.slideUp(); // hide progressbar
				/*+url+"/delete/"*/
			},
            done: function(e, data) {
				$("#upload_2").hide();
				$("#browse_doc").show();
				$("#doc_loading").hide();
				$('#message').val('');
				
                $.each(data.result.files, function(index, file) {
				  var name = file.name;
				    var newString1 = name.replace(/([~!@#$%^&*()_+=`{}\[\]\|\\:;'<>,.\/? ])+/ig, "-");
					var type1 = file.name;
					var file_type1 = type1.split('.');
					if(file_type1[1] == 'doc' || file_type1[1] == 'docx' || file_type1[1] == 'DOC' || file_type1[1] == 'DOCX' ){
						$('#append_data1').append('<div id="'+newString1+'" class="count_docs"><div><div>'+file.name+'</div><img style="position:relative;" src="'+BASEURL+'images/my_file_020.png" alt="pic" height="100" width="100"/></div><span  style="float:left"><input type="hidden" name="docs[]" value="'+file.name+'" /><a id='+file.deleteUrl+' name='+newString1+' onclick="remove_doc(this.id,this.name);" style="cursor:pointer;">Delete</a></span></div></div>');
					}
					else
					{
						$('#append_data1').append('<div id="'+newString1+'" class="count_docs"><div><div>'+file.name+'</div><img style="position:relative;" src="'+BASEURL+'images/my_file_048.png" alt="pic" height="100" width="100"/></div><span  style="float:left; margin:5px 0 0 10px;"><input type="hidden" name="docs[]" value="'+file.name+'" /><a id='+file.deleteUrl+' name='+newString1+' onclick="remove_doc(this.id,this.name);" style="cursor:pointer;">Delete</a></span></div></div>');
					}
				});
            }
        }).bind('fileuploadsubmit', function(e, data) {
           var message_sender = $("#message_sender").val();
           data.formData = {message_sender: message_sender};
        }).prop('disabled', !$.support.fileInput).parent().addClass($.support.fileInput ? undefined : 'disabled');
    });
	/*function count_docs()
	{
	var countdocs = $('.count_docs').length;
	
	if(countdocs > 2)
	{
		alert('cant uplaod more then three docs');
	    return false;	
	}
	}*/
	
	 function remove_image(id,name)
	  {
		// alert(window.prevcount);
		var url = BASEURL+'start_cause/remove_image/';
         $.ajax({
		 url:url,
	     data:'type=json&url='+id,
		 success:function(result)
		 {
		  $("#"+name).remove();
		 	/*var t =1;
			window.prevcount = window.prevcount - t;
			$("#c").val(window.prevcount);*/
		 }	
	});		
	}
	
</script>