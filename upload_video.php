<!-- login page -->
<!-- based off: https://vidsurf.glitch.me/index.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Vidsurf - upload videos</title>
    <link rel="stylesheet" href="css/upload_video.css?ts=<?=time()?>">
	<link rel="stylesheet" href="css/header.css?ts=<?=time()?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="images/jquery.min.js.download"></script>
  </head>
  <body>

	<?php
		include("header.php");
		
		if(isset($_POST['upload_video'])) {
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
			else {
				echo("Connected!<br />");
			}

			$videoName = $_POST['videoTitle'];			
			$videoDescription = $_POST['videoDescription'];			

			$filePath = $_FILES["videoFile"]["name"];			
			$pathParts = pathinfo($filePath);
			
			$fileName = $pathParts["filename"];
			$videoExt = $pathParts["extension"];

			$category = $_POST['category'];

			$userId = $_SESSION['userId'];
			
			// videos directory...
			$videos_dir = "videos/";
			$videoFile = $target_dir . "" . $fileName;
			
			if(move_uploaded_file($_FILES['videoFile']['tmp_name'], $videoFile)) {
				// add the video to DB
				$query_add_video = "INSERT INTO videos (video_id, video_name, video_description, file_name, 
					video_extension, video_file, date_uploaded, uploader, category)
					VALUES (".($result->num_rows+1).", '$videoName', '$videoDescription', '$fileName', 
					'$videoExt', '$videoFile', '2020-05-01', '$userId', '$category' )";

				if ($conn->query($query_add_video) === TRUE) {
					echo "New record created successfully.";
				} else {
					echo "Error: " . $query_add_video . "<br>" . $conn->error;
				}
			}
			
			//require("index.php");
		}
	?>

	<div class="top"></div>

	<div class="uploadWindow">
		<div class="leftSide">
			<div class="heading">
				<b>Upload Video</b>
			</div>
			
			<form class="form-upload" method='POST' enctype="multipart/form-data">
				<div class="uploader">
					<table>
					<tr>
						<td><label><strong>Video file to upload </strong></label></td>
					</tr>
					<tr>
						<td><input class="form-control" type="file" name="videoFile" accept="video/*" required/></td>
					</tr>					
					<tr>
						<td><label><strong>Title</strong></label></td>
					</tr>
					<tr>
						<td><input class="form-control" type="text" name="videoTitle" required/></td>
					</tr>
					<tr>
						<td><label><strong>Description</strong></label></td>
					</tr>
					<tr>
						<td><textarea class="form-control" rows="6" cols="50" name="videoDescription"></textarea></td>						
					</tr>
					<tr>
						<td><label><strong>Category</strong></label></td>
					</tr>
					<tr>
						<td>
						<select class="form-control" name="category">
							<option value="">- select a category -</option>
							<option value="Howto">Howto & Style</option>
							<option value="Pets">Pets & Animals</option>
							<option value="Travel">Travel</option>
							<option value="Education">Education</option>
							<option value="Nonprofits">Nonprofits & Activism</option>
							<option value="Entertainment">Entertainment</option>
							<option value="Film">Film</option>
							<option value="Comedy">Comedy</option>
							<option value="Science">Science</option>
							<option value="News">News</option>
							<option value="Music">Music</option>
							<option value="Gaming">Gaming</option>
							<option value="Autos">Autos & Vehicles</option>
							<option value="Technology">Technology</option>
							<option value="Sports">Sports</option>
						</select>
						</td>
					</tr>
					</table>
				</div>
				<br />
				<input type="submit" name="upload_video" value="Upload" />
			</form>
		</div>
		<div class="rightSide">
			<div class="heading">
				<b>About uploading</b>
			</div>
			uppladibgfifibfibinkhfgjfgkjuppladibgfifibfibinkhfgjfgkjuppladibgfifibfibinkhfgjfgkj
			djjjjjjjjjjjjjjjjjjjjjjdjdjdjdjdjdjdjdjdjdjdjdjdjdjdjdjdjdjdjdjdjdjdj
			ddjdjdjdjdjdjdjdjdjdjdjdjdjdjdjdjdjdjdjdjdjdjdjddjdjdjdjdjdjdjdjdjdjdjdjdjdjdj
			djdjdjdjdjdjdjdj
			</form>
		</div>
	</div>

    <aside class="ads">
      
    </aside>
    <footer>
      
    </footer>

</body>
</html>
