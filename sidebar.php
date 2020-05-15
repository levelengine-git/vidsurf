<?php
	session_start();
?>

<!-- sidebar reused on many of the website's pages -->
<aside class="sidebar">

<?php
//if logged in...
if ($_SESSION['userName'] != null) {
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

	$lifetime_views = 0;
	$get_all_videos = "SELECT * FROM Videos WHERE uploader=".$_SESSION['userId']."";
	$result = $conn->query($get_all_videos);
	$total_videos = $result->num_rows;

	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$lifetime_views += $row['views'];
		}
	}	
	
	echo '<div>';
	  echo '<div class="userinfo">';
		echo '<div class="sidebar_index">';
		  echo '<a class="username" href="channel.php?user='.$_SESSION['userId'].'">'.$_SESSION['userName'].'</a>';
		echo '</div>';
		echo '<div class="usericon" >';
		  echo '<img src="images/791224_man_512x512.png" style="max-width: 100%;">';
		echo '</div>';
		echo '<div class="sidebar_footer" >';
		  echo 'Subscribers: 0';
		  echo '<br>';
		  echo 'Views: '.$lifetime_views.'';
		  echo '<br>';
		  echo 'Videos: '.$total_videos.'';
		echo '</div>';
	  echo '</div>';
	  echo '<b>Manage content</b>';
	  echo '<hr>';
	  echo '<a href="https://vidsurf.glitch.me/index.html#">My stats</a><br>';
	  echo '<a href="video_manager.php">My videos</a><br>';
	  echo '<a href="https://vidsurf.glitch.me/index.html#">My info</a>';
	  echo '<br><br>';
	  echo '<b>My subs</b>';
	  echo '<hr>';
	echo '</div>';
}
?>

<!-- ALWAYS show... -->
<div>
	<b></b>
</div>
  
</aside>
