<?php
include 'connect.php';
$sqlInsert = "SELECT * FROM harddrive ";
if (isset($_POST['search_'])) {
	$sqlInsert.= "Where ID = ".$_POST['search_']; 

}
$query = mysql_query($sqlInsert) or die(mysql_error());
while ($rs = mysql_fetch_array($query)) {
    echo $rs[""] . "\n";
}

?>