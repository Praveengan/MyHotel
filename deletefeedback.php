
<?php
session_start();
include 'connection.php';
if(isset($_REQUEST['delete']))
  {
  	 $time=$_REQUEST['time'];
  	 $date=$_REQUEST['date'];
  	 $x="$date $time";
  	$query = "DELETE FROM `feedback` WHERE `time`='$x'";
  	$result=$con->query($query);
  	if ($result) {
  		echo "<meta http-equiv='refresh' content=0;url=adminfeedback.php>";
  	}else{
  		mysqli_error($con);
  	}
  }
//<meta http-equiv='refresh' content=2;url=booked.php>

?>									