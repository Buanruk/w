<?php
include_once("daat.php");

// Check if the user ID is set in the URL
if (isset($_GET['id'])) {
    $userId = intval($_GET['id']);
    $sql = "SELECT * FROM users WHERE u_id = $userId";
    $result = mysqli_query($conn, $sql);
    
    if (!$result || mysqli_num_rows($result) == 0) {
        die("User not found.");
    }
    
    $user = mysqli_fetch_array($result);
} else {
    die("User ID not provided.");
}

if (isset($_POST['Submit'])) {
    $Name = mysqli_real_escape_string($conn, $_POST['uname']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['uemail']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    $updateSql = "UPDATE users SET 
                    u_name = '$Name', 
                    phone = '$phone', 
                    u_email = '$email', 
                    address = '$address' 
                  WHERE u_id = $userId";

    if (mysqli_query($conn, $updateSql)) {
        header("Location: user_list.php");
        exit();
    } else {
        die("Error updating record: " . mysqli_error($conn));
    }
}

mysqli_close($conn);
?>

<!doctype html>
<html lang="th">
<head>
    <meta charset="utf-8">
    <title>แก้ไขข้อมูลลูกค้า</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #343a40; /* Dark gray background */
            color: #ffffff; /* White text */
        }
        .container {
            max-width: 500px; /* Set max width for form */
            margin-top: 50px; /* Add margin at the top */
            padding: 20px;
            background-color: #495057; /* Slightly lighter gray for form */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 0 10px rgba(0,0,0,0.5); /* Add shadow */
        }
        h1 {
            text-align: center; /* Center the heading */
        }
        label {
            font-weight: bold; /* Make labels bold */
        }
        textarea {
            resize: none; /* Disable resizing for textarea */
        }
        button {
            background-color: #007bff; /* Blue button */
            border: none;
        }
        button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
    </style>
</head>
<body>
<div class="container">
    <h1>แก้ไขข้อมูลลูกค้า</h1>
    <form method="post">
        <div class="mb-3">
            <label>ชื่อ:</label>
            <input type="text" class="form-control" name="uname" value="<?= htmlspecialchars($user['u_name']) ?>" required>
        </div>
        
        

        <div class="mb-3">
            <label>เบอร์โทรศัพท์:</label>
            <input type="text" class="form-control" name="phone" value="<?= htmlspecialchars($user['phone']) ?>" required>
        </div>
        
        <div class="mb-3">
            <label>อีเมล:</label>
            <input type="email" class="form-control" name="uemail" value="<?= htmlspecialchars($user['u_email']) ?>">
        </div>
        
        <div class="mb-3">
            <label>ที่อยู่:</label>
            <textarea class="form-control" name="address"><?= htmlspecialchars($user['address']) ?></textarea>
        </div>
        
        <button type="submit" name="Submit" class="btn btn-primary">บันทึก</button>
<a href="user_list.php" class="btn btn-danger">ยกเลิก</a>

    </form>
</div>
</body>
</html>
