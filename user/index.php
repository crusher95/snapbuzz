<?php
session_start();
if (empty($_SESSION['user']['SnapID'])) {
   header("Location:../index.html#prettyPhoto[iframes]/0/");
}
?>
<div style="text-align:center;margin-top:50px;font-family:arial;font-size:20px;">
	Congrats!
	<?php
	echo $_SESSION['user']['name'];
	?><br>
	You've Benn Successfully Entered<br>
	In The<br>
	System<br>
	<a href="dashboard.php" target="_blank">Visit DashBoard</a>
</div>