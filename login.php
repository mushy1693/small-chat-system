<html>

	<head>

		<link rel="stylesheet" type="text/css" href="login_style.css">

	</head>

	<body>

		<h1>Nello's Den</h1>

		<?php

		echo "<html>
		<head>
			<link rel='stylesheet' type='text/css' href='https://mushy1693.com/login_style.css'>
		</head>
		<body>
			<a href = 'https://mushy1693.com/register.php'><input id = 'submit' type = 'submit' value = 'Register'></a>
		</body>
		</html>";

		?>

		<form action = "https://mushy1693.com/login_check.php" method = "post">

			Username<input type = "text" name = "username"><br>
			Password<input type = "password" name = "password"><br>
			<input id = "submit" type = "submit" value = "Login">

		</form>

		<footer>Copyright &copy; 2014. Mushy1693.com</footer>

	</body>

</html>