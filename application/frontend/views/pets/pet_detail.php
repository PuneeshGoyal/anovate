<?php 
$slug=''; $id='';
$slug = $this->uri->segment(3);
$id = $this->pets_model->get_pet_id_byslug($slug);
$userid = $this->session->userdata("userid");
$user_type = $this->session->userdata("user_type");
$username = $this->common->get_user_name($userid,$user_type);

//for sharing
$data = $this->pets_model->getIndividualpet($id);
$dataset = $this->pets_model->getcausedatabyslug($data["slug"]);
//debug($dataset);
$i=0;foreach($dataset['causeimages'] as $key=>$val){
  $array = array('gif','GIF','jpg','jpeg','JPEG','png','PNG');
  $ext = end(explode('.',$val));
  if(in_array(strtolower($ext),$array)){if($i==0){$img = base_url().'cause_upload_images/thumbnail/'.$val.'';}}
  $i++;
}
 
$title = urlencode($data["title"]);
//$url = urlencode(base_url()."cause/cause_detail/".$data["slug"]);
$summary = urlencode($data['summary']);
$image = urlencode($img);

$url= base_url().'cause/view/'.$id;
$text = stripcslashes($summary);

$username = $this->session->userdata("name");
$email = $this->session->userdata("email");
$user_type = $this->session->userdata("user_type");
$address = $this->session->userdata("address");
$userid = $this->session->userdata("userid");
$phone_number = $this->session->userdata("phone_number");
$gender = $this->session->userdata("gender");
$temp_age = $this->session->userdata("d_o_b");
$nationality = $this->session->userdata("nationality");
$identification_type = $this->session->userdata("identification_type");
$identification_number = $this->session->userdata("identification_number");
$contact_hp = $this->session->userdata("contact_hp");


$registration_number = $this->session->userdata("registration_number");
$contact_office = $this->session->userdata("contact_office");
$organisation_ipc_no = $this->session->userdata("organisation_ipc_no");
/*$age = intval((time() - strtotime($this->session->userdata("d_o_b")))/31556926);
if($temp_age <> ""){
	$age = $this->common->get_age($temp_age);
}*/
!empty($username) ? $username : "";
!empty($email) ? $email : "";
!empty($user_type) ? $user_type : "";
!empty($address) ? $address : "";
!empty($userid) ? $userid : "";
!empty($gender) ? $gender : "";
!empty($phone_number) ? $phone_number : "";
!empty($age) ? $age : "";
!empty($nationality) ? $nationality : "";
!empty($identification_type) ? $identification_type : "";
!empty($identification_number) ? $identification_number : "";
!empty($contact_hp) ? $contact_hp : "";

!empty($registration_number) ? $registration_number : "";
!empty($contact_office) ? $contact_office : "";
!empty($organisation_ipc_no) ? $organisation_ipc_no : "";


if($gender == "m"){$mchecked = 'checked="checked"';$fchecked = '';}
if($gender == "f"){$fchecked = 'checked="checked"';$mchecked = '';}

$closetime = $dataset['activated_time'] + ($dataset['duration']*24*60*60);
?>
<!--<div id="show_disable_session" style="width:100%; height:100%; background:rgba(0,0,0,0.6); position:absolute; left:0; top:0">weqfwef</div>-->
<link rel="stylesheet" href="<?php echo base_url();?>css/flexslider.css" type="text/css" media="screen" />
<script defer src="<?php echo base_url();?>js/jquery.flexslider.js"></script> 
<style>
.mnt_f img, .mnt_g img, .mnt_t img {
	margin-top: 0 !important;
}
.es-carousel ul {
	display: block;
}
.hel1 {
	float: left;
	min-width: 80px;
}
.h-time {
	float: left;
	width: 150px;
}
.h-time > p {
	font-size: 12px !important;
	padding: 2px 0 0;
}
.social_icon ul {
	margin: 0 auto;
	width: 147px;
	padding: 0;
}
#carousel_ab li {
  max-width: 150px;
  opacity:1 !important;
  margin:0 10px 0 0 !important;
}
</style>
<!--<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
 <script>function fbs_click() {
	u='<?php echo urldecode($url); ?>';
	t='<?php echo urldecode($title); ?>';
	window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');
	return false;
	}
