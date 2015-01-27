<!--mid area-->
<style>.modal-open{overflow-x:auto !important;}
#Manage .list_donor button {
  float: right;
}

</style>

<div class="container"> 
  <!-- Ist row-->
  <div class="row custom-row top_custm_hdng">
    <div class="clearfix"></div>
    <div class="col-md-12 account_heading">
      <h3 class="col-md-2 offset-md-10">Account</h3>
    </div>
  </div>
  <div class="row accnt_parah">
    <div class="col-md-9 detail">
      <p><?php echo $data_user['name'];?></p>
    </div>
    <!--<div class="col-md-3 rewards"> <span>Rewards points:</span> <font>2000</font> </div>--> 
  </div>
  <!--end-->
  <div id="message"> <font color='red'><?php echo $this->session->flashdata('errormsg'); ?></font> <font color='green'><?php echo $this->session->flashdata('successmsg'); ?></font> </div>
  <div class="row main_content_row">
    <div id="content">
      <ul id="tabs" class="nav nav-tabs acc_custom_nav_tabs" data-tabs="tabs">
        <li><a href="<?php echo base_url();?>accounts/particulars">Particular</a></li>
        <li class="active"><a href="<?php echo base_url();?>accounts/manage_causes">Manage Your Causes</a></li>
        <li><a href="<?php echo base_url();?>pets/manage_pets" >Manage Your Pet Listing</a></li>
        <!-- <li><a href="<?php// echo base_url();?>accounts/appointments" data-toggle="tab">Appointments</a></li>
        <li><a href="<?php// echo base_url();?>accounts/hostory">History</a></li>-->
      </ul>
      <div id="my-tab-content" class="tab-content"> 
        <!-- Manage Causes -->
        <div class="tab-pane active" id="Manage"> 
          <!--<div class="row checkfields">
            <div class="form-group filter_by">
              <label class="col-sm-1 control-label">Filter by:</label>
            </div>
            <div class="input-group checkboxes">
              <label>All</label>
              <input type="checkbox" id="ckbCheckAll1" />
            </div>
            <div class="input-group checkboxes">
              <label>Fundraising :</label>
              <input type="checkbox" class="checkBoxClass1"/>
            </div>
            <div class="input-group checkboxes">
              <label>Volunteer :</label>
              <input type="checkbox" class="checkBoxClass1"/>
            </div>
            <div class="input-group checkboxes">
              <label>Peition :</label>
              <input type="checkbox" class="checkBoxClass1"/>
            </div>
            <div class="input-group checkboxes">
              <label>Pet adoption :</label>
              <input type="checkbox" class="checkBoxClass1"/>
            </div>
          </div>-->
          <div class="table-responsive custom_table">
            <table class="button_styles table manage_table appointment_table table-condensed table-striped table-bordered table-hover no-margin">
              <thead>
                <tr >
                  <th width="9%">Sr. No.</th>
                  <th width="20%">Cause Title</th>
                  <th width="5%">Status</th>
                  <th width="28%">Type</th>
                  <th width="10%">Time Left</th>
                  <!--<th width="10%">Petition Time</th>-->
                  <td width="20%">
                 
                  <form data-toggle="tooltip" data-placement="right" title="Filter records" action="<?php echo  base_url();?>accounts/manage_causes/" method="get" id="search" name="filter" onchange="this.form.submit()">
                      <select class="selectpicker show-menu-arrow"  name="filter" onchange="this.form.submit()">
                        <option value="">Select Status</option>
                        <option value="approved" <?php if($_GET['filter']=='approved'){echo "selected=selected";}?>>Approved</option>
                        <option value="pending" <?php if($_GET['filter']=='pending'){echo "selected=selected";}?>>Pending</option>
                        <option value="close" <?php if($_GET['filter']=='close'){echo "selected=selected";}?>>Close</option>
                      </select>
                    </form>
                   
                    </td>
                </tr>
              </thead>
              <tbody>
                <!--<input  data-toggle="modal" data-target="#myModal11" type="button" value="Peition" class="popup_button"/>
                  <input data-toggle="modal" data-target="#myModal12" type="button" value="Volunteer" class="popup_button"/>-->
                <?php 
				 
				 $link='';$is_fundraise='';
				 if(count($resultdata) > 0){
				 $i=1;
				 foreach($resultdata as $key=>$val){
				 $closetime = $val['activated_time'] + ($val['duration']*24*60*60);
				 $petition_closetime = $val['activated_time'] + ($val['petition_duration']*24*60*60);
				
				($val["is_fundraise"] == 1) ? (list($link1, $is_fundraise) = array(base_url().'accounts/cause_fundrasing/'.$val['slug'], '<a rel="tooltip" data-placement="right" title="Click here to see more information" class="popup_button" style="text-decoration:none;" data-toggle="modal"  href='.base_url().'accounts/cause_fundrasing/'.$val['slug'].' data-target="#myModal10">Fundraising </a>')) :(list($link1, $is_fundraise) = array(NULL, NULL));
				($val["is_petition"] == 1) ? (list($link2, $is_petition) = array(base_url().'accounts/cause_petition/'.$val['slug'], '<a rel="tooltip" data-placement="right" title="Click here to see more information" class="popup_button" style="text-decoration:none;" data-toggle="modal"  href='.base_url().'accounts/cause_petition/'.$val['slug'].' data-target="#myModal11">Pledge</a>')) :(list($link2, $is_petition) = array(NULL, NULL));
				($val["is_volunteer"] == 1) ? (list($link2, $is_volunteer) = array(base_url().'accounts/cause_volunteer/'.$val['slug'], '<a rel="tooltip" data-placement="right" title="Click here to see more information" class="popup_button" style="text-decoration:none;" data-toggle="modal"  href='.base_url().'accounts/cause_volunteer/'.$val['slug'].' data-target="#myModal12">Volunteer</a>')) :(list($link2, $is_volunteer) = array(NULL, NULL));
				 ?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td ><span data-toggle="tooltip" data-placement="right" title="<?php echo ucfirst($val['title']);?>"><?php echo strlen($val['title']) > 25 ? substr(ucfirst($val['title']), 0,25).".." : ucfirst($val['title']); ?></span></td>
                  <td>
				  <?php 
					  if($val['status']==1){ echo "<span style='color:red;'>Pending</span>"; }
					  else if($val['status']==2){ echo "<span style='color:green;'>Approved</span>"; }
					  else if($val['status']==3){ echo "<span style='color:black;'>Closed</span>"; }?></td>
                  <td align="left"><?php 
				  echo $is_fundraise;
				  echo $is_petition;
				  echo $is_volunteer;
				  ?></td>
                  <td>
                    <span data-time="<?php echo $closetime;?>" class="kkcount-down"></span>
                    </td>
                  
                  <td><!-- <input type="checkbox" class="checkbox"  name="chk[]" value="<?php echo $val['id'];?>"/> -->
                 <div class="input-group-btn">
                     <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Action <!--<span class="caret"></span>--></button>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                          
                          <li><?php if(($val['status']==1) ){?>
                            <button type="button" value="Edit" class="btn btn-primary" onclick="window.location.href = '<?php echo base_url();?>start_cause/edit_cause/<?php echo $val['slug'];?>'"/><span class="glyphicon glyphicon-edit"></span>Edit</button>
                            <?php }else {?>
                            <button type="button" value="Edit" class="cannot_edit btn btn-primary"  /><span class="glyphicon glyphicon-edit">Edit</span></button>
                            <?php }?>
                   		 </li>
                         
                          <li>
                          <?php 
						  if($val['status']==1){?>
                          <button type="button" id="<?php echo $val['id'];?>" value="Close" class="can_close btn btn-primary" /><span class="glyphicon glyphicon-ban-circle"></span>Close</button>
                          <?php }else if($val['status']<>3 && $val['status'] <> 1){?>
                         <!--onclick="alert_text1('close','<?php echo $val['id'];?>');"--> 
                         <button type="button" id="<?php echo $val['id'];?>" value="Close" class="can_close btn btn-primary" /><span class="glyphicon glyphicon-ban-circle"></span>Close</button>
                         <?php  }else{?>
                         <button type="button" value="Closed" class="btn btn-primary" /><span class="glyphicon glyphicon-ban-circle"></span>Closed</button>
                         <?php }?>
                          </li>
                          
                         <!--<li>
							<?php if($val['status']==2){?>
                            <button type="button" value="Delete" class="cannot_delete btn btn-primary" /><span class="glyphicon glyphicon-trash"></span>Delete</button>
                            <?php }else {?>
                            <button type="button" id="<?php echo $val['id'];?>" value="Delete" class="can_delete btn btn-primary" /><span class="glyphicon glyphicon-trash"></span>Delete</button>
							<?php }?>
                          </li>-->
                          
                        </ul>
                      </div><!--/btn-group -->
                   </td>
                </tr>
                
                <?php $i++;} }
					else
					{?>
                    <tr>
                      <td colspan="7"><span style="color:red;">No Record Found</span></td>
                    </tr>
                    <?php }
					?>
              </tbody>
            </table>
           
          </div>
          <div class="row">
            <div class="col-md-5">
              <div class="bs-example">
                <ul class="pagination custom_pagination">
                  <?php echo $this->pagination->create_links(); ?>
                </ul>
              </div>
            </div>
            <div class="col-md-7 list_donor"> 
              <!-- <input data-toggle="modal" data-target="#myModal11" type="button" value="List of Donors" class="add list"/>-->
               <button data-toggle="tooltip" data-placement="left" title="Start a new cause!" class="btn btn-primary" type="button" onclick="window.location.href = '<?php echo base_url();?>start_cause/'">Add new</button>
              <!--<input type="button" value="Add new" class="add" style="margin-right:10px;" onclick="window.location.href = '<?php echo base_url();?>start_cause/'"/>-->
            </div>
          </div>
          <!--           <div class="row">
            <div class="col-md-offset-8 col-md-4 col-xs-12 del_change_bttn">
            
            </div> --> 
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!--end--> 
<!--Modal-10(CAUSE4 - DONATION PAYMENT WINDOW) -->

<div class="modal fade" id="myModal10" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content"> 
   
      <!-- content body goes here --> 
    </div>
  </div>
</div>

<!--Modal-end--> 
<!--Modal-11(Project sparkle - Petition progress) -->
<div class="modal fade mnt_sparkle" id="myModal11" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content"> 
    <div id="modal_data_preview" style="display:none;top: 20%;left: 31%; font-size:34px;">Please wait.................</div>
    </div>
  </div>
</div>


<!--Modal-end--> 
<!--Modal-12(Project sparkle - Volunteer progress) -->
<div class="modal fade mnt_sparkle" id="myModal12" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div id="modal_data_preview" style="display:none;top: 20%;left: 31%; font-size:34px;">Please wait.................</div>
    </div>
  </div>
</div>

<!--Modal-end--> 
<script src="<?php echo base_url();?>js/countdown/kkcountdown.min.js"></script> 
<script src="<?php echo base_url();?>js/manage_cause.js"></script> 
<!--<script type="text/javascript" src="<?php echo base_url();?>js/jquery.slimscroll.js"></script> -->
