<?php
session_start();
include("daat.php");
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Management</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Noto Sans Thai', sans-serif;
             background-color: #424242
; /* สีพื้นหลัง */
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
            padding: 40px;
            border-radius: 20px; /* มุมโค้งของกล่องเนื้อหา */
            background-color: #000000; /* สีพื้นหลังกล่องเนื้อหา */
       		box-shadow: 0 4px 8px rgba(128, 128, 128, 0.5); /* เงาสีทอง */
            margin-top: 100px; 
			max-width: 500px; /* กำหนดความกว้างสูงสุด */
    		width: 90%;
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
<div class="container">
    <h1 class="text-center">Management</h1> <!-- เพิ่มหัวข้อ Management และจัดกึ่งกลาง -->
    
    
<div class="d-flex flex-column align-items-center">
    <button class="btn btn-primary w-50 py-2 mb-3" type="button" onclick="window.location.href='ชื่อไฟล์ที่ต้องการเปิด'">Product</button>

    <button class="btn btn-primary w-50 py-2 mb-3" type="button" onclick="window.location.href='ชื่อไฟล์ที่ต้องการเปิด'">Order</button>

    <button class="btn btn-primary w-50 py-2 mb-3" type="button" onclick="window.location.href='ชื่อไฟล์ที่ต้องการเปิด'">User</button>
</div>

<style>
    .custom-link {
        border: 2px solid red; /* เพิ่มกรอบสีแดง */
        padding: 8px 12px; /* เพิ่มระยะห่างภายในกรอบ */
        border-radius: 5px; /* ทำให้มุมของกรอบโค้งมน */
        display: inline-block; /* ทำให้ลิงก์อยู่ในรูปแบบบล็อกภายใน */
        text-decoration: none; /* ลบขีดเส้นใต้ของลิงก์ */
    }

    .custom-link:hover {
        background-color: rgba(255, 0, 0, 0.1); /* เปลี่ยนสีพื้นหลังเมื่อวางเมาส์ */
    }

    .list-unstyled {
        list-style: none; /* นำจุดออกจากรายการ */
        padding: 0;
        margin: 0;
    }
</style>

<style>
    .custom-button {
        border: 2px solid red; /* เพิ่มกรอบสีแดง */
        padding: 8px 12px; /* เพิ่มระยะห่างภายในกรอบ */
        border-radius: 5px; /* ทำให้มุมของกรอบโค้งมน */
        background-color: transparent; /* ทำให้พื้นหลังโปร่งใส */
        color: red; /* กำหนดสีตัวอักษรเป็นสีแดง */
        text-decoration: none; /* ลบขีดเส้นใต้ของลิงก์ */
        display: inline-block; /* ทำให้ลิงก์อยู่ในรูปแบบบล็อกภายใน */
        cursor: pointer; /* เปลี่ยนเคอร์เซอร์เมื่อวางเมาส์บนปุ่ม */
    }

    .custom-button:hover {
        background-color: rgba(255, 0, 0, 0.1); /* เปลี่ยนสีพื้นหลังเมื่อวางเมาส์ */
    }
<style>
    .custom-button {
        border: 2px solid red; /* กำหนดกรอบสีแดง */
        padding: 8px 12px; /* เพิ่มระยะห่างภายในกรอบ */
        border-radius: 5px; /* ทำให้มุมของกรอบโค้งมน */
        background-color: red; /* กำหนดสีพื้นหลังของปุ่มเป็นสีแดง */
        color: white; /* กำหนดสีตัวอักษรให้แตกต่างจากกรอบ */
        text-decoration: none; /* ลบขีดเส้นใต้ของลิงก์ */
        display: inline-block; /* ทำให้ลิงก์อยู่ในรูปแบบบล็อกภายใน */
        cursor: pointer; /* เปลี่ยนเคอร์เซอร์เมื่อวางเมาส์บนปุ่ม */
    }

    .custom-button:hover {
        background-color: darkred; /* เปลี่ยนสีพื้นหลังเมื่อวางเมาส์ */
    }
</style>

<div class="text-center mb-3"> <!-- เพิ่ม div เพื่อจัดตำแหน่งกลาง -->
    <button class="btn btn-danger w-20 py-2" type="button" onclick="window.location.href='logout.php'">Logout</button>
</div>

    <!-- Bootstrap Carousel สำหรับเลื่อนรูปภาพ -->
    <div id="productCarousel" class="carousel slide mt-3" data-bs-ride="carousel">
        <div class="carousel-inner">
        </div>
    </div>
</div>

<body>
<header>
        <nav class="navbar navbar-expand-md navbar-dark bg-black fixed-top">
    <div class="container-fluid d-flex justify-content-center">
        <a class="navbar-brand" href="../U/UI.php">Vêta</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>





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