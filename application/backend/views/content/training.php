<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<?php $pagename=$this->uri->segment(2);  ?>
<link href="<?php echo base_url(); ?>assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css"/>

<!-- BEGIN PAGE HEADER-->
<div class="row">
<div class="col-md-12"> 
  <!-- BEGIN PAGE TITLE & BREADCRUMB-->
  <h3 class="page-title">  Training  </h3>
  <ul class="page-breadcrumb breadcrumb">
    <li> <i class="fa fa-home"></i> <a href="<?php echo base_url();?>"> Home </a> <i class="fa fa-angle-right"></i> </li>
    <li> <a href="javascript:void(0);"> Content Mangement / Training  </a> </li>
  </ul>
  <!-- END PAGE TITLE & BREADCRUMB--> 
</div>
</div>
<!-- END PAGE HEADER--> 
<!-- BEGIN PAGE CONTENT-->
<div class="row profile">
<div class="col-md-12"> 
  <!--BEGIN TABS-->
  <div class="tabbable tabbable-custom tabbable-full-width">
    <ul class="nav nav-tabs">
      <li class="active"> <a href="#tab_1_1" data-toggle="tab"> Training </a> </li>
    </ul>
      <div class="message2" id="message"> <font color='red'><?php echo $this->session->flashdata('errormsg'); ?></font> <font color='green'><?php echo $this->session->flashdata('successmsg'); ?></font> </div>
    <div class="tab-content">
      <div class="tab-pane active" id="tab_1_1">
        <div class="row">
          <div class="col-md-9" style="width:100%">
            <div class="row">  </div>
            <!--end row-->
            <div class="tab-pane active" id="tab1"> </div>
            
             <form name="frm" id="frm" action="<?php echo base_url(); ?>content/update_page_to_database" method="post" enctype="multipart/form-data">
              <?php if($do=="edit"){ ?>
                <input type="hidden" name="id" value="<?php echo $resultset['id'];?>">
                <input type="hidden" name="page_name" value="<?php echo $pagename;?>">
			  <?php	} ?>
            <div class="form-group flare">
              <label class="control-label col-md-4" style="width:11.333333%"> Page Content </label>
              <div class="col-md-8" style="width:87.666667%">
                <textarea  class="ckeditor"  name="page_content" id="description"><?php echo $resultset['page_content'];?></textarea>
                 <span class="help-block" id="description_error">  </span> 
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-4">&nbsp; </label>
              <div class="col-md-8">
              <input type="submit" value="Save" class="btn theme-btn green pull-left" onclick="return validate_form();">
              <a href="<?php echo base_url();?>content/training"  class="btn theme-btn grey pull-left margd">Cancel</a>
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


   
<!-- BEGIN PAGE LEVEL PLUGINS --> 
<script src="<?php echo base_url(); ?>assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script> 
<script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jsFunctions.js"></script>
<script src="<?php echo base_url(); ?>assets/scripts/msdropdown/jquery.dd.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script> 
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

<script type="text/javascript" src="<?php echo base_url(); ?>js/validate_functions.js"></script>
<script type="text/javascript">
function validate_form(){
	/*var description = $('#description').val();
	//var email_regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
	if(description == ""){
		$('.help-block').html('');
		$('#description_error').html('Provide Description').css({'color':'red'});
		$('#description').focus(); 
		return false;
	 } 
	 else
	 {
	   return true;
	 }*/

}
</script>

