<?php

	session_start();

	include 'connection.php';

	$username = mysqli_real_escape_string($connect, $_POST['username']);
	$password = mysqli_real_escape_string($connect, $_POST['password']);

	$user = $_SESSION['username'];

	$none = 0;

	if($username){

		mysqli_query($connect, "UPDATE chat SET user = '$username' WHERE user = '$user' ");
		mysqli_query($connect, "UPDATE login SET username = '$username' WHERE username = '$user' ");
		echo "<h2 style = 'text-align: center;'>Update successful. Please logout for changes to be applied.</h2>";

	}

	if($password){

		mysqli_query($connect, "UPDATE login SET password = '$password' WHERE username = '$user' ");
		echo "<h2 style = 'text-align: center;'>Update successful. Please logout for changes to be applied.</h2>";

	}

	if($none == 0){

		header('Location:https://mushy1693.com/index.php') ;

	}

	echo "<html>
	<head>
	<link rel='stylesheet' type='text/css' href='https://mushy1693.com/login_style.css'>
	</head>
	<body>
	<a href = 'https://mushy1693.com/logout.php'><input id = 'submit' type = 'submit' value = 'Logout'></a>
	</body>
	</html>";

?>