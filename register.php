<?php 
include 'connect.php'; 

$firsname = mysql_real_escape_string($_POST['firstname_']);
$lastname = $_POST['lastname_']; 
$email = $_POST['email_']; 
$username = $_POST['userReg_']; 
$password = $_POST['passwordReg_'];  

$sqlInsert = "INSERT INTO member VALUES ('','$firsname','$lastname','$email','$password','$username')"; 
$query = mysql_db_query("climatechange",$sqlInsert) or die(mysql_error()); 
if($query) {
}
else
{
	echo "can't "; 
}

echo '<meta http-equiv="refresh" content="0;URL=index.php?page=success" />' ; 
?>