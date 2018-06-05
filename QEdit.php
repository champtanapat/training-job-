<?php

$Stemp = $_POST[''];
include 'connect.php';
$date =  strtotime($_POST['day']);
$date = date('Y-m-d H:i:s', $date);

$update = "UPDATE `harddrive` SET `Update_Time` = NOW() 'Warrnty' = '$date' WHERE ID = '$Stemp'";
$query = mysql_query($update);

mysql_close();
?>