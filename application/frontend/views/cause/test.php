<?php
$username = $this->session->userdata("name");
$email = $this->session->userdata("email");
$user_type = $this->session->userdata("user_type");
$address = $this->session->userdata("address");
$userid = $this->session->userdata("userid");

!empty($username) ? $username : "";
!empty($email) ? $email : "";
!empty($user_type) ? $user_type : "";
!empty($address) ? $address : "";
!empty($userid) ? $userid : "";
?>
<style type="text/css">
body {
-webkit-user-select:none;
-moz-user-select:none;
/* Not sure for the below properties they may not work properly */
-o-user-select:none;
-ms-user-select:none;
user-select:none;
}
</style>
<script type="text/javascript">

/*document.onkeydown = function (event)
{
     event = (event || window.event);
     if (event.keyCode == 123 || event.keyCode == 18)
     {
           alert("This function is disabled here");
           return false;
     }
}*/
// © Mohammadwali.in (www.mohammadwali.in)
// For full source Visit - http://blog.mohammadwali.in
/*document.onkeypress = function(event) {
event = (event || window.event);
if (event.keyCode === 123) {
return false;}};
document.onmousedown = function(event) {
event = (event || window.event);
if (event.keyCode === 123) {
return false;}};
document.onkeydown = function(event) {
event = (event || window.event);
if (event.keyCode === 123) {
return false;}};
function cp() {return false;}
function mousehandler(e) {
var myevent = (isNS) ? e : event;
var eventbutton = (isNS) ? myevent.which : myevent.button;
if ((eventbutton == 2) || (eventbutton == 3))
return false;}
document.oncontextmenu = cp;
document.onmouseup = cp;
var isCtrl = false;
window.onkeyup = function(e)
{if (e.which == 17)
isCtrl = false;}
window.onkeydown = function(e)
{if (e.which == 17)
isCtrl = true;
if (((e.which == 85) || (e.which == 65) || (e.which == 88) || (e.which == 67) || (e.which == 86) || (e.which == 83)) && isCtrl == true){
return false;}}
document.ondragstart = cp;*/
</script>


