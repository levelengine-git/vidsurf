<!-- login page -->
<!-- based off: https://vidsurf.glitch.me/index.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>sql code</title>
  </head>
  <body>
	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "vidsurf";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $db);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	// sql to create table
	$users_table = "CREATE TABLE Users (
		user_id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		username VARCHAR(30) NOT NULL,
		password VARCHAR(300) NOT NULL,
		email VARCHAR(70),
		join_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	)";
	
	
	$videos_table = "DROP TABLE Videos"; 
	if ($conn->query($videos_table) === TRUE) {
		echo "Table Videos dropped successfully.<br />";		
	}

	$videos_table = "CREATE TABLE Videos (
		video_id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		video_name VARCHAR(100) NOT NULL,
		video_description VARCHAR(5000) NOT NULL,
		file_name VARCHAR(100) NOT NULL,
		video_extension VARCHAR(8) NOT NULL,
		video_file VARCHAR(300) NOT NULL,
		date_uploaded TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
		uploader INT(8) UNSIGNED,
		category VARCHAR(30),		
		FOREIGN KEY (uploader) REFERENCES Users(user_id)
	)";

	if ($conn->query($users_table) === TRUE) {
		echo "Table Users created successfully.<br />";
	} else {
		echo "Error creating table: " . $conn->error . "<br />";
	}

	if ($conn->query($videos_table) === TRUE) {
		echo "Table Videos created successfully.<br />";
	} else {
		echo "Error creating table: " . $conn->error . "<br />";
	}
	
	//more tables go down here as needed...

	$conn->close();
	?>
</html>
