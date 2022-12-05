<?php 

session_start();

	include("connection.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$email_address = $_POST['email_address'];
		$address = $_POST['address'];

		if(!empty($email_address) && !empty($address) && !is_numeric($email_address))
		{
			$query = "select * from users where email_address = '$email_address' limit 1";
			$result = mysqli_query($con, $query);

			if($result && mysqli_num_rows($result) > 0)
			{

				$users = mysqli_fetch_assoc($result);
				
				if($users['address'] === $address)
				{

					$_SESSION['id'] = $users['id'];
					header("Location: index.php");
					die;
				}
			}
		}else
		{
			echo "Wrong username or address";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login with code</title>
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
		
		<form method="post">
			<div style="font-size: 30px;margin: 10px;color: white;">Login with code</div>
			<p>E-mail</p>
			<input id="text" type="text" name="email_address"><br><br>
			<p>Code</p>
			<input id="text" type="password" name="address"><br><br>
			<div class="g-recaptcha" data-sitekey="6Lf8hDojAAAAAFZDx3RhJ0dgIknDV4i8kG3rul2P"></div><br/>

			<input id="button" type="submit" value="Login"><br><br>
            <a href="signup.php">Signup</a><br>
		</form>
	</div>
</body>
</html>