</script>-->
<!--mid area-->

<div class="container" id="pet"> 
  <!-- Causes Main Container Start -->
  <div class="row custom-row">
    <div class="col-md-12 col-xs-12 col-sm-12 heading cause_hding">
      <h3 class="col-md-2 col-sm-2 offset-md-10"> <?php echo strlen($dataset['title']) > 200 ? substr(ucfirst($dataset['title']), 0,200).".." : ucfirst($dataset['title']); ?> </h3>
      <!-- HTML to write --> 
      <!--<span> <a class="tooltip_tick ribbon" href="#" data-toggle="tooltip" data-original-title="Ribbon Text">Tooltip</a> <a class="tooltip_tick" href="#" data-toggle="tooltip" data-original-title="Identity verified">Tooltip</a> <a class="tooltip_tick" href="#" data-toggle="tooltip" data-original-title="Location verified">Tooltip</a> <a class="tooltip_tick" href="#" data-toggle="tooltip" data-original-title="Documents verified">Tooltip</a> <a class="tooltip_tick" href="#" data-toggle="tooltip" data-original-title="Situation verified">Tooltip</a> <a class="tooltip_tick" href="#" data-toggle="tooltip" data-original-title="On-site checked">Tooltip</a> </span>--> 
    </div>
   
  </div>
  <div class="row custom_row">
    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
      <div class="description"><span>By:</span>
        <p><?php echo ucfirst($this->common->get_user_name($dataset['userid'],$dataset['user_type']));?></p>
        <p><b>Informations:</b>
          <?php 
		echo stripcslashes($this->pets_model->get_user_petadoption_informations_admin($dataset["id"]));?>
        </p>
        <p><b>Breed</b>: <?php echo $this->pets_model->get_breed_name($dataset["breed_id"]);?></p>
        <p><b>Gender</b>: <?php echo !empty($dataset["gender"]) ? $dataset["gender"] : "";?></p>
        <p><b>Age</b>: <?php echo !empty($dataset["age"]) ? $dataset["age"] : "";?>yr(s) old</p>
      </div>
      <!--slider starts-->
      <div class="content cause_sevenslide">
        <div class="col-md-12 none_p">
          <div id="container" style="margin-top: 25px;">
            <section class="slider">
              <div id="slider_ab" class="flexslider">
                <ul class="slides">
                  <?php foreach($dataset['causeimages'] as $key=>$val){
                  $array = array('gif','GIF','jpg','jpeg','JPEG','png','PNG');
				  $ext = end(explode('.',$val));
				    if(in_array(strtolower($ext),$array)){?>
                  <li class="main_image" style="background-image:url(<?php echo base_url();?>cause_upload_images/<?php echo $val;?>); background-size:contain; height:450px;background-position: center center; background-repeat:no-repeat;border: 2px solid gray;background-color: #000;"> <!--<img src="<?php echo base_url();?>cause_upload_images/<?php echo $val;?>" width="" height="300"/>--> </li>
                  <?php  }} ?>
                </ul>
              </div>
              <div id="carousel_ab" class="flexslider">
                <ul class="slides">
                  <?php foreach($dataset['causeimages'] as $key=>$val){
				  $array = array('gif','GIF','jpg','jpeg','JPEG','png','PNG');
				  $ext = end(explode('.',$val));
				  if(in_array(strtolower($ext),$array)){?>
                  <li class="thumb_hover" data-src="<?php echo $val; ?>" style="background-image:url(<?php echo base_url();?>cause_upload_images/thumbnail/<?php echo $val;?>); background-size:cover; height:100px;background-position: center center; background-repeat:no-repeat;border: 2px solid gray;background-color: #428bca;"> <!--<img  src="<?php echo base_url();?>cause_upload_images/thumbnail/<?php echo $val;?>" width="127" height="85"/>--> </li>
                  <?php } }?>
                </ul>
              </div>
            </section>
            <!-- template --> 
            <!-- end of template --> 
          </div>
        </div>
      </div>
      
      <div class="custom-row">
        <div class="col-md-12 story_heading m_head"> <!-- brahm -->
          <h3 class="col-md-2 offset-md-10">Summary headlines</h3>
        </div>
        <div style="clear:both;"></div>
        <div class="cause3_story">
          <p><?php echo !empty($dataset['summary']) ? stripcslashes($dataset['summary']) : "";?></p>
        </div>
        <div class="col-md-12 story_heading">
          <h3 class="col-md-2 offset-md-10">Story</h3>
        </div>
      </div>
      <div class="story">
        <p><?php echo !empty($dataset['detailed_stories']) ?  stripcslashes($dataset['detailed_stories']) : "";?></p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
      <div class="social_icon">
        <!--<ul style="width:200px;">
          <li>
          <a  style="text-indent:-9999px; margin-right:20px;" rel="nofollow" href="http://www.facebook.com/share.php??s=100&p[title]=<?php echo urldecode($title); ?>&p[summary]=<?php  echo strip_tags($text); ?>&p[url]=<?php echo $url;?>&p[images][0]=<?php echo $image; ?>']asdfa[/a]" onclick="return fbs_click()" target="_blank">
         	 <img src="<?php echo base_url();?>images/facebook.png" />
           </a>
           <a class="plus" target="_blank" title="Share on Twitter" onclick="window.open('https://twitter.com/intent/tweet?text=<?php echo urldecode($text); ?>&url=<?php echo $url;?>', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0');return false" data-count="twi" href="#"  rel="nofollow">
            <img src="<?php echo base_url();?>images/twitter.png" />
           </a>
           <a class="gog" target="_blank" title="Share on Google+" onclick="window.open('https://plus.google.com/share?url=<?php echo $url;?>', '_blank', 'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0');return false" data-count="gplus" href="#"  rel="nofollow">
           <img src="<?php echo base_url();?>images/g+.png" />
           </a>
          </li>
         </ul>-->
      </div>
      
      <!--FUNDRASING INFORMATION STARTS-->
      <div class="fundraising_main">
        <h1>Date to be put down:</h1>
        <strong><span data-time="<?php echo $closetime;?>" class="kkcount-down"></span></strong>
        <p>Breed: <?php echo $this->pets_model->get_breed_name($dataset["breed_id"]);?></p>
        <p>Age : <?php echo !empty($dataset["age"]) ? $dataset["age"] : "";?>yr(s) old</p>
        <p>Location: <?php echo !empty($dataset["location"]) ? $dataset["location"] : "";?></p>
       <!-- <button class="demo btn btn-primary btn-large" data-toggle="modal" href="#long">View Demo</button>-->
	 <?php if($this->session->userdata("userid") <> "" && $this->session->userdata("userid") != $dataset["userid"]){?>
        <div class="donate_bttn" id="donate_bttn"><a href="javascript:void(0);" data-target="#long" data-toggle="modal" >Adopt it now</a></div>
     <?php }else if($this->session->userdata("userid") == $dataset["userid"]){?>
       <div class="donate_bttn" ><a  href="javascript:void(0);" style="pointer-events:none" >Creater</a></div>
     <?php }else{?>
     <div class="donate_bttn" data-toggle="modal" data-target="#myModal"><a  href="javascript:void(0);" >Login</a></div>
     <?php }?>
      </div>
      <!--FUNDRASING INFORMATION ENDS--> 
    </div>
  </div>
  <div class="row custom_row" id="cause3">
    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
      <?php if(isset($dataset['causedoc']) && !empty($dataset['causedoc'])){?>
      <div class="col-md-12 story_heading m_head">
        <h3 class="col-md-2 offset-md-10">Documents for references</h3>
      </div>
      <div class="cause3_story">
        <div class="item active">
          <ul class="thumbnails">
            <?php
			 foreach($dataset['causedoc'] as $key => $val){
			    $pdf = array('pdf','PDF');
				$name1= end(explode('.',$val));
				if(in_array(strtolower($name1),$pdf)){ $src =  base_url().'images/my_file_048.png';}else {$src =  base_url().'images/my_file_020.png';}
			   ?>
            <li> <a  rel="tooltip" data-placement="right" title="Click here to view" data-src="http://docs.google.com/viewer?url=<?php echo base_url();?>cause_upload_docs/<?php echo $val;?>&embedded=true" data-height=350 data-width=660 data-target="#myModalxx" class="modalButton" data-toggle="modal"  style="text-decoration:none;"  href="javascript:void(0);"  > <img src="<?php echo $src ;?>" alt="" width="100" height="110"> </a> <br />
              <span><a data-toggle="tooltip" data-placement="right" title="Click here to download this file" class="download_txt" href="<?php echo base_url().$this->router->class;?>/download_file/<?php echo $val;?>" >download</a></span> </li>
            <?php }?>
          </ul>
        </div>
      </div>
      <?php } ?>
      
      
      <div class="col-md-12 story_heading m_head">
        <h3 class="col-md-2 offset-md-10">Comments</h3>
      </div>
      <div style="float:left; left:600px;" id="message"> <font color='red'><?php echo $this->session->flashdata('comment_errormsg'); ?></font> <font color='green'><?php echo $this->session->flashdata('comment_successmsg'); ?></font> </div>
      <?php if(count($comment) > 0){
		 	$k=0; foreach($comment as $k => $v){
	 	 ?>
      <div class="comment_row" > 
        <!-- <img src="<?php //echo base_url();?>images/comment_img.jpg" class="comment_img">-->
        <div class="comment_text">
          <div class="hello">
            <div class="hel1">
              <p><?php echo $this->common->get_user_name($v["userid"],$v["user_type"])?>:</p>
            </div>
            <div class="h-time">
              <p><?php echo $this->common->convert_time_days($v["time"])?></p>
            </div>
            <div style="clear:both;"></div>
          </div>
          <p><?php echo stripcslashes($v["comment"]);?></p>
        </div>
      </div>
      <?php $k++;}}?>
      
      <?php  
	   //echo count($comment);
		 if(count($comment) > 4){
		 $last_blog_id = array_reverse($comment,true);
		 $max = max(array_keys($last_blog_id));
		 $id = $comment[$max]["id"];  
	 ?>
     <span id="data_append_<?php echo $v["id"];?>"></span>
      <input type="hidden" id="last_id" value="<?php echo  $id;?>" />
      <div  onclick="load_more();" id="load_more" class="link_bttn buttons" ><a href="javascript:void(0);">Load More</a> </div>
      <?php }?>
      <?php if($userid <> ""){?>
      <form method="post" name="" action="<?php echo base_url().$this->router->class;?>/add_comment/">
        <input type="hidden"  name="userid" value="<?php echo !empty($userid) ? $userid : "";?>"/>
        <div class="username">
          <p class="bac"><?php echo ucfirst($username);?></p>
          <input type="hidden" name="pet_id" value="<?php echo $slug;?>"/>
        </div>
        <div class="comment_area">
          <textarea class="comment_box" placeholder="Comment" name="comment"></textarea>
          <input type="submit" value="Submit"/>
        </div>
      </form>
      <?php }else{?>
      <div class="link_bttn" style="float:left;"><a href="javascript:void(0);" data-target="#myModal" data-toggle="modal">Login to comment!</a></div>
      <?php }?>
    </div>
  </div>
