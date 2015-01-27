// JavaScript Document
$(document).ready(function() {
	$('.multiselect').multiselect({
        includeSelectAllOption: true,
		nonSelectedText: 'Select information'
    });
});
 
function get_pet_adoption_user_address() {
    if ($('#pet_adoption_options').is(":checked") == true) {
        var url = BASEURL + 'pets/get_pet_adoption_user_address/';
        $.ajax({
			type:'POST',
            url: url,
            data: 'type=json',
            beforeSend: function() {
                $('#pet_adoption_options').hide();
                $('#pet_adoption_loading').html('<span style="color:red;">Processing....</span>');
            },
            success: function(result){
                $('#pet_adoption_loading').html('');
                $('#pet_adoption_options').show();
                var result = eval("(" + result + ")");
				$('#pet_adoption_options').val(1);
                $('#location').val(result['address']).attr('readonly', 'readonly');
            },
            error: function(xhr, textStatus, errorThrown) {
                alert(textStatus);
            }
        });
    }
    else {
		$('#pet_adoption_options').val('');
        $('#location').val('').removeProp('readonly');
    }
}

function nextTab(elem) {
	$(elem + ' li.active').next().find('a[data-toggle="tab"]').click();
}

function prevTab(elem) {
	$(elem + ' li.active').prev().find('a[data-toggle="tab"]').click();
}

//function to check validations on start cause 
function check_validation() {
	
    var fund = 0;
	var title = $('#title').val().trim();
	var country = $('#country').val();
	var breed_id = $('#breed_id').val();
	/*var information = $('#div_info input:checkbox:checked').map(function(n) {
		return  this.value;
	}).get().join(',');
	var information_id = information.split(',');
	if(information_id[0] == "multiselect-all"){
		information_id.splice(0,1).join(',');
	}
	else{
		information_id = information_id.join(',');
	}*/
	var information = $('#information_id').val();
	
	var age = $('#age').val().trim();
    var summary = $('#summary').val();
    var images = $('input[name*="image"]').length;
    var is_image = $('input[class*="temp_upload_img"]').length;
    var detailed_stories = $('#detailed_stories').val();
    var duration = $('#duration').val();
	var pet_adoption_options = $('#pet_adoption_options').is(":checked") ? 1 : 0;
	var location = $("#location").val();
    
	var float = /^[1-9]\d*(\.\d+)?$/;
    var num = /^[0-9\ ]+$/;
    var zip_regex = /^[a-zA-Z0-9]{3,12}$/i;//numeric, alphabets 3-12 in length
    var imgexts = ['gif', 'GIF', 'jpg', 'jpeg', 'JPEG', 'png', 'PNG'];
    var confirmation = $("#confirm").val();
	//$("#pet_adoption_options").val(volunteer_options);
	var is_title = $("#is_unique_title").val();
	
	if(title == "") {
        var error = "Please enter title";
        $("#title").focus();
    }
	else if (title.length > 140) {
        var error = "You can\'t enter more than 140 characters in title";
        $("#title").focus();
    }
	else if(is_title == 'error') {
		var error = "Title aleady exists try another";
		return false;
    }
	else if (country == "") {
        var error = "Please select country";
        $("#country").focus();
    }
	else if (breed_id == "") {
        var error = "Please select breed";
        $("#breed_id").focus();
    }
	else if (information == "" || information == null) {
        var error = "Please select information";
        $("#information_id").focus();
    }
	else if (!$('input[name=gender]:checked').val() ) {  
		 var error = "Please select gender";
	}
	else if (age == "") {
        var error = "Please enter age";
        $("#age").focus();
    }
    else if (summary == "") {
        var error = "Please enter summary";
        $("#summary").focus();
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
	else if (pet_adoption_options == 0) {
        var error = "Please enter location";
        $("#location").focus();
    }
    if (error != '' && error != null){
        jQuery('html,body').animate({scrollTop: 0}, 500);
        $('#error_msgs').html(error).show().css({'color': 'red'});
        return false;
    }
    else{
		$('#pet_adoption_form').submit();
	}
}

$(document).ready(function() {
    //called when key is pressed in textbox
    $("#duration,#age").keypress(function(e) {
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
			if (e.originalEvent.target.id == "age") {
                var div = $(this).after(div_data);
                div.next('span').fadeOut(delay);
                return false;
            }
            if (e.originalEvent.target.id == "target_amount") {
                var div = $(this).after(div_data);
                div.next('span').fadeOut(delay);
                return false;
            }
        }
    });
});

/********************************************FILE UPLOAD START******************************************************************/

