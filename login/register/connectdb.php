<?php
    $host="localhost";
	$usr="root";
	$pwd="123456789";
	$db= "user";
	

	$conn=mysqli_connect($host,$usr,$pwd) or die ("เชื่อมต่อฐานข้อมูลไม่ได้");
	mysqli_select_db($conn,$db) or die ("เชื่อมต่อฐานข้อมูลไม่ได้");
	mysqli_query($conn,"SET NAMES utf8");
?>