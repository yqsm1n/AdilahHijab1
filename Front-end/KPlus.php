<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>QR พร้อมเพย์</title>
        <!-- เรียกใช้งาน Bootstrap CSS -->
        <link href="css/styles.css" rel="stylesheet" />
        <!-- เรียกใช้งาน fontawesome -->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<style>
@import url('https://fonts.googleapis.com/css2?family=Fenix&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Fenix&family=Sarabun:wght@300&display=swap');
/* รูปแบบทั่วไป */
.body {
    font-family: 'Sarabun', sans-serif;
    color: #333;
    background-color: #f8f9fa;
  ;
}
.container {
    display: grid;
    place-items: center;
    height: 70vh; /* ความสูงของหน้าจอ */
}

.card {
    width: 1000px;
    padding: 20px;
    border-radius: 10px;
    background-color: white;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    
}


/* สไตล์ของ input */
.form-control {
    padding: 18px;  /* ความกว้าง*/
    border-radius: 5px; /* ความโค้งของขอบ */
    border: 1px solid #ccc;
    width: 90%;
    margin-bottom: 20px;
  
   
    

}

</style>
<body>
    <div class="container"> <!-- จัดให้อยู่ตรงกลางหน้า -->
    <div class="row justify-content-center">
    <div class="col-lg-9"> <!-- ขนาดการ์ด -->
            <div class="card shadow-lg border-0 rounded-lg mt-5"> <!-- ส่วนหัวข้อของการ์ด -->
                <div class="card-header">
                    <h3 style="font-family: 'Sarabun', sans-serif; font-weight: bold; color: #333; font-size: 28px; text-align: center; ">K PLUS</h3></div>
                    <!-- ส่วนเนื้อหาของการ์ด -->     
                <div class="card-body"> 
                <h3 style="text-align: center; font-family: 'Sarabun', sans-serif;">
                    เลขบัญชี : 9323377104 <br></br>
                    ชื่อบัญชี : นางสาวยัสมิน ปูเต๊ะ
                </h3>

                            <div class="row mb-2">
                                <div class="col-md" style="font-family: 'Sarabun', sans-serif" >
                                <p >หลักฐานการโอนเงิน : </p>
                                <div class="form-floating my-3"> 
                                        <label for="product_img" style="font-weight: bold; color: #333; font-size: 16px; margin-bottom: 8px;"></label>
                                        <input type="file" id="image" name="product_img" accept="image/*" style="padding: 8px; border-radius: 5px; border: 1px solid #ccc; width: 100%; margin-bottom: 12px;">

<div style="display: flex; justify-content: center; align-items: center;">
    <button style="background-color: green; color: white; border: none; padding: 15px 30px;
            text-align: center; text-decoration: none; font-size: 16px; transition-duration: 0.4s;
            cursor: pointer; border-radius: 12px;" onclick="location.href='show_category.php'">ยืนยันการชำระเงิน</button>
</div>

 
    </form>
                </div>
            </div>
        </div>
    </div>
</div>
