<!-- index, initial landing page -->
<!-- saved from url=(0036)https://vidsurf.glitch.me/index.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Vidsurf - share your videos with the world!</title>
    <link rel="stylesheet" href="css/index.css">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="images/jquery.min.js.download"></script>
  </head>
  <body>
    <nav>
      <img src="images/logo_Vidsurf.png" style="max-height: 40px;">
      <font size="2">	 
		<!-- ALWAYS show -->
        <a href="index.php">Home</a>
		
		<!-- if logged in... -->
		<!--
        <a href="upload.php">Upload</a>
		<a href="index.php">Log Out</a>
		-->
		
		<!-- if NOT logged in... -->
		<a href="index.php">Sign Up</a>
		<a href="login.php">Log In</a>
		
		<!-- ALWAYS show -->
		<a href="index.php">Help</a>	
				
		<input type="text" />
		<input type="submit" value="Search Videos">
		
		<a href="create_tables.php">Create Database Tables</a>
		
      </font>
    </nav>
    <aside class="sidebar">
	
	<!-- if logged in... -->
	<div>
      <div class="userinfo">
        <div class="header">
          Username
        </div>
        <div class="usericon" >
          <img src="images/791224_man_512x512.png" style="max-width: 100%;">
        </div>
        <div class="footer" >
          Subs: 1000
          <br>
          Views: 789
          <br>
          Videos: 54
        </div>
      </div>
      <b>Manage content</b>
      <hr>
      <a href="https://vidsurf.glitch.me/index.html#">My stats</a><br>
      <a href="https://vidsurf.glitch.me/index.html#">My videos</a><br>
      <a href="https://vidsurf.glitch.me/index.html#">My info</a>
      <br><br>
      <b>My subs</b>
      <hr>
	</div>
	<!-- if NOT logged in... -->
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
	for ($i = 0; $i < 20; $i++) {
		echo $i . "<br />";
	}
	?>
	
    <aside class="ads">
      
    </aside>
    <footer>
      
    </footer>

</body></html>
