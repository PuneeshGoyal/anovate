// JavaScript Document

$("#donate_bttn").click(function(e) {
    jQuery('html,body').animate({scrollTop:1000},0);
});

/*$('a#proceed_adoption').on('click', function(e) {
	alert("djasghc");
    var src = $(this).attr('data-src');
	console.log(src)
	$("#notlong iframe").attr({'src':src});
});*/

function proceed_adoption(element){
	var uri_segment = [];
	var uri_val= [];
	
	var e = $(element);//element
	var src = e.attr('data-src');
	var uri_segment = src.split('&');
	var uri_val = uri_segment[1].split('=');
	$('#error_adoption').html('');
	var pet_id = $("#ucause_id").val();
	if(pet_id == ""){
		 swal("oops something wrong", 'No data found', "error");
	}
	//if edit direct go to step 2 that is booking appointment
	else if(uri_val[1] == "edit"){
		$("#long").modal('hide');
		$("#notlong").modal('show');
		$("#notlong iframe").attr({'src':src});
	}
	else{
		$.ajax({
			   type : 'POST',
			   url  : BASEURL+'pets/proceed_adoption/',
			   data : {'pet_id':pet_id},
				beforeSend : function(){
					$('#error_adoption').html('<span style="color:red">Processing.....Please wait couple of minutes.</span>');
				},
				success: function(rep){
					var result=eval("("+rep+")");
					if(result['status'] == 'error'){
					 $('#error_adoption').html(result['msg']).show().css({'color':'red'});	
					}else{
					 //setTimeout(function(){ window.location = BASEURL+'cause/thankyou/'+cause_id+'/'+result['data'];}, 3000);
					  $('#error_adoption').html(result['msg']).show().css({'color':'green'});
					  $("#long").modal('hide');
					  $("#notlong").modal('show');
					  $("#notlong iframe").attr({'src':src+'&appointment_id='+result['message']});
					}
				}
		});
	}
}

/*var elem = $( '#show_disable_session' )[0];
$(document).ready(function(){
    $(document).keydown(function(event){
		if(event.which == 27){
			$("#show_disable_session").hide();
		}
    });
});
$( document ).on( 'click', function ( e ) {
    if ( $( e.target ).closest( elem ).length === 1 ) {
        $( elem ).hide();
    }
});*/
$(window).load(function() {
	$('#slider_ab').flexslider({
		animation: "fade",
		controlNav: false,
		animationLoop: false,
		slideshow: false,
		sync: "#carousel_ab",
    });
  
	$('#carousel_ab').flexslider({
		animation: "slide",
		controlNav: false,
		animationLoop: false,
		directionNav: true,
		slideshow: false,
		itemWidth: 210,
		itemMargin: 5,
		asNavFor: '#slider_ab'
   });
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
});