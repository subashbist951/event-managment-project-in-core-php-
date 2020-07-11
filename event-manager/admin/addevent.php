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
	if(isset($_POST['add_event']))
	{
		insertEvent($_POST);
	}
?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<section class="mt-30">
					<?php include('sidebar.php'); ?>
					<div id="main" class="add-event">
						<h1>Add Event</h1>
						<hr>
						<form method="POST" action="addevent.php" enctype="multipart/form-data">
						  <div class="form-group">
						    <label for="exampleInputEmail1">Event Name</label>
						    <input type="text" class="form-control" name="event_name" placeholder="Enter your name">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Event Price</label>
						    <input type="text" class="form-control" name="event_price" placeholder="Enter your price">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Event date</label>
						    <input type="date" class="form-control" name="event_date" placeholder="Enter event date ">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Maximum Person</label>
						    <input type="text" class="form-control" name="event_max_person" placeholder="Enter max person">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Minimum Person</label>
						    <input type="text" class="form-control" name="event_min_person" placeholder="Enter min person">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Event Location</label>
						   	<select name="event_location" class="form-control">
						   		<?php 
						   			$location = getLocation();
						   			foreach($location as $loc) {
						   		?>
						   		<option value="<?php echo $loc['location_id']?>"><?php echo $loc['address']?></option>
						   		<?php } ?>
						   	</select>
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Upload Image</label>
						    <input type="file" name="event_image" class="form-control">
						  </div>
						  <button type="submit" name="add_event" class="btn btn-warning">Add Event</button>
						</form>
					</div>
				</section>
			</div>
		</div>
	</div>
</section>
<?php include('../layout/footer.php'); ?>