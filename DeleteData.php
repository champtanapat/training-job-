
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
include 'checkSession.php';
include 'connect.php';

 $id = $_POST['IDS'];


 $delete =  "DELETE FROM `harddrive` WHERE `ID` ='$id' ";
 $sql = mysql_query($delete);

 if ($sql) {
                    //echo 'delete Complete';
                    echo '<SCRIPT LANGUAGE="javascript">Nfind()</SCRIPT>';
                } else {
                    //echo 'Cant delete Data';
                    echo '<SCRIPT LANGUAGE="javascript">Error()</SCRIPT>';
                }


?>