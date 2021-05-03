<?php
	// for work with SESSION
	session_start();

	// FIRST you remove all the reference records. After that do this
	// ALTER TABLE `cv-users` AUTO_INCREMENT = 1 => RESET AUTOINCREMENT ON ID COUNT
	// connection to DB section
	// variables for connection to DB cv
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "cv";

	// create connection
	global $conn;
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
	if ($conn->connect_error) {
		echo "\ncannot connect to db!!\n";
	}

	if ($_POST["submit"] === "Log In") {
		login();
	} elseif ($_POST["submit"] === "Register") {
		register();
	} else {
		echo "No idea what section";
	}


	
	// happens: no nickname in database, wrong password connected to username
	function login() {
		global $conn;

		$nickname = $_POST["nickname"];
		$password = $_POST["password"];

		$_SESSION["nickname"] = $nickname;

		// command for searching nickname in db
		$sql = "SELECT * FROM `cv-users` WHERE nickname = '$nickname'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);

		if ($row == NULL) {
			$_SESSION["error"] = "Nickname was not found.";
			header("location:login.php");
			// exit db connection after work is done with DB.
			$conn->close();
			close();
		}

		if (($row["nickname"] == $nickname) && (password_verify($password, $row["password"]))) {
			// ok 
			$_SESSION["nickname"] = $nickname;
			header("location:login-system.php");
			// exit db connection after work is done with DB.
			$conn->close();
			close();
		} else {
			$_SESSION["error"] = "Invalid password!";
			header("location:login.php");
			// exit db connection after work is done with DB.
			$conn->close();
			close();
		}
	} 


	// function for handling registration
	function register() {
		global $conn;

		// upload information into variables
		$nickname = $_POST["nickname"];
		$password = $_POST["password"];
		$password_again = $_POST["password_again"];
		$email = $_POST["email"];

		// some info into session
		$_SESSION["nickname"] = $nickname;
		$_SESSION["email"] = $email;

		// basic sanitization
		$nickname = htmlspecialchars($nickname);
		$password = htmlspecialchars($password);
		$password_again = htmlspecialchars($password_again);
		$email = htmlspecialchars($email);

		// check email
		check_email($email);

		// check nickname
		check_nickname($nickname);

		// return to registration if passwords do not match
		if ($password !== $password_again) {
			$_SESSION["error"] = "Passwords do not match!";
			header("location:registration.php");
			// exit db connection after work is done with DB.
			$conn->close();
			close();
		} 

		// password is ok, lets hash it
		$hash_password = password_hash($password, PASSWORD_DEFAULT); // pass is ready to hash

		// data are valid and sanitized, lets put them into db
		$register_user = "INSERT INTO `cv-users` (nickname, password, email) VALUES ('${nickname}', '${hash_password}', '${email}');";

		// error while sending query to db.
		if (!(mysqli_query($conn, $register_user))) {
			echo "Error: ". $register_user . "\n" . $conn->error;
		}

		$_SESSION["nickname"] = $nickname;
		header('location:login-system.php');
		// exit db connection after work is done with DB.
		$conn->close();
		close();
		

	}

	// need to valid if exists and if is valid email
	function check_email($email) {
		global $conn;

		// validation of email address
		if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
			$_SESSION["error"] = "Invalid email address";
			header("location:registration.php");
			// exit db connection after work is done with DB.
			$conn->close();
			close();
		}

		// validation if email already exist in db
		$sql = "SELECT * FROM `cv-users` WHERE email = '$email'";
		$result = mysqli_query($conn, $sql);
		// cut row into array of columms
		$row = mysqli_fetch_array($result);
		// find out if we get any result from db
		if ($row == NULL) {
			return;
		}

		// compare email, this step is there just to be sure, but its not necessary
		if ($row["email"] == $email) {
			$_SESSION["error"] = "Sorry, e-mail already taken.";
			header("location:registration.php");
			// exit db connection after work is done with DB.
			$conn->close();
			close();
		}

		// email is valid and ready
		return;
	}

	// existing
	function check_nickname($nickname) {
		global $conn;

		// command for searching nickname in db
		$sql = "SELECT * FROM `cv-users` WHERE nickname = '$nickname'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);

		print_r($row);
		// no result was shown
		if ($row == NULL) {
			return;
		}

		// nickname is already taken (again, its not necessary)
		if ($row["nickname"] == $nickname) {
			$_SESSION["error"] = "Sorry, nickname already taken.";
			header("location:registration.php");
			// exit db connection after work is done with DB.
			$conn->close();
			close();
		}

		// nickname is valid
		return;
	}

?>

