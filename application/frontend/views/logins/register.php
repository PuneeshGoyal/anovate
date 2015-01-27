<div class="container"> 
    <!-- Ist row-->
    <div class="row custom-row">
        <div class="col-md-12 heading">
            <h3 class="col-md-2 offset-md-10">REGISTRATION</h3>
        </div>
        <!-- Nav tabs -->
        <div  class="messag1" id="message"> 
            <font color='red'><?php echo $this->session->flashdata('signup_errormsg'); ?></font> <font color='green'><?php echo $this->session->flashdata('signup_errormsg'); ?></font> <br class="clear" /></div>
        <ul class="nav nav-tabs registeration mnt_tab_li" id="tab">
            <li class="active"><a href="#select_account" data-toggle="tab" onclick="this.href;
                    return false;">
                    <div class="img-circle out-circle">
                        <div class="img-circle outer-circle"> 01 </div>
                    </div>
                    Select Account Type</a> </li>
            <li id="input_particular"><a href="#input_perticular" data-toggle="tab" onclick="this.href;
                    return false;">
                    <div class="img-circle out-circle">
                        <div class="img-circle outer-circle"> 02 </div>
                    </div>
                    Input Particular</a></li>
            <li id="additional"><a href="#additional_information" data-toggle="tab" onclick="this.href;
                    return false;">
                    <div class="img-circle out-circle">
                        <div class="img-circle outer-circle"> 03 </div>
                    </div>
                    Other Information(optional)</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content  steps">
            <div class="tab-pane step-1 active" id="select_account">
                <h3>Select Account Type</h3>
                <form id="signup_form" role="form" class="form-group" method="post" action="<?php echo base_url() ?>logins/add_user_to_database">
                    <div id="main_form">
                        <div class="col-sm-12">
                            <div class="input-group organise_check col-sm-6 col-xs-12">
                                <label class="col-sm-4 col-xs-3">Organisation</label>
                                <div class="col-sm-1">
                                    <input <?php if ($this->session->userdata("register_user_type") == "organisation") {
    echo 'checked="checked"';
} ?> type="radio" id="oraganise_check" class="checkBoxClass" style="margin: 7px 0 0;" value="organisation" name="account_type">
                                </div>
                            </div>
                            <div class="input-group organise_check col-sm-6 col-xs-12">
                                <label class="col-sm-4 col-xs-3">Personal</label>
                                <div class="col-sm-1"> 
                                    <input type="radio" <?php if ($this->session->userdata("register_user_type") == "personal") {
    echo 'checked="checked"';
} ?> id="personal_check" class="checkBoxClass" value="personal" style="margin: 5px 0 0;" name="account_type">
                                </div>
                            </div>
                            <!-- href="input_particular" --> 
                            <a class="btn btn-primry1 btnNext" id="inputs_particular" onclick="javascript: return first('#tab');">Next</a> </div>
                    </div>
            </div>

            <!--------------------------------------------------------------------------USERS SIGNUP START------------------------------------------------------------------->
            <input type="hidden" name="register_user_type" id="register_user_type" value="" />
            <div class="tab-pane tab-2 mnt_reg_form" id="input_perticular">
                <div id="personal_form_check" style="display: none">
                    <div id="error_msg" style="color: red;padding-top:13px; text-align:center;width:50%"></div>
                   
                    <h3>Personal Account</h3>
                    <?php
                    if ($_GET['gmTrue'] == true) {//if signup through fb then hide gmail button
                        echo $google_data;
                    } else if ($_GET['gmTrue'] == true) {//if signup through gmail then hide fb button
                        echo $content;
                    } else {//by default show both button
                        echo $content;
                        echo $google_data;
                    }
                    $fb_data = array();
                    $user_data = array();
                    $session_gmail_data = array();

                    $fb_data = $this->session->userdata["facebook_data"]; //fetch facebook user details if session exists
                    $session_gmail_data = $this->session->userdata("register_gmail_data"); //fetch gmail user details if session exists

                    if ($fb_data <> "") {
                        $user_data = $fb_data;
                    } else if ($session_gmail_data <> "") {
                        $user_data = $session_gmail_data;
                    }
                    ?>
                    <!--<div class="col-md-3 col-sm-6 col-xs-12 facebook ">
                  <img src="<?php echo base_url(); ?>images/login_facebook.jpg"></div>--> 
                    <!--<div class=" col-md-9 col-sm-6 col-xs-12 google"><img src="<?php echo base_url(); ?>images/login_google.png">
                  </div>-->

                    <div class="clearfix"></div>
                    <div class="form-horizontal personal_form">
                        <div class="form-group">
                            <label for="personal_full_name" class="col-sm-3 control-label">Name:<span style="color:#F00;">*</span></label>
                            <div class="col-sm-8">
                                <?php if ($fb_data <> "") { ?>
                                    <input type="hidden" name="fid" id="fid" value="<?php echo!empty($user_data["fid"]) ? $user_data["fid"] : ""; ?>" />
                                <?php } else { ?>
                                    <input type="hidden" name="gid" id="gid" value="<?php echo!empty($user_data["gid"]) ? $user_data["gid"] : ""; ?>" />
                                <?php } ?>
                                <input type="text" class="form-control" name="personal_full_name" id="personal_full_name" placeholder="" value="<?php echo!empty($user_data["name"]) ? $user_data["name"] : ""; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="personal_nationality" class="col-sm-3 control-label">Nationality:<span style="color:#F00;">*</span></label>
                            <div class="col-sm-8">
                                <select id="personal_nationality" name="personal_nationality" class="selectpicker show-menu-arrow input-xlarge nation">
                                    <option value="">Select Nationality</option>
                                    <option value="singapore">Singapore</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="personal_identification Type" class="col-sm-3 control-label">Identification Type:<span style="color:#F00;">*</span></label>
                            <div class="col-sm-8">
                                <select id="personal_identification_type" name="personal_identification_type" class="selectpicker show-menu-arrow input-xlarge nation">
                                    <option value="">Select Identification Type</option>
                                    <option value="citizenship">Citizenship</option>
                                    <option value="pr">PR</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="personal_identification Number:" class="col-sm-3 control-label">Identification Number:<span style="color:#F00;">*</span></label>
                            <div class="col-sm-8">
                                <input id="personal_identification_number" type="text" class="form-control" name="personal_identification_number"  placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="personal_gender:" class="col-sm-3 control-label">Gender:<span style="color:#F00;">*</span></label>
                            <div class="col-sm-5">
                                <div class="col-sm-5">
                                    <?php
                                    $gender = '';
                                    if ($user_data["gender"] == "male") {
                                        $gender = 'male';
                                    } else {
                                        $gender = 'female';
                                    }
                                    ?>
                                    <input type="radio" value="f" class="gender" id="female" name="personal_gender" <?php if ($gender == "female") {
                                        echo 'checked="checked"';
                                    } ?>>
                                    &nbsp;&nbsp;
                                    <label class="lab_input">Female</label>
                                </div>
                                <div class="col-sm-5">
                                    <input type="radio" value="m" class="gender" id="male" name="personal_gender" <?php if ($gender == "male") {
                                        echo 'checked="checked"';
                                    } ?>>
                                    &nbsp;&nbsp;
                                    <label class="lab_input">Male</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Date of Birth" class="col-sm-3 control-label">Date of Birth:<span style="color:#F00;">*</span></label>
                            <div class="col-sm-8 custom_select">
                                <div class="col-sm-4">
                                    <select  class="selectpicker show-menu-arrow" name="personal_date" id="personal_date" style="width:95%;">
                                        <option value="">Day</option>
                                        <?php $dates = range(1, 31) ?>
                                        <?php foreach ($dates as $date) : ?>
                                            <option value="<?php echo $date; ?>"><?php echo $date; ?></option>
