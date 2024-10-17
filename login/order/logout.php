<?php
session_start();


// ลบข้อมูลเซสชันสำหรับ uid และ uname
unset($_SESSION['aid']);
unset($_SESSION['aname']);

// เปลี่ยนเส้นทางไปยังหน้าล็อกอิน
header("Location: ../../login/indexlogin.php");
exit(); // ออกจากสคริปต์เพื่อให้แน่ใจว่าการเปลี่ยนเส้นทางจะทำงานได้
?>
