<?php 
$slug='';
$id='';
$slug = $this->uri->segment(3);
$id = $this->start_cause_model->get_cause_id_byslug($slug);

$userid = $this->session->userdata("userid");
$user_type = $this->session->userdata("user_type");
$username = $this->common->get_user_name($userid,$user_type);
?>
<link rel="stylesheet" href="<?php echo base_url();?>css/masterslider.css" />
<link href="<?php echo base_url();?>css/video_style.css" rel='stylesheet' type='text/css'>
<link href='<?php echo base_url();?>css/ms-videogallery.css' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!---script type="text/javascript">
$(document).ready(function(){
    $("a.tooltip_tick").tooltip({
        placement : 'top'
    });
});
</script>
 <!--script id="img-wrapper-tmpl" type="text/x-jquery-tmpl">    
//     <div class="rg-image-wrapper">
//         {{if itemsCount > 1}}
//             <div class="rg-image-nav">
//                 <a href="#" class="rg-image-nav-prev">Previous</a>
//                 <a href="#" class="rg-image-nav-next">Next</a>
//             </div>
//         {{/if}}
//         <div class="rg-image"></div>
//         <div class="rg-loading"></div>
//         <div class="rg-caption-wrapper">
//             <div class="rg-caption" style="display:none;">
//                 <p></p>
//             </div>
//         </div>
//     </div>
// </script>-->

<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<!--script>
function hexFromRGB(r, g, b) {
var hex = [
r.toString( 16 )
];
$.each( hex, function( nr, val ) {
if ( val.length === 1 ) {
hex[ nr ] = "0" + val;
}
}); 
return hex.join( "" ).toUpperCase();
}
function refreshSwatch() {
var red = $( "#red" ).slider( "value" ),
green = $( "#green" ).slider( "value" ),
blue = $( "#blue" ).slider( "value" ),
hex = hexFromRGB( red, green, blue );
$( "#swatch" ).css( "background-color", "#" + hex );
}
$(function() {
$( "#red, #green, #blue" ).slider({
orientation: "horizontal",
range: "min",
max: 255,
value: 127,
slide: refreshSwatch,
change: refreshSwatch
});
$( "#red" ).slider( "value", 255 );
});
</script--->

