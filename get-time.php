<?php
	// error_reporting(E_ALL);
	// echo phpversion();
	include 'timezone-list.php';

	//gets the timezone offset from client to UTC and compares it to timezone list included
	$clientoffset = $_POST['timezone'];
	$sign = ($clientoffset >= 0) ? '-': '+';
	$offsetinhours =  $sign.sprintf("%02d", ($clientoffset/60)).":".sprintf("%02d",($clientoffset%60));
	$timezone = getTimezone($offsetinhours);
	date_default_timezone_set("Pacific/Honolulu");

	// checks for DST and return H - 1 if it is
	if(date('I')){
		echo ((int)date("H") - 1).date(':i:s A');
	}
	else echo date('H:i:s A');
?>