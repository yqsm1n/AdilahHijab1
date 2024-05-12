<?php
session_start(); // เรียกใช้ session_start() ก่อนเริ่มใช้งาน session ในไฟล์นี้
if(!isset($_SESSION["user_name"])) 
header("Location:user_login.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>สินค้าทั้งหมด</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .card{
            margin-bottom: 20px;
        }
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
        .button1 {
            background-color: white; 
            color: black; 
            border: 2px solid #04AA6D;
        }

        .button1:hover {
            background-color: #04AA6D;
            color: white;
        }
        .button2 {
            background-color: white; 
            color: black; 
            border: 2px solid #04AA6D;
        }

        .button2:hover {
            background-color: #04AA6D;
            color: white;
        }
        .button3 {
            background-color: white; 
            color: black; 
            border: 2px solid #04AA6D;
        }

        .button3:hover {
            background-color: #04AA6D;
            color: white;
        }
        .button4 {
            background-color: white; 
            color: black; 
            border: 2px solid #04AA6D;
        }

        .button4:hover {
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>
<body class="sb-nav-fixed">   
    <?php include 'menu1.php'; ?>     

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 my-3">
                <div class="row">
                   <?php
                        include '../connect.php';
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
                                <img style="width: 90%; height: 100%; border-radius: 19px;" src="../img/<?=$row['product_img']?>" />
                            </div>
                            <p><?=$row['product_detail']?></p>
                            <div style="margin: 10px;">Size
                                <button class="button button1" onclick="selectSize('S')">S</button>
                                <button class="button button2" onclick="selectSize('M')">M</button>
                                <button class="button button3" onclick="selectSize('L')">L</button>
                                <button class="button button4" onclick="selectSize('XL')">XL</button>
                            </div>
                            
                            <div style="text-align: center; color: #DE4137; font-size: 20px; font-family: Sarabun; font-weight: 800; text-transform: uppercase; letter-spacing: 1.44px; word-wrap: break-word; display: inline-block;">฿<?=$row['product_price']?>
                            
                            <a href="product_detail.php?product_id=<?= $row['product_id'] ?>">
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
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://
