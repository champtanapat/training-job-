<?php

include 'connect.php';
//echo "uName:".$_POST['uName']."<br>"; 
if (isset($_POST['uName'])) {
	
    $username = $_POST['uName'];

    $sql    = "SELECT username_member FROM member where username_member='" . $username . "'";
    $result = mysql_query($sql) or die($sql);
    
    if (mysql_num_rows($result) > 0) {
        echo '[{"check":"true"}]';
    } else {
        echo '[{"check":"false"}]';

    }

}
else {
	echo '[{"check":"false"}]'; 
}

?>