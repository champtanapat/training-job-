<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Login
        </title>
        <meta charset="utf-8"/>
        <link href="style.css" rel="stylesheet" type="text/css">
            <link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" rel="stylesheet">
                <script crossorigin="anonymous" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" src="https://code.jquery.com/jquery-3.2.1.slim.min.js">
                </script>
                <script crossorigin="anonymous" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js">
                </script>
                <script crossorigin="anonymous" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
                </script>


                <script src="http://code.jquery.com/jquery-latest.js"></script>

                <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

                <script> $('.meseage a').click(function() {
                        $('form').animate({height: "toggle",opacity: "toggle"},"slow");});
                </script>

            </link>
        </link>
    </head>
        <div class="container-fluid bg">
          <?php
if (isset($_GET['page'])) {
    $p = $_GET['page'];

} else {
    $p="Home";
}
echo $p;
switch ($p) {
    case 'register':include 'register.html';
        break;
    case 'login':include 'page_login.php';
        break;
    case 'success':include 'success.html';
        break;
    case 'home':include 'home.php';
        break;
    case 'borrower': include 'Borrower.php';
        break; 
    case 'changeData' :include 'ChangeData.php'; 
    break; 
    case 'insertHDD':include 'Insert.php';
        break;
    case 'update':
        if (isset($_POST['ACT_']) && $_POST['ACT_'] == "Update") {
            include 'UpdateData.php';
        } 
        else if (isset($_POST['ACT_']) && $_POST['ACT_'] == "Delete") {
            include 'DeleteData.php';
        } else {
            echo "Page Not Found!!";
        }
        break;
    default:
        include 'home.php';
        break;
}
?>
            <!-- END  col -->
        </div>
        <!-- END row-->
    </body>
</html>
<!-- END container-->
