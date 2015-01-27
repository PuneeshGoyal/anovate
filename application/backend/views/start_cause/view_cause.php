	
<!-- BEGIN PAGE HEADER-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<!-- BEGIN PAGE HEADER-->
<div class="row">
  <div class="col-md-12">
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title"> View cause</h3>
    <ul class="page-breadcrumb breadcrumb">
      <li> <i class="fa fa-home"></i> <a href="<?php echo base_url(); ?><?php echo $this->router->class; ?>/manage_cause"> Manage cause </a> <i class="fa fa-angle-right"></i> </li>
      <li> <a href="javascript:void(0);"> View Cause </a> </li>
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
                <?php if($resultset['youtube_link'] <> ""){?>
                 <div class="form-group detra">
                  <label class="control-label col-md-4">Youtube video id :</label>
                  <div class="col-md-8"> <span class="detail_for_name">
                    <?php  echo !empty($resultset['youtube_link']) ? ucfirst($resultset['youtube_link']) : ""; ?>
                    </span> </div>
                </div>
                <?php }?>
                
                <?php 
				$temp = array();
				$type='';
				($resultset["is_fundraise"] == 1) ? $temp[] = 'Fundraising' :'';
				($resultset["is_petition"] == 1) ? $temp[] = 'Pledge' :'';
				($resultset["is_volunteer"] == 1) ? $temp[] = 'Volunteer' :'';
				 $type = implode(', ',$temp);
				?>
                <div class="form-group detra">
                  <label class="control-label col-md-4">Cause type :</label>
                  <div class="col-md-8"> <span class="detail_for_name"><?php echo $type;?></span> </div>
                </div>
                
                
                <div class="form-group detra">
                  <label class="control-label col-md-4">Taglines :</label>
                  <div class="col-md-8"> <span class="detail_for_name">
                    <?php
				   $id = explode(",",$resultset["tagline"]);
				   echo $this->start_cause_model->get_cause_tags($id);?>
                    </span> </div>
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
                
                <!--fundraising starts-->
                <?php if($resultset["is_fundraise"]==1){?>
                <b>Fundraising additional information</b>
                <div class="form-group detra">
                  <label class="control-label col-md-4"> Fund allocation :</label>
                  <div class="col-md-8"> <span class="detail_for_name"> <?php echo !empty($resultset['fund_allocation_information']) ? stripcslashes($resultset['fund_allocation_information']) : ""; ?></span> </div>
                </div>
                <div class="form-group detra">
                  <label class="control-label col-md-4"> Postal code :</label>
                  <div class="col-md-8"> <span class="detail_for_name"> <?php echo !empty($resultset['postal_code']) ? stripcslashes($resultset['postal_code']) : ""; ?></span></div>
                </div>
                <div class="form-group detra">
                  <label class="control-label col-md-4"> Address :</label>
                  <div class="col-md-8"> <span class="detail_for_name"> <?php echo !empty($resultset['address']) ? stripcslashes($resultset['address']) : ""; ?></span></div>
                </div>
                <div class="form-group detra">
                  <label class="control-label col-md-4"> Unit :</label>
                  <div class="col-md-8"> <span class="detail_for_name"> #
                    <?php 
				  echo !empty($resultset['unit_f']) ? stripcslashes($resultset['unit_f']) : "";
				  echo " - ";  
				  echo !empty($resultset['unit_l']) ? stripcslashes($resultset['unit_l']) : ""; ?>
                    </span></div>
                </div>
                
                <div class="form-group detra">
                  <label class="control-label col-md-4"> Target amount :</label>
                  <div class="col-md-8"> <span class="detail_for_name"> <?php echo !empty($resultset['target_amount']) ? stripcslashes($resultset['target_amount']) : ""; ?></span></div>
                </div>
                
                 <div class="form-group detra">
                  <label class="control-label col-md-4">  Current donation:</label>
                  <div class="col-md-8"> <span class="detail_for_name"><?php echo number_format($donation_data[0]["total_sum"],2)?></span></div>
                </div>
                
                <div class="form-group detra">
                  <label class="control-label col-md-4"> People donated :</label>
                  <div class="col-md-8"> <span class="detail_for_name"> <?php echo $donation_data[0]["count"]; ?></span></div>
                </div>
              
                <?php }?>
                
                <!--fundraising ends-->
                <div style="float:none"></div>
                <!--petition starts-->
                <?php if($resultset["is_petition"]==1){?>
                <b>Pledge additional information</b>
                <div class="form-group detra">
                  <label class="control-label col-md-4"> Target number of pledge :</label>
                  <div class="col-md-8"> <span class="detail_for_name"> <?php echo !empty($resultset['petition_target_amount']) ? stripcslashes($resultset['petition_target_amount']) : ""; ?></span> </div>
                </div>
               
               <div class="form-group detra">
                  <label class="control-label col-md-4"> People pledged :</label>
                  <div class="col-md-8"> <span class="detail_for_name"><?php echo $petition_cause_data["count"]; ?></span></div>
                </div>
              
               
                <div class="form-group detra">
                  <label class="control-label col-md-4"> Pledge message :</label>
                  <div class="col-md-8"> <span class="detail_for_name"><?php echo !empty($resultset['petition_message']) ? stripcslashes($resultset['petition_message']) : ""; ?></span></div>
                </div>
                <?php }?>
                
                <!--petition ends-->
                 <div style="float:none"></div>
                 <!--supporter starts-->
                 <?php if($resultset["is_volunteer"]==1){?>
                <b>Supporter additional information</b>
                <div class="form-group detra">
                  <label class="control-label col-md-4"> Postal :</label>
                  <div class="col-md-8"> <span class="detail_for_name"> <?php echo !empty($resultset['volunteer_event_postal']) ? ($resultset['volunteer_event_postal']) : ""; ?></span> </div>
                </div>
               
                <div class="form-group detra">
                  <label class="control-label col-md-4"> Event address :</label>
                  <div class="col-md-8"> <span class="detail_for_name"><?php echo !empty($resultset['volunteer_event_address']) ? stripcslashes($resultset['volunteer_event_address']) : ""; ?></span></div>
                </div>
                
                 <div class="form-group detra">
                  <label class="control-label col-md-4"> Unit :</label>
                  <div class="col-md-8"> <span class="detail_for_name"> #
                    <?php 
				  echo !empty($resultset['volunteer_event_unit_f']) ? stripcslashes($resultset['volunteer_event_unit_f']) : "";
				  echo " - ";  
				  echo !empty($resultset['volunteer_event_unit_l']) ? stripcslashes($resultset['volunteer_event_unit_l']) : ""; ?>
                    </span></div>
                </div>
                
                
                <div class="form-group detra">
                  <label class="control-label col-md-4"> Event start date :</label>
                  <div class="col-md-8"> <span class="detail_for_name"><?php echo date('d/m/Y h:i a',$resultset["volunteer_start_date"]);?></span></div>
                </div>
                
                <div class="form-group detra">
                  <label class="control-label col-md-4"> Event end date :</label>
                  <div class="col-md-8"> <span class="detail_for_name"><?php echo date('d/m/Y h:i a',$resultset["volunteer_end_date"]);?></span></div>
                </div>
                
                
                <div class="form-group detra">
                  <label class="control-label col-md-4"> Target number of supporters:</label>
                  <div class="col-md-8"> <span class="detail_for_name"><?php echo $resultset["volunteer_target_number"]; ?></span></div>
                </div>
              
               <div class="form-group detra">
                  <label class="control-label col-md-4"> People supported :</label>
                  <div class="col-md-8"> <span class="detail_for_name"> <?php echo $volunteer_cause_data["count"]; ?></span></div>
                </div>
               
                 <?php }?>
                 <!--supporter ends-->
                
                
                <div class="form-group detra">
                  <label class="control-label col-md-4"> <b>Change Status</b> :</label>
                  <div class="col-md-2 col-xs-12"> <span class="detail_for_name">
                    <form method="post" action="<?php echo base_url().$this->router->class;?>/enable_disable_cause/">
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
                <?php
				$slug = array();
				$dataset = array();
				$slug  = $this->start_cause_model->get_slug_by_id($this->uri->segment(3));
				$dataset= $this->start_cause_model->getcausedatabyslug($slug);
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