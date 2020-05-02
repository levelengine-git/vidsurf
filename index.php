<!-- index, initial landing page -->
<!-- saved from url=(0036)https://vidsurf.glitch.me/index.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Vidsurf - share your videos with the world!</title>
    <link rel="stylesheet" href="css/index.css?ts=<?=time()?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="images/jquery.min.js.download"></script>
  </head>
  <body>
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
			echo '<a href="upload.php">Upload</a>';
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
				
		<input type="text" />
		<input type="submit" value="Search Videos">

      </font>
	  
	  <?php
	  if ($_SESSION['userName'] != null) {
		  echo '<hr />';
		  echo '<h3 style=
			"position: fixed; 
			top: 25px; 
			right: 25px; 
			width: 300px; 
			text-align: right;">
		  Welcome levelengine</h3>';
	  }
	  ?>
    </nav>
    <aside class="sidebar">
	
	<?php
	//if logged in...
	if ($_SESSION['userName'] != null) {
		echo '<div>';
		  echo '<div class="userinfo">';
			echo '<div class="header">';
			  echo $_SESSION['userName'];
			echo '</div>';
			echo '<div class="usericon" >';
			  echo '<img src="images/791224_man_512x512.png" style="max-width: 100%;">';
			echo '</div>';
			echo '<div class="footer" >';
			  echo 'Subs: 0';
			  echo '<br>';
			  echo 'Views: 0';
			  echo '<br>';
			  echo 'Videos: 0';
			echo '</div>';
		  echo '</div>';
		  echo '<b>Manage content</b>';
		  echo '<hr>';
		  echo '<a href="https://vidsurf.glitch.me/index.html#">My stats</a><br>';
		  echo '<a href="https://vidsurf.glitch.me/index.html#">My videos</a><br>';
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
    <main>
      <section class="featured-section">
        <div class="header">
          <h1>
            Featured videos
          </h1>
        </div>
        <div class="content">
          <div class="video-card">
            <div class="thumbnail">
              <img src="images/image8-2-1024x576.png">
            </div>
            <br>
            <h3>
              <a href="https://vidsurf.glitch.me/index.html#">A video</a>
            </h3>
            <p>
             </p>
          </div>
          <div class="video-card">
            <div class="thumbnail">
              <img src="images/image8-2-1024x576.png">
            </div>
            <br>
            <h3>
              <a href="https://vidsurf.glitch.me/index.html#">Another video</a>
            </h3>
            <p>
            </p>
          </div>
        </div>
      </section>
    </main>
	
	<!-- sample php code -->
	<?php 
	echo "Hello world! This is sample PHP code being executed. It also prints the numbers 1-20.<br />";
	for ($i = 0; $i < 10; $i++) {
		echo $i . "<br />";
	}
	?>
	
    <aside class="ads">
      
    </aside>
    <footer>
      
    </footer>

</body></html>
