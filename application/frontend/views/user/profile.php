<!-- BEGIN BREADCRUMBS -->
<?php //print_r($userdata); ?>
<link href="<?php echo base_url(); ?>assets/css/pages/profile.css" rel="stylesheet" type="text/css"/>
<div class="row breadcrumbs margin-bottom-40"> </div>
<!-- END BREADCRUMBS --> 
<!-- BEGIN CONTAINER -->
<div class=" min-hight"> 
  <!-- BEGIN BLOG -->
  <div class="row profile">
    <div class="col-md-3">
      <ul class="list-unstyled profile-nav">
        <li> <img width="260" src="<?php echo base_url(); ?>pics/<?php echo $userdata1['image']; ?>" class="img-responsive" alt=""><!-- <a href="#" class="profile-edit"> edit </a>--> </li>
        <li> <a href="javascript:void(0)"> Volunteer hours <span><?php echo $this->common->total_event_attended_hours(); ?> </span> </a> </li>
        <li> <a href="javascript:void(0)"> Meeting Attended <span><?php echo $this->common->total_meeting_attended(); ?> </span> </a> </li>
        <li> <a href="javascript:void(0)"> Events Attended <span><?php echo $this->common->total_event_attended(); ?> </span>  </a></li>
        <!--<li> <a href="#"> Awards & Grades </a> </li>-->
        <li> <a href="javascript:void(0);"> Training Attended <span><?php echo $this->common->total_training_attended(); ?></span> </a> </li>
      </ul>
    </div>
    <div class="col-md-9">
      <div class="row">
        <div class="col-md-9 profile-info" style="padding:0px !important">
          <h1><?php echo $userdata1['name']; ?></h1>
          <p> <?php echo $userdata1['remarks']; ?> </p>
         <?php /*?> <ul class="list-inline">
            <li> <i class="fa fa-map-marker"></i> <?php echo $userdata1['country']; ?> </li>
            <li> <i class="fa fa-calendar"></i> <?php echo $userdata1['dob']; ?> </li>
            <li> <i class="fa fa-briefcase"></i> Volunteer </li>
            <li> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> Review </li>
            <li> <i class="fa fa-heart"></i>
              <?php @$val_cat = $this->common->get_data_passing_id('categories', $userdata1['category']);if(@$val_cat['name'] <> ''){echo @$val_cat['name'];} else { echo ''; } ?>
            </li>
          </ul><?php */?>
        </div>
        <!--end col-md-8-->
        <div class="col-md-3" style="padding:0px !important">
          <div class="portlet sale-summary">
            <div class="portlet-title"> <a href="<?php echo base_url(); ?>user/update_profile" class="pull-right">Edit</a> </div>
          </div>
        </div>
        <!--end col-md-4--> 
      </div>
      <div class="tab-pane active" id="tab1">
        <?php /*?><div class="form-group detra">
          <label class="control-label col-md-4 col-sm-4 col-xs-4">Username :</label>
          <div class="col-md-8 col-sm-8 col-xs-8"> <span class="detail_for_name"><?php echo !empty($userdata1['username']) ? $userdata1['username']: ""; ?></span> </div>
        </div><?php */?>
        <div class="form-group detra">
          <label class="control-label col-md-4">Email :</label>
          <div class="col-md-8"> <span class="detail_for_name"><?php echo !empty($userdata1['email']) ? $userdata1['email']: ""; ?></span> </div>
        </div>
        <div class="form-group detra">
          <label class="control-label col-md-4">Fullname :</label>
          <div class="col-md-8"> <span class="detail_for_name"><?php echo !empty($userdata1['name']) ? $userdata1['name']: ""; ?></span> </div>
        </div>
        <div class="form-group detra">
          <label class="control-label col-md-4">Gender :</label>
          <div class="col-md-8"> <span class="detail_for_name"><?php  echo $userdata1['gender'] ; ?></span> </div>
        </div>
        <div class="form-group detra">
          <label class="control-label col-md-4">National ID/Passport :</label>
          <div class="col-md-8"> <span class="detail_for_name"><?php echo !empty($userdata1['national_id']) ? $userdata1['national_id']: "N/A"; ?></span> </div>
        </div>
        <div class="form-group detra">
          <label class="control-label col-md-4">DOB :</label>
          <div class="col-md-8"> <span class="detail_for_name"><?php echo $userdata1['dob'];?></span> </div>
        </div>
        <div class="form-group detra">
          <label class="control-label col-md-4">National ID/Passport :</label>
          <div class="col-md-8"> <span class="detail_for_name"><?php echo !empty($userdata1['national_id']) ? $userdata1['national_id']: "N/A"; ?></span> </div>
        </div>
        <div class="form-group detra">
          <label class="control-label col-md-4">Profile Image :</label>
          <div class="col-md-8 tae"> <span class="detail_for_name">
            <?php 
				if($userdata1['image'] <> ''){ $image  =  BASEURL.'pics/'.$userdata1['image'];  }
				else {$image = base_url().'images/no_image.gif';}
			?>
            <img src="<?php echo $image; ?>" alt="pic"/></span> </div>
        </div>
        <div class="form-group detra">
          <label class="control-label col-md-4">Phone Number :</label>
          <div class="col-md-8"> <span class="detail_for_name"><?php echo !empty($userdata1['phone']) ? $userdata1['phone']: "N/A"; ?></span> </div>
        </div>
        <div class="form-group detra">
          <label class="control-label col-md-4">Date of Joining :</label>
          <div class="col-md-8"> <span class="detail_for_name"><?php echo !empty($userdata1['joining_date']) ? $userdata1['joining_date']: "N/A"; ?></span> </div>
        </div>
        <div class="form-group detra">
          <label class="control-label col-md-4">Mobile number :</label>
          <div class="col-md-8"> <span class="detail_for_name"><?php echo !empty($userdata1['mobile']) ? $userdata1['mobile']: "N/A"; ?></span> </div>
        </div>
        <div class="form-group detra">
          <label class="control-label col-md-4">Mailing address/postal address :</label>
          <div class="col-md-8"> <span class="detail_for_name"><?php echo !empty($userdata1['mailing_address']) ? $userdata1['mailing_address']: "N/A"; ?></span> </div>
        </div>
        <div class="form-group detra">
          <label class="control-label col-md-4">City :</label>
          <div class="col-md-8"> <?php echo !empty($userdata1['city']) ? $userdata1['city']: "N/A"; ?> </div>
        </div>
        <div class="form-group detra">
          <label class="control-label col-md-4">Country :</label>
          <div class="col-md-8"> <?php echo !empty($userdata1['country']) ? $userdata1['country']: "N/A"; ?> </div>
        </div>
        <div class="form-group detra">
          <label class="control-label col-md-4">Category :</label>
          <div class="col-md-8"> <?php echo !empty($userdata1['country']) ? $userdata1['country']: "N/A"; ?> </div>
        </div>
        <div class="form-group detra">
          <label class="control-label col-md-4">Remarks :</label>
          <div class="col-md-8"> <?php echo !empty($userdata1['remarks']) ? $userdata1['remarks']: "N/A"; ?> </div>
        </div>
        <div class="form-group detra">
          <label class="control-label col-md-4">Education And Skills :</label>
          <div class="col-md-8"> <span class="detail_for_name"><?php echo !empty($userdata1['qualification']) ? $userdata1['qualification']: "N/A"; ?></span> </div>
        </div>
        <div class="form-group detra">
          <label class="control-label col-md-4">College Name :</label>
          <div class="col-md-8"> <span class="detail_for_name"><?php echo !empty($userdata1['college']) ? $userdata1['college']: "N/A"; ?></span> </div>
        </div>
        <div class="form-group detra">
          <label class="control-label col-md-4">University Name :</label>
          <div class="col-md-8"> <span class="detail_for_name"><?php echo !empty($userdata1['university']) ? $userdata1['university']: "N/A"; ?></span> </div>
        </div>
        <div class="form-group detra">
          <label class="control-label col-md-4">State in which University was located :</label>
          <div class="col-md-8"> <span class="detail_for_name"><?php echo !empty($userdata1['university_location']) ? $userdata1['university_location']: "N/A"; ?></span> </div>
        </div>
        <div class="form-group detra">
          <label class="control-label col-md-4">Hobbies :</label>
          <div class="col-md-8"> <?php echo !empty($userdata1['hobbies']) ? $userdata1['hobbies']: "N/A"; ?> </div>
        </div>
        <div class="form-group detra">
          <label class="control-label col-md-4">What they do  :</label>
          <div class="col-md-8"> <span class="detail_for_name"><?php echo !empty($userdata1['what_they_do']) ? $userdata1['what_they_do']: "N/A"; ?></span> </div>
        </div>
        <div class="form-group detra">
          <label class="control-label col-md-4">Special Skills :</label>
          <div class="col-md-8"> <span class="detail_for_name"><?php echo !empty($userdata1['special_skills']) ? $userdata1['special_skills']: "N/A"; ?></span> </div>
        </div>
        <div class="form-group detra">
          <label class="control-label col-md-4">Division :</label>
          <div class="col-md-8"> <span class="detail_for_name">
			<?php $division = $this->division_model->getIndividualdivision($userdata1['division_id']);  ?>
			<?php echo !empty($division) ? $division['name']: "No division assigned"; ?>
           </span> </div>
        </div>

        <div class="form-group detra">
          <label class="control-label col-md-4">Rank  :</label>
          <?php $rank = $this->ranks_model->getrank_data($userdata1['badges']);  ?>
          <div class="col-md-8"> <span class="detail_for_name"><img src="<?php echo base_url(); ?>badges/<?php echo $rank['rank_image']; ?>" alt="pic"/></span> </div>
          <div class="form-group">
            <label class="control-label col-md-4">&nbsp; </label>
            <div class="col-md-8"> <a href="<?php echo base_url();?>user/dashboard"  class="btn theme-btn green pull-left">Cancel</a> </div>
          </div>
        </div>
      </div>
      <!--end row--> 
      
    </div>
  </div>
  <!-- END BEGIN BLOG --> 
</div>
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) --> 
<!-- BEGIN CORE PLUGINS --> 
<!--[if lt IE 9]>
<script src="<?php echo base_url(); ?>assets/admin/plugins/respond.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/excanvas.min.js"></script> 
<![endif]--> 
<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery-1.10.2.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script> 
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip --> 
<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
<script src=<?php echo base_url(); ?>"assets/admin/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery.blockui.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery.cokie.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/admin/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script> 
<!-- END CORE PLUGINS --> 

<!-- BEGIN PAGE LEVEL SCRIPTS --> 
<script src="<?php echo base_url(); ?>assets/admin/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/admin/scripts/core/app.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/admin/scripts/custom/calendar.js"></script> 
<script src="<?php echo base_url(); ?>assets/admin/scripts/custom/index.js" type="text/javascript"></script> 
<!-- END PAGE LEVEL SCRIPTS --> 

<script>
jQuery(document).ready(function() {    
   App.init(); // initlayout and core plugins
 
 Index.initCalendar();
});
</script> 
