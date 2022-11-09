<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$fname = $_POST['fname'];
		$email = $_POST['email'];
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,fname,email,user_name,password) values ('$user_id','$fname','$email','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo '<script>alert("Please enter some valid information!") </script>';
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
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

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}
	body {
				margin: 0;
				font-family:sans-serif;
				background-image: url("login1.JPG");
				background-size: auto;

		}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Signup</div>
			<label for="fname">Full Name</label>
			<input id="text" type="text" name="fname"><br><br>
			<label for="email">Email</label>
			<input id="text" type="text" name="email"><br><br>
			<label for="user_name">Username</label>
			<input id="text" type="text" name="user_name"><br><br>
			
			<label for="password">Password</label>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Signup"><br><br>

			<a href="login.php">Click to Login</a><br><br>
			<a href="index.html">Click to Home Page</a><br><br>
		</form>
	</div>
</body>
</html>