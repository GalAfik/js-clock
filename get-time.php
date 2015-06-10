<?php
	// error_reporting(E_ALL);
	// echo phpversion();
	include 'timezone-list.php';

	$clientoffset = $_POST['timezone'];
	$sign = ($clientoffset >= 0) ? '-': '+';
	$offsetinhours =  $sign.sprintf("%02d", ($clientoffset/60)).":".sprintf("%02d",($clientoffset%60));
	$timezone = getTimezone($offsetinhours);
	date_default_timezone_set("America/New_York");
	echo date('H:i:s A');
?>