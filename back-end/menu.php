<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>menu</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
</head>
<style>
body {font-family:  'Sarabun', sans-serif; }

.navbar-brand{
    font-size: 22px;
    font-family: 'Sarabun', sans-serif; 
    font-weight: bold;
    color : #B48E43;
}
.nav{
    font-size: 18px;
    font-family: 'Sarabun', sans-serif; 
    font-weight: bold;
    color : #FDF5E6;
   
}
</style>
<!-------------------------------------------------------- ส่วนแทบด้านบน -------------------------------------------------------------------------->  
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark" style=" background-color: #FDF5E6; ">
            <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="homepage.php">ADILAH HIJAB</a>
            <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" style="color: #B48E43;" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
<!--------------------------------------------------------- Navbar Search------------------------------------------------------------------------->
<form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0"  >
   
</form>
<!--------------------------------------------------------------- Navbar-------------------------------------------------------------------------->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" style="color: #B48E43;" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" >
                <li><a class="dropdown-item" href="logout.php">ออกจากระบบ</a></li>
            </ul>
        </li>
    </ul>
</nav>

<!------------------------------------------------------ เมนูด้านข้าง ------------------------------------------------------------------------------->  
<div id="layoutSidenav">
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion" style=" background-color: #B48E43"  id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
            <div class="sb-sidenav-menu-heading" >เมนู</div>
<!-------------------------------------------------- หน้าแรก/homepage.php ------------------------------------------------------------------------->
                <a class="nav-link" style="color:#FDF5E6;" href="homepage.php">
                    <div class="sb-nav-link-icon" style="font-family: 'Sarabun', sans-serif; font-weight: Bold;"> 
                    <i class="fa-solid fa-house fa-lg" style="color: #ffffff;"></i></div>หน้าแรก</a>    
<!-------------------------------------------------- สินค้า/product.php ------------------------------------------------------------------------->
                <a class="nav-link collapsed" style="color:#FDF5E6;" href="product.php" data-bs-toggle="collapse" data-bs-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts1">
                    <div class="sb-nav-link-icon">
                        <i class="fa-solid fa-shop fa-lg" style="color: #ffffff;"></i>
                    </div>
                    ข้อมูลสินค้า
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                    <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav" style="color:#FDF5E6;">
                            <a class="nav-link" style="color:#FDF5E6;" href="product_show.php">สินค้าทั้งหมด</a>
                            <a class="nav-link" style="color:#FDF5E6;" href="category_show.php">ประเภทสินค้า</a>
                            <a class="nav-link" style="color:#FDF5E6;" href="size/show_product_size.php">ไซต์สินค้า</a>
                            <a class="nav-link" style="color:#FDF5E6;" href="stock_product.php">สต๊อกสินค้า</a>
                        </nav>
                    </div>

                <a class="nav-link collapsed" style="color:#FDF5E6;" href="product.php" data-bs-toggle="collapse" data-bs-target="#collapseLayouts3" aria-expanded="false" aria-controls="collapseLayouts3">
                    <div class="sb-nav-link-icon">
                        <i class="fa-solid fa-cart-shopping fa-lg" style="color: #ffffff;"></i>
                    </div>
                    ข้อมูลรายการสั่งซื้อ
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                    <div class="collapse" id="collapseLayouts3" aria-labelledby="headingThree" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav" style="color:#FDF5E6;">
                            <a class="nav-link" style="color:#FDF5E6;" href="order_show.php">รายการสั่งซื้อ</a>
                        </nav>
                    </div>


                <a class="nav-link collapsed" style="color:#FDF5E6;" href="product.php" data-bs-toggle="collapse" data-bs-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts2">
                    <div class="sb-nav-link-icon">
                        <i class="fa-solid fa-users-gear fa-lg" style="color: #ffffff;"></i>
                    </div>
                    ข้อมูลผู้ใช้งานระบบ
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                    <div class="collapse" id="collapseLayouts2" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav" style="color:#FDF5E6;">
                            <a class="nav-link" style="color:#FDF5E6;" href="user/show_user.php">ข้อมูลผู้ใช้งานระบบ</a>
                        </nav>
                    </div>

                <a class="nav-link collapsed" style="color:#FDF5E6;" href="order.php" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-chart-pie fa-lg" style="color: #ffffff;"></i></div>
                    รายงาน
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">  
                        <a class="nav-link" style="color:#FDF5E6;" href="order_show.php">รายงานการสั่งสินค้า</a>
                        <a class="nav-link" style="color:#FDF5E6;" href="report_sale1.php">รายงานการขายสินค้า</a>
                        <a class="nav-link" style="color:#FDF5E6;" href="pro_stock.php">รายงานสินค้าใกล้หมด</a>
                    </nav>                                    
                </div>

                    <a class="nav-link" style="color:#FDF5E6;" href="login.php">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-right-to-bracket fa-lg" style="color: #ffffff;"></i></div>ออกจากระบบ</a>
        </div>
    </div>  
    </nav>
</body>
</div>