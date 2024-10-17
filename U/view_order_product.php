<?php
session_start();
include("daat.php"); // เชื่อมต่อฐานข้อมูล

// รับ ID ของสินค้าจาก URL
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// ตรวจสอบว่า ID ถูกต้องหรือไม่
if ($product_id > 0) {
    // สืบค้นข้อมูลสินค้าจากฐานข้อมูล
    $sql = "SELECT * FROM product WHERE p_id = '$product_id'";
    $result = mysqli_query($conn, $sql);
    $product = mysqli_fetch_array($result, MYSQLI_ASSOC);

    // ตรวจสอบว่าพบข้อมูลสินค้าหรือไม่
    if ($product) {
        // สืบค้นข้อมูลรูปภาพของสินค้าจากตาราง product_images
        $sql_images = "SELECT p_picture FROM product_images WHERE p_id = '$product_id'";
        $result_images = mysqli_query($conn, $sql_images);
        $product_images = mysqli_fetch_all($result_images, MYSQLI_ASSOC);
    } else {
        echo "ไม่พบสินค้านี้";
        exit;
    }
} else {
    // ถ้าไม่มี ID หรือ ID ไม่ถูกต้อง
    echo "ไม่พบสินค้านี้";
    exit;
}
?>

<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>รายละเอียดสินค้า</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Noto Sans Thai', sans-serif;
             background-color: #ffffff; /* สีพื้นหลัง */
            color: #FFFFFF; /* สีตัวอักษร */
        }

        h1 {
            margin: 20px 0;
            font-size: 2.5rem; /* ขนาดตัวอักษรหัวข้อ */
        }

        .product-image {
            width: 200px;
            height: auto;
            object-fit: cover;
            border-radius: 10px; /* มุมโค้งของรูปภาพ */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5); /* เงาใต้รูปภาพ */
        }

        .container {
            padding: 30px;
            border-radius: 10px; /* มุมโค้งของกล่องเนื้อหา */
            background-color: #343a40; /* สีพื้นหลังกล่องเนื้อหา */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5); /* เงาใต้กล่อง */
            margin-top: 80px; /* เว้นระยะจาก navbar */
        }

        .page-link {
            color: #ffffff; /* สีตัวอักษรของลิงก์ */
            transition: color 0.3s; /* เพิ่มการเปลี่ยนสีเมื่อชี้เมาส์ */
        }

        .page-link:hover {
            color: #ffd700; /* สีเมื่อชี้เมาส์ */
        }

        .mt-3 {
            margin-top: 1.5rem; /* ระยะห่าง */
        }

        .text-center {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); /* เงาของข้อความ */
        }

        .product-description {
            font-size: 1.1rem; /* ขนาดตัวอักษรของคำอธิบาย */
            line-height: 1.6; /* เว้นบรรทัด */
        }
		.carousel-inner {
        position: relative;
        width: 100%;
        max-width: 600px; /* กำหนดขนาดกรอบ */
        margin: 0 auto; /* จัดกลาง */
    }

    .carousel-item img {
        width: 100%; /* ทำให้ภาพเต็มกรอบ */
        height: 400px; /* ความสูงของรูป */
        object-fit: cover; /* ครอบรูปให้พอดีกรอบ */
    }

    .carousel-control-prev, .carousel-control-next {
        width: 50px; /* ขนาดปุ่มเลื่อน */
        height: 100%; /* ความสูงเต็มกรอบ */
        background-color: rgba(0, 0, 0, 0.5); /* เพิ่มสีพื้นหลังให้กับปุ่ม */
    }

    .carousel-control-prev-icon, .carousel-control-next-icon {
        background-color: #fff; /* ไอคอนสีขาว */
    }

    </style>
</head>
<body>
<header>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container-fluid d-flex justify-content-center">
        <a class="navbar-brand" href="../U/UI.php">Vêta</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

    </header>
<div class="container">
        <?php if ($product): ?>
            <h1 class="text-center"><?= htmlspecialchars($product['p_name']) ?></h1>

            <!-- Bootstrap Carousel สำหรับเลื่อนรูปภาพ -->
          <div id="productCarousel" class="carousel slide mt-3" data-bs-ride="carousel">
    <div class="carousel-inner">
        <?php foreach ($product_images as $index => $image): ?>
            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                <img src="images/<?= htmlspecialchars($image['p_picture']) ?>" 
                     class="d-block w-100" 
                     alt="<?= htmlspecialchars($product['p_name']) ?>" 
                     style="height: 400px; object-fit: cover;"> <!-- ปรับขนาดรูปตามที่ต้องการ -->
            </div>
        <?php endforeach; ?>
    </div>

    <!-- ปุ่มเลื่อนซ้าย-ขวา -->
    <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

            <div class="mt-4">
                <p><?= nl2br(htmlspecialchars($product['p_detail'])) ?></p>
                <h4><?= number_format($product['p_price'], 0) ?> บาท</h4>
            </div>
        <?php else: ?>
            <h2 class="text-center">ไม่พบข้อมูลสินค้านี้</h2>
        <?php endif; ?>

        <ul class="pagination d-flex justify-content-end mt-4">
            <li class="page-item">
                <a class="page-link text-dark" href="javascript:history.back()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                    </svg>
                </a>
            </li>
        </ul>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>