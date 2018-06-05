
<script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<div class="row">
    <div class="col">
        
        <?php include 'connect.php'; 
        $id = $_POST['IDS']; 
        echo "Serial:".$id;
        
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
        <div class="jumbotron">
            <!--Detail-->
            <?php echo "Total space".$total."<br>";
             echo "Free space".$free."<br>";
              echo "Detail".$detail."<br>";
             
            ?>
            <form class="form-conatiner_register"  action="?page=changeData" method="post"> 
            <input type ="submit" value = "Change" onclick=""/>
            </form>
        </div>
        <?php   
        $select = "SELECT DATE_FORMAT(`Warranty`, '%Y-%M-%d') FROM `harddrive` WHERE ID = '".$id."'"; 
        $sql = mysql_query($select);
        $sql = mysql_fetch_array($sql); 
        if(!$sql[0] == NULL) {
           echo  "Warranty : " ;
           echo $sql[0];
        }
        else{
            
            echo "<form method='post' action='DateTime.php'>";
            echo  "Waranty :"."<input type='text' class='form-control' name='datepicker' id='datepicker' />";
            echo "<input type='hidden'  name='serial' id='serial' value= '".$id."' />";
            echo "<input type='submit' value='Confirm'/></form>";

        }
        ?>
            <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });  </script> 
        
        <?php
        echo "Error :";
        echo "Update_Time".$Uptime;;

        ?>
        <?php
        //Borrower 
        echo "Borrow date :".$LoanD."<br>";
        echo "Borrower name :".$LoanN."<br>";


        ?>
        <form  action="Borrower.php" method="post"> 
        <input type ="submit" value = "Change Borrower"  />


    </form>
    </div>  
    
</div>

