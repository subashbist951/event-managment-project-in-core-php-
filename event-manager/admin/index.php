<?php
	include('../layout/header.php');
	include('../config/function.php');
	/* =========== For Logout =================== */
	if((isset($_GET['action'])) && ($_GET['action'] == 'admin_logout'))
	{
		adminLogout();
	}
	/* =========== For Login =================== */
	if(($_SERVER["REQUEST_METHOD"] == "POST")  && (isset($_POST['admin_login'])))
	{
		adminLogin($_POST);
	}
?>
<section>
	<div class="container">
		<div class="rows">
			<div class="col-md-12">
				<div class="admin-login">
					<h1>Admin Login</h1>
					<hr>
					<form method="POST" action="index.php">
					  <div class="form-group">
					    <label for="exampleInputEmail1">username</label>
					    <input type="text" class="form-control" name="admin_name" placeholder="Enter email">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputPassword1">password</label>
					    <input type="password" class="form-control" name="admin_pass" placeholder="Password">
					  </div>
					  <button type="submit" name="admin_login" class="btn btn-primary"><i class="fa fa-sign-in"></i> Login</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<?php include('../layout/footer.php'); ?>