
<script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<div class="form-UpdateData"> 

        <?php include 'connect.php'; 
        $id = $_POST['IDS']; 
        //echo "Serial:".$id;
        
        $select = "SELECT * FROM harddrive WHERE ID = '".$id."'"; 
        $sql = mysql_query($select) or die ($select);
        $arr = mysql_fetch_array($sql);
        $total=$arr['Total_Space'];
        $free=$arr['Free_Space'];
        $detail=$arr['Detail'];
        $Uptime = $arr['Update_Time'];
        $LoanD = $arr['Loan_Date'];
        $LoanN = $arr["Loan_Name"];
        ?>

        <?php
        echo "<div class='row justify-content-center'>";
        echo "<div class='col-md-6'> ";  
            echo "<label> Serial </label>";
            echo "<input  class='form-control ' id='lgFormGroupInput' value='$id' readonly='readonly'>";

            echo "<label> Total space </label>";
            echo "<input  class='form-control ' id='lgFormGroupInput' value=' ".($total*1024)." GB' readonly='readonly'>";
            echo "<label> Free space </label>";
            echo "<input  class='form-control ' id='lgFormGroupInput' value=' ".($free*1024) ." GB' readonly='readonly'>";


            echo "<label> Detail </label>";
            echo "<textarea class='form-control' rows='5' readonly='readonly'>".$detail."</textarea>"; 
 
            echo "<br>";
            echo "<form  action='?page=changeData' method='post'> ";
            echo "<button type='submit' class='btn btn-success btn-block'> Update Data </button>";
            echo "</form>";
            echo "<br>";
        echo "</div>";
        echo "</div>";
            // echo "Total space".$total."<br>";
            //echo "Free space".$free."<br>";
            //echo "Detail".$detail."<br>";
         ?>
        
        
        <?php   
        $select = "SELECT DATE_FORMAT(`Warranty`, '%Y-%M-%d') FROM `harddrive` WHERE ID = '".$id."'"; 
        $sql = mysql_query($select);
        $sql = mysql_fetch_array($sql); 
        if(!$sql[0] == NULL) {
           //echo  "Warranty : " ;
           //echo $sql[0];
            echo "<div class='row justify-content-center'>";
            echo "<div class='col-sm-4'>";
            echo "Warranty :";
            echo "<input  class='form-control ' id='lgFormGroupInput' value='$sql[0]' readonly='readonly'>";
            echo "</div>";
            echo "</div>";
           
        }
        else{

            echo "<div class='row justify-content-center'>";
            echo "<div class='col-sm-4'>";
            echo "<form method='post' action='DateTime.php'>";
            echo "Warranty :";
            echo "<input type='text' class='form-control' name='datepicker' id='datepicker'readonly='readonly'/>";
            echo "<button type='submit' class='btn btn-success'>Confirm</button>";
            echo "<input type='hidden'  name='serial' id='serial' value= '".$id."' />";
            //echo "<input type='submit' value='Confirm'/></form>";
            echo "</form>";
            echo "</div>";
            echo "</div>";

        }
        ?>
        <script>
            $('#datepicker').datepicker({
                uiLibrary: 'bootstrap4'
            });  
        </script> 
        
        <?php
        //echo "Error :";
        echo "<div class='row justify-content-center'>";
        echo "<div class='col-sm-4'> ";  
        echo "<label> Update Time</label>";
        echo "<input  class='form-control ' id='lgFormGroupInput' value='$Uptime' readonly='readonly'>";
        echo "</div>"; 
        echo "</div>"; 

        //echo "Update_Time".$Uptime;;

        ?>

        <?php
        //Borrower 
        echo "<div class='row justify-content-center'>";
        echo "<div class='col-sm-4'> ";  
        echo "<label> Borrow date </label>";
        echo "<input  class='form-control ' id='lgFormGroupInput' value='$LoanD' readonly='readonly'>";
        echo "<label> Borrower name </label>";
        echo "<input  class='form-control ' id='lgFormGroupInput' value='$LoanN' readonly='readonly'>";
        echo "<br>";

        echo "<form  method='post' action='?page=borrower'>"; 
        echo "<button type='submit' class='btn btn-success'>Change Borrower</button>"; 
        echo "</form>";
        echo "</div>"; 
        echo "</div>"; 
        ?>
      
</div>