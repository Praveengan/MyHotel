<!DOCTYPE html>
<html>
<head>
	<title>Tariff</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="tabels.css">
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body >
	<div> 
		<div id="head"><h1>ಹಳ್ಳಿ ಮನೆ</h1></div>
		<div class="header">
			<ul><font size="4"></font>
				<li><a href="index.html">Home</a></li>
				<li><a href="gallery.html">Gallery</a></li>
				<li><a href="#Terms & Conditions" class="active">Terms</a></li>
				<li><a href="restaurant.html">Restaurant</a></li>
				<li><a href="feedback.php">Feedback</a></li>
				<li><a href="SignIn.php">SignIn</a></li>
				<li><a href="signup.php">signup</a></li>
			</ul>
		</div>
	</div>
	<div class="container">
		<div id="img">
			<img src="images/1.jpg" alt="IMG" width="100%" height="530">
		</div>
		<div class="transbox">
			<div class="aaa"><h1>TERMS & CONDITIONS</h1></div>
		</div>
	</div>
	<div>
		<div id="navleft">
			<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="gallery.html">Gallery</a></li>
				<li><a href="#Terms & Conditions" class="active">Term & Conditions</a></li>
				<li><a href="about.html">About</a></li>
				<li><a href="restaurant.html">Restaurant</a></li>
				<li><a href="feedback.php">feedback</a></li>
				<li><div id="myDIV"></div></li>
			</ul>
		</div>
		<div id="content">
			<div class="portlet">
				<div class="portlet-body">
					<div class="table-responsive">
					  <center>	
						<table class="table table-striped table-bordered table-hover" id="mytable">
							<thead>
							  <ul><font color="#7c0000" size="5"><b><i>Room Charges</i></b></font></ul>
								<tr>
									<th>ROOM</th>
									<th colspan="2">INR</th>
									<th colspan="2">USD</th>
									<th>AVAILABLE</th>
								</tr>
								<tr>
								<th>TYPE</th>
								<th>SINGLE</th>
								<th>DOUBLE</th>
								<th>SINGLE</th>
								<th>DOUBLE</th>
								<th>ROOMS</th>
								</tr>
								<tr>
								<?php
									include 'connection.php';
									$charges = "SELECT * FROM `charges` ORDER BY totrooms";
									$charges_run= mysqli_query($con,$charges);
									if (!$charges_run) {
										echo "<font color=purple size=4>Incorrect mysql select Query.</font>";
										die($charges);
									}else{
										while ($result=mysqli_fetch_array($charges_run)) {
											echo "<tr>";
											echo "<td>".$result[0]."</td>";
											echo "<td>".$result[1]."</td>";
											echo "<td>".$result[2]."</td>";
											echo "<td>".$result[3]."</td>";
											echo "<td>".$result[4]."</td>";
											echo "<td>".$result[5]."</td>";
											echo "</tr>";
										}
									}
								?>
								</tr>
							</thead>	
						</table>
					  </center>
					  <center>
					  	<table>
					  		<tr>
					  			<td>
					  				<ul type="square">
					  					<font color="#7c0000" size="4"><ul><b><i>Policies</i></b></ul></font>
					  					<ul type="disc"><font color="green">
					  						<ul>Checkin 12 hours</ul>
					  						<ul>Check out 12 hours.</ul>
											<ul>Early arrival is subject to availability.</ul>
											<ul>Goverment taxes &  VATs are applicable.</ul>
											<ul>Inr Rs.700 (usd*10) for extra person/bed.</ul>
					  					</ul>					  			
					  			   </font>	<br>				  			   
					  			   <font color="#7c0000" size="4"><ul><b><i>Reservation Cancellation</i></b></ul></font>
					  			   <ul type=disc> <font color="green">
								     <ul>If cancelled or modified upto 14 days before arrival no fees will be charged. </ul>
									 <ul>If modified , cancelled later or in case of no show, the total price of the reservation will be charged.</ul>	
									</font>	
									</ul>
									<br>
									<font color="#7c0000" size="4"><ul><b><i>Children & Extra Beds</i></b></ul></font>
									<ul type="disc"><font color="green">
										<ul>All children are welcome</ul>
										<ul>Free! One child under 8 years stays free of charge when using existing beds. </ul>
										<ul>One older child or adult is charged INR 955 per person per night in an extra bed.</ul>
										<ul>The maximum number of extra beds in a room is 1.</ul>
										<ul>Any type of extra bed or child's cot/crib is upon request and needs to be confirmed by management.</ul>
										<ul>Supplements are not calculated automatically in the total costs and will have to be paid for separately during your stay.</ul>
										<ul>Pets:Pets are allowed on request. Charges may be applicable.</ul>
										<ul>Cards accepted at this property: Visa and Mastercard</ul>
									</font>
									</ul>
									</ul>
					  			</td>
					  		</tr>
					  	</table>
					  </center>
					</div>
				</div>
			</div>
		</div>
	</div>
	<marquee  behaviour="alternate" bgcolor="#2d2d86" height="30px" > <b><a href="contactus.html"><font color="white" size="3">Developed by ನಟರಾಜು ಎಸ್</font></a></b></marquee>
</body>
</html>
					