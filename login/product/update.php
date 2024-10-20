<?php
include_once("../checklogin.php");
include_once("connectdb.php");

if (isset($_GET['id'])) {
    $productId = intval($_GET['id']);
    $sql = "SELECT p.*, c.pt_name FROM product AS p
            LEFT JOIN product_type AS c ON p.pt_id = c.pt_id
            WHERE p.p_id = $productId";
    $result = mysqli_query($conn, $sql);
    
    if (!$result || mysqli_num_rows($result) == 0) {
        die("Product not found.");
    }
    
    $product = mysqli_fetch_array($result);
} else {
    die("Product ID not provided.");
}

if (isset($_POST['Submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $detail = mysqli_real_escape_string($conn, $_POST['detail']);
    $price = floatval($_POST['price']);
    $category = intval($_POST['category']);
    
    $updateSql = "UPDATE product SET 
        p_name = '$name', 
        p_detail = '$detail', 
        p_price = $price, 
        pt_id = $category";

    if (isset($_FILES['picture']) && $_FILES['picture']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'images/'; // โฟลเดอร์แรก
        $uploadDir2 = '/var/www/html/w/U/images/'; // โฟลเดอร์ที่สอง
        $uploadFile = $uploadDir . basename($_FILES['picture']['name']);
        $uploadFile2 = $uploadDir2 . basename($_FILES['picture']['name']);

        // ตรวจสอบว่ามีโฟลเดอร์ที่สองหรือไม่
        if (!is_dir($uploadDir2)) {
            mkdir($uploadDir2, 0755, true);
        }
        
        // ลบรูปภาพเก่าในโฟลเดอร์แรก (ถ้ามี)
        if (file_exists($uploadDir . $product['p_picture'])) {
            unlink($uploadDir . $product['p_picture']);
        }
        // ลบรูปภาพเก่าในโฟลเดอร์ที่สอง (ถ้ามี)
        if (file_exists($uploadDir2 . $product['p_picture'])) {
            unlink($uploadDir2 . $product['p_picture']);
        }

        // อัปโหลดไฟล์ไปยังโฟลเดอร์แรก
        if (move_uploaded_file($_FILES['picture']['tmp_name'], $uploadFile)) {
            // คัดลอกไฟล์ไปยังโฟลเดอร์ที่สอง
            if (file_put_contents($uploadFile2, file_get_contents($uploadFile)) === false) {
                die("Error copying file to second directory.");
            }
            
            // อัปเดตชื่อไฟล์ในฐานข้อมูล
            $updateSql .= ", p_picture = '" . mysqli_real_escape_string($conn, $_FILES['picture']['name']) . "' ";
        } else {
            die("Error uploading file to first directory.");
        }
    }

    $updateSql .= " WHERE p_id = $productId";

    if (mysqli_query($conn, $updateSql)) {
        header("Location: indexproduct.php");
        exit();
    } else {
        die("Error updating product: " . mysqli_error($conn));
    }
}

mysqli_close($conn);


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>VETA</title>
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
                            <a class="nav-link" href="../order/view_order_detail.php">Order Details</a>
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
<h1>แก้ไขสินค้า</h1>
    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label>ชื่อสินค้า:</label>
            <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($product['p_name']) ?>" required>
        </div>
        
        <div class="mb-3">
            <label>รายละเอียด:</label>
            <textarea class="form-control" name="detail" required><?= htmlspecialchars($product['p_detail']) ?></textarea>
        </div>
        
        <div class="mb-3">
            <label>ราคา:</label>
            <input type="number" class="form-control" name="price" value="<?= htmlspecialchars($product['p_price']) ?>" required>
        </div>
        
        <div class="mb-3">
            <label>ประเภทสินค้า:</label>
            <select name="category" class="form-select" required>
                <?php
                $categorySql = "SELECT * FROM product_type";
                $categoryResult = mysqli_query($conn, $categorySql);
                if (mysqli_num_rows($categoryResult) > 0) {
                    while ($category = mysqli_fetch_array($categoryResult)) {
                        $selected = $product['pt_id'] == $category['pt_id'] ? 'selected' : '';
                        echo "<option value=\"{$category['pt_id']}\" $selected>{$category['pt_name']}</option>";
                    }
                } else {
                    echo "<option value=\"\">ไม่มีประเภทสินค้า</option>";
                }
                ?>
            </select>
        </div>

        <div class="mb-3">
            <label>รูปภาพ:</label>
            <input type="file" class="form-control" name="picture">
            <img src="images/<?= htmlspecialchars($product['p_picture']) ?>" width="120" alt="Current Product Image">
        </div>

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
</div>
</body>
</html>
