<link rel="stylesheet" href="<?php echo base_url(); ?>css/start_cause.css">
<div id="carousel-example-generic" class="carousel slide sliders custom-slider" data-ride="carousel"> 
  <!-- Indicators --> 
  <!-- Causes1 checkboxes -->
  <div class="container">
    <div class="row check_box">
      <div class="col-md-12 checkfields">
        <div id="error_msgs"  style="color: red;padding-top:13px; text-align:center;width:50%; display:none"></div>
        <div id="message"> 
        <font color='red'><?php echo $this->session->flashdata('errormsg'); ?></font> 
        <font color='green'><?php echo $this->session->flashdata('successmsg'); ?></font>
        </div>
        <!-- /input-group --> 
      </div>
    </div>
    
    <!--Startacayse formstrcture start-->
    <div class="row" id="startacause">
      <div class="col-sm-12 pets-tab"> 
        <!--tabbing-->
        <ul class="nav nav-tabs registeration mnt_tab_li" id="tab">
          <li class="active"><a href="#select_account" data-toggle="tab" onclick="this.href;
                    return false;">
            <div class="img-circle out-circle">
              <div class="img-circle outer-circle"> 01 </div>
            </div>
            Pet adoption</a> </li>
          <li id="input_particular"><a href="#input_perticular" data-toggle="tab" onclick="this.href;
                    return false;">
            <div class="img-circle out-circle">
              <div class="img-circle outer-circle"> 02 </div>
            </div>
            Create availability</a></li>
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content steps">
          <form enctype="multipart/form-data" id="pet_adoption_form" action="<?php echo base_url(); ?>pets/add_pet_to_database" method="post">
            <div class="tab-pane step-1 active" id="select_account"> 
              <!--main form starts-->
              
              <div class="form-group col-sm-4">
                <label for="Title" class="control-label">Title:<span class="asterisk">*</span></label>
                <input maxlength="140" type="text" class="input_max_length form-control" id="title" value="" name="title" placeholder="">
              </div>
              <div class="form-group fl">
                <label class="col-sm-3 control-label label_pad" for="search" style="float:left;">Country:<span class="asterisk">*</span> </label>
                <div class="col-sm-9 col-xs-12 multi_select padding_v"> 
                  <!-- Build your select: -->
                  <select  id="country" name="country" class="selectpicker show-menu-arrow input-xlarge nation">
                    <option value="">Select Nationality</option>
                    <option value="singapore" <?php if($userinfo['nationality']=="singapore"){echo 'selected="selected"';}?>>Singapore</option>
                    <?php // if(isset($country) && ($country != '')) {
                            // foreach($country as $coun) : ?>
                    <?php //if($userinfo['nationality'] == strtolower($coun['country'])) 
                          /*{
                               $selected = 'selected=selected'; 
                          } 
                          else 
                          {
                               $selected = '' ; 
                          }*/ ?>
                    <option <?php //echo !empty($selected) ? $selected: ''; ?> value="<?php //echo strtolower($coun['country']) ?>">
                    <?php //echo $coun['country'] ?>
                    </option>
                    <?php //endforeach; }?>
                  </select>
                </div>
              </div>
              <div class="form-group fl">
                <label class="col-sm-3 control-label label_pad" for="search" style="float:left;">Breed:<span class="asterisk">*</span> </label>
                <div class="col-sm-9 col-xs-12 multi_select padding_v" > 
                  <!-- Build your select: -->
                  <select id="breed_id" class="selectpicker show-menu-arrow input-xlarge nation"   name="breed_id">
                    <option value="">Select Breed</option>
                    <!--<option value="all" <?php if ($_GET['type'] == 'all') {echo 'selected=selected';} ?>>All</option>-->
                    <?php
                    if (count($breeds) != 0) {
                        $i = 0;
                        foreach ($breeds as $k => $v) {?>
                    <option value="<?php echo $v["id"]; ?>"><?php echo ucfirst(stripcslashes($v["name"])); ?></option>
                    <?php $i++;}} ?>
                  </select>
                </div>
              </div>
              <div class="form-group fl">
                <label class="col-sm-3 control-label label_pad" for="search" style="float:left;">Information:<span class="asterisk">*</span> </label>
                <div class="col-sm-9 col-xs-12 multi_select padding_v" id="div_info"> 
                  <!-- Build your select: -->
                  <select  class="multiselect" multiple="multiple"  id="information_id" name="information_id[]">
                    <!--<option value="all" <?php if ($_GET['type'] == 'all') {echo 'selected=selected';} ?>>All</option>-->
                    <?php
                    if (count($informations) != 0) {
                        $i = 0;
                        foreach ($informations as $k => $v) {?>
                    <option value="<?php echo $v["id"]; ?>"><?php echo ucfirst(stripcslashes($v["title"])); ?></option>
                    <?php $i++;}} ?>
                  </select>
                </div>
              </div>
              <div class="form-group fl">
                <label for="Summary" class="control-label col-sm-6">Gender:<span class="asterisk">*</span></label>
                <div class="col-sm-8">
                  <input type="radio"  value="m" name="gender"  placeholder="">
                  Male
                  <input type="radio"  value="f" name="gender"  placeholder="">
                  Female </div>
              </div>
              <div class="form-group fl">
                <label for="Summary" class="control-label col-sm-6">Age:<span class="asterisk">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="age" value="" name="age"  placeholder="">
                </div>
              </div>
              <div class="form-group fl">
                <label for="Summary" class="control-label col-sm-6">Summary headlines:<span class="asterisk">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control summary_max_length" maxlength="150" id="summary" value="" name="summary"  placeholder="">
                </div>
              </div>
              <div class="form-group fl">
                <div id="progress" class="progress">
                  <div class="progress-bar progress-bar-success "></div>
                </div>
              </div>
              <div class="form-group fl">
                <label for="Summary" class="control-label col-sm-6">Upload pictures in sequences (You can add min. 2 and max. 6 pictures):<span class="asterisk">*</span></label>
                <div class="col-sm-8 adfile">
                  <div id="dropzone"  class="dropzone" style="height:auto; min-height:200px;">
                    <div id="append_data" style=""></div>
                  </div>
                  <span id="upload_1" style="display:none;color: #0163BE;position: absolute;top: 75px; font-weight:normal;font-size: 30px;left: 25px;">Please wait uploading under progress.....</span>
                  <div id="browse_image" class="pull-right browse_icon"> <!--<span id="mukesh"><img id="webcamon" src="<?php echo base_url(); ?>images/browse_icon.png" class="br_icon" / ></span>-->
                    <div id='file_browse_wrapper'>
                      <input type='file' id='fileupload' name="files[]" multiple />
                    </div>
                  </div>
                  <span style="color:red;">Max size: 4mb</span> <span style="float: right;position: relative;top: 11px;right: 0px"><img style="display:none" id="image_loading" src="<?php echo base_url(); ?>images/loading.gif" /></span> </div>
              </div>
              <div class="form-group fl">
                <label for="Summary" class="control-label col-sm-6">Detailed stories:<span class="asterisk">*</span></label>
                <div class="col-sm-8">
                  <textarea rows="10" maxlength="1500" class="textarea_max_length form-control detail_field" name="detailed_stories" id="detailed_stories"></textarea>
                </div>
              </div>
              <div class="form-group fl">
                <div id="progress1" class="progress">
                  <div class="progress-bar progress-bar-success"></div>
                </div>
              </div>
              <div class="form-group fl">
                <label for="Summary" class="control-label col-sm-10">Documents for references (Eg. income statement, medical report, social enterprise register .pdf and max. 6 can upload)</label>
                <div class="col-sm-8">
                  <div id="dropzone1"  class="dropzone" style="height:auto; min-height:200px;">
                    <div id="append_data1"></div>
                    <span id="upload_2" style=" display:none;color: #0163BE;position: absolute;top: 75px; font-weight:normal;font-size: 30px;left: 138px;">Please wait uploading under progress.....</span> </div>
                  <div id="browse_doc" class="pull-right browse_icon"> <!--<img id="webcamon" src="<?php echo base_url(); ?>images/browse_icon.png" class="br_icon" / >-->
                    <div id='file_browse_wrapper' class="11file_browse_wrapper">
                      <input type='file' id='fileupload1' name="files[]" multiple />
                    </div>
                  </div>
                  <span style="color:red;">Max size: 4mb</span> <span style="float: right;position: relative;top: 11px;right: 0px"><img  style="display:none" id="doc_loading" src="<?php echo base_url(); ?>images/loading.gif" /></span> </div>
              </div>
              
              <div class="form-group fl">
                <label for="duration" class="control-label col-sm-6">Duration(Days)<span class="asterisk">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control4" id="duration" name="duration"  value="">
                </div>
              </div>
              
              <div class="form-group fl">
                <label for="duration" class="control-label col-sm-3">Location<span class="asterisk">*</span></label>
                <label  class="control-label col-sm-3">
                <input type="checkbox" onclick="get_pet_adoption_user_address();" value="" id="pet_adoption_options" name="pet_adoption_same_as_user">
                  Same as user: <span id="pet_adoption_loading"></span>
                </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control4" id="location" name="location"  value="">
                </div>
              </div>
              <!--main form ends--> 
            </div>
          </form>
          <!--------------------------------------------------------------------------CALENDER START------------------------------------------------------------------->
          <div class="tab-pane tab-2 mnt_reg_form" id="input_perticular">
            <div id="personal_form_check" >
              <h3>Calender</h3>
              <div class="col-md-12">
                <iframe style="border:none;" class="col-md-12"  width="100%" height="600" src="<?php echo base_url(); ?>calendar/?cause_id=<?php echo $this->uri->segment(3);?>&do=add" ></iframe>
              </div>
            </div>
            <!--------------------------------------------------------------------------CALENDER END-------------------------------------------------------------------> 
          </div>
        </div>
        <!--tabbing--> 
        
        <!--</form>--> 
      </div>
      <!-- <form class="term" method="get" action="">-->
      <?php if($this->uri->segment(3) && $this->uri->segment(2) =="step2"){?>
      <div class="form-group col-md-12  padng_none_new">
        <p style="color:#F00;"> “Essential information, we would need you to indicate before proceeding”. 
          <!--* Refers to essential information and we would need the user to indicate before proceeding.--> </p>
        <div class="checkbox">
          <label class="label_text">
            <input type="checkbox" style="margin-top:2px;" value="" id="confirm">
            I have confirmed that the information I input is accurate and is of truth and have agreed to the <a href="<?php echo base_url(); ?>pages/terms" target="_blank"> Terms and Conditions </a> for using of this site </label>
        </div>
      </div>
      <?php }?>
      <div class="form-group">
        <div class="col-sm-3 col-xs-3 control-label">
          <?php if($this->uri->segment(3) && $this->uri->segment(2) =="step2"){?>
          <a  id="check_btn" class="btn btn-primary" onclick="javascript: return check_is_date_filled();" >Submit</a> <img id="check_img" src="<?php echo base_url()?>images/loading.gif" style="display:none;" >
          <?php }else{?>
          <a class="btn btn-primary" onclick="javascript: return check_validation();" >Next</a>
          <?php }?>
        </div>
        <!--<div class="col-sm-5"> <a class="btn btn-primry1 next" onclick="javascript: return second('#tab');">Next</a> </div>--> 
      </div>
      <!--<button class="btn btn-primary blue_btn" type="button" onclick="javascript: return check_validation();">Submit</button>--> 
    </div>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap-multiselect.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>js/custom.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>js/pets.js"></script>
