<?php 
include '../connect.php';
$ids=$_POST['product_id'];
$numS=$_POST['pnumS'];
$numM=$_POST['pnumM'];
$numL=$_POST['pnumL'];
$numXL=$_POST['pnumXL'];
$numOVER=$_POST['pnumOVER'];

$sql = "UPDATE product SET size_s = size_s + $numS, size_m = size_m + $numM, size_L = size_L + $numL, size_XL = size_XL + $numXL, over_size = over_size + $numOVER WHERE product_id = '$ids'";
$hand = mysqli_query($conn,$sql);
if($hand){
    echo "<script> alert('อัปเดตจำนวนสินค้าแล้ว');</script>";
    echo "<script> window.location='stock_product.php';</script>";
}else{
    echo "<script> alert('ไม่สามารถอัปเดตจำนวนสินค้าได้');</script>";
    
}
mysqli_close($conn);
?>