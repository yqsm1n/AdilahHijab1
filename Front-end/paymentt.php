<?php
session_start();
include '../connect.php';
if (isset($_SESSION['user_name'])) {
    $user_name = $_SESSION['user_name'];
} else {
    header("Location: login.php"); // Redirect ไปที่หน้า login ถ้าไม่ได้ล็อกอิน
    exit();
}

 // ดึงรายการสั่งซื้อ
 $sql = "SELECT * FROM `order`  WHERE orderID= '" . $_SESSION["order_id"]."' ";
 $result = mysqli_query($conn, $sql);
 $rs=mysqli_fetch_array($result);
 $total_price=$rs['total_price'];
 $p = 30;
 $total_num = $total_price + $p;

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>แจ้งชำระการสั่งซื้อ</title>
	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
	<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/util.css">

	<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<style>
/* ปรับขนาดของเซลล์ในตาราง */
.table-row > * {
    padding: 50px; /* ปรับขนาดพื้นที่ระหว่างเซลล์ */
}

/* ปรับแต่งหัวตาราง */
.table-head > * {
    text-align: center;
}

.cart {
    margin-top: -70px; /* ปรับตำแหน่งของเนื้อหาขึ้นไป 50px */
}

</style>
<?php include 'menu1.php'; ?>  
<form method="POST" action="payment_insert.php" enctype="multipart/form-data">
<body class="animsition" style="font-family: 'Sarabun', sans-serif;">
    <!-- Cart -->
    <section class="cart bgwhite p-t-100 p-b-150">
        <div class="container" style="display: flex; justify-content: center;">
        <div class="bo9 w-size20 p-l-40 p-r-40 p-t-30 p-b-38 m-t-20 p-lr-15-sm">
                    <h5 class="m-text20 p-b-20" style="text-align: center; font-family: 'Sarabun', sans-serif; font-weight: bold;">แจ้งชำระการสั่งซื้อ</h5>
                    <p style="text-align: center;"><?=$rs['reg_date']?></p>
                    <p style="text-align: center;">เลขที่ใบสั่งซื้อ : <?=$rs['orderID']?></p>
             
                    
                    <div class="bo10 p-t-15 p-b-20">
                        <p>ชื่อลูกค้า : <?=$rs['first_name']?> <?=$rs['last_name']?></p>
                        <p>เบอร์โทรศัพท์ : 0<?=$rs['user_telephone']?> </p>
                        <p>ที่อยู่ในการจัดส่ง : <?=$rs['number_address']?> ม.<?=$rs['moo_address']?> ต.<?=$rs['district_address']?> อ.<?=$rs['amphoe_address']?> จ.<?=$rs['province_address']?> <?=$rs['postalcode']?></p>
                    </div>
                    <br>
                    
                    <p style="text-align: center; font-weight: bold; border-bottom: 1px solid #e1e1e1; padding-bottom: 10px;">รายการสั่งซื้อ</p>


                  
                    <table class="table ">
                        <thead>
                        <tr style="text-align: center; font-size:small">
                                <th></th>
                                <th>ชื่อสินค้า</th>
                                <th>ไซต์</th>
                                <th>จำนวน</th>
                                <th>ราคารวม</th>
                            </tr>
                        </thead>
                  <?php 
                    $sql1 = "SELECT * FROM order_detail d,product p  WHERE d.product_id=p.product_id AND d.orderID= '" . $_SESSION["order_id"]."' ";
                    $result1 = mysqli_query($conn, $sql1);
                    while($row=mysqli_fetch_array($result1)){

                  ?>
                   
                        
                        <tbody>
                                                                                                
                            <tr style="text-align: center;">
                                <td><img src="../img/<?= $row['product_img'] ?>" width="80" height="100" alt="Product Image"  style="margin-right: 10px;"></td>
                                <td><?=$row['product_name']?></td>
                                <td><?=$row['product_size']?></td>
                                <td><?=$row['orderQty']?></td>
                                <td><?=$row['Total']?></td>
                            </tr>
                            
                        
                        </tbody>
                   
                       
                   
                    <?Php 
                    }
                    ?>
                     </table>
                    <!--  -->
                    <div class="p-t-26 p-b-30 text-end">
                        <p>ยอดการสั่งซื้อ: <?=$total_price?></p>
                        <p>ค่าการจัดส่ง: 30 บาท</p>
                        <!--<p>ส่วนลดร้านค้า: 50 บาท</p>-->
                        <p class="m-text20  text-end" style="font-family: 'Sarabun', sans-serif;"><strong>ยอดชำระเงินทั้งหมด:<?=$total_num ?>บาท</strong></p>
                    </div>
                     
                    
                        <div class="row g-3">
                            <div class="row"></div>
                                <div class="col-md-6">
                                    <label class="form-label">
                                        <h6>วิธีการชำระเงิน <span style="color: red;">*</span></h6>
                                    </label>
                                            <select class="form-select" aria-label="Default select example" name="payment_method">
                                                <option selected>โอนเงินผ่านบัญชีธนาคาร</option>
                                            </select>
                                            <br>
                                        <div class="container card shadow-sm text-center">
                                            <b style="color: #FFA500; margin-top: 2em;">ธนาคารกรุงไทย</b><br>
                                            <b style="color: #FFA500">ชื่อบัญชี : ADILAH HIJAB</b><br>
                                            <b style="color: #FFA500">เลขบัญชี : 932-33-77-104</b><br>
                                            <b style="color: #FFA500">พร้อมเพย์ : 062-5852392</b><br>
                                        </div>
                                        </div>
                            <div class="row"></div>
                                <div class="col-md-6">
                                    <label class="form-label">
                                        <h6>วันที่โอน <span style="color: red;">*</span></h6>
                                    </label>
                                    <input type="date" class="form-control" name="payment_date" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">
                                        <h6>เวลาที่โอน <span style="color: red;">*</span></h6>
                                    </label>
                                    <input type="time" class="form-control" name="payment_time" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">
                                        <h6>จำนวนเงิน <span style="color: red;">*</span></h6>
                                     </label>
                                        <input type="text" class="form-control" name="Total_price" required value="<?= $total_num ?>" readonly>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">
                                        <h6>หลักฐานการชำระเงิน <span style="color: red;">*</span></h6>
                                    </label>
                                    <input type="file" id="image" class="form-control" name="payment_image" required><br>
                                </div>
                               
                                
                                
                            </div>
                            <div class="size15 trans-0-4">
                            <button type="submit" name="btn" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" style="font-family: 'Sarabun', sans-serif;">แจ้งชำระเงิน</button>
                            </div>

                        </form>


                    
                
                </div>
            </div>
        </div>
    </section>
