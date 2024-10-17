<?php
session_start();
include("daat.php");
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
<head><script src="/docs/5.3/assets/js/color-modes.js"></script>


    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/carousel/">



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

<link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Chonburi&display=swap" rel="stylesheet">


    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.3/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.3/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.3/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
<link rel="icon" href="/docs/5.3/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#712cf9">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai&display=swap" rel="stylesheet">


    <style>
	

	
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
	   .btn-primary {
        background-color: #000000; /* เปลี่ยนสีพื้นหลังเป็นสีดำ */
        border-color: #000000; /* เปลี่ยนขอบเป็นสีดำ */
        color: #ffffff; /* เปลี่ยนตัวอักษรเป็นสีขาว */
    }
    .btn-primary:hover {
        background-color: #333333; /* เปลี่ยนสีตอน hover */
    }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
	  
	  
	  

  /* ปรับแต่งลิงก์ของประเภทสินค้า */
  .category-link {
    color: white;               /* เปลี่ยนสีตัวอักษรเป็นสีขาว */
    font-size: 16px;            /* ขยายขนาดตัวอักษร */
    margin-right: 20px;         /* เว้นวรรคระหว่างลิงก์ */
    text-decoration: none;      /* ลบขีดเส้นใต้ลิงก์ */
	font-family: "Chonburi", serif;
  	font-weight: 400;
  	font-style: normal;
	line-height: 1.5;           /* ปรับระยะห่างของบรรทัด */
    padding-top: 5px;           /* เพิ่มระยะห่างด้านบน */
  }

  /* เปลี่ยนสีเมื่อเอาเมาส์ไปชี้ที่ลิงก์ */
  .category-link:hover {
    color: #ccc;                /* เปลี่ยนสีตัวหนังสือเป็นสีเทาเมื่อ hover */
  }




  .navbar-brand {
    font-size: 40px;       /* ขยายขนาดตัวหนังสือ */
    font-weight: bold;     /* ทำให้ตัวหนังสือหนา */
  }
  
	  
	.f1{
		font-family: "Chonburi", serif;
  		font-weight: 400;
  		font-style: normal;
	}
 	
	// <uniquifier>: Use a unique and descriptive class name
// <weight>: Use a value from 400 to 900

	.f2 {
	color: white;               /* เปลี่ยนสีตัวอักษรเป็นสีขาว */
    font-size: 18px;            /* ขยายขนาดตัวอักษร */
    margin-right: 20px;         /* เว้นวรรคระหว่างลิงก์ */
    text-decoration: none;
  font-family: "Playfair Display", serif;
  font-optical-sizing: auto;
  font-weight: <weight>;
  font-style: normal;
}

	.f3 { 
		font-family: 'Noto Sans Thai', sans-serif;        
		font-size: 19px;  
}

.thumbnail img {
    transition: transform 0.3s ease-in-out;
    width: 200px;
    height: 230px;
    object-fit: cover;
}

.thumbnail:hover img {
    transform: scale(1.1); /* ขยายภาพขึ้น 10% */
}

/* ซ่อนรายละเอียดที่อยู่ภายใน caption */
.caption-detail {
    display: none;
    transition: opacity 0.3s ease-in-out;
    opacity: 0;
}

/* แสดงรายละเอียดเมื่อชี้เมาส์ */
.thumbnail:hover .caption-detail {
    display: block;
    opacity: 1;
}

.caption {
    position: relative;
}

/* เพิ่มระยะห่างด้านบนของชื่อสินค้า */
.caption h4.f5 {
    margin-top: 15px; /* คุณสามารถปรับค่าตรงนี้ได้ */
}


	  
</style>

    
    <!-- Custom styles for this template -->
    <link href="../../../Users/Administrator/Desktop/k/carousel.css" rel="stylesheet">


	
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เว็บขายเสื้อผ้า</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="../../../Users/Users/Administrator/Desktop/styles.css">
	
