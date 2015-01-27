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
        <li class="active"><a href="#Particulars" data-toggle="tab">Particulars</a></li>
        <li><a href="#Manage" data-toggle="tab">Manage Your Causes</a></li>
        <li><a href="#Appointments" data-toggle="tab">Appointments</a></li>
        <li><a href="#History" data-toggle="tab">History</a></li>
		<li class="active"><a href="<?php echo base_url();?>accounts/particulars" data-toggle="tab">Particulars</a></li>
        <li><a href="<?php echo base_url();?>accounts/manage_cause" data-toggle="tab">Manage Your Causes</a></li>
       <!-- <li><a href="<?php// echo base_url();?>accounts/appointments" data-toggle="tab">Appointments</a></li>-->
        <li><a href="<?php echo base_url();?>accounts/hostory" data-toggle="tab">History</a></li>
      </ul>
      <div id="my-tab-content" class="tab-content">
        <div class="tab-pane" id="Particulars">
          <div class="tab-pane tab-2" id="input_perticular">
         <div class="account_type">
         <h1>Account Type:</h1>
         <span><?php echo $type; ?></span>
         </div>
          <div class="personl_hding">
            <h3>Personal Account</h3>
            <a href="#" class="edit_bttn">Edit Account</a>
            </div>
            <div class="clearfix"></div>
            <form class="form-horizontal custom_form_horizontal steps" role="form">
              <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Name</label>
                <div class="col-sm-5">
                    <span><?php echo !empty($userinfo['name']) ? $userinfo['name'] : ''; ?></span>
                  <input type="text" class="form-control" id="name" placeholder="" value="<?php echo !empty($userinfo['name']) ? $userinfo['name'] : ''; ?> ">
                </div>
              </div>
              <div class="form-group">
                <label for="lastname" class="col-sm-3 control-label">Location Type</label>
                <div class="col-sm-5">
                  <select id="selectbasic" name="selectbasic" class="input-xlarge nation">
                     <?php  if(isset($country) && !empty($country)) {
                         foreach($country as $coun) : ?>
                                <?php if($userinfo['location'] == strtolower($coun['country'])) { $selected = 'selected="selected"'; } else { $selected = '' ; } ?>
                             <option <?php echo !empty($selected) ? $selected: ''; ?> value=<?php echo $coun['country'] ?>><?php echo $coun['country'] ?></option>
                             
                        <?php endforeach; }?>                   
                    <!-- <option value="">Select Type</option>
                    <option value="singapore">Singapore</option> -->
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="Identification Type" class="col-sm-3 control-label">Organistaion Registeration No</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="Number" placeholder="123456" value="<?php echo $userinfo['registration_number'] ?>">
                </div>
              </div>
        <div class="form-group">
        <label for="Identification Number:" class="col-sm-3 control-label">Person In-Charge :</label>
          <div class="col-sm-5">
           <input type="text" class="form-control" id="Number" placeholder="123456" value="<?php echo $userinfo['person_in_charge'] ?>">
           </div>
            </div>
              <!-- <div class="form-group">
                <label for="Gender" class="col-sm-3 control-label">Gender :</label>
                <div class="col-sm-5">
                  <div class="col-sm-5">
                    <input type="radio" class="gender" id="female" name="gender">
                    &nbsp;&nbsp;
                    <label id="male">Male</label>
                  </div>
                  <div class="col-sm-5">
                    <input type="radio" class="gender" id="male" name="gender">
                    &nbsp;&nbsp;
                    <label id="female">Female</label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="Date of Birth" class="col-sm-3 control-label">Date of Birth</label>
                <div class="col-sm-5   custom_select ">
                  <div class="col-sm-4">
                    <select style="width:95%;">
                      <option>Date</option>
                      <option>2</option>
                    </select>
                  </div>
                  <div class="col-sm-4">
                    <select style="width:95%;">
                      <option>Month</option>
                      <option>2</option>
                    </select>
                  </div>
                  <div class="col-sm-4">
                    <select style="width:95%;">
                      <option>Year</option>
                      <option>2</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="firstname" class="col-sm-3 control-label">Contact(HP)</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="firstname" placeholder="Lorem ipsum">
                </div>
              </div>
              <div class="form-group">
                <label for="firstname" class="col-sm-3 control-label">Contact Home</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="firstname" placeholder="Lorem ipsum">
                </div>
                <!--<div class="col-md-2 option"> (Optional) </div>
              </div> -->
              <div class="form-group">
                <label for="firstname" class="col-sm-3 control-label">Contact Office</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control"  placeholder="Lorem ipsum" value="<?php echo $userinfo['contact_office'] ?>">
                </div>
                <!--<div class="col-md-2 option"> (Optional) </div>--> 
              </div>
              <div class="form-group">
                <label for="firstname" class="col-sm-3 control-label">Email Address</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="firstname" placeholder="johnmartin@gmail.com" value="<?php echo $userinfo['email'] ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="firstname" class="col-sm-3 control-label">Postal</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="firstname" placeholder="Lorem ipsum" value="<?php echo $userinfo['postal_code'] ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="firstname" class="col-sm-3 control-label">Address</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="firstname" placeholder="Lorem ipsum #1226" value="<?php echo $userinfo['address'] ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="firstname" class="col-sm-3 control-label">Unit</label>
                <div class="col-sm-5">
                  <div class="col-sm-1">#</div>
                  <div class="col-md-4">
                    <input type="text" class="form-control " id="firstname" placeholder="00" value="<?php echo $userinfo['unit_f'] ?>">
                  </div>
                  <div class="col-sm-1">-</div>
                  <div class="col-md-6 unit">
                    <input type="text" class="form-control" id="firstname" placeholder="01" value="<?php echo $userinfo['unit_l'] ?>">
                  </div>
                </div>
              </div>
              <div class="form-group has-success has-feedback">
                <label class="control-label col-sm-3">Default Payment Method:</label>
                <div class="col-md-3 col-sm-6 col-xs-6 default_none">None</div>
                <div class="col-md-1 col-sm-6 col-xs-6 col-md-offset-1">
                <input type="checkbox" class="checkBoxClass"/></div>  </div>
                <div class="clearfix"></div>
                <div class="form-group has-success has-feedback">
                <label class="control-label col-sm-3"></label>
                <div class="col-md-3 col-sm-6 col-xs-6 default_none">None</div>
                <div class="col-md-1 col-sm-6 col-xs-6 col-md-offset-1">
                <input type="checkbox" class="checkBoxClass"/></div></div>
                <div class="clearfix"></div>
                <div class="form-group has-success has-feedback">
                <label class="control-label col-sm-3"></label>
                <div class="col-md-3 col-sm-6 col-xs-6 default_none">None</div>
                <div class="col-md-1 col-sm-6 col-xs-6 col-md-offset-1">
                <input type="checkbox" class="checkBoxClass"/></div>
                </div>
                
                
                
            
              <div class="form-group">
                <div class="col-sm-3 col-sm-offset-3 control-label">
                  <button type="submit" class="btn btn-default black-bt">Save</button>
                </div>
                <div class="col-sm-2">
                  <button class="btn btn-primry1 next" type="submit">Cancel</button>
                </div>
              </div>
           
            <h3>Change Password</h3>
              <div class="form-group">
                <label for="firstname" class="col-sm-3 control-label">Exisiting password :</label>
                <div class="col-sm-5">
                  <input type="password" class="form-control" id="password1" placeholder="******">
                </div>
              </div>
              <div class="form-group">
                <label for="firstname" class="col-sm-3 control-label">New Password :</label>
                <div class="col-sm-5">
                  <input type="password" class="form-control" id="password2" placeholder="******">
                </div>
              </div>
              <div class="form-group">
                <label for="firstname" class="col-sm-3 control-label">Retype New Password :</label>
                <div class="col-sm-5">
                  <input type="password" class="form-control" id="password3" placeholder="******">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-3 col-sm-offset-3 control-label">
                  <button type="submit" class="btn btn-default black-bt">Save</button>
                </div>
                <div class="col-sm-2">
                  <button class="btn btn-primry1 next" type="submit">Cancel</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- Manage Causes -->
        <div class="tab-pane" id="Manage">
          <div class="row checkfields">
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
          </div>
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
                <tr>
                  <td>01</td>
                  <td>Cure for Alex</td>
                  <td>Approved</td>
                  <td>
                  <input data-toggle="modal" data-target="#myModal10" type="button" value="Fundraising" class="popup_button"/>
                  <input  data-toggle="modal" data-target="#myModal11" type="button" value="Peition" class="popup_button"/>
                  <input data-toggle="modal" data-target="#myModal12" type="button" value="Volunteer" class="popup_button"/></td>
                  <td>30 days</td>
                  <td><input type="checkbox" class="checkbox" /></td>
                </tr>
                <tr>
                  <td>02</td>
                  <td>Cure for Alex</td>
                  <td>Pending</td>
                  <td></td>
                  <td>30 days</td>
                  <td><input type="checkbox" class="checkbox" /></td>
                </tr>
                <tr>
                  <td>03</td>
                  <td>Cure for Alex</td>
                  <td>Approved</td>
                  <td></td>
                  <td>30 days</td>
                  <td><input type="checkbox" class="checkbox" /></td>
                </tr>
                <tr>
                  <td>04</td>
                  <td>Cure for Alex</td>
                  <td>Pending</td>
                  <td></td>
                  <td>20 days</td>
                  <td><input type="checkbox" class="checkbox" /></td>
                </tr>
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
        <div class="tab-pane active" id="Appointments">
          <div class="row check_box top_checkbox mnt_app_checkfields">
            <div class="app_checkfields">
              <div class="input-group checkboxes">
                <label>Volunteer :</label>
                <input type="radio" name="g1" id="checkbox_volunteer"/>
              </div>
              <div class="input-group checkboxes">
                <label>Pet adoption :</label>
                <input type="radio" name="g1" id="checkbox_adoption"/>
              </div>
            </div>
          </div>
          <div id="appointment_volunteer" class="table-responsive">
            <table class="table appointment_table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Activity</th>
                  <th>Fequency</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Location</th>
                  <td><input type="checkbox" id="ckbCheckAll"/></td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>01</td>
                  <td>Project Sparkle</td>
                  <td>One-time</td>
                  <td>23/05/2014, Sunday</td>
                  <td>2.00pm</td>
                  <td>Jurong bird park <br>
                    XXXXXX</td>
                  <td><input type="checkbox" class="checkBoxClass"/></td>
                </tr>
                <tr>
                  <td>02</td>
                  <td>Organic farm trip</td>
                  <td>Weekly</td>
                  <td>23/05/2014, Sunday</td>
                  <td>2.00pm</td>
                  <td>Jurong bird park <br>
                    XXXXXX</td>
                  <td><input type="checkbox" class="checkBoxClass" /></td>
                </tr>
                <tr>
                  <td>03</td>
                  <td>Elder care</td>
                  <td>Monthly</td>
                  <td>23/05/2014, Sunday</td>
                  <td>2.00pm</td>
                  <td>Jurong bird park <br>
                    XXXXXX</td>
                  <td><input type="checkbox" class="checkBoxClass" /></td>
                </tr>
                <tr>
                  <td>04</td>
                  <td>Christmas surprise</td>
                  <td>One-time</td>
                  <td>23/05/2014, Sunday</td>
                  <td>2.00pm</td>
                  <td>Jurong bird park <br>
                    XXXXXX</td>
                  <td><input type="checkbox" class="checkbox" /></td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- Account-8 -->
          <div class="table-responsive" id="appointment_Pet_adoption">
            <table class="table appointment_table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Breed</th>
                  <th>Age</th>
                  <th>Status</th>
                  <th>Days to<br>
                  put down</th>
                  <th>Appointment</th>
                  <th><input type="checkbox" id="ckbCheckAll"/></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>01</td>
                  <td>Tommy</td>
                  <td>Mix</td>
                  <td>1yr 5mth</td>
                  <td><font>HDB</font>
                  <font>W</font>
                  <font><img src="images/injection.png" alt=""/></font>
                  <font>S</font></td>
                  <td>20</td>
                  <td>23/05/2014, 