<?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <select class="selectpicker show-menu-arrow" name="personal_month" id="personal_month" style="width:95%;">
                                        <option value="">Month</option>
                                        <?php $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'); ?>
                                        <?php foreach ($months as $k => $v) : ?>
                                            <option value="<?php echo $k + 1; ?>"><?php echo $v; ?></option>
<?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <select class="selectpicker show-menu-arrow" name="personal_year" id="personal_year" style="width:95%;">
                                        <option value="">Year</option>
                                        <?php $year = '1930'; ?>
                                        <?php for ($i = $year; $i <= date('Y'); $i++) : ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php endfor; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="personal_contact_hp" class="col-sm-3 control-label">Contact(HP):<span style="color:#F00;">*</span></label>
                            <div class="col-sm-8 ">
                                <input type="text" id="personal_contact_hp" name="personal_contact_hp" class="form-control"
                                       placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="personal_contact_home" class="col-sm-3 control-label">Contact Home:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="personal_contact_home" id="personal_contact_home"
                                       placeholder="">
                            </div>
                            <div class="col-md-2 option"> (Optional) </div>
                        </div>
                        <div class="form-group">
                            <label for="personal_contact_office" class="col-sm-3 control-label">Contact Office:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="personal_contact_office" id="personal_contact_office"
                                       placeholder="">
                            </div>
                            <div class="col-md-2 option"> (Optional) </div>
                        </div>
                        <div class="form-group">
                            <label for="personal_email" class="col-sm-3 control-label">Email Address:<span style="color:#F00;">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="personal_email" id="personal_email" placeholder="" value="<?php echo!empty($user_data["email"]) ? $user_data["email"] : ""; ?>">
                                <input type="hidden" class="form-control" name="personal_h_email" id="personal_h_email" placeholder="" value="">
                                <span id="personal_email_result" class="glyphicon glyphicon-ok form-control-feedback"></span> </div>
                        </div>
                        <div class="form-group">
                            <label for="email_subscribe" class="col-sm-3 control-label">Email Subscribe:</label>
                            <div class="col-sm-8">
                                <input type="checkbox" name="personal_newsletter" id="personal_newsletter" value="1" class="checkBoxClass1"/>
                                Subscribe to Newsletters </div>
                        </div>
                        <div class="form-group">
                            <label for="personal_postal_code" class="col-sm-3 control-label">Postal:<span style="color:#F00;">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="personal_postal_code" name="personal_postal_code"
                                       placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="personal_address" class="col-sm-3 control-label">Address:<span style="color:#F00;">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="personal_address" name="personal_address"
                                       placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="unit_f" class="col-sm-3 control-label">Unit:</label>
                            <div class="col-sm-8">
                                <div class="col-sm-1 col-md-1 hash">#</div>
                                <div class="col-md-4 col-sm-4 name_fed">
                                    <input type="text" class="form-control" id="personal_unit_f" name="personal_unit_f"
                                           placeholder="">
                                </div>
                                <div class="col-sm-1 col-md-1 hash">-</div>
                                <div class="col-md-6 col-sm-6 unit">
                                    <input type="text" class="form-control" id="personal_unit_l" name="personal_unit_l"
                                           placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group has-success has-feedback">
                            <label class="control-label col-sm-3" for="personal_username">Username:<span style="color:#F00;">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" name="personal_username" class="form-control" id="personal_username">
                                <input type="hidden" name="personal_h_username" class="form-control" id="personal_h_username">
                                <span id="personal_user_result"  data-toggle="tooltip" class="glyphicon glyphicon-ok"></span> 
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-3 control-label">Password:<span style="color:#F00;">*</span></label>
                            <div class="col-sm-8">
                                <input type="password" name="personal_password" id="personal_password" class="form-control"
                                       placeholder="" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password" class="col-sm-3 control-label">Confirm Password:<span style="color:#F00;">*</span></label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="personal_confirm_password" name="personal_confirm_password"
                                       placeholder="" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-3 control-label"> <a class="btn btn-default black-bt" onclick="javascript: return prevTab('#tab');">Back</a> </div>
                            <div class="col-sm-5"> <a class="btn btn-primry1 next" onclick="javascript: return second('#tab');">Next</a> </div>
                        </div>
                    </div>
                </div>

                <!--------------------------------------------------------------------------USER SIGNUP END-------------------------------------------------------------------> 

                <!--------------------------------------------------------------------------ORGANISATIONS SIGNUP------------------------------------------------------------------->
                <div id="organisation_check" style="display: none">
                    <div id="error_msgs" style="color: red;padding-top:13px; text-align:center;width:50%"></div>
                    <h3> Organisational Account</h3>
                    <?php
                    if ($_GET['gmTrue'] == true) {//if signup through fb then hide gmail button
                        echo $google_data;
                    } else if ($_GET['gmTrue'] == true) {//if signup through gmail then hide fb button
                        echo $content;
                    } else {//by default show both button
                        echo $content;
                        echo $google_data;
                    }

                    $fb_data = array();
                    $user_data = array();
                    $session_gmail_data = array();

                    $fb_data = $this->session->userdata["facebook_data"]; //fetch facebook user details if session exists
                    $session_gmail_data = $this->session->userdata("register_gmail_data"); //fetch gmail user details if session exists

                    if ($fb_data <> "") {
                        $user_data = $fb_data;
                    } else if ($session_gmail_data <> "") {
                        $user_data = $session_gmail_data;
                    }
                    ?>
                    <div class="clearfix"></div>
                    <div class="form-horizontal organis_form" id="oraganisation_account">
                        <div class="form-group">
                            <label for="organisation_name" class="col-sm-3 control-label">Name Of Organisation:<span style="color:#F00;">*</span></label>
                            <div class="col-sm-8">
