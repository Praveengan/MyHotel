<?php
session_start();
include 'connection.php';
if(isset($_REQUEST['cancell']))
  {
  	$_REQUEST['id'];
  	$query = "DELETE FROM `reservation` WHERE `id`=".$_REQUEST['id']."";
  	$result=$con->query($query);
  	if ($result) {
  		echo "<meta http-equiv='refresh' content=0;url=booked.php>";
  	}else{
  		mysqli_error($con);
  	}
  }
//<meta http-equiv='refresh' content=2;url=booked.php>

?>									