Monday, 3pm</td>
                  <td><input type="checkbox" class="checkBoxClass"/></td>
                </tr>
                <tr>
                  <td>02</td>
                  <td>Sarah</td>
                  <td>German<br>
                  Sheperd</td>
                  <td>1yr 5mth</td>
                  <td><font>HDB</font>
                  <font>W</font>
                  <font><img src="images/injection.png" alt=""/></font>
                  <font>S</font></td>
                  <td>10</td>
                  <td>23/05/2014, 
Monday, 3pm</td>
                  <td><input type="checkbox" class="checkBoxClass" /></td>
                </tr>
                <tr>
                  <td>03</td>
                  <td>Sarah</td>
                  <td>German<br>
                  Sheperd</td>
                  <td>1yr 5mth</td>
                  <td><font>HDB</font>
                  <font>W</font>
                  <font><img src="images/injection.png" alt=""/></font>
                  <font>S</font></td>
                  <td>10</td>
                  <td>23/05/2014, 
Monday, 3pm</td>
                  <td><input type="checkbox" class="checkBoxClass" /></td>
                </tr>
                <tr>
                  <td>04</td>
                  <td>Sarah</td>
                  <td>German<br>
                  Sheperd</td>
                  <td>1yr 5mth</td>
                  <td><font>HDB</font>
                  <font>W</font>
                  <font><img src="images/injection.png" alt=""/></font>
                  <font>S</font></td>
                  <td>10</td>
                  <td>23/05/2014, 
