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
	password VARCHAR(30) NOT NULL,
	email VARCHAR(50),
	join_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
	)";
	
	//$users_table = "DROP TABLE Users";

	if ($conn->query($users_table) === TRUE) {
		echo "Table Users created successfully.";
	} else {
		echo "Error creating table: " . $conn->error;
	}
	
	//more tables go down here as needed...

	$conn->close();
	?>
</html>
