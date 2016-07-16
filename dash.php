<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="signup.css">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery.min.js"></script>
<link rel="stylesheet" href="css/jquery-ui.css"/>
<?php
session_start();
//echo $_SESSION['$email'];
if (empty($_SESSION['$email'])) {
	echo "<meta http-equiv='refresh' content=0;url=SignIn.php>";	
}
?>
<script src="js/jquery-ui.js"></script>
		  <script>
				  $(function(){
			$('#from').datepicker({
				defaultDate:new Date(),
				changeMonth:true,
				changeYear:true,
				numberOfMonths:1,
				onClose:function(selectedDate){
					$('#to').datepicker("option","minDate",selectedDate);
					$('#from').datepicker("option", "dateFormat",'yy-mm-dd');
				}
			});
			
			$('#to').datepicker({
				defaultDate:new Date(),
				changeMonth:true,
				changeYear:true,
				numberOfMonths:1,
				onClose:function(selectedDate){
					$('#from').datepicker("option","maxDate",selectedDate);
					$('#to').datepicker("option", "dateFormat",'yy-mm-dd');
				}
			});
			
		});
		  </script>
</head>
<body>
<div>
	<div id="head"><h1>ಹಳ್ಳಿ ಮನೆ</b></h1></div>
	<div class="header">
			<ul>
			<li><a class="active" href="#Dashboard">Dashboard</a></li>
  			<li><a href="booked.php">Booked</a></li>
  			<li><a href="tarrif1.php">Terms</a></li>
  			<li><a href="logout.php">Logout </a></li>
  			<font size="6" color="yellow"><p><?php echo " Welcome ".$_SESSION['$email']."";?></p></font>
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
			<h1>Room Availability</h1>
		</div>
	</div>
	<div class="selector">
		<div id="navleft">
			<ul>
			<li><a class="active" href="#Dashboard">Dashboard</a></li>
			<li><a href="booked.php">Booked</a></li>
  			<li><a href="tarrif1.php">T&C</a></li>	
  			<li><a href="logout.php">Logout</a></li>
  			<li><div id="myDIV"></div></li>
  			<li><div id="myDIVI"></div></li>
			</ul>
		</div>
		<div id="reg">
			<form action="dash.php" method="POST">
				<label for="type">Type Of Room</label>
				<select name="type" id="type" required>
					<option value="">Select a type of room</option>
					<option value="standard">standard</option>
					<option value="delux">delux</option>
					<option value="Super Delux">Super Delux</option>
					<option value="suite">suite</option>
				</select>
  				<br><br>
  				<label for="from">Check-In-Date</label>
				<input class="date" id="from" type="text" value="DD/MM/YY" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'DD/MM/YY';}" name="from" required />
				<br><br>
				<label for="to">Check-Out-Date</label>	
				<input class="date" id="to" type="text" value="DD/MM/YY" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'DD/MM/YY';}" name="to" required />
  				<br><br>
  				<label for="rooms">Number Of Rooms</label>
  				<select name=room id="rooms" required>
					<option value=""></option>
					<option value="1">1</option>
					<option value="2">2</option>	
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>
				<br><br>
				<label for="persron">Guests</label>
				<input type="number" id="person" name="person" min="0" placeholder="Maximum 3 Adults Per Room" required></input><br><br>
  				<button type="submit">CHECK</button>
			</form>
		</div>
	</div>
