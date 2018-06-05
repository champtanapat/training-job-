<?php

$server   = "localhost";
$user     = "root";
$password = "123456789";
$dbname   = "climatechange";
$conn     = mysql_connect($server, $user, $password, $dbname) or die(mysql_error()) ;

if (!$conn) {
    echo "Cannot connect Database";

}
?>