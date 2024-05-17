<?php
session_start();
include '../connect.php';

// ตรวจสอบว่ามีค่า order_id ใน session หรือไม่
if (isset($_SESSION["order_id"])) {
    $orderID = $_SESSION["order_id"];
    $Total_price = $_POST['Total_price'];
    $payment_date = isset($_POST['payment_date']) ? $_POST['payment_date'] : '';
    $payment_time = isset($_POST['payment_time']) ? $_POST['payment_time'] : '';

    // อัปโหลดไฟล์ภาพหลักฐานการชำระเงิน
   
    if (is_uploaded_file($_FILES['payment_image']['tmp_name'])){
        $new_image_name = 'payment_'.uniqid().".".pathinfo(basename($_FILES['payment_image']['name']),PATHINFO_EXTENSION);
        $image_upload_path = ".././img/".$new_image_name;
        move_uploaded_file($_FILES['payment_image']['tmp_name'],$image_upload_path);
    }else{
        $new_image_name ="";
    }

    // เตรียมคำสั่ง SQL เพื่อบันทึกข้อมูลลงในฐานข้อมูล
    $sql = "INSERT INTO payment (orderID, Total_price, payment_date, payment_time, payment_image)
            VALUES ('$orderID', '$Total_price', '$payment_date', '$payment_time', '$new_image_name')";

    // ทำการ query และตรวจสอบผลลัพธ์
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // ถ้าบันทึกข้อมูลสำเร็จให้แสดงข้อความแจ้งเตือนและ redirect ไปยังหน้าต่าง ๆ ตามที่ต้องการ
        echo "<script>alert('บันทึกการชำระเงินเรียบร้อยแล้ว');</script>";
        echo "<script> window.location='product_show.php';</script>";        
    } else {
        // ถ้าไม่สามารถบันทึกข้อมูลได้ให้แสดงข้อความแจ้งเตือน
        echo "<script>alert('ไม่สามารถบันทึกข้อมูลได้');</script>";
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    mysqli_close($conn);
} else {
    // หากไม่มี order_id ใน session ให้แสดงข้อความแจ้งเตือนหรือทำการ redirect ไปยังหน้าอื่นตามที่ต้องการ
    echo "<script>alert('มีข้อผิดพลาดในการรับข้อมูลจากฟอร์ม');</script>";
}
?>
