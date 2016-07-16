<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="signup.css">
    <title>Feedback</title>
</head>
<body>

	<div>
		<div id="head"><h1>ಹಳ್ಳಿ ಮನೆ</h1></div>
	<div class="header">
			<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="gallery.html">Gallery</a></li>
				<li><a href="tarrif.php">Terms</a></li>
				<li><a href="about.html">About</a></li>
				<li><a href="feedback.php" class="active">Feedback</a></li>
				<li><a href="login.php">Sign In</a></li>
				<li><a href="signup.php">Sign Up</a></li>
			</ul>
	</div>
	</div>
	<div class="container">
	<div class="img">
		<img src="images/1.jpg" alt="IMAGE" width=100% height=530>
	</div>
	<div class="transbox">
		<div id="aaa">
			<h1>User Feedback</h1>
		</div>
	</div>
	<div class="selector">
		<div id="navleft">
			<ul>
			<li><a href="index.html">Home</a></li>
			<li><a href="gallery.html">Gallery</a></li>
  			<li><a href="about.html">About</a></li>	
  			<li><a href="#news">Booking</a></li>
  			<li><a href="tarrif.html">Terms</a></li>
  			<li><a href="#Restaurant">Restaurant</a></li>
  			<li><a class="active" href="feedback.html">Feedback</a></li>
  			<li><div id="myDIV"></div></li>
			</ul>
		</div>
		<div id="reg">
			<form action="feedback.php" method="POST">
  			<input type="text" name="fname" placeholder="Fname" required >
  			<input type="text" name="lname" placeholder="Lname" required>
  			<input type="email" name="email" placeholder="Email-Id" required>
  			<input type="number" name="phone" pattern=".{10,10}" placeholder="Phone number" required title="Enter valid phone number" required>
  			<textarea name="msg" rows="4" cols="50" placeholder="Feedback..."></textarea>
  			<button type="submit">SUBMIT</button>
			</form>
		</div>
	</div>
<!--<div id="footer">
	<marqee behavior="alternate" bgcolor="blue">Developped by name ;</marqee>
</div>!-->
</body>
</html>
<?php
include 'connection.php';
if (isset($_POST['fname'])&&isset($_POST['lname'])&&isset($_POST['email'])&&isset($_POST['msg'])) {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$msg = $_POST['msg'];
	if (!empty($fname)&&!empty($lname)&&!empty($phone)&&!empty($email)&&!empty($msg)) {
		if (strlen($phone)<=13 &&ctype_digit($phone)) {
			date_default_timezone_set('Asia/Kolkata');
					$date = date('Y-m-d H:i:s');
					$clock=date('H:i:s');
					$feed = "INSERT INTO feedback VALUES('$date','$fname','$lname','$phone','$email','$msg','$clock')";
					if ($con->query($feed)===TRUE) {
						echo "<script>
							alert('Feedback sent successfully');
							window.location.href='feedback.php';
						</script>";	
     				}else{
					echo "<script>
						alert('".$email." is not registerd with us');
						window.location.href='feedback.php';
						</script>";	
					}
				}else{echo "<script>
						alert('".$phone." is not a valid phone number');
						window.location.href='feedback.php';
						</script>";

					}		
	}else{
		echo "<script>
						alert('fields should not be empty');
						window.location.href='feedback.php';
						</script>";
		}
	}
?>
<marquee behavior=alternate bgcolor="#2d2d86"><b><i><a href=contactus.php><font color="white">Devloped By :- ನಟರಾಜು ಎಸ್ </a></i></b></font></marquee>