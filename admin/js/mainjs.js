// JavaScript Document
<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-latest.pack.js"></script>
<script src="js/jquery.confirm.js"></script>
<script src="js/script.js"></script>

<script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript">
$(document).ready(function() {

			$("#mainchbx").click(function() {

				var checked_status = this.checked;

				var checkbox_name = this.name;
				$("input[name=" + checkbox_name + "[]]").each(function() {

					this.checked = checked_status;

				});

				check_rows();

			});
			});
			
<!-----------Fancybox Start-------------------!>
			$(document).ready(function() {
			$(".positioning").fancybox({
		'width'				: '70%',
		'height'			: '100%',
		'autoScale'			: false,
		'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'type'				: 'iframe'
	});
			});
<!-----------Fancybox End-------------------!>	
			function dis_fun(){

			if(confirm("Are you sure you want to Disable this category?")){

				return true;

			}

			else{

				return false;

			}

		}

		function enb_fun(){

			if(confirm("Are you sure you want to Enable this category?")){

				return true;

			}

			else{

				return false;

			}

		}

</script>