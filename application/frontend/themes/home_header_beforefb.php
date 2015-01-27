<!--top-header with logo and search -->
		<div role="navigation" class="navbar navbar-inverse">
      <div class="container top-head">
	  <div class="search ">
          <form role="form" class="navbar-form navbar-right" method="get" action="<?php echo base_url();?>search/search_causes/">
          <div class="buttons">
             <?php  if($this->session->userdata("is_logged_in")) { ?>
        		 <a id="logout" class="btn btn-default join" href="javascript:void(0);" >LOGOUT</a>
             <?php } else { ?>
                 <button id="myModal_click" type="button" data-toggle="modal" data-target="#myModal" class="btn btn-default join">LOGIN</button>
            <?php } ?>
            <?php  if($this->session->userdata("is_logged_in")) { ?>
                	<a href="<?php echo base_url(); ?>accounts/particulars/"><button type="button" class="btn btn-default login">ACCOUNT</button></a>
            <?php } else { ?>
                    <a href="<?php echo base_url(); ?>logins/register/" class="btn btn-default login join_us" >JOIN US</a>
            <?php } ?>
           </div>
                      
            <div class="form-group mob_view">
              <input type="text"  class="form-control" placeholder="Eg: Find Events, People, Charities" name="search" value="<?php echo !empty($_GET['search']) ? $_GET['search']: "";?>">
                <button class="glyphicon glyphicon-search"></button>
              <i class="icon-search"></i>
            </div>
          </form>
        </div><!--/.navbar-collapse -->
        <div class="navbar-header">
          <a href="<?php echo base_url();?>home/" class="navbar-brand"><img src="<?php echo base_url();?>images/logo.png" alt=""></a>
        </div>
        
      </div>
    </div>
    	<!--end-->
        <!--navigation-->
        <nav class="navbar navbar-inverse navbar-static-top custom-nav" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1"> 
	
<ul class="nav navbar-nav">
    <li><a href="<?php echo base_url();?>home/" <?php if($this->uri->segment(1)=="home" || $this->uri->segment(1)=="") echo ' class="active"'?> >HOME</a></li> 
    <?php  if($this->session->userdata("is_logged_in")) {?>
    <li><a href="<?php echo base_url();?>start_cause/" <?php if($this->uri->segment(1)=="start_cause") echo ' class="active"'?> >START A CAUSE</a></li>
	 <li><a href="<?php echo base_url();?>pets/" <?php if($this->uri->segment(1)=="pets" && $this->uri->segment(2) != "listing") echo ' class="active"'?> >START A PET LISTING</a></li>
  
	<?php }?>
	 <li><a href="<?php echo base_url();?>cause/" <?php if($this->uri->segment(1)=="cause") echo ' class="active"'?> >CAUSES</a></li>
     <li><a href="<?php echo base_url();?>hope/" <?php if($this->uri->segment(1)=="hope") echo ' class="active"'?> >STORIES OF HOPE</a></li>
        <li><a href="<?php echo base_url();?>pets/listing/" <?php if($this->uri->segment(2)=="listing") echo ' class="active"'?> >PET LISTING</a></li>
     <!--<li><a href="<?php echo base_url();?>smart/" <?php if($this->uri->segment(1)=="smart") echo ' class="active"'?> >S.MART</a></li>-->
      </ul>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
		<!--end-->


<?php
if($_GET["q"] == true){?>
<script>
$(document).ready(function(e) {
    $('#myModal').modal('show'); 
	$('#myModal').on('hide.bs.modal', function () {
		location.href = BASEURL+'home/';//close the modal on cross click
	})
});

</script>
<?php }?>

<!-- Modal-1-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header custom_m_head">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title custom_title" id="myModalLabel">Login</h4>
                  </div>
                  <div id="message" style=" text-align:center;" >
                   <font color='red'><?php echo $this->session->flashdata('email_errormsg'); ?></font>
                   <font color='green'><?php echo $this->session->flashdata('email_successmsg'); ?></font> </div>

                  <div class="modal-body">
                  <form id="login_form" class="form-horizontal login_form" role="form" method="post" action="#">
                
                <!-- <input type="text" value="<?php echo $_SERVER?>" />-->
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Username:<span style="color:#F00;">*</span></label>
                  <div class="col-sm-9">
                  <input type="text" autocomplete="off" class="form-control input_field" id="username" name="username" value="" placeholder="">
                  </div>
                  </div>
                  <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Password:<span style="color:#F00;">*</span></label>
                  <div class="col-sm-9">
                  <input type="password" autocomplete="off" class="form-control input_field" value="" name="password" id="password" placeholder="">
                  </div>
                  </div>
                  <div class="form-group col-sm-offset-2 col-sm-10">
                  <a href="<?php echo base_url(); ?>forget_password/forget_password" class="forget">Forgot username or password?</a>
                  </div>
                  <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                  <button type="submit" id="login" class="btn btn-default login_cstm" >Login</button>
                  </div>
                  </div>
                  </form>
                        <div class="login_center">
                        <div class="break_line">
                        <p>or</p>
                        </div>
                        <div class="login_fb"><a href="javascript:void(0);">
                            <img src="<?php echo base_url(); ?>images/login_facebook.png" alt=""/></a>
                        </div>
                        <div class="login_g"><a href="javascript:void(0);">
                            <img src="<?php echo base_url(); ?>images/login_google.png" alt=""/></a>
                        </div>
                        <div class="form-group user_register_now ">
                        <a href="<?php echo base_url(); ?>logins/register/">Not a user? Register now!</a>
                        </div>
                        </div>
                  </div>
            </div>
      </div>
</div>
<!-- end -->
<script>
<?php if($this->router->method == "cause_detail"){?>
$("#myModal_click").click(function(e) {
    jQuery('html,body').animate({scrollTop:1000},0);
});
<?php }?>
</script>


<script>
$("#logout").click(function(e) {
    swal({
		title: "Are you sure?",
		text: "You want to logout",
		type: null,
		showCancelButton: true,
		confirmButtonColor: '#DD6B55',
		confirmButtonText: 'Yes, logout',
		imageUrl: BASEURL+'images/sad.png'
	},
	function(){
		window.location.href = BASEURL+'logins/logout/';
	});
});
	
$("#login").on("click",function(){
	 var username = $("#username").val().trim();
     var password = $("#password").val().trim();
	 var redirect = '<?php echo current_url();?>';
	 var segment = '<?php echo $this->uri->segment(2);?>';
	
	 if(username == ""){
		var response = 'error';
		var message = "Please enter username";
		$("#username").focus();
     }
	 else if(password == ""){
		var response = 'error';
		var message = "Please enter password";
		$("#password").focus();
     }
	 else{
		 $.ajax({
			type : 'POST',
			url  : BASEURL+'logins/logins_check_user_login/',
			data : {'username':username, 'password': password},
			beforeSend : function(){
				//$('#loading_'+dish_id).show();
			},
			success: function(rep){
				obj = JSON.parse(rep);
				if(obj == 'error'){
					$('#message').html("Please enter correct username/password or activate your account").show().css({'color':'red'});
				}
				else{
					if(segment !=""){
					   $(location).attr('href',redirect);
					}
					else{
				 	   $(location).attr('href',"<?php echo base_url() ?>accounts/particulars");
					}
				}
			}
		});
		return false;
	 }
	 if(message != '' && message != null){
		if(response == 'error'){
			window.scrollTo(0,400);
			$('#message').html(message).show().css({'color':'red'});
			return false;
		}
	}
});
</script>

<script>
$( ".navbar-toggle" ).click(function() {
  $('.navbar-collapse').toggleClass( "highlight" );
});
</script>