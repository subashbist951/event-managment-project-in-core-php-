	<footer class="bg-dark">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					 <h1>Event Manager</h1>
					 <p>Best Place To Find Popular Events</p>
				</div>
				<div class="col-md-4">
					 <ul>
					 	<li><a href="aboutus.php">About Us</a></li>
					 	<li><a href="#">Contact Us</a></li>
					 	<li><a href="index.php">Home</a></li>
					 </ul>
				</div>
				<div class="col-md-4">
					 <ul>
					 	<li><a href="#">Term and Conditions</a></li>
					 	<li><a href="#">Privacy Policy</a></li>
					 	<li><a href="#">Feedback</a></li>
					 </ul>
				</div>
			</div>	
		</div>	
	</footer>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
	<script>
		function closeNav()
		{
			document.getElementById('mysidenav').style.width="0px";
			 document.getElementById("main").style.marginLeft = "0px";
			 document.body.style.backgroundColor = "white";
		}

		function openNav()
		{
			document.getElementById('mysidenav').style.width="250px";
			document.getElementById("main").style.marginLeft = "150px";
			document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
		}
	</script>
</body>
</html>