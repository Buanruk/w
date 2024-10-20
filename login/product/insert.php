<?php
	include_once("../checklogin.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>VETA</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400;700&display=swap" rel="stylesheet">
    <script src="../assets/js/color-modes.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    
	<style>
        body {
            background-color: #f8f9fa; /* พื้นหลังที่อ่อนนุ่ม */
            font-family: 'Noto Sans Thai', sans-serif;
        }

        .container {
            margin-top: 100px;
            padding: 20px; /* เพิ่ม padding เพื่อไม่ให้เนื้อชิดขอบ */
            width: 100%; /* ทำให้ความกว้างเต็มหน้าจอ */
            max-width: 600px; /* กำหนดความกว้างสูงสุด */
            margin-left: auto; /* จัดกลาง */
            margin-right: auto; /* จัดกลาง */
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: bold;
        }
		.btn {
        font-size: 1rem; /* ขนาดตัวอักษร */
        padding: 8px; /* ขนาด padding */
        border-radius: 5px; /* มุมมน */
    }
	 .btn-primary, .btn-danger,  .btn-secondary {
        width: 100px;
        margin-right: 10px;
    }
	
		.btn-danger{
            background-color: #dc3545; /* สีแดง */
            border: none;
            font-size: 1.2rem; /* ปรับขนาดตัวอักษรของปุ่ม */
            display: block; /* ทำให้ปุ่มอยู่ตรงกลาง */
            margin: 0 auto; /* จัดกลาง */
        }
		 .btn-secondary {
        background-color: #6c757d; /* สีเทา */
        border: none; /* ไม่มีกรอบ */
		font-size: 1.2rem; /* ปรับขนาดตัวอักษรของปุ่ม */
            display: block; /* ทำให้ปุ่มอยู่ตรงกลาง */
            margin: 0 auto; /* จัดกลาง */
    }

        .btn-primary {
            background-color: #007bff; /* ปรับสีปุ่มหลัก */
            border: none;
            font-size: 1.2rem; /* ปรับขนาดตัวอักษรของปุ่ม */
            display: block; /* ทำให้ปุ่มอยู่ตรงกลาง */
            margin: 0 auto; /* จัดกลาง */
        }
.btn:hover {
        opacity: 0.9; /* ลดความโปร่งใสเมื่อ hover */
    }

	</style>
</head>
<body>
    <header data-bs-theme="dark">
        <nav class="navbar navbar-expand-md navbar-light fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="../product/indexproduct.php">VETA</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" 
                        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
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
                            <a class="nav-link" href="../po1/user_list.php">Users</a>
                        </li>
                    </ul>
                    <div class="dropdown text-end">
                        <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" 
                           data-bs-toggle="dropdown" aria-expanded="false">
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
<h1>เพิ่มสินค้า</h1>

<form method="post" action="" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="pname" class="form-label">ชื่อสินค้า</label>
        <input type="text" name="pname" id="pname" class="form-control" required autofocus>
    </div>

    <div class="mb-3">
        <label for="pdetail" class="form-label">รายละเอียดสินค้า</label>
        <textarea name="pdetail" id="pdetail" rows="3" class="form-control"></textarea> <!-- ลดขนาด textarea -->
    </div>

    <div class="mb-3">
        <label for="pprice" class="form-label">ราคา</label>
        <input type="text" name="pprice" id="pprice" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="pimg" class="form-label">รูปภาพ</label>
        <input type="file" name="pimg" id="pimg" class="form-control">
    </div>

    <div class="mb-3">
        <label for="pcat" class="form-label">ประเภทสินค้า</label>
        <select name="pcat" id="pcat" class="form-select">
            <?php	
            include_once("connectdb.php");
            $sql2 = "SELECT * FROM `product_type` ORDER BY pt_name ASC ";
            $rs2 = mysqli_query($conn, $sql2);
            while ($data2 = mysqli_fetch_array($rs2)) {
            ?>
                <option value="<?= $data2['pt_id']; ?>"><?= $data2['pt_name']; ?></option>
            <?php } ?>
        </select>
    </div>
    <hr>

    <div class="mb-3 d-flex">
    <button type="submit" name="Submit" class="btn btn-primary flex-grow-1 me-2">
        <i class="bi bi-floppy"></i> เพิ่ม
    </button>
    
    <button type="reset" name="Reset" class="btn btn-danger flex-grow-1 me-2">
        <i class="bi bi-x-circle"></i> ยกเลิก
    </button>
    
    <a href="indexproduct.php" class="btn btn-secondary flex-grow-1">
        <i class="bi bi-arrow-left"></i> กลับ
    </a>
</div>



</form>
<?php
include_once("checklogin.php");
include_once("connectdb.php");

if (isset($_POST['Submit'])) {
    // ตรวจสอบว่าข้อมูลทั้งหมดถูกส่งมาหรือไม่
    $pname = $_POST['pname'];
    $pdetail = $_POST['pdetail'];
    $pprice = $_POST['pprice'];
    $pcat = $_POST['pcat'];
    
    // ตรวจสอบว่ามีการกรอกข้อมูลหรือไม่
    if (empty($pname) || empty($pprice) || empty($pcat)) {
        echo "<script>alert('กรุณากรอกข้อมูลให้ครบถ้วน'); window.location='indexproduct.php';</script>";
        exit;
    }
    
    // SQL สำหรับการเพิ่มข้อมูลสินค้า
    $sql_insert = "INSERT INTO product (p_name, p_detail, p_price, pt_id) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql_insert);
    $stmt->bind_param("ssdi", $pname, $pdetail, $pprice, $pcat); // d = double, s = string, i = integer
    
    if ($stmt->execute()) {
        $p_id = $stmt->insert_id; // รับ p_id จากการ INSERT

        // ตรวจสอบการอัปโหลดไฟล์
        if (isset($_FILES['pimg']) && $_FILES['pimg']['name'] != "") {
            // ตรวจสอบประเภทไฟล์
            $allowed = ['gif', 'png', 'jpg', 'jpeg', 'jfif'];
            $filename = $_FILES['pimg']['name'];
            $picture_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

            if (!in_array($picture_ext, $allowed)) {
                echo "<script>alert('ไฟล์รูปต้องเป็น jpg, gif หรือ png เท่านั้น'); window.location='indexproduct.php';</script>";
                exit;
            }

// สร้างชื่อไฟล์ใหม่
$new_filename = "product" . $p_id . "." . $picture_ext;
$destination_path = "images/" . $new_filename; // โฟลเดอร์ที่เก็บรูปในโปรเจกต์
$external_backup_path = "/var/www/html/w/U/images/" . $new_filename; // โฟลเดอร์สำรองที่อยู่นอกโปรเจกต์

// ย้ายไฟล์ไปยังโฟลเดอร์ในโปรเจกต์
if (move_uploaded_file($_FILES['pimg']['tmp_name'], $destination_path)) {
    echo "<script>console.log('ไฟล์อัปโหลดไปยัง images/ สำเร็จ');</script>";

    // ตรวจสอบและสร้างโฟลเดอร์สำรองถ้ายังไม่มี
    if (!file_exists('/var/www/html/w/U/images/')) {
        mkdir('/var/www/html/w/U/images/', 0777, true);
    }

    // คัดลอกไฟล์ไปยังโฟลเดอร์สำรองที่อยู่นอกโปรเจกต์
    $file_contents = file_get_contents($destination_path);
    if (file_put_contents($external_backup_path, $file_contents)) {
        echo "<script>console.log('คัดลอกไฟล์ไปยังโฟลเดอร์สำรองสำเร็จ');</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาดในการคัดลอกไฟล์ไปยังโฟลเดอร์สำรอง'); window.location='indexproduct.php';</script>";
        exit;
    }

    // SQL สำหรับอัปเดตรูปภาพ
    $sql_update = "UPDATE product SET p_picture = ? WHERE p_id = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("si", $new_filename, $p_id);
    
    if ($stmt_update->execute()) {
        echo "<script>alert('เพิ่มข้อมูลสินค้าเรียบร้อย'); window.location='indexproduct.php';</script>";
    } else {
        echo "<script>alert('เกิดข้อผิดพลาดในการบันทึกข้อมูลรูปภาพ'); window.location='indexproduct.php';</script>";
    }
    $stmt_update->close();
} else {
    echo "<script>alert('เกิดข้อผิดพลาดในการอัปโหลดไฟล์ไปยังโฟลเดอร์ images/'); window.location='indexproduct.php';</script>";
}
} else {
echo "<script>alert('เพิ่มข้อมูลสินค้าสำเร็จโดยไม่มีการอัปโหลดรูปภาพ'); window.location='indexproduct.php';</script>";
}
} else {
echo "<script>alert('เกิดข้อผิดพลาดในการเพิ่มข้อมูลสินค้า'); window.location='indexproduct.php';</script>";
}

$stmt->close();
}

mysqli_close($conn);
?>


<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
