<?php
include('dbconnect.php');
/**
* function for insert feedback
*/
function insertFeedback($feed)
{
	$feed_email = $feed["feed_email"];
	$feed_message = $feed["feed_message"];
	$insert_sql ="INSERT INTO `feedback`(`feed_email`, `feed_message`) VALUES ('$feed_email','$feed_message')";
	$conn = new Dbconnect();
	$db = $conn->dbmsConnect();
	if($db->query($insert_sql))
	{
		echo "<script> alert('Thank you for Feedback !'); </script>";
	}
}

/**
* function for feedback
*/
function getFeedback()
{
	$data = array();
	$feed_sql = "SELECT * FROM feedback";
	$conn = new Dbconnect();
	$db = $conn->dbmsConnect();
	$feed_result = $db->query($feed_sql);
	if($feed_result->num_rows > 0 ) 
	{    
		while($feed = $feed_result->fetch_assoc())
		{
			$data[] = $feed;
 		}
	}
	return $data;
}


/**
* function for delete feedback
*/
function deleteFeed($feed_id)
{
	$delete_feed = "DELETE FROM `feedback` WHERE feed_id='$feed_id'";
	$conn = new Dbconnect();
	$db = $conn->dbmsConnect();
	$delete_result = $db->query($delete_feed);
	if($delete_result)
	{
		echo "<script> confirm('Are you sure to delete ?'); 
		window.location.href='feedbackmanage.php'; </script>";
	}
}


/**
* function for insert booking
*/
function insertBooking(array $book)
{
	$user_id = $_SESSION["user_id"];
 	$user_name = $_POST['user_name'];
 	$user_email = $_POST['user_email'];
 	$person_count = $_POST['person_count'];
 	$bk_event_name = $_SESSION['event_names'];
	$bk_event_price =  ($person_count * $_SESSION['event_prices']);
	$bk_event_date = $_SESSION['event_dates'];
	$event_status = 'pending';

	$insert_book = "INSERT INTO `booking`(`bk_user_id`, `bk_evnt_name`, `bk_user_name`, `bk_user_email`, `bk_user_person`, `bk_evnt_price`, `bk_event_status`, `bk_evnt_date`) VALUES ('$user_id','$bk_event_name ','$user_name','$user_email','$person_count','$bk_event_price','$event_status','$bk_event_date')";
	$conn = new Dbconnect();
	$db = $conn->dbmsConnect();
	$result_booking = $db->query($insert_book);
	if($result_booking)
	{
		echo "<script> alert('Your Booking is Complete..'); 
			window.location.href='mybooking.php'</script>";
	}
	else
	{
		echo "<script>alert('error in booking..');</script>";
	}
}


/**
* function for search events
*/
function getMybooking($userid =null)
{	
	$data = array();
	if(!empty($userid))
	{
		$book_detail_sql = "SELECT * FROM booking  WHERE bk_user_id='$userid' ";
	}
	else{
		$book_detail_sql = "SELECT * FROM booking";
	}
	
	$conn = new Dbconnect();
	$db = $conn->dbmsConnect();
	$event_result = $db->query($book_detail_sql);
	if($event_result->num_rows > 0 ) 
	{    
		while($event = $event_result->fetch_assoc())
		{
			$data[] = $event;
 		}
 		return $data;
	}
	else
	{
		echo "<h2 class='text-center'>You have not made any bookings yet</h2>
		<br><br><br><br><br><br><br><br><br><br>";
		exit();
	}
}


/**
* function for login user
*/
function userLogin($loguser)
{
	$data = array();
	$username = $loguser['user_name'];
	$password = md5($loguser['user_pass']);
	$login_sql = "SELECT * FROM user WHERE (user_name='$username' OR user_email='$username') AND user_pass='$password'";
	$conn = new Dbconnect();
	$db = $conn->dbmsConnect();
	$result = $db->query($login_sql);
	if($result->num_rows == 1 )
	{	
		while ($user = $result->fetch_assoc()) {
			$data['user_id'] = $user['user_id'];
			$data['user_name'] = $user['user_name']; 
		}
		return $data;
	}else{
		echo "<script> alert('Invalid username or password'); </script>";
	}
}

/**
* function for user logout
*/
function userLogout()
{
	unset($_SESSION);
	session_destroy();
	echo "<script> window.location.href='index.php'</script>";
}

