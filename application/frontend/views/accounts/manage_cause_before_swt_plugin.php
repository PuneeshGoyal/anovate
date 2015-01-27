<!--mid area-->

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
          <div class="table-responsive">
            <table class="button_styles table manage_table appointment_table table-condensed table-striped table-bordered table-hover no-margin">
              <thead>
                <tr >
                  <th width="2%">Sr. No.</th>
                  <th width="20%">Cause Title</th>
                  <th width="5%">Status</th>
                  <th width="28%">Type</th>
                  <th width="10%">Fundraising Time</th>
                  <th width="10%">Petition Time</th>
                  <td width="20%">
                  <form action="<?php echo  base_url();?>accounts/manage_causes/" method="get" id="search" name="filter" onchange="this.form.submit()">
                      <select class="multiselect"  name="filter" onchange="this.form.submit()">
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
				 if(count($resultdata) > 0)
				 {
				 $i=1;
				 foreach($resultdata as $key=>$val){
				 $closetime = $val['activated_time'] + ($val['duration']*24*60*60);
				 $petition_closetime = $val['activated_time'] + ($val['petition_duration']*24*60*60);
				
				($val["is_fundraise"] == 1) ? (list($link1, $is_fundraise) = array(base_url().'accounts/cause_fundrasing/'.$val['slug'], '<a class="popup_button" style="text-decoration:none;" data-toggle="modal"  href='.base_url().'accounts/cause_fundrasing/'.$val['slug'].' data-target="#myModal10">Fundraising </a>')) :(list($link1, $is_fundraise) = array(NULL, NULL));
				($val["is_petition"] == 1) ? (list($link2, $is_petition) = array(base_url().'accounts/cause_petition/'.$val['slug'], '<a class="popup_button" style="text-decoration:none;" data-toggle="modal"  href='.base_url().'accounts/cause_petition/'.$val['slug'].' data-target="#myModal11">Petition</a>')) :(list($link2, $is_petition) = array(NULL, NULL));

				 ?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td title="<?php echo ucfirst($val['title']);?>"><?php echo strlen($val['title']) > 25 ? substr(ucfirst($val['title']), 0,25).".." : ucfirst($val['title']); ?></td>
                  <td>
				  <?php 
					  if($val['status']==1){ echo "<span style='color:red;'>Pending</span>"; }
					  else if($val['status']==2){ echo "<span style='color:green;'>Approved</span>"; }
					  else if($val['status']==3){ echo "<span style='color:black;'>Closed</span>"; }?></td>
                  <td align="left"><?php 
				  echo $is_fundraise;
				  echo $is_petition;
				  ?></td>
                  <td><?php if($val['activated_time'] != ""){?>
                    <span data-time="<?php echo $closetime;?>" class="kkcount-down"></span>
                    <?php } else { ?>
                    N/A
                    <?php } ?></td>
                  <td><?php if($val['activated_time'] != ""){?>
                    <span data-time="<?php echo  $petition_closetime;?>" class="kkcount-down"></span>
                    <?php } else { ?>
                    N/A
                    <?php } ?></td>
                  <td><!-- <input type="checkbox" class="checkbox"  name="chk[]" value="<?php echo $val['id'];?>"/> -->
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                          <li><?php if(($val['status']==1) ){?>
                          	
                            <button type="button" value="Edit" class="btn btn-primary" onclick="window.location.href = '<?php echo base_url();?>start_cause/edit_cause/<?php echo $val['slug'];?>'"/><span class="glyphicon glyphicon-edit"></span>Edit</button>
                            <?php }else {?>
                            <button type="button" value="Edit" class="btn btn-primary" onclick="alert_text('edit')" /><span class="glyphicon glyphicon-edit">Edit</span></button>
                            <?php }?>
                   		 </li>
                          <li>
                           <?php if(($val['status']<>3) ){?>
                            <button type="button" onclick="alert_text1('close','<?php echo $val['id'];?>');" value="Close" class="btn btn-primary" /><span class="glyphicon glyphicon-ban-circle"></span>Close</button>
                            <?php  }else{?>
                            <button type="button" value="Closed" class="btn btn-primary" /><span class="glyphicon glyphicon-ban-circle"></span>Closed</button>
                            <?php }?>
                          </li>
                          
                          <li>
							<?php if($val['status']==2){?>
                            <button type="button" onclick="alert_text('delete');" value="Delete" class="btn btn-primary" /><span class="glyphicon glyphicon-trash"></span>Delete</button>
                            <?php }else {?>
                            <button type="button" value="Delete" class="btn btn-primary" onclick="alert_text2('delete','<?php echo $val['id'];?>');"/><span class="glyphicon glyphicon-trash"></span>Delete</button>
                            <?php }?>
                          </li>
                        </ul>
                      </div><!-- /btn-group -->
                   </td>
                </tr>
                <?php $i++;} }
					else
					{?>
							<tr>
							  <td colspan="6"><font style="color:red;"> No Record Found</font></td>
							</tr>
							<?php }
					
					?>
              </tbody>
            </table>
          </div>
          <div class="row">
            <div class="col-md-offset-1 col-md-8">
              <div class="bs-example">
                <ul class="pagination custom_pagination">
                  <?php echo $this->pagination->create_links(); ?>
                </ul>
              </div>
            </div>
            <div class="col-md-3 list_donor"> 
              <!-- <input data-toggle="modal" data-target="#myModal11" type="button" value="List of Donors" class="add list"/>-->
              <input type="button" value="Add new" class="add" style="margin-right:10px;" onclick="window.location.href = '<?php echo base_url();?>start_cause/'"/>
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
    <div class="modal-content"> </div>
  </div>
