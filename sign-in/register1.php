<?php
session_start();
$error_message = '';
$success_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['uname']);
    $username = trim($_POST['uusername']);
    $password = md5(trim($_POST['upassword'])); // เข้ารหัสรหัสผ่านด้วย MD5
    $email = trim($_POST['uemail']);

    // เชื่อมต่อกับฐานข้อมูล
    $conn = new mysqli('localhost', 'root', '', 'shop1');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // ตรวจสอบความซ้ำซ้อนของชื่อผู้ใช้
    $stmt = $conn->prepare("SELECT u_id FROM users WHERE u_username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $error_message = "ชื่อผู้ใช้นี้ถูกใช้งานแล้ว กรุณาเลือกชื่อผู้ใช้อื่น";
    } else {
        // ตรวจสอบความซ้ำซ้อนของอีเมล
        $stmt = $conn->prepare("SELECT u_id FROM users WHERE u_email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $error_message = "อีเมลนี้ถูกใช้งานแล้ว กรุณาใช้ email อื่น";
        } else {
            // SQL สำหรับเพิ่มข้อมูล
            $stmt = $conn->prepare("INSERT INTO users (u_name, u_username, u_password, u_email) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $username, $password, $email);

            if ($stmt->execute()) {
                // ดึง u_id ของผู้ใช้ที่เพิ่งสมัคร
                $uid = $conn->insert_id; // ดึง id ของผู้ใช้ที่เพิ่งถูกเพิ่ม

                // เก็บ uid ไว้ในเซสชัน
                $_SESSION['uid'] = $uid;

                $success_message = "สมัครสมาชิกสำเร็จ!";
            } else {
                $error_message = "เกิดข้อผิดพลาด: " . $conn->error;
            }
        }
    }

    $stmt->close();
    $conn->close();
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Create Account</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<style>
    body {
        background-color: #f8f9fa;
    }
    .container {
        max-width: 500px;
        margin-top: 100px;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        background-color: #ffffff;
    }
    h2 {
        margin-bottom: 20px;
        color: #007bff;
    }
    .alert {
        margin-top: 20px;
    }
</style>
</head>

<body>
<div class="container">
<h2 class="text-center">Create Account</h2>

<?php if (!empty($error_message)): ?>
    <div class="alert alert-danger">
        <?php echo $error_message; ?>
    </div>
<?php elseif (!empty($success_message)): ?>
    <div class="alert alert-success">
        <?php echo $success_message; ?>
        <!-- ลิงก์ไปยังหน้าอื่นหลังจากสมัครสมาชิกสำเร็จ -->
        <br><a href="index.php">ไปที่หน้าหลัก</a>
    </div>
<?php endif; ?>

<form method="POST" action="">
    <div class="form-group">
        <label for="username">Your Name</label>
        <input type="text" class="form-control" name="uname" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="uemail" required>
    </div>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="uusername" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="upassword" required>
    </div>
    <button type="submit" class="btn btn-primary">Sign Up</button>
</form>
</div>
</body>
</html>