/**
* function for user signup
*/
function userSignup($singuser)
{
	$username = $singuser['user_name'];
	$email = $singuser['user_email'];
	$contact = $singuser['user_contact'];
	$address = $singuser['user_address'];
	$password = md5($singuser['user_pass']);
	$confirm  = md5($singuser['confirm_pass']);
	if($password == $confirm ){
		$singup_sql = "INSERT INTO `user`(`user_name`, `user_pass`, `user_email`,`user_contact`,`user_address`) VALUES ('$username','$password ','$email','$contact','$address')";
		$conn = new Dbconnect();
		$db = $conn->dbmsConnect();
		$result = $db->query($singup_sql);
		if($result)
		{
			echo "<script> alert('Registered Successfully'); </script>";
		}
	}
}

/**
* function for get user list
*/
function getUser($userid=null)
{
	$data = array();
	if(! empty($userid))
	{
		$user_sql = "SELECT * FROM user WHERE user_id='$userid'";
	}else
	{
		$user_sql = "SELECT * FROM user";	
	}
	$conn = new Dbconnect();
	$db = $conn->dbmsConnect();
	$user_result = $db->query($user_sql);
	if($user_result->num_rows > 0 ) 
	{    
		while($user = $user_result->fetch_assoc())
		{
			$data[] = $user;
 		}
	}
	return $data;
}

/**
* function for delete user
*/
function deleteUser($userid)
{
	$delete_user = "DELETE FROM `user` WHERE user_id='$userid'";
	$conn = new Dbconnect();
	$db = $conn->dbmsConnect();
	$delete_result = $db->query($delete_user);
	if($delete_result)
	{
		echo "<script> confirm('Are you sure to delete ?'); 
		window.location.href='usermanage.php'</script>";
	}
}

/**
* function for get event list
*/
function getEvent($event_id=null)
{
	$data = array();
	if(! empty($event_id))
	{
		$event_sql = "SELECT e.*, l.* FROM event as e, location as l WHERE (e.event_id='$event_id') AND (e.location_id = l.location_id)";
	}else
	{
		$event_sql = "SELECT * FROM event";	
	}
	$conn = new Dbconnect();
	$db = $conn->dbmsConnect();
	$event_result = $db->query($event_sql);
	if($event_result->num_rows > 0 ) 
	{    
		while($event = $event_result->fetch_assoc())
		{
			$data[] = $event;
 		}
	}
	return $data;
}

/**
* function for search events
*/
function searchEvent($searchkey=null)
{
	$data = array();
	if(! empty($searchkey))
	{
		$event_sql = "SELECT * FROM event WHERE event_name LIKE '%$searchkey%' LIMIT 2";
	}else
	{
		$event_sql = "SELECT * FROM event LIMIT 2";	
	}
	$conn = new Dbconnect();
	$db = $conn->dbmsConnect();
	$event_result = $db->query($event_sql);
	if($event_result->num_rows > 0 ) 
	{    
		while($event = $event_result->fetch_assoc())
		{
			$data[] = $event;
 		}
 		return $data;
	}
	else{
		echo "<h2 class='text-center'>No result Found !.</h2>";
		exit();
	}
}

/**
* function for update event status
*/
function updateEventStatus($status)
{
	$bk_id  =  $status['book_id'];
  	$status =  $status['change_status'];
  	$change_status_sql ="UPDATE `booking` SET `bk_event_status`='$status' WHERE `bk_id`='$bk_id '"; 
  	$conn = new Dbconnect();
	$db = $conn->dbmsConnect();
  	$status_result = $db->query($change_status_sql);
  	if($status_result)
  	{
  		echo "<script> alert('Status Changed Successfully !'); </script>";
  	}
}

/**
* function for delete event
*/
function deleteEvent($eventid)
{
	$delete_event = "DELETE FROM `event` WHERE event_id = '$eventid'";
	$conn = new Dbconnect();
	$db = $conn->dbmsConnect();
	if($db->query($delete_event))
	{
		echo "<script> confirm('Are you sure to delete ?'); 
		window.location.href='eventmanage.php'</script>";

	}
}

/**
* function for add event
*/
function insertEvent($event)
{
	$location_id = $event["event_location"];
	$event_name = $event["event_name"];
	$event_price = $event["event_price"];
	$event_date = $event["event_date"];
	$event_max_person = $event["event_max_person"];
	$event_min_person = $event["event_min_person"];
	$image_name = $_FILES["event_image"]["name"];
	$image_name = uniqid().'_'.$image_name;
	$extension = explode('.', $image_name);
	$fileextn  = end($extension);
	$allowextn = array('jpg','png');
	$uploaderror = false;
	if(! in_array($fileextn, $allowextn))
	{
		echo 'file type not allowed';
		$uploaderror = true;
	}else
	{
		move_uploaded_file($_FILES["event_image"]["tmp_name"], './upload/'.$image_name);
	}
	if(! $uploaderror)
	{
		$insert_sql ="INSERT INTO `event`(`location_id`, `event_name`, `event_image`, `event_price`, `event_date`, `event_max_person`, `event_min_person`) VALUES ('$location_id','$event_name','$image_name','$event_price','$event_date','$event_max_person','$event_min_person')";
		$conn = new Dbconnect();
		$db = $conn->dbmsConnect();
		if($db->query($insert_sql))
		{
			echo "<script> alert('Event Added Successfully !');
			window.location.href='eventmanage.php'</script>";
		}
	}
}

