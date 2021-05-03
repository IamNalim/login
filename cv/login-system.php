<?php 

	// session and getting nickname of user
	session_start(); 
	$name = $_SESSION["nickname"];

	// create connection with DB.
	// variables
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "cv";
	// create connection
	global $conn;
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
	// find out if we connect to db
	if ($conn->connect_error) {
		//echo "\ncannot connect to db!!\n";
		$_SESSION["error"] = "Cannot connect to db.";
		header("location:login.php");
		close();
	}

	// query info about user and store into variables for work with them.
	$sql = "SELECT * FROM `cv-users` WHERE nickname = '$name'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	// no user was found
	if ($row == NULL) {
		$_SESSION["error"] = "Please login again.";
		header("location:login.php");
		close();
	}

	$user_id = $row["id"];
	$nickname = $row["nickname"];

	//create dir. for images, if not existing
	$directory = $name . "-album";

	if (!file_exists("albums/$directory")) {
		mkdir("albums/$directory", 7777, true);
	}

	if (isset($_POST["logout"])) {
		$_SESSION["images"] = "";
		$_SESSION["error"] = "You have been logged out.";
		header("location:login.php");
		close();
	}

	// images from generator
	$album = "<h1 style=\"text-align: center; color: red;\">No images to show</h1>";
	if (!empty($_SESSION["images"])) {
		$album = $_SESSION["images"];
		$_SESSION["images"] = "";
	}
	

	$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="styles/login-system.css" />
	<link rel="icon" href="images/deff-not-malovani-logo.png">
	<title>Login system</title>
</head>
<body>

	<script type='text/javascript'>
		// onload of page we need to keep radio button checked
		window.onload = function() {
  			checkedBox();
  			document.getElementById("profile").style.display = "inline-block";
  			document.getElementById("album-main").style.display = "inline-block";
  			document.getElementById("big-div").style.display = "none";
		};

		// show big picture
		function bigImage(element) {
			var big_div = document.getElementById("big-div");

			if (big_div.style.display === "none") {
				document.getElementById("big-picture").src = element.src;
				document.getElementById("profile").style.display = "none";
				document.getElementById("album-main").style.display = "none";
				big_div.style.display = "block";
			} else {
				document.getElementById("profile").style.display = "inline-block";
				document.getElementById("album-main").style.display = "inline-block";
				big_div.style.display = "none";
			}
		}

		// logic of which radio button should be checked
		function checkedBox() {
			//alert("funkce se zavolala!");
			var name = document.getElementById("name");
			var date = document.getElementById("date");
			var size = document.getElementById("size");
			var option = "<?php if (isset($_SESSION["filter"])) {echo $_SESSION["filter"];} else echo 'name'; ?>"

			if (option === "name") {
				name.checked = true;
				date.checked = false;
				size.checked = false;
			} else if (option === "date") {
				name.checked = false;
				date.checked = true;
				size.checked = false;
			} else {
				name.checked = false;
				date.checked = false;
				size.checked = true;
			}
		}

		// switch between album and settings section
		function showSettings() {
  			var album_main = document.getElementById("album-main");
  			var settings_main = document.getElementById("settings-main");
  			var settings_button = document.getElementById("settings-button");
			if (album_main.style.display === "none") {
				album_main.style.display = "inline-block";
				settings_main.style.display = "none";
				settings_button.innerHTML = "Settings";
			} else {
				album_main.style.display = "none";
				settings_main.style.display = "inline-block";
				settings_button.innerHTML = "Album";
			}
		}

		// function for reloading page and showing images
		(function() {
			if( window.localStorage ) {
		    	if( !localStorage.getItem('firstLoad') ) {
		      		localStorage['firstLoad'] = true;
		      		window.location.reload();
		    	} else
		      		localStorage.removeItem('firstLoad');
			}
		})();

	</script>


	<script type="text/javascript">

		// onload regenerate images
		window.onload = function() {
  			document.getElementById('placeholder').innerHTML = "<?php include 'img-generator.php'; image_gen($option = 'name', $user_id) ?>";
		};

	</script>

	<div class="profile-container" id="profile">
		<!-- HOTOVO -->
		<div class="profile-circle">
			<img src="images/circle.png">
			<div><?php echo $nickname[0]; ?></div>
			<hr>
		</div>

		<!-- HOTOVO -->
		<div class="profile-name">
			<h1><?php echo $nickname ?></h1>
			<hr>
		</div>

		<div class="profile-main">
			<!-- HOTOVO -->
			<div class="profile-add">
				<form action="img-generator.php" method="POST" enctype="multipart/form-data">
					<input type="file" name="my_file">
					<input type="submit" name="generator" value="Add Image">
					<input type="hidden" name="nickname" value="<?php echo $nickname ?>">
				</form>	
				<hr>
			</div>

			<!-- HOTOVO -->
			<div class="profile-settings">
				<button onclick="showSettings()" id="settings-button">Settings</button>
				<hr>
			</div>

			<!-- 800px need to change !!!!!!! TODO FILTERS -->
			<div class="profile-filters">
				<form action="img-generator.php" method="GET">

					<div class="filter-name">
						<label for="name">Sort by Name:</label><br>
						<label for="date">Sort by Date:  </label><br>
						<label for="size">Sort by Size:  </label><br>
					</div>
					<div class="filter-value">
						<input id="name" type="radio" name="option" value="name"><br>
						<input id="date" type="radio" name="option" value="date"><br>
						<input id="size" type="radio" name="option" value="size"><br>
					</div>
					<input type="submit" name="submit" value="Apply">

				</form>
				<hr>
			</div>

			<!-- HOTOVO -->
			<div class="profile-logout">
				<form method="POST">
					<input type="submit" name="logout" value="Log Out">
				</form>
				<hr>
			</div>

			<!-- HOTOVO -->
			<div class="profile-footer">
				<h1>Created by Milan Matoušek <a href="index.php">[CV]</a></h1>
			</div>
		</div>

	</div>

	<!-- TODO -->
	<div class="album-container" id="album-main">

		 <?php echo $album; ?>

	</div>

	<!-- Wrapper for showing big image HOTOVO -->
	<div id="big-div">
		<img id="big-picture" onclick="bigImage(this)">
	</div>


	<!-- TODO CHANGE EMAIL, PASSWORD -->
	<div class="settings-container" id="settings-main">
		<h1> Settings </h1>
	</div>

</body>
</html>