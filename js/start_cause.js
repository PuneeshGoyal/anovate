// JavaScript Document
$(document).ready(function() {
    $('.multiselect').multiselect({
        includeSelectAllOption: true
    });
});

//function to check validations on start cause 
function check_validation() {
    var fundraising = $('#fundraising').is(":checked") ? true : false;
    var volunteer = $('#volunteer').is(":checked") ? true : false;
    var petition = $('#petition').is(":checked") ? true : false;
    var petadoption = $('#petadoption').is(":checked");
    var confirmtion = $('#confirm').is(":checked");

    var title = $('#title').val();
    //var tag =$('#tag').val();
    var tag = $('#tags  input:checkbox:checked').map(function(n) {
        return  this.value;
    }).get().join(',');
	
	
    var fund = 0;
    var summary = $('#summary').val();
    var youtube_link = $("#youtube_link").val();
	var matches = youtube_link.match(/watch\?v=([a-zA-Z0-9\-_]+)/);
	var images = $('input[name*="image"]').length;
    var is_image = $('input[class*="temp_upload_img"]').length;
    var detailed_stories = $('#detailed_stories').val();
    var fund_allocation_information = $('#fund_allocation_information').val();
    var same_as_user = $('#options').is(":checked") ? 1 : 0;
	var volunteer_options = $('#volunteer_options').is(":checked") ? 1 : 0;
    var postal_code = $('#postal_code').val();
    var address = $('#address').val();
    var unit_f = $('#unit_f').val();
    var unit_l = $('#unit_l').val();
    var target_amount = $('#target_amount').val();
    var duration = $('#duration').val();
    var float = /^[1-9]\d*(\.\d+)?$/;
    var num = /^[0-9\ ]+$/;
    var zip_regex = /^[a-zA-Z0-9]{3,12}$/i;//numeric, alphabets 3-12 in length
    $("#options").val(same_as_user);
	$("#volunteer_options").val(volunteer_options);

    /**************Petition validations starts*****************************/
    var petition_target_amount = $("#petition_target_amount").val();
    var petition_duration = $("#petition_duration").val();
    var petition_message = $("#petition_message").val();
    /**************Petition validations starts*****************************/


    /**************Volunteer validations starts*****************************/
    var volunteer_event_postal = $("#volunteer_event_postal").val();
    var volunteer_event_address = $("#volunteer_event_address").val();
    var volunteer_event_unit_f = $("#volunteer_event_unit_f").val();
    var volunteer_event_unit_l = $("#volunteer_event_unit_l").val();
    var volunteer_start_date = $("#volunteer_start_date").val();
    var volunteer_end_date = $("#volunteer_end_date").val();
    var volunteer_target_number = $("#volunteer_target_number").val();
    /**************Volunteer validations ends*****************************/


    var imgexts = ['gif', 'GIF', 'jpg', 'jpeg', 'JPEG', 'png', 'PNG'];

    if (fundraising == false && volunteer == false && petition == false && petadoption == false)
    {
        var error = "Please first select your cause type checkbox. (Ex: Fundraising, Pledge, Volunteers)";
    }
    else if (title == "") {
        var error = "Please enter title";
        $("#title").focus();
    }
    else if (title.length > 140) {
        var error = "You can\'t enter more than 140 characters in title";
        $("#title").focus();
    }
    else if (tag == "") {
        var error = "Please select tag";
        $("#tags").focus();
    }
    else if (summary == "") {
        var error = "Please enter summary";
        $("#summary").focus();
    }
	else if (youtube_link != "" && !matches){
		var error = "Please provide valid youtube video link";
        $("#youtube_link").focus();
	}
	
    else if (images == "") {
        var error = "Please provide atleast two images";
        $("#dropzone").focus();
    }
    else if (images < 2) {
        var error = "Please provide atleast two images";
        $("#dropzone").focus();
    }
    else if (detailed_stories == "") {
        var error = "Please enter detailed stories";
        $("#detailed_stories").focus();
    }
    else if (duration == "") {
        var error = "Please enter duration";
        $("#duration").focus();
    }
    else if (!num.test(duration)) {
        var error = "Duration must be a number";
        $("#duration").focus();
    }
    else if (fund_allocation_information == "" && fundraising == true) {
        var error = "Please enter fund allocation";
        $("#fund_allocation_information").focus();
    }
    else if (postal_code == "" && fundraising == true) {
        var error = "Please enter postal";
        $("#postal_code").focus();
    }
    else if (address == "" && fundraising == true) {
        var error = "Please enter address";
        $("#address").focus();
    }
    else if ((unit_f == "" || unit_l == "") && fundraising == true) {
        var error = "Please enter units";
        $("#unit_f").focus();
    }
    else if (unit_l == "" && fundraising == true) {
        var error = "Please enter units";
        $("#unit_l").focus();
    }
    else if (target_amount == "" && fundraising == true) {
        var error = "Please enter target amount";
        $("#target_amount").focus();
    }
    else if (!num.test(target_amount) && fundraising == true) {
        var error = "Amount must be a number";
        $("#target_amount").focus();
    }
    else if (petition_target_amount == "" && petition == true) {
        var error = "Please enter target number of pledge";
        $("#petition_target_amount").focus();
    }
    else if (!num.test(petition_target_amount) && petition == true) {
        var error = "Target number must be a numeric value";
        $("#petition_target_amount").focus();
    }
    else if (petition_message == "" && petition == true) {
        var error = "Please enter pledge message";
        $("#petition_message").focus();
    }
    /*Volunteer validations starts*/
    /*else if (volunteer_event_postal == "" && volunteer == true) {
        var error = "Please enter voluneers postal";
        $("#volunteer_event_postal").focus();
    }*/
    else if ((volunteer_event_postal !="" && !zip_regex.test(volunteer_event_postal)) && volunteer == true) {
        var error = "zip code should be between 3 to 12 character and alphanumeric values are allowed";
        $("#volunteer_event_postal").focus();
    }
    else if (volunteer_event_address == "" && volunteer == true) {
        var error = "Please enter voluneers address";
        $("#volunteer_event_address").focus();
    }
    /*else if (volunteer_event_unit_f == "" && volunteer == true) {
        var error = "Please enter voluneers unit";
        $("#volunteer_event_unit_f").focus();
    }
    else if (volunteer_event_unit_l == "" && volunteer == true) {
        var error = "Please enter voluneers unit";
        $("#volunteer_event_unit_l").focus();
    }*/
    else if (volunteer_start_date == "" && volunteer == true) {
        var error = "Please enter voluneers from date";
        $("#volunteer_start_date").focus();
    }
    else if (volunteer_end_date == "" && volunteer == true) {
        var error = "Please enter voluneers to date";
        $("#volunteer_end_date").focus();
    }
    else if (volunteer_target_number == "" && volunteer == true) {
        var error = "Please enter target number of voluneers";
        $("#volunteer_target_number").focus();
    }
    else if (confirmtion == false) {
        var error = "Please confirm the information";
        $("#confirm").focus();
    }
    if (error != '' && error != null)
    {
        jQuery('html,body').animate({scrollTop: 0}, 500);
        $('#error_msgs').html(error).show().css({'color': 'red'});
        return false;
    }
    else
    {
        $('#tutorial_replym').submit();
    }
}