Monday, 3pm</td>
                  <td><input type="checkbox" class="checkBoxClass" /></td>
                </tr>
              </tbody>
            </table>
          </div>
           <!-- End -->
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
          </div>
          <div class="row">
            <div class="col-md-offset-9 col-md-3 del_change_bttn">
              <input type="button" data-toggle="modal" data-target="#myModal14" value="change" class="change"/>
              <input type="button" value="Delete" class="del"/>
            </div>
          </div>
        </div>
        <!--History Start-->
        <div class="tab-pane" id="History">
          <div class="row check_box top_checkbox">
            <div class="col-md-push-3 col-md-6 col-md-pull-3app_checkfields">
              <div class="input-group histry_checkboxes checkboxes">
                <label>My contributions</label>
                <input type="checkbox" id="my_contribution"/>
              </div>
              <div class="input-group histry_checkboxes checkboxes">
                <label>Contributions Received</label>
                <input type="checkbox" id="contribution_receive"/>
              </div>
            </div>
          </div>
          <div id="history">
          <div class="row history_row">
            <h1>Total contribution to social causes: 100</h1>
            <div class="col-md-push-3 col-md-6 col-md-pull-3 shares">
              <p>Share your contribution!</p>
              <ul>
                <li><a href="#"><img src="images/icon1.png" alt="" /></a></li>
                <li><a href="#"><img src="images/icon2.png" alt="" /></a></li>
                <li><a href="#"><img src="images/icon3.png" alt="" /></a></li>
                <li><a href="#"><img src="images/icon4.png" alt="" /></a></li>
              </ul>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table appointment_table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Causes</th>
                  <th>Contribution type</th>
                  <th>Date &amp; time</th>
                  <th>Amount (SGD)</th>
                  <th>Points earned</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>01</td>
                  <td>Cure for Alex</td>
                  <td>Fundraising</td>
                  <td>05/05/14 (2.00pm)</td>
                  <td>$10.00</td>
                  <td>2</td>
                </tr>
                <tr>
                  <td>02</td>
                  <td>Project Sparkle</td>
                  <td>Peition</td>
                  <td>05/05/14 (2.00pm)</td>
                  <td>-</td>
                  <td>2</td>
                </tr>
                <tr>
                  <td>03</td>
                  <td>Cure for Alex</td>
                  <td>Volunteering</td>
                  <td>05/05/14 (2.00pm)</td>
                  <td>$10.00</td>
                  <td>2</td>
                </tr>
                <tr>
                  <td>04</td>
                  <td>Project Sparkle</td>
                  <td>Fundraising</td>
                  <td>05/05/14 (2.00pm)</td>
                  <td>-</td>
                  <td>2</td>
                </tr>
                <tr>
                  <td>05</td>
                  <td>Adoption Tom</td>
                  <td>Pet adoption</td>
                  <td>05/05/14 (2.00pm)</td>
                  <td>-</td>
                  <td>10</td>
                </tr>
              </tbody>
            </table>
          </div>
          </div>
          <!-- end --> 
          <!-- History 2 -->
          <div id="history1">
          <div class="row history_row">
            <h1>Total causes Created: 10</h1>
          </div>
          <div class="row checkfields">
            <div class="form-group filter_by">
              <label class="col-sm-1 control-label">Filter by:</label>
            </div>
            <div class="input-group checkboxes" >
              <label>All</label>
              <input type="checkbox" id="ckbCheckAll" />
            </div>
            <div class="input-group checkboxes ">
              <label>Fundraising :</label>
              <input type="checkbox" class="checkBoxClass" />
            </div>
            <div class="input-group checkboxes">
              <label>Volunteer :</label>
              <input type="checkbox" class="checkBoxClass"/>
            </div>
            <div class="input-group checkboxes">
              <label>Peition :</label>
              <input type="checkbox" class="checkBoxClass"/>
            </div>
            <div class="input-group checkboxes">
              <label>Pet adoption :</label>
              <input type="checkbox" class="checkBoxClass"/>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table manage_table appointment_table">
              <thead>
                <tr>
                  <th width="8%">No</th>
                  <th width="20%">Causes</th>
                  <th width="30%">Type</th>
                  <th width="15%">Date Created</th>
                  <th width="10%">Date Ended</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>01</td>
                  <td>Cure for Alex</td>
                  <td><input type="button" data-target="#myModal10" data-toggle="modal" value="Fundraising" class="popup_button"/>
                    <input type="button" data-target="#myModal11" data-toggle="modal" value="Peition" class="popup_button"/>
                    <input type="button" data-target="#myModal12" data-toggle="modal" value="Volunteer" class="popup_button"/></td>
                  <td>05/05/14 (2.00pm)</td>
                  <td>05/05/14 (2.00pm)</td>
                </tr>
                <tr>
                  <td>02</td>
                  <td>Cure for Alex</td>
                  <td></td>
                  <td>05/05/14 (2.00pm)</td>
                  <td>05/05/14 (2.00pm)</td>
                </tr>
                <tr>
                  <td>03</td>
                  <td>Cure for Alex</td>
                  <td></td>
                  <td>05/05/14 (2.00pm)</td>
                  <td>05/05/14 (2.00pm)</td>
                </tr>
                <tr>
                  <td>04</td>
                  <td>Cure for Alex</td>
                  <td></td>
                  <td>05/05/14 (2.00pm)</td>
                  <td>05/05/14 (2.00pm)</td>
                </tr>
              </tbody>
            </table>
          </div>
          </div>
          <!-- end -->
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
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--end--> 



