<?php
$function = $this->uri->segment(2);

if($function=="edit_pets"){
	$active = 'active';
}
else{
	$active = '';
}
if($function=="edit_step2"){
	$active1 = 'active';
}
else{
	$active1 = '';
}
//debug($dataset);
?>
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
.progress {
	overflow: hidden;
	height: 20px;
	margin-bottom: 0px;
	background-color: #f5f5f5;
	border-radius: 4px;
	-webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
	box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
	width: 64%;
	margin-left: 16px;
	margin-top: 17px;
}
#sortable { list-style-type: none; margin: 0; padding: 0; width: 450px; }
#sortable li { margin: 3px 3px 3px 0; padding: 1px; float: left; width: 100px; height: 90px; font-size: 4em; text-align: center; }

</style>

<div id="carousel-example-generic" class="carousel slide sliders custom-slider" data-ride="carousel"> 
  <!-- Indicators --> 
  
  <!-- Causes1 checkboxes -->
  <div class="container">
    <form role="form" enctype="multipart/form-data" id="pet_adoption_form" action="<?php echo base_url();?>pets/update_pet_to_database" method="post">
      <div class="row check_box">
        <div class="col-md-12 checkfields">
          <div id="error_msgs" style="color: red;padding-top:13px; text-align:center;width:50%"></div>
          <div id="message"> <font color='red'><?php echo $this->session->flashdata('errormsg'); ?></font> <font color='green'><?php echo $this->session->flashdata('successmsg'); ?></font> </div>
          <div class="input-group checkboxes">
          <?php
		  $type1='';$type2='';
		  ($dataset["is_fundraise"] == 1) ? (list($type1) = array('<label>Fundraising :</label><input type="checkbox" id="fundraising" name="fundraising" value="1" checked="checked" onclick="show_hide(\'fundraising\');"/>')) :(list($type1) = array(NULL));
		  ($dataset["is_petition"] == 1) ? (list($type2) = array('<label>Pledge :</label><input type="checkbox" id="petition" name="petition" value="1" checked="checked" onclick="show_hide(\'petition\');"/>')) :(list($type2) = array(NULL));
		  ($dataset["is_volunteer"] == 1) ? (list($type3) = array('<label>Supporter :</label><input type="checkbox" id="volunteer" name="volunteer" value="1" checked="checked" onclick="show_hide(\'volunteer\');"/>')) :(list($type3) = array(NULL));

		  ?>
            <!--<input type="checkbox" id="fundraising" name="fundraising" value="1" <?php if($dataset['is_fundraise']==1){echo "checked=checked";} ?> onclick="show_hide('fundraising');"/>-->
            <?php echo $type1." ".$type2." ".$type3;?>
        </div>
        </div>
      </div>
      
      <!--Startacayse formstrcture start-->
      <div class="row" id="startacause">
      
        <div class="col-sm-12 pets-tab custom-row">
          <input type="hidden" class="form-control" id="id" value="<?php echo $dataset['id'];?>" name="id">
          <input type="hidden" class="form-control" id="id" value="<?php echo $dataset['slug'];?>" name="slug">
          <!--tabbing-->
        <ul class="nav nav-tabs registeration mnt_tab_li" id="tab">
          <li class="<?php echo $active;?>"><a href="#select_account" data-toggle="tab" onclick="this.href;
                    return false;">
            <div class="img-circle out-circle">
              <div class="img-circle outer-circle"> 01 </div>
            </div>
            Pet adoption</a>
         </li>
         
          <li class="<?php echo $active1;?>" id="input_particular"><a href="#input_perticular" data-toggle="tab" onclick="this.href;
                    return false;">
            <div class="img-circle out-circle">
              <div class="img-circle outer-circle"> 02 </div>
            </div>
            Edit availability</a></li>
        </ul>
        <div class="tab-content steps">
        <!-- Tab panes -->
        <div class="tab-pane step-1 <?php echo $active; ?>" id="select_account"> 
		  <div class="form-group col-sm-4">
            <label for="Title" class="control-label">Title:<span class="asterisk">*</span></label>
            <input type="text" maxlength="140"  class="input_max_length form-control" id="title" value="<?php echo stripcslashes($dataset['title']);?>" name="title" placeholder="">
          </div>
          <div class="form-group fl">
                <label class="col-sm-3 control-label label_pad" for="search" style="float:left;">Country:<span class="asterisk">*</span> </label>
                <div class="col-sm-9 col-xs-12 multi_select padding_v"> 
                  <!-- Build your select: -->
                  <select  id="country" name="country" class="selectpicker show-menu-arrow input-xlarge nation">
                    <option value="">Select Nationality</option>
                    <option value="singapore" <?php if($dataset['country']=="singapore"){echo 'selected="selected"';}?>>Singapore</option>
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
                    <option value="<?php echo $v["id"]; ?>" <?php if($dataset['breed_id'] == $v["id"]){echo 'selected="selected"';}?>><?php echo ucfirst(stripcslashes($v["name"])); ?></option>
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
					$info='';
                    if (count($informations) != 0) {
                        $i = 0;
						$info = explode(',',$user_petadoption_informations['information_id']);
                        foreach ($informations as $k => $v){?>
                    <option value="<?php echo $v["id"]; ?>" <?php if(in_array($v["id"],$info)){echo 'selected="selected"';}?>><?php echo ucfirst(stripcslashes($v["title"])); ?></option>
                    <?php $i++;}} ?>
                  </select>
                </div>
              </div>
          <div class="form-group fl">
                <label for="Summary" class="control-label col-sm-6">Gender:<span class="asterisk">*</span></label>
                <div class="col-sm-8">
                <?php  if(isset($dataset['gender']) && $dataset['gender'] == 'm') { $male = 'checked=checked'; } else { $female = 'checked=checked'; }?>

                  <input <?php if(isset($male) && !empty($male)) { echo $male; } ?> type="radio"  value="m" name="gender"  placeholder="">
                  Male
                  <input <?php if(isset($female) && !empty($female)) { echo $female; } ?> type="radio"  value="f" name="gender"  placeholder="">
                  Female </div>
          </div>
          <div class="form-group fl">
                <label for="Summary" class="control-label col-sm-6">Age:<span class="asterisk">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="age" value="<?php echo !empty($dataset["age"]) ? $dataset["age"] : ""?>" name="age"  placeholder="">
                </div>
              </div>
          <div class="form-group fl">
            <label for="Summary" class="control-label col-sm-6">Summary headlines:<span class="asterisk">*</span></label>
            <div class="col-sm-8">
              <input type="text" class="form-control summary_max_length" maxlength="150" id="summary" value="<?php echo stripcslashes($dataset['summary']);?>" name="summary"  placeholder="">
            </div>
          </div>
          <div class="form-group fl">
            <div id="progress" class="progress">
                <div class="progress-bar progress-bar-success"></div>
            </div>
             </div> 
          <div class="form-group fl">
            <label for="Summary" class="control-label col-sm-6">Upload pictures in sequences (You can add min. 2 and max. 6 pictures):<span class="asterisk">*</span></label>
            <div class="col-sm-8 adfile">
              <div id="dropzone"  class="dropzone" style="height:auto; min-height:200px;">
                <div id="append_data">
                  <?php 
				  /*$last_blog_id = array_reverse($dataset['causeimages'],true);
				  $max = max(array_keys($last_blog_id));
				  $last_counter = $dataset['causeimages'][$max]["is_default_image"];*/
				  
				  foreach($dataset['causeimages'] as $key=>$val){
					  $video = array('3g2','3gp','asf','asx','avi','flv','m4v','mov','mp4','mpg','wmv');
					  $columnName = preg_replace('/[`~!@#$%\^&*()+={}[\]\\\\|;:\'",.><?\/]/', '-', $val);
					 ?>
                  <div id="<?php echo $columnName;?>" class="temp_upload_img">
                    <div>
                      <div><?php echo $val;?></div>
                      <?php $name= end(explode('.',$val));
							  if(in_array($name,$video)){ $src =  base_url().'images/video.png';}else {$src =  base_url().'cause_upload_images/thumbnail/'.$val;}
					 ?>
                    <ul class="app_data_ul">
					<li class="image" style="background-image:url(<?php echo $src ;?>); border:1px solid white;position:relative; background-size:cover; height:100px;background-position: center center;"></li>
					</ul>
                      </div>
                    <span style="float:left; line-height:2;">
                    <input type="hidden" value="<?php echo $val;?>" name="image[]">
                    <a id="<?php echo base_url();?>?file=<?php echo $val;?>" style="cursor:pointer;" onclick="remove_image_edit(this.id,this.name);" name="<?php echo $columnName;?>">Delete</a> </span> </div>
                  <?php } ?>
                </div>
                <span id="upload_1" style=" display:none;color: #0163BE;position: absolute;top: 75px;font-size: 30px;left: 25px;">Please wait uploading under progress.....</span> </div>
              <div class="pull-right browse_icon"> <!--<img id="webcamon" src="<?php echo base_url();?>images/browse_icon.png" class="br_icon" / >-->
                <div id='file_browse_wrapper'>
                  <input type='file' id='fileupload' name="files[]" multiple />
                </div>
              </div>
              <span style="color:red;">Max size: 4mb</span> </div>
          </div>
          <div class="form-group fl">
            <label for="Summary" class="control-label col-sm-6">Detailed stories:<span class="asterisk">*</span></label>
            <div class="col-sm-8">
              <textarea rows="10" maxlength="1500" class="textarea_max_length detail_field" name="detailed_stories" id="detailed_stories"><?php echo stripcslashes($dataset['detailed_stories']);?></textarea>
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
                <div id="append_data1">
                  <?php 	if( isset($dataset['causedoc']) && count($dataset['causedoc']) > 0){ 
					   foreach($dataset['causedoc'] as $dkey=>$dval){
					  $pdf = array('pdf','PDF');
					  $columnName1 = preg_replace('/[`~!@#$%\^&*()+={}[\]\\\\|;:\'",.><?\/]/', '-', $dval);
					 ?>
                  <div id="<?php echo $columnName1;?>" class="count_docs">
                    <div>
                      <div><?php echo $dval;?></div>
                      <?php $name1= end(explode('.',$dval));
							  if(in_array($name1,$pdf)){ $src =  base_url().'images/my_file_048.png';}else {$src =  base_url().'images/my_file_020.png';}
						?>
                      <img class="image" width="100" height="100" alt="pic" src="<?php echo $src ;?>" style="position:relative;"> </div>
                    <span style="float:left;line-height:2;margin: 0 0 0 47px;">
                    <input type="hidden" value="<?php echo $dval;?>" name="docs[]">
                    <a id="<?php echo base_url();?>?file=<?php echo $dval;?>" style="cursor:pointer;" onclick="remove_docs_edit(this.id,this.name);" name="<?php echo $columnName1;?>">Delete</a> </span> </div>
                  <?php } }?>
                </div>
                <span id="upload_2" style=" display:none;color: #0163BE;position: absolute;top: 75px;font-size: 30px;left: 138px;">Please wait uploading under progress.....</span> </div>
              <div class="pull-right browse_icon"> <!--<img id="webcamon" src="<?php echo base_url();?>images/browse_icon.png" class="br_icon" / >-->
                
                <div id='file_browse_wrapper' class="11file_browse_wrapper">
                  <input type='file' id='fileupload1' name="files[]" multiple />
                </div>
              </div>
              <span style="color:red; float:left;">Max size: 4mb</span> </div>
          </div>
          <div class="form-group fl">
            <label for="duration" class="control-label col-sm-6">Duration(Days)<span class="asterisk">*</span></label>
            <div class="col-sm-8">
               <input type="text" class="form-control4" id="duration" name="duration"  value="<?php echo $dataset['duration'];?>">
            </div>
          </div>
          
          <div class="form-group fl">
                <label for="duration" class="control-label col-sm-3">Location<span class="asterisk">*</span></label>
                <label  class="control-label col-sm-3">
                <input type="checkbox" onclick="get_pet_adoption_user_address_edit();" value="<?php echo $dataset['same_as_user'];?>" <?php if($dataset['same_as_user']==1){echo 'checked="checked"';}?> id="pet_adoption_options" name="pet_adoption_same_as_user">
                  Same as user: <span id="pet_adoption_loading"></span>
                </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control4" id="location" name="location"  value="<?php echo !empty($dataset['location']) ? $dataset['location'] : "";?>">
                </div>
              </div>
         </div> 
          <!--------------------------------------------------------------------------CALENDER START------------------------------------------------------------------->
          <?php 
		  if($this->router->method == "edit_step2"){?>
          <div class="tab-pane tab-2 mnt_reg_form  <?php echo $active1; ?>" id="input_perticular">
            <div>
              <h3>Calender</h3>
              <div class="col-md-12">
                <iframe style="border:none;" class="col-md-12"  width="100%" height="600" src="<?php echo base_url(); ?>calendar/?cause_id=<?php echo $this->uri->segment(3);?>&do=edit" ></iframe>
              </div>
            </div>
            <!--------------------------------------------------------------------------CALENDER END-------------------------------------------------------------------> 
          </div>
          <?php }?>
          </div>
          
        </div>
        <!--tabbing--> 
        
        </div>
       
        
        <div class="clearfix"></div>
       
        <div class="form-group col-md-12">
         <?php
			if($this->uri->segment(2) == "edit_step2"){?>
            <p style="color:#F00;"> “Essential information, we would need you to indicate before proceeding”.
            <!-- * Refers to essential information and we would need the user to indicate before proceeding.--> </p>
            <div class="checkbox">
              <label class="label_text">
                <input type="checkbox" value="1" id="confirm" checked="checked" style="margin-top:3px;">
                I have confrmed that the information I input is accurate and is of truth and have agreed to the <a href="<?php echo base_url();?>start_cause/terms" target="_blank"> Terms and Conditions </a> for using of this site </label>
            </div>
            <?php }?>
            <?php
			if($this->uri->segment(2) == "edit_pets"){?>
            <button class="btn btn-primary" type="button" onclick="window.location.href='<?php echo base_url().$this->router->class;?>/edit_step2/<?php  echo $dataset["id"];?>'";>Skip</button>
            <button class="btn btn-primary" type="button" onclick="return check_validation();">Next</button>
            <?php }else{?>
            <button class="btn btn-primary" type="button" onclick="window.location.href='<?php echo base_url().$this->router->class;?>/manage_pets/'";>Skip</button>
            <button class="btn btn-primary" type="button" onclick="return save_pet_adoption('<?php echo $this->uri->segment(3)?>');">Submit</button>
            <?php }?>
          </div>
      </div>
    </form>
  </div>
