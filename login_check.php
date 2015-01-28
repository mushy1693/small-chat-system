<?php

	session_start();

	include 'connection.php';

	$username = mysqli_real_escape_string($connect , $_POST['username']);
	$password = mysqli_real_escape_string($connect , $_POST['password']);

	try{

		if($username && $password){

			$check = mysqli_query($connect, "SELECT * FROM login");

			$user = false;

			while($account = mysqli_fetch_array($check)){

				if($account['username'] == $username && $account['password'] == $password){

					$user = true;

					$_SESSION['username'] = $username;

					header('Location:https://mushy1693.com/user_online.php') ;

				}

			}

			if($user == false){

				throw new exception("<h2 style = 'text-align: center;'>The username or password is incorrect.</h2>
				<html>
				<head>
					<link rel='stylesheet' type='text/css' href='https://mushy1693.com/login_style.css'>
				</head>
				<body>
					<a href = 'https://mushy1693.com/login.php'><input style = 'font-family: Italic;' id = 'submit' type = 'submit' value = 'Back to Login'></a>
				</body>
				</html>");

			}

		}else{

			throw new exception("<h2 style = 'text-align: center;'>Please fill in all information.<h2>
				<html>
				<head>
					<link rel='stylesheet' type='text/css' href='https://mushy1693.com/login_style.css'>
				</head>
				<body>
					<a href = 'https://mushy1693.com/login.php'><input style = 'font-family: Italic;' id = 'submit' type = 'submit' value = 'Back to Login'></a>
				</body>
				</html>");

		}

	}catch(exception $e){

		echo $e->getMessage();

	}

?>