<!-- Modal-1-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header custom_m_head">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title custom_title" id="myModalLabel">Login</h4>
                  </div>
                  <div class="modal-body">
                    <form class="form-horizontal login_form" role="form" method="post" a>
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Username</label>
                  <div class="col-sm-9">
                  <input type="text" class="form-control input_field" id="inputEmail3" placeholder="">
                  </div>
                  </div>
                  <div class="form-group">
                  <label for="inputPassword3" class="col-sm-3 control-label">Password</label>
                  <div class="col-sm-9">
                  <input type="password" class="form-control input_field" id="inputPassword3" placeholder="">
                  </div>
                  </div>
                  <div class="form-group col-sm-offset-2 col-sm-10">
                  <a href="#" class="forget">Forgot username or password?</a>
                  </div>
                  <div class="form-group">
                  <div class="col-sm-offset-3 col-sm-9">
                  <button type="submit" class="btn btn-default login_cstm">Login</button>
                  </div>
                  </div>
                  </form>
                        <div class="login_center">
                        <div class="break_line">
                        <p>or</p>
                        </div>
                        <div class="login_fb"><a href="#">
                            <img src="images/login_facebook.png" alt=""/></a>
                        </div>
                        <div class="login_g"><a href="#">
                            <img src="images/login_google.png" alt=""/></a>
                        </div>
                        <div class="form-group user_register_now ">
                        <a href="#">Not a user? Register now!</a>
                        </div>
                        </div>
                  </div>
            </div>
      </div>
</div>
<!-- end -->
<!-- Modal-2-->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header custom_m_head">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title custom_title" id="myModalLabel">forget password</h4>
                  </div>
                  <div class="modal-body">
                  <p>A email has being send to your address for password reset</p>
                    <form class="form-horizontal login_form" role="form">
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Username</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control input_field" id="inputEmail3" placeholder="">
                  </div>
                  </div>
                  <div class="form-group">
                  <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
                  <div class="col-sm-8">
                  <input type="password" class="form-control input_field" id="inputPassword3" placeholder="">
                  </div>
                  </div>
                  <div class="form-group">
                  <label for="inputPassword3" class="col-sm-4 control-label">Confirm Password</label>
                  <div class="col-sm-8">
                  <input type="password" class="form-control input_field" id="inputPassword3" placeholder="">
                  </div>
                  </div>
                  <div class="form-group">
                  <div class="col-sm-offset-4 col-sm-8">
                  <button type="submit" class="btn btn-default login_cstm">Submit</button>
                  </div>
                  </div>
                  </form>
                        
                  </div>
            </div>
      </div>
</div>
<!-- end -->
<!-- Modal-3-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header custom_m_head">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title custom_title" id="myModalLabel">Reset password</h4>
                  </div>
                  <div class="modal-body">
                  <p>A email has being send to your address for password reset</p>
                    <form class="form-horizontal login_form" role="form">
                  <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Username</label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control input_field" id="inputEmail3" placeholder="">
                  </div>
                  </div>
                  <div class="form-group">
                  <label for="inputPassword3" class="col-sm-4 control-label">Email</label>
                  <div class="col-sm-8">
                  <input type="email" class="form-control input_field" id="inputEmail3" placeholder="">
                  </div>
                  </div>
                
                  <div class="form-group col-sm-offset-2 col-sm-10">
                  <a href="#" class="forget">Not a user? Register now!</a>
                  </div>
                  <div class="form-group">
                  <div class="col-sm-offset-4 col-sm-8">
                  <button type="submit" class="btn btn-default login_cstm">Send</button>
                  </div>
                  </div>
                  </form>
                          </div>
                  </div>
            </div>
      </div>
<!-- end -->
<!-- Modal-4-->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header custom_m_head">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title custom_title" id="myModalLabel">forgot password</h4>
                  </div>
                  <div class="modal-body">
                  <p>Enter your email address to receive temporary password</p>
                    <form class="form-horizontal login_form" role="form">
                  <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                  <input type="email" class="form-control input_field" id="inputEmail3" placeholder="">
                  </div>
                  </div>
                  <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default login_cstm">Send</button>
                  </div>
                  </div>
                  </form>
                          </div>
                  </div>
            </div>
      </div>
<!-- end -->

<!--Modal-5(Booking Of Appointment) -->
<div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header custom_m_head mnt_booking_title">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                    <h4 id="myModalLabel" class="modal-title custom_title">BOOKING OF APPOINTMENT</h4>
                  </div>
                  <div class="modal-body">
                  <form class="form-horizontal login_form mnt_reg_style" role="form">
                  <div class="form-group mnt_booking_subtitle">
                  <label class="col-sm-12 control-label" for="inputEmail3">You must be a registered user to book  appointment for animal adoption</label>
                  </div>
                  <div class="col-sm-3 mnt_register_pop">
                    <a href="#"><img src="images/register.png"></a>
                  </div>
                 <div class="mnt_or col-sm-3 col-sm-offset-3">
                        <p>or</p>
                  </div>                                                     
                  <div class="form-group mnt_booking_subtitle2">
                    <label class="col-sm-12 control-label">Provide basic particular for interview</label>
                   </div>
                   <div class="form-group">
                  <label for="inputEmail3" class="col-sm-4 control-label">Name :</label>
                  <div class="col-sm-6">
                  <input type="text" class="form-control " id="inputEmail3" placeholder="">
                  </div>
                  </div>
                  <div class="form-group">
                  <label for="inputNationality3" class="col-sm-4 control-label">Nationality:</label>
                  <div class="col-sm-6">
                  <select id="slectbasic" class="form-control  input-md">
                    <option>India</option>
                    <option>England</option>
                    <option>Canada</option>
                  </select>
                  </div>
                  </div>
                  <div class="form-group">
                  <label for="inputNationality3" class="col-sm-4 control-label">Identification type:</label>
                  <div class="col-sm-6">
                  <select id="slectbasic" class="form-control  input-md">
                    <option>Select Type</option>
                    <option>PAN</option>
                    <option>UID</option>
                  </select>
                  </div>
                  </div>
                  <div class="form-group">
                  <label for="inputNationality3" class="col-sm-4 control-label">Identification number:</label>
                  <div class="col-sm-6">
                  <input type="text" class="form-control " id="inputID4" placeholder="">
                  </div>
                  </div>
                  
                  <!--<div class="form-group">
                  <label for="inputNationality3" class="col-sm-4 control-label">Gender:</label>   
                  <div class="col-sm-6">
                    <div class="col-sm-6">
                    <input type="radio" class="gender" name="gender" id="female" value="female">
                   
                    <label>Female</label>
                  </div>
                     <div class="col-sm-6">
                    <input type="radio" class="gender" name="gender" id="male" value="male">
                    
                    <label>Male</label>
                  </div>
                  </div>                                          
                  </div>-->
                  <div class="form-group">
                  <label class="col-sm-4 col-xs-4 control-label" for="inputNationality3">Gender:</label>   
                  <div class="col-sm-6 col-xs-8">
                    <div class="col-sm-6 col-xs-6">
                    <input type="radio" class="gender" name="gender" id="female" value="female">
                   
                    <label>Female</label>
                  </div>
                     <div class="col-sm-6 col-xs-6">
                    <input type="radio" class="gender" name="gender" id="male" value="male">
                    
                    <label>Male</label>
                  </div>
                  </div>                                          
                  </div>
                  
                  <div class="form-group">
                  <label for="inputNationality3" class="col-sm-4 control-label">Contact(HP):</label>
                  <div class="col-sm-6">
                  <input type="text" class="form-control " id="inputID4" placeholder="">
                  </div>
                  </div>
                  
                  <div class="form-group">
                  <label for="inputNationality3" class="col-sm-4 control-label">Contact(Home):</label>
                  <div class="col-sm-6">
                  <input type="text" class="form-control " id="inputID4" placeholder="">
                  </div>
                  </div>
                  
                  <div class="form-group">
                  <label for="inputNationality3" class="col-sm-4 control-label">Email address:</label>
                  <div class="col-sm-6">
                  <input type="text" class="form-control " id="inputID4" placeholder="">
                  </div>
                  </div>
                  
                  <div class="form-group">
                  <div class="col-sm-offset-4 col-sm-6">
                  <button type="submit" class="btn btn-default login_cstm red">OK</button>
                  </div>
                  </div>
                  </form>
                        
                  </div>
            </div>
      </div>
