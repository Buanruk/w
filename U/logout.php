<?php
		session_start();
		
		unset($_SESSION['uid']);
		unset($_SESSION['uname']);
		
		echo "<script>";
		echo "window.location='../U/UI.php'; ";
		echo "</script>";
?>