<?php

	session_start();

	include 'connection.php';

	$user = $_SESSION['username'];

	if(isset($_SESSION['username'])){

		mysqli_query($connect, "INSERT INTO online (user) VALUES ('$user')");

	}

	header('Location:https://mushy1693.com/index.php') ;

?>