<?php
$error_message = '';
$success_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$name = trim($_POST['name']);
    $username = trim($_POST['username']);
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
    $email = trim($_POST['email']);

    // เชื่อมต่อกับฐานข้อมูล
    $conn = new mysqli('localhost', 'root', '', 'shoponline2');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // ตรวจสอบความซ้ำซ้อนของชื่อผู้ใช้
    $stmt = $conn->prepare("SELECT id FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $error_message = "ชื่อผู้ใช้นี้ถูกใช้งานแล้ว กรุณาเลือกชื่อผู้ใช้อื่น";
    } else {
        // ตรวจสอบความซ้ำซ้อนของอีเมล
        $stmt = $conn->prepare("SELECT id FROM users WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $error_message = "อีเมลนี้ถูกใช้งานแล้ว กรุณาใช้ email อื่น";
        } else {
            // SQL สำหรับเพิ่มข้อมูล
            $stmt = $conn->prepare("INSERT INTO users (name, username, password, email) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $name, $username, $password, $email);

            if ($stmt->execute()) {
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
<title> Create account </title>
 <style>
        fieldset {
            text-align: center;
        }
		
		.container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: left; /* จัดตำแหน่งข้อความให้กลาง */
        }
        img {
            height: auto; /* รักษาสัดส่วนของรูปภาพ */
            
			
        }
		
    </style>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
<!-- Custom CSS -->
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
        display: flex;
        flex-direction: column;
        align-items: left;
        justify-content: center;
        height: auto; /* Adjusted to auto */
        padding: 30px;
    }
    h2 {
        margin-bottom: 20px;
        color: #007bff;
    }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }
    .alert {
        margin-top: 20px;
    }
    img {
        width: 40%; /* Full width */
        height: auto; /* Maintain aspect ratio */
        border-radius: 10px; /* Rounded corners */
        margin-bottom: 2px; /* Space below the image */
        
    }
</style>

</head>

<body>
 
<div class="container">
<img src="images/1.png" alt="Description of image" style="margin-bottom: px;">
<h2 class="text-center">Create account</h2>

        <?php if (!empty($error_message)): ?>
            <div class="alert alert-danger">
                <?php echo $error_message; ?>
            </div>
        <?php elseif (!empty($success_message)): ?>
            <div class="alert alert-success">
                <?php echo $success_message; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
        <div class="form-group">
                <label for="username">Your name</label>
                <input type="text" class="form-control" name="name" required>
          </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
        
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <!-- Button (Double) -->
         <button type="submit" class="btn btn-primary ">Sign Up</button>
        
        <button type="reset" class="btn btn-warning ">Cancel</button>
        <button type="button" onClick="window.print();" class="btn btn-dark">Print This Page</button>
    </form>

<!-- PHP for handling form submission -->

</body>
</html>
