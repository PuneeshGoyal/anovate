<!-- BEGIN PAGE HEADER-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<!-- BEGIN PAGE HEADER-->
<div class="row">
  <div class="col-md-12">
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title"> View cause</h3>
    <ul class="page-breadcrumb breadcrumb">
      <li> <i class="fa fa-home"></i> <a href="<?php echo base_url();?>dashboard/"> Home </a> <i class="fa fa-angle-right"></i> </li>
      <li> <a href="javascript:void(0);"> View cause</a> </li>
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
        <li class="active"> <a href="#tab_1_1" data-toggle="tab"> View cause </a> </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1_1">
          <div class="row">
            <div class="col-md-12">
              <div class="row">
                <!--end col-md-8-->
                <!--end col-md-4-->
              </div>
              <!--end row-->
              <div class="tab-pane active" id="tab1">
                <div class="form-group detra">
                  <label class="control-label col-md-4">Usertype :</label>
                  <div class="col-md-8"> <span class="detail_for_name">
                    <?php  echo ucfirst($resultset['user_type']); ?>
                    </span> </div>
                </div>
				
				<div class="form-group detra">
                  <label class="control-label col-md-4">Creater :</label>
                  <div class="col-md-8"> <span class="detail_for_name">
                    <?php echo $this->common->get_user_name($resultset['user_id'],$resultset['user_type']);?>
                    </span> </div>
                </div>
                <div class="form-group detra">
                  <label class="control-label col-md-4">Date Posted :</label>
                  <div class="col-md-8"> <span class="detail_for_name"><?php echo date("d M,Y",$resultset['created_time']); ?></span> </div>
                </div>
                <div class="form-group detra">
                  <label class="control-label col-md-4">Cause :</label>
                  <div class="col-md-8"> <span class="detail_for_name"><?php echo !empty($resultset['title']) ? stripcslashes($resultset['title']) : ""; ?></span> </div>
                </div>
                <div class="form-group detra">
                  <label class="control-label col-md-4">Cause type:</label>
                  <div class="col-md-8"> <span class="detail_for_name">Fundraising</span> </div>
                </div>
                <div class="form-group detra">
                  <label class="control-label col-md-4">Taglines:</label>
                  <div class="col-md-8"> <span class="detail_for_name">
                    <?php
				   $id = explode(",",$resultset["tagline"]);
				   echo $this->start_cause_model->get_cause_tags($id);?>
                    </span> </div>
                </div>
                <div class="form-group detra">
                  <label class="control-label col-md-4"> Summary headlines:</label>
                  <div class="col-md-8"> <span class="detail_for_name"> <?php echo !empty($resultset['summary']) ? stripcslashes($resultset['summary']) : ""; ?></span> </div>
                </div>
                <div class="form-group detra">
                  <label class="control-label col-md-4"> Detailed stories:</label>
                  <div class="col-md-8"> <span class="detail_for_name"> <?php echo !empty($resultset['detailed_stories']) ? stripcslashes($resultset['detailed_stories']) : ""; ?></span> </div>
                </div>
                <b>Fundraising additional information</b>
                <div class="form-group detra">
                  <label class="control-label col-md-4"> Fund allocation:</label>
                  <div class="col-md-8"> <span class="detail_for_name"> <?php echo !empty($resultset['fund_allocation_information']) ? stripcslashes($resultset['fund_allocation_information']) : ""; ?></span> </div>
                </div>
                <div class="form-group detra">
                  <label class="control-label col-md-4"> Postal code:</label>
                  <div class="col-md-8"> <span class="detail_for_name"> <?php echo !empty($resultset['postal_code']) ? stripcslashes($resultset['postal_code']) : ""; ?></span></div>
                </div>
                <div class="form-group detra">
                  <label class="control-label col-md-4"> Address:</label>
                  <div class="col-md-8"> <span class="detail_for_name"> <?php echo !empty($resultset['address']) ? stripcslashes($resultset['address']) : ""; ?></span></div>
                </div>
                <div class="form-group detra">
                  <label class="control-label col-md-4"> Unit:</label>
                  <div class="col-md-8"> <span class="detail_for_name"> #
                    <?php 
				  echo !empty($resultset['unit_f']) ? stripcslashes($resultset['unit_f']) : "";
				  echo " - ";  
				  echo !empty($resultset['unit_l']) ? stripcslashes($resultset['unit_l']) : ""; ?>
                    </span></div>
                </div>
                <div class="form-group detra">
                  <label class="control-label col-md-4"> Target amount	:</label>
                  <div class="col-md-8"> <span class="detail_for_name"> $<?php echo !empty($resultset['target_amount']) ? stripcslashes($resultset['target_amount']) : ""; ?></span></div>
                </div>
                <div class="form-group detra">
                  <label class="control-label col-md-4"> Duration/ Days	:</label>
                  <div class="col-md-8"> <span class="detail_for_name"> <?php echo !empty($resultset['duration']) ? stripcslashes($resultset['duration']) : ""; ?></span></div>
                </div>
                <div class="form-group detra">
                  <label class="control-label col-md-4"> Change Status	:</label>
                  <div class="col-md-8"> <span class="detail_for_name">
                    <form method="post" action="<?php echo base_url().$this->router->class;?>/enable_disable_cause/">
                      <input type="hidden" name="id" value="<?php echo $resultset["id"];?>">
                      <select name="status" onchange="this.form.submit();">
                        <option value="1" <?php if($resultset['status'] == '1'){echo 'selected="selected"';}?>>Pending</option>
                        <option value="2" <?php if($resultset['status'] == '2'){echo 'selected="selected"';}?>>Approved</option>
                        <option value="3" <?php if($resultset['status'] == '3'){echo 'selected="selected"';}?>>Close</option>
                      </select>
                    </form>
                    </span></div>
                </div>
                <?php
				$slug = array();
				$dataset = array();
				$slug  = $this->start_cause_model->get_slug_by_id($this->uri->segment(3));
				$dataset= $this->start_cause_model->getcausedatabyslug($slug);
				//debug($data["dataset"]);
				
				?>
                <div class="form-group detra">
                  <label class="control-label col-md-4"><b>video/pictures</b></label>
                  <div class="col-md-8 tae"> <span class="detail_for_name">
                    <?php foreach($dataset['causeimages'] as $key=>$val){
					  $video = array('3g2','3gp','asf','asx','avi','flv','m4v','mov','mp4','mpg','wmv');
					  $columnName = preg_replace('/[`~!@#$%\^&*()+={}[\]\\\\|;:\'",.><?\/]/', '-', $val);
					  
					  $name= end(explode('.',$val));
					if(in_array($name,$video)){ $src =  $this->config->item("default_video");}else {$src =  $this->config->item("cause_upload_images").$val;}
					 ?>
                    <img class="image" width="110" height="123" alt="pic" src="<?php echo $src ;?>">
                    <?php } ?>
                    </span> </div>
                </div>
                <div class="form-group detra">
                  <label class="control-label col-md-4"><b>Documents </b></label>
                  <div class="col-md-8 tae"> <span class="detail_for_name">
                    <?php if(isset($dataset['causedoc']) && count($dataset['causedoc']) > 0){ 
				 
					 foreach($dataset['causedoc'] as $dkey=>$dval){
					 
					 $tname = urlencode($dval);
					 $pdf = array('pdf','PDF');
					 $columnName1 = preg_replace('/[`~!@#$%\^&*()+={}[\]\\\\|;:\'",.><?\/]/', '-', $dval);
					 $name1= end(explode('.',$dval));
					 if(in_array($name1,$pdf)){ $src =  $this->config->item("pdf");}else {$src =  $this->config->item("doc");}
				 ?>
                    <img class="image" width="110" height="123" alt="pic" src="<?php echo $src ;?>">
					<a href="<?php echo $this->config->item("cause_upload_docs");?><?php echo urldecode($tname);?>">Download</a>
                    <?php } }else{?>
                    No document attatched
                    <?php }?>
                    </span> </div>
                </div>
              </div>
            </div>
          </div>
          <!--tab_1_2-->
        </div>
      </div>
      <!--END TABS-->
    </div>
  </div>
  <!-- END PAGE CONTENT-->
</div>

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
         //  ComponentsPickers.init();
        });   
    </script>
<!-- END JAVASCRIPTS -->
