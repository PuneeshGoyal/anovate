<?php
//error_reporting(0);
$_SESSION["user_id"] = $this->session->userdata("userid");
$_SESSION["user_type"] = $this->session->userdata("user_type");


function check_date($sd, $car_id){
	//print_r($_GET);
    $car_id_sel = $_GET['cause_id'];
 	$sql_qd = "select group_concat(enabled_time) as time from evt_events
	WHERE cause_id = '".$car_id_sel."'
	AND user_id='".$_SESSION["user_id"]."'
	AND user_type='".$_SESSION["user_type"]."' ";
	
	$exec_qd = mysql_query($sql_qd);
	$q_rd = mysql_fetch_assoc($exec_qd);
	$q_rdd = explode(',', $q_rd['time']);//print_r($q_rdd);
	return  $q_rdd;
}
function is_date_in_month_row_exists($start_time){
	$sql_q = "select * from evt_events
	WHERE cause_id = '".$_GET["cause_id"]."'
	AND user_id='".$_SESSION["user_id"]."'
	AND user_type='".$_SESSION["user_type"]."'
	AND type = 'month'
	AND enabled_time ='".$start_time."'";
	$exec_q = mysql_query($sql_q);
	$num = mysql_num_rows($exec_q);// print_r($q_r);
	return $num; 
}

function get_user_diable_times($userid,$dm,$dy,$da){
	$car_id_sel = $_GET['cause_id'];
    $sql_q = "select group_concat(enabled_time) as time from evt_events
	 where cause_id = '".$car_id_sel."'
	 AND user_id='".$_SESSION["user_id"]."'
	 AND user_type='".$_SESSION["user_type"]."'";
	 
	$exec_q = mysql_query($sql_q);
	$q_r = mysql_fetch_assoc($exec_q);// print_r($q_r);
	return  explode(',',$q_r['time']);
}

function getCalviewType($time){
	$car_id_sel = $_GET['cause_id'];
    $sql_q = "SELECT type from evt_events
	WHERE cause_id = '".$car_id_sel."'
	AND user_id='".$_SESSION["user_id"]."'
	AND user_type='".$_SESSION["user_type"]."'
	AND enabled_time='".$time."'";
	
	$exec_q = mysql_query($sql_q);
	$q_r = mysql_fetch_assoc($exec_q);// print_r($q_r);
	return  $q_r['type'];
}


function showHours() {
	global $day_week_start_hour, $day_week_end_hour;
	// build day
	echo "<td class=\"timex\"><table class=\"day\"><tr><td width=\"100%\"><div class=\"time_frame\">\n";
	echo "<div class=\"cell_top\">Time</div>\n";
	echo "<div class=\"cell\">12:00 AM ".$day_week_start_min."</div>\n";
	//echo "<div class=\"cell\">12:30 am ".$day_week_start_min."</div>\n";
	 $i = $day_week_start_hour ? $day_week_start_hour : 0;
	  $j = $day_week_start_hour ? 0 : 30;
	 $max = $day_week_end_hour ? $day_week_end_hour : 24;
	
	while ($i < $max) {
		if ($j < 10) {
			$j = "0".$j;
		}
		if ($i == 0) {
			$h = 12;
			$ap = "AM";
		} elseif ($i == 12) {
			$h = $i;
			$ap = "PM";
		} elseif ($i > 12) {
			$h = $i - 12;
			$ap = "PM";
		} else {
			$h = $i;
			$ap = "AM";
		}
		echo "<div class=\"cell\">".$h.":".$j." ".$ap."</div>\n";
		$j = $j+30;
		if ($j >= 60) {
			$j = "0";
			$i++;
		}
	}
	echo "</div></td></tr></table></td>";

}

function showDay($dy,$dm,$da,$caption="") { 
	$selected_dat = strtotime($da."-".$dm."-".$dy."00:00:00");
	
	$selectedDate = check_date($selected_dat, $car_id_sel); 
	global $la, $w, $c, $day_week_start_hour, $day_week_end_hour;
	// build day
	$dates = get_user_diable_times($_GET['cause_id'],$dm,$dy,$da);
	//print_r($dates);
	
	echo "<div class=\"single_day_frame\"><div class=\"cell_top\">";
	if($caption) echo $caption;
	else {echo date('D, M j', mktime(0,0,0,$dm,$da,$dy));}
	echo "</div>";
	
	$time1 = strtotime($da."-".$dm."-".$dy." 00:00:00");
	$time2 = strtotime($da."-".$dm."-".$dy." 00:30:00");
	
	///////////// 12:00 slab //////////////////////////////
	if(time() > $time1){$disabled_days = 'disabled_days'; $full='';$week_delete='';}
	else{$disabled_days=''; $full='booked';$week_delete='week_delete';}
	
	if(in_array($time1,$dates)){ $class = "cell vik partial-booked ".$week_delete.""; }
	else { $class= "cell vik ".$disabled_days.""; }
	
	echo "<div class=\"".$class."\" id=\"000".$dm.$da.$dy."\" name=\"0:00:".$dm."/".$da."/".$dy."\"></div>\n";
	///////////// 12:00 slab //////////////////////////////
	
	 /////////////// rest time slab /////////////////////////////////////////
	
	$i = $day_week_start_hour ? $day_week_start_hour : 0;
	$j = $day_week_start_hour ? 0 : 30;
	$max = $day_week_end_hour ? $day_week_end_hour : 24;
	
	while ($i < $max) {
		if ($j < 10) {
			$j = "0".$j;
			if ($i < 10) $i = $i;
		}
		if ($i == 0) {
			$h = 12;
			$ap = "AM";
		} elseif ($i == 12) {
			$h = $i;
			$ap = "PM";
		} elseif ($i > 12) {
			$h = $i - 12;
			$ap = "PM";
		} else {
			$h = $i;
			$ap = "AM";
		}
		if ($i < 10) $i = $i;
		
		$time = strtotime($da."-".$dm."-".$dy." ".$i.":".$j.":00");
		$time3 = strtotime($da."-".$dm."-".$dy." 23:59:59"); 
		
		if(time() > $time){
			$disabled_days = 'disabled_days';
			$full='';
			$week_delete='';
		}
		else{$disabled_days=''; $full='booked';$week_delete='week_delete';}
		
		if(in_array($time,$dates)){
			 $class = "cell vik partial-booked ".$week_delete.""; 
		}
		else { $class= "cell vik"; }
		
		$text=''.$i.':'.$j.':';
		echo "<div class=\"".$class." ".$disabled_days."\" id=\"".$i.$j.$dm.$da.$dy."\" name=\"".$text." ".$dm."/".$da."/".$dy."\" style=\"background-color: rgb(255, 255, 255);\"></div>\n";
		$j = $j+30;
		if ($j >= 60) {
			$j = "0";
			$i++;
		}
	}
	$sdate = $dy.$dm.$da;
	echo "<div id=\"dates\">\n";
	//showGrid($sdate);
	echo "</div>";
	echo "</div>";
}

?>