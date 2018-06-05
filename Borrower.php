
<script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.6/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<script language="Javascript" >
function find(){

    window.location.assign("index.php");
    
}

</script>

<div class="row">
    <div class="col">
        Borrower :<input method ="post" type="text" name="borrower"><br>
               
               Borrow date:<input type='text' class='form-control' name='datepicker' id='datepicker' />
                            <input type='submit' value='Confirm'/></form>
    
    </div>
     <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });  </script>
     
     
     <?php 
     $id = $_POST['IDS'];
$date = $_POST['datepicker'] ;
$id = $_POST['serial'];
$borrow = $_POST['borrower'];

include 'connect.php';

$date = str_replace('/', '-', $date);
$date = @date("Y/m/d", @strtotime($date));
$update = "UPDATE `harddrive` SET `Loan_Date`='$date' Loan_Name='$borrow'  WHERE `ID` = '$id'";
$query = mysql_query($update);
mysql_close();

?>
</div>