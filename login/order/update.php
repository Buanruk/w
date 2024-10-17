<?php
session_start(); // เริ่มต้น session
include("connectdb.php");

// เปิดการแสดงข้อผิดพลาด (สำหรับการพัฒนา)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// ตรวจสอบการเชื่อมต่อฐานข้อมูล
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ตรวจสอบการส่งข้อมูลผ่าน POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับข้อมูลจากฟอร์ม
    $oid = $_POST['oid'];
    $sta = $_POST['sta'];

    // ตรวจสอบว่ามีค่า oid และ new_status ที่จะอัปเดตหรือไม่
    if (!empty($oid) && !empty($sta)) {
        // ป้องกัน SQL Injection
        $oid = mysqli_real_escape_string($conn, $oid);
        $sta = mysqli_real_escape_string($conn, $sta);

        // อัปเดตสถานะในฐานข้อมูล
        $sql_update = "UPDATE orders SET sta = '$sta' WHERE oid = '$oid'";

        // รันคำสั่ง SQL
        if (mysqli_query($conn, $sql_update)) {
            $_SESSION['message'] = "อัพเดทสถานะสำเร็จ"; // เก็บข้อความใน session
        } else {
            $_SESSION['message'] = "Error updating status: " . mysqli_error($conn); // ข้อความผิดพลาด
        }
    } else {
        $_SESSION['message'] = "OID หรือสถานะไม่ถูกต้อง"; // ข้อความหากไม่มีค่า
    }

    // เปลี่ยนเส้นทางกลับไปยังหน้าที่ต้องการ
    header("Location: ./view_order.php"); 
    exit(); // ออกจากสคริปต์
} else {
    echo "ไม่มีการส่งข้อมูล"; // หากไม่ใช่ POST
}

mysqli_close($conn); // ปิดการเชื่อมต่อฐานข้อมูล
?>
