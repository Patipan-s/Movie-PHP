<?php
if(isset($_POST['insert']))
{
     // เรียกใช้โค้ดจาก upload.php
     include "upload.php";

     // เช็คว่าอัพโหลดผ่านหรือไม่
     if ($uploadOk == 0) {

        // หากไม่อัพโหลดไม่ผ่านแสดง Modal แจ้งเตือน
        echo '

          <div id="exampleModal" class="modal" style="display: block" >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger" id="exampleModalLabel">แจ้งเตือน <i class="fas fa-bell text-danger"></i></h5>
                    <button type="button" class="close" aria-label="Close" onclick="document.getElementById(\'exampleModal\').style.display=\'none\'">
                    <span aria-hidden="true" class="text-danger">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span class="text-danger"> ไฟล์ของคุณยังไม่ถูกอัพโหลด </span> กรุณาเช็คไฟล์รูปของท่าน
                </div>
                <div class="modal-footer">
                    <button  class="btn btn-danger" onclick="document.getElementById(\'exampleModal\').style.display=\'none\'">ปิด</button>
                </div>
                </div>
            </div>
            </div>
          
          ';
        
     }else{ //หากผ่านทำการเชื่อมต่อฐานข้อมูล

        // ตั้งตัวแปลติอต่อไปยังฐานข้อมูล
        $db_host = 'localhost';  // ชื่อเซฟเวอร์
        $db_user = 'root';  // ชื่อผู้ใช้
        $db_pass = '';  // พาสเวิด
        $db_name = 'moviedb'; // ชื่อฐานข้อมูล
        $connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

        // ตั้งตัวแปลเพื่อรับค่า
        $name =$_POST['name'];
        $day = $_POST['day'];
        $month = $_POST['month'];
        $year = $_POST['year'];
        $describe = $_POST['describe'];
        $image = $_FILES["imageUpload"]["name"];
        
        // กำหนดว่าเราเพิ่มข้อมูลลงไปในฟีวไหนบ้าง และใช้ตัวแปลไหนแทนฟีวไหน เช่า name แทนด้วย $name
        $query = "INSERT INTO `movietable`(`name`,`img`, `day`, `month`,`year`,`describe`) VALUES ('$name','$image','$day','$month','$year','$describe')";
        $result = mysqli_query($connect,$query);
        
        // เช็คการเพิ่มข้อมูลว่าสำเร็จหรือไม่
        // หากเชื่อต่อไม่ได้
        if(!$result){
            die('query failed'.mysqli_error());
        }
            // หากเชื่อต่อได้
            else{

                // แสดง Modal แจ้งเตือน
                echo '
                    <div id="exampleModal" class="modal" style="display: block" >
                        <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title text-success" id="exampleModalLabel">แจ้งเตือน <i class="fas fa-bell text-success"></i></h5>
                            <button type="button" class="close" aria-label="Close" onclick="document.getElementById(\'exampleModal\').style.display=\'none\'">
                                <span aria-hidden="true" class="text-success">&times;</span>
                            </button>
                            </div>
                            <div class="modal-body">
                            เพิ่มข้อมูลหนังเรื่อง '.$name.' <span class="text-success">สำเร็จแล้ว </span>
                            </div>
                            <div class="modal-footer">
                            <button class="btn btn-success" onclick="document.getElementById(\'exampleModal\').style.display=\'none\'">ตกลง</button>
                            </div>
                        </div>
                        </div>
                    </div>          
                ';
            }
     }


   
}

