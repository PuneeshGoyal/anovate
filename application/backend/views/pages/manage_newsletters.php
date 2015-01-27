<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="<?php echo base_url(); ?>assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css"/>
<script>
function select_all(){
    $("#user").hide();
	$("#all").show();
};
function particular(){
	$("#all").hide();
    $("#user").show();
};

$(document).ready(function() {
	var user_type = '<?php echo $newslettersdata['type'];?>';
	if(user_type == "all"){
		$("#user").hide();
		$("#all").show();
	}
	if(user_type == "user"){
		$("#all").hide();
		$("#user").show();
	}
});
</script>
<!-- BEGIN PAGE HEADER-->
<div class="row">
  <div class="col-md-12"> 
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title"> Donations </h3>
    <ul class="page-breadcrumb breadcrumb">
      <li> <i class="fa fa-home"></i> <a href="<?php echo base_url();?>"> Home </a> <i class="fa fa-angle-right"></i> </li>
      <li> <a href="javascript:void(0);"> Manage newsletters </a> </li>
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
        <li class="active"> <a href="#tab_1_1" data-toggle="tab"> Newsletters </a> </li>
        <div class="message2" id="message"> <font color='red'><?php echo $this->session->flashdata('errormsg'); ?></font> <font color='green'><?php echo $this->session->flashdata('successmsg'); ?></font> </div>
      </ul>
      
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1_1">
          <div class="row">
            <div class="col-md-9" style="width:100%">
              <div class="row"> </div>
              <!--end row-->
              <div class="tab-pane active" id="tab1"> </div>
              <form name="frm" id="frm" action="<?php echo base_url(); ?><?php echo $this->router->class;?>/send_newsletters" method="post" enctype="multipart/form-data">
                <?php if($do=="edit"){ ?>
                    <input type="hidden" name="id" value="<?php echo $newslettersdata['id'];?>">
                    <input type="hidden" name="page_name" value="<?php echo $newslettersdata['page_name'];?>">
                <?php	
				} ?>
                
                 <div class="form-group flare">
                  <label class="control-label col-md-4" style="width:11.333333%"> Subscribers </label>
                  <div class="col-md-8" >
                     <input type="radio" name="type" <?php if($newslettersdata['type'] == "all"){echo 'checked="checked"';}?> onchange="select_all();"  value="all"/>All 
        			 <input type="radio" name="type"  <?php if($newslettersdata['type'] == "user"){echo 'checked="checked"';}?> onchange="particular();" value="user"/>Particular
      				
                    <span  id="all" style="display:none;">
					<?php //$users = $this->page_model->get_newsletter();?>
                        <select name="email"  class="form-control" style="width: 200px;min-height: 35px;">
                        <option value="all" >All</option>
                        </select>
                        </span>
                        
                        <br class="clear" />
                    <?php $users = $this->page_model->get_newsletter();?>
                    
                       <span  id="user" style="display:none;">
                        <select name="email[]"   class="form-control col-md-8" multiple style="width: 600px;min-height: 150px;">
                        <option disabled="disabled">Select users</option>
                        <?php if(count($users) > 0){
                            $msg = '';
                            foreach($users as $k => $v){
                                $ids = array();
                                if($resultset['type']=="user"){
                                    $j=0;foreach($resultset["email"] as $key =>$val){
                                        $ids[$j] = $val;
                                        $j++;
                                    }
                                }
                                
                        if(in_array($v["email"],$ids)){$msg = 'selected=selected';}else {$msg = '';}
                        ?>
                           <option value="<?php echo $v["email"];?>" <?php echo $msg;?>><?php echo $v["email"];?></option>
                        <?php }}?>
                        </select>
                        </span>
                        <br class="clear" / >
                      <span class="help-block" id="description_error"> </span> </div>
                </div>
                
                
                
                <div class="form-group flare">
                  <label class="control-label col-md-4" style="width:11.333333%"> Page Content </label>
                  <div class="col-md-8" style="width:87.666667%">
                   <!-- <textarea  class="ckeditor"  name="content" id="description"><?php echo $newslettersdata['content'];?></textarea>-->
                    <textarea rows="10" height="30"   class="form-control"  style="resize:none" name="content" id="description"><?php echo $newslettersdata['content'];?></textarea>
                    <span class="help-block" id="description_error"> </span> </div>
                </div>
                
                
                <div class="form-group">
                  <label class="control-label col-md-4" style="width:11.333333%">&nbsp; </label>
                  <div class="col-md-8">
                    <input type="submit" value="Save" class="btn theme-btn green pull-left" >
                    <!--<a href="<?php echo base_url();?><?php echo $this->router->class;?>/donations"  class="btn theme-btn grey pull-left margd">Cancel</a>--> 
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
<script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>js/jsFunctions.js"></script> 
<script src="<?php echo base_url(); ?>assets/scripts/msdropdown/jquery.dd.min.js"></script> 
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
