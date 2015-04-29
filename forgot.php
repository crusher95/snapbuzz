<html>
<head>
	<title>SnapBuzz-Login Page</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="background:#fff">
	<?php
	if (isset($_POST['submit'])) {
		require_once('connection.php');
		$email=$_POST['email'];
		$select=mysqli_query($con,"SELECT * from Users where email=$email");
		$rows=mysqli_num_rows($select);
		if ($rows>0) {
			echo "Corer";
		}
		$fetch=mysqli_fetch_assoc($select);
	}
	?>
	<form action="" method="post">

	<h1>Forgot Password</h1>
	<br>
		<input type="input" name="email" placeholder="Enter the Email Address"><br><br>
		<input type="submit" name="submit" value="Submit"><br><br>
		<a href="register.php">New Here?Sign Up</a>
	</form>
</body>
</html>