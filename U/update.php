<?php
	include_once("daat.php");
?>

<?php
include_once("daat.php");
$sql1 = "SELECT * FROM product WHERE p_id='{$_GET['pid']}' " ;
$rs1 = mysqli_query($conn, $sql1);
$data1 = mysqli_fetch_array($rs1);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>นายพีรพัฒน์ บัวสระ</title>
</head>

<body>
<h1>Vêta</h1>

<form method="post" action="" enctype="multipart/form-data">
	ชื่อสินค้า <input type="text" name="pname" required autofocus value="<?=$data1['p_name'];?>"><br>
    รายละเอียดสินค้า<br>
	<textarea name="pdetail" rows="5" cols="50"><?=$data1['p_detail'];?></textarea><br>
    ราคา <input type="text" name="pprice" required value="<?=$data1['p_price'];?>"><br>
    รูปภาพ <input type="file" name="pimg"><br>
    ประเภทสินค้า 
    <select name="pcat">
    <?php	
	
	$sql2 = "SELECT * FROM `category` ORDER BY c_name ASC ";
	$rs2 = mysqli_query($conn, $sql2) ;
	while ($data2 = mysqli_fetch_array($rs2) ){
	?>
    	<option value="<?=$data2['c_id'];?>" <?=($data1['c_id']==$data2['c_id'])?"selected":"";?> ><?=$data2['c_name'];?></option>
    <?php } ?>
    </select>
    <br><br>
    <button type="submit" name="Submit"> บันทึก </button>
</form> <hr><hr>

<?php
if(isset($_POST['Submit'])){
	
    if(empty($_FILES['pimg']['name'])) {
        $sql = "UPDATE `product` SET `p_name` = '{$_POST['pname']}', `p_detail` = '{$_POST['pdetail']}', `p_price` = '{$_POST['pprice']}', `c_id` = '{$_POST['pcat']}' WHERE `product`.`p_id` = '{$_GET['pid']}';";

    } else {
        $file_name = $_FILES['pimg']['name'] ;
        $ext = substr( $file_name , strpos( $file_name , '.' )+1 ) ;
        $sql = "UPDATE `product` SET `p_name` = '{$_POST['pname']}', `p_detail` = '{$_POST['pdetail']}', `p_price` = '{$_POST['pprice']}', `c_id` = '{$_POST['pcat']}', p_ext='{$ext}' WHERE `product`.`p_id` = '{$_GET['pid']}';";
        copy($_FILES['pimg']['tmp_name'], "images/".$_GET['pid'].".".$ext) ;
    }
    
   	mysqli_query($conn, $sql)  or die ("แก้ไขข้อมูลสินค้าไม่ได้");
 
	echo "<script>";
	echo "alert('แก้ไขข้อมูลสินค้าสำเร็จ');";
	echo "window.location='index.php';";
	echo "</script>";
}
?>



<?php	
	mysqli_close($conn);
?>
</body>
</html>


