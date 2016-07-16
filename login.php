<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="signup.css">
    <title>Login</title>
</head>
<body>
	<!--<div id="form">
		<font color="white"> 
		<form>
			Username:
			<input type="text" name="name"></br></br>
		    Password:&nbsp
			<input type="password" name="name"></br></br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp					
			<button type="submit" name="Login">Log-in</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" name="Signin"><a href="signup.html">Sign-up</a></button>
		</form>
	</font>

	</div>-->
	<div>
		<div id="head"><h1>ಹಳ್ಳಿ ಮನೆ</h1></div>
	<div class="header">
			<ul>
  			<li><a  href="index.html">Home</a></li>
  			<li><a href="gallery.html">Gallery</a></li>
  			<li><a href="tarrif.php">Terms</a></li>
  			<!--<li><a href="#contact">Gallery</a></li>-->
  			<!--<li><a href="about.html">About</a></li>-->
  			<li><a href="restaurant.html">Restaurant</a></li>
  			<li><a href="feedback.php">Feedback</a></li>
			<li><a class="active" href="login.php">Sign In</a></li>
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
			<h1>Welcome to ಹಳ್ಳಿ ಮನೆ</h1>
		</div>
	</div>
	<div>
		<div id="navleft">
			<ul>
			<!--<li><h2>Navigation bar</h2></li>!-->
			<li><a class="active" href="#home">Home</a></li>
			<li><a href="gallery.html">Gallery</a></li>
  			<li><a href="about.html">About</a></li>	
			<!-- <li><a href="#news">Booking</a></li>-->
  			<li><a href="tarrif.php">Terms & Conditions</a></li>
  			<li><a href="#Restaurantaurant">Restaurant</a></li>
  			<li><a href="feedback.php">Feedback</a></li>
  			<li><div id="myDIV"></div></li>
			</ul>
		</div>
		
		<div class="koti">
			<form action="admin.php" method="POST">
				<button type="submit">ADMIN</button>
			</form>
			<br><br>
			<form action="SignIn.php" method="POST">
				<button type="submit">USERS</button>
			</form>
	    </div>
	</div>
	</div>
	
<!--<div id="footer">
	<marqee behavior="alternate" bgcolor="blue">Developped by name ;</marqee>
</div>!-->
<marquee  behaviour="alternate" bgcolor="#2d2d86" height="30px" > <b><a href="contactus.html"><font color="white" size="3">Developed by ನಟರಾಜು ಎಸ್</font></a></b></marquee>
</body>
</html>
<?php
//echo md5('admin');

?>