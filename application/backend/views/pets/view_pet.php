<?php
//debug($resultset);
?>
<!-- BEGIN PAGE HEADER-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<!-- BEGIN PAGE HEADER-->
<div class="row">
  <div class="col-md-12">
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title"> View Pet</h3>
    <ul class="page-breadcrumb breadcrumb">
      <li> <i class="fa fa-home"></i> <a href="<?php echo base_url(); ?><?php echo $this->router->class; ?>/manage_pets/"> Manage pet listing </a> <i class="fa fa-angle-right"></i> </li>
      <li> <a href="javascript:void(0);"> View Pet </a> </li>
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
                    <?php echo $this->common->get_user_name($resultset['userid'],$resultset['user_type']);?>
                    </span> </div>
                </div>
                
                <div class="form-group detra">
                  <label class="control-label col-md-4">Country :</label>
                  <div class="col-md-8"> <span class="detail_for_name">
                    <?php echo !empty($resultset['country']) ? stripcslashes($resultset['country']) : ""; ?>
                    </span> </div>
                </div>
                
                <div class="form-group detra">
                  <label class="control-label col-md-4">Breed :</label>
                  <div class="col-md-8"> <span class="detail_for_name">
                    <?php echo $this->pets_model->get_breed_name($resultset['breed_id']); ?>
                    </span> </div>
                </div>
                
                <div class="form-group detra">
                  <label class="control-label col-md-4">Information :</label>
                  <div class="col-md-8"> <span class="detail_for_name">
                    <?php echo $this->pets_model->get_user_petadoption_informations_admin($resultset['id']);?>
                    </span> </div>
                </div>
                
                <div class="form-group detra">
                  <label class="control-label col-md-4">Gender :</label>
                  <div class="col-md-8"> <span class="detail_for_name">
                    <?php  echo !empty($resultset['gender']) ? ucfirst($resultset['gender']) : ""; ?>
                    </span> </div>
                </div>
                
                <div class="form-group detra">
                  <label class="control-label col-md-4">Age :</label>
                  <div class="col-md-8"> <span class="detail_for_name">
                    <?php  echo !empty($resultset['age']) ? ucfirst($resultset['age']) : ""; ?> yr(s)
                    </span> </div>
                </div>
                
                
                <div class="form-group detra">
                  <label class="control-label col-md-4">Date Posted :</label>
                  <div class="col-md-8"> <span class="detail_for_name"><?php echo date("d M,Y",$resultset['created_time']); ?></span> </div>
                </div>
                <div class="form-group detra">
                  <label class="control-label col-md-4">Title :</label>
                  <div class="col-md-8"> <span class="detail_for_name"><?php echo !empty($resultset['title']) ? stripcslashes($resultset['title']) : ""; ?></span> </div>
                </div>
                
                <div class="form-group detra">
                  <label class="control-label col-md-4">Cause type :</label>
                  <div class="col-md-8"> <span class="detail_for_name">Pet listing</span> </div>
                </div>
                
                <div class="form-group detra">
                  <label class="control-label col-md-4"> Summary headlines :</label>
                  <div class="col-md-8"> <span class="detail_for_name"> <?php echo !empty($resultset['summary']) ? stripcslashes($resultset['summary']) : ""; ?></span> </div>
                </div>
                <div class="form-group detra">
                  <label class="control-label col-md-4"> Detailed stories :</label>
                  <div class="col-md-8"> <span class="detail_for_name"> <?php echo !empty($resultset['detailed_stories']) ? stripcslashes($resultset['detailed_stories']) : ""; ?></span> </div>
                </div>
                
                 <div class="form-group detra">
                  <label class="control-label col-md-4"> <b>Duration/Days</b> :</label>
                  <div class="col-md-8"> <span class="detail_for_name"> <?php echo !empty($resultset['duration']) ? stripcslashes($resultset['duration']) : ""; ?></span></div>
                </div>
                <?php 
				/*To check whether user has booked his availability or not if yes only then admin can approve*/
				$check_is_date_filled_admin = $this->pets_model->check_is_date_filled_admin($resultset["id"],$resultset['userid'],$resultset['user_type']);
				if($check_is_date_filled_admin > 0){
				?>
                <div class="form-group detra">
                  <label class="control-label col-md-4"> <b>Change Status</b> :</label>
                  <div class="col-md-2 col-xs-12"> <span class="detail_for_name">
                    <form method="post" action="<?php echo base_url().$this->router->class;?>/enable_disable_pet/">
                      <input type="hidden" name="id" value="<?php echo $resultset["id"];?>">
                      <select class="form-control selectpicker show-menu-arrow"  name="status" onchange="this.form.submit();">
                      <?php if($resultset['status'] == '1'){?>
                        <option value="1" <?php if($resultset['status'] == '1'){echo 'selected="selected"';}?>>Pending</option>
                        <?php }?>
                        <option value="2" <?php if($resultset['status'] == '2'){echo 'selected="selected"';}?>>Approved</option>
                        <option value="3" <?php if($resultset['status'] == '3'){echo 'selected="selected"';}?>>Close</option>
                      </select>
                    </form>
                    </span></div>
                </div>
                <?php }else{?>
                <div class="form-group detra">
                  <label class="control-label col-md-4"> <b>Change Status</b> :</label>
                  <div class="col-md-2 col-xs-12"> <span class="detail_for_name">
                    Creater has not created his availability yet
                    </span></div>
                </div>
                <?php }?>
                <?php
				$slug = array();
				$dataset = array();
				$slug  = $this->pets_model->get_slug_by_id($this->uri->segment(3));
				$dataset= $this->pets_model->getcausedatabyslug($slug);
				//debug($data["dataset"]);
				
				?>
                <div class="form-group detra">
                  <label class="control-label col-md-4"><b>Pictures</b></label>
                  <div class="col-md-8"> <span class="detail_for_name view_cause_thumbs" style=" float:left;">
                <ul style="padding-left:0;">
                    <?php foreach($dataset['causeimages'] as $key=>$val){
						$tname = urlencode($val);
					  $video = array('3g2','3gp','asf','asx','avi','flv','m4v','mov','mp4','mpg','wmv');
					  $columnName = preg_replace('/[`~!@#$%\^&*()+={}[\]\\\\|;:\'",.><?\/]/', '-', $val);
					  
					  $name= end(explode('.',$val));
					if(in_array($name,$video)){ $src =  $this->config->item("default_video");}else {$src =  $this->config->item("cause_upload_images").$val;}
					 ?>
                    <li style="width:150px; height:150px; padding:0;" class="img-thumb">
                   <a  data-target="#image_modal" class="modalButton img-modal" data-toggle="modal" href="<?php echo base_url().$this->router->class;?>/view_image/<?php echo $tname;?>" >
                    <div style="float:left; width:100%; height:100%; background-image:url(<?php echo $src ;?>); background-repeat: no-repeat; background-size:cover; background-position:center top"></div>
                    
                    </a>
                          <div class="action-links" style="float:left; width:100%; margin-top:5px;">
                            <a  data-target="#image_modal" class="modalButton" data-toggle="modal" href="<?php echo base_url().$this->router->class;?>/view_image/<?php echo $tname;?>" >View</a>
                            <a style="padding-left:20px" href="<?php echo base_url().$this->router->class;?>/download_image/<?php echo $tname;?>">Download</a>
                          </div>
                    </li>
                    <!--<div style="float:left; width:115px; margin-right:10px; margin-bottom:10px; text-align:left">
                    <img class="image" style=" margin-bottom:5px; border:2px solid gray; float:left"  alt="pic" src="<?php echo $src ;?>">
                   <a href="<?php echo base_url().$this->router->class;?>/view_image/<?php echo $tname;?>" target="_blank">View</a>
                   <a style="padding-left:20px" href="<?php echo base_url().$this->router->class;?>/download_image/<?php echo $tname;?>">Download</a>
                 
                  
                   </div>-->
                    <?php } ?>
                    </ul>
                    </span>
                    
                     </div>
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
                   <div class="pdf_download">
				   <a   href="<?php echo base_url().$this->router->class;?>/view/<?php echo $tname;?>" target="_blank">
                    <img class="image" width="100" height="80" alt="pic" src="<?php echo $src ;?>"></a>
					
                     <a  href="<?php echo base_url().$this->router->class;?>/download_file/<?php echo $tname;?>" >download</a> 
					</div>
                    <?php } }else{?>
                    No document attatched
                    <?php }?>
                    </span> </div>
                </div>
                 <div class="form-group detra">
                  <label class="control-label col-md-4"> <b>Creater availability</b> :</label>
                  <div class="col-md-8"> <span class="detail_for_name"> <?php 
				$check_creater_availability = $this->pets_model->check_creater_availability($resultset['id'],$resultset['userid'],$resultset['user_type']);
				
				?>
                <?php foreach($check_creater_availability as $k=>$v){?>
                 Date & time:<?php echo date('d-m-y h:i:s a',$v["enabled_time"])."-".$v["type"]."<br/>";?>
                <?php }?>
                </span></div>
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