<!--mid area-->
<div class="container"> 
  <!-- Causes Main Container Start -->
  <div class="row custom-row">
    <div class="col-md-12 col-xs-12 col-sm-12 heading cause_hding">
      <h3 class="col-md-2 col-sm-2 offset-md-10"> <?php echo strlen($dataset['title']) > 40 ? substr(ucfirst($dataset['title']), 0,40).".." : ucfirst($dataset['title']); ?> </h3>
      <!-- HTML to write --> 
      <!--<span> <a class="tooltip_tick ribbon" href="#" data-toggle="tooltip" data-original-title="Ribbon Text">Tooltip</a> <a class="tooltip_tick" href="#" data-toggle="tooltip" data-original-title="Identity verified">Tooltip</a> <a class="tooltip_tick" href="#" data-toggle="tooltip" data-original-title="Location verified">Tooltip</a> <a class="tooltip_tick" href="#" data-toggle="tooltip" data-original-title="Documents verified">Tooltip</a> <a class="tooltip_tick" href="#" data-toggle="tooltip" data-original-title="Situation verified">Tooltip</a> <a class="tooltip_tick" href="#" data-toggle="tooltip" data-original-title="On-site checked">Tooltip</a> </span>--> </div>
  </div>
  <div class="row custom_row">
    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
      <div class="description"><span>By:</span>
        <p><?php echo ucfirst($this->common->get_user_name($dataset['user_id'],$dataset['user_type']));?></p>
        <p>Tagline:
          <?php 
		$tagline = explode(",",$dataset['tagline']);
		echo $this->start_cause_model->get_cause_tags($tagline);?>
        </p>
      </div>
      <div class="content cause_sevenslide">
        <div class="col-md-12 none_p">
          <div id="container"> 
              <link href="<?php echo base_url();?>video/video-js.css" rel="stylesheet" type="text/css">
  <!-- video.js must be in the <head> for older IEs to work. -->
  <script src="<?php echo base_url();?>video/video.js"></script>

  <!-- Unless using the CDN hosted version, update the URL to the Flash SWF -->
  <script>
    videojs.options.flash.swf = "<?php echo base_url();?>video/video-js.swf";
  </script>

            <!-- template -->
            <div class="ms-videogallery-template"> 
              <!-- masterslider -->
              <div class="master-slider ms-skin-default" id="masterslider">
                <?php foreach($dataset['causeimages'] as $key=>$val){
			 $array = array('gif','GIF','jpg','jpeg','JPEG','png','PNG');
			  $ext = end(explode('.',$val));
			  if(in_array($ext,$array))
			  {?>
                <div class="ms-slide"> <img src="<?php echo base_url();?>cause_upload_images/<?php echo $val;?>" data-src="<?php echo base_url();?>cause_upload_images/<?php echo $val;?>" />
                  <div class="ms-thumb"> <img src="<?php echo base_url();?>cause_upload_images/thumbnail/<?php echo $val;?>"/> </div>
                </div>
                <?php } else { ?>
                <div class="ms-slide"> <img src="<?php echo base_url();?>cause_upload_images/<?php echo $val;?>" data-src="<?php echo base_url();?>cause_upload_images/<?php echo $val;?>" />
                  <div class="ms-thumb"> <img src="<?php echo base_url();?>images/video.png" width="214px" height="119px"/> </div>
                  <a data-type="video" href="<?php echo base_url();?>cause_upload_images/TerminalGo.mp4"> </a> </div>
                  
                   <video id="example_video_1" class=" ms-thumb video-js vjs-default-skin" controls preload="none" width="214" height="119"
                      poster="<?php echo base_url();?>images/video.png"
                      data-setup="{}">
                    <source src="<?php echo base_url();?>cause_upload_images/TerminalGo.mp4" type='video/mp4' />
                    
                  </video>
                  
                  
                  
                <?php } } ?>
              </div>
              <!-- end of masterslider --> 
            </div>
            <!-- end of template --> 
          </div>
        </div>
      </div>
      <div class="buttons">
        <ul>
          <li class="link_bttn"><a href="javascript:void(0);" data-target="#myModal9" data-toggle="modal" >Donate Now!</a></li>
          <!--<li class="link_bttn"><a href="#" data-target="#myModal12" data-toggle="modal">Volunteer!</a></li>-->
          <?php  if($this->session->userdata("is_logged_in") == false) { ?>
          <li class="link_bttn"><a href="javascript:void(0);" data-target="#myModal" data-toggle="modal">Sign It!</a></li>
          <?php } ?>
        </ul>
      </div>
      <div class="row custom-row">
        <div class="col-md-12 story_heading">
          <h3 class="col-md-2 offset-md-10">story</h3>
        </div>
      </div>
      <div class="row story">
        <p><?php echo ucfirst($dataset['detailed_stories']);?></p>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
      <div class="social_icon">
        <ul>
		 <?php
          $text = $dataset['summary'];
          $title = base_url();
	     ?>
          <li>
		    <a title="Share with Facebook" href="https://www.facebook.com/dialog/feed?app_id=736788853060365&display=popup&link=<?php echo base_url();?>cause/cause_detail/<?php echo $dataset['slug'];?>&name=<?php echo $title;?>&description=<?php echo $text;?>&redirect_uri=<?php echo base_url();?>cause/cause_detail/<?php echo $dataset['slug'];?>" class="invite_link"  target="_blank"> 
		  <img src="<?php echo base_url();?>images/icon1.png" alt="facebook"/>
		  </a></li>
		   <li>
		   <a class="invite_link"  target="_blank" title="Share with Twitter" href="http://twitter.com/share?url=<?php echo base_url();?>cause/cause_detail/<?php echo $dataset['slug'];?>&text=<?php echo $text;?>" data-lang="en" data-size="large" data-count="none" />
		  <img src="<?php echo base_url();?>images/icon2.png" alt="twitter"/>
		  </a>
		  </li>
          <li>
		  <a href="https://plus.google.com/share?url=<?php echo base_url();?>cause/cause_detail/<?php echo $dataset['slug'];?>" onclick="window.open('https://plus.google.com/share?url=<?php echo base_url();?>cause/cause_detail/<?php echo $dataset['slug'];?>','<?php echo $text;?>','width=600,height=400,left='+(screen.availWidth/2-225)+',top='+(screen.availHeight/2-150)+'');return false;">
		  <img src="<?php echo base_url();?>images/icon3.png" alt="google"/></a>
		  </li>
        </ul>
      </div>
      <?php  
        //get cause informatin 
       $val='';
       $val = $this->start_cause_model->getIndividualcause($id);
       $fninfo = array();
       $closetime = $val['activated_time'] + ($val['duration']*24*60*60);
     //  $fninfo =  $this->start_cause_model->getcausedonationinfo($id);
     ?>
      <div class="fundraising_main">
        <h1>FUNDRAISING</h1>
        <strong><span data-time="<?php echo $closetime;?>" class="kkcount-down"></span></strong>
        <div id="red"></div>
        <p>Target: $<?php echo number_format($val["target_amount"],2);?></p>
        <p>Current: $<?php echo number_format($donation_data[0]["total_sum"],2);?></p>
        <p>People contributed: <?php echo $donation_data[0]["count"];?></p>
        <div class="donate_bttn"><a href="javascript:void(0);" data-target="#myModal9" data-toggle="modal">Donate Now</a></div>
      </div>
      
      <!--end--> 
    </div>
  </div>
  <div class="row custom_row" id="cause3">
    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12">
      <div class="col-md-12 story_heading m_head">
        <h3 class="col-md-2 offset-md-10">Summary headlines</h3>
      </div>
      <div class="cause3_story">
        <p><?php echo ucfirst($dataset['summary']);?></p>
      </div>
      <?php if(isset($dataset['causedoc']) && !empty($dataset['causedoc'])) {?>
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
				if(in_array($name1,$pdf)){ $src =  base_url().'images/my_file_048.png';}else {$src =  base_url().'images/my_file_020.png';}
			   ?>
            <li> <a href="<?php echo base_url().$this->router->class;?>/view/<?php echo $val;?>" target="_blank">
            
             <img src="<?php echo $src ;?>" alt="" width="100" height="110"> </a> 
             
             <span><a href="<?php echo base_url();?>cause_upload_docs/<?php echo $val;?>" >download</a></span> </li>
            <?php }?>
          </ul>
        </div>
      </div>
      <?php } ?>
      
     
      
     <!-- <iframe src="http://docs.google.com/viewer?url=http://112.196.33.85/solitaire/demo/anovate/cause_upload_docs/1441415090.pdf&embedded=true"
