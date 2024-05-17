<?php
include '../connect.php';

//เก็บข้อมูล
$type_id = $_POST['type_id'];
$product_name = $_POST['product_name'];
$product_detail = $_POST['product_detail'];
$product_color = $_POST['product_color'];
$product_price = $_POST['product_price'];
$cost_price = $_POST['cost_price'];
$size_s = $_POST['size_s'];
$size_m = $_POST['size_m'];
$size_l = $_POST['size_l'];
$size_xl = $_POST['size_xl'];
$product_img = $_POST['txting'];
$product_img2 = $_POST['txting2'];
$product_img3 = $_POST['txting3'];


// อัพโหลดภาพ
if (isset($_FILES['product_img']) && $_FILES['product_img']['error'] === UPLOAD_ERR_OK) {
    $new_image_name = 'product_' . uniqid() . "." . pathinfo(basename($_FILES['product_img']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "../img/" . $new_image_name;
    move_uploaded_file($_FILES['product_img']['tmp_name'], $image_upload_path);
} else {
    $new_image_name = $product_img;
}

// อัพโหลดภาพ
if (isset($_FILES['product_img2']) && $_FILES['product_img2']['error'] === UPLOAD_ERR_OK) {
    $new_image_name1 = 'product_' . uniqid() . "." . pathinfo(basename($_FILES['product_img2']['name']), PATHINFO_EXTENSION);
    $image_upload_path1 = "../img/" . $new_image_name2;
    move_uploaded_file($_FILES['product_img2']['tmp_name'], $image_upload_path2);
} else {
    $new_image_name2 = $product_img2;
}

// อัพโหลดภาพ
if (isset($_FILES['product_img3']) && $_FILES['product_img3']['error'] === UPLOAD_ERR_OK) {
    $new_image_name3 = 'product_' . uniqid() . "." . pathinfo(basename($_FILES['product_img3']['name']), PATHINFO_EXTENSION);
    $image_upload_path3 = "../img/" . $new_image_name3;
    move_uploaded_file($_FILES['product_img3']['tmp_name'], $image_upload_path3);
} else {
    $new_image_name3 = $product_img3;
}


//คำสั่งอัปเดต
$query = "UPDATE product SET 
type_id='$type_id',
product_name = '$product_name',
product_detail='$product_detail',
product_color='$product_color',
cost_price='$cost_price',
product_price='$product_price',
product_img='$new_image_name',
product_img2='$new_image_name2',
product_img3='$new_image_name3',
size_s='$size_s',
size_m='$size_m',
size_L='$size_L',
size_XL='$size_XL',
over_size='$over_size' 
WHERE product_id='$product_id'";

$result =
if(mysqli_query($conn,$query) === TRUE){
    die(header('location: product_show.php'));
}else{
    echo'การแก้ไขข้อมูลผิดพลาด';
}
// ปิดการเชื่อมต่อ
mysqli_close($conn);

?> 