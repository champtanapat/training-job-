
<?php include 'checkSession.php';?>

<style>
th{
	background-color:#563d7c;
	color:#ffffff;
}
table {
	background-color:#f5f5f5;
}

.btn{
	color: white;
}
fomr-me {  border: 0px solid #fff;
    border-radius: 10px;
    padding: 50px 60px;
    margin-top: 20vh;}


</style>
<div class="col-md-12 fomr-me">
<?php 
	function choice($choice_,$search_)
	{

		 if ($choice_ == All) {
            $sqlInsert .= "Where ID ";
            $sqlInsert .= " LIKE '%" . $search_ . "%' ";
            $sqlInsert .= " || Free_Space ";
            $sqlInsert .= " LIKE '%" .$search_. "%' ";
            $sqlInsert .= " || Warranty ";
            $sqlInsert .= " LIKE '%" . $search_. "%' ";
        } else {

            $sqlInsert .= "Where " . $choice_ . "";
            $sqlInsert .= " LIKE '%" .$search_ . "%' ";

        }
        return $sqlInsert; 
	}

?>
<?php
//include 'search.html';
include 'connect.php';

$sqlInsert = "SELECT * FROM harddrive ";
if(isset($_POST['search_']))
{
	$dataSerach = $_POST['search_'];
 	$selectBtnChoose = $_POST['choose'];	
 	$sqlInsert .= choice($selectBtnChoose,$dataSerach); 
}

if (!isset($_POST['searchBtn'])) {   

    
    
	//$sqlInsert .= choice($selectBtnChoose,$dataSerach);  
 if (isset($_POST['btnUpDown_ID'])) {
            $sqlInsert .= " ORDER BY ID " . $_POST['btnUpDown_ID'];
        } else if (isset($_POST['btnUpDown_Free'])) { 
            $sqlInsert .= " ORDER BY Free_Space " . $_POST['btnUpDown_Free'];
        } else if (isset($_POST['btnUpDown_Warranty'])) { 
            $sqlInsert .= " ORDER BY Warranty " . $_POST['btnUpDown_Warranty'];
        }


}


$query = mysql_query($sqlInsert) or die(mysql_error());
$row   = @mysql_num_rows($query);
?>



<div class="row">
	<div class="col-md-12">
		<form  class="form-inline" method="post" name="formInline">
			<a href="?page=insertHDD" class = "form-control btn btn-success "> Add HDD </a>
			<input class="form-control input-md " id="search_" name="search_" type="text" value="<?php echo $dataSerach; ?>" />

			<select class="form-control custom-select" name="choose">
					<option selected >All</option>
				  	<option value="ID">ID</option>
				  	<!-- <option value="detail">Detail</option> -->
				  	<option value="Free_Space">Free_Space</option>
				  	<option value="Warranty">Warranty</option>
			</select>
			<input class=" form-control btn btn-success" name="searchBtn" id="button" type="submit" value="Search">
		<table class="table table-hover bg-light" >


		<?php
			showTableAll();
        ?>



<?php
function showTableAll()
{
    ?>
				<!-- ASC = น้อยไปหามาก
				DESC = มากไปหาน้อย  -->
				<tr>

				<th>
					<input type="submit" name="filter" value="ID" class="btn btn-link">
					<button type="submit" class="btn btn-link" name="btnUpDown_ID" value="DESC" >
	    				<i class="fas fa-caret-up"></i>
					</button>
					<button type="submit" class="btn btn-link" name="btnUpDown_ID"  value="ASC" >
	    				<i class="fas fa-caret-down"></i>
					</button>

				</th>
					<!--
				<th>
					<input type="submit" name="filter" value="Detail" class="btn btn-link">
					<button type="submit" class="btn btn-link" name="btnUpDown_Detail" value="DESC" >
	    				<i class="fas fa-caret-up"></i>
					</button>
					<button type="submit" class="btn btn-link" name="btnUpDown_Detail"  value="ASC" >
	    				<i class="fas fa-caret-down"></i>
					</button>
				</th>
					-->
				<th>
					<input type="submit" name="filter" value="Free_Space " class="btn btn-link">
					<button type="submit" class="btn btn-link" name="btnUpDown_Free" value="DESC" >
	    				<i class="fas fa-caret-up"></i>
					</button>
					<button type="submit" class="btn btn-link" name="btnUpDown_Free"  value="ASC" >
	    				<i class="fas fa-caret-down"></i>
					</button>
				</th>

				<th>
					<input type="submit" name="filter" value="Warranty" class="btn btn-link">
					<button type="submit" class="btn btn-link" name="btnUpDown_Warranty" value="DESC" >
	    				<i class="fas fa-caret-up"></i>
					</button>
					<button type="submit" class="btn btn-link" name="btnUpDown_Warranty" value="ASC" >
	    				<i class="fas fa-caret-down"></i>
					</button>
				</th>

			</div>

				<th><input type="button" name="filter" value="Action" class="btn btn-link"> </th>
			<?php
}?>

			<!-- End function showTableAll() -->

	</form>

			<!--Start function formAction() -->

			<?php
function formAction($IDS)
{
    ?>
					<form method="post" action="?page=update" >
					<input type="hidden" name="IDS" value="<?php echo $IDS; ?>">
					<input class="btn btn-success " type="submit" name="ACT_" value="Update" >
			        <input class="btn btn-success " type="submit" name="ACT_" value="Delete">
					</form>
				<?php
}?>

			<!-- End function formAction() -->

<?php
if ($row > 0) {

    while ($rs = mysql_fetch_array($query)) {
        ?> 
        <tr>
        	<td><?php echo $rs["ID"] ?></td>
			<!-- <td><?php //echo $rs["Detail"] ?></td> -->
			<td><?php echo $rs["Free_Space"]*1024; echo " GB"; ?></td>
			<td><?php echo $rs["Warranty"] ?> </td>
			<td> <?php formAction($rs["ID"]);?></td>
			<?php }?> 
		</tr>
			</td>

		</tr>

		<?php
} else {
    ?>
    	<tr>
			<td colspan="5" align="center"><h1>Data Not Found</h1></td>
		</tr>
    <?php
}

?>
		<!-- Have -->


		<!-- Have not-->

		</table>

	</div>
</div>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">

</div>