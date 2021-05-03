<?php 

	session_start();

	//nickname
	if (array_key_exists("nickname", $_SESSION)) {
		$nickname = $_SESSION["nickname"];
		$_SESSION["nickname"] = "";
	} else {
		$nickname = "";
	}

	// error
	if (array_key_exists("error", $_SESSION)) {
		$error_msg = $_SESSION["error"];
		$_SESSION["error"] = "";
	} else {
		$error_msg = "";
	}

	// again reloading page
	if (isset($_SESSION["filtered"])) {
		if ($_SESSION["filtered"] === "yes") {
			$_SESSION["filtered"] = "no";
			$_SESSION["filter"] = "name";
		}
	}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/login-system.css" />
	<link rel="icon" href="images/deff-not-malovani-logo.png">
	<title>Login page</title>
</head>
<body>

	<div class="center-screen">
		<div class="login">
			<form action="processing.php" method="POST" autocomplete="on">
				<h1>Login</h1>
				<div class="nickname">
					<label for="user">Nickname:</label>
					<div class="tooltip">
						<input value="<?php echo $nickname; ?>" class="input-container" type="text" name="nickname" placeholder="enter your nickname" pattern="[a-z,A-Z]{1}[a-z,A-Z,0-9]{4,19}" required maxlength="20" minlength="5">
						<span class="tooltiptext">Nickname is 5-20 alphabetical or number characters, starting with alphabetical character.</span>
					</div>
				</div>
				<div class="password">
					<label for="password">Password:</label>
					<div class="tooltip">
						<input class="input-container" type="password" name="password" placeholder="enter your password" pattern="[a-z,A-Z,0-9]{5,20}" required maxlength="20" minlength="5">
						<span class="tooltiptext">Password is 5-20 alphabetical or number characters.</span>
					</div>
				</div>
				<div class="error_message">
					<p><?php echo $error_msg; ?></p>
				</div>
				<input id="button" type="submit" name="submit" value="Log In">
			</form>
			<p class="change-type">Dont have account? Create one <a href="registration.php">HERE</a>.</p>
		</div>
	</div>

</body>
</html>