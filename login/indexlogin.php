<?php
	session_start();
	include_once("connectdb.php");
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
}
    text-align: center;
}


        .form-signin h1 {
            color: #333;
            margin-bottom: 30px;
        }

        .form-floating label {
           /* color: #b8860b;*/
        }

        .form-floating input {
            border: 2px solid #000000;
            border-radius: 8px;
            padding: 12px;
            height: 50px;
            font-size: 1rem;
            /*background-color: #f8f8f8;*/
            color: #333;
            transition: border-color 0.2s ease;
        }

        .form-floating input:focus {
            border-color: #000000;
            outline: none;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5); /* เปลี่ยนเงาเป็นสีดำ */
}
        }

        .form-floating input:focus ~ label {
            color: #000000;
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
    color: #000000; /* เปลี่ยนสีข้อความเป็นสีดำ */
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
        <div style="text-align: center;">
    <img src="./images/logo.png" width="180" height="172">
    <h1 class="h3 mb-3 fw-normal">Sign in Admin</h1>
</div>


        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="ausername" placeholder="Username" autofocus required>
            <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" name="apassword" placeholder="Password" required>
            <label for="floatingPassword">Password</label>
        </div>
		
      <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">จำฉันไว้</label>
        </div>
       <button class="btn btn-primary w-100 py-2" type="submit" name="Submit">เข้าสู่ระบบ</button> 
       <div class="container-fluid-start my-3">
           <div class="container-fluid-start my-3 text-start">
    <a class="navbar-brand" href="/w/U/UI.php" style="color: black; text-decoration: none;">Go Home</a>

</div>
        </div>
	
		
		
        <p class="copyright">&copy; 2024 </p>
    </form>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	
<?php
if (isset($_POST['Submit'])) {
    $sql = "SELECT * FROM admin WHERE a_username =  '{$_POST['ausername']}' AND a_password = '" . md5($_POST['apassword']) . "'";
    $rs = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($rs);

    if ($num > 0) {
        $data = mysqli_fetch_array($rs);
        $_SESSION['aid'] = $data['a_id'];
        $_SESSION['aname'] = $data['a_name'];
        echo "<script>window.location='./product/indexproduct.php';</script>";
    } else {
        echo "<script>alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง');</script>";
        exit;
    }
}
?>
</body>
</html>
