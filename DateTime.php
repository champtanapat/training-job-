<script language="Javascript" >

function Nfind(){
    alert("Complete");
   window.location.assign("index.php");
}
function Error(){

    alert("Error");
 
    window.location.assign("index.php");
}
</script>

<?php
$date = $_POST['datepicker'] ;
$id = $_POST['serial'];
include 'connect.php';

$date = @str_replace('/', '-', $date);
$date = @date("Y/m/d", @strtotime($date));
$update = "UPDATE `harddrive` SET `Warranty`='$date' , Update_Time = NOW() WHERE `ID` = '$id'";
$query = mysql_query($update);

echo '<SCRIPT LANGUAGE="javascript">Nfind()</SCRIPT>';


mysql_close();
?>

