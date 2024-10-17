<?php
session_start();
error_reporting(E_NOTICE);

	session_start();
	include("daat.php");
	$sql = "select * from product where p_id='{$_GET['id']}' ";
	$rs = mysqli_query($conn, $sql) ;
	$data = mysqli_fetch_array($rs);
	$id = $_GET['id'] ;
	
	if(isset($_GET['id'])) {
		$_SESSION['sid'][$id] = $data['p_id'];
		$_SESSION['sname'][$id] = $data['p_name'];
		$_SESSION['sprice'][$id] = $data['p_price'];
		$_SESSION['sdetail'][$id] = $data['p_detail'];
		$_SESSION['spicture'][$id] = $data['p_picture'];
		@$_SESSION['sitem'][$id]++;
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ตะกร้าสินค้า</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Mitr:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
<link href="bootstrap.css" rel="stylesheet" type="text/css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai&display=swap" rel="stylesheet">

<style>
.center-text {
    text-align: center; /* จัดกลาง */
}

.f2 {
	color: white;               /* เปลี่ยนสีตัวอักษรเป็นสีขาว */
    font-size: 18px;            /* ขยายขนาดตัวอักษร */
    margin-right: 20px;         /* เว้นวรรคระหว่างลิงก์ */
    text-decoration: none;
  font-family: "Playfair Display", serif;
  font-optical-sizing: auto;
  font-weight: <weight>;
  font-style: normal;
  padding-top: 5px;
  font-weight: bold;
}

	body {
    background-image: url('im/5.jpg'); /* เปลี่ยนให้เป็นพาธของรูปภาพที่คุณอัพโหลด */
    background-size: cover; /* ปรับขนาดรูปให้เต็มพื้นที่ */
    background-position: center; /* จัดกลางรูป */
    background-repeat: no-repeat; /* ไม่ให้รูปซ้ำ */
	}
	
	.f3 {
font-family: "Mitr", sans-serif;
  font-weight: 500;
  font-style: normal;
        }
		
		table {
            font-family: 'Noto Sans Thai', sans-serif;
        }



</style>
</head>

<body>



<div class="row justify-content-center text-center" style="margin: 70px 0 30px 0;">
    <blockquote>
        <h2 class='f3' >ตะกร้าสินค้า</h2>
        <a href="UI.php" class="btn btn-primary">กลับไปเลือกสินค้า</a>
        <a href="clear.php" class="btn btn-danger">ลบสินค้าทั้งหมด</a>
        <?php if (empty($_SESSION['sid'])) { ?>
            <a href="#" class="btn btn-success" onClick="alert('กรุณาเลือกสินค้า');">สั่งซื้อสินค้า</a>
        <?php } else { ?>
            <a href="record.php" class="btn btn-success">สั่งซื้อสินค้า</a>
        <?php } ?>
    </blockquote>
</div>

<div class="container border">
    <table id="myTable" class="table table-striped table-hover" style="width:100%">
        <thead>
            <tr>
                <th width="5%" class="text-center">ที่</th>
                <th width="19%" class="text-center">รูปสินค้า</th>
                <th width="24%" class="text-center">ชื่อสินค้า</th>
                <th width="14%" class="text-center">ราคา/ชิ้น</th>
                <th width="15%" class="text-center">จำนวน (ชิ้น)</th>
                <th width="14%" class="text-center">รวม</th>
                <th width="9%" class="text-center">&nbsp;</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if (!empty($_SESSION['sid'])) {
            foreach ($_SESSION['sid'] as $pid) {
                @$i++;
                $sum[$pid] = $_SESSION['sprice'][$pid] * $_SESSION['sitem'][$pid];
                @$total += $sum[$pid];
        ?>
            <tr>
                <td class="text-center"><?=$i;?></td>
                <td class="text-center">
                    <img src="images/<?=$_SESSION['spicture'][$pid];?>" width="120">
                </td>
                <td class="text-center"><?=$_SESSION['sname'][$pid];?></td>
                <td class="text-center"><?=number_format($_SESSION['sprice'][$pid], 0);?></td>
                <td class="text-center"><?=$_SESSION['sitem'][$pid];?></td>
                <td class="text-center"><?=number_format($sum[$pid], 0);?></td>
                <td class="text-center"><a href="clear2.php?id=<?=$pid;?>" class="btn btn-danger">ลบ</a></td>
            </tr>
        <?php } // end foreach ?>
            <tr>
                <td colspan="5" class="text-center"><strong>รวมทั้งสิ้น</strong> &nbsp;</td>
                <td><strong><?=number_format($total, 0);?></strong></td>
                <td><strong>บาท</strong></td>
            </tr>
        <?php 
        } else {
        ?>
	<tr>
		<td colspan="7" height="50" align="center">ไม่มีสินค้าในตะกร้า</td>
	</tr>
<?php } // end if ?>
</table>


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


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" ></script>


</blockquote>
</body>
</html>



