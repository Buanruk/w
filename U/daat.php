<meta charset="utf-8">
<?php
$host = "localhost";
$usr = "root";
$pwd = "123456789";
$dbName = "shop1";

$conn = mysqli_connect($host, $usr, $pwd , $dbName) or die ("เชื่อมต่อฐานข้อมูลไม่ได้") ;
mysqli_select_db($conn, $dbName) ;
mysqli_query($conn, "set names utf8");
?>