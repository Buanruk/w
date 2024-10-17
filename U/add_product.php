<?php
// เชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root"; // ชื่อผู้ใช้ทั่วไปใน XAMPP
$password = ""; // รหัสผ่านว่าง
$dbname = "shop_db";


$conn = new mysqli($servername, $username, $password, $dbname);

// เช็คการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $p_name = $_POST['p_name'];
    $p_detail = $_POST['p_detail'];
    $p_price = $_POST['p_price'];
    $p_picture = $_POST['p_picture'];
    $p_type = $_POST['p_type'];

    // สร้างคำสั่ง SQL
    $sql = "INSERT INTO product (p_name, p_detail, p_price, p_picture, p_type) VALUES ('$p_name', '$p_detail', '$p_price', '$p_picture', '$p_type')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New product added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>เพิ่มสินค้า</title>
</head>
<body>
    <h2>เพิ่มสินค้า</h2>
    <form method="POST" action="">
        <label for="p_name">Product Name:</label><br>
        <input type="text" id="p_name" name="p_name" required><br>
        
        <label for="p_detail">Description:</label><br>
        <textarea id="p_detail" name="p_detail" required></textarea><br>
        
        <label for="p_price">Price:</label><br>
        <input type="number" id="p_price" name="p_price" required><br>
        
        <label for="p_picture">Picture URL:</label><br>
        <input type="text" id="p_picture" name="p_picture" required><br>
        
        <label for="p_type">Type ID:</label><br>
        <input type="number" id="p_type" name="p_type" required><br><br>
        
        <input type="submit" value="Add Product">
    </form>
</body>
</html>
