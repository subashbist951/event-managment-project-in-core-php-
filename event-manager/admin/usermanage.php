<?php 
      include('../layout/header.php');
	  include('../config/function.php');
	  if( $_SESSION['isadmin_login'] != 1)
	  {
	  	echo "Forbidden Direct Access"."<a href='index.php'>Loing Here..<a/>";
	  	exit();
	  }
	  /* ********* Delete user data ************* */
	   if(isset($_GET['action']) && $_GET['action'] == 'delete_user')
	   {	
	   		$user_id = $_GET['userid'];
	   		deleteUser($user_id);
	   }

	   /* **************** Fetch event Data ================ */
	  	$user_list = getUser($userid=null)
	  /* **************** Fetch event End ================ */
?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<section class="mt-30">
					<?php include('sidebar.php'); ?>
					<div id="main">
						<span><b>Manage Users</b></span>
						<br>
						<br>
						<table class="table">
							<tr>
								<th>Sr. No.</th>
								<th>Name</th>
								<th>Email</th>
								<th>Password</th>
								<th>created at</th>
								<th>Action</th>
							</tr>
							<?php foreach($user_list as $user) { ?>
							<tr>
								<td><?php echo $user['user_id']; ?></td>
								<td><?php echo $user['user_name']; ?></td>
								<td><?php echo $user['user_email']; ?></td>
								<td><?php echo $user['user_pass']; ?></td>
								<td><?php echo $user['created_at']; ?></td>
								<td>
									<a href="usermanage.php?action=delete_user&userid=<?php echo $user['user_id']; ?>" class="btn btn-danger">Delete</a>
								</td>
							</tr>
							<?php  } ?>
						</table>
					</div>
				</section>
			</div>
		</div>
	</div>
<?php include('../layout/footer.php'); ?>