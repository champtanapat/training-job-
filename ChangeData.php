<?php include 'checkSession.php';?>
<div class="row">
    <div class="offset-md-4 col-md4 ">
      <form class="form-conatiner" form method="post" action="Update.php" >
     		<div class="form-group" >
     			<h1>Update Data</h1>
          	<h2>Hard Drive</h2>
        		  <label for="Directory">Directory :</label>
              <input class="form-control" name="direct" placeholder="Directory" type="text" required="" />
              <button type="submit" class="btn btn-success" >Detect</button>    
          </div>
      </form>
    </div>
</div>