</div>
<!--Modal-end-->

<!--Modal-6(Icons description ) -->
<div class="modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header custom_m_head mnt_booking_title">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
                    <h4 id="myModalLabel" class="modal-title custom_title">ICON DESCRIPTION</h4>
                  </div>
                  <div class="modal-body">
                        <div class="col-sm-12 mnt_row_des">
                            <div class="col-sm-2 col-xs-3 col-sm-offset-1 icon_des"><font>HDB</font></div>
                            <div class="col-sm-9  col-xs-9">
                                <p>This icon means that the animal is HDB approved</p>
                            </div>
                        </div>
                        <div class="col-sm-12 mnt_row_des">
                            <div class="col-sm-2 col-xs-3 col-sm-offset-1 icon_des"><font><img src="images/injection.png"></font></div>
                            <div class="col-sm-9 col-xs-9">
                                <p>This icon means that the animal is  vaccinated</p>
                            </div>
                        </div>
                        <div class="col-sm-12 mnt_row_des">
                            <div class="col-sm-2 col-xs-3 col-sm-offset-1 icon_des"><font>S</font></div>
                            <div class="col-sm-9 col-xs-9">
                                <p>This icon means that the animal is  vaccinated</p>
                            </div>
                        </div>
                        <div class="col-sm-12 mnt_row_des">
                            <div class="col-sm-2 col-xs-3 col-sm-offset-1 icon_des"><font>W</font></div>
                            <div class="col-sm-9 col-xs-9">
                                <p>This icon means that the animal is  vaccinated</p>
                            </div>
                        </div>
                        <div class="col-sm-12 mnt_row_des">
                            <div class="col-sm-2 col-xs-3 col-sm-offset-1 icon_des"><font>A</font></div>
                            <div class="col-sm-9 col-xs-9">
                                <p>This icon means that the animal is  vaccinated</p>
                            </div>
                        </div>
                        <div class="col-sm-12 mnt_row_des">
                            <div class="col-sm-2 col-xs-3 col-sm-offset-1 icon_des"><font>P</font></div>
                            <div class="col-sm-9 col-xs-9">
                                <p>This icon means that the animal is suitable for a professional with knowledge on dog handling</p>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                                                
                  </div>
            </div>
      </div>
</div>
<!--Modal-end-->

<!--Modal-7(Thanks For Support) -->
<div class="modal fade mnt_support_modal" id="myModal7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header custom_m_head">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title custom_title" id="myModalLabel">THANKS FOR YOUR SUPPORT</h4>
                  </div>
                  <div class="modal-body">                  
                  <form class="form-horizontal login_form" role="form">
                  <div class="form-group mnt_sm_offset-1 mnt_sm-5 mnt_form_style">
                    <label for="inputEmail3" class="col-sm-1 col-sm-offset-1 control-label">Name:</label>
                    <div class="col-sm-5"><input type="text" class="form-control input_field" id="inputEmail3"></div>   
                    <label for="inputPassword3" class="col-sm-1 control-label">Location:</label>
                    <div class="col-sm-5"><input type="email" class="form-control input_field" id="inputEmail3"></div>
                  </div> 
                         
                  <div class="form-group mnt_sm_offset-1 mnt_sm-5 mnt_form_style">
                    <label for="inputEmail3" class="col-sm-1 col-sm-offset-1 control-label">Email Subscribe:</label>
                    <div class="col-sm-5"><input type="text" class="form-control input_field" id="inputEmail3"></div>                     
                  </div>     
                   <div class="form-group mnt_sm_offset-1 mnt_sm-5 mnt_form_style">
                    <label for="inputEmail3" class="col-sm-1 col-sm-offset-1 control-label">Your own message:</label>
                    <div class="col-sm-10"><textarea class="form-control" rows="3"></textarea></div>                     
                  </div> 
 
                  <div class="form-group mnt_sm_offset-1 mnt_sm-3 mnt_form_style mnt_spt">
                    <label for="inputEmail3" class="col-sm-3 col-xs-7 col-sm-offset-1 control-label">Support as anonymous</label>
                    <div class="col-sm-9 col-xs-2 checkbox"><label><input type="checkbox" value=""></label> </div> 
                  </div>     
                   
                  <div class="form-group mnt_sm_offset-1 mnt_form_style mnt_share_cause">
                    <label for="inputEmail3" class="col-sm-2 col-sm-offset-1 control-label">Share this Cause</label>
                    <div class="col-sm-9 mnt-modal7">
                        <label class="checkbox-inline mnt_f"><input type="checkbox" id="inlineCheckbox1" value="option1"><img src="images/f.png"></label>  
                        <label class="checkbox-inline mnt_t"><input type="checkbox" id="inlineCheckbox2" value="option2"><img src="images/t.png"></label> 
                        <label class="checkbox-inline mnt_g"><input type="checkbox" id="inlineCheckbox3" value="option3"><img src="images/g.png"></label>
                    </div> 
                  </div>   
                                                                  
                  <div class="form-group">
                      <div class="col-sm-offset-4 col-sm-8 mnt_form_style">
                      <button type="submit" class="btn btn-default login_cstm">CONFIRM</button>
                      </div>
                  </div>
                  
                  </form>
                          </div>
                  </div>
            </div>
      </div>