$(document).ready(function() {
    //called when key is pressed in textbox
    $("#duration,#target_amount,#petition_target_amount,#volunteer_target_number").keypress(function(e) {
        //if the letter is not digit then display error and don't type anything
        $(this).nextAll('span.duration_error').remove();
        var delay = 2000;
        var div_data = "<span class='duration_error' style='color:red;'>Digits Only</span>";
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            //display error message
            if (e.originalEvent.target.id == "duration") {
                var div = $(this).after(div_data);
                div.next('span').fadeOut(delay);
                return false;
            }
            if (e.originalEvent.target.id == "target_amount") {
                var div = $(this).after(div_data);
                div.next('span').fadeOut(delay);
                return false;
            }
            if (e.originalEvent.target.id == "petition_target_amount") {
                var div = $(this).after(div_data);
                div.next('span').fadeOut(delay);
                return false;
            }
            if (e.originalEvent.target.id == "volunteer_target_number") {
                var div = $(this).after(div_data);
                div.next('span').fadeOut(delay);
                return false;
            }
        }
    });
});

//function to selct cause type 
function show_hide(id)
{
    var block_id = $('#' + id).is(":checked");

    var present_relation = $('#' + id).attr('relation');
    if (present_relation == 0)
    {
        $('#' + id).attr('relation', "1");
    }
    else {
        $('#' + id).attr('relation', "0");
    }

    if (id === 'petadoption' && block_id == true)
    {
        $('#fundraising').prop('checked', false);
        $('#volunteer').prop('checked', false);
        $('#petition').prop('checked', false);

        if (confirm("By selecting the 'Pet adoption' checkbox for creating adoption cause all previous message will be lost. Proceed??"))
        {
            window.location.href = BASEURL + "start_cause/";
        }
        else
        {
            $('#petadoption').prop('checked', false);//uncheck pet adoption
            var att_val1 = $("#fundraising").attr("relation");
            var att_val2 = $("#volunteer").attr("relation");
            var att_val3 = $("#petition").attr("relation");
            //alert(att_val);
            if (att_val1 == '1') {
                $('#fundraising').prop('checked', true);
            }
            if (att_val2 == '1') {
                $('#volunteer').prop('checked', true);
            }
            if (att_val3 == '1') {
                $('#petition').prop('checked', true);
            }
        }
    }
    else
    {
        if (block_id == true)
        {
            $('#' + id + '_block').show();
        }
        else
        {
            $('#' + id + '_block').hide();
        }
    }
}



