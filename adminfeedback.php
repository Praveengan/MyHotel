<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="booked.css">
    <link rel="stylesheet" type="text/css" href="tabels.css">
    <title>Feedback</title>
    <?php
session_start();
$email = $_SESSION['admin'];
if (empty($_SESSION['admin'])) {
	echo "<meta http-equiv='refresh' content=0;url=login.php>";	
}?>
</head>
<body>
	<div>
		<div id="head"><h1>ಹಳ್ಳಿ ಮನೆ</h1></div>
	<div class="header">
			<ul>
			<li><a href="admindash.php">DashBoard</a></li>
			<li><a class="active" href="adminfeedback.php">Feedbacks</a></li>
			<li><a href="adminlogout.php">Sign Out</a></li>
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
			<h1>Admin Panel</h1>
		</div>
	</div>
	<div>
		<div id="content">
			<div class="portlet">
				<div class="portlet-body">
					<div class="table-responsive">
					  <center>	
						<table class="table table-striped table-bordered table-hover" id="mytable">
							<thead>
							  <ul><font color="#7c0000" size="5"><b><i>Room Charges</i></b></font></ul>
								<tr>
								<th>TIME</th>
								<th>FIRSTNAME</th>
								<th>LASTNAME</th>
								<th>EMAIL</th>
								<th>PHONE-NO</th>
								<th>MESSAGE</th>
								<th>DELETE</th>
								</tr>
								<tr>
								<?php
									include 'connection.php';
									$charges = "SELECT * FROM `feedback` ORDER BY 'time';";
									$charges_run= mysqli_query($con,$charges);
									if (!$charges_run) {
										echo "<font color=purple size=4>Incorrect mysql select Query.</font>";
										die($charges);
									}else{
										while ($result=mysqli_fetch_array($charges_run)) {
											echo "<tr>";
											echo "<td>".$result['time']."</td>";
											$time=$result['clock'];
											echo "<td>".$result['firstname']."</td>";
											echo "<td>".$result['lastname']."</td>";
											echo "<td>".$result['email']."</td>";
											echo "<td>".$result['mobileno']."</td>";	
											echo "<td>".$result['message']."</td>";
											echo "<th><form action='deletefeedback.php' method='POST'>
												<button type='submit' value='Cancell Bookings' name='delete' >Delete</input>
												<input type='hidden' name=time value=".$time."> </input>
												<input type='hidden' name=date value=".$result['time']."> </input>
												</form></th>";
											echo "</tr>";
										}
									}
								?>
								</tr>
							</thead>	
						</table>
					  </center>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div>
<marquee behavior=alternate bgcolor="#2d2d86"><b><i><a href=contactus.html><font color="white">Devloped By :- ನಟರಾಜು ಎಸ್ </a></i></b></font></marquee>
</body>
</html>