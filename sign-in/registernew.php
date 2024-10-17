<?php
session_start();
$error_message = '';
$success_message = '';
include_once("connectdb.php"); // เชื่อมต่อฐานข้อมูล

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // รับค่าและตรวจสอบ input
    $name = trim($_POST['uname']);
    $username = trim($_POST['uusername']);
    $password = md5(trim($_POST['upassword'])); // เข้ารหัสรหัสผ่านด้วย MD5
    $phone = trim($_POST['phone']);
    $email = trim($_POST['uemail']);
    $address = trim($_POST['address']);

    // ตรวจสอบว่ามีข้อมูลหรือไม่
    if (empty($name)  || empty($username) || empty($password) || empty($email)) {
        $error_message = "กรุณากรอกข้อมูลให้ครบถ้วน!";
    } else {
        // ตรวจสอบรูปแบบอีเมล
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_message = "รูปแบบอีเมลไม่ถูกต้อง";
        } else {
            // ตรวจสอบว่ามีชื่อผู้ใช้หรืออีเมลนี้ในฐานข้อมูลหรือไม่
            $stmt = $conn->prepare("SELECT u_id FROM users WHERE u_username=? OR u_email=?");
            $stmt->bind_param("ss", $username, $email);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows > 0) {
                $error_message = "ชื่อผู้ใช้หรืออีเมลนี้ถูกใช้งานแล้ว";
            } else {
                // บันทึกข้อมูลผู้ใช้ลงฐานข้อมูล
                $stmt = $conn->prepare("INSERT INTO users (u_name, u_username, u_password, u_email, phone, address) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssss", $name, $username, $password, $email, $phone, $address);

                if ($stmt->execute()) {
                    $success_message = "สมัครสมาชิกสำเร็จ!";
                } else {
                    $error_message = "เกิดข้อผิดพลาด: " . $conn->error;
                }
            }

            $stmt->close();
        }
    }
    $conn->close();
}
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
	    body {
		background-image: url('mi/d1.jpg'); /* ใช้รูปภาพเป็นพื้นหลัง */

        body { background-color: #f8f9fa; }
        .container { max-width: 500px; margin-top: 100px; padding: 30px; border-radius: 10px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); background-color: #ffffff; }
        h2 { margin-bottom: 20px; color: #007bff; }
        .alert { margin-top: 20px; }
		
    </style>
</head>

<body>
<div class="container">
<h2 class="text-center" style="color: black;">Create Account</h2>

    <?php if (!empty($error_message)): ?>
        <div class="alert alert-danger"><?php echo $error_message; ?></div>
    <?php elseif (!empty($success_message)): ?>
        <div class="alert alert-success"><?php echo $success_message; ?>
            <br><a href="index.php">กลับสู่หน้าหลัก</a>
        </div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="uname" required>
        </div>

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="uusername" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="upassword" required>
        </div>
        <div class="form-group">

            <label for="phone">Phone</label>
            <input type="text" class="form-control" name="phone" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="uemail" required>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control" name="address" required></textarea>
        </div>
<button type="submit" class="btn btn-primary" style="background-color: black; border-color: black;">Sign Up</button>
    </form>
</div>
</body>
</html>
