<?php
session_start();
define("BASE_URL", "http://localhost/projects/event-manager/"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Event Manager</title>
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>assets/css/custom.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="container-fluid pd-0">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		  <a class="navbar-brand" href="<?php echo BASE_URL; ?>index.php ">Event Manager</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="<?php echo BASE_URL ?>index.php">Home</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" data-toggle="collapse" data-target="#search-event">Search Events</a>
		        <div class="search-event collapse" id="search-event">
		        	<form method="POST" action="search-events.php" class="row">
		        		<input type="text" class="form-control" name="searchkey" placeholder="search event here...">
		        		<button class="btn btn-warning"><i class="fa fa-search"></i></button>
		        	</form>
		        </div>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="<?php echo BASE_URL ?>search-events.php">All Events</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="<?php echo BASE_URL ?>feedback.php">Feedback</a>
		      </li>
		       <li class="nav-item">
		        <a class="nav-link" href="<?php echo BASE_URL ?>aboutus.php">About Us</a>
		      </li>
		    </ul>
		    <?php if(isset($_SESSION["isuser_login"])) {?>
		    <ul class="navbar-nav">	
			  <li class="nav-item">
		        <a  class="nav-link" ><i class="fa fa-user"></i> <?php if(isset($_SESSION["user_name"])){ echo 'Welcome !'.' '.$_SESSION["user_name"]; }?></a>
		      </li>
			  <li class="nav-item">
		        <a class="nav-link" href="mybooking.php"><i class="fa fa-book"></i> Mybooking</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="index.php?action=user_logout" ><i class="fa fa-user-times"></i> logout</a>
		      </li>
		    </ul>
			<?php } else { ?>
			<ul class="navbar-nav">
		      <li class="nav-item">
		        <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal"><i class="fa fa-sign-in"></i> Login</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#" data-toggle="modal" data-target="#signupModal"><i class="fa fa-user-plus"></i> Singup</a>
		      </li>
		    </ul>
		    <?php } ?>	
		  </div>
		</nav>
		<!-- ********** Login Modal Start********************* -->
		<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Login Form</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form method="POST" action="<?php echo BASE_URL; ?>index.php">
				  <div class="form-group">
				    <label for="exampleInputEmail1">Email address</label>
				    <input type="text" class="form-control" name="user_name" placeholder="Enter email">
				  </div>
				  <div class="form-group">
				    <label for="exampleInputPassword1">Password</label>
				    <input type="password" class="form-control" name="user_pass" placeholder="Password">
				  </div>
				  <button type="submit" name="user_login" class="btn btn-primary"><i class="fa fa-sign-in"></i> Login</button>
				</form>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- ********** Login Modal End ********************* -->
		<!-- ********** Signup Modal Start********************* -->
		<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Signup Form</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <form method="POST" action="<?php echo BASE_URL; ?>index.php">
				   <div class="form-group">
				    <label>Username</label>
				    <input type="text" class="form-control" name="user_name" placeholder="Enter Name">
				  </div>
				  <div class="form-group">
				    <label>Email address</label>
				    <input type="email" class="form-control" name="user_email" placeholder="Enter email">
				  </div>
				  <div class="form-group">
				    <label>Contact</label>
				    <input type="text" class="form-control" name="user_contact" placeholder="Enter Contact">
				  </div>
				  <div class="form-group">
				    <label>Address</label>
				    <input type="text" class="form-control" name="user_address" placeholder="Enter Address">
				  </div>
				  <div class="form-group">
				    <label>Password</label>
				    <input type="password" class="form-control" name="user_pass" placeholder="Password">
				  </div>
				  <div class="form-group">
				    <label>Confirm Password</label>
				    <input type="password" class="form-control" name="confirm_pass" placeholder="Confirm Password">
				  </div>
				  <button type="submit" name="user_signup" class="btn btn-primary"><i class="fa fa-user-plus"></i> Signup</button>
				</form>
		      </div>
		    </div>
		  </div>
		</div>
		<!-- ********** Signup Modal End ********************* -->
	</div>

