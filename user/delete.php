<?php
	require_once('connection.php');
	$albumid=$_GET['albumid'];
	$query=mysqli_query($con,"DELETE from `album` where `albumid`='$albumid'");
	$fetch=mysqli_query($con,"DELETE from `uploads` where `albumid`='$albumid'");
	header('Location:album.php');
?>