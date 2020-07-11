<?php 
	 include('layout/header.php'); 
	 include('config/function.php'); 
	 if(isset($_POST['feed_submit']))
	 {
		insertFeedback($_POST);	
	 }
?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="feedback-form">
					<h1>FeedBack Form</h1>
					<hr>
					<form method="POST" action="<?php echo BASE_URL; ?>feedback.php">
					  <p>We are here to listen you. Please give us your feedback about this event manager -:)</p>	
					  <div class="form-group">
					    <label for="exampleInputEmail1">Email address</label>
					    <input type="email" class="form-control" required="required" name="feed_email" placeholder="Enter your email">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputPassword1">Message</label>
					    <textarea class="form-control" required="required" cols="5" rows="5" name="feed_message" placeholder="Enter your message"></textarea>
					  </div>
					  <button type="submit" name="feed_submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include('layout/footer.php'); ?>