style="width:680px; height:700px " frameborder="0" scrolling="auto" ></iframe>-->

      <div class="col-md-12 story_heading m_head">
        <h3 class="col-md-2 offset-md-10">Comments</h3>
      </div>
      <div style="float:left; left:600px;" id="message"> <font color='red'><?php echo $this->session->flashdata('comment_errormsg'); ?></font> <font color='green'><?php echo $this->session->flashdata('comment_successmsg'); ?></font> </div>
      <?php if(count($comment) > 0){
		 	 foreach($comment as $k => $v){
	 	 ?>
      <div class="comment_row" id="data_append_<?php echo $v["id"];?>">
	  <!-- <img src="<?php //echo base_url();?>images/comment_img.jpg" class="comment_img">-->
        <div class="comment_text">
          <p><strong><?php echo $this->common->get_user_name($v["userid"],$v["user_type"])?>:</strong></p>
          <p><?php echo stripcslashes($v["comment"]);?></p>
          <p><?php echo $this->common->convert_time_days($v["time"])?></p>
        </div>
      </div>
      <?php }}?>
      <?php  
	    //echo count($comment);
		 if(count($comment) > 3){
		 $last_blog_id = array_reverse($comment,true);
		 $max = max(array_keys($last_blog_id));
		 $id = $comment[$max]["id"];  
	?>
      <input type="hidden" id="last_id" value="<?php echo  $id;?>" />
      <div  onclick="load_more();" id="load_more" class="buttons" ><a href="javascript:void(0);">Load More</a> </div>
      <?php }?>
      <?php if($userid <> ""){?>
      <form method="post" name="" action="<?php echo base_url().$this->router->class;?>/add_comment/">
        <input type="hidden"  name="userid" value="<?php echo !empty($userid) ? $userid : "";?>"/>
        <div class="username">
          <input type="text" value="<?php echo ucfirst($username);?>" disabled="disabled" />
          <input type="hidden" name="cause_id" value="<?php echo $slug;?>"/>
        </div>
        <div class="comment_area">
          <textarea class="comment_box" placeholder="Comment" name="comment"></textarea>
          <input type="submit" value="Send"/>
        </div>
      </form>
      <?php }else{?>
      <div class="link_bttn"><a href="#" data-target="#myModal" data-toggle="modal">Sign It!</a></div>
      <?php }?>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
      <div class="hall_of_heros">
        <div class="table-responsive">
          <table class="table">
            <div class="table_head">
              <h3 class="head_head">Hall of heros</h3>
            </div>
            <tbody>
			
              <tr>
			  <?php  $i= 0; foreach($heroes as $k=>$v){
			  if( $i%1 == 0){  "</tr><tr>";} 
			  ?>
			   
                <td><?php echo $this->common->get_user_name($v['user_id'],$v['user_type']);?></td>
                 
				<?php $i++;} ?>
              </tr>
             
                </tbody>
          </table>
        </div>
      </div>
      <!--end--> 
    </div>
  </div>
