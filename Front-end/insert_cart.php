<?php
include '../connect.php'; 
session_start();
if (isset($_SESSION['user_name'])) {
    $user_name = $_SESSION['user_name'];
}  

// ดึงข้อมูลผู้ใช้จากฐานข้อมูล
$sql = "SELECT * FROM user WHERE user_name = '{$_SESSION["user_name"]}'";
$result = mysqli_query($conn, $sql);

// ตรวจสอบว่ามีข้อมูลหรือไม่
if (mysqli_num_rows($result) > 0) {
    // ดึงข้อมูลผู้ใช้
    $row = mysqli_fetch_assoc($result);
    
    // กำหนดค่าข้อมูลไว้ในตัวแปร
    $user_name = $row['user_name'];
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $user_telephone = $row['user_telephone'];
    $number_address = $row['number_address'];
    $moo_address = $row['moo_address'];
    $district_address = $row['district_address'];
    $amphoe_address = $row['amphoe_address'];
    $province_address = $row['province_address'];
    $postalcode = $row['postalcode'];

// ตรวจสอบ Session และคำนวณ $_SESSION["sum_price"]
if (isset($_SESSION['sum_price'])) {

    // สร้างคำสั่ง SQL เพื่อบันทึกข้อมูลลงในตาราง "order"
    $insert_sql = "INSERT INTO `order` (user_name,first_name,last_name, user_telephone, number_address, moo_address, district_address, amphoe_address, province_address, postalcode, total_price, order_status) 
                   VALUES ('$user_name', '$first_name', '$last_name', '$user_telephone', '$number_address', '$moo_address', '$district_address', '$amphoe_address', '$province_address', '$postalcode' , '".$_SESSION["sum_price"]."', '1')";

    // ดำเนินการในฐานข้อมูล: บันทึกข้อมูลลงในตาราง "order"
    if (mysqli_query($conn, $insert_sql)) {
       
        // หา order_id ที่เพิ่งเพิ่มเข้าไปในฐานข้อมูล
        $order_result = mysqli_query($conn, "SELECT LAST_INSERT_ID() as order_id");
        $order_row = mysqli_fetch_assoc($order_result);
        $orderID = $order_row['order_id'];

        // เก็บค่า orderID ลงใน session
        $_SESSION["order_id"] = $orderID;

        // วนลูปเพื่อ INSERT ข้อมูลในตาราง order_detail
        for ($i = 0; $i <= (int)$_SESSION["intLine"]; $i++) {
            if ($_SESSION["strProduct_id"][$i] != "") {
                // ดึงข้อมูลสินค้า
                $sql1 = "SELECT * FROM product WHERE product_id = '".$_SESSION["strProduct_id"][$i]."'";
                $result = mysqli_query($conn, $sql1);
                $row1 = mysqli_fetch_array($result);

                if ($row1) {
                    $product_price = $row1['product_price'];
                    $total = $_SESSION["strQty"][$i] * $product_price;
                    $_SESSION["strProduct_size"][$i];

                    // INSERT ข้อมูลในตาราง order_detail
                    $sql2 = "INSERT INTO order_detail (orderID, product_id, product_size, product_price, orderQty, Total)
                             VALUES ('$orderID', '".$_SESSION["strProduct_id"][$i]."','".$_SESSION["strProduct_size"][$i]."', '$product_price', '".$_SESSION["strQty"][$i]."', '$total')";
                    mysqli_query($conn, $sql2);

                    
                    // ตรวจสอบไซต์ที่เลือกและตัดสต็อกตาม
                    switch ($_SESSION["strProduct_size"][$i]) {
                        case 'S':
                            $sizeColumn = 'size_s';
                            break;
                        case 'M':
                            $sizeColumn = 'size_m';
                            break;
                        case 'L':
                            $sizeColumn = 'size_L';
                            break;
                        case 'XL':
                            $sizeColumn = 'size_XL';
                            break;
                        case 'Over Size':
                            $sizeColumn = 'over_size';
                            break;
                    }

                    // ตัดสต็อกสินค้าตามจำนวนและไซส์ที่เลือก
                    $sql3 = "UPDATE product 
                    SET ".$sizeColumn." = ".$sizeColumn." - '".$_SESSION["strQty"][$i]."'
                    WHERE product_id = '".$_SESSION["strProduct_id"][$i]."'";
                    mysqli_query($conn, $sql3);          
                } else {
                    echo "<script> alert('Error fetching product information.') </script>";
                }
            }
        }

        echo "<script> alert('บันทึกข้อมูลเรียบร้อยแล้ว') </script>";
        echo "<script> window.location='paymentt.php';</script>";

        // ล้าง Session
        unset($_SESSION["intLine"]);
        unset($_SESSION["strProduct_id"]);
        unset($_SESSION["strQty"]);
        unset($_SESSION["sum_price"]);
      
    } else {
        echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล: " . mysqli_error($conn);
    }
} else {
    echo "<script> alert('Error: sum_price is not set.') </script>";
}
} else {
    echo "ไม่พบข้อมูลผู้ใช้";
}
// ปิดการเชื่อมต่อฐานข้อมูล
mysqli_close($conn);
?>