</div>
<!--Modal-end--> 
<!--Modal-12(Project sparkle - Volunteer progress) -->
<div class="modal fade mnt_sparkle" id="myModal12" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header custom_m_head">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title custom_title" id="myModalLabel">Project sparkle - Volunteer progress</h4>
      </div>
      <div class="modal-body">
        <div class="mnt_table_popup mnt_mb4">
          <div class="col-sm-4 col-xs-6"><strong>Date: 23/05/2014, Sunday </strong></div>
          <div class="col-sm-4 col-xs-6"><strong>Time: 2.00pm</strong></div>
          <div class="col-sm-4 col-xs-6"><strong>Location: Jurong bird park XXXXXX</strong></div>
          <div class="col-sm-4 col-xs-6"><strong>Status (sign-up): 2000/5000</strong></div>
          <div class="col-sm-4 col-xs-6"><strong>Number of days left: 20/30</strong></div>
        </div>
        <div class="clearfix"></div>
        <div id="mnt_scroll3">
          <div class="table-responsive">
            <table class="table mnt_table_popup">
              <thead>
                <tr class="mnt_blue">
                  <th>No</th>
                  <th>Name</th>
                  <th>Gender</th>
                  <th>Age(Yr Old)</th>
                  <th>Contact (HP)</th>
                  <th>Contact(Home)</th>
                  <th>Email</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Mathew</td>
                  <td>Male</td>
                  <td>28</td>
                  <td>999 999 888</td>
                  <td>444 555 666</td>
                  <td>example@gmail.com</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Mathew</td>
                  <td>Male</td>
                  <td>28</td>
                  <td>999 999 888</td>
                  <td>444 555 666</td>
                  <td>example@gmail.com</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Mathew</td>
                  <td>Male</td>
                  <td>28</td>
                  <td>999 999 888</td>
                  <td>444 555 666</td>
                  <td>example@gmail.com</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Mathew</td>
                  <td>Male</td>
                  <td>28</td>
                  <td>999 999 888</td>
                  <td>444 555 666</td>
                  <td>example@gmail.com</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Mathew</td>
                  <td>Male</td>
                  <td>28</td>
                  <td>999 999 888</td>
                  <td>444 555 666</td>
                  <td>example@gmail.com</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Mathew</td>
                  <td>Male</td>
                  <td>28</td>
                  <td>999 999 888</td>
                  <td>444 555 666</td>
                  <td>example@gmail.com</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Mathew</td>
                  <td>Male</td>
                  <td>28</td>
                  <td>999 999 888</td>
                  <td>444 555 666</td>
                  <td>example@gmail.com</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Mathew</td>
                  <td>Male</td>
                  <td>28</td>
                  <td>999 999 888</td>
                  <td>444 555 666</td>
                  <td>example@gmail.com</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Mathew</td>
                  <td>Male</td>
                  <td>28</td>
                  <td>999 999 888</td>
                  <td>444 555 666</td>
                  <td>example@gmail.com</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Mathew</td>
                  <td>Male</td>
                  <td>28</td>
                  <td>999 999 888</td>
                  <td>444 555 666</td>
                  <td>example@gmail.com</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Mathew</td>
                  <td>Male</td>
                  <td>28</td>
                  <td>999 999 888</td>
                  <td>444 555 666</td>
                  <td>example@gmail.com</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Mathew</td>
                  <td>Male</td>
                  <td>28</td>
                  <td>999 999 888</td>
                  <td>444 555 666</td>
                  <td>example@gmail.com</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Mathew</td>
                  <td>Male</td>
                  <td>28</td>
                  <td>999 999 888</td>
                  <td>444 555 666</td>
                  <td>example@gmail.com</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Mathew</td>
                  <td>Male</td>
                  <td>28</td>
                  <td>999 999 888</td>
                  <td>444 555 666</td>
                  <td>example@gmail.com</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Mathew</td>
                  <td>Male</td>
                  <td>28</td>
                  <td>999 999 888</td>
                  <td>444 555 666</td>
                  <td>example@gmail.com</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Mathew</td>
                  <td>Male</td>
                  <td>28</td>
                  <td>999 999 888</td>
                  <td>444 555 666</td>
                  <td>example@gmail.com</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Mathew</td>
                  <td>Male</td>
                  <td>28</td>
                  <td>999 999 888</td>
                  <td>444 555 666</td>
                  <td>example@gmail.com</td>
                </tr>
                <tr>
                  <td>1</td>
                  <td>Mathew</td>
                  <td>Male</td>
                  <td>28</td>
                  <td>999 999 888</td>
                  <td>444 555 666</td>
                  <td>example@gmail.com</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!--Modal-end--> 

