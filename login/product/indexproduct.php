<?php
	include_once("../checklogin.php");
?>

<!doctype html>
<html lang="th" data-bs-theme="auto">
<head> 
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai&display=swap" rel="stylesheet">
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>

    <script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
    </script>

	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400;700&display=swap" rel="stylesheet">

    <script src="../assets/js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    
	<style>
	
        /* สไตล์ที่คุณมีอยู่ */
	.btn {
		padding: 5px 10px; /* ปรับขนาด padding ให้เล็กลง */
		font-size: 0.8rem; /* ขนาดตัวอักษร */
		border-radius: 3px; /* ทำให้มุมมนเล็กน้อย */
	}
	
	.btn-success {
		background-color: #28a745; /* สีพื้นหลังสำหรับปุ่มสำเร็จ */
		color: #fff; /* สีตัวอักษร */
	}
	
	.btn-warning {
		background-color: #ffc107; /* สีพื้นหลังสำหรับปุ่มเตือน */
		color: #fff; /* สีตัวอักษร */
	}
	
	.btn-danger {
		background-color: #dc3545; /* สีพื้นหลังสำหรับปุ่มลบ */
		color: #fff; /* สีตัวอักษร */
	}
	
	/* เพิ่มการเปลี่ยนสีเมื่อ hover */
	.btn:hover {
		opacity: 0.8; /* ทำให้ปุ่มโปร่งใสลงเมื่อ hover */
	}

	.body {
		background-image: url('im/5.jpg');
	    font-family: 'Noto Sans Thai', sans-serif;
	}

	.card {
	  transition: transform 0.3s ease, box-shadow 	
	  border-radius: 10px;
	}
	
	.card:hover {
	  transform: translateY(-10px);
	  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
	  border-color: 00000;
	}
	.card:hover .card-body {
  background-color: #999999;
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
		
		table {
            font-family: 'Noto Sans Thai', sans-serif;
        }
	
    </style>
</head>
<body>
    <!-- SVG symbols -->
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
    <!-- Navbar -->
    <header data-bs-theme="dark">
        <nav class="navbar navbar-expand-md navbar-light fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand">VETA</a>
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
                        <a class="nav-link" href="../user/user_list.php">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../category/indextype.php">Category</a>
                    </li>
                                <li>
                                </li>
                                <li>
                                </li>
                            </ul>
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
                                <a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-right"></i> ออกจากระบบ</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <!-- ส่วนค้นหา -->
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
            	</div>
            </div>
               <a href="insert.php" class="btn btn-success"><i class="bi bi-upload"></i> เพิ่มสินค้า </a>
                        <a class="btn btn-danger" href="logout.php"><i class="bi bi-x-square"></i> ออกจากระบบ</a>
              
        </section>

        <!-- ส่วนแสดงสินค้า -->
        <div class="container border">
<table id="myTable" class="table table-striped table table-hover" style="width:100%">
        <thead>
            <tr>
              <th>Edit</th>
              <th>Delete</th>
                <th>Picture</th>
                <th>ID</th>
                <th>Name</th>
                <th>Detail</th>
                <th>Price</th>
                <th>Catagory</th>
            </tr>
        </thead>
        <tbody>
        
<?php
 include_once("connectdb.php");
 $sql = "SELECT p.*, c.pt_name
FROM product AS p
LEFT JOIN product_type AS c  
ON p.pt_id = c.pt_id
ORDER BY p.p_id ASC;";
 $rs = mysqli_query($conn, $sql);
 while ($data = mysqli_fetch_array($rs)){
	$imgSrc = "images/" . htmlspecialchars($data['p_picture']); 
?>
 
            <tr>
           
              
              <td>
    <a href="update.php?id=<?= $data['p_id']; ?>" class="btn btn-warning btn-sm">
        <i class="bi bi-pencil-square"></i> Edit
    </a>
</td>

<td>
    <a href="delete.php?id=<?= $data['p_id']; ?>" class="btn btn-danger btn-sm" 
       onclick="return confirm('คุณแน่ใจว่าต้องการลบสินค้านี้?');">
        <i class="bi bi-trash3-fill"></i> Delete
    </a>
</td>
              
                <td><img src="<?= $imgSrc; ?>" width="120" alt="Product Image"></td> 
                <td><?=$data['p_id'];?></td>
                <td><?=$data['p_name'];?></td>
                <td><?=$data['p_detail'];?></td>
                <td><?=$data['p_price'];?></td>
                <td><?=$data['pt_name'];?></td>
            </tr>
<?php
 }
 mysqli_close($conn);
?>
            
            
         </tbody>
    </table>
</div>
<br>
</br>

    <!-- Footer -->
    <footer class="text-body-secondary py-5">
        <div class="container">
            <p class="float-end mb-1">
                <a href="#">กลับขึ้นด้านบน</a>
            </p>
            <p class="mb-1">&copy; VETA  2024</p>
            <p class="mb-0">ต้องการความช่วยเหลือเพิ่มเติม? <a href="/">ไปยังหน้าแรก</a> หรืออ่าน 
                <a href="../getting-started/introduction">คู่มือเริ่มต้น</a>.
            </p>
        </div>
    </footer>
    

    <!-- Bootstrap JS -->
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>