<?php if ($fb_data <> "") { ?>
                                    <input type="hidden" name="fid" id="fid" value="<?php echo!empty($user_data["fid"]) ? $user_data["fid"] : ""; ?>" />
<?php } else { ?>
                                    <input type="hidden" name="gid" id="gid" value="<?php echo!empty($user_data["gid"]) ? $user_data["gid"] : ""; ?>" />
                                <?php } ?>
                                <input type="text" class="form-control" id="organisation_name" name="organisation_name"  value="<?php echo!empty($user_data["name"]) ? $user_data["name"] : ""; ?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Location" class="col-sm-3 control-label">Location Type:<span style="color:#F00;">*</span></label>
                            <div class="col-sm-8">
                                <select id="organisation_location_type" name="organisation_location_type"  class="selectpicker show-menu-arrow input-xlarge nation">
                                    <option value="">Select Location</option>
                                    <option value="singapore">Singapore</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="Location" class="col-sm-3 control-label">Organisation type:<span style="color:#F00;">*</span></label>
                            <div class="col-sm-8">
                                <select id="organisation_type" name="organisation_type" class="selectpicker show-menu-arrow input-xlarge nation" onchange="show_ipc();">
                                    <option value="" >Select organisation type</option>
                                    <option value="company_charity">Company</option>
                                    <option value="charity_ipc" >Charity (IPC)</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="organisation_no" class="col-sm-3 control-label">Organisation Registration No:<span style="color:#F00;">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="organisation_no" id="organisation_no"
                                       placeholder="">
                            </div>
                        </div>
                        <div class="form-group" id="show_ipc_no" style="display:none">
                            <label for="organisation_no" class="col-sm-3 control-label">Ipc number:<span style="color:#F00;">*</span></label>
                            <div class="col-sm-8 ">
                                <input type="text" class="form-control" name="organisation_ipc_no" id="organisation_ipc_no" placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="organisation_person_incharge" class="col-sm-3 control-label">Person In-Charge:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="organisation_person_incharge" name="organisation_person_incharge"
                                       placeholder="">
                            </div>
                            <div class="col-md-2 option"> (Optional) </div>
                        </div>
                        <div class="form-group">
                            <label for="organisation_contact_office" class="col-sm-3 control-label">Contact Office:<span style="color:#F00;">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="organisation_contact_office" name="organisation_contact_office"
                                       placeholder="">
                            </div>
                            <!-- <div class="col-md-2 option"> (Optional) </div>--> 
                        </div>
                        <div class="form-group">
                            <label for="organisation_email" class="col-sm-3 control-label">Email Address:<span style="color:#F00;">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="organisation_email" name="organisation_email" placeholder="" value="<?php echo!empty($user_data["email"]) ? $user_data["email"] : ""; ?>" />
                                <input type="hidden" class="form-control" id="organisation_h_email" name="organisation_h_email" placeholder="" />
                                <span id="organisation_email_result" class="glyphicon glyphicon-ok form-control-feedback"></span> </div>
                        </div>
                        <div class="form-group">
                            <label for="email_subscribe" class="col-sm-3 control-label">Email Subscribe:</label>
                            <div class="col-sm-8">
                                <input type="checkbox" name="organisation_newsletter" id="organisation_newsletter" value="1" class="checkBoxClass1"/>
                                Subscribe to Newsletters </div>
                        </div>
                        <div class="form-group">
                            <label for="organisation_postal_code" class="col-sm-3 control-label">Postal:<span style="color:#F00;">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="organisation_postal_code" name="organisation_postal_code"
                                       placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="organisation_address" class="col-sm-3 control-label">Address:<span style="color:#F00;">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="organisation_address" name="organisation_address"
                                       placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="organisation_unit_f" class="col-sm-3 control-label">Unit:</label>
                            <div class="col-sm-8">
                                <div class="col-sm-1 col-md-1 hash">#</div>
                                <div class="col-md-4 col-sm-4 name_fed">
                                    <input type="text" class="form-control" id="organisation_unit_f" name="organisation_unit_f"
                                           placeholder="">
                                </div>
                                <div class="col-sm-1 col-md-1 hash">-</div>
                                <div class="col-md-6 col-sm-4 unit">
                                    <input type="text" class="form-control" id="organisation_unit_l" name="organisation_unit_l"
                                           placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group has-success has-feedback">
                            <label class="control-label col-sm-3" for="organisation_username">Username:<span style="color:#F00;">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="organisation_username" name="organisation_username">
                                <input type="hidden" class="form-control" id="organisation_h_username" name="organisation_h_username" value="">
                                <span id="organisation_user_result" class="glyphicon glyphicon-ok"></span> </div>
                        </div>
                        <div class="form-group">
                            <label for="organisation_password" class="col-sm-3 control-label">Password:<span style="color:#F00;">*</span></label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="organisation_password" name="organisation_password"
                                       placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="organisation_confirm_password" class="col-sm-3 control-label">Confirm Password:<span style="color:#F00;">*</span></label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="organisation_confirm_password" name="organisation_confirm_password"
                                       placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-3 control-label"> <a class="btn btn-default black-bt" onclick="javascript: return prevTab('#tab');">Back</a> </div>
                            <div class="col-sm-5"> <a class="btn btn-primry1 next" onclick="javascript: return second('#tab');">Next</a> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane tab-3" id="additional_information"> 
                <!-- <h3> Donor Information</h3> -->
                <div class="clearfix"></div>
                <div id="message"> <font color='red'><?php echo $this->session->flashdata('signup_errormsg'); ?></font> <font color='green' style="margin:15px 0 0 0; float:left;"><?php echo $this->session->flashdata('signup_successmsg'); ?></font> </div>
                <div>
                    <div class="col-md-10  col-sm-10 col-xs-12  default-acnt "> 
                    </div>
                    <div class="clearfix"></div>
                    <span id="error_msgs1" ></span>
                    <h3 class="select-payment">Payment Information (optional)</h3>
                    <div class="clearfix"></div>
                    <span>
                        <div class="col-md-6 col-sm-10 col-xs-12 name_fed mnt_mb2">
                            <div class="form-group mnt_credit_option">
                                <label class="col-sm-3 col-xs-12 control-label col-md-4" for="c_name">Credit Card:<span style="color:#F00;">*</span></label>
                                <div class="col-sm-2 col-xs-3">
                                    <input type="radio" name="card" id="visa" value="visa" class="radio-button" rel="0">
                                    <img style="margin:-5px 0 0 3px;" src="<?php echo base_url(); ?>images/thumbs/visa_small.gif" /> </div>
                                <div class="col-sm-2 col-xs-3">
                                    <input type="radio" name="card" id="master" value="mastercard" class="radio-button" rel="0">
                                    <img style="margin:-5px 0 0 3px;" src="<?php echo base_url(); ?>images/thumbs/mastercd_small.gif" /> </div>
                                <div class="col-sm-2 col-xs-3">
                                    <input type="radio" name="card" id="discover" value="discover" class="radio-button" rel="0">
                                    <img style="margin:-5px 0 0 3px;" src="<?php echo base_url(); ?>images/thumbs/discovercard_sm.gif" /> </div>
                                <div class="col-sm-2 col-xs-3">
                                    <input type="radio" name="card" id="amax" class="radio-button" rel="0" value="amax">
                                    <img style="margin:-5px 0 0 3px;" src="<?php echo base_url(); ?>images/thumbs/amex_small.gif" /> </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-6 col-sm-6 col-xs-12 name_fed mnt_mb2">
                            <div class="form-group">
                                <label class="col-sm-5 col-md-4 control-label" for="cc_number">Credit Card Number:<span style="color:#F00;">*</span></label>
                                <div class="col-sm-7 name_fed">
                                    <input type="text" placeholder="" name="cnumber" id="cnumber" class="form-control name_input">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 name_fed mnt_mb2">
                            <div class="form-group">
                                <label class="col-sm-5 control-label col-md-3" for="cv_number">CVV Number:<span style="color:#F00;">*</span></label>
                                <div class="col-sm-5 name_fed">
                                    <input type="password" placeholder="" name="cvc" id="cvc" class="form-control name_input">
                                </div>
                                <div class="col-sm-2 col-md-3  mnt_cvv" for="cv_number_details"><a target="_blank" href="http://www.cvvnumber.com/">What is CVV number?</a></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-8 col-xs-12 name_fed mnt_mb2">
                            <div class="form-group mnt_select_margin">
                                <label class="col-sm-4 col-md-4 control-label" for="exp_date">Expiration Date:<span style="color:#F00;">*</span></label>
                                <div class="col-sm-3 name_fed mnt_select">
                                    <select class="selectpicker show-menu-arrow form-control" name="exp_month" id="exp_month">
                                        <option value="">Month</option>
