<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="<?php echo base_url(); ?>assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css"/>

<!-- BEGIN PAGE HEADER-->
<div class="row">
  <div class="col-md-12"> 
    <!-- BEGIN PAGE TITLE & BREADCRUMB-->
    <h3 class="page-title"> Causes </h3>
    <ul class="page-breadcrumb breadcrumb">
      <!--<li class="btn-group"> <a href="<?php echo base_url().$this->router->class ?>/add_tag" class="btn blue dropdown-toggle"> <span> Add tag </span> </a> </li>-->
      <li> <i class="fa fa-home"></i> <a href="<?php echo base_url(); ?>"> Home </a> <i class="fa fa-angle-right"></i> </li>
      <li> <a href="javascript:void(0);"> Manage Causes </a> </li>
    </ul>
    <!-- END PAGE TITLE & BREADCRUMB--> 
  </div>
</div>
<!-- END PAGE HEADER--> 
<!-- BEGIN PAGE CONTENT-->
<div class="row">
  <div class="col-md-12">
    <div class="tabbable tabbable-custom tabbable-full-width">
      <ul class="nav nav-tabs">
        <li class="active"> <a data-toggle="tab" href="#tab_1_5"> Manage Causes </a> </li>
      </ul>
	   <div id="message"> <font color='red'><?php echo $this->session->flashdata('errormsg'); ?></font> <font color='green'><?php echo $this->session->flashdata('successmsg'); ?></font> </div>
      <div class="tab-content"> 
        
        <!--end tab-pane-->
        <div id="tab_1_5" >
          <div class="row search-form-default">
            <div class="col-md-12">
              <?php $search=$this->input->get("search"); ?>
              <form class="form-inline" action="<?php echo base_url().$this->router->class;?>/manage_cause/" id="search">
                <div class="input-group">
                  <div class="input-cont">
                    <input type="text" placeholder="Search..." class="form-control"  name="search"  value="<?php echo ($search!='' && $search!='search')?$search:''; ?>"/>
                  </div>
                  <span class="input-group-btn">
                  <button type="button" class="btn green" onclick="document.getElementById('search').submit()"> Search &nbsp; <i class="m-icon-swapright m-icon-white"></i> </button>
                  </span> </div>
              </form>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-striped table-bordered table-advance table-hover">
              <thead>
                <tr>
                  <th> Title </th>
				  <th> Time Left </th>
				  <th> Creater</th>
				  <th> Type</th>	
				  <th> Status</th>	
				  <th> Created on </th>
				  <th> Featured</th>	
                  <th> Stories of hope</th>	
				<!--<th>Status </th>-->
				  <th> Action </th>
                </tr>
              </thead>
              <tbody>
                <?php 
				
				if(count($resultset) > 0) {
					$status='';$type1='';$type2='';
					foreach($resultset as $key => $val){
					
					$temp = array();
					$type='';
					($val["is_fundraise"] == 1) ? $temp[] = 'Fundraising' :'';
					($val["is_petition"] == 1) ? $temp[] = 'Pledge' :'';
					($val["is_volunteer"] == 1) ? $temp[] = 'Volunteer' :'';
					$type = implode(', ',$temp);	
					/*if($val["end_time"] <= time() && $val['status'] <>2){
						$status='<span style="color:red;">Expired</span>';
					}
					else
					($val["is_fundraise"] == 1) ? (list($type1) = array('Fundraising')) :(list($type1) = array(NULL));
					($val["is_petition"] == 1) ? (list($type2) = array('Pledge')) :(list($type2) = array(NULL));
					($val["is_volunteer"] == 1) ? (list($type3) = array('Volunteer')) :(list($type3) = array(NULL));
					*/
					if($val['status'] == '1')
					{
						$status='<span style="color:red;">Pending</span>';
					}
					else if($val['status'] == '2')
					{
						$status='<span style="color:green;">Approved</span>';
					}
					else if($val['status'] == '3')
					{
						$status='<span style="color:black;">Closed</span>';
					}
					else if($val['status'] == '5')
					{
						$status='<span style="color:green;">Completed</span>';
					}
					$closetime = $val['activated_time'] + ($val['duration']*24*60*60); 
				?>
				
				<tr>
                  <td><?php echo strlen($val['title']) > 35 ? substr(ucfirst($val['title']), 0,35).".." : ucfirst($val['title']); ?></td>
				  <td> <span data-time="<?php echo !empty($closetime) ? $closetime : "";?>" class="kkcount-down timer"></span></td>
				   <td><?php echo $this->common->get_user_name($val['user_id'],$val['user_type']);?></td>
				   <td><?php echo $type;?></td>
				   <td><?php echo $status;?></td>
                  <td><?php echo date('m-d-Y',$val['created_time']);?></td>
				  
				   <td><?php if($val['featured'] == '1'){ ?>
                    <span class="label label-sm "> <a href="<?php echo base_url().$this->router->class;?>/enable_disable_featured/<?php echo $val['id'];?>/0" onclick="return dis_featured('<?php echo $item?>');"><img src="<?php echo base_url()?>images/enabled.gif" /> </a></span>
                    <?php }else{ ?>
                    <span class="label label-sm "> <a href="<?php echo base_url().$this->router->class;?>/enable_disable_featured/<?php echo $val['id'];?>/1" onclick="return enb_featured('<?php echo $item?>');"><img src="<?php echo base_url()?>images/disabled.gif" /></a> </span>
                    <?php } ?></td>
					
                    <td><?php if($val['stories_of_hope'] == '1'){ ?>
                    <span class="label label-sm "> <a href="<?php echo base_url().$this->router->class;?>/enable_disable_hope/<?php echo $val['id'];?>/0" onclick="return dis_hope('<?php echo $item?>');"><img src="<?php echo base_url()?>images/enabled.gif" /></a> </span>
                    <?php }else{ ?>
                    <span class="label label-sm "> <a href="<?php echo base_url().$this->router->class;?>/enable_disable_hope/<?php echo $val['id'];?>/1" onclick="return enb_hope('<?php echo $item?>');"> <img src="<?php echo base_url()?>images/disabled.gif" /></a></span>
                    <?php } ?></td>
					
                     <td>
                     <a class="javascript:void(0)" href="<?php echo base_url().$this->router->class; ?>/view_cause/<?php echo $val['id'];?>"> <i class="fa fa-search fonta"></i> </a> 
                     <a class="javascript:void(0)" href="<?php echo base_url().$this->router->class; ?>/archive_cause/<?php echo $val['id'];?>" onclick="return archive_tag();">
                     <img src="<?php echo base_url()?>images/disabled.gif" /></i></a> 
                    <!-- <a class="javascript:void(0)" href="../cause/<?php echo base_url().$this->router->class; ?>/edit_tag/<?php echo $val['id'];?>"><i class="fa fa-edit fonta"></i></a>--></td>
                </tr>
                                                 
                <?php }}else{?>
                <tr class="scndrow">
                  <td colspan="9" align="center">No record found</td>
                </tr>
                <?php }?>
              </tbody>
            </table>
          </div>
          <div class="margin-top-20">
          	<ul class="pagination">
            <?php echo $this->pagination->create_links();?>
            </ul>
          </div>
        </div>
        <!--end tab-pane--> 
      </div>
    </div>
  </div>
  <!--end tabbable--> 
