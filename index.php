<?php session_start()?>
<?php include('connect.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>หน้าแรก</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .button {
            margin-top: 20px; /* ปรับค่าตามต้องการ */
            width: 50px; 
            color: white; border: none; 
            padding: 10px 10px;
            text-align: center; text-decoration: none; 
            display: inline-block; 
            font-size: 16px; 
            margin: 8px 2px; 
            transition-duration: 0.4s;
            cursor: pointer; 
            border-radius: 12px;
        }
        

     
    .container-fluid {
     font-family: 'Sarabun', sans-serif;
     color: #333;
     font-size: 16px;
    }
  
    </style>
</head>
<body class="sb-nav-fixed">   
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
            
            <span style="margin-top: 10px;"></span>
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

   

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 my-3">
                <div class="row">
                   <?php
                        include 'connect.php';
                        //คำสั่งแบ่งหน้าจอ
                        $perpage = 8;

                        if(isset($_GET['page'])){
                            $page = $_GET['page'];
                        }else{
                            $page = 1;
                        }

                        $start = ($page - 1) * $perpage;
                        
                        //คำสั่งแสดงข้อมูล
                        $sql = "SELECT * FROM product ORDER BY product_id LIMIT $start,$perpage";
                        $hand = mysqli_query($conn, $sql);
                        $cardCount = 0;
                        while ($row = mysqli_fetch_array($hand)) {
                    ?>
                    
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-white text-black text-center mb-4 <?= ($cardCount % 4 == 0 && $cardCount != 0) ? 'mt-4' : ''; ?>" style="width: 100%; height: 100%; background: white; border-radius: 32px ">   
                            <div class="card-body" style="font-family: 'Sarabun', sans-serif; font-weight: Bold;"><?=$row['product_name']?></div>
                            <div style="display: flex; justify-content: center; ">
                                <img style="width: 90%; height: 100%; border-radius: 19px;" src="img/<?=$row['product_img']?>" />
                            </div>
                            <p><?=$row['product_detail']?></p>
                            <div style="margin: 10px;">Size
                                <button class="button button1" onclick="selectSize('S')">S</button>
                                <button class="button button2" onclick="selectSize('M')">M</button>
                                <button class="button button3" onclick="selectSize('L')">L</button>
                                <button class="button button4" onclick="selectSize('XL')">XL</button>
                            </div>
                            
                            <div style="text-align: center; color: #DE4137; font-size: 20px; font-family: Sarabun; font-weight: 800; text-transform: uppercase; letter-spacing: 1.44px; word-wrap: break-word; display: inline-block;">฿<?=$row['product_price']?>
                            
                            <a href="front-end/user_login.php">
                                <i class="fa-solid fa-cart-plus fa-xl" style="color: #DE4137; vertical-align: middle; margin-left: 200px;"></i>
                            </a>

                            </div> <br><br>
                        </div>
                    </div>
                    <?php
                            $cardCount++;
                        }
                        //mysqli_close($conn);
                    ?>
                </div> <!-- end row -->
                
                <?php
                $sql1 ="SELECT * FROM product";
                $query1 = mysqli_query($conn,$sql1);
                $total_record = mysqli_num_rows($query1);
                $total_page = ceil($total_record / $perpage);
                ?>
                <br><br>
                
                <!-- แบ่งหน้า -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item"><a class="page-link" href="view_product.php?page=1">Previous</a></li>
                        <?php for($i=1; $i<=$total_page; $i++) {?>
                        <li class="page-item"><a class="page-link" href="view_product.php?page=<?=$i?>"><?=$i?></a></li>
                        <?php } ?>
                        <li class="page-item"><a class="page-link" href="view_product.php?page=<?=$total_page?>">Next</a></li>
                    </ul>
                </nav>
            <?php mysqli_close($conn); ?>
            </div> <!--end container -->
        </main>
        
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2023</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
        



<!--<body>  
    <div class="container">
        <?php include('navbar2.php');?>
        <img src="banner.png" class="img-fluid" alt="Responsive image">
        <?php include('navbar.php');?>  

        <div class="row">
            <div class="col-md-10">
               <?php
                    //เป็นการประกาศค่าและตรวจสอบตัวแปร
                    $act = (isset($_GET['act']) ? $_GET['act']: '');
                    if($act == 'showbytype'){
                    include('show_product_type.php');
                    }else{
                    include('show_product.php');
                    }
                    ?>
            </div>
        </div>
    </div>
                      
</body> -->
</html>
   