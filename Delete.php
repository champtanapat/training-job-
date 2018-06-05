<?php 
include 'checkSession.php';
include 'connect.php';
if (isset($_POST['IDS'])) {
		$series = $_POST['IDS']; 
    	echo $series ; 
    	
    	$sqlDelete = "DELETE FROM harddrive WHERE ID = '".$series." ' "; 
    	$query = mysql_query($sqlDelete) or die(mysql_error());

	} 
?>