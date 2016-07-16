<?php
include 'connection.php';
session_start();
$email=$_SESSION['admin'];
$logout = "UPDATE `admin` SET `loggedin`='0' WHERE `admin_main`='$email';";
$logout_result = $con->query($logout);
if ($logout_result) {
	session_destroy();
	echo "Please wait...";
	echo "<meta http-equiv='refresh' content=0;url=login.php>";
}else{
	echo mysqli_error($con);
}
?>