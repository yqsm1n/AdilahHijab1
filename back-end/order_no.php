<?php include '../connect.php'; ?>

<!DOCTYPE html>
<html lang="en">
<?php include 'head.php';?>
<body class="sb-nav-fixed">
    <?php include 'menu.php'; ?>

    <script>
        $(document).ready(function(){
            $('#DataTable').DataTable({
                "aaSorting":[[0,'ASC']],
            });
        });
    </script>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 ">
                <div class="card mb-4" style="margin-top: 20px;">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        แสดงรายการสั่งซื้อ(ยกเลิกคำสั่งซื้อ)
                    </div>
                    <div>
                    <br>
                    <a href="order_yes.php"><button type="button" class="btn btn-outline-success" style="margin-left: 20px;">ชำระเงินเรียบร้อย</button></a>
                    <a href="order_show.php"><button type="button" class="btn btn-outline-success">ยังไม่ชำระเงิน</button></a>
                    <a href="order_no.php"><button type="button" class="btn btn-outline-success">ยกเลิกคำสั่งซื้อ</button></a>
                </div>
                    <div class="card-body">
                        <table id="DataTable" class="table table-striped">
                            <thead>
                                <tr style="text-align: center; font-size: 12px;">
                                <th>เลขที่ใบสั่งซื้อ</th>
                                    <th>ชื่อ-นามสกุล</th>
                                    <th>ที่อยู่</th>
                                    <th>เบอร์โทรศัพท์</th>
                                    <!-- <th>username</th> -->
                                    <th>ราคารวม</th>
                                    <th>หลักฐานการโอนเงิน</th>
                                    <th>วันที่สั่งซื้อ</th>
                                    <th>สถานะการสั่งซื้อ</th>
                                    
                                    
                                </tr>
                            </thead>

                            <?php
                            $sql = "SELECT * FROM `order` WHERE order_status='0' ORDER BY orderID DESC";
                            $result = mysqli_query($conn, $sql);

                            if (!$result) {
                                // Query execution failed
                                die('Error: ' . mysqli_error($conn));
                            }

                            while ($row = mysqli_fetch_array($result)) {
                            $status = $row['order_status'];
                            ?>
                                <tbody>
                                    <tr style="text-align: center; font-size: 12px;">
                                    <td><?= $row['orderID'] ?></td>
                                        <td><?= $row['first_name'] ?> <?= $row['last_name'] ?></td>   
                                        <td><?= $row['number_address'] ?> ม.<?= $row['moo_address'] ?> ต.<?= $row['district_address'] ?> อ.<?= $row['amphoe_address'] ?> จ.<?= $row['province_address'] ?> <?= $row['postalcode'] ?></td>
                                        <td>0<?= $row['user_telephone'] ?></td>
                                      <!--  <td><?= $row['user_name'] ?></td>  -->
                                        <td><?= $row['total_price'] ?></td>
                                        <td><?= $row['slip_img'] ?></td>
                                        <td><?= $row['reg_date'] ?></td>
                                        <td>
                                            <?php
                                            if($status == 1){
                                                echo"<b style='color:blue'>ยังไม่ชำระเงิน</b>";
                                            }else if($status == 2){
                                                echo "<b style='color:Green'>ชำระเงินเรียบร้อย</b>";
                                            }else if($status == 0){
                                                echo "<b style='color:red'>ยกเลิกคำสั่งซื้อ</b>";
                                            }

                                            ?>
                                        </td>
                                        
                                      


                                    </tr>
                                <?php
                            }
                            ?>
                                </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>

        <?php include '../footer.php'; ?>
    </div>
    </body>
    </html>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script>
        $(document).ready(function() {
            $('#DataTable').DataTable();
        });
    </script>

   