$(document).bind('drop dragover', function(e) {
    e.preventDefault();//to restrict file upload rather that drop area
});
//drag and drop code
$(document).bind('dragover', function(e){
    var dropZone = $('.dropzone'),
            foundDropzone,
            timeout = window.dropZoneTimeout;
    if (!timeout){dropZone.addClass('in');}
    else {clearTimeout(timeout); }
    var found = false,
            node = e.target;
    do {
        if ($(node).hasClass('dropzone')){
            found = true;
            foundDropzone = $(node);
            break;
        }
        node = node.parentNode;
    } while (node != null);
    dropZone.removeClass('in hover');
    if (found) {foundDropzone.addClass('hover');}
    window.dropZoneTimeout = setTimeout(function(){
        window.dropZoneTimeout = null;
        dropZone.removeClass('in hover');
    }, 100);
});
/**********************************drag and  drop file for uploading starts**********************************************/
$(function() {
    $("#progress").hide();
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = BASEURL + 'pets/upload_image/';
   var jj=1;
    $('#fileupload').fileupload({url: url,dataType: 'json',dropZone: $('#dropzone'),
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
                if ($.inArray(myext[0].toLowerCase(), exts) > -1) {}
                else {uploadErrors.push(' Wrong file type only .jpg, .png and .gif allowed');}
                if (size > 4000000) {uploadErrors.push('Filesize is too big please upload file less than 4 mb');}
            });

            if (total_temp_images >= 6) { $("#file_browse_wrapper").hide();}
            if (total_temp_images > 6) { uploadErrors.push(' you can\'t upload more than 6 images'); }
            if (uploadErrors.length > 0) {
                window.scroll(0, 0);
                $("#file_browse_wrapper").show();
                $('#error_msgs').html(uploadErrors[0]).show().css({'color': 'red'});
            }
			else {data.submit();}
        },
        progressall: function(e, data) {
            $("#progress").show();
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css({'width': progress + '%'}).text(progress + '%');
        },
        complete: function(response) {
        },
        done: function(e, data) {
            $("#upload_1").hide();
            $("#image_loading").hide();
            $("#browse_image").show();
            $('#message').val('');
            $("#progress").hide();
            $.each(data.result.files, function(index, file) {
				//result += parseInt(index) + 1;
				console.log(index)
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
						<a id=' + file.deleteUrl + ' name=' + newString + ' onclick="remove_image(this.id,this.name);" style="cursor:pointer;">Delete ('+jj+')</a>\n\
						</span></div></div>');
				jj++;
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
    var url = BASEURL + 'pets/upload_doc/';
    $('#fileupload1').fileupload({
        url: url,
        dataType: 'json',
        dropZone: $('#dropzone1'),
        beforeSend: function(event, files, index, xhr, handler, callBack) {
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
                var size = value.size;
                var get_ext = value.name.split('.');// split file name at dot
                var myext = get_ext.reverse();// reverse name to check extension
                if (size > 4000000) { uploadErrors.push('Filesize is too big please upload file less than 4 mb');}
                if ($.inArray(myext[0].toLowerCase(), exts) > -1) {}
                else {uploadErrors.push('Wrong file type only .pdf allowed');}
            });
            if (total_temp_doc >= 6 && uploadErrors.length == 0) { $(".11file_browse_wrapper").hide();}
            if (total_temp_doc > 6) { uploadErrors.push(' You can\'t upload more than 6 documents');}
            if (uploadErrors.length > 0) {
                window.scroll(0, 0);
                $(".11file_browse_wrapper").show();
                $('#error_msgs').html(uploadErrors[0]).show().css({'color': 'red'});
            }
			else { data.submit();}
        },
        complete: function(response) { },// on complete 
        progressall: function(e, data) {
            $("#progress1").show();
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress1 .progress-bar').css('width',progress + '%').text(progress + '%');
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
                else{$('#append_data1').append('<div id="' + newString1 + '" class="count_docs"><div><div>' + file.name + '</div><img style="position:relative;" src="' + BASEURL + 'images/my_file_048.png" alt="pic" height="100" width="100"/></div><span  style="line-height: 2;"><input type="hidden" name="docs[]" value="' + file.name + '" /><a id=' + file.deleteUrl + ' name=' + newString1 + ' onclick="remove_doc(this.id,this.name);" style="cursor:pointer;">Delete</a></span></div></div>');}
            });
        }
    }).bind('fileuploadsubmit', function(e, data) {
        // var message_sender = $("#message_sender").val();
        // data.formData = {message_sender: message_sender};
    }).prop('disabled', !$.support.fileInput).parent().addClass($.support.fileInput ? undefined : 'disabled');
});


$("#title").on("blur keyup", function(e) {
	var res = [];
	var title = $(this).val().trim();
	var id = '';
	
    var url = BASEURL + 'pets/is_unique_title/';
    $.ajax({
		type : 'POST',
        url : url,
        data: {'title' : title,'id':id},
        beforeSend: function() {
           //$("#" + name).append('<span style="color:red;position:absolute;left: 15px;top: 160px">Deleting...</span>');
        },
        success: function(result){
			 res = JSON.parse(result);
			 $("#is_unique_title").val(res["response"]);
			 if(res["response"]=="error"){
				 var error = "Title aleady exists try another";
				 jQuery('html,body').animate({scrollTop: 0}, 500);
				$('#error_msgs').html(error).show().css({'color': 'red'});
				return false;
			 }
			 else{
				$('#error_msgs').html('')
			}
        }
    });
});

//remove images  from temp dir.
function remove_image(id, name){
    var url = BASEURL + 'pets/remove_image/';
    $.ajax({
        url: url,
        data: 'type=json&url=' + id,
        beforeSend: function() {
            $("#" + name).append('<span style="color:red;position:absolute;left: 15px;top: 160px">Deleting...</span>');
        },
        success: function(result){
            $("#" + name).html(''); $("#" + name).remove();
            var temp_images = $('input[name*="image"]').length;
			//If images less than 6 then we need to show button
            if (temp_images < 6) {$("#file_browse_wrapper").show();}
        }
    });
}

//remove documents from temp dir.
function remove_doc(id, name) {
    var url = BASEURL + 'pets/remove_docs/';
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
			//If doc. less than 6 then we need to show button
            if (temp_images < 6) {$(".11file_browse_wrapper").show();}
        }
    });
}
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
});