//function to get logged in user address
function get_user_address() {

    if ($('#options').is(":checked") == true) {

        var url = BASEURL + 'start_cause/get_user_address/';
        $.ajax({
            url: url,
            data: 'type=json',
            beforeSend: function() {
                $('#options').hide();
                $('#loading').html('<font style="color:red;">Processing....</font>');
            },
            success: function(result)
            {
                $('#loading').html('');
                $('#options').show();
                var result = eval("(" + result + ")");
                $('#postal_code').val(result['postal_code']);
                $('#address').val(result['address']);
                $('#unit_f').val(result['unit_f']);
                $('#unit_l').val(result['unit_l']);
            },
            error: function(xhr, textStatus, errorThrown) {
                alert(textStatus);
            }
        });
    }
    else
    {
        $('#postal_code').val('');
        $('#address').val('');
        $('#unit_f').val('');
        $('#unit_l').val('');
    }
}
function get_volunteer_user_address() {

    if ($('#volunteer_options').is(":checked") == true) {

        var url = BASEURL + 'start_cause/get_user_address/';
        $.ajax({
			type:'POST',
            url: url,
            data: 'type=json',
            beforeSend: function() {
                $('#volunteer_options').hide();
                $('#volunteer_loading').html('<font style="color:red;">Processing....</font>');
            },
            success: function(result)
            {
                $('#volunteer_loading').html('');
                $('#volunteer_options').show();
                var result = eval("(" + result + ")");
                $('#volunteer_event_postal').val(result['postal_code']).attr('readonly', 'readonly');
                $('#volunteer_event_address').val(result['address']).attr('readonly', 'readonly');
                $('#volunteer_event_unit_f').val(result['unit_f']).attr('readonly', 'readonly');
                $('#volunteer_event_unit_l').val(result['unit_l']).attr('readonly', 'readonly');
            },
            error: function(xhr, textStatus, errorThrown) {
                alert(textStatus);
            }
        });
    }
    else
    {
        $('#volunteer_event_postal').val('').removeProp('readonly');
        $('#volunteer_event_address').val('').removeProp('readonly');
        $('#volunteer_event_unit_f').val('').removeProp('readonly');
        $('#volunteer_event_unit_l').val('').removeProp('readonly');
    }
}
/********************************************FILE UPLOAD START******************************************************************/

$(document).bind('drop dragover', function(e) {
    e.preventDefault();//to restrict file upload rather that drop area
});

