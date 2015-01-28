<?php

	session_start();

	if(isset($_SESSION['username'])){

		include 'connection.php';

		echo"<script>

		function Retrieve(){

			var xmlhttp;
			var chat_text = '';

			if(window.XMLHttpRequest){
				xmlhttp=new XMLHttpRequest();
			}else{
				xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
			}

			xmlhttp.onreadystatechange=function(){

				if(xmlhttp.readyState==4 && xmlhttp.status==200){
					document.getElementById('chat').innerHTML=xmlhttp.responseText;
				}

			}
			setTimeout('Retrieve()', 500);
			xmlhttp.open('GET','user_chat.php?text=' + chat_text,true);
			xmlhttp.send();
		}

		function Send(){

			var xmlhttp;
			var chat_text = document.getElementById('chat_field').value;

			if(window.XMLHttpRequest){
				xmlhttp=new XMLHttpRequest();
			}else{
				xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
			}

			xmlhttp.onreadystatechange=function(){

				if(xmlhttp.readyState==4 && xmlhttp.status==200){
					document.getElementById('chat').innerHTML=xmlhttp.responseText;
				}

			}
			
			xmlhttp.open('GET','user_chat.php?text=' + chat_text,true);
			xmlhttp.send();
		}
		</script>";

		echo "<h1>Nello's ChatRoom</h1>";

		echo "<h2>" . "Welcome: " . $_SESSION['username'] . "</h2>";

		echo "<h2>" . "<br>Current User Logged in: ";

		$get_user = mysqli_query($connect, "SELECT * FROM online");

		while($user_on = mysqli_fetch_array($get_user)){

			echo $user_on['user'] . ", ";

		}

		echo "..." . "</h2>";
		echo "<br>";

?>

		<html>
		<head>
			<link rel='stylesheet' type='text/css' href='https://mushy1693.com/homepage_style.css'>
		</head>
		<body onload = 'Retrieve()'>
			<a href = 'https://mushy1693.com/delete_account.php'><input id = 'submit' type = 'submit' value = 'Delete Account'></a>
			<a href = 'https://mushy1693.com/update_info.php'><input id = 'submit' type = 'submit' value = 'Update Info'></a>
			<a href = 'https://mushy1693.com/logout.php'><input id = 'submit' type = 'submit' value = 'Logout'></a>
			<a href = 'https://mushy1693.com/index.php'><input id = 'submit' type = 'submit' value = 'Refresh'></a>

		<form>
		<input id = 'chat_field' type='text' name='fname' placeholder = 'Type Something' onclick ="this.value=''"></input>
		<button id = 'submit' type='button' onclick = 'Send()'>Submit</button>
		</form>

<?php

		echo "<h3 id = 'chat'></h3>";
		echo "		
		</body>
		</html>";

	}else{

		header('Location:https://mushy1693.com/login.php');

	}

?>