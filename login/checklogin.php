<?php
	session_start();	
    if (!isset($_SESSION['aid'])) {
  		echo '<p style="color:red;">' . htmlspecialchars('รอแปบน้าระบบกำลังทำงาน', ENT_QUOTES, 'UTF-8') . '</p>';
  header('Refresh: 4; URL=../indexlogin.php');
  exit;
}
?>