<?php
$server   = "localhost";
$user     = "root";
$password = "123456789";
$dbname   = "climatechange";
$conn     = mysql_connect($server, $user, $password) or die(mysql_error()) ;
mysql_select_db($dbname);

if (!$conn) {
	//echo "connect Database";


    echo "Cannot connect Database";

}

?>