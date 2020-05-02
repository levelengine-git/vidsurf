
<!-- This file processes the login Form (from loginPage.php), and then does an action --> 

<?php
	include("salt.php");
	error_reporting(0);

	// start a session when someone logs in
	// also initialize 2 session variables: username and password
	//session_unset();
	//session_destroy();

	session_start();
	$_SESSION['userName'] = $_POST['userName']; 
	$_SESSION['userPass'] = $_POST['userPass'];

	// holder variables we will use for the processing
	$userName = $_POST['userName'];
	$userPass = $_POST['userPass'];

	// LOGIN CASES
	// Check that the user has already signed up before, then:
	// if the user enters the incorrect password, make him try again.
	// if he enters the correct password, redirect him to the Home page
	// if the user enters a non existing user, tell him to sign-up or enter the correct user name (NEED TO DO THIS)

	//connect to mysql using mysqli
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

	$query_user_logging_in = "SELECT * FROM users WHERE username='$userName'";
	print ($query_user_logging_in);
	$result = $conn->query($query_user_logging_in);
	print ($result->num_rows);

	if ($result->num_rows === 1) {
		while($row = $result->fetch_assoc()) {
			echo $row["username"]."<br>";
			
			echo (crypt($userPass, '$2y$07$'.$salt.'$')." == ".$row["password"]);
			if (crypt($userPass, '$2y$07$'.$salt.'$') == $row["password"]) { //see if password is correct...
				$correctPassword = true;
				successful_login();
			}
			else {
				//wrong pass, therefore credentials aren't valid
				invalid_login();
			}
		}
	} 
	else {
		//no users found, therefore credentials aren't valid
		invalid_login();
	}

	function invalid_login() {	
		//header("location: login.php");
	
		echo "<h4> SHIT </h4>";
		echo "<h4> The password is incorrect. </h4>";
		echo "<h4> Enter password again. </h4>";

		// FIX error
		unset($_SESSION);
		session_destroy();

		require("login.php");
	}
	function successful_login() {
		// welcome message
		echo "<div align=\"right\">";

		echo "Correct Password";
		echo "<br/>";
		echo "<h4> Welcome " . $userName . "</h4>";

		echo "</div>";

		header("location: index.php");
	}
	
?>
