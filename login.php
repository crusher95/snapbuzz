<?php
session_start();
if (!empty($_SESSION['user']['SnapID'])) {
   header("Location:user/");
}

?>
<html>
<head>
	<title>SnapBuzz-Login Page</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body style="background:#fff">
	<form action="" method="post">
<?php
	if (isset($_POST['submit'])) {
				require_once('connection.php');
				$email=$_POST['email'];
                $password=$_POST['password'];
                $encrypt_password=sha1($password);
                echo $encrypt_password;
                $query=mysqli_query($con,"SELECT * from Users where email='$email' and password='$encrypt_password'");
                $count=mysqli_num_rows($query);
                if($count==1){
                    $fetch=mysqli_fetch_assoc($query);
                    unset($fetch['password']);
                    $_SESSION['user']=$fetch;
                    header('Location: user/index.php');
                }
                else{
                    echo "<p style='color:red'>Sorry Wrong Password or Email!!</p>";
                }

	}
?>
	<h1>Login Form</h1>
		<input type="input" name="email" placeholder="Email"><br>
		<input type="password" name="password" placeholder="Password"><br><br>
		<input type="submit" name="submit" value="Submit"><br><br>
		<a href="forgot.php">Forgot Password?</a>
		<br>
		<a href="register.php">New Here?Sign Up</a>
	</form>
</body>
</html>