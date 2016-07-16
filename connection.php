<?php
$con= mysqli_connect('localhost','root','','myhotel');
	if (!$con) {
		echo mysqli_error($con);
	}
?>