<?php
	session_start();
?>

<!-- index, initial landing page -->
<!-- saved from url=(0036)https://vidsurf.glitch.me/index.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>My channel</title>
    <link rel="stylesheet" href="css/channel.css?ts=<?=time()?>">
	<link rel="stylesheet" href="css/header.css?ts=<?=time()?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="images/jquery.min.js.download"></script>
  </head>
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
		
			$userId = $_GET['user'];

			$get_user_info = "SELECT * FROM Users WHERE user_id='$userId'";
			$result = $conn->query($get_user_info);		

			if ($result->num_rows === 1) {
				while($row = $result->fetch_assoc()) {
					$channel_user = $row['username'];
					$channel_email = $row['email'];
					$join_date = $row['join_date'];
				}
			}

			$get_channel = "SELECT * FROM Channels WHERE channel_id='$userId'";
			$result = $conn->query($get_channel);		

			if ($result->num_rows === 1) {
				while($row = $result->fetch_assoc()) {
					$channel_description = $row['channel_description'];
					$featured_video = $row['featured_video'];
					$background_image = $row['background_image'];
					$bg_col_r = $row['bg_col_r'];
					$bg_col_g = $row['bg_col_g'];
					$bg_col_b = $row['bg_col_b'];
					$bg_col_a = $row['bg_col_a'];
					$text_col_r = $row['text_col_r'];
					$text_col_g = $row['text_col_g'];
					$text_col_b = $row['text_col_b'];
				}
			}

			$get_featured_video = "SELECT * FROM Videos WHERE video_id=$featured_video";
			$result = $conn->query($get_featured_video);

			if ($result->num_rows === 1) {
				while($row = $result->fetch_assoc()) {
					$featured_video_id = $row['video_id'];
					$featured_video_name = $row['video_name'];
					$featured_video_file = $row['video_file'];
					//assigned to update the view count on the video...
					$curr_view_count = $row['views'];
				}
			}

			$update_view_count = "UPDATE Videos SET Views=".($curr_view_count+1)." WHERE video_id=".$featured_video_id."";
			$update = $conn->query($update_view_count);	
			
			$lifetime_views = 0;
			$get_all_videos = "SELECT * FROM Videos WHERE uploader=".$userId."";
			$result = $conn->query($get_all_videos);
			$total_videos = $result->num_rows;

			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					$lifetime_views += $row['views'];
				}
			}
		?>		
	<style>
		body {
			background-image: url("images/channels/bgs/<?php echo $background_image ?>"); /* customizable */
			background-repeat: no-repeat; /* fixed */
			background-size: cover; /* fixed */
			background-attachment: fixed; /* fixed */
		}
		div.content {
			background-color: rgba(<?php echo $bg_col_r.", ".$bg_col_g.", ".$bg_col_b.", ".($bg_col_a / 100.0) ?>);
		}
		div.small, div.bold_name, p.channel_desc {
			color: rgb(<?php echo $text_col_r.", ".$text_col_g.", ".$text_col_b ?>);
		}	
	</style>
	<?php
	
	?>
	
  <body>
	<?php
		include("header.php");	
	?>
	<aside class="sidebar"></aside>
	<!-- customizable attributes of the channel layout go here -->
    <main>
		<div class="content" style=
			"margin: auto; 
			width: 100%; 
			height: 1000px;">
			<div class="banner" style="width: 100%; height: auto;">
			</div>
			<div style="float: left; width: 30%">
				<div>
					<img src="images/791224_man_512x512.png" style="width: 100px;"/>
					<br />
					<div class="bold_name"><?php echo $channel_user; ?></div>
					<div class="small">Join date: May 5th, 2020</div>
					<div class="small">Last seen: 2 days ago</div>
					<div class="small">Subscribers: 0</div>
					<div class="small">Views: <?php echo ($lifetime_views); ?></div>
					<div class="small">Videos: <?php echo ($total_videos); ?></div>
					<br />
					<p class="channel_desc"><?php echo ($channel_description); ?></p>
					<br />
					<div class="small">Country: Chad</div>
					<div class="small">Website: https://www.smwcentral.net/?p=profile&id=18536</div>
					<br />
					<hr />
					<br />
					<b>Customize your channel</b>
				</div>
			</div>
			<div style="float: left; width: 70%;">
				<div style="padding: 1rem;">
					<video class='vid' src='<?php echo ($featured_video_file); ?>' controls width='100%' height='auto'>
				</div>
				<div class="bold_name"><a href="watch_video.php?id=<?php echo ($featured_video); ?>" 
					class="feat_video_link"><?php echo ($featured_video_name); ?></a></div>
				<a class="edit_featured_video" href="channel_edit.php" style="float: right;">Edit featured video</a>
				<div class="small">From: <?php echo $channel_user; ?></div>
				<div class="small">Views: <?php echo ($curr_view_count+1); ?></div>
				<div class="small">Comments: 0</div>
				<br />
				<div class="bold_name">All Videos (<?php echo ($total_videos); ?>)</div>
				<div class="videos_container" style="overflow-x: scroll;">
					<table><tr>					
						<td class="all_videos"><div class="a_video">
							<form method='GET' action="watch_video.php">
								<div class="thumbnail">
								  <input class="thumbnail" type="image" src="images/image8-2-1024x576.png" />
								</div>
								<br>
							 </form>
							 <h3 class="h">
								<a href="watch_video.php?id=<?php echo ($featured_video); ?>" class="video_link">Video 1</a>
							 </h3>
						</div></td>
						<td class="all_videos"><div class="a_video">
							<form method='GET' action="watch_video.php">
								<div class="thumbnail">
								  <input class="thumbnail" type="image" src="images/image8-2-1024x576.png" />
								</div>
								<br>
							 </form>
							 <h3 class="h">	
								<a href="watch_video.php?id=1" class="video_link">The video that has a decently long title for the sake of testing the site's CSS</a>
							 </h3>
						</div></td>
						<td class="all_videos"><div class="a_video">
							<form method='GET' action="watch_video.php">
								<div class="thumbnail">
								  <input class="thumbnail" type="image" src="images/image8-2-1024x576.png" />
								</div>
								<br>
							 </form>
							 <h3 class="h">
								<a href="watch_video.php?id=1" class="video_link">Video 2</a>
							 </h3>
						</div></td>
						<td class="all_videos"><div class="a_video">
							<form method='GET' action="watch_video.php">
								<div class="thumbnail">
								  <input class="thumbnail" type="image" src="images/image8-2-1024x576.png" />
								</div>
								<br>
							 </form>
							 <h3 class="h">
								<a href="watch_video.php?id=1" class="video_link">Video 3</a>
							 </h3>
						</div></td>
						<td class="all_videos"><div class="a_video">
							<form method='GET' action="watch_video.php">
								<div class="thumbnail">
								  <input class="thumbnail" type="image" src="images/image8-2-1024x576.png" />
								</div>
								<br>
							 </form>
							 <h3 class="h">
								<a href="watch_video.php?id=1" class="video_link">Video 4</a>
							 </h3>
						</div></td>
						<td class="all_videos"><div class="a_video">
							<form method='GET' action="watch_video.php">
								<div class="thumbnail">
								  <input class="thumbnail" type="image" src="images/image8-2-1024x576.png" />
								</div>
								<br>
							 </form>
							 <h3 class="h">
								<a href="watch_video.php?id=1" class="video_link">Video 5</a>
							 </h3>
						</div></td>
					</tr></table>
				</div>
			</div>
		</div>	
    </main>
	<aside class="sidebar"></aside>
	
	<!-- sample php code -->
	<?php 

	?>

    <footer>
      
    </footer>

</body></html>
