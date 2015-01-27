  <!-- BEGIN CONTENT -->
      <div class="row">
        <div class="col-md-12"> 
          <!-- BEGIN PAGE TITLE & BREADCRUMB-->
          <h3 class="page-title"> Dashboard <small>statistics and more</small> </h3>
          <ul class="page-breadcrumb breadcrumb">
            <li> <i class="fa fa-home"></i> <a href="<?php echo base_url(); ?>"> Home </a> <i class="fa fa-angle-right"></i> </li>
            <li> <a href="<?php echo base_url(); ?>user/dashboard"> Dashboard </a> </li>
            <li class="pull-right">
              <div id="dashboard-report-range" class="dashboard-date-range tooltips" data-placement="top" data-original-title="Change dashboard date range"> <i class="fa fa-calendar"></i> <span> </span> <i class="fa fa-angle-down"></i> </div>
            </li>
          </ul>
          <!-- END PAGE TITLE & BREADCRUMB--> 
        </div>
      </div>
      <!-- END PAGE HEADER--> 
      <!-- BEGIN DASHBOARD STATS -->
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="dashboard-stat blue">
            <div class="visual"> <i class="fa fa-comments"></i> </div>
            <div class="details">
              <div class="number"> <?php echo $this->common->total_meeting_attended(); ?> </div>
              <div class="desc"> Meeting attended </div>
            </div>
            <a class="more" href="<?php echo base_url(); ?>meetings/manage_meeting"> View more <i class="m-icon-swapright m-icon-white"></i> </a> </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="dashboard-stat green">
            <div class="visual"> <i class="fa fa-shopping-cart"></i> </div>
            <div class="details">
              <div class="number"> <?php echo $this->common->total_training_attended(); ?> </div>
              <div class="desc"> Training attended </div>
            </div>
            <a class="more" href="#"> View more <i class="m-icon-swapright m-icon-white"></i> </a> </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="dashboard-stat purple">
            <div class="visual"> <i class="fa fa-globe"></i> </div>
            <div class="details">
              <div class="number"> <?php echo $this->common->total_event_attended_hours(); ?> </div>
              <div class="desc"> Hours Volunteered </div>
            </div>
            <a class="more" href="<?php echo base_url(); ?>events/manage_event"> View more <i class="m-icon-swapright m-icon-white"></i> </a> </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="dashboard-stat yellow">
            <div class="visual"> <i class="fa fa-bar-chart-o"></i> </div>
            <div class="details">
              <div class="number"> <?php echo $this->common->total_event_attended(); ?> </div>
              <div class="desc"> Events attended </div>
            </div>
            <a class="more" href="<?php echo base_url(); ?>events/manage_event"> View more <i class="m-icon-swapright m-icon-white"></i> </a> </div>
        </div>
      </div>
      <!-- END DASHBOARD STATS -->
      <div class="clearfix"> </div>
      <div class="clearfix"> </div>
      <div class="row ">
        <div class="col-md-6 col-sm-6">
          <div class="portlet box blue">
            <div class="portlet-title">
              <div class="caption"> <i class="fa fa-bell-o"></i>Recent Activities </div>
              <div class="actions">
               <div class="btn-group">
                <form method="post" action="<?php echo base_url(); ?>user/dashboard" id="sort_activity" name="sort_activity" >
                <select class="form-control" name="sort" onchange="document.sort_activity.submit();">
                    <option value="" <?php if($sort == ""){echo 'selected="selected"';} ?>>Filter By</option>
                    <option value="events" <?php if($sort == "events"){echo 'selected="selected"';} ?>>Events</option>
                    <option value="meetings" <?php if($sort == "meetings"){echo 'selected="selected"';} ?>>Meetings</option>
                    <option value="volunteer" <?php if($sort == "volunteer"){echo 'selected="selected"';} ?>>Volunteer</option>
                    <option value="promotions" <?php if($sort == "promotions"){echo 'selected="selected"';} ?>>Promotion</option>
                    <option value="re_allocation_requests" <?php if($sort == "re_allocation_requests"){echo 'selected="selected"';} ?>>Re-allocation Requests</option>
                </select>
                </form>
                </div>
              </div>
            </div>
            <div class="portlet-body">
              <div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">
                <ul class="feeds">
                <?php if(!empty($userdata)){ foreach($userdata as $k => $v){ 
					if($sort == "events"){ 
				 ?>
                  <li>
                    <div class="col1">
                      <div class="cont">
                        <div class="cont-col1">
                          <div class="label label-sm label-danger"> <i class="fa fa-bar-chart-o"></i> </div>
                        </div>
                        <div class="cont-col2">
                          <div class="desc"> You attended an event &ldquo;<?php echo $v['event_name'] ?>&rdquo; at &ldquo;<?php echo $v['location'] ?>&rdquo; </div>
                        </div>
                      </div>
                    </div>
                    <div class="col2">
                      <div class="date"> <?php echo $this->common->convert_time_days($v['time']); ?> </div>
                    </div>
                  </li>
			 <?php }  else if($sort == "meetings" && $v['meeting_date'] <> "-1" ){ ?>
                <li> <a href="<?php echo  $page_url; ?>">
                  <div class="col1">
                    <div class="cont">
                      <div class="cont-col1">
                        <div class="label label-sm label-default"> <i class="fa fa-briefcase"></i> </div>
                      </div>
                      <div class="cont-col2">
                        <div class="desc"> Meeting &ldquo;<?php echo $v['name'] ?>&rdquo; created by &ldquo;<?php echo $v['created_by']; ?>&rdquo; Meeting date <?php echo date("d-M-Y", $v['meeting_date']); ?> </div>
                      </div>
                    </div>
                  </div>
                  <div class="col2">
                    <div class="date"> <?php echo $this->common->convert_time_days($v['time']); ?> </div>
                  </div>
                  </a>
               </li>
            <?php } ?>
            <?php } }?>
                  <li> <a href="#">
                    <div class="col1">
                      <div class="cont">
                        <div class="cont-col1">
                          <div class="label label-sm label-success"> <i class="fa fa-bar-chart-o"></i> </div>
                        </div>
                        <div class="cont-col2">
                          <div class="desc"> Finance Report for year 2013 has been released. </div>
                        </div>
                      </div>
                    </div>
                    <div class="col2">
                      <div class="date"> 20 mins </div>
                    </div>
                    </a> </li>
                  <li>
                    <div class="col1">
                      <div class="cont">
                        <div class="cont-col1">
                          <div class="label label-sm label-danger"> <i class="fa fa-user"></i> </div>
                        </div>
                        <div class="cont-col2">
                          <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                        </div>
                      </div>
                    </div>
                    <div class="col2">
                      <div class="date"> 24 mins </div>
                    </div>
                  </li>
                  <li>
                    <div class="col1">
                      <div class="cont">
                        <div class="cont-col1">
                          <div class="label label-sm label-info"> <i class="fa fa-shopping-cart"></i> </div>
                        </div>
                        <div class="cont-col2">
                          <div class="desc"> New order received with <span class="label label-sm label-success"> Reference Number: DR23923 </span> </div>
                        </div>
                      </div>
                    </div>
                    <div class="col2">
                      <div class="date"> 30 mins </div>
                    </div>
                  </li>
                  <li>
                    <div class="col1">
                      <div class="cont">
                        <div class="cont-col1">
                          <div class="label label-sm label-success"> <i class="fa fa-user"></i> </div>
                        </div>
                        <div class="cont-col2">
                          <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                        </div>
                      </div>
                    </div>
                    <div class="col2">
                      <div class="date"> 24 mins </div>
                    </div>
                  </li>
                  <li>
                    <div class="col1">
                      <div class="cont">
                        <div class="cont-col1">
                          <div class="label label-sm label-default"> <i class="fa fa-bell-o"></i> </div>
                        </div>
                        <div class="cont-col2">
                          <div class="desc"> Web server hardware needs to be upgraded. <span class="label label-sm label-default "> Overdue </span> </div>
                        </div>
                      </div>
                    </div>
                    <div class="col2">
                      <div class="date"> 2 hours </div>
                    </div>
                  </li>
                  <li> <a href="#">
                    <div class="col1">
                      <div class="cont">
                        <div class="cont-col1">
                          <div class="label label-sm label-default"> <i class="fa fa-briefcase"></i> </div>
                        </div>
                        <div class="cont-col2">
                          <div class="desc"> IPO Report for year 2013 has been released. </div>
                        </div>
                      </div>
                    </div>
                    <div class="col2">
                      <div class="date"> 20 mins </div>
                    </div>
                    </a> </li>
                  <li>
                    <div class="col1">
                      <div class="cont">
                        <div class="cont-col1">
                          <div class="label label-sm label-info"> <i class="fa fa-check"></i> </div>
                        </div>
                        <div class="cont-col2">
                          <div class="desc"> You have 4 pending tasks. <span class="label label-sm label-warning "> Take action <i class="fa fa-share"></i> </span> </div>
                        </div>
                      </div>
                    </div>
                    <div class="col2">
                      <div class="date"> Just now </div>
                    </div>
                  </li>
                  <li> <a href="#">
                    <div class="col1">
                      <div class="cont">
                        <div class="cont-col1">
                          <div class="label label-sm label-danger"> <i class="fa fa-bar-chart-o"></i> </div>
                        </div>
                        <div class="cont-col2">
                          <div class="desc"> Finance Report for year 2013 has been released. </div>
                        </div>
                      </div>
                    </div>
                    <div class="col2">
                      <div class="date"> 20 mins </div>
                    </div>
                    </a> </li>
                  <li>
                    <div class="col1">
                      <div class="cont">
                        <div class="cont-col1">
                          <div class="label label-sm label-default"> <i class="fa fa-user"></i> </div>
                        </div>
                        <div class="cont-col2">
                          <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                        </div>
                      </div>
                    </div>
                    <div class="col2">
                      <div class="date"> 24 mins </div>
                    </div>
                  </li>
                  <li>
                    <div class="col1">
                      <div class="cont">
                        <div class="cont-col1">
                          <div class="label label-sm label-info"> <i class="fa fa-shopping-cart"></i> </div>
                        </div>
                        <div class="cont-col2">
                          <div class="desc"> New order received with <span class="label label-sm label-success"> Reference Number: DR23923 </span> </div>
                        </div>
                      </div>
                    </div>
                    <div class="col2">
                      <div class="date"> 30 mins </div>
                    </div>
                  </li>
                  <li>
                    <div class="col1">
                      <div class="cont">
                        <div class="cont-col1">
                          <div class="label label-sm label-success"> <i class="fa fa-user"></i> </div>
                        </div>
                        <div class="cont-col2">
                          <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                        </div>
                      </div>
                    </div>
                    <div class="col2">
                      <div class="date"> 24 mins </div>
                    </div>
                  </li>
                  <li>
                    <div class="col1">
                      <div class="cont">
                        <div class="cont-col1">
                          <div class="label label-sm label-warning"> <i class="fa fa-bell-o"></i> </div>
                        </div>
                        <div class="cont-col2">
                          <div class="desc"> Web server hardware needs to be upgraded. <span class="label label-sm label-default "> Overdue </span> </div>
                        </div>
                      </div>
                    </div>
                    <div class="col2">
                      <div class="date"> 2 hours </div>
                    </div>
                  </li>
                  <li> <a href="#">
                    <div class="col1">
                      <div class="cont">
                        <div class="cont-col1">
                          <div class="label label-sm label-info"> <i class="fa fa-briefcase"></i> </div>
                        </div>
                        <div class="cont-col2">
                          <div class="desc"> IPO Report for year 2013 has been released. </div>
                        </div>
                      </div>
                    </div>
                    <div class="col2">
                      <div class="date"> 20 mins </div>
                    </div>
                    </a> </li>
                </ul>
              </div>
              <!--<div class="scroller-footer">
                <div class="pull-right"> <a href="#"> See All Records <i class="m-icon-swapright m-icon-gray"></i> </a> &nbsp; </div>
              </div>-->
            </div>
          </div>
        </div>
        <div class="col-md-6 col-sm-6"> 
          <!-- BEGIN PORTLET-->
          <div class="portlet box blue calendar">
            <div class="portlet-title">
              <div class="caption"> <i class="fa fa-calendar"></i>Calendar </div>
            </div>
            <div class="portlet-body light-grey">
              <div id="calendar"> </div>
            </div>
          </div>
          <!-- END PORTLET--> 
        </div>
      </div>
<!-- END FOOTER --> 
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) --> 
<!-- BEGIN CORE PLUGINS --> 
<!--[if lt IE 9]>
<script src="<?php echo base_url(); ?>assets/admin/plugins/respond.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/excanvas.min.js"></script> 
<![endif]--> 
<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery-1.10.2.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script> 
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip --> 
<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> 
<script src=<?php echo base_url(); ?>"assets/admin/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery.blockui.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/admin/plugins/jquery.cokie.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/admin/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script> 
<!-- END CORE PLUGINS --> 

<!-- BEGIN PAGE LEVEL SCRIPTS --> 
<script src="<?php echo base_url(); ?>assets/admin/plugins/fullcalendar/fullcalendar/fullcalendar.min.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/admin/scripts/core/app.js" type="text/javascript"></script> 
<script src="<?php echo base_url(); ?>assets/admin/scripts/custom/calendar.js"></script> 
<script src="<?php echo base_url(); ?>assets/admin/scripts/custom/index.js" type="text/javascript"></script> 
<!-- END PAGE LEVEL SCRIPTS --> 

<script>
jQuery(document).ready(function() {    
   App.init(); // initlayout and core plugins
 
 Index.initCalendar();
});
</script> 
