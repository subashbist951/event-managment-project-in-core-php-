<?php 
	  include('../layout/header.php');
	  include('../config/function.php');
	  if( $_SESSION['isadmin_login'] != 1)
	  {
	  	echo "Forbidden Direct Access"."<a href='index.php'>Loing Here..<a/>";
	  	exit();
	  }
	  /***************** Total Booking ***********************/
	  $booking = getMybooking();
	  $total_booking = count($booking);
	  /***************** Total Users ***********************/
	  $user = getUser();
	  $total_user = count($user);
	  /***************** Total Feedback ***********************/
	  $feed = getFeedback();
	  $total_feed = count($feed);
	  /***************** Total Event ***********************/
	  $event = getEvent();
	  $total_event = count($event);
?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<section class="mt-30">
					<?php include('sidebar.php'); ?>
					<div id="main">
						<h1>Welcome to admin Dashboard !</h1>
						<p>
							Manage Event Manager Data From Here......
						</p>
						<div class="row">
							<div class="col-md-12">
								 <div class="dash-event">
									<h1>Total event <br> <?php echo $total_event; ?></h1>
								</div>
							</div>
							<div class="col-md-4">
								 <div class="dash-main">
									<h1>Total Booking <br> <?php echo $total_booking; ?></h1>
								</div>
							</div>
							<div class="col-md-4">
								 <div class="dash-main">
									<h1>Total Reg. Users <br> <?php echo $total_user; ?></h1>
								</div>
							</div>
							<div class="col-md-4">
								 <div class="dash-main">
									<h1>Total Feedback <br> <?php echo $total_feed; ?></h1>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</div>
<?php include('../layout/footer.php'); ?>