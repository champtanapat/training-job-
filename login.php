<?php
session_start(); 
if (isset($_POST['login_'])) {
    include 'connect.php';
    $_SESSION['checkLogin'] = false;

    $username = $_POST['username_'];
    $password = $_POST['password_'];

    $sql_username    = "SELECT username_member FROM member where username_member='" . $username . "'";
    $result_username = mysql_db_query("climatechange", $sql_username) or die($sql_username);

    $sql_password    = "SELECT username_member FROM member where password_member ='" . $password . "'";
    $result_password = mysql_db_query("climatechange", $sql_password) or die($sql_password);

    if (mysql_num_rows($result_username) > 0 && mysql_num_rows($result_password)) {
        
    	$_SESSION['checkLogin'] = true; 


    } 

    mysql_close();
    
}

echo '<META HTTP-EQUIV="Refresh" CONTENT="0;URL=index.php?page=home" />'; 

?>



