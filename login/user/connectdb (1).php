<?php
    $host = "localhost";
	$usr = "root";
	$pwd ="123456789";
	$db = "shop1";
	
	$conn = mysqli_connect($host, $usr ,$pwd) or die ("เชื่อมต่อข้อมูลไม่ได้");
	mysqli_select_db($conn,$db) or die ("เลือกฐานข้อมูลนั้นไม่ได้");
	mysqli_query($conn,"SET NAMES utf8");
?>
	