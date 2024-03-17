<meta charset="utf-8">
<?php
	// $pwd="Q2ijj48vgn";
    $host="localhost";
	$user="root";
	$pwd="7ci838a!nK";
	// $pwd="";
	$db="ablerex_ups";

	$conn = mysqli_connect($host, $user, $pwd)or die("เชื่อมต่อฐานข้อมูลไม่ได้");
	mysqli_select_db($conn,$db) or die ("เลือกฐานข้อมูลไม่ได้");
	mysqli_query($conn,"SET NAMES utf8");
?>