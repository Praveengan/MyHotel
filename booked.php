<!DOCTYPE html>
<html>
<head>
	<title>Booking</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="tabels.css">
	<link rel="stylesheet" type="text/css" href="booked.css">
	 <?php
session_start();
//echo $_SESSION['$email'];
if (empty($_SESSION['$email'])) {
	echo "<meta http-equiv='refresh' content=0;url=SignIn.php>";	
}
?>
</head>
<body >
	<div> 
		<div id="head"><h1>ಹಳ್ಳಿ ಮನೆ</h1></div>
		<div class="header">
		<ul>
			<li><a href="check.php">Dashboard</a></li>
  			<li><a class="active" href="booked.php">Booked</a></li>
  			<li><a href="tarrif1.php">Terms</a></li>
  			<li><a href="logout.php">Logout</a></li>
			<font size="6" color="yellow"><p><?php echo " Welcome ".$_SESSION['$email']."";?></p></font>
		</div>
	</div>
	<div class="container">
		<div id="img">
			<img src="images/1.jpg" alt="IMG" width="100%" height="530">
		</div>
		<div class="transbox">
			<div class="aaa"><h1>ORDER DETAILS</h1></div>
		</div>
	</div>
	<div>
		<?php
		include 'connection.php';
		$email=$_SESSION['$email'];
		date_default_timezone_set('Asia/Kolkata');
		$current_date=date('Y-m-d');
		//$email = $_SESSION['email'];
		
		$old_orders = "SELECT * FROM `reservation` WHERE `email`='$email' AND `checkin`<'$current_date' AND `checkout`<'$current_date' ORDER BY `id`;";
		$run_old_orders=mysqli_query($con,$old_orders);
		if (mysqli_num_rows($run_old_orders)>0) {
			echo "<div id='content'>
			<div class='portlet'>
				<div class='portlet-body'>
					<div class='table-responsive'>
					  <center>	
					  <ul></ul>
						<table class='table table-striped table-bordered table-hover' id='mytable'>
							<thead>
							  <ul><font color='#7c0000' size='5'><b><i>Previous Bookings</i></b></font></ul>
								<tr>
								<th>Id</th>
								<th>Checkin time</th>
								<th>Checkout time</th>
								<th>Type</th>
								<th>Bed</th>
								<th>Price</th>
								</tr>";
								$total=0;
								while ($old_orders_room=mysqli_fetch_array($run_old_orders)) {
									echo "<tr>";
									echo "<td>".$old_orders_room['id']."</td>";
									echo "<td>".$old_orders_room['checkin']."</td>";
									echo "<td>".$old_orders_room['checkout']."</td>";
									echo "<td>".$old_orders_room['typ']."</td>";
									echo "<td>".$old_orders_room['bedtype']."</td>";
									if ($old_orders_room['sprice']!=0) {
										$total+=$old_orders_room['sprice'];
										echo "<td>".$old_orders_room['sprice']."</td>";
									}else{
										$total+=$old_orders_room['dprice'];
										echo "<td>".$old_orders_room['dprice']."</td>";
										}
									echo "</tr>";
								}
							echo "</thead>	
						</table>
					  </center>
					</div>
				</div>
			</div>
		</div>";
		echo "<center><p><font size='6' color='#7c0000'>Total Amount paid is $total</font></p></center><br><br>";
		}else{
			//echo "<center><p><font size='6' color='#7c0000'>No Previous Bookings</font></p></center>";
		}
		//$old_orders = "SELECT * FROM `reservation` WHERE `email`='$email' AND `checkin`>='$current_date' AND `checkout`>='$current_date' AND `checkin`<`checkout`;";
		$old_orders = "SELECT * FROM `reservation` WHERE `email`='$email' AND `checkout`>='$current_date' AND `checkin`<`checkout`;";
		$run_old_orders=mysqli_query($con,$old_orders);
		if (mysqli_num_rows($run_old_orders)>0) {
			echo "<div id='content'>
			<div class='portlet'>
				<div class='portlet-body'>
					<div class='table-responsive'>
					  <center>	
					  <ul></ul>
						<table class='table table-striped table-bordered table-hover' id='mytable'>
							<thead>
							  <ul><font color='#7c0000' size='5'><b><i>Current Bookings</i></b></font></ul>
							  	<font color='yellow'>
								<tr>
								<th>Id</th>
								<th>Checkin time</th>
								<th>Checkout time</th>
								<th>Type</th>
								<th>Bed</th>
								<th>Price</th>
								<th>Room Cancellation</th>
								</tr> 
								<?font>";
								$total=0;
								while ($old_orders_room=mysqli_fetch_array($run_old_orders)) {
									echo "<tr>";
									echo "<td>".$old_orders_room['id']."</td>";
									echo "<td>".$old_orders_room['checkin']."</td>";
									echo "<td>".$old_orders_room['checkout']."</td>";
									echo "<td>".$old_orders_room['typ']."</td>";
									echo "<td>".$old_orders_room['bedtype']."</td>";
									if ($old_orders_room['sprice']!=0) {
										$total+=$old_orders_room['sprice'];
										echo "<td>".$old_orders_room['sprice']."</td>";
									}else{
										$total+=$old_orders_room['dprice'];
										echo "<td>".$old_orders_room['dprice']."</td>";
										}
									echo "<th><form action='deleterooms.php' method='POST'>
										<button type='submit' value='Cancell Bookings' name='cancell' >Cancell Booking</input>
										<input type='hidden' name=id value=".$old_orders_room['id']."> </input>
										</form></th>";
									echo "</tr>";
								}
							echo "</thead>	
						</table>
					  </center>
					</div>
				</div>
			</div>
		</div>";
		echo "<center><p><font size='6' color='#7c0000'>Total Amount paid is $total</font></p></center>";
		}else{
			//echo "<center><p><font size='6' color='#7c0000'>No Previous Bookings</font></p></center>";
		}
		

		?>
	</div>
  <marquee  behaviour="alternate" bgcolor="#2d2d86" height="30px" > <b><a href="contactus1.html"><font color="white" size="3">Developed by:- ನಟರಾಜು ಎಸ್</font></a></b></marquee>
 </body>
</html>
