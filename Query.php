<script language="Javascript" >
function find(){
    alert("ข้อมูลมันมีในระบบแล้วอะเสียใจด้วย \n\
ใส่ Drive ใหม่นะจ๊ะ!!");
    window.location.assign("index.php?page=insertHDD");
    
}
function Nfind(){
    alert("อ่าววว!! นี่มันข้อมูลใหม่ ดูดข้อมูลแปป!!\n\
อยากรู้มั้ยมันมีอะไร");
   window.location.assign("index.php");
}
function Error(x){
if(x === 1){
    alert("เอาข้อมูลมาไม่ได้อะเช็คอีกทีดิ ปัญหาเยอะนะเราอะ!!","Not fond device");
    }
    else if(x === 2 ){
          alert("เอาข้อมูลมาไม่ได้อะเช็คอีกทีดิ ปัญหาเยอะนะเราอะ!!","Cant Insert");
    }
    window.location.assign("index.php?page=insertHDD");
}
function check(){
    alert("Directory is emty");
    window.location.assign("index.php?page=insertHDD");
}
function checkInvalid(){
    alert('Invalid Drive!!');
window.location.assign("index.php?page=insertHDD");
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


<?php //Check Emty


if (isset($_POST['direct']) && $_POST['direct'] != "") {

//Check Device
    $direct1 = $_POST["direct"];
    $direct1 = strtoupper($direct1);
    $direct1 = $direct1 . ":";
    $cmd     = shell_exec("wmic LogicalDisk where(drivetype = 2) get name");
    $direct1 = strpos($cmd, $direct1);
    if ($direct1 == 0) {
        echo "<script type=\"text/javascript\">checkInvalid() </script>";
    } else {
        include 'connect.php';

        //Declare Variable
        $serial; // id
        $Tspace; //total
        $Uspace; //used
        $Fspace; //free
        $war; //warranty
        $Err; // error
        $Uime; // update
        $Ln; //loan name
        $Ld; // loan date

        //Check Serial
        $drives = shell_exec('wmic diskdrive get PNPDeviceID');
        if (!preg_match('/\\\([\s\w_]{8,})&/', $drives, $matches)) {
            echo '<SCRIPT LANGUAGE="javascript">Error(1)</SCRIPT>';
            //exit("Not fond device");
        } else {
            list($match, $serial) = $matches;
            //check serial in DataBase
            $sqlInsert = "SELECT ID FROM harddrive WHERE ID = '$serial'"; 
            $result = mysql_db_query("climatechange",$sqlInsert) or die(mysql_error()); 
            //ehco $result;
           if (mysql_num_rows($result) == 0) {

                $direct1 = $_POST["direct"];
                $direct1 = strtoupper($direct1);
                $direct1 = $direct1 . ":";

                //Get Space
                //total space
                $Tspace = disk_total_space($direct1) / 1099511627776;
                //free space
                $Fspace = disk_free_space($direct1) / 1099511627776;




               
                $array = json_encode(dirToArray($direct1));

                //insert data
                $insert = "INSERT INTO harddrive values('$serial', '$array', '$Tspace', '$Fspace',`Update_Time` = NOW(), '', '', '', '')";
                //echo $insert;
                $insertC = mysql_db_query("climatechange",$insert)  or die("Fail");
                

                if ($insertC) {
                    //echo 'Insert Complete';
                    echo '<SCRIPT LANGUAGE="javascript">Nfind()</SCRIPT>';
                } else {
                    //echo 'Cant Insert Data';
                    echo '<SCRIPT LANGUAGE="javascript">Error(2)</SCRIPT>';
                }
            } 
            else {
                //echo 'ข้อมูลนี้มีในระบบ กรุณาใส่ข้อมูลใหม่';
                echo '<SCRIPT LANGUAGE="javascript">find()</SCRIPT>';
            }

        }
    }
    mysql_close();
} else {
    echo '<SCRIPT LANGUAGE="javascript">check()</SCRIPT>';
}

?>
