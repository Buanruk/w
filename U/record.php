<?php
session_start();
include("daat.php");

// ตรวจสอบว่ามีการเข้าสู่ระบบ
if (!isset($_SESSION['uid'])) {
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=clear3.php\">";
    exit; // ออกจากสคริปต์หากไม่มีการเข้าสู่ระบบ
}

// ดึง uid ของลูกค้าจาก SESSION
$uid = $_SESSION['uid'];

// คำนวณยอดรวมการสั่งซื้อ
$total = 0; // เริ่มต้นตัวแปรยอดรวม
foreach ($_SESSION['sid'] as $pid) {
    $sum[$pid] = $_SESSION['sprice'][$pid] * $_SESSION['sitem'][$pid];
    $total += $sum[$pid];
}

// เพิ่มข้อมูลการสั่งซื้อเข้าตาราง orders
$address = $_POST['address']; // หรือดึงค่าจากที่อื่น
$status = 'default_status';
$sql = "INSERT INTO `orders` (ototal, odate, u_id, u_name, address, sta) VALUES('$total', CURRENT_TIMESTAMP, '$uid', '$u_name', '$address', '$status');";
if (mysqli_query($conn, $sql)) {
    $id = mysqli_insert_id($conn); // ดึง id ของ orders
    
    // เพิ่มข้อมูลการสั่งซื้อในตาราง orders_detail
    foreach ($_SESSION['sid'] as $pid) {
        $item = $_SESSION['sitem'][$pid]; // จำนวนที่สั่งซื้อ
        $price = $_SESSION['sprice'][$pid]; // ราคา
        $sql_detail = "INSERT INTO `orders_detail` (oid, pid, item, p_price) VALUES ('$id', '$pid', '$item', '$price')";
        mysqli_query($conn, $sql_detail);
    }
    
    // แสดงหมายเลขคำสั่งซื้อ
    echo "การสั่งซื้อเสร็จสมบูรณ์: หมายเลขสั่งซื้อ $id";
    
    // ลบข้อมูลใน session ของตะกร้า
    unset($_SESSION['sid']); 
    unset($_SESSION['sprice']);
    unset($_SESSION['sname']);
    unset($_SESSION['sdetail']);
    unset($_SESSION['spicture']);
    unset($_SESSION['sitem']);
    
    echo "<meta http-equiv=\"refresh\" content=\"0;URL=clear.php\">";
} else {
    die("เกิดข้อผิดพลาดในการสั่งซื้อ: " . mysqli_error($conn));
}

// ตรวจสอบการปิดการเชื่อมต่อ
if ($conn) {
    mysqli_close($conn);
}
?>