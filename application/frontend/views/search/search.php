<!-- Causes1 checkboxes -->

<div class="container cause_pad"> </div>
<!--end--> 
<!--mid area-->
<div class="container caus_fst"> 
  <!-- Ist row-->
  <div class="row custom-row">
    <?php 
  if(count($resultdata) > 0 )
  {
   foreach($resultdata as $key=>$val){
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
		($val["is_volunteer"] == 1) ? $temp[] = 'Supporter' :'';
		$type = implode(', ',$temp);
		?>
    <div class="block col-md-4 col-sm-6 col-lg-4 col-xs-12" onclick="window.location.href = '<?php echo base_url();?>cause/cause_detail/<?php echo $val['slug'];?>'" style="cursor:pointer;">
      <div class="inner_block_container">
        <div class="thumb_img" style="background-image:url(<?php echo base_url();?>cause_upload_images/thumbnail/<?php echo $image[0];?>)"></div>
        <div class="thumb_details">
          <h1><?php echo strlen($val['title']) > 18 ? substr(ucfirst($val['title']), 0,18).".." : ucfirst($val['title']); ?></h1>
          <span>By <?php echo ucfirst($this->common->get_user_name($val['user_id'],$val['user_type']));?></span>
          <div class="tags"> <a href="javascript:void(0);"><?php echo $type;?></a></div>
          <p><?php echo strlen($val['summary']) > 100 ? substr(ucfirst($val['summary']), 0,100).".." : ucfirst($val['summary']); ?></p>
          <?php if($val["is_fundraise"]==1){?>
          <div class="stats">
            <div class="progress_bar">
              <div class="progress_details">
                <h2>Fundraising</h2>
                <font>funded</font>
                <h3><?php echo number_format($donation_data[0]["total_sum"],2);?>/<?php echo number_format($val["target_amount"],2);?></h3>
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
                <h3><?php echo $petition_cause_data["count"];?></h3>
              </div>
              <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: <?php echo $petition_percentage?>%;"></div>
              </div>
            </div>
          </div>
          <?php }?>
          <?php if($val["is_volunteer"]==1){?>
          <div class="stats">
            <div class="progress_bar">
              <div class="progress_details">
                <h2>Supporter</h2>
                <font>supported</font>
                <h3><?php echo $volunteer_cause_data["count"];?></h3>
              </div>
              <div class="progress">
                <div class="progress-bar" role="progressbar"  style="width: <?php echo $volunteer_percentage;?>%;"></div>
              </div>
            </div>
          </div>
          <?php }?>
          <div class="time_container">
            <div class="timer_icon"><img src="<?php echo base_url();?>images/timer.png" alt="" /></div>
            <span data-time="<?php echo $closetime;?>" class="kkcount-down timer"></span> </div>
        </div>
      </div>
    </div>
    <?php  unset($type);} } else {?>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div> <img src="<?php echo base_url();?>images/no-record-found.jpg"></div>
    </div>
    <?php } ?>
  </div>
  <!--end-->
  <div class="col-md-offset-1 col-md-8">
    <div class="bs-example">
      <ul class="pagination custom_pagination">
        <?php echo $this->pagination->create_links(); ?>
      </ul>
    </div>
  </div>
</div>
<!--end--> 
<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap-multiselect.js"></script> 
<script type="text/javascript">
$(document).ready(function() {
	$('.multiselect').multiselect({
		includeSelectAllOption: true
	});
});
</script>
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
	function submit_request()
	{
	 var type=$('#tags  input:checkbox:checked').map(function(n){  //map all the checked value to tempValue with `,` seperated
            return  this.value;
      }).get().join(',');

	  var category=$('#category  input:checkbox:checked').map(function(n){  //map all the checked value to tempValue with `,` seperated
            return  this.value;
      }).get().join(',');
     var country=$('#country  input:checkbox:checked').map(function(n){  //map all the checked value to tempValue with `,` seperated
            return  this.value;
      }).get().join(',');
      
	 var url =  BASEURL+"cause/?do=search&country="+country+"&category="+category+"&type="+type;
	 window.location.href = url;
	}
	
	</script>