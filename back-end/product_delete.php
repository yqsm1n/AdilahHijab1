<?php 
// เชื่อมต่อฐานข้อมูล
include '../connect.php';

// รับค่า product_id ที่ต้องการลบ
$product_id = $_GET['product_id'];

// คำสั่ง SQL สำหรับลบข้อมูล
$sql= "DELETE FROM product WHERE product_id = $product_id ";
if(mysqli_query($conn,$sql)){
    echo"<script>alert('ลบสินค้าเรียบร้อยแล้ว');</script>";
    echo"<script>window.location='product_show.php';</script>";
}else{
    echo "Error :" . $sql."<br>" . mysqli_error($conn);
    echo "<script>alert('ไม่สามารถลบสินค้าได้')</script>";

}

mysqli_close($conn);
?>

