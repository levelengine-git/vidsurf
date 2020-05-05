<!-- sidebar reused on many of the website's pages -->
<aside class="sidebar">

<?php
//if logged in...
if ($_SESSION['userName'] != null) {
	echo '<div>';
	  echo '<div class="userinfo">';
		echo '<div class="sidebar_index">';
		  echo $_SESSION['userName'];
		echo '</div>';
		echo '<div class="usericon" >';
		  echo '<img src="images/791224_man_512x512.png" style="max-width: 100%;">';
		echo '</div>';
		echo '<div class="sidebar_footer" >';
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
