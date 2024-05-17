<?php 
// ตรวจสอบว่ามีข้อมูลผู้ใช้งานล็อกอินอยู่หรือไม่
if (isset($_SESSION['user_name'])) {
    $user_name = $_SESSION['user_name'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <style>
    .nav-item {
     font-family: 'Sarabun', sans-serif;
     font-weight: bold;
     color: #333;
     font-size: 16px;
    }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light" >
    <div class="container-fluid" style="margin-left: 630px;">
        <a class="navbar-brand logo" href="#">
            <img src="../img/LOGO3.png" width="250" height="100">
        </a>
       
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
           <!-- <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-search fa-lg" style="color: #B48E43;"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa-solid fa-basket-shopping fa-lg" style="color: #B48E43;"></i></a>
            </li>-->
            
            <span style="margin-top: 10px;"><?php echo $user_name; ?></span> <!--<span style="margin-top: 10px; margin-left: 8px;"><?php echo $lastname; ?></span>-->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" style="color: #B48E43;" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" >
                    <li><a class="dropdown-item" href="logout.php">ออกจากระบบ</a></li>
                </ul>
                
            </li>
        </ul>
    </div> 
</nav>

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid justify-content-center">
        <ul class="navbar-nav">
           
            <il class="nav-item">
                <a class="nav-link" href="view_product.php">สินค้าทั้งหมด</a>
            </il>
            <il class="nav-item">
                <a class="nav-link" href="#">ผ้าคลุมหัว/ฮีญาบ</a>
            </il>
            <li class="nav-item">
                <a class="nav-link" href="#">ชุดเดรส</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">ชุดเซ็ท</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">เสื้อแฟชั่น</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">ติดต่อเรา</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="payment1.php">ชำระเงิน</a>
            </li>
        </ul>
    </div>
</nav>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>

