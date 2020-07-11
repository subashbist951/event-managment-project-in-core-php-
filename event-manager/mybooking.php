<?php
 include('layout/header.php');
 include('config/function.php');
 if( $_SESSION['isuser_login'] != 1)
  {
  	echo "<br><br><br>
  		<h1>Forbidden Access!</h1>
  		".' <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal"><i class="fa fa-sign-in"></i> Login</a>'."<br><br><br><br><br><br><br><br><br><br>";
  	include('layout/footer.php');
  	exit();
  }
  
 /*************** Fetch event Data ***********************/
 	$user_id = $_SESSION["user_id"];
	$my_book = getMybooking($user_id);
 ?>
<section>
	<div class="container">																							
		<div class="row">
			<div class="col-md-12">
				<h2>My Booking Details</h2>
				<br>
				<div class="row">
					<div class="col-md-12">
						<div class="event-rt-book">
							<table class="table">
								<tr>
									<th>Sr. No.</th>
									<th>Event Name</th>
									<th>Booked Email </th>
									<th>Total Person </th>
									<th>Total Price </th>
									<th>Event Date </th>
									<th>Booking Status </th>
									<th>Booking Date </th>
								</tr>
								<?php $i=1; foreach($my_book as $book) { ?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $book['bk_evnt_name']; ?></td>
									<td><?php echo $book['bk_user_email']; ?></td>
									<td><?php echo $book['bk_user_person']; ?></td>
									<td><?php echo $book['bk_evnt_price']; ?></td>
									<td><?php echo $book['bk_evnt_date']; ?></td>
									<td><?php echo $book['bk_event_status']; ?></td>
									<td><?php echo $book['created_at']; ?></td>
								</tr>
								<?php $i++; } ?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include('layout/footer.php'); ?>