<!DOCTYPE html>
<head>
	<meta charset="utf-8"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="signup.css">
    <title>Admin- SignIn</title>
</head>
<body>
	<div>
		<div id="head"><h1>ಹಳ್ಳಿ ಮನೆ</h1></div>
	<div class="header">
			<ul>
			<li><a href="index.html">Home</a></li>
			<li><a href="gallery.html">Gallery</a></li>
			<li><a href="tarrif.html">Terms</a></li>
			<li><a href="#about">Restaurant</a></li>
			<li><a href="feedback.php">Feedback</a></li>
			<li><a class="active" href="login.php">SignIn</a></li>
			<li><a href="signup.php">Signup</a></li>
			</ul>
	</div>
	</div>
	<div class="container">
	<div class="img">
		<img src="images/1.jpg" alt="IMAGE" width=100% height=530>
	</div>
	</div>
	<div class="transbox">
		<div id="aaa">
			<h1>SignIn</h1>
		</div>
	</div>
	<div class="selector">
		<div id="navleft">
			<ul>
			<li><a href="index.html">Home</a></li>
			<li><a href="gallery.html">Gallery</a></li>
  			<li><a href="about.html">About</a></li>	
  			<!--<li><a href="#news">Booking</a></li>-->
  			<li><a href="tarrif.php">Terms</a></li>
  			<li><a href="#Restaurant">Restaurant</a></li>
  			<li><a href="feedback.php">Feedback</a></li>
  			<li><div id="myDIV"></div></li>
			</ul>
		</div>
		<div id="reg">
			<form action="admin.php" method="POST">
  			<input type="email" name="email" placeholder="Email-Id" required>
  			<input type="password" name="password" placeholder="Password" required>
  			<button type="submit" name="">Sign In</button>
			</form><br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="3">New user? register <a href="signup.php"><b>Here</b></a></font>
		</div>
	</div>
	</div>

<!--<div id="footer">
	<marqee behavior="alternate" bgcolor="blue">Developped by name ;</marqee>
</div>!-->
</body>
</html>

<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
include 'connection.php';
if (isset($_POST['email'])&&isset($_POST['password'])){
	 $email = $_POST['email'];
	 $password =$_POST['password'];
	if (!empty($email)&&!empty($password)) {
		$pass=md5($password);
		$query  ="SELECT * FROM admin WHERE admin_main='$email' AND admin_pass='$pass';";
		$result = mysqli_query($con,$query);
		if (mysqli_num_rows($result)>0) {
				$_SESSION['admin']=$email;
					$loggedin=mysqli_fetch_array($result);
					if ($loggedin['loggedin']==0) {

					// num of loggedin accnts
					
					//$num_of_loggedin="SELECT * FROM `Family` WHERE `loggedin`=1;";
					//$num_of_loggedin_run=mysqli_query($con,$num_of_loggedin);
					//echo mysqli_num_rows($num_of_loggedin_run);
					
					//num of loggedin accnts ends here

						$update_login = "UPDATE `admin` SET `loggedin`='1' WHERE `admin_main`='$email';";
						$update_login_result=$con->query($update_login);
						//echo "$update_login_result lalle";
						if ($update_login_result) {
							header("location:admindash.php");
						}else{
							echo "<script>
						alert('something went wrong');
						window.location.href='admin.php';
						</script>";
						}
						
					}else{
							echo "<script>
						alert('You are already logged in');
						window.location.href='admin.php';
						</script>";
					}							
		}else{
			echo "<script>
						alert('Sorry Email id/Password donot match');
						window.location.href='admin.php';
						</script>";
		}
	}else{
		echo "<script>
						alert('fields should not be empty');
						window.location.href='admin.php';
						</script>";
	}
}else{
	
}
?>
<marquee behavior=alternate bgcolor="#2d2d86"><b><i><a href=contactus.php><font color="white">Devloped By :- ನಟರಾಜು ಎಸ್ </a></i></b></font></marquee>