<?php
include '../connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>ประเภทสินค้า</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css/" rel="stylesheet" />
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
    /* styles.css */
/* เพิ่มสไตล์สำหรับปุ่มเพิ่มสินค้า */
.button-add-product {
    background-color: green;
    color: white;
    border: none;
    padding: 15px 30px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 15px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
    border-radius: 12px;
}

.button-add-product:hover {
    background-color: darkgreen;
}

/* ปรับแต่งตาราง */
.table {
    width: 100%;
    margin-bottom: 1rem;
    color: #212529;
    border-collapse: collapse;

}

.table th{
    padding: 0.75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
    font-family: 'Sarabun', sans-serif; 
    font-weight: Bold;
    
    
}

.table thead th {
    vertical-align: bottom;
    border-bottom: 2px solid #EBEDEF;
}

.table td{
    background-color: #EBEDEF;
    font-family: 'Sarabun', sans-serif; 
    text-align: center;
}

.table tbody+tbody {
    border-top: 2px solid #EBEDEF;
    width: 100%;
    text-align: center;
}
 
/* เพิ่มกรอบสีเข้มรอบตาราง */
.card {
    border: 2px solid #EBEDEF;
    border-radius: 8px;
    padding: 10px;
    
}


</style>

<body class="sb-nav-fixed">
    <?php include 'menu.php';?>
<div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 ">
                <!-------------------------------------------------------------------- ปุ่ม เพิ่มข้อมูล ------------------------------------------------------------------------>
                <meta charset="UTF-8">
                <button charset="UTF-8" style="background-color:green; color: white; border: none; padding: 15px 30px;
                                text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 15px 2px;
                                transition-duration: 0.4s; cursor: pointer; border-radius: 12px;" onclick="location.href='category_form_insert.php'">เพิ่มประเภทสินค้า</button>

                <!------------------------------------------------------ หัวข้อตารางแสดงข้อมูลสินค้า ------------------------------------------------------------------->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        แสดงประเภทสินค้า
                    </div>
                    <!-------------------------------------------------- ตารางแสดงข้อมูลสินค้า/TABLE --------------------------------------------------------------------->
                    <div class="card-body">
                    <table class="table table-striped">
    <thead>
        <tr style="text-align: center;">
            <th>รหัสประเภทสินค้า</th>
            <th>ชื่อประเภทสินค้า</th>
            <!--<th>จำนวนสินค้า</th>-->
            <th>EDIT</th>
            <th>DELETE</th>
        </tr>
    </thead>
    <?php
include '../connect.php';

$sql = "SELECT * FROM product_type";
$result = mysqli_query($conn, $sql);
?>
<!-- HTML code -->
<body class="sb-nav-fixed">
    <!-- Your existing HTML code -->
    <table class="table table-striped">
        <!-- Table headers -->
        <tbody>
            <?php while ($row = mysqli_fetch_array($result)) : ?>
            <!-- Data rows -->
            <tr style="text-align: center;">
                <td><?=$row['type_id'] ?></td>
                <td><?=$row['type_name'] ?></td>
               <!-- <td>4</td> -->
                <td>
                    <a href="category_form_edit.php?type_id=<?php echo $row['type_id'];?>" style= " background-color:#EFD802; color: white; border: none; padding: 10px 10px;
                        text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 8px 2px;
                        transition-duration: 0.4s; cursor: pointer; border-radius: 12px;">EDIT</a>
                </td>
                <td>
                    <a href="category_delete.php?type_id=<?php echo $row['type_id'];?>" style= " background-color:red; color: white; border: none; padding: 10px 10px;
                        text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 8px 2px;
                        transition-duration: 0.4s; cursor: pointer; border-radius: 12px;">DELETE</a>
                </td>
                <!-- Other columns -->
            </tr>
            <?php endwhile; ?>
        </tbody>  
                
     
    </table>
    <!-- Other parts of your HTML -->
</body>

</table>
</main>
<?php include '../footer.php';?>
</body>
</html>