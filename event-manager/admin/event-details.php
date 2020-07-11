<?php 
	  include('../layout/header.php');
	  include('../config/function.php');
	  if( $_SESSION['isadmin_login'] != 1)
	  {
	  	echo "Forbidden Direct Access"."<a href='index.php'>Loing Here..<a/>";
	  	exit();
	  }

	  /* ************ Fetch Event Details ********************* */
	  if(isset($_GET['action']) && $_GET['action'] == 'view_event')
		{
			$event_id = $_GET['event_id'];
			$event = getEvent($event_id);
		}
?>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<section class="mt-30">
					<?php include('sidebar.php'); ?>
					<div id="main" class="event-details-lt">
						<h1>Event Details</h1>
						<hr>
						<?php foreach($event as $event_list) {?>
						<ul>
							<li><b>Event Name:</b> 		<?php	echo $event_list['event_name']; ?></li>
							<li><b>Event Date:</b> 		<?php	echo $event_list['event_date']; ?></li>
							<li><b>Event Price:</b> 	<?php	echo $event_list['event_price']; ?></li>
							<li><b>Maximum Person:</b> 	<?php	echo $event_list['event_max_person']; ?></li>
							<li><b>Minimum Person:</b> 	<?php	echo $event_list['event_min_person']; ?></li>
							<li><b>Created At:</b> 		<?php	echo $event_list['created_at']; ?></li>
							<li><b>Updated At:</b> 		<?php	echo $event_list['updated_at']; ?></li>
							<table>
								<?php 
								$loc_id = $event_list['location_id'];
						   			$location = getLocation($loc_id);
						   			foreach($location as $loc) {
						   		?>
								<tr>
									<td><hr><h3>Location Details:</h3></td>
								</tr>
								<tr>
									<td><b>Country:</b></td>
									<td><?php echo $loc['country']; ?></td>
								</tr>
								<tr>
									<td><b>State:</b></td>
									<td><?php echo $loc['state']; ?></td>
								</tr>
								<tr>
									<td><b>City:</b></td>
									<td><?php echo $loc['city']; ?></td>
								</tr>
								<tr>
									<td><b>Address:</b></td>
									<td><?php echo $loc['address']; ?></td>
								</tr>
								<?php } ?>
							</table>
						</ul>
					</div>
				</section>
			</div>
			<div class="col-md-3">
				<section class="mt-30">
					<div class="event-details-rt">
						<h1>Event Image</h1>
						<hr>
						<img src="<?php echo BASE_URL; ?>admin/upload/<?php echo $event_list['event_image']?>" class="img-fluid">
						<?php } ?>
					</div>
				</section>
			</div>
		</div>
	</div>
<?php include('../layout/footer.php'); ?>