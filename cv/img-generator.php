<?php 
	session_start(); 

	// connect to db with images
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "cv";
	global $conn;
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
	if ($conn->connect_error) {
		echo "\ncannot connect to db!!\n";
	}


	// 3 states, adding image, filtering images, load images
	if (!empty($_POST["generator"])) {
		// adding image into db!!!
		$_SESSION["filtered"] = "no";
		add_image();
		unset($_POST);
	}

	if (!empty($_GET["option"])) {
		// filtrationnnnn to doooo
		$_SESSION["filtered"] = "yes";
		$_SESSION["images"] = "filter: " . $_GET["option"];
		$_SESSION["filter"] = $_GET["option"];
		unset($_GET);
		header("location:login-system.php");
		close();
	}


	// function to add image into db and folder
	function add_image() {
		global $conn; 

		// store image
		// query info about user and store into variables for work with them.
		$name = $_SESSION["nickname"];
		$sql = "SELECT * FROM `cv-users` WHERE nickname = '$name';";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		// store user id for work with his images
		$user_id = $row[0];

		$upload = 1;

		// prevent some injection into code
		$filename = htmlspecialchars($_FILES["my_file"]["name"]);

		// check file type (png, jpg, jpeg, gif)
		$valid_files = ["png", "jpg", "jpeg", "gif"];
		$imageFileType = strtolower(pathinfo($_FILES["my_file"]["name"], PATHINFO_EXTENSION));
		if (!in_array($imageFileType, $valid_files)) {
    		$conn->close();
    		$upload = 0;
    		echo "<SCRIPT>
    				alert('Wrong file type. [png, jpg, jpeg, gif]');
    				window.location = 'login-system.php'; 
  				 </SCRIPT>";
  			close();
		}

		// limit file size (its for 2MB)
		if ($_FILES["my_file"]["size"] > 2000000) {
			$conn->close();
			$upload = 0;
			echo "<SCRIPT>
    				alert('Too large image [max 2MB]');
    				window.location = 'login-system.php'; 
  				 </SCRIPT>";
  			close();
		}


		// find out count of images from this user
		$sql = "SELECT COUNT(*) FROM `cv-images` WHERE user_id = '$user_id';";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		// max 9 images
		if ($row[0] >= 9) {
			$upload = 0;
			$conn->close();
			echo "<SCRIPT>
    				alert('Sorry, maximum images uploaded [max 9]');
    				window.location = 'login-system.php'; 
  				 </SCRIPT>";
  			close();
		} else {
			// we can store image into database
			$target_dir = "albums/" . $name . "-album/" . $_FILES["my_file"]["name"];

			// check if file already exits
			$sql = "SELECT * FROM `cv-images` WHERE user_id = '$user_id' AND place = '$target_dir';";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_array($result);
			if ($row != NULL) {
				// there is already this file
				$upload = 0;
				$conn->close();
				echo "<SCRIPT>
    				alert('File already exists with this name.');
    				window.location = 'login-system.php'; 
  				 </SCRIPT>";
  				close();

			} else if ($upload != 0) {
				// putting file into db
				if (move_uploaded_file($_FILES["my_file"]["tmp_name"], $target_dir)){
					$file_name = $_FILES["my_file"]["name"];
					$upload_image = "INSERT INTO `cv-images` (name, user_id, place) VALUES ('${file_name}', '${user_id}', '${target_dir}');";
					$result = mysqli_query($conn, $upload_image);
				} else {
					$conn->close();
					image_gen($option = "name", $user_id);
					echo "<SCRIPT> 
							alert('Your file was NOT uploaded.')
							window.location = 'login-system.php';
						</SCRIPT>";
				}
				
			}

			// ITS WORKING!!!
			// now reload images
			image_gen("name", $user_id);
			$conn->close();
			echo "<SCRIPT> 
					alert('Your file was uploaded.')
					window.location = 'login-system.php';
				</SCRIPT>";

		}

	} // end of function

	// function to load images
	function image_gen($option = "name", $user_id) {
		if ($option === "name") {
			// default value, sort by name
			global $conn;
			$_SESSION["images"] = "";

			$sql = "SELECT * FROM `cv-images` WHERE user_id = '$user_id' ORDER BY $option";
			$result = mysqli_query($conn, $sql);
			
			if ($result) {
				while ($row = mysqli_fetch_array($result)) {
					//row
					$_SESSION["images"] .= "\t\t\t\t<div class=\"album-image\">\n";
					$_SESSION["images"] .= "\t\t\t\t\t<img src=\"$row[3]\" alt=\"placeholder\" onclick=\"bigImage(this)\">\n";
					$_SESSION["images"] .= "\t\t\t\t</div>\n";
				}
			}
		}

		return;
	} // end of function

?>