<!--===============================================================================================-->
    <script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
    <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script type="text/javascript" src="vendor/select2/select2.min.js"></script>
    <script type="text/javascript">
        $(".selection-1").select2({
            minimumResultsForSearch: 20,
            dropdownParent: $('#dropDownSelect1')
        });

        $(".selection-2").select2({
            minimumResultsForSearch: 20,
            dropdownParent: $('#dropDownSelect2')
        });
    </script>
<!--===============================================================================================-->
    <script src="js/main.js"></script>

<!--===============================================================================================-->
    <script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.block2-btn-addcart').each(function() {
            var product_name = $(this).parent().parent().parent().find('.block2-name').html();
            $(this).on('click', function() {
                swal(product_name, "เพิ่มลงในตะกร้าเรียบร้อย !", "success");
            });
        });

        $('.block2-btn-addwishlist').each(function() {
            var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
            $(this).on('click', function() {
                swal(nameProduct, "เพิ่มลงในตะกร้าเรียบร้อย !", "success");
            });
        });

        $('.btn-addcart-product-detail').each(function() {
            var nameProduct = $('.product-detail-name').html();
            $(this).on('click', function() {
                swal(nameProduct, "เพิ่มลงในตะกร้าเรียบร้อย !", "success");
            });
        });
    </script>
    
</body>
</html>