<!--Modal-end-->

<!--Modal-9(CAUSE4 - DONATION PAYMENT WINDOW) -->
<div class="modal fade" id="myModal9" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header custom_m_head">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title custom_title" id="myModalLabel">THANKS FOR YOUR SUPPORT</h4>
                  </div>
                  <div class="modal-body">                  
                  <form class="form-horizontal login_form" role="form">
                  <div class="form-group mnt_sm_offset-1 mnt_form_style mnt_share_cause">
                    <label for="inputEmail3" class="col-sm-2 col-sm-offset-1 control-label">Amount (SGD)</label>
                    <div class="col-sm-9 mnt_dpw_checkbox">
                        <label class="checkbox-inline"><input type="checkbox" id="inlineCheckbox1" value="option1">$3</label>  
                        <label class="checkbox-inline"><input type="checkbox" id="inlineCheckbox2" value="option2">$8</label> 
                        <label class="checkbox-inline"><input type="checkbox" id="inlineCheckbox2" value="option2">$10</label> 
                        <label class="checkbox-inline"><input type="checkbox" id="inlineCheckbox3" value="option3">$12</label>
                        <label class="checkbox-inline"><input type="checkbox" id="inlineCheckbox2" value="option2">Others</label> 
                    </div> 
                  </div>
                  <!--<div class="form-group mnt_sm_offset-1 mnt_sm-5 mnt_form_style">
                    <label for="inputEmail3" class="col-sm-1 col-sm-offset-1 control-label">Name:</label>
                    <div class="col-sm-5"><input type="text" class="form-control input_field" id="inputEmail3"></div>   
                    <label for="inputPassword3" class="col-sm-1 control-label">Location:</label>
                    <div class="col-sm-5"><input type="email" class="form-control input_field" id="inputEmail3"></div>
                  </div>--> 
                         
                  <div class="form-group mnt_sm_offset-1 mnt_sm-5 mnt_form_style">
                    <label for="inputEmail3" class="col-sm-3 col-sm-offset-1 control-label">Default Payment</label>
                    <div class="col-sm-8"><label class="checkbox-inline mnt_f"><input type="checkbox" id="inlineCheckbox1" value="option1">DEBIT-POSB- XXXX-XXXX-XXXX-XXXX-XXXX</label> </div> 
                    <label for="inputEmail3" class="col-sm-3 col-sm-offset-1 control-label"></label>    
                    <div class="col-sm-8"><label class="checkbox-inline mnt_f"><input type="checkbox" id="inlineCheckbox1" value="option1">DEBIT-POSB- XXXX-XXXX-XXXX-XXXX-XXXX</label> </div> 
                    <label for="inputEmail3" class="col-sm-3 col-sm-offset-1 control-label"></label>
                    <div class="col-sm-8"><label class="checkbox-inline mnt_f"><input type="checkbox" id="inlineCheckbox1" value="option1">DEBIT-POSB- XXXX-XXXX-XXXX-XXXX-XXXX</label> </div>                                         
                  </div>     
                   <div class="form-group mnt_sm_offset-1 mnt_sm-5">
                    <label for="inputEmail3" class="col-sm-1 col-sm-offset-1 control-label"></label>
                    <div class="col-sm-offset-4 col-sm-8">
                      <button type="submit" class="btn btn-default login_cstm">CHANGE PAYMENT METHOD</button>
                    </div>                    
                  </div> 
 
                  <div class="form-group mnt_sm_offset-1 mnt_sm-3 mnt_form_style">
                    <label class="col-sm-3 col-xs-7 col-sm-offset-1 control-label" for="inputEmail3">Support as anonymous</label>
                    <div class="col-sm-9 col-xs-2 checkbox"><label><input type="checkbox" value=""></label> </div> 
                  </div>    
                   
                  <!--<div class="form-group mnt_sm_offset-1 mnt_form_style mnt_share_cause">
                    <label for="inputEmail3" class="col-sm-4 col-sm-offset-1 control-label">Share this Cause</label>
                    <div class="col-sm-7">
                        <label class="checkbox-inline mnt_f"><input type="checkbox" id="inlineCheckbox1" value="option1"><img src="images/f.png"></label>  
                        <label class="checkbox-inline mnt_t"><input type="checkbox" id="inlineCheckbox2" value="option2"><img src="images/t.png"></label> 
                        <label class="checkbox-inline mnt_g"><input type="checkbox" id="inlineCheckbox3" value="option3"><img src="images/g.png"></label>
                    </div> 
                  </div>-->   
                  <div class="form-group mnt_sm_offset-1 mnt_form_style mnt_share_cause">
                    <label class="col-sm-4 col-sm-offset-1 control-label" for="inputEmail3">Share this Cause</label>
                    <div class="col-sm-7 mnt-modal7">
                        <label class="checkbox-inline mnt_f"><input type="checkbox" value="option1" id="inlineCheckbox1"><img src="images/f.png"></label>  
                        <label class="checkbox-inline mnt_t"><input type="checkbox" value="option2" id="inlineCheckbox2"><img src="images/t.png"></label> 
                        <label class="checkbox-inline mnt_g"><input type="checkbox" value="option3" id="inlineCheckbox3"><img src="images/g.png"></label>
                    </div> 
                  </div>
                                                                  
                  <div class="form-group">
                      <div class="col-sm-offset-4 col-sm-8 mnt_form_style">
                      <button type="submit" class="btn btn-default login_cstm">CONFIRM</button>
                      </div>
                  </div>
                  
                  </form>
                          </div>
                  </div>
            </div>
      </div>
<!--Modal-end-->

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

