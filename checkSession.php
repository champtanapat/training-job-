<?php
@session_start();
if (isset($_SESSION['checkLogin'])) {

    if (!$_SESSION['checkLogin']) {

        echo '<meta http-equiv="refresh" content="0;url=?page=login" />';
    }
}
else
{
	echo '<meta http-equiv="refresh" content="0;url=?page=login" />' ; 
}
