<?php
session_start();
include_once("daat.php");

if (!isset($_SESSION['uid'])) {
    echo "<div style='text-align:center; margin-top:20%;'>
            <h2>โปรดเข้าสู่ระบบก่อน</h2>
            <p>กำลังไปยังหน้าล็อกอิน...</p>
            <script>
                setTimeout(function() {
                    window.location.href = '../login/indexlogin.php'; // เปลี่ยนเส้นทางไปยังหน้าล็อกอิน
                }, 3000); // รอ 3 วินาทีก่อนเปลี่ยนเส้นทาง
            </script>
          </div>";
    exit; // หยุดการทำงานของสคริปต์
}

$sql = "SELECT * FROM users WHERE u_id = '{$_SESSION['uid']}'"; // ตรวจสอบชื่อคอลัมน์ที่ถูกต้อง
$rs = mysqli_query($conn, $sql);

if ($rs) {
    $userData = mysqli_fetch_assoc($rs);
if ($userData) {
	if (isset($_POST['update'])) {
            $Name = mysqli_real_escape_string($conn, $_POST['uname']);
            $phone = mysqli_real_escape_string($conn, $_POST['phone']);
            $email = mysqli_real_escape_string($conn, $_POST['uemail']);
            $address = mysqli_real_escape_string($conn, $_POST['address']);

            $updateSql = "UPDATE users SET 
                            u_name = '$Name', 
                            phone = '$phone', 
                            u_email = '$email', 
                            address = '$address' 
                          WHERE u_id = '{$_SESSION['uid']}'";

            if (mysqli_query($conn, $updateSql)) {
                echo "<script>alert('Profile updated successfully');</script>";
				header("Location:./indexporfile.php"); // รีเฟรชกลับมาที่หน้าเดิม
                exit;
            } else {
                echo "<script>alert('Error updating profile');</script>";
            }

        }
?>
<html lang="en" data-bs-theme="auto">
  <head><script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Profile</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/checkout/">
	  
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

	<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
	  
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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
		 /* เพิ่มสไตล์สำหรับ container ให้เต็มหน้าจอ */
      .full-screen-container {
		 min-height: 80vh; /* ความสูงขั้นต่ำ 100% ของหน้าจอ */
    display: flex;
    flex-direction: column; /* จัดเรียงในแนวตั้ง */
    align-items: center; /* จัดกึ่งกลางแนวนอน */
    justify-content: center; /* จัดกึ่งกลางแนวตั้ง */
    padding: 0; /* ลบ padding เริ่มต้น */
	}
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
     }
	.img-fluid {
        margin-left: -0px; /* ปรับค่าตามที่คุณต้องการ */
    }
	.card {
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5); /* เพิ่มเงาที่กำหนดเอง */
	}
	.card {
		box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5); /* เพิ่มเงาที่กำหนดเอง */
		width: 100%;
		max-width: 1000px; /* กำหนดความกว้างสูงสุดของการ์ด */
		margin: 0 auto; /* จัดกลางการ์ดในหน้าจอ */
	}
      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="../register/checkout.css" rel="stylesheet">
  </head>
  <body class="bg-body-tertiary">
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
      <symbol id="check2" viewBox="0 0 16 16">
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
      </symbol>
      <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
      </symbol>
      <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
      </symbol>
      <symbol id="sun-fill" viewBox="0 0 16 16">
        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
      </symbol>
    </svg>
	  
<div class="container-fluid bg-muted full-screen-container">
    <main class="d-flex justify-content-center align-items-center">
        <div class="card shadow" style="width: 100%; max-width: 600px;">
            <div class="card-body">
                <h2 class="title text-center">My Profile</h2>
                <h4 class="subtitle mb-3 text-center">Request your profile information</h4>

                <form class="needs-validation" method="POST" novalidate>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="Name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="Name" name="uname" value="<?php echo htmlspecialchars($userData['u_name']); ?>" required>
                        </div>
                        <div class="col-12">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="uusername" value="<?php echo htmlspecialchars($userData['u_username']); ?>" readonly>
                        </div>
                        <div class="col-12">
                            <label for="phonenumber" class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($userData['phone']); ?>" required>
                        </div>
                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="uemail" value="<?php echo htmlspecialchars($userData['u_email']); ?>" readonly>
                        </div>
                        <div class="col-12">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" required><?php echo htmlspecialchars($userData['address']); ?></textarea>
                        </div>
                    </div>
                    <div class="my-4">
<button type="submit" name="update" class="w-100 btn btn-lg" style="border: 2px solid black; color: white; background-color: black;">
    Save Changes
</button>
                        <a href="../../U/UI.php" class="w-100 btn btn-warning btn-lg mt-2">Return to home page</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
<?php
    } else {
        echo "ไม่พบข้อมูล"; // หากไม่มีข้อมูล
    }
} else {
    echo "เกิดข้อผิดพลาดในการค้นหาข้อมูล"; // หากไม่สามารถดำเนินการ SQL ได้
}
?>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="../register/checkout.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