</div>


<!--PET ADOPTION STARTS -->

<!--first modal-->
<!--<div id="long" class="modal hide fade" tabindex="-1" data-replace="true">
  <div class="modal-header custom_m_head">
    <button style="margin:-7px" type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
   <h4 class="modal-title custom_title" id="myModalLabel">Your information</h4>
  </div>
  <div class="modal-body">
   
  </div>
  
</div>-->

<div class="modal bs-example-modal-lg" id="long" >
	<div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Your information</h4>
        </div>
        <div class="modal-body">
         <!--content -->
            <div id="error_adoption" class="alert" role="alert"  style="display:none"></div>
            <form id="pet_form" class="form-horizontal login_form" role="form">
                  <input type="hidden"  value="<?php echo $dataset['id']?>" name="cause_id" id="ucause_id"/>
                  <?php $utype = $this->session->userdata('user_type');?>
                  <input type="hidden"  value="<?php echo $this->uri->segment(3)?>" id="uri"/>
                  <input type="hidden" name="user_type" id="uuser_type" value="<?php echo !empty($utype) ? $utype: "guest";?>">
                 
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 col-md-2 col-lg-2 col-xs-12 control-label">Name:</label>
                    <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                     <input type="hidden"  name="userid" id="uuserid" value="<?php echo !empty($userid) ? $userid : "0";?>"/>
                     <input type="text"  class="form-control input_field" id="uname" name="name" value="<?php echo $username;?>" <?php if($username <> ""){?> disabled="disabled" <?php }?>>
                    </div>
                    
                    <label for="inputPassword3" class="col-sm-2 col-md-2 col-lg-2 col-xs-12 control-label">Location:</label>
                    <div class="col-sm-4 col-md-4 col-lg-4 col-xs-12">
                      <input type="text" class="form-control input_field" id="ulocation" name="location" value="<?php echo $address;?>" <?php if($address <> ""){?> disabled="disabled" <?php }?>>
                    </div>
                  </div>
                  
                  <?php if($utype=="personal"){?>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 col-md-2 col-lg-2 col-xs-12 control-label">Nationality:</label>
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                     <select id="nationality" name="nationality" class="selectpicker show-menu-arrow input-xlarge nation">
                         <!-- <option value="">Select Type</option>
                            <?php  //if(isset($country) && !empty($country)) {
                                 //foreach($country as $coun) : ?>
                            <?php //if($nationality == strtolower($coun['country'])) { $selected = 'selected="selected"'; } else { $selected = '' ; } ?>
                            <option <?php //echo !empty($selected) ? $selected: ''; ?> value=<?php //echo strtolower($coun['country']) ?>><?php //echo $coun['country'] ?></option>
                            <?php //endforeach; }?>-->
                            <option value="singapore" <?php if($nationality == "singapore"){echo 'selected="selected"';}?> <?php if($nationality <> ""){?> disabled="disabled" <?php }?>>Singapore</option> 
                          </select>
                    </div>
                  </div>
                  
                   <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 col-md-2 col-lg-2 col-xs-12 control-label">Identification Type:</label>
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                     <select id="identification_type" name="identification_type" class="selectpicker show-menu-arrow input-xlarge nation">
                        <option value="">Select Identification Type</option>
                        <option value="citizenship" <?php if($identification_type=="citizenship"){echo 'selected="selected"';}?> <?php if($identification_type <> ""){?> disabled="disabled" <?php }?>>Citizenship</option>
                        <option value="pr" <?php if($identification_type=="pr"){echo 'selected="selected"';}?> <?php if($identification_type <> ""){?> disabled="disabled" <?php }?>>PR</option>
                    </select>
                    </div>
                  </div>
                  
                   <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 col-md-2 col-lg-2 col-xs-12 control-label">Identification Number:</label>
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                      <input type="text"  class="form-control input_field" id="identification_number" value="<?php echo $phone_number;?>" name="identification_number" <?php if($identification_number <> ""){?> disabled="disabled" <?php }?>>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 col-md-2 col-lg-2 col-xs-12 control-label">Contact hp:</label>
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                      <input type="text"  class="form-control input_field" id="contact_hp" value="<?php echo $contact_hp;?>" name="contact_hp" <?php if($contact_hp <> ""){?> disabled="disabled" <?php }?>>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 col-md-2 col-lg-2 col-xs-12 control-label">Contact home:</label>
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                      <input type="text"  class="form-control input_field" id="phone_number" value="<?php echo $phone_number;?>" name="phone_number" <?php if($phone_number <> ""){?> disabled="disabled" <?php }?>>
                    </div>
                  </div>
                 
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 col-md-2 col-lg-2 col-xs-12 control-label">Gender:</label>
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                      <input <?php echo $mchecked;?> type="radio"  id="gender" value="m" name="gender" <?php if($gender <> ""){?>  disabled="disabled" <?php }?>>Male
                      <input <?php echo $fchecked;?> type="radio"  id="gender" value="f" name="gender" <?php if($gender <> ""){?>  disabled="disabled" <?php }?>>Female
                    </div>
                  </div>
                  
                  <?php }else{?>
                      
                      <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 col-md-2 col-lg-2 col-xs-12 control-label">Contact office:</label>
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                      <input type="text"  class="form-control input_field" id="phone_number" value="<?php echo $phone_number;?>" name="phone_number" <?php if($phone_number <> ""){?> disabled="disabled" <?php }?>>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 col-md-2 col-lg-2 col-xs-12 control-label">Registration number:</label>
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                      <input type="text"  class="form-control input_field" id="registration_number" value="<?php echo $registration_number;?>" name="registration_number" <?php if($registration_number <> ""){?> disabled="disabled" <?php }?>>
                    </div>
                  </div>
                  
                  <?php }?>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 col-md-2 col-lg-2 col-xs-12 control-label">Email:</label>
                    <div class="col-sm-10 col-md-10 col-lg-10 col-xs-12">
                      <input type="text"  class="form-control input_field" id="uemail" value="<?php echo $email;?>" name="email" <?php if($email <> ""){?> disabled="disabled" <?php }?>>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2 col-md-10 col-md-offset-2 col-lg-10 col-lg-offset-2 col-xs-12">
                   <?php 
                   $fn =  $this->pets_model->is_already_booked_appointment($dataset["id"],$userid,$user_type);
                   if($fn == 0){?>
                   <a class="btn btn-primary btn-lg"  data-src="<?php echo base_url(); ?>calendar/user_calender/?cause_id=<?php echo $dataset["id"];?>&do=add" onclick="return proceed_adoption(this);">Proceed</a>
                   <?php } else if($fn > 0 && $fn["id"] <> ""){?>
                   <a class="btn btn-primary btn-lg"  data-src="<?php echo base_url(); ?>calendar/user_calender/?cause_id=<?php echo $dataset["id"];?>&do=edit&appointment_id=<?php echo $fn["id"];?>" onclick="return proceed_adoption(this);">Next</a>
                   <?php }?>
                    </div>
                  </div>
                </form>
         <!--content -->
        </div>
        
      </div>
    </div>
