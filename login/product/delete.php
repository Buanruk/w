<?php
include_once("checklogin.php");
include_once("connectdb.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // แปลง ID เป็นตัวเลขเพื่อความปลอดภัย

    // ดึงชื่อไฟล์ภาพเพื่อลบ
    $sql = "SELECT p_picture FROM product WHERE p_id = $id";
    $result = mysqli_query($conn, $sql);
    
    if ($row = mysqli_fetch_assoc($result)) {
        $ext = $row['p_picture'];
        $filePath = "images/" . $id . '.' . $ext;

        // ลบไฟล์ภาพถ้ามี
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

    // ลบข้อมูลจากฐานข้อมูล
    $sqlDelete = "DELETE FROM product WHERE p_id = $id";
    if (mysqli_query($conn, $sqlDelete)) {
        echo "<script>alert('ลบสินค้าสำเร็จ'); window.location='indexproduct.php';</script>";
    } else {
        echo "<script>alert('ลบสินค้าไม่สำเร็จ'); window.location='indexproduct.php';</script>";
    }
} else {
    echo "<script>alert('ไม่มี ID สินค้า'); window.location='indexproduct.php';</script>";
}

mysqli_close($conn);
?>