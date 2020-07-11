<?php 
	  include('../layout/header.php');
	  include('../config/function.php');
	  if( $_SESSION['isadmin_login'] != 1)
	  {
	  	echo "Forbidden Direct Access"."<a href='index.php'>Loing Here..<a/>";
	  	exit();
	  }
	  /* ************ Fetch Event Details ********************* */
	  if(isset($_GET['action']) && $_GET['action'] == 'update_event')
		{
			$event_id = $_GET['evnt_id'];	
			$_SESSION['event_id'] = $event_id;
			$event = getEvent($event_id);
			
		}
?>
<?php 
	if(isset($_POST['update_event']))
	{
		updateEvent($_POST);
	}
?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<section class="mt-30">
					<?php include('sidebar.php'); ?>
					<div id="main" class="add-event">
						<h1>Update Event</h1>
						<hr>
						<?php foreach($event as $update) { ?>
						<form method="POST" action="updateevent.php" enctype="multipart/form-data">
						  <div class="form-group">
						    <label for="exampleInputEmail1">Event Name</label>
						    <input type="text" class="form-control" name="event_name" require="require" placeholder="Enter your name" value="<?php	echo $update['event_name']; ?>">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Event Price</label>
						    <input type="text" class="form-control" name="event_price" require="require" placeholder="Enter your price" value="<?php echo $update['event_price']; ?>">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Event date</label>
						    <input type="date" class="form-control" name="event_date" require="require" placeholder="Enter event date " value="<?php echo $update['event_date']; ?>">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Maximum Person</label>
						    <input type="text" class="form-control" name="event_max_person" require="require" placeholder="Enter max person" value="<?php echo $update['event_max_person']; ?>">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Minimum Person</label>
						    <input type="text" class="form-control" name="event_min_person" require="require" placeholder="Enter min person" value="<?php echo $update['event_min_person']; ?>">
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
						    <input type="file" name="event_image" require="require" class="form-control">
						  </div>
						  <button type="submit" name="update_event" class="btn btn-warning">Add Event</button>
						</form>
					</div>
				</section>
			</div>
			<div class="col-md-3">
				<section class="mt-30">
					<div class="event-details-rt">
						<h1>Event Image</h1>
						<hr>
						<img src="<?php echo BASE_URL; ?>admin/upload/<?php echo $update['event_image']; ?>" class="img-fluid">
						<p>Previous Image of Event</p>
					</div>
					<?php } ?>
				</section>
			</div>
		</div>
	</div>
</section>
<?php include('../layout/footer.php'); ?>