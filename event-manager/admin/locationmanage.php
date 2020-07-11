<?php  
	  include('../layout/header.php');
	  include('../config/function.php');
	  if( $_SESSION['isadmin_login'] != 1)
	  {
	  	echo "Forbidden Direct Access"."<a href='index.php'>Loing Here..<a/>";
	  	exit();
	  }

	  if(isset($_GET['action']) && $_GET['action'] == 'delete_location' )
	  {
	  	$location_id = $_GET['location_id'];
	  	deleteLocation($location_id);
	  }

	  /* **************** Fetch event Data ================ */
	  	$location = getLocation();
	  /* **************** Fetch event End ================ */
?>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<section class="mt-30">
					<?php include('sidebar.php'); ?>
					<div id="main" >
						<span><b>Manage Location</b><a href="addlocation.php" class="btn btn-warning float-right">Add Location</a></span>
						<div class="clearfix"></div>
						<br>
						<table class="table">
							<tr>
								<th>Sr. No.</th>
								<th>Country</th>
								<th>State</th>
								<th>City</th>
								<th>Address</th>
								<th>Created_At</th>
								<th>Action</th>
							</tr>
							<?php foreach($location as $location_list) {?>
							<tr>
								<td><?php echo $location_list['location_id']; ?></td>
								<td><?php echo $location_list['country']; ?></td>
								<td><?php echo $location_list['state']; ?></td>
								<td><?php echo $location_list['city']; ?></td>
								<td><?php echo $location_list['address']; ?></td>
								<td><?php echo $location_list['created_at']; ?></td>
								<td>
									<a href="<?php echo BASE_URL; ?>admin/locationmanage.php?action=delete_location&location_id=<?php echo $location_list['location_id'];?>" class="btn btn-danger">Delete</a>
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