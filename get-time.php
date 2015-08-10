<?php
//error_reporting(E_ALL);

include 'timezone-list.php';

// Gets the timezone offset from client to UTC and compares it to
// timezone list included.
$clientoffset  = $_POST['timezone'];
$sign          = $clientoffset >= 0 ? '-' : '+';
$hour          = $clientoffset / 60;
$minute        = $clientoffset % 60;
$offsetinhours = sprintf("%s%02d:%02d", $sign, $hour, $minute);
$timezone      = getTimezone($offsetinhours);

date_default_timezone_set($timezone);

// Checks for DST and return H - 1 if it is.
if (date('I')) {
	echo ((int) date("H") - 1) . date(':i:s A');
} else {
	echo date('H:i:s A');
}
?>
