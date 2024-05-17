<?php
session_start();
include "condb.php";
$sql = "select * from tb_order where order_id= '" .  $_SESSION["order_id"] . "' ";
$result = mysqli_query($conn, $sql);
$rs = mysqli_fetch_array($result);
$total_price = $rs['total_price'];
$p = 35;
$total = $total_price + $p;
$member_fullname = "";
$order_status = "";

// ตรวจสอบว่ามีค่า order_id ใน session หรือไม่
if(isset($_SESSION["order_id"])) {
    $order_id = $_SESSION["order_id"];

    // เรียกดึงข้อมูลของการสั่งซื้อจากฐานข้อมูล
    $sql = "SELECT * FROM tb_order WHERE order_id = '$order_id'";
    $result = mysqli_query($conn, $sql);
    $rs = mysqli_fetch_array($result);
} else {
    // หากไม่มี order_id ใน session ให้ทำการแสดงข้อความแจ้งเตือนหรือทำการ redirect ไปยังหน้าอื่นตามที่ต้องการ
    echo "ไม่พบข้อมูลการสั่งซื้อ";
    exit(); // หลุดจากการทำงานของโปรแกรม
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แจ้งชำระเงิน</title>

    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- link ภาษาไทย -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500&family=Gamja+Flower&family=Kanit:ital,wght@1,100&family=Mali:ital,wght@0,200;0,400;0,500;1,300&family=Protest+Riot&family=Shadows+Into+Light&family=Source+Code+Pro:ital,wght@0,900;1,900&family=Special+Elite&family=Yatra+One&display=swap" rel="stylesheet">


</head>
<?php include 'header.php' ?>

<body>
    <div class="container mt-3">
        <div class="text-center">
            <h3 class="h3-hover p-5">แจ้งชำระเงิน</h3>
        </div>
        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="container">
                                                            <div class="container ms-5">
                                                                <div class="row">
                                                                    <!-- <form class="row g-3" method="POST" enctype="multipart/form-data" action="update_profile.php"> -->

                                                                    <div class="col-md-6">
                                                                        <br>
                                                                        <label class="form-label">
                                                                            <h6>เลขที่ใบสั่งซื้อ <span style="color: red;">*</span></h6>
                                                                        </label>
                                                                        <!-- เปลี่ยน value เป็น $order_id -->
                                                                        <input type="text" class="form-control" name="order_id" required value="<?= $rs['order_id'] ?>" readonly>
                                                                        <br>
                                                                    </div>
                                                                    <?php
                                                                    $sql1 = "select * from tb_order_detail o,tb_product p where o.product_id=p.product_id and o.order_id= '" .  $_SESSION["order_id"] . "' ";
                                                                    $result1 = mysqli_query($conn, $sql1);

                                                                    // ตรวจสอบจำนวนแถวที่คืนกลับจากการ query
                                                                    $num_rows = mysqli_num_rows($result1);

                                                                    if ($num_rows > 0) { // ถ้ามีสินค้าในรายการสั่งซื้อ
                                                                    ?>
                                                                        <div class="row py-3">
                                                                            <div class="col-12">
                                                                                <div class="p-0 py-lg-3 px-lg-4 border-0 border-lg border-theme rounded">
                                                                                    <div class="row border-lg-top-0 border-theme">
                                                                                        <div class="col-12 mb-3">
                                                                                            <span class="fs-ta-16 text-theme-1"><b>รายการสินค้า</b></span>
                                                                                        </div>
                                                                                        <table class="table table-hover">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th class="pl-4 fs-ta-16 text-theme-1 mb-0">สินค้า</th>
                                                                                                    <th class="text-end">ราคา/ชิ้น</th>
                                                                                                    <th class="text-center">จำนวน</th>
                                                                                                    <th class="text-end">ราคารวม</th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <?php
                                                                                                while ($row = mysqli_fetch_array($result1)) {
                                                                                                ?>
                                                                                                    <tr style="margin-bottom: 40px;">
                                                                                                        <td class="pl-2">
                                                                                                            <div class="row">
                                                                                                                <div class="col-auto pr-0">
                                                                                                                    <img src="img/<?= $row['product_img'] ?>" class="rounded" alt="Cinque Terre" width="100" height="100" style="border: 1px solid #ccc;">
                                                                                                                </div>
                                                                                                                <div class="col">
                                                                                                                    <div class="row">
                                                                                                                        <div class="col-12 mt-4">
                                                                                                                            <p class="fs-ta-14 fs-lg-ta-16 text-theme-1 mb-0 bold-text"><?= $row['product_name'] ?></p>
                                                                                                                            <p class="fs-ta-14 text-muted mb-0 mt-2"><?= $row['product_id'] ?></p>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </td>
                                                                                                        <td class="col-4 mt-4 pr-1 text-end">
                                                                                                            <p class="text-end"> <?= number_format($row['product_price'], 2) ?></p>
                                                                                                        </td>
                                                                                                        <td class="pr-1 text-center" class="col-4 pr-1 text-center">
                                                                                                            <p class="text-center"> <?= $row['order_amount'] ?></p>
                                                                                                        </td>
                                                                                                        <td class="pr-1 text-end">
                                                                                                            <p class="text-end"> <?= number_format($row['order_total'], 2) ?></p>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                            </tbody>
                                                                                        <?php
                                                                                                }
                                                                                        ?>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php
                                                                    } else { // ถ้าไม่มีสินค้าในรายการสั่งซื้อ
                                                                        echo "<p class='text-center'>ไม่มีสินค้าในรายการสั่งซื้อ</p>";
                                                                    }
                                                                    ?>

                                                                    <!-- ยอดรวมสินค้า -->
                                                                    <div class="row py-3 py-lg-0 border-lg-top-0 border-theme mt-lg-0">
                                                                        <div class="col-12 col-lg-8 d-none d-lg-block">
                                                                            <!-- Start Vat list -->
                                                                            <!-- Start Vat list -->

                                                                            <!-- Start Order Note -->
                                                                            <!-- End Order Note -->
                                                                        </div>
                                                                        <div class="col-12 col-lg-4">
                                                                            <!-- Start Net price -->
                                                                            <div class="row py-2">
                                                                                <div class="col-auto">
                                                                                    <p class="fs-ta-16 text-theme-1 mb-0 text-end">
                                                                                        ยอดรวมสินค้า</p>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <p class="fs-ta-16 text-theme-1 mb-0 text-end">
                                                                                        <?= number_format($total_price, 2) ?> บาท</p>
                                                                                </div>
                                                                            </div>
                                                                            <!-- End Net price -->

                                                                            <!-- Start Promotion Discount price -->
                                                                            <div class="row py-2">
                                                                                <div class="col-auto">
                                                                                    <p class="fs-ta-16 text-theme-1 mb-0 text-end">
                                                                                        ค่าจัดส่ง </p>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <p class="fs-ta-16 text-theme-1 mb-0 text-end">
                                                                                        35.00 บาท</p>
                                                                                </div>
                                                                            </div>

                                                                            <div class="my-2 border-top border-bottom border-top-dash border-bottom-dash border-theme">
                                                                                <div class="row py-2">
                                                                                    <div class="col-auto">
                                                                                        <p class="fs-ta-16 text-theme-1 mb-0 text-end">
                                                                                            <b>ยอดรวมสุทธิ</b>
                                                                                        </p>
                                                                                    </div>
                                                                                    <div class="col">
                                                                                        <p class="fs-ta-20 text-theme-1 mb-0 text-end">
                                                                                            <?php if (isset($total) && $total !== null && $total !== "") { ?>
                                                                                                <?= number_format($total, 2) ?> บาท
                                                                                            <?php } else { ?>
                                                                                                <!-- แสดงค่าว่าง -->
                                                                                            <?php } ?>
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <!-- End Total price -->
                                                                        </div>
                                                                    </div>
                                                                    <!-- ปิดยอดรวมสินค้า -->
                                                                    
                                                                    <form method="POST" action="insert_payment.php" enctype="multipart/form-data">
                                                                        <div class="row g-3">
                                                                            <div class="row"></div>
                                                                            <div class="col-md-6">
                                                                                <label class="form-label">
                                                                                    <h6>ชื่อ - นามสกุล <span style="color: red;">*</span></h6>
                                                                                </label>
                                                                                <input type="text" class="form-control" name="member_fullname" required value="<?= $rs['member_fullname'] ?>" readonly>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label class="form-label">
                                                                                    <h6>จำนวนเงิน <span style="color: red;">*</span></h6>
                                                                                </label>
                                                                                <input type="text" class="form-control" name="total_price" required value="<?= number_format($total, 2) ?>" readonly>
                                                                            </div>
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
                                                                                    <b style="color: #FFA500">ชื่อบัญชี : MD-SPORT-SHOP</b><br>
                                                                                    <b style="color: #FFA500">เลขบัญชี : 925-529-9922</b><br>
                                                                                    <b style="color: #FFA500">พร้อมเพย์ : 081-0961158</b><br>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row"></div>
                                                                            <div class="col-md-6">
                                                                                <label class="form-label">
                                                                                    <h6>วันที่โอน <span style="color: red;">*</span></h6>
                                                                                </label>
                                                                                <input type="date" class="form-control" name="order_date" required>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label class="form-label">
                                                                                    <h6>เวลาที่โอน <span style="color: red;">*</span></h6>
                                                                                </label>
                                                                                <input type="time" class="form-control" name="payment_time" required>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <label class="form-label">
                                                                                    <h6>หลักฐานการชำระเงิน <span style="color: red;">*</span></h6>
                                                                                </label>
                                                                                <input type="file" class="form-control" name="file1" required><br>
                                                                            </div>
                                                                            <div class="col-12 text-center">
                                                                                <?php if ($order_status == '2') { ?>
                                                                                    <button type="submit" name="btn" class="btn btn-dark" disabled>แจ้งชำระเงิน</button>
                                                                                <?php } else { ?>
                                                                                    <button type="submit" name="btn" class="btn btn-dark">แจ้งชำระเงิน</button>
                                                                                <?php } ?>
                                                                            </div>
                                                                        </div>
                                                                    </form>








                                                                    <!-- <div class="col-12 p-3 mt-3 d-grid gap-2 d-md-flex justify-content-md-center">
                                                                <input type="submit" class="btn btn-success me-md-2 mb-1" name="submit" value="บันทึก">
                                                                <input type="reset" class="btn btn-danger mb-1" name="cancel" value="ยกเลิก" onclick="window.location='information.php';">
                                                            </div> -->

                                                                    <!-- </form> -->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add your scripts here -->
</body>
<br><br><br>

</html>
<?php include 'footer.php' ?>