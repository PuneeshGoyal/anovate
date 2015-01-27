<div class="page-sidebar-wrapper">
  <div class="page-sidebar navbar-collapse collapse"> 
    <!-- add "navbar-no-scroll" class to disable the scrolling of the sidebar menu --> 
    <!-- BEGIN SIDEBAR MENU -->
    <ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
      <li class="sidebar-toggler-wrapper"> 
        <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        <div class="sidebar-toggler hidden-phone"> </div>
        <!-- BEGIN SIDEBAR TOGGLER BUTTON --> 
      </li>
      <li class="sidebar-search-wrapper"> 
        <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
        <?php /*?><form class="sidebar-search" action="extra_search.html" method="POST">
          <div class="form-container">
            <div class="input-box"> <a href="javascript:;" class="remove"> </a>
              <input type="text" placeholder="Search..."/>
              <input type="button" class="submit" value=" "/>
            </div>
          </div>
        </form><?php */?><br />
        <!-- END RESPONSIVE QUICK SEARCH FORM --> 
      </li>
      <li class="start active "> <a href="<?php echo base_url(); ?>"> <i class="fa fa-home"></i> <span class="title"> Dashboard </span> </a> </li>
      <li> <a href="<?php echo base_url(); ?>tag/manage_tag"> <i class="fa fa-user"></i> <span class="title"> Tags </span><span class=""></span> <span class="arrow "> </span> </a></li>
      <li> <a href="<?php echo base_url(); ?>start_cause/manage_cause/"> <i class="fa fa-user"></i> <span class="title"> Manage cause </span><span class=""></span> <span class="arrow "> </span> </a></li>
      <li> <a href="<?php echo base_url(); ?>pets/manage_pets/"> <i class="fa fa-user"></i> <span class="title"> Manage pet listing </span><span class=""></span> <span class="arrow "> </span> </a></li>
	  <li> <a href="<?php echo base_url(); ?>banners/manage_banners/"> <i class="fa fa-user"></i> <span class="title"> Manage banners </span><span class=""></span> <span class="arrow "> </span> </a>
      <li> <a href="<?php echo base_url(); ?>informations/manage_information"> <i class="fa fa-user"></i> <span class="title"> Manage information </span><span class=""></span> <span class="arrow "> </span> </a>
      <li> <a href="<?php echo base_url(); ?>animal_breeds/manage_breed"> <i class="fa fa-user"></i> <span class="title"> Manage Breeds </span><span class=""></span> <span class="arrow "> </span> </a>
      </li>
    </ul>
    <!-- END SIDEBAR MENU --> 
  </div>
</div>
