<?php 
//ob_start();
session_start();
include '../connect.php';


//เช็คว่าแถวเป็นค่าว่างไหม ถ้าว่างให้ทำงานใน{}
if (!isset($_SESSION["intLine"])) 
{
    $_SESSION["intLine"] = 0;                                   //แถวที่0หรือแถวแรก
    $_SESSION["strProduct_id"][0] = $_GET["product_id"];        //รหัสสินค้า
    $_SESSION["strProduct_size"][0] = $_GET["product_size"];    //ไซต์สินค้า
    $_SESSION["strQty"][0] = 1;                                 //จำนวนสินค้า
    header("location:product_cart.php");

//เพิ่มสินค้า-จำนวนสินค้า
} else {
    $key = array_search(($_GET["product_id"]), $_SESSION["strProduct_id"]);
    //ถ้ารหัสสินค้ามีอยู่แล้วจะบวกเพิ่ม 1 
    if ((string)$key != "") { 
        $_SESSION["strQty"][$key] = $_SESSION["strQty"][$key]+ 1;
    
    //ถ้าไม่มีรหัสสินค้ามีอยู่จะมาทำในส่วนนี้
    } else {
        $_SESSION["intLine"] = $_SESSION["intLine"] + 1; //เพิ่มแถวที่2
        $intNewLine = $_SESSION["intLine"];
        $_SESSION["strProduct_id"][$intNewLine] = ($_GET["product_id"]);
        $_SESSION["strProduct_size"][$intNewLine] = ($_GET["product_size"]);
        $_SESSION["strQty"][$intNewLine] = 1;
        
    }

    header("location:product_cart.php");
}
?> 