?>
    <!-- ส่วน html -->
    <!DOCTYPE html>

    <html>

    <head>

        <title>เพิ่มข้อมูลใหม่ </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/fontawesome-all.min.css">
        <link rel="stylesheet" href="css/stylesheet.css">
    </head>

    <body>
        <!-- เมนูบาร์ -->
        <nav class="nav nav-pills nav-fill fixed-top ">
            <a class="nav-item nav-link  text-warning" href="index.php">
                <i class="fas fa-align-right"></i> โปรแกรมหนัง</a>
            <a class="nav-item nav-link bg-warning text-dark" href="insert_movie.php">
                <i class="fas fa-plus"></i> เพิ่มหนัง</a>
            <a class="nav-item nav-link text-warning" href="updated_movie.php">
                <i class="fas fa-edit"></i> แก้ไขข้อมูลหนัง</a>
        </nav>

        <div class="container">

            <div class="container">
                <h1 class="text-center">เพิ่มหนังใหม่</h1>
            </div>


            <!-- แบบฟอร์มการเพิ่มข้อมูล -->
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <form action="insert_movie.php" method="post" enctype="multipart/form-data">

                        <!-- กรอกชื่อหนัง -->
                        <div class="form-group">
                            <label for="name">ชื่อหนัง</label>
                            <input type="text" name="name" class="form-control" pattern="[^':]*$" title="ไม่อนุญาติให้ใส่สัญลักษณ์ ( ' ) single quote "
                                required>
                        </div>


                        <div class="row">
                            <!-- กรอกวันที่เข้าฉ่ายของหนัง -->
                            <div class="form-group col-sm-4">
                                <label for="day">วันที่เข้าฉาย</label>
                                <input type="number" name="day" class="form-control" min="1" max="31" required>
                            </div>
                            <!-- เลือกเดือนที่เข้าฉาย -->
                            <div class="form-group col-sm-4">
                                <label for="month">เดือนที่เข้าฉาย</label>
                                <select class="form-control" name="month">
                                    <option value=""></option>
                                    <option value="มกราคม">มกราคม</option>
                                    <option value="กุมภาพันธ์">กุมภาพันธ์</option>
                                    <option value="มีนาคม">มีนาคม</option>
                                    <option value="เมษายน">เมษายน</option>
                                    <option value="พฤษภาคม">พฤษภาคม</option>
                                    <option value="มิถุนายน">มิถุนายน</option>
                                    <option value="กรกฎาคม">กรกฎาคม</option>
                                    <option value="สิงหาคม">สิงหาคม</option>
                                    <option value="กันยายน">กันยายน</option>
                                    <option value="ตุลาคม">ตุลาคม</option>
                                    <option value="พฤศจิกายน">พฤศจิกายน</option>
                                    <option value="ธันวาคม">ธันวาคม</option>
                                </select>
                            </div>
                            <!-- กรอกปีที่เข้าฉาย -->
                            <div class="form-group col-sm-4">
                                <label for="year">ปีที่เข้าฉาย</label>
                                <select class="form-control" name="year">
                                    <option value="2561">2561</option>
                                    <option value="2562">2562</option>
                                    <option value="2563">2563</option>
                                    <option value="2564">2564</option>
                                    <option value="2565">2565</option>

                                </select>
                            </div>
                        </div>

                        <!-- อัพโหลดรูป -->
                        <div class="form-group">
                            <label class="btn btn-warning col-sm-12">
                                <i class="fas fa-folder-open"></i> เลือกรูปโปสเตอร์หนัง
                                <input type="file" name="imageUpload" class="form-control" accept="image/*" required >
                            </label>
                        </div>

                        <!-- เรื่องย่อของหนัง -->
                        <div class="form-group">
                            <label for="describe">เรื่องย่อ</label>
                            <textarea name="describe" class="form-control" rows="5" placeholder="ไม่อนุญาติให้ใส่สัญลักษณ์ ( ' ) single quote"></textarea>
                        </div>
                        <!-- กดปุ่มเพื่อเรียกใช้ ฟังก์ชั่น insert เพิ่มข้อมูล -->
                        <button class="btn btn btn-success col-sm-12 " type="submit" name="insert" onclick="document.getElementById('exampleModal').style.display='block'">
                            <i class="fas fa-upload"></i> บันทึกข้อมูล</button>

                    </form>
                </div>
                <div class="col-sm-3"></div>
            </div>

        </div>



    </body>

    </html>