//drag and drop code
$(document).bind('dragover', function(e)
{
    var dropZone = $('.dropzone'),
            foundDropzone,
            timeout = window.dropZoneTimeout;
    if (!timeout)
    {
        dropZone.addClass('in');
    }
    else
    {
        clearTimeout(timeout);
    }
    var found = false,
            node = e.target;

    do {

        if ($(node).hasClass('dropzone'))
        {
            found = true;
            foundDropzone = $(node);
            break;
        }

        node = node.parentNode;

    } while (node != null);

    dropZone.removeClass('in hover');

    if (found)
    {
        foundDropzone.addClass('hover');
    }

    window.dropZoneTimeout = setTimeout(function()
    {
        window.dropZoneTimeout = null;
        dropZone.removeClass('in hover');
    }, 100);

});
/**********************************drag and  drop file for uploading starts**********************************************/
$(function() {
    $("#progress").hide();
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = BASEURL + 'start_cause/upload_image/';
    $('#fileupload').fileupload({
        //limitMultiFileUploads: 1,
        url: url,
        dataType: 'json',
        dropZone: $('#dropzone'),
        beforeSend: function(event, files, index, xhr, handler, callBack) {
            $("#upload_1").show();
            $("#browse_image").hide();
            $("#image_loading").show();
        },
        add: function(e, data) {

            var uploadErrors = [];
            var choosen_length = data.originalFiles.length;
            var temp_images = $('input[name*="image"]').length;
            var total_temp_images = parseInt(choosen_length) + parseInt(temp_images);

            var exts = ['gif', 'GIF', 'jpg', 'jpeg', 'JPEG', 'png', 'PNG'];

            $.each(data.originalFiles, function(index, value) {
                //console.log("INDEX: " + index + " VALUE: " + value.size);
                var size = value.size;
                var get_ext = value.name.split('.');// split file name at dot
                var myext = get_ext.reverse();// reverse name to check extension
                if ($.inArray(myext[0].toLowerCase(), exts) > -1) {
                    // check file type is valid as given in 'exts' array
                }
                else {
                    uploadErrors.push(' Wrong file type only .jpg, .png and .gif allowed');
                }
                if (size > 4000000) {
                    uploadErrors.push('Filesize is too big please upload file less than 4 mb');
                }
            });

            if (total_temp_images >= 6) {
                $("#file_browse_wrapper").hide();
            }
            if (total_temp_images > 6) {
                uploadErrors.push(' you can\'t upload more than 6 images');
            }

            if (uploadErrors.length > 0) {
                window.scroll(0, 0);
                $("#file_browse_wrapper").show();
                $('#error_msgs').html(uploadErrors[0]).show().css({'color': 'red'});
            } else {
                data.submit();
            }
        },
        progressall: function(e, data) {
            //alert(data);
            $("#progress").show();
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css({'width': progress + '%'}).text(progress + '%');
        },
        complete: function(response) {
            // on complete
        },
        done: function(e, data) {

            $("#upload_1").hide();
            $("#image_loading").hide();
            $("#browse_image").show();
            $('#message').val('');
            $("#progress").hide();
            $.each(data.result.files, function(index, file) {
                //if(file.error == "" || file.error !="undefined"){
                var name = file.name;
                var type = file.type;
                var file_type = type.split('/');
                var newString = name.replace(/([~!@#$%^&*()_+=`{}\[\]\|\\:;'<>,.\/? ])+/ig, "-");
                $('#append_data').append('<div class="temp_upload_img" rel="' + name + '" id="' + newString + '"><div>\n\
						<div>' + file.name + '</div>\n\
						<ul class="app_data_ul">\n\
						<li class="image" style="background-image:url(' + file.thumbnailUrl + ');border: 2px solid white; background-size:cover; height:100px;background-position: center center;"></li>\n\
						</ul>\n\
						</div>\n\
						<span  style="float:left;line-height: 2;"><input type="hidden" name="image[]" value="' + file.name + '" />\n\
						<a id=' + file.deleteUrl + ' name=' + newString + ' onclick="remove_image(this.id,this.name);" style="cursor:pointer;">Delete</a>\n\
						</span></div></div>');
            });
        }
    }).bind('fileuploadsubmit', function(e, data) {
        // var message_sender = $("#message_sender").val();
        // data.formData = {message_sender: message_sender};
    }).prop('disabled', !$.support.fileInput).parent().addClass($.support.fileInput ? undefined : 'disabled');
});



//////////////////////////////////////////////////////////// doc upload /////////////////////////////////////////////////////////////////////////////////////////////	
$(function() {
    $("#progress1").hide();
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = BASEURL + 'start_cause/upload_doc/';

    $('#fileupload1').fileupload({
        url: url,
        dataType: 'json',
        dropZone: $('#dropzone1'),
        beforeSend: function(event, files, index, xhr, handler, callBack) {
            //count_docs();
            $("#upload_2").show();
            $("#browse_doc").hide();
            $("#doc_loading").show();
        },
        add: function(e, data) {
            var uploadErrors = [];
            var choosen_length = data.originalFiles.length;
            var temp_doc = $('.count_docs').length;
            var total_temp_doc = parseInt(choosen_length) + parseInt(temp_doc);

            var exts = ['pdf', 'PDF'];

            $.each(data.originalFiles, function(index, value) {
                //console.log("INDEX: " + index + " VALUE: " + value.name);
                var size = value.size;
                var get_ext = value.name.split('.');// split file name at dot
                var myext = get_ext.reverse();// reverse name to check extension

                if (size > 4000000) {
                    uploadErrors.push('Filesize is too big please upload file less than 4 mb');
                }
                if ($.inArray(myext[0].toLowerCase(), exts) > -1) {
                    // check file type is valid as given in 'exts' array
                }
                else {
                    uploadErrors.push('Wrong file type only .pdf allowed');
                }
            });

            if (total_temp_doc >= 6 && uploadErrors.length == 0) {
                $(".11file_browse_wrapper").hide();
            }
            if (total_temp_doc > 6) {
                uploadErrors.push(' You can\'t upload more than 6 documents');
            }
            if (uploadErrors.length > 0) {
                window.scroll(0, 0);
                $(".11file_browse_wrapper").show();
                $('#error_msgs').html(uploadErrors[0]).show().css({'color': 'red'});
            } else {
                data.submit();
            }
        },
        complete: function(response) { // on complete
        },
        progressall: function(e, data) {
            $("#progress1").show();
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress1 .progress-bar').css(
                    'width',
                    progress + '%'
                    ).text(progress + '%');
        },
        done: function(e, data) {
            $("#upload_2").hide();
            $("#browse_doc").show();
            $("#doc_loading").hide();
            $('#message').val('');
            $("#progress1").hide();
            $.each(data.result.files, function(index, file) {
                var name = file.name;
                var newString1 = name.replace(/([~!@#$%^&*()_+=`{}\[\]\|\\:;'<>,.\/? ])+/ig, "-");
                var type1 = file.name;
                var file_type1 = type1.split('.');
                if (file_type1[1] == 'doc' || file_type1[1] == 'docx' || file_type1[1] == 'DOC' || file_type1[1] == 'DOCX') {
                    $('#append_data1').append('<div id="' + newString1 + '" ><div><div>' + file.name + '</div><img style="position:relative;" src="' + BASEURL + 'images/my_file_020.png" alt="pic" height="100" width="100"/></div><span  style="float:left;line-height: 2;"><input type="hidden" name="docs[]" value="' + file.name + '" /><a id=' + file.deleteUrl + ' name=' + newString1 + ' onclick="remove_doc(this.id,this.name);" style="cursor:pointer;">Delete</a></span></div></div>');
                }
                else
                {
                    $('#append_data1').append('<div id="' + newString1 + '" class="count_docs"><div><div>' + file.name + '</div><img style="position:relative;" src="' + BASEURL + 'images/my_file_048.png" alt="pic" height="100" width="100"/></div><span  style="line-height: 2;"><input type="hidden" name="docs[]" value="' + file.name + '" /><a id=' + file.deleteUrl + ' name=' + newString1 + ' onclick="remove_doc(this.id,this.name);" style="cursor:pointer;">Delete</a></span></div></div>');
                }
            });
        }
    }).bind('fileuploadsubmit', function(e, data) {
        // var message_sender = $("#message_sender").val();
        // data.formData = {message_sender: message_sender};
    }).prop('disabled', !$.support.fileInput).parent().addClass($.support.fileInput ? undefined : 'disabled');
});

//remove images  from temp dir.
function remove_image(id, name)
{
    var url = BASEURL + 'start_cause/remove_image/';
    $.ajax({
        url: url,
        data: 'type=json&url=' + id,
        beforeSend: function() {
            $("#" + name).append('<span style="color:red;position:absolute;left: 15px;top: 160px">Deleting...</span>');
        },
        success: function(result)
        {
            $("#" + name).html('');
            $("#" + name).remove();
            var temp_images = $('input[name*="image"]').length;
            if (temp_images < 6) {
                $("#file_browse_wrapper").show();//If images less than 6 then we need to show button 
            }
        }
    });
}

//remove documents from temp dir.
function remove_doc(id, name) {
    var url = BASEURL + 'start_cause/remove_docs/';
    $.ajax({
        url: url,
        data: 'type=json&url=' + id,
        beforeSend: function() {
            $("#" + name).append('<span style="color:red;position:absolute;left: 15px;top: 160px">Deleting...</span>');
        },
        success: function(result) {
            $("#" + name).html('');
            $("#" + name).remove();
            var temp_images = $('.count_docs').length;
            if (temp_images < 6) {
                $(".11file_browse_wrapper").show();//If doc. less than 6 then we need to show button 
            }
        }
    });
}

//get address 
$(document).ready(function() {
    /*$("#postal_code").on("blur", function (e) {
     var personal_nationality = 'singapore';
     var personal_postal_code = $("#postal_code").val();
     
     $.ajax({
     type : 'POST',
     url  : BASEURL+'logins/get_address/',
     data : {'personal_nationality':personal_nationality, 'personal_postal_code': personal_postal_code},
     beforeSend : function(){
     },
     success: function(rep){
     obj = JSON.parse(rep);
     if(obj == 'error'){
     $('#address').val('');
     alert("No result found");
     }
     else{
     $('#address').val(obj);
     }
     }
     });
     });*/
});

$(document).ready(function() {
    $('input.input_max_length,.summary_max_length').maxlength({
        alwaysShow: true,
        threshold: 10,
        warningClass: "label label-success",
        limitReachedClass: "label label-danger",
        separator: ' of ',
        preText: 'You have ',
        postText: ' chars remaining.',
        validate: true
    });

    $('textarea.textarea_max_length').maxlength({
        alwaysShow: true,
        threshold: 10,
        warningClass: "label label-success",
        limitReachedClass: "label label-danger",
        separator: ' of ',
        preText: 'You have ',
        postText: ' chars remaining.',
        validate: true
    });

    $('#chkBoxPetAdopt').click(function() {
        if ($(this).is(':checked')) {
            $("#myModalk").modal('show');
            $('#chkBoxPetAdopt').prop('checked', false);
        } else {
            $("#myModalk").modal('hide');
            $('#chkBoxPetAdopt').prop('checked', false);
        }
        $('#myModal').on('hidden.bs.modal', function(e) {
            $('#chkBoxPetAdopt').prop('checked', false);
        })
    });
});

jQuery(function() {
    $('#volunteer_start_date').datetimepicker({
        format: 'd/m/Y h:i a',
        minDate: '0', //yesterday is minimum date(for today use 0 or -1970/01/01)
        step: 5,
        opened: false,
        validateOnBlur: false,
        closeOnDateSelect: false,
        closeOnTimeSelect: false,
        onChangeDateTime: function(dp, $input) {
            //$input.nextAll('.temp_date_value').remove();
            //$input.after($('<input  type="hidden" class="temp_date_value" value="">').val($input.val()));
        }
    });

    jQuery('#volunteer_end_date').datetimepicker({
        format: 'd/m/Y h:i a',
        step: 5,
        opened: false,
        validateOnBlur: false,
        closeOnDateSelect: false,
        closeOnTimeSelect: false,
        onChangeDateTime: function(dp, $input) {
            //console.log($input.val())
        }
    });
});

