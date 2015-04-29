<?php
session_start();
if (!empty($_SESSION['user']['SnapID'])) {
   header("Location:user/");
}

?>
<html>
<head>
	<title>SnapBuzz-Registration Page</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php
	require_once('connection.php');
		if (isset($_POST['submit'])) {
			$snapId=rand(1000,9999).time();
			$name=$_POST['name'];
			$email=$_POST['email'];
			$mobile=$_POST['mobile'];
			$password=$_POST['password'];
			$enc_password=sha1($password);
			$avatar="profile.png";
			$sql = mysqli_query($con,"INSERT INTO `snapbuzz`.`Users` (`SnapID`, `name`, `email`, `password`, `mobile`,`avatar`) VALUES ('$snapId', '$name', '$email', '$enc_password', '$mobile', 'avatar.png')");
			if($sql){
				echo "<script type='text/javascript'>alert('Thank you for Registration.Registration Successfull!');</script>";
			}
		
		}
	?>
	<form method="post">

	<h1>Registration Form</h1>
		<input type="text" name="name" placeholder="Name"><br>
		<input type="text" name="email" placeholder="Email"><br>
		<input type="text" name="mobile" placeholder="Mobile"><br>
		<input type="password" name="password" placeholder="Password"><br><br>
		<input type="submit" name="submit" value="Submit"><br><br>
		<a href="login.php">Already a Member?Sign In</a>
	</form>
</body>
</html>