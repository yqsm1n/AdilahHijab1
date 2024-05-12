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
        <html lang="en">
        <?php include 'head.php' ?>
        <style>
            .button {
                margin-top: 20px;
                width: 50px;
                color: white;
                border: none;
                padding: 10px 10px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 8px 2px;
                transition-duration: 0.4s;
                cursor: pointer;
                border-radius: 12px;
            }

            .button1 {
                background-color: white;
                color: black;
                border: 2px solid #04AA6D;
            }

            .button1:hover {
                background-color: #04AA6D;
                color: white;
            }

            .button2 {
                background-color: white;
                color: black;
                border: 2px solid #04AA6D;
            }

            .button2:hover {
                background-color: #04AA6D;
                color: white;
            }

            .button3 {
                background-color: white;
                color: black;
                border: 2px solid #04AA6D;
            }

            .button3:hover {
                background-color: #04AA6D;
                color: white;
            }

            .button4 {
                background-color: white;
                color: black;
                border: 2px solid #04AA6D;
            }

            .button4:hover {
                background-color: #04AA6D;
                color: white;
            }
        </style>

        <body class="animsition">
            <?php include 'menu1.php'; ?>
            <!-- Product Detail -->
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
                                <form method="GET" action="order.php">
                                    <div class="flex-m flex-w p-b-10">
                                        <label style="font-family: 'Sarabun', sans-serif; font-weight: bold; color: #333; font-size: 16px;">Size : </label>
                                        <select name="product_size" style="padding: 12px; font-family: 'Sarabun', sans-serif; border-radius: 5px; border: 1px solid #ccc; width: 400px; margin:15px;">
                                            <option value="S">S</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                            <option value="XL">XL</option>
                                            <option value="Over Size">Over Size</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>

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


                        

                        <div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10 ml-auto">
						<a type="submit" href="order.php?product_id=<?= $row['product_id'] ?>">
    <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
        <i class="fa-solid fa-cart-plus fa-xl" style="color: #ffffff;"></i> เพิ่มลงตะกร้า
    </button>
</a>

                            
                        </div>
                        
    
    

                    </div>
                </div>
            </div>
            </div>
            </div>
            </div>
    <?php
    } else {
        echo "ไม่พบข้อมูลสินค้า";
    }
} else {
    echo "Product ID is not set";
}
    ?>









    <!--===============================================================================================-->
    <script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
    <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script>
    function addToCart() {
        var size = document.forms['form1']['product_size'].value;
        var productId = '<?= $row['product_id'] ?>';
        var link = 'order.php?product_id=' + productId + '&product_size=' + size;
        window.location.href = link;
    }
</script>

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
    <script type="text/javascript" src="vendor/slick/slick.min.js"></script>
    <script type="text/javascript" src="js/slick-custom.js"></script>
    <!--===============================================================================================-->
    <script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.block2-btn-addcart').each(function() {
            var product_name = $(this).parent().parent().parent().find('.block2-name').html();
            $(this).on('click', function() {
                swal(product_name, "เพิ่มลงในตะกร้าเรียบร้อย !", "success");
            });
        });

        $('.block2-btn-addwishlist').each(function() {
            var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
            $(this).on('click', function() {
                swal(nameProduct, "เพิ่มลงในตะกร้าเรียบร้อย !", "success");
            });
        });

        $('.btn-addcart-product-detail').each(function() {
            var nameProduct = $('.product-detail-name').html();
            $(this).on('click', function() {
                swal(nameProduct, "เพิ่มลงในตะกร้าเรียบร้อย !", "success");
            });
        });
    </script>
    <!--===============================================================================================-->

    <!--===============================================================================================-->
    <script src="js/main.js"></script>

        </body>

        </html>
