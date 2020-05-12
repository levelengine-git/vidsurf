<!-- index, initial landing page -->
<!-- saved from url=(0036)https://vidsurf.glitch.me/index.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Vidsurf - share your videos with the world!</title>
    <link rel="stylesheet" href="css/index.css?ts=<?=time()?>">
	<link rel="stylesheet" href="css/header.css?ts=<?=time()?>">
	<link rel="stylesheet" href="css/sidebar.css?ts=<?=time()?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="images/jquery.min.js.download"></script>
  </head>
  <body>
	<?php
		include("header.php");
		include("sidebar.php");		
	?>

    <main>
      <section class="featured-section">
        <div class="header_index">
          <h1>
            Featured videos
          </h1>
        </div>
		<table>
        <div class="content">
          <div class="video-card">
			<form method='GET' action="watch_video.php">
				<div class="thumbnail">
				  <input class="thumbnail" type="image" src="images/image8-2-1024x576.png" alt="DDLC speedrun" />
				</div>
				<br>
				<h3>	
				  <input type="text" name="id" value="1" hidden />
				  <input class="video_link" type="submit" value="DDLC speedrun"/>
				</h3>
				<p>
				 </p>
			 </form>
          </div>
          <div class="video-card">		  
            <form method='GET' action="watch_video.php">
				<div class="thumbnail">
				  <input class="thumbnail" type="image" src="images/image8-2-1024x576.png" alt="Another video" />
				</div>
				<br>
				<h3>	
				  <input type="text" name="id" value="2" hidden />
				  <input class="video_link" type="submit" value="Another video"/>
				</h3>
				<p>
				 </p>
			 </form>
          </div>
        </div>

      </section>
    </main>
	
	<!-- sample php code -->
	<?php 

	?>
	
    <aside class="ads">
      
    </aside>
    <footer>
      
    </footer>

</body></html>
