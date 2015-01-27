// JavaScript Document
var element = $(".cannot_edit");
	var element_length = element.length;
	$(element).each(function(index,value) {
			element[index].onclick = function(){
			swal("oops something wrong", "You cannot edit ongoing/closed cause", "warning");
		}
	});
	
	var element = $(".cannot_delete");
	var element_length = element.length;
	$(element).each(function(index,value) {
			element[index].onclick = function(){
			swal("oops something wrong", "You cannot delete ongoing cause", "warning");
		}
	});
	
	var element = $(".cannot_close");
	var element_length = element.length;
	$(element).each(function(index,value) {
			element[index].onclick = function(){
			swal("oops something wrong", "You cannot close ongoing cause", "warning");
		}
	});

//to delete pending causes	
	var element = $(".can_delete");
	var element_length = element.length;
	$(element).each(function(index,value) {
		
		element[index].onclick = function(){
			var id = $(this).attr('id');
			swal({
				title: "Are you sure?",
				text: "You want to delete this cause",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: '#DD6B55',
				confirmButtonText: 'Yes, delete it!'
			},
			function(){
				window.location.href = BASEURL+'start_cause/delete_cause/'+id;
			});
		}
 });

//to delete pending causes	
	var element = $(".can_close");
	var element_length = element.length;
	$(element).each(function(index,value) {
		
		element[index].onclick = function(){
			var id = $(this).attr('id');
			swal({
				title: "Are you sure?",
				text: "You want to close this cause",
				type: "warning",
				showCancelButton: true,
				confirmButtonColor: '#DD6B55',
				confirmButtonText: 'Yes, close it!'
			},
			function(){
				window.location.href = BASEURL+'start_cause/close_cause/'+id;
			});
		}
	  });
	  
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
		
				
$('#view_appointment_modal').on('loaded.bs.modal', function () {
   			$("#view_appointment1").kkcountdown({
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


	//to check all check boxes	
	function check_all(element){
	 var el = $(element);
	 //console.log(el.is(':checked'));
	 if(el.is(':checked') == true) { // check select status
		$('.checkbox_select').not(':disabled').each(function(e) { //loop through each checkbox
			this.checked = true;  //select all checkboxes with class "checkbox1"
		});
	 }
	 else{
		$('.checkbox_select').not(":disabled").each(function() { //loop through each checkbox
			this.checked = false; //deselect all checkboxes with class "checkbox1"                       
		});         
	 }
	}
	//function to uncheck all checkboxes
	function uncheck_all(){
		var check = $("#selecctall").is(':checked');
		if(check == true)
		{
			$("#selecctall").prop('checked',false);
		}
	}
	function mark_attendence(){
		var form  = $("#mark_attendence");
		//var chk = $('input[name="chk[]"]:checked').not(":disabled").length;
		var chk = $('input[name="chk[]"]').not(":checked ,:disabled").length;
		//var chk = $('.checkbox_select:checked').map(function() {return this.value;}).get().join(',')
		if(chk > 0){
			$("#error_attendence").html('Please select checkbox').css({'color':'red'});
			return false;
		}
		$.ajax({
			   type : 'POST',
			   url  : BASEURL+'accounts/mark_attendence/',
			   data : form.serialize(),
			   datatype : "application/json",
			   async :false,
			   beforeSend : function(){
			   },
				success: function(rep){
					obj = JSON.parse(rep);//parse response from server side
					if(obj["response"] == "error")//if respose is error this is executed
					{
					  $("#error_attendence").html(obj["message"]).css({'color':'red'});
					}
					else{
						 $("#error_attendence").html(obj["message"]).css({'color':'green'}).show(5000,function(){
						window.location.href = BASEURL+"accounts/manage_causes/";
					});
					}
				},
				error: function(rep,exception){
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
	
	$('body').on('hidden.bs.modal', '.modal', function () {
		$(this).removeData('bs.modal');
	});
