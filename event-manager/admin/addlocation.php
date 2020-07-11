<?php 
	  include('../layout/header.php');
	  include('../config/function.php');
	  if($_SESSION['isadmin_login'] != 1)
	  {
	  	echo "Forbidden Direct Access"."<a href='index.php'>Loing Here..<a/>";
	  	exit();
	  }
?>

<?php 
	if(isset($_POST['add_location']))
	{
		insertLocation($_POST);
	}
?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<section class="mt-30">
					<?php include('sidebar.php'); ?>
					<div id="main" class="add-event">
						<h1>Add Location</h1>
						<hr>
						<form method="POST" action="addlocation.php">
						  <div class="form-group">
						    <label for="exampleInputEmail1">Country</label>
						    <input type="text" class="form-control" name="loc_country" placeholder="Enter Country">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">State</label>
						    <input type="text" class="form-control" name="loc_state" placeholder="Enter State">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">City</label>
						    <input type="text" class="form-control" name="loc_city" placeholder="Enter City ">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Address</label>
						    <input type="text" class="form-control" name="loc_address" placeholder="Enter Address">
						  </div>
						  <button type="submit" name="add_location" class="btn btn-warning">Add Location</button>
						</form>
					</div>
				</section>
			</div>
		</div>
	</div>
</section>
<?php include('../layout/footer.php'); ?>