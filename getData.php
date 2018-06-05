<?php 
include 'connect.php';
if(isset($_POST['uName'])){
$username  = $_POST['uName']; 
//$username =  "dfadf";

//$result = mysql_db_query("climatechange","SELECT username_member FROM member_ where username_member = ".$username ) or die(mysql_error());
$sql = "SELECT username_member FROM member_ where username_member='".$username."'";
$result = mysql_db_query("climatechange",$sql) or die($sql);

if(mysql_num_rows($result)>0 )
{
	echo '[{"check":"true"}]';
}
else
{
	echo '[{"check":"false"}]';

}

}



/*
while($row  = mysql_fetch_array($result)) {
		echo $row["username_member"]."\n";
}

*/


?>


