<?php
    include_once("../checklogin.php");

    // เชื่อมต่อฐานข้อมูล
    $servername = "localhost";
    $username = "root"; 
    $password = ""; 
    $dbname = "shop1"; 

    // สร้างการเชื่อมต่อ
    $conn = new mysqli($servername, $username, $password, $dbname);

    // ตรวจสอบการเชื่อมต่อ
    if ($conn->connect_error) {
        die("เชื่อมต่อฐานข้อมูลล้มเหลว: " . $conn->connect_error);
    }

    $message = ""; // ตัวแปรสำหรับเก็บข้อความแจ้งเตือน

    if (isset($_POST['Submit'])) {
        // ตรวจสอบว่ามีการป้อนรหัสและชื่อประเภทสินค้า
        if (!empty($_POST['ptid']) && !empty($_POST['ptname'])) {
            // รับค่าจากฟอร์ม
            $ptid = mysqli_real_escape_string($conn, $_POST['ptid']);
            $ptname = mysqli_real_escape_string($conn, $_POST['ptname']);
            
            // เพิ่มข้อมูลประเภทสินค้า
            $sql = "INSERT INTO `product_type` (`pt_id`, `pt_name`) VALUES ('$ptid', '$ptname');";
            
            if (mysqli_query($conn, $sql)) {
                $message = "เพิ่มประเภทสินค้าสำเร็จ"; // ตั้งค่าข้อความเมื่อเพิ่มสำเร็จ
            } else {
                $message = "เกิดข้อผิดพลาดในการเพิ่มประเภทสินค้า: " . mysqli_error($conn);
            }
        } else {
            $message = "กรุณากรอกรหัสและชื่อประเภทสินค้า"; // ตั้งค่าข้อความเมื่อกรอกข้อมูลไม่ครบ
        }
    }

    // ปิดการเชื่อมต่อฐานข้อมูลถ้า $conn ไม่ใช่ null
    if ($conn) {
        mysqli_close($conn);
    }
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>VETA - เพิ่มประเภทสินค้า</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400;700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Noto Sans Thai', sans-serif;
        }

        .container {
            margin-top: 100px;
            padding: 20px;
            width: 100%;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: bold;
        }

        .btn {
            font-size: 1rem;
            padding: 8px;
            border-radius: 5px;
        }

        .btn-primary, .btn-danger, .btn-secondary {
            width: 100px;
            margin-right: 10px;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            font-size: 1.2rem;
            display: block;
            margin: 0 auto;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-light fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="../product/indexproduct.php">VETA</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link" href="../product/indexproduct.php">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../order/view_order.php">Order</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../user/user_list.php">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../category/indextype.php">Category</a>
                        </li>
                    </ul>
                    <div class="dropdown text-end">
                        <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle" style="font-size: 32px;"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end"> 
                            <li>
                                <a style="display: block; text-align: center;"><?=$_SESSION['aname'];?></a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <h1>เพิ่มประเภทสินค้า</h1>
        <form method="post" action="">
            <div class="mb-3">
                <label for="ptid" class="form-label">รหัสประเภทสินค้า</label>
                <input type="text" name="ptid" id="ptid" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="ptname" class="form-label">ชื่อประเภทสินค้า</label>
                <input type="text" name="ptname" id="ptname" class="form-control" required>
            </div>
            
            <hr>
            
            <div class="mb-3 d-flex">
                <button type="submit" name="Submit" class="btn btn-primary flex-grow-1 me-2">
                    <i class="bi bi-floppy"></i> เพิ่ม
                </button>
                
                <button type="reset" name="Reset" class="btn btn-danger flex-grow-1 me-2">
                    <i class="bi bi-x-circle"></i> ยกเลิก
                </button>
                
                <a href="indextype.php" class="btn btn-secondary flex-grow-1">
                    <i class="bi bi-arrow-left"></i> กลับ
                </a>
            </div>
        </form>

        <?php if ($message): ?>
            <div class="alert alert-info">
                <?= $message; ?>
            </div>
        <?php endif; ?>
    </div>

<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
