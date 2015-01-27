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
    <h3 class="page-title"> Tags </h3>
    <ul class="page-breadcrumb breadcrumb">
      <li class="btn-group"> <a href="<?php echo base_url().$this->router->class ?>/add_tag" class="btn blue dropdown-toggle"> <span> Add tag </span> </a> </li>
      <li> <i class="fa fa-home"></i> <a href="<?php echo base_url(); ?>"> Home </a> <i class="fa fa-angle-right"></i> </li>
      <li> <a href="javascript:void(0);"> Manage Tags </a> </li>
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
        <li class="active"> <a data-toggle="tab" href="#tab_1_5"> Manage Tags </a> </li>
      </ul>
	   <div id="message"> <font color='red'><?php echo $this->session->flashdata('errormsg'); ?></font> <font color='green'><?php echo $this->session->flashdata('successmsg'); ?></font> </div>
      <div class="tab-content"> 
        
        <!--end tab-pane-->
        <div id="tab_1_5" >
          <div class="row search-form-default">
            <div class="col-md-12">
              <?php $search=$this->input->get("search"); ?>
              <form class="form-inline" action="<?php echo base_url();?>tag/manage_tag/" id="search">
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
                  <th> Name </th>
                  <th> Created on </th>
					<th>Status </th>
					<th> Action </th>
                </tr>
              </thead>
              <tbody>
                <?php if(count($resultset) > 0) {
					foreach($resultset as $key => $val){
						
				?>
				
				<tr>
                  <td><?php echo $val['tag'];?></td>
                  <td><?php echo date('m-d-Y',$val['created_time']);?></td>
				   <td><?php if($val['status'] == '1'){ ?>
                    <span class="label label-sm label-success"> <a href="<?php echo base_url().$this->router->class;?>/enable_disable_tag/<?php echo $val['tagid'];?>/0" onclick="return dis_fun('<?php echo $item?>');">Inactive</a> </span>
                    <?php }else{ ?>
                    <span class="label label-sm label-success"> <a href="<?php echo base_url().$this->router->class;?>/enable_disable_tag/<?php echo $val['tagid'];?>/1" onclick="return enb_fun('<?php echo $item?>');">Active</a> </span>
                    <?php } ?></td>
                    
                     <td>
                     <!-- <a class="javascript:void(0)" href="<?php echo base_url().$this->router->class; ?>/view_tag/<?php echo $val['tagid'];?>"> <i class="fa fa-search fonta"></i> </a> -->
                     <a class="javascript:void(0)" href="<?php echo base_url().$this->router->class;?>/archive_tag/<?php echo $val['tagid'];?>" onclick="return archive_fun('<?php echo $item?>');"><i class="fa fa-times fonta"></i></a> 
                     <a class="javascript:void(0)" href="<?php echo base_url().$this->router->class; ?>/edit_tag/<?php echo $val['tagid'];?>"><i class="fa fa-edit fonta"></i></a></td>

                </tr>
                                                 
                <?php }}else{?>
                <tr class="scndrow">
                  <td colspan="6" align="center">No record found</td>
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
<script>
jQuery(document).ready(function() {    
   App.init();
   Search.init();
});
</script>