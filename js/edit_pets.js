// JavaScript Document
$(document).ready(function() {
	$('.multiselect').multiselect({
		includeSelectAllOption: true
	});
	

	function nextTab(elem) {
		$(elem + ' li.active').next().find('a[data-toggle="tab"]').click();
	}
	
	function prevTab(elem) {
		$(elem + ' li.active').prev().find('a[data-toggle="tab"]').click();
	}
	
	var temp_images = $('.count_docs').length;
	var temp_upload_img = $('.temp_upload_img').length;
	
	if(temp_images >= 6){
		$(".11file_browse_wrapper").hide();
	}
	if(temp_upload_img >= 6){
		$("#file_browse_wrapper").hide();
	}
	
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
	/*$(".btn-group").trigger('click');
	$(".btn-group").addClass('open');
		
    $('#chkBoxPetAdopt').click(function () {
          if ($(this).is(':checked')) {
              $("#myModalk").modal('show');
              $('#chkBoxPetAdopt').prop('checked', false);  
          } else {
              $("#myModalk").modal('hide');
              $('#chkBoxPetAdopt').prop('checked', false);                      
          }
          $('#myModal').on('hidden.bs.modal', function (e) {
             $('#chkBoxPetAdopt').prop('checked', false);                      
          })
      });*/
});

