// JavaScript Document
function show_error(validate){
	var result = true;
	$.each(validate, function(key, value) {
		if(value != undefined){
			$.each(value, function(k, v){
				if(v == false){
					$('.error').hide();
					$('#error').html(value[1]);
					$('#error').show();
					result = false;
					return false;
				}
			});
		}
		if(result == false){return false;}
	});
	return result;
}

function file_selected(id, msg){
	var message = [];	message[0] = true;
	var ext = $('#'+id).val().split('.').pop().toLowerCase();
	if(ext == ''){
		message[0] = false;
		message[1] = msg;
	}
	return message;
}

function file_ext(id, msg){
	var message = [];	message[0] = true;
	var ext = $('#'+id).val().split('.').pop().toLowerCase();
	if(ext == ''){
		message[0] = true;
	}
	else if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
		message[0] = false;
		message[1] = msg;
	}
	return message;
}
function file_ext_pdf(id, msg){
	var message = [];	message[0] = true;
	var ext = $('#'+id).val().split('.').pop().toLowerCase();
	if(ext == ''){
		message[0] = true;
	}
	else if($.inArray(ext, ['pdf']) == -1) {
		message[0] = false;
		message[1] = msg;
	}
	return message;
}
function txt_required(id, msg){

	var message = [];	message[0] = true;
	if($("#"+id).val() == '') {
		message[0] = false;
		message[1] = msg;
	}
	return message;
}

function char_min_limit(id, length, msg){
	var message = [];	message[0] = true;
	if($("#"+id).val().length < length) {
		message[0] = false;
		message[1] = msg;
	}
	return message;
}

function email(id, msg){
	var message = [];	message[0] = true;
	var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if(!regex.test($("#"+id).val())){
		message[0] = false;
		message[1] = msg;
	}
	return message;
}

function alnum(id, msg){
	var message = [];	message[0] = true;
	var regex = /^[a-zA-Z0-9]+$/;
	if(!regex.test($("#"+id).val())){
		message[0] = false;
		message[1] = msg;
	}
	return message;
}

function float(id, msg){
	var message = [];	message[0] = true;
	var regex = /^\d*\.?\d*$/;
	if(!regex.test($("#"+id).val())){
		message[0] = false;
		message[1] = msg;
	}
	else{
	   return false;
	}
	return message;
}


function ipaddress(id, msg){
	var message = [];	message[0] = true;
	var val=$("#"+id).val();
	if(!(val >= 0 && val <= 255) || val == ''){
		message[0] = false;
		message[1] = msg;
	}
	return message;
}


function digit(id, msg){
	var message = [];	message[0] = true;
	var regex = /^[0-9]+$/;
	if(!regex.test($("#"+id).val())){
		message[0] = false;
		message[1] = msg;
	}
	return message;
}

function compare(id, id1, msg){
	var message = [];	message[0] = true;
	if($("#"+id).val() != $("#"+id1).val()) {
		message[0] = false;
		message[1] = msg;
	}
	return message;
}
