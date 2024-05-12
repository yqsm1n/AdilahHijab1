<?php
include '../connect.php';
$ids=$_GET['id'];
$sql = "SELECT * FROM product WHERE product_id='$ids' ";
$hand=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($hand);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>เพิ่มสต๊อกสินค้า</title>
    <!-- เรียกใช้งาน Bootstrap CSS -->
    <link href="../css/styles.css" rel="stylesheet" />
    <!-- เรียกใช้งาน fontawesome -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Fenix&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Fenix&family=Sarabun:wght@300&display=swap');
/* รูปแบบทั่วไป */
.body {
    font-family: 'Sarabun', sans-serif;
    color: #333;
    background-color: #f8f9fa;
}
.container {
    display: grid;
    place-items: center;
    height: 70vh; /* ความสูงของหน้าจอ */
}

.card {
    width: 1000px;
    padding: 20px;
    border-radius: 10px;
    background-color: white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);  
}

/* สไตล์ของ input */
.form-control {
    padding: 18px;  /* ความกว้าง*/
    border-radius: 5px; /* ความโค้งของขอบ */
    border: 1px solid #ccc;
    width: 90%;
    margin-bottom: 20px;
}

/* สไตล์ของ label */
label[for="type_name"] {
    font-family: 'Sarabun', sans-serif;
    font-weight: bold;
    color: #333;
    font-size: 16px;
}

/* ตัวเลือกของ select */
select {
    padding: 12px;
    font-family: 'Sarabun', sans-serif;
    border-radius: 5px;
    border: 1px solid #ccc;
    width: 100px;
    margin: 15px;
}
</style>
<?php include 'menu.php'; ?>
<body>
    <div class="container"> <!-- จัดให้อยู่ตรงกลางหน้า -->
        <div class="row justify-content-center">
            <div class="col-lg-9" style="margin: 30px;"> <!-- ขนาดการ์ด -->
                <div class="card shadow-lg border-0 rounded-lg mt-5"> <!-- ส่วนหัวข้อของการ์ด -->
                    <div class="card-header">
                        <h3 style="font-family: 'Sarabun', sans-serif; font-weight: bold; color: #333; font-size: 28px; text-align: center;">เพิ่มสต๊อกสินค้า</h3>
                    </div>
                    <!-- ส่วนเนื้อหาของการ์ด -->     
                    <div class="card-body"> 
                        <form name="form1" method="POST" action="stock_update.php"> <!-- FORM -->
                            <div class="row mb-2">
                                <div class="col-md">
                                    <div class="form-floating my-3">
                                        <label for="product_id" style="font-family: 'Sarabun', sans-serif; font-weight: bold; color: #333; font-size: 16px;">รหัสสินค้า</label><br><br>
                                        <input class="form-control" name="product_id" type="number" id="product_id" readonly value="<?=$row['product_id']?>" >
                                    </div>
                                    <div class="form-floating my-3">
                                        <label for="product_name" style="font-family: 'Sarabun', sans-serif; font-weight: bold; color: #333; font-size: 16px;">ชื่อสินค้า</label><br><br>
                                        <input class="form-control" name="product_name" type="text" id="product_name" readonly value="<?=$row['product_name']?>"  >
                                    </div>
                                    
                                    <div style="display: flex; flex-wrap: wrap;">
                                        <p style="font-family: 'Sarabun', sans-serif; font-weight: bold; color: #333; font-size: 16px;">จำนวน</p>
                                        <div class="form-floating my-3" style="display: flex; align-items: center; margin-right: 10px;"> 
                                            <p style="font-family: 'Sarabun', sans-serif; color: #333; font-size: 16px; margin: 0;">ไซต์ S</p>
                                            <input style="padding: 12px; border-radius: 5px; border: 1px solid #ccc; width: 100px; margin-left: 10px; margin-right: 10px;" class="form-control" name="pnumS" type="number" />ตัว
                                        </div>
                                        
                                        <div class="form-floating my-3" style="display: flex; align-items: center; margin-right: 10px;"> 
                                            <p style="font-family: 'Sarabun', sans-serif; color: #333; font-size: 16px; margin: 0; margin-right: 10px;">ไซต์ M</p>
                                            <input style="padding: 12px; border-radius: 5px; border: 1px solid #ccc; width: 100px; margin-left: 10px; margin-right: 10px;" class="form-control" name="pnumM" type="number" />ตัว
                                        </div>
                                        <div class="form-floating my-3" style="display: flex; align-items: center; margin-right: 10px;"> 
                                            <p style="font-family: 'Sarabun', sans-serif; color: #333; font-size: 16px; margin: 0; margin-right: 10px;">ไซต์ L</p>
                                            <input style="padding: 12px; border-radius: 5px; border: 1px solid #ccc; width: 100px; margin-left: 10px; margin-right: 10px;" class="form-control" name="pnumL" type="number" />ตัว 
                                        </div>
                                        <div class="form-floating my-3" style="display: flex; align-items: center;"> 
                                            <p style="font-family: 'Sarabun', sans-serif; color: #333; font-size: 16px; margin: 0;">ไซต์ XL</p>
                                            <input style="padding: 12px; border-radius: 5px; border: 1px solid #ccc; width: 100px; margin-left: 10px; margin-right: 10px;" class="form-control" name="pnumXL" type="number" />ตัว
                                        </div>
                                        <div class="form-floating my-3" style="display: flex; align-items: center;"> 
                                            <p style="font-family: 'Sarabun', sans-serif; color: #333; font-size: 16px; margin: 20;">Over size</p>
                                            <input style="padding: 12px; border-radius: 5px; border: 1px solid #ccc; width: 100px; margin-left: 10px; margin-right: 10px;" class="form-control" name="pnumOVER" type="number" />ตัว
                                        </div>
                                    </div> 

                                    <div style="display: flex; justify-content: center; align-items: center; margin-top: 8px;">
                                        <button style="margin-right: 10px; background-color: green; color: white; border: none; padding: 15px 30px;
                                            text-align: center; text-decoration: none; font-size: 16px; transition-duration: 0.4s;
                                            cursor: pointer; border-radius: 12px;" type="submit">บันทึกข้อมูล
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                        <div style="display: flex; justify-content: center;">
                            <a href="stock_product.php" style="background-color: red; color: white; border: none; padding: 15px 30px;
                            text-align: center; text-decoration: none; font-size: 16px; transition-duration: 0.4s;cursor: pointer; border-radius: 12px;">ยกเลิก</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>