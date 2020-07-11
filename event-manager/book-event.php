<?php
 include('layout/header.php');
 include('config/function.php');
 if(! $_SESSION['isuser_login'])
  {
  	echo "<br><br><br>
  		<h1>Please Login before made any booking</h1>
  		".' <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal"><i class="fa fa-sign-in"></i> Login</a>'."<br><br><br><br><br><br><br><br><br><br>";
  	include('layout/footer.php');
  	exit();
  }
 /*************** Book Confirm ******************/
 if(isset($_POST['book_confirm']))
 {
 	insertBooking($_POST);
 }

 /*************** Fetch event Data ***********************/
 if(isset($_GET['action']) && $_GET['action'] == 'book_event')
	{
		$event_id = $_GET['event_id'];
		$event_list = getEvent($event_id);
	}
/* ********************* Select User Data **********************/		
 	$user_id = $_SESSION["user_id"];
 	$user_list = getUser($user_id);
 ?>
<section>
	<div class="container">																							
		<div class="row">
			<div class="col-md-12">
				<h1>Book Event</h1>
				<hr>
				<div class="row">
					<div class="col-md-6">
						<div class="event-lt-book">
							<h2>Fill Booking Form</h2>
							<?php foreach($user_list as $user) { ?>
							<form method="POST" action="<?php echo BASE_URL?>book-event.php" >
							  <div class="form-group">
							    <label for="exampleInputEmail1">Email address</label>
							    <input type="email" class="form-control" name="user_email" placeholder="Enter your email" value="<?php echo $user['user_email']; ?>">
							  </div>
							  <div class="form-group">
							    <label for="exampleInputEmail1">Name</label>
							    <input type="text" class="form-control" name="user_name" value="<?php echo $user['user_name']; ?>" placeholder="Enter your name">
							  </div>
							  <div class="form-group">
							    <label for="exampleInputEmail1">No. of Persons</label>
							    <select name="person_count" class="form-control">
							    	<option value="1">1</option>
							    	<option value="2">2</option>
							    	<option value="3">3</option>
							    	<option value="4">4</option>
							    	<option value="5">5</option>
							    	<option value="6">6</option>
							    	<option value="7">7</option>
							    	<option value="8">8</option>
							    	<option value="9">9</option>
							    </select>
							  </div>
							  <button type="submit" name="book_confirm" class="btn btn-dark">confirm Booking</button>
							</form>
							<?php } ?>
						</div>
					</div>
					<div class="col-md-6">
						<div class="event-rt-book">
							<h2>Event Description</h2>
							<?php foreach($event_list as $event) { 
									$_SESSION["event_names"] = $event['event_name'];
									$_SESSION['event_prices'] = $event['event_price'];
									$_SESSION['event_dates'] = $event['event_date'];
							?>
							<table>
								<tr>
									<td colspan="2"><img src="<?php echo BASE_URL; ?>admin/upload/<?php echo $event['event_image']?>" width="350px" height="232"></td>
								</tr>
								<tr>
									<td><b>Event Name :</b></td>
									<td><?php echo $event['event_name']; ?></td>
								</tr>
								<tr>
									<td><b>Event Price :</b></td>
									<td><?php echo $event['event_price']; ?></td>
								</tr>
								<tr>
									<td><b>Maximum Person :</b></td>
									<td><?php echo $event['event_max_person']; ?></td>
								</tr>
								<tr>
									<td><b>Minimum Person :</b></td>
									<td><?php echo $event['event_min_person']; ?></td>
								</tr>
								<tr>
									<td><b>Event Date and Time :</b></td>
									<td><?php echo $event['event_date']; ?><td>
								</tr>
								<tr>
									<td><hr><h3>Location Details:</h3></td>
								</tr>
								<tr>
									<td><b>Country:</b></td>
									<td><?php echo $event['country']; ?></td>
								</tr>
								<tr>
									<td><b>State:</b></td>
									<td><?php echo $event['state']; ?></td>
								</tr>
								<tr>
									<td><b>City:</b></td>
									<td><?php echo $event['city']; ?></td>
								</tr>
								<tr>
									<td><b>Address:</b></td>
									<td><?php echo $event['address']; ?></td>
								</tr>
							</table>
							<?php }  ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include('layout/footer.php'); ?>