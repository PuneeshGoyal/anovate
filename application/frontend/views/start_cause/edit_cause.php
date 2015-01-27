<?php
//fetch all active tags and that are not deleted 
$all_tags=array();
$all_tags = $this->start_cause_model->get_all_tags();

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
</style>

<div id="carousel-example-generic" class="carousel slide sliders custom-slider" data-ride="carousel"> 
  <!-- Indicators --> 
  
  <!-- Causes1 checkboxes -->
  <div class="container">
    <form role="form" enctype="multipart/form-data" id="tutorial_replym" action="<?php echo base_url();?>start_cause/update_cause" method="post">
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
          <input type="hidden" class="form-control" id="id" value="<?php echo $dataset['id'];?>" name="id">
          <input type="hidden" class="form-control" id="id" value="<?php echo $dataset['slug'];?>" name="slug">
          <div class="form-group col-sm-4">
            <label for="Title" class="control-label">Title:<span class="asterisk">*</span></label>
            <input type="text" maxlength="140"  class="input_max_length form-control" id="title" value="<?php echo stripcslashes($dataset['title']);?>" name="title" placeholder="">
          </div>
          <div class="form-group fl">
            <label class="col-sm-3 control-label label_pad" for="search">Add taglines for search and filter:<span class="asterisk">*</span></label>
            <div class="col-sm-9 col-xs-12 multi_select padding_v"  id="tags"> 
              <!-- Build your select: -->
           <?php
            $all_tags = $this->start_cause_model->get_all_tags();
		   ?>
              <select class="multiselect" multiple="multiple" name="tag[]">
                <!--<option value="all" <?php if($_GET['type']=='all'){echo 'selected=selected';}?>>All</option>-->
                <?php  if(count($all_tags) !=0){
               $i=0; 
			   $tag = explode(',',$dataset["tagline"]);
               foreach ($all_tags as $k=>$v)
                {?>
                <option value="<?php echo $v["id"];?>" <?php if(in_array($v["id"],$tag)){echo 'selected=selected';}?>><?php echo ucfirst($v["tag"]);?></option>
                <?php  $i++;}}?>
              </select>
            </div>
          </div>
          <div class="form-group fl">
            <label for="Summary" class="control-label col-sm-6">Summary headlines:<span class="asterisk">*</span></label>
            <div class="col-sm-8">
              <input type="text" class="form-control summary_max_length" maxlength="150" id="summary" value="<?php echo stripcslashes($dataset['summary']);?>" name="summary"  placeholder="">
            </div>
          </div>
          
          <?php if($dataset['youtube_link']<>""){?>
          <div class="form-group fl">
            <label for="Summary" class="control-label col-sm-6">Youtube video id:</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="youtube_link"  value="<?php echo !empty($dataset['youtube_link']) ? $dataset['youtube_link'] : "";?>" name="youtube_link"  placeholder="Please enter the youtube video url">
              <span>e.g. -http://www.youtube.com/watch?v=YY5EfaF61hI</span> </div>
          </div>
          <?php }?>
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
                  <?php foreach($dataset['causeimages'] as $key=>$val){
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
          <!--<span id="mukesh">Click me</span>--> 
          
          <!-------------------------------CAM---------------------------> 
          
          <!--	<div style="width:330px;float:left;">
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
            <label for="duration" class="control-label col-sm-6">Duration for the cause to appear on the page (Days)<span class="asterisk">*</span></label>
            <div class="col-sm-8">
               <input type="text" class="form-control4" id="duration" name="duration"  value="<?php echo $dataset['duration'];?>">
                  <!--<label>Day</label>-->
            </div>
          </div>
          
          
          <!--</form>--> 
        </div>
        <div class="col-sm-12 information_form" id="fundraising_block" style=" <?php if($dataset['is_fundraise']==1){echo  'display:block';}else{echo 'display:none';} ?>">
          <h1>Fundraising additional information</h1>
          <div class="add_info">
            <div class="form-group fl">
              <label for="Fund allocation" class="col-sm-3 control-label label_pad">Fund allocation:<span class="asterisk">*</span></label>
              <div class="col-sm-9">
                <input type="text" placeholder="" class="form-control" name="fund_allocation_information"  id ="fund_allocation_information" value="<?php echo $dataset['fund_allocation_information'];?>">
              </div>
            </div>
            <div class="form-group fl">
              <label for="benefciary" class="col-sm-4 col-md-4 control-label label_pad" style="padding-left:14px;">Address of beneficiary:<span class="asterisk">*</span></label>
            </div>
            <div class="form-group fl">
              <div class="radio">
                <label class="control-label scfl">
                  <input type="checkbox" name="options" id="options" value="<?php echo $dataset['same_as_user'];?>" <?php if($dataset['same_as_user']==1){echo 'checked="checked"';}?> class="radio_btn" onclick="get_user_address();">
                  Same as user: <span id="loading"></span></label>
              </div>
            </div>
            <div class="form-group fl">
              <label class="col-sm-2 control-label label_pad" for="Postal">Postal:<span class="asterisk">*</span></label>
              <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="" id="postal_code" name="postal_code" value="<?php echo $dataset['postal_code'];?>">
              </div>
              <label class="col-sm-2 control-label label_pad" for="Address">Address:<span class="asterisk">*</span></label>
              <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="" id="address" name="address" value="<?php echo stripcslashes($dataset['address']);?>">
              </div>
            </div>
            <div class="form-group fl">
              <label class="col-sm-2 control-label label_pad" for="Unit">Unit:<span class="asterisk">*</span></label>
              <span class="sym">#</span>
              <div class="col-sm-2">
                <input type="text" class="form-control" placeholder="" id="unit_f" name="unit_f" value="<?php echo $dataset['unit_f'];?>">
              </div>
              <span class="sym">-</span>
              <div class="col-sm-2">
                <input type="text" class="form-control" placeholder="" id="unit_l" name="unit_l" value="<?php echo $dataset['unit_l'];?>">
              </div>
            </div>
            <div class="form-group col-sm-4">
              <label class="control-label" for="Title"> Target amount:<span class="asterisk">*</span> </label>
              <input type="text" placeholder=""  class="form-control" id="target_amount" name="target_amount" value="<?php echo $dataset['target_amount'];?>">
            </div>
            
          </div>
        </div>
       
        <div class="col-md-8 pull-left information_form">
          <div id="petition_block" style=" <?php if($dataset['is_petition']==1){echo  'display:block';}else{echo 'display:none';} ?>">
            <h1>Pledge additional information</h1>
            <div class="addi_form"> 
              <!--<form action="" method="get" class="addi_form">-->
              
              <div class="form-group col-md-12 col-sm-12 padng_none">
                <div class="form-group col-sm-4 col-xs-12  padng_none2 startacause">
                  <label for="Title" class="control-label">Target number of pledge<span class="asterisk">*</span></label>
                  <input type="text" class="form-control" id="petition_target_amount" name="petition_target_amount" value="<?php echo !empty($dataset["petition_target_amount"]) ? $dataset["petition_target_amount"]: "";?>" placeholder="">
                </div>
                
              </div>
              <label class="control-label" for="Title">Pledge messages<span class="asterisk">*</span></label>
              <!--<form role="form">-->
              <textarea rows="3" class="form-control" name="petition_message" id="petition_message"><?php echo !empty($dataset["petition_message"]) ? $dataset["petition_message"] : "";?></textarea>
              <!-- </form>--> 
            </div>
          </div>
          <div class="clearfix"></div>
          
          
        </div>
         <div class="clearfix"></div>
           
        <!--Volunteer starts-->
        <div class="col-md-8 pull-left information_form" id="volunteer_block" style=" <?php if($dataset['is_volunteer']==1){echo  'display:block';}else{echo 'display:none';} ?>">
          <h1>Meeting time and location</h1>
          <div class="addi_form volunteer_form">
          	<h1>Location of event<span class="asterisk">*</span></h1>
            <div class="form-group fl">
              <div class="radio">
                <label class="control-label scfl">
                  <input type="checkbox" onclick="get_volunteer_user_address();" class="radio_btn" value="<?php echo $dataset['volunteer_same_as_user'];?>" id="volunteer_options" name="volunteer_same_as_user" <?php if($dataset['volunteer_same_as_user']==1){echo 'checked="checked"';}?> >
                  Same as user: <span id="volunteer_loading"></span></label>
              </div>
            </div>
            <div class="col-md-4 col-xs-12 form-group">
            	<label>Postal:</label><!--<span class="asterisk">*</span>-->
                <input type="text" placeholder=""  class="form-control" id="volunteer_event_postal" name="volunteer_event_postal" value="<?php echo !empty($dataset["volunteer_event_postal"]) ? $dataset["volunteer_event_postal"] : "";?>">
            </div>
            <div class="col-md-8 col-xs-12 form-group">
            	<label>Address:</label><span class="asterisk">*</span>
                <input type="text" placeholder=""  class="form-control" id="volunteer_event_address" name="volunteer_event_address" value="<?php echo !empty($dataset["volunteer_event_address"]) ? $dataset["volunteer_event_address"] : "";?>">
            </div>
            <div class="col-md-12 col-xs-12">
            	<label>Unit:</label><!--<span class="asterisk">*</span>-->
            </div>
            <div class="col-md-2 col-xs-12 form-group">
            <input type="text" placeholder=""  class="form-control" id="volunteer_event_unit_f" name="volunteer_event_unit_f" value="<?php echo !empty($dataset["volunteer_event_unit_f"]) ? $dataset["volunteer_event_unit_f"] : "";?>">
            </div>
            <div class="col-md-1 sym">-</div>
            <div class="col-md-2 col-xs-12 form-group">
            <input type="text" placeholder=""  class="form-control" id="volunteer_event_unit_l" name="volunteer_event_unit_l" value="<?php echo !empty($dataset["volunteer_event_unit_l"]) ? $dataset["volunteer_event_unit_l"] : "";?>">
            </div>
            <div class="clearfix"></div>
            <h1>Date &amp; time<span class="asterisk">*</span></h1>
            <div class="col-md-8 col-xs-12 form-group">
            	<label>From:</label><span class="asterisk">*</span>
                <input type="text" placeholder="Date & time"  class="form-control" id="volunteer_start_date" name="volunteer_start_date" value="<?php echo date('d/m/Y h:i a',$dataset["volunteer_start_date"]);?>">
            </div>
            <div class="col-md-8 col-xs-12 form-group">
            	<label>To:</label><span class="asterisk">*</span>
                <input type="text" placeholder="Date & time"  class="form-control" id="volunteer_end_date" name="volunteer_end_date" value="<?php echo date('d/m/Y h:i a',$dataset["volunteer_end_date"]);?>">
            </div>
            <div class="col-md-8 col-xs-12 form-group">
            	<label>Target number of volunteers:</label><span class="asterisk">*</span>
                <input type="text" placeholder=""  class="form-control" id="volunteer_target_number" name="volunteer_target_number" value="<?php echo !empty($dataset["volunteer_target_number"]) ? $dataset["volunteer_target_number"] : "";?>">
            </div>
        
          </div>
          
        </div>
        <!--Volunteer ends-->
        <div class="clearfix"></div>
        <div class="form-group col-md-12 padng_none_new">
            <p style="color:#F00;"> “Essential information, we would need you to indicate before proceeding”.
            <!-- * Refers to essential information and we would need the user to indicate before proceeding.--> </p>
            <div class="checkbox">
              <label class="label_text">
                <input type="checkbox" value="1" id="confirm" checked="checked" style="margin-top:3px;">
                I have confrmed that the information I input is accurate and is of truth and have agreed to the <a href="<?php echo base_url();?>start_cause/terms" target="_blank"> Terms and Conditions </a> for using of this site </label>
            </div>
            <button class="btn btn-primary blue_btn" type="button" onclick="return check_validation();">Submit</button>
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
</style>
<!--<script language="JavaScript" src="//ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script> -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>calender/jquery.datetimepicker.css"/>
<script type="text/javascript" src="<?php echo base_url();?>js/custom.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap-multiselect.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>calender/jquery.datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/edit_cause.js"></script>  
<script type="text/javascript">
function strip_tags(input) {
	var regX = /(<([^>]+)>)/ig;
	var html = input;
	return  html.replace(regX, "");
}	
</script>