<?php
    include_once("../checklogin.php");
    include("connectdb.php");
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <script src="../assets/js/color-modes.js"></script>
    <title>รายการใบสั่งซื้อ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />

    <style>
        /* Custom styles */
        .card {
            transition: transform 0.3s ease, box-shadow;
            border-radius: 10px;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            border-color: #00000; /* Changed from 00000 to #00000 */
        }

        .card:hover .card-body {
            background-color: #999999;
        }

        /* Responsive table */
        table {
            width: 100%;
            table-layout: auto; /* Automatic layout */
        }
		

		
		@media (max-width: 768px) {
            /* Add horizontal scroll for small screens */
            .table-responsive {
                overflow-x: auto;
			}
        

        /* Additional styles */
        h1 {
            margin-top: 60px; /* เพิ่มระยะห่างระหว่างส่วนหัวกับบอดี้ */
        }

        .icon-details {
            font-size: 28px; /* ขนาดของไอคอนใหญ่ขึ้น */
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .icon-details:hover {
            color: #FFD700; /* เปลี่ยนสีไอคอนเมื่อ hover */
            transform: scale(1.2); /* ขยายขนาดไอคอนเมื่อ hover */
        }

        .details-link {
            width: 40px; /* ขนาดของช่องดูรายละเอียด */
            height: 40px; /* ขนาดของช่องดูรายละเอียด */
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%; /* ทำให้เป็นรูปวงกลม */
            background-color: #f8f9fa; /* สีพื้นหลังของช่อง */
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .details-link:hover {
            background-color: #e2e6ea; /* สีพื้นหลังเมื่อ hover */
            transform: scale(1.05); /* ขยายขนาดช่องเมื่อ hover */
        }

        .details-link a {
            text-decoration: none; /* ลบเส้นใต้จากลิงก์ */
        }

        /* เปลี่ยนสีพื้นหลังเมื่อ hover ที่แถว */
        tbody tr:hover {
            background-color: #e8f0fe; /* สีพื้นหลังที่แถวเมื่อ hover */
        }
		.table-dark {
        margin-top: 20px; /* ปรับค่าตามต้องการ */
    }
    </style>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
</head>

<body> 
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
                        <a class="nav-link" href="view_order.php">Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../user/user_list.php">Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../category/indextype.php">Category</a>
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

<div class="container mt-5 ">
    <br><h1>รายการใบสั่งซื้อ</h1>
    <div class="table-responsive">
        <table id="myTable" class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ดูรายละเอียด</th>
                    <th>เลขที่ใบสั่งซื้อ</th>
                    <th>วันที่</th>
                    <th>ราคารวม</th>
                    <th>IDลูกค้า</th>
                    <th>ชื่อลูกค้า</th>
                    <th>สถานะการจัดส่ง</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $sql = "SELECT orders.oid, orders.odate, orders.ototal,
					users.u_id, users.u_name, orders.sta 
					FROM orders JOIN users ON orders.u_id = users.u_id 
                   ORDER BY orders.oid DESC";

                    $rs = mysqli_query($conn, $sql);
                    if ($rs === false) {
                        die("Error executing query: " . mysqli_error($conn));
                    }

                    while ($data = mysqli_fetch_array($rs, MYSQLI_BOTH)) {
                ?>
                <tr>
                    <td>
                        <div class="details-link">
                            <a href="view_order_detail.php?a=<?=$data['oid'];?>">
                                <i class="fas fa-eye icon-details" aria-hidden="true"></i> <!-- ไอคอนดูรายละเอียด -->
                            </a>
                        </div>
                    </td>
                    <td><?=$data['oid'];?></td>
                    <td><?=$data['odate'];?></td>
                    <td><?=number_format($data['ototal'], 0);?> บาท</td> <!-- แสดงสกุลเงิน -->
                    <td><?=$data['u_id'];?></td> <!-- แสดงชื่อลูกค้า -->
                    <td><?=$data['u_name'];?></td>
                    <td>
            <form action="update.php" method="POST">
                <input type="hidden" name="oid" value="<?=$data['oid'];?>">
                <select name="sta">
                    <option value="กำลังจัดส่ง" <?=($data['sta'] == 'กำลังจัดส่ง') ? 'selected' : '';?>>กำลังจัดส่ง</option>
                    <option value="จัดส่งแล้ว" <?=($data['sta'] == 'จัดส่งแล้ว') ? 'selected' : '';?>>จัดส่งแล้ว</option>
                    <option value="ยกเลิก" <?=($data['sta'] == 'ยกเลิก') ? 'selected' : '';?>>ยกเลิก</option>
                </select>
                <button type="submit" class="btn btn-sm btn-primary">อัปเดต</button>
            </form>
        </td>
    </tr>
    <?php } ?>
</tbody>
        </table>
    </div>
</div>


<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
