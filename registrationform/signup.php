<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$email_address = $_POST['email_address'];
		$password = $_POST['password'];
		$repeated_password = $_POST['repeated_password'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$phone_number = $_POST['phone_number'];
		if($password != $repeated_password){
			echo "Passwords do not match!";
		}
		elseif(!empty($email_address) && !empty($password) && !empty($first_name) && !empty($last_name) && !empty($phone_number))
		{
			$query = "insert into users (email_address,password,first_name,last_name,phone_number) values ('$email_address','$password','$first_name','$last_name','$phone_number')";
			mysqli_query($con, $query);
			header("Location: login.php");
			die;
		}else{
			echo "Please fill out the empty fields!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#password_field{
		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{
		font-family: Arial, Helvetica, sans-serif;
		background-color: grey;
		margin: auto;
		width: 292px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post" name="Form">
			<div style="font-size: 30px;margin: 10px;color: white;">Signup</div>
			<p>First Name:</p>
			<input id="text" type="text" name="first_name" pattern="[A-Za-z]{2,}"><br><br>
			<p>Last Name:</p>
			<input id="text" type="text" name="last_name" pattern="[A-Za-z]{2,}"><br><br>
			<p>E-mail</p>
			<input id="text" type="text" name="email_address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"><br><br>
			<p>Phone number:</p>
			<input id="text" type="text" name="phone_number" placeholder="359 88 888 8888" pattern="359+[0-9]{9}"><br><br>
			<p>Password:</p>
			<input type="password" name="password" pattern=".{6,}" title="Must be at least 6 characters long" id="password_field">
			<br><br><input type="checkbox" onclick="toggle_visibility()">Show Password<br><br>
			<p>Repeat Password:</p>
			<input id="text" type="password" name="repeated_password"><br><br>
			<div class="g-recaptcha" data-sitekey="6Lf8hDojAAAAAFZDx3RhJ0dgIknDV4i8kG3rul2P"></div><br/>
			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Login</a><br><br>
		</form>
	</div>
	<script src ="show_password.js"></script>
</body>
</html>