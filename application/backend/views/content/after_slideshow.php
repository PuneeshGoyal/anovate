<?php $resultset['badges'] = ''; //print_r($volunteerdata); ?>

<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/css/datepicker.css"/>
<!-- END PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/dd.css" />
<!-- BEGIN PAGE HEADER-->
<div class="row">
  <div class="col-md-12"> 
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title"> Content Below Slideshow </h3>
    <ul class="page-breadcrumb breadcrumb">
      <li> <i class="fa fa-home"></i> <a href="<?php echo base_url(); ?>"> Home </a> <i class="fa fa-angle-right"></i> </li>
      <li> <a href="#"> Content Below Slideshow </a> </li>
    </ul>
    <!-- END PAGE TITLE & BREADCRUMB--> 
  </div>
</div>
<!-- END PAGE HEADER--> 
<!-- BEGIN PAGE CONTENT--> 
<!-- BEGIN PAGE CONTENT-->
<div class="row profile">
  <div class="col-md-12"> 
    <!--BEGIN TABS-->
    <div class="tabbable tabbable-custom tabbable-full-width">
      <ul class="nav nav-tabs">
        <li class="active"> <a href="#tab_1_1" data-toggle="tab"> Content Below Slideshow </a> </li>
      </ul>
      <div style=" position:absolute; float:left; left:211px;" id="message"> <font color='red'><?php echo $this->session->flashdata('errormsg'); ?></font> <font color='green'><?php echo $this->session->flashdata('successmsg'); ?></font> </div>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1_1">
          <div class="row">
            <div class="col-md-9">
              <div class="row"> 
                <!--end col-md-8--> 
                <!--end col-md-4--> 
              </div>
              <!--end row-->
              <div class="tab-pane active" id="tab1">
                <form name="frm" id="frm" action="<?php echo base_url();?>content/add_after_slideshow_to_database" method="post" enctype="multipart/form-data">
				  <?php if($do=="edit"){ ?>
                    <input type="hidden" name="id" value="<?php echo $resultset['id'];?>">
                    <input type="hidden" name="page_name" value="<?php echo $pagename;?>">
                  <?php	} ?>
                  <div class="form-group">
                    <label class="control-label col-md-4">Left Title <span class="required"> * </span></label>
                    <div class="col-md-8">
                      <input type="text" class="form-control"  name="left_title" id="left_title" value="<?php echo !empty($resultset['left_title']) ? $resultset['left_title']: ""; ?>">
                      <span class="help-block" id="left_title_error"> </span> </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4">Left Image <span class="required"> * </span></label>
                    <div class="col-md-8">
                      <input type="file" class="form-control" name="pics[]" id="left_image">
                      </br>
                      <input type="hidden" name="image0" value="<?php echo $resultset['image0'];?>" id="prev_left_image">
                      <?php if($do=="edit"){ ?>
                      	<img src="<?php echo BASEURL;?>slideshowimages/<?php echo $resultset['image0'];?>" height="73px" width="73px" />
                      <?php }?>
                      <span class="help-block" id="image_error"> </span> </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4">Left Description <span class="required"> * </span></label>
                    <div class="col-md-8">
                      <textarea class="form-control" rows="2" name="left_description" id="left_description"><?php echo !empty($resultset['left_description']) ? $resultset['left_description']: ""; ?></textarea>
                      <span class="help-block" id="left_descriptiondescription_error"> </span> </div>
                  </div>
                  <?php /*?><div class="form-group">
                    <label class="control-label col-md-4">Middle Title <span class="required"> * </span></label>
                    <div class="col-md-8">
                      <input type="text" class="form-control"  name="middle_title" id="middle_title" value="<?php echo !empty($resultset['middle_title']) ? $resultset['middle_title']: ""; ?>">
                      <span class="help-block" id="middle_title_error"> </span> </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4">Middle Image <span class="required"> * </span></label>
                    <div class="col-md-8">
                      <input type="file" class="form-control" name="pics[]" id="middle_image">
                      </br>
                      <input type="hidden" name="image1" value="<?php echo $resultset['image1'];?>" id="prev_middle_image">
                      <?php if($do=="edit"){ ?>
                      	<img src="<?php echo BASEURL;?>slideshowimages/<?php echo $resultset['image1'];?>" height="73px" width="73px" />
                      <?php }?>
                      <span class="help-block" id="middle_image_error"> </span> </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4">Middle Description <span class="required"> * </span></label>
                    <div class="col-md-8">
                      <textarea class="form-control" rows="2" name="middle_description" id="middle_description"><?php echo !empty($resultset['middle_description']) ? $resultset['middle_description']: ""; ?></textarea>
                      <span class="help-block" id="middle_description_error"> </span> </div>
                  </div><?php */?>
                  <div class="form-group">
                    <label class="control-label col-md-4">Right Title <span class="required"> * </span></label>
                    <div class="col-md-8">
                      <input type="text" class="form-control"  name="right_title" id="right_title" value="<?php echo !empty($resultset['right_title']) ? $resultset['right_title']: ""; ?>">
                      <span class="help-block" id="right_title_error"> </span> </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4">Right Image <span class="required"> * </span></label>
                    <div class="col-md-8">
                      <input type="file" class="form-control" name="pics[]" id="right_image">
                      </br>
                      <input type="hidden" name="image1" value="<?php echo $resultset['image1'];?>" id="prev_right_image">
                      <?php if($do=="edit"){ ?>
                      	<img src="<?php echo BASEURL;?>slideshowimages/<?php echo $resultset['image1'];?>" height="73px" width="73px" />
                      <?php }?>
                      <span class="help-block" id="right_image_error"> </span> </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4">Right Description <span class="required"> * </span></label>
                    <div class="col-md-8">
                      <textarea class="form-control" rows="2" name="right_description" id="right_description"><?php echo !empty($resultset['right_description']) ? $resultset['right_description']: ""; ?></textarea>
                      <span class="help-block" id="right_description_error"> </span> </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-4">&nbsp; </label>
                    <div class="col-md-8">
                      <input type="submit" value="Save" class="btn theme-btn green pull-left" onclick="return validate_form();">
                      <a href="<?php echo base_url();?>content/after_slideshow"  class="btn theme-btn grey pull-left margd">Cancel</a> </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--tab_1_2--> 
    </div>
  </div>
  <!--END TABS--> 