<script src="<?php echo base_url();?>js/countdown/kkcountdown.js"></script> 
<script src="<?php echo base_url();?>js/countdown/kkcountdown.min.js"></script> 
<script type="text/javascript">

document.querySelector('#alert_text_edit').onclick = function(){
	swal({
		title: "Are you sure?",
		text: "You want this cause",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: '#DD6B55',
		confirmButtonText: 'Yes, delete it!'
	},
	function(){
		alert("Deleted!");
	});
};
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
		
				
$('#myModal10,#myModal11').on('loaded.bs.modal', function () {
	
   $("#count").kkcountdown({
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
            })
	});
		
	function check_all(element){
	 var el = $(element);
	    if(el.is(':checked')) { // check select status
		    $('.checkbox_select').each(function(e) { //loop through each checkbox
		        this.checked = true;  //select all checkboxes with class "checkbox1"               
            });
        }
		else{
			$('.checkbox_select').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "checkbox1"                       
            });         
        }
	}
	
	
		function alert_text(text)
		{
			alert('Can not '+text+' on going cause');
		}
		function alert_text1(text,id){
			if(confirm("Are you sure you want to "+text+" this cause?"))
			{
				window.location.href = BASEURL+'start_cause/close_cause/'+id;
				return true;
			}
			else{
				return false;
			}
		}
		
		function alert_text2(text,id){
			if(confirm("Are you sure you want to "+text+" this cause?"))
			{
				window.location.href = BASEURL+'start_cause/delete_cause/'+id;
				return true;
			}
			else{
				return false;
			}
		}


</script> 
<script type="text/javascript"?>
	$('body').on('hidden.bs.modal', '.modal', function () {
		$(this).removeData('bs.modal');
	});

</script> 
<!--<script type="text/javascript" src="<?php echo base_url();?>js/jquery.slimscroll.js"></script> 
-->