</div>
<!--end--> 

<!--Modal-9(CAUSE4 - DONATION PAYMENT WINDOW) -->
<div class="modal fade" id="myModal9" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header custom_m_head">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title custom_title" id="myModalLabel">THANKS FOR YOUR SUPPORT</h4>
      </div>
      <div class="form-group mnt_sm_offset-1 mnt_form_style mnt_share_cause" id="error_msgs" style="text-align:center; "> </div>
      <div class="modal-body">
        <form class="form-horizontal login_form thanks_form" role="form" id="pay_form" method="post" action="<?php echo base_url()?>donation/paypal/">
          <div class="form-group mnt_sm_offset-1 mnt_form_style mnt_share_cause">
            <label for="inputEmail3" class="col-sm-2 col-sm-offset-1 control-label">Amount (SGD)</label>
            <div class="col-sm-7 name_fed">
              <input type="text" class="form-control name_input" id="amount" name="amount" placeholder="$10">
            </div>
          </div>
          <?php if(count($user_cards) > 0){?>
          <!-- <div class="form-group mnt_sm_offset-1 mnt_sm-5 mnt_form_style">
                   <label for="inputEmail3" class="col-sm-4 control-label">Default Payment</label>
                    <?php foreach($user_cards as $key=>$val){?>
					<div class="col-sm-7"><label class="checkbox-inline mnt_f"> <input type="radio" id="<?php echo $val['id'];?>" value="option1" name="cards" class="cards"> Card Ends With - <?php echo $val['card_number'];?></label> </div> 
                   <?php } ?>
				   </div>  
				   <div class="col-sm-offset-4 col-sm-8">
                      <button type="submit" class="btn btn-default login_cstm" style="margin-bottom:25px;" onclick="show_methods();">CHANGE PAYMENT METHOD</button>
                 </div>-->
          <?php } ?>
          <div class="col-md-12 col-sm-6 col-xs-12 name_fed mnt_mb2">
            <div class="form-group">
              <label class="col-sm-4 control-label" for="firstname">Payment Type:</label>
              <select name="payment_method" onchange="show_block(this.value);" id="method">
                <option value="">Select Method</option>
                <option value="card">Credit Card</option>
                <!-- <option >Bank Account Withdrawal</option>-->
                <option value="paypal">PayPal</option>
              </select>
            </div>
          </div>
          <div class="clearfix"></div>
          <div id="card_info" style="display:none">
            <div class="col-md-12 col-sm-8 col-xs-12 name_fed mnt_mb2">
              <div class="form-group mnt_credit_option">
                <label class="col-sm-3 col-xs-12 control-label" for="firstname">Credit Card:</label>
                <div class="col-sm-2 col-xs-3">
                  <input type="radio" name="card" id="visa" value="visa" class="gender">
                  <img src="<?php echo base_url();?>images/thumbs/visa_small.gif" /> </div>
                <div class="col-sm-2 col-xs-3">
                  <input type="radio" name="card" id="master" value="master" class="gender">
                  <img src="<?php echo base_url();?>images/thumbs/mastercd_small.gif" /> </div>
                <div class="col-sm-2 col-xs-3">
                  <input type="radio" name="card" id="discovercard" value="discovercard" class="gender">
                  <img src="<?php echo base_url();?>images/thumbs/discovercard_sm.gif" /> </div>
                <div class="col-sm-2 col-xs-3">
                  <input type="radio" name="card" id="amex" value="amex" class="gender">
                  <img src="<?php echo base_url();?>images/thumbs/amex_small.gif" /> </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-md-12 col-sm-6 col-xs-12 name_fed mnt_mb2">
              <div class="form-group">
                <label class="col-sm-4 control-label" for="firstname">Credit Card Number:</label>
                <div class="col-sm-7 name_fed">
                  <input type="text" placeholder="" id="cnumber" name="cnumber" class="form-control name_input">
                </div>
              </div>
            </div>
            <div class="col-md-12 col-sm-6 col-xs-12 name_fed mnt_mb2">
              <div class="form-group">
                <label class="col-sm-4 control-label" for="firstname">CVV Number:</label>
                <div class="col-sm-5 name_fed">
                  <input type="text" placeholder="" id="cvc" name="cvc" class="form-control name_input">
                </div>
                <div class="col-sm-3  mnt_cvv" for="firstname"><a href="javascript:void(0);">What is CVV Number</a></div>
              </div>
            </div>
            <div class="col-md-12 col-sm-6 col-xs-12 name_fed mnt_mb2">
              <div class="form-group mnt_select_margin">
                <label class="col-sm-4 control-label" for="firstname">Expiration Date:</label>
                <div class="col-sm-3 name_fed mnt_select">
                  <select class="form-control" name="exp_month" id="exp_month">
                    <option value="">Select Month</option>
                    <?php for($i=1; $i<=12; $i++) {?>
                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                    <?php }?>
                  </select>
                </div>
                <div class="col-sm-3 name_fed mnt_select">
                  <select class="form-control" name="exp_year" id="exp_year">
                    <option value="">Select Year</option>
                    <?php 
						$year=date('Y');
						for($j=$year;$j<=$year+20; $j++)
						{?>
                    <option value="<?php echo $j;?>"><?php echo $j;?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          
          <!--<fieldset class="bankPayment primary" style="display: block;">
                <div class="BankRoutingError"><p>Bank routing number is required.</p></div>
                <label for="ach_routing">Bank Routing Number:</label>          
    <input type="tel" aria-required="true" name="ach_routing" class="ach_routing form-control"  maxlength="20" autocomplete="off">
    <a target="_blank" href="#" title="What is this? Opens new window.">How do I find this number?</a>
  
                <div class="BankAccountError"><p>Bank account number is required.</p></div> 
    <label for="ach_account">Bank Account Number:</label>
    <input type="tel" class="ach_account form-control" value="" maxlength="20" autocomplete="off">
    
                <div class="BankCheckboxError"><p>You must indicate that you agree to use your bank account as a payment method.</p></div>
    <div class="payment_typeach_confirmname">
      <input type="checkbox" aria-required="true" value="true" id="confirmname">
      <label for="confirmname">
        <p>By checking this option, I agree to use my bank account as a payment method and authorize WWF to debit my bank account to fulfill my donation commitment.</p>
      </label>  
    </div>
                </fieldset>
               
							<input type="submit" class="payment_submit" name="donate_button" value="Submit"/>
							<div class="form-group mnt_sm_offset-1 mnt_sm-5">
							<label for="inputEmail3" class="col-sm-1 col-sm-offset-1 control-label"></label>
						  </div>  
                            -->
          <div class="form-group mnt_sm_offset-1 mnt_sm-3 mnt_form_style">
            <label class="col-sm-3 col-xs-7 col-sm-offset-1 control-label" for="inputEmail3">Support as anonymous</label>
            <div class="col-sm-9 col-xs-2 checkbox">
              <label>
                <input type="checkbox" value="" name="support_as" id="support_as">
              </label>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-4 col-sm-8 mnt_form_style">
              <button type="button" class="btn btn-default login_cstm" onclick="return get_payment();">CONFIRM</button>
            </div>
          </div>
          <div class="form-group mnt_sm_offset-1 mnt_form_style mnt_share_cause">
            <label class="col-sm-4 col-sm-offset-1 control-label" for="inputEmail3">Share this Cause</label>
            <div class="col-sm-7 mnt-modal7">
              <label class="checkbox-inline mnt_f">
			   <a title="Share with Facebook" href="https://www.facebook.com/dialog/feed?app_id=736788853060365&display=popup&link=<?php echo base_url();?>cause/cause_detail/<?php echo $dataset['slug'];?>&name=<?php echo $title;?>&description=<?php echo $text;?>&redirect_uri=<?php echo base_url();?>cause/cause_detail/<?php echo $dataset['slug'];?>" class="invite_link"  target="_blank"> 
			  <img src="<?php echo base_url() ?>images/f.png">
			  </a>
			  </label>
              <label class="checkbox-inline mnt  _t">
			  <a class="invite_link"  target="_blank" title="Share with Twitter" href="http://twitter.com/share?url=<?php echo base_url();?>cause/cause_detail/<?php echo $dataset['slug'];?>&text=<?php echo $text;?>" data-lang="en" data-size="large" data-count="none" />
			  <img src="<?php echo base_url() ?>images/t.png">
			  </a>
			  </label>
              <label class="checkbox-inline mnt_g">
			    <a href="https://plus.google.com/share?url=<?php echo base_url();?>cause/cause_detail/<?php echo $dataset['slug'];?>" onclick="window.open('https://plus.google.com/share?url=<?php echo base_url();?>cause/cause_detail/<?php echo $dataset['slug'];?>','<?php echo $text;?>','width=600,height=400,left='+(screen.availWidth/2-225)+',top='+(screen.availHeight/2-150)+'');return false;">
			  <img src="<?php echo base_url() ?>images/g.png">
			  </a>
			  </label>
            </div>
          </div>
          <input type="hidden"  id="cause_id" name="cause_id" value="<?php echo $dataset['id']?>">
        </form>
      </div>
    </div>
  </div>
</div>
<!--Modal-end--> 

<script>
	 	$(function(){
			$('#mnt_scroll').slimScroll({
			height: '250px',
			width: '100%',
			color: '#016acb',
			railVisible: true,
			alwaysVisible: true
			});
		});
		$(function(){
			$('#mnt_scroll2').slimScroll({
			height: '350px',
			width: '100%',
			color: '#016acb',
			railVisible: true,
			alwaysVisible: true
			});
		});
		$(function(){
			$('#mnt_scroll3').slimScroll({
			height: '350px',
			width: '100%',
			color: '#016acb',
			railVisible: true,
			alwaysVisible: true
			});
		});
		$(function(){
			$('#mnt_scroll4').slimScroll({
			height: '350px',
			width: '100%',
			color: '#016acb',
			railVisible: true,
			alwaysVisible: true
			});
		});
    </script> 
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script> 
<!--script type="text/javascript" charset="utf-8">
// 				api_gallery=['images/fullscreen/1.JPG','images/fullscreen/2.jpg','images/fullscreen/3.JPG'];
// 				api_titles=['API Call Image 1','API Call Image 2','API Call Image 3'];
// 				api_descriptions=['Description 1','Description 2','Description 3'];
// 			</script>
// <script type="text/javascript" charset="utf-8">
// 			$(document).ready(function(){
// 				$("area[rel^='prettyPhoto']").prettyPhoto();
				
// 				$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: true});
// 				$(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
		
// 				$("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
// 					custom_markup: '<div id="map_canvas" style="width:350px; height:350px"></div>',
// 					changepicturecallback: function(){ initialize(); }
// 				});

// 				$("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
// 					custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
// 					changepicturecallback: function(){ _bsap.exec(); }
// 				});
// 			});
// 			</script--> 

<script type="text/javascript" src="<?php echo base_url();?>js/jquery.slimscroll.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.easing.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>js/masterslider.min.js"></script> 
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.tmpl.min.js"></script> 
<!--<script type="text/javascript" src="<?php echo base_url();?>js/jquery.elastislide.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/gallery.js"></script>--> 
<script type="text/javascript" src="<?php echo base_url();?>js/custom.js"></script> 

<!---script defer src="<?php echo base_url();?>js/jquery.flexslider.js"></script> --> 
<!--script defer src="<?php echo base_url();?>js/thanks.giving.js"></script--> 
<script type="text/javascript">
    var slider = new MasterSlider();
    
    slider.setup('masterslider', {
      width : 850,
      height : 478,
      space : 5,
      shuffle : true,
      loop : true,
      view : 'basic'
    });
    
    slider.control('arrows');
    slider.control('thumblist', {autohide : false,  dir : 'h'});
  </script> 
<!--script type="text/javascript">
   $(function() {
    $('a.tp').tooltip({placement: 'top'});
});
</script--> 
<script type="text/javascript">
function show_block(val)
{
	 if(val == 'card'){
	 $('#card_info').show();
	 } 
	 else
	 {
	  $('#card_info').hide();
	 }  
}
function get_payment()
{
    var cause_id = $('#cause_id').val();
    var method = $('#method').val();
	var amount = $('#amount').val();
	var num = /^[0-9\ ]+$/;
	var support_as = $("#support_as").is(":checked") ? 1 : 0;
	$("#support_as").val(support_as);
	
	
	if(method == 'paypal')
	{
	   if(amount == "" || amount == "0")
	   {
	         var error = "Please enter amount";
		    $('#error_msgs').html(error).show().css({'color':'red'});
			return false;
	   }
	   else if(!num.test(amount)){
		var error = "Amount must be a number";
		 $('#error_msgs').html(error).show().css({'color':'red'});
	     return false;
	   }
		else{
			document.getElementById("pay_form").submit();
			//window.location.href = BASEURL+'donation/paypal/';
		}
	}
	else
	{
	    var card = $('input[name=card]:checked').val();
		var cnumber = $('#cnumber').val();
		var cvc = $('#cvc').val();
		var exp_month = $('#exp_month').val();
		var exp_year = $('#exp_year').val();
		var support_as = $("#support_as").is(":checked") ? 1 : 0;
		$("#support_as").val(support_as);
		
		
		if(amount == "" || amount == "0")
	    {
	        var error = "Please enter amount";
		    $('#error_msgs').html(error).show().css({'color':'red'});
			return false;
	     }
	     else if(!num.test(amount)){
			 var error = "Amount must be a number";
			 $('#error_msgs').html(error).show().css({'color':'red'});
			 return false;
	     }
		 else if(!$('input[name=card]:checked').val())
	     {
		   var error = "Please select credit card";
		   $('#error_msgs').html(error).show().css({'color':'red'});
	       return false;
		 }
		 else if(cnumber == "")
	     {
	         var error = "Please enter credit card number";
		    $('#error_msgs').html(error).show().css({'color':'red'});
			return false;
	     }
		 else if(cvc == "")
	     {
	         var error = "Please enter cvc number";
		    $('#error_msgs').html(error).show().css({'color':'red'});
			return false;
	     }
		 else if(exp_month == "")
	     {
	         var error = "Please select expiration month.";
		    $('#error_msgs').html(error).show().css({'color':'red'});
			return false;
	     }
		 else if(exp_year == "")
	     {
	         var error = "Please select  expiration year.";
		    $('#error_msgs').html(error).show().css({'color':'red'});
			return false;
	     }
		 else {
		   $.ajax({
					type : 'POST',
					url  : BASEURL+'donation/paypal_checkout/',
					data : {'cause_id':cause_id,'amount':amount,'card':card,'cnumber':cnumber,'cvc':cvc,'exp_month':exp_month,'exp_year':exp_year},
					beforeSend : function(){
						$('#error_msgs').html('<font  style="color:red">Processing.....Please wait couple of minutes.</font>');
						$('.login_cstm').prop('disabled', true);
						$('input').prop('disabled', true);
						$('select').prop('disabled', true);
					},
					success: function(rep){
					
						$('input').prop('disabled', false);
						$('.login_cstm').prop('disabled', false);
						$('select').prop('disabled', false);
						
					    var result=eval("("+rep+")");
						if(result['status'] == 'error')
						{
						 $('#error_msgs').html(result['msg']).show().css({'color':'red'});	
						}
						else
						{
						  setTimeout(function(){ window.location = BASEURL+'cause/thankyou/';}, 300);
						  $('#error_msgs').html(result['msg']).show().css({'color':'green'});
						}
					  }
				});
		 }		
    }

}
</script> 
<script src="<?php echo base_url();?>js/countdown/kkcountdown.js"></script> 
<script src="<?php echo base_url();?>js/countdown/kkcountdown.min.js"></script> 
<script>

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
	
function load_more(){
	var last_id = $("#last_id").val();
	var cause_id = '<?php echo $dataset['id'];?>';
	
	if(last_id !="undefined" || last_id !=""){
		$.ajax({
			type : 'GET',
			url  : BASEURL+'cause/load_more/'+last_id+'/'+cause_id,
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

</script>
