<?php
include  APPPATH.'views/day_week_functions.php';
include  APPPATH.'views/header.php';
$car_id_sel = $_GET['cause_id'];
$thisweek = $now["week"]["y"][0]."-".$now["week"]["m"][0]."-".$now["week"]["a"][0];
$nextweek =  $next["week"]["y"]."-".$next["week"]["m"]."-".$next["week"]["a"];
grab($thisweek,$nextweek,$c);
echo '<div id="show_loader"  style="text-align:center;color:white;font-size:18px;top:0px; left:0px; height:100%; width:100%; display:none; position:fixed; background-color:inherit; background:url('.base_url().'images/bg.png) left repeat; z-index: 998;">
	<div class="jsgrid-load-panel" style="position: absolute; top: 50%; left: 50%; z-index: 1000; margin-top: -35px; margin-left: -105px;"><img src="'.base_url().'/images/show_loader.GIF" class="load_left"/><span class="img_span_n">Please wait a moment...</span></div>
</div>';

echo "<div class=\"frame\">\n";

echo '<div class="cal_top">
    <a href="',$PHP_SELF,'?cause_id='.$car_id_sel.'&o=',$o,'&w=',$w,'&c=',$c,'&m=',$prev["week"]["m"],'&a=',$prev["week"]["a"],'&y=',$prev["week"]["y"],'">&lt;</a> 
	',$lang["week_of"],date('F j, Y', mktime(0,0,0,$now["week"]["m"][0],$now["week"]["a"][0],$now["week"]["y"][0])),' 
	  <a href="',$PHP_SELF,'?cause_id='.$car_id_sel.'&o=',$o,'&w=',$w,'&c=',$c,'&m=',$next["week"]["m"],'&a=',$next["week"]["a"],'&y=',$next["week"]["y"],'">&gt;</a>
	  </div>'."\n";
	  
echo "<table class=\"day\"><tr>";
showHours();
echo "<td>

<table class=\"day\"><tr>";

for ($we=0;$we<7;$we++) {
	echo "<td width=\"14%\" class=\"single_day\">\n";
	showDay($now["week"]["y"][$we],$now["week"]["m"][$we],$now["week"]["a"][$we]);
	echo "</td>";
}
echo "</tr></table></td></tr></table>";
echo "</div>\n";
include  APPPATH.'views/footer.php';

?>