<style type="text/css">
#append_data .app_data_ul{
	list-style-type: none;
	margin: 0;
	padding: 0 0 0 10px;
	width: 123px;
}
/*#append_data { list-style-type: none; margin: 0; padding: 0; width: 450px; }
*/
#append_data li { margin: 3px 3px 3px 0; padding: 1px; float: left; width: 100px; height: 90px; font-size: 4em; text-align: center; }
#append_data li:hover{cursor:move;}
</style>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600,400' rel='stylesheet' type='text/css'>
<?php
//$this->router->method == "step2" && !empty($this->uri->segment(3))
if($this->uri->segment(3) && $this->uri->segment(2) =="step2"){
?>
<script>
$(document).ready(function() {
	$("#select_account").css("display", 'none');
	$("#input_perticular").css("display", 'block');
});
</script>
<?php }?>
<script>
function check_is_date_filled(){
	var cause_id = '<?php echo $this->uri->segment(3);?>';
	var confirmation = $("#confirm").is(":checked") ? true : false;
	
	if(cause_id == ""){
		swal("oops something wrong", "There is some techical error contact admin", "error");
	}
	else if (confirmation == false) {
        var error = "Please confirm the information";
        swal("oops something wrong", "Please agree to the terms and condititions", "error");
    }
	else{
		$.ajax({
			   type: "POST",
				url:BASEURL+'calendar/check_is_date_filled',
				data:{'cause_id':cause_id},
				beforeSend:function(xhr, settings){ 
					$('#check_btn').hide();
					$('#check_img').show();
				},
				success:function(result){ 
				  result = JSON.parse(result);
				  //console.log(result)
				  $('[name="'+name+'"]').find('img').remove();
				  if(result["response"] == 'success'){
						var id = name.replace(/([~!@#$%^&*()_+=`{}\[\]\|\\:;'<>,.\/? ])+/ig, "");
						$("#"+id).toggleClass("booked");
						$('#check_btn').show();
						$('#check_img').hide();
						save_pet_adoption(cause_id);
					}
					else{
						swal("oops something wrong", result["message"], "error");
						$('#check_btn').show();
						$('#check_img').hide();
					}
				}	
		});
	}
}

function save_pet_adoption(cause_id){
	$.ajax({
		   type: "POST",
			url:BASEURL+'pets/mark_steps_completed',
			data:{'cause_id':cause_id},
			beforeSend:function(xhr, settings){ 
			},
			success:function(result){ 
			  result = JSON.parse(result);
			  if(result["response"] == 'success'){
					window.location.href = BASEURL+'pets/manage_pets/';
			  }
			  else{swal("oops something wrong", "There is some error please contact admin", "error");}
			}	
	});
}
$(function() {
    $( "#append_data" ).sortable();
    $( "#append_data" ).disableSelection();
});	

</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>