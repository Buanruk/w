<?php
session_start();
if (isset($_SESSION['sid'])) {
    // ลบเฉพาะข้อมูลในตะกร้า
    unset($_SESSION['sid']); 
    unset($_SESSION['sprice']);
    unset($_SESSION['sname']);
    unset($_SESSION['sdetail']);
    unset($_SESSION['spicture']);
    unset($_SESSION['sitem']);
    
    echo "ลบสินค้าในตะกร้าเรียบร้อยแล้ว";
} else {
    echo "ซื้อสินค้าเสร็จสิ้น";
}

echo "กำลังกลับหน้าหลัก กรุณารอสักครู่....";
echo "<meta http-equiv=\"refresh\" content=\"2;URL=UI.php\">";
?>
