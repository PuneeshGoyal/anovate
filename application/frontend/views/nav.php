<?php
$car_id_sel = $_GET['cause_id'];
$q = "SELECT module_id, link_name from ".$table_prefix."modules where active = 1 order by sequence";
$query = mysql_query($q);
if (!$query) $msg .= "Database Error : ".$q;
else {
	$i = false;
	while($row = mysql_fetch_row($query)) {
		if ($i == true) echo " | ";
		echo "<a href=\"?cause_id=".$car_id_sel."&do=".$_GET['do']."&o=".$row[0]."&c=".$c."&m=".$m."&a=".$a."&y=".$y."&w=".$w."\"";
			if ($o == $row[0]) echo " class=\"selected\"";
		echo ">".$row[1]."</a>";
		$i = true;
	}
}
?>

<div class="calendar-legend">
  <div class="key key-available">
    <div class="key-pill"></div>
    <div class="key-name"> Partial available </div>
  </div>
  <div class="key key-unavailable">
    <div class="key-pill"></div>
    <div class="key-name"> Full day available </div>
  </div>
  <div class="key key-unavailable">
    <div class="key-pill test"></div>
    <div class="key-name"> Unavailable </div>
  </div>
</div>
