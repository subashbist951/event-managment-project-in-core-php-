<?php  
	  include('../layout/header.php');
	  include('../config/function.php');
	  if( $_SESSION['isadmin_login'] != 1)
	  {
	  	echo "Forbidden Direct Access"."<a href='index.php'>Loing Here..<a/>";
	  	exit();
	  }

	  if(isset($_GET['action']) && $_GET['action'] == 'delete_event' )
	  {
	  	$event_id = $_GET['evnt_id'];
	  	deleteEvent($event_id);
	  }

	  /* **************** Fetch event Data ================ */
	  	$event = getEvent();
	  /* **************** Fetch event End ================ */
?>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<section class="mt-30">
					<?php include('sidebar.php'); ?>
					<div id="main" >
						<span><b>Manage Event</b><a href="addevent.php" class="btn btn-warning float-right">Add Event</a></span>
						<div class="clearfix"></div>
						<br>
						<table class="table">
							<tr>
								<th>Sr. No.</th>
								<th>Event Name</th>
								<th>Event Image</th>
								<th>Event Price</th>
								<th colspan="3" class="text-center">Action</th>
							</tr>
							<?php foreach($event as $event_list) {?>
							<tr>
								<td><?php echo $event_list['event_id']; ?></td>
								<td><?php echo $event_list['event_name']; ?></td>
								<td><img src="<?php echo BASE_URL; ?>admin/upload/<?php echo $event_list['event_image']?>" width="100px"></td>
								<td><?php echo $event_list['event_price']; ?></td>
								<td>
									<a href="event-details.php?action=view_event&event_id=<?php echo $event_list['event_id']; ?>" class="btn btn-warning">View</a>
								</td>
								<td>
									<a href="updateevent.php?action=update_event&evnt_id=<?php echo $event_list['event_id'];?>" class="btn btn-info">Update</a>
								</td>
								<td>
									<a href="<?php echo BASE_URL; ?>admin/eventmanage.php?action=delete_event&evnt_id=<?php echo $event_list['event_id'];?>" class="btn btn-danger">Delete</a>
								</td>
							</tr>
							<?php } ?>
						</table>
					</div>
				</section>
			</div>
		</div>
	</div>
<?php include('../layout/footer.php'); ?>