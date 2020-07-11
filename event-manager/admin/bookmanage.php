<?php 
	  include('../layout/header.php');
	  include('../config/function.php');
	  if( $_SESSION['isadmin_login'] != 1)
	  {
	  	echo "Forbidden Direct Access"."<a href='index.php'>Loing Here..<a/>";
	  	exit();
	  }

	  /* ********************Booked Status ***********************/
	  if(isset($_POST['update_status']))
	  {
	  		updateEventStatus($_POST);
	  }
	   /*************** Fetch event Data ***********************/
		$book_detail = getMybooking();

?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<section class="mt-30">
					<?php include('sidebar.php'); ?>
					<div id="main">
						<span><b>Manage Booking</b></span>
						<br>
						<br>
						<table class="table">
							<tr>
								<th>Sr. No.</th>
								<th>Person Email</th>
								<th>Event Name</th>
								<th>Total Person</th>
								<th>Total Price</th>
								<th>Event Status</th>
								<th colspan="2" class="text-center">Change Status</th>
							</tr>
							<?php $i=1; foreach($book_detail as $booking) { ?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $booking['bk_user_email']; ?></td>
								<td><?php echo $booking['bk_evnt_name']; ?></td>
								<td><?php echo $booking['bk_user_person']; ?></td>
								<td><?php echo $booking['bk_evnt_price']; ?></td>
								<td><?php echo $booking['bk_event_status']; ?></td>
								<td>
									<form method="POST" action="<?php echo BASE_URL; ?>admin/bookmanage.php">
										<select name="change_status" class="form-control">
											<option value="Approved">Approved</option>
											<option value="Rejected">Rejected</option>
											<option value="Deleted">Deleted</option>
										</select>
										<input type="hidden" name="book_id" value="<?php echo $booking['bk_id']; ?>" >
										<br>
										<input type="submit" class="btn btn-info" name="update_status" value="Update">
									</form>
								</td>
							</tr>
							<?php $i++; }  ?>
						</table>
					</div>
				</section>
			</div>
		</div>
	</div>
<?php include('../layout/footer.php'); ?>