</div>
<style type="text/css">
#append_data .app_data_ul{
	list-style-type: none;
	margin: 0;
	padding: 0 0 0 10px;
	width: 123px;
}
#append_data li { margin: 3px 3px 3px 0; padding: 1px; float: left; width: 100px; height: 90px; font-size: 4em; text-align: center; }
#append_data li:hover{cursor:move;}
</style>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>calender/jquery.datetimepicker.css"/>
<script type="text/javascript" src="<?php echo base_url();?>js/custom.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap-multiselect.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>calender/jquery.datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/edit_pets.js"></script>  
<script type="text/javascript">
var LAST_ID = '<?php echo $last_counter; ?>';

function get_pet_adoption_user_address_edit() {

    if ($('#pet_adoption_options').is(":checked") == true) {

        var url = BASEURL + 'pets/get_pet_adoption_user_address/';
        $.ajax({
			type:'POST',
            url: url,
            data: 'type=json',
            beforeSend: function() {
                $('#pet_adoption_options').hide();
                $('#pet_adoption_loading').html('<span style="color:red;">Processing....</span>');
            },
            success: function(result){
                $('#pet_adoption_loading').html('');
                $('#pet_adoption_options').show();
                var result = eval("(" + result + ")");
				$('#pet_adoption_options').val(1);
                $('#location').val(result['address']).attr('readonly', 'readonly');
            },
            error: function(xhr, textStatus, errorThrown) {
                alert(textStatus);
            }
        });
    }
    else
    {
		$('#pet_adoption_options').val('');
        $('#location').val('').removeProp('readonly');
    }
}
function strip_tags(input) {
	var regX = /(<([^>]+)>)/ig;
	var html = input;
	return  html.replace(regX, "");
}

$(function() {
    $( "#append_data" ).sortable();
    $( "#append_data" ).disableSelection();
});	
</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>