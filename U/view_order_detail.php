<?php
session_start();
?>
<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>รายละเอียดใบสั่งซื้อ</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Noto Sans Thai', sans-serif;
            background-color: #f8f9fa;
        }

        h1 {
            margin: 20px 0;
        }

        .table {
            margin-top: 20px;
        }

        .navbar {
            margin-bottom: 20px;
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
        <h1 class="text-center">รายละเอียดใบสั่งซื้อ เลขที่ <?=$_GET['a'];?></h1>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ที่</th>
                    <th>สินค้า</th>
                    <th>จำนวน</th>
                    <th>ราคา/ชิ้น</th>
                    <th>รวม (บาท)</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include("daat.php");
                    $sql = "SELECT * FROM orders_detail INNER JOIN product ON orders_detail.pid = product.p_id WHERE orders_detail.oid = '".$_GET['a']."'";
                    $rs = mysqli_query($conn, $sql);
                    $i = 0;
                    $total = 0;
                    while ($data = mysqli_fetch_array($rs, MYSQLI_BOTH)) {
                        $i++;
                        $sum = $data['p_price'] * $data['item'];
                        $total += $sum;
                ?>
                <tr>
                    <td><?=$i;?></td>
                    <td><img src="images/<?=$data['p_picture'];?>" width="80"><br>รหัสสินค้า: <?=$data['p_id'];?><br>ชื่อสินค้า: <?=$data['p_name'];?></td>
                    <td><?=$data['item'];?></td>
                    <td><?=number_format($data['p_price'],0);?></td>
                    <td><?=number_format($sum,0);?></td>
                </tr>
                <?php } ?>
                <tr>
                    <td colspan="3"></td>
                    <td class="fw-bold">รวมทั้งสิ้น</td>
                    <td class="fw-bold"><?=number_format($total,0);?></td>
                </tr>
            </tbody>
        </table>
  <div class="container mt-3">
     <ul class="pagination d-flex justify-content-end">
        <li class="page-item"><a class="page-link text-dark" href="javascript:history.back()">ย้อนกลับ</a></li>
        <li class="page-item"><a class="page-link text-dark" href="../U/UI.php">กลับหน้าหลัก</a></li>
    </ul>
</div>
                  </ul>
                </nav>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+6Hkl/tGHrD4SQvo1XflJNEd5wknL" crossorigin="anonymous"></script>
</body>
</html>