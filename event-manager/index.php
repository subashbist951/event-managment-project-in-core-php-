<?php
	include('layout/header.php'); 
	include('config/function.php');
	/* ================event data fetch ================= */
	  	$event = getEvent();

	 /* ************** User Logout **************** *********/
	if((isset($_GET['action'])) && ($_GET['action'] == 'user_logout'))
	{
		userLogout();
	} 	
	/* ===========user login ======================= */
	if(($_SERVER["REQUEST_METHOD"] == "POST")  && (isset($_POST['user_login'])))
	{
		$data = userLogin($_POST);
		if(isset($data['user_id']))
		{
			$_SESSION["user_id"] =$data['user_id'];
			$_SESSION["user_name"] =$data['user_name'];
			$_SESSION["isuser_login"] = TRUE;
			echo "<script> alert('login Successfully'); 
			window.location.href='index.php'
			</script>";
		}
		
	}

	/* ===========user singup ======================= */
	if(($_SERVER["REQUEST_METHOD"] == "POST")  && (isset($_POST['user_signup'])))
	{
		userSignup($_POST);
	}
?>
<section>
	<?php require_once('layout/banner.php'); ?>
	<div class="container">
	<div class="row">
		<div class="col-md-12">
			<!-- ******** Popular events start here *********** -->
			<div class="events">
				<h1>Popular Events</h1>
				<a href="search-events.php" class="view-more">View more >> </a>
				<hr>
				<div class="row">
					<?php foreach($event as $event_list) {?>
					<div class="col-md-3 mt10">
						<div class="event-wrap">
							<img src="<?php echo BASE_URL; ?>admin/upload/<?php echo $event_list['event_image']?>" class="img-fluid">
							<h2><?php echo $event_list['event_name']; ?> </h2>
							<p>Price: Rs. <?php echo $event_list['event_price']; ?> </p>
							<a href="event-page.php?action=view_event&event_id=<?php echo $event_list['event_id']; ?>" class="btn btn-warning">View Event</a>
							<a href="book-event.php?action=book_event&event_id=<?php echo $event_list['event_id']; ?>" class="btn btn-warning">Book Event</a>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
			<!-- ******** Popular events ends here *********** -->
		</div>
	</div>	
	</div>
</section>
<?php include('layout/footer.php'); ?>