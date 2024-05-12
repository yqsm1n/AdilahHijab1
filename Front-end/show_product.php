<?php
include '../connect.php';

$query_product = "SELECT * FROM product as p 
INNER JOIN product_type as t 
ON p.type_id = t.type_id
ORDER BY product_id ASC";
$result_pro = mysqli_query($conn, $query_product) or die("Error in query: $query_product" . mysqli_error($conn));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- โค้ดส่วนหัว -->
    <style>
        .card {
            display: flex; 
            justify-content: center; 
            text-align: center;
            font-size: 16px; 
            font-family: 'Sarabun', sans-serif;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <!-- โค้ดส่วนตัวของเว็บ -->
    <?php include "menu1.php" ?>
    <div class="row">
        <?php foreach ($result_pro as $row_product) { ?>
            <div class="card" style="width: 22rem; margin-left:25px; border-radius: 30px">
                <h5 class="card-title" style="margin:10px; font-weight: Bold;"><?php echo $row_product['product_name'];?></h5>
                <img class="card-img-top" src="../img/<?php echo $row_product['product_img']?>" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">ประเภท : <?php echo $row_product['type_name'];?></p>
                    <p class="card-text"><?php echo $row_product['product_detail'];?></p>
                    <div style="text-align: center; color: #DE4137; font-size: 20px; font-family: Sarabun; font-weight: 800; text-transform: uppercase; letter-spacing: 1.44px; word-wrap: break-word; display: inline-block;">฿<?php echo $row_product['product_price'];?>
                        <a href="product_detail.php?product_id=<?= $row['product_id'] ?>">
                            <i class="fa-solid fa-cart-plus fa-xl" style="color: #DE4137; vertical-align: middle; margin-left: 200px;"></i>
                        </a>
                    </div>
                    <!-- <a href="product_detail1.php?id=<?php echo $row_product['product_id']?>" class="btn btn-primary">Go somewhere</a> -->
                </div>
            </div>
            &nbsp;
        <?php } ?>
    </div>

    <?php
    $perpage = 8; // กำหนดจำนวนสินค้าต่อหน้า
    $sql1 ="SELECT * FROM product";
    $query1 = mysqli_query($conn,$sql1);
    $total_record = mysqli_num_rows($query1);
    $total_page = ceil($total_record / $perpage);
    ?>

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
</body>
</html>
