<div class="container">
<!-- Ist row-->
<div class="row custom-row">
<div class="col-md-12 heading">
    <h3 class="col-md-2 offset-md-10">Forgot Password</h3>
</div>
<!-- Nav tabs -->
<!-- Tab panes -->
<div class="tab-content  steps">
    <div class="clearfix"></div>
    <div  class="messag1" id="message" style="display:inline; margin-left:16%;"> 
		<font color='red'><?php echo $this->session->flashdata('errormsg'); ?></font> 
		<font color='green'><?php echo $this->session->flashdata('successmsg'); ?></font> 
		<br class="clear" />
	</div>
    <form role="form" method="post" action="<?php echo base_url();?><?php echo $this->router->class?>/forget_user_password">
        <div class="col-md-10  col-sm-10 col-xs-12 name_fed">
            <div class="">
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="Email">Email:</label>
                    <div class="col-sm-10 col-md-7">
                        <input type="text" placeholder="Email" name="email" id="email" class="form-control name_input">
                  <div class="clear"></div>
                  <div class="name" style="margin-top:30px">
                  <input type="submit" class="btn btn-primary btn-lg" name="register" value="Submit"/>
                  </div>
                  <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!--end-->

</div>
<div class="row custom-row">
<div class="col-md-12 heading">
    <h3 class="col-md-2 offset-md-10">Forgot Username</h3>
</div>
<!-- Nav tabs -->
<!-- Tab panes -->
<div class="tab-content  steps">
    <div class="clearfix"></div>
    <div  class="messag1" id="message" style="display:inline; margin-left:16%;"> <font color='red'><?php echo $this->session->flashdata('errormsg1'); ?></font> <font color='green'><?php echo $this->session->flashdata('successmsg1'); ?></font> <br class="clear" /></div>
    <form role="form" method="post" action="<?php echo base_url();?><?php echo $this->router->class?>/forget_user_password/username">
        <div class="col-md-10  col-sm-10 col-xs-12 name_fed">
            <div class="">
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="Email">Email:</label>
                    <div class="col-sm-10 col-md-7">
                        <input type="text" placeholder="Email" name="email" id="email" class="form-control name_input">
                  <div class="clear"></div>
                  <div class="name" style="margin-top:30px">
                  <input type="submit" class="btn btn-primary btn-lg" name="register"  value="Submit"/>
                  </div>
                  <div class="clear"></div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!--end-->

</div>
<!--end-->
</div>
<!-- <script type="text/javascript">
    $(document).ready(function() {
        $("#input_particular").on("click", function() {
            $("#select_type").removeClass('active');
            $("#input_particular").addClass('active');
        });        
        $(document).on( 'shown.bs.tab', 'a[data-toggle="tab"]', function (e) {
           console.log(e.target) // activated tab
        });
    });
</script> -->