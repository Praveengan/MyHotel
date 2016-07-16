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
			<form action="check.php" method="POST">
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
function typeCheck($tYpE,$con){
	$TyPeCheckInReservationTable = "SELECT * FROM `reservation` WHERE `typ`='$tYpE'";
	$TyPeCheckInReservationTable_Run = mysqli_query($con,$TyPeCheckInReservationTable);
	if (mysqli_num_rows($TyPeCheckInReservationTable_Run)){
		return 1;
	}else{
		return 0;
	}
}
function GetStaticRooms($Type,$con,$AorC){
	$statrooms=array();
	$x=0;
	$statroomsQuery = "SELECT * FROM `rooms` WHERE `type`='$Type'";
	$statroomsQueryRun = mysqli_query($con,$statroomsQuery);
	if (mysqli_num_rows($statroomsQueryRun)) {
		while ($Run = mysqli_fetch_array($statroomsQueryRun)) {
			$statrooms[$x] = $Run[0];
			$x++;
		}
		if ($AorC=='a') {
			return $statrooms;
		}else{
			return $x;
		}
	}
}
if (isset($_POST['type'])&&isset($_POST['from'])&&isset($_POST['to'])&&isset($_POST['room'])&&isset($_POST['person'])) {
	 $checkin = $_POST['from'];
	 $checkout = $_POST['to'];
	 $person = $_POST['person'];
	 $rooms = $_POST['room'];
	 $type = $_POST['type'];
	// echo "$type $checkin $checkout $rooms $person <br>";
	 if (!empty($checkin)&&!empty($checkout)&&!empty($person)&&!empty($rooms)&&!empty($type)) {
	 	$email = $_SESSION['$email'];
	 	$checkin = date_create("$checkin");
	 	$checkin = date_format($checkin,"Y-m-d");
	 	$checkout = date_create("$checkout");
	 	$checkout = date_format($checkout,"Y-m-d");
 		$currentDate= date("Y-m-d");
 		if ($checkin<$currentDate || $checkout<$currentDate) {
 			echo "Checkin or Checout Date Is Already Over";
 			exit();
 		}
 		if ($checkin>$checkout) {
 			echo "Checkin Date Must Be Less Than Checkout Date";
 			exit();
 		}
 		if ($checkout==$checkin) {
 			echo "Checkin and Checkout Dates cannot be the same";
 			exit();
 		}
 		$x= $rooms*3;
 		if ($person>$x &&$person>0) {
			echo "$person person(s) cannot be accomodated in $rooms room(s)";
 			exit();
 		}
 		$checked = -1;
 		//echo "checked = $checked<br>";
	 	$checked = typeCheck($type,$con);
	 	//echo "new checked after function call = $checked<br>";
	 	$totalStaticRooms = array();
	 	$statRoomCount=0;
	 	$_SESSION['guests']=$person;
	 	$_SESSION['num_room']=$rooms;
	 	$_SESSION['cin']=$checkin;
	  	$_SESSION['cout']=$checkout;
	  	$totalStaticRooms=array();
	  	$totalStaticCount=0;
	  	$totalStaticRooms=GetStaticRooms($type,$con,'a');
	  	$totalStaticCount=GetStaticRooms($type,$con,'c');

	 	if ($checked==0) {
	 		//idara artha reservation table nalli bekiro room type du modle reserve aagilla anta. Eega namge beekada room book madabahudu
	 		//$totalStaticRooms = GetStaticRooms($type,$con);
	 		/*while (isset($totalStaticRooms[$statRoomCount])) {
	 			$statRoomCount++;
	 		}*/
	 		//echo "$statRoomCount";
	 		$_SESSION['rooms']=$totalStaticRooms;
			$_SESSION['full']=$totalStaticCount;
			$_SESSION['bed']=$type;
			$Message ="Book";
	 	}else if($checked==1){
	 		//$totalStaticRooms = GetStaticRooms($type,$con);
	 		//print_r($totalStaticRooms);
	 		//echo "<br>$totalStaticCount";
	 		$i=0;
	 		$temp=array();
	 		$query="SELECT * FROM `reservation` WHERE (`checkin`<='$checkin' OR `checkin`>='$checkin') AND `typ`='$type' ORDER BY `rm_no`";
	 		$query_run = mysqli_query($con,$query);
				if (mysqli_num_rows($query_run)) {
					while ($run = mysqli_fetch_array($query_run)) {
						$tmp=array();	
						/*echo "<tr>";
						echo "<td>".$run['0']."</td>";
						echo "<td>".$run['1']."</td>";
						echo "<td>".$run['2']."</td>";
						echo "<td>".$run['3']."</td>";
						echo "<td>".$run['4']."</td>";
						*/
						$three= $run['3'];//checkin
						$four =$run['4'];//checkout
						if ($checkin>$three && $checkout>$four &&$checkin>$four) {
							//echo "ok<br>";
						}else{
								$temp[$i]=$run['2'];
								$i++;
							//echo $run['3']."olalala ".$run['4']."<br>";
						}
					/*echo "<td>".$run['5']."</td>";
					echo "<td>".$run['6']."</td>";
					echo "<td>".$run['7']."</td>";
					echo "<td>".$run['8']."</td>";
					echo "</tr>";
					*/
				}
			}
			$ReservedCount = $i;
			//print_r($temp);
			if ($ReservedCount>0) {
				$finalRoomNumbers=array();
				$finalRoomNumbers=array_diff($totalStaticRooms, $temp);
				//print_r($finalRoomNumbers);
				$FinalRoomIndex = 0;
				$y=0;
				$KonegeUldiroRooms=array();

				for ($kk=0; $kk <30 ; $kk++) { 
					if (isset($finalRoomNumbers[$kk])) {
							$KonegeUldiroRooms[$FinalRoomIndex++]=$finalRoomNumbers[$kk];
						}	
					}
					/*for ($i=0; $i <$FinalRoomIndex ; $i++) { 
						# code...
						echo "<br>$KonegeUldiroRooms[$i]<br>";
					}*/
					// checkinde 0 idru tagobahudu yakandre totalstatic count matte reserved ilde iro room ondu idre ond room kaali iddange lekka adakkagi 0 idru book madabahudu
					 $CheckIndex = $totalStaticCount-$ReservedCount;
					if (($rooms<=$CheckIndex)||$CheckIndex==0) {
						$_SESSION['rooms']=$KonegeUldiroRooms;
						$_SESSION['full']=$CheckIndex;
						$_SESSION['bed']=$type;
						$Message = "Book";
					}else{
						if ($rooms==1) {
							$Message1="Sorry $rooms Room of type $type is not available from $checkin to $checkout";
						}else{
							$Message1="Sorry $rooms Rooms of type $type are not available from $checkin to $checkout";
						}
						
					}
			}else{
				//ReservedCount sonne idre
				//Bekidanna book Madabahudu yakandre aadate ge yavdu bere rooms book aagiralla of same type
				$_SESSION['rooms']=$totalStaticRooms;
				$_SESSION['full']=$totalStaticCount;
				$_SESSION['bed']=$type;
				$Message ="Book";
			}

	 	}
	 }else{
	 	echo "All Fields Are Required";
	 }
}else{
	echo "";
}
?>
<marquee behavior=alternate bgcolor="#2d2d86"><b><i><a href=contactus1.html><font color="white">Devloped By :- ನಟರಾಜು ಎಸ್ </a></i></b></font></marquee>

<?php
if (!empty(isset($Message))) {
	?>
	<div id="reg">
	<center>
		<p> Rooms Are Available From <?php echo "$checkin To $checkout Of Type $type Click Below Link To Proceed ";?></p>
		<font color="#7c0000" size="5"><a href="book.php"><b><i><?php echo $Message; $Message="";?></i></b></a></font>
	</center>
	</div>
<?php
}
?>
<?php
if (!empty(isset($Message1))) {
	?>
	<div id="reg">
	<center>
		<font color="#7c0000" size="5"><p><b><i><?php echo $Message1; $Message1="";?></i></b></p></font>
	</center>
	</div>
<?php
}
?>