<?php
$month_names = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
$count = 1;
?>
                                        <?php foreach ($month_names as $mo) : ?>
                                            <option value="<?php echo $count; ?>"><?php echo $mo; ?></option>
                                            <?php $count++; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-sm-3 name_fed mnt_select">
                                    <select class="selectpicker show-menu-arrow form-control" name="exp_year" id="exp_year">
                                        <option value="">Year</option>
<?php $years_arr = range(date(Y), date(Y) + 50) ?>
<?php foreach ($years_arr as $yr) : ?>
                                            <option value="<?php echo $yr; ?>"><?php echo $yr; ?></option>
<?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </span> 
                    
                    <div class="col-sm-6 col-md-12 col-xs-12 mnt_btn_xs_12">
                        <div class="col-sm-8  col-xs-12 mnt_ok_btn"> 
                            <input type="checkbox" id="terms_condition" value="" /> I accept the <a href="<?php echo base_url(); ?>pages/terms/" target="_blank"  style="text-decoration:underline;">Terms & conditions</a> for using of <?php echo $this->config->item('sitename');?>.
                            <!--<a class="btn btn-default black-bt"   href="<?php echo base_url(); ?>cause/">Skip</a>-->
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8 mnt_form_style">
                                <span class="processing"><img id="error_msgs2"  style="display:none" src='<?php echo base_url();?>images/gif-load.gif' ></span>
                                <button id="signup_btn" type="button" class="btn btn-default login_cstm" onclick="return save_user();">CONFIRM</button>
                            </div>
                        </div>

                        <!--<div class="col-sm-3 col-xs-12 mnt_ok_btn">
                                <button class="btn btn-primry1 next mnt_center" type="button" onclick="return save_card();">Submit</button>
                               
                                </div>--> 
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>
<!--end-->

</div>
<!--end-->
</div>
<script>
    function submit_register() {
        document.getElementById("signup_form").submit();
    }
