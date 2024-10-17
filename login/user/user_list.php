<?php
	include_once("../checklogin.php");
?>
<!doctype html>
<html lang="th">
<head>




    <meta charset="utf-8">
    <title>ข้อมูลลูกค้า</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.js"></script>
    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
    <style>
        body {
            background-color: #ffffff; /* Dark navy background */
            color: #ffffff; /* White text */
        }
        h1 {
            margin: 20px 0;
            color: #ffffff; /* White heading */
        }
        .container {
            margin-top: 20px;
            background-color: #000000; /* Darker gray for container */
            border-radius: 8px; /* Rounded corners */
            padding: 20px; /* Add some padding */
            box-shadow: 0 0 15px rgba(0,0,0,0.5); /* Shadow for depth */
        }
        table {
            background-color: #2c3e50; /* Dark navy for table */
        }
        th, td {
            text-align: center; /* Center the text */
            vertical-align: middle; /* Vertically align text */
        }
        th {
            background-color: #1abc9c; /* Bright teal for header */
        }
        tr:hover {
            background-color: #3498db; /* Light blue on hover */
        }
        .btn-warning {
            background-color: #f1c40f; /* Bright yellow for edit button */
            border: none;
        }
        .btn-warning:hover {
            background-color: #f39c12; /* Darker yellow on hover */
        }
        .btn-danger {
            background-color: #e74c3c; /* Bright red for delete button */
            border: none;
        }
        .btn-danger:hover {
            background-color: #c0392b; /* Darker red on hover */
        }
        .btn {
            margin: 5px; /* Add some margin to buttons */
        }
    </style>
</head>

<body>

<header data-bs-theme="dark">
        <nav class="navbar navbar-expand-md navbar-light fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" >VETA</a>
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
                                   <li>
                                <a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-right"></i> ออกจากระบบ</a>
                            </li>
                        </li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <br><br><h1 class="text-center">ข้อมูลลูกค้า</h1>
    <div class="container border mt-4">
        <table id="myTable" class="table table-striped table-hover" style="width:100%">
            <thead>
                <tr>
                    <th>แก้ไข</th>
                    <th>ลบ</th>
                    <th>ชื่อ</th>
                    <th>เบอร์โทรศัพท์</th>
                    <th>อีเมล</th>
                    <th>ที่อยู่</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include_once("daat.php");
                $sql = "SELECT * FROM users ORDER BY u_id ASC";
                $rs = mysqli_query($conn, $sql);
                while ($data = mysqli_fetch_array($rs)) {
                ?>
                    <tr>
                        <td><a href="edit_user.php?id=<?=$data['u_id'];?>" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> แก้ไข</a></td>
                        <td><a href="delete_user.php?id=<?=$data['u_id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('คุณต้องการลบลูกค้ารายนี้ใช่หรือไม่?');"><i class="bi bi-trash3-fill"></i> ลบ</a></td>
                        <td><?=$data['u_name'];?></td>
                      
                        <td><?=$data['phone'];?></td>
                        <td><?=$data['u_email'];?></td>
                        <td><?=$data['address'];?></td>
                    </tr>
                <?php
                }
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
