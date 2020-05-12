<!-- header to put on top of many of the website's pages -->
    <nav>
      <img src="images/logo_Vidsurf.png" style="max-height: 40px;">
      <font size="2">	 
		<!-- ALWAYS show -->
        <a href="index.php">Home</a>
		
		<?php		
		// brings the data from active session here, or starts a session with no data		
		error_reporting(0);
    	session_start();
		
		// if logged in...
		if ($_SESSION['userName'] != null) {
			echo '<a href="upload_video.php">Upload</a>';
			echo '<a href="processLogout.php">Log Out</a>';
		}
		// if NOT logged in...
		else {
			echo '<a href="signup.php">Sign Up</a>';
			echo '<a href="login.php">Log In</a>';
		}			
		?>

		<!-- ALWAYS show -->
		<a href="index.php">Help</a>	
				
		<form method='GET' action="display_videos.php" class="search_bar">
			<input type="text" name="video_query" />
			<input type="submit" value="Search Videos">
		</form>

      </font>
	  
	  <?php
	  /*
	  if ($_SESSION['userName'] != null) {
		  echo '<hr />';
		  echo '<h3 style=
			"position: fixed; 
			top: 25px; 
			right: 25px; 
			width: 300px; 
			text-align: right;">
		  Welcome $user</h3>';
	  }
	  */
	  ?>
    </nav>
