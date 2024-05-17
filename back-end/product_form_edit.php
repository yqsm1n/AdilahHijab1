<?php
include '../connect.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>แก้ไขสินค้า</title>
        <!-- เรียกใช้งาน Bootstrap CSS -->
        <link href="css/styles.css" rel="stylesheet" />
        <!-- เรียกใช้งาน fontawesome -->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
</head>

<body>
<?php
    include 'menu.php';
    $product_id = $_GET['product_id'];
    $sql1="SELECT * FROM product WHERE product_id='$product_id'";
    $result =mysqli_query($conn,$sql1);
    $rs=mysqli_fetch_array($result);
    ?>
        <div class="container"> <!-- จัดให้อยู่ตรงกลางหน้า -->
            <div class="row justify-content-center"> <!-- เรียกใช้งาน Bootstrap CSS -->
                <div class="col-lg-9 mt-5"> <!-- ขนาดการ์ด -->
                    <div class="card shadow-lg border-0 rounded-lg mt-5"> <!-- ส่วนหัวข้อของการ์ด -->
                        <div class="card-header">
                            <h3 style="font-family: 'Sarabun', sans-serif; font-weight: bold; color: #333; font-size: 28px; " class="text-center font-weight-light my-4">แก้ไขข้อมูลสินค้า</h3>
                        </div>                
                            <div class="card-body"> 
                                <form method="POST" action="product_update.php" enctype="multipart/form-data"> 
                                    <div class="row mb-2">
                                        <div class="col-md">
                                        
                                        <div class="form-floating my-3 ">
                                            <label for="product_id">รหัสสินค้า</label><br><br>
                                            <input class="form-control" name="product_id" type="number"  value=<?=$rs['product_id']?> readonly/>
                                        </div>

                                            <label for="type" style="font-family: 'Sarabun', sans-serif; font-weight: bold; color: #333; font-size: 16px;">โปรดเลือกประเภทสินค้า</label>
                                            <select id="type" name="type_id" style="padding: 12px; font-family: 'Sarabun', sans-serif; border-radius: 5px; border: 1px solid #ccc; width: 200px; margin:15px;">
                                                <?php 
                                                    $sql = "SELECT * FROM product_type ORDER BY type_name";
                                                    $hand = mysqli_query($conn,$sql);
                                                    while($row=mysqli_fetch_array($hand)){
                                                        $type_id =$row['type_id'];
                                                ?>
                                                    <option value="<?=$row['type_id']?>" <?php if($type_id==$type_id){echo "selected=selected";} ?> > 
                                                    <?=$row['type_name']?></option> 
                                                <?php
                                                    }
                                                    mysqli_close($conn); 
                                                ?> 
                                            </select> 

                                            <div class="form-floating my-3"> 
                                                <input class="form-control" name="product_name" type="text" value=<?=$rs['product_name']?> require/>
                                                <label for="product_name"style="font-family: 'Sarabun', sans-serif; font-weight: bold; color: #333; font-size: 16px; ">ชื่อสินค้าสินค้า</label>
                                            </div>
                                        
                                            <div class="form-floating my-3"> 
                                                <input class="form-control" name="product_detail" input type="text" value=<?=$rs['product_detail']?>  />
                                                <label for="product_detail"style="font-family: 'Sarabun', sans-serif; font-weight: bold; color: #333; font-size: 16px; ">รายละเอียดสินค้า</label>

                                            <div class="form-floating my-3"> 
                                                <input class="form-control" name="product_color" input type="text" value=<?=$rs['product_color']?>  />
                                                <label for="product_color"style="font-family: 'Sarabun', sans-serif; font-weight: bold; color: #333; font-size: 16px; ">สี</label>
                                       
                                            <!--<div class="form-floating my-3"> 
                                                <input class="form-control" name="product_price" input type="number" value=<?=$rs['product_price']?>  />
                                                <label for="product_price" style="font-family: 'Sarabun', sans-serif; font-weight: bold; color: #333; font-size: 16px; ">ราคาสินค้า</label> -->
                                        
                                            <div class="form-floating my-3"> 
                                                <p style="font-family: 'Sarabun', sans-serif; font-weight: bold; color: #333; font-size: 16px; ">เพิ่มรูปภาพ</p>
                                                <label for="product_img" style="font-weight: bold; color: #333; font-size: 16px; margin-bottom: 8px;"></label>
                                                <img src="../img/<?=$rs['product_img']?>" width="100px" height="150px"><br><br>
                                                <input type="file" id="image" name="product_img" accept="image/*" style="padding: 8px; border-radius: 5px; border: 1px solid #ccc; width: 100%; margin-bottom: 12px;">
                                                <input type="hidden"name="txtimg" class="form-control" value=<?=$rs['product_img']?>  />
                                            </div>

                                            <div class="form-floating my-3"> 
                                                <p style="font-family: 'Sarabun', sans-serif; font-weight: bold; color: #333; font-size: 16px; ">เพิ่มรูปภาพ</p>
                                                <label for="product_img2" style="font-weight: bold; color: #333; font-size: 16px; margin-bottom: 8px;"></label>
                                                <img src="../img/<?=$rs['product_img2']?>" width="100px" height="150px"><br><br>
                                                <input type="file" id="image" name="product_img2" accept="image/*" style="padding: 8px; border-radius: 5px; border: 1px solid #ccc; width: 100%; margin-bottom: 12px;">
                                                <input type="hidden"name="txtimg2" class="form-control" value=<?=$rs['product_img2']?>  />
                                            </div>

                                            <div class="form-floating my-3"> 
                                                <p style="font-family: 'Sarabun', sans-serif; font-weight: bold; color: #333; font-size: 16px; ">เพิ่มรูปภาพ</p>
                                                <label for="product_img3" style="font-weight: bold; color: #333; font-size: 16px; margin-bottom: 8px;"></label>
                                                <img src="../img/<?=$rs['product_img3']?>" width="100px" height="150px"><br><br>
                                                <input type="file" id="image" name="product_img3" accept="image/*" style="padding: 8px; border-radius: 5px; border: 1px solid #ccc; width: 100%; margin-bottom: 12px;">
                                                <input type="hidden"name="txtimg3" class="form-control" value=<?=$rs['product_img3']?>  />
                                            </div>

                                            
                                                
                                                
                                            <div style="display: flex; flex-wrap: wrap;">
                                                <p style="font-family: 'Sarabun', sans-serif; font-weight: bold; color: #333; font-size: 16px; ">จำนวน</p>
                                            
                                                <div class="form-floating my-3" style="display: flex; align-items: center; margin-right: 10px;"> 
                                                    <p style="font-family: 'Sarabun', sans-serif; color: #333; font-size: 16px; margin: 0;">ไซต์ S</p>
                                                    <input style="padding: 12px; border-radius: 5px; border: 1px solid #ccc; width: 100px; margin-left: 10px; margin-right: 10px;" class="form-control" name="size_s" input type="number"  value=<?=$rs['size_s']?> />ตัว
                                                </div>

                                                <div class="form-floating my-3" style="display: flex; align-items: center; margin-right: 10px;"> 
                                                    <p style="font-family: 'Sarabun', sans-serif; color: #333; font-size: 16px; margin: 0; margin-right: 10px;">ไซต์ M</p>
                                                    <input style="padding: 12px; border-radius: 5px; border: 1px solid #ccc; width: 100px; margin-left: 10px; margin-right: 10px;" class="form-control" name="size_m" input type="number" value=<?=$rs['size_m']?> />ตัว
                                                </div>

                                                <div class="form-floating my-3" style="display: flex; align-items: center; margin-right: 10px;"> 
                                                    <p style="font-family: 'Sarabun', sans-serif; color: #333; font-size: 16px; margin: 0; margin-right: 10px;">ไซต์ L</p>
                                                    <input style="padding: 12px; border-radius: 5px; border: 1px solid #ccc; width: 100px; margin-left: 10px; margin-right: 10px;" class="form-control" name="size_L" input type="number" value=<?=$rs['size_L']?> />ตัว
                                                </div>
                                        
                                                <div class="form-floating my-3" style="display: flex; align-items: center;"> 
                                                    <p style="font-family: 'Sarabun', sans-serif; color: #333; font-size: 16px; margin: 0;">ไซต์ XL</p>
                                                    <input style="padding: 12px; border-radius: 5px; border: 1px solid #ccc; width: 100px; margin-left: 10px; margin-right: 10px;" class="form-control" name="size_XL" input type="number" value=<?=$rs['size_XL']?> />ตัว
                                                </div>
                                                
                                                <div class="form-floating my-3" style="display: flex; align-items: center;"> 
                                                    <p style="font-family: 'Sarabun', sans-serif; color: #333; font-size: 16px; margin: 0;">Over size</p>
                                                    <input style="padding: 12px; border-radius: 5px; border: 1px solid #ccc; width: 100px; margin-left: 10px; margin-right: 10px;" class="form-control" name="over_size" input type="number" value=<?=$rs['over_size']?> />ตัว
                                                </div>
                                            </div>

                                        <div style="display: flex; flex-wrap: wrap;">
                                        <p style="font-family: 'Sarabun', sans-serif; font-weight: bold; color: #333; font-size: 16px; ">ราคาสินค้า</p>
                                            <div class="form-floating my-3" style="display: flex; align-items: center; margin-right: 10px;"> 
                                                <p style="font-family: 'Sarabun', sans-serif; color: #333; font-size: 16px; margin: 0;">ราคาต้นทุน</p>
                                                <input style="padding: 12px; border-radius: 5px; border: 1px solid #ccc; width: 300px; margin-left: 10px; margin-right: 10px;" class="form-control" name="product_name" input type="number" value=<?=$rs['cost_price']?> />บาท
                                            </div>

                                            <div class="form-floating my-3" style="display: flex; align-items: center; margin-right: 10px;"> 
                                                <p style="font-family: 'Sarabun', sans-serif; color: #333; font-size: 16px; margin: 0; margin-right: 10px;">ราคาขาย</p>
                                                <input style="padding: 12px; border-radius: 5px; border: 1px solid #ccc; width: 300px; margin-left: 10px; margin-right: 10px;" class="form-control" name="product_name" input type="number" value=<?=$rs['product_price']?> />บาท
                                            </div>
                                        </div>
                                                    
                                            <div class="d-flex align-items-center justify-content-center mt-4 mb-0 ">
                                                <button type="submit" name="product_update" class="btn btn-primary " style="font-family: 'Sarabun', sans-serif; font-weight: bold; background-color: #35B752;  border-color: #35B752; padding: 10px 50px;">อัพเดตข้อมูล</button>
                                            </div>
                                        </div>
                                    </div>
                                </div> 
                            </form>
                    </div>                    
                </div>
            </div>
        </div>
    </div>                                     
</div>

</body>
</html>