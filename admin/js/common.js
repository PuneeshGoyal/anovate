function reload_win(){
	location.reload();
}
$(document).ready(function() {
	$("#mainchbx").click(function() {
		var checked_status = this.checked;
		var checkbox_name = this.name;
		$("input[name=" + checkbox_name + "[]]").each(function() {
			this.checked = checked_status;
		});
	});
	$("input[name='chk[]']").click(function() {
		$("#mainchbx").attr('checked', false);
	});
	/*window.setTimeout(function() {$('.success').fadeOut('slow');}, 3000);
	window.setTimeout(function() {$('.error').fadeOut('slow');}, 3000);*/
	/*setTimeout(function(){init();}, 3000);
	function init()
	{
		$('.success').fadeOut('fast');
	}
	function init()
	{
		$('.error').fadeOut('fast');
	}*/
	/*setTimeout(function() {
		$('.success').fadeOut('fast');
	}, 3000);
	setTimeout(function() {
		$('.error').fadeOut('fast');
	}, 3000);*/
});