</div>
 
<!--first modal-->
<div class="modal" id="notlong" data-backdrop="static">
	<div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">Schedule appointment</h4>
        </div>
        <div class="modal-body">
            <iframe style="border:none; overflow-y:scroll; height:420px;" width="100%" height="420" src="" ></iframe>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
</div>
<!--2nd modal ends-->
<!--<script type="text/javascript" src="<?php echo base_url();?>js/jquery.slimscroll.js"></script> 
<script defer src="<?php echo base_url();?>js/thanks.giving.js"></script>--> 
<script>
function load_more(){
	var last_id = $("#last_id").val();
	var pet_id = '<?php echo $dataset['id'];?>';
	
	if(last_id !="undefined" || last_id !=""){
		$.ajax({
			type : 'GET',
			url  : BASEURL+'pets/load_more/'+last_id+'/'+pet_id,
			beforeSend : function(){
				$('#loading').show();
			},
			success: function(rep){
				result = rep.split("|::|");
				$('#data_append_'+last_id).append(result[0]);
				$('#last_id').val(result[1]);
				$('#loading').hide();
				if(result[1] ==0){
					$("#load_more").hide();
				}
			}
		});
	}
}
$('.selected img').hover(function(){
		//alert("qfdcsa");
		$(this).attr('src','<?php echo base_url();?>/images/blue_hrt.png');
		},function(){
			 $(this).attr('src','<?php echo base_url();?>/images/gray_hrt.png'); 
		});
	});

