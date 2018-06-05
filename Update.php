<script language="Javascript" >
function Nfind(){
    alert("Comlete");
   window.location.assign("index.php");
}
function find(){
    alert("Comlete")
    window.location.assign("index.php")
}
function checkInvalid(){
    alert('Invalid Drive!!');
window.location.assign("index.php");
}
function Error(x){
if(x === 1){
    alert("Not fond device");
    }
    else if(x === 2 ){
          alert("Cant Insert");
    }
    window.location.assign("index.php");
}
function check(){
    alert("Directory is emty");
    window.location.assign("index.php");
}
</script>

<?php 
function dirToArray($dir) { 
    
   $result = array(); 

   $cdir = scandir($dir); 
   foreach ($cdir as $key => $value) 
   { 
      if (!in_array($value,array(".",".."))) 
      { 
         if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) 
         { 
            $result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value); 
         } 
         else 
         { 
            $result[] = $value; 
         } 
      } 
   } 
   
   return $result; 
}
?> 


<?php 

if (isset($_POST['direct']) && $_POST['direct'] != ""){
//Check Device
    $direct1 = $_POST["direct"];
    $direct1 = strtoupper($direct1);
    $direct1 = $direct1 . ":";
    $Dtemp = $direct1;

    
    $cmd     = shell_exec("wmic LogicalDisk where(drivetype = 2) get name");
    $temp = strpos($cmd, $direct1);
 if ($temp == 0) {
        echo "<script type=\"text/javascript\">checkInvalid() </script>";
    }
    else{
include 'config.php';
        //Check Serial
        $drives = shell_exec('wmic diskdrive get PNPDeviceID');
        if (!preg_match('/\\\([\s\w_]{8,})&/', $drives, $matches)) {
            echo '<SCRIPT LANGUAGE="javascript">Error(1)</SCRIPT>';
            //exit("Not fond device");
        }
else{
list($match, $serial) = $matches;
$sqlInsert = "SELECT ID FROM harddrive WHERE ID = '$serial'"; 
            $result = mysql_db_query("climatechange",$sqlInsert) or die(mysql_error()); 
if (mysql_num_rows($result) != 0){
//Get Space
                //total space
                $Tspace = disk_total_space($Dtemp) / 1099511627776;
                //free space
                $Fspace = disk_free_space($Dtemp) / 1099511627776;
                $result = dirToArray($Dtemp);
                //$result = json_encode(dirToArray($Dtemp));
               $result = json_encode($result);
               
               
//Update data
                //$update = "UPDATE `harddrive` SET  `Detail` = '$array', `Total_Space`='$Tspace',`Free_Space`='$Fspace',`Update_Time` = NOW() WHERE ID = '$serial'";
                $update = "UPDATE `harddrive` SET  `Detail` = '$result' WHERE ID = '$serial'";
                echo $update;
                $query = mysql_query($update);
                
                if($query) {
                    //echo 'Insert Complete';
                    //echo '<SCRIPT LANGUAGE="javascript">Nfind()</SCRIPT>';
                } else {
                    //echo 'Cant Insert Data';
                    //echo '<SCRIPT LANGUAGE="javascript">Error(2)</SCRIPT>';
                }
                mysql_close();

            }

}

    }
}
else {
    echo '<SCRIPT LANGUAGE="javascript">check()</SCRIPT>';
}
?>

