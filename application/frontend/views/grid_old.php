<?php
 $_SESSION["user_id"] = $this->session->userdata("userid");
 $_SESSION["user_type"] = $this->session->userdata("user_type");
 
function get_user_diable_dates($userid, $calmonth, $calyear){
	//echo $userid1 = $_SESSION['user_id'];
	//$this->common->car_id($this->session->userdata("user_id");
	//and '".$calmonth."' and '".$calyear."'
    $sql_q = "select group_concat(enabled_time) as time from evt_events
	WHERE user_id = '".$_SESSION["user_id"]."'
	AND user_type ='".$_SESSION["user_type"]."'
	AND type = 'month' ";
	$exec_q = mysql_query($sql_q);
	$q_r = mysql_fetch_assoc($exec_q);// print_r($q_r);
	return  explode(',', $q_r['time']);
}

function is_date_in_week_exists($start_time,$end_time){
	$sql_q = "select * from evt_events
	WHERE user_id = '".$_SESSION["user_id"]."'
	AND user_type ='".$_SESSION["user_type"]."'
	AND type = 'week'
	AND enabled_time BETWEEN '".$start_time."' AND '".$end_time."';";
	$exec_q = mysql_query($sql_q);
	$num = mysql_num_rows($exec_q);// print_r($q_r);
	return $num; 
}
function showMonth ($calmonth,$calyear) {
	//global $week_titles, $o, $m, $a, $y, $w, $c, $next, $prev,$ly, $lm, $le, $la;
if ((is_numeric($_REQUEST["m"]))&& ($_REQUEST["m"]!= 0)) {
	$_SESSION["m"] = $_REQUEST["m"];
	$m = $_REQUEST["m"];
} elseif ($_SESSION["m"]) {
	$m = $_SESSION["m"];
} else {
	$m = date(m);
}
if (strlen($m) == 1) $m = "0".$m;


if ((is_numeric($_REQUEST["a"]))&& ($_REQUEST["a"]!= 0)) {
	$_SESSION["a"] = $_REQUEST["a"];
	$a = $_REQUEST["a"];
} elseif ($_SESSION["a"]) {
	$a = $_SESSION["a"];
} else {
	$a = date(d);
}
if (strlen($a) == 1) $a = "0".$a;

if ((is_numeric($_REQUEST["y"]))&& ($_REQUEST["y"]!= 0)) {
	$_SESSION["y"] = $_REQUEST["y"];
	$y = $_REQUEST["y"];
} elseif ($_SESSION["y"]) {
	$y = $_SESSION["y"];
} else {
	$y = date(Y);
}

	
$day_of_week = date("w", mktime( 0, 0, 0, $m, $a, $y ) );
$wa = $a-$day_of_week;
for($wacount=0;$wacount < 7;$wacount++) {
	$now["week"]["a"][$wacount] = date( "d", mktime( 0, 0, 0, $m, $wa+$wacount, $y ) );
	$now["week"]["m"][$wacount] = date( "m", mktime( 0, 0, 0, $m, $wa+$wacount, $y ) );
	$now["week"]["y"][$wacount] = date( "Y", mktime( 0, 0, 0, $m, $wa+$wacount, $y ) );
	
}

$next["week"]["a"] = date( "d", mktime( 0, 0, 0, $m, $wa+7, $y ) );
$next["week"]["m"] = date( "m", mktime( 0, 0, 0, $m, $wa+7, $y ) );
$next["week"]["y"] = date( "Y", mktime( 0, 0, 0, $m, $wa+7, $y ) );
$prev["week"]["a"] = date( "d", mktime( 0, 0, 0, $m, $wa-7, $y ) );
$prev["week"]["m"] = date( "m", mktime( 0, 0, 0, $m, $wa-7, $y ) );
$prev["week"]["y"] = date( "Y", mktime( 0, 0, 0, $m, $wa-7, $y ) );

$next["day"]["a"] = date( "d", mktime( 0, 0, 0, $m, $a+1, $y ) );
$next["day"]["m"] = date( "m", mktime( 0, 0, 0, $m, $a+1, $y ) );
$next["day"]["y"] = date( "Y", mktime( 0, 0, 0, $m, $a+1, $y ) );
$next["month"]["m"] = date( "m", mktime( 0, 0, 0, $m+1, 1, $y ) );
$next["month"]["y"] = date( "Y", mktime( 0, 0, 0, $m+1, 1, $y ) );
$next["year"]["y"] = date( "Y", mktime( 0, 0, 0, 1, 1, $y+1 ) );

$prev["day"]["a"] = date( "d", mktime( 0, 0, 0, $m, $a-1, $y ) );
$prev["day"]["m"] = date( "m", mktime( 0, 0, 0, $m, $a-1, $y ) );
$prev["day"]["y"] = date( "Y", mktime( 0, 0, 0, $m, $a-1, $y ) );
$prev["month"]["m"] = date( "m", mktime( 0, 0, 0, $m-1, 1, $y ) );
$prev["month"]["y"] = date( "Y", mktime( 0, 0, 0, $m-1, 1, $y ) );
$prev["year"]["y"] = date( "Y", mktime( 0, 0, 0, 1, 1, $y-1 ) );

if((is_numeric($_REQUEST["c"]))&& ($_REQUEST["c"] != 0)) {
	$_SESSION["c"] = $_REQUEST["c"];
	$c = $_REQUEST["c"];
} elseif ($_SESSION["c"]) {
	$c = $_SESSION["c"];
} else {
	$c = 1;
}

if ((is_numeric($_REQUEST["w"]))&& ($_REQUEST["w"]!= 0)) {
	$_SESSION["w"] = $_REQUEST["w"];
	$w = $_REQUEST["w"];
} elseif ($_SESSION["w"]) {
	$w = $_SESSION["w"];
} else {
	$w = 1;
}


if ((is_numeric($_REQUEST["o"]))&& ($_REQUEST["o"]!= 0)) {
	$_SESSION["o"] = $_REQUEST["o"];
	$o = $_REQUEST["o"];
} elseif ($_SESSION["o"]) {
	$o = $_SESSION["o"];
} elseif ($default_module) {
	$o = $default_module;
} else {
	$o = mysql_result(mysql_query("SELECT module_id from ".$table_prefix."modules where active = 1 order by sequence limit 1"),0,0);
}
if (!$o) {
	
	$msg .= "<p class=\"warning\">".$lang["no_modules_installed"]."</p>\n";
} else {
	$q = "SELECT * from ".$table_prefix."modules where module_id = ".$o;
	$query = mysql_query($q);
	if (!$query) $msg = "Database Error : ".$q;
	else {
		$row = mysql_fetch_array($query);
		if (!$page_title) $page_title = $row["name"];
		$script = $row["script"];
		$ly = $row["year"];
		$lm = $row["month"];
		$la = $row["day"];
		$le = $row["week"];
	}

}
	
	/* determine total number of days in a month */
	$dates = get_user_diable_dates(2,$calmonth,$calyear);
	$calday = 0;
	$totaldays = 0;
	while ( checkdate( $calmonth, $totaldays + 1, $calyear ) )
	        $totaldays++;
	
	/* build table */
	echo '<table width="100%" class="grid""><tr>'; 
	echo '<th colspan="7" class="cal_top">
	<input type="hidden" value="" id="temp_value">
	<a href="',$PHP_SELF,'?cause_id='.$_GET["cause_id"].'&o=',$o,'&w=',$w,'&c=',$c,'&m=',$prev["month"]["m"],'&a=1&y=',$prev["month"]["y"],'">&lt;</a> ',date('F', mktime(0,0,0,$calmonth,1,$calyear)),'&nbsp;',date('Y', mktime(0,0,0,$calmonth,1,$calyear)),' <a href="',$PHP_SELF,'?o=',$o,'&w=',$w,'&c=',$c,'&m=',$next["month"]["m"],'&a=1&y=',$next["month"]["y"],'">&gt;</a></th></tr><tr>';
	for ( $x = 0; $x < 7; $x++ )
	        echo '<th>', $week_titles[ $x ], '</th>';
	
	/* ensure that a number of blanks are put in so that the first day of the month
	   lines up with the proper day of the week */
	$off = date( "w", mktime( 0, 0, 0, $calmonth, $calday, $calyear ) );
	$offset = $off + 1;
	echo '</tr><tr>';
	if ($offset > 6) $offset = 0;
	for ($t=0; $t < $offset; $t++) {
		if ($t == 0) {
			//$datefull = date( "m-d-Y", mktime( 0, 0, 0, $calmonth, $calday-$off, $calyear ) );
			
			$offyear = date( "Y", mktime( 0, 0, 0, $calmonth, $calday-$off, $calyear ) );
			$offmonth = date( "m", mktime( 0, 0, 0, $calmonth, $calday-$off, $calyear ) );
			$offday = date( "d", mktime( 0, 0, 0, $calmonth, $calday-$off, $calyear ) );
			
			echo '<td class="day"><div class="week">
			
			<a href="javascript:void(0);"></a>
			
			</div></td>';
			
		} else {
			echo '<td class="day">&nbsp;</td>';
		}
	}
	
	/* start entering in the information */
	for($d = 1; $d <= $totaldays; $d++ ){
		
			 $time = strtotime($d."-".$calmonth."-".$calyear." 00:00:00");
			 $end_time = strtotime($d."-".$calmonth."-".$calyear." 23:59:59");
			 
			 
			if (($d == date(j)) && ($calmonth == date(m)) && ($calyear == date(Y))) {
				$is_date_in_week_exists = is_date_in_week_exists($time,$end_time);
				 
				if(in_array($time,$dates) || $is_date_in_week_exists > 0){ $class = "vik_grid booked"; }else { $class= "vik_grid"; }
				echo '<td class="day '.$class.' '.$d.$calmonth.$calyear.'" id="today" name="'.$d.'/'.$calmonth.'/'.$calyear.'"><div class="day_of_month">
				<a href="javascript:void(0);">', $d, '</a>
				</div>';
			} 
			else{ 
			
				$is_date_in_week_exists = is_date_in_week_exists($time,$end_time); 
				if(in_array($time, $dates) || $is_date_in_week_exists > 0){ $class = "vik_grid booked"; }else { $class= "vik_grid"; }
				echo '<td class="day '.$class.' '.$d.$calmonth.$calyear.'" name="'.$d.'/'.$calmonth.'/'.$calyear.'"><div class="day_of_month">
				<a href="javascript:void(0);">', $d, '</a>
				</div>';
				if ($offset == 0) echo '<div class="week">
				<a href="javascript:void(0);"></a>
				</div>';
			}
			/* correct date format */
			$coredate = date( "Ymd", mktime( 0, 0, 0, $calmonth, $d, $calyear ) );
			//showGrid($coredate);
			echo "</td>";
	        $offset++;
	        /* if we're on the last day of the week, wrap to the other side */
	        if ( $offset > 6 )
	        {
	                $offset = 0;
	                echo '</tr>';
	                if ( $day < $totaldays )
	                        echo '<tr>';
	        }
	}
	
	/* fill in the remaining spaces for the end of the month, just to make it look
	   pretty */
	if ( $offset > 0 )
	        $offset = 7 - $offset;
	
	for ($t=0; $t < $offset; $t++) {
		echo "<td>&nbsp;</td>";
	}
	/* end the table */
	echo '</tr></table>';
}
include  APPPATH.'views/header.php';


 $thismonth = $y."-".$m;
 $nextmonth =  $next["month"]["y"]."-".$next["month"]["m"];

grab($thismonth."-01",$nextmonth."-01",$c);
showMonth($m,$y);

include  APPPATH.'views/footer.php';


?>
