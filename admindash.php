<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="signup.css">
    <link rel="stylesheet" type="text/css" href="tabels.css">
    <title>DashBoard</title>
    <?php
session_start();
$email = $_SESSION['admin'];
if (empty($_SESSION['admin'])) {
	echo "<meta http-equiv='refresh' content=0;url=login.php>";	
}
?>
</head>
<body>
	<div>
		<div id="head"><h1>ಹಳ್ಳಿ ಮನೆ</h1></div>
	<div class="header">
			<ul>
			<li><a href="admindash.php" class="active">DashBoard</a></li>
			<li><a href="adminfeedback.php">Feedbacks</a></li>
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
					</div>
				</div>
			</div>
		</div>
	</div>
	<div>
		<div class="header">
		<form action="admindash.php" method="POST">
		<ul>
			<li><select name="room_type" required>
				<option value="">Select Room Type</option>
				<option value="suite">suite</option>
				<option value="standard">standard</option>
				<option value="delux">delux</option>
				<option value="Super Delux">Super Delux</option>
			</select></li>
			<li><input type="number" name="singlebdr" min="1100" placeholder="Enter Single bed Amount" required></input></li>
			<li><input type="number" name="doublebdr" min="1100" placeholder="Enter Double bed Amount" required></input></li>
			<li><button type="sumit">UPDATE</button></li>
		</ul>
		</form>
	    </div>
	</div>
	<?php
	include 'connection.php';
	error_reporting(E_ALL & ~E_NOTICE);
		if (isset($_POST['room_type'])&&isset($_POST['singlebdr'])&&isset($_POST['doublebdr'])) {
			$type=$_POST['room_type'];
			$single=$_POST['singlebdr'];
			$double=$_POST['doublebdr'];
				if (!empty($type)&&!empty($single)&&!empty($double)) {
					 $singleusd = floor($single/70);
					 $doubleusd = floor($double/70); 
					 //echo "$singleusd <br> $doubleusd";
					 $update = "UPDATE `charges` SET `inrsbr`=$single,`inrdbr`=$double,`usdsbr`=$singleusd,`usddbr`=$doubleusd WHERE `type`='$type';";
					 $update_run = $con->query($update);
					 if ($update_run) {
					 	echo "<script>;
	 					alert('Success');
	 				 	</script>";
	 				 	echo "<meta http-equiv='refresh' content=0;url=admindash.php>";
					 }else{
					 	echo mysqli_error($con);
					 }
				}
		}

	?>
<marquee behavior=alternate bgcolor="#2d2d86"><b><i><a href=contactus.html><font color="white">Devloped By :- ನಟರಾಜು ಎಸ್ </a></i></b></font></marquee>
</body>
</html>