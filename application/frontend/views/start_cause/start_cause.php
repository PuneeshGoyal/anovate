<?php
//fetch all active tags and that are not deleted 
$all_tags = array();
$all_tags = $this->start_cause_model->get_all_tags();
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/start_cause.css">
<div id="carousel-example-generic" class="carousel slide sliders custom-slider" data-ride="carousel"> 
  <!-- Indicators --> 
  <!-- Causes1 checkboxes -->
  <div class="container">
    <form role="form" enctype="multipart/form-data" id="tutorial_replym" action="<?php echo base_url(); ?>start_cause/add_cause" method="post">
      <div class="row check_box">
        <div class="col-md-12 checkfields">
          <div id="error_msgs"  style="color: red;padding-top:13px; text-align:center;width:50%; display:none"></div>
          <div id="message"> <font color='red'><?php echo $this->session->flashdata('errormsg'); ?></font> <font color='green'><?php echo $this->session->flashdata('successmsg'); ?></font> </div>
          
          
          <div class="input-group checkboxes">
            <label>Fundraising :</label>
            <input type="checkbox" id="fundraising" name="fundraising" value="1" relation="0"  onclick="show_hide('fundraising');"/>
          </div>
          
          <div class="input-group checkboxes">
            <label>Pledge :</label>
            <input type="checkbox" id="petition" name="petition" value="1" relation="0" onclick="show_hide('petition');"/>
          </div>
          <div class="input-group checkboxes">
            <label>Volunteers :</label>
            <input type="checkbox" id="volunteer" name="volunteer" value="1" relation="0" onclick="show_hide('volunteer');"/>
          </div>
          <!--         <div class="input-group checkboxes">
                        <label>Pet adoption :</label>
                        <input type="checkbox" id="petadoption" name="petadoption" value="1" relation="0" onclick="show_hide('petadoption');"/>

                    </div> --> 
          <!-- <input id="chkBoxPetAdopt" data-toggle="modal" data-target="#myModalk"  type="checkbox"/>--> 
          <!-- /input-group --> 
        </div>
      </div>
      
      <!--Startacayse formstrcture start-->
      <div class="row" id="startacause">
        <div class="col-sm-12">
          <div class="form-group col-sm-4">
            <label for="Title" class="control-label">Title:<span class="asterisk">*</span></label>
            <input maxlength="140" type="text" class="input_max_length form-control" id="title" value="" name="title" placeholder="">
          </div>
          <div class="form-group fl">
            <label class="col-sm-3 control-label label_pad" for="search" style="float:left;">Add taglines for search and filter:<span class="asterisk">*</span> </label>
            <div class="col-sm-9 col-xs-12 multi_select padding_v"  id="tags"> 
              <!-- Build your select: -->
              <?php
				$all_tags = $this->start_cause_model->get_all_tags();
				?>
              <select class="multiselect" multiple="multiple" name="tag[]">
                <!--<option value="all" <?php if ($_GET['type'] == 'all') {
                                echo 'selected=selected';
                            } ?>>All</option>-->
                <?php
				if (count($all_tags) != 0) {
					$i = 0;
					foreach ($all_tags as $k => $v) {
						?>
                <option value="<?php echo $v["id"]; ?>"><?php echo ucfirst($v["tag"]); ?></option>
                <?php $i++;
                        }
                    } ?>
              </select>
            </div>
          </div>
          <div class="form-group fl">
            <label for="Summary" class="control-label col-sm-6">Summary headlines:<span class="asterisk">*</span></label>
            <div class="col-sm-8">
              <input type="text" class="form-control summary_max_length" maxlength="150" id="summary" value="" name="summary"  placeholder="">
            </div>
          </div>
          <div class="form-group fl">
            <label for="Summary" class="control-label col-sm-6">Youtube video id:</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="youtube_link"  value="" name="youtube_link"  placeholder="Please enter the youtube video url">
              <span style="color:#818080;">e.g. -http://www.youtube.com/watch?v=YY5EfaF61hI</span> </div>
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
          
          <!-------------------------------CAM---------------------------> 
          
          <!--<div style="width:330px;float:left;">
                                  <div id="webcam">
                                  </div>
                                  <div style="margin:5px;">
                                          <img src="<?php echo base_url(); ?>webcam/webcamlogo.png" style="vertical-align:text-top"/>
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
            <label for="duration" class="control-label col-sm-6">Duration for the cause to appear on the page (Days).<span class="asterisk">*</span></label>
            <div class="col-sm-8">
              <input type="text" class="form-control4" id="duration" name="duration"  value="">
              <!--<label>Day</label>--> 
            </div>
          </div>
          <!--</form>--> 
        </div>
        <div class="col-sm-12 information_form" id="fundraising_block" style="display:none;">
          <h1>Fundraising additional information</h1>
          <div class="add_info">
            <div class="form-group fl">
              <label for="Fund allocation" class="col-sm-5 control-label label_pad">Fund allocation:<span class="asterisk">*</span></label>
              <div class="col-sm-9">
                <input type="text" placeholder="" class="form-control" name="fund_allocation_information"  id ="fund_allocation_information" value="">
              </div>
            </div>
            <div class="form-group fl">
              <label for="benefciary" class="col-sm-5 control-label label_pad">Address of beneficiary:<span class="asterisk">*</span></label>
            </div>
            <div class="form-group fl">
              <div class="radio">
                <label class="control-label scfl">
                  <input type="checkbox" name="options" id="options" value="" class="radio_btn" onclick="get_user_address();">
                  Same as user: <span id="loading"></span></label>
              </div>
            </div>
            <div class="form-group fl">
              <label class="col-sm-2 control-label label_pad" for="Postal">Postal:<span class="asterisk">*</span></label>
              <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="" id="postal_code" name="postal_code" value="">
              </div>
              <label class="col-sm-2 control-label label_pad" for="Address">Address:<span class="asterisk">*</span></label>
              <div class="col-sm-4">
                <input type="text" class="form-control" placeholder="" id="address" name="address" value="">
              </div>
            </div>
            <div class="form-group fl">
              <label class="col-sm-2 control-label label_pad" for="Unit">Unit:<span class="asterisk">*</span></label>
              <span class="sym">#</span>
              <div class="col-sm-2">
                <input type="text" class="form-control" placeholder="" id="unit_f" name="unit_f" value="">
              </div>
              <span class="sym">-</span>
              <div class="col-sm-2">
                <input type="text" class="form-control" placeholder="" id="unit_l" name="unit_l" value="">
              </div>
            </div>
            <div class="form-group col-sm-4" style="clear:both;">
              <label class="control-label" for="Title"> Target amount:<span class="asterisk">*</span> </label>
              <input type="text" placeholder=""  class="form-control" id="target_amount" name="target_amount" value="">
            </div>
           
          </div>
        </div>
        <!--Petition starts-->
        <div class="col-md-8 pull-left information_form">
          <div id="petition_block" style="display:none;">
            <h1>Pledge additional information</h1>
            <div class="addi_form"> 
              <!--<form action="" method="get" class="addi_form">-->
              
              <div class="form-group col-md-12 col-sm-12 padng_none">
                <div class="form-group col-sm-4 col-xs-12  padng_none2 startacause">
                  <label for="Title" class="control-label">Target number of pledge<span class="asterisk">*</span></label>
                  <input type="text" class="form-control" id="petition_target_amount" name="petition_target_amount" value="" placeholder="">
                </div>
                <!--<div class="form-group col-sm-6 col-xs-12  padng_none2 startacause">
                  <label for="Title" class="control-label">Duration/Days<span class="asterisk">*</span></label>
                  <input type="text" class="form-control4" id="petition_duration" name="petition_duration"  value="">
                  <label>Day</label>
                </div>--> 
              </div>
              <label class="control-label" for="Title">Pledge messages<span class="asterisk">*</span></label>
              <!--<form role="form">-->
              <textarea rows="3" maxlength="250" class="textarea_max_length form-control" name="petition_message" id="petition_message"></textarea>
              <!-- </form>--> 
            </div>
          </div>
          
        </div>
        <!--Petition ends-->
        
        <!--Volunteer starts-->
        <div class="col-md-8 pull-left information_form" id="volunteer_block" style="display:none;">
          <h1>Meeting time and location</h1>
          <div class="addi_form volunteer_form">
          	<h1>Location of event<span class="asterisk">*</span></h1>
            <div class="form-group fl">
              <div class="radio">
                <label class="control-label scfl">
                  <input type="checkbox" onclick="get_volunteer_user_address();" class="radio_btn" value="" id="volunteer_options" name="volunteer_same_as_user">
                  Same as user: <span id="volunteer_loading"></span></label>
              </div>
            </div>
            
            <div class="col-md-4 col-xs-12 form-group">
            	<label>Postal:</label><!--<span class="asterisk">*</span>-->
                <input type="text" placeholder=""  class="form-control" id="volunteer_event_postal" name="volunteer_event_postal" value="">
            </div>
            
            
            <div class="col-md-8 col-xs-12 form-group">
            	<label>Address:</label><span class="asterisk">*</span>
                <input type="text" placeholder=""  class="form-control" id="volunteer_event_address" name="volunteer_event_address" value="">
            </div>
            
            <div class="col-md-12 col-xs-12">
            	<label>Unit:</label><!--<span class="asterisk">*</span>-->
            </div>
            
            <div class="col-md-2 col-xs-12 form-group">
            <input type="text" placeholder=""  class="form-control" id="volunteer_event_unit_f" name="volunteer_event_unit_f" value="">
            </div>
            
            <div class="col-md-1 sym">-</div>
            <div class="col-md-2 col-xs-12 form-group">
            <input type="text" placeholder=""  class="form-control" id="volunteer_event_unit_l" name="volunteer_event_unit_l" value="">
            </div>
            
            <div class="clearfix"></div>
            <h1>Date &amp; time<span class="asterisk">*</span></h1>
            <div class="col-md-8 col-xs-12 form-group">
            	<label>From:</label><span class="asterisk">*</span>
                <input type="text" placeholder="Date & time"  class="form-control" id="volunteer_start_date" name="volunteer_start_date" value="">
            </div>
            
            <div class="col-md-8 col-xs-12 form-group">
            	<label>To:</label><span class="asterisk">*</span>
                <input type="text" placeholder="Date & time"  class="form-control" id="volunteer_end_date" name="volunteer_end_date" value="">
            </div>
            
            <div class="col-md-8 col-xs-12 form-group">
            	<label>Target number of volunteers:</label><span class="asterisk">*</span>
                <input type="text" placeholder=""  class="form-control" id="volunteer_target_number" name="volunteer_target_number" value="">
            </div>
        
          </div>
        </div>
        <!--Volunteer ends-->
        
        <div class="clearfix"></div>
          
          <!-- <form class="term" method="get" action="">-->
          <div class="form-group col-md-12  padng_none_new">
            <p style="color:#F00;"> “Essential information, we would need you to indicate before proceeding”.
            <!--* Refers to essential information and we would need the user to indicate before proceeding.--> </p>
            <div class="checkbox">
              <label class="label_text">
                <input type="checkbox" style="margin-top:2px;" value="1" id="confirm">
                I have confirmed that the information I input is accurate and is of truth and have agreed to the <a href="<?php echo base_url(); ?>pages/terms" target="_blank"> Terms and Conditions </a> for using of this site </label>
            </div>
          </div>
          <div class="col-md-12 padng_none_new"> 
            <!--<div class="col-md-6 col-sm-6 col-xs-6"><button class="btn btn-danger red_btn" type="button">Preview</button></div>-->
             
            <button class="btn btn-primary blue_btn" type="button" onclick="javascript: return check_validation();">Submit</button>
          </div>
          <!--</form>--> 
      </div>
    </form>
  </div>
</div>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>calender/jquery.datetimepicker.css"/>
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap-multiselect.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>js/custom.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap-checkbox.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>calender/jquery.datetimepicker.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>js/start_cause.js"></script>

<style type="text/css">
#append_data .app_data_ul{
	list-style-type: none;
	margin: 0;
	padding: 0 0 0 10px;
	width: 123px;
}
</style>