</div>
<!-- BEGIN PAGE LEVEL PLUGINS --> 
<script src="<?php echo base_url(); ?>assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>js/jsFunctions.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/scripts/msdropdown/jquery.dd.min.js"></script> 
<script>
//var tc;
$(document).ready(function(e) {
	$("#payments").msDropdown({visibleRows:4});
	$("#tech").msDropdown().data("dd");//{animStyle:'none'} /{animStyle:'slideDown'} {animStyle:'show'}		
	//no use
	try {
		var pages = $("#pages").msDropdown({on:{change:function(data, ui) {
			var val = data.value;
			if(val!="")
				window.location = val;
		}}}).data("dd");

		var pagename = document.location.pathname.toString();
		pagename = pagename.split("/");
		pages.setIndexByValue(pagename[pagename.length-1]);
		$("#ver").html(msBeautify.version.msDropdown);
	} catch(e) {
		//console.log(e);	
	}
	
	$("#ver").html(msBeautify.version.msDropdown);
});

</script> 

<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/jquery.cokie.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script> 
<!-- END CORE PLUGINS --> 
<!-- BEGIN PAGE LEVEL PLUGINS --> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script> 
<!-- END PAGE LEVEL PLUGINS --> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> 
<!-- BEGIN PAGE LEVEL SCRIPTS --> 
<script src="<?php echo base_url(); ?>assets/scripts/core/app.js"></script> 
<script src="<?php echo base_url(); ?>assets/scripts/custom/components-pickers.js"></script> 
<!-- END PAGE LEVEL SCRIPTS --> 
<script>
  jQuery(document).ready(function() {       
	 // initiate layout and plugins
	 App.init();
	ComponentsPickers.init();
  });   
</script> 
<script type="text/javascript">
function validate_form(){
	var left_title = $('#left_title').val();
	var prev_left_image = $('#prev_left_image').val();
	var left_image = $('#left_image').val();
	var left_description = $('#left_description').val();
	
	/*var middle_title = $('#middle_title').val();
	var prev_middle_image = $('#prev_middle_image').val();
	var middle_image = $('#middle_image').val();
	var middle_description = $('#middle_description').val();*/
	
	var right_title = $('#right_title').val();
	var prev_right_image = $('#prev_right_image').val();
	var right_image = $('#right_image').val();
	var right_description = $('#right_description').val();

    if(left_title == ""){
		$('.help-block').html('');
		$('#left_title_error').html('Provide Left Title').css({'color':'red'});
		$('#left_title').focus(); 
		return false;
	 } 
	  else if(left_image == "" && prev_left_image==""){
		$('.help-block').html('');
		$('#left_image_error').html('Choose Left Image').css({'color':'red'});
		$('#left_image').focus(); 
		return false;
	 }
	else if(left_description == ""){
		$('.help-block').html('');
		$('#left_description_error').html('Provide Left Description').css({'color':'red'});
		$('#left_description').focus(); 
		return false;
	 }
   else if(right_title == ""){
		$('.help-block').html('');
		$('#right_title_error').html('Provide Right Title').css({'color':'red'});
		$('#right_title').focus(); 
		return false;
	 } 
	  else if(right_image == "" && prev_right_image==""){
		$('.help-block').html('');
		$('#right_image_error').html('Choose Right Image').css({'color':'red'});
		$('#right_image').focus(); 
		return false;
	 }
	else if(right_description == ""){
		$('.help-block').html('');
		$('#right_description_error').html('Provide Right Description').css({'color':'red'});
		$('#right_description').focus(); 
		return false;
	 }
 /*  else if(middle_title == ""){
		$('.help-block').html('');
		$('#middle_title_error').html('Provide Middle Title').css({'color':'red'});
		$('#middle_title').focus(); 
		return false;
	 } 
	  else if(middle_image == "" && prev_right_image==""){
		$('.help-block').html('');
		$('#middle_image_error').html('Choose Middle Image').css({'color':'red'});
		$('#middle_image').focus(); 
		return false;
	 }*/
	/*else if(right_description == ""){
		$('.help-block').html('');
		$('#middle_description_error').html('Provide Middle Description').css({'color':'red'});
		$('#middle_description').focus(); 
		return false;
	 }*/
	 else{
	   return true;
	 }
}
</script> 