<!--Modal-13(Project sparkle - Volunteer progress) -->
<div class="modal fade mnt_sparkle" id="myModal13" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
            <div class="modal-content">
                      <div class="modal-header custom_m_head">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title custom_title" id="myModalLabel">Tim the golden retrieval - Pet adoption progress</h4>
                      </div>
                      <div class="modal-body">                  
                        <div class="mnt_table_popup mnt_mb4">
                            <div class="col-sm-4 col-xs-6"><strong>Breed: Golden Retrieval   </strong></div>
                            <div class="col-sm-4 col-xs-6"><strong>Gender: Male </strong></div>
                            <div class="col-sm-4 col-xs-6"><strong>Age: 10 years 9 month</strong></div>
                            <div class="col-sm-4 col-xs-6 mnt_row_des">
                                    <span class="icon_des"><img src="images/icon_des-1.png"></span>
                                    <span class="icon_des"><img src="images/icon_des-2.png"></span>
                                    <span class="icon_des"><img src="images/icon_des-3.png"></span>
                            </div>
                            <div class="col-sm-4 col-xs-6"><strong>Status (applicants): 500 </strong></div>                            
                            <div class="col-sm-4 col-xs-6"><strong>Number of days left: 20/30</strong></div>
                        </div>
                        <div class="clearfix"></div>
                        <div id="mnt_scroll4">
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

<!--Modal-14(CALANDER) Change of Appointment -->
<div class="modal fade mnt_cal_modal mnt_change_appoint" id="myModal14" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
            <div class="modal-content mnt_cal_header">
                  <div class="modal-header">
                    <button type="button" class="close mnt_close" data-dismiss="modal" aria-hidden="true"></button>                    
                  </div>
                  <div class="modal-body mnt_padng_none mnt_change_appoint_cal">                  
                    <!-- Responsive calendar -->
                    <div class="col-md-7 col-sm-7 col-sm-offset-2 col-xs-12 padng_none hght">
                            <div class="responsive-calendar">
                            <h5 class="change_appnt">Change Of Appointment</h5>
                            <div class="controls">                              
                                <a class="pull-left" data-go="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                                <h4><span data-head-year>January </span> <span data-head-month>14</span></h4>
                                <a class="pull-right" data-go="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                            </div><div class="clearfix"></div>
                            <div class="day-headers date_bg">
                              <div class="day header border_none">Mon</div>
                              <div class="day header border_none">Tue</div>
                              <div class="day header border_none">Wed</div>
                              <div class="day header border_none">Thu</div>
                              <div class="day header border_none">Fri</div>
                              <div class="day header border_none">Sat</div>
                              <div class="day header border_none">Sun</div>
                            </div>
                            <div class="days" data-group="days">
                              
                            </div>
                          </div>
                            <!--clander-->
 
                        <div class="col-md-12 padng_none">
                            <div class="col-md-12 col-sm-12 col-xs-12 padng_none top15">
                                <label class="control-label label_pad mnt_align_lft mnt_time_lbl" for="search">Time available:</label>
                                <div class="col-sm-12 mnt_align_rgt mnt_time_lbl">
                                    <label class="checkbox-inline">10:00 AM<input type="checkbox" value="option1" id="inlineCheckbox1"></label>  
                                    <label class="checkbox-inline">11:00 AM<input type="checkbox" value="option2" id="inlineCheckbox2"></label> 
                                    <label class="checkbox-inline">12:00 AM<input type="checkbox" value="option3" id="inlineCheckbox3"></label>
                                </div>
                                <div class="col-sm-12 mnt_align_rgt mnt_time_lbl mnt_pb3">
                                    <label class="checkbox-inline">10:00 AM<input type="checkbox" value="option1" id="inlineCheckbox1"></label>  
                                    <label class="checkbox-inline">11:00 AM<input type="checkbox" value="option2" id="inlineCheckbox2"></label> 
                                    <label class="checkbox-inline">12:00 AM<input type="checkbox" value="option3" id="inlineCheckbox3"></label>
                                </div>
                               <!-- <select class="form-control3" id="selectbasic">
                                    <option>HH.MM</option>
                                    <option>option 2</option>
                                </select>
                                <select class="form-control3" id="selectbasic">
                                    <option>AM</option>
                                    <option>option 2</option>
                                </select>-->
                            </div>
                        </div>

                     </div><!--Calander End-->
                    <!-- Responsive calendar - END -->
                  </div>
                  <div class="clearfix"></div>
            </div>
      </div>
</div>
<!--Modal-end-->

<!--Modal-8(CALANDER) Booking of Appointment -->
<div class="modal fade mnt_cal_modal mnt_change_appoint" id="myModal8" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
            <div class="modal-content mnt_cal_header">
                  <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <!--<h4 class="modal-title custom_title" id="myModalLabel">Tim the golden retrieval - Pet adoption progress</h4>-->
                   </div>
                  <div class="modal-body mnt_padng_none mnt_change_appoint_cal">                  
                    <!-- Responsive calendar -->
                    <div class="col-md-7 col-sm-7 col-sm-offset-2 col-xs-12 padng_none hght">
                            <div class="responsive-calendar">
                            <h5 class="change_appnt">Booking Of Appointment</h5>
                            <div class="controls">                              
                                <a class="pull-left" data-go="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                                <h4><span data-head-year>January </span> <span data-head-month>14</span></h4>
                                <a class="pull-right" data-go="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
                            </div><div class="clearfix"></div>
                            <div class="day-headers date_bg">
                              <div class="day header border_none">Mon</div>
                              <div class="day header border_none">Tue</div>
                              <div class="day header border_none">Wed</div>
                              <div class="day header border_none">Thu</div>
                              <div class="day header border_none">Fri</div>
                              <div class="day header border_none">Sat</div>
                              <div class="day header border_none">Sun</div>
                            </div>
                            <div class="days" data-group="days">
                              
                            </div>
                          </div>
                            <!--clander-->
 
                        <div class="col-md-12 padng_none">
                            <div class="col-md-12 col-sm-12 col-xs-12 padng_none top15">
                                <label class="control-label label_pad mnt_align_lft mnt_time_lbl" for="search">Time available:</label>
                                <div class="col-sm-12 mnt_align_rgt mnt_time_lbl">
                                    <label class="checkbox-inline">10:00 AM</label>  
                                    <label class="checkbox-inline">11:00 AM</label> 
                                    <label class="checkbox-inline">12:00 AM</label>
                                </div>
                                <div class="col-sm-12 mnt_align_rgt mnt_time_lbl mnt_pb3">
                                    <label class="checkbox-inline">10:00 AM</label>  
                                    <label class="checkbox-inline">11:00 AM</label> 
                                    <label class="checkbox-inline">12:00 AM</label>
                                </div>
                               <!-- <select class="form-control3" id="selectbasic">
                                    <option>HH.MM</option>
                                    <option>option 2</option>
                                </select>
                                <select class="form-control3" id="selectbasic">
                                    <option>AM</option>
                                    <option>option 2</option>
                                </select>-->
                            </div>
                        </div>

                     </div><!--Calander End-->
                    <!-- Responsive calendar - END -->
                  </div>
                  <div class="clearfix"></div>
            </div>
      </div>
