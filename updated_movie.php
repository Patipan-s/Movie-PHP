<?php

// ทำงานเมื่อกดปุ่ม submit ที่มีชื่อว่า update
if(isset($_POST['update']))
{
    // เรียกฟังชั่นการอัพโหลดรูป
    include "upload.php";

    // หากอัพโหลดไม่สำเร็จ
    if ($uploadOk == 0) {

        // แสดง Modal แจ้งเตือน
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
                    อัพเดท<span class="text-danger"> ไม่สำเร็จ </span>กรุณาเช็คไฟล์รูปของท่าน
                </div>
                <div class="modal-footer">
                    <button  class="btn btn-danger" onclick="document.getElementById(\'exampleModal\').style.display=\'none\'">ปิด</button>
                </div>
                </div>
            </div>
            </div>
          
          ';

     }else{ //หากอัพโหลดสำเร็จ

    // ทำการเชื่อมต่อฐานข้อมูล
   $hostname = "localhost";
   $username = "root";
   $password = "";
   $databaseName = "moviedb";
   $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    
    // รับค่า Id จาก input name ว่า id
    $id = $_POST['id'];
    
    // ไปเลือกชื่อในคอลัม img ที่มีค่า id ตรงกับที่กรอกไป
    $sql = "SELECT img FROM movietable WHERE id = $id";
    $imgquery = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($imgquery);

    // ทำการลบรูปในโฟลเดอร์ที่มีชื่อเดียว
    unlink('img/'.$row['img']);
   
   // ตั้งตัวแปลรับค่าจาก input ใน form 
    $id = $_POST['id'];
    $name = $_POST['name'];
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $describe = $_POST['describe'];
    $image = $_FILES["imageUpload"]["name"];

           
   // ทำการแทนที่ค่าในแต่ละตัวที่กำหนด
   $query = "UPDATE `movietable` SET `name`='".$name."',`img`='".$image."',`day`=".$day.",`month`='".$month."',`year`=".$year.",`describe`='".$describe."' WHERE `id` = $id";
   $result = mysqli_query($connect, $query);
   
    // เช็คการแทนที่สำเร็จหรือไม่
   if($result)
   {

    // หากสำเร็จแสดง Modal แจ้งเตือน
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
                    อัพเดทข้อมูล <span class="text-success"> สำเร็จ </span>
                </div>
                <div class="modal-footer">
                    <button  class="btn btn-success" onclick="document.getElementById(\'exampleModal\').style.display=\'none\'">ตกลง</button>
                </div>
                </div>
            </div>
            </div>
          
          ';
   }else{
    $update = 'แก้ไขข้อมูลไม่สำเร็จ';
   }

    // ยกเลิกการเชื่อมต่อ
   mysqli_close($connect);
}
}

// ทำงานเมื่อกดปุ่ม submit ที่มีชื่อว่า delete
if(isset($_POST['delete']))
{
    
    // เชื่อมต่อไปยังฐานข้อมูล
    $connect = mysqli_connect("localhost", "root", "", "moviedb");

    // ตั้งตัวแปลนรับค่าจาก input ที่ชื่อ name
    $name = $_POST['name'];
    
    $sql = "SELECT img FROM movietable WHERE `name` = '$name'";
    $imgquery = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($imgquery);
    unlink('img/'.$row['img']);
    
    // ลบชื่อแถวที่มีชื่อตรงกับ ตัวแปล name
    $query = "DELETE FROM `movietable` WHERE `name` = '$name'";
    $result = mysqli_query($connect, $query);
    
    // เช็คการลบสำเร็จหรือไม่
    if($result)
    {

        // เมื่อลบวำเร็จแสดง Modal แจ้งเตือน
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
                    ลบข้อมูลเรื่อง '.$name.' <span class="text-success"> สำเร็จ </span>
                </div>
                <div class="modal-footer">
                    <button  class="btn btn-success" onclick="document.getElementById(\'exampleModal\').style.display=\'none\'">ตกลง</button>
                </div>
                </div>
            </div>
            </div>
          
          ';
    }else{
        $delete = 'ลบไม่สำเร็จ';
    }

    // ยกเลิกการเชื่อมต่อ
    mysqli_close($connect);
}

