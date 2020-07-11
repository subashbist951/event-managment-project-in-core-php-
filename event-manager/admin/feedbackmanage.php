<?php 
	  include('../layout/header.php');
	  include('../config/function.php');
	  if( $_SESSION['isadmin_login'] != 1)
	  {
	  	echo "Forbidden Direct Access"."<a href='index.php'>Loing Here..<a/>";
	  	exit();
	  }

	  if(isset($_GET['action']) && $_GET['action'] == 'feed_delete')
	  {
	  	$feed_id = $_GET['feed_id'];
	  	deleteFeed($feed_id);
	  }
	  /* **************** Fetch event Data ================ */
	  	$feed_back = getFeedback();
	  /* **************** Fetch event End ================ */
?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<section class="mt-30">
					<?php include('sidebar.php'); ?>
					<div id="main">
						<span><b>Manage Feedback</b></span>
						<br>
						<br>
						<table class="table">
							<tr>
								<th>Sr. No.</th>
								<th>Email</th>
								<th>Message</th>
								<th>created at</th>
								<th>Action</th>
							</tr>
							<?php foreach($feed_back as $feed) { ?>
							<tr>
								<td><?php echo $feed['feed_id']; ?></td>
								<td><?php echo $feed['feed_email']; ?></td>
								<td><?php echo $feed['feed_message']; ?></td>
								<td><?php echo $feed['feed_created_at']; ?></td>
								<td>
									<a href="<?php echo BASE_URL; ?>admin/feedbackmanage.php?action=feed_delete&feed_id=<?php echo $feed['feed_id']; ?>" class="btn btn-danger">Delete</a>
								</td>
							</tr>
							<?php }  ?>
						</table>
					</div>
				</section>
			</div>
		</div>
	</div>
<?php include('../layout/footer.php'); ?>