</body>
</html>
<?php
include 'connection.php';
error_reporting(E_ALL & ~E_NOTICE);
$email= $_SESSION['$email'];
if (isset($_POST['from'])&&isset($_POST['to'])&&isset($_POST['person'])&&isset($_POST['room'])&&isset($_POST['type'])) {
	 $checkin = $_POST['from'];
	 $checkout = $_POST['to'];
	 $person = $_POST['person'];
	 $rooms = $_POST['room'];
	 $type = $_POST['type'];
	 if (!empty($checkin)&&!empty($checkout)&&!empty($person)&&!empty($rooms)&&!empty($type)) {
	 	$x= $rooms*3;
	 	if ($person<=$x &&$person>0) {
	 		date_default_timezone_set('Asia/Kolkata');
	 		$checkin = date_create("$checkin");
	 		$checkin = date_format($checkin,"Y-m-d");
	 		$checkout = date_create("$checkout");
	 		$checkout = date_format($checkout,"Y-m-d");
	 		$date = time();
	 		$your_date = strtotime("$checkin");
	 		$datediff = $date -$your_date;
	 		$mm= floor($datediff/(60*60*24));
	 		if (floor($datediff/(60*60*24))>0) {
	 			echo "<script>
						alert('this $checkin date is already over');
						window.location.href='dash.php';
						</script>";
	 		}else if(floor($datediff/(60*60*24))<=0){
	 			if ($checkin==$checkout) {
	 				echo "<script>;
	 				alert('checkin and checkout cannot be on the same dates');
	 				window.locaton.href='dash.php'
	 				 </script>";
	 				exit();
	 			}
	 			 $_SESSION['guests']=$person;
	 			 $_SESSION['num_room']=$rooms;
	 			 $_SESSION['cin']=$checkin;
	  			 $_SESSION['cout']=$checkout;
	 			 $query="SELECT * FROM `reservation` WHERE `typ`='$type'";
	  			 $run = mysqli_query($con,$query);
				 if(mysqli_num_rows($run)>0){
					$check = "SELECT * FROM `reservation` where `typ`='$type' AND (`checkin`>='$checkin' AND `checkout`<='$checkout') ORDER BY `rm_no`";
					$run_check = mysqli_query($con,$check);
			if (mysqli_num_rows($run_check)==0) {
				//date match aaglilla andre
				$empty= "SELECT * FROM `rooms` where `type`='$type'";
				$empty_run = mysqli_query($con,$empty);
				//echo "<center>";
				//echo "<ul>1</ul>";
				//echo "<table border = 1>";
				echo "<ul><font color='#7c0000' size='4'><b><i>Rooms are available from $checkin to $checkout.Click here to <a href='book.php'>BOOK</a></i></b></font></ul>";
				//echo "<tr><th>Room_no</th></tr>";
				$l = 0;
				$list_of_empty_rooms=array();
					while ($fina_avl_rooms=mysqli_fetch_array($empty_run)) {
					//	echo "<tr>";
						$list_of_empty_rooms[$l]=$fina_avl_rooms['room_no'];
					//echo "<td>".$fina_avl_rooms['room_no']."</td>";
					//	echo"</tr>";
						$l++;
					}
					//echo "</table>";
					//echo "</center>";
					$_SESSION['rooms']=$list_of_empty_rooms;
					$_SESSION['full']=$l;
					$_SESSION['bed']=$type;
					//echo json_encode($list_of_empty_rooms);
					//echo "<ul><a href='book1.php'> lalle</a></ul>";
					echo mysqli_error($con);
			}else{//date type iddu match aaglilla andre
				$check1 = "SELECT * FROM `reservation` where `typ`='$type' AND (`checkin`>='$checkin' AND `checkout`<='$checkout') ORDER BY rm_no";
				$run_check1 = mysqli_query($con,$check1);
				$i=0;
				$array=array();
			while($res_check = mysqli_fetch_array($run_check1)) {
				 $array[$i]=$res_check['rm_no'];
				$i++;
			}$y=$i;
			$array=array_unique($array);
			//echo "$checkin<br>$checkout<br>";
				$y=0;
				$array1=array();
			for ($k=0;$k<$i;$k++) { 
				if (isset($array[$k])) {
					$array1[$y++]=$array[$k];
					//echo $array[$k]."$k<br>";
				}
			}
			/*for ($i=0; $i <$y ; $i++) { 
					echo $array1[$i]."<br>";
			}*/
			//echo "$y $i $k";	
			$avl_rooms ="SELECT * FROM `rooms` WHERE `type`='$type'";
			$run_avl_rooms=mysqli_query($con,$avl_rooms);
			if (mysqli_num_rows($run_avl_rooms)>0) {
				//echo "$y shh";
				
					/*
						idu tappu. eradakinna jasti date and type match aadre repetative print aagatte
						yakandre if conditon nalli iro if condition sari illa
					while ($final_avl_rooms=mysqli_fetch_array($run_avl_rooms)) {
						echo "<tr>";
						for ($k=0; $k < $y; $k++) {
							echo $array[$k]."jj<br>". $final_avl_rooms['room_no']." <br>"; 
							if ($array[$k]!=$final_avl_rooms['room_no']) {
								echo "<td>".$final_avl_rooms['room_no']."sha</td>";
							}
							echo"</tr>";
						}
					}*/
					$list = array();
					$li=0;
					while($final_avl_rooms=mysqli_fetch_array($run_avl_rooms)){
						$list[$li]=$final_avl_rooms['room_no'];
						$li++;
					}
					$m=0;
					$yapp_room=array();
					for ($i=0; $i <$li ; $i++) { 
							if($m<$y){
								if ($array1[$m]==$list[$i]) {
									//echo $list[$i];
									$list[$i]=0;
								}
							}else{
								break;
							}$m++;
					}$m=0;
					
					if ($rooms<=$li-$y) {
						echo "<center>";
				//echo "<ul>2</ul>";
				//echo "<table border=1>";
				echo "<ul><font color='#7c0000' size='4'><b><i>Rooms are available from $checkin to $checkout.Click here to <a href='book.php'>BOOK</a></i></b></font></ul>";
				//echo "<tr><th>Room_no</th></tr>";
						$m=0;
						for ($i=0; $i <$li ; $i++) {
						//echo "<tr>"; 
							if($list[$i]!=0){
								 $yapp_room[$m]=$list[$i];
								 $m++;
								//echo "<td>".$list[$i]."</td>";
							}
					//echo "</tr>";	
						
					}
					echo "</table>";
					echo "</center>";
					/*for ($i=0; $i <$m ; $i++) { 
							echo $yapp_room[$i].' lalle'."<br>";
						}*/
					$_SESSION['rooms']=$yapp_room;
				//	$_SESSION['full']=$li;
					$_SESSION['bed']=$type;
					//echo " $li $y $rooms";
					}else{
						echo "<center>";
						if($rooms>1){
						echo "Sorry "; 
						echo "<b><i>$rooms</b><i>";
						echo " rooms of type "; 
						echo "<b><i>$type</b><i>";
						echo " is currently unavialble from";
						echo "<b><i>$checkin</b><i> to "; 
						echo "<b><i>$checkout</b><i>";
					}else{
							echo "Sorry "; 
						echo "<b><i>$rooms</b><i>";
						echo " room of type "; 
						echo "<b><i>$type</b><i>";
						echo " is currently unavialble from";
						echo "<b><i>$checkin</b><i> to "; 
						echo "<b><i>$checkout</b><i>";
						}
						echo "</center>";
					}
				}else{
					echo mysqli_error($con);
				}	
			}
		}else{//type illa andre
			echo mysqli_error($con);
			$query1 = "SELECT * FROM `rooms` WHERE `type`='$type'";
			$run = mysqli_query($con,$query1);
			if (mysqli_num_rows($run)>0) {
			//echo "<center>";
			//echo "<ul>3</ul>";
			//echo "<table border = 1>";
			 echo "<ul><font color='#7c0000' size='4'><b><i>Rooms are available from $checkin to $checkout.Click here to <a href='book.php'>BOOK</a></i></b></font></ul>";
			//echo "<tr><th>Room_no</th></tr>";
			$list_of_empty_rooms= array();
			$l=0;
				while($res = mysqli_fetch_array($run)) {
					//echo "<tr>";
					$list_of_empty_rooms[$l] = $res['room_no'];
					//echo "<td>".$res['room_no']."</td>";
					//echo "</tr>";
					$l++;
				}		
				$_SESSION['full'] = $l;
				$_SESSION['rooms'] = $list_of_empty_rooms;	
				$_SESSION['bed']=$type;
			//echo "</table>";
			//echo "</center>";
				}
		}

	 		}
	 	}else{
	 		echo "<script>";
	 		if ($rooms==1) {
	 			echo "alert('$rooms room is not sufficient for $person persons');";
	 		}else{
					echo "alert('$rooms rooms are not sufficient for $person persons');";	
				}	echo "window.location.href='dash.php';
						</script>";
	 	}

	 }else{
	 		echo "<script>
						alert('All fields are required');
						window.location.href='dash.php';
						</script>";
	 }
}
?>
	<marquee behavior=alternate bgcolor="#2d2d86"><b><i><a href=contactus1.html><font color="white">Devloped By :- ನಟರಾಜು ಎಸ್ </a></i></b></font></marquee>