<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/supercali.css">
<?php if ($_REQUEST["size"] == "small") echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"css/small.css\">\n"; ?>
<?php if ($css) echo $css; ?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script language="JavaScript" src="<?php echo base_url();?>js/CalendarPopup.js"></script>
<script language="JavaScript">document.write(getCalendarStyles());</script>
<script language="JavaScript" src="<?php echo base_url();?>js/ColorPicker2.js"></script>
<script language="JavaScript" src="<?php echo base_url();?>js/miscfunctions.js"></script>
<?php if ($javascript) echo $javascript; ?>


</head>

<body <?php /*?>style="pointer-events: none !important;"<?php */?>>
<div class="content">
<?php if ($msg) echo "<p class=\"warning\">".$msg."</p>\n"; ?>