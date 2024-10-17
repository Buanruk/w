<?php
session_start();
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>รายการใบสั่งซื้อ</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Noto Sans Thai', sans-serif;
            background-color: #f8f9fa;
        }

        h1 {
            text-align: center;
            margin: 20px 0;
        }

        .navbar {
            margin-bottom: 20px;
        }

        .table {
            margin-top: 20px;
        }
		
		.table-bordered {
    border: 1px solid #dee2e6; /* เพิ่มขอบรอบตาราง */
}

.table-bordered th, .table-bordered td {
    border: 0.5px solid #dee2e6; /* เพิ่มขอบระหว่างคอลัมน์ */
}
		
		td {
        	text-align: center; /*จัดตำแหน่งข้อความให้ชิดขวา */
    	}
		
		th {
        	text-align: center; /*จัดตำแหน่งข้อความให้ชิดขวา */
    	}

        .container {
            margin-top: 70px;
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

    <div class="container mt-5 pt-5">
        <h1>รายการใบสั่งซื้อ</h1>
        <div class="border">
            <table id="myTable" class="table table-striped table-hover table-bordered" style="width:100%">
                <thead class="table-dark">
                    <tr>
                        <th>ดูรายละเอียด</th>
                        <th>เลขที่ใบสั่งซื้อ</th>
                        <th>วันที่</th>
                        <th>ราคารวม</th>
                        <th>ลูกค้า</th>
                        <th>สถานะการจัดส่ง</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("daat.php");
                    if (isset($_SESSION['uid'])) {
                        $u_id = $_SESSION['uid'];
                        $u_id = mysqli_real_escape_string($conn, $u_id);
                    }
                    $sql = "SELECT * FROM orders WHERE u_id = '$u_id' ORDER BY oid DESC";
                    $rs = mysqli_query($conn, $sql);
                    while ($data = mysqli_fetch_array($rs, MYSQLI_BOTH)) {
                    ?>
                    <tr>
                        <td><a href="view_order_detail.php?a=<?=$data['oid'];?>">ดูรายละเอียด</a></td>
                        <td><?=$data['oid'];?></td>
                        <td><?=$data['odate'];?></td>
                        <td><?=number_format($data['ototal'],0);?></td>
                        <td><?=$data['u_id'];?></td>
                        <td><?=$data['sta'];?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="container mt-3">
     <ul class="pagination d-flex justify-content-end">
        <li class="page-item"><a class="page-link text-dark" href="javascript:history.back()">ย้อนกลับ</a></li>
    </ul>
</div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>