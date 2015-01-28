<?php

	session_start();
	session_destroy();

	include 'connection.php';

	$user = $_SESSION['username'];

	if(isset($_SESSION['username'])){

		mysqli_query($connect,"DELETE FROM online WHERE user='$user'");

	}
	header('Location:https://mushy1693.com/index.php') ;

?>