function show_hide(id){
	    var block_id  = $('#'+id).is(":checked");
	    if(id === 'petadoption' && block_id == true)
	    {
	         $('#fundraising').prop('checked', false);
			 $('#volunteer').prop('checked', false);
			 $('#petition').prop('checked', false);
		      if(confirm("By selecting the 'Pet adoption' checkbox for creating adoption cause all previous message will be lost. Proceed??"))
				{
				 window.location.href = BASEURL+"start_cause/";
				}
			 else {$('#'+id).prop('checked', false);}
		}
		else{
		    if(block_id == true){$('#'+id+'_block').show();}
			else{$('#'+id+'_block').hide();}
		}
	  }
	  function remove_image(id,name){
		var url = BASEURL+'start_cause/remove_image/';
		 $.ajax({
			 url:url,
			 data:'type=json&url='+id,
			 beforeSend:function(){
				$("#" + name).append('<span style="color:red;position:absolute;left: 15px;top: 160px">Deleting...</span>');
			 },
			 success:function(result){
				$("#"+name).remove();
				var temp_images = $('input[name*="image"]').length;
				if(temp_images < 6){
					$("#file_browse_wrapper").show();
				} 
			 }	
		});		
	 }
	
	 function remove_doc(id,name){
	    
		var url = BASEURL+'start_cause/remove_docs/';
        $.ajax({
			 url:url,
			 data:'type=json&url='+id,
			 beforeSend:function(){
				$("#" + name).append('<span style="color:red;position:absolute;left: 15px;top: 160px">Deleting...</span>');
			 },
			 success:function(result)
			 {
			  	$("#"+name).remove();
			    var temp_images = $('.count_docs').length;
				if(temp_images < 6){
					$(".11file_browse_wrapper").show();
				}
			 }	
		});		
	}
	function remove_image_edit(id,name){
	    
		var url = BASEURL+'start_cause/remove_image_edit/';
		   $("#"+name).remove();
       /* $.ajax({
			 url:url,
			 data:'type=json&url='+id,
			 beforeSend:function(){
				$("#" + name).append('<span style="color:red;position:absolute;left: 15px;top: 160px">Deleting...</span>');
			 },
			 success:function(result)
			 {
			   $("#" + name).html('');
			   $("#"+name).remove();
			   var temp_images = $('input[name*="image"]').length;
				if(temp_images < 6){
					$("#file_browse_wrapper").show();
				} 
			 }	
		});	*/	
	}
	 function remove_docs_edit(id,name){
		var url = BASEURL+'start_cause/remove_docs_edit/';
         $.ajax({
			 url:url,
			 data:'type=json&url='+id,
			 beforeSend:function(){
				$("#" + name).append('<span style="color:red;position:absolute;left: 15px;top: 160px">Deleting...</span>');
			},
			success:function(result)
			 {
			   $("#" + name).html('');
			   $("#"+name).remove();
			   var temp_images = $('.count_docs').length;
                if(temp_images < 6){
					$(".11file_browse_wrapper").show();
				}
			 }	
		});		
	}
	function get_user_address(){
		if($('#options').is(":checked") == true){
		 var url = BASEURL+'start_cause/get_user_address/';
			 $.ajax({
			 url:url,
			 data:'type=json',
				 beforeSend:function(){
					$('#options').hide();
					$('#loading').html('<font style="color:red;">Processing....</font>');
				},
				 success:function(result)
				 {
					$('#loading').html('');
					$('#options').show();
					var result = eval("("+result+")");
					$('#postal_code').val(result['postal_code']);
					$('#address').val(result['address']);
					$('#unit_f').val(result['unit_f']);
					$('#unit_l').val(result['unit_l']);
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
                $('#volunteer_event_postal').val(result['postal_code']).attr('readonly',true);
                $('#volunteer_event_address').val(result['address']).attr('readonly',true);
                $('#volunteer_event_unit_f').val(result['unit_f']).attr('readonly',true);
                $('#volunteer_event_unit_l').val(result['unit_l']).attr('readonly',true);
            },
            error: function(xhr, textStatus, errorThrown) {
                alert(textStatus);
            }
        });
    }
    else
    {
        $('#volunteer_event_postal').val('').removeAttr('readonly');
        $('#volunteer_event_address').val('').removeAttr('readonly');
        $('#volunteer_event_unit_f').val('').removeAttr('readonly');
        $('#volunteer_event_unit_l').val('').removeAttr('readonly');
    }
}	
function check_validation(){
	var fund = 0;
	var title = $('#title').val().trim();
	var country = $('#country').val();
	var breed_id = $('#breed_id').val();
	var information = $('#information_id').val();
	var age = $('#age').val().trim();
	var summary =$('#summary').val();
	var images = $('input[name*="image"]').length;
	var detailed_stories =$('#detailed_stories').val();
	var duration = $('#duration').val();
	var pet_adoption_options = $('#pet_adoption_options').is(":checked") ? 1 : 0;
    var location = $("#location").val();
	var float = /^[1-9]\d*(\.\d+)?$/;
    var num = /^[0-9\ ]+$/;
    var zip_regex = /^[a-zA-Z0-9]{3,12}$/i;//numeric, alphabets 3-12 in length
    var imgexts = ['gif', 'GIF', 'jpg', 'jpeg', 'JPEG', 'png', 'PNG'];
    
	
	if(title == "") {
        var error = "Please enter title";
        $("#title").focus();
    }
    else if (title.length > 140) {
        var error = "You can\'t enter more than 140 characters in title";
        $("#title").focus();
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
	else if(images == ""){
		var error = "Please provide images";
	}
	else if(images < 2){
		var error = "Please provide atleast two images";
	}
	else if(detailed_stories == ""){
		var error = "Please enter detailed stories";
	}
	else if (duration == "") {
		var error = "Please enter duration";
		$("#target_amount").focus();
	}
	else if (!num.test(duration)) {
		var error = "Duration must be a number";
		$("#duration").focus();
	}
	else if (location == "") {
		var error = "Please enter location";
		$("#location").focus();
	}
	if(error != '' && error != null){
		 jQuery('html,body').animate({scrollTop:0},500);
		//window.scrollTo(0,400);
		$('#error_msgs').html(error).show().css({'color':'red'});
		return false;
	}
	else{
	   $('#pet_adoption_form').submit();  
	} 
}

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

function save_pet_adoption(cause_id){
	
	var confirmation = $("#confirm").is(":checked") ? true : false;
	
	if(confirmation == false){
		var error = "Please confirm the information";
		swal("oops something wrong", error, "error");
	}
	
	else{
		 $.ajax({
		   type: "POST",
			url:BASEURL+'pets/mark_steps_completed/',
			data:{'cause_id':cause_id},
			beforeSend:function(xhr, settings){ 
			},
			success:function(rep){ 
			result = JSON.parse(rep);
			console.log(result);
			 if(result["response"] == 'success'){
					jQuery('html,body').animate({scrollTop:0},500);
					$('#error_msgs').html("Pet adoption has been successfully updated").css({'color':'green'}).show(3000,function(){
						window.location.href = BASEURL+'pets/manage_pets/';
					});
			  }
			  else if(result["response"] == 'error1'){
					swal("oops something wrong","Please create atleast one availability.", "error");
			  }
			  else if(result["response"] == 'error'){swal("oops something wrong", "There is some error please contact admin", "error");}
			}	
		});
	}
}

/**********************************drag and  drop file for uploading starts**********************************************/
$(document).bind('drop dragover', function (e) {e.preventDefault();});


$(document).bind('dragover', function (e){
    var dropZone = $('.dropzone'),
        foundDropzone,
        timeout = window.dropZoneTimeout;
        if (!timeout){ dropZone.addClass('in');}
        else { clearTimeout(timeout); }
        var found = false,
        node = e.target;
        do{ if ($(node).hasClass('dropzone')){
                found = true;
                foundDropzone = $(node);
                break;
            }
            node = node.parentNode;
        }while (node != null);
        dropZone.removeClass('in hover');
        if (found){foundDropzone.addClass('hover');}
        window.dropZoneTimeout = setTimeout(function () {
            window.dropZoneTimeout = null;
            dropZone.removeClass('in hover');
        }, 100);
    });
/**********************************drag and  drop file for uploading starts**********************************************/
$(function() {
	var jj=LAST_ID;
		$("#progress").hide();
        'use strict';
        // Change this to the location of your server-side upload handler:
        var url = BASEURL+'pets/upload_image/';
		$('#fileupload').fileupload({
			url: url,
            dataType: 'json',
			dropZone: $('#dropzone'),
			beforeSend:function(event,files,index,xhr,handler,callBack){
				$("#upload_1").show();
				$("#browse_image").hide();
				$("#image_loading").show();
   			},
			add: function(e, data) {
					var uploadErrors = [];
					var file = data.originalFiles[0]['name'];
					var choosen_length =  data.originalFiles.length;
					var temp_images = $('input[name*="image"]').length;
					var total_temp_images = parseInt(choosen_length)+parseInt(temp_images);
				 	var exts = ['gif', 'GIF', 'jpg', 'jpeg', 'JPEG', 'png', 'PNG'];
				  
					$.each(data.originalFiles, function(index, value){
					//console.log("INDEX: " + index + " VALUE: " + value.name);
						var get_ext = value.name.split('.');// split file name at dot
						var myext =  get_ext.reverse();// reverse name to check extension
						if ($.inArray (myext[0].toLowerCase(), exts ) > -1 ){
							// check file type is valid as given in 'exts' array
						}
						else{
							uploadErrors.push( 'Wrong file type only .jpg, .png and .gif allowed');
						}
					});
				
					if(total_temp_images >= 6){
						$("#file_browse_wrapper").hide();
					}
					if(total_temp_images > 6){
						uploadErrors.push(' You can\'t upload more than 6 images');
					}
					else if(data.originalFiles[0]['size'] > 4000000) {
						uploadErrors.push(' Filesize is too big please upload file less than 4 mb');
					}
					if(uploadErrors.length > 0) {
						 window.scroll(0,0);
						 $('#error_msgs').html(uploadErrors[0]).show().css({'color': 'red'});
						// jQuery('html,body').animate({scrollTop:0},500);
						//alert(uploadErrors.join("\n"));
					} else {
						data.submit();
					}
			},
			
			complete: function(response) { // on complete
				
			},
			progressall: function (e, data) {
				$("#progress").show();
				var progress = parseInt(data.loaded / data.total * 100, 10);
				$('#progress .progress-bar').css(
					'width',
					progress + '%'
				).text(progress + '%');
			},
            done: function(e, data) {
				
				$("#upload_1").hide();
				$("#image_loading").hide();
				$("#browse_image").show();
				$('#message').val('');
				$("#progress").hide();
				
                $.each(data.result.files, function(index, file) {
					//if(file.error == ""){
						var name = file.name;
						var type = file.type;
						var file_type = type.split('/');
						var newString = name.replace(/([~!@#$%^&*()_+=`{}\[\]\|\\:;'<>,.\/? ])+/ig, "-");
						$('#append_data').append('<div  id="'+newString+'" class="temp_upload_img"><div><div>'+file.name+'</div>\n\
						<ul class="app_data_ul">\n\
						<li class="image" style="background-image:url(' + file.thumbnailUrl + ');background-size:cover; height:100px;background-position: center center;border: 2px solid white;"></li>\n\
						</ul>\n\
						</div><span  style="float:left;line-height: 2;"><input type="hidden" name="image[]" value="'+file.name+'" /><a id='+file.deleteUrl+'  name='+newString+' onclick="remove_image(this.id,this.name);" style="cursor:pointer;">Delete</a></span></div></div>');
					jj++;
					/*}
					else{
						$('#error_msgs').html(file.error).show().css({'color': 'red'});
					}*/
				});
            }
        }).bind('fileuploadsubmit', function(e, data) {
           var message_sender = $("#message_sender").val();
           data.formData = {message_sender: message_sender};
        }).prop('disabled', !$.support.fileInput).parent().addClass($.support.fileInput ? undefined : 'disabled');
    });
	
//////////////////////////////////////////////////////////// doc upload /////////////////////////////////////////////////////////////////////////////////////////////	
	$(function() {
		$("#progress1").hide();
        'use strict';
        // Change this to the location of your server-side upload handler:
        var url = BASEURL+'pets/upload_doc/';
		
		$('#fileupload1').fileupload({
			url: url,
            dataType: 'json',
			dropZone: $('#dropzone1'),
			beforeSend:function(event,files,index,xhr,handler,callBack){
				$("#upload_2").show();
				$("#browse_doc").hide();
				$("#doc_loading").show();
   			},
			add: function(e, data) {
					var uploadErrors = [];
					var choosen_length =  data.originalFiles.length;
					var temp_doc = $('.count_docs').length;
					var total_temp_doc = parseInt(choosen_length) + parseInt(temp_doc);
					var exts = ['pdf', 'PDF'];
					   
					$.each(data.originalFiles, function(index, value){
						//console.log("INDEX: " + index + " VALUE: " + value.name);
						var size  = value.size;
						var get_ext = value.name.split('.');// split file name at dot
						var myext =  get_ext.reverse();// reverse name to check extension
						
						if(size > 4000000){
							uploadErrors.push('Filesize is too big please upload file less than 4 mb');
						}
						
						if ($.inArray (myext[0].toLowerCase(), exts ) > -1 ){
							// check file type is valid as given in 'exts' array
						}
						else{
							uploadErrors.push( 'Wrong file type only .pdf allowed');
						}
					});
				   
					if(total_temp_doc >= 6 && uploadErrors.length ==0){
						$(".11file_browse_wrapper").hide();
					}
					if(total_temp_doc > 6){
						uploadErrors.push(' you can\'t upload more than 6 documents');
					}
					
					if(uploadErrors.length > 0) {
						  window.scroll(0,0);
						  $("#11file_browse_wrapper").show();
						 $('#error_msgs').html(uploadErrors[0]).show().css({'color': 'red'});
						//alert(uploadErrors.join("\n"));
					} else {
						data.submit();
					}
			},
			complete: function(response) { // on complete
				
			},
			progressall: function (e, data) {
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
					
					if(file_type1[1] == 'doc' || file_type1[1] == 'docx' || file_type1[1] == 'DOC' || file_type1[1] == 'DOCX' ){
						$('#append_data1').append('<div id="'+newString1+'"><div><div>'+file.name+'</div><img style="position:relative;" src="'+BASEURL+'images/my_file_020.png" alt="pic" height="100" width="100"/></div><span  style="float:left;line-height: 2;padding: 0 1px 0 47px;"><input type="hidden" name="docs[]" value="'+file.name+'" /><a id='+file.deleteUrl+' name='+newString1+' onclick="remove_doc(this.id,this.name);" style="cursor:pointer;">Delete</a></span></div></div>');
					}
					else
					{
						$('#append_data1').append('<div id="'+newString1+'" class="count_docs"><div><div>'+file.name+'</div><img style="position:relative;" src="'+BASEURL+'images/my_file_048.png" alt="pic" height="100" width="100"/></div><span  style="float:left;line-height: 2;padding: 0 1px 0 47px;"><input type="hidden" name="docs[]" value="'+file.name+'" /><a id='+file.deleteUrl+' name='+newString1+' onclick="remove_doc(this.id,this.name);" style="cursor:pointer;">Delete</a></span></div></div>');
					}
				});
            }
        }).bind('fileuploadsubmit', function(e, data) {
           var message_sender = $("#message_sender").val();
           data.formData = {message_sender: message_sender};
        }).prop('disabled', !$.support.fileInput).parent().addClass($.support.fileInput ? undefined : 'disabled');
    });
		
	$(document).ready(function() {/*
	$("#postal_code").on("blur", function (e) {
			var personal_nationality = 'singapore';
			var personal_postal_code = $("#postal_code").val();
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
							$('#address').val('');
							alert("No result found");
						}
						else
						{
							$('#address').val(obj);
						}
					}
				});
	});
*/});	

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


jQuery(function(){	
	$('#volunteer_start_date').datetimepicker({
		format:'d/m/Y h:i a',
		minDate:'0',//yesterday is minimum date(for today use 0 or -1970/01/01)
		step: 5,
		opened: false,
		validateOnBlur: false,
		closeOnDateSelect: false,
		closeOnTimeSelect: false,
		mask:false,
		onChangeDateTime:function(dp,$input){
			//$input.nextAll('.temp_date_value').remove();
			//$input.after($('<input  type="hidden" class="temp_date_value" value="">').val($input.val()));
		}
	});
	
	jQuery('#volunteer_end_date').datetimepicker({
		format:'d/m/Y h:i a',
		step: 5,
		opened: false,
		validateOnBlur: false,
		closeOnDateSelect: false,
		closeOnTimeSelect: false,
		mask:false,
		onChangeDateTime:function(dp,$input){
			//console.log($input.val())
		}
	});
});
