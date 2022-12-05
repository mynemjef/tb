<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$users = check_login($con);

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		if($_POST['password'] == $users['password']){
			if(count($_POST)>0) {
				mysqli_query($con,"UPDATE users set address='" . $_POST['address'] . "' WHERE password='" . $_POST['password'] . "'");
				$message = "Changed Successfully";
			}else
			{
				echo "Please enter valid information!";
			}
		}else{echo "Invalid password";}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
</head>
<body>
	<a href="logout.php">Logout</a>
	<br>
	Hello, <?php echo $users['email_address']; ?> <br>
	Your address: <?php echo $users['address']; ?> <br>
	Your name: <?php echo $users['first_name']; echo " "; echo $users['last_name'];?> <br>
	Your phone number: <?php echo $users['phone_number']; ?>

	<br><br>
	<form method="post">
			<p>New Address:</p>
			<input id="text" type="text" name="address">
			<p>Current Password:</p>
			<input id="text" type="password" name="password"><br><br>
			<input id="button" type="submit" value="Update address">
		</form>
</body>
</html>