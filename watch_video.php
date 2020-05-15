<!-- index, initial landing page -->
<!-- saved from url=(0036)https://vidsurf.glitch.me/index.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Vidsurf - share your videos with the world!</title>
	<link rel="stylesheet" href="css/watch.css?ts=<?=time()?>">
	<link rel="stylesheet" href="css/header.css?ts=<?=time()?>">
	<link rel="stylesheet" href="css/sidebar.css?ts=<?=time()?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="images/jquery.min.js.download"></script>
  </head>
  <body>
	<?php
		include("header.php");
		include("sidebar.php");
		
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
		
		$videoId = $_GET['id'];
		$get_video = "SELECT * FROM Videos WHERE video_id='$videoId'";
		$result = $conn->query($get_video);
		
		if ($result->num_rows === 1) {
			while($row = $result->fetch_assoc()) {
				$location = $row['video_file'];
				$title = $row['video_name'];
				$desc = $row['video_description'];
				$upload_date = $row['date_uploaded'];
				//assigned to update the view count on the video...
				$curr_view_count = $row['views'];
			}
		}
		
		$update_view_count = "UPDATE Videos SET Views=".($curr_view_count+1)." WHERE video_id=".$videoId."";
		$update = $conn->query($update_view_count);		
	?>

    <main>
      <section class="featured-section">
        <div class="header_display_videos">
          <h1 class="title">
            <?php 
				if ($title != '') {
					echo $title;
				}
				else {
					echo "null";
				}
			?>
          </h1>
        </div>
        <div class="content">
			<?php 
				echo "<video class='vid' src='" . $location . "' controls width='100%' height='auto' >";			
			?>;
        </div>	
        <div>
			<div style="float: left;">Rate: *****</div>
			<div style="float: right;">Views: <?php echo ($curr_view_count+1); ?></div>
		</div>
		<br />
		<p class="video_paragraphs">Added: <?php echo ($upload_date); ?></p>
		<hr />
		<p class="video_paragraphs"><?php echo ($desc); ?></p>
      </section>
    </main>

    <aside class="ads">
      
    </aside>
    <footer>
      
    </footer>

</body></html>