</script> 
<script type="text/javascript">
    function nextTab(elem) {
        $(elem + ' li.active').next().find('a[data-toggle="tab"]').click();
    }

    function prevTab(elem) {
        $(elem + ' li.active').prev().find('a[data-toggle="tab"]').click();
    }
	jQuery.ajaxSetup ({
  	 cache: false
	});
    function setUserType(user_type)
    {
        //alert(user_type);
        $.ajax({
            type: 'GET',
            url: BASEURL + 'logins/setUserType/',
            data: {'user_type': user_type},
			success: function(rep)
            {
                if (rep.trim() == "personal")
                {
                    $("#personal_email").trigger("blur");
                    $("#personal_username").trigger("blur");
                    $("#register_user_type").val(rep);
                }
                else {
                    $("#organisation_email").trigger("blur");
                    $("#organisation_username").trigger("blur");
                    $("#register_user_type").val(rep);
                }

            }
        });
    }
    function first(elem) {
        var personal_check = $("#personal_check").is(":checked") ? '1' : '0';
        var oraganise_check = $("#oraganise_check").is(":checked") ? '1' : '0';

        if (personal_check == 0 && oraganise_check == 0)
        {
			swal("Oops something wrong", "Please Select atleast one option", "error");
			//alert("Please Select any option");
            return false;
        }
        else if (personal_check == 1)
        {
            $("#personal_form_check").css("display", 'block');
            $("#organisation_check").css("display", 'none');
            setUserType("personal");//set usertype into session means who is getting registered
            nextTab(elem);

        }
        else if (oraganise_check == 1)
        {
            $("#organisation_check").css("display", 'block');
            $("#personal_form_check").css("display", 'none');
            setUserType("organisation");//set usertype into session means who is getting registered
            nextTab(elem);
        }
    }

    function second(elem) {

        var type = $("#register_user_type").val().trim();
		
        if (type == "personal")
        {
            var personal_check = 1;
        }
        else {
            var oraganise_check = 1;
        }
        /*var personal_check = $("#personal_check").is(":checked") ? '1' : '0';
         var oraganise_check = $("#oraganise_check").is(":checked") ? '1' : '0';*/
        if (personal_check == 1) {
            var personal_full_name = $("#personal_full_name").val().trim();
            var personal_nationality = $("#personal_nationality").val().trim();
            var personal_identification_type = $("#personal_identification_type").val().trim();
            var personal_identification_number = $("#personal_identification_number").val().trim();
            var female = $("#female").is(":checked") ? 1 : 0;
            var male = $("#male").is(":checked") ? 1 : 0;
            var personal_date = $("#personal_date").val().trim();
            var personal_month = $("#personal_month").val().trim();
            var personal_year = $("#personal_year").val().trim();
            var personal_contact_hp = $("#personal_contact_hp").val().trim();
            var personal_email = $("#personal_email").val().trim();
            var personal_h_email = $("#personal_h_email").val().trim();
            var personal_postal_code = $("#personal_postal_code").val().trim();
            var personal_address = $("#personal_address").val().trim();
            var personal_unit_f = $("#personal_unit_f").val().trim();
            var personal_unit_l = $("#personal_unit_l").val().trim();
            var personal_username = $("#personal_username").val().trim();
            var personal_h_username = $("#personal_h_username").val().trim();
            var personal_password = $("#personal_password").val().trim();
            var personal_confirm_password = $("#personal_confirm_password").val().trim();
			
            var regex = /^[a-zA-Z0-9.'+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            var email_regex = /^[a-zA-Z0-9.'+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            var full_name_regex = /^[a-zA-Z\s.]{3,25}$/i;//only letters, period(.),space get accepted
            var user_name_regex = /^[a-zA-Z0-9._\-]{3,34}$/i;//numeric, alphabets,Underscore, hyphen, dot
            var password_regex = /^[a-zA-Z0-9!-@#$%^&*()_]{6,15}$/;
            var phone_regex = /[0-9-()+]{10,20}/;
            var float_regex = '[-+]?([0-9]*.[0-9]+|[0-9]+)'; ////match ints and floats/decimals
            var zip_regex = /^[a-zA-Z0-9]{3,12}$/i;//numeric, alphabets 3-12 in length
			
			if (personal_full_name == "") {
                var response = 'error';
                var message = "Please enter name";
                $("#personal_full_name").focus();
            }
            else if (!full_name_regex.test(personal_full_name)) {
                var response = 'error';
                var message = "only letters,period(.),space is allowed and name must be between 3 to 25 characters";
                $("#personal_full_name").focus();
            }
            else if (personal_nationality == "") {
                var response = 'error';
                var message = "Please select nationality";
                $("#personal_nationality").focus();
            }
            else if (personal_identification_type == "") {
                var response = 'error';
                var message = "Please select identification type";
                $("#personal_identification_type").focus();
            }
            else if (personal_identification_number == "") {
                var response = 'error';
                var message = "Please enter identification number";
                $("#personal_identification_number").focus();
            }
            else if (female == 0 && male == 0) {
                var response = 'error';
                var message = "Please select gender";
                $("#female").focus();
            }

            else if (personal_date == "") {
                var response = 'error';
                var message = "Please select date";
                $("#personal_date").focus();
            }

            else if (personal_month == "") {
                var response = 'error';
                var message = "Please select month";
                $("#personal_month").focus();
            }

            else if (personal_year == "") {
                var response = 'error';
                var message = "Please select year";
                $("#personal_year").focus();
            }

            else if (personal_contact_hp == "") {
                var response = 'error';
                var message = "Please enter Contact (HP)";
                $("#personal_contact_hp").focus();
            }

            else if (personal_email == "") {
                var response = 'error';
                var message = "Please enter email id";
                $("#personal_email").focus();
            }

            else if (personal_h_email == "0") {
                var response = 'error';
                var message = "Please enter another email id";
                $("#personal_email").focus();
            }

            else if (!email_regex.test($("#personal_email").val())) {
                var error = "error";
                var message = "Please Enter correct email";
                $('#personal_email').focus();
            }
            else if (personal_postal_code == "") {
                var response = 'error';
                var message = "Please enter postal code";
                $("#personal_postal_code").focus();
            }
            else if (!zip_regex.test(personal_postal_code)) {
                var response = 'error';
                var message = "zip code should be between 3 to 12 character and alphanumeric values are allowed";
                $("#personal_postal_code").focus();
            }
            else if (personal_address == "") {
                var response = 'error';
                var message = "Please enter address";
                $("#personal_address").focus();
            }
           /* else if (personal_unit_f == "") {
               // $("#personal_full_name,#personal_nationality,#personal_identification_type,#personal_identification_number,#female,#personal_date,#personal_month,#personal_year,#personal_contact_hp,#personal_email,#personal_postal_code,#personal_address").css("background-color", "rgba(146, 216, 148, 0.3)");
                var response = 'error';
                var message = "Please enter unit";
                $("#personal_unit_f").focus();
               // $("#personal_unit_f").css("background-color", "rgba(255, 0, 0, 0.3)");
            }
            else if (personal_unit_l == "") {
               // $("#personal_full_name,#personal_nationality,#personal_identification_type,#personal_identification_number,#female,#personal_date,#personal_month,#personal_year,#personal_contact_hp,#personal_email,#personal_postal_code,#personal_address,#personal_unit_f").css("background-color", "rgba(146, 216, 148, 0.3)");
                var response = 'error';
                var message = "Please enter unit";
                $("#personal_unit_l").focus();
               // $("#personal_unit_l").css("background-color", "rgba(255, 0, 0, 0.3)");
            }*/
            else if (personal_username == "") {
                var response = 'error';
                var message = "Please enter username";
                $("#personal_username").focus();
            }
            else if (!user_name_regex.test(personal_username)) {
                var response = 'error';
                var message = "Only numeric, letters, underscore, hyphen and dot are allowed. Space is not allowed in username and username must be between 3 to 34 characters";
                $("#personal_username").focus();
            }
            else if (personal_h_username == "0") {
                var response = 'error';
                var message = "Please enter username";
                $("#personal_username").focus();
            }
            else if (personal_h_username == "2") {
                var response = 'error';
                var message = "Username must be between 3 to 34 characters";
                $("#personal_username").focus();
            }
            else if (personal_password == "") {
                var response = 'error';
                var message = "Please enter password";
                $("#personal_password").focus();
            }

            else if (!password_regex.test(personal_password)) {
                var response = 'error';
                var message = "Password must be between 6 to 15 characters";
                $("#personal_password").focus();
            }

            else if (personal_confirm_password == '') {
                var response = 'error';
                var message = "Please enter confirm password";
                $("#personal_confirm_password").focus();
            }
            else if (!password_regex.test(personal_confirm_password)) {
                var response = 'error';
                var message = "Confirm password must be between 6 to 15 characters";
                $("#personal_confirm_password").focus();
            }
			
            else if (personal_password != personal_confirm_password) {
				
                var response = 'error';
                var message = "Please enter same password in confirm password";
                $("#personal_confirm_password").focus();
            }
			else{
				var response = 'success';
				var message = 'success';
			}
	
            if (message != '' && message != null)
            {
                if (response == 'error') {
                    jQuery('html,body').animate({scrollTop: 0}, 500);
                    // window.scrollTo(0,400);
                    $('#error_msg').html(message).show().css({'color': 'red'});
                    return false;
                }
				else {
					$('#error_msg').html("");
					submit_register();
					nextTab(elem);
				}
            } 
			
        }
        else if (oraganise_check == 1) {

            var organisation_name = $("#organisation_name").val();
            var organisation_location_type = $("#organisation_location_type").val();
            var organisation_type = $("#organisation_type").val();
            var organisation_no = $("#organisation_no").val();
            var organisation_ipc_no = $("#organisation_ipc_no").val();
            var organisation_contact_office = $("#organisation_contact_office").val();
            var organisation_email = $("#organisation_email").val();
            var organisation_postal_code = $("#organisation_postal_code").val();
            var organisation_address = $("#organisation_address").val();
            var organisation_unit_f = $("#organisation_unit_f").val();
            var organisation_unit_l = $("#organisation_unit_l").val();
            var organisation_username = $("#organisation_username").val();
            var organisation_h_username = $("#organisation_h_username").val();
            var organisation_h_email = $("#organisation_h_email").val();
            var organisation_password = $("#organisation_password").val();
            var organisation_confirm_password = $("#organisation_confirm_password").val();
            
			var regex = /^[a-zA-Z0-9.'+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            var email_regex = /^[a-zA-Z0-9.'+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
			///^[ A-Za-z0-9_@./#&+-]*$/;
            var full_name_regex = /^[a-zA-Z\s.]{3,25}$/i;//only letters, period(.),space get accepted
            var user_name_regex = /^[a-zA-Z0-9._\-]{3,34}$/i;//numeric, alphabets,Underscore, hyphen, dot
            var password_regex = /^[a-zA-Z0-9!-@#$%^&*()_]{6,15}$/;
            var phone_regex = /[0-9-()+]{10,20}/;
            var zip_regex = /^[a-zA-Z0-9]{3,12}$/i;//numeric, alphabets 3-12 in length

            if (organisation_name == "") {
                var response = 'error';
                var message = "Please enter name of organisation";
                $("#organisation_name").focus();
            }
           /* else if (!full_name_regex.test(organisation_name)) {
                var response = 'error';
                var message = "only letters,period(.),space is allowed and name must be between 3 to 25 characters";
                $("#organisation_name").focus();
                $("#organisation_name").css("background-color", "rgba(255, 0, 0, 0.3)");
            }*/
            else if (organisation_location_type == "") {
                var response = 'error';
                var message = "Please select location";
                $("#organisation_location_type").focus();
            }
            else if (organisation_type == "") {
                var response = 'error';
                var message = "Please select organisation type";
                $("#organisation_type").focus();
            }
            else if (organisation_no == "") {
                var response = 'error';
                var message = "Please enter registration number";
                $("#organisation_no").focus();
            }
            else if (organisation_type == "charity_ipc")
            {
                if (organisation_ipc_no == "") {
                    var response = 'error';
                    var message = "Please enter organisation ipc number";
                    $("#organisation_ipc_no").focus();
                }
                else if (organisation_contact_office == "") {
                    var response = 'error';
                    var message = "Please enter contact office";
                    $("#organisation_contact_office").focus();
                }
                else if (organisation_email == "") {
                    var response = 'error';
                    var message = "Please enter email id";
                    $("#organisation_email").focus();
                }
                else if (!regex.test($("#organisation_email").val())) {
                    var error = "error";
                    var message = "Please Enter correct email";
                    $('#organisation_email').focus();
                }
                else if (organisation_h_email == "0") {
                    var response = 'error';
                    var message = "Please enter other email id";
                    $("#organisation_email").focus();
                }
                else if (organisation_postal_code == "") {
                    var response = 'error';
                    var message = "Please enter postal code";
                    $("#organisation_postal_code").focus();
                }
                else if (!zip_regex.test(organisation_postal_code)) {
                    var response = 'error';
                    var message = "zip code should be between 3 to 12 character and alphanumeric values are allowed";
                    $("#organisation_postal_code").focus();
                }
                else if (organisation_address == "") {
                    var response = 'error';
                    var message = "Please enter organisation address";
                    $("#organisation_address").focus();
                }
                else if (organisation_unit_f == "") {
                    var response = 'error';
                    var message = "Please enter unit";
                    $("#organisation_unit_f").focus();
                }
                else if (organisation_unit_l == "") {
                    var response = 'error';
                    var message = "Please enter unit";
                    $("#organisation_unit_l").focus();
                }
                else if (organisation_username == "") {
                    var response = 'error';
                    var message = "Please enter username";
                    $("#organisation_username").focus();
                }
                else if (organisation_h_username == "0") {
                    var response = 'error';
                    var message = "Please select other username";
                    $("#organisation_username").focus();
                }
                else if (personal_email == "") {
                    var response = 'error';
                    var message = "Please enter email id";
                    $("#personal_email").focus();
                }
                else if (organisation_password == "") {
                    var response = 'error';
                    var message = "Please enter password";
                    $("#organisation_password").focus();
                }
                else if (!password_regex.test(organisation_password)) {
                    var response = 'error';
                    var message = "Password must be between 6 to 15 characters";
                    $("#organisation_password").focus();
                }
                else if (organisation_confirm_password == '') {
                    var response = 'error';
                    var message = "Please enter confirm password";
                    $("#personal_confirm_password").focus();
                }
                else if (!password_regex.test(organisation_confirm_password)) {
                    var response = 'error';
                    var message = "Password must be between 6 to 15 characters";
                    $("#organisation_password").focus();
                }
                else if (organisation_confirm_password != organisation_password) {
                    var response = 'error';
                    var message = "Please enter same password in confirm password";
                    $("#organisation_confirm_password").focus();
                }
            }
            else if (organisation_contact_office == "") {
                var response = 'error';
                var message = "Please enter contact office";
                $("#organisation_contact_office").focus();
            }
            else if (organisation_email == "") {
                var response = 'error';
                var message = "Please enter email id";
                $("#organisation_email").focus();
            }
            else if (!email_regex.test($("#organisation_email").val())) {
                var error = "error";
                var message = "Please Enter correct email";
                $('#organisation_email').focus();
            }
            else if (organisation_h_email == "0") {
                var response = 'error';
                var message = "Please enter other email id";
                $("#organisation_email").focus();
            }
            else if (organisation_postal_code == "") {
                var response = 'error';
                var message = "Please enter postal code";
                $("#organisation_postal_code").focus();
            }
            else if (!zip_regex.test(organisation_postal_code)) {
                var response = 'error';
                var message = "zip code should be between 3 to 12 character and alphanumeric values are allowed";
                $("#organisation_postal_code").focus();
            }
            else if (organisation_address == "") {
                var response = 'error';
                var message = "Please enter organisation address";
                $("#organisation_address").focus();
            }
           /* else if (organisation_unit_f == "") {
                var response = 'error';
                var message = "Please enter unit";
                $("#organisation_unit_f").focus();
            }
            else if (organisation_unit_l == "") {
                var response = 'error';
                var message = "Please enter unit";
                $("#organisation_unit_l").focus();
            }*/
            else if (organisation_username == "") {
                var response = 'error';
                var message = "Please enter username";
                $("#organisation_username").focus();
            }
            else if (organisation_h_username == "0") {
                var response = 'error';
                var message = "Please select other username";
                $("#organisation_username").focus();
            }
            else if (organisation_h_username == "2") {
                var response = 'error';
                var message = "Username must be between 3 to 34 characters";
                $("#organisation_username").focus();
            }
            else if (organisation_password == "") {
                var response = 'error';
                var message = "Please enter password";
                $("#organisation_password").focus();
            }
            else if (!password_regex.test(organisation_password)) {
                var response = 'error';
                var message = "Password must be between 6 to 15 characters";
                $("#organisation_password").focus();
            }
            else if (organisation_confirm_password == '') {
                var response = 'error';
                var message = "Please enter confirm password";
                $("#personal_confirm_password").focus();
            }
            else if (!password_regex.test(organisation_confirm_password)) {
                var response = 'error';
                var message = "Password must be between 6 to 15 characters";
                $("#personal_confirm_password").focus();
            }
            else if (organisation_confirm_password != organisation_password) {
                var response = 'error';
                var message = "Please enter same password in confirm password";
                $("#organisation_confirm_password").focus();
            }
			else{
				var response = 'success';
				var message = 'success';
			}
            if (message != '' && message != null)
            {
                if (response == 'error')
                {
                    jQuery('html,body').animate({scrollTop: 0}, 500);
                    //window.scrollTo(0,400);
                    $('#error_msgs').html(message).show().css({'color': 'red'});
                    return false;
                }
				 else {
					$('#error_msgs').html("");
					submit_register();
					nextTab(elem);
				}
            }
           
        }
    }
</script> 
<script type="text/javascript">
    $(document).ready(function() {

        $("#personal_username").on("blur keyup", function(e) {
            var user = $(this).val(); //get the string typed by user
            $.post('<?php echo base_url() ?>logins/check_username_availability', {'username': user}, function(data) { //make ajax call to check_username.php
                //$("#personal_user_result").html(data); //dump the data received from PHP page
                 
                
				if (data.trim() == "error") {
					$("#personal_user_result").removeClass("glyphicon-ok");
                    $("#personal_user_result").addClass("glyphicon-remove");
                    $("#personal_user_result").css("color", "red");
                    $("#personal_h_username").val("2");
					var len = $('.space_err').length;
					if(len == 0){
						$("#personal_user_result").after('<div class="space_err">No space allowed</div>');
					}
                }
                else if (data.trim() != "Available") {
                    $("#personal_user_result").addClass("glyphicon-remove");
					$("#personal_user_result").removeClass("glyphicon-ok");
                    $("#personal_user_result").css("color", "red");
                    $("#personal_h_username").val("0");
                } else {
                    $("#personal_user_result").removeClass("glyphicon-remove");
                    $("#personal_user_result").addClass("glyphicon-ok");
                    $("#personal_user_result").css("color", "#3c763d");
                    $("#personal_h_username").val("1");
					$('#personal_user_result').nextAll('div.space_err').remove();
                }
            });
        });

        $("#organisation_username").on("blur keyup", function(e) {
            var username = $(this).val(); //get the string typed by user
            $.post('<?php echo base_url() ?>logins/check_username_availability', {'username': username}, function(data) { //make ajax call to check_username.php
                //$("#personal_user_result").html(data); //dump the data received from PHP page
                if (data.trim() == "error") {
                    $("#organisation_user_result").removeClass("glyphicon-ok");
                    $("#organisation_user_result").addClass("glyphicon-remove");
                    $("#organisation_user_result").css("color", "red");
                    $("#organisation_h_username").val("2");
					var len = $('.space_err').length;
					if(len == 0){
						$("#organisation_user_result").after('<div class="space_err">No space allowed</div>');
					}
                }
                else if (data.trim() != "Available") {
					$("#organisation_user_result").addClass("glyphicon-remove");
                    $("#organisation_user_result").removeClass("glyphicon-ok");
                    $("#organisation_user_result").css("color", "red");
                    $("#organisation_h_username").val("0");
					//$("#organisation_user_result").find('div.space_err').remove();
                }
				
                else {
				    $("#organisation_user_result").removeClass("glyphicon-remove");
                    $("#organisation_user_result").addClass("glyphicon-ok");
                    $("#organisation_user_result").css("color", "#3c763d");
                    $("#organisation_h_username").val("1");
					$('#organisation_user_result').nextAll('div.space_err').remove();
                }
            });
        });
        $("#personal_email").on("blur keyup", function(e) {
            var email = $(this).val(); //get the string typed by user
            $.post('<?php echo base_url() ?>logins/check_email_availability', {'email': email}, function(data) { //make ajax call to check_username.php
                //$("#personal_user_result").html(data); //dump the data received from PHP page
				
                if (data.trim() != "Available" || data.trim() == "") {
                    $("#personal_email_result").removeClass("glyphicon-ok");
                    $("#personal_email_result").addClass("glyphicon-remove");
                    $("#personal_email_result").css("color", "red");
					$("#personal_h_email").val("0");

                } else {
                    $("#personal_email_result").removeClass("glyphicon-remove");
                    $("#personal_email_result").addClass("glyphicon-ok");
                    $("#personal_email_result").css("color", "#3c763d");
                    $("#personal_h_email").val("1");
                }
            });
        });

        $("#organisation_email").on("blur keyup", function(e) {
            var email = $(this).val(); //get the string typed by user
            $.post('<?php echo base_url() ?>logins/check_email_availability', {'email': email}, function(data) { //make ajax call to check_username.php
                //$("#personal_user_result").html(data); //dump the data received from PHP page
                if (data.trim() != "Available" || data.trim() == "") {
                    $("#organisation_email_result").removeClass("glyphicon-ok");
                    $("#organisation_email_result").addClass("glyphicon-remove");
                    $("#organisation_email_result").css("color", "red");
                    $("#organisation_h_email").val("0");
                } else {
                    $("#organisation_email_result").removeClass("glyphicon-remove");
                    $("#organisation_email_result").addClass("glyphicon-ok");
                    $("#organisation_email_result").css("color", "#3c763d");
                    $("#organisation_h_email").val("1");
                }
            });
        });

        /*
         CLIENT ASKED TO REMOVE IT FOR THE TIME SO THATS Y WE ARE COMMENTING IT 
         $("#personal_postal_code").on("blur", function (e) {
         var personal_nationality = $("#personal_nationality").val();
         var personal_postal_code = $("#personal_postal_code").val();
         
         
         if(personal_nationality == ""){
         var response = 'error';
         var message = "Please select nationality";
         $("#personal_nationality").focus();
         }
         
         else if(personal_postal_code != ""){
         $.ajax({
         type : 'POST',
         url  : BASEURL+'logins/get_address/',
         data : {'personal_nationality':personal_nationality, 'personal_postal_code': personal_postal_code},
         beforeSend : function(){
         //$('#loading_'+dish_id).show();
         },
         success: function(rep){
         
         obj = JSON.parse(rep);
         if(obj == 'error')
         {
         $('#personal_address').val('');
         alert("No result found");
         }
         else
         {
         $('#personal_address').val(obj);
         }
         }
         });
         return false;
         }
         });
         
         $("#organisation_address").on("blur", function (e) {
         var organisation_location_type = $("#organisation_location_type").val();
         var organisation_postal_code = $("#organisation_postal_code").val();
         
         
         if(organisation_location_type == ""){
         var response = 'error';
         var message = "Please select location type";
         $("#organisation_location_type").focus();
         }
         
         else if(organisation_postal_code !=""){
         $.ajax({
         type : 'POST',
         url  : BASEURL+'logins/get_address1/',
         data : {'organisation_location_type':organisation_location_type, 'organisation_postal_code': organisation_postal_code},
         beforeSend : function(){
         //$('#loading_'+dish_id).show();
         },
         success: function(rep){
         
         obj = JSON.parse(rep);
         if(obj == 'error')
         {
         $('#organisation_address').val('');
         alert("No result found");
         }
         else
         {
         $('#organisation_address').val(obj);
         }
         }
         });
         return false;
         }
         });
         */
    });
    function show_ipc() {
        var val = $("#organisation_type").val();

        if (val == "charity_ipc") {
            $("#show_ipc_no").show();
        }
        else {
            $("#show_ipc_no").hide();
        }
    }
</script>
<?php 
if($_GET["error"] == "access_denied"){
 $u = '';
 $u = $this->session->userdata("register_user_type");	
?>
<script>
$(document).ready(function() {
	$("#personal_form_check").css("display", 'none');
	$("#organisation_check").css("display", 'none');
	$("#register_user_type").val('<?php echo $u; ?>');
	/*$("#personal_email").trigger("blur");
	$("#personal_username").trigger("blur");
	return nextTab('#tab');*/
});
</script>
<?php }?>
<?php
if (($_GET["fbTrue"] == "true" || $_GET["gmTrue"] == "true") && $_GET["error"] !="access_denied") {
    $u = '';
    $u = $this->session->userdata("register_user_type");
   
    if ($u == "personal") {
        ?>
        <script>
            $(document).ready(function() {
                $("#personal_form_check").css("display", 'block');
                $("#organisation_check").css("display", 'none');
                $("#personal_email").trigger("blur");
                $("#personal_username").trigger("blur");
                $("#register_user_type").val('<?php echo $u; ?>');
                return nextTab('#tab');
            });
        </script>
    <?php } ?>
    <?php if ($u == "organisation") { ?>
        <script>
            $(document).ready(function() {
                $("#personal_form_check").css("display", 'none');
                $("#organisation_check").css("display", 'block');
                $("#organisation_email").trigger("blur");
                $("#organisation_username").trigger("blur");
                $("#register_user_type").val('<?php echo $u; ?>');
                return nextTab('#tab');
            });
        </script>
    <?php }
} ?>
<?php if ($_GET["return"] == "true") { ?>
    <script>
        $(document).ready(function() {
            nextTab('#tab');
            //$("#tab li #input_particular").removeClass("active");
            $("#personal_form_check").css("display", 'none');
            $("#organisation_check").css("display", 'none');
            $("#additional_information").css("display", 'block');
            nextTab('#tab');
        });
    </script>
<?php } else { ?>
<?php } ?>

<script type="text/javascript">


    function save_user() {

        var terms = $("#terms_condition").is(":checked") ? 1 : 0;
        var method = $('#method').val();
        var card = $('input[name=card]:checked').val() ? 1 : 0;
		var cnumber = $('#cnumber').val();
        var cvc = $('#cvc').val();
        var exp_month = $('#exp_month').val();
        var exp_year = $('#exp_year').val();

		
        if (terms == 0) {
            var error = "Please agree to terms and conditions";
            $('#error_msgs1').html(error).show().css({'color': 'red'});
            return false;
        }
        else if (cnumber != "" || cvc != "" || exp_month != "" || exp_year != "") {
			if(card==0){
            	var error = "Please select credit card type";
           	 	$('#error_msgs1').html(error).show().css({'color': 'red'});
            	return false;
			}
			else{
				 save_card();
			}
        }
        else if (card == 1) {
            //alert("hiii");
            save_card();
        }
        else {
            /*	SEND EMAIL TO THE USERS */
            $.ajax({
                type: 'POST',
                url: BASEURL + 'logins/send_email/',
                data: {},
                beforeSend: function() {
                    $('#error_msgs1').html('<font  style="color:red">Processing.....Please wait couple of minutes.</font>');
					$('#error_msgs2').show();
                    $('#signup_btn').hide();
					$("input[type=radio]").attr('disabled', true);
                    $('.login_cstm').prop('disabled', true);
                    $('input').prop('disabled', true);
                    $('select').prop('disabled', true);
                },
                success: function(rep) {
                    $("input[type=radio]").attr('disabled', false);
                    $('input').prop('disabled', false);
                    $('.login_cstm').prop('disabled', false);
                    $('select').prop('disabled', false);
					$('#error_msgs2').hide();
					$('#signup_btn').show();
                    var result = eval("(" + rep + ")");
                    if (result['status'] == 'error') {
                        $('#error_msgs1').html(result['msg']).show().css({'color': 'red'});
                    }
                    else {
                        setTimeout(function() {
                            window.location = BASEURL + 'home/';
                        }, 5000);
                        $('#error_msgs1').html(result['msg']).show().css({'color': 'green'});
                    }
                }
            });
        }
    }


    function save_card() {

        var num = /^[0-9\ ]+$/;
        var method = $('#method').val();
		var card = $('input[name=card]:checked').val();
		var cnumber = $('#cnumber').val();
        var cvc = $('#cvc').val();
        var exp_month = $('#exp_month').val();
        var exp_year = $('#exp_year').val();


        if (!$('input[name=card]:checked').val())
        {
            var error = "Please select credit card";
            $('#error_msgs1').html(error).show().css({'color': 'red'});
            return false;
        }
        else if (cnumber == "")
        {
            var error = "Please enter credit card number";
            $('#error_msgs1').html(error).show().css({'color': 'red'});
            return false;
        }
        else if (cvc == "")
        {
            var error = "Please enter cvc number";
            $('#error_msgs1').html(error).show().css({'color': 'red'});
            return false;
        }
        else if (exp_month == "")
        {
            var error = "Please select expiration month.";
            $('#error_msgs1').html(error).show().css({'color': 'red'});
            return false;
        }
        else if (exp_year == "")
        {
            var error = "Please select  expiration year.";
            $('#error_msgs1').html(error).show().css({'color': 'red'});
            return false;
        }
        else {
            $.ajax({
                type: 'POST',
                url: BASEURL + 'donation/save_card/',
                data: {'card': card, 'cnumber': cnumber, 'cvc': cvc, 'exp_month': exp_month, 'exp_year': exp_year},
                beforeSend: function() {
                    $('#error_msgs1').html('<font  style="color:red">Processing.....Please wait couple of minutes.</font>');
                    $("input[type=radio]").attr('disabled', true);
                    $('.login_cstm').prop('disabled', true);
                    $('input').prop('disabled', true);
                    $('select').prop('disabled', true);
                },
                success: function(rep) {
                    $("input[type=radio]").attr('disabled', false);
                    $('input').prop('disabled', false);
                    $('.login_cstm').prop('disabled', false);
                    $('select').prop('disabled', false);
                    var result = eval("(" + rep + ")");
                    if (result['status'] == 'error') {
                        $('#error_msgs1').html(result['msg']).show().css({'color': 'red'});
                    }
                    else {
                        setTimeout(function() {
                            window.location = BASEURL + 'home/';
                        }, 5000);
                        $('#error_msgs1').html(result['msg']).show().css({'color': 'green'});
                    }
                },
				error: function(rep,exception){
					//$('#'+formid).find('radio, textarea, select, checkbox, input, file').prop('disabled',true);
						if (rep.status === 0) {
							alert('Please check your internet connection .\n Verify Network.');
						} else if (rep.status == 404) {
							alert('Requested page not found. [404]');
						} else if (rep.status == 500) {
							alert('Internal Server Error [500].');
						} else if (exception === 'parsererror') {
							alert('Requested JSON parse failed.');
						} else if (exception === 'timeout') {
							alert('Time out error.');
						} else if (exception === 'abort') {
							alert('Ajax request aborted.');
						} else {
							alert('Uncaught Error.\n' + rep.responseText);
						}
				}
				});
        }
    }
	

</script>

<script>
    $('.radio-button').on("click", function(event) {
        var id = $(this).attr('rel');
        if (id == 0) {
            $(this).prop('checked', true);
            $(this).attr('rel', '1');
        }
        else {
            $(this).prop('checked', false);
            $(this).attr('rel', '0');
        }
    });
</script>
<?php
//debug($this->session->userdata);
?>
<!--https://devtools-paypal.com/guide/pay_savedcard/php?interactive=ON&env=sandbox-->