</head>
<body>


	<body bgcolor ="#E8E8E9">



 
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"onclick="window.location='../U/UI.php';">Vêta</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse"style="margin-top: 5px;">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <?php
                $sql2 = "SELECT * FROM product_type";
                $rs2 = mysqli_query($conn, $sql2);
                while ($data2 = mysqli_fetch_array($rs2, MYSQLI_BOTH)) {
                ?>
                    <li class="nav-item">
                        <a href="UI.php?pt=<?=$data2['pt_id'];?>" class="nav-link"><?=$data2['pt_name'];?></a>
                    </li>
                <?php } ?>
            </ul>
            <form class="d-flex align-items-center" role="search" method="POST" action="">
                <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search"style="margin-top: 3px;">
                <button class="btn btn-outline-success" type="submit" style="height: 38px;">Search</button> <!-- เพิ่ม margin-top ที่นี่ -->
            </form>

            <!-- Dropdown for user information -->
            <div class="dropdown ms-3 d-flex align-items-center">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false"style="height: 38px;">
                    ข้อมูลผู้ใช้
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">


    <ul>
        <?php if (isset($_SESSION['uid'])): ?>
            <li><a class="dropdown-item" href="./profile/indexporfile.php">ข้อมูลส่วนตัว</a></li>
            <li><a class="dropdown-item" href="view_order.php">ประวัติการสั่งซื้อ</a></li>
          
            <li><a href="logout.php" class="dropdown-item">ออกจากระบบ</a></li>
        <?php else: ?>
            <li><a href="../sign-in/index.php" class="dropdown-item">เข้าสู่ระบบ User</a></li>
            <li><a href="../login/indexlogin.php" class="dropdown-item">เข้าสู่ระบบ Admin</a></li>
        <?php endif; ?>
    </ul>
</nav>
		
      


</header>

 
 
<main>


  <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class="active" aria-current="true"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
    </div>
    
    
    
    <div class="carousel-inner">
      <div class="carousel-item">
        <img class="bd-placeholder-img1" src="im/newnew.png" style='width: 100%; height: 600px; object-fit: cover;' alt="Description of image">  

        
        <div class="container">
          <div class="carousel-caption text-start"> 
           
            
          </div>
        </div>
      </div>
      <div class="carousel-item active">
        <img class="bd-placeholder-img1" src="im/Ni.png" width="100%" height="600" alt="Description of image">
        <div class="container">
          <div class="carousel-caption">
            
           
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="bd-placeholder-img1" src="https://s359.kapook.com/pagebuilder/ae86f575-a11f-4a63-944f-efe8ce95f6aa.jpg" width="100%" height="600" alt="Description of image">
        <div class="container">
          <div class="carousel-caption text-end">
            
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>




<div class="container" style="text-align: center;"> <!-- ใช้ container และตั้งค่าตรงกลาง -->
    <div class="row justify-content-center" style="margin: 20;"> 
        <div class="col-lg-1" style="padding: 0;">
            <img src="k/1.png" alt="Your Image Description" class="bd-placeholder-img rounded-circle" width="140" height="140" style="object-fit: cover;">
        </div><!-- /.col-lg-1 -->
        <div class="col-lg-1" style="padding: 0;">
            <img src="k/3.png" alt="Your Image Description" class="bd-placeholder-img rounded-circle" width="140" height="140" style="object-fit: cover;">
        </div><!-- /.col-lg-1 -->
        <div class="col-lg-1" style="padding: 0;">
            <img src="k/5.png" alt="Your Image Description" class="bd-placeholder-img rounded-circle" width="140" height="140" style="object-fit: cover;">
        </div><!-- /.col-lg-1 -->
        <div class="col-lg-1" style="padding: 0;">
            <img src="k/7.png" alt="Your Image Description" class="bd-placeholder-img rounded-circle" width="140" height="140" style="object-fit: cover;">
        </div><!-- /.col-lg-1 -->
        <div class="col-lg-1" style="padding: 0;">
            <img src="k/9.png" alt="Your Image Description" class="bd-placeholder-img rounded-circle" width="140" height="140" style="object-fit: cover;">
        </div><!-- /.col-lg-1 -->
        <div class="col-lg-1" style="padding: 0;">
            <img src="k/11.png" alt="Your Image Description" class="bd-placeholder-img rounded-circle" width="140" height="140" style="object-fit: cover;">
        </div><!-- /.col-lg-1 -->
        <div class="col-lg-1" style="padding: 0;">
            <img src="k/13.png" alt="Your Image Description" class="bd-placeholder-img rounded-circle" width="140" height="140" style="object-fit: cover;">
        </div><!-- /.col-lg-1 -->
    </div><!-- /.row --> <br>
    <hr>



<?php
include("daat.php"); // เชื่อมต่อฐานข้อมูล

