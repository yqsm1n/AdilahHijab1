<?php 
include '../connect.php';
session_start();

if(isset($_POST['submit'])) {
    // รับค่าจากฟอร์มล็อกอิน
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];

    // เข้ารหัสรหัสผ่าน
    $hashed_password = hash('sha512', $user_password);

    // ค้นหาข้อมูลผู้ใช้ในฐานข้อมูล
    $sql = "SELECT * FROM user WHERE user_name='$user_name' AND user_password='$hashed_password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // ล็อกอินสำเร็จ
        $_SESSION['user_name'] = $user_name;
        header("Location: ../front-end/product_show.php"); // ส่งไปยังหน้า Dashboard
        exit(); // ออกจากสคริปต์
    } else {
        // ล็อกอินไม่สำเร็จ
        $_SESSION["Error"] = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
        header("Location: user_login.php"); // ส่งกลับไปยังหน้าล็อกอิน
        exit(); // ออกจากสคริปต์
    }
}
?>