</div>
<!--Modal-end-->

<!--Modal-15(Thanks Giving 2) -->
<div class="modal fade mnt_thanks2" id="myModal15" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
            <div class="modal-content">
                      <div class="modal-header custom_m_head">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title custom_title" id="myModalLabel">Thanks For Your Support</h4>
                      </div>
                      <div class="modal-body">                  
                        <div class="mnt_table_popup mnt_mb4 mnt_thnks2_title-line">
                            <div class="mnt_thnks2_title"><label>ITEMS OVERVIEW</label></div>                           
                        </div>
                        <div class="clearfix"></div>
                        
                        <div class="table-responsive">
                          <table class="table mnt_table_popup">
                          <thead>
                            <tr class="mnt_blue">
                                <th>Items Selected</th>
                                <th>Color</th>
                                <th>SIZE</th>
                                <th>Qty</th>
                                <th>Point/Piece</th>
                                <th>Total</th>                                
                            </tr>
                           </thead>
                          
                           <tbody>                          
                              <tr>  
                                <td><label class="checkbox-inline mnt_f"><input type="checkbox" value="option1" id="inlineCheckbox1">1 Ding Dong Oil(Aroma)</label> </td>
                                <td>Blue</td>
                                <td>S</td>
                                <td>10</td>
                                <td>25</td>
                                <td>50</td>                                
                              </tr>
                                <tr>    
                                <td><label class="checkbox-inline mnt_f"><input type="checkbox" value="option1" id="inlineCheckbox1">1 Ding Dong Oil(Aroma)</label></td>
                                <td>___</td>
                                <td>___</td>
                                <td>10</td>
                                <td>25</td>
                                <td>50</td>                                
                              </tr>                                                           
                                        </tbody>    
                             <tfoot class="mnt_thanks2_tfoot">
                              <tr>
                                <td>Overall Total</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>100</td>
                              </tr>
                            </tfoot>
                          </table>
                        </div>  
                        <div class="mnt_thanks2_xs12">
                            <div class="col-md-4 col-sm-3 col-xs-12 mnt_form_style mnt_mb2">
                                    <button class="btn btn-default mnt_modify" type="submit">DELETE</button>
                            </div>
                            <div class="col-md-4 col-sm-3 col-xs-12 mnt_form_style mnt_mb2">
                                <button class="btn btn-default mnt_modify" type="submit">MODIFY</button>
                            </div>
                            <div class="col-md-4 col-sm-6 col-xs-12 mnt_mb2">
                                <label><strong>Click on checkbox to delete or modify</strong></label>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="mnt_mt4 mnt_mb4 mnt_thnks2_title-line ">
                            <div class="mnt_thnks2_title2"><label>DELIVERY ADDRESS</label></div>    
                            <div class="mnt_mt4">
                            <form role="form" class="form-horizontal login_form">
                              <div class="form-group mnt_sm_offset-1 mnt_sm-5 mnt_form_style">
                                <label class="col-sm-1 col-xs-6 col-sm-offset-1 control-label" for="inputEmail3">Default:</label>
                                <div class="col-sm-5 col-xs-6 col-sm-offset-1"><input type="radio" class="radio"></div>                                    
                              </div>    
                              <div class="form-group mnt_sm_offset-1 mnt_sm-5 mnt_form_style">
                                <label class="col-sm-1 col-sm-offset-1 control-label" for="inputEmail3">Postal:</label>
                                <div class="col-sm-5"><input type="text" id="inputEmail3" class="form-control"></div>   
                                <label class="col-sm-1 control-label" for="inputPassword3">Detail:</label>
                                <div class="col-sm-5"><textarea rows="1" class="form-control"></textarea></div>   
                              </div> 
                                     
                              <div class="form-group mnt_sm_offset-1 mnt_sm-5 mnt_form_style">
                                <label class="col-sm-1 col-sm-offset-1 control-label" for="inputEmail3">Unit: #</label>
                                    <div class="col-sm-2">
                                        <input type="text" id="inputEmail3" class="form-control input_field mnt_thnks_input" value="0">
                                    </div> 
                                <label class="col-sm-1 control-label mnt_center" for="inputEmail3">__</label>
                                    <div class="col-sm-2">
                                        <input type="text" value="1" id="inputEmail3" class="form-control input_field mnt_thnks_input">
                                    </div>                     
                                </div>                                   
             
                                                              
                              <div class="form-group">
                                  <div class="col-sm-offset-4 col-sm-8 mnt_form_style">
                                  <button class="btn btn-default login_cstm" type="submit">CONFIRM</button>
                                  </div>
                              </div>
                              
                              </form>
              
                            </div>                      
                        </div>
                        <div class="clearfix"></div>
                        
                      </div>
                  </div>
            </div>
      </div>
<!--Modal-end-->

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

<!--Modal-13(Project sparkle - Volunteer progress) -->
<div class="modal fade mnt_sparkle" id="myModal13" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
            <div class="modal-content">
                      <div class="modal-header custom_m_head">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title custom_title" id="myModalLabel">Tim the golden retrieval - Pet adoption progress</h4>
                      </div>
                      <div class="modal-body">                  
                        <div class="mnt_table_popup mnt_mb4">
                            <div class="col-sm-4 col-xs-6"><strong>Breed: Golden Retrieval   </strong></div>
                            <div class="col-sm-4 col-xs-6"><strong>Gender: Male </strong></div>
                            <div class="col-sm-4 col-xs-6"><strong>Age: 10 years 9 month</strong></div>
                            <div class="col-sm-4 col-xs-6 mnt_row_des">
                                    <span class="icon_des"><img src="images/icon_des-1.png"></span>
                                    <span class="icon_des"><img src="images/icon_des-2.png"></span>
                                    <span class="icon_des"><img src="images/icon_des-3.png"></span>
                            </div>
                            <div class="col-sm-4 col-xs-6"><strong>Status (applicants): 500 </strong></div>                            
                            <div class="col-sm-4 col-xs-6"><strong>Number of days left: 20/30</strong></div>
                        </div>
                        <div class="clearfix"></div>
                        <div id="mnt_scroll4">
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
