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
      <p>John Martin</p>
    </div>
    <div class="col-md-3 rewards"> 
    <span>Rewards points:</span>
    <font>2000</font> 
    </div>
  </div>
  <!--end-->
  
  <div class="row main_content_row">
    <div id="content">
      <ul id="tabs" class="nav nav-tabs acc_custom_nav_tabs" data-tabs="tabs">
        <li><a href="<?php echo base_url();?>accounts/particulars">Particulars</a></li>
        <li class="active"><a href="<?php echo base_url();?>accounts/manage_causes">Manage Your Causes</a></li>
       <!-- <li><a href="<?php// echo base_url();?>accounts/appointments" data-toggle="tab">Appointments</a></li>-->
        <li><a href="<?php echo base_url();?>accounts/hostory">History</a></li>
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
            <table class="table manage_table appointment_table">
              <thead>
                <tr>
                  <th width="8%">No</th>
                  <th width="20%">Causes</th>
                  <th width="17%">Status</th>
                  <th width="30%">Type</th>
                  <th width="15%">Days left</th>
                  <td width="10%"><input type="checkbox" class="checkbox" /></td>
                </tr>
              </thead>
              <tbody>
			  <!--<input  data-toggle="modal" data-target="#myModal11" type="button" value="Peition" class="popup_button"/>
                  <input data-toggle="modal" data-target="#myModal12" type="button" value="Volunteer" class="popup_button"/>-->
               <?php 
			   
			   if(count($resultdata) > 0)
			   {
			   foreach($resultdata as $key=>$val){?>
			   <tr>
                  <td><?php echo $val['id'];?></td>
                  <td><?php echo $val['title'];?></td>
                  <td>
				  <?php 
				  if($val['status']==1){ echo "Pending";   }
				  else if($val['status']==2){ echo "Approved";   }?>
				   </td>
                  <td>
                  <input data-toggle="modal" data-target="#myModal10" type="button" value="Fundraising" class="popup_button"/>
                  </td>
                  <td>30 days</td>
                  <td><input type="checkbox" class="checkbox"  name="chk[]" value="<?php echo $val['id'];?>"/></td>
                </tr>
                <?php } }
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
            <div class="col-md-offset-2 col-md-8">
              <div class="bs-example">
                <ul class="pagination custom_pagination">
                  <li class=""><a href="#">«</a></li>
                  <li><a href="#">1 <span class="sr-only">(current)</span></a></li>
                  <li class="active"><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">6</a></li>
                  <li><a href="#">7</a></li>
                  <li><a href="#">8</a></li>
                  <li><a href="#">9</a></li>
                  <li><a href="#">10</a></li>
                  <li><a href="#">»</a></li>
                </ul>
              </div>
            </div>
            <div class="col-md-2 list_donor">
              <input data-toggle="modal" data-target="#myModal11" type="button" value="List of Donors" class="add"/>
            </div>
          </div>
          <div class="row">
            <div class="col-md-offset-8 col-md-4 col-xs-12 del_change_bttn">
              <input type="button" value="Add new" class="add"/>
              <input type="button" value="Edit" class="edit"/>
              <input type="button" value="Close" class="close_bttn"/>
              <input type="button" value="Delete" class="del"/>
            </div>
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
                      <div class="modal-header custom_m_head">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title custom_title" id="myModalLabel">Cure for alex - Fundraising progress</h4>
                      </div>
                      <div class="modal-body">                  
                        <div class="mnt_table_popup">
                            <div class="col-sm-6 col-xs-6">Status (amount): $2000/$5000</div>
                            <div class="col-sm-6 col-xs-6">Number of days left: 20/30</div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="table-responsive" id="mnt_scroll">
                          <table class="table mnt_table_popup">
                          <thead>
                            <tr>
                                <th>Name</th>
                                <th>Transaction no</th>
                                <th>Amount (SGD)</th>
                            </tr>
                           </thead>
                           <!--<div id="mnt_scroll">-->
                                <tbody>                          
                            <tr>
                                <td>John</td>
                                <td>4587965</td>
                                <td>456</td>
                            </tr>
                            <tr>
                                <td>John</td>
                                <td>4587965</td>
                                <td>456</td>
                            </tr>
                            <tr>
                                <td>John</td>
                                <td>4587965</td>
                                <td>456</td>
                            </tr>
                            <tr>
                                <td>John</td>
                                <td>4587965</td>
                                <td>456</td>
                            </tr>
                            <tr>
                                <td>John</td>
                                <td>4587965</td>
                                <td>456</td>
                            </tr>
                            <tr>
                                <td>John</td>
                                <td>4587965</td>
                                <td>456</td>
                            </tr>
                            <tr>
                                <td>John</td>
                                <td>4587965</td>
                                <td>456</td>
                            </tr>
                             <tr>
                                <td>Martin</td>
                                <td>4587965</td>
                                <td>456</td>
                            </tr>
                            <tr>
                                <td>Martin</td>
                                <td>4587965</td>
                                <td>456</td>
                            </tr>
                            <tr>
                                <td>Martin</td>
                                <td>4587965</td>
                                <td>456</td>
                            </tr>
                            <tr>
                                <td>Martin</td>
                                <td>4587965</td>
                                <td>456</td>
                            </tr>
                            <tr>
                                <td>Martin</td>
                                <td>4587965</td>
                                <td>456</td>
                            </tr>
                            
                            <tr>
                                <td>Martin</td>
                                <td>4587965</td>
                                <td>456</td>
                            </tr>
                            
                            <tr>
                                <td>Martin</td>
                                <td>4587965</td>
                                <td>456</td>
                            </tr>
                            <tr>
                                <td>Martin</td>
                                <td>4587965</td>
                                <td>456</td>
                            </tr><tr>
                                <td>Martin</td>
                                <td>4587965</td>
                                <td>456</td>
                            </tr><tr>
                                <td>Martin</td>
                                <td>4587965</td>
                                <td>456</td>
                            </tr>
                            <tr>
                                <td>Martin</td>
                                <td>4587965</td>
                                <td>456</td>
                            </tr><tr>
                                <td>Martin</td>
                                <td>4587965</td>
                                <td>456</td>
                            </tr><tr>
                                <td>Martin</td>
                                <td>4587965</td>
                                <td>456</td>
                            </tr><tr>
                                <td>Martin</td>
                                <td>4587965</td>
                                <td>456</td>
                            </tr><tr>
                                <td>Martin</td>
                                <td>4587965</td>
                                <td>456</td>
                            </tr>
                            </tbody>    
                            <!--</div>-->
                          </table>
                        </div>  
                      </div>
                  </div>
            </div>
      </div>