<!--<div class="jsgrid-load-panel" style=" position: absolute; top: 50%; left: 50%; z-index: 1000; margin-top: -35px; margin-left: -105px;">Please, wait...</div>
-->
<div class="modal fade" id="image_modal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <div class="progress">
    <div id="modal_data_preview" style="display:block">Please wait...</div>
     </div>
     </div>
  </div>
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
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,600,400' rel='stylesheet' type='text/css'>

<script>
/*$("#image_modal").click(function(){
	$(".modal-content").html('');
});

$('body').on('show.bs.modal','.modal',function () {
	$(".jsgrid-load-panel").css('display','block');
})*/

$('body').on('hidden.bs.modal', '.modal', function () {
	$(this).removeData('bs.modal');
});

jQuery(document).ready(function() { 
//$(".jsgrid-load-panel").hide();
$(".modal-content").html('');      
   // initiate layout and plugins
   App.init();
 //  ComponentsPickers.init();
});   
    </script>
<!-- END JAVASCRIPTS -->
<style type="text/css">
.view_cause_thumbs ul{ list-style:none}
.view_cause_thumbs li{float: left;
    height: 180px !important;
    margin-right: 5px;
    padding-bottom: 5px;
    padding-left: 15px;
    padding-top: 5px;
    width: 32%;
}
.view_cause_thumbs li a.img-modal{
border: 3px solid gray;
float: left;
width: 100%;
height: 100%;
max-height:150px;
}
.action-links a:last-child{float:right;}
</style>
<style>
.jsgrid-load-panel:before {
    content: ' ';
    position: absolute;
    top: .5em;
    left: 50%;
    margin-left: -1em;
    width: 2em;
    height: 2em;
    border: 2px solid #009a67;
    border-right-color: transparent;
    border-radius: 50%;
    -webkit-animation: indicator 1s linear infinite;
    animation: indicator 1s linear infinite;
}

@-webkit-keyframes indicator
{
    from { -webkit-transform: rotate(0deg); }
    50%  { -webkit-transform: rotate(180deg); }
    to   { -webkit-transform: rotate(360deg); }
}

@keyframes indicator
{
    from { transform: rotate(0deg); }
    50%  { transform: rotate(180deg); }
    to   { transform: rotate(360deg); }
}

.jsgrid-load-panel {
width: 15em;
height: 5em;
background: rgba(0,0,0,0.1);
border: 1px solid #e9e9e9;
padding-top: 3em;
text-align: center;
font-family:'Open Sans';
color:#333;
font-size:12px;
}
</style>