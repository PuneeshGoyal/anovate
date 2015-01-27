<!-- BEGIN PAGE HEADER-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<!-- BEGIN PAGE HEADER-->
<div class="row">
  <div class="col-md-12">
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title"> View organisation</h3>
    <ul class="page-breadcrumb breadcrumb">
      <li> <i class="fa fa-home"></i> <a href="<?php echo base_url();?>dashboard/"> Home </a> <i class="fa fa-angle-right"></i> </li>
      <li> <a href="javascript:void(0);"> View organisation</a> </li>
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
        <li class="active"> <a href="#tab_1_1" data-toggle="tab"> View organisation </a> </li>
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
                  <label class="control-label col-md-4">Name of organisation:</label>
                  <div class="col-md-8"> <span class="detail_for_name">
                    <?php  echo !empty($resultset['name']) ? ucfirst($resultset['name']) : ""; ?>
                    </span> </div>
                </div>
				
				<div class="form-group detra">
                  <label class="control-label col-md-4"> Location :</label>
                  <div class="col-md-8"> <span class="detail_for_name">
                    <?php  echo !empty($resultset['location']) ? ucfirst($resultset['location']) : "N/A"; ?>
                    </span> </div>
                </div>
				
                
                <div class="form-group detra">
                  <label class="control-label col-md-4"> Organisation type :</label>
                  <div class="col-md-8"> <span class="detail_for_name">
                    <?php if($resultset['organisation_type'] == "company_charity"){echo "company charity";}else{echo 'Charity ipc';} ?>
                    </span> </div>
                </div>
				<?php if($resultset['organisation_type'] == "charity_ipc"){?>
                <div class="form-group detra">
                  <label class="control-label col-md-4"> Organisation ipc no :</label>
                  <div class="col-md-8"> <span class="detail_for_name">
                    <?php echo !empty($resultset['organisation_ipc_no']) ? ucfirst($resultset['organisation_ipc_no']) : "N/A";?>
                    </span> </div>
                </div>
                
                <?php }?>
                
                
				<div class="form-group detra">
                  <label class="control-label col-md-4">Registration Number :</label>
                  <div class="col-md-8"> <span class="detail_for_name">
                    <?php  echo !empty($resultset['registration_number']) ? ucfirst($resultset['registration_number']) : "N/A"; ?>
                    </span> </div>
                </div>
				
				<div class="form-group detra">
                  <label class="control-label col-md-4">Person in charge :</label>
                  <div class="col-md-8"> <span class="detail_for_name">
                    <?php  echo !empty($resultset['person_in_charge']) ? ucfirst($resultset['person_in_charge']) : "N/A"; ?>
                    </span> </div>
                </div>
				
               
                
                
				<div class="form-group detra">
                  <label class="control-label col-md-4">Contact office :</label>
                  <div class="col-md-8"> <span class="detail_for_name">
                    <?php  echo !empty($resultset['contact_office']) ? ucfirst($resultset['contact_office']) : "N/A"; ?>
                    </span> </div>
                </div>
				
				
				<div class="form-group detra">
                  <label class="control-label col-md-4">Email :</label>
                  <div class="col-md-8"> <span class="detail_for_name">
                    <?php  echo !empty($resultset['email']) ? ucfirst($resultset['email']) : ""; ?>
                    </span> </div>
                </div>
				
				<div class="form-group detra">
                  <label class="control-label col-md-4">Newsletter :</label>
                  <div class="col-md-8"> <span class="detail_for_name">
                    <?php  if($resultset['newsletter'] == "1"){echo 'Subscribed';}else{echo 'unsubscribed';}; ?>
                    </span> </div>
                </div>
				
				
				<div class="form-group detra">
                  <label class="control-label col-md-4">Postal code :</label>
                  <div class="col-md-8"> <span class="detail_for_name">
                    <?php  echo !empty($resultset['postal_code']) ? ucfirst($resultset['postal_code']) : ""; ?>
                    </span> </div>
                </div>
				
				<div class="form-group detra">
                  <label class="control-label col-md-4">Address :</label>
                  <div class="col-md-8"> <span class="detail_for_name">
                    <?php  echo !empty($resultset['address']) ? ucfirst($resultset['address']) : ""; ?>
                    </span> </div>
                </div>
				
			
				
				<div class="form-group detra">
                  <label class="control-label col-md-4">Unit-f :</label>
                  <div class="col-md-8"> <span class="detail_for_name">
                    <?php  echo !empty($resultset['unit_f']) ? ucfirst($resultset['unit_f']) : ""; ?>
                    </span> </div>
                </div>
				
				<div class="form-group detra">
                  <label class="control-label col-md-4">Unit l :</label>
                  <div class="col-md-8"> <span class="detail_for_name">
                    <?php  echo !empty($resultset['unit_l']) ? ucfirst($resultset['unit_l']) : ""; ?>
                    </span> </div>
                </div>
				
				<div class="form-group detra">
                  <label class="control-label col-md-4">Username :</label>
                  <div class="col-md-8"> <span class="detail_for_name">
                    <?php  echo !empty($resultset['username']) ? ($resultset['username']) : ""; ?>
                    </span> </div>
                </div>
				
				
				
				<div class="form-group detra">
                  <label class="control-label col-md-4">Joining date :</label>
                  <div class="col-md-8"> <span class="detail_for_name">
                    <?php  echo !empty($resultset['created_time']) ? date('d-M-Y',$resultset['created_time']) : ""; ?>
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
