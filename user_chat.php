<?php

	session_start();

	include 'connection.php';

	$chat = $_GET['text'];

	$chat = mysqli_real_escape_string($connect , $chat);

	if($chat != ""){

		$user = $_SESSION['username'];

		date_default_timezone_set("America/Los_Angeles");

		$current_chat_time = date("n/j/y - h:i a");

		mysqli_query($connect, "INSERT INTO chat (text_post, user, time) VALUES ('$chat' , '$user', '$current_chat_time')");

	}

	$print = mysqli_query($connect, "SELECT * FROM chat ORDER BY id DESC LIMIT 30");

	while($chat = mysqli_fetch_array($print)){

		echo $chat['user'] . "<br>" . "(" . $chat['time'] . ")" . "<br>" . $chat['text_post'] . "<hr>";

	}

?>