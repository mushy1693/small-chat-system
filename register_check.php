<?php
	
	session_start();

	include 'connection.php';

	$firstname = mysqli_real_escape_string($connect , $_POST['firstname']);
	$lastname = mysqli_real_escape_string($connect , $_POST['lastname']);
	$username = mysqli_real_escape_string($connect , $_POST['username']);
	$password = mysqli_real_escape_string($connect , $_POST['password']);

	try{

		if($username && $password && $firstname && $lastname){

			$check_user = mysqli_query($connect, "SELECT * FROM login");

			$user = false;

			while($loop_login = mysqli_fetch_array($check_user)){

				if($loop_login['username'] == $username){

					$user = true;

				}

			}

			if($user == true){

				throw new exception("<h2 style = 'text-align: center;'>Username is taken.</h2><html><head><link rel='stylesheet' type='text/css' href='https://mushy1693.com/login_style.css'></head><body><a href = 'https://mushy1693.com/register.php'><input id = 'submit' type = 'submit' value = 'Register'></a></body></html>");

			}

			if($user == false){

				mysqli_query($connect, "INSERT INTO login (username , password, firstname, lastname) VALUES ('$username', '$password', '$firstname', '$lastname')");

				echo "<h2 style = 'text-align: center;'>Register Successful.</h2>";

				echo "<html><head><link rel='stylesheet' type='text/css' href='https://mushy1693.com/login_style.css'></head><body><a href = 'https://mushy1693.com/login.php'><input id = 'submit' type = 'submit' value = 'Home'></a></body></html>";

			}

		}else{

			throw new exception("<h2 style = 'text-align: center;'>Please fill in all information.</h2><html><head><link rel='stylesheet' type='text/css' href='https://mushy1693.com/login_style.css'></head><body><a href = 'https://mushy1693.com/register.php'><input id = 'submit' type = 'submit' value = 'Register'></a></body></html>");

		}

	}catch(exception $e){

		echo $e->getMessage();

	}

?>