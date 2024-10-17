<?php
session_start(); // เริ่มต้น session
include_once("daat.php"); // เชื่อมต่อฐานข้อมูล

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // แปลงเป็นจำนวนเต็มเพื่อป้องกัน SQL Injection

    // สร้าง SQL query เพื่อลบข้อมูล
    $sql = "DELETE FROM users WHERE u_id = $id";

    // ดำเนินการลบข้อมูล
    if (mysqli_query($conn, $sql)) {
        // หากลบสำเร็จ
        $_SESSION['message'] = "ลบข้อมูลผู้ใช้เรียบร้อยแล้ว"; // ตั้งค่าข้อความใน session
        header("Location: user_list.php"); // Redirect ไปยังหน้าข้อมูลลูกค้า
        exit(); // หยุดการทำงานของโค้ดหลังจากการ redirect
    } else {
        // หากลบไม่สำเร็จ
        echo "เกิดข้อผิดพลาดในการลบ: " . mysqli_error($conn);
    }
} else {
    echo "ไม่พบ ID ของผู้ใช้!";
}

mysqli_close($conn);
?>
