<?php
session_start();
include '../connect.php';
if (isset($_SESSION['user_name'])) {
    $user_name = $_SESSION['user_name'];
}  // ถ้าไม่ได้ล็อกอิน ให้ redirect กลับไปที่หน้า login


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>ตะกร้าสินค้า</title>
	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
	<link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="./node_modules/@fortawesome/fontawesome-free/css/all.min.css" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/util.css">

	<script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<style>
/* ปรับขนาดของเซลล์ในตาราง */
.table-row > * {
    padding: 50px; /* ปรับขนาดพื้นที่ระหว่างเซลล์ */
    
}

/* ปรับแต่งหัวตาราง */
.table-head > * {
	text-align: center;
    
}


    .container{
     font-family: 'Sarabun', sans-serif;
     color: #333;
     font-size: 16px;
    }

</style>

<body class="animsition">
<?php include 'menu1.php'; ?>   
	

	<!-- Cart -->
	<section class="cart bgwhite p-t-80 p-b-150">
		<div class="container">
			<form name = "form1" method="POST" action ="insert_cart.php">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="border p-2 bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th>ลำดับที่</th>
							<th class="column-1"></th>
							<th class="column-2">ชื่อสินค้า</th>
                           	<th class="column-3">ไซต์</th>
                            <th class="column-4">สี</th>
							<th class="column-5">ราคา</th>
							<th class="column-6 ">จำนวน</th>
							<th class="column-7">ราคารวม</th>
							<th class="column-8">ลบ</th>
						</tr>
                        
						<?php 
                        $total = 0;
                        $m = 1;
                        $sumPrice = 0;
						$product_size = '';
                        

                        for ($i=0; $i <= (int)$_SESSION["intLine"]; $i++){
                            if(($_SESSION["strProduct_id"][$i]) != ""){
                                $sql1="SELECT * FROM product WHERE product_id = '". $_SESSION["strProduct_id"][$i]."' " ;
                                $result1 = mysqli_query($conn , $sql1);
                                $row_pro = mysqli_fetch_array($result1);
                        
                                $_SESSION["product_price"] = $row_pro['product_price'];
                                $Total = $_SESSION["strQty"][$i];
                                $sum = $Total * $row_pro['product_price'];
                                $sumPrice = $sumPrice + $sum; // บวกรวมค่าทุก iteration
                                //$sumPriceFormatted = number_format($sumPrice); // จัดรูปแบบตัวเลข
                                $_SESSION["sum_price"] = $sumPrice;
							
								

                             
                        ?>
						<tr class="table-row">
                            <td><?=$m?></td>
                            <td class="column-1">
                                <div class="cart-img-product b-rad-4 o-f-hidden">
                                    <img src="../img/<?=$row_pro['product_img']?>" width="80" height="100" >
                                </div>
                            </td>
                            <td class="column-2"><?=$row_pro['product_name']?></td>
							<td class="column-3"><?=$_SESSION["strProduct_size"][$i]?></td>

                            <td class="column-4"><?=$row_pro['product_color']?></td>
                            <td class="column-5"><?=$row_pro['product_price']?></td>
                            <td class="column-6">
                                <div class="flex-w bo5 of-hidden w-size17">
                                    <a href="order_del.php?product_id=<?=$row_pro['product_id']?>" class="btn-num-product color1 flex-c-m size7 bg8 eff2"><i class="fs-12 fa fa-minus" aria-hidden="true"></i></a>
                                    <input class="size8 m-text18 t-center num-product" type="number" name="num-product<?= $row_pro['product_id'] ?>" value="<?= $_SESSION["strQty"][$i] ?>">
                                    <a href="order.php?product_id=<?=$row_pro['product_id']?>" class="btn-num-product color1 flex-c-m size7 bg8 eff2"><i class="fs-12 fa fa-plus" aria-hidden="true"></i></a>
                                </div>
                            </td>
                            <td class="column-7"><?=$sum?></td>
                            <td class="column-8"><a href="cart_delete.php?Line=<?=$i?>"><i class="fa-solid fa-circle-xmark fa-2xl" style="color: #f60909;"></i></a></td>
                        </tr>
                        <?php 
                            } 
                            $m = $m+1;
                        } 
                        ?>
						<tr style="font-weight: bold;">
                    		<td class="text-center" colspan="7">รวมเป็นเงิน</td>
                    		<td class="text-center"><?=$sumPrice?></td>
                    		<td >บาท</td>
                   		</tr>
                    </table>
					
				</div>
			</div>

			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
				<div class="flex-w flex-m w-full-sm">
					<div class="size11 ">
						
					</div>

					
				</div>

				<div class="size10 trans-0-4 m-t-10 m-b-10">
					<!-- Button -->
					<a href="insert_cart.php" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" style=" font-family: 'Sarabun', sans-serif;">สั่งซื้อสินค้า</a>
				</div>
			</div>
			
		
			
			</div>
		</div>
	</section>
	

<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>