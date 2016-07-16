<!DOCTYPE html>
<html>
<head>
	<title>Bookings</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="dash.css">
    <link rel="stylesheet" type="text/css" href="tabels.css">
    <?php
session_start();
//echo $_SESSION['$email'];
if (empty($_SESSION['$email'])) {
	echo "<meta http-equiv='refresh' content=0;url=SignIn.php>";	
}
?>
</head>
<body>
<div>
		<div id="head"><h1>Halli Restaurant</h1></div>
	<div class="header">
			<ul>
  			<li><a href="dash.php">Dashboard</a></li>
  			<li><a class="active" href="#book.php">Book</a></li>
  			<li><a href="tarrif1.php">Terms</a></li>
  			<li><a href="logout.php">Logout</a></li>
  			<font size="6" color="yellow"><p><?php echo $_SESSION['$email'];?></p></font>
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
			<h1>Welcome to Halli Restaurant</h1>
		</div>
	</div>
		<div id="lalle">
<?php
    $cin= $_SESSION['cin'];
	$cout=$_SESSION['cout'];
    $type=$_SESSION['bed'];
    $rooms=$_SESSION['num_room'];
    $guests=$_SESSION['guests'];
    echo "<div id='content'>
			<div class='portlet'>
				<div class='portlet-body'>
					<div class='table-responsive'>";
    echo "    <center>
    	<table class='table table-striped table-bordered table-hover' id='mytable>
    	<thead>
    		<tr>
    			<th colspan='2'>Reservation For</th>
    			<th>Check_In-Date</th>
    			<th>Check_In-Date</th>
    			<th>Type Of Room</th>
    			<th>Number of Rooms</th>
    			<th>Number of Guests</th>
    		</tr>
    		<tr>
    			<td>$cin</td>
    			<td>$cout</td>
    			<td>$type</td>
    			<td>$rooms</td>
    			<td>$guests</td>
    		</tr>
    		</thead>
    	</center>	
    	</table> 
    </div> </div> </div> </div>";
    ?>
    <div class="selector">
    	<div id="reg">

   <table width='100%' border='0'>
    <form action='book.php' id='form1' name='form1' method='POST'>
            <tr>
              <th width='10%' height='19' align='center' bgcolor='#CCCCCC'><strong>Room No</strong></th>
              <th width='10%' align='center' bgcolor='#CCCCCC'><strong> Bed</strong></th>
              <!--<th width="37%" align="center" bgcolor="#CCCCCC"><strong> Social</strong></th>-->
            </tr>
<?php
include 'connection.php';
//session_start();
//ini_set('display_errors','off'); this completly hides error message;
error_reporting(E_ALL & ~E_NOTICE);
$guru = array();
$guru = $_SESSION['rooms'];
$total = $_SESSION['full'];
$bed = $_SESSION['bed'];
$rooms = $_SESSION['num_room'];
$cin= $_SESSION['cin'];
$cout=$_SESSION['cout'];
//echo "$bed";
/*
SUITE -queen/twin
super delux	Twin /double
delux double Twin /double
standard single/twin
*/
//echo " rooms = $total<br> bed type =$bed<br>";
$a = array('single','double' );
$j=0;
//ee portion nalli prati room du duddu tagotini charges table inda
$hana=array();
$duddu = "SELECT * FROM `charges` WHERE `type`='$bed';";
if ($duddu_query_run=mysqli_query($con,$duddu)) {
	$kaasu=mysqli_fetch_array($duddu_query_run);
		$singleinr=$kaasu['inrsbr'];
		$doubleinr=$kaasu['inrdbr'];
		$singleusa=$kaasu['usdsbr'];
		$doubleusa=$kaasu['usddbr'];
}
//echo "$singleinr $singleusa $doubleinr $doubleusa";
//duddu lekka hakiddu aytu
for ($i=0; $i < $rooms; $i++) { 
	//echo "sha $guru[$i]<br>";
	            echo "
	            <tr>
              <td><input type='radio' name=$guru[$i] id='ckb' value=$guru[$i] required/>
                <label for=$guru[$i]></label><font color='#7c0000'>$guru[$i]</font></td>
                <td>
                	<select name=$j required>
						<option value=''></option>
						<option value='$a[0]'>single ($singleinr rs)</option>
						<option value='$a[1]'>double ($doubleinr rs)</option>
					</select>
				</td>
              			<td>&nbsp;</td>
            		  <td>&nbsp;</td>
           		 </tr>";	
       $room_num[$i] = $_POST[$guru[$i]];
       $bed_type[$i] =$_POST[$j];
      $j++;
}
$email = $_SESSION['$email'];


$x=0;
$suc =0;
for($i=0;$i<$rooms;$i++){
	if (isset($room_num[$i])&&isset($bed_type[$i])) {
		if (!empty($bed_type[$i])&&!empty($room_num[$i])) {
			if ($bed_type[$i]=='single') {
				$query = "INSERT INTO `reservation` VALUES('','$email','$room_num[$i]','$cin','$cout','$bed','$bed_type[$i]','$singleinr','')";
			}else{
							$query = "INSERT INTO `reservation` VALUES('','$email','$room_num[$i]','$cin','$cout','$bed','$bed_type[$i]','','$doubleinr')";
			}
			if($con->query($query)===TRUE){
				$suc+=1;
			}else{
				echo mysqli_error($con)." sha<br>";
			}
		}else{
			echo "<script>
			alert('All fields are required');
			window.location.href='book.php';	
		</script>";
		}
	}else{
		// illi bekidre values set aagilla anta torsu bekidre
	}
	//echo "$room_num[$i]  $bed_type[$i]<br>";
}
if ($suc==$rooms) {
unset($_SESSION['rooms']);
unset($_SESSION['full']);
unset($_SESSION['bed']);
unset($_SESSION['num_room']);
unset($_SESSION['cin']);
unset($_SESSION['cout']);
		echo "<script>
			alert('Success');
			window.location.href='check.php';	
		</script>";
		//header( "refresh:2; url=dash.php" );
}else{
	echo mysqli_error($con);
}
?>
<center>
	<tr>
		<td>
			<button type="submit" class="btn" name="book">BOOK</button>
		</td>
	</tr>
</center>
       </form>
    </table>
	</div>
	</div>
	</div>
	</div>
	</div>
    </div>
	  </div>
<marquee  behaviour="alternate" bgcolor="#2d2d86" height="30px" > <b><a href="contactus.html"><font color="white" size="3">Devloped By :- ನಟರಾಜು ಎಸ್</font></a></b></marquee>
</body>
</html>