/**
* function for update event
*/
function updateEvent($eventupdate)
{
	$event_name = $eventupdate["event_name"];
	$event_price = $eventupdate["event_price"];
	$event_date = $eventupdate["event_date"];
	$event_max_person = $eventupdate["event_max_person"];
	$event_min_person = $eventupdate["event_min_person"];
	$event_location = $eventupdate["event_location"];
	$update_at = date('Y-m-d H:i:s');
	$image_name = $_FILES["event_image"]["name"];
	$image_name = uniqid().'_'.$image_name;
	$extension = explode('.', $image_name);
	$fileextn  = end($extension);
	$id = $_SESSION['event_id'];
	$allowextn = array('jpg','png');	
	$uploaderror = false;
	if(! in_array($fileextn, $allowextn))
	{
		echo 'file type not allowed';
		$uploaderror = true;
	}else
	{
		move_uploaded_file($_FILES["event_image"]["tmp_name"], './upload/'.$image_name);
	}
	if(! $uploaderror)
	{
		$update_sql ="UPDATE `event` SET `event_name`='$event_name',`event_image`='$image_name',`event_price`='$event_price',`event_date`='$event_date',`event_max_person`='$event_max_person',`event_min_person`='$event_min_person',`event_location`='$event_location',`updated_at`='$update_at' WHERE `event_id`='$id'";
		$conn = new Dbconnect();
		$db = $conn->dbmsConnect();
		if($db->query($update_sql))
		{
			echo "<script> alert('Event Updated Successfully !'); 
			window.location.href='eventmanage.php'</script>";

		}
	}
}

/**
* function for admin login
*/
function adminLogin($adminLogin)
{
	$username = $adminLogin['admin_name'];
	$password = md5($adminLogin['admin_pass']);
	$login_sql = "SELECT * FROM admin WHERE admin_name='$username' AND admin_pass='$password'";
	$conn = new Dbconnect();
	$db = $conn->dbmsConnect();
	$result = $db->query($login_sql);
	if($result->num_rows == 1 )
	{
		$_SESSION['isadmin_login'] = TRUE;
		echo "<script> window.location.href='dashboard.php'</script>";
	}
	else{
		echo "<script> alert('Invalid Username or Password'); </script>";
	}
}

/**
* function for admin logout
*/
function adminLogout()
{
	unset($_SESSION);
	session_destroy();
	echo "<script> window.location.href='index.php'</script>";
}

/**
* function for Insert Location
*/
function insertLocation($Location)
{
	$loc_country = $Location["loc_country"];
	$loc_state = $Location["loc_state"];
	$loc_city = $Location["loc_city"];
	$loc_address = $Location["loc_address"];
	$insert_sql ="INSERT INTO `location`(`country`, `state`, `city`, `address`) VALUES ('$loc_country','$loc_state','$loc_city','$loc_address')";
	$conn = new Dbconnect();
	$db = $conn->dbmsConnect();
	if($db->query($insert_sql))
	{
		echo "<script> alert('Location Added Successfully !');
		window.location.href='locationmanage.php'</script>";
	}
}


/**
* function for get Location list
*/
function getLocation($location_id=null)
{
	$data = array();
	if(! empty($location_id))
	{
		$location_sql = "SELECT * FROM location WHERE location_id='$location_id'";
	}else
	{
		$location_sql = "SELECT * FROM location";	
	}
	$conn = new Dbconnect();
	$db = $conn->dbmsConnect();
	$location_result = $db->query($location_sql);
	if($location_result->num_rows > 0 ) 
	{    
		while($location = $location_result->fetch_assoc())
		{
			$data[] = $location;
 		}
	}
	return $data;
}


/**
* function for delete Location
*/
function deleteLocation($location_id)
{
	$delete_location = "DELETE FROM `location` WHERE location_id='$location_id'";
	$conn = new Dbconnect();
	$db = $conn->dbmsConnect();
	$delete_result = $db->query($delete_location);
	if($delete_result)
	{
		echo "<script> confirm('Are you sure to delete ?'); 
		window.location.href='locationmanage.php'</script>";
	}
}
?>