<?php

/*$h = "localhost";
$d = "solitaire_anovate_soft";
$u = "root";
$p = "sunny007";
connecttodb($h,$d,$u,$p);*/
$calendar_title = "events";
$calendar_email = "mukeshkaushal2008@gmail.com";
$calendar_url = "";
$table_prefix = "evt_";
$default_module = 2;
// display sub-category events along with events in selected category
$include_child_categories = true;
// display events in parent category along with events in selected category
$include_parent_categories = true;
// How to display the titles on the header of the calendar
$week_titles[] = "Sun";
$week_titles[] = "Mon";
$week_titles[] = "Tue";
$week_titles[] = "Tue";
$week_titles[] = "Thu";
$week_titles[] = "Fri";
$week_titles[] = "Fri";

//used with the quarter view
$week_titles_s[] = "Sun";
$week_titles_s[] = "Mon";
$week_titles_s[] = "Tue";
$week_titles_s[] = "Wed";
$week_titles_s[] = "Thu";
$week_titles_s[] = "Fri";
$week_titles_s[] = "Fri";

//used with the year view
$week_titles_ss[] = "S";
$week_titles_ss[] = "M";
$week_titles_ss[] = "T";
$week_titles_ss[] = "W";
$week_titles_ss[] = "T";
$week_titles_ss[] = "F";
$week_titles_ss[] = "S";

// FCK Editor can be used for HTML of event text
$fck_editor_path = "";

$fck_editor_toolbar = "Basic"; // Basic or Default

// The default start category for the event calendar
$start_category_id = 1;

// Language File
//$language = "lang/en_us.php";

// Day/week view start hour
$day_week_start_hour = 1;

/*function connecttodb($servername,$dbname,$dbuser,$dbpassword){
	$link=mysql_connect ("$servername","$dbuser","$dbpassword");
	if(!$link){die("Could not connect to MySQL".mysql_error());}
	mysql_select_db("$dbname",$link) or die ("could not open db".mysql_error());
}*/
?>