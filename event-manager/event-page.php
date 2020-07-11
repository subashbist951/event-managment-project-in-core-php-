<?php 
 include('layout/header.php'); 
 include('config/function.php'); 
 	if(isset($_GET['action']) && $_GET['action'] == 'view_event')
		{
			$event_id = $_GET['event_id'];
			$event = getEvent($event_id);
		}
?>
<section>
	<div class="container">																							
		<div class="row">
			<div class="col-md-12">
				<h1>Event Name</h1>
				<hr>
				<div class="row">
					<div class="col-md-6">
						<div class="event-lt-page">
						<?php foreach($event as $eventlist) { ?>
							<img src="<?php echo BASE_URL; ?>admin/upload/<?php echo $eventlist['event_image']; ?>" width="500px" height="333px">
							<a href="book-event.php?action=book_event&event_id=<?php echo $eventlist['event_id']; ?>" class="btn btn-warning">Book Event</a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="event-rt-page">
							<h2>Event Description</h2>
							<table>
								<tr>
									<td><b>Event Name :</b></td>
									<td><?php echo $eventlist['event_name']; ?></td>
								</tr>
								<tr>
									<td><b>Event Price :</b></td>
									<td><?php echo 'Rs.'. $eventlist['event_price']; ?></td>
								</tr>
								<tr>
									<td><b>Maximum Person :</b></td>
									<td><?php echo $eventlist['event_max_person']; ?></td>
								</tr>
								<tr>
									<td><b>Minimum Person :</b></td>
									<td><?php echo $eventlist['event_min_person']; ?></td>
								</tr>
								<tr>
									<td><b>Event Date and Time :</b></td>
									<td><?php echo $eventlist['event_date']; ?></td>
								</tr>
								<tr>
									<td><hr><h3>Location Details:</h3></td>
								</tr>
								<tr>
									<td><b>Country:</b></td>
									<td><?php echo $eventlist['country']; ?></td>
								</tr>
								<tr>
									<td><b>State:</b></td>
									<td><?php echo $eventlist['state']; ?></td>
								</tr>
								<tr>
									<td><b>City:</b></td>
									<td><?php echo $eventlist['city']; ?></td>
								</tr>
								<tr>
									<td><b>Address:</b></td>
									<td><?php echo $eventlist['address']; ?></td>
								</tr>
							</table>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include('layout/footer.php'); ?>