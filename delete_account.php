<?php

	session_start();

	include 'connection.php';

	$delete_user = $_SESSION['username'];

	mysqli_query($connect , "DELETE FROM login WHERE username='$delete_user'");

	header('Location:https://mushy1693.com/logout.php');

?>