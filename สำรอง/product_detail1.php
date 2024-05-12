<?php
include '../connect.php';
session_start();
if (isset($_SESSION['user_name'])) {
	$user_name = $_SESSION['user_name'];
}
// ตรวจสอบว่ามีการส่ง product_id ผ่าน URL หรือไม่
if (isset($_GET['product_id'])) {
	$product_id = $_GET['product_id'];

	// สร้างคำสั่ง SQL เพื่อดึงข้อมูลสินค้าจากฐานข้อมูล
	$sql = "SELECT * FROM product WHERE product_id = $product_id";
	$result = mysqli_query($conn, $sql);

	// ตรวจสอบว่ามีข้อมูลสินค้าหรือไม่
	if (mysqli_num_rows($result) > 0) {
		// ดึงข้อมูลสินค้า
		$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<body>
<?php include 'head.php' ?>
<div class="container bgwhite p-t-35 p-b-80">
				<div class="flex-w flex-sb">
					<div class="w-size13 p-t-30 respon5">
						<div class="wrap-slick3 flex-sb flex-w">
							
							<div class="slick3">
							<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    							<div class="carousel-indicators">
        							<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        							<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        							<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    							</div>
    							<div class="carousel-inner">
        							<div class="carousel-item active">
            							<img src="../img/<?= $row['product_img'] ?>" class="d-block w-100" alt="...">
        							</div>
        							<div class="carousel-item">
            							<img src="../img/<?= $row['product_img2'] ?>" class="d-block w-100" alt="...">
        							</div>
        							<div class="carousel-item">
            							<img src="../img/<?= $row['product_img3'] ?>" class="d-block w-100" alt="...">
        							</div>
    							</div>
    								<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
        								<span class="visually-hidden">Previous</span>
    								</button>
    								<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        								<span class="carousel-control-next-icon" aria-hidden="true"></span>
        								<span class="visually-hidden">Next</span>
    								</button>
								</div>
							</div>
						</div>
					</div>

					<div class="w-size14 p-t-30 respon5">
						<h4 class="product-detail-name m-text16 p-b-13 "><?= $row['product_name'] ?></h4>
						<h4 class="product-detail-name m-text16 p-b-13 "><?= $row['product_color'] ?></h4>
                        <span class="m-text17">
							฿<?= $row['product_price'] ?>
						</span>

						<div class="p-t-33 p-b-60">
							<div class="flex-m flex-w p-b-10">
                        <h2>The select by devtai.com</h2>
<form action="http://devtai.com/">
  <b>อายุ</b> 
  <select name="old"> 
  	<option value="volvo">10</option>
    <option value="saab">15</option>
    <option value="fiat">20</option>
    <option value="audi">25</option>
  </select>
  <b>ขึ้นไป</b>
  <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
							<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
								รายละเอียดไซต์สินค้า
								<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
								<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
							</h5>

							<div class="dropdown-content dis-none p-t-15 p-b-23">
								<img src="../img/table_size.jpg" width="500px" height="200px">
							</div>
						</div> 
  <br><br>
  <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
							<h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
								รายละเอียดสินค้า
								<i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
								<i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
							</h5>

							<div class="dropdown-content dis-none p-t-15 p-b-23">
								<p class="s-text8">
									<?= $row['product_detail'] ?>
								</p>
							</div>
						</div><br></br>
  <input type="submit">
</form>
<?php
	} else {
		echo "ไม่พบข้อมูลสินค้า";
	}
} else {
	echo "Product ID is not set";
}
	?>
</body>
</html>