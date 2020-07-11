<?php 	
	include('layout/header.php');
		include('config/function.php');
		if(isset($_POST['searchkey']))
	{
		$searchkey = $_POST['searchkey'];
		$search_result = searchEvent($searchkey);
	}else
	{
		$search_result = searchEvent();
	}
?>
<?php  ?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Events</h1>
				<hr>
				<div class="row">
					<?php foreach($search_result as $searchEvent) { ?>
					<div class="col-md-3 mt10">
						<div class="event-wrap">
							<img src="<?php echo BASE_URL; ?>admin/upload/<?php echo $searchEvent['event_image']?>" class="img-fluid">
							<h2><?php echo $searchEvent['event_name']; ?> </h2>
							<p>Price: Rs. <?php echo $searchEvent['event_price']; ?> </p>
							<a href="event-page.php?action=view_event&event_id=<?php echo $searchEvent['event_id']; ?>" class="btn btn-warning">View Event</a>
							<a href="book-event.php?action=book_event&event_id=<?php echo $searchEvent['event_id']; ?>" class="btn btn-warning">Book Event</a>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>

		</div>
	</div>
</section>
<?php include('layout/footer.php'); ?>