<?php //debug($bannerdata);?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>

<!-- BEGIN PAGE HEADER-->
<div class="row">
  <div class="col-md-12"> 
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title"> Add banner </h3>
    <ul class="page-breadcrumb breadcrumb">
      <li> <i class="fa fa-home"></i> <a href="<?php echo base_url(); ?>"> Home </a> <i class="fa fa-angle-right"></i> </li>
      
      <li> <a href="javascript:void(0);"> Add banner </a> </li>
    </ul>
    <!-- END PAGE TITLE & BREADCRUMB--> 
  </div>
</div>
<!-- END PAGE HEADER--> 
<!-- BEGIN PAGE CONTENT-->
 <div  id="message">
 <font color='red'><?php echo $this->session->flashdata('errormsg'); ?></font> 
 <font color='green'><?php echo $this->session->flashdata('successmsg'); ?></font> </div>
<div class="row profile">
  <div class="col-md-12"> 
    <!--BEGIN TABS-->
    <div class="tabbable tabbable-custom tabbable-full-width">
      <ul class="nav nav-tabs">
        <li class="active"> <a href="#tab_1_1" data-toggle="tab"> Add banner </a> </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1_1">
          <div class="row">
            <div class="col-md-9">
              <div class="row"></div>
              <!--end row-->
              <div class="tab-pane active" id="tab1"></div>
              <form name="frm" id="frm" action="<?php echo base_url().$this->router->class;?>/add_banners_to_database" method="post"  enctype="multipart/form-data">
              
              <?php if($do=="edit"){?>
                  <input type="hidden" name="id" value="<?php echo $bannerdata['id'];?>">
              <?php	}?>
              
              
              <div class="form-group flare">
                <label class="control-label col-md-4"> Title<span class="required">*</span> </label>
                <div class="col-md-8">
                  <input class="form-control" maxlength="54"  name="title" id="title" type="text" value="<?php echo !empty($bannerdata['title']) ? $bannerdata['title'] : "";?>"/>
                </div>
              </div>
			  
			  
			    <div class="form-group flare">
                <label class="control-label col-md-4"> Description 1<span class="required">*</span> </label>
                <div class="col-md-8">
                  <input class="form-control" maxlength="54"  name="description1" id="description1" type="text" value="<?php echo !empty($bannerdata['description1']) ? $bannerdata['description1'] : "";?>"/>
                </div>
              </div>
			  
			   <div class="form-group flare">
                <label class="control-label col-md-4"> Description 2<span class="required">*</span> </label>
                <div class="col-md-8">
                  <input class="form-control"  maxlength="54" name="description2" id="description2" type="text" value="<?php echo !empty($bannerdata['description2']) ? $bannerdata['description2'] : "";?>"/>
                </div>
              </div>
			  
			  <div class="form-group">
                    <label class="control-label col-md-4">Upload Photo<?php if($do !="edit"){?><span class="required">*</span><?php }?></label>
                    <div class="col-md-8">
					   <div style="position:relative;">
                        <a class='btn btn-primary' href='javascript:void(0);'>
                            Choose File...
                            <input name="image" id="image" type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;'  size="40"  onchange='$("#upload-file-info").html($(this).val());'>
                        </a>
                        &nbsp;
                        <span class='label label-info' id="upload-file-info"></span>
                    </div>
                    
                      <!--<input type="file" class="form-control" name="image" id="image">
                      </br>-->
                      
                      <?php if($do=="edit"){ ?>
                      	<img src="<?php echo $this->config->item("slideshowimages").$bannerdata['image'];?>" height="100px" width="120px" />
						<input type="hidden" name="banner_image" value="<?php echo !empty($bannerdata['image']) ? $bannerdata['image'] : "";?>" id="prev_image">
                      <?php }?>
                      <span class="help-block" id="image_error"> </span> </div>
                  </div>
			  <div class="form-group">
                <label class="control-label col-md-4">&nbsp; </label>
                <div class="col-md-8">
                   <input type="submit" value="Save" class="btn theme-btn green pull-left" >
                          <a href="<?php echo base_url().$this->router->class;?>/manage_banners"  class="btn theme-btn grey pull-left margd">Cancel</a>
                </div>
              </div>
              </div>
             
              
              </form>
            </div>
          </div>
        </div>
      </div>
      <!--tab_1_2--> 
      
    </div>
  </div>
  
  <!--END TABS--> 
</div>
<!-- END PAGE CONTENT--> 
 
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/jquery.cokie.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script> 
<!-- END CORE PLUGINS --> 
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"  type="text/javascript" ></script> 
<script src="<?php echo base_url(); ?>assets/plugins/fancybox/source/jquery.fancybox.pack.js"></script> 
<script src="<?php echo base_url(); ?>assets/scripts/core/app.js"></script> 
<script src="<?php echo base_url(); ?>assets/scripts/custom/search.js"></script> 
<script>
jQuery(document).ready(function() {    
   App.init();
   Search.init();
});
</script>
