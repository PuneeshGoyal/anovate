// JavaScript Document

$("#donate_bttn").click(function(e) {
    jQuery('html,body').animate({scrollTop:1000},0);
});



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