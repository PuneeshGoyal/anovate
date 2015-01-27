// JavaScript Document
function ToggleDiv(id)
 {
   $("#faq"+id).slideToggle("fast");;
   

 }
 
/* var flag = 0;
 var id1 = 0;
 function ToggleDiv(id)
 {
	if(id != id1)
	{
		flag = 0;
	}
	if(flag == 1){
		document.getElementById("li"+id).style.backgroundImage= "url(image/category_bg.png)";
			  $("#sec"+id).hide(400);
		flag = 0;
	}
	else{
		document.getElementById("li"+id).style.backgroundImage= "url(image/category_bg_hover.png)";
		flag = 1;
		$("#sec"+id).show(400);
		if(id1 != 0 && id1 != id)
		{
			$("#sec"+id1).hide(400);
			document.getElementById("li"+id1).style.backgroundImage= "url(image/category_bg.png)";
		}
		id1 = id;
	}
	
	return false;
 }
   // $("div#fst").click(function () {
//    $("div#sec").toggle(400);
//    });
*/