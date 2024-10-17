<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
</head>
<body>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label>Select Image to Upload:</label>
        <input type="file" name="image" required>
        <button type="submit" name="submit">Upload Image</button>
    </form>
    <?php
if (isset($_POST['submit'])) {
    // ระบุโฟลเดอร์ที่ต้องการเก็บไฟล์
    $target_dir = "images/";
    // ระบุเส้นทางและชื่อไฟล์ที่จะเก็บ
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // ตรวจสอบว่าเป็นไฟล์รูปภาพจริงหรือไม่
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // ตรวจสอบว่ามีไฟล์ที่ชื่อซ้ำกันในโฟลเดอร์หรือไม่
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // ตรวจสอบขนาดไฟล์ (ขนาดนี้สามารถเปลี่ยนแปลงได้)
    if ($_FILES["image"]["size"] > 5000000) { // 5MB limit
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // กำหนดรูปแบบไฟล์ที่ยอมรับ (เช่น jpg, png, jpeg, gif)
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // ตรวจสอบว่ามีข้อผิดพลาดในการอัปโหลดหรือไม่
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // หากทุกอย่างเรียบร้อย ให้ย้ายไฟล์ไปยังโฟลเดอร์ที่กำหนด
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars(basename($_FILES["image"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

</body>
</html>