</script> 
<!-------------------------------------------------counter script starts---------------------------------------------------------------> 
<script src="<?php echo base_url();?>js/countdown/kkcountdown.min.js"></script> 
<!-------------------------------------------------counter script ends---------------------------------------------------------------> 
<script src="<?php echo base_url();?>js/pet_detail.js"></script> 

<script type="text/javascript">
// Animate the element's value from x to y:
  $({someValue: 0}).animate({someValue: <?php echo number_format($donation_data[0]["total_sum"],2);?>}, {
      duration: 3000,
      easing:'swing', // can be anything
      step: function() { // called on every step
          // Update the element's text with rounded-up value:
          $('#el').text(commaSeparateNumber(Math.round(this.someValue)));
      }
  });
 function commaSeparateNumber(val){
    while (/(\d+)(\d{3})/.test(val.toString())){
      val = val.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
    }
    return val;
  }
  <?php if($is_mobile !=1){?>
		$(document).ready(function(e) {
			$('.thumb_hover').hover(function(){
				$('#slider_ab .main_image').css({'background-image': 'url(<?php echo base_url();?>cause_upload_images/'+$(this).data('src')+')'});
			});
		});
	<?php }?>
</script>

<!--
http://www.getcreditcardnumbers.com/
http://git.aaronlumsden.com/progression/-->