?>
    <!-- ส่วนของ HTML -->
    <!DOCTYPE html>
    <html>

    <head>
        <title> อัพเดทข้อมูลหนัง </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/fontawesome-all.min.css">
        <link rel="stylesheet" href="css/stylesheet.css">
    </head>

    <body>

        <!-- ตัวเมนูบาร์ -->
        <nav class="nav nav-pills nav-fill fixed-top ">
            <a class="nav-item nav-link  text-warning" href="index.php">
                <i class="fas fa-align-right"></i> โปรแกรมหนัง</a>
            <a class="nav-item nav-link text-warning" href="insert_movie.php">
                <i class="fas fa-plus"></i> เพิ่มหนัง</a>
            <a class="nav-item nav-link bg-warning text-dark" href="updated_movie.php">
                <i class="fas fa-edit"></i> แก้ไขข้อมูลหนัง</a>
        </nav>

        <div class="insertnew container">
            <h1 class="text-center">แก้ไขข้อมูลหนัง</h1>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-sm-2"></div>

                <!-- แบบฟอรมอัพเดทข้อมูล -->
                <div class="col-sm-6">
                    <form action="updated_movie.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="id">เลือก ID ของหนังที่ต้องการแก้ไขข้อมูล:</label>

                            <!-- ตัวเลือกที่จะแก้ไขตามไอดี -->
                            <select name="id" class="form-control">
                                <option value=""></option>

                                <?php
                                // เชื่อมต่อไปยังฐานข้อมูล 
                                $db_host = 'localhost'; // ชื่อเซฟเวอร์
                                $db_user = 'root'; // ชื่อผู้ใช้
                                $db_pass = ''; // พาสเวิด
                                $db_name = 'moviedb'; // ชื่อฐานข้อมูล
                                $connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);


                                // เช็คการเข้าถึงฐานข้อมูล
                                if (!$connect) {
                                    die ('ไม่สามารถเชื่อมต่อ MySQL: ' . mysqli_connect_error());
                                }

                                // ดึกข้อมูลทั้งหมด
                                $sql = 'SELECT * FROM movietable';
                                $query = mysqli_query($connect, $sql);

                                // แสดงแต่ละแถว
                                while($row = mysqli_fetch_assoc($query)) {
                                $id = $row['id']; 
                                $nname = $row['name'];

                                // แสดง id ตามด้วย ชื่อหนัง
                                echo "<option value='$id'>$id. $nname</option>";
                                }

                                ?>
                            </select>

                        </div>

                        <!-- กรอกชื่อใหม่ของหนัง -->
                        <div class="form-group">
                            <label for="name">ชื่อหนัง</label>
                            <input type="text" name="name" class="form-control" pattern="[^':]*$" title="ไม่อนุญาติให้ใส่สัญลักษณ์ ( ' ) single quote "
                                required>

                        </div>

                        <!-- กรอกวันที่เข้าฉายใหม่ -->
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="day">วันที่เข้าฉาย</label>
                                <input type="number" name="day" class="form-control" min="0" max="31" required>
                            </div>

                            <!-- เลือกที่เข้าฉายใหม่ -->
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

                            <!-- กรอกปีที่เข้าฉายใหม่ -->
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

                        <!-- เลือกรูปที่ต้องการอัพโหลด -->
                        <div class="form-group">
                            <label class="btn btn-warning col-sm-12">
                                <i class="fas fa-folder-open"></i>
                                </i> เลือกรูปโปสเตอร์หนัง
                                <input type="file" name="imageUpload" class="form-control" accept="image/*" required >
                            </label>
                        </div>

                        <!-- กรอกเรื่องย่อใหม่ของหนัง -->
                        <div class="form-group">
                            <label for="describe">เรื่องย่อ</label>
                            <textarea name="describe" class="form-control" rows="5" placeholder="ไม่อนุญาติให้ใส่สัญลักษณ์ ( ' ) single quote"></textarea>
                        </div>

                        <!-- ปุ่มยืนยันการอัพเดท -->
                        <button class="btn btn-success col-sm-12 " type="submit" name="update">
                            <i class="fas fa-upload"></i> บันทึกข้อมูล</button>

                    </form>
                </div>

                <!-- แบบฟอร์มการลบข้อมูล -->
                <div class="col-sm-3">
                    <form action="updated_movie.php" method="post">
                        <div class="form-group">
                            <label for="name">เลือกชื่อหนังที่ต้องการลบ</label>

                            <!-- ตัวเลือกชื่อหนังที่จะลบ -->
                            <select name="name" class="form-control">
                                <option value=""></option>
                                <?php 

                                // เชื่อมต่อไปยังฐานข้อมูล
                                $db_host = 'localhost'; // ชื่อเซฟเวอร์
                                $db_user = 'root'; // ชื่อผู้ใช้
                                $db_pass = ''; // พาสเวิด
                                $db_name = 'moviedb'; // ชื่อฐานข้อมูล
                                $connect = mysqli_connect($db_host, $db_user, $db_pass, $db_name);


                                // เช็คการเข้าถึงฐานข้อมูล
                                if (!$connect) {
                                    die ('ไม่สามารถเชื่อมต่อ MySQL: ' . mysqli_connect_error());
                                }
                                
                                // ดึงข้อมูลทั้งหมด
                                $sql = 'SELECT * FROM movietable';
                                $query = mysqli_query($connect, $sql);

                                // แสดงแต่ละแถว                                
                                while($row = mysqli_fetch_assoc($query)) {
                                $id = $row['id'];
                                $name = $row['name'];

                                // แสดง id ตามด้วย ชื่อหนัง
                                echo "<option value='$name'>$id. $name</option>";
                                }

                                ?>
                            </select>
                        </div>

                        <button type="submit" name="delete" class="btn btn-danger col-sm-12 ">
                            <i class="fas fa-trash"></i> ลบหนังเรื่องนี้</button>

                    </form>

                </div>
            </div>
    </body>
    </html>