</div>
<!-- END PAGE CONTENT--> 

 
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/jquery.blockui.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/jquery.cokie.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script> 
<!-- END CORE PLUGINS --> 
<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> 
<script src="<?php echo base_url(); ?>assets/plugins/fancybox/source/jquery.fancybox.pack.js"></script> 
<script src="<?php echo base_url(); ?>assets/scripts/core/app.js"></script> 
<script src="<?php echo base_url(); ?>assets/scripts/custom/search.js"></script> 

<script src="<?php echo base_url();?>js/countdown/kkcountdown.js"></script>
<script src="<?php echo base_url();?>js/countdown/kkcountdown.min.js"></script>
<script>
jQuery(document).ready(function() {    
   App.init();
   Search.init();
});


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
	
function dis_featured()
{
	if(confirm("Are you sure you want to disable?"))
	{
		return true;
	}
	else
	{
		return false;	
	}	
}

function enb_featured()
{
	
	if(confirm("Are you sure you want to enable?"))
	{
		return true;
	}
	else
	{
		return false;	
	}	
}

function archive_tag()
{
	
	if(confirm("Are you sure you want to archive?"))
	{
		return true;
	}
	else
	{
		return false;	
	}	
}

function dis_hope()
{
	if(confirm("Are you sure you want to disable?"))
	{
		return true;
	}
	else
	{
		return false;	
	}	
}

function enb_hope()
{
	
	if(confirm("Are you sure you want to enable?"))
	{
		return true;
	}
	else
	{
		return false;	
	}	
}
</script>