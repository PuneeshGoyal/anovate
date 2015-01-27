<div id="message"> <font color='red'><?php echo $this->session->flashdata('errormsg'); ?></font> <font color='green'><?php echo $this->session->flashdata('successmsg'); ?></font> </div>
<!--slider-->
<div id="carousel-example-generic" class="carousel slide sliders custom-slider" data-ride="carousel"> 
  <!-- Indicators -->
  
  <ol class="carousel-indicators">
    <?php 
		if(count($this->common->get_banners()) !=0){
			$i=0;
			foreach($this->common->get_banners() as $k =>$v){
			if($i == 0){$clas='active';}else{$clas='';}
		?>
    <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i;?>" class="<?php echo $clas;?>"></li>
    <?php }}?>
  </ol>
  
  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <?php 
		$userid = $this->session->userdata("userid");
		if(count($this->common->get_banners()) !=0){
			$i=1;
			foreach($this->common->get_banners() as $k =>$v){
			if($i == 1){$clas='active';}else{$clas='';}
	?>
    <div class="item <?php echo $clas;?>"> <img src="<?php echo $this->config->item("slideshowimages").$v["image"];?>" alt="...">
      <div class="carousel-caption">
        <h3 class="new"><?php echo $v["title"];?></h3>
        <h3 class="wht"><?php echo $v["description1"];?></h3>
        <h3 class="wht"><?php echo $v["description2"];?></h3>
        <?php if(!empty($userid)){?>
        <a href="<?php echo base_url()?>start_cause/" class="start_btn"><img src="<?php echo base_url();?>images/start.png"></a>
        <?php }else{?>
        <a id="myModal_click" href="#myModal" data-toggle="modal" data-target="#myModal" class="start_btn"><img src="<?php echo base_url();?>images/start.png"></a>
        <?php }?>
      </div>
    </div>
    <?php $i++;}}?>
  </div>
  
  <!-- Controls --> 
  <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> </a> <a class="right carousel-control" href="#carousel-example-generic" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> </a> </div>
<!--end--> 
<!--mid area-->
<div class="container"> 
  <!-- Ist row-->
  <div class="row custom-row">
    <div class="col-md-12 heading">
      <h3 class="col-md-2 offset-md-10">Causes</h3>
    </div>
     <div class="row">
        <?php 
		foreach($causedata as $key=>$val){
			$donation_data = $this->start_cause_model->getcausedonationinfo($val['id']);
			$petition_cause_data = $this->start_cause_model->getPetitionDonationInfo($val['id']);
			$volunteer_cause_data = $this->start_cause_model->getVolunteerDonationInfo($val['id']);
			$fund_percentage = ($donation_data[0]["total_sum"]/$donation_data[0]["target_amount"])*100;
			$petition_percentage = ($petition_cause_data["count"]/$val["petition_target_amount"])*100;
			$volunteer_percentage = ($volunteer_cause_data["count"]/$val["volunteer_target_number"])*100;
			
			$closetime = $val['activated_time'] + ($val['duration']*24*60*60);
			$image = $this->start_cause_model->getcausedisplayimages($val['id']);
			
			$temp = array();
			($val["is_fundraise"] == 1) ? $temp[] = 'Fundraising' :'';
			($val["is_petition"] == 1) ? $temp[] = 'Pledge' :'';
			($val["is_volunteer"] == 1) ? $temp[] = 'Volunteer' :'';
			$type = implode(', ',$temp);
	?>
        <!-- new div starts here -->
        <div class="block col-md-4 col-sm-6 col-lg-4 col-xs-12" onclick="window.location.href = '<?php echo base_url();?>cause/cause_detail/<?php echo $val['slug'];?>'" style="cursor:pointer;">
          <div class="inner_block_container">
            <div class="thumb_img" style="background-image:url(<?php echo base_url();?>cause_upload_images/thumbnail/<?php echo $image[0];?>)"></div>
            <div class="thumb_details">
              <h1><?php echo strlen($val['title']) > 40 ? substr(ucfirst($val['title']), 0,40).".." : ucfirst($val['title']); ?></h1>
              <span>By <?php echo ucfirst($this->common->get_user_name($val['user_id'],$val['user_type']));?></span>
              <div class="tags"> <a href="javascript:void(0);"><?php echo $type;?></a></div>
              <p><?php echo strlen($val['summary']) > 100 ? substr(ucfirst($val['summary']), 0,100).".." : ucfirst($val['summary']); ?></p>
              <?php if($val["is_fundraise"]==1){?>
              <div class="stats">
                <div class="progress_bar">
                  <div class="progress_details">
                    <h2>Fundraising</h2>
                    <font>funded</font>
                    <h3><?php echo number_format($donation_data[0]["total_sum"],2);?>/<?php echo number_format($val["target_amount"],2);?> $</h3>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar"  style="width: <?php echo $fund_percentage;?>%;"></div>
                  </div>
                </div>
              </div>
               <?php }?>
               
			   <?php if($val["is_petition"]==1){?>
              <div class="stats">
                <div class="progress_bar">
                  <div class="progress_details">
                    <h2>Pledge</h2>
                    <font>pledged</font>
                    <h3><?php echo $petition_cause_data["count"];?>/<?php echo $val["petition_target_amount"];?></h3>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo  $petition_percentage;?>%;"></div>
                  </div>
                </div>
              </div>
              <?php }?>
              
			  <?php if($val["is_volunteer"]==1){?>
              <div class="stats">
                <div class="progress_bar">
                  <div class="progress_details">
                    <h2>Volunteer</h2>
                    <font>volunteers</font>
                    <h3><?php echo !empty($volunteer_cause_data["count"]) ? $volunteer_cause_data["count"] : "0";?>/<?php echo $val["volunteer_target_number"];?></h3>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar"  style="width: <?php echo $volunteer_percentage;?>%;"></div>
                  </div>
                </div>
              </div>
              <?php }?>
               
              <div class="time_container">
              <div class="timer_icon"><img src="<?php echo base_url();?>images/timer.png" alt="" /></div>
              <span data-time="<?php echo $closetime;?>" class="kkcount-down timer"></span>
              </div>
            </div>
          </div>
        </div>
        <!-- new div ends here -->
        <?php unset($type);//} 
	}?>
      </div>
  </div>
  <!--end--> 
  
</div>
<!--end--> 
<link rel="stylesheet" href="<?php echo base_url(); ?>css/block_ui.css"> 
<script src="<?php echo base_url();?>js/countdown/kkcountdown.min.js"></script> 
<script type="text/javascript">
	$(document).ready(function() {
	$(".kkcount-down").kkcountdown({
		dayText		: ' ',
		daysText 	: 'd ',
		hoursText	: ':',
		minutesText	: ':',
		secondsText	: '',
		displayZeroDays : false,
		callback	: function() {
			$("#odliczanie-a").css({'background-color':'#fff',color:'#333'});
		},
		addClass	: ''
	});	
	});
</script> 
