<!--footer-->
<span id="error_news" style="float:right;margin:0 100px 0 0;"></span>
<div id="footer">
  <div class="social-icons">
    <div class="container">
	
      <div class="col-md-4 col-sm-6 col-xs-12">
        <div class="connect"> Connect With Us! </div>
        <div class="connect connect_social"> 
			<a href="http://www.facebook.com/" class="facebook"></a> 
			<a href="https://twitter.com/" class="twitter"></a> 
			<a href="http://instagram.com/" class="instagram"></a> 
			<a href="https://www.google.com;" class="google"></a> </div>
      </div>
      <div class="col-md-7 col-sm-6 col-xs-12 footer-nav">
        <div class="row">
          <div class="col-md-5">
		   <?php  if($this->session->userdata("is_logged_in")!=1) { ?>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="<?php echo base_url();?>logins/register">Join us!</a></li>
              <li><a href="javascript:void(0);" style="cursor:default;">|</a></li>
              <li><a href="javascript:void(0);" data-toggle="modal" data-target="#myModal">Login</a></li>
            </ul>
			 <?php } ?>
          </div>
          
          <div class="col-md-7">
            <form  method="post" action="#" id="newsletters" >
              <div class="form-group email_sub_ftr">
                <label class="lab_search">Email Subscribe:</label>
                <div class="email-search">
                  <input type="hidden" id="news_uri" value="<?php echo current_url();?>"  />
                  <input type="text" name="email" id="news_email" value="" class="form-control"  >
                  <button type="button" class="btn btn-default" onclick="return newsletters();">Send</button>
                </div>
              </div>
            </form>
          </div>
      </div>
      
     
    </div>
  </div>
  <div class="gray-area">
    <div class="container">
      <div class="footer-box col-sm-6 col-xs-12">
        <h3>Information</h3>
        <img src="<?php echo base_url();?>images/foot.png">
        <nav class="pub_nav">
          <ul>
            <li><a href="<?php echo base_url();?>pages/about_us">About Us</a></li>
            <li><a href="<?php echo base_url();?>pages/how">How it works</a></li>
            <li><a href="<?php echo base_url();?>pages/terms">Terms and Conditions</a></li>
           <!-- <li><a href="javascript:void(0);">Our Partners</a></li>-->
          </ul>
        </nav>
      </div>
      
      <div class="footer-box col-sm-6 col-xs-12">
        <h3>Causes</h3>
        <img src="<?php echo base_url();?>images/foot.png">
        <nav class="pub_nav">
          <ul>
            <li><a href="<?php echo base_url();?>cause/">Causes</a></li>
            <li><a href="<?php echo base_url();?>hope/"> Stories of hope</a></li>
            <?php  if($this->session->userdata("is_logged_in")!=1) { ?>
            <li><a href="javascript:void(0);" data-toggle="modal" data-target="#myModal">Start a cause</a></li>
            <?php }else{?>
            <li><a href="<?php echo base_url();?>start_cause/" >Start a cause</a></li>
            <?php }?>
            <?php  if($this->session->userdata("is_logged_in")!=1) { ?>
            <li><a href="javascript:void(0);" data-toggle="modal" data-target="#myModal">Pet listing</a></li>
            <?php }else{?>
            <li><a href="<?php echo base_url();?>pets/listing/" >Pet listing</a></li>
            <?php }?>
          </ul>
        </nav>
      </div>
      <!--<div class="footer-box col-sm-6 col-xs-12">
        <h3>Stories of hope</h3>
        <img src="<?php echo base_url();?>images/foot.png">
        <nav class="pub_nav">
          <ul>
           <li><a href="<?php echo base_url();?>pages/about_us">About Us</a></li>
            <li><a href="<?php echo base_url();?>pages/how">How it works</a></li>
            <li><a href="<?php echo base_url();?>pages/terms">Terms and Conditions</a></li>
            <li><a href="javascript:void(0);">Our Partners</a></li>
          </ul>
        </nav>
      </div>
      <div class="footer-box col-sm-6 col-xs-12">
        <h3>Thanks giving</h3>
        <img src="<?php echo base_url();?>images/foot.png">
        <nav class="pub_nav">
          <ul>
            <li><a href="javascript:void(0);"> What is Crowd Causes</a></li>
            <li><a href="javascript:void(0);">FAQ</a></li>
            <li><a href="javascript:void(0);">Support</a></li>
            <li><a href="javascript:void(0);">Crowd Causes</a></li>
          </ul>
        </nav>
      </div>-->
    </div>
  </div>
  <div class="black-area">
    <div class="container">
      <div class="row">
        <p>COPYRIGHT&copy; CrowdCauses Pvt.Ltd, <?php echo date('Y')?> . All rights reserved</p>
      </div>
    </div>
  </div>
</div>
</div>
<!--end--> 
<script>
function newsletters(element){	
	 var e = $(element);//element 
	 var formid = e.parents("form").attr("id");
	 var email = $("#news_email").val();
	 var uri = $("#news_uri").val();
	 var email_regex =  /^[a-zA-Z0-9.'+=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
	 var response,message;
	
	if(email == ""){
		 response = 'error';
		 message = "Please enter email subscribe";
		 $("#news_email").focus();
    }
	else if (!email_regex.test($("#news_email").val())) {
		response = "error";
		message = "Please enter correct email";
		$('#news_email').focus();
	}
	else{
		 $.ajax({
			type : 'POST',
			url  : BASEURL+'home/newsletters/',
			data : {'email':email,'uri':uri},
			beforeSend : function(){
				$('#'+formid).find('input, textarea, select, button, checkbox, radio').not(':hidden').prop('disabled',true);
			},
			success: function(rep){
				$('#'+formid).find('input, textarea, select, button, checkbox, radio').not(':hidden').prop('disabled',false);
				object = JSON.parse(rep);
				
				if(object["response"] == 'error')
				{
					$('#error_news').html(object["message"]).css({'color':'red'}).show();
				}
				else
				{
					$('#error_news').html(object["message"]).css({'color':'green'}).show("fast",function(){
  						window.location.href = uri;
					});
				}
			},
			error: function(rep)
			{
				$('#'+formid).find('input, textarea, select, button, checkbox, radio').prop('disabled',false);
				if(rep.readyState == 4){
					$('#error_news').html(rep.statusText).css({'color':'red'}).show();
				}
			}
		});
		//return false;
	 }
	 if(message != '' && message != null) {
		if(response == 'error'){
			$('#'+formid).find('input, textarea, select, button, checkbox, radio').prop('disabled',false);
			$('#error_news').html(message).css({'color':'red'}).show();
			return false;
		}
	}
}

</script>

  

