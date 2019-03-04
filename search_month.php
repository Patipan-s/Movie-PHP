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

// รับค่าจากฟอร์มค้นหาตามเดือนตั้งเป็นตัวแปล
$set=$_POST['month'];

// เลือกข้อมูลในคอลัม month ที่มีตัวอักษรเหมือนกับ ตัวแปล ดึงข้อมูลออกมา
$sql = "SELECT * FROM `movietable` where `month`= '$set'";
$result = mysqli_query($connect, $sql);

// นับจำนวนแถวที่ดึงข้อมูลมาได้
$conut = mysqli_num_rows($result);

?>

<!-- ส่วนของHTML -->
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
    <title>โปรแกรมหนัง</title>
    <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/fontawesome-all.min.css">
        <link rel="stylesheet" href="css/stylesheet.css">
</head>

<body>
    <!-- ตัวเมนูบาร์ -->
    <nav class="nav nav-pills nav-fill fixed-top ">
        <a class="nav-item nav-link  bg-warning text-dark" href="index.php">
            <i class="fas fa-align-right"></i> โปรแกรมหนัง</a>
        <a class="nav-item nav-link text-warning" href="insert_movie.php">
            <i class="fas fa-plus"></i> เพิ่มหนัง</a>
        <a class="nav-item nav-link text-warning" href="updated_movie.php">
            <i class="fas fa-edit"></i> แก้ไขข้อมูลหนัง</a>
    </nav>

    <div class="container">
        <h1 class="text-center"> <i class="fas fa-film"></i> โปรแกรมหนังเดือน
            <?php echo $set; ?> <!-- แสดงชื่อเดื่อนตามค่าในตัวแปล $set -->
        </h1>
    </div>

    <!-- ฟอร์มค้นหา -->
    <div class="container">
        <div class="row">
            <div class="col-sm-2"></div>

            <!-- กล่องค้นหาตามเดือนที่ฉาย -->
            <div class="col-sm-4">
                <form action="search_month.php" method="post">
                    <div class="form-group ">
                        <label for="month">ค้นหาตามเดือนที่เข้าฉาย</label>
                        <div class="row">
                            <div class="col-sm-9">
                                <select class="form-control" name="month">
                                    <option value="<?php echo $set; ?>">
                                        <?php echo $set; ?> 
                                    </option>
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
                            <div class="col-sm-3">
                                <button class="btn btn-warning">ค้นหา</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- กล่องค้นหาตามชื่อที่ฉาย -->
            <div class="col-sm-4">
                <form action="search_name.php" method="post">
                    <div class="form-group ">
                        <label for="name">ค้นหาตามชื่อหนัง</label>
                        <div class="row">
                            <div class="col-sm-9">
                                <input type="text" name="name" class="form-control" pattern="[^':]*$" title="ไม่อนุญาติให้ใส่สัญลักษณ์ ( ' ) single quote "
                                    required>
                            </div>
                            <div class="col-sm-3">
                                <button class="btn btn-warning">ค้นหา</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>

    <!-- แสดงจำนวนที่ค้นหาเจอ -->
    <h5 class="container text-white">ผลการค้นหา <span><?php echo $conut; ?></span> รายการ</h5>

    <!-- ตารางแสดงผลการค้นหา -->
    <table class="table table-dark " style="width: 100%">

        <?php
                    // ฟังก์ชันเรียกข้อมูลแต่ละแถวจนแถวสุดท้าย
                    while ($rows = mysqli_fetch_assoc($result))
                    {
                        // $row['...'] ใช้เรียกข้อมูลของแต่ละฟีวของฐานข้อมูล
                        echo '

                <tr>
                    <td style="padding-left: 140px">
                        <div class="card text-white bg-dark" style="width: 50rem;">
                            <div class="row" style="margin: 20px">
                                <div class="col-sm-4">
                                    <img class="card-img" src="img/'.$rows['img'].'" alt="Card image cap">
                                </div>
                                <div class="col-sm-8">
                                    <div class="card-body">
                                        <p class="card-text">รหัสหนัง : <span class="text-warning">'.$rows['id'].'</span></p>
                                        <p class="card-text">ชื่อเรื่อง : <span class="text-warning">'.$rows['name'].'</span> </p>
                                        <p class="card-text">วันที่เข้าฉาย : <span class="text-warning"> '.$rows['day']." ".$rows['month']." ".$rows['year'].'</span> </p>
                                        <p class="card-text">เรื่องย่อ</p>
                                        <p class="card-text" style="text-indent:20px">'.$rows['describe'].'</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                </tr>

                ';

		}?>
    </table>
</body>

</html>