<div class="container">

    <!--Modal-end--> 
    <!--PETITION INFORMATION STARTS-->
    <div class="fundraising_main">
        <h1 class="t_cap">Petition</h1>
        <strong>30 days left</strong>
        <div class="petition_box">
            <p>Organisation: Ah Wing Hse</p>
            <p>Address:</p>
            <p>Blk 241 Bukit Batok East Ave 5
                Singapore 650241</p>
        </div>
        <div class="donate_bttn"><a href="#" data-target="#myModal7" data-toggle="modal">Sign it!</a></div>
    </div>
    <!--PETITION INFORMATION STARTS--> 

    <!--Modal-7(PETITION MODAL BOX 	) -->
    <div class="modal fade mnt_support_modal" id="myModal7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header custom_m_head">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title custom_title" id="myModalLabel">THANKS FOR YOUR SUPPORT</h4>
                </div>
                <div class="modal-body"> <span id="error_petition" style="padding: 0px 0px 0px 108px;"></span>

                    <form id="petition_form" method="post" class="form-horizontal login_form" role="form" enctype="multipart/form-data">
                        <div class="form-group mnt_sm_offset-1 mnt_sm-5 mnt_form_style">
                            <label for="inputEmail3" class="col-sm-1 col-sm-offset-1 control-label">Username:</label>
                            <div class="col-sm-5">
                                <input  type="text"  ajax_relation='1' data-required='true' data-type='username' data-min='3' data-max='34' class="form-control input_field" id="username" value="<?php echo $username; ?>" name="username" <?php if ($username <> "") { ?> disabled="disabled" <?php } ?>>
                            </div>
                        </div>

                        <div class="form-group mnt_sm_offset-1 mnt_sm-5 mnt_form_style">
                            <label for="inputEmail3" class="col-sm-1 col-sm-offset-1 control-label">Name:</label>
                            <div class="col-sm-5">
                                <input type="hidden" name="userid" value="1" id="userid">
                                <input type="text" ajax_relation='0' data-required='true' data-type='name' data-min='3' data-max='6' class="form-control input_field" id="name" name="name" value="<?php echo $username; ?>" <?php if ($username <> "") { ?> disabled="disabled" <?php } ?>>
                            </div>

                            <label for="inputPassword3" class="col-sm-1 control-label">Location:</label>
                            <div class="col-sm-5">
                                <input type="text" ajax_relation='0' data-required='true' data-type='varchar' data-min='1' data-max='100' class="form-control input_field" id="location" name="location" value="<?php echo $address; ?>" <?php if ($address <> "") { ?> disabled="disabled" <?php } ?>>
                            </div>
                        </div>
                        <div class="form-group mnt_sm_offset-1 mnt_sm-5 mnt_form_style">
                            <label for="inputEmail3" class="col-sm-1 col-sm-offset-1 control-label">Email Subscribe:</label>
                            <div class="col-sm-5">
                                <input type="text" ajax_relation='1' data-required='true' data-type='email' data-min='1' data-max='35' class="form-control input_field" id="email" value="<?php echo $email; ?>" name="email" <?php if ($email <> "") { ?> disabled="disabled" <?php } ?>>
                            </div>
                        </div>
                        <div class="form-group mnt_sm_offset-1 mnt_sm-5 mnt_form_style">
                            <label for="inputEmail3" class="col-sm-1 col-sm-offset-1 control-label">Your own message:</label>
                            <div class="col-sm-10">
                                <textarea ajax_relation='0' data-required='true' data-type='varchar' data-min='1' data-max='500' class="form-control" rows="3" id="content" name="content" <?php echo!empty($message) ? $message : ""; ?> ></textarea>
                            </div>
                        </div>

                        <div class="form-group mnt_sm_offset-1 mnt_sm-5 mnt_form_style">
                            <label for="inputEmail3" class="col-sm-1 col-sm-offset-1 control-label">Country:</label>
                            <div class="col-sm-5">
                                <select  ajax_relation='0' data-required='true' data-type='varchar' data-min='1' data-max='35' class="form-control input_field" id="country"  name="country">
                                    <option value="">Select</option>
                                    <option value="1">India</option>
                                    <option value="2">Usa</option>
                                    <option value="3">Uk</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group mnt_sm_offset-1 mnt_sm-5 mnt_form_style">
                            <label for="inputEmail3" class="col-sm-1 col-sm-offset-1 control-label">Gender:</label>
                            <div class="col-sm-3">
                                <input style="margin-left:16px !important; float:left;" ajax_relation='0' type="radio" class="radio" data-type='radio' data-min='1' data-max='100' class="form-control input_field" data-group='radio1' id="gender"  name="gender" value="male">
                                <input style="margin-left:16px !important; float:left;" ajax_relation='0' type="radio" class="radio" data-type='radio' data-min='1' data-max='100' class="form-control input_field" data-group='radio1' id="gender1" name="gender" value="female">
                            </div>
                        </div>

                        <div class="form-group mnt_sm_offset-1 mnt_sm-3 mnt_form_style">
                            <label for="inputEmail3" class="col-sm-1 col-xs-7 col-sm-offset-1 control-label">Support</label>
                            <div class="col-sm-4 col-xs-5 checkbox">
                                <input ajax_relation='0' style="margin-left:16px !important;" type="checkbox" id="anonymous_status2" name="anonymous_status1[]" value="0"  data-group='checkbox2' data-type='checkbox' data-min='1' data-max='100'>
                                <input ajax_relation='0' style="margin-left:16px;" type="checkbox" id="anonymous_status3" name="anonymous_status1[]" value="0"  data-group='checkbox2' data-type='checkbox' data-min='1' data-max='100'>

                            </div>
                        </div>

                        <div class="form-group mnt_sm_offset-1 mnt_sm-3 mnt_form_style">
                            <label for="inputEmail3" class="col-sm-1 col-xs-7 col-sm-offset-1 control-label">Support as anonymous</label>
                            <div class="col-sm-4 col-xs-5 checkbox">
                                <input ajax_relation='0' style="margin-left:16px;" type="checkbox" id="anonymous_status" name="anonymous_status[]" value="0"   data-group='checkbox1' data-type='checkbox' data-min='1' data-max='100'>
                                <input ajax_relation='0' style="margin-left:16px;" type="checkbox" id="anonymous_status1" name="anonymous_status[]" value="0"  data-group='checkbox1' data-type='checkbox' data-min='1' data-max='100'>
                            </div>
                        </div>

                        <div class="form-group mnt_sm_offset-1 mnt_sm-5 mnt_form_style">
                            <label for="inputEmail3" class="col-sm-1 col-sm-offset-1 control-label">Images:</label>
                            <div class="col-sm-5">

                                <input ajax_relation='0' type="file" name="image[]" multiple id="image"  data-required='true' data-type='file' data-min='1' data-max='6'>
                                <div id="filecount">None selected</div>

                            </div>

                        </div>


                        <div class="form-group mnt_sm_offset-1 mnt_sm-5 mnt_form_style">
                            <label for="inputEmail3" class="col-sm-1 col-sm-offset-1 control-label"></label>
                            <div class="col-sm-10">
                                <span id="clear">Clear All</span>
                                <output id="result" />
                            </div>
                        </div>


                        <div class="form-group mnt_sm_offset-1 mnt_sm-5 mnt_form_style">
                            <label for="inputEmail3" class="col-sm-1 col-sm-offset-1 control-label">Password:</label>
                            <div class="col-sm-6">
                                <input ajax_relation='1' type="password" class="form-control input_field" name="password" id="password" data-required='true' data-type='password' data-min='6' data-max='15'>
                            </div>
                        </div>

                        <div class="form-group mnt_sm_offset-1 mnt_sm-5 mnt_form_style">
                            <label for="inputEmail3" class="col-sm-1 col-sm-offset-1 control-label">Confirm Password:</label>
                            <div class="col-sm-6">
                                <input ajax_relation='0' type="password" class="form-control input_field" name="confirm_password" id="confirm_password" data-required='true' data-type='confirm_password' data-min='6' data-max='15'>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-8 mnt_form_style">
                                <button  id="mybtn" onclick="return validation_engine(this);" type="submit" class="btn btn-primary btn-lg"> <span class="glyphicon"></span> Confirm</button>
                            </div>
                        </div>
                    </form>
                    <!-- <form id="form2">
                     <div class="form-group mnt_sm_offset-1 mnt_sm-5 mnt_form_style">
                         <label for="inputEmail3" class="col-sm-1 col-sm-offset-1 control-label">Username:</label>
                         <div class="col-sm-5">
                           <input  type="text" data-ajax='true' data-required='true' data-type='username' data-min='3' data-max='34' class="form-control input_field" id="username2" value="<?php echo $username; ?>" name="username" <?php if ($username <> "") { ?> disabled="disabled" <?php } ?>>
                         </div>
                       </div>
                     </form>-->
                </div>
            </div>
        </div>
    </div>
    <style>
        .has-success{border-color: #18BCA0;}
        .err{position: absolute;
             right: 47px;
             top: -25px;
             font-size: 11px;
             /*border: 1px solid lightgray;*/
             border:none;
             padding: 5px 10px;
             background: rgba(30,30,30,0.8);
             border-radius: 5px;
             color: #fff;
             min-width: 80px;
             opacity: 0.8;
             filter: alpha(opacity=80);
             text-decoration: none;
             text-transform: capitalize;
        }
        .err:hover{text-decoration: none;
                   opacity: 0.6;
                   filter: alpha(opacity=60);
                   cursor: pointer;
        }

        .glyphicon-refresh-animate {
            -animation: spin .7s infinite linear;
            -webkit-animation: spin2 .7s infinite linear;
        }

        @-webkit-keyframes spin2 {
            from { -webkit-transform: rotate(0deg);}
            to { -webkit-transform: rotate(360deg);}
        }

        @keyframes spin {
            from { transform: scale(1) rotate(0deg);}
            to { transform: scale(1) rotate(360deg);}
        }

        /*input[type="file"] {
         display:block;
        }
        .imageThumb {
                 max-width:100px;
                 max-height: 105px;
                 border: 2px solid;
                 margin: 10px 10px 0 0;
                 padding: 1px;
         }
        .imageThumb_span{position: absolute;top: 31px;right: 64px;}*/

        header h1{
            font-size:12pt;
            color: #fff;
            background-color: #1BA1E2;
            padding: 20px;

        }
        article
        {
            width: 80%;
            margin:auto;
            margin-top:10px;
        }


        .thumbnail{
            height: 141px;
            margin: 10px; 
            float: left;
            width: 100%;
        }
        #clear{
            display:none;
            color:red;
        }
        #result {
            border: 2px dotted #cccccc;
            display: none;
            float: right;
            margin:0 auto;
            width: 100%;
        }
        #result span {
            position: absolute;
            right: 0;
            top: 0;
            color:red;
        }
        #result div {
            float: left;
            margin: 12px 28px 0 33px;
            min-height: 134px;
            position: relative;
            width: 177px;
        }
        #result span {
            position: absolute;
            right: -21px;
            top: -1px;
        }
        #result p { text-align:center;word-wrap: break-word;}

        #filecount{
            position: absolute;
            right: 56px;
            top: 0;
            background-color: #fff;
            padding: 2px 0;
        }
    </style>
    <script type="text/javascript">
        /* ===========================================================
         * Validation-engine - V.1.0
         * ===========================================================
         * Copyright 2014 Mukesh Kaushal & Prateek agnihotri
         * Status Under development
         * Language Jquery,ajax,php
         * Browser mozilla 5+,crome5+,safari 5.0,ie >=10
         * ========================================================== */
        $(document).ready(function() {
            //function fired when we change input
            /*$('#petition_form input,textarea,select,checkbox,radio,file').on('change',function(event){
             var e = $(this);//element
             var type = e.data('type');//check type username or email
             var formid = e.parents("form").attr("id");//current form id under this button exists
             if(type =="username" || type =="email")
             {//if found then change custom attr value to allow ajax request again
             if(e.attr('ajax_relation')==0){ 
             e.attr('ajax_relation',1);
             }
             }
             var res = validation_engine(e);//call validation engine on change event
             if(res == true){
             var formid = e.parents("form").attr("id");
             $('#'+formid).submit();
             }
             else{//get form id and submit
             event.preventDefault();//if error occured then prevent from being submit
             }
             })	*/

        });

        function validation_engine(element) {
            var set = error_result = is_error = 0;//custom variables set for error
            var e = $(element);//element 
            var formid = e.parents("form").attr("id");//current form id under this button exists
            var formmethod = e.parents("form").attr("method");//current form id under this button exists
            if (!formid) {//if form id is not filled throgh an error
                alert("Please enter id attribute in form tag");
                return false;
            }
            if (!formmethod) {//if form id is not filled throgh an error
                alert("Please specify form method get/post ");
                return false;
            }
            var full_name_regex = /^[a-zA-Z\s.]{3,25}$/i;//only letters, period(.),space get accepted
            var float_regex = /^\d{0,10}(\.\d{1,2})?$/;  ////match ints and floats/decimals
            var email_regex = /^[a-zA-Z0-9.'+=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
            var user_name_regex = /^[a-zA-Z0-9._\-]{3,34}$/i;//numeric, alphabets,Underscore, hyphen, dot
            var password_regex = /^[a-zA-Z0-9!-@#$%^&*()_]{6,15}$/;
            var phone_regex = /[0-9-()+]{10,20}/;
            var float_regex = '[-+]?([0-9]*.[0-9]+|[0-9]+)'; ////match ints and floats/decimals
            var zip_regex = /^[a-zA-Z0-9]{3,12}$/i;//numeric, alphabets 3-12 in length
            var password_regex = /^[a-zA-Z0-9!-@#$%^&*()_]{6,15}$/;

            //select all inputs,textarea,select,checkbox that are not hidden and are not disabled 
            $('#' + formid).find('radio, textarea, select, checkbox, input, file').not(':hidden,:disabled').each(function(k, v) {

                var value = $(this).val();//select values from the fields
                var required = $(this).data('required');//check required or not true/false 
                var type = $(this).data('type');//check type numeric/integer/alnum
                var min_val = $(this).data('min');//check min length required
                var max_val = $(this).data('max');//check max length required
                var is_ajax = $(this).attr('is_ajax');//check through ajax 
                var ajax_relation = $(this).attr('ajax_relation');//check through ajax validation
                var group = $(this).data('group');//check through ajax 

                var name = $(this).attr("name").replace(/([~!@#$%^&*()_+=`{}\[\]\|\\:;'<>,.\/? ])+/ig, " ");//select the name attributes 
                var error_data = [];//array that consist all error messages 
                var attr_id = $(this).attr('id');
                //console.log(value);
                /****************************************MULTIPLE CHECKBOX,radio MODULE STARTS*******************************************/
                if (group == "radio1" || group == "checkbox1" || group == "checkbox2")
                {
                    var chks = $('[name="' + $(this).attr("name") + '"]');//select the name attributes 
                    var chek_length = chks.length;//check length of selected name attributes
                    var set = 1;
                    $.each(chks, function(i, v) {//if checked box checked then insert value as 1 else 0
                        if ($(this).attr('checked')) {
                            if (type == "checkbox") {
                                $(this).val('1');
                            }//set checked checkbox value to 1 as get at php end
                        }
                        else {
                            if (type == "checkbox") {
                                $(this).val('0');
                            }//set unchecked checkbox value to 1 as get at php end
                        }
                    });

                    for (var i = 0; i < chek_length; i++)
                    {
                        if (chks[i].checked)
                        {//if atleast one checkbox or radio button is checked  then break out the loop
                            set = 2;
                            break;
                        }
                    }
                }

                if (set == 1)
                {//if no checkbox or radio button is checked  then triggers an error
                    is_error = 1;
                    $(this).parent().removeClass('has-success');//remove error class from that field
                    error_data.push("select atleast one option");
                    $(this).parent('div').find('div.err').remove();
                    $(this).parent().append("<div class='err' id=" + formid + k + " onclick='hide_msg(" + formid + "," + k + ")'>" + error_data.join("<br/><br/>") + "</div>");
                    $(this).parent().addClass('has-error');
                }
                else if (value != "") {//if atleast one checkbox or radio button is checked  then add success
                    $(this).parent().removeClass('has-error');//remove error class from that field
                    $(this).parent('div').find('div.err').remove();//remove error class from that field
                    $(this).parent().addClass('has-success');//add success class on that field
                }

                /****************************************MULTIPLE CHECKBOX MODULE ENDS*******************************************/
                if (required == true && value == "") {//check required fields and the one have empty value
                    is_error = 1;//set custom variable to check error occured and need to be 0 for sumbit
                    $(this).parent().addClass('has-error');//add red color class that are empty
                    error_data.push(name + ' is Required');//push validation custom message 
                }
                if (value != "") {//if values is not empty in fields 
                    $(this).parent().removeClass('has-error');//remove error class from that field
                    //console.log("test--"+attr_id);
                    /********************************USERNAME AVAILABILITY MODULE STARTS**************************/
                    if (type == "username" && !user_name_regex.test(value))
                    {//to validate username
                        error_data.push('letters,period(.),space is allowed');
                    }

                    if (type == "username" && ajax_relation == 1)//ajax fired only when ajax_relation attr is 1(default is 1)
                    {//function fired when username valdation required
                        var rep = ajax_validator(formid, type, value);//params formid,data-type,input-value
                        obj = JSON.parse(rep);//parse response from server side
                        if (obj["response"] == "error")//if respose is error this is executed
                        {
                            $(this).attr('ajax_relation', 1);//***changes custom attr value 1 (default value 0)to disable next ajax request
                            var set = 1;//if response is error then set a value to 1
                            error_data.push(obj["message"]);//custom message come from server side
                        }
                        else {
                            $(this).attr('ajax_relation', 0);//***changes custom attr value 0 enable next ajax request
                            var set = 0;//if response is error then set a value to 0
                        }
                    }
                    /********************************EMAIL AVAILABILITY MODULE ENDS**************************/

                    /********************************EMAIL AVAILABILITY MODULE STARTS**************************/
                    if (type == "email" && !email_regex.test(value))//regex for valid email
                    {//to validate email
                        error_data.push('Enter a valid email address');
                    }
                    if (type == "email" && ajax_relation == 1)//ajax fired only when ajax_relation attr is 1(default is 1)
                    {
                        var rep = ajax_validator(formid, type, value);
                        obj = JSON.parse(rep);
                        if (obj["response"] == "error")//if respose is error this is executed
                        {
                            $(this).attr('ajax_relation', 1);//***changes custom attr value 1 (default value 0)to disable next ajax request
                            var set = 1;//if response is error then set a value to 1
                            error_data.push(obj["message"]);//custom message come from server side
                        }
                        else {
                            $(this).attr('ajax_relation', 0);//***changes custom attr value 0 enable next ajax request
                            var set = 0;//if response is error then set a value to 0
                        }
                    }
                    /********************************EMAIL AVAILABILITY MODULE ENDS**************************/

                    if (type == "name" && !full_name_regex.test(value))//regex for name
                    {//to validate name 
                        error_data.push('Invalid name');
                    }
                    if (type == "numeric" && !float_regex.test(value))//regex for numeric values
                    {
                        error_data.push('Please enter numeric value');
                    }

                    /****************************PASSWORD VALIDATION STARTS***************************************/
                    if (type == "password" && !password_regex.test(value))//regex for password
                    {
                        var pass = value;
                        error_data.push('Please enter valid password');
                    }
                    if (type == "confirm_password" && !password_regex.test(value))//regex for password
                    {
                        var pass_confirm = value;
                        error_data.push('Please enter confirm password');
                    }
                    if (type == "confirm_password" && value != "") {
                        if (pass != pass_confirm) {
                            is_error = 1;
                            error_data.push('Both password didn\'t matched');
                        }
                    }
                    /****************************PASSWORD VALIDATION ENDS***************************************/

                    /********************************FILE SECTION MODULE STARTS***************************************/
                    if (type == "file") {
                        //http://jsfiddle.net/2xES5/28/
                        //http://www.splessons.com/2014/08/jquery-upload-multiple-images-with-preview/
                        var form_enctype = e.parents("form").attr("enctype");//current form id under this button exists
                        if (!form_enctype) {//if form id is not filled throgh an error
                            alert("Please specify form enctype as multipart/form-data");
                            return false;
                        }
                        var exts = ['gif', 'GIF', 'jpg', 'jpeg', 'JPEG', 'png', 'PNG'];//allowed extentions
                        var total_file = $(this)[0].files.length;//count total files choosen
                        $.each($(this)[0].files, function(index, value) {//loop to check size,name,ext
                            //console.log("INDEX: " + index + " VALUE: " + value.name);
                            var size = value.size;//file name
                            var type = value.type;//file type e.g jpg,png,gif
                            var get_ext = value.name.split('.');// split file name at dot
                            var myext = get_ext.reverse();// reverse name to check extension
                            if (size > 1000000) {//if size greater than 1mb through an error
                                error_result = 2;//custom variable for error
                            }
                            else if ($.inArray(myext[0].toLowerCase(), exts) > -1) {
                                error_result = 0;// check file type is valid as given in 'exts' array
                            }
                            else {
                                error_result = 3;//custom variable for error
                            }
                        });
                    }
                    if (error_result == 2) {
                        error_data.push('Max size must less than 1 mb');
                    }
                    if (error_result == 3) {
                        error_data.push('only .jpg, .png and .gif allowed');
                    }
                    /********************************FILE SECTION MODULE ENDS***************************************/
                    //if posted data is not an images or file then this will excuted 
                    if (type != "file") {
                        if (value.length < min_val) {
                            error_data.push('Minimum length should be greater than ' + min_val);
                        }
                        if (value.length > max_val) {
                            error_data.push('Maximum length should be less than ' + max_val);
                        }
                    }
                    else {//if images or file posted then this will be excuted
                        if (total_file < min_val) {
                            error_data.push('file length should be greater than ' + min_val);
                        }
                        if (total_file > max_val) {
                            error_data.push('file length should be less than ' + max_val);
                        }
                    }
                }
                //*** here all type of error variable excuted to mark them as error and add error class
                if (error_data.length > 0 || (set == 1 || error_result == 2 || error_result == 3))
                {//if normal error occured or ajax error occured
                    is_error = 1;//custom variable to check error
                    $(this).parent('div').find('div.err').remove();//remove error class to prevent multiple request
                    $(this).parent().append("<div class='err' id=" + formid + k + " onclick='hide_msg(" + formid + "," + k + ")'>" + error_data.join("<br/>") + " <span style='position: absolute;top: -7px;right:-9px;' class='glyphicon glyphicon-remove form-control-feedback'></span></div>");
                    $(this).parent().addClass('has-error');//add error class to required field
                }
                else
                {//if ajax not fired and ajax has success then remove error and add a success class
                    if (is_ajax == false || set == 0) {
                        $(this).parent('div').find('div.err').remove().addClass('has-success');
                    }
                }
            });
            if (is_error == 1) {//if variable is set to 1 means the form has error
                return false;
            }
            else {
                return true;//form submit
            }
        }
        function del_data(src) {
            var img_length = $('.thumbnail').length;
            if (img_length == 1) {
                $('#result').hide();
                $('#clear').hide();
                $('#image').val("");
            }
            $(src).parent('div').fadeOut(1000, function() {
                $(src).parent('div').remove();
            });

        }
        /*********************************FUNCTION HIT ON PARTICULAR NOTIFICATION STARTS*****************************/

        function hide_msg(param1, param2) {//parama-formud,loop index value(key)
            var formid = param1.id;
            $("#" + formid + param2).fadeOut().delay(2000);//hide the notification after 2 sec
        }

        /*********************************FUNCTION HIT ON PARTICULAR NOTIFICATION STARTS*****************************/
        /*$("#image").on('change',function(){
         
         if(window.File && window.FileList && window.FileReader) {
         var el = $(this).attr('id');
         var files = $(this)[0].files;
         filesLength = files.length;
         for (var i = 0; i < filesLength ; i++) {
         var f = files[i]
         var fileReader = new FileReader();
         // debugger;
         fileReader.onload = (function(e) {
         var file = e.target;
         $("<img></img>",{
         class : "imageThumb",
         src : file.result,
         }).insertAfter("#"+el);
         $('<span><a href="javascript:void(0);"  onclick="del_data(this)">Delete</a></span>',{
         class : "imageThumb_span",
         }).insertAfter("#"+el);
         });
         fileReader.readAsDataURL(f);
         }
         }
         else { alert("Your browser doesn't support to File API") }
         });
         */
        window.onload = function() {
            //Check File API support
            if (window.File && window.FileList && window.FileReader)
            {
                $('#image').on("change", function(event) {
                    $(this).parent().find('div.err').remove().removeClass('has-error').addClass('has-success');//remove error class from that field

                    var files = event.target.files; //FileList object
                    var output = document.getElementById("result");
                    if (files.length > 6) {
                        $('#result').hide();
                        $('#image').val("");
                        alert("Max 6 images allowed");
                    }
                    var set = 0;
                    var error_div = [];
                    var exts = ['gif', 'GIF', 'jpg', 'jpeg', 'JPEG', 'png', 'PNG'];
                    for (var i = 0; i < files.length; i++)
                    {
                        var f;
                        f = files[i];
                        var file = files[i];
                        file_name = files[i].name;

                        // if(!file.type.match('image'))
                        if (file.type.match('image.*')) {
                            if (this.files[i].size < 2097152) {
                                //console.log(this.files[i].size);
                                var picReader = new FileReader();
                                var test = 0;
                                picReader.onload = (function(theFile) {

                                    return function(e) {
                                        // Render thumbnail.
                                        var div = document.createElement("div");
                                        div.innerHTML = "<img class='thumbnail' src='" + e.target.result + "'" +
                                                "title='Preview " + escape(theFile.name) + "'/><p>" + escape(theFile.name) + "</p><span title='Remove " + escape(theFile.name) + "' onclick='del_data(this);' class='remove_link glyphicon glyphicon-remove form-control-feedback'></span>";
                                        output.insertBefore(div, null);
                                        var test = test + 1;
                                        //test++;
                                    };
                                })(f);
                                //Read the image
                                $('#clear, #result').show();

                                $("#filecount").text(test + 'Selected');
                                picReader.readAsDataURL(file);
                            }
                            else {
                                error_div.push(file_name + " this image Size is too big. Maximum size is 2MB.");
                                if (parseInt(error_div.length) > 0)
                                {
                                    var set = 1;
                                }
                                //$(this).val("");
                            }
                        } else {
                            alert("You can only upload image file.");
                            $(this).val("");
                        }
                    }
                    if (parseInt(set) == 1) {
                        alert(error_div.join('\n\n'));
                    }
                });
            }
            else
            {
                alert("Your browser does not support File API");
            }
        }

        $('#image').on("click", function() {
            $('.thumbnail').parent().remove();
            $('#result').fadeOut();
            $(this).val("");
        });

        $('#clear').on("click", function() {
            $('.thumbnail').parent().remove();
            $('#result').fadeOut();
            $('#image').val("");
            $(this).fadeOut();
        });
        /*********************************FUNCTION HIT UPON AJAX VALIDATIONS STARTS*****************************/
        function ajax_validator(formid, type, value) {
            var result;
            if (type == "name")
            {
                url = BASEURL + 'ajax_front/check_name/';
                data = {'name': value};

            }
            if (type == "email")
            {
                url = BASEURL + 'ajax_front/check_email/';
                data = {'email': value};
            }
            if (type == "username")
            {
                url = BASEURL + 'ajax_front/check_username/';
                data = {'username': value};
            }
            if (type == "password")
            {
                url = BASEURL + 'ajax_front/check_password/';
                data = {'password': value};
            }

            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                async: false,
                beforeSend: function() {
                    $('#' + formid).find('radio, textarea, select, checkbox, input, file').prop('disabled', true);
                    $('#' + formid).find('button span').addClass('glyphicon-refresh glyphicon-refresh-animate');
                },
                success: function(rep) {
                    $('#' + formid).find('button span').removeClass('glyphicon-refresh glyphicon-refresh-animate');
                    $('#' + formid).find('radio, textarea, select, checkbox, input, file').prop('disabled', false);
                    result = rep;
                },
                error: function(rep, exception) {
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
            return result;
        }
        /*********************************FUNCTION HIT UPON AJAX VALIDATIONS ENDS*****************************/

    </script> 
    <script type="text/javascript"?>
        $(document.body).on('hidden.bs.modal', function() {
            $('#myModal7').removeData('bs.modal')
        });
    </script>