<!--Modal-end-->

<!--Modal-11(Project sparkle - Petition progress) -->
<div class="modal fade mnt_sparkle" id="myModal11" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
            <div class="modal-content">
                      <div class="modal-header custom_m_head">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title custom_title" id="myModalLabel">Project sparkle - Petition progress</h4>
                      </div>
                      <div class="modal-body">                  
                        <div class="mnt_table_popup mnt_mb4">
                            <div class="col-sm-8 col-xs-6"><strong>Status (amount): $2000/$5000</strong></div>
                            <div class="col-sm-4 col-xs-6"><strong>Number of days left: 20/30</strong></div>
                        </div>
                        <div class="clearfix"></div>
                        <div id="mnt_scroll2">
                        <div class="table-responsive">
                          <table class="table mnt_table_popup">
                          <thead>
                            <tr class="mnt_blue">
                                <th>No</th>
                                <th>Name</th>
                                <th>ID/NRIC</th>
                                <th>Contact(HP)</th>
                                <th>Contact(Home)</th>
                                <th>Email</th>
                                <th>Additional Messages</th>
                            </tr>
                           </thead>
                          
                           <tbody>                          
                              <tr>  
                                <td>1</td>
                                <td>Mathew</td>
                                <td>SC34566</td>
                                <td>999 999 888</td>
                                <td>444 555 666</td>
                                <td>example@gmail.com</td>
                                <td>This is something which is very harmful to societies and must be stop as soon as possible</td>    
                               </tr> 
                               <tr>     
                                <td>1</td>
                                <td>Mathew</td>
                                <td>SC34566</td>
                                <td>999 999 888</td>
                                <td>444 555 666</td>
                                <td>example@gmail.com</td>
                                <td>This is something which is very harmful to societies and must be stop as soon as possible</td>    
                               </tr> 
                               <tr>     
                                <td>1</td>
                                <td>Mathew</td>
                                <td>SC34566</td>
                                <td>999 999 888</td>
                                <td>444 555 666</td>
                                <td>example@gmail.com</td>
                                <td>This is something which is very harmful to societies and must be stop as soon as possible</td>    
                               </tr> 
                               <tr>     
                                <td>1</td>
                                <td>Mathew</td>
                                <td>SC34566</td>
                                <td>999 999 888</td>
                                <td>444 555 666</td>
                                <td>example@gmail.com</td>
                                <td>This is something which is very harmful to societies and must be stop as soon as possible</td>    
                               </tr> 
                               <tr>     
                                <td>1</td>
                                <td>Mathew</td>
                                <td>SC34566</td>
                                <td>999 999 888</td>
                                <td>444 555 666</td>
                                <td>example@gmail.com</td>
                                <td>This is something which is very harmful to societies and must be stop as soon as possible</td>    
                               </tr> <tr>   
                                <td>1</td>
                                <td>Mathew</td>
                                <td>SC34566</td>
                                <td>999 999 888</td>
                                <td>444 555 666</td>
                                <td>example@gmail.com</td>
                                <td>This is something which is very harmful to societies and must be stop as soon as possible</td>    
                               </tr> 
                               <tr>     
                                <td>1</td>
                                <td>Mathew</td>
                                <td>SC34566</td>
                                <td>999 999 888</td>
                                <td>444 555 666</td>
                                <td>example@gmail.com</td>
                                <td>This is something which is very harmful to societies and must be stop as soon as possible</td>    
                               </tr> 
                               <tr>     
                                <td>1</td>
                                <td>Mathew</td>
                                <td>SC34566</td>
                                <td>999 999 888</td>
                                <td>444 555 666</td>
                                <td>example@gmail.com</td>
                                <td>This is something which is very harmful to societies and must be stop as soon as possible</td>    
                               </tr> 
                               <tr>     
                                <td>1</td>
                                <td>Mathew</td>
                                <td>SC34566</td>
                                <td>999 999 888</td>
                                <td>444 555 666</td>
                                <td>example@gmail.com</td>
                                <td>This is something which is very harmful to societies and must be stop as soon as possible</td>    
                               </tr> 
                               <tr>     
                                <td>1</td>
                                <td>Mathew</td>
                                <td>SC34566</td>
                                <td>999 999 888</td>
                                <td>444 555 666</td>
                                <td>example@gmail.com</td>
                                <td>This is something which is very harmful to societies and must be stop as soon as possible</td>    
                               </tr> 
                               <tr>     
                                <td>1</td>
                                <td>Mathew</td>
                                <td>SC34566</td>
                                <td>999 999 888</td>
                                <td>444 555 666</td>
                                <td>example@gmail.com</td>
                                <td>This is something which is very harmful to societies and must be stop as soon as possible</td>    
                               </tr> 
                               <tr>     
                                <td>1</td>
                                <td>Mathew</td>
                                <td>SC34566</td>
                                <td>999 999 888</td>
                                <td>444 555 666</td>
                                <td>example@gmail.com</td>
                                <td>This is something which is very harmful to societies and must be stop as soon as possible</td>    
                               </tr> 
                               <tr>     
                                <td>1</td>
                                <td>Mathew</td>
                                <td>SC34566</td>
                                <td>999 999 888</td>
                                <td>444 555 666</td>
                                <td>example@gmail.com</td>
                                <td>This is something which is very harmful to societies and must be stop as soon as possible</td>    
                               </tr> 
                               <tr>     
                                <td>1</td>
                                <td>Mathew</td>
                                <td>SC34566</td>
                                <td>999 999 888</td>
                                <td>444 555 666</td>
                                <td>example@gmail.com</td>
                                <td>This is something which is very harmful to societies and must be stop as soon as possible</td>    
                               </tr> 
                               <tr>     
                                <td>1</td>
                                <td>Mathew</td>
                                <td>SC34566</td>
                                <td>999 999 888</td>
                                <td>444 555 666</td>
                                <td>example@gmail.com</td>
                                <td>This is something which is very harmful to societies and must be stop as soon as possible</td>    
                               </tr> 
                               <tr>     
                                <td>1</td>
                                <td>Mathew</td>
                                <td>SC34566</td>
                                <td>999 999 888</td>
                                <td>444 555 666</td>
                                <td>example@gmail.com</td>
                                <td>This is something which is very harmful to societies and must be stop as soon as possible</td>    
                               </tr> 
                               <tr>     
                                <td>1</td>
                                <td>Mathew</td>
                                <td>SC34566</td>
                                <td>999 999 888</td>
                                <td>444 555 666</td>
                                <td>example@gmail.com</td>
                                <td>This is something which is very harmful to societies and must be stop as soon as possible</td>    
                               </tr> 
                               <tr>     
                                <td>1</td>
                                <td>Mathew</td>
                                <td>SC34566</td>
                                <td>999 999 888</td>
                                <td>444 555 666</td>
                                <td>example@gmail.com</td>
                                <td>This is something which is very harmful to societies and must be stop as soon as possible</td>    
                               </tr> <tr>   
                                <td>1</td>
                                <td>Mathew</td>
                                <td>SC34566</td>
                                <td>999 999 888</td>
                                <td>444 555 666</td>
                                <td>example@gmail.com</td>
                                <td>This is something which is very harmful to societies and must be stop as soon as possible</td>    
                               </tr> 
                               <tr>     
                                <td>1</td>
                                <td>Mathew</td>
                                <td>SC34566</td>
                                <td>999 999 888</td>
                                <td>444 555 666</td>
                                <td>example@gmail.com</td>
                                <td>This is something which is very harmful to societies and must be stop as soon as possible</td>    
                               </tr> 
                               <tr>     
                                <td>1</td>
                                <td>Mathew</td>
                                <td>SC34566</td>
                                <td>999 999 888</td>
                                <td>444 555 666</td>
                                <td>example@gmail.com</td>
                                <td>This is something which is very harmful to societies and must be stop as soon as possible</td>    
                               </tr> <tr>   
                                <td>1</td>
                                <td>Mathew</td>
                                <td>SC34566</td>
                                <td>999 999 888</td>
                                <td>444 555 666</td>
                                <td>example@gmail.com</td>
                                <td>This is something which is very harmful to societies and must be stop as soon as possible</td>    
                               </tr> 
                               <tr>     
                                <td>1</td>
                                <td>Mathew</td>
                                <td>SC34566</td>
                                <td>999 999 888</td>
                                <td>444 555 666</td>
                                <td>example@gmail.com</td>
                                <td>This is something which is very harmful to societies and must be stop as soon as possible</td>    
                               </tr> 
                               <tr>     
                                <td>1</td>
                                <td>Mathew</td>
                                <td>SC34566</td>
                                <td>999 999 888</td>
                                <td>444 555 666</td>
                                <td>example@gmail.com</td>
                                <td>This is something which is very harmful to societies and must be stop as soon as possible</td>    
                               </tr> 
                               <tr>     
                                <td>1</td>
                                <td>Mathew</td>
                                <td>SC34566</td>
                                <td>999 999 888</td>
                                <td>444 555 666</td>
                                <td>example@gmail.com</td>
                                <td>This is something which is very harmful to societies and must be stop as soon as possible</td>    
                               </tr> 
                               <tr>     
                                <td>1</td>
                                <td>Mathew</td>
                                <td>SC34566</td>
                                <td>999 999 888</td>
                                <td>444 555 666</td>
                                <td>example@gmail.com</td>
                                <td>This is something which is very harmful to societies and must be stop as soon as possible</td>    
                               </tr> <tr>   
                                <td>1</td>
                                <td>Mathew</td>
                                <td>SC34566</td>
                                <td>999 999 888</td>
                                <td>444 555 666</td>
                                <td>example@gmail.com</td>
                                <td>This is something which is very harmful to societies and must be stop as soon as possible</td>    
                               </tr> 
                               <tr>     
                                <td>1</td>
                                <td>Mathew</td>
                                <td>SC34566</td>
                                <td>999 999 888</td>
                                <td>444 555 666</td>
                                <td>example@gmail.com</td>
                                <td>This is something which is very harmful to societies and must be stop as soon as possible</td>    
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
                            <div class="col-sm-4 col-xs-6"><strong>Date: 23/05/2014, Sunday  </strong></div>
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
                               </tr> <tr>   
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
                               </tr> <tr>   
                                <td>1</td>
                                <td>Mathew</td>
                                <td>Male</td>
                                <td>28</td>
                                <td>999 999 888</td>
                                <td>444 555 666</td>
                                <td>example@gmail.com</td>                                    
                               </tr> <tr>   
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



                 

<script type="text/javascript">
    $(document).ready(function() {
       $() 
    });
</script>
