<div class="container cause_pad">
  <div class="row stories_container">
    <form class="form-horizontal story_hopes_new" id="search" role="form" method="get" action="<?php echo base_url();?>cause/">
      <div class="form-group all_check">
        <label class="col-sm-3 control-label">Search your result by filter:</label>
      </div>
      <div class="form-group col-md-3 col-sm-6 col-xs-12 new_country">
        <label class="col-sm-4 col-md-4 control-label custm_labl " >Country:</label>
        <div class="col-sm-8 col-md-8 col-xs-12" id="country">
          <select id="selectbasic" name="country" class="multiselect" multiple="multiple">
            <?php $country = 'multiselect-all,singapore';?>
            <option value="singapore" <?php if($_GET['country'] == "all"){echo 'selected=selected';}?>>Singapore</option>
          </select>
        </div>
      </div>
      <div class="form-group col-md-4 col-sm-6 col-xs-12 type">
        <label class="col-sm-3 control-label custm_labl">Breed:</label>
        <div class="col-sm-9 col-xs-12 multi_select" id="breeds"> 
          <!-- Build your select: -->
          <select class="multiselect" multiple="multiple" name="breeds" >
            <?php  if(count($breeds) !=0){
               $i=0; 
			   $b = explode(',',$_GET['breed']);
               foreach ($breeds as $k=>$v)
                {?>
            <option value="<?php echo $v["id"];?>" <?php if(in_array($v["id"],$b)){echo 'selected=selected';}?>><?php echo ucfirst($v["name"]);?></option>
            <?php  $i++;}}?>
          </select>
        </div>
      </div>
      <div class="form-group col-md-4 col-sm-6 col-xs-12 type">
        <label class="col-md-4 col-sm-4 control-label custm_labl">Age:</label>
        <div class="col-md-8 col-sm-8 col-xs-12 multi_select"> 
          <!-- Build your select: -->
          <select class="selectpicker" name="age" id="age">
          <option value="">None selected</option>
            <?php  foreach(range(1,100) as $k=>$v) {?>
            <option value="<?php echo $v;?>" <?php if($_GET["age"]==$v){echo 'selected=selected';}?>><?php echo $v;?></option>
            <?php }?>
          </select>
        </div>
      </div>
      <div class="form-group col-md-2 col-sm-6 col-xs-12 type"> 
        <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
        <button type="button" class="btn btn-primary search_btn fix_res" onclick="submit_request();">Search</button>
      </div>
    </form>
  </div>
</div>
<!--end--> 
<!--mid area-->
<div class="container caus_fst"> 
  <!-- Ist row-->
  <div class="row custom-row">
    <?php 

   if(count($petdata) !=0){
   foreach($petdata as $key=>$val){
		$closetime = $val['activated_time'] + ($val['duration']*24*60*60);
		$image = $this->pets_model->getpetdisplayimages($val['id']);
		$information = $this->pets_model->get_user_petadoption_informations_front($val['id']);
		//debug($information);
	?>
    
    <!-- new div starts here -->
    <div class="block col-md-4 col-sm-6 col-lg-4 col-xs-12" onclick="window.location.href = '<?php echo base_url();?>pets/pet_detail/<?php echo $val['slug'];?>'" style="cursor:pointer;">
      <div class="inner_block_container inner_block_container_new">
        <div class="thumb_img" style="background-image:url(<?php echo base_url();?>cause_upload_images/thumbnail/<?php echo $image[0];?>)"></div>
        <div class="thumb_details">
          <h1><?php echo strlen($val['title']) > 40 ? substr(ucfirst($val['title']), 0,40).".." : ucfirst($val['title']); ?></h1>
          <span>By <?php echo ucfirst($this->common->get_user_name($val['userid'],$val['user_type']));?></span>
          <span>Breed <?php echo $this->pets_model->get_breed_name($val['breed_id']);?></span>
         <!-- <div class="tags"> <a href="javascript:void(0);"><?php echo $type;?></a></div>-->
          <p><?php echo strlen($val['summary']) > 90 ? substr(ucfirst($val['summary']), 0,90).".." : ucfirst($val['summary']); ?></p>
          
          <div class="cause6_cont">
        <ul class="new_ui_icons">
        <?php $j=0;foreach($information as $k=>$v){?>
            <li tabindex="0" data-placement="top" data-toggle="popover" data-trigger="hover" data-content="<?php echo $v["title"];?>" ><span><img width="30" height="30" src="<?php echo base_url();?>slideshowimages/<?php echo $v["image"];?>"></span></li>
        <?php $j++;}?>
<!--            <li><span class="round_icon" data-target="#myModal6" data-toggle="modal">W</span></li>
            <li><span class="round_icon" data-target="#myModal6" data-toggle="modal"><img src="<?php echo base_url();?>images/inj_icon.png"></span></li>
            <li><span class="round_icon" data-target="#myModal6" data-toggle="modal">S</span></li>
-->        </ul>
    
    </div>
    <div class="new_ui_description">
    	<p><?php echo strlen($val['detailed_stories']) > 330 ? substr(stripcslashes($val['detailed_stories']), 0,330).".." : stripcslashes($val['detailed_stories']); ?></p>
    </div>
     
          <div class="time_container time_container_new">
          <button class="btn-primary detail_new">Detail</button> 
          <div class="timer_con_right">
            <div class="timer_icon"><img src="<?php echo base_url();?>images/timer.png" alt=""  /></div>
            <span data-time="<?php echo $closetime;?>" class="kkcount-down timer"></span> 
            </div>
            </div>
        </div>
      </div>
    </div>
    <?php unset($type); }
   
   } else{?>
    <div class="col-md-3 col-sm-6 col-xs-12">
      <div><img src="<?php echo base_url();?>images/no-record-found.jpg"></div>
    </div>
    <?php }?>
  </div>
  
  <!--end-->
  <div class="col-md-12">
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

<!------------------------------------------------------------------counter--------------------------------------------------->
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
	
<!------------------------------------------------------------------counter--------------------------------------------------->	
	function submit_request()
	{
	  var breed = $('#breeds input:checkbox:checked').map(function(n) {
			return  this.value;
	  }).get().join(',');
	  
	  var breed_id = breed.split(',');
	  if(breed_id[0] == "multiselect-all"){breed_id.splice(0,1).join(',');}
	  else{breed_id = breed_id.join(','); }
	 
	  var age=$('#age').val();
	  
	  var country = $('#country input:checkbox:checked').map(function(n) {
			return  this.value;
	  }).get().join(',');
	  
	  var country_id = country.split(',');
	  if(country_id[0] == "multiselect-all"){country_id='all';/*country_id.splice(0,1).join(',');*/}
	  else{country_id = country_id.join(',');}
      
    
	 var url =  BASEURL+"pets/listing/?do=search&country="+country_id+"&breed="+breed_id+"&age="+age;
	 window.location.href = url;
	}
	
	</script>