// รับคำค้นหาและประเภท
$kw = isset($_POST['search']) ? $_POST['search'] : '';
$pt = isset($_GET['pt']) ? $_GET['pt'] : '';

// ถ้าไม่พิมพ์อะไรเลยและกดค้นหา ให้แสดงสินค้าทั้งหมดจากทุกหมวดหมู่
if (empty($kw) && empty($pt)) {
    $sql_all = "SELECT * FROM product";
    $rs_all = mysqli_query($conn, $sql_all);

    if (!$rs_all) {
        die("Query failed: " . mysqli_error($conn));
    }

    echo "<h2>สินค้าทั้งหมด</h2>";
    echo "<div class='row' style='margin-top: 40px;'>";
    while ($data_all = mysqli_fetch_array($rs_all)) {
       echo "<div class='col-md-4'>";
echo "<div class='thumbnail'>";

echo "<a href='view_order_product.php?id={$data_all['p_id']}'>"; 

echo "<img src='images/{$data_all['p_picture']}' class='img-responsive' style='width: 200px; height: 230px; object-fit: cover;' alt='Product Image'>";

echo "</a>"; // ปิด <a>
echo "<div class='caption'>";
echo "<h4 class='f3' style='margin-top: 16px;'>{$data_all['p_name']}</h4>"; // ระยะห่างของชื่อสินค้า
echo "<h4 class='f3'>" . number_format($data_all['p_price'], 0) . " บาท</h4>";
echo "<p><a href='basket.php?id={$data_all['p_id']}' class='btn btn-dark' role='button'>หยิบลงตะกร้า</a></p>";
echo "</div></div></div>";
    }

    echo "</div>"; // ปิด div.row
	
	
	
} else {
    // สร้างเงื่อนไขการค้นหา
    $conditions = array();
    if (!empty($kw)) {
        $conditions[] = "(p_name LIKE '%$kw%' OR p_detail LIKE '%$kw%')";
    }

    if (!empty($pt)) {
        $conditions[] = "pt_id = '$pt'";
    }

    // สร้างเงื่อนไข SQL
    $s = !empty($conditions) ? "WHERE " . implode(" AND ", $conditions) : '';

    // ค้นหาสินค้า
   $sql = "SELECT * FROM product $s";
    $rs = mysqli_query($conn, $sql);

if (!$rs) {
    die("Query failed: " . mysqli_error($conn));
}

// แสดงผลลัพธ์ที่ค้นพบ
if (mysqli_num_rows($rs) > 0) {
    echo "<div class='row' style='margin-top: 40px;'>";
    while ($data = mysqli_fetch_array($rs)) {
        echo "<div class='col-md-4'>";
        echo "<div class='thumbnail'>";
        echo "<a href='view_order_product.php?id={$data['p_id']}'>"; // เปลี่ยนตรงนี้
        echo "<img src='images/{$data['p_picture']}' class='img-responsive' style='width: 200px; height: 230px; object-fit: cover;' alt='Product Image'>";
		echo "</a>"; // ปิด <a>
        echo "<div class='caption'>";
        echo "<h4 class='f3' style='margin-top: 16px;'>{$data['p_name']}</h4>"; // ระยะห่างของชื่อสินค้า
        echo "<h4 class='f3'>" . number_format($data['p_price'], 0) . " บาท</h4>";
        echo "<p><a href='basket.php?id={$data['p_id']}' class='btn btn-primary' role='button' style='background-color: black; border-color: black;'>หยิบลงตะกร้า</a></p>";

        echo "</div></a></div></div>"; // เพิ่ม <a> รอบ <img> และ <div class='caption'>
    }
    echo "</div>"; // ปิด div.row
} else {
    // แสดงข้อความเมื่อไม่พบสินค้า
    echo "<p><strong>ไม่พบสินค้า</strong> ที่คุณค้นหา กรุณาลองใหม่อีกครั้ง</p>";
}
}

// ตรวจสอบว่ามีการปิดการเชื่อมต่อเพียงครั้งเดียว
if ($conn) {
    mysqli_close($conn);
}
?>
<br>
<hr>


<!-- FOOTER -->
<footer class="container">
    <div class="d-flex justify-content-between align-items-center">
        <p style="margin: 0;">Mahasarakham University  </p>
        <p class="mb-0"><a href="#">Back to top</a></p>
    </div>
</footer>
</main>
<br>





   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>

</body>


</html>