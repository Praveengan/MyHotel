<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="signup.css">
    <title>Signup</title>
</head>
<body>
	<div>
		<div id="head"><h1>ಹಳ್ಳಿ ಮನೆ</h1></div>
	<div class="header">
			<ul>
			<li><a href="index.html">Home</a></li>
  			<li><a href="gallery.html">Gallery</a></li>
  			<li><a href="tarrif.php">Terms</a></li>
  			<!--<li><a href="#contact">Gallery</a></li>-->
  			<!--<li><a href="about.html">About</a></li>-->
  			<li><a href="#about">Restaurant</a></li>
  			<li><a href="feedback.php">Feedback</a></li>
			<li><a href="login.php">Sign In</a></li>
			<li><a href="signup.php" class="active">Sign Up</a></li>
			
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
			<h1>Registration Form</h1>
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
			<form action="signup.php" method="POST">
  			<input type="text" name="fname" placeholder="Fname" required>
  			<input type="text" name="lname" placeholder="Lname" required>
  			<input type="email" name="email" placeholder="Email-Id" required>
  			<input type="password" name="pass1" placeholder="Password" required minlength="6" maxlength="20">
  			<input type="password" name="pass2" placeholder="Confirm Password" required minlength="6" maxlength="15">
  			<input type="date" name="dob" placeholder="mm/dd/yy" required>
  			<!--<input type="text" name="" placeholder="Sex">-->
  			<select name="gender" required>
  				<option value=""></option>
  				<option value="male">Male</option>
  				<option value="female">Female</option>
  			</select>
  			<button type="submit">REGISTER</button>

			</form><br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="SignIn.php">Already Have an account?</a>
		</div>
	</div>
<!--<div id="footer">
	<marqee behavior="alternate" bgcolor="blue">Developped by name ;</marqee>
</div>!-->
<marquee  behaviour="alternate" bgcolor="#2d2d86" height="30px" > <b><a href="contactus.html"><font color="white" size="3">Developed by ನಟರಾಜು ಎಸ್</font></a></b></marquee>
</body>
</html>
<?php
include 'connection.php';
if (isset($_POST['fname'])&&isset($_POST['lname'])&&isset($_POST['email'])&&isset($_POST['pass1'])&&isset($_POST['pass2'])&&isset($_POST['dob'])&&isset($_POST['gender'])) {
	$Firstname = $_POST['fname'];
	$Lastname=$_POST['lname'];
	$email=$_POST['email'];
	$password=$_POST['pass1'];
	$confirm_password=$_POST['pass2'];
	$dob=$_POST['dob'];
	$sex=$_POST['gender'];
	if(!empty($Firstname)&&!empty($Lastname)&&!empty($email)&&!empty($password)&&!empty($confirm_password)&&!empty($dob)&&!empty($sex)){
		//echo "$Firstname $Lastname $email $password $confirm_password $dob $sex";
		if ($password!=$confirm_password) {
		echo "<script>
						alert('Password donto match');
						window.location.href='register.php';
						</script>";	
		}else{
		$pass = md5($password);
		$query ="SELECT email FROM Family where email='$email'" ;
		$query_run = mysqli_query($con,$query);
		$query_num_rows=mysqli_num_rows($query_run);
		if ($query_num_rows==1) {
			echo "<script>
						alert('$email is already registered');
						window.location.href='signup.php';
						</script>";	
			}else{
				$query = "INSERT INTO `Family`(`firstname`, `lastname`, `email`, `password`, `dob`, `sex`) VALUES ('$Firstname','$Lastname','$email','$pass','$dob','$sex')";
				if ($con->query($query)===TRUE) {
					echo "<script>
						alert('Account created successfully');
						window.location.href='signup.php';
						</script>";
						//sleep for 2 seconds
						sleep(2);
						header("Location:SignIn.php");
				}else{
					echo "<script>
						alert('Account created Failed');
						window.location.href='signup.php';
						</script>";
				}
			}
		}
		
	}else{
		echo "<script>
						alert('fields should not be empty');
						window.location.href='signup.php';
						</script>";
	}
}else{
	$flag = 0;
}
?>