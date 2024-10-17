<?php
session_start(); // เริ่มต้น session

// เชื่อมต่อกับฐานข้อมูล
$conn = new mysqli('localhost', 'root', '', 'shop1');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['Submit'])) {
    $username = trim($_POST['uusername']);
    $password = trim($_POST['upassword']); // ไม่ต้องเข้ารหัสที่นี่

    // ตรวจสอบชื่อผู้ใช้และรหัสผ่าน
    $sql = "SELECT * FROM users WHERE u_username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        // ตรวจสอบรหัสผ่าน
        if (md5($password) === $data['u_password']) { // ใช้ MD5
            $_SESSION['uid'] = $data['u_id'];
            $_SESSION['uname'] = $data['u_name'];
            echo "<script>window.location='../U/UI.php';</script>";
        } else {
            echo "<script>alert('Username หรือ Password ไม่ถูกต้อง');</script>";
        }
    } else {
        echo "<script>alert('Username หรือ Password ไม่ถูกต้อง');</script>";
    }

    $stmt->close();
}
?>

<!doctype html>
<html lang="th">
<head>
    <script src="../../m/assets/js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles -->
    <style>
        body {
            background-image: url('mi/d1.jpg'); /* ใช้รูปภาพเป็นพื้นหลัง */
            background-size: cover; /* ปรับขนาดภาพให้พอดีกับหน้าจอ */
            background-position: center; /* จัดตำแหน่งภาพให้อยู่กึ่งกลาง */
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-signin {
            background-color: #FFFFFF; /* เปลี่ยนพื้นหลังฟอร์มเป็นสีขาว */
            padding: 50px;
            width: 450px;
            border-radius: 12px;
            box-shadow: 0 4px 30px rgba(255, 255, 255, 0.5); /* เปลี่ยนเงาเป็นสีขาว */
            text-align: center;
        }

        .form-signin h1 {
            color: #333;
            margin-bottom: 30px;
        }

        .form-floating label {}

        .form-floating input {
            border: 2px solid #000000;
            border-radius: 8px;
            padding: 12px;
            height: 50px;
            font-size: 1rem;
            color: #333;
            transition: border-color 0.2s ease;
        }

        .form-floating input:focus {
            border-color: #000000;
            outline: none;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
        }

        .btn-primary {
            background-color: #000000;
            border-color: #000000;
            color: #FFFFFF;
            border: none;
            padding: 12px 20px;
            border-radius: 25px;
            font-size: 1.1rem;
            width: 100%;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-primary:hover {
            background-color: #000000;
        }

        .form-check-label {
            color: #000000;
        }

        .logo-img {
            width: 160px;
            height: auto;
            margin-bottom: 20px;
        }

        p.copyright {
            font-size: 0.9rem;
            margin-top: 40px;
            color: #000000;
        }
    </style>
</head>
<body>
<main class="form-signin">
    <form method="post" action="">
        <img class="mb-4" src="logo/V.png" alt="Logo" width="180" height="172">
        <h1 class="h3 mb-3 fw-normal">Sign in User</h1>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="uusername" placeholder="Username" autofocus required>
            <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" name="upassword" placeholder="Password" required>
            <label for="floatingPassword">Password</label>
        </div>
		
        <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">Remember me</label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit" name="Submit">Login</button>
		
        <div class="container-fluid-start my-3">
           <div class="container-fluid-start my-3 text-start">
    <a class="navbar-brand" href="registernew.php" style="color: black; text-decoration: none;">Register</a>
</div>
        </div>
    </form>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
