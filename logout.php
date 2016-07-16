<?php
include 'connection.php';
session_start();
$email=$_SESSION['$email'];
$logout = "UPDATE `Family` SET `loggedin`='0' WHERE `email`='$email';";
$logout_result = $con->query($logout);
if ($logout_result) {
	session_destroy();
	echo "Please wait...";
	echo "<meta http-equiv='refresh' content=0;url=SignIn.php>";
}else{
	echo mysqli_error($con);
}
?>