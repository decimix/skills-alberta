<?php
	$username = filter_input(INPUT_POST, "username");
	$password = filter_input(INPUT_POST, "password");	
	
	if (!empty($username) || !empty($password)) {
		if ($username === "admin" && $password === "reginald") {
			session_start();
			$_SESSION["authorized"] = true;
			$message = "<p style='color: green'>Login successful! You can now edit all pages.</p>";
			echo <<<JS
				<script>
				setTimeout(function () {
					window.location.href = "/";
				}, 2000);
				</script>
JS;
		} else {
			$message = "<p style='color: red'>Incorrect username or password</p>";
		}
	}
?>
<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Reginald's LED Lighting | Admin</title>
		<link rel="stylesheet" type="text/css" href="index.css" />
		<link rel="stylesheet" type="text/css" href="admin.css" />
		<script src="libs/jquery-3.2.1.min.js"></script>
		<script src="libs/tinymce/tinymce.min.js"></script>
	</head>
	<body>
		<?php require_once("header.php"); ?>
		<form method="post">
			<div id="inputs">
				<h2>Login</h2>
				<?php if (!empty($message)) {
					echo $message;
				} ?>
				<label for="username">Username</label>
				<input id="username" name="username" type="text" placeholder="Username" required />
				<label for="password">Password</label>
				<input id="password" name="password" type="password" placeholder="Password" required />
				<input id="login" type="Submit" value="Login" />
			</div>
		</form>
	</body>
</html>
 